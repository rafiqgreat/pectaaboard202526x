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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Certificates List</h3>
        </div>
        <div class="d-inline-block float-right">
          <a href="<?= base_url('admin/certificate/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Generate New Certificate</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Candidate Name</th>
              <th>Workshop Name</th>
              <th>Workshop Date</th>
              <th>Certificate Created Date</th>
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
    "ajax": "<?=base_url('admin/certificate/datatable_json')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "cf_id", 'searchable':true, 'orderable':false},
    { "targets": 1, "name": "firstname", 'searchable':true, 'orderable':false},
    { "targets": 2, "name": "ws_title", 'searchable':true, 'orderable':false},
    { "targets": 3, "name": "ws_fromdate", 'searchable':true, 'orderable':false},
    { "targets": 4, "name": "cf_createddate", 'searchable':true, 'orderable':false},
    { "targets": 5, "name": "cf_status", 'searchable':true, 'orderable':false},
    { "targets": 6, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],"lengthMenu": [[50,75,100,150,200], [50,75,100,150,200]]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/grades/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Status Changed Successfully", "success");
    });
  });
</script>


