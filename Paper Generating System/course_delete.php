<?php
session_start();
$con=mysqli_connect("localhost","root","","exam");
$name=$_GET['name'];
if(isset($name))
{
	$query = "DELETE FROM course WHERE name='".$name."'";
	$chk=mysqli_query($con,$query);
	if($chk)
	{
		$_SESSION['disp_msg']="Course deleted Successfully";
		header("Location:course_view.php");	
	}
}
else
{
	$id=$_GET['id'];
	$query = "DELETE FROM course WHERE id='".$id."'";
	$chk=mysqli_query($con,$query);
	if($chk)
	{
		$_SESSION['disp_msg']="Semester deleted Successfully";
		header("Location:course_view.php");	
	}
}
mysqli_close($con);

?>