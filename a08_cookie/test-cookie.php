<?php

// don vi tinh theo s
/* $name = "name";
$value = "Duy";
setcookie($name, $value, time() + 24 * 60 * 60, "/");
 */

// lay gia tri value
/* if (!empty($_COOKIE)){
    if(isset($_COOKIE["name"])){
        $name_cookie = $_COOKIE["name"];
        echo "name_cookie = " . $name_cookie."</br>";
    }
} */

// Sua cookie
/* if (!empty($_COOKIE)){
    if(isset($_COOKIE["name"])){
        $_COOKIE["name"] = "Duy Update";
        $name_update = $_COOKIE["name"];
        echo "name_update = " . $name_update."</br>";
    }
} */

// xoa cookie
if (!empty($_COOKIE)) {
    if (isset($_COOKIE["name"])) {
        setcookie("name", "", time() - 3600, "/");
        echo "name_after_delele = " . $_COOKIE["name"];
    }
}
