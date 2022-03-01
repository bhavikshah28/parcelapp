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
  require_once("init.php");
  
   $cid 		=  $_GET['cid'];
   $weight 		=  $_GET['weight'];
   $lenght 		=  $_GET['length'];
   $width 		=  $_GET['width'];
   $height 		=  $_GET['height'];
   $type 		=  $_GET['type'];
   $scountry 	=  $_GET['scountry'];
   
  if (isset($_POST['doLogin']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  
  /* Login Successful */
  if ($result)
     :redirect_to("bookings.php?id=$cid&weight=$weight&length=$lenght&height=$height&width=$width&type=$type&scountry=$scountry");
  endif;
  endif;
?>


    <!--============================= HEADER =============================-->
    
	<?php include("header.php");?>
	
    <!--//END HEADER -->
	
	<!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">

                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
	
    <!--============================= CONFIRMATION =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
						  <!-- General Information -->
							<?php include("div_loader.php");?>
							<div id="msgholder2"><?php print Filter::$showMsg;?></div>
							<div class="payment-wrap">							
								<div class="row">
									<div class="col-md-12">
										<div class="payment-title">
											<span class="ti-files"></span>
											<h4><?php echo cleanOut($login->log1);?></h4>
										</div>
									</div>
								</div>
								
								<form method="post" id="login_form" name="login_form" class="xform">
									<section>
										<div class="row">
											<div class="col col-3">
												<label><?php echo cleanOut($login->log2);?></label>
											</div>
											<div class="col col-9">
												<label class="input"> <i class="icon-prepend icon-user"></i> <i class="icon-append icon-asterisk"></i>
												  <input  type="text" name="username" placeholder="<?php echo cleanOut($login->log4);?>">
												</label>
											</div>
										</div>
									</section>
									<section>
										<div class="row">
											<div class="col col-3">
												<label><?php echo cleanOut($login->log3);?></label>
											</div>
											<div class="col col-9">
												<label class="input"> <i class="icon-prepend icon-lock"></i> <i class="icon-append icon-asterisk"></i>
													<input type="password"  name="password" placeholder="<?php echo cleanOut($login->log5);?>">
												</label>
											</div>
										</div>
									</section>
									<footer>
										<div class="row">
											<div class="col md-8">
												<button type="submit" name="dosubmit" class="btn btn-outline-primary btn-confirmation"><?php echo cleanOut($login->log7);?> <span><i class="icon-ok"></i></span></button>
												<?php if($core->reg_allowed):?>
												<a href="register_ship.php" class="btn btn-outline-secondary btn-confirmation"><?php echo cleanOut($login->log8);?></a>
												<?php endif;?>
											</div>
										</div>
									</footer>
									<input name="doLogin" type="hidden" value="1" />
								</form>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<!--============================= ADD LISTING =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">

                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
	
        <!--============================= FOOTER =============================-->
	
	<?php include("footer.php");?>
	
     <!--//END FOOTER -->