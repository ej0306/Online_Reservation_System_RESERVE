<?php session_start();

if (empty($_SESSION['id'])):
	header('Location:index.php');
endif;
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">

	<title> Home Page - <?php include('../includes/titlepage.php');?></title>
	<?php include('../includes/links.php');?>

</head>
<body>

	<div class="navbar navbar-fixed-top bs-docs-nav" role = "banner">
		
		<div class= "conjtainer">
			<div class="navabar-header">
				<button class="navbar-toggle btn-navbar" type="button" data-toggle = "collapse" data-target = ".bs-navbar-collapse">
					<span>Menu</span>
				</button>
				
				<a href="index.html" class="navbar-brand hidden-lg"> Reservé</a>

			</div>
			
				<?php include('../includes/topbar.php');?>

		</div>
	</div>

<div class="content" style="margin-top: 10px">
	
	<?php include('../includes/sidebar.php') ?>

	<div class="mainbar">
		<div class="page-head">
			<h2 class="pull-left"><i class="fa fa-home"></i> Home Page</h2>

			<br>
			<br>

				<div class="matter">
					<div class="container">
						<div class="row">
							<div class="container-fluid">
			<div class="row-fluid">
			<div class="span2">
				<div class="well sidebar-nav">
						<ul compact="nav nav-lsit">
					<li class="active"><a href="#"><i class="icon-dashboard icon-2x">

				<div class="span10">
			<div class="contentheader">
				<ul class="breadcrumb">
				<font style="font: bold 44px 'Aleo'; text-shadow: 10px 10px 50px #000; color:black"><center>Reservé</center></font>
				<img src="img/menu.jpg" alt="menu" style="top:0px left: 0px; right: 0px; width: 900px; height: 900px" >
	<div class="mainmain">

		<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;visibility: hidden;">
		<div data-p = "225.00">
			<img data-u = "image" src="img/restaurant.jpg">
			<div style="position: absolute;top: 100px;left: 30px;width: 1000px;height: 1000px;z-index: 0;font-size: 50px;color: #ffffff;line-height: 60px"></div>				
		</div>

		<div data-u="navigator" class="jssorb05" style="bottom: 16px;right: 16px;" data-autocenter="1">
			<div data-u="prototype" style="width: 1000px;height: 16px"></div>
		</div>

			<span data-u="arrowleft" class="jssora221" style="top: 0px;left: 8px;width: 40px;height: 58px;" data-autocenter="2"></span>
			<span data-u="arrowright" class="jssora221" style="top: 0px;left: 8px;width: 40px;height: 58px;" data-autocenter="2"></span>
		</div>
			
	</div>

	<div class="clearfix"></div>

</div>
</script>

</body>
</html>