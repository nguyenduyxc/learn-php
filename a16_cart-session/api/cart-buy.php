<?php
$fullname = $email = $phone = $address = $note = '';
if(!empty($_POST)){
    if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    if(isset($_POST['note'])){
        $note = $_POST['note'];
    }
    
    $dateOrder = date("Y/m/d H:i:s");

    // insert for db orders
    $sql = "INSERT INTO orders(full_name, email, phone, address, note, date_order)
    VALUES('$fullname', '$email', '$phone', '$address', '$note', '$dateOrder')";
    execute($sql);


    // lay ban ghi tuong ung cua ordre
    $sql = "SELECT id FROM orders WHERE date_order = '$dateOrder'";
    $idOrder = executeResult($sql)[0]['id'];




    if($cart == NULL || count($cart) == 0){
        header("Location: products.php");        
        die();
    }


    $idList = [];
    foreach ($cart as $key => $value) {
        $idList[] = $value['id'];
    }
    // lay danh sach id sp trong gio hang
    $idList = implode(',', $idList);
    // lay sp thuong ung vs sp trong gio hang
    $sql = "SELECT * FROM products WHERE id IN ($idList)";
    $products = executeResult($sql);
    // insert lan luot cac dl
    $total = 0;
    foreach ($products as $key => $product) {
        foreach ($cart as $key => $item) {
            if ($product['id'] == $item['id']) {
                $total = $item['num'] * $product['price'];
                $productId = $product['id'];
                $num = $item['num'];
                $sql = "INSERT INTO orderdetails( order_id, product_id, num, price) 
                VALUES('$idOrder', '$productId', '$num', '$total')";
                
                execute($sql);
            }
        }
    }

    unset($_SESSION['cart']);
    header("location: products.php");
}