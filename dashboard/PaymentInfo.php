<?php
   //************************************************************
   // Customer My Profile : Page                                  **
   // Authorized by customer only                                **
   //************************************************************
   
   define("_VALID_PHP", true);
   require_once "../init.php";
   $booking = Booking::instance();   
   if (!$user->logged_in) {
       //method get
       $coruer_id = $_GET['id'];
       $weight = $_GET['weight'];
       $lenght = $_GET['length'];
       $width = $_GET['width'];
       $height = $_GET['height'];
       $type = $_GET['type'];
       $scountry = $_GET['scountry'];
   
       redirect_to(
         SITEURL . "login.php"
       );
   }
   if (isset($_GET['do']) && $_GET['do'] == 'removebooking') {
       
      $id = $_GET["b_id"];
      if($booking->removeBooking($id)){
         echo '<script>alert("your booking has removed successfully.")</script>';
      }
  }   
   if (isset($_GET['b_id'])) {
       
       $id = $_GET["b_id"];
       $sql = "SELECT * FROM add_courier WHERE id='$id'";
       $courierdetail = $db->first($sql);
   }
   if(isset($_GET['c_id']))
      $c_id= $_GET['c_id'];
   
   $userdata = $user->getUserData();
   $booking->uid = $userdata->id;
   $p_courierlist = $booking->PendingCourierlist_user();
   $itemcount = $booking->getCounton();
   $courierrow = $core->getCouriercom();
   
    
   $ratesrow = array();
   
   if (isset($_POST['do_booking'])):
      if (intval($_POST['do_booking']) == 0 || empty($_POST['do_booking'])):
       echo Filter::msgAlert("<span>Alert!</span>We are sorry, due to site incovenience Booking is not allowed");
        endif;
     
     $booking_param = Array();
     foreach($_POST as $key => $value) {
      $booking_param[$key] = $value;
    }
    $booking->formdata = $_POST;
    if($booking->processBooking()):
       redirect_to("index.php");
    endif;
   endif;
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
         .card-header h6{letter-spacing:0.1em !important;}
         .card-header h5{letter-spacing:0.1em;}
         .mail-list a{color:white !important;background-color:#8f70be !important;}
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
      <!--//END HEADER -->
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
               <div class="col-md-4 p-0">
                  <h5 class="m-0 mr-r-5"><?php echo $lang['create-booking35']; ?></h5>
               </div>
            </div>
            <div class="row clearfix">
               <div class="col-md-12 steps-tab clearfix d-none d-md-block" data-target="#multi-step-signup" style="position: sticky">
                  <ul class="list-unstyled list-inline text-center">
                     <li class="list-inline-item done"><a class="text-info" href="singleparcel.php"><span class="step">1</span></a> </li>
                     <li class="list-inline-item done"><a class="text-info" href="bookings.php?do=bookings&id=<?php echo $c_id; ?>&b_id=<?php echo $id; ?>"><span class="step">2</span></a> </li>
                     <li class="list-inline-item active"><a class="text-info"><span class="step">3</span></a> </li>
                     <li class="list-inline-item "><a class="text-info"><span class="step">4</span></a> </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- fieldset fluid  Sender Details for Make Payment                     -->
      <!-- ============================================================== -->
      <form method="POST" id="payment_form" name="payment_form" class="xform" action="payment_parcel.php">
      <fieldset id="signup-step-1" class="animated fadeInRight text-left" style="box-shadow: 0 10px 40px 0 rgb(62 57 107 / 0%), 0 2px 9px 0 rgb(62 57 107 / 0%);">
         <div class="row text-left">
            <div class="col-lg-12 widget-list mb-0" id="address">
               <div class="from_address_panel">
                  <div class="card bg-white mr-b-10">
                     <div id="FromAddressPanel">
                     <?php if($itemcount->total > 0):  ?>
                        <div class="card-header text-center">
                           <h6 class="card-title mr-tb-10 d-inline-block" id="card_icon_sender">
                           <?php echo $lang['create-booking35']; ?> 
                           </h6>
                        </div>
                        <div class="card-header">
                           <div class="row">
                              <div class="col-md-3">
                                 <h6 class="card-title mr-l-50 mr-t-30 d-inline-block" id="card_icon_sender">
                                    TOTAL PARCELS <br/>
                                    <div class="text-center mr-t-10"><?php echo $itemcount->total; ?></div>
                                 </h6>
                              </div>
                              <div class="col-md-2">
                                 <h6 class="card-title mr-t-50 d-inline-block" id="card_icon_sender">
                                    = 
                                 </h6>
                              </div>
                              <div class="col-md-4">
                                 <h6 class="mr-l-50 mr-t-30 d-inline-block" id="card_icon_sender">
                                    &nbsp;&nbsp;TOTAL
                                 </h6>
                                 <div style="margin-left: -40px;">
                                    <h5 class="d-inline-block card-title"><?php echo $core->currency;?> <?php echo $itemcount->totalprice; ?></h5>
                                    <span class="d-inline-block">&nbsp;(including all service tax)</span>
                                 </div>
                              </div>
                              <div class="col-md-3 mr-t-30">
                                 <button class="btn btn-pink btn-3d" name="doupdate" type="submit">Make Payment<span><i class="icon-ok"></i></span></button>
                              </div>
                           </div>
                        </div>
                        <div class="card-header text-center">
                           <div class="">
                              <h6 class="d-inline-block" id="card_icon_sender">
                                 Estimated delivery duration: <span style="font-weight: 500;">3-5 working days</span>
                              </h6>
                           </div>
                           <div class="text-center">
                              <input type="checkbox" id="accept_checkbox" value="I accept" required><span>&nbsp; I accept the <a href="term-and-condition.php" style="font-weight: 600;" target="_blank">Terms and Conditions</a></span>
                           </div>
                        </div>
                        <?php else: ?>
                           <div class="card-header text-center">
                           <div class="" >       
                              <h6 class="d-inline-block" id="card_icon_sender">
                                 No Couriers available in your cart
                              </h6>
                           </div>
                           <div class="text-center">
                              <a class="btn btn-pink btn-3d" href="singleparcel.php" style="color:white;"><i class="list-icon fa fa-dashboard fs-18"></i>Add More Couriers</a>
                           </div>
                        </div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </fieldset>
      </form>
      <?php if($itemcount->total > 0):  ?>
      <fieldset id="signup-step-2" class="animated fadeInRight mr-t-30 text-left" style="box-shadow: 0 10px 40px 0 rgb(62 57 107 / 0%), 0 2px 9px 0 rgb(62 57 107 / 0%);">
         <div id="quote_result" class="static_p section mt-b-10">
            <style>
               .raya.ribbon {
               position: absolute;
               left: -5px;
               top: -5px;
               z-index: 1;
               overflow: hidden;
               width: 75px;
               height: 75px;
               text-align: right;
               }
               .raya.ribbon span{
               font-size: 10px;
               font-weight: 700;
               color: #f7278c;
               text-transform: uppercase;
               text-align: center;
               line-height: 20px;
               transform: rotate(-45deg);
               -webkit-transform: rotate(-45deg);
               width: 85px;
               display: block;
               background: #ffea42;
               background: linear-gradient(#ffea42 0%,#ffda00 100%);
               box-shadow: 0 3px 10px -5px rgba(0,0,0,1);
               position: absolute;
               top: 14px;
               left: -19px;
               }
               .raya.ribbon span::before {
               content: "";
               position: absolute;
               left: 0px;
               top: 100%;
               z-index: -1;
               border-left: 3px solid #c7b419;
               border-right: 3px solid transparent;
               border-bottom: 3px solid transparent;
               border-top: 3px solid #c7b419;
               }
               .raya.ribbon span::after {
               content: "";
               position: absolute;
               right: 0px;
               top: 100%;
               z-index: -1;
               border-left: 3px solid transparent;
               border-right: 3px solid #c7b419;
               border-bottom: 3px solid transparent;
               border-top: 3px solid #c7b419;
               }
               .janio.ribbon {
               position: absolute;
               left: -5px;
               top: -5px;
               z-index: 1;
               overflow: hidden;
               width: 75px;
               height: 75px;
               text-align: right;
               }
               .janio.ribbon span{
               font-size: 10px;
               font-weight: 700;
               color: #ffffff;
               text-align: center;
               line-height: 20px;
               transform: rotate(-45deg);
               -webkit-transform: rotate(-45deg);
               width: 100px;
               display: block;
               background: #4439cc;
               background: linear-gradient(#4439cc 0%,#2e2879 100%);
               box-shadow: 0 3px 10px -5px rgba(0,0,0,1);
               position: absolute;
               top: 19px;
               left: -22px;
               }
               .janio.ribbon span::before {
               content: "";
               position: absolute;
               left: 0px;
               top: 100%;
               z-index: -1;
               border-left: 3px solid #151144;
               border-right: 3px solid transparent;
               border-bottom: 3px solid transparent;
               border-top: 3px solid #151144;
               }
               .janio.ribbon span::after {
               content: "";
               position: absolute;
               right: 0px;
               top: 100%;
               z-index: -1;
               border-left: 3px solid transparent;
               border-right: 3px solid #151144;
               border-bottom: 3px solid transparent;
               border-top: 3px solid #151144;
               }
               @keyframes spinner {
               to {transform: rotate(360deg);}
               }  
               .spinner:before {
               content: '';
               box-sizing: border-box;
               position: absolute;
               top: 50%;
               left: 50%;
               width: 20px;
               height: 20px;
               margin-top: -10px;
               margin-left: -10px;
               border-radius: 50%;
               border: 2px solid #ccc;
               border-top-color: #333;
               animation: spinner .6s linear infinite;
               }
               thead.quote_result_hearder_wrapper th {
               position: relative;
               }
               #sorting thead tr th span:before, #sorting thead tr th.headerSortUp span:before, #sorting thead tr th.headerSortDown span:before{
               position: absolute;
               top: 50%;
               right: 0.71429em;
               -webkit-transform: translateY(-50%);
               transform: translateY(-50%);
               font-family: "Material Icons";
               -webkit-font-feature-settings: 'liga';
               font-feature-settings: 'liga';
               /*font-size: 1.28571em;*/
               }
               #sorting thead tr th span:before{
               content: 'sort';
               opacity: 0.2;
               }
               #sorting thead tr th.headerSortUp span:before {
               content: 'expand_less';
               opacity: 1;
               }
               #sorting thead tr th.headerSortDown span:before {
               content: 'expand_more'; 
               opacity: 1;
               }
               .select2-dropdown {
               width: 205px !important;
               }
               .swal2-modal{
               margin-top: -277px !important;
               } 
               .coming-soon-courier {
               -webkit-filter: grayscale(100%);
               filter: grayscale(100%);
               background-color: #f0f0f0 !important;
               }
               .prime-featured .badge.bg-success {
               background-color: #009933 !important;
               border-color: #009933 !important;
               font-weight: 700;
               }
               .fidget { 
               display: inline-block;
               }
               .bounce {
               width: 10px;
               height: 10px;
               /* background-color: #333; */
               background: #000;
               border-radius: 100%;
               display: inline-block;
               margin-left: 4px;
               margin-right: 4px;
               -webkit-animation: bouncesize 1.4s infinite ease-in-out both;
               animation: bouncesize 1.4s infinite ease-in-out both;
               }
               .fidget .bounce:first-child {
               -webkit-animation-delay: -0.32s;
               animation-delay: -0.32s;
               }
               .fidget .bounce:nth-child(2) {
               -webkit-animation-delay: -0.16s;
               animation-delay: -0.16s;
               }
               @-webkit-keyframes bouncesize {
               0%, 80%, 100% { -webkit-transform: scale(0) }
               40% { -webkit-transform: scale(1.0) }
               }
               @keyframes bouncesize {
               0%, 80%, 100% { 
               -webkit-transform: scale(0);
               transform: scale(0);
               } 40% { 
               -webkit-transform: scale(1.0);
               transform: scale(1.0);
               }
               }
               .loadingOverlay {
               position: relative;
               }
               .loadingOverlay:before {
               /* background-color: white; */
               top: 0;
               left: 0;
               cursor: wait;
               z-index: 97;
               margin: auto;
               width: auto;
               content: "";
               display: block;
               position: absolute;
               width: 100%;
               height: 100%;
               opacity: 0;
               }
               .loadingOverlay * {
               opacity: .3;
               }
               .dropdown-menu.btn-promorate-drop {
               padding: 20px 0 10px;
               }
               .dropdown-menu.btn-promorate-drop .dropdown-item {
               display: block;
               width: 100%;
               padding: 5px 20px;
               clear: both;
               font-weight: 400;
               color: #888;
               text-align: inherit;
               white-space: nowrap;
               background: none;
               border: 0;
               cursor: pointer;
               }
               .dropdown-menu.btn-promorate-drop .dropdown-item:hover {
               background-color: #f8f9fa;
               }
               .btn .caret {
               margin-left: 5px;
               }
               .caret {
               display: inline-block;
               width: 0;
               height: 0;
               margin-left: 2px;
               vertical-align: middle;
               border-top: 4px dashed;
               border-top: 4px solid \9;
               border-right: 4px solid transparent;
               border-left: 4px solid transparent;
               }
               a.pgeon-prime-free-label {
               position: absolute;
               right: -34px;
               top: -30px;
               }
               .uppercase{
                  text-transform: uppercase;
               }
               .checkbox span.label-text-uncheck:after {border: 2px solid #e6614f;}
               @media screen and (max-width:767px) {
               a.pgeon-prime-free-label {
               right: -45px;
               }
               }
            </style>
            <section style="background-color: #F5E1FD;">
               <div id="quote_list_wrapper" class="collapse content-blockUI show">
                  <div class="">
                     <table id="sorting" class="table mail-list quote_result_wrapper tablesorter">
                        <thead class="quote_result_hearder_wrapper">
                           <tr>
                              <th></th>
                              <th class="header"><?php echo $lang['parcel_number']; ?> <span></span></th>
                              <th class="header"><?php echo $lang['service_type'];?> <span></span></th>
                              <th class="header"><?php echo $lang['booking-sender'];?></th>
                              <th class="header"><?php echo $lang['booking-recipient'];?></th>
                              <th class="header"><?php echo $lang['conlist-title72'];?></th>
                              <th class="header text-center"><?php echo $lang['aaction'];?> <img src="../uploads/tooltip.svg" data-toggle="tooltip" data-html="true" data-placement="top" title="<?php echo cleanOut($rate->title14);?>"></th>
                              </th>
                           </tr>
                        </thead>
                        <tbody id="detail">
                           <?php if(!$p_courierlist):?>
                           <tr class=" prime-featured" style="text-align:center">
                              <td colspan="7">
                                 <?php echo "
                                    <i align='center' class='display-3 text-warning d-block text-center'><img src='". ADMINURL ."/assets/images/alert/ohh_shipment_rate.png' width='130' /></i>	No Results found.				
                                    ",false;?>
                              </td>
                           </tr>
                           <?php else:
                              $count 
                              
                              = 1;
                              ?>
                           <?php foreach ($p_courierlist as $rowc):?>
                           <tr class=" prime-featured">
                              <td class="d-none d-md-table-cell"></td>
                              <td class="quote_deliver_duration_wrapper d-none d-lg-table-cell">
                                 <div class="text-muted"><?php echo $rowc['tracking']; ?>
                                    <br><small data-original-title="" title=""></small>
                                 </div>
                              </td>

                              <td class="quote_deliver_duration_wrapper d-none d-lg-table-cell">
                                 <div class="text-muted"><?php if((int)$rowc['delivery_type'] == 1){ echo 'Point to Point'; }if((int)$rowc['delivery_type'] == 2) { echo  'Point to Door'; } if((int)$rowc['delivery_type'] == 3) { echo 'Door to Point'; } if( (int)$rowc['delivery_type'] == 4) { echo 'Door to Door'; } ?>
                                    <br><small data-original-title="" title=""></small>
                                 </div>
                              </td>
                              <td class="quote_deliver_duration_wrapper d-none d-lg-table-cell">
                                 <?php if($rowc['delivery_type'] == '1' || $rowc['delivery_type'] == '2'){ ?>
                                 <div class="text-muted"><?php echo $booking->getBranchName($rowc['s_branch_id']) ?>
                                    <br><small data-original-title="" title=""></small>
                                 </div>
                                 <?php }else if($rowc['delivery_type'] == '3' || $rowc['delivery_type'] == '4'){ ?>
                                    <div class="text-muted"><?php echo $rowc['address'] . (!empty($rowc['city']) ? ', ' . $rowc['city'] :  '') . $booking->getStateName($rowc['s_state']) . (!empty($rowc['postal']) ? ' - ' . $rowc['postal'] :  '') ?>
                                    <br><small data-original-title="" title=""></small>
                                 </div>
                                 <?php } ?>
                              </td>
                              <td class="quote_deliver_duration_wrapper d-none d-lg-table-cell">
                                 <?php if($rowc['delivery_type'] == '1' || $rowc['delivery_type'] == '3'){ ?>
                                 <div class="text-muted"><?php echo $booking->getBranchName($rowc['r_branch_id']); ?>
                                    <br><small data-original-title="" title=""></small>
                                 </div>
                                 <?php }else if($rowc['delivery_type'] == '2' || $rowc['delivery_type'] == '4'){ ?>
                                    <div class="text-muted"><?php echo $rowc['r_address'] . (!empty($rowc['r_city']) ? ', ' . $rowc['r_city'] :  '') . $booking->getStateName($rowc['r_state'])  . (!empty($rowc['r_postal']) ? ' - ' . $rowc['r_postal'] :  ''); ?>
                                    <br><small data-original-title="" title=""></small>
                                 </div>
                                 <?php } ?>
                              </td>
                              <td class="d-none d-md-table-cell package_selection" id="package1496"><a href="#" ><?php echo $core->currency;?><?php echo $rowc['r_costtotal'];?></a></td> 
                              
                              <td class="text-center d-none d-md-table-cell"><a class="btn btn-3d tbl-btn-pink btn-block next-btn" href="<?php echo ADMINURL; ?>/bookings.php?do=bookings&id=<?php echo $rowc['courier']; ?>&b_id=<?php echo $rowc['id']; ?>"><?php echo $lang['conlist-title11'];?></a>
                              <a class="btn btn-3d tbl-btn-pink btn-block next-btn" href="<?php echo ADMINURL; ?>/paymentinfo.php?do=removebooking&b_id=<?php echo $rowc['id']; ?>"><?php echo $lang['conlist-title12'];?></a></td>
                              
                           </tr>
                           <?php $count++; endforeach; endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </section>
         </div>
      </fieldset>
      <?php endif;  ?>
      <!-- ============================================================== -->
      <!-- footer                     -->
      <!-- ============================================================== -->
      <?php include 'footer.php'; ?>