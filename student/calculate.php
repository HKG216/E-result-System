<?php

include'db_connect.php';
$id = $_SESSION['login_school_id'];

?>


<style>
table {
    border-collapse: collapse;
}


</style>


	<div class="table-responsive">
<div class="card card-outline card-dark p-4">
<div class="row">
    <div class="col-3">
        <h6>RESULT EXAMINATION SYSTEM</h6>
        <h6>Email: FFU@gmail.com</h6>
        <h6>Hargeisa, Somaliland.</h6>
    </div>
    <div class="col-5">
       <div class="row">
       <img src="./assets/download.jpg" style="width: 60px; margin-left: 30px;" alt="">
        <h3 class="p-2" style="font-size: 23px; margin-left:3px; text-align: center;" class="text-center">  <b>FRANTZ FANON UNIVERSITY</b></h3> <br>
        <span style="margin-left: 160px; margin-top: -15px;">STUDENT RECOERD</span>
       </div>
    </div>
    <div class="col-1">
    <img src="./assets/download.jpg" style="width: 60px;" alt="">

    </div>
    <div class="col-3">    
    <?php

        // $id = $_SESSION['login_id'];
        $i = 1;
        $class= array();
        $classes = $conn->query("SELECT id,concat(lastname) as `class` FROM faculty_list");
        while($row=$classes->fetch_assoc()){
            $class[$row['id']] = $row['class'];
        }
        // $qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM student_list where class_id = $id  order by concat(firstname,' ',lastname) asc");
        ?>    
        <h6>Major: <?php echo isset($class[$_SESSION['login_class_id']]) ? $class[$_SESSION['login_class_id']] : "N/A" ?></span> <h6>
        <h6>Admision Classification: Regular</h6>
    </div>
</div>

<div class="row rounded p-1"  style="border:2px solid black;margin-top: 8px;" >
    <div class="col-4">
        <h6><b>Student Name:</b> <span style="font-weight: 400"> <?php echo $_SESSION['login_firstname']?> <?php echo  $_SESSION['login_lastname'] ?></span></h6> 
        <h6><b>Student ID:</b> <span style="font-weight: 400"> <?php echo $_SESSION['login_school_id']?></span></h6>
    </div>
    <div class="col-4">
        <h6><b>Email:</b> <span style="font-weight: 400"> <?php echo $_SESSION['login_email'] ?></span></h6> 
        <h6><b>Date of Regsiter:</b> <span style="font-weight: 400"> <?php echo $_SESSION['login_date_created'] ?></span></h6>
    </div>
    <div class="col-4">
        <h6><b>Date of Brith:</b> <span style="font-weight: 400"> None</span></h6> 
        <h6><b>Medium of Instruction:</b> <span style="font-weight: 400"> English</span></h6>
    </div>
   
