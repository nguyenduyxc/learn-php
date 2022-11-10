<?php
if (!empty($_POST)) {
    $fullname = getPost('fullname');
    $age = getPost('age');
    $address = getPost('address');
    
    $sql = "UPDATE sinhvien set fullname = '$fullname', age = '$age', address = '$address' WHERE id = '$id'";

    execute($sql);
    header("Location: index.php");
    die();
}
