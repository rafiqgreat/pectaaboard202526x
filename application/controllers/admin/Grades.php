<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Grades extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Grades_model', 'Grades_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Grades List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/grades/grades_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->Grades_model->get_all_grades();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['grade_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['grade_name_ur'],
				$row['grade_sort'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['grade_id'].'" 
				id="cb_'.$row['grade_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['grade_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/grades/edit/'.$row['grade_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/grades/edit/'.$row['grade_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/grades/delete/".$row['grade_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Grades_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('grade_code', 'Grade Code', 'trim|required');
			$this->form_validation->set_rules('grade_name_en', 'Grade Name (English)', 'trim|required');
			$this->form_validation->set_rules('grade_name_ur', 'Grade Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('grade_sort', 'Grade Sort', 'trim|required');
			$this->form_validation->set_rules('grade_status', 'Grade Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/grades/add'),'refresh');
			}
			else{
				$data = array(
					'grade_code' => $this->input->post('grade_code'),
					'grade_name_en' => $this->input->post('grade_name_en'),
					'grade_name_ur' => $this->input->post('grade_name_ur'),
					'grade_sort' => $this->input->post('grade_sort'),
					'grade_createdby' =>$this->session->userdata('admin_id'),
					'grade_status' => $this->input->post('grade_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Grades_model->add_grades($data);
				if($result){
					$this->session->set_flashdata('success', 'Grades has been added successfully!');
					redirect(base_url('admin/grades'));
				}
			}
		}
		else{
			$data['title'] = 'Add Grades';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/grades/grades_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('grade_code', 'Grade Code', 'trim|required');
			$this->form_validation->set_rules('grade_name_en', 'Grade Name (English)', 'trim|required');
			$this->form_validation->set_rules('grade_name_ur', 'Grade Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('grade_sort', 'Grade Sort', 'trim|required');
			$this->form_validation->set_rules('grade_status', 'Grade Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['grades'] = $this->Grades_model->get_grades_by_id($id);
				$data['view'] = 'admin/grades/grades_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'grade_code' => $this->input->post('grade_code'),
					'grade_name_en' => $this->input->post('grade_name_en'),
					'grade_name_ur' => $this->input->post('grade_name_ur'),
					'grade_sort' => $this->input->post('grade_sort'),
					'grade_createdby' =>$this->session->userdata('admin_id'),
					'grade_status' => $this->input->post('grade_status'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Grades_model->edit_grades($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'User has been updated successfully!');
					redirect(base_url('admin/grades'));
				}
			}
		}
		else{
			//die('Edit here');
			$data['title'] = 'Edit Grade';
			$data['grades'] = $this->Grades_model->get_grades_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/grades/grades_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_grades', array('grade_id' => $id));
		$this->session->set_flashdata('success', 'Grade has been deleted successfully!');
		redirect(base_url('admin/grades'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_grades_pdf(){
		$data['all_grades'] = $this->Grades_model->get_grades_for_export();
		$this->load->view('admin/grades/grades_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_grades_csv(){ 
	   // file name 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 		
		header('Content-Type: text/csv; charset=UTF-8');
	   // get data 
		$grades_data = $this->Grades_model->get_grades_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		//fputs($file, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
		$header = array("GradesID", "GradesCode", "GradesName(Eng)", "GradesName(Urdu)", "GradesCreated", "GradesCreatedBy", "GradesStatus"); 
		fputcsv($file, $header);
		foreach ($grades_data as $key=>$line){ 		
			//$line = array_map("utf8_decode", $line);
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}	?>