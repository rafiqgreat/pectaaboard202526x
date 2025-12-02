  <?php die('Item reviewer Registration Form');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title" style="padding-left:40px; padding-top:25px"> <i class="fa fa-plus"></i>&nbsp;
              <strong>ITEM REVIEWER REGISTRATION FORM</strong></h3>
          </div>
          
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/itemreviewers/add'), 'class="form-horizontal" name="frm_itemreviewers_add" id="frm_itemreviewers_add" method="POST" enctype="multipart/form-data" ');  ?> 
              <div class="row">                                        
                <div class="col-lg-3 col-sm-12">
                <label for="firstname" class="col-sm-12 control-label">First Name</label>
                  <input type="text" name="firstname" class="form-control form-group" id="firstname" placeholder="" required="required">
                </div>                  
                <div class="col-lg-3 col-sm-12">
                <label for="lastname" class="col-sm-12 control-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control form-group" id="lastname" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
                  <input type="text" name="username" class="form-control form-group" id="username" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="password" class="col-sm-12 control-label">Password</label>                
                  <input type="password" name="password" class="form-control form-group" id="password" placeholder="" required="required">                
              </div>
              </div>
              <div class="row">                                         
                 <div class="col-lg-3 col-sm-12">
                <label for="dob" class="col-sm-12 control-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control form-group" id="dob" placeholder="" required="required">
                </div>                   
                 <div class="col-lg-3 col-sm-12">
                	<label for="gender" class="col-sm-12 control-label">Gender</label>
                     <select name="gender" class="form-control" id="gender" placeholder="" required="required">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
               <div class="col-lg-3 col-sm-12">
                <label for="mobilenumber" class="col-sm-12 control-label">Mobile Number</label>
                  <input type="number" name="mobilenumber" class="form-control form-group" id="mobilenumber" placeholder="" required="required">
                </div> 
               <div class="col-lg-3 col-sm-12">
                <label for="email" class="col-sm-12 control-label">Email</label>
                  <input type="email" name="email" class="form-control form-group" id="email" placeholder="" required="required">
                </div>
            </div>
              <div class="row">                
                <div class="col-lg-3 col-sm-12">
                <label for="cnic" class="col-sm-12 control-label">CNIC</label>
                  <input type="number" name="cnic" class="form-control form-group" id="cnic" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="designation" class="col-sm-12 control-label">Designation</label>                
                	<input type="text" name="designation" class="form-control form-group" id="designation" placeholder="" required="required">                
              	</div>
                <div class="col-lg-6 col-sm-12">
                <label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>
                  <input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" placeholder="" required="required">
                </div>
              </div>
              <div class="row">                
                <div class="col-lg-3 col-sm-12">
                <label for="subject" class="col-sm-12 control-label">Subject</label>
                  <input type="text" name="subject" class="form-control form-group" id="subject" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="department" class="col-sm-12 control-label">Department</label>                
                	<select name="department" class="form-control" id="department" placeholder="" required="required">
                        <option value="0">-----Select Department----</option>
                        <option value="Public">Public</option>
                        <option value="Private">Private</option>
                    </select>                
              	</div>
                <div class="col-lg-3 col-sm-12">
                	<label for="publictype" class="col-sm-12 control-label">Public School Type</label>
                     <select name="publictype" class="form-control" id="publictype" placeholder="" required="required">
                        <option value="0">----Select School Type----</option>
                        <option value="SED">SED</option>
                        <option value="FEDERAL">FEDERAL</option>
                        <option value="PEF">PEF</option>
                        <option value="WORKERSWELFARE">WORKERSWELFARE</option>
                        <option value="COMMUNITY">COMMUNITY</option>
                        <option value="LITERACY">LITERACY</option>
                        <option value="PSSP">PSSP</option>
                        <option value="DANISH">DANISH</option>
                        <option value="INSAFAFTERNOON">INSAFAFTERNOON</option>
                        <option value="OTHERS">OTHERS</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="area" class="col-sm-12 control-label">Area</label>
                   <select name="area" class="form-control" id="area" placeholder="" required="required">
                        <option value="Urban">Urban</option>
                        <option value="Rural">Rural</option>
                    </select>
                </div>
              </div>
              <div class="row">                
                <div class="col-lg-3 col-sm-12">
                <label for="tehsil" class="col-sm-12 control-label">Tehsil</label>
                  <input type="text" name="tehsil" class="form-control form-group" id="tehsil" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="district" class="col-sm-12 control-label">District</label>
                  <input type="text" name="district" class="form-control form-group" id="district" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>
                  <input type="file" name="cniccopy" class="form-control form-group" id="cniccopy" placeholder="" >
                </div>                  
                <div class="col-lg-3 col-sm-12">
                <label for="picture" class="col-sm-12 control-label">Picture</label>
                  <input type="file" name="picture" class="form-control form-group" id="picture" placeholder="" >
                </div>
              </div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="address" class="col-sm-12 control-label">Address</label>
						<input type="text" name="address" class="form-control form-group" id="address" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12"></div>
					<div class="col-lg-3 col-sm-12"></div>
					<div class="col-lg-3 col-sm-12"></div>
				</div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Register" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script language="javascript">
/*
  $('#div_sel_roles').hide();
  $('#div_sel_subjects').hide();
  $('#admin_role_id').on('change', function() 
  {
    if(this.value == 2) 
    { 
      $('#div_sel_roles').hide();
      $('#div_sel_subjects').show();
    }
    else if(this.value == 3) 
    { 
      $('#div_sel_roles').show();
      $('#div_sel_subjects').hide();
    }
    else
    {
      $('#div_sel_roles').hide();
      $('#div_sel_subjects').hide();
    }
  });
*/
  $('#username').on('blur', function() {
      $.post('<?=base_url("admin/itemreviewers/username_exist")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      username : this.value
    },
    function(data){
		  if(data==1){
			alert('Username already exist!');  	
			 $('#username').select();
		  }			  
		})  
    });
/*	
	function checkRoles()
	{
		if($('#admin_role_id').val() == 3)
		{
			if($('#parent_admin_id').val()=="")
			{
				alert('select preent');
				return false;
			}
			else
			{
				return true;
			}
			
			return false;
		}
		else if($('#admin_role_id').val() == 2)
		{
		  var boxes = $('.subs:checked');
		  if(boxes.length>0)
			{
			  return true;
			}
		  else
			{
			  alert('Please select atleast one subject!');
			  return false;
			}
		}
		
	}
*/
</script>
<script language="javascript">
$('#email').on('blur', function() {
      $.post('<?=base_url("admin/itemreviewers/email_exist")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      email : this.value
    },
    function(data){
		  if(data==1){
			alert('Email already exist!');  	
			 $('#email').select();
		  }			  
		})  
    });
</script>	 