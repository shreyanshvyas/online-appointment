<?php include('partials/header.php'); ?>
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$insert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    // Collect post variables
    $name = $_POST['name'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO `users`.`lab` (`name`, `type`, `date`, `email`, `phone`, `addr`, `gender`,`today`)VALUES ('$name', '$type', '$date', '$email', '$phone','$addr', '$gender', current_timestamp());";
    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
        echo'<div class="alert alert-success m-0" role="alert" data-mdb-color="success" id="customxD">
        <i class="fas fa-check-circle me-3"> </i>
        <strong>Great!</strong> Your appointment has been booked succesfully. You can now proceed for payment by scanning BARCODE given below to confirm your booking by <a href="payme2.php">Clicking here.</a>
        </div>';
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // Close the database connection
    $con->close();
}
?>
<div class="px-4 py-5 px-md-5 bg-image"
    style="background-image: url(&quot;img/b2.jpg&quot;); height: 1100px; background-size: cover; background-position: 50% 50%; background-color: rgba(0, 0, 0, 0);">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form class="transparent-input" method="post">
                                <div class="row mb-4">
                                    
                                        <div class="md-form md-outline">
                                            <input type="text" id="name" name="name"
                                                class="form-control form-control-lg" oninput="validate(this)" placeholder="Full Name"
                                                required />
                                        </div>
         
                                    
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="dropdown">
                                            <label class="form-label select-label ">Type: </label>
                                            <select id="type" name="type" class="select form-control form-control-lg "
                                                required>
                                                <option value="" selected> Select your test :</option>
                                                <option value="Blood count">Complete Blood Count- Rs.750/-</option>
                                                <option value="Basic Metabolic Panel">Basic Metabolic Panel- Rs.950/-
                                                </option>
                                                <option value="Comprehensive Metabolic Panel">Comprehensive Metabolic
                                                    Panel- Rs.1050/-</option>
                                                <option value="Lipid Panel">Lipid Panel- Rs.650/-</option>
                                                <option value="Liver Panel">Liver Panel- Rs.650/-</option>
                                                <option value="Thyroid Stimulating Hormone">Thyroid Stimulating Hormone-
                                                    Rs.450/-</option>
                                                <option value="Hemoglobin A1C">Haemoglobin A1C- Rs.450/-</option>
                                                <option value="Urinalysis">Urinalysis- Rs.550/-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="dropdown">
                                            <label class="form-label">Date: </label>
                                            <input type="date" id="date" name="date" class="form-control form-control-lg"
                                                 required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input type="email" id="email" class="form-control form-control-lg"
                                                name="email" placeholder="Email" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input id="phoneNumber" name="phone" class="form-control form-control-lg" oninput="validate(this)"
                                                placeholder="Phone Number" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="md-form md-outline mb-4">
                                    <input type="text" id="addr" name="addr" class="form-control form-control-lg" oninput="validate(this)"
                                        placeholder="Address" required />
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                            value="Male" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                            value="Female" />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                            value="Others" />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2 text-center">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('partials/footer.php'); ?>