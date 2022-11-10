<?php
require_once "../db/config.php";
require_once "../db/dbhelper.php";
$fullname = $email = $phone_number = $address = $note = '';
if (!empty($_POST)) {
    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['phone'])) {
        $phone_number = $_POST['phone'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }
    if (isset($_POST['note'])) {
        $note = $_POST['note'];
    }
    $order_date = date("Y/m/d H:i:s");
    // == insert orders into database
    $sql = "INSERT INTO orders(fullname, email, phone_number, address, order_date, note) 
    VALUES('$fullname', '$email', '$phone_number', '$address', '$order_date','$note')";
    execute($sql);


    // === SELECT ORDER BUY 
    $sql  = "SELECT id FROM orders WHERE order_date = '$order_date'";
    $idUserOrder = executeResult($sql)[0]['id'];

    // ko co session cart se quy lai trang products
    $cart = [];
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        $countCart = count($cart);
    }
    if (count($cart) == 0 || $cart == null) {
        header("Location: products.php");
        die();
    }

    // lay cac id san pham trong gio hang 
    $idCart = [];
    for ($i = 0; $i < count($cart); $i++) {
        $idCart[] = $cart[$i]['id'];
    }

    // select spham
    // echo implode(",",$idCart);
    $idCart = implode(",", $idCart);
    $sql = "SELECT * FROM products WHERE id IN ($idCart)";
    $products = executeResult($sql);
    $num = 0;
    $price = 0;
    $count = 1;
    for ($i = 0; $i < count($products); $i++) {
        for ($j = 0; $j < count($cart); $j++) {
            if ($products[$i]['id'] == $cart[$j]['id']) {
                $num = $cart[$j]['num'];
            }
        }
        $price = $products[$i]['price'] * $num;
        $productId = $products[$i]['id'];
        $sql = "INSERT INTO orderdetails(order_id, product_id, num, price)
        VALUES ('$idUserOrder', '$productId', '$num', '$price')";
        execute($sql);
    }

    setcookie('cart', '', time() - 60, '/');
    header("Location: ../products.php");
}
