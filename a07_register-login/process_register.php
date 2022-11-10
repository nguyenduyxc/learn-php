<?php

$fullname = $email = $password = '';
if(!empty($_POST)){
    if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
}
if($fullname != '' && $email != '' && $password){
    header("Location: login.php?email=".$email."&password=".$password);
    die();
}

