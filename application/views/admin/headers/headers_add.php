  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate Header </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/headers'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Headers List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/headers/add'), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return onSubmitFunc();" ');  ?>  
			<input type="hidden" id="headers_registration" name="headers_registration" value="LOGGED-USER" />
			<div class="row form-group">
              	<div class="col-lg-4 col-sm-12">                         
                   <label for="h_grade_id" class="control-label">Grade *</label>
					<select name="h_grade_id" class="form-control form-group" id="h_grade_id"  required>
						<option value="">--Select Grades--</option>
						  <?php
                           foreach($grades as $grade)
                          {
                              echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
                          }
                          ?>
                  	</select>
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="h_subject_id" class="control-label">Subject *</label>
					<select name="h_subject_id" class="form-control form-group" id="h_subject_id"  required>
					  <option value="">--Select Subjects--</option>
					</select>
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="h_paper_type_top" class="control-label">Type *</label>
					<select name="h_paper_type_top" class="form-control form-group" id="h_paper_type_top"  required>
					    <option value="MCQs">MCQ</option>
						<option value="ERQs">CRQ</option>
					</select>
                </div>
				
             </div>
			<div class="row">
              	<div class="col-lg-12 col-sm-12">  					
					<label for="h_sub_title_marks" class="control-label">Sub Title Marks</label>
					<input type="text" name="h_sub_title_marks" class="form-control form-group" id="h_sub_title_marks" placeholder="">                   
                </div>
            </div>
			<div class="row">
              	<div class="col-lg-12 col-sm-12">  					
					<label for="h_general_instruction" class="control-label">General Instructions *</label>
					<textarea id="h_general_instruction" name="h_general_instruction" rows="2" cols="50" class="form-control form-group" required="required"></textarea>                   
                </div>
              </div>
            <div class="row">
              	<div class="col-lg-6 col-sm-12">  					
					<label for="h_paper_instruction_en" class="control-label" style="padding-top: 10px;">Paper Instructions </label>
					<textarea id="h_paper_instruction_en" name="h_paper_instruction_en" rows="4" cols="50" class="form-control form-group" style="height: 163px;"></textarea>                   
                </div>
                <div class="col-lg-6 col-sm-12">  					
					<label for="h_paper_instruction_ur" class="control-label urdufont-right" style="float:right">پیپر ہدایات</label>
					<textarea id="h_paper_instruction_ur" name="h_paper_instruction_ur" rows="4" cols="50" class="form-control form-group urdufont-right" dir="rtl" ></textarea>                   
                </div>
              </div>
            <div class="row">
              	<div class="col-lg-3 col-sm-12">  					
					<label for="h_paper_marks" class="control-label">Paper Marks</label>
					<input type="text" name="h_paper_marks" class="form-control form-group" id="h_paper_marks" placeholder="">
					
					<label for="h_paper_marks_ur" class="control-label urdufont-right" style="float:right">کل نمبر</label>
					<input type="text" name="h_paper_marks_ur" class="form-control form-group" id="h_paper_marks_ur" placeholder="" dir="rtl">					
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="h_paper_type" class="control-label">Paper Type</label>
					<input type="text" name="h_paper_type" class="form-control form-group" id="h_paper_type" placeholder="">
					
					<label for="h_paper_type_ur" class="control-label urdufont-right" style="float:right">پرچے کی قسم</label>
					<input type="text" name="h_paper_type_ur" class="form-control form-group" id="h_paper_type_ur" placeholder="" dir="rtl">
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="h_paper_time" class="control-label">Paper Time</label>
					<input type="text" name="h_paper_time" class="form-control form-group" id="h_paper_time" placeholder="">  
					
					<label for="h_paper_time_ur" class="control-label urdufont-right" style="float:right"> پرچے کاوقت</label>
					<input type="text" name="h_paper_time_ur" class="form-control form-group" id="h_paper_time_ur" placeholder="" dir="rtl">
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="h_status" class="control-label">Paper Status *</label>
					<select name="h_status" class="form-control form-group" id="h_status"  required>
                      <option value="1">Active</option>
                      <option value="0">In-Active</option>
                    </select>                    
                </div>
              </div>
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">

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
      CKEDITOR.replace('h_general_instruction', {
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


$('#h_grade_id').on('change', function() {
  $.post('<?=base_url("admin/headers/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#h_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#h_subject_id')
         .append($("<option></option>")
			.attr("value", value.subject_id)
			.text(value.subject_name_en)
		  ); 
        });   
    });	
});
$('#h_subject_id').on('change', function() {
  $.post('<?=base_url("admin/headers/pheaders_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value,
	  type:$('#h_paper_type_top').val()
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);   
      if(arr.length>0){
        $(':input[type="submit"]').prop('disabled', true);
		 alert('Sorry! You have already Added Paper Header / Instructions for this Subject!');
     return false;
	 }
   else{
    $(':input[type="submit"]').prop('disabled', false);
   } 
    });	
});

$('#h_paper_type_top').on('change', function() {
	if($('#h_subject_id').val() == ''){
		alert('Please select the Subject!');
     return false;
	}
  $.post('<?=base_url("admin/headers/pheaders_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : $('#h_subject_id').val(),
	  type:$('#h_paper_type_top').val()
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);   
      if(arr.length>0){
        $(':input[type="submit"]').prop('disabled', true);
		 alert('Sorry! You have already Added Paper Header / Instructions for this Subject!');
     return false;
	 }
   else{
    $(':input[type="submit"]').prop('disabled', false);
   } 
    });	
});
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>