<?php 
    
    include 'includes/db.php';
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/site.js"></script>

    <script>
        // $('body').on('click', function(){
        //     console.log('test');
        //     var audioElement = new Audio();
        //     audioElement.set_track('music/01-1607583-Kinematic-_Even Then_ The Band Played On.mp3'); 
        //     audioElement.audio.play();

        // });
    </script>
</head>

<body>

    <div class="container-fluid" id="main_cnt">
        <div class="row top_cnt">
            <?php include 'includes/nav_sidebar.php'; ?>

            <div class="col-sm-9" id="main_view_cnt">
                <div class="main_cnt">
                    <div class="row">
                        
