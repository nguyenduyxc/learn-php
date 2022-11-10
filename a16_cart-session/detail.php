<?php
session_start();
print_r($_SESSION);
$title = 'Detail product';
if (!empty($_GET)) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
} else {
    header("Location: products.php");
}
include_once "layouts/header.php";
require_once "db/config.php";
require_once "db/dbhelper.php";
?>

<!-- warmp -->
<div class="warmp container " style="min-height: 626px;">
    <div class="row pt-3">
        <?php
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $product = executeResult($sql)[0];
        if ($product == NULL) {
            header("Location: products.php");
        }
        echo '
            <div class="col-5">
                <img src="' . $product['thumbnail'] . '" alt="">
            </div>
            <div class="col-7">
                <h1>' . $product['title'] . '</h1>
                <h3 class="text-danger">' . number_format($product['price']) . '₫</h3>
                <input type="number" id="num" value="1" name="num" min="1" >
                <button type="button" class="btn btn-success mt-3" onclick=addCart(' . $product['id'] . ') style="width: 100%;">Thêm vào giỏ hàng</button>
            </div>
            <div class="col-12">
            ' . $product['contents'] . '
            </div>
            ';
        ?>

    </div>
</div>
<!-- End warmp -->

<script>
    function addCart(id) {
        num = $('[name=num]').val();
        $.post("api/cart-session.php", {
                action: "addCart",
                id: id,
                num: num
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