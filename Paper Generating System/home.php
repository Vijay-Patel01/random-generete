<?php
session_start();
if(isset($_SESSION ['uname'])){
$con=mysqli_connect("localhost","root","","exam");
$get_member=mysqli_query($con,"SELECT * FROM user_info");
$get_course=mysqli_query($con,"SELECT * FROM course Group by name");
$get_old_paper=mysqli_query($con,"SELECT * FROM old_paper");
$get_subject=mysqli_query($con,"SELECT * FROM subject");
?>
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
            <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <h3><?php echo mysqli_num_rows($get_member); ?></h3>

                <p>Members</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
		 
           <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($get_course); ?></h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="fa fa-th"></i>
              </div>
            </div>
          </div>
		   </div>
		  
			<div class="row">
		  <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($get_old_paper); ?></h3>

                <p>Generated Papers</p>
              </div>
              <div class="icon">
                <i class="fas fa-scroll"></i>
              </div>
            </div>
          </div>
		  
		  <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($get_subject); ?></h3>

                <p>Subjects</p>
              </div>
              <div class="icon">
                <i class="fal fa-file-alt"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          
        </div>
        <!-- /.row -->
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
}
else{
  header("location: index.php");
}
?>