<?php 
           session_start();
            include('include/config.php');
            error_reporting(0);
           //print_r($_SESSION);  
$payable=$_SESSION['payable'];
$adpayable=$_SESSION['adpayable'];
$arrears=$_SESSION['arrears'];

    ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Imasha Car Rental | Invoice</title>
    <style>
        .text-danger strong {
            color: #9f181c;
        }
        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }
        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }
        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }
        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }
        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }
        .receipt-main thead th {
            color:#fff;
        }
        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }
        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }
        .receipt-right p i {
            text-align: center;
            width: 18px;
        }
        .receipt-main td {
            padding: 9px 20px !important;
        }
        .receipt-main th {
            padding: 13px 20px !important;
        }
        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }
        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }   
        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }
        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }
        .receipt-header-mid {
            margin: 05px 0;
            overflow: hidden;
        }
        
        #container {
            background-color: #dcdcdc;
        }

    </style>   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">

<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
       
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
  
</head>
<body>
    <?php include('include/header.php');?>
 <div class="container">
    <div class="row">
        
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="receipt-header">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">
                            <img class="img-responsive" alt="logo" src="assets/images/imasha car rent logof.png" style="width: 100px; ;">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <h5>Imasha Cabs & Car Renter</h5>
                            <p>033-4931931     <i class="fa fa-phone"></i></p>
                            <p>cabsimasha@gmail.com <i class="fa fa-envelope-o"></i></p>
                            <p>Sri Lanka<i class="fa fa-location-arrow"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="receipt-header receipt-header-mid">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">

                            <p><b>Username :</b> <?php echo $_SESSION['fname'] ?><?php echo " " ?><?php echo $_SESSION['lname'] ?></p>
                            <p><b>Email Id :</b> <?php echo $_SESSION['email'] ?></p>
                            <p><b>Address:</b> <?php echo $_SESSION['address'] ?><?php echo ", " ?><?php echo $_SESSION['city'] ?><?php echo ", " ?><?php echo $_SESSION['country'] ?></p>
                            
                          

                
                
                                
                            
                        </div>
                    </div>
                    <div>
                        <div class="receipt-left">
                            <h1>Receipt</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-listing-content">
      <div class="product-listing-m gray-bg" style="width: 400px;margin-left: -30px;height: 170px;">
          <div class="product-listing-img" style="height: 170px;"><img src="admin/img/vehicleimages/<?php echo htmlentities($_SESSION['Vimage1']);?>" class="img-responsive" alt="Image" style="height: 170px;"/> </a> 
          </div>
            <h5><a href="vehical-details.php?vhid=<?php echo htmlentities($_SESSION['brndid']);?>"><?php echo htmlentities($_SESSION['BrandName']);?> , <?php echo htmlentities($_SESSION['VehiclesTitle']);?></a></h5>
            <p class="list-price" style="margin-bottom: 5px;">Name Plate : <?php echo htmlentities($_SESSION['nameplate']);?></p>
            <ul>
            <p class="list-price">Rs.<?php echo htmlentities($_SESSION['PricePerDay']);?>/- Per Day</p>
            <ul>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($_SESSION['SeatingCapacity']);?> seats</li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($_SESSION['ModelYear']);?> model</li>
              <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($_SESSION['FuelType']);?></li>
            </ul>
            <!--<a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn">Book /View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>-->
          </div>
      </div>
             
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ORDER SUMMARY</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
               </tr>
                        
                        
                        <tr>
                            <td class="text-right">
                                <p>
                                <strong>From:</strong>
                            </p>
                            <p>
                                <strong>To:</strong>
                            </p>
                            <p>
                                <strong>Total Days:</strong>
                            </p>
                          
                            </td>
                            <td>
                            <p>
                              <strong><?php echo $_SESSION['fromdate'] ?></strong>
                            </p>
                            <p>
                               <strong><?php echo $_SESSION['todate'] ?></strong>
                            </p>
                            <p>
                              <strong><?php echo $_SESSION['dateDiff'] ?></strong>
                            </p>
                            </td>

                            <td>
                            
                            
                            </td>
                        </tr>
                        <tr>
                           
                            <td class="text-right">
                              <p>
                                <strong>Total Amount:</strong>
                            </p>

                            
                                </td>
                            <td></td>
                            <td >
                            <p>
                                <strong>Rs.</i> <?php echo $payable; ?>/-</strong>
                            </p>
                           
                           
                        </td>
                    </tr>
                    <tr>
                       <td class="text-right">
                             
                            <p>
                                <strong>Advance:</strong>
                            </p>
                                </td>
                            <td></td>
                            <td>
                           
                            <p>
                                <strong>Rs. <?php echo $adpayable;?>/-</strong>
                            </p>
                        </td>
                       
                        </tr>
                         <tr>
                        <td class="text-right text-danger"> <p>
                                <strong>Arrears:</strong>
                            </p></td>
                        <td></td>
                        <td class="text-left text-danger">
                             
                            <p>
                                <strong>Rs.</i> <?php echo $arrears; ?>/-</strong>
                            </p>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <p><b>Date :</b><?php echo date("d/m/Y"); ?></p>
                            <p><b>Time :</b><?php date_default_timezone_set("Asia/Calcutta");
                            echo date("h:i:sa"); ?></p>
                            <h5 style="color: rgb(140, 140, 140);">Thank you Have a great day!</h5> 
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h1>Signature</h1>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>    
    </div>

</div>
<div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <p >Warning! <strong>Do not reload this page</strong> or the above display will be lost. If you want a hardcopy of this page, please print it now.</p>
        </div>

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

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </body>
</html>




