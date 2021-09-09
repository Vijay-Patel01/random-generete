<?php
session_start();
$con=mysqli_connect("localhost","root","","exam");
$id=$_GET['id'];
$question=$_GET['question'];
$mark=$_GET['mark'];
$subject=$_GET['subject'];
$new_question = "UPDATE paper SET question='".$question."',marks='".$mark."',subject='".$subject."' WHERE qid=$id";
mysqli_query($con,$new_question);
$chk=mysqli_close($con);
if($chk)
{
	$_SESSION['disp_msg']="Question changed Successfully";
	header("Location:paper_view.php");	
}
?>