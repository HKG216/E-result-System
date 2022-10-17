<aside class="main-sidebar sidebar-dark-success elevation-4">
      <div class="dropdown">
      <a href="./" class="brand-link" style="background-color: white;">
          <h3 class="text-center p-0 m-0 text-success" ><b>E-Result System</b></h3>

      </a>
        
      </div>
    <div class="sidebar ">
      <nav class="mt-2"> 
        <div class="row p-2">
        <span class=""><img style="height: 150px; margin-top: 14px; width: 150px; margin-left: 40px; border: 4px solid lightgray;" src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img"></span>
        <div class="col-md-12 text-white text-center p-2" >
        <span style="font-size: 24px;"><b><?php echo strtoupper(ucwords($_SESSION['login_firstname'])) ?> <?php echo strtoupper(ucwords($_SESSION['login_lastname'])) ?></b></span> 
        <div class="col-md-12">
        <span style="font-weight: 200; font-size:14px;"><?php echo ucwords($_SESSION['login_email']) ?></span>

        
        </div>  
        </div>
      </div> <hr class="m-1 bg-light">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=Result" class="nav-link nav-Result nav-makepdf">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Result Exam
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=calculate" class="nav-link nav-calculate">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Calculate GPA
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=settings" class="nav-link nav-settings">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
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