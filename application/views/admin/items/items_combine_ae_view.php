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
.hModal {
  width: 75% !important;
  margin: auto;
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
		  	$ssinfo = (isset($ssinfo[0]))?$ssinfo[0]:"";	   
			$aeinfo = (isset($aeinfo[0]))?$aeinfo[0]:"";
			$psyinfo = (isset($psyinfo[0]))?$psyinfo[0]:"";
		   if($item->item_status_ae=='0'){ ?>
            <a href="<?= base_url('admin/items/ae_pitems'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          <?php }elseif($item->item_status_ae=='1'){?>
          	<a href="<?= base_url('admin/items/ae_accepted_items'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          <?php }elseif($item->item_status_ae=='2'){?>
          	<a href="<?= base_url('admin/items/ae_rejected_items'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          <?php }else{die('Alert! You are not authorized to do this action');}?>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php');?>
						
			<!---- start here is item view filmzy --->
			
<div class="container" style="padding-top:25px">
  <div class="row">
  	<div class="col-8">
    	<div class="row col-12">
        	<div class="col-3">
              <div> <img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" style="max-width:90%" /></div>
            </div>
            <div class="col-9">
              <div class="col-12" style="font-size:36px; font-weight:bold; text-align:center;">Punjab Education Curriculum Training and Assessment Authority [PECTAA]</div>
              <div class="col-12" style="font-size:20px; text-align:center; margin-top:1%">Wahdat Colony Road, Lahore</div>
            </div>
        </div>
        <div class="row col-12">
        	<div class="col-12" style="padding-left:40px; padding-top:10px">
                <div class="col-12" style="font-weight:bold;">
                    <table width="100%" class="border-bottom"><tr><td width="35%">Date Received : </td><td><?php echo date("d-M-Y (h:i a)",strtotime($item->item_date_received));?></td></tr></table>
                </div>
                <div class="col-lg-12 col-sm-12" style="font-weight:bold">
                    <table width="100%" class="border-bottom"><tr><td width="35%">Item Writer Name : </td><td><?php echo $item->firstname.' '.$item->lastname.' ('.$item->username.')';?></td></tr></table>
                </div>
                <div class="col-lg-12 col-sm-12" style="font-weight:bold">
                    <table width="100%" class="border-bottom"><tr><td width="35%">Registration No. : </td><td>PEC-<?php echo $item->item_submittedby;?></td></tr></table>
                </div>
        	</div>
        </div>
    </div>
    <div class="col-4" >
      <div class="col-12" style="alignment-adjust:central;">
        <table border="1px" bordercolor="#000000" width="100%" style="float:right; font-weight:bold; font-size:16px;" cellpadding="7px" >
          <tr>
            <td colspan="3" style="text-align:center">For official Use Only</td>
          </tr>
          <tr>
            <td colspan="3"style="text-align:center">Item Code:&emsp; <?php echo $item->item_code;?></td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:center">Item Statistics:</td>
          </tr>
          <tr>
            <td style="text-align:center" width="33%">Difficulty</td>
            <td style="text-align:center" width="33%">Disc</td>
            <td style="text-align:center">DIF</td>
          </tr>
          <tr>
            <td style="text-align:center"><?php echo $item->item_difficulty;?></td>
            <td style="text-align:center"><?php echo $item->item_discr;?></td>
            <td style="text-align:center"><?php echo $item->item_dif_code;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row" style="margin-left:5px; font-size:14px"> 
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
                <td style="border-right: 1px solid black; width:16%"">C</td>
                <td style="border-right: 1px solid black; width:18%"">App</td>
                <td style="border-right: 1px solid black; width:17%"">An</td>
                <td style="border-right: 1px solid black; width:17%"">Sy</td>
                <td style="width:16%">Ey</td>
              </tr>
            </table>
        </td>
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
    	<td colspan="2"><?php if ($item->item_relation=='Direct Quote') {echo 'Yes';}else{echo '---';}?></td>
        <td colspan="2"><?php if ($item->item_relation=='Amended'){echo 'Yes';} else{echo '---';}?></td>
    	<td><?php echo $item->item_option_correct;?></td>
        <td><?php echo $item->item_type;?></td>
    </tr>
  </table>
  </div>
  <div class="row col-lg-12" style="padding-top:02px;" >
	  
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
                            <td style="width:50%; font-size:18px">
                                <?php echo  html_entity_decode($item->item_fib_key_eng);?>
                            </td>
                            <td class="urdufont-right" style="text-align:right">
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
                    <td><div class="urdufont-right"><?php echo  html_entity_decode($item->item_tf_ur_1);?></div></td>
                </tr>
                <tr>
                	<td style="padding-left:25px">b. <?php echo  html_entity_decode($item->item_tf_eng_2);?></td>
                    <td><div class="urdufont-right"><?php echo  html_entity_decode($item->item_tf_ur_2);?></div></td>
                </tr>
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
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                          	<?php 
							if($item->item_pic_mc1_1!="")
							{
                            	if($item->item_en_mc1_1!="" && $item->item_ur_mc1_1!="")
								{?>
                                    <div class="col-4">1 - <?php echo html_entity_decode($item->item_en_mc1_1);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_1=="" && $item->item_ur_mc1_1!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_1!="" && $item->item_ur_mc1_1=="")
								{?>
                                    <div class="col-6">1 - <?php echo html_entity_decode($item->item_en_mc1_1);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">1 - <img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                                <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_1;?>" style="max-height:60px;"/></div>
                            <?php }else{?>
                            	<div class="col-8 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($item->item_ur_mc1_1);?></div>
                            <?php }?><?php */?>
                          </div>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                           <?php 
							if($item->item_pic_mc1_2!="")
							{
                            	if($item->item_en_mc1_2!="" && $item->item_ur_mc1_2!="")
								{?>
                                    <div class="col-4">1 - <?php echo html_entity_decode($item->item_en_mc1_2);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_2=="" && $item->item_ur_mc1_2!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_2!="" && $item->item_ur_mc1_2=="")
								{?>
                                    <div class="col-6">2 - <?php echo html_entity_decode($item->item_en_mc1_2);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">2 - <img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                                <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_2;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            	<div class="col-8 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($item->item_ur_mc1_2);?></div>
                            <?php }?><?php */?>
                          </div>
                          
                          <?php if($item->item_en_mc1_3!="" || $item->item_ur_mc1_3!="" || $item->item_pic_mc1_3){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                             <?php 
							if($item->item_pic_mc1_3!="")
							{
                            	if($item->item_en_mc1_3!="" && $item->item_ur_mc1_3!="")
								{?>
                                    <div class="col-4">3 - <?php echo html_entity_decode($item->item_en_mc1_3);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($item->item_ur_mc1_3);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_3=="" && $item->item_ur_mc1_3!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($item->item_ur_mc1_3);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_3!="" && $item->item_ur_mc1_3=="")
								{?>
                                    <div class="col-6">3 - <?php echo html_entity_decode($item->item_en_mc1_3);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">3 - <img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_3;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo  "3 - ". html_entity_decode($item->item_ur_mc1_3);?></div>
                            <?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_4!="" || $item->item_ur_mc1_4!="" || $item->item_pic_mc1_4){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                          <?php 
							if($item->item_pic_mc1_4!="")
							{
                            	if($item->item_en_mc1_4!="" && $item->item_ur_mc1_4!="")
								{?>
                                    <div class="col-4">4 - <?php echo html_entity_decode($item->item_en_mc1_4);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($item->item_ur_mc1_4);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_4=="" && $item->item_ur_mc1_4!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($item->item_ur_mc1_4);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_4!="" && $item->item_ur_mc1_4=="")
								{?>
                                    <div class="col-6">4 - <?php echo html_entity_decode($item->item_en_mc1_4);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">4 - <img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_4;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right"  style="text-align:right"><?php echo "4 - ".  html_entity_decode($item->item_ur_mc1_4);?></div>
                            <?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_5!="" || $item->item_ur_mc1_5!="" || $item->item_pic_mc1_5){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                           <?php 
							if($item->item_pic_mc1_5!="")
							{
                            	if($item->item_en_mc1_5!="" && $item->item_ur_mc1_5!="")
								{?>
                                    <div class="col-4">5 - <?php echo html_entity_decode($item->item_en_mc1_5);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($item->item_ur_mc1_5);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_5=="" && $item->item_ur_mc1_5!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($item->item_ur_mc1_5);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_5!="" && $item->item_ur_mc1_5=="")
								{?>
                                    <div class="col-6">5 - <?php echo html_entity_decode($item->item_en_mc1_5);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">5 - <img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_5;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "5 - ". html_entity_decode($item->item_ur_mc1_5);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_6!="" || $item->item_ur_mc1_6!="" || $item->item_pic_mc1_6){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc1_6!="")
							{
                            	if($item->item_en_mc1_6!="" && $item->item_ur_mc1_6!="")
								{?>
                                    <div class="col-4">6 - <?php echo html_entity_decode($item->item_en_mc1_6);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($item->item_ur_mc1_6);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_6=="" && $item->item_ur_mc1_6!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($item->item_ur_mc1_6);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_6!="" && $item->item_ur_mc1_6=="")
								{?>
                                    <div class="col-6">6 - <?php echo html_entity_decode($item->item_en_mc1_6);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">6 - <img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "6 - ". html_entity_decode($item->item_ur_mc1_6);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_7!="" || $item->item_ur_mc1_7!="" || $item->item_pic_mc1_7){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                           <?php 
							if($item->item_pic_mc1_7!="")
							{
                            	if($item->item_en_mc1_7!="" && $item->item_ur_mc1_7!="")
								{?>
                                    <div class="col-4">7 - <?php echo html_entity_decode($item->item_en_mc1_7);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($item->item_ur_mc1_7);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_7=="" && $item->item_ur_mc1_7!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($item->item_ur_mc1_7);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_7!="" && $item->item_ur_mc1_7=="")
								{?>
                                    <div class="col-6">7 - <?php echo html_entity_decode($item->item_en_mc1_7);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">7 - <img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:60px;"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "7 - ". html_entity_decode($item->item_ur_mc1_7);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_8!="" || $item->item_ur_mc1_8!="" || $item->item_pic_mc1_8){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc1_8!="")
							{
                            	if($item->item_en_mc1_8!="" && $item->item_ur_mc1_8!="")
								{?>
                                    <div class="col-4">8 - <?php echo html_entity_decode($item->item_en_mc1_8);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($item->item_ur_mc1_8);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_8;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_8=="" && $item->item_ur_mc1_8!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($item->item_ur_mc1_8);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_8;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_8!="" && $item->item_ur_mc1_8=="")
								{?>
                                    <div class="col-6">8 - <?php echo html_entity_decode($item->item_en_mc1_8);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">7 - <img src="<?= base_url().$item->item_pic_mc1_7;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_8;?>" style="max-height:60px;"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "8 - ". html_entity_decode($item->item_ur_mc1_8);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc1_9!="" || $item->item_ur_mc1_9!="" || $item->item_pic_mc1_9){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                           <?php 
							if($item->item_pic_mc1_9!="")
							{
                            	if($item->item_en_mc1_9!="" && $item->item_ur_mc1_9!="")
								{?>
                                    <div class="col-4">9 - <?php echo html_entity_decode($item->item_en_mc1_9);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($item->item_ur_mc1_9);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_9;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_9=="" && $item->item_ur_mc1_9!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($item->item_ur_mc1_9);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_9;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_9!="" && $item->item_ur_mc1_9=="")
								{?>
                                    <div class="col-6">9 - <?php echo html_entity_decode($item->item_en_mc1_9);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">9 - <img src="<?= base_url().$item->item_pic_mc1_9;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_9;?>" style="max-height:60px;"/></div>
                             <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "9 - ". html_entity_decode($item->item_ur_mc1_9);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
						  <?php if($item->item_en_mc1_10!="" || $item->item_ur_mc1_10!="" || $item->item_pic_mc1_10){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc1_10!="")
							{
                            	if($item->item_en_mc1_10!="" && $item->item_ur_mc1_10!="")
								{?>
                                    <div class="col-4">10 - <?php echo html_entity_decode($item->item_en_mc1_10);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($item->item_ur_mc1_10);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_10;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_10=="" && $item->item_ur_mc1_10!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($item->item_ur_mc1_10);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_10;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc1_10!="" && $item->item_ur_mc1_10=="")
								{?>
                                    <div class="col-6">10 - <?php echo html_entity_decode($item->item_en_mc1_10);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc1_6;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">10 - <img src="<?= base_url().$item->item_pic_mc1_10;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc1_10;?>" style="max-height:60px;"/></div>
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
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                          	<?php 
							if($item->item_pic_mc2_a!="")
							{
                            	
								if($item->item_en_mc2_a!="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-4">a - <?php echo html_entity_decode($item->item_en_mc2_a);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_a=="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_a!="" && $item->item_ur_mc2_a=="")
								{?>
                                    <div class="col-6">a - <?php echo html_entity_decode($item->item_en_mc2_a);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">a - <img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
								}
							}
							else
							{
								if($item->item_en_mc2_a!="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-6">a - <?php echo html_entity_decode($item->item_en_mc2_a);?></div>
                                    <div class="col-6 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?><?php //echo '4';?></div><?php 
								}
								elseif($item->item_en_mc2_a=="" && $item->item_ur_mc2_a!="")
								{?>
                                    <div class="col-12 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($item->item_ur_mc2_a);?><?php //echo '5';?></div><?php 
								}
								elseif($item->item_en_mc2_a!="" && $item->item_ur_mc2_a=="")
								{?>
                                    <div class="col-12">a - <?php echo html_entity_decode($item->item_en_mc2_a);?><?php echo '6';?></div><?php
								}
							}
							?>
                            <?php /*?><div class="col-4"><?php if($item->item_en_mc2_a!=""){echo "a - ".html_entity_decode($item->item_en_mc2_a);}?></div>
                            <?php if($item->item_pic_mc2_a!=""){?>
                            <div class="col-4 urdufont-right" style="text-align:right"><?php echo "a - ". html_entity_decode($item->item_ur_mc2_a);?></div>
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_a;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "a - ". html_entity_decode($item->item_ur_mc2_a);?></div>
							<?php }?><?php */?>
                          </div>
                          
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc2_b!="")
							{
                            	if($item->item_en_mc2_b!="" && $item->item_ur_mc2_b!="")
								{?>
                                    <div class="col-4">b - <?php echo html_entity_decode($item->item_en_mc2_b);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($item->item_ur_mc2_b);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_b=="" && $item->item_ur_mc2_b!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($item->item_ur_mc2_b);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_b!="" && $item->item_ur_mc2_b=="")
								{?>
                                    <div class="col-6">b - <?php echo html_entity_decode($item->item_en_mc2_b);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">b - <img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_b;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "b - ". html_entity_decode($item->item_ur_mc2_b);?></div>
							<?php }?><?php */?>
                          </div>
                          
                          <?php if($item->item_en_mc2_c!="" || $item->item_ur_mc2_c!="" || $item->item_pic_mc2_c){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                           <?php 
							if($item->item_pic_mc2_c!="")
							{
                            	if($item->item_en_mc2_c!="" && $item->item_ur_mc2_c!="")
								{?>
                                    <div class="col-4">c - <?php echo html_entity_decode($item->item_en_mc2_c);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($item->item_ur_mc2_c);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_c=="" && $item->item_ur_mc2_c!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($item->item_ur_mc2_c);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_c!="" && $item->item_ur_mc2_c=="")
								{?>
                                    <div class="col-6">c - <?php echo html_entity_decode($item->item_en_mc2_c);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">c - <img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_c;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "c - ". html_entity_decode($item->item_ur_mc2_c);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_d!="" || $item->item_ur_mc2_d!="" || $item->item_pic_mc2_d){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc2_d!="")
							{
                            	if($item->item_en_mc2_d!="" && $item->item_ur_mc2_d!="")
								{?>
                                    <div class="col-4">d - <?php echo html_entity_decode($item->item_en_mc2_d);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($item->item_ur_mc2_d);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_d=="" && $item->item_ur_mc2_d!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($item->item_ur_mc2_d);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_d!="" && $item->item_ur_mc2_d=="")
								{?>
                                    <div class="col-6">d - <?php echo html_entity_decode($item->item_en_mc2_d);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">d - <img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_d;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "d - ". html_entity_decode($item->item_ur_mc2_d);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_e!="" || $item->item_ur_mc2_e!="" || $item->item_pic_mc2_e){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc2_e!="")
							{
                            	if($item->item_en_mc2_e!="" && $item->item_ur_mc2_e!="")
								{?>
                                    <div class="col-4">e - <?php echo html_entity_decode($item->item_en_mc2_e);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($item->item_ur_mc2_e);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_e=="" && $item->item_ur_mc2_e!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($item->item_ur_mc2_e);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_e!="" && $item->item_ur_mc2_e=="")
								{?>
                                    <div class="col-6">e - <?php echo html_entity_decode($item->item_en_mc2_e);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">e - <img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_e;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "e - ". html_entity_decode($item->item_ur_mc2_e);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_f!="" || $item->item_ur_mc2_f!="" || $item->item_pic_mc2_f){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc2_f!="")
							{
                            	if($item->item_en_mc2_f!="" && $item->item_ur_mc2_f!="")
								{?>
                                    <div class="col-4">f - <?php echo html_entity_decode($item->item_en_mc2_f);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($item->item_ur_mc2_f);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_f=="" && $item->item_ur_mc2_f!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($item->item_ur_mc2_f);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_f!="" && $item->item_ur_mc2_f=="")
								{?>
                                    <div class="col-6">f - <?php echo html_entity_decode($item->item_en_mc2_f);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">f - <img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_f;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "f - ". html_entity_decode($item->item_ur_mc2_f);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_g!="" || $item->item_ur_mc2_g!="" || $item->item_pic_mc2_g){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc2_g!="")
							{
                            	if($item->item_en_mc2_g!="" && $item->item_ur_mc2_g!="")
								{?>
                                    <div class="col-4">g - <?php echo html_entity_decode($item->item_en_mc2_g);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($item->item_ur_mc2_g);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_g=="" && $item->item_ur_mc2_g!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($item->item_ur_mc2_g);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_g!="" && $item->item_ur_mc2_g=="")
								{?>
                                    <div class="col-6">g - <?php echo html_entity_decode($item->item_en_mc2_g);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">g - <img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_g;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "g - ". html_entity_decode($item->item_ur_mc2_g);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_h!="" || $item->item_ur_mc2_h!="" || $item->item_pic_mc2_h){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc2_h!="")
							{
                            	if($item->item_en_mc2_h!="" && $item->item_ur_mc2_h!="")
								{?>
                                    <div class="col-4">h - <?php echo html_entity_decode($item->item_en_mc2_h);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($item->item_ur_mc2_h);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_h=="" && $item->item_ur_mc2_h!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($item->item_ur_mc2_h);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_h!="" && $item->item_ur_mc2_h=="")
								{?>
                                    <div class="col-6">h - <?php echo html_entity_decode($item->item_en_mc2_h);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">h - <img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_h;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "h - ". html_entity_decode($item->item_ur_mc2_h);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_i!="" || $item->item_ur_mc2_i!="" || $item->item_pic_mc2_i){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                            <?php 
							if($item->item_pic_mc2_i!="")
							{
                            	if($item->item_en_mc2_i!="" && $item->item_ur_mc2_i!="")
								{?>
                                    <div class="col-4">i - <?php echo html_entity_decode($item->item_en_mc2_i);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($item->item_ur_mc2_i);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_i=="" && $item->item_ur_mc2_i!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($item->item_ur_mc2_i);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_i!="" && $item->item_ur_mc2_i=="")
								{?>
                                    <div class="col-6">i - <?php echo html_entity_decode($item->item_en_mc2_i);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">i - <img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_i;?>" style="max-width:100%; float:right"/></div>
                            <?php }else{?>
                            <div class="col-8 urdufont-right" style="text-align:right"><?php echo "i - ". html_entity_decode($item->item_ur_mc2_i);?></div>
							<?php }?><?php */?>
                          </div>
                          <?php }?>
                          
                          <?php if($item->item_en_mc2_j!="" || $item->item_ur_mc2_j!="" || $item->item_pic_mc2_j){?>
                          <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
                          <div class="row col-12" style="margin-top:10px; line-height:60px">
                          <?php 
							if($item->item_pic_mc2_j!="")
							{
                            	if($item->item_en_mc2_j!="" && $item->item_ur_mc2_j!="")
								{?>
                                    <div class="col-4">j - <?php echo html_entity_decode($item->item_en_mc2_j);?></div>
                                    <div class="col-4 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($item->item_ur_mc2_j);?></div>
                                    <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_j=="" && $item->item_ur_mc2_j!="")
								{?>
                                    <div class="col-6 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($item->item_ur_mc2_j);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-height:60px;"/></div><?php 
								}
								elseif($item->item_en_mc2_j!="" && $item->item_ur_mc2_j=="")
								{?>
                                    <div class="col-6">j - <?php echo html_entity_decode($item->item_en_mc2_j);?></div>
                                    <div class="col-6"><img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-height:60px;"/></div><?php 
								}
								else
								{?>
									<div class="col-6">j - <img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-height:60px;"/></div>
                                    <div class="col-6"></div><?php
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
                            <div class="col-4"><img src="<?= base_url().$item->item_pic_mc2_j;?>" style="max-width:100%; float:right"/></div>
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
                            <h3><label for="item_mc_ans_key" class="control-label" style="padding-top:11px">Answer</label></h3>
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
                          <div class="row col-12" style="margin-top:14px; line-height:60px">1 - <?php echo $ans1;?></div>
                          <?php } if($ans2!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">2 - <?php echo $ans2;?></div>
                          <?php } if($ans3!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">3 - <?php echo $ans3;?></div>
                          <?php } if($ans4!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">4 - <?php echo $ans4;?></div>
                          <?php } if($ans5!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">5 - <?php echo $ans5;?></div>
                          <?php } if($ans6!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">6 - <?php echo $ans6;?></div>
                          <?php } if($ans7!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">7 - <?php echo $ans7;?></div>
                          <?php } if($ans8!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">8 - <?php echo $ans8;?></div>
                          <?php } if($ans9!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">9 - <?php echo $ans9;?></div>
                          <?php } if($ans10!=""){?>
                          <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
                          <!------------------------------------------------------>
                          <div class="row col-12" style="margin-top:15px; line-height:60px">10 - <?php echo $ans10;?></div>
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
  <div class="row col-lg-12">
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
            <?php $i=1;
				//array_pop($logs);
				foreach($logs as $log){
				  $log_sms = $log->log_message;
				  $new_string = str_replace("{log_admin_id}", '<span style="font-size:16px; font-weight:bold">'.$log->username.'</span>', $log_sms);
				  $new_string = str_replace("{log_itemwriter_id}", '<span style="font-size:16px; font-weight:bold">'.$log->username.'</span>', $new_string);
				  $new_string = str_replace("{log_itemid}", '<span style="font-size:16px; font-weight:bold">'.'ID: '.$log->log_itemid.'</span>', $new_string);
				  $new_string = str_replace("{log_date}", '<span style="font-size:16px; font-weight:bold">'.$log->log_date.'</span>', $new_string);
				
				  ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $log->username;?></td>
                    <td><?php echo $log->log_title;?></td>
                    <td><?php echo $new_string;?></td>
                    <td><?php echo $log->log_comment;?></td>
                    <td><?php echo date("d-M-Y (h:i a)",strtotime($log->log_date));?></td>
                    <?php /*?><td><?php 
					if($log->log_itemhis_id!=0)
					{
						if (strpos($log->log_messagetype, 'rev_') !== false) 
						{?><a href="<?= base_url('admin/items/get_rev_item_history_compare/'.$log->log_itemhis_id."-".$item->item_id."-".$log->log_id); ?>" class="btn btn-success" target="_blank"> History</a><?php }
						else
						{?><a href="<?= base_url('admin/items/get_item_history_compare/'.$log->log_itemhis_id."-".$item->item_id."-".$log->log_id); ?>" class="btn btn-success" target="_blank"> History</a><?php }
						?>
                    <?php 
					} 
					else 
					{
						echo 'No history found';
					}
					?></td><?php */?>
                  </tr>
              <?php } ?>
              </table>
			  <?php 
			  }
			  else {echo 'No log history found';}?>
            <?php if($item->item_status_ae==0){?>
			<?php echo form_open(base_url('admin/items/submit_for_approval_his_log/'.$item->item_id), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>
            <label for="item_comment_ae" class="col-sm-6 control-label" style="margin-top:15px">Comments</label>
            <textarea id="item_comment_ae" name="item_comment_ae" rows="4" cols="55" style="width:100%; margin-bottom:15px" required="required"></textarea>
            <input type="submit" name="submit" id="submit" value="Accept Item" class="btn btn-success pull-right" style="margin:5px 0px;">
            <a href=<?php echo base_url('admin/items/edit_combine/'.$item->item_id); ?>><input type="button" name="edit" id="edit" value="Edit Item" class="btn btn-info pull-right" style="margin:5px;"></a>
            <input type="submit" name="reject" id="reject" value="Revise Item" class="btn btn-danger pull-right" style="margin:5px 0px; width:110px">
            <?php echo form_close( );?>
            <?php } ?>
            <?php if ($item->item_status_ae==1 && $item->item_status_ae==0){?>
            <a href=<?php echo base_url('admin/items/edit_combine/'.$item->item_id); ?>><input type="button" name="edit" id="edit" value="Edit Rejected Item" class="btn btn-info pull-right" style="margin:10px 0px"></a>
        <?php }?>
        <a href="<?= base_url('admin/items/history_compare/'.$item->item_id); ?>" class="btn btn-success pull-right" style="margin:10px 10px;">History</a> 
        </div>
    </div>
</div>
			<!---- end  here is item view filmzy --->			
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
