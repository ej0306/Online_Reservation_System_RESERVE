<?php 

include('../includes/dbconnect.php');
	
	$id = $_POST['user_id'];
	$status = $_POST['status'];
	
	$date=date("Y-m-d");
	
		

		mysqli_query($connect,"UPDATE reservation_made SET r_status='$status'")or die(mysqli_error($connect)); 

$query = mysqli_query($connect, "SELECT * FROM reservation_made  WHERE  r_status='$status'");
      $row=mysqli_fetch_array($query);
        $code=$row['usee_id'];
        $first=$row['FName'];
        $last=$row['LName'];
        $date=$row['date_time'];
        $status=$row['r_status'];
        $email=$row['email'];

        if ($status=='Approved'){
        	$msg="Transaction Successfull!!!";
        }
        if ($status=='Cancelled'){
        	$msg=" Sorry we couldn't processe your transaction !";
        }


	ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "reservé.com";
    
    $to = "$email";
    
    $subject = "Reservation Status";
    
    $message = "Dear $first $last,

    Your reservation is $status. $msg


    Thanks,

    Reservé
    	
    ";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    	
			echo "<script type='text/javascript'>alert('Reservation Approved!!');</script>";
			echo "<script>document.location='pending.php'</script>";   
	
	
?>
