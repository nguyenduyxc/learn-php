<?php
$hoten=$email=$ngaysinh=$matkhau=$matkhauxacnhan=$diachi='';
$isMappingPass = True;
// xu ly dl qua Post
if(!empty($_POST)){
    var_dump($_POST);
    echo "<h1>Post</h1>";
    if(isset($_POST['fullname'])){
        $hoten = $_POST['fullname'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['birthday'])){
        $ngaysinh = $_POST['birthday'];
    }
    if(isset($_POST['password'])){
        $matkhau = $_POST['password'];
    }
    if(isset($_POST['confirm-password'])){
        $matkhauxacnhan = $_POST['confirm-password'];
    }
    if(isset($_POST['address'])){
        $diachi = $_POST['address'];
    }
    // echo $hoten."-".$email."-".$ngaysinh."-".$matkhau."-".$matkhauxacnhan."-".$diachi."<br/>";
    if($matkhau == $matkhauxacnhan){
        header("Location: welcome2.php");
    }else{
        echo "<h1>Nhap lap password vs comfirm pass ko khop</h1>";
    }
}

// xu ly dl qua Get
if(!empty($_GET)){
    echo "<h1>Get</h1>";
    if(isset($_GET['fullname'])){
        $hoten = $_GET['fullname'];
    }
    if(isset($_GET['email'])){
        $email = $_GET['email'];
    }
    if(isset($_GET['birthday'])){
        $ngaysinh = $_GET['birthday'];
    }
    if(isset($_GET['password'])){
        $matkhau = $_GET['password'];
    }
    if(isset($_GET['confirm-password'])){
        $matkhauxacnhan = $_GET['confirm-password'];
    }
    if(isset($_GET['address'])){
        $diachi = $_GET['address'];
    }
    echo $hoten."-".$email."-".$ngaysinh."-".$matkhau."-".$matkhauxacnhan."-".$diachi."<br/>";
    if($matkhau == $matkhauxacnhan){
        header("Location: welcome2.php?tenbenindex=".$hoten);
        die();
    }else{
        $isMappingPass = false;
    }
}

// xu ly dl qua Post/Get
/* if(!empty($_REQUEST)){
    echo "<h1>REQUEST</h1>";
    if(isset($_REQUEST['fullname'])){
        $hoten = $_REQUEST['fullname'];
    }
    if(isset($_REQUEST['email'])){
        $email = $_REQUEST['email'];
    }
    if(isset($_REQUEST['birthday'])){
        $ngaysinh = $_REQUEST['birthday'];
    }
    if(isset($_REQUEST['password'])){
        $matkhau = $_REQUEST['password'];
    }
    if(isset($_REQUEST['confirm-password'])){
        $matkhauxacnhan = $_REQUEST['confirm-password'];
    }
    if(isset($_REQUEST['address'])){
        $diachi = $_REQUEST['address'];
    }
    echo $hoten."-".$email."-".$ngaysinh."-".$matkhau."-".$matkhauxacnhan."-".$diachi."<br/>";
}
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php Get-Post</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Register form</h1>
        <!-- <form action="process_form.php" method="post"> -->
        <form action="" method="post"> <!-- muon thuc hien cac ham php ngay tai form nay  -->
            <div class="mb-3 mt-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" class="form-control" id="fullname" required placeholder="Enter fullname" value="<?=$hoten?>" name="fullname">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" required placeholder="Enter email" value="<?=$email?>" name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="date" class="form-label">Birthday:</label>
                <input type="date" class="form-control" id="date" required placeholder="Enter email" value="<?=$ngaysinh?>" name="birthday">
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Password: <?=$isMappingPass? '': '<font style="color:red">Mat khau ko khp vs confirm password</font>' ?></label>
                <input type="password" class="form-control" id="password" required name="password">
            </div>
            <div class="mb-3 mt-3">
                <label for="confirm-password" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm-password" required name="confirm-password">
            </div>
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" required placeholder="Enter address" value="<?=$diachi?>" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>