<?php 
	
	include 'includes/includes.php';

	if(isset($_GET['search'])){
		$search = urldecode($_GET['search']);
	}else{
		$search='';
	}
?>

<div class="search_cnt col-sm-12">
	<h3>Search for an album, artist or song</h3>
	<input type="text" name="search" value="<?php echo $search;?>" class="search_input" placeholder="Search..." autocomplete="off">
</div>

<script>
	
	$('.search_input').focus();

	$(function(){
		
		var tmpStr = $('.search_input').val();
		$('.search_input').val('');
		$('.search_input').val(tmpStr);

		$('.search_input').on('keyup', function(){
			console.log('sadfasd');
			clearTimeout(timer);
			timer = setTimeout(function(){
				var val = $('.search_input').val();

				open_page('search.php?search='+val);
			}, 1500);
		});
	});

</script>

<?php 
	if($search ==''){
		exit();
	}
?>

<div class="tracklist col-sm-12 bdrbtm search_result_row">

	<h3>Songs</h3>
    <ul class="track_list">
        <?php 

        	$sql = "SELECT id FROM songs WHERE title LIKE '%$search%'";
        	$stmt = $pdo->prepare($sql);
        	$stmt->execute();
        	$song_query = $stmt->fetchAll();

        	if(empty($song_query)){
        		echo '<span class="no_results">No songs found matching '. $search.'</span>';
        	}

            $songs = [];
            $i=1;
            $newsong_array=[];

            foreach ($song_query as $song_id) {

            	if($i > 5){
            		break;
            	}
                $Song = new Song($song_id['id']);
                array_push($newsong_array, $song_id['id']);                    
                $song_title = $Song->get_title();
                $album_artist = $Song->get_artist();

                echo '<li class="tracklist_row">
                        <div class="track_count">';
                echo "<button class='btn controlBtn play' title='Play' onclick='set_track(\"".$Song->get_id()."\", temp_playlist, true)'><i class='fas fa-play'></i></button>
                            <span class='track_number'>".$i."</span>";
                    echo '</div>

                        <div class="track_info">
                            <span class="track_name">'.$song_title.'</span>
                            <span class="track_artist">'.$album_artist->get_artistname().'</span>
                        </div>

                        <div class="track_options">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>

                        <div class="track_duration">
                            <span class="duration">'.$Song->get_duration().'</span>
                        </div>
                </li>';

                $i++;

            }

            $newsong_array = json_encode($newsong_array);
        ?>

        <script>
            var temp_song_ids = '<?php echo $newsong_array?>'; 
            temp_playlist = JSON.parse(temp_song_ids); 
        </script>
    </ul>
</div>

<div class="col-sm-12 artist_results bdrbtm">
	
	<h3>Artists</h3>

	<?php 

		$sql = "SELECT id FROM artists WHERE name LIKE '%$search%'";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$artist_query = $stmt->fetchAll();

		if(empty($artist_query)){
			echo '<span class="no_results">No artists found matching '. $search.'</span>';
		}

		foreach ($artist_query as $artist) {
			$artist_found = new Artist($artist['id']);

			echo "<div class='search_result_row'>
				<div class='artist_name'>
					<span onclick='open_page(\"artist.php?artist_id=".$artist_found->get_artist_id()."\")'>
						". $artist_found->get_artistname()."
					</span>
				</div>
			</div>";
		}
	?>
</div>

<div class="col-sm-12 grid_view search_result_row bdrbtm">

	<h3>Albums</h3>
    <?php 

        $sql = "SELECT * FROM albums WHERE title LIKE '%$search%'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $album_query = $stmt->fetchAll();

        if(empty($album_query)){
        	echo '<span class="no_results">No albums found matching '. $search.'</span>';
        }

        $i=0; $j=4;
        foreach ($album_query as $album) {
            if($i % 4 == 0 || $i == 0){echo '<div class="row">';}
            echo '<div class="col-sm-3 col-xs-6">';
            echo "<span onclick='open_page(\"album.php?album_id=".$album['id']."\")'>
                <img class='img-responsive album_cover' src='".$album['artwork_path']."' alt='".$album['title']."' />
                </span>";
            echo '</div>';

            if($j - 1 == $i && $i !=0){echo '</div>'; $j+=4;}
            $i++;
        }
    ?>
</div>