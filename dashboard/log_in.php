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
<?php $row = Core::getRowById(Core::logiTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header>Login Page Template Manager<span>Editing Login Page Template <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
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
									<div class="note note-error">Login template</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log1" value="<?php echo $row->log1;?>" placeholder="Title 1">
									</label>
									<div class="note note-error">Title 1</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log2" value="<?php echo $row->log2;?>" placeholder="Title 2">
									</label>
									<div class="note note-error">Title 2</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log3" value="<?php echo $row->log3;?>" placeholder="Title 3">
									</label>
									<div class="note note-error">Title 3</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log4" value="<?php echo $row->log4;?>" placeholder="Placeholder 4">
									</label>
									<div class="note note-error">Placeholder 4</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log5" value="<?php echo $row->log5;?>" placeholder="Placeholder 5">
									</label>
									<div class="note note-error">Placeholder 5</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log6" value="<?php echo $row->log6;?>" placeholder="Title 6">
									</label>
									<div class="note note-error">Title 6</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log7" value="<?php echo $row->log7;?>" placeholder="Title 7">
									</label>
									<div class="note note-error">Title 7</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log8" value="<?php echo $row->log8;?>" placeholder="Title 8">
									</label>
									<div class="note note-error">Title 8</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log9" value="<?php echo $row->log9;?>" placeholder="Title 9">
									</label>
									<div class="note note-error">Title 9</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log10" value="<?php echo $row->log10;?>" placeholder="Title 10">
									</label>
									<div class="note note-error">Title 10</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log11" value="<?php echo $row->log11;?>" placeholder="Title 11">
									</label>
									<div class="note note-error">Title 11</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log12" value="<?php echo $row->log12;?>" placeholder="Placeholder 12">
									</label>
									<div class="note note-error">Placeholder 12</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log13" value="<?php echo $row->log13;?>" placeholder="Placeholder 13">
									</label>
									<div class="note note-error">Placeholder 13</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log14" value="<?php echo $row->log14;?>" placeholder="Placeholder 14">
									</label>
									<div class="note note-error">Placeholder 14</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log15" value="<?php echo $row->log15;?>" placeholder="Placeholder 15">
									</label>
									<div class="note note-error">Placeholder 15</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="log16" value="<?php echo $row->log16;?>" placeholder="Title 16">
									</label>
									<div class="note note-error">Title 16</div>
								</section>
								<section class="col col-12">
									<label class="input">
										<input type="text" name="log17" value="<?php echo $row->log17;?>" placeholder="Title 17">
									</label>
									<div class="note note-error">Title 17</div>
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
<?php echo Core::doForm("processWebpageLogin");?>
<?php break;?>
<?php default: ?>
												
<?php break;?>
<?php endswitch;?>