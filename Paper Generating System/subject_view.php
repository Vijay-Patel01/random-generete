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
						<div class="col-sm-10">
							<h1 class="m-0 text-dark">View subject</h1>
						</div><!-- /.col -->
						<?php include('common/message.php') ?>
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-12">

						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><i class="fa fa-list"> </i>&nbsp;&nbsp;View subject</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table class="table">
									<tr>
										<th>#</th>
										<th>Subject</th>
										<th>Action</th>
									</tr>
									<?php
									$con=mysqli_connect("localhost","root","","exam");
									$get_name=mysqli_query($con,"SELECT * FROM subject Group by course_id");

									foreach ($get_name as $key => $value) 
									{
										?>
										<tr>
											<th colspan="4">
												<?php 
												$course_name=mysqli_query($con,"SELECT * FROM course WHERE id='".$value['course_id']."'");
												foreach ($course_name as $course_name) 
												{
													echo $course_name['name']."&nbsp;".$course_name['semester'];
												}
												?>

											</th>
											
										</tr>
										<?php
										$no=0;
										$get_data=mysqli_query($con,"SELECT * FROM subject where course_id='".$value['course_id']."'");
										foreach ($get_data as $value) 
										{
											?>
											<tr>
												<td><?php echo $no=$no+1; ?></td>
												<td>
													<?php echo $value['name']; ?>
												</td>
												<td>
													<a href="subject_edit.php?id=<?php echo $value["id"]; ?>" class="btn btn-primary" name="btnupdate" value="edit">Change</a>
													<a href="subject_delete.php?id=<?php echo $value["id"]; ?>" class="btn btn-danger" name="btndelete" value="delete">Delete</a>
												</td>
											</tr>
											<?php
										}
									}
									?>
									
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
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