<?php
session_start();
if(isset($_SESSION ['uname']))
{
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
								<h1 class="m-0 text-dark"> Profile</h1>
							</div><!-- /.col -->
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
							<section class="col-lg-12 ">
								<!-- Custom tabs (Charts with tabs)-->
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">
											<i class="fa fa-user"></i>&nbsp;&nbsp;Profile
										</h3>
									</div><!-- /.card-header -->
									<div class="card-body">
										User Name :
										<?php
										echo $_SESSION ['uname'];
										?>
										<br>
										Authority : 
										<?php
										echo $_SESSION ['auth'];
										?>

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
}
?>