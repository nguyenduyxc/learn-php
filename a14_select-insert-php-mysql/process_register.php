<?php
$fullname = $email = $birthday = $password = $address = "";
if (!empty($_POST)) {
    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['birthday'])) {
        $birthday = $_POST['birthday'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = md5($password).'09JJJjhh7834jHJG876312^&%shjdgsjagdasKoksduy';
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    $conn = mysqli_connect('localhost', 'root', '', 'learn_cookie');
    mysqli_set_charset($conn, "utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // b2: thuc hien truy van 
    $sql = "INSERT INTO users (fullname, email, birthday, password, address)
            VALUES('$fullname', '$email', '$birthday', '$password', '$address')";
    $result = mysqli_query($conn, $sql);
    // b3: dong ket noi
    mysqli_close($conn);
    header("Location: select.php");
}
