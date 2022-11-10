<?php

// for insert/update/delete
function execute($sql){
    // b1: ket noi db
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

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
    
        // b2: thuc hien truy van
        $resultset = mysqli_query($conn, $sql);
        $data = [];

        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            $data[] = $row;
        }
    
        // b3 dong ket noi db
        mysqli_close($conn);

        // b4: tra ve dl
        return $data;
}