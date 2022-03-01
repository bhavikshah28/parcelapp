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
  if (!$user->logged_in)
      redirect_to("login_booking.php");
  
  
	$row = $user->getUserData();
	$courierrow = $core->getCouriercom();
	$packrow = $core->getPack();
	$payrow = $core->getPayment();
	$itemcatrow = $core->getItem();
	$moderow = $core->getShipmode();
	$row = Core::getRowById(Core::cTable, Filter::$id);
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
		<h5 class="card-title"><?php echo $lang['edit-booking1'] ?> <b><?php echo $row->order_inv;?></b></h5>
		
		<?php echo $lang['edit-booking2'] ?> <b><?php echo $row->country;?>, <?php echo $row->city;?> <?php echo $row->postal;?></b>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
						  <!-- General Information -->
							<div class="payment-wrap">
								<form class="xform" id="admin_form" method="post">
								
								<h6 class="card-title"><?php echo $lang['edit-booking3'] ?></h6></br>
								<div class="row">
									<section class="col col-6">
									  <label class="input">
										<input type="text" name="r_name"  placeholder="<?php echo $lang['edit-booking4'] ?>" value="<?php echo $row->r_name;?>">
									  </label>
									</section>
									<section class="col col-6">
									  <label class="input"> <i class="icon-prepend icon-envelope"></i>
										<input type="email" name="r_email" placeholder="<?php echo $lang['edit-booking5'] ?>" value="<?php echo $row->r_email;?>">
									  </label>
									</section>
								</div>
								<div class="row">
									<section class="col col-4">
									  <label class="input"> <i class="icon-prepend icon-location"></i>
										<input type="text" name="r_address" placeholder="<?php echo $lang['edit-booking6'] ?>" value="<?php echo $row->r_address;?>">
									  </label>
									</section>
									<section class="col col-4">
									  <label class="input"> <i class="icon-prepend icon-phone"></i>
										<input type="number" name="r_phone"  placeholder="<?php echo $lang['edit-booking7'] ?>" value="<?php echo $row->r_phone;?>">
									  </label>
									</section>
									<section class="col col-4"> <i class="icon-prepend icon-phone"></i>
									  <label class="input">
										<input type="number" name="rc_phone" placeholder="<?php echo $lang['edit-booking8'] ?>" value="<?php echo $row->rc_phone;?>">
									  </label>
									</section>
								</div>
								<div class="row">
									<section class="col col-6">
									  <label class="input">
										<input type="text" name="r_dest" placeholder="<?php echo $lang['edit-booking9'] ?>" value="<?php echo $row->r_dest;?>">
									  </label>
									</section>
									<section class="col col-3">
									  <label class="input">
										<input type="text" name="r_city" placeholder="<?php echo $lang['edit-booking10'] ?>" value="<?php echo $row->r_city;?>">
									  </label>
									</section>
									<section class="col col-3">
									  <label class="input"> 
										<input type="text" name="r_postal" placeholder="<?php echo $lang['edit-booking11'] ?>" value="<?php echo $row->r_postal;?>">
									  </label>
									</section>
								</div>
								
								<hr />
								
								
								<h6 class="card-title"><?php echo $lang['edit-booking12'] ?></h6></br>
								<div class="row">
									<section class="col md-6">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['edit-booking13'] ?> <i style="color:#ff0000" class="fa fa-cube"></i></label>
										<label class="input"> 
											<input type="text" name="package" placeholder="<?php echo $lang['edit-booking13'] ?>" value="<?php echo $row->package;?>">
										</label>
									</section>
									<section class="col md-6">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-booking14'] ?></label>
										<label class="input"> 
											<input type="text" name="courier" placeholder="<?php echo $lang['edit-booking14'] ?>" value="<?php echo $row->courier;?>">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col md-6">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-booking15'] ?></label>
										<label class="input"> 
											<input type="text" name="service_options" placeholder="<?php echo $lang['edit-booking15'] ?>" value="<?php echo $row->service_options;?>">
										</label>	
									</section>
									<section class="col md-6">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-booking16'] ?> <i style="color:#ff0000" class="fa fa-credit-card"></i></label>
										<label class="input"> 
											<input type="text" name="pay_mode" placeholder="<?php echo $lang['edit-booking16'] ?>" value="<?php echo $row->pay_mode;?>">
										</label>
									</section>
								</div>
								<?php $track = $courier->order_track();?>
								<?php $prefix = $courier->order_prefix();?>
								<div class="row" style="display:none">
									<section class="col md-6">
										<label class="input"> <i style="color:#ff0000"><?php echo $prefix;?></i>
											<input type="text" name="tracking" value="<?php echo $track;?>">
										</label>	
									</section>
									<section class="col md-6">
									<label for="inputEmail3" class="control-label col-form-label">Tax & Duty</label>
										<label class="input">
										  <input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">
										</label>
									</section>										
									<section class="col md-6">
									<label for="inputEmail3" class="control-label col-form-label">Insurance</label>
										<label class="input">
										  <input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">	
										</label>
									</section>
									<section class="col md-6">
									<label for="inputEmail3" class="control-label col-form-label">Delivery Time</label>
										<label class="input">
										  <input type="text" name="deli_time" Value="<?php echo $row->deli_time;?>">	
										</label>
									</section>
									<section class="col md-6">
									<label for="inputEmail3" class="control-label col-form-label">Status</label>
										<label class="input">
										  <input type="text" name="status_courier" value="<?php echo $row->status_courier;?>">	
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

									<h6 class="card-title"><?php echo $lang['edit-booking17'] ?></h6></br>
									<div class="row">
										<section class="col col-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-booking18'] ?></label>
											<label class="input">
												<input type="text" name="itemcat" value="<?php echo $row->itemcat;?>">
											</label>
										</section>
										<section class="col col-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-booking19'] ?></label>
										  <label class="input">
											<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-booking21'] ?>" name="r_qnty" value="<?php echo $row->r_qnty;?>">
										  </label>
										</section>
										<section class="col col-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-booking20'] ?></label>
										  <label class="input">
											<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-booking22'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum4" name="r_weight" value="<?php echo $row->r_weight;?>">
										  </label>
										</section>
									</div>
									<div class="row" >
										<section class="col col-12">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-booking23'] ?></label>
										  <label class="input">
											<textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['edit-booking24'] ?>"><?php echo $row->r_description;?></textarea>
										  </label>
										</section>
									</div>
									<div class="row">
										<section class="col col-6">
										  <label for="inputlname" class="control-label col-form-label"><?php echo $lang['edit-booking25'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['edit-booking26'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-booking27'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-booking28'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" name="length" value="<?php echo $row->length;?>">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-booking29'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" name="width" value="<?php echo $row->width;?>">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-booking30'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" name="height" value="<?php echo $row->height;?>">
												<input type="number" class="form-control" id="vol" value="0" name="v_weight" style="display:none">
											</div>
										</section>

										<section class="col col-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-booking31'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-booking32'] ?> <?php echo $core->insurance;?> Insurance"></i></b></label>
										  <label class="input">
											<input type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom" value="<?php echo $row->r_custom;?>">
										  </label>
										</section>
										<section class="col md-3">
											<label for="inputname" class="control-form-label"><?php echo $lang['edit-booking33'] ?></label>
											<label class="input">
												<input type="text"  name="r_curren" value="<?php echo $row->r_curren;?>">
											</label>
										</section>
									</div>
									<hr class="m-t-0 m-b-5">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="control-label text-left col-md-6"><?php echo $lang['edit-booking34'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
													<div class="col-md-6">
														<p class="form-control-static"> <input type="text" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-booking35'] ?>" class="form-control" name="r_costtotal" id="total_result" value="<?php echo $row->r_costtotal;?>" readonly> </p>
													</div>
												</div>
											</div>
											<!--/span-->
										</div>
									</div>
									<footer>
										<div class="row">
											<div class="col md-8">
												<button class="btn btn-outline-success btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['edit-booking36'] ?><span><i class="icon-ok"></i></span></button>
											</div>
										</div>
									</footer>
									<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
								</form>
								<?php echo Core::doForm("processBooking","ajax/controller.php");?> 
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
			
	<?php include("footer.php");?>
	
     <!--//END FOOTER -->