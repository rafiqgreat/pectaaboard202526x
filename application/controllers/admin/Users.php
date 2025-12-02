<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Users extends MY_Controller {
	public
	function __construct() {
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model( 'admin/user_model', 'user_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}
	public
	function index() {
		$data[ 'title' ] = 'User List';
		$this->load->view( 'admin/includes/_header', $data );
		$this->load->view( 'admin/users/user_list' );
		$this->load->view( 'admin/includes/_footer' );
	}
	public
	function datatable_json() {
		$records = $this->user_model->get_all_users();
		$data = array();
		$i = 0;
		foreach ( $records[ 'data' ] as $row ) {
			$status = ( $row[ 'is_active' ] == 1 ) ? 'checked' : '';
			$data[] = array(
				++$i,
				$row[ 'username' ] . '(' . $row[ 'role_name' ] . ')',
				$row[ 'role_name' ],
				$row[ 'email' ],
				$row[ 'mobile_no' ],
				date_time( $row[ 'created_at' ] ),
				'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row[ 'admin_id' ] . '" 
				id="cb_' . $row[ 'admin_id' ] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row[ 'admin_id' ] . '"></label>',
				'<a title="View" class="view btn btn-sm btn-info" href="' . base_url( 'admin/users/edit/' . $row[ 'admin_id' ] ) . '"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url( 'admin/users/edit/' . $row[ 'admin_id' ] ) . '"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/users/delete/" . $row[ 'admin_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records[ 'data' ] = $data;
		echo json_encode( $records );
	}
	//-----------------------------------------------------------
	public
	function change_status() {
		$this->user_model->change_status();
	}
	//---------------------------------------------------------------
	public
	function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->user_model->username_exist( $username );
		echo count( $exists );
	}
	//-----------------------------------------------------------
	public
	function add() {
		if ( $this->input->post( 'submit' ) ) {
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'firstname', 'Firstname', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Lastname', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|valid_email|required' );
			$this->form_validation->set_rules( 'mobile_no', 'Number', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			$this->form_validation->set_rules( 'admin_role_id', 'Admin Role ID', 'trim|required' );
			$this->form_validation->set_rules( 'is_active', 'User Status', 'trim|required' );
			if ( $this->form_validation->run() == FALSE ) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata( 'errors', $data[ 'errors' ] );
				redirect( base_url( 'admin/users/add' ), 'refresh' );
			} else {
				$data = [
					'username' => $this->input->post( 'username' ),
					'password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'mobile_no' => $this->input->post( 'mobile_no' ),
					'address' => $this->input->post( 'address' ),
					'is_active' => $this->input->post( 'is_active' ),
					'admin_role_id' => $this->input->post( 'admin_role_id' ),
					//'parent_admin_id' => (($this->input->post('parent_admin_id')!="")?$this->input->post('parent_admin_id'):0),
					'created_at' => date( 'Y-m-d h:i:s' ),
					'updated_at' => date( 'Y-m-d h:i:s' ),
				];
				
				if($this->input->post( 'admin_role_id' ) == 2 || $this->input->post( 'admin_role_id' ) == 3 || $this->input->post( 'admin_role_id' ) == 6){
					$data['parent_admin_id'] = $this->input->post('parent_admin_id');
				}else{
					$data['parent_admin_id'] = 0;
				}
				
				if($this->input->post( 'admin_role_id' ) == 7){
					$data['u_district_id'] = $this->input->post('u_district_id');
				}
				
				if($this->input->post( 'admin_role_id' ) == 8){
					$data['u_district_id'] = $this->input->post('u_district_id');
					$data['u_tehsil_id'] = $this->input->post('u_tehsil_id');
				}
				
				/*if($this->input->post( 'admin_role_id' ) == 9){
					$data['admin_department'] = $this->input->post('admin_department');
				}*/
				
				$subjectlist = NULL;
				if($this->input->post( 'subjects' )!= "")
				{
					foreach( $this->input->post( 'subjects' ) as $sub)
					{
						$subjectlist .= $sub.',';
					}				
					 //$data['subjects_ids'] = rtrim($subjectlist, ',');					
				}
				
				if($this->input->post( 'admin_role_id' ) == 2 || $this->input->post( 'admin_role_id' ) == 3 || $this->input->post( 'admin_role_id' ) == 4 || $this->input->post( 'admin_role_id' ) == 6){
					$data['subjects_ids'] = rtrim($subjectlist, ',');	
				}else{
					$data['subjects_ids'] = '';
				}
				
				//with user image
				$ci_iw_picture = '';
				$ci_ir_picture = '';
				if($this->input->post( 'admin_role_id' ) == 3){
					/////////////////////////////////////////////////////
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['image']['name']))
					{
						$result = $this->functions->file_insert($path, 'image', 'image', '9097152');
						if($result['status'] == 1){
							$ci_iw_picture = $path.$result['msg'];
							$data['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}
				}
				elseif($this->input->post( 'admin_role_id' ) == 6){
					/////////////////////////////////////////////////////
					$path="assets/img/itemreviewer/";
					if(!empty($_FILES['image']['name']))
					{
						$result = $this->functions->file_insert($path, 'image', 'image', '9097152');
						if($result['status'] == 1){
							$ci_ir_picture = $path.$result['msg'];
							$data['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}
				}else{
					//User Image
					if(!empty($_FILES['image']['name']))
					{
						$path="assets/img/user/";
						$result = $this->functions->file_insert($path, 'image', 'image', '9097152');
						if($result['status'] == 1){
							$data['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}
				}
			
				$data = $this->security->xss_clean( $data );				
				$result = $this->user_model->add_user( $data );
				
				$insert_id = $this->db->insert_id(); //admin_id
				
				//add item writer
				if($this->input->post( 'admin_role_id' ) == 3){
					$iw_data = [
						'ci_iw_username' => $this->input->post( 'username' ),
						'ci_iw_password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
						'ci_iw_fname' => $this->input->post( 'firstname' ),
						'ci_iw_lname' => $this->input->post( 'lastname' ),
						'ci_iw_dob' => $this->input->post( 'dob' ),
						'ci_iw_gender' => $this->input->post( 'gender' ),
						'ci_iw_mobile' => $this->input->post( 'mobile_no' ),
						'ci_iw_email' => $this->input->post( 'email' ),
						'ci_iw_cnic' => $this->input->post( 'cnic' ),
						'ci_iw_designation' => $this->input->post( 'designation' ),
						'ci_iw_posting' => $this->input->post( 'placeofposting' ),
						'ci_iw_subject' => $this->input->post( 'subject' ),
						'ci_iw_deptttype' => $this->input->post( 'department' ),
						'ci_iw_publictype' => $this->input->post( 'publictype' ),
						'ci_iw_area' => $this->input->post( 'area' ),
						'ci_iw_tehsil' => $this->input->post( 'tehsil' ),
						'ci_iw_district' => $this->input->post( 'district' ),
						'ci_iw_picture' => $this->input->post( 'picture' ),
						'ci_iw_cniccopy' => $this->input->post( 'cniccopy' ),
						'ci_iw_fathername' => $this->input->post( 'fathername' ),
						'ci_iw_address' => $this->input->post( 'address' ),
						'ci_iw_adminid' => $insert_id,
						'ci_iw_status' => $this->input->post( 'is_active' ),
						'ci_iw_created' => date( 'Y-m-d h:i:s' ),
						'ci_iw_updated' => date( 'Y-m-d h:i:s' ),
						'ci_iw_qualification' => $this->input->post('qualification'),
						'ci_iw_experienceschool' => $this->input->post('experienceschool'),
						'ci_iw_bankname' => $this->input->post('bankname'),
						'ci_iw_branchcode' => $this->input->post('branchcode'),
						'ci_iw_accounttitle' => $this->input->post('accounttitle'),
						'ci_iw_accountnumber' => $this->input->post('accountnumber'),
						'ci_iw_iban' => $this->input->post('iban')
					];
					/////////////////////////////////////////////////////
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['cniccopy']['name']))
					{
						$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
						if($result['status'] == 1){
							$iw_data['ci_iw_cniccopy'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}
					if(!empty($_FILES['latestdegree']['name']))
					{
						$result = $this->functions->file_insert($path, 'latestdegree', 'image', '9097152');
						if($result['status'] == 1){
							$iw_data['ci_iw_latestdegree'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}

					if(!empty($_FILES['experienceletter']['name']))
					{
						$result = $this->functions->file_insert($path, 'experienceletter', 'image', '9097152');
						if($result['status'] == 1){
							$iw_data['ci_iw_experienceletter'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}
					$iw_data['ci_iw_picture'] = $ci_iw_picture;
					$iw_data = $this->security->xss_clean( $iw_data );
					//echo '<PRE>';
					//print_r($iw_data);
					//die('ye data hai');				
					$result_iw = $this->user_model->add_itemwriter( $iw_data );
				}
				
				if($this->input->post( 'admin_role_id' ) == 6){
					$ir_data = [
						'ci_ir_username' => $this->input->post( 'username' ),
						'ci_ir_password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
						'ci_ir_fname' => $this->input->post( 'firstname' ),
						'ci_ir_lname' => $this->input->post( 'lastname' ),
						'ci_ir_dob' => $this->input->post( 'dob' ),
						'ci_ir_gender' => $this->input->post( 'gender' ),
						'ci_ir_mobile' => $this->input->post( 'mobile_no' ),
						'ci_ir_email' => $this->input->post( 'email' ),
						'ci_ir_cnic' => $this->input->post( 'cnic' ),
						'ci_ir_designation' => $this->input->post( 'designation' ),
						'ci_ir_posting' => $this->input->post( 'placeofposting' ),
						'ci_ir_subject' => $this->input->post( 'subject' ),
						'ci_ir_deptttype' => $this->input->post( 'department' ),
						'ci_ir_publictype' => $this->input->post( 'publictype' ),
						'ci_ir_area' => $this->input->post( 'area' ),
						'ci_ir_tehsil' => $this->input->post( 'tehsil' ),
						'ci_ir_district' => $this->input->post( 'district' ),
						'ci_ir_picture' => $this->input->post( 'picture' ),
						'ci_ir_cniccopy' => $this->input->post( 'cniccopy' ),
						'ci_ir_fathername' => $this->input->post( 'fathername' ),
						'ci_ir_address' => $this->input->post( 'address' ),
						'ci_ir_adminid' => $insert_id,
						'ci_ir_status' => $this->input->post( 'is_active' ),
						'ci_ir_created' => date( 'Y-m-d h:i:s' ),
						'ci_ir_updated' => date( 'Y-m-d h:i:s' ),
						'ci_ir_qualification' => $this->input->post('qualification'),
						'ci_ir_experienceschool' => $this->input->post('experienceschool'),
						'ci_ir_bankname' => $this->input->post('bankname'),
						'ci_ir_branchcode' => $this->input->post('branchcode'),
						'ci_ir_accounttitle' => $this->input->post('accounttitle'),
						'ci_ir_accountnumber' => $this->input->post('accountnumber'),
						'ci_ir_iban' => $this->input->post('iban')
					];
					/////////////////////////////////////////////////////
					$path="assets/img/itemreviewer/";
					if(!empty($_FILES['cniccopy']['name']))
					{
						$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
						if($result['status'] == 1){
							$ir_data['ci_ir_cniccopy'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}
					if(!empty($_FILES['latestdegree']['name']))
					{
						$result = $this->functions->file_insert($path, 'latestdegree', 'image', '9097152');
						if($result['status'] == 1){
							$ir_data['ci_ir_latestdegree'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}

					if(!empty($_FILES['experienceletter']['name']))
					{
						$result = $this->functions->file_insert($path, 'experienceletter', 'image', '9097152');
						if($result['status'] == 1){
							$ir_data['ci_ir_experienceletter'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/add'), 'refresh');
						}
					}
					$ir_data['ci_ir_picture'] = $ci_ir_picture;
					$ir_data = $this->security->xss_clean( $ir_data );
					//echo '<PRE>';
					//print_r($data);
					//die('ye data hai');				
					$result_ir = $this->user_model->add_itemreviewers( $ir_data );
				}
				
				if ( $result ) {
					//die($this->db->last_query());
					$this->session->set_flashdata( 'success', 'User has been added successfully!' );
					redirect( base_url( 'admin/users' ) );
				}
			}
		} else {
			$data[ 'title' ] = 'Add User';
			$data[ 'roles' ] = $this->user_model->get_all_roles();
			$data[ 'aes' ] = $this->user_model->get_all_aeusers();
			$data[ 'subjects' ] = $this->user_model->get_all_subjects_with_grades();
			$data['districts'] = $this->user_model->get_all_districts();
			$data['qualifications'] = $this->user_model->get_all_qualification();
			$data['banks'] = $this->user_model->get_all_banks();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/users/user_add' );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	
	public function tehsil_by_district()
	{
		echo json_encode($this->user_model->get_tehsil_by_district($this->input->post('district_id')));
	}
	//-----------------------------------------------------------
	public function users_by_roleid()
	{
		echo json_encode($this->user_model->get_all_users_byroleid($this->input->post('admin_role_id')));
	}
	public function subject_by_users_id()
	{
		echo json_encode($this->user_model->get_subject_by_users_id($this->input->post('admin_id')));
	}
	public function all_subject_for_ae()
	{
		echo json_encode($this->user_model->get_all_subjects_with_grades());
	}
	
	public function edit( $id = 0 ) {
		if ( $this->input->post( 'submit' ) ) 
		{
			//$subjectlist=rtrim($subjectlist, ',');
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			//$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'firstname', 'Firstname', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Lastname', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|valid_email|required' );
			$this->form_validation->set_rules( 'mobile_no', 'Number', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			//$this->form_validation->set_rules( 'admin_role_id', 'Admin Role ID', 'trim|required' );
			$this->form_validation->set_rules( 'is_active', 'User Status', 'trim|required' );
			if ( $this->form_validation->run() == FALSE ) {
				$data[ 'user' ] = $this->user_model->get_user_by_id( $id );
				$data[ 'view' ] = 'admin/users/user_edit';
				$this->load->view( 'layout', $data );
			} else {
				//print $this->input->post( 'parent_admin_id' ); die('123');
				$data = array(
					'username' => $this->input->post( 'username' ),
					//'password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'mobile_no' => $this->input->post( 'mobile_no' ),
					'address' => $this->input->post( 'address' ),
					'is_active' => $this->input->post( 'is_active' ),
					'admin_role_id' => $this->input->post( 'admin_role_id' ),
					//'parent_admin_id' => (($this->input->post('parent_admin_id')!="")?$this->input->post('parent_admin_id'):0),
					'updated_at' => date( 'Y-m-d h:i:s' )
				);
				$password = '';
				if($this->input->post( 'password' ) != ''){
					$data['password'] = password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT );
					$password = $data['password'];
				}
				
				if($this->input->post( 'admin_role_id' ) == 2 || $this->input->post( 'admin_role_id' ) == 3 || $this->input->post( 'admin_role_id' ) == 6){
					$data['parent_admin_id'] = $this->input->post('parent_admin_id');
				}else{
					$data['parent_admin_id'] = 0;
				}
				
				if($this->input->post( 'admin_role_id' ) == 7){
					$data['u_district_id'] = $this->input->post('u_district_id');
					$data['u_tehsil_id'] = 0;
				}elseif($this->input->post( 'admin_role_id' ) == 8){
					$data['u_district_id'] = $this->input->post('u_district_id');
					$data['u_tehsil_id'] = $this->input->post('u_tehsil_id');
				}else{
					$data['u_district_id'] = 0;
					$data['u_tehsil_id'] = 0;
				}
				
				/*if($this->input->post( 'admin_role_id' ) == 9){
					$data['admin_department'] = $this->input->post('admin_department');
				}
				else{
					$data['admin_department'] = '';
				}*/
				$subjectlist = NULL;
				if($this->input->post( 'subjects' )!= "")
				{
					foreach( $this->input->post( 'subjects' ) as $sub)
					{
						$subjectlist .= $sub.',';
					}														
					$subjectlist = rtrim($subjectlist, ',');
				}
				
				if($this->input->post( 'admin_role_id' ) == 2 || $this->input->post( 'admin_role_id' ) == 3 || $this->input->post( 'admin_role_id' ) == 4 || $this->input->post( 'admin_role_id' ) == 6){
					$data['subjects_ids'] = $subjectlist;
				}else{
					$data['subjects_ids'] = '';
				}
				
				//with user image
				$ci_iw_picture = '';
				$ci_ir_picture = '';
				if($this->input->post( 'admin_role_id' ) == 3){
					/////////////////////////////////////////////////////
					$path="assets/img/itemwriter/";
					if(!empty($_FILES['image']['name']))
					{
						$result = $this->functions->file_insert($path, 'image', 'image', '9097152');
						if($result['status'] == 1){
							$ci_iw_picture = $path.$result['msg'];
							$data['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}
				}
				elseif($this->input->post( 'admin_role_id' ) == 6){
					/////////////////////////////////////////////////////
					$path="assets/img/itemreviewer/";
					if(!empty($_FILES['image']['name']))
					{
						$result = $this->functions->file_insert($path, 'image', 'image', '9097152');
						if($result['status'] == 1){
							$ci_ir_picture = $path.$result['msg'];
							$data['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}
				}else{
					//User Image
					if(!empty($_FILES['image']['name']))
					{
						$path="assets/img/user/";
						$result = $this->functions->file_insert($path, 'image', 'image', '9097152');
						if($result['status'] == 1){
							$data['image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}
				}
				
				if($this->input->post( 'admin_role_id' ) == 6){
					$ir_data = array(
						'ci_ir_username' => $this->input->post( 'username' ),
						'ci_ir_fname' => $this->input->post( 'firstname' ),
						'ci_ir_lname' => $this->input->post( 'lastname' ),
						'ci_ir_dob' => $this->input->post( 'dob' ),
						'ci_ir_gender' => $this->input->post( 'gender' ),
						'ci_ir_mobile' => $this->input->post( 'mobilenumber' ),
						'ci_ir_email' => $this->input->post( 'email' ),
						'ci_ir_cnic' => $this->input->post( 'cnic' ),
						'ci_ir_designation' => $this->input->post( 'designation' ),
						'ci_ir_posting' => $this->input->post( 'placeofposting' ),
						'ci_ir_subject' => $this->input->post( 'subject' ),
						'ci_ir_deptttype' => $this->input->post( 'department' ),
						'ci_ir_publictype' => $this->input->post( 'publictype' ),
						'ci_ir_area' => $this->input->post( 'area' ),
						'ci_ir_tehsil' => $this->input->post( 'tehsil' ),
						'ci_ir_district' => $this->input->post( 'district' ),
						'ci_ir_status' => $this->input->post( 'status' ),
						'ci_ir_fathername' => $this->input->post( 'fathername' ),
						'ci_ir_address' => $this->input->post( 'address' ),
						'ci_ir_updated' => date( 'Y-m-d h:i:s' ),
						'ci_ir_qualification' => $this->input->post('qualification'),
						'ci_ir_experienceschool' => $this->input->post('experienceschool'),
						'ci_ir_bankname' => $this->input->post('bankname'),
						'ci_ir_branchcode' => $this->input->post('branchcode'),
						'ci_ir_accounttitle' => $this->input->post('accounttitle'),
						'ci_ir_accountnumber' => $this->input->post('accountnumber'),
						'ci_ir_iban' => $this->input->post('iban')
					);
					
					if($password != ''){
						$ir_data['ci_ir_password'] = $password;
					}
					
					if($ci_ir_picture != ''){
						$ir_data['ci_ir_picture'] = $ci_ir_picture;
					}
					
					/////////////////////////////////////////////////////
					$path="assets/img/itemreviewer/";
					if(!empty($_FILES['cniccopy']['name']))
					{
						$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
						if($result['status'] == 1){
							$ir_data['ci_ir_cniccopy'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}
					if(!empty($_FILES['latestdegree']['name']))
					{
						$result = $this->functions->file_insert($path, 'latestdegree', 'image', '9097152');
						if($result['status'] == 1){
							$ir_data['ci_ir_latestdegree'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}

					if(!empty($_FILES['experienceletter']['name']))
					{
						$result = $this->functions->file_insert($path, 'experienceletter', 'image', '9097152');
						if($result['status'] == 1){
							$ir_data['ci_ir_experienceletter'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}
					
					$ir_data = $this->security->xss_clean( $ir_data );
					$result = $this->user_model->itemreviewer_edit( $ir_data, $id );
				}
				
				if($this->input->post( 'admin_role_id' ) == 3){
					$iw_data = array(
						'ci_iw_username' => $this->input->post( 'username' ),
						'ci_iw_fname' => $this->input->post( 'firstname' ),
						'ci_iw_lname' => $this->input->post( 'lastname' ),
						'ci_iw_dob' => $this->input->post( 'dob' ),
						'ci_iw_gender' => $this->input->post( 'gender' ),
						'ci_iw_mobile' => $this->input->post( 'mobilenumber' ),
						'ci_iw_email' => $this->input->post( 'email' ),
						'ci_iw_cnic' => $this->input->post( 'cnic' ),
						'ci_iw_designation' => $this->input->post( 'designation' ),
						'ci_iw_posting' => $this->input->post( 'placeofposting' ),
						'ci_iw_subject' => $this->input->post( 'subject' ),
						'ci_iw_deptttype' => $this->input->post( 'department' ),
						'ci_iw_publictype' => $this->input->post( 'publictype' ),
						'ci_iw_area' => $this->input->post( 'area' ),
						'ci_iw_tehsil' => $this->input->post( 'tehsil' ),
						'ci_iw_district' => $this->input->post( 'district' ),
						'ci_iw_status' => $this->input->post( 'status' ),
						'ci_iw_fathername' => $this->input->post( 'fathername' ),
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
					
					if($password != ''){
						$iw_data['ci_iw_password'] = $password;
					}
					
					if($ci_iw_picture != ''){
						$iw_data['ci_iw_picture'] = $ci_iw_picture;
					}
					
					/////////////////////////////////////////////////////
					$path="assets/img/itemreviewer/";
					if(!empty($_FILES['cniccopy']['name']))
					{
						$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
						if($result['status'] == 1){
							$iw_data['ci_iw_cniccopy'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}
					if(!empty($_FILES['latestdegree']['name']))
					{
						$result = $this->functions->file_insert($path, 'latestdegree', 'image', '9097152');
						if($result['status'] == 1){
							$iw_data['ci_iw_latestdegree'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}

					if(!empty($_FILES['experienceletter']['name']))
					{
						$result = $this->functions->file_insert($path, 'experienceletter', 'image', '9097152');
						if($result['status'] == 1){
							$iw_data['ci_iw_experienceletter'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/users/edit/'.$id), 'refresh');
						}
					}

					$iw_data = $this->security->xss_clean( $iw_data );
					$result = $this->user_model->itemwriter_edit( $iw_data, $id );
				}
				
				$data = $this->security->xss_clean( $data );
				$result = $this->user_model->edit_user( $data, $id );
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'User has been updated successfully!' );
					redirect( base_url( 'admin/users' ) );
				}
			}
		} else {
			$data['title'] = 'Edit User';
			$data['user'] = $this->user_model->get_user_by_id( $id );
			$data['roles'] = $this->user_model->get_all_roles();
			$data[ 'aes' ] = $this->user_model->get_all_aeusers();
			$data[ 'subjects' ] = $this->user_model->get_all_subjects_with_grades();
			$data['districts'] = $this->user_model->get_all_districts();
			$data['qualifications'] = $this->user_model->get_all_qualification();
			$data['banks'] = $this->user_model->get_all_banks();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/users/user_edit', $data );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-----------------------------------------------------------
	public function delete( $id = 0 ) {
		//$this->db->delete( 'ci_admin', array( 'admin_id' => $id ) );
		//$this->session->set_flashdata( 'success', 'User has been deleted successfully!' );
		$this->session->set_flashdata( 'error', 'You do not have permission to delete the user!' );
		redirect( base_url( 'admin/users' ) );
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public	function create_users_pdf() {
		$this->load->helper( 'pdf_helper' ); // loaded pdf helper
		$data[ 'all_users' ] = $this->user_model->get_users_for_export();
		$this->load->view( 'admin/users/users_pdf', $data );
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public	function export_csv() {
		// file name 
		$filename = 'users_' . date( 'Y-m-d' ) . '.csv';
		header( "Content-Description: File Transfer" );
		header( "Content-Disposition: attachment; filename=$filename" );
		header( "Content-Type: application/csv; " );
		// get data 
		$user_data = $this->user_model->get_users_for_export();
		// file creation 
		$file = fopen( 'php://output', 'w' );
		$header = array( "ID", "Username", "Type", "First Name", "Last Name", "Email", "Mobile_no", "Created Date" );
		fputcsv( $file, $header );
		foreach ( $user_data as $key => $line ) {
			fputcsv( $file, $line );
		}
		fclose( $file );
		exit;
	}
}
?>