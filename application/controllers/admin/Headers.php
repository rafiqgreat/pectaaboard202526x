<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Headers extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Headers_model', 'Headers_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Headers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/headers/headers_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){
		if($this->session->userdata('role_id')==1)
		{		
			$records = $this->Headers_model->get_all_headers();
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['h_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['username'],
				$row['h_created_date'],
				$row['h_general_instruction'],
				$row['h_paper_instruction_en'],
				$row['h_paper_instruction_ur'],
				$row['h_paper_marks'],
				$row['h_paper_type'],
				$row['h_paper_time'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['h_id'].'" 
				id="cb_'.$row['h_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['h_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/headers/view/'.$row['h_id']).'"> <i class="fa fa-eye"></i></a>'
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
			$records = $this->Headers_model->get_all_headers_IE($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['h_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['username'],
				$row['h_created_date'],
				$row['h_general_instruction'],
				$row['h_paper_instruction_en'],
				$row['h_paper_instruction_ur'],
				$row['h_paper_marks'],
				$row['h_paper_type'],
				$row['h_paper_time'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['h_id'].'" 
				id="cb_'.$row['h_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['h_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/headers/view/'.$row['h_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/headers/edit/'.$row['h_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/headers/delete/".$row['h_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
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
			$records = $this->Headers_model->get_all_headers_IW($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['h_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['username'],
				$row['h_created_date'],
				$row['h_general_instruction'],
				$row['h_paper_instruction_en'],
				$row['h_paper_instruction_ur'],
				$row['h_paper_marks'],
				$row['h_paper_type'],
				$row['h_paper_time'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['h_id'].'" 
				id="cb_'.$row['h_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['h_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/headers/view/'.$row['h_id']).'"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
		}	
	}
	
	public function change_status_approve()
	{
		$this->Headers_model->change_status_approve();
	}
	
	public function add()
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('h_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('h_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('h_general_instruction', 'General Instructions', 'trim|required');
				//$this->form_validation->set_rules('h_paper_marks', 'Paper Marks', 'trim|required');
				//$this->form_validation->set_rules('h_paper_type', 'Paper Type', 'trim|required');
				//$this->form_validation->set_rules('h_paper_time', 'Paper Time', 'trim|required');
				$this->form_validation->set_rules('h_status', 'Paper Status', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/headers/add'),'refresh');
				}
				else{
					$data = array(
						'h_grade_id' => $this->input->post('h_grade_id'),
						'h_subject_id' => $this->input->post('h_subject_id'),
						'h_paper_type_top' => $this->input->post('h_paper_type_top'),
						'h_general_instruction' => $this->input->post('h_general_instruction'),
						'h_paper_instruction_en' => $this->input->post('h_paper_instruction_en'),
						'h_paper_instruction_ur' =>$this->input->post('h_paper_instruction_ur'),
						'h_paper_marks' => $this->input->post('h_paper_marks'),
						'h_sub_title_marks' => $this->input->post('h_sub_title_marks'),
						'h_paper_marks_ur' => $this->input->post('h_paper_marks_ur'),
						'h_paper_type' => $this->input->post('h_paper_type'),
						'h_paper_type_ur' => $this->input->post('h_paper_type_ur'),
						'h_paper_time' => $this->input->post('h_paper_time'),
						'h_paper_time_ur' => $this->input->post('h_paper_time_ur'),
						'h_status' => $this->input->post('h_status'),
						'h_creator_id' => $this->session->userdata('admin_id'),	
						'h_created_date' => date( 'Y-m-d h:i:s' ),
					);
					//print_r($data);
					//die();
					//$data = $this->security->xss_clean($data);
					$result = $this->Headers_model->add_headers($data);
					//die($this->db->last_query());
					if($result){
						$this->session->set_flashdata('success', 'Header has been added successfully!');
						redirect(base_url('admin/headers'));
					}
				}
			}
			else
			{
				$data['title'] = 'Generate Final Paper Header';
				$data['grades'] = $this->Headers_model->get_all_grades();
				//$data['added_subjects'] = $this->Headers_model->get_all_added_subjects();				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/headers/headers_add');
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
			echo json_encode($this->Headers_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}		
		else
		{
			echo json_encode($this->Headers_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	public function pheaders_by_subject()
	{
		echo json_encode($this->Headers_model->pheaders_by_subject($this->input->post('subject_id'), $this->input->post('type')));
	}
	public function edit($id = 0)
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('h_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('h_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('h_general_instruction', 'General Instructions', 'trim|required');			
			//$this->form_validation->set_rules('h_paper_marks', 'Paper Marks', 'trim|required');
			//$this->form_validation->set_rules('h_paper_type', 'Paper Type', 'trim|required');
			//$this->form_validation->set_rules('h_paper_time', 'Paper Time', 'trim|required');
			$this->form_validation->set_rules('h_status', 'Paper Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['headers'] = $this->Headers_model->get_headers_by_id($id);
				$data['view'] = 'admin/headers/headers_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'h_grade_id' => $this->input->post('h_grade_id'),
					'h_subject_id' => $this->input->post('h_subject_id'),
					'h_paper_type_top' => $this->input->post('h_paper_type_top'),
					'h_general_instruction' => $this->input->post('h_general_instruction', FALSE),
					'h_paper_instruction_en' => $this->input->post('h_paper_instruction_en'),
					'h_paper_instruction_ur' =>$this->input->post('h_paper_instruction_ur'),
					'h_paper_marks' => $this->input->post('h_paper_marks'),
					'h_sub_title_marks' => $this->input->post('h_sub_title_marks'),
					'h_paper_marks_ur' => $this->input->post('h_paper_marks_ur'),
					'h_paper_type' => $this->input->post('h_paper_type'),
					'h_paper_type_ur' => $this->input->post('h_paper_type_ur'),
					'h_paper_time' => $this->input->post('h_paper_time'),
					'h_paper_time_ur' => $this->input->post('h_paper_time_ur'),
					'h_status' => $this->input->post('h_status'),
					'h_creator_id' => $this->session->userdata('admin_id'),						
				);
				//$data = $this->security->xss_clean($data);
				$result = $this->Headers_model->edit_headers($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Header has been updated successfully!');
					redirect(base_url('admin/headers'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Header';
			$data['grades'] = $this->Headers_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Headers_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Headers_model->get_all_subjects();
			}
			$data['headers'] = $this->Headers_model->get_headers_by_id($id);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/headers/headers_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function delete($id = 0)
	{
		$this->db->delete('ci_headers', array('h_id' => $id));
		$this->session->set_flashdata('success', 'Header has been deleted successfully!');
		redirect(base_url('admin/headers'));
	}
	
	public function view($id = 0)
	{
		$data['title'] = 'View Header';
		$data['headers'] = $this->Headers_model->get_headers_by_id($id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/headers/headers_view', $data);
		$this->load->view('admin/includes/_footer');
	}
}
?>