<!-- Content Wrapper. Contains page content -->
<style>
.border-bottom{
	border-bottom: 1px solid #666666 !important;
}
.borders{
	border-width:1px;
	border-style:solid;
	border-color:#666;
	border-radius: 10px;
}
</style>
  <div class="content-wrapper">
   <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; View Item </h3>
          </div>
          <div class="d-inline-block float-right">
          <?php $item = $items[0];
		  //print_r($item);
		  	$ssinfo = (isset($ssinfo[0]))?$ssinfo[0]:"";	   
			$aeinfo = (isset($aeinfo[0]))?$aeinfo[0]:"";
			$psyinfo = (isset($psyinfo[0]))?$psyinfo[0]:"";
		?>		  
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php'); 
			//echo '<PRE>';
			//print_r($item);
			//die();?>
						
			<!---- start here is item view filmzy --->
			
<div class="container" style="padding-top:25px">
  <div class="row">
  	<div class="col-8">
    	<div class="row col-12">
        	<div class="col-4">
              <div> <img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" width="110" height="130" /></div>
            </div>
            <div class="col-8">
              <div class="col-12" style="font-size:36px; font-weight:bold; text-align:center;">Punjab Education Curriculum Training and Assessment Authority [PECTAA]</div>
              <div class="col-12" style="font-size:30px; text-align:center; margin-top:1%">Wahdat Colony Road, Lahore</div>
            </div>
        </div>
        <div class="row col-12">
        	<div class="col-12" style="padding-left:40px; padding-top:10px">
                <div class="col-12" style="font-weight:bold;">
                    <table width="100%" class="border-bottom"><tr><td width="35%">Date Received : </td><td><?php echo date("d-M-Y (h:i a)",strtotime($item->item_date_received));?></td></tr></table>
                </div>
                <div class="col-lg-12 col-sm-12" style="font-weight:bold">
                    <table width="100%" class="border-bottom"><tr><td width="35%">Item Writer Name : </td><td><?php echo $iwinfo[0]['firstname'].' '.$iwinfo[0]['lastname'].'('.$iwinfo[0]['username'].')';?></td></tr></table>
                </div>
                <div class="col-lg-12 col-sm-12" style="font-weight:bold">
                    <table width="100%" class="border-bottom"><tr><td width="35%">Registration No. : </td><td>PEC-<?php echo $item->item_submittedby;?></td></tr></table>
                </div>
        	</div>
        </div>
    </div>
    <div class="col-4" >
      <div class="col-12" style="alignment-adjust:central">
        <table border="1px" bordercolor="#000000" width="100%" style="float:right; font-weight:bold; font-size:14px;" cellpadding="7px" >
          <tr>
            <td colspan="4" style="text-align:center">For official Use Only</td>
          </tr>
          <tr>
            <td colspan="4" style="text-align:center">Item Code:&emsp; <?php echo $item->item_code;?></td>
          </tr>
          <tr>
            <td colspan="4" style="text-align:center">Item Statistics:</td>
          </tr>
          <tr>
            <td style="text-align:center" width="25%" style="font-size:36px">*	</td>
            <td style="text-align:center" width="25%">Difficulty</td>
            <td style="text-align:center" width="25%">Disc</td>
            <td style="text-align:center" width="25%">DIF</td>
          </tr>
          <tr>
          	<td style="text-align:center">Proposed</td>
            <td style="text-align:center"><?php echo $item->item_difficulty;?></td>
            <td style="text-align:center"><?php echo $item->item_discr;?></td>
            <td style="text-align:center"><?php echo $item->item_dif_code;?></td>
          </tr>
          <tr>
            <td style="text-align:center" width="25%" style="font-size:36px">*	</td>
            <td style="text-align:center" width="25%">P Values</td>
            <td style="text-align:center" width="25%">RBIS</td>
            <td style="text-align:center" width="25%">Graphs</td>
          </tr>
          <tr>
          	<td style="text-align:center">Actual</td>
            <td style="text-align:center"><?php echo $item->item_p_value;?></td>
            <td style="text-align:center"><?php echo $item->item_rbis_value;?></td>
            <td style="text-align:center"><?php if($item->item_type=='MCQ'){?><a href="<?= base_url('admin/pilot_items/pilot_item_stats/'. $item->item_id); ?>" data-toggle="modal" data-target="#headingModal" data-id="<?php echo $item->item_id; ?>"><i class="fa fa-bar-chart-o"></i> Stats</a><?php } else {echo 'Only for MCQs';}?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row" style="font-size:14px;"> 
  <table border="1px" bordercolor="#000000" width="100%" style="margin-top:25px; text-align:center; font-weight:bold;">
  	<tr style="font-weight:bold">
    	<td rowspan="2" colspan="3">Subject</td>
        <td rowspan="2">Grade</td>
        <td colspan="3">PCTB Textbook</td>
        <td colspan="4">Other Source</td>
    </tr>
    <tr style="font-weight:bold">
    	<td colspan="2">Chapter</td>
        <td>Page</td>
        <td>Title</td>
        <td>Year</td>
        <td colspan="2">Page</td>
    </tr>
    <tr>
    	<td colspan="3"><?php echo $item->subject_name_en;?></td>
        <td><?php echo $item->grade_name_en;?></td>
        <td colspan="2"><?php echo $item->item_pctb_chapter;?></td>
        <td><?php echo $item->item_pctb_page;?></td>
        <td><?php echo $item->item_other_title;?></td>
        <td><?php echo $item->item_other_year	;?></td>
        <td colspan="2"><?php echo $item->item_other_page;?></td>
    </tr>
    <tr>
    	<td colspan="3"><?php 	if($item->item_curriculum=='1'){echo '2006(ALP)';}
								elseif($item->item_curriculum=='2'){echo 'National Curriculum (2006)';}
								else{ echo 'Single National Curriculum(SNC) 2020';}?></td>
        <td>SLO # <?php echo $item->slo_number;?></td>
        <td rowspan="2" colspan="6">SLO text: <?php echo $item->slo_statement_en;?><span class="urdufont-right" style="font-size:20px;" ><?php echo $item->slo_statement_ur;?></span></td>
    </tr>
    <tr>
    	<td colspan="3">Content Strand:</td>
        <td><?php echo $item->cs_statement_en?><span class="urdufont-right"><?php echo $item->cs_statement_ur;?></span></td>
    </tr>
    <tr>
    	<td colspan="4"><?php echo $item->item_cognitive_bloom;?><br />(Please tick one)</td>
        <td colspan="4">Relation to Textbook<br />(Please tick one)</td>
        <td rowspan="2">Key</td>
        <td rowspan="2">Type of<br />Question</td>
    </tr>
	<tr>
    	<td colspan="4">
        	<table width="100%">
              <tr>
                <td style="border-right: 1px solid black; width:16%">K</td>
                <td style="border-right: 1px solid black; width:16%">C</td>
                <td style="border-right: 1px solid black; width:18%">App</td>
                <td style="border-right: 1px solid black; width:17%">An</td>
                <td style="border-right: 1px solid black; width:17%">Sy</td>
                <td style="width:16%">Ey</td>
              </tr>
            </table>
        </td>
		<?php /*?><td>K</td>
        <td>C</td>
    	<td>App</td>
        <td>An</td>
    	<td>Sy</td>	
        <td>Ey</td><?php */?>
    	<td colspan="2">Direct Quote</td>
        <td colspan="2">Amended</td>
    </tr>
    <tr>
    	<td colspan="4">
        	<table width="100%">
              <tr>
                <td style="border-right: 1px solid black; width:16%"><?php if ($item->item_cognitive_bloom == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
                <td style="border-right: 1px solid black; width:16%"><?php if ($item->item_cognitive_bloom == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
                <td style="border-right: 1px solid black; width:18%"><?php if ($item->item_cognitive_bloom == 'Application') {echo 'Yes';}else{echo '---';}?></td>
                <td style="border-right: 1px solid black; width:17%"><?php if ($item->item_cognitive_bloom == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
                <td style="border-right: 1px solid black; width:17%"><?php if ($item->item_cognitive_bloom == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
                <td style="width:16%"><?php if ($item->item_cognitive_bloom == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td>
              </tr>
            </table>
        </td>
		<?php /*?><td><?php if ($item->item_cognitive_bloom == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_cognitive_bloom == 'Application') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_cognitive_bloom == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td><?php */?>
    	<td colspan="2"><?php if ($item->item_relation=='Direct Quote') {echo 'Yes';}else{echo '---';}?></td>
        <td colspan="2"><?php if ($item->item_relation=='Amended'){echo 'Yes';} else{echo '---';}?></td>
    	<td><?php echo $item->item_option_correct;?></td>
        <td><?php echo $item->item_type;?></td>
       	<?php /*?> <td><?php if ($item->item_type=='ERQ'){echo 'Yes';} else{echo '---';}?></td><?php */?>
    </tr>
  </table>
  </div>
  <div class="row" style="padding:02px;" >
	  
	   <?php
		   if(isset($item->item_id)&&$item->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" > 
				   
			<?php 
            if ($item->item_image_position=='Full_Page') 
            {
				if($item->item_image_en!="" && $item->item_image_ur==""){?>
                <div class="row">
                    <div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="row" style="margin-top:15px"><img src="<?= base_url().$item->item_image_en;?>" style="max-width:100%; text-align:center"/></div>
                </div>
			<?php } elseif($item->item_image_en=="" && $item->item_image_ur!="") {?>
            	<div class="row">
                    <div class="row urdufont-right" style="font-weight:bold; font-size:20px"> سوال :&nbsp;</div>
                    <div class="row" style="margin-top:15px"><img src="<?= base_url().$item->item_image_ur;?>" style="max-width:100%; text-align:center"/></div>
                </div>
			<?php } else 
					{?>
						<div class="row">
                    	<div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="row urdufont-right" style="font-weight:bold; font-size:26px"> سوال :&nbsp;</div>
                    	<div class="row" style="margin-top:15px"><img src="<?= base_url().$item->item_image_en;?>" style="max-width:100%; text-align:center"/></div>
                		</div>
			<?php	}
			}
            else
            {
				 if ($item->item_image_position=='Top') 
					{
						if($item->item_image_en!="" && $item->item_image_ur!="") 
						{
							?>
							 <tr>
								<td><img src="<?= base_url().$item->item_image_en;?>" style="max-width:90%;"/></td>
								<td style="float:right; text-align:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-width:90%;"/></td>
							  </tr>
							<?php 
						}
						elseif($item->item_image_en!=""&&$item->item_image_ur=="")
						{
						?>
							 <tr>
								<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-width:90%;" /></td>          	
							  </tr>
							<?php 	
						}
						elseif($item->item_image_en==""&&$item->item_image_ur!="")
						{
						?>
							 <tr>
								<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-width:90%;"/></td>          	
							  </tr>
							<?php 	
						}
					}
                ?>
                    <?php if ($item->item_stem_en!=""){?>
                    <tr><td colspan="2" >
					<?php if($item->item_image_position=='Left' && $item->item_image_en!="")
					{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px; float:left"/> <?php }?>
                    <span style="font-weight:bold; font-size:20px"> Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo html_entity_decode($item->item_stem_en);?></span>
					<?php if($item->item_image_position=='Right' && $item->item_image_en!="")
					{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px; float:right"/> <?php }?>
                    </td></tr>
                    <?php }?>
                    
                    <?php if ($item->item_stem_ur!=""){?>
                     <tr><td colspan="2" class="urdufont-right" style="text-align:right">
                    <?php if($item->item_image_position=='Left' && $item->item_image_ur!="")
					{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px; float:left"/> <?php }?>
                    سوال :&nbsp;<?php echo html_entity_decode($item->item_stem_ur);?>
                    <?php if($item->item_image_position=='Right' && $item->item_image_ur!="")
					{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px; float:right"/> <?php }?>
                    </td></tr>
                    <?php }?>
                    
				<?php if ($item->item_image_position=='Bottom') 
                {
                    if($item->item_image_en!="" && $item->item_image_ur!="") 
                    {
                        ?>
                         <tr>
                            <td><img src="<?= base_url().$item->item_image_en;?>" style="max-width:100%;"/></td>
                            <td style="float:right"><img src="<?= base_url().$item->item_image_ur;?>" style="max-width:100%;"/></td>
                          </tr>
                        <?php 
                    }
                    elseif($item->item_image_en!=""&&$item->item_image_ur=="")
                    {
                    ?>
                         <tr>
                            <td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-width:100%;" /></td>          	
                          </tr>
                        <?php 	
                    }
                    elseif($item->item_image_en==""&&$item->item_image_ur!="")
                    {
                    ?>
                         <tr>
                            <td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-width:100%;"/></td>          	
                          </tr>
                        <?php 	
                    }
                }
			}
				
    	if($item->item_type=='MCQ')
		{	
			if($item->item_option_layout=='1')
            {
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td style="font-size:20px">(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
    <td style="padding-left:50px"><div class="urdufont-right" ><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td style="font-size:20px">(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
    <td style="padding-left:50px"><div class="urdufont-right" ><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td style="font-size:20px">(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
    <td style="padding-left:50px"><div class="urdufont-right" ><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td style="font-size:20px">(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
    <td style="padding-left:50px"><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
			elseif($item->item_option_layout=='2')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
    <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='3')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='4')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='5')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='6')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:15px">
                      <tr>
                      <td width="25%">
                          <table border="0" cellspacing="2" cellpadding="2">
                          <tr>
                            <td>(a) <span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-width:175px;"/></span></td>
                          </tr>
                          </table>
                      </td>
                      <td width="25%">
                          <table border="0" cellspacing="2" cellpadding="2">
                          <tr>
                            <td>(b) <span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-width:175px;"/></span></td>
                          </tr>
                          </table>
                      </td>
                      <td width="25%">
                          <table border="0" cellspacing="2" cellpadding="2">
                          <tr>
                            <td>(c) <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-width:175px;"/></span></td>
                          </tr>
                          </table>
                      </td>
                      <td width="25%">
                          <table border="0" cellspacing="2" cellpadding="2">
                          <tr>
                            <td>(d) <span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-width:175px;"/></span></td>
                          </tr>
                          </table>
                      </td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='7')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $item->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='8')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='9')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$item->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$item->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$item->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='10')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='11')
			{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
			elseif($item->item_option_layout=='12')
			{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($item->item_option_a_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_a_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($item->item_option_b_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_b_ur);?></div></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($item->item_option_c_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_c_ur);?></div></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($item->item_option_d_en);?></span></td>
                        <td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($item->item_option_d_ur);?></div></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
		}
		elseif($item->item_type=='ERQ')
		{
			if($item->item_rubric_image!='')
			{
				  if($item->item_rubric_urdu!=''&&$item->item_rubric_english!='')
				  {?>
					  <table style="width: 100%">
                      	<?php if($item->item_rubric_image_position=='Top'){?>
                        <tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
                        <?php }?>
                        <tr>
							<td style="width:50%">
								<?php echo html_entity_decode($item->item_rubric_english);?>
							</td>
							<td class="urdufont-right" style="text-align:right">
								<?php echo html_entity_decode($item->item_rubric_urdu);?>
							</td>
						</tr>
                        <?php if($item->item_rubric_image_position=='Bottom'){?>
                        <tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
                        <?php }?>
                      </table>
				  <?php }
				  
				  elseif($item->item_rubric_urdu==''&&$item->item_rubric_english!='')
				  {?>
                      <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
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
                        <td style="text-align:right"><span class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></span></td>
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
                      <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
                      <table width="100%" ><tr><td><?php echo  html_entity_decode($item->item_rubric_english);?></td></tr></table>
              <?php 
				  }
				  elseif($item->item_rubric_urdu!=''&&$item->item_rubric_english=='')
				  { ?>
                  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
                  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></span></td></tr></table>
              <?php }
				  else
				  {
					  ?>
					  <table style="width:100%">
                      	<tr>
							<td style="width:50%; font-size:18px">
								<?php echo  html_entity_decode($item->item_rubric_english);?>
							</td>
							<td class="urdufont-right" style="text-align:right">
								<?php echo html_entity_decode($item->item_rubric_urdu);?>
							</td>
						  </tr>
                      </table>
				  <?php 
				  }
			  }
			if($this->session->userdata('role_id') == 2){ if($item->item_type=='ERQ' && $item->item_awards_file!=''){?>
            <a href="<?php echo base_url($item->item_awards_file) ?>" >Download Award File</a>
            <?php }
			  }
		}
		elseif($item->item_type=='FIB')
		{
			 if($item->item_fib_key_ur==''&&$item->item_fib_key_eng!='')
			  {?>
				  <table style="margin:20px 0px 0px 50px"><tr ><td style="font-size:16px; font-weight:bold;">Key (English) :</td><td><?php echo  html_entity_decode($item->item_fib_key_eng);?></td></tr></table>
			 	  <?php 
                  }
                  elseif($item->item_fib_key_ur!=''&&$item->item_fib_key_eng=='')
                  { ?>
                  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">جواب (اردو) :</div>
                  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right"><?php echo html_entity_decode($item->item_fib_key_ur);?></span></td></tr></table>
              <?php }
                  else
                  {
                      ?>
                      <table style="width:100%">
                        <tr>
                            <td style="width:50%; font-size:18px" >
                                Answer &nbsp;&nbsp;: <?php echo '&nbsp;'. html_entity_decode($item->item_fib_key_eng);?>
                            </td>
                            <td class="urdufont-right" style="text-align:right"> &nbsp;&nbsp;جواب  &nbsp;&nbsp;: &nbsp;&nbsp;
                                <?php echo html_entity_decode($item->item_fib_key_ur);?>
                            </td>
                          </tr>
                      </table>
                  <?php 
			  }
		}
		elseif($item->item_type=='TF')
		{
		  ?>
              <table width="30%" style="margin:10px 50px 10px 50px">
              	<tr><td>Options :</td></tr>
                <tr>
                	<td style="padding-left:25px">a. <?php echo  html_entity_decode($item->item_tf_eng_1);?></td>
                    <td><div class="col-6 urdufont-right"><?php echo  html_entity_decode($item->item_tf_ur_1);?></div></td>
                </tr>
                <tr>
                	<td style="padding-left:25px">b. <?php echo  html_entity_decode($item->item_tf_eng_2);?></td>
                    <td><div class="col-6 urdufont-right"><?php echo  html_entity_decode($item->item_tf_ur_2);?></div></td>
                </tr>
                <?php /*?><tr><td>Answer Key :</td><td><?php echo $item->item_option_correct;?> </td></tr><?php */?>
              </table>
          <?php 
		}
		elseif($item->item_type=='MC')
		{?>
        	<table width="100%">
            	<tr>
                	<td><div class="row">
                      <div class="col-5 ">
                        <div class="row" style="margin-bottom:10px">
                          <div class="col-12">
                            <h3>Column-I</h3>
                          </div>
                        </div>
                        <div class="row col-12 borders" style="padding-bottom:8px">
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                          	<?php 
							if($item->item_pic_mc1_1!="")
							{
                            	if($item->item_en_mc1_1!="" && $item->item_ur_mc1_1!="")
								{?>
                                    <div class="col-4">1 - <?php echo html_entity_decode($item->item_en_mc1_1);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_1=="" && $item->item_ur_mc1_1!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_1!="" && $item->item_ur_mc1_1=="")
								{?>
                                    <div class="col-6">1 - <?php echo html_entity_decode($item->item_en_mc1_1);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_1!="" && $item->item_ur_mc1_1!="")
								{?>
                                    <div class="col-6">1 - <?php echo html_entity_decode($item->item_en_mc1_1);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div><?php 
								}
								elseif($item->item_en_mc1_1=="" && $item->item_ur_mc1_1!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div><?php 
								}
								elseif($item->item_en_mc1_1!="" && $item->item_ur_mc1_1=="")
								{?>
                                    <div class="col-12">1 - <?php echo html_entity_decode($item->item_en_mc1_1);?></div><?php
								}
							}
							?>
                           <?php /*?><div class="col-4"><?php if($item->item_en_mc1_1!=""){echo "1 - ".html_entity_decode($item->item_en_mc1_1);}?></div>
                            <?php if($item->item_pic_mc1_1!=""){?>
                                <div class="col-4 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div>
                                <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            	<div class="col-8 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div>
                            <?php }?><?php */?>
                          </div>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                           <?php 
							if($item->item_pic_mc1_2!="")
							{
                            	if($item->item_en_mc1_2!="" && $item->item_ur_mc1_2!="")
								{?>
                                    <div class="col-4">1 - <?php echo html_entity_decode($item->item_en_mc1_2);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_2=="" && $item->item_ur_mc1_2!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_2!="" && $item->item_ur_mc1_2=="")
								{?>
                                    <div class="col-6">2 - <?php echo html_entity_decode($item->item_en_mc1_2);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_2!="" && $item->item_ur_mc1_2!="")
								{?>
                                    <div class="col-6">2 - <?php echo html_entity_decode($item->item_en_mc1_2);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div><?php 
								}
								elseif($item->item_en_mc1_2=="" && $item->item_ur_mc1_2!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div><?php 
								}
								elseif($item->item_en_mc1_2!="" && $item->item_ur_mc1_2=="")
								{?>
                                    <div class="col-12">2 - <?php echo html_entity_decode($item->item_en_mc1_2);?></div><?php
								}
							}
							?>
                           <?php /*?><div class="col-4"><?php if($item->item_en_mc1_2!=""){echo "2 - ".html_entity_decode($item->item_en_mc1_2);}?></div>
                             <?php if($item->item_pic_mc1_2!=""){?>
                                <div class="col-4 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div>
                                <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            	<div class="col-8 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div>
                            <?php }?><?php */?>
                          </div>
                          
                          <?php if($item->item_en_mc1_3!="" || $item->item_ur_mc1_3!="" || $item->item_pic_mc1_3){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                             <?php 
							if($item->item_pic_mc1_3!="")
							{
                            	if($item->item_en_mc1_3!="" && $item->item_ur_mc1_3!="")
								{?>
                                    <div class="col-4">3 - <?php echo html_entity_decode($item->item_en_mc1_3);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($item->item_ur_mc1_3);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_3=="" && $item->item_ur_mc1_3!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($item->item_ur_mc1_3);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_3!="" && $item->item_ur_mc1_3=="")
								{?>
                                    <div class="col-6">3 - <?php echo html_entity_decode($item->item_en_mc1_3);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_3!="" && $item->item_ur_mc1_3!="")
								{?>
                                    <div class="col-6">3 - <?php echo html_entity_decode($item->item_en_mc1_3);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($item->item_ur_mc1_3);?></div><?php 
								}
								elseif($item->item_en_mc1_3=="" && $item->item_ur_mc1_3!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($item->item_ur_mc1_3);?></div><?php 
								}
								elseif($item->item_en_mc1_3!="" && $item->item_ur_mc1_3=="")
								{?>
                                    <div class="col-12">3 - <?php echo html_entity_decode($item->item_en_mc1_3);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc1_3!=""){echo "3 - ".html_entity_decode($item->item_en_mc1_3);}?></div>
                            <?php if($item->item_pic_mc1_3!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "3 - ". html_entity_decode($item->item_ur_mc1_3);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo  "3 - ". html_entity_decode($item->item_ur_mc1_3);?></div>
                            <?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_4!="" || $item->item_ur_mc1_4!="" || $item->item_pic_mc1_4){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                          <?php 
							if($item->item_pic_mc1_4!="")
							{
                            	if($item->item_en_mc1_4!="" && $item->item_ur_mc1_4!="")
								{?>
                                    <div class="col-4">4 - <?php echo html_entity_decode($item->item_en_mc1_4);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($item->item_ur_mc1_4);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_4=="" && $item->item_ur_mc1_4!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($item->item_ur_mc1_4);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_4!="" && $item->item_ur_mc1_4=="")
								{?>
                                    <div class="col-6">4 - <?php echo html_entity_decode($item->item_en_mc1_4);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_4!="" && $item->item_ur_mc1_4!="")
								{?>
                                    <div class="col-6">4 - <?php echo html_entity_decode($item->item_en_mc1_4);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($item->item_ur_mc1_4);?></div><?php 
								}
								elseif($item->item_en_mc1_4=="" && $item->item_ur_mc1_4!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($item->item_ur_mc1_4);?></div><?php 
								}
								elseif($item->item_en_mc1_4!="" && $item->item_ur_mc1_4=="")
								{?>
                                    <div class="col-12">4 - <?php echo html_entity_decode($item->item_en_mc1_4);?></div><?php
								}
							}
							?>
                            <?php /*?><div class="col-4"><?php if($item->item_en_mc1_4!=""){echo "4 - ".html_entity_decode($item->item_en_mc1_4);}?></div>
                            <?php if($item->item_pic_mc1_4!=""){?>
                            <div class="col-4 urdufont-right"  style="text-align:right"><?php echo "4 - ".  html_entity_decode($item->item_ur_mc1_4);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right"  style="text-align:right"><?php echo "4 - ".  html_entity_decode($item->item_ur_mc1_4);?></div>
                            <?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_5!="" || $item->item_ur_mc1_5!="" || $item->item_pic_mc1_5){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                           <?php 
							if($item->item_pic_mc1_5!="")
							{
                            	if($item->item_en_mc1_5!="" && $item->item_ur_mc1_5!="")
								{?>
                                    <div class="col-4">5 - <?php echo html_entity_decode($item->item_en_mc1_5);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($item->item_ur_mc1_5);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_5=="" && $item->item_ur_mc1_5!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($item->item_ur_mc1_5);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_5!="" && $item->item_ur_mc1_5=="")
								{?>
                                    <div class="col-6">5 - <?php echo html_entity_decode($item->item_en_mc1_5);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_5!="" && $item->item_ur_mc1_5!="")
								{?>
                                    <div class="col-6">5 - <?php echo html_entity_decode($item->item_en_mc1_5);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($item->item_ur_mc1_5);?></div><?php 
								}
								elseif($item->item_en_mc1_5=="" && $item->item_ur_mc1_5!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($item->item_ur_mc1_5);?></div><?php 
								}
								elseif($item->item_en_mc1_5!="" && $item->item_ur_mc1_5=="")
								{?>
                                    <div class="col-12">5 - <?php echo html_entity_decode($item->item_en_mc1_5);?></div><?php
								}
							}
							?>
						   <?php /*?><div class="col-4"><?php if($item->item_en_mc1_5!=""){echo "5 - ".html_entity_decode($item->item_en_mc1_5);}?></div>
                            <?php if($item->item_pic_mc1_5!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "5 - ".  html_entity_decode($item->item_ur_mc1_5);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "5 - ". html_entity_decode($item->item_ur_mc1_5);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_6!="" || $item->item_ur_mc1_6!="" || $item->item_pic_mc1_6){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc1_6!="")
							{
                            	if($item->item_en_mc1_6!="" && $item->item_ur_mc1_6!="")
								{?>
                                    <div class="col-4">6 - <?php echo html_entity_decode($item->item_en_mc1_6);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($item->item_ur_mc1_6);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_6=="" && $item->item_ur_mc1_6!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($item->item_ur_mc1_6);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_6!="" && $item->item_ur_mc1_6=="")
								{?>
                                    <div class="col-6">6 - <?php echo html_entity_decode($item->item_en_mc1_6);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_6!="" && $item->item_ur_mc1_6!="")
								{?>
                                    <div class="col-6">6 - <?php echo html_entity_decode($item->item_en_mc1_6);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($item->item_ur_mc1_6);?></div><?php 
								}
								elseif($item->item_en_mc1_6=="" && $item->item_ur_mc1_6!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($item->item_ur_mc1_6);?></div><?php 
								}
								elseif($item->item_en_mc1_6!="" && $item->item_ur_mc1_6=="")
								{?>
                                    <div class="col-12">6 - <?php echo html_entity_decode($item->item_en_mc1_6);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc1_6!=""){echo "6 - ".html_entity_decode($item->item_en_mc1_6);}?></div>
                            <?php if($item->item_pic_mc1_6!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "6 - ". html_entity_decode($item->item_ur_mc1_6);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "6 - ". html_entity_decode($item->item_ur_mc1_6);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_7!="" || $item->item_ur_mc1_7!="" || $item->item_pic_mc1_7){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                           <?php 
							if($item->item_pic_mc1_7!="")
							{
                            	if($item->item_en_mc1_7!="" && $item->item_ur_mc1_7!="")
								{?>
                                    <div class="col-4">7 - <?php echo html_entity_decode($item->item_en_mc1_7);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($item->item_ur_mc1_7);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_7=="" && $item->item_ur_mc1_7!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($item->item_ur_mc1_7);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_7!="" && $item->item_ur_mc1_7=="")
								{?>
                                    <div class="col-6">7 - <?php echo html_entity_decode($item->item_en_mc1_7);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_7!="" && $item->item_ur_mc1_7!="")
								{?>
                                    <div class="col-6">7 - <?php echo html_entity_decode($item->item_en_mc1_7);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($item->item_ur_mc1_7);?></div><?php 
								}
								elseif($item->item_en_mc1_7=="" && $item->item_ur_mc1_7!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($item->item_ur_mc1_7);?></div><?php 
								}
								elseif($item->item_en_mc1_7!="" && $item->item_ur_mc1_7=="")
								{?>
                                    <div class="col-12">7 - <?php echo html_entity_decode($item->item_en_mc1_7);?></div><?php
								}
							}
							?>
						   <?php /*?> <div class="col-4"><?php if($item->item_en_mc1_7!=""){echo "7 - ".html_entity_decode($item->item_en_mc1_7);}?></div>
                            <?php if($item->item_pic_mc1_7!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "7 - ". html_entity_decode($item->item_ur_mc1_7);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "7 - ". html_entity_decode($item->item_ur_mc1_7);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_8!="" || $item->item_ur_mc1_8!="" || $item->item_pic_mc1_8){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc1_8!="")
							{
                            	if($item->item_en_mc1_8!="" && $item->item_ur_mc1_8!="")
								{?>
                                    <div class="col-4">8 - <?php echo html_entity_decode($item->item_en_mc1_8);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($item->item_ur_mc1_8);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_8;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_8=="" && $item->item_ur_mc1_8!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($item->item_ur_mc1_8);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_8;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_8!="" && $item->item_ur_mc1_8=="")
								{?>
                                    <div class="col-6">8 - <?php echo html_entity_decode($item->item_en_mc1_8);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_8!="" && $item->item_ur_mc1_8!="")
								{?>
                                    <div class="col-6">8 - <?php echo html_entity_decode($item->item_en_mc1_8);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($item->item_ur_mc1_8);?></div><?php 
								}
								elseif($item->item_en_mc1_8=="" && $item->item_ur_mc1_8!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($item->item_ur_mc1_8);?></div><?php 
								}
								elseif($item->item_en_mc1_8!="" && $item->item_ur_mc1_8=="")
								{?>
                                    <div class="col-12">8 - <?php echo html_entity_decode($item->item_en_mc1_8);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc1_8!=""){echo "8 - ".html_entity_decode($item->item_en_mc1_8);}?></div>
                            <?php if($item->item_pic_mc1_8!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "8 - ". html_entity_decode($item->item_ur_mc1_8);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_8;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "8 - ". html_entity_decode($item->item_ur_mc1_8);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_9!="" || $item->item_ur_mc1_9!="" || $item->item_pic_mc1_9){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                           <?php 
							if($item->item_pic_mc1_9!="")
							{
                            	if($item->item_en_mc1_9!="" && $item->item_ur_mc1_9!="")
								{?>
                                    <div class="col-4">9 - <?php echo html_entity_decode($item->item_en_mc1_9);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($item->item_ur_mc1_9);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_9;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_9=="" && $item->item_ur_mc1_9!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($item->item_ur_mc1_9);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_9;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_9!="" && $item->item_ur_mc1_9=="")
								{?>
                                    <div class="col-6">9 - <?php echo html_entity_decode($item->item_en_mc1_9);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_9!="" && $item->item_ur_mc1_9!="")
								{?>
                                    <div class="col-6">9 - <?php echo html_entity_decode($item->item_en_mc1_9);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($item->item_ur_mc1_9);?></div><?php 
								}
								elseif($item->item_en_mc1_9=="" && $item->item_ur_mc1_9!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($item->item_ur_mc1_9);?></div><?php 
								}
								elseif($item->item_en_mc1_9!="" && $item->item_ur_mc1_9=="")
								{?>
                                    <div class="col-12">9 - <?php echo html_entity_decode($item->item_en_mc1_9);?></div><?php
								}
							}
							?>
						   <?php /*?> <div class="col-4"><?php if($item->item_en_mc1_9!=""){echo "9 - ".html_entity_decode($item->item_en_mc1_9);}?></div>
                            <?php if($item->item_pic_mc1_9!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "9 - ". html_entity_decode($item->item_ur_mc1_9);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_9;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "9 - ". html_entity_decode($item->item_ur_mc1_9);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
						  <?php if($item->item_en_mc1_10!="" || $item->item_ur_mc1_10!="" || $item->item_pic_mc1_10){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc1_10!="")
							{
                            	if($item->item_en_mc1_10!="" && $item->item_ur_mc1_10!="")
								{?>
                                    <div class="col-4">10 - <?php echo html_entity_decode($item->item_en_mc1_10);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($item->item_ur_mc1_10);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_10;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_10=="" && $item->item_ur_mc1_10!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($item->item_ur_mc1_10);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_10;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc1_10!="" && $item->item_ur_mc1_10=="")
								{?>
                                    <div class="col-6">10 - <?php echo html_entity_decode($item->item_en_mc1_10);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc1_10!="" && $item->item_ur_mc1_10!="")
								{?>
                                    <div class="col-6">10 - <?php echo html_entity_decode($item->item_en_mc1_10);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($item->item_ur_mc1_10);?></div><?php 
								}
								elseif($item->item_en_mc1_10=="" && $item->item_ur_mc1_10!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($item->item_ur_mc1_10);?></div><?php 
								}
								elseif($item->item_en_mc1_10!="" && $item->item_ur_mc1_10=="")
								{?>
                                    <div class="col-12">10 - <?php echo html_entity_decode($item->item_en_mc1_10);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc1_10!=""){echo "10 - ".html_entity_decode($item->item_en_mc1_10);}?></div>
                            <?php if($item->item_pic_mc1_10!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "10 - ". html_entity_decode($item->item_ur_mc1_10);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_10;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "10 - ". html_entity_decode($item->item_ur_mc1_10);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                      <!---------------for column-2 starts here-------------------->
                      <div class="col-5">
                        <div class="row">
                          <div class="col-12" style="margin-bottom:10px">
                            <h3>Column-II</h3>
                          </div>
                        </div>
                        <div class="row col-12 borders" style="padding-bottom:8px">
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                          	<?php 
							if($item->item_pic_mc2_a!="")
							{
                            	if($item->item_en_mc2_a!="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-4">a - <?php echo html_entity_decode($item->item_en_mc2_a);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_a=="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_a!="" && $item->item_ur_mc2_a=="")
								{?>
                                    <div class="col-6">a - <?php echo html_entity_decode($item->item_en_mc2_a);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_a!="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-6">a - <?php echo html_entity_decode($item->item_en_mc2_a);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?></div><?php 
								}
								elseif($item->item_en_mc2_a=="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?></div><?php 
								}
								elseif($item->item_en_mc2_a!="" && $item->item_ur_mc2_a=="")
								{?>
                                    <div class="col-12">a - <?php echo html_entity_decode($item->item_en_mc2_a);?></div><?php
								}
							}
							?>
                            <?php /*?><div class="col-4"><?php if($item->item_en_mc2_a!=""){echo "a - ".html_entity_decode($item->item_en_mc2_a);}?></div>
                            <?php if($item->item_pic_mc2_a!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "a - ". html_entity_decode($item->item_ur_mc2_a);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "a - ". html_entity_decode($item->item_ur_mc2_a);?></div>
							<?php }?><?php */?>
                          </div>
                          
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc2_b!="")
							{
                            	if($item->item_en_mc2_b!="" && $item->item_ur_mc2_b!="")
								{?>
                                    <div class="col-4">b - <?php echo html_entity_decode($item->item_en_mc2_b);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($item->item_ur_mc2_b);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_b=="" && $item->item_ur_mc2_b!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($item->item_ur_mc2_b);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_b!="" && $item->item_ur_mc2_b=="")
								{?>
                                    <div class="col-6">b - <?php echo html_entity_decode($item->item_en_mc2_b);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_b!="" && $item->item_ur_mc2_b!="")
								{?>
                                    <div class="col-6">b - <?php echo html_entity_decode($item->item_en_mc2_b);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($item->item_ur_mc2_b);?></div><?php 
								}
								elseif($item->item_en_mc2_b=="" && $item->item_ur_mc2_b!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($item->item_ur_mc2_b);?></div><?php 
								}
								elseif($item->item_en_mc2_b!="" && $item->item_ur_mc2_b=="")
								{?>
                                    <div class="col-12">b - <?php echo html_entity_decode($item->item_en_mc2_b);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc2_b!=""){echo "b - ".html_entity_decode($item->item_en_mc2_b);}?></div>
                            <?php if($item->item_pic_mc2_b!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "b - ". html_entity_decode($item->item_ur_mc2_b);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "b - ". html_entity_decode($item->item_ur_mc2_b);?></div>
							<?php }?><?php */?>
                          </div>
                          
                          <?php if($item->item_en_mc2_c!="" || $item->item_ur_mc2_c!="" || $item->item_pic_mc2_c){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                           <?php 
							if($item->item_pic_mc2_c!="")
							{
                            	if($item->item_en_mc2_c!="" && $item->item_ur_mc2_c!="")
								{?>
                                    <div class="col-4">c - <?php echo html_entity_decode($item->item_en_mc2_c);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($item->item_ur_mc2_c);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_c=="" && $item->item_ur_mc2_c!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($item->item_ur_mc2_c);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_c!="" && $item->item_ur_mc2_c=="")
								{?>
                                    <div class="col-6">c - <?php echo html_entity_decode($item->item_en_mc2_c);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_c!="" && $item->item_ur_mc2_c!="")
								{?>
                                    <div class="col-6">c - <?php echo html_entity_decode($item->item_en_mc2_c);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($item->item_ur_mc2_c);?></div><?php 
								}
								elseif($item->item_en_mc2_c=="" && $item->item_ur_mc2_c!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($item->item_ur_mc2_c);?></div><?php 
								}
								elseif($item->item_en_mc2_c!="" && $item->item_ur_mc2_c=="")
								{?>
                                    <div class="col-12">c - <?php echo html_entity_decode($item->item_en_mc2_c);?></div><?php
								}
							}
							?>
						   <?php /*?> <div class="col-4"><?php if($item->item_en_mc2_c!=""){echo "c - ".html_entity_decode($item->item_en_mc2_c);}?></div>
                            <?php if($item->item_pic_mc2_c!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "c - ". html_entity_decode($item->item_ur_mc2_c);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "c - ". html_entity_decode($item->item_ur_mc2_c);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_d!="" || $item->item_ur_mc2_d!="" || $item->item_pic_mc2_d){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc2_d!="")
							{
                            	if($item->item_en_mc2_d!="" && $item->item_ur_mc2_d!="")
								{?>
                                    <div class="col-4">d - <?php echo html_entity_decode($item->item_en_mc2_d);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($item->item_ur_mc2_d);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_d=="" && $item->item_ur_mc2_d!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($item->item_ur_mc2_d);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_d!="" && $item->item_ur_mc2_d=="")
								{?>
                                    <div class="col-6">d - <?php echo html_entity_decode($item->item_en_mc2_d);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_d!="" && $item->item_ur_mc2_d!="")
								{?>
                                    <div class="col-6">d - <?php echo html_entity_decode($item->item_en_mc2_d);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($item->item_ur_mc2_d);?></div><?php 
								}
								elseif($item->item_en_mc2_d=="" && $item->item_ur_mc2_d!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($item->item_ur_mc2_d);?></div><?php 
								}
								elseif($item->item_en_mc2_d!="" && $item->item_ur_mc2_d=="")
								{?>
                                    <div class="col-12">d - <?php echo html_entity_decode($item->item_en_mc2_d);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc2_d!=""){echo "d - ".html_entity_decode($item->item_en_mc2_d);}?></div>
                            <?php if($item->item_pic_mc2_d!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "d - ". html_entity_decode($item->item_ur_mc2_d);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "d - ". html_entity_decode($item->item_ur_mc2_d);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_e!="" || $item->item_ur_mc2_e!="" || $item->item_pic_mc2_e){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc2_e!="")
							{
                            	if($item->item_en_mc2_e!="" && $item->item_ur_mc2_e!="")
								{?>
                                    <div class="col-4">e - <?php echo html_entity_decode($item->item_en_mc2_e);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($item->item_ur_mc2_e);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_e=="" && $item->item_ur_mc2_e!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($item->item_ur_mc2_e);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_e!="" && $item->item_ur_mc2_e=="")
								{?>
                                    <div class="col-6">e - <?php echo html_entity_decode($item->item_en_mc2_e);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_e!="" && $item->item_ur_mc2_e!="")
								{?>
                                    <div class="col-6">e - <?php echo html_entity_decode($item->item_en_mc2_e);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($item->item_ur_mc2_e);?></div><?php 
								}
								elseif($item->item_en_mc2_e=="" && $item->item_ur_mc2_e!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($item->item_ur_mc2_e);?></div><?php 
								}
								elseif($item->item_en_mc2_e!="" && $item->item_ur_mc2_e=="")
								{?>
                                    <div class="col-12">e - <?php echo html_entity_decode($item->item_en_mc2_e);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc2_e!=""){echo "e - ".html_entity_decode($item->item_en_mc2_e);}?></div>
                            <?php if($item->item_pic_mc2_e!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "e - ". html_entity_decode($item->item_ur_mc2_e);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "e - ". html_entity_decode($item->item_ur_mc2_e);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_f!="" || $item->item_ur_mc2_f!="" || $item->item_pic_mc2_f){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc2_f!="")
							{
                            	if($item->item_en_mc2_f!="" && $item->item_ur_mc2_f!="")
								{?>
                                    <div class="col-4">f - <?php echo html_entity_decode($item->item_en_mc2_f);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($item->item_ur_mc2_f);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_f=="" && $item->item_ur_mc2_f!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($item->item_ur_mc2_f);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_f!="" && $item->item_ur_mc2_f=="")
								{?>
                                    <div class="col-6">f - <?php echo html_entity_decode($item->item_en_mc2_f);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_f!="" && $item->item_ur_mc2_f!="")
								{?>
                                    <div class="col-6">f - <?php echo html_entity_decode($item->item_en_mc2_f);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($item->item_ur_mc2_f);?></div><?php 
								}
								elseif($item->item_en_mc2_f=="" && $item->item_ur_mc2_f!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($item->item_ur_mc2_f);?></div><?php 
								}
								elseif($item->item_en_mc2_f!="" && $item->item_ur_mc2_f=="")
								{?>
                                    <div class="col-12">f - <?php echo html_entity_decode($item->item_en_mc2_f);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc2_f!=""){echo "f - ".html_entity_decode($item->item_en_mc2_f);}?></div>
                            <?php if($item->item_pic_mc2_f!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "f - ". html_entity_decode($item->item_ur_mc2_f);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "f - ". html_entity_decode($item->item_ur_mc2_f);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_g!="" || $item->item_ur_mc2_g!="" || $item->item_pic_mc2_g){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc2_g!="")
							{
                            	if($item->item_en_mc2_g!="" && $item->item_ur_mc2_g!="")
								{?>
                                    <div class="col-4">g - <?php echo html_entity_decode($item->item_en_mc2_g);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($item->item_ur_mc2_g);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_g=="" && $item->item_ur_mc2_g!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($item->item_ur_mc2_g);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_g!="" && $item->item_ur_mc2_g=="")
								{?>
                                    <div class="col-6">g - <?php echo html_entity_decode($item->item_en_mc2_g);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_g!="" && $item->item_ur_mc2_g!="")
								{?>
                                    <div class="col-6">g - <?php echo html_entity_decode($item->item_en_mc2_g);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($item->item_ur_mc2_g);?></div><?php 
								}
								elseif($item->item_en_mc2_g=="" && $item->item_ur_mc2_g!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($item->item_ur_mc2_g);?></div><?php 
								}
								elseif($item->item_en_mc2_g!="" && $item->item_ur_mc2_g=="")
								{?>
                                    <div class="col-12">g - <?php echo html_entity_decode($item->item_en_mc2_g);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc2_g!=""){echo "g - ".html_entity_decode($item->item_en_mc2_g);}?></div>
                            <?php if($item->item_pic_mc2_g!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "g - ". html_entity_decode($item->item_ur_mc2_g);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "g - ". html_entity_decode($item->item_ur_mc2_g);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_h!="" || $item->item_ur_mc2_h!="" || $item->item_pic_mc2_h){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc2_h!="")
							{
                            	if($item->item_en_mc2_h!="" && $item->item_ur_mc2_h!="")
								{?>
                                    <div class="col-4">h - <?php echo html_entity_decode($item->item_en_mc2_h);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($item->item_ur_mc2_h);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_h=="" && $item->item_ur_mc2_h!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($item->item_ur_mc2_h);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_h!="" && $item->item_ur_mc2_h=="")
								{?>
                                    <div class="col-6">h - <?php echo html_entity_decode($item->item_en_mc2_h);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_h!="" && $item->item_ur_mc2_h!="")
								{?>
                                    <div class="col-6">h - <?php echo html_entity_decode($item->item_en_mc2_h);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($item->item_ur_mc2_h);?></div><?php 
								}
								elseif($item->item_en_mc2_h=="" && $item->item_ur_mc2_h!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($item->item_ur_mc2_h);?></div><?php 
								}
								elseif($item->item_en_mc2_h!="" && $item->item_ur_mc2_h=="")
								{?>
                                    <div class="col-12">h - <?php echo html_entity_decode($item->item_en_mc2_h);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc2_h!=""){echo "h - ".html_entity_decode($item->item_en_mc2_h);}?></div>
                            <?php if($item->item_pic_mc2_h!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "h - ". html_entity_decode($item->item_ur_mc2_h);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "h - ". html_entity_decode($item->item_ur_mc2_h);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_i!="" || $item->item_ur_mc2_i!="" || $item->item_pic_mc2_i){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                            <?php 
							if($item->item_pic_mc2_i!="")
							{
                            	if($item->item_en_mc2_i!="" && $item->item_ur_mc2_i!="")
								{?>
                                    <div class="col-4">i - <?php echo html_entity_decode($item->item_en_mc2_i);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($item->item_ur_mc2_i);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_i=="" && $item->item_ur_mc2_i!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($item->item_ur_mc2_i);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_i!="" && $item->item_ur_mc2_i=="")
								{?>
                                    <div class="col-6">i - <?php echo html_entity_decode($item->item_en_mc2_i);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_i!="" && $item->item_ur_mc2_i!="")
								{?>
                                    <div class="col-6">i - <?php echo html_entity_decode($item->item_en_mc2_i);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($item->item_ur_mc2_i);?></div><?php 
								}
								elseif($item->item_en_mc2_i=="" && $item->item_ur_mc2_i!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($item->item_ur_mc2_i);?></div><?php 
								}
								elseif($item->item_en_mc2_i!="" && $item->item_ur_mc2_i=="")
								{?>
                                    <div class="col-12">i - <?php echo html_entity_decode($item->item_en_mc2_i);?></div><?php
								}
							}
							?>
							<?php /*?><div class="col-4"><?php if($item->item_en_mc2_i!=""){echo "i - ".html_entity_decode($item->item_en_mc2_i);}?></div>
                            <?php if($item->item_pic_mc2_i!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "i - ". html_entity_decode($item->item_ur_mc2_i);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "i - ". html_entity_decode($item->item_ur_mc2_i);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_j!="" || $item->item_ur_mc2_j!="" || $item->item_pic_mc2_j){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:38px">
                          <?php 
							if($item->item_pic_mc2_j!="")
							{
                            	if($item->item_en_mc2_j!="" && $item->item_ur_mc2_j!="")
								{?>
                                    <div class="col-4">j - <?php echo html_entity_decode($item->item_en_mc2_j);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($item->item_ur_mc2_j);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_j=="" && $item->item_ur_mc2_j!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($item->item_ur_mc2_j);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
								elseif($item->item_en_mc2_j!="" && $item->item_ur_mc2_j=="")
								{?>
                                    <div class="col-6">j - <?php echo html_entity_decode($item->item_en_mc2_j);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:65px; max-width:65px; float:right"/></div><?php 
								}
							}
							else
							{
                            	if($item->item_en_mc2_j!="" && $item->item_ur_mc2_j!="")
								{?>
                                    <div class="col-6">j - <?php echo html_entity_decode($item->item_en_mc2_j);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($item->item_ur_mc2_j);?></div><?php 
								}
								elseif($item->item_en_mc2_j=="" && $item->item_ur_mc2_j!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($item->item_ur_mc2_j);?></div><?php 
								}
								elseif($item->item_en_mc2_j!="" && $item->item_ur_mc2_j=="")
								{?>
                                    <div class="col-12">j - <?php echo html_entity_decode($item->item_en_mc2_i);?></div><?php
								}
							}
							?>
						  <?php /*?><div class="row col-12" style="margin-top:10px; line-height:38px">
                            <div class="col-4"><?php if($item->item_en_mc2_j!=""){echo "j - ".html_entity_decode($item->item_en_mc2_j);}?></div>
                            <?php if($item->item_pic_mc2_j!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "j - ". html_entity_decode($item->item_ur_mc2_j);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-height:65px; max-width:65px; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "j - ". html_entity_decode($item->item_ur_mc2_j);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                      <!---------------for column-2 ends here--------------------> 
                      <!---------------answer column here here-------------------->
                      <div class="col-2">
                        <div class="row" id="item_mc_ans_key" >
                          <div class="col-6">
                            <h3><label for="item_mc_ans_key" class="control-label" style="padding-top:15px">Answer</label></h3>
                          </div>
                          <div class="col-6 urdufont-right" style="text-align:right">
                            <h3>جواب</h3>
                          </div>
                        </div>
                        <?php
                        	$item_mc_ans_key = $item->item_mc_ans_key;
							$ans = explode('_',$item_mc_ans_key);
							$ans1 = (isset($ans[0])&&$ans[0]!="")?substr($ans[0], -1):"";
							$ans2 = (isset($ans[1])&&$ans[1]!="")?substr($ans[1], -1):"";
							$ans3 = (isset($ans[2])&&$ans[2]!="")?substr($ans[2], -1):"";
							$ans4 = (isset($ans[3])&&$ans[3]!="")?substr($ans[3], -1):"";
							$ans5 = (isset($ans[4])&&$ans[4]!="")?substr($ans[4], -1):"";
							$ans6 = (isset($ans[5])&&$ans[5]!="")?substr($ans[5], -1):"";
							$ans7 = (isset($ans[6])&&$ans[6]!="")?substr($ans[6], -1):"";
							$ans8 = (isset($ans[7])&&$ans[7]!="")?substr($ans[7], -1):"";
							$ans9 = (isset($ans[8])&&$ans[8]!="")?substr($ans[8], -1):"";
							$ans10 = (isset($ans[9])&&$ans[9]!="")?substr($ans[9], -1):"";
							//print_r($ans);
							//die();
						?>
                        <div class="row borders" style="padding:0px 0px 0px 15px; margin-top:-10px">
                          <?php if($ans1!=""){?>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 1 is <?php echo $ans1;?></div>
                          <?php } if($ans2!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 2 is <?php echo $ans2;?></div>
                          <?php } if($ans3!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 3 is <?php echo $ans3;?></div>
                          <?php } if($ans4!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 4 is <?php echo $ans4;?></div>
                          <?php } if($ans5!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 5 is <?php echo $ans5;?></div>
                          <?php } if($ans6!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 6 is <?php echo $ans6;?></div>
                          <?php } if($ans7!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 7 is <?php echo $ans7;?></div>
                          <?php } if($ans8!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 8 is <?php echo $ans8;?></div>
                          <?php } if($ans9!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 9 is <?php echo $ans9;?></div>
                          <?php } if($ans10!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="padding:8px 0px 5px 15px; line-height:39px">Answer of 10 is <?php echo $ans10;?></div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    </td>
                </tr>
            </table>	
<?php	}
?>               
              </table>           
             <?php  
		   }
		   ?>
  </div>
    <div class="row">
        <div class="col-lg-12">
        
        <?php if(!empty($logs)){?><div class="col-lg-12" style="padding-left:25px; padding-top:25px"> </div>
        <div class="col-lg-12">
            <table width="100%" border="1" style="text-align:center">
              <tr style="font-weight:bold">
                <td width="5%">Sr.</td>
                <td width="10%">Name</td>
                <td width="20%">Title</td>
                <td width="25%">Logs</td>
                <td width="22%">Comment</td>
                <td width="20%">Date</td>
                <?php /*?><td width="08%">History</td><?php */?>
              </tr>
            <?php 
				$i=1; $il = 1;
				$max_logs = count($logs);
				foreach($logs as $log){
				  $log_sms = $log->log_message;
				  $new_string = str_replace("{log_itemwriter_id}", $log->username, $log_sms);
				  $new_string = str_replace("{log_admin_id}", $log->username, $new_string);
				  $new_string = str_replace("{log_itemid}", $log->log_itemid, $new_string);
				  $new_string = str_replace("{log_date}", $log->log_date, $new_string);
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $log->username;?></td>
                    <td><?php echo $log->log_title;?></td>
                    <td><?php echo $new_string;?></td>
                    <td><?php echo $log->log_comment;?></td>
                    <td><?php echo date("d-M-Y (h:i a)",strtotime($log->log_date));?></td>
                    <?php /*?><td>
					<?php 
					if($log->log_itemhis_id!=0)
					{
						//echo 'Under Development';
						if($il != $max_logs)
						{
							//echo $i.'-'.$max_logs;
							if (strpos($log->log_messagetype, 'rev_') !== false) 
							{?><a href="<?= base_url('admin/items/get_rev_item_history_compare/'.$log->log_itemhis_id."-".$item->item_id."-".$log->log_id); ?>" class="btn btn-success" target="_blank"> History</a><?php }
							elseif (strpos($log->log_messagetype, 'pilot_') !== false) 
							{?><a href="<?= base_url('admin/items/get_pilot_item_history_compare/'.$log->log_itemhis_id."-".$item->item_id."-".$log->log_id); ?>" class="btn btn-success" target="_blank"> History</a><?php }
							else
							{?><a href="<?= base_url('admin/items/get_item_history_compare/'.$log->log_itemhis_id."-".$item->item_id."-".$log->log_id); ?>" class="btn btn-success" target="_blank"> History</a><?php }	
						} else { echo "Latest View";}?>
                    <?php 
					} 
					else 
					{echo 'No history found';}
					?>
                    </td><?php */?>
                  </tr>
              <?php $il++;} ?>
              </table>
			  <?php 
			  }
			  else {echo 'No log history found';}?>  
            
            <?php if($item->item_status==1 && $this->session->userdata('role_id') == 3){?>
			<div style="padding:15px 0px; float:right"><a href="<?= base_url('admin/items/submit_for_approval_his_log/'.$item->item_id); ?>" class="btn btn-success"> Submit For Approval</a></div>
            <?php } ?>
            <?php if (($item->item_status==3 || $item->item_status==1) && $this->session->userdata('role_id') == 3){?>
            <a href=<?php echo base_url('admin/items/edit_combine/'.$item->item_id); ?>><input type="button" name="edit" id="edit" value="Edit Item" class="btn btn-info pull-right" style="margin:15px"></a>
            <?php }?>
            <?php if($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 4){?>
            <a href=<?php echo base_url('admin/pilot_items/pilot_edit_combine/'.$item->item_id); ?>><input type="button" name="edit" id="edit" value="Edit Item" class="btn btn-info pull-right" style="margin-top:10px; margin-left:10px;"></a>
			
            <?php if($item->item_type=='MCQ'){?><a href="" data-toggle="modal" data-target="#headingModal" data-id="<?php echo $item->item_id; ?>"><input type="button" name="edit" id="edit" value="View Graph & Stats" class="btn btn-info pull-right" style="margin:10px 0px 0px 10px"></a><?php }?>
            <?php } ?>
            <?php if($this->session->userdata('role_id') == 6){?>
			<label for="item_rev_comment" class="col-sm-6 control-label" style="margin-top:15px">Comments</label>
            <textarea id="item_rev_comment" name="item_rev_comment" rows="4" cols="55" style="width:100%; margin-bottom:25px" required="required"></textarea>
                <input type="checkbox" id="alignment " name="alignment" value="alignment" required="required">
                <label for="alignment" style="padding-left:15px"> 1. Item/Stem alignment with SLO.</label><br>
                <input type="checkbox" id="distractors " name="distractors" value="distractors" required="required">
                <label for="distractors" style="padding-left:15px"> 2. Plausibility of distractors.</label><br>
                <input type="checkbox" id="key " name="key" value="key" required="required">
                <label for="key" style="padding-left:15px"> 3. Only one option is key.</label><br>
                <input type="checkbox" id="grammar " name="grammar" value="grammar" required="required">
                <label for="grammar" style="padding-left:15px"> 4. Correct grammar, punctuation and spelling usage in item.</label><br>
                <input type="checkbox" id="distribution" name="distribution" value="distribution" required="required">
                <label for="distribution" style="padding-left:15px"> 5.	CRQs alignment with sample answer and correct marks distribution in rubrics.</label><br>
            <a href="<?= base_url('admin/items/submit_for_approval_his_log/'.$item->item_id); ?>" class="btn btn-success pull-right" style="margin:10px 0px;">Accept Item</a>
            <a href=<?php echo base_url('admin/items/rev_edit_combine/'.$item->item_id); ?>><input type="button" name="edit" id="edit" value="Edit Item" class="btn btn-info pull-right" style="margin:10px;"></a>
            <?php } ?>
        </div>
    </div>
</div>
			<!---- end  here is item view filmzy --->			
        </div>
        <!-- /.box-body -->
      </div>
    </section>
    
  </div>
  
 <div class="modal fade" id="headingModal" tabindex="-1" role="dialog" aria-labelledby="headingModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:150%">		
      <div class="modal-header">
        <h5 class="modal-title" id="headingModalLabel">Graph & Statistical Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
         <div class="row">
          <div class="col-md-12">
            <!-- Line chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                  Line Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="line-chart" style="width:100%; height: 280px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

            <!-- Area chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-bar-chart-o"></i>
                  Quantile plot data
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="area-chart" style="height: 350px;" class="full-width-chart">
                  <table border="1" cellspacing="0" cellpadding="0" class="table table-hover">
					  <tbody>
                    <tr>
                      <th width="64" valign="top" style="padding:5px; text-align:center;"><p>Option</p></th>
                      <th width="59" valign="top" style="padding:5px; text-align:center;"><p>N</p></th>
                      <th width="59" valign="top" style="padding:5px; text-align:center;"><p>0-25%</p></th>
                      <th width="59" valign="top" style="padding:5px; text-align:center;"><p>25-50%</p></th>
                      <th width="59" valign="top" style="padding:5px; text-align:center;"><p>50-75%</p></th>
                      <th width="59" valign="top" style="padding:5px; text-align:center;"><p>75-100%</p></th>
                      <th width="59" valign="top" style="padding:5px; text-align:center;"><p>Color</p></th>
                      <th width="59" valign="top" style="padding:5px; text-align:center;"><p>&nbsp;</p></th>
                    </tr>
						  </tbody>
                    <tr>
                      <td width="64" valign="top" style="padding:5px; text-align:center;"><p>A</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>----</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_1g_1p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_1g_2p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_1g_3p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_1g_4p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>Maroon</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php if($item->item_option_correct == 'a'){print '**KEY**';}?></p></td>
                    </tr>
                    <tr>
                      <td width="64" valign="top" style="padding:5px; text-align:center;"><p>B</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>----</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_2g_1p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_2g_2p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_2g_3p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_2g_4p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>Green</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php if($item->item_option_correct == 'b'){print '**KEY**';}?></p></td>
                    </tr>
                    <tr>
                      <td width="64" valign="top" style="padding:5px; text-align:center;"><p>C</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>----</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_3g_1p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_3g_2p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_3g_3p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_3g_4p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>Blue</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php if($item->item_option_correct == 'c'){print '**KEY**';}?></p></td>
                    </tr>
                    <tr>
                      <td width="64" valign="top" style="padding:5px; text-align:center;"><p>D</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>----</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_4g_1p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_4g_2p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_4g_3p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php echo $item->item_4g_4p; ?></p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p>Olive</p></td>
                      <td width="59" valign="top" style="padding:5px; text-align:center;"><p><?php if($item->item_option_correct == 'd'){print '**KEY**';}?></p></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->

        </div>
		  
      </div>		
    </div>
  </div>
</div> 
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

  <!-- FLOT CHARTS -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?= base_url()?>assets/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<script>
   

    /*
     * LINE CHART
     * ----------
	  var a = [0.565,0.526,0.412,0.472,0.600],
        b = [0.145,0.263,0.324,0.236,0.200], 
		c = [0.177,0.145,0.235,0.139,0.186], 
		d = [0.113,0.066,0.029,0.153,0.014];
     */
    //LINE randomly generated data
	var a = [], b=[], c=[], d=[];
	  a.push([0,]);
	  a.push([1,<?php echo $item->item_1g_1p; ?>]);
	  a.push([2,<?php echo $item->item_1g_2p; ?>]);
	  a.push([3,<?php echo $item->item_1g_3p; ?>]);
	  a.push([4,<?php echo $item->item_1g_4p; ?>]);
	  //a.push([5,<?php echo $item->item_1g_5p; ?>]);
	  a.push([5,]);
	  
	  b.push([1,<?php echo $item->item_2g_1p; ?>]);
	  b.push([2,<?php echo $item->item_2g_2p; ?>]);
	  b.push([3,<?php echo $item->item_2g_3p; ?>]);
	  b.push([4,<?php echo $item->item_2g_4p; ?>]);
	  //b.push([5,<?php echo $item->item_2g_5p; ?>]);
	  
	  c.push([1,<?php echo $item->item_3g_1p; ?>]);
	  c.push([2,<?php echo $item->item_3g_2p; ?>]);
	  c.push([3,<?php echo $item->item_3g_3p; ?>]);
	  c.push([4,<?php echo $item->item_3g_4p; ?>]);
	  //c.push([5,<?php echo $item->item_3g_5p; ?>]);
	  
	  d.push([1,<?php echo $item->item_4g_1p; ?>]);
	  d.push([2,<?php echo $item->item_4g_2p; ?>]);
	  d.push([3,<?php echo $item->item_4g_3p; ?>]);
	  d.push([4,<?php echo $item->item_4g_4p; ?>]);
	//  d.push([5,<?php echo $item->item_4g_5p; ?>]);
	  
  
   var line_data1 = {
      data : a,
      color: '#551d20'
    }
    var line_data2 = {
      data : b,
      color: '#01800b'
    }
	var line_data3 = {
      data : c,
      color: '#0000d1'
    }
    var line_data4 = {
      data : d,
      color: '#6d7636'
    }
	<?php if($item->item_1g_1p!=0 || $item->item_1g_2p!=0 ||  $item->item_1g_3p!=0 || $item->item_1g_4p!=0 ||  
			$item->item_2g_1p!=0 ||  $item->item_2g_2p!=0 ||  $item->item_2g_3p!=0 ||  $item->item_2g_4p!=0 ||  
			$item->item_3g_1p!=0 || $item->item_3g_2p!=0 || $item->item_3g_3p!=0 || $item->item_3g_4p!=0 ||
			$item->item_4g_1p!=0 || $item->item_4g_2p!=0 || $item->item_4g_3p!=0 || $item->item_4g_4p!=0 ){?>
    $.plot('#line-chart', [line_data1, line_data2, line_data3, line_data4], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
	<?php } else {?> $('#line-chart').html('No value found to plot graph.')<?php }?>
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({
            top : item.pageY + 5,
            left: item.pageX + 5
          })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */
  
</script>
