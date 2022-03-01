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
<?php $row = Core::getRowById(Core::ratTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">
							<header>Rates Page Template Manager<span>Editing Rates Page Template <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="Template Title">
									</label>
									<div class="note note-error">Template Title</div>
								</section>
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="subject" value="<?php echo $row->subject;?>" placeholder="Rate template">
									</label>
									<div class="note note-error">Rate template</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title1" value="<?php echo $row->title1;?>" placeholder="Title 1">
									</label>
									<div class="note note-error">Title 1</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title2" value="<?php echo $row->title2;?>" placeholder="Title 2">
									</label>
									<div class="note note-error">Title 2</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title3" value="<?php echo $row->title3;?>" placeholder="Title3">
									</label>
									<div class="note note-error">Title 3</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title4" value="<?php echo $row->title4;?>" placeholder="Title 4">
									</label>
									<div class="note note-error">Title 4</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title5" value="<?php echo $row->title5;?>" placeholder="Title 5">
									</label>
									<div class="note note-error">Title 5</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title6" value="<?php echo $row->title6;?>" placeholder="Title 6">
									</label>
									<div class="note note-error">Title 6</div>
								</section>
							</div>
							<div class="row">
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title7" value="<?php echo $row->title7;?>" placeholder="Title 7">
									</label>
									<div class="note note-error">Title 7</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title8" value="<?php echo $row->title8;?>" placeholder="Title 8">
									</label>
									<div class="note note-error">Title 8</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title9" value="<?php echo $row->title9;?>" placeholder="Title 9">
									</label>
									<div class="note note-error">Title 9</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title10" value="<?php echo $row->title10;?>" placeholder="Title 10">
									</label>
									<div class="note note-error">Title 10</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title12" value="<?php echo $row->title12;?>" placeholder="Title 12">
									</label>
									<div class="note note-error">Title 12</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title13" value="<?php echo $row->title13;?>" placeholder="Title 13">
									</label>
									<div class="note note-error">Title 13</div>
								</section>
								<section class="col col-8">
									<label class="input">
										<input type="text" name="title14" value="<?php echo $row->title14;?>" placeholder="Title 14">
									</label>
									<div class="note note-error">Title 14</div>
								</section>
								<section class="col col-4">
									<label class="input">
										<input type="text" name="title15" value="<?php echo $row->title15;?>" placeholder="Title 15">
									</label>
									<div class="note note-error">Title 15</div>
								</section>
							</div>
							<hr>
							
							<div class="row">
								<section class="col col-12">
									<div class="field-wrap wysiwyg-wrap">
										<textarea class="post" name="title11" rows="3" cols="6"><?php echo $row->title11;?></textarea>
									</div>
									<div class="note note-error">Title 11</div>
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
<?php echo Core::doForm("processWebpageRate");?>
<?php break;?>
<?php default: ?>
												
<?php break;?>
<?php endswitch;?>