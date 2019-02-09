<?php 
    
    include 'db.php';

    $rand_songs = $pdo->query("SELECT id FROM songs ORDER BY RAND() LIMIT 10")->fetchAll();
    $rand_songs_array =[];
    foreach ($rand_songs as $song_id) {
        array_push($rand_songs_array, $song_id['id']);
    }
    $json_array = json_encode($rand_songs_array);
?>

<script>
    $(document).ready(function(){
        current_playlist = <?php echo $json_array;?>;
        audio_element = new Audio();
        set_track(current_playlist[0], current_playlist, false);
    }); 

    function set_track(track_id, new_playlist, play){

    }

</script>

<div id="nowPlayingBar">
    <div class="col-sm-4" id="nowPlayingLeft">
        <div class="content">
            <span class="album_link">
                <img src="img/album_cover.jpg" alt="" class="img-responsive album_artwork">
            </span>

            <div class="track_info">
                <span class="track_name">
                    <span>Denial</span>
                </span>

                <span class="artist_name">
                    <span>Sevendust</span>
                </span>
            </div>
        </div>    
    </div>

    <div class="col-sm-4" id="nowPlayingCenter">

        <div class="content playerControls">
            <div class="buttons">
                <button class="btn controlBtn shuffle" title="Shuffle"><i class="fas fa-random"></i></button>
                <button class="btn controlBtn previous" title="Previous"><i class="fas fa-step-backward"></i></button>
                <button class="btn controlBtn play" title="Play"><i class="fas fa-play-circle"></i></button>
                <button class="btn controlBtn pause" title="Pause" style="display: none;"><i class="fas fa-pause-circle"></i></button>
                <button class="btn controlBtn next" title="Next"><i class="fas fa-step-forward"></i></button>
                <button class="btn controlBtn repeat" title="Repeat"><i class="fas fa-redo-alt"></i></button>
            </div>
        </div>

        <div class="playback_bar">
            <span class="progress_time current">0.00</span>
            <div class="progressbar">
                <div class="progressbar_bg">
                    <div class="progress_cur"></div>
                </div>
            </div>
            <span class="progress_time remaining">0.00</span>
        </div>

    </div>

    <div class="col-sm-4" id="nowPlayingRight">
        <div class="volume_bar">
            <button class="btn controlBtn volume" title="Volume"><i class="fas fa-volume-up"></i></button>

            <div class="progressbar">
                <div class="progressbar_bg">
                    <div class="progress_cur"></div>
                </div>
            </div>
        </div>    
    </div>

</div>