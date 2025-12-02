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
.ch_img_borders{
	border-width:1px;
	border-style:solid;
	border-color:#F00;
	border-radius: 10px;
}
.urdufont-right{
	font-size:18px;
}
</style>
<?php 
$itemhistory = isset($itemshistory)?$itemshistory[0]:NULL;
$items = isset($items[0])?$items[0]:NULL;
?>
<div class="content-wrapper">
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Versioning View</h3>
          </div>
        </div>
        <div class="card-body"> 
        	<div class="row">
            	<div class="col-6 borders">
                <?php
				   if(isset($items)&&(!empty($items))){ 
					$ssinfo = (isset($ssinfo[0]))?$ssinfo[0]:"";	   
					$aeinfo = (isset($aeinfo[0]))?$aeinfo[0]:"";
					$psyinfo = (isset($psyinfo[0]))?$psyinfo[0]:"";
					$this->load->view('admin/includes/_messages.php'); 
				?>
                <div class="row" style="font-size:14px; color:#900; padding-left:15px; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif"><span style="font-size:20px"><u>ITEM LATEST VIEW ( Item ID : <?php echo $items->item_id; ?> ) </u></span></div>
				<div class="container" style="padding-top:25px">
		  <div class="row">
			<div class="col-8">
				<div class="row col-12">
					<div class="col-4">
					  <div> <img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" width="60%" /></div>
					</div>
					<div class="col-8">
					  <div class="col-12" style="font-size:20px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC]</div>
					  <div class="col-12" style="font-size:16px; text-align:center; margin-top:1%">Wahdat Colony Road, Lahore</div>
					</div>
				</div>
				<div class="row col-12">
					<div class="col-12" style="padding-left:15px; padding-top:10px; font-size:12px">
						<div class="col-12" style="font-weight:bold;">
							<table width="100%" class="border-bottom"><tr><td width="40%">Date Received : </td><td><?php echo date("d-M-Y (h:i a)",strtotime($items->item_date_received));?></td></tr></table>
						</div>
						<div class="col-lg-12 col-sm-12" style="font-weight:bold">
							<table width="100%" class="border-bottom"><tr><td width="40%">Item Writer Name : </td><td><?php echo $items->firstname.' '.$items->lastname.' ('.$items->username.')';?></td></tr></table>
						</div>
						<div class="col-lg-12 col-sm-12" style="font-weight:bold">
							<table width="100%" class="border-bottom"><tr><td width="40%">Registration No. : </td><td>PEC-<?php echo $items->item_submittedby;?></td></tr></table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4" >
			  <div class="col-12" style="alignment-adjust:central; ">
				<table border="1px" bordercolor="#000000" width="100%" style="float:right; font-weight:bold; font-size:12px" cellpadding="7px" >
				  <tr>
					<td colspan="3" style="text-align:center">For official Use Only</td>
				  </tr>
				  <tr>
					<td colspan="3">Item Code:&emsp; <?php echo $items->item_code;?></td>
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
					<td style="text-align:center"><?php echo $items->item_difficulty;?></td>
					<td style="text-align:center"><?php echo $items->item_discr;?></td>
					<td style="text-align:center"><?php echo $items->item_dif_code;?></td>
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
				<td colspan="2">Other Page</td>
			</tr>
			<tr>
				<td colspan="3"><?php echo $items->subject_name_en;?></td>
				<td><?php echo $items->grade_name_en;?></td>
				<td colspan="2"><?php echo $items->item_pctb_chapter;?></td>
				<td><?php echo $items->item_pctb_page;?></td>
				<td><?php echo $items->item_other_title;?></td>
				<td><?php echo $items->item_other_year;?></td>
				<td colspan="2"><?php echo $items->item_other_page;?></td>
			</tr>
			<tr>
				<td colspan="3"><?php 	if($items->item_curriculum=='1'){echo '2006(ALP)';}
										elseif($items->item_curriculum=='2'){echo 'National Curriculum (2006)';}
										else{ echo 'Single National Curriculum(SNC) 2020';}?></td>
				<td>SLO # <?php echo $items->slo_number;?></td>
				<td rowspan="2" colspan="6">SLO text: <?php echo $items->slo_statement_en;?><span class="urdufont-right" style="font-size:20px;" ><?php echo $items->slo_statement_ur;?></span></td>
			</tr>
			<tr>
				<td colspan="3">Content Strand:</td>
				<td><?php echo $items->cs_statement_en;?><span class="urdufont-right"><?php echo $items->cs_statement_ur;?></span></td>
			</tr>
			<tr>
				<td colspan="4"><?php echo $items->item_cognitive_bloom;?><br />(Please tick one)</td>
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
						<td style="border-right: 1px solid black; width:16%"><?php if ($items->item_cognitive_bloom == 'Knowledge'){echo 'Yes';}?></td>
						<td style="border-right: 1px solid black; width:16%"><?php if ($items->item_cognitive_bloom == 'Comprehension'){echo 'Yes';}?></td>
                        <td style="border-right: 1px solid black; width:18%"><?php if ($items->item_cognitive_bloom == 'Application'){echo 'Yes';}?></td>
                        <td style="border-right: 1px solid black; width:17%"><?php if ($items->item_cognitive_bloom == 'Analysis'){echo 'Yes';}?></td>
                        <td style="border-right: 1px solid black; width:17%"><?php if ($items->item_cognitive_bloom == 'Synthesis'){echo 'Yes';}?></td>
                        <td style="width:16%"><?php if ($items->item_cognitive_bloom == 'Evaluation'){echo 'Yes';}?></td>
                      </tr>
					</table>
				</td>
				<td colspan="2"><?php if ($items->item_relation=='Direct Quote'){echo 'Yes';}?></td>
				<td colspan="2"><?php if ($items->item_relation=='Amended'){echo 'Yes';}?></td>
				<td><?php echo $items->item_option_correct;?></td>
				<td><?php echo $items->item_type;?></td>
			</tr>
		  </table>
		  </div>
		  <div class="row col-lg-12" style="padding-top:02px;" >
			  
			   <?php
				   if(isset($items->item_id)&&$items->item_id!=0)
				   {
					 ?>
					   <table width="100%" style="margin-top:10px;" >
					<?php 
					if ($items->item_image_position=='Full_Page') 
					{
						if($items->item_image_en!="" && $items->item_image_ur==""){?>
						<div class="row">
							<div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="row" style="margin-top:15px">
                            <?php if($items->item_image_en == $itemhistory->item_image_en && $items->item_image_position == $itemhistory->item_image_position){?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
                            </div>
						</div>
					<?php } elseif($items->item_image_en=="" && $items->item_image_ur!="") {?>
						<div class="row">
							<div class="row urdufont-right" style="font-weight:bold; font-size:20px"> سوال :&nbsp;</div>
							<div class="row" style="margin-top:15px">
                            <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
                            </div>
						</div>
					<?php } else 
							{?>
								<div class="row">
								<div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="row urdufont-right" style="font-weight:bold; font-size:26px"> سوال :&nbsp;</div>
								<div class="row" style="margin-top:15px">
                                <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
                                <img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
                                <?php } else{?>
                                <img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
                                <?php }?>
                                </div>
								</div>
					<?php	}
					}
					else
					{
						 if ($items->item_image_position=='Top') 
							{
								if($items->item_image_en!="" && $items->item_image_ur!="") 
								{
									?>
									 <tr>
										<td>
                                        <?php if($items->item_image_en == $itemhistory->item_image_en && $items->item_image_position == $itemhistory->item_image_position){?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?></td>
										<td style="float:right; text-align:right">
                                        <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
                                        </td>
									  </tr>
									<?php 
								}
								elseif($items->item_image_en!=""&&$items->item_image_ur=="")
								{
								?>
									 <tr>
										<td colspan="2" style="text-align:center;">
                                        <?php if($items->item_image_en == $itemhistory->item_image_en && $items->item_image_position == $itemhistory->item_image_position){?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?></td>          	
									  </tr>
									<?php 	
								}
								elseif($items->item_image_en==""&&$items->item_image_ur!="")
								{
								?>
									 <tr>
										<td colspan="2" style="text-align:center">
                                        <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?></td>          	
									  </tr>
									<?php 	
								}
							}
						?>
							<?php if ($items->item_stem_en!=""){?>
							<tr><td colspan="2" >
							<?php if($items->item_image_position=='Left' && $items->item_image_en!="")
							{?> 
                            <?php if($items->item_image_en == $itemhistory->item_image_en && $items->item_image_position == $itemhistory->item_image_position){?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
                            <?php }?>
							<?php 
							if($items->item_stem_en == $itemhistory->item_stem_en){?>
                            <span style="font-weight:bold; font-size:20px; color:#F00">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo html_entity_decode($items->item_stem_en);?></span>
                            <?php } else{?>
                            <span style="font-weight:bold; font-size:20px;">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo html_entity_decode($items->item_stem_en);?></span>
                            <?php }?>
                            
							<?php if($items->item_image_position=='Right' && $items->item_image_en!="")
							{?> <?php if($items->item_image_en == $itemhistory->item_image_en && $items->item_image_position == $itemhistory->item_image_position){?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
                            <?php }?>
							</td></tr>
							<?php }?>
							
							<?php if ($items->item_stem_ur!=""){?>
							 <tr><td colspan="2" class="urdufont-right" style="text-align:right">
							<?php if($items->item_image_position=='Left' && $items->item_image_ur!="")
							{?> 
                            <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
                            <?php }?>
                            
                            <?php if($items->item_stem_ur == $itemhistory->item_stem_ur){?>سوال :&nbsp;
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_stem_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00">سوال :&nbsp;<?php echo html_entity_decode($items->item_stem_ur);?></span>
                                    <?php }?>
                                    
							
                            
							<?php if($items->item_image_position=='Right' && $items->item_image_ur!="")
							{?> 
                            <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
							<?php }?>
							</td></tr>
							<?php }?>
							
						<?php if ($items->item_image_position=='Bottom') 
						{
							if($items->item_image_en!="" && $items->item_image_ur!="") 
							{
								?>
								 <tr>
									<td style="float:left">
                                    <?php if($items->item_image_en == $itemhistory->item_image_en && $items->item_image_position == $itemhistory->item_image_position){?>
                                    <img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center"/>
                                    <?php } else{?>
                                    <img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
                                    <?php }?>
                                    </td>
									<td style="float:right">
                                    <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?></td>
								  </tr>
								<?php 
							}
							elseif($items->item_image_en!=""&&$items->item_image_ur=="")
							{
							?>
								 <tr>
									<td colspan="2" style="text-align:center;">
                                    <?php if($items->item_image_en == $itemhistory->item_image_en && $items->item_image_position == $itemhistory->item_image_position){?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_en;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?></td>          	
								  </tr>
								<?php 	
							}
							elseif($items->item_image_en==""&&$items->item_image_ur!="")
							{
							?>
								 <tr>
									<td colspan="2" style="text-align:center">
                                    <?php if($items->item_image_ur == $itemhistory->item_image_ur && $items->item_image_position == $itemhistory->item_image_position)
{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center"/>
							<?php } else{?>
							<img src="<?= base_url().$items->item_image_ur;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" />
							<?php }?>
                            </td>          	
								  </tr>
								<?php 	
							}
						}
					}
						
				if($items->item_type=='MCQ')
				{	
					if($items->item_option_layout=='1')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2" >
		  <tr>
			<td style="font-size:20px">(a) 
				<?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                <span><?php echo html_entity_decode($items->item_option_a_en);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                <?php }?>
            </td>
			<td style="padding-left:50px"><div class="urdufont-right" >
				<?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                <span><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                <?php }?></div>
            </td>
		  </tr>
		</table>
		</td>
		  </tr>
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td style="font-size:20px">(b) 
            	<?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                <span><?php echo html_entity_decode($items->item_option_b_en);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                <?php }?>
            </td>
			<td style="padding-left:50px"><div class="urdufont-right" >
				<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                <span><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                <?php }?></div>
            </td>
		  </tr>
		</table></td>
		  </tr>
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td style="font-size:20px">(c) 
            <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                <span><?php echo html_entity_decode($items->item_option_c_en);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                <?php }?>
            </td>
			<td style="padding-left:50px"><div class="urdufont-right" >
			<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                <span><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                <?php }?>
			</div></td>
		  </tr>
		</table></td>
		  </tr>
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td style="font-size:20px">(d) 
            <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                <span><?php echo html_entity_decode($items->item_option_d_en);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                <?php }?>
            </td>
			<td style="padding-left:50px"><div class="urdufont-right" style="text-align:right">
			<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                <span><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                <?php } else{?>
                <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                <?php }?>
			</div></td>
		  </tr>
		</table></td>
		  </tr>
		</table>
		</td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='2')
					{
						?>
					   <tr>
                              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(a) 
									<?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                </td>
                                <td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
								</div></td>
                              </tr>
                            </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(b) 
                                <?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php }?>
                                </td>
                                <td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php }?>
								</div></td>
                              </tr>
                            </table></td>
                              </tr>
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(c) 
                                <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?>
                                </td>
                                <td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
                                </div></td>
                              </tr>
                            </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(d) 
                                <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?>
                                </td>
                                <td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
								</div></td>
                              </tr>
                    
                    
                            </table></td>
                              </tr>
                            </table>
                            </td>
						</tr>
						<?php
					}
					elseif($items->item_option_layout=='3')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) 
                                <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
								</div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                  <span><?php echo html_entity_decode($items->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
									<?php echo html_entity_decode($items->item_option_b_ur);?></div></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?>
                                    <span><?php echo html_entity_decode($items->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='4')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <?php if($items->item_option_a_image == $itemhistory->item_option_a_image){?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?>
                            </td>
							  </tr>
							</table>
							</td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_b_image == $itemhistory->item_option_b_image){?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_image == $itemhistory->item_option_c_image){?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_image == $itemhistory->item_option_d_image){?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
							  </tr>
						
						<?php
					}
					elseif($items->item_option_layout=='5')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <?php if($items->item_option_a_image == $itemhistory->item_option_a_image){?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_b_image == $itemhistory->item_option_b_image){?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_image == $itemhistory->item_option_c_image){?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_image == $itemhistory->item_option_d_image){?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='6')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:15px">
							  <tr>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(a) <?php if($items->item_option_a_image == $itemhistory->item_option_a_image){?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:175px;"/><?php */?></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(b) <?php if($items->item_option_b_image == $itemhistory->item_option_b_image){?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:175px;"/><?php */?></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(c) <?php if($items->item_option_c_image == $itemhistory->item_option_c_image){?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:175px;"/><?php */?></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(d) <?php if($items->item_option_d_image == $itemhistory->item_option_d_image){?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:175px;"/><?php */?></td>
								  </tr>
								  </table>
							  </td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='7')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?></td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $items->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table>
							</td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php }?></td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $items->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?></td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $items->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?></td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $items->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='8')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><?php if($items->item_option_a_image == $itemhistory->item_option_a_image){?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-height:400px;"/><?php */?></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><?php if($items->item_option_b_image == $itemhistory->item_option_b_image){?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-height:400px;"/><?php */?></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span style="padding-left:20px"><?php if($items->item_option_c_image == $itemhistory->item_option_c_image){?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-height:400px;"/><?php */?></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
									</div></td>
								<td><span style="padding-left:20px"><?php if($items->item_option_d_image == $itemhistory->item_option_d_image){?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-height:400px;"/><?php */?></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='9')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) 
                                <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							  <tr>
								<td colspan="2"><?php if($items->item_option_a_image == $itemhistory->item_option_a_image){?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							  <tr>
								<td colspan="2"><?php if($items->item_option_b_image == $itemhistory->item_option_b_image){?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_b_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							  <tr>
								<td colspan="2"> <?php if($items->item_option_c_image == $itemhistory->item_option_c_image){?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_c_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							  <tr>
								<td colspan="2"><?php if($items->item_option_d_image == $itemhistory->item_option_d_image){?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_d_image;?>" style="max-height:400px;"/><?php */?></td>
							  </tr>
							  
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='10')
					{
						?>
					   <tr>
						  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
							<td><?php if($items->item_option_a_image == $itemhistory->item_option_a_image){?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-height:400px;"/><?php */?></td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='11')
					{
						?>
					   <tr>
						  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							</table> </td>
							<td><?php if($items->item_option_a_image == $itemhistory->item_option_a_image){?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php }?><?php /*?><img src="<?= base_url().$items->item_option_a_image;?>" style="max-height:400px;"/><?php */?></td>
						</tr>
						
						<?php
					}
					elseif($items->item_option_layout=='12')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <?php if($items->item_option_a_en == $itemhistory->item_option_a_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_a_ur == $itemhistory->item_option_a_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_a_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
		
							  <tr>
								<td>(b) <?php if($items->item_option_b_en == $itemhistory->item_option_b_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_b_ur == $itemhistory->item_option_b_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_b_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <?php if($items->item_option_c_en == $itemhistory->item_option_c_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_c_ur == $itemhistory->item_option_c_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_c_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <?php if($items->item_option_d_en == $itemhistory->item_option_d_en){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_en);?></span>
                                    <?php }?>
                                    </td>
								<td><div class="urdufont-right" style="padding-left:20px">
								<?php if($items->item_option_d_ur == $itemhistory->item_option_d_ur){?>
                                    <span style="font-weight:bold; font-size:20px;"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php } else{?>
                                    <span style="font-weight:bold; font-size:20px; color:#F00"><?php echo html_entity_decode($items->item_option_d_ur);?></span>
                                    <?php }?>
									</div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td colspan="4" style="text-align:center"><img src="<?= base_url().$items->item_option_a_image;?>" style="max-height:400px;"/></td>
							  </tr>
							</table>
							</td>
						</tr>
						<?php
					}
				}
				elseif($items->item_type=='ERQ')
				{
					if($items->item_rubric_image!='')
					{
						  if($items->item_rubric_urdu!=''&&$items->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($items->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td></tr>
								<?php }?>
								<tr>
									<td style="width:50%">
										<?php if($items->item_rubric_english == $itemhistory->item_rubric_english){echo '<span style="color:#F00">'.$items->item_rubric_english.'</span>';}else{echo $items->item_rubric_english;} ?>
                                   </td>
									<td class="urdufont-right" style="text-align:right">
										<?php if($items->item_rubric_urdu == $itemhistory->item_rubric_urdu){echo '<span style="color:#F00">'.$items->item_rubric_urdu.'</span>';}else{echo $items->item_rubric_urdu;}?>
									</td>
								</tr>
								<?php if($items->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td></tr>
								<?php }?>
							  </table>
						  <?php }
						  
						  elseif($items->item_rubric_urdu==''&&$items->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($items->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td></tr>
								<?php }?>
							   
								<tr>
									<?php if($items->item_rubric_image_position=='Left'){?>
									<td width="50%"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td>
									<?php }?>
								
									<td><?php if($items->item_rubric_english == $itemhistory->item_rubric_english){echo '<span style="color:#F00">'.$items->item_rubric_english.'</span>';}else{echo $items->item_rubric_english;}?></td>
									
									<?php if($items->item_rubric_image_position=='Right'){?>
									<td width="50%"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td>
									<?php }?>
								</tr>
							   
								<?php if($items->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td></tr>
								<?php }?>
							  </table>
					  <?php }
					  
						  elseif($items->item_rubric_urdu!=''&&$items->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($items->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td></tr>
							<?php }?>
							<tr>
								<?php if($items->item_rubric_image_position=='Left'){?>
								<td width="50%"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td>
								<?php }?>
								<td style="text-align:right"><span class="urdufont-right"><?php if($items->item_rubric_urdu == $itemhistory->item_rubric_urdu){echo '<span style="color:#F00">'.$items->item_rubric_urdu.'</span>';}else{echo $items->item_rubric_urdu;}?></span></td>
								<?php if($items->item_rubric_image_position=='Right'){?>
								<td width="50%"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td>
								<?php }?>
							</tr>
							<?php if($items->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td></tr>
							<?php }?>
						  </table>
					  <?php }
						  
						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><?php if($items->item_rubric_image == $itemhistory->item_rubric_image && $items->item_rubric_image_position == $itemhistory->item_rubric_image_position){?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px;" /><?php } else{?><img src="<?= base_url().$items->item_rubric_image;?>" style="max-width:100%; text-align:center"/><?php }?></td></tr>
							  </table>
					  <?php }
					}
					else
					{
						  if($items->item_rubric_urdu==''&&$items->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php if($items->item_rubric_english == $itemhistory->item_rubric_english){echo '<span style="color:#F00">'.$items->item_rubric_english.'</span>';}else{echo $items->item_rubric_english;}?></td></tr></table>
					  <?php 
						  }
						  elseif($items->item_rubric_urdu!=''&&$items->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right"><?php if($items->item_rubric_urdu == $itemhistory->item_rubric_urdu){echo '<span style="color:#F00">'.$items->item_rubric_urdu.'</span>';}else{echo $items->item_rubric_urdu;}?></span></td></tr></table>
					  <?php }
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr>
									<td style="width:50%; font-size:18px">
										<?php if($items->item_rubric_english == $itemhistory->item_rubric_english){echo '<span style="color:#F00">'.$items->item_rubric_english.'</span>';}else{echo $items->item_rubric_english;}?>
										<?php /*echo  html_entity_decode($items->item_rubric_english);*/?>
									</td>
									<td class="urdufont-right" style="text-align:right">
										<?php if($items->item_rubric_urdu == $itemhistory->item_rubric_urdu){echo '<span style="color:#F00">'.$items->item_rubric_urdu.'</span>';}else{echo $items->item_rubric_urdu;}?>
									</td>
								  </tr>
							  </table>
						  <?php 
						  }
					  }
				}
				elseif($items->item_type=='FIB')
				{
					 if($items->item_fib_key_ur==''&&$items->item_fib_key_eng!='')
					  {?>
						  <table style="margin:20px 0px 0px 50px"><tr ><td style="font-size:16px; font-weight:bold;">Key (English) :</td><td><?php if($items->item_fib_key_eng != $itemhistory->item_fib_key_eng){echo html_entity_decode($items->item_fib_key_eng);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_fib_key_eng).'</span>';}?></td></tr></table>
						  <?php 
						  }
						  elseif($items->item_fib_key_ur!=''&&$items->item_fib_key_eng=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">جواب (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right"><?php if($items->item_fib_key_ur != $itemhistory->item_fib_key_ur){echo html_entity_decode($items->item_fib_key_ur);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_fib_key_ur).'</span>';}?></span></td></tr></table>
					  <?php }
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr>
									<td style="width:50%; font-size:18px">
										<?php if($items->item_fib_key_eng != $itemhistory->item_fib_key_eng){echo html_entity_decode($items->item_fib_key_eng);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_fib_key_eng).'</span>';}?>
									</td>
									<td class="urdufont-right" style="text-align:right">
										<?php if($items->item_fib_key_ur != $itemhistory->item_fib_key_ur){echo html_entity_decode($items->item_fib_key_ur);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_fib_key_ur).'</span>';}?>
									</td>
								  </tr>
							  </table>
						  <?php 
					  }
				}
				elseif($items->item_type=='TF')
				{
				  ?>
					  <table width="100%" style="margin:10px 50px 10px 50px">
						<tr><td>Options :</td></tr>
						<tr>
							<td style="padding-left:25px">a. <?php if($items->item_tf_eng_1 == $itemhistory->item_tf_eng_1){echo '<span style="color:#F00">'.html_entity_decode($items->item_tf_eng_1).'</span>';}else{echo html_entity_decode($items->item_tf_eng_1);}?></td>
							<td><div class="col-12 urdufont-right"><?php if($items->item_tf_ur_1 == $itemhistory->item_tf_ur_1){echo '<span style="color:#F00">'.html_entity_decode($items->item_tf_ur_1).'</span>';}else{echo html_entity_decode($items->item_tf_ur_1);}?></div></td>
						</tr>
						<tr>
							<td style="padding-left:25px">b. <?php if($items->item_tf_eng_2 == $itemhistory->item_tf_eng_2){echo '<span style="color:#F00">'.html_entity_decode($items->item_tf_eng_2).'</span>';}else{echo html_entity_decode($items->item_tf_eng_2);}?></td>
							<td><div class="col-12 urdufont-right"><?php if($items->item_tf_ur_2 == $itemhistory->item_tf_ur_2){echo '<span style="color:#F00">'.html_entity_decode($items->item_tf_ur_2).'</span>';}else{echo html_entity_decode($items->item_tf_ur_2);}?></div></td>
						</tr>
						<?php /*?><tr><td>Answer Key :</td><td><?php echo $items->item_option_correct;?> </td></tr><?php */?>
					  </table>
				  <?php 
				}
				elseif($items->item_type=='MC')
				{?>
					<table width="100%" style="font-size:14px; margin-bottom:15px">
						<tr>
							<td>
							<div class="row">
							  <div class="col-5 ">
								<div class="row" style="margin-bottom:10px">
								  <div class="col-12">
									<h3>Column-I</h3>
								  </div>
								</div>
								<div class="row col-12 borders" style="padding-bottom:8px">
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc1_1!="")
									{
										if($items->item_en_mc1_1!="" && $items->item_ur_mc1_1!="")
										{?>
											<div class="col-4">1 - <?php if($items->item_en_mc1_1 != $itemhistory->item_en_mc1_1){echo html_entity_decode($items->item_en_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_1).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right; font-size:18px">1 - <?php if($items->item_ur_mc1_1 != $itemhistory->item_ur_mc1_1){echo html_entity_decode($items->item_ur_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_1).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_1 == $itemhistory->item_pic_mc1_1){?><img src="<?= base_url().$items->item_pic_mc1_1;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_1;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_1=="" && $items->item_ur_mc1_1!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">1 - <?php if($items->item_ur_mc1_1 != $itemhistory->item_ur_mc1_1){echo html_entity_decode($items->item_ur_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_1).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_1 == $itemhistory->item_pic_mc1_1){?><img src="<?= base_url().$items->item_pic_mc1_1;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_1;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?>></div><?php 
										}
										elseif($items->item_en_mc1_1!="" && $items->item_ur_mc1_1=="")
										{?>
											<div class="col-6">1 - <?php if($items->item_en_mc1_1 != $itemhistory->item_en_mc1_1){echo html_entity_decode($items->item_en_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_1).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_1 == $itemhistory->item_pic_mc1_1){?><img src="<?= base_url().$items->item_pic_mc1_1;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_1;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?>></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_1!="" && $items->item_ur_mc1_1!="")
										{?>
											<div class="col-6">1 - <?php if($items->item_en_mc1_1 != $itemhistory->item_en_mc1_1){echo html_entity_decode($items->item_en_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_1).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">1 - <?php if($items->item_ur_mc1_1 != $itemhistory->item_ur_mc1_1){echo html_entity_decode($items->item_ur_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_1).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_1=="" && $items->item_ur_mc1_1!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">1 - <?php if($items->item_ur_mc1_1 != $itemhistory->item_ur_mc1_1){echo html_entity_decode($items->item_ur_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_1).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_1!="" && $items->item_ur_mc1_1=="")
										{?>
											<div class="col-12">1 - <?php if($items->item_en_mc1_1 != $itemhistory->item_en_mc1_1){echo html_entity_decode($items->item_en_mc1_1);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_1).'</span>';}?></div><?php
										}
									}
									?>
								  </div>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($items->item_pic_mc1_2!="")
									{
										if($items->item_en_mc1_2!="" && $items->item_ur_mc1_2!="")
										{?>
											<div class="col-4">1 - <?php if($items->item_en_mc1_2 != $itemhistory->item_en_mc1_2){echo html_entity_decode($items->item_en_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_2).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">2 - <?php if($items->item_ur_mc1_2 != $itemhistory->item_ur_mc1_2){echo html_entity_decode($items->item_ur_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_2).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_2 == $itemhistory->item_pic_mc1_2){?><img src="<?= base_url().$items->item_pic_mc1_2;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_2;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_2=="" && $items->item_ur_mc1_2!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">2 - <?php if($items->item_ur_mc1_2 != $itemhistory->item_ur_mc1_2){echo html_entity_decode($items->item_ur_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_2).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_2 == $itemhistory->item_pic_mc1_2){?><img src="<?= base_url().$items->item_pic_mc1_2;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_2;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_2!="" && $items->item_ur_mc1_2=="")
										{?>
											<div class="col-6">2 - <?php if($items->item_en_mc1_2 != $itemhistory->item_en_mc1_2){echo html_entity_decode($items->item_en_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_2).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_2 == $itemhistory->item_pic_mc1_2){?><img src="<?= base_url().$items->item_pic_mc1_2;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_2;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_2!="" && $items->item_ur_mc1_2!="")
										{?>
											<div class="col-6">2 - <?php if($items->item_en_mc1_2 != $itemhistory->item_en_mc1_2){echo html_entity_decode($items->item_en_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_2).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">2 - <?php if($items->item_ur_mc1_2 != $itemhistory->item_ur_mc1_2){echo html_entity_decode($items->item_ur_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_2).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_2=="" && $items->item_ur_mc1_2!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">2 - <?php if($items->item_ur_mc1_2 != $itemhistory->item_ur_mc1_2){echo html_entity_decode($items->item_ur_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_2).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_2!="" && $items->item_ur_mc1_2=="")
										{?>
											<div class="col-12">2 - <?php if($items->item_en_mc1_2 != $itemhistory->item_en_mc1_2){echo html_entity_decode($items->item_en_mc1_2);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_2).'</span>';}?></div><?php
										}
									}
									?>
								   
								  </div>
								  
								  <?php if($items->item_en_mc1_3!="" || $items->item_ur_mc1_3!="" || $items->item_pic_mc1_3){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									 <?php 
									if($items->item_pic_mc1_3!="")
									{
										if($items->item_en_mc1_3!="" && $items->item_ur_mc1_3!="")
										{?>
											<div class="col-4">3 - <?php if($items->item_en_mc1_3 != $itemhistory->item_en_mc1_3){echo html_entity_decode($items->item_en_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_3).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">3 - <?php if($items->item_ur_mc1_3 != $itemhistory->item_ur_mc1_3){echo html_entity_decode($items->item_ur_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_3).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_3 == $itemhistory->item_pic_mc1_3){?><img src="<?= base_url().$items->item_pic_mc1_3;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_3;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_3=="" && $items->item_ur_mc1_3!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">3 - <?php if($items->item_ur_mc1_3 != $itemhistory->item_ur_mc1_3){echo html_entity_decode($items->item_ur_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_3).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_3 == $itemhistory->item_pic_mc1_3){?><img src="<?= base_url().$items->item_pic_mc1_3;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_3;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_3!="" && $items->item_ur_mc1_3=="")
										{?>
											<div class="col-6">3 - <?php if($items->item_en_mc1_3 != $itemhistory->item_en_mc1_3){echo html_entity_decode($items->item_en_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_3).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_3 == $itemhistory->item_pic_mc1_3){?><img src="<?= base_url().$items->item_pic_mc1_3;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_3;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_3!="" && $items->item_ur_mc1_3!="")
										{?>
											<div class="col-6">3 - <?php if($items->item_en_mc1_3 != $itemhistory->item_en_mc1_3){echo html_entity_decode($items->item_en_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_3).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">3 - <?php if($items->item_ur_mc1_3 != $itemhistory->item_ur_mc1_3){echo html_entity_decode($items->item_ur_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_3).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_3=="" && $items->item_ur_mc1_3!="")
										{?>
		
											<div class="col-12 urdufont-right" style="text-align:right">3 - <?php if($items->item_ur_mc1_3 != $itemhistory->item_ur_mc1_3){echo html_entity_decode($items->item_ur_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_3).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_3!="" && $items->item_ur_mc1_3=="")
										{?>
											<div class="col-12">3 - <?php if($items->item_en_mc1_3 != $itemhistory->item_en_mc1_3){echo html_entity_decode($items->item_en_mc1_3);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_3).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc1_4!="" || $items->item_ur_mc1_4!="" || $items->item_pic_mc1_4){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								  <?php 
									if($items->item_pic_mc1_4!="")
									{
										if($items->item_en_mc1_4!="" && $items->item_ur_mc1_4!="")
										{?>
											<div class="col-4">4 - <?php if($items->item_en_mc1_4 != $itemhistory->item_en_mc1_4){echo html_entity_decode($items->item_en_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_4).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">4 - <?php if($items->item_ur_mc1_4 != $itemhistory->item_ur_mc1_4){echo html_entity_decode($items->item_ur_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_4).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_4 == $itemhistory->item_pic_mc1_4){?><img src="<?= base_url().$items->item_pic_mc1_4;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_4;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_4=="" && $items->item_ur_mc1_4!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">4 - <?php if($items->item_ur_mc1_4 != $itemhistory->item_ur_mc1_4){echo html_entity_decode($items->item_ur_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_4).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_4 == $itemhistory->item_pic_mc1_4){?><img src="<?= base_url().$items->item_pic_mc1_4;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_4;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_4!="" && $items->item_ur_mc1_4=="")
										{?>
											<div class="col-6">4 - <?php if($items->item_en_mc1_4 != $itemhistory->item_en_mc1_4){echo html_entity_decode($items->item_en_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_4).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_4 == $itemhistory->item_pic_mc1_4){?><img src="<?= base_url().$items->item_pic_mc1_4;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_4;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_4!="" && $items->item_ur_mc1_4!="")
										{?>
											<div class="col-6">4 - <?php if($items->item_en_mc1_4 != $itemhistory->item_en_mc1_4){echo html_entity_decode($items->item_en_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_4).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">4 - <?php if($items->item_ur_mc1_4 != $itemhistory->item_ur_mc1_4){echo html_entity_decode($items->item_ur_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_4).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_4=="" && $items->item_ur_mc1_4!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">4 - <?php if($items->item_ur_mc1_4 != $itemhistory->item_ur_mc1_4){echo html_entity_decode($items->item_ur_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_4).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_4!="" && $items->item_ur_mc1_4=="")
										{?>
											<div class="col-12">4 - <?php if($items->item_en_mc1_4 != $itemhistory->item_en_mc1_4){echo html_entity_decode($items->item_en_mc1_4);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_4).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc1_5!="" || $items->item_ur_mc1_5!="" || $items->item_pic_mc1_5){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($items->item_pic_mc1_5!="")
									{
										if($items->item_en_mc1_5!="" && $items->item_ur_mc1_5!="")
										{?>
											<div class="col-4">5 - <?php if($items->item_en_mc1_5 != $itemhistory->item_en_mc1_5){echo html_entity_decode($items->item_en_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_5).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">5 - <?php if($items->item_ur_mc1_5 != $itemhistory->item_ur_mc1_5){echo html_entity_decode($items->item_ur_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_5).'</span>';}?></div>
											<div class="col-4"><img src="<?= base_url().$items->item_pic_mc1_5;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($items->item_en_mc1_5=="" && $items->item_ur_mc1_5!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">5 - <?php if($items->item_ur_mc1_5 != $itemhistory->item_ur_mc1_5){echo html_entity_decode($items->item_ur_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_5).'</span>';}?></div>
											<div class="col-6"><img src="<?= base_url().$items->item_pic_mc1_5;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($items->item_en_mc1_5!="" && $items->item_ur_mc1_5=="")
										{?>
											<div class="col-6">5 - <?php if($items->item_en_mc1_5 != $itemhistory->item_en_mc1_5){echo html_entity_decode($items->item_en_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_5).'</span>';}?></div>
											<div class="col-6"><img src="<?= base_url().$items->item_pic_mc1_5;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_5!="" && $items->item_ur_mc1_5!="")
										{?>
											<div class="col-6">5 - <?php if($items->item_en_mc1_5 != $itemhistory->item_en_mc1_5){echo html_entity_decode($items->item_en_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_5).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">5 - <?php if($items->item_ur_mc1_5 != $itemhistory->item_ur_mc1_5){echo html_entity_decode($items->item_ur_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_5).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_5=="" && $items->item_ur_mc1_5!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">5 - <?php if($items->item_ur_mc1_5 != $itemhistory->item_ur_mc1_5){echo html_entity_decode($items->item_ur_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_5).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_5!="" && $items->item_ur_mc1_5=="")
										{?>
											<div class="col-12">5 - <?php if($items->item_en_mc1_5 != $itemhistory->item_en_mc1_5){echo html_entity_decode($items->item_en_mc1_5);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_5).'</span>';}?></div><?php
										}
									}
									?>
								  
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc1_6!="" || $items->item_ur_mc1_6!="" || $items->item_pic_mc1_6){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc1_6!="")
									{
										if($items->item_en_mc1_6!="" && $items->item_ur_mc1_6!="")
										{?>
											<div class="col-4">6 - <?php if($items->item_en_mc1_6 != $itemhistory->item_en_mc1_6){echo html_entity_decode($items->item_en_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_6).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">6 - <?php if($items->item_ur_mc1_6 != $itemhistory->item_ur_mc1_6){echo html_entity_decode($items->item_ur_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_6).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_6 == $itemhistory->item_pic_mc1_6){?><img src="<?= base_url().$items->item_pic_mc1_6;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_6;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_6=="" && $items->item_ur_mc1_6!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">6 - <?php if($items->item_ur_mc1_6 != $itemhistory->item_ur_mc1_6){echo html_entity_decode($items->item_ur_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_6).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_6 == $itemhistory->item_pic_mc1_6){?><img src="<?= base_url().$items->item_pic_mc1_6;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_6;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_6!="" && $items->item_ur_mc1_6=="")
										{?>
											<div class="col-6">6 - <?php if($items->item_en_mc1_6 != $itemhistory->item_en_mc1_6){echo html_entity_decode($items->item_en_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_6).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_6 == $itemhistory->item_pic_mc1_6){?><img src="<?= base_url().$items->item_pic_mc1_6;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_6;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_6!="" && $items->item_ur_mc1_6!="")
										{?>
											<div class="col-6">6 - <?php if($items->item_en_mc1_6 != $itemhistory->item_en_mc1_6){echo html_entity_decode($items->item_en_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_6).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">6 - <?php if($items->item_ur_mc1_6 != $itemhistory->item_ur_mc1_6){echo html_entity_decode($items->item_ur_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_6).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_6=="" && $items->item_ur_mc1_6!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">6 - <?php if($items->item_ur_mc1_6 != $itemhistory->item_ur_mc1_6){echo html_entity_decode($items->item_ur_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_6).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_6!="" && $items->item_ur_mc1_6=="")
										{?>
											<div class="col-12">6 - <?php if($items->item_en_mc1_6 != $itemhistory->item_en_mc1_6){echo html_entity_decode($items->item_en_mc1_6);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_6).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc1_7!="" || $items->item_ur_mc1_7!="" || $items->item_pic_mc1_7){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($items->item_pic_mc1_7!="")
									{
										if($items->item_en_mc1_7!="" && $items->item_ur_mc1_7!="")
										{?>
											<div class="col-4">7 - <?php if($items->item_en_mc1_7 != $itemhistory->item_en_mc1_7){echo html_entity_decode($items->item_en_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_7).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">7 - <?php if($items->item_ur_mc1_7 != $itemhistory->item_ur_mc1_7){echo html_entity_decode($items->item_ur_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_7).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_7 == $itemhistory->item_pic_mc1_7){?><img src="<?= base_url().$items->item_pic_mc1_7;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_7;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_7=="" && $items->item_ur_mc1_7!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">7 - <?php if($items->item_ur_mc1_7 != $itemhistory->item_ur_mc1_7){echo html_entity_decode($items->item_ur_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_7).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_7 == $itemhistory->item_pic_mc1_7){?><img src="<?= base_url().$items->item_pic_mc1_7;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_7;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_7!="" && $items->item_ur_mc1_7=="")
										{?>
											<div class="col-6">7 - <?php if($items->item_en_mc1_7 != $itemhistory->item_en_mc1_7){echo html_entity_decode($items->item_en_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_7).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_7 == $itemhistory->item_pic_mc1_7){?><img src="<?= base_url().$items->item_pic_mc1_7;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_7;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_7!="" && $items->item_ur_mc1_7!="")
										{?>
											<div class="col-6">7 - <?php if($items->item_en_mc1_7 != $itemhistory->item_en_mc1_7){echo html_entity_decode($items->item_en_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_7).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">7 - <?php if($items->item_ur_mc1_7 != $itemhistory->item_ur_mc1_7){echo html_entity_decode($items->item_ur_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_7).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_7=="" && $items->item_ur_mc1_7!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">7 - <?php if($items->item_ur_mc1_7 != $itemhistory->item_ur_mc1_7){echo html_entity_decode($items->item_ur_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_7).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_7!="" && $items->item_ur_mc1_7=="")
										{?>
											<div class="col-12">7 - <?php if($items->item_en_mc1_7 != $itemhistory->item_en_mc1_7){echo html_entity_decode($items->item_en_mc1_7);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_7).'</span>';}?></div><?php
										}
									}
									?>
								  
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc1_8!="" || $items->item_ur_mc1_8!="" || $items->item_pic_mc1_8){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>

								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc1_8!="")
									{
										if($items->item_en_mc1_8!="" && $items->item_ur_mc1_8!="")
										{?>
											<div class="col-4">8 - <?php if($items->item_en_mc1_8 != $itemhistory->item_en_mc1_8){echo html_entity_decode($items->item_en_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_8).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">8 - <?php if($items->item_ur_mc1_8 != $itemhistory->item_ur_mc1_8){echo html_entity_decode($items->item_ur_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_8).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_8 == $itemhistory->item_pic_mc1_8){?><img src="<?= base_url().$items->item_pic_mc1_8;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_8;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_8=="" && $items->item_ur_mc1_8!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">8 - <?php if($items->item_ur_mc1_8 != $itemhistory->item_ur_mc1_8){echo html_entity_decode($items->item_ur_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_8).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_8 == $itemhistory->item_pic_mc1_8){?><img src="<?= base_url().$items->item_pic_mc1_8;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_8;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_8!="" && $items->item_ur_mc1_8=="")
										{?>
											<div class="col-6">8 - <?php if($items->item_en_mc1_8 != $itemhistory->item_en_mc1_8){echo html_entity_decode($items->item_en_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_8).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_8 == $itemhistory->item_pic_mc1_8){?><img src="<?= base_url().$items->item_pic_mc1_8;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_8;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_8!="" && $items->item_ur_mc1_8!="")
										{?>
											<div class="col-6">8 - <?php if($items->item_en_mc1_8 != $itemhistory->item_en_mc1_8){echo html_entity_decode($items->item_en_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_8).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">8 - <?php if($items->item_ur_mc1_8 != $itemhistory->item_ur_mc1_8){echo html_entity_decode($items->item_ur_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_8).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_8=="" && $items->item_ur_mc1_8!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">8 - <?php if($items->item_ur_mc1_8 != $itemhistory->item_ur_mc1_8){echo html_entity_decode($items->item_ur_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_8).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_8!="" && $items->item_ur_mc1_8=="")
										{?>
											<div class="col-12">8 - <?php if($items->item_en_mc1_8 != $itemhistory->item_en_mc1_8){echo html_entity_decode($items->item_en_mc1_8);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_8).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  

								  <?php if($items->item_en_mc1_9!="" || $items->item_ur_mc1_9!="" || $items->item_pic_mc1_9){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($items->item_pic_mc1_9!="")
									{
										if($items->item_en_mc1_9!="" && $items->item_ur_mc1_9!="")
										{?>
											<div class="col-4">9 - <?php if($items->item_en_mc1_9 != $itemhistory->item_en_mc1_9){echo html_entity_decode($items->item_en_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_9).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">9 - <?php if($items->item_ur_mc1_9 != $itemhistory->item_ur_mc1_9){echo html_entity_decode($items->item_ur_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_9).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_9 == $itemhistory->item_pic_mc1_9){?><img src="<?= base_url().$items->item_pic_mc1_9;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_9;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_9=="" && $items->item_ur_mc1_9!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">9 - <?php if($items->item_ur_mc1_9 != $itemhistory->item_ur_mc1_9){echo html_entity_decode($items->item_ur_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_9).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_9 == $itemhistory->item_pic_mc1_9){?><img src="<?= base_url().$items->item_pic_mc1_9;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_9;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_9!="" && $items->item_ur_mc1_9=="")
										{?>
											<div class="col-6">9 - <?php if($items->item_en_mc1_9 != $itemhistory->item_en_mc1_9){echo html_entity_decode($items->item_en_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_9).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_9 == $itemhistory->item_pic_mc1_9){?><img src="<?= base_url().$items->item_pic_mc1_9;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_9;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_9!="" && $items->item_ur_mc1_9!="")
										{?>
											<div class="col-6">9 - <?php if($items->item_en_mc1_9 != $itemhistory->item_en_mc1_9){echo html_entity_decode($items->item_en_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_9).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">9 - <?php if($items->item_ur_mc1_9 != $itemhistory->item_ur_mc1_9){echo html_entity_decode($items->item_ur_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_9).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_9=="" && $items->item_ur_mc1_9!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">9 - <?php if($items->item_ur_mc1_9 != $itemhistory->item_ur_mc1_9){echo html_entity_decode($items->item_ur_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_9).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_9!="" && $items->item_ur_mc1_9=="")
										{?>
											<div class="col-12">9 - <?php if($items->item_en_mc1_9 != $itemhistory->item_en_mc1_9){echo html_entity_decode($items->item_en_mc1_9);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_9).'</span>';}?></div><?php
										}
									}
									?>
								   
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc1_10!="" || $items->item_ur_mc1_10!="" || $items->item_pic_mc1_10){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc1_10!="")
									{
										if($items->item_en_mc1_10!="" && $items->item_ur_mc1_10!="")
										{?>
											<div class="col-4">10 - <?php if($items->item_en_mc1_10 != $itemhistory->item_en_mc1_10){echo html_entity_decode($items->item_en_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_10).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">10 - <?php if($items->item_ur_mc1_10 != $itemhistory->item_ur_mc1_10){echo html_entity_decode($items->item_ur_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_10).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc1_10 == $itemhistory->item_pic_mc1_10){?><img src="<?= base_url().$items->item_pic_mc1_10;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_10;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_10=="" && $items->item_ur_mc1_10!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">10 - <?php if($items->item_ur_mc1_10 != $itemhistory->item_ur_mc1_10){echo html_entity_decode($items->item_ur_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_10).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_10 == $itemhistory->item_pic_mc1_10){?><img src="<?= base_url().$items->item_pic_mc1_10;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_10;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc1_10!="" && $items->item_ur_mc1_10=="")
										{?>
											<div class="col-6">10 - <?php if($items->item_en_mc1_10 != $itemhistory->item_en_mc1_10){echo html_entity_decode($items->item_en_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_10).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc1_10 == $itemhistory->item_pic_mc1_10){?><img src="<?= base_url().$items->item_pic_mc1_10;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc1_10;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc1_10!="" && $items->item_ur_mc1_10!="")
										{?>
											<div class="col-6">10 - <?php if($items->item_en_mc1_10 != $itemhistory->item_en_mc1_10){echo html_entity_decode($items->item_en_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_10).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">10 - <?php if($items->item_ur_mc1_10 != $itemhistory->item_ur_mc1_10){echo html_entity_decode($items->item_ur_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_10).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_10=="" && $items->item_ur_mc1_10!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">10 - <?php if($items->item_ur_mc1_10 != $itemhistory->item_ur_mc1_10){echo html_entity_decode($items->item_ur_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc1_10).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc1_10!="" && $items->item_ur_mc1_10=="")
										{?>
											<div class="col-12">10 - <?php if($items->item_en_mc1_10 != $itemhistory->item_en_mc1_10){echo html_entity_decode($items->item_en_mc1_10);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc1_10).'</span>';}?></div><?php
										}
									}
									?>
									
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
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_a!="")
									{
										if($items->item_en_mc2_a!="" && $items->item_ur_mc2_a!="")
										{?>
											<div class="col-4">a - <?php if($items->item_en_mc2_a != $itemhistory->item_en_mc2_a){echo html_entity_decode($items->item_en_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_a).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">a - <?php if($items->item_ur_mc2_a != $itemhistory->item_ur_mc2_a){echo html_entity_decode($items->item_ur_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_a).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_a == $itemhistory->item_pic_mc2_a){?><img src="<?= base_url().$items->item_pic_mc2_a;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_a;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_a=="" && $items->item_ur_mc2_a!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">a - <?php if($items->item_ur_mc2_a != $itemhistory->item_ur_mc2_a){echo html_entity_decode($items->item_ur_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_a).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_a == $itemhistory->item_pic_mc2_a){?><img src="<?= base_url().$items->item_pic_mc2_a;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_a;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 

										}
										elseif($items->item_en_mc2_a!="" && $items->item_ur_mc2_a=="")
										{?>
											<div class="col-6">a - <?php if($items->item_en_mc2_a != $itemhistory->item_en_mc2_a){echo html_entity_decode($items->item_en_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_a).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_a == $itemhistory->item_pic_mc2_a){?><img src="<?= base_url().$items->item_pic_mc2_a;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_a;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_a!="" && $items->item_ur_mc2_a!="")
										{?>
											<div class="col-6">a - <?php if($items->item_en_mc2_a != $itemhistory->item_en_mc2_a){echo html_entity_decode($items->item_en_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_a).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">a - <?php if($items->item_ur_mc2_a != $itemhistory->item_ur_mc2_a){echo html_entity_decode($items->item_ur_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_a).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_a=="" && $items->item_ur_mc2_a!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">a - <?php if($items->item_ur_mc2_a != $itemhistory->item_ur_mc2_a){echo html_entity_decode($items->item_ur_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_a).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_a!="" && $items->item_ur_mc2_a=="")
										{?>
											<div class="col-12">a - <?php if($items->item_en_mc2_a != $itemhistory->item_en_mc2_a){echo html_entity_decode($items->item_en_mc2_a);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_a).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_b!="")
									{
										if($items->item_en_mc2_b!="" && $items->item_ur_mc2_b!="")
										{?>
											<div class="col-4">b - <?php if($items->item_en_mc2_b != $itemhistory->item_en_mc2_b){echo html_entity_decode($items->item_en_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_b).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">b - <?php if($items->item_ur_mc2_b != $itemhistory->item_ur_mc2_b){echo html_entity_decode($items->item_ur_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_b).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_b == $itemhistory->item_pic_mc2_b){?><img src="<?= base_url().$items->item_pic_mc2_b;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_b;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_b=="" && $items->item_ur_mc2_b!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">b - <?php if($items->item_ur_mc2_b != $itemhistory->item_ur_mc2_b){echo html_entity_decode($items->item_ur_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_b).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_b == $itemhistory->item_pic_mc2_b){?><img src="<?= base_url().$items->item_pic_mc2_b;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_b;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_b!="" && $items->item_ur_mc2_b=="")
										{?>
											<div class="col-6">b - <?php if($items->item_en_mc2_b != $itemhistory->item_en_mc2_b){echo html_entity_decode($items->item_en_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_b).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_b == $itemhistory->item_pic_mc2_b){?><img src="<?= base_url().$items->item_pic_mc2_b;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_b;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_b!="" && $items->item_ur_mc2_b!="")
										{?>
											<div class="col-6">b - <?php if($items->item_en_mc2_b != $itemhistory->item_en_mc2_b){echo html_entity_decode($items->item_en_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_b).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">b - <?php if($items->item_ur_mc2_b != $itemhistory->item_ur_mc2_b){echo html_entity_decode($items->item_ur_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_b).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_b=="" && $items->item_ur_mc2_b!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">b - <?php if($items->item_ur_mc2_b != $itemhistory->item_ur_mc2_b){echo html_entity_decode($items->item_ur_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_b).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_b!="" && $items->item_ur_mc2_b=="")
										{?>
											<div class="col-12">b - <?php if($items->item_en_mc2_b != $itemhistory->item_en_mc2_b){echo html_entity_decode($items->item_en_mc2_b);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_b).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  
								  <?php if($items->item_en_mc2_c!="" || $items->item_ur_mc2_c!="" || $items->item_pic_mc2_c){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($items->item_pic_mc2_c!="")
									{
										if($items->item_en_mc2_c!="" && $items->item_ur_mc2_c!="")
										{?>
											<div class="col-4">c - <?php if($items->item_en_mc2_c != $itemhistory->item_en_mc2_c){echo html_entity_decode($items->item_en_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_c).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">c - <?php if($items->item_ur_mc2_c != $itemhistory->item_ur_mc2_c){echo html_entity_decode($items->item_ur_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_c).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_c == $itemhistory->item_pic_mc2_c){?><img src="<?= base_url().$items->item_pic_mc2_c;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_c;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_c=="" && $items->item_ur_mc2_c!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">c - <?php if($items->item_ur_mc2_c != $itemhistory->item_ur_mc2_c){echo html_entity_decode($items->item_ur_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_c).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_c == $itemhistory->item_pic_mc2_c){?><img src="<?= base_url().$items->item_pic_mc2_c;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_c;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_c!="" && $items->item_ur_mc2_c=="")
										{?>
											<div class="col-6">c - <?php if($items->item_en_mc2_c != $itemhistory->item_en_mc2_c){echo html_entity_decode($items->item_en_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_c).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_c == $itemhistory->item_pic_mc2_c){?><img src="<?= base_url().$items->item_pic_mc2_c;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_c;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_c!="" && $items->item_ur_mc2_c!="")
										{?>
											<div class="col-6">c - <?php if($items->item_en_mc2_c != $itemhistory->item_en_mc2_c){echo html_entity_decode($items->item_en_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_c).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">c - <?php if($items->item_ur_mc2_c != $itemhistory->item_ur_mc2_c){echo html_entity_decode($items->item_ur_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_c).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_c=="" && $items->item_ur_mc2_c!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">c - <?php if($items->item_ur_mc2_c != $itemhistory->item_ur_mc2_c){echo html_entity_decode($items->item_ur_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_c).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_c!="" && $items->item_ur_mc2_c=="")
										{?>
											<div class="col-12">c - <?php if($items->item_en_mc2_c != $itemhistory->item_en_mc2_c){echo html_entity_decode($items->item_en_mc2_c);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_c).'</span>';}?></div><?php
										}
									}
									?>
								   
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc2_d!="" || $items->item_ur_mc2_d!="" || $items->item_pic_mc2_d){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_d!="")
									{
										if($items->item_en_mc2_d!="" && $items->item_ur_mc2_d!="")
										{?>
											<div class="col-4">d - <?php if($items->item_en_mc2_d != $itemhistory->item_en_mc2_d){echo html_entity_decode($items->item_en_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_d).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">d - <?php if($items->item_ur_mc2_d != $itemhistory->item_ur_mc2_d){echo html_entity_decode($items->item_ur_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_d).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_d == $itemhistory->item_pic_mc2_d){?><img src="<?= base_url().$items->item_pic_mc2_d;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_d;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_d=="" && $items->item_ur_mc2_d!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">d - <?php if($items->item_ur_mc2_d != $itemhistory->item_ur_mc2_d){echo html_entity_decode($items->item_ur_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_d).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_d == $itemhistory->item_pic_mc2_d){?><img src="<?= base_url().$items->item_pic_mc2_d;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_d;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_d!="" && $items->item_ur_mc2_d=="")
										{?>
											<div class="col-6">d - <?php if($items->item_en_mc2_d != $itemhistory->item_en_mc2_d){echo html_entity_decode($items->item_en_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_d).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_d == $itemhistory->item_pic_mc2_d){?><img src="<?= base_url().$items->item_pic_mc2_d;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_d;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_d!="" && $items->item_ur_mc2_d!="")
										{?>
											<div class="col-6">d - <?php if($items->item_en_mc2_d != $itemhistory->item_en_mc2_d){echo html_entity_decode($items->item_en_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_d).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">d - <?php if($items->item_ur_mc2_d != $itemhistory->item_ur_mc2_d){echo html_entity_decode($items->item_ur_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_d).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_d=="" && $items->item_ur_mc2_d!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">d - <?php if($items->item_ur_mc2_d != $itemhistory->item_ur_mc2_d){echo html_entity_decode($items->item_ur_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_d).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_d!="" && $items->item_ur_mc2_d=="")
										{?>
											<div class="col-12">d - <?php if($items->item_en_mc2_d != $itemhistory->item_en_mc2_d){echo html_entity_decode($items->item_en_mc2_d);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_d).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc2_e!="" || $items->item_ur_mc2_e!="" || $items->item_pic_mc2_e){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_e!="")
									{
										if($items->item_en_mc2_e!="" && $items->item_ur_mc2_e!="")
										{?>
											<div class="col-4">e - <?php if($items->item_en_mc2_e != $itemhistory->item_en_mc2_e){echo html_entity_decode($items->item_en_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_e).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">e - <?php if($items->item_ur_mc2_e != $itemhistory->item_ur_mc2_e){echo html_entity_decode($items->item_ur_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_e).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_e == $itemhistory->item_pic_mc2_e){?><img src="<?= base_url().$items->item_pic_mc2_e;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_e;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_e=="" && $items->item_ur_mc2_e!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">e - <?php if($items->item_ur_mc2_e != $itemhistory->item_ur_mc2_e){echo html_entity_decode($items->item_ur_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_e).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_e == $itemhistory->item_pic_mc2_e){?><img src="<?= base_url().$items->item_pic_mc2_e;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_e;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_e!="" && $items->item_ur_mc2_e=="")
										{?>
											<div class="col-6">e - <?php if($items->item_en_mc2_e != $itemhistory->item_en_mc2_e){echo html_entity_decode($items->item_en_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_e).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_e == $itemhistory->item_pic_mc2_e){?><img src="<?= base_url().$items->item_pic_mc2_e;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_e;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_e!="" && $items->item_ur_mc2_e!="")
										{?>
											<div class="col-6">e - <?php if($items->item_en_mc2_e != $itemhistory->item_en_mc2_e){echo html_entity_decode($items->item_en_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_e).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">e - <?php if($items->item_ur_mc2_e != $itemhistory->item_ur_mc2_e){echo html_entity_decode($items->item_ur_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_e).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_e=="" && $items->item_ur_mc2_e!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">e - <?php if($items->item_ur_mc2_e != $itemhistory->item_ur_mc2_e){echo html_entity_decode($items->item_ur_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_e).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_e!="" && $items->item_ur_mc2_e=="")
										{?>
											<div class="col-12">e - <?php if($items->item_en_mc2_e != $itemhistory->item_en_mc2_e){echo html_entity_decode($items->item_en_mc2_e);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_e).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc2_f!="" || $items->item_ur_mc2_f!="" || $items->item_pic_mc2_f){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_f!="")
									{
										if($items->item_en_mc2_f!="" && $items->item_ur_mc2_f!="")
										{?>
											<div class="col-4">f - <?php if($items->item_en_mc2_f != $itemhistory->item_en_mc2_f){echo html_entity_decode($items->item_en_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_f).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">f - <?php if($items->item_ur_mc2_f != $itemhistory->item_ur_mc2_f){echo html_entity_decode($items->item_ur_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_f).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_f == $itemhistory->item_pic_mc2_f){?><img src="<?= base_url().$items->item_pic_mc2_f;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_f;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_f=="" && $items->item_ur_mc2_f!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">f - <?php if($items->item_ur_mc2_f != $itemhistory->item_ur_mc2_f){echo html_entity_decode($items->item_ur_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_f).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_f == $itemhistory->item_pic_mc2_f){?><img src="<?= base_url().$items->item_pic_mc2_f;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_f;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_f!="" && $items->item_ur_mc2_f=="")
										{?>
											<div class="col-6">f - <?php if($items->item_en_mc2_f != $itemhistory->item_en_mc2_f){echo html_entity_decode($items->item_en_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_f).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_f == $itemhistory->item_pic_mc2_f){?><img src="<?= base_url().$items->item_pic_mc2_f;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_f;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_f!="" && $items->item_ur_mc2_f!="")
										{?>
											<div class="col-6">f - <?php if($items->item_en_mc2_f != $itemhistory->item_en_mc2_f){echo html_entity_decode($items->item_en_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_f).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">f - <?php if($items->item_ur_mc2_f != $itemhistory->item_ur_mc2_f){echo html_entity_decode($items->item_ur_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_f).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_f=="" && $items->item_ur_mc2_f!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">f - <?php if($items->item_ur_mc2_f != $itemhistory->item_ur_mc2_f){echo html_entity_decode($items->item_ur_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_f).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_f!="" && $items->item_ur_mc2_f=="")
										{?>
											<div class="col-12">f - <?php if($items->item_en_mc2_f != $itemhistory->item_en_mc2_f){echo html_entity_decode($items->item_en_mc2_f);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_f).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc2_g!="" || $items->item_ur_mc2_g!="" || $items->item_pic_mc2_g){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_g!="")
									{
										if($items->item_en_mc2_g!="" && $items->item_ur_mc2_g!="")
										{?>
											<div class="col-4">g - <?php if($items->item_en_mc2_g != $itemhistory->item_en_mc2_g){echo html_entity_decode($items->item_en_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_g).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">g - <?php if($items->item_ur_mc2_g != $itemhistory->item_ur_mc2_g){echo html_entity_decode($items->item_ur_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_g).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_g == $itemhistory->item_pic_mc2_g){?><img src="<?= base_url().$items->item_pic_mc2_g;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_g;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_g=="" && $items->item_ur_mc2_g!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">g - <?php if($items->item_ur_mc2_g != $itemhistory->item_ur_mc2_g){echo html_entity_decode($items->item_ur_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_g).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_g == $itemhistory->item_pic_mc2_g){?><img src="<?= base_url().$items->item_pic_mc2_g;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_g;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_g!="" && $items->item_ur_mc2_g=="")
										{?>
											<div class="col-6">g - <?php if($items->item_en_mc2_g != $itemhistory->item_en_mc2_g){echo html_entity_decode($items->item_en_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_g).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_g == $itemhistory->item_pic_mc2_g){?><img src="<?= base_url().$items->item_pic_mc2_g;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_g;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_g!="" && $items->item_ur_mc2_g!="")
										{?>
											<div class="col-6">g - <?php if($items->item_en_mc2_g != $itemhistory->item_en_mc2_g){echo html_entity_decode($items->item_en_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_g).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">g - <?php if($items->item_ur_mc2_g != $itemhistory->item_ur_mc2_g){echo html_entity_decode($items->item_ur_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_g).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_g=="" && $items->item_ur_mc2_g!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">g - <?php if($items->item_ur_mc2_g != $itemhistory->item_ur_mc2_g){echo html_entity_decode($items->item_ur_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_g).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_g!="" && $items->item_ur_mc2_g=="")
										{?>
											<div class="col-12">g - <?php if($items->item_en_mc2_g != $itemhistory->item_en_mc2_g){echo html_entity_decode($items->item_en_mc2_g);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_g).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc2_h!="" || $items->item_ur_mc2_h!="" || $items->item_pic_mc2_h){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_h!="")
									{
										if($items->item_en_mc2_h!="" && $items->item_ur_mc2_h!="")
										{?>
											<div class="col-4">h - <?php if($items->item_en_mc2_h != $itemhistory->item_en_mc2_h){echo html_entity_decode($items->item_en_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_h).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">h - <?php if($items->item_ur_mc2_h != $itemhistory->item_ur_mc2_h){echo html_entity_decode($items->item_ur_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_h).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_h == $itemhistory->item_pic_mc2_h){?><img src="<?= base_url().$items->item_pic_mc2_h;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_h;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_h=="" && $items->item_ur_mc2_h!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">h - <?php if($items->item_ur_mc2_h != $itemhistory->item_ur_mc2_h){echo html_entity_decode($items->item_ur_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_h).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_h == $itemhistory->item_pic_mc2_h){?><img src="<?= base_url().$items->item_pic_mc2_h;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_h;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_h!="" && $items->item_ur_mc2_h=="")
										{?>
											<div class="col-6">h - <?php if($items->item_en_mc2_h != $itemhistory->item_en_mc2_h){echo html_entity_decode($items->item_en_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_h).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_h == $itemhistory->item_pic_mc2_h){?><img src="<?= base_url().$items->item_pic_mc2_h;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_h;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_h!="" && $items->item_ur_mc2_h!="")
										{?>
											<div class="col-6">h - <?php if($items->item_en_mc2_h != $itemhistory->item_en_mc2_h){echo html_entity_decode($items->item_en_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_h).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">h - <?php if($items->item_ur_mc2_h != $itemhistory->item_ur_mc2_h){echo html_entity_decode($items->item_ur_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_h).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_h=="" && $items->item_ur_mc2_h!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">h - <?php if($items->item_ur_mc2_h != $itemhistory->item_ur_mc2_h){echo html_entity_decode($items->item_ur_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_h).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_h!="" && $items->item_ur_mc2_h=="")
										{?>
											<div class="col-12">h - <?php if($items->item_en_mc2_h != $itemhistory->item_en_mc2_h){echo html_entity_decode($items->item_en_mc2_h);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_h).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc2_i!="" || $items->item_ur_mc2_i!="" || $items->item_pic_mc2_i){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($items->item_pic_mc2_i!="")
									{
										if($items->item_en_mc2_i!="" && $items->item_ur_mc2_i!="")
										{?>
											<div class="col-4">i - <?php if($items->item_en_mc2_i != $itemhistory->item_en_mc2_i){echo html_entity_decode($items->item_en_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_i).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">i - <?php if($items->item_ur_mc2_i != $itemhistory->item_ur_mc2_i){echo html_entity_decode($items->item_ur_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_i).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_i == $itemhistory->item_pic_mc2_i){?><img src="<?= base_url().$items->item_pic_mc2_i;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_i;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_i=="" && $items->item_ur_mc2_i!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">i - <?php if($items->item_ur_mc2_i != $itemhistory->item_ur_mc2_i){echo html_entity_decode($items->item_ur_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_i).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_i == $itemhistory->item_pic_mc2_i){?><img src="<?= base_url().$items->item_pic_mc2_i;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_i;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_i!="" && $items->item_ur_mc2_i=="")
										{?>
											<div class="col-6">i - <?php if($items->item_en_mc2_i != $itemhistory->item_en_mc2_i){echo html_entity_decode($items->item_en_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_i).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_i == $itemhistory->item_pic_mc2_i){?><img src="<?= base_url().$items->item_pic_mc2_i;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_i;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_i!="" && $items->item_ur_mc2_i!="")
										{?>
											<div class="col-6">i - <?php if($items->item_en_mc2_i != $itemhistory->item_en_mc2_i){echo html_entity_decode($items->item_en_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_i).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">i - <?php if($items->item_ur_mc2_i != $itemhistory->item_ur_mc2_i){echo html_entity_decode($items->item_ur_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_i).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_i=="" && $items->item_ur_mc2_i!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">i - <?php if($items->item_ur_mc2_i != $itemhistory->item_ur_mc2_i){echo html_entity_decode($items->item_ur_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_i).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_i!="" && $items->item_ur_mc2_i=="")
										{?>
											<div class="col-12">i - <?php if($items->item_en_mc2_i != $itemhistory->item_en_mc2_i){echo html_entity_decode($items->item_en_mc2_i);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_i).'</span>';}?></div><?php
										}
									}
									?>
									
								  </div>
								  <?php }?>
								  
								  <?php if($items->item_en_mc2_j!="" || $items->item_ur_mc2_j!="" || $items->item_pic_mc2_j){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								  <?php 
									if($items->item_pic_mc2_j!="")
									{
										if($items->item_en_mc2_j!="" && $items->item_ur_mc2_j!="")
										{?>
											<div class="col-4">j - <?php if($items->item_en_mc2_j != $itemhistory->item_en_mc2_j){echo html_entity_decode($items->item_en_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_j).'</span>';}?></div>
											<div class="col-4 urdufont-right" style="text-align:right">j - <?php if($items->item_ur_mc2_j != $itemhistory->item_ur_mc2_j){echo html_entity_decode($items->item_ur_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_j).'</span>';}?></div>
											<div class="col-4"><?php if($items->item_pic_mc2_j == $itemhistory->item_pic_mc2_j){?><img src="<?= base_url().$items->item_pic_mc2_j;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_j;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_j=="" && $items->item_ur_mc2_j!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">j - <?php if($items->item_ur_mc2_j != $itemhistory->item_ur_mc2_j){echo html_entity_decode($items->item_ur_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_j).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_j == $itemhistory->item_pic_mc2_j){?><img src="<?= base_url().$items->item_pic_mc2_j;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_j;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
										elseif($items->item_en_mc2_j!="" && $items->item_ur_mc2_j=="")
										{?>
											<div class="col-6">j - <?php if($items->item_en_mc2_j != $itemhistory->item_en_mc2_j){echo html_entity_decode($items->item_en_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_j).'</span>';}?></div>
											<div class="col-6"><?php if($items->item_pic_mc2_j == $itemhistory->item_pic_mc2_j){?><img src="<?= base_url().$items->item_pic_mc2_j;?>" style="max-width:100%; text-align:center"/><?php } else{?><img src="<?= base_url().$items->item_pic_mc2_j;?>" style="max-width:100%; text-align:center; border-width:5px; border-style:solid; border-color:#F00; border-radius: 10px; max-height:38px; float:right" /><?php }?></div><?php 
										}
									}
									else
									{
										if($items->item_en_mc2_j!="" && $items->item_ur_mc2_j!="")
										{?>
											<div class="col-6">j - <?php if($items->item_en_mc2_j != $itemhistory->item_en_mc2_j){echo html_entity_decode($items->item_en_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_j).'</span>';}?></div>
											<div class="col-6 urdufont-right" style="text-align:right">j - <?php if($items->item_ur_mc2_j != $itemhistory->item_ur_mc2_j){echo html_entity_decode($items->item_ur_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_j).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_j=="" && $items->item_ur_mc2_j!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">j - <?php if($items->item_ur_mc2_j != $itemhistory->item_ur_mc2_j){echo html_entity_decode($items->item_ur_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_ur_mc2_j).'</span>';}?></div><?php 
										}
										elseif($items->item_en_mc2_j!="" && $items->item_ur_mc2_j=="")
										{?>
											<div class="col-12">j - <?php if($items->item_en_mc2_j != $itemhistory->item_en_mc2_j){echo html_entity_decode($items->item_en_mc2_j);}else{echo '<span style="color:#F00">'.html_entity_decode($items->item_en_mc2_j).'</span>';}?></div><?php
										}
									}
									?>
								  
								  </div>
								  <?php }?>
								</div>
							  </div>
							  <!---------------for column-2 ends here--------------------> 
							  <!---------------answer column here here-------------------->
							  <div class="col-2">
								<div class="row" id="item_mc_ans_key" >
								  <div class="col-12" style="margin-bottom:12px">
									<h3>Answer</h3>
								  </div>
								  <?php /*?><div class="col-6 urdufont-right" style="text-align:right">
									<h3>جواب</h3>
								  </div><?php */?>
								</div>
								<?php
									$item_mc_ans_key = $items->item_mc_ans_key;
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
									//////////////////////////////////////////////////////////////
									$item_mc_hans_key = $itemhistory->item_mc_ans_key;
									$his_ans = explode('_',$item_mc_hans_key);
									$his_ans1 = (isset($his_ans[0])&&$his_ans[0]!="")?substr($his_ans[0], -1):"";
									$his_ans2 = (isset($his_ans[1])&&$his_ans[1]!="")?substr($his_ans[1], -1):"";
									$his_ans3 = (isset($his_ans[2])&&$his_ans[2]!="")?substr($his_ans[2], -1):"";
									$his_ans4 = (isset($his_ans[3])&&$his_ans[3]!="")?substr($his_ans[3], -1):"";
									$his_ans5 = (isset($his_ans[4])&&$his_ans[4]!="")?substr($his_ans[4], -1):"";
									$his_ans6 = (isset($his_ans[5])&&$his_ans[5]!="")?substr($his_ans[5], -1):"";
									$his_ans7 = (isset($his_ans[6])&&$his_ans[6]!="")?substr($his_ans[6], -1):"";
									$his_ans8 = (isset($his_ans[7])&&$his_ans[7]!="")?substr($his_ans[7], -1):"";
									$his_ans9 = (isset($his_ans[8])&&$his_ans[8]!="")?substr($his_ans[8], -1):"";
									$his_ans10 = (isset($his_ans[9])&&$his_ans[9]!="")?substr($his_ans[9], -1):"";
								?>
								<div class="row borders" style="padding:0px 0px 0px 15px;">
								  <?php if($ans1!=""){?>
								  <div class="row col-12" style="margin-top:15px; height:50px">1  -  <?php if($ans1 != $his_ans1){echo $ans1;}else{echo '<span style="color:#F00">'.$ans1.'</span>';}?></div>
								  <?php } if($ans2!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">2  -  <?php if($ans2 != $his_ans2){echo $ans2;}else{echo '<span style="color:#F00">'.$ans2.'</span>';}?></div>
								  <?php } if($ans3!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">3  -  <?php if($ans3 != $his_ans3){echo $ans3;}else{echo '<span style="color:#F00">'.$ans3.'</span>';}?></div>
								  <?php } if($ans4!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">4  -  <?php if($ans4 != $his_ans4){echo $ans4;}else{echo '<span style="color:#F00">'.$ans4.'</span>';}?></div>
								  <?php } if($ans5!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">5  -  <?php if($ans5 != $his_ans5){echo $ans5;}else{echo '<span style="color:#F00">'.$ans5.'</span>';}?></div>
								  <?php } if($ans6!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">6  -  <?php if($ans6 != $his_ans6){echo $ans6;}else{echo '<span style="color:#F00">'.$ans6.'</span>';}?></div>
								  <?php } if($ans7!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">7  -  <?php if($ans7 != $his_ans7){echo $ans7;}else{echo '<span style="color:#F00">'.$ans7.'</span>';}?></div>
								  <?php } if($ans8!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">8  -  <?php if($ans8 != $his_ans8){echo $ans8;}else{echo '<span style="color:#F00">'.$ans8.'</span>';}?></div>
								  <?php } if($ans9!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">9  -  <?php if($ans9 != $his_ans9){echo $ans9;}else{echo '<span style="color:#F00">'.$ans9.'</span>';}?></div>
								  <?php } if($ans10!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">10  -  <?php if($ans10 != $his_ans10){echo $ans10;}else{echo '<span style="color:#F00">'.$ans10.'</span>';}?></div>
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
		</div>
        		<?php } else { ?> <div style="margin:50px; font-size:36px"><?php echo 'No item found';?></div><?php }?>
    			</div>
            	<div class="col-6 borders">
				<?php
				   if(isset($itemhistory)){ 
					$ssinfo = (isset($ssinfo[0]))?$ssinfo[0]:"";	   
					$aeinfo = (isset($aeinfo[0]))?$aeinfo[0]:"";
					$psyinfo = (isset($psyinfo[0]))?$psyinfo[0]:"";
					$this->load->view('admin/includes/_messages.php'); 
				?>
                <div class="row" style="font-size:14px; color:#900; padding-left:15px; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif"><u>
                	<span style="font-size:20px">ITEM HISTORY COPY ( Item ID : <?php echo $itemhistory->item_id;?> ) </span></u></div>
				<div class="container" style="padding-top:25px">
		  <div class="row">
			<div class="col-8">
				<div class="row col-12">
					<div class="col-4">
					  <div> <img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" width="60%" /></div>
					</div>
					<div class="col-8">
					  <div class="col-12" style="font-size:20px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC]</div>
					  <div class="col-12" style="font-size:16px; text-align:center; margin-top:1%">Wahdat Colony Road, Lahore</div>
					</div>
				</div>
				<div class="row col-12">
					<div class="col-12" style="padding-left:15px; padding-top:10px; font-size:12px">
						<div class="col-12" style="font-weight:bold;">
							<table width="100%" class="border-bottom"><tr><td width="40%">Date Received : </td><td><?php echo date("d-M-Y (h:i a)",strtotime($itemhistory->item_date_received));?></td></tr></table>
						</div>
						<div class="col-lg-12 col-sm-12" style="font-weight:bold">
							<table width="100%" class="border-bottom"><tr><td width="40%">Item Writer Name : </td><td><?php echo $itemhistory->firstname.' '.$itemhistory->lastname.' ('.$itemhistory->username.')';?></td></tr></table>
						</div>
						<div class="col-lg-12 col-sm-12" style="font-weight:bold">
							<table width="100%" class="border-bottom"><tr><td width="40%">Registration No. : </td><td>PEC-<?php echo $itemhistory->item_submittedby;?></td></tr></table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4" >
			  <div class="col-12" style="alignment-adjust:central; ">
				<table border="1px" bordercolor="#000000" width="100%" style="float:right; font-weight:bold; font-size:12px" cellpadding="7px" >
				  <tr>
					<td colspan="3" style="text-align:center">For official Use Only</td>
				  </tr>
				  <tr>
					<td colspan="3">Item Code:&emsp; <?php echo $itemhistory->item_code;?></td>
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
					<td style="text-align:center"><?php echo $itemhistory->item_difficulty;?></td>
					<td style="text-align:center"><?php echo $itemhistory->item_discr;?></td>
					<td style="text-align:center"><?php echo $itemhistory->item_dif_code;?></td>
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
				<td colspan="2">Other Page</td>
			</tr>
			<tr>
				<td colspan="3"><?php echo $itemhistory->subject_name_en;?></td>
				<td><?php echo $itemhistory->grade_name_en;?></td>
				<td colspan="2"><?php echo $itemhistory->item_pctb_chapter;?></td>
				<td><?php echo $itemhistory->item_pctb_page;?></td>
				<td><?php echo $itemhistory->item_other_title;?></td>
				<td><?php echo $itemhistory->item_other_year	;?></td>
				<td colspan="2"><?php echo $itemhistory->item_other_page;?></td>
			</tr>
			<tr>
				<td colspan="3"><?php 	if($itemhistory->item_curriculum=='1'){echo '2006(ALP)';}
										elseif($itemhistory->item_curriculum=='2'){echo 'National Curriculum (2006)';}
										else{ echo 'Single National Curriculum(SNC) 2020';}?></td>
				<td>SLO # <?php echo $itemhistory->slo_number;?></td>
				<td rowspan="2" colspan="6">SLO text: <?php echo $itemhistory->slo_statement_en;?><span class="urdufont-right" style="font-size:20px;" ><?php echo $itemhistory->slo_statement_ur;?></span></td>
			</tr>
			<tr>
				<td colspan="3">Content Strand:</td>
				<td><?php echo $itemhistory->cs_statement_en?><span class="urdufont-right"><?php echo $itemhistory->cs_statement_ur;?></span></td>
			</tr>
			<tr>
				<td colspan="4"><?php echo $itemhistory->item_cognitive_bloom;?><br />(Please tick one)</td>
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
						<td style="border-right: 1px solid black; width:16%"><?php if ($itemhistory->item_cognitive_bloom == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:16%"><?php if ($itemhistory->item_cognitive_bloom == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:18%"><?php if ($itemhistory->item_cognitive_bloom == 'Application') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:17%"><?php if ($itemhistory->item_cognitive_bloom == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:17%"><?php if ($itemhistory->item_cognitive_bloom == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
						<td style="width:16%"><?php if ($itemhistory->item_cognitive_bloom == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td>
					  </tr>
					</table>
				</td>
				<?php /*?><td><?php if ($itemhistory->item_cognitive_bloom == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
				<td><?php if ($itemhistory->item_cognitive_bloom == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
				<td><?php if ($itemhistory->item_cognitive_bloom == 'Application') {echo 'Yes';}else{echo '---';}?></td>
				<td><?php if ($itemhistory->item_cognitive_bloom == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
				<td><?php if ($itemhistory->item_cognitive_bloom == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
				<td><?php if ($itemhistory->item_cognitive_bloom == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td><?php */?>
				<td colspan="2"><?php if ($itemhistory->item_relation=='Direct Quote') {echo 'Yes';}else{echo '---';}?></td>
				<td colspan="2"><?php if ($itemhistory->item_relation=='Amended'){echo 'Yes';} else{echo '---';}?></td>
				<td><?php echo $itemhistory->item_option_correct;?></td>
				<td><?php echo $itemhistory->item_type;?></td>
				<?php /*?> <td><?php if ($itemhistory->item_type=='ERQ'){echo 'Yes';} else{echo '---';}?></td><?php */?>
			</tr>
		  </table>
		  </div>
		  <div class="row col-lg-12" style="padding-top:02px;" >
			  
			   <?php
				   if(isset($itemhistory->item_id)&&$itemhistory->item_id!=0)
				   {
					 ?>
					   <table width="100%" style="margin-top:10px;" >
					<?php 
					if ($itemhistory->item_image_position=='Full_Page') 
					{
						if($itemhistory->item_image_en!="" && $itemhistory->item_image_ur==""){?>
						<div class="row">
							<div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
							<div class="row" style="margin-top:15px"><img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-width:100%; text-align:center"/></div>
						</div>
					<?php } elseif($itemhistory->item_image_en=="" && $itemhistory->item_image_ur!="") {?>
						<div class="row">
							<div class="row urdufont-right" style="font-weight:bold; font-size:20px"> سوال :&nbsp;</div>
							<div class="row" style="margin-top:15px"><img src="<?= base_url().$itemhistory->item_image_ur;?>" style="max-width:100%; text-align:center"/></div>
						</div>
					<?php } else 
							{?>
								<div class="row">
								<div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="row urdufont-right" style="font-weight:bold; font-size:26px"> سوال :&nbsp;</div>
								<div class="row" style="margin-top:15px"><img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-width:100%; text-align:center"/></div>
								</div>
					<?php	}
					}
					else
					{
						 if ($itemhistory->item_image_position=='Top') 
							{
								if($itemhistory->item_image_en!="" && $itemhistory->item_image_ur!="") 
								{
									?>
									 <tr>
										<td><img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-width:100%;"/></td>
										<td style="float:right; text-align:right"><img src="<?= base_url().$itemhistory->item_image_ur;?>" style="max-width:100%;"/></td>
									  </tr>
									<?php 
								}
								elseif($itemhistory->item_image_en!=""&&$itemhistory->item_image_ur=="")
								{
								?>
									 <tr>
										<td colspan="2" style="text-align:center;"><img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-width:100%;" /></td>          	
									  </tr>
									<?php 	
								}
								elseif($itemhistory->item_image_en==""&&$itemhistory->item_image_ur!="")
								{
								?>
									 <tr>
										<td colspan="2" style="text-align:center"><img src="<?= base_url().$itemhistory->item_image_ur;?>" style="max-width:100%;"/></td>          	
									  </tr>
									<?php 	
								}
							}
						?>
							<?php if ($itemhistory->item_stem_en!=""){?>
							<tr><td colspan="2" >
							<?php if($itemhistory->item_image_position=='Left' && $itemhistory->item_image_en!="")
							{?> <img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-height:400px; float:left"/> <?php }?>
							<span style="font-weight:bold; font-size:20px"> Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo html_entity_decode($itemhistory->item_stem_en);?></span>
							<?php if($itemhistory->item_image_position=='Right' && $itemhistory->item_image_en!="")
							{?> <img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-height:400px; float:right"/> <?php }?>
							</td></tr>
							<?php }?>
							
							<?php if ($itemhistory->item_stem_ur!=""){?>
							 <tr><td colspan="2" class="urdufont-right" style="text-align:right">
							<?php if($itemhistory->item_image_position=='Left' && $itemhistory->item_image_ur!="")
							{?> <img src="<?= base_url().$itemhistory->item_image_ur;?>" style="max-height:400px; float:left"/> <?php }?>
							سوال :&nbsp;<?php echo html_entity_decode($itemhistory->item_stem_ur);?>
							<?php if($itemhistory->item_image_position=='Right' && $itemhistory->item_image_ur!="")
							{?> <img src="<?= base_url().$itemhistory->item_image_ur;?>" style="max-height:400px; float:right"/> <?php }?>
							</td></tr>
							<?php }?>
							
						<?php if ($itemhistory->item_image_position=='Bottom') 
						{
							if($itemhistory->item_image_en!="" && $itemhistory->item_image_ur!="") 
							{
								?>
								 <tr>
									<td style="float:left"><img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-width:100%;"/></td>
									<td style="float:right"><img src="<?= base_url().$itemhistory->item_image_ur;?>" style="max-width:100%;"/></td>
								  </tr>
								<?php 
							}
							elseif($itemhistory->item_image_en!=""&&$itemhistory->item_image_ur=="")
							{
							?>
								 <tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$itemhistory->item_image_en;?>" style="max-width:100%;" /></td>          	
								  </tr>
								<?php 	
							}
							elseif($itemhistory->item_image_en==""&&$itemhistory->item_image_ur!="")
							{
							?>
								 <tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$itemhistory->item_image_ur;?>" style="max-width:100%;"/></td>          	
								  </tr>
								<?php 	
							}
						}
					}
						
				if($itemhistory->item_type=='MCQ')
				{	
					if($itemhistory->item_option_layout=='1')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2" >
		  <tr>
			<td style="font-size:20px">(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
			<td style="padding-left:50px"><div class="urdufont-right" ><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
		  </tr>
		</table>
		</td>
		  </tr>
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td style="font-size:20px">(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
			<td style="padding-left:50px"><div class="urdufont-right" ><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
		  </tr>
		</table></td>
		  </tr>
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td style="font-size:20px">(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
			<td style="padding-left:50px"><div class="urdufont-right" ><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
		  </tr>
		</table></td>
		  </tr>
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td style="font-size:20px">(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
			<td style="padding-left:50px"><div class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
		  </tr>
		</table></td>
		  </tr>
		</table>
		</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='2')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
			<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
		  </tr>
		</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
			<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
		  </tr>
		</table></td>
		  </tr>
		  <tr>
			<td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
			<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
		  </tr>
		</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
			<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
		  </tr>

		</table></td>
		  </tr>
		</table>
		</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='3')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='4')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table>
							</td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><img src="<?= base_url().$itemhistory->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><img src="<?= base_url().$itemhistory->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><img src="<?= base_url().$itemhistory->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
							  </tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='5')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><img src="<?= base_url().$itemhistory->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><img src="<?= base_url().$itemhistory->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><img src="<?= base_url().$itemhistory->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='6')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:15px">
							  <tr>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(a) <span><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(b) <span><img src="<?= base_url().$itemhistory->item_option_b_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(c) <span><img src="<?= base_url().$itemhistory->item_option_c_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(d) <span><img src="<?= base_url().$itemhistory->item_option_d_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='7')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table>
							</td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemhistory->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemhistory->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemhistory->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='8')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemhistory->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemhistory->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemhistory->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='9')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"><span><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"><span><img src="<?= base_url().$itemhistory->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"> <span><img src="<?= base_url().$itemhistory->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"><span><img src="<?= base_url().$itemhistory->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							  
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='10')
					{
						?>
					   <tr>
						  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
							<td><span><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='11')
					{
						?>
					   <tr>
						  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							</table> </td>
							<td><span><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						</tr>
						
						<?php
					}
					elseif($itemhistory->item_option_layout=='12')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemhistory->item_option_a_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_a_ur);?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
		
							  <tr>
								<td>(b) <span><?php echo html_entity_decode($itemhistory->item_option_b_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_b_ur);?></div></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php echo html_entity_decode($itemhistory->item_option_c_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_c_ur);?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php echo html_entity_decode($itemhistory->item_option_d_en);?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($itemhistory->item_option_d_ur);?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$itemhistory->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table>
							</td>
						</tr>
						<?php
					}
				}
				elseif($itemhistory->item_type=='ERQ')
				{
					if($itemhistory->item_rubric_image!='')
					{
						  if($itemhistory->item_rubric_urdu!=''&&$itemhistory->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($itemhistory->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr>
									<td style="width:50%">
										<?php echo html_entity_decode($itemhistory->item_rubric_english);?>
									</td>
									<td class="urdufont-right" style="text-align:right">
										<?php echo html_entity_decode($itemhistory->item_rubric_urdu);?>
									</td>
								</tr>
								<?php if($itemhistory->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }
						  
						  elseif($itemhistory->item_rubric_urdu==''&&$itemhistory->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($itemhistory->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							   
								<tr>
									<?php if($itemhistory->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								
									<td><?php echo html_entity_decode($itemhistory->item_rubric_english);?></td>
									
									<?php if($itemhistory->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>
							   
								<?php if($itemhistory->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
					  <?php }
					  
						  elseif($itemhistory->item_rubric_urdu!=''&&$itemhistory->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($itemhistory->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($itemhistory->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><span class="urdufont-right"><?php echo html_entity_decode($itemhistory->item_rubric_urdu);?></span></td>
								<?php if($itemhistory->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($itemhistory->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
					  <?php }
						  
						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$itemhistory->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
					  <?php }
					}
					else
					{
						  if($itemhistory->item_rubric_urdu==''&&$itemhistory->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($itemhistory->item_rubric_english);?></td></tr></table>
					  <?php 
						  }
						  elseif($itemhistory->item_rubric_urdu!=''&&$itemhistory->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right"><?php echo html_entity_decode($itemhistory->item_rubric_urdu);?></span></td></tr></table>
					  <?php }
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr>
									<td style="width:50%; font-size:18px">
										<?php echo  html_entity_decode($itemhistory->item_rubric_english);?>
									</td>
									<td class="urdufont-right" style="text-align:right">
										<?php echo html_entity_decode($itemhistory->item_rubric_urdu);?>
									</td>
								  </tr>
							  </table>
						  <?php 
						  }
					  }
				}
				elseif($itemhistory->item_type=='FIB')
				{
					 if($itemhistory->item_fib_key_ur==''&&$itemhistory->item_fib_key_eng!='')
					  {?>
						  <table style="margin:20px 0px 0px 50px"><tr ><td style="font-size:16px; font-weight:bold;">Key (English) :</td><td><?php echo  html_entity_decode($itemhistory->item_fib_key_eng);?></td></tr></table>
						  <?php 
						  }
						  elseif($itemhistory->item_fib_key_ur!=''&&$itemhistory->item_fib_key_eng=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">جواب (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right"><?php echo html_entity_decode($itemhistory->item_fib_key_ur);?></span></td></tr></table>
					  <?php }
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr>
									<td style="width:50%; font-size:18px">
										<?php echo  html_entity_decode($itemhistory->item_fib_key_eng);?>
									</td>
									<td class="urdufont-right" style="text-align:right">
										<?php echo html_entity_decode($itemhistory->item_fib_key_ur);?>
									</td>
								  </tr>
							  </table>
						  <?php 
					  }
				}
				elseif($itemhistory->item_type=='TF')
				{
				  ?>
					  <table width="30%" style="margin:10px 50px 10px 50px">
						<tr><td>Options :</td></tr>
						<tr>
							<td style="padding-left:25px">a. <?php echo  html_entity_decode($itemhistory->item_tf_eng_1);?></td>
							<td><div class="urdufont-right"><?php echo  html_entity_decode($itemhistory->item_tf_ur_1);?></div></td>
						</tr>
						<tr>
							<td style="padding-left:25px">b. <?php echo  html_entity_decode($itemhistory->item_tf_eng_2);?></td>
							<td><div class="urdufont-right"><?php echo  html_entity_decode($itemhistory->item_tf_ur_2);?></div></td>
						</tr>
						<?php /*?><tr><td>Answer Key :</td><td><?php echo $itemhistory->item_option_correct;?> </td></tr><?php */?>
					  </table>
				  <?php 
				}
				elseif($itemhistory->item_type=='MC')
				{?>
					<table width="100%" style="font-size:14px">
						<tr>
							<td>
							<div class="row">
							  <div class="col-5 ">
								<div class="row" style="margin-bottom:10px">
								  <div class="col-12">
									<h3>Column-I</h3>
								  </div>
								</div>
								<div class="row col-12 borders" style="padding-bottom:8px">
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc1_1!="")
									{
										if($itemhistory->item_en_mc1_1!="" && $itemhistory->item_ur_mc1_1!="")
										{?>
											<div class="col-4">1 - <?php echo html_entity_decode($itemhistory->item_en_mc1_1);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_1);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_1;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_1=="" && $itemhistory->item_ur_mc1_1!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_1);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_1;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_1!="" && $itemhistory->item_ur_mc1_1=="")
										{?>
											<div class="col-6">1 - <?php echo html_entity_decode($itemhistory->item_en_mc1_1);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_1;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_1!="" && $itemhistory->item_ur_mc1_1!="")
										{?>
											<div class="col-6">1 - <?php echo html_entity_decode($itemhistory->item_en_mc1_1);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_1);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_1=="" && $itemhistory->item_ur_mc1_1!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_1);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_1!="" && $itemhistory->item_ur_mc1_1=="")
										{?>
											<div class="col-12">1 - <?php echo html_entity_decode($itemhistory->item_en_mc1_1);?></div><?php
										}
									}
									?>
								   <?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_1!=""){echo "1 - ".html_entity_decode($itemhistory->item_en_mc1_1);}?></div>
									<?php if($itemhistory->item_pic_mc1_1!=""){?>
										<div class="col-4 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_1);?></div>
										<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_1;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
										<div class="col-8 urdufont-right" style="text-align:right">1 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_1);?></div>
									<?php }?><?php */?>
								  </div>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($itemhistory->item_pic_mc1_2!="")
									{
										if($itemhistory->item_en_mc1_2!="" && $itemhistory->item_ur_mc1_2!="")
										{?>
											<div class="col-4">1 - <?php echo html_entity_decode($itemhistory->item_en_mc1_2);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_2);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_2;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_2=="" && $itemhistory->item_ur_mc1_2!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_2);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_2;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_2!="" && $itemhistory->item_ur_mc1_2=="")
										{?>
											<div class="col-6">2 - <?php echo html_entity_decode($itemhistory->item_en_mc1_2);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_2;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_2!="" && $itemhistory->item_ur_mc1_2!="")
										{?>
											<div class="col-6">2 - <?php echo html_entity_decode($itemhistory->item_en_mc1_2);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_2);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_2=="" && $itemhistory->item_ur_mc1_2!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_2);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_2!="" && $itemhistory->item_ur_mc1_2=="")
										{?>
											<div class="col-12">2 - <?php echo html_entity_decode($itemhistory->item_en_mc1_2);?></div><?php
										}
									}
									?>
								   <?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_2!=""){echo "2 - ".html_entity_decode($itemhistory->item_en_mc1_2);}?></div>
									 <?php if($itemhistory->item_pic_mc1_2!=""){?>
										<div class="col-4 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_2);?></div>
										<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_2;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
										<div class="col-8 urdufont-right" style="text-align:right">2 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_2);?></div>
									<?php }?><?php */?>
								  </div>
								  
								  <?php if($itemhistory->item_en_mc1_3!="" || $itemhistory->item_ur_mc1_3!="" || $itemhistory->item_pic_mc1_3){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									 <?php 
									if($itemhistory->item_pic_mc1_3!="")
									{
										if($itemhistory->item_en_mc1_3!="" && $itemhistory->item_ur_mc1_3!="")
										{?>
											<div class="col-4">3 - <?php echo html_entity_decode($itemhistory->item_en_mc1_3);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_3);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_3;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_3=="" && $itemhistory->item_ur_mc1_3!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_3);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_3;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_3!="" && $itemhistory->item_ur_mc1_3=="")
										{?>
											<div class="col-6">3 - <?php echo html_entity_decode($itemhistory->item_en_mc1_3);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_3;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_3!="" && $itemhistory->item_ur_mc1_3!="")
										{?>
											<div class="col-6">3 - <?php echo html_entity_decode($itemhistory->item_en_mc1_3);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_3);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_3=="" && $itemhistory->item_ur_mc1_3!="")
										{?>
		
											<div class="col-12 urdufont-right" style="text-align:right">3 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_3);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_3!="" && $itemhistory->item_ur_mc1_3=="")
										{?>
											<div class="col-12">3 - <?php echo html_entity_decode($itemhistory->item_en_mc1_3);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_3!=""){echo "3 - ".html_entity_decode($itemhistory->item_en_mc1_3);}?></div>
									<?php if($itemhistory->item_pic_mc1_3!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "3 - ". html_entity_decode($itemhistory->item_ur_mc1_3);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_3;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo  "3 - ". html_entity_decode($itemhistory->item_ur_mc1_3);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc1_4!="" || $itemhistory->item_ur_mc1_4!="" || $itemhistory->item_pic_mc1_4){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								  <?php 
									if($itemhistory->item_pic_mc1_4!="")
									{
										if($itemhistory->item_en_mc1_4!="" && $itemhistory->item_ur_mc1_4!="")
										{?>
											<div class="col-4">4 - <?php echo html_entity_decode($itemhistory->item_en_mc1_4);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_4);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_4;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_4=="" && $itemhistory->item_ur_mc1_4!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_4);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_4;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_4!="" && $itemhistory->item_ur_mc1_4=="")
										{?>
											<div class="col-6">4 - <?php echo html_entity_decode($itemhistory->item_en_mc1_4);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_4;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_4!="" && $itemhistory->item_ur_mc1_4!="")
										{?>
											<div class="col-6">4 - <?php echo html_entity_decode($itemhistory->item_en_mc1_4);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_4);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_4=="" && $itemhistory->item_ur_mc1_4!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">4 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_4);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_4!="" && $itemhistory->item_ur_mc1_4=="")
										{?>
											<div class="col-12">4 - <?php echo html_entity_decode($itemhistory->item_en_mc1_4);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_4!=""){echo "4 - ".html_entity_decode($itemhistory->item_en_mc1_4);}?></div>
									<?php if($itemhistory->item_pic_mc1_4!=""){?>
									<div class="col-4 urdufont-right"  style="text-align:right"><?php echo "4 - ".  html_entity_decode($itemhistory->item_ur_mc1_4);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_4;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right"  style="text-align:right"><?php echo "4 - ".  html_entity_decode($itemhistory->item_ur_mc1_4);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc1_5!="" || $itemhistory->item_ur_mc1_5!="" || $itemhistory->item_pic_mc1_5){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($itemhistory->item_pic_mc1_5!="")
									{
										if($itemhistory->item_en_mc1_5!="" && $itemhistory->item_ur_mc1_5!="")
										{?>
											<div class="col-4">5 - <?php echo html_entity_decode($itemhistory->item_en_mc1_5);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_5);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_5;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_5=="" && $itemhistory->item_ur_mc1_5!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_5);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_5;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_5!="" && $itemhistory->item_ur_mc1_5=="")
										{?>
											<div class="col-6">5 - <?php echo html_entity_decode($itemhistory->item_en_mc1_5);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_5;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_5!="" && $itemhistory->item_ur_mc1_5!="")
										{?>
											<div class="col-6">5 - <?php echo html_entity_decode($itemhistory->item_en_mc1_5);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_5);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_5=="" && $itemhistory->item_ur_mc1_5!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">5 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_5);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_5!="" && $itemhistory->item_ur_mc1_5=="")
										{?>
											<div class="col-12">5 - <?php echo html_entity_decode($itemhistory->item_en_mc1_5);?></div><?php
										}
									}
									?>
								   <?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_5!=""){echo "5 - ".html_entity_decode($itemhistory->item_en_mc1_5);}?></div>
									<?php if($itemhistory->item_pic_mc1_5!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "5 - ".  html_entity_decode($itemhistory->item_ur_mc1_5);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_5;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "5 - ". html_entity_decode($itemhistory->item_ur_mc1_5);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc1_6!="" || $itemhistory->item_ur_mc1_6!="" || $itemhistory->item_pic_mc1_6){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc1_6!="")
									{
										if($itemhistory->item_en_mc1_6!="" && $itemhistory->item_ur_mc1_6!="")
										{?>
											<div class="col-4">6 - <?php echo html_entity_decode($itemhistory->item_en_mc1_6);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_6);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_6=="" && $itemhistory->item_ur_mc1_6!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_6);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_6!="" && $itemhistory->item_ur_mc1_6=="")
										{?>
											<div class="col-6">6 - <?php echo html_entity_decode($itemhistory->item_en_mc1_6);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_6!="" && $itemhistory->item_ur_mc1_6!="")
										{?>
											<div class="col-6">6 - <?php echo html_entity_decode($itemhistory->item_en_mc1_6);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_6);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_6=="" && $itemhistory->item_ur_mc1_6!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_6);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_6!="" && $itemhistory->item_ur_mc1_6=="")
										{?>
											<div class="col-12">6 - <?php echo html_entity_decode($itemhistory->item_en_mc1_6);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_6!=""){echo "6 - ".html_entity_decode($itemhistory->item_en_mc1_6);}?></div>
									<?php if($itemhistory->item_pic_mc1_6!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "6 - ". html_entity_decode($itemhistory->item_ur_mc1_6);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "6 - ". html_entity_decode($itemhistory->item_ur_mc1_6);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc1_7!="" || $itemhistory->item_ur_mc1_7!="" || $itemhistory->item_pic_mc1_7){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($itemhistory->item_pic_mc1_7!="")
									{
										if($itemhistory->item_en_mc1_7!="" && $itemhistory->item_ur_mc1_7!="")
										{?>
											<div class="col-4">7 - <?php echo html_entity_decode($itemhistory->item_en_mc1_7);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_7);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_7;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_7=="" && $itemhistory->item_ur_mc1_7!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_7);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_7;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_7!="" && $itemhistory->item_ur_mc1_7=="")
										{?>
											<div class="col-6">7 - <?php echo html_entity_decode($itemhistory->item_en_mc1_7);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_7!="" && $itemhistory->item_ur_mc1_7!="")
										{?>
											<div class="col-6">7 - <?php echo html_entity_decode($itemhistory->item_en_mc1_7);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_7);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_7=="" && $itemhistory->item_ur_mc1_7!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">7 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_7);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_7!="" && $itemhistory->item_ur_mc1_7=="")
										{?>
											<div class="col-12">7 - <?php echo html_entity_decode($itemhistory->item_en_mc1_7);?></div><?php
										}
									}
									?>
								   <?php /*?> <div class="col-4"><?php if($itemhistory->item_en_mc1_7!=""){echo "7 - ".html_entity_decode($itemhistory->item_en_mc1_7);}?></div>
									<?php if($itemhistory->item_pic_mc1_7!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "7 - ". html_entity_decode($itemhistory->item_ur_mc1_7);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_7;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "7 - ". html_entity_decode($itemhistory->item_ur_mc1_7);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc1_8!="" || $itemhistory->item_ur_mc1_8!="" || $itemhistory->item_pic_mc1_8){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc1_8!="")
									{
										if($itemhistory->item_en_mc1_8!="" && $itemhistory->item_ur_mc1_8!="")
										{?>
											<div class="col-4">8 - <?php echo html_entity_decode($itemhistory->item_en_mc1_8);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_8);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_8;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_8=="" && $itemhistory->item_ur_mc1_8!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_8);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_8;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_8!="" && $itemhistory->item_ur_mc1_8=="")
										{?>
											<div class="col-6">8 - <?php echo html_entity_decode($itemhistory->item_en_mc1_8);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_8!="" && $itemhistory->item_ur_mc1_8!="")
										{?>
											<div class="col-6">8 - <?php echo html_entity_decode($itemhistory->item_en_mc1_8);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_8);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_8=="" && $itemhistory->item_ur_mc1_8!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_8);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_8!="" && $itemhistory->item_ur_mc1_8=="")
										{?>
											<div class="col-12">8 - <?php echo html_entity_decode($itemhistory->item_en_mc1_8);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_8!=""){echo "8 - ".html_entity_decode($itemhistory->item_en_mc1_8);}?></div>
									<?php if($itemhistory->item_pic_mc1_8!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "8 - ". html_entity_decode($itemhistory->item_ur_mc1_8);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_8;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "8 - ". html_entity_decode($itemhistory->item_ur_mc1_8);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc1_9!="" || $itemhistory->item_ur_mc1_9!="" || $itemhistory->item_pic_mc1_9){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($itemhistory->item_pic_mc1_9!="")
									{
										if($itemhistory->item_en_mc1_9!="" && $itemhistory->item_ur_mc1_9!="")
										{?>
											<div class="col-4">9 - <?php echo html_entity_decode($itemhistory->item_en_mc1_9);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_9);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_9;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_9=="" && $itemhistory->item_ur_mc1_9!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_9);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_9;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_9!="" && $itemhistory->item_ur_mc1_9=="")
										{?>
											<div class="col-6">9 - <?php echo html_entity_decode($itemhistory->item_en_mc1_9);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_9!="" && $itemhistory->item_ur_mc1_9!="")
										{?>
											<div class="col-6">9 - <?php echo html_entity_decode($itemhistory->item_en_mc1_9);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_9);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_9=="" && $itemhistory->item_ur_mc1_9!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_9);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_9!="" && $itemhistory->item_ur_mc1_9=="")
										{?>
											<div class="col-12">9 - <?php echo html_entity_decode($itemhistory->item_en_mc1_9);?></div><?php
										}
									}
									?>
								   <?php /*?> <div class="col-4"><?php if($itemhistory->item_en_mc1_9!=""){echo "9 - ".html_entity_decode($itemhistory->item_en_mc1_9);}?></div>
									<?php if($itemhistory->item_pic_mc1_9!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "9 - ". html_entity_decode($itemhistory->item_ur_mc1_9);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_9;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "9 - ". html_entity_decode($itemhistory->item_ur_mc1_9);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc1_10!="" || $itemhistory->item_ur_mc1_10!="" || $itemhistory->item_pic_mc1_10){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc1_10!="")
									{
										if($itemhistory->item_en_mc1_10!="" && $itemhistory->item_ur_mc1_10!="")
										{?>
											<div class="col-4">10 - <?php echo html_entity_decode($itemhistory->item_en_mc1_10);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_10);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_10;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_10=="" && $itemhistory->item_ur_mc1_10!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_10);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_10;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc1_10!="" && $itemhistory->item_ur_mc1_10=="")
										{?>
											<div class="col-6">10 - <?php echo html_entity_decode($itemhistory->item_en_mc1_10);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc1_10!="" && $itemhistory->item_ur_mc1_10!="")
										{?>
											<div class="col-6">10 - <?php echo html_entity_decode($itemhistory->item_en_mc1_10);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_10);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_10=="" && $itemhistory->item_ur_mc1_10!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemhistory->item_ur_mc1_10);?></div><?php 
										}
										elseif($itemhistory->item_en_mc1_10!="" && $itemhistory->item_ur_mc1_10=="")
										{?>
											<div class="col-12">10 - <?php echo html_entity_decode($itemhistory->item_en_mc1_10);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc1_10!=""){echo "10 - ".html_entity_decode($itemhistory->item_en_mc1_10);}?></div>
									<?php if($itemhistory->item_pic_mc1_10!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "10 - ". html_entity_decode($itemhistory->item_ur_mc1_10);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc1_10;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "10 - ". html_entity_decode($itemhistory->item_ur_mc1_10);?></div>
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
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_a!="")
									{
										if($itemhistory->item_en_mc2_a!="" && $itemhistory->item_ur_mc2_a!="")
										{?>
											<div class="col-4">a - <?php echo html_entity_decode($itemhistory->item_en_mc2_a);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_a);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_a;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_a=="" && $itemhistory->item_ur_mc2_a!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_a);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_a;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 

										}
										elseif($itemhistory->item_en_mc2_a!="" && $itemhistory->item_ur_mc2_a=="")
										{?>
											<div class="col-6">a - <?php echo html_entity_decode($itemhistory->item_en_mc2_a);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_a!="" && $itemhistory->item_ur_mc2_a!="")
										{?>
											<div class="col-6">a - <?php echo html_entity_decode($itemhistory->item_en_mc2_a);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_a);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_a=="" && $itemhistory->item_ur_mc2_a!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">a - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_a);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_a!="" && $itemhistory->item_ur_mc2_a=="")
										{?>
											<div class="col-12">a - <?php echo html_entity_decode($itemhistory->item_en_mc2_a);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_a!=""){echo "a - ".html_entity_decode($itemhistory->item_en_mc2_a);}?></div>
									<?php if($itemhistory->item_pic_mc2_a!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "a - ". html_entity_decode($itemhistory->item_ur_mc2_a);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_a;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "a - ". html_entity_decode($itemhistory->item_ur_mc2_a);?></div>
									<?php }?><?php */?>
								  </div>
								  
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_b!="")
									{
										if($itemhistory->item_en_mc2_b!="" && $itemhistory->item_ur_mc2_b!="")
										{?>
											<div class="col-4">b - <?php echo html_entity_decode($itemhistory->item_en_mc2_b);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_b);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_b;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_b=="" && $itemhistory->item_ur_mc2_b!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_b);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_b;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_b!="" && $itemhistory->item_ur_mc2_b=="")
										{?>
											<div class="col-6">b - <?php echo html_entity_decode($itemhistory->item_en_mc2_b);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_b!="" && $itemhistory->item_ur_mc2_b!="")
										{?>
											<div class="col-6">b - <?php echo html_entity_decode($itemhistory->item_en_mc2_b);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_b);?></div><?php 

										}
										elseif($itemhistory->item_en_mc2_b=="" && $itemhistory->item_ur_mc2_b!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">b - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_b);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_b!="" && $itemhistory->item_ur_mc2_b=="")
										{?>
											<div class="col-12">b - <?php echo html_entity_decode($itemhistory->item_en_mc2_b);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_b!=""){echo "b - ".html_entity_decode($itemhistory->item_en_mc2_b);}?></div>
									<?php if($itemhistory->item_pic_mc2_b!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "b - ". html_entity_decode($itemhistory->item_ur_mc2_b);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_b;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "b - ". html_entity_decode($itemhistory->item_ur_mc2_b);?></div>
									<?php }?><?php */?>
								  </div>
								  
								  <?php if($itemhistory->item_en_mc2_c!="" || $itemhistory->item_ur_mc2_c!="" || $itemhistory->item_pic_mc2_c){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								   <?php 
									if($itemhistory->item_pic_mc2_c!="")
									{
										if($itemhistory->item_en_mc2_c!="" && $itemhistory->item_ur_mc2_c!="")
										{?>
											<div class="col-4">c - <?php echo html_entity_decode($itemhistory->item_en_mc2_c);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_c);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_c;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_c=="" && $itemhistory->item_ur_mc2_c!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_c);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_c;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_c!="" && $itemhistory->item_ur_mc2_c=="")
										{?>
											<div class="col-6">c - <?php echo html_entity_decode($itemhistory->item_en_mc2_c);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_c!="" && $itemhistory->item_ur_mc2_c!="")
										{?>
											<div class="col-6">c - <?php echo html_entity_decode($itemhistory->item_en_mc2_c);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_c);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_c=="" && $itemhistory->item_ur_mc2_c!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">c - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_c);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_c!="" && $itemhistory->item_ur_mc2_c=="")
										{?>
											<div class="col-12">c - <?php echo html_entity_decode($itemhistory->item_en_mc2_c);?></div><?php
										}
									}
									?>
								   <?php /*?> <div class="col-4"><?php if($itemhistory->item_en_mc2_c!=""){echo "c - ".html_entity_decode($itemhistory->item_en_mc2_c);}?></div>
									<?php if($itemhistory->item_pic_mc2_c!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "c - ". html_entity_decode($itemhistory->item_ur_mc2_c);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_c;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "c - ". html_entity_decode($itemhistory->item_ur_mc2_c);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc2_d!="" || $itemhistory->item_ur_mc2_d!="" || $itemhistory->item_pic_mc2_d){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_d!="")
									{
										if($itemhistory->item_en_mc2_d!="" && $itemhistory->item_ur_mc2_d!="")
										{?>
											<div class="col-4">d - <?php echo html_entity_decode($itemhistory->item_en_mc2_d);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_d);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_d;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_d=="" && $itemhistory->item_ur_mc2_d!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_d);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_d;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_d!="" && $itemhistory->item_ur_mc2_d=="")
										{?>
											<div class="col-6">d - <?php echo html_entity_decode($itemhistory->item_en_mc2_d);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_d!="" && $itemhistory->item_ur_mc2_d!="")
										{?>
											<div class="col-6">d - <?php echo html_entity_decode($itemhistory->item_en_mc2_d);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_d);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_d=="" && $itemhistory->item_ur_mc2_d!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">d - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_d);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_d!="" && $itemhistory->item_ur_mc2_d=="")
										{?>
											<div class="col-12">d - <?php echo html_entity_decode($itemhistory->item_en_mc2_d);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_d!=""){echo "d - ".html_entity_decode($itemhistory->item_en_mc2_d);}?></div>
									<?php if($itemhistory->item_pic_mc2_d!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "d - ". html_entity_decode($itemhistory->item_ur_mc2_d);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_d;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "d - ". html_entity_decode($itemhistory->item_ur_mc2_d);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc2_e!="" || $itemhistory->item_ur_mc2_e!="" || $itemhistory->item_pic_mc2_e){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_e!="")
									{
										if($itemhistory->item_en_mc2_e!="" && $itemhistory->item_ur_mc2_e!="")
										{?>
											<div class="col-4">e - <?php echo html_entity_decode($itemhistory->item_en_mc2_e);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_e);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_e;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_e=="" && $itemhistory->item_ur_mc2_e!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_e);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_e;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_e!="" && $itemhistory->item_ur_mc2_e=="")
										{?>
											<div class="col-6">e - <?php echo html_entity_decode($itemhistory->item_en_mc2_e);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_e!="" && $itemhistory->item_ur_mc2_e!="")
										{?>
											<div class="col-6">e - <?php echo html_entity_decode($itemhistory->item_en_mc2_e);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_e);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_e=="" && $itemhistory->item_ur_mc2_e!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">e - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_e);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_e!="" && $itemhistory->item_ur_mc2_e=="")
										{?>
											<div class="col-12">e - <?php echo html_entity_decode($itemhistory->item_en_mc2_e);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_e!=""){echo "e - ".html_entity_decode($itemhistory->item_en_mc2_e);}?></div>
									<?php if($itemhistory->item_pic_mc2_e!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "e - ". html_entity_decode($itemhistory->item_ur_mc2_e);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_e;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "e - ". html_entity_decode($itemhistory->item_ur_mc2_e);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc2_f!="" || $itemhistory->item_ur_mc2_f!="" || $itemhistory->item_pic_mc2_f){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_f!="")
									{
										if($itemhistory->item_en_mc2_f!="" && $itemhistory->item_ur_mc2_f!="")
										{?>
											<div class="col-4">f - <?php echo html_entity_decode($itemhistory->item_en_mc2_f);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_f);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_f;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_f=="" && $itemhistory->item_ur_mc2_f!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_f);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_f;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_f!="" && $itemhistory->item_ur_mc2_f=="")
										{?>
											<div class="col-6">f - <?php echo html_entity_decode($itemhistory->item_en_mc2_f);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_f!="" && $itemhistory->item_ur_mc2_f!="")
										{?>
											<div class="col-6">f - <?php echo html_entity_decode($itemhistory->item_en_mc2_f);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_f);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_f=="" && $itemhistory->item_ur_mc2_f!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">f - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_f);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_f!="" && $itemhistory->item_ur_mc2_f=="")
										{?>
											<div class="col-12">f - <?php echo html_entity_decode($itemhistory->item_en_mc2_f);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_f!=""){echo "f - ".html_entity_decode($itemhistory->item_en_mc2_f);}?></div>
									<?php if($itemhistory->item_pic_mc2_f!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "f - ". html_entity_decode($itemhistory->item_ur_mc2_f);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_f;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "f - ". html_entity_decode($itemhistory->item_ur_mc2_f);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc2_g!="" || $itemhistory->item_ur_mc2_g!="" || $itemhistory->item_pic_mc2_g){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_g!="")
									{
										if($itemhistory->item_en_mc2_g!="" && $itemhistory->item_ur_mc2_g!="")
										{?>
											<div class="col-4">g - <?php echo html_entity_decode($itemhistory->item_en_mc2_g);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_g);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_g;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_g=="" && $itemhistory->item_ur_mc2_g!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_g);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_g;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_g!="" && $itemhistory->item_ur_mc2_g=="")
										{?>
											<div class="col-6">g - <?php echo html_entity_decode($itemhistory->item_en_mc2_g);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_g!="" && $itemhistory->item_ur_mc2_g!="")
										{?>
											<div class="col-6">g - <?php echo html_entity_decode($itemhistory->item_en_mc2_g);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_g);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_g=="" && $itemhistory->item_ur_mc2_g!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">g - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_g);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_g!="" && $itemhistory->item_ur_mc2_g=="")
										{?>
											<div class="col-12">g - <?php echo html_entity_decode($itemhistory->item_en_mc2_g);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_g!=""){echo "g - ".html_entity_decode($itemhistory->item_en_mc2_g);}?></div>
									<?php if($itemhistory->item_pic_mc2_g!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "g - ". html_entity_decode($itemhistory->item_ur_mc2_g);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_g;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "g - ". html_entity_decode($itemhistory->item_ur_mc2_g);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc2_h!="" || $itemhistory->item_ur_mc2_h!="" || $itemhistory->item_pic_mc2_h){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_h!="")
									{
										if($itemhistory->item_en_mc2_h!="" && $itemhistory->item_ur_mc2_h!="")
										{?>
											<div class="col-4">h - <?php echo html_entity_decode($itemhistory->item_en_mc2_h);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_h);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_h;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_h=="" && $itemhistory->item_ur_mc2_h!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_h);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_h;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_h!="" && $itemhistory->item_ur_mc2_h=="")
										{?>
											<div class="col-6">h - <?php echo html_entity_decode($itemhistory->item_en_mc2_h);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_h!="" && $itemhistory->item_ur_mc2_h!="")
										{?>
											<div class="col-6">h - <?php echo html_entity_decode($itemhistory->item_en_mc2_h);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_h);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_h=="" && $itemhistory->item_ur_mc2_h!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">h - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_h);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_h!="" && $itemhistory->item_ur_mc2_h=="")
										{?>
											<div class="col-12">h - <?php echo html_entity_decode($itemhistory->item_en_mc2_h);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_h!=""){echo "h - ".html_entity_decode($itemhistory->item_en_mc2_h);}?></div>
									<?php if($itemhistory->item_pic_mc2_h!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "h - ". html_entity_decode($itemhistory->item_ur_mc2_h);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_h;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "h - ". html_entity_decode($itemhistory->item_ur_mc2_h);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc2_i!="" || $itemhistory->item_ur_mc2_i!="" || $itemhistory->item_pic_mc2_i){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
									<?php 
									if($itemhistory->item_pic_mc2_i!="")
									{
										if($itemhistory->item_en_mc2_i!="" && $itemhistory->item_ur_mc2_i!="")
										{?>
											<div class="col-4">i - <?php echo html_entity_decode($itemhistory->item_en_mc2_i);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_i);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_i;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_i=="" && $itemhistory->item_ur_mc2_i!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_i);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_i;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_i!="" && $itemhistory->item_ur_mc2_i=="")
										{?>
											<div class="col-6">i - <?php echo html_entity_decode($itemhistory->item_en_mc2_i);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_i!="" && $itemhistory->item_ur_mc2_i!="")
										{?>
											<div class="col-6">i - <?php echo html_entity_decode($itemhistory->item_en_mc2_i);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_i);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_i=="" && $itemhistory->item_ur_mc2_i!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">i - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_i);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_i!="" && $itemhistory->item_ur_mc2_i=="")
										{?>
											<div class="col-12">i - <?php echo html_entity_decode($itemhistory->item_en_mc2_i);?></div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemhistory->item_en_mc2_i!=""){echo "i - ".html_entity_decode($itemhistory->item_en_mc2_i);}?></div>
									<?php if($itemhistory->item_pic_mc2_i!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "i - ". html_entity_decode($itemhistory->item_ur_mc2_i);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_i;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "i - ". html_entity_decode($itemhistory->item_ur_mc2_i);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemhistory->item_en_mc2_j!="" || $itemhistory->item_ur_mc2_j!="" || $itemhistory->item_pic_mc2_j){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:50px">
								  <?php 
									if($itemhistory->item_pic_mc2_j!="")
									{
										if($itemhistory->item_en_mc2_j!="" && $itemhistory->item_ur_mc2_j!="")
										{?>
											<div class="col-4">j - <?php echo html_entity_decode($itemhistory->item_en_mc2_j);?></div>
											<div class="col-4 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_j);?></div>
											<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_j;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_j=="" && $itemhistory->item_ur_mc2_j!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_j);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc2_j;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
										elseif($itemhistory->item_en_mc2_j!="" && $itemhistory->item_ur_mc2_j=="")
										{?>
											<div class="col-6">j - <?php echo html_entity_decode($itemhistory->item_en_mc2_j);?></div>
											<div class="col-6"><img src="<?= base_url().$itemhistory->item_pic_mc1_6;?>" style="max-height:38px; max-width:100%; float:right"/></div><?php 
										}
									}
									else
									{
										if($itemhistory->item_en_mc2_j!="" && $itemhistory->item_ur_mc2_j!="")
										{?>
											<div class="col-6">j - <?php echo html_entity_decode($itemhistory->item_en_mc2_j);?></div>
											<div class="col-6 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_j);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_j=="" && $itemhistory->item_ur_mc2_j!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">j - <?php echo  html_entity_decode($itemhistory->item_ur_mc2_j);?></div><?php 
										}
										elseif($itemhistory->item_en_mc2_j!="" && $itemhistory->item_ur_mc2_j=="")
										{?>
											<div class="col-12">j - <?php echo html_entity_decode($itemhistory->item_en_mc2_i);?></div><?php
										}
									}
									?>
								  <?php /*?><div class="row col-12" style="margin-top:10px; line-height:38px">
									<div class="col-4"><?php if($itemhistory->item_en_mc2_j!=""){echo "j - ".html_entity_decode($itemhistory->item_en_mc2_j);}?></div>
									<?php if($itemhistory->item_pic_mc2_j!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "j - ". html_entity_decode($itemhistory->item_ur_mc2_j);?></div>
									<div class="col-4"><img src="<?= base_url().$itemhistory->item_pic_mc2_j;?>" style="max-height:38px; max-width:100%; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "j - ". html_entity_decode($itemhistory->item_ur_mc2_j);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								</div>
							  </div>
							  <!---------------for column-2 ends here--------------------> 
							  <!---------------answer column here here-------------------->
							  <div class="col-2">
								<div class="row" id="item_mc_ans_key" >
								  <div class="col-12" style="margin-bottom:12px">
									<h3>Answer</h3>
								  </div>
								  <?php /*?><div class="col-6 urdufont-right" style="text-align:right">
									<h3>جواب</h3>
								  </div><?php */?>
								</div>
								<?php
									$item_mc_ans_key = $itemhistory->item_mc_ans_key;
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
								<div class="row borders" style="padding:0px 0px 0px 15px;">
								  <?php if($ans1!=""){?>
								  <div class="row col-12" style="margin-top:15px; height:50px">1  -  <?php echo $ans1;?></div>
								  <?php } if($ans2!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">2  -  <?php echo $ans2;?></div>
								  <?php } if($ans3!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">3  -  <?php echo $ans3;?></div>
								  <?php } if($ans4!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">4  -  <?php echo $ans4;?></div>
								  <?php } if($ans5!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">5  -  <?php echo $ans5;?></div>
								  <?php } if($ans6!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">6  -  <?php echo $ans6;?></div>
								  <?php } if($ans7!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">7  -  <?php echo $ans7;?></div>
								  <?php } if($ans8!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">8  -  <?php echo $ans8;?></div>
								  <?php } if($ans9!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">9  -  <?php echo $ans9;?></div>
								  <?php } if($ans10!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:50px">10  -  <?php echo $ans10;?></div>
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
		</div>
        		<?php } else { ?> <div style="margin:50px; font-size:36px"><?php echo 'No history found';?></div><?php }?>
    			</div>
            </div>
        </div>
      </div>
    </section>
  </div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


