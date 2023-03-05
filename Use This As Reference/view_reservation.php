<!DOCTYPE html>
<html lang="eng">
<head>
    <title>View Reservation</title>
    <link rel="stylesheet" href="Style/stylesheet.css" type="text/css" media="screen">
    <meta http-equiv="content-type" content="text/html; charset=utf-20" />
    
    <!--bootstrap -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <!--bootstrap -->
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

<?php # Script 9.6 - view_users.php #2
// This script retrieves a record from the reservation_made table.

$page_title = 'View Reservation';
//include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('../mysqli_connectReservation.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	$q = "SELECT * FROM reservation_made WHERE email = ?";
    $stmt= mysqli_prepare($dbc, $q); // Run the query. 
	// Check for the email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your  email.';
	} else {
		//$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $e= strip_tags($_POST['email']);
         
	}
if (empty($errors)) { // If everything's OK.
//retreive the user reservation info
// Make the query

mysqli_stmt_bind_param($stmt,'s',$e);
mysqli_stmt_execute($stmt);
$r = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($r))
{
	$FName=$row['FName'];
	$LName=$row['LName'];
    $email=$row['email'];
    $p_d=$row['people_dining'];
    $r_d=$row['date_time'];
    $r_status=$row['r_status'];
    //echo"Hello";
     ?>
    <div class="cntnr00">
    <p style="text-align:center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  SUCCESS: Click To Check Status
        </button></p>
           <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reservation Status</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                
    <div class="">
        <div class=""><p>
            <?php
	echo "<h4 style='text-align:center'>Hello"." $FName".", "."$LName </h4>";
    echo"<p>You made a reservation for "."$p_d"." people at the following date and time: "."$r_d".". </p>";
    echo"<p> Your status is: "."$r_status"."<br/> We are looking forward  to serving you.</p>";
    ?>
            </p></div>
   
   
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
<div class="alert alert-success">
    <p style="text-align:center"> <strong >Success!</strong><br/> </p>
  </div>
               
        </div>
     <?php       
} else
{
	$FName=null;
	$LName=null;
//echo '<p>' . mysqli_stmt_error($stmt) . '</p>';
    
    echo'<div class="alert alert-warning">
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
    <p class=error>Failed to make a reservation! Or your reservation has been canceled.</p><p class=error>Please make a reservation.</p></div>';
}
    

}else{    
    echo'<div class="alert alert-warning">
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
    <p class=error>PLEASE ENTER YOUR EMAIL ADDRESS!</p></div>';
        
}
    

mysqli_stmt_close($stmt);      
mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>

<body>
    <div class="cntnr02">
        <div class="sec2"><h1>View Reservation</h1></div>
        
        <div class="sheet">
            <form action="view_reservation.php" method="post">
            <fieldset>
                <label>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </label>
                
                <br><br>

                <p style="text-align:center"><input type="submit" name="submit" value="Submit" /></p>
            </fieldset>
            </form>
            <?//php include ('includes/footer.html'); ?>
        </div>
    </div>
</body>
<div class="footer"> 
   <p>Copyright © 2020 Reservé USA, Inc.  All rights reserved</p>
</div>

</html>