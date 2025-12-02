  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit Header </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/headers'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Headers List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $headers = $headers[0];
			?>
			<?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/headers/edit/'.$headers['h_id']), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return onSubmitFunc();" ');  ?>  
			<input type="hidden" id="headers_edit" name="headers_edit" value="LOGGED-USER" />
			<div class="row form-group">
              	<div class="col-lg-4 col-sm-12">                         
                   <label for="h_grade_id" class="control-label">Grade *</label>
					<select name="h_grade_id" class="form-control form-group" id="h_grade_id"  required>
						<option value="">--Select Grades--</option>
						  <?php
                           foreach($grades as $grade)
                          {
							$selectedText = '';
							if($grade['grade_id']==$headers['h_grade_id'])
							$selectedText = ' selected="selected" ';
							echo '<option value="'.$grade['grade_id'].'" '.$selectedText.'>'.$grade['grade_name_en'].'</option>';
                          }
                          ?>
                  	</select>
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="h_subject_id" class="control-label">Subject *</label>
                <select name="h_subject_id" class="form-control form-group" id="h_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                  <option value="<?php echo $headers['h_subject_id']; ?>" selected="selected"><?php echo $headers['subject_name_en']; ?></option>
                </select>
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="h_paper_type_top" class="control-label">Type *</label>
					<select name="h_paper_type_top" class="form-control form-group" id="h_paper_type_top"  required>
					    <option value="MCQs" <?php if($headers['h_paper_type_top'] == 'MCQs') print 'selected="selected"';?>>MCQ</option>
						<option value="ERQs" <?php if($headers['h_paper_type_top'] == 'ERQs') print 'selected="selected"';?>>CRQ</option>
					</select>
                </div>
             </div>
			<div class="row">
              	<div class="col-lg-12 col-sm-12">  					
					<label for="h_sub_title_marks" class="control-label">Sub Title Marks</label>
					<input type="text" name="h_sub_title_marks" class="form-control form-group" id="h_sub_title_marks" value="<?php print $headers['h_sub_title_marks']; ?>">                   
                </div>
            </div>
			<div class="row">
              	<div class="col-lg-12 col-sm-12">  					
					<label for="h_general_instruction" class="control-label">General Instructions *</label>
					<textarea id="h_general_instruction" name="h_general_instruction" rows="2" cols="50" class="form-control form-group urdufont-right" required="required"><?php echo $headers['h_general_instruction']; ?></textarea>                   
                </div>
              </div>
            <div class="row">
              	<div class="col-lg-6 col-sm-12">  					
					<label for="h_paper_instruction_en" class="control-label" style="padding-top: 10px;">Paper Instructions</label>
					<textarea id="h_paper_instruction_en" name="h_paper_instruction_en" rows="6" cols="50" class="form-control form-group" style="height: 163px;"><?php echo $headers['h_paper_instruction_en']; ?></textarea>                   
                </div>
                <div class="col-lg-6 col-sm-12">  					
					<label for="h_paper_instruction_ur" class="control-label urdufont-right" style="float:right">پیپر ہدایات</label>
					<textarea id="h_paper_instruction_ur" name="h_paper_instruction_ur" rows="4" cols="50" class="form-control form-group urdufont-right" dir="rtl" ><?php echo $headers['h_paper_instruction_ur']; ?></textarea>                   
                </div>
              </div>
            <div class="row">
              	<div class="col-lg-3 col-sm-12">  					
					<label for="h_paper_marks" class="control-label">Paper Marks</label>
					<input type="texy" name="h_paper_marks" class="form-control form-group" id="h_paper_marks" placeholder=""  value="<?php echo $headers['h_paper_marks']; ?>">
					
					<label for="h_paper_marks_ur" class="control-label urdufont-right" style="float:right">کل نمبر</label>
					<input type="text" name="h_paper_marks_ur" class="form-control form-group" id="h_paper_marks_ur" placeholder="" dir="rtl" value="<?php echo $headers['h_paper_marks_ur']; ?>">
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="h_paper_type" class="control-label">Paper Type</label>
					<input type="texy" name="h_paper_type" class="form-control form-group" id="h_paper_type" placeholder=""  value="<?php echo $headers['h_paper_type']; ?>">
					
					<label for="h_paper_type_ur" class="control-label urdufont-right" style="float:right">پرچے کی قسم</label>
					<input type="text" name="h_paper_type_ur" class="form-control form-group" id="h_paper_type_ur" placeholder="" dir="rtl"  value="<?php echo $headers['h_paper_type_ur']; ?>">
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="h_paper_time" class="control-label">Paper Time</label>
					<input type="text" name="h_paper_time" class="form-control form-group" id="h_paper_time" placeholder="" value="<?php echo $headers['h_paper_time']; ?>"> 
					
					<label for="h_paper_time_ur" class="control-label urdufont-right" style="float:right"> پرچے کاوقت</label>
					<input type="text" name="h_paper_time_ur" class="form-control form-group" id="h_paper_time_ur" placeholder=""  value="<?php echo $headers['h_paper_time_ur']; ?>" dir="rtl">
                </div>
                <div class="col-lg-3 col-sm-12">  					
					<label for="h_status" class="control-label">Paper Status *</label>
					<select name="h_status" class="form-control form-group" id="h_status"  required>
                      <option value="1" <?php if ($headers['h_status']=='1'){?> selected="selected" <?php }?>>Active</option>
                      <option value="0" <?php if ($headers['h_status']=='0'){?> selected="selected" <?php }?>>In-Active</option>
                    </select>                    
                </div>
              </div>
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
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
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>