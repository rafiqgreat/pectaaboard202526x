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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Pilot ItemsGroup List</h3>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        	<?php echo form_open(base_url('admin/pilot_itemsgroup/group_p1'), 'class="form-horizontal" method="post" '); ?>
            <div class="row" style="width:100%">
            	<div class="col-1">Search : </div>
                    <div class="col-10"> 
                        <div class ="row">
                            <div class="col-6">
                                <select name="grade_id" class="form-control form-group" id="grade_id"  style="width:100%">						
                                    <option value="">--All Grades--</option>
                                      <?php							
                                        foreach($grades as $grade)
                                        {
                                            
                                           // if($grade['grade_id'] == $grade_id) $sel = 'selected="selected"'; 
                                           // echo '<option value="'.$grade['grade_id'].'"  '.$sel.' >'.$grade['grade_name_en'].'-'.$grade['grade_name_ur'].'</option>';
                                             echo '<option value="'.$grade['grade_id'].'"'.set_select('grade_id',$grade['grade_id']).'>'.$grade['grade_name_en'].'-'.$grade['grade_name_ur'].'</option>';
                                        }
                                      ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="subject_id" class="form-control form-group" id="subject_id"  style="width:100%" >
                                    <option value="">-- Subject--</option>
                                     <?php	
                                    if($this->input->post('submit_search')){
                                        foreach($subjects as $subject)
                                        {
                                           // $sel = "";
                                           // if($subject['subject_id'] == $subject_id) $sel = 'selected="selected"'; 
                                           // echo '<option value="'.$subject['subject_id'].'"  '.$sel.' >'.$subject['subject_name_en'].'-'.$subject['subject_name_ur'].'</option>';
                                            
                                             echo '<option value="'.$subject['subject_id'].'"'.set_select('subject_id',$subject['subject_id']).'>'.$subject['subject_name_en'].'-'.$subject['subject_name_ur'].'</option>';
                                        }
                                    }
                                      ?>						  
                                </select>
                            </div>
                        </div>
                         
                    </div>
                <div class="col-1"><input type="submit" id="submit_search" name="submit_search" class="btn btn-success" value="Search" /></div>
            </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
        <table id="na_datatable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Group ID</th>
              <th>Item IDs</th>
              <th>Group Title</th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Status</th>
              <th width="100" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>  
</div>
<?php
$param1 = (isset($grade_id) && $grade_id != "") ? $grade_id : 0;
$param2 = (isset($subject_id) && $subject_id != "") ? $subject_id : 0;
//die($param1.'_'.$param2);
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
	
	"ajax": "<?=base_url('admin/pilot_itemsgroup/datatable_json_pilot_grouplist/'.$param1.'_'.$param2)?>",
	
    // "ajax": "< ?=base_url('admin/pilot_itemsgroup/datatable_json_pilot_grouplist');?>",
    // "order": [[1,'desc']],
    "columnDefs": [
		{ "targets": 0, "name": "group_id", 'searchable':true, 'orderable':true},
		{ "targets": 1, "name": "group_id", 'searchable':true, 'orderable':true},
		{ "targets": 2, "name": "group_item_1", 'searchable':false, 'orderable':false},
		{ "targets": 3, "name": "group_title_en", 'searchable':true, 'orderable':true},
		{ "targets": 4, "name": "group_grade_id", 'searchable':true, 'orderable':true},
		{ "targets": 5, "name": "group_subject_id", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "group_status", 'searchable':true, 'orderable':true},
		{ "targets": 7, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]
  });
</script>

<script type="text/javascript">
/*
  $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('< ?=base_url("admin/itemsgroup/change_status")?>',
    {
      '< ?php echo $this->security->get_csrf_token_name(); ?>' : '< ?php echo $this->security->get_csrf_hash(); ?>',
      group_id : $(this).data('id'),
      status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("Item Status Changed Successfully", "success");
    });
  });
*/	
$('#grade_id').on('change', function() {
  $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en +' - '+ value.subject_name_ur)
                  ); 
        });   
    });	
});
/*function checkFields()
{
	if($('#grade_id')=="" && $('#grade_id')=="" ) { return true; }
	if($('#subject_id')!="" && $('#subject_id')!="" ) { return true; }
}*/
</script>


