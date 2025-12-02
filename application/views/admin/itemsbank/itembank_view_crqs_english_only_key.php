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
				if(!empty($paper_erqs)){
					$headers = $this->Itemsbank_model->get_headers_by_id($paper_erqs[0]->subject_id, 'ERQs');
					if(!empty($headers)){
						$headers = $headers[0];	
					?>
						<div class="container" style="padding:5px">
							<div class="row form-group" style="border:#000 solid 4px; position: relative;">
								<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">SCHOOL BASED ASSESSMENT <?php print date('Y');?></div>
								<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">GRADE <?php echo $headers['grade_code'];?></div>
								<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold;">
									<span style="text-transform:uppercase"><?php echo $headers['subject_name_en'];?></span> PART – B (Subjective Type)
								</div>

								<div class="col-lg-12 col-md-12 col-sm-12" style="font-size:18px; font-weight:bold; padding: 15px;">
									<div class="row">
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" style="font-size:18px; font-weight:bold">
											School :
										</div>
										<div class="col-xl-11 col-lg-11 col-md-11 col-sm-11" style="border-bottom:#000 solid 2px">											
										</div>
									</div>
									<div class="row">
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" style="font-size:18px; font-weight:bold">
											Tehsil :
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5" style="border-bottom:#000 solid 2px">
										</div>
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" style="font-size:18px; font-weight:bold">
											District:
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5" style="border-bottom:#000 solid 2px">
										</div>
									</div>
								</div>

							</div>
							<div class="row form-group">
								<div class="col-lg-12 col-sm-12" style="font-size:18px;">
									<table style="width:100%">
										<tbody>
											<tr>
												<td>
												<table border="0" cellpadding="2" cellspacing="2" width="100%">
													<tbody>
														<tr>
															<td><strong style="font-size: 20px;">General Instructions for Teachers :</strong></td>
															<td>
															<div class="urdufont-right" style="padding-left:20px; text-align: right"><span dir="RTL"> اساتذہ کے لیے عمومی ہدایات:</span></div>
															</td>
														</tr>
													</tbody>
												</table>
												</td>
											</tr>
											<tr>
												<td>1.	It is mandatory to use Rubrics for marking of papers for uniform marking throughout the Punjab.</td>
											</tr>
											<tr>
												<td class="urdufont-right" style="text-align:right; font-weight:bold"><span style="padding-left:50px:"><span dir="RTL">۱۔   پیپر کی مارکنگ کے لیے روبررکس کا استعمال ضروری ہے تا کہ پورے پنجاب میں یکساں معیار کے ساتھ مارکنگ ہو سکے ۔</span> </span></td>
											</tr>
											<tr>
												<td>2.	In case of any ambiguity, please consult rubrics manual, rubrics video or PEC trained LMT of your district. </td>
											</tr>
											<tr>
												<td class="urdufont-right" style="text-align:right; font-weight:bold"><span style="padding-left:50px:"><span dir="RTL">٢۔ کسی ابہام کی صورت میں، آپ روبرکس مینوئل،روبرکس ویڈیو یا PEC کے ٹرینڈ کردہ اپنے ضلع کے LMT سے رابطہ کر سکتے ہیں ۔</span> </span></td>
											</tr>
											<tr>
												<td>3.	If a student writes anything other than that given in textbook or model answer of rubrics and if that is correct, please award him/her marks.</td>
											</tr>
											<tr>
												<td class="urdufont-right" style="text-align:right; font-weight:bold"><span style="padding-left:50px:"><span dir="RTL">٣ ۔ اگر طالبعلم درسی کتاب یا روبرکس میں موجود ماڈل جواب کے علاوہ کچھ لکھتا ہے اور  وہ  درست ہے تو اسے اس کے  نمبر دیے جائیں ۔ </span> </span></td>
											</tr>
											<tr>
												<td>4.	No marks will be given for irrelevant answer.</td>
											</tr>
											<tr>
												<td class="urdufont-right" style="text-align:right; font-weight:bold"><span style="padding-left:50px:"><span dir="RTL">٤ ۔ غیر متعلقہ جواب کے کوئی نمبر نہیں دیے جائیں  گے ۔</span> </span></td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-sm-12" style="border:#000 solid 1px"></div>
							</div>
						</div>

					<?php 
					}
				}
			?>

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