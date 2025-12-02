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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Flimsy Download From Pilot Items</h3>
        </div>
		  <?php
			$grade_id 		= (isset($search_grade) && $search_grade != "")?$search_grade:0;
			$subject_id 	= (isset($search_subject) && $search_subject != "")?$search_subject:0;
			$cstand_id 		= (isset($search_cstand) && $search_cstand != "")?$search_cstand:0;
	  		$subcstand_id 	= (isset($search_subcstand) && $search_subcstand != "")?$search_subcstand:0;
			$phase_id 		= (isset($search_phase) && $search_phase != "")?$search_phase:0;
			?>
		<div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?=base_url('admin/downloads/create_flimzy_pdf?grade_id='.$grade_id.'&subject_id='.$subject_id.'&cstand_id='.$cstand_id.'&subcstand_id='.$subcstand_id.'&phase_id='.$phase_id);?>" class="btn btn-secondary" style="margin:05px">Export as PDF</a>
            <a href="<?=base_url('admin/downloads/create_flimzy_pdf/word?grade_id='.$grade_id.'&subject_id='.$subject_id.'&cstand_id='.$cstand_id.'&subcstand_id='.$subcstand_id.'&phase_id='.$phase_id);?>" class="btn btn-secondary" style="margin:05px">Export As Word</a>
          </div>         
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/downloads/search_downloads_flimzy'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
              <div class="row" style="width:100%">
              <div class ="col-12" style="font-size:18px; font-weight:bold">Filter Pilot Items :</div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                    <div class ="col-3">
                    	<select name="search_grade" class="form-control form-group" id="search_grade"  style="width:100%" required="required">						
                          <option value="">---Select Grades---</option>
                            <?php							
                              foreach($grades as $grade)
                              {
                                $sel = "";
								if(isset($search_grade) && $search_grade == $grade['grade_id']) { $sel = 'selected="selected"'; }								
                                echo '<option value="'.$grade['grade_id'].'"  '.$sel.' >'.$grade['grade_name_en'].' ('.$grade['grade_name_ur'].')</option>';
                              }
                            ?>
                         </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_subject" class="form-control form-group" id="search_subject"  style="width:100%" required="required">						
                          <option value="">---Select Subjects---</option>
                          <?php							
                            foreach($subjects as $subject)
                            {
                              $sel = "";
							  if(isset($search_subject) && $search_subject == $subject['subject_id']) { $sel = 'selected="selected"'; }								
                              echo '<option value="'.$subject['subject_id'].'"  '.$sel.' >'.$subject['subject_name_en'].' (Grade-'.$subject['grade_code'].')'.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class ="col-3">
						<select name="search_cstand" class="form-control form-group" id="search_cstand"  required>
						  <option value="">--Select Content Strand--</option>
							<?php
							$i=0;
                            foreach($contentstands as $contentstand)
                            {
								$i++;
                              $sel = "";
							  if(isset($search_cstand) && $search_cstand == $contentstand['cs_id']) { $sel = 'selected="selected"'; }								
                              echo '<option value="'.$contentstand['cs_id'].'"  '.$sel.' >'.$i.'-'.$contentstand['cs_statement_en'].$contentstand['cs_statement_ur'].'</option>';
                            }
                            ?>
						</select>
                    </div>
					<div class ="col-3">
						<select name="search_subcstand" class="form-control form-group" id="search_subcstand"  required>
						  <option value="">--Select Sub Content Strand--</option>
							<?php
							$i=0;
                            foreach($subcontentstands as $subcontentstand)
                            {
								$i++;
                              $sel = "";
							  if(isset($search_subcstand) && $search_subcstand == $subcontentstand['subcs_id']) { $sel = 'selected="selected"'; }								
                              echo '<option value="'.$subcontentstand['subcs_id'].'"  '.$sel.' >'.$subcontentstand['subcs_number'].'-'.$subcontentstand['subcs_topic_en'].$subcontentstand['subcs_topic_ur'].'</option>';
                            }//.text(value.subcs_number+'-'+value.subcs_topic_en+value.subcs_topic_ur)
                            ?>
						</select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_phase" class="form-control form-group" id="search_phase"  style="width:100%; display: none;" disabled required="required">						
                          <option value="">---Select Cycle/Phase---</option>
                          <option value="1" <?php if($search_phase==1){?> selected="selected"<?php }?>>Cycle/Phase-I</option>
                          <option value="2" <?php if($search_phase==2){?> selected="selected"<?php }?>>Cycle/Phase-II</option>
                        </select>
                    </div>
					<div class ="col-3">&nbsp;</div>
					<div class ="col-3">&nbsp;</div>
					<div class ="col-3" style="float:right"> 
						<input type="submit" id="submit_flimzy" name="submit_flimzy" class="btn btn-success" value="Search" style="width:120px; float:right"/>
					</div> 
                </div>
              </div>
              
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
              <th>Batch</th>
              <th>Submitted By</th>
              <th>Type</th>
              <th>Items Code</th>
              <th>Items </th>
              <th>Grade</th>
              <th>Subject</th>
              <th>Updated at</th>
              <th width="100" class="text-right">Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section> 
<div class="modal fade" id="confirm-delete-<?php //echo $row['country_id']; ?>" role="dialog">
    <div class="modal-dialog">
        <form action="delete_country.php" method="POST">
        <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="del_id" id="del_id" value="<?php // echo $row['country_id']; ?>">
                    <p>Are you sure you want to delete this Country?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default pull-left">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </form>
    </div>
</div> 
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
    "ajax": "<?=base_url('admin/downloads/datatable_jsons_ae_accepted_flimzy?grade_id='.$grade_id.'&subject_id='.$subject_id.'&cstand_id='.$cstand_id.'&subcstand_id='.$subcstand_id.'&phase_id='.$phase_id);?>",
    "order": [[1,'desc']],
    "columnDefs": [
    { "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    { "targets": 1, "name": "item_batch", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "firstname", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "item_type", 'searchable':true, 'orderable':true},
    { "targets": 4, "name": "item_code", 'searchable':true, 'orderable':true},
    { "targets": 5, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "grade_code", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "subject_code", 'searchable':true, 'orderable':true},
    { "targets": 8, "name": "item_updated", 'searchable':true, 'orderable':true},
    { "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	"lengthMenu": [[50,75,100,150, -1], [50,75,100,150, "All"]]
  });
</script>


<script type="text/javascript">
  $('#search_grade').on('change', function() {
      $.post('<?=base_url("admin/downloads/subjects_by_grade")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  grade_id : this.value
		},
    function(data){
      arr = $.parseJSON(data);     
      $('#search_subject option:not(:first)').remove();
	  $('#search_cstand option:not(:first)').remove();	
	  $('#search_subcstand option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#search_subject')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en+'( Grade-'+value.grade_code+')')
                  ); 
        });   
    });	
	
});
	
$('#search_subject').on('change', function() {
      $.post('<?=base_url("admin/downloads/cstands_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      $('#search_cstand option:not(:first)').remove();
	  $('#search_subcstand option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_cstand')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en+value.cs_statement_ur)
                  ); 
        });   
    });
});
	
$('#search_cstand').on('change', function() {
      $.post('<?=base_url("admin/items/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      $('#search_subcstand option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#search_subcstand')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en+value.subcs_topic_ur)
                  ); 
        });   
    });
});	

function checkFields()
{
	if($('#item_grade_id')=="" && $('#item_subject_id')=="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')!="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')=="" ) { alert('Please select Subject!'); return false; }
}
</script>


