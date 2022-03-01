<?php
   // *************************************************************************
   // *                                                                       *
   // * Exchange Parcel                                      *
   // * Copyright (c) Exchange Parcel. All Rights Reserved                            *
   // *                                                                       *
   // *************************************************************************
   
     if (!defined("_VALID_PHP"))
         die('Direct access to this location is not allowed.');
   
   ?>
<link href="../assets/css_log/front.css" rel="stylesheet" type="text/css">
<!-- <script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.js"></script>
<script src="../assets/js/jquery.wysiwyg.js"></script>
<script src="../assets/js/global.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script> -->
<script>
   $(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();   
   });
</script>
<style type="text/css">
   canvas{
   margin:auto;
   }
   .alert{
   margin-top:20px;
   }
</style>
<?php $courierrow = $core->getCourier_list(); ?>
<?php $onlinerow = $core->getCourier_list_online(); ?>
<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
   <div class="col-md-10 m-auto">
      <div class="row">
         <div class="col-md-12 widget-holder dashboard_wrapper text-center">
            <h5 class="card-title text-uppercase">Welcome to Exchange Parcel</h5>
            <h3 class="mr-b-30 sub-heading-font-family fw-300">Reliable &amp; Prestigious Domestic Delivery services </h3>
            <button data-toggle="modal" data-target=".watch-demo" class="btn btn-pink btn-3d ripple"><i class="fa fa-money list-icon fs-20" style="margin-right:5px;"></i> <span>View Rates</span></button>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-2 col-md-3 d-none d-sm-block"></div>
         <div class="col-6 col-md-3 col-sm-4 widget-holder dashboard-wrapper text-right">
            <a class="btn btn-outline-default btn-3d ripple btn-block btn-lg pd-tb-10 button-hover-pink" href="singleparcel.php">
               <!-- <i class="list-icon fa fa-cube text-pink"></i><br> -->
               <svg aria-hidden="true" focusable="false" data-prefix="fas" width="36" height="28" data-icon="box" class="list-icon svg-inline--fa fa-box fa-w-16 text-pink" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor" d="M509.5 184.6L458.9 32.8C452.4 13.2 434.1 0 413.4 0H272v192h238.7c-.4-2.5-.4-5-1.2-7.4zM240 0H98.6c-20.7 0-39 13.2-45.5 32.8L2.5 184.6c-.8 2.4-.8 4.9-1.2 7.4H240V0zM0 224v240c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V224H0z"></path>
               </svg>
               <br/>
               <h5 class="fw-500 mr-tb-5">Single Courier</h5>
            </a>
         </div>
         <div class="col-6 col-md-3 col-sm-4 widget-holder dashboard-wrapper text-left">
            <a class="btn btn-outline-default btn-3d ripple btn-block btn-lg pd-tb-10 button-hover-pink" href="bulkparcel.php">
               <svg aria-hidden="true" focusable="false" data-prefix="fas" width="36" height="28" data-icon="boxes" class="svg-inline--fa fa-boxes fa-w-18 text-pink" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                  <path fill="currentColor" d="M560 288h-80v96l-32-21.3-32 21.3v-96h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16zm-384-64h224c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16h-80v96l-32-21.3L256 96V0h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16zm64 64h-80v96l-32-21.3L96 384v-96H16c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16z"></path>
               </svg>
               <br>
               <h5 class="fw-500 mr-tb-5">Bulk Courier</h5>
            </a>
         </div>
         <div class="col-md-3 d-none d-sm-block"></div>
      </div>
      <hr class="mt-0" style="background-color: #ddd;">
   </div>
</div>
<div class="widget-list dashboard_statistic">
<div class="row">
<div class="col-md-10 m-auto">
<div class="row">
   <div class="col-md-12 widget-holder dashboard_wrapper text-center">
      <h5 class="card-title text-uppercase"><?php echo $lang['salesummary'] ?></h5>
   </div>
</div>
<div class="row clearfix">
   <!-- <div class="col-md-12 col-sm-6 text-center mb-3">
      <span class="text-muted">Last updated: <span id="dashboard_update_date">2021-05-18 16:24:49</span> <a onclick="refreshDashboardStatistic();" lass="btn btn-default-outline btn-xs p-0"><i class="material-icons fs-18 mb-1">refresh</i></a></span>
      </div> -->
   <div class="col-md-4 col-sm-6">
      <div class="widget-bg stats_wrapper mb-3">
         <div class="widget-body clearfix">
            <div class="widget-counter">
               <h6 class="mt-1">Confirmed Courier</h6>
               <h3 class="h1 m-0"><span id="dashboard_first_totalsaving" class="counter">0</span></h3>
               <i class="material-icons list-icon">local_shipping</i>  
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-4 col-sm-6">
      <div class="widget-bg stats_wrapper mb-3">
         <div class="widget-body clearfix">
            <div class="widget-counter">
               <h6 class="mt-1">Pending to Deliver</h6>
               <h3 class="h1 m-0"><span id="dashboard_first_total_delivered" class="counter">0</span></h3>
               <i class="material-icons list-icon">local_shipping</i> 
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-4 col-sm-6">
      <div class="widget-bg stats_wrapper mb-3">
         <div class="widget-body clearfix">
            <div class="widget-counter">
               <h6 class="mt-1">Total Delivered </h6>
               <h3 class="h1 m-0"><span class="counter">0</span></h3>
               <i class="material-icons list-icon">local_shipping</i>  
            </div>
         </div>
      </div>
   </div>
</div>