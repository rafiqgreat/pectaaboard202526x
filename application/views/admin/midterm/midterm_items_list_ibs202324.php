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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Items List of Itembank 2023-24</h3>
        </div>
        <?php /*?><div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/slos/create_slos_pdf" class="btn btn-secondary">Export as PDF</a>
            <?php /* ?><a href="<?= base_url() ?>admin/slos/export_slos_csv" class="btn btn-secondary">Export as CSV</a>
          </div>
          <a href="<?= base_url('admin/slos/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New SLO</a>
        </div><?php */ ?>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <?php echo form_open(base_url('admin/midterm/pilot_ss_items_search23'), 'class="form-horizontal" method="post"');  //pilot_ss_items_search
        ?>
        <div class="row" style="width:100%">
          <div class="col-1">Search :</div>
          <div class="col-10">
            <div class="row">
              <div class="col-3">
                <select name="search_grade" class="form-control form-group" id="search_grade" style="width:100%">
                  <option value="">---All Grades---</option>
                  <?php
                  foreach ($grades as $grade) {
                    $sel = "";
                    if (isset($search_grade) && $search_grade == $grade['grade_id']) {
                      $sel = 'selected="selected"';
                    }
                    echo '<option value="' . $grade['grade_id'] . '"  ' . $sel . ' >' . $grade['grade_name_en'] . ' (' . $grade['grade_name_ur'] . ')</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-3">
                <select name="search_subject" class="form-control form-group" id="search_subject" style="width:100%">
                  <option value="">---All Subjects---</option>
                  <?php
                  foreach ($subjects as $subject) {
                    $sel = "";
                    if (isset($search_subject) && $search_subject == $subject['subject_id']) {
                      $sel = 'selected="selected"';
                    }
                    echo '<option value="' . $subject['subject_id'] . '"  ' . $sel . ' >' . $subject['subject_name_en'] . '- ' . $subject['subject_name_ur'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-3">
                <select name="search_cstrand" class="form-control form-group" id="search_cstrand" style="width:100%">
                  <option value="">---All Content Strands---</option>
                  <?php
                  foreach ($cstrands as $cstrand) {
                    $sel = "";
                    if (isset($search_cstrand) && $search_cstrand == $cstrand['cs_id']) {//text(value.cs_statement_en + ' - ' + value.cs_statement_ur)
                      $sel = 'selected="selected"';
                    }
                    echo '<option value="' . $cstrand['cs_id'] . '"  ' . $sel . ' >' . $cstrand['cs_statement_en'] .' - '. $cstrand['cs_statement_ur'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-3">
                <select name="search_subcstrand" class="form-control form-group" id="search_subcstrand" style="width:100%">
                  <option value="">---All Sub Content Strands---</option>
                  <?php
                  foreach ($subcstrands as $subcstrand) {
                    $sel = "";
                    if (isset($search_subcstrand) && $search_subcstrand == $subcstrand['subcs_id']) {
                      $sel = 'selected="selected"';
                    }
                    echo '<option value="' . $subcstrand['subcs_id'] . '"  ' . $sel . ' >' . $subcstrand['subcs_topic_en'] . ' - '. $subcstrand['subcs_topic_ur'] .'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <select name="search_slos" class="form-control form-group" id="search_slos" style="width:100%">
                  <option value="">---All SLOs---</option>
                  <?php if (!empty($slos)) { ?>
                    <?php foreach ($slos as $slo): ?>
                      <option value="<?= $slo['slo_id'] ?>" <?= (isset($search_slos) && $search_slos == $slo['slo_id']) ? 'selected' : '' ?>>
                        <?= $slo['slo_statement_en'] ?> (<?= $slo['slo_statement_ur'] ?>)
                      </option>
                    <?php endforeach; ?>
                  <?php } ?>
                </select>

              </div>
              <div class="col-6">
              </div>
            </div>
          </div>
          <div class="col-1"> <input type="submit" id="submit_search" name="submit_search" class="btn btn-success" value="Search" /></div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Type</th>
              <th>Item ID</th>
              <th>Items Code</th>
              <th width="25%">Items (Eng)</th>
              <th width="25%" class="urdufont-right">آئٹم</th>
              <th>Grade</th>
              <th>P Value</th>
              <th>Options</th>
              <th>Key</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>
<?php
$param1 = (isset($search_grade) && $search_grade != "") ? $search_grade : 0;
$param2 = (isset($search_subject) && $search_subject != "") ? $search_subject : 0;
$param3 = (isset($search_cstrand) && $search_cstrand != "") ? $search_cstrand : 0;
$param4 = (isset($search_subcstrand) && $search_subcstrand != "") ? $search_subcstrand : 0;
$param5 = (isset($search_slos) && $search_slos != "") ? $search_slos : 0;
//die($param1.'_'.$param2.'_'.$param3.'_'.$param4.'_'.$param5);
?>

<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>

<script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable({
    "processing": true,
    "serverSide": true,
    <?php if ($param1 != 0 || $param2 != 0 || $param3 != 0 || $param4 != 0 || $param5 != 0) { ?> "ajax": "<?= base_url('admin/midterm/datatable_json_mcq_midterm_search23/' . $param1 . '/' . $param2 . '/' . $param3 . '/' . $param4 . '/' . $param5); ?>",
    <?php } else { ?> "ajax": "<?= base_url('admin/midterm/datatable_json_items_midterm23') ?>",
    <?php } ?>

    //  "order": [[1,'desc']],
    "columnDefs": [{"targets": 0,"name": "item_id",'searchable': true,'orderable': true},
      {"targets": 1,"name": "item_type",'searchable': true,'orderable': true},
		{"targets": 2,"name": "item_id",'searchable': true,'orderable': true},
      {"targets": 3,"name": "item_code",'searchable': true,'orderable': true},
      {"targets": 4,"name": "item_stem_en",'searchable': true,'orderable': true},
      {"targets": 5,"name": "item_stem_ur",'searchable': true,'orderable': true},
      {"targets": 6,"name": "grade_code",'searchable': true,'orderable': true},
      {"targets": 7,"name": "item_p_value",'searchable': true,'orderable': true},
		{"targets": 8,"name": "item_option_a_en",'searchable': false,'orderable': false},
		{"targets": 9,"name": "item_option_correct",'searchable': true,'orderable': true},		
      {"targets": 10,"name": "Action",'searchable': false,'orderable': false}
    ],
    "lengthMenu": [
      [50, 75, 100, 150, 200],
      [50, 75, 100, 150, 200]
    ]
  });
</script>

<script type="text/javascript">
  $('#search_grade').on('change', function() {
    $.post('<?= base_url("admin/midterm/subjects_by_grade") ?>', {
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
        grade_id: this.value
      },
      function(data) {
        arr = $.parseJSON(data);
        console.log(arr);
        $('#search_subject option:not(:first)').remove();
        $('#search_cstrand option:not(:first)').remove();
        $('#search_subcstrand option:not(:first)').remove();
        $.each(arr, function(key, value) {
          $('#search_subject')
            .append($("<option></option>")
              .attr("value", value.subject_id)
              .text(value.subject_name_en + ' - ' + value.subject_name_ur)
            );
        });
      });
  });
  $('#search_subject').on('change', function() {
    $.post('<?= base_url("admin/midterm/cstands_by_subject") ?>', {
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
        subject_id: this.value
      },
      function(data) {
        arr = $.parseJSON(data);
        console.log(arr);
        $('#search_cstrand option:not(:first)').remove();
        $('#search_subcstrand option:not(:first)').remove();
        $.each(arr, function(key, value) {
          $('#search_cstrand')
            .append($("<option></option>")
              .attr("value", value.cs_id)
              .text(value.cs_statement_en + ' - ' + value.cs_statement_ur)
            );
        });
      });
  });
  $('#search_cstrand').on('change', function() {
    $.post('<?= base_url("admin/midterm/subcstands_by_cstand") ?>', {
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
        cs_id: this.value
      },
      function(data) {
        arr = $.parseJSON(data);
        console.log(arr);
        $('#search_subcstrand option:not(:first)').remove();
        $.each(arr, function(key, value) {
          $('#search_subcstrand')
            .append($("<option></option>")
              .attr("value", value.subcs_id)
              .text(value.subcs_topic_en + ' - ' + value.subcs_topic_ur)
            );
        });
      });
  });
  $('#search_subcstrand').on('change', function() {
    $.post('<?= base_url("admin/midterm/slos_by_subcstands") ?>', {
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
        subcs_id: this.value
      },
      function(data) {
        arr = $.parseJSON(data);
        console.log(arr);
        $('#search_slos option:not(:first)').remove();
        $.each(arr, function(key, value) {
          $('#search_slos')
            .append($("<option></option>")
              .attr("value", value.slo_id)
              .text(value.slo_statement_en + ' - ' + value.slo_statement_ur)
            );
        });
      });
  });
</script>