<?php
$maxCapacity = $_GET['maxCap'];
$conn = mysqli_connect("localhost", "root", "","reservation");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE capacity SET maxCapacity = '$maxCapacity' WHERE id = 1";
if(mysqli_query($conn,$sql)){
    header("Location: http://localhost/project/admin/homepage.php");
}
?>
