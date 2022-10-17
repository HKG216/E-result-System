

<?php include'db_connect.php';
// $id = $_GET['res_id'];
?>
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
$astat = array("Not Yet Started","Started","Closed");


$kan2 = $_SESSION['login_school_id'];

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
            <h3 class="text-success"><i><span class=""><img style="height: 40px;width: 40px; border: 1px solid  black;" src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img"></span><br><span class="text-dark" style="font-size: 17px;">Welcome Back</span> <span style="font-weight: bold;"><br> <?php echo $_SESSION['login_firstname'] ?> <?php echo $_SESSION['login_lastname'] ?></span> </i></h3>
          
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
        <p class="p-2"> Welcome <b class="text-success"><?php echo strtoupper($_SESSION['login_name']) ?>!</b> </p> 
     <div class="row">
     <div class="col-12">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3 class="text-danger"><?php echo $conn->query("SELECT * FROM evaluation_list where StudentID =$kan2")->num_rows; ?></h3>

                <p>Total Courses</p>
              </div>
              <div class="icon">
                <i class="fa ion-ios-book-outline text-danger"></i>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
      <div class="col-6">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <?php
                	$progress = $conn->query("SELECT * FROM evaluation_list  where StudentID = $kan2");
                  while($row= $progress->fetch_assoc()):
                    ?>
                    <p class=""> <?php echo $row['Course']; ?> </p>
                    <?php 
							?>
              <?php endwhile; ?>
            </div>
          </div>
      </div>
     
      <div class="col-3">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <?php
                	$progress = $conn->query("SELECT *  FROM evaluation_list  where StudentID = $kan2");
                  while($row= $progress->fetch_assoc()):
                    ?>
                    <p style=""> <?php 
                    
                    $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                    echo $total;
                    
                    
                    ?> </p>
                    <?php 
							
							?>
              <?php endwhile; ?>
            </div>
          </div>
      </div>

      <div class="col-3">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <?php
                	$progress = $conn->query("SELECT *  FROM evaluation_list  where StudentID = $kan2");
                  while($row= $progress->fetch_assoc()):
                    ?>
                    <p class="text-bold"> <?php 
                    
                    $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];

                    if($total > 95){
                      echo 'A+';
                    }
                    else if($total >= 90){
                      echo 'A';
                    }
                    else if($total >= 85){
                      echo 'A-';
                    }
                    else if($total >= 80){
                      echo 'B+';
                    }
                    else if($total >= 75){
                      echo 'B';
                    }
                    else if($total >= 70){
                      echo 'B-';
                    }
                    else if($total >= 65){
                      echo 'C+';
                    }
                    else if($total >= 60){
                      echo 'C';
                    }
                    else{ ?>
                       <p style="color: red;"><?php  echo'F'; ?></p>
                    
                    <?php  }
                    
                    
                    ?> </p>
                    <?php 
							
							?>
              <?php endwhile; ?>
            </div>
          </div>
      </div>
      </div>
    </div>
      
    </div>
    
</div>
