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
            <img class="" src="<?=$product['thumbnail']?>" alt="<?=$product['title']?>">
        </div>
        <div class="col-md-7 mt-3 me-3">
            <h3 class=""><?=$product['title']?></h3>
            <h5 class=" text-danger"><?=number_format($product['price'])?>₫</h5>
            <input type="number" id="num" value="1" name="num" min="1">
            <button class="col-12 bg-danger text-white" onclick="addCart(<?=number_format($product['id'])?>)">Thêm vào giỏ hàng</button>
        </div>
        <div class="col-md-12 mt-3 me-3"> 
            <?=$product['content']?>
        </div>
    </div>
</div>
<!-- end body -->


<script>
    function addCart(id) {
        num = $('[name=num]').val();
        $.post("api/process-cart-cookie.php", {
                'action': 'addCart',
                'id': id,
                'num': num  
            },
            function(data, status) {
                if(status == 'success'){
                    alert("da them thanh cong san pham vao gio hang");
                }
                location.reload();
            });
    }
</script>
<?php
include_once "layouts/footer.php";
?>