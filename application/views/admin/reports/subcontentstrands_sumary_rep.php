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

          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp;  <?=$title?></h3>

        </div>

       

      </div>

    </div>

    <div class="card">

      <div class="card-body table-responsive">

        <table id="na_datatable" class="table table-bordered table-striped" width="100%">

          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Grades</th>
              <th>Subjects</th>
              <th>Content Strands</th>
              <th>SubContent Strands</th>
              <th>Submitted</th>
              <th>Subm MCQs</th>
              <th>Subm ERQ</th>
              <th>AE Accepted</th>
              <th>AE_MCQs</th>
              <th>AE_ERQs</th>
            </tr>
          </thead>

        </table>

      </div>

    </div>

  </section>  

</div>

<?php

$grade     = (isset($item_grade_id)&&$item_grade_id!="") ? $item_grade_id : 0;
$subject   = (isset($item_subject_id)&&$item_subject_id!="") ? $item_subject_id : 0;
$cstrand    = (isset($item_cstand_id)&&$item_cstand_id!="") ? $item_cstand_id : 0;
$subcstand = (isset($item_subcstand_id)&&$item_subcstand_id!="") ? $item_subcstand_id : 0;
//die($param1.'_'.$param2.'_'.$param3);

?>

<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script src="<?= base_url() ?>/assets/notify.js"></script>

<script>

  //---------------------------------------------------

  var table = $('#na_datatable').DataTable( {

    "processing": true,

    "serverSide": true,

    "ajax": "<?=base_url('admin/reports/get_content_strands_jason/'.$grade.'_'.$subject.'_'.$cstrand.'_'.$subcstand);?>",
    //"ajax": "< ?=base_url('admin/reports/datatable_json_ceo_search/'.$param1.'_'.$param2.'_'.$param3);?>",

  //  "order": [[1,'desc']],

      "columnDefs": [
          
        { "targets": 0, "name": "cs_id", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "grade_name_en", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "subject_name_en", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "cs_number", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "subcs_number", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "subcs_topic_en", 'searchable':true, 'orderable':true},
        { "targets": 6, "name": "Submitted_MCQ", 'searchable':false, 'orderable':false},
        { "targets": 7, "name": "Submitted_ERQ", 'searchable':false, 'orderable':false},
        { "targets": 8, "name": "AE", 'searchable':false, 'orderable':false},
        { "targets": 9, "name": "AE_MCQ", 'searchable':false, 'orderable':false},
        { "targets": 10, "name": "AE_ERQ", 'searchable':false, 'orderable':false}
    ]

  });

</script>






