  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>
				<!---- start here is item view filmzy --->
				
				<?php
				$pilotheaders = $this->Paperview_model->get_pilotheader_by_suject($papersubject[0]['subject_name_en']);
				//print_r($pilotheaders);
				$pilotheaders = $pilotheaders[0];
				if(!empty($pilotheaders)){?>
					<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 20px;">
						<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $papersubject[0]['subject_name_en']?> - GRADE <?php print $gradecode[0]['grade_code'];?></div>
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
				<div class="container" style="padding-top:25px">
					<div class="row">
						<div style="width: 100%">
							<?php
							if(!empty($groups)){
								$qnoarray = ['a','b','c','d','e','f','g','h','i','j','k','l'];
								foreach($groups as $group){
									
									$qno = 0;
									for($i = 1; $i <= 10; $i++){
										//print $group->{'group_item_'.$i}.'<br>';
										if($group->{'group_item_'.$i} != 0 || $group->{'group_item_'.$i} == '' ){
											$group_item_1 = $this->Paperview_model->get_rev_items_by_id($group->{'group_item_'.$i});
											$group_item_1 = $group_item_1[0];
											?>
				 								<table width="100%" style="margin-top:25px">
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
													}	}
												?>

													<?php if ($group_item_1->item_stem_en!=""){?>

													<tr><td colspan="2" style="font-weight:bold; font-size:16px">Question (<?php print $qnoarray[$qno]; $qno++;?>):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_1->item_stem_en);?></span>

													</td></tr>

													<?php }?>

													<?php if ($group_item_1->item_stem_ur!=""){?>

													<tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_1->item_stem_ur);?> </span></td></tr>

													<?php }?>

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
												?>	
												</table>

											  <?php if($group_item_1->item_type=='MCQ'){?>

											 <table style="margin-left:50px; width:100%">
												<?php 
												if($group_item_1->item_option_layout=='1')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr>
													<td><table border="0" cellspacing="2" cellpadding="2" >
												  <tr>
													<td style="font-size:16px">(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
													<td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
												  </tr>
												</table>
												</td>
												  </tr>
												  <tr>
													<td><table border="0" cellspacing="2" cellpadding="2">
												  <tr>
													<td style="font-size:16px">(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
													<td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
												  </tr>
												</table></td>
												  </tr>
												  <tr>
													<td><table border="0" cellspacing="2" cellpadding="2">
												  <tr>
													<td style="font-size:16px">(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
													<td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
												  </tr>
												</table></td>
												  </tr>
												  <tr>
													<td><table border="0" cellspacing="2" cellpadding="2">
												  <tr>
													<td style="font-size:16px">(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
													<td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
												  </tr>
												</table></td>
												  </tr>
												</table>
												</td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='2')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td><table border="0" cellspacing="2" cellpadding="2">
											  <tr>
												<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
												<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
											  </tr>
											</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
											</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
											  <tr>
												<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
												<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
											  </tr>
											</table></td>
											  </tr>
											</table>
											</td>
												</tr>

												<?php
											}
												elseif($group_item_1->item_option_layout=='3')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
													  </tr>
													</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
													  </tr>
													</table></td>
													  </tr>
													</table>
													</td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='4')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table>
													</td>
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
													</table>
													</td>
													  </tr>

												<?php
											}
												elseif($group_item_1->item_option_layout=='5')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td>
													  </tr>
													</table>
													</td>
												</tr>

												<?php
											}
												elseif($group_item_1->item_option_layout=='6')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(b) <span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(c) <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td>
													  </tr>
													</table>
													</td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='7')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table>
													</td>
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
													</table>
													</td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='8')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td>
													  </tr>
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td>
													  </tr>
													</table>
													</td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='9')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
													  </tr>
													  <tr>
														<td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
													  </tr>
													  <tr>
														<td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
													  </tr>
													  <tr>
														<td colspan="2"> <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
													  </tr>
													  <tr>
														<td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table></td>
													  </tr>
													</table>
													</td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='10')
												{
												?>
											   <tr>
												  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
													</table>
													</td>
													<td><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='11')
												{
												?>
											   <tr>
												  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
													  </tr>
													</table></td>
													  </tr>
													</table> </td>
													<td><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
												</tr>
												<?php
											}
												elseif($group_item_1->item_option_layout=='12')
												{
												?>
											   <tr>
												  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
													  <tr>
														<td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
													  </tr>
													</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
													  </tr>
													</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
													  <tr>
														<td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
														<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
													  </tr>
													</table></td>
													  </tr>
													  <tr>
														<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
													  </tr>
													</table>
													</td>
												</tr>
												<?php
											}
												?>
											 </table>

											 <?php } ?>
											<?php
										}
						
									}
								//print '<div style="page-break-before: always;"></div>';
								}
							}else{
								print '<div style="text-align:center">No data available</div>';
							}
						   ?>
						</div>
					</div>
					<!---- end  here is item view filmzy --->
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>