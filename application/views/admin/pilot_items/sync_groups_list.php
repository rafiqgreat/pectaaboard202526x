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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Groups List</h3>
        </div>
      </div>
    </div>
    <div class="card">
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Grade Name</th>
              <th>Subject Code</th>
              <th>Subject Name</th>
              <th>Reviewed Groups</th>
              <th>Pilot Groups</th>
              <th>Action</th>
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
	"ajax": "<?=base_url('admin/pilot_items/datatable_json_sync_group')?>",
    
  //  "order": [[1,'desc']],
    "columnDefs": [
    	{ "targets": 0, "name": "grade_id", 'searchable':true, 'orderable':true},
    	{ "targets": 1, "name": "grade_id", 'searchable':true, 'orderable':true},
		{ "targets": 2, "name": "subject_code", 'searchable':true, 'orderable':true},
    	{ "targets": 3, "name": "subject_name_en", 'searchable':true, 'orderable':true},
    	{ "targets": 4, "name": "reviewed_groups", 'searchable':false, 'orderable':false},
		{ "targets": 5, "name": "pilot_groups", 'searchable':false, 'orderable':false},
		{ "targets": 6, "name": "Action", 'searchable':false, 'orderable':false},
    ],	"lengthMenu": [[50,75,100,150,200], [50,75,100,150,200]]
  });
</script>

