<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Blocks extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Blocks_model', 'Blocks_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Blocks List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/blocks/blocks_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->Blocks_model->get_all_blocks();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['block_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['block_name_en'],
				$row['block_name_ur'],
				$row['block_sort'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['block_id'].'" 
				id="cb_'.$row['block_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['block_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/blocks/edit/'.$row['block_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/blocks/edit/'.$row['block_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/blocks/delete/".$row['block_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Blocks_model->change_status();
	}
	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('block_code', 'Block Code', 'trim|required');
			$this->form_validation->set_rules('block_name_en', 'Block Name (English)', 'trim|required');
			$this->form_validation->set_rules('block_name_ur', 'Block Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('block_sort', 'Sorting', 'trim|required');
			$this->form_validation->set_rules('block_status', 'Block Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/blocks/add'),'refresh');
			}
			else{
				$data = array(
					'block_code' => $this->input->post('block_code'),
					'block_name_en' => $this->input->post('block_name_en'),
					'block_name_ur' => $this->input->post('block_name_ur'),
					'block_sort' => $this->input->post('block_sort'),
					'block_createdby' =>$this->session->userdata('admin_id'),
					'block_status' => $this->input->post('block_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Blocks_model->add_blocks($data);
				if($result){
					$this->session->set_flashdata('success', 'blocks has been added successfully!');
					redirect(base_url('admin/blocks'));
				}
			}
		}
		else{
			$data['title'] = 'Add Blocks';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/blocks/blocks_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('block_code', 'Block Code', 'trim|required');
			$this->form_validation->set_rules('block_name_en', 'Block Name (English)', 'trim|required');
			$this->form_validation->set_rules('block_name_ur', 'Block Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('block_sort', 'Sorting', 'trim|required');
			$this->form_validation->set_rules('block_status', 'Block Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['blocks'] = $this->Blocks_model->get_blocks_by_id($id);
				$data['view'] = 'admin/blocks/blocks_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'block_code' => $this->input->post('block_code'),
					'block_name_en' => $this->input->post('block_name_en'),
					'block_name_ur' => $this->input->post('block_name_ur'),
					'block_sort' => $this->input->post('block_sort'),
					'block_createdby' =>$this->session->userdata('admin_id'),
					'block_status' => $this->input->post('block_status'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Blocks_model->edit_blocks($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Block has been updated successfully!');
					redirect(base_url('admin/blocks'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Block';
			$data['blocks'] = $this->Blocks_model->get_blocks_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/blocks/blocks_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		
		$this->db->delete('ci_blocks', array('block_id' => $id));
		$this->session->set_flashdata('success', 'Block has been deleted successfully!');
		redirect(base_url('admin/blocks'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_blocks_pdf(){
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_blocks'] = $this->Blocks_model->get_blocks_for_export();
		$this->load->view('admin/blocks/blocks_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_blocks_csv(){ 
	   // file name 
		$filename = 'blocks_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$blocks_data = $this->Blocks_model->get_blocks_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("blocksID", "blocksCode", "blocksName(Eng)", "blocksName(Urdu)", "blocksCreated", "blocksCreatedBy", "blocksStatus"); 
		fputcsv($file, $header);
		foreach ($blocks_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}
	?>