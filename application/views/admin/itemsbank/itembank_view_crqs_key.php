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
						if(!empty($paper_groups)){
							$headers = $this->Itemsbank_model->get_headers_by_id($paper_groups[0]->subject_id, 'ERQs');
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
                                <?php if ($group_item_1->item_type=='ERQ'){?>
                                <?php if($group_item_1->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$group_item_1->item_id); ?> target="_blank">a &#41; </a><?php }?><?php ++$g;?>
                                <?php }?>
                                
							<?php echo html_entity_decode($group_item_1->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($group_item_1->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'a  &#41;'; }			  
							  ?>  <?php echo html_entity_decode($group_item_1->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_2->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right" lang="ur" dir="rtl"><div style="direction: rtl;"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'b  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_2->item_stem_ur);?></td><?php }?> </div>
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
							<?php if($group_item_3->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'c  &#41;'; }			  
							  ?><?php echo html_entity_decode($group_item_3->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_4->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'd  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_4->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_5->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'e  &#41;'; }			  
							  ?>  <?php echo html_entity_decode($group_item_5->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_6->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'f  &#41;'; }			  
							  ?>  <?php echo html_entity_decode($group_item_6->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_7->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'g  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_7->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_8->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'h  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_8->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_9->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'i  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_9->item_stem_ur);?></td><?php }?>
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
							<?php if($group_item_10->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"><?php 							
							$arr_subjects = [5,9,13,19,26,32,40,48];
							if(in_array($paper_group->group_subject_id,$arr_subjects)) { echo 'j  &#41;'; }			  
							  ?> <?php echo html_entity_decode($group_item_10->item_stem_ur);?></td><?php }?>
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
                </div>
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>				