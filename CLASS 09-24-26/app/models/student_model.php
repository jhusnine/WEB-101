<?php
	class Student
	{
		private string $host;
		private string $dbname;
		private string $user;
		private string $password;
		private string $username;
		private string $userpassword;

		public function __construct(string $host, string $dbname, string $user, string $password, string $username, string $userpassword)
		{
			$this->host = $host;
			$this->dbname = $dbname;
			$this->user = $user;
			$this->password = $password;
			$this->username = $username;
			$this->userpassword = $userpassword;
		}
		public function Login():void
		{
			try {
				$pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "SELECT `cre_password` AS `password`
						FROM `credential`
						WHERE `cre_username` = ?";

				$stmt = $pdo->prepare($sql);
				$stmt->execute([$this->username]);
				$credential = $stmt->fetch(PDO::FETCH_ASSOC);

				if ($credential && password_verify($this->userpassword, $credential['password'])) {
					echo '1';
				} else {
					echo '2';
				}
			} catch(PDOException $e) {
				die("Connection failed: " . $e->getMessage());
			}
		}
	}
?>