<?php
$tencuawelcome = '';
if (!empty($_GET)) {
    if (isset($_GET['tenbenindex'])){
        $tencuawelcome = $_GET['tenbenindex'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome 2</title>
</head>
<body>
    <h1>chuc mung <span style="color: green;"><?=$tencuawelcome;?> </span>da dang ky thanh cong!</h1>
</body>
</html>