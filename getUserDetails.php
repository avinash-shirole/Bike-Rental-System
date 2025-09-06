<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(225, 183, 236);
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="file"] {
            padding: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .bike-details img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <div class="form-container">

        <h1>Fill your Details</h1>

<?php 

// Check if the bikeImage parameter is present in the URL
if (isset($_GET['bikeImage'])) {
    // Store the bike image path in a session variable
    $_SESSION['bikeImage'] = $_GET['bikeImage'];
}

// Display the bike image
if (isset($_SESSION['bikeImage'])) {
    echo "<h1>Selected Bike</h1>";
    echo "<img src='" . htmlspecialchars($_SESSION['bikeImage']) . "' alt='Selected Bike' style='width:300px;height:200px;'>";
} else {
    echo "<h1>No bike selected.</h1>";
}

?>

        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Full Name -->
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full_name" placeholder="Enter your full name" required>

            <!-- Phone Number -->
            <label for="phone-number">Phone Number:</label>
            <input type="tel" id="phone-number" name="phone_number" placeholder="Enter your phone number" pattern="[0-9]{10}" required>

            <!-- Address -->
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" placeholder="Enter your address" required></textarea>

            <!-- Profile Image -->
            <label for="profile-image">Upload Profile Image:</label>
            <input type="file" id="profile-image" name="profile_image" accept="image/*" required>

            <!-- Driving License -->
            <label for="driving-license">Upload Driving License Photo:</label>
            <input type="file" id="driving-license" name="driving_license" accept="image/*" required>
        
             <!--  Scan QR code to make payments -->
             <img src="paymentOnThis.jpg" alt="QR Code for Payment" style="width:300px;height:200px;">

            <!-- Payment Screenshot -->
            <label for="payment-screenshot">Upload Payment Screenshot Photo:</label>
            <input type="file" id="payment-screenshot" name="payment_screenshot" accept="image/*" required>

            <!-- Rental Start Date and Time -->
            <label for="start-date">Rental Start Date:</label>
            <input type="date" id="start-date" name="start_date" required>

            <label for="start-time">Rental Start Time:</label>
            <input type="time" id="start-time" name="start_time" required>

            <!-- Rental End Date and Time -->
            <label for="end-date">Rental End Date:</label>
            <input type="date" id="end-date" name="end_date" required>

            <label for="end-time">Rental End Time:</label>
            <input type="time" id="end-time" name="end_time" required>

            <!-- Submit Button -->
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = htmlspecialchars($_POST['full_name']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $address = htmlspecialchars($_POST['address']);
    $start_date = htmlspecialchars($_POST['start_date']);
    $start_time = htmlspecialchars($_POST['start_time']);
    $end_date = htmlspecialchars($_POST['end_date']);
    $end_time = htmlspecialchars($_POST['end_time']);

    // Database connection
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "bike";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // File uploads
    $uploads = ['profile_image', 'driving_license', 'payment_screenshot'];
    $file_data = [];

    foreach ($uploads as $file) {
        if (isset($_FILES[$file]) && $_FILES[$file]['error'] === UPLOAD_ERR_OK) {
            $file_data[$file] = file_get_contents($_FILES[$file]['tmp_name']);
        } else {
            die("Error uploading $file");
        }
    }

    $selected_bike_data = isset($_SESSION['bikeImage']) ? file_get_contents($_SESSION['bikeImage']) : null;

    // Prepare and bind the SQL query
    $stmt = $conn->prepare(
        "INSERT INTO users (full_name, phone_number, address, profile_image, driving_license, payment_screenshot, bike_image, start_date, start_time, end_date, end_time) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param(
        'sssssssssss',
        $full_name,
        $phone_number,
        $address,
        $file_data['profile_image'],
        $file_data['driving_license'],
        $file_data['payment_screenshot'],
        $selected_bike_data,
        $start_date,
        $start_time,
        $end_date,
        $end_time
    );

    if ($stmt->execute()) {
        echo "<script> alert('Bike booked successfully.')</script>";
    } else {
        echo "<script>Error: " . $stmt->error . "</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

</body>
</html>
