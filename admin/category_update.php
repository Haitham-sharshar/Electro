<?php
$db=new oopCrud;
$cat= new Category($db->getConnection());
$row= $cat->getCatByID($_GET['id']);
if(isset($_POST['_update'])){
  $cat->updateCat($_POST['_cat_name']);
    header("location:../admin/admin.php?category");
}

?>

<form action="" method="post" enctype="multipart/form-data">
<table class="table table-table-hover">
      <caption><h2>Update Categories </h2></caption>

<tr>
  <td><label>Category Name :</lable></td>
  <td><input type="text" name="_cat_name" class="form-control" value="<?php echo $row['name']; ?>"></td>
  <td rowspan="3">
  <img src="img/code.jpg"   height="200" width="200" >
  </td>
  </tr>
  <td><label>Category Image:</label></td>
  <td><input type="file" name="image" MAX_FILE_SIZE="30000" ></td>
  </tr>
  <tr>
   <td colspan="2">
   <center>
     <input type="submit" name="_update" value="Update" class="btn btn-primary"> 
   </center>
   </td>
   <//tr>
   </table>
   </form>