<?php
session_start();
include("../src/navbar.php");
include("../config/database.php"); // Corrected path to include database configuration

$page_title = 'Webshop';

try {
    $sql = "SELECT * FROM games";
    $dbStatement = $dbConnection->prepare($sql);
    $dbStatement->execute();
    $games = $dbStatement->fetchAll(PDO::FETCH_ASSOC);

    $game_id = $_GET['game_id'] ?? null; // Using null coalescing operator for safety

    if ($game_id !== null) {
        $sql = "SELECT * FROM games WHERE id = :id";
        $dbStatement = $dbConnection->prepare($sql);
        $dbStatement->execute([':id' => $game_id]);
        $game = $dbStatement->fetch();
    } else {
        $game = null;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $game = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/style.large-image.css?v=<?php echo time(); ?>">


</head>
<body class="text-light">
<div class="container">
    <?php if (!empty($game)): ?>
        <div class="row mt-4">
            <div class="col-md-8">
                <h1 class="display-4"><?php echo htmlspecialchars($game['name']); ?></h1>

                <div class="rating">
                    <span>★★★★☆</span>
                    <span>(12 reviews)</span>
                    <span> | </span>
                    <span>91029 views</span>
                </div>
                <div class="game-images mt-3">
                    <img id="mainImage" src="<?php echo APPURL; ?>/images/tomb raider definitive edition/<?php echo ($game['image-3']); ?>" alt="Main Game Image" class="img-thumbnail" style="width: 100%; height: 30rem;">
                    <div class="thumbs mt-2">
                        <img src="<?php echo APPURL; ?>/images/tomb raider definitive edition/<?php echo $game['image-1']; ?>" onclick="showImage('tomb raider definitive edition/<?php echo $game['image-1']; ?>')" alt="Thumbnail 1" style="width: 100px; height: 100px; object-fit: cover;">
                        <img src="<?php echo APPURL; ?>/images/tomb raider definitive edition/<?php echo $game['image-2']; ?>" onclick="showImage('tomb raider definitive edition/<?php echo $game['image-2']; ?>')" alt="Thumbnail 2" style="width: 100px; height: 100px; object-fit: cover;">
                        <img src="<?php echo APPURL; ?>/images/tomb raider definitive edition/<?php echo $game['image-3']; ?>" onclick="showImage('tomb raider definitive edition/<?php echo $game['image-3']; ?>')" alt="Thumbnail 3" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                </div>
            </div>
            <script>
                function showImage(image) {
                    document.getElementById('mainImage').src = '<?php echo APPURL; ?>/images/' + image;
                }
            </script>


            <div class="col-md-4 ">
                <div class="download-section ">
                    <a href="#" class="btn btn-success btn-lg btn-block mb-3 mt-5">Direct Download Link</a>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-check" style="color: #00ff1e; background: #333333; padding: 8px; border-radius: 50%;"></i> Size: 31 MB</li>
                        <li><i class="fa-solid fa-check" style="color: #00ff1e; background: #333333; padding: 8px; border-radius: 50%;"></i> Free</li>
                        <li><i class="fa-solid fa-check" style="color: #00ff1e; background: #333333; padding: 8px; border-radius: 50%;"></i> Full version</li>
                        <li><i class="fa-solid fa-check" style="color: #00ff1e; background: #333333; padding: 8px; border-radius: 50%;"></i> Virus-free</li>
                    </ul>
                </div>
                <div class="share-buttons mt-3">
                    <button class="btn btn-primary btn-block mb-2">Share on Facebook</button>
                    <button class="btn btn-info btn-block">Tweet on Twitter</button>
                </div>
                <div class="system-requirements mt-4 justify-content-center">
                    <a href=""><h1><i class="fa-brands fa-steam"></i></h1></a>
                    <a href=""> <h1> <i class="fa-brands fa-playstation" style="color: #ff0000;"></i> </h1></a>
                    <a href=""><h1><i class="fa-brands fa-xbox" style="color: #1eff00;"></i> </h1></a>

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-light">
                <h2>Game Story</h2>
                <p><?php echo htmlspecialchars($game['description'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    <?php else: ?>
        <p>No game selected or game not found.</p>
    <?php endif; ?>
</div>




<?php
include("../src/footer.php");
?>
