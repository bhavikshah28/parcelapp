<?php 
$booking = Booking::instance();
$userdata = $user->getUserData();
$booking->uid = $userdata->id;
$itemcount = $booking->getCounton();
?>

<nav class="navbar">

<div class="navbar-header">
<a href="../index.php" class="navbar-brand">
                             <?php echo ($core->logo) ? '<img class="logo-expand" src="'.SITEURL.'/uploads/'.$core->logo.'" srcset="'.SITEURL.'/uploads/'.$core->logo.'" title="'.$core->site_name.'" />': $core->site_name;?>
							 <?php echo ($core->logo) ? '<img class="logo-collapse" src="'.SITEURL.'/uploads/'.$core->logo.'" srcset="'.SITEURL.'/uploads/'.$core->logo.'" title="'.$core->site_name.'" />': $core->site_name;?>
</a>
</div>


<ul class="nav navbar-nav">
<li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a> </li>
</ul>


<form onsubmit="MenuTrack();return false;" class="navbar-tracking d-none d-sm-block" role="search">
<i class="material-icons list-icon">search</i>
<input type="text" id="awbNumber" class="search-query" placeholder="Track your parcel here..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Track your parcel here...'">

</form>

<div class="spacer"></div>

<ul class="nav navbar-nav right_menu">
<li class="dropdown">
<a href="PaymentInfo.php" class="dropdown-toggle ripple"><i class="material-icons list-icon">shopping_cart</i> <span class="badge badge-border bg-pink text-pink cart-total"><?php echo $itemcount->total; ?></span></a>
</li>


<li class="dropdown"><a onclick="getNotificationList()" class="dropdown-toggle ripple" data-toggle="dropdown"><i class="material-icons list-icon">notifications</i><span class="badge badge-border bg-pink text-pink notification_count">3</span> </a>
<div class="dropdown-menu dropdown-left dropdown-card topbar_notification animated fadeIn p-0">
<div class="card">
<header class="card-header mb-0">Notifications
<span class="badge badge-border bg-pink text-pink notification_count" style="cursor: initial;">3</span>
<a class="pull-right fs-12 fw-400 mt-1 text-pink" onclick="markAllAsRead()">Mark all as read</a>
</header>
<span class="text-muted"></span>
<ul class="list-unstyled dropdown-list-group notification-list m-0 p-0">
<span id="notification_list"></span>
</ul>
<footer class="card-footer border-0 bg-white" id="notification_footer" style="display: none;"> <a href="https://easyparcel.com/my/en/account/notifications"><button class="btn btn-block btn-pink btn-3d btn-sm"><i class="material-icons list-icon">notifications_none</i> See All Notifications</button></a> </footer>
</div>
</div>
</li>
</ul>
<!-- <ul class="nav navbar-nav right_menu"> -->
<!-- <li class="dropdown"><a href="#" class="dropdown-toggle ripple" data-toggle="dropdown"><i class="material-icons list-icon">language</i> </a> -->
<!-- <div class="dropdown-menu dropdown-left dropdown-card topbar_language animated fadeIn"> -->
<!-- <div class="card"> -->
<!-- <header class="card-header">Select Languages</header> -->
<!-- <span class="text-muted">Choose your preferred language.</span> -->
<!-- <ul class="list-unstyled dropdown-list-group"> -->
<!-- <li style=""> -->
<!-- <a href="https://easyparcel.com/my/en/dashboard" class="media"><span class="media-body country_flag"><img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/united states-flag.jpg" alt="Malaysia" class="media-object mr-2"><span class="media-heading" style="">English</span></span></a> -->
<!-- </li> -->
<!-- <li style=""> -->
<!-- <a href="https://easyparcel.com/my/cn/dashboard" class="media"><span class="media-body country_flag"><img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/china-flag.jpg" alt="Malaysia" class="media-object mr-2"><span class="media-heading" style="">中文 </span></span></a> -->
<!-- </li> -->
<!-- <li style=""> -->
<!-- <a href="https://easyparcel.com/my/bm/dashboard" class="media"><span class="media-body country_flag"><img src="https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/country-flag/malaysia-flag.jpg" alt="Malaysia" class="media-object mr-2"><span class="media-heading" style="">Malay</span></span></a> -->
<!-- </li> -->
<!-- </ul> -->
<!-- </div> -->
<!-- </div> -->
<!-- </li> -->
<!-- </ul> -->


<ul class="nav navbar-nav d-none d-md-block">
<li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><span class="avatar thumb-sm">
<img src="<?php echo ($userdata->avatar) ? UPLOADURL . $userdata->avatar : "assets/images/user_avatar.jpg";?>" class="rounded-circle profile_img" alt="EasyParcel Profile Image">
<i class="material-icons list-icon">expand_more</i></span></a>
<div class="dropdown-menu dropdown-left dropdown-card animated fadeIn">
<div class="card">
<header class="card-heading-extra pb-2 mb-2">
<div class="row">
<div class="col-12">
<h5 class="mt-1 mr-b-10 text-capitalize first_last_name"> </h5>
<a href="https://easyparcel.com/my/en/userfirstdetail/"><span class="badge badge-warning align-middle text-capitalize" data-toggle="tooltip" data-original-title="Pending mobile number verification. Kindly verify your mobile number under Profile Settings." data-placement="bottom">Unverified <i class="material-icons list-icon fs-12 m-0">expand_more</i></span></a>
<a href="../logout.php" class="pull-right"><i class="material-icons list-icon">power_settings_new</i> <?php echo $lang['logoouts'] ?></a>
</div>
</div>

</header>
<ul class="list-unstyled dropdown-list-group">
<li><a href="MyProfile.php" class="media"><span class="media-heading"><?php echo $lang['miprofile'] ?></span></a></li>
<!-- <li><a href="user.php?do=main" class="media"><span class="media-heading"><?php echo $lang['accountset'] ?></span></a></li> -->
<li><a href="../logout.php" class="media" target="_blank"><span class="media-heading"><?php echo $lang['logoouts'] ?></span></a></li>
</ul>
</div>
</div>
</li>
</ul>

</nav>





