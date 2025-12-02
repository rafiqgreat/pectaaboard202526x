<?php
//For Registration of Itemreviewer without login 
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Itemreviewer extends MY_Controller {
	
	public
	function __construct() {
		parent::__construct();
		//auth_check(); // check login auth
		$this->load->model( 'admin/Itemreviewer_model', 'Itemreviewer_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}
	public
	function add() {
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
				redirect( base_url( 'admin/itemreviewer/add' ), 'refresh' );
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
					'ci_ir_picture' => $this->input->post( 'picture' ),
					'ci_ir_cniccopy' => $this->input->post( 'cniccopy' ),
					'ci_ir_fathername' => $this->input->post( 'fathername' ),
					'ci_ir_address' => $this->input->post( 'address' ),
					'ci_ir_status' => '0',
					'ci_ir_created' => date( 'Y-m-d h:i:s' ),
					'ci_ir_updated' => date( 'Y-m-d h:i:s' ),
					'ci_ir_qualification' => $this->input->post('qualification'),
					'ci_ir_experienceschool' => $this->input->post('experienceschool'),
					'ci_ir_bankname' => $this->input->post('bankname'),
					'ci_ir_branchcode' => $this->input->post('branchcode'),
					'ci_ir_accounttitle' => $this->input->post('accounttitle'),
					'ci_ir_accountnumber' => $this->input->post('accountnumber'),
					'ci_ir_iban' => $this->input->post('iban'),
				];
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
						redirect(base_url('admin/itemreviewer/add'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				//$path="assets/img/itemreviewer/";
				if(!empty($_FILES['picture']['name']))
				{
					$result = $this->functions->file_insert($path, 'picture', 'image', '9097152');
					if($result['status'] == 1){
						$data['ci_ir_picture'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemreviewer/add'), 'refresh');
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
						redirect(base_url('admin/itemreviewer/add'), 'refresh');
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
						redirect(base_url('admin/itemreviewer/add'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////
				$data = $this->security->xss_clean( $data );
				//echo '<PRE>';
				//print_r($data);
				//die('ye data hai');				
				$result = $this->Itemreviewer_model->add_itemreviewer( $data );
				if ( $result ) {
					//die($this->db->last_query());
					$this->session->set_flashdata( 'success', 'Registered successfully!' );
					redirect( base_url('admin/auth/login'));
					//redirect( base_url( 'admin/itemreviewer/add' ) );
				}
			}
		} else {
			$data[ 'title' ] = 'Add Itemreviewer';
			$data['districts'] = $this->Itemreviewer_model->get_all_districts();
			$data['qualifications'] = $this->Itemreviewer_model->get_all_qualification();
			$data['banks'] = $this->Itemreviewer_model->get_all_banks();
			$data['subjects'] = $this->Itemreviewer_model->get_all_subjects_unique();

			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/itemreviewer/itemreviewer_add' );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-------------------------------------------------------------------------------------------------
	public function tehsil_by_district()
			{
				echo json_encode($this->Itemreviewer_model->get_tehsil_by_district($this->input->post('district_id')));
			}
	//-------------------------------------------------------------------------------------------------
	public
	function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->Itemreviewer_model->username_exist( $username );
		echo count( $exists );
	}
	public
	function cnic_exist() {
		$cnic = $this->input->post( 'cnic' );
		$exists = $this->Itemreviewer_model->cnic_exist( $cnic );
		echo count( $exists );
	}
}
?>