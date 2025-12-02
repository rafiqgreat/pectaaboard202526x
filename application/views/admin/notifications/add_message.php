 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">
        

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i><?=$title?> </h3>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/notification/add_massage'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?> 
            

			<div class="row">
                <div class="col-lg-6 col-sm-12">  
					<label for="admin_role_id" class="control-label">To Group *</label>
					<select name="role_id" class="form-control form-group" id="role_id"  >
						<option value="">--Select Group--</option>
                  <?php
                        $login_user_role_id = $this->session->userdata('role_id');
                    foreach($roles as $role)
                    {
                        if($login_user_role_id == 8 && in_array($role['role_id'],array(7))){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>';
                        }else if($login_user_role_id == 7 && in_array($role['role_id'],array(1,8))){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>';
                        }else if($login_user_role_id == 6 && in_array($role['role_id'],array(2,4))){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>'; 
                        }else if($login_user_role_id == 5 && in_array($role['role_id'],array(1,2,4))){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>';
                        }else if($login_user_role_id == 4 && in_array($role['role_id'],array(1,2,5))){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>';
                        }else if($login_user_role_id == 3 && in_array($role['role_id'],array(2))){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>';
                        }else if($login_user_role_id == 2 && in_array($role['role_id'],array(1,3,4,6))){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>';
                        }elseif($login_user_role_id == 1){
                             echo '<option value="'.$role['role_id'].'"'.set_select('role_id',$role['role_id']).'>'.$role['role_name'].'</option>';
                        }
                       
                    }
				  ?>
                  	</select>                    
                </div>
                <div class="col-lg-6 col-sm-12">                         
                   <label for="notification_title" class="control-label">Message Subject *</label>
                    <input type="text" name="msg_subject" class="form-control form-group" id="msg_subject" placeholder="Message Subject" required="required">
                </div>
            </div>
            
             <div class="row">
                <div class="col-lg-6 col-sm-12"> 
                    <label for="msg_recivers" class="control-label">Select Reciver(s)</label>
                    <select id="msg_recivers" name="msg_recivers[]" multiple="multiple" class="form-control form-group">
                      <option value="">-- Select a user --</option>
                    </select>
                </div>
            </div>
          <div class="row">
              <div class="col-lg-12 col-sm-12"> 
                <label for="notification_desc" class="control-label">Description *</label>
                <textarea name="msg_body" class="form-control" rows="5" id="msg_body" required></textarea>
              </div>
            </div>
            <div class="row">
                 <div class ="col-lg-12 col-sm-12" style="float:right;margin-top: 5px;">
                     <input type="submit" id="btnadd" name="btnadd" class="btn btn-success" value="Submit" style="width:120px; float:right"/>
                </div> 
            </div>


            <!-- Data table start here--------------------------->

            
           
              <div class="card-body table-responsive">

                <table id="na_datatable" class="table table-bordered table-striped" width="100%">

                  <thead>

                    <tr>
                      <th>Sr.</th>
                      <!--<th>Reciver</th>-->
                      <th>Subject</th>
                      <th>Message Date</th>
                      <th>To Group</th>
                      <th>Message</th>
                      <th>View</th>
                    </tr>

                  </thead>
                </table>

              </div>

            

            <?php echo form_close( ); ?>

          <!-- /.box-body -->

        </div>

      </div>

    </section> 

  </div>

		



<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script type="text/javascript">
function load_users(){
    $.post('<?=base_url("admin/notification/user_by_role")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      role_id : this.value,
      //district_id : $('#district_id').val(),
     // tehsil_id : $('#tehsil_id').val()
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#msg_recivers option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#msg_recivers')
         .append($("<option></option>")
                    .attr("value", value.admin_id)
                    .text(value.admin_name)
              ); 
        });   
    });	
    
}

$('#role_id').on('change', function() {


      $.post('<?=base_url("admin/notification/user_by_role")?>',

    {

      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

      role_id : this.value,
      district_id : $('#district_id').val(),
      tehsil_id : $('#tehsil_id').val()

    },

    function(data){

      arr = $.parseJSON(data);     

      console.log(arr);     

      $('#msg_recivers option:not(:first)').remove();
 
      $.each(arr, function(key, value) {           

     $('#msg_recivers')

         .append($("<option></option>")

                    .attr("value", value.admin_id)

                    .text(value.admin_name)

                  ); 

        });   

    });	

});


</script>

<?php

$role_id     = (isset($role_id)&&$role_id!="0") ? $role_id : 0;
//$subject   = (isset($item_subject_id)&&$item_subject_id!="0") ? $item_subject_id : 0;

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

    "ajax": "<?=base_url('admin/notification/message_jason')?>",

      "columnDefs": [

        { "targets": 0, "name": "ci_messages.msg_id", 'searchable':false, 'orderable':true},
        //{ "targets": 1, "name": "msg_type", 'searchable':false, 'orderable':true},
        { "targets": 1, "name": "msg_subject", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "created_at", 'searchable':false, 'orderable':true},
        { "targets": 3, "name": "role_name", 'searchable':false, 'orderable':true},
        { "targets": 4, "name": "msg_body", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "msg_id", 'searchable':false, 'orderable':false}
    
       
    ]

  });

  table.buttons().container()

        .appendTo( '#na_datatable .col-md-6:eq(0)' );



</script>





