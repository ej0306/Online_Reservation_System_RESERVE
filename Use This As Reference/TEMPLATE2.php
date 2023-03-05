<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Make Reservation</title>
    <link rel="stylesheet" href="Style/stylesheet.css" type="text/css" media="screen">
    <meta http-equiv="content-type" content="text/html; charset=utf-20" />
</head>

<div>
    <nav>
        <div class="logo"> <img src="Style/icon03.png" height="200%"></div>
        <ul>
            <li><a class="active" href="    " target="_top">Home</a></li>
            <li><a href="    " target="_top">About</a></li>
            <li><a href="    " target="_top">Contact</a></li>
        </ul>
    </nav>
</div>


<?php # Script 9.6 - view_users.php #2
// This script retrieves a record from the reservation_made table.

$page_title = 'Modify Reservation';
//include ('includes/header.html');
function create_radio($value, $name = 'Alter_Reservation') {
	
	// Start the element:
	echo '<input type="radio" name="' . $name .'" value="' . $value . '"';
	
	// Check for stickiness:
	if (isset($_POST[$name]) && ($_POST[$name] == $value)) {
		echo ' checked="checked"';
	} 
	
	// Complete the element:
	echo " /> $value ";

} // End of create_radio() function.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('../mysqli_connectReservation.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
    
    // Make the query:
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
    //echo"Hello";
	
     if(isset($_POST['Alter_Reservation'])){
        $status= $_POST['Alter_Reservation'];
        
        if($status=="CANCEL RESERVATION"){
            echo "HELLO"." $FName".", "."$LName ";
    echo"<p>YOU HAD A RESERVATION FOR "."$p_d"." PEOPLE AT THE FOLLOWING DATE AND TIME: "."$r_d".". </p>";
    
            $id= $row['user_id'];
            $q1= "DELETE FROM reservation_made WHERE user_id=$id";
            $r1= mysqli_query($dbc, $q1);
            if($r1)
            echo"<p> YOUR RESERVATION HAS BEEN CANCELLED.</p>";
            echo"<p> WE HOPE WE WILL SEE  YOU SOON!</p>";
        }
         else{ //means the reservation will be updated.
             ?>
        <button onclick="document.location = 'update_reservation.php'">CLICK TO UPDATE RESERVATION</button>
            <?
         }
        
    }
} else
{
	$FName=null;
	$LName=null;
    //echo '<p>' . mysqli_stmt_error($stmt) . '</p>';
    echo "<p>YOU DON'T HAVE A RESERVATION.</p> ";
    echo "<p>PLEASE MAKE A RESERVATION !</p>";
    echo "<p>, OR YOUR RESERVATION HAS BEEN CANCELLED !</p>";
}
    
}
    else
        echo "<p class=error>PLEASE ENTER YOUR EMAIL ADDRESS!</p>";

mysqli_stmt_close($stmt);

 //if(isset()) 
mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>


<body>
    <div class="cntnr02">
        <div class="sec1"><h1>Modify Reservation</h1></div>

        <br><br>
        
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
            
            <p>Number of Guests: <input type="number" name="people_dining" size="15" maxlength="20" value="<?php if (isset($_POST['people_dining']))echo $_POST['people_dining']; ?>"  /> </p>
            
            <br>
            
            <label for="party">Enter Date and Time (DD-MM-YYYY HH:MM):</label>
            <input id="date_time" type="datetime-local" name="reservation_date" min="2020-02-01T08:30" max="2022-06-30T16:30">
            
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
            
            <p style="text-align:center", style="font-size: 20"><input type="submit" name="submit" value="MAKE RESERVATION" /></p>
            
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
