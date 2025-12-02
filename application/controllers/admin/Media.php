<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Media extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Media_model', 'Media_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index()
	{
		$data['title'] = 'Media/Pictures';
		$data['pictures'] = $this->Media_model->get_all_media();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/media/media_all', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function add(){
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('m_title', 'Title', 'trim|required');
			//$this->form_validation->set_rules('m_image', 'Image', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/media/add'),'refresh');
			}
			else{
				$data = array(
					'm_title' => $this->input->post('m_title'),
					'm_uploadedby' => $this->session->userdata('admin_id')
				);
				
				$m_image = $this->input->post('m_image');
				
				if (!file_exists('assets/media/'.$this->session->userdata('admin_id').'/')) {
					 mkdir('assets/media/', 0755, true);
				}
				$path="assets/media/".$this->session->userdata('admin_id').'/';
				if(!empty($_FILES['m_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'm_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['m_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/media'), 'refresh');
					}
				}
				$result = $this->Media_model->add($data);
				if($result){
					$this->session->set_flashdata('success', 'Media has been added successfully!');
					redirect(base_url('admin/media'));
				}
			}
		}
		else{
			$subjectList = $this->session->userdata('subjects_ids');
			$data['title'] = 'Add Media';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/media/media_add');
			$this->load->view('admin/includes/_footer');
		}
	}
	public function delete($id = 0)
	{
		$this->db->delete('ci_media', array('m_id' => $id));
		$this->session->set_flashdata('success', 'Media has been deleted successfully!');
		redirect(base_url('admin/media'));
	}
}
?>