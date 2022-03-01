<?php
   //************************************************************
   // Customer My Profile : Page                                  **
   // Authorized by customer only                                **
   //************************************************************
   
   define("_VALID_PHP", true);
   require_once "../init.php";
   include_once '../lib/BookingClass.php';
   $booking = Booking::instance();   
   if (!$user->logged_in) {
       //method get
       redirect_to(
         SITEURL . "login.php"
       );
   }
      
   if (isset($_GET['b_id'])) {
       
       $id = $_GET["b_id"];
       $sql = "SELECT * FROM add_courier WHERE id='$id'";
       $courierdetail = $db->first($sql);
   }
   
    $userdata = $user->getUserData();
    $booking->uid = $userdata->id;
   $itemcount = $booking->getCounton();
   
    
   $ratesrow = array();
   
   // if (isset($_POST['do_booking'])):
   //    if (intval($_POST['do_booking']) == 0 || empty($_POST['do_booking'])):
   //     echo Filter::msgAlert("<span>Alert!</span>We are sorry, due to site incovenience Booking is not allowed");
   //      endif;
     
   //   $booking_param = Array();
   //   foreach($_POST as $key => $value) {
   //    $booking_param[$key] = $value;
   //  }
   //  $booking->formdata = $_POST;
   //  if($booking->processBooking()):
   //     redirect_to("index.php");
   //  endif;
   // endif;
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
      
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<script>
	/* global paypal */
		function pymnt_initiate(total, order, el , id) {
			paypal.Button.render({
				env: 'sandbox',
				style: {
					label: 'buynow',
					fundingicons: true, // optional
					branding: true, // optional
					size: 'small', // small | medium | large | responsive
					shape: 'rect', // pill | rect
					color: 'gold'   // gold | blue | silver | black
				},
				client: {
					sandbox: 'AVxPnwZTIW_UIK6bwF2bSKapzKZ6OWqvwMMWULgY36dyQlx_7q17VLNgtucOaQ1o1VMvdxjizdbd0s2-'//Ad7q8O4JlZHwQ8CZFe_rQwotXprvQElMFF6dz7VJAIbVjEwKULC5U_mNGfZZUbi3uopAEf-jWLfPisAf
					//production: '<?php echo $core->client_id ?>'//sb-td547t6233164@personal.example.com
				},
				commit: true,
				payment: function (data, actions) {
					return actions.payment.create({
						payment: {
							transactions: [
								{
									amount: {total: total, currency: 'USD'}
								}
							]
						}
					});
				},
				// onAuthorize() is called when the buyer approves the payment
				onAuthorize: function (data, actions) {
             debugger;
					// Make a call to the REST api to execute the payment
					return actions.payment.execute().then(function (payment) {

					  

						var path = "<?php echo SITEURL ?>/lib/success.php";
						$.ajax({
							type: 'POST',
							url: path,
							data: {
								tid: payment.id,
								state: "Johor",
								amount:total,
								track:order,
								item_id:id

							},
							success: function (response) {
                       debugger;
								console.log(response);

								if (response == "success") {
									$('#'+el).html('<h6>Payment done, Thanks ! please wait .....</h6>');
									setTimeout(function () {
										//after succefull payment send user to specific page
										window.location.href = "";

									}, 2500);
								}

							}
						});

					});
				}

			}, '#' + el);
		}

      function payforItem(total, order, el , ids){
						var path = "<?php echo SITEURL ?>/lib/success.php";
						$.ajax({
							type: 'POST',
							url: path,
							data: {
								tid: '<?php echo $booking->getUniqueCode(12); ?>',
								state: "Johor",
								amount:total,
								track:order,
								item_id:ids

							},
							success: function (response) {
                       debugger;
								console.log(response);

								if (response == "success") {
									alert('Payment done, Thanks ! please wait .....');
									setTimeout(function () {
										//after succefull payment send user to specific page
										window.location.href = "PaymentInfo.php";

									}, 2500);
								}

							}
						});
      }
		</script>
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
                  <h5 class="m-0 mr-r-5">Choose Your <?php echo $lang['add-title23']; ?></h5>
               </div>
            </div>
            <div class="row clearfix">
               <div class="col-md-12 steps-tab clearfix d-none d-md-block" data-target="#multi-step-signup" style="position: sticky">
                  <ul class="list-unstyled list-inline text-center">
                     <li class="list-inline-item done"><a class="text-info" href="singleparcel.php"><span class="step">1</span></a> </li>
                     <li class="list-inline-item done"><a class="text-info" href="bookings.php?do=bookings&id=<?php echo $c_id; ?>&b_id=<?php echo $id; ?>"><span class="step">2</span></a> </li>
                     <li class="list-inline-item done"><a class="text-info" href="PaymentInfo.php"><span class="step">3</span></a> </li>
                     <li class="list-inline-item active"><a class="text-info"><span class="step">4</span></a> </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- fieldset fluid  Sender Details for Make Payment                     -->
      <!-- ============================================================== -->
      <form method="POST" id="payment_form" name="payment_form" class="xform" >
      <fieldset id="signup-step-1" class="animated fadeInRight text-left" style="box-shadow: 0 10px 40px 0 rgb(62 57 107 / 0%), 0 2px 9px 0 rgb(62 57 107 / 0%);">
         <div class="row text-left">
            <div class="col-lg-12 widget-list mb-0" id="address">
               <div class="from_address_panel">
                  <div class="card bg-white mr-b-10">
                     <div id="FromAddressPanel">
                        <div class="card-header text-center">
                           <h6 class="card-title mr-tb-10 d-inline-block" id="card_icon_sender">
                           <?php echo $lang['add-title23']; ?> 
                           </h6>
                        </div>
                        <!-- <div class="card-header">
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
                        </div> -->
                        <div class="card-header text-center">
                           <div class="">
                              <h6 class="d-inline-block" id="card_icon_sender">
                              <!-- <script>
										pymnt_initiate("<?php echo $itemcount->totalprice; ?>","<?php echo $itemcount->t_order_inv;?>","pay-btn1","1");
                              </script>
                              <div id="pay-btn1"></div>
									</script> -->
                           <a href="#" class="btn btn-pink btn-3d" style="color:white;" onclick='payforItem("<?php echo $itemcount->price_inv; ?>","<?php echo $itemcount->t_order_inv;?>","pay-btn1","<?php echo $itemcount->item_ids;?>");'>Pay Now</a>   
                              </h6>
                              
                           </div>
                           <!-- <div class="text-center">
                              <input type="checkbox" id="accept_checkbox" value="I accept" required><span>&nbsp; I accept the <a href="term-and-condition.php" style="font-weight: 600;" target="_blank">Terms and Conditions</a></span>
                           </div> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </fieldset>
      </form>
      
      <!-- ============================================================== -->
      <!-- footer                     -->
      <!-- ============================================================== -->
      <?php include 'footer.php'; ?>