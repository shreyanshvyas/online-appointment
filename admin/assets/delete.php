<?php
$server = "localhost";
$username = "root";
$password = "";
$database="users";
// Create a database connection
$conn = mysqli_connect($server, $username, $password,$database);

$today = $_GET['today'];
$table_name=$_GET['table_name'];
$query = "DELETE FROM $table_name WHERE today= '$today';";
$result = mysqli_query($conn,$query);

if ($result) {
    mysqli_close($conn);
    header("location:$_SERVER[HTTP_REFERER]");
    exit();
} else {
    echo "Error deleting record";
}
?>