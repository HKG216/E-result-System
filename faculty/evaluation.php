<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_evaluation"><i class="fa fa-plus"></i> Add New Evaluation</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Course</th>
						<th>Midterm</th>
						<th>Assignments</th>
						<th>Attendance</th>
						<th>Final</th>
						<th>Total</th>
						<th>Grade</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$id = $_SESSION['login_school_id'];
					$i = 1;
					
					$qry = $conn->query("SELECT *,concat(StudentID,' ',evaluation_id) as name FROM evaluation_list where Class_id = $id");
					while($row= $qry->fetch_assoc()):
						$total = $row['Midterm'] + $row['Assignment'] + $row['Attendance'] + $row['Final'];
					?>
					<tr>
						<td><b><?php echo ($row['StudentID']) ?></b></td>
						<td><b><?php echo ($row['Course']) ?></b></td>
						<td><b><?php echo ($row['Midterm']) ?></b></td>
						<td><b><?php echo ($row['Assignment']) ?></b></td>
						<td><b><?php echo ($row['Attendance']) ?></b></td>
						<td><b><?php echo ($row['Final']) ?></b></td>
						<td><b><?php echo ($total); ?></b></td>
						<td><b><?php 
							if($total >= 95){
								echo 'A+';
							}
							else if($total >= 90){
								echo 'A-';
							}
							else if($total >= 85){
								echo 'A';
							}
							else if($total >= 80){
								echo 'B+';
							}
							else if($total >= 75){
								echo 'B-';
							}
							else if($total >= 70){
								echo 'B';
							}
							else if($total >= 65){
								echo 'C+';
							}
							else if($total >= 60){
								echo 'C';
							}else { ?>

							<td class="text-danger"><b><?php echo 'F'; ?></b></td>
								<?php
							}
						
						?></b></td>
						
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
							<div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_evaluation&id=<?php echo $row['evaluation_id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_evaluation" href="javascript:void(0)" data-id="<?php echo $row['evaluation_id'] ?>">Delete</a>		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
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