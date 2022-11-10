<?php
require_once("../db/config.php");
require_once("../db/dbhelper.php");
require_once("../utils/utility.php");
require_once("process_register.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Register<a href="login.php">(Login)</a></h1>
        <!-- <form action="process_form.php" method="post"> -->
        <form action="" id="myForm" method="post"> <!-- muon thuc hien cac ham php ngay tai form nay  -->
            <div class="mb-3 mt-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" required class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" required class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Password: </label>
                <input type="password" required class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="mb-3 mt-3">
                <label for="confirm-password" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm-password" placeholder="Enter Confirm password" required name="confirm-password">
            </div>
            <div class="mb-3 mt-3">
                <label for="birthday" class="form-label">Birthday:</label>
                <input type="date" required class="form-control" id="birthday" name="birthday">
            </div>
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <input type="texts" required class="form-control" id="address" placeholder="Enter address" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#myForm').submit(function(){
            if($('[name=password]').val() != $('[name=confirm-password]').val()){
                alert("Password does not match Confirm password!");
                return false;
            }
            return true;
        })
    </script>
</body>

</html>