<?php
$page_title = 'Webshop';


?>

<!doctype html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?> | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time();?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css?v=<?php echo time();?>" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">

    <!--    -->

</head>
<body>




<div class="container mt-5 ">
    <div class="row  d-flex justify-content-between">

        <div class="col mt-1">
            <h4 class="text-light">New Games</h4>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/a plague tale innocence.jpg" style="height: 500px;" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/815OuvyY30L.jpg"  style="height: 500px;" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/spider-man.jpg" style="height: 500px;" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="text-light ml-3">The most games upload</h4>
            <ul class="game-list m-2">

                <li class="text-light m-2 p-4 rounded-1" style="background: #333333;">
                    <strong>GTA V</strong><br>Downloaded 5589 times<br>
                    <span class="stars">★★★★★</span>
                </li>
                <li class="text-light m-2 p-4 rounded-1" style="background: #333333;">
                    <strong>Far Cry 6</strong><br>
                    Downloaded 4827 times<br>
                    <span class="stars">★★★★★</span>
                </li>

                <li class="text-light m-2 p-4 rounded-1" style="background: #333333;">
                    <strong>Tomp Raider II</strong><br>
                    Downloaded 3235 times<br>
                    <span class="stars">★★★★★</span>
                </li>
                <li class="text-light m-2 p-4 rounded-1 " style="background: #333333;">
                    <strong>Fortnite</strong><br>
                    Downloaded 1835 times<br>
                    <span class="stars">★★★★★</span>
                </li>
            </ul>
        </div>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>




</body>
</html>