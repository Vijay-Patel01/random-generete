<?php
session_start();
$get_total=$_POST['totalmarks'];
$total=
($_POST['no_of_question_1a']*$_POST['marks_of_question_1a'])+
($_POST['no_of_question_1b']*$_POST['marks_of_question_1b'])+
($_POST['no_of_question_2a']*$_POST['marks_of_question_2a'])+
($_POST['no_of_question_2b']*$_POST['marks_of_question_2b'])+
($_POST['no_of_question_3a']*$_POST['marks_of_question_3a'])+
($_POST['no_of_question_3b']*$_POST['marks_of_question_3b'])+
($_POST['no_of_question_4a']*$_POST['marks_of_question_4a'])+
($_POST['no_of_question_4b']*$_POST['marks_of_question_4b'])+
($_POST['no_of_question_5a']*$_POST['marks_of_question_5a'])+
($_POST['no_of_question_5b']*$_POST['marks_of_question_5b']);
if ($get_total==$total) 
{
	$mysqli=new mysqli("localhost","root","","exam");
	// Q-1(A)
	$marks=$_POST['marks_of_question_1a'];
	$no_of_q=$_POST['no_of_question_1a'];
	$subject=$_POST['subject'];	
	$remove="TRUNCATE TABLE paper";
	mysqli_query($mysqli,$remove);

	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		
	}
	?>
	<!-- Q-1(B) -->
	<?php
	$marks=$_POST['marks_of_question_1b'];
	$no_of_q=$_POST['no_of_question_1b'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-1(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-2(A) -->
	<?php
	$marks=$_POST['marks_of_question_2a'];
	$no_of_q=$_POST['no_of_question_2a'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-2(B) -->
	<?php
	$marks=$_POST['marks_of_question_2b'];
	$no_of_q=$_POST['no_of_question_2b'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-2(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-3(A) -->
	<?php
	$marks=$_POST['marks_of_question_3a'];
	$no_of_q=$_POST['no_of_question_3a'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-3(B) -->
	<?php
	$marks=$_POST['marks_of_question_3b'];
	$no_of_q=$_POST['no_of_question_3b'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-3(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-4(A) -->
	<?php

	$marks=$_POST['marks_of_question_4a'];
	$no_of_q=$_POST['no_of_question_4a'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-4(B) -->
	<?php

	$marks=$_POST['marks_of_question_4b'];
	$no_of_q=$_POST['no_of_question_4b'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-4(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-5(A) -->
	<?php

	$marks=$_POST['marks_of_question_5a'];
	$no_of_q=$_POST['no_of_question_5a'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(A)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	?>
	<!-- Q-5(B) -->
	<?php

	$marks=$_POST['marks_of_question_5b'];
	$no_of_q=$_POST['no_of_question_5b'];
	$subject=$_POST['subject'];
	
	if($no_of_q==1)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
	}
	if($no_of_q==2)
	{
		$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_easy)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		}
		$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit 1");
		while($row = mysqli_fetch_array($result_medium)) 
		{
			$query = "INSERT INTO paper (question,marks,section,subject) 
			values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
			$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
			mysqli_query($mysqli,$update_query);
			mysqli_query($mysqli,$query);
		} 
	}
	if($no_of_q>=3)
	{
		if($no_of_q==10 || $no_of_q==14 || $no_of_q==19 || $no_of_q==22 || $no_of_q==34 || $no_of_q==39 || $no_of_q==42 || $no_of_q==50 || $no_of_q==54 || $no_of_q==59 || $no_of_q==62 || $no_of_q==74 || $no_of_q==79 || $no_of_q==82 || $no_of_q==90 || $no_of_q==94 || $no_of_q==99)
		{
			$easy=floor($no_of_q*25/100);
			$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
			$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
		else
		{
			$easy=round($no_of_q*25/100);
	$medium=round($no_of_q*35/100,0,PHP_ROUND_HALF_EVEN);
	$hard=round($no_of_q*40/100);
			$result_easy= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='easy' AND subject='$subject' AND status='N' order by RAND() limit $easy");
			while($row = mysqli_fetch_array($result_easy)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
			$result_medium = mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='medium' AND subject='$subject' AND status='N' order by RAND() limit $medium");
			while($row = mysqli_fetch_array($result_medium)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			} 
			$result_hard= mysqli_query($mysqli,"SELECT * FROM student WHERE marks=$marks AND level='hard' AND subject='$subject' AND status='N' order by RAND() limit $hard");
			while($row = mysqli_fetch_array($result_hard)) 
			{
				$query = "INSERT INTO paper (question,marks,section,subject) 
				values('".$row["question"]."','".$row["marks"]."','Q-5(B)','".$row['subject']."')";
				$update_query = "UPDATE student SET status='Y' WHERE qid='".$row["qid"]."'";
				mysqli_query($mysqli,$update_query);
				mysqli_query($mysqli,$query);
			}
		}
	}
	$chk=mysqli_close($mysqli);
	if($chk)
	{
		$_SESSION['disp_msg']="Paper generated Successfully";
		header("Location:paper_view.php"); 
	}
}
else
{
	if($get_total>$total)
	{
		$_SESSION['disp_msg']="Add More ".($get_total-$total)." Marks";
		header("Location:paper_generate.php");
	}
	if($get_total<$total)
	{
		$_SESSION['disp_msg']="Remove ".($total-$get_total)." Marks";
		header("Location:paper_generate.php"); 
	}
}
?>

