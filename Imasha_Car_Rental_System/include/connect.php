<?php
session_start();
require "connection.php";
$errors = array();
//$username1=$fullname=$licenceno=$phno=$email=$password1=$dob="";
$c=false;
/*
//if user signup button
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

   //  $username1 = mysqli_real_escape_string($con, $_POST['fullname']);
    // $fullname = mysqli_real_escape_string($con, $_POST['fullnamereal']);
   // $email = mysqli_real_escape_string($con, $_POST['emailid']);
  //  $password1 = mysqli_real_escape_string($con, $_POST['password']);
   // $dob = mysqli_real_escape_string($con, $_POST['age']);
   //  $licenceno = mysqli_real_escape_string($con, $_POST['licenceno']);
   //  $mobileno = mysqli_real_escape_string($con, $_POST['mobileno']);

       $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data="INSERT INTO  user(FName,LName,Email,Contact_No,Password,DOB,Address,City,Country,NIC_no,code,status,Role_id) VALUES('$fname','$lname','$email','$mobile','$password','$dob','$address','$city','$country','$nic','$code','$status','$role');";

      //  $insert_data = "INSERT INTO `tblusers` (`id`, `FullName`, `fullnamer`, `licenceNumber`, `ContactNo`, `dob`, `EmailId`, `Password`, `code`, `status`, `RegDate`, `UpdationDate`,`Address`,`City`,`Country`) VALUES ('', '$username1', '$fullname', '$licenceno', '$mobileno', '$dob', ' $email', '$password1', '$code', '$status', current_timestamp(), '','','','');";

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
   //if user click verification code submit button

    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['Email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE user SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['email'] = $email;
                echo "<script>alert('Verified Successful');</script>";
                header('location:  ../index.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
                echo "<script>alert('Failed while updating code!');</script>";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
            echo "<script>alert('You've entered incorrect code!');</script>";
        }
    }
 //if user click login button
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($con, $_POST['fullname']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $get_email="SELECT EmailId from tblusers WHERE FullName = '$username';";
        $sql=mysqli_query($con,  $get_email);
        if(mysqli_num_rows($sql) > 0){
            $fetch1 = mysqli_fetch_assoc($sql);
        $email =  $fetch_pass = $fetch1['EmailId'];
    }
        
        $check_email = "SELECT * FROM tblusers WHERE FullName = '$username';";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['Password'];
            if($password == $fetch_pass){
            
                $_SESSION['email'] =$email; 
                $_SESSION['password'] = $password;
                $_SESSION['username'] = $_POST['fullname'];
                $_SESSION['fname']=$_POST['fullname'];
                $_SESSION['login']=$email;
                $status = $fetch['status'];
                if($status == 'verified'){
                   $_SESSION['email'] = $email;
                  $_SESSION['username'] = $username;
                  $_SESSION['password'] = $password;
                  header('location: ../../index.php');
                  
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect Username or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }
  //if user click continue button in forgot password form
if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM tblusers WHERE EmailId='$email';";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE tblusers SET code = $code WHERE EmailId = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $headers ="From: Instinct Seekers";
                $headers .= "MIME-Version: 1.0\r\n";
                //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
               
                if(mail($email, $subject, $message, $headers)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

        //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM tblusers WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['EmailId'];
            $_SESSION['email'] = $email;
           
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
           $email = $_SESSION['email'];
          //getting this email using session
            $encpass = $password ;
            $update_pass = "UPDATE tblusers SET code = $code, Password = '$encpass' WHERE EmailId = '$email';";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
//if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }



/*if (mysqli_query($con)) {
	$c=true;
  echo "New record created successfully";
} else {
  echo "Error: " .  $insert_data . "<br>" . mysqli_error($con);
  $c=false;
}
mysqli_close($con);

if ($c) {
	echo "Form submitted successfully";
	$template_file="./welcome.php";
$to=$_POST['emailid'];
$subject='Registration successful';
$headers ="From: Instinct Seekers";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if (file_exists($template_file))
{
	$message= file_get_contents($template_file);
}
	else{
		die ("Unable to locate your template file");
	}

if (mail($to, $subject, $message,$headers)) {
	echo "sent success";
}
else{
	echo "failed";
}
}*/



