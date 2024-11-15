<?php
// Define the current page
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style type="text/css">
    body {
        font-family: Arial, sans-serif; /* Use a clean font */
        background-color: #f4f4f4; /* Light background for contrast */
    }

    #sidebar-collapse {
        background-color: #2c3e50; /* Dark sidebar background */
        height: 100vh; /* Full height */
        color: white; /* Text color */
        padding-top: 20px; /* Top padding */
    }

    .customNav {
        position: relative; /* Changed to relative for better alignment */
        padding: 20px; /* Padding for spacing */
    }

    .customNav ul {
        list-style-type: none; /* No bullet points */
        margin: 0;
        padding: 0;
    }

    .customNav li {
        margin: 15px 0; /* Space between list items */
    }

    .customNav li a {
        display: block;
        padding: 15px 20px; /* Padding for links */
        text-decoration: none; /* No underline */
        color: white; /* Link text color */
        border-radius: 5px; /* Rounded corners */
        transition: background-color 0.3s; /* Smooth transition for hover */
    }

    .customNav li a:hover {
        background-color: #34495e; /* Darker background on hover */
    }

    .customNav li.active a {
        background-color: #2980b9; /* Active link color */
    }

    .customNav li a i {
        margin-right: 10px; /* Space between icon and text */
    }
</style>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="customNav">
        <ul class="nav">
            <li class="<?= $current_page == 'index.php' ? 'active' : '' ?>">
                <a href="index.php"><i class="fa fa-user" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li class="<?= $current_page == 'update.php' ? 'active' : '' ?>">
                <a href="update.php"><i class="fa fa-edit" aria-hidden="true"></i>Update</a>
            </li>
            <li class="<?= $current_page == 'logout.php' ? 'active' : '' ?>">
                <a href="logout.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Logout</a>
            </li>
        </ul>
    </div>
</div><!--/.sidebar-->
