<?php
// $email = $password = $cookieEmail= $cookiePassword= '';

function login()
{
    if(!empty($_COOKIE)){
        if (isset($_COOKIE['email'])) {
            $cookieEmail = $_COOKIE['email'];
        }
        if (isset($_COOKIE['password'])) {
            $cookiePassword = $_COOKIE['password'];
        }
    }
    if (!empty($_POST)) {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        
        if ($cookieEmail == $email && $cookiePassword == $password) {
            header("Location: welcome.php");
            die();
        } else {
            echo "<h1>Email/Password ko dung</h1>";
        }
        return $email;
    }
}

