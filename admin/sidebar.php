<aside class="main-sidebar sidebar-dark-success elevation-4" >
    <div class="dropdown">
   	<a href="./" class="brand-link" style="background-color: white; color: black;">
        <h3 class="text-center text-success p-0 m-0"><b>E-Result System</b></h3>


    </a>

    </div>
    <div class="sidebar text-white"> 
      <nav class="mt-2">
      <div class="row p-2">
        <span class=""><img style="height: 150px; margin-top: 14px; width: 150px; margin-left: 40px; border: 4px solid  lightgray;" src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img"></span>
        <div class="col-md-12 text-white text-center p-2" >
        <span style="font-size: 22px;"><b> <?php echo strtoupper(ucwords($_SESSION['login_firstname'])) ?></b></span> 
        <div class="col-md-12">
        <span>ADMINSTRATOR</span>

        
        </div> 
        </div> 
      </div> <hr class="bg-light p-0 m-1">
        <ul class="nav nav-pills  nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item dropdown ">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon text-white fas fa-tachometer-alt"></i>
              <p class="text-white">
                Dashboard
              </p>
            </a>
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
            <a href="#" class="nav-link nav-edit_faculty">
              <i class="nav-icon text-white fas fa-user-friends"></i>
              <p class="text-white">
                Faculties
                <i class="right fas text-white fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_faculty" class="nav-link nav-new_faculty tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=faculty_list" class="nav-link nav-faculty_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon text-white fas fa-users"></i>
              <p class="text-white">
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
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
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
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