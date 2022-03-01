<?php 
$row = $user->getUserData();
?>

<div class="content-wrapper">

<aside class="site-sidebar scrollbar-enabled clearfix">
<style>
  .coupon_registration img{ max-width: 200px; border-radius: 8px; }
  .coupon_registration p{ font-size: 30px; color: #f69;font-weight: 600; }
  .coupon_registration_modal .content_bg{
    background-image: url("https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2018-07/RM25_pop_out_bg1.jpg");
    background-size: cover;
    background-position: bottom center;
    height: 800px;
  }
  .popover {
    z-index: 1040 !important;
  }
</style>

<div class="side-user d-block">
<div class="col-sm-12 media sidemenu-hide clearfix" href="javascript:void(0);">
<figure class="media-left media-middle user--online user--verified thumb-sm mr-r-10 mr-b-0">
<img src="<?php echo ($row->avatar) ? UPLOADURL . $row->avatar : "assets/images/user_avatar.jpg";?>" class="media-object rounded-circle profile_img" alt="profile photo">
</figure>
<div class="sidemenu-hover-show">
<div class="media-body hide-menu">
<h5 class="first_last_name text-pink mr-b-5 mt-1 text-capitalize"><?php echo $row->username;?></h5>
<span class="mr-b-4 email"><?php echo $row->email;?></span>
<div class="d-md-none">
<a href=""><span class="badge badge-warning align-middle text-capitalize" data-toggle="tooltip" data-original-title="Pending mobile number verification. Kindly verify your mobile number under Profile Settings." data-placement="bottom">Unverified <i class="material-icons list-icon fs-12 m-0">expand_more</i></span></a>
</div>
</div>

</div>
</div>
</div>

<script>
  $(function () {
  $('[data-toggle="popover"]').popover({
      trigger : 'hover',
    });
    $('[data-toggle="popover"]').popover('show');
     if($(window).width()<1169) {
      $('[data-toggle="popover"]').popover('hide');
    }
    $( window ).resize(function() {
      if($(window).width()>1169){
        $('[data-toggle="popover"]').popover('show');
      }else{
        $('[data-toggle="popover"]').popover('hide');
      }

    });
    $('body').on('click', function (e) {
      $('[data-toggle="popover"]').each(function () {
        if(!$(this).is(e.target)) {
          $(this).popover('hide');
        }
      });
    });
    alert('ex');
  
})
  </script>
<script>
function switchCountry(url,country){
  swal({
    title: 'Switching account?',
    text: 'Are you sure you would like to leave this page and switch to your "'+country+'" account?',
    type: 'info',
    confirmButtonColor: '#4e97d8',
    confirmButtonText: 'Switch Account',
    cancelButtonText: 'Cancel',
    showCancelButton: true
    }).then(function() {  
      window.location.href = url;
    });
}

  function checkCouponVal(couponVal){
    // if(couponVal == 25){
      $("#coupon_msg_popup_footer").html('<button type="button" data-dismiss="modal" class="btn btn-default btn-rounded btn-3d ripple">Close</button>');
      $("#coupon_msg_popup").modal({
        width     : 'auto',
        modal     : true,
        // show      : false,
        backdrop  : 'static', 
        keyboard  : false
      });
    // }
    // else{
    //   console.log('Coupon value less than RM25! :D');
    // }
  }

  function countryshow() {
    var countryshow = document.getElementById("sidebar-country-currency");
    var expandMore = document.getElementById("expandMore");
    var expandLess = document.getElementById("expandLess");
    if ($('#sidebar-country-currency li').length == 0) {
        countryshow.style.display = "none";
        expandLess.style.display ="none";

    } else if (countryshow.style.display === "none") {
        countryshow.style.display = "block";
        expandMore.style.display = "none";
        expandLess.style.display = "inline-block";
    } else {
        countryshow.style.display = "none";
        expandMore.style.display = "inline-block";
        expandLess.style.display = "none";
    }
  }

  (function($) {
    var $window = $(window),
        $html = $('html');

    function resize() {
        if ($window.width() < 961) {
            return $(".side-nav-topup").addClass('topup-button');
        }
        $(".side-nav-topup").removeClass('topup-button');
    }
    $(document).ready(resize);
    $(window).resize(resize);
  })(jQuery); 
 
  $('.side-user').mouseenter (
    function() {
      $('#sidebar-country-currency').addClass('collapse-hover');
    }
  );
  $('.side-user').mouseleave (
    function() {
      if ($('#sidebar-country-currency').hasClass('collapse-hover')) {
        $('#sidebar-country-currency').hide();
        $('#expandMore').show();
        $('#expandLess').hide();
      }
      $('#sidebar-country-currency').removeClass('collapse-hover');
      
    }
  );
</script>
<script>
$(function(){
    $('.coupon_registration_modal').modal({
        show: false
    }).on('hidden.bs.modal', function(){
        pause();
    });

    //
});

function pause(){
  var iframe = document.getElementById('dmvideo');
  iframe.src = iframe.src;
}

function closeVideo(){
  var iframe = document.getElementById('dmvideo');
  iframe.src = iframe.src;
}

</script>
<div class="side-track-parcel mobilenavbar-search d-block d-sm-none" style="background: #fff;">
<form class="navbar-tracking" onsubmit="MenuTrack_sidebar()" role="search" style="width: 100%">
<i class="material-icons list-icon">search</i>
<input type="text" class="search-query" id='awbNumber_sidebar' placeholder="Track your parcel here..." step="font-size: 1em;" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Track your parcel here...'">

</form>
<div class="clearfix"></div>
</div>
<nav class="sidebar-nav Exchangeparcel_sideber_nav">
<ul class="nav in side-menu mt-0" style="border-top: 1px solid #ddd;">
<li class=""><a href="index.php" class="ripple"> <i class="list-icon fa fa-dashboard fs-18" style="margin-left: 3px;margin-right: .33333em;"></i> <span class="hide-menu">Dashboard</span> </a> </li>
<li class="menu-item-has-children"><a href="index.php" class="ripple"><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:3px;fill: #9c27b0;"><path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" /></svg> <span class="hide-menu">Send Courier</span></a>
<ul class="list-unstyled sub-menu">
<li><a href="singleparcel.php" id="singleparcel"><?php echo $lang['single_parcel'] ?></a> </li>
<li><a href="#" id="bulkparcel">Bulk Courier</a> </li>
<!-- <li><a href="#">QuickSend</a> </li> -->
</ul>
</li>
<li class="menu-item-has-children"><a href="javascript:void(0);" class="ripple"><i class="list-icon fa fa-dashcube fs-18" style="margin-left: 3px;margin-right: .33333em;"></i> <span class="hide-menu">All Couriers</span></a>
<ul class="list-unstyled sub-menu">
<li><a href="courier-status.php" id="courierstatus">Courier Status</a> </li>
</ul>
</li>
<!-- <li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons">group_add</i> <span class="hide-menu">Referrals</span></a>
<ul class="list-unstyled sub-menu">
<li><a href="https://easyparcel.com/my/en/referral/invitation/">Invitation</a> </li>
<li><a href="https://easyparcel.com/my/en/referral/status/">Tracking Status</a> </li>
<li><a href="https://easyparcel.com/my/en/referral/campaign/">Campaigns</a> </li>
</ul>
</li> -->
<!-- <li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon fa fa-gift fs-24"></i> <span class="hide-menu">Rewards
</span></a>
<ul class="list-unstyled sub-menu">
<li><a href="#">EasyReward</a> </li>
<li><a href="#">My Coupons</a> </li>

</ul>
</li> -->
<!-- <li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons fs-24">link</i> <span class="hide-menu">Integrations <span class="badge badge-border bg-pink text-pink pull-right"></span></span></a>
<ul class="list-unstyled sub-menu">
<li><a href="https://easyparcel.com/my/en/integrations/add/">Add New Store</a> </li>
<li><a href="https://easyparcel.com/my/en/integrations/your-store/">Your Stores</a> </li>
<li><a href="https://easyparcel.com/my/en/integrations/orders/">Orders Imported</a> </li>
<li><a href="https://easyparcel.com/my/en/integrations/payment-settlement/">Payment Settlement</a> </li>
</ul>
</li> -->
<!-- <li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons">replay</i> <span class="hide-menu">QuickReturn</span></a>
<ul class="list-unstyled sub-menu">
<li><a href="https://easyparcel.com/my/en/quickreturn/setting/">Setting</a> </li>
<li><a href="https://easyparcel.com/my/en/quickreturn/returned-parcels/">Returned Parcels</a> </li>
</ul>
</li> -->
<li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple">
<svg aria-hidden="true" focusable="false" data-prefix="fas" height="17.5" width="19" style="margin-right:4px;vertical-align:middle;" data-icon="lightbulb" class="svg-inline--fa fa-lightbulb fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M96.06 454.35c.01 6.29 1.87 12.45 5.36 17.69l17.09 25.69a31.99 31.99 0 0 0 26.64 14.28h61.71a31.99 31.99 0 0 0 26.64-14.28l17.09-25.69a31.989 31.989 0 0 0 5.36-17.69l.04-38.35H96.01l.05 38.35zM0 176c0 44.37 16.45 84.85 43.56 115.78 16.52 18.85 42.36 58.23 52.21 91.45.04.26.07.52.11.78h160.24c.04-.26.07-.51.11-.78 9.85-33.22 35.69-72.6 52.21-91.45C335.55 260.85 352 220.37 352 176 352 78.61 272.91-.3 175.45 0 73.44.31 0 82.97 0 176zm176-80c-44.11 0-80 35.89-80 80 0 8.84-7.16 16-16 16s-16-7.16-16-16c0-61.76 50.24-112 112-112 8.84 0 16 7.16 16 16s-7.16 16-16 16z"></path></svg>
 <span class="hide-menu">Marketing Tools </span></a>
<ul class="list-unstyled sub-menu">
<li class="menu-item-has-children "><a href="javascript:void(0);" >SMS</a>
<ul class="list-unstyled sub-menu">
<li><a href="tracking_sms.php" id="trackingsms">Custom Tracking SMS</a> </li>
<!-- <li><a href="#">SMS Campaign</a></li> -->
</ul>
</li>
<li class="menu-item-has-children "><a href="javascript:void(0);">Email
<ul class="list-unstyled sub-menu">
<li><a href="tracking_email.php" id="trackingemail">Custom Tracking Email </a> </li>
</ul>
</li>
<li><a href="#" id="awbbranding">AWB Branding </a>
</li>
<li><a href="#" id="easytrackbranding">EasyTrack Branding </a>
</li>
</ul>
</li>
<li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons">person</i> <span class="hide-menu">Account
<span class="badge badge-pink align-top fs-10">new</span></span></a>
<ul class="list-unstyled sub-menu">
<li><a href="myprofile.php" id="myprofile">Profile</a> </li>
<!-- <li><a href="https://easyparcel.com/my/en/account/address-book/">Address Book</a> </li>
<li><a href="https://easyparcel.com/my/en/account/topup/">Top Up</a> </li>
<li><a href="https://easyparcel.com/my/en/account/auto-topup/">Auto Top Up <span class="badge badge-pink text-white">new</span></a> </li>
<li><a href="https://easyparcel.com/my/en/account/awb-format/">AWB Format <span class="badge badge-pink text-white">new</span></a> </li>
<li><a href="https://easyparcel.com/my/en/account/statement/">Statement</a> </li> -->

</ul>
</li>
<!-- <li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons">store</i> <span class="hide-menu">Shop<span class="badge badge-pink badge-border align-top animated swing infinite fs-10 text-pink ml-1">Open Now</span><span id="unclaimed_bubble_1" class="badge badge-pink text-white float-right mr-1 align-top"></span></span></a>
<ul class="list-unstyled sub-menu">
<li><a href="https://easyparcel.com/my/en/shop/buy">Buy</a> </li>
<li><a href="https://easyparcel.com/my/en/shop/buy/order-history">Order History</a> </li>
<li><a href="https://easyparcel.com/my/en/shop/redeem/">Redeem (Flyer Request)<div id="unclaimed_bubble_2" class="badge badge-pink text-white ml-2"></div></a> </li>
</ul>
</li> -->
<!-- <li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons fs-22">build</i> <span class="hide-menu">Tools</span></a>
<ul class="list-unstyled sub-menu">
<li><a href="https://easyparcel.com/my/en/tools/calculator/">Volumetric Calculator</a> </li>
<li><a href="https://easyparcel.com/my/en/widgets/">Widgets</a> </li>
<li><a href="https://easyparcel.com/my/en/tools/fragile-logo/">Fragile Logos</a> </li>
<li><a href="https://easyparcel.com/my/en/track/">Track Parcel</a> </li>
<li><a href="https://easyparcel.com/my/en/taxcalculator/">Tax Calculator</a> </li>
</ul>
</li> -->
<li class="menu-item-has-children "><a href="javascript:void(0);" class="ripple"><i class="list-icon material-icons">headset_mic</i> <span class="hide-menu">Support</span></a>
<ul class="list-unstyled sub-menu">
<li><a href="../privacy.php" target="_blank" id="privacy">FAQ</a> </li>
<li><a href="../contact.php" target="_blank" id="contact">Contact Us</a> </li>
</ul>
</li>
<li class="list-divider"></li>

<li><a href="../logout.php"><i class="list-icon material-icons">power_settings_new</i> <span class="hide-menu">Log Out</span></a> </li>
</ul>

</nav>
</aside>




<script>
  $(document).ready(function(){
    var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1].toLowerCase().replace('.php', '').replace('-', '').replace('_', '').replace(' ', '').replace('custom', '');
   debugger;
    if(last_part.includes('tracking') ){
      $("#" + last_part).parent().parent().addClass('collapse in');
      $("#" + last_part).parent().parent().parent().addClass('collapse in');
      $("#" + last_part).parent().parent().parent().addClass('active');
      $("#" + last_part).parent().parent().parent().parent().parent().addClass('active');
    }else{
    $("#" + last_part).parent().parent().addClass('collapse in');
    $("#" + last_part).parent().parent().parent().addClass('active');
    }
  });
  function MenuTrack_sidebar(){
  var awb = $('#awbNumber_sidebar').val().trim();
  if(awb == ""){
    swal({
        title: 'Oops',
        text: 'Please key in tracking numbers / EasyParcel order number to track.',
        type: 'error',
        confirmButtonColor: '#4e97d8'
        }).then(function() {
          location.reload();
        })
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
    if(awb.length <= 15){
      var displayAWB = awb.join(',');
      
      window.open(
        "https://easyparcel.com/my/en/track/summary/?awb="+displayAWB,
        '_blank'
      );
    }else{ 
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
$(function(){
  $('.Exchangeparcel_sideber_nav ul li a').each(function(){
    $(this).html($(this).html().replace('&nbsp;...',''));
  });
})
</script>