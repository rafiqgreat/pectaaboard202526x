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
//$itemhistory = isset($itemshistory)?$itemshistory[0]:NULL;
//$items = isset($items[0])?$items[0]:NULL;
//echo '<pre>';
//print_r($merged_array);
//die();
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
        	<!------------------------------------------------------------------------------------------>
			<?php if(isset($merged_array) && !empty($merged_array)){?>
            <div class="row">
            	<?php 
				$coun = 0;
				$cc = count($merged_array);
				foreach($merged_array as $itemshis_val){?>
                <div class="col-6 borders">
                <?php
				   if(isset($itemshis_val)){ 
				    $ssinfo = (isset($ssinfo[0]))?$ssinfo[0]:"";	   
					$aeinfo = (isset($aeinfo[0]))?$aeinfo[0]:"";
					$psyinfo = (isset($psyinfo[0]))?$psyinfo[0]:"";
					$this->load->view('admin/includes/_messages.php'); 
					
					$log_sms_rem = $alllog[$coun]->log_message;
					$new_string_rem = str_replace("{log_admin_id}", '<span style="font-size:16px;">'.$alllog[$coun]->username.'</span>', $log_sms_rem);
					$new_string_rem = str_replace("{log_itemwriter_id}", '<span style="font-size:16px;">'.$alllog[$coun]->username.'</span>', $new_string_rem);
					$new_string_rem = str_replace("{log_itemid}", '<span style="font-size:16px;">'.'ID: '.$alllog[$coun]->log_itemid.'</span>', $new_string_rem);
					$new_string_rem = str_replace("{log_date}", '<span style="font-size:16px;">'.$alllog[$coun]->log_date.'</span>', $new_string_rem);
				?>
                <div class="row" style="font-size:14px; color:#900; padding-left:15px; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif"><u><span style="font-size:20px"><span style="font-size:20px">ITEM HISTORY COPY </span></span><br />(<?php echo $new_string_rem;?>)</u></div>
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
							<table width="100%" class="border-bottom"><tr><td width="40%">Date Received : </td><td><?php echo date("d-M-Y (h:i a)",strtotime($itemshis_val->item_date_received));?></td></tr></table>
						</div>
						<div class="col-lg-12 col-sm-12" style="font-weight:bold">
							<table width="100%" class="border-bottom"><tr><td width="40%">Item Writer Name : </td><td><?php echo $itemshis_val->firstname.' '.$itemshis_val->lastname.' ('.$itemshis_val->username.')';?></td></tr></table>
						</div>
						<div class="col-lg-12 col-sm-12" style="font-weight:bold">
							<table width="100%" class="border-bottom"><tr><td width="40%">Registration No. : </td><td>PEC-<?php echo $itemshis_val->item_submittedby;?></td></tr></table>
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
					<td colspan="3">Item Code:&emsp; <?php echo $itemshis_val->item_code;?></td>
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
					<td style="text-align:center">
					<?php
					if($coun+1==count($merged_array))
					{echo $itemshis_val->item_difficulty;}
					else
					{
						if($merged_array[$coun]->item_difficulty == $merged_array[$coun+1]->item_difficulty){echo $itemshis_val->item_difficulty;}
						else{echo '<span style="color:#F00">'.$itemshis_val->item_difficulty.'</span>';}
					}
					?>
                    </td>
					<td style="text-align:center">
					<?php if($coun+1==count($merged_array)){echo $itemshis_val->item_discr;}
                    else
                    {
                        if($merged_array[$coun]->item_discr == $merged_array[$coun+1]->item_discr){echo $itemshis_val->item_discr;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_discr.'</span>';}
                    }
                    ?>
                    </td>
					<td style="text-align:center">
                    <?php if($coun+1==count($merged_array)){echo $itemshis_val->item_dif_code;}
                    else
                    {
                        if($merged_array[$coun]->item_dif_code == $merged_array[$coun+1]->item_dif_code){echo $itemshis_val->item_dif_code;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_dif_code.'</span>';}
                    }?>
                    </td>
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
				<td colspan="3">
                <?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->subject_name_en;}
                    else
                    {
                        if($merged_array[$coun]->subject_name_en == $merged_array[$coun+1]->subject_name_en){echo $itemshis_val->subject_name_en;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->subject_name_en.'</span>';}
                    }
				?>
                </td>
				<td>
                <?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->grade_name_en;}
                    else
                    {
                        if($merged_array[$coun]->grade_name_en == $merged_array[$coun+1]->grade_name_en){echo $itemshis_val->grade_name_en;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->grade_name_en.'</span>';}
                    }
				?></td>
				<td colspan="2">
                <?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->item_pctb_chapter;}
                    else
                    {
                        if($merged_array[$coun]->item_pctb_chapter == $merged_array[$coun+1]->item_pctb_chapter){echo $itemshis_val->item_pctb_chapter;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_pctb_chapter.'</span>';}
                    }
				?></td>
				<td><?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->item_pctb_page;}
                    else
                    {
                        if($merged_array[$coun]->item_pctb_page == $merged_array[$coun+1]->item_pctb_page){echo $itemshis_val->item_pctb_page;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_pctb_page.'</span>';}
                    }
				?></td>
				<td><?php echo $itemshis_val->item_other_title;?><?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->item_other_title;}
                    else
                    {
                        if($merged_array[$coun]->item_other_title == $merged_array[$coun+1]->item_other_title){echo $itemshis_val->item_other_title;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_other_title.'</span>';}
                    }
				?></td>
				<td><?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->item_other_year;}
                    else
                    {
                        if($merged_array[$coun]->item_other_year == $merged_array[$coun+1]->item_other_year){echo $itemshis_val->item_other_year;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_other_year.'</span>';}
                    }
				?></td>
				<td colspan="2">
				<?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->item_other_page;}
                    else
                    {
                        if($merged_array[$coun]->item_other_page == $merged_array[$coun+1]->item_other_page){echo $itemshis_val->item_other_page;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_other_page.'</span>';}
                    }
				?></td>
			</tr>
			<tr>
				<td colspan="3">--<?php 	if($itemshis_val->item_curriculum=='1'){echo '2006(ALP)';}
										elseif($itemshis_val->item_curriculum=='2'){echo 'National Curriculum (2006)';}
										else{ echo 'Single National Curriculum(SNC) 2020';}?></td>
				<td>SLO # 
                <?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->slo_number;}
                    else
                    {
                        if($merged_array[$coun]->slo_number == $merged_array[$coun+1]->slo_number){echo $itemshis_val->slo_number;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->slo_number.'</span>';}
                    }
				?></td>
				<td rowspan="2" colspan="6">SLO text:<?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->slo_statement_en;}
                    else
                    {
                        if($merged_array[$coun]->slo_statement_en == $merged_array[$coun+1]->slo_statement_en){echo $itemshis_val->slo_statement_en;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->slo_statement_en.'</span>';}
                    }
				?><span class="urdufont-right" style="font-size:20px;" ><?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->slo_statement_ur;}
                    else
                    {
                        if($merged_array[$coun]->slo_statement_ur == $merged_array[$coun+1]->slo_statement_ur){echo $itemshis_val->slo_statement_ur;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->slo_statement_ur.'</span>';}
                    }
				?></span></td>
			</tr>
			<tr>
				<td colspan="3">Content Strand:</td>
				<td>
                <?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->cs_statement_en;}
                    else
                    {
                        if($merged_array[$coun]->cs_statement_en == $merged_array[$coun+1]->cs_statement_en){echo $itemshis_val->cs_statement_en;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->cs_statement_en.'</span>';}
                    }
				?><span class="urdufont-right">
                <?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->cs_statement_ur;}
                    else
                    {
                        if($merged_array[$coun]->cs_statement_ur == $merged_array[$coun+1]->cs_statement_ur){echo $itemshis_val->cs_statement_ur;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->cs_statement_ur.'</span>';}
                    }
				?></span></td>
			</tr>
			<tr>
				<td colspan="4">
				<?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->item_cognitive_bloom;}
                    else
                    {
                        if($merged_array[$coun]->item_cognitive_bloom == $merged_array[$coun+1]->item_cognitive_bloom){echo $itemshis_val->item_cognitive_bloom;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_cognitive_bloom.'</span>';}
                    }
				?><br />(Please tick one)</td>
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
						<td style="border-right: 1px solid black; width:16%"><?php if ($itemshis_val->item_cognitive_bloom == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:16%"><?php if ($itemshis_val->item_cognitive_bloom == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:18%"><?php if ($itemshis_val->item_cognitive_bloom == 'Application') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:17%"><?php if ($itemshis_val->item_cognitive_bloom == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
						<td style="border-right: 1px solid black; width:17%"><?php if ($itemshis_val->item_cognitive_bloom == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
						<td style="width:16%"><?php if ($itemshis_val->item_cognitive_bloom == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td>
					  </tr>
					</table>
				</td>
				<td colspan="2"><?php if ($itemshis_val->item_relation=='Direct Quote') {echo 'Yes';}else{echo '---';}?></td>
				<td colspan="2"><?php if ($itemshis_val->item_relation=='Amended'){echo 'Yes';} else{echo '---';}?></td>
				<td>
                <?php 
					if($coun+1==count($merged_array)){echo $itemshis_val->item_option_correct;}
                    else
                    {
                        if($merged_array[$coun]->item_option_correct == $merged_array[$coun+1]->item_option_correct){echo $itemshis_val->item_option_correct;}
                        else{echo '<span style="color:#F00">'.$itemshis_val->item_option_correct.'</span>';}
                    }
				?></td>
				<td>
                <?php 
					if($coun+1==count($merged_array))
					{
						if($itemshis_val->item_type=="ERQ"){echo "CRQ";}else{echo $itemshis_val->item_type;}
					}
                    else
                    {
                        if($merged_array[$coun]->item_type == $merged_array[$coun+1]->item_type){if($itemshis_val->item_type=="ERQ"){echo "CRQ";}else{echo $itemshis_val->item_type;}}
                        else
						{
							if($itemshis_val->item_type=="ERQ"){echo '<span style="color:#F00">CRQ</span>';}else{echo $itemshis_val->item_type;}
						}
                    }
				?></td>
			</tr>
		  </table>
		  </div>
		  <div class="row col-lg-12" style="padding-top:02px;" >
			  
			   <?php
				   if(isset($itemshis_val->item_id)&&$itemshis_val->item_id!=0)
				   {
					 ?>
					   <table width="100%" style="margin-top:10px;" >
					<?php 
						if ($itemshis_val->item_image_position=='Full_Page') 
						{
							if($itemshis_val->item_image_en!="" && $itemshis_val->item_image_ur==""){?>
							<div class="row">
								<div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
								<div class="row" style="margin-top:15px"><img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-width:100%; text-align:center"/></div>
							</div>
						<?php } elseif($itemshis_val->item_image_en=="" && $itemshis_val->item_image_ur!="") {?>
							<div class="row">
								<div class="row urdufont-right" style="font-weight:bold; font-size:20px"> سوال :&nbsp;</div>
								<div class="row" style="margin-top:15px"><img src="<?= base_url().$itemshis_val->item_image_ur;?>" style="max-width:100%; text-align:center"/></div>
							</div>
						<?php } else 
								{?>
									<div class="row">
									<div class="row" style="font-weight:bold; font-size:20px">Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
									<div class="row urdufont-right" style="font-weight:bold; font-size:26px"> سوال :&nbsp;</div>
									<div class="row" style="margin-top:15px"><img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-width:100%; text-align:center"/></div>
									</div>
						<?php	}
						}
						else
						{
						 if ($itemshis_val->item_image_position=='Top') 
							{
								if($itemshis_val->item_image_en!="" && $itemshis_val->item_image_ur!="") 
								{
									?>
									 <tr>
										<td><img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-width:90%;"/></td>
										<td style="float:right; text-align:right"><img src="<?= base_url().$itemshis_val->item_image_ur;?>" style="max-width:90%;"/></td>
									  </tr>
									<?php 
								}
								elseif($itemshis_val->item_image_en!=""&&$itemshis_val->item_image_ur=="")
								{
								?>
									 <tr>
										<td colspan="2" style="text-align:center;"><img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-width:90%;" /></td>          	
									  </tr>
									<?php 	
								}
								elseif($itemshis_val->item_image_en==""&&$itemshis_val->item_image_ur!="")
								{
								?>
									 <tr>
										<td colspan="2" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_image_ur;?>" style="max-width:90%;"/></td>          	
									  </tr>
									<?php 	
								}
							}
						?>
							<?php if ($itemshis_val->item_stem_en!=""){?>
							<tr><td colspan="2" >
							<?php if($itemshis_val->item_image_position=='Left' && $itemshis_val->item_image_en!="")
							{?> <img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-height:400px; float:left"/> <?php }?>
							<span style="font-weight:bold; font-size:20px"> Question : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php 
								if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_stem_en);}
								else
								{
									if($merged_array[$coun]->item_stem_en == $merged_array[$coun+1]->item_stem_en){echo html_entity_decode($itemshis_val->item_stem_en);}
									else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_stem_en).'</span>';}
								}
							?>
                            </span>
							<?php if($itemshis_val->item_image_position=='Right' && $itemshis_val->item_image_en!="")
							{?> <img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-height:400px; float:right"/> <?php }?>
							</td></tr>
							<?php }?>
							
							<?php if ($itemshis_val->item_stem_ur!=""){?>
							<tr><td colspan="2" class="urdufont-right" style="text-align:right">
							<?php if($itemshis_val->item_image_position=='Left' && $itemshis_val->item_image_ur!="")
							{?> <img src="<?= base_url().$itemshis_val->item_image_ur;?>" style="max-height:400px; float:left"/> <?php }?>
							سوال :&nbsp;
                            <?php 
								if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_stem_ur);}
								else
								{
									if($merged_array[$coun]->item_stem_ur == $merged_array[$coun+1]->item_stem_ur){echo html_entity_decode($itemshis_val->item_stem_ur);}
									else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_stem_ur).'</span>';}
								}
							?>
							<?php if($itemshis_val->item_image_position=='Right' && $itemshis_val->item_image_ur!="")
							{?> <img src="<?= base_url().$itemshis_val->item_image_ur;?>" style="max-height:400px; float:right"/> <?php }?>
							</td></tr>
							<?php }?>
							
						<?php if ($itemshis_val->item_image_position=='Bottom') 
						{
							if($itemshis_val->item_image_en!="" && $itemshis_val->item_image_ur!="") 
							{
								?>
								 <tr>
									<td style="float:left"><img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-width:100%;"/></td>
									<td style="float:right"><img src="<?= base_url().$itemshis_val->item_image_ur;?>" style="max-width:100%;"/></td>
								  </tr>
								<?php 
							}
							elseif($itemshis_val->item_image_en!=""&&$itemshis_val->item_image_ur=="")
							{
							?>
								 <tr>
									<td colspan="2" style="text-align:center;"><img src="<?= base_url().$itemshis_val->item_image_en;?>" style="max-width:100%;" /></td>          	
								  </tr>
								<?php 	
							}
							elseif($itemshis_val->item_image_en==""&&$itemshis_val->item_image_ur!="")
							{
							?>
								 <tr>
									<td colspan="2" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_image_ur;?>" style="max-width:100%;"/></td>          	
								  </tr>
								<?php 	
							}
						}
					}
						
				if($itemshis_val->item_type=='MCQ')
				{	
					if($itemshis_val->item_option_layout=='1')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2" >
                              <tr>
                                <td style="font-size:20px">(a) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
                                <td style="padding-left:50px"><div class="urdufont-right" >
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                            </table>
                            </td>
                              </tr>
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td style="font-size:20px">(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span>
                                </td>
                                <td style="padding-left:50px"><div class="urdufont-right" >
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                            </table></td>
                              </tr>
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td style="font-size:20px">(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
                                <td style="padding-left:50px"><div class="urdufont-right" >
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                            </table></td>
                              </tr>
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td style="font-size:20px">(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
                                <td style="padding-left:50px"><div class="urdufont-right" style="text-align:right">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                            </table></td>
                              </tr>
                            </table>
                            </td>
						</tr>
						<?php
					}
					elseif($itemshis_val->item_option_layout=='2')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(a) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
                                <td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                            </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
                                <td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                            </table></td>
                              </tr>
                              <tr>
                                <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
                                <td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                            </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td>(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
                                <td><div class="urdufont-right" style="padding-left:20px">
                                 <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
                              </tr>
                    
                            </table></td>
                              </tr>
                            </table>
                            </td>
						</tr>
						<?php
					}
					elseif($itemshis_val->item_option_layout=='3')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='4')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table>
							</td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><img src="<?= base_url().$itemshis_val->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><img src="<?= base_url().$itemshis_val->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><img src="<?= base_url().$itemshis_val->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
							  </tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='5')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span><img src="<?= base_url().$itemshis_val->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><img src="<?= base_url().$itemshis_val->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><img src="<?= base_url().$itemshis_val->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='6')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:15px">
							  <tr>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(a) <span><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(b) <span><img src="<?= base_url().$itemshis_val->item_option_b_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(c) <span><img src="<?= base_url().$itemshis_val->item_option_c_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  <td width="25%">
								  <table border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td>(d) <span><img src="<?= base_url().$itemshis_val->item_option_d_image;?>" style="max-width:175px;"/></span></td>
								  </tr>
								  </table>
							  </td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='7')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?>
                                </div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table>
							</td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemshis_val->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemshis_val->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $itemshis_val->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='8')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php echo html_entity_decode($itemshis_val->item_option_a_en);?>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemshis_val->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemshis_val->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
								<td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$itemshis_val->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='9')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"><span><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"><span><img src="<?= base_url().$itemshis_val->item_option_b_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                 <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"> <span><img src="<?= base_url().$itemshis_val->item_option_c_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							  <tr>
								<td colspan="2"><span><img src="<?= base_url().$itemshis_val->item_option_d_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							  
							</table></td>
							  </tr>
							</table>
							</td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='10')
					{
						?>
					   <tr>
						  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							</table>
							</td>
							<td><span><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='11')
					{
						?>
					   <tr>
						  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(b) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span>
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							</table> </td>
							<td><span><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
						</tr>
						
						<?php
					}
					elseif($itemshis_val->item_option_layout=='12')
					{
						?>
					   <tr>
						  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(a) <span><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_en);}
									else
									{
										if($merged_array[$coun]->item_option_a_en == $merged_array[$coun+1]->item_option_a_en){echo html_entity_decode($itemshis_val->item_option_a_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_a_ur);}
									else
									{
										if($merged_array[$coun]->item_option_a_ur == $merged_array[$coun+1]->item_option_a_ur){echo html_entity_decode($itemshis_val->item_option_a_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_a_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
		
							  <tr>
								<td>(b) <span><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_en);}
									else
									{
										if($merged_array[$coun]->item_option_b_en == $merged_array[$coun+1]->item_option_b_en){echo html_entity_decode($itemshis_val->item_option_b_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_b_ur);}
									else
									{
										if($merged_array[$coun]->item_option_b_ur == $merged_array[$coun+1]->item_option_b_ur){echo html_entity_decode($itemshis_val->item_option_b_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_b_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(c) <span><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_en);}
									else
									{
										if($merged_array[$coun]->item_option_c_en == $merged_array[$coun+1]->item_option_c_en){echo html_entity_decode($itemshis_val->item_option_c_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_c_ur);}
									else
									{
										if($merged_array[$coun]->item_option_c_ur == $merged_array[$coun+1]->item_option_c_ur){echo html_entity_decode($itemshis_val->item_option_c_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_c_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>(d) <span><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_en);}
									else
									{
										if($merged_array[$coun]->item_option_d_en == $merged_array[$coun+1]->item_option_d_en){echo html_entity_decode($itemshis_val->item_option_d_en);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_en).'</span>';}
									}
								?></span></td>
								<td><div class="urdufont-right" style="padding-left:20px"><?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_option_d_ur);}
									else
									{
										if($merged_array[$coun]->item_option_d_ur == $merged_array[$coun+1]->item_option_d_ur){echo html_entity_decode($itemshis_val->item_option_d_ur);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_option_d_ur).'</span>';}
									}
								?></div></td>
							  </tr>
							</table></td>
							  </tr>
							  <tr>
								<td colspan="4" style="text-align:center"><span><img src="<?= base_url().$itemshis_val->item_option_a_image;?>" style="max-height:400px;"/></span></td>
							  </tr>
							</table>
							</td>
						</tr>
						<?php
					}
				}
				elseif($itemshis_val->item_type=='ERQ')
				{
					if($itemshis_val->item_rubric_image!='')
					{
						  if($itemshis_val->item_rubric_urdu!=''&&$itemshis_val->item_rubric_english!='')
						  {?>
							  <table style="width: 100%">
								<?php if($itemshis_val->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
								<tr>
									<td style="width:50%">
                                        <?php 
											if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_rubric_english);}
											else
											{
												if($merged_array[$coun]->item_rubric_english == $merged_array[$coun+1]->item_rubric_english){echo html_entity_decode($itemshis_val->item_rubric_english);}
												else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_rubric_english).'</span>';}
											}
										?>
									</td>
									<td class="urdufont-right" style="text-align:right">
                                        <?php 
											if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_rubric_urdu);}
											else
											{
												if($merged_array[$coun]->item_rubric_urdu == $merged_array[$coun+1]->item_rubric_urdu){echo html_entity_decode($itemshis_val->item_rubric_urdu);}
												else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_rubric_urdu).'</span>';}
											}
										?>
									</td>
								</tr>
								<?php if($itemshis_val->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
						  <?php }
						  
						  elseif($itemshis_val->item_rubric_urdu==''&&$itemshis_val->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" >
								<?php if($itemshis_val->item_rubric_image_position=='Top'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							   
								<tr>
									<?php if($itemshis_val->item_rubric_image_position=='Left'){?>
									<td width="50%"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								
									<td>
                                    	<?php 
											if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_rubric_english);}
											else
											{
												if($merged_array[$coun]->item_rubric_english == $merged_array[$coun+1]->item_rubric_english){echo html_entity_decode($itemshis_val->item_rubric_english);}
												else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_rubric_english).'</span>';}
											}
										?>
                                    </td>
									
									<?php if($itemshis_val->item_rubric_image_position=='Right'){?>
									<td width="50%"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td>
									<?php }?>
								</tr>
							   
								<?php if($itemshis_val->item_rubric_image_position=='Bottom'){?>
								<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
								<?php }?>
							  </table>
					  <?php }
					  
						  elseif($itemshis_val->item_rubric_urdu!=''&&$itemshis_val->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%">
							<?php if($itemshis_val->item_rubric_image_position=='Top'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
							<tr>
								<?php if($itemshis_val->item_rubric_image_position=='Left'){?>
								<td width="50%"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
								<td style="text-align:right"><span class="urdufont-right">
                                <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_rubric_urdu);}
									else
									{
										if($merged_array[$coun]->item_rubric_urdu == $merged_array[$coun+1]->item_rubric_urdu){echo html_entity_decode($itemshis_val->item_rubric_urdu);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_rubric_urdu).'</span>';}
									}
								?>
                                </span></td>
								<?php if($itemshis_val->item_rubric_image_position=='Right'){?>
								<td width="50%"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td>
								<?php }?>
							</tr>
							<?php if($itemshis_val->item_rubric_image_position=='Bottom'){?>
							<tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							<?php }?>
						  </table>
					  <?php }
						  
						  else
						  {?>
							  <table width="100%">
								<tr><td style="text-align:center"><img src="<?= base_url().$itemshis_val->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
							  </table>
					  <?php }
					}
					else
					{
						  if($itemshis_val->item_rubric_urdu==''&&$itemshis_val->item_rubric_english!='')
						  {?>
							  <span style="font-size:16px; font-weight:bold">Item Rubric (English) :</span>
							  <table width="100%" ><tr><td><?php echo  html_entity_decode($itemshis_val->item_rubric_english);?></td></tr></table>
					  <?php 
						  }
						  elseif($itemshis_val->item_rubric_urdu!=''&&$itemshis_val->item_rubric_english=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">آیٹم روبرک (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right"><?php echo html_entity_decode($itemshis_val->item_rubric_urdu);?></span></td></tr></table>
					  <?php }
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr>
									<td style="width:50%; font-size:18px">
										<?php echo  html_entity_decode($itemshis_val->item_rubric_english);?>
									</td>
									<td class="urdufont-right" style="text-align:right">
										<?php echo html_entity_decode($itemshis_val->item_rubric_urdu);?>
									</td>
								  </tr>
							  </table>
						  <?php 
						  }
					  }
				}
				elseif($itemshis_val->item_type=='FIB')
				{
					 if($itemshis_val->item_fib_key_ur==''&&$itemshis_val->item_fib_key_eng!='')
					  {?>
						  <table style="margin:20px 0px 0px 50px"><tr ><td style="font-size:16px; font-weight:bold;">Key (English) :</td><td>
                          <?php 
									if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_fib_key_eng);}
									else
									{
										if($merged_array[$coun]->item_fib_key_eng == $merged_array[$coun+1]->item_fib_key_eng){echo html_entity_decode($itemshis_val->item_fib_key_eng);}
										else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_fib_key_eng).'</span>';}
									}
								?>
                          </td></tr></table>
						  <?php 
						  }
						  elseif($itemshis_val->item_fib_key_ur!=''&&$itemshis_val->item_fib_key_eng=='')
						  { ?>
						  <div style="font-size:24px; font-weight:bold; width:100%; text-align:right; padding-top:15px" class="urdufont-right">جواب (اردو) :</div>
						  <table width="100%"><tr><td style="text-align:right"><span class="urdufont-right">
                          <?php 
								if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_fib_key_ur);}
								else
								{
									if($merged_array[$coun]->item_fib_key_ur == $merged_array[$coun+1]->item_fib_key_ur){echo html_entity_decode($itemshis_val->item_fib_key_ur);}
									else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_fib_key_ur).'</span>';}
								}
							?>
                          </span></td></tr></table>
					  <?php }
						  else
						  {
							  ?>
							  <table style="width:100%">
								<tr>
									<td style="width:50%; font-size:18px">
                                        <?php 
											if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_fib_key_eng);}
											else
											{
												if($merged_array[$coun]->item_fib_key_eng == $merged_array[$coun+1]->item_fib_key_eng){echo html_entity_decode($itemshis_val->item_fib_key_eng);}
												else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_fib_key_eng).'</span>';}
											}
										?>
									</td>
									<td class="urdufont-right" style="text-align:right">
                                        <?php 
											if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_fib_key_ur);}
											else
											{
												if($merged_array[$coun]->item_fib_key_ur == $merged_array[$coun+1]->item_fib_key_ur){echo html_entity_decode($itemshis_val->item_fib_key_ur);}
												else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_fib_key_ur).'</span>';}
											}
										?>
									</td>
								  </tr>
							  </table>
						  <?php 
					  }
				}
				elseif($itemshis_val->item_type=='TF')
				{
				  ?>
					  <table width="30%" style="margin:10px 50px 10px 50px">
						<tr><td>Options :</td></tr>
						<tr>
							<td style="padding-left:25px">a. 
                            <?php 
								if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_tf_eng_1);}
								else
								{
									if($merged_array[$coun]->item_tf_eng_1 == $merged_array[$coun+1]->item_tf_eng_1){echo html_entity_decode($itemshis_val->item_tf_eng_1);}
									else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_tf_eng_1).'</span>';}
								}
							?>
                            </td>
							<td><div class="urdufont-right">
                            <?php 
								if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_tf_ur_1);}
								else
								{
									if($merged_array[$coun]->item_tf_ur_1 == $merged_array[$coun+1]->item_tf_ur_1){echo html_entity_decode($itemshis_val->item_tf_ur_1);}
									else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_tf_ur_1).'</span>';}
								}
							?>
                            </div></td>
						</tr>
						<tr>
							<td style="padding-left:25px">b. 
                            <?php 
								if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_tf_eng_2);}
								else
								{
									if($merged_array[$coun]->item_tf_eng_2 == $merged_array[$coun+1]->item_tf_eng_2){echo html_entity_decode($itemshis_val->item_tf_eng_2);}
									else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_tf_eng_2).'</span>';}
								}
							?>
                            </td>
							<td><div class="urdufont-right">
                            <?php 
								if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_tf_ur_2);}
								else
								{
									if($merged_array[$coun]->item_tf_ur_2 == $merged_array[$coun+1]->item_tf_ur_2){echo html_entity_decode($itemshis_val->item_tf_ur_2);}
									else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_tf_ur_2).'</span>';}
								}
							?>
                            </div></td>
						</tr>
						<?php /*?><tr><td>Answer Key :</td><td><?php echo $itemshis_val->item_option_correct;?> </td></tr><?php */?>
					  </table>
				  <?php 
				}
				elseif($itemshis_val->item_type=='MC')
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
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc1_1!="")
									{
										if($itemshis_val->item_en_mc1_1!="" && $itemshis_val->item_ur_mc1_1!="")
										{?>
											<div class="col-4">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_1 == $merged_array[$coun+1]->item_en_mc1_1){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_1).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_1 == $merged_array[$coun+1]->item_ur_mc1_1){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_1).'</span>';}
												}
											?></div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_1;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_1=="" && $itemshis_val->item_ur_mc1_1!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_1 == $merged_array[$coun+1]->item_ur_mc1_1){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_1).'</span>';}
												}
											?>
											</div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_1;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_1!="" && $itemshis_val->item_ur_mc1_1=="")
										{?>
											<div class="col-6">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_1 == $merged_array[$coun+1]->item_en_mc1_1){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_1).'</span>';}
												}
											?>
											</div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_1;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>1 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_1;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_1 == $merged_array[$coun+1]->item_pic_mc1_1){?>1 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_1;?>" style="max-height:60px; float:right"/><?php }
												else{?>1 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_1;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_1!="" && $itemshis_val->item_ur_mc1_1!="")
										{?>
											<div class="col-6">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_1 == $merged_array[$coun+1]->item_en_mc1_1){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_1).'</span>';}
												}
											?></div>
											<div class="col-6 urdufont-right" style="text-align:right">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_1 == $merged_array[$coun+1]->item_ur_mc1_1){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_1).'</span>';}
												}
											?></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_1=="" && $itemshis_val->item_ur_mc1_1!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">1 -
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_1 == $merged_array[$coun+1]->item_ur_mc1_1){echo html_entity_decode($itemshis_val->item_ur_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_1).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_1!="" && $itemshis_val->item_ur_mc1_1=="")
										{?>
											<div class="col-12">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_1 == $merged_array[$coun+1]->item_en_mc1_1){echo html_entity_decode($itemshis_val->item_en_mc1_1);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_1).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								   
								  </div>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  
								  <div class="row col-12" style="margin-top:10px; height:60px">
								   <?php if($itemshis_val->item_pic_mc1_2!="")
									{
										if($itemshis_val->item_en_mc1_2!="" && $itemshis_val->item_ur_mc1_2!="")
										{?>
											<div class="col-4">1 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_2 == $merged_array[$coun+1]->item_en_mc1_2){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_2).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">2 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_2 == $merged_array[$coun+1]->item_ur_mc1_2){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_2).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_2;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_2=="" && $itemshis_val->item_ur_mc1_2!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">2 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_2 == $merged_array[$coun+1]->item_ur_mc1_2){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_2).'</span>';}
												}
											?>
											</div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_2;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_2!="" && $itemshis_val->item_ur_mc1_2=="")
										{?>
											<div class="col-6">2 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_2 == $merged_array[$coun+1]->item_en_mc1_2){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_2).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_2;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>2 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_2;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_2 == $merged_array[$coun+1]->item_pic_mc1_2){?>2 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_2;?>" style="max-height:60px; float:right"/><?php }
												else{?>2 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_2;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_2!="" && $itemshis_val->item_ur_mc1_2!="")
										{?>
											<div class="col-6">2 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_2 == $merged_array[$coun+1]->item_en_mc1_2){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_2).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">2 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_2 == $merged_array[$coun+1]->item_ur_mc1_2){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_2).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_2=="" && $itemshis_val->item_ur_mc1_2!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">2 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_2 == $merged_array[$coun+1]->item_ur_mc1_2){echo html_entity_decode($itemshis_val->item_ur_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_2).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_2!="" && $itemshis_val->item_ur_mc1_2=="")
										{?>
											<div class="col-12">2 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_2 == $merged_array[$coun+1]->item_en_mc1_2){echo html_entity_decode($itemshis_val->item_en_mc1_2);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_2).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								   
								  </div>
								  
								  <?php if($itemshis_val->item_en_mc1_3!="" || $itemshis_val->item_ur_mc1_3!="" || $itemshis_val->item_pic_mc1_3){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									 <?php 
									if($itemshis_val->item_pic_mc1_3!="")
									{
										if($itemshis_val->item_en_mc1_3!="" && $itemshis_val->item_ur_mc1_3!="")
										{?>
											<div class="col-4">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_3 == $merged_array[$coun+1]->item_en_mc1_3){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_3).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_3 == $merged_array[$coun+1]->item_ur_mc1_3){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_3).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_3;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_3=="" && $itemshis_val->item_ur_mc1_3!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_3 == $merged_array[$coun+1]->item_ur_mc1_3){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_3).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_3;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_3!="" && $itemshis_val->item_ur_mc1_3=="")
										{?>
											<div class="col-6">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_3 == $merged_array[$coun+1]->item_en_mc1_3){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_3).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_3;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>3 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_3;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_3 == $merged_array[$coun+1]->item_pic_mc1_3){?>3 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_3;?>" style="max-height:60px; float:right"/><?php }
												else{?>3 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_3;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_3!="" && $itemshis_val->item_ur_mc1_3!="")
										{?>
											<div class="col-6">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_3 == $merged_array[$coun+1]->item_en_mc1_3){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_3).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_3 == $merged_array[$coun+1]->item_ur_mc1_3){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_3).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_3=="" && $itemshis_val->item_ur_mc1_3!="")
										{?>
		
											<div class="col-12 urdufont-right" style="text-align:right">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_3 == $merged_array[$coun+1]->item_ur_mc1_3){echo html_entity_decode($itemshis_val->item_ur_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_3).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_3!="" && $itemshis_val->item_ur_mc1_3=="")
										{?>
											<div class="col-12">3 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_3 == $merged_array[$coun+1]->item_en_mc1_3){echo html_entity_decode($itemshis_val->item_en_mc1_3);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_3).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc1_3!=""){echo "3 - ".html_entity_decode($itemshis_val->item_en_mc1_3);}?></div>
									<?php if($itemshis_val->item_pic_mc1_3!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "3 - ". html_entity_decode($itemshis_val->item_ur_mc1_3);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_3;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo  "3 - ". html_entity_decode($itemshis_val->item_ur_mc1_3);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc1_4!="" || $itemshis_val->item_ur_mc1_4!="" || $itemshis_val->item_pic_mc1_4){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
								  <?php 
									if($itemshis_val->item_pic_mc1_4!="")
									{
										if($itemshis_val->item_en_mc1_4!="" && $itemshis_val->item_ur_mc1_4!="")
										{?>
											<div class="col-4">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_4 == $merged_array[$coun+1]->item_en_mc1_4){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_4).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_4 == $merged_array[$coun+1]->item_ur_mc1_4){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_4).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_4;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_4=="" && $itemshis_val->item_ur_mc1_4!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_4 == $merged_array[$coun+1]->item_ur_mc1_4){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_4).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_4;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_4!="" && $itemshis_val->item_ur_mc1_4=="")
										{?>
											<div class="col-6">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_4 == $merged_array[$coun+1]->item_en_mc1_4){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_4).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_4;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>4 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_4;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_4 == $merged_array[$coun+1]->item_pic_mc1_4){?>4 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_4;?>" style="max-height:60px; float:right"/><?php }
												else{?>4 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_4;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_4!="" && $itemshis_val->item_ur_mc1_4!="")
										{?>
											<div class="col-6">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_4 == $merged_array[$coun+1]->item_en_mc1_4){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_4).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_4 == $merged_array[$coun+1]->item_ur_mc1_4){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_4).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_4=="" && $itemshis_val->item_ur_mc1_4!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_4 == $merged_array[$coun+1]->item_ur_mc1_4){echo html_entity_decode($itemshis_val->item_ur_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_4).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_4!="" && $itemshis_val->item_ur_mc1_4=="")
										{?>
											<div class="col-12">4 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_4 == $merged_array[$coun+1]->item_en_mc1_4){echo html_entity_decode($itemshis_val->item_en_mc1_4);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_4).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc1_4!=""){echo "4 - ".html_entity_decode($itemshis_val->item_en_mc1_4);}?></div>
									<?php if($itemshis_val->item_pic_mc1_4!=""){?>
									<div class="col-4 urdufont-right"  style="text-align:right"><?php echo "4 - ".  html_entity_decode($itemshis_val->item_ur_mc1_4);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_4;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right"  style="text-align:right"><?php echo "4 - ".  html_entity_decode($itemshis_val->item_ur_mc1_4);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc1_5!="" || $itemshis_val->item_ur_mc1_5!="" || $itemshis_val->item_pic_mc1_5){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
								   <?php 
									if($itemshis_val->item_pic_mc1_5!="")
									{
										if($itemshis_val->item_en_mc1_5!="" && $itemshis_val->item_ur_mc1_5!="")
										{?>
											<div class="col-4">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_5 == $merged_array[$coun+1]->item_en_mc1_5){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_5).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_5 == $merged_array[$coun+1]->item_ur_mc1_5){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_5).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_5;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_5=="" && $itemshis_val->item_ur_mc1_5!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_5 == $merged_array[$coun+1]->item_ur_mc1_5){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_5).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_5;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_5!="" && $itemshis_val->item_ur_mc1_5=="")
										{?>
											<div class="col-6">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_5 == $merged_array[$coun+1]->item_en_mc1_5){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_5).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_5;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>5 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_5;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_5 == $merged_array[$coun+1]->item_pic_mc1_5){?>5 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_5;?>" style="max-height:60px; float:right"/><?php }
												else{?>5 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_5;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_5!="" && $itemshis_val->item_ur_mc1_5!="")
										{?>
											<div class="col-6">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_5 == $merged_array[$coun+1]->item_en_mc1_5){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_5).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_5 == $merged_array[$coun+1]->item_ur_mc1_5){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_5).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_5=="" && $itemshis_val->item_ur_mc1_5!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_5 == $merged_array[$coun+1]->item_ur_mc1_5){echo html_entity_decode($itemshis_val->item_ur_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_5).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_5!="" && $itemshis_val->item_ur_mc1_5=="")
										{?>
											<div class="col-12">5 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_5 == $merged_array[$coun+1]->item_en_mc1_5){echo html_entity_decode($itemshis_val->item_en_mc1_5);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_5).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								   <?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc1_5!=""){echo "5 - ".html_entity_decode($itemshis_val->item_en_mc1_5);}?></div>
									<?php if($itemshis_val->item_pic_mc1_5!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "5 - ".  html_entity_decode($itemshis_val->item_ur_mc1_5);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_5;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "5 - ". html_entity_decode($itemshis_val->item_ur_mc1_5);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc1_6!="" || $itemshis_val->item_ur_mc1_6!="" || $itemshis_val->item_pic_mc1_6){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc1_6!="")
									{
										if($itemshis_val->item_en_mc1_6!="" && $itemshis_val->item_ur_mc1_6!="")
										{?>
											<div class="col-4">6 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_6 == $merged_array[$coun+1]->item_en_mc1_6){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_6).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_6 == $merged_array[$coun+1]->item_ur_mc1_6){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_6).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_6;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_6=="" && $itemshis_val->item_ur_mc1_6!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_6 == $merged_array[$coun+1]->item_ur_mc1_6){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_6).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_6;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_6!="" && $itemshis_val->item_ur_mc1_6=="")
										{?>
											<div class="col-6">6 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_6 == $merged_array[$coun+1]->item_en_mc1_6){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_6).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_6;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>6 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_6;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_6 == $merged_array[$coun+1]->item_pic_mc1_6){?>6 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_6;?>" style="max-height:60px; float:right"/><?php }
												else{?>6 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_6;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_6!="" && $itemshis_val->item_ur_mc1_6!="")
										{?>
											<div class="col-6">6 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_6 == $merged_array[$coun+1]->item_en_mc1_6){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_6).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_6 == $merged_array[$coun+1]->item_ur_mc1_6){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_6).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_6=="" && $itemshis_val->item_ur_mc1_6!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">6 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_6 == $merged_array[$coun+1]->item_ur_mc1_6){echo html_entity_decode($itemshis_val->item_ur_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_6).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_6!="" && $itemshis_val->item_ur_mc1_6=="")
										{?>
											<div class="col-12">6 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_6);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_6 == $merged_array[$coun+1]->item_en_mc1_6){echo html_entity_decode($itemshis_val->item_en_mc1_6);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_6).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc1_6!=""){echo "6 - ".html_entity_decode($itemshis_val->item_en_mc1_6);}?></div>
									<?php if($itemshis_val->item_pic_mc1_6!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "6 - ". html_entity_decode($itemshis_val->item_ur_mc1_6);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_6;?>" style="max-height:60px; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "6 - ". html_entity_decode($itemshis_val->item_ur_mc1_6);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc1_7!="" || $itemshis_val->item_ur_mc1_7!="" || $itemshis_val->item_pic_mc1_7){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
								   <?php 
									if($itemshis_val->item_pic_mc1_7!="")
									{
										if($itemshis_val->item_en_mc1_7!="" && $itemshis_val->item_ur_mc1_7!="")
										{?>
											<div class="col-4">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_7 == $merged_array[$coun+1]->item_en_mc1_7){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_7).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_7 == $merged_array[$coun+1]->item_ur_mc1_7){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_7).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_7;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_7=="" && $itemshis_val->item_ur_mc1_7!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_7 == $merged_array[$coun+1]->item_ur_mc1_7){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_7).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_7;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_7!="" && $itemshis_val->item_ur_mc1_7=="")
										{?>
											<div class="col-6">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_7 == $merged_array[$coun+1]->item_en_mc1_7){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_7).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_7;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>7 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_7;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_7 == $merged_array[$coun+1]->item_pic_mc1_7){?>7 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_7;?>" style="max-height:60px; float:right"/><?php }
												else{?>7 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_7;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_7!="" && $itemshis_val->item_ur_mc1_7!="")
										{?>
											<div class="col-6">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_7 == $merged_array[$coun+1]->item_en_mc1_7){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_7).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_7 == $merged_array[$coun+1]->item_ur_mc1_7){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_7).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_7=="" && $itemshis_val->item_ur_mc1_7!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_7 == $merged_array[$coun+1]->item_ur_mc1_7){echo html_entity_decode($itemshis_val->item_ur_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_7).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_7!="" && $itemshis_val->item_ur_mc1_7=="")
										{?>
											<div class="col-12">7 - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_7 == $merged_array[$coun+1]->item_en_mc1_7){echo html_entity_decode($itemshis_val->item_en_mc1_7);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_7).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								   <?php /*?> <div class="col-4"><?php if($itemshis_val->item_en_mc1_7!=""){echo "7 - ".html_entity_decode($itemshis_val->item_en_mc1_7);}?></div>
									<?php if($itemshis_val->item_pic_mc1_7!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "7 - ". html_entity_decode($itemshis_val->item_ur_mc1_7);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_7;?>" style="max-height:60px; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "7 - ". html_entity_decode($itemshis_val->item_ur_mc1_7);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc1_8!="" || $itemshis_val->item_ur_mc1_8!="" || $itemshis_val->item_pic_mc1_8){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc1_8!="")
									{
										if($itemshis_val->item_en_mc1_8!="" && $itemshis_val->item_ur_mc1_8!="")
										{?>
											<div class="col-4">8 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_8 == $merged_array[$coun+1]->item_en_mc1_8){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_8).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_8 == $merged_array[$coun+1]->item_ur_mc1_8){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_8).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_8;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_8=="" && $itemshis_val->item_ur_mc1_8!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_8 == $merged_array[$coun+1]->item_ur_mc1_8){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_8).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_8;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_8!="" && $itemshis_val->item_ur_mc1_8=="")
										{?>
											<div class="col-6">8 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_8 == $merged_array[$coun+1]->item_en_mc1_8){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_8).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_8;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>8 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_8;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_8 == $merged_array[$coun+1]->item_pic_mc1_8){?>8 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_8;?>" style="max-height:60px; float:right"/><?php }
												else{?>8 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_8;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_8!="" && $itemshis_val->item_ur_mc1_8!="")
										{?>
											<div class="col-6">8 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_8 == $merged_array[$coun+1]->item_en_mc1_8){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_8).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_8 == $merged_array[$coun+1]->item_ur_mc1_8){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_8).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_8=="" && $itemshis_val->item_ur_mc1_8!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">8 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_8 == $merged_array[$coun+1]->item_ur_mc1_8){echo html_entity_decode($itemshis_val->item_ur_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_8).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_8!="" && $itemshis_val->item_ur_mc1_8=="")
										{?>
											<div class="col-12">8 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_8);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_8 == $merged_array[$coun+1]->item_en_mc1_8){echo html_entity_decode($itemshis_val->item_en_mc1_8);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_8).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc1_8!=""){echo "8 - ".html_entity_decode($itemshis_val->item_en_mc1_8);}?></div>
									<?php if($itemshis_val->item_pic_mc1_8!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "8 - ". html_entity_decode($itemshis_val->item_ur_mc1_8);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_8;?>" style="max-height:60px; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "8 - ". html_entity_decode($itemshis_val->item_ur_mc1_8);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc1_9!="" || $itemshis_val->item_ur_mc1_9!="" || $itemshis_val->item_pic_mc1_9){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
								   <?php 
									if($itemshis_val->item_pic_mc1_9!="")
									{
										if($itemshis_val->item_en_mc1_9!="" && $itemshis_val->item_ur_mc1_9!="")
										{?>
											<div class="col-4">9 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_9);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_9 == $merged_array[$coun+1]->item_en_mc1_9){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_9).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_9);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_9 == $merged_array[$coun+1]->item_ur_mc1_9){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_9).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_9;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_9=="" && $itemshis_val->item_ur_mc1_9!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_9);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_9 == $merged_array[$coun+1]->item_ur_mc1_9){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_9).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_9;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_9!="" && $itemshis_val->item_ur_mc1_9=="")
										{?>
											<div class="col-6">9 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_9);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_9 == $merged_array[$coun+1]->item_en_mc1_9){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_9).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_9;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>9 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_9;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_9 == $merged_array[$coun+1]->item_pic_mc1_9){?>9 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_9;?>" style="max-height:60px; float:right"/><?php }
												else{?>9 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_9;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_9!="" && $itemshis_val->item_ur_mc1_9!="")
										{?>
											<div class="col-6">9 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_9);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_9 == $merged_array[$coun+1]->item_en_mc1_9){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_9).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_9);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_9 == $merged_array[$coun+1]->item_ur_mc1_9){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_9).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_9=="" && $itemshis_val->item_ur_mc1_9!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">9 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_9);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_9 == $merged_array[$coun+1]->item_ur_mc1_9){echo html_entity_decode($itemshis_val->item_ur_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_9).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_9!="" && $itemshis_val->item_ur_mc1_9=="")
										{?>
											<div class="col-12">9 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_9);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_9 == $merged_array[$coun+1]->item_en_mc1_9){echo html_entity_decode($itemshis_val->item_en_mc1_9);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_9).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								   <?php /*?> <div class="col-4"><?php if($itemshis_val->item_en_mc1_9!=""){echo "9 - ".html_entity_decode($itemshis_val->item_en_mc1_9);}?></div>
									<?php if($itemshis_val->item_pic_mc1_9!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "9 - ". html_entity_decode($itemshis_val->item_ur_mc1_9);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_9;?>" style="max-height:60px; float:right"/></div>
									 <?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "9 - ". html_entity_decode($itemshis_val->item_ur_mc1_9);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc1_10!="" || $itemshis_val->item_ur_mc1_10!="" || $itemshis_val->item_pic_mc1_10){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc1_10!="")
									{
										if($itemshis_val->item_en_mc1_10!="" && $itemshis_val->item_ur_mc1_10!="")
										{?>
											<div class="col-4">10 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_10);?>
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_10 == $merged_array[$coun+1]->item_en_mc1_10){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_10).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_10);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_10 == $merged_array[$coun+1]->item_ur_mc1_10){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_10).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_10;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_10=="" && $itemshis_val->item_ur_mc1_10!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_10);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_10 == $merged_array[$coun+1]->item_ur_mc1_10){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_10).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_10;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc1_10!="" && $itemshis_val->item_ur_mc1_10=="")
										{?>
											<div class="col-6">10 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_10);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_10 == $merged_array[$coun+1]->item_en_mc1_10){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_10).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc1_10;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>10 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_10;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc1_10 == $merged_array[$coun+1]->item_pic_mc1_10){?>10 - <img src="<?= base_url().$itemshis_val->item_pic_mc1_10;?>" style="max-height:60px; float:right"/><?php }
												else{?>10 -  <img src="<?= base_url().$itemshis_val->item_pic_mc1_10;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc1_10!="" && $itemshis_val->item_ur_mc1_10!="")
										{?>
											<div class="col-6">10 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_10);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_10 == $merged_array[$coun+1]->item_en_mc1_10){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_10).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_10);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_10 == $merged_array[$coun+1]->item_ur_mc1_10){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_10).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_10=="" && $itemshis_val->item_ur_mc1_10!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">10 - <?php echo  html_entity_decode($itemshis_val->item_ur_mc1_10);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_ur_mc1_10 == $merged_array[$coun+1]->item_ur_mc1_10){echo html_entity_decode($itemshis_val->item_ur_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc1_10).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc1_10!="" && $itemshis_val->item_ur_mc1_10=="")
										{?>
											<div class="col-12">10 - <?php echo html_entity_decode($itemshis_val->item_en_mc1_10);?>
                                             <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
												else
												{
													if($merged_array[$coun]->item_en_mc1_10 == $merged_array[$coun+1]->item_en_mc1_10){echo html_entity_decode($itemshis_val->item_en_mc1_10);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc1_10).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc1_10!=""){echo "10 - ".html_entity_decode($itemshis_val->item_en_mc1_10);}?></div>
									<?php if($itemshis_val->item_pic_mc1_10!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "10 - ". html_entity_decode($itemshis_val->item_ur_mc1_10);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc1_10;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "10 - ". html_entity_decode($itemshis_val->item_ur_mc1_10);?></div>
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
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_a!="")
									{
										if($itemshis_val->item_en_mc2_a!="" && $itemshis_val->item_ur_mc2_a!="")
										{?>
											<div class="col-4">a - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_a == $merged_array[$coun+1]->item_en_mc2_a){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_a).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">a - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_a == $merged_array[$coun+1]->item_ur_mc2_a){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_a).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_a;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_a=="" && $itemshis_val->item_ur_mc2_a!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">a - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_a == $merged_array[$coun+1]->item_ur_mc2_a){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_a).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_a;?>" style="max-height:60px; float:right"/></div><?php 

										}
										elseif($itemshis_val->item_en_mc2_a!="" && $itemshis_val->item_ur_mc2_a=="")
										{?>
											<div class="col-6">a - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_a == $merged_array[$coun+1]->item_en_mc2_a){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_a).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_a;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>a - <img src="<?= base_url().$itemshis_val->item_pic_mc2_a;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_a == $merged_array[$coun+1]->item_pic_mc2_a){?>a - <img src="<?= base_url().$itemshis_val->item_pic_mc2_a;?>" style="max-height:60px; float:right"/><?php }
												else{?>a -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_a;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_a!="" && $itemshis_val->item_ur_mc2_a!="")
										{?>
											<div class="col-6">a - <
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_a == $merged_array[$coun+1]->item_en_mc2_a){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_a).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">a - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_a == $merged_array[$coun+1]->item_ur_mc2_a){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_a).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_a=="" && $itemshis_val->item_ur_mc2_a!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">a - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_a == $merged_array[$coun+1]->item_ur_mc2_a){echo html_entity_decode($itemshis_val->item_ur_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_a).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_a!="" && $itemshis_val->item_ur_mc2_a=="")
										{?>
											<div class="col-12">a - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_a == $merged_array[$coun+1]->item_en_mc2_a){echo html_entity_decode($itemshis_val->item_en_mc2_a);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_a).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								  </div>
								  
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_b!="")
									{
										if($itemshis_val->item_en_mc2_b!="" && $itemshis_val->item_ur_mc2_b!="")
										{?>
											<div class="col-4">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_b == $merged_array[$coun+1]->item_en_mc2_b){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_b).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_b == $merged_array[$coun+1]->item_ur_mc2_b){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_b).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_b;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_b=="" && $itemshis_val->item_ur_mc2_b!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_b == $merged_array[$coun+1]->item_ur_mc2_b){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_b).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_b;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_b!="" && $itemshis_val->item_ur_mc2_b=="")
										{?>
											<div class="col-6">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_b == $merged_array[$coun+1]->item_en_mc2_b){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_b).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_b;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>b - <img src="<?= base_url().$itemshis_val->item_pic_mc2_b;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_b == $merged_array[$coun+1]->item_pic_mc2_b){?>b - <img src="<?= base_url().$itemshis_val->item_pic_mc2_b;?>" style="max-height:60px; float:right"/><?php }
												else{?>b -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_b;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_b!="" && $itemshis_val->item_ur_mc2_b!="")
										{?>
											<div class="col-6">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_b == $merged_array[$coun+1]->item_en_mc2_b){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_b).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_b == $merged_array[$coun+1]->item_ur_mc2_b){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_b).'</span>';}
												}
											?>
                                            </div><?php 

										}
										elseif($itemshis_val->item_en_mc2_b=="" && $itemshis_val->item_ur_mc2_b!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_b == $merged_array[$coun+1]->item_ur_mc2_b){echo html_entity_decode($itemshis_val->item_ur_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_b).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_b!="" && $itemshis_val->item_ur_mc2_b=="")
										{?>
											<div class="col-12">b - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_b == $merged_array[$coun+1]->item_en_mc2_b){echo html_entity_decode($itemshis_val->item_en_mc2_b);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_b).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								  </div>
								  
								  <?php if($itemshis_val->item_en_mc2_c!="" || $itemshis_val->item_ur_mc2_c!="" || $itemshis_val->item_pic_mc2_c){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
								   <?php 
									if($itemshis_val->item_pic_mc2_c!="")
									{
										if($itemshis_val->item_en_mc2_c!="" && $itemshis_val->item_ur_mc2_c!="")
										{?>
											<div class="col-4">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_c == $merged_array[$coun+1]->item_en_mc2_c){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_c).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_c == $merged_array[$coun+1]->item_ur_mc2_c){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_c).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_c;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_c=="" && $itemshis_val->item_ur_mc2_c!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_c == $merged_array[$coun+1]->item_ur_mc2_c){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_c).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_c;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_c!="" && $itemshis_val->item_ur_mc2_c=="")
										{?>
											<div class="col-6">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_c == $merged_array[$coun+1]->item_en_mc2_c){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_c).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_c;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>c - <img src="<?= base_url().$itemshis_val->item_pic_mc2_c;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_c == $merged_array[$coun+1]->item_pic_mc2_c){?>c - <img src="<?= base_url().$itemshis_val->item_pic_mc2_c;?>" style="max-height:60px; float:right"/><?php }
												else{?>c -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_c;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_c!="" && $itemshis_val->item_ur_mc2_c!="")
										{?>
											<div class="col-6">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_c == $merged_array[$coun+1]->item_en_mc2_c){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_c).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_c == $merged_array[$coun+1]->item_ur_mc2_c){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_c).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_c=="" && $itemshis_val->item_ur_mc2_c!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_c == $merged_array[$coun+1]->item_ur_mc2_c){echo html_entity_decode($itemshis_val->item_ur_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_c).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_c!="" && $itemshis_val->item_ur_mc2_c=="")
										{?>
											<div class="col-12">c - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_c == $merged_array[$coun+1]->item_en_mc2_c){echo html_entity_decode($itemshis_val->item_en_mc2_c);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_c).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								   <?php /*?> <div class="col-4"><?php if($itemshis_val->item_en_mc2_c!=""){echo "c - ".html_entity_decode($itemshis_val->item_en_mc2_c);}?></div>
									<?php if($itemshis_val->item_pic_mc2_c!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "c - ". html_entity_decode($itemshis_val->item_ur_mc2_c);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_c;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "c - ". html_entity_decode($itemshis_val->item_ur_mc2_c);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc2_d!="" || $itemshis_val->item_ur_mc2_d!="" || $itemshis_val->item_pic_mc2_d){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_d!="")
									{
										if($itemshis_val->item_en_mc2_d!="" && $itemshis_val->item_ur_mc2_d!="")
										{?>
											<div class="col-4">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_d == $merged_array[$coun+1]->item_en_mc2_d){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_d).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_d == $merged_array[$coun+1]->item_ur_mc2_d){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_d).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_d;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_d=="" && $itemshis_val->item_ur_mc2_d!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_d == $merged_array[$coun+1]->item_ur_mc2_d){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_d).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_d;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_d!="" && $itemshis_val->item_ur_mc2_d=="")
										{?>
											<div class="col-6">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_d == $merged_array[$coun+1]->item_en_mc2_d){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_d).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_d;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>d - <img src="<?= base_url().$itemshis_val->item_pic_mc2_d;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_d == $merged_array[$coun+1]->item_pic_mc2_d){?>d - <img src="<?= base_url().$itemshis_val->item_pic_mc2_d;?>" style="max-height:60px; float:right"/><?php }
												else{?>d -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_d;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_d!="" && $itemshis_val->item_ur_mc2_d!="")
										{?>
											<div class="col-6">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_d == $merged_array[$coun+1]->item_en_mc2_d){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_d).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_d == $merged_array[$coun+1]->item_ur_mc2_d){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_d).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_d=="" && $itemshis_val->item_ur_mc2_d!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_d == $merged_array[$coun+1]->item_ur_mc2_d){echo html_entity_decode($itemshis_val->item_ur_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_d).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_d!="" && $itemshis_val->item_ur_mc2_d=="")
										{?>
											<div class="col-12">d - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_d == $merged_array[$coun+1]->item_en_mc2_d){echo html_entity_decode($itemshis_val->item_en_mc2_d);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_d).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc2_d!=""){echo "d - ".html_entity_decode($itemshis_val->item_en_mc2_d);}?></div>
									<?php if($itemshis_val->item_pic_mc2_d!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "d - ". html_entity_decode($itemshis_val->item_ur_mc2_d);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_d;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "d - ". html_entity_decode($itemshis_val->item_ur_mc2_d);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc2_e!="" || $itemshis_val->item_ur_mc2_e!="" || $itemshis_val->item_pic_mc2_e){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_e!="")
									{
										if($itemshis_val->item_en_mc2_e!="" && $itemshis_val->item_ur_mc2_e!="")
										{?>
											<div class="col-4">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_e == $merged_array[$coun+1]->item_en_mc2_e){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_e).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_e == $merged_array[$coun+1]->item_ur_mc2_e){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_e).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_e;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_e=="" && $itemshis_val->item_ur_mc2_e!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_e == $merged_array[$coun+1]->item_ur_mc2_e){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_e).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_e;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_e!="" && $itemshis_val->item_ur_mc2_e=="")
										{?>
											<div class="col-6">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_e == $merged_array[$coun+1]->item_en_mc2_e){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_e).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_e;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>e - <img src="<?= base_url().$itemshis_val->item_pic_mc2_e;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_e == $merged_array[$coun+1]->item_pic_mc2_e){?>e - <img src="<?= base_url().$itemshis_val->item_pic_mc2_e;?>" style="max-height:60px; float:right"/><?php }
												else{?>e -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_e;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_e!="" && $itemshis_val->item_ur_mc2_e!="")
										{?>
											<div class="col-6">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_e == $merged_array[$coun+1]->item_en_mc2_e){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_e).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_e == $merged_array[$coun+1]->item_ur_mc2_e){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_e).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_e=="" && $itemshis_val->item_ur_mc2_e!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_e == $merged_array[$coun+1]->item_ur_mc2_e){echo html_entity_decode($itemshis_val->item_ur_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_e).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_e!="" && $itemshis_val->item_ur_mc2_e=="")
										{?>
											<div class="col-12">e - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_e == $merged_array[$coun+1]->item_en_mc2_e){echo html_entity_decode($itemshis_val->item_en_mc2_e);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_e).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc2_e!=""){echo "e - ".html_entity_decode($itemshis_val->item_en_mc2_e);}?></div>
									<?php if($itemshis_val->item_pic_mc2_e!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "e - ". html_entity_decode($itemshis_val->item_ur_mc2_e);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_e;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "e - ". html_entity_decode($itemshis_val->item_ur_mc2_e);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc2_f!="" || $itemshis_val->item_ur_mc2_f!="" || $itemshis_val->item_pic_mc2_f){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_f!="")
									{
										if($itemshis_val->item_en_mc2_f!="" && $itemshis_val->item_ur_mc2_f!="")
										{?>
											<div class="col-4">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_f == $merged_array[$coun+1]->item_en_mc2_f){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_f).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_f == $merged_array[$coun+1]->item_ur_mc2_f){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_f).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_f;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_f=="" && $itemshis_val->item_ur_mc2_f!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_f == $merged_array[$coun+1]->item_ur_mc2_f){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_f).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_f;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_f!="" && $itemshis_val->item_ur_mc2_f=="")
										{?>
											<div class="col-6">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_f == $merged_array[$coun+1]->item_en_mc2_f){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_f).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_f;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>f - <img src="<?= base_url().$itemshis_val->item_pic_mc2_f;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_f == $merged_array[$coun+1]->item_pic_mc2_f){?>f - <img src="<?= base_url().$itemshis_val->item_pic_mc2_f;?>" style="max-height:60px; float:right"/><?php }
												else{?>f -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_f;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_f!="" && $itemshis_val->item_ur_mc2_f!="")
										{?>
											<div class="col-6">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_f == $merged_array[$coun+1]->item_en_mc2_f){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_f).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_f == $merged_array[$coun+1]->item_ur_mc2_f){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_f).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_f=="" && $itemshis_val->item_ur_mc2_f!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_f == $merged_array[$coun+1]->item_ur_mc2_f){echo html_entity_decode($itemshis_val->item_ur_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_f).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_f!="" && $itemshis_val->item_ur_mc2_f=="")
										{?>
											<div class="col-12">f - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_f == $merged_array[$coun+1]->item_en_mc2_f){echo html_entity_decode($itemshis_val->item_en_mc2_f);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_f).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc2_f!=""){echo "f - ".html_entity_decode($itemshis_val->item_en_mc2_f);}?></div>
									<?php if($itemshis_val->item_pic_mc2_f!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "f - ". html_entity_decode($itemshis_val->item_ur_mc2_f);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_f;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "f - ". html_entity_decode($itemshis_val->item_ur_mc2_f);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc2_g!="" || $itemshis_val->item_ur_mc2_g!="" || $itemshis_val->item_pic_mc2_g){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_g!="")
									{
										if($itemshis_val->item_en_mc2_g!="" && $itemshis_val->item_ur_mc2_g!="")
										{?>
											<div class="col-4">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_g == $merged_array[$coun+1]->item_en_mc2_g){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_g).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_g == $merged_array[$coun+1]->item_ur_mc2_g){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_g).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_g=="" && $itemshis_val->item_ur_mc2_g!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_g == $merged_array[$coun+1]->item_ur_mc2_g){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_g).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_g!="" && $itemshis_val->item_ur_mc2_g=="")
										{?>
											<div class="col-6">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_g == $merged_array[$coun+1]->item_en_mc2_g){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_g).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>g - <img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_g == $merged_array[$coun+1]->item_pic_mc2_g){?>g - <img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/><?php }
												else{?>g -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_g!="" && $itemshis_val->item_ur_mc2_g!="")
										{?>
											<div class="col-6">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_g == $merged_array[$coun+1]->item_en_mc2_g){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_g).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_g == $merged_array[$coun+1]->item_ur_mc2_g){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_g).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_g=="" && $itemshis_val->item_ur_mc2_g!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_g == $merged_array[$coun+1]->item_ur_mc2_g){echo html_entity_decode($itemshis_val->item_ur_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_g).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_g!="" && $itemshis_val->item_ur_mc2_g=="")
										{?>
											<div class="col-12">g - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_g == $merged_array[$coun+1]->item_en_mc2_g){echo html_entity_decode($itemshis_val->item_en_mc2_g);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_g).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc2_g!=""){echo "g - ".html_entity_decode($itemshis_val->item_en_mc2_g);}?></div>
									<?php if($itemshis_val->item_pic_mc2_g!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "g - ". html_entity_decode($itemshis_val->item_ur_mc2_g);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "g - ". html_entity_decode($itemshis_val->item_ur_mc2_g);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc2_h!="" || $itemshis_val->item_ur_mc2_h!="" || $itemshis_val->item_pic_mc2_h){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_h!="")
									{
										if($itemshis_val->item_en_mc2_h!="" && $itemshis_val->item_ur_mc2_h!="")
										{?>
											<div class="col-4">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_h == $merged_array[$coun+1]->item_en_mc2_h){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_h).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_h == $merged_array[$coun+1]->item_ur_mc2_h){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_h).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_h;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_h=="" && $itemshis_val->item_ur_mc2_h!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_h == $merged_array[$coun+1]->item_ur_mc2_h){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_h).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_h;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_h!="" && $itemshis_val->item_ur_mc2_h=="")
										{?>
											<div class="col-6">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_h == $merged_array[$coun+1]->item_en_mc2_h){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_h).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_h;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>h - <img src="<?= base_url().$itemshis_val->item_pic_mc2_h;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_h == $merged_array[$coun+1]->item_pic_mc2_h){?>h - <img src="<?= base_url().$itemshis_val->item_pic_mc2_g;?>" style="max-height:60px; float:right"/><?php }
												else{?>h -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_h;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_h!="" && $itemshis_val->item_ur_mc2_h!="")
										{?>
											<div class="col-6">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_h == $merged_array[$coun+1]->item_en_mc2_h){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_h).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_h == $merged_array[$coun+1]->item_ur_mc2_h){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_h).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_h=="" && $itemshis_val->item_ur_mc2_h!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_h == $merged_array[$coun+1]->item_ur_mc2_h){echo html_entity_decode($itemshis_val->item_ur_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_h).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_h!="" && $itemshis_val->item_ur_mc2_h=="")
										{?>
											<div class="col-12">h - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_h == $merged_array[$coun+1]->item_en_mc2_h){echo html_entity_decode($itemshis_val->item_en_mc2_h);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_h).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc2_h!=""){echo "h - ".html_entity_decode($itemshis_val->item_en_mc2_h);}?></div>
									<?php if($itemshis_val->item_pic_mc2_h!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "h - ". html_entity_decode($itemshis_val->item_ur_mc2_h);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_h;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "h - ". html_entity_decode($itemshis_val->item_ur_mc2_h);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc2_i!="" || $itemshis_val->item_ur_mc2_i!="" || $itemshis_val->item_pic_mc2_i){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
									<?php 
									if($itemshis_val->item_pic_mc2_i!="")
									{
										if($itemshis_val->item_en_mc2_i!="" && $itemshis_val->item_ur_mc2_i!="")
										{?>
											<div class="col-4">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_i == $merged_array[$coun+1]->item_en_mc2_i){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_i).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_i == $merged_array[$coun+1]->item_ur_mc2_i){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_i).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_i;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_i=="" && $itemshis_val->item_ur_mc2_i!="")
										{?>

											<div class="col-6 urdufont-right" style="text-align:right">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_i == $merged_array[$coun+1]->item_ur_mc2_i){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_i).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_i;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_i!="" && $itemshis_val->item_ur_mc2_i=="")
										{?>
											<div class="col-6">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_i == $merged_array[$coun+1]->item_en_mc2_i){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_i).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_i;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>i - <img src="<?= base_url().$itemshis_val->item_pic_mc2_i;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_i == $merged_array[$coun+1]->item_pic_mc2_i){?>i - <img src="<?= base_url().$itemshis_val->item_pic_mc2_i;?>" style="max-height:60px; float:right"/><?php }
												else{?>i -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_i;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_i!="" && $itemshis_val->item_ur_mc2_i!="")
										{?>
											<div class="col-6">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_i == $merged_array[$coun+1]->item_en_mc2_i){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_i).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_i == $merged_array[$coun+1]->item_ur_mc2_i){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_i).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_i=="" && $itemshis_val->item_ur_mc2_i!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_i == $merged_array[$coun+1]->item_ur_mc2_i){echo html_entity_decode($itemshis_val->item_ur_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_i).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_i!="" && $itemshis_val->item_ur_mc2_i=="")
										{?>
											<div class="col-12">i - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_i == $merged_array[$coun+1]->item_en_mc2_i){echo html_entity_decode($itemshis_val->item_en_mc2_i);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_i).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
									<?php /*?><div class="col-4"><?php if($itemshis_val->item_en_mc2_i!=""){echo "i - ".html_entity_decode($itemshis_val->item_en_mc2_i);}?></div>
									<?php if($itemshis_val->item_pic_mc2_i!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "i - ". html_entity_decode($itemshis_val->item_ur_mc2_i);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_i;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "i - ". html_entity_decode($itemshis_val->item_ur_mc2_i);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								  
								  <?php if($itemshis_val->item_en_mc2_j!="" || $itemshis_val->item_ur_mc2_j!="" || $itemshis_val->item_pic_mc2_j){?>
								  <div class="container"><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>
								  <div class="row col-12" style="margin-top:10px; height:60px">
								  <?php 
									if($itemshis_val->item_pic_mc2_j!="")
									{
										if($itemshis_val->item_en_mc2_j!="" && $itemshis_val->item_ur_mc2_j!="")
										{?>
											<div class="col-4">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_j == $merged_array[$coun+1]->item_en_mc2_j){echo html_entity_decode($itemshis_val->item_en_mc2_j);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_j).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4 urdufont-right" style="text-align:right">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_j == $merged_array[$coun+1]->item_ur_mc2_j){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_j).'</span>';}
												}
											?>
                                            </div>
											<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_j;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_j=="" && $itemshis_val->item_ur_mc2_j!="")
										{?>
											<div class="col-6 urdufont-right" style="text-align:right">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_j == $merged_array[$coun+1]->item_ur_mc2_j){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_j).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_j;?>" style="max-height:60px; float:right"/></div><?php 
										}
										elseif($itemshis_val->item_en_mc2_j!="" && $itemshis_val->item_ur_mc2_j=="")
										{?>
											<div class="col-6">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_j == $merged_array[$coun+1]->item_en_mc2_j){echo html_entity_decode($itemshis_val->item_en_mc2_j);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_j).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6"><img src="<?= base_url().$itemshis_val->item_pic_mc2_j;?>" style="max-height:60px; float:right"/></div><?php 
										}
										else
										{
											if($coun+1==count($merged_array)){?>j - <img src="<?= base_url().$itemshis_val->item_pic_mc2_j;?>" style="max-height:60px; float:right"/><?php }
											else
											{
												if($merged_array[$coun]->item_pic_mc2_j == $merged_array[$coun+1]->item_pic_mc2_j){?>j - <img src="<?= base_url().$itemshis_val->item_pic_mc2_j;?>" style="max-height:60px; float:right"/><?php }
												else{?>j -  <img src="<?= base_url().$itemshis_val->item_pic_mc2_j;?>" style="max-height:60px; float:right"/><?php }
											}
										}
									}
									else
									{
										if($itemshis_val->item_en_mc2_j!="" && $itemshis_val->item_ur_mc2_j!="")
										{?>
											<div class="col-6">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_j == $merged_array[$coun+1]->item_en_mc2_j){echo html_entity_decode($itemshis_val->item_en_mc2_j);}

													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_j).'</span>';}
												}
											?>
                                            </div>
											<div class="col-6 urdufont-right" style="text-align:right">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_j == $merged_array[$coun+1]->item_ur_mc2_j){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_j).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_j=="" && $itemshis_val->item_ur_mc2_j!="")
										{?>
											<div class="col-12 urdufont-right" style="text-align:right">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_ur_mc2_j == $merged_array[$coun+1]->item_ur_mc2_j){echo html_entity_decode($itemshis_val->item_ur_mc2_j);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_ur_mc2_j).'</span>';}
												}
											?>
                                            </div><?php 
										}
										elseif($itemshis_val->item_en_mc2_j!="" && $itemshis_val->item_ur_mc2_j=="")
										{?>
											<div class="col-12">j - 
                                            <?php 
												if($coun+1==count($merged_array)){echo html_entity_decode($itemshis_val->item_en_mc2_j);}
												else
												{
													if($merged_array[$coun]->item_en_mc2_j == $merged_array[$coun+1]->item_en_mc2_j){echo html_entity_decode($itemshis_val->item_en_mc2_j);}
													else{echo '<span style="color:#F00">'.html_entity_decode($itemshis_val->item_en_mc2_j).'</span>';}
												}
											?>
                                            </div><?php
										}
									}
									?>
								  <?php /*?><div class="row col-12" style="margin-top:10px; line-height:38px">
									<div class="col-4"><?php if($itemshis_val->item_en_mc2_j!=""){echo "j - ".html_entity_decode($itemshis_val->item_en_mc2_j);}?></div>
									<?php if($itemshis_val->item_pic_mc2_j!=""){?>
									<div class="col-4 urdufont-right" style="text-align:right"><?php echo "j - ". html_entity_decode($itemshis_val->item_ur_mc2_j);?></div>
									<div class="col-4"><img src="<?= base_url().$itemshis_val->item_pic_mc2_j;?>" style="max-height:60px; float:right"/></div>
									<?php }else{?>
									<div class="col-8 urdufont-right" style="text-align:right"><?php echo "j - ". html_entity_decode($itemshis_val->item_ur_mc2_j);?></div>
									<?php }?><?php */?>
								  </div>
								  <?php }?>
								</div>
							  </div>
							  <!---------------for column-2 ends here--------------------> 
							  <!---------------answer column here here-------------------->
							  <div class="col-2">
								<div class="row" id="item_mc_ans_key" >
								  <div class="col-12" style="margin-bottom:11px">
									<h3>Answer</h3>
								  </div>
								</div>
								<?php
									$item_mc_ans_key = $itemshis_val->item_mc_ans_key;
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
									
									if($cc==1)
									{$item_mc_ans_key2 = "";}
									else
									{$item_mc_ans_key2 = $merged_array[$coun+1]->item_mc_ans_key;}
									//echo '<pre>';
									//print_r($merged_array);
									//die();
									$answ = explode('_',$item_mc_ans_key2);
									$answ1 = (isset($answ[0])&&$answ[0]!="")?substr($answ[0], -1):"";
									$answ2 = (isset($answ[1])&&$answ[1]!="")?substr($answ[1], -1):"";
									$answ3 = (isset($answ[2])&&$answ[2]!="")?substr($answ[2], -1):"";
									$answ4 = (isset($answ[3])&&$answ[3]!="")?substr($answ[3], -1):"";
									$answ5 = (isset($answ[4])&&$answ[4]!="")?substr($answ[4], -1):"";
									$answ6 = (isset($answ[5])&&$answ[5]!="")?substr($answ[5], -1):"";
									$answ7 = (isset($answ[6])&&$answ[6]!="")?substr($answ[6], -1):"";
									$answ8 = (isset($answ[7])&&$answ[7]!="")?substr($answ[7], -1):"";
									$answ9 = (isset($answ[8])&&$answ[8]!="")?substr($answ[8], -1):"";
									$answ10 = (isset($answ[9])&&$answ[9]!="")?substr($answ[9], -1):"";
								?>
								<div class="row borders" style="padding:0px 0px 0px 15px;">
								  <?php if($ans1!=""){?>
								  <div class="row col-12" style="margin-top:14px; height:60px">1  -  
								  	<?php 
								  		if($coun+1==count($merged_array)){	echo $ans1;	}
										else{	if($ans1 == $answ1){	echo $ans1;	}else{	echo '<span style="color:#F00">'.$ans1.'</span>';	}	}
									?>
									</div>
                                    
								  <?php } if($ans2!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">2  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans2;	}
										else{	if($ans2 == $answ2){	echo $ans2;	}else{	echo '<span style="color:#F00">'.$ans2.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans3!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">3  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans3;	}
										else{	if($ans3 == $answ3){	echo $ans3;	}else{	echo '<span style="color:#F00">'.$ans3.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans4!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">4  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans4;	}
										else{	if($ans4 == $answ4){	echo $ans4;	}else{	echo '<span style="color:#F00">'.$ans4.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans5!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">5  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans5;	}
										else{	if($ans5 == $answ5){	echo $ans5;	}else{	echo '<span style="color:#F00">'.$ans5.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans6!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">6  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans6;	}
										else{	if($ans6 == $answ6){	echo $ans6;	}else{	echo '<span style="color:#F00">'.$ans6.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans7!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">7  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans7;	}
										else{	if($ans7 == $answ7){	echo $ans7;	}else{	echo '<span style="color:#F00">'.$ans7.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans8!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">8  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans8;	}
										else{	if($ans8 == $answ8){	echo $ans8;	}else{	echo '<span style="color:#F00">'.$ans8.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans9!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">9  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans9;	}
										else{	if($ans9 == $answ9){	echo $ans9;	}else{	echo '<span style="color:#F00">'.$ans9.'</span>';	}	}
									?>
                                  </div>
                                  
								  <?php } if($ans10!=""){?>
								  <div class="row container"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>
								  <!------------------------------------------------------>
								  <div class="row col-12" style="margin-top:15px; height:60px">10  -  
								  <?php 
								  		if($coun+1==count($merged_array)){	echo $ans10;	}
										else{	if($ans10 == $answ10){	echo $ans10;	}else{	echo '<span style="color:#F00">'.$ans10.'</span>';	}	}
									?>
                                  </div>
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
                <?php $cc--; $coun++;} ?>
            </div> 
            <?php }else{echo 'No history found';}?>
            <!------------------------------------------------------------------------------------------>
        </div>
      </div>
    </section>
  </div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


