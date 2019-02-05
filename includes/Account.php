<?php 

	class ACCOUNT{

		private $db;

		public function __construct(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname='slotify';
			
			try {
			    $this->db = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
			    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			}catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			}
		}

		public function register($un, $fn, $ln, $em, $pw){
			
			$sql = "SELECT COUNT(*) FROM users WHERE username = ? OR email = ?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$un, $em]);
			$cnt = $stmt->fetchColumn();

			if(empty($cnt)){
				$encrypted_pw = md5($pw);
				$date = new DateTime();
				$reg_date = $date->format('Y-m-d H:i:s');
				$profile_pic = 'img/profile_pics/default.png';

				$sql = "INSERT INTO users(username, fname, lname, email, password, reg_date, profile_pic) VALUES(?,?,?,?,?,?,?)";
				$stmt = $this->db->prepare($sql);
				$stmt->execute([$un, $fn, $ln, $em, $encrypted_pw, $reg_date, $profile_pic]);
				return $un;
			}
			else{
				return 0;
			}
		}

		public function login($loginUsername, $loginPassword){
			$encrypted_pw = md5($loginPassword);
			$sql ="SELECT * FROM users WHERE username = ? AND password = ?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$loginUsername,  $encrypted_pw]);
			$login = $stmt->fetchAll();
			return $login;

		}

	}
?>