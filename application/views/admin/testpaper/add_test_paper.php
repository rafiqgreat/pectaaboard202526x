<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/chosen/chosen.css">
<style>
.chosen-container { width: 100% !important; }
.urdufont-right {
    font-size: 18px;
}
.mrgfive {
    margin-top: 5px;
    margin-bottom: 5px;
}
@media print {
		.noPrint{
		 display:none;
	  }
    a[href]:after {
        content: none !important;
    }
		.main-footer{
		display: none;
	}
		
	}
</style> 
<div class="content-wrapper">
   <section class="content"> 
      <!-- For Messages -->
      <?php $this->load->view('admin/includes/_messages.php') ?>
      <div class="card">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Generate Test Paper </h3>
            </div>
            <div class="d-inline-block float-right"> 
            	<a href="<?= base_url('admin/testpaper'); ?>" class="btn btn-success"><i class="fa fa-list"></i> List Test Paper</a>
            </div>
         </div>
         <div class="card-body">
				<?php echo form_open(base_url('admin/testpaper/add_test_paper'), 'class="form-horizontal" method="post"');  ?>
            <div class="row" style="width:100%">
               <div class ="col-12" style="font-size:18px; font-weight:bold">Generate Test Paper:</div>
               <div class ="col-12">
                  <div class ="row" style="padding-top:25px">
                     <div class ="col-4">
                        <label for="tp_grade_id" class="control-label">Grade *</label>
                        <select name="tp_grade_id" class="form-control form-group" id="tp_grade_id"  style="width:100%" required="required">
                           <option value="">---Select Grades---</option>
                           <?php							
                              foreach($grades as $grade)
                              {
                                $sel = "";								
                                echo '<option value="'.$grade['grade_id'].'"  '.$sel.' >'.$grade['grade_name_en'].'</option>';
                              }
                            ?>
                        </select>
                     </div>
                     <div class ="col-4">
                        <label for="tp_subject_id" class="control-label">Subject *</label>
                        <select name="tp_subject_id" class="form-control form-group" id="tp_subject_id" style="width:100%" required="required">
                           <option value="">---Select Subjects---</option>
                        </select>
                     </div>
                     <div class ="col-4">
                        <label for="tp_subcstand_id" class="control-label">Chapter</label>
                        <select name="tp_subcstand_id[]" class="form-control form-group" id="tp_subcstand_id" style="width:100%" multiple="multiple" data-placeholder="Select Chapters">
                           <option value="">---Select Chapter---</option>
                        </select>
                        <button class="select mrgfive btn btn-info">Select all</button>
                        <button class="deselect mrgfive btn btn-info">Deselect all</button>
                     </div>
                   </div>
                   <?php /*?><div class ="row">
                   	<div class ="col-12">
                        <label for="tp_slo_id" class="control-label">SLO</label>
                        <select name="tp_slo_id[]" class="form-control form-group" id="tp_slo_id" style="width:100%" multiple="multiple" data-placeholder="Select SLOs">
                        </select>
                        <button class="select mrgfive btn btn-info">Select all</button>
                        <button class="deselect mrgfive btn btn-info">Deselect all</button>
                     </div> 
                  </div><?php */?>
                  <div class ="row">
                     <div class ="col-3">
                        <label for="tp_noofmcq" class="control-label">No. of MCQs *</label>
                        <input class="form-control" type="number" id="tp_noofmcq" name="tp_noofmcq" min="1" value="1" required />
                     </div>
                     <div class ="col-2">
                        <label for="tp_mcq_mark_per_question" class="control-label">Per Question Marks *</label>
                        <input class="form-control" type="number" id="tp_mcq_mark_per_question" name="tp_mcq_mark_per_question" min="1" max="100" value="1" required />
                     </div>
                     <div class ="col-2">
                        <label for="tp_mcq_total_marks" class="control-label">Total Marks *</label>
                        <input class="form-control" type="number" id="tp_mcq_total_marks" name="tp_mcq_total_marks" min="1" max="100" value="1" required />
                     </div>
                     <div class ="col-5">
                        <label for="tp_mcq_heading" class="control-label">Heading MCQ *</label>
                        <input class="form-control" type="text" id="tp_mcq_heading" name="tp_mcq_heading" value="" required />
                     </div>
                  </div>
                  <div class ="row">
                     <div class ="col-3">
                        <label for="tp_noofshortquestions" class="control-label">No. of Short Questions *</label>
                        <input class="form-control" type="number" id="tp_noofshortquestions" name="tp_noofshortquestions" min="1" value="1" required />
                     </div>
                     <div class ="col-2">
                        <label for="tp_sq_mark_per_question" class="control-label">Per Question Marks *</label>
                        <input class="form-control" type="number" id="tp_sq_mark_per_question" name="tp_sq_mark_per_question" min="1" max="100" value="1" required />
                     </div>
                     <div class ="col-2">
                        <label for="tp_sq_total_marks" class="control-label">Total Marks *</label>
                        <input class="form-control" type="number" id="tp_sq_total_marks" name="tp_sq_total_marks" min="1" max="100" value="1" required />
                     </div>
                     <div class ="col-5">
                        <label for="tp_sq_heading" class="control-label">Heading Short Questions *</label>
                        <input class="form-control" type="text" id="tp_sq_heading" name="tp_sq_heading" value="" required />
                     </div>
                  </div>
                  <div class ="row">
                     <div class ="col-3">
                        <label for="tp_nooflongquestions" class="control-label">No. of Long Questions *</label>
                        <input class="form-control" type="number" id="tp_nooflongquestions" name="tp_nooflongquestions" min="1" value="1" required />
                     </div>
                     <div class ="col-2">
                        <label for="tp_lq_mark_per_question" class="control-label">Per Question Marks *</label>
                        <input class="form-control" type="number" id="tp_lq_mark_per_question" name="tp_lq_mark_per_question" min="1" max="100" value="1" required />
                     </div>
                     <div class ="col-2">
                        <label for="tp_lq_total_marks" class="control-label">Total Marks *</label>
                        <input class="form-control" type="number" id="tp_lq_total_marks" name="tp_lq_total_marks" min="1" max="100" value="1" required />
                     </div>
                     <div class ="col-5">
                        <label for="tp_lq_heading" class="control-label">Heading Long Questions *</label>
                        <input class="form-control" type="text" id="tp_lq_heading" name="tp_lq_heading" value="" required />
                     </div>
                  </div>
                  <div class ="row">
                     <div class ="col-12" style="text-align:right"><br />
                        <input type="submit" id="submit" name="submit" class="btn btn-success" value="Generate" style="width:120px; "/>
                     </div>
                  </div>
               </div>
            </div>
            <?php echo form_close( ); ?> 
         </div>
      </div>
      
   </section>
