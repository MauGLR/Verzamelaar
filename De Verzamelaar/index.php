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
            <a href="#contact">Contact</a>
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
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="popup-image" src="" alt="">
            <h3 id="popup-title"></h3>
            <p id="popup-description"></p>
            <p id="popup-platform"></p>
            <p id="popup-rating"></p>
            <div id="popup-buttons">
            </div>
        </div>
    </div>

    <div class="section" id="games">
        <h2>Onze Games</h2>
        <div class="flex-container">
            <?php
            // Loop through the results and generate a box for each game
            while ($row = $result->fetch_assoc()) {
                echo '<div class="game-box">';
                echo $row["foto"] . '" alt="' . $row["naam"] . '">';
                echo '<h3>' . $row["naam"] . '</h3>';
                echo '<button onclick="openPopup(this)" 
                data-description="' . $row["beschrijving"] . '" 
                data-platform="' . $row["genre"] . '" 
                data-rating="' . $row["publisher"] . '" 
                data-price="' . $row["prijs"] . '" 
                data-genre="' . $row["genre"] . '" 
                data-publisher="' . $row["publisher"] . '" 
                data-release-date="' . $row["datum"] . '"
                >Zie Meer</button> <br>';

                echo '<button onclick="addToCart(this)" 
                data-description="' . $row["beschrijving"] . '" 
                data-platform="' . $row["genre"] . '" 
                data-rating="' . $row["publisher"] . '" 
                data-price="' . $row["prijs"] . '" 
                data-genre="' . $row["genre"] . '" 
                data-publisher="' . $row["publisher"] . '" 
                data-release-date="' . $row["datum"] . '"
                data-naam="' . $row["naam"] . '"
                >Voeg toe aan winkelwagen</button>';
                echo '</div>';
            }
            ?>
        </div>


        <div class="section" id="cart">
            <h2>Winkelwagen</h2>
            <div id="cart-items">
            </div>
            <button id="checkout-button" onclick="checkoutPopup()">Checkout</button>
        </div>
    </div>

    <div id="contact" class="main-contact">
        <form method="POST">
            <h1 class="contacteermij">Contact Opnemen</h1>
            <div class="info">
                <input class="fname" type="text" name="name" placeholder="Volledige Naam" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Telefoon Nummer" required>
                <input type="text" name="company" placeholder="Bedrijfsnaam (heeft u die niet? voer dan 'n.v.t.' in.)" required>
            </div>
            <p>Message</p>
            <div>
                <textarea rows="4" placeholder="Bericht" name="message"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="./js/popup.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>