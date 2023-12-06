<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet</title>
    <link rel="stylesheet" href="CSS/adoptstyle.css"> 
</head>
<body>

<?php include('dbcon.php');

if (isset($_GET['PetID'])) {
    $PetID = $_GET['PetID'];


    // this is a SQL query that selects the pet details from PetID
    $sql = "SELECT * FROM petadoption WHERE PetID = $PetID";
    $result = $conn->query($sql);

    // this actually checks the query and sees if it is successful and that there is one row
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

        <div class="pet-details">
            <h3>Selected Pet: <?= $row['PetName'] ?></h3>
            <p>Type: <?= $row['PetType'] ?></p>
            <p>Gender: <?= $row['Gender'] ?></p>
            <p>Neutered/Spayed: <?= $row['NeuteredStatus'] ?></p>
            <p>Date of Birth: <?= $row['DateOfBirth'] ?></p>
            <p>Description: <?= $row['Description'] ?></p>
        </div>

        <form action="process_adoption.php" method="post">
        <!-- I added in a hidden input type so i can actually link the pet with the person adopting it -->
            <input type="hidden" name="petId" value="<?= $row['PetID'] ?>">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Your Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <button type="submit" class="adopt-button">Submit Adoption Application</button>
        </form>

<?php
    } else {
        echo '<p class="no-pets">Pet not found!</p>';
    }
} else {
    echo '<p class="no-pets">No pet selected.</p>';
}

$conn->close();
?>

</body>
</html>
