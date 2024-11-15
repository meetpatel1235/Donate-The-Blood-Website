<?php
$connection = mysqli_connect("localhost", "root", "", "donatetheblood");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch all donor data from the database
$query = "SELECT * FROM donor";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Donors</title>
</head>
<body>
    <h1>View Donors</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['donor_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td><a href='edit_donor.php?id=" . $row['donor_id'] . "'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
