<?php
require_once("process_register.php");
register();
// var_dump($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php register</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Register</h1>
        <!-- <form action="process_form.php" method="post"> -->
        <form action="" method="post"> <!-- muon thuc hien cac ham php ngay tai form nay  -->
            <div class="mb-3 mt-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" required class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">
            </div>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" required class="form-control" id="username" placeholder="Enter username" name="username">
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
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" required class="form-control" id="phone" placeholder="Enter phone" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>