</div>
<br>
    <div class="row">
        <div class="col-6">
        <div class="card card-outline card-dark p-2">
            <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>1</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
          <div class="table-responsive">
          <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterOne'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                // $a = 12.00; 
                                // $b = 11.25;
                                // $c = 10.50;
                                // $d = 9.75;	
                                // $e = 9;
                                // $f = 8.25;	
                                // $g = 7.50;
                                // $h = 6.75;
                                // $i = 6;

                                global $kan;
                                
                                $kan = [12.00, 11.25, 10.50, 9.75, 9, 8.25, 7.50, 6.75, 6];


								if($Point > 95){
                                    echo $kan[0];
								}
								else if($Point >= 90){
                                    echo $kan[1];
								}
								else if($Point >= 85){
                                    echo $kan[2];
								}
								else if($Point >= 80){
                                    echo $kan[3];
								}
								else if($Point >= 75){
                                    echo $kan[4];
								}
								else if($Point >= 70){
                                    echo $kan[5];
								}
								else if($Point >= 65){
                                    echo $kan[6];
								}
								else if($Point >= 60){
                                    echo $kan[7];
								}

								else{
                                    echo $kan[8];
								}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                        <!--     -->
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table> 
          </div>
            </div>
            
            <br>
            <br>
        <!-- Semseter Two Is Here -->
        <div class="card card-outline card-dark p-2">
            <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>2</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterTwo'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}
                                else{
                                    echo $i;
								}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
                     
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
   </div>
            <br>
            <br>
        <!-- Semseter Three Is Here -->
        <div class="card card-outline card-dark p-2">
            <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>3</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterThree'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}

								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
                        </div>

            <br>
            <br>
        <!-- Semseter Four Is Here -->

        <div class="card card-outline card-dark p-2">
            <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>4</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterFour'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}

								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
        </div>
            <br>
            <br>
        <!-- Semseter Five Is Here -->
        <div class="card card-outline card-dark p-2">
        <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>5</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterFive'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}

								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
        </div>
         
            
        </div>
        <div class="col-6">
                  <!-- Semseter Six Is Here -->
        <div class="card card-outline card-dark p-2">
        <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>6</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterSix'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}

								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
        </div>
        <br><br>

              <!-- Semseter Seven Is Here -->
              <div class="card card-outline card-dark p-2">
        <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>7</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterSeven'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}

								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
        </div>
        <br><br>

              <!-- Semseter Eight Is Here -->
              <div class="card card-outline card-dark p-2">
        <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>8</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterEight'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}

								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
        </div>
        <br><br>

              <!-- Semseter Nine Is Here -->
              <div class="card card-outline card-dark p-2">
        <div class="row">
                <div class="col-3">
                    <h6><b>Semester</b></h6>
                </div>
                <div class="col-2">
                    <p>9</p>
                </div>
                <div class="col-5">
                    <h6><b>Academic Year</b></h6>
                </div>
                <div class="col-2">
                    <p><?php echo date("Y"); ?></p>
                </div>
            </div> <hr class="bg-dark p-0 m-0">
            <table class="table table-none">
                <thead >
                    <th>#ID</th>
                    <th>Course Title</th>
                    <th>Cr. Hrs</th>
                    <th>Grade</th>
                    <th>Points</th>
                </thead>
                <tbody>
                        <?php
                        
                        $progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterNine'");
                        // $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
                        while($row= $progress->fetch_assoc()):
                            $total = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                             $hour = 3;
                            //  $crhour = 3 * $row['Course']->num_rows;
                            // $val = 0.75;
                        ?>
                           <tr>
                           <td><?php echo $row['StudentID']; ?></td>
                            <td><?php echo $row['Course']; ?></td>
                            <td><?php echo $hour; ?></td>
                            <td>
							<?php 
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
								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
							?>
						</td>
                        <td>
                        <?php 
								$Point = $row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance'];
                                
                                $a = 12.00;
                                $b = 11.25;
                                $c = 10.50;
                                $d = 9.75;	
                                $e = 9;
                                $f = 8.25;	
                                $g = 7.50;
                                $h = 6.75;
                                $i = 6;


								if($Point > 95){
                                    echo $a;
								}
								else if($Point >= 90){
                                    echo $b;
								}
								else if($Point >= 85){
                                    echo $c;
								}
								else if($Point >= 80){
                                    echo $d;
								}
								else if($Point >= 75){
                                    echo $e;
								}
								else if($Point >= 70){
                                    echo $f;
								}
								else if($Point >= 65){
                                    echo $g;
								}
								else if($Point >= 60){
                                    echo $h;
								}

								else{
									?>
								  	<p style="color: red;"><?php echo'F'; ?></p>
							<?php	}
                            
							?>
						</td>
                        </tr>
                        
                        <?php
                            endwhile;
                        ?>
                    
               </tbody>
               
               <!-- <hr class="bg-dark m-2 " style="margin-top: 10px;"> -->
            </table>
        </div>
        </div>
    </div>
</div>

</div>
<div class="row ">
    <div class="col-2">

    </div>
    <div class="col-8">
    <p class="text-center" style="text-aling:center;"> This is calcualte GPA is not officail, please go to registrar office to get full trasnscript.</p>

    </div>
</div>


