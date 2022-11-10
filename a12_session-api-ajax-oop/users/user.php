<?php
session_start();
$count = 0;
require_once("../db/config.php");
require_once("../db/dbhelper.php");
require_once("../utils/utility.php");

// check token 
$user = validateToken();
if ($user == null) {
    header("Location: login.php");
    die();
}

$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 3";
$userList = executeResult($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">List user-<?= $user['fullname'] ?> <a href="logout.php">Logout</a></h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="result">
                <?php
                // var_dump($userList);
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
                }
                ?>
            </tbody>
        </table>
        <p class="text-center text-info"><a href="#" id="load-more" onclick="loadMore(this)">load-more</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var currentPage = 1;
        var count = 3;
        function loadMore(that) {
            currentPage++;
            $.get("api-user.php?page="+currentPage, function(userList, status) {
                if (userList==null || userList == '') {
                    $('#load-more').parent().hide();
                }else{
                    // data la json 
                    userList = JSON.parse(userList);
                    userList.forEach(user => {
                        $('#result').append(`
                                <tr>
                                    <th scope="row">${++count}</th>
                                    <td>${user['fullname']}</td>
                                    <td>${user['email']}</td>
                                    <td>${user['birhthday']}</td>
                                    <td>${user['address']}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            `)
                    });
                    
                    if (userList.length < 3){
                        $('#load-more').parent().hide();
                    }




                    // data la html
                   /*  $('#result').append(userList);
                    console.log(userList); */
                }
            });
        }
    </script>
</body>

</html>