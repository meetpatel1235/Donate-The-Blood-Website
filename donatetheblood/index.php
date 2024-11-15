<?php 
//include header file
include ('include/header.php');
?>

<div class="container-fluid header-img" style="background-image: url('img/bloodbank2.jpg');">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="header">
                <h1 class="text-center">Donate the blood, save the life</h1>
                <p class="text-center">Donate the blood to help the others.</p>
            </div>

            <h1 class="text-center">Search The Donors</h1>
            <hr class="white-bar text-center">

            <form action="search.php" method="get" class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
    <div class="form-group text-center justify-content-center">
        <select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default" required>
            <option value="">-- Select City --</option>
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
            <!-- Add more blood groups -->
        </select>
    </div>
    <div class="form-group center-aligned">
        <button type="submit" id="search" class="btn btn-lg search-btn">
            <i class="fa fa-search"></i> Search
        </button>
    </div>
</form>

        </div>
    </div>
</div>
<!-- header ends -->

<!-- donate section -->
<div class="container-fluid red-background">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center" style="color: white; font-weight: 700;padding: 10px 0 0 0;">Donate The Blood</h1>
            <hr class="white-bar">
            <p class="text-center pera-text">
                We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.

                We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
            </p>
            <a href="#" class="btn btn-default btn-lg text-center d-block mx-auto mb-2" style="width: fit-content;">Become a Life Saver!</a>
        </div>
    </div>
</div>

<!-- end donate section -->

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card custom-card">
                <h3 class="text-center red">Our Vision</h3>
                <img src="img/binoculars.png" alt="Our Vision" class="img img-responsive" width="168" height="168">
                <p class="text-center">
                    We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                </p>
            </div>
        </div>

        <div class="col">
            <div class="card custom-card">
                <h3 class="text-center red">Our Goal</h3>
                <img src="img/target.png" alt="Our Goal" class="img img-responsive" width="168" height="168">
                <p class="text-center">
                    We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                </p>
            </div>
        </div>

        <div class="col">
            <div class="card custom-card">
                <h3 class="text-center red">Our Mission</h3>
                <img src="img/goal.png" alt="Our Mission" class="img img-responsive" width="168" height="168">
                <p class="text-center">
                    We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- end about us section -->

<?php
//include footer file
include ('include/footer.php');
?>

<!-- CSS for design and animations -->
<style>
/* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #ff5e62, #ff9966);
    color: white;
}

/* Custom Selects with Icons */
select {
    background-color: rgba(255, 255, 255, 0.2);
    color: #333;
    border-radius: 5px;
    border: 2px solid #fff;
    transition: all 0.3s ease;
    background-position: right 10px center;
    background-size: 20px;
    background-repeat: no-repeat;
}

select option {
    padding-left: 20px;
}

/* Search Button with Icon and Animation */
.search-btn {
    background-color: white;
    color: #e74c3c;
    border: 2px solid #e74c3c;
    padding: 12px 20px;
    font-size: 1.2rem;
    font-weight: bold;
    border-radius: 30px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-btn i {
    margin-right: 8px;
    font-size: 18px; /* Adjust icon size */
}

.search-btn:hover {
    background-color: #e74c3c;
    color: white;
    transform: scale(1.1);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Focused State for Search Button */
.search-btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(231, 76, 60, 0.7);
}

/* Search Button Hover with Icon */
#search {
    background-color: white;
    color: #e74c3c;
    border: 2px solid #e74c3c;
    padding: 12px 20px;
    font-size: 1.2rem;
    font-weight: bold;
    border-radius: 30px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

#search i {
    margin-right: 8px;
}

#search:hover {
    background-color: #e74c3c;
    color: white;
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

/* Animations */
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes slideIn {
    0% { opacity: 0; transform: translateX(-50px); }
    100% { opacity: 1; transform: translateX(0); }
}

/* Apply to all card animations */
.card {
    animation: slideIn 1.5s ease-out;
    background-color: #fff;
    color: #333;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

