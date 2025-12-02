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
                	<div class="container" style="padding-top:25px">
						<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 30px;">
							<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_paras_erqs[0]->subject_name_en;?> - GRADE <?php print $paper_paras_erqs[0]->para_grade_id-2;?></div>
						</div>
						<div class="row form-group">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<?php /*?><table border="0" cellpadding="2" cellspacing="2" width="100%">
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
								</table><?php */?>
							</div>
						</div>
						<?php /*?><div class="row">
							<div class="col-lg-12 col-sm-12" style="border-bottom:#000 solid 1px"></div>
						</div><?php */?>
				<?php
					
				}?>
				</div>
                <div class="container" >
					<div style="font-size:30px; font-weight:bold; text-align:center">ANSWERS / RUBRICS</div>
                    <?php
							if(!empty($paper_paras_erqs)){
								$i = 0;
								$ar_value = 0;
								$ar_value = count($paper_paras_erqs);
								foreach($paper_paras_erqs as $paper_paras_erq){
									$j = 0;
									$ques = array('a','b','c','d','e','f','g','h','i','j');
									$i++;
									$max_val[] = $i;
									echo '<div style="font-size:30px; font-weight:bold">Para - '.$i.'</div>';
									
					?>
                    <table style="width:100%">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12" style="border-bottom: 3px dotted #000;">
                        </div>

                        <div class="col-lg-6 col-sm-12" style="border-bottom: 3px dotted #000;">                         
                        </div>
                     </div>
                    </table>
                    
                    <div class="container">
                    	<?php /*?><table style="width:100%">
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
				
			if($paper_paras_erq->para_text_ur!='') 
			{?>
                    <?php if($paper_paras_erq->para_img_position=='Top'&&$paper_paras_erq->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <tr>
                        <td colspan="2" style="text-align:right;" class="urdufont-right">
						<?php if($paper_paras_erq->para_img_position=='Left'&&$paper_paras_erq->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px; float:left"/> <?php }?>
							
						<?php echo html_entity_decode($paper_paras_erq->para_text_ur);?>
							
                        <?php if($paper_paras_erq->para_img_position=='Right'&&$paper_paras_erq->para_image!='') {?> <img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px; float:right"/> <?php }?> 
                    </tr>
                    <?php if($paper_paras_erq->para_img_position=='Bottom') {?><tr><td style="text-align:center"><img src="<?= base_url().$paper_paras_erq->para_image;?>" style="max-height:400px;"/></td></tr><?php }?>
                    <?php }?>
            </table><?php */?>
					   <?php
            
					
					if(isset($paper_paras_erq->para_item_21)&&$paper_paras_erq->para_item_21!=0)
					{
						$para_item_21 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_21);
						$para_item_21 = (isset($para_item_21[0])&&$para_item_21[0]!="")?$para_item_21[0]:"";
						if($para_item_21!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_21->item_rubric_image!='')
							{
if($para_item_21->item_rubric_urdu!=''&&$para_item_21->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_21->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_21->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_21->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_21->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_21->item_rubric_urdu==''&&$para_item_21->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_21->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_21->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_21->item_rubric_english);?></td>
    <?php if($para_item_21->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_21->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_21->item_rubric_urdu!=''&&$para_item_21->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_21->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_21->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_21->item_rubric_urdu);?></div></td>
    <?php if($para_item_21->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_21->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_21->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_21->item_rubric_urdu==''&&$para_item_21->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_21->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_21->item_rubric_urdu!=''&&$para_item_21->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_21->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_21->item_rubric_urdu!=''&&$para_item_21->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_21->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_21->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
						
					
					if(isset($paper_paras_erq->para_item_22)&&$paper_paras_erq->para_item_22!=0)
					{
						$para_item_22 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_22);
						$para_item_22 = (isset($para_item_22[0])&&$para_item_22[0]!="")?$para_item_22[0]:"";
						if($para_item_22!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_22->item_rubric_image!='')
							{
if($para_item_22->item_rubric_urdu!=''&&$para_item_22->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_22->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_22->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_22->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_22->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_22->item_rubric_urdu==''&&$para_item_22->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_22->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_22->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_22->item_rubric_english);?></td>
    <?php if($para_item_22->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_22->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_22->item_rubric_urdu!=''&&$para_item_22->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_22->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_22->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_22->item_rubric_urdu);?></div></td>
    <?php if($para_item_22->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_22->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_22->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_22->item_rubric_urdu==''&&$para_item_22->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_22->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_22->item_rubric_urdu!=''&&$para_item_22->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_22->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_22->item_rubric_urdu!=''&&$para_item_22->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_22->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_22->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
					
					if(isset($paper_paras_erq->para_item_23)&&$paper_paras_erq->para_item_23!=0)
					{
						$para_item_23 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_23);
						$para_item_23 = (isset($para_item_23[0])&&$para_item_23[0]!="")?$para_item_23[0]:"";
						if($para_item_23!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_23->item_rubric_image!='')
							{
if($para_item_23->item_rubric_urdu!=''&&$para_item_23->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_23->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_23->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_23->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_23->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_23->item_rubric_urdu==''&&$para_item_23->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_23->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_23->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_23->item_rubric_english);?></td>
    <?php if($para_item_23->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_23->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_23->item_rubric_urdu!=''&&$para_item_23->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_23->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_23->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_23->item_rubric_urdu);?></div></td>
    <?php if($para_item_23->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_23->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_23->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_23->item_rubric_urdu==''&&$para_item_23->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_23->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_23->item_rubric_urdu!=''&&$para_item_23->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_23->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_23->item_rubric_urdu!=''&&$para_item_23->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_23->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_23->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}	
							$j++;
						}
					}

					if(isset($paper_paras_erq->para_item_24)&&$paper_paras_erq->para_item_24!=0)
					{
						$para_item_24 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_24);
						$para_item_24 = (isset($para_item_24[0])&&$para_item_24[0]!="")?$para_item_24[0]:"";
						if($para_item_24!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_24->item_rubric_image!='')
							{
if($para_item_24->item_rubric_urdu!=''&&$para_item_24->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_24->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_24->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_24->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_24->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_24->item_rubric_urdu==''&&$para_item_24->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_24->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_24->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_24->item_rubric_english);?></td>
    <?php if($para_item_24->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_24->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_24->item_rubric_urdu!=''&&$para_item_24->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_24->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_24->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_24->item_rubric_urdu);?></div></td>
    <?php if($para_item_24->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_24->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_24->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_24->item_rubric_urdu==''&&$para_item_24->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_24->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_24->item_rubric_urdu!=''&&$para_item_24->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_24->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_24->item_rubric_urdu!=''&&$para_item_24->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_24->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_24->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
							
					if(isset($paper_paras_erq->para_item_25)&&$paper_paras_erq->para_item_25!=0)
					{
						$para_item_25 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_25);
						$para_item_25 = (isset($para_item_25[0])&&$para_item_25[0]!="")?$para_item_25[0]:"";
						if($para_item_25!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_25->item_rubric_image!='')
							{
if($para_item_25->item_rubric_urdu!=''&&$para_item_25->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_25->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_25->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_25->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_25->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_25->item_rubric_urdu==''&&$para_item_25->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_25->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_25->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_25->item_rubric_english);?></td>
    <?php if($para_item_25->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_25->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_25->item_rubric_urdu!=''&&$para_item_25->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_25->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_25->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_25->item_rubric_urdu);?></div></td>
    <?php if($para_item_25->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_25->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_25->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_25->item_rubric_urdu==''&&$para_item_25->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_25->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_25->item_rubric_urdu!=''&&$para_item_25->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_25->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_25->item_rubric_urdu!=''&&$para_item_25->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_25->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_25->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
					
					if(isset($paper_paras_erq->para_item_26)&&$paper_paras_erq->para_item_26!=0)
					{
						$para_item_26 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_26);
						$para_item_26 = (isset($para_item_26[0])&&$para_item_26[0]!="")?$para_item_26[0]:"";
						if($para_item_26!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_26->item_rubric_image!='')
							{
if($para_item_26->item_rubric_urdu!=''&&$para_item_26->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_26->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_26->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_26->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_26->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_26->item_rubric_urdu==''&&$para_item_26->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_26->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_26->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_26->item_rubric_english);?></td>
    <?php if($para_item_26->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_26->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_26->item_rubric_urdu!=''&&$para_item_26->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_26->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_26->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_26->item_rubric_urdu);?></div></td>
    <?php if($para_item_26->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_26->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_26->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_26->item_rubric_urdu==''&&$para_item_26->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_26->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_26->item_rubric_urdu!=''&&$para_item_26->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_26->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_26->item_rubric_urdu!=''&&$para_item_26->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_26->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_26->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
					
					if(isset($paper_paras_erq->para_item_27)&&$paper_paras_erq->para_item_27!=0)
					{
						$para_item_27 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_27);
						$para_item_27 = (isset($para_item_27[0])&&$para_item_27[0]!="")?$para_item_27[0]:"";
						if($para_item_27!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_27->item_rubric_image!='')
							{
if($para_item_27->item_rubric_urdu!=''&&$para_item_27->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_27->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_27->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_27->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_27->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_27->item_rubric_urdu==''&&$para_item_27->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_27->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_27->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_27->item_rubric_english);?></td>
    <?php if($para_item_27->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_27->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_27->item_rubric_urdu!=''&&$para_item_27->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_27->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_27->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_27->item_rubric_urdu);?></div></td>
    <?php if($para_item_27->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_27->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_27->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_27->item_rubric_urdu==''&&$para_item_27->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_27->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_27->item_rubric_urdu!=''&&$para_item_27->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_27->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_27->item_rubric_urdu!=''&&$para_item_27->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_27->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_27->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
					
					if(isset($paper_paras_erq->para_item_28)&&$paper_paras_erq->para_item_28!=0)
					{
						$para_item_28 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_28);
						$para_item_28 = (isset($para_item_28[0])&&$para_item_28[0]!="")?$para_item_28[0]:"";
						if($para_item_28!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_28->item_rubric_image!='')
							{
if($para_item_28->item_rubric_urdu!=''&&$para_item_28->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_28->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_28->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_28->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_28->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_28->item_rubric_urdu==''&&$para_item_28->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_28->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_28->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_28->item_rubric_english);?></td>
    <?php if($para_item_28->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_28->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_28->item_rubric_urdu!=''&&$para_item_28->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_28->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_28->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_28->item_rubric_urdu);?></div></td>
    <?php if($para_item_28->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_28->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_28->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_28->item_rubric_urdu==''&&$para_item_28->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_28->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_28->item_rubric_urdu!=''&&$para_item_28->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_28->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_28->item_rubric_urdu!=''&&$para_item_28->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_28->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_28->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
					
					if(isset($paper_paras_erq->para_item_29)&&$paper_paras_erq->para_item_29!=0)
					{
						$para_item_29 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_29);
						$para_item_29 = (isset($para_item_29[0])&&$para_item_29[0]!="")?$para_item_29[0]:"";
						if($para_item_29!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_29->item_rubric_image!='')
							{
if($para_item_29->item_rubric_urdu!=''&&$para_item_29->item_rubric_english!='')
{?>

<table style="width: 100%">
  <?php if($para_item_29->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <td style="width:50%"><?php echo html_entity_decode($para_item_29->item_rubric_english);?></td>
    <td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_29->item_rubric_urdu);?></td>
      </td>
  </tr>
  <?php if($para_item_29->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_29->item_rubric_urdu==''&&$para_item_29->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <?php if($para_item_29->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_29->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td><?php echo html_entity_decode($para_item_29->item_rubric_english);?></td>
    <?php if($para_item_29->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_29->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

elseif($para_item_29->item_rubric_urdu!=''&&$para_item_29->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <?php if($para_item_29->item_rubric_image_position=='Top'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
  <tr>
    <?php if($para_item_29->item_rubric_image_position=='Left'){?>
    <td width="50%"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_29->item_rubric_urdu);?></div></td>
    <?php if($para_item_29->item_rubric_image_position=='Right'){?>
    <td width="50%"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
    <?php }?>
  </tr>
  <?php if($para_item_29->item_rubric_image_position=='Bottom'){?>
  <tr>
    <td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
  <?php }?>
</table>
<?php }

else
{?>
<table width="100%">
  <tr>
    <td style="text-align:center"><img src="<?= base_url().$para_item_29->item_rubric_image;?>" style="max-width:100%;"/></td>
  </tr>
</table>
<?php }
							}
							else
							{
if($para_item_29->item_rubric_urdu==''&&$para_item_29->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_29->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_29->item_rubric_urdu!=''&&$para_item_29->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_29->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_29->item_rubric_urdu!=''&&$para_item_29->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_29->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_29->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}
					
					if(isset($paper_paras_erq->para_item_30)&&$paper_paras_erq->para_item_30!=0)
					{
						$para_item_30 = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_30);
						$para_item_30 = (isset($para_item_30[0])&&$para_item_30[0]!="")?$para_item_30[0]:"";
						if($para_item_30!="")
						{
							?><div style="font-size:24px; font-weight:bold"><?php print_r('Answer '.$ques[$j]);?> :- </div><?php
							if($para_item_30->item_rubric_image!='')
							{
								if($para_item_30->item_rubric_urdu!=''&&$para_item_30->item_rubric_english!='')
								{?>
								
								<table style="width: 100%">
								  <?php if($para_item_30->item_rubric_image_position=='Top'){?>
								  <tr>
									<td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
								  </tr>
								  <?php }?>
								  <tr>
									<td style="width:50%"><?php echo html_entity_decode($para_item_30->item_rubric_english);?></td>
									<td>
									<td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_30->item_rubric_urdu);?></td>
									  </td>
								  </tr>
								  <?php if($para_item_30->item_rubric_image_position=='Bottom'){?>
								  <tr>
									<td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
								  </tr>
								  <?php }?>
								</table>
								<?php }
								
								elseif($para_item_30->item_rubric_urdu==''&&$para_item_30->item_rubric_english!='')
								{?>
								<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
								<table width="100%" >
								  <?php if($para_item_30->item_rubric_image_position=='Top'){?>
								  <tr>
									<td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
								  </tr>
								  <?php }?>
								  <tr>
									<?php if($para_item_30->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
									<td><?php echo html_entity_decode($para_item_30->item_rubric_english);?></td>
									<?php if($para_item_30->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								  </tr>
								  <?php if($para_item_30->item_rubric_image_position=='Bottom'){?>
								  <tr>
									<td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
								  </tr>
								  <?php }?>
								</table>
								<?php }
								
								elseif($para_item_30->item_rubric_urdu!=''&&$para_item_30->item_rubric_english=='')
								{ ?>
								<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
								<table width="100%">
								  <?php if($para_item_30->item_rubric_image_position=='Top'){?>
								  <tr>
									<td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
								  </tr>
								  <?php }?>
								  <tr>
									<?php if($para_item_30->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
									<td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_30->item_rubric_urdu);?></div></td>
									<?php if($para_item_30->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								  </tr>
								  <?php if($para_item_30->item_rubric_image_position=='Bottom'){?>
								  <tr>
									<td colspan="3" style="text-align:center"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
								  </tr>
								  <?php }?>
								</table>
								<?php }
								
								else
								{?>
								<table width="100%">
								  <tr>
									<td style="text-align:center"><img src="<?= base_url().$para_item_30->item_rubric_image;?>" style="max-width:100%;"/></td>
								  </tr>
								</table>
								<?php }
							}
							else
							{
if($para_item_30->item_rubric_urdu==''&&$para_item_30->item_rubric_english!='')
{?>
<span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
<table width="100%" >
  <tr>
    <td><?php echo  html_entity_decode($para_item_30->item_rubric_english);?></td>
  </tr>
</table>
<?php 
}
elseif($para_item_30->item_rubric_urdu!=''&&$para_item_30->item_rubric_english=='')
{ ?>
<div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
<table width="100%">
  <tr>
    <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($para_item_30->item_rubric_urdu);?></div></td>
  </tr>
</table>
<?php }
//$para_item_30->item_rubric_urdu!=''&&$para_item_30->item_rubric_english!=''
else
{
?>
<table style="width:100%">
  <tr>
    <td style="width:50%; font-size:18px"><?php echo  html_entity_decode($para_item_30->item_rubric_english);?></td>
    <td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($para_item_30->item_rubric_urdu);?></td>
  </tr>
</table>
<?php 
}
							}
							$j++;
						}
					}?>
								
								<?php print '<div style="page-break-before: always;"></div>';
				}
			}
					?>
<div style="padding:0px; margin:0px auto">
  <div style="width: 471px; border: 3px solid #000; font-size: 20px; font-family: Times New Roman;">
    <?php 
		$crp_v = $this->uri->segment(5);
		$crp_s = $this->uri->segment(4);
		$file_name = 'Control_Files_Para_CRQs_P2/CRQ_'.$paper_paras_erqs[0]->subject_name_en.'_G'.($paper_paras_erqs[0]->para_grade_id-2).'_P2_ID'.$paper_paras_erqs[0]->para_subject_id.'.txt';
		$file_name2 = 'Control_Files_Para_CRQs_IDs_P2/CRQ_'.$paper_paras_erqs[0]->subject_name_en.'_G'.($paper_paras_erqs[0]->para_grade_id-2).'_P2_ID'.$paper_paras_erqs[0]->para_subject_id.'.txt';
		$contents = "";
		$contents2 = "";
		$nctr = 1;
		$nctrx = '';
		if(!empty($paper_paras_erqs))
		{
			$i = 0;
			//die('////////////////////********************-----------------------------');
			foreach($paper_paras_erqs as $paper_paras_erq)
			{
				if($paper_paras_erq->para_item_21!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_21);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_22!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_22);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_23!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_23);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_24!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_24);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_25!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_25);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_26!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_26);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_27!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_27);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_28!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_28);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_29!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_29);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				if($paper_paras_erq->para_item_30!=0)
				{
					$nctrx = str_pad($nctr, 2, '0', STR_PAD_LEFT);
					$nctr++;
					$erq_data = $this->Pilotpaper_model->get_item_by_id($paper_paras_erq->para_item_30);
					$erq_data = $erq_data[0];
					$contents.= "Item".$nctrx."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$contents2.= $erq_data->item_id."\t+\t".strtoupper($erq_data->item_total_marks+1)."\t1".$crp_v."\tY\tp".PHP_EOL;
					$nctrx++;
				}
				$i++;
			}
		}
		$fp = fopen($file_name, 'w');
		fwrite($fp, $contents);
		fclose($fp);
		
		$fpx = fopen($file_name2, 'w');
		fwrite($fpx, $contents2);
		fclose($fpx);
	?>
    <div style="clear: both;"></div>
  </div>
</div>
                </div>
				<!-- /.box-body -->
			</div>
            
		</div>
	</section>
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>