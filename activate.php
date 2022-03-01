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
  
  if ($user->logged_in)
      redirect_to("account.php");
?>
    <!--============================= HEADER =============================-->

	<?php include("header.php");?>
	
    <!--//END HEADER -->
	
    <!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block title-block_subpage">
                        <h2>Account Activation</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->	
	
    <!--============================= ADD LISTING =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8" id="calculate_details">
				<?php include("div_loader.php");?>
                     <p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i> Here you can activate your account. Please enter your email address and activation code received.<br>
					  Fields marked <i class="icon-append icon-asterisk"></i> are required.</p>
					<form class="xform" id="admin_form" method="post">
					  <header>Account Activation<span>Activate Your Account</span></header>
					  <div class="row">
						<section class="col col-6">
						  <label class="input"> <i class="icon-prepend icon-envelope-alt"></i> <i class="icon-append icon-asterisk"></i>
							<input type="text" name="email" placeholder="Email">
						  </label>
						  <div class="note note-error">Email Address</div>
						</section>
						<section class="col col-6">
						  <label class="input"> <i class="icon-prepend icon-filter"></i> <i class="icon-append icon-asterisk"></i>
							<input type="text" name="token" placeholder="Activation Token">
						  </label>
						  <div class="note note-error">Activation Token</div>
						</section>
					  </div>
					  <footer>
						<button class="button" name="dosubmit" type="submit">Activate Account<span><i class="icon-ok"></i></span></button>
						<a href="index.php?do=index" class="button button-secondary">Back to login</a> </footer>
					</form>
					<?php echo Core::doForm("accActivate","ajax/user.php");?>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
	
	
    <!--============================= FOOTER =============================-->
    
	<?php include("footer.php");?>
	
     <!--//END FOOTER -->