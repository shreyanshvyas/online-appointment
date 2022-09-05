<?php include('assets/navbar.php')?>
<?php
session_start();
 if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
    header("location: index.php");
    exit;
}
 ?>
<h3 style="text-align:center">Booking For Video Conferencing</h3>
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
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Age</th>
                    <th>Disease</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Time of booking</th>
                    <th>Update Record</th>
                    <th>Delete Record</th>
                </tr>
                <?php
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database="users";
    // Create a database connection
    $conn = mysqli_connect($server, $username, $password,$database);
    if(isset($_GET['search'])){
        $values=$_GET['search'];
        $sql="SELECT * FROM ov WHERE CONCAT(name, gender, city, age,dis,email ,phone,gender,today) LIKE '%$values%'";
        $queryresult = mysqli_query($conn, $sql);
        if(mysqli_num_rows($queryresult)>0){
            foreach($queryresult as $items)
            {
            ?>
            <tr><td><?= $items['name'];?></td>
            <td><?= $items['gender'];?></td>
            <td><?= $items['city'];?></td>
            <td><?= $items['age'];?></td>
            <td><?= $items['dis'];?></td>
            <td><?= $items['email'];?></td>
            <td><?= $items['phone'];?></td>
            <td><?= $items['today'];?></td>
     <td><a class='btn my-4' href='assets/updates/update-vc.php?name=<?= $items['name'];?>&gender=<?= $items['gender'];?>&city=<?= $items['city'];?>&age=<?= $items['age'];?>&dis=<?= $items['dis'];?>&email=<?= $items['email'];?>&phone=<?= $items['phone'];?>&today=<?= $items['today'];?>'>Update</a></td>
            <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?= $items['today'];?>& table_name=ov'></a></td>
            </tr>
            <?php
            }
        }
        else{
            ?>
            <tr><td colspan="11">NO RECORDS FOUND</td></tr>
            <?php
        }
    }
    if(!isset($_GET['search'])){
$sql = "SELECT * FROM ov";
$queryresult = mysqli_query($conn, $sql) or die(mysql_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {
    $name = $row['name'];
    $gender = $row['gender'];
    $city = $row['city'];
    $age = $row['age'];
    $dis = $row['dis'];
    $email  = $row['email'];
    $phone = $row['phone'];
    $today = $row['today'];
    echo"<div>
    <tr><td>$name </td><td>$gender </td><td>$city </td><td>$age </td><td>$dis </td><td>$email </td><td>$phone </td><td>$today </td>";?>
     <td><a class='btn my-4' href='assets/updates/update-vc.php?name=<?php echo $row['name'];?>&gender=<?php echo $row['gender'];?>&city=<?php echo $row['city'];?>&age=<?php echo $row['age'];?>&dis=<?php echo $row['dis'];?>&email=<?php echo $row['email'];?>&phone=<?php echo $row['phone'];?>&today=<?php echo $row['today'];?>'>Update</a></td>
     <td><a class='btn btn-close my-3' onclick='DeleteConfirm()' href='assets/delete.php?today=<?php echo $row['today'];?>&table_name=ov'></a></td></tr> </div>
     <?php
}
    }
mysqli_free_result($queryresult);
mysqli_close($conn);
?>
        </div>
    </body>
</html>