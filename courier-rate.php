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
// * If 
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

  define("_VALID_PHP", true);
  require_once("init.php");

//   function getPageData($fromPoint, $toPoint, $fromZip, $toZip, $weight){
// 	$r_weight= $weight;
// 	$sql ="SELECT * FROM courier_rate WHERE FromPoint='$fromPoint' and ToPoint='$toPoint' and FromZip like '%$fromZip%' and ToZIp like '%$toZip%' and Weight='$weight'";
// 	$query=$db->query($sql);
	
// 	$records = array();
// 	while($row = mysqli_fetch_array($query)){
// 	extract($row);
// 	$records[] = array("id" => $id,
// 		"Weight" => $Weight,
// 		"rate" => $rate,
// 		"deli_time" => $deli_time,
// 		"deli_type" => $deli_type,
// 		"deli_type_text" => $deli_type_text);
// 	}	
		
// 	return $records;
// }
	$ratesrow = array();
  $fromPoint = 0;
		$toPoint = 0;
		$fromZip = '';
		$toZip = '';
		$Weight = 0;
  	//$ratesrow = $core->getRates();
     if(isset($_POST['courier_rate']) && $_POST['courier_rate'] == '1'){
		$r_weight= $_POST['Weight'];
		$fromPoint = $_POST['fromPoint'];
		echo $fromPoint;
		$toPoint = $_POST['toPoint'];
		echo $toPoint;
		$fromZip = $_POST['fromZip'];
		$toZip = $_POST['toZip'];
		$Weight = $_POST['Weight'];
	$sql ="SELECT * FROM courier_rate WHERE FromPoint='$fromPoint' and ToPoint='$toPoint' and FromZip like '%$fromZip%' and ToZIp like '%$toZip%' and Weight='$Weight'";
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
    <!--============================= HEADER =============================-->
<style>
select.form-control:not([size]):not([multiple]){
	height: calc(2.25rem + 20px)
}
	</style>
	<?php include("header.php");?>
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	

    <!--//END HEADER -->

    <!--============================= SUBPAGE HEADER BG =============================-->
    
<div id="masterContent">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php (Filter::$do && file_exists(Filter::$do.".php")) ? include(Filter::$do.".php") : include("dashboard/singleparcel_child.php");?>

	<?php include("footer.php");?>

     