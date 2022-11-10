<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h2>List Users</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                

<?php
$count = 0;
// b1: ket noi db
$conn = mysqli_connect('localhost', 'root', '', 'learn_cookie');
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
// b2: thuc hien truy van 
$sql = "SELECT fullname, email , birthday, address FROM users";
$result = mysqli_query($conn, $sql);
$data = [];
while (($row = mysqli_fetch_array($result, 1)) != null){
    $data[] = $row;
    echo '
        <tr>
            <td>'.++$count.'</td>
            <td>'.$row['fullname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['birthday'].'</td>
            <td>'.$row['address'].'</td>
        </tr>
    ';
}
// b3: dong ket noi
mysqli_close($conn);

?>
            </tbody>
        </table>
    </div>
</body>

</html>