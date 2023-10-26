<?php
// Verbinding maken met de database (je moet je eigen gegevens invullen)
$host = 'localhost:3306';
$dbUsername = "88701";
$dbPassword = "Settlover11";
$dbName = "db_88701";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query om de gamegegevens op te halen (vervang 'games' door de juiste tabelnaam in je database)
$query = "SELECT * FROM verzamelaar";
$result = $conn->query($query);

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamewinkel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="home" class="container">

    <div id="home" class="header">
        <div class="navbar">
            <a href="#home">Home</a>
            <a href="#games">Games</a>
        </div>
    </div>

    <div class="container2">
        <div class="main">
            <h1>Welkom bij Onze Gamewinkel</h1>
            <p>Ontdek en koop de nieuwste en beste games. Krijg gedetailleerde informatie, recensies en meer!</p>
        </div>
    </div>


    <div id="game-popup" class="popup">
        <div class="popup-content">
            <!-- Add content for additional attributes here -->
            <h3 id="popup-title"></h3>
            <p id="popup-description"></p>
            <p id="popup-platform"></p>
            <p id="popup-rating"></p>
            <!-- Add more attributes as needed -->
        </div>
        <span class="close" onclick="closePopup()">&times;</span>
    </div>

    <div class="section" id="games">
        <h2>Onze Games</h2>
        <div class="flex-container">
            <?php
            // Loop through the results and generate a box for each game
            while ($row = $result->fetch_assoc()) {
                echo '<div class="game-box">';
                echo '<img src="' . $row["foto"] . '" alt="' . $row["naam"] . '" onclick="openPopup(\'' . $row["naam"] . '\', \'' . $row["beschrijving"] . '\', \'' . $row["platform"] . '\', \'' . $row["rating"] . '\')">';
                echo '<h3>' . $row["naam"] . '</h3>';

                echo '<p>Prijs: ' . $row["prijs"] . ' EUR</p>';
                echo '<p>Genre: ' . $row["genre"] . '</p>';
                echo '<p>Uitgever: ' . $row["publisher"] . '</p>';
                echo '<p>Beschrijving: ' . $row["beschrijving"] . '</p>';
                echo '<p>Releasedatum: ' . $row["datum"] . '</p>';
                // Add additional attributes here (e.g., platform, rating, etc.)
                echo '<p>Platform: ' . $row["platform"] . '</p>';
                echo '<p>Rating: ' . $row["rating"] . '</p>';
                // Add more attributes as needed
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="section" id="contact">
        <h2>Contacteer Ons</h2>
        <!-- Voeg hier contactinformatie en een contactformulier toe -->
    </div>

    <script src="./js/popup.js"></script>

</body>
</html>
