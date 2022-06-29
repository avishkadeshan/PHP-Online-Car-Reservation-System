<?php
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);

$sqll = "SELECT status from  user where Email=:email";
$queryy = $dbh -> prepare($sqll);
$queryy-> bindParam(':email', $email, PDO::PARAM_STR);
$queryy->execute();
$resultss=$queryy->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($queryy->rowCount() > 0)
{
foreach($resultss as $resultt)
{ 
  $status =  $resultt->status;
 
}
}     

$sql ="SELECT Email,Password,FName status FROM user WHERE Email=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['fname']=$results->FName;


$currentpage=$_SERVER['REQUEST_URI'];

if($status == "verified"){
header('location: ../../index.php');
echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
                  
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                    echo "<script type='text/javascript'> document.location = 'include/user-otp.php'; </script>";
                }


} else{
  
echo "<script>Swal.fire('Email or Password does not match!','Please Enter Correct one','error') ;</script>";
}

}

?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email address*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password*">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">
               
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Login" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>