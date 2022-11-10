<?php
$fullname = $username = $email = $password = $phone = '';
if (!empty($_POST)) {
    if (isset($_POST['fullname'])) {
        $fullname  = $_POST['fullname'];
    }
    if (isset($_POST['username'])) {
        $username  = $_POST['username'];
    }
    if (isset($_POST['email'])) {
        $email  = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password  = $_POST['password'];
    }
    if (isset($_POST['phone'])) {
        $phone  = $_POST['phone'];
    }
    $_SESSION['fullname'] = $fullname;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['phone'] = $phone;

    header("Location: login.php");
}
