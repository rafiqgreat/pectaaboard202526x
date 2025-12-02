  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-edit"></i>

              &nbsp; Approval Form of Itemreviewers </h3>

          </div>

          <div class="d-inline-block float-right">

            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Itemreviewers List</a>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php //echo '<PRE>';

			//print_r($subjects); ?>

            <?php echo form_open(base_url('admin/itemreviewers/itemreviewers_approve/'.$itemreviewers['ci_ir_id']), 'class="form-horizontal"' )?> 

              <div class="row">                                         

                <div class="col-lg-3 col-sm-12">

                <label for="itemreviewersname" class="col-sm-12 control-label">itemreviewers Name(Unique)</label>

                  <input type="text" name="itemreviewersname" value="<?= $itemreviewers['ci_ir_username']; ?>" class="form-control" id="itemreviewersname" placeholder="" readonly="readonly">

                </div>

                <div class="col-lg-3 col-sm-12">

                <label for="password" class="col-sm-12 control-label">Password</label>

                  <input type="hidden" name="old_password" class="form-control form-group" id="old_password" value="<?= $itemreviewers['ci_ir_password']; ?>"  placeholder="" > 

                  <input type="password" name="password" class="form-control form-group" id="password" value=""  placeholder="" >                

              </div>

                <div class="col-lg-3 col-sm-12">

                <label for="firstname" class="col-sm-12 control-label">First Name</label>

                  <input type="text" name="firstname" class="form-control form-group" id="firstname" value="<?= $itemreviewers['ci_ir_fname']; ?>" placeholder="" required="required" readonly="readonly">

                </div>                  

                <div class="col-lg-3 col-sm-12">

                <label for="lastname" class="col-sm-12 control-label">Last Name</label>

                  <input type="text" name="lastname" class="form-control form-group" id="lastname" value="<?= $itemreviewers['ci_ir_lname']; ?>" placeholder="" required="required" readonly="readonly">

                </div>

              </div>

              <div class="row">                

              <div class="col-lg-3 col-sm-12">

                <label for="email" class="col-sm-12 control-label">Email</label>

                  <input type="email" name="email" class="form-control form-group" id="email"  value="<?= $itemreviewers['ci_ir_email']; ?>" placeholder="" required="required" readonly="readonly">

                </div>                

                <div class="col-lg-3 col-sm-12">

                <label for="mobile_no" class="col-sm-12 control-label">Mobile No</label>

                  <input type="number" name="mobile_no" class="form-control form-group" id="mobile_no" value="<?= $itemreviewers['ci_ir_mobile']; ?>" placeholder="" required="required" readonly="readonly">

                </div>

                  <div class="col-lg-3 col-sm-12">

                    <label for="address" class="col-sm-12 control-label">Address</label>

                    <input type="text" name="address" class="form-control" id="address" value="<?= $itemreviewers['ci_ir_address']; ?>" placeholder="" required="required" readonly="readonly">

                  </div>

 				  <div class="col-lg-3 col-sm-12">  

                    <label for="is_active" class="col-sm-12 control-label">Itemreviewers Status</label>

                    <select name="is_active" class="form-control">

                    <option value="1" >Active</option>

                    <option value="0" >Deactive</option>

                  </select>

                  </div>

              </div>

              

              <div class="form-group row">

              	<div class="col-lg-3 col-sm-12">

                    <label for="address" class="col-sm-12 control-label">Subject</label>

                    <input type="text" name="address" class="form-control" id="address" value="<?= $itemreviewers['ci_ir_subject']; ?>" placeholder="" required="required" readonly="readonly">

                  </div>

              	<div class="col-lg-3 col-sm-12"> 

              		<label for="admin_role_id" class="col-sm-12 control-label">Role</label>

                	<input type="text" name="admin_role_id" class="form-control" id="admin_role_id" value="Item Reviewer" placeholder="Itemreviewer" readonly="readonly">

                </div>

                <div class="form-group col-lg-6 col-sm-12" id="div_sel_roles">

                <label for="parent_admin_id" class="col-sm-12 ">Select Parent</label>

                  <select name="parent_admin_id" class="form-group form-control" id="parent_admin_id" required="required">

                  <option value="">--Select Subject Specialist--</option>

                  <?php

				  

                  foreach($aes as $ae)

                  {

					  echo '<option value="'.$ae['admin_id'].'">'.$ae['username'].'</option>';

                  }

                  ?>

                  </select>

               </div>

              </div>

       		  

              <div class="form-group row" > 

                <div class="col-lg-12 col-sm-12" id="iw_subjects">              

                 &nbsp;

                  </div>

                </div>       

              <div class="form-group">

                <div class="col-md-12">

                  <input type="submit" name="submit" value="Approve Itemreviewers" class="btn btn-info pull-right">

                </div>

              </div>

            <?php echo form_close(); ?>

        </div>

        <!-- /.box-body -->

      </div>

    </section>

  </div> 

<script language="javascript" type="text/javascript">

$('#parent_admin_id').on('change', function() {

	//alert('abc');

      $.post('<?=base_url("admin/itemreviewers/getSubjectsByAE_ID")?>',

    {

      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

      admin_id : this.value

    },

    function(data){

		//console.log(data);

      arr = $.parseJSON(data);     

 //     console.log(arr);

 if(arr.length > 0) { $("#iw_subjects").html('<label for="lables" class="col-sm-12 control-label" >Select Subjects</label>'); }

	  arr.forEach(function(item) {

    	//console.log(item);

		$("#iw_subjects").append('<div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="'+item.subject_id+'" /><label for="subjects" style="padding:0px 10px;" >'+item.subject_name_en+'(G-'+(parseInt(item.subject_gradeid)-2)+')</label></div>');

	});

    });

   });	

</script>

