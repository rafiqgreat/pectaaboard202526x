<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
<?php
$param1 = (isset($search_grade)&&$search_grade!="")?$search_grade:0;
$param2 = (isset($search_subject)&&$search_subject!="")?$search_subject:0;
$param3 = (isset($search_status)&&$search_status!="")?$search_status:0;
$param4 = (isset($search_phase)&&$search_phase!="")?$search_phase:0;
$param5 = 'pdf';
$param6 = 'csv';
$params_pdf = $param1.'_'.$param2.'_'.$param3.'_'.$param4.'_'.$param5;
$params_csv = $param1.'_'.$param2.'_'.$param3.'_'.$param4.'_'.$param6;
?>
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Advance Search</h3>
        </div>
        <div class="d-inline-block float-right">
        	<a href="<?= base_url()?>admin/reports/create_rep_search_commetns/<?php echo $params_pdf;?>" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url()?>admin/reports/create_rep_search_commetns/<?php echo $params_csv;?>" class="btn btn-secondary">Export as CSV</a>
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
								if(isset($search_grade) && $search_grade == $grade['grade_id']) { $sel = 'selected="selected"'; }								
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
							  if(isset($search_subject) && $search_subject == $subject['subject_id']) { $sel = 'selected="selected"'; }								
                              echo '<option value="'.$subject['subject_id'].'"  '.$sel.' >'.$subject['subject_name_en'].' (Grade-'.$subject['grade_code'].')'.'</option>';
                            }
                          ?>
                        </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_status" class="form-control form-group" id="search_status"  style="width:100%" required="required">						
                          <option value="">---Select Status---</option>
                          <option value="1" <?php if($search_status==1){?> selected="selected"<?php }?>>Draft/Pending</option>
                          <option value="2" <?php if($search_status==2){?> selected="selected"<?php }?>>Submitted</option>
                          <option value="3" <?php if($search_status==3){?> selected="selected"<?php }?>>Rejected</option>
                          <option value="4" <?php if($search_status==4){?> selected="selected"<?php }?>>Accepted</option>
                        </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_phase" class="form-control form-group" id="search_phase"  style="width:100%" required="required">						
                          <option value="1" <?php if($search_phase==1){?> selected="selected"<?php }?>>Cycle/Phase-I</option>
                          <option value="2" <?php if($search_phase==2){?> selected="selected"<?php }?>>Cycle/Phase-II</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class ="col-12" style="float:right"> <input type="submit" id="submit_comments" name="submit_comments" class="btn btn-success" value="Search" style="width:120px; float:right"/></div> 
            </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th width="5%">Sr. #</th>
              <th width="13%">Item Code</th>
              <th width="38%">Stem (E/N)</th>
              <th width="13%">SS Comments</th>
              <th width="13%">AE Comments</th>
              <th width="13%">PSM Comments</th>
              <th width="5%" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section> 
<div class="modal fade" id="confirm-delete-<?php //echo $row['country_id']; ?>" role="dialog">
    <div class="modal-dialog">
        <form action="delete_country.php" method="POST">
        <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_id" id="del_id" value="<?php // echo $row['country_id']; ?>">
                    <p>Are you sure you want to delete this Country?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </form>
    </div>
</div> 
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/reports/datatable_json_rep_com_search/'.$param1.'_'.$param2.'_'.$param3.'_'.$param4);?>",
  //  "order": [[1,'desc']],     
    "columnDefs": [
    { "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "item_code", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "item_comment_ss", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "item_comment_ae", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "item_commentby_psy", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	"lengthMenu": [[50,75,100,150, -1], [50,75,100,150, "All"]]
  });
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
	
	
	
	
	$('#item_grade_id').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
		  
		  
	  if(this.value!= ""){ 
		  $("#item_subject_id").prop('required',true);
	  }
	 else {
		$("#item_subject_id").prop('required',false);	  
	  }
      $('#item_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#item_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
	
});

$('#search_grade').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#search_subject option:not(:first)').remove();
	  $('#search_status option:not(:first)').remove();
	  $('#search_phase option:not(:first)').remove();
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
      $.post('<?=base_url("admin/items/itemwriters_by_subjects")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
	/*	  
	if(this.value!= ""){ 
		  $("#item_submittedby").prop('required',true);
	  }
	 else {
		$("#item_submittedby").prop('required',false);	  
	  }
	  */
      $('#item_submittedby option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_submittedby')
         .append($("<option></option>")
                    .attr("value", value.admin_id)
					.text(value.firstname+'-'+value.lastname+' ('+value.username+')')
                    //.text(value.firstname)
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


