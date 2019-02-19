<?php 
	
	include '../../db.php';

	if(!isset($_POST['username'])){
		echo 'ERROR: Could not update email';
	}

	if(!isset($_POST['cur_pw']) || !isset($_POST['new_pw']) || !isset($_POST['confirm_pw'])){
		echo 'Not all passwords have been set';
		exit();
	}

	if($_POST['cur_pw'] == '' || $_POST['new_pw'] =='' || $_POST['confirm_pw'] ==''){
		echo 'Not all passwords have been set';
		exit();
	}

	$username = $_POST['username'];
	$current_pw = $_POST['cur_pw'];
	$new_pw = $_POST['new_pw'];
	$confirm_pw = $_POST['confirm_pw'];

	$oldmd5 = md5($current_pw);
	$sql = 'SELECT COUNT(*) FROM users WHERE password = ?';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$oldmd5]);
	$conf_old_pw = $stmt->fetchColumn();

	if(!$conf_old_pw){
		echo 'Password is incorrect';
		exit();
	}

	if($new_pw != $confirm_pw){
		echo 'New passwords do not match';
		exit();
	}

	if(strlen($new_pw) > 30 || strlen($new_pw) < 5){
		echo 'Password must be between 5 and 30 characters';
		exit();
	}

	$newMd5 = md5($new_pw);
	$sql = 'UPDATE users SET password =? WHERE username = ?';
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$newMd5, $username]);

	echo 'Password successfully updated';
?>