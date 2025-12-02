  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              View Item Paragraph </h3>
          </div>
        </div>
        <div class="card-body"> 
	   <!-- For Messages -->
	   <?php 
			$itemspara = $itemspara[0];	
			//print_r($itemspara);
			
			$this->load->view('admin/includes/_messages.php') ?>
            
			<div class="row form-group">
              	<div class="col-lg-6 col-sm-12">                         
                   <label for="para_grade_id" class="col-sm-12 control-label">Grade</label>
                   <input type="text" name="para_grade_id" class="form-control" id="para_grade_id"  value="<?php echo $itemspara->grade_name_en; ?>" readonly="readonly" >
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="para_subject_id" class="col-sm-12 control-label">Subject</label>
                    <input type="text" name="para_subject_id" class="form-control" id="para_subject_id"  value="<?php echo $itemspara->subject_name_en; ?>" readonly="readonly" >
                </div>
             </div>
			<div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!------------------------------------------Item Bank No.1 Starts Here----------------------------------------->            
            <div style="border:dotted; color:#000" >

<!--------------------Question No.1 START here------------------------------------->
<!-------------------------------------------------------------------------------->
			<div class="content-block">
            <div class="row" >
              	<?php if($itemspara->para_title_en!=""){?>
                <div style="width: 100%">                         
                  <div style="font-weight:bold">Paragraph Instruction</div>
                  <div style="font-weight:bold"><?php echo $itemspara->para_title_en; ?></div>
                </div>
                <?php }?>
                <?php if($itemspara->para_title_ur!=""){?>
				<div class="urdufont-right" style="text-align:right; width: 100%;" >                         
                    <div >پیرا گراف ہدایات *</div>
                    <?php echo $itemspara->para_title_ur; ?>
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
			
			if($itemspara->para_text_en!='') 
			{
				if($itemspara->para_img_position=='Top'&&$itemspara->para_image!="") 
				{ ?>
				<tr><td style="text-align:center"><img src="<?= base_url().$itemspara->para_image;?>" style="max-height:100px; max-width:100px; margin: 4px;"/></td></tr>
				<?php } ?>
                 
				<tr>
                        <td colspan="2" >
						<?php if($itemspara->para_img_position=='Left'&&$itemspara->para_image!='') {?> <img src="<?= base_url().$itemspara->para_image;?>" style="max-height:100px; float:left; margin: 4px;max-width:100px;"/> <?php }?> 
					
                        <?php if($itemspara->para_img_position=='Right'&&$itemspara->para_image!='') {?> <img src="<?= base_url().$itemspara->para_image;?>" style="max-height:100px; float:right; margin: 4px;max-width:100px;"/> <?php }?>
                        <?php echo html_entity_decode($itemspara->para_text_en);?>   
					</tr>
                    
				<?php if($itemspara->para_img_position=='Bottom'&&$itemspara->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$itemspara->para_image;?>" style="max-height:100px;margin: 4px;max-width:100px;"/></td></tr><?php }?>
                    
				
                    
             <?php 
			} 
				
				if($itemspara->para_text_ur!='') {?>
                    <?php if($itemspara->para_img_position=='Top'&&$itemspara->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$itemspara->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <tr>
                        <td colspan="2" style="text-align:right;" class="urdufont-right">
						<?php if($itemspara->para_img_position=='Left'&&$itemspara->para_image!='') {?> <img src="<?= base_url().$itemspara->para_image;?>" style="max-height:400px; float:left"/> <?php }?>
							
						<?php echo html_entity_decode($itemspara->para_text_ur);?>
                        	
                        <?php if($itemspara->para_img_position=='Right'&&$itemspara->para_image!='') {?> <img src="<?= base_url().$itemspara->para_image;?>" style="max-height:400px; float:right"/> <?php }?> 
                    </tr>
                    <?php if($itemspara->para_img_position=='Bottom') {?><tr><td style="text-align:center"><img src="<?= base_url().$itemspara->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <?php }?>
            </table>
					</div>
				</div>					
					<div class="row" >
					   <?php
            
					/*
					if(isset($itemspara->para_item_21)&&$itemspara->para_item_21!=0)
					{
						$para_item_21 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_21);
						$para_item_21 = (isset($para_item_21[0])&&$para_item_21[0]!="")?$para_item_21[0]:"";
						if($para_item_21!="")
						{ 
						?>
						<table class="content-block" width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_21->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_21->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
						
					if(isset($itemspara->para_item_22)&&$itemspara->para_item_22!=0)
					{
						$para_item_22 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_22);
						$para_item_22 = (isset($para_item_22[0])&&$para_item_22[0]!="")?$para_item_22[0]:"";
						if($para_item_22!="")
						{ 
						?>
						<table class="content-block" width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_22->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_22->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
					
					if(isset($itemspara->para_item_23)&&$itemspara->para_item_23!=0)
					{
						$para_item_23 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_23);
						$para_item_23 = (isset($para_item_23[0])&&$para_item_23[0]!="")?$para_item_23[0]:"";
						if($para_item_23!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_23->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_23->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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

					if(isset($itemspara->para_item_24)&&$itemspara->para_item_24!=0)
					{
						$para_item_24 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_24);
						$para_item_24 = (isset($para_item_24[0])&&$para_item_24[0]!="")?$para_item_24[0]:"";
						if($para_item_24!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_24->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_24->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
							
					if(isset($itemspara->para_item_25)&&$itemspara->para_item_25!=0)
					{
						$para_item_25 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_25);
						$para_item_25 = (isset($para_item_25[0])&&$para_item_25[0]!="")?$para_item_25[0]:"";
						if($para_item_25!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_25->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_25->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
					
					if(isset($itemspara->para_item_26)&&$itemspara->para_item_26!=0)
					{
						$para_item_26 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_26);
						$para_item_26 = (isset($para_item_26[0])&&$para_item_26[0]!="")?$para_item_26[0]:"";
						if($para_item_26!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_26->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_26->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
					
					if(isset($itemspara->para_item_27)&&$itemspara->para_item_27!=0)
					{
						$para_item_27 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_27);
						$para_item_27 = (isset($para_item_27[0])&&$para_item_27[0]!="")?$para_item_27[0]:"";
						if($para_item_27!="")
						{
						?>
						<table class="content-block" width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_27->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_27->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
					
					if(isset($itemspara->para_item_28)&&$itemspara->para_item_28!=0)
					{
						$para_item_28 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_28);
						$para_item_28 = (isset($para_item_28[0])&&$para_item_28[0]!="")?$para_item_28[0]:"";
						if($para_item_28!="")
						{
						?>
						<table width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_28->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_28->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?>:</a><?php }?>
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
					
					if(isset($itemspara->para_item_29)&&$itemspara->para_item_29!=0)
					{
						$para_item_29 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_29);
						$para_item_29 = (isset($para_item_29[0])&&$para_item_29[0]!="")?$para_item_29[0]:"";
						if($para_item_29!="")
						{
						?>
						<table width="100%" style="margin-top:5px;" >
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
							   <?php if($para_item_29->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_29->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
					
					if(isset($itemspara->para_item_30)&&$itemspara->para_item_30!=0)
					{
						$para_item_30 = $this->Pilotpaper_model->get_item_by_id($itemspara->para_item_30);
						$para_item_30 = (isset($para_item_30[0])&&$para_item_30[0]!="")?$para_item_30[0]:"";
						if($para_item_30!="")
						{
						?>
						<table width="100%" style="margin-top:5px;" >
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
							  <?php if($para_item_30->item_stem_en!=""){?><a href=<?php echo base_url('admin/pilot_items/pilot_view_combine_erq_crq/'.$para_item_30->item_id); ?> target="_blank">Question No.<?php print ++$ctr;?> :</a><?php }?>
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
					}*/
				?>
				</div>
			</div>
        </div>
      </div>
    </section> 
  </div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script type="text/javascript" language="javascript">
(function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
	

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('para_comment_ss', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		  height: 120,
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
</script>