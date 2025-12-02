  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New User </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Users List</a>
				</div>
			</div>
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php') ?>
				<?php echo form_open(base_url('admin/users/add'), 'class="form-horizontal" name="frm_user_add" enctype="multipart/form-data" onsubmit="return checkRoles()"');  ?>
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
						<input type="text" name="username" class="form-control form-group" autocomplete="off" id="username" placeholder="" required="required">
					</div>
					<div class="col-lg-6 col-sm-12">
						<label for="password" class="col-sm-12 control-label">Password</label>
						<input type="password" name="password" class="form-control form-group" autocomplete="new-password" id="password" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<label for="firstname" class="col-sm-12 control-label">First Name</label>
						<input type="text" name="firstname" class="form-control form-group" id="firstname" placeholder="" required="required">
					</div>
					<div class="col-lg-6 col-sm-12">
						<label for="lastname" class="col-sm-12 control-label">Last Name</label>
						<input type="text" name="lastname" class="form-control form-group" id="lastname" placeholder="" required="required">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<label for="email" class="col-sm-12 control-label">Email</label>
						<input type="email" name="email" class="form-control form-group" id="email" placeholder="" required="required">
					</div>
					<div class="col-lg-6 col-sm-12">
						<label for="mobile_no" class="col-sm-12 control-label">Mobile No</label>
						<input type="number" name="mobile_no" class="form-control form-group" id="mobile_no" placeholder="" required="required">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-6 col-sm-12">
						<label for="address" class="col-sm-12 control-label">Address</label>
						<input type="text" name="address" class="form-control" id="address" placeholder="" required="required">
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="image" class="col-sm-12 control-label">Image</label>
						<input type="file" name="image" class="form-control form-group" id="userimage" placeholder="" >
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="is_active" class="col-sm-12 control-label">User Status</label>
						<select name="is_active" class="form-control" id="is_active" placeholder="" required="required">
							<option value="1">Active</option>
							<option value="0">In-Active</option>
						</select>
					</div>
				</div>
				
				<div id="itemwriter_reviewer_block"></div>

				<div class="form-group">
					<label for="admin_role_id" class="col-sm-12 control-label">Role</label>
					<select name="admin_role_id" class="form-control form-group" id="admin_role_id" required>
						<option value="">--Select Role--</option>
						<?php
						foreach ( $roles as $role ) {
							echo '<option value="' . $role->role_id . '">' . $role->role_name . '</option>';
						}
						?>
					</select>
				</div>
            <div class="form-group" id="div_departments">
               <label for="admin_department" class="col-sm-12 control-label">Department/Body</label>
               <select name="admin_department" class="form-control form-group" id="admin_department" placeholder="">
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
				<div class="form-group" id="div_sel_roles">
					<label for="parent_admin_id" class="col-sm-12 ">Select Parent</label>
					<select name="parent_admin_id" class="form-group form-control" id="parent_admin_id">
						<option value="">--Select Assessment Expert--</option>
						<?php
						foreach ( $aes as $ae ) {
							echo '<option value="' . $ae[ 'admin_id' ] . '">' . $ae[ 'username' ] . '</option>';
						}
						?>
					</select>
				</div>
				<div class="form-group" id="div_sel_subjects">
					<div class="col-lg-12 col-sm-12">
						<label for="lables" class="col-sm-12 control-label">Select Subjects</label>
						<?php
						foreach ( $subjects as $subject ) {
							?>
						<div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="<?= $subject['subject_id']; ?>"/>
							<label for="subjects" style="padding:0px 10px;">
								<?= $subject['subject_name_en']; ?>(G-
								<?= $subject['grade_code']; ?>)</label>
						</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-6 col-sm-12 form-group" id="div_sel_district">
						<label for="u_district_id" class="col-sm-12 control-label">District</label>
						<select name="u_district_id" class="form-control form-group" id="u_district_id" placeholder="">
							<option value="">---Select District---</option>
							<?php 
                        foreach($districts as $row)
                        {
                        	echo '<option value="'.$row['district_id'].'">'.$row['district_name_en'].'</option>'; 
                        }
                        ?>
						</select>
					</div>
					<div class="col-lg-6 col-sm-12" id="div_sel_tehsil">
						<label for="u_tehsil_id" class="col-sm-12 control-label">Tehsil</label>
						<select name="u_tehsil_id" class="form-control form-group" id="u_tehsil_id" placeholder="">
							<option value="">---Select Tehsil---</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" name="submit" value="Add User" class="btn btn-info pull-right">
					</div>
				</div>
				<?php echo form_close( ); ?>
				<!-- /.box-body -->
			</div>
	</section>
	</div>
	<script language="javascript">
		var itemwriter_reviewer_content = 
					'<div class="row ">'+                                         
						' <div class="col-lg-6 col-sm-12">'+
						'<label for="fathername" class="col-sm-12 control-label">Father\'s Name</label>'+
						 ' <input type="text" name="fathername" class="form-control form-group" id="fathername" placeholder="" required="required">'+
						'</div>'+                   
						 '<div class="col-lg-6 col-sm-12">'+
							'<label for="gender" class="col-sm-12 control-label">Gender</label>'+
							 '<select name="gender" class="form-control" id="gender" placeholder="" required="required">'+
								'<option value="Male">Male</option>'+
								'<option value="Female">Female</option>'+
							'</select>'+
						'</div>'+
					'</div>'+
					'<div class="row">'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="dob" class="col-sm-12 control-label">Date of Birth</label>'+
							'<input type="date" name="dob" class="form-control form-group" id="dob" placeholder="" required="required">'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="cnic" class="col-sm-12 control-label">CNIC</label>'+
							'<input type="number" name="cnic" class="form-control form-group" id="cnic" placeholder="" required="required">'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="designation" class="col-sm-12 control-label">Designation</label>'+
							'<input type="text" name="designation" class="form-control form-group" id="designation" placeholder="" required="required">'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>'+
							'<input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" placeholder="" required="required">'+
						'</div>'+
					'</div>'+
					'<div class="row">'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="subject" class="col-sm-12 control-label">Subject</label>'+
							'<select name="subject" class="form-control" id="subject" placeholder="" required="required">'+
								'<option value="">----Select Subject----</option>'+
								'<option value="English">English-انگریزی</option>'+
								'<option value="Urdu">Urdu-اردو</option>'+
								'<option value="Mathematics">Mathematics-ریاضی</option>'+
								'<option value="Science">Science-سائینس</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="department" class="col-sm-12 control-label">Department</label>'+
							'<select name="department" class="form-control" id="department" placeholder="" required="required">'+
								'<option value="">-----Select Department----</option>'+
								'<option value="Public">Public</option>'+
								'<option value="Private">Private</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="publictype" class="col-sm-12 control-label">Public School Type</label>'+
							'<select name="publictype" class="form-control" id="publictype" placeholder="" required="required">'+
								'<option value="">----Select School Type----</option>'+
								'<option value="SED">SED</option>'+
								'<option value="FEDERAL">FEDERAL</option>'+
								'<option value="PEF">PEF</option>'+
								'<option value="WORKERSWELFARE">WORKERSWELFARE</option>'+
								'<option value="COMMUNITY">COMMUNITY</option>'+
								'<option value="LITERACY">LITERACY</option>'+
								'<option value="PSSP">PSSP</option>'+
								'<option value="DANISH">DANISH</option>'+
								'<option value="INSAFAFTERNOON">INSAFAFTERNOON</option>'+
								'<option value="OTHERS">OTHERS</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="area" class="col-sm-12 control-label">Area</label>'+
							'<select name="area" class="form-control" id="area" placeholder="" required="required">'+
								'<option value="Urban">Urban</option>'+
								'<option value="Rural">Rural</option>'+
							'</select>'+
						'</div>'+
					'</div>'+
					'<div class="row" style="padding-top:15px">'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="district" class="col-sm-12 control-label">District</label>'+
							'<select name="district" class="form-control form-group" id="districts" placeholder="" required="required">'+
								'<option value="">---Select District---</option><?php foreach($districts as $row){echo '<option value="'.$row['district_id'].'">'.$row['district_name_en'].'</option>'; }?>
							</select>'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="tehsils" class="col-sm-12 control-label">Tehsil</label>'+
							'<select name="tehsil" class="form-control form-group" id="tehsils" placeholder="" required="required">'+
								'<option value="">---Select Tehsil---</option>'+
							'</select>'+
						'</div>'+
						'<div class="col-lg-3 col-sm-12">'+
							'<label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>'+
							'<input type="file" name="cniccopy" class="form-control form-group" id="cniccopy" placeholder="">'+
						'</div>'+
					'</div>'+
				'<div class="row">'+
				'	<div class="col-lg-3 col-sm-12">'+
				'	<label for="qualification" class="col-sm-12 control-label">Qualification</label>'+
				'		<select name="qualification" class="form-control form-group" id="qualification" placeholder="" required="required">'+
				'			<option value="">---Select Qualification---</option><?php foreach($qualifications as $qualification){echo '<option value="'.$qualification['q_degree_name'].'">'.$qualification['q_degree_name'].'</option>'; }?>'+
				'		</select>'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'		<label for="latestdegree" class="col-sm-12 control-label">Latest Degree</label>'+
				'		<input type="file" name="latestdegree" class="form-control form-group" id="latestdegree" placeholder="" >'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'		<label for="experienceschool" class="col-sm-12 control-label">Experience School (No. of years)</label>'+
				'		<input type="number" name="experienceschool" class="form-control form-group" id="experienceschool" placeholder="" required="required">'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'		<label for="experienceletter" class="col-sm-12 control-label">Experience Letter</label>'+
				'		<input type="file" name="experienceletter" class="form-control form-group" id="experienceletter" placeholder="" >'+
				'	</div>'+
				'</div>'+
				'<div class="row">'+
				'	<div class="col-lg-3 col-sm-12">'+
				'	<label for="bankname" class="col-sm-12 control-label">Bank Name</label>'+
				'		<select name="bankname" class="form-control form-group" id="bankname" placeholder="" required="required">'+
				'			<option value="">---Select Bank---</option><?php foreach($banks as $bank){echo '<option value="'.$bank['b_bank_name'].'">'.$bank['b_bank_name'].'</option>'; }?>'+
				'		</select>'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'		<label for="branchcode" class="col-sm-12 control-label">Branch Code</label>'+
				'		<input type="text" name="branchcode" class="form-control form-group" id="branchcode" placeholder="" required="required">'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'		<label for="accounttitle" class="col-sm-12 control-label">Account Title</label>'+
				'		<input type="text" name="accounttitle" class="form-control form-group" id="accounttitle" placeholder="" required="required">'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'		<label for="accountnumber" class="col-sm-12 control-label">Account Number</label>'+
				'		<input type="text" name="accountnumber" class="form-control form-group" id="accountnumber" placeholder="" required="required">'+
				'	</div>'+
				'</div>'+
				'<div class="row">'+
				'	<div class="col-lg-3 col-sm-12">'+
				'		<label for="iban" class="col-sm-12 control-label">IBAN</label>'+
				'		<input type="text" name="iban" class="form-control form-group" id="iban" placeholder="">'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'	</div>'+
				'	<div class="col-lg-3 col-sm-12">'+
				'	</div>'+
				'</div>';
		
		$( '#div_sel_roles' ).hide();
		$( '#div_departments' ).hide();
		$( '#div_sel_subjects' ).hide();
		$( '#div_sel_district' ).hide();
		$( '#div_sel_tehsil' ).hide();
		$( '#itemwriter_reviewer_block').hide();
		$( '#itemwriter_reviewer_block' ).empty();

		$( '#admin_role_id' ).on( 'change', function () {
			if ( this.value == 2 ) {
				$.post( '<?=base_url("admin/users/users_by_roleid")?>', {
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
						admin_role_id: 4
					},
					function ( data ) {
						arr = $.parseJSON( data );
						$( '#parent_admin_id' ).empty().append( '<option value="">--Select Assessment Expert--</option>' );
						$.each( arr, function ( key, value ) {
							$( '#parent_admin_id' )
								.append( $( "<option></option>" )
									.attr( "value", value.admin_id )
									.text( value.username )
								);
						} );
					} );
			} else if ( this.value == 3 || this.value == 6 ) {
				$.post( '<?=base_url("admin/users/users_by_roleid")?>', {
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
						admin_role_id: 2
					},
					function ( data ) {
						arr = $.parseJSON( data );
						$( '#parent_admin_id' ).empty().append( '<option value="">--Select Subject Specialist--</option>' );
						$.each( arr, function ( key, value ) {
							$( '#parent_admin_id' )
								.append( $( "<option></option>" )
									.attr( "value", value.admin_id )
									.text( value.username )
								);
						} );
					} );
			} else {
				$.post( '<?=base_url("admin/users/all_subject_for_ae")?>', {
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
						admin_id: this.value
					},
					function ( data ) {
						arr = $.parseJSON( data );
						$( '#div_sel_subjects' ).empty().append( '<div class="col-lg-12 col-sm-12"><label for="lables" class="col-sm-12 control-label">Select Subjects</label>' );
						$.each( arr, function ( key, value ) {
							$( '#div_sel_subjects' )
								.append( '<div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="' + value.subject_id + '" /><label for="subjects" style="padding:0px 10px;" >' + value.subject_name_en + '(G-' + value.grade_code + ')</label></div>' );
						} );

						$( '#div_sel_subjects' ).append( '</div>' );
					} );
			}

			if ( this.value == 2 ) {
				$( '#div_sel_roles' ).show();
				$( '#div_departments' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
			} else if ( this.value == 3 ) {
				$( '#div_departments' ).hide();
				$( '#div_sel_roles' ).show();
				$( '#itemwriter_reviewer_block' ).show();
				$( '#itemwriter_reviewer_block' ).empty();
				$( '#itemwriter_reviewer_block' ).append(itemwriter_reviewer_content);
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
			} else if ( this.value == 6 ) {
				$( '#div_departments' ).hide();
				$( '#div_sel_roles' ).show();
				$( '#itemwriter_reviewer_block' ).show();
				$( '#itemwriter_reviewer_block' ).empty();
				$( '#itemwriter_reviewer_block' ).append(itemwriter_reviewer_content);
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
			} else if ( this.value == 4 ) {
				$( '#div_departments' ).hide();
				$( '#div_sel_subjects' ).show();
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			} else if ( this.value == 7 ) {
				$( '#div_departments' ).hide();
				$( '#div_sel_district' ).show();
				$( '#div_sel_tehsil' ).hide();
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_subjects' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			} else if ( this.value == 8 ) {
				$( '#div_departments' ).hide();
				$( '#div_sel_district' ).show();
				$( '#div_sel_tehsil' ).show();
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_subjects' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			} else if ( this.value == 9 ) {
				$( '#div_sel_roles' ).hide();
				$( '#div_departments' ).show();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
			} else {
				$( '#div_departments' ).hide();
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			}
		} );

		$( '#parent_admin_id' ).on( 'change', function () {
			$.post( '<?=base_url("admin/users/subject_by_users_id")?>', {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
					admin_id: this.value
				},
				function ( data ) {
					arr = $.parseJSON( data );
					$( '#div_sel_subjects' ).empty().append( '<div class="col-lg-12 col-sm-12"><label for="lables" class="col-sm-12 control-label">Select Subjects</label>' );
					$.each( arr, function ( key, value ) {
						$( '#div_sel_subjects' )
							.append( '<div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="' + value.subject_id + '" /><label for="subjects" style="padding:0px 10px;" >' + value.subject_name_en + '(G-' + value.grade_code + ')</label></div>' );
					} );

					$( '#div_sel_subjects' ).append( '</div>' );
				} );

			$( '#div_sel_subjects' ).show();
		} );

		$( '#username' ).on( 'blur', function () {
			$.post( '<?=base_url("admin/users/username_exist")?>', {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
					username: this.value
				},
				function ( data ) {
					if ( data == 1 ) {
						alert( 'Username already exist!' );
						$( '#username' ).select();
					}
				} )
		} );

		$( '#u_district_id' ).on( 'change', function () {
			$.post( '<?=base_url("admin/users/tehsil_by_district")?>', {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
					district_id: this.value
				},
				function ( data ) {
					arr = $.parseJSON( data );
					console.log( arr );
					$( '#u_tehsil_id option:not(:first)' ).remove();
					$.each( arr, function ( key, value ) {
						$( '#u_tehsil_id' )
							.append( $( "<option></option>" )
								.attr( "value", value.tehsil_id )
								.text( value.tehsil_name_en )
							);
					} );
				} );
		} );
		$(document).on("change", "#districts", function(){
			$.post( '<?=base_url("admin/users/tehsil_by_district")?>', {
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
					district_id: this.value
				},
				function ( data ) {
					arr = $.parseJSON( data );
					console.log( arr );
					$( '#tehsils option:not(:first)' ).remove();
					$.each( arr, function ( key, value ) {
						$( '#tehsils' )
							.append( $( "<option></option>" )
								.attr( "value", value.tehsil_id )
								.text( value.tehsil_name_en )
							);
					} );
				} );
		} );

		function checkRoles() {
			if ( $( '#admin_role_id' ).val() == 2 ) {
				if ( $( '#parent_admin_id' ).val() == "" ) {
					alert( 'Please select parent' );
					return false;
				}
			}

			if ( $( '#admin_role_id' ).val() == 3 || $( '#admin_role_id' ).val() == 6 ) //item writer - Item Reviewer
			{
				if ( $( '#parent_admin_id' ).val() == "" ) {
					alert( 'Please select parent' );
					return false;
				}
			}

			if ( $( '#admin_role_id' ).val() == 7 ) {
				if ( $( '#u_district_id' ).val() == "" ) {
					alert( 'Select District' );
					return false;
				}
			}

			if ( $( '#admin_role_id' ).val() == 8 ) {
				if ( $( '#u_district_id' ).val() == "" ) {
					alert( 'Select District' );
					return false;
				}
				if ( $( '#u_tehsil_id' ).val() == "" ) {
					alert( 'Select Tehsil' );
					return false;
				}
			}

			if ( $( '#admin_role_id' ).val() == 2 || $( '#admin_role_id' ).val() == 3 || $( '#admin_role_id' ).val() == 4 || $( '#admin_role_id' ).val() == 6 ) {
				var boxes = $( '.subs:checked' );
				if ( boxes.length > 0 ) {
					return true;
				} else {
					alert( 'Please select atleast one subject!' );
					return false;
				}
			}
		}
	</script>