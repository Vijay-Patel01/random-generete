<?php
session_start();
if(isset($_SESSION ['uname'])){ ?>
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
								<h1 class="m-0 text-dark">View Members</h1>
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
									<h3 class="card-title"><i class="fas fa-user mr-1"></i> View Members</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table class="table">
										<tr>
											<th>No</th>
											<th>User Name</th>
											<th>Password</th>
											<th>Authority</th>
											<th>Action</th>
										</tr>
										<?php
										$con=mysqli_connect("localhost","root","","exam");
										$question_paper=mysqli_query($con,"SELECT * FROM user_info");
										$no=0;
										while ($row=mysqli_fetch_array($question_paper)) 
										{
											$username=$row['username']; 
											$password=$row["password"]; 
											$authority=$row["authority"];
											$id1=$row["id"];
											?>
											<tr>
												<td><?php $no=$no+1; echo "$no"; ?></td>
												<td><?php echo "$username"; ?></td>
												<td><?php echo "$password"; ?></td>
												<td><?php echo "$authority"; ?></td>
												<td>

													<a href="member_edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" name="btnupdate" value="edit">Change</a>
													<a href="member_delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger" name="btndelete" value="delete">Delete</a>
												</td>
											</tr>
											<?php
										}
										mysqli_close($con)
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