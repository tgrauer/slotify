<?php 
	include '../db.php';

	if(isset($_POST['playlist_id'])){
		$playlist_id = $_POST['playlist_id'];

		$sql = "DELETE from playlists WHERE id =?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$playlist_id]);

		$sql = "DELETE from playlists_songs WHERE playlist_id =?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$playlist_id]);
	}
?>