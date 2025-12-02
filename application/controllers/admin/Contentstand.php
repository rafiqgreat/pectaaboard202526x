<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Contentstand extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Contentstand_model', 'Contentstand_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Content List';
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/contentstand/contentstand_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){		
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$records = $this->Contentstand_model->get_ae_contentstand($subjectList);
		}		
		else{
			$records = $this->Contentstand_model->get_all_contentstand();	
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['cs_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['cs_number'],
				$row['cs_sort'],
				$row['cs_statement_en'],
				$row['cs_statement_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$row['cs_created'],
				
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['cs_id'].'" 
				id="cb_'.$row['cs_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['cs_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/contentstand/edit/'.$row['cs_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/contentstand/edit/'.$row['cs_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/contentstand/delete/".$row['cs_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Contentstand_model->change_status();
	}
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Contentstand_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));
		}		
		else{
			echo json_encode($this->Contentstand_model->get_subjects_by_grade($this->input->post('grade_id')));
		}		
						
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{			
			$this->form_validation->set_rules('cs_grade_id', 'Content Grade', 'trim|required');
			$this->form_validation->set_rules('cs_subject_id', 'Content Subject', 'trim|required');
			$this->form_validation->set_rules('cs_number', 'Content Number', 'trim|required');
			$this->form_validation->set_rules('cs_sort', 'Content Sort', 'trim|required');
			$this->form_validation->set_rules('cs_statement_en', 'Content Statement (Eng)', 'trim|required');
			$this->form_validation->set_rules('cs_statement_ur', 'Content Statement (Urdu)', 'trim|required');
			$this->form_validation->set_rules('cs_status', 'Content Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/contentstand/add'),'refresh');
			}
			else{
				$data = array(					
					'cs_grade_id' => $this->input->post('cs_grade_id'),
					'cs_subject_id' => $this->input->post('cs_subject_id'),
					'cs_number' => $this->input->post('cs_number'),
					'cs_sort' => $this->input->post('cs_sort'),
					'cs_statement_en' => $this->input->post('cs_statement_en'),
					'cs_statement_ur' => $this->input->post('cs_statement_ur'),
					'cs_status' => $this->input->post('cs_status'),
					'cs_createdby' =>$this->session->userdata('admin_id')					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Contentstand_model->add_contentstand($data);
				if($result){
					$this->session->set_flashdata('success', 'Content has been added successfully!');
					redirect(base_url('admin/contentstand'));
				}
			}
		}
		else{
			$data['title'] = 'Add Content Stand';
			$data['grades'] = $this->Contentstand_model->get_all_grades();
			if($this->session->userdata('role_id')==2){
				$subjectList = $this->session->userdata('subjects_ids');			
				$data['subjects'] = $this->Contentstand_model->get_ae_subjects($subjectList);
			}		
			else{
				$data['subjects'] = $this->Contentstand_model->get_all_subjects();
			}
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/contentstand/contentstand_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('cs_grade_id', 'Content Grade', 'trim|required');
			$this->form_validation->set_rules('cs_subject_id', 'Content Subject', 'trim|required');
			$this->form_validation->set_rules('cs_number', 'Content Number', 'trim|required');
			$this->form_validation->set_rules('cs_sort', 'Content Sort', 'trim|required');
			$this->form_validation->set_rules('cs_statement_en', 'Content Statement (Eng)', 'trim|required');
			$this->form_validation->set_rules('cs_statement_ur', 'Content Statement (Urdu)', 'trim|required');
			$this->form_validation->set_rules('cs_status', 'Content Status', 'trim|required');
			
			
			if ($this->form_validation->run() == FALSE) {
				$data['contentstand'] = $this->Contentstand_model->get_contentstand_by_id($id);
				$data['view'] = 'admin/contentstand/contentstand_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'cs_grade_id' => $this->input->post('cs_grade_id'),
					'cs_subject_id' => $this->input->post('cs_subject_id'),
					'cs_number' => $this->input->post('cs_number'),
					'cs_sort' => $this->input->post('cs_sort'),
					'cs_statement_en' => $this->input->post('cs_statement_en'),
					'cs_statement_ur' => $this->input->post('cs_statement_ur'),
					'cs_status' => $this->input->post('cs_status'),
					'cs_updatedby' =>$this->session->userdata('admin_id')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Contentstand_model->edit_contentstand($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Content has been updated successfully!');
					redirect(base_url('admin/contentstand'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Contnet';
			$data['grades'] = $this->Contentstand_model->get_all_grades();
			if($this->session->userdata('role_id')==2){
				$subjectList = $this->session->userdata('subjects_ids');			
				$data['subjects'] = $this->Contentstand_model->get_ae_subjects($subjectList);
			}		
			else{
				$data['subjects'] = $this->Contentstand_model->get_all_subjects();
			}			
			$data['contentstand'] = $this->Contentstand_model->get_contentstand_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/contentstand/contentstand_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_content_stands', array('cs_id' => $id));
		$this->session->set_flashdata('success', 'Content has been deleted successfully!');
		redirect(base_url('admin/contentstand'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_contentstand_pdf(){
		$this->load->helper('pdf_helper'); // loaded pdf helper
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$data['all_contentstand'] = $this->Contentstand_model->get_ae_contentstand_for_export($subjectList);
		}		
		else{
			$data['all_contentstand'] = $this->Contentstand_model->get_contentstand_for_export();
		}		
		$this->load->view('admin/contentstand/contentstand_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_contentstand_csv(){ 
	   // file name 
		$filename = 'contentstand_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$contentstand_data = $this->Contentstand_model->get_ae_contentstand_csv_export($subjectList);
		}		
		else{
			$contentstand_data = $this->Contentstand_model->get_contentstand_csv_export();
		}
		
		
	   // file creation 
		$file = fopen('php://output', 'w');
		
		//'cs_id, cs_number, cs_sort, cs_statement_en, cs_statement_ur, grade_code, subject_code, cs_created, username, IF(subject_status=1,\'Active\',\'Inactive\')'
		$header = array("ContentNumber", "ContentSort", "Statement(Eng)", "Statement(Urdu)", "Grade", "Subject", "CreatedDate", "CreatedBy", "Status"); 
		fputcsv($file, $header);
		foreach ($contentstand_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
?>