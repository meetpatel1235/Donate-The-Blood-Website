<?php 
// Include header file
include ('include/header.php');

if (isset($_POST['SignIn'])) {
    // Email input check
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Please fill the Email field.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';    
    }

    // Password input check
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
        // $password = md5($password);
    } else {
        $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Please fill the Password field.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';    
    }

    // Login query
    if (isset($email) && isset($password)) {
        $sql = "SELECT * FROM donor WHERE password='$password' AND email='$email'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['save_life_date'] = $row['save_life_date'];
                header('Location: user/index.php');
            }
        } else {
            $submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry! No Record Found. Please enter valid email or password.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
}
?>

<style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }
    .size {
        min-height: 0px;
        padding: 60px 0;
    }
    h1 {
        color: white;
    }
    .form-group {
        text-align: left;
    }
    h3 {
        color: #e74c3c;
        text-align: center;
    }
    .red-bar {
        width: 25%;
    }
    .form-container {
        background-color: white;
        border: 0.5px solid #eee;
        border-radius: 5px;
        padding: 20px 30px;
        box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>

<div class="container-fluid red-background size">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Sign In</h1>
            <hr class="white-bar">
        </div>
    </div>
</div>

<div class="container size">
    <div class="row">
        <div class="col-md-6 offset-md-3 form-container">
            <h3>Sign In</h3>
            <hr class="red-bar">

            <?php if (isset($submitError)) echo $submitError;?>

            <!-- Error Messages -->
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <?php if (isset($emailError)) echo $emailError;?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <?php if (isset($passwordError)) echo $passwordError;?>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-lg center-aligned" type="submit" name="SignIn">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
