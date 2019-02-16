<?php 
    include 'includes/includes.php';

    if(isset($_GET['id'])){
        $playlist_id = $_GET['id'];
    }else{
        header('Location: index.php');
        die();
    }        

    $Playlist = new Playlist($playlist_id);
    $owner = new User($Playlist->get_owner());
?>

    <div class="entity_info">
        <div class="col-sm-3">
            <div class='playlist mt20'><i class='fas fa-3x fa-music'></i></div>
        </div>

        <div class="col-sm-9">
            <h2 class="album_title"><?php echo $Playlist->get_name(); ?></h2>
            <p class="artist">By <?php echo $Playlist->get_owner(); ?></p>
            <p class="numb_songs"><?php echo $Playlist->song_count(); ?> Songs</p>
            <button class="btn btn-danger delete_btn" onclick="delete_playlist('<?php echo $playlist_id;?>')">Delete Playlist</button>
        </div>
    </div>

    <div class="tracklist col-sm-12">
        <ul class="track_list">
            <?php 

                $songs = $Playlist->get_songs();
                $i=1;
                $newsong_array=[];

                foreach ($songs as $song_id) {
                    $Song = new Song($song_id['song_id']);
                    array_push($newsong_array, $song_id['song_id']);                    
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

                    
                
