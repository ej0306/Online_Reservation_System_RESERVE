<?php
include('../includes/dbconnect.php');

	$menu = $_POST['menu'];
	$catergory = $_POST['cat'];
	$descrip = $_POST['desc'];
	$price = $_POST['price'];

	$result = mysqli_query($com, "SELECT menu_name from menu where menu_name='$menu'");
		$count = mysqli_num_rows($result);


	if ($count == 0){
		$name = $_POST['image1'];

		if($name == "")
			$name = "default.gif";
	

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

	mysqli_query($con, "INSERT INTO menu(menu_name,cat_id,menu_desc,menu_price,menu_pic)
		VALUES('$menu','$catergory','$descrip','$price','$name')") or die(mysqli_error($con));

	echo "<script type = 'text/jvascript'>alert('Menu Added!!'); </script>";
	echo "<script>document.location='menu.php'</script>";
}
else
	echo "<script type = 'text/jvascript'>alert('Menu Already Added!!'); </script>";
	echo "<script>document.location='menu.php'</script>";
}