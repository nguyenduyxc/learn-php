<?php
$title = 'Gio hang';
require_once "db/config.php";
require_once "db/dbhelper.php";
include_once "layouts/header.php";
?>
<!-- body -->
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Số tiền</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // print_r($cart);
                // check gio hang co rong ko 
                if (count($cart) == 0 || $cart == null) {
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
                                <td><button type="button" class="btn btn-danger" onclick=deleteCart(' . $products[$i]['id'] . ')>Xóa</button></td>
                            </tr>
                        ';
                }
                ?>

            </tbody>
        </table>
        <h3 class="text-center">
            Tổng tiền: <?=number_format($priceTotal)?>₫ 
            <a href="buy.php"><button class="text-light bg-danger">Thanh toán</button></a>
        </h3>

    </div>
</div>
<!-- end body -->

<script>
    function deleteCart(id) {
        $.post("api/process-cart-cookie.php", {
                'action': 'delCart',
                'id': id,
            },
            function(data, status) {
                if (status == 'success') {
                    alert("da xoa thanh cong san pham!");
                }
                location.reload();
            });
    }
</script>

<?php
include_once "layouts/footer.php";
?>