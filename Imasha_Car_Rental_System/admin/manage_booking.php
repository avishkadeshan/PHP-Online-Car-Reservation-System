<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE booking SET Status=:status WHERE  Booking_id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$sqll = "SELECT UserEmail from  booking where Booking_id=:eid";
$queryy = $dbh -> prepare($sqll);
$queryy-> bindParam(':eid',$eid, PDO::PARAM_STR);
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

 $subject = "Booking Cancelled";
            $message = "Your Booking is Cancelled.Please Contact Us ask more details about that..Thank you.";
            $sender ="From: Imasha Cabs & Tourse";
            $sender.= "MIME-Version: 1.0\r\n";
            $email=$email1;
            if(mail($email, $subject, $message, $sender)){ 
         
              echo "<script type='text/javascript'> document.location = 'manage_booking.php'; </script>";
              
                exit();
            }else{
              //echo "Failed while sending code!";
              echo "<script>alert('Failed while sending code!');</script>";
               // $errors['otp-error'] = "Failed while sending code!";
            }


$msg="Booking Successfully Cancelled";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE booking SET Status=:status WHERE  Booking_id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$sqll = "SELECT UserEmail from  booking where Booking_id=:aeid";
$queryy = $dbh -> prepare($sqll);
$queryy-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
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

 $subject = "Booking Confirmed";
            $message = "Your Booking is Confirmed.Your Booking id is $aeid";
            $sender ="From: Imasha Cabs & Tourse";
            $sender.= "MIME-Version: 1.0\r\n";
            $email=$email1;
            if(mail($email, $subject, $message, $sender)){
              echo "<script type='text/javascript'> document.location = 'manage_booking.php'; </script>";
            
                exit();
            }else{
              //echo "Failed while sending code!";
              echo "<script>alert('Failed while sending code!');</script>";
               // $errors['otp-error'] = "Failed while sending code!";
            }



$msg="Booking Successfully Confirmed";
}


//if(isset($_REQUEST['rid']))
	//{
//$rid=intval($_GET['rid']);
//$status=3;

//$sql = "UPDATE booking SET Status=:status WHERE  Booking_id=:rid";
//$query = $dbh->prepare($sql);
//$query -> bindParam(':status',$status, PDO::PARAM_STR);
//$query-> bindParam(':rid',$rid, PDO::PARAM_STR);
//$query -> execute();

//check another bookings
//$sqlll = "SELECT Status from  booking where Status='0' or Status='1'";
//$query1 = $dbh -> prepare($sqlll);
//$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
//$query1->execute();
//$results=$query1->fetchAll(PDO::FETCH_OBJ);
//if($query1->rowCount() > 0)
//{
//foreach($results as $result)
//{	
//$status=($result->Status);
//}
//}
//else
//{
//$sqlll = "SELECT Car_id from  booking where Booking_id=:rid";
//$query1 = $dbh -> prepare($sqlll);
//$query1 -> bindParam(':rid',$rid, PDO::PARAM_STR);
//$query1->execute();
//$results=$query1->fetchAll(PDO::FETCH_OBJ);
//if($query1->rowCount() > 0)
//{
//foreach($results as $result)
//{	
//$carid=($result->Car_id);

//}
//}

//$availability="yes";
//$sqll = "UPDATE car SET car_availability=:availability WHERE  Car_id=:carid";
//$query2 = $dbh->prepare($sqll);
//$query2 -> bindParam(':availability',$availability, PDO::PARAM_STR);
//$query2-> bindParam(':carid',$carid, PDO::PARAM_STR);
//$query2 -> execute();
//}

//$msg="Booking Successfully Return";
//}


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
font-family: initial;">Manage Bookings</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
					<div class="scrollit">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">

									<thead >

										<tr>
										<th>#</th>
										<th>Booking ID</th>
											<th>Name</th>
											<th>Vehicle</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Message</th>
											<th>Far</th>
											<th>Charge Type</th>
											<th>Distance</th>
											<th>No Of Days</th>
											<th>advance</th>
											<th>arrears</th>
											<th>Total Amount</th>
											<th>Status</th>
											<th>Booking date</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>

<!-- Manage booking php sql -->
								
									<?php $sql = "SELECT user.FName,brands.BrandName,car.CarName,booking.Booking_id,booking.FromDate,booking.ToDate,booking.Message,booking.far,booking.charge_type,booking.distance,booking.no_of_days,booking.advance,booking.arrears,booking.total_amount,booking.Car_id as vid,booking.Status,booking.PostingDate,booking.Booking_id  from booking join car on car.Car_id=booking.Car_id join user on user.Email=booking.UserEmail join brands on car.Brand_id=brands.Brand_id  ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->Booking_id);?></td>
											<td><?php echo htmlentities($result->FName);?></td>
											<td><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->CarName);?></td>
											<td><?php echo htmlentities($result->FromDate);?></td>
											<td><?php echo htmlentities($result->ToDate);?></td>
											<td><?php echo htmlentities($result->message);?></td>
											<td><?php echo htmlentities($result->far);?></td>
											<td><?php echo htmlentities($result->charge_type);?></td>
											<td><?php echo htmlentities($result->distance);?></td>
											<td><?php echo htmlentities($result->no_of_days);?></td>
											<td><?php echo htmlentities($result->advance);?></td>
											<td><?php echo htmlentities($result->arrears);?></td>
											<td><?php echo htmlentities($result->total_amount);?></td>
											<td><?php 
if($result->Status==0)
{
echo htmlentities('Not Confirmed yet');
} else if ($result->Status==1) {
echo htmlentities('Confirmed');
}else if($result->Status==3){
echo htmlentities('Return')	;
}
 else{
 	echo htmlentities('Cancelled');
 }
										?></td>
											<td><?php echo htmlentities($result->PostingDate);?></td>
										<td><a style="color: blue;" href="manage_booking.php?aeid=<?php echo htmlentities($result->Booking_id);?>" onclick="return confirm('Do you really want to Accept this Order')"> Accept</a> /

<a style="color: red;" href="manage_booking.php?eid=<?php echo htmlentities($result->Booking_id);?>" onclick="return confirm('Do you really want to Reject this Order')"> Reject</a>

 / <a class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal" style="color: green;" href="return.php?rid=<?php echo htmlentities($result->Booking_id);?>"  onclick="return confirm('Do you really want to Return this Booking')"> Return</a>
</td>

										</tr>

										<?php $cnt=$cnt+1; 
$chargrtype=($result->charge_type);
$_SESSION['chargetype']=$chargrtype;
									 }} ?>	
										
									</tbody>
								</table>
</div>
						

							</div>
						</div>

					

					</div>
				</div>

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
	
	
</body>
</html>
<?php } ?>