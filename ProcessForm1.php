<?php
session_start();

$expectedUsername = "admin";
$expectedPassword = "password";

$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

if ($enteredUsername === $expectedUsername && $enteredPassword === $expectedPassword) {
    echo "Login successful!"; // i am using this for debugging
    header("Location: HomePage.html");
    exit();
} else {
    echo "Wrong credentials"; 
    exit();
}
?>
