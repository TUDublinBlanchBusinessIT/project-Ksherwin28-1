<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop"; 
$port = 3306;

// Create my connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check if there is a connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
