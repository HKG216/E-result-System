<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM evaluation_list where evaluation_id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'new_evaluation.php';
?>