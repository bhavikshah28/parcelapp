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
                    <div class="titile-block title-block_subpage">
                        <h4><?php echo cleanOut($termsu->teruse0);?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SUBPAGE HEADER BG -->
    <!--============================= BLOG DETAIL =============================-->
    <section class="main-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                    <div class="full-blog">
                        <div class="blog-content">
                            <div class="blog-text">
							
								<?php echo cleanOut($termsu->teruse1);?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END BLOG DETAIL -->
	
     <!--============================= FOOTER =============================-->
	
	<?php include("footer.php");?>
	
     <!--//END FOOTER -->