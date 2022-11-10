<?php
$title = 'List product';
require_once "db/config.php";
require_once "db/dbhelper.php";
include_once "layouts/header.php";
?>
    <!-- body -->
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM products";
            $products = executeResult($sql);
            foreach ($products as $key => $item) {
                echo '
                    <div class="card col-6 col-md-3 mt-3 me-3" style="width: 18rem;">
                        <img class="card-img-top" src="'.$item['thumbnail'].'" alt="'.$item['title'].'">

                        <div class="card-body">
                            <a href="detail.php?id='.$item['id'].'"><h5 class="card-title">'.$item['title'].'</h5></a>
                            <p class="card-text text-danger">'.number_format($item['price']).'₫</p>
                        </div>
                    </div>
                ';
            }
            ?>
        </div>
    </div>
    <!-- end body -->
<?php
include_once "layouts/footer.php";
?>    
