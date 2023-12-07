<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.html");
    exit();
}

date_default_timezone_set('GMT');
include('dbcon.php');

$PetID = '';

if (isset($_GET['PetID'])) {
    $PetID = $_GET['PetID'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/comment.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Comment Form</title>
</head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    width: 100%;
}

li {
    width: max-content;
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 20px 24px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #04AA6D;
}   
</style>
<body>
<ul>
        <li><a class="active" href="HomePage.php">Submit Pet</a></li>
        <li><a href="viewpets.php">View Pets</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>

<?php
if (isset($_GET['PetID'])) {
    $sql = "SELECT * FROM petadoption WHERE PetID = $PetID";
    $result = $conn->query($sql);

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

        <form action="process_comment.php" method="POST">
            <input type="hidden" name="petID" value="<?= $PetID ?>">
            <label for="comment">Comment:</label><br>
            <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
            <label for="number">Number:</label><br>
            <input type="text" id="number" name="number" required><br>

            <input type="submit" value="Submit Comment">
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
