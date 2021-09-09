<?php
session_start();
$con=mysqli_connect("localhost","root","","exam");
$id=$_GET['id'];
$query = "DELETE FROM user_info WHERE id=$id";
mysqli_query($con,$query);
$chk=mysqli_close($con);
if($chk)
{
	$_SESSION['disp_msg']="Member deleted Successfully";
	header("Location:member_view.php");	
}

?>