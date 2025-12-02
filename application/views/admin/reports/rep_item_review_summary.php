<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i> Item Review Summary Report</h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/reports/rep_item_review_summary'), 'class="form-horizontal"');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			
			<div class="row">
              	<div class="col-lg-6 col-sm-12">  
					<label for="item_grade_id" class="control-label">Grade </label>
					<select name="item_grade_id" class="form-control form-group" id="item_grade_id"  >
						<option value="">--Select Grades--</option>
                  <?php
                    foreach($grades as $grade)
                    {
                        echo '<option value="'.$grade['grade_id'].'"'.set_select('item_grade_id',$grade['grade_id']).'>'.$grade['grade_name_en'].'</option>';
                    }
				  ?>
                  	</select>                    
                </div>
				<div class="col-lg-6 col-sm-12">                         
                   <label for="item_subject_id" class="control-label">Subject </label>
                <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  >
                  <option value="">--Select Subjects--</option>
                    <?php
                    foreach($subjects as $subject)
                    {
                        echo '<option value="'.$subject['subject_id'].'"'.set_select('item_subject_id',$subject['subject_id']).'>'.$subject['subject_name_en'].'</option>';

                    }
				  ?>
                </select>
                </div>
                 <div class ="col-12" style="float:right"> <input type="submit" id="get_rep" name="get_rep" class="btn btn-success" value="Search" style="width:120px; float:right"/></div> 
              </div>
            <!-- Data table start here--------------------------->
            <?php
            if(isset($_REQUEST['get_rep'])){
            ?>
            <div class="btn-group margin-bottom-20" style="margin-bottom: 20px;"> 
                <a href="<?= base_url() ?>admin/reports/created_item_review_summary_export/PDF/<?=$item_grade_id."/".$item_subject_id?>" class="btn btn-secondary">Export as PDF</a>
                <a href="<?= base_url() ?>admin/reports/created_item_review_summary_export/CSV/<?=$item_grade_id."/".$item_subject_id?>" class="btn btn-secondary">Export as CSV</a>
              </div>
              <div class="table-responsive">
				<table id="na_datatable" class="table table-bordered table-striped" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Grades</th>
							<th>Subjects</th>
							<th>Items</th>
							<th>MCQ Items</th>
							<th>CRQ Items</th>
                            <th>IR Reviewed</th>
                            <th>IR MCQ Reviewed</th>
                            <th>IR ERQ Reviewed</th>
                            <th>IR Pending</th>
                            <th>IR MCQ Pending</th>
                            <th>IR ERQ Pending</th>
							<th>Reviewed</th>
							<th>MCQ Reviewed </th>
							<th>CRQ Reviewed </th>
							<th>SS Pending </th>
							<th>SS MCQ Pending</th>
							<th>SS CRQ Pending</th>
							<th>AE Pending </th>
							<th>AE MCQ Pending</th>
							<th>AE CRQ Pending</th>
						</tr>
					</thead>
				</table>
			</div>
            <?php    
            }
            ?>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
		

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">
$('#item_grade_id').on('change', function() {
	if(this.value < 8)
	{		
		 $('#item_curriculum').val(3);
	}
	else
	{
		 $('#item_curriculum').val(2);
	}
	
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
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

</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<?php
$grade     = (isset($item_grade_id)&&$item_grade_id!="0") ? $item_grade_id : 0;
$subject   = (isset($item_subject_id)&&$item_subject_id!="0") ? $item_subject_id : 0;
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
	//  searching: false,
    "ajax": "<?=base_url('admin/reports/item_review_created_jason/'.$grade.'_'.$subject);?>",
      "columnDefs": [
        { "targets": 0, "name": "subject_gradeid", 'searchable':false, 'orderable':true},
        { "targets": 1, "name": "grade_name_en", 'searchable':true, 'orderable':false},
        { "targets": 2, "name": "subject_name_en", 'searchable':true, 'orderable':false},
        { "targets": 3, "name": "C1_Items", 'searchable':false, 'orderable':false},
        { "targets": 4, "name": "C1_MCQ_Items", 'searchable':false, 'orderable':false},
		{ "targets": 5, "name": "C1_CRQ_Items", 'searchable':false, 'orderable':true},
        { "targets": 6, "name": "C2_IR_Reviewed", 'searchable':false, 'orderable':false},
        { "targets": 7, "name": "C2_IR_MCQ_Reviewed", 'searchable':false, 'orderable':false},
        { "targets": 8, "name": "C2_IR_CRQ", 'searchable':false, 'orderable':false},
          { "targets": 9, "name": "C2_IR_Pending", 'searchable':false, 'orderable':false},
          { "targets": 10, "name": "C2_IR_MCQ_Pending", 'searchable':false, 'orderable':false},
          { "targets": 11, "name": "C2_IR_Pending_ERQ", 'searchable':false, 'orderable':false},
        { "targets": 12, "name": "C2_Reviewed", 'searchable':false, 'orderable':false},
        { "targets": 13, "name": "C2_MCQ_Reviewed", 'searchable':false, 'orderable':false},
		{ "targets": 14, "name": "C2_CRQ_Reviewed", 'searchable':false, 'orderable':false},
        { "targets": 15, "name": "C2_SS_Pending", 'searchable':false, 'orderable':false},
        { "targets": 16, "name": "C2_SS_MCQ_Pending", 'searchable':false, 'orderable':false},
		{ "targets": 17, "name": "C2_SS_CRQ_Pending", 'searchable':false, 'orderable':false},
		{ "targets": 18, "name": "C2_AE_Pending", 'searchable':false, 'orderable':false},
	    { "targets": 19, "name": "C2_AE_MCQ_Pending", 'searchable':false, 'orderable':false},
		{ "targets": 20, "name": "C2_AE_CRQ_Pending", 'searchable':false, 'orderable':false},
    ]
  });
  /*table.buttons().container()
        .appendTo( '#na_datatable .col-md-6:eq(0)' );*/
</script>
