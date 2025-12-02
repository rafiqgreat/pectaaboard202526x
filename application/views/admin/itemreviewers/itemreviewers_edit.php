  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Itemreviewer </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/itemreviewers'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Itemreviewers List</a>
				</div>
			</div>
			<div class="card-body">
				<?php 
			//echo '<pre>';
			//print_r($itemreviewers);
			//die(); ?>
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php') ?>

				<?php echo form_open(base_url('admin/itemreviewers/edit/'.$itemreviewers['ci_ir_id']), 'class="form-horizontal" name="frm_itemreviewers_edit" id="frm_itemreviewers_edit" method="POST" enctype="multipart/form-data" ');  ?>
				<input type="hidden" id="ci_ir_adminid" name="ci_ir_adminid" value="<?= $itemreviewers['ci_ir_adminid']; ?>"/>
				<?php // echo '<PRE>'; print_r($itemreviewers);?>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="firstname" class="col-sm-12 control-label">First Name</label>
						<input type="text" name="firstname" class="form-control form-group" id="firstname" value="<?= $itemreviewers['ci_ir_fname']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="lastname" class="col-sm-12 control-label">Last Name</label>
						<input type="text" name="lastname" class="form-control form-group" id="lastname" value="<?= $itemreviewers['ci_ir_lname']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
						<input type="text" name="username" class="form-control form-group" id="username" value="<?= $itemreviewers['ci_ir_username']; ?>" placeholder="" readonly="readonly">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="password" class="col-sm-12 control-label">Password</label>
						<input type="hidden" name="old_password" class="form-control form-group" id="old_password" value="<?= $itemreviewers['ci_ir_password']; ?>" placeholder="">
						<input type="password" name="password" class="form-control form-group" id="password" value="" placeholder="">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="fathername" class="col-sm-12 control-label">Father's Name</label>
						<input type="text" name="fathername" class="form-control form-group" id="fathername" placeholder="" value="<?= $itemreviewers['ci_ir_fathername']; ?>" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="gender" class="col-sm-12 control-label">Gender</label>
						<select name="gender" class="form-control" id="gender" placeholder="" required="required">
							<option value="Male" <?=( $itemreviewers[ 'ci_ir_gender']=="Male" )? 'selected': '' ?>>Male</option>
							<option value="Female" <?=( $itemreviewers[ 'ci_ir_gender']=="Female" )? 'selected': '' ?>>Female</option>
							<option value="Others" <?=( $itemreviewers[ 'ci_ir_gender']=="Others" )? 'selected': '' ?>>Others</option>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="mobilenumber" class="col-sm-12 control-label">Mobile Number</label>
						<input type="number" name="mobilenumber" class="form-control form-group" id="mobilenumber" value="<?= $itemreviewers['ci_ir_mobile']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="email" class="col-sm-12 control-label">Email</label>
						<input type="email" name="email" class="form-control form-group" id="email" value="<?= $itemreviewers['ci_ir_email']; ?>" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="dob" class="col-sm-12 control-label">Date of Birth</label>
						<input type="date" name="dob" class="form-control form-group" id="dob" value="<?= $itemreviewers['ci_ir_dob']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="cnic" class="col-sm-12 control-label">CNIC</label>
						<input type="number" name="cnic" class="form-control form-group" id="cnic" value="<?= $itemreviewers['ci_ir_cnic']; ?>" placeholder="" required="required" readonly="readonly">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="designation" class="col-sm-12 control-label">Designation</label>
						<input type="text" name="designation" class="form-control form-group" id="designation" value="<?= $itemreviewers['ci_ir_designation']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>
						<input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" value="<?= $itemreviewers['ci_ir_posting']; ?>" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="subject" class="col-sm-12 control-label">Subject</label>
						<input type="text" name="subject" class="form-control" id="subject" value="<?= $itemreviewers['ci_ir_subject']; ?>" placeholder="" readonly="readonly">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="department" class="col-sm-12 control-label">Department</label>
						<select name="department" class="form-control" id="department" placeholder="" required="required">
							<option value="0">-----Select Department----</option>
							<option value="Public" <?=( $itemreviewers[ 'ci_ir_deptttype']=="Public" )? 'selected': '' ?>>Public</option>
							<option value="Private" <?=( $itemreviewers[ 'ci_ir_deptttype']=="Private" )? 'selected': '' ?>>Private</option>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="publictype" class="col-sm-12 control-label">Public School Type</label>
						<select name="publictype" class="form-control" id="publictype" placeholder="" required="required">
							<option value="0">----Select School Type----</option>
							<option value="SED" <?=( $itemreviewers[ 'ci_ir_publictype']=="SED" )? 'selected': '' ?>>SED</option>
							<option value="FEDERAL" <?=( $itemreviewers[ 'ci_ir_publictype']=="FEDERAL" )? 'selected': '' ?>>FEDERAL</option>
							<option value="PEF" <?=( $itemreviewers[ 'ci_ir_publictype']=="PEF" )? 'selected': '' ?>>PEF</option>
							<option value="WORKERSWELFARE" <?=( $itemreviewers[ 'ci_ir_publictype']=="WORKERSWELFARE" )? 'selected': '' ?>>WORKERSWELFARE</option>
							<option value="COMMUNITY" <?=( $itemreviewers[ 'ci_ir_publictype']=="COMMUNITY" )? 'selected': '' ?>>COMMUNITY</option>
							<option value="LITERACY" <?=( $itemreviewers[ 'ci_ir_publictype']=="LITERACY" )? 'selected': '' ?>>LITERACY</option>
							<option value="PSSP" <?=( $itemreviewers[ 'ci_ir_publictype']=="PSSP" )? 'selected': '' ?>>PSSP</option>
							<option value="DANISH" <?=( $itemreviewers[ 'ci_ir_publictype']=="DANISH" )? 'selected': '' ?>>DANISH</option>
							<option value="INSAFAFTERNOON" <?=( $itemreviewers[ 'ci_ir_publictype']=="INSAFAFTERNOON" )? 'selected': '' ?>>INSAFAFTERNOON</option>
							<option value="OTHERS" <?=( $itemreviewers[ 'ci_ir_publictype']=="OTHERS" )? 'selected': '' ?>>OTHERS</option>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="area" class="col-sm-12 control-label">Area</label>
						<select name="area" class="form-control" id="area" placeholder="" required="required">
							<option value="Urban" <?=( $itemreviewers[ 'ci_ir_area']=="Urban" )? 'selected': '' ?>>Urban</option>
							<option value="Rural" <?=( $itemreviewers[ 'ci_ir_area']=="Rural" )? 'selected': '' ?>>Rural</option>
						</select>
					</div>
				</div>
				<div class="row" style="padding-top:15px">
					<div class="col-lg-3 col-sm-12">
						<label for="district" class="col-sm-12 control-label">District</label>
						<select name="district" class="form-control" id="district" placeholder="" required="required" value="<?= $school['school_district_id'] ?>">
							<option value="">---Select District---</option>
							<?php 
								foreach($districts as $row)
								{
								$selectedText = '';
								if($itemreviewers['ci_ir_district']==$row['district_id'])
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
							foreach ( $tehsils as $tehsil )
							{
								$selectedText = '';
								if ( $tehsil[ 'tehsil_id' ] == $itemreviewers[ 'ci_ir_tehsil' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="' . $tehsil[ 'tehsil_id' ] . '" ' . $selectedText . '>' . $tehsil[ 'tehsil_name_en' ] . '</option>';
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>
						<input type="file" name="cniccopy" id="cniccopy" class="form-control form-group" value="" placeholder="">
						<?php if ($itemreviewers['ci_ir_cniccopy'] != ""){?><a href="<?php echo base_url().$itemreviewers['ci_ir_cniccopy'];?>" target="_blank"><img src="<?php echo base_url().$itemreviewers['ci_ir_cniccopy'];?>" style="max-height:100px; max-width:100px;"/> </a>
						<?php }?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="picture" class="col-sm-12 control-label">Picture</label>
						<input type="file" name="picture" id="picture" class="form-control form-group" value="" placeholder="">
						<?php if ($itemreviewers['ci_ir_picture'] != ""){?><a href="<?php echo base_url().$itemreviewers['ci_ir_picture'];?>" target="_blank"><img src="<?php echo base_url().$itemreviewers['ci_ir_picture'];?>" style="max-height:100px; max-width:100px;"/></a>
						<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="address" class="col-sm-12 control-label">Address</label>
						<input type="text" name="address" class="form-control form-group" id="address" value="<?php print $itemreviewers['ci_ir_address'];?>" placeholder="" required="required">
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
								if ( $qualification[ 'q_degree_name' ] == $itemreviewers[ 'ci_ir_qualification' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="'.$qualification['q_degree_name'].'"'.$selectedText.'>'.$qualification['q_degree_name'].'</option>'; 
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="latestdegree" class="col-sm-12 control-label">Latest Degree</label>
						<input type="file" name="latestdegree" class="form-control form-group" id="latestdegree" placeholder="" >
						<?php if ($itemreviewers['ci_ir_latestdegree'] != ""){?><img src="<?php echo base_url().$itemreviewers['ci_ir_latestdegree'];?>" style="max-height:100px; max-width:100px;"/>
						<?php }?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceschool" class="col-sm-12 control-label">Experience School (No. of years)</label>
						<input type="number" name="experienceschool" class="form-control form-group" id="experienceschool" value="<?= $itemreviewers['ci_ir_experienceschool']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceletter" class="col-sm-12 control-label">Experience Letter</label>
						<input type="file" name="experienceletter" class="form-control form-group" id="experienceletter" placeholder="" >
						<?php if ($itemreviewers['ci_ir_experienceletter'] != ""){?><img src="<?php echo base_url().$itemreviewers['ci_ir_experienceletter'];?>" style="max-height:100px; max-width:100px;"/>
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
								if ( $bank[ 'b_bank_name' ] == $itemreviewers[ 'ci_ir_bankname' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="'.$bank['b_bank_name'].'"'.$selectedText.'>'.$bank['b_bank_name'].'</option>'; 
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="branchcode" class="col-sm-12 control-label">Branch Code</label>
						<input type="text" name="branchcode" class="form-control form-group" id="branchcode" value="<?= $itemreviewers['ci_ir_branchcode']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accounttitle" class="col-sm-12 control-label">Account Title</label>
						<input type="text" name="accounttitle" class="form-control form-group" id="accounttitle" value="<?= $itemreviewers['ci_ir_accounttitle']; ?>" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accountnumber" class="col-sm-12 control-label">Account Number</label>
						<input type="text" name="accountnumber" class="form-control form-group" id="accountnumber" value="<?= $itemreviewers['ci_ir_accountnumber']; ?>" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="iban" class="col-sm-12 control-label">IBAN</label>
						<input type="text" name="iban" class="form-control form-group" id="iban" value="<?= $itemreviewers['ci_ir_iban']; ?>" placeholder="">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-3 col-sm-12">
						<label for="status" class="col-sm-12 control-label">Status</label>
						<select name="status" class="form-control" id="status" placeholder="" required="required">
							<option value="0" <?=( $itemreviewers[ 'ci_ir_status']==0 )? 'selected': '' ?> >In-Active</option>
							<option value="1" <?=( $itemreviewers[ 'ci_ir_status']==1 )? 'selected': '' ?> >Active</option>
						</select>
					</div>
					<div class="form-group col-lg-3 col-sm-12" id="div_sel_roles"  style="display: none">
						<label for="parent_admin_id" class="col-sm-12 ">Select Parent</label>
						<select name="parent_admin_id" class="form-group form-control" id="parent_admin_id" required="required">
							<option value="">--Select Subject Specialist--</option>
							<?php

							foreach ( $subjectspecialist as $ss )
							{
								$selectedText = '';
								if ( $ss[ 'admin_id' ] == $revadmininfo[ 'parent_admin_id' ] )
									$selectedText = ' selected="selected" ';
								echo '<option value="' . $ss[ 'admin_id' ] . '"' . $selectedText . '>' . $ss[ 'username' ] . '</option>';
							}
							?>
						</select>
					</div>
					<div class="col-lg-3 col-sm-12">
						
					</div>
					<div class="col-lg-3 col-sm-12">
						
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-lg-12 col-sm-12" id="">
						<label for="lables" class="col-sm-12 control-label">Select Subjects</label>  <!--<a style="dis" title="Check all" class="view btn btn-sm btn-info" id="checkall" href="#">Check All</a>&nbsp;&nbsp;&nbsp;<a title="Uncheck all" class="view btn btn-sm btn-info" id="uncheckall" href="#">Uncheck All</a><br><br><div style="clear:both">-->
                        </div>
                            <?php	
                        if($revadmininfo['parent_admin_id'] != 0 && $revadmininfo['admin_role_id'] != 4){
                            $subjects  = $this->Itemreviewers_model->get_subject_by_users_id($revadmininfo['parent_admin_id']);
                        }
                        foreach($subjects as $subject)
                        {
                               $arrSubjects = explode(',',$revadmininfo['subjects_ids']);
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
	$( '#district' ).on( 'change', function () {
		$.post( '<?=base_url("admin/itemreviewers/tehsil_by_district")?>',
			{
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				district_id: this.value
			},
			function ( data ) {
				arr = $.parseJSON( data );
				//console.log( arr );
				$( '#tehsil option:not(:first)' ).remove();
				$.each( arr, function ( key, value ) {
					$( '#tehsil' )
					.append( $( "<option></option>" )
						.attr( "value", value.tehsil_id )
						.text( value.tehsil_name_en )
					);
				} );
			} );
	} );


	$( '#parent_admin_id' ).on( 'change', function () {
		if ( this.value == "" )
		{
			$( "#iw_subjects" ).html( "" );
		}

		$.post( '<?=base_url("admin/itemreviewers/getSubjectsByAE_ID")?>',
			{
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				admin_id: this.value
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
	} );

	if ( $( '#parent_admin_id' ).val() != "" )
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
	}
</script>