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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Paper Pilot Headers</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <!--<a href="<?= base_url() ?>admin/paperinstruction/create_headers_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/paperinstruction/export_headers_csv" class="btn btn-secondary">Export as CSV</a>-->
          </div>
          <?php
		  if($this->session->userdata('role_id')==2)
		  {
			  ?>
          <a href="<?= base_url('admin/pilotheaders/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Generate Pilot Header</a>
          <?php
		  }
		  ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
			<?php
			if($this->session->userdata('role_id')==1)
			{
			?>
			<thead>
				<tr>
				  <th>#ID</th>
				  <th>Pilot Phase</th>
				  <th>Title</th>
				  <th>Subject English</th>
				  <th>Subject Urdu</th>	
				  <th>General Instructions</th>
				  <th>Action</th>
				</tr>
			  </thead>
			<?php
			}
			elseif($this->session->userdata('role_id')==2)
			{
			?>
			  <thead>
				<tr>
				  <th>#ID</th>
				   <th>Pilot Phase</th>
				  <th>Title</th>
				  <th>Subject English</th>
				  <th>Subject Urdu</th>	
				  <th>General Instructions</th>
				  <th>Action</th>
				</tr>
			  </thead>
			<?php

			}
			else
			{
				?>
			<thead>
				<tr>
				  <th>#ID</th>
				  <th>Pilot Phase</th>
				  <th>Title</th>
				  <th>Subject English</th>
				  <th>Subject Urdu</th>	
				  <th>General Instructions</th>
				  <th>Action</th>
				</tr>
			  </thead>
			<?php
			}	
		?>
        </table>
      </div>
    </div>
  </section>  
</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script type="text/javascript" language="javascript">
  //---------------------------------------------------
	<?php
	if($this->session->userdata('role_id')==1)
		{		
			?>
	var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/pilotheaders/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
   { "targets": 0, "name": "ph_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "ph_phase", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "ph_paper_title", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "ph_paper_subject_en", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "ph_paper_subject_ur", 'searchable':true, 'orderable':true},
	{ "targets": 5, "name": "ph_general_instruction", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],	"lengthMenu": [[50,75,100,150,200], [50,75,100,150,200]]
  });
	
	$("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/pilotheaders/change_status_approve")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      h_id : $(this).data('id'),
      h_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Paper Instruction Status Changed Successfully", "success");
    });
  });
		<?php
		}
		elseif($this->session->userdata('role_id')==2)
		{
		?>
	var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/pilotheaders/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "ph_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "ph_phase", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "ph_paper_title", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "ph_paper_subject_en", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "ph_paper_subject_ur", 'searchable':true, 'orderable':true},
	{ "targets": 5, "name": "ph_general_instruction", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],	"lengthMenu": [[50,75,100,150,200], [50,75,100,150,200]]
  });
	 $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/pilotheaders/change_status_approve")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      ph_id : $(this).data('id'),
      ph_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Paper Instruction Status Changed Successfully", "success");
    });
  });
		<?php
			
		}
		else
		{
		?>
	var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/pioltheaders/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    
    { "targets": 0, "name": "ph_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "ph_phase", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "ph_paper_title", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "ph_paper_subject_en", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "ph_paper_subject_ur", 'searchable':true, 'orderable':true},
	{ "targets": 5, "name": "ph_general_instruction", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],	"lengthMenu": [[50,75,100,150,200], [50,75,100,150,200]]
  });	
		<?php	
		}	
	?>
  
</script>




