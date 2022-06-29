<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


$rid=$_GET['rid'];
$sqlll = "SELECT far,charge_type,no_of_days,advance,arrears,total_amount from  booking where Booking_id=:rid";
$query1 = $dbh -> prepare($sqlll);
$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result)
{	
	$far=($result->far);
	$advance=($result->advance);
	$arrears=($result->arrears);
	$total_amount=($result->total_amount);
$chargetype=($result->charge_type);
}
}


if(isset($_POST['kmsubmit']))
	{
$distance=$_POST['distance'];
$additional=$_POST['additional'];
$arrear=$_POST['arrears'];
$totamount=$_POST['total'];


$status=3;

$sql = "UPDATE booking SET distance=:distance,arrears=:arrear,additional=:additional,total_amount=:totamount, Status=:status WHERE  Booking_id=:rid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':rid',$rid, PDO::PARAM_STR);
$query -> bindParam(':distance',$distance, PDO::PARAM_STR);
$query-> bindParam(':arrear',$arrear, PDO::PARAM_STR);
$query -> bindParam(':additional',$additional, PDO::PARAM_STR);
$query-> bindParam(':totamount',$totamount, PDO::PARAM_STR);
$query -> execute();

//check another bookings
$sqlll = "SELECT Status from  booking where Status='0' or Status='1'";
$query1 = $dbh -> prepare($sqlll);
//$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result)
{	
$status=($result->Status);
}
}
else
{
$sqlll = "SELECT Car_id from  booking where Booking_id=:rid";
$query1 = $dbh -> prepare($sqlll);
$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result)
{	
$carid=($result->Car_id);

}
}

$availability="yes";
$sqll = "UPDATE car SET car_availability=:availability WHERE  Car_id=:carid";
$query2 = $dbh->prepare($sqll);
$query2 -> bindParam(':availability',$availability, PDO::PARAM_STR);
$query2-> bindParam(':carid',$carid, PDO::PARAM_STR);
$query2 -> execute();
}
//delete booking table details and sent to pre booked table
$sqlll = "SELECT * from  booking where Booking_id=:rid";
$query1 = $dbh -> prepare($sqlll);
$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result)
{
$bookingid=($result->Booking_id);
$useremail=($result->UserEmail);
$carid=($result->Car_id);
$from=($result->FromDate);
$to=($result->ToDate);
$message=($result->Message);
$farr=($result->far);
$chargetypee=($result->charge_type);
$distancee=($result->distance);
$noofday=($result->no_of_days);
$advancee=($result->advance);
$arrearss=($result->arrears);
$additionall=($result->additional);
$totalamountt=($result->total_amount);
$statuss=($result->Status);
$bookingdate=($result->PostingDate);


$sql2="INSERT INTO  previous_booked(Booking_id,UserEmail,Car_id,FromDate,ToDate,Message,far,charge_type,distance,no_of_days,advance,arrears,additional,total_amount,Status,Booking_date) VALUES(:bookingid,:useremail,:carid,:fromd,:tod,:message,:farr,:chargetypee,:distancee,:noofday,:advancee,:arrearss,:additionall,:totalamountt,:statuss,:bookingdate)";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query2->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query2->bindParam(':carid',$carid,PDO::PARAM_STR);
$query2->bindParam(':fromd',$from,PDO::PARAM_STR);
$query2->bindParam(':tod',$to,PDO::PARAM_STR);
$query2->bindParam(':message',$message,PDO::PARAM_STR);
$query2->bindParam(':farr',$farr,PDO::PARAM_STR);
$query2->bindParam(':chargetypee',$chargetypee,PDO::PARAM_STR);
$query2->bindParam(':distancee',$distancee,PDO::PARAM_STR);
$query2->bindParam(':noofday',$noofday,PDO::PARAM_STR);
$query2->bindParam(':advancee',$advancee,PDO::PARAM_STR);
$query2->bindParam(':arrearss',$arrearss,PDO::PARAM_STR);
$query2->bindParam(':additionall',$additionall,PDO::PARAM_STR);
$query2->bindParam(':totalamountt',$totalamountt,PDO::PARAM_STR);
$query2->bindParam(':statuss',$statuss,PDO::PARAM_STR);
$query2->bindParam(':bookingdate',$bookingdate,PDO::PARAM_STR);
$query2->execute();

//sent email
$sqll = "SELECT UserEmail from  booking where Booking_id=:rid";
$queryy = $dbh -> prepare($sqll);
$queryy-> bindParam(':rid',$rid, PDO::PARAM_STR);
$queryy->execute();
$resultss=$queryy->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($queryy->rowCount() > 0)
{
foreach($resultss as $resultt)
{ 
  $email1 =  $resultt->UserEmail;
 
}
} 

 $subject = "Booking Returned";
            $message = "Your Booking is Returned is Succesfull !! Thank You Join Us..";
            $sender ="From: Imasha Cabs & Tourse";
            $sender.= "MIME-Version: 1.0\r\n";
            $email=$email1;
            if(mail($email, $subject, $message, $sender)){
              echo "<script type='text/javascript'> document.location = 'manage_booking.php'; </script>";
            
               
            }else{
              //echo "Failed while sending code!";
              echo "<script>alert('Failed while sending code!');</script>";
               // $errors['otp-error'] = "Failed while sending code!";
            }


$sql4 = "delete from booking WHERE Booking_id=:rid";
$query4 = $dbh->prepare($sql4);
$query4 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query4 -> execute();
}
}



