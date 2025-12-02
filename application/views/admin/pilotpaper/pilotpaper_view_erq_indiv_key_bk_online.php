  <!-- Content Wrapper. Contains page content -->
<style>
	.urdufont-right {
		font-size: 22px;
	}
	
	body {
		font-size: 1.1rem;
	}
	
	.container {
		padding-left: 0px;
		padding-right: 0px;
		;
	}
</style>
<div class="content-wrapper">
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>
				<?php 
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($paper_erqs[0]->subject_name_en);
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
				?>
				<div class="container" style="padding-top:25px">
					<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 20px;">
						<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;">
							<?php print $paper_erqs[0]->subject_name_en;?> - GRADE
							<?php print $paper_erqs[0]->item_grade_id-2;?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<table border="0" cellpadding="2" cellspacing="2" width="100%">
								<tbody>
									<tr>
										<td width="50%">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="110px;">Student Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;</td>
													</tr>

												</tbody>
											</table>
										</td>
										<td width="50%">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="50px;">Date: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="padding-top: 10px;">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="110px;">School Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12" style="border-bottom:#000 solid 1px"></div>
					</div>
					<?php }?> </div>

				<div class="container" style="padding-top:25px">
					<div class="row">
						<div style="font-size:30px; font-weight:bold; text-align:center; width: 100%;">ANSWERS / RUBRICS</div>
						<div style="width: 100%">
							<?php
							if (!empty($paper_erqs)) {
								$i = 0;
								foreach ($paper_erqs as $item) {
									$i++;
									if ($item->item_type == 'ERQ') {
										?>
									<table width="100%" style="margin-top:10px;">
										
										<?php if ($item->item_stem_en!=""){?>
										<tr>
											<td colspan="2" style="font-weight:bold; font-size:18px; border-bottom: 3px dotted #000;">
												<?php if ($item->item_type == 'ERQ'){?> 
													Question No.<?php print $i; 
												 }?>:
											</td>
										</tr>
										<?php }?>
										<?php if ($item->item_stem_ur!=""){?>
										<tr>
											<td colspan="2" style="text-align:right; font-weight:bold; border-bottom: 3px dotted #000;" class="urdufont-right">
												<?php if ($item->item_type=='ERQ'){?> سوال نمبر
												<?php print $i;?>:&nbsp;
												<?php }?>

											</td>
										</tr>
										<?php }?>
									</table>
									<?php 
									  if($item->item_rubric_image!='')
									  {
										  if($item->item_rubric_urdu!=''&&$item->item_rubric_english!='')
										  {?>
											  <table style="width: 100%">
												<?php if($item->item_rubric_image_position=='Top'){?>
												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
												<?php }?>
												<tr><td style="width:50%"><?php echo html_entity_decode($item->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_rubric_urdu);?></td></td></tr>
												<?php if($item->item_rubric_image_position=='Bottom'){?>
												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
												<?php }?>
											  </table>
										  <?php }

										  elseif($item->item_rubric_urdu==''&&$item->item_rubric_english!='')
										  {?>
											  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
											  <table width="100%" >
												<?php if($item->item_rubric_image_position=='Top'){?>
												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
												<?php }?>

												<tr>
													<?php if($item->item_rubric_image_position=='Left'){?>
													<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>
													<?php }?>

													<td><?php echo html_entity_decode($item->item_rubric_english);?></td>

													<?php if($item->item_rubric_image_position=='Right'){?>
													<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>
													<?php }?>
												</tr>

												<?php if($item->item_rubric_image_position=='Bottom'){?>
												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
												<?php }?>
											  </table>
									  <?php }

										  elseif($item->item_rubric_urdu!=''&&$item->item_rubric_english=='')
										  { ?>
										  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
										  <table width="100%">
											<?php if($item->item_rubric_image_position=='Top'){?>
											<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
											<?php }?>
											<tr>
												<?php if($item->item_rubric_image_position=='Left'){?>
												<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>
												<?php }?>
												<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td>
												<?php if($item->item_rubric_image_position=='Right'){?>
												<td width="50%"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td>
												<?php }?>
											</tr>
											<?php if($item->item_rubric_image_position=='Bottom'){?>
											<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
											<?php }?>
										  </table>
									  <?php }

										  else
										  {?>
											  <table width="100%">
												<tr><td style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
											  </table>
									  <?php }
									  }
									  else
									  {
										  if($item->item_rubric_urdu==''&&$item->item_rubric_english!='')
										  {?>
											  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
											  <table width="100%" ><tr><td><?php echo  html_entity_decode($item->item_rubric_english);?></td></tr></table>
									  <?php 
										  }
										  elseif($item->item_rubric_urdu!=''&&$item->item_rubric_english=='')
										  { ?>
										  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
										  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td></tr></table>
									  <?php }
										  //$item->item_rubric_urdu!=''&&$item->item_rubric_english!=''
										  else
										  {
											  ?>
											  <table style="width:100%">
												<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($item->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_rubric_urdu);?></td></tr>
											  </table>
										  <?php 
										  }
									  }?>
								<?php
								}
							  }
							} else {
								print '<div style="text-align:center">No data available</div>';
							}
							?>
						</div>
					</div>
					<!---- end  here is item view filmzy --->
				</div>

				<!-- /.box-body -->
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<hr>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>