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

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>

<?php include 'head_user.php'; ?>

<?php switch(Filter::$action): case "edit": ?>
<?php $row = Core::getRowById(Core::menuTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header>Nav menu Page Template Manager<span>Editing Nav menu Page Template <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="Template Title">
									</label>
									<div class="note note-error">Template Title</div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="subject" value="<?php echo $row->subject;?>" placeholder="Nav menu template">
									</label>
									<div class="note note-error">Nav menu template</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav1" value="<?php echo $row->nav1;?>" placeholder="Nav menu 1">
									</label>
									<div class="note note-error">Nav menu 1</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav2" value="<?php echo $row->nav2;?>" placeholder="Nav menu 2">
									</label>
									<div class="note note-error">Nav menu 2</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav3" value="<?php echo $row->nav3;?>" placeholder="Nav menu 3">
									</label>
									<div class="note note-error">Nav menu 3</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav4" value="<?php echo $row->nav4;?>" placeholder="Nav menu 4">
									</label>
									<div class="note note-error">Nav menu 4</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav5" value="<?php echo $row->nav5;?>" placeholder="Nav menu 5">
									</label>
									<div class="note note-error">Nav menu 5</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav6" value="<?php echo $row->nav6;?>" placeholder="Nav menu 6">
									</label>
									<div class="note note-error">Nav menu 6</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav7" value="<?php echo $row->nav7;?>" placeholder="Nav menu 7">
									</label>
									<div class="note note-error">Nav menu 7</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav8" value="<?php echo $row->nav8;?>" placeholder="Nav menu 8">
									</label>
									<div class="note note-error">Nav menu 8</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav9" value="<?php echo $row->nav9;?>" placeholder="Nav menu 9">
									</label>
									<div class="note note-error">Nav menu 9</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="nav10" value="<?php echo $row->nav10;?>" placeholder="Nav menu 10">
									</label>
									<div class="note note-error">Nav menu 10</div>
								</section>
							</div>

							<footer>
								<button class="button" name="dosubmit" type="submit">Update Template<span><i class="icon-ok"></i></span></button>
							</footer>
							<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processWebpageMenu");?>
<?php break;?>
<?php default: ?>
												
<?php break;?>
<?php endswitch;?>