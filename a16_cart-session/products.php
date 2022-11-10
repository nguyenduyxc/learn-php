<?php
session_start();
$title = 'Product List';
include_once "layouts/header.php";
require_once "db/config.php";
require_once "db/dbhelper.php";
?>

<!-- warmp -->
<div class="warmp container " style="min-height: 626px;">
    <div class="row">
        <?php
        $sql = "SELECT * FROM products";
        $products = executeResult($sql);
        foreach ($products as $product) {
            echo '
            <div class="card col-3 m-3" style="width: 18rem;">
                <a href="detail.php?id=' . $product['id'] . '">
                    <img src=' . $product['thumbnail'] . ' class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5> <a href="detail.php?id=' . $product['id'] . '"> ' . $product['title'] . ' </a></h5>
                    <p class="text-danger">' . number_format($product['price']) . '₫</p>
                </div>
            </div>
            ';
        }
        ?>
    </div>

</div>
<!-- End warmp -->
<?php
include_once "layouts/footer.php";
?>