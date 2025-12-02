 <style>
 .urdufont-right {
    font-size: 22px;
}
	 body {
		 
		 font-size: 1.1rem;
	 }
	 .container {
		 padding-left: 0px; padding-right: 0px;;
	 }
	 a{color: #000;}
</style> 
<div class="content-wrapper">
	<section class="content" >
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>				
				
                <div class="container" style="padding-top:25px">
                    <?php
				$sub_name = (isset($paper_groups[0]->subject_name_en)&&$paper_groups[0]->subject_name_en!="")?$paper_groups[0]->subject_name_en:"";
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($sub_name);
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
					
				?>
                	<div class="container" style="padding-top:15px">
						<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 20px;">
							<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_groups[0]->subject_name_en;?> - GRADE <?php print $paper_groups[0]->group_grade_id-2;?></div>
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
															<td width="120px;">Student Name: </td>
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
				<?php
					
				}?>
                </div>
					<div style="font-size:30px; font-weight:bold; text-align:center">ANSWERS / RUBRICS</div>
                <?php
				if(!empty($paper_groups)){
					$i = 0;

					$ar_value = 0;
					$ar_value = count($paper_groups);
					foreach($paper_groups as $paper_group){
					//	//print_r($paper_group);
						//die();

						$i++;
						$max_val[] = $i;
						$g_ctr = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
						$g =0;
					?>
                
                    	<table style="width:100%">
						<div class="row">
							<div class="col-lg-6 col-sm-12" style="border-bottom: 3px dotted #000;">                         
							  <label for="group_title_en" class="col-sm-12 control-label" >Question No:  <?php echo $i;?></label>
							  <div style="font-weight:bold"><?php //echo $paper_group->group_id; ?></div>
							</div>

							<div class="col-lg-6 col-sm-12" style="border-bottom: 3px dotted #000;">                         
							   <label for="group_title_ur" class="control-label urdufont-right" style="float:right">سوال نمبر   <?php echo $i;?> </label>
								<div style="font-weight:bold"><?php //echo $paper_group->group_id; ?></div>
							</div>
						 </div>
						<?php 
						//$paper_paras_erq = $paper_paras_erq[$i];
						//echo '<pre>';
						//print_r($paper_paras_erq);
						//die();?>			

						</table>
					   <?php
            
					if(isset($paper_group->group_item_1)&&$paper_group->group_item_1!=0)
					{ $group_item_1 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_1);
						$group_item_1 = $group_item_1[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                                <?php if ($group_item_1->item_type=='ERQ'){?>
                                <?php if($group_item_1->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_1->item_id); ?> target="_blank">a &#41; </a><?php }?><?php ++$g;?>
                                <?php }?>
                                
							<?php echo html_entity_decode($group_item_1->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_1->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'a  &#41;'; }			  
							  ?>  <?php echo html_entity_decode($group_item_1->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_1->item_rubric_image!='')
						{
						  if($group_item_1->item_rubric_urdu!=''&&$group_item_1->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_1->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_1->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_1->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_1->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_1->item_rubric_urdu==''&&$group_item_1->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_1->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_1->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_1->item_rubric_english);?></td>

									<?php if($group_item_1->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_1->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_1->item_rubric_urdu!=''&&$group_item_1->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_1->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_1->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_1->item_rubric_urdu);?></div></td>
								<?php if($group_item_1->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_1->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_1->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_1->item_rubric_urdu==''&&$group_item_1->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_1->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_1->item_rubric_urdu!=''&&$group_item_1->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_1->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_1->item_rubric_urdu!=''&&$group_item_1->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_1->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_1->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}
						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_2)&&$paper_group->group_item_2!=0)
					{ $group_item_2 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_2);
						$group_item_2 = $group_item_2[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_2->item_type=='ERQ'){?>
							  <?php if($group_item_2->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_2->item_id); ?> target="_blank">b &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_2->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_2->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right" lang="ur" dir="rtl"><div style="direction: rtl;"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'b  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_2->item_stem_ur);?></td><?php }?> </div>
						  </tr>
						</table>
						<?php 
						if($group_item_2->item_rubric_image!='')
						{
						  if($group_item_2->item_rubric_urdu!=''&&$group_item_2->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_2->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_2->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_2->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_2->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_2->item_rubric_urdu==''&&$group_item_2->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_2->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_2->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_2->item_rubric_english);?></td>

									<?php if($group_item_2->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_2->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_2->item_rubric_urdu!=''&&$group_item_2->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_2->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_2->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_2->item_rubric_urdu);?></div></td>
								<?php if($group_item_2->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_2->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_2->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_2->item_rubric_urdu==''&&$group_item_2->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_2->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_2->item_rubric_urdu!=''&&$group_item_2->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_2->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_2->item_rubric_urdu!=''&&$group_item_2->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_2->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_2->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_3)&&$paper_group->group_item_3!=0)
					{$group_item_3 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_3);
						$group_item_3 = $group_item_3[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_3->item_type=='ERQ'){?>
							  <?php if($group_item_3->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_3->item_id); ?> target="_blank">c &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_3->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_3->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'c  &#41;'; }			  
							  ?><?php echo html_entity_decode($group_item_3->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_3->item_rubric_image!='')
						{
						  if($group_item_3->item_rubric_urdu!=''&&$group_item_3->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_3->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_3->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_3->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_3->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_3->item_rubric_urdu==''&&$group_item_3->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_3->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_3->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_3->item_rubric_english);?></td>

									<?php if($group_item_3->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_3->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_3->item_rubric_urdu!=''&&$group_item_3->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_3->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_3->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_3->item_rubric_urdu);?></div></td>
								<?php if($group_item_3->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_3->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_3->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_3->item_rubric_urdu==''&&$group_item_3->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_3->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_3->item_rubric_urdu!=''&&$group_item_3->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_3->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_3->item_rubric_urdu!=''&&$group_item_3->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_3->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_3->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_4)&&$paper_group->group_item_4!=0)
					{$group_item_4 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_4);
						$group_item_4 = $group_item_4[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_4->item_type=='ERQ'){?>
							  <?php if($group_item_4->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_4->item_id); ?> target="_blank">d &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_4->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_4->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'd  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_4->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_4->item_rubric_image!='')
						{
						  if($group_item_4->item_rubric_urdu!=''&&$group_item_4->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_4->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_4->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_4->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_4->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_4->item_rubric_urdu==''&&$group_item_4->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_4->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_4->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_4->item_rubric_english);?></td>

									<?php if($group_item_4->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_4->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_4->item_rubric_urdu!=''&&$group_item_4->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_4->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_4->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_4->item_rubric_urdu);?></div></td>
								<?php if($group_item_4->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_4->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_4->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_4->item_rubric_urdu==''&&$group_item_4->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_4->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_4->item_rubric_urdu!=''&&$group_item_4->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_4->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_4->item_rubric_urdu!=''&&$group_item_4->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_4->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_4->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_5)&&$paper_group->group_item_5!=0)
					{$group_item_5 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_5);
						$group_item_5 = $group_item_5[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_5->item_type=='ERQ'){?>
							  <?php if($group_item_5->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_5->item_id); ?> target="_blank">e &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_5->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_5->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'e  &#41;'; }			  
							  ?>  <?php echo html_entity_decode($group_item_5->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_5->item_rubric_image!='')
						{
						  if($group_item_5->item_rubric_urdu!=''&&$group_item_5->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_5->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_5->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_5->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_5->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_5->item_rubric_urdu==''&&$group_item_5->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_5->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_5->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_5->item_rubric_english);?></td>

									<?php if($group_item_5->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_5->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_5->item_rubric_urdu!=''&&$group_item_5->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_5->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_5->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_5->item_rubric_urdu);?></div></td>
								<?php if($group_item_5->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_5->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_5->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_5->item_rubric_urdu==''&&$group_item_5->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_5->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_5->item_rubric_urdu!=''&&$group_item_5->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_5->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_5->item_rubric_urdu!=''&&$group_item_5->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_5->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_5->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_6)&&$paper_group->group_item_6!=0)
					{$group_item_6 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_6);
					$group_item_6 = $group_item_6[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							  
							  <?php if ($group_item_6->item_type=='ERQ'){?>
							  <?php if($group_item_6->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_6->item_id); ?> target="_blank">f &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_6->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_6->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'f  &#41;'; }			  
							  ?>  <?php echo html_entity_decode($group_item_6->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_6->item_rubric_image!='')
						{
						  if($group_item_6->item_rubric_urdu!=''&&$group_item_6->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_6->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_6->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_6->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_6->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_6->item_rubric_urdu==''&&$group_item_6->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_6->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_6->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_6->item_rubric_english);?></td>

									<?php if($group_item_6->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_6->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_6->item_rubric_urdu!=''&&$group_item_6->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_6->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_6->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_6->item_rubric_urdu);?></div></td>
								<?php if($group_item_6->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_6->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_6->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_6->item_rubric_urdu==''&&$group_item_6->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_6->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_6->item_rubric_urdu!=''&&$group_item_6->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_6->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_6->item_rubric_urdu!=''&&$group_item_6->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_6->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_6->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_7)&&$paper_group->group_item_7!=0)
					{$group_item_7 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_7);
					$group_item_7 = $group_item_7[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							  
							  <?php if ($group_item_7->item_type=='ERQ'){?>
							  <?php if($group_item_7->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_7->item_id); ?> target="_blank">g &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_7->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_7->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'g  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_7->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_7->item_rubric_image!='')
						{
						  if($group_item_7->item_rubric_urdu!=''&&$group_item_7->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_7->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_7->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_7->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_7->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_7->item_rubric_urdu==''&&$group_item_7->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_7->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_7->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_7->item_rubric_english);?></td>

									<?php if($group_item_7->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_7->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_7->item_rubric_urdu!=''&&$group_item_7->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_7->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_7->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_7->item_rubric_urdu);?></div></td>
								<?php if($group_item_7->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_7->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_7->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_7->item_rubric_urdu==''&&$group_item_7->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_7->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_7->item_rubric_urdu!=''&&$group_item_7->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_7->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_7->item_rubric_urdu!=''&&$group_item_7->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_7->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_7->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_8)&&$paper_group->group_item_8!=0)
					{$group_item_8 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_8);
					$group_item_8 = $group_item_8[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_8->item_type=='ERQ'){?>
							  <?php if($group_item_8->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_8->item_id); ?> target="_blank">h &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_8->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_8->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'h  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_8->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_8->item_rubric_image!='')
						{
						  if($group_item_8->item_rubric_urdu!=''&&$group_item_8->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_8->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_8->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_8->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_8->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_8->item_rubric_urdu==''&&$group_item_8->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_8->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_8->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_8->item_rubric_english);?></td>

									<?php if($group_item_8->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_8->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_8->item_rubric_urdu!=''&&$group_item_8->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_8->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_8->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_8->item_rubric_urdu);?></div></td>
								<?php if($group_item_8->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_8->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_8->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_8->item_rubric_urdu==''&&$group_item_8->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_8->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_8->item_rubric_urdu!=''&&$group_item_8->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_8->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_8->item_rubric_urdu!=''&&$group_item_8->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_8->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_8->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_9)&&$paper_group->group_item_9!=0)
					{$group_item_9 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_9);
					$group_item_9 = $group_item_9[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_9->item_type=='ERQ'){?>
							  <?php if($group_item_9->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_9->item_id); ?> target="_blank">i &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_9->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_9->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'i  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_9->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_9->item_rubric_image!='')
						{
						  if($group_item_9->item_rubric_urdu!=''&&$group_item_9->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_9->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_9->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_9->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_9->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_9->item_rubric_urdu==''&&$group_item_9->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_9->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_9->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_9->item_rubric_english);?></td>

									<?php if($group_item_9->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_9->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_9->item_rubric_urdu!=''&&$group_item_9->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_9->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_9->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_9->item_rubric_urdu);?></div></td>
								<?php if($group_item_9->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_9->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_9->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_9->item_rubric_urdu==''&&$group_item_9->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_9->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_9->item_rubric_urdu!=''&&$group_item_9->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_9->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_9->item_rubric_urdu!=''&&$group_item_9->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_9->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_9->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php  
						}
						
					if(isset($paper_group->group_item_10)&&$paper_group->group_item_10!=0)
					{$group_item_10 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_10);
						$group_item_10 = $group_item_10[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <tr>
							<td colspan="2" style="font-weight:bold">
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_10->item_type=='ERQ'){?>
							  <?php if($group_item_10->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_10->item_id); ?> target="_blank">j &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_10->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_10->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'j  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_10->item_stem_ur);?></td><?php }?>
						  </tr>
						</table>
						<?php 
						if($group_item_10->item_rubric_image!='')
						{
						  if($group_item_10->item_rubric_urdu!=''&&$group_item_10->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($group_item_10->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr><td style="width:50%"><?php echo html_entity_decode($group_item_10->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_10->item_rubric_urdu);?></td></td></tr>
								<?php if($group_item_10->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }

						  elseif($group_item_10->item_rubric_urdu==''&&$group_item_10->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($group_item_10->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>

								<tr>
									<?php if($group_item_10->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>

									<td><?php echo html_entity_decode($group_item_10->item_rubric_english);?></td>

									<?php if($group_item_10->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>

								<?php if($group_item_10->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						<?php }

						  elseif($group_item_10->item_rubric_urdu!=''&&$group_item_10->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($group_item_10->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($group_item_10->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_10->item_rubric_urdu);?></div></td>
								<?php if($group_item_10->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($group_item_10->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
						<?php }

						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$group_item_10->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
						<?php }
						}
						else
						{
						  if($group_item_10->item_rubric_urdu==''&&$group_item_10->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($group_item_10->item_rubric_english);?></td></tr></table>
						<?php 
						  }
						  elseif($group_item_10->item_rubric_urdu!=''&&$group_item_10->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($group_item_10->item_rubric_urdu);?></div></td></tr></table>
						<?php }
						  //$group_item_10->item_rubric_urdu!=''&&$group_item_10->item_rubric_english!=''
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($group_item_10->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_10->item_rubric_urdu);?></td></tr>
							  </table>
						  <?php 
						  }
						}

						?>
						<?php 
						}
						 print '<div style="page-break-before: always;"></div>';	
						}
					}
					?>
                </div>
				<!-- /.box-body -->
                <div style="padding:0px; margin:0px auto">
  <div style="width: 471px; border: 3px solid #000; font-size: 20px; font-family: Times New Roman;">
    <?php 
		$crp_v = $this->uri->segment(5);
		$crp_s = $this->uri->segment(4);
		$file_name = 'Control_Files_Group_CRQs/'.$paper_groups[0]->subject_name_en.'_G'.($paper_groups[0]->group_grade_id-2).'_P1_ID'.$paper_groups[0]->group_subject_id.'.txt';
		$file_name2 = 'Control_Files_Group_CRQs_IDs/'.$paper_groups[0]->subject_name_en.'_G'.($paper_groups[0]->group_grade_id-2).'_P1_ID'.$paper_groups[0]->group_subject_id.'.txt';
		$contents = "";
		$contents2 = "";
		$nctr = 1;
		$nctrx = '';
		if(!empty($paper_groups))
		{
			$i = 0;
			//die('////////////////////********************-----------------------------');
			foreach($paper_groups as $paper_group)
			{
				if($paper_group->group_item_1!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_1);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_2!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_2);
					if($erq_data)
					{
						$erq_data = $erq_data[0];
						$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
						$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					}
					$nctrx++;
				}
				if($paper_group->group_item_3!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_3);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_4!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_4);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_5!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_5);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_6!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_6);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_7!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_7);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_8!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_8);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_9!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_9);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_group->group_item_10!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_paper_group_erqs($paper_group->group_item_10);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t".$paper_groups[0]->subject_code.'_G'.($paper_groups[0]->group_grade_id-2).$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				
				$i++;
			}
		}
		$fp = fopen($file_name, 'w');
		fwrite($fp, $contents);
		fclose($fp);
		
		$fpx = fopen($file_name2, 'w');
		fwrite($fpx, $contents2);
		fclose($fpx);
	?>
    <div style="clear: both;"></div>
  </div>
</div>
			</div>
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>				