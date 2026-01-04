<?php
$servername = "localhost";
$db_username = "appuser";      // the MySQL user you created
$db_password = "StrongPass123"; // password for that user
$db_name = "food_delivery";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>

