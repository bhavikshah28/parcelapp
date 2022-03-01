<?php
   define("_VALID_PHP", true);
   require_once("../init.php");
   $userdata = $user->getUserData();
   $booking = Booking::instance();   
   $booking->uid = $userdata->id;
   $message = '';
   	//$ratesrow = $core->getRates();
     $itemprcels = $booking->getParcelDetails();  
    	//$ratesrow = getPageData($_POST['fromPoint'], $_POST['toPoint'], $_POST['fromZip'], $_POST['toZip'], $_POST['Weight']);
   if(isset($_POST['hdnsmstext']) && $_POST['hdnsmstext'] == 'True'){
      if($_POST['composeSMS'] != '' && $_POST['SMSType'] != '0'){
      $booking_param = Array();
     foreach($_POST as $key => $value) {
      $booking_param[$key] = $value;
    }
    $booking->formdata = $_POST;
    $message = $booking->update_template_sms(); 
   }
   }   
   
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
      <!-- CSS only -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
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
         @media(min-width:685px){
         #processing_list_length{position: absolute;}
         #div.dataTables_wrapper div.dataTables_info{padding-top: 0em;}
         }
         .dataTables_paginate .paginate_button{padding: 5px 10px;}
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
      <script data-cfasync="false" type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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
         .composesms {border: 1px solid #e4e9f0;border-radius: .25rem;width: 100%;min-height: 200px !important;padding: 0.5625rem 0.8em;}
         .message-preview-wrapper {
         margin: 0 auto;
         width: 300px;
         height: 600px;
         background-image: url(https://cdn.pixabay.com/photo/2019/01/06/16/12/samsung-3917310_960_720.png);
         background-size: cover;
         background-position: center;
         }
         .message-preview--wrapper {
         width: 250px;
         margin: 0 auto;
         top: 50px;
         position: absolute;
         left: 0;
         right: 0;
         max-height: 520px;
         overflow-y: scroll;
         }
         .slick-list,.slick-slider,.slick-track{position:relative;display:block}.slick-loading .slick-slide,.slick-loading .slick-track{visibility:hidden}.slick-slider{box-sizing:border-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-touch-callout:none;-khtml-user-select:none;-ms-touch-action:pan-y;touch-action:pan-y;-webkit-tap-highlight-color:transparent}.slick-list{overflow:hidden;margin:0;padding:0}.slick-list:focus{outline:0}.slick-list.dragging{cursor:pointer;cursor:hand}.slick-slider .slick-list,.slick-slider .slick-track{-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);-o-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}.slick-track{top:0;left:0}.slick-track:after,.slick-track:before{display:table;content:''}.slick-track:after{clear:both}.slick-slide{display:none;float:left;height:100%;min-height:1px}[dir=rtl] .slick-slide{float:right}.slick-slide img{display:block}.slick-slide.slick-loading img{display:none}.slick-slide.dragging img{pointer-events:none}.slick-initialized .slick-slide{display:block}.slick-vertical .slick-slide{display:block;height:auto;border:1px solid transparent}.slick-arrow.slick-hidden{display:none}
         .btn-default {
         color: white !important;
         background-color: pink;
         border-color: #e4e7ea;
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
         $(document).ready(function() {
             $('#processing_list').DataTable();
         } );
      </script>
      <?php include 'topbar.php'; ?>
      <!-- End Topbar header -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <?php include 'left_sidebar.php'; ?>
      <main class="main-wrapper clearfix" style="position: relative;">
      <div class="body-bg-full quote__wrapper">
         <div id="quote_book_step_wrapper" class="row wrapper multi-step-signup">
            <div class="row page-title clearfix">
               <div class="col-md-3 p-0">
                  <h5 class="m-0 mr-r-5">Tracking SMS</h5>
               </div>
            </div>
         </div>
      </div>
      <div class="widget-list tracking-sms-wrapper" id="smspage">
         <div class="pageload"></div>
         <div class="row">
            <Form class="widget-holder col-12 col-xl-8 xform" method="POST" id="frmsms" name="frmsms">
               <div class="widget-bg composesmsdiv">
                  <div class="widget-body clearfix">
                     <h6 class="box-title error mt-0" id="messagealert"><?php echo $message; ?></h6>
                     <br/>
                     <h5 class="box-title mt-0">Compose SMS</h5>
                     <i id="lock-activate" class="material-icons color-danger fs-22 ml-1 align-top" data-toggle="tooltip" data-placement="top" title="" style="display: none;" data-original-title="You can proceed with changes once Custom Tracking SMS has been deactivated.">lock</i>
                     <div class="alert alert-icon alert-danger border-danger alert-dismissible fade hide" id="alertuser" role="alert">
                        <button type="button" class="close" onclick="$('#alertuser').removeClass('show').addClass('hide');"><span aria-hidden="true">×</span>
                        </button> <i class="material-icons list-icon">not_interested</i> Please fill in your details.
                     </div>
                     <div class="form-group z-test">
                        <div class="btn-list" id="sms_template">
                           <button class="variation btn btn-default btn-3d btn-xs" id="" value="[Tracking No.]">Tracking No.</button>
                           <button class="variation btn btn-default btn-3d btn-xs" id="" value="[Tracking URL]">Tracking URL</button>
                           <button class="variation btn btn-default btn-3d btn-xs" id="" value="[Sender’s Name]">Sender's Name</button>
                           <button class="variation btn btn-default btn-3d btn-xs" id="" value="[Receiver’s Name]">Receiver's Name</button>
                           <button class="variation btn btn-default btn-3d btn-xs" id="" value="[Collection/Drop Off Date]">Collection/Drop Off Date</button>
                           <button class="variation btn btn-default btn-3d btn-xs" id="" value="[Courier Name]">Courier Name</button>
                        </div>
                        <textarea id="composeSMS" name="composeSMS" class="composesms" contenteditable="true" required placeholder="Your order from [Sender’s Name] is ready &amp; trackable once courier scans in. Track: [Tracking URL] [Tracking No.]" class="after_nobranding">Your order from [Sender’s Name] is ready &amp; trackable once courier scans in. Track: [Tracking URL] 1234567090 Powered by exchange parcel</textarea>
                        <div class="clearfix">
                           <p class="pull-right" id="composeSMS-count"><strong>127</strong> / 500 characters (1 SMS)</p>
                        </div>
                        <select class="form-control" id="SMSType" name="SMSType" required>
                           <option value="1">shipping Notification</option>
                           <option value="2">Status Update Center</option>
                           <option value="3">Approval of the shipment</option>
                           <option value="4">credit cards</option>
                        </select>
                        <input type="hidden" name="hdnsmstext" id="hdnsmstext" value="True" />
                        <input type="hidden" name="hdnsmstid" id="hdnsmstid" />
                        <hr>
                     </div>
                     <div class="form-actions clearfix z-test">
                        <button class="btn btn-default btn-3d marketing-tools-button" id="resetBtn" type="submit">Reset</button>
                        <button class="btn btn-pink btn-3d pull-right marketing-tools-button" onclick="return validatesmsform();" id="save_btn" type="submit">Save Changes</button> 
                        <a class="pull-right mr-2 btn btn-outline-default btn-3d color-pink" data-target="#send-preview" data-toggle="modal" id="previewlink"><i>Send Preview (RM0.30)</i></a>
                     </div>
            </form>
            </div>
            </div>
            <div class="widget-holder col-12 col-xl-4">
               <div class="widget-transparent">
                  <div class="widget-body clearfix">
                     <div class="message-preview-wrapper">
                        <div class="row message-preview--wrapper" style="margin-top:10px;">
                           <div class="col-12">
                              <h6 class="text-center box-title d-block mt-0">Message Preview</h6>
                           </div>
                           <div class="col-2 pl-1 pr-0"><img src="uploads/parcel_mobile.jpg"></div>
                           <div class="col-9 pl-2 pr-1" id="previewSMS-wrapper">
                              <div class="form-group previewSMS-wrapper-sample mb-3">
                                 <div class="input-group">
                                    <div id="previewSMS-1" class="form-control previewSMS d-block" disabled="">RM0 EP: Your order from ........ is ready &amp; trackable once courier scans in. Track: <a href="https://p3x.cc/zPnfZL">p3x.cc/zPnfZL</a> 1234567090 Powered by exchange parcel</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="widget-holder col-12">
               <h5 class="box-title mt-0">Custom Tracking SMS Sample</h5>
               <div class="carousel multi-slide-carousel slick-initialized slick-slider slick-dotted" data-slick="{&quot;dots&quot;: true,&quot;infinite&quot;: true,&quot;autoplay&quot;: true,&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;: 2,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1024, &quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;: 3,&quot;dots&quot;: true,&quot;infinite&quot;: true}},{&quot;breakpoint&quot;:600, &quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;: 2}}] }" style="height:inherit;" role="toolbar">
                  <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
                  <div aria-live="polite" class="slick-list draggable">
                     <div class="slick-track" style="opacity: 1; width: 3984px; transform: translate3d(-1245px, 0px, 0px);" role="listbox">
                        <div class="item-image slick-slide slick-cloned" data-slick-index="-5" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample2.1-en-my.jpg" class="img-shadow" title="Sample 2" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample2-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3.1-en-my.jpg" class="img-shadow" title="Sample 3" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample4.1-en-my.jpg" class="img-shadow" title="Sample 4" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample4-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample5.1-en-my.jpg" class="img-shadow" title="Sample 5" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample5-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3.1-en-my.jpg" class="img-shadow" title="Sample 6" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 247px;" tabindex="-1" role="option" aria-describedby="slick-slide00">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample1.1-en-my.jpg" class="img-shadow" title="Sample 1" data-toggle="lightbox" data-type="image" tabindex="0">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample1-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 247px;" tabindex="-1" role="option" aria-describedby="slick-slide01">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample2.1-en-my.jpg" class="img-shadow" title="Sample 2" data-toggle="lightbox" data-type="image" tabindex="0">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample2-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 247px;" tabindex="-1" role="option" aria-describedby="slick-slide02">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3.1-en-my.jpg" class="img-shadow" title="Sample 3" data-toggle="lightbox" data-type="image" tabindex="0">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 247px;" tabindex="-1" role="option" aria-describedby="slick-slide03">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample4.1-en-my.jpg" class="img-shadow" title="Sample 4" data-toggle="lightbox" data-type="image" tabindex="0">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample4-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 247px;" tabindex="-1" role="option" aria-describedby="slick-slide04">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample5.1-en-my.jpg" class="img-shadow" title="Sample 5" data-toggle="lightbox" data-type="image" tabindex="0">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample5-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide" data-slick-index="5" aria-hidden="true" style="width: 247px;" tabindex="-1" role="option" aria-describedby="slick-slide05">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3.1-en-my.jpg" class="img-shadow" title="Sample 6" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample1.1-en-my.jpg" class="img-shadow" title="Sample 1" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample1-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample2.1-en-my.jpg" class="img-shadow" title="Sample 2" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample2-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3.1-en-my.jpg" class="img-shadow" title="Sample 3" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample3-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample4.1-en-my.jpg" class="img-shadow" title="Sample 4" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample4-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                        <div class="item-image slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" style="width: 247px;" tabindex="-1">
                           <a href="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample5.1-en-my.jpg" class="img-shadow" title="Sample 5" data-toggle="lightbox" data-type="image" tabindex="-1">
                           <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/marketing-tools/custom-tracking-SMS-sample5-my.png" alt="" class="pl-2 pr-2">
                           </a>
                        </div>
                     </div>
                  </div>
                  <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button>
                  <ul class="slick-dots" style="display: block;" role="tablist">
                     <li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation00" id="slick-slide00"><button type="button" data-role="none" role="button" tabindex="0">1</button></li>
                     <li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation01" id="slick-slide01" class=""><button type="button" data-role="none" role="button" tabindex="0">2</button></li>
                     <li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation02" id="slick-slide02" class=""><button type="button" data-role="none" role="button" tabindex="0">3</button></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function(){
           $("#composeSMS-count strong").html($("#composeSMS").val().length);
           $("#previewSMS-1").html($("#composeSMS").val());
           changeSMSType();
         });
         $('#sms_template button').on('click', setTextToCurrentPos);
            function setTextToCurrentPos() {
                      var curPos =
                          document.getElementById("composeSMS").selectionStart;
                      console.log(curPos);
                      let x = $("#composeSMS").val();
                      let text_to_insert = $(this).val();
                      $("#composeSMS").val(
            x.slice(0, curPos) + text_to_insert + x.slice(curPos));
            $("#composeSMS-count strong").html($("#composeSMS").val().length);  
                   $("#previewSMS-1").html($("#composeSMS").val());
                   return false;
                  }
         
                  $('#composeSMS').on('input propertychange', function(){
                   $("#composeSMS-count strong").html($("#composeSMS").val().length);  
                   $("#previewSMS-1").html($("#composeSMS").val());
                  });
         
            $("#SMSType").on('change', changeSMSType);
         
            function changeSMSType(){
               var path = "<?php echo SITEURL ?>/ajax/controller.php";
               var template_id = $("#SMSType").val();
         $.ajax({
         	type: 'POST',
         	url: path,
         	data: {
         		tid: template_id,
         		postsmstemplate: true,
         	},
         	success: function (response) {
         
         		console.log(response);
         
         		if (response.includes("success")) {
                              var strresponse = response.split("|");
         			$('#composeSMS').val(strresponse[2]);
         			$('#hdnsmstid').val(strresponse[1]);
                  $("#previewSMS-1").html($("#composeSMS").val());
         		}else{
                              $('#composeSMS').val("");
                              $('#hdnsmstid').val("");   
                              $("#previewSMS-1").html("");
                           }
         
         	}
            });
         }
         function validatesmsform(){
         if($('#SMSType').val() == '0'){
            alert('please select SMS Type');
            return false;
         }
         if($('#composeSMS').val() == ''){
            alert('please enter SMS Text');
            return false;
         }
         }
      </script>
      <?php include("footer.php");?>