<?php include('db_connect.php'); ?>
<?php 
function ordinal_suffix1($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return $num.'st';
            case 2: return $num.'nd';
            case 3: return $num.'rd';
        }
    }
    return $num.'th';
} 
$astat = array("Not Yet Started","On-going","Closed");
 ?>
 <div class="col-12">
    <div class="card card-outline card-success">
      <div class="card-body">
 
        <br>         
      <div class="row"> 
      <div class="col-md-9">
        <img src="./assets/loginLogo.png" style="border-radius: 10px; margin-top: -30px;" alt="">
        </div>
        <div class="col-md-3 border-left border-success">
          <h3 class="text-success"><i><span class=""><img style="height: 40px;width: 40px; border: 1px solid  black;" src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img"></span><br><span class="text-danger" style="font-size: 23px;">Welcome Back</span> <span style="font-weight: bold;"><br> <?php echo $_SESSION['login_firstname'] ?> <?php echo $_SESSION['login_lastname'] ?></span> </i></h3>
         
        </div>
      </div>

        <!-- <div class="col-md-5">
          <div class="callout callout-info">
            <h5><b>Academic Year: <?php echo $_SESSION['academic']['year'].' '.(ordinal_suffix1($_SESSION['academic']['semester'])) ?> Semester</b></h5>
            <h6><b>Evaluation Status: <?php echo $astat[$_SESSION['academic']['status']] ?></b></h6>
          </div>
        </div> -->
      </div>
    </div>
</div>
      <div class="card p-2 m-2" style="background-color: white;">
      <div class="row p-2">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM faculty_list ")->num_rows; ?></h3>

                <p>Total Faculties</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-friends text-danger"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM student_list")->num_rows; ?></h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="fa ion-ios-people-outline text-danger"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM users")->num_rows; ?></h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-users text-danger"></i>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM class_list")->num_rows; ?></h3>

                <p>Total Semesters</p>
              </div>
              <div class="icon">
                <i class="fa fa-list-alt text-danger"></i>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM evaluation_list")->num_rows; ?></h3>

                <p>Total Result Exams</p>
              </div>
              <div class="icon">
                <i class="fa fa-list text-danger"></i>
              </div>
            </div>
          </div>
         
      </div>
      </div>
