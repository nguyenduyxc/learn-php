<?php
require_once "config.php";
// for insert/update/delete
function execute($sql){
    // b1: ket noi db
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // b2: thuc hien truy van
    mysqli_query($conn, $sql);

    // b3 dong ket noi db
    mysqli_close($conn);
}


// for select
function executeResult($sql){
        // b1: ket noi db
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // b2: thuc hien truy van
        $resultset = mysqli_query($conn, $sql);
        $data = [];

        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            $data[] = $row;
        }
        /* 
        mysqli_fetch_array : lay tung phan tu trong db
        1: de set cho dl lay ra dang key - value / neu la 2: thi dl se la dang index  
         */
        
        // b3 dong ket noi db
        mysqli_close($conn);

        // b4: tra ve dl
        return $data;
}