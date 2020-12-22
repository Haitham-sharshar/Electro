<?php include "electro_dp.php"; ?>

<?php
$msg="";
 if (isset($_POST['submit'])){
    if(empty($_POST['_name']))
      $msg="Your name is required!";
      else if (empty($_POST['_Email']))
      $msg="Your Email is required!";
      else if (!filter_var($_POST['_Email'],FILTER_VALIDATE_EMAIL))
      $msg="Your Email is invalid";
      else if (empty($_POST['_username']))
      $msg="Your Username is required!";
      else if (empty($_POST['_password']))
      $msg="Your password is required!";
      else if ($_POST['_password']!=$_POST['_repassword'])
      $msg="Your password not matched with confirm password!";
      else {
        $sql = "SELECT COUNT(Username)AS Num FROM users WHERE Username=?";
        $result = $conn->prepare($sql);
        $result->execute(Array($_POST['_username']));
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row['Num'] > 0)
            $msg = "user name is already exists!";
        
        else {
            $sql = "INSERT INTO users VALUES(?,?,?,?,?,?,?)";
            $result = $conn->prepare($sql);
            $result->execute(Array($_POST[''],$_POST['_name'],$_POST['_Email'],$_POST['_gender'],$_POST['_username'],$_POST['_password'],$_POST['']));
            if ($conn->errorCode() == 00000) {
   
             header("location:login.php");
           }
        }
      }
 }
?>
<?php include  "Templet/front/header.php"; ?>
  <link rel="stylesheet" href="css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/style3.css">

<div  class="container1">
    <h2  class="text-center">Create account</h2>
    <div class="col-sm-4 col-sm-offset-4">
   <form action="" method="post">
                <tr>
                    <td colspan="2">
                     <h5 style="color:red;" class="text-center bg-warning"> <?php echo $msg; ?> </h5>
                    </td>
                </tr>
               
                 <input type="text" name="_name" class="form-control" placeholder="Name">
               <input type="text" name="_Email" class="form-control" placeholder="Email">
             <input type="radio" name="_gender" value="M" checked /> Male <br>
                <input type="radio" name="_gender" value="F" checked /> Female 
        <input type="text" name="_username" class="form-control" placeholder="Username">
         <input type="password" name="_password" class="form-control" placeholder="password"> 
        <input type="password" name="_repassword" class="form-control" placeholder="Confirm Password">

       
        <tr>
            <td colspan="2">
                <center>
                    <input type="submit" name="submit" value="Sign Up" class="btn">
                </center>
            </td>   
       </tr>
   </form>  
  </div>
</div>

