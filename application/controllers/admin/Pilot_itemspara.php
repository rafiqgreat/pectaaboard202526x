<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pilot_itemspara extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Pilot_Itemspara_model', 'Pilot_Itemspara_model');
		$this->load->model('admin/Pilot_Items_model', 'Pilot_Items_model');
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index()
	{
		$data['title'] = 'Pilot Paragraph List';
		$data['grades'] = $this->Pilot_Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_itemspara/pilot_itemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function para_p1()
	{
		$data['title'] = 'Pilot Paragraph List';
		$data['grades'] = $this->Pilot_Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_itemspara/pilot_itemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
		
	public function datatable_json_pilot_paragraph($id = 0)
	{	
		if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==1)
		{
			$records = $this->Pilot_Itemspara_model->get_all_itemspara_pilot($id,$subject_id=0);
		}
		else
		{
			die('Alert! You are not authorized to do this action.');
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_status'] == 2)
			{
				$status='Submitted';
			}
			else
			{
				$status='Pending';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="#"> <i class="fa fa-eye"></i></a>';
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilot_itemspara/view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			
			$itemids = '';
			if($row['para_item_21'] != 0)
				$itemids = $row['para_item_21'].'<br>';
			if($row['para_item_22'] != 0)
				$itemids .= $row['para_item_22'].'<br>';
			if($row['para_item_23'] != 0)
				$itemids .= $row['para_item_23'].'<br>';
			if($row['para_item_24'] != 0)
				$itemids .= $row['para_item_24'].'<br>';
			if($row['para_item_25'] != 0)
				$itemids .= $row['para_item_25'].'<br>';
			if($row['para_item_26'] != 0)
				$itemids .= $row['para_item_26'].'<br>';
			if($row['para_item_27'] != 0)
				$itemids .= $row['para_item_27'].'<br>';
			if($row['para_item_28'] != 0)
				$itemids .= $row['para_item_28'].'<br>';
			if($row['para_item_29'] != 0)
				$itemids .= $row['para_item_29'].'<br>';
			if($row['para_item_30'] != 0)
				$itemids .= $row['para_item_30'].'<br>';
				
			$data[]= array(
				++$i,
				$row['para_id'],
				$itemids,
				$row['para_title_en'].'-<span class="urdufont-right" style="text-align:right;">'.$row['para_title_ur'].'</span>',
				html_entity_decode($row['para_text_en']),
				'<span class="urdufont-right" style="text-align:right;">'.html_entity_decode($row['para_text_ur']).'</span>',
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	public function pilot_itemms_para_edit($id = 0)
	{
		$para_id = 0;
		$sub_id = 0;
		$ver_id = 0;
        $phase = 0;
		
		if($this->input->post('submit'))
		{
            $phase = $this->input->post('phase');
			if($this->input->post('para_text_en')!="")
			{
				$this->form_validation->set_rules('para_title_en', 'Title', 'trim|required');				
			}
			elseif($this->input->post('para_text_ur')!="")
			{
				$this->form_validation->set_rules('para_text_ur', 'Title', 'trim|required');				
			}
			if ($this->form_validation->run() == FALSE) {
				$data['paragraph'] = $this->Pilot_Itemspara_model->get_pilot_itemspara_by_id($this->input->post('para_id'));
				$data['sub_id'] = $this->input->post('sub_id');
				$data['ver_id'] = $this->input->post('ver_id');
                
				$this->load->view('admin/includes/_header');
				$this->load->view('admin/pilot_itemspara/pilotpaper_itemspara_text_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else{
				$keyword ='Ginger';
				
				$para_text_en = $this->input->post('para_text_en');
				$para_text_ur = $this->input->post('para_text_ur');
				
				if(strpos($para_text_en, $keyword) !== false ||
				   strpos($para_text_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				
				$data = array(
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' => $this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),
				  'para_img_position' => $this->input->post('para_img_position'),
					
					'para_updatedby' => $this->session->userdata('admin_id'),
					'para_updated' => date("Y-m-d H:i:s")
				);
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					;
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$data['error'] = $this->session->set_flashdata('error', $result['msg']);
						$this->load->view('admin/includes/_header');
						$this->load->view('admin/pilot_itemspara/pilotpaper_itemspara_text_edit', $data);
						$this->load->view('admin/includes/_footer');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Pilot_Itemspara_model->edit_para_text($data, $id);
			
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'Pilot ItemsPara updated by SS',
						'log_message' => 'ItemsPara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'pilot_ss_updated',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					
					$this->session->set_flashdata('success', 'ItemsPara has been updated successfully!');
                    if($phase == 1)
                        redirect(base_url('admin/pilotpaper/generate_paper/'.$this->input->post('sub_id').'_'.$this->input->post('ver_id')));
                    else
					   redirect(base_url('admin/pilotpaper/generate_paper2/'.$this->input->post('sub_id').'_'.$this->input->post('ver_id')));
				}
			}
		}
		else
		{
			//$result = $this->Itemspara_model->update_para_rev_ss_status($id);
			$temp = explode("_",$id);
			$para_id = $temp[0];
			$sub_id = $temp[1];
			$ver_id = $temp[2];
            $phase = $temp[3];
			
			$data['title'] = 'Edit para';
			$data['paragraph'] = $this->Pilot_Itemspara_model->get_pilot_itemspara_by_id($para_id);
			$data['sub_id'] =$sub_id;
			$data['ver_id'] =$ver_id;
            $data['phase'] =$phase;
			//$data['grades'] = $this->Pilot_Itemspara_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Pilot_Itemspara_model->get_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
			}
			else
			{
				die('Alert! You are not authorized here');
			}
			//$data['paraitems'] = $this->Pilot_Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id']);
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilot_itemspara/pilotpaper_itemspara_text_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function itemsbank_para_edit($id = 0)
	{
		$para_id = 0;
		$sub_id = 0;
		$ib_id = 0;
		
		if($this->input->post('submit'))
		{
			if($this->input->post('para_text_en')!="")
			{
				$this->form_validation->set_rules('para_title_en', 'Title', 'trim|required');				
			}
			elseif($this->input->post('para_text_ur')!="")
			{
				$this->form_validation->set_rules('para_text_ur', 'Title', 'trim|required');				
			}
			if ($this->form_validation->run() == FALSE) {
				$data['paragraph'] = $this->Pilot_Itemspara_model->get_pilot_itemspara_by_id($this->input->post('para_id'));
				$data['sub_id'] = $this->input->post('sub_id');
				$data['ib_id'] = $this->input->post('ib_id');
				$this->load->view('admin/includes/_header');
				$this->load->view('admin/pilot_itemspara/itemsbank_para_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else{
				$keyword ='Ginger';
				
				$para_text_en = $this->input->post('para_text_en');
				$para_text_ur = $this->input->post('para_text_ur');
				
				if(strpos($para_text_en, $keyword) !== false ||
				   strpos($para_text_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				
				$data = array(
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' => $this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),
					
					'para_updatedby' => $this->session->userdata('admin_id'),
					'para_updated' => date("Y-m-d H:i:s")
				);
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					;
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$data['error'] = $this->session->set_flashdata('error', $result['msg']);
						$this->load->view('admin/includes/_header');
						$this->load->view('admin/pilot_itemspara/itemsbank_para_edit', $data);
						$this->load->view('admin/includes/_footer');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Pilot_Itemspara_model->edit_para_text($data, $id);
			
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'Pilot ItemsPara updated by SS',
						'log_message' => 'ItemsPara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'pilot_ss_updated',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					
					$this->session->set_flashdata('success', 'ItemsPara has been updated successfully!');
					redirect(base_url('admin/itemsbank/view_mcqs/'.$this->input->post('sub_id').'/'.$this->input->post('ib_id')));
				}
			}
		}
		else
		{
			$temp = explode("_",$id);
			$para_id = $temp[0];
			$sub_id = $temp[1];
			$ib_id = $temp[2];
			
			$data['title'] = 'Edit para';
			$data['paragraph'] = $this->Pilot_Itemspara_model->get_pilot_itemspara_by_id($para_id);
			$data['sub_id'] = $sub_id;
			$data['ib_id'] = $ib_id;
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Pilot_Itemspara_model->get_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
			}
			else
			{
				die('Alert! You are not authorized here');
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilot_itemspara/pilotpaper_itemspara_text_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	public function Itemsbank_n_para_edit($id = 0)
	{
		$para_id = 0;
		
		if($this->input->post('submit'))
		{
			if($this->input->post('para_text_en')!="")
			{
				$this->form_validation->set_rules('para_title_en', 'Title', 'trim|required');				
			}
			elseif($this->input->post('para_text_ur')!="")
			{
				$this->form_validation->set_rules('para_text_ur', 'Title', 'trim|required');				
			}
			if ($this->form_validation->run() == FALSE) {
				$data['paragraph'] = $this->Pilot_Itemspara_model->get_pilot_itemspara_by_id($this->input->post('para_id'));
				$this->load->view('admin/includes/_header');
				$this->load->view('admin/pilot_itemspara/Itemsbank_n_para_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else{
				$keyword ='Ginger';
				
				$para_text_en = $this->input->post('para_text_en');
				$para_text_ur = $this->input->post('para_text_ur');
				
				if(strpos($para_text_en, $keyword) !== false ||
				   strpos($para_text_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				
				$data = array(
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' => $this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),
					
					'para_updatedby' => $this->session->userdata('admin_id'),
					'para_updated' => date("Y-m-d H:i:s")
				);
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$data['error'] = $this->session->set_flashdata('error', $result['msg']);
						$this->load->view('admin/includes/_header');
						$this->load->view('admin/pilot_itemspara/Itemsbank_n_para_edit', $data);
						$this->load->view('admin/includes/_footer');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Pilot_Itemspara_model->edit_para_text($data, $id);
			
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'Pilot ItemsPara updated by SS',
						'log_message' => 'ItemsPara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'pilot_ss_updated',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					
					$this->session->set_flashdata('success', 'ItemsPara has been updated successfully!');
					die('ItemsPara has been updated successfully!');
				}
			}
		}
		else
		{
			$data['title'] = 'Edit para';
			$data['paragraph'] = $this->Pilot_Itemspara_model->get_pilot_itemspara_by_id($id);
			
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Pilot_Itemspara_model->get_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
			}
			else
			{
				die('Alert! You are not authorized here');
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilot_itemspara/pilot_itemspara_text_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	public function pilot_itemspara_view($id = 0)
	{
		die('888888');
		$data['title'] = 'View Accepted ItemsPara Filmzy';
		$data['itemspara'] = $this->Pilot_Itemspara_model->get_pilot_itemspara_by_id($id);
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/pilot_itemspara/pilot_itemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
    public function delete_image($id = 0, $redirectid = 0)
	{
		$data = array('para_image' => '');
		$this->db->where('para_id', $id);        
		$this->db->update('ci_items_paragraphs_pilot', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/Pilot_Itemspara/pilot_itemms_para_edit/'.$redirectid));
	}
	
	public function view($id = 0)
	{
			$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Pilot_Itemspara_model->get_all_grades();
			$data['itemspara'] = $this->Pilot_Itemspara_model->get_itemspara_by_id($id);
			
			if($data['itemspara'][0]->para_item_21!=0) 
			{
				$data['para_item_21'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);
			}
			$data['para_item_22'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
			$data['para_item_23'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
			$data['para_item_24'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
			$data['para_item_25'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
			$data['para_item_26'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_26);
			$data['para_item_27'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_27);
			$data['para_item_28'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_28);
			$data['para_item_29'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_29);
			$data['para_item_30'] = $this->Pilot_Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_30);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/pilot_itemspara/itemspara_view', $data);
			$this->load->view('admin/includes/_footer');
	}
	
	public function edit($id = 0)
	{
		if($this->input->post('submit'))
        {
				$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('para_start_from', 'Para Starts From', 'trim|required');
				$this->form_validation->set_rules('para_item_21', 'Para Item 21', 'trim|required');
				$this->form_validation->set_rules('para_item_22', 'Para Item 22', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect(base_url('admin/pilot_itemspara/edit/'.$id));
			}
			else{
				$keyword ='Ginger';
				$para_text_en = $this->input->post('para_text_en');
				$para_text_ur = $this->input->post('para_text_ur');
				$para_statistics = $this->input->post('para_statistics');
				
				if(strpos($para_text_en, $keyword) !== false || 
				   strpos($para_text_ur, $keyword) !== false || 
				   strpos($para_statistics, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}
				$data = array(
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' =>$this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),					
					'para_img_position' => $this->input->post('para_img_position'),					
					'para_start_from' => $this->input->post('para_start_from'),
					'para_item_21' => $this->input->post('para_item_21'),
					'para_item_22' => $this->input->post('para_item_22'),
					'para_item_23' => $this->input->post('para_item_23'),
					'para_item_24' => $this->input->post('para_item_24'),
					'para_item_25' => $this->input->post('para_item_25'),
					'para_item_26' => $this->input->post('para_item_26'),
					'para_item_27' => $this->input->post('para_item_27'),
					'para_item_28' => $this->input->post('para_item_28'),
					'para_item_29' => $this->input->post('para_item_29'),
					'para_item_30' => $this->input->post('para_item_30'),
					'para_statistics' => $this->input->post('para_statistics'),
					'para_ordering' => $this->input->post('para_ordering'),
					'para_updatedby' => $this->session->userdata('admin_id'),
					'para_updated' => date("Y-m-d h:i:s")
				);
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/pilot_itemspara/edit/'.$id));
					}
				}
				$ids = 21;
				($this->input->post('para_item_21')!='')?$ids++:$ids;
				($this->input->post('para_item_22')!='')?$ids++:$ids;
				($this->input->post('para_item_23')!='')?$ids++:$ids;
				($this->input->post('para_item_24')!='')?$ids++:$ids;
				($this->input->post('para_item_25')!='')?$ids++:$ids;
				($this->input->post('para_item_26')!='')?$ids++:$ids;
				($this->input->post('para_item_27')!='')?$ids++:$ids;
				($this->input->post('para_item_28')!='')?$ids++:$ids;
				($this->input->post('para_item_29')!='')?$ids++:$ids;
				($this->input->post('para_item_30')!='')?$ids++:$ids;
				
				$result = $this->Pilot_Itemspara_model->edit_itemspara($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Itempara has been updated successfully!');
					if($this->session->userdata('role_id')==2)
						redirect(base_url('admin/pilot_itemspara/view/'.$id));
					elseif($this->session->userdata('role_id')==3)
						redirect(base_url('admin/pilot_itemspara/view/'.$id));
					else{die('Alert! You are not authorized');}
				}
			}
		}
		elseif($this->input->post('submit2'))
        {
				$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('para_start_from', 'Para Starts From', 'trim|required');
				$this->form_validation->set_rules('para_item_22', 'Para Item 22', 'trim|required');
				$this->form_validation->set_rules('para_item_23', 'Para Item 23', 'trim|required');
				$this->form_validation->set_rules('para_item_24', 'Para Item 24', 'trim|required');				
				$this->form_validation->set_rules('para_item_25', 'Para Item 25', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect(base_url('admin/pilot_itemspara/edit/'.$id));
			}
			else{
				$keyword ='Ginger';
				$para_text_en = $this->input->post('para_text_en');
				$para_text_ur = $this->input->post('para_text_ur');
				$para_statistics = $this->input->post('para_statistics');
				
				if(strpos($para_text_en, $keyword) !== false || 
				   strpos($para_text_ur, $keyword) !== false || 
				   strpos($para_statistics, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					die('Don Not go further');
				}
				$data = array(
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' =>$this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),					
					'para_img_position' => $this->input->post('para_img_position'),					
					'para_start_from' => $this->input->post('para_start_from'),
					'para_item_21' => $this->input->post('para_item_21'),
					'para_item_22' => $this->input->post('para_item_22'),
					'para_item_23' => $this->input->post('para_item_23'),
					'para_item_24' => $this->input->post('para_item_24'),
					'para_item_25' => $this->input->post('para_item_25'),
					'para_item_26' => $this->input->post('para_item_26'),
					'para_item_27' => $this->input->post('para_item_27'),
					'para_item_28' => $this->input->post('para_item_28'),
					'para_item_29' => $this->input->post('para_item_29'),
					'para_item_30' => $this->input->post('para_item_30'),
					'para_statistics' => $this->input->post('para_statistics'),
					'para_ordering' => $this->input->post('para_ordering'),
					'para_status' => '4',
					'para_status_ss' => '2',
					'para_comment_ss' => $this->input->post('para_comment_ss')
				);
				
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/pilot_itemspara/edit/'.$id));
					}
				}
				$ids = 21;
				($this->input->post('para_item_21')!='')?$ids++:$ids;
				($this->input->post('para_item_22')!='')?$ids++:$ids;
				($this->input->post('para_item_23')!='')?$ids++:$ids;
				($this->input->post('para_item_24')!='')?$ids++:$ids;
				($this->input->post('para_item_25')!='')?$ids++:$ids;
				($this->input->post('para_item_26')!='')?$ids++:$ids;
				($this->input->post('para_item_27')!='')?$ids++:$ids;
				($this->input->post('para_item_28')!='')?$ids++:$ids;
				($this->input->post('para_item_29')!='')?$ids++:$ids;
				($this->input->post('para_item_30')!='')?$ids++:$ids;
				$result = $this->Pilot_Itemspara_model->edit_itemspara($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Itempara has been updated successfully!');
					redirect(base_url('admin/pilot_itemspara/view/'.$id));
				}
			}
		}
		else
        {
			$data['title'] = 'Edit Pargraph';
			$data['paragraph'] = $this->Pilot_Itemspara_model->get_itemspara_by_id($id);
			$data['grades'] = $this->Pilot_Itemspara_model->get_all_grades();
			$data['paraitems'] = [];
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Pilot_Itemspara_model->get_ae_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
				$data['paraitems'] = $this->Pilot_Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id'], $id);
			}		
			else			
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Pilot_Itemspara_model->get_ae_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
				$data['paraitems'] = $this->Pilot_Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id'], $id);
			}				
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/pilot_itemspara/itemspara_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
}
	?>