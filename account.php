<?php
// *************************************************************************
// *                                                                       *
// * Account Page : Managed by User                                        *
//                                                                           *
// *************************************************************************

  //define("_VALID_PHP", true);
  require_once("init.php");
  
  if (!$user->logged_in)
      redirect_to("login.php");

	  
  if(isset($_POST["doupdate"])):
	$user->updateProfile();	  
  endif;
  $row = $user->getUserData();
?>

    
    <!--============================= CONFIRMATION =============================-->
    <!-- <section class="main-block">
        <div class="container-fluid">
            <div class="row justify-content-center">-->
                <div class="col-md-12"> 
                    <div class="row">
					<div class="col-12 col-md-8 widget-holder">
<div class="widget-bg ep_position_r">
<div class="widget-body clearfix">

                        
						  <!-- General Information -->

							<div class="payment-wrap">
							<?php include("div_loader.php");?>
								<div class="row">
									<div class="col-md-12">
										<div class="payment-title">
											<span class="ti-files"></span>
											<h4><?php echo $lang['user-account1'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->username;?></span></h4>
										</div>
									</div>
								</div>
								<form class="xform" id="admin_form" method="post" class="ProfileForm" enctype="multipart/form-data" >
									<div class="content-blockUI">
									<div class="edituser row">
										<div class="col-md-6 col-sm-6">
										<div class="form-group">
										  <h6 class="text-muted"> <i class="icon-prepend icon-user"></i> <i class="icon-append icon-asterisk"></i><?php echo $lang['user-account2'] ?></h6>
											<input type="text" disabled="disabled" class="form-control" name="username" readonly="readonly" value="<?php echo $row->username;?>" placeholder="<?php echo $lang['user-account2'] ?>" required>
										</div>
									    </div>
										<div class="col-md-6 col-sm-6">
										<div class="form-group">
										<h6 class="text-muted"> <i class="icon-prepend icon-lock"></i> <i class="icon-append icon-asterisk"></i>Password</h6>
											<input type="password" name="password" placeholder="********" class="form-control">
											<div class="note note-error"><?php echo $lang['user-account3'] ?></div>
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6 class="text-muted"> <i class="icon-prepend icon-envelope-alt"></i> <i class="icon-append icon-asterisk"></i><?php echo $lang['user-account4'] ?></h6>
											<input type="text" name="email" value="<?php echo $row->email;?>" class="form-control" placeholder="<?php echo $lang['user-account4'] ?>">
									</div>
									</div>

									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6> <i class="icon-prepend icon-user"></i><?php echo $lang['user-account5'] ?><h6>
											<input type="text" name="fname" value="<?php echo $row->fname;?>" placeholder="<?php echo $lang['user-account5'] ?>" class="form-control">
									</div>
									</div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6 class="input"> <i class="icon-prepend icon-user"></i><?php echo $lang['user-account6'] ?></h6>
											<input type="text" class="form-control" name="lname" value="<?php echo $row->lname;?>" placeholder="<?php echo $lang['user-account6'] ?>">
									</div>
									</div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6> <i class="icon-prepend icon-phone"></i><?php echo $lang['user-account8'] ?></h6>
										  <div class="col-md-3" style="display:inline-block;">
											<input type="text" class="form-control" name="code_phone" value="<?php echo $row->code_phone;?>" placeholder="<?php echo $lang['user-account7'] ?>">
										   </div>
										   <div class="col-md-8" style="display:inline-block;">
											<input type="text" class="form-control" name="phone" value="<?php echo $row->phone;?>" placeholder="<?php echo $lang['user-account8'] ?>">
										</div>
									</div>
									</div>
										
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6> <i class="icon-prepend icon-location"></i><?php echo $lang['user-account9'] ?></h6>
											<input type="text" class="form-control" name="address" class="form-control" value="<?php echo $row->address;?>" placeholder="<?php echo $lang['user-account9'] ?>">
									</div></div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
											<h6> <i class="icon-prepend icon-user"></i><?php echo $lang['user-account10'] ?></h6>
												<input type="text" class="form-control" name="gender" value="<?php echo $row->gender;?>" placeholder="<?php echo $lang['user-account10'] ?>">
									</div></div>

									
									
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6 class="input"><?php echo $lang['user-account11'] ?></h6>
											<input type="text" name="country" class="form-control" value="<?php echo $row->country;?>" placeholder="<?php echo $lang['user-account11'] ?>">
									</div></div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
									<h6 class="input"><?php echo $lang['user-account12'] ?></h6>
											<input type="text" name="city" value="<?php echo $row->city;?>" class="form-control" placeholder="<?php echo $lang['user-account12'] ?>">
									</div></div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
									<h6 class="input"><?php echo $lang['user-account13'] ?></h6>
											<input type="text" name="postal" class="form-control" value="<?php echo $row->postal;?>" placeholder="<?php echo $lang['user-account13'] ?>">
									</div></div>
									
									
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6><?php echo $lang['user-account16'] ?></h6>
											<h6><input type="radio" name="newsletter" value="1" <?php getChecked($row->newsletter, 1); ?>>
											<i></i><?php echo $lang['user-account14'] ?></h6>
										  
											<h6><input type="radio" name="newsletter" value="0" <?php getChecked($row->newsletter, 0); ?>>
											<i></i><?php echo $lang['user-account15'] ?></h6>
									 </div></div>
									 <div class="col-md-6 col-sm-6">
									<div class="form-group">
									<h6><?php echo $lang['user-account17'] ?></h6>
											<input name="avatar" type="file" class="fileinput"/>
										  
									</div></div>
									
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6 class="input state-disabled"> <i class="icon-prepend icon-calendar"></i><?php echo $lang['user-account18'] ?></h6>
											<input type="text" name="created" disabled="disabled" class="form-control" readonly="readonly" value="<?php echo $row->cdate;?>" placeholder="<?php echo $lang['user-account18'] ?>">
									</div></div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										  <h6 class="input state-disabled"> <i class="icon-prepend icon-calendar"></i><?php echo $lang['user-account19'] ?></h6>
											<input type="text" name="lastlogin" disabled="disabled" class="form-control" readonly="readonly" value="<?php echo $row->ldate;?>" placeholder="<?php echo $lang['user-account19'] ?>">
										  
										  
									</div></div>
									</div></div>
									<footer>
										<button class="btn btn-pink btn-3d pull-right" name="doupdate" type="submit"><i class="material-icons list-icon">check</i>&nbsp;<?php echo $lang['user-account20'] ?><span><i class="icon-ok"></i></span></button>
									</footer>
								</form>
								<?php echo Core::doForm("processUser","ajax/controller.php");?> 
								
													
						</div>
					</div>
				</div>
</div>

				
				<div class="col-12 col-md-4 widget-holder">
<div class="widget-bg ep_position_r" style="box-shadow: 0 6px 15px 0 rgb(0 0 0 / 20%), 0 6px 10px 0 rgb(0 0 0 / 10%);">
<div class="widget-body clearfix">
					<div class="follow">
                        <div class="follow-img text-center">
                            <img src="<?php echo ($row->avatar) ? UPLOADURL . $row->avatar : "assets/images/user_avatar.jpg";?>" alt="" title="" class="avatar" />
                            <h6 class="text-center"><i class="list-icon material-icons">person</i> <?php echo $row->fname;?> <?php echo $row->lname;?></h6>
							<h6 class="text-center"> <i class="list-icon material-icons">phone</i> <?php echo $row->code_phone;?> <?php echo $row->phone;?></h6>
							<h6 class="text-center"> <i class="list-icon material-icons">email</i> <?php echo $row->email;?></h6>
                        </div>
						
                        <!-- <ul class="d-flex">
                            <li class=" flex-fill">
                                <h6><?php echo $row->cdate;?></h6>
                                <span><?php echo $lang['user-account18'] ?></span>
                            </li>
                            <li class=" flex-fill">
                                <h6><?php echo $row->ldate;?></h6>
                                <span><?php echo $lang['user-account19'] ?></span>
                            </li>
                        </ul> -->
                    </div>
                   
                </div>
			</div>
</div></div></div>
	
        <!--============================= FOOTER =============================-->
	
	