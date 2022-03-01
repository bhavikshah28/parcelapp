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
  if (!$user->logged_in){
  
        //method get 
        $coruer_id  = 	$_GET['id'];
        $weight 	=  	$_GET['weight'];
        $lenght 	=  	$_GET['length'];
        $width 		=   $_GET['width'];
        $height 	=  	$_GET['height'];
		$type 		=  	$_GET['type'];
        $scountry 	=  	$_GET['scountry'];
          
        redirect_to("login.php?cid=$coruer_id&weight=$weight&length=$lenght&height=$height&width=$width&type=$type&scountry=$scountry");
  
  }
	
        
        if(isset($_GET['id'])){
              $courier_detail = $core->preAutoFiled($_GET['id']); 
        }
  
  
	$row = $user->getUserData();
	$courierrow = $core->getCouriercom();
	$packrow = $core->getPack();
	$payrow = $core->getPayment();
	$itemcatrow = $core->getItem();
	$moderow = $core->getShipmode();
	
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
			<?php include("div_loader.php");?>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
	
    <!--============================= CONFIRMATION =============================-->
	
    <section class="main-block">
        <div class="container-fluid">
		<?php echo $lang['create-booking1'] ?> <b><?php echo $row->country;?>, <?php echo $row->city;?> <?php echo $row->postal;?></b>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
						  <!-- General Information -->
							<div class="payment-wrap">
								<form class="xform" id="admin_form" method="post">
								
								<div class="row" >
									<section class="col col-6">
									  <label class="input state-disabled"> <i class="icon-prepend icon-user"></i> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="username" value="<?php echo $user->username;?>" placeholder="<?php echo $lang['create-booking2'] ?>">
									  </label>
									</section>
									<section class="col col-6">
									  <label class="input"> <i class="icon-prepend icon-user"></i>
										<input type="text"  name="s_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="<?php echo $lang['create-booking3'] ?>" readonly>
									  </label>
									</section>
								</div>
								<div class="row" style="display:none">
									<section class="col col-4">
									  <label class="input"> <i class="icon-prepend icon-location"></i>
										<input type="text" name="address" value="<?php echo $row->address;?>" placeholder="Address">
									  </label>
									</section>
									<section class="col col-4">
									  <label class="input"> <i class="icon-prepend icon-phone"></i>
										<input type="text" name="phone" value="<?php echo $row->code_phone;?><?php echo $row->phone;?>" placeholder="Phone">
									  </label>
									</section>
									<section class="col col-4">
									  <label class="input">
										<input type="text" name="country" value="<?php echo $row->country;?>" placeholder="Country">
									  </label>
									</section>
								</div>
								<div class="row" style="display:none">
									<section class="col col-4">
									  <label class="input">
										<input type="text" name="city" value="<?php echo $row->city;?>" placeholder="City">
									  </label>
									</section>
									<section class="col col-4">
									  <label class="input">
										<input type="text" name="postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
									  </label>
									</section>
									<section class="col col-3">
									  <label class="input"> <i class="icon-prepend icon-phone"></i>
										<input type="text" name="email" value="<?php echo $row->email;?>" placeholder="Email">
									  </label>
									</section>
								</div>
								
								<h6 class="card-title"><?php echo $lang['create-booking4'] ?></h6></br>
								<div class="row">
									<section class="col col-6">
									  <label class="input">
										<input type="text" name="r_name"  placeholder="<?php echo $lang['create-booking5'] ?>">
									  </label>
									</section>
									<section class="col col-6">
									  <label class="input"> <i class="icon-prepend icon-envelope"></i>
										<input type="email" name="r_email" placeholder="<?php echo $lang['create-booking6'] ?>">
									  </label>
									</section>
								</div>
								<div class="row">
									<section class="col col-4">
									  <label class="input"> <i class="icon-prepend icon-location"></i>
										<input type="text" name="r_address" placeholder="<?php echo $lang['create-booking7'] ?>">
									  </label>
									</section>
									<section class="col col-4">
									  <label class="input"> <i class="icon-prepend icon-phone"></i>
										<input type="number" name="r_phone"  placeholder="<?php echo $lang['create-booking8'] ?>">
									  </label>
									</section>
									<section class="col col-4"> <i class="icon-prepend icon-phone"></i>
									  <label class="input">
										<input type="number" name="rc_phone" placeholder="<?php echo $lang['create-booking9'] ?>">
									  </label>
									</section>
								</div>
								<div class="row">
									<section class="col col-6">
									  <label class="input">
										<input type="text" name="r_dest" value="<?php if(isset($_GET['scountry'])){ echo $_GET['scountry'];}?>" placeholder="<?php echo $lang['create-booking10'] ?>" >
									  </label>
									</section>
									<section class="col col-3">
									  <label class="input">
										<input type="text" name="r_city" placeholder="<?php echo $lang['create-booking11'] ?>">
									  </label>
									</section>
									<section class="col col-3">
									  <label class="input"> 
										<input type="text" name="r_postal" placeholder="<?php echo $lang['create-booking12'] ?>">
									  </label>
									</section>
								</div>
								
								<hr />
								
								
								<h6 class="card-title"><?php echo $lang['create-booking13'] ?></h6></br>
								<div class="row">
									<section class="col md-6">
									<label for="inputlname" class="control-label col-form-label"><?php echo $lang['create-booking14'] ?> <i style="color:#ff0000" class="fa fa-cube"></i></label>
										<select class="custom-select col-12" name="package">
											<option value="<?php if(isset($_GET['type'])){echo $_GET['type'];} ?>"><?php if(isset($_GET['type'])){echo $_GET['type'];} ?></option>
											<?php foreach ($packrow as $row):?>											
											<option value="<?php echo $row->name_pack; ?>"><?php echo $row->name_pack; ?></option>
											<?php endforeach;?>											
										</select>	
									</section>
									<section class="col md-6">
									<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['create-booking15'] ?></label>
										<select class="custom-select col-12" name="courier">
											<option value="<?php if(isset($courier_detail)){echo $courier_detail->services;} ?>"><?php if(isset($courier_detail)){echo $courier_detail->services;} ?></option>
											<?php foreach ($courierrow as $row):?>											
											<option value="<?php echo $row->name_com; ?>"><?php echo $row->name_com; ?></option>
											<?php endforeach;?>											
										</select>
									</section>
								</div>
								<div class="row">
									<section class="col md-6">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking16'] ?></label>
										<select class="custom-select col-12" name="service_options">
											<?php foreach ($moderow as $row):?>
											<option value="<?php echo $row->ship_mode; ?>"><?php echo $row->ship_mode; ?></option>
											<?php endforeach;?>
										</select>	
									</section>
									<section class="col md-6">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking17'] ?> <i style="color:#ff0000" class="fa fa-credit-card"></i></label>
										<select class="custom-select col-12" name="pay_mode">
											<?php foreach ($payrow as $row):?>
											<option value="<?php echo $row->met_payment; ?>"><?php echo $row->met_payment; ?></option>
											<?php endforeach;?>
										</select>
									</section>
								</div>
								<?php $track = $courier->order_track();?>
								<?php $prefix = $courier->order_prefix();?>
								<div class="row">
									<section class="col md-6" style="display:none">
										<label class="input"> <i style="color:#ff0000"><?php echo $prefix;?></i>
											<input type="text" name="tracking" value="<?php echo $track;?>">
										</label>	
									</section>
									<section class="col md-6" style="display:none">
									<label for="inputEmail3" class="control-label col-form-label">Tax & Duty</label>
										<label class="input">
										  <input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">
										</label>
									</section>										
									<section class="col md-6" style="display:none">
									<label for="inputEmail3" class="control-label col-form-label">Insurance</label>
										<label class="input">
										  <input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">	
										</label>
									</section>
									<section class="col md-6">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking18'] ?></label>
										<label class="input">
										  <input type="text" name="deli_time" Value="<?php if(isset($courier_detail)){echo  $courier_detail->deli_time;}?>" placeholder="2 - 5 working days">	
										</label>
									</section>
									<section class="col md-6" style="display:none">
									<label for="inputEmail3" class="control-label col-form-label">Status</label>
										<label class="input">
										  <input type="text" name="status_courier" value="Pending">	
										</label>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			    <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
						  <!-- General Information -->
							<div class="payment-wrap">
								<div class="xform">

									<h6 class="card-title"><?php echo $lang['create-booking19'] ?></h6></br>
									<div class="row">
										<section class="col col-6" style="display:none">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking20'] ?></label>
											<label class="input">
												<input type="text" name="itemcat" value="sundry
