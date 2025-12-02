<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {
	
	public function __construct(){
		
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Profile_model', 'Profile_model');
		$this->load->model('admin/user_model', 'user_model');
	}
	//-------------------------------------------------------------------------
	public function index(){
		if($this->input->post('submit')){
			$data = array(
				'username' => $this->input->post('username'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no'),
				'updated_at' => date('Y-m-d h:i:s'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->profile_model->update_user($data);
			if($result){
				$this->session->set_flashdata('success', 'Profile has been Updated Successfully!');
				redirect(base_url('admin/profile'), 'refresh');
			}
		}
		else{
			$data['title'] = 'Admin Profile';
			$data['admin'] = $this->Profile_model->get_user_detail();
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/profile/index', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-------------------------------------------------------------------------
	public function change_pwd(){
		$id = $this->session->userdata('admin_id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/profile/change_pwd'),'refresh');
			}
			else{
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Profile_model->change_pwd($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Password has been changed successfully!');
					redirect(base_url('admin/profile/change_pwd'));
				}
			}
		}
		else{
			
			$data['title'] = 'Change Password';
			$data['user'] = $this->Profile_model->get_user_detail();
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/profile/change_pwd', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function change_pwd_school(){
		$id = $this->session->userdata('admin_id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username/EMIS required', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/profile/change_pwd'),'refresh');
			}
			else{
				$userid = $this->input->post('username');
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->change_pwd_school($data, $userid);
				if($result){
					$this->session->set_flashdata('success', 'School Password has been changed successfully!');
					redirect(base_url('admin/profile/change_pwd_school'));
				}
			}
		}
		else{
			
			$data['title'] = 'Change School Password';
			$data['user'] = $this->profile_model->get_user_detail();
			
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/profile/change_pwd_school', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	public function profile_edit( $id = 0 ) 
	{
		$data['title'] = 'Edit Profile';
		if ( $this->input->post( 'submit' ) ) 
		{
			if($this->session->userdata('role_id')==3)
			{
				//echo '<PRE>';
				//print_r($_REQUEST);
				//die();
				$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
				$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
				//$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_fathername', 'Fathername', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_dob', 'Date of Birth', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_gender', 'Gender', 'trim|required' );
				$this->form_validation->set_rules( 'mobile_no', 'Mobile Number', 'trim|required' );
				$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_cnic', 'CNIC Number', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_designation', 'Designation', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_posting', 'Place of Posting', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_subject', 'Subject', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_deptttype', 'Department', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_publictype', 'Public School Type', 'trim|required' );
				$this->form_validation->set_rules( 'ci_iw_area', 'Area', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_tehsil', 'Tehsil', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_district', 'District', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_picture', 'Picture', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_iw_cniccopy', 'CNIC Copy', 'trim|required' );
				
				if ( $this->form_validation->run() == FALSE ) {
					$data[ 'itemwriters' ] = $this->Profile_model->get_itemswriter_by_id( $id );
					$data[ 'view' ] = 'admin/profile/profile_edit';
					$this->load->view( 'layout', $data );
				} else {
					$passwords = ($this->input->post( 'password' )!="")?password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT):$this->input->post( 'old_password' );
					$data = array(
						'ci_iw_password' => $passwords,
						'ci_iw_fname' => $this->input->post( 'firstname' ),
						'ci_iw_lname' => $this->input->post( 'lastname' ),
						'ci_iw_dob' => $this->input->post( 'ci_iw_dob' ),
						'ci_iw_mobile' => $this->input->post( 'mobile_no' ),
						'ci_iw_email' => $this->input->post( 'email' ),
						//'ci_iw_subject' => $this->input->post( 'ci_iw_subject' ),
						'ci_iw_posting' => $this->input->post( 'ci_iw_posting' ),
						//'ci_iw_district' => $this->input->post( 'ci_iw_district' ),
						//'ci_iw_tehsil' => $this->input->post( 'ci_iw_tehsil' ),
						'ci_iw_designation' => $this->input->post( 'ci_iw_designation' ),
						'ci_iw_gender' => $this->input->post( 'ci_iw_gender' ),
						'ci_iw_area' => $this->input->post( 'ci_iw_area' ),
						'ci_iw_deptttype' => $this->input->post( 'ci_iw_deptttype' ),
						'ci_iw_publictype' => $this->input->post( 'ci_iw_publictype' ),
						//'ci_iw_status' => $this->input->post( 'ci_iw_status' ),
						'ci_iw_fathername' => $this->input->post( 'ci_iw_fathername' ),
						'ci_iw_address' => $this->input->post( 'address' ),
						'ci_iw_updated' => date( 'Y-m-d h:i:s' ),
						'ci_iw_qualification' => $this->input->post('qualification'),
						'ci_iw_experienceschool' => $this->input->post('experienceschool'),
						'ci_iw_bankname' => $this->input->post('bankname'),
						'ci_iw_branchcode' => $this->input->post('branchcode'),
						'ci_iw_accounttitle' => $this->input->post('accounttitle'),
						'ci_iw_accountnumber' => $this->input->post('accountnumber'),
						'ci_iw_iban' => $this->input->post('iban')
					);
					
					$admin_id = $this->input->post( 'admin_id' );
					$ci_iw_id =  $this->input->post( 'ci_iw_id' );
					if($admin_id == "")
					{
						$this->session->set_flashdata( 'error', 'Restricted Area!' );
						redirect(base_url('admin/auth/login'));
					}
	
					$data_admin = array(
						'admin_role_id' => '3',
						'firstname' => $this->input->post( 'firstname' ),
						'lastname' => $this->input->post( 'lastname' ),
						'email' => $this->input->post( 'email' ),
						'address' => $this->input->post( 'address' ),
						'mobile_no' => $this->input->post( 'mobile_no' ),
						'password' => $passwords,
						'updated_at' => date( 'Y-m-d h:i:s' ),
					);
					////////////////////////////////////////////////////////////////////////////
					$ci_iw_picture = $this->input->post('ci_iw_picture');
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['ci_iw_picture']['name']))
					{
						$result = $this->functions->file_insert($path, 'ci_iw_picture', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_iw_picture'] = $path.$result['msg'];
							$data_admin['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					/////////////////////////////////////////////////////////////////////////////
					$ci_iw_cniccopy = $this->input->post('ci_iw_cniccopy');
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['ci_iw_cniccopy']['name']))
					{
						$result = $this->functions->file_insert($path, 'ci_iw_cniccopy', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_iw_cniccopy'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					if(!empty($_FILES['latestdegree']['name']))
					{
						$result = $this->functions->file_insert($path, 'latestdegree', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_iw_latestdegree'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}

					if(!empty($_FILES['experienceletter']['name']))
					{
						$result = $this->functions->file_insert($path, 'experienceletter', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_iw_experienceletter'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					/////////////////////////////////////////////////////////////////////////////
					//echo '<PRE>';
					//print_r($data_admin);
					//echo '<hr>';
					//print_r($data);
					//die();
					$result_admin = $this->Profile_model->edit_iw_tbladmin($admin_id, $data_admin);
					if($this->session->userdata('role_id')==3)
					{
						$result = $this->Profile_model->itemwriters_edit( $data, $ci_iw_id );
					}
					if ( $result ) {
						$this->session->set_flashdata( 'success', 'Profile has been updated successfully!' );
						redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
					}
				}
			}
			if($this->session->userdata('role_id')==6)
			{
				$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
				$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
				//$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_fathername', 'Fathername', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_dob', 'Date of Birth', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_gender', 'Gender', 'trim|required' );
				$this->form_validation->set_rules( 'mobile_no', 'Mobile Number', 'trim|required' );
				$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_ir_cnic', 'CNIC Number', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_designation', 'Designation', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_posting', 'Place of Posting', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_ir_subject', 'Subject', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_deptttype', 'Department', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_publictype', 'Public School Type', 'trim|required' );
				$this->form_validation->set_rules( 'ci_ir_area', 'Area', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_ir_tehsil', 'Tehsil', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_ir_district', 'District', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_ir_picture', 'Picture', 'trim|required' );
				//$this->form_validation->set_rules( 'ci_ir_cniccopy', 'CNIC Copy', 'trim|required' );
				
				if ( $this->form_validation->run() == FALSE ) {
					$data[ 'itemwriters' ] = $this->Profile_model->get_itemswriter_by_id( $id );
					$data[ 'view' ] = 'admin/profile/profile_edit_ir';
					$this->load->view( 'layout', $data );
				} else {
					$passwords = ($this->input->post( 'password' )!="")?password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT):$this->input->post( 'old_password' );
					$data = array(
						'ci_ir_password' => $passwords,
						'ci_ir_fname' => $this->input->post( 'firstname' ),
						'ci_ir_lname' => $this->input->post( 'lastname' ),
						'ci_ir_dob' => $this->input->post( 'ci_ir_dob' ),
						'ci_ir_mobile' => $this->input->post( 'mobile_no' ),
						'ci_ir_email' => $this->input->post( 'email' ),
						//'ci_ir_subject' => $this->input->post( 'ci_ir_subject' ),
						'ci_ir_posting' => $this->input->post( 'ci_ir_posting' ),
						//'ci_ir_district' => $this->input->post( 'ci_ir_district' ),
						//'ci_ir_tehsil' => $this->input->post( 'ci_ir_tehsil' ),
						'ci_ir_designation' => $this->input->post( 'ci_ir_designation' ),
						'ci_ir_gender' => $this->input->post( 'ci_ir_gender' ),
						'ci_ir_area' => $this->input->post( 'ci_ir_area' ),
						'ci_ir_deptttype' => $this->input->post( 'ci_ir_deptttype' ),
						'ci_ir_publictype' => $this->input->post( 'ci_ir_publictype' ),
						//'ci_ir_status' => $this->input->post( 'ci_ir_status' ),
						'ci_ir_fathername' => $this->input->post( 'ci_ir_fathername' ),
						'ci_ir_address' => $this->input->post( 'address' ),
						'ci_ir_updated' => date( 'Y-m-d h:i:s' ),
						'ci_ir_qualification' => $this->input->post('qualification'),
						'ci_ir_experienceschool' => $this->input->post('experienceschool'),
						'ci_ir_bankname' => $this->input->post('bankname'),
						'ci_ir_branchcode' => $this->input->post('branchcode'),
						'ci_ir_accounttitle' => $this->input->post('accounttitle'),
						'ci_ir_accountnumber' => $this->input->post('accountnumber'),
						'ci_ir_iban' => $this->input->post('iban'),
					);
					$admin_id = $this->input->post( 'admin_id' );
					$ci_ir_id =  $this->input->post( 'ci_ir_id' );
					if($admin_id == "")
					{
						$this->session->set_flashdata( 'error', 'Restricted Area!' );
						redirect(base_url('admin/auth/login'));
					}
	
					$data_admin = array(
						'admin_role_id' => '6',
						'firstname' => $this->input->post( 'firstname' ),
						'lastname' => $this->input->post( 'lastname' ),
						'email' => $this->input->post( 'email' ),
						'address' => $this->input->post( 'address' ),
						'mobile_no' => $this->input->post( 'mobile_no' ),
						'password' => $passwords,
						'updated_at' => date( 'Y-m-d h:i:s' ),
					);
					////////////////////////////////////////////////////////////////////////////
					$ci_ir_picture = $this->input->post('ci_ir_picture');
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['ci_ir_picture']['name']))
					{
						$result = $this->functions->file_insert($path, 'ci_ir_picture', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_ir_picture'] = $path.$result['msg'];
							$data_admin['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					/////////////////////////////////////////////////////////////////////////////
					$ci_ir_cniccopy = $this->input->post('ci_ir_cniccopy');
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['ci_ir_cniccopy']['name']))
					{
						$result = $this->functions->file_insert($path, 'ci_ir_cniccopy', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_ir_cniccopy'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					if(!empty($_FILES['latestdegree']['name']))
				{
						$result = $this->functions->file_insert($path, 'latestdegree', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_ir_latestdegree'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}

					if(!empty($_FILES['experienceletter']['name']))
					{
						$result = $this->functions->file_insert($path, 'experienceletter', 'image', '9097152');
						if($result['status'] == 1){
							$data['ci_ir_experienceletter'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
						}
					}
					/////////////////////////////////////////////////////////////////////////////
					//echo '<PRE>';
					//print_r($data_admin);
					//echo '<hr>';
					//print_r($data);
					//die();
					$result_admin = $this->Profile_model->edit_ir_tbladmin($admin_id, $data_admin);
					$result = $this->Profile_model->itemwreviewer_edit( $data, $ci_ir_id );
					if ( $result ) {
						$this->session->set_flashdata( 'success', 'Profile has been updated successfully!' );
						redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
					}
				}
			}
		} 
		else
		{
			
			if($this->session->userdata('role_id')==3)
			{
				$data['profileinfo'] = $this->Profile_model->get_itemswriter_by_id( $id );
			}
			elseif($this->session->userdata('role_id')==6)
			{
				$data['profileinfo'] = $this->Profile_model->get_itemsreviewer_by_id( $id );
			}
			$data['districts'] = $this->Profile_model->get_all_districts();
			$data['tehsils'] = $this->Profile_model->get_all_tehsils();
			
			$data['qualifications'] = $this->Profile_model->get_all_qualification();
			$data['banks'] = $this->Profile_model->get_all_banks();
			
			$this->load->view( 'admin/includes/_header' );
			if($this->session->userdata('role_id')==3)
			{
				$this->load->view( 'admin/profile/profile_edit', $data );
			}
			elseif($this->session->userdata('role_id')==6)
			{
				$this->load->view( 'admin/profile/profile_edit_ir', $data );
			}else{
				$data['user'] = $this->user_model->get_user_by_id( $id );
				$data['roles'] = $this->user_model->get_all_roles();
				$data['aes'] = $this->user_model->get_all_aeusers();
				$data['subjects'] = $this->user_model->get_all_subjects_with_grades();
				$data['districts'] = $this->user_model->get_all_districts();
				$this->load->view( 'admin/profile/user_edit', $data );
			}
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	
	public function profile_view( $id = 0 ) 
	{
		$data['title'] = 'Profile View';

		if($this->session->userdata('role_id')==3)
		{
			$data['profileinfo'] = $this->Profile_model->get_itemswriter_by_id( $id );
		}
		elseif($this->session->userdata('role_id')==6)
		{
			$data['profileinfo'] = $this->Profile_model->get_itemsreviewer_by_id( $id );
		}
		$data['districts'] = $this->Profile_model->get_all_districts();
		$data['tehsils'] = $this->Profile_model->get_all_tehsils();

		$this->load->view( 'admin/includes/_header' );
		if($this->session->userdata('role_id')==3)
		{
			$this->load->view( 'admin/profile/profile_view_iw', $data );
		}
		elseif($this->session->userdata('role_id')==6)
		{
			$this->load->view( 'admin/profile/profile_view_ir', $data );
		}else{
			$data['user'] = $this->user_model->get_user_by_id( $id );
			$data['roles'] = $this->user_model->get_all_roles();
			$data['aes'] = $this->user_model->get_all_aeusers();
			$data['subjects'] = $this->user_model->get_all_subjects_with_grades();
			$data['districts'] = $this->user_model->get_all_districts();
			$this->load->view( 'admin/profile/user_profile_view', $data );
		}
		$this->load->view( 'admin/includes/_footer' );
	
	}
	//---------------------------------------------------------------
	public function delete_cniccopy($id = 0){
		$data = array('ci_iw_cniccopy' => '');
		$this->db->where('ci_iw_id', $id);        
		$this->db->update('ci_itemwriter', $data);
		$data['info'] = $this->Profile_model->get_iw_by_id( $id );
		$id_iw =$data['info'][0]['ci_iw_adminid'];
		$this->session->set_flashdata('success', 'CNIC has been deleted successfully!');
		redirect(base_url('admin/profile/profile_edit/'.$id_iw));
	}
	
	//------------------------------------------------------------
	public function delete_picture($id = 0){
		$data = array('ci_iw_picture' => '');
		$this->db->where('ci_iw_id', $id);        
		$this->db->update('ci_itemwriter', $data);
		$data['info'] = $this->Profile_model->get_iw_by_id( $id );
		$id_iw =$data['info'][0]['ci_iw_adminid'];
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/profile/profile_edit/'.$id_iw));
	}
	public function delete_cniccopy_ir($id = 0){
		$data = array('ci_ir_cniccopy' => '');
		$this->db->where('ci_ir_id', $id);        
		$this->db->update('ci_itemreviewers', $data);
		$data['info'] = $this->Profile_model->get_ir_by_id( $id );
		$id_ir =$data['info'][0]['ci_ir_adminid'];
		$this->session->set_flashdata('success', 'CNIC has been deleted successfully!');
		redirect(base_url('admin/profile/profile_edit/'.$id_ir));
	}
	public function delete_picture_ir($id = 0){
		$data = array('ci_ir_picture' => '');
		$this->db->where('ci_ir_id', $id);        
		$this->db->update('ci_itemreviewers', $data);
		$data['info'] = $this->Profile_model->get_ir_by_id( $id );
		$id_ir =$data['info'][0]['ci_ir_adminid'];
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/profile/profile_edit/'.$id_ir));
	}
	
	public function edit( $id = 0 ) {
		if ( $this->input->post( 'submit' ) ) 
		{
			$subjectlist='';
			//$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			//$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'firstname', 'Firstname', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Lastname', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|valid_email|required' );
			$this->form_validation->set_rules( 'mobile_no', 'Number', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			//$this->form_validation->set_rules( 'admin_role_id', 'Admin Role ID', 'trim|required' );
			//$this->form_validation->set_rules( 'is_active', 'User Status', 'trim|required' );
			if ( $this->form_validation->run() == FALSE ) {
				$data[ 'user' ] = $this->user_model->get_user_by_id( $id );
				$data[ 'view' ] = 'admin/users/user_edit';
				$this->load->view( 'layout', $data );
			} else {
				//print $this->input->post( 'parent_admin_id' ); die('123');
				$data = array(
					//'username' => $this->input->post( 'username' ),
					//'password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'mobile_no' => $this->input->post( 'mobile_no' ),
					'address' => $this->input->post( 'address' ),
					//'is_active' => $this->input->post( 'is_active' ),
					//'admin_role_id' => $this->input->post( 'admin_role_id' ),
					//'parent_admin_id' => (($this->input->post('parent_admin_id')!="")?$this->input->post('parent_admin_id'):0),
					'updated_at' => date( 'Y-m-d h:i:s' )
				);
				
				if($this->input->post( 'password' ) != ''){
					$data['password'] = password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT );
				}
				
				if(!empty($_FILES['image']['name']))
				{
					$path="assets/img/user/";
					$result = $this->functions->file_insert($path, 'image', 'image', '9097152');
					if($result['status'] == 1){
						$data['image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
					}
				}

				$data = $this->security->xss_clean( $data );
				$result = $this->user_model->edit_user( $data, $id );
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'Profile has been updated successfully!' );
					redirect(base_url('admin/profile/profile_edit/'.$id), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Edit Profile';
			$data['user'] = $this->user_model->get_user_by_id( $id );
			$data['roles'] = $this->user_model->get_all_roles();
			$data[ 'aes' ] = $this->user_model->get_all_aeusers();
			$data[ 'subjects' ] = $this->user_model->get_all_subjects_with_grades();
			$data['districts'] = $this->user_model->get_all_districts();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/users/user_edit', $data );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	public function send_code($id = 0)
	{
		$pincode = rand(0,1000);
		$varification_code = md5($pincode);
		
		$user = $this->Profile_model->get_user_detail($id);
		$this->Profile_model->update_user_email_verification_code($id,$varification_code);
		
		$email = $user['email'];
		
		//set up email
		if($email != ''){
			$config = array(
				'protocol' => 'mail',
				'smtp_host' => $this->general_settings['smtp_host'],
				'smtp_port' => $this->general_settings['smtp_port'],
				'smtp_user' => $this->general_settings['smtp_user'],
				'smtp_pass' => $this->general_settings['smtp_pass'],
				'mailtype' => 'html',
				'wordwrap' => TRUE
			);

			$verify_link = base_url()."admin/auth/verify_email/".$this->session->userdata('admin_id')."/".$varification_code;
			$message = 	"
						<html>
						<head>
							<title>Verify your email address - PEC Papers System'</title>
						</head>
						<body>
							<p>Pin Code is: ".$pincode."</p>
							<p>Please click the link below to verify your email address.</p>
							<h4><a href='".$verify_link."'>Verify my email</a></h4>
							<p>Regards,<br />
							PEC IT Team,<br />
							Punjab Examination Commission,<br />
							Wahdat Road, Lahore<br />
							Pakistan</p>
						</body>
						</html>
						";

			//$this->load->library('email', $config);
			$this->load->library('email');
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from($this->general_settings['email_from']);
			$this->email->to($email);
			$this->email->subject('Verify your email address - PEC Papers System');
			$this->email->message($message);

			//sending email
			if($this->email->send()){
				$this->session->set_flashdata('success', 'Verfication code send to your email. Please check your inbox to verify your email address!');
			}
			else{
				$this->session->set_flashdata('error', $this->email->print_debugger());

			}
		}
		//$this->load->library('mailer');
		//die;
		
		redirect(base_url('admin/profile/profile_view/'.$id), 'refresh');
		
	}
	
}
?>	