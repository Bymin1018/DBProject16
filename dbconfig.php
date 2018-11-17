<?php
	$db = new mysqli('35.236.158.28:3306', 'root','12341234','dbproject');
	
	if($db->connect_error){
		die('오류');
	}
	else{
    echo "<script>alert("이렇게 띄우면 되자나");</script>";
	}
	
	$db->set_charset('utf-8');
	date_default_timezone_set('Asia/Seoul');
?>