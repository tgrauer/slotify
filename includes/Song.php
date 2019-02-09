<?php 
	
	class Song{

		private $db;
		private $id;
		private $song_data;
		private $title;
		private $artist_id;
		private $album_id;
		private $genre;
		private $duration;
		private $path;

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

			    $sql = "SELECT * FROM songs WHERE id=?";
			    $stmt = $this->db->prepare($sql);
			    $stmt->execute([$this->id]);
			    $this->song_data = $stmt->fetchAll();

			    $this->title = $this->song_data[0]['title'];
			    $this->artist_id = $this->song_data[0]['artist'];
			    $this->album_id = $this->song_data[0]['album'];
			    $this->genre = $this->song_data[0]['genre'];
			    $this->duration = $this->song_data[0]['duration'];
			    $this->path = $this->song_data[0]['path'];

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

		public function get_album(){
			return new Album($this->album_id);
		}

		public function get_genre(){
			return $this->genre;
		}

		public function get_duration(){
			return $this->duration;
		}

		public function get_path(){
			return $this->path;
		}

		public function get_song_data(){
			return $this->song_data;
		}


	}
?>