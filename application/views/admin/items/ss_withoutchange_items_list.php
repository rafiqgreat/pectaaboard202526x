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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Items List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/create_items_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/items/export_items_csv" class="btn btn-secondary">Export as CSV</a>
          </div>
          <a href="<?= base_url('admin/items/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Items</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Class Wise</h3>
        </div>
        <div class="d-inline-block" style="float:right">
        
        
        	<?php echo form_open(base_url('admin/items/search'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
            <div class="row">
            	<div class="col-2" style="text-align:right">Search : </div>
                <div class="col-4">
                	<select name="item_grade_id" class="form-control form-group" id="item_grade_id"  style="width:150px">						
						<option value="">--All Grades--</option>
						  <?php							
						  
							foreach($grades as $grade)
							{
								$sel = "";
								if($grade['grade_id'] == $item_grade_id) $sel = 'selected="selected"'; 
								echo '<option value="'.$grade['grade_id'].'"  '.$sel.' >'.$grade['grade_name_en'].'</option>';
							}
                          ?>
                  	</select>
                </div>
				 <div class="col-4">
                	<select name="item_subject_id" class="form-control form-group" id="item_subject_id"  style="width:150px" <?php if($item_grade_id!='') echo 'required'; ?>>
						<option value="">-- Subject--</option>						  
                  	</select>
                </div>
                <div class="col-2"><input type="submit" id="submit" name="submit" class="btn btn-success" value="Search" /></div>
            </div>
            <?php echo form_close( ); ?>
            
            
            
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>Sr.#</th>
              <th>Type</th>
              <th>Items Code</th>
              <th>Items </th>
              <th>Grade-Subject</th>
              <th>SLO Number</th>
              <th width="100" class="text-right">Action</th>
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
    "ajax": "<?=base_url('admin/items/datatable_jsonssawo'.((isset($item_subject_id)&&$item_subject_id!="")?'/'.$item_subject_id:''));?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "item_type", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "item_name_en", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "item_name_ur", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "item_sort", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "item_grade_id", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
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

function checkFields()
{
	if($('#item_grade_id')=="" && $('#item_subject_id')=="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')!="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')=="" ) { alert('Please select Subject!'); return false; }
}
</script>


