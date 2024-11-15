<?php 
	include 'include/header.php'; 
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
		if (isset($_POST['date'])) {
			$showForm = '
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Are you sure to update your record?</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<form target="" method="post">
						<br>
						<input type="hidden" name="userID" value="'.$_SESSION['user_id'].'">
						<button type="submit" name="updateSave" class="btn btn-danger">Yes</button>
						<button type="button" class="btn btn-info" data-dismiss="alert">
							<span aria-hidden="true">Oops! No</span>
						</button>
					</form>
				</div>
			';
		}

		if (isset($_POST['userID'])) {
			$userID = $_POST['userID'];
			$crntDate = date_create();
			$crntDate = date_format($crntDate, 'Y-m-d');
			$sql = "UPDATE donor SET save_life_date='$crntDate' WHERE id='$userID' ";

			if(mysqli_query($connection, $sql)){
				$_SESSION['save_life_date'] = $crntDate;
				header("Location: index.php");
			} else {
				$submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Data Not Inserted. Please try again.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>';	
			}
		}
?>

<style>
	h1, h3 {
		display: inline-block;
		padding: 10px;
	}

	.name {
		color: #e74c3c;
		font-size: 22px;
		font-weight: 700;
	}

	.donors_data {
		background-color: white;
		border-radius: 5px;
		margin: 20px 5px 0px 5px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		box-shadow: 0px 2px 5px -2px rgba(89, 89, 89, 0.95);
		padding: 20px;
		transition: transform 0.3s ease, background-color 0.3s ease;
	}

	.donors_data:hover {
		transform: scale(1.02);
		background-color: #f9f9f9;
	}

	.alert {
		transition: opacity 0.3s ease;
	}

	.btn {
		transition: background-color 0.3s ease, transform 0.3s ease;
	}

	.btn:hover {
		background-color: #c0392b; /* Darker red on hover */
		transform: translateY(-2px);
	}

	.btn-info {
		background-color: #3498db;
	}

	.btn-info:hover {
		background-color: #2980b9; /* Darker blue on hover */
	}

	.panel {
		border: none;
		border-radius: 10px;
		-webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
		box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
	}
</style>

<div class="container" style="padding: 60px 0;">
	<div class="row">
		<div class="col-md-12 col-md-push-1">
			<div class="panel panel-default" style="padding: 20px;">
				<div class="panel-body">
					<?php if (isset($submitError)) echo $submitError; ?>

					<div class="alert alert-danger alert-dismissable" style="font-size: 18px; display: none;">
						<strong>Warning!</strong> Are you sure you want to save a life? If you press yes, then you will not be able to donate before 3 months.
						<div class="buttons" style="padding: 20px 10px;">
							<input type="text" value="" hidden="true" name="today">
							<button class="btn btn-primary" id="yes" name="yes" type="submit">Yes</button>
							<button class="btn btn-info" id="no" name="no">No</button>
						</div>
					</div>

					<div class="heading text-center">
						<h3>Welcome</h3> 
						<h1><?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?></h1>
					</div>
					<p class="text-center">Here you can manage your account and update your profile</p>

					<div class="test-success text-center" id="data" style="margin-top: 20px;">
						<?php if(isset($showForm)) echo $showForm; ?>
					</div>

					<?php
						$saveDate = $_SESSION['save_life_date'];
						if ($saveDate == '0') {
							echo '<form target="" method="post">
								<button style="margin-top: 20px;" name="date" id="save_the_life" type="submit" class="btn btn-lg btn-danger center-aligned ">Save The Life</button>
							</form>';
						} else {
							$start = date_create("$saveDate");
							$end = date_create();
							$diff = date_diff($start, $end);
							$diffMonth = $diff->m;

							if ($diffMonth >= 3) {
								echo '<form target="" method="post">
									<button style="margin-top: 20px;" name="date" id="save_the_life" type="submit" class="btn btn-lg btn-danger center-aligned ">Save The Life</button>
								</form>';
							} else {
								echo '<div class="donors_data">
									<span class="name">Congratulations!</span>
									<span>You have already saved a life. You will be able to donate blood after three months. We are very thankful to you.</span>
								</div>';
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	}else{
		header("Location: ../index.php");
	}
	include 'include/footer.php'; 
?>
