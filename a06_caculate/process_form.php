<?php
$a = $b = $pheptinh = $ketqua = "";
if (!empty($_GET)) {
    if (isset($_GET['a'])) {
        $a = $_GET['a'];
        // echo gettype($a);
    }
    if (isset($_GET['b'])) {
        $b = $_GET['b'];
    }
    if (isset($_GET['pheptinh'])) {
        $pheptinh = $_GET['pheptinh'];
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
