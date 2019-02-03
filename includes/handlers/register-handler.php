<?php 
    
    if(isset($_POST['register'])){

        $errors = [];

        if(!empty($_POST['username'])){
            $username = clean_string($_POST['username']);
            if(strlen($username) < 5 || strlen($username) > 25){
                array_push($errors, 'Your username must between 5 and 25 characters');
            }
        }else{
            $e = 'Username Required';
            array_push($errors, $e);
        }

        if(!empty($_POST['fname'])){
            $fname = clean_string($_POST['fname']);
            $fname = ucfirst(strtolower(($fname)));

            if(strlen($fname) > 25 || strlen($fname) < 2){
                array_push($errors, 'Your first name must be between 2 and 25 characters');
            }
        }else{
            $e = 'First Name is Required';
            array_push($errors, $e);
        }

        if(!empty($_POST['lname'])){
            $lname = clean_string($_POST['lname']);
            $lname = ucfirst(strtolower($lname));

            if(strlen($lname) > 25 || strlen($lname) < 2){
                array_push($errors, 'Your last name must be between 2 and 25 characters');
            }
        }else{
            $e = 'Last Name is Required';
            array_push($errors, $e);
        }

        if(!empty($_POST['email'])){
            $email = clean_string($_POST['email']);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors, 'Your email is invalid');
            }
        }else{
            $e = 'Email is Required';
            array_push($errors, $e);
        }

        if(!empty($_POST['conf_email'])){
            $conf_email = clean_string($_POST['conf_email']);
            $conf_email = filter_var($conf_email, FILTER_VALIDATE_EMAIL);
        }else{
            $e = 'Confirm your email address';
            array_push($errors, $e);
        }

        if(!empty($_POST['password'])){
            $password = $_POST['password'];
            if(strlen($password) < 8 || strlen($password > 14)){
                $e = 'Password must be between 8 and 14 characters';
                array_push($errors, $e);
            }
            $password = md5($password);
        }else{
            $e = 'Password is Required';
            array_push($errors, $e);
        }

        if(!empty($_POST['conf_password'])){
            $conf_password = md5($_POST['conf_password']);
        }else{
            $e = 'Confirm your password';
            array_push($errors, $e);
        }

        if($email != $conf_email){
            $e ='Email address do not match';
            array_push($errors, $e); 
        }

        if($password != $conf_password){
            $e ='Passwords do not match';
            array_push($errors, $e); 
        }

        if(empty($errors)){
            $register = $Account->register($username, $fname, $lname, $email, $conf_email, $password, $conf_password);
        }
    }
    
    function clean_string($string){
        $string=strip_tags($string);
        $string=str_replace(" ", "", $string);
        return $string;
    }

?>