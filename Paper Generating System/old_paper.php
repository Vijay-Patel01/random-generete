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
							<h1 class="m-0 text-dark"><?php echo $_GET['name']; ?></h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<?php
					$con=mysqli_connect("localhost","root","","exam");
					$name=$_GET['name'];
					$query=mysqli_query($con,"SELECT * FROM course where 
						name='".$name."' ");
					foreach ($query as $value) {
						?>
						<div class="col-4">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title"><i class="fas fa-user mr-1"></i> <?php echo $value['semester']; ?>
								</h3>

							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table class="table" >
									<?php 
									$get_subject=mysqli_query($con,"SELECT * FROM subject where
										course_id='".$value['id']."'");
									if(mysqli_num_rows($get_subject)>0)
									{
										foreach ($get_subject as $val_subject) 
										{
											?>

											<tr>
												<td>
													<a href="old_paper_view.php?name=<?php echo $val_subject['name']; ?>" style="color: black;"><?php echo $val_subject['name']; ?></a>
												</td>
											</tr>
											<?php
										}
									}
									else
									{
										?>
										<tr>No Subject Found..!</tr>
										<?php
									}
									?>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
					<!-- /.card -->
					<?php
				}
				mysqli_close($con);
				?>


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