<?php
include '../db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM class_list where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-class">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
			<label for="curriculum" class="control-label">Semester</label>
			<!-- <input type="text" class="form-control form-control-sm" name="curriculum" id="curriculum" value="<?php echo isset($curriculum) ? $curriculum : '' ?>" required> -->
			<select name="curriculum" class="form-control form-control-sm" id="curriculum">
				<option value="SemesterOne">Semester One</option>
				<option value="SemesterTwo">Semester Two</option>
				<option value="SemesterThree">Semester Three</option>
				<option value="SemesterFour">Semester Four</option>
				<option value="SemesterFive">Semester Five</option>
				<option value="SemesterSix">Semester Six</option>
				<option value="SemesterSeven">Semester Seven</option>
				<option value="SemesterEight">Semester Eight</option>
				<option value="SemesterNine">Semester Nine</option>
			</select>
		</div>
		
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-class').submit(function(e){
			e.preventDefault();
			start_load()
			$('#msg').html('')
			$.ajax({
				url:'ajax.php?action=save_class',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully saved.","success");
						setTimeout(function(){
							location.reload()	
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Class already exist.</div>')
						end_load()
					}
				}
			})
		})
	})

</script>