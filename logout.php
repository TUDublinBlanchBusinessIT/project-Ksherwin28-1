<?php
session_start();

// this will unset all session variables
$_SESSION = array();

// Destroy session
session_destroy();


header("Location: login.html");
exit();
?>
