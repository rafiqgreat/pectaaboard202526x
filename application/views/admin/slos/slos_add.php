  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New SLO </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/slos'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  SLOs List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/slos/add'), 'class="form-horizontal"');  ?> 
              <div class="row">
                <div class="col-lg-3 col-sm-12">
                <label for="slo_grade_id" class="control-label">Grade</label>
                <select name="slo_grade_id" class="form-control form-group" id="slo_grade_id"  required>
                  <option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
                  {
                    echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_code'].'</option>';
                  }
                  ?>
                  </select>
				</div>
                <div class="col-lg-3 col-sm-12">
                <label for="slo_subject_id" class="control-label">Subject</label>
                <select name="slo_subject_id" class="form-control form-group" id="slo_subject_id"  required>
                  <option value="">--Select Subject--</option>                 
                  </select>
				</div>
              <div class="col-lg-6 col-sm-12">
                <label for="slo_cstand_id" class="control-label">Content Strand</label>
                <select name="slo_cstand_id" class="form-control form-group" id="slo_cstand_id"  required>
                  <option value="">--Select Content Strand--</option>                  
                </select>
				      </div>

              </div>
               <div class="row">                         
                <div class="col-lg-12 col-sm-12">
                <label for="slo_subcstand_id" class="control-label">Sub Content Strand</label>
                <select name="slo_subcstand_id" class="form-control form-group form-group" id="slo_subcstand_id"  required>
                  <option value="">--Select Sub Content Strand--</option>                  
                </select>
				      </div>
              </div>
              <div class="row">                                         
                <div class="col-lg-6 col-sm-12">
                <label for="slo_number" class="control-label">SLO Number</label>
                  <input type="text" name="slo_number" class="form-control form-group" id="slo_number" placeholder="" required="required">
                </div>
                <div class="col-lg-6 col-sm-12">
                <label for="slo_sort" class="control-label">SLO Sorting/Position</label>
                  <input type="number" name="slo_sort" class="form-control form-group" id="slo_sort" placeholder="" required="required" value="0">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                <label for="slo_statement_en" class="col-sm-12 control-label">SLO Statement (Eng)</label>
                <input type="text" name="slo_statement_en" class="form-control form-group" id="slo_statement_en" placeholder="" required="required">
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                <label for="slo_statement_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;">ایس ایل او ( اردو )</label>
                <input type="text" name="slo_statement_ur" class="form-control urdufont-right form-group" id="slo_statement_ur" placeholder="" dir="rtl">
                </div>
              </div>              
             
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                <label for="slo_status" class="col-sm-12 control-label">SLO Status</label>
                    <select name="slo_status" class="form-control form-group " id="slo_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add SLO" class="btn btn-info pull-right">
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
                    .text(value.cs_statement_en+value.cs_statement_ur)
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
                    .text(value.subcs_topic_en+value.subcs_topic_ur)
                  ); 
        });   
    });
});
</script>
