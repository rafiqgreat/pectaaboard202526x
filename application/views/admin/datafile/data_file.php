  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block float-right">
            <div class="btn-group margin-bottom-20"> 
              <!--<a href="<?= base_url() ?>admin/imports/sample_data.xlsx" class="btn btn-secondary">Get Sample File SLOs</a>-->
				<?php /*?><a href="<?= base_url() ?>downloads/sample_slos.xlsx" class="btn btn-secondary">Get Sample File SLOs</a><?php */?>
            </div>
          </div>
        </div>
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Create data file from Excel File </h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/datafile/create_data_file'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
              <?php /*?><div class="form-group">                         
                  <label for="imp_grade_id" class="col-sm-12 control-label">Select Grade</label>
                  <select name="imp_grade_id" class="form-control form-group" id="imp_grade_id"  required="required">
                    <option value="">--Select Grades--</option>
                      <?php
					  foreach($grades as $grade)
						  {
							  echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
						  }
					 ?>
                </select> 
              </div>
              <div class="form-group">                         
                  <label for="imp_subject_id" class="col-sm-12 control-label">Select Subject</label>
                  <select name="imp_subject_id" class="form-control form-group" id="imp_subject_id"  required="required">
                    <option value="">--Select Subject--</option>
                  </select> 
              </div><?php */?>
              <div class="form-group">                         
                  <label for="import_file" class="col-sm-12 control-label">Select File</label>
                  <input type="file" name="import_file" class="form-control" id="import_file" placeholder="" >
              </div>
              <div class="form-group">
                  <input type="submit" name="btn_create_df" value="Create Data File" class="btn btn-info pull-right">
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
        <?php /*?><div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Export SLOs data in Excel File </h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/imports/export_file'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
              <div class="form-group">                         
                  <label for="exp_grade_id" class="col-sm-12 control-label">Select Grade</label>
                  <select name="exp_grade_id" class="form-control form-group" id="exp_grade_id"  required="required">
                    <option value="">--Select Grades--</option>
                      <?php
					  foreach($grades as $grade)
						  {
							  echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
						  }
					 ?>
                </select> 
              </div>
              <div class="form-group">                         
                  <label for="exp_subject_id" class="col-sm-12 control-label">Select Subject</label>
                  <select name="exp_subject_id" class="form-control form-group" id="exp_subject_id"  required="required">
                    <option value="">--Select Subject--</option>
                  </select> 
              </div>
              <div class="form-group">
                  <input type="submit" name="submit" value="Export" class="btn btn-info pull-right">
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div><?php */?>
    </section> 
  </div>
  
<?php /*?><script type="text/javascript">  
  $('#imp_grade_id').on('change', function() {
      $.post('<?=base_url("admin/imports/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#imp_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#imp_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   

    });	
});

$('#exp_grade_id').on('change', function() {
      $.post('<?=base_url("admin/imports/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#exp_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#exp_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   

    });	
});
</script><?php */?>