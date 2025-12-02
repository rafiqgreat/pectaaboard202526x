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
	
	@media print {
    a[href]:after {
        content: none !important;
    }
		.main-footer{
		display: none;
	}
	}
</style> 
<div class="content-wrapper">
	<section class="content" >
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>
				<?php /*
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($paper_erqs[0]->subject_name_en);
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
				?>
                	<div class="container" style="padding-top:25px">
					
				<?php 
				echo '<hr />';
				?>
						<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 20px;">
							<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_erqs[0]->subject_name_en;?> - GRADE <?php print $paper_erqs[0]->item_grade_id-2;?></div>
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
				<?php } </div>*/?>
				
				<div class="container" style="padding-top:25px">
					<div class="row">
						<div style="width: 100%">
							<?php
							if(!empty($paper_erqs)){
								$headers = $this->Itemsbank_model->get_headers_by_id($paper_erqs[0]->subject_id, 'ERQs');
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
								foreach($paper_erqs as $paper_erq){
									$i++;

									if($paper_erq->item_type == 'ERQ'){
										?>
										<table width="100%" style="margin-top:10px;" >   
										<?php if ($paper_erq->item_image_position=='Top') 
										{
											if($paper_erq->item_image_en!="" && $paper_erq->item_image_ur!="") 
											{
												?>
												 <tr>
													<td style="width:50%"><img src="<?= base_url().$paper_erq->item_image_en;?>" style="max-height:400px;"/></td>
													<td style="float:right; width:50%"><img src="<?= base_url().$paper_erq->item_image_ur;?>" style="max-height:400px;"/></td>
												  </tr>
												<?php 
											}
											elseif($paper_erq->item_image_en!=""&&$paper_erq->item_image_ur=="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_erq->item_image_en;?>" style="max-height:400px;" /></td>          	
												  </tr>
												<?php 	
											}
											elseif($paper_erq->item_image_en==""&&$paper_erq->item_image_ur!="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_erq->item_image_ur;?>" style="max-height:400px;"/></td>          	
												  </tr>
												<?php 	
											}
										}
										?>
										<?php if ($paper_erq->item_stem_en!=""){?>
										<tr><td colspan="2" style="font-weight:bold; font-size:14px">
                                          <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>
										  <?php if ($paper_erq->item_type=='MCQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$paper_erq->item_id); ?> target="_blank">Question No.<?php print $i;?> </a>
                                          <?php }?>
                                          <?php if ($paper_erq->item_type=='ERQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$paper_erq->item_id); ?> target="_blank">Question No.<?php print $i;?> </a>
                                          <?php }?>
                                          <?php }?>:
										<?php if($paper_erq->item_image_position=='Left' && $paper_erq->item_image_en!="")
										{?> <img src="<?= base_url().$paper_erq->item_image_en;?>" style="max-height:400px;"/> <?php }?>
										<span style="padding-left:10px; font-size:16px"><?php echo html_entity_decode($paper_erq->item_stem_en);?></span>
										<?php if($paper_erq->item_image_position=='Right' && $paper_erq->item_image_en!="")
										{?> <img src="<?= base_url().$paper_erq->item_image_en;?>" style="max-height:400px;"/> <?php }?></td></tr>
										<?php }?>
										<?php /*  if ($paper_erq->item_stem_ur!=""){?>
										<tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">  
                                        <?php if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==1){?>
										  <?php if ($paper_erq->item_type=='MCQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_ss_view/'.$paper_erq->item_id); ?> target="_blank">سوال نمبر <?php print $i;?>:&nbsp;<?php print $i;?> </a>
                                          <?php }?>
                                          <?php if ($paper_erq->item_type=='ERQ'){?>
                                          <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$paper_erq->item_id); ?> target="_blank">سوال نمبر <?php print $i;?>:&nbsp; </a>
                                          <?php }?>
                                          <?php }?>
										<?php if($paper_erq->item_image_position=='Left' && $paper_erq->item_image_ur!="")
										{?> <img src="<?= base_url().$paper_erq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
										<span style="padding-left:50px:"><?php echo html_entity_decode($paper_erq->item_stem_ur);?> </span>
										<?php if($paper_erq->item_image_position=='Right' && $paper_erq->item_image_ur!="")
										{?> <img src="<?= base_url().$paper_erq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
										</td></tr>
										  <?php  }  */ ?>
										<?php if ($paper_erq->item_image_position=='Bottom') 
										{
											if($paper_erq->item_image_en!="" && $paper_erq->item_image_ur!="") 
											{
												?>
												 <tr >
													<td style="width:50%"><img src="<?= base_url().$paper_erq->item_image_en;?>" style="max-width:100%;"/></td>
													<td style="float:right;"><img src="<?= base_url().$paper_erq->item_image_ur;?>" style="max-width:100%;"/></td>
												  </tr>
												<?php 
											}
											elseif($paper_erq->item_image_en!=""&&$paper_erq->item_image_ur=="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_erq->item_image_en;?>" style="max-height:400px;" /></td>          	
												  </tr>
												<?php 	
											}
											elseif($paper_erq->item_image_en==""&&$paper_erq->item_image_ur!="")
											{
											?>
												 <tr>
													<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_erq->item_image_ur;?>" style="max-height:400px;"/></td>          	
												  </tr>
												<?php 	
											}
										}		
										?>               
													  </table>
							<?php
									}
									//print '<div style="page-break-before: always;"></div>';
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
                <?php /*?><div class="container" >
                    <table width="100%" style="margin-top:100px">
                    	<tr>
                        	<td>
                            	<table cellpadding="0" cellspacing="0" width="100%">
                                	<tr><td style="border-bottom: 5px solid #F9AAAA;"></td></tr>
                                    <tr><td style="border-bottom: 2px solid #F9AAAA; padding-top:2px"></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td style="padding-top:2px; padding-left:10px">Grade-<?php print $paper_erqs[0]->item_grade_id-2;?>, <?php print $paper_erqs[0]->subject_name_en;?>, CRP-I</td></tr>
                    </table>
                </div><?php */?>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>