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

  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
	  
	  $news = $core->renderNews();
	  $courier_onlinerow = $user->getCourier_list_booking();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets_/images/favicon.png">
    <!-- Page Title -->
    <title><?php echo $core->site_name;?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets_/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	

	<link href="assetso/css/master2-bootstrap.css" rel="stylesheet">
    <link href="assetso/css/master2-custom-style-minify.css" rel="stylesheet">
    <link href="assetso/css/master2-font-icons.css" rel="stylesheet">
    <link href="assetso/css/master2-animate.css" rel="stylesheet">
    <link href="assetso/css/master2-magnific-popup.css" rel="stylesheet">
    <link href="assetso/css/master2-material-icons.css" rel="stylesheet">
    <link href="assetso/css/master2-fontawesome.min.css" rel="stylesheet">
    <link href="assetso/css/master2-custom-responsive-minify.css" rel="stylesheet">
    <link href="assetso/css/master2-settings.css" rel="stylesheet">
    <link href="assetso/css/master2-layers.css" rel="stylesheet">
    <link href="assetso/css/master2-navigation.css" rel="stylesheet">
    <link href="assetso/css/master2-custom029c.css?ep=1_03" rel="stylesheet">
    <link href="assetso/css/dashboard-sweetalert2.css" rel="stylesheet">
    <link href="assetso/css/select2.min.css" rel="stylesheet">
    <link href="assetso/css/dashboard-datepicker.min.css" rel="stylesheet">
    <link href="assetso/css/components/ion.rangeslider.css" rel="stylesheet">
    <link href="assetso/css/font-awesome.min.css" rel="stylesheet">
    <link href="assetso/css/dashboard-bootstrap-select.min.css" rel="stylesheet">
    <link href="assetso/vendors/material-icons/material-icons.css" rel="stylesheet">
    <link href="assetso/css/verticalquote.css" rel="stylesheet">



	<!-- <link href="assets/css_log/front.css" rel="stylesheet" type="text/css"> -->
    <!-- Themify Icon -->
    <!-- <link rel="stylesheet" href="assets_/css/themify-icons.css"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="assets_/css/font-awesome.min.css"> -->

    <!-- Main CSS -->
    <!-- <link rel="stylesheet" href="assets_/css/style.css">
	<link rel="stylesheet" href="assets/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="assets_/css/responsive.css" />
	<link href="assets_/css/set1.css" rel="stylesheet"> -->
	
	<!-- jQuery, Bootstrap JS. -->
	<!-- <link rel="stylesheet" href="assets/jquery-ui.css" type="text/css" /> -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-jquery.js"></script>
	<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-datepicker.min.js"></script>
	<script data-cfasync="false" type="text/javascript" src="assetso/js/master2-plugins.js"></script>
	<script data-cfasync="false" type="text/javascript" src="https://js.stripe.com/v3/"></script>
	<script data-cfasync="false" type="text/javascript" src="assetso/js/master-jquery.fileupload.min.js"></script>
	<script data-cfasync="false" type="text/javascript" src="assetso/js/dashboard-jquery.tablesorter.min.js"></script>
	<script data-cfasync="false" type="text/javascript" src="assetso/js/select.js"></script>	
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
<style>
.glyphicon-remove {font-size: 24px;}
.btnspace{margin-bottom: 40px;}
.btnspacing{margin: 5px;}

