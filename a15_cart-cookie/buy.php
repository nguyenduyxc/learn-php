<?php
$title = 'Dat hang';
require_once "db/config.php";
require_once "db/dbhelper.php";
include_once "layouts/header.php";
if ($cart == []) {
    header("Location: products.php");
    die();
}
?>
<!-- body -->
<div class="container">
    <form action="api/process_buy.php" method="post">
        <div class="row">
            <div class="col-6 col-md-5 mt-3 me-3">
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
                    <textarea id="note" required name="note" rows="3" cols="68">
                </textarea>
                </div>
            </div>
            <div class="col-6 col-md-5 mt-3 me-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Số tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // print_r($cart);
                        // check gio hang co rong ko 
                        if ($cart == []) {
                            echo '
                    <tr>
                        <td colspan="6"><h3 class="text-center">ko co san pham nao</h3></td>
                    </tr>';
                            die();
                        }
                        // === lay cac id san pham trong gio hang 
                        $idCart = [];
                        foreach ($cart as $item) {
                            $idCart[] = $item['id'];    
                        }

                        // === select spham
                        // echo implode(",",$idCart);
                        $idCart = implode(",", $idCart);
                        $sql = "SELECT * FROM products WHERE id IN ($idCart)";
                        $products = executeResult($sql);
                        $num = 0;
                        $price = 0;
                        $priceTotal = 0;
                        $count = 1;
                        for ($i = 0; $i < count($products); $i++) {
                            foreach ($cart as $item) {
                                if ($products[$i]['id'] == $item['id']) {
                                            $num = $item['num'];
                                            break;
                                        }
                            }
                            $price = $products[$i]['price'] * $num;
                            $priceTotal += $price;
                            echo '
                            <tr>
                                <th scope="row">' . $count++ . '</th>
                                <td>' . $products[$i]['title'] . '</td>
                                <td>' . number_format($products[$i]['price']) . '</td>
                                <td>' . $num . '</td>
                                <td>' . number_format($price) . '₫</td>
                            </tr>
                        ';
                        }
                        ?>

                    </tbody>
                </table>
                <h3 class="text-center">
                    Tổng tiền: <?= number_format($priceTotal) ?>₫
                </h3>
            </div>
            <h3 class="text-center">
                <button class="text-light bg-danger" type="submit">Đặt hàng</button>
            </h3>


        </div>
    </form>
</div>
<!-- end body -->
<?php
include_once "layouts/footer.php";
?>