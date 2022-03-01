<?php
//************************************************************
// Customer My Profile : Page                                  **   
// Authorized by customer only                                **
//************************************************************

  define("_VALID_PHP", true);
  require_once("../init.php");
  
    if (is_dir("../setup"))
      : die("<div style='text-align:center'>" 
		  . "</br></br>"
		  . "<span style='padding: 15px; border: 1px solid #999; background-color:#f9b66d;border-radius:5px;color:#666;padding:5px;margin-top: 40px;" 
		  . "font-family: Verdana; font-size: 14px; margin-left:auto; margin-right:auto'>" 
		  . "<b>Warning:</b> Please delete the <b>setup</b> folder!</span></div>");
  endif;
  
  if (!$user->logged_in)
    redirect_to("../login.php");
  
	$row = $user->getUserData();
	

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
	<link href="../assetso/css/dashboard-datepicker.min.css" rel="stylesheet">
<link href="../assetso/vendors/material-icons/material-icons.css" rel="stylesheet">
<link href="../assetso/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet">
<link href="../assetso/css/dashboard-sweetalert2.css" rel="stylesheet">
<link href="../assetso/css/dashboard-magnific-popup.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-perfect-scrollbar.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-font-Nunito-Sans.css" rel="stylesheet">
<link href="../assetso/css/dashboard-font-Roboto.css" rel="stylesheet">
<link href="../assetso/css/dashboard-font-Open-Sans.css" rel="stylesheet">
<link href="../assetso/css/font-awesome.min.css" rel="stylesheet">
<link href="../assetso/vendors/weather-icons-master/weather-icons.min.css" rel="stylesheet">
<link href="../assetso/vendors/weather-icons-master/weather-icons-wind.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-daterangepicker.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-morris.css" rel="stylesheet">
<link href="../assetso/css/dashboard-slick.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-slick-theme.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-style.css" rel="stylesheet">
<link href="../assetso/css/select2.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-bootstrap-select.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-basic.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-dropzone.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-jquery.toast.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-custom-style.css" rel="stylesheet">
<link href="../assetso/css/dashboard-switchery.min.css" rel="stylesheet">
<link href="../assetso/css/dashboard-mediaelementplayer.min.css" rel="stylesheet">
<link href="../assetso/css/bootstrap-tagsinput.css" rel="stylesheet">

<style>
.glyphicon-remove{font-size: 24px;}
.mySidenav a { position: absolute; margin-top: 60vh; right:10px; z-index: 100;}
.affix { top: 20px; z-index: 1000 !important; right:0px; position: fixed;}
.mySidenav img{ min-width: 80px;}
.mySidenav a:focus{outline: none;}
.mySidenav a.closebtn{font-size: 25px; position: absolute; right: 10px; color: #e83e8c; z-index: 1000; opacity: 0;}
.mySidenav a.closebtn:hover{color: #e83e8c;text-decoration: none;}
.epi-cancel-circle:before {content:'\ea4b'; background-color: #fff; border-radius: 50%;}
div.mySidenav:hover > a.closebtn { opacity: 1 !important; }
a.list-icon.material-icons.closebtn:hover { border-radius: 50px; background-color: #e83e8c; color: #fff;}
@media(max-width:768px){.mySidenav a.closebtn{opacity:1;}}
@media(max-width:485px){
	.mySidenav img{width: 70px;}
	.mySidenav a..closebtn{font-size: 30px;top: -20px;}
}
.blockElement{width:auto !important;position:relative !important;}
.mainBlockUI{z-index:9999};
</style>

<script>
window.paceOptions = {
  restartOnPushState: false,
  restartOnRequestAfter: false,
  ajax: false,
  eventLag: false
};
</script>

<script data-cfasync="false" type="text/javascript" src="../assetso/js/bodymovin.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-modernizr.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery-ui.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery-latest.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.tablesorter.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.ui.widget.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-jquery.fileupload.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/lazyloading.js"></script>
<script data-cfasync="false" type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-datepicker.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-dropzone.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/select.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-switchery.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-isotope.pkgd.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/dashboard-mediaelementplayer.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/bootstrap-tagsinput.min.js"></script>
<script data-cfasync="false" type="text/javascript" src="../assetso/js/bootstrap-tagsinput.js"></script>


</head>

<body class="header-light sidebar-expand">

<div id="wrapper" class="wrapper">
<style>
@media (max-width: 767px){
  ul.right_menu li{
    position: inherit;
  }
  .right_menu .open .dropdown-menu {
    width: 100%;
  }
  .right_menu .show .dropdown-menu {
    width: 100%;
  }
}
.topbar_notification .dropdown-list-group a .list-icon {
    color: #fff;
    width: 100%;
    text-align: center;
    font-size: 1.38462em;
    line-height: 1.5em;
    top: 0;
    height: 1.5em;
    width: 1.5em;
    border-radius: 100px;
}
.topbar_notification .dropdown-list-group a .list-icon.green {
    background: #39d579;    
}
.topbar_notification header.card-header {
    padding: 1em 1.2em 0.5em;
    border-bottom: 1px solid #ddd;
}
.topbar_notification .notification-list li a small {
    opacity: inherit;
}
.topbar_notification .notification-list li a.media{
    padding: 1em 2em 1em 1.5em;    
}
.topbar_notification .notification-list li .mask-read{
    transform:scale(0);
    transition:all .35s ease-out;
    position: absolute;
    right: 10px;
    top: 15px;
}
.topbar_notification .notification-list:hover li .mask-read{
    transform:scale(1);
    transition-delay:.15s;  
    position: absolute;
    right: 10px;  
    top: 15px;
}

</style>

<script>


function closeFloatingBar() {
  var d = new Date();
  d.setTime(d.getTime() + (1*24*60*60*1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = "hideFloatingBar = true; " + expires + ";path=/";
  $('#notice-bar').hide();
};
</script>

		<?php include 'topbar.php'; ?>
		
        <!-- End Topbar header -->

		
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
		<?php include 'left_sidebar.php'; ?>
		

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->

        <main class="main-wrapper clearfix" style="position: relative;">
        <div class="body-bg-full quote__wrapper">
          <div id="quote_book_step_wrapper" class="row wrapper multi-step-signup">

          <div class="row page-title clearfix">
          <div class="col-md-3 p-0">
            <h5 class="m-0 mr-r-5"><?php echo $lang['miprofile'] ?></h5>
          </div>
            
          </div>
          </div>
          </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="widget-list">
			<!-- ============================================================== -->


				 <?php (Filter::$do && file_exists(Filter::$do.".php")) ? include(Filter::$do.".php") : include("../account.php");?>
				
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- footer -->
			
			
             <?php include 'footer.php'; ?>
			