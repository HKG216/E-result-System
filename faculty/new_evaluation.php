<?php
?>
<div class="col-lg-12">
	<div class="card card-outline card-danger">
		<div class="card-body">
			<form action="" id="manage_evaluation">
				<input type="hidden" name="evaluation_id" value="<?php echo isset($evaluation_id) ? $evaluation_id: '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Student ID</label>
							<input type="text" name="StudentID" class="form-control form-control-sm" required value="<?php echo isset($StudentID) ? $StudentID: '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Course</label>
							<input type="text" name="Course" class="form-control form-control-sm" required value="<?php echo isset($Course) ? $Course : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Midterm</label>
							<input type="text" name="Midterm" class="form-control form-control-sm" required value="<?php echo isset($Midterm) ? $Midterm : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Assignment</label>
							<input type="text" name="Assignment" class="form-control form-control-sm" required value="<?php echo isset($Assignment) ? $Assignment : '' ?>">
						</div>
					</div>	
							<hr>
						<div class="col-md-6">
							<div class="form-group">
								<label for="" class="control-label">Attendance</label>
								<input type="text" name="Attendance" class="form-control form-control-sm" required value="<?php echo isset($Attendance) ? $Attendance : '' ?>">
							</div>	
							<div class="form-group">
								<label for="" class="control-label">Final</label>
								<input type="text" name="Final" class="form-control form-control-sm" required value="<?php echo isset($Final) ? $Final: '' ?>">
							</div>
							<div class="form-group">
								<label for="" class="control-label">School ID</label>
								<input type="text"  name="Class_id" class="form-control form-control-sm"  value="<?php echo $_SESSION['login_school_id']?>">
								<!-- <input type="text" name="lastname" value="Fuclty"  class="form-control form-control-sm" required value="<?php echo isset($lastname) ? $lastname : '' ?>" disabled> -->

							</div>
							<div class="form-group">
							<label for="" class="control-label">Class</label>
							<select name="Semester" id="Semester" class="form-control form-control-sm select2" >
								<option value=""></option>
								<?php 
								$classes = $conn->query("SELECT id,concat(curriculum) as class FROM class_list");
								while($row=$classes->fetch_assoc()):
								?>
								<option value="<?php echo $row['class'] ?>" <?php echo isset($class_id) && $class_id == $row['class'] ? "selected" : "" ?>><?php echo $row['class'] ?></option>
								<?php endwhile; ?>
							</select>
						</div>
							</div>
					
						
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-danger mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=Result_Exam'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="clone_progress" class="d-none">
	<div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm avatar" src="" alt="user image">
                <span class="username">
                  <a href="#" class="nf"></a>
                </span>
                <span class="description">
                	<span class="fa fa-calendar-day"></span>
                	<span><b class="date"></b></span>
            	</span>
              </div>
              <div class="pdesc">
              
              </div>

              <p>
              </p>
        </div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
	#post-field{
		max-height: 70vh;
		overflow: auto;
	}
</style>
<script>
	$(document).ready(function(){
		if('<?php echo isset($id) ?>' == 1){
			update_emp()
		}
	})
	
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#employee_id').change(function(){
		update_emp()
	})
	// 
	function task_update(){
		$('#task_id').change(function(){
			start_load()
			$.ajax({
			url:'ajax.php?action=get_progress',
			method:'POST',
			data:{task_id:$(this).val(),id:'<?php echo isset($id) ? $id : ''; ?>'},
			error:(err)=>{
				alert_toast("An error occured",'error')
				console.log(err)
				end_load()
			},
			success:function(resp){
				if(resp && typeof JSON.parse(resp) === 'object'){
					resp = JSON.parse(resp)
					if(Object.keys(resp).length > 0){
						$('#post-field').html('')
						var id ='<?php echo isset($id) ? $id : ''; ?>' ;
						Object.keys(resp).map(k=>{
							var _progress = $('#clone_progress .post').clone()
							_progress.find('.pdesc').append(resp[k].progress)
							_progress.find('.avatar').attr('src','assets/uploads/'+resp[k].avatar)
							_progress.find('.nf').text(resp[k].uname)
							_progress.find('.date').text(resp[k].date_created)
							if(id == resp[k].id)
								_progress.attr('selected','selected')
							$('#post-field').append(_progress)
						})
					 	$('#ratings-field').show()
					}else{
					 	$('#ratings-field').hide()
					}
				}
			},
			complete:function(){
				end_load();
			}
		})
		})
	}
	$('#manage_evaluation').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$.ajax({
			url:'ajax.php?action=save_evaluation',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php?page=Result_Exam')
					},750)
				}
			}
		})
	})
</script>