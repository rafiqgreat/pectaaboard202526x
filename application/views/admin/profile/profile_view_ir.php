<style>
	.profilepara {
		padding-right: 7.5px;
		padding-left: 7.5px;
		margin-top: 0px;
	}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-edit"></i>&nbsp; View Item Reviewer Profile</h3>
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
				<?php // echo '<PRE>'; print_r($profileinfo);?>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="firstname" class="col-sm-12 control-label">First Name</label>
						<p class="profilepara">
							<?php print $profileinfo['firstname'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="lastname" class="col-sm-12 control-label">Last Name</label>
						<p class="profilepara">
							<?php print $profileinfo['lastname'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="username" class="col-sm-12 control-label">User Name</label>
						<p class="profilepara">
							<?php print $profileinfo['username'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_fathername" class="col-sm-12 control-label">Father's Name</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_fathername'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_gender" class="col-sm-12 control-label">Gender</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_gender'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="mobile_no" class="col-sm-12 control-label">Mobile Number</label>
						<p class="profilepara">
							<?php print $profileinfo['mobile_no'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="email" class="col-sm-12 control-label">Email</label>
						<p class="profilepara">
							<?php print $profileinfo['email'];?>
							<?php 
							if($profileinfo['email_is_verify'] != 1){
								print "<a href='".base_url()."admin/profile/send_code/".$this->session->userdata('admin_id')."'>Send verification code</a>";
							}else{
								print " <span style='color:green;'><i class=\"fa fa-check\"></i> Verfied</span>";
							}
							?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_dob" class="col-sm-12 control-label">Date of Birth</label>
						<p class="profilepara">
							<?php print date_time($profileinfo['ci_ir_dob']);?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_cnic" class="col-sm-12 control-label">CNIC</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_cnic'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_designation" class="col-sm-12 control-label">Designation</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_designation'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_posting" class="col-sm-12 control-label">Place of Posting</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_posting'];?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_subject" class="col-sm-12 control-label">Subject</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_subject'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_deptttype" class="col-sm-12 control-label">Department</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_deptttype'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_publictype" class="col-sm-12 control-label">Public School Type</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_publictype'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_area" class="col-sm-12 control-label">Area</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_area'];?>
						</p>
					</div>
				</div>
				<div class="row" style="padding-top:15px">
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_district" class="col-sm-12 control-label">District</label>
						<?php 
						foreach($districts as $row)
						{
							if($profileinfo['ci_ir_district']==$row['district_id']){
								print '<p class="profilepara">'.$row[ 'district_name_en' ].'</p>';
							}
						}
						?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_tehsil" class="col-sm-12 control-label">Tehsil</label>
							<?php
							$tehsils  = $this->user_model->get_tehsil_by_district($profileinfo['ci_ir_district']);
							foreach ( $tehsils as $tehsil ) {
						
								if ( $tehsil[ 'tehsil_id' ] == $profileinfo[ 'ci_ir_tehsil' ] ){
									print '<p class="profilepara">'.$tehsil[ 'tehsil_name_en' ].'</p>';
								}
							}
							?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_cniccopy" class="col-sm-12 control-label">CNIC Copy</label>
						<?php if ($profileinfo['ci_ir_cniccopy'] != ""){ ?><p class="profilepara"><a href="<?php echo base_url().$profileinfo['ci_ir_cniccopy'];?>" target="_blank"><img src="<?php echo base_url().$profileinfo['ci_ir_cniccopy'];?>" style="max-height:100px; max-width:100px;"/> </a></p>
						<?php }else{?><p class="profilepara">No Image</p><?php }?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="ci_ir_picture" class="col-sm-12 control-label">Picture</label>
						<?php if ($profileinfo['ci_ir_picture'] != ""){ ?><p class="profilepara"><a href="<?php echo base_url().$profileinfo['ci_ir_picture'];?>" target="_blank"><img src="<?php echo base_url().$profileinfo['ci_ir_picture'];?>" style="max-height:100px; max-width:100px;"/> </a></p>
						<?php }else{?><p class="profilepara">No Image</p><?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="address" class="col-sm-12 control-label">Address</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_address'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-3 col-sm-12">
					<label for="qualification" class="col-sm-12 control-label">Qualification</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_qualification'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="latestdegree" class="col-sm-12 control-label">Latest Degree</label>
						<?php if ($profileinfo['ci_ir_latestdegree'] != ""){ ?><p class="profilepara"><a href="<?php echo base_url().$profileinfo['ci_ir_latestdegree'];?>" target="_blank"><img src="<?php echo base_url().$profileinfo['ci_ir_latestdegree'];?>" style="max-height:100px; max-width:100px;"/> </a></p>
						<?php }else{?><p class="profilepara">No Image</p><?php }?>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceschool" class="col-sm-12 control-label">Experience School (No. of years)</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_experienceschool'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="experienceletter" class="col-sm-12 control-label">Experience Letter</label>
						<?php if ($profileinfo['ci_ir_experienceletter'] != ""){ ?><p class="profilepara"><a href="<?php echo base_url().$profileinfo['ci_ir_experienceletter'];?>" target="_blank"><img src="<?php echo base_url().$profileinfo['ci_ir_experienceletter'];?>" style="max-height:100px; max-width:100px;"/> </a></p>
						<?php }else{?><p class="profilepara">No Image</p><?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="bankname" class="col-sm-12 control-label">Bank Name</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_bankname'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="branchcode" class="col-sm-12 control-label">Branch Code</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_branchcode'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accounttitle" class="col-sm-12 control-label">Account Title</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_accounttitle'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
						<label for="accountnumber" class="col-sm-12 control-label">Account Number</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_accountnumber'];?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-12">
						<label for="iban" class="col-sm-12 control-label">IBAN</label>
						<p class="profilepara">
							<?php print $profileinfo['ci_ir_iban'];?>
						</p>
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
					<div class="col-lg-3 col-sm-12">
					</div>
				</div>
				
				<div style="clear: both"></div>
				<div class="row">
					<div class="col-md-12">
						<a href="<?= base_url('admin/profile/profile_edit/'.$this->session->userdata('admin_id')); ?>" class="btn btn-info pull-right">Edit Profile</a>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
	</section>
</div>
<script language="javascript" type="text/javascript">
	/*$( '#ci_ir_district' ).on( 'change', function () {
		$.post( '<?=base_url("admin/itemwriter/tehsil_by_district")?>', {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				district_id: this.value
			},
			function ( data ) {
				arr = $.parseJSON( data );
				console.log( arr );
				$( '#ci_ir_tehsil option:not(:first)' ).remove();
				$.each( arr, function ( key, value ) {
					$( '#ci_ir_tehsil' )
						.append( $( "<option></option>" )
							.attr( "value", value.tehsil_id )
							.text( value.tehsil_name_en )
						);
				} );
			} );
	} );
	
  $('#username').on('blur', function() {
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