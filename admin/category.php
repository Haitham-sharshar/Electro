<?php
    $db=new oopCrud;
    $cat= new Category($db->getConnection());


?>
<table class="table table-hover">
<caption><h2> Categories Data</h2>
<a href="../admin/admin.php?category_add">
 <input type="submit" name="add" value="Add" class="btn btn-primary">
 </a>
 </caption>
 <tr>
         <td colspan="2">
             <h5 style="color:red;" class="text-center bg-warnin"> <?php $cat->display_message();  ?> </h5>
         </td>
</tr>
<tr>
    <th scope="col"> Category ID</th>
    <th scope="col"> Category Name</th>
</tr>
<?php
$db=new oopCrud;
$cat= new Category($db->getConnection());
$cat->showAllCatData();

?>
</table>