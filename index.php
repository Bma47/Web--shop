<?php



include("src/navbar.php");
include("src/header.php");
include("config/database.php");
$page_title = 'Web shop';

// Define the number of records per page
$records_per_page = 20;

// Determine the current page
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the starting record
$start_from = ($current_page - 1) * $records_per_page;

try {
    // Get total records count
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
    echo "Error fetching games: " . $error->getMessage();
    $games = [];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo htmlspecialchars(APPURL); ?>/css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo htmlspecialchars($page_title); ?></title>
</head>
<body>

<div class="container mt-4">
    <?php include("src/categorie.php"); ?>

    <?php if (!empty($games)): ?>
        <div class="row">
            <?php foreach ($games as $game): ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <a href="<?php echo (APPURL); ?>/components/details.php?game_id=<?php echo urlencode($game['id']); ?>" class="text-decoration-none">
                        <div class="card">
                            <img src="<?php echo (APPURL); ?>/images/<?php echo htmlspecialchars($game['image']); ?>" class="card-img-top h-75 img-fluid object-fit-fill" alt="Game Image">
                            <h5 class="card-title m-2 text-center text-dark"><?php echo htmlspecialchars($game['name']); ?></h5>
                            <div class="card-body ">
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No games found.</p>
    <?php endif; ?>
</div>

<?php include("src/pagination.php"); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include("src/footer.php");?>

</body>
</html>
