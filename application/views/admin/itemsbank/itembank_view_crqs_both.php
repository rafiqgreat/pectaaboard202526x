  <!-- Content Wrapper. Contains page content -->
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
	a, a:hover{
	color: #000000;
}
	@media print {
    a[href]:after {
        content: none !important;
    }
}
</style> 
<div class="content-wrapper">
	<section class="content" >
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>				
				
                <div class="container" style="padding-top:25px">
                	<?php
							if(!empty($paper_groups)){
								$headers = $this->Itemsbank_model->get_headers_by_id($paper_groups[0]->subject_id, 'ERQs');
								//$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
								if(!empty($headers)){
									$headers = $headers[0];	
								?>
									<div class="container" style="padding:5px">
										<div class="row form-group" style="border:#000 solid 4px; position: relative;">
											<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">SCHOOL BASED ASSESSMENT <?php print date('Y');?></div>
											<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">GRADE <?php echo $headers['grade_code'];?> </div>
											<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold;">
												<span style="text-transform:uppercase"><?php echo $headers['subject_name_en'];?></span> PART – B (Subjective Type)
											</div>
											<?php if($headers['h_sub_title_marks'] != ''){?>
												<div class="col-lg-12 col-md-12 col-sm-12" style="font-size:18px; font-weight:bold;">
													<div class="row">
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-2" style="font-size:18px; font-weight:bold; text-align: center;">
															<?php print $headers['h_sub_title_marks'];?>
														</div>
													</div>
												</div>
											<?php }?>
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
											<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
												<div class="row">
													<div class="col-xl-4 col-lg-5 col-md-4 col-sm-4" style="font-size:18px; font-weight:bold">
														Student Name :
													</div>
													<div class="col-xl-8 col-lg-7 col-md-8 col-sm-8" style="border-bottom:#000 solid 2px">
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
												<div class="row">
													<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3" style="font-size:18px; font-weight:bold">
														Section :
													</div>
													<div class="col-xl-10 col-lg-9 col-md-9 col-sm-9" style="border-bottom:#000 solid 2px">
													</div>
												</div>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
												<div class="row">
													<div class="col-xl-4 col-lg-5 col-md-4 col-sm-4" style="font-size:18px; font-weight:bold">
														Roll Number :
													</div>
													<div class="col-xl-8 col-lg-7 col-md-8 col-sm-8" style="border-bottom:#000 solid 2px">
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
												<div class="row">
													<div class=" col-xl-2 col-lg-2 col-md-3 col-sm-2" style="font-size:18px; font-weight:bold">
														Date :
													</div>
													<div class="col-xl-10 col-lg-10 col-md-9 col-sm-10" style="border-bottom:#000 solid 2px">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 col-sm-12" style="border:#000 solid 1px"></div>
										</div>
										<?php
										if ( $headers[ 'subject_name_en' ] == 'Urdu' )
										{
										?>
										<div class="row">
											<div class="col-lg-12 col-sm-12 form-group urdufont-right" style="text-align:right">
												<?php echo $headers['h_general_instruction']?>
											</div>
										</div>
										<?php
										} else
										{
										?>
										<div class="row">
											<div class="col-lg-12 col-sm-12 form-group">
												<?php echo $headers['h_general_instruction']?>
											</div>
										</div>
										<?php
										}
										?>

										<div class="row">
											<div class="col-lg-12 col-sm-12" style="border:#000 solid 1px"></div>
										</div>

										<div class="row form-group" style="margin-top:10px; font-size:18px">
											<div class="col-lg-3 col-sm-3" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
												<?php echo $headers['h_paper_marks']?>
												<?php if($headers['h_paper_marks_ur'] != ''){?>
													<span class="urdufont-right" style="font-size: 22px;"><?php echo $headers['h_paper_marks_ur'];?></span>
												<?php }?>
											</div>

											<div class="col-lg-5 col-sm-5" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
												<?php print $headers['h_paper_type'];?>
												<?php if($headers['h_paper_type_ur'] != ''){?>
													<span class="urdufont-right" style="font-size: 22px;"><?php echo $headers['h_paper_type_ur'];?></span>
												<?php }?>
											</div>

											<div class="col-lg-4 col-sm-4" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
												<?php echo $headers['h_paper_time']?>
												<?php if($headers['h_paper_time_ur'] != ''){?>
													<span class="urdufont-right" style="font-size: 22px;"><?php echo $headers['h_paper_time_ur'];?></span>
												<?php }?>
											</div>

										</div>

										<div class="row form-group">
											<div class="col-lg-12 col-sm-12" style="font-size:18px; font-weight:bold">
												<?php echo $headers['h_paper_instruction_en']?>
											</div>
										</div>

										<div class="row form-group urdufont-right">
											<div class="col-lg-12 col-sm-12" style="font-size:18px; font-weight:bold; text-align:right">
												<?php echo $headers['h_paper_instruction_ur']?>
											</div>
										</div>
									</div>

								<?php 
								}
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
							<div class="col-lg-6 col-sm-12">                         
							  <label for="group_title_en" class="col-sm-12 control-label" >Question No:  <?php echo $i;?></label>
							  <div style="font-weight:bold"><?php //echo $paper_group->group_id; ?></div>
							</div>

							<div class="col-lg-6 col-sm-12">                         
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
					{ $group_item_1 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_1);
						$group_item_1 = $group_item_1[0];
					 	
					 	$hide_image1 = '';
						if($group_item_1->item_image_en == $group_item_1->item_image_ur )
						{
							$hide_image1 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_1->item_image_position=='Top') 
						{
						if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px; <?php print $hide_image1;?>"/></td>
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
                            	
								<?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>                               
                                <?php if ($group_item_1->item_type=='ERQ'){?>
                                <?php if($group_item_1->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_1->item_id); ?> target="_blank">a &#41; </a><?php }?><?php ++$g;?>
                                <?php }?>
                                <?php }?>
							<?php echo html_entity_decode($group_item_1->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_1->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_1->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (a </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_1->item_image_position=='Bottom') 
						{
						if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px; <?php print $hide_image1;?>"/></td>
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
					
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_2)&&$paper_group->group_item_2!=0)
					{ $group_item_2 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_2);
						$group_item_2 = $group_item_2[0];
					 $hide_image2 = '';
						if($group_item_2->item_image_en == $group_item_2->item_image_ur )
						{
							$hide_image2 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_2->item_image_position=='Top') 
						{
						if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px; <?php print $hide_image2;?>"/></td>
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
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_2->item_type=='ERQ'){?>
							  <?php if($group_item_2->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_2->item_id); ?> target="_blank">b &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_2->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_2->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_2->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (b </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  
							  <?php }?> </div>
						  </tr>
						  <?php if ($group_item_2->item_image_position=='Bottom') 
						{
						if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px; <?php print $hide_image2;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_3)&&$paper_group->group_item_3!=0)
					{$group_item_3 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_3);
						$group_item_3 = $group_item_3[0];
					 $hide_image3 = '';
						if($group_item_3->item_image_en == $group_item_3->item_image_ur )
						{
							$hide_image3 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_3->item_image_position=='Top') 
						{
						if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px; <?php print $hide_image3;?>"/></td>
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
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_3->item_type=='ERQ'){?>
							  <?php if($group_item_3->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_3->item_id); ?> target="_blank">c &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_3->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_3->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_3->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (c </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_3->item_image_position=='Bottom') 
						{
						if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px; <?php print $hide_image3;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_4)&&$paper_group->group_item_4!=0)
					{$group_item_4 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_4);
						$group_item_4 = $group_item_4[0];
					 $hide_image4 = '';
						if($group_item_4->item_image_en == $group_item_4->item_image_ur )
						{
							$hide_image4 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_4->item_image_position=='Top') 
						{
						if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px; <?php print $hide_image4;?>"/></td>
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
                            
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_4->item_type=='ERQ'){?>
							  <?php if($group_item_4->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_4->item_id); ?> target="_blank">d &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_4->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_4->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_4->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (d </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_4->item_image_position=='Bottom') 
						{
						if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px; <?php print $hide_image4;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_5)&&$paper_group->group_item_5!=0)
					{$group_item_5 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_5);
						$group_item_5 = $group_item_5[0];
					 $hide_image5 = '';
						if($group_item_5->item_image_en == $group_item_5->item_image_ur )
						{
							$hide_image5 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_5->item_image_position=='Top') 
						{
						if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px; <?php print $hide_image5;?>"/></td>
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
                            
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_5->item_type=='ERQ'){?>
							  <?php if($group_item_5->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_5->item_id); ?> target="_blank">e &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_5->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_5->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_5->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (e </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_5->item_image_position=='Bottom') 
						{
						if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px; <?php print $hide_image5;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_6)&&$paper_group->group_item_6!=0)
					{$group_item_6 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_6);
					$group_item_6 = $group_item_6[0];
					 $hide_image6 = '';
						if($group_item_6->item_image_en == $group_item_6->item_image_ur )
						{
							$hide_image6 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_6->item_image_position=='Top') 
						{
						if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px; <?php print $hide_image6; ?>"/></td>
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
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							  
							  <?php if ($group_item_6->item_type=='ERQ'){?>
							  <?php if($group_item_6->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_6->item_id); ?> target="_blank">f &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_6->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_6->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_6->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (f </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  
							  <?php }?>
						  </tr>
						  <?php if ($group_item_6->item_image_position=='Bottom') 
						{
						if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px; <?php print $hide_image6;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_7)&&$paper_group->group_item_7!=0)
					{$group_item_7 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_7);
					$group_item_7 = $group_item_7[0];
					 $hide_image7 = '';
						if($group_item_7->item_image_en == $group_item_7->item_image_ur )
						{
							$hide_image7 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_7->item_image_position=='Top') 
						{
						if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px; <?php print $hide_image7;?>"/></td>
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
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							  
							  <?php if ($group_item_7->item_type=='ERQ'){?>
							  <?php if($group_item_7->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_7->item_id); ?> target="_blank">g &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_7->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_7->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_7->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (g </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_7->item_image_position=='Bottom') 
						{
						if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px; <?php print $hide_image7;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_8)&&$paper_group->group_item_8!=0)
					{$group_item_8 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_8);
					$group_item_8 = $group_item_8[0];
					 $hide_image8 = '';
						if($group_item_8->item_image_en == $group_item_8->item_image_ur )
						{
							$hide_image8 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_8->item_image_position=='Top') 
						{
						if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px; <?php print $hide_image8; ?>"/></td>
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_8->item_type=='ERQ'){?>
							  <?php if($group_item_8->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_8->item_id); ?> target="_blank">h &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_8->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_8->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_8->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (h </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_8->item_image_position=='Bottom') 
						{
						if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px; <?php print $hide_image8;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_9)&&$paper_group->group_item_9!=0)
					{$group_item_9 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_9);
					$group_item_9 = $group_item_9[0];
					 $hide_image9 = '';
						if($group_item_9->item_image_en == $group_item_9->item_image_ur )
						{
							$hide_image9 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_9->item_image_position=='Top') 
						{
						if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px; <?php print $hide_image9;?>"/></td>
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
                            
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_9->item_type=='ERQ'){?>
							  <?php if($group_item_9->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_9->item_id); ?> target="_blank">i &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_9->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($group_item_9->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_9->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (i </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_9->item_image_position=='Bottom') 
						{
						if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px; <?php print $hide_image9;?>"/></td>
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
						</table>
						<?php  
						}
						
					if(isset($paper_group->group_item_10)&&$paper_group->group_item_10!=0)
					{$group_item_10 = $this->Itemsbank_model->get_item_by_id($paper_group->group_item_10);
						$group_item_10 = $group_item_10[0];
					 $hide_image10 = '';
						if($group_item_10->item_image_en == $group_item_10->item_image_ur )
						{
							$hide_image10 = " display:none; ";	
						}
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($group_item_10->item_image_position=='Top') 
						{
						if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px; <?php print $hide_image10;?>"/></td>
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
                           
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>							 
							  <?php if ($group_item_10->item_type=='ERQ'){?>
							  <?php if($group_item_10->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_10->item_id); ?> target="_blank">j &#41; </a><?php }?><?php ++$g;?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_10->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($group_item_10->item_stem_ur!=""){?>
							  <td colspan="2" >
							  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tbody>
									<tr>
									  <td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_10->item_stem_ur);?></td>
									  <td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (j </td>
									</tr>
								  </tbody>
								</table>
								<?php 							
							  ?>  
							  </td>
							  <?php }?>
						  </tr>
						  <?php if ($group_item_10->item_image_position=='Bottom') 
						{
						if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px; <?php print $hide_image10; ?>"/></td>
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
						</table>
						<?php 
						}
						// print '<div style="page-break-before: always;"></div>';	
						}
					}
					?>
                </div>
				<!-- /.box-body -->
			</div>
	</section>
		</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>