</div> 
<script type="text/javascript">

$('#tp_grade_id').on('change', function() {
      $.post('<?=base_url("admin/testpaper/subjects_by_grade")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  grade_id : this.value
		},
    function(data){
      arr = $.parseJSON(data);     
      $('#tp_subject_id option:not(:first)').remove();
		$('#tp_subcstand_id option:not(:first)').remove();
		$('#tp_slo_id').empty();
		$('#tp_slo_id').trigger('chosen:updated');
      $.each(arr, function(key, value) {           
      $('#tp_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en+'( Grade-'+value.grade_code+')')
                  ); 
        });   
    });		
});

$('#tp_subject_id').on('change', function() {
    $.post('<?=base_url("admin/testpaper/subcstand_by_subjects")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      $('#tp_subcstand_id option:not(:first)').remove();
      $('#tp_slo_id').empty();
      $('#tp_slo_id').trigger('chosen:updated');

      $.each(arr, function(key, value) {           
          $('#tp_subcstand_id')
             .append($("<option></option>")
                        .attr("value", value.subcs_id)
                        .text(value.subcs_number+' '+value.subcs_topic_en+' '+value.subcs_topic_ur)
                      ); 
      });

      // ⭐ IMPORTANT ⭐
      $('#tp_subcstand_id').trigger('chosen:updated');
    });		
});


/*$('#tp_subcstand_id').on('change', function() {
      $.post('< ?=base_url("admin/testpaper/slo_by_subcstand")?>',
		{
		  '< ?php echo $this->security->get_csrf_token_name(); ?>' : '< ?php echo $this->security->get_csrf_hash(); ?>',
		  tp_subcstand_id : this.value
		},
    function(data){
      arr = $.parseJSON(data);
		$('#tp_slo_id').empty();		
      $.each(arr, function(key, value) {           
      $('#tp_slo_id')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_statement_en+' '+value.slo_statement_ur)
                  ); 
        }); 
		  $('#tp_slo_id').trigger('chosen:updated');  
    });		
});*/
</script> 
<script src="<?= base_url()?>assets/plugins/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#tp_subcstand_id").chosen({disable_search_threshold: 10});
		
		$('.select').on('click', function(e){
			e.preventDefault();
			$('#tp_subcstand_id option').prop('selected', true).trigger('chosen:updated');
		});
		
		$('.deselect').on('click', function(e){
			e.preventDefault();
			$("#tp_subcstand_id option:selected").removeAttr("selected").trigger('chosen:updated');
		});
	});	
</script>
