<?php
$host = "10.70.0.55";
$dbname = "employeepayroll";
$user = "boot";
$password = "boot";

try {
	$name = $_GET["name"];
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT `emp_id` AS `Id`,
		`emp_lname` AS `Lastname`,
		`emp_fname` AS `Firstname`,
		`emp_mname` AS `Middlename`
	 FROM `employee`
	WHERE CONCAT(`emp_lname`,`emp_fname`,`emp_mname`)
	LIKE  CONCAT('%',?,'%');";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$name]);
	$student = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($student);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>