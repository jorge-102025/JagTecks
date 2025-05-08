<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jagtek_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $entered_password= $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user'";
    $stmt->bind_result($stored_hash);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($entered_password, $row['password'])) {
            $_SESSION['username'] = $user;
            echo "Welcome, " . $user;
        } else {
            echo "Invalid credentials!";
        }
    } else {
        echo "No such user found!";
    }
}
$conn->set_charset("utf8");
?>