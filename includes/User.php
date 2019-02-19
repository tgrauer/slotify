<?php 
	class User{

		private $db;
		private $user;

		public function __construct($user){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname='slotify';
			
			try {
			    $this->db = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
			    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			    $this->user = $user;

			}catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			}
		}

		public function get_username(){
			return $this->user;
		}

		public function get_users_name(){
			$sql = "SELECT CONCAT(fname, ' ', lname) AS name FROM users WHERE username = ?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$this->user]);
			$name=$stmt->fetchAll();
			return $name[0]['name'];
		}

		public function get_email(){
			$sql = "SELECT email FROM users WHERE username = ?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$this->user]);
			$email=$stmt->fetchAll();
			return $email[0]['email'];
		}
	}
?>