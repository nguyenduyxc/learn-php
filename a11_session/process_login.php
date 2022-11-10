<?php
$email = $password = $cookieEmail= $cookiePassword ='';
if (!empty($_POST)) {

    if (isset($_POST['email'])) {
        $email  = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password  = $_POST['password'];
    }
    if (isset($_SESSION['email'])) {
        $cookieEmail  = $_SESSION['email'];
    }
    if (isset($_SESSION['password'])) {
        $cookiePassword  = $_SESSION['password'];
    }

    if(($cookieEmail == $email) && ($cookiePassword == $password)){
        header("Location: welcome.php");
    }
}