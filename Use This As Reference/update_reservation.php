<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Modify Reservation</title>
    <link rel="stylesheet" href="Style/stylesheet.css" type="text/css" media="screen">
    <meta http-equiv="content-type" content="text/html; charset=utf-20" />
    
    
     <!--bootstrap -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <!--bootstrap -->
    
    
    
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
        </ul>
    </nav>
</div>

<?php # Script 9.5 - reservation.php #2
// This script performs an INSERT query to add a record to the reservations table.

$page_title = 'Update Reservation';
//include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
	require ('../mysqli_connectReservation.php'); // Connect to the db.
   $id=0;
    $re=0;
	$errors = array(); // Initialize an error array.
    
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e= strip_tags($_POST['email']);
	}
	
	// Check for an number of people dinning:
	if (empty($_POST['people_dining'])) {
		$errors[] = 'You forgot to enter the number of people dining.';
    
	} else {
        $p_d=(int)($_POST['people_dining']);
        
    
	}
	
        
    if (empty($_POST['reservation_date'])) {
		$errors[] = 'You forgot to enter the date and time of your reservation .';
	} else {
        $r_d = ($_POST['reservation_date']);
	}
    
    $s_p=strip_tags($_POST['seating_position']);
    $al=strip_tags($_POST['allergies']);
    $a_r=strip_tags($_POST['add_request']);
    //$cmt=strip_tags($_POST['allergies']);
    
    
	if (empty($errors)) { // If everything's OK.
    $q = "SELECT * FROM reservation_made WHERE email = ?";

    $stmt= mysqli_prepare($dbc, $q); // Run the query.
	mysqli_stmt_bind_param($stmt,'s',$e);
    mysqli_stmt_execute($stmt);

$r = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($r))
{
    $re=1;
$id=$row['user_id'];
$FName=$row['FName'];
$LName=$row['LName'];
$email=$row['email'];
$p_d=$row['people_dining'];
$r_d=$row['date_time'];
$r_status=$row['r_status'];
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
    echo"<p>You had a reservation for "."$p_d"." people at the following date and time: "."$r_d".". </p>";
    
    
    ?>     
   
    <?php
    
    
 

}
mysqli_stmt_close($stmt);		
} 
     else
         echo'<div class="alert alert-warning">
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
    <p class=error>Please provide your updated information!</p></div>';
          
        
if($re==1)  { 
if(isset($_POST['people_dining'], $_POST['reservation_date']))	{
    $p_d2 = $_POST['people_dining'];
    $r_d2 = $_POST['reservation_date'];
    
    $q2="UPDATE reservation_made SET people_dining = $p_d2, date_time ='$r_d2' WHERE user_id =$id";
    
    $r2 = @mysqli_query($dbc, $q2);
    if ($r2) {
        ?>
            
             <?php
        
            echo"<p><b>Your reservation has been updated</b></p>
        <p>Now, you have a reservation for "."$p_d2"." people at the following date and time: "."$r_d2".". </p>";
        
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
    }
    else{
        
        //echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q2 . '</p>';
    }
}
}else{
    echo'<div class="alert alert-warning">
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
    <p class=error>Please  enter the correct email address!</p></div>';
}
    
    
    
    
// Include the footer and quit the script:
//include ('includes/footer.html'); 

    		
mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>

<body>
    <div class="cntnr02">
        <div class="sec2"><h1>Update Reservations</h1></div>
        
        <div class="sheet">
        <form action="update_reservation.php" method="post">    
        <fieldset>
            <legend><h3>Personal Information</h3></legend>
            <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
            
            <br>
            
            <p>Update Number of Guests: <input type="number" name="people_dining" size="15" max="10" maxlength="20" value="<?php if (isset($_POST['people_dining']))echo $_POST['people_dining']; ?>"  /> </p>
            
            <br>
            
            <label for="party">Update Date and Time (YYYY-MM-DD HH:MM):</label>
            <input id="date_time" type="datetime-local" name="reservation_date" min="2020-05-22T08:30" max="2022-06-30T16:30">
            
            <br><br>
            
        </fieldset>

        <fieldset>
            <legend><h3>Additional Information</h3></legend>    
            <p>Seating Preferences: <textarea name="seating_position" rows="2" cols="40" value="<?php if (isset($_POST['seating_position'])) echo $_POST['seating_position']; ?>"  ></textarea></p>
            
            <br>
            
            <p>Any Alergies: <textarea name="allergies" rows="2" cols="40" value="<?php if (isset($_POST['allergies'])) echo $_POST['allergies']; ?>"  ></textarea></p>
            
            <br>
            
            <p>Additional Requests: <textarea name="add_request" rows="2" cols="40" value="<?php if (isset($_POST['add_request'])) echo $_POST['add_request']; ?>"  ></textarea></p>
            
            <br>
            
            <p>Comments: <textarea name="comment" rows="2" cols="40"></textarea></p>
            
            <br><br>
            
            <p style="text-align:center"><input type="submit" name="submit" value="Update" /></p>
            
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

