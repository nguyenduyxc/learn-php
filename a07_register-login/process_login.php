<?php
// lay dl tu ben register
$registered_email = $registered_password = "";
if(isset($_GET['email'])){
    $registered_email = $_GET['email'];
}
if(isset($_GET['password'])){
    $registered_password = $_GET['password'];
}



// lay dl tu form post
$email = $password = "";
if(!empty($_POST)){
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    
    // so sanh dl 
    if ($registered_email == $email && $registered_password == $password) {
        header("Location: welcome.php");
        die();
    }else{
        echo "<h1 style='color:red;' class='text-center'>Vui long kiem tra lai email && password</h1>";
    }
    
}

