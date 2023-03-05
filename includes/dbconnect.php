<?php
$con = mysqli_connect("localhost", "root","","reservation");
$connect = mysqli_connect("localhost","root","","reservation_made");
if(mysqli_connect_errno()){
	
	echo "Failed to connect to MySQL:".mysqli_connect_error();
}
?>
