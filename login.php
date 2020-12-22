<?php include "electro_dp.php"; ?>

<?php 
$msg="";
if(isset($_POST['submit']))
{
  $sql="SELECT * FROM users WHERE Username=? and password=?";
  $result=$conn->prepare($sql);
  $result->execute(Array($_POST['_username'],$_POST['_password']));
  if($result->rowCount()==1)
  {
    $row=$result->fetch();
    session_start();
    $_SESSION['username']=$_POST['_username'];
    if($row['isAdmin']=="")
    header("location:index.php");
  else
    header("location:admin/admin.php");
  }
    else{
    $msg="Username or password is invalid !";
  }
}
?>
<?php include  "Templet/front/header.php"; ?>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/style3.css">


<div class="main">
        <div class="container">
        <div class="col-sm-4 col-sm-offset-4">
                <form method="POST" id="signup-form" class="signup-form" action="" style="color: red">
                <h2  class="text-center">Login</h2>
            
                    <tr>
                        <td colspan="2">
                            <h5 style="color:red;" class="text-center bg-warnin"> <?php echo $msg ?> </h5>
                        </td>
                    </tr>
                    <table>
                     <tr>
                        <input type="text" class="form-control" name="_username" id="_username" placeholder="User Name" /><br>           
                      </tr>
                        <tr>
                          <input type="password" class="form-control" name="_password" id="password"
                            placeholder="Password" /> <br>
                        </tr>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                  
                        <center> <input type="submit" name="submit" value="Login" class="btn btn-primary"> </center>
            
</table>         
</div>
</div>
</div>

<?php include "Templet/front/footer.php" ?>