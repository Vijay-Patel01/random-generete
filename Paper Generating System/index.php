<!DOCTYPE html>
<html>
<head>
 <!-- Font Awesome -->
 <link rel="stylesheet" href="assests/plugins/fontawesome-free/css/all.min.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- icheck bootstrap -->
 <link rel="stylesheet" href="assests/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="assests/dist/css/adminlte.min.css">
 <!-- Google Font: Source Sans Pro -->
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Sign </b>In
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your work</p>

        <form action=" " method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" id="Uname" class="form-control" placeholder="Username" required 	> 
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
           <input type="Password" name="password" id="Pass" class="form-control" placeholder="Password" required>

           <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <!-- <button type="submit" class="btn btn-primary btn-block">Sign In</button> -->
            <input type="submit" name="log" id="log" value="Log In Here" class="btn btn-primary btn-block" >

          </div>
          <!-- /.col -->
        </div>
      </form>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="assests/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assests/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assests/dist/js/adminlte.min.js"></script>

</body>
</html>

<?php
if (isset($_POST['log'])) {
  session_start();

  $username=$_POST['username'];
  $password=$_POST['password'];

  $con=mysqli_connect("localhost","root","","exam");

  $dispquery="SELECT * FROM user_info";

  $data=mysqli_query($con,$dispquery);

  while ($row=mysqli_fetch_array($data)) 
  {
    $dusername=$row['username'];
    $dpassword=$row['password'];
    $authority=$row['authority'];

    if($username==$dusername and $password==$dpassword)
    {
      $_SESSION['uname']=$username;  
      $_SESSION['pass']=$password; 
      $_SESSION['auth']=$authority;

      if ($_SESSION['auth']=="Admin") 
      {
        header("Location:home.php");
      }
      if ($_SESSION['auth']=="HOD") 
      {
        header("Location:home.php");
      }
      if ($_SESSION['auth']=="Faculty") 
      {
        header("Location:home.php");
      }
    }
  }
}

?>