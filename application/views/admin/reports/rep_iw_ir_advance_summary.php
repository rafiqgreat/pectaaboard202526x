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
        <?php $params =  0; //$user_type = $department = $name_include = $fname_include = $user_cnic = $user_email = $user_phone = $user_bank = $district_id = $tehsil_id = $user_qualification = $user_exp = 0; ?>
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/reports/rep_iw_ir_advance_summary_search'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
			<!--<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />-->
            <div class="row form-group" style="padding-top:15px">                 
                <div class="col-lg-6 col-sm-12">
                <label for="user_type" class="col-sm-12 control-label">User Type</label>
                  <select name="user_type" class="form-control" id="user_type" placeholder="" required="required">                       
                        <option value="3" <?php echo set_select('user_type','3');?> >Item Writer</option>
                        <option value="6" <?php echo set_select('user_type','6');?> >Item Reviwer</option>
                    </select>
                </div>
                 <div class="col-lg-6 col-sm-12">
                	<label for="department" class="col-sm-12 control-label">Department</label>                
                	<select name="department" class="form-control" id="department" placeholder="" >
                        <option value="">-----Select Department----</option>
                        <option value="Public" <?php echo set_select('department','Public');?> >Public</option>
                        <option value="Private" <?php echo set_select('department','Private');?> >Private</option>
                    </select>                
              	</div>
            
              </div>
			<div class="row">                 
                <div class="col-lg-3 col-sm-3 form-group">
                    <label for="name_include" class="col-sm-12 control-label">Name Includes</label>
                    <input type="text" name="name_include" class="form-control" id="name_include" >
                </div>
                <div class="col-lg-3 col-sm-3">
                	<label for="fname_include" class="col-sm-12 control-label">Fathe name Includes</label>
                    <input type="text" name="fname_include" class="form-control" id="fname_include" >
                </div> 
                <div class="col-lg-3 col-sm-3">
                	<label for="user_cnic" class="col-sm-12 control-label">CNIC (without '-' )</label>
                    <input type="number" name="user_cnic" class="form-control" id="user_cnic" >
                </div> 
                 <div class="col-lg-3 col-sm-3">
                	<label for="user_email" class="col-sm-12 control-label">Email</label>
                    <input type="email" name="user_email" class="form-control" id="user_email" >
                 </div>
              </div>
 			<div class="row">                 
                <div class="col-lg-3 col-sm-3 form-group">
                    <label for="user_phone" class="col-sm-12 control-label">Phone #</label>
                    <input type="number" name="user_phone" class="form-control" id="user_phone" >
                </div>
                <div class="col-lg-3 col-sm-3">
                	<label for="user_bank" class="col-sm-12 control-label">Bank Account #</label>
                    <input type="text" name="user_bank" class="form-control" id="user_bank" >
                </div> 
                <div class="col-lg-3 col-sm-3 form-group">
                    <label for="district_id" class="col-sm-12 control-label">District</label>
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
              </div>
            <div class="row">                 
                <div class="col-lg-3 col-sm-3 form-group">
                    <label for="user_qualification" class="col-sm-12 control-label">Qualification</label>
                     <input type="text" name="user_qualification" class="form-control" id="user_qualification" >
                </div>
                <div class="col-lg-3 col-sm-3">
                	<label for="user_exp" class="col-sm-12 control-label">Experience</label>
                    <input type="text" name="user_exp" class="form-control" id="user_exp" >
                </div> 
                <div class="col-lg-3 col-sm-3 form-group">
                </div>
                <div class="col-lg-3 col-sm-3">
                </div>
              </div>
            <?php /*?><div class="row">                 
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
                        <option value="Computer Education"<?php echo set_select('subject','Computer Education');?> >Computer Education-کمپوٹر تعلیم</option>
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
              </div><?php */?>
            <div class="row">
                <div class ="col-12" style="float:right"> <input type="submit" id="get_rep" name="get_rep" class="btn btn-success" value="Search" style="width:120px; float:right"/></div>
            </div>
            <?php echo form_close( ); ?>    
            <!-- Data table start here--------------------------->
            <?php
            //echo "<pre>";
            //print_r($this->session->userdata());
            if(isset($_REQUEST['get_rep'])){
            ?>
            <div class="btn-group margin-bottom-20"> 
               <?php /*?> <a href="<?= base_url() ?>admin/reports/item_reviewer_export/PDF/<?=$district_id."/".$tehsil_id."/".$subject."/".$department?>" class="btn btn-secondary">Export as PDF</a>
                <a href="<?= base_url() ?>admin/reports/item_reviewer_export/CSV/<?=$district_id."/".$tehsil_id."/".$subject."/".$department?>" class="btn btn-secondary">Export as CSV</a><?php */?>
              </div>
              <div class="card-body table-responsive">
                <table id="na_datatable" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Deptt.</th>
                      <th>Name</th>
                      <th>Father Name</th>
                      <th>CNIC</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Bank Acc</th>
                      <th>District</th>
                      <th>Tehsil</th>
                      <th>Qualification</th>
                      <th>Experience</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <?php }?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
		
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<?php
if(isset($_REQUEST['get_rep'])){
/*
$user_type     		=  $user_type ;
$department     	= (isset($department) && $department!="") ? $department : 0;
$name_include     	= (isset($name_include) && $name_include!="") ? $name_include : 0;
$fname_include     	= (isset($fname_include) && $fname_include!="") ? $fname_include : 0;
$user_cnic     		= (isset($user_cnic) && $user_cnic!="") ? $user_cnic : 0;
$user_email     	= (isset($user_email) && $user_email!="") ? $user_email : 0;
$user_phone     	= (isset($user_phone) && $user_phone!="") ? $user_phone : 0;
$user_bank     		= (isset($user_bank) && $user_bank!="") ? $user_bank : 0;
$district_id     	= (isset($district_id) && $district_id!="") ? $district_id : 0;
$tehsil_id     		= (isset($tehsil_id) && $tehsil_id!="") ? $tehsil_id : 0;
$user_qualification = (isset($user_qualification) && $user_qualification!="") ? $user_qualification : 0;
$user_exp     		= (isset($user_exp) && $user_exp!="") ? $user_exp : 0;
//$params = $user_type.'_'.$department.'_'.$name_include.'_'.$fname_include.'_'.$user_cnic.'_'.$user_email.'_'.$user_phone.'_'.$user_bank.'_'.$district_id.'_'.$tehsil_id.'_'.$user_qualification.'_'.$user_exp;*/
?>
<script>
  var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "ajax": "<?=base_url('admin/reports/iw_ir_advance_summary_jason/'.$user_type.'_'.$department.'_'.$name_include.'_'.$fname_include.'_'.$user_cnic.'_'.$user_email.'_'.$user_phone.'_'.$user_bank.'_'.$district_id.'_'.$tehsil_id.'_'.$user_qualification.'_'.$user_exp);?>",
  //  "order": [[1,'desc']],
  <?php if($user_type==3){?>
      "columnDefs": [
        { "targets": 0, "name": "admin_id", 'searchable':false, 'orderable':true},
        { "targets": 1, "name": "ci_iw_deptttype", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "firstname", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "ci_iw_fathername", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "ci_iw_cnic", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 6, "name": "mobile_no", 'searchable':true, 'orderable':true},
        { "targets": 7, "name": "ci_iw_accountnumber", 'searchable':true, 'orderable':true},
        { "targets": 8, "name": "district_name_en", 'searchable':true, 'orderable':true},
        { "targets": 9, "name": "tehsil_name_en", 'searchable':true, 'orderable':true},
        { "targets": 10, "name": "ci_iw_qualification", 'searchable':true, 'orderable':true},
		{ "targets": 11, "name": "ci_iw_experienceschool", 'searchable':true, 'orderable':true},
		{ "targets": 12, "name": "ci_iw_experienceschool", 'searchable':false, 'orderable':false},
    ]
	<?php } elseif($user_type==6){?>
	"columnDefs": [
        { "targets": 0, "name": "admin_id", 'searchable':false, 'orderable':true},
        { "targets": 1, "name": "ci_ir_deptttype", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "firstname", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "ci_ir_fathername", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "ci_ir_cnic", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 6, "name": "mobile_no", 'searchable':true, 'orderable':true},
        { "targets": 7, "name": "ci_ir_accountnumber", 'searchable':true, 'orderable':true},
        { "targets": 8, "name": "district_name_en", 'searchable':true, 'orderable':true},
        { "targets": 9, "name": "tehsil_name_en", 'searchable':true, 'orderable':true},
        { "targets": 10, "name": "ci_ir_qualification", 'searchable':true, 'orderable':true},
		{ "targets": 11, "name": "ci_ir_experienceschool", 'searchable':true, 'orderable':true},
		{ "targets": 12, "name": "Action", 'searchable':false, 'orderable':false},
    ]
	<?php }?>
  });
  //table.buttons().container()
  //.appendTo( '#na_datatable .col-md-6:eq(0)' );
</script>
<script>
$('#na_datatable').on('click', 'a', function(){
    var url =$(this).attr('url');
  window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=800");
});
</script>
 <?php    }?>
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
</script>

