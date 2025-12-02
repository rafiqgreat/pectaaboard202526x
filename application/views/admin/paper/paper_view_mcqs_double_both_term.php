<style>
	hr{
		margin: 3px 0;
	}
	.papyertype{
		font-size: 24px; font-weight: bold; text-align: center;
	}
	.papyertype2{
		font-size: 24px; font-weight: bold;
	}
	hr{margin: 5px 0;}
	.heading{
		font-size:35px;
	}
a, a:hover{
	color: #000000;
}
label{margin-bottom:0; font-size: 16px;}
.urdufont-right{font-size: 20px; line-height: 20px;}
  .content-block {
    page-break-inside: avoid;
  }
	.content-block strong{
    /*font-weight: normal;*/
  }
.content-block:nth-child(odd) {
		clear: both;
	}
	img{
		max-width: 100%;
	}
	.main-footer{
		display: none;
	}
.tbc-border) {
		border: 1px solid #000; border-collapse: collapse;
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
				$grade = $this->Paper_model->get_grade_name($paper_mcqs[0]->item_grade_id);
				$subject = $this->Paper_model->get_sub_name($paper_mcqs[0]->item_subject_id);
				//$headers = $this->Paper_model->get_headers_by_id($paper_mcqs[0]->fp_subject_id);
				//echo '<pre>';
				//print_r($grade);
				//echo '<hr>';
				//print_r($subject[0]->subject_code);
				//die();
				
				?>
                <?php if($subject[0]->subject_code=="ENG" || $subject[0]->subject_code=="GKN" || $subject[0]->subject_code=="MTH" || $subject[0]->subject_code=="SCI"){?>
				<table width="100%" style="border: 1px solid #000; border-collapse: collapse;" class="papyertype">
                    <tr>
                        <td width="45%" style="border: 1px solid #000;">QAT Practice Test</td>
                        <td width="5%" style="border: 1px solid #000; text-align:center"></td>
                        <td width="35%" style="border: 1px solid #000;"><?= $subject[0]->subject_name_en;?></td>
                        <td width="15%" style="border: 1px solid #000;">Grade-<?= $grade[0]->grade_code;?></td>
                    </tr>
                </table>
                <table width="100%" class="papyertype">
                    <tr>
                        <td style="font-size:40px"><?= $subject[0]->subject_name_en;?></td>
                    </tr>
                </table>
                <table width="100%" class="papyertype">
                    <tr>
                        <td width="25%" style="border: 1px solid #000; text-align:left">Roll No.</td>
                        <td width="25%" style="border: 1px solid #000; text-align:left">Name : </td>
                        <td width="25%" style="border: 1px solid #000;">Total Marks : (25)</td>
                        <td width="25%" style="border: 1px solid #000;">Time : 30 Minutes</td>
                    </tr>
                </table>
                <table width="100%" class="papyertype">
                    <tr>
                        <td width="33%" style="border: 1px solid #000;">Test (Term-<?php echo $term;?>)</td>
                        <td width="34%" style="border: 1px solid #000;">SECTION-I</td>
                        <td width="33%" style="border: 1px solid #000;"><?= ($term==1)? '1st Half':'2nd Half';?></td>
                    </tr>
                </table>
                <?php } else { ?>
                <table width="100%" style="border: 1px solid #000; border-collapse: collapse;" class="papyertype">
                    <tr>
                        <td width="45%" style="border: 1px solid #000;">QAT Practice Test</td>
                        <td width="5%" style="border: 1px solid #000; text-align:center"></td>
                        <td width="35%" style="border: 1px solid #000;"><?= $subject[0]->subject_name_en;?></td>
                        <td width="15%" style="border: 1px solid #000;">Grade-<?= $grade[0]->grade_code;?></td>
                    </tr>
                </table>
                <table width="100%" class="papyertype urdufont-right">
                    <tr>
                        <td style="font-size:40px"><?= $subject[0]->subject_name_ur;?></td>
                    </tr>
                </table>
                <table width="100%" class="papyertype urdufont-right mt-2" style="font-size:30px !important">
                    <tr height="40px">
                    	<td width="25%" style="border: 1px solid #000; text-align:right">رول نمبر :</td>
                        <td width="25%" style="border: 1px solid #000; text-align:right">نام:</td>
                        <td width="25%" style="border: 1px solid #000;">کل نمبر : 25</td>
                        <td width="25%" style="border: 1px solid #000;">کل وقت : 30 منٹ</td>
                    </tr>
                </table>
                <table width="100%" class="papyertype urdufont-right" style="font-size:30px !important">
                    <tr height="40px">
                        <td width="33%" style="border: 1px solid #000;">ٹیسٹ (ٹرم-1)</td>
                        <td width="34%" style="border: 1px solid #000;">سیکثن-1</td>
                        <td width="33%" style="border: 1px solid #000;"><?= ($term==1)? 'فسٹ ہاف':'سیکنڈ ہاف';?></td>
                    </tr>
                </table>
				<?php }?>
				<div class="container" style="margin-top:0px; clear:both;">
					<div class="row">
						<div style="width: 100%">
							<?php //die('=====');
							if(!empty($paper_mcqs)){
								$i = 0;
								$pagebreak = 4;
								$pagebreakcount = 1;
								$totalrecords = count($paper_mcqs);
								foreach($paper_mcqs as $paper_mcq){
									$i++;
									if($paper_mcq->item_type == 'MCQ'){
										$hide_image = '';
										if($paper_mcq->item_image_en == $paper_mcq->item_image_ur )
										{
											$hide_image = " display:none; ";	
										}
										
								?>
								<table class="content-block" width="98%" style="margin:1px 1% 0 1%; font-size: 16px;">
								<?php if ($paper_mcq->item_image_position=='Top') 
									{
										if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
										{
											?>
												<tr>
													<td><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
													</td>
													<td style="float:right"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px; <?php print $hide_image; ?>"/>
													</td>
												</tr>
												<?php 
										}
										elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
										{
										?>
								<tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
									</td>
								</tr>
								<?php 	
								}
								elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
								{
								?>
								<tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
									</td>
								</tr>
								<?php 	
						}
					}
?>
								<?php if ($paper_mcq->item_stem_en!=""){?>
								<tr>
									<td colspan="2" style="font-weight:bold; font-size:16px">
                                    <?php if(1==1){?>
											<?php if ($paper_mcq->item_type=='MCQ'){?>
                                            Question No.<?php print $i;?> :
                                            <?php }?>
                                            <?php }?>
										<?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_en!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
										<?php }?>
										<span style="padding-left:2px">
											<?php echo html_entity_decode($paper_mcq->item_stem_en);?>
										</span>
										<?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_en!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
										<?php }?>
									</td>
								</tr>
								<?php }?>
								<?php if ($paper_mcq->item_stem_ur!=""){?>
								<tr>
									<td colspan="2" style="text-align:right; font-weight:bold" >
                                    
                                    <?php if(1==1){?>
											<?php if ($paper_mcq->item_type=='MCQ'){?>
                                            <div class="urdufont-right">سوال نمبر <?php print $i;?>:&nbsp;
                                            <?php }?>
                                            <?php }?>
                                     
										<?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_ur!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
										<?php }?>
										<span style="padding-left:2px:">
											<?php echo html_entity_decode($paper_mcq->item_stem_ur);?> </span>
										<?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_ur!="")
					{?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
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
									<td><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
									</td>
									<td style="float:right"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px; <?php print $hide_image; ?>"/>
									</td>
								</tr>
								<?php 
						}
						elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
									</td>
								</tr>
								<?php 	
						}
						elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
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
															<td style="font-size:14px;" >(a)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td style="padding-left:2px">
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
															<td style="font-size:14px;">(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td style="padding-left:2px">
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
															<td style="font-size:14px;">(c)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td style="padding-left:2px">
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
															<td style="font-size:14px;">(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td style="padding-left:2px">
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
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(a)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?> padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
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
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(c)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
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
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> > (a)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right col-12" style="<?php print $hide_item_option_a_ur;?> padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="25%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(b)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?> padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="25%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(c)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td width="25%">
													<table border="0" cellspacing="2" cellpadding="2" width="100%">
														<tr>
															<td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> >(d)
																<span>
																	<?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
																</span>
															</td>
															<td width="40%">
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
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
															<td>(a) <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
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
															<td>(a) <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td width="50%">
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
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
															<td>(a) <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
															<td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"> <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td width="50%"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td width="50%"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
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
																<div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
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
																<div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
																	<?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
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
									if($paper_mcq->item_type == 'ERQ'){
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

										<tr><td colspan="2" style="font-weight:bold; font-size:14px">Question No.<?php print $i;?> :

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
									 

									  <?php /*?>if($paper_mcq->item_rubric_image!='')

									  {

										  if($paper_mcq->item_rubric_urdu!=''&&$paper_mcq->item_rubric_english!='')

										  {?>

											  <table style="width: 100%">

												<?php if($paper_mcq->item_rubric_image_position=='Top'){?>

												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

												<?php }?>

												<tr><td style="width:50%"><?php echo html_entity_decode($paper_mcq->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($paper_mcq->item_rubric_urdu);?></td></td></tr>

												<?php if($paper_mcq->item_rubric_image_position=='Bottom'){?>

												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

												<?php }?>

											  </table>

										  <?php }



										  elseif($paper_mcq->item_rubric_urdu==''&&$paper_mcq->item_rubric_english!='')

										  {?>

											  <span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>

											  <table width="100%" >

												<?php if($paper_mcq->item_rubric_image_position=='Top'){?>

												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

												<?php }?>



												<tr>

													<?php if($paper_mcq->item_rubric_image_position=='Left'){?>

													<td width="50%"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td>

													<?php }?>



													<td><?php echo html_entity_decode($paper_mcq->item_rubric_english);?></td>



													<?php if($paper_mcq->item_rubric_image_position=='Right'){?>

													<td width="50%"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td>

													<?php }?>

												</tr>



												<?php if($paper_mcq->item_rubric_image_position=='Bottom'){?>

												<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

												<?php }?>

											  </table>

									  <?php }



										  elseif($paper_mcq->item_rubric_urdu!=''&&$paper_mcq->item_rubric_english=='')

										  { ?>

										  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>

										  <table width="100%">

											<?php if($paper_mcq->item_rubric_image_position=='Top'){?>

											<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

											<?php }?>

											<tr>

												<?php if($paper_mcq->item_rubric_image_position=='Left'){?>

												<td width="50%"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td>

												<?php }?>

												<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($paper_mcq->item_rubric_urdu);?></div></td>

												<?php if($paper_mcq->item_rubric_image_position=='Right'){?>

												<td width="50%"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td>

												<?php }?>

											</tr>

											<?php if($paper_mcq->item_rubric_image_position=='Bottom'){?>

											<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

											<?php }?>

										  </table>

									  <?php }



										  else

										  {?>

											  <table width="100%">

												<tr><td style="text-align:center"><img src="<?= base_url().$paper_mcq->item_rubric_image;?>" style="max-width:100%;"/></td></tr>

											  </table>

									  <?php }

									  }

									  else

									  {

										  if($paper_mcq->item_rubric_urdu==''&&$paper_mcq->item_rubric_english!='')

										  {?>

											  <span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>

											  <table width="100%" ><tr><td><?php echo  html_entity_decode($paper_mcq->item_rubric_english);?></td></tr></table>

									  <?php 

										  }

										  elseif($paper_mcq->item_rubric_urdu!=''&&$paper_mcq->item_rubric_english=='')

										  { ?>

										  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>

										  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($paper_mcq->item_rubric_urdu);?></div></td></tr></table>

									  <?php }

										  //$paper_mcq->item_rubric_urdu!=''&&$paper_mcq->item_rubric_english!=''

										  else

										  {

											  ?>

											  <table style="width:100%">

												<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($paper_mcq->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($paper_mcq->item_rubric_urdu);?></td></tr>

											  </table>

										  <?php 

										  }

}<?php */?>
							<?php
									}
								}
							}else{
								//print '<div style="text-align:center">No data available</div>';
							}
						   ?>
						</div>
					</div>
					<!---- end  here is item view filmzy --->
				</div>
				
				<div class="container" style="margin-top:0px;padding-bottom:0px; clear:both; height: 100%;">
                	<?php
					if(!empty($paper_groups)){
						print '<hr>';
						print '<div class="papyertype">SUBJECTIVE PART(CRQs)</div>';
						$ar_value = 0;
						$ar_value = count($paper_groups);
						foreach($paper_groups as $paper_group){
							$i++;
							$max_val[] = $i;
							$g_ctr = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
							$g =0; ?>

							<div class="row">
								<div class="col-lg-6 col-sm-12">                         
								  <label for="group_title_en" class="control-label" >Question No.<?php echo $i;?> :</label>
								  <div style="font-weight:bold"><?php //echo $paper_group->group_id; ?></div>
								</div>

								<div class="col-lg-6 col-sm-12">                         
								   <label for="group_title_ur" class="control-label urdufont-right" style="float:right">سوال نمبر   <?php echo $i;?> </label>
									<div style="font-weight:bold"><?php //echo $paper_group->group_id; ?></div>
								</div>
							 </div>
				   <?php

				if(isset($paper_group->group_item_1) && $paper_group->group_item_1!=0)
				{ 
					$group_item_1 = $this->Paper_model->get_item_by_id($paper_group->group_item_1);
					$group_item_1 = $group_item_1[0];
				 	$hide_image1 = '';
					if($group_item_1->item_image_en == $group_item_1->item_image_ur )
					{
						$hide_image1 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" cellpadding="1" >
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
						elseif($group_item_1->item_image_en!="" && $group_item_1->item_image_ur=="")
						{
						?>
						  <tr>
							<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;" /></td>
						  </tr>
						  <?php 	
						}
						elseif($group_item_1->item_image_en=="" && $group_item_1->item_image_ur!="")
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
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">

							<?php if(1==1){?>                               
							<?php if ($group_item_1->item_type=='ERQ'){?>
							<?php if($group_item_1->item_stem_en!=""){?>a &#41; <?php }?><?php ++$g;?>
							<?php }?>
							<?php }?>
						<?php echo html_entity_decode($group_item_1->item_stem_en);?></td>
					  
						<?php if($group_item_1->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
					?>
					</table>
				<?php  
				}

				if(isset($paper_group->group_item_2)&&$paper_group->group_item_2!=0)
				{ $group_item_2 = $this->Paper_model->get_item_by_id($paper_group->group_item_2);
					$group_item_2 = $group_item_2[0];
				 $hide_image2 = '';
					if($group_item_2->item_image_en == $group_item_2->item_image_ur )
					{
						$hide_image2 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
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
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">

						  <?php if(1==1){?>							 
						  <?php if ($group_item_2->item_type=='ERQ'){?>
						  <?php if($group_item_2->item_stem_en!=""){?>b &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_2->item_stem_en);?></td>
					  
						<?php if($group_item_2->item_stem_ur!=""){?>
						  <td width="40%" valign="top" >
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
						  </td><?php }?> </div>
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
				{$group_item_3 = $this->Paper_model->get_item_by_id($paper_group->group_item_3);
					$group_item_3 = $group_item_3[0];
				 $hide_image3 = '';
					if($group_item_3->item_image_en == $group_item_3->item_image_ur )
					{
						$hide_image3 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
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
						<td  width="60%" valign="top" style="font-weight:bold; font-size:16px;">

						  <?php if(1==1){?>							 
						  <?php if ($group_item_3->item_type=='ERQ'){?>
						  <?php if($group_item_3->item_stem_en!=""){?>c &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_3->item_stem_en);?></td>
					  
						<?php if($group_item_3->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
				{$group_item_4 = $this->Paper_model->get_item_by_id($paper_group->group_item_4);
					$group_item_4 = $group_item_4[0];
				 $hide_image4 = '';
					if($group_item_4->item_image_en == $group_item_4->item_image_ur )
					{
						$hide_image4 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
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
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">

						  <?php if(1==1){?>							 
						  <?php if ($group_item_4->item_type=='ERQ'){?>
						  <?php if($group_item_4->item_stem_en!=""){?>d &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_4->item_stem_en);?>
						  </td>
					
						<?php if($group_item_4->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
				{$group_item_5 = $this->Paper_model->get_item_by_id($paper_group->group_item_5);
					$group_item_5 = $group_item_5[0];
				 $hide_image5 = '';
					if($group_item_5->item_image_en == $group_item_5->item_image_ur )
					{
						$hide_image5 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
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
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">

						  <?php if(1==1){?>							 
						  <?php if ($group_item_5->item_type=='ERQ'){?>
						  <?php if($group_item_5->item_stem_en!=""){?>e &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_5->item_stem_en);?>
						  </td>
						<?php if($group_item_5->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
				{$group_item_6 = $this->Paper_model->get_item_by_id($paper_group->group_item_6);
				$group_item_6 = $group_item_6[0];
				 $hide_image6 = '';
					if($group_item_6->item_image_en == $group_item_6->item_image_ur )
					{
						$hide_image6 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
					  <?php if ($group_item_6->item_image_position=='Top') 
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
					  <tr>
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">

						  <?php if(1==1){?>							  
						  <?php if ($group_item_6->item_type=='ERQ'){?>
						  <?php if($group_item_6->item_stem_en!=""){?>f &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_6->item_stem_en);?>
						 </td>
					  </tr>
					  <tr>
						<?php if($group_item_6->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
				{$group_item_7 = $this->Paper_model->get_item_by_id($paper_group->group_item_7);
				$group_item_7 = $group_item_7[0];
				 $hide_image7 = '';
					if($group_item_7->item_image_en == $group_item_7->item_image_ur )
					{
						$hide_image7 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
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
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">


						  <?php if(1==1){?>							  
						  <?php if ($group_item_7->item_type=='ERQ'){?>
						  <?php if($group_item_7->item_stem_en!=""){?>g &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_7->item_stem_en);?>
						  </td>
						<?php if($group_item_7->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
				{$group_item_8 = $this->Paper_model->get_item_by_id($paper_group->group_item_8);
				$group_item_8 = $group_item_8[0];
				 $hide_image8 = '';
					if($group_item_8->item_image_en == $group_item_8->item_image_ur )
					{
						$hide_image8 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
					  <?php if ($group_item_8->item_image_position=='Top') 
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
					  <tr>
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">
						  <?php if(1==1){?>							 
						  <?php if ($group_item_8->item_type=='ERQ'){?>
						  <?php if($group_item_8->item_stem_en!=""){?>h &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_8->item_stem_en);?>
						 </td>
						<?php if($group_item_8->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
				{$group_item_9 = $this->Paper_model->get_item_by_id($paper_group->group_item_9);
				$group_item_9 = $group_item_9[0];
				 $hide_image9 = '';
					if($group_item_9->item_image_en == $group_item_9->item_image_ur )
					{
						$hide_image9 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
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
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">

						  <?php if(1==1){?>							 
						  <?php if ($group_item_9->item_type=='ERQ'){?>
						  <?php if($group_item_9->item_stem_en!=""){?>i &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_9->item_stem_en);?>
						  </td>
					  </tr>
					  <tr>
						<?php if($group_item_9->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
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
				{$group_item_10 = $this->Paper_model->get_item_by_id($paper_group->group_item_10);
					$group_item_10 = $group_item_10[0];
				 $hide_image9 = '';
					if($group_item_9->item_image_en == $group_item_9->item_image_ur )
					{
						$hide_image9 = " display:none; ";	
					}
					?>
					<table width="100%" style="margin-top:1px;" >
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
						<td width="60%" valign="top" style="font-weight:bold; font-size:16px;">

						  <?php if(1==1){?>							 
						  <?php if ($group_item_10->item_type=='ERQ'){?>
						  <?php if($group_item_10->item_stem_en!=""){?>j &#41; <?php }?><?php ++$g;?>
						  <?php }?>
						  <?php }?><?php echo html_entity_decode($group_item_10->item_stem_en);?>
						 </td>
						<?php if($group_item_10->item_stem_ur!=""){?>
						  <td width="40%" valign="top">
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
						  </td><?php }?>
					  </tr>
					  <?php if ($group_item_10->item_image_position=='Bottom') 
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
		</div>
        
	</section>
    
	</div>
