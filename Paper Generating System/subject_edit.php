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
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Update Subject</h1>
            </div><!-- /.col -->
            <?php include('common/message.php') ?>
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
            <section class="col-lg-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-list mr-1"></i>
                    Update Subject
                  </h3>

                </div><!-- /.card-header -->
                <div class="card-body">
                 <form method="POST">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <?php
                        $id=$_GET['id'];
                        $con=mysqli_connect("localhost","root","","exam");
                        $get_subject=mysqli_query($con,"SELECT * FROM subject WHERE id=$id");
                        $row=mysqli_fetch_array($get_subject);
                        $get_course_name=mysqli_query($con,"SELECT * FROM course WHERE id='".$row['course_id']."'");
                        $course_name_row=mysqli_fetch_array($get_course_name);
                        mysqli_close($con)
                        ?>
                        <label>Subject Name</label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Subject Name" required>
                        <label>Subject Code</label>
                        <input type="text" name="code" value="<?php echo $row['code']; ?>" class="form-control" placeholder="Subject Code" required>
                        <label>Course</label>
                        <select class="custom-select" id="course_name" name="course_name" required>
                          <option value="" selected disabled>Select Class</option>
                          <?php
                          $con=mysqli_connect("localhost","root","","exam");
                          $get_name=mysqli_query($con,"SELECT * FROM course Group By name");
                          foreach ($get_name as $key => $value) 
                          {
                            ?>
                            <option value=<?php echo $value['name'];
                            $valid=$course_name_row['name'];
                            $rowid=$value['name'];
                            if ($valid==$rowid) {
                              ?>
                              selected
                              <?php
                            }

                            ?> 
                            >
                            <?php
                            echo $value['name']; ?>
                          </option>
                          <?php
                        }
                        ?>
                      </select>
                      <label>Semester</label>
                      <select class="custom-select" name="course_sem" id="course_sem" required>
                        <option value="">Select Semester</option>
                        <?php
                        $con=mysqli_connect("localhost","root","","exam");
                        $get_name=mysqli_query($con,"SELECT * FROM course where name='".$course_name_row['name']."'");
                        foreach ($get_name as $key => $value) 
                        {
                          ?>
                          <option value=<?php echo $value['id'];
                          $valid=$value['id'];
                          $rowid=$row['course_id'];
                          if ($valid==$rowid) {
                            ?>
                            selected
                            <?php
                          }

                          ?> 
                          >
                          <?php
                          echo $value['semester']; ?>
                        </option>
                        <?php
                      }
                      ?>
                    </select>
                    <br><br>
                    <button type="submit" name="btnupdate" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </form>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#course_name').on('change',function(){
      var name = $(this).val();
      if(name){
        $.ajax({
          type:'POST',
          url:'get_course_sem.php',
          data:'name='+name,
          success:function(html){
            $('#course_sem').html(html); 
          }
        }); 
      }else{
        $('#course_sem').html('<option value="">Select Course first</option>');
      }
    });
  });
</script>

</body>

<?php
if(isset($_POST['btnupdate']))
{
  $con=mysqli_connect("localhost","root","","exam");
  $id=$_GET['id'];
  $name=$_POST['name'];
  $code=$_POST['code'];
  if(preg_match("/[%\$#@\s!&?<>%^\*]+/", $name) || preg_match("/[%\$#@\s!&?<>%^\*]+/", $code))
  {
    $_SESSION['disp_msg']="Space & Special Character are not allowed";
    ?>
    <script type="text/javascript">
      window.location.href="subject_edit.php?id=<?php echo $id;?>";
    </script>
    <?php
  }
  else
  {
    $course_id=$_POST['course_sem'];
    $query = "UPDATE subject SET name='".$name."',code='".$code."',course_id='".$course_id."' WHERE id=$id";
    $chk=mysqli_query($con,$query);
    if($chk)
    {
      $_SESSION['disp_msg']="Subject updated Successfully";
      ?>
      <script type="text/javascript">
        window.location.href="subject_view.php";
      </script>
      <?php 
    }  
  }
  
}
?>
</html>
<?php
}
else{
  header("location: index.php");
}
?>