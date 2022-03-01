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
  require_once("init.php");

  if ($user->logged_in)
      redirect_to("account.php");
  
  
	 /* Registration */
  if (isset($_POST['doRegister'])):
	  if (intval($_POST['doRegister']) == 0 || empty($_POST['doRegister'])):
		echo Filter::msgAlert("<span>Alert!</span>We are sorry, due to site incovenience Registration is not allowed");
       endif;
   $user->register();
 endif;
		
	
   $numusers = countEntries("users");
?>

    <!--============================= HEADER =============================-->
    
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

<script src="assetso/js/api_client.js"></script>
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

	<style>
		.list-star{color:#9c27b0;}
		</style>
    <!--//END HEADER -->
	

	<div id="wrapper" class="row wrapper profile-page">
<?php include("div_loader.php");?>
							
							<?php if(!$core->reg_allowed):?>
							<?php echo Filter::msgAlert("<span>Alert!</span>We are sorry, at this point we do not accept any more registrations");?>
							<?php elseif($core->user_limit !=0 and $core->user_limit == $numusers):?>
							<?php echo Filter::msgAlert("<span>Alert!</span>We are sorry, maximum number of registered users have been reached");?>
							<?php else:?>
								<?php include("div_loader.php");?>
<div class="ml-sm-auto col-sm-10 col-md-8 col-lg-5 ml-md-auto mx-auto p-0 usersignin-tabs">
<ul class="nav nav-tabs nav-justified">
<li class="nav-item"><a class="nav-link " href="login.php"><?php echo $lang['tools-login1'] ?></a>
</li>
<?php if ($core->reg_allowed): ?>
<li class="nav-item"><a class="nav-link active" ><?php echo $lang['tools-login9'] ?></a>
</li>
<?php
endif; ?>
</ul>
</div>
<div class="ml-sm-auto col-sm-10 col-md-8 col-lg-5 ml-md-auto login-center mx-auto register-wrapper">
<div class="navbar-header text-center"> <a href="index.php"> <img src="uploads/exchangeparcel_logo.png"  alt="ExchangeParcel logo" title="ExchangeParcel"> </a> </div>


<form method="post" id="login_form" name="admin_form" class="xform">
<h4 class="text-uppercase text-center mt-0"><?php echo $lang['tools-login12'] ?></h4>
<p class="text-center"><?php echo $lang['tools-login13'] ?></p>
<div class="form-group form-control-icon form-control-icon-right">
<div class="input-group has-feedback">

<input type="text" placeholder="UserName" class="form-control form-control-line" name="username" id="username" autocomplete="off" required>
<button class="btn btn-default shwPassword" type="button"><i class="material-icons ">supervisor_account</i></button>
</div>
</div>
<div class="form-group form-control-icon form-control-icon-right">
<div class="input-group has-feedback">

<input type="text" placeholder="Email" class="form-control form-control-line" name="email" id="reg_email" autocomplete="off" required>
<button class="btn btn-default shwPassword" type="button"><i class="material-icons ">supervisor_account</i></button>
</div>
</div>
<div class="form-group form-control-icon form-control-icon-right">
<div class="input-group has-feedback">

<input class="form-control txtPassword pwdStr" type="password" name="pass" required placeholder="Password" autocomplete="off"  required>
<button class="btn btn-default show_hide_pass shwPassword" onclick="ShowPassword(event)" type="button"> <i class="material-icons ">visibility_off</i></button>
</div>
</div>
<div class="form-group form-control-icon form-control-icon-right">
<div class="input-group has-feedback">
<i class="icon-append icon-asterisk"></i>
<input class="form-control txtPassword pwdStr" type="password" name="pass2" required placeholder="Password" autocomplete="off"  required>
<button class="btn btn-default show_hide_pass shwPassword" onclick="ShowPassword(event)" type="button"> <i class="material-icons">visibility_off</i></button>
</div>
</div>
<div class="form-group no-gutters mb-3">
<div class="checkbox">
 <label>
<input type="checkbox" name="acceptTerm" oninvalid="this.setCustomValidity('Kindly select to proceed')" oninput="setCustomValidity('')" required> <span class="label-text">I agree to all <a href="terms&condition.php" class="border_bottom_dotted">Terms &amp; Conditions</a> and <a href="privacy.php" class="border_bottom_dotted">Privacy Policy</a></span>
</label>
</div>
</div>
<div class="form-group text-center no-gutters">
<button type="submit" class="btn btn-violet btn-3d btn-lg btn-block ripple sign-up" name="dosubmit"><?php echo cleanOut($regin->reg14);?></button>
</div>
<input name="doRegister" type="hidden" value="1" />
</form>
<!--============================= FOOTER =============================-->
<hr>
<footer class="col-sm-12 text-center">
<hr>
<p>Already have an account? <a href="login.php?do=login" class="text-violet m-l-5"><b><?php echo cleanOut($regin->reg15);?></b></a>
</p>
</footer>


</div>
</div>
<!-- <script type="text/javascript">
							// <![CDATA[
							  function showResponse(msg) {
								   debugger;
								  hideLoader();
								  if (msg == 'OK') {
									  result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Success!<\/span>You have successfully registered. Please check your email for further information<\/p><\/div>";
									  $("#fullform").hide();
								  } else {
									  result = msg;
								  }
								  $(this).html(result);
								  $("html, body").animate({
									  scrollTop: 0
								  }, 600);
							  }
							  $(document).ready(function () {
								  var options = {
									  target: "#msgholder",
									  beforeSubmit: showLoader,
									  success: showResponse,
									  url: "ajax/user.php",
									  resetForm: 0,
									  clearForm: 0,
									  data: {
										  processContact: 1
									  }
								  };
								  $("#admin_form").ajaxForm(options);
							  });
							// ]]>

							function showLoader(){
								$("#loader").attr('style', 'display:block;');
							}
							function hideLoader(){
								$("#loader").attr('style', 'display:none;');
							}
							</script> -->
<?php endif; ?>
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

<!--============================= End FOOTER =============================-->
</body>
</html>

	
    
	
        <!--============================= FOOTER =============================-->
	
	<?php //include("footer.php");?>
	
     <!--//END FOOTER -->