<?php 
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		include 'includes/db.php';
		include 'includes/Artist.php';
		include 'includes/Album.php';
		include 'includes/Song.php';
	}else{
		include 'includes/pg_top.php';
		include 'includes/pg_bottom.php';

		$url = $_SERVER['REQUEST_URI'];
		echo "<script>open_page('$url')</script>";
		exit();
	}

?>