<?php
// Database credentials

if (!defined('APPURL')) {
    define("APPURL", "http://localhost/portfolio/projecten/web-shop");
}

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
