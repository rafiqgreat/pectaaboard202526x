<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Flimzy List</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style type="text/css">
		@import url(//fonts.googleapis.com/earlyaccess/notonastaliqurdu.css); 
	  
	   @font-face {
		font-family:"Jameel Noori Nastaleeq";
		src:url("<?= base_url()?>assets/fonts/Jameel Noori Nastaleeq.ttf");
		font-weight: bold;
		}

		.urdufont-right{
		font-family: 'Jameel Noori Nastaleeq' ,'Open Sans', sans-serif;
		direction: rtl;
		font-size:14px;
		}
		.urdufont-center{
		font-family: 'Noto Nastaliq Urdu', serif; 
		direction: rtl;
		text-align:center;
		}
		.nori_font {
		font-family: 'Jameel Noori Nastaleeq' ,'Open Sans', sans-serif;
		}
	</style>
</head>

<body>
	<?php
	$i = 0;
	foreach($all_items as $item):
		$iwinfo  = $this->Items_model->get_iwinfo_by_id($item['item_submittedby']);
		$ssinfo  = $this->Items_model->get_ssinfo_by_id($item['item_approvedby']);
		$aeinfo  = $this->Items_model->get_aeinfo_by_id($item['item_reviewedby']);
		$psyinfo = $this->Items_model->get_psyinfo_by_id($item['item_commentby_psy']);
			
		$iwinfo  = (isset($iwinfo[0]))?$iwinfo[0]:"";
		$ssinfo  = (isset($ssinfo[0]))?$ssinfo[0]:"";	   
		$aeinfo  = (isset($aeinfo[0]))?$aeinfo[0]:"";
		$psyinfo = (isset($psyinfo[0]))?$psyinfo[0]:"";	
			
		$ss 	= $this->Items_model->get_ssinfo_by_id($item['item_approvedby']);
		$ae 	= $this->Items_model->get_aeinfo_by_id($item['item_reviewedby']);
		$psy 	= $this->Items_model->get_psyinfo_by_id($item['item_commentby_psy']);
		
		if(isset($item['item_rev_revid'])&&$item['item_rev_revid']!=0)
			$irinfo = $this->Items_model->get_irinfo_by_id($item['item_rev_revid']);
		if(isset($item['item_rev_ss_id'])&&$item['item_rev_ss_id']!=0)
			$rev_ss = $this->Items_model->get_rev_ssinfo_by_id($item['item_rev_ss_id']);
		if(isset($item['item_rev_ae_id'])&&$item['item_rev_ae_id']!=0)	
			$rev_ae = $this->Items_model->get_rev_aeinfo_by_id($item['item_rev_ae_id']);
		if(isset($item['item_rev_psy_id'])&&$item['item_rev_psy_id']!=0)	
			$rev_psy = $this->Items_model->get_rev_psyinfo_by_id($item['item_rev_psy_id']);	

		$ss  	= (isset($ss[0]))?$ss[0]:"";
		$ae  	= (isset($ae[0]))?$ae[0]:"";	   
		$psy  	= (isset($psy[0]))?$psy[0]:"";
		$irinfo = (isset($irinfo[0]))?$irinfo[0]:"";
		$rev_ss = (isset($rev_ss[0]))?$rev_ss[0]:"";
		$rev_ae = (isset($rev_ae[0]))?$rev_ae[0]:"";
		$rev_psy = (isset($rev_psy[0]))?$rev_psy[0]:"";

			$i++;?>
	
			<table>
				<tbody>
					<tr>
						<td width="65%">
							<table>
								<tbody>
									<tr>
										<td>
											<img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" width="80" height="90" />
										</td>
										<td align="center">
											<div class="col-12" style="font-size:20px; font-weight:bold;">
												PUNJAB EXAMINATION COMMISSION [PEC]
											</div>
											<div class="col-12" style="font-size:16px;">
												Wahdat Colony Road, Lahore
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2" height="10px">
										</td>
									</tr>
									<tr>
										<td colspan="2" style="line-height: 20px; font-weight: bold; font-size: 12px;">
											<div style="padding-left:40px; padding-top:10px; font-size: 12px;">
												<div style="font-weight:bold"> Date Received :_________________<u><?php print $item['item_date_received'];?></u>_________________ </div>
												<div style="font-weight:bold"> Item Writer Name :_____<u><?php print $iwinfo['firstname'].' '.$iwinfo['lastname'].' ('.$iwinfo['username'].')';?></u>____</div>
												<div style="font-weight:bold"> Registration No. : _________________<u>PEC-<?php print $item['item_submittedby'];?></u>_________________</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>					
						</td>
						<td width="35%">
							<table border="1" bordercolor="#000000" style="font-weight:bold; font-size:11px;border-collapse: collapse;" cellpadding="7px">
								<tr>
									<td colspan="3" style="text-align:center">For official Use Only</td>
								</tr>
								<tr>
									<td colspan="3">Item Code:&emsp; <?php print $item['item_code']?></td>
								</tr>
								<tr>
									<td colspan="3" style="text-align:center">Item Statistics:</td>
								</tr>
								<tr>
									<td style="text-align:center" width="33%">Difficulty</td>
									<td style="text-align:center" width="33%">Disc</td>
									<td style="text-align:center">DIF</td>
								</tr>
								<tr>
									<td style="text-align:center"><?php print $item['item_difficulty'];?></td>
									<td style="text-align:center"><?php print $item['item_discr'];?></td>
									<td style="text-align:center"><?php print $item['item_dif_code'];?></td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			
			<table border="1" bordercolor="#000000" width="100%" style="margin-top:15px; text-align:center; font-weight:bold; font-size:10px;border-collapse: collapse;">
				<tr style="font-weight:bold">
					<td rowspan="2" colspan="3">Subject</td>
					<td rowspan="2">Grade</td>
					<td colspan="3">PCTB Textbook</td>
					<td colspan="4">Other Source</td>
				</tr>
				<tr style="font-weight:bold">
					<td colspan="2">Chapter</td>
					<td>Page</td>
					<td>Title</td>
					<td>Year</td>
					<td colspan="2">Page</td>
				</tr>
				<tr>
					<td colspan="3"><?php echo $item['subject_name_en'];?></td>
					<td><?php echo $item['grade_name_en'];?></td>
					<td colspan="2"><?php echo $item['item_pctb_chapter'];?></td>
					<td><?php echo $item['item_pctb_page'];?></td>
					<td><?php echo $item['item_other_title'];?></td>
					<td><?php echo $item['item_other_year']	;?></td>
					<td colspan="2"><?php echo $item['item_other_page'];?></td>
				</tr>
				<tr>
					<td colspan="3">
						<?php 	
						if($item['item_curriculum']=='1'){echo '2006(ALP)';}
						elseif($item['item_curriculum']=='2'){echo 'National Curriculum (2006)';}
						else{ echo 'Single National Curriculum(SNC) 2020';}
						?>
					</td>
					<td>SLO # <?php echo $item['slo_number'];?></td>
					<td rowspan="2" colspan="7">SLO text: <?php echo $item['slo_statement_en'];?><span class="urdufont-right" style="font-size:20px;" ><?php echo $item['slo_statement_ur'];?></span></td>
				</tr>
				<tr>
					<td colspan="3">Content Strand:</td>
					<td><?php echo $item['cs_statement_en'].' '.$item['cs_statement_ur'];?></td>
				</tr>
				<tr>
					<td colspan="6"><?php echo $item['item_cognitive_bloom'];?><br />(Please tick one)</td>
					<td colspan="2">Relation to Textbook<br />(Please tick one)</td>
					<td rowspan="2">Key</td>
					<td colspan="2">Type of<br />Question</td>
				</tr>
				<tr>
					<td>K</td>
					<td>C</td>
					<td>App</td>
					<td>An</td>
					<td>Sy</td>
					<td>Ey</td>
					<td>Direct Quote</td>
					<td>Amended</td>
					<td>MCQs</td>
					<td>ERQ</td>
				</tr>
				<tr>
					<td><?php if ($item['item_cognitive_bloom'] == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
					<td><?php if ($item['item_cognitive_bloom'] == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
					<td><?php if ($item['item_cognitive_bloom'] == 'Application') {echo 'Yes';}else{echo '---';}?></td>
					<td><?php if ($item['item_cognitive_bloom'] == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
					<td><?php if ($item['item_cognitive_bloom'] == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
					<td><?php if ($item['item_cognitive_bloom'] == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td>
					<td><?php if ($item['item_relation']=='Direct Quote') {echo 'Yes';}else{echo '---';}?></td>
					<td><?php if ($item['item_relation']=='Amended'){echo 'Yes';} else{echo '---';}?></td>
					<td><?php echo $item['item_option_correct'];?></td>
					<td><?php if ($item['item_type']=='MCQ'){echo 'Yes';} else{echo '---';}?></td>
					<td><?php if ($item['item_type']=='ERQ'){echo 'Yes';} else{echo '---';}?></td>
				</tr>
			  </table>
			
			<div style="padding-top:02px; padding-left:5px">

			<?php
			if ( isset( $item[ 'item_id' ] ) && $item[ 'item_id' ] != 0 ) {
				?>
			<table width="100%" style="margin-top:10px;">
				<?php if ($item['item_image_position']=='Top') 
		{
			if($item['item_image_en']!="" && $item['item_image_ur']!="") 
			{
				?>
				<tr>
					<td><img src="<?= base_url().$item['item_image_en'];?>" style="max-height:400px;"/>
					</td>
					<td style="float:right"><img src="<?= base_url().$item['item_image_ur'];?>" style="max-height:400px;"/>
					</td>
				</tr>
				<?php 
			}
			elseif($item['item_image_en']!=""&&$item['item_image_ur']=="")
			{
			?>
				<tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item['item_image_en'];?>" style="max-height:400px;"/>
					</td>
				</tr>
				<?php 	
			}
			elseif($item['item_image_en']==""&&$item['item_image_ur']!="")
			{
			?>
				<tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$item['item_image_ur'];?>" style="max-height:400px;"/>
					</td>
				</tr>
				<?php 	
			}
		}
				
		if ($item['item_stem_en']!=""){?>
		<tr>
			<td colspan="2" style="font-weight:bold; font-size:14px">Question :
				<?php if($item['item_image_position']=='Left' && $item['item_image_en']!="")
					{?> <img src="<?= base_url().$item['item_image_en'];?>" style="max-height:400px;"/>
				<?php }?>
				<span style="padding-left:50px">
					<?php echo html_entity_decode($item['item_stem_en']);?>
				</span>
				<?php if($item['item_image_position']=='Right' && $item['item_image_en']!="")
					{?> <img src="<?= base_url().$item['item_image_en'];?>" style="max-height:400px;"/>
				<?php }?>
			</td>
		</tr>
		<?php }?>

		<?php if ($item['item_stem_ur']!=""){?>
		<tr>
			<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">
				<?php if($item['item_image_position']=='Left' && $item['item_image_ur']!="")
                        {?> <img src="<?= base_url().$item['item_image_ur'];?>" style="max-height:400px;"/>
				<?php }?>
				<div><span style="margin-left:15px">سوال :</span>
					<?php echo html_entity_decode($item['item_stem_ur']);?>
				</div>
				<?php if($item['item_image_position']=='Right' && $item['item_image_ur']!="")
                        {?> <img src="<?= base_url().$item['item_image_ur'];?>" style="max-height:400px;"/>
				<?php }?>
			</td>
		</tr>
		<?php 
		}?>

		<?php if ($item['item_image_position']=='Bottom') 
		{
			if($item['item_image_en']!="" && $item['item_image_ur']!="") 
			{
				?>
				<tr>
					<td><img src="<?= base_url().$item['item_image_en'];?>" style="max-height:400px;"/>
					</td>
					<td style="float:right"><img src="<?= base_url().$item['item_image_ur'];?>" style="max-height:400px;"/>
					</td>
				</tr>
				<?php 
			}
			elseif($item['item_image_en']!=""&&$item['item_image_ur']=="")
			{
			?>
				<tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item['item_image_en'];?>" style="max-height:400px;"/>
					</td>
				</tr>
				<?php 	
			}
			elseif($item['item_image_en']==""&&$item['item_image_ur']!="")
			{
			?>
				<tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$item['item_image_ur'];?>" style="max-height:400px;"/>
					</td>
				</tr>
				<?php 	
			}
		}
		
		if($item['item_type']=='ERQ'){
			
			if ( $item['item_rubric_image'] != '' ) {
				if ( $item['item_rubric_urdu'] != '' && $item['item_rubric_english'] != '' ) {
					?>
					<table width="100%">
						<?php if($item['item_rubric_image_position']=='Top'){?>
						<tr>
							<td colspan="3" style="text-align:center"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
							</td>
						</tr>
						<?php }?>
						<tr>
							<td style="width:50%" style="font-weight:bold; font-size:14px; text-align: left;">
								<div><?php echo html_entity_decode($item['item_rubric_english']);?></div>
							</td>
							<td class="urdufont-right" style="text-align:right;">
								<div><?php echo html_entity_decode($item['item_rubric_urdu']);?></div>
							</td>
						</tr>
						<?php if($item['item_rubric_image_position']=='Bottom'){?>
						<tr>
							<td colspan="3" style="text-align:center"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
							</td>
						</tr>
						<?php }?>
					</table>
					<?php
				} elseif ( $item['item_rubric_urdu'] == '' && $item['item_rubric_english'] != '' ) {
					?>
						<span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>
						<table width="100%">
							<?php if($item['item_rubric_image_position']=='Top'){?>
							<tr>
								<td colspan="3" style="text-align:center"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
							</tr>
							<?php }?>

							<tr>
								<?php if($item['item_rubric_image_position']=='Left'){?>
								<td width="50%"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
								<?php }?>

								<td style="font-weight:bold; font-size:14px">
									<?php echo html_entity_decode($item['item_rubric_english']);?>
								</td>

								<?php if($item['item_rubric_image_position']=='Right'){?>
								<td width="50%"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
								<?php }?>
							</tr>

							<?php if($item['item_rubric_image_position']=='Bottom'){?>
							<tr>
								<td colspan="3" style="text-align:center"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
							</tr>
							<?php }?>
						</table>
					<?php
				}

				elseif ( $item['item_rubric_urdu'] != '' && $item['item_rubric_english'] == '' ) {
					?>
						<div style="font-size:14px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						<table width="100%">
							<?php if($item['item_rubric_image_position']=='Top'){?>
							<tr>
								<td colspan="3" style="text-align:center"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
							</tr>
							<?php }?>
							<tr>
								<?php if($item['item_rubric_image_position']=='Left'){?>
								<td width="50%"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
								<?php }?>
								<td style="text-align:right">
									<div class="urdufont-right">
										<?php echo html_entity_decode($item['item_rubric_urdu']);?>
									</div>
								</td>
								<?php if($item['item_rubric_image_position']=='Right'){?>
								<td width="50%"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
								<?php }?>
							</tr>
							<?php if($item['item_rubric_image_position']=='Bottom'){?>
							<tr>
								<td colspan="3" style="text-align:center"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
								</td>
							</tr>
							<?php }?>
						</table>
					<?php
				}

				else {
					?>
					<table width="100%">
						<tr>
							<td style="text-align:center"><img src="<?= base_url().$item['item_rubric_image'];?>" style="max-width:100%;"/>
							</td>
						</tr>
					</table>
					<?php
				}
			} 
			else {
				if ( $item['item_rubric_urdu'] == '' && $item['item_rubric_english'] != '' ) {
					?>
					<span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>
					<table width="100%">
						<tr>
							<td>
								<?php echo  html_entity_decode($item['item_rubric_english']);?>
							</td>
						</tr>
					</table>
					<?php
				} 
				elseif ( $item['item_rubric_urdu'] != '' && $item['item_rubric_english'] == '' ) {
						?>
						<div style="font-size:14px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						<table width="100%">
							<tr>
								<td style="text-align:right">
									<div class="urdufont-right">
										<?php echo html_entity_decode($item['item_rubric_urdu']);?>
									</div>
								</td>
							</tr>
						</table>
						<?php
					}
					//$item['item_rubric_urdu!=''&&$item['item_rubric_english!=''
				else {
					?>
					<table style="width:100%" dir="rtl">
						<tr>							
							<td class="urdufont-right" style="text-align:right">
								<div><?php echo html_entity_decode($item['item_rubric_urdu']);?></div>
							</td>
							<td style="width:50%; font-size:14px; text-align: left;">
								<div><?php echo  html_entity_decode($item['item_rubric_english']);?></div>
							</td>
						</tr>
					</table>
					<?php
				}
			}
		}else{

			if($item['item_option_layout']=='1')
			{
				?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td style="font-size:14px">(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td style="padding-left:50px">
											<div class="urdufont-right">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td style="font-size:14px">(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td style="padding-left:50px">
											<div class="urdufont-right">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td style="font-size:14px">(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td style="padding-left:50px">
											<div class="urdufont-right">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td style="font-size:14px">(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td style="padding-left:50px">
											<div class="urdufont-right" style="text-align:right">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '2' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '3' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="0" cellpadding="1">
									<tr>
										<td style="font-size: 11px;">(a)
											<span style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="0" cellpadding="1">
									<tr>
										<td style="font-size: 11px;">(b)
											<span style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="0" cellpadding="1">
									<tr>
										<td style="font-size: 11px;">(c)
											<span style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="0" cellpadding="1">
									<tr>
										<td style="font-size: 11px;">(d)
											<span style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="font-size: 11px;">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '4' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a) <span><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b) <span><img src="<?= base_url().$item['item_option_b_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c) <span><img src="<?= base_url().$item['item_option_c_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d) <span><img src="<?= base_url().$item['item_option_d_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '5' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a) <span><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b) <span><img src="<?= base_url().$item['item_option_b_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c) <span><img src="<?= base_url().$item['item_option_c_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d) <span><img src="<?= base_url().$item['item_option_d_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>

						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '6' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a) <span><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b) <span><img src="<?= base_url().$item['item_option_b_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c) <span><img src="<?= base_url().$item['item_option_c_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d) <span><img src="<?= base_url().$item['item_option_d_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '7' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item['item_option_a_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item['item_option_b_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item['item_option_c_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item['item_option_d_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item['item_option_layout'] == '8' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item['item_option_b_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item['item_option_c_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item['item_option_d_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '9' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2"><span><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2"><span><img src="<?= base_url().$item['item_option_b_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2"> <span><img src="<?= base_url().$item['item_option_c_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="2"><span><img src="<?= base_url().$item['item_option_d_image'];?>" style="max-height:400px;"/></span>
										</td>
									</tr>

								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '10' ) {
					?>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td><span><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '11' ) {
					?>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td><span><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
				</td>
			</tr>

			<?php
			} elseif ( $item[ 'item_option_layout' ] == '12' ) {
					?>
			<tr>
				<td colspan="2">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(a)
											<span>
												<?php echo html_entity_decode($item['item_option_a_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_a_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(b)
											<span>
												<?php echo html_entity_decode($item['item_option_b_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_b_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(c)
											<span>
												<?php echo html_entity_decode($item['item_option_c_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_c_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table border="0" cellspacing="2" cellpadding="2">
									<tr>
										<td>(d)
											<span>
												<?php echo html_entity_decode($item['item_option_d_en']);?>
											</span>
										</td>
										<td>
											<div class="urdufont-right" style="padding-left:20px">
												<?php echo html_entity_decode($item['item_option_d_ur']);?>
											</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item['item_option_a_image'];?>" style="max-height:400px;"/></span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</table>
	<?php  
		   }
		   ?>
</div>
	
			<table width="100%" border="1" bordercolor="#000000" style="font-size:11px;border-collapse: collapse; text-align: center; margin-top: 5px;" cellpadding="7px">
				<tbody>
				<tr>
					<td style="font-weight:bold; width:25%">Name</td>
					<td style="font-weight:bold; width:40%">Comment</td>
					<td style="font-weight:bold; width:13%">Status</td>
					<td style="font-weight:bold; width:22%">Date</td>
				</tr>
				<?php if(isset($item['item_comment_ss']) && $item['item_comment_ss']!=""){?>
				<tr>
					<td>
						<?php echo (isset($ss['username'])&&$ss['username']!="")?$ss['username']:"";?>(SS)</td>
					<td>
						<?php echo $item['item_comment_ss']; ?>
					</td>
					<td>
						<?php if($item['item_status_ss']==1){echo "Rejected";}elseif($item['item_status_ss']==2){echo "Changed & Accepted";} elseif($item['item_status_ss']==3){echo "Accepted";}?>
					</td>
					<td>
						<?php echo date("d-M-Y (h:i a)",strtotime($item['item_approved']));?>
					</td>
				</tr>
				<?php }?>
				<?php if(isset($item['item_comment_ae']) && $item['item_comment_ae']!=""){?>
				<tr>
					<td>
						<?php echo (isset($ae['username'])&&$ae['username']!="")?$ae['username']:"";?>(AE)</td>
					<td>
						<?php echo $item['item_comment_ae']; ?>
					</td>
					<td>
						<?php if($item['item_status_ae']==1){echo "Accepted";}elseif($item['item_status_ae']==2){echo "Rejected";}?>
					</td>
					<td>
						<?php echo date("d-M-Y (h:i a)",strtotime($item['item_reviewed']));?>
					</td>
				</tr>
				<?php }?>
				<?php if(isset($item['item_commentby_psy']) && $item['item_commentby_psy'] != "" && $item['item_commentby_psy'] != 0){?>
				<tr>
					<td>
						<?php echo (isset($psy['username'])&&$psy['username']!="")?$psy['username']:"";?>(PSY)</td>
					<td>
						<?php echo $item['item_comment_psy'].''; ?>
					</td>
					<td>
						<?php if($item['item_status_psy']==1){echo "Accepted";}elseif($item['item_status_psy']==2){echo "Rejected";} ?>
					</td>
					<td>
						<?php echo date("d-M-Y (h:i a)",strtotime($item['item_date_psy']));?>
					</td>
				</tr>
				<?php }?>
				<?php if(isset($item['item_rev_comment']) && $item['item_rev_comment']!=""){?>
				<tr>
					<td>
						<?php echo (isset($irinfo['username'])&&$irinfo['username']!="")?$irinfo['username']:"";?>(IR)</td>
					<td>
						<?php echo $item['item_rev_comment']; ?>
					</td>
					<td>
						<?php if($item['item_rev_status']==0){echo "Pending";}elseif($item['item_rev_status']==1){echo "Under Review";}elseif($item['item_rev_status']==2){echo "Accepted";}?>
					</td>
					<td>
						<?php echo date("d-M-Y (h:i a)",strtotime($item['item_rev_date_acc']));?>
					</td>
				</tr>
				<?php }?>
				<?php if(isset($item['item_rev_ss_comment']) && $item['item_rev_ss_comment']!=""){?>
				<tr>
					<td>
						<?php echo (isset($rev_ss['username'])&&$rev_ss['username']!="")?$rev_ss['username']:"";?>(SS)</td>
					<td>
						<?php echo $item['item_rev_ss_comment']; ?>
					</td>
					<td>
						<?php if($item['item_rev_ss_status']==0){echo "Pending";}elseif($item['item_rev_ss_status']==1){echo "Under Review";}elseif($item['item_rev_ss_status']==2){echo "Accepted";}?>
					</td>
					<td>
						<?php echo date("d-M-Y (h:i a)",strtotime($item['item_rev_ss_date_acc']));?>
					</td>
				</tr>
				<?php }?>
				<?php if(isset($item['item_rev_ae_comment']) && $item['item_rev_ae_comment']!=""){?>
					<tr>
						<td>
						<?php echo (isset($rev_ae['username'])&&$rev_ae['username']!="")?$rev_ae['username']:"";?>(AE)
						</td>
						<td>
							<?php echo $item['item_rev_ae_comment']; ?>
						</td>
						<td>
							<?php if($item['item_rev_ae_status']==2){echo "Accepted";}elseif($item['item_rev_ae_status']==1){echo "Under Review";}elseif($item['item_rev_ae_status']==0){echo "Pending";}elseif($item['item_rev_ae_status']==3){echo "Rejected";}elseif($item['item_rev_ae_status']==4){echo "Re-Submitted";}?>
						</td>
						<td>
							<?php echo date("d-M-Y (h:i a)",strtotime($item['item_rev_ae_date_acc']));?>
						</td>
					</tr>
                <?php }?>
					<?php if(isset($item['item_rev_psy_comment']) && $item['item_rev_psy_comment']!=""){?>
					  <tr>
						<td><?php echo (isset($rev_psy['username'])&&$rev_psy['username']!="")?$rev_psy['username']:"";?>(PSM)</td>
						<td><?php echo $item['item_rev_psy_comment']; ?></td>
						<td><?php if($item['item_rev_psy_status']==2){echo "Submitted";}elseif($item['item_rev_psy_status']==1){echo "Under Review";}elseif($item['item_rev_psy_status']==0){echo "Pending";}?></td>
						<td><?php echo date("d-M-Y (h:i a)",strtotime($item['item_rev_psy_date_acc']));?></td>
					  </tr>
					  <?php }?>
				</tbody>
			</table>

			<div style="page-break-before: always;"></div>
		<?php
		
			/*if($i == 20)
		break;*/
	endforeach;
	?>
</body>
</html>

<?php

	 /*$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
	 $fontDirs = $defaultConfig['fontDir'];

	 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
	 $fontData = $defaultFontConfig['fontdata'];
	 $mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
	 'fontDir' => array_merge($fontDirs, [ base_url('admin\assets\fonts')]),
	'fontdata' => $fontData + [
		'urdufont' => [
			'R' => 'NotoNastaliqUrdu-Regular.ttf',
			'I' => 'NotoNastaliqUrdu-Regular.ttf',
		]
	],
	'default_font' => 'verdana']);
	$mpdf->autoScriptToLang = true;
	$mpdf->autoLangToFont = true;
	$mpdf->SetAuthor("PEC IT TEAM");
	$mpdf->SetTitle("Flimzy List");
	$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
	$filename = 'Flimzy_list';
	ob_clean();

	$mpdf->WriteHTML($html);
	$mpdf->Output($filename . '.pdf', 'D');
	exit();	*/
?>