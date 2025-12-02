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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Workshops List</h3>
        </div>
        <div class="d-inline-block float-right">
          <a href="<?= base_url('admin/workshop/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Workshop</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Workshop Title</th>
              <th>Workshop Description</th>
              <th>Workshop Date</th>
              <th>Created Date</th>
              <th>Status</th>
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
    "ajax": "<?=base_url('admin/workshop/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "ws_id", 'searchable':true, 'orderable':false},
    { "targets": 1, "name": "ws_title", 'searchable':true, 'orderable':false},
    { "targets": 2, "name": "ws_desc", 'searchable':true, 'orderable':false},
    { "targets": 3, "name": "ws_fromdate", 'searchable':true, 'orderable':false},
    { "targets": 4, "name": "ws_todate", 'searchable':true, 'orderable':false},
    { "targets": 5, "name": "ws_status", 'searchable':true, 'orderable':false},
    { "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],"lengthMenu": [[50,75,100,150,200], [50,75,100,150,200]]
  });
</script>
