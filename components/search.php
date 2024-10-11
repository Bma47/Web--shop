<?php
include '../src/navbar.php'; // Adjust the path as needed
include '../config/database.php'; // Adjust the path as needed

// Check if the search query is set
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Sanitize the input to prevent SQL injection
    $searchQuery = htmlspecialchars($searchQuery);

    // Prepare the SQL query using PDO
    try {
        $stmt = $dbConnection->prepare("SELECT * FROM games WHERE name LIKE :searchQuery");
        $stmt->execute(['searchQuery' => "%$searchQuery%"]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the results
        if ($results) {
            echo ' <div class="container mt-4">';

            echo "<h2 class='text-light'>Search Results for '" . htmlspecialchars($searchQuery) . "':</h2>";
            echo '<div class="row">';  // Start a row for Bootstrap grid

            foreach ($results as $row) {


                echo '<div class="col-md-3 col-sm-6 mb-4">';  // Column for each game result
                echo '<a href="' . APPURL . '/components/details.php?game_id' . urlencode($row['id']) . '" class="text-decoration-none">';  // Link to game details
                echo '<div class="card">';  // Bootstrap card

                // Display game image

                echo '<img src="' . APPURL . '/images/' . htmlspecialchars($row['image']) . '" class="card-img-top h-75 img-fluid object-fit-fill" alt="Game Image">';
                echo ' <h5 class="card-title m-2 text-center text-dark"></h5>';
                echo '<div class="card-body ">';
                echo '</div>';
                echo '</div>';  // Close row
                echo '</a>';  // Close row
                echo '</div>';  // Close row


                // Display game name

            }

            echo '</div>';  // Close row
        } else {
            echo "<p>No results found for '" . htmlspecialchars($searchQuery) . "'</p>";
        }

    } catch (PDOException $error) {
        die("Error fetching search results: " . $error->getMessage());
    }
} else {
    echo "<p>No search query provided.</p>";
}
?>

