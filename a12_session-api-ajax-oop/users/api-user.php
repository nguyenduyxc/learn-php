<?php
require_once("../db/config.php");
require_once("../db/dbhelper.php");
require_once("../utils/utility.php");
if(!empty($_GET)){
    $page = getGet('page');
}

$start = ($page-1) * 3;
$sql = "SELECT id, fullname, email, birthday, address, token
 FROM users ORDER BY id DESC LIMIT $start, 3";
$userList = executeResult($sql);

// du lieu tra ve la json 
echo json_encode($userList);


// du lieu tra  ve la html 
/* 
$count = $start;
foreach ($userList as $user) {
    echo '<tr>
            <th scope="row">' . ++$count . '</th>
            <td>' . $user["fullname"] . '</td>
            <td>' . $user["email"] . '</td>
            <td>' . $user["birthday"] . '</td>
            <td>' . $user["address"] . '</td>
            <td>
                <button type="button" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </td>
        </tr>';
} */
