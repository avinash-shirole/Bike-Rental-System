<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('firstpage_gt.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            color: #fff;
        }

        /* Gradient overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adds a dark overlay for contrast */
            z-index: 0;
        }

        #registration-page {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100%;
            padding-right: 100px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        form h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
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

        p {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Registration Page -->
    <div id="registration-page">
        <form action="" method="POST">
            <h1>Register</h1>
            <label for="new-username">Username:</label>
            <input type="text" id="new-username" name="name" required>

            <label for="new-password">Password:</label>
            <input type="password" id="new-password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>

    <?php
    $host="localhost";
    $user="root";
    $password="";
    $database="bike";
    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $insert_query = "INSERT INTO registration (name, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($insert_query) === TRUE) {
            echo "<script style='text-align: center; color: green;'> alert('New user created successfully.')</script>";
        } else {
            echo "<p style='text-align: center; color: red;'>Error: " . $conn->error . "</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
