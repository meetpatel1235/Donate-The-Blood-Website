<?php
    include ('include/header.php');
?>

<style>
    /* Main styling for the section */
    .size {
        min-height: 0px;
        padding: 60px 0 40px 0;
    }
    
    .container-fluid.red-background {
        background-color: #e74c3c;
        color: white;
    }

    .loader {
        display: none;
        width: 69px;
        height: 89px;
        position: absolute;
        top: 25%;
        left: 50%;
        padding: 2px;
        z-index: 1;
    }

    .loader .fa {
        color: #e74c3c;
        font-size: 52px !important;
    }

    .form-group {
        text-align: left;
    }

    h1 {
        color: white;
        text-align: center;
        font-size: 2.5rem;
    }

    .red-bar {
        width: 25%;
        height: 4px;
        background-color: white;
        margin: 0 auto;
        border-radius: 2px;
    }

    .donors_data {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 20px;
        margin: 15px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .donors_data:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }

    .donors_data::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 200%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 0.1) 100%);
        transition: left 0.5s ease;
    }

    .donors_data:hover::before {
        left: 100%;
    }

    .name {
        font-size: 1.25rem;
        font-weight: bold;
        color: #e74c3c;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Icon styling for the blood drop */
    .name .icon {
        color: #e74c3c;
        margin-right: 5px;
        font-size: 1.5rem;
    }

    .donors_data span {
        display: block;
        font-size: 1rem;
        color: #333;
    }

    .donated-label {
    color: #e74c3c;
    font-size: 1.25rem;
    font-weight: bold;
    margin-top: 15px;
    background-color: rgba(300, 80, 80, 0.5); /* Light background to highlight */
    padding: 5px 10px;
    border-radius: 5px;
}


    /* Responsive styling */
    @media (max-width: 768px) {
        .donors_data {
            margin: 10px 0;
        }
    }
</style>

<div class="container-fluid red-background size">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Donors</h1>
            <hr class="red-bar">
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <div class="row justify-content-center data">
        <?php
            // Query to fetch all donor data
            $sql = "SELECT * FROM donor";
            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Loop through each donor record
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['save_life_date'] === '0' || $row['save_life_date'] === 0) {
                        echo '
                            <div class="col-md-3 col-sm-12 col-lg-3 donors_data">
                                <span class="name">
                                    <i class="fas fa-tint icon"></i>' . $row['name'] . '
                                </span>
                                <span>' . $row['city'] . '</span>
                                <span>' . $row['blood_group'] . '</span>
                                <span>' . $row['gender'] . '</span>
                                <span>' . $row['email'] . '</span>
                                <span>' . $row['contact_no'] . '</span>
                            </div>';
                    } else {
                        echo '
                            <div class="col-md-3 col-sm-12 col-lg-3 donors_data">
                                <span class="name">
                                    <i class="fas fa-tint icon"></i>' . $row['name'] . '
                                </span>
                                <span>' . $row['city'] . '</span>
                                <span>' . $row['blood_group'] . '</span>
                                <span>' . $row['gender'] . '</span>
                                <span class="donated-label">Donated</span>
                            </div>';
                    }
                }
            } else {
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data Not Found</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
        ?>
    </div>
</div>

<?php
    include ('include/footer.php');
?>
