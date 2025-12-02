<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Items extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
        $this->load->library('SmithWaterman');
	}
	public function index()
	{
		$data['title'] = 'Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	 
	public function ditems()
	{
		$data['title'] = 'Draft Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ditems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function sitems()
	{
		$data['title'] = 'Submitted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/sitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ritems()
	{
		$data['title'] = 'Rejected Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ritems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function aitems()
	{
		die('You are not authorized here');
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function submit_for_approval($id=0)
	{ 
		$result = $this->Items_model->submit_for_approval( $id);
		if($result)
		{
			$data = array(
				'log_itemid' => $id,
				'log_title' => 'Item submitted by Item Writer',
				'log_message' => 'Item {{log_itemid}} submitted by Item Writer {{log_admin_id}} on {{log_date}}',
				'log_messagetype' =>'submitted',
				'log_admin_id' => $this->session->userdata('admin_id')
			);
			$log = $this->Items_model->log_entry($data);
			$this->session->set_flashdata('success', 'Item has been updated successfully!');
			redirect(base_url('admin/items/ditems'));
		}
		else
		{
			$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact AFAQ IT Team');
			redirect(base_url('admin/items/ditems'),'refresh');
		}
	}
	
	public function ae_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$data['title'] = 'Pending Items List for Assessment Expert';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ae_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ae_accepted_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_accepted_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ae_rejected_items()
	{
		$data['title'] = 'Rejected Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_rejected_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsons_ae_accepted($id = 0)
	{
		if($id!="")
		{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_searched_a($this->session->userdata('admin_id'),$subjectList,4,$id);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ'){$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
				}
				else
				{
					die('Alert! You are not authorized to this action');
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else
		{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_accepted($this->session->userdata('admin_id'),$subjectList,1);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*if($row['item_type']=='ERQ')
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);						   
	}
	
	public function datatable_json_ae_rejected($id = 0)
	{
		if($id!="")
		{
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_searched_r($this->session->userdata('admin_id'),$subjectList,3,$id);
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else
		{
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_rejected($this->session->userdata('admin_id'),$subjectList,2);
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);	
	}
	
	public function ae_submit_for_approval($id=0)
	{ 
		if($this->input->post('item_comment_ae')=="")
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->session->set_flashdata('error', 'Item comments required!');
			redirect(base_url('admin/items/ae_view/'.$id));
		}
		else
		{
			if($this->input->post('submit_ae'))
			{
				$data = array(
					'item_comment_ae' => $this->input->post('item_comment_ae'),
					'item_status_ae' => '1',
					'item_status' => '4',
					'item_reviewed' => date('Y-m-d H:i:s'),					
					'item_reviewedby' => $this->session->userdata('admin_id')
				);
			}
			elseif($this->input->post('reject_ae'))
			{
				$data = array(
					'item_comment_ae' => $this->input->post('item_comment_ae'),
					'item_status_ae' => '2',
					'item_status' => '3',
					'item_reviewed' => date('Y-m-d H:i:s'),
					'item_reviewedby' => $this->session->userdata('admin_id'),
					'log_comment' => $this->input->post('item_comment_ae')
				);
			}
			else
			{
				die('Contact PEC IT TEAM......');
			}
			$result = $this->Items_model->ae_submit_for_approval($data, $id);
			$log_message ='';
			$log_messagetype='';
			if($item_status_ae ='1')
			{
				$log_message ='Item {{log_itemid}} approved by AE {{itemwriter_id}} on {{log_date}}';
				$log_messagetype='ae_approved';
			}
			else
			{
				$log_message ='Item {{log_itemid}} rejected by AE {{itemwriter_id}} on {{log_date}}';
				$log_messagetype='ae_rejected';
			}
			if($result){
				$data = array(
					'log_itemid' => $id,
					'log_title' => 'Item approved by AE',
					'log_message' => $log_message,
					'log_messagetype' =>$log_messagetype,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_comment' => $this->input->post('item_comment_ae')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', 'Item has been updated successfully!');
				redirect(base_url('admin/items/ae_pitems'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact AFAQ IT Team');
				redirect(base_url('admin/items/ae_pitems'),'refresh');
			}
		}
	} 
	
	public function ae_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ae_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('item_type') == '')
			{
				redirect(base_url('admin/items/ss_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['item_type'] = $this->input->post('item_type');
				$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ss_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function ss_aitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('item_type') == '')
			{
				redirect(base_url('admin/items/ss_accepted_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['item_type'] = $this->input->post('item_type');
				$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ss_aitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function ss_ritems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('item_type') == '')
			{
				redirect(base_url('admin/items/ss_rejected_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['item_type'] = $this->input->post('item_type');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ss_ritems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function ae_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' /*&&$this->input->post('item_submittedby') == ''*/)
			{
				redirect(base_url('admin/items/ae_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ae_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function ae_aitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' /*$this->input->post('item_submittedby') == ''*/)
			{
				redirect(base_url('admin/items/ae_accepted_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ae_aitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function ae_ritems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' /*&& $this->input->post('item_submittedby') == '' */)
			{
				redirect(base_url('admin/items/ae_rejected_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['item_submittedby'] = $this->input->post('item_submittedby');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/ae_ritems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function ss_submit_for_approval($id=0)
	{ 
		if($this->input->post('item_comment_ss')=="" && $this->input->post('reject_ss'))
		{
				$this->form_validation->set_rules('item_comment_ss', 'Item Comment SS', 'trim|required');
				$this->session->set_flashdata('error', 'Item comments required!');
				redirect(base_url('admin/items/ss_view_combine/'.$id));
		}
		else
		{
            
			$item_comment_ss = $this->input->post('item_comment_ss');
			$item_status ='';
			$item_status_ss ='';
			$log_messagetype='';
			$log_message ='';
			if($this->input->post('submit_awoc'))
			{
				$item_status ='4';
				$item_status_ss ='2';
			}
			elseif($this->input->post('reject_ss')){
				$item_status ='3';
				$item_status_ss ='1';
			}
			$data = array(
					'item_approvedby' => $this->session->userdata('admin_id'),
					'item_approved' => date('Y-m-d H:i:s'),
					'item_comment_ss' => $this->input->post('item_comment_ss'),
					'item_status_ss' => $item_status_ss,
					'item_status'=> $item_status
				);
            
			if($item_status_ss =='2')
			{
				$log_messagetype = 'ss_accept';
				$log_message ='Item {{log_itemid}} accepted with change by {{log_admin_id}} on {{log_date}}';
			}
			elseif($item_status_ss =='1')
			{
				$log_messagetype = 'ss_rejected';
				$log_message ='Item {{log_itemid}} rejected by {{log_admin_id}} on {{log_date}}';
			}
			
			$result = $this->Items_model->ss_submit_for_approval($data, $id);
			if($result){
				$datalog = array(
					'log_itemid' => $id,
					'log_title' => 'Item accepted by SS',
					'log_message' => $log_message,
					'log_messagetype' =>$log_messagetype,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_comment' => $this->input->post('item_comment_ss')
				);
				$log = $this->Items_model->log_entry($datalog);
				if($item_status_ss==2||$item_status_ss==3)
				{$this->session->set_flashdata('success', 'Item has been accepted successfully!');}
				elseif($item_status_ss==1)
				{$this->session->set_flashdata('success', 'Item has been rejected!');}
				redirect(base_url('admin/items/ss_pitems'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact AFAQ IT Team');
				redirect(base_url('admin/items/ss_pitems'),'refresh');
			}
		}
	} 
	
	public function ss_view($id = 0)
	{
		$result_rev = $this->Items_model->check_item_discard_status($id);
		if($result_rev[0]->item_discard_status==0)
		{
			$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Items_model->get_all_grades();
			$data['items'] = $this->Items_model->get_item_by_id($id);
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
			$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
			$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/ss_items_view', $data);
			$this->load->view('admin/includes/_footer');
		}
		else
		{
			$this->session->set_flashdata('errors', 'Alert ! You cannot view discarded item through this view');
			redirect(base_url('admin/auth/logout'));
		}
	}
	
	public function ss_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_view_discarded($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_items_view_discarded', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_view_erq_crq_discarded($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_items_view_erq_crq_discarded', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_accepted_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['title'] = 'Accepted Items List';
		$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_accepted_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_withchange_items()
	{
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_withchange_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_withoutchange_items()
	{
		$data['title'] = 'Accepted Items List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_withoutchange_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_rejected_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['title'] = 'Rejected Items List';
		$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_rejected_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_discarded_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['title'] = 'Discarded Items List';
		$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/ss_discarded_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_erq_crq/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$row['slo_number'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsond($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,1);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_erq_crq/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>';
					/*<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>';
					/*<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>
				}
				*/
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['item_option_correct'],
				$row['grade_name_en'],
				$row['subject_name_en'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsons($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,2);
		}
		$data = array();
		$i=0;
		$item_bloom='';
		foreach ($records['data']  as $row) 
		{  
			if($row['item_cognitive_bloom']==1)
			{$item_bloom = 'Remembering';}
			elseif($row['item_cognitive_bloom']==2)
			{$item_bloom = 'Understanding';}
			elseif($row['item_cognitive_bloom']==3)
			{$item_bloom = 'Applying';}
			elseif($row['item_cognitive_bloom']==4)
			{$item_bloom = 'Analysing';}
			elseif($row['item_cognitive_bloom']==5)
			{$item_bloom = 'Evaluating';}
			else
			{$item_bloom = 'Creating';}
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				$editoption = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a target="_blank" title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_combine/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>';
			}
			else
			{
			$editoption = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			$item_option_correct = '';
			//true/false
			if($row['item_type'] == 'TF' && $row['item_lang'] == 'eng')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = 'True';
				else
					$item_option_correct = 'False';		
			}
			if($row['item_type'] == 'TF' && $row['item_lang'] == 'urdu')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">درست</div>';
				else
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">غلط</div>';		
			}
			
			//file in the blanks
			if($row['item_type'] == 'FIB' && $row['item_lang'] == 'eng')
			{
				$item_option_correct = $row['item_fib_key_eng'];	
			}
			if($row['item_type'] == 'FIB' && $row['item_lang'] == 'urdu')
			{
				$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_fib_key_ur'].'</div>';	
			}
			
			//MCQ
			if($row['item_type'] == 'MCQ' && $row['item_lang'] == 'eng')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = $row['item_option_correct'].': '.$row['item_option_a_en'];
				if($row['item_option_correct'] == 'b')
					$item_option_correct = $row['item_option_correct'].': '.$row['item_option_b_en'];
				if($row['item_option_correct'] == 'c')
					$item_option_correct = $row['item_option_correct'].': '.$row['item_option_c_en'];
				if($row['item_option_correct'] == 'd')
					$item_option_correct = $row['item_option_correct'].': '.$row['item_option_d_en'];			
			}
			if($row['item_type'] == 'MCQ' && $row['item_lang'] == 'urdu')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.$row['item_option_a_ur'].'</div>';
				if($row['item_option_correct'] == 'b')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.$row['item_option_b_ur'].'</div>';
				if($row['item_option_correct'] == 'c')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.$row['item_option_c_ur'].'</div>';
				if($row['item_option_correct'] == 'd')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.$row['item_option_d_ur'].'</div>';
			}			
			
			$data[]= array(
				++$i,
				$row['item_type'],
				$row['item_id'],
				$item_bloom,
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):'<div class="urdufont-right" style="text-align:right;">'.html_entity_decode($row['item_stem_ur']).'</div>',
				$item_option_correct,
				$row['grade_name_en'], 
				$row['gradesubject'],
				$row['subcs_topic_en'],
				$row['username'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonr($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,3);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
					';
					
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_erq_crq/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
					';
					
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}*/
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$row['slo_number'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,4);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				else
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
			}
			else
			{die('Alert! You are not authorized to this action');}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$row['slo_number'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_aep($id = 0)
	{	
		if($id!="")
		{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE_searched_p($this->session->userdata('admin_id'),$subjectList,4,$id);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
				}
				else
				{
					die('Alert! You are not authorized to do this action.');
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else{
			$records =[];
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_AE($this->session->userdata('admin_id'),$subjectList,34);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==4)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ae_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);						   
	}
	
	public function datatable_jsonssp($id = 0)
	{
		if($id!="")
		{	
			$records =[];			
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_searched($this->session->userdata('admin_id'),$subjectList,2,$id);
			}		
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_combine/'.$row['item_id']).'" > <i class="fa fa-eye"></i></a>';
					/*if($row['item_type']=='ERQ')
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_erq_crq/'.$row['item_id']).'" target="_blank"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view/'.$row['item_id']).'" target="_blank"> <i class="fa fa-eye"></i></a>';}
					*/
				}
				else
				{
					die('Alert! You are not authorized to do this action');
				}
				$item_stem = '';
				if($row['item_stem_en']!=""&&$row['item_stem_ur']=="")
				{$item_stem = $row['item_stem_en'];}
				elseif($row['item_stem_en']==""&&$row['item_stem_ur']!="")
				{$item_stem = $row['item_stem_ur'];}
				elseif($row['item_stem_en']!=""&&$row['item_stem_ur']!="")
				{$item_stem = $row['item_stem_en'];}

				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					$item_stem,
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
			echo json_encode($records);	
		
		}
		else
		{
			$records =[];			
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS($this->session->userdata('admin_id'),$subjectList,2);
			}		
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_combine/'.$row['item_id']).'" > <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_combine/'.$row['item_id']).'" target="_blank"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_combine/'.$row['item_id']).'" target="_blank"> <i class="fa fa-eye"></i></a>';}
					*/
				}
				else
				{
					die('Alert! You are not authorized to do this action');
				}
				
				$item_stem ="";
				if($row['item_stem_en']!="" && $row['item_stem_ur']!="")
				{$item_stem = html_entity_decode($row['item_stem_en']);}
				elseif($row['item_stem_en']!="" && $row['item_stem_ur']=="")
				{$item_stem = html_entity_decode($row['item_stem_en']);}
				elseif($row['item_stem_en']=="" && $row['item_stem_ur']!="")
				{$item_stem = html_entity_decode($row['item_stem_ur']);}
				elseif($row['item_stem_en']=="" && $row['item_stem_ur']=="")
				{$item_stem = 'Full width image item';}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					$item_stem,
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
			echo json_encode($records);	
		}		
	}
	
	public function datatable_json_search($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_SS($this->session->userdata('admin_id'),$subjectList,2,$id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view_erq_crq/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';}
				else
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ss_view/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsons_ss_accepted($id = 0)
	{
		if($id!="")
		{
			$records =[];
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_a_searched($this->session->userdata('admin_id'),$subjectList,4,$id);
			}
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		else
		{
			$records =[];
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_accepted($this->session->userdata('admin_id'),$subjectList,4);
			}
			/*else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			*/
			$data = array();
	
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				//$status = ($row['item_status'] == 1)? 'checked': '';
				
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';//
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$row['item_updated'],
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);						   
	}
	
	public function datatable_jsonssawo($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$records = $this->Items_model->get_all_items_IW($this->session->userdata('admin_id'),$id,4);
		}
		else
		{
			$records = $this->Items_model->get_all_items($id);
		}
		
		//print_r($records);
		//die($id.'='.$this->session->userdata('role_id'));
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			$data[]= array(
				++$i,
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'].'-'.$row['subject_code'],
				$row['slo_number'],
				$editoption
			);
		}
		$records['data']=$data;
		//print_r($data);
		//die();
		echo json_encode($records);						   
	}
	
	public function datatable_json_ss_rejected($id = 0)
	{
		if($id!="")
		{
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_r_searched($this->session->userdata('admin_id'),$subjectList,3,$id);
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$editoption
				);
			}
			$records['data']=$data;
								   
		}
		else
		{
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$records = $this->Items_model->get_all_items_SS_rejected($this->session->userdata('admin_id'),$subjectList);
				//$records = $this->Items_model->get_all_items_SS_rejected($this->session->userdata('admin_id'),$subjectList,3);
			}
			else
			{
				$records = $this->Items_model->get_all_items($id);
			}
			
			$data = array();
			$rejectedby='';
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				if($this->session->userdata('role_id')==2)
				{
					$editoption ='';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					if($row['item_type']=='ERQ')
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}*/
				}
				else
				{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				if($row['item_status_ae']==2 && $row['item_status_ss']==1 && $row['item_status']==4)
				{$rejectedby = 'Rejected by AE';}
				elseif($row['item_status_ae']==0 && $row['item_status_ss']==1 && $row['item_status']==3)
				{$rejectedby = 'Rejected by SS';}

				$data[]= array(
					++$i,
					/*$row['item_batch'],*/
					$row['firstname'].' '.$row['lastname'],
					$row['item_type'],
					$row['item_code'],
					($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
					$row['grade_code'],
					$row['subject_code'],
					$rejectedby,
					$editoption
				);
			}
			$records['data']=$data;
		}
		echo json_encode($records);		
	}
	
	public function datatable_json_ss_discarded($id = 0)
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_SS_discarded($this->session->userdata('admin_id'),$subjectList,1);
		}
		else
		{
			die('Alert-607! Unauthorized user');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_erq_crq_discarded/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/ss_view_discarded/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Alert-607! Unauthorized user');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);		
	}
					
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Items_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
	
	public function change_status()
	{   
		$this->Items_model->change_status();
	}
	
	public function add()
	{
		if($this->session->userdata('admin_id')==1541){ die('You are not allowd to add items! Please contact AFAQ IT Team!!! [reason: virus attack!]');}
		if($this->session->userdata('role_id')==3)
		{
			if($this->input->post('submit'))
			{
/*				if($result['admin_role_id'] == 3){
						$this->session->set_flashdata('error', 'You cannot logon!!! Item Writer Cycle Over! Please contact CEO/Director Assessment PEC!');
						redirect(base_url('admin/auth/login'));
						exit();
					}
*/
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
				$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/items/add'),'refresh');
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					
					'item_date_received' => $this->input->post('item_date_received'),					
					'item_submittedby' => $this->session->userdata('admin_id'),							
					
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_en' => $this->input->post('item_image_en'),
					'item_image_ur' => $this->input->post('item_image_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_a_image' => $this->input->post('item_option_a_image'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_b_image' => $this->input->post('item_option_b_image'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_c_image' => $this->input->post('item_option_c_image'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_d_image' => $this->input->post('item_option_d_image'),
					'item_type' => 'MCQ',
					'item_option_correct' => $this->input->post('item_option_correct'),
					'item_batch' => $this->input->post('item_batch')
				);/*
				$keyword ='Ginger';	
				function array_search_partial($data, $keyword) {
					foreach($data as $index => $string) {
						if (strpos($string, $keyword) !== FALSE)
						die('Oy lab gyaaaaaaaaaaaaa');
					}
				}*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					//print_r($result);
					//die();
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->add_item($data);
				$insert_id = $this->db->insert_id();
				//die($this->db->last_query());
				if($result){
					$data = array(
						'log_itemid' => $insert_id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'New item created',
						'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'created'
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
					redirect(base_url('admin/items/ditems'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Add Item';
			$data['grades'] = $this->Items_model->get_all_grades();
			//echo '<PRE>';
			//print_r($this->session->userdata('subjects_ids'));
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/items_add');
			$this->load->view('admin/includes/_footer');
		}	
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function add_erq_crq()
	{
		if($this->session->userdata('role_id')==3)
		{
			if($this->input->post('submit'))
			{
			/*	if($result['admin_role_id'] == 3){
						$this->session->set_flashdata('error', 'You cannot logon!!! Item Writer Cycle Over! Please contact CEO/Director Assessment PEC!');
						redirect(base_url('admin/auth/login'));
						exit();
					}
				*/
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('erq_crq_add');
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
							
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/items/add'),'refresh');
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_image_en' => $this->input->post('item_image_en'),
					'item_image_ur' => $this->input->post('item_image_ur'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_rubric_image' => $this->input->post('item_rubric_image'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_batch' => $this->input->post('item_batch')
				);
				
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				$data = $this->security->xss_clean($data);
				$result = $this->Items_model->add_item($data);
				//die($this->db->last_query());
				$insert_id = $this->db->insert_id();
				if($result){
					$data = array(
						'log_itemid' => $insert_id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'New item created',
						'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'created',
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
					redirect(base_url('admin/items/ditems'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Add ERQ/CRQ Item';
			$data['grades'] = $this->Items_model->get_all_grades();
			//echo '<PRE>';
			//print_r($this->session->userdata('subjects_ids'));
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/erq_crq_items_add');
			$this->load->view('admin/includes/_footer');
		}	
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function edit_erq_crq($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_rubric_image' => $this->input->post('item_rubric_image'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
					'item_comment_ss' =>$this->input->post('item_comment_ss')
				);
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				//print_r($data);
				//die();
				$result = $this->Items_model->edit_items($data, $id);
				
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Updated by IW',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IW {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						/*if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
						}
						else
						{
							redirect(base_url('admin/items/ditems'));
						}*/
						if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
						}
						elseif($this->session->userdata('role_id')==3)
						{
							redirect(base_url('admin/items/view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							redirect(base_url('admin/items/ae_view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						else
						{
							die('You are not authorized');
						}
					}
				}
			}
		}
		elseif($this->input->post('submit2'))
		{
			//ss
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{	
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}		
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
					'item_status' => '4',
					'item_status_ss' => '2',
					'item_comment_ss' => $this->input->post('item_comment_ss')
				);
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				
				$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Updated by SS',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						//redirect(base_url('admin/items/ditems'));
						if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
						}
						elseif($this->session->userdata('role_id')==3)
						{
							redirect(base_url('admin/items/view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							redirect(base_url('admin/items/ae_view_erq_crq/'.$id));
							//redirect(base_url('admin/items/ditems'));
						}
						else
						{
							die('You are not authorized');
						}
					}
				}
			}
		}
		elseif($this->input->post('submit3'))
		{
			//ae
			//echo "<PRE>";
			//print_r($_REQUEST);
			//die();
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			
			if ($this->form_validation->run() == FALSE) {
				/*
				$data['items'] = $this->Items_model->get_items_by_id($id);				
				$data['view'] = 'admin/items/items_edit';
				$this->load->view('layout', $data);
				*/
				$this->session->set_flashdata('error', 'Item Comments AE Required!');
				redirect(base_url('admin/items/edit_erq_crq/'.$id));
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_comment_ae' => $this->input->post('item_comment_ae')
				);
				//print_r($data);
				//die();
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by AE',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'ae_updated',
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					/*if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/Items/ae_view_erq_crq/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/ditems'));
					}*/
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view_erq_crq/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view_erq_crq/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view_erq_crq/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		else{
			$data['title'] = 'Edit ERQ/CRQ Item';
			$data['item'] = $this->Items_model->get_items_by_id($id);
			
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_ae_subjects_grade($subjectList,$data['item']['item_grade_id']);
			}		
			else
			{
				$data['subjects'] = $this->Items_model->get_all_subjects();
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
			
			if($data['item']['item_status']==3 && $this->session->userdata('role_id')==3 && $data['item']['item_submittedby']==$this->session->userdata('admin_id'))
			{
				$data = array(
					'item_status' => '1',
					'item_approvedby' => '0',
					'item_status_ss' => '0',
					'item_reviewedby' => '0',					
					'item_status_ae' => '0',
				);
				$result = $this->Items_model->update_rejected_item($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Item status has been changed from rejected to draft successfully!');
					redirect(base_url('admin/items/edit_erq_crq/'.$id));
				}
			}
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/erq_crq_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function subjects_by_grade()
	{		
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList,$this->input->post('subject_board_id')));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList,$this->input->post('subject_board_id')));	
		}
		elseif($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_ir_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Items_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	public function subjects_by_series()
	{		
		if($this->session->userdata('role_id')==3)
		{
			
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Items_model->get_subjects_by_series($this->input->post('grade_id'),$subjectList,$this->input->post('subject_board_id'),$this->input->post('item_series_id')));	
		}
		else
		{
			echo json_encode($this->Items_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	public function subjects_by_grade_board_series()
	{
		echo json_encode($this->Items_model->get_subjects_by_grade_board_series($this->input->post('grade_id'),$this->input->post('subject_board_id'),$this->input->post('subject_series_id')));	
	}
	public function cstands_by_subject()
	{
		echo json_encode($this->Items_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Items_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
	
	public function subcstands_by_subject()
	{
		echo json_encode($this->Items_model->get_subcstands_by_subject($this->input->post('subcs_subject_id')));
	}
	
	public function slos_by_subcstands()
	{
		echo json_encode($this->Items_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
	
	public function edit($id = 0)
	{
		$redirect_iw='';
		$redirect_ss='';
		$redirect_ae='';
		if($this->input->post('submit'))
		{		
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//echo '<hr />';
				//print_r($data);
				//die();
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by IW',
						'log_message' => 'Item updated {{log_itemid}} by IW {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		elseif($this->input->post('submit2'))
		{
			//ss
			//echo "Under Development";
			//die();
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			$this->form_validation->set_rules('item_comment_ss', 'Item Comment SS', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				/*
				$data['items'] = $this->Items_model->get_items_by_id($id);				
				$data['view'] = 'admin/items/items_edit';
				$this->load->view('layout', $data);
				*/
				$this->session->set_flashdata('error', 'Item Comments SS Required!');
				redirect(base_url('admin/items/edit/'.$id));
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct'),
					'item_status' => '4',
					'item_status_ss' => '2',
					'item_comment_ss' => $this->input->post('item_comment_ss')					
				);
				//print_r($data);
				//die();
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by SS',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		elseif($this->input->post('submit3'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Item Comments SS Required!');
				redirect(base_url('admin/items/edit/'.$id));
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct'),
				);
				//print_r($data);
				//die();
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Items_model->edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='ae_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by AE',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					/*if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/Items/ae_view/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/ditems'));
					}*/
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_view/'.$id));
					}
					elseif($this->session->userdata('role_id')==3)
					{
						redirect(base_url('admin/items/view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					elseif($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/ae_view/'.$id));
						//redirect(base_url('admin/items/ditems'));
					}
					else
					{
						die('You are not authorized');
					}
				}
			}
		}
		else
		{
			//if($this->session->userdata('admin_id'))
						
			$data['title'] = 'Edit Item';
			$data['item'] = $this->Items_model->get_items_by_id($id);
			$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==3)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_ae_subjects_grade($subjectList,$data['item']['item_grade_id']);
				}		
				else
				{
					$data['subjects'] = $this->Items_model->get_all_subjects();
				}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
			
			if($data['item']['item_status']==3 && $this->session->userdata('role_id')==3 && $data['item']['item_submittedby']==$this->session->userdata('admin_id'))
			{
				$data = array(
					'item_status' => '1',
					'item_approvedby' => '0',
					'item_status_ss' => '0',
					'item_reviewedby' => '0',					
					'item_status_ae' => '0',
				);
				$result = $this->Items_model->update_rejected_item($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Item status has been changed from rejected to draft successfully!');
					redirect(base_url('admin/items/edit/'.$id));
				}
			}
			//echo '<PRE>';
			//print_r($id);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function view_erq_crq($id = 0)
	{
		$data['title'] = 'View ERQ/CRQ Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/erq_crq_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function delete($id = 0)
	{
		die('Sorry!!! Item cannot be delete!!! Restrictions');
		$this->db->delete('ci_items', array('item_id' => $id));
		$data = array(
					'log_itemid' => $id,
					'log_title' => 'Item deleted by IW',
					'log_message' => 'Item {{log_itemid}} deleted by itemwriter {{itemwriter_id}} on {{log_date}}',
					'log_messagetype' =>'deleted',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
		$log = $this->Items_model->log_entry($data);
		$this->session->set_flashdata('success', 'Item has been deleted successfully!');
		redirect(base_url('admin/items'));
	}
	
	public function delete_item_rubric_image($id = 0)
	{
		$data = array('item_rubric_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit_erq_crq/'.$id));
	}
	
	public function delete_rubimage_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit_erq_crq/'.$id));
	}
	
	public function delete_rubimage_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit_erq_crq/'.$id));
	}
	
	public function delete_image_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_image_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_a_image($id = 0)
	{
		$data = array('item_option_a_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_b_image($id = 0)
	{
		$data = array('item_option_b_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_c_image($id = 0)
	{
		$data = array('item_option_c_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	
	public function delete_item_option_d_image($id = 0)
	{
		$data = array('item_option_d_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		redirect(base_url('admin/items/edit/'.$id));
	}
	/////////////////////////////////////////////////////////////////////////////
	public function rev_delete_image_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_image_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_item_option_a_image($id = 0)
	{
		$data = array('item_option_a_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{ 
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_item_option_b_image($id = 0)
	{
		$data = array('item_option_b_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
		
	}
	
	public function rev_delete_item_option_c_image($id = 0)
	{
		$data = array('item_option_c_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_item_option_d_image($id = 0)
	{
		$data = array('item_option_d_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_item_rubric_image($id = 0)
	{
		$data = array('item_rubric_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq/'.$id));
		}
	}
	
	public function rev_delete_rubimage_en($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq/'.$id));
		}
	}
	
	public function rev_delete_rubimage_ur($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq/'.$id));
		}
	}
	/////////////////////////////////////////////////////////////////////////////
	public function rev_delete_image_en_resubmitted($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_image_ur_resubmitted($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_item_option_a_image_resubmitted($id = 0)
	{
		$data = array('item_option_a_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{ 
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_item_option_b_image_resubmitted($id = 0)
	{
		$data = array('item_option_b_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
		
	}
	
	public function rev_delete_item_option_c_image_resubmitted($id = 0)
	{
		$data = array('item_option_c_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_item_option_d_image_resubmitted($id = 0)
	{
		$data = array('item_option_d_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit/'.$id));
		}
	}
	
	public function rev_delete_item_rubric_image_resubmitted($id = 0)
	{
		$data = array('item_rubric_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_rubimage_en_resubmitted($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_rubimage_ur_resubmitted($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id));
		}
	}
	/////////////////////////////////////////////////////////////////////////////
	public function rev_delete_image_en_revise($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_image_ur_revise($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_item_option_a_image_revise($id = 0)
	{
		$data = array('item_option_a_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{ 
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_item_option_b_image_revise($id = 0)
	{
		$data = array('item_option_b_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
		
	}
	
	public function rev_delete_item_option_c_image_revise($id = 0)
	{
		$data = array('item_option_c_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_item_option_d_image_revise($id = 0)
	{
		$data = array('item_option_d_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Item Option Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_item_rubric_image_revise($id = 0)
	{
		$data = array('item_rubric_image' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_rubimage_en_revise($id = 0)
	{
		$data = array('item_image_en' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id));
		}
	}
	
	public function rev_delete_rubimage_ur_revise($id = 0)
	{
		$data = array('item_image_ur' => '');
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		//redirect(base_url('admin/items/rev_edit_erq_crq/'.$id));
		if($this->session->userdata('role_id')==6)
		{
			redirect(base_url('admin/items/rev_edit_erq_crq_revise/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id));
		}
		elseif($this->session->userdata('role_id')==4)
		{
			redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id));
		}
	}
	/////////////////////////////////////////////////////////////////////////////
	public function search()
	{
			if($this->input->post('submit'))
			{		
				if($this->input->post('item_grade_id') == '' && $this->input->post('item_subject_id') == '')
				{
					redirect(base_url('admin/items'));
				}
				else
				{
					$data['item_grade_id'] = $this->input->post('item_grade_id');
					$data['item_subject_id'] = $this->input->post('item_subject_id');
					$data['title'] = 'Items Searched List ';
					$data['grades'] = $this->Items_model->get_all_grades();	
					$this->load->view('admin/includes/_header', $data);
					$this->load->view('admin/items/items_list', $data);
					$this->load->view('admin/includes/_footer');
				}
			}
	}
	
	public function psy_items()
	{
 		$data['title'] = 'Items List for psychometrician';
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function psy_items_rev()
	{
 		$data['title'] = 'Items List for psychometrician';
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_ritems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_psy($id = 0)
	{	
		$records = $this->Items_model->get_all_items_psy($id);
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$editoption ='';
			$stem='';
			if($row['item_stem_en']!="")
				{$stem = html_entity_decode($row['item_stem_en']);}
			elseif($row['item_stem_ur']!="")
				{$stem = html_entity_decode($row['item_stem_ur']);}
			else{$stem = html_entity_decode($row['item_stem_en']).'<br />( '.html_entity_decode($row['item_stem_ur']).' )';}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			/*if($row['item_type']=='ERQ')
			{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
			else
			{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['item_code'].'<br />( '.$row['item_type'].' )',
				$stem,
				$row['subject_name_en'].'('.$row['subject_code'].')',
				$row['grade_name_en'].'('.$row['grade_code'].')',
				$row['subusername'],
				$row['appusername'],
				$row['rewusername'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_psy_rev($id = 0)
	{	
		$records = $this->Items_model->get_all_items_psy_rev($id);
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$editoption ='';
			$stem='';
			if($row['item_stem_en']!="")
				{$stem = html_entity_decode($row['item_stem_en']);}
			elseif($row['item_stem_ur']!="")
				{$stem = html_entity_decode($row['item_stem_ur']);}
			else{$stem = html_entity_decode($row['item_stem_en']).'<br />( '.html_entity_decode($row['item_stem_ur']).' )';}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			/*
			if($row['item_type']=='ERQ')
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/psy_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			*/
			$data[]= array(
				++$i,
				$row['item_code'].'<br />( '.$row['item_type'].' )',
				$stem,
				$row['subject_name_en'].'('.$row['subject_code'].')',
				$row['grade_name_en'].'('.$row['grade_code'].')',
				$row['subusername'],
				$row['appusername'],
				$row['rewusername'],
				$row['pusername'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function psy_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function psy_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/psy_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function psy_submit_for_approval($id=0)
	{ 
		if($this->input->post('item_comment_psy')=="")
		{
			$this->form_validation->set_rules('item_comment_psy', 'Item Psychometrician Comment Required', 'trim|required');
			$this->session->set_flashdata('error', 'Item comments required!');
			redirect(base_url('admin/items/psy_view/'.$id));
		}
		else
		{
			$item_status_psy ='';
			if($this->input->post('submit_psy'))
			{
				$data = array(
					'item_comment_psy' => $this->input->post('item_comment_psy'),
					'item_commentby_psy' => $this->session->userdata('admin_id'),
					'item_status_psy' => '1',
					'item_date_psy' => date('Y-m-d H:i:s')
					);
			}
			else{
				die('Contact AFAQ IT Team.....');
			}
			
			//print_r($data);
			//die();
			$result = $this->Items_model->psy_submit_for_approval($data, $id);
			if($result){
				if($result){
				//die($this->db->last_query());
				$data = array(
					'log_itemid' => $id,
					'log_title' => 'Item reviewed by Psychometrician',
					'log_message' => 'Item {{log_itemid}} reviewed by Psychometrician {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'psy_reviewed',
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_comment' =>$this->input->post('item_comment_psy')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', 'Item has been updated successfully!');
				redirect(base_url('admin/items/psy_items'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact AFAQ IT Team');
				redirect(base_url('admin/items/psy_items'),'refresh');
				}
			}
		}
	}
	
	public function export_items_csv($req='')
	{ 
		
		if($this->uri->segment(4)=='ditems')
		{
			$items_data = $this->Items_model->get_items_csv_export();
		}
		elseif($this->uri->segment(4)=='sitems')
		{
			$items_data = $this->Items_model->get_sitems_csv_export();
		}
		elseif($this->uri->segment(4)=='ritems')
		{
			$items_data = $this->Items_model->get_ritems_csv_export();
		}
		$filename = 'items_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; "); 
	    $file = fopen('php://output', 'w');
		$header = array("ItemID", "ItemCode", "ItemStem(Eng)", "ItemStem(Urdu)", "ItemSort", "Grade", "ItemStatus"); 
		fputcsv($file, $header);
		
		foreach ($items_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	
	public function export_ss_pitems_csv()
	{ 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$grades_data = $this->Items_model->get_ss_pitems_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("ItemID", "ItemCode", "ItemStem(Eng)", "ItemStem(Urdu)", "ItemSort", "Grade", "ItemStatus"); 
		fputcsv($file, $header);
		foreach ($grades_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	
	public function create_items_pdf()
	{
		$data['all_items'] = $this->Items_model->get_items_for_export();
		$this->load->view('admin/items/items_pdf', $data);
	}	
	
	public function export_app_items_pdf($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type)
	{
		$data['all_items'] = $this->Items_model->get_app_items_for_export($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type);
		$this->load->view('admin/items/app_items_pdf', $data);
	}
	
	public function export_app_items_word($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type)
	{
		$data['all_items'] = $this->Items_model->get_app_items_for_export($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_submittedby, $item_cstand_id, $item_subcstand_id, $item_type);
		
		
		header("Content-Description: File Transfer"); 
		header('Content-Type: application/octet-stream');
	  // header("Content-Disposition: attachment; filename=$filename"); 
		echo $this->load->view('admin/items/app_items_word', $data, true);
	
		header("Content-Disposition: attachment;Filename=Items_list.doc");
	}
	
	public function export_app_items_csv($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type)
	{ 
		$items_data = $this->Items_model->get_app_items_for_export($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type);
		$filename = 'items_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; "); 
	   $file = fopen('php://output', 'w');
		$header = array("SrNo", "ItemID", "Bloom", "ItemCode", "ItemStem(Eng)", "ItemStem(Urdu)", "Grade", "Subject", "Chapter", "CreateBy"); 
		fputcsv($file, $header);
		
		foreach ($items_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	public function create_sitems_pdf()
	{
		$data['all_items'] = $this->Items_model->get_sitems_for_export();
		$this->load->view('admin/items/sitems_pdf', $data);
	}
	public function create_aitems_pdf()
	{
		$data['all_items'] = $this->Items_model->get_aitems_for_export();
		$this->load->view('admin/items/aitems_pdf', $data);
	}
	public function create_ritems_pdf()
	{
		$data['all_items'] = $this->Items_model->get_ritems_for_export();
		$this->load->view('admin/items/ritems_pdf', $data);
	}
	public function create_ss_pitems_pdf()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['all_items'] = $this->Items_model->get_ss_pitems_for_export($subjectList);
		$this->load->view('admin/items/ss_pitems_pdf', $data);
	}
	public function create_ss_aitems_pdf()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['all_items'] = $this->Items_model->get_ss_aitems_for_export($subjectList);
		$this->load->view('admin/items/ss_aitems_pdf', $data);
	}
	public function create_ss_ritems_pdf()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['all_items'] = $this->Items_model->get_ss_ritems_for_export($subjectList);
		$this->load->view('admin/items/ss_ritems_pdf', $data);
	}
	public function itemwriters_by_subjects()
	{
		echo json_encode($this->Items_model->get_iw_by_subject($this->input->post('subject_id')));
	}
	
	public function itemreviewer_by_subjects()
	{
		echo json_encode($this->Items_model->get_ir_by_subject($this->input->post('subject_id')));
	}
	
	public function rev_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_eitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_aitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_ungroup_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_ungroup_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ir_revised_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ir_revised_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_pending($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go back');
			}
			$distName = '';
			$dist = $this->Items_model->get_iw_distname($row['item_submittedby']);
			if($dist)
				$distName = ' ('.$dist['district_name_en'].')';
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'].$distName,
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//get_all_items_REV_edited
	public function datatable_jsona_rev($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_accepted($subjectList,$this->session->userdata('admin_id'));
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				$status='';
				if($row['item_status'] == 4)
				{
					$status='Reviewed';
				}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_edited($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ir_revised($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ir_revised($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*if($row['item_type']=='ERQ')
				{
					//$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="#"> <i class="fa fa-eye"></i></a>';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_erq_crq_revise/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					//$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="#"> <i class="fa fa-eye"></i></a>';
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view_revise/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_status']==3)?'Rejected':'Approved',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_ss_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_revised_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_revised_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_resubmitted_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_resubmitted_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_resubmitted_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_resubmitted_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_eitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev_ss($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_pending($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$status = '';
				if($row['item_rev_ss_status']==0 && $row['item_rev_status']==2)
				{$status='Pending';}
				else
				{$status='Submitted';}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				else
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ss_ungroup_items_list($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_ungroup($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$status = '';
				if($row['item_rev_ss_status']==0 && $row['item_rev_status']==2)
				{$status='Pending';}
				elseif($row['item_rev_ss_status']==2 && $row['item_rev_status']==2)
				{$status='Submitted';}
				elseif($row['item_rev_ss_status']==4 && $row['item_rev_status']==2)
				{$status='Re-Submitted';}
				
				{$status='Submitted';}
				
				if($row['item_rev_ss_status']==2 || $row['item_rev_ss_status']==4)
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center"  href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				else{$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center"  href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
					++$i,				
					$row['firstname'].' '.$row['lastname'],
					$row['subcs_number'],
					$row['slo_number'],
					$row['item_type'],
					$row['item_code'],
					(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
					((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
					$row['grade_code'],
					$row['subject_code'],
					$status,
					$editoption
			/*
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			*/
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ss_ungroup_items_list_searched($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_ungroup_searched($subjectList,$id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status ='';
			if($row['item_rev_ss_status']=='0')
				{$status = 'Pending';}
				elseif($row['item_rev_ss_status']=='2')
				{$status= 'Submitted';}
				elseif($row['item_rev_ss_status']=='4')
				{$status= 'Re-Submitted';}
				
			if($this->session->userdata('role_id')==2)
			{
				if($row['item_rev_ss_status']==2 || $row['item_rev_ss_status']==4)
				{$editoption = '<a title="View" class="view btn btn-sm btn-info"  href="'.base_url('admin/Items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				else
				{$editoption = '<a title="View" class="view btn btn-sm btn-info"  href="'.base_url('admin/Items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,				
				$row['firstname'].' '.$row['lastname'],
				$row['subcs_number'],
				$row['slo_number'],
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
				);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ss_revised($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_revised($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			//print_r($row);
			//die();
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*if($row['item_type']=='ERQ')
				{
					if($row['item_rev_ae_status']==3)
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ss_view_erq_crq_revise/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ss_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				}
				else
				{
					if($row['item_rev_ae_status']==3)
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_view_revise/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				}*/
			}
			else
			{
				die('Alert! You are not authorized to do this action');
			}
			$rej_status = '';
			if(($row['item_rev_status']==2 || $row['item_rev_status']==4) && $row['item_rev_ss_status']==3 && $row['item_rev_ae_status']==3)
			{$rej_status = 'Rejected by AE';}
			elseif($row['item_rev_status']==3 && $row['item_rev_ss_status']==3 && $row['item_rev_ae_status']==0)
			{$rej_status = 'Rejected by SS';}
			else{$rej_status = 'Rejected by SS';}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				$rej_status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ss_resubmitted($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_resubmitted($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			//print_r($row);
			//die();
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$status ='';
				if($row['item_rev_status']==4 && $row['item_rev_ss_status']==0 && $row['item_rev_ae_status']==0)
				{$status ='Pending';}
				elseif($row['item_rev_status']==4 && $row['item_rev_ss_status']==4 && $row['item_rev_ae_status']==0)
				{$status ='Re-Submitted';}
				elseif($row['item_rev_status']==4 && $row['item_rev_ss_status']==4 && $row['item_rev_ae_status']==3)
				{$status ='Re-Rejected';}
				elseif($row['item_rev_status']==2 && $row['item_rev_ss_status']==3 && $row['item_rev_ae_status']==0)
				{$status ='Re-Submitted by IR';}
				
				if($row['item_type']=='ERQ')
				{
					if($row['item_rev_ss_status']==4 && ($row['item_rev_ae_status']==0 || $row['item_rev_ae_status']==4))
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
						//$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ss_aview_erq_crq_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
						//$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ss_view_erq_crq_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
				else
				{
					if($row['item_rev_ss_status']==4 && ($row['item_rev_ae_status']==0 || $row['item_rev_ae_status']==4))
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
						//$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_aview_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
					else
					{
						$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
						//$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_view_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
					}
				}
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ae_resubmitted($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_resubmitted($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				$status ='';
				if($row['item_rev_ae_status']==0&&$row['item_rev_ss_status']==4)
				{$status ='Pending';}
				elseif($row['item_rev_ae_status']==4&&$row['item_rev_ss_status']==4)
				{$status ='Re-Accepted';}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					if($row['item_rev_ae_status']==4)
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_aview_erq_crq_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_view_erq_crq_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				}
				else
				{
					if($row['item_rev_ae_status']==4)
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_aview_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
					else
					{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_view_resubmitted/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				}*/
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev_ss($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_edited($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona_rev_ss($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_accepted($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$status='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				if($row['item_rev_ss_status'] == 2)
				{
					$status='Reviewed';
				}
				/*if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ss_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ss_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				//($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_ae_pitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_eitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aitems()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ae_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_revised_items()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_revised_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev_ae($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_pending($subjectList);
		}
		else
		{
			die('You are not authorized');	
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				$status ='';
				if($row['item_rev_ae_status'] == 0)
				{$status='Pending';}
				else
				{$status='Reviewed';}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					 $editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				//($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				//(html_entity_decode(substr($row['item_stem_en'],0,30))!="")?html_entity_decode(substr($row['item_stem_en'],0,30)):"",
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				'<span class="urdufont-right">'.((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):'').'</span>',
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev_ae($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_edited($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				$status ='';
				if($row['item_rev_ae_status'] == 1)
				{
					$status='Under Review';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona_rev_ae($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_accepted($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id') == 4)
			{
				$editoption ='';
				$status='';
				if($row['item_rev_ss_status'] == 2)
				{
					$status='Reviewed';
				}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				
				/*if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				//($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				'<span class="urdufont-right">'.((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):'').'</span>',
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ae_revised($id = 0)
	{
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_revised($subjectList);
		}
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				$status='';
				//if($row['item_rev_ae_status'] == 3){$status='Reviewed';}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_ae_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_ae_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Go Back');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				//($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				'<span class="urdufont-right">'.((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):'').'</span>',
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_ae_status']==3)?"Rejected":"",
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_psy_pitems()
	{
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_all_subjects();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_pitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_eitems()
	{
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_all_subjects();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_eitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_aitems()
	{
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_all_subjects();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_aitems_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsonp_rev_psy($id = 0)
	{
		$records =[];
		$records = $this->Items_model->get_all_rev_pitems_psy();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
				$editoption ='';
				$status ='';
				if($row['item_rev_psy_status'] == 0)
				{
					$status='Pending';
				}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_psy_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_psy_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['appusername'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsone_rev_psy($id = 0)
	{
		$records =[];
		$records = $this->Items_model->get_all_rev_eitems_psy();
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
				$editoption ='';
				$status ='';
				if($row['item_rev_psy_status'] == 1)
				{
					$status='Under Review';
				}
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_psy_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_psy_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['appusername'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona_rev_psy($id = 0)
	{
		$records =[];
		$records = $this->Items_model->get_all_rev_aitems_psy();
		$data = array();
		$i=0;
		
		foreach ($records['data']  as $row) 
		{  
				$editoption ='';
				$status='';
				if($row['item_rev_psy_status'] == 2)
				{
					$status='Reviewed';
				}
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="'.base_url('admin/items/rev_psy_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/rev_psy_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['appusername'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
			$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_status)&&$data['items'][0]->item_rev_status==2)
		{$this->load->view('admin/items/rev_aitems_view', $data);}
		else
		{$this->load->view('admin/items/rev_items_view', $data);}
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_view_revise($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_items_view_revise', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
			$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_status)&&$data['items'][0]->item_rev_status==2)
		{$this->load->view('admin/items/rev_aitems_view_erq_crq', $data);}
		else
		{$this->load->view('admin/items/rev_items_view_erq_crq', $data);}
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_view_erq_crq_revise($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_status)&&$data['items'][0]->item_rev_status==2)
		{$this->load->view('admin/items/rev_aitems_view_erq_crq_revise', $data);}
		else
		{$this->load->view('admin/items/rev_items_view_erq_crq_revise', $data);}
		$this->load->view('admin/includes/_footer');
	}
	public function rev_aview($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_aview_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_aitems_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view($id = 0)
	{
		$data['title'] = 'View Item Filmz';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_status)&&$data['items'][0]->item_rev_ss_status==2)
		{$this->load->view('admin/items/rev_ss_aitems_view', $data);}
		else
		{$this->load->view('admin/items/rev_ss_items_view', $data);}
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view_revise($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_items_view_revise', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmz';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_items_view_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view_erq_crq_revise($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_items_view_erq_crq_revise', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view_erq_crq_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_items_view_erq_crq_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function rev_ss_aview($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_aitems_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aview_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_aitems_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aview_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_aitems_view_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aview_erq_crq_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ss_aitems_view_erq_crq_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function rev_ae_view_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmz';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_items_view_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_view_erq_crq_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_items_view_erq_crq_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aview_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_view_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aview_erq_crq_resubmitted($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_view_erq_crq_resubmitted', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		/*if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}*/
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_ae_status)&&$data['items'][0]->item_rev_ae_status==2)
		{$this->load->view('admin/items/rev_ae_aitems_view', $data);}
		else
		{$this->load->view('admin/items/rev_ae_items_view', $data);}
		//$this->load->view('admin/items/rev_ae_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		/*if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}*/
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		if(isset($data['items'][0]->item_rev_ae_status)&&$data['items'][0]->item_rev_ae_status==2)
		{$this->load->view('admin/items/rev_ae_aitems_view_erq_crq', $data);}
		else
		{$this->load->view('admin/items/rev_ae_items_view_erq_crq', $data);}
		//$this->load->view('admin/items/rev_ae_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aview($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$data['rev_psy'] = $this->Items_model->get_rev_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		$data['rev_logs'] = $this->Items_model->get_item_logs($id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aview_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_accp_rev_item_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_ae_aitems_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$data['rev_psy'] = $this->Items_model->get_rev_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$data['rev_psy'] = $this->Items_model->get_rev_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_aview($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$data['rev_psy'] = $this->Items_model->get_rev_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_aitems_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_aview_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['ss'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
		$data['ae'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psy'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		$data['rev_ss'] = $this->Items_model->get_rev_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
		$data['rev_ae'] = $this->Items_model->get_rev_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
		$data['rev_psy'] = $this->Items_model->get_rev_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/rev_psy_aitems_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==6)
		{
			if($this->input->post('submit'))
			{
				$result_rev = $this->Items_model->find_rev_item_by_id($id);
				if(empty($result_rev))
				{
					$data['items'] = $this->Items_model->get_rev_item_by_id($id);
					$data = array(
								'item_id' => $data['items'][0]->item_id,
								'item_code' => $data['items'][0]->item_code,
								'item_difficulty' => $data['items'][0]->item_difficulty,
								'item_discr' => $data['items'][0]->item_discr,
								'item_dif_code' => $data['items'][0]->item_dif_code,
								'item_registration' => $data['items'][0]->item_registration,
								'item_date_received' => $data['items'][0]->item_date_received,
								'item_submitted' => $data['items'][0]->item_submitted,
								'item_submittedby' => $data['items'][0]->item_submittedby,
								'item_updated' => $data['items'][0]->item_updated,
								'item_updatedby' => $data['items'][0]->item_updatedby,
								'item_grade_id' => $data['items'][0]->item_grade_id,
								'item_subject_id' => $data['items'][0]->item_subject_id,
								'item_cstand_id' => $data['items'][0]->item_cstand_id,
								'item_subcstand_id' => $data['items'][0]->item_subcstand_id,
								'item_slo_id' => $data['items'][0]->item_slo_id,
								'item_cognitive_bloom' => $data['items'][0]->item_cognitive_bloom,
								'item_curriculum' => $data['items'][0]->item_curriculum,
								'item_pctb_chapter' => $data['items'][0]->item_pctb_chapter,
								'item_pctb_page' => $data['items'][0]->item_pctb_page,
								'item_other_title' => $data['items'][0]->item_other_title,
								'item_other_year' => $data['items'][0]->item_other_year,
								'item_other_page' => $data['items'][0]->item_other_page,
								'item_relation' => $data['items'][0]->item_relation,
								'item_type' => $data['items'][0]->item_type,
								'item_stem_number' => $data['items'][0]->item_stem_number,
								'item_stem_en' => $data['items'][0]->item_stem_en,
								'item_stem_ur' => $data['items'][0]->item_stem_ur,
								'item_image_en' => $data['items'][0]->item_image_en,
								'item_image_ur' => $data['items'][0]->item_image_ur,
								'item_image_position' => $data['items'][0]->item_image_position,
								'item_option_layout' => $data['items'][0]->item_option_layout,
								'item_option_a_en' => $data['items'][0]->item_option_a_en,
								'item_option_a_ur' => $data['items'][0]->item_option_a_ur,
								'item_option_a_image' => $data['items'][0]->item_option_a_image,
								'item_option_b_en' => $data['items'][0]->item_option_b_en,
								'item_option_b_ur' => $data['items'][0]->item_option_b_ur,
								'item_option_b_image' => $data['items'][0]->item_option_b_image,
								'item_option_c_en' => $data['items'][0]->item_option_c_en,
								'item_option_c_ur' => $data['items'][0]->item_option_c_ur,
								'item_option_c_image' => $data['items'][0]->item_option_c_image,
								'item_option_d_en' => $data['items'][0]->item_option_d_en,
								'item_option_d_ur' => $data['items'][0]->item_option_d_ur,
								'item_option_d_image' => $data['items'][0]->item_option_d_image,
								'item_option_correct' => $data['items'][0]->item_option_correct,
								'item_sort' => $data['items'][0]->item_sort,
								'item_status' => $data['items'][0]->item_status,
								'item_approved' => $data['items'][0]->item_approved,
								'item_approvedby' => $data['items'][0]->item_approvedby,
								'item_reviewed' => $data['items'][0]->item_reviewed,
								'item_reviewedby' => $data['items'][0]->item_reviewedby,
								'item_rubric_english' => $data['items'][0]->item_rubric_english,
								'item_rubric_urdu' => $data['items'][0]->item_rubric_urdu,
								'item_rubric_image_position' => $data['items'][0]->item_rubric_image_position,
								'item_rubric_image' => $data['items'][0]->item_rubric_image,
								'item_status_ss' => $data['items'][0]->item_status_ss,
								'item_comment_ss' => $data['items'][0]->item_comment_ss,
								'item_status_ae' => $data['items'][0]->item_status_ae,
								'item_comment_ae' => $data['items'][0]->item_comment_ae,
								'item_status_psy' => $data['items'][0]->item_status_psy,
								'item_comment_psy' => $data['items'][0]->item_comment_psy,
								'item_date_psy' => $data['items'][0]->item_date_psy,
								'item_commentby_psy' => $data['items'][0]->item_commentby_psy,
								'item_batch' => $data['items'][0]->item_batch,
								);
					$data['item_rev_status'] = '2';
					$data['item_rev_revid'] = $this->session->userdata('admin_id');
					$data['item_rev_date_acc'] = date("Y-m-d H:i:s");
					$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
					$data['item_rev_comment'] = $this->input->post('item_rev_comment');
					$result = $this->Items_model->add_item_rev($data);
					if($result)
						{
							$result = $this->Items_model->update_item_exported('1', $id);
							$data = array(
								'log_itemid' => $id,
								'log_title' => 'Item reviewed by Item Reviewer',
								'log_message' => 'Item {{log_itemid}} reviewed by Item Reviewer {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'rev_submitted',
								'log_admin_id' => $this->session->userdata('admin_id'),
								'log_comment' =>$this->input->post('item_rev_comment')
							);
							$log = $this->Items_model->log_entry($data);
							$this->session->set_flashdata('success', 'Item has been aceepted for piloting successfully!');
							redirect(base_url('admin/items/rev_pitems'));
						}
					else
					{
						$this->session->set_flashdata('errors', 'Error in Revision of Items!!! Please contact AFAQ IT Team');
						redirect(base_url('admin/items/rev_pitems'),'refresh');
					}	
				}
				else
				{
					if($result_rev[0]->item_rev_revid==$this->session->userdata('admin_id'))
					{
						$data['item_rev_status'] = '2';
						$data['item_rev_date_acc'] = date("Y-m-d H:i:s");
						$data['item_rev_comment'] = $this->input->post('item_rev_comment');
						
						$result = $this->Items_model->rev_edit_items($data, $id);
						$log_messagetype='';
						if($this->session->userdata('role_id')==6)
						{$log_messagetype='rev_updated';}
						else
						{$log_messagetype='updated';}
						
						if($result){
							$data = array(
								'log_itemid' => $id,
								'log_admin_id' => $this->session->userdata('admin_id'),
								'log_title' => 'Item Updated by IR',
								'log_message' => 'Item updated {{log_itemid}} by IR {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>$log_messagetype,
								'log_comment' =>$this->input->post('item_rev_comment')
							);
							$log = $this->Items_model->log_entry($data);
							$this->session->set_flashdata('success', 'Item has been updated successfully!');
							if($this->session->userdata('role_id')==6)
							{
								redirect(base_url('admin/items/rev_pitems'));
							}
							else
							{
								redirect(base_url('admin/items/rev_pitems'));
							}
						}
					
					}
					else
					{
						die('Alert! This item already assigned to other iten reviewer');
					}
					
				}				
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_submit_for_approval_revise($id=0)
	{
		if($this->session->userdata('role_id')==6)
		{
			if($this->input->post('submit'))
			{
				$result_rev = $this->Items_model->find_rev_item_by_id($id);
				if($result_rev[0]->item_rev_revid==$this->session->userdata('admin_id'))
				{
					$item_rev_comment = $this->input->post('item_rev_comment');
					$data['item_rev_status'] = '4';
					$data['item_rev_ss_status'] = '0';
					$data['item_rev_ae_status'] = '0';
					$data['item_rev_date_acc'] = date("Y-m-d H:i:s");
					$data['item_rev_comment'] = $item_rev_comment;
					$data['item_rev_ss_comment'] = "";
					$data['item_rev_ae_comment'] = "";
					
					$result = $this->Items_model->rev_edit_items($data, $id);
					$log_messagetype='';
					if($this->session->userdata('role_id')==6)
					{$log_messagetype='rev_ir_submitted_revise';}
					else
					{$log_messagetype='updated';}
					
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'Revised Item re-submitted by IR',
							'log_message' => 'Item updated {{log_itemid}} by IR {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
							'log_comment' =>$item_rev_comment
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item has been Re-submitted successfully!');
						if($this->session->userdata('role_id')==6)
						{
							redirect(base_url('admin/items/rev_ir_revised_items'));
						}
						else
						{
							redirect(base_url('admin/auth/logout'));
						}
					}
				}
				else
				{
					die('Alert! This item already assigned to other iten reviewer');
				}
			}
		}
		else
		{
			die('Alert 605! You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_ss_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$data['item_rev_ss_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ss_status'] = '2';
				$data['item_rev_ss_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ss_comment'] = $this->input->post('item_rev_ss_comment');
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Submitted by SS (2nd Cycle)',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$this->input->post('item_rev_ss_comment')
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/rev_ss_pitems'));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
			elseif($this->input->post('reject'))
			{
				$item_rev_ss_comment ='';
				$item_rev_ae_status ='';
				$item_rev_ss_comment = $this->input->post('item_rev_ss_comment');
				$item_rev_ae_status = $this->input->post('item_rev_ae_status');
				$data['item_rev_status'] = '3';
				$data['item_rev_ss_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ss_status'] = '3';
				$data['item_rev_ss_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ss_comment'] = $item_rev_ss_comment;
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_rejected';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Reject/Revised by SS',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$item_rev_ss_comment
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been Rejected!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/rev_ss_pitems'));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function ss_submit_for_discard($id=0)
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('discard_ss'))
			{
				$item_discard_comment ='';
				$item_discard_comment = $this->input->post('item_discard_comment');
				$data['item_discard_status'] = '1';
                $data['item_status'] = '3';
				$data['item_discard_ss_id'] = $this->session->userdata('admin_id');
				$data['item_discard_comment'] = $item_discard_comment;
				$data['item_discard'] = date("Y-m-d H:i:s");
				
				$result = $this->Items_model->edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_discarded';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Discarded by SS',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$item_discard_comment
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been Discarded!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/ss_rejected_items'));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_ss_submit_for_approval_resubmitted($id=0)
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$item_rev_ss_comment ='';
				$item_rev_ss_comment=$this->input->post('item_rev_ss_comment');
				$data['item_rev_ss_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ss_status'] = '4';
				$data['item_rev_ae_status'] = '0';
				$data['item_rev_ss_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ss_comment'] = $item_rev_ss_comment;
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_submitted_resubmitted';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Resubmitted item accepted by SS',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$item_rev_ss_comment
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/rev_ss_resubmitted_items'));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
			elseif($this->input->post('reject'))
			{
				$item_rev_ss_comment ='';
				$item_rev_ss_comment = $this->input->post('item_rev_ss_comment');
				
				$data['item_rev_status'] = '3';
				$data['item_rev_ss_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ss_status'] = '3';
				$data['item_rev_ss_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ss_comment'] = $item_rev_ss_comment;
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_rejected_resubmitted';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Resubmitted item rejected/revised by SS',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$item_rev_ss_comment
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been Rejected again!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/rev_ss_resubmitted_items'));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_ae_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==4)
		{
			if($this->input->post('submit'))
			{
				$log_messagetype='';
				$rdt_sms = '';
				$data['item_rev_ae_id'] = $this->session->userdata('admin_id');
				if($data['item_rev_ss_status'] == 2)
				{
					$data['item_rev_ae_status'] = '2';
					$log_messagetype='rev_ae_accepted';
					$rdt_sms = 'Item has been accepted successfully!';
				}
				elseif($data['item_rev_ss_status'] == 4)
				{
					$data['item_rev_ae_status'] = '4';
					$log_messagetype='rev_ae_submitted_resubmitted';
					$rdt_sms = 'Item has been re-accepted successfully!';
				}
				$data['item_rev_ae_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ae_comment'] = $this->input->post('item_rev_ae_comment');
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				//$log_messagetype='';
				
				/*if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated';}
				else
				{$log_messagetype='updated';}*/
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item accepted by AE (2nd Cycle)',
						'log_message' => 'Item accepted {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$this->input->post('item_rev_ae_comment')
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', $rdt_sms);
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/rev_ae_pitems'));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
			elseif($this->input->post('reject'))
			{
				$item_rev_ae_comment='';
				$item_rev_ae_comment = $this->input->post('item_rev_ae_comment');
				//$data['item_rev_ss_status'] = '3';
				$data['item_rev_ae_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ae_status'] = '3';
				$data['item_rev_ae_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ae_comment'] = $item_rev_ae_comment;
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_rejected';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item rejected by AE (2dn Cycle)',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment'=>$item_rev_ae_comment
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been Rejected!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/rev_ae_pitems'));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_ae_submit_for_approval_resubmitted($id=0)
	{
		if($this->session->userdata('role_id')==4)
		{
			if($this->input->post('submit'))
			{
				$item_rev_ae_comment ='';
				$item_rev_ae_comment=$this->input->post('item_rev_ae_comment');
				$data['item_rev_ae_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ae_status'] = '4';
				$data['item_rev_ae_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ae_comment'] = $item_rev_ae_comment;
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_submitted_resubmitted';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Resubmitted item accepted by AE',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$item_rev_ae_comment
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/rev_ae_resubmitted_items'));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
			elseif($this->input->post('reject'))
			{
				$item_rev_ae_comment ='';
				$item_rev_ae_comment = $this->input->post('item_rev_ae_comment');
				
				//$data['item_rev_status'] = '3';
				$data['item_rev_ae_id'] = $this->session->userdata('admin_id');
				$data['item_rev_ae_status'] = '3';
				$data['item_rev_ae_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_ae_comment'] = $item_rev_ae_comment;
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_rejected_resubmitted';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Resubmitted item rejected/revised by AE',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$item_rev_ae_comment
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been Rejected again!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/rev_ae_resubmitted_items'));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_psy_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==5)
		{
			if($this->input->post('submit'))
			{
				$data['item_rev_psy_id'] = $this->session->userdata('admin_id');
				$data['item_rev_psy_status'] = '2';
				$data['item_rev_psy_date_acc'] = date("Y-m-d H:i:s");
				$data['item_rev_psy_comment'] = $this->input->post('item_rev_psy_comment');
			
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==5)
				{$log_messagetype='rev_psy_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item reviewed by PSY (2nd Cycle)',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment' =>$this->input->post('item_rev_psy_comment')
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					redirect(base_url('admin/items/rev_psy_pitems'));
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_eitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('item_submittedby') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_ss_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' && $this->input->post('item_reviewedby') == '')
			{
				redirect(base_url('admin/items/rev_ss_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['item_reviewedby'] = $this->input->post('item_reviewedby');
				$data['itemreviewers'] = $this->Items_model->get_ss_itemreviewers($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_ss_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_ae_psy_ritems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' && $this->input->post('item_rev_psy_status') == '')
			{
				redirect(base_url('admin/items/rev_ae_aitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['item_rev_psy_status'] = $this->input->post('item_rev_psy_status');
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_ae_aitems_list', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_ss_ungroup_items_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' && $this->input->post('item_reviewedby') == '')
			{
				redirect(base_url('admin/items/rev_ss_ungroup_items'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['item_writers'] = $this->input->post('item_writers');
				//$data['itemreviewers'] = $this->Items_model->get_ss_itemreviewers($_SESSION['admin_id']);
				$data['itemwriters'] = $this->Items_model->get_iw_by_subject($data['search_subject']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_ss_ungroup_items_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_ae_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_ae_pitems'));
			}
			else
			{
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_subjects($subjectList);
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_ae_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_psy_pitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_psy_pitems'));
			}
			else
			{
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_psy_subjects();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_psy_pitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function rev_psy_aitems_search()
	{
		if($this->input->post('submit_search'))
		{		
			if($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '')
			{
				redirect(base_url('admin/items/rev_psy_aitems'));
			}
			else
			{
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				//$data['itemwriters'] = $this->Items_model->get_ss_itemwriters($_SESSION['admin_id']);
				$data['grades'] = $this->Items_model->get_search_grade();
				$data['subjects'] = $this->Items_model->get_rev_psy_subjects();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_psy_aitems_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function datatable_json_revp_searched($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_REV_searched($subjectList,$id);
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($this->session->userdata('role_id')==6)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*if($row['item_type']=='ERQ')
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}
				else
				{$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';}*/
			}
			else
			{
				die('Alert! You are not authorized to this action.');
			}
			$distName = '';
			$dist = $this->Items_model->get_iw_distname($row['item_submittedby']);
			if($dist)
				$distName = ' ('.$dist['district_name_en'].')';
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'].$distName,
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_revp_ss_searched($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ss_searched($subjectList,$id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			if($this->session->userdata('role_id')==2)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				/*
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}*/
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				//($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_ss_status']=='0')?'Pending':'Under Review',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_rev_ae_psy_searched($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_psy_searched($subjectList,$id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				//($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):''),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_ae_status']=='0')?'Pending':'Reviewed',
				//($row['item_rev_psy_status']=='0')?'Pending':'Reviewed',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_revp_ae_searched($id = 0)
	{	
		$records =[];
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Items_model->get_all_items_rev_ae_searched($subjectList,$id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			if($this->session->userdata('role_id')==4)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				//($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				(html_entity_decode($row['item_stem_en'])!="")?html_entity_decode($row['item_stem_en']):"",
				'<span class="urdufont-right">'.((isset($row['item_stem_ur'])&&$row['item_stem_ur']!='')?html_entity_decode($row['item_stem_ur']):'').'</span>',
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_ae_status']=='0')?'Pending':'Under Review',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_revp_psy_searched($id = 0)
	{		
		$records =[];
		if($this->session->userdata('role_id')==5)
		{
			$records = $this->Items_model->get_all_items_rev_psy_searched($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			if($this->session->userdata('role_id')==5)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_psy_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_psy_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_psy_status']=='0')?'Pending':'Under Review',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsona_rev_psy_searched($id = 0)
	{		
		$records =[];
		if($this->session->userdata('role_id')==5)
		{
			$records = $this->Items_model->get_all_aitems_rev_psy_searched($id);//get_all_items_rev_psy_searched
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//$status = ($row['item_status'] == 1)? 'checked': '';
			if($this->session->userdata('role_id')==5)
			{
				$editoption ='';
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_psy_aview_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_psy_aview/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				die('Alert! You are not authorized to do this action.');
			}
			$data[]= array(
				++$i,
				/*$row['item_batch'],*/
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				($row['item_rev_psy_status']=='2')?'Reviewed':'Under Review',
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function rev_edit($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by IR',
						'log_message' => 'Item updated {{log_itemid}} by IR {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==6)
					{
						redirect(base_url('admin/items/rev_view/'.$id));
					}
					else
					{
						redirect(base_url('admin/items/rev_pitems'));
					}
				}
			}
		}
		else
		{
			$result_rev = $this->Items_model->find_rev_item_by_id($id);
			if(empty($result_rev))
			{
				$data['items'] = $this->Items_model->get_rev_item_by_id($id);
				$data = array(
						'item_id' => $data['items'][0]->item_id,
						'item_code' => $data['items'][0]->item_code,
						'item_difficulty' => $data['items'][0]->item_difficulty,
						'item_discr' => $data['items'][0]->item_discr,
						'item_dif_code' => $data['items'][0]->item_dif_code,
						'item_registration' => $data['items'][0]->item_registration,
						'item_date_received' => $data['items'][0]->item_date_received,
						'item_submitted' => $data['items'][0]->item_submitted,
						'item_submittedby' => $data['items'][0]->item_submittedby,
						'item_updated' => $data['items'][0]->item_updated,
						'item_updatedby' => $data['items'][0]->item_updatedby,
						'item_grade_id' => $data['items'][0]->item_grade_id,
						'item_subject_id' => $data['items'][0]->item_subject_id,
						'item_cstand_id' => $data['items'][0]->item_cstand_id,
						'item_subcstand_id' => $data['items'][0]->item_subcstand_id,
						'item_slo_id' => $data['items'][0]->item_slo_id,
						'item_cognitive_bloom' => $data['items'][0]->item_cognitive_bloom,
						'item_curriculum' => $data['items'][0]->item_curriculum,
						'item_pctb_chapter' => $data['items'][0]->item_pctb_chapter,
						'item_pctb_page' => $data['items'][0]->item_pctb_page,
						'item_other_title' => $data['items'][0]->item_other_title,
						'item_other_year' => $data['items'][0]->item_other_year,
						'item_other_page' => $data['items'][0]->item_other_page,
						'item_relation' => $data['items'][0]->item_relation,
						'item_type' => $data['items'][0]->item_type,
						'item_stem_number' => $data['items'][0]->item_stem_number,
						'item_stem_en' => $data['items'][0]->item_stem_en,
						'item_stem_ur' => $data['items'][0]->item_stem_ur,
						'item_image_en' => $data['items'][0]->item_image_en,
						'item_image_ur' => $data['items'][0]->item_image_ur,
						'item_image_position' => $data['items'][0]->item_image_position,
						'item_option_layout' => $data['items'][0]->item_option_layout,
						'item_option_a_en' => $data['items'][0]->item_option_a_en,
						'item_option_a_ur' => $data['items'][0]->item_option_a_ur,
						'item_option_a_image' => $data['items'][0]->item_option_a_image,
						'item_option_b_en' => $data['items'][0]->item_option_b_en,
						'item_option_b_ur' => $data['items'][0]->item_option_b_ur,
						'item_option_b_image' => $data['items'][0]->item_option_b_image,
						'item_option_c_en' => $data['items'][0]->item_option_c_en,
						'item_option_c_ur' => $data['items'][0]->item_option_c_ur,
						'item_option_c_image' => $data['items'][0]->item_option_c_image,
						'item_option_d_en' => $data['items'][0]->item_option_d_en,
						'item_option_d_ur' => $data['items'][0]->item_option_d_ur,
						'item_option_d_image' => $data['items'][0]->item_option_d_image,
						'item_option_correct' => $data['items'][0]->item_option_correct,
						'item_sort' => $data['items'][0]->item_sort,
						'item_status' => $data['items'][0]->item_status,
						'item_approved' => $data['items'][0]->item_approved,
						'item_approvedby' => $data['items'][0]->item_approvedby,
						'item_reviewed' => $data['items'][0]->item_reviewed,
						'item_reviewedby' => $data['items'][0]->item_reviewedby,
						'item_rubric_english' => $data['items'][0]->item_rubric_english,
						'item_rubric_urdu' => $data['items'][0]->item_rubric_urdu,
						'item_rubric_image_position' => $data['items'][0]->item_rubric_image_position,
						'item_rubric_image' => $data['items'][0]->item_rubric_image,
						'item_status_ss' => $data['items'][0]->item_status_ss,
						'item_comment_ss' => $data['items'][0]->item_comment_ss,
						'item_status_ae' => $data['items'][0]->item_status_ae,
						'item_comment_ae' => $data['items'][0]->item_comment_ae,
						'item_status_psy' => $data['items'][0]->item_status_psy,
						'item_comment_psy' => $data['items'][0]->item_comment_psy,
						'item_date_psy' => $data['items'][0]->item_date_psy,
						'item_commentby_psy' => $data['items'][0]->item_commentby_psy,
						'item_batch' => $data['items'][0]->item_batch
						);
				$data['item_rev_status'] = '1';
				$data['item_rev_revid'] = $this->session->userdata('admin_id');
				$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				
				$result = $this->Items_model->add_item_rev($data);
				if($result)
				{
					$result = $this->Items_model->update_item_exported('1',$id);
					/*
					log entry karain on exported but not submitted
					*/
				}
				$data['title'] = 'Edit Item (Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else
			{
				$data['title'] = 'Edit Item (Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6 && $this->session->userdata('admin_id') == $data['item'][0]['item_rev_revid'])
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized! This item is assigned to other reviewer!');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}
	
	public function rev_edit_revise($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_items_edit_revise';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_revise'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_revise'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_revise'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_revise'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_revise'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_revise'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated_revise';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Revised/Rejected item updated by IR',
						'log_message' => 'Item updated {{log_itemid}} by IR {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==6)
					{
						redirect(base_url('admin/items/rev_view_revise/'.$id));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item (Reviewer)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==6 && $this->session->userdata('admin_id') == $data['item'][0]['item_rev_revid'])
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized! This item is assigned to other reviewer!');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_items_edit_revise', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_edit_erq_crq($id = 0)
	{
		//die('Under development');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Updated by IR',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IR {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							redirect(base_url('admin/items/rev_view_erq_crq/'.$id));
						}
						else
						{
							redirect(base_url('admin/items/rev_pitems'));
						}
					}
				}
			}
		}
		else
		{
			$result_rev = $this->Items_model->find_rev_item_by_id($id);
			if(empty($result_rev))
			{
				$data['items'] = $this->Items_model->get_rev_item_by_id($id);
				$data = array(
						'item_id' => $data['items'][0]->item_id,
						'item_code' => $data['items'][0]->item_code,
						'item_difficulty' => $data['items'][0]->item_difficulty,
						'item_discr' => $data['items'][0]->item_discr,
						'item_dif_code' => $data['items'][0]->item_dif_code,
						'item_registration' => $data['items'][0]->item_registration,
						'item_date_received' => $data['items'][0]->item_date_received,
						'item_submitted' => $data['items'][0]->item_submitted,
						'item_submittedby' => $data['items'][0]->item_submittedby,
						'item_updated' => $data['items'][0]->item_updated,
						'item_updatedby' => $data['items'][0]->item_updatedby,
						'item_grade_id' => $data['items'][0]->item_grade_id,
						'item_subject_id' => $data['items'][0]->item_subject_id,
						'item_cstand_id' => $data['items'][0]->item_cstand_id,
						'item_subcstand_id' => $data['items'][0]->item_subcstand_id,
						'item_slo_id' => $data['items'][0]->item_slo_id,
						'item_cognitive_bloom' => $data['items'][0]->item_cognitive_bloom,
						'item_curriculum' => $data['items'][0]->item_curriculum,
						'item_pctb_chapter' => $data['items'][0]->item_pctb_chapter,
						'item_pctb_page' => $data['items'][0]->item_pctb_page,
						'item_other_title' => $data['items'][0]->item_other_title,
						'item_other_year' => $data['items'][0]->item_other_year,
						'item_other_page' => $data['items'][0]->item_other_page,
						'item_relation' => $data['items'][0]->item_relation,
						'item_type' => $data['items'][0]->item_type,
						'item_stem_number' => $data['items'][0]->item_stem_number,
						'item_stem_en' => $data['items'][0]->item_stem_en,
						'item_stem_ur' => $data['items'][0]->item_stem_ur,
						'item_image_en' => $data['items'][0]->item_image_en,
						'item_image_ur' => $data['items'][0]->item_image_ur,
						'item_image_position' => $data['items'][0]->item_image_position,
						'item_option_layout' => $data['items'][0]->item_option_layout,
						'item_option_a_en' => $data['items'][0]->item_option_a_en,
						'item_option_a_ur' => $data['items'][0]->item_option_a_ur,
						'item_option_a_image' => $data['items'][0]->item_option_a_image,
						'item_option_b_en' => $data['items'][0]->item_option_b_en,
						'item_option_b_ur' => $data['items'][0]->item_option_b_ur,
						'item_option_b_image' => $data['items'][0]->item_option_b_image,
						'item_option_c_en' => $data['items'][0]->item_option_c_en,
						'item_option_c_ur' => $data['items'][0]->item_option_c_ur,
						'item_option_c_image' => $data['items'][0]->item_option_c_image,
						'item_option_d_en' => $data['items'][0]->item_option_d_en,
						'item_option_d_ur' => $data['items'][0]->item_option_d_ur,
						'item_option_d_image' => $data['items'][0]->item_option_d_image,
						'item_option_correct' => $data['items'][0]->item_option_correct,
						'item_sort' => $data['items'][0]->item_sort,
						'item_status' => $data['items'][0]->item_status,
						'item_approved' => $data['items'][0]->item_approved,
						'item_approvedby' => $data['items'][0]->item_approvedby,
						'item_reviewed' => $data['items'][0]->item_reviewed,
						'item_reviewedby' => $data['items'][0]->item_reviewedby,
						'item_rubric_english' => $data['items'][0]->item_rubric_english,
						'item_rubric_urdu' => $data['items'][0]->item_rubric_urdu,
						'item_rubric_image_position' => $data['items'][0]->item_rubric_image_position,
						'item_rubric_image' => $data['items'][0]->item_rubric_image,
						'item_status_ss' => $data['items'][0]->item_status_ss,
						'item_comment_ss' => $data['items'][0]->item_comment_ss,
						'item_status_ae' => $data['items'][0]->item_status_ae,
						'item_comment_ae' => $data['items'][0]->item_comment_ae,
						'item_status_psy' => $data['items'][0]->item_status_psy,
						'item_comment_psy' => $data['items'][0]->item_comment_psy,
						'item_date_psy' => $data['items'][0]->item_date_psy,
						'item_commentby_psy' => $data['items'][0]->item_commentby_psy,
						'item_batch' => $data['items'][0]->item_batch,
						);
				$data['item_rev_status'] = '1';
				$data['item_rev_revid'] = $this->session->userdata('admin_id');
				$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				
				$result = $this->Items_model->add_item_rev($data);
				if($result)
				{
					$result = $this->Items_model->update_item_exported('1',$id);
				}
				/////////////////////////////////////////////////
				$data['title'] = 'Edit ERQ/CRQ Item';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_erq_crq_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else
			{
				$data['title'] = 'Edit ERQ/CRQ Item (Item Reviewer)';
				$data['item'] = $this->Items_model->get_rev_items_by_id($id);
				$data['item'][0] = (array) $data['item'][0];
				$data['grades'] = $this->Items_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
				}		
				else
				{
					die('You are not authorized');
				}
				$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
				$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
				$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/items/rev_erq_crq_items_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}
	
	public function rev_edit_erq_crq_revise($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_erq_crq_items_edit_revise';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_erq_crq_revise/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_erq_crq_revise/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_edit_erq_crq_revise/'.$id), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated_revise';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Revised/Rejected Item Updated by IR',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by IR {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							redirect(base_url('admin/items/rev_view_erq_crq_revise/'.$id));
						}
						else
						{
							redirect(base_url('admin/auth/logout'));
						}
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit ERQ/CRQ Item (Item Reviewer)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==6)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_erq_crq_items_edit_revise', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ss_edit($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$item_rev_ae_status='';
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ss_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$item_rev_ae_status = $this->input->post('item_rev_ae_status');
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by SS (2nd Cycle)',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						if($item_rev_ae_status==3)
						{redirect(base_url('admin/items/rev_ss_view_revise/'.$id));}
						else
						{redirect(base_url('admin/items/rev_ss_view/'.$id));}
					}
					else
					{
						redirect(base_url('admin/items/rev_ss_pitems'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item (SS)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized! This item is assigned to other reviewer!');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ss_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ss_edit_erq_crq($id = 0)
	{
		if($this->input->post('submit'))
		{
			$item_rev_ae_status ='';
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}				
				$item_rev_ae_status = $this->input->post('item_rev_ae_status');
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
				);
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/ditems'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_updated';}
				elseif($this->session->userdata('role_id')==6)
				{$log_messagetype='rev_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Item Updated by SS (2nd Cyclle)',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==2)
						{
							if($item_rev_ae_status==3)
							{redirect(base_url('admin/items/rev_ss_view_erq_crq_revise/'.$id));}
							else
							{redirect(base_url('admin/items/rev_ss_view_erq_crq/'.$id));}
						}
						else
						{
							redirect(base_url('admin/items/rev_pitems'));
						}
					}
				}
			}
		}
		else{
			$data['title'] = 'Edit ERQ/CRQ Item (SS)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ss_erq_crq_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		
		}
	}
	
	public function rev_ss_edit_resubmitted($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ss_edit_resubmitted';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_resubmitted/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_updated_resubmitted';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Resubmitted Item Updated by SS',
						'log_message' => 'Item updated {{log_itemid}} by SS {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Resubmitted Item has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/items/rev_ss_view_resubmitted/'.$id));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item (SS)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized! This item is assigned to other reviewer!');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ss_items_edit_resubmitted', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ss_edit_erq_crq_resubmitted($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ss_edit_erq_crq_resubmitted';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
				);
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ss_edit_erq_crq_resubmitted/'.$id), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_updated_resubmitted';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'Resubmitted ERQ/CRQ Updated by SS',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==2)
						{
							redirect(base_url('admin/items/rev_ss_view_erq_crq_resubmitted/'.$id));
						}
						else
						{
							redirect(base_url('admin/auth/logout'));
						}
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit ERQ/CRQ Item (SS)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ss_erq_crq_items_edit_resubmitted', $data);
			$this->load->view('admin/includes/_footer');
		
		}
	}
	
	public function rev_ae_edit_resubmitted($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ae_edit_resubmitted';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_resubmitted/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated_resubmitted';}
				else
				{$log_messagetype='updated';}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by AE (2nd Cycle)',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Resubmitted Item has been updated successfully!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/items/rev_ae_view_resubmitted/'.$id));
					}
					else
					{
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item (AE)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized! This item is assigned to other reviewer!');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ae_items_edit_resubmitted', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ae_edit_erq_crq_resubmitted($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ae_edit_erq_crq_resubmitted';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
				);
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_erq_crq_resubmitted/'.$id), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated_resubmitted';}
				else
				{$log_messagetype='updated';}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'Resubmitted ERQ/CRQ Updated by AE',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==4)
						{
							redirect(base_url('admin/items/rev_ae_view_erq_crq_resubmitted/'.$id));
						}
						else
						{
							redirect(base_url('admin/auth/logout'));
						}
					}
				}
			}
		}
		else{
			$data['title'] = 'Edit ERQ/CRQ Item (AE)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				die('You are not authorized');
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ae_erq_crq_items_edit_resubmitted', $data);
			$this->load->view('admin/includes/_footer');
		
		}
	}
	
	public function rev_ae_edit($id = 0)
	{
		if($this->input->post('submit'))
		{			
			$item_rev_ae_comment_log='';
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
			//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
			$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				die('Alert! Form validation run false');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ae_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_option_a_en = $this->input->post('item_option_a_en');
				$item_option_a_ur = $this->input->post('item_option_a_ur');
				$item_option_b_en = $this->input->post('item_option_b_en');
				$item_option_b_ur = $this->input->post('item_option_b_ur');
				$item_option_c_en = $this->input->post('item_option_c_en');
				$item_option_c_ur = $this->input->post('item_option_c_ur');
				$item_option_d_en = $this->input->post('item_option_d_en');
				$item_option_d_ur = $this->input->post('item_option_d_ur');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_option_a_en, $keyword) !== false ||
				   strpos($item_option_a_ur, $keyword) !== false ||
				   strpos($item_option_b_en, $keyword) !== false ||
				   strpos($item_option_b_ur, $keyword) !== false ||
				   strpos($item_option_c_en, $keyword) !== false ||
				   strpos($item_option_c_ur, $keyword) !== false ||
				   strpos($item_option_d_en, $keyword) !== false ||
				   strpos($item_option_d_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
				}
				$item_rev_ae_status=$this->input->post('item_rev_ae_status');
				$item_rev_ae_comment_log=$this->input->post('item_rev_ae_comment_log');
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_updatedby' => $this->session->userdata('admin_id'),	
					'item_updated' => date( 'Y-m-d h:i:s' ),						
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_option_layout' => $this->input->post('item_option_layout'),
					'item_option_a_en' => $this->input->post('item_option_a_en'),
					'item_option_a_ur' => $this->input->post('item_option_a_ur'),
					'item_option_b_en' => $this->input->post('item_option_b_en'),
					'item_option_b_ur' => $this->input->post('item_option_b_ur'),
					'item_option_c_en' => $this->input->post('item_option_c_en'),
					'item_option_c_ur' => $this->input->post('item_option_c_ur'),
					'item_option_d_en' => $this->input->post('item_option_d_en'),
					'item_option_d_ur' => $this->input->post('item_option_d_ur'),
					'item_option_correct' => $this->input->post('item_option_correct')					
				);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_a_image = $this->input->post('item_option_a_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_a_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_a_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_b_image = $this->input->post('item_option_b_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_b_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_b_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_c_image = $this->input->post('item_option_c_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_c_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_c_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit/'.$id), 'refresh');
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_option_d_image = $this->input->post('item_option_d_image');
				$path="assets/img/";
				if(!empty($_FILES['item_option_d_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_option_d_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit/'.$id), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{	
					if($item_rev_ae_status==2)
					{$log_messagetype='rev_ae_acc_updated';}
					else
					{$log_messagetype='rev_ae_updated';}
				}
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Item Updated by AE',
						'log_message' => 'Item updated {{log_itemid}} by AE {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_comment'=>$item_rev_ae_comment_log
					);
					$log = $this->Items_model->log_entry($data);
					$this->session->set_flashdata('success', 'Item has been updated successfully!');
					if($this->session->userdata('role_id')==4)
					{
						if($item_rev_ae_status==2)
						{redirect(base_url('admin/items/rev_ae_aview/'.$id));}
						else
						{redirect(base_url('admin/items/rev_ae_view/'.$id));}
					}
					else
					{
						$this->session->set_flashdata('error', 'You are not authorized!');
						redirect(base_url('admin/auth/logout'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item (AE)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				$this->session->set_flashdata('error', 'You are not authorized!');
				redirect(base_url('admin/auth/logout'));
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ae_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ae_edit_erq_crq($id = 0)
	{
		if($this->input->post('submit'))
		{
			$item_rev_ae_comment_log='';
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
			//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
			//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
			//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
			//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
			$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
			$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
			$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
			//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
			$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
			$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
			//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');	
			
			if ($this->form_validation->run() == FALSE)
			{
				die('Alert! Form validation run wrong');
				$data['items'] = $this->Items_model->get_items_by_id($id);
				$data['view'] = 'admin/items/rev_ae_erq_crq_items_edit';
				$this->load->view('layout', $data);
			}
			else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				$item_rev_ae_status=$this->input->post('item_rev_ae_status');
				$item_rev_ae_comment_log=$this->input->post('item_rev_ae_comment_log');				
				$data = array(
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => 'ERQ',
					//'item_registration' =>$this->input->post('item_registration'),
				);
				//$data['item_rev_status'] = '0';
				//$data['item_rev_revid'] = $this->session->userdata('admin_id');
				//$data['item_rev_date_exp'] = date("Y-m-d H:i:s");
				//$data['item_rev_comment'] = $this->input->post('item_rev_comment');
				////////////////////////////////////////////////////////////////////////////
				$item_image_en = $this->input->post('item_image_en');
				$path="assets/img/";
				if(!empty($_FILES['item_image_en']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_en'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_erq_crq/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_image_ur = $this->input->post('item_image_ur');
				$path="assets/img/";
				if(!empty($_FILES['item_image_ur']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_image_ur'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_erq_crq/'.$id), 'refresh');
					}
				}
				////////////////////////////////////////////////////////////////////////////
				$item_rubric_image = $this->input->post('item_rubric_image');
				$path="assets/img/";
				if(!empty($_FILES['item_rubric_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
					if($result['status'] == 1){
						$data['item_rubric_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/items/rev_ae_edit_erq_crq/'.$id), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////////////
				$result = $this->Items_model->rev_edit_items($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{
					if($item_rev_ae_status==2)
					{$log_messagetype='rev_ae_acc_updated';}
					else
					{$log_messagetype='rev_ae_updated';}
				}
				
				if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'ERQ/CRQ Updated AE',
							'log_message' => 'ERQ/CRQ Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
							'log_comment'=>$item_rev_ae_comment_log
						);
						$log = $this->Items_model->log_entry($data);
					if($result){
						$this->session->set_flashdata('success', 'ERQ/CRQ Item has been updated successfully!');
						if($this->session->userdata('role_id')==4)
						{
							if($item_rev_ae_status==2)
							{redirect(base_url('admin/items/rev_ae_aview_erq_crq/'.$id));}
							else
							{redirect(base_url('admin/items/rev_ae_view_erq_crq/'.$id));}
						}
						else
						{
							$this->session->set_flashdata('error', 'You are not authorized!');
								redirect(base_url('admin/auth/logout'));
						}
					}
				}
			}
		}
		else{
			$data['title'] = 'Edit ERQ/CRQ Item (AE)';
			$data['item'] = $this->Items_model->get_rev_items_by_id($id);
			$data['item'][0] = (array) $data['item'][0];
			$data['grades'] = $this->Items_model->get_all_grades();
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Items_model->get_rev_subjects_grade($subjectList,$data['item'][0]['item_grade_id']);
			}		
			else
			{
				$this->session->set_flashdata('error', 'You are not authorized!');
				redirect(base_url('admin/auth/logout'));
			}
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item'][0]['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item'][0]['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item'][0]['item_subcstand_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_ae_erq_crq_items_edit', $data);
			$this->load->view('admin/includes/_footer');
		
		}
	}
	
	public function check_item_discard_status($id=0)
	{
		return $result_rev = $this->Items_model->check_item_discard_status($id);
	}
	public function create_flimzy_pdf()
	{
		ini_set("pcre.backtrack_limit", "5000000");
		$grade_id 		= $this->input->get('grade_id');
		$subject_id 	= $this->input->get('subject_id');
		$phase_id 		= $this->input->get('phase_id');
		
		$data['all_items'] = $this->Items_model->get_flimzy_items_for_export($grade_id, $subject_id, $phase_id);
		$mpdf = new \Mpdf\Mpdf();
		//$html = $this->load->view('admin/downloads/downloads_flimzy_pdf',$data,true);
		
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];
		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		$mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		 'fontDir' => array_merge($fontDirs, [ base_url('admin\assets\fonts')]),
		'fontdata' => $fontData + [
			'urdufont' => [
				'R' => 'NotoNastaliqUrdu-Regular.ttf',
				'I' => 'NotoNastaliqUrdu-Regular.ttf',
			]
		],
		'default_font' => 'verdana']);
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		$mpdf->SetAuthor("PEC IT TEAM");
		$mpdf->SetTitle("Flimzy List");
		$mpdf->watermark_font = 'RAFIQ-IT-TEAM';
		$mpdf->WriteHTML($this->load->view('admin/items/rev_psy_flimzy_pdf',$data,true));
		//$mpdf->Output(); 
		$filename = 'Flimzy_list';
		$mpdf->Output($filename . '.pdf', 'D');
		
		//$mpdf->Output('Flimzy_list.pdf', 'D');
		//$this->load->view('admin/downloads/downloads_flimzy_pdf', $data);
	}
    /************************************************************************
    *           Duplicate Plygrisam check function in item
    **************************************************************************/
    public function find_duplication($grade,$subject,$stem){
        //$WHERE = 'WHERE 1=1 ';
        //echo $stem;
        $SQL = " SELECT strip_tags(item_stem_en) AS item_stem_en FROM ci_items
                WHERE item_grade_id=".$grade." AND item_subject_id=".$subject;
        //$WHERE .=' AND strip_tags(item_stem_en) LIKE "%'.strip_tags($stem).'%"';
        //$SQL= $SQL.$WHERE;
        $query = $this->db->query($SQL);
        $result = $query->result_array();
        $pg_count=0;
        foreach($result as $row){
          
            //die('here');
           $pg_count = round(($this->smithwaterman->compare(strtolower(strip_tags($stem)),strtolower($row['item_stem_en'])) * 100),0);
            if($pg_count>90){
               //echo $stem.' and '.$row['item_stem_en']."<br>";
               //echo $pg_count.' '.$row['item_stem_en'];
               return $pg_count;
            }
        }
         return $pg_count;
        
    }
    
    /************************** END of duplicate check************************/
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function add_combine()
	{
		//if($this->session->userdata('admin_id')==1541){ die('You are not allowd to add items! Please contact AFAQ IT Team!!! [reason: virus attack!]');}
		if($this->input->post('submit'))
		{
			$item_type = $this->input->post('item_type');
			if($item_type=='ERQ')
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('erq_crq_add');
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en_erq');
				$item_stem_ur = $this->input->post('item_stem_ur_erq');
				$item_rubric_english = $this->input->post('item_rubric_english_erq');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu_erq');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				//date('Y-m-d H:i:s'),
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					////'item_difficulty' => $this->input->post('item_difficulty'),
					////'item_discr' => $this->input->post('item_discr'),
					////'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					////'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					////'item_relation' => $this->input->post('item_relation'),
					////'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en_erq'),
					'item_stem_ur' => $this->input->post('item_stem_ur_erq'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english_erq'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu_erq'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					////'item_registration' =>$this->input->post('item_registration'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_submitted' => date('Y-m-d H:i:s'),
					//'item_batch' => 0,//not required
					//'' => 0,//not required
					'item_lang' => $this->input->post('item_lang')
				);
				
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					//die($this->db->last_query());
					$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='MCQ')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en_mcq');
					$item_stem_ur = $this->input->post('item_stem_ur_mcq');
					$item_option_a_en = $this->input->post('item_option_a_en');
					$item_option_a_ur = $this->input->post('item_option_a_ur');
					$item_option_b_en = $this->input->post('item_option_b_en');
					$item_option_b_ur = $this->input->post('item_option_b_ur');
					$item_option_c_en = $this->input->post('item_option_c_en');
					$item_option_c_ur = $this->input->post('item_option_c_ur');
					$item_option_d_en = $this->input->post('item_option_d_en');
					$item_option_d_ur = $this->input->post('item_option_d_ur');
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($item_option_a_en, $keyword) !== false ||
					strpos($item_option_a_ur, $keyword) !== false ||
					strpos($item_option_b_en, $keyword) !== false ||
					strpos($item_option_b_ur, $keyword) !== false ||
					strpos($item_option_c_en, $keyword) !== false ||
					strpos($item_option_c_ur, $keyword) !== false ||
					strpos($item_option_d_en, $keyword) !== false ||
					strpos($item_option_d_ur, $keyword) !== false
					)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_type' => $this->input->post('item_type'),
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_date_received' => $this->input->post('item_date_received'),
						'item_code' => $this->input->post('item_code'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),
						'item_lang' => $this->input->post('item_lang'),

						'item_image_position' => $this->input->post('item_image_position'),
						'item_option_layout' => $this->input->post('item_option_layout'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_mcq'),
						'item_option_a_en' => $this->input->post('item_option_a_en'),
						'item_option_b_en' => $this->input->post('item_option_b_en'),
						'item_option_c_en' => $this->input->post('item_option_c_en'),
						'item_option_d_en' => $this->input->post('item_option_d_en'),

						'item_stem_ur' => $this->input->post('item_stem_ur_mcq'),
						'item_option_a_ur' => $this->input->post('item_option_a_ur'),
						'item_option_b_ur' => $this->input->post('item_option_b_ur'),
						'item_option_c_ur' => $this->input->post('item_option_c_ur'),
						'item_option_d_ur' => $this->input->post('item_option_d_ur'),
						
						'item_option_correct' => $this->input->post('item_option_correct'),
					);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_option_a_image = $this->input->post('item_option_a_image');
						$path="assets/img/";
						if(!empty($_FILES['item_option_a_image']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_a_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_option_a_image_ur = $this->input->post('item_option_a_image_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_option_a_image_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_a_image_ur', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_a_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}					
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				if($this->input->post('item_lang')=='eng'){
					$item_option_b_image = $this->input->post('item_option_b_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_b_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_b_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}else{
					$item_option_b_image_ur = $this->input->post('item_option_b_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_option_b_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_b_image_ur', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_b_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				if($this->input->post('item_lang')=='eng'){
					$item_option_c_image = $this->input->post('item_option_c_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_c_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_c_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}else{
					$item_option_c_image_ur = $this->input->post('item_option_c_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_option_c_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_c_image_ur', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_c_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				if($this->input->post('item_lang')=='eng'){
					$item_option_c_image = $this->input->post('item_option_d_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_d_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_d_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}else{
					$item_option_c_image_ur = $this->input->post('item_option_d_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_option_d_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_d_image_ur', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_d_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='FIB')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_fib_key_eng = $this->input->post('item_fib_key_eng');
					$item_fib_key_ur = $this->input->post('item_fib_key_ur');
					
					if(strpos($item_fib_key_eng, $keyword) !== false || strpos($item_fib_key_ur, $keyword) !== false )
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_type' => $this->input->post('item_type'),
						'item_lang' => $this->input->post('item_lang'),
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_date_received' => $this->input->post('item_date_received'),	
						'item_code' => $this->input->post('item_code'),
										
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),	
											
						'item_curriculum' => $this->input->post('item_curriculum'),
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_fib'),
						'item_stem_ur' => $this->input->post('item_stem_ur_fib'),
						'item_image_position' => $this->input->post('item_image_position'),
						'item_fib_key_eng' => $this->input->post('item_fib_key_eng'),
						'item_fib_key_ur' => $this->input->post('item_fib_key_ur'),
						
						
						////'item_difficulty' => $this->input->post('item_difficulty'),
						////'item_discr' => $this->input->post('item_discr'),
						////'item_dif_code' => $this->input->post('item_dif_code'),
						////'item_registration' =>$this->input->post('item_registration'),
						////'item_slo_id' => $this->input->post('item_slo_id'),
						////'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						////'item_pctb_page' => $this->input->post('item_pctb_page'),
						////'item_other_title' => $this->input->post('item_other_title'),
						////'item_other_year' => $this->input->post('item_other_year'),
						////'item_other_page' => $this->input->post('item_other_page'),
						////'item_relation' => $this->input->post('item_relation'),
						////'item_stem_number' => $this->input->post('item_stem_number'),
						////'item_batch' => $this->input->post('item_batch'),
						////'' => $this->input->post('')
					);
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='TF')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_tf_eng_1 = $this->input->post('item_tf_eng_1');
					$item_tf_ur_1 = $this->input->post('item_tf_ur_1');
					$item_tf_eng_2 = $this->input->post('item_tf_eng_2');
					$item_tf_ur_2 = $this->input->post('item_tf_ur_2');
										
					if(strpos($item_tf_eng_1, $keyword) !== false || strpos($item_tf_ur_1, $keyword) !== false || strpos($item_tf_eng_2, $keyword) !== false || strpos($item_tf_ur_2, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						////'item_difficulty' => $this->input->post('item_difficulty'),
						////'item_discr' => $this->input->post('item_discr'),
						////'item_dif_code' => $this->input->post('item_dif_code'),
						////'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						////'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						////'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						////'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						////'item_other_title' => $this->input->post('item_other_title'),
						////'item_other_year' => $this->input->post('item_other_year'),
						////'item_other_page' => $this->input->post('item_other_page'),
					
						////'item_relation' => $this->input->post('item_relation'),
						////'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_tf'),
						'item_stem_ur' => $this->input->post('item_stem_ur_tf'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_tf_eng_1' => $this->input->post('item_tf_eng_1'),
						'item_tf_ur_1' => $this->input->post('item_tf_ur_1'),
						'item_tf_eng_2' => $this->input->post('item_tf_eng_2'),
						'item_tf_ur_2' => $this->input->post('item_tf_ur_2'),
						'item_option_correct' => $this->input->post('item_option_correct'),
						'item_type' => $this->input->post('item_type'),
						//'item_batch' => $this->input->post('item_batch'),
						'item_lang' => $this->input->post('item_lang'),
						////'' => $this->input->post('')
					);
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en_tf = $this->input->post('item_image_en_tf');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en_tf']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en_tf', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='MC')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					
					$item_stem_en = $this->input->post('item_stem_en_mc');
					$item_stem_ur = $this->input->post('item_stem_ur_mc');
					$item_rubric_english_mc = $this->input->post('item_rubric_english_mc');
					$item_rubric_urdu_mc = $this->input->post('item_rubric_urdu_mc');
					
					
					if(strpos($item_stem_en_mc, $keyword) !== false || strpos($item_stem_ur_mc, $keyword) !== false || strpos($item_rubric_english_mc, $keyword) !== false || strpos($item_rubric_urdu_mc, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_type' => $this->input->post('item_type'),
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_date_received' => $this->input->post('item_date_received'),
						'item_code' => $this->input->post('item_code'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),
						'item_lang' => $this->input->post('item_lang'),
						'item_stem_en' =>$this->input->post('item_stem_en_mc'),
						'item_stem_ur' => $this->input->post('item_stem_ur_mc'),
						'item_image_position' => $this->input->post('item_image_position'),
						'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
						'item_rubric_english' =>$this->input->post('item_rubric_english_mc'),
						'item_rubric_urdu' => $this->input->post('item_rubric_urdu_mc')
					);
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur_mc = $this->input->post('item_image_ur_mc');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur_mc']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur_mc', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//item_rubric_image_mc
					$item_rubric_image_mc = $this->input->post('item_rubric_image_mc');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image_mc']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image_mc', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//echo '<pre>';
					//print_r($data);
					//die();
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='LBL')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');				
							
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en_lbl');
				$item_stem_ur = $this->input->post('item_stem_ur_lbl');
				$item_rubric_english = $this->input->post('item_rubric_english_lbl');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu_lbl');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				//date('Y-m-d H:i:s'),
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en_lbl'),
					'item_stem_ur' => $this->input->post('item_stem_ur_lbl'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english_lbl'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu_lbl'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_submitted' => date('Y-m-d H:i:s'),
					'item_lang' => $this->input->post('item_lang'),
					//'item_batch' => $this->input->post('item_batch'),
					////'' => $this->input->post(''),
					'item_lbl_option_a_en' => $this->input->post('item_lbl_option_a_en'),
					'item_lbl_option_b_en' => $this->input->post('item_lbl_option_b_en'),
					'item_lbl_option_c_en' => $this->input->post('item_lbl_option_c_en'),
					'item_lbl_option_d_en' => $this->input->post('item_lbl_option_d_en'),
					'item_lbl_option_a_ur' => $this->input->post('item_lbl_option_a_ur'),
					'item_lbl_option_b_ur' => $this->input->post('item_lbl_option_b_ur'),
					'item_lbl_option_c_ur' => $this->input->post('item_lbl_option_c_ur'),
					'item_lbl_option_d_ur' => $this->input->post('item_lbl_option_d_ur')
				);
				
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_rubric_image_lbl = $this->input->post('item_rubric_image_lbl');
						$path="assets/img/";
						if(!empty($_FILES['item_rubric_image_lbl']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_rubric_image_lbl', 'image', '9097152');
							if($result['status'] == 1){
								$data['item_rubric_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_rubric_image_lbl_ur = $this->input->post('item_rubric_image_lbl_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_rubric_image_lbl_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_rubric_image_lbl_ur', 'image', '9097152');
							if($result['status'] == 1){
								$data['item_rubric_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					//die($this->db->last_query());
					$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='PG')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en_pg');
					$item_stem_ur = $this->input->post('item_stem_ur_pg');
					
					$para_item_en_21 = $this->input->post('para_item_en_21');
					$para_item_en_22 = $this->input->post('para_item_en_22');
					$para_item_en_23 = $this->input->post('para_item_en_23');
					$para_item_en_24 = $this->input->post('para_item_en_24');
					$para_item_en_25 = $this->input->post('para_item_en_25');
					
					$para_item_ur_21 = $this->input->post('para_item_ur_21');
					$para_item_ur_22 = $this->input->post('para_item_ur_22');
					$para_item_ur_23 = $this->input->post('para_item_ur_23');
					$para_item_ur_24 = $this->input->post('para_item_ur_24');
					$para_item_ur_25 = $this->input->post('para_item_ur_25');
					
					$ans_para_item_en_21 = $this->input->post('ans_para_item_en_21');
					$ans_para_item_en_22 = $this->input->post('ans_para_item_en_22');
					$ans_para_item_en_23 = $this->input->post('ans_para_item_en_23');
					$ans_para_item_en_24 = $this->input->post('ans_para_item_en_24');
					$ans_para_item_en_25 = $this->input->post('ans_para_item_en_25');
					
					$ans_para_item_ur_21 = $this->input->post('ans_para_item_ur_21');
					$ans_para_item_ur_22 = $this->input->post('ans_para_item_ur_22');
					$ans_para_item_ur_23 = $this->input->post('ans_para_item_ur_23');
					$ans_para_item_ur_24 = $this->input->post('ans_para_item_ur_24');
					$ans_para_item_ur_25 = $this->input->post('ans_para_item_ur_25');
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($para_item_en_21, $keyword) !== false ||
					strpos($para_item_en_22, $keyword) !== false ||
					strpos($para_item_en_23, $keyword) !== false ||
					strpos($para_item_en_24, $keyword) !== false ||
					strpos($para_item_en_25, $keyword) !== false ||
					strpos($para_item_ur_21, $keyword) !== false ||
					strpos($para_item_ur_22, $keyword) !== false ||
					strpos($para_item_ur_23, $keyword) !== false ||
					strpos($para_item_ur_24, $keyword) !== false ||
					strpos($para_item_ur_25, $keyword) !== false ||
					strpos($ans_para_item_en_21, $keyword) !== false ||
					strpos($ans_para_item_en_22, $keyword) !== false ||
					strpos($ans_para_item_en_23, $keyword) !== false ||
					strpos($ans_para_item_en_24, $keyword) !== false ||
					strpos($ans_para_item_en_25, $keyword) !== false ||
					strpos($ans_para_item_ur_21, $keyword) !== false ||
					strpos($ans_para_item_ur_22, $keyword) !== false ||
					strpos($ans_para_item_ur_23, $keyword) !== false ||
					strpos($ans_para_item_ur_24, $keyword) !== false ||
					strpos($ans_para_item_ur_25, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
					
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_pg'),
						'item_stem_ur' => $this->input->post('item_stem_ur_pg'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_option_layout' => $this->input->post('item_option_layout'),
						'para_item_en_21' => $this->input->post('para_item_en_21'),
						'para_item_en_22' => $this->input->post('para_item_en_22'),
						'para_item_en_23' => $this->input->post('para_item_en_23'),
						'para_item_en_24' => $this->input->post('para_item_en_24'),
						'para_item_en_25' => $this->input->post('para_item_en_25'),
						'para_item_ur_21' => $this->input->post('para_item_ur_21'),
						'para_item_ur_22' => $this->input->post('para_item_ur_22'),
						'para_item_ur_23' => $this->input->post('para_item_ur_23'),
						'para_item_ur_24' => $this->input->post('para_item_ur_24'),
						'para_item_ur_25' => $this->input->post('para_item_ur_25'),
						
						'ans_para_item_en_21' => $this->input->post('ans_para_item_en_21'),
						'ans_para_item_en_22' => $this->input->post('ans_para_item_en_22'),
						'ans_para_item_en_23' => $this->input->post('ans_para_item_en_23'),
						'ans_para_item_en_24' => $this->input->post('ans_para_item_en_24'),
						'ans_para_item_en_25' => $this->input->post('ans_para_item_en_25'),
						'ans_para_item_ur_21' => $this->input->post('ans_para_item_ur_21'),
						'ans_para_item_ur_22' => $this->input->post('ans_para_item_ur_22'),
						'ans_para_item_ur_23' => $this->input->post('ans_para_item_ur_23'),
						'ans_para_item_ur_24' => $this->input->post('ans_para_item_ur_24'),
						'ans_para_item_ur_25' => $this->input->post('ans_para_item_ur_25'),
						'item_type' => $this->input->post('item_type'),
						'item_lang' => $this->input->post('item_lang'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
					);
					
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New Para item created',
							'log_message' => 'New Para item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Para Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='OR')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en_or');
					$item_stem_ur = $this->input->post('item_stem_ur_or');
					$item_rubric_english = $this->input->post('item_rubric_english_or');
					$item_rubric_urdu = $this->input->post('item_rubric_urdu_or');
					$question_type = $this->input->post('question_type');
					$item_rubric_image = $this->input->post('item_rubric_image');
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($item_rubric_english, $keyword) !== false ||
					strpos($item_rubric_urdu, $keyword) !== false ||
					strpos($question_type, $keyword) !== false ||
					strpos($item_rubric_image, $keyword) !== false
					)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
					
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_or'),
						'item_stem_ur' => $this->input->post('item_stem_ur_or'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_option_layout' => $this->input->post('item_option_layout'),
						'item_rubric_english' => $this->input->post('item_rubric_english_or'),
						'item_rubric_urdu' => $this->input->post('item_rubric_urdu_or'),
						'question_type' => $this->input->post('question_type'),
						'item_type' => $this->input->post('item_type'),
						'item_lang' => $this->input->post('item_lang'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
					);

				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur_or = $this->input->post('item_image_ur_or');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur_or']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur_or', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				if($this->input->post('item_lang')=='eng'){
					$item_rubric_image_or = $this->input->post('item_rubric_image_or');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image_or']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image_or', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}else{
					$item_rubric_image_or_ur = $this->input->post('item_rubric_image_or_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image_or_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image_or_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New Para item created',
							'log_message' => 'New Para item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Para Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='SQ')
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('erq_crq_add');
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en_sq');
				$item_stem_ur = $this->input->post('item_stem_ur_sq');
				$item_rubric_english = $this->input->post('item_rubric_english_sq');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu_erq');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				//date('Y-m-d H:i:s'),
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_stem_en' =>$this->input->post('item_stem_en_sq'),
					'item_stem_ur' => $this->input->post('item_stem_ur_sq'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english_sq'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu_sq'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_submitted' => date('Y-m-d H:i:s'),
					'item_lang' => $this->input->post('item_lang')
				);
				
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur_sq = $this->input->post('item_image_ur_sq');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur_sq']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur_sq', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_rubric_image = $this->input->post('item_rubric_image');
						$path="assets/img/";
						if(!empty($_FILES['item_rubric_image']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
							if($result['status'] == 1){
								$data['item_rubric_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_rubric_image_ur = $this->input->post('item_rubric_image_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_rubric_image_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_rubric_image_ur', 'image', '9097152');
							if($result['status'] == 1){
								$data['item_rubric_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					//die($this->db->last_query());
					$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
			elseif($item_type=='LQ')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en_lq');
				$item_stem_ur = $this->input->post('item_stem_ur_lq');
				$item_rubric_english = $this->input->post('item_rubric_english_lq');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu_lq');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_stem_en' =>$this->input->post('item_stem_en_lq'),
					'item_stem_ur' => $this->input->post('item_stem_ur_lq'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english_lq'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu_lq'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_submitted' => date('Y-m-d H:i:s'),
					'item_lang' => $this->input->post('item_lang')
				);
				
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_rubric_image_lq = $this->input->post('item_rubric_image_lq');
						$path="assets/img/";
						if(!empty($_FILES['item_rubric_image_lq']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_rubric_image_lq', 'image', '9097152');
							if($result['status'] == 1){
								$data['item_rubric_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_rubric_image_lq_ur = $this->input->post('item_rubric_image_lq_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_rubric_image_lq_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_rubric_image_lq_ur', 'image', '9097152');
							if($result['status'] == 1){
								$data['item_rubric_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->add_item($data);
					$this->session->set_userdata('form_data', $data);
					//die($this->db->last_query());
					$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						redirect(base_url('admin/items/add_combine'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Add Item';
			$data['grades'] = $this->Items_model->get_all_grades();
			$data['series'] = $this->Items_model->get_series();
			$data['boards'] = $this->Items_model->get_all_boards();
			$data['bloomtaxs'] = $this->Items_model->get_all_bloomtaxs();
			$data['difficultylevels'] = $this->Items_model->get_all_difficulty_levels();
			$data['sololevels'] = $this->Items_model->get_all_solo_levels();
			
			$data['cstands'] = $this->Items_model->get_all_cstands();
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/items_add_combine');
			$this->load->view('admin/includes/_footer');
		}	
	}
	
	public function get_item_history($id = 0)
	{
		$data['title'] = 'View Item History';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_history($id);//
		//$data['logs'] = $this->Items_model->get_item_logs($id);
		if(isset($data['items'])&&(!empty($data['items'])))
		{
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_approvedby);
			$data['aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_reviewedby);
			$data['psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_commentby_psy);
		}
		else
		{
			$data['items'] = '';
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_history_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function edit_combine($id=0)
	{
		if($this->input->post('submit'))
		{
			$item_type = $this->input->post('item_type');
			if($item_type=='ERQ')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_stem_en' =>$this->input->post('item_stem_en_erq'),
					'item_stem_ur' => $this->input->post('item_stem_ur_erq'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					'item_lang' => $this->input->post('item_lang')
				);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
							if($item['item_status']==2)
							{redirect(base_url('admin/items/sitems/'.$id));}
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/ss_pitems'));
							redirect(base_url('admin/items/ss_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/ae_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='MCQ')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
								
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en_mcq');
					$item_stem_ur = $this->input->post('item_stem_ur');
					$item_option_a_en = $this->input->post('item_option_a_en');
					$item_option_a_ur = $this->input->post('item_option_a_ur');
					$item_option_b_en = $this->input->post('item_option_b_en');
					$item_option_b_ur = $this->input->post('item_option_b_ur');
					$item_option_c_en = $this->input->post('item_option_c_en');
					$item_option_c_ur = $this->input->post('item_option_c_ur');
					$item_option_d_en = $this->input->post('item_option_d_en');
					$item_option_d_ur = $this->input->post('item_option_d_ur');
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($item_option_a_en, $keyword) !== false ||
					strpos($item_option_a_ur, $keyword) !== false ||
					strpos($item_option_b_en, $keyword) !== false ||
					strpos($item_option_b_ur, $keyword) !== false ||
					strpos($item_option_c_en, $keyword) !== false ||
					strpos($item_option_c_ur, $keyword) !== false ||
					strpos($item_option_d_en, $keyword) !== false ||
					strpos($item_option_d_ur, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						//'item_submittedby' => $this->session->userdata('admin_id'),							
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_mcq'),
						'item_stem_ur' => $this->input->post('item_stem_ur_mcq'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_option_layout' => $this->input->post('item_option_layout'),
						'item_option_a_en' => $this->input->post('item_option_a_en'),
						'item_option_a_ur' => $this->input->post('item_option_a_ur'),
						'item_option_b_en' => $this->input->post('item_option_b_en'),
						'item_option_b_ur' => $this->input->post('item_option_b_ur'),
						'item_option_c_en' => $this->input->post('item_option_c_en'),
						'item_option_c_ur' => $this->input->post('item_option_c_ur'),
						'item_option_d_en' => $this->input->post('item_option_d_en'),
						'item_option_d_ur' => $this->input->post('item_option_d_ur'),
						'item_type' => $this->input->post('item_type'),
						'item_lang' => $this->input->post('item_lang'),
						'item_option_correct' => $this->input->post('item_option_correct'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
					);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					$item_status = $this->input->post('item_status');
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_option_a_image = $this->input->post('item_option_a_image');
						$path="assets/img/";
						if(!empty($_FILES['item_option_a_image']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_a_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_option_a_image_ur = $this->input->post('item_option_a_image_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_option_a_image_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_a_image_ur', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_a_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}					
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_option_b_image = $this->input->post('item_option_b_image');
						$path="assets/img/";
						if(!empty($_FILES['item_option_b_image']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_b_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_option_b_image_ur = $this->input->post('item_option_b_image_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_option_b_image_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_b_image_ur', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_b_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_option_c_image = $this->input->post('item_option_c_image');
						$path="assets/img/";
						if(!empty($_FILES['item_option_c_image']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_c_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_option_c_image_ur = $this->input->post('item_option_c_image_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_option_c_image_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_c_image_ur', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_c_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					if($this->input->post('item_lang')=='eng'){
						$item_option_c_image = $this->input->post('item_option_d_image');
						$path="assets/img/";
						if(!empty($_FILES['item_option_d_image']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_d_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}else{
						$item_option_c_image_ur = $this->input->post('item_option_d_image_ur');
						$path="assets/img/";
						if(!empty($_FILES['item_option_d_image_ur']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_option_d_image_ur', 'image', '9097152');
							//print_r($result);
							//die();
							if($result['status'] == 1){
								$data['item_option_d_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					}
					///////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
                    
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
                    $log_message = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==1)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by Admin {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' => $updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/ss_pitems'));
							redirect(base_url('admin/items/ss_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/ae_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='FIB')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_fib_key_eng = $this->input->post('item_fib_key_eng');
					$item_fib_key_ur = $this->input->post('item_fib_key_ur');
					
					if(strpos($item_fib_key_eng, $keyword) !== false || strpos($item_fib_key_ur, $keyword) !== false )
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						//'item_submittedby' => $this->session->userdata('admin_id'),							
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_fib'),
						'item_stem_ur' => $this->input->post('item_stem_ur_fib'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_fib_key_eng' => $this->input->post('item_fib_key_eng'),
						'item_fib_key_ur' => $this->input->post('item_fib_key_ur'),
						'item_lang' => $this->input->post('item_lang'),
						'item_type' => $this->input->post('item_type')
					);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==1){
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by Admin {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/ss_pitems'));
							redirect(base_url('admin/items/ss_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/ae_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='TF')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_tf_eng_1 = $this->input->post('item_tf_eng_1');
					$item_tf_ur_1 = $this->input->post('item_tf_ur_1');
					$item_tf_eng_2 = $this->input->post('item_tf_eng_2');
					$item_tf_ur_2 = $this->input->post('item_tf_ur_2');
										
					if(strpos($item_tf_eng_1, $keyword) !== false || strpos($item_tf_ur_1, $keyword) !== false || strpos($item_tf_eng_2, $keyword) !== false || strpos($item_tf_ur_2, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						//'item_submittedby' => $this->session->userdata('admin_id'),							
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_tf'),
						'item_stem_ur' => $this->input->post('item_stem_ur_tf'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_tf_eng_1' => $this->input->post('item_tf_eng_1'),
						'item_tf_ur_1' => $this->input->post('item_tf_ur_1'),
						'item_tf_eng_2' => $this->input->post('item_tf_eng_2'),
						'item_tf_ur_2' => $this->input->post('item_tf_ur_2'),
						'item_option_correct' => $this->input->post('item_option_correct'),
						'item_lang' => $this->input->post('item_lang'),
						'item_type' => $this->input->post('item_type')
					);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//echo '<pre>';
					//print_r($data);
					//die();
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==1)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by Admin {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$updated,
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/ss_pitems'));
							redirect(base_url('admin/items/ss_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/ae_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='MC')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					
					$item_stem_en = $this->input->post('item_stem_en_mc');
					$item_stem_ur = $this->input->post('item_stem_ur_mc');
					$item_rubric_english_mc = $this->input->post('item_rubric_english_mc');
					$item_rubric_urdu_mc = $this->input->post('item_rubric_urdu_mc');
					
					
					if(strpos($item_stem_en_mc, $keyword) !== false || strpos($item_stem_ur_mc, $keyword) !== false || strpos($item_rubric_english_mc, $keyword) !== false || strpos($item_rubric_urdu_mc, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_type' => $this->input->post('item_type'),
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_date_received' => $this->input->post('item_date_received'),
						'item_code' => $this->input->post('item_code'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),
						'item_lang' => $this->input->post('item_lang'),
						'item_stem_en' =>$this->input->post('item_stem_en_mc'),
						'item_stem_ur' => $this->input->post('item_stem_ur_mc'),
						'item_rubric_english' =>$this->input->post('item_rubric_english_mc'),
						'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
						'item_rubric_urdu' => $this->input->post('item_rubric_urdu_mc'),
						'item_image_position' => $this->input->post('item_image_position')
					);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
//////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==1)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by Admin {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/ss_pitems'));
							redirect(base_url('admin/items/ss_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/ae_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='LBL')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');			
							
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en_lbl'),
					'item_stem_ur' => $this->input->post('item_stem_ur_lbl'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					//'item_registration' =>$this->input->post('item_registration'),
					//'item_batch' => $this->input->post('item_batch'),
					////'' => $this->input->post(''),
					'item_lbl_option_a_en' => $this->input->post('item_lbl_option_a_en'),
					'item_lbl_option_b_en' => $this->input->post('item_lbl_option_b_en'),
					'item_lbl_option_c_en' => $this->input->post('item_lbl_option_c_en'),
					'item_lbl_option_d_en' => $this->input->post('item_lbl_option_d_en'),
					'item_lbl_option_a_ur' => $this->input->post('item_lbl_option_a_ur'),
					'item_lbl_option_b_ur' => $this->input->post('item_lbl_option_b_ur'),
					'item_lbl_option_c_ur' => $this->input->post('item_lbl_option_c_ur'),
					'item_lbl_option_d_ur' => $this->input->post('item_lbl_option_d_ur'),
					'item_lang' => $this->input->post('item_lang')
				);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==1)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by Admin {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='PG')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en');
					$item_stem_ur = $this->input->post('item_stem_ur');
					
					$para_item_en_21 = $this->input->post('para_item_en_21');
					$para_item_en_22 = $this->input->post('para_item_en_22');
					$para_item_en_23 = $this->input->post('para_item_en_23');
					$para_item_en_24 = $this->input->post('para_item_en_24');
					$para_item_en_25 = $this->input->post('para_item_en_25');
					
					$para_item_ur_21 = $this->input->post('para_item_ur_21');
					$para_item_ur_22 = $this->input->post('para_item_ur_22');
					$para_item_ur_23 = $this->input->post('para_item_ur_23');
					$para_item_ur_24 = $this->input->post('para_item_ur_24');
					$para_item_ur_25 = $this->input->post('para_item_ur_25');
					
					$ans_para_item_en_21 = $this->input->post('ans_para_item_en_21');
					$ans_para_item_en_22 = $this->input->post('ans_para_item_en_22');
					$ans_para_item_en_23 = $this->input->post('ans_para_item_en_23');
					$ans_para_item_en_24 = $this->input->post('ans_para_item_en_24');
					$ans_para_item_en_25 = $this->input->post('ans_para_item_en_25');
					
					$ans_para_item_ur_21 = $this->input->post('ans_para_item_ur_21');
					$ans_para_item_ur_22 = $this->input->post('ans_para_item_ur_22');
					$ans_para_item_ur_23 = $this->input->post('ans_para_item_ur_23');
					$ans_para_item_ur_24 = $this->input->post('ans_para_item_ur_24');
					$ans_para_item_ur_25 = $this->input->post('ans_para_item_ur_25');
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($para_item_en_21, $keyword) !== false ||
					strpos($para_item_en_22, $keyword) !== false ||
					strpos($para_item_en_23, $keyword) !== false ||
					strpos($para_item_en_24, $keyword) !== false ||
					strpos($para_item_en_25, $keyword) !== false ||
					strpos($para_item_ur_21, $keyword) !== false ||
					strpos($para_item_ur_22, $keyword) !== false ||
					strpos($para_item_ur_23, $keyword) !== false ||
					strpos($para_item_ur_24, $keyword) !== false ||
					strpos($para_item_ur_25, $keyword) !== false ||
					strpos($ans_para_item_en_21, $keyword) !== false ||
					strpos($ans_para_item_en_22, $keyword) !== false ||
					strpos($ans_para_item_en_23, $keyword) !== false ||
					strpos($ans_para_item_en_24, $keyword) !== false ||
					strpos($ans_para_item_en_25, $keyword) !== false ||
					strpos($ans_para_item_ur_21, $keyword) !== false ||
					strpos($ans_para_item_ur_22, $keyword) !== false ||
					strpos($ans_para_item_ur_23, $keyword) !== false ||
					strpos($ans_para_item_ur_24, $keyword) !== false ||
					strpos($ans_para_item_ur_25, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
					
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_pg'),
						'item_stem_ur' => $this->input->post('item_stem_ur_pg'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_option_layout' => $this->input->post('item_option_layout'),
						'para_item_en_21' => $this->input->post('para_item_en_21'),
						'para_item_en_22' => $this->input->post('para_item_en_22'),
						'para_item_en_23' => $this->input->post('para_item_en_23'),
						'para_item_en_24' => $this->input->post('para_item_en_24'),
						'para_item_en_25' => $this->input->post('para_item_en_25'),
						'para_item_ur_21' => $this->input->post('para_item_ur_21'),
						'para_item_ur_22' => $this->input->post('para_item_ur_22'),
						'para_item_ur_23' => $this->input->post('para_item_ur_23'),
						'para_item_ur_24' => $this->input->post('para_item_ur_24'),
						'para_item_ur_25' => $this->input->post('para_item_ur_25'),
						
						'ans_para_item_en_21' => $this->input->post('ans_para_item_en_21'),
						'ans_para_item_en_22' => $this->input->post('ans_para_item_en_22'),
						'ans_para_item_en_23' => $this->input->post('ans_para_item_en_23'),
						'ans_para_item_en_24' => $this->input->post('ans_para_item_en_24'),
						'ans_para_item_en_25' => $this->input->post('ans_para_item_en_25'),
						'ans_para_item_ur_21' => $this->input->post('ans_para_item_ur_21'),
						'ans_para_item_ur_22' => $this->input->post('ans_para_item_ur_22'),
						'ans_para_item_ur_23' => $this->input->post('ans_para_item_ur_23'),
						'ans_para_item_ur_24' => $this->input->post('ans_para_item_ur_24'),
						'ans_para_item_ur_25' => $this->input->post('ans_para_item_ur_25'),
						
						'item_type' => $this->input->post('item_type'),
						'item_lang' => $this->input->post('item_lang'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
					);
					
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					// echo '<pre>';
					// print_r($data);
					// die();
					//$data = $this->security->xss_clean($data);
					/*$result = $this->Items_model->add_item($data);
					$insert_id = $this->db->insert_id();
					
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New Para item created',
							'log_message' => 'New Para item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						//$this->session->set_flashdata('success', 'Para Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						$this->session->set_flashdata('success', 'Para has been added successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}*/
					
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==1)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by Admin {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='OR')
			{
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en_or');
					$item_stem_ur = $this->input->post('item_stem_ur_or');
					
					$or_item_en = $this->input->post('or_item_en');
					$or_item_ur = $this->input->post('or_item_ur');
					$question_type = $this->input->post('question_type');
					
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($or_item_en, $keyword) !== false ||
					strpos($or_item_ur, $keyword) !== false ||
					strpos($question_type, $keyword) !== false
					)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_series_id' => $this->input->post('item_series_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
					
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en_or'),
						'item_stem_ur' => $this->input->post('item_stem_ur_or'),
						'item_image_position' => $this->input->post('item_image_position'),
						'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
						'item_option_layout' => $this->input->post('item_option_layout'),
						'item_rubric_english' => $this->input->post('item_rubric_english'),
						'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
						'question_type' => $this->input->post('question_type'),
						'item_type' => $this->input->post('item_type'),
						'item_lang' => $this->input->post('item_lang'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
					);
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New Para item created',
							'log_message' => 'New Para item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Para Item/Question has been added successfully!');
						//redirect(base_url('admin/items/ditems'));
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='SQ')
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('erq_crq_add');
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en_sq');
				$item_stem_ur = $this->input->post('item_stem_ur_sq');
				$item_rubric_english = $this->input->post('item_rubric_english_sq');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu_erq');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				//date('Y-m-d H:i:s'),
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_stem_en' =>$this->input->post('item_stem_en_sq'),
					'item_stem_ur' => $this->input->post('item_stem_ur_sq'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english_sq'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu_sq'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_submitted' => date('Y-m-d H:i:s'),
					'item_lang' => $this->input->post('item_lang')
				);
				
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					// echo '<pre>';
					// print_r($data);
					// die();
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==1)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by admin {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
			elseif($item_type=='LQ')
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('erq_crq_add');
				$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en_lq');
				$item_stem_ur = $this->input->post('item_stem_ur_lq');
				$item_rubric_english = $this->input->post('item_rubric_english_lq');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu_lq');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				//date('Y-m-d H:i:s'),
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_series_id' => $this->input->post('item_series_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					'item_stem_en' =>$this->input->post('item_stem_en_lq'),
					'item_stem_ur' => $this->input->post('item_stem_ur_lq'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english_lq'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu_lq'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_submitted' => date('Y-m-d H:i:s'),
					'item_lang' => $this->input->post('item_lang')
				);
				
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/edit_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
						$path="assets/img/";
						if(!empty($_FILES['item_rubric_image']['name']))
						{
							$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
							if($result['status'] == 1){
								$data['item_rubric_image'] = $path.$result['msg'];
							}
							else{
								$this->session->set_flashdata('error', $result['msg']);
								redirect(base_url('admin/items/add_combine'), 'refresh');
							}
						}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//echo '<pre>';
					//print_r($data);	
					//die();
					$result = $this->Items_model->edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					if($this->session->userdata('role_id')==3)
					{
						$updated = 'updated';
						$log_message = 'Item {{log_itemid}} updated by itemwriter {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==3)
						{
							//redirect(base_url('admin/items/ditems'));
							redirect(base_url('admin/items/view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==1)
						{
							//redirect(base_url('admin/items/ae_pitems'));
							redirect(base_url('admin/items/view_combine_app/'.$id));
						}
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item';
			$data['item'] = $this->Items_model->get_items_by_id($id);
			$data['grades'] = $this->Items_model->get_all_grades();
			$data['series'] = $this->Items_model->get_series();
			
			$subjectList = $this->session->userdata('subjects_ids');						
			$data['subjects'] = $this->Items_model->get_ae_subjects_grade($subjectList,$data['item']['item_grade_id']);
			//$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_subject($data['item']['item_subject_id']);
			//$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
			$data['boards'] = $this->Items_model->get_all_boards();
			$data['bloomtaxs'] = $this->Items_model->get_all_bloomtaxs();
			$data['cstands'] = $this->Items_model->get_all_cstands();
			//$data['difficultylevels'] = $this->Items_model->get_all_difficulty_levels();
			//$data['sololevels'] = $this->Items_model->get_all_solo_levels();
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/items_edit_combine');
			$this->load->view('admin/includes/_footer');
		}	
	}

	public function delete_image_combine($del_option = "")
	{
		$id =0;
		$data = [];
		$ans = explode('-',$del_option);
		$data[$ans[0]] = '';
		$id = $ans[1];
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		//die($this->db->last_query());
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/edit_combine/'.$id));
	}
    
    public function delete_image_rev_combine($del_option = "")
	{
		$id =0;
		$data = [];
		$ans = explode('-',$del_option);
		$data[$ans[0]] = '';
		$id = $ans[1];
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/items/rev_edit_combine/'.$id));
	}

	/*public function ($del_option = "")
	{
		//print_r($del_option);
		//die();
		$id =0;
		$data = [];
		$type = '';
		$ans = explode('-',$del_option);
		$data[$ans[0]] = '';
		$id = $ans[1];
		$type = $ans[2];
		$this->db->where('item_id', $id);        
		$this->db->update('ci_items', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		
		if($this->session->userdata('role_id')==3)
		{
			if($type=='ERQ')
			redirect(base_url('admin/items/edit_erq_crq/'.$id));
			elseif($type=='MCQ')
			redirect(base_url('admin/items/edit/'.$id));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			if($type=='ERQ')
			redirect(base_url('admin/items/edit_erq_crq/'.$id));
			elseif($type=='MCQ')
			redirect(base_url('admin/items/edit/'.$id));
		}		
		else
		{
			die('In process');
		}
	}*/
	public function view_combine($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
			$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_combine_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_combine_app($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
			$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		//echo '<pre>';
		//print_r($data);
		//die();
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_app_combine_view', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function ss_view_combine($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['iwinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_combine_ss_view', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function ae_view_combine($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['iwinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_combine_ae_view', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function psy_view_combine($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_by_id($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['iwinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_submittedby);
		$data['ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_approvedby);
		$data['aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_reviewedby);
		$data['psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_commentby_psy);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_combine_psy_view', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function submit_for_approval_his_log($id=0)
	{
		if($this->session->userdata('role_id') == 3)
		{
			$result = $this->Items_model->submit_for_approval($id);
			$copy_result = $this->Items_model->copy_item_history($id);
			$copy_id = $this->db->insert_id();
			
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => 'Item submitted by IW',
					'log_message' => 'Item {{log_itemid}} submitted by IW {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'submitted',
					'log_comment' =>''
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', 'Item has been submitted successfully!');
				redirect(base_url('admin/items/ditems'));
			}	
		}
		elseif($this->session->userdata('role_id') == 2)
		{
			$item_comment_ss = $this->input->post('item_comment_ss');
			$item_status ='';
			$item_status_ss ='';
			$log_messagetype='';
			$log_message ='';
			$log_title = '';
			$rdt_sms = '';

			if($this->input->post('submit'))
			{
				$item_status ='4';
				$item_status_ss ='2';
				$log_messagetype = 'ss_accept_w_c';
				$log_message ='Item {{log_itemid}} accepted by SS {{log_admin_id}} on {{log_date}}';
				$log_title = 'Item accepted by SS';
				$rdt_sms = 'Item accepted by SS';
			}
			elseif($this->input->post('reject')){
				$item_status ='3';
				$item_status_ss ='1';
				$log_messagetype = 'ss_rejected';
				$log_message ='Item {{log_itemid}} rejected by SS {{log_admin_id}} on {{log_date}}';
				$log_title = 'Item rejected by SS';
				$rdt_sms = 'Item rejected by SS';
			}
			$data = array(
					'item_approvedby' => $this->session->userdata('admin_id'),
					'item_approved' => date('Y-m-d H:i:s'),
					'item_comment_ss' => $this->input->post('item_comment_ss'),
					'item_status_ss' => $item_status_ss,
					'item_status' => $item_status
				);

			$result = $this->Items_model->ss_submit_for_approval($data,$id);
			$copy_result = $this->Items_model->copy_item_history($id);
			$copy_id = $this->db->insert_id();
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => $log_title,
					'log_message' => $log_message,
					'log_messagetype' => $log_messagetype,
					'log_comment' => $this->input->post('item_comment_ss')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', $rdt_sms);
				redirect(base_url('admin/items/ss_pitems'));
			}	
		}
		elseif($this->session->userdata('role_id') == 4)
		{
			$item_comment_ae = $this->input->post('item_comment_ae');
			$item_status ='';
			$item_status_ae ='';
			$log_messagetype='';
			$log_message ='';
			$log_title = '';
			$rdt_sms = '';

			if($this->input->post('submit'))
			{
				$data = array(
					'item_reviewedby' => $this->session->userdata('admin_id'),
					'item_reviewed' => date('Y-m-d H:i:s'),
					'item_comment_ae' => $item_comment_ae,
					'item_status_ae' => '1'
				);
				//$item_status ='4';
				//$item_status_ae ='1';
				$log_messagetype = 'ae_approved';
				$log_message ='Item {{log_itemid}} accepted by AE {{log_admin_id}} on {{log_date}}';
				$log_title = 'Item accepted by AE';
				$rdt_sms = 'Item has been submitted successfully';
			}
			elseif($this->input->post('reject'))
			{
				$data = array(
					'item_reviewedby' => $this->session->userdata('admin_id'),
					'item_reviewed' => date('Y-m-d H:i:s'),
					'item_comment_ae' => $item_comment_ae,
					'item_status' => '3',
					'item_status_ss' => '1',
					'item_status_ae' => '2'
				);
				//$item_status_ss ='1';
				//$item_status_ae ='2';
				$log_messagetype = 'ae_rejected';
				$log_message ='Item {{log_itemid}} rejected by AE {{log_admin_id}} on {{log_date}}';
				$log_title = 'Item rejected by AE';
				$rdt_sms = 'Item has been rejected successfully';
			}
			//echo '<pre>';
			//print_r($data);
			//die();
			$result = $this->Items_model->ae_submit_for_approval($data,$id);
			$copy_result = $this->Items_model->copy_item_history($id);
			$copy_id = $this->db->insert_id();
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => $log_title,
					'log_message' => $log_message,
					'log_messagetype' => $log_messagetype,
					'log_comment' => $this->input->post('item_comment_ae')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', $rdt_sms);
				redirect(base_url('admin/items/ae_pitems'));
			}	
		}
		elseif($this->session->userdata('role_id') == 5)
		{
			$item_comment_psy = $this->input->post('item_comment_psy');
			$item_status_psy ='';
			$log_messagetype='';
			$log_message ='';
			$log_title = '';
			$rdt_sms = '';

			if($this->input->post('submit'))
			{
				$data = array(
					'item_commentby_psy' => $this->session->userdata('admin_id'),
					'item_date_psy' => date('Y-m-d H:i:s'),
					'item_comment_psy' => $item_comment_psy,
					'item_status_psy' => '1'
				);
				$log_messagetype = 'psy_reviewed';
				$log_message ='Item {{log_itemid}} reviewed by PSM {{log_admin_id}} on {{log_date}}';
				$log_title = 'Item reviewed by PSM';
				$rdt_sms = 'Item has been reviewed successfully';
			}
			//echo '<pre>';
			//print_r($data);
			//die();
			$result = $this->Items_model->psy_submit_for_approval($data,$id);
			$copy_result = $this->Items_model->copy_item_history($id);
			$copy_id = $this->db->insert_id();
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => $log_title,
					'log_message' => $log_message,
					'log_messagetype' => $log_messagetype,
					'log_comment' => $item_comment_psy
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', $rdt_sms);
				redirect(base_url('admin/items/psy_items'));
			}	
		}		
		else
		{
			die('Alert! You are not authorized to this action.');
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////rev table functions///////////////////////
	public function rev_add_combine()
	{
		if($this->input->post('submit'))
		{
			//die('------------Submit------------');
			$item_type = $this->input->post('item_type');
			if($item_type=='ERQ')
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('erq_crq_add');
				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
							
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				//date('Y-m-d H:i:s'),
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					//'item_registration' =>$this->input->post('item_registration'),
					'item_submittedby' => $this->session->userdata('admin_id'),
					'item_submitted' => date('Y-m-d H:i:s'),
					//'item_batch' => $this->input->post('item_batch'),
					//'' => $this->input->post('')
				);
				
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					//die($this->db->last_query());
					$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						redirect(base_url('admin/items/ditems'));
					}
				}
			}
			elseif($item_type=='MCQ')
			{
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');	
							
				$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en');
					$item_stem_ur = $this->input->post('item_stem_ur');
					$item_option_a_en = $this->input->post('item_option_a_en');
					$item_option_a_ur = $this->input->post('item_option_a_ur');
					$item_option_b_en = $this->input->post('item_option_b_en');
					$item_option_b_ur = $this->input->post('item_option_b_ur');
					$item_option_c_en = $this->input->post('item_option_c_en');
					$item_option_c_ur = $this->input->post('item_option_c_ur');
					$item_option_d_en = $this->input->post('item_option_d_en');
					$item_option_d_ur = $this->input->post('item_option_d_ur');
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($item_option_a_en, $keyword) !== false ||
					strpos($item_option_a_ur, $keyword) !== false ||
					strpos($item_option_b_en, $keyword) !== false ||
					strpos($item_option_b_ur, $keyword) !== false ||
					strpos($item_option_c_en, $keyword) !== false ||
					strpos($item_option_c_ur, $keyword) !== false ||
					strpos($item_option_d_en, $keyword) !== false ||
					strpos($item_option_d_ur, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
					
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_option_layout' => $this->input->post('item_option_layout'),
						'item_option_a_en' => $this->input->post('item_option_a_en'),
						'item_option_a_ur' => $this->input->post('item_option_a_ur'),
						'item_option_b_en' => $this->input->post('item_option_b_en'),
						'item_option_b_ur' => $this->input->post('item_option_b_ur'),
						'item_option_c_en' => $this->input->post('item_option_c_en'),
						'item_option_c_ur' => $this->input->post('item_option_c_ur'),
						'item_option_d_en' => $this->input->post('item_option_d_en'),
						'item_option_d_ur' => $this->input->post('item_option_d_ur'),
						'item_type' => $this->input->post('item_type'),
						'item_option_correct' => $this->input->post('item_option_correct'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
						
					);
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_a_image = $this->input->post('item_option_a_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_a_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_a_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_b_image = $this->input->post('item_option_b_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_b_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_option_b_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_c_image = $this->input->post('item_option_c_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_c_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_option_c_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_d_image = $this->input->post('item_option_d_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_d_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_option_d_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						redirect(base_url('admin/items/ditems'));
					}
				}
			}
			elseif($item_type=='FIB')
			{
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_fib_key_eng = $this->input->post('item_fib_key_eng');
					$item_fib_key_ur = $this->input->post('item_fib_key_ur');
					
					if(strpos($item_fib_key_eng, $keyword) !== false || strpos($item_fib_key_ur, $keyword) !== false )
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
					
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_fib_key_eng' => $this->input->post('item_fib_key_eng'),
						'item_fib_key_ur' => $this->input->post('item_fib_key_ur'),
						'item_type' => $this->input->post('item_type'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
					);
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						redirect(base_url('admin/items/ditems'));
					}
				}
			}
			elseif($item_type=='TF')
			{
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_tf_eng_1 = $this->input->post('item_tf_eng_1');
					$item_tf_ur_1 = $this->input->post('item_tf_ur_1');
					$item_tf_eng_2 = $this->input->post('item_tf_eng_2');
					$item_tf_ur_2 = $this->input->post('item_tf_ur_2');
										
					if(strpos($item_tf_eng_1, $keyword) !== false || strpos($item_tf_ur_1, $keyword) !== false || strpos($item_tf_eng_2, $keyword) !== false || strpos($item_tf_ur_2, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
					
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_tf_eng_1' => $this->input->post('item_tf_eng_1'),
						'item_tf_ur_1' => $this->input->post('item_tf_ur_1'),
						'item_tf_eng_2' => $this->input->post('item_tf_eng_2'),
						'item_tf_ur_2' => $this->input->post('item_tf_ur_2'),
						'item_option_correct' => $this->input->post('item_option_correct'),
						'item_type' => $this->input->post('item_type'),
						//'item_batch' => $this->input->post('item_batch'),
						//'' => $this->input->post('')
					);
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						redirect(base_url('admin/items/ditems'));
					}
				}
			}
			elseif($item_type=='MC')
			{
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');	
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_lang', 'Medium/Language', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');			
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				//$this->form_validation->set_rules('item_option_correct', 'Correct Option', 'trim|required');
								
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/items/add_combine'),'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_en_mc1_1 = $this->input->post('item_en_mc1_1');
					$item_en_mc1_2 = $this->input->post('item_en_mc1_2');
					$item_en_mc1_3 = $this->input->post('item_en_mc1_3');
					$item_en_mc1_4 = $this->input->post('item_en_mc1_4');
					$item_en_mc1_5 = $this->input->post('item_en_mc1_5');
					$item_en_mc1_6 = $this->input->post('item_en_mc1_6');
					$item_en_mc1_7 = $this->input->post('item_en_mc1_7');
					$item_en_mc1_8 = $this->input->post('item_en_mc1_8');
					$item_en_mc1_9 = $this->input->post('item_en_mc1_9');
					$item_en_mc1_10= $this->input->post('item_en_mc1_10');
					
					$item_ur_mc1_1 = $this->input->post('item_ur_mc1_1');
					$item_ur_mc1_2 = $this->input->post('item_ur_mc1_2');
					$item_ur_mc1_3 = $this->input->post('item_ur_mc1_3');
					$item_ur_mc1_4 = $this->input->post('item_ur_mc1_4');
					$item_ur_mc1_5 = $this->input->post('item_ur_mc1_5');
					$item_ur_mc1_6 = $this->input->post('item_ur_mc1_6');
					$item_ur_mc1_7 = $this->input->post('item_ur_mc1_7');
					$item_ur_mc1_8 = $this->input->post('item_ur_mc1_8');
					$item_ur_mc1_9 = $this->input->post('item_ur_mc1_9');
					$item_ur_mc1_10= $this->input->post('item_ur_mc1_10');
					
					$item_en_mc2_1 = $this->input->post('item_en_mc2_1');
					$item_en_mc2_2 = $this->input->post('item_en_mc2_2');
					$item_en_mc2_3 = $this->input->post('item_en_mc2_3');
					$item_en_mc2_4 = $this->input->post('item_en_mc2_4');
					$item_en_mc2_5 = $this->input->post('item_en_mc2_5');
					$item_en_mc2_6 = $this->input->post('item_en_mc2_6');
					$item_en_mc2_7 = $this->input->post('item_en_mc2_7');
					$item_en_mc2_8 = $this->input->post('item_en_mc2_8');
					$item_en_mc2_9 = $this->input->post('item_en_mc2_9');
					$item_en_mc2_10= $this->input->post('item_en_mc2_10');
					
					$item_ur_mc2_1 = $this->input->post('item_ur_mc2_1');
					$item_ur_mc2_2 = $this->input->post('item_ur_mc2_2');
					$item_ur_mc2_3 = $this->input->post('item_ur_mc2_3');
					$item_ur_mc2_4 = $this->input->post('item_ur_mc2_4');
					$item_ur_mc2_5 = $this->input->post('item_ur_mc2_5');
					$item_ur_mc2_6 = $this->input->post('item_ur_mc2_6');
					$item_ur_mc2_7 = $this->input->post('item_ur_mc2_7');
					$item_ur_mc2_8 = $this->input->post('item_ur_mc2_8');
					$item_ur_mc2_9 = $this->input->post('item_ur_mc2_9');
					$item_ur_mc2_10= $this->input->post('item_ur_mc2_10');
					
					if(strpos($item_en_mc1_1, $keyword) !== false || strpos($item_en_mc1_2, $keyword) !== false || strpos($item_en_mc1_3, $keyword) !== false || strpos($item_en_mc1_4, $keyword) !== false || strpos($item_en_mc1_5, $keyword) !== false || strpos($item_en_mc1_6, $keyword) !== false || strpos($item_en_mc1_7, $keyword) !== false || strpos($item_en_mc1_8, $keyword) !== false || strpos($item_en_mc1_9, $keyword) !== false || strpos($item_en_mc1_10, $keyword) !== false || strpos($item_ur_mc1_1, $keyword) !== false || strpos($item_ur_mc1_2, $keyword) !== false || strpos($item_ur_mc1_3, $keyword) !== false || strpos($item_ur_mc1_4, $keyword) !== false || strpos($item_ur_mc1_5, $keyword) !== false || strpos($item_ur_mc1_6, $keyword) !== false || strpos($item_ur_mc1_7, $keyword) !== false || strpos($item_ur_mc1_8, $keyword) !== false || strpos($item_ur_mc1_9, $keyword) !== false || strpos($item_ur_mc1_10, $keyword) !== false || strpos($item_en_mc2_1, $keyword) !== false || strpos($item_en_mc2_2, $keyword) !== false || strpos($item_en_mc2_3, $keyword) !== false || strpos($item_en_mc2_4, $keyword) !== false || strpos($item_en_mc2_5, $keyword) !== false || strpos($item_en_mc2_6, $keyword) !== false || strpos($item_en_mc2_7, $keyword) !== false || strpos($item_en_mc2_8, $keyword) !== false || strpos($item_en_mc2_9, $keyword) !== false || strpos($item_en_mc2_10, $keyword) !== false || strpos($item_ur_mc2_1, $keyword) !== false || strpos($item_ur_mc2_2, $keyword) !== false || strpos($item_ur_mc2_3, $keyword) !== false || strpos($item_ur_mc2_4, $keyword) !== false || strpos($item_ur_mc2_5, $keyword) !== false || strpos($item_ur_mc2_6, $keyword) !== false || strpos($item_ur_mc2_7, $keyword) !== false || strpos($item_ur_mc2_8, $keyword) !== false || strpos($item_ur_mc2_9, $keyword) !== false || strpos($item_ur_mc2_10, $keyword) !== false )
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					if($this->input->post('item_en_mc1_1')!=""){$item_mc_ans_key = '1'.$this->input->post('item_mc_ans_key_1');}
					if($this->input->post('item_en_mc1_2')!=""){$item_mc_ans_key .= '_'.'2'.$this->input->post('item_mc_ans_key_2');}
					if($this->input->post('item_en_mc1_3')!=""){$item_mc_ans_key .= '_'.'3'.$this->input->post('item_mc_ans_key_3');}
					if($this->input->post('item_en_mc1_4')!=""){$item_mc_ans_key .= '_'.'4'.$this->input->post('item_mc_ans_key_4');}
					if($this->input->post('item_en_mc1_5')!=""){$item_mc_ans_key .= '_'.'5'.$this->input->post('item_mc_ans_key_5');}
					if($this->input->post('item_en_mc1_6')!=""){$item_mc_ans_key .= '_'.'6'.$this->input->post('item_mc_ans_key_6');}
					if($this->input->post('item_en_mc1_7')!=""){$item_mc_ans_key .= '_'.'7'.$this->input->post('item_mc_ans_key_7');}
					if($this->input->post('item_en_mc1_8')!=""){$item_mc_ans_key .= '_'.'8'.$this->input->post('item_mc_ans_key_8');}
					if($this->input->post('item_en_mc1_9')!=""){$item_mc_ans_key .= '_'.'9'.$this->input->post('item_mc_ans_key_9');}
					if($this->input->post('item_en_mc1_10')!=""){$item_mc_ans_key .= '_'.'10'.$this->input->post('item_mc_ans_key_10');}
					
					/*
					$item_mc_ans_key = $this->input->post('item_en_mc1_1').$this->input->post('item_mc_ans_key_1');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_2').$this->input->post('item_mc_ans_key_2');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_3').$this->input->post('item_mc_ans_key_3');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_4').$this->input->post('item_mc_ans_key_4');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_5').$this->input->post('item_mc_ans_key_5');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_6').$this->input->post('item_mc_ans_key_6');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_7').$this->input->post('item_mc_ans_key_7');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_8').$this->input->post('item_mc_ans_key_8');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_9').$this->input->post('item_mc_ans_key_9');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_10').$this->input->post('item_mc_ans_key_10');
					*/
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						'item_date_received' => $this->input->post('item_date_received'),					
						'item_submittedby' => $this->session->userdata('admin_id'),	
						'item_submitted' => date('Y-m-d H:i:s'),						
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						'item_type' => $this->input->post('item_type'),
						'item_mc_ans_key' => $item_mc_ans_key,
						//'item_batch' => $this->input->post('item_batch'),
						////'' => $this->input->post(''),
						
						'item_en_mc1_1' => $this->input->post('item_en_mc1_1'),
						'item_en_mc1_2' => $this->input->post('item_en_mc1_2'),
						'item_en_mc1_3' => $this->input->post('item_en_mc1_3'),
						'item_en_mc1_4' => $this->input->post('item_en_mc1_4'),
						'item_en_mc1_5' => $this->input->post('item_en_mc1_5'),
						'item_en_mc1_6' => $this->input->post('item_en_mc1_6'),
						'item_en_mc1_7' => $this->input->post('item_en_mc1_7'),
						'item_en_mc1_8' => $this->input->post('item_en_mc1_8'),
						'item_en_mc1_9' => $this->input->post('item_en_mc1_9'),
						'item_en_mc1_10' => $this->input->post('item_en_mc1_10'),
						
						'item_ur_mc1_1' => $this->input->post('item_ur_mc1_1'),
						'item_ur_mc1_2' => $this->input->post('item_ur_mc1_2'),
						'item_ur_mc1_3' => $this->input->post('item_ur_mc1_3'),
						'item_ur_mc1_4' => $this->input->post('item_ur_mc1_4'),
						'item_ur_mc1_5' => $this->input->post('item_ur_mc1_5'),
						'item_ur_mc1_6' => $this->input->post('item_ur_mc1_6'),
						'item_ur_mc1_7' => $this->input->post('item_ur_mc1_7'),
						'item_ur_mc1_8' => $this->input->post('item_ur_mc1_8'),
						'item_ur_mc1_9' => $this->input->post('item_ur_mc1_9'),
						'item_ur_mc1_10' => $this->input->post('item_ur_mc1_10'),
						
						'item_en_mc2_a' => $this->input->post('item_en_mc2_a'),
						'item_en_mc2_b' => $this->input->post('item_en_mc2_b'),
						'item_en_mc2_c' => $this->input->post('item_en_mc2_c'),
						'item_en_mc2_d' => $this->input->post('item_en_mc2_d'),
						'item_en_mc2_e' => $this->input->post('item_en_mc2_e'),
						'item_en_mc2_f' => $this->input->post('item_en_mc2_f'),
						'item_en_mc2_g' => $this->input->post('item_en_mc2_g'),
						'item_en_mc2_h' => $this->input->post('item_en_mc2_h'),
						'item_en_mc2_i' => $this->input->post('item_en_mc2_i'),
						'item_en_mc2_j' => $this->input->post('item_en_mc2_j'),
						
						'item_ur_mc2_a' => $this->input->post('item_ur_mc2_a'),
						'item_ur_mc2_b' => $this->input->post('item_ur_mc2_b'),
						'item_ur_mc2_c' => $this->input->post('item_ur_mc2_c'),
						'item_ur_mc2_d' => $this->input->post('item_ur_mc2_d'),
						'item_ur_mc2_e' => $this->input->post('item_ur_mc2_e'),
						'item_ur_mc2_f' => $this->input->post('item_ur_mc2_f'),
						'item_ur_mc2_g' => $this->input->post('item_ur_mc2_g'),
						'item_ur_mc2_h' => $this->input->post('item_ur_mc2_h'),
						'item_ur_mc2_i' => $this->input->post('item_ur_mc2_i'),
						'item_ur_mc2_j' => $this->input->post('item_ur_mc2_j')
					);
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_1 = $this->input->post('item_pic_mc1_1');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_1']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_1', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_1'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_2 = $this->input->post('item_pic_mc1_2');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_2']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_2', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_2'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_3 = $this->input->post('item_pic_mc1_3');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_3']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_3', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_3'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_4 = $this->input->post('item_pic_mc1_4');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_4']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_4', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_4'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_5 = $this->input->post('item_pic_mc1_5');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_5']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_5', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_5'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_6 = $this->input->post('item_pic_mc1_6');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_6']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_6', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_6'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_7 = $this->input->post('item_pic_mc1_7');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_7']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_7', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_7'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_8 = $this->input->post('item_pic_mc1_8');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_8']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_8', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_8'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_9 = $this->input->post('item_pic_mc1_9');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_9']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_9', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_9'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_10 = $this->input->post('item_pic_mc1_10');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_10']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_10', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_10'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_a = $this->input->post('item_pic_mc2_a');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_a']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_a', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_a'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_b = $this->input->post('item_pic_mc2_b');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_b']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_b', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_b'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_c = $this->input->post('item_pic_mc2_c');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_c']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_c', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_c'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_d = $this->input->post('item_pic_mc2_d');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_d']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_d', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_d'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_e = $this->input->post('item_pic_mc2_e');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_e']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_e', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_e'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_f = $this->input->post('item_pic_mc2_f');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_f']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_f', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_f'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_g = $this->input->post('item_pic_mc2_g');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_g']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_g', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_g'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////$item_pic_mc2_g = $this->input->post('item_pic_mc2_g');
					$item_pic_mc2_h = $this->input->post('item_pic_mc2_h');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_h']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_h', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_h'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_i = $this->input->post('item_pic_mc2_i');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_i']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_i', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_i'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////$item_pic_mc2_i = $this->input->post('item_pic_mc2_i');
					$item_pic_mc2_j = $this->input->post('item_pic_mc2_j');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_j']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_j', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_j'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/items/add_combine'), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//echo '<pre>';
					//print_r($data);
					//die();
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->add_item($data);
					$insert_id = $this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_title' => 'New item created',
							'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created'
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been added successfully!');
						redirect(base_url('admin/items/ditems'));
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Add Item';
			$data['grades'] = $this->Items_model->get_all_grades();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/items_add_combine');
			$this->load->view('admin/includes/_footer');
		}	
	}
	public function rev_edit_combine($id=0)
	{
		if($this->input->post('submit'))
		{
			$item_type = $this->input->post('item_type');
			if($item_type=='ERQ')
			{
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
							
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
				}
				else{
				$keyword ='Ginger';
				$item_stem_en = $this->input->post('item_stem_en');
				$item_stem_ur = $this->input->post('item_stem_ur');
				$item_rubric_english = $this->input->post('item_rubric_english');
				$item_rubric_urdu = $this->input->post('item_rubric_urdu');
				
				if(strpos($item_stem_en, $keyword) !== false || 
				   strpos($item_stem_ur, $keyword) !== false || 
				   strpos($item_rubric_english, $keyword) !== false ||
				   strpos($item_rubric_urdu, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					die('Don Not go further');
				}
				$data = array(
					'item_date_received' => $this->input->post('item_date_received'),
					'item_code' => $this->input->post('item_code'),
					//'item_difficulty' => $this->input->post('item_difficulty'),
					//'item_discr' => $this->input->post('item_discr'),
					//'item_dif_code' => $this->input->post('item_dif_code'),
					'item_grade_id' => $this->input->post('item_grade_id'),
					'item_subject_id' => $this->input->post('item_subject_id'),
					'item_cstand_id' => $this->input->post('item_cstand_id'),
					'item_subcstand_id' => $this->input->post('item_subcstand_id'),
					//'item_slo_id' => $this->input->post('item_slo_id'),
					'item_curriculum' => $this->input->post('item_curriculum'),
					//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
					//'item_pctb_page' => $this->input->post('item_pctb_page'),
					//'item_other_title' => $this->input->post('item_other_title'),
					//'item_other_year' => $this->input->post('item_other_year'),
					//'item_other_page' => $this->input->post('item_other_page'),
					'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
					//'item_relation' => $this->input->post('item_relation'),
					//'item_stem_number' => $this->input->post('item_stem_number'),
					'item_stem_en' =>$this->input->post('item_stem_en'),
					'item_stem_ur' => $this->input->post('item_stem_ur'),
					'item_image_position' => $this->input->post('item_image_position'),
					'item_rubric_english' => $this->input->post('item_rubric_english'),
					'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
					'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
					'item_type' => $this->input->post('item_type'),
					//'item_registration' =>$this->input->post('item_registration'),
					//'item_submittedby' => $this->session->userdata('admin_id'),
					'item_batch' => $this->input->post('item_batch')
				);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path="assets/img/";
					if(!empty($_FILES['item_rubric_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_rubric_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$result = $this->Items_model->rev_edit_items($data, $id);
                    
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_rev_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					$log_message = '';
					if($this->session->userdata('role_id')==6)
					{
						$updated = 'rev_ir_updated';
						$log_message = 'Item {{log_itemid}} updated by reviewer {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'rev_ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'rev_ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_itemhis_id' => $insert_id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated,
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							//redirect(base_url('admin/items/rev_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/rev_ss_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/rev_ae_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
					}
				}
			}
			elseif($item_type=='MCQ')
			{
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_stem_en = $this->input->post('item_stem_en');
					$item_stem_ur = $this->input->post('item_stem_ur');
					$item_option_a_en = $this->input->post('item_option_a_en');
					$item_option_a_ur = $this->input->post('item_option_a_ur');
					$item_option_b_en = $this->input->post('item_option_b_en');
					$item_option_b_ur = $this->input->post('item_option_b_ur');
					$item_option_c_en = $this->input->post('item_option_c_en');
					$item_option_c_ur = $this->input->post('item_option_c_ur');
					$item_option_d_en = $this->input->post('item_option_d_en');
					$item_option_d_ur = $this->input->post('item_option_d_ur');
					
					if(strpos($item_stem_en, $keyword) !== false || 
					strpos($item_stem_ur, $keyword) !== false || 
					strpos($item_option_a_en, $keyword) !== false ||
					strpos($item_option_a_ur, $keyword) !== false ||
					strpos($item_option_b_en, $keyword) !== false ||
					strpos($item_option_b_ur, $keyword) !== false ||
					strpos($item_option_c_en, $keyword) !== false ||
					strpos($item_option_c_ur, $keyword) !== false ||
					strpos($item_option_d_en, $keyword) !== false ||
					strpos($item_option_d_ur, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						//'item_date_received' => $this->input->post('item_date_received'),					
						//'item_submittedby' => $this->session->userdata('admin_id'),							
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_option_layout' => $this->input->post('item_option_layout'),
						'item_option_a_en' => $this->input->post('item_option_a_en'),
						'item_option_a_ur' => $this->input->post('item_option_a_ur'),
						'item_option_b_en' => $this->input->post('item_option_b_en'),
						'item_option_b_ur' => $this->input->post('item_option_b_ur'),
						'item_option_c_en' => $this->input->post('item_option_c_en'),
						'item_option_c_ur' => $this->input->post('item_option_c_ur'),
						'item_option_d_en' => $this->input->post('item_option_d_en'),
						'item_option_d_ur' => $this->input->post('item_option_d_ur'),
						'item_type' => $this->input->post('item_type'),
						'item_option_correct' => $this->input->post('item_option_correct')
					);
						$data['item_updated'] = date('Y-m-d H:i:s');
						$data['item_updatedby'] = $this->session->userdata('admin_id');
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_a_image = $this->input->post('item_option_a_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_a_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_option_a_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_b_image = $this->input->post('item_option_b_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_b_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_option_b_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_c_image = $this->input->post('item_option_c_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_c_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_option_c_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_d_image = $this->input->post('item_option_d_image');
					$path="assets/img/";
					if(!empty($_FILES['item_option_d_image']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_option_d_image'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->rev_edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_rev_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					$log_message = '';
					if($this->session->userdata('role_id')==6)
					{
						$updated = 'rev_ir_updated';
						$log_message = 'Item {{log_itemid}} updated by reviewer {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'rev_ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'rev_ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated,
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							//redirect(base_url('admin/items/rev_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/rev_ss_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/rev_ae_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
					}
				}
			}
			elseif($item_type=='FIB')
			{
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_fib_key_eng = $this->input->post('item_fib_key_eng');
					$item_fib_key_ur = $this->input->post('item_fib_key_ur');
					
					if(strpos($item_fib_key_eng, $keyword) !== false || strpos($item_fib_key_ur, $keyword) !== false )
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						//'item_date_received' => $this->input->post('item_date_received'),					
						//'item_submittedby' => $this->session->userdata('admin_id'),							
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_fib_key_eng' => $this->input->post('item_fib_key_eng'),
						'item_fib_key_ur' => $this->input->post('item_fib_key_ur'),
						'item_type' => $this->input->post('item_type')
					);
						$data['item_updated'] = date('Y-m-d H:i:s');
						$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->rev_edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_rev_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					$log_message = '';
					if($this->session->userdata('role_id')==6)
					{
						$updated = 'rev_ir_updated';
						$log_message = 'Item {{log_itemid}} updated by reviewer {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'rev_ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'rev_ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated,
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							//redirect(base_url('admin/items/rev_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/rev_ss_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/rev_ae_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
					}
				}
			}
			elseif($item_type=='TF')
			{
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_tf_eng_1 = $this->input->post('item_tf_eng_1');
					$item_tf_ur_1 = $this->input->post('item_tf_ur_1');
					$item_tf_eng_2 = $this->input->post('item_tf_eng_2');
					$item_tf_ur_2 = $this->input->post('item_tf_ur_2');
										
					if(strpos($item_tf_eng_1, $keyword) !== false || strpos($item_tf_ur_1, $keyword) !== false || strpos($item_tf_eng_2, $keyword) !== false || strpos($item_tf_ur_2, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
						}
					
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						//'item_date_received' => $this->input->post('item_date_received'),					
						//'item_submittedby' => $this->session->userdata('admin_id'),							
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						
						'item_tf_eng_1' => $this->input->post('item_tf_eng_1'),
						'item_tf_ur_1' => $this->input->post('item_tf_ur_1'),
						'item_tf_eng_2' => $this->input->post('item_tf_eng_2'),
						'item_tf_ur_2' => $this->input->post('item_tf_ur_2'),
						'item_option_correct' => $this->input->post('item_option_correct'),
						'item_type' => $this->input->post('item_type')
					);
						$data['item_updated'] = date('Y-m-d H:i:s');
						$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->rev_edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_rev_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					$log_message = '';
					if($this->session->userdata('role_id')==6)
					{
						$updated = 'rev_ir_updated';
						$log_message = 'Item {{log_itemid}} updated by reviewer {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'rev_ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'rev_ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated,
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							//redirect(base_url('admin/items/rev_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/rev_ss_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/rev_ae_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
					}
				}
			}
			elseif($item_type=='MC')
			{
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');				
				//$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');				
				//$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');				
				//$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				//$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');				
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				//$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');				
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				//$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');				
				//$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');				
				
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', 'Form validation error');
					redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
				}
				else
				{
					$keyword ='Ginger';
					$item_en_mc1_1 = $this->input->post('item_en_mc1_1');
					$item_en_mc1_2 = $this->input->post('item_en_mc1_2');
					$item_en_mc1_3 = $this->input->post('item_en_mc1_3');
					$item_en_mc1_4 = $this->input->post('item_en_mc1_4');
					$item_en_mc1_5 = $this->input->post('item_en_mc1_5');
					$item_en_mc1_6 = $this->input->post('item_en_mc1_6');
					$item_en_mc1_7 = $this->input->post('item_en_mc1_7');
					$item_en_mc1_8 = $this->input->post('item_en_mc1_8');
					$item_en_mc1_9 = $this->input->post('item_en_mc1_9');
					$item_en_mc1_10= $this->input->post('item_en_mc1_10');
					
					$item_ur_mc1_1 = $this->input->post('item_ur_mc1_1');
					$item_ur_mc1_2 = $this->input->post('item_ur_mc1_2');
					$item_ur_mc1_3 = $this->input->post('item_ur_mc1_3');
					$item_ur_mc1_4 = $this->input->post('item_ur_mc1_4');
					$item_ur_mc1_5 = $this->input->post('item_ur_mc1_5');
					$item_ur_mc1_6 = $this->input->post('item_ur_mc1_6');
					$item_ur_mc1_7 = $this->input->post('item_ur_mc1_7');
					$item_ur_mc1_8 = $this->input->post('item_ur_mc1_8');
					$item_ur_mc1_9 = $this->input->post('item_ur_mc1_9');
					$item_ur_mc1_10= $this->input->post('item_ur_mc1_10');
					
					$item_en_mc2_1 = $this->input->post('item_en_mc2_1');
					$item_en_mc2_2 = $this->input->post('item_en_mc2_2');
					$item_en_mc2_3 = $this->input->post('item_en_mc2_3');
					$item_en_mc2_4 = $this->input->post('item_en_mc2_4');
					$item_en_mc2_5 = $this->input->post('item_en_mc2_5');
					$item_en_mc2_6 = $this->input->post('item_en_mc2_6');
					$item_en_mc2_7 = $this->input->post('item_en_mc2_7');
					$item_en_mc2_8 = $this->input->post('item_en_mc2_8');
					$item_en_mc2_9 = $this->input->post('item_en_mc2_9');
					$item_en_mc2_10= $this->input->post('item_en_mc2_10');
					
					$item_ur_mc2_1 = $this->input->post('item_ur_mc2_1');
					$item_ur_mc2_2 = $this->input->post('item_ur_mc2_2');
					$item_ur_mc2_3 = $this->input->post('item_ur_mc2_3');
					$item_ur_mc2_4 = $this->input->post('item_ur_mc2_4');
					$item_ur_mc2_5 = $this->input->post('item_ur_mc2_5');
					$item_ur_mc2_6 = $this->input->post('item_ur_mc2_6');
					$item_ur_mc2_7 = $this->input->post('item_ur_mc2_7');
					$item_ur_mc2_8 = $this->input->post('item_ur_mc2_8');
					$item_ur_mc2_9 = $this->input->post('item_ur_mc2_9');
					$item_ur_mc2_10= $this->input->post('item_ur_mc2_10');
					
					if(strpos($item_en_mc1_1, $keyword) !== false || strpos($item_en_mc1_2, $keyword) !== false || strpos($item_en_mc1_3, $keyword) !== false || strpos($item_en_mc1_4, $keyword) !== false || strpos($item_en_mc1_5, $keyword) !== false || strpos($item_en_mc1_6, $keyword) !== false || strpos($item_en_mc1_7, $keyword) !== false || strpos($item_en_mc1_8, $keyword) !== false || strpos($item_en_mc1_9, $keyword) !== false || strpos($item_en_mc1_10, $keyword) !== false || strpos($item_ur_mc1_1, $keyword) !== false || strpos($item_ur_mc1_2, $keyword) !== false || strpos($item_ur_mc1_3, $keyword) !== false || strpos($item_ur_mc1_4, $keyword) !== false || strpos($item_ur_mc1_5, $keyword) !== false || strpos($item_ur_mc1_6, $keyword) !== false || strpos($item_ur_mc1_7, $keyword) !== false || strpos($item_ur_mc1_8, $keyword) !== false || strpos($item_ur_mc1_9, $keyword) !== false || strpos($item_ur_mc1_10, $keyword) !== false || strpos($item_en_mc2_1, $keyword) !== false || strpos($item_en_mc2_2, $keyword) !== false || strpos($item_en_mc2_3, $keyword) !== false || strpos($item_en_mc2_4, $keyword) !== false || strpos($item_en_mc2_5, $keyword) !== false || strpos($item_en_mc2_6, $keyword) !== false || strpos($item_en_mc2_7, $keyword) !== false || strpos($item_en_mc2_8, $keyword) !== false || strpos($item_en_mc2_9, $keyword) !== false || strpos($item_en_mc2_10, $keyword) !== false || strpos($item_ur_mc2_1, $keyword) !== false || strpos($item_ur_mc2_2, $keyword) !== false || strpos($item_ur_mc2_3, $keyword) !== false || strpos($item_ur_mc2_4, $keyword) !== false || strpos($item_ur_mc2_5, $keyword) !== false || strpos($item_ur_mc2_6, $keyword) !== false || strpos($item_ur_mc2_7, $keyword) !== false || strpos($item_ur_mc2_8, $keyword) !== false || strpos($item_ur_mc2_9, $keyword) !== false || strpos($item_ur_mc2_10, $keyword) !== false )
					{
						die('You are not allowed to "Add" items. Please contact to AFAQ IT Team');
					}
					
					if($this->input->post('item_en_mc1_3')!=""){$item_mc_ans_key = '1'.$this->input->post('item_mc_ans_key_1');}
					if($this->input->post('item_en_mc1_3')!=""){$item_mc_ans_key .= '_'.'2'.$this->input->post('item_mc_ans_key_2');}
					if($this->input->post('item_en_mc1_3')!=""){$item_mc_ans_key .= '_'.'3'.$this->input->post('item_mc_ans_key_3');}
					if($this->input->post('item_en_mc1_4')!=""){$item_mc_ans_key .= '_'.'4'.$this->input->post('item_mc_ans_key_4');}
					if($this->input->post('item_en_mc1_5')!=""){$item_mc_ans_key .= '_'.'5'.$this->input->post('item_mc_ans_key_5');}
					if($this->input->post('item_en_mc1_6')!=""){$item_mc_ans_key .= '_'.'6'.$this->input->post('item_mc_ans_key_6');}
					if($this->input->post('item_en_mc1_7')!=""){$item_mc_ans_key .= '_'.'7'.$this->input->post('item_mc_ans_key_7');}
					if($this->input->post('item_en_mc1_8')!=""){$item_mc_ans_key .= '_'.'8'.$this->input->post('item_mc_ans_key_8');}
					if($this->input->post('item_en_mc1_9')!=""){$item_mc_ans_key .= '_'.'9'.$this->input->post('item_mc_ans_key_9');}
					if($this->input->post('item_en_mc1_10')!=""){$item_mc_ans_key .= '_'.'10'.$this->input->post('item_mc_ans_key_10');}
					/*
					$item_mc_ans_key = $this->input->post('item_en_mc1_1').$this->input->post('item_mc_ans_key_1');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_2').$this->input->post('item_mc_ans_key_2');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_3').$this->input->post('item_mc_ans_key_3');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_4').$this->input->post('item_mc_ans_key_4');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_5').$this->input->post('item_mc_ans_key_5');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_6').$this->input->post('item_mc_ans_key_6');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_7').$this->input->post('item_mc_ans_key_7');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_8').$this->input->post('item_mc_ans_key_8');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_9').$this->input->post('item_mc_ans_key_9');
					$item_mc_ans_key .= '_'.$this->input->post('item_en_mc1_10').$this->input->post('item_mc_ans_key_10');
					*/
					$data = array(
						'item_code' => $this->input->post('item_code'),
						//'item_difficulty' => $this->input->post('item_difficulty'),
						//'item_discr' => $this->input->post('item_discr'),
						//'item_dif_code' => $this->input->post('item_dif_code'),
						//'item_registration' =>$this->input->post('item_registration'),
						
						//'item_date_received' => $this->input->post('item_date_received'),					
						//'item_submittedby' => $this->session->userdata('admin_id'),							
						
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						//'item_slo_id' => $this->input->post('item_slo_id'),
						
						'item_cognitive_bloom' =>$this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						//'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						//'item_pctb_page' => $this->input->post('item_pctb_page'),
						
						//'item_other_title' => $this->input->post('item_other_title'),
						//'item_other_year' => $this->input->post('item_other_year'),
						//'item_other_page' => $this->input->post('item_other_page'),
						
						//'item_relation' => $this->input->post('item_relation'),
						//'item_stem_number' => $this->input->post('item_stem_number'),
						
						'item_stem_en' =>$this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						'item_type' => $this->input->post('item_type'),
						'item_mc_ans_key' => $item_mc_ans_key,
						
						'item_en_mc1_1' => $this->input->post('item_en_mc1_1'),
						'item_en_mc1_2' => $this->input->post('item_en_mc1_2'),
						'item_en_mc1_3' => $this->input->post('item_en_mc1_3'),
						'item_en_mc1_4' => $this->input->post('item_en_mc1_4'),
						'item_en_mc1_5' => $this->input->post('item_en_mc1_5'),
						'item_en_mc1_6' => $this->input->post('item_en_mc1_6'),
						'item_en_mc1_7' => $this->input->post('item_en_mc1_7'),
						'item_en_mc1_8' => $this->input->post('item_en_mc1_8'),
						'item_en_mc1_9' => $this->input->post('item_en_mc1_9'),
						'item_en_mc1_10' => $this->input->post('item_en_mc1_10'),
						
						'item_ur_mc1_1' => $this->input->post('item_ur_mc1_1'),
						'item_ur_mc1_2' => $this->input->post('item_ur_mc1_2'),
						'item_ur_mc1_3' => $this->input->post('item_ur_mc1_3'),
						'item_ur_mc1_4' => $this->input->post('item_ur_mc1_4'),
						'item_ur_mc1_5' => $this->input->post('item_ur_mc1_5'),
						'item_ur_mc1_6' => $this->input->post('item_ur_mc1_6'),
						'item_ur_mc1_7' => $this->input->post('item_ur_mc1_7'),
						'item_ur_mc1_8' => $this->input->post('item_ur_mc1_8'),
						'item_ur_mc1_9' => $this->input->post('item_ur_mc1_9'),
						'item_ur_mc1_10' => $this->input->post('item_ur_mc1_10'),
						
						'item_en_mc2_a' => $this->input->post('item_en_mc2_a'),
						'item_en_mc2_b' => $this->input->post('item_en_mc2_b'),
						'item_en_mc2_c' => $this->input->post('item_en_mc2_c'),
						'item_en_mc2_d' => $this->input->post('item_en_mc2_d'),
						'item_en_mc2_e' => $this->input->post('item_en_mc2_e'),
						'item_en_mc2_f' => $this->input->post('item_en_mc2_f'),
						'item_en_mc2_g' => $this->input->post('item_en_mc2_g'),
						'item_en_mc2_h' => $this->input->post('item_en_mc2_h'),
						'item_en_mc2_i' => $this->input->post('item_en_mc2_i'),
						'item_en_mc2_j' => $this->input->post('item_en_mc2_j'),
						
						'item_ur_mc2_a' => $this->input->post('item_ur_mc2_a'),
						'item_ur_mc2_b' => $this->input->post('item_ur_mc2_b'),
						'item_ur_mc2_c' => $this->input->post('item_ur_mc2_c'),
						'item_ur_mc2_d' => $this->input->post('item_ur_mc2_d'),
						'item_ur_mc2_e' => $this->input->post('item_ur_mc2_e'),
						'item_ur_mc2_f' => $this->input->post('item_ur_mc2_f'),
						'item_ur_mc2_g' => $this->input->post('item_ur_mc2_g'),
						'item_ur_mc2_h' => $this->input->post('item_ur_mc2_h'),
						'item_ur_mc2_i' => $this->input->post('item_ur_mc2_i'),
						'item_ur_mc2_j' => $this->input->post('item_ur_mc2_j'),
					);
						$data['item_updated'] = date('Y-m-d H:i:s');
						$data['item_updatedby'] = $this->session->userdata('admin_id');
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_1 = $this->input->post('item_pic_mc1_1');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_1']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_1', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_1'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_2 = $this->input->post('item_pic_mc1_2');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_2']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_2', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_2'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_3 = $this->input->post('item_pic_mc1_3');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_3']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_3', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_3'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_4 = $this->input->post('item_pic_mc1_4');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_4']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_4', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_4'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_5 = $this->input->post('item_pic_mc1_5');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_5']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_5', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_5'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_6 = $this->input->post('item_pic_mc1_6');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_6']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_6', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_6'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_7 = $this->input->post('item_pic_mc1_7');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_7']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_7', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_7'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_8 = $this->input->post('item_pic_mc1_8');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_8']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_8', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_8'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_9 = $this->input->post('item_pic_mc1_9');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_9']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_9', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_9'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc1_10 = $this->input->post('item_pic_mc1_10');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc1_10']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc1_10', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc1_10'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_a = $this->input->post('item_pic_mc2_a');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_a']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_a', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_a'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_b = $this->input->post('item_pic_mc2_b');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_b']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_b', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_b'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_c = $this->input->post('item_pic_mc2_c');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_c']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_c', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_c'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_d = $this->input->post('item_pic_mc2_d');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_d']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_d', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_d'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_e = $this->input->post('item_pic_mc2_e');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_e']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_e', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_e'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_f = $this->input->post('item_pic_mc2_f');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_f']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_f', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_f'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_g = $this->input->post('item_pic_mc2_g');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_g']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_g', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_g'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////$item_pic_mc2_g = $this->input->post('item_pic_mc2_g');
					$item_pic_mc2_h = $this->input->post('item_pic_mc2_h');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_h']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_h', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_h'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_pic_mc2_i = $this->input->post('item_pic_mc2_i');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_i']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_i', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_i'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////$item_pic_mc2_i = $this->input->post('item_pic_mc2_i');
					$item_pic_mc2_j = $this->input->post('item_pic_mc2_j');
					$path="assets/img/";
					if(!empty($_FILES['item_pic_mc2_j']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_pic_mc2_j', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_pic_mc2_j'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path="assets/img/";
					if(!empty($_FILES['item_image_en']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_image_en'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path="assets/img/";
					if(!empty($_FILES['item_image_ur']['name']))
					{
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						//print_r($result);
						//die();
						if($result['status'] == 1){
							$data['item_image_ur'] = $path.$result['msg'];
						}
						else{
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/items/rev_edit_combine/'.$id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

					//$data = $this->security->xss_clean($data);
					$result = $this->Items_model->rev_edit_items($data, $id);
					$insert_id = '';
					if(($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4) && $result==1)
					{
						$copy_result = $this->Items_model->copy_item_rev_history($id);
						$insert_id = $this->db->insert_id();
					}
					$updated = '';
					$log_message = '';
					if($this->session->userdata('role_id')==6)
					{
						$updated = 'rev_ir_updated';
						$log_message = 'Item {{log_itemid}} updated by reviewer {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==2)
					{
						$updated = 'rev_ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					}
					elseif($this->session->userdata('role_id')==4)
					{
						$updated = 'rev_ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					//die($this->db->last_query());
					//$insert_id = $this->db->insert_id();
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id)&&$insert_id!=0)?$insert_id:0,
							'log_title' => 'Item Updated',
							'log_message' => $log_message,
							'log_messagetype' =>$updated,
						);
						$log = $this->Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Item/Question has been updated successfully!');
						if($this->session->userdata('role_id')==6)
						{
							//redirect(base_url('admin/items/rev_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==2)
						{
							//redirect(base_url('admin/items/rev_ss_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
						elseif($this->session->userdata('role_id')==4)
						{
							//redirect(base_url('admin/items/rev_ae_pitems'));
							redirect(base_url('admin/items/rev_view_combine/'.$id));
						}
					}
				}
			}
		}
		else
		{
			$data['title'] = 'Edit Item';
			if($this->session->userdata('role_id') == 6)
			{
                $result_rev = $this->Items_model->find_rev_item_by_id($id);
				if(empty($result_rev))
				{
					$data['copy_item_rev'] = $this->Items_model->copy_item_rev($id);
					$result = $this->Items_model->update_item_exported('1',$id);
					$up_rev_status = $this->Items_model->update_item_rev_status('1',$id);
					$data['item'] = $this->Items_model->get_rev_items_comb_by_id($id);
					$data['item'] = $data['item'][0];
				}
				else
				{
					$data['item'] = $this->Items_model->get_rev_items_comb_by_id($id);
					$data['item'] = $data['item'][0];
				}
			}
			else
			{
				$data['item'] = $this->Items_model->get_rev_items_comb_by_id($id);
				$data['item'] = $data['item'][0];
			}
			//echo '<pre>';
			//print_r($data);
			//die();
			//die('Thats not good');
			if($data['item']['item_rev_status']==2 && $data['item']['item_rev_ss_status']==3 && $data['item']['item_rev_ae_status']==3)
			{
				//die('Thats good');
				$data['status'] = $this->Items_model->change_rev_rej_status_ae($id);
				$data['item'] = $this->Items_model->get_rev_items_comb_by_id($id);
				$data['item'] = $data['item'][0];
			}

			$data['grades'] = $this->Items_model->get_all_grades();
			$subjectList = $this->session->userdata('subjects_ids');						
			$data['subjects'] = $this->Items_model->get_ae_subjects_grade($subjectList,$data['item']['item_grade_id']);//this function is functioning for users
			$data['cstands'] = $this->Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
			$data['slos'] = $this->Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/items/rev_items_edit_combine');
			$this->load->view('admin/includes/_footer');
		}	
	}

	public function rev_submit_for_approval_his_log($id=0)
	{
		if($this->session->userdata('role_id') == 2)
		{
			$item_rev_ss_comment = $this->input->post('item_rev_ss_comment');
			$item_rev_status ='';
			$item_rev_ss_status ='';
			$log_messagetype='';
			$log_message ='';
			$log_title = '';
			$rdt_sms = '';

			if($this->input->post('submit'))
			{
				$item_rev_status ='2';
				$item_rev_ss_status ='2';
				$log_messagetype = 'rev_ss_accpted';
				$log_message ='Rev_Item {{log_itemid}} accepted by SS {{log_admin_id}} on {{log_date}}';
				$log_title = 'Rev_Item accepted by SS';
				$rdt_sms = 'Rev_Item accepted by SS';
			}
			elseif($this->input->post('reject')){
				$item_rev_status ='3';
				$item_rev_ss_status ='3';
				$log_messagetype = 'rev_ss_rejected';
				$log_message ='Rev_Item {{log_itemid}} rejected by SS {{log_admin_id}} on {{log_date}}';
				$log_title = 'Rev_Item rejected by SS';
				$rdt_sms = 'Rev_Item reject by SS';
			}
			elseif($this->input->post('submit_rev')){
				$item_rev_status ='4';
				$item_rev_ss_status ='4';
				$log_messagetype = 'rev_ss_submitted_resubmitted';
				$log_message ='Rev_Item {{log_itemid}} rejected by SS {{log_admin_id}} on {{log_date}}';
				$log_title = 'Rev_Item Resubmitted by SS';
				$rdt_sms = 'Rev_Item Resubmitted by SS';
			}
			$data = array(
					'item_rev_ss_id' => $this->session->userdata('admin_id'),
					'item_rev_ss_date_acc' => date('Y-m-d H:i:s'),
					'item_rev_ss_comment' => $this->input->post('item_rev_ss_comment'),
					'item_rev_ss_status' => $item_rev_ss_status,
					'item_rev_status' => $item_rev_status,
				);
				//print_r($data);
				//die();
			$result = $this->Items_model->rev_edit_items($data,$id);//function used to update status for submit or reject post
			$copy_result = $this->Items_model->copy_item_rev_history($id);// used to copy in rev history table
			$copy_id = $this->db->insert_id();//get last iserted id in rev history table
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => $log_title,
					'log_message' => $log_message,
					'log_messagetype' => $log_messagetype,
					'log_comment' => $this->input->post('item_rev_ss_comment')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', $rdt_sms);
				redirect(base_url('admin/items/rev_ss_pitems'));
			}	
		}
		elseif($this->session->userdata('role_id') == 4)
		{
			$item_rev_ae_comment = $this->input->post('item_rev_ae_comment');
			//$item_status ='';
			$item_rev_ae_status ='';
			$log_messagetype='';
			$log_message ='';
			$log_title = '';
			$rdt_sms = '';

			if($this->input->post('submit'))
			{
				$data = array(
					'item_rev_ae_id' => $this->session->userdata('admin_id'),
					'item_rev_ae_date_acc' => date('Y-m-d H:i:s'),
					'item_rev_ae_comment' => $item_rev_ae_comment,
					'item_rev_ae_status' => '2',
				);
				
				$log_messagetype = 'rev_ae_accepted';
				$log_message ='Rev_Item {{log_itemid}} accepted by AE {{log_admin_id}} on {{log_date}}';
				$log_title = 'Rev_Item accepted by AE';
				$rdt_sms = 'Rev_Item has been submitted successfully';
			}
			elseif($this->input->post('reject')){
				$data = array(
					'item_rev_ae_id' => $this->session->userdata('admin_id'),
					'item_rev_ae_date_acc' => date('Y-m-d H:i:s'),
					'item_rev_ae_comment' => $item_rev_ae_comment,
					'item_rev_ss_status' => '3',
					'item_rev_ae_status' => '3',
                    'item_rev_status' => '3'
				);
				
				$log_messagetype = 'rev_ae_rejected';
				$log_message ='Rev_Item {{log_itemid}} rejected by AE {{log_admin_id}} on {{log_date}}';
				$log_title = 'Rev_Item rejected by AE';
				$rdt_sms = 'Rev_Item has been rejected.';
			}
			
			$result = $this->Items_model->rev_edit_items($data,$id);
			$copy_result = $this->Items_model->copy_item_rev_history($id);
			$copy_id = $this->db->insert_id();
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => $log_title,
					'log_message' => $log_message,
					'log_messagetype' => $log_messagetype,
					'log_comment' => $this->input->post('item_rev_ae_comment')
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', $rdt_sms);
				redirect(base_url('admin/items/rev_ae_pitems'));
			}	
		}
		elseif($this->session->userdata('role_id') == 6)
		{
			$item_rev_comment = $this->input->post('item_rev_comment');
//$this->session->sess_destroy();
			if($item_rev_comment =="")
			{
				$this->session->set_flashdata('error', 'Comments required');
				redirect(base_url('admin/items/rev_view_combine/'.$id), 'refresh');
			}
			$log_messagetype='';
			$log_message ='';
			$log_title = '';
			$rdt_sms = '';
			$data = array(
				'item_rev_revid' => $this->session->userdata('admin_id'),
				'item_rev_date_acc' => date('Y-m-d H:i:s'),
				'item_rev_date_exp' => date('Y-m-d H:i:s'),
				'item_rev_comment' => $item_rev_comment,
				'item_rev_status' => '2',
                'item_rev_ss_status' => '0',
                'item_rev_ae_status' => '0'
			);
			$log_messagetype = 'rev_reviewed';
			$log_message ='Item {{log_itemid}} reviewed by IR {{log_admin_id}} on {{log_date}}';
			$log_title = 'Item reviewed by IR';
			$rdt_sms = 'Item has been reviewed successfully';
			
			$item_exported = $this->Items_model->find_exported($id);
			if($item_exported[0]->item_exported=='1')
			{
				$rev_edit_items = $this->Items_model->rev_edit_items($data, $id);
			}
			else
			{
				$copy_item_rev = $this->Items_model->copy_item_rev($id);
				$result = $this->Items_model->update_item_exported('1',$id);
				$rev_edit_items = $this->Items_model->rev_edit_items($data, $id);
			}
			
			$copy_result = $this->Items_model->copy_item_rev_history($id);
			$copy_id = $this->db->insert_id();
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => 'Item submitted by IR',
					'log_message' => 'Item {{log_itemid}} submitted by IR {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'rev_ir_submitted',
					'log_comment' => $item_rev_comment
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', 'Item has been reviewed by IR successfully!');
				redirect(base_url('admin/items/rev_pitems'));
			}
			
		}
		elseif($this->session->userdata('role_id') == 5)
		{
			$item_rev_psy_comment = $this->input->post('item_rev_psy_comment');
			$item_rev_psy_status ='';
			$log_messagetype='';
			$log_message ='';
			$log_title = '';
			$rdt_sms = '';

			if($this->input->post('submit'))
			{
				$data = array(
					'item_rev_psy_id' => $this->session->userdata('admin_id'),
					'item_rev_psy_date_acc' => date('Y-m-d H:i:s'),
					'item_rev_psy_comment' => $item_rev_psy_comment,
					'item_rev_psy_status' => '2'
				);
				$log_messagetype = 'rev_psy_reviewed';
				$log_message ='Rev_Item {{log_itemid}} reviewed by PSM {{log_admin_id}} on {{log_date}}';
				$log_title = 'Rev_Item reviewed by PSM';
				$rdt_sms = 'Rev_Item has been reviewed successfully';
			}
			//echo '<pre>';
			//print_r($data);
			//die();
			$result = $this->Items_model->rev_edit_items($data,$id);
			$copy_result = $this->Items_model->copy_item_rev_history($id);
			$copy_id = $this->db->insert_id();
			if($copy_id!=0)
			{
				$data = array(
					'log_itemid' => $id,
					'log_itemhis_id' => $copy_id,
					'log_admin_id' => $this->session->userdata('admin_id'),
					'log_title' => $log_title,
					'log_message' => 'Item {{log_itemid}} submitted by IR {{log_admin_id}} on {{log_date}}',
					'log_messagetype' => $log_messagetype,
					'log_comment' => $item_rev_comment
				);
				$log = $this->Items_model->log_entry($data);
				$this->session->set_flashdata('success', $rdt_sms);
				redirect(base_url('admin/items/rev_psy_pitems'));
			}	
		}		
		else
		{
			die('Alert! You are not authorized to this action.');
		}
	}
	public function rev_view_combine($id = 0)
	{
        
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Items_model->get_all_grades();
		if($this->session->userdata('role_id') == 6)
		{
			$data['item_exported'] = $this->Items_model->find_exported($id);
			if($data['item_exported'][0]->item_exported=='1')
			{
				$data['items'] = $this->Items_model->get_rev_items_by_id($id);
				$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
			}
			else
			{
				$data['items'] = $this->Items_model->get_item_by_id($id);
			}
		}
		else
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
		}
		//echo '<pre>';
		//print_r($data['items']);
		//die();
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['rev_history'] = $this->Items_model->get_rev_item_history($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$this->load->view('admin/includes/_header', $data);
		if($this->session->userdata('role_id') == 6)
		{
			$this->load->view('admin/items/rev_items_combine_view', $data);
		}
		elseif($this->session->userdata('role_id') == 2)
		{
			$this->load->view('admin/items/rev_items_combine_ss_view', $data);
		}
		elseif($this->session->userdata('role_id') == 4)
		{
			$this->load->view('admin/items/rev_items_combine_ae_view', $data);
		}
		elseif($this->session->userdata('role_id') == 5)
		{
			$this->load->view('admin/items/rev_items_combine_psy_view', $data);
		}
		elseif($this->session->userdata('role_id') == 1)
		{
			$this->load->view('admin/items/rev_items_combine_view', $data);
		}
		$this->load->view('admin/includes/_footer');
	}

	public function get_rev_item_history($id = 0)
	{
		
		$data['title'] = 'View Item History';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_item_history($id);//
		//$data['logs'] = $this->Items_model->get_item_logs($id);
		
		if(isset($data['items'])&&(!empty($data['items'])))
		{
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_approvedby);
			$data['aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_reviewedby);
			$data['psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_commentby_psy);
			$data['irinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_revid);
			$data['rev_ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_ss_id);
			$data['rev_aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_ae_id);
			$data['rev_psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_psy_id);
		}
		else
		{
			$data['items'] = '';
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_history_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function get_item_history_compare($id = 0)
	{
		//print_r($id);
		//die();
		$temp = explode('-',$id);
		$item_his_id = $temp[0];
		$item_id = $temp[1];
		$log_id = $temp[2];
		$data['title'] = 'View Item History';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_compare($item_id);
		$data['itemshistory'] = $this->Items_model->get_item_history($item_his_id);
		$data['itemshis_remains'] = $this->Items_model->get_item_history_remain($item_id, $item_his_id);

		$merged_array = array_merge($data['itemshis_remains'],$data['itemshistory']);
		$data['merged_array'] = $merged_array;
		$data['onelog'] = $this->Items_model->get_one_log($log_id);
		if(isset($data['items'])&&(!empty($data['items'])))
		{
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
			$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
			$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		}
		else
		{
			$data['items'] = '';
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_history_compare_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function get_rev_item_history_compare($id = 0)
	{
		$temp = explode('-',$id);
		$item_his_id = $temp[0];
		$item_id = $temp[1];
		$log_id = $temp[2];
		$data['title'] = 'View Rev-Item History';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_rev_item_compare($item_id);

		if($this->session->userdata('role_id')==6)
		{
			$data['itemshistory'] = $this->Items_model->get_item_history($item_his_id);
			$data['itemshis_remains'] = $this->Items_model->get_item_history_remain($item_id, $item_his_id);
		}
		else
		{
			$data['itemshistory'] = $this->Items_model->get_rev_item_history($item_his_id);
			$data['itemshis_remains'] = $this->Items_model->get_item_history_remain($item_id, $item_his_id);
			$data['itemshis_remains_revs'] = $this->Items_model->get_rev_item_history_remain($item_id, $item_his_id);

			$merged_array = array_merge($data['itemshis_remains_revs'],$data['itemshis_remains']);
			$data['merged_array'] = $merged_array;
		}
		$data['onelog'] = $this->Items_model->get_one_log($log_id);
		if(isset($data['items'])&&(!empty($data['items'])))
		{
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['irinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_revid);
			$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
			$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
			$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		}
		else
		{
			$data['items'] = '';
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_history_compare_view', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function get_pilot_item_history_compare($id = 0)
	{
		$temp = explode('-',$id);
		$item_his_id = $temp[0];
		$item_id = $temp[1];
		$log_id = $temp[2];
		$merged_array = '';

		$data['title'] = 'View Pilot-Item History';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_pilot_item_compare($item_id);
		$data['itemshistory'] = $this->Items_model->get_pilot_item_history($item_his_id);
		$data['itemshis_remains'] = $this->Items_model->get_item_history_remain($item_id, $item_his_id);
		$data['itemshis_remains_revs'] = $this->Items_model->get_rev_item_history_remain($item_id, $item_his_id);
		$data['itemshis_remains_pilots'] = $this->Items_model->get_pilot_item_history_remain($item_id, $item_his_id);
		
		$merged_array = array_merge($data['itemshis_remains_pilots'],$data['itemshis_remains_revs']);
		$merged_array = array_merge($merged_array,$data['itemshis_remains']);
		$data['merged_array'] = $merged_array;
		$data['alllog'] = $this->Items_model->get_all_log($item_id);
		$data['onelog'] = $this->Items_model->get_one_log($log_id);

		if(isset($data['items'])&&(!empty($data['items'])))
		{
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['irinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_revid);
			$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
			$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
			$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		}
		else
		{
			$data['items'] = '';
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_history_compare_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function history_compare($id = 0)
	{
		$merged_array = '';

		$data['title'] = 'View Pilot-Item History';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_pilot_item_compare($id);

		$data['itemshis'] = $this->Items_model->fp_ihis($id);
		$data['itemshis_revs'] = $this->Items_model->rev_ihis($id);
		$data['itemshis_pilots'] = $this->Items_model->pilot_ihis($id);
		
		$merged_array = array_merge($data['itemshis_pilots'],$data['itemshis_revs']);
		$merged_array = array_merge($merged_array,$data['itemshis']);
		$data['merged_array'] = $merged_array;
		//print_r($data['merged_array']);
		//die();

		$data['alllog'] = $this->Items_model->get_all_log($id);
		//$data['onelog'] = $this->Items_model->get_one_log($id);

		if(isset($data['items'])&&(!empty($data['items'])))
		{
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['irinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_revid);
			$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_rev_ss_id);
			$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_rev_ae_id);
			$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_rev_psy_id);
		}
		else
		{
			$data['items'] = '';
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/items_history_compare_view', $data);
		$this->load->view('admin/includes/_footer');
	}
    
    public function duplicate_compare($id = 0)
	{
        
        $temp = explode('_',$id);
        $id = $temp[0];
        $dup_id = $temp[1];
        $datafortwo['title'] = 'View Item Filmzy';
        
        //first item
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['item_exported'] = $this->Items_model->find_exported($id);
		if($data['item_exported'][0]->item_exported=='1')
		{
			$data['items'] = $this->Items_model->get_rev_items_by_id($id);
			$data['irinfo'] = $this->Items_model->get_irinfo_by_id($data['items'][0]->item_rev_revid);
		}
		else
		{
			$data['items'] = $this->Items_model->get_item_by_id($id);
		}
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
       
        //Second item
		$data2['grades'] = $this->Items_model->get_all_grades();
		$data2['item_exported'] = $this->Items_model->find_exported($dup_id);
		if($data2['item_exported'][0]->item_exported=='1')
		{
			$data2['items'] = $this->Items_model->get_rev_items_by_id($dup_id);
			$data2['irinfo'] = $this->Items_model->get_irinfo_by_id($data2['items'][0]->item_rev_revid);
		}
		else
		{
			$data2['items'] = $this->Items_model->get_item_by_id($dup_id);
		}
		$data2['history'] = $this->Items_model->get_item_history($dup_id);
		$data2['logs'] = $this->Items_model->get_item_logs($dup_id);
		$data2['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data2['items'][0]->item_submittedby);
        
        $datafortwo['result1'] = $data;
        $datafortwo['result2'] = $data2;
        
		$this->load->view('admin/includes/_header', $datafortwo);
		$this->load->view('admin/items/items_duplicate_compare_view', $datafortwo);
		$this->load->view('admin/includes/_footer');
	}
	
	public function app_items()
	{
		$data['title'] = 'Approved Item List';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['boards'] = $this->Items_model->get_all_boards();
		$data['series'] = $this->Items_model->get_all_series();
		$data['cstands'] = $this->Items_model->get_all_cstands();
		$data['itemwriters'] = $this->Items_model->get_all_itemwriters();
		
		if($this->input->post('submit_search'))
		{				
			$data['item_lang'] = ( $this->input->post('item_lang') != '' ? $this->input->post('item_lang') : 0);
			$data['item_curriculum'] = ( $this->input->post('item_curriculum') != '' ? $this->input->post('item_curriculum') : 0);
			$data['subject_series_id'] = ( $this->input->post('subject_series_id') != '' ? $this->input->post('subject_series_id') : 0);
			$data['item_grade_id'] = ( $this->input->post('item_grade_id') != '' ? $this->input->post('item_grade_id') : 0);
			$data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
			$data['item_cstand_id'] = ( $this->input->post('item_cstand_id') != '' ? $this->input->post('item_cstand_id') : 0);
			$data['item_subcstand_id'] = ( $this->input->post('item_subcstand_id') != '' ? $this->input->post('item_subcstand_id') : 0);
			$data['item_submittedby'] = ( $this->input->post('item_submittedby') != '' ? $this->input->post('item_submittedby') : 0);
			$data['item_type'] = ( $this->input->post('item_type') != '' ? $this->input->post('item_type') : 0);
			
			$data['subjects'] = $this->Items_model->get_subjects_by_grade_board_series($this->input->post('item_grade_id'),$this->input->post('item_curriculum'),$this->input->post('subject_series_id'));
			$data['subcstands'] = $this->Items_model->get_subcstands_by_subject_cstrand_multi($this->input->post('item_cstand_id'), $this->input->post('item_subject_id'));	
		}
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/app_items_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_app_items_list($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type)
	{
		$records = $this->Items_model->get_all_app_items_multi_iwsubjects($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type);
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//echo '<pre>';
			//print_r($row);
			//die();
			$item_bloom = '';

			if($row['item_cognitive_bloom']==1)
			{$item_bloom = 'Remembering';}
			elseif($row['item_cognitive_bloom']==2)
			{$item_bloom = 'Understanding';}
			elseif($row['item_cognitive_bloom']==3)
			{$item_bloom = 'Applying';}
			elseif($row['item_cognitive_bloom']==4)
			{$item_bloom = 'Analysing';}
			elseif($row['item_cognitive_bloom']==5)
			{$item_bloom = 'Evaluating';}
			else
			{$item_bloom = 'Creating';}

			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a> <a target="_blank" title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_combine/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>';
				
			}
			else
			{
				$editoption = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_combine_app/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a target="_blank" title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_combine/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/app_delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
			}
			
			$item_option_correct = '';
			if($row['item_type'] == 'TF' && $row['item_lang'] == 'eng')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = 'True';
				else
					$item_option_correct = 'False';		
			}
			if($row['item_type'] == 'TF' && $row['item_lang'] == 'urdu')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">درست</div>';
				else
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">غلط</div>';		
			}
			
			//file in the blanks
			if($row['item_type'] == 'FIB' && $row['item_lang'] == 'eng')
			{
				$item_option_correct = $row['item_fib_key_eng'];	
			}
			if($row['item_type'] == 'FIB' && $row['item_lang'] == 'urdu')
			{
				$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_fib_key_ur'].'</div>';	
			}
			
			//MCQ
			if($row['item_type'] == 'MCQ' && $row['item_lang'] == 'eng')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_a_en']);
				if($row['item_option_correct'] == 'b')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_b_en']);
				if($row['item_option_correct'] == 'c')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_c_en']);
				if($row['item_option_correct'] == 'd')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_d_en']);			
			}
			if($row['item_type'] == 'MCQ' && $row['item_lang'] == 'urdu')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_a_ur']).'</div>';
				if($row['item_option_correct'] == 'b')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_b_ur']).'</div>';
				if($row['item_option_correct'] == 'c')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_c_ur']).'</div>';
				if($row['item_option_correct'] == 'd')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_d_ur']).'</div>';
			}
			
			$data[]= array(
				'<input type="checkbox" class="checkbox" name="selected[]" value="'.$row['item_id'].'" />',
				++$i,
				/*$row['item_batch'],*/
				$row['item_type'],
				$row['item_id'],
				$item_bloom,
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):'<div class="urdufont-right" style="text-align:right;">'.html_entity_decode($row['item_stem_ur']).'</div>',
				$item_option_correct,
				$row['grade_name_en'],
				$row['gradesubject'],
				$row['subcs_topic_en'],
				$row['username'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	public function app_delete($id = 0)
	{
		//die('Sorry!!! Item cannot be delete!!! Restrictions');
		$this->db->delete('ci_items', array('item_id' => $id));
		$data = array(
					'log_itemid' => $id,
					'log_title' => 'Item deleted by IW',
					'log_message' => 'Item {{log_itemid}} deleted by itemwriter {{itemwriter_id}} on {{log_date}}',
					'log_messagetype' =>'deleted',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
		$log = $this->Items_model->log_entry($data);
		$this->session->set_flashdata('success', 'Item has been deleted successfully!');
		redirect(base_url('admin/items/app_items'));
	}
    public function subcstands_by_cstand_subject()
	{
		echo json_encode($this->Items_model->get_subcstands_by_cstand_subject($this->input->post('cs_id'),$this->input->post('item_subject_id')));
	}
	public function subcstands_by_cstand_subject_multi()
	{
		echo json_encode($this->Items_model->get_subcstands_by_cstand_subject_multi($this->input->post('cs_id'),$this->input->post('item_subject_id')));
	}
	public function delete_multiple_items() {
		 $ids = $this->input->post('ids');
		 if(!empty($ids)) {
			  $this->db->where_in('item_id', $ids);
			  $this->db->delete('ci_items');
			  echo json_encode(['status' => true, 'message' => 'Records deleted successfully']);
		 } else {
			  echo json_encode(['status' => false, 'message' => 'No records selected']);
		 }
	}

	public function ad_search()
	{
		$data['title'] = 'Advance Search';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['boards'] = $this->Items_model->get_all_boards();
		$data['series'] = $this->Items_model->get_all_series();
		$data['cstands'] = $this->Items_model->get_all_cstands();
		//$data['itemwriters'] = $this->Items_model->get_all_itemwriters();
		
		$data['iwsubjects'] = $this->Items_model->get_subjects_by_iw();
		
		if($this->input->post('submit_search'))
		{				
			$data['item_lang'] = ( $this->input->post('item_lang') != '' ? $this->input->post('item_lang') : 0);
			$data['item_curriculum'] = ( $this->input->post('item_curriculum') != '' ? $this->input->post('item_curriculum') : 0);
			$data['subject_series_id'] = ( $this->input->post('subject_series_id') != '' ? $this->input->post('subject_series_id') : 0);
			$data['item_grade_id'] = ( $this->input->post('item_grade_id') != '' ? $this->input->post('item_grade_id') : 0);
			$data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
			$data['item_cstand_id'] = ( $this->input->post('item_cstand_id') != '' ? $this->input->post('item_cstand_id') : 0);
			$data['item_subcstand_id'] = ( $this->input->post('item_subcstand_id') != '' ? $this->input->post('item_subcstand_id') : 0);
			$data['item_submittedby'] = ( $this->input->post('item_submittedby') != '' ? $this->input->post('item_submittedby') : 0);
			$data['item_type'] = ( $this->input->post('item_type') != '' ? $this->input->post('item_type') : 0);
			
			$data['subjects'] = $this->Items_model->get_subjects_by_grade_board_series($this->input->post('item_grade_id'),$this->input->post('item_curriculum'),$this->input->post('subject_series_id'));
			$data['subcstands'] = $this->Items_model->get_subcstands_by_subject_cstrand_multi($this->input->post('item_cstand_id'), $this->input->post('item_subject_id'));	
		}
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/items/advance_search');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_iw_items_list($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type)
	{
		$records = $this->Items_model->get_all_app_items($item_lang, $item_curriculum, $subject_series_id, $item_grade_id, $item_subject_id, $item_cstand_id, $item_subcstand_id, $item_submittedby, $item_type);
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			//echo '<pre>';
			//print_r($row);
			//die();
			$item_bloom = '';

			if($row['item_cognitive_bloom']==1)
			{$item_bloom = 'Remembering';}
			elseif($row['item_cognitive_bloom']==2)
			{$item_bloom = 'Understanding';}
			elseif($row['item_cognitive_bloom']==3)
			{$item_bloom = 'Applying';}
			elseif($row['item_cognitive_bloom']==4)
			{$item_bloom = 'Analysing';}
			elseif($row['item_cognitive_bloom']==5)
			{$item_bloom = 'Evaluating';}
			else
			{$item_bloom = 'Creating';}

			if($this->session->userdata('role_id')==3)
			{
				$editoption ='';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_combine/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
				
			}
			else
			{
				$editoption = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/items/view_combine_app/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>
				<a target="_blank" title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/items/edit_combine/'.$row['item_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/items/app_delete/".$row['item_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
			}
			
			$item_option_correct = '';
			if($row['item_type'] == 'TF' && $row['item_lang'] == 'eng')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = 'True';
				else
					$item_option_correct = 'False';		
			}
			if($row['item_type'] == 'TF' && $row['item_lang'] == 'urdu')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">درست</div>';
				else
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">غلط</div>';		
			}
			
			//file in the blanks
			if($row['item_type'] == 'FIB' && $row['item_lang'] == 'eng')
			{
				$item_option_correct = $row['item_fib_key_eng'];	
			}
			if($row['item_type'] == 'FIB' && $row['item_lang'] == 'urdu')
			{
				$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_fib_key_ur'].'</div>';	
			}
			
			//MCQ
			if($row['item_type'] == 'MCQ' && $row['item_lang'] == 'eng')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_a_en']);
				if($row['item_option_correct'] == 'b')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_b_en']);
				if($row['item_option_correct'] == 'c')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_c_en']);
				if($row['item_option_correct'] == 'd')
					$item_option_correct = $row['item_option_correct'].': '.html_entity_decode($row['item_option_d_en']);			
			}
			if($row['item_type'] == 'MCQ' && $row['item_lang'] == 'urdu')
			{
				if($row['item_option_correct'] == 'a')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_a_ur']).'</div>';
				if($row['item_option_correct'] == 'b')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_b_ur']).'</div>';
				if($row['item_option_correct'] == 'c')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_c_ur']).'</div>';
				if($row['item_option_correct'] == 'd')
					$item_option_correct = '<div class="urdufont-right" style="text-align:right;">'.$row['item_option_correct'].': '.html_entity_decode($row['item_option_d_ur']).'</div>';
			}
			
			$data[]= array(
				'<input type="checkbox" class="checkbox" name="selected[]" value="'.$row['item_id'].'" />',
				++$i,
				/*$row['item_batch'],*/
				$row['item_type'],
				$row['item_id'],
				$item_bloom,
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):'<div class="urdufont-right" style="text-align:right;">'.html_entity_decode($row['item_stem_ur']).'</div>',
				$item_option_correct,
				$row['grade_name_en'],
				$row['gradesubject'],
				$row['subcs_topic_en'],
				$row['username'],
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
}
?>