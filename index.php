<?php 
session_start();

// echo"welecome user ".$_SESSION['username'];

if($_SESSION['username'] !=true && $_SESSION['password'] !=true){
    header("Location: logout.php");
    exit;
}
else{
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental Navigation</title>

    <link rel="stylesheet" href="stylefor_admin_index.css"/>

</head>
<body style="background-image: url('hunter.jpg');">

<!-- nav bar  -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">Bike Rental</a>
        <ul>
            
            <li><a href="index.php">Home</a></li>
            <li><a href="about_us.php">About Us</a></li> <!--remining--> 
            <li>
                <a href="#">Account</a><!--remining-->
                <div class="dropdown">
                    <a href="profile.php">My Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            </li>
            <li>
                
                <!-- <div class="dropdown"> -->
                    <!-- <a href="manage-bikes.html">Manage Bikes</a>remining -->
                    <!-- <a href="view-rentals.html">View Rentals</a>remining -->
                    <!-- <a href="settings.html">Settings</a>remining -->
                </div>
            </li>
        </ul>
    </nav>
<!-- nav bar end here -->
<marquee behavior="scroll" direction="left" scrollamount="5">
        Contact us: +123-456-7890, +987-654-3210, +555-666-7777
    </marquee>
<!-- list of bikes -->

<h1>Available Bikes Catagory</h1>

<div class="bike-list">
    <!-- Bike Card 1 -->
    <div class="bike-card">
        <img src="mountain_bike.jpg" alt="Bike 1" class="bike-image">
        <div class="bike-details">
            <h2 class="bike-title">Mountain Bike</h2>
            <p class="bike-price">500 Rs/hour</p>
            <p class="bike-description">A durable mountain bike perfect for off-road adventures.</p>
            <a href="mountain_bikes.php" class="bike-button">See More</a>
        </div>
    </div>

    <!-- Bike Card 2 -->
    <div class="bike-card">
        <img src="road_bike.jpg" alt="Bike 2" class="bike-image">
        <div class="bike-details">
            <h2 class="bike-title">Road Bike</h2>
            <p class="bike-price">300 Rs/hour</p>
            <p class="bike-description">Lightweight road bike ideal for city rides and long-distance travel.</p>
            <a href="road_bikes.php" class="bike-button">See More</a>
        </div>
    </div>

    <!-- Bike Card 3 -->
    <div class="bike-card">
        <img src="sportz_bike.jpg" alt="Bike 3" class="bike-image">
        <div class="bike-details">
            <h2 class="bike-title">Sportz Bike</h2>
            <p class="bike-price">1000 Rs/hour</p>
            <p class="bike-description">powerful and performance oriented bikes for sport riding.</p>
            <a href="sportz_bikes.php" class="bike-button">See More</a>
        </div>
    </div>

    <!-- Bike Card 4 -->
    <div class="bike-card">
        <img src="electric_bike.jpg" alt="Bike 4" class="bike-image">
        <div class="bike-details">
            <h2 class="bike-title">Electric Bike</h2>
            <p class="bike-price">200 Rs/hour</p>
            <p class="bike-description">Eco-friendly electric bike with powerful battery for easy commuting.</p>
            <a href="electric_bikes.php" class="bike-button">See More</a>
        </div>
    </div>
    <!-- Add more bike cards as needed -->
</div>


</body>
</html>
