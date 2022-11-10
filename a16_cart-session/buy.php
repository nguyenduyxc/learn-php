<?php
session_start();
$title = 'Buy';
include_once "layouts/header.php";
require_once "db/config.php";
require_once "db/dbhelper.php";
require_once "api/cart-buy.php";
?>

<!-- warmp -->
<form action="" method="post">
    <div class="warmp container " style="min-height: 626px;">
        <div class="row pt-3">
            <div class="col-5">
                <div class="mb-3 mt-3">
                    <label for="fullname" class="form-label">Fullname:</label>
                    <input type="text" required class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" required class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="tel" required class="form-control" id="phone" placeholder="Enter phone" name="phone">
                </div>
                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" required class="form-control" id="address" placeholder="Enter address" name="address">
                </div>
                <div class="mb-3 mt-3">
                    <label for="note" class="form-label">Note:</label>
                    <textarea name="note" id="note" cols="69" rows="5"></textarea>
                </div>
            </div>
            <div class="col-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Num</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // TH ko co ban ghi nao
                        if ($cart == NULL || count($cart) == 0) {
                            echo '
                    <tr>
                        <td colspan="6">
                            <h3 class="text-center">Ko co sp nao trong gio hang</h3>
                        </td>
                    </tr>
                    ';
                            die();
                        }


                        $idList = [];
                        foreach ($cart as $key => $value) {
                            $idList[] = $value['id'];
                        }
                        // lay danh sach id sp trong gio hang
                        $idList = implode(',', $idList);
                        // lay sp thuong ung vs sp trong gio hang
                        $sql = "SELECT * FROM products WHERE id IN ($idList)";
                        $products = executeResult($sql);

                        // show du lieu
                        $count = 1;
                        $total = 0;
                        $totalAll = 0;
                        foreach ($products as $key => $product) {
                            foreach ($cart as $key => $item) {
                                if ($product['id'] == $item['id']) {
                                    $total = $item['num'] * $product['price'];
                                    $totalAll += $total;
                                    echo '
                                <tr>
                                    <th scope="row">' . $count++ . '</th>
                                    <td>' . $product['title'] . '</td>
                                    <td>' . $item['num'] . '</td>
                                    <td>' . number_format($product['price']) . '₫</td>
                                    <td>' . number_format($total) . '₫</td>
                                </tr>
                                ';
                                }
                            }
                        }
                        ?>

                    </tbody>
                </table>

                <div class="text-center ">
                    <h3 class="text-center">Tong tien <?= number_format($totalAll) ?>₫</h3>

                        <button type="submit" class="btn btn-danger" style="width: 100%;">Dat hang</button>
                    
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End warmp -->

<?php
include_once "layouts/footer.php";
?>