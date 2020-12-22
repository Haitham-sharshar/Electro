<?php 

  if(isset($_POST['_add'])){
    $db=new oopCrud;
    $pro= new product($db->getConnection());
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $folder = rand(0,1000). '_' .$image_name;
    move_uploaded_file($image_tmp,"uploadImg\\".$folder);
      $pro->addpro($_POST['_pro_name'],$_POST['_pro_desc'],$_POST['_pro_cat_id'],$folder,$_POST['_pro_price'],$_POST['_pro_price_new'],$_POST['_pro_qty']);
      header("location:../admin/admin.php?products");
  }
?>
<form action="" method="post" enctype= "multipart/form-data">
<table class="table table-table-hover">
    <caption><h2>Add Product </h2></caption>
<tr>
  <td><label>Product Name :</lable></td>
  <td><input type="text" name="_pro_name" class="form-control"></td>
  <td><label>Description:</label></td>
  <td rows="4"><textarea name="_pro_desc" rows="6" cols="30" class="form-control"></textarea></td>
  </tr>
  <tr>
  <td><label>Old Price</label></td>
  <td width="30%"><input type="number" name="_pro_price" min="1" max="50000"></td>
  </tr>
  <tr>
  <td><label>New Price</label></td>
  <td width="30%"><input type="number" name="_pro_price_new" min="1" max="50000"></td>
  </tr>
  <tr>
  <td><label>QTY</label></td>
  <td width="30%"><input type="number" name="_pro_qty" min="1" max="10"></td>
  <td><label>Category</label></td>
  <td>
     <select name="_pro_cat_id" class="form-control">
    
     <?php 
     include "db.php";
$sql = "SELECT * from category";
$result=$conn->query($sql);
while($row=$result->fetch()){

?>
   <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?> </option>
<?php 
  }
  ?>
      </select>
      </td>
  </tr>
  <tr>
  <td><label>Product Image</label></td>
  <td><input type="file" name="image" multiple_MAX_FILE_SIZE="30000"></td>
   </tr>
   <tr>
    <td colspan="2">
   <center>
    </br> <input type="submit" name="_add" value="Add New" class="btn btn-primary"> 
   </center>
   </td>
   </tr>
   </table>
   </form>