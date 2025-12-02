  <!-- Content Wrapper. Contains page content -->
 <style>
 .urdufont-right {
    font-size: 22px;
}
	 body {
		 
		 font-size: 1.1rem;
	 }
	 .container {
		 padding-left: 0px; padding-right: 0px;
	 }
	 .main-footer{
		display: none;
	}
	 @media print {
    a[href]:after {
        content: none !important;
    }
	}
</style> 
 
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content" >
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>
				<!---- start here is item view filmzy --->
				<!--Pilotheader-->
				<?php
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($paper_paras_erqs[0]->subject_name_en);
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
					
				?>
                	<?php /*?><div class="container" style="padding-top:25px">
					<div class="row">
						<div class="col-lg-12 col-sm-12" style="border-bottom:#000 solid 1px"></div>
					</div>
				<?php 
				echo '<hr />';
				?>
						<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 20px;">
							<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_paras_erqs[0]->subject_name_en;?> - GRADE <?php print $paper_paras_erqs[0]->para_grade_id-2;?></div>
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
						</div><?php */?>
				<?php
					
				}?>
				</div>
                <div class="container" >
                    <?php
							if(!empty($paper_paras_erqs)){
								$i = 0;
								$ar_value = 0;
								$ar_value = count($paper_paras_erqs);
								foreach($paper_paras_erqs as $paper_paras_erq){
									$i++;
									$max_val[] = $i;
									//print_r($paper_paras_erq);
									//die();
					?>
                    
                    
                    <div class="container">
					
						<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 20px;">
							<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_paras_erqs[0]->subject_name_en;?> - GRADE <?php print $paper_paras_erqs[0]->para_grade_id-2;?></div>
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
                            <span style="margin: 0px auto;">P-<?php echo $paper_paras_erq->para_id;?>(<?php echo (isset($paper_paras_erq->para_item_21)&&($paper_paras_erq->para_item_21!=0))?'1_'.$paper_paras_erq->para_item_21:""; echo (isset($paper_paras_erq->para_item_22)&&($paper_paras_erq->para_item_22!=0))?',2_'.$paper_paras_erq->para_item_22:""; echo (isset($paper_paras_erq->para_item_23)&&($paper_paras_erq->para_item_23!=0))?',3_'.$paper_paras_erq->para_item_23:""; echo (isset($paper_paras_erq->para_item_24)&&($paper_paras_erq->para_item_24!=0))?',4_'.$paper_paras_erq->para_item_24:""; echo (isset($paper_paras_erq->para_item_25)&&($paper_paras_erq->para_item_25!=0))?',5_'.$paper_paras_erq->para_item_25:""; echo (isset($paper_paras_erq->para_item_26)&&($paper_paras_erq->para_item_26!=0))?',6_'.$paper_paras_erq->para_item_26:""; echo (isset($paper_paras_erq->para_item_27)&&($paper_paras_erq->para_item_27!=0))?',7_'.$paper_paras_erq->para_item_27:""; echo (isset($paper_paras_erq->para_item_28)&&($paper_paras_erq->para_item_28!=0))?',8_'.$paper_paras_erq->para_item_28:""; echo (isset($paper_paras_erq->para_item_29)&&($paper_paras_erq->para_item_29!=0))?',9_'.$paper_paras_erq->para_item_29:""; echo (isset($paper_paras_erq->para_item_30)&&($paper_paras_erq->para_item_30!=0))?',10_'.$paper_paras_erq->para_item_30:""; ?>)</span>
						</div>
                        
                        
                        
                    	<table style="width:100%">
            <div class="row">
              	<?php if($paper_paras_erq->para_title_en!=""){?>
                <div class="col-lg-6 col-sm-12">                         
                  <label for="para_title_en" class="col-sm-12 control-label">Paragraph Instruction</label>
                  <div style="font-weight:bold"><?php echo $paper_paras_erq->para_title_en; ?></div>
                </div>
                <?php }?>
                <?php if($paper_paras_erq->para_title_ur!=""){?>
				<div class="col-lg-12 col-sm-12 urdufont-right" style="text-align:right" >                         
                    <label for="para_title_ur" class="control-label" >پیرا گراف ہدایات *</label>
                    <?php echo $paper_paras_erq->para_title_ur; ?>
                </div>
                <?php }?>
             </div>
			<?php 
			
			if($paper_paras_erq->para_text_en!='') 
			{
				if($paper_paras_erq->para_img_position=='Top'&&$paper_paras_erq->para_image!="") 
				{ ?>
				<tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:100px; max-width:100px; margin: 4px;"/></td></tr>
				<?php } ?>
                 
				<tr>
                        <td colspan="2" >
						<?php if($paper_paras_erq->para_img_position=='Left'&&$paper_paras_erq->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:100px; float:left; margin: 4px;max-width:100px;"/> <?php }?> 
					
                        <?php if($paper_paras_erq->para_img_position=='Right'&&$paper_paras_erq->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:100px; float:right; margin: 4px;max-width:100px;"/> <?php }?>
                        <?php echo html_entity_decode($paper_paras_erq->para_text_en);?>   
                    </tr>
                    
				<?php if($paper_paras_erq->para_img_position=='Bottom'&&$paper_paras_erq->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:100px;margin: 4px;max-width:100px;"/></td></tr><?php }?>
                    
				
                    
             <?php 
			} 
				
				if($paper_paras_erq->para_text_ur!='') {?>
                    <?php if($paper_paras_erq->para_img_position=='Top'&&$paper_paras_erq->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <tr>
                        <td colspan="2" style="text-align:right;" class="urdufont-right">
						<?php if($paper_paras_erq->para_img_position=='Left'&&$paper_paras_erq->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px; float:left"/> <?php }?>
							
						<?php echo html_entity_decode($paper_paras_erq->para_text_ur);?>
							
                        <?php if($paper_paras_erq->para_img_position=='Right'&&$paper_paras_erq->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px; float:right"/> <?php }?> 
                    </tr>
                    <?php if($paper_paras_erq->para_img_position=='Bottom') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <?php }?>
            </table>
					   <?php
            
					
					if(isset($paper_paras_erq->para_item_21)&&$paper_paras_erq->para_item_21!=0)
					{
						$para_item_21 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_21);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_21->item_id); ?> target="_blank">Question No.1 :</a>
							  <?php }?>
							  <?php if ($para_item_21->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_21->item_id); ?> target="_blank">Question No.1 :</a>
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
						
					
					if(isset($paper_paras_erq->para_item_22)&&$paper_paras_erq->para_item_22!=0)
					{
						$para_item_22 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_22);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_22->item_id); ?> target="_blank">Question No.2 :</a>
							  <?php }?>
							  <?php if ($para_item_22->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_22->item_id); ?> target="_blank">Question No.2 :</a>
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
					
					if(isset($paper_paras_erq->para_item_23)&&$paper_paras_erq->para_item_23!=0)
					{
						$para_item_23 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_23);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_23->item_id); ?> target="_blank">Question No.3 :</a>
							  <?php }?>
							  <?php if ($para_item_23->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_23->item_id); ?> target="_blank">Question No.3 :</a>
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

					if(isset($paper_paras_erq->para_item_24)&&$paper_paras_erq->para_item_24!=0)
					{
						$para_item_24 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_24);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_24->item_id); ?> target="_blank">Question No.4 :</a>
							  <?php }?>
							  <?php if ($para_item_24->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_24->item_id); ?> target="_blank">Question No.4 :</a>
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
							
					if(isset($paper_paras_erq->para_item_25)&&$paper_paras_erq->para_item_25!=0)
					{
						$para_item_25 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_25);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_25->item_id); ?> target="_blank">Question No.5 :</a>
							  <?php }?>
							  <?php if ($para_item_25->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_25->item_id); ?> target="_blank">Question No.5 :</a>
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
					
					if(isset($paper_paras_erq->para_item_26)&&$paper_paras_erq->para_item_26!=0)
					{
						$para_item_26 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_26);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_26->item_id); ?> target="_blank">Question No.6 :</a>
							  <?php }?>
							  <?php if ($para_item_26->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_26->item_id); ?> target="_blank">Question No.6 :</a>
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
					
					if(isset($paper_paras_erq->para_item_27)&&$paper_paras_erq->para_item_27!=0)
					{
						$para_item_27 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_27);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_27->item_id); ?> target="_blank">Question No.7 :</a>
							  <?php }?>
							  <?php if ($para_item_27->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_27->item_id); ?> target="_blank">Question No.7 :</a>
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
					
					if(isset($paper_paras_erq->para_item_28)&&$paper_paras_erq->para_item_28!=0)
					{
						$para_item_28 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_28);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_28->item_id); ?> target="_blank">Question No.8 :</a>
							  <?php }?>
							  <?php if ($para_item_28->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_28->item_id); ?> target="_blank">Question No.8 :</a>
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
					
					if(isset($paper_paras_erq->para_item_29)&&$paper_paras_erq->para_item_29!=0)
					{
						$para_item_29 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_29);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_29->item_id); ?> target="_blank">Question No.9 :</a>
							  <?php }?>
							  <?php if ($para_item_29->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_29->item_id); ?> target="_blank">Question No.9 :</a>
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
					
					if(isset($paper_paras_erq->para_item_30)&&$paper_paras_erq->para_item_30!=0)
					{
						$para_item_30 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_30);
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
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_30->item_id); ?> target="_blank">Question No.10 :</a>
							  <?php }?>
							  <?php if ($para_item_30->item_type=='ERQ'){?>
							  <a href=<?php echo base_url('admin/pilot_items/pilot_view_combine/'.$para_item_30->item_id); ?> target="_blank">Question No.10 :</a>
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
					}?>
								<?php 
                                if(max($max_val)==$ar_value)
								{?>
                        <?php /*?><table width="100%"  style="margin-top:40%;">
                            <tr>
                                <td>
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tr><td style="border-bottom: 5px solid #F9AAAA;"></td></tr>
                                        <tr><td style="border-bottom: 2px solid #F9AAAA; padding-top:2px"></td></tr>
                                    </table>
                                </td>
                            </tr>
                            <tr><td style="padding-top:2px; padding-left:10px">Grade-<?php print $paper_paras_erqs[0]->para_grade_id-2;?>, <?php print $paper_paras_erqs[0]->subject_name_en;?>, CRP-I</td></tr>
                        </table><?php */?>
								<?php } 
								?>
								<?php print '<div style="page-break-before: always;"></div>';
				}
			}
					?>
                    <?php /*?><table width="100%" style="margin-top:100px">
                    	<tr>
                        	<td>
                            	<table cellpadding="0" cellspacing="0" width="100%">
                                	<tr><td style="border-bottom: 5px solid #F9AAAA;"></td></tr>
                                    <tr><td style="border-bottom: 2px solid #F9AAAA; padding-top:2px"></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td style="padding-top:2px; padding-left:10px">Grade-<?php print $paper_paras_erqs[0]->para_grade_id-2;?>, <?php print $paper_paras_erqs[0]->subject_name_en;?>, CRP-I</td></tr>
                    </table><?php */?>
                </div>
				<!-- /.box-body -->
			</div>
            
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>