<?php 
class oopCrud
{
 private $host="localhost";
 private $db="electro";
 private $user="root";
 private $pass="";
 public $conn;

 public function getConnection(){
     $this->conn=null;
     try{
        $this->conn = new PDO ("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
     }catch(PDOExecption $ex){
         echo "Connection error: ".$ex->getMessage();
     }
     return $this->conn;
 }
}

?>