  <!-- Content Wrapper. Contains page content -->

<style>
a, a:hover{
	color: #000000;
}
@page {
  size: A4;
  margin-bottom: 17mm;
}
.printfooter {
	position: fixed;
	bottom: 0;
}
.printfooter1 {
	position: fixed;
	bottom: 0;
}
.printfooter2 {
	position: fixed;
	bottom: 0;
}
.printfooter3 {
	position: fixed;
	bottom: 0;
}
.printfooter4 {
	position: fixed;
	bottom: 0;
}
.printfooter5 {
	position: fixed;
	bottom: 0;
}
.printfooter6 {
	position: fixed;
	bottom: 0;
}
.printfooter7 {
	position: fixed;
	bottom: 0;
}
.printfooter8 {
	position: fixed;
	bottom: 0;
}
.printfooter9 {
	position: fixed;
	bottom: 0;
}
.printfooter10  {
	position: fixed;
	bottom: 0;
}
  .content-block {
    page-break-inside: avoid;
  }

</style>
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php');
				//echo '<PRE>';
				//print_r($paper_mcqs); 
				//die();?>
				<!---- start here is item view filmzy --->
				<!--Pilotheader-->
				<?php
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($paper_mcqs[0]->subject_name_en);
				//print_r($pilotheaders);
				//die();
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
					
				?>
                	<div class="container" style="padding:25px">
						<div class="row form-group">
							<div class="col-lg-12 col-md-12 col-sm-12">
							<table border="0" cellpadding="2" cellspacing="2" width="100%">
								<tbody>
									<tr>
										<td width="50%">
											Serial No. _____________________
										</td>
										<td width="50%" align="right">
											<?php $crp_v = $this->uri->segment(4);
												$crp_v_arry = explode('_',$crp_v);
											?>
											<div style="border: 2px solid #000000; font-size: 18px; font-weight: bold; min-width: 200px; display: inline-block;padding: 5px; text-align:center; margin-right:10px;">CRP-<?php print $crp_v_arry[1];?></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 30px;">
						<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_mcqs[0]->subject_name_en;?> - GRADE <?php print $paper_mcqs[0]->item_grade_id-2; ?></div>
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
														<td width="110px;"><div class="urdufont-right" style="padding-left:20px; font-size: 18px;"><span dir="RTL">طالب علم کا نام</span>&nbsp;</div>Student Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;
														</td>
													</tr>
												</tbody>
											</table>
										</td>
										<td width="50%" align="center">
											Curriculum Reform Performa<br>
											<div style="border: 2px solid #000000; font-size: 18px; font-weight: bold; min-width: 200px; display: inline-block;padding: 5px;"><?php print $paper_mcqs[0]->subject_name_en;?></div>
										</td>
									</tr>
								</tbody>
							</table>
							<table border="0" cellpadding="2" cellspacing="2" width="100%">
								<tbody>
									<tr>
										<td width="50%">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="110px;"><div class="urdufont-right" style="padding-left:20px; font-size: 18px;"><span dir="RTL">سکول کا نام</span>&nbsp;</div>School Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;
														</td>
													</tr>
												</tbody>
											</table>
										</td>
										<td width="50%">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="50px;"><div class="urdufont-right" style="padding-left:3px; font-size: 18px;"><span dir="RTL">تاریخ</span>&nbsp;</div>Date: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;
														</td>
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
					<div class="row">
						<div class="col-lg-12 col-sm-12 form-group">
							<?php echo $paper_hearders['ph_general_instruction']?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12" style="border-bottom:#000 solid 1px"></div>
					</div>
				<?php 
				echo '<hr />';
				}?>
				</div>
				<div class="container" style="margin-top:25px; clear:both;">
					<div class="row">
						<div style="width: 100%">
							<?php
							if(!empty($paper_mcqs)){
								$i = 0;
								$pagebreak = 4;
								$pagebreakcount = 1;
								$totalrecords = count($paper_mcqs);
								foreach($paper_mcqs as $paper_mcq){
									$i++;
									if($paper_mcq->item_type == 'MCQ'){
										
								?>
								<table class="content-block" width="100%" style="margin-top:10px;">
								<?php if ($paper_mcq->item_image_position=='Top') 
									{
										if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
										{
											?>
												<tr>
													<td><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/>
													</td>
													<td style="float:right"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/>
													</td>
												</tr>
												<?php 
										}
										elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
										{
										?>
								<tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
								}
								elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
								{
								?>
								<tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
					}
?>
								<?php if ($paper_mcq->item_stem_en!=""){?>
								<tr>
									<td colspan="2" style="font-weight:bold; font-size:16px">
                                    <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
											<?php if ($paper_mcq->item_type=='MCQ'){?>
                                            <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$paper_mcq->item_id); ?> target="_blank">Question No.<?php print $i;?> :</a>
                                            <?php }?>
                                            <?php }?>
										<?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_en!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/>
										<?php }?>
										<span style="padding-left:50px">
											<?php echo html_entity_decode($paper_mcq->item_stem_en);?>
										</span>
										<?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_en!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/>
										<?php }?>
									</td>
								</tr>
								<?php }?>
								<?php if ($paper_mcq->item_stem_ur!=""){?>
								<tr>
									<td colspan="2" style="text-align:right; font-weight:bold" >
                                    
                                    <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
											<?php if ($paper_mcq->item_type=='MCQ'){?>
                                            <div class="urdufont-right"><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$paper_mcq->item_id); ?> target="_blank">سوال نمبر <?php print $i;?>:&nbsp;</a>
                                            <?php }?>
                                            <?php }?>
                                     
										<?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_ur!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/>
										<?php }?>
										<span style="padding-left:50px:">
											<?php echo html_entity_decode($paper_mcq->item_stem_ur);?> </span>
										<?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_ur!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/>
										<?php }?>
									</div></td>
								</tr>
								<?php }?>
								<?php if ($paper_mcq->item_image_position=='Bottom') 
					{
						if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
						{
							?>
								<tr>
									<td><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/>
									</td>
									<td style="float:right"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 
						}
						elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
						elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
					}
								$hide_item_option_a_ur = '';
								$hide_item_option_b_ur = '';
								$hide_item_option_c_ur = '';
								$hide_item_option_d_ur = '';
								
								if(strip_tags($paper_mcq->item_option_a_en) == strip_tags($paper_mcq->item_option_a_ur)){
									$hide_item_option_a_ur = "display:none; ";
								}
								if(strip_tags($paper_mcq->item_option_b_en) == strip_tags($paper_mcq->item_option_b_ur)){
									$hide_item_option_b_ur = "display:none; ";
								}
								
								if(strip_tags($paper_mcq->item_option_c_en) == strip_tags($paper_mcq->item_option_c_ur)){
									$hide_item_option_c_ur = "display:none; ";
								}
								
								if(strip_tags($paper_mcq->item_option_d_en) == strip_tags($paper_mcq->item_option_d_ur)){
									$hide_item_option_d_ur = "display:none; ";
								}
								
    							if($paper_mcq->item_option_layout=='1')
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
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td style="padding-left:50px">
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
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
															<td style="font-size:16px">(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td style="padding-left:50px">
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
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
															<td style="font-size:16px">(c)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td style="padding-left:50px">
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
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
															<td style="font-size:16px">(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td style="padding-left:50px">
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>text-align:right">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
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
								elseif ( $paper_mcq->item_option_layout == '2' )
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
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> >(a)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?> padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> >(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
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
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> >(c)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> >(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
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
								elseif ( $paper_mcq->item_option_layout == '3' )
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
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> > (a)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right col-12" style="<?php print $hide_item_option_a_ur;?> padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="25%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> >(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?> padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="25%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> >(c)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="25%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="50%" <?php } ?> >(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
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
								elseif ( $paper_mcq->item_option_layout == '4' )
								{
									?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(a) <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:400px;"/></span>
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
								elseif ( $paper_mcq->item_option_layout == '5' )
								{
									?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(a) <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:400px;"/></span>
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
								elseif ( $paper_mcq->item_option_layout == '6' )
								{
									?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(a) <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:400px;"/></span>
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
								elseif ( $paper_mcq->item_option_layout == '7' )
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
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $paper_mcq->item_option_b_image;?>" style="max-height:400px;"/></span>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $paper_mcq->item_option_c_image;?>" style="max-height:400px;"/></span>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $paper_mcq->item_option_d_image;?>" style="max-height:400px;"/></span>
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
								elseif ( $paper_mcq->item_option_layout == '8' )
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
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:400px;"/></span>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:400px;"/></span>
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
								elseif ( $paper_mcq->item_option_layout == '9' )
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
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"> <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:400px;"/></span>
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
								elseif ( $paper_mcq->item_option_layout == '10' )
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
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td width="50%">
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td width="50%"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
									</td>
								</tr>
								<?php
								} 
								elseif ( $paper_mcq->item_option_layout == '11' )
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
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td width="50%"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
									</td>
								</tr>
								<?php
								} 
								elseif ( $paper_mcq->item_option_layout == '12' )
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
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
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
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:20px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:400px;"/></span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<?php
								}
								if($totalrecords == $i){?>
									<!--<table class="printfooter<?php print $pagebreakcount; $pagebreakcount++;?>" width="100%">
										<tr>
											<td>
												<table cellpadding="0" cellspacing="0" width="100%">
													<tr><td style="border-bottom: 5px solid #F9AAAA;"></td></tr>
													<tr><td style="border-bottom: 2px solid #F9AAAA; padding-top:2px"></td></tr>
												</table>
											</td>
										</tr>
										<tr>
											<td style="padding-top:2px; padding-left:10px">Grade-<?php print $paper_mcqs[0]->item_grade_id-2;?>, <?php print $paper_mcqs[0]->subject_name_en;?>, CRP-<?php print $crp_v_arry[1];?>
											</td>
										</tr>
									</table>
									<div style="page-break-before: always;"></div>-->
								<?php
								}
								if($pagebreak%7 == 0){?>
									
									<!--<div style="page-break-before: always;"></div>-->
								<?php
								}
								$pagebreak++;
								?>
							</table>
								<?php 
									}
									/*if($paper_mcq->item_type == 'ERQ'){
										?>
										<table width="100%" style="margin-top:10px;" >   
										<?php if ($paper_mcq->item_image_position=='Top') 
										{
											if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
											{
												?>
												 <tr>
													<td style="width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/></td>
													<td style="float:right; width:50%"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>
												  </tr>
												<?php 
											}
											elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;" /></td>          	
												  </tr>
												<?php 	
											}
											elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>          	
												  </tr>
												<?php 	
											}
										}
										?>
										<?php if ($paper_mcq->item_stem_en!=""){?>
										<tr><td colspan="2" style="font-weight:bold; font-size:16px">Question No.<?php print $i;?> :
										<?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_en!="")
										{?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/> <?php }?>
										<span style="padding-left:50px"><?php echo html_entity_decode($paper_mcq->item_stem_en);?></span>
										<?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_en!="")
										{?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/> <?php }?></td></tr>
										<?php }?>
										<?php if ($paper_mcq->item_stem_ur!=""){?>
										<tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">  سوال نمبر <?php print $i;?>:&nbsp; 
										<?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_ur!="")
										{?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
										<span style="padding-left:50px:"><?php echo html_entity_decode($paper_mcq->item_stem_ur);?> </span>
										<?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_ur!="")
										{?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
										</td></tr>
										<?php }?>
										<?php if ($paper_mcq->item_image_position=='Bottom') 
										{
											if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
											{
												?>
												 <tr >
													<td style="width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-width:100%;"/></td>
													<td style="float:right;"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-width:100%;"/></td>
												  </tr>
												<?php 
											}
											elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;" /></td>          	
												  </tr>
												<?php 	
											}
											elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>          	
												  </tr>
												<?php 	
											}
										}		
										?>               
													  </table>
							<?php
									}*/
								}
							}else{
								print '<div style="text-align:center">No data available</div>';
							}
						   ?>
						</div>
					</div>
					<!---- end  here is item view filmzy --->
				</div>
                <div class="container" style="margin-top:165px;padding-bottom:550px; clear:both; height: 100%;">
                	<?php
					$ctr = $i;
					
							if(!empty($paper_paras)){
								$i = 0;
								foreach($paper_paras as $paper_para){
									$i++;
					?>
                <div class="row col-12">  
					
            <div class="row col-12" >
              	<?php if($paper_para->para_title_en!=""){?>
                <div class="col-lg-12 col-sm-12">                         
                  <div style="font-weight:bold">Paragraph Instruction</div>
                  <div style="font-weight:bold"><?php echo $paper_para->para_title_en; ?></div>
                </div>
                <?php }?>
                <?php if($paper_para->para_title_ur!=""){?>
				<div class="col-lg-12 col-sm-12 urdufont-right" style="text-align:right" >                         
                    <div >پیرا گراف ہدایات *</div>
                    <?php echo $paper_para->para_title_ur; ?>
                </div>
                <?php }?>
             </div>
			 <div class="row" >		
<table style="width:100%">					
			<?php 
			//$paper_para = $paper_para[$i];
			//echo '<pre>';
			//print_r($paper_para);
			//die();			
			
			if($paper_para->para_text_en!='') 
			{
				if($paper_para->para_img_position=='Top'&&$paper_para->para_image!="") 
				{ ?>
				<tr><td style="text-align:center"><img src="<?= base_url().$paper_para->para_image;?>" style="max-height:100px; max-width:100px; margin: 4px;"/></td></tr>
				<?php } ?>
                 
				<tr>
                        <td colspan="2" >
						<?php if($paper_para->para_img_position=='Left'&&$paper_para->para_image!='') {?> <img src="<?= base_url().$paper_para->para_image;?>" style="max-height:100px; float:left; margin: 4px;max-width:100px;"/> <?php }?> 
					
                        <?php if($paper_para->para_img_position=='Right'&&$paper_para->para_image!='') {?> <img src="<?= base_url().$paper_para->para_image;?>" style="max-height:100px; float:right; margin: 4px;max-width:100px;"/> <?php }?>
                        <?php echo html_entity_decode($paper_para->para_text_en);?>   
                    </tr>
                    
				<?php if($paper_para->para_img_position=='Bottom'&&$paper_para->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_para->para_image;?>" style="max-height:100px;margin: 4px;max-width:100px;"/></td></tr><?php }?>
                    
				
                    
             <?php 
			} 
				
				if($paper_para->para_text_ur!='') {?>
                    <?php if($paper_para->para_img_position=='Top'&&$paper_para->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_para->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <tr>
                        <td colspan="2" style="text-align:right;" class="urdufont-right">
						<?php if($paper_para->para_img_position=='Left'&&$paper_para->para_image!='') {?> <img src="<?= base_url().$paper_para->para_image;?>" style="max-height:400px; float:left"/> <?php }?>
							
						<?php echo html_entity_decode($paper_para->para_text_ur);?>
							
                        <?php if($paper_para->para_img_position=='Right'&&$paper_para->para_image!='') {?> <img src="<?= base_url().$paper_para->para_image;?>" style="max-height:400px; float:right"/> <?php }?> 
                    </tr>
                    <?php if($paper_para->para_img_position=='Bottom') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_para->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <?php }?>
            </table>
					   <?php
            
					
					if(isset($paper_para->para_item_21)&&$paper_para->para_item_21!=0)
					{
						$para_item_21 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_21);
						$para_item_21 = (isset($para_item_21[0])&&$para_item_21[0]!="")?$para_item_21[0]:"";
						if($para_item_21!="")
						{ 
						?>
						<table class="content-block" width="100%" style="margin-top:10px;" >
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
							  
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_21->item_type=='MCQ'){?>
							  <?php if($para_item_21->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_21->item_id); ?> target="_blank">Question No. <?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_21->item_type=='ERQ'){?>
							  <?php if($para_item_21->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_21->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_21->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($para_item_21->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_21->item_stem_ur);?></td><?php }?>
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
						if($para_item_21->item_type=='MCQ')
						{	
						if($para_item_21->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td ><table border="0" cellspacing="2" cellpadding="2" >
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_21->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
						
					
					if(isset($paper_para->para_item_22)&&$paper_para->para_item_22!=0)
					{
						$para_item_22 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_22);
						$para_item_22 = (isset($para_item_22[0])&&$para_item_22[0]!="")?$para_item_22[0]:"";
						if($para_item_22!="")
						{ 
						?>
						<table class="content-block" width="100%" style="margin-top:10px;" >
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_22->item_type=='MCQ'){?>
							  <?php if($para_item_22->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_22->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_22->item_type=='ERQ'){?>
							  <?php if($para_item_22->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_22->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_22->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($para_item_22->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_22->item_stem_ur);?></td><?php }?>
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
						if($para_item_22->item_type=='MCQ')
						{	
						if($para_item_22->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td ><table border="0" cellspacing="2" cellpadding="2" >
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_22->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
					
					if(isset($paper_para->para_item_23)&&$paper_para->para_item_23!=0)
					{
						$para_item_23 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_23);
						$para_item_23 = (isset($para_item_23[0])&&$para_item_23[0]!="")?$para_item_23[0]:"";
						if($para_item_23!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:10px;" >
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_23->item_type=='MCQ'){?>
							  <?php if($para_item_23->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_23->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_23->item_type=='ERQ'){?>
							  <?php if($para_item_23->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_23->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_23->item_stem_en);?></td>
						  </tr>
						  <tr>
							<?php if($para_item_23->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_23->item_stem_ur);?></td><?php }?>
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
						if($para_item_23->item_type=='MCQ')
						{	
						if($para_item_23->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_23->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}

					if(isset($paper_para->para_item_24)&&$paper_para->para_item_24!=0)
					{
						$para_item_24 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_24);
						$para_item_24 = (isset($para_item_24[0])&&$para_item_24[0]!="")?$para_item_24[0]:"";
						if($para_item_24!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:10px;" >
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_24->item_type=='MCQ'){?>
							  <?php if($para_item_24->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_24->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_24->item_type=='ERQ'){?>
							  <?php if($para_item_24->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_24->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_24->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($para_item_24->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_24->item_stem_ur);?></td><?php }?>
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
						if($para_item_24->item_type=='MCQ')
						{
						if($para_item_24->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_24->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
							
					if(isset($paper_para->para_item_25)&&$paper_para->para_item_25!=0)
					{
						$para_item_25 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_25);
						$para_item_25 = (isset($para_item_25[0])&&$para_item_25[0]!="")?$para_item_25[0]:"";
						if($para_item_25!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:10px;" >
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_25->item_type=='MCQ'){?>
							  <?php if($para_item_25->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_25->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_25->item_type=='ERQ'){?>
							  <?php if($para_item_25->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_25->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_25->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($para_item_25->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_25->item_stem_ur);?></td><?php }?>
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
						if($para_item_25->item_type=='MCQ')
						{
						if($para_item_25->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_25->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
					
					if(isset($paper_para->para_item_26)&&$paper_para->para_item_26!=0)
					{
						$para_item_26 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_26);
						$para_item_26 = (isset($para_item_26[0])&&$para_item_26[0]!="")?$para_item_26[0]:"";
						if($para_item_26!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:10px;" >
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_26->item_type=='MCQ'){?>
							  <?php if($para_item_26->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_26->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_26->item_type=='ERQ'){?>
							  <?php if($para_item_26->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_26->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_26->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($para_item_26->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_26->item_stem_ur);?></td><?php }?>
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
						if($para_item_26->item_type=='MCQ')
						{
						if($para_item_26->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
						
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_26->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
					
					if(isset($paper_para->para_item_27)&&$paper_para->para_item_27!=0)
					{
						$para_item_27 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_27);
						$para_item_27 = (isset($para_item_27[0])&&$para_item_27[0]!="")?$para_item_27[0]:"";
						if($para_item_27!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:10px;" >
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_27->item_type=='MCQ'){?>
							  <?php if($para_item_27->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_27->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_27->item_type=='ERQ'){?>
							  <?php if($para_item_27->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_27->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_27->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($para_item_27->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_27->item_stem_ur);?></td><?php }?>
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
						if($para_item_27->item_type=='MCQ')
						{
						if($para_item_27->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_27->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
					
					if(isset($paper_para->para_item_28)&&$paper_para->para_item_28!=0)
					{
						$para_item_28 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_28);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_28->item_type=='MCQ'){?>
							  <?php if($para_item_28->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_28->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_28->item_type=='ERQ'){?>
							  <?php if($para_item_28->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_28->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?>:</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_28->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($para_item_28->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_28->item_stem_ur);?></td><?php }?>						  </tr>
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
						if($para_item_28->item_type=='MCQ')
						{
						if($para_item_28->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
						
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_28->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
					
					if(isset($paper_para->para_item_29)&&$paper_para->para_item_29!=0)
					{
						$para_item_29 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_29);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_29->item_type=='MCQ'){?>
							   <?php if($para_item_29->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_29->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_29->item_type=='ERQ'){?>
							   <?php if($para_item_29->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_29->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_29->item_stem_en);?>
							  </td>
						  </tr>
						  <tr>
							<?php if($para_item_29->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_29->item_stem_ur);?></td><?php }?>
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
						if($para_item_29->item_type=='MCQ')
						{
						if($para_item_29->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_29->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
					
					if(isset($paper_para->para_item_30)&&$paper_para->para_item_30!=0)
					{
						$para_item_30 = $this->Pilotpaper_model->get_item_by_id($paper_para->para_item_30);
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
							  <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')== 1){?>
							  <?php if ($para_item_30->item_type=='MCQ'){?>
							  <?php if($para_item_30->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_30->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php if ($para_item_30->item_type=='ERQ'){?>
							  <?php if($para_item_30->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_30->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
							  <?php }?>
							  <?php }?><?php echo html_entity_decode($para_item_30->item_stem_en);?>
							 </td>
						  </tr>
						  <tr>
							<?php if($para_item_30->item_stem_ur!=""){?><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">سوال نمبر <?php print ++$ctr;?> : <?php echo html_entity_decode($para_item_30->item_stem_ur);?></td><?php }?>
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
						if($para_item_30->item_type=='MCQ')
						{
						if($para_item_30->item_option_layout=='1')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='2')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='3')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td width="25%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='4')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='5')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='6')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='7')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='8')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td width="50%"><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='9')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
									  </tr>
									  <tr>
										<td colspan="2"><span><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='10')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='11')
						{
						?>
						  <tr>
							<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
							<td><span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						  </tr>
						  <?php
						}
						elseif($para_item_30->item_option_layout=='12')
						{
						?>
						  <tr>
							<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
									  </tr>
									</table></td>
								  <td><table border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
										<td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
									  </tr>
									</table></td>
								</tr>
								<tr>
								  <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
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
					}
									
									
				?>
					</div>
					
					</div>
				 <?php
									
				}
			}
					?>
                    <!--<table width="100%" style="margin-top:50px; clear:both;">
                    	<tr>
                        	<td>
                            	<table cellpadding="0" cellspacing="0" width="100%">
                                	<tr><td style="border-bottom: 5px solid #F9AAAA;"></td></tr>
                                    <tr><td style="border-bottom: 2px solid #F9AAAA; padding-top:2px"></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
							<td style="padding-top:2px; padding-left:10px">Grade-< ?php print $paper_mcqs[0]->item_grade_id-2;?>, < ?php print $paper_mcqs[0]->subject_name_en;?>, CRP-< ?php print $crp_v_arry[1];?>
							</td>
						</tr>
                    </table> -->
                </div>
				<!-- /.box-body -->
			</div>
		</div>
        
	</section>
    
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>