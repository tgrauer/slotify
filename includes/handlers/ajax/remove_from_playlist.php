<?php 
	include '../../db.php';

	if(isset($_POST['playlist_id']) && isset($_POST['song_id'])){
		$playlist_id = $_POST['playlist_id'];
		$song_id = $_POST['song_id'];

		$sql ="DELETE FROM playlists_songs WHERE playlist_id =? AND song_id =?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$playlist_id, $song_id]);

	}else{
		echo 'Name or username not passed into file';
	}
?>