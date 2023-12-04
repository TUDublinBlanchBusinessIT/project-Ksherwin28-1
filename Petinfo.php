<?php
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $gender = $_POST["gender"];
    $neutered = $_POST["neutered"];
    $dob = $_POST["dob"];
    $description = $_POST["description"];


    $sql = "INSERT INTO petadoption (PetName, PetType, Gender, NeuteredStatus, DateOfBirth, Description) VALUES ('$petName', '$petType', '$gender', '$neutered', '$dob', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Pet has been uploaded to our system!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
