<?php 
  //include header file
  include ('include/header.php');

  if(isset($_POST['submit'])){
		
		if(isset($_POST['term']) === true){

			//Name Input Check
			if (isset($_POST['name']) && !empty($_POST['name'])) {
				
						if (preg_match('/^[A-Za-z\s]+$/', $_POST['name']))  {

								$name = $_POST['name'];
							
						}else{
									$nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Only lower and upper case and space characters are allow.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
						}
			}else{
						$nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please Fill the name fild.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}


			if (isset($_POST['gender']) && !empty($_POST['gender'])) {
				
						$gender = $_POST['gender'];
			}else{
						$genderError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select your gender.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}

			if (isset($_POST['day']) && !empty($_POST['day'])) {
				
						$day = $_POST['day'];
			}else{
						$dayError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select day.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}

			if (isset($_POST['month']) && !empty($_POST['month'])) {
				
						$month = $_POST['month'];
			}else{
						$monthError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select month.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}

			if (isset($_POST['year']) && !empty($_POST['year'])) {
				
						$year = $_POST['year'];
			}else{
						$yearError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select year.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}

			if (isset($_POST['blood_group']) && !empty($_POST['blood_group'])) {
				
						$blood_group = $_POST['blood_group'];
			}else{
						$blood_groupError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please select blood group.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}



			if (isset($_POST['city']) && !empty($_POST['city'])) {
				
						if (preg_match('/^[A-Za-z\s]+$/', $_POST['city'])) {

								$city = $_POST['city'];
							
						}else{
									$cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Only lower and upper case and space characters are allow.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
						}
			}else{
						$cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please Fill the city fild.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}

			//index
			if (isset($_POST['contact_no']) && !empty($_POST['contact_no'])) {
				
						if (preg_match('/\d{11}/', $_POST['contact_no'])) {

								$contact = $_POST['contact_no'];
							
						}else{
									$contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>contact should consist of 11 characters.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
						}
			}else{
						$contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please Fill the contact fild.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}

			if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {
    
    if (strlen($_POST['password']) >= 6) {
        
        if ($_POST['password'] == $_POST['c_password']) {
            $password = $_POST['password'];
        } else {
            $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Passwords are not the same.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
    
    } else {
        $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>The password should consist of at least 6 characters.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }

} else {
    $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please fill in the password fields.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}





			if (isset($_POST['email']) && !empty($_POST['email'])) {
				
						$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

						if (preg_match($pattern, $_POST['email'])) {

								$check_email = $_POST['email'];

								$sql = "SELECT email FROM donor WHERE email='$check_email' ";

								$result = mysqli_query($connection, $sql);

								if (mysqli_num_rows($result)>0) {
									$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Sorry this email already exist.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
								}else{
											$email = $_POST['email'];
								}

							
						}else{
									$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  									<strong>Please enter valid email address.</strong>
  									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
  									</button>
										</div>';	
						}
			}else{
						$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please Fill the email field.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
			}



				// Insert Data Into Database

				if (isset($name) && isset($blood_group) && isset($gender) && isset($day) && isset($month) && isset($year) && isset($email) && isset($contact) && isset($city) && isset($password)) {

					$DonorDOB = $year."-".$month."-".$day;
					$sql = "INSERT INTO donor(name,gender,email,city,dob,contact_no,save_life_date,password,blood_group) VALUES('$name','$gender','$email','$city','$DonorDOB','$contact','0','$password','$blood_group')";

					if (mysqli_query($connection,$sql)) {
										$submitSucess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Inserted Sucessfully.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
					}else{
									$submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Not Inserted. Please try again.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
					}
				}


				// Terms And Conditions Else
		}else{
		
					$termError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Please agree with over term and conditions.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';	
		}
	}



?>

<style>
	.size{
		min-height: 0px;
		padding: 60px 0 40px 0;
		
	}
	.form-container{
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
	}
	.form-group{
		text-align: left;
	}
	h1{
		color: white;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Donate</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .form-container h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #dc3545; /* Bootstrap danger color */
        }
        .red-bar {
            background-color: #dc3545;
            height: 2px;
            width: 50px;
            margin: 10px auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
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
        .form-inline {
            display: flex;
            /* justify-content: center;
            align-items: center; */
            margin-top: 10px;
        }
        .form-inline span {
            margin-left: 10px;
            color: #6c757d; /* Bootstrap secondary color */
        }
        @media (max-width: 768px) {
            .form-inline {
                flex-direction: column;
                align-items: flex-start;
            }
            .form-inline span {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<div class="container size">
    <div class="row">
        <div class="col-md-6 offset-md-3 form-container">
            <h3>Sign Up</h3>
            <hr class="red-bar">
            <?php if (isset($termError)) echo $termError;
                  if (isset($submitSucess)) echo $submitSucess;
                  if (isset($submitError)) echo $submitError;
            ?>
            <!-- Error Messages -->
            <form class="form-group" action="" method="post">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="name" id="fullname" placeholder="Full Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case and space" class="form-control" value="<?php if (isset($name)) echo $name;?>">
                    <?php if (isset($nameError)) echo $nameError;?>
                </div><!--full name-->
                <div class="form-group">
                    <label for="name">Blood Group</label><br>
                    <select class="form-control demo-default" id="blood_group" name="blood_group" required>
                        <option value="">---Select Your Blood Group---</option>
                        <?php if(isset($blood_group)) echo '<option selected="" value="'.$blood_group.'">'.$blood_group.'</option>' ?>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    <?php if (isset($blood_groupError)) echo $blood_groupError;?>
                </div><!--End form-group-->
                
                <div class="form-group">
                    <label for="gender">Gender</label><br>
                    Male<input type="radio" name="gender" id="gender" value="Male" style="margin-left:10px; margin-right:10px;" checked>
                    Female<input type="radio" name="gender" id="gender" value="Female" style="margin-left:10px;">
                    <?php if (isset($genderError)) echo $genderError;?>
                </div><!--gender-->
                
                <div class="form-inline">
                    <label for="name">Date of Birth</label><br>
                    <select class="form-control demo-default" id="date" name="day" style="margin-bottom:10px;" required>
                        <option value="">---Date---</option>
                        <?php if(isset($day)) echo '<option selected="" value="'.$day.'">'.$day.'</option>' ?>
                        <?php for($d = 1; $d <= 31; $d++): ?>
                            <option value="<?= str_pad($d, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($d, 2, '0', STR_PAD_LEFT) ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control demo-default" name="month" id="month" style="margin-bottom:10px;" required>
                        <option value="">---Month---</option>
                        <?php if(isset($month)) echo '<option selected="" value="'.$month.'">'.$month.'</option>' ?>
                        <?php for($m = 1; $m <= 12; $m++): ?>
                            <option value="<?= str_pad($m, 2, '0', STR_PAD_LEFT) ?>"><?= date("F", mktime(0, 0, 0, $m, 1)) ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control demo-default" id="year" name="year" style="margin-bottom:10px;" required>
                        <option value="">---Year---</option>
                        <?php if(isset($year)) echo '<option selected="" value="'.$year.'">'.$year.'</option>' ?>
                        <?php for($y = 1957; $y <= date("Y"); $y++): ?>
                            <option value="<?= $y ?>"><?= $y ?></option>
                        <?php endfor; ?>
                    </select>
                    <?php if (isset($dayError)) echo $dayError;?>
                    <?php if (isset($monthError)) echo $monthError;?>
                    <?php if (isset($yearError)) echo $yearError;?>
                </div><!--End form-group-->
                
                <div class="form-group">
                    <label for="fullname">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control" value="<?php if (isset($email)) echo $email;?>">
                    <?php if (isset($emailError)) echo $emailError;?>
                </div>
                
                <div class="form-group">
                    <label for="contact_no">Contact No</label>
                    <input type="text" name="contact_no" placeholder="0********" class="form-control" required pattern="^\d{11}$" title="11 numeric characters only" maxlength="11" value="<?php if (isset($contact)) echo $contact;?>">
                    <?php if (isset($contactError)) echo $contactError;?>
                </div><!--End form-group-->
                
                <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" id="city" class="form-control demo-default" required>
                        <option value="">-- Select --</option>
                        <?php if(isset($city)) echo '<option selected="" value="'.$city.'">'.$city.'</option>' ?>
                        <optgroup title="Gujarat" label="&raquo; Gujarat"></optgroup>
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Amreli">Amreli</option>
                        <option value="Anand">Anand</option>
                        <option value="Aravalli">Aravalli</option>
                        <option value="Banaskantha">Banaskantha</option>
                        <option value="Bharuch">Bharuch</option>
                        <option value="Bhavnagar">Bhavnagar</option>
                        <option value="Botad">Botad</option>
                        <option value="Chhota Udaipur">Chhota Udaipur</option>
                        <option value="Dahod">Dahod</option>
                        <option value="Dang">Dang</option>
                        <option value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                        <option value="Gandhinagar">Gandhinagar</option>
                        <option value="Gir Somnath">Gir Somnath</option>
                        <option value="Jamnagar">Jamnagar</option>
                        <option value="Junagadh">Junagadh</option>
                        <option value="Kheda">Kheda</option>
                        <option value="Kutch">Kutch</option>
                        <option value="Mahisagar">Mahisagar</option>
                        <option value="Mehsana">Mehsana</option>
                        <option value="Morbi">Morbi</option>
                        <option value="Narmada">Narmada</option>
                        <option value="Navsari">Navsari</option>
                        <option value="Panchmahal">Panchmahal</option>
                        <option value="Patan">Patan</option>
                        <option value="Porbandar">Porbandar</option>
                        <option value="Rajkot">Rajkot</option>
                        <option value="Sabarkantha">Sabarkantha</option>
                        <option value="Surat">Surat</option>
                        <option value="Surendranagar">Surendranagar</option>
                        <option value="Tapi">Tapi</option>
                        <option value="Vadodara">Vadodara</option>
                        <option value="Valsad">Valsad</option>
                    </select>
                    <?php if (isset($cityError)) echo $cityError;?>
                </div><!--city end-->

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" placeholder="Password" class="form-control" required pattern=".{6,}">
                </div><!--End form-group-->
                
                <div class="form-group">
                    <label for="c_password">Confirm Password</label>
                    <input type="password" name="c_password" value="" placeholder="Confirm Password" class="form-control" required pattern=".{6,}">
                </div><!--End form-group-->
                
                <div class="form-inline">
                    <input type="checkbox" checked="" name="term" value="true" required style="margin-left:10px;">
                    <span style="margin-left:10px;"><b>I agree to donate my blood and show my Name, Contact No., and Email in the Blood Donors List</b></span>
                </div><!--End form-group-->
                
                <div class="form-group">
                    <button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php 
  //include footer file
  include ('include/footer.php');
?>