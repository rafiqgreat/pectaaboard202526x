  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate Paper Instructions </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/paperinstructions'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Paper Instructions List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/paperinstructions/add'), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return onSubmitFunc();" ');  ?>  
			<input type="hidden" id="paperinstructions_registration" name="paperinstructions_registration" value="LOGGED-USER" />
			<div class="row form-group">
              	<div class="col-lg-6 col-sm-12">                         
                   <label for="pi_grade_id" class="control-label">Grade *</label>
					<select name="pi_grade_id" class="form-control form-group" id="pi_grade_id"  required>
						<option value="">--Select Grades--</option>
						  <?php
                           foreach($grades as $grade)
                          {
                              echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
                          }
                          ?>
                  	</select>
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="pi_subject_id" class="control-label">Subject *</label>
                <select name="pi_subject_id" class="form-control form-group" id="pi_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                </select>
                </div>
				
             </div>
			<div class="row">
              	<div class="col-lg-12 col-sm-12">  					
					<label for="pi_general_instruction" class="control-label">General Instructions *</label>
					<textarea id="pi_general_instruction" name="pi_general_instruction" rows="2" cols="50" class="form-control form-group" required="required"></textarea>                   
                </div>
              </div>
            <div class="row">
              	<div class="col-lg-6 col-sm-12">  					
					<label for="pi_paper_instruction_en" class="control-label">Paper Instructions </label>
					<textarea id="pi_paper_instruction_en" name="pi_paper_instruction_en" rows="4" cols="50" class="form-control form-group" ></textarea>                   
                </div>
                <div class="col-lg-6 col-sm-12">  					
					<label for="pi_paper_instruction_ur" class="control-label urdufont-right" style="float:right">پیپر ہدایات</label>
					<textarea id="pi_paper_instruction_ur" name="pi_paper_instruction_ur" rows="4" cols="50" class="form-control form-group urdufont-right" dir="rtl" ></textarea>                   
                </div>
              </div>
            <div class="row">
              	<div class="col-lg-3 col-sm-12">  					
					<label for="pi_paper_marks" class="control-label">Paper Marks *</label>
					<input type="number" name="pi_paper_marks" class="form-control form-group" id="pi_paper_marks" placeholder="" >                   
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="pi_paper_type" class="control-label">Paper Type *</label>
					<select name="pi_paper_type" class="form-control form-group" id="pi_paper_type"  >
                      <option value="">--Select Paper Type--</option>
                      <option value="1">MCQs</option>
                    </select>                   
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="pi_paper_time" class="control-label">Paper Time *</label>
					<input type="text" name="pi_paper_time" class="form-control form-group" id="pi_paper_time" placeholder="" required="required">                   
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="pi_status" class="control-label">Paper Status *</label>
					<select name="pi_status" class="form-control form-group" id="pi_status"  required>
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
      CKEDITOR.replace('pi_general_instruction', {
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


$('#pi_grade_id').on('change', function() {
  $.post('<?=base_url("admin/paperinstructions/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#pi_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#pi_subject_id')
         .append($("<option></option>")
			.attr("value", value.subject_id)
			.text(value.subject_name_en)
		  ); 
        });   
    });	
});
$('#pi_subject_id').on('change', function() {
  $.post('<?=base_url("admin/paperinstructions/pheaders_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
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