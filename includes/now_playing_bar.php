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
        update_time_progressbar(audio_element.audio);

        $('#nowPlayingBar').on('mousedown touchstart mousemove touchmove', function(e){
            e.preventDefault();
        });

        $('.playback_bar .progressbar').mousedown(function() {
            mouseDown = true;
        });

        $('.playback_bar .progressbar').mousemove(function(e) {
            if(mouseDown){
                time_from_offset(e, this);
            }
        });

        $('.playback_bar .progressbar').mouseup(function(e) {
            time_from_offset(e, this);
        });

        $('.volume_bar .progressbar').mousedown(function() {
            mouseDown = true;
        });

        $('.volume_bar .progressbar').mousemove(function(e) {
            if(mouseDown){
                var percentage = e.offsetX / $(this).width();
                audio_element.audio.volume = percentage;
            }
        });

        $('.volume_bar .progressbar').mouseup(function(e) {
            var percentage = e.offsetX / $(this).width();
            if(percentage >= 0 && percentage <= 1){
                audio_element.audio.volume = percentage;
            }
        });

        $(document).mouseup(function() {
            mouseDown = false;
        });

    }); 

    function time_from_offset(mouse, progressbar){
        var percentage = mouse.offsetX / $(progressbar).width() * 100;
        var seconds = audio_element.audio.duration * (percentage / 100);
        audio_element.set_time(seconds);
    }

    function prev_song(){
        if(audio_element.audio.currentTime >= 3 || currentTime == 0){
            audio_element.set_time(0);
        }else{
            current_index = current_index - 1;
            set_track(current_playlist[current_index], current_playlist, true);
        }
    }

    function next_song(){

        if(repeat){
            audio_element.set_time(0);
            play_song();
            return;
        }

        if(current_index == current_playlist.length - 1){
            current_index=0;
        }else{
            current_index ++;
        }

        var trackto_play = current_playlist[current_index];
        set_track(trackto_play, current_playlist, true);
    }

    function set_repeat(){
        repeat = !repeat;
        $('.controlBtn.repeat').toggleClass('active_btn');
    }

    function mute(){
        audio_element.audio.muted = !audio_element.audio.muted;
        $('button.mute').toggle();
        $('button.volume').toggle();
    }

    function set_track(track_id, new_playlist, play){
        
        current_index = current_playlist.indexOf(track_id);
        pause_song();

        $.post('includes/handlers/ajax/get_song_json.php', {song_id: track_id}, function(data) {

            var track = JSON.parse(data);
            track = track[0];
            audio_element.set_track(track);
            play_song();

            $('#nowPlayingBar .track_info .track_name').html(track.title);
            $('#nowPlayingBar .track_info .artist_name').html(track.name);
            $('#nowPlayingBar .album_link img').attr('src', track.artwork_path);
        });

        if(play){audio_element.play();}
    }

    function play_song(){
        
        if(audio_element.audio.currentTime == 0){
            $.post('includes/handlers/ajax/update_plays.php', {song_id: audio_element.currently_playing.id}, function(data) {
            });
        }

        $('button.play').hide();
        $('button.pause').show();
        console.log(audio_element);
        audio_element.play();
    }

    function pause_song(){
        $('button.play').show();
        $('button.pause').hide();
        audio_element.pause();
    }

</script>

<div id="nowPlayingBar">
    <div class="col-sm-4" id="nowPlayingLeft">
        <div class="content">
            <span class="album_link">
                <img src="" alt="" class="img-responsive album_artwork">
            </span>

            <div class="track_info">
                <span class="track_name">
                    <span></span>
                </span>

                <span class="artist_name">
                    <span></span>
                </span>
            </div>
        </div>    
    </div>

    <div class="col-sm-4" id="nowPlayingCenter">

        <div class="content playerControls">
            <div class="buttons">
                <button class="btn controlBtn shuffle" title="Shuffle"><i class="fas fa-random"></i></button>
                <button class="btn controlBtn previous" title="Previous" onclick="prev_song()"><i class="fas fa-step-backward"></i></button>
                <button class="btn controlBtn play" title="Play" onclick="play_song()"><i class="fas fa-play-circle"></i></button>
                <button class="btn controlBtn pause" title="Pause" style="display: none;" onclick="pause_song()"><i class="fas fa-pause-circle"></i></button>
                <button class="btn controlBtn next" title="Next" onclick="next_song()"><i class="fas fa-step-forward"></i></button>
                <button class="btn controlBtn repeat" title="Repeat" onclick="set_repeat()"><i class="fas fa-redo-alt"></i></button>
            </div>
        </div>

        <div class="playback_bar">
            <span class="progress_time current">0:00</span>
            <div class="progressbar">
                <div class="progressbar_bg">
                    <div class="progress_cur"></div>
                </div>
            </div>
            <span class="progress_time remaining"></span>
        </div>

    </div>

    <div class="col-sm-4" id="nowPlayingRight">
        <div class="volume_bar">
            
            <button class="btn controlBtn mute" title="Volume" onclick="mute()" style="display:none;" ><i class="fas fa-volume-mute"></i></button>
            <button class="btn controlBtn volume" title="Volume" onclick="mute()"><i class="fas fa-volume-up" ></i></button>

            <div class="progressbar">
                <div class="progressbar_bg">
                    <div class="progress_cur"></div>
                </div>
            </div>
        </div>    
    </div>

</div>