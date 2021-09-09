<?php
session_start();
if(isset($_SESSION ['uname']))
{
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
            <h1 class="m-0 text-dark">Paper</h1>
          </div><!-- /.col -->
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
              <h3 class="card-title">Paper</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
              <tr>
                <th>No</th>
                <th>Question</th>
                <th>Marks</th>
                <th>subject</th>
                <th>Action</th>
              </tr>
              <?php
              $con=mysqli_connect("localhost","root","","exam");
              $id=$_GET['id'];
              $marks=$_GET['mark'];
              $subject=$_GET['subject'];
              // $last=mysqli_query($con, "SELECT * FROM student");
              // $max=mysqli_num_rows($last);
              // $new=rand(1,$max);
              $new_question = mysqli_query($con, "SELECT * FROM student WHERE marks=$marks AND subject='".$subject."' order by RAND()");
              $no=0;
              while ($row=mysqli_fetch_array($new_question)) 
              {
                $question=$row['question'];
                $mark=$row['marks'];
                $subject=$row['subject'];
                ?>
                <tr>
                  <td><?php $no=$no+1; echo "$no"; ?></td>
                  <td><?php echo "$question"; ?></td>
                  <td><?php echo "$mark"; ?></td>
                  <td><?php echo "$subject"; ?></td>
                  <td>
                    <form method="GET" action="paper_addnew.php">
                      <input type="hidden" name="id" value="<?php echo "$id"; ?>">
                      <input type="hidden" name="question" value="<?php echo "$question"; ?>">
                      <input type="hidden" name="mark" value="<?php echo "$mark"; ?>">
                      <input type="hidden" name="subject" value="<?php echo "$subject"; ?>">
                      <button class="btn btn-primary">Add</button>
                    </form>
                  </td>

                </tr>

                <?php
              }     
              mysqli_close($con)
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
}
else{
  header("location: index.php");
}
?>