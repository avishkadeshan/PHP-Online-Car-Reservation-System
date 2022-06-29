<?php
session_start();
error_reporting(0);
include('include/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Imasha_Car_Rental | Page details</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/0acc6.css" type="text/css">
<link rel="stylesheet" href="assets/css/153a0.css" type="text/css">
<link rel="stylesheet" href="assets/css/685ba.css" type="text/css">
<link rel="stylesheet" href="assets/css/17599.css" type="text/css">
<link rel="stylesheet" href="assets/css/79a94.css" type="text/css">
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

        
<!--Header-->
<?php include('include/header.php');?>



                      <?php 
$pagetype=$_GET['type'];
$sql = "SELECT type,details,PageName from pages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>

<section class="page-header aboutus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1><?php   echo htmlentities($result->PageName); ?></h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li><?php   echo htmlentities($result->PageName); ?></li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>

<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">


      <h2><?php   echo htmlentities($result->PageName); ?></h2>
      <p><?php  echo $result->details; ?> </p>
<?php if($pagetype=="aboutus"){?>
       <div class="vc_row wpb_row vc_row-fluid space-top">
        <div class="wpb_column vc_column_container vc_col-sm-4 sc_layouts_column_icons_position_left">
          <div class="vc_column-inner">
          <div class="wpb_wrapper">
            <div class="vc_row wpb_row vc_inner vc_row-fluid box-about">
              <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left"><div class="vc_column-inner">
                <div class="wpb_wrapper">
                <div class="wpb_single_image wpb_content_element vc_align_left">
                  <figure class="wpb_wrapper vc_figure">
                  <div class="vc_single_image-wrapper   vc_box_border_grey">
                    <img alt="trust wh" title="trust wh" data-src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/trust-wh-50x50.png" class="vc_single_image-img  lazyloaded" src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/trust-wh-50x50.png" width="50" height="50">
                    <noscript>
                      <img class="vc_single_image-img " src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/trust-wh-50x50.png" width="50" height="50" alt="trust wh" title="trust wh" />
                    </noscript>
                  </div>
                  </figure>
                  </div>
                  <div class="vc_empty_space  height_tiny" style="height: 32px"><span class="vc_empty_space_inner">
                    
                  </span>
                </div>
                  <div class="wpb_text_column wpb_content_element wpb_animate_when_almost_visible wpb_fadeIn fadeIn wpb_start_animation animated">
                    <div class="wpb_wrapper">
                    <h3 class="m_title" style="text-align: left;">Trust and Reliability</h3>
                    <p style="text-align: left;font-size: 15px">Make an online booking with a deposit and be certain that a vehicle of your choice will be assigned to you on the requested date and time. No excuses. Period.</p>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wpb_column vc_column_container vc_col-sm-4 sc_layouts_column_icons_position_left"><div class="vc_column-inner">
      <div class="wpb_wrapper">
        <div class="vc_row wpb_row vc_inner vc_row-fluid box-about-2">
          <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left">
            <div class="vc_column-inner">
          <div class="wpb_wrapper">
          <div class="wpb_single_image wpb_content_element vc_align_left">
            <figure class="wpb_wrapper vc_figure">
            <div class="vc_single_image-wrapper   vc_box_border_grey">
              <img alt="conve wh" title="conve wh" data-src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/conve-wh-50x50.png" class="vc_single_image-img  lazyloaded" src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/conve-wh-50x50.png" width="50" height="50">
              <noscript>
                <img class="vc_single_image-img " src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/conve-wh-50x50.png" width="50" height="50" alt="conve wh" title="conve wh" />
              </noscript>
            </div>
          </figure>
        </div>
        <div class="vc_empty_space  height_tiny" style="height: 32px">
          <span class="vc_empty_space_inner">
            
          </span>
        </div>
        <div class="wpb_text_column wpb_content_element wpb_animate_when_almost_visible wpb_fadeInUp fadeInUp wpb_start_animation animated">
          <div class="wpb_wrapper"><h3 class="m_title" style="text-align: left;">Convenience</h3>
            <p style="text-align: left;font-size: 15px">When you pick up your vehicle, paperwork is kept to a minimum. Fill out the essentials and you are on your way. Hassle free to the max.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="wpb_column vc_column_container vc_col-sm-4 sc_layouts_column_icons_position_left">
  <div class="vc_column-inner">
  <div class="wpb_wrapper">
    <div class="vc_row wpb_row vc_inner vc_row-fluid box-about">
      <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left">
        <div class="vc_column-inner">
        <div class="wpb_wrapper">
          <div class="wpb_single_image wpb_content_element vc_align_left">
            <figure class="wpb_wrapper vc_figure">
            <div class="vc_single_image-wrapper   vc_box_border_grey">
              <img alt="safty wh" title="safty wh" data-src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/safty-wh-50x50.png" class="vc_single_image-img  lazyloaded" src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/safty-wh-50x50.png" width="50" height="50">
              <noscript>
                <img class="vc_single_image-img " src="https://www.rentalcarsrilanka.com/wp-content/uploads/2020/03/safty-wh-50x50.png" width="50" height="50" alt="safty wh" title="safty wh" />
              </noscript>
            </div>
          </figure>
        </div>
        <div class="vc_empty_space  height_tiny" style="height: 32px">
          <span class="vc_empty_space_inner">
            
          </span>
        </div>
        <div class="wpb_text_column wpb_content_element wpb_animate_when_almost_visible wpb_fadeIn fadeIn wpb_start_animation animated">
          <div class="wpb_wrapper">
            <h3 class="m_title" style="text-align: left;">Safety</h3><p style="text-align: left;font-size: 15px">Choose from our fleet of latest model Japanese vehicles with the best safety features. All Shineway rental car Sri Lanka vehicles are equipped with driver and passenger airbags, seatbelts for all passengers and side collision bars on the doors and much more.</p>
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
  <?php } ?>      




    </div>
   <?php } }?>
  </div>
</section>
<!-- /About-us--> 





<!--Footer -->
<?php include('include/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->
</html>