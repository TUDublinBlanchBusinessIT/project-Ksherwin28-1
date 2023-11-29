<?php
date_default_timezone_set('GMT'); 
session_start();

include('dbcon.php');

$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$enteredUsername'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    if ($enteredPassword === $user['password']) {
        $_SESSION['username'] = $enteredUsername;
        header("Location: homepage.HTML");
        exit();
    } else {
        echo "Sorry, wrong credentials";
    }
}
?>
