  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Group View (Subject Specialist)</h3>
          </div>
          
        </div>
        <div class="card-body"> 

	   <!-- For Messages -->
	   <?php 
			//echo '<PRE>';
			//print_r($group_item_1[0]);
			//die();
			$groupinfo = $group[0];	
			$group_item_1 = isset($group_item_1[0])?$group_item_1[0]:[];
			$group_item_2 = isset($group_item_2[0])?$group_item_2[0]:[];
			$group_item_3 = isset($group_item_3[0])?$group_item_3[0]:[];
			$group_item_4 = isset($group_item_4[0])?$group_item_4[0]:[]; 
			$group_item_5 = isset($group_item_5[0])?$group_item_5[0]:[];
			$group_item_6 = isset($group_item_6[0])?$group_item_6[0]:[];
			$group_item_7 = isset($group_item_7[0])?$group_item_7[0]:[];
			$group_item_8 = isset($group_item_8[0])?$group_item_8[0]:[];
			$group_item_9 = isset($group_item_9[0])?$group_item_9[0]:[];
			$group_item_10 = isset($group_item_10[0])?$group_item_10[0]:[];

			$this->load->view('admin/includes/_messages.php') ?>
            
			<div class="row form-group">
              	<div class="col-lg-6 col-sm-12">                         
                   <label for="group_grade_id" class="col-sm-12 control-label">Grade</label>
                   <input type="text" name="group_grade_id" class="form-control" id="group_grade_id"  value="<?php echo $groupinfo->grade_name_en; ?>" readonly="readonly" >
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="group_subject_id" class="col-sm-12 control-label">Subject</label>
                    <input type="text" name="group_subject_id" class="form-control" id="group_subject_id"  value="<?php echo $groupinfo->subject_name_en; ?>" readonly="readonly" >
                </div>
             </div>
			
            <div class="row">
              	<div class="col-lg-6 col-sm-12">                         
                   <label for="group_title_en" class="col-sm-12 control-label" style="padding-top:15px">Group Instruction</label>
                   <input type="text" name="group_title_en" class="form-control" id="group_title_en"  value="<?php echo $groupinfo->group_title_en; ?>" readonly="readonly" >
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="group_title_ur" class="control-label urdufont-right" style="float:right">گروپ ہدایات *</label>
                    <input type="text" name="group_title_ur" class="form-control" id="group_title_ur"  dir="rtl" value="<?php echo $groupinfo->group_title_ur; ?>" readonly="readonly" >
                </div>
             </div>
            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_1!="" && $group_item_1!=[]){?>
             <table width="100%" style="margin-top:25px">
			 <?php if ($group_item_1->item_image_position=='Top') 
				{
				if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_1->item_image_en!=""&&$group_item_1->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_1->item_image_en==""&&$group_item_1->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_1->item_stem_en!="" || $group_item_1->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (a):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_1->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_1->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_1->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_1->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_1->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_1->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_1->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_1->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_1->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_1->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_1->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_1->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_1->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_1->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_1->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_1->item_image_position=='Bottom') 
				{
				if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_1->item_image_en!=""&&$group_item_1->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_1->item_image_en==""&&$group_item_1->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_1->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
             	<?php 
				if($group_item_1->item_option_layout=='1')
            	{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
    <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
    <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
    <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
    <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
            }
				elseif($group_item_1->item_option_layout=='2')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
  </tr>
</table></td> <td><table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
    <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
  </tr>
</table></td>
  </tr>
</table>
</td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='3')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='4')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='5')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='6')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='7')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='8')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='9')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_b_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"> <span><img src="<?= base_url().$group_item_1->item_option_c_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><span><img src="<?= base_url().$group_item_1->item_option_d_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                      
                    </table></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='10')
				{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table>
                    </td>
                    <td><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='11')
				{
				?>
               <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                    </table> </td>
                    <td><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                </tr>
                
                <?php
			}
				elseif($group_item_1->item_option_layout=='12')
				{
				?>
               <tr>
                  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(a) <span><?php echo html_entity_decode($group_item_1->item_option_a_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_a_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(b) <span><?php echo html_entity_decode($group_item_1->item_option_b_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_b_ur);?></span></td>
                      </tr>
                    </table></td>  <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(c) <span><?php echo html_entity_decode($group_item_1->item_option_c_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_c_ur);?></span></td>
                      </tr>
                    </table></td> <td><table border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td>(d) <span><?php echo html_entity_decode($group_item_1->item_option_d_en);?></span></td>
                        <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_1->item_option_d_ur);?></span></td>
                      </tr>
                    </table></td>
                      </tr>
                      <tr>
                        <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_1->item_option_a_image;?>" style="max-height:400px;"/></span></td>
                      </tr>
                    </table>
                    </td>
                </tr>
                <?php
			}
				?>
             </table>
             
             <?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_2!="" && $group_item_2!=[]){?>
             <table width="100%">
			 <?php if ($group_item_2->item_image_position=='Top') 
				{
				if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_2->item_image_en!=""&&$group_item_2->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_2->item_image_en==""&&$group_item_2->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_2->item_stem_en!="" || $group_item_2->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (b):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_2->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_2->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_2->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_2->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_2->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_2->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_2->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_2->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_2->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_2->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_2->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_2->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_2->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_2->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_2->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_2->item_image_position=='Bottom') 
				{
				if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_2->item_image_en!=""&&$group_item_2->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_2->item_image_en==""&&$group_item_2->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_2->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_2->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_2->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_2->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_2->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_2->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_2->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_2->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_2->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_2->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
			<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_3!="" && $group_item_3!=[]){?>
             <table width="100%">
			 <?php if ($group_item_3->item_image_position=='Top') 
				{
				if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_3->item_image_en!=""&&$group_item_3->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_3->item_image_en==""&&$group_item_3->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_3->item_stem_en!="" || $group_item_3->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (c):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_3->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_3->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_3->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_3->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_3->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_3->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_3->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_3->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_3->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_3->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_3->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_3->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_3->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_3->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_3->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_3->item_image_position=='Bottom') 
				{
				if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_3->item_image_en!=""&&$group_item_3->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_3->item_image_en==""&&$group_item_3->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_3->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_3->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_3->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_3->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_3->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_3->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_3->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_3->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_3->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_3->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_4!="" && $group_item_4!=[]){?>
             <table width="100%">
			 <?php if ($group_item_4->item_image_position=='Top') 
				{
				if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_4->item_image_en!=""&&$group_item_4->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_4->item_image_en==""&&$group_item_4->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_4->item_stem_en!="" || $group_item_4->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (d):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_4->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_4->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_4->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_4->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_4->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_4->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_4->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_4->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_4->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_4->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_4->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_4->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_4->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_4->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_4->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_4->item_image_position=='Bottom') 
				{
				if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_4->item_image_en!=""&&$group_item_4->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_4->item_image_en==""&&$group_item_4->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_4->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_4->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_4->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_4->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_4->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_4->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_4->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_4->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_4->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_4->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_5!="" && $group_item_5!=[]){?>
             <table width="100%">
			 <?php if ($group_item_5->item_image_position=='Top') 
				{
				if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_5->item_image_en!=""&&$group_item_5->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_5->item_image_en==""&&$group_item_5->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_5->item_stem_en!="" || $group_item_5->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (e):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_5->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_5->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_5->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_5->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_5->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_5->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_5->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_5->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_5->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_5->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_5->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_5->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_5->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_5->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_5->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_5->item_image_position=='Bottom') 
				{
				if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_5->item_image_en!=""&&$group_item_5->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_5->item_image_en==""&&$group_item_5->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_5->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_5->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_5->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_5->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_5->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_5->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_5->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_5->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_5->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_5->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_6!="" && $group_item_6!=[]){?>
             <table width="100%">
			 <?php if ($group_item_6->item_image_position=='Top') 
				{
				if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_6->item_image_en!=""&&$group_item_6->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_6->item_image_en==""&&$group_item_6->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_6->item_stem_en!="" || $group_item_6->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (f):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_6->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_6->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_6->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_6->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_6->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_6->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_6->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_6->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_6->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_6->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_6->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_6->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_6->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_6->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_6->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_6->item_image_position=='Bottom') 
				{
				if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_6->item_image_en!=""&&$group_item_6->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_6->item_image_en==""&&$group_item_6->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
             <?php if($group_item_6->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_6->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_6->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_6->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_6->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_6->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_6->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_6->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_6->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_6->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_7!="" && $group_item_7!=[]){?>
             <table width="100%">
			 <?php if ($group_item_7->item_image_position=='Top') 
				{
				if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_7->item_image_en!=""&&$group_item_7->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_7->item_image_en==""&&$group_item_7->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_7->item_stem_en!="" || $group_item_7->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (g):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_7->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_7->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_7->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_7->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_7->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_7->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_7->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_7->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_7->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_7->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_7->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_7->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_7->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_7->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_7->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_7->item_image_position=='Bottom') 
				{
				if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_7->item_image_en!=""&&$group_item_7->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_7->item_image_en==""&&$group_item_7->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_7->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_7->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_7->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_7->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_7->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_7->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_7->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_7->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_7->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_7->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_8!="" && $group_item_8!=[]){?>
             <table width="100%">
			 <?php if ($group_item_8->item_image_position=='Top') 
				{
				if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_8->item_image_en!=""&&$group_item_8->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_8->item_image_en==""&&$group_item_8->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_8->item_stem_en!="" || $group_item_8->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (h):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_8->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_8->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_8->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_8->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_8->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_8->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_8->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_8->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_8->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_8->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_8->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_8->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_8->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_8->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_8->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_8->item_image_position=='Bottom') 
				{
				if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_8->item_image_en!=""&&$group_item_8->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_8->item_image_en==""&&$group_item_8->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_8->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_8->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_8->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_8->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_8->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_8->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_8->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_8->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_8->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_8->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_9!="" && $group_item_9!=[]){?>
             <table width="100%">
			 <?php if ($group_item_9->item_image_position=='Top') 
				{
				if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_9->item_image_en!=""&&$group_item_9->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_9->item_image_en==""&&$group_item_9->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_9->item_stem_en!="" || $group_item_9->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (i):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_9->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_9->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_9->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_9->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_9->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_9->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_9->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_9->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_9->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_9->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_9->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_9->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_9->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_9->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_9->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_9->item_image_position=='Bottom') 
				{
				if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_9->item_image_en!=""&&$group_item_9->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_9->item_image_en==""&&$group_item_9->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_9->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_9->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_9->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_9->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_9->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_9->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_9->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_9->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_9->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_9->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_10!="" && $group_item_10!=[]){?>
             <table width="100%">
			 <?php if ($group_item_10->item_image_position=='Top') 
				{
				if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_10->item_image_en!=""&&$group_item_10->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_10->item_image_en==""&&$group_item_10->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>
				<?php if ($group_item_10->item_stem_en!="" || $group_item_10->item_stem_ur!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (j):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_10->item_stem_en);?></span>
                <?php if($this->session->userdata('role_id')==3){?>
				<?php if ($group_item_10->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/view/'.$group_item_10->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_10->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_erq_crq/'.$group_item_10->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==2){?>
                <?php if ($group_item_10->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ss_view/'.$group_item_10->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_10->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/ss_view_erq_crq/'.$group_item_10->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?>
                <?php if($this->session->userdata('role_id')==4){?>
                <?php if ($group_item_10->item_type=='MCQ'){?><a href=<?php echo base_url('admin/items/ae_view/'.$group_item_10->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php if ($group_item_10->item_type=='ERQ'){?><a href=<?php echo base_url('admin/items/view_combine/'.$group_item_10->item_id); ?> target="_blank">View Item</a><?php }?>
                <?php }?></td></tr>
                <?php }?>
                <?php if ($group_item_10->item_stem_ur!=""){?>
                <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($group_item_10->item_stem_ur);?> </span></td></tr>
                <?php }?>
			<?php if ($group_item_10->item_image_position=='Bottom') 
				{
				if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
				{
					?>
					 <tr>
						<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
						<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					<?php 
				}
				elseif($group_item_10->item_image_en!=""&&$group_item_10->item_image_ur=="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;" /></td>          	
					  </tr>
					<?php 	
				}
				elseif($group_item_10->item_image_en==""&&$group_item_10->item_image_ur!="")
				{
				?>
					 <tr>
						<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>          	
					  </tr>
					<?php 	
				}	}
			?>	
            </table>
              <?php if($group_item_10->item_type=='MCQ'){?>
             <table style="margin-left:50px; width:100%">
  <?php 
if($group_item_10->item_option_layout=='1')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2" >
              <tr>
                <td style="font-size:20px">(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" ><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td style="font-size:20px">(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td style="padding-left:50px"><span class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='2')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='3')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='4')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='5')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='6')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='7')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url(). $group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='8')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='9')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_b_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_c_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
              </tr>
              <tr>
                <td colspan="2"><span><img src="<?= base_url().$group_item_10->item_option_d_image;?>" style="max-height:400px;"/></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='10')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='11')
{
?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
  </tr>
  <?php
}
elseif($group_item_10->item_option_layout=='12')
{
?>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(a) <span><?php echo html_entity_decode($group_item_10->item_option_a_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_a_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(b) <span><?php echo html_entity_decode($group_item_10->item_option_b_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_b_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(c) <span><?php echo html_entity_decode($group_item_10->item_option_c_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_c_ur);?></span></td>
              </tr>
            </table></td>
          <td><table border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td>(d) <span><?php echo html_entity_decode($group_item_10->item_option_d_en);?></span></td>
                <td><span class="urdufont-right" style="padding-left:20px"><?php echo html_entity_decode($group_item_10->item_option_d_ur);?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$group_item_10->item_option_a_image;?>" style="max-height:400px;"/></span></td>
        </tr>
      </table></td>
  </tr>
  <?php
}
?>
</table>
<?php } ?>
             <hr />
             <?php } ?>
             
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            
            <div class="row form-group">
                <label for="para_ordering" class="col-sm-12 control-label">Group Ordering *</label>
                <span style="padding-left:15px;"><?php echo $groupinfo->group_ordering; ?></span>
            </div>
            
            
     <div style="padding:10px 0px 10px 4px;">
    	<label for="group_comment_ss" class="col-sm-12 control-label">Subject Specialist Comments <?php if($groupinfo->group_status_ss ==1){ echo '(Rejected)'; } elseif($groupinfo->group_status_ss ==2){ echo '(Accepted with Change)'; }elseif($groupinfo->group_status_ss ==3){ echo '(Accepted without change)'; } ?> on <?php echo $groupinfo->group_approved;?></label></label>
        <?php if($groupinfo->group_comment_ss !=0){?><textarea id="group_comment_ss" name="group_comment_ss" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $groupinfo->group_comment_ss; ?></textarea><?php }?>
    </div>
     <?php 
	 if($groupinfo->group_status_ae ==0){
	 echo form_open(base_url('admin/itemsgroup/ae_submit_for_approval/'.$groupinfo->group_id), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
    	<div style="padding-top:15px; margin-left:5px">
            <label for="group_comment_ae" class="col-sm-6 control-label">Comments (AE)</label>
            <textarea id="group_comment_ae" name="group_comment_ae" rows="2" cols="55" style="width:100%" required="required"></textarea>
            <input type="submit" name="approve" id="approve" value="Approve" class="btn btn-success pull-right" style="margin:5px">
            <input type="submit" name="reject_ae" id="reject_ae" value="Reject Item" class="btn btn-danger pull-right" style="margin:5px">
		</div>
     <?php echo form_close( ); } else {?>
     	<?php if($groupinfo->group_status_ae !=0){?>
        <div style="padding:10px 0px 10px 4px;">
                <label for="group_comment_ss" class="col-sm-6 control-label">Assessment Expert Comments <?php if($groupinfo->group_status_ae ==1){ echo '(Approved)'; } elseif($groupinfo->group_status_ae ==2){ echo '(Rejected)'; } ?> on <?php echo $groupinfo->group_reviewed;?></label>
                <?php if($groupinfo->group_comment_ae !=0){?><textarea id="" name="" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $groupinfo->group_comment_ae; ?><?php }?></textarea>
            </div>
        <?php }?>
        <?php if($groupinfo->group_comment_psy !=""){?>
            <div style="padding:10px 0px 10px 4px;">
                <label for="group_comment_psy" class="col-sm-6 control-label">Psychometrician Comments <?php if($groupinfo->group_status_psy ==1){ echo '(Reviewed)'; } elseif($groupinfo->group_status_psy ==2){ echo '(Rejected)'; } ?> on <?php echo $groupinfo->group_date_psy;?></label>
                <textarea id="" name="" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $groupinfo->group_comment_psy; ?></textarea>
            </div>
         <?php }?>
     <?php }?>
     
     
      
        </div>
      </div>
    </section> 
  </div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>