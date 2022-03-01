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
<?php $row = Core::getRowById(Core::aboutTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header>About Page Template Manager<span>Editing About Page Template <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="Template Title">
									</label>
									<div class="note note-error">Template Title</div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="Ourvalues" value="<?php echo $row->Ourvalues;?>" placeholder="Values">
									</label>
									<div class="note note-error">Our Core Values</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input name="timage1" type="file" class="fileinput"/>
									</label>
									<div class="note">Image Team 1</div>
								</section>
								<section class="col col-8">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="team1" rows="3" cols="6"><?php echo $row->team1;?></textarea>
									</div>
									<div class="note note-error">Team 1</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input name="timage2" type="file" class="fileinput"/>
									</label>
									<div class="note">Image Team 2</div>
								</section>
								<section class="col col-8">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="team2" rows="3" cols="6"><?php echo $row->team2;?></textarea>
									</div>
									<div class="note note-error">Team 2</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input name="timage3" type="file" class="fileinput"/>
									</label>
									<div class="note">Image Team 3</div>
								</section>
								<section class="col col-8">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="team3" rows="3" cols="6"><?php echo $row->team3;?></textarea>
									</div>
									<div class="note note-error">Team 3</div>
								</section>
							</div>
							<hr>
							
							<div class="row">
								<section class="col col-12">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="paragraph1" rows="3" cols="6"><?php echo $row->paragraph1;?></textarea>
									</div>
									<div class="note note-error">Paragraph 1</div>
								</section>
								<section class="col col-12">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="paragraph2" rows="15" cols="6"><?php echo $row->paragraph2;?></textarea>
									</div>
									<div class="note note-error">Paragraph 2</div>
								</section>
							</div>
							
							<div class="row">
								<section class="col col-12">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="paragraph3" rows="6" cols="6"><?php echo $row->paragraph3;?></textarea>
									</div>
									<div class="note note-error">Paragraph 3</div>
								</section>
								<section class="col col-12">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="paragraph4" rows="15" cols="6"><?php echo $row->paragraph4;?></textarea>
									</div>
									<div class="note note-error">Paragraph 4</div>
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
<?php echo Core::doForm("processWebpageAbout");?>
<?php break;?>
<?php default: ?>
												
<?php break;?>
<?php endswitch;?>