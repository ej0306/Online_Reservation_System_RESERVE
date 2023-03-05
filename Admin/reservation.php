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
  
  <title>Confirmed Reservations - <?php include('../includes/titlepage.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      
      <a href="index.html" class="navbar-brand hidden-lg">Reservé</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>
  

<div class="content" style="margin-top:10px">

  
    <?php include('../includes/sidebar.php');?>

   
    <div class="mainbar">
      
      
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard</h2>

      
        <div class="bread-crumb pull-right">
          <a href="homepage.php"><i class="fa fa-home"></i> Home</a> 
          
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Confirmed Reservations</a>
          
        </div>

        <div class="clearfix"></div>

      </div>
     
       

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left"> Confirmed Reservations
                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
              
              <div class="page-tables">
             
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>User ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbconnect.php');

    $query=mysqli_query($connect,"select * from reservation_made  where r_status='Approved'")
    or die(mysqli_error($connect));

      while ($row=mysqli_fetch_array($query)){
        $id=$row['user_id'];
        $first=$row['FName'];
        $last=$row['LName'];
        $email=$row['email'];
        $date=$row['date_time'];
        $pax = $row['people_dining'];
?>                      
                      <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $last;?></td>
                        <td><?php echo $first;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $email;?></td>
                        <td>
                              <a href="#payment" class="btn btn-default" data-target="#payment<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-money bgreen"></i>
                              </a>
                              <a href="#view" class="btn btn-success" data-target="#view<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-eye"></i>
                              </a>
                             
                              <a href="#update" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                             
                             
                        </td>
                      </tr>

<div id="payment<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update Status</h4>
            </div>
            <div class="modal-body" style="height:150px">
             
              <form class="form-horizontal" method="post" action="paymentSave.php" enctype='multipart/form-data'>
               
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                 
                 
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Status</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="status">
                                <option>Pending</option>
                                <option>Approved</option>
                                 <option>Cancelled</option>
                        </select>
                      </div>
                  </div> 
                  
                              
                
                  <div class="form-group">
                    <label class="control-label col-lg-4" for="title"></label>
                      <div class="col-lg-8"> 
                          <button type="submit" class="btn btn-sm btn-primary" name="update">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>  
                  </div>
              </form>
              
            </div>
           
        </div>
    </div>
</div>


<div id="view<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 style="text-align:center">Reservé</h3>
              <h4 style="text-align:center">Contact:+1(376)234-5678</h4>
              <h4 style="text-align:center">Email : reserve@gmail.com</h4>
            </div>
            <div class="modal-body" style="height:300px">
              
              <form class="form-horizontal" method="post" action="reservationUpdate.php" enctype='multipart/form-data'>
                 
                 <div class="form-group">
                                  <label class="col-lg-4 control-label">User ID</label>
                                  <div class="col-lg-8">
                                  <label for="user_id"><?php echo $id;?></label>
                                  </div>
                                </div>
                              

                  
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Last Name</label>
                      <div class="col-lg-8"> 
                        <label for="lname"><?php echo $last;?></label>
                      </div>
                  </div> 
                  
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">First Name</label>
                      <div class="col-lg-8"> 
                        <label for="lname"><?php echo $first;?></label>
                      </div>
                  </div> 

                   <div class="form-group">
                                  <label class="col-lg-4 control-label">Date</label>
                                  <div class="col-lg-8">
                                    <label for="lname"><?php echo $date;?></label>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Email Address</label>
                                  <div class="col-lg-8">
                                  <label for="lname"><?php echo $email;?></label>
                                  </div>
                                </div>

                                 <div class="form-group">
                                  <label class="col-lg-4 control-label">No. of People</label>
                                  <div class="col-lg-8">
                                  <label for="pax"><?php echo $pax;?></label>
                                  </div>
                                </div>
                              
             
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>  
              </form>
              
            </div>
           
        </div>
            </div>
</div>


<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update Reservation Details</h4>
            </div>
            <div class="modal-body" style="height:300px">
              
              <form class="form-horizontal" method="POST" action="reservationUpdate.php" enctype='multipart/form-data'>
                 
                   <div class="form-group">
                                  <label class="col-lg-4 control-label">User ID</label>
                                  <div class="col-lg-8">
                                  <label for="user_id"><?php echo $id;?></label>
                                  </div>
                                </div>
                              
                  
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Last Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="last" id="title" value="<?php echo $last;?>" placeholder="Enter Last Name">
                      </div>
                  </div> 
                  
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">First Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="first" id="title" value="<?php echo $first;?>" placeholder="Enter First Name">
                      </div>
                  </div> 
                  <div class="form-group">
                                  <label class="col-lg-4 control-label">Date</label>
                                  <div class="col-lg-8">
                                    <input type="datetime-local" class="form-control" placeholder="Date" name="date" value="<?php echo $date;?>" >
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Email Address</label>
                                  <div class="col-lg-8">
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $email;?>" >
                                  </div>
                                </div>
                              
             
                  <div class="col-md-4">
                  </div>  
                  <div class="col-md-8">
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>  
              </form>
              
            </div>
           
        </div>
            </div>
</div>

   
<?php }?>
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">
                    
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>
      </div>




    </div>

 
   <div class="clearfix"></div>

</div>

<?php include('../includes/footer.php');?>  


<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

  
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];


  mysqli_query($con,"delete from reservation WHERE rid='$id'")
  or die(mysqli_error());
  echo "<script>document.location='pending.php'</script>";
    }
    ?>

<?php include('../includes/jscript.php');?>  

</body>
</html>
