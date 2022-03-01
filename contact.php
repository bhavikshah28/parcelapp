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
    <!--============================= CONTACT =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="address-box">
                                <span class="ti-location-pin"></span>
                                <?php echo cleanOut($contact->titles11);?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-box">
                                <span class="ti-location-pin"></span>
                                <?php echo cleanOut($contact->titles12);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-center pt-5 mb-5"><?php echo cleanOut($contact->titles1);?></h3>
			
			<div class="row justify-content-center">
                <div class="col-md-10">
                    
						<?php include("div_loader.php");?>
                    
                </div>
            </div>
			
            <div class="row no-gutters justify-content-center">
                <div class="col-md-12 gray">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-form pl-3 py-3">
                                <form  id="admin_form" method="post">
                                    <div class="form-group">
                                        <label><?php echo cleanOut($contact->titles2);?></label>
                                        <input type="text"  name="name" value="<?php if ($user->logged_in) echo $user->name;?>" placeholder="<?php echo cleanOut($contact->titles3);?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo cleanOut($contact->titles4);?></label>
                                        <input type="email" name="email" value="<?php if ($user->logged_in) echo $user->email;?>" placeholder="<?php echo cleanOut($contact->titles4);?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo cleanOut($contact->titles6);?></label>
                                        <select name="subject" class="form-control">
										  <option value="">--- <?php echo cleanOut($contact->title7);?> ---</option>
										  <option value="<?php echo cleanOut($contact->titles8);?>"><?php echo cleanOut($contact->titles8);?></option>
										  <option value="<?php echo cleanOut($contact->titles9);?>"><?php echo cleanOut($contact->titles9);?></option>
										  <option value="<?php echo cleanOut($contact->titles10);?>"><?php echo cleanOut($contact->titles10);?></option>
										  <option value="<?php echo cleanOut($contact->titles13);?>"><?php echo cleanOut($contact->titles13);?></option>
										  <option value="<?php echo cleanOut($contact->titles14);?>"><?php echo cleanOut($contact->titles14);?></option>
										  <option value="<?php echo cleanOut($contact->titles15);?>"><?php echo cleanOut($contact->titles15);?></option>
										</select>
                                    </div>
									<div class="form-group">
                                        <label><?php echo cleanOut($contact->titles16);?></label> <img src="lib/captcha.php" alt="" style="color:#36bea6" class="captcha-append" />
                                        <input type="text" name="captcha" placeholder="xxx-xxxxx" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo cleanOut($contact->titles17);?></label>
                                        <textarea name="message" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-submit" name="doupdate"><?php echo cleanOut($contact->titles18);?></button>
                                    </div>
                                    <div id="js-contact-result" data-success-msg="Success, We will get back to you soon" data-error-msg="Oops! Something went wrong"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Google map will appear here! Edit the Latitude, Longitude and Zoom Level below using data-attr-*  -->
                            <div id="map" class="contact-map" data-lat="<?php echo cleanOut($contact->titles19);?>" data-lon="<?php echo cleanOut($contact->titles20);?>" data-zoom="12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END CONTACT -->
 <!--============================= FOOTER =============================-->
	<script type="text/javascript">
	// <![CDATA[
	  function showResponse(msg) {
		  hideLoader();
		  if (msg == 'OK') {
			  result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Thank you!<\/span>Your message has been sent successfully<\/p><\/div>";
			  $("#fullform").hide();
		  } else {
			  result = msg;
		  }
		  $(this).html(result);
		  $("html, body").animate({
			  scrollTop: 0
		  }, 600);
	  }
	  $(document).ready(function () {
		  var options = {
			  target: "#msgholder",
			  beforeSubmit: showLoader,
			  success: showResponse,
			  url: "ajax/sendmail.php",
			  resetForm: 0,
			  clearForm: 0,
			  data: {
				  processContact: 1
			  }
		  };
		  $("#admin_form").ajaxForm(options);
	  });
	// ]]>
	</script>
	<?php include("footer.php");?>
	
     <!--//END FOOTER -->