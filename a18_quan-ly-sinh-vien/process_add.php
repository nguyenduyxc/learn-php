<?php
if (!empty($_POST)) {
    $fullname = getPost('fullname');
    $age = getPost('age');
    $address = getPost('address');

    $sql = "INSERT INTO sinhvien(fullname, age, address)
    VALUES('$fullname', '$age', '$address')";

    execute($sql);
    header("Location: index.php");
    die();
}
