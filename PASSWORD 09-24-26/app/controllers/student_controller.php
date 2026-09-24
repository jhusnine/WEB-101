<?php
		require_once "../models/student_model.php";
		$search = $_GET["name"];
		$student = new Student("10.70.0.55","employeepayroll","boot","boot",$search);
		$student->LoadStudent();
?>