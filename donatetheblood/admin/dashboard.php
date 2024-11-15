<?php
// Start session and check if the admin is logged in
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Database connection
$connection = mysqli_connect("localhost", "root", "", "donatetheblood");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch total donor count
$total_donors_query = "SELECT COUNT(*) AS total_donors FROM donor";
$total_donors_result = mysqli_query($connection, $total_donors_query);
$total_donors_data = mysqli_fetch_assoc($total_donors_result);

// Fetch count of each blood group
$blood_group_query = "SELECT blood_group, COUNT(*) AS count FROM donor GROUP BY blood_group";
$blood_group_result = mysqli_query($connection, $blood_group_query);

// Fetch count of donors per city
$city_query = "SELECT city, COUNT(*) AS count FROM donor GROUP BY city";
$city_result = mysqli_query($connection, $city_query);

// Fetch all donors' information
$donors_query = "SELECT * FROM donor";
$donors_result = mysqli_query($connection, $donors_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* General styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }

        h1, h2 {
            color: #dc3545;
            font-weight: bold;
        }

        /* Navbar styles */
        .navbar {
            background-color: #dc3545;
        }

        .navbar-brand {
            color: white !important;
            font-size: 24px;
            font-weight: 600;
        }

        .navbar-nav .nav-item .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #ff6347;
        }

        /* Animation for navbar items */
        .navbar-nav .nav-item {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(20px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .dashboard-container {
            display: flex;
            justify-content: space-between;
            margin: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .dashboard-section {
            width: 30%;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .dashboard-section:hover {
            transform: scale(1.05);
        }

        .dashboard-section h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .dashboard-section p {
            font-size: 1.2rem;
        }

        .donor-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            animation: tableFadeIn 1s ease-in-out;
        }

        @keyframes tableFadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .donor-table th, .donor-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .donor-table th {
            background-color: #dc3545;
            color: white;
        }

        .donor-table td a {
            color: #dc3545;
            text-decoration: none;
        }

        .donor-table td a:hover {
            text-decoration: underline;
            color: #ff6347;
        }

        .donor-info-container {
            animation: fadeIn 1s ease-in-out;
        }

        /* Icons */
        .icon {
            font-size: 40px;
            color: #dc3545;
            margin-bottom: 10px;
        }

        .btn-light {
            color: #dc3545;
            background-color: white;
            border: 1px solid #dc3545;
        }

        .btn-light:hover {
            background-color: #dc3545;
            color: white;
            border-color: #dc3545;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
                align-items: center;
            }

            .dashboard-section {
                width: 80%;
                margin-bottom: 20px;
            }
        }

    </style>
</head>
<body>

    <!-- Navbar (Header Bar) -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="#">DONATETHEBLOOD <i class="fas fa-tint"></i></a>
        <div class="ml-auto">
            <a class="btn btn-light" href="logout.php" role="button">Logout <i class="fas fa-sign-out-alt"></i></a>
        </div>
    </nav>

    <div class="container" style="margin-top: 80px;">

        <h1 class="text-center my-4">Donor Dashboard</h1>

        <!-- Dashboard overview section -->
        <div class="dashboard-container">
            <div class="dashboard-section">
                <i class="fas fa-users icon"></i>
                <h2>Total Donors</h2>
                <p><?php echo $total_donors_data['total_donors']; ?></p>
            </div>

            <div class="dashboard-section">
                <i class="fas fa-tint icon"></i>
                <h2>Blood Group Count</h2>
                <?php while ($row = mysqli_fetch_assoc($blood_group_result)) { ?>
                    <p><?php echo $row['blood_group'] . ": " . $row['count']; ?></p>
                <?php } ?>
            </div>

            <div class="dashboard-section">
                <i class="fas fa-city icon"></i>
                <h2>Donors by City</h2>
                <?php while ($row = mysqli_fetch_assoc($city_result)) { ?>
                    <p><?php echo $row['city'] . ": " . $row['count']; ?></p>
                <?php } ?>
            </div>
        </div>

        <!-- Donor information table -->
        <div class="donor-info-container">
            <h2 style="text-align: center;">Donor Information</h2>
            <table class="donor-table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Contact</th>
                    <th>Blood Group</th>
                    <th>Action</th>
                </tr>

                <?php while ($donor = mysqli_fetch_assoc($donors_result)) { ?>
                    <tr>
                        <td><?php echo $donor['id']; ?></td>
                        <td><?php echo $donor['name']; ?></td>
                        <td><?php echo $donor['gender']; ?></td>
                        <td><?php echo $donor['email']; ?></td>
                        <td><?php echo $donor['city']; ?></td>
                        <td><?php echo $donor['contact_no']; ?></td>
                        <td><?php echo $donor['blood_group']; ?></td>
                        <td><a href="edit_donor.php?id=<?php echo $donor['id']; ?>">Edit</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
