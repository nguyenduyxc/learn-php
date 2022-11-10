<?php

function fixSqlInjection($str){
    $str = str_replace("\\", "\\\\", $str);
	$str = str_replace("'", "\'", $str);
	return $str;
}

function getPwdSecurity($pwd){
    return md5($pwd).MD5_PRIVATE_KEY;
}

function getGet($key){
    $value = "";
    if (isset($_GET[$key])){
        $value = $_GET[$key];
    }
    $value = fixSqlInjection($value);
    return $value;
}

function getPost($key){
    $value = "";
    if (isset($_POST[$key])){
        $value = $_POST[$key];
    }
    $value = fixSqlInjection($value);
    return $value;
}

function validateToken(){
    if(isset($_SESSION['user'])){
        return $_SESSION['user'];
    }
    $token = "";
    if(isset($_COOKIE['token'])){
        $token = $_COOKIE['token'];
        $sql = "SELECT * FROM users WHERE token = '$token'";
        $data = executeResult($sql);
        if(($data != null) && count($data) >0){
            $_SESSION['user'] = $data[0];
            return $data[0];
        }
    }

    return null;
}