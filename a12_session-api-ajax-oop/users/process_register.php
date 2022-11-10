<?php
// check token 
$user = validateToken();
if ($user != null) {
    header("Location: user.php");
    die();
}

$fullname = $email = $password = $birthday = $address = "";
if (!empty($_POST)) {
    $fullname = getPost("fullname");
    $email = getPost("email");
    $password = getPwdSecurity(getPost("password"));
    $birthday = getPost("birthday");
    $address = getPost("address");
    if ($email != "" && $password != "") {
        $sql = "INSERT INTO users(fullname, email, birthday, password, address)
            VALUES('$fullname', '$email', '$birthday', '$password', '$address')";
        execute($sql);
        header("Location: login.php");
        die();
    }
}
