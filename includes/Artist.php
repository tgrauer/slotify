<?php 
	
	class Artist{

		private $db;
		private $id;

		public function __construct($id){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname='slotify';
			
			try {
			    $this->db = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
			    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			    $this->id = $id;
			}catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			}
		}

		public function get_artistname(){
			$sql = "SELECT name FROM artists WHERE id=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$this->id]);
			return $stmt->fetchColumn();
		}

		public function get_songs(){
			$sql = "SELECT id FROM songs WHERE artist =? ORDER by plays ASC";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$this->id]);
			return $stmt->fetchAll();
		}

	}
?>