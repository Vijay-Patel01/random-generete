<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="assests/img/kskv.jpg" alt="kskv Logo" class="brand-image">
    <span class="brand-text">Computer Science</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		  <?php
		  if($_SESSION ['auth'] !=="Faculty")
		  {
			  ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
               Course
               <i class="fas fa-angle-left right"></i>
               <!-- <span class="badge badge-info right">6</span> -->
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="course_add.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="course_view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Courses</p>
              </a>
            </li>
          </ul>
        </li> 
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
               Subject
               <i class="fas fa-angle-left right"></i>
               <!-- <span class="badge badge-info right">6</span> -->
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="subject_add.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Subjects</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="subject_view.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Subjects</p>
              </a>
            </li>
          </ul>
        </li> 
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
             Member
             <i class="fas fa-angle-left right"></i>
             <!-- <span class="badge badge-info right">6</span> -->
           </p>
         </a>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="member_add.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add Members</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="member_view.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>View Members</p>
            </a>
          </li>
        </ul>
      </li>
	  <!--<li class="nav-item">
            <a href="truncate.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Truncate Question
              </p>
            </a>
         --> </li>
	  <?php
		  }
		  ?>
      <li class="nav-item">
        <a href="upload_question.php" class="nav-link">
          <i class="nav-icon fas fa-upload"></i>
          <p>
            Upload Questions
          </p>
        </a>
      </li> 
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-file"></i>
          <p>
           Paper
           <i class="fas fa-angle-left right"></i>
           <!-- <span class="badge badge-info right">6</span> -->
         </p>
       </a>
       <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="paper_generate.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Generate Papers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="paper_view.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>View Papers</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-copy"></i>
        <p>
         Old Papers
         <i class="fas fa-angle-left right"></i>
         <!-- <span class="badge badge-info right">6</span> -->
       </p>
     </a>

     <ul class="nav nav-treeview">

       <?php
       $con=mysqli_connect("localhost","root","","exam");
       $get_name=mysqli_query($con,"SELECT * FROM course Group by name");
       foreach ($get_name as $key => $value) 
       {
        ?>

        <li class="nav-item">
          <a href="old_paper.php?name=<?php echo $value['name']; ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo $value['name']; ?></p>
          </a>
        </li>                      
        <?php
      }
      ?>
    </ul>
  </li>
  <li class="nav-item">
        <a href="contact.php" class="nav-link">
          <i class="nav-icon fas fa-phone"></i>
          <p>
            Contact Us
          </p>
        </a>
      </li> 



</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>