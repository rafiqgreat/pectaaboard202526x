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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Search </h3>
        </div>
        <div class="d-inline-block float-right">
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/reports/admin_ceo_search'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
              <div class="row" style="width:100%">
              <div class ="col-12" style="font-size:18px; font-weight:bold">Advance Search :</div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                	<div class ="col-4">
                    	<select name="search_phase" class="form-control form-group" id="search_phase"  style="width:100%" required="required">						
                          <option value="">---Select Cycle/Phase---</option>
                          <option value="1">Cycle/Phase-I</option>
                          <option value="2">Cycle/Phase-II</option>
                        </select>
                    </div>
                    <div class ="col-4">
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
                    <div class ="col-4">
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
                </div>
              </div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                	<div class ="col-6">
                    	<select name="search_type" class="form-control form-group" id="search_type"  style="width:100%">						
                          <option value="">---Select Item Type---</option>
                          <option value="MCQ">MCQ</option>
                          <option value="ERQ">ERQ</option>
                        </select>
                    </div>
                     <div class="col-lg-6 col-sm-12">  
                        <select name="search_cognitive_bloom" class="form-control form-group" id="search_cognitive_bloom" >
                            <option value="">--Select Bloom/Cognitive--</option>
                            <option value="Knowledge">Knowledge</option>
                            <option value="Comprehension">Comprehension</option>
                            <option value="Application">Application</option>
                            <option value="Analysis">Analysis</option>
                            <option value="Synthesis">Synthesis</option>
                            <option value="Evaluation">Evaluation</option>                  
                        </select>                    
               		</div>
                </div>
              </div>
              
              <div class ="col-12">
              	<div class ="row">
                <div class ="col-12" style="padding-bottom:15px; font-weight:bold">Cycle-1 :</div>
                     <div class ="col-3">
                    	<select name="search_iw" class="form-control form-group" id="search_iw"  style="width:100%">						
                          <option value="">---Select Items Writer---</option>
                          <?php							
                            foreach($iwinfos as $iwinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$iwinfo['admin_id'].'"  '.$sel.' >'.$iwinfo['firstname'].' '.$iwinfo['firstname'].' ('.$iwinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_iw_status" class="form-control form-group" id="search_iw_status" >
                            <option value="">--Select Item Status--</option>
                            <option value="1">Draft</option>
                            <option value="2">Submitted</option>
                            <option value="3">Rejected</option>
                            <option value="4">Accepted</option>
                        </select>                    
               		</div>
                	<div class ="col-3">
                    	<select name="search_ss" class="form-control form-group" id="search_ss"  style="width:100%">						
                          <option value="">---Select SS---</option>
                            <?php							
                              foreach($ssinfos as $ssinfo)
                              {
                                $sel = "";								
                                echo '<option value="'.$ssinfo['admin_id'].'"  '.$sel.' >'.$ssinfo['firstname'].' '.$ssinfo['firstname'].' ('.$ssinfo['username'].')'.'</option>';
                              }
                            ?>
                         </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_iw_status" class="form-control form-group" id="search_iw_status"  >
                            <option value="">--Select SS Items Status--</option>
                            <option value="0">Pending</option>
                            <option value="1">Rejected</option>
                            <option value="2">Accepted</option>
                        </select>                    
               		</div>
                </div>
              </div>
              <div class ="col-12">
              	<div class ="row">
                     <div class ="col-3">
                    	<select name="search_ae" class="form-control form-group" id="search_ae"  style="width:100%">						
                          <option value="">---Select AE---</option>
                          <?php							
                            foreach($aeinfos as $aeinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$aeinfo['admin_id'].'"  '.$sel.' >'.$aeinfo['firstname'].' '.$aeinfo['firstname'].' ('.$aeinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_ae_status" class="form-control form-group" id="search_ae_status"  >
                            <option value="">--Select AE Items Status--</option>
                            <option value="0">Pending</option>
                            <option value="2">Rejected</option>
                            <option value="1">Accepted</option>
                        </select>                    
               		</div>
                	<div class ="col-3">
                    	<select name="search_psy" class="form-control form-group" id="search_psy"  style="width:100%">						
                          <option value="">---Select PSM---</option>
                          <?php							
                            foreach($psyinfos as $psyinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$psyinfo['admin_id'].'"  '.$sel.' >'.$psyinfo['firstname'].' '.$psyinfo['firstname'].' ('.$psyinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_psy_status" class="form-control form-group" id="search_psy_status"  >
                            <option value="">--Select PSM Item Status--</option>
                            <option value="0">Pending</option>
                            <option value="1">Reviewed</option>
                        </select>                    
               		</div>
                </div>
              </div>
              
              
              <div class ="col-12">
              	<div class ="row">
                <div class ="col-12" style="padding-bottom:15px; font-weight:bold">Cycle-2 :</div>
                     <div class ="col-3">
                    	<select name="search_ir_rev" class="form-control form-group" id="search_ir_rev"  style="width:100%">						
                          <option value="">---Select Items Reviewer---</option>
                          <?php							
                            foreach($irinfos as $irinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$irinfo['admin_id'].'"  '.$sel.'>'.$irinfo['firstname'].' '.$irinfo['firstname'].' ('.$irinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_ir_status" class="form-control form-group" id="search_ir_status"  >
                            <option value="">--Select Reviewer Items Status--</option>
                            <option value="0">Pending</option>
                            <option value="1">Under Review</option>
                            <option value="2">Submitted</option>
                        </select>                    
               		</div>
                	<div class ="col-3">
                    	<select name="search_ss_rev" class="form-control form-group" id="search_ss_rev"  style="width:100%">						
                          <option value="">---Select SS---</option>
                            <?php							
                              foreach($ssinfos as $ssinfo)
                              {
                                $sel = "";								
                                echo '<option value="'.$ssinfo['admin_id'].'"  '.$sel.' >'.$ssinfo['firstname'].' '.$ssinfo['firstname'].' ('.$ssinfo['username'].')'.'</option>';
                              }
                            ?>
                         </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_ss_status_rev" class="form-control form-group" id="search_ss_status_rev"  >
                            <option value="">--Select SS Items Status--</option>
                            <option value="0">Pending</option>
                            <option value="1">Rejected</option>
                            <option value="2">Accepted</option>
                        </select>                    
               		</div>
                </div>
              </div>
              <div class ="col-12">
              	<div class ="row">
                     <div class ="col-3">
                    	<select name="search_ae_rev" class="form-control form-group" id="search_ae_rev"  style="width:100%">						
                          <option value="">---Select AE---</option>
                          <?php							
                            foreach($aeinfos as $aeinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$aeinfo['admin_id'].'"  '.$sel.' >'.$aeinfo['firstname'].' '.$aeinfo['firstname'].' ('.$aeinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_ae_status_rev" class="form-control form-group" id="search_ae_status_rev"  >
                            <option value="">--Select AE Items Status--</option>
                            <option value="0">Pending</option>
                            <option value="2">Rejected</option>
                            <option value="1">Accepted</option>
                        </select>                    
               		</div>
                	<div class ="col-3">
                    	<select name="search_psy_rev" class="form-control form-group" id="search_psy_rev"  style="width:100%">						
                          <option value="">---Select PSM---</option>
                          <?php							
                            foreach($psyinfos as $psyinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$psyinfo['admin_id'].'"  '.$sel.' >'.$psyinfo['firstname'].' '.$psyinfo['firstname'].' ('.$psyinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-3">  
                        <select name="search_psy_status_rev" class="form-control form-group" id="search_psy_status_rev"  >
                            <option value="">--Select PSM Items Status--</option>
                            <option value="0">Pending</option>
                            <option value="1">Reviewed</option>
                        </select>                    
               		</div>
                </div>
              </div>
             <?php /*?> <div class ="col-12">
              	<div class ="row">
                	<div class ="col-4">
                    	<select name="search_type" class="form-control form-group" id="search_type"  style="width:100%">						
                          <option value="">---Select Item Type---</option>
                          <option value="MCQ">MCQ</option>
                          <option value="ERQ">ERQ</option>
                        </select>
                    </div>
                     <div class ="col-4">
                    	<select name="search_iw" class="form-control form-group" id="search_iw"  style="width:100%">						
                          <option value="">---Select Items Writer---</option>
                          <?php							
                            foreach($iwinfos as $iwinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$iwinfo['admin_id'].'"  '.$sel.' >'.$iwinfo['firstname'].' '.$iwinfo['firstname'].' ('.$iwinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                	<div class ="col-4">
                    	<select name="search_ss" class="form-control form-group" id="search_ss"  style="width:100%">						
                          <option value="">---Select SS---</option>
                            <?php							
                              foreach($ssinfos as $ssinfo)
                              {
                                $sel = "";								
                                echo '<option value="'.$ssinfo['admin_id'].'"  '.$sel.' >'.$ssinfo['firstname'].' '.$ssinfo['firstname'].' ('.$ssinfo['username'].')'.'</option>';
                              }
                            ?>
                         </select>
                    </div>
                </div>
              </div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                    <div class ="col-4">
                    	<select name="search_ae" class="form-control form-group" id="search_ae"  style="width:100%">						
                          <option value="">---Select AE---</option>
                          <?php							
                            foreach($aeinfos as $aeinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$aeinfo['admin_id'].'"  '.$sel.' >'.$aeinfo['firstname'].' '.$aeinfo['firstname'].' ('.$aeinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                	<div class ="col-4">
                    	<select name="search_psy" class="form-control form-group" id="search_psy"  style="width:100%">						
                          <option value="">---Select PSM---</option>
                          <?php							
                            foreach($psyinfos as $psyinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$psyinfo['admin_id'].'"  '.$sel.' >'.$psyinfo['firstname'].' '.$psyinfo['firstname'].' ('.$psyinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
              </div><?php */?>
              <div class ="col-12" style="float:right"> <input type="submit" id="submit_ceo" name="submit_ceo" class="btn btn-success" value="Search" style="width:120px; float:right"/></div> 
              </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
    <?php /*?><div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/items/admin_ceo_search_rev'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
              <div class="row" style="width:100%">
              <div class ="col-12">Search : (Batch-II)</div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                	<div class ="col-4">
                    	<select name="search_grade_rev" class="form-control form-group" id="search_grade_rev"  style="width:100%">						
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
                    <div class ="col-4">
                    	<select name="search_subject_rev" class="form-control form-group" id="search_subject_rev"  style="width:100%">						
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
                    <div class ="col-4">
                    	<select name="search_type_rev" class="form-control form-group" id="search_type_rev"  style="width:100%">						
                          <option value="">---Select Item Type---</option>
                          <option value="MCQ">MCQ</option>
                          <option value="ERQ">ERQ</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                     <div class ="col-4">
                    	<select name="search_iw_rev" class="form-control form-group" id="search_iw_rev"  style="width:100%">						
                          <option value="">---Select Items Reviewer---</option>
                          <?php							
                            foreach($irinfos as $irinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$irinfo['admin_id'].'"  '.$sel.' >'.$irinfo['firstname'].' '.$irinfo['firstname'].' ('.$irinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                	<div class ="col-4">
                    	<select name="search_ss_rev" class="form-control form-group" id="search_ss_rev"  style="width:100%">						
                          <option value="">---Select SS---</option>
                            <?php							
                              foreach($rev_ssinfos as $rev_ssinfo)
                              {
                                $sel = "";								
                                echo '<option value="'.$rev_ssinfo['admin_id'].'"  '.$sel.' >'.$rev_ssinfo['firstname'].' '.$rev_ssinfo['firstname'].' ('.$rev_ssinfo['username'].')'.'</option>';
                              }
                            ?>
                         </select>
                    </div>
                    <div class ="col-4">
                    	<select name="search_ae_rev" class="form-control form-group" id="search_ae_rev"  style="width:100%">						
                          <option value="">---Select AE---</option>
                          <?php							
                            foreach($rev_aeinfos as $rev_aeinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$rev_aeinfo['admin_id'].'"  '.$sel.' >'.$rev_aeinfo['firstname'].' '.$rev_aeinfo['firstname'].' ('.$rev_aeinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
              </div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                	<div class ="col-4">
                    	<select name="search_psy_rev" class="form-control form-group" id="search_psy_rev"  style="width:100%">						
                          <option value="">---Select PSM---</option>
                          <?php							
                            foreach($rev_psyinfos as $rev_psyinfo)
                            {
                              $sel = "";								
                              echo '<option value="'.$rev_psyinfo['admin_id'].'"  '.$sel.' >'.$rev_psyinfo['firstname'].' '.$rev_psyinfo['firstname'].' ('.$rev_psyinfo['username'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
              </div>
              <div class ="col-12" style="float:right"> <input type="submit" id="submit_search" name="submit_search" class="btn btn-success" value="Search" style="width:120px; float:right"/></div> 
              </div>
            <?php echo form_close( ); ?>
      </div>
    </div><?php */?>    
    <?php /*?><div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Batch</th>
              <th>Submitted By</th>
              <th>Type</th>
              <th>Items Code</th>
              <th>Items </th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Status</th>
              <th width="4%" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div><?php */?>
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


