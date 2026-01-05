<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        header("Location: home.php?contact=success#contact");
        exit();
    } else {
        echo "Failed to send message.";
    }
}
