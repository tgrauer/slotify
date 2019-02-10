<?php 
	
	include '../../db.php';

	if(isset($_POST['song_id'])){
		$song_id = $_POST['song_id'];

		$sql = "UPDATE songs SET plays = plays + 1 WHERE id = ?";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$song_id]);
		$result = $stmt->fetchAll();

		echo json_encode($result);
	}
?>