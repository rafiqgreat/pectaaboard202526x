  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-edit"></i>&nbsp; Edit Item Writer Profile</h3>
				</div>
				<div class="d-inline-block float-right">
					<!--<a href="<?= base_url('admin/profile'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Itemwriters List</a>-->
				</div>
			</div>
			<?php if($this->session->userdata('admin_id') != $this->uri->segment(4)){
				redirect(base_url('admin/profile/profile_edit/'.$this->session->userdata('admin_id')), 'refresh');
				}
			  ?>
			<div class="card-body">
				<?php 
				$profileinfo =$profileinfo[0];
				//echo '<PRE>';
				//print_r($profileinfo);
				//die();?>
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php') ?>

				<?php echo form_open(base_url('admin/profile/profile_edit/'.$profileinfo['admin_id']), 'class="form-horizontal" name="frm_profile_edit" id="frm_profile_edit" method="POST" enctype="multipart/form-data" ');  ?>
				<input type="hidden" id="admin_id" name="admin_id" value="<?= $profileinfo['admin_id']; ?>"/>
				<input type="hidden" id="ci_iw_id" name="ci_iw_id" value="<?= $profileinfo['ci_iw_id']; ?>"/>
				<?php // echo '<PRE>'; print_r($profileinfo);?>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="firstname" class="col-sm-12 control-label">First Name</label>
						<input type="text" name="firstname" class="form-control form-group" id="firstname" value="<?= $profileinfo['firstname']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="lastname" class="col-sm-12 control-label">Last Name</label>
						<input type="text" name="lastname" class="form-control form-group" id="lastname" value="<?= $profileinfo['lastname']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
						<input type="text" name="username" class="form-control form-group" id="username" value="<?= $profileinfo['username']; ?>" placeholder="" readonly="readonly">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="password" class="col-sm-12 control-label">Password</label>
						<input type="hidden" name="old_password" class="form-control form-group" id="old_password" value="<?= $profileinfo['password']; ?>" placeholder="">
						<input type="password" name="password" class="form-control form-group" id="password" value="" placeholder="">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_fathername" class="col-sm-12 control-label">Father's Name</label>
						<input type="text" name="ci_iw_fathername" class="form-control form-group" id="ci_iw_fathername" placeholder="" value="<?= $profileinfo['ci_iw_fathername']; ?>" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_gender" class="col-sm-12 control-label">Gender</label>
						<select name="ci_iw_gender" class="form-control" id="ci_iw_gender" placeholder="" required="required">
							<option value="Male" <?=( $profileinfo[ 'ci_iw_gender']=="Male" )? 'selected': '' ?>>Male</option>
							<option value="Female" <?=( $profileinfo[ 'ci_iw_gender']=="Female" )? 'selected': '' ?>>Female</option>
							<option value="Others" <?=( $profileinfo[ 'ci_iw_gender']=="Others" )? 'selected': '' ?>>Others</option>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="mobile_no" class="col-sm-12 control-label">Mobile Number</label>
						<input type="number" name="mobile_no" class="form-control form-group" id="mobile_no" value="<?= $profileinfo['mobile_no']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="email" class="col-sm-12 control-label">Email</label>
						<input type="email" name="email" class="form-control form-group" id="email" value="<?= $profileinfo['email']; ?>" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_dob" class="col-sm-12 control-label">Date of Birth</label>
						<input type="date" name="ci_iw_dob" class="form-control form-group" id="ci_iw_dob" value="<?= $profileinfo['ci_iw_dob']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_cnic" class="col-sm-12 control-label">CNIC</label>
						<input type="number" name="ci_iw_cnic" class="form-control form-group" id="ci_iw_cnic" value="<?= $profileinfo['ci_iw_cnic']; ?>" placeholder="" required="required" readonly="readonly">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_designation" class="col-sm-12 control-label">Designation</label>
						<input type="text" name="ci_iw_designation" class="form-control form-group" id="ci_iw_designation" value="<?= $profileinfo['ci_iw_designation']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_posting" class="col-sm-12 control-label">Place of Posting</label>
						<input type="text" name="ci_iw_posting" class="form-control form-group" id="ci_iw_posting" value="<?= $profileinfo['ci_iw_posting']; ?>" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_subject" class="col-sm-12 control-label">Subject</label>
						<input type="text" name="ci_iw_subject" class="form-control" id="ci_iw_subject" value="<?= $profileinfo['ci_iw_subject']; ?>" placeholder="" readonly="readonly">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_deptttype" class="col-sm-12 control-label">Department</label>
						<select name="ci_iw_deptttype" class="form-control" id="ci_iw_deptttype" placeholder="" required="required">
							<option value="0">-----Select Department----</option>
							<option value="Public" <?=( $profileinfo[ 'ci_iw_deptttype']=="Public" )? 'selected': '' ?>>Public</option>
							<option value="Private" <?=( $profileinfo[ 'ci_iw_deptttype']=="Private" )? 'selected': '' ?>>Private</option>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_publictype" class="col-sm-12 control-label">Public School Type</label>
						<select name="ci_iw_publictype" class="form-control" id="ci_iw_publictype" placeholder="" required="required">
							<option value="0">----Select School Type----</option>
							<option value="SED" <?=( $profileinfo[ 'ci_iw_publictype']=="SED" )? 'selected': '' ?>>SED</option>
							<option value="FEDERAL" <?=( $profileinfo[ 'ci_iw_publictype']=="FEDERAL" )? 'selected': '' ?>>FEDERAL</option>
							<option value="PEF" <?=( $profileinfo[ 'ci_iw_publictype']=="PEF" )? 'selected': '' ?>>PEF</option>
							<option value="WORKERSWELFARE" <?=( $profileinfo[ 'ci_iw_publictype']=="WORKERSWELFARE" )? 'selected': '' ?>>WORKERSWELFARE</option>
							<option value="COMMUNITY" <?=( $profileinfo[ 'ci_iw_publictype']=="COMMUNITY" )? 'selected': '' ?>>COMMUNITY</option>
							<option value="LITERACY" <?=( $profileinfo[ 'ci_iw_publictype']=="LITERACY" )? 'selected': '' ?>>LITERACY</option>
							<option value="PSSP" <?=( $profileinfo[ 'ci_iw_publictype']=="PSSP" )? 'selected': '' ?>>PSSP</option>
							<option value="DANISH" <?=( $profileinfo[ 'ci_iw_publictype']=="DANISH" )? 'selected': '' ?>>DANISH</option>
							<option value="INSAFAFTERNOON" <?=( $profileinfo[ 'ci_iw_publictype']=="INSAFAFTERNOON" )? 'selected': '' ?>>INSAFAFTERNOON</option>
							<option value="OTHERS" <?=( $profileinfo[ 'ci_iw_publictype']=="OTHERS" )? 'selected': '' ?>>OTHERS</option>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_area" class="col-sm-12 control-label">Area</label>
						<select name="ci_iw_area" class="form-control" id="ci_iw_area" placeholder="" required="required">
							<option value="Urban" <?=( $profileinfo[ 'ci_iw_area']=="Urban" )? 'selected': '' ?>>Urban</option>
							<option value="Rural" <?=( $profileinfo[ 'ci_iw_area']=="Rural" )? 'selected': '' ?>>Rural</option>
						</select>
					</div>
				</div>
				<div class="row" style="padding-top:15px">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_district" class="col-sm-12 control-label">District</label>
						<select name="ci_iw_district" class="form-control" id="ci_iw_district" placeholder="" required="required" value="" disabled>
							<option value="">---Select District---</option>
							<?php 
							foreach($districts as $row)
							{
							$selectedText = '';
							if($profileinfo['ci_iw_district']==$row['district_id'])
							$selectedText = ' selected="selected" ';
							echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; 
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_tehsil" class="col-sm-12 control-label">Tehsil</label>
						<select name="ci_iw_tehsil" class="form-control form-group" id="ci_iw_tehsil" placeholder="" required="required" disabled>
							<option value="">---Select Tehsil---</option>
							<?php
							$tehsils  = $this->user_model->get_tehsil_by_district($profileinfo['ci_iw_district']);
							foreach ( $tehsils as $tehsil ) {
								$selectedText = '';
								if ( $tehsil[ 'tehsil_id' ] == $profileinfo[ 'ci_iw_tehsil' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="' . $tehsil[ 'tehsil_id' ] . '" ' . $selectedText . '>' . $tehsil[ 'tehsil_name_en' ] . '</option>';
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_cniccopy" class="col-sm-12 control-label">CNIC Copy</label>
						<input type="file" name="ci_iw_cniccopy" id="ci_iw_cniccopy" class="form-control form-group" value="" placeholder="">
						<?php if ($profileinfo['ci_iw_cniccopy'] != ""){?><img src="<?php echo base_url().$profileinfo['ci_iw_cniccopy'];?>" style="max-height:100px; max-width:100px;"/>
						<?php }?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_picture" class="col-sm-12 control-label">Picture</label>
						<input type="file" name="ci_iw_picture" id="ci_iw_picture" class="form-control form-group" value="" placeholder="">
						<?php if ($profileinfo['ci_iw_picture'] != ""){?><img src="<?php echo base_url().$profileinfo['ci_iw_picture'];?>" style="max-height:100px; max-width:100px;"/>
						<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="address" class="col-sm-12 control-label">Address</label>
						<input type="text" name="address" class="form-control form-group" id="address" value="<?= $profileinfo['ci_iw_address']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12"></div>
					<div class="col-lg-3 col-sm-12"></div>
					<div class="col-lg-3 col-sm-12"></div>
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
								if ( $qualification[ 'q_degree_name' ] == $profileinfo[ 'ci_iw_qualification' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="'.$qualification['q_degree_name'].'"'.$selectedText.'>'.$qualification['q_degree_name'].'</option>'; 
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="latestdegree" class="col-sm-12 control-label">Latest Degree</label>
						<input type="file" name="latestdegree" class="form-control form-group" id="latestdegree" placeholder="" >
						<?php if ($profileinfo['ci_iw_latestdegree'] != ""){?><img src="<?php echo base_url().$profileinfo['ci_iw_latestdegree'];?>" style="max-height:100px; max-width:100px;"/>
						<?php }?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceschool" class="col-sm-12 control-label">Experience School (No. of years)</label>
						<input type="number" name="experienceschool" class="form-control form-group" id="experienceschool" value="<?= $profileinfo['ci_iw_experienceschool']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceletter" class="col-sm-12 control-label">Experience Letter</label>
						<input type="file" name="experienceletter" class="form-control form-group" id="experienceletter" placeholder="" >
						<?php if ($profileinfo['ci_iw_experienceletter'] != ""){?><img src="<?php echo base_url().$profileinfo['ci_iw_experienceletter'];?>" style="max-height:100px; max-width:100px;"/>
						<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
					<label for="bankname" class="col-sm-12 control-label">Bank Name</label>
						<select name="bankname" class="form-control form-group" id="bankname" placeholder="" required="required">
							<option value="">---Select Bank---</option>
							<?php 
							foreach($banks as $bank)
							{
								$selectedText = '';
								if ( $bank[ 'b_bank_name' ] == $profileinfo[ 'ci_iw_bankname' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="'.$bank['b_bank_name'].'"'.$selectedText.'>'.$bank['b_bank_name'].'</option>'; 
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="branchcode" class="col-sm-12 control-label">Branch Code</label>
						<input type="text" name="branchcode" class="form-control form-group" id="branchcode" value="<?= $profileinfo['ci_iw_branchcode']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accounttitle" class="col-sm-12 control-label">Account Title</label>
						<input type="text" name="accounttitle" class="form-control form-group" id="accounttitle" value="<?= $profileinfo['ci_iw_accounttitle']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accountnumber" class="col-sm-12 control-label">Account Number</label>
						<input type="text" name="accountnumber" class="form-control form-group" id="accountnumber" value="<?= $profileinfo['ci_iw_accountnumber']; ?>" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="iban" class="col-sm-12 control-label">IBAN</label>
						<input type="text" name="iban" class="form-control form-group" id="iban" value="<?= $profileinfo['ci_iw_iban']; ?>" placeholder="">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_iw_status" class="col-sm-12 control-label">Status</label>
						<select name="ci_iw_status" class="form-control" id="ci_iw_status" placeholder="" required="required" disabled>
							<option value="0" <?=( $profileinfo[ 'ci_iw_status']==0 )? 'selected': '' ?> >In-Active</option>
							<option value="1" <?=( $profileinfo[ 'ci_iw_status']==1 )? 'selected': '' ?> >Active</option>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" name="submit" value="Update Profile" class="btn btn-info pull-right">
					</div>
				</div>
				<?php echo form_close( ); ?>
			</div>
			<!-- /.box-body -->
		</div>
	</section>
</div>
<script language="javascript" type="text/javascript">
	$( '#ci_iw_district' ).on( 'change', function () {
		$.post( '<?=base_url("admin/itemwriter/tehsil_by_district")?>', {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				district_id: this.value
			},
			function ( data ) {
				arr = $.parseJSON( data );
				console.log( arr );
				$( '#ci_iw_tehsil option:not(:first)' ).remove();
				$.each( arr, function ( key, value ) {
					$( '#ci_iw_tehsil' )
						.append( $( "<option></option>" )
							.attr( "value", value.tehsil_id )
							.text( value.tehsil_name_en )
						);
				} );
			} );
	} );
	
  /*$('#username').on('blur', function() {
      $.post('< ?=base_url("admin/profileinfo/username_exist")?>',
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
    });*/
	
</script>