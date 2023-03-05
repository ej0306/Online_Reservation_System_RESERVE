<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Make Reservation</title>
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


<?php # Script 9.5 - reservation.php #2
// This script performs an INSERT query to add a record to the reservations table.

$page_title = 'Make Reservation';
//include ('includes/header.html');
//include ('includes/style.css');


// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('../mysqli_connectReservation.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
    $p_d=0;
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
        //$fn = strip_tags($_POST['first_name']);
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
        
	}
	
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	// Check for an number of people dinning:
	if (empty($_POST['people_dining'])) {
		$errors[] = 'You forgot to enter the number of people dining.';
	} else {
        //if(is_integer($_POST['people_dining'])){
		//$p_d = mysqli_real_escape_string($dbc, trim($_POST['people_dining']));
        $p_d=(int)($_POST['people_dining']);
        
        /*else
            $errors[] = 'Enter a valid number of people';*/
	}
	
    if (empty($_POST['reservation_date'])) {
		$errors[] = 'You forgot to enter the date and time of your reservation .';
	} else {
		//$r_d = mysqli_real_escape_string($dbc, trim($_POST['date_time']));
        $r_d = ($_POST['reservation_date']);
        
	}

    if($total + $p_d > $currentMax){
        $errors[] = 'There is no room for that many people currently, please wait until there is more space available in the restaurant.';
    }
    
    $s_p=strip_tags($_POST['seating_position']);
    $al=strip_tags($_POST['allergies']);
    $a_r=strip_tags($_POST['add_request']);
    
    //$cmt=strip_tags($_POST['allergies']);
    
    
	if (empty($errors)) { // If everything's OK.
	$r_status = "pending";
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO reservation_made (user_id,FName, LName, email,r_status, people_dining, date_time) VALUES (NULL,'$fn', '$ln', '$e','$r_status', $p_d, '$r_d' )";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message
        
            ?>
    <div class="cntnr00">
    <p style="text-align:center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  SUCCESS
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
	echo "<h4 style='text-align:center'>Thank You"." $fn".", "."$ln </h4>";
    echo"<p>You made a reservation for "."$p_d"." people at the following date and time: "."$r_d".". </p>";
    echo"<p> Your status is: "."$r_status".". Be on the look out for an email updating your status.<br/> We are looking forward  to serving you.</p>";
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
            
		} else { // If it did not run OK.
			
			
			// Debugging message:
			//echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		//include ('includes/footer.html'); 
		exit();
		
	} else { // Report the errors.
	
	/*	echo '<div class="cntnr00">
        <div class="cntnr01Error" ><p class="error">Error!</p>
		<p class="error">The following error(s) occurred:<br/>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p class="error">Please try again.</p></p></p></h1></div>';-->*/
		
    echo'<div class="alert alert-warning">
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
    <p class="error">The following error(s) occurred:<br/>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p></div>';
 
        
        
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>


<body>
    <div class="cntnr02">
        <div class="sec2"><h1>Make Reservation</h1></div>
        
        <div class="sheet">
        <form action="make_reservation.php" method="post">    
        <fieldset>    
            
            <legend><h3>Personal Information</h3></legend>
            <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
            
            <br>
            
            <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
            
            <br>
            
            <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
            
            <br>
            
            <p>Number of Guests: <input type="number" name="people_dining" size="15" maxlength="20" max="10" value="<?php if (isset($_POST['people_dining']))echo $_POST['people_dining']; ?>"  /> </p>
            
            <br>
            
            <label for="party">Enter Date and Time (MM-DD-YYYY HH:MM):</label>
            <input id="date_time" type="datetime-local" name="reservation_date" min="2020-05-01T08:30" max="2022-06-30T16:30">
            
            <br><br>

        </fieldset>

        <fieldset>
            <legend><h3>Additional Information</h3></legend>
            <p>Seating Preferences: <textarea name="seating_position" rows="2" cols="40" value="<?php if (isset($_POST['seating_position'])) echo $_POST['seating_position']; ?>"></textarea></p>
            
            <br>
            
            <p>Any Alergies: <textarea name="allergies" rows="2" cols="40" value="<?php if (isset($_POST['allergies'])) echo $_POST['allergies']; ?>"></textarea></p>
            
            <br>
            
            <p>Additional Requests: <textarea name="add_request" rows="2" cols="40" value="<?php if (isset($_POST['add_request'])) echo $_POST['add_request']; ?>"></textarea></p>
            
            <br>
           
            <p>Comments: <textarea name="comment" rows="2" cols="40"></textarea></p>
            
            <br><br>
            
          <p style="text-align:center"><input type="submit" name="submit" value="Submit" /></p>
            
        </fieldset>
        </form>
        <?//php include ('includes/footer.html'); ?>
        
        </div>
    </div>

<div class="footer"> 
   <p>Copyright © 2020 Reservé USA, Inc.  All rights reserved</p>
</div>

</body>

</html>
