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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Approve ItemsBanks</h3>
        </div>
        <div class="d-inline-block float-right">
          <?php /*?><div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/approveitembank/create_items_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/approveitembank/export_items_csv" class="btn btn-secondary">Export as CSV</a>
          </div><?php 
          <a href="<?= base_url('admin/approveitembank/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Generate Items Bank</a>
		  */?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Title</th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Year</th>
              <th>Created By</th>
              <th>Created Date</th>
              <th>Approved</th>
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
    "ajax": "<?=base_url('admin/approveitembank/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "ib_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "ib_title", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "grade_name_en", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "subject_name_en", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "ib_year", 'searchable':true, 'orderable':true},
	{ "targets": 5, "name": "username", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "ib_created", 'searchable':true, 'orderable':true},
	{ "targets": 7, "name": "ib_verified", 'searchable':true, 'orderable':true},
    { "targets": 8, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/approveitembank/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      ib_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("ItemsBank Status Changed Successfully", "success");
    });
  });
</script>


