
<?php


if(isset($_POST['submit'])) {




/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "evaluation_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$school_id = $_POST['school_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class_id = $_POST['class_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$class_id = $_POST['class_id'];
$avatar = $_POST['img'];

// Attempt insert query execution
$sql = "INSERT INTO student_list (id, school_id, firstname, lastname,email,password,class_id,avatar) VALUES ('', '$school_id', '$firstname', '$lastname','$email','$password','$class_id','$avatar')";
if(mysqli_query($link, $sql)){
    header('Location:login.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>