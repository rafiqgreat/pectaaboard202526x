  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Itemwriter </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/itemwriters'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Itemwriters List</a>
          </div>
        </div>
        <div class="card-body">   
			
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/itemwriters/edit/'.$itemwriters['ci_iw_id']), 'class="form-horizontal" name="frm_itmewriter_add" id="frm_itmewriters_add" method="POST" enctype="multipart/form-data" ');  ?> 
			<input type="hidden" id="ci_iw_adminid" name="ci_iw_adminid" value="<?= $itemwriters['ci_iw_adminid']; ?>" />
            	<?php // echo '<PRE>'; print_r($itemwriters);?>
              <div class="row">                                        
                <div class="col-lg-3 col-sm-12">
                <label for="firstname" class="col-sm-12 control-label">First Name</label>
                  <input type="text" name="firstname" class="form-control form-group" id="firstname" value="<?= $itemwriters['ci_iw_fname']; ?>" placeholder="" required="required">
                </div>                  
                <div class="col-lg-3 col-sm-12">
                <label for="lastname" class="col-sm-12 control-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control form-group" id="lastname" value="<?= $itemwriters['ci_iw_lname']; ?>" placeholder="" required="required">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
                  <input type="text" name="username" class="form-control form-group" id="username" value="<?= $itemwriters['ci_iw_username']; ?>" placeholder="" readonly="readonly">
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="password" class="col-sm-12 control-label">Password</label> 
                  <input type="hidden" name="old_password" class="form-control form-group" id="old_password" value="<?= $itemwriters['ci_iw_password']; ?>"  placeholder="" >                
                  <input type="password" name="password" class="form-control form-group" id="password" value="" placeholder="" >                
              </div>
              </div>
              <div class="row"> 
                 <div class="col-lg-3 col-sm-12">
                <label for="fathername" class="col-sm-12 control-label">Father's Name</label>
                  <input type="text" name="fathername" class="form-control form-group" id="fathername" placeholder="" value="<?= $itemwriters['ci_iw_fathername']; ?>" required="required">
                </div>                                          
                 <div class="col-lg-3 col-sm-12">
                	<label for="gender" class="col-sm-12 control-label">Gender</label>
                     <select name="gender" class="form-control" id="gender" placeholder="" required="required">
                        <option value="Male"  <?= ($itemwriters['ci_iw_gender'] == "Male")?'selected': '' ?>>Male</option>
                        <option value="Female" <?= ($itemwriters['ci_iw_gender'] == "Female")?'selected': '' ?>>Female</option>
                        <option value="Others" <?= ($itemwriters['ci_iw_gender'] == "Others")?'selected': '' ?>>Others</option>
                    </select>
                </div>
               <div class="col-lg-3 col-sm-12">
                <label for="mobilenumber" class="col-sm-12 control-label">Mobile Number</label>
                  <input type="number" name="mobilenumber" class="form-control form-group" id="mobilenumber" value="<?= $itemwriters['ci_iw_mobile']; ?>" placeholder="">
                </div> 
               <div class="col-lg-3 col-sm-12">
                <label for="email" class="col-sm-12 control-label">Email</label>
                  <input type="email" name="email" class="form-control form-group" id="email" value="<?= $itemwriters['ci_iw_email']; ?>" placeholder="" required="required">
                </div>
            </div>
              <div class="row">
                <div class="col-lg-3 col-sm-12">
                <label for="dob" class="col-sm-12 control-label">Date of Birth</label>
                  <input type="date" name="dob" class="form-control form-group" id="dob" value="<?= $itemwriters['ci_iw_dob']; ?>" placeholder="" required="required">
                </div>               
                <div class="col-lg-3 col-sm-12">
                <label for="cnic" class="col-sm-12 control-label">CNIC</label>
                  <input type="number" name="cnic" class="form-control form-group" id="cnic" value="<?= $itemwriters['ci_iw_cnic']; ?>" placeholder="" required="required" readonly="readonly">
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="designation" class="col-sm-12 control-label">Designation</label>                
                	<input type="text" name="designation" class="form-control form-group" id="designation" value="<?= $itemwriters['ci_iw_designation']; ?>"  placeholder="" required="required">                
              	</div>
                <div class="col-lg-3 col-sm-12">
                <label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>
                  <input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" value="<?= $itemwriters['ci_iw_posting']; ?>" placeholder="" required="required">
                </div>
              </div>
              <div class="row">                
                <div class="col-lg-3 col-sm-12">
                <label for="subject" class="col-sm-12 control-label">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject" value="<?= $itemwriters['ci_iw_subject']; ?>" placeholder="" readonly="readonly">
                   <?php /*?>
                    <select name="subject" class="form-control" id="subject" placeholder="" required="required" >
                        <option value="0">----Select Subject----</option>
                        <option value="English" <?= ($itemwriters['ci_iw_subject']=="English")? 'selected' : '' ?>>English-انگریزی</option>
                        <option value="Urdu" <?= ($itemwriters['ci_iw_subject']=="Urdu")? 'selected' : '' ?>>Urdu-اردو</option>
                        <option value="Math" <?= ($itemwriters['ci_iw_subject']=="Math")? 'selected' : '' ?>>Math-ریاضی</option>
                        <option value="General Knowledge" <?= ($itemwriters['ci_iw_subject']=="General Knowledge")? 'selected' : '' ?>>General Knowledge-جنرل نالج</option>
                        <option value="Religious Education" <?= ($itemwriters['ci_iw_subject']=="Religious Education")? 'selected' : '' ?>>Religious Education-دینی تعلیم</option>
                        <option value="Islamiat" <?= ($itemwriters['ci_iw_subject']=="Islamiat")? 'selected' : '' ?>>Islamiat-اسلامیات</option>
                        <option value="Social Studies" <?= ($itemwriters['ci_iw_subject']=="Social Studies")? 'selected' : '' ?>>Social Studies-شوشل سٹڈی</option>
                        <option value="Science" <?= ($itemwriters['ci_iw_subject']=="Science")? 'selected' : '' ?>>Science-سائینس</option>
                        <option value="Computer Education" <?= ($itemwriters['ci_iw_subject']=="Computer Education")? 'selected' : '' ?>>Computer Education-کمپوٹر تعلیم</option>
                        <option value="Ethics" <?= ($itemwriters['ci_iw_subject']=="Ethics")? 'selected' : '' ?>>Ethics-اخلاقیات</option>
                    </select>
                    <?php */?>
                </div>
                <div class="col-lg-3 col-sm-12">
                	<label for="department" class="col-sm-12 control-label">Department</label>                
                	<select name="department" class="form-control" id="department" placeholder="" required="required">
                        <option value="0">-----Select Department----</option>
                        <option value="Public" <?= ($itemwriters['ci_iw_deptttype'] == "Public")?'selected': '' ?>>Public</option>
                        <option value="Private" <?= ($itemwriters['ci_iw_deptttype'] == "Private")?'selected': '' ?>>Private</option>
                    </select>                
              	</div>
                <div class="col-lg-3 col-sm-12">
                	<label for="publictype" class="col-sm-12 control-label">Public School Type</label>
                     <select name="publictype" class="form-control" id="publictype" placeholder="" required="required">
                        <option value="0">----Select School Type----</option>
                        <option value="SED" <?= ($itemwriters['ci_iw_publictype'] == "SED")?'selected': '' ?>>SED</option>
                        <option value="FEDERAL" <?= ($itemwriters['ci_iw_publictype'] == "FEDERAL")?'selected': '' ?>>FEDERAL</option>
                        <option value="PEF" <?= ($itemwriters['ci_iw_publictype'] == "PEF")?'selected': '' ?>>PEF</option>
                        <option value="WORKERSWELFARE" <?= ($itemwriters['ci_iw_publictype'] == "WORKERSWELFARE")?'selected': '' ?>>WORKERSWELFARE</option>
                        <option value="COMMUNITY" <?= ($itemwriters['ci_iw_publictype'] == "COMMUNITY")?'selected': '' ?>>COMMUNITY</option>
                        <option value="LITERACY" <?= ($itemwriters['ci_iw_publictype'] == "LITERACY")?'selected': '' ?>>LITERACY</option>
                        <option value="PSSP" <?= ($itemwriters['ci_iw_publictype'] == "PSSP")?'selected': '' ?>>PSSP</option>
                        <option value="DANISH" <?= ($itemwriters['ci_iw_publictype'] == "DANISH")?'selected': '' ?>>DANISH</option>
                        <option value="INSAFAFTERNOON" <?= ($itemwriters['ci_iw_publictype'] == "INSAFAFTERNOON")?'selected': '' ?>>INSAFAFTERNOON</option>
                        <option value="OTHERS" <?= ($itemwriters['ci_iw_publictype'] == "OTHERS")?'selected': '' ?>>OTHERS</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="area" class="col-sm-12 control-label">Area</label>
                   <select name="area" class="form-control" id="area" placeholder="" required="required">
                        <option value="Urban" <?= ($itemwriters['ci_iw_area'] == "Urban")?'selected': '' ?>>Urban</option>
                        <option value="Rural" <?= ($itemwriters['ci_iw_area'] == "Rural")?'selected': '' ?>>Rural</option>
                    </select>
                </div>
              </div>
              <div class="row" style="padding-top:15px">                
                <div class="col-lg-3 col-sm-12">
                <label for="district" class="col-sm-12 control-label">District</label>
                <select name="district" class="form-control" id="district" placeholder="" required="required">
                    <option value="">---Select District---</option>
                    <?php 
                    foreach($districts as $row)
                    {
                    $selectedText = '';
                    if($itemwriters['ci_iw_district']==$row['district_id'])
                    $selectedText = ' selected="selected" ';
                    echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; 
                    }
                    ?>
                </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="tehsil" class="col-sm-12 control-label">Tehsil</label>
                  <select name="tehsil" class="form-control form-group" id="tehsil" placeholder="" required="required">
                    	<option value="">---Select Tehsil---</option>
                    	<?php
					  	   $tehsils  = $this->Itemwriters_model->get_tehsil_by_district($itemwriters['ci_iw_district']);
						   foreach($tehsils as $tehsil)
							  {
								$selectedText = '';
								  if($tehsil['tehsil_id']==$itemwriters['ci_iw_tehsil'])
								  $selectedText = ' selected="selected" ';
								echo '<option value="'.$tehsil['tehsil_id'].'" '.$selectedText.'>'.$tehsil['tehsil_name_en'].'</option>';
							  }
						  ?>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">
                <label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>
                  <input type="file" name="cniccopy" id="cniccopy" class="form-control form-group" value=""  placeholder="" >
					<?php if ($itemwriters['ci_iw_cniccopy'] != "" && file_exists(FCPATH.$itemwriters['ci_iw_cniccopy'])){?><a download href="<?php echo base_url().$itemwriters['ci_iw_cniccopy'];?>"><img src="<?php echo base_url().$itemwriters['ci_iw_cniccopy'];?>" style="max-height:100px; max-width:100px;"/><!--<br>Click to Download--></a><br><?php }?>
                </div>                  
                <div class="col-lg-3 col-sm-12">
                <label for="picture" class="col-sm-12 control-label">Picture</label>
                  <input type="file" name="picture" id="picture" class="form-control form-group" value=""  placeholder="" >
					<?php if ($itemwriters['ci_iw_picture'] != "" && file_exists(FCPATH.$itemwriters['ci_iw_picture'])){?><a download href="<?php echo base_url().$itemwriters['ci_iw_picture'];?>"><img src="<?php echo base_url().$itemwriters['ci_iw_picture'];?>" style="max-height:100px; max-width:100px;"/><!--<br>Click to Download--></a><br><?php }?>
                </div>
              </div>
			
              <div class="row">   
				  <div class="col-lg-3 col-sm-12">
						<label for="address" class="col-sm-12 control-label">Address</label>
						<input type="text" name="address" class="form-control form-group" id="address" placeholder="" value="<?php print $itemwriters['ci_iw_address']?>" required="required">
					</div>
                <div class="col-lg-3 col-sm-12">
                <label for="status" class="col-sm-12 control-label">Status</label>
                  <select name="status" class="form-control" id="status" placeholder="" required="required">
                        <option value="0" <?= ($itemwriters['ci_iw_status'] == 0)?'selected': '' ?> >In-Active</option>
                        <option value="1" <?= ($itemwriters['ci_iw_status'] == 1)?'selected': '' ?> >Active</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12"></div>
                <div class="col-lg-3 col-sm-12">
                </div>
                
              </div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
					<label for="qualification" class="col-sm-12 control-label">Qualification</label>
						<select name="qualification" class="form-control form-group" id="qualification" placeholder="" required="required">
							<option value="">---Select Qualification---</option>
							<?php 
							foreach($qualifications as $qualification)
							{
								$selectedText = '';
								if ( $qualification[ 'q_degree_name' ] == $itemwriters[ 'ci_iw_qualification' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="'.$qualification['q_degree_name'].'"'.$selectedText.'>'.$qualification['q_degree_name'].'</option>'; 
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="latestdegree" class="col-sm-12 control-label">Latest Degree</label>
						<input type="file" name="latestdegree" class="form-control form-group" id="latestdegree" placeholder="" >
						<?php if ($itemwriters['ci_iw_latestdegree'] != "" && file_exists(FCPATH.$itemwriters['ci_iw_latestdegree'])){?><a download href="<?php echo base_url().$itemwriters['ci_iw_latestdegree'];?>"><img src="<?php echo base_url().$itemwriters['ci_iw_latestdegree'];?>" style="max-height:100px; max-width:100px;"/><!--<br>Click to Download--></a><br>
						<?php }?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceschool" class="col-sm-12 control-label">Experience School (No. of years)</label>
						<input type="number" name="experienceschool" class="form-control form-group" id="experienceschool" value="<?= $itemwriters['ci_iw_experienceschool']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceletter" class="col-sm-12 control-label">Experience Letter</label>
						<input type="file" name="experienceletter" class="form-control form-group" id="experienceletter" placeholder="" >
						<?php if ($itemwriters['ci_iw_experienceletter'] != "" && file_exists(FCPATH.$itemwriters['ci_iw_experienceletter'])){?><a download href="<?php echo base_url().$itemwriters['ci_iw_experienceletter'];?>"><img src="<?php echo base_url().$itemwriters['ci_iw_experienceletter'];?>" style="max-height:100px; max-width:100px;"/><!--<br>Click to Download--></a><br>
						<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
					<label for="bankname" class="col-sm-12 control-label">Bank Name</label>
						<select name="bankname" class="form-control form-group" id="bankname" placeholder="">
							<option value="">---Select Bank---</option>
							<?php 
							foreach($banks as $bank)
							{
								$selectedText = '';
								if ( $bank[ 'b_bank_name' ] == $itemwriters[ 'ci_iw_bankname' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="'.$bank['b_bank_name'].'"'.$selectedText.'>'.$bank['b_bank_name'].'</option>'; 
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="branchcode" class="col-sm-12 control-label">Branch Code</label>
						<input type="text" name="branchcode" class="form-control form-group" id="branchcode" value="<?= $itemwriters['ci_iw_branchcode']; ?>" placeholder="">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accounttitle" class="col-sm-12 control-label">Account Title</label>
						<input type="text" name="accounttitle" class="form-control form-group" id="accounttitle" value="<?= $itemwriters['ci_iw_accounttitle']; ?>" placeholder="" >
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accountnumber" class="col-sm-12 control-label">Account Number</label>
						<input type="text" name="accountnumber" class="form-control form-group" id="accountnumber" value="<?= $itemwriters['ci_iw_accountnumber']; ?>" placeholder="">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="iban" class="col-sm-12 control-label">IBAN</label>
						<input type="text" name="iban" class="form-control form-group" id="iban" value="<?= $itemwriters['ci_iw_iban']; ?>" placeholder="">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="admin_role_id" class="col-sm-12 control-label">Role</label>
						<input type="text" name="admin_role_id" class="form-control" id="admin_role_id" value="Item Writer" placeholder="Itemwriter" readonly="readonly">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
				</div>
				<div class="row" style="display: none">
					
					<div class="col-lg-6 col-sm-12" id="div_sel_roles">
						<label for="parent_admin_id" class="col-sm-12 ">Select Parent</label>
					  <select name="parent_admin_id" class="form-group form-control" id="parent_admin_id" required="required"  >
					  	<option value="">--Select Subject Specialist--</option>
						  <?php

						  foreach($subjectspecialist as $ss)
						  {
							  $selected = '';
							  if($ss['admin_id'] == $admininfo['parent_admin_id'])
									$selected = ' selected="selected" ';
								echo '<option value="'.$ss['admin_id'].'" '.$selected.'>'.$ss['username'].'</option>';
						  }
						  ?>
					  </select>
					</div>
					<div class="col-lg-6 col-sm-12">
					</div>
				</div>
				<div class="form-group row" > 
                	<div class="col-lg-12 col-sm-12" id="iw_subjects">  
						<label for="lables" class="col-sm-12 control-label">Select Subjects</label>  <!--<a style="dis" title="Check all" class="view btn btn-sm btn-info" id="checkall" href="#">Check All</a>&nbsp;&nbsp;&nbsp;<a title="Uncheck all" class="view btn btn-sm btn-info" id="uncheckall" href="#">Uncheck All</a><br><br><div style="clear:both">-->
                    </div>
                 		<?php	
					if($admininfo['parent_admin_id'] != 0 && $admininfo['admin_role_id'] != 4){
						$subjects  = $this->Itemwriters_model->get_subject_by_users_id($admininfo['parent_admin_id']);
					}
					foreach($subjects as $subject)
					{
						   $arrSubjects = explode(',',$admininfo['subjects_ids']);
						?> <div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="<?= $subject['subject_id'];?>" <?php if(in_array($subject['subject_id'],$arrSubjects)){ echo 'checked'; } ?>  /><label for="subjects" style="padding:0px 10px;" ><?= $subject['subject_name_en']; ?>(G-<?= $subject['grade_code']; ?>)</label></div><?php
					  }
                  ?>
                  </div>
                </div> 
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>  
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 

<script language="javascript" type="text/javascript">
$('#parent_admin_id').on('change', function() {
	//alert('abc');
      $.post('<?=base_url("admin/itemwriters/getSubjectsByAE_ID")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      admin_id : this.value
    },
    function(data){
		//console.log(data);
      arr = $.parseJSON(data);     
 //     console.log(arr);
 if(arr.length > 0) { $("#iw_subjects").html('<label for="lables" class="col-sm-12 control-label" >Select Subjects</label> <a title="Check all" class="view btn btn-sm btn-info" id="checkall" href="#">Check All</a>&nbsp;&nbsp;&nbsp;<a title="Uncheck all" class="view btn btn-sm btn-info" id="uncheckall" href="#">Uncheck All</a><br><br>'); }
	  arr.forEach(function(item) {
    	//console.log(item);
		$("#iw_subjects").append('<div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="'+item.subject_id+'" /><label for="subjects" style="padding:0px 10px;" >'+item.subject_name_en+'(G-'+(parseInt(item.subject_gradeid)-2)+')</label></div>');
	});
    });
});	
	
/*if ( $( '#parent_admin_id' ).val() != "" )
	{
		//alert($('#parent_admin_id').val());
		$.post( '<?=base_url("admin/itemreviewers/getSubjectsByAE_ID")?>',
			{
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				admin_id: $( '#parent_admin_id' ).val()
			},
			function ( data ) {
				//console.log(data);
				arr = $.parseJSON( data );
				//     console.log(arr);
				if ( arr.length > 0 ) {
				$( "#iw_subjects" ).html( '<label for="lables" class="col-sm-12 control-label" >Select Subjects</label>' );
			}
				arr.forEach( function ( item ) {
					//console.log(item);
					$( "#iw_subjects" ).append( '<div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="' + item.subject_id + '" checked="checked" /><label for="subjects" style="padding:0px 10px;" >' + item.subject_name_en + '(G-' + ( parseInt( item.subject_gradeid ) - 2 ) + ')</label></div>' );
				} );
			} );
	}*/	
</script>

<script language="javascript" type="text/javascript">
$('#district').on('change', function() {
		  $.post('<?=base_url("admin/itemwriter/tehsil_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  district_id : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#tehsil option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#tehsil')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});
	/*
  $('#username').on('blur', function() {
      $.post('< ?=base_url("admin/itemwriters/username_exist")?>',
    {
      '< ?php echo $this->security->get_csrf_token_name(); ?>' : '< ?php echo $this->security->get_csrf_hash(); ?>',
      username : this.value
    },
    function(data){
		  if(data==1){
			alert('Username already exist!');  	
			 $('#username').select();
		  }			  
		})  
    });
	*/
</script>
<script language="javascript" type="text/javascript">
	$(document).on('click','#checkall', function(event){
		event.preventDefault();
		$('.subs').prop('checked', true);
	});

	$(document).on('click','#uncheckall', function(event){
		event.preventDefault();
		$('.subs').prop('checked', false);
	});
</script>