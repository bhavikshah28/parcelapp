<?php
   // *************************************************************************
   // *                                                                       *
   // * Account Page : Child page of single parcel                            *
   //                                                                         *
   // *************************************************************************
   
     //define("_VALID_PHP", true);
     require_once(BASEPATH . "lib/class_newCourier.php");
     $ratesrow = array();
     $fromPoint = 0;
   		$toPoint = 0;
   		$fromZip = '';
   		$toZip = '';
   		$Weight_r = 0;
         $newCourier = new newCourier();
      $courierstaterow = $newCourier->getState();
     	//$ratesrow = $core->getRates();
        if(isset($_POST['courier_rate']) && $_POST['courier_rate'] == '1'){
   		$r_weight= $_POST['Weight'];
   		$fromPoint = $_POST['fromPoint'];
   		$toPoint = $_POST['toPoint'];
   		$fromZip = $_POST['fromZip'];
   		$toZip = $_POST['toZip'];
   		$Weight_r = $_POST['Weight'];
   	$sql ="SELECT * FROM courier_rate WHERE FromPoint='$fromPoint' and ToPoint='$toPoint' and FromZip like '%$fromZip%' and ToZip like '%$toZip%' and Weight like '%$Weight_r%'";
   	$query=$db->query($sql);
   	
   	$records = array();
   	while($row = mysqli_fetch_array($query)){
   	extract($row);
   	$records[] = array("id" => $Id,
   		"Weight" => $Weight,
   		"rate" => $rate,
   		"deli_time" => $deli_time,
   		"deli_type" => $deli_type,
   		"deli_type_text" => $deli_type_text);
         }	
   	$ratesrow = $records;


   	  	//$ratesrow = getPageData($_POST['fromPoint'], $_POST['toPoint'], $_POST['fromZip'], $_POST['toZip'], $_POST['Weight']);
      }
       
       
     ?>
<style>
	.popup {
			position: relative;
			display: inline-block;
			cursor: pointer;
		}

		/* pop-up actual */
		.popup .popuptext {
			visibility: hidden;
			width: 260px;
			background-color: #555;
			color: #fff;
			text-align: center;
			border-radius: 4px;
			padding: 8px 0;
			position: absolute;
			z-index: 2;
			bottom: 125%;
			left: 50%;
			margin-left: -130px;
		}
		
		.button4 {
			background-color: white;
			color: black;
			border: 2px solid #e7e7e7;
		}

		.button4:hover {background-color: #e7e7e7;}

		/* Muestra del Pop-up*/
		.popup .popuptext::after {
			content: "";
			position: absolute;
			top: 100%;
			left: 50%;
			margin-left: -5px;
			border-width: 5px;
			border-style: solid;
			border-color: #555 transparent transparent transparent;
		}

		/* Cambio para mostrar/ocultar el contenedor del pop-up */
		.popup .show {
			visibility: visible;
			-webkit-animation: fadeIn 1s;
			animation: fadeIn 1s
		}

   /*Added by linges */
   .star-ratings-sprite {
   background: url("https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2019-07/star-rating-sprite2.png") repeat-x;
   font-size: 0;
   background-size: 15px;
   height:15px;
   line-height: 0;
   overflow: hidden;
   text-indent: -999em;
   width: 75px;
   margin: 0;
   }
   .tbl-btn-pink{
   background-color: #e9f1f7;
   color:black;
   }  
   .tbl-btn-pink:hover{
   background-color: #9c27b0;
   color:white !important;
   }
   .star-ratings-sprite-rating {
   background: url("https://s3-ap-southeast-1.amazonaws.com/easyparcel-static/Public/source/general/img/general/2019-07/star-rating-sprite2.png") repeat-x;
   background-position: 0 100%;
   float: left;
   background-size: 15px;
   height:15px;
   display:block;
   }
   /*
   #quote_result.static_p * {
   font-size: 1.4rem;
   }
   */
   #quote_result.static_p .icon-box.icon-box-left:before {
   content: " ";
   }
   #quote_result.static_p .icon-box.icon-box-left i.material-icons {
   font-size: 26px !important;
   }
   #quote_result.static_p .badge {
   font-family: "Lato","Helvetica Neue","Open Sans",Arial,sans-serif;
   font-size: 75%;
   }
   #quote_result.static_p .badge.badge-default {
   color: #000;
   }
   .ads-slot-home .card {border: 0px !important; border-top:3px solid #dfdfdf!important}
   @media (max-width: 768px) and (min-width: 320px) {
   . ads-slot-home {padding: 0px !important; margin-bottom: 30px;}
   }
   #masterContent .modal-body ul {padding-left: 40px; padding-top: 15px;}

   .courierlist #fromPoint{
      height: calc(2.25rem + 18px)
   }

   .courierlist #ToPoint{
      height: calc(2.25rem + 18px)
   }
