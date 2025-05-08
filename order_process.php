<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jagtek_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO orders (product_id, quantity, username) VALUES ('$product_id', '$quantity', '$username')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "You must be logged in to place an order!";
}
?>