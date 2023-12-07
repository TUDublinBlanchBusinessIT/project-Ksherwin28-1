<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/view.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Whitegate</title>
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
        <li><a  href="HomePage.php">Submit Pet</a></li>
        <li><a class="active" href="viewpets.php">View Pets</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    <h2>These animals are currently up for adoption today!</h2>

    <?php
    date_default_timezone_set('GMT');
    include('dbcon.php');

    $sql = "SELECT * FROM petadoption WHERE AdoptionStatus != 'Adopted'";
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
                '<a href="adopt.php?PetID=' . $row['PetID'] . '" class="adopt-button">Adopt Me</a>' .
                '<a href="comment.php?PetID=' . $row['PetID'] . '" class="comment-button">Query/Comment</a>' .
                '</div>';
        }
    } else {
        echo '<p class="no-pets"> No pets available for adoption at the moment. Please check back another time! </p>';
    }

    $conn->close();
    ?>
</body>
</html>
