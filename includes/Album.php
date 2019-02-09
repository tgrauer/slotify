<?php 
	
	class Album{

		private $db;
		private $id;
		private $title;
		private $artist_id;
		private $genre;
		private $album_cover_path;

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

			    $sql = "SELECT * FROM albums WHERE id=?";
			    $stmt = $this->db->prepare($sql);
			    $stmt->execute([$this->id]);
			    $album = $stmt->fetchAll();

			    $this->title = $album[0]['title'];
			    $this->artist_id = $album[0]['artist'];
			    $this->genre = $album[0]['genre'];
			    $this->album_cover_path = $album[0]['artwork_path'];

			}catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			}
		}

		public function get_title(){
			return $this->title;
		}

		public function get_artist(){
			return new Artist($this->artist_id);
		}

		public function get_album_cover(){
			return $this->album_cover_path;
		}

		public function get_genre(){
			return $this->genre;
		}

		public function song_count(){
			$sql = "SELECT COUNT(*) FROM songs WHERE album=?";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$this->id]);
			return $stmt->fetchColumn();
		}

		public function get_songs(){
			$sql = "SELECT id FROM songs WHERE album =? ORDER by album_order ASC";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([$this->id]);
			return $stmt->fetchAll();
		}

	}
?>