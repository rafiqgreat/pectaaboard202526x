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
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------>    
	<div style="padding:0px; margin:0px auto">
  <div style="width: 471px; border: 3px solid #000; font-size: 20px; font-family: Times New Roman;">
    <?php
                    $crp_v = $this->uri->segment(5);
					//$crp_s = $this->uri->segment(4);
					//$crp_v_arry = explode('_',$crp_v);
					//print_r($crp_v);
					//die();
					/******************************************/
                    $file_name = 'Control_Files_CRQs/'.$paper_erqs[0]->subject_code.'_G'.($paper_erqs[0]->item_grade_id-2).'_P1_ID'.$paper_erqs[0]->subject_id.'.txt';
					$file_name2 = 'Control_Files_CRQs_IDs/'.$paper_erqs[0]->subject_code.'_G'.($paper_erqs[0]->item_grade_id-2).'_P1_ID'.$paper_erqs[0]->subject_id.'.txt';
					$contents = "";
					$contents2 = "";
					$nctr = 1;
					$nctrx = '';
					/*****************************************************/
						if(!empty($paper_erqs))
						{
							$i = 0;
							foreach($paper_erqs as $paper_erq)
							{
								/**************/
                                $nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
                                $nctr++;
								$contents.= "Item".$nctrx."\t+\t".strtoupper($paper_erq->item_total_marks+1)."\t".$paper_erqs[0]->subject_code.'_G'.($paper_erqs[0]->item_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
								$contents2.= $paper_erqs[$i]->item_id."\t+\t".strtoupper($paper_erq->item_total_marks+1)."\t".$paper_erqs[0]->subject_code.'_G'.($paper_erqs[0]->item_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
								/***************/
								$i++;
								if($paper_erq->item_type == 'MCQ')
								{
								?>
    							<div style="padding:20px; width: 155px; float: left; border: 1px solid #000;">Q. No.<?php print $i;?> : <?php echo $paper_erq->item_option_correct;?></div>
    <?php
								}
							}
						}
					/************************/
                    $fp = fopen($file_name, 'w');
					fwrite($fp, $contents);
					fclose($fp);
					
					$fpx = fopen($file_name2, 'w');
					fwrite($fpx, $contents2);
					fclose($fpx);
					//echo $file_name.'<br />';
                    /***********************/
					?>
    <div style="clear: both;"></div>
  </div>
</div>
		</div>
	</section>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>