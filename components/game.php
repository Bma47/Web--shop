<?php
include '../config/config.php';
include '../config/connection.php';
include '../config/database.php';

if (isset($_GET['game_id'])) {
    $gameId = $_GET['game_id'];

    try {
        $stmt = $dbConnection->prepare("SELECT * FROM games WHERE id = :gameId");
        $stmt->execute(['gameId' => $gameId]);
        $game = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($game) {
    echo "<h1>" . htmlspecialchars($game['name']) . "</h1>";
    echo "<img src='" . APPURL . "/images/" . htmlspecialchars($game['image']) . "' alt='Game Image'>";
    echo "<a href='" . APPURL . "/components/details.php?game_id=" . urlencode($game['id']) . "' class='text-decoration-none'>Link</a>";



            echo "<p>" . htmlspecialchars($game['description']) . "</p>";
            // Display other details as needed
        } else {
            echo "<p>Game not found.</p>";
        }
    } catch (PDOException $error) {
        die("Error fetching game details: " . $error->getMessage());
    }
} else {
    echo "<p>No game ID provided.</p>";
}
?>
