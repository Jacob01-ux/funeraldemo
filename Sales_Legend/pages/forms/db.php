<?php 
	class DbConnect {
		private $host = 'localhost';
		private $dbName = 'ekhonnec_JeudfraBS';
		private $user = 'ekhonnec_JeudfraBS';
		private $pass = 'JeudfraBS33@';

		public function connect() {
			try {
				$conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch( PDOException $e) {
				echo 'Database Error: ' . $e->getMessage();
			}
		}
	}
 ?>