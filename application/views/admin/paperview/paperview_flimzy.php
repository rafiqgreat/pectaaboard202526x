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
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Advance Search </h3>
        </div>
        <div class="d-inline-block float-right">
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
            <?php echo form_open(base_url('admin/paperview/paperview_view'), 'class="form-horizontal" method="post" onSubmit="return checkFields();" ');  ?>
              <div class="row" style="width:100%">
              <div class ="col-12" style="font-size:18px; font-weight:bold">Advance Search :</div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                    <div class ="col-3">
                    	<select name="search_grade" class="form-control form-group" id="search_grade"  style="width:100%" required="required">						
                          <option value="">---Select Grades---</option>
                            <?php							
                              foreach($grades as $grade)
                              {
                                $sel = "";								
                                echo '<option value="'.$grade['grade_id'].'"  '.$sel.' >'.$grade['grade_name_en'].' ('.$grade['grade_name_ur'].')</option>';
                              }
                            ?>
                         </select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_subject" class="form-control form-group" id="search_subject"  style="width:100%" required="required">						
                          <option value="">---Select Subjects---</option>
                        </select>
                    </div>
                    <div class ="col-3">
						<select name="search_cstand" class="form-control form-group" id="search_cstand"  required>
						  <option value="">--Select Content Strand--</option>
						</select>
                    </div>
					<div class ="col-3">
						<select name="search_subcstand" class="form-control form-group" id="search_subcstand"  required>
						  <option value="">--Select Sub Content Strand--</option>
						</select>
                    </div>
                    <div class ="col-3">
                    	<select name="search_typeofquestion" class="form-control form-group" id="search_typeofquestion" required style="width:100%" >	
                          <option value="">---Select Type of Question---</option>
                          <option value="MCQ">MCQs</option>
                          <option value="ERQ">CRQs</option>
						 <option value="Paragraphs">Paragraphs</option>
							<option value="Groups">Groups</option>
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
  </section>  
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script>/*
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "< ?=base_url('admin/items/datatable_jsonp_rev_psy');?>",
  //  "order": [[1,'desc']],
    "columnDefs": [
    	{ "targets": 0, "name": "item_id", 'searchable':true, 'orderable':true},
    	{ "targets": 1, "name": "item_batch", 'searchable':true, 'orderable':true},
    	{ "targets": 2, "name": "item_type", 'searchable':true, 'orderable':true},
    	{ "targets": 3, "name": "item_code", 'searchable':true, 'orderable':true},
    	{ "targets": 4, "name": "item_stem_en", 'searchable':true, 'orderable':true},
    	{ "targets": 5, "name": "grade_code", 'searchable':true, 'orderable':true},
		{ "targets": 6, "name": "subject_code", 'searchable':true, 'orderable':true},
    	{ "targets": 7, "name": "slo_number", 'searchable':true, 'orderable':true},
		{ "targets": 8, "name": "item_rev_ae_status", 'searchable':true, 'orderable':true},
		{ "targets": 9, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ],
	"lengthMenu": [[50,75,100,150, -1], [50,75,100,150, "All"]]
  })*/
</script>

<script type="text/javascript">

$('#search_grade').on('change', function() {
      $.post('<?=base_url("admin/paperview/subjects_by_grade")?>',
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
      $.post('<?=base_url("admin/paperview/cstands_by_subject")?>',
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

$('#search_typeofquestion').on('change', function() {
	
	if($('#search_typeofquestion').val() == 'Paragraphs' || $('#search_typeofquestion').val() == 'Groups'){
		$('#search_cstand').css('display','none');
		$('#search_subcstand').css('display','none');
		
		$('#search_cstand').prop('required',false);
		$('#search_subcstand').prop('required',false);
	}else{
		$('#search_cstand').css('display','block');
		$('#search_subcstand').css('display','block');
		
		$('#search_cstand').prop('required',true);
		$('#search_subcstand').prop('required',true);
	}
     
});		

function checkFields()
{
	if($('#item_grade_id')=="" && $('#item_subject_id')=="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')!="" ) { return true; }
	if($('#item_grade_id')!="" && $('#item_subject_id')=="" ) { alert('Please select Subject!'); return false; }
}
</script>


