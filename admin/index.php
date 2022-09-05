<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/main.js"></script>
</head>
<body>
    <?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $server = "localhost";
$username = "root";
$password = "";
$database = "users";
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}
    $id= $_POST["id"];
    $pwd = $_POST["pwd"]; 
    $sql = "Select * from admin where id='$id' AND pwd='$pwd'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['admin'] = true;
        $_SESSION['id'] = $id;
        header("location: apt.php");
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
if($showError){
  echo ' <div class="alert alert-danger alert-dismissible fade show" style="text-align: center" role="alert" data-mdb-color="danger" id="customxD">
      <h5><strong>Error! </strong>'. $showError.'</h5>
      <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close">
  </div>';
}
?>
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="img/b4.jpg" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem; height:600px;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="post">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">SSS Hospital</span>
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Admin Login</h5>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example17" name="id"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name="pwd"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>