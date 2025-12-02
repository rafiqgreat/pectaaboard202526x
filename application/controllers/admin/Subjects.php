<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Subjects extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Subjects_model', 'Subjects_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Subjects List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/subjects/subjects_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->Subjects_model->get_all_subjects();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['subject_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['subject_name_en'],
				$row['subject_name_ur'],
				$row['subject_code'],
				$row['grade_code'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['subject_id'].'" 
				id="cb_'.$row['subject_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['subject_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/subjects/edit/'.$row['subject_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/subjects/edit/'.$row['subject_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/subjects/delete/".$row['subject_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Subjects_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('subject_gradeid', 'Subject Class', 'trim|required');
			$this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required');
			$this->form_validation->set_rules('subject_name_en', 'Subject Name (English)', 'trim|required');
			$this->form_validation->set_rules('subject_name_ur', 'Subject Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('subject_sort', 'Subject Sort', 'trim|required');
			$this->form_validation->set_rules('subject_status', 'Subject Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/subjects/add'),'refresh');
			}
			else{
				$data = array(					
					'subject_gradeid' => $this->input->post('subject_gradeid'),
					'subject_name_en' => $this->input->post('subject_name_en'),
					'subject_name_ur' => $this->input->post('subject_name_ur'),
					'subject_code' => $this->input->post('subject_code'),
					'subject_sort' => $this->input->post('subject_sort'),
					'subject_status' => $this->input->post('subject_status'),
					'subject_createdby' =>$this->session->userdata('admin_id')					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Subjects_model->add_subjects($data);
				if($result){
					$this->session->set_flashdata('success', 'Subject has been added successfully!');
					redirect(base_url('admin/subjects'));
				}
			}
		}
		else{
			$data['title'] = 'Add Subject';
			$data['grades'] = $this->Subjects_model->get_all_grades();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/subjects/subjects_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('subject_gradeid', 'Subject Class', 'trim|required');
			$this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required');
			$this->form_validation->set_rules('subject_name_en', 'Subject Name (English)', 'trim|required');
			$this->form_validation->set_rules('subject_name_ur', 'Subject Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('subject_sort', 'Subject Sort', 'trim|required');
			$this->form_validation->set_rules('subject_status', 'Subject Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['subjects'] = $this->Subjects_model->get_subjects_by_id($id);
				$data['view'] = 'admin/subjects/subjects_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'subject_gradeid' => $this->input->post('subject_gradeid'),
					'subject_name_en' => $this->input->post('subject_name_en'),
					'subject_name_ur' => $this->input->post('subject_name_ur'),
					'subject_code' => $this->input->post('subject_code'),
					'subject_sort' => $this->input->post('subject_sort'),
					'subject_status' => $this->input->post('subject_status'),
					'subject_createdby' =>$this->session->userdata('admin_id')	
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Subjects_model->edit_subjects($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Subject has been updated successfully!');
					redirect(base_url('admin/subjects'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Subjects';
			$data['grades'] = $this->Subjects_model->get_all_grades();
			$data['subjects'] = $this->Subjects_model->get_subjects_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/subjects/subjects_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_subjects', array('subject_id' => $id));
		$this->session->set_flashdata('success', 'Subject has been deleted successfully!');
		redirect(base_url('admin/subjects'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_subjects_pdf(){
		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_subjects'] = $this->Subjects_model->get_subjects_for_export();
		$this->load->view('admin/subjects/subjects_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_subjects_csv(){ 
	   // file name 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$grades_data = $this->Subjects_model->get_subjects_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("SubjectID", "SubjectCode", "SubjectName(Eng)", "SubjectName(Urdu)", "SubjectSort", "Grade", "SubjectStatus"); 
		fputcsv($file, $header);
		foreach ($grades_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
	?>