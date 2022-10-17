<?php require 'db_connect.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
	</head>
	<body>

	<div class="card card-outline card-danger p-4">
		<form  class="" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Upload Excel File</label>
				<input type="file" name="excel" class="form-control"  value="" required>
			</div>
			<div class="form-group">
				<button type="submit" name="import" class="btn btn-danger"> <i class="fa fa-file-excel"></i> Upload Now</button>
			</div> 
			</div>
		</form>
	</div>
	<?php

if(isset($_POST["import"])){
	$fileName = $_FILES["excel"]["name"];
	$fileExtension = explode('.', $fileName);
$fileExtension = strtolower(end($fileExtension));
	$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

	$targetDirectory = "faculty/uploads/" . $newFileName;
	move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

	error_reporting(0);
	ini_set('display_errors', 0);

	require 'excelReader/excel_reader2.php';
	require 'excelReader/SpreadsheetReader.php';

	$reader = new SpreadsheetReader($targetDirectory);
	foreach($reader as $key => $row){
			
		$StudentID = $row[0];
		$Course =  $row[1];
		$Midterm =  $row[2];
		$Assignment =  $row[3];
		$Attendance =  $row[4];
		$Final =  $row[5];
		$Class_id =  $row[6];
		$Semester =  $row[7];
		

		mysqli_query($conn, "INSERT INTO evaluation_list VALUES('', '$StudentID', '$Course', '$Midterm','$Assignment','$Attendance','$Final','$Class_id','$Semester')");

	}

	echo
	"
	<script>
	alert('Succesfully Imported');
	document.location.href = 'index.php?page=Result_Exam';
	</script>
	";
}
?>
		
	</body>
</html>
