
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Imasha Car Rental || Admin Login</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="js/package/dist/sweetalert2.all.js"></script>
     
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>
<body class="bg2  bg" >
	<img src="img/sky.jpg" class="bg1">
	
	<div class="box">
	<form name="form1" method="POST">
	<h1>Login</h1>
	   <div class="error-text"></div>
	<h4>Email</h4>
	  <div class="validate">
    <label for="Tooltips" class="error"></label>
	<input type="text" name="inputemail" id="inputemail" required="required" onkeydown ="javascript:ValidateEmail(document.form1.inputemail)"
	oninput ="javascript:ValidateEmail(document.form1.inputemail)"
	onkeyup ="javascript:ValidateEmail(document.form1.inputemail)"><br>
	<span id="text"></span>
	<h4>Password</h4>
	<input type="password" name="pass" id="pass" required="required">


	<br><br>
	<input type="submit" name="login" value="Login" >

</form>
</div>

</div>
</div>


<script type="text/javascript">
function ValidateEmail()
{
	var text=document.getElementById("text");
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

if (inputemail.value == "") {
	text.innerHTML = "";

}
else if(inputemail.value.match(mailformat))
{
text.innerHTML = "Your Emil Address is Valid.";
text.style.color="#00ff00";
document.form1.inputemail.focus();
}
else
{
text.innerHTML = "Your Emil Address is Invalid.";
text.style.color="#ff0000";
document.form1.inputemail.focus();
}

}
</script>

</body>
</html>

<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['inputemail'];
$password=md5($_POST['pass']);
$sql ="SELECT Email,Password FROM user WHERE Email=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['inputemail'];
 
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
 
}
else{

  echo "<script>Swal.fire('Email or Password does not match!','Please Enter Correct one','error') ;</script>";

}

 
}

?>