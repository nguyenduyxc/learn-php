<?php
$a = $b = $pheptinh = $ketqua = "";
if (!empty($_POST)) {
    if (isset($_POST['a'])) {
        $a = $_POST['a'];
        // echo gettype($a);
    }
    if (isset($_POST['b'])) {
        $b = $_POST['b'];
    }
    if (isset($_POST['cal'])) {
        $pheptinh = $_POST['cal'];
    }
    switch ($pheptinh) {
        case '+':
            $ketqua = $a + $b;
            break;
        case '-':
            $ketqua = $a - $b;
            break;
        case '*':
            $ketqua = $a * $b;
            break;
        case '/':
            $ketqua = $a / $b;
            break;
        case '%':
            $ketqua = $a % $b;
            break;
    }
    // echo $ketqua;
}

// var_dump($_GET);
if (!empty($_GET)) {
    if (isset($_GET['a'])) {
        $a = (int)$_GET['a'];
        // echo gettype($a);
    }
    if (isset($_GET['b'])) {
        $b = (int)$_GET['b'];
    }
    if (isset($_GET['cal'])) {
        $pheptinh = $_GET['cal'];
    }
    switch ($pheptinh) {
        case '+':
            $ketqua = $a + $b;
            break;
        case '-':
            $ketqua = $a - $b;
            break;
        case '*':
            $ketqua = $a * $b;
            break;
        case '/':
            $ketqua = $a / $b;
            break;
        case '%':
            $ketqua = $a % $b;
            break;
    }
    // echo $ketqua;
}

echo($ketqua);