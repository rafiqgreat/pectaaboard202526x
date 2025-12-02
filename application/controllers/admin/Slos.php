<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Slos extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Slos_model', 'Slos_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'SLOs List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/slos/slos_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Slos_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}		
		else
		{
			echo json_encode($this->Slos_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	
	
	
	
	
	public function cstands_by_subject()
	{
		echo json_encode($this->Slos_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Slos_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
	public function datatable_json(){
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$records = $this->Slos_model->get_ae_slos($subjectList);
		}		
		else{
			$records = $this->Slos_model->get_all_slos();	
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['slo_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['slo_number'],
				$row['slo_statement_en'],
				$row['slo_statement_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$row['cs_statement_en'],
				$row['subcs_topic_en'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['slo_id'].'" 
				id="cb_'.$row['slo_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['slo_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/slos/edit/'.$row['slo_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/slos/edit/'.$row['slo_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/slos/delete/".$row['slo_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Slos_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('slo_number', 'SLO Number', 'trim|required');
			$this->form_validation->set_rules('slo_statement_en', 'SLO Statement(ENG)', 'trim|required');
			$this->form_validation->set_rules('slo_statement_ur', 'SLO Statement (URDU)', 'trim');
			$this->form_validation->set_rules('slo_sort', 'Sorting', 'trim|required');
			$this->form_validation->set_rules('slo_status', 'SLO Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/slos/add'),'refresh');
			}
			else{
				$data = array(					
					'slo_grade_id' => $this->input->post('slo_grade_id'),
					'slo_subject_id' => $this->input->post('slo_subject_id'),
					'slo_cstand_id' => $this->input->post('slo_cstand_id'),
					'slo_subcstand_id' => $this->input->post('slo_subcstand_id'),
					'slo_number' => $this->input->post('slo_number'),
					'slo_statement_en' => $this->input->post('slo_statement_en'),
					'slo_statement_ur' => $this->input->post('slo_statement_ur'),	
					'slo_status' => $this->input->post('slo_status'),				
					'slo_createdby' =>$this->session->userdata('admin_id')					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Slos_model->add_slos($data);
				if($result){
					$this->session->set_flashdata('success', 'SLO has been added successfully!');
					redirect(base_url('admin/slos'));
				}
			}
		}
		else{
			$data['title'] = 'Add SLOs';
			$data['grades'] = $this->Slos_model->get_all_grades();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/slos/slos_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){			
			$this->form_validation->set_rules('slo_number', 'SLO Number', 'trim|required');
			$this->form_validation->set_rules('slo_statement_en', 'SLO Statement(ENG)', 'trim|required');
			$this->form_validation->set_rules('slo_statement_ur', 'SLO Statement (URDU)', 'trim');
			$this->form_validation->set_rules('slo_sort', 'Sorting', 'trim|required');
			$this->form_validation->set_rules('slo_status', 'SLO Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['slos'] = $this->Slos_model->get_slos_by_id($id);
				$data['view'] = 'admin/slos/slos_edit';
				$this->load->view('layout', $data);
			}
			else{				
				$data = array(					
					'slo_grade_id' => $this->input->post('slo_grade_id'),
					'slo_subject_id' => $this->input->post('slo_subject_id'),
					'slo_cstand_id' => $this->input->post('slo_cstand_id'),
					'slo_subcstand_id' => $this->input->post('slo_subcstand_id'),
					'slo_number' => $this->input->post('slo_number'),
					'slo_statement_en' => $this->input->post('slo_statement_en'),
					'slo_statement_ur' => $this->input->post('slo_statement_ur'),
					'slo_status' => $this->input->post('slo_status'),					
					'slo_createdby' =>$this->session->userdata('admin_id')					
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Slos_model->edit_slos($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'SLOs has been updated successfully!');
					redirect(base_url('admin/slos'));
				}
			}
		}
		else{
			$data['title'] = 'Edit SLOs';
			$data['grades'] = $this->Slos_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Slos_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Slos_model->get_all_subjects();
			}
			
			$data['cstands'] = $this->Slos_model->get_all_cstands();
			$data['subcstands'] = $this->Slos_model->get_all_subcstands();
			$data['slos'] = $this->Slos_model->get_slos_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/slos/slos_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$this->db->delete('ci_slos', array('slo_id' => $id));
		$this->session->set_flashdata('success', 'SLOs has been deleted successfully!');
		redirect(base_url('admin/slos'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_slos_pdf()
	{
		$this->load->helper('pdf_helper'); // loaded pdf helper
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$data['all_slos'] = $this->Slos_model->get_ae_slos_for_export($subjectList);
		}		
		else{
			$data['all_slos'] = $this->Slos_model->get_slos_for_export();
		}
		$this->load->view('admin/slos/slos_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_slos_csv(){ 
	   // file name 
		$filename = 'slos_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$sols_data= $this->Slos_model->get_ae_slos_csv_export($subjectList);
		}		
		else{
			 $sols_data= $this->Slos_model->get_slos_csv_export();
		}
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("SLO-ID", "SLO-Number", "SLO-Topic(Eng)", "SLO-Topic(Urdu)", "Grade", "Subject", "ContentStand", "SubContentStand", "CreatedBy", "Status"); 
		fputcsv($file, $header);
		foreach ($sols_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
?>