<?php
include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $gender = $_POST["gender"];
    $neutered = $_POST["neutered"];
    $dob = $_POST["dob"];
    $description = $_POST["description"];
    $phone = $_POST["phone"];

    //Just inserts the info into my petadoption table
    $sql = "INSERT INTO petadoption (PetName, PetType, Gender, NeuteredStatus, DateOfBirth, Description, phone) VALUES ('$petName', '$petType', '$gender', '$neutered', '$dob', '$description', '$phone')";


    //if it inserted then success if not error 
    if ($conn->query($sql) === TRUE) {
        echo "Pet has been uploaded to our system!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
