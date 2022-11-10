<?php
// var_dump($_REQUEST);

if(isset($_REQUEST['fullname'])){
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];


    echo "<p>phan nay cua request</p>";
    echo "Fullname: " . $fullname."<br/>";
    
    echo "email: " . $email."<br/>";
    
    echo "Address: " . $address."<br/>";
    if($fullname == "Duy"){
        header("Location: Welcome.php");
    }
}

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
        <!-- <form action="process_form.php" method="post"> -->
        <form action="" method="post"> <!-- muon thuc hien cac ham php ngay tai form nay  -->
            <div class="mb-3 mt-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>