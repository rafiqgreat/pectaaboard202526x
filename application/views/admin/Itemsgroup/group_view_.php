  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              View Group </h3>
          </div>
          
        </div>
        <div class="card-body"> 

	   <!-- For Messages -->
	   <?php 
			//echo '<PRE>';
			//print_r($itemspara[0]);
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
                   <label for="group_title_en" class="col-sm-12 control-label">Paragraph Instruction</label>
                   <input type="text" name="group_title_en" class="form-control" id="group_title_en"  value="<?php echo $groupinfo->group_title_en; ?>" readonly="readonly" >
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="group_title_ur" class="control-label urdufont-right" style="float:right">پیرا گراف ہدایات *</label>
                    <input type="text" name="group_title_ur" class="form-control" id="group_title_ur"  dir="rtl" value="<?php echo $groupinfo->group_title_ur; ?>" readonly="readonly" >
                </div>
             </div>
            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_1!="" && $group_item_1!=[]){?>
             <table width="100%">
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
				<?php if ($group_item_1->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (a):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_1->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_2->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (b):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_2->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_3->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (c):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_3->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_4->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (d):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_4->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_5->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (e):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_5->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_6->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (f):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_6->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_7->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (g):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_7->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_8->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (h):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_8->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_9->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (i):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_9->item_stem_en);?></span></td></tr>
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
				<?php if ($group_item_10->item_stem_en!=""){?>
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question (j):<span style="padding-left:50px"><?php echo html_entity_decode($group_item_10->item_stem_en);?></span></td></tr>
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
             <hr />
             <?php } ?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            
            <div class="row form-group">
                <label for="para_ordering" class="col-sm-12 control-label">Group Ordering *</label>
                <span style="padding-left:15px;"><?php echo $groupinfo->group_ordering; ?></span>
            </div>
            <?php if($groupinfo->group_status==1){?>
            <div style="padding:15px 0px; float:right"><a href="<?= base_url('admin/Itemsgroup/submitpara_for_approval/'.$groupinfo->group_id); ?>" class="btn btn-success"> Submit For Approval</a></div>
            <?php }?>
        </div>
      </div>
    </section> 
  </div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>