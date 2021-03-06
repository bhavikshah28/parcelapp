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
	//set timezone
	//date_default_timezone_set('Asia/Manila');

	$year = date('Y'); //2018
	$prev = date('Y');
	
	$yeardelivered = date('Y'); //2018
	$prevpending = date('Y');

	$out = array();

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT SUM(r_costtotal) as total FROM add_courier WHERE month(created)='$month' AND year(created)='$year' AND act_status='1'";
		$query=$db->query($sql);
		$row=$query->fetch_array();

		$out['year'][]= round_out($row['total']);
	}

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT COUNT(id) as total FROM add_courier WHERE month(created)='$month' AND year(created)='$prev' AND act_status='1'";
		$pquery=$db->query($sql);
		$prow=$pquery->fetch_array();

		$out['prev'][]=$prow['total'];
	}
	
	
	
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT SUM(r_costtotal) as total FROM add_courier WHERE month(created)='$month' AND year(created)='$yeardelivered' AND act_status='2' AND status_courier='Delivered'";
		$dquery=$db->query($sql);
		$drow=$dquery->fetch_array();

		$out['yeardelivered'][]= round_out($drow['total']);
	}

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT SUM(tprice) as total FROM detail_container WHERE month(created)='$month' AND year(created)='$prevpending' AND act_status='3'";
		$bquery=$db->query($sql);
		$brow=$bquery->fetch_array();

		$out['prevpending'][]=round_out($brow['total']);
	}

	echo json_encode($out);

?>