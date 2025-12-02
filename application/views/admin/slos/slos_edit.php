  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit SLO </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/slos'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  SLOs List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/slos/edit/'.$slos['slo_id']), 'class="form-horizontal"');  ?> 
              <div class="form-group row">
                <div class="col-3">
                <label for="slo_grade_id" class="col-sm-12 control-label">Grade</label>
                <select name="slo_grade_id" class="form-control" id="slo_grade_id"  required>
                  <option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
					  {
						$selectedText = '';
								  if($grade['grade_id']==$slos['slo_grade_id'])
								  $selectedText = ' selected="selected" ';
						echo '<option value="'.$grade['grade_id'].'" '.$selectedText.'>'.$grade['grade_code'].'</option>';
					  }
                  ?>
                  </select>
				</div>
                <div class="col-3">
                <label for="slo_subject_id" class="col-sm-12 control-label">Subject</label>
                <select name="slo_subject_id" class="form-control" id="slo_subject_id"  required>
                  <option value="">--Select Subject--</option> 
                  <?php
                   foreach($subjects as $subject)
					  {
						$selectedText = '';
								  if($subject['subject_id']==$slos['slo_subject_id'])
								  $selectedText = ' selected="selected" ';
						echo '<option value="'.$subject['subject_id'].'" '.$selectedText.'>'.$subject['subject_name_en'].'</option>';
					  }
                  ?>                
                  </select>
				</div>
              <div class="col-6">
                <label for="slo_cstand_id" class="col-sm-6 control-label">Content Strand</label>
                <select name="slo_cstand_id" class="form-control" id="slo_cstand_id"  required>
                  <option value="">--Select Content Strand--</option>  
                  <?php
                   foreach($cstands as $cstand)
					  {
						$selectedText = '';
								  if($cstand['cs_id']==$slos['slo_cstand_id'])
								  $selectedText = ' selected="selected" ';
						echo '<option value="'.$cstand['cs_id'].'" '.$selectedText.'>'.$cstand['cs_statement_en'].'</option>';
					  }
                  ?>                
                </select>
				      </div>

              </div>
               <div class="form-group">                         
                <div class="col-12">
                <label for="slo_subcstand_id" class="col-sm-6 control-label">Sub Content Strand</label>
                <select name="slo_subcstand_id" class="form-control" id="slo_subcstand_id"  required>
                  <option value="">--Select Sub Content Strand--</option>   
                  <?php
                   foreach($subcstands as $subcstand)
					  {
						$selectedText = '';
								  if($subcstand['subcs_id']==$slos['slo_subcstand_id'])
								  $selectedText = ' selected="selected" ';
						echo '<option value="'.$subcstand['subcs_id'].'" '.$selectedText.'>'.$subcstand['subcs_topic_en'].'</option>';
					  }
                  ?>               
                </select>
				      </div>
              </div>
              <div class="form-group row">                                         
                <div class="col-6">
                <label for="slo_number" class="col-sm-12 control-label">SLO Number</label>
                  <input type="text" name="slo_number" class="form-control" id="slo_number" placeholder="" required="required" value="<?= $slos['slo_number'] ?>">
                </div>
                <div class="col-6">
                <label for="slo_sort" class="col-sm-12 control-label">SLO Sorting/Position</label>
                  <input type="number" name="slo_sort" class="form-control" id="slo_sort" placeholder="" required="required" value="<?= $slos['slo_sort'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="slo_statement_en" class="col-sm-12 control-label">SLO Statement (Eng)</label>
                <div class="col-12">
                  <input type="text" name="slo_statement_en" class="form-control" id="slo_statement_en" placeholder="" required="required" value="<?= $slos['slo_statement_en'] ?>">
                </div>
              </div>
              
              <div class="form-group">
                <label for="slo_statement_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;">ایس ایل او ( اردو )</label>
                <div class="col-12">
                  <input type="text" name="slo_statement_ur" class="form-control urdufont-right" id="slo_statement_ur" placeholder="" dir="rtl" value="<?= $slos['slo_statement_ur'] ?>">
                </div>
              </div>              
             
              <div class="form-group">
                <label for="slo_status" class="col-sm-12 control-label">SLO Status</label>
                <div class="col-12">
                    <select name="slo_status" class="form-control" id="slo_status" placeholder="" required="required">
                        <option value="1" <?= ($slos['slo_status'] == 1)?'selected': '' ?>>Active</option>
                        <option value="0" <?= ($slos['slo_status'] == 0)?'selected': '' ?>>In-Active</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Edit SLO" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>

  <!-- DataTables -->
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script type="text/javascript">
$('#slo_grade_id').on('change', function() {
      $.post('<?=base_url("admin/slos/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#slo_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#slo_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });
});
$('#slo_subject_id').on('change', function() {
      $.post('<?=base_url("admin/slos/cstands_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#slo_cstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#slo_cstand_id')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_statement_en)
                  ); 
        });   
    });
});
$('#slo_cstand_id').on('change', function() {
      $.post('<?=base_url("admin/slos/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#slo_subcstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#slo_subcstand_id')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_topic_en)
                  ); 
        });   
    });
});
</script>
