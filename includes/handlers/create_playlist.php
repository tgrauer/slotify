<?php 
	include '../db.php';

	if(isset($_POST['name']) && isset($_POST['username'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO playlists VALUES(?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['',$name, $username, $date]);

	}else{
		echo 'Name or username not passed into file';
	}
?>