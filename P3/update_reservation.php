<!DOCTYPE html>
<html>
<head>
    <title>Home Screen</title>
    <link rel="stylesheet" href="STYLE/stylesheet.css" type="text/css" media="only screen"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-20" />

    <!--bootstrap -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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


<?php # Script 9.5 - reservation.php #2
// This script performs an INSERT query to add a record to the reservations table.

$page_title = 'Update Reservation';
//include ('includes/header.html');
//include ('includes/style.css');

    $fnameErr = $lnameErr = $emailErr = $date_tErr = $nberOfGErr = "";
?>


<div class="Header">
        <div class="topnav">
        <div class="logo"> <img src="STYLE/logo12.png" height="120%"></div>
          <a href="feedback.html" target="_top">Reviews</a>
          <a href="#">About Us</a>
          <a href="#">Contact</a>
          <a href="view_menu.html">Menu</a>
        <div class="dropdown">
            <button class="dropbtn"><a href="make_reservation.php" class="active">My Reservation</a></button>
            <div class="dropdown-content">
              <a href="view_reservation.php">View</a>
              <a href="modify_reservation.php">Modify</a>
            </div>
        </div> 
              <a href="home.html">Home</a>
        </div>
</div>

<body>
    <div class="Container00">
        <div class="section00"><h2>Update Reservation</h2></div>
        <div class="sheet">
        <div class="error">
        <form action="update_reservation.php" method="post">    
        <fieldset>    
            <legend><p>Personal Information</p></legend>
            
            <label for="email">Email Address:</label>
            <br>
            <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/><span class="error">* <?php echo $emailErr;?></span>
            

            <label for="people_dining">Update Number of Guests:</label>
            <br>
            <input type="number" name="people_dining" size="15" maxlength="20" min="1" max="10" value="<?php if (isset($_POST['people_dining']))echo $_POST['people_dining']; ?>"/><span class="error">* <?php echo $nberOfGErr;?></span>
            
            <br>

            <label for="party">Update Enter Date and Time (MM-DD-YYYY HH:MM):</label>
            <input id="date_time" type="datetime-local" name="reservation_date" min="2020-05-01T08:30" max="2022-06-30T16:30"> <span class="error">* <?php echo $date_tErr;?></span>
            
            <br><br>

        </fieldset>

        <fieldset>
            <legend><p>Additional Information</p></legend>
            
            <label for="seating_position">Update Seating Preferences:</label>
            <br> 
            <textarea name="seating_position" rows="2" cols="40" value="<?php if (isset($_POST['seating_position'])) echo $_POST['seating_position']; ?>"></textarea>
            
            <label for="allergies">Any Allergies:</label>
            <br> 
            <textarea name="allergies" rows="2" cols="40" value="<?php if (isset($_POST['allergies'])) echo $_POST['allergies']; ?>"></textarea>
            
            
            <label for="add_request">Additional Requests:</label>
            <br>  
            <textarea name="add_request" rows="2" cols="40" value="<?php if (isset($_POST['add_request'])) echo $_POST['add_request']; ?>"></textarea>
            
            
            <label for="comment">Comments:</label>
            <br>   
            <textarea name="comment" rows="2" cols="40"></textarea>
            
            <br><br>
            
          <p style="text-align:center"><input type="submit" name="submit" value="Submit" /></p>

            <br>

            
            <?php # Script 9.5 - reservation.php #2
            // This script performs an INSERT query to add a record to the reservations table.

            $page_title = 'Update Reservation';
            //include ('includes/header.html');

                $emailErr = $date_tErr = $nberOfGErr = "";

            // Check for form submission:
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                require ('../mysqli_connectReservation.php'); // Connect to the db.
               $id=0;
                $re=0;
                $errors = array(); // Initialize an error array.

                // Check for an email address:
                if (empty($_POST['email'])) {
                    $errors[] = 'You forgot to enter your email address.';
                   $emailErr ="Email Address is required";
                } else {
                    $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
                }

                // Check for an number of people dinning:
                if (empty($_POST['people_dining'])) {
                    $errors[] = 'You forgot to enter the number of people dining.';
                    $nberOfGErr = "Number of Guests is required";
                } else {
                    //if(is_integer($_POST['people_dining'])){
                    //$p_d = mysqli_real_escape_string($dbc, trim($_POST['people_dining']));
                    $p_d=(int)($_POST['people_dining']);

                    /*else
                        $errors[] = 'Enter a valid number of people';*/
                }

                if (empty($_POST['reservation_date'])) {
                    $errors[] = 'You forgot to enter the date and time of your reservation .';
                     $date_tErr = "Date and time is required";
                } else {
                    //$r_d = mysqli_real_escape_string($dbc, trim($_POST['date_time']));
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

            }else
                     echo'<div class="alert alert-dark"><p class=error>
                <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
                Please  enter the correct email address!</p></div>';
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
            
        </fieldset>
        </form>
        </div>
        </div>
    </div>

<div class="footer">
  <p>Copyright © 2020 Reservé USA, Inc.  All rights reserved</p>
</div>

</body>
</html>