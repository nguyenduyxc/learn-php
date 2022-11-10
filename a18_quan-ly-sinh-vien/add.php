<?php
require_once "db/dbhelper.php";
require_once "utils/utility.php";
$fullname = $age = $address = $id = "";
$title = "Add a new student";
require_once "process_add.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center"><?= $title ?></h1>
        <form action="" method="post">
            <div class="mb-3 mt-3">
                <label for="fullname" class="form-label">Fullname:</label>
                <input type="text" required class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">
            </div>
            <div class="mb-3 mt-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" required class="form-control" id="age" min="1" max="120" name="age">
            </div>
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" required class="form-control" id="address" placeholder="Enter address" name="address">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>