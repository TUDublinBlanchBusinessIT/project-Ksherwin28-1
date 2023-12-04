<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Whitegate</title>

</head>
<body>
    <h2>Available Pets for Adoption</h2>

    <?php
    date_default_timezone_set('GMT');
    include('dbcon.php');


    $sql = "SELECT * FROM petadoption";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="pet-card">' .
                '<h3>' . $row['PetName'] . '</h3>' .
                '<p>Type: ' . $row['PetType'] . '</p>' .
                '<p>Gender: ' . $row['Gender'] . '</p>' .
                '<p>Neutered/Spayed: ' . $row['NeuteredStatus'] . '</p>' .
                '<p>Date of Birth: ' . $row['DateOfBirth'] . '</p>' .
                '<p>Description: ' . $row['Description'] . '</p>' .
                '</div>';
        }
    } else {
        echo '<p class="no-pets"> No pets available for adoption at the moment. Please check back another time! </p>';
    }


    $conn->close();
    ?>
</body>
</html>
