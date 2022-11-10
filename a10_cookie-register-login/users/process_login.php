<?php
// check token 
$user = validateToken();
if ($user != null) {
    header("Location: user.php");
    die();
}
$email=$password="";
if (!empty($_POST)) {

    $email = getPost('email');
    $password = getPost('password');
    $password = getPwdSecurity($password);
    if ($email != "" && $password != "") {
        $sql = "SELECT * FROM  users  WHERE email = '$email' AND password = '$password'";
        $data = executeResult($sql);
        // check co ban ghi nao ko  
        if (($data != null) && (count($data) > 0)) {

            // tao token cho ng dung vs luu vao db  
            $token = getPwdSecurity($email.time()) ;
            setcookie('token', $token,  time() + 7 * 24 * 60 * 60, '/');
            $sql = "UPDATE users SET token = '$token' WHERE email = '$email'";
            execute($sql);
            // chuyen huong sang user.php
            header("Location: user.php");
            die();
        }
    }
}



