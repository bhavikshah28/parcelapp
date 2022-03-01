<?php

  define("_VALID_PHP", true);
  require_once("../init.php");
  //require_once("./vendor/PhpSpreadsheet/Spreadsheet.php");
  //require_once("./vendor/PhpSpreadsheet/Reader/Xlsx.php");
  use Phppot\DataSource;
  use PhpOffice\PhpSpreadsheet\Reader;
  //require_once ('./vendor/autoload.php');
  //require_once 'DataSource.php';

$conn = $db->connect();

  $userdata = $user->getUserData();
  $booking = Booking::instance();   
  $booking->uid = $userdata->id;
  	//$ratesrow = $core->getRates();
    $itemprcels = $booking->getParcelDetails();  
	  	//$ratesrow = getPageData($_POST['fromPoint'], $_POST['toPoint'], $_POST['fromZip'], $_POST['toZip'], $_POST['Weight']);

        $courierrow = $core->getCourier_list();
         $onlinerow = $core->getCourier_list_online(); 

         if(isset($_POST['Import'])){
             $frmdata = new array();
            $file = $_FILES["file"]["tmp_name"];
            $file_open = fopen($file,"r");
            while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
            {
             $fromZip = $csv[0];
             $toZip = $csv[1];
             $Weight = $csv[2];
             $sql ="SELECT * FROM courier_rate WHERE FromZip like '%$fromZip%' and ToZIp like '%$toZip%' and Weight like '%$Weight%'";
	         $query=$db->query($sql);

             $records = array();
	while($row = mysqli_fetch_array($query)){
	extract($row);
	$records = array("id" => $Id,
		"Weight" => $Weight,
		"rate" => $rate,
		"deli_time" => $deli_time,
		"deli_type" => $deli_type,
		"deli_type_text" => $deli_type_text);
	}	
	$ratesrow = $records;

             $frmdata['c_id'] = $records['id'];
            // mysql_query("INSERT INTO tbl_info VALUES ('$name','$description')");
            }
         }else {
            $type = "error";
            $message = "Invalid File Type. Upload Excel File.";
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
            <h5 class="m-0 mr-r-5">Bulk Import</h5>
          </div>
            
          </div>
          </div>
          </div>
    <div class="row">
   <div class="col-md-10 m-auto">
      <div class="row">
      
         <div class="col-md-12 widget-holder dashboard_wrapper text-center">
         <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <h5 class="card-title text-uppercase">Welcome to Exchange Parcel | Bulk Import Parcels</h5>
             <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
            <h3 class="mr-b-30 sub-heading-font-family fw-300">can upload Excel files in xls, xlsx format </h3>
            <button data-toggle="modal" name="Import" data-target=".watch-demo" class="btn btn-pink btn-3d ripple" style="margin-right:50px;"><i class="fa fa-money list-icon fs-20" style="margin-right:5px;"></i> <span>Upload Files</span></button>
            </form>
         </div>
    
      </div>
</div>
</div>

<?php include("footer.php");?>