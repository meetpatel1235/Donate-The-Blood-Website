<?php
// Start session
session_start();

// Database connection
$connection = mysqli_connect("localhost", "root", "", "donatetheblood");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['login'])) {
    // Get form data
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Query to check if the username exists in the admin table
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful and if the admin exists
    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $admin['password'])) {
            // Set session variables for login
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['username'] = $admin['username'];

            // Redirect to the dashboard after successful login
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Invalid username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
    <!-- External CSS for styling -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        /* General styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        h1 {
            color: #dc3545;
            text-align: center;
            margin-top: 20px;
            font-size: 2.5rem;
        }

        /* Login container */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh; /* Full viewport height for proper centering */
        }

        /* Login form */
        .login-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: all 0.3s ease;
        }

        /* Form title */
        .login-form h2 {
            color: #dc3545;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        /* Input fields */
        .login-form input {
            width: 100%;
            padding: 15px;
            margin: 12px -12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #f9f9f9;
            color: #555;
        }

        .login-form input:focus {
            outline: none;
            border-color: #dc3545;
            background-color: #fff;
        }

        /* Button styling */
        .login-form button {
            width: 50%;
            padding: 15px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #c82333;
        }

        /* Error message */
        .error-message {
            color: #c82333;
            font-size: 1.1rem;
            margin-top: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .login-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>

    <h1>Admin Login</h1>

    <!-- Login form -->
    <div class="login-container">
        <form class="login-form" method="POST" action="login.php">
            <h2>Login to Dashboard</h2>

            <?php
            if (isset($error_message)) {
                echo "<p class='error-message'>$error_message</p>";
            }
            ?>

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

</body>
</html>
