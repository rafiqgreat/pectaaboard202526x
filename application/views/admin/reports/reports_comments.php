<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Advance Search </h3>
        </div>
        <div class="d-inline-block float-right">
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/reports/search_reports_comments'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
              <div class="row" style="width:100%">
              <div class ="col-12" style="font-size:18px; font-weight:bold">Advance Search Form:</div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                    <div class ="col-3">
                    	<select name="search_grade" class="form-control form-group" id="search_grade"  style="width:100%" required="required">						
                          <option value="">---Select Grades---</option>
                            <?php							
                              foreach($grades as $grade)
                              {
                                $sel = "";								
                                echo '<option value="'.$grade['grade_id'].'"  '.$sel.' >'.$grade['grade_name_en'].' ('.$grade['grade_name_ur'].')</option>';
                              }
                            ?>
                         </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_subject" class="form-control form-group" id="search_subject"  style="width:100%" required="required">						
                          <option value="">---Select Subjects---</option>
                          <?php							
                            foreach($subjects as $subject)
                            {
                              $sel = "";								
                              echo '<option value="'.$subject['subject_id'].'"  '.$sel.' >'.$subject['subject_name_en'].' (Grade-'.$subject['grade_code'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_status" class="form-control form-group" id="search_status"  style="width:100%">						
                          <option value="">---Select Status---</option>
                          <option value="1">Draft/Pending</option>
                          <option value="2">Submitted</option>
                          <option value="3">Rejected</option>
                          <option value="4">Accepted</option>
                        </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_phase" class="form-control form-group" id="search_phase"  style="width:100%" >						
                          <option value="1">Cycle/Phase-I</option>
                          <option value="2">Cycle/Phase-II</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class ="col-12" style="float:right"> <input type="submit" id="submit_comments" name="submit_comments" class="btn btn-success" value="Search" style="width:120px; float:right"/></div> 
              </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
  </section>  
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script>/*
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "< ?=base_url('admin/items/datatable_jsonp_rev_psy');?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    	{ "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    	{ "targets": 1, "name": "item_batch", 'searchable':true, 'orderable':true},
    	{ "targets": 2, "name": "item_type", 'searchable':true, 'orderable':true},
    	{ "targets": 3, "name": "item_code", 'searchable':true, 'orderable':true},
    	{ "targets": 4, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    	{ "targets": 5, "name": "grade_code", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "subject_code", 'searchable':true, 'orderable':true},
    	{ "targets": 7, "name": "slo_number", 'searchable':true, 'orderable':true},
		{ "targets": 8, "name": "item_rev_ae_status", 'searchable':true, 'orderable':true},
		{ "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	"lengthMenu": [[50,75,100,150, -1], [50,75,100,150, "All"]]
  })*/
</script>

<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/items/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      item_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Item Status Changed Successfully", "success");
    });
  });
	
$('#search_grade').on('change', function() {
      $.post('<?=base_url("admin/reports/subjects_by_grade")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  grade_id : this.value
		},
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#search_subject option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_subject')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en+'( Grade-'+value.grade_code+')')
                  ); 
        });   
    });	
	
});

$('#search_subject').on('change', function() {
      $.post('<?=base_url("admin/reports/iw_by_subjects")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#search_iw option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_iw')
         .append($("<option></option>")
                    .attr("value", value.admin_id)
                    .text(value.firstname+'-'+value.lastname+' ('+value.username+')')
                  ); 
        });   
    });	
});

$('#search_subject').on('change', function() {
      $.post('<?=base_url("admin/reports/ss_by_subjects")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#search_ss option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_ss')
         .append($("<option></option>")
                    .attr("value", value.admin_id)
					.text(value.firstname+'-'+value.lastname+' ('+value.username+')')
                  ); 
        });   
    });	
});

$('#search_subject').on('change', function() {
      $.post('<?=base_url("admin/reports/ae_by_subjects")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#search_ae option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_ae')
         .append($("<option></option>")
                    .attr("value", value.admin_id)
					.text(value.firstname+'-'+value.lastname+' ('+value.username+')')
                  ); 
        });   
    });	
});


function checkFields()
{
	if($('#item_grade_id')=="" && $('#item_subject_id')=="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')!="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')=="" ) { alert('Please select Subject!'); return false; }
}
</script>


