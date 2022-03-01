<?php
   //************************************************************
   // Customer My Profile : Page                                  **
   // Authorized by customer only                                **
   //************************************************************
   
   define("_VALID_PHP", true);
   require_once "../init.php";
   if(isset($_GET['weight']))
      $weight = $_GET['weight'];
   $booking = Booking::instance();
   $editbookingdata = '';
   if (!$user->logged_in) {
       //method get
       $coruer_id = $_GET['id'];
       $lenght = $_GET['length'];
       $width = $_GET['width'];
       $height = $_GET['height'];
       $type = $_GET['type'];
       $scountry = $_GET['scountry'];
   
       redirect_to(
         SITEURL . "login.php?cid=$coruer_id&weight=$weight&length=$lenght&height=$height&width=$width&type=$type&scountry=$scountry"
       );
   }
   if (isset($_GET['b_id'])) {
      $booking->b_id = $_GET['b_id'];
      $editbookingdata = $booking->getCourier_edit_booking();
   }
   if (isset($_GET['id'])) {
       //$courier_detail = $core->preAutoFiled($_GET['id']);
       $id = $_GET["id"];
       $sql = "SELECT * FROM courier_rate WHERE Id='$id'";
       $courierdetail = $db->first($sql);
   }
   
   $userdata = $user->getUserData();
   $courierrow = $core->getCouriercom();
   $branches = $booking->getCompany_branches();


   $packrow = $core->getPack();
   $payrow = $core->getPayment();
   $itemcatrow = $core->getItem();
   $moderow = $core->getShipmode();


   if (isset($_POST['do_booking'])):
      if (intval($_POST['do_booking']) == 0 || empty($_POST['do_booking'])):
       echo Filter::msgAlert("<span>Alert!</span>We are sorry, due to site incovenience Booking is not allowed");
        endif;
     
     $booking_param = Array();
     foreach($_POST as $key => $value) {
      $booking_param[$key] = $value;
    }
    $booking->formdata = $_POST;
    $b_id = $booking->processBooking();
    
    if(!empty($b_id)):
       redirect_to("PaymentInfo.php?b_id=" . $b_id . "&c_id=" . $id);
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
                     <h5 class="m-0 mr-r-5"><?php echo $lang['booking-detail1'] .
                        ' ' .
                        $lang['single_parcel'] .
                        ' ' .
                        $courierdetail->deli_type_text; ?></h5>
                  </div>
               </div>
               <div class="row clearfix">
                  <div class="col-md-12 steps-tab clearfix d-none d-md-block" data-target="#multi-step-signup" style="position: sticky">
                     <ul class="list-unstyled list-inline text-center">
                        <li class="list-inline-item done"><a class="text-info" href="singleparcel.php"><span class="step">1</span></a> </li>
                        <li class="list-inline-item active"><a class="text-info"><span class="step">2</span></a> </li>
                        <li class="list-inline-item "><a class="text-info"><span class="step">3</span></a> </li>
                        <li class="list-inline-item "><a class="text-info"><span class="step">4</span></a> </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- ============================================================== -->
         <!-- fieldset fluid  Sender Details for Booking                     -->
         <!-- ============================================================== -->
         <form method="POST" id="booking_form" name="booking_form" class="xform">
         <fieldset id="signup-step-1" class="animated fadeInRight text-left">
            <div class="row text-left">
               <div class="col-lg-12 widget-list mb-0" id="address">
                  <div class="from_address_panel">
                     <div class="card bg-white mr-b-10">
                        <div id="FromAddressPanel">
                           <div class="FromAddressPanel_load"></div>
                           <div class="card-header">
                              <h6 class="card-title mr-tb-10 d-inline-block" id="card_icon_sender">
                                 <div class="parceldetails-stepbystep" id="round_icon_sender">
                                    <p class="fw-600 text-muted text-center m-0">a</p>
                                    <?php if($courierdetail->deli_type == 1 || $courierdetail->deli_type == 2): ?>
                                 </div>
                                 Choose your nearest drop-off Points 
                              </h6>
                              <?php else: ?>
                           </div>
                           Enter your Address to pick-up Parcel</h6>
                           <?php endif; ?>
                           <!-- <i class="material-icons list-icon ripple" style="top: 0.3130rem;">keyboard_arrow_down</i> -->
                        </div>
                        <div class="card-body border-0 pt-0">
                           <div class="row">
                              <div class="tabs tabs-bordered select_your_delivery_method col-md-12">
                                 <div class="tab-content">
                                    <div class="tab-pane widget-bg p-0 active" id="courier_pick_up">
                                       <div class="row">
                                          <?php if($courierdetail->deli_type == 1 || $courierdetail->deli_type == 2): ?>
                                          <div class="col-12">
                                             <p class="mb-0">you will drop-off the parcel to our nearest branch.</p>
                                          </div>
                                          <?php else: ?>
                                          <div class="col-12">
                                             <p class="mb-0">our courier boy will pickup parcel from your specified address.</p>
                                          </div>
                                          <?php endif; ?>
                                       </div>
                                    </div>
                                    <?php if($courierdetail->deli_type == 1 || $courierdetail->deli_type == 2): ?>
                                    <hr/>
                                    <div class="warning_dropoff_panel">
                                       <div class="col-md-12" id="pgeonchoosepoint">
                                          <div class="potins_wrapper user-card mb-0">
                                             <div class="form-group" id="dropoff_pgeon_points_details_modal">
                                                <label class="control-label padding-off col-md-8">Select drop off location: </label>
                                                <div class="from-dropdown col-md-10" id="address">
                                                   <select class="form-control"  id="dropoff_branch" name="dropoff_branch" data-live-search="true" data-live-search-style="startsWith" title="Select your option" data-live-search-placeholder="Select your option" data-style="btn btn-outline-default" tabindex='1'>
                                                   <?php foreach ($branches as $row):?>
											                     <option value="<?php echo $row->Id; ?>"><?php echo $row->Name; ?></option>
											                  <?php endforeach;?>
                                                    
                                                   </select>
                                                   <input type="hidden" class="form-control" id="hdndropoffbranch" name="hdndropoffbranch" value="">
                                                   <input type="hidden" class="form-control" id="cpickupname" name="cpickupname" value="<?php echo $userdata->username; ?>">
                                                   <input type="hidden" class="form-control" id="cpickupemail" name="cpickupemail"  value="<?php echo $userdata->email; ?>">
                                                   <input  type="hidden" id="cpickupmobilecode" name="cpickupmobilecode" value="<?php echo $userdata->code_phone; ?>">
                                                   <input  type="hidden"  id="cpickupmobile" name="cpickupmobile" value="<?php echo $userdata->phone; ?>">
                                                   <input type="hidden" class="form-control" id="cpickupcompany" name="cpickupcompany" value="">
                                                   <input  type="hidden" id="cpickupmobilealtcode" name="cpickupmobilealtcode" value="" >
                                                   <input type="hidden" id="cpickupmobileAlt" name="cpickupmobileAlt" value="">
                                                   
                                                   <input type="hidden" name="cpickupaddr1" id="cpickupaddr1" value="">
                                                   <input type="hidden"  name="cpickupaddr2" id="cpickupaddr2"  value="">
                                                   <input type="hidden"  name="cpickupaddr3"  id="cpickupaddr3"  value="">
                                                   <input type="hidden"   id="cpickupcity" name="cpickupcity"  value="">
                                                   <input type="hidden"   id="pickupstate" name="pickupstate"  value="<?php echo !empty($courierdetail->FromPoint) ? $courierdetail->FromPoint : ''; ?>">
                                                   <input type="hidden"  id="cpickuppostcode" name="cpickuppostcode"  value="<?php echo !empty($courierdetail->FromZip) ? $courierdetail->FromZip : ''; ?>" >
                                                   



                                                   <!-- hi -->
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php endif; if($courierdetail->deli_type == 3 || $courierdetail->deli_type == 4): ?>
                           <div id="sender_panel" style="display: block;">
                              <hr>
                              <div class="row">
                                 <div class="col-md-12">
                                    <label class="mb-0 checkbox-checked mb-2"><span id="sender_address_text">Pick Up Address</span>
                                    <small class="question_tooltip" id="sender_address_text" data-toggle="tooltip" data-placement="top" data-original-title="In case there is a parcel return, it will be returned to this address"><i class="material-icons fs-16">help_outline</i>
                                    </small>
                                    </label>
                                 </div>
                              </div>
                              <div class="row sender_detail_wrapper">
                                 <div class="col-md-4 col-sm-6">
                                    <div class="form-group mb-2">
                                       <div class="input-group">
                                          <div class="input-group-addon"><i class="material-icons">person</i> </div>
                                          <input type="text" class="form-control" id="cpickupname" name="cpickupname" txt_c_name="" placeholder="Sender Name" value="<?php echo !empty($editbookingdata->s_name) ? $editbookingdata->s_name : ''; ?>" required>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6 pl-0">
                                    <div class="form-group mb-2">
                                       <div class="input-group">
                                          <div class="input-group-addon"><i class="material-icons">mail_outline</i> </div>
                                          <input type="text" class="form-control" txt_c_email="" id="cpickupemail" name="cpickupemail" placeholder="Email Address" value="" onchange="validateEmail(this)" required>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6 pl-0 phone_input">
                                    <div class="form-group mb-2">
                                       <div class="input-group">
                                          <div class="input-group-btn">
                                             <button class="btn btn-outline-default dropdown-toggle pd-lr-10" id="cmobilecode" data-value="MY" data-toggle="dropdown" type="button" aria-expanded="false"><img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia flag" id="cmobilecodeimage" height="12px"><i class="material-icons fs-18">arrow_drop_down</i> </button>
                                             <div class="dropdown-menu pt-2" x-placement="bottom-start pt-2">
                                                <a class="dropdown-item" href="javascript: void(0);" data-value="MY" onclick="changecMobileCountry(this)">
                                                <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia flag" data-value="MY" height="14px"><span class="mr-l-10"> +60</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript: void(0);" data-value="SG" onclick="changecMobileCountry(this)">
                                                <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/singapore-flag.jpg" alt="singapore flag" data-value="SG" height="14px"><span class="mr-l-10"> +65</span>
                                                </a>
                                             </div>
                                          </div>
                                          <input class="form-control contactnumber p-2" type="text" id="cpickupmobilecode" name="cpickupmobilecode" value="+60" readonly="" required>
                                          <input class="form-control" type="text" txt_c_contact="" placeholder="" id="cpickupmobile" name="cpickupmobile" data-depend="cmobilecode" value="" onchange="validateNumber(this)" maxlength="false" required>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6">
                                    <div class="form-group mb-2">
                                       <div class="btn-group bootstrap-select form-control">
                                          <select id="selectpickerFrom" class="form-control select2-hidden-accessible" tabindex="-1" onchange="changeFromAddressPanel(this);" disabled="" aria-hidden="true">
                                             <option value="Malaysia" selected="">Malaysia</option>
                                          </select>
                                          <span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" style="width: 0.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-selectpickerFrom-container"><span class="select2-selection__rendered" id="select2-selectpickerFrom-container" title="Malaysia">Malaysia</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6 pl-0">
                                    <div class="form-group mb-2">
                                       <div class="input-group">
                                          <div class="input-group-addon"><i class="material-icons">card_travel</i> </div>
                                          <input type="text" class="form-control" txt_c_company="" id="cpickupcompany" name="cpickupcompany" placeholder="Company" value="">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6 pl-0 phone_input d-none d-md-block">
                                    <div class="form-group mb-2">
                                       <div class="input-group">
                                          <div class="input-group-btn">
                                             <button class="btn btn-outline-default dropdown-toggle pd-lr-10" id="cmobilealtcode" data-value="MY" data-toggle="dropdown" type="button" aria-expanded="false"><img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia-flag" id="cmobilealtcodeimage" height="12px"><i class="material-icons fs-18">arrow_drop_down</i> </button>
                                             <div class="dropdown-menu pt-2" x-placement="bottom-start pt-2">
                                                <a class="dropdown-item" href="javascript: void(0);" data-value="MY" onclick="changecMobileAltCountry(this)">
                                                <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia flag" data-value="MY" height="14px"><span class="mr-l-10"> +60</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript: void(0);" data-value="SG" onclick="changecMobileAltCountry(this)">
                                                <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/singapore-flag.jpg" alt="singapore flag" data-value="SG" height="14px"><span class="mr-l-10"> +65</span>
                                                </a>
                                             </div>
                                          </div>
                                          <input class="form-control contactnumber p-2" type="text" id="cpickupmobilealtcode" name="cpickupmobilealtcode" value="+60" readonly="">
                                          <input class="form-control" type="text" txt_c_alt_contact="" placeholder="Alt. Contact No." id="cpickupmobileAlt" name="cpickupmobileAlt" data-depend="cmobilealtcode" value="" onchange="validateNumber(this)">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6">
                                    <div class="form-group mb-2">
                                       <input type="text" class="form-control" name="cpickupaddr1" id="cpickupaddr1" txt_c_addr_line1="" placeholder="Apt No., House Number..." maxlength="70" value="" required>
                                    </div>
                                 </div>
                                 <div class="col-md-8 col-sm-6">
                                    <div class="form-group mb-2">
                                       <input type="text" class="form-control" name="cpickupaddr2" id="cpickupaddr2" txt_c_addr_line1="" placeholder="Street Name, Street Number..." maxlength="70" value="">
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6 pl-0">
                                    <div class="form-group mb-2">
                                       <input type="text" class="form-control" name="cpickupaddr3" txt_c_addr_line2="" id="cpickupaddr3" placeholder="Address - Line 3" maxlength="70" value="">
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6">
                                    <div class="form-group mb-2 input-has-value">
                                       <input type="text" class="form-control" txt_c_city="" id="cpickupcity" name="cpickupcity" placeholder="City" value="" required>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6 pl-0">
                                    <div class="form-group mb-2 input-has-value">
                                       <input type="text" class="form-control" txt_c_postcode="" id="cpickuppostcode" id="cpickuppostcode" placeholder="Postcode" value="<?php echo !empty($courierdetail->FromZip) ? $courierdetail->FromZip : ''; ?>" data-type="cstate" required>
                                    </div>
                                 </div>
                                 <div class="col-md-4 col-sm-6 pl-0">
                                    <div class="form-group mb-2">
                                       <select class="form-control select2-hidden-accessible" name="cpickupstate" id="cpickupstate" disabled="" tabindex="-1" aria-hidden="true" required>
                                          <option value="0">--Select State--</option>
                                          <option value="1">Johor</option>
                                          <option value="2">Kedah</option>
                                          <option value="3">Kelantan</option>
                                          <option value="4">Melaka</option>
                                          <option value="5">Negeri Sembilan</option>
                                          <option value="6">Pahang</option>
                                          <option value="7">Perak</option>
                                          <option value="8">Perlis</option>
                                          <option value="9">Pulau Pinang</option>
                                          <option value="9">Selangor</option>
                                          <option value="10">Terengganu</option>
                                          <option value="11">Kuala Lumpur</option>
                                          <option value="12">Putra Jaya</option>
                                          <option value="13">Sarawak</option>
                                          <option value="14">Sabah</option>
                                          <option value="15">Labuan</option>
                                       </select>
                                       </select>
                                       <input type="hidden"   id="pickupstate" name="pickupstate"  value="<?php echo !empty($editbookingdata->s_state) ? $editbookingdata->s_state : !empty($courierdetail->FromPoint) ? $courierdetail->FromPoint : ''; ?>">
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
      <?php endif; ?>
      </fieldset>
      <!-- ============================================================== -->
      <!-- fieldset fluid  Receiver Details for Booking                 -->
      <!-- ============================================================== -->
      <fieldset id="signup-step-2" class="animated fadeInRight text-left">
         <div class="row text-left">
            <div class="col-lg-12 widget-list mb-0" id="address">
               <div class="from_address_panel">
                  <div class="card bg-white mr-b-10">
                     <div id="FromAddressPanel">
                        <div class="FromAddressPanel_load"></div>
                        <div class="card-header">
                           <h6 class="card-title mr-tb-10 d-inline-block" id="card_icon_sender">
                              <div class="parceldetails-stepbystep" id="round_icon_sender">
                                 <p class="fw-600 text-muted text-center m-0">b</p>
                                 <?php if($courierdetail->deli_type == 2 || $courierdetail->deli_type == 4): ?>
                              </div>
                              Enter your Address to drop-off Parcel
                           </h6>
                           </h6>
                           <?php else: ?>
                        </div>
                        Choose your nearest pick-up Points </h6>
                        <?php endif; ?>
                        <!-- <i class="material-icons list-icon ripple" style="top: 0.3130rem;">keyboard_arrow_down</i> -->
                     </div>
                     <div class="card-body border-0 pt-0">
                        <div class="row">
                           <div class="tabs tabs-bordered select_your_delivery_method col-md-12">
                              <div class="tab-content">
                                 <div class="tab-pane widget-bg p-0 active" id="courier_pick_up">
                                    <div class="row">
                                       <?php if($courierdetail->deli_type == 2 || $courierdetail->deli_type == 4): ?>
                                       <div class="col-12">
                                          <p class="mb-0">our courier boy will drop the parcel at specified address.</p>
                                       </div>
                                       <?php else: ?>
                                       <div class="col-12">
                                          <p class="mb-0">you will pick-up the parcel from our nearest branch.</p>
                                       </div>
                                       <?php endif; ?>
                                    </div>
                                 </div>
                                 <?php if($courierdetail->deli_type == 1 || $courierdetail->deli_type == 3): ?>
                                 <hr/>
                                 <!-- <div class="warning_dropoff_panel"> -->
                                    <div class="col-md-12" id="pgeonchoosepoint">
                                       <div class="potins_wrapper user-card mb-0">
                                          <div class="form-group mb-2">
                                             <label class="control-label padding-off col-md-8">Select pick-up location: </label>
                                             <div class="from-dropdown col-md-10" id="address">
                                                <select class="form-control"  id="pickup_branch" name="pickup_branch"  title="Select your option" tabindex='1' required>
                                                <?php foreach ($branches as $row):?>
											                     <option value="<?php echo $row->Id; ?>"><?php echo $row->Name; ?></option>
											                  <?php endforeach;?>
                                                </select>
                                                <input type="hidden" class="form-control" id="hdnpickupbranch" name="hdnpickupbranch" value="">
                                                <input type="hidden" class="form-control" id="cdropoffname" name="cdropoffname" value="<?php echo $userdata->username; ?>">
                                                   <input type="hidden" class="form-control" id="cdropoffemail" name="cdropoffemail"  value="<?php echo $userdata->email; ?>">
                                                   <input  type="hidden" id="cdropoffmobilecode" name="cdropoffmobilecode" value="<?php echo $userdata->code_phone; ?>">
                                                   <input  type="hidden"  id="cdropoffmobile" name="cdropoffmobile" value="<?php echo $userdata->phone; ?>">
                                                   <input type="hidden" class="form-control" id="cdropoffcompany" name="cdropoffcompany" value="">
                                                   <input  type="hidden" id="cdropoffmobilealtcode" name="cdropoffmobilealtcode" value="" >
                                                   <input type="hidden" id="cpickupmobileAltcdropoffmobileAlt" name="cdropoffmobileAlt" value="">
                                                   
                                                   <input type="hidden" class="form-control" name="cdropoffaddr1" id="cdropoffaddr1" value="">
                                                   <input type="hidden"  name="cdropoffaddr2" id="cdropoffaddr2"  value="">
                                                   <input type="hidden"  name="cdropoffaddr3"  id="cdropoffaddr3"  value="">
                                                   <input type="hidden"   id="cdropoffcity" name="cdropoffcity"  value="">
                                                   <input type="hidden"   id="cdropoffpostcode" name="cdropoffpostcode" value="<?php echo !empty($courierdetail->ToZip) ? $courierdetail->ToZip : ''; ?>" >
                                                   <input type="hidden"   id="dropoffstate" name="dropoffstate"  value="<?php echo !empty($courierdetail->ToPoint) ? $courierdetail->ToPoint : ''; ?>">
                                                   
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php endif; if($courierdetail->deli_type == 2 || $courierdetail->deli_type == 4): ?>
                        <div id="Receiver_panel" style="display: block;">
                           <hr>
                           <div class="row">
                              <div class="col-md-12">
                                 <label class="mb-0 checkbox-checked mb-2"><span id="sender_address_text">Drop-Off Address</span>
                                 <small class="question_tooltip" id="sender_address_text" data-toggle="tooltip" data-placement="top" data-original-title="In case there is a parcel return, it will be returned to this address"><i class="material-icons fs-16">help_outline</i>
                                 </small>
                                 </label>
                              </div>
                           </div>
                           <div class="row sender_detail_wrapper">
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group mb-2">
                                    <div class="input-group">
                                       <div class="input-group-addon"><i class="material-icons">person</i> </div>
                                       <input type="text" class="form-control" id="cdropoffname" name="cdropoffname" txt_c_name="" placeholder="Recipient Name" value="<?php echo !empty($editbookingdata->r_name) ? $editbookingdata->r_name : ''; ?>" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0">
                                 <div class="form-group mb-2">
                                    <div class="input-group">
                                       <div class="input-group-addon"><i class="material-icons">mail_outline</i> </div>
                                       <input type="text" class="form-control" txt_c_email="" id="cdropoffemail" name="cdropoffemail" placeholder="Email Address" value="<?php echo !empty($editbookingdata->r_email) ? $editbookingdata->r_email : ''; ?>" onchange="validateEmail(this)" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0 phone_input">
                                 <div class="form-group mb-2">
                                    <div class="input-group">
                                       <div class="input-group-btn">
                                          <button class="btn btn-outline-default dropdown-toggle pd-lr-10" id="cmobilecode" data-value="MY" data-toggle="dropdown" type="button" aria-expanded="false"><img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia flag" id="cmobilecodeimage" height="12px"><i class="material-icons fs-18">arrow_drop_down</i> </button>
                                          <div class="dropdown-menu pt-2" x-placement="bottom-start pt-2">
                                             <a class="dropdown-item" href="javascript: void(0);" data-value="MY" onclick="changecMobileCountry(this)">
                                             <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia flag" data-value="MY" height="14px"><span class="mr-l-10"> +60</span>
                                             </a>
                                             <a class="dropdown-item" href="javascript: void(0);" data-value="SG" onclick="changecMobileCountry(this)">
                                             <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/singapore-flag.jpg" alt="singapore flag" data-value="SG" height="14px"><span class="mr-l-10"> +65</span>
                                             </a>
                                          </div>
                                       </div>
                                       <input class="form-control contactnumber p-2" type="text" id="cdropoffmobilecode" name="cdropoffmobilecode" value="+60" readonly="" maxlength="3" required>
                                       <input class="form-control" type="text"  placeholder="" id="cdropoffmobile" name="cdropoffmobile" data-depend="cmobilecode" maxlength="10" value="<?php echo !empty($editbookingdata->r_phone) ? $editbookingdata->r_phone : ''; ?>" onchange="validateNumber(this)" maxlength="false" required>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group mb-2">
                                    <div class="btn-group bootstrap-select form-control">
                                       <select id="selectpickerFrom" class="form-control select2-hidden-accessible" tabindex="-1" onchange="changeFromAddressPanel(this);" disabled="" aria-hidden="true">
                                          <option value="Malaysia" selected="">Malaysia</option>
                                       </select>
                                       <span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" style="width: 0.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-selectpickerFrom-container"><span class="select2-selection__rendered" id="select2-selectpickerFrom-container" title="Malaysia">Malaysia</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0">
                                 <div class="form-group mb-2">
                                    <div class="input-group">
                                       <div class="input-group-addon"><i class="material-icons">card_travel</i> </div>
                                       <input type="text" class="form-control" txt_c_company="" id="cdropoffcompany" name="cdropoffcompany" placeholder="Company" value="" >
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0 phone_input d-none d-md-block">
                                 <div class="form-group mb-2">
                                    <div class="input-group">
                                       <div class="input-group-btn">
                                          <button class="btn btn-outline-default dropdown-toggle pd-lr-10" id="cmobilealtcode" data-value="MY" data-toggle="dropdown" type="button" aria-expanded="false"><img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia-flag" id="cmobilealtcodeimage" height="12px"><i class="material-icons fs-18">arrow_drop_down</i> </button>
                                          <div class="dropdown-menu pt-2" x-placement="bottom-start pt-2">
                                             <a class="dropdown-item" href="javascript: void(0);" data-value="MY" onclick="changecMobileAltCountry(this)">
                                             <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="malaysia flag" data-value="MY" height="14px"><span class="mr-l-10"> +60</span>
                                             </a>
                                             <a class="dropdown-item" href="javascript: void(0);" data-value="SG" onclick="changecMobileAltCountry(this)">
                                             <img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/singapore-flag.jpg" alt="singapore flag" data-value="SG" height="14px"><span class="mr-l-10"> +65</span>
                                             </a>
                                          </div>
                                       </div>
                                       <input class="form-control contactnumber p-2" type="text" id="cdropoffmobilealtcode" namw="cdropoffmobilealtcode" value="+60" maxlength="3" readonly="">
                                       <input class="form-control" type="text" value="<?php echo !empty($editbookingdata->rc_phone) ? $editbookingdata->rc_phone : ''; ?>" placeholder="Alt. Contact No." id="cdropoffmobileAlt" name="cdropoffmobileAlt" data-depend="cmobilealtcode" maxlength="10">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group mb-2">
                                    <input type="text" class="form-control" id="cdropoffaddr1" name="cdropoffaddr1" value="<?php echo !empty($editbookingdata->r_address) ? $editbookingdata->r_address : ''; ?>" placeholder="Apt No., House Number..." maxlength="70" value="" required>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0">
                                 <div class="form-group mb-2">
                                    <input type="text" class="form-control" name="cdropoffaddr2" id="cdropoffaddr2" txt_c_addr_line2=""  placeholder="Street Name, Street Number..." maxlength="70" value="<?php echo !empty($editbookingdata->r_dest) ? $editbookingdata->r_dest : ''; ?>">
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0">
                                 <div class="form-group mb-2">
                                    <input type="text" class="form-control" name="cdropoffaddr3" id="cdropoffaddr3" txt_c_addr_line3=""  placeholder="Address - Line 3" maxlength="70" value="">
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group mb-2 input-has-value">
                                    <input type="text" class="form-control" txt_c_city="" id="cdropoffcity" name="cdropoffcity" placeholder="City" value="<?php echo !empty($editbookingdata->r_city) ? $editbookingdata->r_city : ''; ?>" required>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0">
                                 <div class="form-group mb-2 input-has-value">
                                    <input type="text" class="form-control" txt_c_postcode="" id="cdropoffpostcode" name="cdropoffpostcode" placeholder="Postcode" value="<?php echo !empty($editbookingdata->r_postal) ? $editbookingdata->r_postal : !empty($courierdetail->ToZip) ? $courierdetail->ToZip : ''; ?>" data-type="cstate" onchange="MYpostcode(this);" required>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6 pl-0">
                                 <div class="form-group mb-2">
                                    <select class="form-control" name="cdropoffstate" id="cdropoffstate" disabled="" tabindex="-1" required>
                                       <option value="0">--Select State--</option>
                                       <option value="1">Johor</option>
                                       <option value="2">Kedah</option>
                                       <option value="3">Kelantan</option>
                                       <option value="4">Melaka</option>
                                       <option value="5">Negeri Sembilan</option>
                                       <option value="6">Pahang</option>
                                       <option value="7">Perak</option>
                                       <option value="8">Perlis</option>
                                       <option value="9">Pulau Pinang</option>
                                       <option value="9">Selangor</option>
                                       <option value="10">Terengganu</option>
                                       <option value="11">Kuala Lumpur</option>
                                       <option value="12">Putra Jaya</option>
                                       <option value="13">Sarawak</option>
                                       <option value="14">Sabah</option>
                                       <option value="15">Labuan</option>
                                    </select>
                                    <input type="hidden"   id="dropoffstate" name="dropoffstate"  value="<?php echo !empty($editbookingdata->r_state) ? $editbookingdata->r_state : !empty($courierdetail->ToPoint) ? $courierdetail->ToPoint : ''; ?>">
                                 </div>
                              </div>
                           </div>
                           <!-- <hr>
                              <div class="checkbox checkbox-pink p-0">
                                 <label class="checkbox-checked">
                                 <input type="checkbox" checked="" id="defaultAddr_checkbox">
                                 <span class="label-text"> Set as profile address.</span>
                                 </label>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6 ml-auto text-right">
                                    <button class="btn btn-default btn-3d" onclick="BookFromProceed();">Next <i class="material-icons">keyboard_arrow_right</i></button>
                                 </div>
                              </div> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <?php endif; ?>
      </fieldset>
      <!-- ============================================================== -->
      <!-- fieldset fluid  Parcel Details for Booking                 -->
      <!-- ============================================================== -->
      <fieldset id="signup-step-3" class="animated fadeInRight text-left">
         <div class="row text-left">
            <div class="col-lg-12 widget-list mb-0" id="address">
               <div class="from_address_panel">
                  <div class="card bg-white mr-b-10">
                     <div id="FromAddressPanel">
                        <div class="FromAddressPanel_load"></div>
                        <div class="card-header">
                           <h6 class="card-title mr-tb-10 d-inline-block" id="card_icon_sender">
                              <div class="parceldetails-stepbystep" id="round_icon_sender">
                                 <p class="fw-600 text-muted text-center m-0">c</p>
                              </div>
                              Parcel Details for Booking
                           </h6>
                           <!-- <i class="material-icons list-icon ripple" style="top: 0.3130rem;">keyboard_arrow_down</i> -->
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group mb-2">
                                    <input type="text" id="parcel_content" name="parcel_content" class="form-control" placeholder="Parcel Content: Red Nike Shoes" value="" onchange="checkParcelContent(this);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Kindly provide us with a detailed description of parcel content. Eg, Red Nike Shoes instead of shoes.">
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group mb-2">
                                    <div class="input-group">
                                       <div class="input-group-addon"><?php echo $core->currency;?></div>
                                       <input type="text" class="form-control" maxlength="7" id="parcel_value" name="parcel_value" placeholder="Parcel value: 5.90" value="<?php echo !empty($editbookingdata->r_costtotal) ? $editbookingdata->r_costtotal : ''; ?>" onchange="checkInsuranceRate(this,false);" data-toggle="tooltip" data-placement="top" title="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                 <div class="form-group mb-2">
                                    <div class="input-group">
                                       <input type="text" class="form-control" maxlength="7" id="parcel_weight" name="parcel_weight" placeholder="Parcel Weight: 2" value="<?php echo !empty($editbookingdata->r_weight) ? $editbookingdata->r_weight : $weight; ?>"  data-toggle="tooltip" data-placement="top" title="" required>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 ml-auto text-right">
                                 <button class="btn btn-default btn-3d" onclick="ProceedNext();">Next <i class="material-icons">keyboard_arrow_right</i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <input type="hidden" name="do_booking" id="do_booking" value="1">
               <input type="hidden" name="delivery_type" id="delivery_type" value="<?php echo $courierdetail->deli_type; ?>">
               <input type="hidden" name="booking_rate" id="booking_rate" value="<?php echo !empty($editbookingdata->r_costtotal) ? $courierdetail->rate :  $courierdetail->rate; ?>">
               <input type="hidden" name="deli_time" id="deli_time" value="<?php echo $courierdetail->deli_time; ?>">
               <input type="hidden" name="b_id" id="b_id" value="<?php echo isset($_GET['b_id']) ?  $_GET['b_id'] : ''; ?>">
               <input type="hidden" name="user_name" id="user_name" value="<?php echo $userdata->username; ?>">
               <input type="hidden" name="user_id" id="user_id" value="<?php echo $userdata->id; ?>">
               <input type="hidden" name="c_id" id="c_id" value="<?php echo isset($_GET['id']) ?  $_GET['id'] : ''; ?>">
            </div>
         </div>
         </div>
      </fieldset>
      </form>
      
      <?php
         //(Filter::$do && file_exists(Filter::$do.".php")) ? include(Filter::$do.".php") : include("../account.php");
         ?>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- footer -->
      <script>
         $(document).ready(function(){
            $('select[name="dropoff_branch"] option[value="<?php echo !empty($editbookingdata->s_branch_id) ? $editbookingdata->s_branch_id :  '' ?>"]').attr('selected', 'selected');
            $('select[name="pickup_branch"] option[value="<?php echo !empty($editbookingdata->r_branch_id) ? $editbookingdata->r_branch_id :  '' ?>"]').attr('selected', 'selected');
             $('select[name="cstate"] option[value="<?php echo !empty($editbookingdata->s_state) ? $editbookingdata->s_state : !empty($courierdetail->FromPoint) ? $courierdetail->FromPoint : '' ?>"]').attr('selected', 'selected');
             $('select[name="cdropoffstate"] option[value="<?php echo !empty($editbookingdata->r_state) ? $editbookingdata->r_state : !empty($courierdetail->ToPoint) ? $courierdetail->ToPoint : ''; ?>"]').attr('selected', 'selected');
         });
         function ProceedNext(){
            debugger;
            $('#hdndropoffbranch').val($('select[name="dropoff_branch"] option:selected').val());
            $('#hdnpickupbranch').val($('select[name="pickup_branch"] option:selected').val());
         }
      </script>
      <?php include 'footer.php'; ?>