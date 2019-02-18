<?php 
    include 'includes/includes.php';

    if(isset($_GET['album_id'])){
        $album_id = $_GET['album_id'];
    }else{
        header('Location: index.php');
        die();
    }        

    $Album = new Album($album_id);
    $artist = $Album->get_artist();
    session_start();
?>

    <div class="entity_info">
        <div class="col-sm-3">
            <img src="<?php echo $Album->get_album_cover();?>" alt="" class="img-responsive album_cover">
        </div>

        <div class="col-sm-9">
            <h2 class="album_title"><?php echo $Album->get_title(); ?></h2>
            <p class="artist" onclick="open_page('artist.php?artist_id='+<?php echo $artist->get_artist_id(); ?>)">By <?php echo $artist->get_artistname(); ?></p>
            <p class="numb_songs"><?php echo $Album->song_count(); ?> Songs</p>
        </div>
    </div>

    <div class="tracklist col-sm-12">
        <ul class="track_list">
            <?php 

                $songs = $Album->get_songs();
                $i=1;
                $newsong_array=[];

                foreach ($songs as $song_id) {
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

                    
                
