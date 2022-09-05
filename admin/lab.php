<?php include('assets/navbar.php')?>
<?php
session_start();
 if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
    header("location: index.php");
    exit;
}
 ?>
<h3 style="text-align:center">Lab Bookings</h3>
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
                    <th>Test</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
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
        $sql="SELECT * FROM lab WHERE CONCAT(name, type, date, email, phone,addr,gender,today) LIKE '%$values%'";
        $queryresult = mysqli_query($conn, $sql);
        if(mysqli_num_rows($queryresult)>0){
            foreach($queryresult as $items)
            {
            ?>
            <tr><td><?= $items['name'];?></td>
            <td><?= $items['type'];?></td>
            <td><?= $items['date'];?></td>
            <td><?= $items['email'];?></td>
            <td><?= $items['phone'];?></td>
            <td><?= $items['addr'];?></td>
            <td><?= $items['gender'];?></td>
            <td><?= $items['today'];?></td>
            <td><a class='btn my-4' href='assets/updates/update-lab.php?name=<?= $items['name'];?>&type=<?= $items['type'];?>&date=<?= $items['date'];?>&email=<?= $items['email'];?>&phone=<?= $items['phone'];?>&addr=<?= $items['addr'];?>&gender=<?= $items['gender'];?>&today=<?= $items['today'];?>'>Update</a></td>
            <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?= $items['today'];?>& table_name=lab'></a></td>
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
$sql = "SELECT * FROM lab";
$queryresult = mysqli_query($conn, $sql) or die(mysql_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {
    $name = $row['name'];
    $type = $row['type'];
    $date = $row['date'];
    $email = $row['email'];
    $phone = $row['phone'];
    $addr  = $row['addr'];
    $gender = $row['gender'];
    $today = $row['today'];
    echo"<div>
     <tr><td>$name </td><td>$type </td><td>$date </td><td>$email </td><td>$phone </td><td>$addr </td><td>$gender </td><td>$today </td>";?>
     <td><a class='btn my-4' href='assets/updates/update-lab.php?name=<?php echo $row['name'];?>&type=<?php echo $row['type'];?>&date=<?php echo $row['date'];?>&email=<?php echo $row['email'];?>&phone=<?php echo $row['phone'];?>&addr=<?php echo $row['addr'];?>&gender=<?php echo $row['gender'];?>&today=<?php echo $row['today'];?>'>Update</a></td>
     <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?php echo $row['today'];?>& table_name=apt'></a></td>
    </tr> </div>
     <?php
}
    }
mysqli_free_result($queryresult);
mysqli_close($conn);
?>
        </div>
    </body>
</html>