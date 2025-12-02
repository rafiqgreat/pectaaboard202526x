<?php
//For all work of admin side
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Certificate extends MY_Controller {
	public
	function __construct() {
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model( 'admin/Certificate_model', 'Certificate_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}
	//-----------------------------------------------------------
	public
	function index() 
    {
        if($this->session->userdata('role_id') != 2 && $this->session->userdata('role_id') != 1 )
        {
            die('You are not authorized');
        }
		$data[ 'title' ] = 'Generated Certificates List';
		$this->load->view( 'admin/includes/_header', $data );
		$this->load->view( 'admin/certificate/certificate_list' );
		$this->load->view( 'admin/includes/_footer' );
	}
	//-----------------------------------------------------------
	public function datatable_json() 
    {
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$records = $this->Certificate_model->get_all_certificates($this->session->userdata('admin_id'), $this->session->userdata('role_id'));
		}
        elseif($this->session->userdata('role_id')==1){		
			$records = $this->Certificate_model->get_all_certificates($this->session->userdata('admin_id'), $this->session->userdata('role_id'));
		}
		else{
			die('You are not authorized');
			//$records = $this->Itemreviewers_model->get_all_itemreviewers();	
		}
        //print '<pre>';print_r($records); die('123');
		$data = array();
		$i = 0;
		foreach ( $records[ 'data' ] as $row ) {
			$status = ( $row[ 'cf_status' ] == 1 ) ? 'Yes' : 'No';
			$data[] = array(
				++$i,
                $row['firstname'].' '.$row['lastname'].' ('.$row['role_name'] . ')',
				$row[ 'ws_title' ],
                date_time($row['ws_fromdate']).'-'.date_time($row['ws_todate']),
                date_time($row[ 'cf_createddate' ]),
                ( $row[ 'cf_status' ] == 1 ) ? 'Yes' : 'No',
				'<a class="view btn btn-sm btn-info" href="'.base_url().'admin/certificate/view/'.$row['cf_id'].'"><i class="fa fa-eye"></i></a>'
			);
		}
		
		$records[ 'data' ] = $data;
		//print_r($records[ 'data' ]);
		//die();
		echo json_encode( $records );
	}
	//-----------------------------------------------------------
	/*if($this->session->userdata('role_id')==3)
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup_IW($this->session->userdata('admin_id'),$id);
		}*/
	//-----------------------------------------------------------
	public function add()
    {
        if($this->session->userdata('role_id') != 2 && $this->session->userdata('role_id') != 1)
        {
            die('You are not authorized');
        }
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('user_type', 'Type', 'trim|required');
			$this->form_validation->set_rules('cf_iw_ir_id', 'Candidate Name', 'trim|required');
			$this->form_validation->set_rules('cf_ws_id', 'Workshop', 'trim|required');
			$this->form_validation->set_rules('cf_status', 'Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/certificate/add'),'refresh');
			}
			else{
                $cf_iw_ir_id = $this->input->post('cf_iw_ir_id');
                $cf_ws_id = $this->input->post('cf_ws_id');
                $checkExist = $this->Certificate_model->check_certificate_exist($cf_iw_ir_id, $cf_ws_id);
                //print_r($checkExist); die;
                if(!empty($checkExist))
                {
                    $this->session->set_flashdata('errors', 'Certicate already generated');
				    redirect(base_url('admin/certificate/add'),'refresh');
                }
				$data = array(
					'cf_ws_id' => $this->input->post('cf_ws_id'),
					'cf_iw_ir_id' => $this->input->post('cf_iw_ir_id'),
					'cf_created_by' => $this->session->userdata('admin_id'),
					'cf_createddate' => date( 'Y-m-d h:i:s' ),
					'cf_modifieddate' =>date( 'Y-m-d h:i:s' ),
					'cf_status' => $this->input->post('cf_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Certificate_model->add_certificate($data);
                //print $result; die();
				if($result){
                    $insert_id = $result;
                    
                    //qrcode
                    include "phpqrcode/qrlib.php"; 
                    $dirname = $insert_id;
                    if (!is_dir('assets/certificateqrcode/'.$dirname)) {
                        mkdir('./assets/certificateqrcode/' . $dirname, 0777, TRUE);
                    }
                    $path="assets/certificateqrcode/".$dirname."/";
                    $errorCorrectionLevel = 'L';
                    $matrixPointSize = 2;
                    
                    $filename = '';
					$content = base_url()."admin/qrcode/verfiyqrcode/".$insert_id;
					$filename = $path.'certificateqrcode'.md5($insert_id.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
					QRcode::png($content, $filename, $errorCorrectionLevel, $matrixPointSize, 2);	
					
                    $dataqrcode = array();
                    $dataqrcode['cf_qrcode'] = $filename;
                    
                    $update_qrcode = $this->Certificate_model->edit_certificate($dataqrcode, $insert_id);
                    
					$this->session->set_flashdata('success', 'Certificate has been generated successfully!');
					redirect(base_url('admin/certificate'));
				}
			}
		}
		else{
			$data['title'] = 'Generate Certificate';
            $data['itemwriters'] = $this->Certificate_model->get_ss_itemwriters(3, $this->session->userdata('admin_id'));
            $data['workshops'] = $this->Certificate_model->get_all_workshops();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/certificate/certificate_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
    public function users_by_roleid()
	{
		echo json_encode($this->Certificate_model->get_all_users_byroleid($this->input->post('admin_role_id')));
	}
	//-----------------------------------------------------------
    
    public function verfiyqrcode($qrcode = 0)
	{
        //die($qrcode);
		if($qrcode != 0 && $qrcode != ''){
			$data['title'] = 'Verify QR Code';
            
            $exist = $this->Certificate_model->get_certificate_byid($qrcode);
            $data['verifycode'] = $exist;
            if(!empty($exist) && count($exist)>0)
            {
                $this->session->set_flashdata('success', 'QR Code successfully verified!');
            }
            else
            {
                $data['verifycode'] = '';
                $this->session->set_flashdata('errors', 'QR Code invalid!');
            }			
			
			$data['navbar'] = false;
			$data['sidebar'] = false;
			$data['footer'] = false;
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/certificate/qrcode_verify');	
			$this->load->view('admin/includes/_footer', $data);
		}
		else
		{
			$this->session->set_flashdata('errors', 'QR Code invalide!');
		}
		//exit();
	}
    public function view($id = 0){
        $data['title'] = 'View Certificate';
        $data['certificate'] = $this->Certificate_model->get_certificate_byid($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/certificate/cetificate_view', $data);
        $this->load->view('admin/includes/_footer');
	}
	
}
?>