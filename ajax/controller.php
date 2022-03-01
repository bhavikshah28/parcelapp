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

  define("_VALID_PHP", true);
  require_once("../init.php");
  
  if (!$user->logged_in)
      redirect_to("../login.php");
  $userdata = $user->getUserData();
  $booking = Booking::instance();   
  $booking->uid = $userdata->id;
?>
<?php
  /* Proccess User */
  if (isset($_POST['processUser']))
      : if (intval($_POST['processUser']) == 0 || empty($_POST['processUser']))
      : redirect_to("../account.php");
  endif;
  $user->updateProfile();
  endif;
?>

<?php
  /* Courier Online Update */
  if (isset($_POST['processBooking']))
      : if (intval($_POST['processBooking']) == 0 || empty($_POST['processBooking']))
      : redirect_to("../bookings_list.php");
  endif;
  $courier->processCourier_booking_update();
  endif;
?>

<?php
  /* Courier Online Update */
  if (isset($_POST['postsmstemplate']))
      : if (intval($_POST['tid']) == 0)
      : redirect_to("../dashboard.php");
  endif;
  echo $booking->getSMSTemplate($_POST['tid']);
  endif;
?>