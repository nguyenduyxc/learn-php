<?php
session_start();
require_once "../db/config.php";
require_once "../db/dbhelper.php";
require_once "../utils/utility.php";
if (!empty($_POST)) {
    $action = getPost('action');
    $id = getPost('id');
    $num = getPost('num');

    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    switch ($action) {
        case 'addCart':
            addCart($cart, $id, $num);
            break;
        case 'delCart':
            delCart($cart, $id);
            break;
        default:
            # code...
            break;
    }
}


function addcart($cart, $id, $num)
{
    $findExit = false;
    foreach ($cart as $key => $value) {
        if ($cart[$key]['id'] == $id) {
            $cart[$key]['num'] += $num;
            $findExit = true;
            break;
        }
    }
    if (!$findExit) {
        $cart[] = [
            'id' => $id,
            'num' => $num
        ];
    }
    $_SESSION['cart'] = $cart;
}


function delCart($cart, $id){
    foreach ($cart as $key => $value) {
        if ($cart[$key]['id'] == $id) {
            unset($cart[$key]);
            break;
        }
    }
    $_SESSION['cart'] = $cart;
}
