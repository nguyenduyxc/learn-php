<?php

$token = "";
if (isset($_COOKIE['token'])) {
    require_once("../db/config.php");
    require_once("../db/dbhelper.php");
    $token = $_COOKIE['token'];
    $sql = "UPDATE users SET token = '' WHERE token = '$token'";
    execute($sql);
}
setcookie('token', '',  time() - 60, '/');
header("Location: login.php");
