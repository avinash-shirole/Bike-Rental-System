<?php
// Start the session
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike List</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Header */
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        /* Bike List Container */
        .bike-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        /* Bike Card */
        .bike-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s;
        }

        .bike-card:hover {
            transform: scale(1.05);
        }

        .bike-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .bike-card .bike-details {
            padding: 15px;
        }

        .bike-card .bike-name {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        .bike-card .bike-price {
            font-size: 18px;
            color: #007bff;
            margin: 10px 0;
        }

        .bike-card .bike-actions {
            margin: 10px 0;
        }

        .bike-card .bike-actions button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .bike-card .bike-actions .rent-btn {
            background-color: #28a745;
            color: #fff;
        }

        .bike-card .bike-actions .details-btn {
            background-color: #007bff;
            color: #fff;
        }

        .bike-card .bike-actions button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <h1>Available Bikes</h1>
    <div class="bike-list">
    <!-- Bike Card 1 -->
    <div class="bike-card">
        <img src="road_bikes_imges/splender.jpg" alt="Bike 1" name="roadbike">
        <div class="bike-details">
            <div class="bike-name">Splender</div>
            <div class="bike-price">1500 Rs/day</div>
            <div class="bike-actions">
            <button class="rent-btn" onclick="rentBike('road_bikes_imges/splender.jpg')">Rent</button>     
                <button class="details-btn">Details</button>
            </div>
        </div>
    </div>
       
      <!-- Bike Card 2 -->
      <div class="bike-card" name="">
            <img src="road_bikes_imges\mt15.jpg" alt="Bike 2" >
            <div class="bike-details">
                <div class="bike-name">Yamaha MT 15</div>
                <div class="bike-price">2200 Rs/day</div>
                <div class="bike-actions">
            <button class="rent-btn" onclick="rentBike('road_bikes_imges/mt15.jpg')">Rent</button>     
                    <button class="details-btn">Details</button>
                </div>
            </div>
        </div>

        <!-- Bike Card 3 -->
      <div class="bike-card" name="">
            <img src="road_bikes_imges\hunter.jpg" alt="Bike 3">
            <div class="bike-details">
                <div class="bike-name">Royal Enfield Hunter 350</div>
                <div class="bike-price">2200 Rs/day</div>
                <div class="bike-actions">
                <button class="rent-btn" onclick="rentBike('road_bikes_imges/hunter.jpg')">Rent</button>     
                <button class="details-btn">Details</button>
                </div>
            </div>
        </div>

        <!-- Bike Card 4 -->
      <div class="bike-card" name="">
            <img src="road_bikes_imges\classic350.jpg" alt="Bike 4">
            <div class="bike-details">
                <div class="bike-name">Royal Enfield Classic 350</div>
                <div class="bike-price">2200 Rs/day</div>
                <div class="bike-actions">
                <button class="rent-btn" onclick="rentBike('road_bikes_imges/classic350.jpg')">Rent</button>     
                <button class="details-btn">Details</button>
                </div>
            </div>
        </div>

        <!-- Bike Card 5 -->
      <div class="bike-card" name="">
            <img src="road_bikes_imges\ContinentalGT650.jpeg" alt="Bike 5">
            <div class="bike-details">
                <div class="bike-name">Royal Enfield Continental GT650</div>
                <div class="bike-price">2200 Rs/day</div>
                <div class="bike-actions">
                <button class="rent-btn" onclick="rentBike('road_bikes_imges/ContinentalGT650.jpeg')">Rent</button>     
                <button class="details-btn">Details</button>
                </div>
            </div>
        </div>

        <!-- Bike Card 6 -->
      <div class="bike-card" name="">
            <img src="road_bikes_imges\hondaShine.jpg" alt="Bike 6">
            <div class="bike-details">
                <div class="bike-name">Honda Shine 125</div>
                <div class="bike-price">1500 Rs/day</div>
                <div class="bike-actions">
                <button class="rent-btn" onclick="rentBike('road_bikes_imges/hondaShine.jpg')">Rent</button>     
                    <button class="details-btn">Details</button>
                </div>
            </div>
        </div>

         <!-- Bike Card 7 -->
      <div class="bike-card" name="">
            <img src="road_bikes_imges\hondaUnicorn.jpg" alt="Bike 7">
            <div class="bike-details">
                <div class="bike-name">Honda Unicorn 160</div>
                <div class="bike-price">1500 Rs/day</div>
                <div class="bike-actions">
                <button class="rent-btn" onclick="rentBike('road_bikes_imges/hondaUnicorn.jpg')">Rent</button>     
                    <button class="details-btn">Details</button>
                </div>
            </div>
        </div>

        <!-- getting bike image -->
        <script>
             function rentBike(imagePath) {
             location.href = `getUserDetails.php?bikeImage=${encodeURIComponent(imagePath)}`;
            }
            </script>
</body>
</html>
