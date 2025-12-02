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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; CRQs Itembanks</h3>
        </div>
        <div class="d-inline-block float-right">
          <?php
		  if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 1)
		  {
			  ?>
          <a href="<?= base_url('admin/itemsbank/crqs_add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Generate CRQs Itembank</a>
          <?php
		  }
		  ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
		  <thead>
            <tr>
              <th>#ID</th>
              <th>Grade</th>
              <th>Subject</th>
			  <th>Blocks</th>
			  <th>Questions</th>
              <th>Created By</th>
              <th>Created Date</th>
              <th>Action/View</th>
			  <th>Answer / Rubrics</th>
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
<script type="text/javascript" language="javascript">
  
	var table = $('#na_datatable').DataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": "<?=base_url('admin/itemsbank/datatable_json_crqs')?>",
	    "order": [[2,'desc']],
		"columnDefs": [
		{ "targets": 0, "name": "ibc_id", 'searchable':false, 'orderable':false},
		{ "targets": 1, "name": "grade_name_en", 'searchable':true, 'orderable':true},
		{ "targets": 2, "name": "subject_name_en", 'searchable':true, 'orderable':true},
		{ "targets": 3, "name": "ibs_crq_blocks", 'searchable':false, 'orderable':false},
		{ "targets": 4, "name": "ibs_crq_bquestions", 'searchable':false, 'orderable':false},	
		{ "targets": 5, "name": "username", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "ibc_created", 'searchable':false, 'orderable':true},
		{ "targets": 7, "name": "Action", 'searchable':false, 'orderable':false,'width':'200px'},
		{ "targets": 8, "name": "Answer", 'searchable':false, 'orderable':false}
		]
	  });
</script>




