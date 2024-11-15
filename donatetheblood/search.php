<?php 
	// Include header file
	include ('include/header.php');
?>

<style>
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
		background-color: white;
		border-radius: 10px;
		margin: 20px;
		box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
		padding: 20px;
		text-align: center;
		position: relative;
		overflow: hidden;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
	}

	.donors_data:hover {
		transform: scale(1.05);
		box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
	}

	.name {
		font-size: 1.25rem;
		font-weight: bold;
		color: #e74c3c;
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
		margin-top: 10px;
	}

	/* Icon styling */
	.icon {
		font-size: 1.5rem;
		color: #e74c3c;
		margin-right: 5px;
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
			<h1>Search Donors</h1>
			<hr class="red-bar">
			<br>
			<div class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
				<div class="form-group text-center center-aligned">
					<select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default" required>
						<option value="">-- Select City --</option>
						<!-- Add city options here -->
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
				</div>
				<div class="form-group center-aligned">
					<select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;" class="form-control demo-default text-center margin10px">
						<option value="">-- Select Blood Group --</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
					</select>
				</div>
				<div class="form-group center-aligned">
					<button type="button" class="btn btn-lg btn-default" id="search">Search</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container" style="padding: 60px 0 60px 0;">
	<div class="row" id="data">
		<?php
			if((isset($_GET['city']) && !empty($_GET['city'])) && (isset($_GET['blood_group']) && !empty($_GET['blood_group']))) {
				$city = $_GET['city'];
				$blood_group = $_GET['blood_group'];

				$sql = "SELECT * FROM donor WHERE city = '$city' OR blood_group = '$blood_group'";
				$result = mysqli_query($connection, $sql);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						if ($row['save_life_date'] === '0' || is_null($row['save_life_date']) || trim($row['save_life_date']) === '') {
							echo '
								<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
									<span class="name"><i class="fas fa-tint icon"></i>' . $row['name'] . '</span>
									<span>' . $row['city'] . '</span>
									<span>' . $row['blood_group'] . '</span>
									<span>' . $row['gender'] . '</span>
									<span>' . $row['email'] . '</span>
									<span>' . $row['contact_no'] . '</span>
								</div>';
						} else {
							echo '
								<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
									<span class="name"><i class="fas fa-tint icon"></i>' . $row['name'] . '</span>
									<span>' . $row['city'] . '</span>
									<span>' . $row['blood_group'] . '</span>
									<span>' . $row['gender'] . '</span>
									<h4 class="donated-label">Donated</h4>
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
			}
		?>
	</div>
</div>

<div class="loader" id="wait">
	<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
</div>

<?php 
	// Include footer file
	include ('include/footer.php');
?>

<script type="text/javascript">
	$(function() {
		$("#search").on('click', function() {
			var city = $("#city").val();
			var blood_group = $("#blood_group").val();

			$.ajax({
				type: 'GET',
				url: 'ajaxsearch.php',
				data: { city: city, blood_group: blood_group },
				success: function(data) {
					if (!data.error) {
						$("#data").html(data);
					}
				}
			});
		});
	});
</script>
