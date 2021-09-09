<?php  
session_start();
function fetch_data()  
{  
	$output = '';  
	$con=mysqli_connect("localhost","root","","exam");
	$get_section=mysqli_query($con,"SELECT * FROM paper Group by section");
	foreach ($get_section as $key => $value) 
	{  
		$get_section_total=mysqli_query($con,"SELECT sum(marks) as section_total FROM paper where section='".$value['section']."'");
		$sum=mysqli_fetch_assoc($get_section_total);
		$output .='<tr>
		<th colspan="2">
		<b>'. $value['section']. ' Answer the following Questions.</b>
		</th>
		<th align="right">
		<b>'.$sum['section_total'].'</b>
		</th>
		<th>&nbsp;</th>
		</tr>';
		$get_data=mysqli_query($con,"SELECT * FROM paper where section='".$value['section']."'");
		$no=0;
		foreach ($get_data as $value) 
		{
			$no=$no+1;
			$output .='<tr>
			<td width="5.5%">'
			.$no.
			'</td>
			<td width="90%">'
			. $value['question'].
			'</td>
			<td align="right">
			</td>
			<td>
			<form method="GET" action="paper.php">
			<input type="hidden" name="id" value='. $value['qid'].'>
			<input type="hidden" name="mark" value='. $value['marks'].'>
			<input type="hidden" name="subject" value='.$value['subject'].'>
			<button class="btn-sm btn-primary">Change</button>
			</form>
			</td>
			</tr>';
		}
	}
	return $output;  
}  

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
		<div class="content-wrapper" >
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-10">
							<h1 class="m-0 text-dark">View Paper</h1>
						</div><!-- /.col -->
						<?php include('common/message.php') ?>
						<div class="col-sm-2" align="right">
							<form method="post">
								<input type="submit" name="create_pdf" class="btn btn-success" value="Save Paper">  
							</form>
						</div>
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
								<h3 class="card-title"> View Paper</h3>
							</div>

							<!-- /.card-header -->
							<div class="card-body">
								<table class="table">
									<?php
									$con=mysqli_connect("localhost","root","","exam");
									$get_all=mysqli_query($con,"SELECT sum(marks) as total FROM paper");
									$getall_data=mysqli_fetch_assoc($get_all);
									$get_data=mysqli_query($con,"SELECT * FROM paper Group By subject ");
									foreach ($get_data as $key => $value) 
									{
										$course_id_get=mysqli_query($con,"SELECT * FROM subject where name='".$value['subject']."' ");
										$disp_course_id=mysqli_fetch_array($course_id_get);
										$course_data_get=mysqli_query($con,"SELECT * FROM course where id='".$disp_course_id['course_id']."' ");
										$disp_course_data=mysqli_fetch_array($course_data_get);

										?>
										<h2 align="center">
											<?php echo $disp_course_data['name'].
											' ('.$disp_course_data['semester'].') Examination'?>
											<br>
											<?php echo date('F-Y');?>
											<br>
											<?php echo $disp_course_id['code']." : ".$value['subject'];?></h2>
											<h2 align="right"><?php echo "Total Marks : ".$getall_data['total'] ?></h2>
											<?php
										}
										?>
										<?php  
										echo fetch_data();  
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
	if(isset($_POST["create_pdf"]))  
	{  
		$con=mysqli_connect("localhost","root","","exam");
		$getdata=mysqli_query($con,"SELECT * FROM paper Group By subject ");
		$disp=mysqli_fetch_array($getdata);
		require_once('tcpdf/tcpdf.php');  
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
		$obj_pdf->SetCreator(PDF_CREATOR);  

		$obj_pdf->SetTitle($disp['subject']." ".date('Y')); 

		$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
		$obj_pdf->SetDefaultMonospacedFont('helvetica');  
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '15', PDF_MARGIN_RIGHT);  
		$obj_pdf->setPrintHeader(false);  
		$obj_pdf->setPrintFooter(false);  
		$obj_pdf->SetAutoPageBreak(TRUE, 5);  
		$obj_pdf->SetFont('helvetica', '', 12);  
		$obj_pdf->AddPage();  
		$content = '';  
	// $con=mysqli_connect("localhost","root","","exam");
	// $get_section=mysqli_query($con,"SELECT * FROM paper Group by subject");
	// foreach ($get_section as $key => $value) 
	// {

		$get_data=mysqli_query($con,"SELECT * FROM paper Group By subject ");
		foreach ($get_data as $key => $value) 
		{
			$course_id_get=mysqli_query($con,"SELECT * FROM subject where name='".$value['subject']."' ");
			$disp_course_id=mysqli_fetch_array($course_id_get);
			$course_data_get=mysqli_query($con,"SELECT * FROM course where id='".$disp_course_id['course_id']."' ");
			$disp_course_data=mysqli_fetch_array($course_data_get);

			$get_all=mysqli_query($con,"SELECT sum(marks) as total FROM paper");
			$getall_data=mysqli_fetch_assoc($get_all);

			$content .= '<h2 align="right">Seat No. ______________</H2><h2 align="center">'.$disp_course_data['name'].'&nbsp;('.$disp_course_data['semester'].') Examination<br>'.date('F-Y').'<br>'.$disp_course_id['code'].' : '.$value['subject'].
			'
			</h2>
			<br>
			<table top="">  
			<tr>  
			<td align="left"><h2>Time :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hours</h2></td> 
			<td align="right"><h2>Total Marks :&nbsp;&nbsp;'.$getall_data['total'].'</h2></td> 
			</tr>
			</table>
			<hr>
			<table cellspacing="0" cellpadding="5" top="5%">  
			<tr>  
			<th width="5.5%"></th>  
			<th width="90%"></th>  
			<th width="8%"></th> 
			<th></th> 
			</tr>';  
		}

		// }
		$content .= fetch_data();  
		$content .= '</table>';  
		$obj_pdf->writeHTML($content); 
		$dir="C:/xampp/htdocs/Paper Generating System/save_paper/"; 

		$filename=$dir.$disp['subject']."_".date('dmYHis').".pdf";
		$obj_pdf->Output($filename,'F'); 

		$savefile=mysqli_query($con,"SELECT * FROM subject where name='".$disp['subject']."' ");
		$dispfile=mysqli_fetch_array($savefile);
		$file_name=$disp['subject']."_".date('dmYHis').".pdf";
		$chk=mysqli_query($con,"INSERT INTO old_paper (name,subject_id) VALUES('".$file_name."','".$dispfile['id']."')");
		if($chk)
		{
			$_SESSION['disp_msg']="Paper saved Successfully";
			?>
			<script type="text/javascript"> -->
			window.location.href="paper_view.php";
		</script>
		<?php
	}
}  

?>