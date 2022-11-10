<?php

if (!empty($_POST)) {
    require_once "db/dbhelper.php";
    require_once "utils/utility.php";
    $id = getPost('id');
    $sql = "DELETE FROM sinhvien WHERE id = '$id'";
    execute($sql);
}
