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
            Tổng tiền: <?= number_format($priceTotal) ?>₫
            <a href="buy.php"><button class="text-light bg-danger">Thanh toán</button></a>
        </h3>

    </div>
</div>
<!-- end body -->

<script>
    function deleteCart(id) {
        var cart = [];
        if (getCookie("cart") != '') {
            cart = JSON.parse(getCookie("cart"));
        }

        
        cart.forEach((item, index) => {
            if (item['id'] == id) {
                cart.splice(index, 1);
            }
        })

        cart = JSON.stringify(cart);
        setCookie('cart', cart, 5);
        location.reload();
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>

<?php
include_once "layouts/footer.php";
?>