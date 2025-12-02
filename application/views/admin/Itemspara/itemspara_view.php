  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              View Items Paragraph </h3>
          </div>
          
        </div>
        <div class="card-body"> 

	   <!-- For Messages -->
	   <?php 
			//echo '<PRE>';
			//print_r($itemspara[0]);
			//die();
			$itemspara = $itemspara[0];	
			if(isset($para_item_21[0])){$para_item_21 = $para_item_21[0];}
			if(isset($para_item_22[0])){$para_item_22 = $para_item_22[0];}	
			if(isset($para_item_23[0])){$para_item_23 = $para_item_23[0];}	
			if(isset($para_item_24[0])){$para_item_24 = $para_item_24[0];}	
			if(isset($para_item_25[0])){$para_item_25 = $para_item_25[0];}	
			if(isset($para_item_26[0])){$para_item_26 = $para_item_26[0];}	
			if(isset($para_item_27[0])){$para_item_27 = $para_item_27[0];}	
			if(isset($para_item_28[0])){$para_item_28 = $para_item_28[0];}	
			if(isset($para_item_29[0])){$para_item_29 = $para_item_29[0];}	
			if(isset($para_item_30[0])){$para_item_30 = $para_item_30[0];}	
			//echo '<PRE>';
			//print_r($para_item_21);
			//die();			
			
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
			
            <div class="row">
              	<div class="col-lg-6 col-sm-12">                         
                   <label for="para_title_en" class="col-sm-12 control-label">Paragraph Instruction</label>
                   <input type="text" name="para_title_en" class="form-control" id="para_title_en"  value="<?php echo $itemspara->para_title_en; ?>" readonly="readonly" >
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="para_title_ur" class="control-label urdufont-right" style="float:right">پیرا گراف ہدایات *</label>
                    <input type="text" name="para_title_ur" class="form-control" id="para_title_ur"  dir="rtl" value="<?php echo $itemspara->para_title_ur; ?>" readonly="readonly" >
                </div>
             </div>
			
            
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!------------------------------------------Item Bank No.1 Starts Here----------------------------------------->            
            <div style="border:dotted; color:#000" >

