  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="card card-default color-palette-bo">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"> <i class="fa fa-plus"></i>
            Generate Term Wise Papers</h3>
        </div>
      </div>
      <div class="card-body">
        <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <?php echo form_open(base_url('admin/paper/add_term_wise_papers'), 'class="form-horizontal" method="post"');  ?>
        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <label for="qat_grade_id" class="control-label">Select Paper Grade *</label>
            <select name="qat_grade_id" class="form-control form-group" id="qat_grade_id" required>
              <option value="">--Select Paper Grade--</option>
              <?php foreach($grades as $grade) {
                echo '<option value="'.($grade['ibf_grade_id']).'">'.($grade['ibf_grade_id']-2).'</option>';
              } ?>
            </select>
          </div>
          <div class="col-lg-4 col-sm-12">
            <label for="qat_sub_id" class="control-label">Select Paper Subject *</label>
            <select name="qat_sub_id" class="form-control form-group" id="qat_sub_id" required>
              <option value="">--Select Paper Subject--</option>
            </select>
          </div>
          <div class="col-lg-4 col-sm-12">
            <label for="qat_subcs_phase" class="control-label">Select Terms *</label>
            <select name="qat_subcs_phase" class="form-control form-group" id="qat_subcs_phase" required>
              <option value="0">--Select Term--</option>
              <option value="1">Term-1</option>
              <option value="2">Term-2</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <label for="qat_total_marks" class="control-label">Total Marks *</label>
            <input type="text" name="qat_total_marks" id="qat_total_marks" class="form-control form-group" value="25">
          </div>
          <div class="col-lg-4 col-sm-12">
            <label for="qat_total_time" class="control-label">Total Time *</label>
            <input type="text" name="qat_total_time" id="qat_total_time" class="form-control" value="30">
          </div>
          <div class="col-lg-4 col-sm-12">
            <label for="qat_test_number" class="control-label">Test # *</label>
            <input type="text" name="qat_test_number" id="qat_test_number" class="form-control" value="7 (1st Half)">
          </div>
        </div>

        <!-- Section 1 -->
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <label for="" class="control-label h5"><u>SECTION 1</u></label>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_1_title_en" class="control-label">Section 1 Title (ENG) *</label>
            <input type="text" name="qat_sec_1_title_en" id="qat_sec_1_title_en" class="form-control form-group"  value="SECTION-I">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_1_title_ur" class="control-label">Section 1 Title (UR) *</label>
            <input type="text" name="qat_sec_1_title_ur" id="qat_sec_1_title_ur" class="form-control form-group" value="I-سیکشن">
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_1_statement_eng" class="control-label">Section 1 Statement (ENG) *</label>
            <input type="text" name="qat_sec_1_statement_eng" id="qat_sec_1_statement_eng" class="form-control form-group" value="Q.No.1 Fill the bubble of the correct anwer from the following choices.">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_1_statement_ur" class="control-label">Section 1 Statement (UR) *</label>
            <input type="text" name="qat_sec_1_statement_ur" id="qat_sec_1_statement_ur" class="form-control form-group" value="سوال نبمر 1: درج ذیل میں سے درست جواب کے دائرہ کو بھریں۔">
          </div>
          
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_1_marks" class="control-label">Section 1 Marks *</label>
            <input type="text" name="qat_sec_1_marks" id="qat_sec_1_marks" class="form-control form-group" value="13">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_1_submarks" class="control-label">Section 1 Sub Marks *</label>
            <input type="text" name="qat_sec_1_submarks" id="qat_sec_1_submarks" class="form-control form-group" value="1 x 13">
          </div>
        </div>
