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
<?php $row = Core::getRowById(Core::contacTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header>Conatact Page Template Manager<span>Editing Contact Page Template <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="Template Title">
									</label>
									<div class="note note-error">Template Title</div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="subject" value="<?php echo $row->subject;?>" placeholder="Contact template">
									</label>
									<div class="note note-error">Contact template</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles1" value="<?php echo $row->titles1;?>" placeholder="Title 1">
									</label>
									<div class="note note-error">Title 1</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles2" value="<?php echo $row->titles2;?>" placeholder="Title 2">
									</label>
									<div class="note note-error">Title 2</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles3" value="<?php echo $row->titles3;?>" placeholder="Placeholder 3">
									</label>
									<div class="note note-error">Placeholder 3</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles4" value="<?php echo $row->titles4;?>" placeholder="Title 4">
									</label>
									<div class="note note-error">Title 4</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles5" value="<?php echo $row->titles5;?>" placeholder="Placeholder 5">
									</label>
									<div class="note note-error">Placeholder 5</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles6" value="<?php echo $row->titles6;?>" placeholder="Title 6">
									</label>
									<div class="note note-error">Title 6</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles7" value="<?php echo $row->titles7;?>" placeholder="Placeholder 7">
									</label>
									<div class="note note-error">Placeholder 7</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles8" value="<?php echo $row->titles8;?>" placeholder="Placeholder 8">
									</label>
									<div class="note note-error">Placeholder 8</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles9" value="<?php echo $row->titles9;?>" placeholder="Placeholder 9">
									</label>
									<div class="note note-error">Placeholder 9</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles10" value="<?php echo $row->titles10;?>" placeholder="Placeholder 10">
									</label>
									<div class="note note-error">Placeholder 10</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles13" value="<?php echo $row->titles13;?>" placeholder="Placeholder 13">
									</label>
									<div class="note note-error">Placeholder 13</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles14" value="<?php echo $row->titles14;?>" placeholder="Placeholder 14">
									</label>
									<div class="note note-error">Placeholder 14</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles15" value="<?php echo $row->titles15;?>" placeholder="Placeholder 15">
									</label>
									<div class="note note-error">Placeholder 15</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles16" value="<?php echo $row->titles16;?>" placeholder="Title 16">
									</label>
									<div class="note note-error">Title 16</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles17" value="<?php echo $row->titles17;?>" placeholder="Title 17">
									</label>
									<div class="note note-error">Title 17</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="titles18" value="<?php echo $row->titles18;?>" placeholder="Title 18">
									</label>
									<div class="note note-error">Title 18</div>
								</section>
							</div>
							<hr>
							<div class="row">
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="titles11" rows="3" cols="6"><?php echo $row->titles11;?></textarea>
									</div>
									<div class="note note-error">Title 11</div>
								</section>
								<section class="col col-6">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="titles12" rows="3" cols="6"><?php echo $row->titles12;?></textarea>
									</div>
									<div class="note note-error">Title 12</div>
								</section>
							</div>
							
							<div class="row">
								<section class="col col-3">
									<label class="input">
										<input type="text" name="titles19" value="<?php echo $row->titles19;?>" placeholder="Latitude">
									</label>
									<div class="note note-error">Latitude</div>
								</section>
								<section class="col col-3">
									<label class="input">
										<input type="text" name="titles20" value="<?php echo $row->titles20;?>" placeholder="length">
									</label>
									<div class="note note-error">length</div>
								</section>
								<section class="col col-6">
									<label class="input">
										<input type="text" name="titles21" value="<?php echo $row->titles21;?>" placeholder="Google map api">
									</label>
									<div class="note note-error">Google map api</div>
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
<?php echo Core::doForm("processWebpageContact");?>
<?php break;?>
<?php default: ?>
												
<?php break;?>
<?php endswitch;?>