<?php
session_start();
include('../includes/dbconnect.php');

	$id = $_SESSION['id']??'';
	$last = $_POST['last'];
	$first = $_POST['first'];
	$date = $_POST['date'];
	$email = $_POST['email'];

	mysqli_query($connect,"UPDATE reservation_made SET LName='$last', FName ='$first', date_time='$date', email='$email' where  user_id=$id") or die(mysqli_error($connect));
	

	echo "<script>document.location='reservation.php'</script>";   
	
?>