</style>
<?php
    $currentPageUrl = $_SERVER["REQUEST_URI"];
   ?>

<div class="widget-list">
   <form id="quote_book_wrapper" method="post" class="multi-step-form content-blockUI nomargin <?php echo strpos($currentPageUrl, 'courier-rate') > 0 ? "courierlist" : "" ?>" onsubmit="return checkaddress(event)">
      <section style="background-color: #F5E1FD;">
         <div class="container">
            <div class="section row nomargin nobottompadding">
               <div class="col-md-12 nopadding">
                  <fieldset id="signup-step-1" class="active animated fadeInRightt text-left">
                     <div class="col-xs-12 m-auto p-0 nopadding">
                        <span class="fail-msg"></span>
                        <div class="card get_quote_wrapper_home">
                           <div id="load"></div>
                           <div class="card-body">
                              <h3 class="card-title">Estimate your Courier Rate ?</h3>
                              <div class="row mb-3">
                                 <div class="col-sm-6 col-xs-5 pr-0">
                                 

                                 <select required class="form-control" id="fromPoint" name="fromPoint"  title="State" data-live-search-placeholder="--Select State--" data-style="btn btn-outline-default"  tabindex='1' ">
                                            <option value="0">--select state--</option>
											<?php foreach ($courierstaterow as $staterow):?>
												<option value="<?php echo $staterow->id; ?>" avail_zip="<?php echo $staterow->Avail_Zipcode; ?>"><?php echo $staterow->name; ?></option>
											<?php endforeach;?>
											</select>
                                 
                                 </div>
                                 <div class="col-sm-6 col-xs-7 padding-right-off c_postcode popup">
                                    <div class="input-group input-has-value postcode_quote " id="address">
                                       <input class="form-control" placeholder="Postcode" id="cp" name="fromZip" txt_c_postcode type="text" maxlength="5" value="<?php echo $fromZip; ?>" >
                                       <span class="popuptext" id="myPopup">Zip not found.</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <div class="col-sm-6 col-xs-5 pr-0">
                                 <select required class="form-control" id="toPoint" name="toPoint"  title="State" data-style="btn btn-outline-default" data-live-search-placeholder="--Select State--" >
                                            <option value="0">--select state--</option>
											<?php foreach ($courierstaterow as $staterow):?>
												<option value="<?php echo $staterow->id; ?>" avail_zip="<?php echo $staterow->Avail_Zipcode; ?>"><?php echo $staterow->name; ?></option>
											<?php endforeach;?>
											</select>
                                 
                                 </div>
                                 <div class="col-sm-6 col-xs-7 padding-right-off d_postcode popup">
                                    <div class="input-group input-has-value postcode_quote" id="address">
                                       <input class="form-control" placeholder="Postcode" id="dp" name="toZip" txt_d_postcode type="text" maxlength="5" value="<?php echo $toZip; ?>">
                                       <span class="popuptext" id="myPopup1">Zip not found.</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row mb-3">
                                 <div class="col-md-12 weight-std hideboxsize  pb-1 mb-2">
                                    <h6 class="text-uppercase mb-0"><span class="get_quote_weight">Weight:</span></h6>
                                 </div>
                                 <div class="col-sm-6 col-xs-5 pr-0">
                                    <span class="showboxsize hide">
                                       <h6 class="text-uppercase weight-cus"><span class="get_quote_weight">Weight:</span></h6>
                                    </span>
                                    <div class="input-group">
                                       <input required class="form-control" id="Weight" name="Weight" value="<?php echo $Weight_r ? $Weight_r : 0; ?>" placeholder="kg (eg : 0.5)" type="text" onchange="validateNumber(this)">
                                       <div class="input-group-btn">
                                          <button class="btn btn-default dropdown-toggle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Volumetric Calculator" type="button" aria-expanded="false" onclick="window.open('https://easyparcel.com/my/en/calculator', '_blank', 'directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,resizable=0,width=500, height=650')"> <i class="list-icon fa fa-calculator"></i> </button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6 col-xs-7 padding-right-off">
                                    <div class="form-group mb-0 hideboxsize ">
                                       <button class="btn btn-pink btn-3d btn-block ripple submit" value="Quote" style="float: right;width: 100%;" id="submit">Quote &amp; Book</button>
                                    </div>
                                    <span class="showboxsize hide">
                                       <h6 class="text-uppercase"><span class="get_quote_size_dimension">Size:</span></h6>
                                    </span>
                                    <div class="to-dropdown showboxsize hide">
                                       <select class="selectpicker form-control" id="boxsize" name="boxsize" data-live-search="true" data-live-search="true" data-live-search-style="startsWith" title="State" data-live-search-placeholder="State" data-style="btn btn-outline-default" onchange="sizeParcel()">
                                          <option value="none">None</option>
                                          <option value="document">Envelope A3/A4</option>
                                          <option value="a">Box A (14x20x6 cm)</option>
                                          <option value="b">Box B (17x25x9 cm)</option>
                                          <option value="c">Box C (20x30x11 cm)</option>
                                          <option value="d">Box D (22x35x14 cm)</option>
                                          <option value="e">Box E (24x40x17 cm)</option>
                                          <option value="f">Box F (30x45x20 cm)</option>
                                          <option value="box0">Box 0 (11x17x6 cm)</option>
                                          <option value="box1">Box 1 (30x100x30 cm)</option>
                                          <option value="box2">Box 2 (31x36x13 cm)</option>
                                          <option value="box3">Box 3 (31x36x26 cm)</option>
                                          <option value="box4">Box 4 (55x100x55 cm)</option>
                                          <option value="box5">Box 5 (40x45x35 cm)</option>
                                          <option value="box6">Box 6 (45x55x40 cm)</option>
                                          <option value="other">Other</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row" id="volumetric" style="display: none;">
                                 <div class="col-md-12">
                                    <h6 class="text-uppercase mb-0"><span class="get_quote_size_dimension">Dimensions:</span></h6>
                                 </div>
                                 <div class="col-sm-4 pr-0">
                                    <input class="form-control" id="width" name="wi" required placeholder="Width (cm)" type="text" value="10">
                                 </div>
                                 <div class="col-sm-4 pr-0">
                                    <input class="form-control" id="length" name="l" required placeholder="Length (cm)" type="text" value="10">
                                 </div>
                                 <div class="col-sm-4">
                                    <input class="form-control" id="height" name="h" required placeholder="Height (cm)" type="text" value="10">
                                 </div>
                              </div>
                              <hr class="mb-2 color-dark">
                              <div id="volumetric_reminder" style="font-size: 12px; color: #000; font-weight: 600;"><i class="material-icons" style="font-size:18px">info</i>Weight will be determined by actual or volumetric weight (VW), whichever higher. Calculate the volumetric weight <a class="border_bottom_dotted" onclick="window.open('https://easyparcel.com/my/en/calculator', '_blank', 'directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,resizable=0,width=500, height=650')">here</a>.</div>
                              <div id="tax_duty_reminder" style="font-size: 12px; color: #000; font-weight: 600;"><i class="material-icons" style="font-size:18px">info</i>Estimate your tax and duties when shipping to other country. Calculate the tax and duties <a class="border_bottom_dotted" onclick="window.open('https://easyparcel.com/my/en/taxcalculator', '_blank', 'directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,resizable=0,width=500, height=650')">here</a>.</div>
                           </div>
                           <div class="card-action showboxsize hide">
                              <div class="col-xs-12 form-group mb-0">
                                 <button class="btn btn-pink btn-3d btn-block ripple submit" value="Quote" style="float: right;width: 100%;" id="submit2">Quote &amp; Book</button>
                                 <input type="hidden" name="courier_rate" value="1" />
                              </div>
                           </div>
                        </div>
                     </div>
                  </fieldset>
               </div>
            </div>
         </div>
      </section>
   </form>
