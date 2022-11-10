<?php
$a=$b=$cal=$result="";
if(!empty($_GET)){
    if(isset($_GET['a'])){
        $a = (float)$_GET['a'];
    };
    if(isset($_GET['b'])){
        $b = $_GET['b'];
    };
    if(isset($_GET['cal'])){
        $cal = $_GET['cal'];
    };

    switch ($cal) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
        case '/':
            $result = $a / $b;
            break;
        case '%':
            $result = $a % $b;
            break;
        default:
            # code...
            break;
    }
}
