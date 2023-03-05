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
  <
  <title>Category-<?php include('../includes/titlepage.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
     
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
          <a href="#" class="bread-current">Category</a>
        </div>

        <div class="clearfix"></div>

      </div>



     

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                    <a href="#addModal" class="btn btn-info" data-toggle="modal">Add New Category</a>
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
                        <th>Category Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbconnect.php');

    $query=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['cat_id'];
        $name=$row['cat_name'];

?>                      
                      <tr>
                        <td><?php echo $name;?></td>
                        <td>
                            
                              <a href="#update" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                          
                        </td>
                      </tr>

<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update Category</h4>
            </div>
            <div class="modal-body" style="height:100px">
              
              <form class="form-horizontal" method="post" action="fcategoryUpdate.php">
                  
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category Name</label>
                      <div class="col-lg-10"> 
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="text" class="form-control" name="category" id="title" placeholder="Category Name" value="<?php echo $name;?>">
                      </div>
                  </div> 
                              
            
                  <div class="form-group">
                      
                     <label class="control-label col-lg-2" for="title"></label>
                      <div class="col-lg-10"> 
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
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
                    <!-- Footer goes here -->
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


<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add New Event</h4>
            </div>
            <div class="modal-body">
              
              <form class="form-horizontal" method="post" action="categorySave.php">
                  
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="category" id="title" placeholder="Category Name" required>
                      </div>
                  </div> 

                 
                  <div class="form-group">
                    
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                       </div>
                  </div>
              </form>
              
            </div>
            
        </div>
    </div>
</div>
  
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  
  mysqli_query($con,"delete from category WHERE cat_id='$id'")
  or die(mysqli_error());
  echo "<script>document.location='category.php'</script>";
    }
    ?>

<?php include('../includes/jscript.php');?>  

</body>
</html>