</div>
<div id="quote_result" class="static_p section nomargin notoppadding">
   <style>
      .raya.ribbon {
      position: absolute;
      left: -5px;
      top: -5px;
      z-index: 1;
      overflow: hidden;
      width: 75px;
      height: 75px;
      text-align: right;
      }
      .raya.ribbon span{
      font-size: 10px;
      font-weight: 700;
      color: #f7278c;
      text-transform: uppercase;
      text-align: center;
      line-height: 20px;
      transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      width: 85px;
      display: block;
      background: #ffea42;
      background: linear-gradient(#ffea42 0%,#ffda00 100%);
      box-shadow: 0 3px 10px -5px rgba(0,0,0,1);
      position: absolute;
      top: 14px;
      left: -19px;
      }
      .raya.ribbon span::before {
      content: "";
      position: absolute;
      left: 0px;
      top: 100%;
      z-index: -1;
      border-left: 3px solid #c7b419;
      border-right: 3px solid transparent;
      border-bottom: 3px solid transparent;
      border-top: 3px solid #c7b419;
      }
      .raya.ribbon span::after {
      content: "";
      position: absolute;
      right: 0px;
      top: 100%;
      z-index: -1;
      border-left: 3px solid transparent;
      border-right: 3px solid #c7b419;
      border-bottom: 3px solid transparent;
      border-top: 3px solid #c7b419;
      }
      .janio.ribbon {
      position: absolute;
      left: -5px;
      top: -5px;
      z-index: 1;
      overflow: hidden;
      width: 75px;
      height: 75px;
      text-align: right;
      }
      .janio.ribbon span{
      font-size: 10px;
      font-weight: 700;
      color: #ffffff;
      text-align: center;
      line-height: 20px;
      transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
      width: 100px;
      display: block;
      background: #4439cc;
      background: linear-gradient(#4439cc 0%,#2e2879 100%);
      box-shadow: 0 3px 10px -5px rgba(0,0,0,1);
      position: absolute;
      top: 19px;
      left: -22px;
      }
      .janio.ribbon span::before {
      content: "";
      position: absolute;
      left: 0px;
      top: 100%;
      z-index: -1;
      border-left: 3px solid #151144;
      border-right: 3px solid transparent;
      border-bottom: 3px solid transparent;
      border-top: 3px solid #151144;
      }
      .janio.ribbon span::after {
      content: "";
      position: absolute;
      right: 0px;
      top: 100%;
      z-index: -1;
      border-left: 3px solid transparent;
      border-right: 3px solid #151144;
      border-bottom: 3px solid transparent;
      border-top: 3px solid #151144;
      }
      @keyframes spinner {
      to {transform: rotate(360deg);}
      }  
      .spinner:before {
      content: '';
      box-sizing: border-box;
      position: absolute;
      top: 50%;
      left: 50%;
      width: 20px;
      height: 20px;
      margin-top: -10px;
      margin-left: -10px;
      border-radius: 50%;
      border: 2px solid #ccc;
      border-top-color: #333;
      animation: spinner .6s linear infinite;
      }
      thead.quote_result_hearder_wrapper th {
      position: relative;
      }
      #sorting thead tr th span:before, #sorting thead tr th.headerSortUp span:before, #sorting thead tr th.headerSortDown span:before{
      position: absolute;
      top: 50%;
      right: 0.71429em;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      font-family: "Material Icons";
      -webkit-font-feature-settings: 'liga';
      font-feature-settings: 'liga';
      /*font-size: 1.28571em;*/
      }
      #sorting thead tr th span:before{
      content: 'sort';
      opacity: 0.2;
      }
      #sorting thead tr th.headerSortUp span:before {
      content: 'expand_less';
      opacity: 1;
      }
      #sorting thead tr th.headerSortDown span:before {
      content: 'expand_more'; 
      opacity: 1;
      }
      .select2-dropdown {
      width: 205px !important;
      }
      .swal2-modal{
      margin-top: -277px !important;
      } 
      .coming-soon-courier {
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
      background-color: #f0f0f0 !important;
      }
      .prime-featured .badge.bg-success {
      background-color: #009933 !important;
      border-color: #009933 !important;
      font-weight: 700;
      }
      .fidget { 
      display: inline-block;
      }
      .bounce {
      width: 10px;
      height: 10px;
      /* background-color: #333; */
      background: #000;
      border-radius: 100%;
      display: inline-block;
      margin-left: 4px;
      margin-right: 4px;
      -webkit-animation: bouncesize 1.4s infinite ease-in-out both;
      animation: bouncesize 1.4s infinite ease-in-out both;
      }
      .fidget .bounce:first-child {
      -webkit-animation-delay: -0.32s;
      animation-delay: -0.32s;
      }
      .fidget .bounce:nth-child(2) {
      -webkit-animation-delay: -0.16s;
      animation-delay: -0.16s;
      }
      @-webkit-keyframes bouncesize {
      0%, 80%, 100% { -webkit-transform: scale(0) }
      40% { -webkit-transform: scale(1.0) }
      }
      @keyframes bouncesize {
      0%, 80%, 100% { 
      -webkit-transform: scale(0);
      transform: scale(0);
      } 40% { 
      -webkit-transform: scale(1.0);
      transform: scale(1.0);
      }
      }
      .loadingOverlay {
      position: relative;
      }
      .loadingOverlay:before {
      /* background-color: white; */
      top: 0;
      left: 0;
      cursor: wait;
      z-index: 97;
      margin: auto;
      width: auto;
      content: "";
      display: block;
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 0;
      }
      .loadingOverlay * {
      opacity: .3;
      }
      .dropdown-menu.btn-promorate-drop {
      padding: 20px 0 10px;
      }
      .dropdown-menu.btn-promorate-drop .dropdown-item {
      display: block;
      width: 100%;
      padding: 5px 20px;
      clear: both;
      font-weight: 400;
      color: #888;
      text-align: inherit;
      white-space: nowrap;
      background: none;
      border: 0;
      cursor: pointer;
      }
      .dropdown-menu.btn-promorate-drop .dropdown-item:hover {
      background-color: #f8f9fa;
      }
      .btn .caret {
      margin-left: 5px;
      }
      .caret {
      display: inline-block;
      width: 0;
      height: 0;
      margin-left: 2px;
      vertical-align: middle;
      border-top: 4px dashed;
      border-top: 4px solid \9;
      border-right: 4px solid transparent;
      border-left: 4px solid transparent;
      }
      a.pgeon-prime-free-label {
      position: absolute;
      right: -34px;
      top: -30px;
      }
      .checkbox span.label-text-uncheck:after {border: 2px solid #e6614f;}
      @media screen and (max-width:767px) {
      a.pgeon-prime-free-label {
      right: -45px;
      }
      }
   </style>
   <section style="background-color: #F5E1FD;">
      <div class="container space" style="padding-top: 0px;">
         <div id="quote_list_wrapper" class="collapse content-blockUI show">
            <div class="">
               <table id="sorting" class="table mail-list quote_result_wrapper tablesorter">
                  <thead class="quote_result_hearder_wrapper">
                     <tr>
                        <th></th>
                        <th class="header"><?php echo $lang['courier_services']; ?> <span></span></th>
                        <th class="d-none d-lg-table-cell header"><?php echo $lang['Delivery_Time'];?> <span></span></th>
                        <th class="price header"><?php echo $lang['Service_Rate'];?></th>
                        <th class="header text-center"><?php echo $lang['aaction'];?> <img src="../uploads/tooltip.svg" data-toggle="tooltip" data-html="true" data-placement="top" title="<?php echo cleanOut($rate->title14);?>"></th>
                        </th>
                     </tr>
                  </thead>
                  <tbody id="detail">
                     <?php if(!$ratesrow):?>
                     <tr class=" prime-featured" style="text-align:Center;">
                        <td colspan="5">
                           <?php echo "
                              <i align='center' class='display-3 text-warning d-block'><img src='". ADMINURL ."/assets/images/alert/ohh_shipment_rate.png' width='130' /></i>	No Results found.				
                              ",false;?>
                        </td>
                     </tr>
                     <?php else:
                        $count = 1;
                        ?>
                     <?php foreach ($ratesrow  as $row):?>
                     <tr class=" prime-featured">
                        <td class="d-none d-md-table-cell">#<?php echo $count; ?></td>
                        <td  class="quote_result_courier_wrapper" style="position:relative">
                           <img src="thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row["brand"]) ? $row["brand"] : "no_photo.png";?>&amp;w=120&amp;h=60&amp;s=1&amp;a=t1" alt="" title="<?php echo $row["deli_type_text"];?>">	
                           <div class="quote_result_courier_name"><small data-original-title="" title=""> <?php echo $row["deli_type_text"];?></small></div>
                        </td>
                        <td class="quote_deliver_duration_wrapper d-none d-lg-table-cell">
                           <div class="text-muted"><?php echo $row["deli_time"];?>
                              <br><small data-original-title="" title=""></small>
                           </div>
                        </td>
                        <td class="d-none d-md-table-cell package_selection" id="package1496"><a href="#" ><?php echo $core->currency;?><?php echo $row["rate"];?><small class="question_tooltip" data-toggle="tooltip" data-placement="top" data-html="true" title="" data-original-title="Unlock this promo rate with EP10000 top up. Click me for more info."><i class="material-icons list-icon">help_outline</i></small></a></td>
                        <td class="text-center d-none d-md-table-cell"><a class="btn btn-3d tbl-btn-pink btn-block next-btn" href="<?php echo ADMINURL; ?>/bookings.php?do=bookings&amp;action=ship&amp;id=<?php echo $row["id"];?>&amp;length=<?php if(isset($_POST['length'])){echo $_POST['length'];}else{ echo 0; }?>&amp;width=<?php if(isset($_POST['width'])){echo $_POST['width'];}else{ echo 0;}?>&amp;height=<?php if(isset($_POST['height'])){echo $_POST['height'];}else{echo 0;}?>&amp;weight=<?php if(isset($_POST['Weight'])){echo $_POST['Weight'];}else{echo $_POST['r_weight'];}?>&amp;type=<?php if(isset($_POST['type'])){echo $_POST['type'];}else{ echo " "; }?>"><?php echo $lang['create-bookingcourier'];?></a></td>
                     </tr>
                     <?php $count++; endforeach; endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
</div>
<script>
   $(document).ready(function(){
   	//$('[data-toggle="tooltip"]').tooltip();   
      // $('select[name="fromPoint"] option[value='<?php echo isset($fromPoint) ? $fromPoint : 0; ?>']').attr('selected', 'selected');
      // $('select[name="toPoint"] option[value='<?php echo isset($toPoint) ? $toPoint : 0; ?>']').attr('selected', 'selected');
      var fromPoint = $('#fromPoint');
      var fromzip = $('#cp');
      var toPoint = $('#toPoint');
      var tozip = $('#dp');
      
      fromzip.on('blur', function(){
         debugger;
         var fromzipvalue = $(this).val();
         let foundstr = "0";
         $(fromPoint).find("option").each(function() { 
            if($(this).attr('avail_zip') != undefined && $(this).attr('avail_zip') != ''){
               var found = $(this).attr('avail_zip').includes(fromzipvalue + ",");
               if(found){
                  $(this).attr('selected', 'selected');
                  foundstr = "1";
               }
            } 
         });
         if(foundstr == "0"){
            var popup = document.getElementById("myPopup");
			   popup.classList.toggle("show");
         }else{
            var popup = document.getElementById("myPopup");
			   popup.classList.toggle("hide");
         }
         //alert($(this).val());
      });

      tozip.on('blur', function(){
         debugger;
         var tozipvalue = $(this).val();
         let foundstr = "0";
         $(toPoint).find("option").each(function() { 
            if($(this).attr('avail_zip') != undefined && $(this).attr('avail_zip') != ''){
               var found = $(this).attr('avail_zip').includes(tozipvalue + ",");
               if(found){
                  $(this).attr('selected', 'selected');
                  foundstr = "1";
               }
            } 
         });
         if(foundstr == "0"){
            var popup = document.getElementById("myPopup1");
			   popup.classList.toggle("show");
         }else{
            var popup = document.getElementById("myPopup1");
			   popup.classList.toggle("hide");
         }
         //alert($(this).val());
      });   
   });   
</script>