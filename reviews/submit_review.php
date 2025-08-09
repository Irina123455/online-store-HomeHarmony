<?php
session_start();
require_once '../php/session_helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $product_id = $_POST["product_id"];

    // Database credentials
    $host = "localhost";
    $username = "root"; // Замени на свои
    $password = "root"; // Замени на свои
    $database = "homeharmony";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query (using prepared statements to prevent SQL injection)
    $sql = "INSERT INTO reviews (product_id, name, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $product_id, $name, $rating, $comment); // "isss" indicates integer, string, string, string

    if ($stmt->execute()) {
        // Success
        $stmt->close();
        $conn->close();
header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>