<!--------------------Question No.1 START here------------------------------------->
<!-------------------------------------------------------------------------------->
            <table style="width:100%">
            <?php 
			if($itemspara->para_text_en!='') 
			{
				if($itemspara->para_img_position=='Top'&&$itemspara->para_image!="") 
				{ ?>
				<tr><td style="text-align:center"><img src="<?= base_url().$itemspara->para_image;?>" style="max-height:250px; max-width:250px; margin: 4px;"/></td></tr>
				<?php } ?>
                 
				<tr>
                        <td colspan="2" >
						<?php if($itemspara->para_img_position=='Left'&&$itemspara->para_image!='') {?> <img src="<?= base_url().$itemspara->para_image;?>" style="max-height:200px; float:left; margin: 4px;max-width:250px;"/> <?php }?> 
					
                        <?php if($itemspara->para_img_position=='Right'&&$itemspara->para_image!='') {?> <img src="<?= base_url().$itemspara->para_image;?>" style="max-height:250px; float:right; margin: 4px;max-width:250px;"/> <?php }?>
                        <?php echo html_entity_decode($itemspara->para_text_en);?>   
                    </tr>
                    
				<?php if($itemspara->para_img_position=='Bottom'&&$itemspara->para_image!='') {?><tr><td style="text-align:center"><img src="<?= base_url().$itemspara->para_image;?>" style="max-height:250px;margin: 4px;max-width:250px;"/></td></tr><?php }?>
                    
				
                    
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
		   <?php

		   if(isset($para_item_21)&&$para_item_21!=[])
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($para_item_21->item_image_position=='Top') 
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
?>
                    <tr>
                        <td colspan="2" style="font-weight:bold">Question No.1 :<?php echo html_entity_decode($para_item_21->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_21->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_21->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_21->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_21->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_21->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_21->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_21->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_21->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_21->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_21->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_21->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_21->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_21->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td ><table border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_21->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_21->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_21->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_21->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_21->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_21->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_21->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_21->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_21->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_21->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_21->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_22)&&$para_item_22!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.2 : <?php echo html_entity_decode($para_item_22->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_22->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_22->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_22->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_22->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_22->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_22->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_22->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_22->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_22->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_22->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_22->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_22->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_22->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td ><table border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_22->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_22->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_22->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_22->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_22->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_22->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_22->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_22->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_22->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_22->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_22->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_23)&&$para_item_23!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.3 :<?php echo html_entity_decode($para_item_23->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_23->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_23->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_23->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_23->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_23->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_23->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_23->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_23->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_23->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_23->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_23->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_23->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_23->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_23->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_23->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_23->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_23->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_23->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_23->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_23->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_23->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_23->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_23->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_23->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_24)&&$para_item_24!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.4 :<?php echo html_entity_decode($para_item_24->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_24->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_24->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_24->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_24->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_24->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_24->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_24->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_24->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_24->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_24->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_24->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_24->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_24->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_24->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_24->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_24->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_24->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_24->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_24->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_24->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_24->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_24->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_24->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_24->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_24->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_25)&&$para_item_25!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.5 :<?php echo html_entity_decode($para_item_25->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_25->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_25->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_25->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_25->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_25->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_25->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_25->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_25->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_25->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_25->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_25->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_25->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_25->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_25->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_25->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_25->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_25->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_25->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_25->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_25->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_25->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_25->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_25->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_25->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_26)&&$para_item_26!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.6 :<?php echo html_entity_decode($para_item_26->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_26->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_26->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_26->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_26->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_26->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_26->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_26->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_26->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_26->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_26->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_26->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_26->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_26->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_26->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_26->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_26->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_26->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_26->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_26->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_26->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_26->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_26->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_26->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_26->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_27)&&$para_item_27!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.7 :<?php echo html_entity_decode($para_item_27->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_27->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_27->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_27->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_27->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_27->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_27->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_27->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_27->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_27->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_27->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_27->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_27->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_27->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_27->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_27->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_27->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_27->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_27->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_27->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_27->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_27->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_27->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_27->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_27->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_28)&&$para_item_28!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.8 :<?php echo html_entity_decode($para_item_28->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_28->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_28->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_28->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_28->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_28->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_28->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_28->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_28->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_28->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_28->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_28->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_28->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_28->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_28->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_28->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_28->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_28->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_28->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_28->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_28->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_28->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_28->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_28->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_28->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_29)&&$para_item_29!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.9 :<?php echo html_entity_decode($para_item_29->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_29->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_29->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_29->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_29->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_29->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_29->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_29->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_29->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_29->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_29->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_29->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_29->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_29->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_29->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_29->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_29->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_29->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_29->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_29->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_29->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_29->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_29->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_29->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_29->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   
		   if(isset($para_item_30)&&$para_item_30!=[])
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
                        <td colspan="2" style="font-weight:bold">Question No.10 :<?php echo html_entity_decode($para_item_30->item_stem_en);?>
                        <?php if($this->session->userdata('role_id')==3){?>
                        <?php if ($para_item_30->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$para_item_30->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_30->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$para_item_30->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==2){?>
                        <?php if ($para_item_30->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$para_item_30->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_30->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$para_item_30->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?>
                        <?php if($this->session->userdata('role_id')==4){?>
                        <?php if ($para_item_30->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$para_item_30->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php if ($para_item_30->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ae_view_erq_crq/'.$para_item_30->item_id); ?> target="_blank">View Item</a><?php }?>
                        <?php }?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> <?php echo html_entity_decode($para_item_30->item_stem_ur);?> </td>
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
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" ><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
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
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($para_item_30->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_30->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$para_item_30->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$para_item_30->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
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
                    </table>
                    </td>
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
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
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($para_item_30->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:125px">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($para_item_30->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($para_item_30->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($para_item_30->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($para_item_30->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($para_item_30->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$para_item_30->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
?>               
              </table>           
             <?php  
		   }
		   ?>
			</div>
          <!-- /.box-body -->
          <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
        	<div class="row form-group">
                <label for="para_statistics" class="col-sm-12 control-label">Para Statistics *</label>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:10px">
                  <tr>
                    <td> <?php echo $itemspara->para_statistics; ?></td>
                  </tr>
                </table>
            </div>
            <div class="row form-group">
                <label for="para_ordering" class="col-sm-12 control-label">Para Ordering *</label>
                <span style="padding-left:15px;"><?php echo $itemspara->para_ordering; ?></span>
            </div>
            
             <?php if($itemspara->para_status_ss == 1 || $itemspara->para_status_ss == 2 || $itemspara->para_status_ss == 3) { ?> 
                <div style="padding-top:15px; margin-left:5px">
                    <label for="" class="col-sm-12 control-label">Subject Specialist Comments <?php if($itemspara->para_status_ss ==1){ echo '(Rejected)'; } elseif($itemspara->para_status_ss ==2){ echo '(Accepted with Change)'; }elseif($itemspara->para_status_ss ==3){ echo '(Accepted without change)'; } ?> on <?php echo $itemspara->para_approved;?></label>
                <textarea id="" name="" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $itemspara->para_comment_ss; ?></textarea>
                </div>
                <?php if($itemspara->para_comment_ae !=""){?>
                <div style="padding:10px 0px 10px 4px;">
                        <label for="" class="col-sm-6 control-label">Assessment Expert Comments <?php if($itemspara->para_status_ae ==1){ echo '(Approved)'; } elseif($itemspara->para_status_ae ==2){ echo '(Rejected)'; } ?> on <?php echo $itemspara->para_reviewed;?></label>
                        <textarea id="" name="" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $itemspara->para_comment_ae; ?></textarea>
                    </div>
                <?php }?>
                <?php if($itemspara->para_comment_psy !=""){?>
                    <div style="padding:10px 0px 10px 4px;">
                        <label for="" class="col-sm-6 control-label">Psychometrician Comments <?php if($itemspara->para_status_psy ==1){ echo '(Reviewed)'; } elseif($itemspara->para_status_psy ==2){ echo '(Rejected)'; } ?> on <?php echo $itemspara->para_date_psy;?></label>
                        <textarea id="" name="" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $itemspara->para_comment_psy; ?></textarea>
                    </div>
                 <?php }?>
             <?php }?> 
            <?php if($itemspara->para_status==1){?>
            <div style="padding:15px 0px; float:right"><a href="<?= base_url('admin/Itemspara/submitpara_for_approval/'.$itemspara->para_id); ?>" class="btn btn-success"> Submit For Approval</a></div>
            <?php }?>
        </div>
      </div>
    </section> 
  </div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>