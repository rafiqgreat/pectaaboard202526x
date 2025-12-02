<style>
.content-wrapper{
	font-family:Arial, Helvetica, sans-serif;
}
hr {
	margin: 3px 0;
}
.papyertype {
	font-size: 24px;
	font-weight: bold;
	text-align: center;
}
hr {
	margin: 15px 0;
	border: 1px solid #000;
	height:0px;
}
.heading {
	font-size:36px;
}
a, a:hover {
	color: #000000;
}
label {
	margin-bottom:0;
	font-size: 16px;
}
.content-block {
	page-break-inside: avoid;
}
.content-block strong {
/*font-weight: normal;*/
  }
.content-block:nth-child(odd) {
 clear: both;
}
img {
	max-width: 100%;
}
.page-columns {
	width: 100%;
	padding: 20px;
	box-sizing: border-box;
}
.columns {
	column-count: 2;
	column-gap: 20px;
	column-rule: 1px solid #000;
}
.block {
	break-inside: avoid;
	margin-bottom: 5px;
}
.dot {
	height: 15px;
	width: 15px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
}
.answerur{
	height: 25px;
	width: 25px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
	text-align:center;
	margin: 2px 10px 2px 20px;
	font-size: 20px;
	line-height: 20px;
}
.answeren{
	height: 25px;
	width: 25px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
	text-align:center;
	margin: 2px 20px 2px 10px;
	font-size: 20px;
	line-height: 20px;
}
.blockanswer{
	display:inline-block;
	font-weight:bold;
}
@media print {
a[href]:after {
	content: none !important;
}
.main-footer {
	display: none;
}
.page-columns {
/* page-break-after: always;*/
    }
	 .itemid{
		 display:none;
	 }
}
</style>
<div class="content-wrapper">
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<?php $this->load->view('admin/includes/_messages.php');?>
				<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 28px; margin-bottom:0px;">
               <div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: capitalize;">
                   Grade - <?php print $modelpaperinfo['grade_code'];?> <?php print $modelpaperinfo['subject_name_en']?> Model Paper
               </div>
            </div>
				<div class="container-fluid">
					<div class="row">
						<div style="width: 100%">
                  	<div class="page-columns" style="padding-top: 0px;">
                     	<div class="columns">
									<?php
									$flagmcq = 0;
									$flagerq = 0;
									
									if (!empty($items)) {
										 $data = $items;
										 $grouped = [];
									
										 // 🔹 Group by cs_number > Content Strand > Sub Content Strand > mpd_subcstand_id > Item Type > SLO > Bloom
										 $k = 0;
										 foreach ($data as $item) {
											  $subjects = [5,9,13,19,26,32,40,48];
											  $chapter_main = explode('.', $item->subcs_number)[0];
											  if (in_array($item->item_subject_id, $subjects)) 
											  {
													$cstand = 'Domain: <span class="urdufont-right">'.$item->cs_statement_ur.'<span>';
													$subcstand = 'Sub Domain: <span class="urdufont-right">'.$item->subcs_topic_ur.'<span>';
											  } else 
											  {
													$cstand = 'Domain: '.$item->cs_statement_en;
													$subcstand = 'Sub Domain: '.$item->subcs_topic_en;
											  }
									
											  $type  = $item->item_type;
											  $slo   = 'SLO '.$item->slo_number;
											  $bloom = $item->item_cognitive_bloom;
									
											  $grouped[$cstand][$subcstand][$item->mpd_subcstand_id][$type][$slo][$bloom][] = $item;
										 }
									
										 // 🔹 Sort by cs_number
										 ksort($grouped);
									
										 // 🔹 Loop over Content Strand (per cs_number)
											 
											  foreach ($grouped as $cstand_name => $subcstands) {
												  print '<h3 style="text-align:center"><strong>'.$cstand_name.'</strong></h3>';
													ksort($subcstands); // order subchapters also
									
													foreach ($subcstands as $subcstand_name => $subcstandGroups) {
														 print '<h3 style="text-align:center"><strong>'.$subcstand_name.'</strong></h3>';
									
														 // 🔹 Loop over subcstand groups (mpd_subcstand_id)
														 foreach ($subcstandGroups as $mpd_id => $types) {
															  $i = 0;
															  $j = 0;
															  // Force order: MCQ → ERQ
															  $ordered_types = ['MCQ','ERQ'];
									
															  // 🔹 First pass (normal order)
															  foreach ($ordered_types as $otype) {
																  if (!isset($types[$otype])) 
																  	continue;
																  if ($otype == 'MCQ') {
																		print '<div style="text-align:center; margin-bottom:15px;">
																				<span style="border:2px dotted; padding:5px 20px;">
																					 <strong>Objective Part</strong>&nbsp;<span class="urdufont-right">حصہ معروضی</span>
																				</span>
																		 </div>';
																	}
																	if ($otype == 'ERQ') {
																		print '<div style="text-align:center; margin:15px;">
																				<span style="border:2px dotted; padding:5px 20px;">
																					 <strong>Subjective Part</strong>&nbsp;<span class="urdufont-right">حصہ انشائیہ</span>
																				</span>
																		 </div>';
																	}
																	if (isset($types[$otype])) {
																		 foreach ($types[$otype] as $slo_name => $blooms) {
																			  foreach ($blooms as $bloom_name => $items) {
																					$abbr_bloom = strtoupper(substr($bloom_name, 0, 1));
																					print '
																						 <div style="display:flex; width:75%; margin:0px auto;">
																								<div style="flex:1; border:1px solid; padding:4px 6px; text-align:center;">
																									  <strong>'.$slo_name.'</strong>
																								</div>
																								<div style="flex:1; border:1px solid; padding:4px 6px; text-align:center;">
																									  <strong> Cognitive Level: '.$abbr_bloom.'</strong>
																								</div>
																						 </div>';
																					if($slostatement == 1){
																						if(in_array($item->item_subject_id, $subjects))
																						{
																							print 
																							' <div style="margin-top:5px; text-align:right;">
																								 <strong>SLO:</strong><span class="urdufont-right"> '.$item->slo_statement_ur.'</span>
																							</div>
																							';
																						}
																						else{
																							print 
																							' <div style="margin-top:5px;">
																								 <span><strong>SLO: '.$item->slo_statement_en.'</strong></span>
																							</div>
																							';
																						}
																					}
																					foreach ($items as $item) {																					 
																														 
																						//print $item->item_cognitive_bloom;
																						if($item->item_type == 'MCQ')
																						{
																							$i++;																 
																							$hide_image = '';
																							if($item->item_image_en == $item->item_image_ur )
																							{
																								$hide_image = " display:none; ";	
																							}
																						?>
																						<table class="block" width="100%" style="font-size: 18px;">
																					<?php if ($item->item_image_position=='Top') 
																						{
																							if($item->item_image_en!="" && $item->item_image_ur!="") 
																							{ ?>
																								<tr>
																									<td><img src="<?= base_url().$item->item_image_en;?>" style="max-height:150px;"/>
																									</td>
																									<td style="float:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:150px; <?php print $hide_image; ?>"/>
																									</td>
																								</tr>
																							<?php 
																							}
																							elseif($item->item_image_en!=""&&$item->item_image_ur=="")
																							{
																							?>
																						<tr>
																							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:150px;"/>
																							</td>
																						</tr>
																					<?php 	
																					}
																					elseif($item->item_image_en==""&&$item->item_image_ur!="")
																					{
																					?>
																						<tr>
																							<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:150px;"/>
																							</td>
																						</tr>
																					<?php 	
																						}
																					}
																					?>
																					<?php if ($item->item_stem_en!=""){?>
																						<tr>
																							<td colspan="2" style="font-weight:bold; font-size:18px">
																								<?php 
																								if(1==1){
																									if ($item->item_type=='MCQ'){ 
																										print 'Question No.'.$i.': ';
																									}
																								}?>
																								<?php if($item->item_image_position=='Left' && $item->item_image_en!="")
																								{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:150px;"/>
																								<?php }?>
																								<span style="padding-left:2px">
																									<?php echo html_entity_decode($item->item_stem_en);?>
																								</span><span class="itemid">(item_id: <?php print $item->item_id;?>) <a class="text-warning" title="Edit" target="_blank" href="<?php print base_url('admin/pilot_items/pilot_edit_combine/'.$item->item_id)?>"> Edit Question</a> <a title="Delete" class="delete btn btn-sm btn-danger marginfive" href="<?php print base_url('admin/paper/delete_model_paper_question/'.$modelpaperinfo['mp_id'].'/'.$item->item_id)?>" onclick="return confirm('Do you want to delete question?')"> <i class="fa fa-trash-o"></i></a></span>
																								<?php if($item->item_image_position=='Right' && $item->item_image_en!="")
																								{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:150px;"/>
																								<?php }?>
																							</td>
																						</tr>
																					<?php }?>
																					<?php if ($item->item_stem_ur!=""){?>
																						<tr>
																							<td colspan="2" style="text-align:right; font-weight:bold" >
																										
																								<?php if(1==1){?>
																									<?php if ($item->item_type=='MCQ'){?>
																											  <div class="urdufont-right">سوال نمبر <?php print $i;?>:&nbsp;
																										  <?php }?>
																								  <?php }?>
																										 
																								<?php if($item->item_image_position=='Left' && $item->item_image_ur!="")
																								{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:150px;"/>
																								<?php }?>
																								<span style="padding-right:5px;">
																									<?php echo html_entity_decode($item->item_stem_ur);?> 
																								</span>
																								<span class="itemid">(item_id: <?php print $item->item_id;?>)<a class="text-warning" title="Edit" target="_blank" href="<?php print base_url('admin/pilot_items/pilot_edit_combine/'.$item->item_id)?>"> Edit Question</a> <a title="Delete" class="delete btn btn-sm btn-danger marginfive" href="<?php print base_url('admin/paper/delete_model_paper_question/'.$modelpaperinfo['mp_id'].'/'.$item->item_id)?>" onclick="return confirm('Do you want to delete question?')"> <i class="fa fa-trash-o"></i></a></span>
																								<?php if($item->item_image_position=='Right' && $item->item_image_ur!="")
																								{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:150px;"/>
																								<?php }?>
																							</div></td>
																						</tr>
																					<?php }?>
																					<?php if ($item->item_image_position=='Bottom') 
																							{
																							if($item->item_image_en!="" && $item->item_image_ur!="") 
																							{
																						?>
																							<tr>
																								<td><img src="<?= base_url().$item->item_image_en;?>" style="max-height:150px;"/>
																								</td>
																								<td style="float:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:150px; <?php print $hide_image; ?>"/>
																								</td>
																							</tr>
																							<?php 
																							}
																							elseif($item->item_image_en!="" && $item->item_image_ur=="")
																							{
																							?>
																							<tr>
																								<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:150px;"/>
																								</td>
																							</tr>
																							<?php 	
																							}
																							elseif($item->item_image_en=="" && $item->item_image_ur!="")
																							{
																							?>
																							<tr>
																								<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:150px;"/>
																								</td>
																							</tr>
																							<?php 	
																					}
																				}
																					$hide_item_option_a_ur = '';
																					$hide_item_option_b_ur = '';
																					$hide_item_option_c_ur = '';
																					$hide_item_option_d_ur = '';
																					
																					if(strip_tags($item->item_option_a_en) == strip_tags($item->item_option_a_ur)){
																						$hide_item_option_a_ur = "display:none; ";
																					}
																					if(strip_tags($item->item_option_b_en) == strip_tags($item->item_option_b_ur)){
																						$hide_item_option_b_ur = "display:none; ";
																					}
																					
																					if(strip_tags($item->item_option_c_en) == strip_tags($item->item_option_c_ur)){
																						$hide_item_option_c_ur = "display:none; ";
																					}
																					
																					if(strip_tags($item->item_option_d_en) == strip_tags($item->item_option_d_ur)){
																						$hide_item_option_d_ur = "display:none; ";
																					}
																					
																					if($item->item_option_layout=='1')
																						{
																					?>
																					<tr>
																						<td colspan="2">
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																								<tr>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td style="font-size:16px;" >(a)
																													<span>
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td style="padding-left:2px">
																													<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
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
																												<td style="font-size:16px;">(b)
																													<span>
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td style="padding-left:2px">
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
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
																												<td style="font-size:16px;">(c)
																													<span>
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td style="padding-left:2px">
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
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
																												<td style="font-size:16px;">(d)
																													<span>
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
																												<td style="padding-left:2px">
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>text-align:right">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
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
																					} 
																					elseif ( $item->item_option_layout == '2' )
																					{
																						$subjects = [5,9,13,19,26,32,40,48];
																						?>
																						<tr>
																							<td colspan="2">
																								<table width="100%" border="0" cellspacing="0" cellpadding="0">
																									<tr>
																										<td width="50%">
																											<table border="0" cellspacing="2" cellpadding="2" width="100%">
																												<tr>
																													<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?>>(a)
																														<span>
																															<?php echo html_entity_decode($item->item_option_a_en);?>
																														</span>
																													</td>
																													<td width="40%">
																														<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?> padding-left:5px">
																															<?php echo html_entity_decode($item->item_option_a_ur);?>
																														</div>
																													</td>
																												</tr>
																											</table>
																										</td>
																										<td width="50%">
																											<table border="0" cellspacing="2" cellpadding="2" width="100%">
																												<tr>
																													<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(b)
																														<span>
																															<?php echo html_entity_decode($item->item_option_b_en);?>
																														</span>
																													</td>
																													<td width="40%">
																														<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																															<?php echo html_entity_decode($item->item_option_b_ur);?>
																														</div>
																													</td>
																												</tr>
																											</table>
																										</td>
																									</tr>
																									<tr>
																										<td width="50%">
																											<table border="0" cellspacing="2" cellpadding="2" width="100%">
																												<tr>
																													<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(c)
																														<span>
																															<?php echo html_entity_decode($item->item_option_c_en);?>
																														</span>
																													</td>
																													<td width="40%">
																														<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																															<?php echo html_entity_decode($item->item_option_c_ur);?>
																														</div>
																													</td>
																												</tr>
																											</table>
																										</td>
																										<td width="50%">
																											<table border="0" cellspacing="2" cellpadding="2" width="100%">
																												<tr>
																													<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(d)
																														<span>
																															<?php echo html_entity_decode($item->item_option_d_en);?>
																														</span>
																													</td>
																													<td width="40%">
																														<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																															<?php echo html_entity_decode($item->item_option_d_ur);?>
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
																					} 
																					elseif ( $item->item_option_layout == '3' )
																					{
																						$subjects = [5,9,13,19,26,32,40,48];
																						?>
																					<tr>
																						<td colspan="2">
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																								<tr>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> > (a)
																													<span>
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td width="40%">
																													<div class="urdufont-right col-12" style="<?php print $hide_item_option_a_ur;?> padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(b)
																													<span>
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td width="40%">
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?> padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(c)
																													<span>
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td width="40%">
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td <?php if(in_array($item->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(d)
																													<span>
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
																												<td width="40%">
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
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
																					} 
																					elseif ( $item->item_option_layout == '4' )
																					{
																						?>
																					<tr>
																						<td colspan="2">
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																								<tr>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																					<?php
																					} 
																					elseif ( $item->item_option_layout == '5' )
																					{
																						?>
																					<tr>
																						<td colspan="2">
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																								<tr>
																									<td width="50%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td width="50%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td width="50%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td width="50%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																					<?php
																					} 
																					elseif ( $item->item_option_layout == '6' )
																					{
																						?>
																					<tr>
																						<td colspan="2">
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																								<tr>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																					<?php
																					} 
																					elseif ( $item->item_option_layout == '7' )
																					{
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
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url(). $item->item_option_a_image;?>" style="max-height:150px;"/></span>
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
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url(). $item->item_option_b_image;?>" style="max-height:150px;"/></span>
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
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url(). $item->item_option_c_image;?>" style="max-height:150px;"/></span>
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
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
										
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url(). $item->item_option_d_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																					<?php
																					} 
																					elseif ( $item->item_option_layout == '8' )
																					{
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
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(b)
																													<span>
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:150px;"/></span>
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
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(d)
																													<span>
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
																													</div>
																												</td>
																												<td><span style="padding-left:5px"><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																					<?php
																					} 
																					
																					elseif ( $item->item_option_layout == '9' )
																					{
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
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
																													</div>
																												</td>
																											</tr>
																											<tr>
																												<td colspan="2"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(b)
																													<span>
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
																													</div>
																												</td>
																											</tr>
																											<tr>
																												<td colspan="2"><span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(c)
																													<span>
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
																													</div>
																												</td>
																											</tr>
																											<tr>
																												<td colspan="2"> <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td>
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(d)
																													<span>
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
																													</div>
																												</td>
																											</tr>
																											<tr>
																												<td colspan="2"><span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:150px;"/></span>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																					<?php
																					} 
																					elseif ( $item->item_option_layout == '10' )
																					{
																						?>
																					<tr>
																						<td  width="50%">
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																								<tr>
																									<td width="100%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td width="50%">(a)
																													<span>
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td width="50%">
																													<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td width="100%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td width="50%">(b)
																													<span>
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td width="50%">
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td width="100%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td width="50%">(c)
																													<span>
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td width="50%">
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td width="100%">
																										<table border="0" cellspacing="2" cellpadding="2" width="100%">
																											<tr>
																												<td width="50%">(d)
																													<span>
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
																												<td width="50%">
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																						<td width="50%"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																						</td>
																					</tr>
																					<?php
																					} 
																					elseif ( $item->item_option_layout == '11' )
																					{
																						?>
																					<tr>
																						<td width="50%">
																							<table width="100%" border="0" cellspacing="0" cellpadding="0">
																								<tr>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(a)
																													<span>
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(b)
																													<span>
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(c)
																													<span>
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																									<td width="25%">
																										<table border="0" cellspacing="2" cellpadding="2">
																											<tr>
																												<td>(d)
																													<span>
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																							</table>
																						</td>
																						<td width="50%"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																						</td>
																					</tr>
																					<?php
																					} 
																					elseif ( $item->item_option_layout == '12' )
																					{
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
																														<?php echo html_entity_decode($item->item_option_a_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_a_ur);?>
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
																														<?php echo html_entity_decode($item->item_option_b_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_b_ur);?>
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
																														<?php echo html_entity_decode($item->item_option_c_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_c_ur);?>
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
																														<?php echo html_entity_decode($item->item_option_d_en);?>
																													</span>
																												</td>
																												<td>
																													<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																														<?php echo html_entity_decode($item->item_option_d_ur);?>
																													</div>
																												</td>
																											</tr>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:150px;"/></span>
																									</td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																					<?php
																					}
																					?>
																				</table>
																					<?php 
																						}
																						if($item->item_type == 'ERQ'){
																							$j++;
																							?>
																							<table width="100%" style="font-size: 18px;margin-bottom: 5px;">
																							<?php if ($item->item_image_position=='Top') 
																							{
																								if($item->item_image_en!="" && $item->item_image_ur!="") 
																								{
																									?>
																									 <tr>
																										<td style="width:50%"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/></td>
																										<td style="float:right; width:50%"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/></td>
																									  </tr>
																									<?php 
																								}
																								elseif($item->item_image_en!=""&&$item->item_image_ur=="")
																								{
																								?>
																									 <tr>
																										<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;" /></td>          	
																									  </tr>
																									<?php 	
																								}
																								elseif($item->item_image_en==""&&$item->item_image_ur!="")
																								{
																								?>
																									 <tr>
																										<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/></td>          	
																									  </tr>
																									<?php 	
																								}
																							}
																							?>
																							<?php if ($item->item_stem_en!="")
																							{?>
																								<tr><td colspan="2" style="font-weight:bold; ">
																									Question No. <?php print $j;?>:<!--<span class="dot"></span>-->
																								<?php if($item->item_image_position=='Left' && $item->item_image_en!="")
																								{?> 
																									<img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/> 
																								<?php }?>
																								
																								<span style="padding-left:5px"><?php echo html_entity_decode($item->item_stem_en);?></span><span class="itemid">(item_id: <?php print $item->item_id;?>) <a class="text-warning" title="Edit" target="_blank" href="<?php print base_url('admin/pilot_items/pilot_edit_combine/'.$item->item_id)?>"> Edit Question</a> <a title="Delete" class="delete btn btn-sm btn-danger marginfive" href="<?php print base_url('admin/paper/delete_model_paper_question/'.$modelpaperinfo['mp_id'].'/'.$item->item_id)?>" onclick="return confirm('Do you want to delete question?')"> <i class="fa fa-trash-o"></i></a></span>
																								
																								<?php if($item->item_image_position=='Right' && $item->item_image_en!="")
																								{?> 
																									<img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/> 
																								<?php }?>
																								</td></tr>
																							<?php }?>
													
																							<?php if ($item->item_stem_ur!=""){?>
																							<tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> 
																								<div class="urdufont-right">سوال نمبر <?php print $j;?>:&nbsp;
																								<?php if($item->item_image_position=='Left' && $item->item_image_ur!="")
																								{?> 
																									<img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/> 
																								<?php }?>
																								
																								<span style="padding-right:5px;"><?php echo html_entity_decode($item->item_stem_ur);?> </span><span class="itemid">(item_id: <?php print $item->item_id;?>) <a class="text-warning" title="Edit" target="_blank" href="<?php print base_url('admin/pilot_items/pilot_edit_combine/'.$item->item_id)?>"> Edit Question</a> <a title="Delete" class="delete btn btn-sm btn-danger marginfive" href="<?php print base_url('admin/paper/delete_model_paper_question/'.$modelpaperinfo['mp_id'].'/'.$item->item_id)?>" onclick="return confirm('Do you want to delete question?')"> <i class="fa fa-trash-o"></i></a></span>
																								
																								<?php if($item->item_image_position=='Right' && $item->item_image_ur!="")
																								{?> 
																									<img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/> 
																								<?php }?>
																							</td></tr>
																							<?php }?>
																							<?php if ($item->item_image_position=='Bottom') 
																							{
																								if($item->item_image_en!="" && $item->item_image_ur!="") 
																								{
																									?>
																									 <tr >
																										<td style="width:50%"><img src="<?= base_url().$item->item_image_en;?>" style="max-width:100%;"/></td>
																										<td style="float:right;"><img src="<?= base_url().$item->item_image_ur;?>" style="max-width:100%;"/></td>
																									  </tr>
																									<?php 
																								}
																								elseif($item->item_image_en!=""&&$item->item_image_ur=="")
																								{
																								?>
																									 <tr>
																										<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;" /></td>          	
																									  </tr>
																									<?php 	
																								}
																								elseif($item->item_image_en==""&&$item->item_image_ur!="")
																								{
																								?>
																									 <tr>
																										<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/></td>          	
																									  </tr>
																									<?php 	
																								}
																							}		
																							?>               
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
																									  <span style="font-size:16px; font-weight:bold">Answer: </span>
																									  <table width="100%" ><tr><td><?php echo  html_entity_decode($item->item_rubric_english);?></td></tr></table>
																							  <?php 
																								  }
																								  elseif($item->item_rubric_urdu!=''&&$item->item_rubric_english=='')
																								  { ?>
																								  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">جواب :</div>
																								  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td></tr></table>
																							  <?php }
																								  //$item->item_rubric_urdu!=''&&$item->item_rubric_english!=''
																								  else
																								  {
																									  ?>
																									  <table style="width:100%">
																										<tr><td style="width:50%; font-size:18px">Answer: <?php echo  html_entity_decode($item->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right">جواب: <?php echo html_entity_decode($item->item_rubric_urdu);?></td></tr>
																									  </table>
																								  <?php 
																								  }
																							  }?>
																							<?php
																						}
																													
																												  
																					}
																			  }
																		 }
																	}
															  }
									
															  // 🔹 Second pass → Repeat only MCQs (at end of chapter)
															  //print $answerkey;die('=====');
															  if (isset($types['MCQ']) && $answerkey == 1) {
																	print '<div style="text-align:center; margin:15px;">
																				  <span style="border:2px dotted; padding:5px 20px;">
																						<strong>Objective Part Keys</strong>&nbsp;<span class="urdufont-right">حصہ معروضی جوابات</span>
																				  </span>
																			 </div>';
																	$i = 0;
																	foreach ($types['MCQ'] as $slo_name => $blooms) {
																		 
																		 foreach ($blooms as $bloom_name => $items) {
																			  foreach ($items as $item) {
																					$i++;
																					if (in_array($item->item_subject_id, $subjects)) { ?>
																						 <div class="blockanswer">
																							  <?php print $i.'. ';
																							  if($item->item_option_correct == 'a') print '<span class="answerur">a<span>';
																							  if($item->item_option_correct == 'b') print '<span class="answerur">b<span>';
																							  if($item->item_option_correct == 'c') print '<span class="answerur">c<span>';
																							  if($item->item_option_correct == 'd') print '<span class="answerur">d<span>'; ?>
																						 </div>
																					<?php } else { ?>
																						 <div class="blockanswer">
																							  <?php print $i.'. ';
																							  if($item->item_option_correct == 'a') print '<span class="answeren">a<span>';
																							  if($item->item_option_correct == 'b') print '<span class="answeren">b<span>';
																							  if($item->item_option_correct == 'c') print '<span class="answeren">c<span>';
																							  if($item->item_option_correct == 'd') print '<span class="answeren">d<span>'; ?>
																						 </div>
																					<?php }
																			  }
																		 }
																	}
															  }
									
														 } // end mpd_subcstand_id
													} // end subcstand
											  } // end cstand
										 
									}
									?>
								</div>
                     </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>