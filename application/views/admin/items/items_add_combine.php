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
            <div class="col-4"><h4><i class="fa fa-plus"></i> Add New Item </h4></div>
            <div class="col-4">
            </div>
            <div class="col-4"><a href="<?= base_url('admin/items/ditems'); ?>" class="btn btn-success" style="float:right"><i class="fa fa-list"></i> Items List</a></div>
        </div>
      </div>
      <?php $this->load->view('admin/includes/_messages.php') ?>
        <?php echo form_open(base_url('admin/items/add_combine'), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return check_MC_values()"');  ?>
      <div class="card-body"> 
        <!-- For Messages -->
        
        <input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
        <div class="row">
            <div class="col-3"><label for="item_type" class="col-12 control-label">Select Item Type *</label></div>
            <div class="col-9">
                <select name="item_type" class="form-control form-group" id="item_type"  required="required">
                    <option value="">---Select Item type---</option>
                    <option value="MCQ">MCQ</option>
                    <option value="ERQ">ERQ</option>
                    <?php /*?><option value="FIB">Fill in Blanks</option>
                    <option value="TF">True/Flase</option>
                    <option value="MC">Match Column</option><?php */?>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-12">
            <label for="item_date_received" class="col-sm-6 control-label">Date *</label>
            <div class="col-12">
              <input type="text" name="item_date_received" class="form-control" id="item_date_received" placeholder="" required="required" value="<?php echo date("Y-m-d H:i:s"); ?>" readonly >
            </div>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_code" class="col-sm-12 control-label">Item Code *</label>
            <div class="col-12">
              <input type="text" name="item_code" class="form-control" id="item_code" placeholder="" required="required"  value="" readonly >
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_difficulty" class="col-sm-12 control-label">Difficulty *</label>
            <div class="col-12">
              <input type="number" name="item_difficulty" class="form-control" id="item_difficulty" placeholder="" required="required" value="0.01" step="0.05" min="0.01" max="0.99">
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_discr" class="col-sm-6 control-label">Discr</label>
            <div class="col-12">
              <input type="number" name="item_discr" class="form-control" id="item_discr" placeholder="" required="required" value="0.00" min="-1" max="+1" step="0.01">
            </div>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_dif_code" class="col-sm-12 control-label">DIFF *</label>
            <div class="col-12">
              <select name="item_dif_code" class="form-control form-group" id="item_dif_code"  required="required">
                <option value="All">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Urban">Urban</option>
                <option value="Rural">Rural</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 col-sm-12">
            <label for="item_grade_id" class="control-label">Grade *</label>
            <select name="item_grade_id" class="form-control form-group" id="item_grade_id"  required="required">
              <option value="">--Select Grades--</option>
              <?php
              foreach($grades as $grade)
              {
             	  echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
              }
              ?>
            </select>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_subject_id" class="control-label">Subject *</label>
            <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  required>
              <option value="">--Select Subjects--</option>
            </select>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_cstand_id" class="control-label">Content Strand *</label>
            <select name="item_cstand_id" class="form-control form-group" id="item_cstand_id"  required>
              <option value="">--Select Content Strand--</option>
            </select>
          </div>
          <div class="col-lg-5 col-sm-12">
            <label for="item_subcstand_id" class="control-label">Sub Content Strand *</label>
            <select name="item_subcstand_id" class="form-control form-group" id="item_subcstand_id"  required>
              <option value="">--Select Content Strand--</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-sm-10">
            <label for="item_slo_id" class="control-label">Select SLO Statement *</label>
            <select name="item_slo_id" class="form-control form-group" id="item_slo_id"  required>
              <option value="">--Select SLO Statement--</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_total_marks" class="control-label">Item Marks *</label>
            <input type="text" name="item_total_marks" class="form-control" id="item_total_marks" placeholder=""  value="" required>
          </div>
        </div>
        	<div class="row">
          <div class="col-lg-2 col-sm-12">
            <label for="item_curriculum" class="control-label">Curriculum *</label>
            <select name="item_curriculum" class="form-control form-group" id="item_curriculum"  required>
              <option value="3">Single National Curriculum(SNC) 2020</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_pctb_chapter" class="control-label">PCTB Chapter *</label>
            <input type="text" name="item_pctb_chapter" class="form-control" id="item_pctb_chapter" placeholder=""  value="" required="required">
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_pctb_page" class="control-label">PCTB Page No.*</label>
            <input type="text" name="item_pctb_page" class="form-control" id="item_pctb_page" placeholder=""  value="" required="required">
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_other_title" class="control-label">Other Title </label>
            <input type="text" name="item_other_title" class="form-control" id="item_other_title" placeholder=""  value="" >
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_other_year" class="control-label">Other Year </label>
            <input type="text" name="item_other_year" class="form-control" id="item_other_year" placeholder=""  value="" >
          </div>
          <div class="col-lg-2 col-sm-12">
            <label for="item_other_page" class="control-label" style="font-size:15px">Other Page No.</label>
            <input type="text" name="item_other_page" class="form-control" id="item_other_page" placeholder=""  value="" >
          </div>
        </div>
        	<div class="row">
          <div class="col-lg-3 col-sm-12">
            <label for="item_cognitive_bloom" class="control-label">Bloom/Cognitive *</label>
            <select name="item_cognitive_bloom" class="form-control form-group" id="item_cognitive_bloom"  required="required">
              <option value="Knowledge">Knowledge</option>
              <option value="Comprehension">Comprehension</option>
              <option value="Application">Application</option>
              <option value="Analysis">Analysis</option>
              <option value="Synthesis">Synthesis</option>
              <option value="Evaluation">Evaluation</option>
            </select>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_relation" class="control-label">Relation *</label>
            <select name="item_relation" class="form-control form-group" id="item_relation"  required>              
              <option value="Amended">Amended</option>
				<option value="Direct Quote">Direct Quote</option>
            </select>
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_stem_number" class="control-label">STEM Number *</label>
            <input type="text" name="item_stem_number" class="form-control" id="item_stem_number" placeholder="" value="1" readonly >
          </div>
          <div class="col-lg-3 col-sm-12">
            <label for="item_batch" class="control-label">Item Section *</label>
            <select  name="item_batch" class="form-control" id="item_batch" >
              <!-- <option value="1" selected>1-Training Batch </option> -->
              <option value="1">Section-1 (MCQs)</option>
              <option value="2">Section-2 (Short Question)</option>
              <option value="3">Section-3-(Long Question)</option>
            </select>
          </div>
        </div>
        	<div class="row">
              <div class="col-lg-6 col-sm-12">
                <label for="item_stem_en" class="control-label" style="padding-top:9px">Item / STEM (English)  ( <a href="" data-toggle="modal" data-target="#headingModal">Media Images Gallery</a> )</label>
                <textarea id="item_stem_en" name="item_stem_en"  class="form-control form-group" ></textarea>
              </div>
              <div class="col-lg-6 col-sm-12">
                <label for="item_stem_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آئٹم / سٹم &nbsp; ( اردو) &nbsp;( <a href="" data-toggle="modal" data-target="#headingModal">تصاویر گیلری</a> )</label>
                <textarea id="item_stem_ur" name="item_stem_ur"  class="form-control form-group" dir="rtl" lang="ur" ></textarea>
              </div>
            </div>
            
        	<div class="row" style="padding-top:10px">
              <div class="col-lg-2 col-sm-12">
                <label for="item_image_position" class="control-label">Stem Images Position</label>
                <select name="item_image_position" class="form-control form-group" id="item_image_position" >
                  <option value="Top">Top</option>
                  <option value="Bottom">Bottom</option>
                  <option value="Left">Left</option>
                  <option value="Right">Right</option>
                  <option value="Full_Page">Full Page</option>
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
       		<div class="row"><div class="col-lg-12 col-sm-12"><hr /></div></div>
       		
            <div id="MCQ_block"></div>
            <div id="ERQ_block"></div>
            <div id="FIB_block"></div>
            <div id="TF_block"></div>
            <div id="MC_block"></div>
            
       </div>
       
      <div class="form-group" style="padding:10px; padding-bottom:30px">
          <div class="col-md-12">
            <input type="submit" name="submit" id="submit" value="Add Item" class="btn btn-info pull-right">
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
        	<input onclick="this.value = '<?= base_url().'/'.$row->m_image; ?>'; this.select(); document.execCommand('copy'); this.value = 'Image URL Copied'; " type='text' style="font-size:14px; width:100%" value='Click here to copy URL' />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
var TF_content = 
            '<div class="row">'+
              '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_tf_eng_1" class="control-label" style="padding-top:10px">Answer (Option-1)</label>'+
                '<input type="text"  name="item_tf_eng_1" class="form-control" id="item_tf_eng_1" >'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_tf_ur_1" class="col-sm-12 control-label urdufont-right" style="text-align:right;">جواب</label>'+
                '<input type="text"  name="item_tf_ur_1" class="form-control" id="item_tf_ur_1"  dir="rtl" lang="ur"  >'+
              '</div>'+
            '</div>'+
            '<div class="row">'+
              '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_tf_eng_2" class="control-label" style="padding-top:10px">Answer (Option-2)</label>'+
                '<input type="text"  name="item_tf_eng_2" class="form-control" id="item_tf_eng_2" >'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_tf_ur_2" class="col-sm-12 control-label urdufont-right" style="text-align:right;">جواب</label>'+
                '<input type="text"  name="item_tf_ur_2" class="form-control" id="item_tf_ur_2"  dir="rtl" lang="ur"  >'+
              '</div>'+
            '</div>'+
            '<div class="form-group">'+
              '<label for="item_option_correct" class="col-sm-12 control-label">Correct Answer from Above Options</label>'+
              '<div class="col-12">'+
                '<input type="radio" name="item_option_correct" value="a" checked />'+
                '<label for="a" class="control-label" style="padding: 0px 30px 0px 5px;">Option a</label>'+
                '<input type="radio" name="item_option_correct" value="b" />'+
                '<label for="b" class="control-label" style="padding: 0px 30px 0px 5px;">Option b</label>'+
              '</div>'+
            '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			
var MCQ_content = 
		'<div class="row">'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_layout" class="control-label">Select Item/Question Options Layout to Display *</label>'+
            '<select name="item_option_layout" class="form-control form-group" id="item_option_layout"  required>'+
              '<option value="1">1-Verticl-Text-Only</option>'+
              '<option value="2">2-Vertical-Horizontal-Text-Only</option>'+
              '<option value="3">3-Horizontal-Text-Only</option>'+
              '<option value="4">4-Vertical-Images-Only</option>'+
              '<option value="5">5-Vertical-Horizontal-Images-Only</option>'+
              '<option value="6">6-Horizontal-Images-Only</option>'+
              '<option value="7">7-Verticl-Text-with-Imges</option>'+
              '<option value="8">8-Vertical-Horizontal-Text-with-Images</option>'+
              '<option value="9">9-Horizontal-Text-with-Images</option>'+
              '<option value="10">10-Verticl-Text-with-Single-Imge</option>'+
              '<option value="11">11-Vertical-Horizontal-Text-with-Single-Image</option>'+
              '<option value="12">12-Horizontal-Text-with-Single-Image</option>'+
           '</select>'+
          '</div>'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="layout_preview" class="control-label" required>Selected Layout</label>'+
            '<img src="<?= base_url(); ?>assets/img/layouts/1.jpg" id="layout_preview" name="layout_preview" >'+
          '</div>'+
      '</div>'+
        '<div class="row">'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_a_en" class="control-label" >Option a (English)</label>'+
            '<textarea  name="item_option_a_en" class="form-control" id="item_option_a_en" ></textarea>'+
          '</div>'+
          '<div class="col-lg-6 col-sm-12">'+
            '<label for="item_option_a_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن اے  اردو</label>'+
            '<textarea  name="item_option_a_ur" class="form-control" id="item_option_a_ur"  dir="rtl" lang="ur"  ></textarea>'+
          '</div>'+
        '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_b_en" class="control-label">Option b (English)</label>'+
        '<textarea  name="item_option_b_en" class="form-control" id="item_option_b_en" ></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_b_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن بی  اردو </label>'+
        '<textarea  name="item_option_b_ur" class="form-control" id="item_option_b_ur"  dir="rtl" lang="ur"  ></textarea>'+
      '</div>'+
    '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_c_en" class="control-label">Option c (English)</label>'+
        '<textarea  name="item_option_c_en" class="form-control" id="item_option_c_en" ></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_c_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن سی  اردو </label>'+
        '<textarea  name="item_option_c_ur" class="form-control" id="item_option_c_ur"  dir="rtl" lang="ur"  ></textarea>'+
      '</div>'+
    '</div>'+
        '<div class="row">'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_d_en" class="control-label">Option d (English)</label>'+
        '<textarea  name="item_option_d_en" class="form-control" id="item_option_d_en" ></textarea>'+
      '</div>'+
      '<div class="col-lg-6 col-sm-12">'+
        '<label for="item_option_d_ur" class="control-label urdufont-right" style="text-align:right;" lang="ur" dir="rtl"> آپشن ڈی  اردو </label>'+
        '<textarea  name="item_option_d_ur" class="form-control" id="item_option_d_ur"  dir="rtl" lang="ur"  ></textarea>'+
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
        '<div class="form-group">'+
          '<label for="item_option_correct" class="col-sm-12 control-label">Correct Answer from Above Options</label>'+
          '<div class="col-12">'+
            '<input type="radio" name="item_option_correct" value="a" checked />'+
            '<label for="a" class="control-label" style="padding: 0px 30px 0px 5px;">Option a</label>'+
            '<input type="radio" name="item_option_correct" value="b" />'+
            '<label for="b" class="control-label" style="padding: 0px 30px 0px 5px;">Option b</label>'+
            '<input type="radio" name="item_option_correct" value="c" />'+
            '<label for="c" class="control-label" style="padding: 0px 30px 0px 5px;">Option c</label>'+
            '<input type="radio" name="item_option_correct" value="d" />'+
            '<label for="d" class="control-label" style="padding: 0px 30px 0px 5px;">Option d</label>'+
          '</div>'+
        '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var ERQ_content = 
			'<div class="row">'+
			'<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_rubric_english" class="control-label" style="padding-top:15px">Rubric (English)</label>'+
                '<textarea  name="item_rubric_english" class="form-control" id="item_rubric_english" ></textarea>'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_rubric_urdu" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> روبرک  اردو</label>'+
                '<textarea  name="item_rubric_urdu" class="form-control" id="item_rubric_urdu"  dir="rtl" lang="ur"  ></textarea>'+
             ' </div>'+
            '</div>'+
            '<div class="form-group row" style="padding-top:10px">'+
              '<div class="col-lg-3 col-sm-12">'+
                '<label for="item_rubric_image_position" class="control-label">Rubric Images Potion</label>'+
                '<select name="item_rubric_image_position" class="form-control form-group" id="item_rubric_image_position">'+
                  '<option value="Top">Top</option>'+
                  '<option value="Bottom">Bottom</option>'+
                  '<option value="Left">Left</option>'+
                  '<option value="Right">Right</option>'+
                '</select>'+
              '</div>'+
              '<div class="col-lg-3 col-sm-12">'+
                '<label for="item_rubric_image" class="control-label">Rubric Image</label>'+
                '<input type="file" name="item_rubric_image" class="form-control" id="item_rubric_image" placeholder="">'+
              '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var FIB_content = 
			'<div class="row">'+
              '<div class="col-lg-6 col-sm-12" >'+
                '<label for="item_fib_key_eng" class="control-label" style="padding-top:10px">Answer </label>'+
                '<textarea  name="item_fib_key_eng" class="form-control" id="item_fib_key_eng" ></textarea>'+
              '</div>'+
              '<div class="col-lg-6 col-sm-12">'+
                '<label for="item_fib_key_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;">جواب</label>'+
                '<textarea  name="item_fib_key_ur" class="form-control" id="item_fib_key_ur" ></textarea>'+
              '</div>'+
           '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var MC_content = '<div class="row">'+
                    '<div class="col-5 ">'+
                        '<div class="row" style="margin-bottom:10px"><div class="col-12"><h3>Column-I</h3></div></div>'+
                        '<div class="row col-12 borders" style="padding-bottom:8px">'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_1" class="control-label" style="padding-top:5px" >Option-1</label>'+
                                    '<input type="text"  name="item_en_mc1_1" class="form-control" id="item_en_mc1_1"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_1" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_1" class="form-control" id="item_ur_mc1_1"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_1" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_1" class="form-control" id="item_pic_mc1_1" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_2" class="control-label" style="padding-top:9px">Option-2</label>'+
                                    '<input type="text"  name="item_en_mc1_2" class="form-control" id="item_en_mc1_2"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_2" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_2" class="form-control" id="item_ur_mc1_2"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_2" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_2" class="form-control" id="item_pic_mc1_2" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_3" class="control-label" style="padding-top:9px" >Option-3</label>'+
                                    '<input type="text"  name="item_en_mc1_3" class="form-control" id="item_en_mc1_3"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_3" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_3" class="form-control" id="item_ur_mc1_3"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_3" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_3" class="form-control" id="item_pic_mc1_3" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_4" class="control-label" style="padding-top:9px" >Option-4</label>'+
                                    '<input type="text"  name="item_en_mc1_4" class="form-control" id="item_en_mc1_4"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_4" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_4" class="form-control" id="item_ur_mc1_4"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_4" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_4" class="form-control" id="item_pic_mc1_4" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                               '<div class="col-4">'+
                                    '<label for="item_en_mc1_5" class="control-label" style="padding-top:9px" >Option-5</label>'+
                                    '<input type="text"  name="item_en_mc1_5" class="form-control" id="item_en_mc1_5"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_5" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_5" class="form-control" id="item_ur_mc1_5"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_5" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_5" class="form-control" id="item_pic_mc1_5" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_6" class="control-label" style="padding-top:9px" >Option-6</label>'+
                                    '<input type="text"  name="item_en_mc1_6" class="form-control" id="item_en_mc1_6"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_6" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_6" class="form-control" id="item_ur_mc1_6"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_6" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_6" class="form-control" id="item_pic_mc1_6" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_7" class="control-label" style="padding-top:9px" >Option-7</label>'+
                                    '<input type="text"  name="item_en_mc1_7" class="form-control" id="item_en_mc1_7"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_7" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_7" class="form-control" id="item_ur_mc1_7"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_7" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_7" class="form-control" id="item_pic_mc1_7" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_8" class="control-label" style="padding-top:9px" >Option-8</label>'+
                                    '<input type="text"  name="item_en_mc1_8" class="form-control" id="item_en_mc1_8"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_8" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_8" class="form-control" id="item_ur_mc1_8"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_8" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_8" class="form-control" id="item_pic_mc1_8" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_9" class="control-label" style="padding-top:9px" >Option-9</label>'+
                                    '<input type="text"  name="item_en_mc1_9" class="form-control" id="item_en_mc1_9"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_9" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_9" class="form-control" id="item_ur_mc1_9"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_9" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_9" class="form-control" id="item_pic_mc1_9" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row" style="margin-bottom:5px">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc1_10" class="control-label" style="padding-top:9px" >Option-10</label>'+
                                    '<input type="text"  name="item_en_mc1_10" class="form-control" id="item_en_mc1_10"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc1_10" class="col-sm-12 control-label urdufont-right" style="text-align:right;">آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc1_10" class="form-control" id="item_ur_mc1_10"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc1_10" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc1_10" class="form-control" id="item_pic_mc1_10" placeholder="" >'+
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
                                    '<input type="text"  name="item_en_mc2_a" class="form-control" id="item_en_mc2_a"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_a" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_a" class="form-control" id="item_ur_mc2_a"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_a" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_a" class="form-control" id="item_pic_mc2_a" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_b" class="control-label" style="padding-top:9px">Option-b</label>'+
                                    '<input type="text"  name="item_en_mc2_b" class="form-control" id="item_en_mc2_b"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_b" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_b" class="form-control" id="item_ur_mc2_b"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                   '<label for="item_pic_mc2_b" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_b" class="form-control" id="item_pic_mc2_b" placeholder="" >'+
                               ' </div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_c" class="control-label" style="padding-top:9px">Option-c</label>'+
                                    '<input type="text"  name="item_en_mc2_c" class="form-control" id="item_en_mc2_c"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_c" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_c" class="form-control" id="item_ur_mc2_c"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_c" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_c" class="form-control" id="item_pic_mc2_c" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_d" class="control-label" style="padding-top:9px">Option-d</label>'+
                                    '<input type="text"  name="item_en_mc2_d" class="form-control" id="item_en_mc2_d"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_d" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_d" class="form-control" id="item_ur_mc2_d"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_d" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_d" class="form-control" id="item_pic_mc2_d" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_e" class="control-label" style="padding-top:9px">Option-e</label>'+
                                    '<input type="text"  name="item_en_mc2_e" class="form-control" id="item_en_mc2_e"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_e" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_e" class="form-control" id="item_ur_mc2_e"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_e" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_e" class="form-control" id="item_pic_mc2_e" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                   '<label for="item_en_mc2_f" class="control-label" style="padding-top:9px">Option-f</label>'+
                                    '<input type="text"  name="item_en_mc2_f" class="form-control" id="item_en_mc2_f"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_f" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_f" class="form-control" id="item_ur_mc2_f"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_f" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_f" class="form-control" id="item_pic_mc2_f" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_g" class="control-label" style="padding-top:9px">Option-g</label>'+
                                    '<input type="text"  name="item_en_mc2_g" class="form-control" id="item_en_mc2_g"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_g" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_g" class="form-control" id="item_ur_mc2_g"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_g" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_g" class="form-control" id="item_pic_mc2_g" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_h" class="control-label" style="padding-top:9px">Option-h</label>'+
                                    '<input type="text"  name="item_en_mc2_h" class="form-control" id="item_en_mc2_h"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_h" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_h" class="form-control" id="item_ur_mc2_h"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_h" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_h" class="form-control" id="item_pic_mc2_h" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_i" class="control-label" style="padding-top:9px">Option-i</label>'+
                                    '<input type="text"  name="item_en_mc2_i" class="form-control" id="item_en_mc2_i"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_i" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_i" class="form-control" id="item_ur_mc2_i"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_i" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_i" class="form-control" id="item_pic_mc2_i" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                            '<div class="container" ><table width="100%"><tr><td style="border-bottom: 2px solid #CCC; padding-top:5px"></td></tr></table></div>'+
                            '<div class="row" style="margin-bottom:5px">'+
                                '<div class="col-4">'+
                                    '<label for="item_en_mc2_j" class="control-label" style="padding-top:9px">Option-j</label>'+
                                    '<input type="text"  name="item_en_mc2_j" class="form-control" id="item_en_mc2_j"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_ur_mc2_j" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> آپشن</label>'+
                                    '<input type="text"  name="item_ur_mc2_j" class="form-control" id="item_ur_mc2_j"  dir="rtl" lang="ur"  >'+
                                '</div>'+
                                '<div class="col-4">'+
                                    '<label for="item_pic_mc2_j" class="control-label"  style="padding-top:5px">Image</label>'+
                                    '<input type="file" name="item_pic_mc2_j" class="form-control" id="item_pic_mc2_j" placeholder="" >'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    <!---------------for column-2 ends here-------------------->
                    <!---------------answer column here here-------------------->
                    '<div class="col-2">'+
                            '<div class="row" id="item_mc_ans_key">'+
                                '<div class="col-6"><label for="item_mc_ans_key" class="control-label"><h3>Answer</h3></label></div>'+
                                '<div class="col-6 urdufont-right" style="text-align:right"><h3>جواب</h3></div>'+
                            '</div>'+
                            '<div class="row borders" style="padding:10px 0px 0px 10px; margin-top:-10px">'+
                                '<div class="row col-12">'+
									'<label for="item_mc_ans_key_1" class="control-label"> Answer of 1 is</label>'+
                                    '<select name="item_mc_ans_key_1" class="form-control form-group" id="item_mc_ans_key_1" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+

                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>'+
								'<div class="row col-12">'+
									'<label for="item_mc_ans_key_2" class="control-label"> Answer of 2 is</label>'+
                                    '<select name="item_mc_ans_key_2" class="form-control form-group" id="item_mc_ans_key_2" >'+
									  '<option value="">-Selected Answer-</option>'+
                                      '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_3" class="control-label"> Answer of 3 is</label>'+
									'<select name="item_mc_ans_key_3" class="form-control form-group" id="item_mc_ans_key_3" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_4" class="control-label"> Answer of 4 is</label>'+
									'<select name="item_mc_ans_key_4" class="form-control form-group" id="item_mc_ans_key_4" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_5" class="control-label"> Answer of 5 is</label>'+
									'<select name="item_mc_ans_key_5" class="form-control form-group" id="item_mc_ans_key_5" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_6" class="control-label"> Answer of 6 is</label>'+
									'<select name="item_mc_ans_key_6" class="form-control form-group" id="item_mc_ans_key_6" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_7" class="control-label"> Answer of 7 is</label>'+
									'<select name="item_mc_ans_key_7" class="form-control form-group" id="item_mc_ans_key_7" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_8" class="control-label"> Answer of 8 is</label>'+
									'<select name="item_mc_ans_key_8" class="form-control form-group" id="item_mc_ans_key_8" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_9" class="control-label"> Answer of 9 is</label>'+
									'<select name="item_mc_ans_key_9" class="form-control form-group" id="item_mc_ans_key_9" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                                '<div class="container" style="margin:-12px 0px 10px 0px"><table width="96%"><tr><td style="border-bottom: 2px solid #CCC;"></td></tr></table></div>'+
                                <!------------------------------------------------------>
                                '<div class="row col-12">'+
                                    '<label for="item_mc_ans_key_10" class="control-label"> Answer of 10 is</label>'+
									'<select name="item_mc_ans_key_10" class="form-control form-group" id="item_mc_ans_key_10" >'+
                                      '<option value="">-Selected Answer-</option>'+
									  '<option value="a">Option-a</option>'+
                                      '<option value="b">Option-b</option>'+
                                      '<option value="c">Option-c</option>'+
                                      '<option value="d">Option-d</option>'+
                                      '<option value="e">Option-e</option>'+
                                      '<option value="f">Option-f</option>'+
                                      '<option value="g">Option-g</option>'+
                                      '<option value="h">Option-h</option>'+
                                      '<option value="i">Option-i</option>'+
                                      '<option value="j">Option-j</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
$('#item_type').on('change', function() {
	if ( this.value == 'MCQ' ) 
	{
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
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
		/*item_option_d_en*/
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
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
	} 
	else if ( this.value == 'ERQ' ) 
	{
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
		
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
	} 
	
	else if ( this.value == 'FIB' ) 
	{
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
CKEDITOR.config.allowedContent = true;
		
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
CKEDITOR.config.allowedContent = true;
		
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
	} 
	
	else if ( this.value == 'TF' ) 
	{
		$( '#MCQ_block' ).hide();
		$( '#ERQ_block' ).hide();
		$( '#FIB_block' ).hide();
		$( '#TF_block' ).show();
		$( '#TF_block' ).empty();
		$( '#TF_block' ).append(TF_content);
		$( '#MC_block' ).hide();
		
	} 
	
	else if ( this.value == 'MC' ) 
	{
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
CKEDITOR.config.allowedContent = true;
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
CKEDITOR.config.allowedContent = true;
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
    $('#item_code').val("");
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

$('#item_type').on('change', function() {
	
	$('#item_grade_id').val("");
	$('#item_subject_id').val("");
	$('#item_cstand_id').val("");
	$('#item_code').val("");
	
});
$('#item_subject_id').on('change', function() {
	if($('#item_type').val() == '')
	{
		alert('Please select Item Type First!!!');
		this.value = '';
		$('#item_type').focus();		
		return false;
	}
	
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
    });});
/*	
if($("#item_image_position").val() == "Full_Page")
{    
	$("#item_stem_en").attr("required", false);
}*/
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

/*$(function () {
	$("#MCQ").hide();
	$("#ERQ").hide();
	$("#FIB").hide();
	$("#TF").hide();
	$("#MC").hide();
	$('#item_type').on('change', function() {
		$("#MCQ").hide();
		$("#ERQ").hide();
		$("#FIB").hide();
		$("#TF").hide();
		$("#MC").hide();
		$("#"+this.value).show();
	});
});*/


function check_MC_values() 
{
	if($('#item_type').val()=='MC')
	{
	
	if(check_MC_valuesxz(1,'a')==false || check_MC_valuesxz(2,'b')==false)
	{
		alert('First Two Columns Required!!');
		return false;
	}
	
	if(check_MC_valuesx(1,'a')==false || check_MC_valuesx(2,'b')==false || check_MC_valuesx(3,'c')==false || check_MC_valuesx(4,'d')==false || check_MC_valuesx(5,'e')==false || check_MC_valuesx(6,'f')==false || check_MC_valuesx(7,'g')==false || check_MC_valuesx(8,'h')==false || check_MC_valuesx(9,'i')==false || check_MC_valuesx(10,'j')==false )
	{
		return false;
		}
	else
		return true;
	}	
}

function check_MC_valuesxz(x1,xa) 
{
	var col1 = 0;
	var col2 = 0;
	var col3 = 0;		
	
	if ( ($( '#item_en_mc1_'+x1 ).val() != '' || $( '#item_ur_mc1_'+x1 ).val() != '' || $( '#item_pic_mc1_'+x1 ).val() != '' ) )
	{
		col1 = 1;		
	}
	if($( '#item_en_mc2_'+xa ).val() != '' || $( '#item_ur_mc2_'+xa ).val() != '' || $( '#item_pic_mc2_'+xa ).val() != '')
	{
		col2 = 1;
	}
	if ( $( '#item_mc_ans_key_'+x1 ).val() != '')
	{
		col3 = 1;
	}
	if( (col1 == 1 && col2 == 1 && col3 == 1))
	{
		return true;
	}
	else
	{
		alert("Value Missing in Columns!");
		return false;
	}
	//return false;
}//rnf check_mc_values



function check_MC_valuesx(x1,xa) 
{
	var col1 = 0;
	var col2 = 0;
	var col3 = 0;		
	
	if ( ($( '#item_en_mc1_'+x1 ).val() != '' || $( '#item_ur_mc1_'+x1 ).val() != '' || $( '#item_pic_mc1_'+x1 ).val() != '' ) )
	{
		col1 = 1;		
	}
	if($( '#item_en_mc2_'+xa ).val() != '' || $( '#item_ur_mc2_'+xa ).val() != '' || $( '#item_pic_mc2_'+xa ).val() != '')
	{
		col2 = 1;
	}
	if ( $( '#item_mc_ans_key_'+x1 ).val() != '')
	{
		col3 = 1;
	}
	
	if((col1 == 0 && col2 == 0 && col3 == 0) || (col1 == 1 && col2 == 1 && col3 == 1))
	{
		//alert('ok');
		return true;
	}
	else
	{
		alert("Value Missing in Columns!");
		return false;
	}
	
	//return false;
}//rnf check_mc_values
</script> 
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script> 