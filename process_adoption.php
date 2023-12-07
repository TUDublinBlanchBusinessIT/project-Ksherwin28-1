<?php
date_default_timezone_set('GMT');

include('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $petId = isset($_POST['petId']) ? intval($_POST['petId']) : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    $sql = "INSERT INTO adoptions (PetID, adoptperson_name, adoptperson_email, adopteperson_phonenum) VALUES ('$petId', '$name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        // so if the form gets submitted im adding 'Adopted' to the database so can actually track
        // it goes and updates my table with the petid and we can see its adopted 
        $updateStatusQuery = "UPDATE petadoption SET AdoptionStatus = 'Adopted' WHERE PetID = $petId";
        if ($conn->query($updateStatusQuery) === TRUE) {
            echo "Adoption application submitted successfully!";
            header("refresh:2;url=viewpets.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: adopt.html");
    exit();
}

?>
