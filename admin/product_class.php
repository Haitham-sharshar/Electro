<?php

class product{
   private$conn;
   public function __construct($db)
   {
      $this->conn=$db;
   }
   public function showAllProData(){
       $sql="SELECT * from product";
       $result=$this->conn->query($sql);
       while($row=$result->fetch()){
           echo <<<show
           <tr>
             <td>{$row['id']}<br>
               <img src="../admin/img/{$row['id']}.jpg" width="150" height="150">
             </td>
             <td>{$row['name']}</td>
             <td><textarea readonly rows="6" cols="40">{$row['description']}</textarea></td>
             <td>{$row['old_price']}</td>
             <td>{$row['new_price']}</td>
             <td>{$row['qty']}</td>
             <td>{$this->getCatName($row['category'])}</td>
             <td>
                <a href="../admin/admin.php?product_delete&id={$row['id']}">
                <input type="submit" name="delete" value="Delete" class="btn btn-primary">
                </a>
             </td>
           </tr>
           show;
       }
   }
   public function getCatName($catid){
    $sql="select name from category where id=$catid";
    $result=$this->conn->query($sql);
    $row=$result->fetch();
    return $row['name'];
   }
   public function addpro($proname,$prodesc,$procatid,$folder,$proprice,$newprice,$proqty){
      
    $sql="INSERT INTO product(name,description,category,image,old_price,new_price,qty)VALUES(?,?,?,?,?,?,?) ";
    $result=$this->conn->prepare($sql);
    $result->execute(Array($proname,$prodesc,$procatid,$folder,$proprice,$newprice,$proqty));
    $this->set_message("Added Successfully");
    //$lastCatID= $this->getLastCatID();
    //$this->uploadfile($lastCatID);
  }
   /*
     public function deleteCat($catid){
         $sql="DELETE FROM category WHERE Cat_ID=$catid";
         $result=$this->conn->prepare($sql);
         $result->execute();
         $this->set_message("Deleted Successfully");
         if(file_exists("../admin/img/".$catid.".jpg")){
           unlink("../admin/img/".$catid.".jpg");
         }   
         return true;
     }
     
     public function updateCat($Catname){
      $sql="UPDATE category SET Cat_Name=? WHERE Cat_ID=".$_GET{'id'};
      $result=$this->conn->prepare($sql);
      $result->execute(Array($Catname));
      $this->set_message("Updated Successfully");
      $this->uploadfile($_GET['id']);
    }
     public function getLastCatID(){
      $sql="SELECT max(Cat_ID) as lastID from category";
      $result=$this->conn->query($sql);
      $lastCatID=$result->fetch();
      return $lastCatID['lastID'];
     }
     public function uploadfile($catid){
       if($_FILES['image']['tmp_name']!="none"){
         move_uploaded_file($_FILES['image']['tmp_name'],"../admin/img/".$catid.".jpg");
       }
     }
      public function getCatByID($catid){
        $sql="SELECT *  from category WHERE Cat_ID=$catid";
        $result=$this->conn->query($sql);
        $row=$result->fetch();
        return $row;
      }

 */

     public function set_message($msg){
       if( !empty($msg)){
         $_SESSION['message']=$msg;
       }else{
         $msg="";
       }
     }
   public function display_message(){
     if (isset( $_SESSION['message'])){
       echo  $_SESSION['message'];
       unset( $_SESSION['message']);
     }
   }
  
}


?>
