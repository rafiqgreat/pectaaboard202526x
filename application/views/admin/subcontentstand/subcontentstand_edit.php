<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit SubContent Strands </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> SubContent Strand List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/subcontentstand/edit/'.$subcontentstands['subcs_id']), 'class="form-horizontal"' )?>
             
             <div class="form-group row">
                <div class="col-4">
                <label for="subcs_grade_id" class="control-label">Grade</label>
                <select name="subcs_grade_id" class="form-control" id="subcs_grade_id"  required>
                  <option value="">--Select Grades--</option>
                   <?php
                   foreach($grades as $grade)
				  {
					  $selectedText = '';
					  if($subcontentstands['subcs_grade_id']==$grade->grade_id)
					  $selectedText = ' selected="selected" ';
					  echo '<option value="'.$grade->grade_id.'"'.$selectedText.'>'.$grade->grade_name_en.'</option>';
				  }
				  ?>
                  </select>
				</div>
                <div class="col-4">
                <label for="subcs_subject_id" class="control-label">Subject</label>
                <select name="subcs_subject_id" class="form-control" id="subcs_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                  <?php
                   foreach($subjects as $subject)
				  {
					  $selectedText = '';
					  if($subcontentstands['subcs_subject_id']==$subject->subject_id)
					  $selectedText = ' selected="selected" ';
					  echo '<option value="'.$subject->subject_id.'"'.$selectedText.'>'.$subject->subject_name_en.'</option>';
				  }
				  ?>
                </select>
				</div>
                <div class="col-4">
                <label for="subcs_cstand_id" class="control-label">Content Strand</label>
                <select name="subcs_cstand_id" class="form-control" id="subcs_cstand_id"  required>
                  <option value="">--Select Content Strand--</option>
                  <?php
                   foreach($contentstands as $contentstand)
				  {
					  $selectedText = '';
					  if($subcontentstands['subcs_cstand_id']==$contentstand->cs_id)
					  $selectedText = ' selected="selected" ';
					  echo '<option value="'.$contentstand->cs_id.'"'.$selectedText.'>'.$contentstand->cs_statement_en.'</option>';
				  }
				  ?>
                </select>
				</div>
              </div> 
            <div class="form-group row">
                <div class="col-6">
                    <label for="subcs_number" class=" control-label">SubContent Strand No.</label>
                    <input type="text" name="subcs_number" class="form-control" value="<?= $subcontentstands['subcs_number']; ?>" id="subcs_number" placeholder="" required="required">
                </div>
                <div class="col-6">
                    <label for="subcs_sort" class="control-label">SubContent Sort</label>
                    <input type="number" name="subcs_sort" class="form-control" value="<?= $subcontentstands['subcs_sort']; ?>" id="subcs_sort" placeholder="" required="required">
                </div>
              </div> 
              
              <div class="form-group row">
                <div class="col-6">
                    <label for="subcs_topic_en" class="control-label"> Topic (Eng)</label>
                    <input type="text" name="subcs_topic_en" value="<?= $subcontentstands['subcs_topic_en']; ?>" class="form-control" id="subcs_topic_en" placeholder="" required="required">
                </div>
                <div class="col-6">
                    <label for="subcs_topic_ur" class="col-12" style="text-align:right"> موضوع </label>
                    <input type="text" name="subcs_topic_ur" value="<?= $subcontentstands['subcs_topic_ur']; ?>" class="form-control" id="subcs_topic_ur" placeholder="" dir="rtl">
                </div>
              </div> 
              
              <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <label for="subcs_status" class="control-label">Subject Status</label>
                      <select name="subcs_status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" <?= ($subcontentstands['subcs_status'] == 1)?'selected': '' ?> >Active</option>
                        <option value="0" <?= ($subcontentstands['subcs_status'] == 0)?'selected': '' ?>>Deactive</option>
                      </select>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                        <label for="subcs_status" class="control-label">Sub Content Phase</label>
                            <select name="subcs_phase" class="form-control form-group" id="subcs_phase" placeholder="" required="required">
                                <option value="0">Not applicable</option>
                                <option value="1" <?=($subcontentstands['subcs_phase'] == 1) ?'selected' : set_select('subcs_phase',1)?> >phase-1</option>
                                <option value="2" <?=($subcontentstands['subcs_phase'] == 2) ?'selected' : set_select('subcs_phase',2)?>>phase-2</option>
                            </select>
                  </div>
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
$('#subcs_grade_id').on('change', function() {
      $.post('<?=base_url("admin/subcontentstand/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#subcs_subject_id option:not(:first)').remove();
	  $('#subcs_cstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#subcs_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });
});

$('#subcs_subject_id').on('change', function() {
      $.post('<?=base_url("admin/subcontentstand/cstands_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#subcs_cstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#subcs_cstand_id')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_statement_en)
                  ); 
        });   
    });
});

</script>