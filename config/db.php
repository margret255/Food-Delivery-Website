<?php
$host = "localhost";
$user = "appuser";
$password = "app123";
$database = "food_delivery";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
