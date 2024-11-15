<?php
$connection = mysqli_connect("localhost", "root", "", "donatetheblood");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
