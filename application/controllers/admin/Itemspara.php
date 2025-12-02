<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Itemspara extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Itemspara_model', 'Itemspara_model');
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index()
	{
		$data['title'] = 'Paragraph List';
		//get_all_grades
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/itemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-------------------------------------------------------------------------	
	public function datatable_json($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Itemspara_model->get_all_itemspara_IW($this->session->userdata('admin_id'),$id);
		}
		else
		{
			$records = $this->Itemspara_model->get_all_itemspara($id);
		}
		
		//print_r($records);
		//die($id.'='.$this->session->userdata('role_id'));
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_status'] == 1)
			{
				$status='Draft/Pending';
			}
			elseif($row['para_status'] == 2)
			{
				$status='Submitted';
			}
			elseif($row['para_status'] == 3)
			{
				$status='Rejected';
			}
			elseif($row['para_status'] == 4)
			{
				$status='Accepted';
			}
			//$status = ($row['para_status'] == 1)? 'checked': '';
			
			
			if($this->session->userdata('role_id')==3)
			{
				if($row['para_status'] == 1 || $row['para_status'] == 3)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemspara/edit/'.$row['para_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemspara/delete/".$row['para_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			
			
			
			$data[]= array(
				++$i,
				$row['para_createdby'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['para_id'].'" 
				id="cb_'.$row['para_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['para_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	//---------------------------------------------SS Functions Starts----------
	public function ss_pindex()
	{
		$data['title'] = 'Paragraph List (Submitted by Itemwriters)';
		//get_all_grades
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/ss_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function datatable_json_ss_itempara($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_itemspara_SS($this->session->userdata('admin_id'),$subjectList,234);
		}
		else
		{
			die('Not Authorized');
			//$records = $this->Itemspara_model->get_all_itemspara($id);
		}
		
		//print_r($records);
		//die($id.'='.$this->session->userdata('role_id'));
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_status_ss'] == 0)
			{
				$status='Pending';
			}
			elseif($row['para_status_ss'] == 1)
			{
				$status='Rejected';
			}
			elseif($row['para_status_ss'] == 2)
			{
				$status='Accepted';
			}
			elseif($row['para_status_ss'] == 3)
			{
				$status='Accepted';
			}
			//$status = ($row['para_status'] == 1)? 'checked': '';
			
			
			if($this->session->userdata('role_id')==2)
			{
				if($row['para_status_ss'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemspara/edit/'.$row['para_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemspara/delete/".$row['para_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
					*/
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
		
			
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['para_id'].'" 
				id="cb_'.$row['para_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['para_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		//print_r($data);
		//die();
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function rev_pindex()
	{
		$data['title'] = 'Paragraph List';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_eitemspara()
	{
		$data['title'] = 'Paragraph List';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_eitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_aitemspara()
	{
		$data['title'] = 'Paragraph List';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_aitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_ss_pitemspara()
	{
		$data['title'] = 'Pending ItemsPara List';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ss_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_ss_eitemspara()
	{
		$data['title'] = 'Under Reviewed ItemsPara List';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ss_eitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_ss_aitemspara()
	{
		$data['title'] = 'Accepted Items ItemsPara List';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ss_aitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_itempara($id = 0)
	{	
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_itemspara_REV($this->session->userdata('admin_id'),$subjectList,234);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_status_ae'] == 2)
			{
				$status='Pending';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_eitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_eitemspara_REV($this->session->userdata('admin_id'),$subjectList,234);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_status'] == 1)
			{
				$status='Under Review';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_aitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_aitemspara_REV($this->session->userdata('admin_id'),$subjectList,234);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_status'] == 2)
			{
				$status='Reviewed';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_aview/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_ss_pitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_pitemspara_rev_ss($this->session->userdata('admin_id'),$subjectList);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_ss_status'] == 0)
			{
				$status='Pending';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_ss_eitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_eitemspara_rev_ss($this->session->userdata('admin_id'),$subjectList);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_ss_status'] == 1)
			{
				$status='Under Review';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_ss_aitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_aitemspara_rev_ss($this->session->userdata('admin_id'),$subjectList,234);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_ss_status'] == 2)
			{
				$status='Reviewed';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_ss_aview/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function ss_submit_for_approval($id=0)
	{
		if($this->input->post('para_comment_ss')=="")
		{
			$this->form_validation->set_rules('para_comment_ss', 'Itempara Comments SS', 'trim|required');
			$this->session->set_flashdata('error', 'Itempara comments required!');
			redirect(base_url('admin/itemspara/ss_view/'.$id));
		}
		else
		{
			$para_status_ss ='';
			$para_status = '';
			$log_messagetype ='';
			$log_title ='';
			if($this->input->post('submit_awc'))
			{
				$para_status_ss ='2';
				$para_status = '4';
				$log_messagetype = 'ss_accept_w_c';
				$log_title ='Item Paragraph Accpeted by SS with change';
			}
			elseif($this->input->post('submit_awoc'))
			{
				$para_status_ss ='3';
				$para_status = '4';
				$log_messagetype = 'ss_accept_wo_c';
				$log_title ='Item Paragraph Accpeted by SS without change';
			}
			else{
				$para_status_ss ='1';
				$para_status = '1';
				$log_title ='Item Paragraph Rejected by SS';
				$log_messagetype ='ss_rejected';
			}
			$keyword ='Ginger';
				$para_comment_ss = $this->input->post('para_comment_ss');
				
				if(strpos($para_comment_ss, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
			$data = array(
					'para_comment_ss' => $para_comment_ss,
					'para_status_ss' => $para_status_ss,
					'para_status' => $para_status,
					'para_approvedby' => $this->session->userdata('admin_id'),
					'para_approved' => date("Y-m-d h:i:s")
				);
				
			$result = $this->Itemspara_model->ss_submit_for_approval($data, $id);
			
			if($result){
				$ids = 21;
				$datag['paragraph'] = $this->Itemspara_model->get_itemspara_by_id($id);
				$datag['paragraph'] = $datag['paragraph'][0];
				(isset($datag['paragraph']->para_item_21) && $datag['paragraph']->para_item_21!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_22) && $datag['paragraph']->para_item_22!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_23) && $datag['paragraph']->para_item_23!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_24) && $datag['paragraph']->para_item_24!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_25) && $datag['paragraph']->para_item_25!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_26) && $datag['paragraph']->para_item_26!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_27) && $datag['paragraph']->para_item_27!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_28) && $datag['paragraph']->para_item_28!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_29) && $datag['paragraph']->para_item_29!=0) ? $ids++ : $ids;
				(isset($datag['paragraph']->para_item_30) && $datag['paragraph']->para_item_30!=0) ? $ids++ : $ids;
				
				for($i=21; $i<$ids; $i++)
				{	
					$temp = "para_item_".$i;
					$datai = array(
						'log_itemid' => $datag['paragraph']->$temp,
						'log_title' => 'Item attached with Itemspara submitted by SS',
						'log_message' => 'Item{{'.$datag['paragraph']->$temp.'}} attached with Itemspara {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$logi = $this->Itemspara_model->log_entry($datai);
				}
				/*$data = array(
					'log_itemid' => $id,
					'log_title' => $log_title,
					'log_message' => 'Itemspara {{log_itemid}} changed by {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>$log_messagetype,
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$log = $this->Itemspara_model->log_entry($data);*/
				$this->session->set_flashdata('success', 'Itempara has been submitted successfully!');
				redirect(base_url('admin/itemspara/ss_pindex'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/itemspara/ss_pindex'),'refresh');
			}
		}
	} 
	//---------------------------------------------SS Functions Ends----------
	public function rev_ae_pitemspara()
	{
		$data['title'] = 'Pending ItemsPara List (AE)';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ae_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_ae_eitemspara()
	{
		$data['title'] = 'Under Reviewed ItemsPara List (AE)';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ae_eitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_ae_aitemspara()
	{
		$data['title'] = 'Accepted Items ItemsPara List (AE)';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ae_aitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_psy_pitemspara()
	{
		$data['title'] = 'Pending ItemsPara List (PSM)';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_psy_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function rev_psy_aitemspara()
	{
		$data['title'] = 'Accepted Items ItemsPara List (AE)';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_psy_aitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_ae_pitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_pitemspara_rev_ae($this->session->userdata('admin_id'),$subjectList);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_ae_status'] == 0)
			{
				$status='Pending';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_ae_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_ae_eitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_eitemspara_rev_ae($this->session->userdata('admin_id'),$subjectList);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_ae_status'] == 1)
			{
				$status='Under Review';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_ae_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_ae_aitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_aitemspara_rev_ae($this->session->userdata('admin_id'),$subjectList,234);
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_ae_status'] == 2)
			{
				$status='Reviewed';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_ae_aview/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------AE Functions Starts-------------
	public function datatable_json_rev_psy_pitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==5)
		{
			$records = $this->Itemspara_model->get_all_pitemspara_rev_psy();
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_psy_status'] == 0)
			{
				$status='Pending';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_psy_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function datatable_json_rev_psy_aitempara($id = 0)
	{	
		if($this->session->userdata('role_id')==5)
		{
			$records = $this->Itemspara_model->get_all_aitemspara_rev_psy();
		}
		else
		{
			die('Not Authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_rev_ae_status'] == 2)
			{
				$status='Reviewed';
			}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/rev_psy_aview/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['firstname'].' '.$row['lastname'],
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------------------------
	public function ae_pindex()
	{
		$data['title'] = 'Paragraph List (Approved by SS)';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/ae_pitemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function datatable_json_ae_itempara($id = 0)
	{
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemspara_model->get_all_itemspara_AE($this->session->userdata('admin_id'),$subjectList,23);
		}
		else
		{
			$records = $this->Itemspara_model->get_all_itemspara($id);
		}
		
		//print_r($records);
		//die($id.'='.$this->session->userdata('role_id'));
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status_ss='';
			$status_ae='';
			$editoption='';
			
			if($row['para_status_ss'] == 0)
			{$status_ss='Pending';}
			elseif($row['para_status_ss'] == 1)
			{$status_ss='Rejected';}
			elseif($row['para_status_ss'] == 2)
			{$status_ss='Accepted with change';}
			else
			{$status_ss='Accepted without change';}
			
			if($row['para_status_ae'] == 0)
			{$status_ae='Pending';}
			elseif($row['para_status_ae'] == 1)
			{$status_ae='Rejected';}
			else
			{$status_ae='Accepted';}
			
			if($this->session->userdata('role_id')==4)
			{
				if($row['para_status_ae'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ae_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ae_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			
			$data[]= array(
				++$i,
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status_ss,
				$status_ae,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['para_id'].'" 
				id="cb_'.$row['para_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['para_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function ae_submit_for_approval($id=0)
	{
		if($this->input->post('para_comment_ae')=="")
		{
			$this->form_validation->set_rules('para_comment_ae', 'Itempara Comments SS', 'trim|required');
			$this->session->set_flashdata('error', 'Itempara comments required!');
			redirect(base_url('admin/itemspara/ae_view/'.$id));
		}
		else
		{
			$keyword ='Ginger';
			$para_comment_ae = $this->input->post('para_comment_ae');
			if(strpos($para_comment_ae, $keyword) !== false)
			{
				die('You are not allowed to "Add" items. Please contact to PEC IT Team');
			}
				
			$para_status_ae ='';
			if($this->input->post('approve'))
			{
				$para_status_ae ='2';
			}
			else{
				$para_status_ae ='1';
				$para_status_ss ='0';
			}
			$data = array(
					'para_comment_ae' => $para_comment_ae,
					'para_status_ae' => $para_status_ae,
					'para_reviewed' => date("Y-m-d H:i:s"),
					'para_reviewedby' => $this->session->userdata('admin_id'),
				);
			//print_r($data);
			//die();
			$result = $this->Itemspara_model->ae_submit_for_approval($data, $id);
			if($result){
				/*$data = array(
					'log_itemid' => $id,
					'log_title' => 'Itemspara approved by AE',
					'log_message' => 'Itemspara {{log_itemid}} approved by {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'approved',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$log = $this->Itemspara_model->log_entry($data);*/
				$this->session->set_flashdata('success', 'Itempara has been updated successfully!');
				redirect(base_url('admin/itemspara/ae_pindex'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/itemspara/ae_pindex'),'refresh');
			}
		}
	} 
	//---------------------------------------------AE Functions Ends-------------
	public function rev_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==6)
		{
			if($this->input->post('submit'))
			{
				$result_rev = $this->Itemspara_model->find_rev_itemspara_by_id($id);
				if(empty($result_rev))
				{
					//die('empty');
					$keyword ='Ginger';
					$para_text_en = $data['para'][0]->para_text_en;
					$para_text_ur = $data['para'][0]->para_text_ur;
					$para_comment_ss = $data['para'][0]->para_comment_ss;
					$para_comment_ae = $data['para'][0]->para_comment_ae;
					$para_comment_psy = $data['para'][0]->para_comment_psy;
					$para_rev_comment = $this->input->post('para_rev_comment');
					
					if(strpos($para_text_en, $keyword) !== false ||
					   strpos($para_text_ur, $keyword) !== false ||
					   strpos($para_comment_ss, $keyword) !== false ||
					   strpos($para_comment_ae, $keyword) !== false ||
					   strpos($para_comment_psy, $keyword) !== false ||
					   strpos($para_rev_comment, $keyword) !== false)
					{
						die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					}
					$data['para'] = $this->Itemspara_model->get_itemspara_by_id($id);
					$data = array(
								'para_id' => $data['para'][0]->para_id,
								'para_title_en' => $data['para'][0]->para_title_en,
								'para_title_ur' => $data['para'][0]->para_title_ur,
								'para_text_en' => $data['para'][0]->para_text_en,
								'para_text_ur' => $data['para'][0]->para_text_ur,
								'para_img_position' => $data['para'][0]->para_img_position,
								'para_start_from' => $data['para'][0]->para_start_from,
								'para_grade_id' => $data['para'][0]->para_grade_id,
								'para_subject_id' => $data['para'][0]->para_subject_id,
								'para_item_21' => $data['para'][0]->para_item_21,
								'para_item_22' => $data['para'][0]->para_item_22,
								'para_item_23' => $data['para'][0]->para_item_23,
								'para_item_24' => $data['para'][0]->para_item_24,
								'para_item_25' => $data['para'][0]->para_item_25,
								'para_item_26' => $data['para'][0]->para_item_26,
								'para_item_27' => $data['para'][0]->para_item_27,
								'para_item_28' => $data['para'][0]->para_item_28,
								'para_item_29' => $data['para'][0]->para_item_29,
								'para_item_30' => $data['para'][0]->para_item_30,
								'para_statistics' => $data['para'][0]->para_statistics,
								'para_ordering' => $data['para'][0]->para_ordering,
								'para_status' => $data['para'][0]->para_status,
								'para_createdby' => $data['para'][0]->para_createdby,
								'para_created' => $data['para'][0]->para_created,
								'para_status_ss' => $data['para'][0]->para_status_ss,
								'para_comment_ss' => $data['para'][0]->para_comment_ss,
								'para_approved' => $data['para'][0]->para_approved,
								'para_approvedby' => $data['para'][0]->para_approvedby,
								'para_status_ae' => $data['para'][0]->para_status_ae,
								'para_comment_ae' => $data['para'][0]->para_comment_ae,
								'para_reviewed' => $data['para'][0]->para_reviewed,
								'para_reviewedby' => $data['para'][0]->para_reviewedby,
								'para_status_psy' => $data['para'][0]->para_status_psy,
								'para_comment_psy' => $data['para'][0]->para_comment_psy,
								'para_commentby_psy' => $data['para'][0]->para_commentby_psy,
								'para_date_psy' => $data['para'][0]->para_date_psy,
								'para_updated' => $data['para'][0]->para_updated,
								'para_updatedby' => $data['para'][0]->para_updatedby
							);
					$data['para_rev_status'] = '2';
					$data['para_rev_revid'] = $this->session->userdata('admin_id');
					$data['para_rev_date_acc'] = date("Y-m-d H:i:s");
					$data['para_rev_date_exp'] = date("Y-m-d H:i:s");
					$data['para_rev_comment'] = $this->input->post('para_rev_comment');
					$result = $this->Itemspara_model->add_itemspara_rev($data);
					if($result)
						{
							$result = $this->Itemspara_model->update_itemspara_exported('1',$id);
							/*$data = array(
								'log_itemid' => $id,
								'log_title' => 'Itemspara reviewed by Item Reviewer',
								'log_message' => 'Item {{log_itemid}} reviewed by Item Reviewer {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'rev_submitted',
								'log_admin_id' => $this->session->userdata('admin_id')
							);
							$log = $this->Itemspara_model->log_entry($data);*/
							$ids = 21;
							$datag['paragraph'] = $this->Itemspara_model->get_itemspara_by_id($id);
							$datag['paragraph'] = $datag['paragraph'][0];
							(isset($datag['paragraph']->para_item_21) && $datag['paragraph']->para_item_21!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_22) && $datag['paragraph']->para_item_22!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_23) && $datag['paragraph']->para_item_23!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_24) && $datag['paragraph']->para_item_24!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_25) && $datag['paragraph']->para_item_25!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_26) && $datag['paragraph']->para_item_26!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_27) && $datag['paragraph']->para_item_27!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_28) && $datag['paragraph']->para_item_28!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_29) && $datag['paragraph']->para_item_29!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_30) && $datag['paragraph']->para_item_30!=0) ? $ids++ : $ids;

							for($i=21; $i<$ids; $i++)
							{	
								$temp = "para_item_".$i;
								$datai = array(
									'log_itemid' => $datag['paragraph']->$temp,
									'log_title' => 'Item attached with Itemspara submitted by IR',
									'log_message' => 'Item{{'.$datag['paragraph']->$temp.'}} attached with Itemspara {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
									'log_messagetype' =>$log_messagetype,
									'log_admin_id' => $this->session->userdata('admin_id')
								);
								$logi = $this->Itemspara_model->log_entry($datai);
							}
							$this->session->set_flashdata('success', 'Itemspara has been aceepted for piloting successfully!');
							redirect(base_url('admin/Itemspara/rev_pindex'),'refresh');
						}
					else
					{
						$this->session->set_flashdata('errors', 'Error in Revision of Items!!! Please contact PEC IT Team');
						redirect(base_url('admin/Itemspara/rev_pindex'),'refresh');
					}	
				}
				else
				{
					if($result_rev[0]->para_rev_revid==$this->session->userdata('admin_id'))
					{
						
						$keyword ='Ginger';
						$para_rev_comment = $this->input->post('para_rev_comment');
						
						if(strpos($para_rev_comment, $keyword) !== false)
						{
							die('You are not allowed to "Add" items. Please contact to PEC IT Team');
						}
						$data['para_rev_status'] = '2';
						$data['para_rev_date_acc'] = date("Y-m-d H:i:s");
						$data['para_rev_comment'] = $this->input->post('para_rev_comment');
						$result = $this->Itemspara_model->edit_itemspara_rev($data, $id);
						
						$log_messagetype='';
						if($this->session->userdata('role_id')==6)
						{$log_messagetype='rev_updated';}
						else
						{$log_messagetype='updated';}
						
						if($result){
							$ids = 21;
							$datag['paragraph'] = $this->Itemspara_model->get_itemspara_by_id($id);
							$datag['paragraph'] = $datag['paragraph'][0];
							(isset($datag['paragraph']->para_item_21) && $datag['paragraph']->para_item_21!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_22) && $datag['paragraph']->para_item_22!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_23) && $datag['paragraph']->para_item_23!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_24) && $datag['paragraph']->para_item_24!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_25) && $datag['paragraph']->para_item_25!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_26) && $datag['paragraph']->para_item_26!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_27) && $datag['paragraph']->para_item_27!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_28) && $datag['paragraph']->para_item_28!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_29) && $datag['paragraph']->para_item_29!=0) ? $ids++ : $ids;
							(isset($datag['paragraph']->para_item_30) && $datag['paragraph']->para_item_30!=0) ? $ids++ : $ids;
							
							for($i=21; $i<$ids; $i++)
							{	
								$temp = "para_item_".$i;
								$datai = array(
									'log_itemid' => $datag['paragraph']->$temp,
									'log_title' => 'Item attached with Itemspara submitted by IR',
									'log_message' => 'Item{{'.$datag['paragraph']->$temp.'}} attached with Itemspara {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
									'log_messagetype' =>$log_messagetype,
									'log_admin_id' => $this->session->userdata('admin_id')
								);
								$logi = $this->Itemspara_model->log_entry($datai);
							}
							/*$data = array(
								'log_itemid' => $id,
								'log_admin_id' => $this->session->userdata('admin_id'),
								'log_title' => 'Itemspara Updated',
								'log_message' => 'Itemspara updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>$log_messagetype,
							);
							$log = $this->Itemspara_model->log_entry($data);*/
							$this->session->set_flashdata('success', 'Itemspara has been updated successfully!');
							if($this->session->userdata('role_id')==6)
							{
								redirect(base_url('admin/Itemspara/rev_pindex'));
								//$this->load->view('admin/Itemspara/rev_pitemspara');
							}
							else
							{
								die('Alert! You are not authorized here');
							}
						}
					}
					else
					{
						die('Alert! This Itemspara already assigned to other item reviewer');
					}
				}				
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	//---------------------------------------------------------------------------
	public function rev_ss_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$keyword ='Ginger';
				$para_rev_ss_comment = $this->input->post('para_rev_ss_comment');
				
				if(strpos($para_rev_ss_comment, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data['para_rev_ss_id'] = $this->session->userdata('admin_id');
				$data['para_rev_ss_status'] = '2';
				$data['para_rev_ss_date_acc'] = date("Y-m-d H:i:s");
				$data['para_rev_ss_comment'] = $this->input->post('para_rev_ss_comment');
				
				$result = $this->Itemspara_model->edit_itemspara_rev($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$ids = 21;
					$datag['paragraph'] = $this->Itemspara_model->get_itemspara_by_id($id);
					$datag['paragraph'] = $datag['paragraph'][0];
					(isset($datag['paragraph']->para_item_21) && $datag['paragraph']->para_item_21!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_22) && $datag['paragraph']->para_item_22!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_23) && $datag['paragraph']->para_item_23!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_24) && $datag['paragraph']->para_item_24!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_25) && $datag['paragraph']->para_item_25!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_26) && $datag['paragraph']->para_item_26!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_27) && $datag['paragraph']->para_item_27!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_28) && $datag['paragraph']->para_item_28!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_29) && $datag['paragraph']->para_item_29!=0) ? $ids++ : $ids;
					(isset($datag['paragraph']->para_item_30) && $datag['paragraph']->para_item_30!=0) ? $ids++ : $ids;
					
					for($i=21; $i<$ids; $i++)
					{	
						$temp = "para_item_".$i;
						$datai = array(
							'log_itemid' => $datag['paragraph']->$temp,
							'log_title' => 'Item attached with Itemspara submitted by IR',
							'log_message' => 'Item{{'.$datag['paragraph']->$temp.'}} attached with Itemspara {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemspara_model->log_entry($datai);
					}
					/*$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Itemspara Updated',
						'log_message' => 'Itemspara updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					$this->session->set_flashdata('success', 'Itemspara has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/Itemspara/rev_ss_pitemspara'));
						//$this->load->view('admin/Itemspara/rev_pitemspara');
					}
					else
					{
						die('Alert! You are not authorized here');
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	//---------------------------------------------------------------------------
	public function rev_ae_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==4)
		{
			if($this->input->post('submit'))
			{
				$keyword ='Ginger';
				$para_rev_ae_comment = $this->input->post('para_rev_ae_comment');
				
				if(strpos($para_rev_ae_comment, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				
				$data['para_rev_ae_id'] = $this->session->userdata('admin_id');
				$data['para_rev_ae_status'] = '2';
				$data['para_rev_ae_date_acc'] = date("Y-m-d H:i:s");
				$data['para_rev_ae_comment'] = $para_rev_ae_comment;
				
				$result = $this->Itemspara_model->edit_itemspara_rev($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					/*baad main karna hai
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Itemspara Updated',
						'log_message' => 'Itemspara updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					$this->session->set_flashdata('success', 'Itemspara has been updated successfully!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/Itemspara/rev_ae_pitemspara'));
						//$this->load->view('admin/Itemspara/rev_pitemspara');
					}
					else
					{
						die('Alert! You are not authorized here');
					}
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	//---------------------------------------------------------------------------
	public function rev_psy_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==5)
		{
			if($this->input->post('submit'))
			{
				$keyword ='Ginger';
				$para_rev_psy_comment = $this->input->post('para_rev_psy_comment');
				
				if(strpos($para_rev_psy_comment, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				$data['para_rev_psy_id'] = $this->session->userdata('admin_id');
				$data['para_rev_psy_status'] = '2';
				$data['para_rev_psy_date_acc'] = date("Y-m-d H:i:s");
				$data['para_rev_psy_comment'] = $this->input->post('para_rev_psy_comment');
				
				$result = $this->Itemspara_model->edit_itemspara_rev($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==5)
				{$log_messagetype='rev_psy_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					/*baad main karna hai
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Itemspara Updated',
						'log_message' => 'Itemspara updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					$this->session->set_flashdata('success', 'Itemspara has been updated successfully!');
					redirect(base_url('admin/Itemspara/rev_psy_pitemspara'));
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	//---------------------------------------------------------------------------
	public function rev_edit($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('para_item_21', 'Para Item 1', 'trim|required');
			$this->form_validation->set_rules('para_item_22', 'Para Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['para'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemspara/rev_itemspara_edit', $data);
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
					'para_start_from' => $this->input->post('para_start_from'),
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
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
					'para_status' => '1',
					'para_updatedby' => $this->session->userdata('admin_id'),
					'para_updated' => date("Y-m-d H:i:s")
				);
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					//print_r($result);
					//die();
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/Itemspara'), 'refresh');
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
				$result = $this->Itemspara_model->edit_itemspara($data, $id);
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Itemspara_model->edit_itemspara_rev($data, $id);
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'ItemsPara updated by IR',
						'log_message' => 'ItemsPara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'rev_update',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					for($i=21; $i<$ids; $i++)
						{
							$datai = array(
								'log_itemid' => $this->input->post('para_item_'.$i),
								'log_title' => 'Item attached with Itemspara updated by IR',
								'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'rev_update',
								'log_admin_id' => $this->session->userdata('admin_id')
							);
							$logi = $this->Itemspara_model->log_entry($datai);
						}
					$this->session->set_flashdata('success', 'ItemsPara has been updated successfully!');
					redirect(base_url('admin/itemspara/rev_view/'.$id));
				}
			}
		
		}
		else
		{
			$result_rev = $this->Itemspara_model->find_rev_itemspara_by_id($id);

			if(empty($result_rev))
			{
				$data['para'] = $this->Itemspara_model->get_itemspara_by_id($id);
				
				$keyword ='Ginger';
				$para_text_en = $data['para'][0]->para_text_en;
				$para_text_ur = $data['para'][0]->para_text_ur;
				
				if(strpos($para_text_en, $keyword) !== false ||
				   strpos($para_text_ur, $keyword) !== false)
				{
					die('You are not allowed to "Add" items. Please contact to PEC IT Team');
				}
				
				$data2 = array(
							'para_id' => $data['para'][0]->para_id,
							'para_title_en' => $data['para'][0]->para_title_en,
							'para_title_ur' => $data['para'][0]->para_title_ur,
							'para_text_en' => $data['para'][0]->para_text_en,
							'para_text_ur' => $data['para'][0]->para_text_ur,
							'para_img_position' => $data['para'][0]->para_img_position,
							'para_start_from' => $data['para'][0]->para_start_from,
							'para_grade_id' => $data['para'][0]->para_grade_id,
							'para_subject_id' => $data['para'][0]->para_subject_id,
							'para_item_21' => $data['para'][0]->para_item_21,
							'para_item_22' => $data['para'][0]->para_item_22,
							'para_item_23' => $data['para'][0]->para_item_23,
							'para_item_24' => $data['para'][0]->para_item_24,
							'para_item_25' => $data['para'][0]->para_item_25,
							'para_item_26' => $data['para'][0]->para_item_26,
							'para_item_27' => $data['para'][0]->para_item_27,
							'para_item_28' => $data['para'][0]->para_item_28,
							'para_item_29' => $data['para'][0]->para_item_29,
							'para_item_30' => $data['para'][0]->para_item_30,
							'para_statistics' => $data['para'][0]->para_statistics,
							'para_ordering' => $data['para'][0]->para_ordering,
							'para_status' => $data['para'][0]->para_status,
							'para_createdby' => $data['para'][0]->para_createdby,
							'para_created' => $data['para'][0]->para_created,
							'para_status_ss' => $data['para'][0]->para_status_ss,
							'para_comment_ss' => $data['para'][0]->para_comment_ss,
							'para_approved' => $data['para'][0]->para_approved,
							'para_approvedby' => $data['para'][0]->para_approvedby,
							'para_status_ae' => $data['para'][0]->para_status_ae,
							'para_comment_ae' => $data['para'][0]->para_comment_ae,
							'para_reviewed' => $data['para'][0]->para_reviewed,
							'para_reviewedby' => $data['para'][0]->para_reviewedby,
							'para_status_psy' => $data['para'][0]->para_status_psy,
							'para_comment_psy' => $data['para'][0]->para_comment_psy,
							'para_commentby_psy' => $data['para'][0]->para_commentby_psy,
							'para_date_psy' => $data['para'][0]->para_date_psy,
							'para_updated' => $data['para'][0]->para_updated,
							'para_updatedby' => $data['para'][0]->para_updatedby
						);
				$para_items = $data['para'][0]->para_item_21.','.$data['para'][0]->para_item_22.',';
				if(isset($data['para'][0]->para_item_23)&&$data['para'][0]->para_item_23!=0)
				$para_items .= $data['para'][0]->para_item_23.',';
				if(isset($data['para'][0]->para_item_24)&&$data['para'][0]->para_item_24!=0)
				$para_items .= $data['para'][0]->para_item_24.',';
				if(isset($data['para'][0]->para_item_25)&&$data['para'][0]->para_item_25!=0)
				$para_items .= $data['para'][0]->para_item_25.',';
				if(isset($data['para'][0]->para_item_26)&&$data['para'][0]->para_item_26!=0)
				$para_items .= $data['para'][0]->para_item_26.',';
				if(isset($data['para'][0]->para_item_27)&&$data['para'][0]->para_item_27!=0)
				$para_items .= $data['para'][0]->para_item_27.',';
				if(isset($data['para'][0]->para_item_28)&&$data['para'][0]->para_item_28!=0)
				$para_items .= $data['para'][0]->para_item_28.',';
				if(isset($data['para'][0]->para_item_29)&&$data['para'][0]->para_item_29!=0)
				$para_items .= $data['para'][0]->para_item_29.',';
				if(isset($data['para'][0]->para_item_30)&&$data['para'][0]->para_item_30!=0)
				$para_items .= $data['para'][0]->para_item_30.',';
								
				$para_items = rtrim($para_items, ",");
				
				$data2['para_rev_status'] = '1';
				$data2['para_rev_revid'] = $this->session->userdata('admin_id');
				$data2['para_rev_date_exp'] = date("Y-m-d H:i:s");
				$result = $this->Itemspara_model->add_itemspara_rev($data2);
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
				if($result)
				{
					$result = $this->Itemspara_model->update_itemspara_exported('1',$id);
					/*log entry karain on exported para but not submitted*/
					$result = $this->Itemspara_model->get_update_itemsofpara_exported($para_items);
					for($i=21; $i<$ids; $i++)
						{
							$datai = array(
								'log_itemid' => $this->input->post('para_item_'.$i),
								'log_title' => 'Item attached with Itemspara updated by IR',
								'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'rev_update',
								'log_admin_id' => $this->session->userdata('admin_id')
							);
							$logi = $this->Itemspara_model->log_entry($datai);
						}
				}
				$data['title'] = 'Edit Para';
				$data['paragraph'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
				$data['grades'] = $this->Itemspara_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Itemspara_model->get_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
				}
				else
				{
					die('Alert! You are not authorized here');
				}
				$data['paraitems'] = $this->Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id']);
	 
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemspara/rev_itemspara_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else
			{
				$data['title'] = 'Edit para';
				$data['paragraph'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
				$data['grades'] = $this->Itemspara_model->get_all_grades();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Itemspara_model->get_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
				}
				else
				{
					die('Alert! You are not authorized here');
				}
				$data['paraitems'] = $this->Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemspara/rev_itemspara_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}
	//---------------------------------------------------------------------------
	public function rev_ss_edit($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('para_item_21', 'Para Item 1', 'trim|required');
			$this->form_validation->set_rules('para_item_22', 'Para Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['para'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemspara/rev_ss_itemspara_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else{
				$keyword ='Ginger';
				
				$para_text_en = $data['para'][0]->para_text_en;
				$para_text_ur = $data['para'][0]->para_text_ur;
				
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
					'para_start_from' => $this->input->post('para_start_from'),
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
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
					'para_status' => '1',
					'para_updatedby' => $this->session->userdata('admin_id'),
					'para_updated' => date("Y-m-d H:i:s")
				);
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					//print_r($result);
					//die();
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/Itemspara'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Itemspara_model->edit_itemspara_rev($data, $id);
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
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'ItemsPara updated by Item Writer',
						'log_message' => 'ItemsPara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'rev_ss_updated',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					for($i=21; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('para_item_'.$i),
							'log_title' => 'Item attached with Itemspara updated by SS',
							'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'ss_updated',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemspara_model->log_entry($datai);
					}
					$this->session->set_flashdata('success', 'ItemsPara has been updated successfully!');
					redirect(base_url('admin/itemspara/rev_ss_view/'.$id));
				}
			}
		}
		else
		{
			//$result = $this->Itemspara_model->update_para_rev_ss_status($id);
			$data['title'] = 'Edit para';
			$data['paragraph'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			if($this->session->userdata('role_id')==2)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Itemspara_model->get_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
			}
			else
			{
				die('Alert! You are not authorized here');
			}
			$data['paraitems'] = $this->Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/rev_ss_itemspara_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//---------------------------------------------------------------------------
	public function rev_ae_edit($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('para_item_21', 'Para Item 1', 'trim|required');
			$this->form_validation->set_rules('para_item_22', 'Para Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['para'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemspara/rev_ae_itemspara_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else{
				
				$keyword ='Ginger';
				
				$para_text_en = $data['para'][0]->para_text_en;
				$para_text_ur = $data['para'][0]->para_text_ur;
				
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
					'para_start_from' => $this->input->post('para_start_from'),
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
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
					'para_status' => '1',
					'para_updatedby' => $this->session->userdata('admin_id'),
					'para_updated' => date("Y-m-d H:i:s")
				);
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					//print_r($result);
					//die();
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/Itemspara'), 'refresh');
					}
				}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Itemspara_model->edit_itemspara_rev($data, $id);
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'ItemsPara updated by Item Writer',
						'log_message' => 'ItemsPara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'rev_ae_updated',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					$this->session->set_flashdata('success', 'ItemsPara has been updated successfully!');
					redirect(base_url('admin/itemspara/rev_ae_view/'.$id));
				}
			}
		}
		else
		{
			//$result = $this->Itemspara_model->update_para_rev_ae_status($id);
			$data['title'] = 'Edit para';
			$data['paragraph'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			if($this->session->userdata('role_id')==4)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Itemspara_model->get_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
			}
			else
			{
				die('Alert! You are not authorized here');
			}
			$data['paraitems'] = $this->Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id']);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/rev_itemspara_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//---------------------------------------------------------------------------
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
	//---------------------------------------------------------------
	public function get_paras_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_paras_by_subject($this->input->post('subject_id')));
	}
	//-----------------------------------------------------------
	public function change_status()
	{   
		$this->Itemspara_model->change_status();
	}
	//-----------------------------------------------------------
	public function add()
	{
		if($this->session->userdata('role_id')==3)
		{
			if($this->input->post('submit'))
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('add-para	');
				$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('para_start_from', 'Para Starts From', 'trim|required');				
				$this->form_validation->set_rules('para_item_21', 'Para Item 21', 'trim|required');
				$this->form_validation->set_rules('para_item_22', 'Para Item 22', 'trim|required');
							
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/itemspara/add'),'refresh');
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
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' =>$this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),
					'para_img_position' => $this->input->post('para_img_position'),	
					'para_image' => $this->input->post('para_image'),				
					'para_start_from' => $this->input->post('para_start_from'),	
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
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
					'para_statistics' =>$this->input->post('para_statistics'),
					'para_ordering' => $this->input->post('para_ordering'),
					'para_createdby' => $this->session->userdata('admin_id'),
				);
				///////////////////////////////////////////////////////////////////
				$para_image = $this->input->post('para_image');
				$path="assets/img/";
				if(!empty($_FILES['para_image']['name']))
				{
					$result = $this->functions->file_insert($path, 'para_image', 'image', '9097152');
					//print_r($result);
					//die();
					if($result['status'] == 1){
						$data['para_image'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/itemspara'), 'refresh');
					}
				}
				/////////////////////////////////////////////////////////////////////
				
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
					
				$result = $this->Itemspara_model->add_itemspara($data);
				$id=$this->db->insert_id();
				//die($this->db->last_query());
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'Itemspara submitted by Item Writer',
						'log_message' => 'Itemspara {{log_itemid}} submitted by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'created',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					for($i=21; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('para_item_'.$i),
							'log_title' => 'Item attached with Itemspara created by Item Writer',
							'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} created by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						//print_r($datai);
						//die();
						$logi = $this->Itemspara_model->log_entry($datai);
					}
					$this->session->set_flashdata('success', 'ItemPara has been added successfully!');
					redirect(base_url('admin/itemspara'));
				}
			}
		}
			else
			{
				//die('else add');
				$data['title'] = 'Add Item Para';
				$data['grades'] = $this->Itemspara_model->get_all_grades();
		
				//print_r($this->session->userdata('subjects_ids'));
				//die();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemspara/itemspara_add');
				$this->load->view('admin/includes/_footer');
			}	
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	//---------------------------------------------------------------
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemspara_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			//echo '<PRE>';
			//print_r($this->session->userdata('subjects_ids'));
			//die();
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemspara_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Itemspara_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	//---------------------------------------------------------------
	public function cstands_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	//---------------------------------------------------------------
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Itemspara_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
	//---------------------------------------------------------------
	public function all_items_by_subject()
	{
		if($this->session->userdata('role_id')==3)
		{			
			echo json_encode($this->Itemspara_model->all_items_by_subject($this->input->post('subject_id'),$this->session->userdata('admin_id')));		
		}
		else
		echo json_encode($this->Itemspara_model->all_items_by_subject($this->input->post('subject_id')));		
	}
	//---------------------------------------------------------------
	public function slos_by_subcstands()
	{
		echo json_encode($this->Itemspara_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
	//-----------------------------------------------------------
	public function edit($id = 0)
	{
		if($this->input->post('submit'))
        {
			//print_r($_REQUEST); 
			//die();
				$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('para_start_from', 'Para Starts From', 'trim|required');
				$this->form_validation->set_rules('para_item_21', 'Para Item 21', 'trim|required');
				$this->form_validation->set_rules('para_item_22', 'Para Item 22', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemspara_model->get_itemspara_by_id($id);
				$data['view'] = 'admin/Itemspara/itemspara_edit';
				$this->load->view('layout', $data);
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
				//echo '<PRE>';
				//print_r($data);
				//die();
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
						redirect(base_url('admin/itemspara'), 'refresh');
					}
				}
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//$data = $this->security->xss_clean($data);
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
				
				$result = $this->Itemspara_model->edit_itemspara($data, $id);
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'Itemspara updated by Item Writer',
						'log_message' => 'Itemspara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'updated',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					for($i=21; $i<$ids; $i++)
					{
						/*$datai = array(
							'log_itemid' => $this->input->post('para_item_'.$i),
							'log_title' => 'Item attached with Itemspara updated by Item Writer',
							'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'updated',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemspara_model->log_entry($datai);*/
						for($i=21; $i<$ids; $i++)
						{
							$datai = array(
								'log_itemid' => $this->input->post('para_item_'.$i),
								'log_title' => 'Item attached with Itemspara updated by SS',
								'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'ss_updated',
								'log_admin_id' => $this->session->userdata('admin_id')
							);
							$logi = $this->Itemspara_model->log_entry($datai);
						}
					}
					$this->session->set_flashdata('success', 'Itempara has been updated successfully!');
					if($this->session->userdata('role_id')==2)
					{redirect(base_url('admin/itemspara/ss_view/'.$id));}
					elseif($this->session->userdata('role_id')==3)
					{redirect(base_url('admin/itemspara/view/'.$id));}
					else{die('Alert! You are not authorized');}
				}
			}
		}
		elseif($this->input->post('submit2'))
        {
			//echo "Under Development";
			//die();
				$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('para_start_from', 'Para Starts From', 'trim|required');
				$this->form_validation->set_rules('para_item_22', 'Para Item 22', 'trim|required');
				$this->form_validation->set_rules('para_item_23', 'Para Item 23', 'trim|required');
				$this->form_validation->set_rules('para_item_24', 'Para Item 24', 'trim|required');				
				$this->form_validation->set_rules('para_item_25', 'Para Item 25', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemspara_model->get_itemspara_by_id($id);
				$data['view'] = 'admin/Itemspara/itemspara_edit';
				$this->load->view('layout', $data);
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
				//echo '<PRE>';
				//print_r($data);
				//die();
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
						redirect(base_url('admin/itemspara'), 'refresh');
					}
				}
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//$data = $this->security->xss_clean($data);
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
				$result = $this->Itemspara_model->edit_itemspara($data, $id);
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'Itemspara updated by Item Writer',
						'log_message' => 'Itemspara {{log_itemid}} updated by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'updated',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					for($i=21; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('para_item_'.$i),
							'log_title' => 'Item attached with Itemspara updated by SS',
							'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'ss_updated',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemspara_model->log_entry($datai);
					}
					$this->session->set_flashdata('success', 'Itempara has been updated successfully!');
					redirect(base_url('admin/ss_pindex'));
				}
			}
		}
		else
        {
			$data['title'] = 'Edit Pargraph';
			$data['paragraph'] = $this->Itemspara_model->get_itemspara_by_id($id);
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			$data['paraitems'] = [];
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Itemspara_model->get_ae_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
				$data['paraitems'] = $this->Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id'], $id);
			}		
			else			
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Itemspara_model->get_ae_subjects_grade($subjectList,$data['paragraph'][0]->para_grade_id);
				$data['paraitems'] = $this->Itemspara_model->all_item_by_subject($data['subjects'][0]['subject_id'], $id);
			}					
			//echo '<PRE>';
			//print_r($data['subjects']);
			//echo '<hr />';
			//print_r($data['paraitems']);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/itemspara_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function view($id = 0)
	{
			$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			$data['itemspara'] = $this->Itemspara_model->get_itemspara_by_id($id);
			
			if($data['itemspara'][0]->para_item_21!=0) 
			{
				$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);
			}
			$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
			$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
			$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
			$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
			$data['para_item_26'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_26);
			$data['para_item_27'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_27);
			$data['para_item_28'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_28);
			$data['para_item_29'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_29);
			$data['para_item_30'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_30);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/itemspara_view', $data);
			$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function ss_view($id = 0)
	{
			$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			$data['itemspara'] = $this->Itemspara_model->get_itemspara_by_id($id);
			
			if($data['itemspara'][0]->para_item_21!=0) {
			$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);
			}
			$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
			$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
			$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
			$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
			$data['para_item_26'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_26);
			$data['para_item_27'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_27);
			$data['para_item_28'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_28);
			$data['para_item_29'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_29);
			$data['para_item_30'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_30);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/ss_itemspara_view', $data);
			$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function ae_view($id = 0)
	{
			$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Itemspara_model->get_all_grades();
			$data['itemspara'] = $this->Itemspara_model->get_itemspara_by_id($id);
			
			if($data['itemspara'][0]->para_item_21!=0) {
			$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);
			}
			$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
			$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
			$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
			$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
			$data['para_item_26'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_26);
			$data['para_item_27'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_27);
			$data['para_item_28'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_28);
			$data['para_item_29'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_29);
			$data['para_item_30'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_30);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemspara/ae_itemspara_view', $data);
			$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_view($id = 0)
	{
		$data['title'] = 'View ItemPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		if(count($data['itemspara'])==0)
		{$data['itemspara'] = $this->Itemspara_model->get_itemspara_by_id($id);}
		
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		
		if($data['itemspara'][0]->para_item_21!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_21);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_21'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_21);}
			else
			{$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);}
			
		}
		if($data['itemspara'][0]->para_item_22!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_22);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_22'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_22);}
			else
			{$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);}
		}
		if($data['itemspara'][0]->para_item_23!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_23);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_23'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_23);}
			else
			{$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);}
		}
		if($data['itemspara'][0]->para_item_24!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_24);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_24'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_24);}
			else
			{$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);}
		}
		if($data['itemspara'][0]->para_item_25!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_25);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_25'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_25);}
			else
			{$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);}
		}
		if($data['itemspara'][0]->para_item_26!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_26);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_26'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_26);}
			else
			{$data['para_item_26'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_26);}
		}
		if($data['itemspara'][0]->para_item_27!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_27);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_27'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_27);}
			else
			{$data['para_item_27'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_27);}
		}
		if($data['itemspara'][0]->para_item_28!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_28);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_28'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_28);}
			else
			{$data['para_item_28'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_28);}
		}
		if($data['itemspara'][0]->para_item_29!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_29);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_29'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_29);}
			else
			{$data['para_item_29'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_29);}
		}
		if($data['itemspara'][0]->para_item_30!=0)
		{
			$data['item_exported'] = $this->Itemspara_model->find_exported($data['itemspara'][0]->para_item_30);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['para_item_30'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_30);}
			else
			{$data['para_item_30'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_30);}
		}
		/*$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);
		$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
		$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
		$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
		$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
		$data['para_item_26'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_26);
		$data['para_item_27'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_27);
		$data['para_item_28'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_28);
		$data['para_item_29'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_29);
		$data['para_item_30'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_30);*/
		
		$data['status_pi_21'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_21);
		$data['status_pi_22'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_22);
		$data['status_pi_23'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_23);
		$data['status_pi_24'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_24);
		$data['status_pi_25'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_25);
		$data['status_pi_26'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_26);
		$data['status_pi_27'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_27);
		$data['status_pi_28'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_28);
		$data['status_pi_29'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_29);
		$data['status_pi_30'] = $this->Itemspara_model->get_item_status($data['itemspara'][0]->para_item_30);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_itemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_aview($id = 0)
	{
		$data['title'] = 'View Accepted ItemsPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		$data['irinfo'] = $this->Itemspara_model->get_irinfo_by_id($data['itemspara'][0]->para_rev_revid);
		if($data['itemspara'][0]->para_item_21!=0)
		{$data['para_item_21'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_21);}
		$data['para_item_22'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_22);
		$data['para_item_23'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_23);
		$data['para_item_24'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_24);
		$data['para_item_25'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_25);
		$data['para_item_26'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_26);
		$data['para_item_27'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_27);
		$data['para_item_28'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_28);
		$data['para_item_29'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_29);
		$data['para_item_30'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_30);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_aitemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_ss_view($id = 0)
	{
		$data['title'] = 'View ItemPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		$data['irinfo'] = $this->Itemspara_model->get_irinfo_by_id($data['itemspara'][0]->para_rev_revid);
		
		if($data['itemspara'][0]->para_item_21!=0)
		{$data['para_item_21'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_21);}
		if($data['itemspara'][0]->para_item_22!=0)
		{$data['para_item_22'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_22);}
		if($data['itemspara'][0]->para_item_23!=0)
		{$data['para_item_23'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_23);}
		if($data['itemspara'][0]->para_item_24!=0)
		{$data['para_item_24'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_24);}
		if($data['itemspara'][0]->para_item_25!=0)
		{$data['para_item_25'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_25);}
		if($data['itemspara'][0]->para_item_26!=0)
		{$data['para_item_26'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_26);}
		if($data['itemspara'][0]->para_item_27!=0)
		{$data['para_item_27'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_27);}
		if($data['itemspara'][0]->para_item_28!=0)
		{$data['para_item_28'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_28);}
		if($data['itemspara'][0]->para_item_29!=0)
		{$data['para_item_29'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_29);}
		if($data['itemspara'][0]->para_item_30!=0)
		{$data['para_item_30'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_30);}
		
		$data['status_pi_21'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_21);
		$data['status_pi_22'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_22);
		$data['status_pi_23'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_23);
		$data['status_pi_24'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_24);
		$data['status_pi_25'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_25);
		$data['status_pi_26'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_26);
		$data['status_pi_27'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_27);
		$data['status_pi_28'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_28);
		$data['status_pi_29'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_29);
		$data['status_pi_30'] = $this->Itemspara_model->get_ss_item_status($data['itemspara'][0]->para_item_30);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ss_itemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_ss_aview($id = 0)
	{
		$data['title'] = 'View Accepted ItemsPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		$data['irinfo'] = $this->Itemspara_model->get_irinfo_by_id($data['itemspara'][0]->para_rev_revid);
		if($data['itemspara'][0]->para_item_21!=0)
		{$data['para_item_21'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_21);}
		$data['para_item_22'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_22);
		$data['para_item_23'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_23);
		$data['para_item_24'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_24);
		$data['para_item_25'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_25);
		$data['para_item_26'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_26);
		$data['para_item_27'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_27);
		$data['para_item_28'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_28);
		$data['para_item_29'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_29);
		$data['para_item_30'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_30);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ss_aitemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_ae_view($id = 0)
	{
		$data['title'] = 'View ItemPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		$data['irinfo'] = $this->Itemspara_model->get_irinfo_by_id($data['itemspara'][0]->para_rev_revid);
		$data['rev_ss'] = $this->Itemspara_model->get_rev_ssinfo_by_id($data['itemspara'][0]->para_rev_ss_id);
		
		if($data['itemspara'][0]->para_item_21!=0)
		{$data['para_item_21'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_21);}
		$data['para_item_22'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_22);
		$data['para_item_23'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_23);
		$data['para_item_24'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_24);
		$data['para_item_25'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_25);
		$data['para_item_26'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_26);
		$data['para_item_27'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_27);
		$data['para_item_28'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_28);
		$data['para_item_29'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_29);
		$data['para_item_30'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_30);
		
		$data['status_pi_21'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_21);
		$data['status_pi_22'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_22);
		$data['status_pi_23'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_23);
		$data['status_pi_24'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_24);
		$data['status_pi_25'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_25);
		$data['status_pi_26'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_26);
		$data['status_pi_27'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_27);
		$data['status_pi_28'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_28);
		$data['status_pi_29'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_29);
		$data['status_pi_30'] = $this->Itemspara_model->get_ae_item_status($data['itemspara'][0]->para_item_30);
		//echo '<pre>';
		//print_r($data['status_pi_21']);
		//die();		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ae_itemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_ae_aview($id = 0)
	{
		$data['title'] = 'View Accepted ItemsPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		$data['irinfo'] = $this->Itemspara_model->get_irinfo_by_id($data['itemspara'][0]->para_rev_revid);
		$data['rev_ss'] = $this->Itemspara_model->get_rev_ssinfo_by_id($data['itemspara'][0]->para_rev_ss_id);
		$data['rev_ae'] = $this->Itemspara_model->get_rev_aeinfo_by_id($data['itemspara'][0]->para_rev_ae_id);
		
		if($data['itemspara'][0]->para_item_21!=0)
		{$data['para_item_21'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_21);}
		$data['para_item_22'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_22);
		$data['para_item_23'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_23);
		$data['para_item_24'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_24);
		$data['para_item_25'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_25);
		$data['para_item_26'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_26);
		$data['para_item_27'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_27);
		$data['para_item_28'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_28);
		$data['para_item_29'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_29);
		$data['para_item_30'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_30);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_ae_aitemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_psy_view($id = 0)
	{
		$data['title'] = 'View ItemPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		$data['irinfo'] = $this->Itemspara_model->get_irinfo_by_id($data['itemspara'][0]->para_rev_revid);
		$data['rev_ss'] = $this->Itemspara_model->get_rev_ssinfo_by_id($data['itemspara'][0]->para_rev_ss_id);
		$data['rev_ae'] = $this->Itemspara_model->get_rev_aeinfo_by_id($data['itemspara'][0]->para_rev_ae_id);
		
		if($data['itemspara'][0]->para_item_21!=0)
		{$data['para_item_21'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_21);}
		$data['para_item_22'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_22);
		$data['para_item_23'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_23);
		$data['para_item_24'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_24);
		$data['para_item_25'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_25);
		$data['para_item_26'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_26);
		$data['para_item_27'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_27);
		$data['para_item_28'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_28);
		$data['para_item_29'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_29);
		$data['para_item_30'] = $this->Itemspara_model->get_rev_items_by_id($data['itemspara'][0]->para_item_30);
		
		$data['status_pi_21'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_21);
		$data['status_pi_22'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_22);
		$data['status_pi_23'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_23);
		$data['status_pi_24'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_24);
		$data['status_pi_25'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_25);
		$data['status_pi_26'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_26);
		$data['status_pi_27'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_27);
		$data['status_pi_28'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_28);
		$data['status_pi_29'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_29);
		$data['status_pi_30'] = $this->Itemspara_model->get_psy_item_status($data['itemspara'][0]->para_item_30);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_psy_itemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function rev_psy_aview($id = 0)
	{
		$data['title'] = 'View Accepted ItemsPara Filmzy';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		$data['itemspara'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$data['iwinfo'] = $this->Itemspara_model->get_iwinfo_by_id($data['itemspara'][0]->para_createdby);
		$data['ss'] = $this->Itemspara_model->get_ssinfo_by_id($data['itemspara'][0]->para_approvedby);
		$data['ae'] = $this->Itemspara_model->get_aeinfo_by_id($data['itemspara'][0]->para_reviewedby);
		$data['psy'] = $this->Itemspara_model->get_psyinfo_by_id($data['itemspara'][0]->para_commentby_psy);
		$data['irinfo'] = $this->Itemspara_model->get_irinfo_by_id($data['itemspara'][0]->para_rev_revid);
		$data['rev_ss'] = $this->Itemspara_model->get_rev_ssinfo_by_id($data['itemspara'][0]->para_rev_ss_id);
		$data['rev_ae'] = $this->Itemspara_model->get_rev_aeinfo_by_id($data['itemspara'][0]->para_rev_ae_id);
		$data['rev_psy'] = $this->Itemspara_model->get_rev_psyinfo_by_id($data['itemspara'][0]->para_rev_psy_id);
		
		if($data['itemspara'][0]->para_item_21!=0)
		{$data['para_item_21'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_21);}
		$data['para_item_22'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_22);
		$data['para_item_23'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_23);
		$data['para_item_24'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_24);
		$data['para_item_25'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_25);
		$data['para_item_26'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_26);
		$data['para_item_27'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_27);
		$data['para_item_28'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_28);
		$data['para_item_29'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_29);
		$data['para_item_30'] = $this->Itemspara_model->get_item_by_id($data['itemspara'][0]->para_item_30);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/rev_psy_aitemspara_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$ids= 21;
		$datag['paragraph'] = $this->Itemspara_model->get_itemspara_by_id($id);
 		$datag['paragraph'] = $datag['paragraph'][0];
		(isset($datag['paragraph']->para_item_21) && $datag['paragraph']->para_item_21!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_22) && $datag['paragraph']->para_item_22!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_23) && $datag['paragraph']->para_item_23!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_24) && $datag['paragraph']->para_item_24!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_25) && $datag['paragraph']->para_item_25!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_26) && $datag['paragraph']->para_item_26!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_27) && $datag['paragraph']->para_item_27!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_28) && $datag['paragraph']->para_item_28!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_29) && $datag['paragraph']->para_item_29!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_30) && $datag['paragraph']->para_item_30!=0) ? $ids++ : $ids;
		
		$this->db->delete('ci_items_paragraphs', array('para_id' => $id));
		/*$data = array(
				'log_itemid' => $id,
				'log_title' => 'Itemspara deleted',
				'log_message' => 'Itemspara {{log_itemid}} deleted by {{log_admin_id}} on {{log_date}}',
				'log_messagetype' =>'delted',
				'log_admin_id' => $this->session->userdata('admin_id')
			);
			$log = $this->Itemspara_model->log_entry($data);*/
		for($i=21; $i<$ids; $i++)
		{
			$temp = "para_item_".$i;
			$datai = array(
				'log_itemid' => $datag['paragraph']->$temp,
				'log_title' => 'Item attached with Itemspara unattached by Item Writer',
				'log_message' => 'Item{{'.$datag['paragraph']->$temp.'}} attached with Itemspara {{'.$id.'}} created by {{log_admin_id}} on {{log_date}}',
				'log_messagetype' =>'delete',
				'log_admin_id' => $this->session->userdata('admin_id')
			);
			$logi = $this->Itemspara_model->log_entry($datai);
		}
		$this->session->set_flashdata('success', 'Paragraph has been deleted successfully!');
		redirect(base_url('admin/itemspara'));
	}
	//---------------------------------------------------------------
	public function delete_image($id = 0)
	{
		$data = array('para_image' => '');
		$this->db->where('para_id', $id);        
		$this->db->update('ci_items_paragraphs', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemspara/edit/'.$id));
	}
	//---------------------------------------------------------------
	public function rev_delete_image($id = 0)
	{
		$data = array('para_image' => '');
		$this->db->where('para_id', $id);        
		$this->db->update('ci_items_paragraphs_rev', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemspara/rev_edit/'.$id));
	}
	//---------------------------------------------------------------
	public function create_itemspara_pdf()
	{
		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_items'] = $this->Itemspara_model->get_itemspara_for_export();
		$this->load->view('admin/itemspara/itemspara_pdf', $data);
	}
	//---------------------------------------------------------------	
	public function export_itemspara_csv()
	{ 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
		$grades_data = $this->Itemspara_model->get_itemspara_csv_export();
		$file = fopen('php://output', 'w');
		$header = array("ItemID", "ItemCode", "ItemName(Eng)", "ItemName(Urdu)", "ItemSort", "Grade", "ItemStatus"); 
		fputcsv($file, $header);
		foreach ($grades_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	//---------------------------------------------------------------
	public function search()
	{
		if($this->input->post('submit'))
		{		
			if($this->input->post('para_grade_id') == '' && $this->input->post('para_subject_id') == '')
			{
				redirect(base_url('admin/itemspara'));
			}
			else
			{
				$data['para_grade_id'] = $this->input->post('para_grade_id');
				$data['para_subject_id'] = $this->input->post('para_subject_id');
				$data['title'] = 'Paragraph Searched List ';
				$data['grades'] = $this->Itemspara_model->get_all_grades();	
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/itemspara/itemspara_list', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}
	//---------------------------------------------------------------
	public function submitpara_for_approval($id)
	{ 
		$result = $this->Itemspara_model->submitpara_for_approval($id);
		
		if($result){
			$ids = 21;
			$datag['paragraph'] = $this->Itemspara_model->get_itemspara_by_id($id);
			$datag['paragraph'] = $datag['paragraph'][0];
			(isset($datag['paragraph']->para_item_21) && $datag['paragraph']->para_item_21!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_22) && $datag['paragraph']->para_item_22!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_23) && $datag['paragraph']->para_item_23!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_24) && $datag['paragraph']->para_item_24!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_25) && $datag['paragraph']->para_item_25!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_26) && $datag['paragraph']->para_item_26!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_27) && $datag['paragraph']->para_item_27!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_28) && $datag['paragraph']->para_item_28!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_29) && $datag['paragraph']->para_item_29!=0) ? $ids++ : $ids;
			(isset($datag['paragraph']->para_item_30) && $datag['paragraph']->para_item_30!=0) ? $ids++ : $ids;
			/*$data = array(
				'log_itemid' => $id,
				'log_title' => 'Itemspara submitted for approval',
				'log_message' => 'Itemspara {{log_itemid}} submitted by {{log_admin_id}} on {{log_date}}',
				'log_messagetype' =>'submitted',
				'log_admin_id' => $this->session->userdata('admin_id')
			);
			$log = $this->Itemspara_model->log_entry($data);*/
			for($i=21; $i<$ids; $i++)
			{	
				$temp = "para_item_".$i;
				$datai = array(
					'log_itemid' => $datag['paragraph']->$temp,
					'log_title' => 'Item attached with Itemspara submitted by IR',
					'log_message' => 'Item{{'.$datag['paragraph']->$temp.'}} attached with Itemspara {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'submitted',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$logi = $this->Itemspara_model->log_entry($datai);
			}
			$this->session->set_flashdata('success', 'Item has been updated successfully!');
			redirect(base_url('admin/Itemspara'));
		}
		else{
			$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
			redirect(base_url('admin/Itemspara'),'refresh');
		}
	} 
	//---------------------------------------------------------------
	public function psyitems()
	{
		$data['title'] = 'Paragraph List';
		//get_all_grades
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/psy_itemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	//---------------------------------------------------------------
	public function datatable_json_psy_itemspara($id = 0)
	{	
		$records = $this->Itemspara_model->get_all_itemspara();
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['para_status_ss'] == 0)
			{
				$status='Pending';
			}
			elseif($row['para_status_ss'] == 1)
			{
				$status='Rejected';
			}
			elseif($row['para_status_ss'] == 2)
			{
				$status='Accepted with change';
			}
			else
			{
				$status='Accepted without change';
			}
			//$status = ($row['para_status'] == 1)? 'checked': '';
			
			
			if($this->session->userdata('role_id')==2)
			{
				if($row['para_status_ss'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemspara/edit/'.$row['para_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemspara/delete/".$row['para_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemspara/ss_view/'.$row['para_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
		
			
			$data[]= array(
				++$i,
				$row['para_title_en'].'-'.$row['para_title_ur'],
				html_entity_decode($row['para_text_en']).'-'.html_entity_decode($row['para_text_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['para_id'].'" 
				id="cb_'.$row['para_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['para_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//---------------------------------------------------------------
	public function rev_ss_add()
	{
		$id=0;
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('para_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('para_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('para_start_from', 'Para Starts From', 'trim|required');				
				$this->form_validation->set_rules('para_item_21', 'Para Item 21', 'trim|required');
				$this->form_validation->set_rules('para_item_22', 'Para Item 22', 'trim|required');
							
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/itemspara/rev_ss_add'),'refresh');
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
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' =>$this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),
					'para_img_position' => $this->input->post('para_img_position'),	
					'para_image' => $this->input->post('para_image'),				
					'para_start_from' => $this->input->post('para_start_from'),	
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
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
					'para_statistics' =>$this->input->post('para_statistics'),
					'para_ordering' => $this->input->post('para_ordering'),
					'para_createdby' => $this->session->userdata('admin_id'),
					'para_created' => date("Y-m-d h:i:s"),
					'para_status_ss' => '3',
					'para_comment_ss' => '2nd Phase',
					'para_status_ae' => '2',
					'para_comment_ae' => '2nd Phase',
					'para_approved' => date("Y-m-d h:i:s"),
					'para_approvedby' => $this->session->userdata('admin_id'),
					'para_reviewed' => date("Y-m-d h:i:s"),
					'para_reviewedby' => '0',
				);
				$result = $this->Itemspara_model->add_itemspara($data);
				$id=$this->db->insert_id();
				
				$data_rev = array(
					'para_id' => $id,
					'para_title_en' => $this->input->post('para_title_en'),
					'para_title_ur' => $this->input->post('para_title_ur'),
					'para_text_en' =>$this->input->post('para_text_en'),
					'para_text_ur' => $this->input->post('para_text_ur'),
					'para_img_position' => $this->input->post('para_img_position'),	
					'para_image' => $this->input->post('para_image'),				
					'para_start_from' => $this->input->post('para_start_from'),	
					'para_grade_id' => $this->input->post('para_grade_id'),
					'para_subject_id' => $this->input->post('para_subject_id'),
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
					'para_statistics' =>$this->input->post('para_statistics'),
					'para_ordering' => $this->input->post('para_ordering'),
					'para_status' => '4',
					'para_createdby' => $this->session->userdata('admin_id'),
					'para_created' => date("Y-m-d h:i:s"),
					'para_status_ss' => '3',
					'para_comment_ss' => '2nd Phase',
					'para_status_ae' => '2',
					'para_comment_ae' => '2nd Phase',
					'para_approved' => date("Y-m-d h:i:s"),
					'para_approvedby' => $this->session->userdata('admin_id'),
					'para_reviewed' => date("Y-m-d h:i:s"),
					'para_reviewedby' => '0',
					'para_rev_status' => '2',
					'para_rev_revid' => '0',
					'para_rev_date_acc' => date("Y-m-d h:i:s"),
					'para_rev_date_exp' => date("Y-m-d h:i:s"),
					'para_rev_comment' => '2nd Phase',
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
						redirect(base_url('admin/itemspararev_ss_add'), 'refresh');
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
				
				$result = $this->Itemspara_model->add_itemspara_rev($data_rev);
				$id_rev=$this->db->insert_id();
				if($result){
					/*$data = array(
						'log_itemid' => $id,
						'log_title' => 'Itemspara submitted by Item Writer',
						'log_message' => 'Itemspara {{log_itemid}} submitted by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>'created',
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$log = $this->Itemspara_model->log_entry($data);*/
					for($i=21; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('para_item_'.$i),
							'log_title' => 'Item attached with Itemspara created by Item Writer',
							'log_message' => 'Item{{'.$this->input->post('para_item_'.$i).'}} attached with Itemspara {{'.$id.'}} created by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemspara_model->log_entry($datai);
					}
					$this->session->set_flashdata('success', 'ItemPara has been added successfully!');
					redirect(base_url('admin/itemspara/rev_ss_pitemspara'));
				}
			}
		}
			else
			{
				$data['title'] = 'Add Item Para';
				$data['grades'] = $this->Itemspara_model->get_all_grades();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemspara/rev_ss_itemspara_add');
				$this->load->view('admin/includes/_footer');
			}	
		}		
		else
		{
			echo 'You are not authorized to add itemspara!';
		}
	}
	//---------------------------------------------------------------
	public function rev_all_items_by_subject()
	{
		if($this->session->userdata('role_id')==2)
		{			
			echo json_encode($this->Itemspara_model->rev_all_items_by_subject($this->input->post('subject_id'),$this->session->userdata('admin_id')));		
		}
		else
		echo json_encode($this->Itemspara_model->all_items_by_subject($this->input->post('subject_id')));		
	}
	//---------------------------------------------------------------
	public function rev_delete($id = 0)
	{
		$this->db->delete('ci_items_paragraphs_rev', array('para_id' => $id));
		$ids = 21;
		$datag['paragraph'] = $this->Itemspara_model->get_rev_itemspara_by_id($id);
		$datag['paragraph'] = $data['paragraph'][0];
		(isset($datag['paragraph']->para_item_21) && $datag['paragraph']->para_item_21!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_22) && $datag['paragraph']->para_item_22!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_23) && $datag['paragraph']->para_item_23!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_24) && $datag['paragraph']->para_item_24!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_25) && $datag['paragraph']->para_item_25!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_26) && $datag['paragraph']->para_item_26!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_27) && $datag['paragraph']->para_item_27!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_28) && $datag['paragraph']->para_item_28!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_29) && $datag['paragraph']->para_item_29!=0) ? $ids++ : $ids;
		(isset($datag['paragraph']->para_item_30) && $datag['paragraph']->para_item_30!=0) ? $ids++ : $ids;
		
		for($i=21; $i<$ids; $i++)
		{	
			$temp = "para_item_".$i;
			$datai = array(
				'log_itemid' => $datag['paragraph']->$temp,
				'log_title' => 'Item attached with Itemspara submitted by SS',
				'log_message' => 'Item{{'.$datag['paragraph']->$temp.'}} attached with Itemspara {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
				'log_messagetype' =>$log_messagetype,
				'log_admin_id' => $this->session->userdata('admin_id')
			);
			$logi = $this->Itemspara_model->log_entry($datai);
		}
		/*$data = array(
				'log_itemid' => $id,
				'log_title' => 'Itemspara deleted',
				'log_message' => 'Itemspara {{log_itemid}} deleted by {{log_admin_id}} on {{log_date}}',
				'log_messagetype' =>'delted',
				'log_admin_id' => $this->session->userdata('admin_id')
			);
			$log = $this->Itemspara_model->log_entry($data);*/
		$this->session->set_flashdata('success', 'Paragraph has been deleted successfully!');
		redirect(base_url('admin/itemspara/rev_ss_pitemspara'));
	}
	//---------------------------------------------------------------
}
?>