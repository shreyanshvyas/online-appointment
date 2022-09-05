 <?php include("assets/navbar.php")?>
 <?php
session_start();
 if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
    header("location: index.php");
    exit;
}
 ?>
 <h3 style="text-align:center">Online Appointment</h3>
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
 <div class="height-100 mt-3">
     <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
     <thead>
         <tr>
             <th>Name</th>
             <th>Age</th>
             <th>Department</th>
             <th>Doctor</th>
             <th>Date</th>
             <th>Time Slot</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Gender</th>
             <th>Time of booking</th>
            <th>Update record</th>
            <th>Delete record</th>
         </tr>
</thead>
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
        $sql="SELECT * FROM apt WHERE CONCAT(name, age, dep, dr, date, time, email ,phone,gender,today) LIKE '%$values%'";
        $queryresult = mysqli_query($conn, $sql);
        if(mysqli_num_rows($queryresult)>0){
            foreach($queryresult as $items)
            {
            ?>
            <tr><td><?= $items['name'];?></td>
            <td><?= $items['dep'];?></td>
            <td><?= $items['age'];?></td>
            <td><?= $items['dr'];?></td>
            <td><?= $items['date'];?></td>
            <td><?= $items['time'];?></td>
            <td><?= $items['email'];?></td>
            <td><?= $items['phone'];?></td>
            <td><?= $items['gender'];?></td>
            <td><?= $items['today'];?></td>
     <td><a class='btn my-4' href='assets/updates/update-booking.php?name=<?= $items['name'];?>&age=<?= $items['age'];?>&dep=<?= $items['dep'];?>&dr=<?= $items['dr'];?>&date=<?= $items['date'];?>&time=<?= $items['time'];?>&email=<?= $items['email'];?>&phone=<?= $items['phone'];?>&gender=<?= $items['gender'];?>&today=<?= $items['today'];?>'>Update</a></td>
            <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?= $items['today'];?>& table_name=apt'></a></td>
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
$sql = "SELECT * FROM apt";
$queryresult = mysqli_query($conn, $sql) or die(mysql_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {
    $name = $row['name'];
    $age = $row['age'];
    $dep = $row['dep'];
    $dr = $row['dr'];
    $date = $row['date'];
    $time = $row['time'];
    $email  = $row['email'];
    $phone = $row['phone'];
    $gender = $row['gender'];
    $today = $row['today'];

    echo"<div>
     <tr><td>$name </td><td>$age </td><td>$dep </td><td>$dr </td><td>$date </td><td>$time </td><td>$email </td><td>$phone </td><td>$gender </td><td>$today </td>";?>
     <td><a class='btn my-4' href='assets/updates/update-booking.php?name=<?php echo $row['name'];?>&age=<?php echo $row['age'];?>&dep=<?php echo $row['dep'];?>&dr=<?php echo $row['dr'];?>&date=<?php echo $row['date'];?>&time=<?php echo $row['time'];?>&email=<?php echo $row['email'];?>&phone=<?php echo $row['phone'];?>&gender=<?php echo $row['gender'];?>&today=<?php echo $row['today'];?>'>Update</a></td>
     <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?php echo $row['today'];?>& table_name=apt'></a></td>
    
</tr> 
</div>
<?php
}
    }

mysqli_free_result($queryresult);
mysqli_close($conn);
?>
 </div>
 </body>
 </html>