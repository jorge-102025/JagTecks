<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jagtek_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password']; 
   
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
    
}
$conn->set_charset("utf8");
?>