<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pilotheaders extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Pilotheaders_model', 'Pilotheaders_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Pilotheaders List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotheaders/pilotheaders_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){
		if($this->session->userdata('role_id')==1)
		{		
			$records = $this->Pilotheaders_model->get_all_pilotheaders();
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ph_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				'Pilot Phase '.$row['ph_phase'],
				$row['ph_paper_title'],
				$row['ph_paper_subject_en'],
				$row['ph_paper_subject_ur'],
				$row['ph_general_instruction'],
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilotheaders/view/'.$row['ph_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/pilotheaders/edit/'.$row['ph_id']).'"> <i class="fa fa-pencil-square-o"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}
		elseif($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Pilotheaders_model->get_all_pilotheaders_IE($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ph_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				'Pilot Phase '.$row['ph_phase'],
				$row['ph_paper_title'],
				$row['ph_paper_subject_en'],
				$row['ph_paper_subject_ur'],
				$row['ph_general_instruction'],
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilotheaders/view/'.$row['ph_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/pilotheaders/edit/'.$row['ph_id']).'"> <i class="fa fa-pencil-square-o"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}
		else
		{		
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Pilotheaders_model->get_all_pilotheaders_IW($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ph_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				'Pilot Phase '.$row['ph_phase'],
				$row['ph_paper_title'],
				$row['ph_paper_subject_en'],
				$row['ph_paper_subject_ur'],
				$row['username'],
				$row['ph_created_date'],
				$row['ph_general_instruction'],
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilotheaders/view/'.$row['ph_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/pilotheaders/edit/'.$row['ph_id']).'"> <i class="fa fa-pencil-square-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
		}	
	}
	
	public function change_status_approve()
	{
		$this->Pilotheaders_model->change_status_approve();
	}
	
	public function add()
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('ph_general_instruction', 'General Instructions', 'trim|required');
				$this->form_validation->set_rules('ph_status', 'Paper Status', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/pilotheaders/add'),'refresh');
				}
				else{
					$temp = $this->input->post('ph_paper_subject');
					$temp = explode('-',$temp);
					$data = array(
						'ph_paper_title' => $this->input->post('ph_paper_title'),
						'ph_paper_subject' => $this->input->post('ph_paper_subject'),
						'ph_paper_subject_en' => $temp[0],
						'ph_paper_subject_ur' => $temp[1],
						'ph_general_instruction' => $this->input->post('ph_general_instruction'),
						'ph_status' => $this->input->post('ph_status'),
						'ph_phase' => $this->input->post('ph_phase'),
						'ph_creator_id' => $this->session->userdata('admin_id'),	
						'ph_created_date' => date( 'Y-m-d h:i:s' ),
					);
					//print_r($data);
					//die();
					//$data = $this->security->xss_clean($data);
					$result = $this->Pilotheaders_model->add_pilotheaders($data);
					//die($this->db->last_query());
					if($result){
						$this->session->set_flashdata('success', 'Pilot Header has been added successfully!');
						redirect(base_url('admin/pilotheaders'));
					}
				}
			}
			else
			{
				$data['title'] = 'Generate Items Bank';
				$data['grades'] = $this->Pilotheaders_model->get_all_grades();
				//$data['added_subjects'] = $this->Pilotheaders_model->get_all_added_subjects();				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/pilotheaders/pilotheaders_add');
				$this->load->view('admin/includes/_footer');
			}
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Pilotheaders_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}		
		else
		{
			echo json_encode($this->Pilotheaders_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	public function ppilotheaders_by_subject()
	{
		echo json_encode($this->Pilotheaders_model->ppilotheaders_by_subject($this->input->post('subject_id')));
	}
	public function edit($id = 0)
	{
		if($this->input->post('submit')){
				
			$this->form_validation->set_rules('ph_general_instruction', 'General Instructions', 'trim|required');			
			$this->form_validation->set_rules('ph_status', 'Paper Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['pilotheaders'] = $this->Pilotheaders_model->get_pilotheaders_by_id($id);
				$data['view'] = 'admin/pilotheaders/pilotheaders_edit';
				$this->load->view('layout', $data);
			}
			else{
				$temp = $this->input->post('ph_paper_subject');
				$temp = explode('-',$temp);
				$data = array(
					'ph_paper_title' => $this->input->post('ph_paper_title'),
					'ph_paper_subject' => $this->input->post('ph_paper_subject'),
					'ph_paper_subject_en' => $temp[0],
					'ph_paper_subject_ur' => $temp[1],
					'ph_general_instruction' => $this->input->post('ph_general_instruction'),
					'ph_status' => $this->input->post('ph_status'),
					'ph_phase' => $this->input->post('ph_phase'),
					'ph_creator_id' => $this->session->userdata('admin_id'),	
					'ph_created_date' => date( 'Y-m-d h:i:s' ),
				);
				//$data = $this->security->xss_clean($data);
				$result = $this->Pilotheaders_model->edit_pilotheaders($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Pilot Header has been updated successfully!');
					redirect(base_url('admin/pilotheaders'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Pilot Header';
			$data['grades'] = $this->Pilotheaders_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Pilotheaders_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Pilotheaders_model->get_all_subjects();
			}
			$data['pilotheaders'] = $this->Pilotheaders_model->get_pilotheaders_by_id($id);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/pilotheaders/pilotheaders_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function delete($id = 0)
	{
		$this->db->delete('ci_pilotheaders', array('ph_id' => $id));
		$this->session->set_flashdata('success', 'Header has been deleted successfully!');
		redirect(base_url('admin/pilotheaders'));
	}
	
	public function view($id = 0)
	{
		$data['title'] = 'View Pilot Header';
		$data['pilotheaders'] = $this->Pilotheaders_model->get_pilotheaders_by_id($id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotheaders/pilotheaders_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function pheaders_by_subject_phase()
	{
		echo json_encode($this->Pilotheaders_model->pheaders_by_subject_phase($this->input->post('ph_phase'),$this->input->post('ph_paper_subject')));
	}
}
?>