$msg="Booking Successfully Return";
}

if(isset($_POST['daysubmit']))
	{
$additional1=$_POST['additional1'];
$totamount1=$_POST['total1'];


$status=3;

$sql = "UPDATE booking SET additional=:additional1,total_amount=:totamount1, Status=:status WHERE  Booking_id=:rid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':rid',$rid, PDO::PARAM_STR);
$query -> bindParam(':additional1',$additional1, PDO::PARAM_STR);
$query-> bindParam(':totamount1',$totamount1, PDO::PARAM_STR);
$query -> execute();

//check another bookings
$sqlll2 = "SELECT Car_id from  booking where Booking_id=:rid";
$query12 = $dbh -> prepare($sqlll2);
$query12 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query12->execute();
$results2=$query12->fetchAll(PDO::FETCH_OBJ);
if($query12->rowCount() > 0)
{
foreach($results2 as $result2)
{	
$carid=($result2->Car_id);

}
}


$sqlll = "SELECT Status from  booking where Status='0' or Status='1' and Car_id=:carid";
$query1 = $dbh -> prepare($sqlll);
$query1 -> bindParam(':carid',$carid, PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result)
{	
$status=($result->Status);
}
}
else
{
$sqlll = "SELECT Car_id from  booking where Booking_id=:rid";
$query1 = $dbh -> prepare($sqlll);
$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result)
{	
$carid=($result->Car_id);

}
}

