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
    <link rel="stylesheet" href="CSS/homestyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Application</title>

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



    <h2>Pet Adoption Submission</h2>
   

    <form action="Petinfo.php" method="post">
        <label for="petName">Pet Name:</label>
        <input type="text" id="petName" name="petName" required>

        <label for="petType">Pet Type:</label>
        <select id="petType" name="petType" required>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Turtle">Turtle</option>
            <option value="Hamster">Hamster</option>
            <option value="Rabbit">Rabbit</option>
            <option value="Alien">Alien</option>
        </select>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select>

        <label for="neutered">Neutered/Spayed:</label>
        <select id="neutered" name="neutered" required>
        <option value="NotSpecified">Not Specified</option>
        <option value="Neutered">Neutered</option>
        <option value="Spayed">Spayed</option>
        <option value="NotNeutered">Not Neutered</option>
        </select>



        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <button type="submit">Submit Application</button>
    </form>


</body>
</html>
