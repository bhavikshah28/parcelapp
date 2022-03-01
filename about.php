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
                        <?php echo cleanOut($about->paragraph1);?>
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
                <div class="col-md-8 responsive-wrap">
                    <div class="full-blog">
                        <div class="blog-content">
                            <div class="blog-text">
							
								<?php echo cleanOut($about->paragraph2);?>

                                <blockquote class="blockquote text-center my-5">
                                    <?php echo cleanOut($about->paragraph3);?>
                                </blockquote>

								<?php echo cleanOut($about->paragraph4);?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="sidebar">
                        <div class="widget-box">
							 <form action="track_shipment.php" method="post" >
								<div class="input-group">
									<input type="text" name="order_inv" class="form-control comment-text" placeholder=" shipping number Ej:(AWB-100000001)" aria-label="Recipient's username">
									<div class="input-group-append">
										<button type="submit" name="submit" class="btn btn-outline-secondary btn-widget">GO</button>
									</div>
								</div>
							</form>
                        </div>
                        <div class="widget-box">
                            <h4><?php echo cleanOut($about->Ourvalues);?></h4>
                            <div class="latest-blog">
                                <a href="">
                                    <?php echo ($about->timage1) ? '<img src="'.SITEURL.'/uploads/'.$about->timage1.'" alt="'.$about->team1.'" />': $about->team1;?>
                                    <div class="blog-thumb-content">
                                        <?php echo cleanOut($about->team1);?>
                                    </div>
                                </a>

                            </div>
                            <div class="latest-blog">
                                <a href="">
                                    <?php echo ($about->timage2) ? '<img src="'.SITEURL.'/uploads/'.$about->timage2.'" alt="'.$about->team2.'" />': $about->team2;?>
                                    <div class="blog-thumb-content">
                                         <?php echo cleanOut($about->team2);?>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-blog">
                                <a href="">
                                    <?php echo ($about->timage3) ? '<img src="'.SITEURL.'/uploads/'.$about->timage3.'" alt="'.$about->team3.'" />': $about->team3;?>
                                    <div class="blog-thumb-content">
                                         <?php echo cleanOut($about->team3);?>
                                    </div>
                                </a>
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