<?php
//For all work of admin side
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Itemwriters extends MY_Controller {
	public
	function __construct() {
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model( 'admin/Itemwriters_model', 'Itemwriters_model' );
		$this->load->model( 'admin/Itemwriter_model', 'Itemwriter_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}
	//-----------------------------------------------------------
	public
	function index() {
		$data[ 'title' ] = 'Itemwriters List';
		$this->load->view( 'admin/includes/_header', $data );
		$this->load->view( 'admin/itemwriters/itemwriters_list' ); 
		$this->load->view( 'admin/includes/_footer' );
	}
	//-----------------------------------------------------------
	public
	function datatable_json() {
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$records = $this->Itemwriters_model->get_all_ss_iw($this->session->userdata('admin_id'),$subjectList);
		}		
		else{
			$records = $this->Itemwriters_model->get_all_itemwriters();	
		}
		//$subjectids = $this->session->userdata('subjects_ids');
		//$subjects = $this->Itemwriters_model->get_subjects_by_id($this->session->userdata('subjects_ids'));
		//print_r($subjectList);
		//die();
		//$records = $this->Itemwriters_model->get_all_itemwriters();	
		
		//print_r($records);
		//die();
		$data = array();
		$i = 0;
		foreach ( $records[ 'data' ] as $row ) {
			$loginid = ( $row[ 'loginid' ] > 0 ) ? 'YES' : 'NO';
			$loginid .= ( $row[ 'iwstatus' ] == 1 ) ? '/ Active' : '/ Inactive';
			$link1 = base_url( 'admin/itemwriters/Itemwriter_approve/' . $row[ 'ci_iw_id' ] );
			$link = '';
			if($row[ 'loginid' ] > 0)
				{$link = '';}
			else
			{$link = '<a title="Approve" class="view btn btn-sm btn-info" href="' . $link1 . '"> <i class="fa fa-check" aria-hidden="true"></i></a>';}
			
			
			
			$iseditable = "";
			if($row[ 'loginid' ] > 0){
			$iseditable = '<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url( 'admin/itemwriters/edit/' . $row[ 'ci_iw_id' ] ) . '"> <i class="fa fa-pencil-square-o"></i></a>';
			}
		
			$status = ( $row[ 'ci_iw_status' ] == 1 ) ? 'checked' : '';
			$data[] = array(
				++$i,
				$row[ 'ci_iw_username' ],
				$row[ 'ci_iw_fname' ].' '.$row[ 'ci_iw_lname' ],
				$row[ 'ci_iw_cnic' ],
				$row[ 'ci_iw_mobile' ].'<br />'.'<span style="font-size:14px">'.$row[ 'ci_iw_email'].'</span>',
				$row[ 'ci_iw_subject' ],
				$row[ 'ci_iw_designation' ].'<br />'.$row[ 'ci_iw_posting'],	
				$row[ 'ci_iw_deptttype' ].'<br />'.$row[ 'ci_iw_publictype' ],
				$loginid,	
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row[ 'ci_iw_id' ] . '" 
				id="cb_' . $row[ 'ci_iw_id' ] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row[ 'ci_iw_id' ] . '"></label>',*/
				$link.$iseditable.'
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemwriters/delete/" . $row[ 'ci_iw_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records[ 'data' ] = $data;
		echo json_encode( $records );
	}
	//-----------------------------------------------------------
	public
	function change_status() {
		$this->Itemwriters_model->change_status();
	}
	//-----------------------------------------------------------
	public
	function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->Itemwriters_model->username_exist( $username );
		echo count( $exists );
	}
	//-----------------------------------------------------------
	public
	function email_exist() {
		$email = $this->input->post( 'email' );
		$exists = $this->Itemwriters_model->email_exist( $email );
		echo count( $exists );
	}
	//-----------------------------------------------------------
	public
	function add() {
		if($this->session->userdata('role_id') != 2)
		{
			die('You are not authorized to add itemwriter');
		}
		if ( $this->input->post( 'submit' ) ) {
			//echo '<PRE>';
			//print_r($_REQUEST);
			//die();
			$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'fathername', 'Fathers Name', 'trim|required' );
			$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'dob', 'Date of Birth', 'trim|required' );
			$this->form_validation->set_rules( 'gender', 'Gender', 'trim|required' );
			$this->form_validation->set_rules( 'mobilenumber', 'Mobile Number', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
			$this->form_validation->set_rules( 'cnic', 'CNIC Number', 'trim|required' );
			$this->form_validation->set_rules( 'designation', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'placeofposting', 'Place of Posting', 'trim|required' );
			$this->form_validation->set_rules( 'subject', 'Subject', 'trim|required' );
			$this->form_validation->set_rules( 'department', 'Department', 'trim|required' );
			$this->form_validation->set_rules( 'publictype', 'Public School Type', 'trim|required' );
			$this->form_validation->set_rules( 'area', 'Area', 'trim|required' );
			$this->form_validation->set_rules( 'tehsil', 'Tehsil', 'trim|required' );
			$this->form_validation->set_rules( 'district', 'District', 'trim|required' );
			
			if ( $this->form_validation->run() == FALSE ) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata( 'errors', $data[ 'errors' ] );
				redirect( base_url( 'admin/itemwriters/add' ), 'refresh' );
			} else {
				$data = [
					'ci_iw_username' => $this->input->post( 'username' ),
					'ci_iw_password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
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
					'ci_iw_picture' => $this->input->post( 'picture' ),
					'ci_iw_cniccopy' => $this->input->post( 'cniccopy' ),
					'ci_iw_fathername' => $this->input->post( 'fathername' ),
					'ci_iw_address' => $this->input->post( 'address' ),
					'ci_iw_status' => '0',
					'ci_iw_created' => date( 'Y-m-d h:i:s' ),
					'ci_iw_updated' => date( 'Y-m-d h:i:s' ),
					'ci_iw_qualification' => $this->input->post('qualification'),
					'ci_iw_experienceschool' => $this->input->post('experienceschool'),
					'ci_iw_bankname' => $this->input->post('bankname'),
					'ci_iw_branchcode' => $this->input->post('branchcode'),
					'ci_iw_accounttitle' => $this->input->post('accounttitle'),
					'ci_iw_accountnumber' => $this->input->post('accountnumber'),
					'ci_iw_iban' => $this->input->post('iban'),
				];
				/////////////////////////////////////////////////////
				/*'ci_iw_latestdegree'
					'ci_iw_experienceletter'*/
				$path="assets/img/itemwriter/";
				if(!empty($_FILES['cniccopy']['name']))
				{
					$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_iw_cniccopy'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemwriters/add'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				//$path="assets/img/itemwriter/";
				if(!empty($_FILES['picture']['name']))
				{
					$result = $this->functions->file_insert($path, 'picture', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_iw_picture'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemwriters/add'), 'refresh');
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
						redirect(base_url('admin/itemwriters/add'), 'refresh');
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
						redirect(base_url('admin/itemwriters/add'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				$data = $this->security->xss_clean( $data );
				//echo '<PRE>';
				//print_r($data);
				//die('ye data hai');				
				$result = $this->Itemwriter_model->add_itemwriter( $data );
				if ( $result ) {
					//die($this->db->last_query());
					$this->session->set_flashdata( 'success', 'Itemwriter has been added successfully!' );
					redirect( base_url('admin/itemwriters'));
					//redirect( base_url( 'admin/itemwriter/add' ) );
				}
			}
		} else {
			$data[ 'title' ] = 'Add New Itemwriter';
			$data['districts'] = $this->Itemwriter_model->get_all_districts();
			$data['qualifications'] = $this->Itemwriter_model->get_all_qualification();
			$data['banks'] = $this->Itemwriter_model->get_all_banks();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/itemwriters/itemwriters_add' );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-----------------------------------------------------------
	public
	function Itemwriter_approve($id) 
	{
		if ( $this->input->post( 'submit' ) ) 
		{
			$subjects = ($_POST['subjects']!='')?implode(",",$_POST['subjects']):'';
			
			$this->form_validation->set_rules( 'itemwritersname', 'Username', 'trim|required' );			
			//$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
			$this->form_validation->set_rules( 'mobile_no', 'Mobile Number', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			$this->form_validation->set_rules( 'is_active', 'Status', 'trim|required' );
			$this->form_validation->set_rules( 'parent_admin_id', 'Parent Admin', 'trim|required' );
			
			if ( $this->form_validation->run() == FALSE ) {
				$data[ 'itemwriters' ] = $this->Itemwriters_model->get_itemswriter_by_id( $id );
				$this->load->view('admin/itemwriters/itemwriters_approve', $data);
			} else {
				$passwords = ($this->input->post( 'password' )!="")?password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT):$this->input->post( 'old_password' );
				$data = array(
					'admin_role_id' => '3',
					'username' => $this->input->post( 'itemwritersname' ),
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'address' => $this->input->post( 'address' ),
					'mobile_no' => $this->input->post( 'mobile_no' ),
					'image' => $this->input->post( 'username' ),
					'password' => $passwords,
					'is_active' => $this->input->post( 'is_active' ),
					'parent_admin_id' => $this->input->post( 'parent_admin_id' ),
					'subjects_ids' => $subjects,
					'created_at' => date( 'Y-m-d h:i:s' ),
					'approvedby' => $_SESSION['admin_id'],
				);
				$data = $this->security->xss_clean( $data );
				$result = $this->Itemwriters_model->add_itemwriter_approve($data);
				$insert_id = $this->db->insert_id();
				$data_adminid = array(
					'ci_iw_adminid' => $insert_id,
					'ci_iw_status' => $this->input->post( 'is_active' ),
				);
				$resultid = $this->Itemwriters_model->add_itemwriter_adminid($id, $data_adminid);
				
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'Itemwriter has been updated successfully!' );
					redirect( base_url( 'admin/itemwriters' ) );
				}
			}
		} else {
			
			$data['title'] = 'Approval Form of Itemwriters';
			$data['itemwriters'] = $this->Itemwriters_model->get_itemwriters_by_id( $id );
			
			$data['districts'] = $this->Itemwriters_model->get_all_districts();
			$data['tehsils'] = $this->Itemwriters_model->get_all_tehsils();
			$data['qualifications'] = $this->Itemwriters_model->get_all_qualification();
			$data['banks'] = $this->Itemwriters_model->get_all_banks();
			
			$data['roles'] = $this->Itemwriters_model->get_all_roles();
			$data['aes'] = $this->Itemwriters_model->get_all_aeusers();
			$data['subjects'] = $this->Itemwriters_model->get_all_subjects_with_grades();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemwriters/itemwriters_approve', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function getSubjectsByAE_ID()
	{
		echo json_encode($this->Itemwriters_model->get_ae_subjects($this->input->post('admin_id')));
	}
	//-----------------------------------------------------------
	public
	function edit( $id = 0 ) {
		if ( $this->input->post( 'submit' ) ) 
		{
			$subjects = ($_POST['subjects']!='')?implode(",",$_POST['subjects']):'';
			
			$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'fathername', 'Fathername', 'trim|required' );
			$this->form_validation->set_rules( 'dob', 'Date of Birth', 'trim|required' );
			$this->form_validation->set_rules( 'gender', 'Gender', 'trim|required' );
			//$this->form_validation->set_rules( 'mobilenumber', 'Mobile Number', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
			$this->form_validation->set_rules( 'cnic', 'CNIC Number', 'trim|required' );
			$this->form_validation->set_rules( 'designation', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'placeofposting', 'Place of Posting', 'trim|required' );
			$this->form_validation->set_rules( 'subject', 'Subject', 'trim|required' );
			$this->form_validation->set_rules( 'department', 'Department', 'trim|required' );
			$this->form_validation->set_rules( 'publictype', 'Public School Type', 'trim|required' );
			$this->form_validation->set_rules( 'area', 'Area', 'trim|required' );
			$this->form_validation->set_rules( 'tehsil', 'Tehsil', 'trim|required' );
			$this->form_validation->set_rules( 'district', 'District', 'trim|required' );
			
			if ( $this->form_validation->run() == FALSE ) {
				$data[ 'itemwriters' ] = $this->Itemwriters_model->get_itemwriters_by_id( $id );
				$data[ 'view' ] = 'admin/itemwriters/edit';
				$this->load->view( 'layout', $data );
			} else {
				$passwords = ($this->input->post( 'password' )!="")?password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT):$this->input->post( 'old_password' );
				$data = array(
					'ci_iw_username' => $this->input->post( 'username' ),
					'ci_iw_password' => $passwords,
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
					//'ci_iw_picture' => $this->input->post( 'picture' ),
					//'ci_iw_cniccopy' => $this->input->post( 'cniccopy' ),
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
				$ci_iw_adminid = $this->input->post( 'ci_iw_adminid' );
				if($ci_iw_adminid == "")
				{
					$this->session->set_flashdata( 'error', 'Issue in editing!' );
					redirect( base_url( 'admin/itemwriters' ) );
				}

				$data_admin = array(
					'admin_role_id' => '3',
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'address' => $this->input->post( 'address' ),
					'mobile_no' => $this->input->post( 'mobilenumber' ),
					//'image' => '',
					'subjects_ids' => $subjects,
					'parent_admin_id' => $this->input->post('parent_admin_id'),
					'password' => $passwords,
					'is_active' => $this->input->post( 'status' ),
					'updated_at' => date( 'Y-m-d h:i:s' ),
				);
				
				$path="assets/img/itemwriter/";
				if(!empty($_FILES['picture']['name']))
				{
					$result = $this->functions->file_insert($path, 'picture', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_iw_picture'] = $path.$result['msg'];
						$data_admin['image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemwriters/edit/'.$id), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$ci_iw_cniccopy = $this->input->post('ci_iw_cniccopy');
				$path="assets/img/itemwriter/";
				if(!empty($_FILES['cniccopy']['name']))
				{
					$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_iw_cniccopy'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemwriters/edit/'.$id), 'refresh');
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
						redirect(base_url('admin/itemwriters/edit/'.$id), 'refresh');
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
						redirect(base_url('admin/itemwriters/edit/'.$id), 'refresh');
					}
				}
				//print_r($data);
				//echo '<hr>';
				//print_r($data_admin);
				//die();
				$result_admin = $this->Itemwriters_model->edit_iw_tbladmin($ci_iw_adminid, $data_admin);
				
				$result = $this->Itemwriters_model->itemwriters_edit( $data, $id );
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'Itemwriter has been updated successfully!' );
					redirect( base_url( 'admin/itemwriters' ) );
				}
			}
		} else {
			$data['title'] = 'Edit Itemwriter';
			$data['itemwriters'] = $this->Itemwriters_model->get_itemwriters_by_id( $id );
			$data['admininfo'] = $this->Itemwriters_model->get_admininfo_by_id( $data['itemwriters']['ci_iw_adminid'] );
			$data['districts'] = $this->Itemwriters_model->get_all_districts();
			$data['tehsils'] = $this->Itemwriters_model->get_all_tehsils();
			$data['qualifications'] = $this->Itemwriters_model->get_all_qualification();
			$data['banks'] = $this->Itemwriters_model->get_all_banks();
			$data['subjectspecialist'] = $this->Itemwriters_model->get_all_ss();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/itemwriters/itemwriters_edit', $data );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-----------------------------------------------------------
	public 
	function delete_cniccopy($id = 0){
		$data = array('ci_iw_cniccopy' => '');
		$this->db->where('ci_iw_id', $id);        
		$this->db->update('ci_itemwriter', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemwriters/edit/'.$id));
	}
	//------------------------------------------------------------
	public 
	function delete_picture($id = 0){
		$data = array('ci_iw_picture' => '');
		$this->db->where('ci_iw_id', $id);        
		$this->db->update('ci_itemwriter', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemwriters/edit/'.$id));
	}
	//-----------------------------------------------------------
	public
	function delete( $id = 0 ) {
		//$this->db->delete( 'ci_itemwriter', array( 'ci_iw_id' => $id ) );
		$this->session->set_flashdata( 'error', 'Itemwriter cannot be deleted!' );
		redirect( base_url( 'admin/itemwriters' ) );
	}
	//---------------------------------------------------------------
	public
	function create_itemwriters_pdf() {
		$this->load->helper( 'pdf_helper' ); // loaded pdf helper
		$data[ 'all_itemwriters' ] = $this->Itemwriters_model->get_itemwriters_for_export();
		$this->load->view( 'admin/itemwriters/itemwriters_pdf', $data );
	}
	//---------------------------------------------------------------	
	public
	function export_csv() {
		// file name 
		$filename = 'users_' . date( 'Y-m-d' ) . '.csv';
		header( "Content-Description: File Transfer" );
		header( "Content-Disposition: attachment; filename=$filename" );
		header( "Content-Type: application/csv; " );
		// get data 
		$user_data = $this->user_model->get_users_for_export();
		// file creation 
		$file = fopen( 'php://output', 'w' );
		$header = array( "ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date" );
		fputcsv( $file, $header );
		foreach ( $user_data as $key => $line ) {
			fputcsv( $file, $line );
		}
		fclose( $file );
		exit;
	}
}
?>