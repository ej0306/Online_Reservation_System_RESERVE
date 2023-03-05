<?php session_start();

include('../includes/dbconnect.php');

if(isset($_POST['login'])){

	$userUnsafe = $_POST['username'];
	$passUnsafe = $_POST['password'];

	$user = mysqli_real_escape_string($con,$userUnsafe);
	$pass = mysqli_real_escape_string($con,$passUnsafe);

	$query = mysqli_query($con, "select * from user where username = '$user' and password = '$pass' ") or die(mysqli_error($con));
		$row = mysqli_fetch_array($query);
			$id = $row['user_id'];

    $counter = mysqli_num_rows($query);

			if($counter == 0){

				echo "<script type = 'text/javascript'>alert('Invalid username or password'); document.location = 'index.php' </script>";
			}

			else{

				$_SESSION['id'] = $id;

				echo "<script type = 'text/javascript'>document.location = 'homepage.php'</script>";
			}
}
?>
