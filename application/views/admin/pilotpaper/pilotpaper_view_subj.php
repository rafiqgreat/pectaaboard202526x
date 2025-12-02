  <!-- Content Wrapper. Contains page content -->
 <style>
 .urdufont-right {
    font-size: 18px;
}
</style> 
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content" >
		<!--<div class="card">
		  <div class="card-header">
			<div class="d-inline-block float-right">
			  <div class="btn-group margin-bottom-20"> 
				<a href="< ?= base_url('admin/paperview/create_flimzy_pdf?grade_id='.$search_grade.'&subject_id='.$search_subject.'&cstand_id='.$search_cstand.'&subcstand_id='.$search_subcstand.'&typeofquestion_id='.$search_typeofquestion);?>" class="btn btn-secondary" style="margin:05px">Export as PDF</a>
			  </div>         
			</div>
		  </div>
		</div>-->
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); 
				/*echo '<PRE>';
				print_r($paper_erqs); 
				echo '<hr />';
				print_r($paper_groups_v1); 
				echo '<hr />';
				print_r($paper_para_v1); 
				echo '<hr />';
				die('/////////***********/////////////');*/?>
				<!---- start here is item view filmzy --->
				<!--Pilotheader-->
				<?php
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($paper_erqs_subj[0]->subject_name_en);
				//print_r($pilotheaders);
				//die();
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
					
				?>
                	<div class="container" style="padding-top:25px">
					
				<?php 
				echo '<hr />';
				?>
						<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 20px;">
							<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_erqs_subj[0]->subject_name_en;?> - GRADE <?php print $paper_erqs_subj[0]->c_grade_id-2;?></div>
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
				<div class="container" style="padding-top:25px">
					<div class="row">
						<div style="width: 100%">
							<?php
							if(!empty($paper_erqs)){
								$i = 0;
								foreach($paper_erqs as $paper_erq){
									$i++;
									if($paper_erq[0]->item_type == 'ERQ'){
										?>
										<table width="100%" style="margin-top:10px;" >   
										<?php if ($paper_erq[0]->item_image_position=='Top') 
										{
											if($paper_erq[0]->item_image_en!="" && $paper_erq[0]->item_image_ur!="") 
											{
												?>
												 <tr>
													<td style="width:50%"><img src="<?= base_url().$paper_erq[0]->item_image_en;?>" style="max-height:400px;"/></td>
													<td style="float:right; width:50%"><img src="<?= base_url().$paper_erq[0]->item_image_ur;?>" style="max-height:400px;"/></td>
												  </tr>
												<?php 
											}
											elseif($paper_erq[0]->item_image_en!=""&&$paper_erq[0]->item_image_ur=="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_erq[0]->item_image_en;?>" style="max-height:400px;" /></td>          	
												  </tr>
												<?php 	
											}
											elseif($paper_erq[0]->item_image_en==""&&$paper_erq[0]->item_image_ur!="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_erq[0]->item_image_ur;?>" style="max-height:400px;"/></td>          	
												  </tr>
												<?php 	
											}
										}
										?>
										<?php if ($paper_erq[0]->item_stem_en!=""){?>
										<tr><td colspan="2" style="font-weight:bold; font-size:14px">
                                          <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
										  <?php if ($paper_erq[0]->item_type=='MCQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$paper_erq[0]->item_id); ?> target="_blank">Question No.<?php print $i;?> </a>
                                          <?php }?>
                                          <?php if ($paper_erq[0]->item_type=='ERQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$paper_erq[0]->item_id); ?> target="_blank">Question No.<?php print $i;?> </a>
                                          <?php }?>
                                          <?php }?>:
										<?php if($paper_erq[0]->item_image_position=='Left' && $paper_erq[0]->item_image_en!="")
										{?> <img src="<?= base_url().$paper_erq[0]->item_image_en;?>" style="max-height:400px;"/> <?php }?>
										<span style="padding-left:50px"><?php echo html_entity_decode($paper_erq[0]->item_stem_en);?></span>
										<?php if($paper_erq[0]->item_image_position=='Right' && $paper_erq[0]->item_image_en!="")
										{?> <img src="<?= base_url().$paper_erq[0]->item_image_en;?>" style="max-height:400px;"/> <?php }?></td></tr>
										<?php }?>
										<?php if ($paper_erq[0]->item_stem_ur!=""){?>
										<tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">  
                                        <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
										  <?php if ($paper_erq[0]->item_type=='MCQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$paper_erq[0]->item_id); ?> target="_blank">سوال نمبر <?php print $i;?>:&nbsp;<?php print $i;?> </a>
                                          <?php }?>
                                          <?php if ($paper_erq[0]->item_type=='ERQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$paper_erq[0]->item_id); ?> target="_blank">سوال نمبر <?php print $i;?>:&nbsp; </a>
                                          <?php }?>
                                          <?php }?>:
										<?php if($paper_erq[0]->item_image_position=='Left' && $paper_erq[0]->item_image_ur!="")
										{?> <img src="<?= base_url().$paper_erq[0]->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
										<span style="padding-left:50px:"><?php echo html_entity_decode($paper_erq[0]->item_stem_ur);?> </span>
										<?php if($paper_erq[0]->item_image_position=='Right' && $paper_erq[0]->item_image_ur!="")
										{?> <img src="<?= base_url().$paper_erq[0]->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
										</td></tr>
										<?php }?>
										<?php if ($paper_erq[0]->item_image_position=='Bottom') 
										{
											if($paper_erq[0]->item_image_en!="" && $paper_erq[0]->item_image_ur!="") 
											{
												?>
												 <tr >
													<td style="width:50%"><img src="<?= base_url().$paper_erq[0]->item_image_en;?>" style="max-width:100%;"/></td>
													<td style="float:right;"><img src="<?= base_url().$paper_erq[0]->item_image_ur;?>" style="max-width:100%;"/></td>
												  </tr>
												<?php 
											}
											elseif($paper_erq[0]->item_image_en!=""&&$paper_erq[0]->item_image_ur=="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_erq[0]->item_image_en;?>" style="max-height:400px;" /></td>          	
												  </tr>
												<?php 	
											}
											elseif($paper_erq[0]->item_image_en==""&&$paper_erq[0]->item_image_ur!="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_erq[0]->item_image_ur;?>" style="max-height:400px;"/></td>          	
												  </tr>
												<?php 	
											}
										}		
										?>               
													  </table>
							<?php
									}print '<div style="page-break-before: always;"></div>';
								}
							}
							else{
								print '<div style="text-align:center">No data available</div>';
							}
						   ?>
						</div>
					</div>
					<!---- end  here is item view filmzy --->
				</div>
                <div class="container" style="padding-top:25px">
                	<?php
							
							if(!empty($paper_groups_v1s))
							{
								$g = 0;
								foreach($paper_groups_v1s as $paper_groups_v1)
								{
									$paper_groups_v1 = $paper_groups_v1[0];
					?>
                    	<table style="width:100%">
            <div class="row">
              	<?php 
				if($paper_groups_v1->group_title_en!=""){?>
                <div class="col-lg-6 col-sm-12">                         
                  <label for="group_title_en" class="col-sm-12 control-label" >Groups (<?php echo $g+1;?>)</label>
                  <div style="font-weight:bold"><?php //echo $paper_groups_v1->group_title_en; ?></div>
                </div>
                <?php }?>
                <?php if($paper_groups_v1->group_title_ur!=""){?>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="group_title_ur" class="control-label urdufont-right" style="float:right">گروپ  (<?php echo $g+1;?>) </label>
                    <div style="font-weight:bold"><?php //echo $paper_groups_v1->group_title_ur; ?></div>
                </div>
                <?php }?>
             </div>
			<?php 
			//echo '<pre>';
			//print_r($paper_groups_v1);
			//die();?>
			
			
            </table>
					   <?php
            
					if(isset($paper_groups_v1->group_item_1)&&$paper_groups_v1->group_item_1!=0)
					{ $group_item_1 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_1);
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
								<?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
                                <?php if ($group_item_1->item_type=='MCQ'){?>
                                <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_1->item_id); ?> target="_blank">Question No.1 :</a>
                                <?php }?>
                                <?php if ($group_item_1->item_type=='ERQ'){?>
                                <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_1->item_id); ?> target="_blank">Question No.1 :</a>
                                <?php }?>
                                <?php }?>
							<?php echo html_entity_decode($group_item_1->item_stem_en);?></td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_1->item_stem_ur);?></td>
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
						
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_2)&&$paper_groups_v1->group_item_2!=0)
					{ $group_item_2 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_2);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_2->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_2->item_id); ?> target="_blank">Question No.2 :</a>
							  <?php }?>
							  <?php if ($group_item_2->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_2->item_id); ?> target="_blank">Question No.2 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_2->item_stem_en);?></td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_2->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_3)&&$paper_groups_v1->group_item_3!=0)
					{$group_item_3 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_3);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_3->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_3->item_id); ?> target="_blank">Question No.3 :</a>
							  <?php }?>
							  <?php if ($group_item_3->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_3->item_id); ?> target="_blank">Question No.3 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_3->item_stem_en);?></td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_3->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_4)&&$paper_groups_v1->group_item_4!=0)
					{$group_item_4 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_4);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_4->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_4->item_id); ?> target="_blank">Question No.4 :</a>
							  <?php }?>
							  <?php if ($group_item_4->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_4->item_id); ?> target="_blank">Question No.4 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_4->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_4->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_5)&&$paper_groups_v1->group_item_5!=0)
					{$group_item_5 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_5);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_5->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_5->item_id); ?> target="_blank">Question No.5 :</a>
							  <?php }?>
							  <?php if ($group_item_5->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_5->item_id); ?> target="_blank">Question No.5 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_5->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_5->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_6)&&$paper_groups_v1->group_item_6!=0)
					{$group_item_6 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_6);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_6->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_6->item_id); ?> target="_blank">Question No.6 :</a>
							  <?php }?>
							  <?php if ($group_item_6->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_6->item_id); ?> target="_blank">Question No.6 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_6->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_6->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_7)&&$paper_groups_v1->group_item_7!=0)
					{$group_item_7 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_7);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_7->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_7->item_id); ?> target="_blank">Question No.7 :</a>
							  <?php }?>
							  <?php if ($group_item_7->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_7->item_id); ?> target="_blank">Question No.7 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_7->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_7->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_8)&&$paper_groups_v1->group_item_8!=0)
					{$group_item_8 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_8);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_8->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_8->item_id); ?> target="_blank">Question No.8 :</a>
							  <?php }?>
							  <?php if ($group_item_8->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_8->item_id); ?> target="_blank">Question No.8 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_8->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_8->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_9)&&$paper_groups_v1->group_item_9!=0)
					{$group_item_9 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_9);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_9->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_9->item_id); ?> target="_blank">Question No.9 :</a>
							  <?php }?>
							  <?php if ($group_item_9->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_9->item_id); ?> target="_blank">Question No.9 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_9->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_9->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
						
					if(isset($paper_groups_v1->group_item_10)&&$paper_groups_v1->group_item_10!=0)
					{$group_item_10 = $this->Pilotpaper_model->get_item_by_id($paper_groups_v1->group_item_10);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($group_item_10->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$group_item_10->item_id); ?> target="_blank">Question No.10 :</a>
							  <?php }?>
							  <?php if ($group_item_10->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$group_item_10->item_id); ?> target="_blank">Question No.10 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($group_item_10->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_10->item_stem_ur);?></td>
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
						?>
						</table>
						<?php  
						}
                       ?>
                    <?php 	$g++;	print '<div style="page-break-before: always;"></div>';
								}
							}
					?>
                    <?php
							if(!empty($paper_para_v1s)){
								$i = 0;
								foreach($paper_para_v1s as $paper_paras_erq){
									$i++;
					?>
                    	<table style="width:100%">
            <div class="row">
              	<?php if($paper_paras_erq[0]->para_title_en!=""){?>
                <div class="col-lg-6 col-sm-12">                         
                  <label for="para_title_en" class="col-sm-12 control-label">Paragraph Instruction</label>
                  <div style="font-weight:bold"><?php echo $paper_paras_erq[0]->para_title_en; ?></div>
                </div>
                <?php }?>
                <?php if($paper_paras_erq[0]->para_title_ur!=""){?>
				<div class="col-lg-12 col-sm-12 urdufont-right" style="text-align:right" >                         
                    <label for="para_title_ur" class="control-label" >پیرا گراف ہدایات *</label>
                    <?php echo $paper_paras_erq[0]->para_title_ur; ?>
                </div>
                <?php }?>
             </div>
			<?php 
			//$paper_para = $paper_para[$i];
			//echo '<pre>';
			//print_r($paper_para);
			//die();
			
			
			if($paper_paras_erq[0]->para_text_en!='') 
			{
				if($paper_paras_erq[0]->para_img_position=='Top'&&$paper_paras_erq[0]->para_image!="") 
				{ ?>
				<tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:100px; max-width:100px; margin: 4px;"/></td></tr>
				<?php } ?>
                 
				<tr>
                        <td colspan="2" >
						<?php if($paper_paras_erq[0]->para_img_position=='Left'&&$paper_paras_erq[0]->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:100px; float:left; margin: 4px;max-width:100px;"/> <?php }?> 
					
                        <?php if($paper_paras_erq[0]->para_img_position=='Right'&&$paper_paras_erq[0]->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:100px; float:right; margin: 4px;max-width:100px;"/> <?php }?>
                        <?php echo html_entity_decode($paper_paras_erq[0]->para_text_en);?>   
                    </tr>
                    
				<?php if($paper_paras_erq[0]->para_img_position=='Bottom'&&$paper_paras_erq[0]->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:100px;margin: 4px;max-width:100px;"/></td></tr><?php }?>
                    
				
                    
             <?php 
			} 
				
				if($paper_paras_erq[0]->para_text_ur!='') {?>
                    <?php if($paper_paras_erq[0]->para_img_position=='Top'&&$paper_paras_erq[0]->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <tr>
                        <td colspan="2" style="text-align:right;" class="urdufont-right">
						<?php if($paper_paras_erq[0]->para_img_position=='Left'&&$paper_paras_erq[0]->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:400px; float:left"/> <?php }?>
							
						<?php echo html_entity_decode($paper_paras_erq[0]->para_text_ur);?>
							
                        <?php if($paper_paras_erq[0]->para_img_position=='Right'&&$paper_paras_erq[0]->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:400px; float:right"/> <?php }?> 
                    </tr>
                    <?php if($paper_paras_erq[0]->para_img_position=='Bottom') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq[0]->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <?php }?>
            </table>
					   <?php
            
					
					if(isset($paper_paras_erq[0]->para_item_21)&&$paper_paras_erq[0]->para_item_21!=0)
					{
						$para_item_21 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_21);
						$para_item_21 = (isset($para_item_21[0])&&$para_item_21[0]!="")?$para_item_21[0]:"";
						if($para_item_21!="")
						{ 
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_21->item_image_position=='Top') 
						{
						if($para_item_21->item_image_en!="" && $para_item_21->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_21->item_image_en;?>" style="max-height:100px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_21->item_image_ur;?>" style="max-height:100px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_21->item_image_en!=""&&$para_item_21->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_21->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_21->item_image_en==""&&$para_item_21->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_21->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_21->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_21->item_id); ?> target="_blank">Question No.1 :</a>
							  <?php }?>
							  <?php if ($para_item_21->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_21->item_id); ?> target="_blank">Question No.1 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_21->item_stem_en);?></td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_21->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_21->item_image_position=='Bottom') 
						{
						if($para_item_21->item_image_en!="" && $para_item_21->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_21->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_21->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_21->item_image_en!=""&&$para_item_21->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_21->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_21->item_image_en==""&&$para_item_21->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_21->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						//echo '<PRE>';
						//print_r($para_item_21);
						//die();
						?>
						</table>
						<?php  
						}
					}
						
					
					if(isset($paper_paras_erq[0]->para_item_22)&&$paper_paras_erq[0]->para_item_22!=0)
					{
						$para_item_22 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_22);
						$para_item_22 = (isset($para_item_22[0])&&$para_item_22[0]!="")?$para_item_22[0]:"";
						if($para_item_22!="")
						{ 
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_22->item_image_position=='Top') 
						{
						if($para_item_22->item_image_en!="" && $para_item_22->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_22->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_22->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_22->item_image_en!=""&&$para_item_22->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_22->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_22->item_image_en==""&&$para_item_22->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_22->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold"> 
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_22->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_22->item_id); ?> target="_blank">Question No.2 :</a>
							  <?php }?>
							  <?php if ($para_item_22->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_22->item_id); ?> target="_blank">Question No.2 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_22->item_stem_en);?></td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_22->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_22->item_image_position=='Bottom') 
						{
						if($para_item_22->item_image_en!="" && $para_item_22->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_22->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_22->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_22->item_image_en!=""&&$para_item_22->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_22->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_22->item_image_en==""&&$para_item_22->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_22->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						
						?>
						</table>
						<?php  
						}
					}
					
					if(isset($paper_paras_erq[0]->para_item_23)&&$paper_paras_erq[0]->para_item_23!=0)
					{
						$para_item_23 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_23);
						$para_item_23 = (isset($para_item_23[0])&&$para_item_23[0]!="")?$para_item_23[0]:"";
						if($para_item_23!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_23->item_image_position=='Top') 
						{
						if($para_item_23->item_image_en!="" && $para_item_23->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_23->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_23->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_23->item_image_en!=""&&$para_item_23->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_23->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_23->item_image_en==""&&$para_item_23->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_23->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_23->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_23->item_id); ?> target="_blank">Question No.3 :</a>
							  <?php }?>
							  <?php if ($para_item_23->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_23->item_id); ?> target="_blank">Question No.3 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_23->item_stem_en);?></td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_23->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_23->item_image_position=='Bottom') 
						{
						if($para_item_23->item_image_en!="" && $para_item_23->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_23->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_23->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_23->item_image_en!=""&&$para_item_23->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_23->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_23->item_image_en==""&&$para_item_23->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_23->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					}

					if(isset($paper_paras_erq[0]->para_item_24)&&$paper_paras_erq[0]->para_item_24!=0)
					{
						$para_item_24 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_24);
						$para_item_24 = (isset($para_item_24[0])&&$para_item_24[0]!="")?$para_item_24[0]:"";
						if($para_item_24!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_24->item_image_position=='Top') 
						{
						if($para_item_24->item_image_en!="" && $para_item_24->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_24->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_24->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_24->item_image_en!=""&&$para_item_24->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_24->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_24->item_image_en==""&&$para_item_24->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_24->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_24->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_24->item_id); ?> target="_blank">Question No.4 :</a>
							  <?php }?>
							  <?php if ($para_item_24->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_24->item_id); ?> target="_blank">Question No.4 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_24->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_24->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_24->item_image_position=='Bottom') 
						{
						if($para_item_24->item_image_en!="" && $para_item_24->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_24->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_24->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_24->item_image_en!=""&&$para_item_24->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_24->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_24->item_image_en==""&&$para_item_24->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_24->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					}
							
					if(isset($paper_paras_erq[0]->para_item_25)&&$paper_paras_erq[0]->para_item_25!=0)
					{
						$para_item_25 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_25);
						$para_item_25 = (isset($para_item_25[0])&&$para_item_25[0]!="")?$para_item_25[0]:"";
						if($para_item_25!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_25->item_image_position=='Top') 
						{
						if($para_item_25->item_image_en!="" && $para_item_25->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_25->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_25->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_25->item_image_en!=""&&$para_item_25->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_25->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_25->item_image_en==""&&$para_item_25->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_25->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_25->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_25->item_id); ?> target="_blank">Question No.5 :</a>
							  <?php }?>
							  <?php if ($para_item_25->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_25->item_id); ?> target="_blank">Question No.5 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_25->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_25->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_25->item_image_position=='Bottom') 
						{
						if($para_item_25->item_image_en!="" && $para_item_25->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_25->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_25->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_25->item_image_en!=""&&$para_item_25->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_25->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_25->item_image_en==""&&$para_item_25->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_25->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					}
					
					if(isset($paper_paras_erq[0]->para_item_26)&&$paper_paras_erq[0]->para_item_26!=0)
					{
						$para_item_26 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_26);
						$para_item_26 = (isset($para_item_26[0])&&$para_item_26[0]!="")?$para_item_26[0]:"";
						if($para_item_26!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_26->item_image_position=='Top') 
						{
						if($para_item_26->item_image_en!="" && $para_item_26->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_26->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_26->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_26->item_image_en!=""&&$para_item_26->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_26->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_26->item_image_en==""&&$para_item_26->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_26->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_26->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_26->item_id); ?> target="_blank">Question No.6 :</a>
							  <?php }?>
							  <?php if ($para_item_26->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_26->item_id); ?> target="_blank">Question No.6 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_26->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_26->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_26->item_image_position=='Bottom') 
						{
						if($para_item_26->item_image_en!="" && $para_item_26->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_26->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_26->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_26->item_image_en!=""&&$para_item_26->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_26->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_26->item_image_en==""&&$para_item_26->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_26->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					}
					
					if(isset($paper_paras_erq[0]->para_item_27)&&$paper_paras_erq[0]->para_item_27!=0)
					{
						$para_item_27 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_27);
						$para_item_27 = (isset($para_item_27[0])&&$para_item_27[0]!="")?$para_item_27[0]:"";
						if($para_item_27!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_27->item_image_position=='Top') 
						{
						if($para_item_27->item_image_en!="" && $para_item_27->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_27->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_27->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_27->item_image_en!=""&&$para_item_27->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_27->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_27->item_image_en==""&&$para_item_27->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_27->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_27->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_27->item_id); ?> target="_blank">Question No.7 :</a>
							  <?php }?>
							  <?php if ($para_item_27->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_27->item_id); ?> target="_blank">Question No.7 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_27->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_27->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_27->item_image_position=='Bottom') 
						{
						if($para_item_27->item_image_en!="" && $para_item_27->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_27->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_27->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_27->item_image_en!=""&&$para_item_27->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_27->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_27->item_image_en==""&&$para_item_27->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_27->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					}
					
					if(isset($paper_paras_erq[0]->para_item_28)&&$paper_paras_erq[0]->para_item_28!=0)
					{
						$para_item_28 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_28);
						$para_item_28 = (isset($para_item_28[0])&&$para_item_28[0]!="")?$para_item_28[0]:"";
						if($para_item_28!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_28->item_image_position=='Top') 
						{
						if($para_item_28->item_image_en!="" && $para_item_28->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_28->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_28->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_28->item_image_en!=""&&$para_item_28->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_28->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_28->item_image_en==""&&$para_item_28->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_28->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_28->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_28->item_id); ?> target="_blank">Question No.8 :</a>
							  <?php }?>
							  <?php if ($para_item_28->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_28->item_id); ?> target="_blank">Question No.8 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_28->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_28->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_28->item_image_position=='Bottom') 
						{
						if($para_item_28->item_image_en!="" && $para_item_28->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_28->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_28->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_28->item_image_en!=""&&$para_item_28->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_28->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_28->item_image_en==""&&$para_item_28->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_28->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					}
					
					if(isset($paper_paras_erq[0]->para_item_29)&&$paper_paras_erq[0]->para_item_29!=0)
					{
						$para_item_29 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_29);
						$para_item_29 = (isset($para_item_29[0])&&$para_item_29[0]!="")?$para_item_29[0]:"";
						if($para_item_29!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_29->item_image_position=='Top') 
						{
						if($para_item_29->item_image_en!="" && $para_item_29->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_29->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_29->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_29->item_image_en!=""&&$para_item_29->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_29->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_29->item_image_en==""&&$para_item_29->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_29->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_29->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_29->item_id); ?> target="_blank">Question No.9 :</a>
							  <?php }?>
							  <?php if ($para_item_29->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_29->item_id); ?> target="_blank">Question No.9 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_29->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_29->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_29->item_image_position=='Bottom') 
						{
						if($para_item_29->item_image_en!="" && $para_item_29->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_29->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_29->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_29->item_image_en!=""&&$para_item_29->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_29->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_29->item_image_en==""&&$para_item_29->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_29->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					}
					
					if(isset($paper_paras_erq[0]->para_item_30)&&$paper_paras_erq[0]->para_item_30!=0)
					{
						$para_item_30 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq[0]->para_item_30);
						$para_item_30 = (isset($para_item_30[0])&&$para_item_30[0]!="")?$para_item_30[0]:"";
						if($para_item_30!="")
						{
						?>
						<table width="100%" style="margin-top:10px;" >
						  <?php if ($para_item_30->item_image_position=='Top') 
						{
						if($para_item_30->item_image_en!="" && $para_item_30->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_30->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_30->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_30->item_image_en!=""&&$para_item_30->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_30->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_30->item_image_en==""&&$para_item_30->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_30->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						  <tr>
							<td colspan="2" style="font-weight:bold">
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4){?>
							  <?php if ($para_item_30->item_type=='MCQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$para_item_30->item_id); ?> target="_blank">Question No.10 :</a>
							  <?php }?>
							  <?php if ($para_item_30->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$para_item_30->item_id); ?> target="_blank">Question No.10 :</a>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_30->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($para_item_30->item_stem_ur);?></td>
						  </tr>
						  <?php if ($para_item_30->item_image_position=='Bottom') 
						{
						if($para_item_30->item_image_en!="" && $para_item_30->item_image_ur!="") 
						{
						?>
						  <tr>
							<td><img src="<?= base_url().$para_item_30->item_image_en;?>" style="max-height:400px;"/></td>
							<td style="float:right"><img src="<?= base_url().$para_item_30->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 
						}
						elseif($para_item_30->item_image_en!=""&&$para_item_30->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$para_item_30->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($para_item_30->item_image_en==""&&$para_item_30->item_image_ur!="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center"><img src="<?= base_url().$para_item_30->item_image_ur;?>" style="max-height:400px;"/></td>
						  </tr>
						  <?php 	
						}
						}
						?>
						</table>
						<?php  
						}
					} print '<div style="page-break-before: always;"></div>';
				}
			}
					?>
                    <table width="100%" style="padding-top:100px">
                    	<tr>
                        	<td>
                            	<table cellpadding="0" cellspacing="0" width="100%">
                                	<tr><td style="border-bottom: 5px solid #F9AAAA;"></td></tr>
                                    <tr><td style="border-bottom: 2px solid #F9AAAA; padding-top:2px"></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td style="padding-top:2px; padding-left:10px">Grade-<?php print $paper_erqs_subj[0]->c_grade_id-2;?>, <?php print $paper_erqs_subj[0]->subject_name_en;?>, CRP-I</td></tr>
                    </table>
                </div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>