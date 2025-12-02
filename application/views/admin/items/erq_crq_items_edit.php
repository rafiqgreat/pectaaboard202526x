  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit ERQ/CRQ Item </h3>
          </div>
          <?php //print_r($_SESSION);
		  //echo '<pre>';
		  //print_r($item);			
				
			if($item['item_status_ae'] == 1)
			{
			die('Sorry! you cannot Edit item! Its already Accepted in Cycle-I <br /> <a href="'.base_url('admin').'">Go to Dashboard </a>');
			}
		  ?>
		  
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/items'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Items List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/items/edit_erq_crq/'.$item['item_id']), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			<div class="row">
              	<div class="col-lg-3 col-sm-12">                         
                    <label for="item_date_received" class="col-sm-6 control-label">Date Received *</label>
                    <div class="col-12">
                      <input type="date" name="item_date_received" class="form-control" id="item_date_received" placeholder="" required="required" readonly="readonly" value="<?php $item['item_date_received']; ?>" >
                    </div>
                </div>
				<div class="col-lg-3 col-sm-12">                         
                    <label for="item_code" class="col-sm-6 control-label">Item Code *</label>
                    <div class="col-12">
                      <input type="text" name="item_code" class="form-control" id="item_code" placeholder="" required="required"  readonly="readonly" value="<?= $item['item_code']; ?>">
                    </div>
                </div>
				<div class="col-lg-2 col-sm-12">                         
                    <label for="item_difficulty" class="col-sm-12 control-label">Difficulty *</label>
                    <div class="col-12">
                      <input type="number" name="item_difficulty" class="form-control" id="item_difficulty" placeholder="" required="required" value="<?= $item['item_difficulty']; ?>" step="0.01" min="0.01" max="0.99">
                    </div>
                </div>				
				<div class="col-lg-2 col-sm-12">                         
                    <label for="item_discr" class="col-sm-6 control-label">Discr</label>
                    <div class="col-12">
                    <input type="number" name="item_discr" class="form-control" id="item_discr" placeholder="" required="required" value="<?= $item['item_discr']; ?>" min="-1" max="+1" step="0.01">
                      
                    </div>
				</div>
				<div class="col-lg-2 col-sm-12">                         
                    <label for="item_dif_code" class="col-sm-6 control-label">DIFF *</label>
                    <div class="col-12">
                      <select name="item_dif_code" class="form-control form-group" id="item_dif_code"  required>
                  		<option value="All" <?= ($item['item_dif_code'] == "All")?'selected': '' ?>>All</option>                  
						<option value="Male" <?= ($item['item_dif_code'] == "Male")?'selected': '' ?>>Male</option>
						<option value="Female" <?= ($item['item_dif_code'] == "Female")?'selected': '' ?>>Female</option>
                        <option value="Urban" <?= ($item['item_dif_code'] == "Urban")?'selected': '' ?>>Urban</option>
                        <option value="Rural" <?= ($item['item_dif_code'] == "Rural")?'selected': '' ?>>Rural</option>
                		</select>
                    </div>
                </div>                
             </div>
			<div class="row">
              	<div class="col-lg-2 col-sm-12">  
					<label for="item_grade_id" class="control-label">Grade *</label>
					<select name="item_grade_id" class="form-control form-group" id="item_grade_id"  required>
						<option value="">--Select Grades--</option>
						  <?php
                           foreach($grades as $grade)
                          {
                              $selectedText = '';
					          if($grade['grade_id']==$item['item_grade_id'])
					          $selectedText = ' selected="selected" ';
                   			  echo '<option value="'.$grade['grade_id'].'" '.$selectedText.'>'.$grade['grade_name_en'].'</option>';
                          }
                          ?>
                  	</select>                    
                </div>
				<div class="col-lg-2 col-sm-12">                         
                    <label for="item_subject_id" class="control-label">Subject *</label>
                    <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  required>
                      <option value="">--Select Subjects--</option>
                      <?php
                       foreach($subjects as $subject)
                          {
                            $selectedText = '';
                                      if($subject['subject_id']==$item['item_subject_id'])
                                      $selectedText = ' selected="selected" ';
                            echo '<option value="'.$subject['subject_id'].'" '.$selectedText.'>'.$subject['subject_name_en'].'</option>';
                          }
                      ?> 
                    </select>
                </div>
				<div class="col-lg-3 col-sm-12">                         
                    <label for="item_cstand_id" class="control-label">Content Strand *</label>
                <select name="item_cstand_id" class="form-control form-group" id="item_cstand_id"  required>
                  <option value="">--Select Content Strand--</option>
                  <?php
                   foreach($cstands as $cstand)
					  {
						$selectedText = '';
								  if($cstand['cs_id']==$item['item_cstand_id'])
								  $selectedText = ' selected="selected" ';
						echo '<option value="'.$cstand['cs_id'].'" '.$selectedText.'>'.$cstand['cs_number'].'-'.$cstand['cs_statement_en'].$cstand['cs_statement_ur'].'</option>';
					  }
                  ?> 
                </select>
                </div>				
				<div class="col-lg-5 col-sm-12">                         
                    <label for="item_subcstand_id" class="control-label">Sub Content Strand *</label>
                    <select name="item_subcstand_id" class="form-control form-group" id="item_subcstand_id"  required>
                      <option value="">--Select Content Strand--</option>
                      <?php
                       foreach($subcstands as $subcstand)
                          {
                            $selectedText = '';
                                      if($subcstand['subcs_id']==$item['item_subcstand_id'])
                                      $selectedText = ' selected="selected" ';
                            echo '<option value="'.$subcstand['subcs_id'].'" '.$selectedText.'>'.$subcstand['subcs_number'].'-'.$subcstand['subcs_topic_en'].$subcstand['subcs_topic_ur'].'</option>';
                          }
                      ?> 
                    </select>
                </div>					
              </div>
              <div class="row">             
                <div class="col-lg-12 col-sm-12">                         
                    <label for="item_slo_id" class="control-label">Select SLO Statement *</label>
                    <select name="item_slo_id" class="form-control form-group" id="item_slo_id"  required>
                      <option value="">--Select SLO Statement--</option>
                      <?php
                      foreach($slos as $slo)
                          {
                            $selectedText = '';
							  if($slo['slo_id']==$item['item_slo_id'])
							  $selectedText = ' selected="selected" ';
                            	echo '<option value="'.$slo['slo_id'].'" '.$selectedText.'>'.$slo['slo_number'].'-'.$slo['slo_statement_en'].$slo['slo_statement_ur'].'</option>';
                          }
						?>
                    </select>
                </div>
			</div>	
			<div class="row">
              	<div class="col-lg-2 col-sm-12">  
					<label for="item_curriculum" class="control-label">Curriculum *</label>
					<select name="item_curriculum" class="form-control form-group" id="item_curriculum"  required>
						<option value="1" <?=($item['item_curriculum']=='1')?'selected':''?>>2006(ALP)</option>
						<option value="2" <?=($item['item_curriculum']=='2')?'selected':''?>>National Curriculum (2006)</option>
						<option value="3" <?=($item['item_curriculum']=='3')?'selected':''?>>Single National Curriculum(SNC) 2020</option>
                	</select>
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_pctb_chapter" class="control-label">PCTB Chapter</label>
					<input type="text" name="item_pctb_chapter" class="form-control" id="item_pctb_chapter" placeholder=""  value="<?= $item['item_pctb_chapter']; ?>" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_pctb_page" class="control-label">PCTB Page No.</label>
					<input type="text" name="item_pctb_page" class="form-control" id="item_pctb_page" placeholder=""  value="<?= $item['item_pctb_page']; ?>" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_other_title" class="control-label">Other Title</label>
					<input type="text" name="item_other_title" class="form-control" id="item_other_title" placeholder=""  value="<?= $item['item_other_title']; ?>" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_other_year" class="control-label">Other Year</label>
					<input type="text" name="item_other_year" class="form-control" id="item_other_year" placeholder=""  value="<?= $item['item_other_year']; ?>" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_other_page" class="control-label">Other Page No.</label>
					<input type="text" name="item_other_page" class="form-control" id="item_other_page" placeholder=""  value="<?= $item['item_other_page']; ?>" required="required">                   
                </div>				
              </div>
			<div class="row">
              	<div class="col-lg-3 col-sm-12">  
					<label for="item_cognitive_bloom" class="control-label">Bloom/Cognitive *</label>
					<select name="item_cognitive_bloom" class="form-control form-group" id="item_cognitive_bloom"  required>
						<option value="Knowledge" <?= ($item['item_cognitive_bloom'] == "Knowledge")?'selected': '' ?>>Knowledge</option>
						<option value="Comprehension" <?= ($item['item_cognitive_bloom'] == "Comprehension")?'selected': '' ?>>Comprehension</option>
						<option value="Application" <?= ($item['item_cognitive_bloom'] == "Application")?'selected': '' ?>>Application</option>
						<option value="Analysis" <?= ($item['item_cognitive_bloom'] == "Analysis")?'selected': '' ?>>Analysis</option>
						<option value="Synthesis" <?= ($item['item_cognitive_bloom'] == "Synthesis")?'selected': '' ?>>Synthesis</option>
						<option value="Evaluation" <?= ($item['item_cognitive_bloom'] == "Evaluation")?'selected': '' ?>>Evaluation</option>                  
                  	</select>                    
                </div>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="item_relation" class="control-label">Relation *</label>
                <select name="item_relation" class="form-control form-group" id="item_relation"  required>
                	<option value="Direct Quote" <?= ($item['item_relation'] == "Direct Quote")?'selected': '' ?>>Direct Quote</option>
					<option value="Amended" <?= ($item['item_relation'] == "Amended")?'selected': '' ?>>Amended</option>
                </select>
                </div>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="item_stem_number" class="control-label">STEM Number *</label>
                <input type="text" name="item_stem_number" class="form-control" id="item_stem_number" placeholder="" value="<?= $item['item_stem_number']; ?>" required  >
                </div>
                <div class="col-lg-3 col-sm-12">                         

                   <label for="item_batch" class="control-label">Batch Number *</label>

                <select  name="item_batch" class="form-control" id="item_batch" readonly >
                <option value="1" <?= ($item['item_batch'] == "1")?'selected': '' ?>>Batch - 1</option>
                <option value="2" <?= ($item['item_batch'] == "2")?'selected': '' ?>>Batch - 2</option>
                </select>
              </div>
              </div>
            <div class="row">             
                <div class="col-lg-6 col-sm-12">                         
                    <label for="item_stem_en" class="control-label" style="padding-top:15px">Item / STEM (English) </label>
                	<textarea id="item_stem_en" name="item_stem_en"  class="form-control form-group" ><?php echo $item['item_stem_en']; ?></textarea>
                </div>
				   <div class="col-lg-6 col-sm-12">                         
                    <label for="item_stem_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> ایٹم / سٹم ( اردو)</label>
                	<textarea id="item_stem_ur" name="item_stem_ur"  class="form-control form-group" dir="rtl" lang="ur"><?php echo $item['item_stem_ur']; ?></textarea>
                </div>
              </div>
			<div class="row" style="padding-top:10px">             
				 <div class="col-lg-4 col-sm-12">                         
                    <label for="item_image_position" class="control-label">Stem Images Position</label>
                	<select name="item_image_position" class="form-control form-group" id="item_image_position">
                  		<option value="Top" <?= ($item['item_image_position'] == "Top")?'selected': '' ?>>Top</option>
						<option value="Bottom" <?= ($item['item_image_position'] == "Bottom")?'selected': '' ?>>Bottom</option>
						<option value="Left" <?= ($item['item_image_position'] == "Left")?'selected': '' ?>>Left</option>
                        <option value="Right" <?= ($item['item_image_position'] == "Right")?'selected': '' ?>>Right</option>
                	</select>
                </div>
                <div class="col-lg-4 col-sm-12">                         
                    <label for="item_image_en" class="control-label">Item Image-1 / English</label>
                	<input type="file" name="item_image_en" class="form-control" id="item_image_en" placeholder=""  >
                </div>
                <div class="col-lg-4 col-sm-12">                         
                    <label for="item_image_ur" class="control-label">Item Image-2 / Urdu</label>
					<input type="file" name="item_image_ur" class="form-control" id="item_image_ur" placeholder="" >     
				</div>
              </div>
              <?php if ($item['item_image_en']!= "" || $item['item_image_ur']!= ""){?>
              <div class="row">             
				<div class="col-lg-4 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12"><?php if($item['item_image_en']!=""){?><img src="<?php echo base_url().$item['item_image_en'];?>" style="max-width:100px;"/><a class="delete btn btn-sm btn-danger" href='<?php echo base_url("admin/items/delete_rubimage_en/". $item['item_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>
                <div class="col-lg-4 col-sm-12"><?php if($item['item_image_ur']!=""){?><img src="<?php echo base_url().$item['item_image_ur'];?>" style="max-width:100px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px" href='<?php echo base_url("admin/items/delete_rubimage_ur/". $item['item_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a> <?php }?></div>    
              </div>
              <?php }?>
			<div class="row">             
                <div class="col-lg-12 col-sm-12">                         
                   <hr/ >
                </div>
            </div>
            <div class="row">             
                <div class="col-lg-6 col-sm-12" >                         
                    <label for="item_rubric_english" class="control-label" style="padding-top:15px">Rubric (English)</label>
                	<textarea  name="item_rubric_english" class="form-control" id="item_rubric_english"><?= $item['item_rubric_english']; ?></textarea> 
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="item_rubric_urdu" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> روبرک  اردو</label>
                	<textarea  name="item_rubric_urdu" class="form-control" id="item_rubric_urdu"  dir="rtl" lang="ur"><?= $item['item_rubric_urdu']; ?> </textarea>
                </div>				
              </div>
              <div class="form-group row" style="padding-top:10px">
              	<div class="col-lg-3 col-sm-12">                         
                    <label for="item_rubric_image_position" class="control-label">Rubric Images Potion</label>
                	<select name="item_rubric_image_position" class="form-control form-group" id="item_rubric_image_position">
                        <option value="Top" <?= ($item['item_rubric_image_position'] == "Top")?'selected': '' ?>>Top</option>
                        <option value="Bottom" <?= ($item['item_rubric_image_position'] == "Bottom")?'selected': '' ?>>Bottom</option>
                        <option value="Left" <?= ($item['item_rubric_image_position'] == "Left")?'selected': '' ?>>Left</option>
                        <option value="Right" <?= ($item['item_rubric_image_position'] == "Right")?'selected': '' ?>>Right</option>
               		</select>
                </div>
                <div class="col-lg-3 col-sm-12">                         
                    <label for="item_rubric_image" class="control-label">Rubric Image</label>
                	<input type="file" name="item_rubric_image" class="form-control" id="item_rubric_image" placeholder="" >
                </div>
              </div>
              <?php if ($item['item_rubric_image']!="") {?>
              <div class="form-group row">
              	 <div class="col-lg-3 col-sm-12"></div>
                 <div class="col-lg-3 col-sm-12"><?php if ($item['item_rubric_image']!=""){?><img src="<?php echo base_url().$item['item_rubric_image'];?>" style="max-height:100px; max-width:100px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px" href='<?php echo base_url("admin/items/delete_item_rubric_image/". $item['item_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>
              </div> 
              <?php }?>  
              <?php if($this->session->userdata('role_id')==2){?>
              <div class="form-group">
                <div class="col-md-12">
                    <label for="item_comment_ss" class="col-sm-6 control-label">Comments</label>
            		<textarea id="item_comment_ss" name="item_comment_ss" rows="4" cols="55" style="width:100%" required="required"></textarea>
                </div>
              </div>
              <?php }?> 
              <?php if($item['item_comment_ss']!=""){?>
             <div style="padding:10px 0px 10px 4px;">
    	<label for="item_comment_ss" class="col-sm-12 control-label">Subject Specialist Comments <?php if($item['item_status_ss'] ==1){ echo '(Rejected)'; } elseif($item['item_status_ss'] ==2){ echo '(Accepted with Change)'; }elseif($item['item_status_ss'] ==3){ echo '(Accepted without change)'; } ?> on <?php echo $item['item_approved'];?></label>
        <textarea id="item_comment_ss" name="item_comment_ss" rows="2" cols="55" style="width:100%" required="required" <?php if($this->session->userdata('role_id')!=2){?>readonly="readonly"<?php }?>><?php echo $item['item_comment_ss']; ?></textarea>
    </div><?php }?>
			<?php if($item['item_comment_ae']!=""){?>
            <div style="padding:10px 0px 10px 4px;">
                <label for="item_comment_ss" class="col-sm-6 control-label">Assessment Expert Comments <?php if($item['item_status_ae'] ==1){ echo '(Approved)'; } elseif($item['item_status_ae'] ==2){ echo '(Rejected)'; } ?> on <?php echo $item['item_reviewed'];?></label>
                <textarea id="item_comment_ss" name="item_comment_ss" rows="2" cols="55" style="width:100%" required="required" <?php if($this->session->userdata('role_id')!=4){?>readonly="readonly"<?php }?>><?php echo $item['item_comment_ae']; ?></textarea>
            </div><?php }?>
            <?php if($item['item_comment_psy']!=""){?>
            <div style="padding:10px 0px 10px 4px;">
                <label for="item_comment_ss" class="col-sm-6 control-label">Psychometrician Comments <?php if($item['item_status_psy'] ==1){ echo '(Reviewed)'; } elseif($item['item_status_psy'] ==2){ echo '(Rejected)'; } ?> on <?php echo $item['item_date_psy'];?></label>
                <textarea id="item_comment_ss" name="item_comment_ss" rows="2" cols="55" style="width:100%" required="required" <?php if($this->session->userdata('role_id')!=5){?>readonly="readonly"<?php }?>><?php echo $item['item_comment_psy']; ?></textarea>
            </div>
            <?php }?>         
              <div class="form-group">
                <div class="col-md-12">
                  <?php if($this->session->userdata('role_id')==3 || $this->session->userdata('role_id')==2){?><input type="submit" name="submit" value="Update" class="btn btn-info pull-right"><?php }?>
                  <?php if($this->session->userdata('role_id')==2){?><input type="submit" name="submit2" value="Submit with Change" class="btn btn-info pull-right" style="margin-right:15px"><?php }?>	
                  <?php if($this->session->userdata('role_id')==4){?><input type="submit" name="submit3" value="Update" class="btn btn-info pull-right" style="margin-right:15px"><?php }?>
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
    </div>    
<script language="javascript" type="text/javascript">
	document.getElementById('item_date_received').valueAsDate = new Date();	
$('#item_grade_id').on('change', function() {
	
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#item_subject_id option:not(:first)').remove();
	  $('#item_cstand_id option:not(:first)').remove();
	  $('#item_subcstand_id option:not(:first)').remove();
	  $('#item_slo_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });
});

$('#item_subject_id').on('change', function() {
      $.post('<?=base_url("admin/items/cstands_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_cstand_id option:not(:first)').remove();
	  $('#item_subcstand_id option:not(:first)').remove();
	  $('#item_slo_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_cstand_id')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en+value.cs_statement_ur)
                  ); 
        });   
    });
		/////////////////// auto generate code script //////////////////////
	$.post('<?=base_url("admin/items/get_itemcode_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr[0]['maxitems']);
	 var maxnum = "000" + arr[0]['maxitems'];
     maxnum = maxnum.substr(maxnum.length-4);
		
		
	 switch(arr[0]['grade'])
		{
			case "1":
				$('#item_code').val(arr[0]['subject_code']+'-I-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "2":
				$('#item_code').val(arr[0]['subject_code']+'-II-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "3":
				$('#item_code').val(arr[0]['subject_code']+'-III-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "4":
				$('#item_code').val(arr[0]['subject_code']+'-IV-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "5":
				$('#item_code').val(arr[0]['subject_code']+'-V-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "6":
				$('#item_code').val(arr[0]['subject_code']+'-VI-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "7":
				$('#item_code').val(arr[0]['subject_code']+'-VII-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "8":
				$('#item_code').val(arr[0]['subject_code']+'-VIII-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			
		}
     
    });
});


$('#item_cstand_id').on('change', function() {
      $.post('<?=base_url("admin/items/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_subcstand_id option:not(:first)').remove();
	  $('#item_slo_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_subcstand_id')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en)
                  ); 
        });   
    });
});

$('#item_subcstand_id').on('change', function() {
      $.post('<?=base_url("admin/items/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_slo_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_slo_id')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
}
);

	
    (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
	

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('item_stem_ur', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 320,
          contentsLangDirection: 'rtl',
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
			
	(function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
	

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('item_stem_en', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 320,
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
			///// 1st option ////
	(function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
	

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('item_rubric_english', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 120,
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
			///// 2nd option ////
	(function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
	

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('item_rubric_urdu', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		  height: 120,
          contentsLangDirection: 'rtl',
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
	
	window.MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']]
  },
  svg: {
    fontCache: 'global'
  }
};

(function () {
  var script = document.createElement('script');
  script.src = 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js';
  script.async = true;
  document.head.appendChild(script);
})();
</script>
  
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>