<aside class="main-sidebar sidebar-dark-success elevation-4">
    <div class="dropdown">
   	<a href="./" class="brand-link" style="background-color: white;" >
           <!-- <span><img src="./assets/download.jpg" class="" style="width: 40px; margin-left: 30px; Border-radius:15px;" class="" alt=""></span> -->
           <h3 class="text-center p-0 m-0 text-success" ><b>E-Result System</b></h3>
    </a>
      
    </div>
    <div class="sidebar ">
  
     
    <nav class="mt-2">
    <div class="row ">
        <span class="mx-auto"><img style="height: 120px; margin-top: 14px; width: 120px; border: 4px solid lightgray;" src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img"></span>
        <div class="col-md-12 text-white text-center p-2" >

        <span style="font-size: 24px; font-weight: 300;"><b><?php echo $_SESSION['login_firstname'] ?></b></span> 
        <div class="col-md-12">
        <!-- <span>ID <?php echo ucwords($_SESSION['login_school_id']) ?></span> -->
        </div> 
        </div> 
      </div>        <hr class="p-0 m-1 bg-light">

        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" style="color: white;" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon text-white fas fa-tachometer-alt"></i>
              <p class="text-white">
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item dropdown">
            <a href="./index.php?page=result"  class="nav-link nav-edit_evaluation">
              <i class="nav-icon text-white fas fa-th-list"></i>
              <p class="text-white">
                Exam Result <i class="right fas fa-angle-left"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_evaluation"  class="nav-link nav-new_evaluation tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=Upload_form" class="nav-link nav-Upload_form tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Upload Exam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=Result_Exam"  class="nav-link nav-Result_Exam nav-Semesters_Exam tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>  
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_class">
              <i class="nav-icon text-white fa fa-calendar"></i>
              <p class="text-white">
                  Semesters
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=class_list" class="nav-link nav-class_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_student">
              <i class="nav-icon text-white fa fa-users ion-ios-people-outline"></i>
              <p class="text-white">
                 Students
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_student" class="nav-link nav-new_student tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=student_list"  class="nav-link nav-student_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>  
              </li>
            </ul>
          </li> 
        </ul>
      </nav> 
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>'
      ;
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }
  		}
  	})
  </script>