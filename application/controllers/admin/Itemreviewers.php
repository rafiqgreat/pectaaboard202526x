<?php
//For all work of admin side
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Itemreviewers extends MY_Controller {
	public
	function __construct() {
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model( 'admin/Itemreviewers_model', 'Itemreviewers_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}
	//-----------------------------------------------------------
	public
	function index() {
		$data[ 'title' ] = 'Itemreviewers List';
		$this->load->view( 'admin/includes/_header', $data );
		$this->load->view( 'admin/itemreviewers/itemreviewers_list' );
		$this->load->view( 'admin/includes/_footer' );
	}
	//-----------------------------------------------------------
	public
	function datatable_json() {
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$records = $this->Itemreviewers_model->get_all_ss_ir($this->session->userdata('admin_id'),$subjectList);
		}		
		else{
			die('You are not authorized');
			//$records = $this->Itemreviewers_model->get_all_itemreviewers();	
		}
		$data = array();
		$i = 0;
		foreach ( $records[ 'data' ] as $row ) {
			$loginid = ( $row[ 'loginid' ] > 0 ) ? 'YES' : 'NO';
			$loginid .= ( $row[ 'irstatus' ] == 1 ) ? '/ Active' : '/ Inactive';
			$link1 = base_url( 'admin/itemreviewers/Itemreviewers_approve/' . $row[ 'ci_ir_id' ] );
			
			
			$link = '';
			if($row[ 'loginid' ] > 0)
				{$link = '';}
			else
			{$link = '<a title="Approve" class="view btn btn-sm btn-info" href="' . $link1 . '"> <i class="fa fa-check" aria-hidden="true"></i></a>';}
			
			
			
			$iseditable = "";
			if($row[ 'loginid' ] > 0){
			$iseditable = '<a title="Edit" class="update btn btn-sm btn-warning" href="' . base_url( 'admin/itemreviewers/edit/' . $row[ 'ci_ir_id' ] ) . '"> <i class="fa fa-pencil-square-o"></i></a>';
			}
		
			$status = ( $row[ 'ci_ir_status' ] == 1 ) ? 'checked' : '';
			$data[] = array(
				++$i,
				$row[ 'ci_ir_username' ],
				$row[ 'ci_ir_fname' ].' '.$row[ 'ci_ir_lname' ],
				$row[ 'ci_ir_cnic' ],
				$row[ 'ci_ir_mobile' ].'<br />'.'<span style="font-size:14px">'.$row[ 'ci_ir_email'].'</span>',
				$row[ 'ci_ir_subject' ],
				$row[ 'ci_ir_designation' ].'<br />'.$row[ 'ci_ir_posting'],	
				$row[ 'ci_ir_deptttype' ].'<br />'.$row[ 'ci_ir_publictype' ],
				$loginid,	
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="' . $row[ 'ci_ir_id' ] . '" 
				id="cb_' . $row[ 'ci_ir_id' ] . '"
				type="checkbox"  
				' . $status . '><label for="cb_' . $row[ 'ci_ir_id' ] . '"></label>',*/
				$link.$iseditable.'
				<a title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemreviewers/delete/" . $row[ 'ci_ir_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		
		$records[ 'data' ] = $data;
		//print_r($records[ 'data' ]);
		//die();
		echo json_encode( $records );
	}
	//-----------------------------------------------------------
	public
	function change_status() {
		$this->Itemreviewers_model->change_status();
	}
	//-----------------------------------------------------------
	public
	function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->Itemreviewers_model->username_exist( $username );
		echo count( $exists );
	}
	//-----------------------------------------------------------
	public
	function email_exist() {
		$email = $this->input->post( 'email' );
		$exists = $this->Itemreviewers_model->email_exist( $email );
		echo count( $exists );
	}
	//-----------------------------------------------------------
	public
	function add() {
		//die('It is not allowed');
		if ( $this->input->post( 'submit' ) ) {
			$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
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
				redirect( base_url( 'admin/itemreviewers/add' ), 'refresh' );
			} else {
				$data = [
					'ci_ir_username' => $this->input->post( 'username' ),
					'ci_ir_password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),
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
					'ci_ir_address' => $this->input->post( 'address' ),
					'ci_ir_status' => '0',
					'ci_ir_created' => date( 'Y-m-d h:i:s' ),
					'ci_ir_updated' => date( 'Y-m-d h:i:s' ),
				];
				/////////////////////////////////////////////////////
				$path="assets/img/itemreviewer/";
				if(!empty($_FILES['ci_ir_cniccopy']['name']))
				{
					$result = $this->functions->file_insert($path, 'ci_ir_cniccopy', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_ir_cniccopy'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemwritesr/add'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				$path="assets/img/itemreviewer/";
				if(!empty($_FILES['ci_ir_picture']['name']))
				{
					$result = $this->functions->file_insert($path, 'ci_ir_picture', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_ir_picture'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemreviewers'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				$data = $this->security->xss_clean( $data );
				//print_r($data);
				//die();
				$result = $this->Itemreviewers_model->add_itemreviewers( $data );
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'Itemreviewer added successfully!' );
					redirect( base_url( 'admin/itemreviewers' ) );
				}
			}
		} else {
			$data[ 'title' ] = 'Add Itemreviewer';
			//$data[ 'subjects' ] = $this->user_model->get_all_subjects_with_grades();
			$this->load->view( 'admin/includes/_header', '' );
			$this->load->view( 'admin/itemreviewers/itemreviewers_add' );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-----------------------------------------------------------
	public
	function Itemreviewers_approve($id) 
	{
		if ( $this->input->post( 'submit' ) ) 
		{
			$subjects = ($_POST['subjects']!='')?implode(",",$_POST['subjects']):'';
			$this->form_validation->set_rules( 'itemreviewersname', 'Username', 'trim|required' );			
			$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required' );
			$this->form_validation->set_rules( 'mobile_no', 'Mobile Number', 'trim|required' );
			$this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
			$this->form_validation->set_rules( 'is_active', 'Status', 'trim|required' );
			$this->form_validation->set_rules( 'parent_admin_id', 'Parent Admin', 'trim|required' );
			
			if ( $this->form_validation->run() == FALSE ) {
				$data[ 'itemreviewers' ] = $this->Itemreviewers_model->get_itemsreviewers_by_id( $id );
				$this->load->view('admin/itemreviewers/itemreviewers_approve', $data);
			} else {
				$passwords = ($this->input->post( 'password' )!="")?password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT):$this->input->post( 'old_password' );
				$data = array(
					'admin_role_id' => '6',
					'username' => $this->input->post( 'itemreviewersname' ),
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'address' => $this->input->post( 'address' ),
					'mobile_no' => $this->input->post( 'mobile_no' ),
					'password' => $passwords,
					'is_active' => $this->input->post( 'is_active' ),
					'parent_admin_id' => $this->input->post( 'parent_admin_id' ),
					'subjects_ids' => $subjects,
					'created_at' => date( 'Y-m-d h:i:s' ),
					'approvedby' => $_SESSION['admin_id'],
				);
				//$data = $this->security->xss_clean( $data );
				$result = $this->Itemreviewers_model->add_itemreviewers_approve($data);
				$insert_id = $this->db->insert_id();
				$data_adminid = array(
					'ci_ir_adminid' => $insert_id,
					'ci_ir_status' => $this->input->post( 'is_active' ),
				);
				//print_r($data_adminid);
				//die();
				$resultid = $this->Itemreviewers_model->add_itemreviewers_adminid($id, $data_adminid);
				
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'Itemreviewer has been updated successfully!' );
					redirect( base_url( 'admin/itemreviewers' ) );
				}
			}
		} else {
			$data['title'] = 'Approval Form of Itemreviewers';
			$data['itemreviewers'] = $this->Itemreviewers_model->get_itemreviewers_by_id( $id );
			$data['roles'] = $this->Itemreviewers_model->get_all_roles();
			$data['aes'] = $this->Itemreviewers_model->get_all_aeusers();
			$data['subjects'] = $this->Itemreviewers_model->get_all_subjects_with_grades();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemreviewers/itemreviewers_approve', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function getSubjectsByAE_ID()
	{
		echo json_encode($this->Itemreviewers_model->get_ae_subjects($this->input->post('admin_id')));
	}
	//-----------------------------------------------------------
	public
	function edit( $id = 0 ) {
		if ( $this->input->post( 'submit' ) ) 
		{
			$subjects = ($_POST['subjects']!='')?implode(",",$_POST['subjects']):'';
			//$subjects = ($_POST['subjects']!='')?implode(",",$_POST['subjects']):'';
			$this->form_validation->set_rules( 'firstname', 'First Name', 'trim|required' );
			$this->form_validation->set_rules( 'lastname', 'Last Name', 'trim|required' );
			$this->form_validation->set_rules( 'username', 'Username', 'trim|required' );
			$this->form_validation->set_rules( 'fathername', 'Fathername', 'trim|required' );
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
				$data[ 'itemreviewers' ] = $this->Itemreviewers_model->get_itemreviewers_by_id( $id );
				$data[ 'view' ] = 'admin/itemreviewers/itemreviewers_edit';
				$this->load->view( 'layout', $data );
			} else {
				$passwords = ($this->input->post( 'password' )!="")?password_hash($this->input->post( 'password' ), PASSWORD_BCRYPT):$this->input->post( 'old_password' );
				$data = array(
					'ci_ir_username' => $this->input->post( 'username' ),
					'ci_ir_password' => $passwords,
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
				/////////////////////////////////////////////////////
				$ci_ir_adminid = $this->input->post( 'ci_ir_adminid' );
				if($ci_ir_adminid == "")
				{
					$this->session->set_flashdata( 'error', 'Issue in editing!' );
					redirect( base_url( 'admin/itemreviewers' ) );
				}
				$data_admin = array(
					'admin_role_id' => '6',
					'firstname' => $this->input->post( 'firstname' ),
					'lastname' => $this->input->post( 'lastname' ),
					'email' => $this->input->post( 'email' ),
					'address' => $this->input->post( 'address' ),
					'mobile_no' => $this->input->post( 'mobilenumber' ),
					'subjects_ids' =>$subjects,
					'password' => $passwords,
					'is_active' => $this->input->post( 'status' ),
					'updated_at' => date( 'Y-m-d h:i:s' ),
				);
				/////////////////////////////////////////////////////
				$path="assets/img/itemreviewer/";
				if(!empty($_FILES['cniccopy']['name']))
				{
					$result = $this->functions->file_insert($path, 'cniccopy', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_ir_cniccopy'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemreviewers/edit/'.$id), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				$path="assets/img/itemreviewer/";
				if(!empty($_FILES['picture']['name']))
				{
					$result = $this->functions->file_insert($path, 'picture', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_ir_picture'] = $path.$result['msg'];
						$data_admin['image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemreviewers/edit/'.$id), 'refresh');
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
						redirect(base_url('admin/itemreviewers/edit/'.$id), 'refresh');
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
						redirect(base_url('admin/itemreviewers/edit/'.$id), 'refresh');
					}
				}
				
				//$data_admin = $this->security->xss_clean( $data_admin );
				//echo '<pre>';
				//print_r($data);
				//echo '<hr>';
				//print_r($data_admin);
				//die();
				$result_admin = $this->Itemreviewers_model->edit_iw_tbladmin($ci_ir_adminid, $data_admin);
				
				$data = $this->security->xss_clean( $data );
				$result = $this->Itemreviewers_model->itemreviewers_edit( $data, $id );
				if ( $result ) {
					$this->session->set_flashdata( 'success', 'Itemreviewer has been updated successfully!' );
					redirect( base_url( 'admin/itemreviewers' ) );
				}
			}
		} else {
			$data['title'] = 'Edit Itemreviewer';
			$data['itemreviewers'] = $this->Itemreviewers_model->get_itemreviewers_by_id( $id );
			$data['revadmininfo'] = $this->Itemreviewers_model->get_revadmininfo_by_id( $data['itemreviewers']['ci_ir_adminid'] );
			$data['subjectspecialist'] = $this->Itemreviewers_model->get_all_ss();
			$data['districts'] = $this->Itemreviewers_model->get_all_districts();
			$data['tehsils'] = $this->Itemreviewers_model->get_all_tehsils();
			$data['qualifications'] = $this->Itemreviewers_model->get_all_qualification();
			$data['banks'] = $this->Itemreviewers_model->get_all_banks();
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/itemreviewers/itemreviewers_edit', $data );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-----------------------------------------------------------
	public 
	function delete_cniccopy($id = 0){
		$data = array('ci_ir_cniccopy' => '');
		$this->db->where('ci_ir_id', $id);        
		$this->db->update('ci_itemreviewers', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemreviewers/edit/'.$id));
	}
	//------------------------------------------------------------
	public 
	function delete_picture($id = 0){
		$data = array('ci_ir_picture' => '');
		$this->db->where('ci_ir_id', $id);        
		$this->db->update('ci_itemreviewers', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemreviewers/edit/'.$id));
	}
	//-----------------------------------------------------------
	public
	function delete( $id = 0 ) {
		//$this->db->delete( 'ci_itemreviewers', array( 'ci_ir_id' => $id ) );
		$this->session->set_flashdata( 'error', 'Sorry! Itemreviewer cannot be deleted!' );
		redirect( base_url( 'admin/itemreviewers' ) );
	}
	//---------------------------------------------------------------
	public
	function create_users_pdf() {
		$this->load->helper( 'pdf_helper' ); // loaded pdf helper
		$data[ 'all_users' ] = $this->user_model->get_users_for_export();
		$this->load->view( 'admin/itemreviewers/itemreviewers_pdf', $data );
	}
	//---------------------------------------------------------------	
	public
	function ss_ir_pdf() {
		$this->load->helper( 'pdf_helper' ); // loaded pdf helper
		$data[ 'all_itemreviewers' ] = $this->Itemreviewers_model->get_ir_for_export_pdf();
		$this->load->view( 'admin/itemreviewers/itemreviewers_pdf', $data );
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