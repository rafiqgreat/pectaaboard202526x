<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Subjects </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/contentstand'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Content List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/contentstand/edit/'.$contentstand['cs_id']), 'class="form-horizontal"' )?>
             
             <div class="form-group row">
                <div class="col-6">
                <label for="cs_grade_id" class="control-label">Select Grade</label>
                <select name="cs_grade_id" class="form-control" id="cs_grade_id"  required>
                  <option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
				  {
					  $selectedText = '';
					  if($contentstand['cs_grade_id']==$grade->grade_id)
					  $selectedText = ' selected="selected" ';
					  echo '<option value="'.$grade->grade_id.'"'.$selectedText.'>'.$grade->grade_name_en.'</option>';
				  }
				  ?>
                  </select>
				</div>
                <div class="col-6">
                <label for="cs_subject_id" class="control-label">Select Subject</label>
                <select name="cs_subject_id" class="form-control" id="cs_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                  <?php
                   foreach($subjects as $subject)
				  {
					  $selectedText = '';
					  if($contentstand['cs_subject_id']==$subject->subject_id)
					  $selectedText = ' selected="selected" ';
					  echo '<option value="'.$subject->subject_id.'"'.$selectedText.'>'.$subject->subject_name_en.'</option>';
				  }
				  ?>
                  </select>
				</div>
              </div>     
            
            <div class="form-group row">
                <div class="col-6">
                    <label for="cs_number" class=" control-label">Content No.</label>
                    <input type="number" name="cs_number" class="form-control" value="<?= $contentstand['cs_number']; ?>" id="cs_number" placeholder="" required="required">
                </div>
                <div class="col-6">
                    <label for="cs_sort" class="control-label">Content Sort</label>
                    <input type="text" name="cs_sort" class="form-control" value="<?= $contentstand['cs_sort']; ?>" id="cs_sort" placeholder="" required="required">
                </div>
              </div> 
              
              <div class="row">
                <div class="col-6">
                    <label for="cs_statement_en" class="control-label">Content Strand (Eng)</label>
                    <input type="text" name="cs_statement_en" value="<?= $contentstand['cs_statement_en']; ?>" class="form-control" id="cs_statement_en" placeholder="" required="required">
                </div>
                <div class="col-6">
                    <label for="cs_statement_ur" class="col-12" style="text-align:right" > مواد </label>
                    <input type="text" name="cs_statement_ur" value="<?= $contentstand['cs_statement_ur']; ?>" class="form-control" id="cs_statement_ur" placeholder="" required="required" dir="rtl">
                </div>
              </div> 
              
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status</label>
				  <select name="cs_status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($contentstand['cs_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($contentstand['cs_status'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Content" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 
  
  <script src="<?= base_url() ?>/assets/notify.js"></script>
<script type="text/javascript">
$('#cs_grade_id').on('change', function() {
      $.post('<?=base_url("admin/contentstand/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#cs_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#cs_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });
});

</script>