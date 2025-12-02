<?php
//For all work of admin side
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
class Workshop extends MY_Controller {
	public
	function __construct() {
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model( 'admin/Workshop_model', 'Workshop_model' );
		$this->load->library( 'datatable' ); // loaded my custom serverside datatable library
	}
	//-----------------------------------------------------------
	public
	function index() 
    {
        if($this->session->userdata('role_id') != 1 )
        {
            die('You are not authorized');
        }
		$data[ 'title' ] = 'Workshops List';
		$this->load->view( 'admin/includes/_header', $data );
		$this->load->view( 'admin/workshop/workshop_list' );
		$this->load->view( 'admin/includes/_footer' );
	}
	//-----------------------------------------------------------
	public function datatable_json() 
    {
		if($this->session->userdata('role_id')==1){		
			$records = $this->Workshop_model->get_all_workshops();
		}
		else{
			die('You are not authorized');
			//$records = $this->Itemreviewers_model->get_all_itemreviewers();	
		}
        //print '<pre>';print_r($records); die('123');
		$data = array();
		$i = 0;
		foreach ( $records[ 'data' ] as $row ) {
			$status = ( $row[ 'ws_status' ] == 1 ) ? 'Yes' : 'No';
			$data[] = array(
				++$i,
                $row['ws_title'],
				$row[ 'ws_desc' ],
                date_time($row['ws_fromdate']).' - '.date_time($row['ws_todate']),
                date_time($row[ 'ws_created' ]),
                ( $row[ 'ws_status' ] == 1 ) ? 'Yes' : 'No',
				'<a class="view btn btn-sm btn-info" href="'.base_url().'admin/workshop/view/'.$row['ws_id'].'"><i class="fa fa-eye"></i></a> <a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url().'admin/workshop/edit/'.$row['ws_id'].'"> <i class="fa fa-pencil-square-o"></i></a> <a title="Delete" class="delete btn btn-sm btn-danger" href="'.base_url().'admin/workshop/delete/'.$row['ws_id'].'" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
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
        if($this->session->userdata('role_id') != 1)
        {
            die('You are not authorized');
        }
		if($this->input->post('submit'))
        {
			$this->form_validation->set_rules('ws_title', 'Workshop Title', 'trim|required');
			$this->form_validation->set_rules('ws_desc', 'Workshop Description', 'trim|required');
			$this->form_validation->set_rules('ws_fromdate', 'From Date', 'trim|required');
			$this->form_validation->set_rules('ws_todate', 'To Date', 'trim|required');
            $this->form_validation->set_rules('ws_status', 'Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/workshop/add'),'refresh');
			}
			else{
				$data = array(
					'ws_title' => $this->input->post('ws_title'),
					'ws_desc' => $this->input->post('ws_desc'),
                    'ws_fromdate' => $this->input->post('ws_fromdate'),
					'ws_todate' => $this->input->post('ws_todate'),
					'ws_created' => date( 'Y-m-d h:i:s' ),
					'ws_modified_date' => date( 'Y-m-d h:i:s' ),
                    'ws_order_date' => date( 'Y-m-d h:i:s' ),
                    'ws_location' => $this->input->post('ws_location'),
                    'ws_noofdays' => $this->input->post('ws_noofdays'),
                    'ws_extra' => $this->input->post('ws_extra'),
                    'ws_location' => $this->input->post('ws_location'),
					'ws_status' => $this->input->post('ws_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Workshop_model->add_workshop($data);
                if($result){
					$this->session->set_flashdata('success', 'Workshop has been added successfully!');
					redirect(base_url('admin/workshop'));
				}
				
			}
		}
		else{
			$data['title'] = 'Add new workshop';
            $this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/workshop/workshop_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
    
    public function edit($id = 0)
    {
        if($this->session->userdata('role_id') != 1)
        {
            die('You are not authorized');
        }
		if($this->input->post('submit'))
        {
			$this->form_validation->set_rules('ws_title', 'Workshop Title', 'trim|required');
			$this->form_validation->set_rules('ws_desc', 'Workshop Description', 'trim|required');
			$this->form_validation->set_rules('ws_fromdate', 'From Date', 'trim|required');
			$this->form_validation->set_rules('ws_todate', 'To Date', 'trim|required');
            $this->form_validation->set_rules('ws_status', 'Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/workshop'),'refresh');
			}
			else{
				$data = array(
					'ws_title' => $this->input->post('ws_title'),
					'ws_desc' => $this->input->post('ws_desc'),
                    'ws_fromdate' => $this->input->post('ws_fromdate'),
					'ws_todate' => $this->input->post('ws_todate'),
					//'ws_created' => date( 'Y-m-d h:i:s' ),
					'ws_modified_date' => date( 'Y-m-d h:i:s' ),
                   // 'ws_order_date' => date( 'Y-m-d h:i:s' ),
                    'ws_location' => $this->input->post('ws_location'),
                    'ws_noofdays' => $this->input->post('ws_noofdays'),
                    'ws_extra' => $this->input->post('ws_extra'),
                    'ws_location' => $this->input->post('ws_location'),
					'ws_status' => $this->input->post('ws_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Workshop_model->edit($data,$id);
                if($result){
					$this->session->set_flashdata('success', 'Workshop has been updated successfully!');
					redirect(base_url('admin/workshop'));
				}
				
			}
		}
		else{
			$data['title'] = 'Edit workshop';
            $data['workshop'] = $this->Workshop_model->get_workshop_byid($id);
            $this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/workshop/workshop_edit');
			$this->load->view('admin/includes/_footer');
		}
		
	}
    
    public function view($id = 0){
        $data['title'] = 'View Workshop';
        $data['workshop'] = $this->Workshop_model->get_workshop_byid($id);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/workshop/cetificate_view', $data);
        $this->load->view('admin/includes/_footer');
	}
    public function delete($id = 0)
	{
		//die('Sorry!!! Workshop cannot be delete!!! Restrictions');
        $this->session->set_flashdata('errors', 'Sorry!!! Workshop cannot be delete!!! Restrictions');
		redirect(base_url('admin/workshop'));
        
		$this->db->delete('ci_workshops', array('ws_id' => $id));
		
		$this->session->set_flashdata('success', 'Workshop has been deleted successfully!');
		redirect(base_url('admin/workshop'));
	}
	
}
?>