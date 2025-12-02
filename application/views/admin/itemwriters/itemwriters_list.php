<!-- DataTables -->
<?php //print_r($_SESSION);?>
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Itemwriters List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/itemwriters/create_itemwriters_pdf" class="btn btn-secondary">Export as PDF</a>
            <?php /*?><a href="<?= base_url() ?>admin/itemwriters/export_csv" class="btn btn-secondary">Export as CSV</a><?php */?>
          </div>
          <?php /*?><a href="<?= base_url('admin/itemwriters/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Itemwriter</a><?php */?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>User Name</th>
              <th>Name</th>
              <th>CNIC</th>
              <th>Mobile & Email</th>
              <th>Subject</th>
              <th>Designation &<br/>Place of Posting</th>
              <th>Deptt. &<br />School Type</th>
              <th>Is Approved</th>
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
    "ajax": "<?=base_url('admin/Itemwriters/datatable_json')?>",
    "order": [[0,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "ci_iw_id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "ci_iw_username", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "ci_iw_fname", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "ci_iw_cnic", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "ci_iw_mobile", 'searchable':true, 'orderable':false},
	{ "targets": 5, "name": "ci_iw_subject", 'searchable':true, 'orderable':true},
	{ "targets": 6, "name": "ci_iw_designation", 'searchable':true, 'orderable':true},
	{ "targets": 7, "name": "ci_iw_deptttype", 'searchable':false, 'orderable':false},
	{ "targets": 8, "name": "loginid", 'searchable':false, 'orderable':false},
    { "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/itemwriters/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      ci_iw_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Status Changed Successfully", "success");
    });
  });
</script>


