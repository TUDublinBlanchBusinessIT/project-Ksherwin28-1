<?php
session_start();

date_default_timezone_set('GMT');
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petID = $_POST["petID"];
    $comment = $_POST["comment"];
    $number = $_POST["number"];

    $sql = "INSERT INTO adoptioncomments (PetID, Comment, CommentDate, Number) VALUES ('$petID', '$comment', CURRENT_TIMESTAMP, '$number')";

    if ($conn->query($sql) === TRUE) {
        echo "Comment submitted successfully.";
        header("refresh:2;url=viewpets.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
