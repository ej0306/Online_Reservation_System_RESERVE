<?php
include('../includes/dbconnect.php');

if(isset($_POST['update'])){

	$id = $_POST['id'];
	$menu = $_POST['menu'];
	$catergory = $_POST['cat'];
	$descrip = $_POST['desc'];
	$price = $_POST['price'];

	$image = $_FILES["image"]["name"];
	if ($image == ""){
		$name = $_POST['image1'];
	}

	else{

		$name = $_FILES["image"]["name"];
		$type = $_FILES["image"]["type"];
		$size = $_FILES["image"]["size"];
		$temp = $_FILES["image"]["tmp_name"];
		$error = $_FILES["image"]["error"];


		if($error >0)
			die("Error uploading file!");
		else{
			if($size >10000000000)
				die("Format is too large!");
		}
		else
			move_uploaded_file($temp, "../images/".$name);

	}

	mysqli_query($con, "UPDATE menu set menu_name ='$menu', cat_id='$catergory', menu_desc='$descrip', menu_price='$price', menu_pic='$name' where menu_id ='$id'") or die(mysqli_error($con));

	echo "<script type = 'text/jvascript'>alert('Menu Updated!!'); </script>";
	echo "<script>document.location='menu.php'</script>";
}