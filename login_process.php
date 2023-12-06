<?php
session_start();
date_default_timezone_set('GMT');
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$enteredUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($enteredPassword === $user['password']) {
            // Set session variable and redirect to the homepage
            $_SESSION['username'] = $enteredUsername;
            header("Location: Homepage.html"); 
            exit();
        } else {
            echo "Wrong information entered.";
        }
    } 
}
?>
