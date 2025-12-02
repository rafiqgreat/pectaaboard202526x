  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); ?>
				<!---- start here is item view filmzy --->
				<?php
				$pilotheaders = $this->Paperview_model->get_pilotheader_by_suject($papersubject[0]['subject_name_en']);
				//print_r($pilotheaders);
				$pilotheaders = $pilotheaders[0];
				if(!empty($pilotheaders)){?>
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
				}?>
				<div class="container" style="padding-top:25px">
					<div class="row">
						<div style="width: 100%">
							<?php
							if(!empty($paragraphs)){
								foreach($paragraphs as $itemspara){
									//print 'paraid = '.$itemspara->para_id.'<br>';
									//print 'para_grade_id = '.$itemspara->para_grade_id.'<br>';
									//print 'para_subject_id = '.$itemspara->para_subject_id.'<br>';
									?>
									<?php if($itemspara->para_title_en != ''){ ?>
									<div class="row">
										<div class="col-lg-12 col-sm-12">                         
										   <div style="font-weight: bold;">Paragraph Instruction</div>
										   <div><?php echo $itemspara->para_title_en; ?></div>
										</div>
									</div>
									<?php }?>
									<?php if($itemspara->para_title_ur != ''){ ?>
									<div class="row">
										<div class="col-lg-12 col-sm-12">                         
											<div class="urdufont-right" style="text-align: right">پیرا گراف ہدایات *</div>
											<div class="urdufont-right" dir="rtl" style="text-align: right;"><?php echo $itemspara->para_title_ur; ?></div>
										</div>
									 </div>
									 <?php }?>
									
									<div style="border:dotted; color:#000" >
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
												<?php echo html_entity_decode($itemspara->para_text_en);?> 

												<?php if($itemspara->para_img_position=='Right'&&$itemspara->para_image!='') {?> <img src="<?= base_url().$itemspara->para_image;?>" style="max-height:250px; float:right; margin: 4px;max-width:250px;"/> <?php }?>  
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
										$qno = 1;
										for($i = 21; $i <= 30; $i++){
											//print $itemspara->{'para_item_'.$i}.'<br>';
											if($itemspara->{'para_item_'.$i} != 0 || $itemspara->{'para_item_'.$i} == '' ){
												$para_item_21 = $this->Paperview_model->get_rev_items_by_id($itemspara->{'para_item_'.$i});
												$para_item_21 = $para_item_21[0];
												//print_r($para_item_21);
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

                        <td colspan="2" style="font-weight:bold">Question No.<?php print $qno; $qno++;?> : <?php echo html_entity_decode($para_item_21->item_stem_en);?>

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
										}?>
									</div>
								<?php
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