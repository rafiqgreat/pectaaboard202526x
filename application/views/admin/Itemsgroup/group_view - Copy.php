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
			$group_item_1 = $group_item_1[0];  
			$group_item_2 = $group_item_2[0]; 
			$group_item_3 = $group_item_3[0]; 
			$group_item_4 = $group_item_4[0]; 
			$group_item_5 = $group_item_5[0]; 
			$group_item_6 = $group_item_6[0]; 
			$group_item_7 = $group_item_7[0]; 
			$group_item_8 = $group_item_8[0]; 
			$group_item_9 = $group_item_9[0]; 
			$group_item_10 = $group_item_10[0]; 

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
                <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question :<span style="padding-left:50px"><?php echo html_entity_decode($group_item_1->item_stem_en);?></span></td></tr>
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
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            		 
			 <?php if ($groupinfo->group_item_1!=""){?>
             <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.1</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_1" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_1" class="form-control" id="item_code_1"  value="<?php echo $group_item_1->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_1" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_1" class="form-control" id="group_item_1"  dir="rtl" value="<?php echo $group_item_1->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_1" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_1" class="form-control" id="group_item_1"  dir="rtl" value="<?php echo $group_item_1->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_2!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.2</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_2" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_2" class="form-control" id="item_code_2"  value="<?php echo $group_item_2->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_2" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_2" class="form-control" id="group_item_2"  dir="rtl" value="<?php echo $group_item_2->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_2" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_2" class="form-control" id="group_item_2"  dir="rtl" value="<?php echo $group_item_2->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_3!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.3</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_3" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_3" class="form-control" id="item_code_3"  value="<?php echo $group_item_3->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_3" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_3" class="form-control" id="group_item_3"  dir="rtl" value="<?php echo $group_item_3->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_3" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_3" class="form-control" id="group_item_3"  dir="rtl" value="<?php echo $group_item_3->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_4!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.4</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_4" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_4" class="form-control" id="item_code_4"  value="<?php echo $group_item_4->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_4" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_4" class="form-control" id="group_item_4"  dir="rtl" value="<?php echo $group_item_4->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_4" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_4" class="form-control" id="group_item_4"  dir="rtl" value="<?php echo $group_item_4->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
			<?php }?>
            <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
             <?php if ($groupinfo->group_item_5!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.5</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_5" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code" class="form-control" id="item_code"  value="<?php echo $group_item_5->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_5" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_5" class="form-control" id="group_item_5"  dir="rtl" value="<?php echo $group_item_5->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_5" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_5" class="form-control" id="group_item_5"  dir="rtl" value="<?php echo $group_item_5->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <?php if ($groupinfo->group_item_6!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.6</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_6" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_6" class="form-control" id="item_code_6"  value="<?php echo $group_item_6->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_6" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_6" class="form-control" id="group_item_6"  dir="rtl" value="<?php echo $group_item_6->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_6" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_6" class="form-control" id="group_item_6"  dir="rtl" value="<?php echo $group_item_6->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <?php if ($groupinfo->group_item_7!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.7</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_7" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_7" class="form-control" id="item_code_7"  value="<?php echo $group_item_7->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_7" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_7" class="form-control" id="group_item_7"  dir="rtl" value="<?php echo $group_item_7->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_7" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_7" class="form-control" id="group_item_7"  dir="rtl" value="<?php echo $group_item_7->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
           <?php if ($groupinfo->group_item_8!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.8</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_8" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_8" class="form-control" id="item_code_8"  value="<?php echo $group_item_8->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_8" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_8" class="form-control" id="group_item_8"  dir="rtl" value="<?php echo $group_item_8->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_8" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_8" class="form-control" id="group_item_8"  dir="rtl" value="<?php echo $group_item_8->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <?php if ($groupinfo->group_item_9!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.9</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_9" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_9" class="form-control" id="item_code_9"  value="<?php echo $group_item_9->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_9" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_9" class="form-control" id="group_item_9"  dir="rtl" value="<?php echo $group_item_9->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_9" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_9" class="form-control" id="group_item_9"  dir="rtl" value="<?php echo $group_item_9->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <?php if ($groupinfo->group_item_10!=""){?>
            <div class="row">
             	<div class="row col-lg-12 col-sm-12" style="padding-left:20px; padding-top:25px; font-size:18px; font-weight:bold">Group Item No.10</div>
             	<div class="row col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-12">                         
                       <label for="item_code_10" class="col-sm-12 control-label" style="padding-top:15px">Item Code</label>
                       <input type="text" name="item_code_10" class="form-control" id="item_code_10"  value="<?php echo $group_item_10->item_code; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_10" class="col-sm-12 control-label" style="padding-top:15px">Item Stem (Eng)</label>
                        <input type="text" name="group_item_10" class="form-control" id="group_item_10"  dir="rtl" value="<?php echo $group_item_10->item_stem_en; ?>" readonly="readonly" >
                    </div>
                    <div class="col-lg-4 col-sm-12">                         
                        <label for="group_item_10" class="control-label urdufont-right" style="float:right">ایٹم سٹم (اردو) *</label>
                        <input type="text" name="group_item_10" class="form-control" id="group_item_10"  dir="rtl" value="<?php echo $group_item_10->item_stem_ur; ?>" readonly="readonly" >
                    </div>
                </div>
             </div>
             <?php }?>
			<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            
          <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
          <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
          
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