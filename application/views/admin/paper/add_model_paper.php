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
               <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Generate Model Paper </h3>
            </div>
            <div class="d-inline-block float-right"> 
            	<a href="<?= base_url('admin/paper'); ?>" class="btn btn-success"><i class="fa fa-list"></i> List Paper</a>
            </div>
         </div>
         <div class="card-body">
				<?php echo form_open(base_url('admin/paper/add_model_paper'), 'class="form-horizontal" method="post"');  ?>
            <div class="row" style="width:100%">
               <div class ="col-12" style="font-size:18px; font-weight:bold">Generate Model Paper:</div>
               <div class ="col-12">
                  <div class ="row" style="padding-top:25px">
                     <div class ="col-4">
                        <label for="mp_grade_id" class="control-label">Grade *</label>
                        <select name="mp_grade_id" class="form-control form-group" id="mp_grade_id"  style="width:100%" required="required">
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
                        <label for="mp_subject_id" class="control-label">Subject *</label>
                        <select name="mp_subject_id" class="form-control form-group" id="mp_subject_id" style="width:100%" required="required">
                           <option value="">---Select Subjects---</option>
                        </select>
                     </div>
                     <div class ="col-4">
                        <label for="mp_subcstand_id" class="control-label">Chapter *</label>
                        <select name="mp_subcstand_id[]" class="form-control form-group" id="mp_subcstand_id" multiple="multiple" data-placeholder="Select Chapters">
                           <?php /*?><option value="">---Select Chapter---</option><?php */?>
                        </select>
                        <button type="button" class="selectsc mrgfive btn btn-info">Select all</button>
						<button type="button" class="deselectsc mrgfive btn btn-info">Deselect all</button>
                     </div>
                   </div>
                   <div class ="row">
                   	<div class ="col-4" style="display:none;">
                        <label for="mp_slo_id" class="control-label">SLO</label>
                        <select name="mp_slo_id[]" class="form-control form-group" id="mp_slo_id" style="width:100%" multiple="multiple" data-placeholder="Select SLOs">
                        </select>
                        <button type="button" class="select mrgfive btn btn-info">Select all</button>
						<button type="button" class="deselect mrgfive btn btn-info">Deselect all</button>
                     </div> 
                     <div class ="col-4">
                        <label for="mp_noofmcq" class="control-label">No. of MCQs *</label>
                        <input class="form-control" type="number" id="mp_noofmcq" name="mp_noofmcq" min="1" value="1" required />
                     </div>
                     <div class ="col-4">
                        <label for="mp_noofshortquestions" class="control-label">No. of Short Questions *</label>
                        <input class="form-control" type="number" id="mp_noofshortquestions" name="mp_noofshortquestions" min="1" value="1" required />
                     </div>
                     <div class ="col-4">
                        <label for="mp_nooflongquestions" class="control-label">No. of Long Questions *</label>
                        <input class="form-control" type="number" id="mp_nooflongquestions" name="mp_nooflongquestions" min="1" value="1" required />
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

$('#mp_grade_id').on('change', function() {
      $.post('<?=base_url("admin/paper/subjects_by_grade")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  grade_id : this.value
		},
    function(data){
      arr = $.parseJSON(data);     
      $('#mp_subject_id option:not(:first)').remove();
		$('#mp_subcstand_id').empty();
		$('#mp_subcstand_id').trigger('chosen:updated');
		$('#mp_slo_id').empty();
		$('#mp_slo_id').trigger('chosen:updated');
      $.each(arr, function(key, value) {           
      $('#mp_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en+'( Grade-'+value.grade_code+')')
                  ); 
        });   
    });		
});

$('#mp_subject_id').on('change', function() {
      $.post('<?=base_url("admin/paper/subcstand_by_subjects")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  subject_id : this.value
		},
    function(data){
      arr = $.parseJSON(data);     
      $('#mp_subcstand_id').empty();
		$('#mp_subcstand_id').trigger('chosen:updated');
		$('#mp_slo_id').empty();
		$('#mp_slo_id').trigger('chosen:updated');
      $.each(arr, function(key, value) {           
      $('#mp_subcstand_id')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_topic_en+' '+value.subcs_topic_ur)
                  ); 
        });   
		  $('#mp_subcstand_id').trigger('chosen:updated');
    });		
});

/*$('#mp_subcstand_id').on('change', function() {
      $.post('< ?=base_url("admin/paper/slo_by_subcstand")?>',
		{
		  '< ?php echo $this->security->get_csrf_token_name(); ?>' : '< ?php echo $this->security->get_csrf_hash(); ?>',
		  mp_subcstand_id : this.value
		},
    function(data){
      arr = $.parseJSON(data);
		$('#mp_slo_id').empty();		
      $.each(arr, function(key, value) {           
      $('#mp_slo_id')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_statement_en+' '+value.slo_statement_ur)
                  ); 
        }); 
		  $('#mp_slo_id').trigger('chosen:updated');  
    });		
});*/
</script> 
<script src="<?= base_url()?>assets/js/jquery.min.js"></script>
<script src="<?= base_url()?>assets/plugins/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#mp_slo_id").chosen({disable_search_threshold: 10});
		
		$('.select').on('click', function(e){
			e.preventDefault();
			$('#mp_slo_id option').prop('selected', true).trigger('chosen:updated');
		});
		
		$('.deselect').on('click', function(e){
			e.preventDefault();
			$("#mp_slo_id option:selected").removeAttr("selected").trigger('chosen:updated');
		});
		
		$("#mp_subcstand_id").chosen({disable_search_threshold: 10});
		
		$('.selectsc').on('click', function(e){
			e.preventDefault();
			$('#mp_subcstand_id option').prop('selected', true).trigger('chosen:updated');
		});
		
		$('.deselectsc').on('click', function(e){
			e.preventDefault();
			$("#mp_subcstand_id option:selected").removeAttr("selected").trigger('chosen:updated');
		});
		
		$("#submit").on("click", function (e) {
			 // If nothing is selected in chapter select
			 if ($("#mp_subcstand_id").val() == null) {
				  e.preventDefault();
				  alert("Please select at least one chapter.");
				  $("#mp_subcstand_id").trigger("chosen:open"); // open chosen dropdown
				  return false;
			 }
		});
	});	
</script>