<?php
$connection = mysqli_connect("localhost", "root", "", "donatetheblood");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Define the username and password
$username = "meethadvani6@gmail.com";
$password = "123456";

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert the new admin user
$insertAdmin = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

// Execute the query
if (mysqli_query($connection, $insertAdmin)) {
    echo "Admin user added successfully!";
} else {
    echo "Error inserting user: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
