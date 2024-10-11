<?php

if (!defined('APPURL')) {
    define("APPURL", "http://localhost/portfolio/projecten/web-shop");
}

// Database credentials
$dbHost = '127.0.0.1';
$dbName = 'web-shop';
$dbUser = 'root';
$dbPass = '';

$dbConnection = null;

try {
    // Establish a PDO connection
    $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    // Handle connection error
    die("Database connection failed: " . $error->getMessage());
}

// Define the number of records per page
$records_per_page = 20;

// Determine the current page
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting record
$start_from = ($current_page - 1) * $records_per_page;

// Get total records count
try {
    $total_records_query = "SELECT COUNT(*) FROM games";
    $total_records_result = $dbConnection->query($total_records_query);
    $total_records = $total_records_result->fetchColumn();

    // Fetch limited records for the current page
    $games_query = "SELECT * FROM games LIMIT :start_from, :records_per_page";
    $stmt = $dbConnection->prepare($games_query);
    $stmt->bindParam(':start_from', $start_from, PDO::PARAM_INT);
    $stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Calculate total pages
    $total_pages = ceil($total_records / $records_per_page);
} catch (PDOException $error) {
    die("Error fetching games: " . $error->getMessage());
}