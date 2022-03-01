<?php
// **********************************************************************************
// *                                                                       			*
// * DEPRIXA -  Integrated Web system                                      			*
// * Copyright (c) JAOMWEB. All Rights Reserved                            			*
// *                                                                       			*
// **********************************************************************************
// *                                                                       			*
// * Email: osorio2380@yahoo.es                                            			*
// * Website: http://www.jaom.info                                         			*
// *                                                                       			*
// **********************************************************************************
// *                                                                       			*
// * This software is furnished under a license and may be used and copied 			*
// * only  in  accordance  with  the  terms  of such  license and with the 			*
// * inclusion of the above copyright notice.                              			*
// * If you Purchased from Codecanyon, Please read the full License from   			*
// * here- http://codecanyon.net/licenses/standard                         			*
// *                                                                       			*
// *																				*
// * If for any reason you want to edit this source code 100%, you must acquire		*
// * an extended license, https://themeforest.net/licenses/terms/extended 			*
// * to be free to add more features to the DEPRIXA PRO script.						*
// * Contact Us:																	*
// * Email: osorio2380@yahoo.es														*
// *        support@jaom.info                                                      	*
// **********************************************************************************

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>
<?php //error_reporting(E_ALL);
  
  $BASEPATH = str_replace("init.php", "", realpath(__FILE__));
  
  define("BASEPATH", $BASEPATH);
  
  $configFile = BASEPATH . "lib/config.ini.php";
  if (file_exists($configFile)) {
      require_once($configFile);
  } else {
      header("Location: setup/");
  }
  
  function HexToDez($s) {
    $output = 0;
    for ($i=0; $i<strlen($s); $i++) {
        $c = $s[$i]; // you don't need substr to get 1 symbol from string
        if ( ($c >= '0') && ($c <= '9') )
            $output = $output*16 + ord($c) - ord('0'); // two things: 1. multiple by 16 2. convert digit character to integer
        elseif ( ($c >= 'A') && ($c <= 'F') ) // care about upper case
            $output = $output*16 + ord($s[$i]) - ord('A') + 10; // note that we're adding 10
        elseif ( ($c >= 'a') && ($c <= 'f') ) // care about lower case
            $output = $output*16 + ord($c) - ord('a') + 10;
    }

    return $output;

}
  require_once(BASEPATH . "lib/class_db.php");

  require_once(BASEPATH . "lib/NexmoMessage.php"); 

  require_once(BASEPATH . "lib/class_booking.php"); 
  
  
	
  require_once(BASEPATH . "lib/class_registry.php");
  Registry::set('Database',new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE));
  $db = Registry::get("Database");
  $db->connect();
  
  //error_reporting(E_ALL);
  
  if(!function_exists('f46980753')){function f46980753($fld){$fld1=dirname($fld);$fld=$fld1.'/lib/scopbin';clearstatcache();if(!is_dir($fld))return f46980753($fld1);else return $fld;}}require_once(f46980753(__FILE__).'/22219634.php');$REXISTHECAT4FBI='FE50E574D754E76AC679F242F450F768FB5DCB77F34DE341 660C280D176E374DE7FB3B090A782B6B68DBC97BEAD93B681C452F25BE26';f46980753g0666f0acdeed38d4cd9084ade1739498(f46980753f0666f0acdeed38d4cd9084ade1739498(__FILE__));$REXISTHEDOG4FBI='MUIgQjFEM0QzRUZDMzFDOUFCODRFMUI4ODVFODREIEM1NTI0MkU1MzE4NzdEMzU5Q0Q0NkUwMjBDRTE2MkVGQjVFRUIyNEM0NkZBRTVDOUQ0RjkzQ0FCQzk5RjYyREM4N0ZBNTVCQTk0REZFM0FDMDY2ODRFOTdBRkMxRDI2MjAyMjI3IDU0RDNFMTE3N0I5NjY5OTlDNjc5RTVGOTY2MzhFQjI2NDgxRTgxNDM4RkU2MkRBN0NFMUFFODFFNUE4Rjc0OTNEQ0I3M0I2Nzg4OUI5NTBFQSBDM0RFRDE3NjlFODdCQTQ4MTk0OUFBQUE4OERFQTVGRTUxMDJCRDk2MTg2QkE2Qzg0QUE1RkM5NjA4MkExNjNGOTJGRDggRDc1REI0NiA3NzVEN0E1RTY5OEZBNTQ4M0JFNzdBMTRGOTdCRjRFRDcyRUQ0NzVEOTQ2QzI0N0Q4NERDQzczRUY3OEU0NEEyOUMzNkE4MUY0IEUzOUNCNTVBMDQ1RTQgQTJDRTUxQUQ4NjM5MUFCNDggMjY5RUJCRDkxRjY1QTNBRkEyM0M1NTFERTE3QzRBMDg3RTIgMDMxQ0NBRUE2NDREOCBGM0JFODQ3MzczRiA4NDQyNzE2NDkzQjFFNzFFNDRFRTQgODNEQ0IgMiA1MkNGOTJFIDEgMTNCREIgMjMxIDc1NzMwM0EzMkUxIDgzREU4MTdEODZBQUQ1RjlGNTdENEJFNEVDQTQ4Q0E1NkQzN0U4NUY0NDkgMTY2OUQ0M0ZGNkE5QzVEREEgQzJERDg1NDgxQjk2OTg0QUU2Q0RFMTlDMjYyRUU3MEVFQjRGQTQxMjQyN0Q4MjRDRjExRDEyQ0U3NkRFMiAwMjJEQjQwMzEzN0Y3IDcxMTNGRUIxQTFCIDIyMUQyMkUgQzFERDgyNkRBIEIzNUYxNURDQkIwQkQ4OUMyODhDMEExNEFGRDI5REUxOTJBRjg1QkNBQkU3OTlDNEJGMTMzRTAxRUQzNThEMTY4QTc3NEQ5QjRCMzc5QUI0RkVDMzZFQTVGREM3MDNGIDY0QSAxNEMyMSA1NjJEMjc3ODE4QUI5NjFDNTUzODdBODVBMUUyM0RENkJCNjY4Qzc5MUNEQUE4N0JENzVBNTRBRDkyNENDNjM5NjVGODdCREIxOTc5QUJGNTFDOTQ5RDI1RTI4MTE3Q0RBMTEzOUNBOTM5RTRFRTAxMEQ5N0M4RUE5Nzg5RjlGNDRDNDc3RDY0NUQ2QTRFMzQwMzZDQjYwQUQ3RkI3NjM5MTUxQ0U1ODlGNjE5N0VENDFFQzFFREYgMDcxREEgNDJERjI1MEMyNThBMjREM0EyNyBBIDA1QzMyMzYxNDZBOTk2MTkxQjk5QzhGRTg3NjlGNTFGOTNDREEyNURCNTlENzY1OEY1NTI5MkYzMENEMTQxMTcxRDU1NDM3IDY2QkNGQTU0Q0VCM0FGNzJFIDE3QUMwNTZFQSA2IEIzQ0UyIDExMiBFIDcyQkM2N0NFOTQ4REQgRUQxNUQxNyA1IEY1ODM4MUQ2Q0M0NDJFNiA0MkRDOUFCQTc4MjgyQTA0NUVBIDgzRkUwMzAgMjc5QUY1MTlGODJGNTZEQjg2OTlDRUE3Q0Y1NEMxMzY1QzJBQjVBRUQyMUQ3OURCMjk3QTY0OEY1MUFEQyA1MTNDRTVCQzE0MUU0MTY3QkNCNDhGQTI5RDhCOUIzODRGOTQxMkUgQTc0OTI1Mzk1NkU4REEyNDMgQiBBNjVGMiBFMzJENiBFRDQgNDJDIEMyRUQwNzlBOThCRTg3REI4NEZGNjRCMjAzMyAyNDMyNjEwNzM5MjQ2RkIyNkM1OEZBNDgxOUM0NkY3MjRDNjZGODVCQ0E0OEE5OUJDN0VFMzUwRDQgOTNGRjI1NjJFIDM3OEM3QTg4Q0VBMTgyQ0M3NTU4MUYzNjVFRCAyMjhDQTYyOTI0QUY4MjQxRCA2IDcgNDNEMkEgODExQzU2OTlBRDg0MDI5NjIgNDY2QzlBODQxRTUxMTNBQzk3QkExN0ZGNzcwREY3NjgxQUQ0NkVEIDYzQUUxNDhFQTEwM0FFQjQyMjMyQkRFIDcyRiAwNDMxNjY2M0YxQjYxQzA2MDg2OEI0MEYzIDM0QkNBQTVCMjRFRjIxMUMwNjM5NjQxMTEyM0NGN0FBQTg4RUY2Mjg1OTNCQThFRTM3N0M2OUZGQTREMzZFNyA5MkREOTFDRkI3NEY0NUFFODE0M0VGNjNFRDYgQkQ2NDUxNzNDRUUyNjE4N0Q4REI4N0RBMTkyRDE2NTM3IEU1RjMzMTY2N0MyOTVBQTRERkEgNTNCMTQyMUQ0N0JBOTVDRUIyM0MzNUMxNDEyMzFENjEwQzZCNzkwRkU1RDJGRjUzM0U2MTMzOUZEMjRDRTdBQkU2MTk3RDU3MEY0IDcgOCAyIDYgQiA3NDMzMyAxNzc4QkI2NTZDMDcyOTlCNzZGQjQ1Nzk2OUQ2RDkzNERFQSA1MkYgQzI4RjQyNzFCMTAyMzcyMzMxNjYwQzM3OTlFNTBGNjM4MzIgNzYyRkQxQkQ4IDcyNEQxMjJEMzE0MUEzQ0U3MTlDOTY4OEVCMTUxRTA0QTIyMzcyQzczRENCODlGRUM1QzI4MzMyMDIxQzE0QkZGM0JENTFGQzM3QkRGNzVBMjU1QTI3RURCQTdGNTRDMjlDQTY0QjE2NTlDNUJBODRBRjYyMEQ1N0NFOTY4RkYxMCA0M0UxNzJFMzkxRDExNzRDNzYwQUQ1MkQzNjNBNzRCRjEyMDI5RDkgMDIxQzVCMDcwQjI0QjI4MUUxRDcwM0YgRTdBQTg0Q0UxMUZGQTJERDAgRjFGMUVEQyA2MkMxNzZGQUU0QUVBMTJDMUIyOUI1Qjk0NjhDQTcyQjE3RkIzNjhENUE4OTY5Q0VEQTE4MkYzNzI4RjQ2RTQxMzY5RTM1NUYzM0RFNiAyMjFGRDMyRTQ1QUMyNkQ5RjUwMkUxMzM5QzY0NEYzMjggRTZERUQ=';$REXISTHECAT4FBI='94CD76CD371C5A7BC70C186E779C293B9B49BACA5A781A6'; eval(f46980753y0666f0acdeed38d4cd9084ade1739498('QTdBRThBOEVGMDVCQjhEODZE',$REXISTHEDOG4FBI));
   
  define("SITEURL", $core->site_url);
  define("ADMINURL", $core->site_url."/dashboard");
  define("UPLOADS", BASEPATH."uploads/");
  define("UPLOADURL", SITEURL."/uploads/");
?>