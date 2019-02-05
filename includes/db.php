<?php 

	$timezone = date_default_timezone_set('America/New_York');
	$host = 'localhost';
	$db   = 'slotify';
	$user = 'root';
	$pass = '';
	$charset = 'utf8mb4';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => false,
	];
	global $pdo;
	$pdo = new PDO($dsn, $user, $pass, $opt);
?>