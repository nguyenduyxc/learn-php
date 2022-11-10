<?php

// == post vs get ==
// var_dump($_POST); // thuong dung de  test du lieu
// var_dump($_GET);

if(isset($_POST['fullname'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];


    echo "<p>phan nay cua post</p>";
    echo "Fullname: " . $fullname;
    echo "<br/>";
    
    echo "email: " . $email;
    echo "<br/>";
    
    echo "Address: " . $address;
    echo "<br/>";
}

if(isset($_GET['fullname'])){
    $fullname = $_GET['fullname'];
    $email = $_GET['email'];
    $address = $_GET['address'];


    echo "<p>phan nay cua get</p>";
    echo "Fullname: " . $fullname;
    echo "<br/>";
    
    echo "email: " . $email;
    echo "<br/>";
    
    echo "Address: " . $address;
    echo "<br/>";
}


// == request ==
// co the thay cho get, post
// var_dump($_REQUEST);

if(isset($_REQUEST['fullname'])){
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];


    echo "<p>phan nay cua request</p>";
    echo "Fullname: " . $fullname;
    echo "<br/>";
    
    echo "email: " . $email;
    echo "<br/>";
    
    echo "Address: " . $address;
    echo "<br/>";
}