<style>
.filterDiv {
  display: none; /* Hidden by default */
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Add a dark background to the active button */
.btn.active {
  background-color: #8b0000;
  color: white;
}

/* Dropdown Button */
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<?php include'db_connect.php';
$id = $_SESSION['login_school_id'];
// $sax = $_GET['idd']; 

?>

<div class="col-lg-12">
	<div class="card card-outline card-success">
		
		<div class="card-body">
			<div class="row">
				<img class="mx-auto d-block" src="./assets/download.jpg" style="height:130px; width: 130px;" alt="">
			</div>
		<div class="row p-2">
			<div class="col-md-12 text-center">
				<h3 style="font-size: 38px;" class="text-success"><b>FRANTZ FANON</b></h6>
			</div>
			<div class="col-md-12 text-center">
				<h5 ><b>U N I V E R S I T Y</h5>
			</div>
			
		</div>
		<hr>
		<div class="row">
			<div class="col-md-10">
				<p style="font-weight: 400"><b>STUDENT:</b>  <?php echo strtoupper($_SESSION['login_firstname'])  ?> <?php echo strtoupper($_SESSION['login_lastname'])  ?></p>
			</div>
			<div class="col-md-2">
				<p style="font-weight: 400; margin-left: 66px;"><b>ID:</b> <?php echo ucwords($_SESSION['login_school_id']) ?></p>
			</div>									
								
		</div>
	
	</div>
</div>

<div class="dropdown hamse">
  <button class="dropbtn dropdown-toggle p-2 rounded bg-dark">Select Semester</button>
  <div class="dropdown-content" id="myBtnContainer">
    <a class="p-1 btn dropdown-item" onclick="filterSelection('all')">All</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semesterone')">SemesterOne</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semestertwo')">SemesterTwo</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semesterthree')">SemesterThree</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semesterfour')">SemesterFour</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semesterfive')">SemesterFive</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semestersix')">SemesterSix</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semesterseven')">SemesterSeven</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semestereight')">SemesterEight</a>
    <a class="p-1 btn dropdown-item" onclick="filterSelection('semesternine')">SemesterNine</a>
  </div>
</div>

<br>
<br>
<div class="p-2 card card-outline card-dark filterDiv semesterone" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester One
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterOne'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):

					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php 
			endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semestertwo" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Two
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterTwo'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semesterthree" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Three
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterThree'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semesterfour" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Four
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterFour'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semesterfive" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Five
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterFive'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semestersix" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Six
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterSix'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semesterseven" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Seven
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterSeven'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semestereight" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Eight
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterEight'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	
<div class="p-2 card card-outline card-dark filterDiv semesternine" style="background-color: white; border-radius: 5px;" >
<div class="row p-2 text-dark">
	Semester Nine
</div>
	<div class="table-responsive">
			<table class="table tabe-hover table-striped"  id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
						<th>ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
					</tr>
				</thead>
				<tbody style="font-weight: 400">
					<?php
					
					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where StudentID = $id AND Semester = 'SemesterNine'");
					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><?php echo ($row['StudentID']) ?></td>
						<td><?php echo ($row['Course']) ?></td>
						<td><?php echo ($row['Midterm']) ?></td>
						<td><?php echo ($row['Assignment']) ?></td>
						<td><?php echo ($row['Attendance']) ?></td>
						<td><?php echo ($row['Final']) ?></td>
						<td><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></td>
						<td> <b>
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
							?></b>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			</div>	
		</div>
	

	<div class="row">
	<div class="col-md-12 ">
		<!-- <a href="index.php?page=makepdf" class="btn btn-danger col-12"> <i class="fa fa-download"></i> Download</a>  -->
		<a href="index.php?page=calculate" class="btn btn-success col-12"> <i class="fa fa-file"></i> Calculate GPA</a> 
	</div>
	</div>

	
<script>

	function delete_evaluation($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_evaluation',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	};

	filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>