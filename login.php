<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
define("_VALID_PHP", true);
require_once ("init.php");
$cid = '';
if(isset($_GET['cid'])){
$cid 		=  $_GET['cid'];
$weight 		=  $_GET['weight'];
$lenght 		=  $_GET['length'];
$width 		=  $_GET['width'];
$height 		=  $_GET['height'];
$type 		=  $_GET['type'];
$scountry 	=  $_GET['scountry'];
}
if ($user->logged_in) redirect_to("account.php");


if (isset($_POST['dosubmit']))
   : $result = $user->login($_POST['username'], $_POST['password']);

/* Login Successful */
if ($result && !empty($cid))
  :redirect_to("dashboard/bookings.php?id=$cid&weight=$weight&length=$lenght&height=$height&width=$width&type=$type&scountry=$scountry");
else:
    redirect_to("dashboard/index.php");
endif;
endif;




// if (isset($_POST['dosubmit'])):
//     $result = $user->login($_POST['username'], $_POST['password']);

//     /* Login Successful */
//     if ($result):
//         redirect_to("dashboard/index.php");
//     endif;
// endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $lang['tools-login1'] ?> | <?php echo $core->site_name ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../assets_/images/favicon.png">

	<link href="assetso/css/dashboard-datepicker.min.css" rel="stylesheet">
	<link href="assetso/vendors/material-icons/material-icons.css" rel="stylesheet">
	<link href="assetso/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet">
<link href="assetso/css/dashboard-sweetalert2.css" rel="stylesheet">
<link href="assetso/css/dashboard-magnific-popup.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-mediaelementplayer.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-perfect-scrollbar.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-font-Nunito-Sans.css" rel="stylesheet">
<link href="assetso/css/dashboard-font-Roboto.css" rel="stylesheet">
<link href="assetso/css/dashboard-font-Open-Sans.css" rel="stylesheet">
<link href="assetso/css/font-awesome.min.css" rel="stylesheet">
<link href="assetso/vendors/weather-icons-master/weather-icons.min.css" rel="stylesheet">
<link href="assetso/vendors/weather-icons-master/weather-icons-wind.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-daterangepicker.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-morris.css" rel="stylesheet">
<link href="assetso/css/dashboard-slick.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-slick-theme.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-style.css" rel="stylesheet">
<link href="assetso/css/dashboard-custom-style.css" rel="stylesheet">
<link href="assetso/css/dashboard-switchery.min.css" rel="stylesheet">
<link href="assetso/css/select2.min.css" rel="stylesheet">
<link href="assetso/css/dashboard-bootstrap-select.min.css" rel="stylesheet">
<link href="assetso/css/verticalquote.css" rel="stylesheet">

<script data-cfasync="false" type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-modernizr.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery-ui.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/select.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.tablesorter.min.js"></script>

<script src="asseso/js/api_client.js"></script>
</head>
<body class="body-bg-full profile-page header-light sidebar-dark sidebar-expand">
<style id="antiClickjack">body{display:none !important;}</style>
<script type="text/javascript">
    if (self === top) {
        var antiClickjack = document.getElementById("antiClickjack");
        antiClickjack.parentNode.removeChild(antiClickjack);
    } else {
        top.location = self.location;
    }
</script>
	

<div id="wrapper" class="row wrapper profile-page">
<div class="ml-sm-auto col-sm-10 col-md-8 col-lg-5 ml-md-auto mx-auto p-0 usersignin-tabs">
<ul class="nav nav-tabs nav-justified">
<li class="nav-item"><a class="nav-link active"><?php echo $lang['tools-login1'] ?></a>
</li>
<?php if ($core->reg_allowed): ?>
<li class="nav-item"><a class="nav-link" href="register.php"><?php echo $lang['tools-login9'] ?></a>
</li>
<?php
endif; ?>
</ul>
</div>
<div class="ml-sm-auto col-sm-10 col-md-8 col-lg-5 ml-md-auto login-center mx-auto login-wrapper">
<div class="navbar-header text-center"> <a href="index.php"> <img src="uploads/exchangeparcel_logo.png"  alt="ExchangeParcel logo" title="ExchangeParcel"> </a> </div>


<form method="post" id="login_form" name="login_form" class="xform">
<h4 class="text-uppercase text-center mt-0"><?php echo $lang['tools-login10'] ?></h4>
<p class="text-center"><?php echo $lang['tools-login11'] ?></p>
<div class="form-group form-control-icon form-control-icon-right">
<div class="input-group has-feedback">
<input type="text" placeholder="UserName" class="form-control form-control-line" name="username" id="login_email" autocomplete="off" required>
<button class="btn btn-default shwPassword" type="button"><i class="material-icons list-star">supervisor_account</i></button>
</div>
</div>
<div class="form-group form-control-icon form-control-icon-right">
<div class="input-group has-feedback">
<input class="form-control txtPassword pwdStr" type="password" name="password" required placeholder="Password" autocomplete="off" oninvalid="this.setCustomValidity('Fill in this field')" oninput="setCustomValidity('')" required>
<button class="btn btn-default show_hide_pass shwPassword" onclick="ShowPassword(event)" type="button"> <i class="material-icons list-icon">visibility_off</i></button>
</div>
</div>
<div class="form-group no-gutters mb-3">
<div class="col-md-12 d-flex remember-forgot">
<div class="checkbox mr-auto">
<label class="d-flex">
<input type="checkbox" id="rememberme">
<span class="label-text">Remember me</span> </label>
</div>
<div class="forgotlogin"><span id="to-recover" class="my-auto text-right"><i class="fa fa-lock mr-1"></i><a id="do-passreset" id="to-recover" class="border_bottom_dotted"><?php echo cleanOut($login->log6); ?></a>?</span></div>

</div>

<div class="form-group" onkeypress="return checkEnter(event)">
<button type="submit" class="btn btn-block btn-lg btn-violet btn-3d ripple log-in" name="dosubmit"><?php echo cleanOut($login->log7); ?></button>
</div>
</form>



<?php if ($core->reg_allowed): ?>
<footer class="col-sm-12 text-center">
<hr>
<p>Don't have an account? <a href="register.php" class="m-l-5"><b><?php echo cleanOut($login->log8); ?></b></a> </p>
</footer>
<?php
endif; ?>
</div>

</div>

	<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-popper.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-bootstrap.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-datepicker.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.magnific-popup.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-mediaelementplayer.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-metisMenu.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-perfect-scrollbar.jquery.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-sweetalert2.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.counterup.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.waypoints.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-Chart.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-Chart.bundle.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/vendors/charts/utils.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.knob.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.sparkline.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/vendors/charts/excanvas.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-mithril.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/vendors/theme-widgets/widgets.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-moment.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-underscore-min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-clndr.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-morris.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-raphael.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-daterangepicker.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-slick.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-theme.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-custom.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.viewportchecker.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/master-generals.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-switchery.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-material-design.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.toast.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/bodymovin.js"></script>
<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-bootstrap-select.min.js"></script>
</body>
</html>

    <!--============================= HEADER =============================-->
    
	
	
    <!--//END HEADER -->
	
	<!--============================= SUBPAGE HEADER BG =============================-->
    <!-- <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">

                </div>
            </div>
        </div>
    </section> -->
    <!--// SUBPAGE HEADER BG -->
