<!-- shop -->
<?php
$result = $conn->query("SELECT * FROM category");
while ($row = $result->fetch()) {

    $cat = <<<c


    <div class="col-md-4 col-xs-6">
    <div class="shop">
        <div class="shop-img">
            <img src="./img/shop01.png" alt="">
        </div>
        <div class="shop-body">
            <h3>{$row['name']}<br>Collection</h3>
            <a href="pro_cat.php?id={$row['id']}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
c;

    echo $cat;
};

?>

<!-- /shop -->