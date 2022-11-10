<?php
// dung de xoa cookie 
if (!empty($_POST)) {
    echo $_POST;
    setcookie('fullname', '', 0, "/");
    setcookie('username', '', 0, "/");
    setcookie('email', '', 0, "/");
    setcookie('password', '', 0, "/");
    setcookie('phone', '', 0, "/");
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    Welcome
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <input type="hidden"  value=""  name="email">
        </div>
        <button type="submit" class="btn btn-primary">Dang xuat</button>
    </form>
</body>

</html>