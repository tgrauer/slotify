<?php 
	
	session_start();
	unset($_SESSION['username']);
	header('Location: ../register.php');

?>