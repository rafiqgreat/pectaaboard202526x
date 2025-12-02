 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?=$title?> </h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/reports/plagiarism_duplicate'), 'class="form-horizontal"');  ?>  
            <div class="row">
                <div class="col-lg-6 col-sm-12">  
                    <label for="item_grade_id" class="control-label">Grade *</label>
                    <select name="item_grade_id" class="form-control form-group" id="item_grade_id"  required>
                        <option value="">--Select Grades--</option>
                          <?php
                            foreach($grades as $grade)
                            {
                                echo '<option value="'.$grade['grade_id'].'"'.set_select('item_grade_id',$grade['grade_id']).'>'.$grade['grade_name_en'].'</option>';
                            }
                          ?>
                    </select>                    
                </div>
                <div class="col-lg-6 col-sm-12">                         
                    <label for="item_subject_id" class="control-label">Subject *</label>
                    <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  required>
                      <option value="">--Select Subjects--</option>
                        <?php
                        if(isset($subjects)){
                            foreach($subjects as $subject)
                            {
                                echo '<option value="'.$subject['subject_id'].'"'.set_select('item_subject_id',$subject['subject_id']).'>'.$subject['subject_name_en'].'</option>';
                            }
                        }
                      ?>
                    </select>
                </div>
            </div>
			<div class="row">
              	<div class="col-lg-6 col-sm-12">                         
                    <label for="dup_level" class="control-label">Duplication Level *</label>
                    <select name="dup_level" class="form-control form-group" id="dup_level" required>
                        <option value="50" <?php echo set_select('dup_level','50');?>>50% and above</option>
                        <option value="60" <?php echo set_select('dup_level','60');?>>60% and above</option>
                        <option value="70" <?php echo set_select('dup_level','70');?>>70% and above</option>
                        <option value="80" <?php echo set_select('dup_level','80');?>>80% and above</option>
                        <option value="90" <?php echo set_select('dup_level','90');?>>90% and above</option>
                    </select>
                </div>
                 <div class ="col-12" style="float:right">
                     <input type="submit" id="get_rep" name="get_rep" class="btn btn-success" value="Search" style="width:120px; float:right"/>
                </div> 
              </div>
            <!-- Data table start here--------------------------->
            <?php
            if(isset($_REQUEST['get_rep'])){
            ?>
           
              <div class="card-body table-responsive">
                <table id="na_datatable" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th>Grades</th>
                      <th>Subjects</th>
                      <th>Item Type</th>
                      <th>ContentStrand</th>
                      <th>Item Statement</th>
                      <th>Plagiarism</th>
                      <th>View details</th>
                    </tr>                      
                  </thead>
                </table>
              </div>
            <?php    
            }
            ?>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script type="text/javascript">
$('#item_grade_id').on('change', function() {
    
 $.post('<?=base_url("admin/items/subjects_by_grade")?>',
{
    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
     grade_id : this.value
},
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#item_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
});
</script>
<?php
$grade     = (isset($item_grade_id)&&$item_grade_id!="0") ? $item_grade_id : 0;
$subject   = (isset($item_subject_id)&&$item_subject_id!="0") ? $item_subject_id : 0;
$dup_level     = (isset($dup_level)&&$dup_level!="0") ? $dup_level : 0;
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
    "ajax": "<?=base_url('admin/reports/plagiarism_json_duplicate/'.$grade.'_'.$subject.'_'.$dup_level);?>",
      "columnDefs": [
        { "targets": 0, "name": "grade_id", 'searchable':false, 'orderable':false},
        { "targets": 1, "name": "subject_name_en", 'searchable':false, 'orderable':false},
        { "targets": 2, "name": "item_type", 'searchable':false, 'orderable':false},
        { "targets": 3, "name": "cs_strand", 'searchable':false, 'orderable':false},
        { "targets": 4, "name": "item_stem_en", 'searchable':false, 'orderable':false},
        { "targets": 5, "name": "grade_id", 'searchable':false, 'orderable':false},
        { "targets": 6, "name": "item_id", 'searchable':false, 'orderable':false},
    ],"lengthMenu": [[50,75,100,150,200], [50,75,100,150,200]]
  });
</script>