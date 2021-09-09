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
							<h1 class="m-0 text-dark">View course</h1>
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
								<h3 class="card-title"><i class="fa fa-th"> </i>&nbsp;&nbsp;View course</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table class="table">
									<tr>
										<th>#</th>
										<th>Semester</th>
										<th>Action</th>
									</tr>
									<?php
									$con=mysqli_connect("localhost","root","","exam");
									$get_name=mysqli_query($con,"SELECT * FROM course Group by name");
									foreach ($get_name as $key => $value) 
									{
										$get_data=mysqli_query($con,"SELECT * FROM course where name='".$value['name']."'");
										?>
										<tr>
											<th>
												<?php echo $value['name']; ?>
											</th>
											<th><?php echo mysqli_num_rows($get_data); ?></th>
											<th>
												<a href="course_delete.php?name=<?php echo $value["name"]; ?>" class="btn btn-danger" name="btndelete" value="deleteall">Delete All</a>
											</th>
										</tr>

										<?php
										$no=0;
										foreach ($get_data as $key => $datavalue) 
										{
											?>
											<tr>
												<td><?php echo $no=$no+1; ?></td>
											<td>
												<?php echo $datavalue['semester']; ?>
											</td>
											<td>
												<a href="course_delete.php?id=<?php echo $datavalue["id"]; ?>" class="btn btn-primary" name="btndelete" value="delete">Delete</a></td>
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