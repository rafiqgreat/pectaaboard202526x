<?php
//For Registration of Itemwriter without login 
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Itemwriter extends MY_Controller {
	
	public
	function __construct() {
		parent::__construct();
		//auth_check(); // check login auth
		$this->load->model( 'admin/Itemwriter_model', 'Itemwriter_model' );
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
			//$this->form_validation->set_rules( 'subject', 'Subject', 'trim|required' );
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
				redirect( base_url( 'admin/itemwriter/add' ), 'refresh' );
			} else {
				$subjects = $this->input->post('subject');
				$subject_str = is_array($subjects) ? implode(',', $subjects) : $subjects;
				
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
					'ci_iw_subject' => $subject_str,
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
						redirect(base_url('admin/itemwriter/add'), 'refresh');
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
						redirect(base_url('admin/itemwriter/add'), 'refresh');
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
						redirect(base_url('admin/itemwriter/add'), 'refresh');
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
						redirect(base_url('admin/itemwriter/add'), 'refresh');
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
					$this->session->set_flashdata( 'success', 'Registered successfully!' );
					redirect( base_url('admin/auth/login'));
					//redirect( base_url( 'admin/itemwriter/add' ) );
				}
			}
		} else {
			$data[ 'title' ] = 'Item Writer Registration';
			$data['districts'] = $this->Itemwriter_model->get_all_districts();
			$data['qualifications'] = $this->Itemwriter_model->get_all_qualification();
			$data['banks'] = $this->Itemwriter_model->get_all_banks();
			$data['subjects'] = $this->Itemwriter_model->get_all_subjects_unique();
			
			$data['navbar'] = false;
			$data['sidebar'] = false;
			$data['footer'] = false;
				
			$this->load->view( 'admin/includes/_header', $data );
			$this->load->view( 'admin/itemwriter/itemwriter_add' );
			$this->load->view( 'admin/includes/_footer' );
		}
	}
	//-------------------------------------------------------------------------------------------------
	public function tehsil_by_district()
			{
				echo json_encode($this->Itemwriter_model->get_tehsil_by_district($this->input->post('district_id')));
			}
	//-------------------------------------------------------------------------------------------------
	public
	function username_exist() {
		$username = $this->input->post( 'username' );
		$exists = $this->Itemwriter_model->username_exist( $username );
		echo count( $exists );
	}
	public
	function cnic_exist() {
		$cnic = $this->input->post( 'cnic' );
		$exists = $this->Itemwriter_model->cnic_exist( $cnic );
		echo count( $exists );
	}
    public function rep_item_writer_profile(){
        
        $data['title'] = 'Item Writer Profile Report';
		$data['districts'] = $this->Itemwriter_model->get_all_districts();
        
        if($this->input->post('get_rep'))
		{	
            $data['district_id'] = ( $this->input->post('district_id') !='' ? $this->input->post('district_id') : 0);
            $data['tehsil_id'] = ( $this->input->post('tehsil_id') != '' ? $this->input->post('tehsil_id') : 0);
            $data['subject'] = ($this->input->post('subject') !='' ? $this->input->post('subject') : 0);
            $data['department'] = ($this->input->post('department') !='' ? $this->input->post('department') : 0);
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('district_id') !=''){
               $data['tehsils'] = $this->Itemwriter_model->get_tehsil_by_district($this->input->post('district_id'));
                
            }
            
        }
        
        $this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_item_writer_profile');
		$this->load->view('admin/includes/_footer');
        
    }
    public function get_itemwriter_jason($search_parm=0){
        $records =array();
		$records = $this->Itemwriter_model->get_item_writers_jason($search_parm);
		//print_r($records);
        //exit();
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
				++$i,
                $row['iw_name'],
                '<img alt="Item Writer" src="'.base_url().$row['ci_iw_picture'].'" width="80" height="80">',               
				$row['username'],
                $row['ci_iw_mobile'],
                $row['ci_iw_dob'] ,
                $row['ci_iw_cnic'],
                $row['ci_iw_subject'],
                $row['district_name_en'],
                $row['tehsil_name_en'],
                '<a  href="#" url="'.base_url().'admin/itemwriter/item_writer_info/'.$row['ci_iw_id'].'"><i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
    }
    public function item_writer_export($rep_type='CSV',$district_id=0,$tehsil_id=0,$subject=0,$department=0){
        // get data 
        $res_data = $this->Itemwriter_model->get_item_writers($district_id,$tehsil_id,$subject,$department);
        $data['rep_type'] =$rep_type;
        $data['res_data'] = $res_data; 
        $this->load->view('admin/reports/item_writer_export', $data);
    }
    public function item_writer_info($ci_iw_id){
        
         $data['title'] = 'Item Writer Profile';
         $data['ci_iw_id'] = $ci_iw_id;
         $res_data = $this->Itemwriter_model->item_writer_info_byid($ci_iw_id);
         $data['res_data'] = $res_data; 
         $this->load->view('admin/includes/_header',$data);
		 $this->load->view('admin/reports/item_writer_info');
		 $this->load->view('admin/includes/_footer');
        
        
    }
}
?>