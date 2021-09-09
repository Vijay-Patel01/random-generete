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

     <?php 
     include('common/header.php') ?>

     <?php include('common/sidebar.php') ?>

     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Update Member</h1>
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
                    Update Member
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                 <form method="POST">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <?php
                        $id=$_GET['id'];
                        $con=mysqli_connect("localhost","root","","exam");
                        $question_paper=mysqli_query($con,"SELECT * FROM user_info WHERE id=$id");
                        $row=mysqli_fetch_array($question_paper);
                        mysqli_close($con)
                        ?>
                        <input type="hidden" name="id" class="form-control" placeholder="User Name" value="<?php echo $row['id']; ?>" >
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" placeholder="User Name" value="<?php echo $row['username']; ?>" required>
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                        <label>Authority</label>
                        <input type="text" name="authority" class="form-control" placeholder="Authority" value="<?php echo $row['authority']; ?>" required>
                        <br>
                        <button type="submit" name="btnupdate" value="update" class="btn btn-primary">Update</button>
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
if(isset($_POST['btnupdate']))
{
  $con=mysqli_connect("localhost","root","","exam");
  $id=$_POST['id'];
  $username=$_POST['username'];
  if(preg_match("/[%\$#@\s!&?<>%^\*]+/", $username))
  {
    $_SESSION['disp_msg']="Space & Special Character are not allowed";
    ?>
    <script type="text/javascript">
      window.location.href="member_edit.php?id=<?php echo $id;?>";
    </script>
    <?php
  }
  else
  {
    $password=$_POST['password'];
    $authority=$_POST['authority'];
    $query = "UPDATE user_info SET username='".$username."',password='".$password."',authority='".$authority."' WHERE id=$id";
    $chk=mysqli_query($con,$query);
    if($chk)
    {
      $_SESSION['disp_msg']="Member updated Successfully";
      ?>
      <script type="text/javascript">
        window.location.href="member_view.php";
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