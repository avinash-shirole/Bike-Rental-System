<?php
// Start the session
session_start();

// Check if the user is logged in (Assuming the user ID is stored in the session)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's ID
$user_name = $_SESSION['username'];

// Database connection
$host = "localhost";
$user = "root";
$db_password = "";
$database = "bike";

$conn = new mysqli($host, $user, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$sql = "SELECT full_name, phone_number, address, profile_image, driving_license, payment_screenshot, bike_image FROM users WHERE full_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "No user data found.";
    exit();
}

$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            max-width: 600px;
            max-height: 600px;
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
        .profile-details {
            margin-top: 20px;
        }
        .profile-details img {
            display: block;
            margin: 10px auto;
            max-width: 100%;
            border-radius: 10px;
        }
        .profile-details div {
            margin-bottom: 15px;
        }
        .profile-details div span {
            font-weight: bold;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>User Profile</h1>
        <div class="profile-details">
            <div><span>Full Name:</span> <?php echo htmlspecialchars($user['full_name']); ?></div>
            <div><span>Phone Number:</span> <?php echo htmlspecialchars($user['phone_number']); ?></div>
            <div><span>Address:</span> <?php echo htmlspecialchars($user['address']); ?></div>
            
            <div><span>Profile Image:</span></div>
            <?php if ($user['profile_image']): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($user['profile_image']); ?>" alt="Profile Image">
            <?php else: ?>
                <p>No profile image available.</p>
            <?php endif; ?>
            
            <div><span>Driving License:</span></div>
            <?php if ($user['driving_license']): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($user['driving_license']); ?>" alt="Driving License">
            <?php else: ?>
                <p>No driving license image available.</p>
            <?php endif; ?>
            
            <div><span>Payment Screenshot:</span></div>
            <?php if ($user['payment_screenshot']): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($user['payment_screenshot']); ?>" alt="Payment Screenshot">
            <?php else: ?>
                <p>No payment screenshot available.</p>
            <?php endif; ?>
            
            <div><span>Bike Image:</span></div>
            <?php if ($user['bike_image']): ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($user['bike_image']); ?>" alt="Bike Image">
            <?php else: ?>
                <p>No bike image available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
