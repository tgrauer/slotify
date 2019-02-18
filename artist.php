<?php 
	include 'includes/includes.php';

	if(isset($_GET['artist_id'])){
        $artist_id = $_GET['artist_id'];
    }else{
        header('Location: index.php');
        die();
    }

    $Artist = new Artist($artist_id);
    session_start();
?>

<div class="entity_info artist_info bdrbtm">
	<div class="col-sm-4 col-sm-offset-4">
		<h1><?php echo $Artist->get_artistname(); ?></h1>
		<button onclick="play_first_song()" class="btn artist_btn bdr_btn">PLAY</button>
	</div>
</div>

<div class="tracklist col-sm-12 bdrbtm">

	<h2>Most Popular</h2>
    <ul class="track_list">
        <?php 

            $songs = $Artist->get_songs();
            $i=1;
            $newsong_array=[];

            foreach ($songs as $song_id) {

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
                        </div>';

                    echo "<div class='track_options' onclick='show_optionsmenu(this)'>
                        <input type='hidden' class='song_id' value='" .$song_id['id'] ."' />
                        <i class='fas fa-ellipsis-h'></i>
                    </div>";

                    echo '<div class="track_duration">
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

<div class="grid_view">

	<h2>Albums</h2>
    <?php 

        $sql = "SELECT * FROM albums WHERE artist = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$artist_id]);
        $albums = $stmt->fetchAll();

        $i=0; $j=4;
        foreach ($albums as $album) {
            if($i % 4 == 0 || $i == 0){echo '<div class="row">';}
            echo '<div class="col-sm-3 col-xs-6">';
            echo "<span onclick='open_page(\"album.php?album_id=".$album['id']."\")'>
                <img class='img-responsive album_cover' src='".$album['artwork_path']."' alt='".$album['title']."' />
                </span>";
            echo "<p class='album_title'><span onclick='open_page(\"album.php?album_id=".$album['id']."\")'>".$album['title']."</span></p>";
            echo '</div>';

            if($j - 1 == $i && $i !=0){echo '</div>'; $j+=4;}
            $i++;
        }
    ?>
</div>

<nav class="options_menu">

    <input type="hidden" class="song_id">
    <div class="item addtopl" onclick="open_pl_options()">Add to Playlist</div>
    <?php 

        $dropdown ='<div class="addtopl_options">';

            $sql = "SELECT id, name FROM playlists WHERE owner = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_SESSION['username']]);
            $playlists = $stmt->fetchAll();

            foreach ($playlists as $pl) {
                $dropdown .= '<p onclick="addto_playlist('.$pl['id'].')" data-pl="'.$pl['id'].'">'.$pl['name'].'</p>';
            }

        $dropdown .='</div>';
        echo $dropdown;
    ?>
</nav>