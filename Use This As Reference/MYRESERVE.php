<!DOCTYPE html>
<html lang="eng">
<head>
    <title>RESERVATIONS</title>
    <link rel="stylesheet" href="Style/stylesheet.css">
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
    

<!--<div class="dropdown" style="float:inherit">
  <button class="dropbtn">MY RESERVE</button>
  <div class="dropdown-content">
  <a href="make_reservation.php">RESERVE</a>
  <a href="view_reservation.php">CHECK STATUS</a>
  <a href="modify_reservation.php">UPDATE </a>
  <a href="view_menu.php">VIEW MENU</a>
  </div>
</div>-->



<body>
    <div class="cntnr00">
        <div class="cntnr01"> 
            <div>
            <p class=" rcorners2">YOU CAN MAKE AND MANAGE YOUR RESERVATIONS HERE<p>  
             </div>    
        </div>
        
        <div>
            
        </div>
    </div>

</body>
<div class="footer"> 
   
</div>
    <div class="footer"> 
   <p>Copyright © 2020 Reservé USA, Inc.  All rights reserved</p>
</div>
</html>
