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
 
 require_once("init.php");
  
function getPageData(){
	$r_weight= 0.5;
	$sql ="SELECT * FROM ship_rate WHERE weight='$r_weight'";
	$query=$db->query($sql);
	
	$records = array();
	while($row = mysqli_fetch_array($query)){
	extract($row);
	$records[] = array("id" => $id,
		"n_courier" => $n_courier,
		"services" => $services,
		"weight" => $weight,
		"rate" => $rate,
		"deli_time" => $deli_time,
		"typeweight" => $typeweight,
		"brand" => $brand);
	}	
		
	return $records;
}

?>