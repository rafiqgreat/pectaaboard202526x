<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Paperinstructions extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Paperinstructions_model', 'Paperinstructions_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Paper Instructions List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paperinstructions/paperinstructions_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){
		if($this->session->userdata('role_id')==1)
		{		
			$records = $this->Paperinstructions_model->get_all_paperinstructions();
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['pi_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['username'],
				$row['pi_created_date'],
				$row['pi_general_instruction'],
				$row['pi_paper_instruction_en'],
				$row['pi_paper_instruction_ur'],
				$row['pi_paper_marks'],
				$row['pi_paper_type'],
				$row['pi_paper_time'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['pi_id'].'" 
				id="cb_'.$row['pi_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['pi_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paperinstructions/view/'.$row['pi_id']).'"> <i class="fa fa-eye"></i></a>'
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
			$records = $this->Paperinstructions_model->get_all_paperinstructions_IE($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['pi_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['username'],
				$row['pi_created_date'],
				$row['pi_general_instruction'],
				$row['pi_paper_instruction_en'],
				$row['pi_paper_instruction_ur'],
				$row['pi_paper_marks'],
				$row['pi_paper_type'],
				$row['pi_paper_time'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['pi_id'].'" 
				id="cb_'.$row['pi_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['pi_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paperinstructions/view/'.$row['pi_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/paperinstructions/edit/'.$row['pi_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paperinstructions/delete/".$row['pi_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
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
			$records = $this->Paperinstructions_model->get_all_paperinstructions_IW($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['pi_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['username'],
				$row['pi_created_date'],
				$row['pi_general_instruction'],
				$row['pi_paper_instruction_en'],
				$row['pi_paper_instruction_ur'],
				$row['pi_paper_marks'],
				$row['pi_paper_type'],
				$row['pi_paper_time'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['pi_id'].'" 
				id="cb_'.$row['pi_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['pi_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paperinstructions/view/'.$row['pi_id']).'"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
		}	
	}
	
	public function change_status_approve()
	{
		$this->Paperinstructions_model->change_status_approve();
	}
	
	public function add()
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('pi_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('pi_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('pi_general_instruction', 'General Instructions', 'trim|required');
				$this->form_validation->set_rules('pi_paper_marks', 'Paper Marks', 'trim|required');
				$this->form_validation->set_rules('pi_paper_type', 'Paper Type', 'trim|required');
				$this->form_validation->set_rules('pi_paper_time', 'Paper Time', 'trim|required');
				$this->form_validation->set_rules('pi_status', 'Paper Status', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/paperinstructions/add'),'refresh');
				}
				else{
					$data = array(
						'pi_grade_id' => $this->input->post('pi_grade_id'),
						'pi_subject_id' => $this->input->post('pi_subject_id'),
						'pi_general_instruction' => $this->input->post('pi_general_instruction'),
						'pi_paper_instruction_en' => $this->input->post('pi_paper_instruction_en'),
						'pi_paper_instruction_ur' =>$this->input->post('pi_paper_instruction_ur'),
						'pi_paper_marks' => $this->input->post('pi_paper_marks'),
						'pi_paper_type' => $this->input->post('pi_paper_type'),
						'pi_paper_time' => $this->input->post('pi_paper_time'),
						'pi_status' => $this->input->post('pi_status'),
						'pi_creator_id' => $this->session->userdata('admin_id'),							
					);
					//print_r($data);
					//die();
					//$data = $this->security->xss_clean($data);
					$result = $this->Paperinstructions_model->add_paperinstructions($data);
					//die($this->db->last_query());
					if($result){
						$this->session->set_flashdata('success', 'Paper Instructions has been added successfully!');
						redirect(base_url('admin/paperinstructions'));
					}
				}
			}
			else
			{
				$data['title'] = 'Generate Items Bank';
				$data['grades'] = $this->Paperinstructions_model->get_all_grades();
				//$data['added_subjects'] = $this->Paperinstructions_model->get_all_added_subjects();				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/paperinstructions/paperinstructions_add');
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
			echo json_encode($this->Paperinstructions_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}		
		else
		{
			echo json_encode($this->Paperinstructions_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	public function pheaders_by_subject()
	{
		echo json_encode($this->Paperinstructions_model->pheaders_by_subject($this->input->post('subject_id')));
	}
	public function edit($id = 0)
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('pi_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('pi_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('pi_general_instruction', 'General Instructions', 'trim|required');			
			$this->form_validation->set_rules('pi_paper_marks', 'Paper Marks', 'trim|required');
			$this->form_validation->set_rules('pi_paper_type', 'Paper Type', 'trim|required');
			$this->form_validation->set_rules('pi_paper_time', 'Paper Time', 'trim|required');
			$this->form_validation->set_rules('pi_status', 'Paper Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['paperinstructions'] = $this->Paperinstructions_model->get_paperinstructions_by_id($id);
				$data['view'] = 'admin/paperinstructions/paperinstructions_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'pi_grade_id' => $this->input->post('pi_grade_id'),
					'pi_subject_id' => $this->input->post('pi_subject_id'),
					'pi_general_instruction' => $this->input->post('pi_general_instruction', FALSE),
					'pi_paper_instruction_en' => $this->input->post('pi_paper_instruction_en'),
					'pi_paper_instruction_ur' =>$this->input->post('pi_paper_instruction_ur'),
					'pi_paper_marks' => $this->input->post('pi_paper_marks'),
					'pi_paper_type' => $this->input->post('pi_paper_type'),
					'pi_paper_time' => $this->input->post('pi_paper_time'),
					'pi_status' => $this->input->post('pi_status'),
					'pi_creator_id' => $this->session->userdata('admin_id'),						
				);
				//$data = $this->security->xss_clean($data);
				$result = $this->Paperinstructions_model->edit_paperinstructions($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Paper Instructions has been updated successfully!');
					redirect(base_url('admin/paperinstructions'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Paper Instructions';
			$data['grades'] = $this->Paperinstructions_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Paperinstructions_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Paperinstructions_model->get_all_subjects();
			}
			$data['paperinstructions'] = $this->Paperinstructions_model->get_paperinstructions_by_id($id);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paperinstructions/paperinstructions_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function delete($id = 0)
	{
		$this->db->delete('ci_paperinstructions', array('pi_id' => $id));
		$this->session->set_flashdata('success', 'Paper Instructions has been deleted successfully!');
		redirect(base_url('admin/paperinstructions'));
	}
	
	public function view($id = 0)
	{
		$data['title'] = 'View Paper Instructions';
		$data['paperinstructions'] = $this->Paperinstructions_model->get_paperinstructions_by_id($id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paperinstructions/paperinstructions_view', $data);
		$this->load->view('admin/includes/_footer');
	}
}
?>