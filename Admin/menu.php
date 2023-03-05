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
  
  <!--Title Page and links for CSS-->
  <title>Menu - <?php include('../includes/titlepage.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

 <?php include('../includes/topbar.php');?>


<div class="content" style="margin-top:10px">

    
    <?php include('../includes/sidebar.php');?>

    

        
    <div class="mainbar">
      
      <!--Page Header/Breadcrumbs-->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Home Page</h2>

        
        <div class="bread-crumb pull-right">
          <a href="homepage.php"><i class="fa fa-home"></i> Home</a> 
          
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Maintenance</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Menu</a>
        </div>

      



       

      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                    <a href="#addModal" class="btn btn-info" data-toggle="modal">Add New Menu</a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
     <!--Menu Table-->        
              <div class="page-tables">
                
                <div class="table-responsive">
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Menu Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('../includes/dbconnect.php');

    $query=mysqli_query($con,"select * from menu natural join category order by menu_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['menu_id'];
        $menu=$row['menu_name'];
        $cat=$row['cat_name'];
        $desc=$row['menu_desc'];
        $price=$row['menu_price'];
        $pic=$row['menu_pic'];
?>                      
                      <tr>
                        <td><img style="height:50px;width:50px" src="..	/images/<?php echo $pic;?>"></td>
                        <td><?php echo $menu;?></td>
                        <td><?php echo $cat;?></td>
                        <td><?php echo $desc;?></td>
                        <td><?php echo $price;?></td>
                        <td>
                            
                              <a href="#update" class="btn btn-info" data-target="#update<?php echo $id;?>" data-toggle="modal">
                                <i class="fa fa-pencil"></i>
                              </a>
                            
                          
                        </td>
                      </tr>


   <!--Pop up dialog Box for Menu Update-->                   

<div id="update<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Update Menu</h4>
            </div>
            <div class="modal-body" style="height:300px">
              
              <form class="form-horizontal" method="post" action="menuUpdate.php" enctype='multipart/form-data'>
                  
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                 
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Menu Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="menu" id="title" placeholder="Menu Name" value="<?php echo $menu;?>">
                      </div>
                  </div> 
                 
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Category</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="cat">
                         <?php
                            include('../includes/dbconnect.php');

                              $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                  
                
                  
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Description</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="desc" id="title" placeholder="Description"><?php echo $desc;?></textarea>
                      </div>
                  </div> 
                  
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price" value="<?php echo $price;?>">
                      </div>
                  </div> 
                 
                  <div class="form-group">
                      <label class="control-label col-lg-4" for="title">Image</label>
                      <div class="col-lg-8"> 
                        <input type="hidden" class="form-control" id="image" name="image1" value="<?php echo $pic;?>"> 
                        <input type="file" class="form-control" name="image" id="title">
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

<!--Pop up dialog Box for Adding new Menu /Modal Box-->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add New Menu</h4>
            </div>
            <div class="modal-body">
             
              <form class="form-horizontal" method="post" action="menuSave.php" enctype='multipart/form-data'>
             
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Menu Name</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="menu" id="title" placeholder="Menu Name" required>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Category</label>
                      <div class="col-lg-8"> 
                        <select class="form-control select2" id="exampleSelect1" name="cat" required>
                         <?php
                            include('../includes/dbconnect.php');

                              $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                  while ($row = mysqli_fetch_assoc($result)){

                                ?>
                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                        <?php } ?>
                        </select>
                      </div>
                  </div> 
                 
                 
                  
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Description</label>
                      <div class="col-lg-8"> 
                        <textarea class="form-control" name="desc" id="title" placeholder="Description" required></textarea>
                      </div>
                  </div> 
                  
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Price</label>
                      <div class="col-lg-8"> 
                        <input type="text" class="form-control" name="price" id="title" placeholder="Price" required>
                      </div>
                  </div> 
                  
                  <div class="form-group">
                      <label class="control-label col-lg-2" for="title">Image</label>
                      <div class="col-lg-8"> 
                        <input type="file" class="form-control" name="image" id="title">
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
            
        </div><
    </div><
</div>


<?php include('../includes/jscript.php');?>  

</body>
</html>