<hr />
        <!-- Section 2 -->
         <div class="row">
          <div class="col-lg-12 col-sm-12">
            <label for="" class="control-label h5"><u>SECTION 2</u></label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_2_title_en" class="control-label">Section 2 Title (ENG) *</label>
            <input type="text" name="qat_sec_2_title_en" id="qat_sec_2_title_en" class="form-control form-group" value="SECTION-II">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_2_title_ur" class="control-label">Section 2 Title (UR) *</label>
            <input type="text" name="qat_sec_2_title_ur" id="qat_sec_2_title_ur" class="form-control form-group" value="II-سیکشن">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_2_statement_eng" class="control-label">Section 2 Statement (ENG) *</label>
            <input type="text" name="qat_sec_2_statement_eng" id="qat_sec_2_statement_eng" class="form-control form-group" value="Q.No.1 From the following questions answer any FOUR questions.">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_2_statement_ur" class="control-label">Section 2 Statement (UR) *</label>
            <input type="text" name="qat_sec_2_statement_ur" id="qat_sec_2_statement_ur" class="form-control form-group" value="سوال نمبر 1: درج ذیل سوالات میں سے کسی چار سوالوں کے جواب دیں۔">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_2_marks" class="control-label">Section 2 Marks *</label>
            <input type="text" name="qat_sec_2_marks" id="qat_sec_2_marks" class="form-control form-group" value="8">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_2_submarks" class="control-label">Section 2 Sub Marks *</label>
            <input type="text" name="qat_sec_2_submarks" id="qat_sec_2_submarks" class="form-control form-group" value="2 x 4">
          </div>
        </div>
<hr />		
        <!-- Section 3 -->
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <label for="" class="control-label h5"><u>SECTION 3</u></label>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_3_title_en" class="control-label">Section 3 Title (ENG) *</label>
            <input type="text" name="qat_sec_3_title_en" id="qat_sec_3_title_en" class="form-control form-group" value="SECTION-III">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_3_title_ur" class="control-label">Section 3 Title (UR) *</label>
            <input type="text" name="qat_sec_3_title_ur" id="qat_sec_3_title_ur" class="form-control form-group"value="III-سیکشن">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_3_statement_eng" class="control-label">Section 3 Statement (ENG) *</label>
            <input type="text" name="qat_sec_3_statement_eng" id="qat_sec_3_statement_eng" class="form-control form-group" value=" ">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_3_statement_ur" class="control-label">Section 3 Statement (UR) *</label>
            <input type="text" name="qat_sec_3_statement_ur" id="qat_sec_3_statement_ur" class="form-control form-group" value=" ">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_3_marks" class="control-label">Section 3 Marks *</label>
            <input type="text" name="qat_sec_3_marks" id="qat_sec_3_marks" class="form-control form-group" value="4">
          </div>
          <div class="col-lg-6 col-sm-12">
            <label for="qat_sec_3_submarks" class="control-label">Section 3 Sub Marks *</label>
            <input type="text" name="qat_sec_3_submarks" id="qat_sec_3_submarks" class="form-control form-group" value=" ">
          </div>
        </div>

        <div class="content" id="paper_selection_block">
          <input class="btn btn-info" type="submit" id="submit" name="submit" value="Start Auto Paper Generation &raquo; " disabled="disabled">
        </div>

        <?php echo form_close(); ?>
      </div>
    </div>
  </section>
</div>
   		  
<script language="javascript" type="text/javascript">  
$('#qat_grade_id').on('change', function() {
	//$('#paper_section').val('');
    $.post('<?=base_url("admin/paper/subjects_by_grade_mcq")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
		arr = $.parseJSON(data);     
		console.log(arr.length);     
		$('#qat_sub_id option:not(:first)').remove();
		$('#qat_cs_id option:not(:first)').remove();
		$.each(arr, function(key, value) {           
		$('#qat_sub_id')
		 .append($("<option></option>")
					.attr("value", value.subject_id)
					.text(value.subject_name_en+' - '+value.subject_name_ur)
				  ); 
		});   
    });	
	
});
$('#qat_subcs_phase').on('change', function() {	
	if($('#qat_grade_id').val() == ''){
		alert('Please select grade first!');
		$( '#qat_grade_id' ).focus();
		//$('#paper_section').val('');
		return false;
	}
	if($('#qat_sub_id').val() == ''){
		alert('Please select subject first!');
		$( '#qat_sub_id' ).focus();
		//$('#paper_section').val('');
		return false;
	}
	if($('#qat_subcs_phase').val() == ''){
		alert('Please select term first!');
		$( '#qat_subcs_phase' ).focus();
		//$('#paper_section').val('');
		return false;
	}else{
		$('#submit').prop('disabled', false);	
	}
	
});
/*$("body").on("submit", "form", function() {
    $(this).submit(function() {
        return false;
    });
    return true;
});
	
	var convert = function(convert){
    return $("<span />", { html: convert }).text();
    //return document.createElement("span").innerText;
};*/
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>