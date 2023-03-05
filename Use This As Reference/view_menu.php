<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Modify Reservation</title>
    <link rel="stylesheet" href="Style/stylesheet.css" type="text/css" media="screen">
    <meta http-equiv="content-type" content="text/html; charset=utf-20" />
    <?php
    $total = 0;
    $conn = mysqli_connect("localhost", "root", "","reservation");
    $result = mysqli_query($conn,"SELECT maxCapacity from capacity where id = 1");
    //look through the database for the maxCapacity.
    $row = mysqli_fetch_array($result); //find the row where the capacity is held.
    $currentMax = $row['maxCapacity'];
    mysqli_close($conn);
    $newConn = mysqli_connect("localhost","root","","reservation_made");
    $totalReservations = mysqli_query($newConn,"SELECT people_dining FROM reservation_made");
    foreach($totalReservations as $row) {
        $total += $row['people_dining'];
    }
    mysqli_close($newConn);
    ?>
</head>

<div>
    <nav>
        <div class="logo"> <img src="Style/icon036.png" height="200%"></div>
        <ul>
            <li><a class="active" href="WELCOME.php" target="_top">Home</a></li>
            <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">MY RESERVATION</a>
    <div class="dropdown-content">
  <a href="make_reservation.php">RESERVE</a>
  <a href="view_reservation.php">CHECK STATUS</a>
  <a href="modify_reservation.php">UPDATE </a>
  <a href="view_menu.php">VIEW MENU</a>
    </div>
  </li>
            <li><a href="    " target="_top">About</a></li>
            <li><a href="    " target="_top">Contact</a></li>
            <li><a href="feedback.html" target="_top">Reviews</a></li>
            <li><a style="color: white;">Capacity: <?php echo $total;?>/<?php echo $currentMax;?></a></li>
        </ul>
    </nav>
</div>

<?php # Script 3.5 - calculator.php

$page_title = 'VIEW MENU';
//include ('includes/headerFed.html');


// Check if the form has been submitted:
 echo'<hr>';

 //Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	
} // End of main submission IF.

?>

<body>
    <div class="cntnr02">
    <div class="sec2"><h1>Our Menu</h1></div>
        <hr>
        <br><br>
        <br><br>
        <img src="Style/pj.jpg" alt="MENU" style="width:700px;height:600px;">
        <img src="Style/wp1961787.jpg" alt="MENU" style="width:700px;height:600px;">
        <img src="Style/wp1961801.jpg" alt="MENU" style="width:700px;height:600px;">
        <img src="Style/wp1961810.jpg" alt="MENU" style="width:700px;height:600px;">
        <img src="Style/wp1961826.jpg" alt="MENU" style="width:700px;height:600px;">
        <?php 
        //include ('includes/footerFed.html');
         ?>
</div>

</body>
<div class="footer"> 
   <p>Copyright © 2020 Reservé USA, Inc.  All rights reserved</p>
</div>
</html>