<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  
  <title>View Reservations - <?php include('../includes/title.php');?></title>
  <style>
    .label{
      width:150px;
    }
    h4,h3{
      margin:0px;
    }
  </style>  
</head>

<body>
<h3 style="text-align:center">Reservé</h3>
<h4 style="text-align:center">Contact:+1(376)234-5678</h4>
<h4 style="text-align:center">Email : reserve@gmail.com</h4>
<hr>

<table style="width:100%">
<?php
include('../includes/dbconnect.php');
    $id=$_REQUEST['id'];
    $query=mysqli_query($connect,"select * from reservation_made  where r_status='$status'")or die(mysqli_error($connect));
      $row=mysqli_fetch_array($query);
        $id=$row['user_id'];
        $first=$row['FName'];
        $last=$row['LName'];
        $email=$row['email'];
        $date=$row['date_time'];
        $status=$row['r_status'];
        $pax =$row['people_dining'];
?>                      
                      <tr>
                        <td class="label">User ID: </td>
                        <td><?php echo $id;?></td>
                        <td class="label">Reservation Date: </td>
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                      </tr>
                      <tr>  
                        <td class="label">Name: </td>
                        <td><?php echo $last." ,".$first;?></td>
                        
                      </tr>
                      <tr>
                        <td class="label">Email: </td>
                        <td><?php echo $email;?></td>
                      </tr> 
                       
                      <tr>  
                        <td class="label">Reservation Status: </td>
                        <td><?php echo $status;?></td>
                      </tr>  
                     
                      <tr>  
                        <td class="label">No. of People: </td>
                        <td><?php echo $pax;?></td>
                      </tr>    
</table>
<br>

</div>
</body>
</html>
