<?php include('assets/navbar.php')?>
<?php
session_start();
 if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
    header("location: index.php");
    exit;
}
 ?>
<h3 style="text-align:center">Questions Asked</h3>
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
            <th>Email</th>
            <th>Message</th>
            <th>Time</th>
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
        $sql="SELECT * FROM que WHERE CONCAT(name,email,msg,today) LIKE '%$values%'";
        $queryresult = mysqli_query($conn, $sql);
        if(mysqli_num_rows($queryresult)>0){
            foreach($queryresult as $items)
            {
            ?>
            <tr><td><?= $items['name'];?></td>
            <td><?= $items['email'];?></td>
            <td><?= $items['msg'];?></td>
            <td><?= $items['today'];?></td>
            <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?= $items['today'];?>& table_name=que'></a></td>
            </tr>
            <?php
            }
        }
        else{
            ?>
            <tr><td colspan="4">NO RECORDS FOUND</td></tr>
            <?php
        }
    }
    if(!isset($_GET['search'])){
$sql = "SELECT * FROM que";
$queryresult = mysqli_query($conn, $sql) or die(mysql_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {
    $name = $row['name'];
    $email  = $row['email'];
    $msg = $row['msg'];
    $today = $row['today'];
    echo"<div>
    <tr><td>$name </td><td>$email </td><td>$msg </td><td>$today </td>";?>
     <td><a class='btn btn-close my-3' onclick='DeleteConfirm()' href='assets/delete.php?today=<?php echo $row['today'];?>& table_name=que'></a></td></tr> </div>
<?php
}
    }
mysqli_free_result($queryresult);
mysqli_close($conn);
?>
</div>
</body>
</html>