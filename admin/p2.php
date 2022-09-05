<?php include('assets/navbar.php')?>
<?php
session_start();
 if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
    header("location: index.php");
    exit;
}
 ?>
<h3 style="text-align:center">Payments for Lab tests and Online Appointment</h3>
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
                    <th>UPI id</th>
                    <th>Transaction ID</th>
                    <th>Date</th>
                    <th>Delete Record</th>
                </tr>
                <?php
                 $server = "localhost";
                 $username = "root";
                 $password = "";
                 $database="users";
                 // Create a database connection
                 $conn = mysqli_connect($server, $username, $password,$database);
if(isset($_GET['search'])){
    $values=$_GET['search'];
    $sql="SELECT * FROM p2 WHERE CONCAT(upi, t_id,today) LIKE '%$values%'";
    $queryresult = mysqli_query($conn, $sql);
    if(mysqli_num_rows($queryresult)>0){
        foreach($queryresult as $items)
        {
        ?>
        <tr><td><?= $items['upi'];?></td>
        <td><?= $items['t_id'];?></td>
        <td><?= $items['today'];?></td>
        <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?= $items['today'];?>& table_name=p2'></a></td>
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
$sql = "SELECT * FROM p2";
$queryresult = mysqli_query($conn, $sql) or die(mysql_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {
$upi = $row['upi'];
$t_id = $row['t_id'];
$today = $row['today'];
echo"<div>
     <tr><td>$upi </td><td>$t_id </td><td>$today </td>";?>
 <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?php echo $row['today'];?>& table_name=p2'></a></td>
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