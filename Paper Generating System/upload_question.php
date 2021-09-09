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
              <h1 class="m-0 text-dark">Upload Questions</h1>
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
            <section class="col-lg-12 ">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-upload mr-1"></i>
                    Upload
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-file">
                      <form method="POST" action="uploadexcel_2.php" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-4">
                            <label>Course</label>
                            <select class="custom-select" id="course_name" name="course_name" required>
                              <option value="" selected disabled>Select Class</option>
                              <?php
                              $con=mysqli_connect("localhost","root","","exam");
                              $get_name=mysqli_query($con,"SELECT * FROM course GROUP BY name");
                              foreach ($get_name as $key => $value) 
                              {
                                ?>
                                <option value= <?php echo $value['name'];?>>
                                  <?php 
                                  echo $value['name'];?>
                                </option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-4">
                            <label>Semester</label>
                            <select class="custom-select" name="course_sem" id="course_sem" required>
                              <option value="">Select Semester</option>

                            </select>
                          </div>
                          <div class="col-4">
                            <label>Subject</label>
                            <select class="custom-select" name="subject" id="subject" required>
                              <option value="">Select Subject</option>

                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Choose File</label>
                          <input type="file" name="uploadFile" class="form-control" />
                        </div>
                        <div class="row">
                          <div class="col 6 form-group">
                            <button type="submit" name="submit" class="btn btn-success" value="upload">Upload</button>
                          </div>
                        </form>
                        <form method="post">
                          <input type="text" name="tsubject" id="tsubject" hidden>
                          <div class="col 6 form-group" align="right">
                            <button type="submit" name="delete" class="btn btn-danger" value="delete">Remove</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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
      $('#course_sem').on('change',function(){
        var course_id = $(this).val();
        if(course_id){
          $.ajax({
            type:'POST',
            url:'get_course_sem.php',
            data:'course_id='+course_id,
            success:function(html){
              $('#subject').html(html);
            }
          }); 
        }else{
          $('#subject').html('<option value="">Select Semester first</option>'); 
        }
      });
    });

    $(document).ready(function()
    {
      $('#subject').on('change',function()
      {
        $('#tsubject').val($(this).val());
      });
    });

  </script>
</body>
<?php
if(isset($_POST['delete']))
{
  $con=mysqli_connect("localhost","root","","exam");
  $subject = $_POST['tsubject'];
  if($subject!="")
  {
    $query = "DELETE FROM student WHERE subject='".$subject."'";
    $chk=mysqli_query($con,$query);
    if($chk)
    {
      $_SESSION['disp_msg']=$subject."'s Questions deleted Successfully";
      ?>
      <script type="text/javascript">
        window.location.href="upload_question.php";
      </script>
      <?php
    }
  }
  else
  {
   $_SESSION['disp_msg']="Please Select Subject";
   ?>
   <script type="text/javascript">
    window.location.href="upload_question.php";
  </script>
  <?php
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