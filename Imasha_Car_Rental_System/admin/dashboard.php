<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
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
	
	<title>Imasha Car Rental System | Admin Dashboard</title>

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

	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@600;700&display=swap" rel="stylesheet">
</head>

<body >
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
font-family: initial;">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">




									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												
													<div class="stat-panel text-center" style="text-align: left;">
<?php 
$sql ="SELECT User_id from user where role_id='2' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
													<div class="stat-panel-number h1 " style="font-size: 50px;font-weight: bold;margin-top: -5px;"><?php echo htmlentities($regusers);?></div>
												<img src="img/user.png" style="width: 120px;height: 120px;margin-left: 90px;margin-top: -50px;">
													<div class="stat-panel-title text-uppercase" style="margin-top: -70px;margin-bottom: 50px;">Reg Users</div>

												</div>
											</div>
											<a href="reg_user.php" class="block-anchor panel-footer" style="background: #1980a8a6;border: none;text-align: center;">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center" style="text-align: left;">
													<?php 
$sql1 ="SELECT Car_id from car ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalvehicle=$query1->rowCount();
?>
													<div class="stat-panel-number h1 " style="font-size: 50px;font-weight: bold;margin-top: -5px;"><?php echo htmlentities($totalvehicle);?></div>
													<img src="img/dashcar.png" style="width: 120px;height: 120px;margin-left: 80px;margin-top: -50px;">
													<div class="stat-panel-title text-uppercase" style="margin-top: -70px;margin-bottom: 50px;">Vehicles</div>
												</div>
											</div>
											<a href="manage_vehicle.php" class="block-anchor panel-footer text-center"style="background: #08912494;border: none;text-align: center;">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center" style="text-align: left;">
<?php 
$sql2 ="SELECT Booking_id from booking ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>

													<div class="stat-panel-number h1 " style="font-size: 50px;font-weight: bold;margin-top: -5px;"><?php echo htmlentities($bookings);?></div>
													<img src="img/booking.png" style="width: 120px;height: 120px;margin-left: 80px;margin-top: -50px;">
													<div class="stat-panel-title text-uppercase" style="margin-top: -70px;margin-bottom: 50px;">Bookings</div>
												</div>
											</div>
											<a href="manage_booking.php" class="block-anchor panel-footer text-center"style="background: #a86919a6;border: none;text-align: center;">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center" style="text-align: left;">

													<?php 
$sql3 ="SELECT Brand_id from brands ";
$query3= $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$brands=$query3->rowCount();
?>												
													<div class="stat-panel-number h1 " style="font-size: 50px;font-weight: bold;margin-top: -5px;"><?php echo htmlentities($brands);?></div>
													<img src="img/brand.png" style="width: 120px;height: 120px;margin-left: 80px;margin-top: -50px;">
													<div class="stat-panel-title text-uppercase" style="margin-top: -70px;margin-bottom: 50px;">Brands</div>
												</div>
											</div>
											<a href="manage_brand.php" class="block-anchor panel-footer text-center" style="background: #a24b1b;border: none;text-align: center;">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
		



<div class="row">
					<div class="col-md-12">

						
						<div class="row">
							<div class="col-md-12">
								<div class="row">


									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center" style="text-align: left;">
<?php 
$sql4 ="SELECT Id from testimonial";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$testimonial=$query4->rowCount();
?>
													<div class="stat-panel-number h1 " style="font-size: 50px;font-weight: bold;margin-top: -5px;"><?php echo htmlentities($testimonial);?></div>
													<img src="img/testimonial.png" style="width: 100px;height: 120px;margin-left: 100px;margin-top: -50px;">
													<div class="stat-panel-title text-uppercase" style="margin-top: -70px;margin-bottom: 50px;">Testimonials</div>
												</div>
											</div>
											<a href="manage_testimonial.php" class="block-anchor panel-footer" style="background: #1980a8a6;border: none;text-align: center;">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center" style="text-align: left;">
<?php 
$sql4 ="SELECT Id from contactusquery";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$contactquery=$query4->rowCount();
?>
													<div class="stat-panel-number h1 " style="font-size: 50px;font-weight: bold;margin-top: -5px;"><?php echo htmlentities($contactquery);?></div>
													<img src="img/query.png" style="width: 120px;height: 120px;margin-left: 80px;margin-top: -50px;">
													<div class="stat-panel-title text-uppercase" style="margin-top: -70px;margin-bottom: 50px;">Query</div>
												</div>
											</div>
											<a href="contact_query.php" class="block-anchor panel-footer" style="background: #08912494;border: none;text-align: center;">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									


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