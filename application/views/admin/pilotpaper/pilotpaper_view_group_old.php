 <style>
 .urdufont-right {
    font-size: 18px;
}
</style> 
<div class="content-wrapper">
	<section class="content" >
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>
				<?php /*
				$sub_name = (isset($paper_groups[0]->subject_name_en)&&$paper_groups[0]->subject_name_en!="")?$paper_groups[0]->subject_name_en:"";
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($sub_name);
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
					
				?>
                	<div class="container" style="padding-top:25px">
					
				<?php 
				echo '<hr />';
				?>
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
				<?php
					
				} */?>
				</div>
                <div class="container" style="padding-top:25px">
                	<?php
							if(!empty($paper_groups)){
								$i = 0;
								$g_ctr = 0;
								$ar_value = 0;
								$ar_value = count($paper_groups);
								foreach($paper_groups as $paper_group){
									$i++;
									$max_val[] = $i;
					?>
                    
                    
                    
                    <?php
				$sub_name = (isset($paper_groups[0]->subject_name_en)&&$paper_groups[0]->subject_name_en!="")?$paper_groups[0]->subject_name_en:"";
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($sub_name);
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
					
				?>
                	<div class="container" style="padding-top:25px">
					
				<?php 
				echo '<hr />';
				?>
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
				<?php
					
				}?>
                </div>
                
                
                
                
                
                    	<table style="width:100%">
            <div class="row">
              	<?php if($paper_group->group_title_en!=""){?>
                <div class="col-lg-6 col-sm-12">                         
                  <label for="group_title_en" class="col-sm-12 control-label" >Groups (<?php echo $i;?>)</label>
                  <div style="font-weight:bold"><?php //echo $paper_group->group_title_en; ?></div>
                </div>
                <?php }?>
                <?php if($paper_group->group_title_ur!=""){?>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="group_title_ur" class="control-label urdufont-right" style="float:right">گروپ  (<?php echo $i;?>) </label>
                    <div style="font-weight:bold"><?php //echo $paper_group->group_title_ur; ?></div>
                </div>
                <?php }?>
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
						  <?php if ($group_item_1->item_image_position=='Top') 
						{
						if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_1->item_image_en!=""&&$group_item_1->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_1->item_image_en==""&&$group_item_1->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            	<?php ++$g_ctr;?>
								<?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
                                <?php if ($group_item_1->item_type=='MCQ'){?>
                                <?php if($group_item_1->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_1->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
                                <?php }?>
                                <?php if ($group_item_1->item_type=='ERQ'){?>
                                <?php if($group_item_1->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_1->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
                                <?php }?>
                                <?php }?>
							<?php echo html_entity_decode($group_item_1->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_1->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_1->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_1->item_image_position=='Bottom') 
						{
						if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_1->item_image_en!=""&&$group_item_1->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_1->item_image_en==""&&$group_item_1->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						//echo '<PRE>';
						//print_r($group_item_1);
						//die();
						if($group_item_1->item_type=='MCQ')
						{	
						if($group_item_1->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td ><table border="0" cellspacing="2" cellpadding="2" >
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_1->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_2)&&$paper_group->group_item_2!=0)
					{ $group_item_2 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_2);
						$group_item_2 = $group_item_2[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_2->item_image_position=='Top') 
						{
						if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_2->item_image_en!=""&&$group_item_2->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_2->item_image_en==""&&$group_item_2->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?> 
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_2->item_type=='MCQ'){?>
							  <?php if($group_item_2->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_2->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_2->item_type=='ERQ'){?>
							  <?php if($group_item_2->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_2->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_2->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_2->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_2->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_2->item_image_position=='Bottom') 
						{
						if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_2->item_image_en!=""&&$group_item_2->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_2->item_image_en==""&&$group_item_2->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_2->item_type=='MCQ')
						{	
						if($group_item_2->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td ><table border="0" cellspacing="2" cellpadding="2" >
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='10')
						{
						?>
						  <tr>
							<td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td width="50%"><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='11')
						{
						?>
						  <tr>
							<td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td width="50%"><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_2->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_3)&&$paper_group->group_item_3!=0)
					{$group_item_3 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_3);
						$group_item_3 = $group_item_3[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_3->item_image_position=='Top') 
						{
						if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_3->item_image_en!=""&&$group_item_3->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_3->item_image_en==""&&$group_item_3->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_3->item_type=='MCQ'){?>
							  <?php if($group_item_3->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_3->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_3->item_type=='ERQ'){?>
							  <?php if($group_item_3->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_3->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_3->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_3->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_3->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_3->item_image_position=='Bottom') 
						{
						if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_3->item_image_en!=""&&$group_item_3->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_3->item_image_en==""&&$group_item_3->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_3->item_type=='MCQ')
						{	
						if($group_item_3->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_3->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_4)&&$paper_group->group_item_4!=0)
					{$group_item_4 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_4);
						$group_item_4 = $group_item_4[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_4->item_image_position=='Top') 
						{
						if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_4->item_image_en!=""&&$group_item_4->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_4->item_image_en==""&&$group_item_4->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_4->item_type=='MCQ'){?>
							  <?php if($group_item_4->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_4->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_4->item_type=='ERQ'){?>
							  <?php if($group_item_4->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_4->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_4->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_4->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_4->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_4->item_image_position=='Bottom') 
						{
						if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_4->item_image_en!=""&&$group_item_4->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_4->item_image_en==""&&$group_item_4->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_4->item_type=='MCQ')
						{
						if($group_item_4->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_4->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_5)&&$paper_group->group_item_5!=0)
					{$group_item_5 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_5);
						$group_item_5 = $group_item_5[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_5->item_image_position=='Top') 
						{
						if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_5->item_image_en!=""&&$group_item_5->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_5->item_image_en==""&&$group_item_5->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_5->item_type=='MCQ'){?>
							  <?php if($group_item_5->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_5->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_5->item_type=='ERQ'){?>
							  <?php if($group_item_5->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_5->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_5->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_5->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_5->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_5->item_image_position=='Bottom') 
						{
						if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_5->item_image_en!=""&&$group_item_5->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_5->item_image_en==""&&$group_item_5->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_5->item_type=='MCQ')
						{
						if($group_item_5->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_5->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_6)&&$paper_group->group_item_6!=0)
					{$group_item_6 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_6);
					$group_item_6 = $group_item_6[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_6->item_image_position=='Top') 
						{
						if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_6->item_image_en!=""&&$group_item_6->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_6->item_image_en==""&&$group_item_6->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_6->item_type=='MCQ'){?>
							  <?php if($group_item_6->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_6->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_6->item_type=='ERQ'){?>
							  <?php if($group_item_6->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_6->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_6->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_6->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_6->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_6->item_image_position=='Bottom') 
						{
						if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_6->item_image_en!=""&&$group_item_6->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_6->item_image_en==""&&$group_item_6->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_6->item_type=='MCQ')
						{
						if($group_item_6->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
						
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_6->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_7)&&$paper_group->group_item_7!=0)
					{$group_item_7 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_7);
					$group_item_7 = $group_item_7[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_7->item_image_position=='Top') 
						{
						if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_7->item_image_en!=""&&$group_item_7->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_7->item_image_en==""&&$group_item_7->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_7->item_type=='MCQ'){?>
							  <?php if($group_item_7->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_7->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_7->item_type=='ERQ'){?>
							  <?php if($group_item_7->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_7->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_7->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_7->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_7->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_7->item_image_position=='Bottom') 
						{
						if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_7->item_image_en!=""&&$group_item_7->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_7->item_image_en==""&&$group_item_7->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_7->item_type=='MCQ')
						{
						if($group_item_7->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_7->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_8)&&$paper_group->group_item_8!=0)
					{$group_item_8 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_8);
					$group_item_8 = $group_item_8[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_8->item_image_position=='Top') 
						{
						if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_8->item_image_en!=""&&$group_item_8->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_8->item_image_en==""&&$group_item_8->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_8->item_type=='MCQ'){?>
							  <?php if($group_item_8->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_8->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_8->item_type=='ERQ'){?>
							  <?php if($group_item_8->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_8->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_8->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_8->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_8->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_8->item_image_position=='Bottom') 
						{
						if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_8->item_image_en!=""&&$group_item_8->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_8->item_image_en==""&&$group_item_8->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_8->item_type=='MCQ')
						{
						if($group_item_8->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
						
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_8->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_9)&&$paper_group->group_item_9!=0)
					{$group_item_9 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_9);
					$group_item_9 = $group_item_9[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_9->item_image_position=='Top') 
						{
						if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_9->item_image_en!=""&&$group_item_9->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_9->item_image_en==""&&$group_item_9->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_9->item_type=='MCQ'){?>
							  <?php if($group_item_9->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_9->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_9->item_type=='ERQ'){?>
							  <?php if($group_item_9->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_9->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_9->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_9->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_9->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_9->item_image_position=='Bottom') 
						{
						if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_9->item_image_en!=""&&$group_item_9->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_9->item_image_en==""&&$group_item_9->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_9->item_type=='MCQ')
						{
						if($group_item_9->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_9->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_10)&&$paper_group->group_item_10!=0)
					{$group_item_10 = $this->Pilotpaper_model->get_item_by_id($paper_group->group_item_10);
						$group_item_10 = $group_item_10[0];
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_10->item_image_position=='Top') 
						{
						if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_10->item_image_en!=""&&$group_item_10->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_10->item_image_en==""&&$group_item_10->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
                            <?php ++$g_ctr;?>
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_10->item_type=='MCQ'){?>
							  <?php if($group_item_10->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_10->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($group_item_10->item_type=='ERQ'){?>
							  <?php if($group_item_10->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_10->item_id); ?> target="_blank">Question No.<?php echo $g_ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_10->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_10->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php echo $g_ctr;?> : <?php echo html_entity_decode($group_item_10->item_stem_ur);?></td><?php }?>
						  </tr>
						  <?php if ($group_item_10->item_image_position=='Bottom') 
						{
						if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($group_item_10->item_image_en!=""&&$group_item_10->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_10->item_image_en==""&&$group_item_10->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						if($group_item_10->item_type=='MCQ')
						{
						if($group_item_10->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($group_item_10->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						}
						?>
						</table>
						<?php 
						}
						 print '<div style="page-break-before: always;"></div>';	
						}
					}
					?>
                    <table width="100%" style="margin-top:100px">
                    	<tr>
                        	<td>
                            	<table cellpadding="0" cellspacing="0" width="100%">
                                	<tr><td style="border-bottom: 5px solid #F9AAAA;"></td></tr>
                                    <tr><td style="border-bottom: 2px solid #F9AAAA; padding-top:2px"></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td style="padding-top:2px; padding-left:10px">Grade-<?php print $paper_groups[0]->group_grade_id-2;?>, <?php print $paper_groups[0]->subject_name_en;?>, CRP-I</td></tr>
                    </table>
                </div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>