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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Item Writers List</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <!--<a href="#" class="btn btn-secondary">Export as PDF</a>&nbsp;
            <a href="#" class="btn btn-secondary">Export as CSV</a>-->
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
		  <!--admin_id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `address`, `last_login`, `is_verify`, `is_active`, `created_at`, `parent_admin_id`, `subjects_ids`, `ci_iw_id`,`ci_iw_fname`, `ci_iw_lname`, `ci_iw_dob`, `ci_iw_cnic`, `ci_iw_mobile`, `ci_iw_email`, `ci_iw_subject`, `ci_iw_posting`, `ci_iw_district`, `ci_iw_tehsil`, `ci_iw_designation`, `ci_iw_gender`, `ci_iw_area`, `ci_iw_deptttype`, `ci_iw_publictype`, `ci_iw_fathername`-->
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
				<th>#ID</th>
				<th>Subject</th>
				<th>Name</th>
				<th>Father/Husband</th>
				<th>District</th>
				<th>DOB</th>
				<th>CNIC</th>
				<th>Designation</th>
				<th>Place of Posting</th>
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
    "ajax": "<?=base_url('admin/reports/datatable_json_iw')?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "admin_id", 'searchable':false, 'orderable':false},
    { "targets": 1, "name": "ci_iw_subject", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "lastname", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "ci_iw_fathername", 'searchable':true, 'orderable':true},
	 { "targets": 4, "name": "district_name_en", 'searchable':true, 'orderable':true},
	 { "targets": 5, "name": "ci_iw_dob", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "ci_iw_cnic", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	  "lengthMenu": [[50,75,100,150,200], [50,75,100,150,200 ]]
  });
</script>


<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("admin/blocks/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      block_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Status Changed Successfully", "success");
    });
  });
</script>


