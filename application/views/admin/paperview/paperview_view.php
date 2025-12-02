  <!-- Content Wrapper. Contains page content -->
 <style>
 .urdufont-right {
    font-size: 18px;
}
</style> 
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<!--<div class="card">
		  <div class="card-header">
			<div class="d-inline-block float-right">
			  <div class="btn-group margin-bottom-20"> 
				<a href="<?= base_url('admin/paperview/create_flimzy_pdf?grade_id='.$search_grade.'&subject_id='.$search_subject.'&cstand_id='.$search_cstand.'&subcstand_id='.$search_subcstand.'&typeofquestion_id='.$search_typeofquestion);?>" class="btn btn-secondary" style="margin:05px">Export as PDF</a>
			  </div>         
			</div>
		  </div>
		</div>-->
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); 
			//echo '<PRE>';
				//$item = $items['0'];
				//print $item->item_id; die;
			//print_r($item);
			//die();?>
				<!---- start here is item view filmzy --->
				<!--Pilotheader-->
				<?php
				$pilotheaders = $this->Paperview_model->get_pilotheader_by_suject($papersubject[0]['subject_name_en']);
				//print_r($pilotheaders);
				$pilotheaders = $pilotheaders[0];
				if(!empty($pilotheaders)){
					if($search_typeofquestion == 'MCQ'){
				?>
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
														<td width="110px;"><div class="urdufont-right" style="padding-left:20px; font-size: 18px;"><span dir="RTL">طالب علم کا نام</span>&nbsp;</div>Student Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;

														</td>
													</tr>
													<tr>
														<td width="110px;"><div class="urdufont-right" style="padding-left:20px; font-size: 18px;"><span dir="RTL">سکول کا نام</span>&nbsp;</div>School Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;

														</td>
													</tr>
												</tbody>
											</table>
										</td>
										<td width="50%" align="center">
											Curriculum Reform Performa<br>
											<div style="border: 2px solid #000000; font-size: 18px; font-weight: bold; min-width: 200px; display: inline-block;padding: 5px;"><?php print $papersubject[0]['subject_name_en'];?></div>
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
							<?php echo $pilotheaders['ph_general_instruction']?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12" style="border-bottom:#000 solid 1px"></div>
					</div>
				<?php }elseif($search_typeofquestion == 'ERQ'){?>
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
					}
				}?>
				
				<div class="container" style="padding-top:25px">
					<div class="row">
						<div style="width: 100%">

							<?php
							if(!empty($items)){
								$i = 0;
								foreach($items as $item){
									$i++;
									if($item->item_type == 'MCQ'){
								?>
									<table width="100%" style="margin-top:10px;">
								<?php if ($item->item_image_position=='Top') 
									{
										if($item->item_image_en!="" && $item->item_image_ur!="") 
										{
											?>
												<tr>
													<td><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
													</td>
													<td style="float:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
													</td>
												</tr>
												<?php 
										}
										elseif($item->item_image_en!=""&&$item->item_image_ur=="")
										{
										?>
								<tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
								}
								elseif($item->item_image_en==""&&$item->item_image_ur!="")
								{
								?>
								<tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
					}
?>
								<?php if ($item->item_stem_en!=""){?>
								<tr>
									<td colspan="2" style="font-weight:bold; font-size:14px">Question No.<?php print $i;?> :
										<?php if($item->item_image_position=='Left' && $item->item_image_en!="")
					{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
										<?php }?>
										<span style="padding-left:50px">
											<?php echo html_entity_decode($item->item_stem_en);?>
										</span>
										<?php if($item->item_image_position=='Right' && $item->item_image_en!="")
					{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
										<?php }?>
									</td>
								</tr>
								<?php }?>

								<?php if ($item->item_stem_ur!=""){?>
								<tr>
									<td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال نمبر <?php print $i;?>:&nbsp;
										<?php if($item->item_image_position=='Left' && $item->item_image_ur!="")
					{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
										<?php }?>
										<span style="padding-left:50px:">
											<?php echo html_entity_decode($item->item_stem_ur);?> </span>
										<?php if($item->item_image_position=='Right' && $item->item_image_ur!="")
					{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
										<?php }?>
									</td>
								</tr>
								<?php }?>

								<?php if ($item->item_image_position=='Bottom') 
					{
						if($item->item_image_en!="" && $item->item_image_ur!="") 
						{
							?>
								<tr>
									<td><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
									</td>
									<td style="float:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 
						}
						elseif($item->item_image_en!=""&&$item->item_image_ur=="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
						elseif($item->item_image_en==""&&$item->item_image_ur!="")
						{
						?>
								<tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/>
									</td>
								</tr>
								<?php 	
						}
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
															<td style="font-size:14px">(a)
																<span>
																	<?php echo html_entity_decode($item->item_option_a_en);?>
																</span>
															</td>
															<td style="padding-left:50px">
																<div class="urdufont-right">
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
															<td style="font-size:14px">(b)
																<span>
																	<?php echo html_entity_decode($item->item_option_b_en);?>
																</span>
															</td>
															<td style="padding-left:50px">
																<div class="urdufont-right">
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
															<td style="font-size:14px">(c)
																<span>
																	<?php echo html_entity_decode($item->item_option_c_en);?>
																</span>
															</td>
															<td style="padding-left:50px">
																<div class="urdufont-right">
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
															<td style="font-size:14px">(d)
																<span>
																	<?php echo html_entity_decode($item->item_option_d_en);?>
																</span>
															</td>

															<td style="padding-left:50px">
																<div class="urdufont-right" style="text-align:right">
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
								} elseif ( $item->item_option_layout == '2' )
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
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
															<td>(c)
																<span>
																	<?php echo html_entity_decode($item->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
								} elseif ( $item->item_option_layout == '3' )
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
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
								} elseif ( $item->item_option_layout == '4' )
								{
									?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '5' )
								{
									?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '6' )
								{
									?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table border="0" cellspacing="2" cellpadding="2">
														<tr>
															<td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '7' )
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_a_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_a_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_b_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_b_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_c_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_c_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_d_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url(). $item->item_option_d_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '8' )
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_a_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_b_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_c_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_d_ur);?>
																</div>
															</td>
															<td><span style="padding-left:20px"><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '9' )
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_a_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_b_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_c_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"> <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span>
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_d_ur);?>
																</div>
															</td>
														</tr>
														<tr>
															<td colspan="2"><span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span>
															</td>
														</tr>

													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '10' )
								{
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
																	<?php echo html_entity_decode($item->item_option_a_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="padding-left:20px">
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
															<td>(b)
																<span>
																	<?php echo html_entity_decode($item->item_option_b_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="padding-left:20px">
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
															<td>(c)
																<span>
																	<?php echo html_entity_decode($item->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="padding-left:20px">
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
															<td>(d)
																<span>
																	<?php echo html_entity_decode($item->item_option_d_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '11' )
								{
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
																	<?php echo html_entity_decode($item->item_option_a_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
															<td>(c)
																<span>
																	<?php echo html_entity_decode($item->item_option_c_en);?>
																</span>
															</td>
															<td>
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
									</td>
								</tr>

								<?php
								} elseif ( $item->item_option_layout == '12' )
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
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
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
																<div class="urdufont-right" style="padding-left:20px">
																	<?php echo html_entity_decode($item->item_option_d_ur);?>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span>
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
										?>
										<table width="100%" style="margin-top:10px;" >   

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

										<?php if ($item->item_stem_en!=""){?>

										<tr><td colspan="2" style="font-weight:bold; font-size:14px">Question No.<?php print $i;?> :

										<?php if($item->item_image_position=='Left' && $item->item_image_en!="")

										{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/> <?php }?>

										<span style="padding-left:50px"><?php echo html_entity_decode($item->item_stem_en);?></span>

										<?php if($item->item_image_position=='Right' && $item->item_image_en!="")

										{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/> <?php }?></td></tr>

										<?php }?>



										<?php if ($item->item_stem_ur!=""){?>

										<tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">  سوال نمبر <?php print $i;?>:&nbsp; 

										<?php if($item->item_image_position=='Left' && $item->item_image_ur!="")

										{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/> <?php }?>

										<span style="padding-left:50px:"><?php echo html_entity_decode($item->item_stem_ur);?> </span>

										<?php if($item->item_image_position=='Right' && $item->item_image_ur!="")

										{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/> <?php }?>

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
									 

									  <?php /*?>if($item->item_rubric_image!='')

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

											  <span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>

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

											  <span style="font-size:14px; font-weight:bold">Item Rubric (English) :</span>

											  <table width="100%" ><tr><td><?php echo  html_entity_decode($item->item_rubric_english);?></td></tr></table>

									  <?php 

										  }

										  elseif($item->item_rubric_urdu!=''&&$item->item_rubric_english=='')

										  { ?>

										  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>

										  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td></tr></table>

									  <?php }

										  //$item->item_rubric_urdu!=''&&$item->item_rubric_english!=''

										  else

										  {

											  ?>

											  <table style="width:100%">

												<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($item->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_rubric_urdu);?></td></tr>

											  </table>

										  <?php 

										  }

}<?php */?>
							<?php
									}
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