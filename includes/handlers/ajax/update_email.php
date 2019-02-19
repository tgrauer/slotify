<?php 
	
	include '../../db.php';

	if(!isset($_POST['username'])){
		echo 'ERROR: Could not update email';
	}

	if(isset($_POST['email']) && $_POST['email'] !=''){
		$username = $_POST['username'];
		$email = $_POST['email'];

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo 'Email is invalid';
			exit();
		}

		$sql = 'SELECT COUNT(*) FROM users WHERE email = ? AND username != ?';
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$email, $username]);
		$email_check = $stmt->fetchColumn();

		if($email_check){
			echo 'Email is already in use';
			exit();
		}

		$sql = "UPDATE users SET email = ? WHERE username = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$email, $username]);
		echo 'Email Successfully Updated';

	}else{
		echo 'You must provide an email';
	}
?>