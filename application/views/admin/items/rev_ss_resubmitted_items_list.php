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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; SS Re-Submitted Items List</h3>
        </div>
        <div class="d-inline-block float-right">
          <?php /*?><div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/create_items_pdf" class="btn btn-secondary">Export as PDF</a>
          </div>
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/export_items_csv" class="btn btn-secondary">Export as CSV</a>
          </div><?php */?>
           <?php /*?><a href="<?= base_url('admin/items/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New MCQ Item</a>
           <a href="<?= base_url('admin/items/add_erq_crq'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New ERQ/CRQ Item</a><?php */?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>Sr.#</th>
              <?php /*?><th>Batch</th><?php */?>
              <th>Reviewed By</th>
              <th>Type</th>
              <th>Items Code</th>
              <th>Items (Eng)</th>
             <th class="urdufont-right" style="float:right">آئٹم</th>
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


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
	<?php /*base_url('admin/items/datatable_jsonp_rev'.((isset($item_subject_id)&&$item_subject_id!="")?'/'.$item_subject_id:''));*/?>
    "ajax": "<?=base_url('admin/items/datatable_json_rev_ss_resubmitted');?>",
    "order": [[0,'desc']],
    "columnDefs": [
    	{ "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    	<?php /*?>{ "targets": 1, "name": "item_batch", 'searchable':true, 'orderable':true},<?php */?>
    	{ "targets": 1, "name": "firstname", 'searchable':true, 'orderable':true},
    	{ "targets": 2, "name": "item_type", 'searchable':true, 'orderable':true},
    	{ "targets": 3, "name": "item_code", 'searchable':true, 'orderable':true},
    	{ "targets": 4, "name": "item_stem_en", 'searchable':true, 'orderable':true},
		{ "targets": 5, "name": "item_stem_en", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "grade_code", 'searchable':true, 'orderable':true},
    	{ "targets": 7, "name": "subject_code", 'searchable':true, 'orderable':true},
		{ "targets": 8, "name": "item_rev_ss_status", 'searchable':true, 'orderable':true},
		{ "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	"lengthMenu": [[50,75,100,150, 200], [50,75,100,150, 200]]
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
      $.post('<?=base_url("admin/items/itemreviewer_by_subjects")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_reviewedby option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_reviewedby')
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


