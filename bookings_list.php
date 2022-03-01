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
  include_once 'lib/BookingClass.php';
?>
    <!--============================= HEADER =============================-->

	<?php include("header.php");?>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<script>
	/* global paypal */
		function pymnt_initiate(total, order, el , id) {
			paypal.Button.render({
				env: 'production',
				style: {
					label: 'buynow',
					fundingicons: true, // optional
					branding: true, // optional
					size: 'small', // small | medium | large | responsive
					shape: 'rect', // pill | rect
					color: 'gold'   // gold | blue | silver | black
				},
				client: {
					sandbox: '',
					production: '<?php echo $core->client_id ?>'
				},
				commit: true,
				payment: function (data, actions) {
					return actions.payment.create({
						payment: {
							transactions: [
								{
									amount: {total: total, currency: '<?php echo $core->currency ?>'}
								}
							]
						}
					});
				},
				// onAuthorize() is called when the buyer approves the payment
				onAuthorize: function (data, actions) {

					// Make a call to the REST api to execute the payment
					return actions.payment.execute().then(function (payment) {

					  

						var path = "<?php echo SITEURL ?>/lib/success.php";
						$.ajax({
							type: 'POST',
							url: path,
							data: {
								tid: payment.id,
								state: payment.state,
								amount:total,
								track:order,
								item_id:id

							},
							success: function (response) {

								console.log(response);

								if (response == "success") {
									$('#'+el).html('<h6>Payment done, Thanks ! please wait .....</h6>');
									setTimeout(function () {
										//after succefull payment send user to specific page
										window.location.href = "";

									}, 2500);
								}

							}
						});

					});
				}

			}, '#' + el);
		}
		</script>
	
    <!--//END HEADER -->
	
    <!--============================= SUBPAGE HEADER BG =============================-->
    <section class="subpage-bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="titile-block title-block_subpage">
                        <h2><?php echo $lang['booking-list1'] ?></h2>
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
                <div class="col-md-12" id="calculate_details">
                     <table id="items">
						<thead>
							<tr>
							  <th><?php echo $lang['booking-list2'] ?></th>
							  <th><?php echo $lang['booking-list3'] ?></th>
							  <th><?php echo $lang['booking-list4'] ?></th>
							  <th><?php echo $lang['booking-list5'] ?></th>
							  <th><?php echo $lang['booking-list6'] ?></th>
							  <th><?php echo $lang['booking-list7'] ?></th>
							  <th><?php echo $lang['booking-list8'] ?><th>
							  <th><?php echo $lang['booking-list9'] ?></th>
							</tr>
						</thead>
						<tbody>
						<?php if(!$courier_onlinerow):?>
							<tr>
								<td colspan="11">
								
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='dashboard/assets/images/alert/ohh_shipment.png' width='143' /></i>
								</br>
								<p style='font-size: 18px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['booking-list10']."</p>						
								",false;?>
								
								</td>
							</tr>
							
							<tr>
							<?php else:?>
							<?php foreach ($courier_onlinerow  as $row):?>							
								<td class="align-middle"><?php echo $row->order_inv;?></td>
								<td class="align-middle"><?php echo $row->created;?> </td>
								<td class="align-middle"><?php echo $row->r_description;?></td>
								<td class="align-middle"><?php echo $row->r_name;?> </td>
								<td class="align-middle"><?php echo $row->r_dest;?></br><?php echo $row->r_city;?> </td>
								<td class="align-middle"><?php echo $row->status_courier;?> </td>
								<td class="align-middle"><?php echo $row->r_curren;?> <?php echo $row->r_costtotal;?></td>
								<?php if ($row->status_courier == 'Pending'){ ?>
								<td class="align-middle">Payment Pending for Approve</td>
								<?php }else{ ?>
								
									<?php if ($row->pay_mode == 'Paypal' && $row->payment_status == 0){ ?>
									<script>
										pymnt_initiate("<?php echo $row->r_costtotal; ?>","<?php echo $row->order_inv;?>","pay-btn<?php echo $row->id; ?>","<?php echo $row->id;?>");
									</script>
									<td id="pay-btn<?php echo $row->id; ?>"></td>
									<?php }elseif ($row->pay_mode == 'Credit Card' && $row->payment_status == 0){ ?>
									<script>
										pymnt_initiate("<?php echo $row->r_costtotal; ?>","<?php echo $row->order_inv;?>","pay-btn<?php echo $row->id; ?>","<?php echo $row->id;?>");
									</script>
									<td id="pay-btn<?php echo $row->id; ?>"></td>
									<?php }elseif ($row->pay_mode == 'Cash' && $row->payment_status == 0){ ?>
									<td class="align-middle"><img src='dashboard/assets/images/alert/paid.png' width='68' /></td>
									<?php }else{ ?>
									<td class="align-middle"><img src='dashboard/assets/images/alert/paid.png' width='68' /></td>
									<?php } ?>
								<?php } ?>	
								
								<td class="align-middle">
									<a  href="edit_booking.php?do=edit_booking&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['booking-list11'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
									<?php if ($row->status_courier == 'Pending'){ ?>
									<?php }else{ ?>
										<a  href="invoice/inv_ship.php?do=inv_ship&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['booking-list12'] ?>"><i style="color:#343a40" class="ti-printer"></i></a>
									<?php } ?>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </section>
    <!--//END ADD LISTING -->
	
	
    <!--============================= FOOTER =============================-->
    
	<?php include("footer.php");?>
	
     <!--//END FOOTER -->