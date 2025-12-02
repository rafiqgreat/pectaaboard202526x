<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Formulas extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Formulas_model', 'Formulas_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Formulas List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/formulas/formulas_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->Formulas_model->get_all_formulas();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['formula_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				html_entity_decode($row['formula_name_en']),
				html_entity_decode($row['formula_name_ur']),
				$row['formula_sort'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['formula_id'].'" 
				id="cb_'.$row['formula_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['formula_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/formulas/edit/'.$row['formula_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/formulas/edit/'.$row['formula_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/formulas/delete/".$row['formula_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('formula_code', 'Formula Code', 'trim|required');
			$this->form_validation->set_rules('formula_name_en', 'Formula Name (English)', 'trim|required');			
			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/formulas/add'),'refresh');
			}
			else{
				$data = array(
					'formula_code' => $this->input->post('formula_code'),
					'formula_name_en' => $this->input->post('formula_name_en'),
					'formula_name_ur' => $this->input->post('formula_name_ur')					
				);
				$data = $this->security->xss_clean($data);
				//print_r($data);
				//die('break');
				$result = $this->Formulas_model->add_formulas($data);
				if($result){
					$this->session->set_flashdata('success', 'formulas has been added successfully!');
					redirect(base_url('admin/formulas'));
				}
			}
		}
		else{
			$data['title'] = 'Add Formulas';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/formulas/formulas_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('formula_code', 'Formula Code', 'trim|required');
			$this->form_validation->set_rules('formula_name_en', 'Formula Name (English)', 'trim|required');
			$this->form_validation->set_rules('formula_name_ur', 'Formula Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('formula_sort', 'Sorting', 'trim|required');
			$this->form_validation->set_rules('formula_status', 'Formula Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['formulas'] = $this->Formulas_model->get_formulas_by_id($id);
				$data['view'] = 'admin/formulas/formulas_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'formula_code' => $this->input->post('formula_code'),
					'formula_name_en' => $this->input->post('formula_name_en'),
					'formula_name_ur' => $this->input->post('formula_name_ur'),
					'formula_sort' => $this->input->post('formula_sort'),
					'formula_createdby' =>$this->session->userdata('admin_id'),
					'formula_status' => $this->input->post('formula_status'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Formulas_model->edit_formulas($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Formula has been updated successfully!');
					redirect(base_url('admin/formulas'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Formula';
			$data['formulas'] = $this->Formulas_model->get_formulas_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/formulas/formulas_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_formulas_pdf(){
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_formulas'] = $this->Formulas_model->get_formulas_for_export();
		$this->load->view('admin/formulas/formulas_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_formulas_csv(){ 
	   // file name 
		$filename = 'formulas_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$formulas_data = $this->Formulas_model->get_formulas_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("formulasID", "formulasCode", "formulasName(Eng)", "formulasName(Urdu)", "formulasCreated", "formulasCreatedBy", "formulasStatus"); 
		fputcsv($file, $header);
		foreach ($formulas_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
	?>