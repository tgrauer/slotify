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

			    if(!is_array($data)){
			    	$sql = "SELECT * FROM playlists WHERE id = ?";
			    	$stmt = $this->db->prepare($sql);
			    	$stmt->execute([$data]);
			    	$data = $stmt->fetchAll();
			    	$data = $data[0];
			    }

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

		public function song_count(){
			return $this->db->query("SELECT COUNT(*) FROM playlists_songs WHERE playlist_id=$this->id")->fetchColumn();
		}

		public function get_songs(){
			$sql = "SELECT song_id FROM playlists_songs WHERE playlist_id =? ORDER by playlist_order ASC";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$this->id]);
			return $stmt->fetchAll();
		}

		public static function get_playlist_dropdown($username){
			$dropdown ='<select name="" id="" class="item playlist">
            	<option value="">Add to Playlist</option>';

            	$sql = "SELECT id, name FROM playlists WHERE owner = ?";
            	$stmt = $db->prepare($sql);
            	$stmt->execute([$username]);
            	$playlists = $stmt->fetchAll();

            	foreach ($playlists as $pl) {
            		$dropdown= '<option value="'.$pl['id'].'">'.$pl['name'].'</option>';
            	}

        	$dropdown .='</select>';
        	return $dropdown;
		}
	}
?>