<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Welcome to Home Page!</h1>";
echo "<p>You are logged in as user ID: " . $_SESSION['user_id'] . "</p>";
echo "<p><a href='logout.php'>Logout</a></p>";
?>
