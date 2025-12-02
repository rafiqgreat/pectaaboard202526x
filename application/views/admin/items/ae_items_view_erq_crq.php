  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; View ERQ/CRQ Item </h3>
          </div>
          <div class="d-inline-block float-right">
          <?php $item = $items[0];
			$ssinfo = (isset($ssinfo[0]))?$ssinfo[0]:"";	   
			$aeinfo = (isset($aeinfo[0]))?$aeinfo[0]:"";
			$psyinfo = (isset($psyinfo[0]))?$psyinfo[0]:"";
		   if($item->item_status=='1'){ ?>
            <a href="<?= base_url('admin/items/ditems'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          <?php }elseif($item->item_status=='2'){?>
          	<a href="<?= base_url('admin/items/sitems'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          <?php }elseif($item->item_status=='3'){?>
          	<a href="<?= base_url('admin/items/ritems'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          <?php }else{?>
          	<a href="<?= base_url('admin/items/aitems'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          <?php }?>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php'); 
			//echo '<PRE>';
			//$item = $items[0];
			//print_r($item);
			//die();?>
						
			<!---- start here is item view filmzy --->
			
<div class="container" style="padding-top:25px">
  <div class="row">
  	<div class="col-8">
    	<div class="row">
        	<div class="col-4">
              <div> <img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" width="110" height="130" /></div>
            </div>
            <div class="col-8">
              <div class="col-12" style="font-size:36px; font-weight:bold; text-align:center;">Punjab Education Curriculum Training and Assessment Authority [PECTAA]</div>
              <div class="col-12" style="font-size:30px; text-align:center; margin-top:1%">Wahdat Colony Road, Lahore</div>
            </div>
        </div>
        <div class="row">
        	<div style="padding-left:40px; padding-top:10px">
            <div class="col-lg-12 col-sm-12" style="font-weight:bold"> Date Received :____________________<u><?php echo $item->item_date_received;?></u>____________________ </div>
            <div class="col-lg-12 col-sm-12" style="font-weight:bold"> Item Writer Name : ___________<u><?php echo $iwinfo[0]['firstname'].' '.$iwinfo[0]['lastname'].' ('.$iwinfo[0]['username'].')';?></u>__________</div>
            <div class="col-lg-12 col-sm-12" style="font-weight:bold"> Registration No. : ____________________<u>PEC-<?php echo $item->item_submittedby;?></u>____________________</div>
        	</div>
        </div>
    </div>

    <div class="col-4" >
      <div class="col-12" style="alignment-adjust:central;">
        <table border="1px" bordercolor="#000000" width="100%" style="float:right; font-weight:bold; font-size:18px;" cellpadding="7px" >
          <tr>
            <td colspan="3" style="text-align:center">For official Use Only</td>
          </tr>
          <tr>
            <td colspan="3">Item Code:&emsp; <?php echo $item->item_code;?></td>
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
        <td rowspan="2" colspan="7">SLO text: <?php echo $item->slo_statement_en;?><span class="urdufont-right" style="font-size:20px;" ><?php echo $item->slo_statement_ur;?></span></td>
    </tr>
    <tr>
    	<td colspan="3">Content Strand:</td>
        <td><?php echo $item->cs_statement_en.' '.$item->cs_statement_ur;?></td>
    </tr>
    <tr>
    	<td colspan="6"><?php echo $item->item_cognitive_bloom;?><br />(Please tick one)</td>
        <td colspan="2">Relation to Textbook<br />(Please tick one)</td>
        <td rowspan="2">Key</td>
        <td colspan="2">Type of<br />Question</td>
    </tr>
	<tr>
    	<td>K</td>
        <td>C</td>
    	<td>App</td>
        <td>An</td>
    	<td>Sy</td>
        <td>Ey</td>
    	<td>Direct Quote</td>
        <td>Amended</td>
    	<td>MCQs</td>
        <td>ERQ</td>
    </tr>
    <tr>
    	<td><?php if ($item->item_cognitive_bloom == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_cognitive_bloom == 'Application') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_cognitive_bloom == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_relation=='Direct Quote') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_relation=='Amended'){echo 'Yes';} else{echo '---';}?></td>
    	<td><?php echo $item->item_option_correct;?></td>
        <td><?php if ($item->item_type=='MCQ'){echo 'Yes';} else{echo '---';}?></td>
        <td><?php if ($item->item_type=='ERQ'){echo 'Yes';} else{echo '---';}?></td>
    </tr>
  </table>
  </div>
  <!--<div class="row" style="padding-top:25px"> 
	<div class="col-lg-12 col-sm-12" style="margin-left:25px">Stem</div>
    <div class="col-lg-12 col-sm-12" style="margin-left:50px">Image</div>
  </div>-->
	
  	<!-- <img src="< ?= base_url().$item->item_option_a_image;?>" style="max-height:400px;"/>		 -->
  <div class="row col-lg-12" style="padding-top:02px;" >
	  
	   <?php
		   if(isset($item->item_id)&&$item->item_id!=0)
		   {
			 ?>
               <table width="100%" style="margin-top:10px;" >   
<?php if ($item->item_image_position=='Top') 
{
 	if($item->item_image_en!="" && $item->item_image_ur!="") 
	{
		?>
         <tr>
         	<td style="width:50%"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/></td>
          	<td style="float:right; width:50%"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/></td>
          </tr>
        <?php 
	}
	elseif($item->item_image_en!=""&&$item->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center;"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($item->item_image_en==""&&$item->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}
?>
                    <?php if ($item->item_stem_en!=""){?>
                    <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question :
					<?php if($item->item_image_position=='Left' && $item->item_image_en!="")
					{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/> <?php }?>
                    <span style="padding-left:50px"><?php echo html_entity_decode($item->item_stem_en);?></span>
					<?php if($item->item_image_position=='Right' && $item->item_image_en!="")
					{?> <img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;"/> <?php }?></td></tr>
                    <?php }?>
                    
                    <?php if ($item->item_stem_ur!=""){?>
                    <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; 
                    <?php if($item->item_image_position=='Left' && $item->item_image_ur!="")
					{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
                    <span style="padding-left:50px:"><?php echo html_entity_decode($item->item_stem_ur);?> </span>
                    <?php if($item->item_image_position=='Right' && $item->item_image_ur!="")
					{?> <img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
                    </td></tr>
                    <?php }?>
					<?php /*?><?php if ($item->item_stem_en!=""){?>
                    <tr><td colspan="2" style="font-weight:bold; font-size:20px">Question :<span style="padding-left:50px"><?php echo html_entity_decode($item->item_stem_en);?></span></td></tr>
                    <?php }?>
                    <?php if ($item->item_stem_ur!=""){?>
                    <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right"> سوال :&nbsp; <span style="padding-left:50px:"><?php echo html_entity_decode($item->item_stem_ur);?> </span></td></tr>
                    <?php }?><?php */?>
                    
<?php if ($item->item_image_position=='Bottom') 
{
 	if($item->item_image_en!="" && $item->item_image_ur!="") 
	{
		?>
         <tr >
         	<td style="width:50%"><img src="<?= base_url().$item->item_image_en;?>" style="max-width:100%;"/></td>
          	<td style="float:right;"><img src="<?= base_url().$item->item_image_ur;?>" style="max-width:100%;"/></td>
          </tr>
        <?php 
	}
	elseif($item->item_image_en!=""&&$item->item_image_ur=="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$item->item_image_en;?>" style="max-height:400px;" /></td>          	
          </tr>
        <?php 	
	}
	elseif($item->item_image_en==""&&$item->item_image_ur!="")
	{
	?>
         <tr>
         	<td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$item->item_image_ur;?>" style="max-height:400px;"/></td>          	
          </tr>
        <?php 	
	}
}		
?>               
              </table> 
              <?php 
			  if($item->item_rubric_image!='')
			  {
				  if($item->item_rubric_urdu!=''&&$item->item_rubric_english!='')
				  {?>
					  <table style="width: 100%">
                      	<?php if($item->item_rubric_image_position=='Top'){?>
                        <tr><td colspan="3" style="text-align:center"><img src="<?= base_url().$item->item_rubric_image;?>" style="max-width:100%;"/></td></tr>
                        <?php }?>
                        <tr><td style="width:50%"><?php echo html_entity_decode($item->item_rubric_english);?></td><td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_rubric_urdu);?></td></td></tr>
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
                        <td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td>
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
                  <table width="100%"><tr><td style="text-align:right"><div class="urdufont-right"><?php echo html_entity_decode($item->item_rubric_urdu);?></div></td></tr></table>
              <?php }
				  //$item->item_rubric_urdu!=''&&$item->item_rubric_english!=''
				  else
				  {
					  ?>
					  <table style="width:100%">
                      	<tr><td style="width:50%; font-size:18px"><?php echo  html_entity_decode($item->item_rubric_english);?></td><td class="urdufont-right" style="text-align:right"><?php echo html_entity_decode($item->item_rubric_urdu);?></td></tr>
                      </table>
				  <?php 
				  }
			  }
		   }
		   ?>
  </div>
    <div class="row col-lg-12">
    	<div class="col-lg-12" style="padding-left:25px; padding-top:25px"> Review No.--------</div>
        <div class="col-lg-12">
        	<table width="100%" border="1" style="text-align:center">
              <tr style="font-weight:bold">
                <td style="width:15%">Reviewer Name</td>
                <td style="width:15%">Accept (Y/N)</td>
                <td style="width:40%">Ammendment Suggested<br />(If any)</td>
                <td style="width:15%">Signatures</td>
                <td style="width:15%">Date</td>
              </tr>
              <tr>
                <td><?php echo $item->item_reviewedby;?></td>
                <td>---------------</td>
                <td>---------------</td>
                <td>---------------</td>
                <td><?php echo $item->item_reviewed;?></td>
              </tr>
            </table>
        </div>
    </div>
    <div style="padding:10px 0px 10px 4px;">
    	<label for="item_comment_ss" class="col-sm-12 control-label">Subject Specialist <?php if(!empty($ssinfo)){echo '('.$ssinfo['firstname'].' '.$ssinfo['lastname'].')';}?> Comments <?php if($item->item_status_ss ==1){ echo '(Rejected)'; } elseif($item->item_status_ss ==2){ echo '(Accepted with Change)'; }elseif($item->item_status_ss ==3){ echo '(Accepted without change)'; } ?> on <?php echo date("d-M-Y (h:i a)",strtotime($item->item_approved));?></label></label>
        <textarea id="item_comment_ss" name="item_comment_ss" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $item->item_comment_ss; ?></textarea>
    </div>
     <?php 
	 if($item->item_status_ae ==0){
	 echo form_open(base_url('admin/items/ae_submit_for_approval/'.$item->item_id), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
    	<div style="padding-top:15px; margin-left:5px">
            <label for="item_comment_ae" class="col-sm-12 control-label">Comments (AE)</label>
            <textarea id="item_comment_ae" name="item_comment_ae" rows="2" cols="55" style="width:100%" required="required"></textarea>
            <input type="submit" name="reject_ae" id="reject_ae" value="Reject Item" class="btn btn-danger pull-right" style="margin:5px">
            <input type="submit" name="submit_ae" id="submit_ae" value="Approve" class="btn btn-success pull-right" style="margin:5px">
            <a href=<?php echo base_url('admin/items/edit_erq_crq/'.$item->item_id); ?>><input type="button" name="edit" id="edit" value="Edit Item" class="btn btn-info pull-right" style="margin:5px"></a>
		</div>
     <?php echo form_close( ); } else {?>
     	<?php if($item->item_comment_ae !="" || $item->item_status_ae !=0){?>
        <div style="padding:10px 0px 10px 4px;">
                <label for="item_comment_ss" class="col-sm-12 control-label">Assessment Expert <?php if(!empty($aeinfo)){echo '('.$aeinfo['firstname'].' '.$aeinfo['lastname'].')';}?> Comments <?php if($item->item_status_ae ==1){ echo '(Approved)'; } elseif($item->item_status_ae ==2){ echo '(Rejected)'; } ?> on <?php echo date("d-M-Y (h:i a)",strtotime($item->item_reviewed));?></label>
                <textarea id="" name="" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $item->item_comment_ae; ?></textarea>
            </div>
        <?php }?>
        <?php if($item->item_comment_psy !=""){?>
            <div style="padding:10px 0px 10px 4px;">
                <label for="item_comment_psy" class="col-sm-12 control-label">Psychometrician <?php if(!empty($psyinfo)){echo '('.$psyinfo['firstname'].' '.$psyinfo['lastname'].')';}?> Comments <?php if($item->item_status_psy ==1){ echo '(Reviewed)'; } elseif($item->item_status_psy ==2){ echo '(Rejected)'; } ?> on <?php echo date("d-M-Y (h:i a)",strtotime($item->item_date_psy));?></label>
                <textarea id="" name="" rows="2" cols="55" style="width:100%" required="required" readonly="readonly"><?php echo $item->item_comment_psy; ?></textarea>
            </div>
         <?php }?>
     <?php }?>
</div>
			<!---- end  here is item view filmzy --->			
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 
 <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
