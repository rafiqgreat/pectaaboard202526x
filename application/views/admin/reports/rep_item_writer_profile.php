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
            <?php echo form_open(base_url('admin/itemwriter/rep_item_writer_profile'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
			<!--<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />-->
            <div class="row form-group" style="padding-top:15px">                 
                <div class="col-lg-3 col-sm-3 form-group">
                    <label for="district" class="col-sm-12 control-label">District</label>
                    <select name="district_id" class="form-control form-group" id="district_id" placeholder="" >
                        <option value="">---Select District---</option>
                        <?php 
                        foreach($districts as $row)
                        {
                        ?>
                        	<option value="<?=$row['district_id']?>" <?php echo set_select('district_id',$row['district_id']);?> ><?=$row['district_name_en']?></option> 
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-3">
                <label for="tehsil" class="col-sm-12 control-label">Tehsil</label>
                  <select name="tehsil_id" class="form-control form-group" id="tehsil_id" placeholder="" >
                    <option value="">---Select Tehsil---</option>
                      <?php 
                        foreach($tehsils as $row)
                        {
                        ?>
                        	<option value="<?=$row['tehsil_id']?>" <?php echo set_select('tehsil_id',$row['tehsil_id']); ?> ><?=$row['tehsil_name_en']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div> 
                
                
				 <div class="col-lg-3 col-sm-3">
                <label for="subject" class="col-sm-12 control-label">Subject</label>
                  <select name="subject" class="form-control" id="subject" placeholder="" required="required">
                        <option value="x">----Select Subject----</option>
                        <option value="English" <?php echo set_select('subject','English');?> >English-انگریزی</option>
                        <option value="Urdu" <?php echo set_select('subject','Urdu');?> >Urdu-اردو</option>
                        <option value="Math" <?php echo set_select('subject','Math');?> >Math-ریاضی</option>
                        <option value="Religious" <?php echo set_select('subject','Religious Education');?> >Religious Education-دینی تعلیم</option>
                        <option value="Islamiat" <?php echo set_select('subject','Islamiat');?> >Islamiat-اسلامیات</option>
                        <option value="Social" <?php echo set_select('subject','Social Studies');?> >Social Studies-شوشل سٹڈی</option>
                        <option value="Science" <?php echo set_select('subject','Science');?> >Science/GK-سائینس</option>
                        <option value="Computer"<?php echo set_select('subject','Computer Education');?> >Computer Education-کمپوٹر تعلیم</option>
                        <option value="Ethics"<?php echo set_select('subject','Ethics');?> >Ethics-اخلاقیات</option>
                    </select>
                </div>
                 <div class="col-lg-3 col-sm-3">
                	<label for="department" class="col-sm-12 control-label">Department</label>                
                	<select name="department" class="form-control" id="department" placeholder="" required="required">
                        <option value="0">-----Select Department----</option>
                        <option value="Public" <?php echo set_select('department','Public');?> >Public</option>
                        <option value="Private" <?php echo set_select('department','Private');?> >Private</option>
                    </select>                
              	</div>
            
              </div>
			
 
            
            <div class="row">
                <div class ="col-12" style="float:right"> <input type="submit" id="get_rep" name="get_rep" class="btn btn-success" value="Search" style="width:120px; float:right"/></div>
            </div>
                
            <!-- Data table start here--------------------------->
            <?php
            if(isset($_REQUEST['get_rep'])){
            ?>
            <div class="btn-group margin-bottom-20"> 
                <a href="<?= base_url() ?>admin/itemwriter/item_writer_export/PDF/<?=$district_id."/".$tehsil_id."/".$subject."/".$department?>" class="btn btn-secondary">Export as PDF</a>
                <a href="<?= base_url() ?>admin/itemwriter/item_writer_export/CSV/<?=$district_id."/".$tehsil_id."/".$subject."/".$department?>" class="btn btn-secondary">Export as CSV</a>
              </div>
              <div class="card-body table-responsive">
                <table id="na_datatable" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Item Writer Name</th>
                      <th>Picture</th>
                      <th>User Name</th>
                      <th>Cell No.</th>
                      <th>DOB</th>
                      <th>CNIC </th>
                      <th>Subject</th>
                      <th>District</th>
                      <th>Tehsil</th>
                      <th>View</th>
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
<script type="text/javascript">
$('#district_id').on('change', function() {
      $.post('<?=base_url("admin/itemwriter/tehsil_by_district")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      district_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#tehsil_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#tehsil_id')
         .append($("<option></option>")
                    .attr("value", value.tehsil_id)
                    .text(value.tehsil_name_en)
                  ); 
        });   
    });
});
$('#item_grade_id').on('change', function() {
	if(this.value < 8)
	{		
		 $('#item_curriculum').val(3);
	}
	else
	{
		 $('#item_curriculum').val(2);
	}
	
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#item_subject_id option:not(:first)').remove();
      $('#item_cstand_id option:not(:first)').remove();
      $('#item_subcstand_id option:not(:first)').remove();
      $('#item_slo_id option:not(:first)').remove();
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<?php
$dist     = (isset($district_id)&&$district_id!="0") ? $district_id : 0;
$tehsil   = (isset($tehsil_id)&&$tehsil_id!="0") ? $tehsil_id : 0;
$subject    = (isset($subject)&&$subject!="0") ? $subject : 0;
$dept = (isset($department)&&$department!="0") ? $department : 0;
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
    "ajax": "<?=base_url('admin/itemwriter/get_itemwriter_jason/'.$dist.'_'.$tehsil.'_'.$subject.'_'.$dept);?>",
    //"ajax": "< ?=base_url('admin/reports/datatable_json_ceo_search/'.$param1.'_'.$param2.'_'.$param3);?>",
    //"order": [[1,'desc']],

      "columnDefs": [
        { "targets": 0, "name": "ci_iw_id", 'searchable':false, 'orderable':true},
        { "targets": 1, "name": "iw_name", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "ci_iw_picture", 'searchable':false, 'orderable':false},
        { "targets": 3, "name": "username", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "ci_iw_mobile", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "ci_iw_dob", 'searchable':true, 'orderable':true},
        { "targets": 6, "name": "ci_iw_cnic", 'searchable':false, 'orderable':true},
        { "targets": 7, "name": "ci_iw_subject", 'searchable':false, 'orderable':true},
        { "targets": 8, "name": "district_name_en", 'searchable':false, 'orderable':true},
        { "targets": 9, "name": "ci_iw_tehsil", 'searchable':false, 'orderable':true},
        { "targets": 10, "name": "ci_iw_id", 'searchable':false, 'orderable':false}
    ]
  });
  table.buttons().container()
        .appendTo( '#na_datatable .col-md-6:eq(0)' );
</script>
<script>
$('#na_datatable').on('click', 'a', function(){
    var url =$(this).attr('url');
  window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=800");
});
</script>


