<!-- Content Wrapper. Contains page content -->
<style>
.borders{
	border-width:1px;
	border-style:solid;
	border-color:#666;
	border-radius: 10px;
}
</style>
<div  class="content-wrapper"> 
  <!-- Main content -->
  <section class="content">
    <div class="card card-default color-palette-bo">
      <div class="card-header">
      	<div class="row">
            <div class="col-4"><h4><i class="fa fa-plus"></i> Edit Item </h4></div>
            <div class="col-4">
            </div>
            <div class="col-4"><a href="<?= base_url('admin/items/ss_pitems'); ?>" class="btn btn-success" style="float:right"><i class="fa fa-list"></i> Items List</a></div>
        </div>
      </div>
      <?php $this->load->view('admin/includes/_messages.php') ?>
        <?php echo form_open(base_url('admin/items/rev_edit_combine/'.$item['item_id']), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>
      <div class="card-body"> 
        <!-- For Messages -->
        
        <input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
        <div class="row">
            <div class="col-2"><label for="item_type" class="col-12 control-label">Select Item Type *</label></div>
            <div class="col-10">
                <select name="item_type" class="form-control form-group" id="item_type"  required="required" readonly style="pointer-events: none;">
                    <option value="">---Select Item type---</option>
                    <option value="MCQ" <?php if($item['item_type']=="MCQ"){?> selected="selected" <?php }?>>MCQ</option>
                    <option value="ERQ" <?php if($item['item_type']=="ERQ"){?> selected="selected" <?php }?>>ERQ</option>
                    <option value="FIB" <?php if($item['item_type']=="FIB"){?> selected="selected" <?php }?>>Fill in Blanks</option>
                    <option value="TF" <?php if($item['item_type']=="TF"){?> selected="selected" <?php }?>>True/Flase</option>
                    <option value="MC" <?php if($item['item_type']=="MC"){?> selected="selected" <?php }?>>Match Column</option>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-12">
            <label for="item_date_received" class="col-sm-6 control-label">Date *</label>
            <div class="col-12">
              <input type="text" name="item_date_received" class="form-control" id="item_date_received" placeholder="" required="required" value="<?php echo $item['item_date_received']; ?>" readonly >
            </div>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_code" class="col-sm-6 control-label">Item Code *</label>
            <div class="col-12">
              <input type="text" name="item_code" class="form-control" id="item_code" placeholder="" required="required"  value="<?php echo $item['item_code']; ?>" readonly >
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_difficulty" class="col-sm-12 control-label">Difficulty *</label>
            <div class="col-12">
              <input type="number" name="item_difficulty" class="form-control" id="item_difficulty" placeholder="" required="required" value="<?php echo $item['item_difficulty']; ?>" step="0.01" min="0.01" max="0.99">
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_discr" class="col-sm-6 control-label">Discr</label>
            <div class="col-12">
              <input type="number" name="item_discr" class="form-control" id="item_discr" placeholder="" required="required" value="<?php echo $item['item_discr']; ?>" min="-1" max="+1" step="0.01">
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_dif_code" class="col-sm-12 control-label">DIFF *</label>
            <div class="col-12">
              <select name="item_dif_code" class="form-control form-group" id="item_dif_code"  required="required">
                <option value="All" <?php if($item['item_dif_code']=="All"){?> selected="selected" <?php }?>>All</option>
                <option value="Male" <?php if($item['item_dif_code']=="Male"){?> selected="selected" <?php }?>>Male</option>
                <option value="Female" <?php if($item['item_dif_code']=="Female"){?> selected="selected" <?php }?>>Female</option>
                <option value="Urban" <?php if($item['item_dif_code']=="Urban"){?> selected="selected" <?php }?>>Urban</option>
                <option value="Rural" <?php if($item['item_dif_code']=="Rural"){?> selected="selected" <?php }?>>Rural</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-sm-12">
            <label for="item_grade_id" class="control-label">Grade *</label>
            <select name="item_grade_id" class="form-control form-group" id="item_grade_id"  required="required" readonly style="pointer-events: none;">
              <option value="">--Select Grades--</option>
				  <?php
                  foreach($grades as $grade)
                  {
                      $selectedText = '';
					  if($grade['grade_id']==$item['item_grade_id'])
					  $selectedText = 'selected="selected"';
					  echo '<option value="'.$grade['grade_id'].'"'.$selectedText.'>'.$grade['grade_name_en'].'</option>';
                  }
                  ?>
            </select>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_subject_id" class="control-label">Subject *</label>
            <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  required readonly style="pointer-events: none;">
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
						$selectedText = 'selected="selected"';
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
          <div class="col-lg-10 col-sm-10">
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
          <div class="col-lg-2 col-sm-12">
                <label for="item_total_marks" class="control-label">Item Marks *</label>
                <input type="text" name="item_total_marks" class="form-control" id="item_total_marks" placeholder=""  value="<?= $item['item_total_marks']; ?>" required>
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
            <select name="item_cognitive_bloom" class="form-control form-group" id="item_cognitive_bloom"  required="required">
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
            <input type="text" name="item_stem_number" class="form-control" id="item_stem_number" placeholder="" value="<?= $item['item_stem_number']; ?>" required>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_batch" class="control-label">Batch Number *</label>
            <select  name="item_batch" class="form-control" id="item_batch" readonly>
              	<option value="1" <?= ($item['item_batch'] == "1")?'selected': '' ?>>Batch - 1</option>
                <option value="2" <?= ($item['item_batch'] == "2")?'selected': '' ?>>Batch - 2</option>
            </select>
          </div>
        </div>
        	<div class="row">
              <div class="col-lg-6 col-sm-12">
                <label for="item_stem_en" class="control-label" style="padding-top:9px">Item / STEM (English) ( <a href="" data-toggle="modal" data-target="#headingModal">Media Images Gallery</a> )</label>
                <textarea id="item_stem_en" name="item_stem_en"  class="form-control form-group" ><?php echo $item['item_stem_en']; ?></textarea>
              </div>
              <div class="col-lg-6 col-sm-12">
                <label for="item_stem_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آئٹم / سٹم &nbsp; ( اردو) &nbsp;( <a href="" data-toggle="modal" data-target="#headingModal">تصاویر گیلری </a> )</label>
                <textarea id="item_stem_ur" name="item_stem_ur"  class="form-control form-group" dir="rtl" lang="ur" ><?php echo $item['item_stem_ur']; ?></textarea>
              </div>
            </div>
        	<div class="row" style="padding-top:10px">
              <div class="col-lg-2 col-sm-12">
                <label for="item_image_position" class="control-label">Stem Images Position</label>
                <select name="item_image_position" class="form-control form-group" id="item_image_position" >
                    <option value="Top" <?= ($item['item_image_position'] == "Top")?'selected': '' ?>>Top</option>
                    <option value="Bottom" <?= ($item['item_image_position'] == "Bottom")?'selected': '' ?>>Bottom</option>
                    <option value="Left" <?= ($item['item_image_position'] == "Left")?'selected': '' ?>>Left</option>
                    <option value="Right" <?= ($item['item_image_position'] == "Right")?'selected': '' ?>>Right</option>
                    <option value="Full_Page" <?= ($item['item_image_position'] == "Full_Page")?'selected': '' ?>>Full Page</option>
                </select>
              </div>
              <div class="col-lg-5 col-sm-12">
                <label for="item_image_en" class="control-label">Item Image (Eng)</label>
                <input type="file" name="item_image_en" class="form-control" id="item_image_en" placeholder="" >
              </div>
              <div class="col-lg-5 col-sm-12">
                <label for="item_image_ur" class="control-label">Item Image (Urdu)</label>
                <input type="file" name="item_image_ur" class="form-control" id="item_image_ur" placeholder="">
              </div>
            </div>
       		<?php if ($item['item_image_en']!= "" || $item['item_image_ur']!= ""){?>
              <div class="row">             
				<div class="col-lg-2 col-sm-12"></div>
                <div class="col-lg-5 col-sm-12"><?php if($item['item_image_en']!=""){?><img src="<?php echo base_url().$item['item_image_en'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href='<?php echo base_url("admin/items/delete_image_rev_combine/item_image_en-". $item['item_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>
                <div class="col-lg-5 col-sm-12"><?php if($item['item_image_ur']!=""){?><img src="<?php echo base_url().$item['item_image_ur'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href='<?php echo base_url("admin/items/delete_image_rev_combine/item_image_ur-". $item['item_id']); ?>' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a> <?php }?></div>    
              </div>
              <?php }?>
			<div class="row">             
                <div class="col-lg-12 col-sm-12">                         
                   <hr/ >
                </div>
            </div>
            
            <div id="MCQ_block"></div>
            <div id="ERQ_block"></div>
            <div id="FIB_block"></div>
            <div id="TF_block"></div>
            <div id="MC_block"></div>
       </div>
       
      <div class="form-group" style="padding:10px; padding-bottom:30px">
          <div class="col-md-12">
            <input type="submit" name="submit" id="submit" value="Update" class="btn btn-info pull-right">
          </div>
        </div>
        <?php echo form_close( ); ?> 
    </div>
    <div class="modal fade" id="headingModal" tabindex="-1" role="dialog" aria-labelledby="headingModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:150%">		
      <div class="modal-header">
        <h5 class="modal-title" id="headingModalLabel">All Media Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <div class="row">
       <?php $media = $this->Items_model->get_all_medis($this->session->userdata('admin_id'));
	   foreach ($media  as $row){?>
		<div class="col-3">           
        	<input onclick="this.value = '<?= base_url().'/'.$row->m_image; ?>'; this.select(); document.execCommand('copy'); this.value = 'Image URL Copied'; " type='button' style="font-size:14px; width:100%" value='Click here to copy URL' />
            <img src="<?= base_url().'/'.$row->m_image; ?>" style="max-width:100%" value="<?= base_url().'/'.$row->m_image; ?>"   >
           </div>		
       <?php  } ?>
       </div>
      </div>      
	</div>
  </div>	
</div>
  </section>
</div>
<script language="javascript" type="text/javascript">
var TF_content = 
            '<div class="row">'+
              '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_tf_eng_1" class="control-label" style="padding-top:10px">Answer (Option-1)</label>'+
                '<input type="text"  name="item_tf_eng_1" class="form-control" id="item_tf_eng_1" value="<?= str_replace(array("\r", "\n"), '', $item['item_tf_eng_1']); ?>" >'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_tf_ur_1" class="col-sm-12 control-label urdufont-right" style="text-align:right;">جواب</label>'+
                '<input type="text"  name="item_tf_ur_1" class="form-control" id="item_tf_ur_1"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_tf_ur_1']); ?>" >'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_tf_eng_2" class="control-label" style="padding-top:10px">Answer (Option-2)</label>'+
                '<input type="text"  name="item_tf_eng_2" class="form-control" id="item_tf_eng_2" value=<?= str_replace(array("\r", "\n"), '', $item['item_tf_eng_2']); ?>">'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_tf_ur_2" class="col-sm-12 control-label urdufont-right" style="text-align:right;">جواب</label>'+
                '<input type="text"  name="item_tf_ur_2" class="form-control" id="item_tf_ur_2"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_tf_ur_2']); ?>" >'+
              '</div>'+
            '</div>'+
            '<div class="form-group">'+
              '<label for="item_option_correct" class="col-sm-12 control-label">Correct Answer from Above Options</label>'+
              '<div class="col-12">'+
                '<input type="radio" name="item_option_correct" value="a" <?= ($item['item_option_correct'] == "a")?'checked="checked"': '' ?> />'+
                '<label for="a" class="control-label" style="padding: 0px 30px 0px 5px;">Option a</label>'+
                '<input type="radio" name="item_option_correct" value="b" <?= ($item['item_option_correct'] == "b")?'checked="checked"': '' ?> />'+
                '<label for="b" class="control-label" style="padding: 0px 30px 0px 5px;">Option b</label>'+
              '</div>'+
            '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
