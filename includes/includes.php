<?php 
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		include 'includes/db.php';
		include 'includes/User.php';
		include 'includes/Artist.php';
		include 'includes/Album.php';
		include 'includes/Song.php';
		include 'includes/Playlist.php';

		if(isset($_GET['userLoggedIn'])){
			$userLoggedIn = new User($_GET['userLoggedIn']);
		}else{
			echo 'Username variable was not passed. Check open page() js.';
			exit();
		}
	}else{
		include 'includes/pg_top.php';
		include 'includes/pg_bottom.php';

		$url = $_SERVER['REQUEST_URI'];
		echo "<script>open_page('$url')</script>";
		exit();
	}

?>