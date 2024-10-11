<?php

$page_title = 'Webshop';
if (!defined('APPURL')) {
    define("APPURL", "http://localhost/projecten/web-shop");

}


?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?> | Home</title>
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>


<!--<h1 class="container text-center">Bma3an</h1>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
    <div class="container-fluid">

        <a class="navbar-brand" href="<?php echo APPURL; ?>/index.php">Web Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link active" href="#">Home</a>-->
<!--                </li>-->
            </ul>
            <!-- Add custom class to form -->

            <form action="<?php echo APPURL; ?>/components/search.php" method="GET" class="d-flex search-form " role="search">
                <input class="form-control me-2" type="search" placeholder="Search for a video game..." name="query" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>


        </div>
        <!--container login-->


    </div>
</nav>




<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

</body>
</html>