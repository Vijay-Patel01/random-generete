<?php
$con=mysqli_connect("localhost","root","","exam");
if(isset($_POST["name"])){
    //Get all state data
	$name= $_POST['name'];
    $query = "SELECT * FROM course WHERE name = '$name'";
    $run_query = mysqli_query($con, $query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display states list
    if($count > 0){
        echo '<option value="">Select Semester</option>';
        while($row = mysqli_fetch_array($run_query)){
          $course_id=$row['id'];
          $semester=$row['semester'];
          echo "<option value='$course_id'>$semester</option>";
      }
  }else{
    echo '<option value="">Semester not available</option>';
}
}

if(isset($_POST["course_id"])){
    $course_id= $_POST['course_id'];
    //Get all city data
    $query = "SELECT * FROM subject WHERE course_id = '$course_id'";
    $run_query = mysqli_query($con, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display cities list
    if($count > 0){
        echo '<option value="">Select Subject</option>';
        while($row = mysqli_fetch_array($run_query)){
            $id=$row['id'];
            $name=$row['name']; 
            echo "<option value='$name'>$name</option>";
        }
    }else{
        echo '<option value="">Subject not available</option>';
    }
}
?>