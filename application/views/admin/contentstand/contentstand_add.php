  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Content Strand</h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/contentstand'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Content Strand List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/contentstand/add'), 'class="form-horizontal"');  ?> 
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                <label for="cs_grade_id" class="control-label">Select Grade</label>
                <select name="cs_grade_id" class="form-control form-group " id="cs_grade_id"  required>
                  <option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
				  {
					  echo '<option value="'.$grade->grade_id.'">'.$grade->grade_name_en.'</option>';
				  }
				  ?>
                  </select>
				</div>
                <div class="col-lg-6 col-sm-12">
                <label for="cs_subject_id" class="control-label">Select Subject</label>
                <select name="cs_subject_id" class="form-control form-group" id="cs_subject_id"  required>
                  <option value="">--Select Subjects--</option>                  
                  </select>
				</div>
              </div>              
              
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="cs_number" class=" control-label">Content Strand Number</label>
                    <input type="number" name="cs_number" class="form-control form-group" id="cs_number" placeholder="" required="required">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="cs_sort" class="control-label">Sorting/Position</label>
                    <input type="text" name="cs_sort" class="form-control form-group" id="cs_sort" placeholder="" required="required">
                </div>
              </div> 
              
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="cs_statement_en" class="control-label">Content Strand (Eng)</label>
                    <input type="text" name="cs_statement_en" class="form-control form-group" id="cs_statement_en" placeholder="" required="required">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="cs_statement_ur" class="col-lg-12 urdufont-right" style="text-align:right;"> مواد </label>
                    <input type="text" name="cs_statement_ur" class="form-control form-group" id="cs_statement_ur" placeholder="" required="required" dir="rtl">
                </div>
              </div> 
              
              <div class="form-group">
                <label for="cs_status" class="control-label"> Status</label>
                    <select name="cs_status" class="form-control form-group" id="cs_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
              </div>
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Content Strand" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>
    <!-- DataTables -->
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
