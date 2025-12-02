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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; SS Ungrouped Items List (Searched)</h3>
        </div>
        <div class="d-inline-block float-right">
          <?php /*?><div class="btn-group margin-bottom-20"> 
			<a href="<?= base_url() ?>admin/items/create_items_pdf" class="btn btn-secondary" style="margin:05px">Export as PDF</a>
          </div> 
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/export_items_csv" class="btn btn-secondary" style="margin:05px">Export as CSV</a>
          </div><?php */?>         
        
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/items/rev_ss_ungroup_items_search'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
              <div class="row" style="width:100%">
              <div class ="col-1">Search :</div>
              <div class ="col-10">
              	<div class ="row">
                	<div class ="col-4">
                    	<select name="search_grade" class="form-control form-group" id="search_grade"  style="width:100%" required>						
                          <option value="">---All Grades---</option>
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
                    <div class ="col-4">
                    	<select name="search_subject" class="form-control form-group" id="search_subject"  style="width:100%" required>						
                          <option value="">---All Subjects---</option>
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
                    <div class ="col-4">
                    	<select name="item_writers" class="form-control form-group" id="item_writers"  style="width:100%">						
                          <option value="">-All Itemwriters-</option>
                            <?php							
                            foreach($itemwriters as $itemwriters)
                            {
                              $sel = "";								
                              if(isset($item_writers) && $item_writers == $itemwriters['admin_id']) { $sel = 'selected="selected"'; }
                              echo '<option value="'.$itemwriters['admin_id'].'"  '.$sel.' >'.$itemwriters['firstname'].' '.$itemwriters['lastname'].' ('.$itemwriters['username'].')</option>';
                            }
                            ?>
                         </select>
                    </div>
                </div>
              </div>
              <div class ="col-1"> <input type="submit" id="submit_search" name="submit_search" class="btn btn-success" value="Search" /></div> 
              </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>Sr.#</th>
              <th>ItemWriter</th>              
			  <th>SubCS No.</th>
			  <th>SLO No.</th>
			  <th>Type</th>
              <th>Items Code</th>
              <th>Items (Eng)</th>
              <th>Items (Urdu)</th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Stauts</th>
              <th width="4%" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>  
</div>
<?php
$param1 = (isset($search_grade)&&$search_grade!="")?$search_grade:0;
$param2 = (isset($search_subject)&&$search_subject!="")?$search_subject:0;
$param3 = (isset($item_writers)&&$item_writers!="")?$item_writers:0;
//die($param1.'_'.$param2.'_'.$param3);
?>

<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/items/datatable_json_rev_ss_ungroup_items_list_searched/'.$param1.'_'.$param2.'_'.$param3);?>",//datatable_json_rev_ss_ungroup_items_list
  //  "order": [[1,'desc']],     
    "columnDefs": [
   		{ "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    	{ "targets": 1, "name": "firstname", 'searchable':true, 'orderable':true},
    	{ "targets": 2, "name": "subcs_number", 'searchable':true, 'orderable':true},
    	{ "targets": 3, "name": "slo_number", 'searchable':true, 'orderable':true},
		{ "targets": 4, "name": "item_type", 'searchable':true, 'orderable':true},
    	{ "targets": 5, "name": "item_code", 'searchable':true, 'orderable':true},
    	{ "targets": 6, "name": "item_stem_en", 'searchable':true, 'orderable':true},
		{ "targets": 7, "name": "item_stem_ur", 'searchable':true, 'orderable':true},
		{ "targets": 8, "name": "grade_code", 'searchable':true, 'orderable':true},
    	{ "targets": 9, "name": "subject_code", 'searchable':true, 'orderable':true},
		{ "targets": 10, "name": "item_rev_ss_status", 'searchable':true, 'orderable':true},
		{ "targets": 11, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	"lengthMenu": [[50,75,100,250,500], [50,75,100,250,500]]
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
	  $('#item_writers option:not(:first)').remove();
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
      $('#item_writers option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_writers')
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


