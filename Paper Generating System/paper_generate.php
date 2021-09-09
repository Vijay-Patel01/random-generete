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
              <h1 class="m-0 text-dark">Generate Paper</h1>
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
                    <i class="fas fa-file mr-1"></i>
                    Paper
                  </h3>
                </div><!-- /.card-header -->
                <form method="POST" action="papergenerate.php">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
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
                      <div class="col-3">
                        <label>Semester</label>
                        <select class="custom-select" name="course_sem" id="course_sem" required>
                          <option value="">Select Semester</option>

                        </select>
                      </div>
                      <div class="col-3">
                        <label>Subject</label>
                        <select class="custom-select" name="subject" id="subject" required>
                          <option value="">Select Subject</option>

                        </select>
                      </div>
                      <div class="col-3">
                        <label>Total Marks</label>
                        <input type="number" name="totalmarks" class="form-control" placeholder="Total Marks" required>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-6">

                        <br>
                        <input type="number" name="no_of_question_1a" class="form-control" placeholder="1-A Number Of Questions"  tabindex="1" required>
                        <input type="number" name="no_of_question_1b" class="form-control" placeholder="1-B Number Of Questions" tabindex="3" required>
                        <input type="number" name="no_of_question_2a" class="form-control" placeholder="2-A Number Of Questions" tabindex="5" required>
                        <input type="number" name="no_of_question_2b" class="form-control" placeholder="2-B Number Of Questions" tabindex="7" required>
                        <input type="number" name="no_of_question_3a" class="form-control" placeholder="3-A Number Of Questions" tabindex="9" required>
                        <input type="number" name="no_of_question_3b" class="form-control" placeholder="3-B Number Of Questions" tabindex="11" required>
                        <input type="number" name="no_of_question_4a" class="form-control" placeholder="4-A Number Of Questions" tabindex="13" required>
                        <input type="number" name="no_of_question_4b" class="form-control" placeholder="4-B Number Of Questions" tabindex="15" required>
                        <input type="number" name="no_of_question_5a" class="form-control" placeholder="5-A Number Of Questions" tabindex="17" required>
                        <input type="number" name="no_of_question_5b" class="form-control" placeholder="5-B Number Of Questions" tabindex="19" required>

                      </div>
                      <div class="col-6">

                        <br>
                        <input type="number" name="marks_of_question_1a" class="form-control" placeholder="1-A Mark Of Questions" tabindex="2" required>
                        <input type="number" name="marks_of_question_1b" class="form-control" placeholder="1-B Mark Of Questions" tabindex="4" required>
                        <input type="number" name="marks_of_question_2a" class="form-control" placeholder="2-A Mark Of Questions" tabindex="6" required>
                        <input type="number" name="marks_of_question_2b" class="form-control" placeholder="2-B Mark Of Questions" tabindex="8" required>
                        <input type="number" name="marks_of_question_3a" class="form-control" placeholder="3-A Mark Of Questions" tabindex="10" required>
                        <input type="number" name="marks_of_question_3b" class="form-control" placeholder="3-B Mark Of Questions" tabindex="12" required>
                        <input type="number" name="marks_of_question_4a" class="form-control" placeholder="4-A Mark Of Questions" tabindex="14" required>
                        <input type="number" name="marks_of_question_4b" class="form-control" placeholder="4-B Mark Of Questions" tabindex="16" required>
                        <input type="number" name="marks_of_question_5a" class="form-control" placeholder="5-A Mark Of Questions" tabindex="18" required>
                        <input type="number" name="marks_of_question_5b" class="form-control" placeholder="5-B Mark Of Questions" tabindex="20" required>
                      </div>

                    </div>
                    <div id="disptotalmarks"></div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Generate Paper</button>
                  </div><!-- /.card-body -->


                </form>
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
  </script>
</body>
</html>
<?php
}
else{
  header("location: index.php");
}
?>