<?php
function register(){
    if (!empty($_POST)) {
        if (isset($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
        }
        setcookie('fullname', $fullname, time()+24*60*60, "/");
        setcookie('username', $username, time()+24*60*60, "/");
        setcookie('email', $email, time()+24*60*60, "/");
        setcookie('password', $password, time()+24*60*60, "/");
        setcookie('phone', $phone, time()+24*60*60, "/");
        header("Location: login.php");
    }
}