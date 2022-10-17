<?php include'db_connect.php';
$id =  $_SESSION['login_school_id'];
	
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
	<li class="nav-item active ">
        <a class="nav-link" href="index.php?page=Result_Exam">All <span class="sr-only">(current)</span></a>
      </li>
	<?php
	$progress = "SELECT * FROM class_list";

	$kan = mysqli_query($conn, $progress);

	foreach ($kan as $rows) {

?>
      <li class="nav-item">
        <a class="nav-link p-2" href="index.php?page=Semesters_Exam&idd=<?php echo $rows['curriculum']; ?>" > <?php echo $rows['curriculum']; ?></a>
      </li>
	  
<?php
		}
?>
    </ul>
  </div>
</nav>


<div class="col-lg-12">
	<div class="card card-outline card-danger">
		<div class="card-header">
			<div class="row">
				<div class="col-9"></div>
			<div class="card-tools p-2">
				<a class="btn btn-success btn-sm btn-flat " href="./index.php?page=Upload_form"><i class="fa fa-file-excel"></i> Upload Excel</a>
			</div>
			<div class="card-tools p-2">
				<a class="btn btn-danger btn-sm btn-flat " href="./index.php?page=new_evaluation"><i class="fa fa-plus"></i> Add Exam</a>
			</div>
			</div>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<!-- <th class="text-center">#</th> -->
	
						<th>Student ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignment</th>
						<th>Attendance</th>
						<th>Final</th> 
						<th>Total</th>
						<th>Grade</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					

					$progress = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list  where Class_id = $id");


					
					// $qry = $conn->query("SELECT *,concat(Course,' ',StudentID) as name FROM evaluation_list");
					while($row= $progress->fetch_assoc()):
					?>
					<tr>
						<!-- <th class="text-center"><?php echo $i++ ?></th> -->
						<!-- <td><b><?php echo ($row['evaluation_id']) ?></b></td> -->
						<td><b><?php echo ($row['StudentID']) ?></b></td>
						<td><b><?php echo ($row['Course']) ?></b></td>
						<td><b><?php echo ($row['Midterm']) ?></b></td>
						<td><b><?php echo ($row['Assignment']) ?></b></td>
						<td><b><?php echo ($row['Attendance']) ?></b></td>
						<td><b><?php echo ($row['Final']) ?></b></td>
						<td><b><?php echo ($row['Final'] + $row['Midterm'] + $row['Assignment'] + $row['Attendance']) ?></b></td>
						<td><b>
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
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_evaluation&id=<?php echo $row['evaluation_id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_evaluation" href="javascript:void(0)" data-id="<?php echo $row['evaluation_id'] ?>">Delete</a>
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_evaluation').click(function(){
		uni_modal("Evaluation Details","view_evaluation.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_evaluation').click(function(){
	_conf("Are you sure to delete this evaluation?","delete_evaluation",[$(this).attr('data-id')])
	})
	})
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
	}
</script>