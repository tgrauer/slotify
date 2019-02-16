
var current_playlist = [];
var shuffle_playlist = [];
var temp_playlist = [];
var audio_element;
var mouseDown;
var current_index=0;
var currentTime;
var repeat = false;
var shuffled = false;
var user_logged_in;
var timer;

function format_time(seconds){
	var time = Math.round(seconds);
	var minutes = Math.floor(time / 60);
	var seconds = time - (minutes * 60);
	var extra_zero = (seconds < 10) ? "0" :"";

	return minutes + ':'+ extra_zero+ seconds;
}

function open_page(url){

	if(timer != null ){
		clearTimeout(timer);
	}
	if(url.indexOf('?')==-1){
		url = url+'?';
	}
	var encoded_url = encodeURI(url + '&userLoggedIn=' +user_logged_in);	
	$('.main_cnt .row').load(encoded_url);
	$('body').scrollTop(0);
	history.pushState(null, null, url);
}

function create_playlist(){
	console.log(user_logged_in);
	var new_playlist = $('input#new_playlist').val();

	if(new_playlist !=''){
		$.post('includes/handlers/create_playlist.php', {name: new_playlist, username: user_logged_in}).done(function(error){
			if(error != ''){
				alert(error);
				return;
			}

			$('#playlist_modal').modal('toggle');
			$('.modal-backdrop').removeClass('in');
			window.location= 'playlists.php';
		});
	}
}

function delete_playlist(playlist_id){
	var r = confirm('Are you sure you want to delete this playlist?');

	if(r){
		$.post('includes/handlers/delete_playlist.php', {playlist_id:playlist_id}).done(function(error){
					if(error != ''){
						alert(error);
						return;
					}

					open_page('playlists.php');
				});
	}
}

function update_time_progressbar(audio){
	$('.progress_time.current').text(format_time(audio.currentTime));
	$('.progress_time.remaining').text(format_time(audio.duration - audio.currentTime));
	var progress = audio.currentTime / audio.duration * 100;
	$('.playback_bar .progress_cur').css({'width': progress +'%'});
}

function update_volumebar(audio){
	var volume =  audio.volume * 100;
	$('.volume_bar .progress_cur').css({'width': volume +'%'});
}

function play_first_song(){
	set_track(temp_playlist[0],temp_playlist,true);
}

function Audio(){
	this.currently_playing;
	this.audio = document.createElement('audio');

	this.audio.addEventListener('ended',function(){
		next_song();
	});

	this.audio.addEventListener('canplay', function(){
		var duration = format_time(this.duration)
		$('.progress_time.remaining').text(duration);
	});

	this.audio.addEventListener('timeupdate', function(){
		if(this.duration){
			update_time_progressbar(this);
		}
	});

	this.audio.addEventListener('volumechange', function(){
		update_volumebar(this);
	});

	this.set_track = function(track){
		this.audio.src=track.path;
		this.currently_playing = track;
	}

	this.play = function(){
		this.audio.play();
	}

	this.pause = function(){
		this.audio.pause();
	}

	this.set_time = function(seconds){
		this.audio.currentTime = seconds;
	}

}

$(document).ready(function(){

	$('.hideLogin').on('click', function(){
		$('#loginForm').hide();
		$('#registerForm').show();
	});

	$('.hideReg').on('click', function(){
		$('#loginForm').show();
		$('#registerForm').hide();
	});

	
});