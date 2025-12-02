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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; SLOs List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/slos/create_slos_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/slos/export_slos_csv" class="btn btn-secondary">Export as CSV</a>
          </div>
          <a href="<?= base_url('admin/slos/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New SLO</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>SLO Number</th>
              <th>SLO Topic(ENG)</th>
              <th>SLO Topic (URDU)</th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Content Strand</th>
              <th>Sub C Strand</th>              
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
    "ajax": "<?=base_url('admin/slos/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "slo_id", 'searchable':true, 'orderable':true},
	{ "targets": 1, "name": "slo_number", 'searchable':true, 'orderable':true},
	{ "targets": 2, "name": "slo_statement_en", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "slo_statement_ur", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "grade_code", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "subject_code", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "cs_statement_en", 'searchable':true, 'orderable':true},
	{ "targets": 7, "name": "subcs_topic_en", 'searchable':true, 'orderable':true},
	{ "targets": 8, "name": "slo_status", 'searchable':true, 'orderable':true},
    { "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/slos/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      slo_id : $(this).data('id'),
      slo_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("SLOs Status Changed Successfully", "success");
    });
  });

</script>