$availability="yes";
$sqll = "UPDATE car SET car_availability=:availability WHERE  Car_id=:carid";
$query2 = $dbh->prepare($sqll);
$query2 -> bindParam(':availability',$availability, PDO::PARAM_STR);
$query2-> bindParam(':carid',$carid, PDO::PARAM_STR);
$query2 -> execute();
}
//delete booking table details and sent to pre booked table
$sqlll = "SELECT * from  booking where Booking_id=:rid";
$query1 = $dbh -> prepare($sqlll);
$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query1->execute();
$results=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount() > 0)
{
foreach($results as $result)
{
$bookingid=($result->Booking_id);
$useremail=($result->UserEmail);
$carid=($result->Car_id);
$from=($result->FromDate);
$to=($result->ToDate);
$message=($result->Message);
$farr=($result->far);
$chargetypee=($result->charge_type);
$distancee=($result->distance);
$noofday=($result->no_of_days);
$advancee=($result->advance);
$arrearss=($result->arrears);
$additionall=($result->additional);
$totalamountt=($result->total_amount);
$statuss=($result->Status);
$bookingdate=($result->PostingDate);


$sql2="INSERT INTO  previous_booked(Booking_id,UserEmail,Car_id,FromDate,ToDate,Message,far,charge_type,distance,no_of_days,advance,arrears,additional,total_amount,Status,Booking_date) VALUES(:bookingid,:useremail,:carid,:fromd,:tod,:message,:farr,:chargetypee,:distancee,:noofday,:advancee,:arrearss,:additionall,:totalamountt,:statuss,:bookingdate)";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query2->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query2->bindParam(':carid',$carid,PDO::PARAM_STR);
$query2->bindParam(':fromd',$from,PDO::PARAM_STR);
$query2->bindParam(':tod',$to,PDO::PARAM_STR);
$query2->bindParam(':message',$message,PDO::PARAM_STR);
$query2->bindParam(':farr',$farr,PDO::PARAM_STR);
$query2->bindParam(':chargetypee',$chargetypee,PDO::PARAM_STR);
$query2->bindParam(':distancee',$distancee,PDO::PARAM_STR);
$query2->bindParam(':noofday',$noofday,PDO::PARAM_STR);
$query2->bindParam(':advancee',$advancee,PDO::PARAM_STR);
$query2->bindParam(':arrearss',$arrearss,PDO::PARAM_STR);
$query2->bindParam(':additionall',$additionall,PDO::PARAM_STR);
$query2->bindParam(':totalamountt',$totalamountt,PDO::PARAM_STR);
$query2->bindParam(':statuss',$statuss,PDO::PARAM_STR);
$query2->bindParam(':bookingdate',$bookingdate,PDO::PARAM_STR);
$query2->execute();

//sent email
$sqll = "SELECT UserEmail from  booking where Booking_id=:rid";
$queryy = $dbh -> prepare($sqll);
$queryy-> bindParam(':rid',$rid, PDO::PARAM_STR);
$queryy->execute();
$resultss=$queryy->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($queryy->rowCount() > 0)
{
foreach($resultss as $resultt)
{ 
  $email1 =  $resultt->UserEmail;
 
}
} 

 $subject = "Booking Returned";
            $message = "Your Booking is Returned is Succesfull !! Thank You Join Us..";
            $sender ="From: Imasha Cabs & Tourse";
            $sender.= "MIME-Version: 1.0\r\n";
            $email=$email1;
            if(mail($email, $subject, $message, $sender)){
              echo "<script type='text/javascript'> document.location = 'manage_booking.php'; </script>";
            
                
            }else{
              //echo "Failed while sending code!";
              echo "<script>alert('Failed while sending code!');</script>";
               // $errors['otp-error'] = "Failed while sending code!";
            }



$sql4 = "delete from booking WHERE Booking_id=:rid";
$query4 = $dbh->prepare($sql4);
$query4 -> bindParam(':rid',$rid, PDO::PARAM_STR);
$query4 -> execute();
}
}

$msg="Booking Successfully Return";
}


if(isset($_POST['submit']))
  {	
$distance=$_POST['distance'];
$total=$far*$distance;
$arrear=$total-$advance;
}

