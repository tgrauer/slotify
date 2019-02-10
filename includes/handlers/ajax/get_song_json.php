<?php 
	
	include '../../db.php';

	if(isset($_POST['song_id'])){
		$song_id = $_POST['song_id'];

		$sql = "SELECT sng.*, art.name, al.artwork_path FROM songs sng, artists art, albums al WHERE sng.id = ? AND sng.artist = art.id AND sng.album = al.id";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$song_id]);
		$result = $stmt->fetchAll();

		echo json_encode($result);
	}
?>