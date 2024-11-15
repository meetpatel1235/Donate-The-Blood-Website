<nav id="mainNav" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="../index.php">DONATETHEBLOOD</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <!-- Left-aligned empty space, if needed -->
    </ul>

    <ul class="navbar-nav ml-auto my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../donor.php">Donors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../search.php">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../signin.php">Signin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../about.php">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="./index.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
          <a class="dropdown-item" href="./update.php"><i class="fa fa-edit" aria-hidden="true"></i> Update Profile</a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- Ensure Bootstrap and jQuery scripts are added at the end of the body -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
