<?php
session_start();
$title = 'Cart';
include_once "layouts/header.php";
require_once "db/config.php";
require_once "db/dbhelper.php";
?>

<!-- warmp -->
<div class="warmp container " style="min-height: 626px;">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Num</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // TH ko co ban ghi nao
                if($cart == NULL || count($cart) == 0){
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
                                    <td><button class="btn btn-danger" onclick="delCart(' . $product['id'] . ')">xoa</button></td>
                                </tr>
                                ';
                        }
                    }
                }
                ?>

            </tbody>
        </table>


        <div class="text-center ">
            <h3 class="text-center">Tong tien <?=number_format($totalAll)?>₫</h3>
            <a href="buy.php">
                <button type="button" class="btn btn-danger" style="width: 100%;">Mua hang</button>
            </a>
        </div>
    </div>

</div>
<!-- End warmp -->
<script>
    function delCart(id){
        $.post("api/cart-session.php", {
                action: "delCart",
                id: id
            },
            function(data, status) {
                alert("\nStatus: " + status);
                location.reload();
            });
    }
</script>
<?php
include_once "layouts/footer.php";
?>