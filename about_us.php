<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #007bff;
            padding: 15px;
            color: white;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #555;
        }

        .team {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 30px;
        }

        .team-member {
            text-align: center;
            margin: 15px;
        }

        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .team-member h3 {
            margin-top: 10px;
            color: #007bff;
        }

        footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px 0;
            background-color: #007bff;
            color: white;
        }

    </style>
</head>
<body>

<nav class="navbar">
    <a href="index.php">Home</a>
    <a href="about_us.php">About Us</a>
    <a href="services.html">Services</a>
    <a href="contact.html">Contact</a>
</nav>

<div class="container">
    <h1>About Us</h1>
    <p>
        Welcome to Bike Rental, your trusted partner in affordable and convenient transportation solutions. Our mission is to make commuting easier and more enjoyable by providing top-quality bikes for rent. Whether you need a bike for daily commuting, weekend adventures, or a special event, we have you covered.
    </p>

    <h2>Our Story</h2>
    <p>
        Founded in 2020, Bike Rental began with a vision to revolutionize urban mobility. What started as a small local service has grown into a trusted brand serving thousands of satisfied customers. Our journey is driven by our commitment to quality, reliability, and exceptional customer service.
    </p>

    <h2>Meet Our Team</h2>
    <div class="team">
        <div class="team-member">
            <img src="ceo.jpg" alt="Team Member 1">
            <h3>Avinash Shirole</h3>
            <p>Founder & CEO</p>
        </div>
        <div class="team-member">
            <img src="profile_image.jpg" alt="Team Member 2">
            <h3>Jane Smith</h3>
            <p>Chief Operations Officer</p>
        </div>
        <div class="team-member">
            <img src="profile_image.jpg" alt="Team Member 3">
            <h3>Emily Johnson</h3>
            <p>Customer Success Manager</p>
        </div>
    </div>

    <h2>Contact Us</h2>
        <div class="contact-details">
            <p><strong>Headquarters:</strong> 123 Main Street, Cityville, Country</p>
            <p><strong>Phone:</strong> +1 234 567 890</p>
            <p><strong>Email:</strong> support@bikerental.com</p>
        </div>

        <h2>Our Location</h2>
        <div class="map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0867813763993!2d144.96305791531592!3d-37.81362797975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577f3eb7d3dd4a8!2s123%20Main%20St%2C%20Cityville!5e0!3m2!1sen!2sus!4v1690000000000!5m2!1sen!2sus"
                allowfullscreen="" loading="lazy"></iframe>
        </div>

</div>

<footer>
    <p>&copy; 2025 Bike Rental. All Rights Reserved.</p>
</footer>

</body>
</html>
