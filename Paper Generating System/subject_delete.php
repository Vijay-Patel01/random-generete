<?php
session_start();
$con=mysqli_connect("localhost","root","","exam");
$id=$_GET['id'];
$query = "DELETE FROM subject WHERE id=$id";
mysqli_query($con,$query);
$chk=mysqli_close($con);
if($chk)
{
	$_SESSION['disp_msg']="Subject deleted Successfully";
	header("Location:subject_view.php");	
}

?>