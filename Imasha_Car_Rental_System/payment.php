<?php 
           session_start(); 
           include('include/config.php');
            error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imasha_car_rental";

$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$vhid=$_SESSION['vhid'];

$fromdate=$_SESSION['fromdate'];

$todate=$_SESSION['todate'];

$useremail=$_SESSION['login'];

$charge=$_SESSION['charging'];
 //print_r($charge);  
$status=0;

 $date1=$fromdate;
   $date2=$todate;
  function dateDiff($date1, $date2) 
  {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
  }
  $dateDiff= dateDiff($date1, $date2);
  $_SESSION['dateDiff']=$dateDiff; 
 // print_r($dateDiff);

  $_SESSION['fromdate']=$fromdate; 
  $_SESSION['todate']=$todate; 

 

/*print_r($fromdate);
print_r($todate);
print_r($useremail);
print_r($status);
print_r($vhid);*/
if($charge=="day"){

             $payable =($dateDiff * $_SESSION['PricePerDay']);
          $adpayable =($payable/2);
          $far=$_SESSION['PricePerDay'];
          $arrears=$payable-$adpayable;
        //  print_r($_SESSION['PricePerDay']);
        //  print_r($payable); 
          //print_r($charge);  
         // print_r($adpayable);  
        //  print_r($vhid);  
        //  print_r($fromdate);  
        //   print_r($todate);  
        //    print_r($useremail);  
        }
 //print_r($_SESSION); 

 else if($charge=="km"){
   $far=$_SESSION['PricePerKM'];
  $adpayable =5000;
  $payable="After Car returnt and Calculate the amount";
$arrears="After Car returnt and Calculate the amount";
  //print_r($charge);  
  //print_r($adpayable);  
 }
// print_r($charge);  
// print_r($adpayable);  
//print_r($far);  
$_SESSION['payable']=$payable;
$_SESSION['adpayable']=$adpayable;
$_SESSION['arrears']=$arrears;


if(isset($_POST['submit']))
  {
$cardnum=$_POST['cardNumber'];
$cv=$_POST['cv'];
$exdate=$_POST['exdate'];


$sql="INSERT INTO `booking` (`Booking_id`, `UserEmail`, `Car_id`, `FromDate`, `ToDate`,`far`, `charge_type`,  `no_of_days`,`advance`, `arrears`, `total_amount`, `Status`, `PostingDate`) VALUES ('', '$useremail', '$vhid', '$fromdate', '$todate','$far', '$charge','$dateDiff', '$adpayable', '$arrears', '$payable', '$status', current_timestamp());";

$sql1="update car set car_availability='no' where Car_id='$vhid'";
$query = $con->prepare($sql1);
$query->execute();
if (mysqli_query($con,$sql )) {
 $_SESSION['advance']=$adpayable; 
header('location: invoice.php');
  print_r($_SESSION['dateDiff']);
}
}


    ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Imasha Car Rental | Payments details</title>
    <style>
        body { margin-top:20px; }
        .panel-title {display: inline;font-weight: bold;}
        .checkbox.pull-right { margin: 0; }
        .pl-ziro { padding-left: 0px; }
        .payment{
            position: absolute;  
            left: 50%;
            top: 50%;   
            transform: translate(-10%, -50%);            
            padding: 10px;  
        }

    </style>   
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Imasha Car Rental | Payments details0</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">


        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  
</head>
<body>
      <?php include('include/header.php');?>
      <section class="listing-detail">
 
    <div class="row">
      <div class="col-xs-12 col-md-4" style="left: 430px;/*! border-color: #0d4d37; */">
      <ul class="nav nav-pills nav-stacked" style="background: #00b1f7;color: white;border-radius: 3px;">
               <li style="/*! background-color: blue; */font-size: 24px;/*! text-align: center; */margin-left: 110px;">
                <span class="badge pull-right" style="width: 80px;height: 25px;"><span class="glyphicon ">Rs.</span><?php echo $adpayable; ?></span> Advance Payment</a>
                </li>
            </ul>
            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" />
                            Remember
                        </label>
                    </div>
                </div>

                <div class="panel-body">
                    <form role="form" method="POST">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" name="cardNumber" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                               
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="date" name="exdate" class="form-control" id="expityYear" required style="width: 146px;left: -10px;margin-left: -16px;"/></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right" style="left: -65px;">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" name="cv" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
<br>
<br>
                        <input class="btn btn-success  btn-block" type="submit" name="submit" value="Pay">
                    </div>
                    </form>
                </div>
            </div>
            
            <br/>
          
        </div>
    </div>


</section>
<!--Footer -->

<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Footer -->
<?php include('include/footer.php');?>
<!-- /Footer--> 

<!--Login-Form -->
<?php include('include/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('include/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('include/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
    </body>
</html>




