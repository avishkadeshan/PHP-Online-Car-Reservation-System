<?php
//require_once "connect.php";
//error_reporting(0);
/*
if(isset($_POST['signup'])){
$fname=mysqli_real_escape_string($con,$_POST['fname']);
$lname=mysqli_real_escape_string($con,$_POST['lname']); 
$email=mysqli_real_escape_string($con,$_POST['emailid']); 
$mobile=mysqli_real_escape_string($con,$_POST['contact']);
$password=mysqli_real_escape_string(md5($con,$_POST['password'])); 
$dob=mysqli_real_escape_string($con,$_POST['dob']);
$address=mysqli_real_escape_string($con,$_POST['address']); 
$city=mysqli_real_escape_string($con,$_POST['city']);
$country=mysqli_real_escape_string($con,$_POST['country']); 
$nic=mysqli_real_escape_string($con,$_POST['nic']);
$role=2;

       $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data="INSERT INTO  user(FName,LName,Email,Contact_No,Password,DOB,Address,City,Country,NIC_no,code,status,Role_id) VALUES('$fname','$lname','$email','$mobile','$password','$dob','$address','$city','$country','$nic','$code','$status','$role')";

        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender ="From: Imasha Cabs & Tourse";
            $sender.= "MIME-Version: 1.0\r\n";
            $email=$_POST['emailid'];
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] =$email ;
                $_SESSION['password'] =$password;
               header('location: user-otp.php');
                exit();
            }else{
              echo "Failed while sending code!";
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
          echo "Failed while inserting data into database";
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

*/




if(isset($_POST['signup']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname']; 
$email=$_POST['emailid']; 
$mobile=$_POST['contact'];
$password=md5($_POST['password']); 
$dob=$_POST['dob'];
$address=$_POST['address']; 
$city=$_POST['city'];
$country=($_POST['country']); 
$nic=$_POST['nic'];
$role=2;

$code = rand(999999, 111111);
$status = "notverified";

$sql="INSERT INTO  user(FName,LName,Email,Contact_No,Password,DOB,Address,City,Country,NIC_no,code,status,Role_id) VALUES(:fname,:lname,:email,:mobile,:password,:dob,:address,:city,:country,:nic,:code,:status,:role)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':nic',$nic,PDO::PARAM_STR);
$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':role',$role,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
//echo "<script>alert('Registration successfull. Now you can login');</script>";
   $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender ="From: Imasha Cabs & Tourse";
            $sender.= "MIME-Version: 1.0\r\n";
            $email=$_POST['emailid'];
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] =$email ;
                $_SESSION['password'] =$password;
               header('location: include/user-otp.php');
              header('location: user-otp.php');
              echo "<script type='text/javascript'> document.location = 'include/user-otp.php'; </script>";
                exit();
            }else{
              //echo "Failed while sending code!";
              echo "<script>alert('Failed while sending code!');</script>";
               // $errors['otp-error'] = "Failed while sending code!";
            }
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}





?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}

}
</script>
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" >
                <div class="form-group">
                  <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                </div>
                   <div class="form-group">
                 <input type="text" class="form-control" name="lname" placeholder="Last Name" required="required">
                </div>
                  <div class="form-group">
                 <input type="text" class="form-control" name="contact" placeholder="ContactNo" maxlength="10" required="required">
                </div>
                  <div class="form-group">
                    <label>Date of Birth</label>
                 <input type="date" class="form-control" name="dob" placeholder="Date of Birth" required="required">
                </div>  
                      <div class="form-group">
                  <input type="text" class="form-control" name="nic" placeholder="NIC" maxlength="10" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required="required">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="address" placeholder="Address" required="required">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="city" placeholder="City" required="required">
                </div>
                <div class="form-group">
                 <input type="text" class="form-control" name="country" placeholder="Country" required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit"  class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>