<?php 
	include '../../db.php';

	if(isset($_POST['playlist_id']) && isset($_POST['song_id'])){
		$playlist_id = $_POST['playlist_id'];
		$song_id = $_POST['song_id'];
		
		$sql = "SELECT MAX(playlist_order) + 1 AS playlist_order FROM playlists_songs WHERE playlist_id = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$playlist_id]);
		$orderid = $stmt->fetchAll();

		$sql ="INSERT INTO playlists_songs VALUES(?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['', $song_id, $playlist_id, $orderid[0]]);

	}else{
		echo 'Name or username not passed into file';
	}
?>