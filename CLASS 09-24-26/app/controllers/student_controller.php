<?php
	require_once "../models/student_model.php";
	$uname = $_GET["uname1"];
	$upass = $_GET["upass1"];
	$student = new Student("10.70.0.55","students","boot","boot",$uname,$upass);
	$student->Login();
?>