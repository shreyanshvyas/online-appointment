<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>S3 Hospital Online</title>
</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="partials/assets/main.js"></script>
<link rel="stylesheet" href="partials/assets/style.css">

<header>
    <!-- Navbar -->
    <?php 
  session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
  }
  else{
    $loggedin = false;
  }
echo'<nav class="navbar navbar-expand-md justify-content-between navbar-light " style="background-color:#ebc7c7;">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-1 justify-content-left" href="index.php">
      <img
        src="img/s2.svg"
        height="35"
        alt="Logo"
        style="margin-top: -1px;"><p class="ml-3 mt-3 text-xl" style="font-family: "Roboto Slab", serif font-size:30px">S3 Hospital</p>
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="apt.php">Online Appointment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="oc.php">Video Consultancy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lab.php">Lab Tests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faq.php">Ask a question</a>
        </li>
        </ul>
        <div class="d-flex align-items-right">';

      if(!$loggedin){
      echo'<a href="login.php">
      <button type="button" class="btn btn-classy me-auto">
          Login /Signup
        </button></a>';
      }
      if($loggedin){
        echo'<a href="logout.php">
      <button type="button" class="btn btn-classy me-auto">
          Logout 
        </button></a>';
      }
      ?>
    </div>
    </div>
    <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>

<body>