.mySidenav a, .idSidenav a {position: absolute; top: 65vh; right:10px;}
.affix {top: 20px; z-index: 1000 !important; right:0px; width:inherit;}
.mySidenav img, .idSidenav img{width: 80px;}
.mySidenav a:focus, .idSidenav a:focus{outline: none;}
a.icon-line2-close{font-size: 21px; position: absolute; right: 10px; color: #9c27b0; line-height:normal; z-index: 1000; opacity: 0;}
a:hover {color: #9c27b0;text-decoration: none;}
.epi-cancel-circle:before {content: '\ea4b'; background-color: #fff; border-radius: 50%;}
div.mySidenav:hover > a.icon-line2-close, div.idSidenav:hover > a.icon-line2-close {opacity: 1 !important;}
a.icon-line2-close:hover {cursor: pointer; color: white; border: 1.4px #9c27b0 solid; background: #9c27b0; border-radius: 15px;}

@media(max-width:768px){
  a.icon-line2-close{opacity:1;}
}
@media(max-width:485px){
  .content-bg{background-image: none;}
  .mySidenav img, .idSidenav img{width: 70px;}
}
.modal-content .close {
    font-size: 1.28571em;
    top: -0.85714em;
    position: absolute;
    right: -0.85714em;
    height: 2em;
    width: 2em;
    background-color: #313a46;
    opacity: 1;
    border: 2px solid #ffffff;
    text-shadow: none;
    color: #ffffff;
    border-radius: 50%;
    text-align: center;
    line-height: 1.83333em;
}
.floating-icon .modal-content p{
  margin-bottom: 10px;  
}

</style>

</head>

<body class="stretched no-transition">
    <!--============================= HEADER =============================-->
	<div id="wrapper" class="clearfix">

    <script>


function closeFloatingBar() {
  var d = new Date();
  d.setTime(d.getTime() + (1*24*60*60*1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = "hideFloatingBar = true; " + expires + ";path=/";
  $('#notice-bar').hide();
};
</script>

<div id="top-bar" class="hidden-xs">
<div class="container clearfix">
<div class="col_half nobottommargin">
<div id="top-social">
<ul>
<li><a href="#" target="_blank" class="si-facebook" data-hover-width="107" style="width: 40px;"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
<li><a href="#" target="_blank" class="si-twitter" data-hover-width="93" style="width: 40px;"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
<li><a href="#" target="_blank" class="si-pinterest" data-hover-width="104" style="width: 40px;"><span class="ts-icon"><i class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>
<li><a href="#" target="_blank" class="si-instagram" data-hover-width="109" style="width: 40px;"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
<li><a href="#" target="_blank" class="si-youtube" data-hover-width="109" style="width: 40px;"><span class="ts-icon"><i class="icon-youtube"></i></span><span class="ts-text">Youtube</span></a></li>
</ul>
</div>
</div>
<div class="col_half col_last fright nobottommargin">

<div class="top-links">
<ul>
<!-- <li>
<a href="#"><div><img src="assetso/img/country-flag/malaysia-flag.jpg"  class="coutry_flag_active"> Malaysia<i class="icon-angle-down"></i></div></a>
<ul>
<li><a href="../../sg/en/index.html"><div><img src="assetso/img/country-flag/singapore-flag.jpg" >Singapore</div></a></li>
<li><a href="https://easyparcel.co.th/"><div><img src="assetso/img/country-flag/thailand-flag.jpg" >Thailand</div></a></li>
<li><a href="https://easyparcel.co.id/"><div><img src="assetso/img/country-flag/indonesia-flag.jpg" >Indonesia</div></a></li>
</ul>
</li> -->
<li>
<a href="#"><div><i class='icon-line2-globe'></i>English<i class="icon-angle-down"></i>
</div></a>
<ul>
<li style=""><a href="../cn/index.html"><div><img src="assetso/img/country-flag/china-flag.jpg" class='coutry_flag_active' alt="中文 "> 中文 </div></a></li>
<li style=""><a href="../bm/index.html"><div><img src="assetso/img/country-flag/malaysia-flag.jpg" class='coutry_flag_active' alt="Malay"> Malay</div></a></li>
</ul>
</li>
<li class="tb-track" style="background-color: #F2F4F8;">

<form id="myform" onsubmit="return false;" class="nomargin top-bar-tracking">

<div class="input-group">
<input type="text" class="form-control" name="MainContentAwb" id="MainContentAwb" value="" placeholder="Track parcel here..." autocomplete="off" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Track parcel here...'" required>

<span class="input-group-btn"><button class="btn btn-default" value="Track" onclick="Track()" type="submit" id="trackButton"><i class="material-icons list-icon" style="color: #666;">search</i></button></span>
</div>
</form>
<script>

function Track(){
	var awb = $('#MainContentAwb').val();
	awb = awb.trim();
	if(awb == ""){
		awb = $('#MainContentAwb1').val();
	}
	if(awb == ""){
		alert('Please enter Airway Bill for track.');
		/*swal({
			title: 'Oops',
			type: 'error',
			html: 'Please enter Airway Bill for track.',
			confirmButtonColor: '#4e97d8'
			})*/
	}else{
		awb = awb.replace(/\n/g,';').replace(/ /g, ";").replace(/\+/g, ';').replace(/[&\/\#,+()$~%.'":*?<>{}!@^`]/g, '');
		while (awb.indexOf(';;') > -1) {
			awb = awb.replace(';;', ';');
		}
		if(awb.slice(-1) == ';'){
			awb = awb.slice(0,-1);
		}
		if(awb.charAt(0) == ';'){
			awb = awb.substr(1);
		}
		awb = awb.split(';');
		if (awb.length <=15 && awb.length >1){
			var displayAWB = awb.join(',');
			clicks = Number("65532387")+1;
     		$.ajax({
     			type: "POST",
     			url: "indexdb2a.html?ac=doTrackCount",
     			data : {
     				data_count : clicks
     			},
     			success: function(result){
     				window.open("https://easyparcel.com/my/en/track/summary/?awb="+displayAWB,'_blank');
     			},
     			error: function(){
     				// showFail();
     				console.log("helo Hani");
     			},
     			timeout: 3000
     		});
		}
		else if(awb.length == 1) {
     		singleAWB = awb.join('');
     		clicks = Number("65532387")+1;
     		$.ajax({
     			type: "POST",
     			url: "https://easyparcel.com/my/en/?ac=doTrackCount",
     			data : {
     				data_count : clicks
     			},
     			success: function(result){
					$.ajax({
					 type: "POST",
					 url: "https://easyparcel.com/my/en/?ac=doTrackSingle",
					 data : {
						 input : singleAWB,
						 token : "850f0f1e1e0cb009ea78bc9f664ca2c03c774f7f",
					 },
					 success: function (result) {
						 var data = JSON.parse(result);
						 if(data.track_name !== null){
						 	window.open("https://easyparcel.com/my/en/track/details/?courier="+data.track_name+"&awb="+singleAWB, '_blank');
						 }else{
						 	window.open( "https://easyparcel.com/my/en/track/summary/?awb="+singleAWB,'_blank');
						 }
						}
					});
				},
     			error: function(){
     				// showFail();
     				console.log("helo Hani");
     			},
     			timeout: 3000
     		});
		}
		else{
			swal({
				title: 'Oops',
				text: 'You may only key in maximum of 15 AWB/Order.',
				type: 'error',
				confirmButtonColor: '#4e97d8'
				}).then(function() {
					location.reload();
				})
		}
	}
}

</script>

</li>
</ul>
</div>

</div>
</div>
</div>


<header id="header">
<div id="header-wrap">
<div class="container clearfix">
<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

<div id="logo">
<a href="index.php" class="standard-logo retina-logo" data-dark-logo="<?php echo SITEURL ?>/uploads/'<?php echo $core->logo ?>" alt="EasyParcel Logo">

<?php echo (($core->logo)) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" class="logo"/>': 'ExParcel';?>
</a>
</div>



<nav id="primary-menu">
<ul>
<?php if($user->logged_in):?>

<li class="hidden-md hidden-lg">
<a href="account.php">
<div><i class="icon-line2-login hidden-md hidden-lg"></i><?php echo $user->username;?></div>
</a></li>
<?php else:?>
<li class="hidden-md hidden-lg">
<a href="login.php">
<div><i class="icon-line2-login hidden-md hidden-lg"></i><?php echo cleanOut($navmenus->nav8);?></div>
</a></li>
<?php endif;?>

<li class="menu_signup_btn hidden-md hidden-lg">
<a href="register.php">
<div><i class="material-icons hidden-md hidden-lg" style="margin-top: 5px;">create</i><?php echo cleanOut($navmenus->nav9);?></div>
</a></li>
<li id="services" class="hidden-md hidden-lg">
<a href="features/index.html">
<div><i class="icon-line2-wrench hidden-md hidden-lg"></i>Services</div>
</a></li>
<li id="services" class="hidden-xs hidden-sm">
<a href="#">
 <div>Services
<!--	<i class="icon-angle-down"></i> --></div>
</a>
<!-- <div class="mega-menu-content style-2 clearfix">
<ul class="mega-menu-column col-sm-6">
<li class="mega-menu-title sub-menu clearfix"><a href="dashboard/index.html" class="sf-with-ul clearfix">
<div class="col-xs-3"><img src="assetso/img/outline-icons/Domestic-Parcels-sm.png" srcset="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Domestic-Parcels-sm@2.png 2x, https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Domestic-Parcels-sm.png 1x" alt="Domestic Parcels" width="50"></div>
<div class="col-xs-9">Domestic & International Delivery<br>
<small>No matter where you’re shipping to ...</small></div>
</a> </li>
<li class="mega-menu-title sub-menu clearfix"><a href="dashboard/index.html" class="sf-with-ul clearfix">
<div class="col-xs-3"><img src="assetso/img/outline-icons/Marketing-Tools-sm.png" srcset="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Marketing-Tools-sm@2.png 2x, https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Marketing-Tools-sm.png 1x" alt="Marketing Tools" width="50"></div>
<div class="col-xs-9">Marketing Tools<br>
<small>Take your brand to the next level by customizing your own ...</small></div>
</a> </li>
<li class="mega-menu-title sub-menu clearfix"><a href="../../blog/my/brand-new-feature-easyparcel-tracking-sms/index.html" class="sf-with-ul clearfix">
<div class="col-xs-3"><img src="assetso/img/outline-icons/Tracking-SMS-sm.png" srcset="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Tracking-SMS-sm@2.png 2x, https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Tracking-SMS-sm.png 1x" alt="Tracking SMS" width="50"></div>
<div class="col-xs-9">Tracking SMS<br>
<small>Still sending tracking number to receivers manually? You may get it ...</small></div>
</a> </li>
<li class="mega-menu-title sub-menu clearfix"><a href="pgeon-points/index.html" class="sf-with-ul clearfix">
<div class="col-xs-3"><img src="assetso/img/outline-icons/Drop-off-Points-sm.png" srcset="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Drop-off-Points-sm@2.png 2x, https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/Drop-off-Points-sm.png 1x" alt="Drop-off Points" width="50"></div>
<div class="col-xs-9">Pick Up/Drop-Off Point<br>
<small>Dislike waiting? Just drop-off your parcel to courier branch or ...</small></div>
</a> </li>
<li class="mega-menu-title sub-menu clearfix"><a href="EasyTrack/index.html" class="sf-with-ul clearfix">
<div class="col-xs-3"><img src="assetso/img/outline-icons/EasyTrack-sm.png" srcset="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/EasyTrack-sm@2.png 2x, https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/outline-icons/EasyTrack-sm.png 1x" alt="EasyTrack" width="50"></div>
<div class="col-xs-9">EasyTrack<br>
<small>See all your latest parcel statuses in a glance under All Parcels ...</small></div>
</a> </li>

</ul>

</div> -->
</li>

<li><a href="#">
<div><i class="icon-line2-volume-1 hidden-md hidden-lg"></i>Blog</div>
</a></li>
<li><a href="#">
<div><i class="material-icons hidden-md hidden-lg" style="margin-top: 5px;">local_shipping</i>Send Parcel<i class="icon-angle-down"></i></div>
</a>
<ul>
<li><a href="#">
<div>Single Parcel</div>
</a></li>
<li><a href="#">
<div>Bulk Parcel</div>
</a></li>
</ul>
</li>
<li><a href="#">
<div><i class="icon-line2-list hidden-md hidden-lg"></i>More<i class="icon-angle-down"></i></div>
</a>
<div class="mega-menu-content style-2 clearfix">
<ul class="mega-menu-column col-sm-6">
<li><a href="#">
<div>Couriers</div>
</a></li>
<li><a href="#">
<div>Nearby Drop-off</div>
</a></li>
</ul>
<ul class="mega-menu-column col-sm-6">
<li><a href="#">
<div>About Us</div>
</a></li>
<li><a href="#">
<div>Contact Us</div>
</a></li>
</ul>
</div>
</li>

<li class="hidden-md hidden-lg">
<a href="#">
<div><img src="assetso/img/country-flag/malaysia-flag.jpg"  class="coutry_flag_active"> Malaysia<i class="icon-angle-down"></i></div>
</a>
<ul>
<li><a href="../../sg/en/index.html"><div><img src="assetso/img/country-flag/singapore-flag.jpg" alt="Singapore" class="coutry_flag_active"> Singapore</div></a></li>
<li><a href="https://easyparcel.co.th/"><div><img src="assetso/img/country-flag/thailand-flag.jpg" alt="Thailand" class="coutry_flag_active"> Thailand</div></a></li>
<li><a href="https://easyparcel.co.id/"><div><img src="assetso/img/country-flag/indonesia-flag.jpg" alt="Indonesia" class="coutry_flag_active"> Indonesia</div></a></li>
</ul>
</li>
<li class="hidden-md hidden-lg">
<a href="#"><div><i class='icon-line2-globe'></i>English<i class="icon-angle-down"></i></div></a>
<ul>
<li style=""><a href="../cn/index.html"><div><img src="assetso/img/country-flag/china-flag.jpg" class='coutry_flag_active' alt="中文 ">中文 </div></a></li>
<li style=""><a href="../bm/index.html"><div><img src="assetso/img/country-flag/malaysia-flag.jpg" class='coutry_flag_active' alt="Malay">Malay</div></a></li>
</ul>
</li>
<li class="hidden-md hidden-lg">
<form id="myform" onsubmit="return false;" class="nomargin top-bar-tracking">

<div class="input-group">
<input type="text" class="form-control" name="MainContentAwb" id="MainContentAwb" value="" placeholder="Track parcel here..." autocomplete="off" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Track parcel here...'" required>

<span class="input-group-btn"><button class="btn btn-default" value="Track" onclick="Track()" type="submit" id="trackButton"><i class="material-icons list-icon" style="color: #666;">search</i></button></span>
</div>
</form>
<script>

function Track(){
	var awb = $('#MainContentAwb').val();
	awb = awb.trim();
	if(awb == ""){
		awb = $('#MainContentAwb1').val();
	}
	if(awb == ""){
		alert('Please enter Airway Bill for track.');
		/*swal({
			title: 'Oops',
			type: 'error',
			html: 'Please enter Airway Bill for track.',
			confirmButtonColor: '#4e97d8'
			})*/
	}else{
		awb = awb.replace(/\n/g,';').replace(/ /g, ";").replace(/\+/g, ';').replace(/[&\/\#,+()$~%.'":*?<>{}!@^`]/g, '');
		while (awb.indexOf(';;') > -1) {
			awb = awb.replace(';;', ';');
		}
		if(awb.slice(-1) == ';'){
			awb = awb.slice(0,-1);
		}
		if(awb.charAt(0) == ';'){
			awb = awb.substr(1);
		}
		awb = awb.split(';');
		if (awb.length <=15 && awb.length >1){
			var displayAWB = awb.join(',');
			clicks = Number("65532387")+1;
     		$.ajax({
     			type: "POST",
     			url: "indexdb2a.html?ac=doTrackCount",
     			data : {
     				data_count : clicks
     			},
     			success: function(result){
     				window.open("https://easyparcel.com/my/en/track/summary/?awb="+displayAWB,'_blank');
     			},
     			error: function(){
     				// showFail();
     				console.log("helo Hani");
     			},
     			timeout: 3000
     		});
		}
		else if(awb.length == 1) {
     		singleAWB = awb.join('');
     		clicks = Number("65532387")+1;
     		$.ajax({
     			type: "POST",
     			url: "https://easyparcel.com/my/en/?ac=doTrackCount",
     			data : {
     				data_count : clicks
     			},
     			success: function(result){
					$.ajax({
					 type: "POST",
					 url: "https://easyparcel.com/my/en/?ac=doTrackSingle",
					 data : {
						 input : singleAWB,
						 token : "850f0f1e1e0cb009ea78bc9f664ca2c03c774f7f",
					 },
					 success: function (result) {
						 var data = JSON.parse(result);
						 if(data.track_name !== null){
						 	window.open("https://easyparcel.com/my/en/track/details/?courier="+data.track_name+"&awb="+singleAWB, '_blank');
						 }else{
						 	window.open( "https://easyparcel.com/my/en/track/summary/?awb="+singleAWB,'_blank');
						 }
						}
					});
				},
     			error: function(){
     				// showFail();
     				console.log("helo Hani");
     			},
     			timeout: 3000
     		});
		}
		else{
			swal({
				title: 'Oops',
				text: 'You may only key in maximum of 15 AWB/Order.',
				type: 'error',
				confirmButtonColor: '#4e97d8'
				}).then(function() {
					location.reload();
				})
		}
	}
}

</script>
</li>
<?php if(!$user->logged_in):?>
<li class="menu_signup_btn menu-float-right hidden-xs hidden-sm"><a href="register.php">
<div class="button button-3d button-rounded button-violet nomargin center">
<span class="signup-text">Sign Up</span>
<span class="signup-desc">For Free</span>
</div>
</a></li>
<?php else: ?>
	<li class="menu_signup_btn menu-float-right hidden-xs hidden-sm"><a href="dashboard/myprofile.php">
<div class="button button-3d button-rounded button-violet nomargin center">
<span class="signup-text-cn">My Account</span>


</div>
</a></li>
<?php endif; ?>
<?php if(!$user->logged_in):?>
<li class="menu-float-right hidden-xs hidden-sm"><a href="login.php">
<div><?php echo cleanOut($navmenus->nav8); ?></div>
</a></li>
<?php else: ?>
	<li class="menu-float-right hidden-xs hidden-sm"><a href="logout.php">
<div><?php echo $lang['logoouts']; ?></div>
</a></li>
<?php endif; ?>

</ul>
</nav>


<script>
// 

$(document).ready(function() {

  $('#MainContentAwb').attr('id', 'MainContentAwb1');
  $('#myform').attr('id', 'myform1');

});

function displayMainMenu(){
  var currentStyle = document.getElementById("masterContent").style.display;
  if(currentStyle == "none"){
    document.getElementById("masterContent").style.display = "";
    document.getElementById("footer").style.display = "";
    document.getElementById("MasterMobileMenu").style.display = "none";
  }else{
    document.getElementById("masterContent").style.display = "none";
    document.getElementById("footer").style.display = "none";
    document.getElementById("MasterMobileMenu").style.display = "";
  }
  $('html,body').scrollTop(0);
}

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    var div_top_mobile = "";
    if($('#sticky-anchor-mobile').length > 0){
      $('#sticky-anchor-mobile').offset().top;
    }
}

function changeCountry(){
  country = ($("#changeCountry").val());
  window.open(country, '_blank');
  if(country == "sg"){
      window.open('http://www.easyparcel.sg/', '_blank');
      $("#changeCountry").val('');
    }else if(country == "th"){
      window.open('http://www.easyparcel.co.th/', '_blank');
      $("#changeCountry").val('');
    }else if(country == "id"){
      window.open('http://www.easyparcel.co.id/', '_blank');
      $("#changeCountry").val('');
    }else{
      window.open('../../index.html', '_blank');
    }
}
</script>
</div>
<div id="notice-bar" class="notice-bar special-pack referral-floating-bar" style="z-index: 10; opacity: 0">
<div class="notice-content text-center alertmsg">
<div class="notice-layer">
<marquee id="marquee-slide" scrollamount="10" onmouseover="this.stop()" onmouseout="this.start()">
<strong>Kindly be reminded to perform your sign up under this page to be entitled for the referral credit. May refer T&amp;Cs below for more info.</strong>
</marquee>
</div>
</div>
</div>
</div>
</header>



