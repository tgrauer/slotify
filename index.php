<?php 
    
    session_start();
    if(isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
    }else{
        header('Location: register.php');
    }


?>

<!doctype html>
<html lang=en-us>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]--> 
<!--[if IE]>           <html class="ie"> <![endif]--> 

<head>
    <meta charset=utf-8>
    <title>Slotify</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <link href="css/bootstrap-ie7.css" rel="stylesheet">
    <![endif]-->
    <!--[if IE]>
    <script type="text/javascript" src="js/css3-mediaqueries.js"></script>    
    <![endif]-->
    
</head>

<body>

    <div class="container-fluid" id="main_cnt">
        <div class="row top_cnt">
            <div class="col-sm-3 nav_sidebar">
                <nav class="nav_bar">
                    <a href="#" class="logo"><img src="img/logo.png" alt=""></a>
                </nav>

                <div class="group">
                    <div class="nav_item">
                        <a href="search.php" class="nav_link">Search <span><i class="fas fa-search"></i></span></a>
                    </div>    
                </div>

                <div class="group">
                    <div class="nav_item">
                        <a href="browse.php" class="nav_link">Browse</a>
                    </div>

                    <div class="nav_item">
                        <a href="yourmusic.php" class="nav_link">Your Music</a>
                    </div>

                    <div class="nav_item">
                        <a href="profile.php" class="nav_link">Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                
            </div>
        </div>
    </div>

    <div class="container-fluid" id="nowPlayingBarCnt">
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
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/site.js"></script>

</body>
</html>
