<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // Check whether this username exists
    $existSql = "SELECT * FROM `login` WHERE email = '$email'";
    $result = mysqli_query($con, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
    if($password == $cpassword){
      $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`.`login` ( `name`, `phone`, `email`, `password`) VALUES ('$name', '$phone', '$email','$hash')";
        $result = mysqli_query($con, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}   
}
?>
<?php include('partials/header.php'); ?>
<?php
    if($showAlert){
      echo ' <div class="alert alert-success alert-dismissible fade show m-0" style="text-align: center" role="alert" data-mdb-color="success" id="customxD">
      <strong>Account created succesfully!</strong> You can now Login to your account by <a href="login.php"> Clicking here.</a>
      <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close">
  </div>';
    }
    if($showError){
      echo ' <div class="alert alert-danger alert-dismissible fade show" style="text-align: center" role="alert" data-mdb-color="danger" id="customxD">
      <h6><strong>Error! </strong>'. $showError.'</h6>
      <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close">
  </div>';
    }
    ?>
<section>
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                    We are here to hear and heal your <br />
                        <span class="text-primary">health problems.</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">We are providing best-class services in our sector. We here,
                        starting services for your convienence. Now you can book online appointment for in-clinic
                        checkups. Contact doctors online and get treated via video and voice call in emergencies or from
                        remote locations where you cannot reach doctors. Or you can book for lab tests and get update
                        about your report online.
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <form method="post">
                                <div class="md-form md-outline mb-4">
                                    <input type="text" id="name" name="name" class="form-control" oninput="validate(this)" placeholder="Name"
                                        required />
                                </div>
                                <div class="md-form md-outline mb-4">
                                    <input type="integer" id="phone" name="phone" class="form-control" oninput="validate(this)"
                                        placeholder="Phone Number" required />
                                </div>
                                <div class="md-form md-outline mb-4">
                                    <input type="email" id="email" name="email" class="form-control" oninput="validate(this)"
                                        placeholder="Email address" required />
                                </div>
                                <div class="md-form md-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control" oninput="validate(this)"
                                        placeholder="Password" required />
                                </div>
                                <div class="md-form md-outline mb-4">
                                    <input type="password" id="cpassword" name="cpassword" class="form-control" oninput="validate(this)"
                                        placeholder="Confirm Password" required />
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Sign up
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('partials/footer.php'); ?>