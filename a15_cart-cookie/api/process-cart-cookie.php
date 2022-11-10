<?php
require_once "../utils/utility.php";
if (!empty($_POST)) {
    $action = getPost('action');
    $id = getPost('id');
    $num = getPost('num');
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
    }

    switch ($action) {
        case 'addCart':
            $isExitCart = false;
            foreach ($cart as $key => $value) {
                if ($value['id'] == $id) {
                    $cart[$key]['num'] += $num;
                    $isExitCart = true;
                    break;
                }
            }

            if (!$isExitCart) {
                $cart[] = [
                    'id' => $id,
                    'num' => $num
                ];
            }
            // echo gettype(json_encode($cart)); //tham so thu hai phai la string
            setcookie('cart', json_encode($cart), time() + 7 * 24 * 60 * 60, "/");
            break;
        case 'delCart':
            foreach ($cart as $key => $value) {
                if ($value['id'] == $id) {
                    unset($cart[$key]);
                    break;
                }
            }
            // echo gettype(json_encode($cart)); //tham so thu hai phai la string
            setcookie('cart', json_encode($cart), time() + 7 * 24 * 60 * 60, "/");
            break;

        default:
            # code...
            break;
    }
}
