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
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $dis = $_POST['dis'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO `users`.`ov` (`name`, `gender`, `city`, `age`, `dis`, `email`, `phone`,`today`)VALUES ('$name', '$gender','$city', '$age','$dis', '$email', '$phone', current_timestamp());";
    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
        echo'<div class="alert alert-success m-0" role="alert" data-mdb-color="success" id="customxD">
        <i class="fas fa-check-circle me-3"> </i>
        <strong>Great!</strong> Your appointment has been booked succesfully. You can now proceed for payment by scanning QR CODE given below to confirm your booking. <a href="payme.php">Click here</a>
        </div>';
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // Close the database connection
    $con->close();
}
?>
<section class="h-100 bg-dark">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="img/b3.jpg" alt="Sample photo" class="img-fluid"
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:750px;" />
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-5 text-black">
                                <h3 class="mb-5 text-uppercase">Booking for Video Conferencing</h3>
                                <form method="post">
                                            <div class="md-form md-outline mb-4">
                                                <input type="text" id="name" name="name"
                                                    class="form-control form-control-lg" oninput="validate(this)" placeholder="Full Name"
                                                    required />
                                    </div>
                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                        <h6 class="mb-0 me-4">Gender: </h6>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                                value="Female" />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                                value="Male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0">
                                            <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                                value="Others" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>
                                    </div>
                                    <div class="md-form md-outline mb-4">
                                        <input type="text" id="city" name="city" class="form-control form-control-lg" oninput="validate(this)"
                                            placeholder="City" required />
                                    </div>
                                    <div class="md-form md-outline mb-4">
                                        <input id="age" name="age" class="form-control form-control-lg" oninput="validate(this)"
                                            placeholder="Age" required />
                                    </div>
                                    <div class="md-form md-outline mb-4">
                                        <input id="form3Example99" name="dis" class="form-control form-control-lg" oninput="validate(this)"
                                            placeholder="Disease/Problem" required />
                                    </div>
                                    <div class="md-form md-outline mb-4">
                                        <input type="email" id="form3Example97" name="email"
                                            class="form-control form-control-lg " oninput="validate(this)" placeholder="Email" required />
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input id="phoneNumber" name="phone" class="form-control form-control-lg" oninput="validate(this)"
                                                placeholder="Phone Number" required />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center pt-3">
                                        <input type="reset" value="Reset" class="btn btn-light btn-lg"></input>
                                        <input type="submit" value="Submit" class="btn btn-warning btn-lg ms-2"></input>
                                    </div>
                            </div>
                </section>
<?php include('partials/footer.php'); ?>