<?php 
    
    if(isset($_POST['login'])){
        $login_errors = [];

        if(!empty($_POST['loginUsername'])){
            $loginUsername = clean_string($_POST['loginUsername']);
            $loginUsername = str_replace(" ", "", $loginUsername);
        }else{
            $e = 'Username Required';
            array_push($login_errors, $e);
        }

        if(!empty($_POST['loginPassword'])){
            $loginPassword = clean_string($_POST['loginPassword']);
        }else{
            $e = 'Password Required';
            array_push($login_errors, $e);
        }

        if(empty($login_errors)){

            $login = $Account->login($loginUsername, $loginPassword);

            if(!empty($login)){
                $_SESSION['username']=$login[0]['username'];
                header("Location: index.php");
            }else{
                array_push($login_errors, 'Invalid username / password');
            }
        }
    }


    
?>