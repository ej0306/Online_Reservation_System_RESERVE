<?php include 'header.php';?>


<body class = "admin_body" style = "background-color:black !important; background:black;">

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    
    <a style = "color:white;" href="../index.php">Reservé</a>
  </div><br>
  
  <div class="lockscreen-item">
    
    <!--lockscreenImage-->
     <div class="lockscreen-image">
      <img src="../Admin/img/key.png" alt="User Image">
    </div>
    

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action = "login.php"method = "POST">
      <div class="input-group">
     <br>   <input type="username" name = "username" class="form-control" placeholder="username" ><br>
       <br> <input type="password" name = "password" class="form-control" placeholder="password" autofocus><br>
 <br><button name = "login"class="btn"><i class=""></i>Login</button></br>
       <br> <div class="input-group-btn">
         
      </div>
    </form>

  </div>
  
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
