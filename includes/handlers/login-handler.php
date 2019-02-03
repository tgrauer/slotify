<?php 
    
    $login_errors = [];

    if(!empty($_POST['username'])){
        $username = clean_string($_POST['username']);
        $username = str_replace(" ", "", $username);
    }else{
        $e = 'Username Required';
        array_push($login_errors, $e);
    }

    if(!empty($_POST['password'])){
        $password = clean_string($_POST['password']);
    }else{
        $e = 'Password Required';
        array_push($login_errors, $e);
    }
    
?>