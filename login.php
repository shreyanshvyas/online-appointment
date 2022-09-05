<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $email= $_POST["email"];
    $password = $_POST["password"]; 
    $sql = "Select * from login where email='$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
      while($row=mysqli_fetch_assoc($result)){
        if (password_verify($password, $row['password'])){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: apt.php");
    } 
    else{
      $showError = "Invalid Credentials";
  }
}  
    }
    else{
      $showError = "Invalid Credentials";
  }
}
?>
<?php include('partials/header.php'); ?>
<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show m-0" style="text-align: center" role="alert" data-mdb-color="danger" id="customxD">
        <h5><strong>Error! </strong>'. $showError.'</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close">
    </div>';
    }
    ?>
<section class="vh-60">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6"><img src="img/s3.svg" alt="Phone image" style="width:80%">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="post">
                    <h2>Sign in to your account.</h2>
                    <div class="md-form md-outline mt-4 ">
                        <input type="email" id="email" name="email"  class="form-control form-control-lg " oninput="validate(this)"
                            placeholder="Email Address" required />
                    </div>
                    <div class="md-form md-outline mt-4">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" oninput="validate(this)"
                            placeholder="Password" required />
                    </div>
                    <div class="d-flex justify-content-start  mt-4">
                        <div class="form-check align-items-left">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Sign in</button>
                    <div class="d-flex align-items-center justify-content-center mt-3 pb-2">
                        <p class="mb-0 me-2">Don't have an account?</p>
                        <a href="signup.php"><button type="button" class="btn btn-primary">Create new</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include('partials/footer.php'); ?>