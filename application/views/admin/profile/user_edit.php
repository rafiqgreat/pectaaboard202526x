  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
	   <?php if($this->session->userdata('admin_id') != $this->uri->segment(4)){
				redirect(base_url('admin/profile/profile_edit/'.$this->session->userdata('admin_id')), 'refresh');
				}
		  ?>
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Profile </h3>
          </div>
          <!--<div class="d-inline-block float-right">
            <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Users List</a>
          </div>-->
        </div>
        <div class="card-body">   
           <!-- For Messages -->
			<?php //print "<pre>"; print_r($user);?>
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/profile/edit/'.$user['admin_id']), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return checkRoles()"' )?> 
              
              <div class="row">                                         
                <div class="col-lg-6 col-sm-12">
                <label for="username" class="col-sm-12 control-label">User Name(Unique)</label>
                  <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username" placeholder="" readonly>
                </div>
                <div class="col-lg-6 col-sm-12">
                <label for="password" class="col-sm-12 control-label">Password <span style="font-weight: normal">(Leave blank if you don't want to change the password)</span></label>                
                  <input type="password" name="password" class="form-control form-group" id="password" value=""  placeholder="">                
              </div>
            </div>
            
            <div class="row">                
                <div class="col-lg-6 col-sm-12">
                <label for="firstname" class="col-sm-12 control-label">First Name</label>
                  <input type="text" name="firstname" class="form-control form-group" id="firstname" value="<?= $user['firstname']; ?>" placeholder="" required="required">
                </div>                  
                <div class="col-lg-6 col-sm-12">
                <label for="lastname" class="col-sm-12 control-label">Last Name</label>
                  <input type="text" name="lastname" class="form-control form-group" id="lastname" value="<?= $user['lastname']; ?>" placeholder="" required="required">
                </div>
              </div>
              <div class="row">                
              <div class="col-lg-6 col-sm-12">
                <label for="email" class="col-sm-12 control-label">Email</label>
                  <input type="email" name="email" class="form-control form-group" id="email"  value="<?= $user['email']; ?>" placeholder="" required="required">
                </div>                
                <div class="col-lg-6 col-sm-12">
                <label for="mobile_no" class="col-sm-12 control-label">Mobile No</label>
                  <input type="number" name="mobile_no" class="form-control form-group" id="mobile_no" value="<?= $user['mobile_no']; ?>" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-lg-6 col-sm-12">
                    <label for="address" class="col-sm-12 control-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="<?= $user['address']; ?>" placeholder="" required="required">
                  </div>
				  <div class="col-lg-3 col-sm-12">
						<label for="image" class="col-sm-12 control-label">Image</label>
						<input type="file" name="image" class="form-control form-group" id="userimage" placeholder="" >
					  <?php if ($user['image'] != ""){ ?><a href="<?php echo base_url().$user['image'];?>" target="_blank"><img src="<?php echo base_url().$user['image'];?>" style="max-height:100px; max-width:100px;"/> </a><?php }?>
					</div>
              </div>
              
			  <div id="itemwriter_reviewer_block"></div>
              
       		  <div class="form-group" id="div_sel_roles">
                <label for="parent_admin_id" class="col-sm-12 ">Select Parent</label>
                  <select name="parent_admin_id" class="form-group form-control" id="parent_admin_id" disabled>
				 <?php
				  if($user['admin_role_id'] == 2){?>	  
                  		<option value="">--Select Assessment Expert--</option>
				  <?php }else{?>
					  <option value="">--Select Subject Specialist--</option>
					  <?php }?>
                  <?php
				  if($user['admin_role_id'] == 2){
					$aes  = $this->user_model->get_all_users_byroleid(4);
				   }else if($user['admin_role_id'] == 3 || $user['admin_role_id'] == 6){
					  $aes  = $this->user_model->get_all_users_byroleid(2);
				  }
                  foreach($aes as $ae)
                  {
					   $selected = '';
					  if($ae['admin_id'] == $user['parent_admin_id'])
					   $selected = ' selected="selected" ';
                      echo '<option value="'.$ae['admin_id'].'" '.$selected.'>'.$ae['username'].'</option>';
                  }
                  ?>
                  </select>
               </div>
              <div class="form-group" id="div_sel_subjects"> 
                <div class="col-lg-12 col-sm-12">
                <label for="lables" class="col-sm-12 control-label">Selected Subjects</label>
                  <?php	
					if($user['parent_admin_id'] != 0 && $user['admin_role_id'] != 4){
						$subjects  = $this->user_model->get_subject_by_users_id($user['parent_admin_id']);
					}
                   foreach($subjects as $subject)
                  {
					   $arrSubjects = explode(',',$user['subjects_ids']);
                    ?> <div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="<?= $subject['subject_id'];?>" <?php if(in_array($subject['subject_id'],$arrSubjects)){ echo 'checked'; } ?> disabled /><label for="subjects" style="padding:0px 10px;" ><?= $subject['subject_name_en']; ?>(G-<?= $subject['grade_code']; ?>)</label></div><?php
                  }
                  ?>
                  </div>
                </div>       
              <div class="row form-group">                 
                <div class="col-lg-6 col-sm-12 form-group" id="div_sel_district">
                    <label for="u_district_id" class="col-sm-12 control-label">District</label>
                    <select name="u_district_id" class="form-control form-group" id="u_district_id" placeholder="" disabled>
                        <option value="">---Select District---</option>
                        <?php 
						
                        foreach($districts as $district)
                        {
							$selected = '';
							if($district['district_id'] == $user['u_district_id'])
					   		$selected = ' selected="selected" ';
                        	echo '<option value="'.$district['district_id'].'" '.$selected.'>'.$district['district_name_en'].'</option>'; 
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12" id="div_sel_tehsil">
                <label for="u_tehsil_id" class="col-sm-12 control-label">Tehsil</label>
                  <select name="u_tehsil_id" class="form-control form-group" id="u_tehsil_id" placeholder="" disabled>
                    <option value="">---Select Tehsil---</option>
					  <?php 
					  if($user['admin_role_id'] == 8){
						$tehsils  = $this->user_model->get_tehsil_by_district($user['u_district_id']);
						foreach($tehsils as $tehsil)
                        {
							$selected = '';
							if($tehsil['tehsil_id'] == $user['u_tehsil_id'])
					   		$selected = ' selected="selected" ';
                        	echo '<option value="'.$tehsil['tehsil_id'].'" '.$selected.'>'.$tehsil['tehsil_name_en'].'</option>'; 
                        } 
					   }
					  ?>
                    </select>
                </div>
              </div>
			
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Profile" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
<script language="javascript">
var itemreviewer_content= '<div class="row">'+
'	<div class="col-lg-6 col-sm-12">'+
'		<label for="fathername" class="col-sm-12 control-label">Father\'s Name</label>'+
'		<input type="text" name="fathername" class="form-control form-group" id="fathername" placeholder="" value="<?= addslashes($user['ci_ir_fathername']); ?>" required="required">'+
'	</div>'+
'	<div class="col-lg-6 col-sm-12">'+
'		<label for="gender" class="col-sm-12 control-label">Gender</label>'+
'		<select name="gender" class="form-control" id="gender" placeholder="" required="required">'+
'			<option value="Male" <?=( $user[ 'ci_ir_gender']=="Male" )? 'selected': '' ?>>Male</option>'+
'			<option value="Female" <?=( $user[ 'ci_ir_gender']=="Female" )? 'selected': '' ?>>Female</option>'+
'			<option value="Others" <?=( $user[ 'ci_ir_gender']=="Others" )? 'selected': '' ?>>Others</option>'+
'		</select>'+
'	</div>'+
'</div>'+
'<div class="row">'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="dob" class="col-sm-12 control-label">Date of Birth</label>'+
'		<input type="date" name="dob" class="form-control form-group" id="dob" value="<?= $user['ci_ir_dob']; ?>" placeholder="" required="required">'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="cnic" class="col-sm-12 control-label">CNIC</label>'+
'		<input type="number" name="cnic" class="form-control form-group" id="cnic" value="<?= $user['ci_ir_cnic']; ?>" placeholder="" required="required" readonly="readonly">'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="designation" class="col-sm-12 control-label">Designation</label>'+
'		<input type="text" name="designation" class="form-control form-group" id="designation" value="<?= addslashes($user['ci_ir_designation']); ?>" placeholder="" required="required">'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>'+
'		<input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" value="<?= addslashes($user['ci_ir_posting']); ?>" placeholder="" required="required">'+
'	</div>'+
'</div>'+
'<div class="row">'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="subject" class="col-sm-12 control-label">Subject</label>'+
		'<select name="subject" class="form-control" id="subject" placeholder="" required="required">'+
			'<option value="">----Select Subject----</option>'+
			'<option value="English" <?=( $user[ 'ci_ir_subject']=="English" )? 'selected': '' ?>>English-انگریزی</option>'+
			'<option value="Urdu" <?=( $user[ 'ci_ir_subject']=="Urdu" )? 'selected': '' ?>>Urdu-اردو</option>'+
			'<option value="Math" <?=( $user[ 'ci_ir_subject']=="Math" )? 'selected': '' ?>>Math-ریاضی</option>'+
			'<option value="General Knowledge" <?=( $user[ 'ci_ir_subject']=="General Knowledge" )? 'selected': '' ?>>General Knowledge-جنرل نالج</option>'+
			'<option value="Religious Education" <?=( $user[ 'ci_ir_subject']=="Religious Education" )? 'selected': '' ?>>Religious Education-دینی تعلیم</option>'+
			'<option value="Islamiat" <?=( $user[ 'ci_ir_subject']=="Islamiat" )? 'selected': '' ?>>Islamiat-اسلامیات</option>'+
			'<option value="Social Studies" <?=( $user[ 'ci_ir_subject']=="Social Studies" )? 'selected': '' ?>>Social Studies-شوشل سٹڈی</option>'+
			'<option value="Science" <?=( $user[ 'ci_ir_subject']=="Science" )? 'selected': '' ?>>Science-سائینس</option>'+
			'<option value="Computer Education" <?=( $user[ 'ci_ir_subject']=="Computer Education" )? 'selected': '' ?>>Computer Education-کمپوٹر تعلیم</option>'+
			'<option value="Ethics" <?=( $user[ 'ci_ir_subject']=="Ethics" )? 'selected': '' ?>>Ethics-اخلاقیات</option>'+
		'</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="department" class="col-sm-12 control-label">Department</label>'+
'		<select name="department" class="form-control" id="department" placeholder="" required="required">'+
'			<option value="">-----Select Department----</option>'+
'			<option value="Public" <?=( $user[ 'ci_ir_deptttype']=="Public" )? 'selected': '' ?>>Public</option>'+
'			<option value="Private" <?=( $user[ 'ci_ir_deptttype']=="Private" )? 'selected': '' ?>>Private</option>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="publictype" class="col-sm-12 control-label">Public School Type</label>'+
'		<select name="publictype" class="form-control" id="publictype" placeholder="" required="required">'+
'			<option value="">----Select School Type----</option>'+
'			<option value="SED" <?=( $user[ 'ci_ir_publictype']=="SED" )? 'selected': '' ?>>SED</option>'+
'			<option value="FEDERAL" <?=( $user[ 'ci_ir_publictype']=="FEDERAL" )? 'selected': '' ?>>FEDERAL</option>'+
'			<option value="PEF" <?=( $user[ 'ci_ir_publictype']=="PEF" )? 'selected': '' ?>>PEF</option>'+
'  			<option value="WORKERSWELFARE" <?=( $user[ 'ci_ir_publictype']=="WORKERSWELFARE" )? 'selected': '' ?>>WORKERSWELFARE</option>'+
'			<option value="COMMUNITY" <?=( $user[ 'ci_ir_publictype']=="COMMUNITY" )? 'selected': '' ?>>COMMUNITY</option>'+
'			<option value="LITERACY" <?=( $user[ 'ci_ir_publictype']=="LITERACY" )? 'selected': '' ?>>LITERACY</option>'+
'			<option value="PSSP" <?=( $user[ 'ci_ir_publictype']=="PSSP" )? 'selected': '' ?>>PSSP</option>'+
'			<option value="DANISH" <?=( $user[ 'ci_ir_publictype']=="DANISH" )? 'selected': '' ?>>DANISH</option>'+
'			<option value="INSAFAFTERNOON" <?=( $user[ 'ci_ir_publictype']=="INSAFAFTERNOON" )? 'selected': '' ?>>INSAFAFTERNOON</option>'+
'			<option value="OTHERS" <?=( $user[ 'ci_ir_publictype']=="OTHERS" )? 'selected': '' ?>>OTHERS</option>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="area" class="col-sm-12 control-label">Area</label>'+
'		<select name="area" class="form-control" id="area" placeholder="" required="required">'+
'			<option value="Urban" <?=( $user[ 'ci_ir_area']=="Urban" )? 'selected': '' ?>>Urban</option>'+
'			<option value="Rural" <?=( $user[ 'ci_ir_area']=="Rural" )? 'selected': '' ?>>Rural</option>'+
'		</select>'+
'	</div>'+
'</div>'+
'<div class="row" style="padding-top:15px">'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="district" class="col-sm-12 control-label">District</label>'+
'		<select name="district" class="form-control" id="districts" placeholder="" required="required">'+
'			<option value="">---Select District---</option><?php foreach($districts as $row){$selectedText = '';if($user['ci_ir_district']==$row['district_id'])$selectedText = ' selected="selected" '; echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; }?>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="tehsil" class="col-sm-12 control-label">Tehsil</label>'+
'		<select name="tehsil" class="form-control form-group" id="tehsils" placeholder="" required="required">'+
'			<option value="">---Select Tehsil---</option><?php if($user['admin_role_id'] == 6){ $tehsils  = $this->user_model->get_tehsil_by_district($user['ci_ir_district']); foreach ( $tehsils as $tehsil ) { $selectedText = ''; if ( $tehsil[ 'tehsil_id' ] == $user[ 'ci_ir_tehsil' ] ) $selectedText = ' selected="selected" '; echo '<option value="' . $tehsil[ 'tehsil_id' ] . '" ' . $selectedText . '>' . $tehsil[ 'tehsil_name_en' ] . '</option>'; }}?>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>'+
'		<input type="file" name="cniccopy" id="cniccopy" class="form-control form-group" value="" placeholder="">'+
'	</div>'+
'</div>'+
'<div class="row">'+
'	<div class="col-lg-3 col-sm-12"></div>'+
'	<div class="col-lg-3 col-sm-12"></div>'+	
'	<div class="col-lg-3 col-sm-12"><?php if ($user['ci_ir_cniccopy'] != ""){ ?><a href="<?php echo base_url().$user['ci_ir_cniccopy'];?>" target="_blank"><img src="<?php echo base_url().$user['ci_ir_cniccopy'];?>" style="max-height:100px; max-width:100px;"/> </a><?php }?>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'	</div>'+
'</div>';
	
var itemwriter_content = '<div class="row">'+
'	<div class="col-lg-6 col-sm-12">'+
'		<label for="fathername" class="col-sm-12 control-label">Father\'s Name</label>'+
'		<input type="text" name="fathername" class="form-control form-group" id="fathername" placeholder="" value="<?= addslashes($user['ci_iw_fathername']); ?>" required="required">'+
'	</div>'+
'	<div class="col-lg-6 col-sm-12">'+
'		<label for="gender" class="col-sm-12 control-label">Gender</label>'+
'		<select name="gender" class="form-control" id="gender" placeholder="" required="required">'+
'			<option value="Male" <?=( $user[ 'ci_iw_gender']=="Male" )? 'selected': '' ?>>Male</option>'+
'			<option value="Female" <?=( $user[ 'ci_iw_gender']=="Female" )? 'selected': '' ?>>Female</option>'+
'			<option value="Others" <?=( $user[ 'ci_iw_gender']=="Others" )? 'selected': '' ?>>Others</option>'+
'		</select>'+
'	</div>'+
'</div>'+
'<div class="row">'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="dob" class="col-sm-12 control-label">Date of Birth</label>'+
'		<input type="date" name="dob" class="form-control form-group" id="dob" value="<?= $user['ci_iw_dob']; ?>" placeholder="" required="required">'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="cnic" class="col-sm-12 control-label">CNIC</label>'+
'		<input type="number" name="cnic" class="form-control form-group" id="cnic" value="<?= $user['ci_iw_cnic']; ?>" placeholder="" required="required" readonly="readonly">'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="designation" class="col-sm-12 control-label">Designation</label>'+
'		<input type="text" name="designation" class="form-control form-group" id="designation" value="<?= addslashes($user['ci_iw_designation']); ?>" placeholder="" required="required">'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="placeofposting" class="col-sm-12 control-label">Place of Posting</label>'+
'		<input type="text" name="placeofposting" class="form-control form-group" id="placeofposting" value="<?= addslashes($user['ci_iw_posting']); ?>" placeholder="" required="required">'+
'	</div>'+
'</div>'+
'<div class="row">'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="subject" class="col-sm-12 control-label">Subject</label>'+
		'<select name="subject" class="form-control" id="subject" placeholder="" required="required">'+
			'<option value="">----Select Subject----</option>'+
			'<option value="English" <?=( $user[ 'ci_iw_subject']=="English" )? 'selected': '' ?>>English-انگریزی</option>'+
			'<option value="Urdu" <?=( $user[ 'ci_iw_subject']=="Urdu" )? 'selected': '' ?>>Urdu-اردو</option>'+
			'<option value="Math" <?=( $user[ 'ci_iw_subject']=="Math" )? 'selected': '' ?>>Math-ریاضی</option>'+
			'<option value="General Knowledge" <?=( $user[ 'ci_iw_subject']=="General Knowledge" )? 'selected': '' ?>>General Knowledge-جنرل نالج</option>'+
			'<option value="Religious Education" <?=( $user[ 'ci_iw_subject']=="Religious Education" )? 'selected': '' ?>>Religious Education-دینی تعلیم</option>'+
			'<option value="Islamiat" <?=( $user[ 'ci_iw_subject']=="Islamiat" )? 'selected': '' ?>>Islamiat-اسلامیات</option>'+
			'<option value="Social Studies" <?=( $user[ 'ci_iw_subject']=="Social Studies" )? 'selected': '' ?>>Social Studies-شوشل سٹڈی</option>'+
			'<option value="Science" <?=( $user[ 'ci_iw_subject']=="Science" )? 'selected': '' ?>>Science-سائینس</option>'+
			'<option value="Computer Education" <?=( $user[ 'ci_iw_subject']=="Computer Education" )? 'selected': '' ?>>Computer Education-کمپوٹر تعلیم</option>'+
			'<option value="Ethics" <?=( $user[ 'ci_iw_subject']=="Ethics" )? 'selected': '' ?>>Ethics-اخلاقیات</option>'+
		'</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="department" class="col-sm-12 control-label">Department</label>'+
'		<select name="department" class="form-control" id="department" placeholder="" required="required">'+
'			<option value="">-----Select Department----</option>'+
'			<option value="Public" <?=( $user[ 'ci_iw_deptttype']=="Public" )? 'selected': '' ?>>Public</option>'+
'			<option value="Private" <?=( $user[ 'ci_iw_deptttype']=="Private" )? 'selected': '' ?>>Private</option>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="publictype" class="col-sm-12 control-label">Public School Type</label>'+
'		<select name="publictype" class="form-control" id="publictype" placeholder="" required="required">'+
'			<option value="">----Select School Type----</option>'+
'			<option value="SED" <?=( $user[ 'ci_iw_publictype']=="SED" )? 'selected': '' ?>>SED</option>'+
'			<option value="FEDERAL" <?=( $user[ 'ci_iw_publictype']=="FEDERAL" )? 'selected': '' ?>>FEDERAL</option>'+
'			<option value="PEF" <?=( $user[ 'ci_iw_publictype']=="PEF" )? 'selected': '' ?>>PEF</option>'+
'			<option value="COMMUNITY" <?=( $user[ 'ci_iw_publictype']=="COMMUNITY" )? 'selected': '' ?>>COMMUNITY</option>'+
'			<option value="LITERACY" <?=( $user[ 'ci_iw_publictype']=="LITERACY" )? 'selected': '' ?>>LITERACY</option>'+
'			<option value="PSSP" <?=( $user[ 'ci_iw_publictype']=="PSSP" )? 'selected': '' ?>>PSSP</option>'+
'			<option value="DANISH" <?=( $user[ 'ci_iw_publictype']=="DANISH" )? 'selected': '' ?>>DANISH</option>'+
'			<option value="INSAFAFTERNOON" <?=( $user[ 'ci_iw_publictype']=="INSAFAFTERNOON" )? 'selected': '' ?>>INSAFAFTERNOON</option>'+
'			<option value="OTHERS" <?=( $user[ 'ci_iw_publictype']=="OTHERS" )? 'selected': '' ?>>OTHERS</option>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="area" class="col-sm-12 control-label">Area</label>'+
'		<select name="area" class="form-control" id="area" placeholder="" required="required">'+
'			<option value="Urban" <?=( $user[ 'ci_iw_area']=="Urban" )? 'selected': '' ?>>Urban</option>'+
'			<option value="Rural" <?=( $user[ 'ci_iw_area']=="Rural" )? 'selected': '' ?>>Rural</option>'+
'		</select>'+
'	</div>'+
'</div>'+
'<div class="row" style="padding-top:15px">'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="district" class="col-sm-12 control-label">District</label>'+
'		<select name="district" class="form-control" id="districts" placeholder="" required="required">'+
'			<option value="">---Select District---</option><?php foreach($districts as $row){$selectedText = '';if($user['ci_iw_district']==$row['district_id'])$selectedText = ' selected="selected" '; echo '<option value="'.$row['district_id'].'"'.$selectedText.'>'.$row['district_name_en'].'</option>'; }?>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="tehsil" class="col-sm-12 control-label">Tehsil</label>'+
'		<select name="tehsil" class="form-control form-group" id="tehsils" placeholder="" required="required">'+
'			<option value="">---Select Tehsil---</option><?php if($user['admin_role_id'] == 3){ $tehsils  = $this->user_model->get_tehsil_by_district($user['ci_iw_district']); foreach ( $tehsils as $tehsil ) { $selectedText = ''; if ( $tehsil[ 'tehsil_id' ] == $user[ 'ci_iw_tehsil' ] ) $selectedText = ' selected="selected" '; echo '<option value="' . $tehsil[ 'tehsil_id' ] . '" ' . $selectedText . '>' . $tehsil[ 'tehsil_name_en' ] . '</option>'; }}?>'+
'		</select>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'		<label for="cniccopy" class="col-sm-12 control-label">CNIC Copy</label>'+
'		<input type="file" name="cniccopy" id="cniccopy" class="form-control form-group" value="" placeholder="">'+
'	</div>'+
'</div>'+
'<div class="row">'+
'	<div class="col-lg-3 col-sm-12"></div>'+
'	<div class="col-lg-3 col-sm-12"></div>'+	
'	<div class="col-lg-3 col-sm-12"><?php if ($user['ci_iw_cniccopy'] != ""){ ?><a href="<?php echo base_url().$user['ci_iw_cniccopy'];?>" target="_blank"><img src="<?php echo base_url().$user['ci_iw_cniccopy'];?>" style="max-height:100px; max-width:100px;"/> </a><?php }?>'+
'	</div>'+
'	<div class="col-lg-3 col-sm-12">'+
'	</div>'+
'</div>';	
	
	<?php 
	if($user['admin_role_id']==2){ ?>
		$('#div_sel_roles').show();
		$('#div_sel_subjects').show();
		$('#div_sel_district').hide();
  		$('#div_sel_tehsil').hide();
		$('#itemwriter_reviewer_block').hide();
		$('#itemwriter_reviewer_block').empty();
	<?php } 
	elseif($user['admin_role_id']== 3){ ?>
		$('#div_sel_roles').show();
		$('#div_sel_subjects').show();
		$('#div_sel_district').hide();
  		$('#div_sel_tehsil').hide();
		$( '#itemwriter_reviewer_block' ).show();
		$( '#itemwriter_reviewer_block' ).empty();
		$( '#itemwriter_reviewer_block' ).append(itemwriter_content);
		$('#admin_role_id').css('pointer-events', 'none');
	<?php }
	elseif($user['admin_role_id']==6){ ?>
		$('#div_sel_roles').show();
		$('#div_sel_subjects').show();
		$('#div_sel_district').hide();
  		$('#div_sel_tehsil').hide();
		$( '#itemwriter_reviewer_block' ).show();
		$( '#itemwriter_reviewer_block' ).empty();
		$( '#itemwriter_reviewer_block' ).append(itemreviewer_content);
		$('#admin_role_id').css('pointer-events', 'none');
	<?php }
	elseif($user['admin_role_id']==4){ ?>
		$('#div_sel_roles').hide();
		$('#div_sel_subjects').show();
		$('#div_sel_district').hide();
		$('#div_sel_tehsil').hide();
		$('#itemwriter_reviewer_block').hide();
		$('#itemwriter_reviewer_block').empty();
	<?php }
	elseif($user['admin_role_id']==7){ ?>
		$('#div_sel_roles').hide();
		$('#div_sel_subjects').hide();
		$('#div_sel_district').show();
		$('#div_sel_tehsil').hide();
		$('#itemwriter_reviewer_block').hide();
		$('#itemwriter_reviewer_block').empty();
		
	<?php }
	elseif($user['admin_role_id']==8){ ?>
		$('#div_sel_roles').hide();
		$('#div_sel_subjects').hide();
		$('#div_sel_district').show();
		$('#div_sel_tehsil').show();
		$('#itemwriter_reviewer_block').hide();
		$('#itemwriter_reviewer_block').empty();
		
	<?php }
	else{ ?>
		$('#div_sel_roles').hide();
		$('#div_sel_subjects').hide();
		$('#div_sel_district').hide();
		$('#div_sel_tehsil').hide();
		$('#itemwriter_reviewer_block').hide();
		$('#itemwriter_reviewer_block').empty();
<?php	}?>
	
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
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
			} else if ( this.value == 3 ) {
				$( '#div_sel_roles' ).show();
				$( '#itemwriter_reviewer_block' ).show();
				$( '#itemwriter_reviewer_block' ).empty();
				$( '#itemwriter_reviewer_block' ).append(itemwriter_content);
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();

			} else if ( this.value == 6 ) {
				$( '#div_sel_roles' ).show();
				$( '#itemwriter_reviewer_block' ).show();
				$( '#itemwriter_reviewer_block' ).empty();
				$( '#itemwriter_reviewer_block' ).append(itemreviewer_content);
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
			} else if ( this.value == 4 ) {
				$( '#div_sel_subjects' ).show();
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			} else if ( this.value == 7 ) {
				$( '#div_sel_district' ).show();
				$( '#div_sel_tehsil' ).hide();
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_subjects' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			} else if ( this.value == 8 ) {
				$( '#div_sel_district' ).show();
				$( '#div_sel_tehsil' ).show();
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_subjects' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			} else {
				$( '#div_sel_roles' ).hide();
				$( '#div_sel_subjects' ).hide();
				$( '#div_sel_district' ).hide();
				$( '#div_sel_tehsil' ).hide();
				$( '#itemwriter_reviewer_block' ).hide();
				$( '#itemwriter_reviewer_block' ).empty();
			}
		} );
	
	$('#parent_admin_id').on('change', function() 
	{
		$.post('<?=base_url("admin/users/subject_by_users_id")?>',
		{
			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
			admin_id : this.value
		},
		function(data){
			arr = $.parseJSON(data);  
			$('#div_sel_subjects').empty().append('<div class="col-lg-12 col-sm-12"><label for="lables" class="col-sm-12 control-label">Select Subjects</label>');
			$.each(arr, function(key, value) {           
			$('#div_sel_subjects')
			 .append('<div style="float:left; padding:0 20px; width:290px;"><input type="checkbox" class="subs" name="subjects[]" value="'+value.subject_id+'" /><label for="subjects" style="padding:0px 10px;" >'+value.subject_name_en+'(G-'+value.grade_code+')</label></div>'); 
			});
			
			$('#div_sel_subjects').append('</div>');
		});
		
		$('#div_sel_subjects').show();
	});
	
  /*$('#username').on('blur', function() {
      $.post('<?=base_url("admin/users/username_exist")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      username : this.value
    },
    function(data){
		  if(data==1){
			alert('Username already exist!');  	
			// $('#username').select();
		  }			  
		})  
    });*/
	
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
