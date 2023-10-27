<?php
// Connect to the database (update with your own credentials)
$host = 'localhost:3306';
$dbUsername = "ftp88701";
$dbPassword = "Settlover11";
$dbName = "db_88701";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the game ID from the request
$gameId = $_GET["id"];

// Fetch game details by ID
$query = "SELECT * FROM verzamelaar WHERE id = $gameId";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Convert the result to JSON and send it back as the response
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "Game not found.";
}

$conn->close();
?>