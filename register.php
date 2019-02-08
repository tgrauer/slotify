<?php 
    session_start();
    require_once 'includes/Account.php';
    $Account = new ACCOUNT();

    require_once 'includes/db.php';
    require_once 'includes/handlers/register-handler.php';
    require_once 'includes/handlers/login-handler.php';


?>

<!doctype html>
<html lang=en-us>
<!--[if IE 7]>         <html class="ie7"> <![endif]-->
<!--[if IE 8]>         <html class="ie8"> <![endif]--> 
<!--[if IE]>           <html class="ie"> <![endif]--> 

<head>
    <meta charset=utf-8>
    <title>Slotify</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
</head>

<body class="bg">

    <?php 
        if(isset($_POST['register'])){
            echo "<script>$(document).ready(function(){
                $('#loginForm').hide();
                $('#registerForm').show();
            });</script>";
        }else{
            echo "<script>$(document).ready(function(){
                $('#loginForm').show();
                $('#registerForm').hide();
            });</script>";
        }
    ?>

    <div>

        <div class="layer">
            </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="loginCnt">
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form" id="loginForm">
                            <h2>Login to your account</h2>
                            <div class="form-group">
                                <label for="loginUsername">Username</label>
                                <input type="text" class="form-control" name="loginUsername" id="loginUsername" required value="<?php if(isset($loginUsername)){echo $loginUsername;}?>" placeholder="Jsmith">
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" class="form-control" name="loginPassword" id="loginPassword" required placeholder="**********">
                            </div>

                            <input type="submit" value="Login" name="login" class="btn btn-md btn-primary bdr_btn">

                            <div class="hasAccount">
                                <span class="hideForms hideLogin">Dont have an account yet? Sign up here</span>
                            </div>

                            <?php 

                                if(!empty($login_errors)){
                                    echo '<div class="alert alert-danger">';
                                    foreach ($login_errors as $e) {
                                        echo '<p>'.$e.'</p>';
                                    }
                                    echo '</div>';
                                }
                            ?>
                        </form>

                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form" id="registerForm">
                            <h2>Create your Free account</h2>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required value="<?php if(isset($username)){echo $username;}?>" placeholder="Jsmith">
                            </div>

                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" required value="<?php if(isset($fname)){echo $fname;}?>" placeholder="John">
                            </div>

                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" required value="<?php if(isset($lname)){echo $lname;}?>" placeholder="Smith">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required value="<?php if(isset($email)){echo $email;}?>" placeholder="jsmith@gmail.com">
                            </div>

                            <div class="form-group">
                                <label for="conf_email">Confirm Email</label>
                                <input type="email" class="form-control" name="conf_email" id="conf_email" required value="<?php if(isset($conf_email)){echo $conf_email;}?>" placeholder="jsmith@gmail.com">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required placeholder="**********">
                            </div>

                            <div class="form-group">
                                <label for="conf_password">Confirm Password</label>
                                <input type="password" class="form-control" name="conf_password" id="conf_password" required placeholder="**********">
                            </div>

                            <input type="submit" value="Register" name="register" class="btn btn-md btn-primary  bdr_btn">

                            <div class="hasAccount">
                                <span class="hideForms hideReg">Already have an account yet? Login in here</span>
                            </div>

                            <?php 
                                if(!empty($errors)){
                                    echo '<div class="alert alert-danger">';
                                    foreach ($errors as $e) {
                                        echo '<p>'.$e.'</p>';
                                    }
                                    echo '</div>';
                                }

                                if(isset($reg_error)){
                                    if($reg_error){
                                        echo '<div class="alert alert-danger">Username or email already in use</div>';
                                    }
                                }
                            ?>
                        </form>
                    </div>
                </div>

                <div class="col-sm-7 col-sm-offset-1 home_rightcol">
                    <h1>Get Great Music, right now</h1>
                    <h2>Listen to loads of songs for free</h2>
                    <ul>
                        <li>Discover music you'll fall in love with</li>
                        <li>Create your own playlists</li>
                        <li>Follow artists to keep up to date</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/site.js"></script>

</body>
</html>
