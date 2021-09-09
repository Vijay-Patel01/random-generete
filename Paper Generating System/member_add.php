<?php
session_start();
if(isset($_SESSION ['uname'])){
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <?php include('common/head.php') ?>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

     <?php include('common/header.php') ?>

     <?php include('common/sidebar.php') ?>

     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Member</h1>
            </div><!-- /.col -->
            <?php include('common/message.php') ?>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-user mr-1"></i>
                    New Member
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                 <form method="POST">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="User Name" required>
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password" required>
                        <label>Authority</label>
                        <select class="custom-select" name="authority" required>
                          <option value="" selected disabled>Select Authority</option>
                          <option value="Admin">Admin</option>
                          <option value="HOD">HOD</option>
                          <option value="Faculty">Faculty</option>
                        </select>
                        <br><br>
                        <button type="submit" name="btnstore" class="btn btn-primary">Store</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('common/footer.php') ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include ('common/js.php'); ?>
</body>
</html>
<?php
if(isset($_POST['btnstore']))
{
  $mysqli=mysqli_connect("localhost","root","","exam");
  $username=$_POST['username'];
  if(preg_match("/[%\$#\s@!&?<>%^\*]+/", $username))
  {
    $_SESSION['disp_msg']="Space & Special Character are not allowed";
    ?>
    <script type="text/javascript">
      window.location.href="member_add.php";
    </script>
    <?php
  }
  else
  {
    $password=$_POST['password'];
    $authority=$_POST['authority'];
    $query="INSERT INTO user_info (username,password,authority) VALUES ('$username','$password','$authority')";
    $chk=mysqli_query($mysqli,$query);
    if ($chk) 
    {
      $_SESSION['disp_msg']="Member stored Successfully";
      ?>
      <script type="text/javascript">
        window.location.href="member_add.php";
      </script>
      <?php
    }
  }
}
?>

<?php
}
else{
  header("location: index.php");
}
?>