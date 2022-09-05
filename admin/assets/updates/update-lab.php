<?php
   $server = "localhost";
   $username = "root";
   $password = "";
   $database="users";
   error_reporting(0);
   // Create a database connection
   $conn = mysqli_connect($server, $username, $password,$database);
   $nm=$_GET['name'];
   $type=$_GET['type'];
   $dt=$_GET['date'];
   $em=$_GET['email'];
   $ph=$_GET['phone'];
   $addr=$_GET['addr'];
   $gd=$_GET['gender'];
   $today=$_GET['today'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body>
<section class="vh-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form class="transparent-input" method="GET">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="md-form md-outline">
                                            <input type="text" value="<?php echo $nm?>"id="name" name="name" class="form-control form-control-lg" oninput="validate(this)" placeholder="Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="md-form md-outline">
                                            <input type="text" id="type" 
                                            value="<?php echo $type?>"name="type" class="form-control form-control-lg" oninput="validate(this)" placeholder="Test category" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="md-form md-outline">
                                            <input type="text" id="date" 
                                            value="<?php echo $dt?>"name="date" class="form-control form-control-lg" oninput="validate(this)" placeholder="Enter date in DD-MM-YYYY Format" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="md-form md-outline">
                                            <input type="email" id="email" 
                                            value="<?php echo $em?>"name="email" class="form-control form-control-lg" oninput="validate(this)" placeholder="Email" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input type="text" 
                                            value="<?php echo $ph?>"id="phone" name="phone"
                                                class="form-control form-control-lg" oninput="validate(this)" placeholder="Phone" required />
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input type="text" id="addr" value="<?php echo $addr?>"name="addr" oninput="validate(this)" class="form-control form-control-lg" placeholder="Address" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input type="text" id="Gender" value="<?php echo $gd?>"name="gender"
                                                class="form-control form-control-lg" oninput="validate(this)" placeholder="Gender"required />
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="md-form md-outline">
                                            <input type="text" id="today"value="<?php echo $today?>" name="today"
                                                class="form-control form-control-lg" oninput="validate(this)" placeholder="today"required />
                                    </div>
                                    </div>
                                    </div>
                                <div class="mt-4 pt-2 text-center">
                                    <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Update" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php 
if($_GET['submit'])
    {
    $nm1=$_GET['name'];
   $type1=$_GET['type'];
   $dt1=$_GET['date'];
   $em1=$_GET['email'];
   $ph1=$_GET['phone'];
   $addr1=$_GET['addr'];
   $gd1=$_GET['gender'];
   $today1=$_GET['today'];
   $sql="UPDATE lab SET name='$nm1',type='$type1',date='$dt1',email='$em1',phone='$ph1',addr='$addr1',gender='$gd1' WHERE today='$today1'";
   $queryresult = mysqli_query($conn, $sql);
   if($queryresult){
    ?>
    <script>
        window.location.href='../../lab.php';
    </script>    
    <?php
   }
   else{
    echo"Error";
   }

    }
    

?>