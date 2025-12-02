  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i>

              Add New SubContent Strand</h3>

          </div>

          <div class="d-inline-block float-right">

            <a href="<?= base_url('admin/subcontentstand'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  SubContent Strand List</a>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/subcontentstand/add'), 'class="form-horizontal"');  ?> 

              <div class="row">

                <div class="col-lg-4 col-sm-12">

                <label for="subcs_grade_id" class="control-label">Grade</label>

                <select name="subcs_grade_id" class="form-control form-group" id="subcs_grade_id"  required>

                  <option value="">--Select Grades--</option>

                  <?php

                   foreach($grades as $grade)

				  {

					  echo '<option value="'.$grade->grade_id.'">'.$grade->grade_name_en.' -(ID:'.$grade->grade_id.')</option>';

				  }

				  ?>

                  </select>

				</div>

                <div class="col-lg-4 col-sm-12">

                <label for="subcs_subject_id" class="control-label">Subject</label>

                <select name="subcs_subject_id" class="form-control form-group" id="subcs_subject_id"  required>

                  <option value="">--Select Subjects--</option>

                </select>

				</div>

                <div class="col-lg-4 col-sm-12">

                <label for="subcs_cstand_id" class="control-label">Content Strand</label>

                <select name="subcs_cstand_id" class="form-control form-group" id="subcs_cstand_id"  required>

                  <option value="">--Select Content Strand--</option>

                </select>

				</div>

              </div>              

              

              <div class="row">

                <div class="col-lg-6 col-sm-12">

                    <label for="subcs_number" class=" control-label">SubContent Strand No.</label>

                    <input type="text" name="subcs_number" class="form-control form-group" id="subcs_number" placeholder="" required="required">

                </div>

                <div class="col-lg-6 col-sm-12">

                    <label for="subcs_sort" class="control-label">SubContent Strand Sort</label>

                    <input type="number" name="subcs_sort" class="form-control form-group" id="subcs_sort" placeholder="" required="required">

                </div>

              </div> 

              

              <div class="row">

                <div class="col-lg-6 col-sm-12">

                    <label for="subcs_topic_en" class="control-label">Topic (Eng)</label>

                    <input type="text" name="subcs_topic_en" class="form-control form-group" id="subcs_topic_en" placeholder="" required="required">

                </div>

                <div class="col-lg-6 col-sm-12">

                    <label for="subcs_topic_ur" class="col-12 urdufont-right" style="text-align:right"> موضوع </label>

                    <input type="text" name="subcs_topic_ur" class="form-control form-group" id="subcs_topic_ur" placeholder="" dir="rtl">

                </div>

              </div>
            <div class="row">
               <div class="col-lg-6 col-sm-12">
                <label for="subcs_status" class="control-label">Subject Status</label>
                    <select name="subcs_status" class="form-control form-group" id="subcs_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                 </div>
               <div class="col-lg-6 col-sm-12">
                <label for="subcs_status" class="control-label">Sub Content Phase</label>
                    <select name="subcs_phase" class="form-control form-group" id="subcs_phase" placeholder="" required="required">
                        <option value="0">Not applicable</option>
                        <option value="1" <?=set_select('subcs_phase',1)?> >phase-1</option>
                        <option value="2" <?=set_select('subcs_phase',2)?>>phase-2</option>
                    </select>
                 </div>
            
            </div>
              

              

              <div class="form-group">

                <div class="col-md-12">

                  <input type="submit" name="submit" value="Add SubContent Strand" class="btn btn-info pull-right">

                </div>

              </div>

            <?php echo form_close( ); ?>

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

      $.each(arr, function(key, value) {           

     $('#subcs_subject_id')

         .append($("<option></option>")

                    .attr("value", value.subject_id)

                    .text(value.subject_name_en+" -ID("+value.subject_id+")")

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

                   .text(value.cs_statement_en+value.cs_statement_ur+" -(ID:"+value.cs_id+")")

                  ); 

        });   

    });

});

	

// for removing

	

	$('#subcs_grade_id').val('8');

	$.post('<?=base_url("admin/subcontentstand/subjects_by_grade")?>',

    {

      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

      grade_id : 8

    },

    function(data){

      arr = $.parseJSON(data);     

      console.log(arr);     

      $('#subcs_subject_id option:not(:first)').remove();

      $.each(arr, function(key, value) {           

     $('#subcs_subject_id')

         .append($("<option></option>")

                    .attr("value", value.subject_id)

                    .text(value.subject_name_en+" -(ID:"+value.subject_id+")")

                  ); 

        });   

		 $('#subcs_subject_id').val('38');

		$.post('<?=base_url("admin/subcontentstand/cstands_by_subject")?>',

    {

      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

      subject_id : 38

    },

    function(data){

      arr = $.parseJSON(data);     

      console.log(arr);

      $('#subcs_cstand_id option:not(:first)').remove();

      $.each(arr, function(key, value) {           

     $('#subcs_cstand_id')

         .append($("<option></option>")

                    .attr("value", value.cs_id)

                    .text(value.cs_statement_en+" -(ID:"+value.cs_id+")")

                  ); 

        });   

    });

    });



</script>