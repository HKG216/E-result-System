<?php include('db_connect.php');
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
$kan = $_SESSION['login_school_id'];
$kan2 = $_SESSION['login_id'];
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
          <h3 class="text-success"><i><span class=""><img style="height: 40px;width: 40px; border: 1px solid  black;" src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img"></span><br><span class="text-danger" style="font-size: 23px;">Welcome Back</span> <span style="font-weight: bold;"><br> <?php echo $_SESSION['login_firstname'] ?></span> </i></h3>
         
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
<div class="col-12">
    <div class="card">
      <div class="card-body">
      <h6><?php echo $_SESSION['login_lastname'] ?> Faculty</h6>
      <div class="row">
      <div class="col-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM evaluation_list where Class_id = $kan ")->num_rows; ?></h3>

                <p>Total Result Exams</p>
              </div>
              <div class="icon">
                <i class="fa fa-list text-danger"></i>
              </div> 
            </div>
          </div>
          <div class="col-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM student_list where class_id= $kan2")->num_rows; ?></h3>

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
                <h3 class="text-success"><?php echo $conn->query("SELECT * FROM class_list")->num_rows; ?></h3>

                <p>Total Semesters</p>
              </div>
              <div class="icon">
                <i class="fa fa-list text-danger"></i>
              </div>
            </div>
          </div>
      </div>
      
    </div>
</div>
