<?php include('partials/header.php'); ?>
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$insert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    // echo "Success connecting to the db";
    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $dep = $_POST['dep'];
    $dr = $_POST['dr'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO `users`.`apt` (`name`, `age`, `dep`, `dr`, `date`, `time`, `email`, `phone`, `gender`, `today`)VALUES ('$name', '$age', '$dep', '$dr', '$date', '$time', '$email', '$phone', '$gender', current_timestamp());";
    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
        echo'<div class="alert alert-success m-0" role="alert" data-mdb-color="success" id="customxD">
        <i class="fas fa-check-circle me-3"> </i>
        You can now pay the booking charge which will we deducted from the total cost and you can pay the remaining amount after meeting the doctor. <a href="payme2.php">Pay here</a>
        </div>';
    }
    else{
        echo 'ERROR: $sql <br> $con->error';
    }

    // Close the database connection
    $con->close();
}
?>
<div class="px-4 py-5 px-md-5 bg-image"
    style="background-image: url(&quot;img/b1.jpg&quot;); height: 1100px; background-size: cover; background-position: 50% 50%; background-color: rgba(0, 0, 0, 0);">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form class="transparent-input" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="md-form md-outline">
                                            <input type="text" id="name" name="name" class="form-control form-control-lg" oninput="validate(this)" placeholder="Full name" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="md-form md-outline">
                                            <input type="text" id="age" name="age" class="form-control form-control-lg" oninput="validate(this)" placeholder="Age" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 mb-4 d-flex">
                                        <div class="dropdown">
                                            <label class="form-label select-label">Department</label>
                                            <select name="dep" id="dep" class="select form-control form-control-lg" required>
                                            <option value="" selected="selected">Select department</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex">
                                        <div class="dropdown">
                                            <label class="form-label select-label">Doctor</label>
                                            <select name="dr" id="dr" class="select form-control form-control-lg" required >
                                            <option value="" selected="selected">Please select department first</option> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex">
                                        <div class="dropdown datepicker">
                                            <label class="form-label">Date: </label>
                                            <input type="date" id="date" name="date" class="form-control form-control-lg" required></input>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex">
                                        <div class="dropdown">
                                            <label class="form-label select-label">Time</label>
                                            <select id="time" name="time" class="select form-control form-control-lg" required >
                                                <option value="" selected>Time: </option>
                                                <option value="9-12 hrs">9-12 hrs</option>
                                                <option value="12-15 hrs">12-15 hrs</option>
                                                <option value="16-19 hrs">16-19 hrs</option>
                                                <option value="19-22 hrs">19-22 hrs</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input type="email" id="email" name="email"
                                                class="form-control form-control-lg" oninput="validate(this)" placeholder="Email"required />
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input type="tel" id="phone" name="phone" oninput="validate(this)" class="form-control form-control-lg" placeholder="Phone number" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="maleGender" value="Male" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="femaleGender" value="Female" />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="otherGender" value="Other" />
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