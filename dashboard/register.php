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
// * This software

is furnished under a license and may be used and copied *
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
<?php $row = Core::getRowById(Core::regisTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header>Register Page Template Manager<span>Editing Register Page Template <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="Template Placeholder">
									</label>
									<div class="note note-error">Template Placeholder</div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="subject" value="<?php echo $row->subject;?>" placeholder="Contact template">
									</label>
									<div class="note note-error">Register template</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg1" value="<?php echo $row->reg1;?>" placeholder="Placeholder 1">
									</label>
									<div class="note note-error">Placeholder 1</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg2" value="<?php echo $row->reg2;?>" placeholder="Placeholder 2">
									</label>
									<div class="note note-error">Placeholder 2</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg3" value="<?php echo $row->reg3;?>" placeholder="Placeholder 3">
									</label>
									<div class="note note-error">Placeholder 3</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg4" value="<?php echo $row->reg4;?>" placeholder="Placeholder 4">
									</label>
									<div class="note note-error">Placeholder 4</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg5" value="<?php echo $row->reg5;?>" placeholder="Placeholder 5">
									</label>
									<div class="note note-error">Placeholder 5</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg6" value="<?php echo $row->reg6;?>" placeholder="Placeholder 6">
									</label>
									<div class="note note-error">Placeholder 6</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg7" value="<?php echo $row->reg7;?>" placeholder="Placeholder 7">
									</label>
									<div class="note note-error">Placeholder 7</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg8" value="<?php echo $row->reg8;?>" placeholder="Placeholder 8">
									</label>
									<div class="note note-error">Placeholder 8</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg9" value="<?php echo $row->reg9;?>" placeholder="Placeholder 9">
									</label>
									<div class="note note-error">Placeholder 9</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg10" value="<?php echo $row->reg10;?>" placeholder="Placeholder 10">
									</label>
									<div class="note note-error">Placeholder 10</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg11" value="<?php echo $row->reg11;?>" placeholder="Placeholder 11">
									</label>
									<div class="note note-error">Placeholder 11</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg12" value="<?php echo $row->reg12;?>" placeholder="Placeholder 12">
									</label>
									<div class="note note-error">Placeholder 12</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg13" value="<?php echo $row->reg13;?>" placeholder="Placeholder 13">
									</label>
									<div class="note note-error">Placeholder 13</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg14" value="<?php echo $row->reg14;?>" placeholder="Placeholder 14">
									</label>
									<div class="note note-error">Placeholder 14</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg15" value="<?php echo $row->reg15;?>" placeholder="Placeholder 15">
									</label>
									<div class="note note-error">Placeholder 15</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="reg16" value="<?php echo $row->reg16;?>" placeholder="Placeholder 16">
									</label>
									<div class="note note-error">Placeholder 16</div>
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
<?php echo Core::doForm("processWebpageReg");?>
<?php break;?>
<?php default: ?>
												
<?php break;?>
<?php endswitch;?>