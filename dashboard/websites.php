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
<?php $row = Core::getRowById(Core::webTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header>Web Page Template Manager<span>Editing Web Page Template <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="Template Title">
									</label>
									<div class="note note-error">Template Title</div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="subject" value="<?php echo $row->subject;?>" placeholder="Website template">
									</label>
									<div class="note note-error">Website template</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="holder" value="<?php echo $row->holder;?>" placeholder="Placeholder">
									</label>
									<div class="note note-error">Placeholder</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="termcon" value="<?php echo $row->termcon;?>" placeholder="Terms & Condition">
									</label>
									<div class="note note-error">Terms & Condition</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="seatrack" value="<?php echo $row->seatrack;?>" placeholder="Search Track">
									</label>
									<div class="note note-error">Search Track</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="creaac" value="<?php echo $row->creaac;?>" placeholder="Create Account">
									</label>
									<div class="note note-error">Create Account</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="terms" value="<?php echo $row->terms;?>" placeholder="Terms">
									</label>
									<div class="note note-error">Terms</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="privacy" value="<?php echo $row->privacy;?>" placeholder="Privacy">
									</label>
									<div class="note note-error">Privacy</div>
								</section>
							</div>
							<hr>
							
							<div class="row">
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="section1" rows="3" cols="6"><?php echo $row->section1;?></textarea>
									</div>
									<div class="note note-error">Section 1</div>
								</section>
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="section2" rows="3" cols="6"><?php echo $row->section2;?></textarea>
									</div>
									<div class="note note-error">Section 2</div>
								</section>
							</div>
							
							<div class="row">
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="section3" rows="3" cols="6"><?php echo $row->section3;?></textarea>
									</div>
									<div class="note note-error">Section 3</div>
								</section>
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="section4" rows="3" cols="6"><?php echo $row->section4;?></textarea>
									</div>
									<div class="note note-error">Section 4</div>
								</section>
							</div>
							
							<div class="row">
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="section5" rows="3" cols="6"><?php echo $row->section5;?></textarea>
									</div>
									<div class="note note-error">Section 5</div>
								</section>
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="section6" rows="3" cols="6"><?php echo $row->section6;?></textarea>
									</div>
									<div class="note note-error">Section 6</div>
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
<?php echo Core::doForm("processWebpageTemplate");?>
<?php break;?>
<?php default: ?>
												
<?php break;?>
<?php endswitch;?>