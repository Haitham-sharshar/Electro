<?php include "../admin/category_class.php" ?>
<?php include "../admin/product_class.php" ?>
<?php include "../admin/header.php" ?>



<div class="container">
<?php

if(isset($_GET['category'])){
    include "../admin/category.php";
}
if(isset($_GET['category_add'])){
    include "../admin/category_add.php";
}
if(isset($_GET['category_update'])){
    include "../admin/category_update.php";
}
if(isset($_GET['category_delete'])){
    $db=new oopCrud;
    $cat= new Category($db->getConnection());
    $cat->deleteCat($_GET['id']);
    include "../admin/category.php";

}
if(isset($_GET['products'])){
    include "../admin/product.php";
}
if(isset($_GET['product_add'])){
    include "../admin/product_add.php";
}


?>
</div>

























<?php include "../admin/footer.php" ?>