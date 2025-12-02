<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 5px 8px;
  font-size: 14px;
  border: none;
  margin: 3px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 5;
}

.dropdown-content a {
  color: black;
  padding: 6px 10px;
  text-decoration: none;
  display: block;
  font-size: 14px;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('school/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Book Wise Papers</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
<!--            <a href="< ?= base_url() ?>school/paper/create_items_pdf" class="btn btn-secondary">Export as PDF</a> -->
<!--            <a href="< ?= base_url() ?>school/paper/export_items_csv" class="btn btn-secondary">Export as CSV</a> -->
          </div>
          <a href="<?= base_url('admin/paper/add_book_wise_papers'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> New Paper</a>
        </div>
      </div>		
    </div>
    <div class="card">
      <div class="card-body">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
			  <th>Grade</th>
              <th>Subject</th>
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
    "ajax": "<?=base_url('admin/paper/datatable_json_book_wise_papers_list')?>",
    "order": [[0,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "qat_id", 'searchable':false, 'orderable':false},
	{ "targets": 1, "name": "qat_grade_id", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "qat_sub_id", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "Action", 'searchable':false, 'orderable':false,'width':'241px'}
    ]
  });
</script>

<script type="text/javascript">
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('<?=base_url("school/paper/change_status")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      item_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("ItemsBank Status Changed Successfully", "success");
    });
  });
</script>