">
											</label>
										</section>
										<section class="col col-6">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['create-booking21'] ?></label>
										  <label class="input">
											<input type="number" data-toggle="tooltip" data-placement="bottom" title="Number of Packages" name="r_qnty">
										  </label>
										</section>
										<section class="col col-6">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['create-booking22'] ?> (<b><?php if(isset($courier_detail)){echo  $courier_detail->typeweight;}?></b>)</label>
										  <label class="input">
											<input type="number" data-toggle="tooltip" data-placement="bottom" title="Shipping Weight" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum4" name="r_weight" value="<?php echo $_GET['weight'];?>">
										  </label>
										</section>
									</div>
									<div class="row" >
										<section class="col col-12">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking23'] ?></label>
										  <label class="input">
											<textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['create-booking23'] ?>"></textarea>
										  </label>
										</section>
									</div>
									<div class="row">
										<section class="col col-6">
										  <label for="inputlname" class="control-label col-form-label"><?php echo $lang['create-booking24'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['create-booking32'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['create-booking34'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking25'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" name="length" value="<?php echo $_GET['length'];?>">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking26'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" name="width" value="<?php echo $_GET['width'];?>">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['create-booking27'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" name="height" value="<?php echo $_GET['height'];?>">
												<input type="number" class="form-control" id="vol" value="0" name="v_weight" style="display:none">
											</div>
										</section>

										<section class="col col-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['create-booking28'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['create-booking33'] ?> <?php echo $core->insurance;?> Insurance"></i></b></label>
										  <label class="input">
											<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom" value="0">
										  </label>
										</section>
										<section class="col md-3">
											<label for="inputname" class="control-form-label"><?php echo $lang['create-booking29'] ?></label>
											<label class="input">
												<input type="text"  name="r_curren" value="USD">
											</label>
										</section>
									</div>
									<hr class="m-t-0 m-b-5">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="control-label text-left col-md-6"><?php echo $lang['create-booking30'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
													<div class="col-md-6">
														<p class="form-control-static"> <input type="text" data-toggle="tooltip" data-placement="top" title="Total value of the shipment" class="form-control" name="r_costtotal" id="total_result" value="<?php if(isset($courier_detail)){echo  $courier_detail->rate;}?>" readonly> </p>
													</div>
												</div>
											</div>
											<!--/span-->
										</div>
									</div>
									<footer>
										<div class="row">
											<div class="col md-8">
												<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['create-booking31'] ?><span><i class="icon-ok"></i></span></button>
											</div>
										</div>
									</footer>
									<input name="doRegister_online" type="hidden" value="1" />
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    </section>
	
	
    <!--============================= FOOTER =============================-->
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	
	<script type="text/javascript">

			function suma(){
				
				<!--General sale formula-->
				var num2 = "5.56789";
				var sum2 = document.getElementById("sum2");
				var sum3 = document.getElementById("sum3");
				var sum4 = document.getElementById("sum4");
				var sum5 = document.getElementById("sum5");
				
				<!--VOLUMETRIC WEIGHT-->
				var l1 = document.getElementById("l1");
				var w2 = document.getElementById("w2");
				var h3 = document.getElementById("h3");

				var input = document.getElementById("total_result");
				
				<!--Formula Values-->
				var volumetric = <?php echo $core->meter;?>;
				var pound_weight_price = <?php echo $core->value_weight;?>;
				var percent = 100;

				var total_insurance = sum2.value * sum5.value/percent; 									<!--Tax on the value of the article-->
				var total_metric = l1.value * w2.value * h3.value/volumetric * pound_weight_price; 		<!--Volumetric weight result-->
				var total_weight = pound_weight_price * sum4.value; 									<!--Shipping weight value-->	
				
				var calculate_weight;
				if (total_weight > total_metric) {
					calculate_weight = total_weight;
				} else {
					calculate_weight = total_metric;
				}
				
				var total_tax = (calculate_weight + total_insurance) * sum3.value/percent; 	<!--Total sales tax-->
				
				total_result = parseFloat(parseFloat(total_insurance)  +  parseFloat(calculate_weight) + parseFloat(total_tax)) .toFixed(2); <!--Total result formula-->
				
				input.value= total_result;

			}
			

		</script>
			
		<script type="text/javascript">
		// <![CDATA[
		  function showResponse(msg) {
			  hideLoader();
			  if (msg == 'OK') {
				  result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Success!<\/span>You have successfully registered. Please check your email for further information<\/p><\/div>";
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
				  url: "ajax/user.php",
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