var MCQ_content = 
		'<div class="row">'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_layout" class="control-label">Select Item/Question Options Layout to Display *</label>'+
            '<select name="item_option_layout" class="form-control form-group" id="item_option_layout"  required>'+
              '<option value="1" <?= ($item['item_option_layout'] == "1")?'selected': '' ?> >1-Verticl-Text-Only</option>'+
              '<option value="2" <?= ($item['item_option_layout'] == "2")?'selected': '' ?> >2-Vertical-Horizontal-Text-Only</option>'+
              '<option value="3" <?= ($item['item_option_layout'] == "3")?'selected': '' ?> >3-Horizontal-Text-Only</option>'+
              '<option value="4" <?= ($item['item_option_layout'] == "4")?'selected': '' ?> >4-Vertical-Images-Only</option>'+
              '<option value="5" <?= ($item['item_option_layout'] == "5")?'selected': '' ?> >5-Vertical-Horizontal-Images-Only</option>'+
              '<option value="6" <?= ($item['item_option_layout'] == "6")?'selected': '' ?> >6-Horizontal-Images-Only</option>'+
              '<option value="7" <?= ($item['item_option_layout'] == "7")?'selected': '' ?> >7-Verticl-Text-with-Imges</option>'+
              '<option value="8" <?= ($item['item_option_layout'] == "8")?'selected': '' ?> >8-Vertical-Horizontal-Text-with-Images</option>'+
              '<option value="9" <?= ($item['item_option_layout'] == "9")?'selected': '' ?> >9-Horizontal-Text-with-Images</option>'+
              '<option value="10" <?= ($item['item_option_layout'] == "10")?'selected': '' ?> >10-Verticl-Text-with-Single-Imge</option>'+
              '<option value="11" <?= ($item['item_option_layout'] == "11")?'selected': '' ?> >11-Vertical-Horizontal-Text-with-Single-Image</option>'+
              '<option value="12" <?= ($item['item_option_layout'] == "12")?'selected': '' ?> >12-Horizontal-Text-with-Single-Image</option>'+
           '</select>'+
          '</div>'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="layout_preview" class="control-label">Selected Layout</label>'+
            '<img src="<?= base_url(); ?>assets/img/layouts/<?php echo ($item['item_option_layout']!="")?$item['item_option_layout']:"1";?>.jpg" id="layout_preview" name="layout_preview" >'+
          '</div>'+
      '</div>'+
        '<div class="row">'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_a_en" class="control-label">Option a (English)</label>'+
            '<textarea  name="item_option_a_en" class="form-control" id="item_option_a_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_a_en']); ?></textarea>'+
          '</div>'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_a_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن اے  اردو</label>'+
            '<textarea  name="item_option_a_ur" class="form-control" id="item_option_a_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_a_ur']); ?></textarea>'+
          '</div>'+
        '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_b_en" class="control-label">Option b (English)</label>'+
        '<textarea  name="item_option_b_en" class="form-control" id="item_option_b_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_b_en']); ?></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_b_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن بی  اردو </label>'+
        '<textarea  name="item_option_b_ur" class="form-control" id="item_option_b_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_b_ur']); ?></textarea>'+
      '</div>'+
    '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_c_en" class="control-label">Option c (English)</label>'+
        '<textarea  name="item_option_c_en" class="form-control" id="item_option_c_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_c_en']); ?></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_c_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن سی  اردو </label>'+
        '<textarea  name="item_option_c_ur" class="form-control" id="item_option_c_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_c_ur']); ?></textarea>'+
      '</div>'+
    '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_d_en" class="control-label">Option d (English)</label>'+
        '<textarea  name="item_option_d_en" class="form-control" id="item_option_d_en" ><?= str_replace(array("\r", "\n"), '', $item['item_option_d_en']); ?></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_d_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن ڈی  اردو </label>'+
        '<textarea  name="item_option_d_ur" class="form-control" id="item_option_d_ur"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_option_d_ur']); ?></textarea>'+
      '</div>'+
    '</div>'+
	'<div class="form-group row">'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_a_image" class="control-label urdufont-right">Option a Image</label>'+
        '<input type="file" name="item_option_a_image" class="form-control" id="item_option_a_image" placeholder=""  disabled >'+
      '</div>'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_b_image" class="control-label urdufont-right">Option b Image</label>'+
        '<input type="file" name="item_option_b_image" class="form-control" id="item_option_b_image" placeholder=""  disabled>'+
      '</div>'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_c_image" class="control-label urdufont-right">Option c Image</label>'+
        '<input type="file" name="item_option_c_image" class="form-control" id="item_option_c_image" placeholder=""   disabled>'+
      '</div>'+
      '<div class="col-lg-3 col-sm-12">'+
        '<label for="item_option_d_image" class="control-label urdufont-right">Option d Image</label>'+
        '<input type="file" name="item_option_d_image" class="form-control" id="item_option_d_image" placeholder=""  disabled>'+
      '</div>'+
    '</div>'+
	'<?php if ($item['item_option_a_image']!="" || $item['item_option_b_image']!="" || $item['item_option_c_image']!="" || $item['item_option_d_image']!="") {?>'+
	  '<div class="form-group row">'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_a_image']!=""){?><img src="<?php echo base_url().$item['item_option_a_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_option_a_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_b_image']!=""){?><img src="<?php echo base_url().$item['item_option_b_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_option_b_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_c_image']!=""){?><img src="<?php echo base_url().$item['item_option_c_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_option_c_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
		 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_option_d_image']!=""){?><img src="<?php echo base_url().$item['item_option_d_image'];?>" style="max-height:200px; max-width:200px;"/><a class="delete btn btn-sm btn-danger" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_option_d_image-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a><?php }?></div>'+
	  '</div>'+
	'<?php }?>'+
        '<div class="form-group">'+
          '<label for="item_option_correct" class="col-sm-12 control-label">Correct Answer from Above Options</label>'+
          '<div class="col-12">'+
            '<input type="radio" name="item_option_correct" value="a" <?= ($item['item_option_correct'] == "a")?'checked="checked"': '' ?> />'+
            '<label for="a" class="control-label" style="padding: 0px 30px 0px 5px;">Option a</label>'+
            '<input type="radio" name="item_option_correct" value="b" <?= ($item['item_option_correct'] == "b")?'checked="checked"': '' ?>/>'+
            '<label for="b" class="control-label" style="padding: 0px 30px 0px 5px;">Option b</label>'+
            '<input type="radio" name="item_option_correct" value="c" <?= ($item['item_option_correct'] == "c")?'checked="checked"': '' ?>/>'+
            '<label for="c" class="control-label" style="padding: 0px 30px 0px 5px;">Option c</label>'+
            '<input type="radio" name="item_option_correct" value="d" <?= ($item['item_option_correct'] == "d")?'checked="checked"': '' ?>/>'+
            '<label for="d" class="control-label" style="padding: 0px 30px 0px 5px;">Option d</label>'+
          '</div>'+
        '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var ERQ_content = 
			'<div class="row">'+
			   '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_rubric_english" class="control-label" style="padding-top:15px">Rubric (English)</label>'+
                '<textarea  name="item_rubric_english" class="form-control" id="item_rubric_english" ><?= str_replace(array("\r", "\n"), '', str_replace("'",'"',$item['item_rubric_english'])); ?></textarea>'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_rubric_urdu" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> روبرک  اردو</label>'+
                '<textarea  name="item_rubric_urdu" class="form-control" id="item_rubric_urdu"  dir="rtl" lang="ur"  ><?= str_replace(array("\r", "\n"), '', $item['item_rubric_urdu']); ?></textarea>'+
             ' </div>'+
            '</div>'+
            '<div class="form-group row" style="padding-top:10px">'+
              '<div class="col-lg-3 col-sm-12">'+
                '<label for="item_rubric_image_position" class="control-label">Rubric Images Potion</label>'+
                '<select name="item_rubric_image_position" class="form-control form-group" id="item_rubric_image_position">'+
                  '<option value="Top" <?= ($item['item_rubric_image_position'] == "Top")?'selected': '' ?>>Top</option>'+
                  '<option value="Bottom" <?= ($item['item_rubric_image_position'] == "Bottom")?'selected': '' ?>>Bottom</option>'+
                  '<option value="Left" <?= ($item['item_rubric_image_position'] == "Left")?'selected': '' ?>>Left</option>'+
                  '<option value="Right" <?= ($item['item_rubric_image_position'] == "Right")?'selected': '' ?>>Right</option>'+
                '</select>'+
              '</div>'+
              '<div class="col-lg-3 col-sm-12">'+
                '<label for="item_rubric_image" class="control-label">Rubric Image</label>'+
                '<input type="file" name="item_rubric_image" class="form-control" id="item_rubric_image" placeholder="">'+
              '</div>'+
			  '<div class="col-lg-3 col-sm-12"></div>'+ 
			  '<div class="col-lg-3 col-sm-12"></div>'+ 
			'</div>'+
			'<?php if($item['item_rubric_image']!=""){?>'+
              '<div class="form-group row">'+
              	 '<div class="col-lg-3 col-sm-12"></div>'+
                 '<div class="col-lg-3 col-sm-12"><?php if ($item['item_rubric_image']!=""){?><img src="<?php echo base_url().$item['item_rubric_image'];?>" style="max-height:100px; max-width:100px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_rubric_image-". $item['item_id']);?>" title="Delete" ><i class="fa fa-trash-o"></i></a><?php }?></div>'+
              	 '<div class="col-lg-3 col-sm-12"></div>'+
			  	 '<div class="col-lg-3 col-sm-12"></div>'+ 
			  '</div>'+
            '<?php }?>';
			//onclick="return confirm(\'Do you want to delete ?\')"
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var FIB_content = 
			'<div class="row">'+
              '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_fib_key_eng" class="control-label" style="padding-top:10px">Answer </label>'+
                '<textarea  name="item_fib_key_eng" class="form-control" id="item_fib_key_eng" ><?= str_replace(array("\r", "\n"), '', $item['item_fib_key_eng']); ?></textarea>'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_fib_key_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;">جواب</label>'+
                '<textarea  name="item_fib_key_ur" class="form-control" id="item_fib_key_ur" ><?= str_replace(array("\r", "\n"), '', $item['item_fib_key_ur']); ?></textarea>'+
              '</div>'+
           '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var MC_content = '<div class="row">'+
                    '<div class="col-5 ">'+
                        '<div class="row" style="margin-bottom:10px"><div class="col-12"><h3>Column-I</h3></div></div>'+
                        '<div class="row col-12 borders" style="padding-bottom:8px">'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_1" class="control-label" style="padding-top:9px" >Option-1</label>'+
                                    '<input type="text"  name="item_en_mc1_1" class="form-control" id="item_en_mc1_1" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_1']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_1" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_1" class="form-control" id="item_ur_mc1_1"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_1']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_1" class="control-label"  style="padding-top:9px">Image</label>'+
									'<?php if ($item['item_pic_mc1_1']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_1" class="form-control" id="item_pic_mc1_1" placeholder="" >'+
									'<?php } else {?>'+
                                    '<br /><img src="<?php echo base_url().$item['item_pic_mc1_1'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_1-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
                                    '<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_2" class="control-label" style="padding-top:9px">Option-2</label>'+
                                    '<input type="text"  name="item_en_mc1_2" class="form-control" id="item_en_mc1_2"  value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_2']); ?>">'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_2" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_2" class="form-control" id="item_ur_mc1_2"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_2']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_2" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_2']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_2" class="form-control col-12" id="item_pic_mc1_2" placeholder="" >'+
									'<?php }else{?>'+
                                    '<br /><img src="<?php echo base_url().$item['item_pic_mc1_2'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_2-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_3" class="control-label" style="padding-top:9px" >Option-3</label>'+
                                    '<input type="text"  name="item_en_mc1_3" class="form-control" id="item_en_mc1_3" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_3']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_3" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_3" class="form-control" id="item_ur_mc1_3"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_3']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_3" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_3']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_3" class="form-control" id="item_pic_mc1_3" placeholder="" >'+
                                    '<?php }else{?>'+
                                    '<br /><img src="<?php echo base_url().$item['item_pic_mc1_3'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_3-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_4" class="control-label" style="padding-top:9px" >Option-4</label>'+
                                    '<input type="text"  name="item_en_mc1_4" class="form-control" id="item_en_mc1_4" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_4']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_4" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_4" class="form-control" id="item_ur_mc1_4"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_4']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_4" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_4']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_4" class="form-control" id="item_pic_mc1_4" placeholder="" >'+
									'<?php } else{?>'+
                                    '<br /><img src="<?php echo base_url().$item['item_pic_mc1_4'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_4-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                               '<div class="col-4">'+
                                    '<label for="item_en_mc1_5" class="control-label" style="padding-top:9px" >Option-5</label>'+
                                    '<input type="text"  name="item_en_mc1_5" class="form-control" id="item_en_mc1_5" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_5']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_5" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_5" class="form-control" id="item_ur_mc1_5"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_5']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_5" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_5']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_5" class="form-control" id="item_pic_mc1_5" placeholder="" >'+
									'<?php } else {?>'+
                                    '<br /><img src="<?php echo base_url().$item['item_pic_mc1_5'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_5-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_6" class="control-label" style="padding-top:9px" >Option-6</label>'+
                                    '<input type="text"  name="item_en_mc1_6" class="form-control" id="item_en_mc1_6" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_6']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_6" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_6" class="form-control" id="item_ur_mc1_6"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_6']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_6" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_6']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_6" class="form-control" id="item_pic_mc1_6" placeholder="" >'+
									'<?php } else{?>'+
                                    '<br /><img src="<?php echo base_url().$item['item_pic_mc1_6'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_6-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_7" class="control-label" style="padding-top:9px" >Option-7</label>'+
                                    '<input type="text"  name="item_en_mc1_7" class="form-control" id="item_en_mc1_7" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_7']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_7" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_7" class="form-control" id="item_ur_mc1_7"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_7']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_7" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_7']==""){?>'+
									'<input type="file" name="item_pic_mc1_7" class="form-control" id="item_pic_mc1_7" placeholder="" >'+
									'<?php } else {?>'+
                                    '<br /><img src="<?php echo base_url().$item['item_pic_mc1_7'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_7-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_8" class="control-label" style="padding-top:9px" >Option-8</label>'+
                                    '<input type="text"  name="item_en_mc1_8" class="form-control" id="item_en_mc1_8" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_8']); ?>">'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_8" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_8" class="form-control" id="item_ur_mc1_8"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_8']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_8" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_8']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_8" class="form-control" id="item_pic_mc1_8" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc1_8'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_8-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_9" class="control-label" style="padding-top:9px" >Option-9</label>'+
                                    '<input type="text"  name="item_en_mc1_9" class="form-control" id="item_en_mc1_9" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_9']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_9" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_9" class="form-control" id="item_ur_mc1_9"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_9']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_9" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_9']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_9" class="form-control" id="item_pic_mc1_9" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc1_9'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_9-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row" style="margin-bottom:5px">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_10" class="control-label" style="padding-top:9px" >Option-10</label>'+
                                    '<input type="text"  name="item_en_mc1_10" class="form-control" id="item_en_mc1_10" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc1_10']); ?>"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_10" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_10" class="form-control" id="item_ur_mc1_10"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc1_10']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_10" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc1_10']==""){?>'+
                                    '<input type="file" name="item_pic_mc1_10" class="form-control" id="item_pic_mc1_10" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc1_10'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc1_10-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    <!---------------for column-2 starts here-------------------->
                    '<div class="col-5">'+
                        '<div class="row"><div class="col-12" style="margin-bottom:10px"><h3>Column-II</h3></div></div>'+
                        '<div class="row col-12 borders" style="padding-bottom:8px">'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_a" class="control-label" style="padding-top:9px">Option-a</label>'+
                                    '<input type="text"  name="item_en_mc2_a" class="form-control" id="item_en_mc2_a" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_a']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_a" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_a" class="form-control" id="item_ur_mc2_a"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_a']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_a" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_a']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_a" class="form-control" id="item_pic_mc2_a" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_a'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_a-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_b" class="control-label" style="padding-top:9px">Option-b</label>'+
                                    '<input type="text"  name="item_en_mc2_b" class="form-control" id="item_en_mc2_b" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_b']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_b" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_b" class="form-control" id="item_ur_mc2_b"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_b']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                   '<label for="item_pic_mc2_b" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_b']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_b" class="form-control" id="item_pic_mc2_b" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_b'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_b-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_c" class="control-label" style="padding-top:9px">Option-c</label>'+
                                    '<input type="text"  name="item_en_mc2_c" class="form-control" id="item_en_mc2_c" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_c']); ?>"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_c" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_c" class="form-control" id="item_ur_mc2_c"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_c']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_c" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_c']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_c" class="form-control" id="item_pic_mc2_c" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_c'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_c-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_d" class="control-label" style="padding-top:9px">Option-d</label>'+
                                    '<input type="text"  name="item_en_mc2_d" class="form-control" id="item_en_mc2_d" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_d']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_d" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_d" class="form-control" id="item_ur_mc2_d"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_d']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_d" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_d']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_d" class="form-control" id="item_pic_mc2_d" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_d'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_d-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_e" class="control-label" style="padding-top:9px">Option-e</label>'+
                                    '<input type="text"  name="item_en_mc2_e" class="form-control" id="item_en_mc2_e" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_e']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_e" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_e" class="form-control" id="item_ur_mc2_e"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_e']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_e" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_e']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_e" class="form-control" id="item_pic_mc2_e" placeholder="" >'+
                                   ' <?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_e'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_e-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                   '<label for="item_en_mc2_f" class="control-label" style="padding-top:9px">Option-f</label>'+
                                    '<input type="text"  name="item_en_mc2_f" class="form-control" id="item_en_mc2_f" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_f']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_f" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_f" class="form-control" id="item_ur_mc2_f"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_f']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_f" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_f']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_f" class="form-control" id="item_pic_mc2_f" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_f'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_f-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_g" class="control-label" style="padding-top:9px">Option-g</label>'+
                                    '<input type="text"  name="item_en_mc2_g" class="form-control" id="item_en_mc2_g" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_g']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_g" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_g" class="form-control" id="item_ur_mc2_g"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_g']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_g" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_g']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_g" class="form-control" id="item_pic_mc2_g" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_g'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_g-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_h" class="control-label" style="padding-top:9px">Option-h</label>'+
                                    '<input type="text"  name="item_en_mc2_h" class="form-control" id="item_en_mc2_h" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_h']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_h" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_h" class="form-control" id="item_ur_mc2_h"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_h']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_h" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_h']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_h" class="form-control" id="item_pic_mc2_h" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_h'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_h-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_i" class="control-label" style="padding-top:9px">Option-i</label>'+
                                    '<input type="text"  name="item_en_mc2_i" class="form-control" id="item_en_mc2_i" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_i']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_i" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_i" class="form-control" id="item_ur_mc2_i"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_i']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_i" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_i']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_i" class="form-control" id="item_pic_mc2_i" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_i'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_i-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row" style="margin-bottom:5px">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_j" class="control-label" style="padding-top:9px">Option-j</label>'+
                                    '<input type="text"  name="item_en_mc2_j" class="form-control" id="item_en_mc2_j" value="<?= str_replace(array("\r", "\n"), '', $item['item_en_mc2_j']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_j" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_j" class="form-control" id="item_ur_mc2_j"  dir="rtl" lang="ur" value="<?= str_replace(array("\r", "\n"), '', $item['item_ur_mc2_j']); ?>" >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_j" class="control-label"  style="padding-top:9px">Image</label>'+
                                    '<?php if ($item['item_pic_mc2_j']==""){?>'+
                                    '<input type="file" name="item_pic_mc2_j" class="form-control" id="item_pic_mc2_j" placeholder="" >'+
                                    '<?php } else {?><br /><img src="<?php echo base_url().$item['item_pic_mc2_j'];?>" style="max-height:68px; max-width:68px;"/><a class="delete btn btn-sm btn-danger" style="padding-left:10px; float:right" href="<?php echo base_url("admin/items/delete_image_rev_combine/item_pic_mc2_j-". $item['item_id']); ?>" title="Delete" onclick="return confirm(\'Do you want to delete ?\')"><i class="fa fa-trash-o"></i></a>'+
									'<?php }?>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    <!---------------for column-2 ends here-------------------->
                    <!---------------answer column here here-------------------->
                    '<?php $item_mc_ans_key = $item['item_mc_ans_key'];$ans = explode('_',$item_mc_ans_key);$item_mc_ans_key_1 = (isset($ans[0])&&$ans[0]!="")?substr($ans[0], -1):"";$item_mc_ans_key_2 = (isset($ans[1])&&$ans[1]!="")?substr($ans[1], -1):"";$item_mc_ans_key_3 = (isset($ans[2])&&$ans[2]!="")?substr($ans[2], -1):"";$item_mc_ans_key_4 = (isset($ans[3])&&$ans[3]!="")?substr($ans[3], -1):"";$item_mc_ans_key_5= (isset($ans[4])&&$ans[4]!="")?substr($ans[4], -1):"";$item_mc_ans_key_6 = (isset($ans[5])&&$ans[5]!="")?substr($ans[5], -1):"";$item_mc_ans_key_7 = (isset($ans[6])&&$ans[6]!="")?substr($ans[6], -1):"";$item_mc_ans_key_8 = (isset($ans[7])&&$ans[7]!="")?substr($ans[7], -1):"";$item_mc_ans_key_9 = (isset($ans[8])&&$ans[8]!="")?substr($ans[8], -1):"";$item_mc_ans_key_10 = (isset($ans[9])&&$ans[9]!="")?substr($ans[9], -1):""; ?>'+
					'<div class="col-2">'+
                            '<div class="row" id="item_mc_ans_key">'+
                                '<div class="col-6"><label for="item_mc_ans_key" class="control-label"><h3>Answer</h3></label></div>'+
                                '<div class="col-6 urdufont-right" style="text-align:right"><h3>جواب</h3></div>'+
                            '</div>'+
                            '<div class="row borders" style="padding:40px 0px 0px 15px">'+
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_1" class="form-control form-group" id="item_mc_ans_key_1"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_1 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_1 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_1 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_1 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_1 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_1 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_1 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_1 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_1 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_1 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+

                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>'+
								'<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_2" class="form-control form-group" id="item_mc_ans_key_2"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_3" class="form-control form-group" id="item_mc_ans_key_3"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_4" class="form-control form-group" id="item_mc_ans_key_4"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_5" class="form-control form-group" id="item_mc_ans_key_5"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_6" class="form-control form-group" id="item_mc_ans_key_6"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_7" class="form-control form-group" id="item_mc_ans_key_7"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_8" class="form-control form-group" id="item_mc_ans_key_8"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_9" class="form-control form-group" id="item_mc_ans_key_9"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 42px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<select name="item_mc_ans_key_10" class="form-control form-group" id="item_mc_ans_key_10"  >'+
                                      '<option value="a" <?= ($item_mc_ans_key_2 == "a")?'selected="selected"': '' ?>>Option-a</option>'+
                                      '<option value="b" <?= ($item_mc_ans_key_2 == "b")?'selected="selected"': '' ?>>Option-b</option>'+
                                      '<option value="c" <?= ($item_mc_ans_key_2 == "c")?'selected="selected"': '' ?>>Option-c</option>'+
                                      '<option value="d" <?= ($item_mc_ans_key_2 == "d")?'selected="selected"': '' ?>>Option-d</option>'+
                                      '<option value="e" <?= ($item_mc_ans_key_2 == "e")?'selected="selected"': '' ?>>Option-e</option>'+
                                      '<option value="f" <?= ($item_mc_ans_key_2 == "f")?'selected="selected"': '' ?>>Option-f</option>'+
                                      '<option value="g" <?= ($item_mc_ans_key_2 == "g")?'selected="selected"': '' ?>>Option-g</option>'+
                                      '<option value="h" <?= ($item_mc_ans_key_2 == "h")?'selected="selected"': '' ?>>Option-h</option>'+
                                      '<option value="i" <?= ($item_mc_ans_key_2 == "i")?'selected="selected"': '' ?>>Option-i</option>'+
                                      '<option value="j" <?= ($item_mc_ans_key_2 == "j")?'selected="selected"': '' ?>>Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
