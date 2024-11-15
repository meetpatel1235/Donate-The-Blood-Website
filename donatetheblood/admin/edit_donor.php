<?php
$connection = mysqli_connect("localhost", "root", "", "donatetheblood");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $donor_id = $_GET['id']; // Use this for the SQL query
} else {
    echo "No donor ID provided.";
    exit(); // Stop the script if the ID is missing
}

// Fetch donor data for the specific donor
$query = "SELECT * FROM donor WHERE id = $donor_id";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $donor = mysqli_fetch_assoc($result);
} else {
    echo "Donor not found.";
    exit(); // Exit if no donor is found with that ID
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $contact_no = mysqli_real_escape_string($connection, $_POST['contact_no']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $dob = mysqli_real_escape_string($connection, $_POST['dob']);
    $save_life_date = mysqli_real_escape_string($connection, $_POST['save_life_date']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $blood_group = mysqli_real_escape_string($connection, $_POST['blood_group']);

    // Update donor data
    $update_query = "UPDATE donor SET name='$name', email='$email', contact_no='$contact_no', 
                     gender='$gender', city='$city', dob='$dob', save_life_date='$save_life_date', 
                     password='$password', blood_group='$blood_group' WHERE id=$donor_id";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        echo "Donor updated successfully!";
        header("Location: dashboard.php"); // Redirect after successful update
        exit();
    } else {
        echo "Error updating donor: " . mysqli_error($connection);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donor</title>

    <!-- Adding Google Font for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 2.5rem;
            color: #e74c3c;
        }

        /* Form Container */
        .form-container {
            width: 50%;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        /* Form Elements */
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="email"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        input[type="submit"] {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #e74c3c;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Mobile Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 80%;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <h1>Edit Donor Information</h1>

    <div class="form-container">
        <form method="POST" action="edit_donor.php?id=<?php echo $donor['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $donor['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $donor['email']; ?>" required>

            <label for="contact_no">Phone:</label>
            <input type="text" id="contact_no" name="contact_no" value="<?php echo $donor['contact_no']; ?>" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php echo ($donor['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($donor['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo ($donor['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo $donor['city']; ?>" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $donor['dob']; ?>" required>

            <label for="save_life_date">Save Life Date:</label>
            <input type="date" id="save_life_date" name="save_life_date" value="<?php echo $donor['save_life_date']; ?>">

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo $donor['password']; ?>" required>

            <label for="blood_group">Blood Group:</label>
            <input type="text" id="blood_group" name="blood_group" value="<?php echo $donor['blood_group']; ?>" required>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>

</body>
</html>

