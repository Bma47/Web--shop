<?php
session_start();
include("../src/navbar.php");
include("../config/connection.php");
$page_title = 'Web shop';
// Define the number of records per page
$records_per_page = 8;

// Determine the current page
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting record
$start_from = ($current_page - 1) * $records_per_page;

// Get total records count
try {
    $total_records_query = "SELECT COUNT(*) FROM games WHERE categories = 2";
    $total_records_result = $dbConnection->query($total_records_query);
    $total_records = $total_records_result->fetchColumn();

    // Fetch limited records for the current page
    $games_query = "SELECT * FROM games WHERE categories = 2 LIMIT :start_from, :records_per_page";
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
if (!defined('APPURL')) {
    define("APPURL", "http://localhost/portfolio/projecten/web-shop");

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo $page_title; ?></title>
</head>
<body>

<div class="container mt-4">
    <?php include("../src/categorie.php"); ?>

    <?php if(!empty($games)): ?>
        <div class="row">
            <?php foreach($games as $game): ?>

                <?php if($game['categories'] == 2): ?>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <!-- Wrap the entire card in an anchor tag -->
                        <a href="<?php echo (APPURL); ?>/components/details.php?game_id=<?php echo urlencode($game['id']); ?>" class="text-decoration-none">
                            <div class="card">
                                <img src="<?php echo (APPURL); ?>/images/<?php echo htmlspecialchars($game['image']); ?>" class="card-img-top h-75 img-fluid object-fit-fill" alt="Game Image">
                                <h5 class="card-title m-2 text-center text-dark"><?php echo htmlspecialchars($game['name']); ?></h5>
                                <div class="card-body ">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No games found.</p>
    <?php endif; ?>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php if($current_page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $current_page - 1 ?>" aria-label="Go to previous page">Previous</a>
            </li>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                <?php if($i == $current_page): ?>
                    <span class="page-link"><?= $i ?></span>
                <?php else: ?>
                    <a class="page-link" href="?page=<?= $i ?>" aria-label="Go to page <?= $i ?>"><?= $i ?></a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>

        <?php if($current_page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $current_page + 1 ?>" aria-label="Go to next page">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>