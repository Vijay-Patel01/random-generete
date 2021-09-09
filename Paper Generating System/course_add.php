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
              <h1 class="m-0 text-dark">Add Course</h1>
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
                    <i class="fa fa-th mr-1"></i>
                    New Course
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form method="POST">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <label>Course Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Course Name" required>
                          <label>Total Semesters</label>
                          <input type="number" name="semester" class="form-control" placeholder="Total Semester"required>
                          <br>
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
  $name=$_POST['name'];
  if(preg_match("/[%\$#\s@!&?<>%^\*]+/", $name))
  {
    $_SESSION['disp_msg']="Space & Special Character are not allowed";
    ?>
    <script type="text/javascript">
      window.location.href="course_add.php";
    </script>
    <?php
  }
  else
  {
    $semester=$_POST['semester'];
    for ($i=1; $i <= $semester; $i++) 
    { 
      $query="INSERT INTO course (name,semester) VALUES ('$name','sem-$i')";
      $chk=mysqli_query($mysqli,$query);
      if ($chk) 
      {
        $_SESSION['disp_msg']="Course stored Successfully";
        ?>
        <script type="text/javascript">
          window.location.href="course_add.php";
        </script>
        <?php
      }
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