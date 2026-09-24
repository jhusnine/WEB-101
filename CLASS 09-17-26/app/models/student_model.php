<?php
    class Student
    {
        private string $host;
        private string $dbname;
        private string $user;
        private string $password;
        private string $search;
        public string $list;

        public function __construct(string $host, string $dbname,string $user, string $password, string $search)
        {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->user = $user;
            $this->password = $password;
            $this->search = $search;
        }
        public function LoadStudent():void
        {
            try {

                $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT `emp_id` AS `Id`,
                    `emp_lname` AS `Lastname`,
                    `emp_fname` AS `Firstname`,
                    `emp_mname` AS `Middlename`
                FROM `employee`
                WHERE CONCAT_WS(`emp_lname`,`emp_fname`,`emp_mname`)
                LIKE  CONCAT('%',?,'%');";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$this->search]);
                $student = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($student);
            } catch(PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }
?>