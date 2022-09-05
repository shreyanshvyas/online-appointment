<?php include('assets/navbar.php')?>
<?php
session_start();
 if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
    header("location: index.php");
    exit;
}
 ?>
<h3 style="text-align:center">Feedbacks </h3>
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
            <th>Subject</th>
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
        $sql="SELECT * FROM feedback WHERE CONCAT(name,email,subject,message,today) LIKE '%$values%'";
        $queryresult = mysqli_query($conn, $sql);
        if(mysqli_num_rows($queryresult)>0){
            foreach($queryresult as $items)
            {
            ?>
            <tr><td><?= $items['name'];?></td>
            <td><?= $items['email'];?></td>
            <td><?= $items['subject'];?></td>
            <td><?= $items['message'];?></td>
            <td><?= $items['today'];?></td>
            <td><a class='btn btn-close my-4' onclick='DeleteConfirm()' href='assets/delete.php?today=<?= $items['today'];?>& table_name=feedback'></a></td>
            </tr>
            <?php
            }
        }
        else{
            ?>
            <tr><td colspan="5">NO RECORDS FOUND</td></tr>
            <?php
        }
    }
    if(!isset($_GET['search'])){
$sql = "SELECT name,email,subject,message,today FROM feedback";
$queryresult = mysqli_query($conn, $sql) or die(mysql_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {
    $name = $row['name'];
    $email  = $row['email'];
    $subject  = $row['subject'];
    $message = $row['message'];
    $today = $row['today'];
    echo"<div>
     <tr><td>$name </td><td>$email </td><td>$subject </td><td>$message </td><td>$today </td>";?>
     <td><a class='btn btn-close my-3' onclick='DeleteConfirm()' href='assets/delete.php?today=<?php echo $row['today'];?>& table_name=feedback'></a></td></tr> </div>
     <?php
}
    }
mysqli_free_result($queryresult);
mysqli_close($conn);
?>
</div>
</body>
</html>