<?php 
	class Playlist{

		private $db;
		private $id;
		private $name;
		private $owner;

		public function __construct($data){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname='slotify';
			
			try {
			    $this->db = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
			    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			    $this->id = $data['id'];
			    $this->name = $data['name'];
			    $this->owner = $data['owner'];

			}catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			}
		}

		public function get_id(){
			return $this->id;
		}

		public function get_owner(){
			return $this->owner;
		}

		public function get_name(){
			return $this->name;
		}
	}
?>