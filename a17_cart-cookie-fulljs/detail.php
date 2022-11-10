<?php
$title = 'Details';
if (!empty($_GET)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
} else {
    header("Location: products.php");
}

require_once "db/config.php";
require_once "db/dbhelper.php";
include_once "layouts/header.php";
?>
<!-- body -->
<div class="container">
    <div class="row">
        <?php
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $product = executeResult($sql)[0];
        ?>
        <div class="col-md-5 mt-3 me-3" style="width: 18rem;">
            <img class="" src="<?= $product['thumbnail'] ?>" alt="<?= $product['title'] ?>">
        </div>
        <div class="col-md-7 mt-3 me-3">
            <h3 class=""><?= $product['title'] ?></h3>
            <h5 class=" text-danger"><?= number_format($product['price']) ?>₫</h5>
            <input type="number" id="num" value="1" name="num" min="1">
            <button class="col-12 bg-danger text-white" onclick="addCart(<?= number_format($product['id']) ?>)">Thêm vào giỏ hàng</button>
        </div>
        <div class="col-md-12 mt-3 me-3">
            <?= $product['content'] ?>
        </div>
    </div>
</div>
<!-- end body -->


<script>
    function addCart(id) {
        num = $('[name=num]').val();
        num = Number(num);
        var cart = [];
        if (getCookie("cart") != '') {
            cart = JSON.parse(getCookie("cart"));
        }
        var isFind = false;
        cart.forEach((item, index) => {
            if (item['id'] == id) {
                item['num'] += num;
                isFind = true;
                break;
            }
        })
        if (!isFind) {
            cart.push({
                id: id,
                num: num
            })
        }
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