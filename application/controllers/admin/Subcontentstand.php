<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Subcontentstand extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Subcontentstand_model', 'Subcontentstand_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////
	public function index(){
		$data['title'] = 'Sub Content List';
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/subcontentstand/subcontentstand_list');
		$this->load->view('admin/includes/_footer');
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////
	public function datatable_json(){
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$records = $this->Subcontentstand_model->get_ae_subcontentstand($subjectList);
		}		
		else{
			$records = $this->Subcontentstand_model->get_all_subcontentstand();	
		}
		//$records = $this->Subcontentstand_model->get_all_subcontentstand();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
            $subcs_phase ='Not applicable';
            if($row['subcs_phase'] == 1){
               $subcs_phase ='Phase-1'; 
            }elseif($row['subcs_phase'] ==2){
                $subcs_phase ='Phase-2';
            }
			$status = ($row['subcs_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['subcs_number'], 
				$row['subcs_sort'],
				$row['subcs_topic_en'],
				$row['subcs_topic_ur'],
				$row['cs_statement_en'],
				$row['subject_code'],
				$row['grade_code'],
                $subcs_phase,
				
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['subcs_id'].'" 
				id="cb_'.$row['subcs_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['subcs_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/subcontentstand/edit/'.$row['subcs_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/subcontentstand/edit/'.$row['subcs_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/subcontentstand/delete/".$row['subcs_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////
	public function change_status(){   
		$this->Subcontentstand_model->change_status();
	}
	
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Subcontentstand_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));
		}		
		else
		{
			echo json_encode($this->Subcontentstand_model->get_subjects_by_grade($this->input->post('grade_id')));
		}
	}
	
	public function cstands_by_subject()
	{
		echo json_encode($this->Subcontentstand_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
            print_r($_REQUEST);
            //exit;
			$this->form_validation->set_rules('subcs_number', 'SubContent Number', 'trim|required');
			$this->form_validation->set_rules('subcs_sort', 'SubContent Sort', 'trim|required');
			$this->form_validation->set_rules('subcs_topic_en', 'Topic (Eng)', 'trim|required');
			$this->form_validation->set_rules('subcs_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('subcs_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('subcs_cstand_id', 'Content Status', 'trim|required');
			$this->form_validation->set_rules('subcs_status', 'Status', 'trim|required');
            $this->form_validation->set_rules('subcs_phase', 'subcs phase', 'trim|required');
            
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/subcontentstand/add'),'refresh');
			}
			else{
				$data = array(					
					'subcs_number' => $this->input->post('subcs_number'),
					'subcs_sort' => $this->input->post('subcs_sort'),
					'subcs_topic_en' => $this->input->post('subcs_topic_en'),
					'subcs_topic_ur' => $this->input->post('subcs_topic_ur'),
					'subcs_grade_id' => $this->input->post('subcs_grade_id'),
					'subcs_subject_id' => $this->input->post('subcs_subject_id'),
					'subcs_cstand_id' => $this->input->post('subcs_cstand_id'),
					'subcs_status' => $this->input->post('subcs_status'),
                    'subcs_phase' => $this->input->post('subcs_phase'),
					'subcs_createdby' =>$this->session->userdata('admin_id')					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Subcontentstand_model->add_subcontentstand($data);
				if($result){
					$this->session->set_flashdata('success', 'SubContent Stand has been added successfully!');
					redirect(base_url('admin/subcontentstand'));
				}
			}
		}
		else{
			$data['title'] = 'Add SubContent Stand';
			$data['grades'] = $this->Subcontentstand_model->get_all_grades();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/subcontentstand/subcontentstand_add');
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('subcs_number', 'SubContent Number', 'trim|required');
			$this->form_validation->set_rules('subcs_sort', 'SubContent Sort', 'trim|required');
			$this->form_validation->set_rules('subcs_topic_en', 'Topic (Eng)', 'trim|required');
			//$this->form_validation->set_rules('subcs_topic_ur', 'Topic (Urdu)', 'trim|required');
			$this->form_validation->set_rules('subcs_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('subcs_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('subcs_cstand_id', 'Content Status', 'trim|required');
			$this->form_validation->set_rules('subcs_status', 'Status', 'trim|required');
            $this->form_validation->set_rules('subcs_phase', 'subcs phase', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['subcontentstand'] = $this->Subcontentstand_model->get_subcontentstand_by_id($id);
				$data['view'] = 'admin/subcontentstand/subcontentstand_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'subcs_number' => $this->input->post('subcs_number'),
					'subcs_sort' => $this->input->post('subcs_sort'),
					'subcs_topic_en' => $this->input->post('subcs_topic_en'),
					'subcs_topic_ur' => $this->input->post('subcs_topic_ur'),
					'subcs_grade_id' => $this->input->post('subcs_grade_id'),
					'subcs_subject_id' => $this->input->post('subcs_subject_id'),
					'subcs_cstand_id' => $this->input->post('subcs_cstand_id'),
					'subcs_status' => $this->input->post('subcs_status'),
                    'subcs_phase' => $this->input->post('subcs_phase'),
					'subcs_createdby' =>$this->session->userdata('admin_id')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Subcontentstand_model->edit_subcontentstand($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'SubContent Stand has been updated successfully!');
					redirect(base_url('admin/subcontentstand'));
				}
			}
		}
		else{
			$data['title'] = 'Edit SubContent Stand';
			$data['grades'] = $this->Subcontentstand_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Subcontentstand_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Subcontentstand_model->get_all_subjects();
			}
			
			$data['contentstands'] = $this->Subcontentstand_model->get_all_contentstand();
			$data['subcontentstands'] = $this->Subcontentstand_model->get_subcontentstand_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/subcontentstand/subcontentstand_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_subcontent_stands', array('subcs_id' => $id));
		$this->session->set_flashdata('success', 'SubContent has been deleted successfully!');
		redirect(base_url('admin/subcontentstand'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_subcontentstand_pdf()
	{
		$this->load->helper('pdf_helper'); // loaded pdf helper
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$data['all_subcontentstand'] = $this->Subcontentstand_model->get_ae_subcontentstand_for_export($subjectList);
		}		
		else{
			$data['all_subcontentstand'] = $this->Subcontentstand_model->get_subcontentstand_for_export();
		}	
		$this->load->view('admin/subcontentstand/subcontentstand_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_subcontentstand_csv(){ 
	   // file name 
		$filename = 'subcontentstand_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
		
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$subcontentstand_data = $this->Subcontentstand_model->get_ae_subcontentstand_csv_export($subjectList);
		}		
		else{
			$subcontentstand_data = $this->Subcontentstand_model->get_subcontentstand_csv_export();
		}
	   // file creation 
		$file = fopen('php://output', 'w');
		
		//subcs_number, subcs_sort, subcs_topic_en, subcs_topic_ur, grade_code, subject_code, cs_statement_en, subcs_created, username, IF(subject_status=1,\'Active\',\'Inactive\
		$header = array("SubContentNumber", "SubContentSort", "Topic(Eng)", "Topic(Urdu)", "Grade", "Subject", "ContentStand", "CreatedDate", "CreatedBy", "Status"); 
		fputcsv($file, $header);
		foreach ($subcontentstand_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
	?>