<?php include('assets/navbar.php')?>
<?php
session_start();
 if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
    header("location: index.php");
    exit;
}
 ?>
<h3 style="text-align:center"> Users Signed up on website</h3>
 <!--Container Main start-->
 <div class="row">
    <div class="d-flex justify-content-center mt-5">
        <form action="" method="GET">
    <div class="input-group">
  <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search data ">
    <button type="submit" class="btn btn-primary">Search</button>
</div>
</form>
    </div>
</div>
        <div class="height-100 mt-5">
            <table class="table table-striped table-bordered table-sm" style="width:100%">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                <?php
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database="users";
    $conn = mysqli_connect($server, $username, $password,$database);
    if(isset($_GET['search'])){
        $values=$_GET['search'];
        $sql="SELECT * FROM login WHERE CONCAT(name, phone,email) LIKE '%$values%'";
        $queryresult = mysqli_query($conn, $sql);
        if(mysqli_num_rows($queryresult)>0){
            foreach($queryresult as $items)
            {
            ?>
            <tr><td><?= $items['name'];?></td>
            <td><?= $items['phone'];?></td>
            <td><?= $items['email'];?></td>
            </tr>
            <?php
            }
        }
        else{
            ?>
            <tr><td colspan="3">NO RECORDS FOUND</td></tr>
            <?php
        }
    }
    if(!isset($_GET['search'])){
$sql = "SELECT * FROM login";
$queryresult = mysqli_query($conn, $sql) or die(mysql_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {
    $name = $row['name'];
    $phone  = $row['phone'];
    $email  = $row['email'];
    echo"<div>
     <tr><td>$name </td><td>$phone </td><td>$email </td>";
    
}
    }
mysqli_free_result($queryresult);
mysqli_close($conn);
?>
        </div>
    </body>
</html>