$('#item_type').on('change', function() {
	if ( this.value == 'MCQ' ) {
		$( '#MCQ_block' ).show();
		$( '#MCQ_block' ).empty();
		$( '#MCQ_block' ).append(MCQ_content);
		$( '#ERQ_block' ).hide();
		$( '#FIB_block' ).hide();
		$( '#TF_block' ).hide();
		$( '#MC_block' ).hide();
		/*item_option_a_en*/
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
		CKEDITOR.replace('item_option_a_en', {
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
		CKEDITOR.replace('item_option_d_en', {
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
		/*item_option_b_en*/
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
		CKEDITOR.replace('item_option_b_en', {
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
		/*item_option_c_en*/
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
		CKEDITOR.replace('item_option_c_en', {
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
		
		/*item_option_a_ur*/
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
		CKEDITOR.replace('item_option_a_ur', {
		extraPlugins: 'ckeditor_wiris',
		// For now, MathType is incompatible with CKEditor file upload plugins.
		removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		height: 120,
		enterMode : CKEDITOR.ENTER_BR,
		shiftEnterMode: CKEDITOR.ENTER_P,
		contentsLangDirection: 'rtl',
		// Update the ACF configuration with MathML syntax.
		extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
		});
		}());
		/*item_option_b_ur*/
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
		CKEDITOR.replace('item_option_b_ur', {
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
		/*item_option_c_ur*/
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
		CKEDITOR.replace('item_option_c_ur', {
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
		/*item_option_d_ur*/
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
		CKEDITOR.replace('item_option_d_ur', {
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
	} else if ( this.value == 'ERQ' ) {
		$( '#MCQ_block' ).hide();
		$( '#ERQ_block' ).show();
		$( '#ERQ_block' ).empty();
		$( '#ERQ_block' ).append(ERQ_content);
		$( '#FIB_block' ).hide();
		$( '#TF_block' ).hide();
		$( '#MC_block' ).hide();
		/*item_rubric_english*/
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
		/*item_rubric_urdu*/
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
	} else if ( this.value == 'FIB' ) {
		$( '#MCQ_block' ).hide();
		$( '#ERQ_block' ).hide();
		$( '#FIB_block' ).show();
		$( '#FIB_block' ).empty();
		$( '#FIB_block' ).append(FIB_content);
		$( '#TF_block' ).hide();
		$( '#MC_block' ).hide();
		/*item_fib_key_eng*/
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
		
		  CKEDITOR.replace('item_fib_key_eng', {
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
		/*item_fib_key_ur*/
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
		
		  CKEDITOR.replace('item_fib_key_ur', {
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
	} else if ( this.value == 'TF' ) {
		$( '#MCQ_block' ).hide();
		$( '#ERQ_block' ).hide();
		$( '#FIB_block' ).hide();
		$( '#TF_block' ).show();
		$( '#TF_block' ).empty();
		$( '#TF_block' ).append(TF_content);
		$( '#MC_block' ).hide();
		
	} else if ( this.value == 'MC' ) {
		$( '#MCQ_block' ).hide();
		$( '#ERQ_block' ).hide();
		$( '#FIB_block' ).hide();
		$( '#TF_block' ).hide();
		$( '#MC_block' ).show();
		$( '#MC_block' ).empty();
		$( '#MC_block' ).append(MC_content);
	}
});
/*item_stem_ur*/
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
/*item_stem_en*/
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
/////////
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
		
		
	 var itemtype_selected = "";
	if($('#item_type').val() == 'MCQ') itemtype_selected = "M";	
	else if ($('#item_type').val()=='ERQ') itemtype_selected = "E";
	else if ($('#item_type').val()=='TF') itemtype_selected = "T";
	else if ($('#item_type').val() == 'FIB')  itemtype_selected = "F";
	else if ($('#item_type').val()=='MC') itemtype_selected = "C";

	var grade_selected = "";
	if(arr[0]['grade'] == 1) grade_selected = "I";	
	else if(arr[0]['grade'] == 2) grade_selected = "II";	
	else if(arr[0]['grade'] == 3) grade_selected = "III";	
	else if(arr[0]['grade'] == 4) grade_selected = "IV";	
	else if(arr[0]['grade'] == 5) grade_selected = "V";	
	else if(arr[0]['grade'] == 6) grade_selected = "VI";	
	else if(arr[0]['grade'] == 7) grade_selected = "VII";	
	else if(arr[0]['grade'] == 8) grade_selected = "VIII";	
		
		
		$('#item_code').val(arr[0]['subject_code']+'-'+grade_selected+'-'+itemtype_selected+(new Date().getFullYear() + 1).toString().substr(-2)+'-'+<?php echo  $this->session->userdata('admin_id'); ?>+'-'+maxnum);
     
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
      $.each(arr, function(key, value) {           
     $('#item_subcstand_id')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en+value.subcs_topic_ur)
                  ); 
        });   
    });});
	
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
    });});
	
$(document).on('change','#item_option_layout', function() {
$("#layout_preview").attr("src","<?= base_url(); ?>assets/img/layouts/"+this.value+".jpg");	
		//alert(this.value);
			switch(this.value)
			{
				case "1":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "2":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "3":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "4":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "5":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "6":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "7":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "8":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "9":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "10":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "11":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "12":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
			}});
/*
$(function () {
	$("#MCQ").hide();
	$("#ERQ").hide();
	$("#FIB").hide();
	$("#TF").hide();
	$("#MC").hide();	
	$("#< ?php echo $item['item_type']; ?>").show();
	$('#item_type').on('change', function() {
		$("#MCQ").hide();
		$("#ERQ").hide();
		$("#FIB").hide();
		$("#TF").hide();
		$("#MC").hide();
		$("#"+this.value).show();
	});
});*/
<?php if($item['item_type']=="MCQ"){?>
$( '#MCQ_block' ).show();
$( '#MCQ_block' ).empty();
$( '#MCQ_block' ).append(MCQ_content);
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).hide();
$( '#TF_block' ).hide();
$( '#MC_block' ).hide();
/*item_option_a_en*/
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
CKEDITOR.replace('item_option_a_en', {
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
/*item_option_b_en*/
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
CKEDITOR.replace('item_option_b_en', {
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
/*item_option_c_en*/
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
CKEDITOR.replace('item_option_c_en', {
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
CKEDITOR.replace('item_option_d_en', {
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
/*item_option_a_ur*/
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
CKEDITOR.replace('item_option_a_ur', {
extraPlugins: 'ckeditor_wiris',
// For now, MathType is incompatible with CKEditor file upload plugins.
removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
height: 120,
enterMode : CKEDITOR.ENTER_BR,
shiftEnterMode: CKEDITOR.ENTER_P,
contentsLangDirection: 'rtl',
// Update the ACF configuration with MathML syntax.
extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
});
}());
/*item_option_b_ur*/
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
CKEDITOR.replace('item_option_b_ur', {
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
/*item_option_c_ur*/
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
CKEDITOR.replace('item_option_c_ur', {
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
/*item_option_d_ur*/
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
CKEDITOR.replace('item_option_d_ur', {
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
<?php }elseif($item['item_type']=="ERQ"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).show();
$( '#ERQ_block' ).empty();
$( '#ERQ_block' ).append(ERQ_content);
$( '#FIB_block' ).hide();
$( '#TF_block' ).hide();
$( '#MC_block' ).hide();
/*item_rubric_english*/
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
/*item_rubric_urdu*/
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
<?php }elseif($item['item_type']=="FIB"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).show();
$( '#FIB_block' ).empty();
$( '#FIB_block' ).append(FIB_content);
$( '#TF_block' ).hide();
$( '#MC_block' ).hide();
/*item_fib_key_eng*/
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

  CKEDITOR.replace('item_fib_key_eng', {
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
/*item_fib_key_ur*/
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

  CKEDITOR.replace('item_fib_key_ur', {
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
<?php }elseif($item['item_type']=="TF"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).hide();
$( '#TF_block' ).show();
$( '#TF_block' ).empty();
$( '#TF_block' ).append(TF_content);
$( '#MC_block' ).hide();
<?php }elseif($item['item_type']=="MC"){?>
$( '#MCQ_block' ).hide();
$( '#ERQ_block' ).hide();
$( '#FIB_block' ).hide();
$( '#TF_block' ).hide();
$( '#MC_block' ).show();
$( '#MC_block' ).empty();
$( '#MC_block' ).append(MC_content);
<?php }?>
</script> 
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script> 