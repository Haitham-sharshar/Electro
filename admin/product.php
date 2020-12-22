<?php
    $db=new oopCrud;
  $pro= new product($db->getConnection());


?>
<table class="table table-hover">
<caption><h2> product Data</h2>
<a href="../admin/admin.php?product_add">
 <input type="submit" name="add" value="Add" class="btn btn-primary">
 </a>
 </caption>
 <tr>
         <td colspan="2">
             <h5 style="color:red;" class="text-center bg-warnin"><?php $pro->display_message(); ?></h5>
         </td>
</tr>
<tr>
    <th scope="col"> products ID</th>
    <th scope="col"> products Name</th>
    <th scope="col"> Description</th>
    <th scope="col"> old_Price</th>
    <th scope="col"> new_Price</th>
    <th scope="col"> Quantity</th>
    <th scope="col"> Category</th>
</tr>
<?php 
  $pro->showAllProData();
?>
</table>