if($chargetype=="km")
{

	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Imasha Car Rental System | Admin Manage-Booking</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">




</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">

<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title" style="background: linear-gradient(235deg,#ae0856,#1b51d0) fixed;
color: white;
font-size: 40px;
font-family: initial;">Return</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Return Per KM</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
			
					<form method="post" class="form-horizontal">
<div class="form-group">
<label class="col-sm-2 control-label">Far<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="far" id="far" class="form-control" value="<?php echo htmlentities($result->far);?>" readonly>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Advance<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="advance" id="advance" class="form-control" value="<?php echo htmlentities($result->advance);?>" readonly>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Distance(KM)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="distance" id="distance" class="form-control" value="0" onkeyup="calarrears()">
</div>
</div>
<p><?php print_r($chargetype);  ?></p>
<div class="form-group">
<label class="col-sm-2 control-label">Arrears<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="arrears" id="arrears" class="form-control" value="0" required readonly>
</div>
</div>	
<div class="form-group">
<label class="col-sm-2 control-label">Additional Charges<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="additional" id="additional" class="form-control" value="0" >
</div>	
<i class="fa fa-plus-circle" style="color: blue;font-size: 24px;margin-left: 2px ;margin-top: 10px;cursor: pointer;" onclick="caladditional()"></i> 
<i class="fa fa-minus-circle" style="color: blue;font-size: 24px;margin-left: 10px ;cursor: pointer;" onclick="deduction()"></i> 
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Total Charges<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="total" id="total" class="form-control" value="0" readonly>
</div>	
</div>
	<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary submit" name="kmsubmit" type="submit" >Return</button>
												</div>
											</div>	
</form>
<section style="margin-left: 600px;margin-top: -450px;">
<p>Total Arrearse Payment is Rs.
<input type="text" name="pay6" id="pay6" value="0" readonly style="width: 150px;"></p>
	<label>Enter Payment Amount:</label>
	<input type="Number" name="payment1" id="payment1" onkeyup="balancee()">
</section>

<section style="margin-left: 600px;background: #ee8d8d;/*! margin-top: -300px; */">
	<br>
	<h3 style="margin-left: 60px;/*! margin-top: 5px; */">Imasha Cabs & Tours</h3>
	<p style="margin-left: 225px;">Booking ID: <?php echo $rid; ?></p>
	<p style="margin-left: 20px;">Arrearss: <input type="text" name="pay5" id="pay5" value="0" readonly style="margin-left: 62px;"></p>
	<p style="margin-left: 20px;">Payment: <input type="text" name="payment5" id="payment5" value="0" readonly style="margin-left: 60px;"></p>
	<p style="margin-left: 20px;">Balance: <input type="text" name="balance1" id="balance1" value="0" readonly style="margin-left: 66px;"></p>
	<p style="margin-left: 20px;">Total Payment: <input type="text" name="total5" id="total5" value="0" readonly style="margin-left: 27px;"></p>
	<p style="margin-left: 110px;">Payment Succesfull!!!</p>
	<br>
</section>
<button style="margin-left: 420px;margin-top: 10px;">Print</button>
							</div>
						</div>

					

					</div>
				</div>
<a href="manage_booking.php"><button>Back</button></a>
			</div>
		</div>
	</div>
	
							

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script type="text/javascript">

			function calarrears(){
var far = document.getElementById('far').value;
var advance = document.getElementById('advance').value;
var distance = document.getElementById('distance').value;
var arrears=0;
var tot=0;
			
				arrears = Number(distance) * Number(far)-Number(advance);
				document.getElementById('arrears').value = arrears;
                document.getElementById('pay5').value = arrears;
                document.getElementById('pay6').value=arrears;


				tot=Number(arrears)+Number(advance);
				document.getElementById('total').value=tot;
                document.getElementById('total5').value=tot;
			}
           
    </script>
 
	<script type="text/javascript">

			function caladditional(){
var tot1 = document.getElementById('total').value;
var additional1 = document.getElementById('additional').value;
var total=0;
			
				total = Number(tot1) + Number(additional1);
				document.getElementById('total').value = total;
                document.getElementById('total5').value = total;

            var arr = document.getElementById('pay6').value;
			var add = document.getElementById('additional').value;
			var pay =0;

                pay=Number(arr)+Number(add);
	  		document.getElementById('pay6').value=pay;
        	document.getElementById('pay5').value=pay;
			}
           
    </script>

    <script type="text/javascript">

			function deduction(){
var tot1 = document.getElementById('total').value;
var additional1 = document.getElementById('additional').value;
var total=0;
			
				total = Number(tot1) - Number(additional1);
				document.getElementById('total').value = total;
                document.getElementById('total5').value = total;

                var arr = document.getElementById('pay6').value;
			var add = document.getElementById('additional').value;
			var pay =0;

                pay=Number(arr)-Number(add);
			document.getElementById('pay6').value=pay;
	document.getElementById('pay5').value=pay;
			}
           
    </script>

<script type="text/javascript">

			function balancee(){
var pay2 = document.getElementById('payment1').value;
var tot2 = document.getElementById('pay6').value;
var balance=0;
			
				balance = Number(pay2) - Number(tot2);
				document.getElementById('balance1').value = balance;

document.getElementById('payment5').value=pay2;
			}
           
    </script>

</body>
</html>
<?php }else if($chargetype=="day")
{
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Imasha Car Rental System | Admin Manage-Booking</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">




</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">

<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title" style="background: linear-gradient(235deg,#ae0856,#1b51d0) fixed;
color: white;
font-size: 40px;
font-family: initial;">Return</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Return Per Day</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
			
					<form method="post" class="form-horizontal">
<div class="form-group">
<label class="col-sm-2 control-label">Far<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="far" id="far" class="form-control" value="<?php echo htmlentities($result->far);?>" readonly>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Days<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="far" id="far" class="form-control" value="<?php echo htmlentities($result->no_of_days);?>" readonly>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Advance<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="advance" id="advance" class="form-control" value="<?php echo htmlentities($result->advance);?>" readonly>
</div>
</div>

<p><?php print_r($chargetype);  ?></p>
<div class="form-group">
<label class="col-sm-2 control-label">Arrears<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="arrears" id="arrears"  class="form-control" value="<?php echo htmlentities($result->arrears);?>" required readonly>
</div>
</div>	
<div class="form-group">
<label class="col-sm-2 control-label">Additional Charges<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="Number" name="additional1" id="additional1" class="form-control" value="0" >
</div>	
<i class="fa fa-plus-circle" style="color: blue;font-size: 24px;margin-left: 2px ;margin-top: 10px;cursor: pointer;" onclick="caladditional()"></i> 
<i class="fa fa-minus-circle" style="color: blue;font-size: 24px;margin-left: 10px ;cursor: pointer;" onclick="deduction()"></i> 
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Total Charges<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="total1" id="total1" class="form-control" value="<?php echo htmlentities($result->total_amount);?>" readonly>
</div>	
</div>
	<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary submit" name="daysubmit" type="submit" >Return</button>
												</div>
											</div>	
</form>

<section style="margin-left: 600px;margin-top: -450px;">
<p>Total Arrearse Payment is Rs.
<input type="text" name="pay" id="pay" value="<?php echo htmlentities($result->arrears);?>" readonly style="width: 150px;"></p>
	<label>Enter Payment Amount:</label>
	<input type="Number" name="payment" id="payment" onkeyup="balancee()">
</section>
<div id="printableArea">
<section style="margin-left: 600px;background: #ee8d8d;/*! margin-top: -300px; */">
	<br>
	<h3 style="margin-left: 60px;/*! margin-top: 5px; */">Imasha Cabs & Tours</h3>
	<p style="margin-left: 225px;">Booking ID: <?php echo $rid; ?></p>
	<p style="margin-left: 20px;">Arrearss : <input type="text" name="pay1" id="pay1" value="<?php echo htmlentities($result->arrears);?>" readonly style="margin-left: 60px;"></p>
	<p style="margin-left: 20px;">Payment: <input type="text" name="payment2" id="payment2" value="0" readonly style="margin-left: 61px;"></p>
	<p style="margin-left: 20px;">Balance: <input type="text" name="balance" id="balance" value="0" readonly style="margin-left: 66px;"></p>
	<p style="margin-left: 20px;">Total Payment: <input type="text" name="total2" id="total2" value="<?php echo htmlentities($result->total_amount);?>" readonly style="margin-left: 27px;"></p>
	<p style="margin-left: 110px;">Payment Succesfull!!!</p>
	<br>
</section>
</div>
<button style="margin-left: 800px;margin-top: 10px;" onclick="printPageArea('printableArea')">Print</button>
							</div>
						</div>

					

					</div>
				</div>
<a href="manage_booking.php"><button>Back</button></a>
			</div>
		</div>
	</div>
	
							

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	

 
	<script type="text/javascript">

			function caladditional(){
var tot1 = document.getElementById('total1').value;
var additional1 = document.getElementById('additional1').value;
var total=0;
			
				total = Number(tot1) + Number(additional1);
				document.getElementById('total1').value = total;
				document.getElementById('total2').value = total;

           var arr = document.getElementById('pay').value;
			var add = document.getElementById('additional1').value;
			var pay =0;

			pay=Number(arr)+Number(add);
			document.getElementById('pay').value=pay;
	document.getElementById('pay1').value=pay;
			}
           
    </script>


	<script type="text/javascript">

			function deduction(){
var tot1 = document.getElementById('total1').value;
var additional1 = document.getElementById('additional1').value;
var total=0;
			
				total = Number(tot1) - Number(additional1);
				document.getElementById('total1').value = total;
				document.getElementById('total2').value = total;

            var arr = document.getElementById('pay').value;
			var add = document.getElementById('additional1').value;
			var pay =0;

			pay=Number(arr)-Number(add);
			document.getElementById('pay').value=pay;
	document.getElementById('pay1').value=pay;


			}
           
    </script>

<script type="text/javascript">

			function balancee(){
var pay2 = document.getElementById('payment').value;
var tot2 = document.getElementById('pay').value;
var balance=0;
			
				balance = Number(pay2) - Number(tot2);
				document.getElementById('balance').value = balance;
				
document.getElementById('payment2').value=pay2;

			}
           
    </script>

<script type="text/javascript">
function printPageArea(printableArea){
    var printContent = document.getElementById(printableArea);
    var WinPrint = window.open('', '', 'left=50,top=50,width=1000,height=400');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
</script>


</body>
</html>


<?php } } ?>