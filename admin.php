<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="stylefor_admin_index.css"/>
</head>
<body>

<!-- nav bar -->
<nav class="navbar">
    <a class="navbar-brand" href="#">Bike Rental</a>
    <ul>
        <li><a href="admin.php">Home</a></li>
        <li><a href="about-us.html">About Us</a></li>
        <li>
            <a href="#">Account</a>
            <div class="dropdown">
                <a href="profile.html">My Profile</a>
                <a href="admin_login.php">Logout</a>
            </div>
        </li>
        <li>
            <a href="admin.php">Admin</a>
            <div class="dropdown">
                <a href="manage-bikes.html">Manage Bikes</a>
                <a href="view-rentals.html">View Rentals</a>
                <a href="settings.html">Settings</a>
            </div>
        </li>
    </ul>
</nav>
<!-- nav bar ends here -->

<div class="container">
    <h1>Admin Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>End Date</th>
                <th>End Time</th>
                <th>Profile Image</th>
                <th>Driving License</th>
                <th>Payment Screenshot</th>
                <th>Bike Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
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

            // Fetch all user data
            $sql = "SELECT id, full_name, phone_number, address, start_date, start_time, end_date, end_time, 
                    profile_image, driving_license, payment_screenshot, bike_image FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Display data and decode images from the database
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . htmlspecialchars($row['full_name']) . "</td>
                            <td>" . htmlspecialchars($row['phone_number']) . "</td>
                            <td>" . htmlspecialchars($row['address']) . "</td>
                            <td>" . htmlspecialchars($row['start_date']) . "</td>
                            <td>" . htmlspecialchars($row['start_time']) . "</td>
                            <td>" . htmlspecialchars($row['end_date']) . "</td>
                            <td>" . htmlspecialchars($row['end_time']) . "</td>";

                    // Display profile image
                    if ($row['profile_image']) {
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['profile_image']) . "' alt='Profile Image' width='100'></td>";
                    } else {
                        echo "<td>No image</td>";
                    }

                    // Display driving license
                    if ($row['driving_license']) {
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['driving_license']) . "' alt='Driving License' width='100'></td>";
                    } else {
                        echo "<td>No image</td>";
                    }

                    // Display payment screenshot
                    if ($row['payment_screenshot']) {
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['payment_screenshot']) . "' alt='Payment Screenshot' width='100'></td>";
                    } else {
                        echo "<td>No image</td>";
                    }

                    // Display bike image
                    if ($row['bike_image']) {
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['bike_image']) . "' alt='Bike Image' width='100'></td>";
                    } else {
                        echo "<td>No bike image</td>";
                    }

                    // Action buttons
                    echo "<td>
                             <a href='admin.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")' class='btn-delete'>Delete</a>
                              <button class='btn-approve' onclick='approveUser(" . $row['id'] . ")'>Approve</button>
                          </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No users found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="logout.php" class="btn-logout">Logout</a>
</div>

</body>
</html>


<?php
// Check if the delete action is triggered
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

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

    // Delete query
    $sql = "DELETE FROM users WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>
<script>
    function approveUser(id) {
        alert("Approved Successfully");
        
    }
</script>
