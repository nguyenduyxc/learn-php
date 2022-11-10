<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quan ly sinh vien</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h3 class="text-center text-info">Quan ly sinh vien</h3>
            <form method="GET">
                <div class="mb-3 text-center ">
                    <input type="text" style="width: 300px;" id="search_name" name="search" placeholder="Nhap ten sinh vien ban muon tim kiem...">
                    <button type="submit" class="btn btn-primary">Tim kiem</button>
                </div>
            </form>
            <div>
                <a href="add.php">
                    <button type="button" style="width: 150px;" class="btn btn-primary float-end">Them sinh vien</button>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "db/dbhelper.php";
                    require_once "utils/utility.php";
                    $sinhvienListCount = 0;
                    $page = 0;
                    $startRecord = 0;
                    $num = 5;
                    $search = '';

                    // for search
                    if (!empty($_GET)) {
                        $search = getGet('search');
                        $page = getGet('page');
                    }

                    // start record
                    if($page > 0){
                        $startRecord = ($page-1) * $num;
                    }

                    // for count page number
                    $sqlCount = "SELECT COUNT(id) as num FROM sinhvien WHERE fullname LIKE '%$search%' ";
                    $sinhvienListCount = executeResult($sqlCount);
                    $page = ceil($sinhvienListCount[0]['num'] / 5);


                    // for select record
                    $sql = "SELECT * FROM sinhvien WHERE fullname LIKE '%$search%' ORDER BY id DESC LIMIT $startRecord, $num";
                    $sinhvienList = executeResult($sql);
                    // var_dump($sinhvienList);
                    // die();
                    if (count($sinhvienList) == 0 || $sinhvienList == NULL) {
                        echo '
                        <tr>
                            <th colspan="6"><h3 class="text-center text-danger">Ko co ban ghi nao</h3></th>
                        </tr>
                        ';
                    }
                    $count = 1;
                    foreach ($sinhvienList as $sinhvien) {
                        echo '
                        <tr>
                            <th scope="row">' . $count++ . '</th>
                            <td>' . $sinhvien['fullname'] . '</td>
                            <td>' . $sinhvien['age'] . '</td>
                            <td>' . $sinhvien['address'] . '</td>
                            <td style="width: 70px;">
                                <a href="update.php?id=' . $sinhvien['id'] . '"><button type="button" class="btn btn-warning" >Sua</button></a>
                            </td>
                            <td style="width: 70px;">
                                <button type="button" class="btn btn-danger" onclick="delStudent(' . $sinhvien['id'] . ');">Xoa</button>
                            </td>
                        </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $page; $i++) {
                        echo '
                                <li class="page-item"><a class="page-link" href="?search='.$search.'&page=' . $i . '">' . $i . '</a></li>
                            ';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function delStudent(id) {
            var isConfirm = confirm("Ban chac chan muon xoa sinh vien nay?");
            if (!isConfirm) {
                return;
            }
            $.post("process_del.php", {
                    "id": id
                },
                function(data) {
                    alert("Da xoa thanh cong ");
                    location.reload();
                });
        }
    </script>
</body>

</html>