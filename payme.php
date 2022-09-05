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
    $upi = $_POST['upi'];
    $t_id = $_POST['t_id'];
    $sql = "INSERT INTO `p1` (`upi`, `t_id`, `today`) VALUES ('$upi', '$t_id', current_timestamp());";
    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
        echo'<div class="alert alert-success m-0" role="alert" data-mdb-color="success" id="customxD">
        <i class="fas fa-check-circle me-3"> </i>
        <strong>Great!</strong> Payment processed. You can show payment reciept of valid payment, at reception to visit doctor Hassle-free.
        </div>'; }
        // Close the database connection
        $con->close();
    }
        ?>
<section style="background-color: #9A616D; height:900px;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row gx-lg-5 align-items-center ">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="bg-image hover-overlay ripple shadow-4-strong rounded-4"
                                data-mdb-ripple-color="light">
                                <img src="img/pay5.jpg" class="w-100" alt="QR Code" aria-controls="#picker-editor">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2 mb-md-0 p-4 p-lg-5">
                            <form method="post">
                                <div class="d-flex align-items-center mb-3 pb-1 ">
                                    <i class="fas fa-inr fa-2x me-3" style="color: #ff6219;"></i>
                                    <span class="h1 fw-bold mb-0">Online Payment</span>
                                </div>
                                <h6 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Scan this code and enter
                                    your UPI ID and Phone number below to confirm your booking.</h6>
                                <div class="form-outline mb-4">
                                    <input type="text" id="upi" name="upi" class="form-control form-control-lg"
                                        oninput="validate(this)" />
                                    <label class="form-label" for="upi">Your UPI ID</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" id="t_id" name="t_id" class="form-control form-control-lg"
                                        oninput="validate(this)" />
                                    <label class="form-label" for="t_id">Transaction ID</label>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include('partials/footer.php'); ?>