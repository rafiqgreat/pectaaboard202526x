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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Rejected Items List By Assesment Expert</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/items/create_items_pdf" class="btn btn-secondary" style="margin:05px">Export as PDF</a>
            <a href="<?= base_url() ?>admin/items/export_items_csv" class="btn btn-secondary" style="margin:05px">Export as CSV</a>
          </div>
         </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        	<?php echo form_open(base_url('admin/items/ae_ritems_search'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
            <div class="row">
            	<div class="col-1" style="text-align:right">Search : </div>
                <div class="col-5">
                	<select name="search_grade" class="form-control form-group" id="search_grade" >						
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
				 <div class="col-5">
                	<select name="search_subject" class="form-control form-group" id="search_subject"  <?php /*if($item_grade_id!='') echo 'required'; */?>>
						<option value="">-- Subject--</option>						  
                  	</select>
                </div>
                <div class="col-1"><input type="submit" id="submit_search" name="submit_search" class="btn btn-success" value="Search" /></div>
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
              <?php /*?><th>Batch</th><?php */?>
              <th>Submitted By</th>
              <th>Type</th>
              <th>Items Code</th>
              <th>Items </th>
              <th>Grade</th>
              <th>Subject</th>
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
    "ajax": "<?=base_url('admin/items/datatable_json_ae_rejected'.((isset($item_subject_id)&&$item_subject_id!="")?'/'.$item_subject_id:''));?>",
    "order": [[0,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
   <?php /*?> { "targets": 1, "name": "item_batch", 'searchable':true, 'orderable':true},<?php */?>
    { "targets": 1, "name": "firstname", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "item_type", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "item_sort", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "item_grade_id", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "item_grade_id", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
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
	
	
	
	
	$('#search_grade').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
		  
		  
	  if(this.value!= ""){ 
		  $("#search_subject").prop('required',true);
	  }
	 else {
		$("#search_subject").prop('required',false);	  
	  }
      $('#search_subject option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_subject')
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


