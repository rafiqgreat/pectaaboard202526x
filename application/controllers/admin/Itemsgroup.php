<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Itemsgroup extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Itemsgroup_model', 'Itemsgroup_model');
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	
	public function index()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/itemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ssindex()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/ssitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function aeindex()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/aeitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function psyindex()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/psyitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_pitemsgroup()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_itemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_eitemsgroup()
	{
		$data['title'] = 'Under Reviewed Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_eitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_aitemsgroup()
	{
		$data['title'] = 'Accepted Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_aitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_pitemsgroup()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ss_pitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_eitemsgroup()
	{
		$data['title'] = 'Under Reviewed Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ss_eitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aitemsgroup()
	{
		$data['title'] = 'Accepted Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ss_aitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_pitemsgroup()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/Itemsgroup/rev_ae_pitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_eitemsgroup()
	{
		$data['title'] = 'Under Reviewed Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ae_eitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aitemsgroup()
	{
		$data['title'] = 'Accepted Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ae_aitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_pitemsgroup()
	{
		$data['title'] = 'Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/Itemsgroup/rev_psy_pitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_eitemsgroup()
	{
		$data['title'] = 'Under Reviewed Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_psy_eitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_aitemsgroup()
	{
		$data['title'] = 'Accepted Items Group List';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_psy_aitemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ir_revised_itemsgroup()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Items_model->get_search_grade();
		$data['subjects'] = $this->Items_model->get_ss_subjects($subjectList);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ir_revised_itemsgroup_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_jsoniw_grouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup_IW($this->session->userdata('admin_id'),$id);
		}
		else
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup($id);
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_status'] == 1)
			{
				$status='Draft/Pending';
			}
			elseif($row['group_status'] == 2)
			{
				$status='Submitted';
			}
			elseif($row['group_status'] == 3)
			{
				$status='Rejected';
			}
			else
			{
				$status='Accepted';
			}
			
			if($this->session->userdata('role_id')==3)
			{
				if($row['group_status'] == 1)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemsgroup/edit/'.$row['group_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemsgroup/delete/".$row['group_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['group_id'].'" 
				id="cb_'.$row['group_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['group_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	
	public function datatable_jsonss_grouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_itemsgroup_SS($this->session->userdata('admin_id'),$subjectList,2);
			//print_r($records);
			//die();
		}
		else
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup($id);
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_status_ss'] == 0)
			{
				$status='Pending';
			}
			elseif($row['group_status_ss'] == 1)
			{
				$status='Rejected';
			}
			elseif($row['group_status_ss'] == 2)
			{
				$status='Accepted with change';
			}
			else
			{
				$status='Accepted without change';
			}
			
			if($this->session->userdata('role_id')==2)
			{
				if($row['group_status_ss'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/ss_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/ss_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemsgroup/edit/'.$row['group_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemsgroup/delete/".$row['group_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';<strong></strong>
					*/
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/ss_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['group_id'].'" 
				id="cb_'.$row['group_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['group_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	
	public function datatable_jsonae_grouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_itemsgroup_AE($this->session->userdata('admin_id'),$subjectList,23);
			//print_r($records);
			//die();
		}
		else
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup($id);
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_status_ae'] == 0)
			{
				$status='Pending';
			}
			elseif($row['group_status_ae'] == 1)
			{
				$status='Approved';
			}
			else
			{
				$status='Rejected';
			}
			
			if($this->session->userdata('role_id')==4)
			{
				if($row['group_status_ae'] == 0)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/ae_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
					/*
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/ae_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemsgroup/edit/'.$row['group_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemsgroup/delete/".$row['group_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
					*/
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/ae_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="#"> <i class="fa fa-eye"></i></a>';
			}
			
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['group_id'].'" 
				id="cb_'.$row['group_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['group_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	
	public function datatable_jsonpsy_grouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==3)
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup_IW($this->session->userdata('admin_id'),$id);
		}
		else
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup($id);
		}
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_status'] == 1)
			{
				$status='Draft/Pending';
			}
			elseif($row['group_status'] == 2)
			{
				$status='Submitted';
			}
			elseif($row['group_status'] == 3)
			{
				$status='Rejected';
			}
			else
			{
				$status='Accepted';
			}
			
			if($this->session->userdata('role_id')==3)
			{
				if($row['group_status'] == 1)
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>
					<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemsgroup/edit/'.$row['group_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
					<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemsgroup/delete/".$row['group_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="#"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				/*'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['group_id'].'" 
				id="cb_'.$row['group_id'].'"
				type="checkbox"  
				'.echo $status.'><label for="cb_'.$row['group_id'].'"></label>',*/
				$editoption
			);
		}
		$records['data']=$data;
		/*print_r($data);
		die();*/
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_grouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_itemsgroup_REV($subjectList);
		}
		else
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_status_ae'] == 1)
			{$status='Pending';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_egrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_eitemsgroup_REV($subjectList);
		}
		else
		{
			die('Alert! You are not authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_status'] == 1)
			{$status='Under Reviewed';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_agrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_aitemsgroup_REV($subjectList);
		}
		else
		{
			$records = $this->Itemsgroup_model->get_all_itemsgroup($id);
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_status'] == 2)
			{$status='Submitted';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_aview/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_ss_pgrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_pitemsgroup_rev_ss($subjectList);
		}
		else
		{
			die('Alert! Contact to PECT IT Team');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_ss_status'] == 0)
			{$status='Pending';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_ss_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_ss_egrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_eitemsgroup_rev_ss($subjectList);
		}
		else
		{
			die('Alert! You are not authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_ss_status'] == 1)
			{$status='Under Reviewed';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_ss_agrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_aitemsgroup_rev_ss($subjectList);
		}
		else
		{
			die('Alert! You are not authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_ss_status'] == 2)
			{$status='Submitted';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_ss_aview/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_ae_pgrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_pitemsgroup_rev_ae($subjectList);
		}
		else
		{
			die('Alert! COntact to PECT IT Team');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			
			if($row['group_rev_ae_status'] == 0)
			{$status='Pending';}
			else{$status='Error! Contact to PEC Team';}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_ae_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			
			$data[]= array(
				++$i,
				$row['group_title_en'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_json_ir_revised_grouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==6)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_itemsgroup_revised_ir($subjectList);//get_all_pitemsgroup_rev_ae
		}
		else
		{
			die('Alert! Contact to PECT IT Team');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			
			if($row['group_rev_ae_status'] == 3 && $row['group_rev_ss_status'] == 3)
			{$status='Rejected by AE';}
			elseif($row['group_rev_ae_status'] == 0 && $row['group_rev_ss_status'] == 3)
			{$status='Rejected by SS';}
			elseif($row['group_rev_status'] == 4 && $row['group_rev_ss_status'] == 0 && $row['group_rev_ae_status'] == 0)
			{$status='Re-Submitted';}
			else{$status='Alert-606! Contact to PEC Team';}
			
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="#"> <i class="fa fa-eye"></i></a>';
			//$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_ir_view_resubmitted/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_ae_egrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_eitemsgroup_rev_ae($subjectList);
		}
		else
		{
			die('Alert! You are not authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_ae_status'] == 1)
			{$status='Under Reviewed';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_ae_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_ae_agrouplist($id = 0)
	{	
		if($this->session->userdata('role_id')==4)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Itemsgroup_model->get_all_aitemsgroup_rev_ae($subjectList);
		}
		else
		{
			die('Alert! You are not authorized');
		}
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_ae_status'] == 2)
			{$status='Submitted';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_ae_aview/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_psy_pgrouplist($id = 0)
	{	
		$records = $this->Itemsgroup_model->get_all_pitemsgroup_rev_psy();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			
			if($row['group_rev_psy_status'] == 0)
			{$status='Pending';}
			else{$status='Error! Contact to PEC Team';}
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_psy_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			
			$data[]= array(
				++$i,
				$row['group_title_en'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_psy_egrouplist($id = 0)
	{	
		$records = $this->Itemsgroup_model->get_all_eitemsgroup_rev_psy();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_psy_status'] == 1)
			{$status='Under Reviewed';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_psy_view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function datatable_jsonrev_psy_agrouplist($id = 0)
	{	
		$records = $this->Itemsgroup_model->get_all_aitemsgroup_rev_psy();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status='';
			$editoption='';
			if($row['group_rev_psy_status'] == 2)
			{$status='Reviewed';}
			else{$status='Error! Contact to PEC Team';}
		
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsgroup/rev_psy_aview/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			$data[]= array(
				++$i,
				$row['group_title_en'].'-'.$row['group_title_ur'],
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function add()
	{
		if($this->session->userdata('role_id')==3)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
				$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/itemsgroup/add'),'refresh');
				}
				else{
					$data = array(
						'group_title_en' => $this->input->post('group_title_en'),
						'group_title_ur' => $this->input->post('group_title_ur'),
						'group_grade_id' => $this->input->post('group_grade_id'),
						'group_subject_id' => $this->input->post('group_subject_id'),
						'group_item_1' => $this->input->post('group_item_1'),
						'group_item_2' => $this->input->post('group_item_2'),					
						'group_item_3' => $this->input->post('group_item_3'),
						'group_item_4' => $this->input->post('group_item_4'),
						'group_item_5' => $this->input->post('group_item_5'),
						'group_item_6' => $this->input->post('group_item_6'),
						'group_item_7' => $this->input->post('group_item_7'),
						'group_item_8' => $this->input->post('group_item_8'),
						'group_item_9' => $this->input->post('group_item_9'),
						'group_item_10' => $this->input->post('group_item_10'),
						'group_ordering' => $this->input->post('group_ordering'),
						'group_status' => '1',
						'group_createdby' => $this->session->userdata('admin_id'),
					);
					
					$ids = 1;
					($this->input->post('group_item_1')!='')?$ids++:$ids;
					($this->input->post('group_item_2')!='')?$ids++:$ids;
					($this->input->post('group_item_3')!='')?$ids++:$ids;
					($this->input->post('group_item_4')!='')?$ids++:$ids;
					($this->input->post('group_item_5')!='')?$ids++:$ids;
					($this->input->post('group_item_6')!='')?$ids++:$ids;
					($this->input->post('group_item_7')!='')?$ids++:$ids;
					($this->input->post('group_item_8')!='')?$ids++:$ids;
					($this->input->post('group_item_9')!='')?$ids++:$ids;
					($this->input->post('group_item_10')!='')?$ids++:$ids;

					$data = $this->security->xss_clean($data);
					$result = $this->Itemsgroup_model->add_itemsgroup($data);
					$id=$this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						
						for($i=1; $i<$ids; $i++)
						{
							$datai = array(
								'log_itemid' => $this->input->post('group_item_'.$i),
								'log_title' => 'Item attached with Itemsgroup created by Item Writer',
								'log_message' => 'Item{{'.$this->input->post('group_item_'.$i).'}} attached with Itemgroup {{'.$id.'}} created by {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'created',
								'log_admin_id' => $this->session->userdata('admin_id')
							);
							$logi = $this->Itemsgroup_model->log_entry($datai);
						}
						//print_r($datai);
						//die();
						$this->session->set_flashdata('success', 'Item Group has been added successfully!');
						redirect(base_url('admin/itemsgroup'));
					}
				}
			}
			else
			{
				$data['title'] = 'Add Item Group';
				$data['grades'] = $this->Itemsgroup_model->get_all_grades();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemsgroup/itemsgroup_add');
				$this->load->view('admin/includes/_footer');
			}	
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function edit($id = 0)
	{
		if($this->input->post('submit'))
        {
			//die('iw function');
				$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
				$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemspara_model->get_itemspara_by_id($id);
				$data['view'] = 'admin/Itemsgroup/itemsgroup_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'group_title_en' => $this->input->post('group_title_en'),
					'group_title_ur' => $this->input->post('group_title_ur'),
					'group_grade_id' => $this->input->post('group_grade_id'),
					'group_subject_id' => $this->input->post('group_subject_id'),
					'group_item_1' => $this->input->post('group_item_1'),
					'group_item_2' => $this->input->post('group_item_2'),
					'group_item_3' => $this->input->post('group_item_3'),
					'group_item_4' => $this->input->post('group_item_4'),
					'group_item_5' => $this->input->post('group_item_5'),
					'group_item_6' => $this->input->post('group_item_6'),
					'group_item_7' => $this->input->post('group_item_7'),
					'group_item_8' => $this->input->post('group_item_8'),
					'group_item_9' => $this->input->post('group_item_9'),
					'group_item_10' => $this->input->post('group_item_10'),
					'group_ordering' => $this->input->post('group_ordering'),
					'group_status' => '1',
					'group_createdby' => $this->session->userdata('admin_id'),
				);
				$ids = 1;
					($this->input->post('group_item_1')!='')?$ids++:$ids;
					($this->input->post('group_item_2')!='')?$ids++:$ids;
					($this->input->post('group_item_3')!='')?$ids++:$ids;
					($this->input->post('group_item_4')!='')?$ids++:$ids;
					($this->input->post('group_item_5')!='')?$ids++:$ids;
					($this->input->post('group_item_6')!='')?$ids++:$ids;
					($this->input->post('group_item_7')!='')?$ids++:$ids;
					($this->input->post('group_item_8')!='')?$ids++:$ids;
					($this->input->post('group_item_9')!='')?$ids++:$ids;
					($this->input->post('group_item_10')!='')?$ids++:$ids;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//$data = $this->security->xss_clean($data);
				$result = $this->Itemsgroup_model->edit_itemsgroup($data, $id);
				if($result){
					
					for($i=1; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('group_item_'.$i),
							'log_title' => 'Item attached with Itemsgroup updated by Item Writer',
							'log_message' => 'Item{{'.$this->input->post('group_item_'.$i).'}} attached with Itemgroup {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'updated',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemsgroup_model->log_entry($datai);
					}
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/itemsgroup'));
				}
			}
		}
		elseif($this->input->post('submit2'))
        {
			//die('ss function');
				$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
				$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemspara_model->get_itemspara_by_id($id);
				$data['view'] = 'admin/Itemsgroup/itemsgroup_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'group_title_en' => $this->input->post('group_title_en'),
					'group_title_ur' => $this->input->post('group_title_ur'),
					'group_grade_id' => $this->input->post('group_grade_id'),
					'group_subject_id' => $this->input->post('group_subject_id'),
					'group_item_1' => $this->input->post('group_item_1'),
					'group_item_2' => $this->input->post('group_item_2'),
					'group_item_3' => $this->input->post('group_item_3'),
					'group_item_4' => $this->input->post('group_item_4'),
					'group_item_5' => $this->input->post('group_item_5'),
					'group_item_6' => $this->input->post('group_item_6'),
					'group_item_7' => $this->input->post('group_item_7'),
					'group_item_8' => $this->input->post('group_item_8'),
					'group_item_9' => $this->input->post('group_item_9'),
					'group_item_10' => $this->input->post('group_item_10'),
					'group_ordering' => $this->input->post('group_ordering'),
					'group_createdby' => $this->session->userdata('admin_id'),
					'group_status' => '4',
					'group_status_ss' => '2',
					'group_comment_ss' => $this->input->post('group_comment_ss')
				);
				$ids = 1;
					($this->input->post('group_item_1')!='')?$ids++:$ids;
					($this->input->post('group_item_2')!='')?$ids++:$ids;
					($this->input->post('group_item_3')!='')?$ids++:$ids;
					($this->input->post('group_item_4')!='')?$ids++:$ids;
					($this->input->post('group_item_5')!='')?$ids++:$ids;
					($this->input->post('group_item_6')!='')?$ids++:$ids;
					($this->input->post('group_item_7')!='')?$ids++:$ids;
					($this->input->post('group_item_8')!='')?$ids++:$ids;
					($this->input->post('group_item_9')!='')?$ids++:$ids;
					($this->input->post('group_item_10')!='')?$ids++:$ids;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//$data = $this->security->xss_clean($data);
				$result = $this->Itemsgroup_model->edit_itemsgroup($data, $id);
				
				if($result){
					
					for($i=1; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('group_item_'.$i),
							'log_title' => 'Item attached with Itemsgroup updated by Item Writer',
							'log_message' => 'Item{{'.$this->input->post('group_item_'.$i).'}} attached with Itemgroup {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'updated',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemsgroup_model->log_entry($datai);
					}
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/itemsgroup/ssindex'));
				}
			}
		}
		else
        {
			$data['title'] = 'Edit Group';
			$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
			$data['grades'] = $this->Itemsgroup_model->get_all_grades();
            if($this->session->userdata('role_id')==3)
            {
                $subjectList = $this->session->userdata('subjects_ids');						
                $data['subjects'] = $this->Itemsgroup_model->get_subjects_grade($subjectList,$data['group'][0]->group_grade_id);
            }
            elseif($this->session->userdata('role_id')==2)
            {
                $subjectList = $this->session->userdata('subjects_ids');						
                $data['subjects'] = $this->Itemsgroup_model->get_subjects_grade($subjectList,$data['group'][0]->group_grade_id);
            }
            else
            {
                $data['subjects'] = $this->Itemsgroup_model->get_all_subjects();
            }
            
			$data['groupitems'] = $this->Itemsgroup_model->all_item_by_subject($data['subjects'][0]['subject_id'],$id);
 
 			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemsgroup/itemsgroup_edit', $data);
			$this->load->view('admin/includes/_footer');
			}
	}
		
	public function view($id = 0)
	{
		$data['title'] = 'View Group';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
		$data['group_item_1'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_10);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/group_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function delete($id = 0)
	{
		$ids = 1;
		$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
		$data['group'] = $data['group'][0];
		
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_2) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_3) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_4) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_5) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_6) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_7) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_8) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_9) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_10) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		
		$this->db->delete('ci_items_group', array('group_id' => $id));
		$this->session->set_flashdata('success', 'ItemsGroup has been deleted successfully!');
			
			for($i=1; $i<$ids; $i++)
			{
				$temp = "group_item_".$i;
				$datai = array(
					'log_itemid' => $data['group']->$temp,
					'log_title' => 'Item attached with Itemsgroup deleted by Item Writer',
					'log_message' => 'Item{{'.$data['group']->$temp.'}} attached with Itemgroup {{'.$id.'}} deleted by {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'deleted',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				print_r($datai);
				die();
				$logi = $this->Itemsgroup_model->log_entry($datai);
			}
		redirect(base_url('admin/itemsgroup'));
	}
	
	public function rev_delete($id = 0)
	{
		//die('Alert! You are not authorized to do this action');
		//$this->db->delete('ci_items_group', array('group_id' => $id, 'group_reviewedby=0', 'group_exported=1'));
		$ids = 1;
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		print_r($data['group']);
		die();
		(isset($data['group'][0]->group_item_1)&&$data['group'][0]->group_item_1!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_2)&&$data['group'][0]->group_item_2!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_3)&&$data['group'][0]->group_item_3!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_4)&&$data['group'][0]->group_item_4!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_5)&&$data['group'][0]->group_item_5!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_6)&&$data['group'][0]->group_item_6!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_7)&&$data['group'][0]->group_item_7!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_8)&&$data['group'][0]->group_item_8!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_9)&&$data['group'][0]->group_item_9!='')?$ids++:$ids;
		(isset($data['group'][0]->group_item_10)&&$data['group'][0]->group_item_10!='')?$ids++:$ids;
		
		$this->db->delete('ci_items_group_rev', array('group_id' => $id));
		$this->session->set_flashdata('success', 'ItemsGroup has been deleted successfully!');
			
			for($i=1; $i<$ids; $i++)
			{
				$datai = array(
					'log_itemid' => $data['group'][0]->group_item_.$i,
					'log_title' => 'Item attached with Itemsgroup deleted by Item Writer',
					'log_message' => 'Item{{'.$data['group'][0]->group_item_.$i.'}} attached with Itemgroup {{'.$id.'}} deleted by {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'deleted',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$logi = $this->Itemsgroup_model->log_entry($datai);
			}
		redirect(base_url('admin/Itemsgroup/rev_ss_pitemsgroup'));
	}
	
	public function submitgroup_for_approval($id)
	{ 
		$ids = 1;
		$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
		$data['group'] = $data['group'][0];
		
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		(isset($data['group']->group_item_1) && $data['group']->group_item_1!='') ? $ids++ : $ids;
		
		$result = $this->Itemsgroup_model->submitgroup_for_approval($id);
		if($result){
			
			for($i=1; $i<$ids; $i++)
			{	
				$temp = "group_item_".$i;
				$datai = array(
					'log_itemid' => $data['group']->$temp,
					'log_title' => 'Item attached with Itemsgroup submitted by Item Writer',
					'log_message' => 'Item{{'.$data['group']->$temp.'}} attached with Itemgroup {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'submitted',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$logi = $this->Itemsgroup_model->log_entry($datai);
			}
			$this->session->set_flashdata('success', 'ItemGroup has been submitted successfully!');
			redirect(base_url('admin/Itemsgroup'));
		}
		else{
			$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
			redirect(base_url('admin/Itemsgroup'),'refresh');
		}
	}
	
	public function ss_view($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
		$data['group_item_1'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_10);
			
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/ss_group_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function ss_submit_for_approval($id=0)
	{
		if($this->input->post('group_comment_ss')=="" && $this->input->post('reject_ss'))
		{
			$this->form_validation->set_rules('group_comment_ss', 'Itemsgroup (Comments SS)', 'trim|required');
			$this->session->set_flashdata('error', 'SS comments required!');
			redirect(base_url('admin/itemsgroup/ss_view/'.$id));
		}
		else
		{
			$ids = 1;
			$datag['group'] = $this->Itemsgroup_model->get_group_by_id($id);
			$datag['group'] = $datag['group'][0];
			
			(isset($datag['group']->group_item_1) && $datag['group']->group_item_1!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_2) && $datag['group']->group_item_2!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_3) && $datag['group']->group_item_3!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_4) && $datag['group']->group_item_4!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_5) && $datag['group']->group_item_5!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_6) && $datag['group']->group_item_6!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_7) && $datag['group']->group_item_7!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_8) && $datag['group']->group_item_8!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_9) && $datag['group']->group_item_9!='') ? $ids++ : $ids;
			(isset($datag['group']->group_item_10) && $datag['group']->group_item_10!='') ? $ids++ : $ids;
			
			$group_status_ss ='';
			$group_status = '';
			if($this->input->post('submit_awc'))
			{
				$group_status_ss ='2';
				$group_status = '4';
			}
			elseif($this->input->post('submit_awoc'))
			{
				$group_status_ss ='3';
				$group_status = '4';
			}
			else{
				$group_status_ss ='1';
				$group_status = '3';
			}
			
			$data = array(
					'group_approvedby' => $this->session->userdata('admin_id'),
					'group_approved' => date('Y-m-d H:i:s'),
					'group_comment_ss' => $this->input->post('group_comment_ss'),
					'group_status_ss' => $group_status_ss,
					'group_status' => $group_status,
				);
			//print_r($data);
			//die();
			$result = $this->Itemsgroup_model->ss_submit_for_approval($data, $id);
			$log_messagetype='';
			if($group_status_ss =='2'){$log_messagetype='ss_accept_w_c';}
			elseif($group_status_ss =='3'){$log_messagetype='ss_accept_wo_c';}
			else{$log_messagetype='ss_rejected';}
			if($result){
				
				
				for($i=1; $i<$ids; $i++)
				{	
					$temp = "group_item_".$i;
					$datai = array(
						'log_itemid' => $datag['group']->$temp,
						'log_title' => 'Item attached with Itemsgroup submitted by SS',
						'log_message' => 'Item{{'.$datag['group']->$temp.'}} attached with Itemgroup {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
						'log_admin_id' => $this->session->userdata('admin_id')
					);
					$logi = $this->Itemsgroup_model->log_entry($datai);
				}
				$this->session->set_flashdata('success', 'Itemsgroup has been submitted successfully!');
				redirect(base_url('admin/itemsgroup/rev_ss_pitemsgroup'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/itemsgroup/rev_ss_pitemsgroup'),'refresh');
			}
		}
	}
	
	public function ae_view($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
		$data['group_item_1'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_10);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/ae_group_view', $data);
		$this->load->view('admin/includes/_footer');
	} 
	
	public function ae_submit_for_approval($id=0)
	{
		//die('');
		if($this->input->post('group_comment_ae')=="" && $this->input->post('reject_ae'))
		{
			$this->form_validation->set_rules('group_comment_ae', 'Itemsgroup Comments AE', 'trim|required');
			$this->session->set_flashdata('error', 'AE comments required!');
			redirect(base_url('admin/itemsgroup/ae_view/'.$id));
		}
		else
		{
			$group_status_ae ='';
			if($this->input->post('approve'))
			{
				$group_status_ae ='1';
			}
			else{
				$group_status_ae ='2';
				$group_status ='3';
			}
			
			if($group_status_ae ==1)
			{
				$data = array(
					'group_reviewedby' => $this->session->userdata('admin_id'),
					'group_reviewed' => date('Y-m-d H:i:s'),
					'group_comment_ae' => $this->input->post('group_comment_ae'),
					'group_status_ae' => $group_status_ae,
				);
			}
			else
			{
				$data = array(
					'group_reviewedby' => $this->session->userdata('admin_id'),
					'group_reviewed' => date('Y-m-d H:i:s'),
					'group_comment_ae' => $this->input->post('group_comment_ae'),
					'group_status_ae' => $group_status_ae,
					'group_status' => $group_status
				);
			}
			
			$result = $this->Itemsgroup_model->ae_submit_for_approval($data, $id);
			$log_messagetype='';
			if($group_status_ae =='1')
			{$log_messagetype='ae_approved';}
			else{$log_messagetype='ae_rejected';}
			if($result){
				$data = array(
					'log_itemid' => $id,
					'log_title' => 'Itemsgroup approved by AE',
					'log_message' => 'Itemsgroup {{log_itemid}} approved by AE {{log_admin_id}} on {{log_date}}',
					'log_messagetype' =>'approved',
					'log_admin_id' => $this->session->userdata('admin_id')
				);
				$log = $this->Itemsgroup_model->log_entry($data);
				$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
				redirect(base_url('admin/itemsgroup/aeindex'));
			}
			else{
				$this->session->set_flashdata('errors', 'Error in Final Submission of Items!!! Please contact PEC IT Team');
				redirect(base_url('admin/itemsgroup/aeindex'),'refresh');
			}
		}
	}
	 
	public function rev_view($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group_exported'] = $this->Itemsgroup_model->find_exported($id);
		
		if($data['group_exported'][0]->group_exported=='1')
		{$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);}
		else
		{$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);}
		
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		
		if($data['group'][0]->group_item_1!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_1);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_1'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_1);}
			else
			{$data['group_item_1'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_1);}
		}
		
		if($data['group'][0]->group_item_2!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_2);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_2'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_2);}
			else
			{$data['group_item_2'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_2);}
		}
		if($data['group'][0]->group_item_3!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_3);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_3'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_3);}
			else
			{$data['group_item_3'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_3);}
		}
		if($data['group'][0]->group_item_4!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_4);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_4'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_4);}
			else
			{$data['group_item_4'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_4);}
		}
		if($data['group'][0]->group_item_5!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_5);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_5'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_5);}
			else
			{$data['group_item_5'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_5);}
		}
		if($data['group'][0]->group_item_6!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_6);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_6'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_6);}
			else
			{$data['group_item_6'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_6);}
		}
		if($data['group'][0]->group_item_7!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_7);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_7'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_7);}
			else
			{$data['group_item_7'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_7);}
		}
		if($data['group'][0]->group_item_8!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_8);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_8'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_8);}
			else
			{$data['group_item_8'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_8);}
		}
		if($data['group'][0]->group_item_9!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_9);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_9'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_9);}
			else
			{$data['group_item_9'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_9);}
		}
		if($data['group'][0]->group_item_10!=0)
		{
			$data['item_exported'] = $this->Items_model->find_exported($data['group'][0]->group_item_10);
			if(isset($data['item_exported'][0])&&$data['item_exported'][0]->item_exported=='1')
			{$data['group_item_10'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_10);}
			else
			{$data['group_item_10'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_10);}
		}
		
		$data['status_gi_1'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_1);
		$data['status_gi_2'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_2);
		$data['status_gi_3'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_3);
		$data['status_gi_4'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_4);
		$data['status_gi_5'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_5);
		$data['status_gi_6'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_6);
		$data['status_gi_7'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_7);
		$data['status_gi_8'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_8);
		$data['status_gi_9'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_9);
		$data['status_gi_10'] = $this->Itemsgroup_model->get_item_status($data['group'][0]->group_item_10);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_group_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_aview($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		$data['irinfo'] = $this->Itemsgroup_model->get_irinfo_by_id($data['group'][0]->group_rev_revid);
		$data['group_item_1'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_10);
			
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_agroup_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_view($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		/*
		$data['group_exported'] = $this->Itemsgroup_model->find_exported($id);
		if($data['group_exported'][0]->group_exported=='1')
		{$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);}
		else
		{$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);}
		*/
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		$data['irinfo'] = $this->Itemsgroup_model->get_irinfo_by_id($data['group'][0]->group_rev_revid);
		$data['rev_ss'] = $this->Itemsgroup_model->get_rev_ssinfo_by_id($data['group'][0]->group_rev_ss_id);
		
		$data['group_item_1'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Itemsgroup_model->get_rev_items_by_id($data['group'][0]->group_item_10);
		
		$data['status_gi_1'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_1);
		$data['status_gi_2'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_2);
		$data['status_gi_3'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_3);
		$data['status_gi_4'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_4);
		$data['status_gi_5'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_5);
		$data['status_gi_6'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_6);
		$data['status_gi_7'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_7);
		$data['status_gi_8'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_8);
		$data['status_gi_9'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_9);
		$data['status_gi_10'] = $this->Itemsgroup_model->get_ss_item_status($data['group'][0]->group_item_10);
		//echo '<pre>';
		//print_r($data);
		//die();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ss_group_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_aview($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		$data['irinfo'] = $this->Itemsgroup_model->get_irinfo_by_id($data['group'][0]->group_rev_revid);
		$data['rev_ss'] = $this->Itemsgroup_model->get_rev_ssinfo_by_id($data['group'][0]->group_rev_ss_id);
		
		$data['group_item_1'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_10);
			
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ss_agroup_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_view($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		$data['irinfo'] = $this->Itemsgroup_model->get_irinfo_by_id($data['group'][0]->group_rev_revid);
		$data['rev_ss'] = $this->Itemsgroup_model->get_rev_ssinfo_by_id($data['group'][0]->group_rev_ss_id);
		
		$data['group_item_1'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_10);
		
		$data['status_gi_1'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_1);
		$data['status_gi_2'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_2);
		$data['status_gi_3'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_3);
		$data['status_gi_4'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_4);
		$data['status_gi_5'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_5);
		$data['status_gi_6'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_6);
		$data['status_gi_7'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_7);
		$data['status_gi_8'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_8);
		$data['status_gi_9'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_9);
		$data['status_gi_10'] = $this->Itemsgroup_model->get_ae_item_status($data['group'][0]->group_item_10);
			
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ae_group_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ae_aview($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		$data['irinfo'] = $this->Itemsgroup_model->get_irinfo_by_id($data['group'][0]->group_rev_revid);
		$data['rev_ss'] = $this->Itemsgroup_model->get_rev_ssinfo_by_id($data['group'][0]->group_rev_ss_id);
		$data['rev_ae'] = $this->Itemsgroup_model->get_rev_aeinfo_by_id($data['group'][0]->group_rev_ae_id);
		
		$data['group_item_1'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_10);
			
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_ae_agroup_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_view($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		$data['irinfo'] = $this->Itemsgroup_model->get_irinfo_by_id($data['group'][0]->group_rev_revid);
		$data['rev_ss'] = $this->Itemsgroup_model->get_rev_ssinfo_by_id($data['group'][0]->group_rev_ss_id);
		$data['rev_ae'] = $this->Itemsgroup_model->get_rev_aeinfo_by_id($data['group'][0]->group_rev_ae_id);
		
		$data['group_item_1'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_10);
		
		$data['status_gi_1'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_1);
		$data['status_gi_2'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_2);
		$data['status_gi_3'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_3);
		$data['status_gi_4'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_4);
		$data['status_gi_5'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_5);
		$data['status_gi_6'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_6);
		$data['status_gi_7'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_7);
		$data['status_gi_8'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_8);
		$data['status_gi_9'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_9);
		$data['status_gi_10'] = $this->Itemsgroup_model->get_psy_item_status($data['group'][0]->group_item_10);
			
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_psy_group_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_psy_aview($id = 0)
	{
		$data['title'] = 'View ItemsGroup';
		$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
		$data['iwinfo'] = $this->Itemsgroup_model->get_iwinfo_by_id($data['group'][0]->group_createdby);
		$data['ss'] = $this->Itemsgroup_model->get_ssinfo_by_id($data['group'][0]->group_approvedby);
		$data['ae'] = $this->Itemsgroup_model->get_aeinfo_by_id($data['group'][0]->group_reviewedby);
		$data['psy'] = $this->Itemsgroup_model->get_psyinfo_by_id($data['group'][0]->group_commentby_psy);
		$data['irinfo'] = $this->Itemsgroup_model->get_irinfo_by_id($data['group'][0]->group_rev_revid);
		$data['rev_ss'] = $this->Itemsgroup_model->get_rev_ssinfo_by_id($data['group'][0]->group_rev_ss_id);
		$data['rev_ae'] = $this->Itemsgroup_model->get_rev_aeinfo_by_id($data['group'][0]->group_rev_ae_id);
		$data['rev_psy'] = $this->Itemsgroup_model->get_rev_psyinfo_by_id($data['group'][0]->group_rev_psy_id);
		
		$data['group_item_1'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Items_model->get_rev_items_by_id($data['group'][0]->group_item_10);
			
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemsgroup/rev_psy_agroup_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_edit($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
			$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
				$data['view'] = 'admin/Itemsgroup/itemsgroup_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'group_title_en' => $this->input->post('group_title_en'),
					'group_title_ur' => $this->input->post('group_title_ur'),
					'group_grade_id' => $this->input->post('group_grade_id'),
					'group_subject_id' => $this->input->post('group_subject_id'),
					'group_item_1' => $this->input->post('group_item_1'),
					'group_item_2' => $this->input->post('group_item_2'),
					'group_item_3' => $this->input->post('group_item_3'),
					'group_item_4' => $this->input->post('group_item_4'),
					'group_item_5' => $this->input->post('group_item_5'),
					'group_item_6' => $this->input->post('group_item_6'),
					'group_item_7' => $this->input->post('group_item_7'),
					'group_item_8' => $this->input->post('group_item_8'),
					'group_item_9' => $this->input->post('group_item_9'),
					'group_item_10' => $this->input->post('group_item_10'),
					'group_ordering' => $this->input->post('group_ordering'),
					'group_status' => '1',
					'group_updatedby' => $this->session->userdata('admin_id'),
					'group_updated' => date("Y-m-d H:i:s")
				);
				$ids = 1;
					($this->input->post('group_item_1')!='')?$ids++:$ids;
					($this->input->post('group_item_2')!='')?$ids++:$ids;
					($this->input->post('group_item_3')!='')?$ids++:$ids;
					($this->input->post('group_item_4')!='')?$ids++:$ids;
					($this->input->post('group_item_5')!='')?$ids++:$ids;
					($this->input->post('group_item_6')!='')?$ids++:$ids;
					($this->input->post('group_item_7')!='')?$ids++:$ids;
					($this->input->post('group_item_8')!='')?$ids++:$ids;
					($this->input->post('group_item_9')!='')?$ids++:$ids;
					($this->input->post('group_item_10')!='')?$ids++:$ids;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Itemsgroup_model->edit_itemsgroup_rev($data, $id);
				if($result){
					
					$result = $this->Itemsgroup_model->update_itemsgroup_exported('1',$id);//update_itemsgroup_exported
					
					for($i=1; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('group_item_'.$i),
							'log_title' => 'Item attached with Itemsgroup updated by Item Writer',
							'log_message' => 'Item{{'.$this->input->post('group_item_'.$i).'}} attached with Itemgroup {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'updated',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemsgroup_model->log_entry($datai);
					}
					
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/itemsgroup/rev_view/'.$id));
				}
			}
		}
		else
		{
			$result_rev = $this->Itemsgroup_model->find_rev_itemsgroup_by_id($id);
			if(empty($result_rev))
			{
				$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
				$data2 = array(
					'group_id' => $data['group'][0]->group_id,
					'group_title_en' => $data['group'][0]->group_title_en,
					'group_title_ur' => $data['group'][0]->group_title_ur,
					'group_grade_id' => $data['group'][0]->group_grade_id,
					'group_subject_id' => $data['group'][0]->group_subject_id,
					'group_item_1' => $data['group'][0]->group_item_1,
					'group_item_2' => $data['group'][0]->group_item_2,
					'group_item_3' => $data['group'][0]->group_item_3,
					'group_item_4' => $data['group'][0]->group_item_4,
					'group_item_5' => $data['group'][0]->group_item_5,
					'group_item_6' => $data['group'][0]->group_item_6,
					'group_item_7' => $data['group'][0]->group_item_7,
					'group_item_8' => $data['group'][0]->group_item_8,
					'group_item_9' => $data['group'][0]->group_item_9,
					'group_item_10' => $data['group'][0]->group_item_10,
					'group_ordering' => $data['group'][0]->group_ordering,
					'group_status' => $data['group'][0]->group_status,
					'group_createdby' => $data['group'][0]->group_createdby,
					'group_created' => $data['group'][0]->group_created,
					'group_status_ss' => $data['group'][0]->group_status_ss,
					'group_comment_ss' => $data['group'][0]->group_comment_ss,
					'group_approved' => $data['group'][0]->group_approved,
					'group_approvedby' => $data['group'][0]->group_approvedby,
					'group_status_ae' => $data['group'][0]->group_status_ae,
					'group_comment_ae' => $data['group'][0]->group_comment_ae,
					'group_reviewed' => $data['group'][0]->group_reviewed,
					'group_reviewedby' => $data['group'][0]->group_reviewedby,
					'group_status_psy' => $data['group'][0]->group_status_psy,
					'group_comment_psy' => $data['group'][0]->group_comment_psy,
					'group_commentby_psy' => $data['group'][0]->group_commentby_psy
				);
				
				$group_items = $data['group'][0]->group_item_1.','.$data['group'][0]->group_item_2.',';
				if(isset($data['group'][0]->group_item_3)&&$data['group'][0]->group_item_3!=0)
				$group_items .= $data['group'][0]->group_item_3.',';
				if(isset($data['group'][0]->group_item_4)&&$data['group'][0]->group_item_4!=0)
				$group_items .= $data['group'][0]->group_item_4.',';
				if(isset($data['group'][0]->group_item_5)&&$data['group'][0]->group_item_5!=0)
				$group_items .= $data['group'][0]->group_item_5.',';
				if(isset($data['group'][0]->group_item_6)&&$data['group'][0]->group_item_6!=0)
				$group_items .= $data['group'][0]->group_item_6.',';
				if(isset($data['group'][0]->group_item_7)&&$data['group'][0]->group_item_7!=0)
				$group_items .= $data['group'][0]->group_item_7.',';
				if(isset($data['group'][0]->group_item_8)&&$data['group'][0]->group_item_8!=0)
				$group_items .= $data['group'][0]->group_item_8.',';
				if(isset($data['group'][0]->group_item_9)&&$data['group'][0]->group_item_9!=0)
				$group_items .= $data['group'][0]->group_item_9.',';
				if(isset($data['group'][0]->group_item_10)&&$data['group'][0]->group_item_10!=0)
				$group_items .= $data['group'][0]->group_item_10.',';
								
				$group_items = rtrim($group_items, ",");
				
				$data2['group_rev_status'] = '1';
				$data2['group_rev_revid'] = $this->session->userdata('admin_id');
				$data2['group_rev_date_exp'] = date("Y-m-d H:i:s");
				$result = $this->Itemsgroup_model->add_itemsgroup_rev($data2);
				
				$data['title'] = 'Edit Group';
				$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
				$data['grades'] = $this->Itemsgroup_model->get_all_grades();
				if($this->session->userdata('role_id')!=6)
				{
					die('Alert! You are not authorized here');
				}
				$data['groupitems'] = $this->Itemsgroup_model->all_rev_item_by_subject($data['group'][0]->group_subject_id);
	 
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemsgroup/rev_itemsgroup_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
			else
			{
				$data['title'] = 'Edit Group';
				$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
				$data['grades'] = $this->Itemsgroup_model->get_all_grades();
				$data['subjects'] = $this->Itemsgroup_model->get_all_subjects();
				if($this->session->userdata('role_id')==6)
				{
					$subjectList = $this->session->userdata('subjects_ids');						
					$data['subjects'] = $this->Itemsgroup_model->get_subjects_grade($subjectList,$data['group'][0]->group_grade_id);
				}
				else
				{
					die('Alert! You are not authorized here');
				}
				$data['groupitems'] = $this->Itemsgroup_model->all_item_by_subject($data['subjects'][0]['subject_id']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemsgroup/rev_itemsgroup_edit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}
	
	public function rev_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==6)
		{
			if($this->input->post('submit'))
			{
				$result_rev = $this->Itemsgroup_model->find_rev_itemsgroup_by_id($id);
				if(empty($result_rev))
				{
					//die('Direct Submit');
					$ids = 1;
					$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
					
					(isset($datag['group'][0]->group_item_1) && $datag['group'][0]->group_item_1!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_2) && $datag['group'][0]->group_item_2!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_3) && $datag['group'][0]->group_item_3!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_4) && $datag['group'][0]->group_item_4!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_5) && $datag['group'][0]->group_item_5!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_6) && $datag['group'][0]->group_item_6!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_7) && $datag['group'][0]->group_item_7!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_8) && $datag['group'][0]->group_item_8!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_9) && $datag['group'][0]->group_item_9!='') ? $ids++ : $ids;
					(isset($datag['group'][0]->group_item_10) && $datag['group'][0]->group_item_10!='') ? $ids++ : $ids;
					
					$data2 = array(
								'group_id' => $data['group'][0]->group_id,
								'group_title_en' => $data['group'][0]->group_title_en,
								'group_title_ur' => $data['group'][0]->group_title_ur,
								'group_grade_id' => $data['group'][0]->group_grade_id,
								'group_subject_id' => $data['group'][0]->group_subject_id,
								'group_item_1' => $data['group'][0]->group_item_1,
								'group_item_2' => $data['group'][0]->group_item_2,
								'group_item_3' => $data['group'][0]->group_item_3,
								'group_item_4' => $data['group'][0]->group_item_4,
								'group_item_5' => $data['group'][0]->group_item_5,
								'group_item_6' => $data['group'][0]->group_item_6,
								'group_item_7' => $data['group'][0]->group_item_7,
								'group_item_8' => $data['group'][0]->group_item_8,
								'group_item_9' => $data['group'][0]->group_item_9,
								'group_item_10' => $data['group'][0]->group_item_10,
								'group_ordering' => $data['group'][0]->group_ordering,
								'group_status' => $data['group'][0]->group_status,
								'group_createdby' => $data['group'][0]->group_createdby,
								'group_created' => $data['group'][0]->group_created,
								'group_status_ss' => $data['group'][0]->group_status_ss,
								'group_comment_ss' => $data['group'][0]->group_comment_ss,
								'group_approved' => $data['group'][0]->group_approved,
								'group_approvedby' => $data['group'][0]->group_approvedby,
								'group_status_ae' => $data['group'][0]->group_status_ae,
								'group_comment_ae' => $data['group'][0]->group_comment_ae,
								'group_reviewed' => $data['group'][0]->group_reviewed,
								'group_reviewedby' => $data['group'][0]->group_reviewedby,
								'group_status_psy' => $data['group'][0]->group_status_psy,
								'group_comment_psy' => $data['group'][0]->group_comment_psy,
								'group_commentby_psy' => $data['group'][0]->group_commentby_psy
							);
					
					$group_items = $data['group'][0]->group_item_1.','.$data['group'][0]->group_item_2.',';
					if(isset($data['group'][0]->group_item_3)&&$data['group'][0]->group_item_3!=0)
					$group_items .= $data['group'][0]->group_item_3.',';
					if(isset($data['group'][0]->group_item_4)&&$data['group'][0]->group_item_4!=0)
					$group_items .= $data['group'][0]->group_item_4.',';
					if(isset($data['group'][0]->group_item_5)&&$data['group'][0]->group_item_5!=0)
					$group_items .= $data['group'][0]->group_item_5.',';
					if(isset($data['group'][0]->group_item_6)&&$data['group'][0]->group_item_6!=0)
					$group_items .= $data['group'][0]->group_item_6.',';
					if(isset($data['group'][0]->group_item_7)&&$data['group'][0]->group_item_7!=0)
					$group_items .= $data['group'][0]->group_item_7.',';
					if(isset($data['group'][0]->group_item_8)&&$data['group'][0]->group_item_8!=0)
					$group_items .= $data['group'][0]->group_item_8.',';
					if(isset($data['group'][0]->group_item_9)&&$data['group'][0]->group_item_9!=0)
					$group_items .= $data['group'][0]->group_item_9.',';
					if(isset($data['group'][0]->group_item_10)&&$data['group'][0]->group_item_10!=0)
					$group_items .= $data['group'][0]->group_item_10.',';
									
					$group_items = rtrim($group_items, ",");
				
					$data2['group_rev_status'] = '2';
					$data2['group_rev_revid'] = $this->session->userdata('admin_id');
					$data2['group_rev_date_acc'] = date("Y-m-d H:i:s");
					$data2['group_rev_date_exp'] = date("Y-m-d H:i:s");
					$data2['group_rev_comment'] = $this->input->post('group_rev_comment');
					//echo '<pre>';
					//print_r($data);
					//die();
					$result = $this->Itemsgroup_model->add_itemsgroup_rev($data2);
					if($result)
						{
							$result = $this->Itemsgroup_model->update_itemsgroup_exported('1',$id);
							$result = $this->Itemsgroup_model->get_update_itemsofgroup_exported($group_items);
							
							for($i=1; $i<$ids; $i++)
							{	
								$temp = "group_item_".$i;
								$datai = array(
									'log_itemid' => $datag['group'][0]->$temp,
									'log_title' => 'Item attached with Itemsgroup submitted by SS',
									'log_message' => 'Item{{'.$datag['group'][0]->$temp.'}} attached with Itemgroup {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
									'log_messagetype' =>$log_messagetype,
									'log_admin_id' => $this->session->userdata('admin_id')
								);
								$logi = $this->Itemsgroup_model->log_entry($datai);
							}
							$this->session->set_flashdata('success', 'Itemsgroup has been submitted successfully!');
							//$this->load->view('admin/Itemsgroup/rev_pitemsgroup');
							redirect(base_url('admin/Itemsgroup/rev_pitemsgroup'),'refresh');
						}
					else
					{
						$this->session->set_flashdata('errors', 'Error in Revision of Items!!! Please contact PEC IT Team');
						redirect(base_url('admin/Itemsgroup/rev_pitemsgroup'),'refresh');
					}	
				}
				else
				{
                    //die('in else');
					if($result_rev[0]->group_rev_revid==$this->session->userdata('admin_id'))
					{
                        $result = $this->Itemsgroup_model->update_itemsgroup_exported('1',$id);
						$data['group_rev_status'] = '2';
						$data['group_rev_date_acc'] = date("Y-m-d H:i:s");
						$data['group_rev_comment'] = $this->input->post('group_rev_comment');
						$result = $this->Itemsgroup_model->edit_itemsgroup_rev($data, $id);
						
						$ids = 1;
						$data['group'] = $this->Itemsgroup_model->get_group_by_id($id);
						
						(isset($datag['group'][0]->group_item_1) && $datag['group'][0]->group_item_1!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_2) && $datag['group'][0]->group_item_2!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_3) && $datag['group'][0]->group_item_3!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_4) && $datag['group'][0]->group_item_4!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_5) && $datag['group'][0]->group_item_5!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_6) && $datag['group'][0]->group_item_6!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_7) && $datag['group'][0]->group_item_7!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_8) && $datag['group'][0]->group_item_8!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_9) && $datag['group'][0]->group_item_9!='') ? $ids++ : $ids;
						(isset($datag['group'][0]->group_item_10) && $datag['group'][0]->group_item_10!='') ? $ids++ : $ids;
					
						$log_messagetype='';
						if($this->session->userdata('role_id')==6)
						{$log_messagetype='rev_updated';}
						else
						{$log_messagetype='updated';}
						
						if($result){
							
							for($i=1; $i<$ids; $i++)
							{	
								$temp = "group_item_".$i;
								$datai = array(
									'log_itemid' => $datag['group'][0]->$temp,
									'log_title' => 'Item attached with Itemsgroup submitted by SS',
									'log_message' => 'Item{{'.$datag['group'][0]->$temp.'}} attached with Itemgroup {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
									'log_messagetype' =>$log_messagetype,
									'log_admin_id' => $this->session->userdata('admin_id')
								);
								$logi = $this->Itemsgroup_model->log_entry($datai);
							}
							//$log = $this->Itemsgroup_model->log_entry($data);
							$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
							if($this->session->userdata('role_id')==6)
							{
								redirect(base_url('admin/Itemsgroup/rev_pitemsgroup'));
								//$this->load->view('admin/Itemsgroup/rev_pitemsgroup');
							}
							else
							{
								die('Alert! You are not authorized here');
							}
						}
					}
					else
					{
						die('Alert! This Itemsgroup already assigned to other item reviewer');
					}
				}				
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function rev_ss_edit($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
			$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
				$data['view'] = 'admin/Itemsgroup/rev_ss_itemsgroup_edit';
				$this->load->view('layout', $data);
			}
			else{
				$ids = 1;
					($this->input->post('group_item_1')!='')?$ids++:$ids;
					($this->input->post('group_item_2')!='')?$ids++:$ids;
					($this->input->post('group_item_3')!='')?$ids++:$ids;
					($this->input->post('group_item_4')!='')?$ids++:$ids;
					($this->input->post('group_item_5')!='')?$ids++:$ids;
					($this->input->post('group_item_6')!='')?$ids++:$ids;
					($this->input->post('group_item_7')!='')?$ids++:$ids;
					($this->input->post('group_item_8')!='')?$ids++:$ids;
					($this->input->post('group_item_9')!='')?$ids++:$ids;
					($this->input->post('group_item_10')!='')?$ids++:$ids;
					
				$data = array(
					'group_title_en' => $this->input->post('group_title_en'),
					'group_title_ur' => $this->input->post('group_title_ur'),
					'group_grade_id' => $this->input->post('group_grade_id'),
					'group_subject_id' => $this->input->post('group_subject_id'),
					'group_item_1' => $this->input->post('group_item_1'),
					'group_item_2' => $this->input->post('group_item_2'),
					'group_item_3' => $this->input->post('group_item_3'),
					'group_item_4' => $this->input->post('group_item_4'),
					'group_item_5' => $this->input->post('group_item_5'),
					'group_item_6' => $this->input->post('group_item_6'),
					'group_item_7' => $this->input->post('group_item_7'),
					'group_item_8' => $this->input->post('group_item_8'),
					'group_item_9' => $this->input->post('group_item_9'),
					'group_item_10' => $this->input->post('group_item_10'),
					'group_ordering' => $this->input->post('group_ordering'),
					'group_status' => '1',
					'group_updatedby' => $this->session->userdata('admin_id'),
					'group_updated' => date("Y-m-d H:i:s")
				);
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Itemsgroup_model->edit_itemsgroup_rev($data, $id);
				if($result){
					
					for($i=1; $i<$ids; $i++)
					{
						$datai = array(
							'log_itemid' => $this->input->post('group_item_'.$i),
							'log_title' => 'Rev_Item attached with Itemsgroup updated by SS',
							'log_message' => 'Item{{'.$this->input->post('group_item_'.$i).'}} attached with Itemgroup {{'.$id.'}} updated by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'rev_ss_updated',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemsgroup_model->log_entry($datai);
					}
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/itemsgroup/rev_ss_view/'.$id));
				}
			}
		
		}
		else
		{
			//$result = $this->Itemsgroup_model->update_group_rev_ss_status($id);
			$data['title'] = 'Edit Group';
			$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
			$data['grades'] = $this->Itemsgroup_model->get_all_grades();
			$data['subjects'] = $this->Itemsgroup_model->get_all_subjects();
			if($this->session->userdata('role_id')!=2)
			{
				die('Alert! You are not authorized here');
			}
			$data['groupitems'] = $this->Itemsgroup_model->all_rev_item_by_subject($data['group'][0]->group_subject_id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemsgroup/rev_ss_itemsgroup_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ae_edit($id = 0)
	{
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
			$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
			$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
			$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['items'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
				$data['view'] = 'admin/Itemsgroup/rev_ae_itemsgroup_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'group_title_en' => $this->input->post('group_title_en'),
					'group_title_ur' => $this->input->post('group_title_ur'),
					'group_grade_id' => $this->input->post('group_grade_id'),
					'group_subject_id' => $this->input->post('group_subject_id'),
					'group_item_1' => $this->input->post('group_item_1'),
					'group_item_2' => $this->input->post('group_item_2'),
					'group_item_3' => $this->input->post('group_item_3'),
					'group_item_4' => $this->input->post('group_item_4'),
					'group_item_5' => $this->input->post('group_item_5'),
					'group_item_6' => $this->input->post('group_item_6'),
					'group_item_7' => $this->input->post('group_item_7'),
					'group_item_8' => $this->input->post('group_item_8'),
					'group_item_9' => $this->input->post('group_item_9'),
					'group_item_10' => $this->input->post('group_item_10'),
					'group_ordering' => $this->input->post('group_ordering'),
					'group_updatedby' => $this->session->userdata('admin_id'),
					'group_updated' => date("Y-m-d H:i:s")
				);
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				$result = $this->Itemsgroup_model->edit_itemsgroup_rev($data, $id);
				if($result){
					
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/itemsgroup/rev_ae_view/'.$id));
				}
			}
		
		}
		else
		{
			//$result = $this->Itemsgroup_model->update_group_rev_ae_status($id);
			$data['title'] = 'Edit Group';
			$data['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
			$data['grades'] = $this->Itemsgroup_model->get_all_grades();
			$data['subjects'] = $this->Itemsgroup_model->get_all_subjects();
			if($this->session->userdata('role_id')!=4)
			{
				die('Alert! You are not authorized here');
			}
			$data['groupitems'] = $this->Itemsgroup_model->all_rev_item_by_subject($data['group'][0]->group_subject_id);
			//echo '<pre>';	print_r($data['groupitems']); echo '<hr />'; die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/Itemsgroup/rev_ae_itemsgroup_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function rev_ss_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$ids = 1;
				$datag['group'] = $this->Itemsgroup_model->get_group_rev_by_id($id);
				$datag['group'] = $datag['group'][0];
				
				(isset($datag['group']->group_item_1) && $datag['group']->group_item_1!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_2) && $datag['group']->group_item_2!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_3) && $datag['group']->group_item_3!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_4) && $datag['group']->group_item_4!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_5) && $datag['group']->group_item_5!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_6) && $datag['group']->group_item_6!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_7) && $datag['group']->group_item_7!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_8) && $datag['group']->group_item_8!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_9) && $datag['group']->group_item_9!=0) ? $ids++ : $ids;
				(isset($datag['group']->group_item_10) && $datag['group']->group_item_10!=0) ? $ids++ : $ids;
				
				$data['group_rev_ss_id'] = $this->session->userdata('admin_id');
				$data['group_rev_ss_status'] = '2';
				$data['group_rev_ss_date_acc'] = date("Y-m-d H:i:s");
				$data['group_rev_ss_comment'] = $this->input->post('group_rev_ss_comment');
				
				$result = $this->Itemsgroup_model->edit_itemsgroup_rev($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==2)
				{$log_messagetype='rev_ss_accpted';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					
					for($i=1; $i<$ids; $i++)
					{	
						$temp = "group_item_".$i;
						$datai = array(
							'log_itemid' => $datag['group']->$temp,
							'log_title' => 'Rev_Item attached with Itemsgroup submitted by SS',
							'log_message' => 'Rev_Item{{'.$datag['group']->$temp.'}} attached with Itemgroup {{'.$id.'}} submitted by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>$log_messagetype,
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$logi = $this->Itemsgroup_model->log_entry($datai);
					}
				
					//$log = $this->Itemsgroup_model->log_entry($data);
					$this->session->set_flashdata('success', 'Itemsgroup has been Submitted successfully!');
					if($this->session->userdata('role_id')==2)
					{
						redirect(base_url('admin/Itemsgroup/rev_ss_pitemsgroup'));
						//$this->load->view('admin/Itemsgroup/rev_pitemsgroup');
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
	
	public function rev_ae_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==4)
		{
			if($this->input->post('submit'))
			{
				$data['group_rev_ae_id'] = $this->session->userdata('admin_id');
				$data['group_rev_ae_status'] = '2';
				$data['group_rev_ae_date_acc'] = date("Y-m-d H:i:s");
				$data['group_rev_ae_comment'] = $this->input->post('group_rev_ae_comment');
				
				$result = $this->Itemsgroup_model->edit_itemsgroup_rev($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==4)
				{$log_messagetype='rev_ae_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Itemsgroup Updated',
						'log_message' => 'Itemsgroup updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Itemsgroup_model->log_entry($data);
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					if($this->session->userdata('role_id')==4)
					{
						redirect(base_url('admin/Itemsgroup/rev_ae_pitemsgroup'));
						//$this->load->view('admin/Itemsgroup/rev_pitemsgroup');
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
	
	public function rev_psy_submit_for_approval($id=0)
	{
		if($this->session->userdata('role_id')==5)
		{
			if($this->input->post('submit'))
			{
				$data['group_rev_psy_id'] = $this->session->userdata('admin_id');
				$data['group_rev_psy_status'] = '2';
				$data['group_rev_psy_date_acc'] = date("Y-m-d H:i:s");
				$data['group_rev_psy_comment'] = $this->input->post('group_rev_psy_comment');
				
				$result = $this->Itemsgroup_model->edit_itemsgroup_rev($data, $id);
				$log_messagetype='';
				if($this->session->userdata('role_id')==5)
				{$log_messagetype='rev_psy_updated';}
				else
				{$log_messagetype='updated';}
				
				if($result){
					$data = array(
						'log_itemid' => $id,
						'log_admin_id' => $this->session->userdata('admin_id'),
						'log_title' => 'Itemsgroup Updated',
						'log_message' => 'Itemsgroup updated {{log_itemid}} by IW/SS/REV {{log_admin_id}} on {{log_date}}',
						'log_messagetype' =>$log_messagetype,
					);
					$log = $this->Itemsgroup_model->log_entry($data);
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/Itemsgroup/rev_psy_pitemsgroup'));
				}
			}
		}
		else
		{
			die('You are not allowed to do this Action!!!!');
		}
	}
	
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
	
	public function get_paras_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_paras_by_subject($this->input->post('subject_id')));
	}
	
	public function change_status()
	{   
		$this->Itemspara_model->change_status();
	}
	
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsgroup_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsgroup_model->get_iw_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Itemspara_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
	
	public function cstands_by_subject()
	{
		echo json_encode($this->Itemspara_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Itemspara_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
	
	public function all_items_by_subject()
	{
		if($this->session->userdata('role_id')==3)
		{			
			echo json_encode($this->Itemsgroup_model->all_items_by_subject($this->input->post('subject_id'),$this->session->userdata('admin_id')));		
		}
		else
			echo json_encode($this->Itemsgroup_model->all_items_by_subject($this->input->post('subject_id')));		
	}
	
	public function rev_all_items_by_subject()
	{
		if($this->session->userdata('role_id')==2)
		{			
			echo json_encode($this->Itemsgroup_model->rev_all_items_by_subject($this->input->post('subject_id'),$this->session->userdata('admin_id')));		
		}
		else
			echo json_encode($this->Itemsgroup_model->rev_all_items_by_subject($this->input->post('subject_id')));		
	}
	
	public function slos_by_subcstands()
	{
		echo json_encode($this->Itemspara_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
	
	public function delete_image($id = 0)
	{
		$data = array('para_image' => '');
		$this->db->where('para_id', $id);        
		$this->db->update('ci_items_paragraphs', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/itemspara/edit/'.$id));
	}
	
	public function create_itemspara_pdf()
	{
		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_items'] = $this->Itemspara_model->get_itemspara_for_export();
		$this->load->view('admin/itemspara/itemspara_pdf', $data);
	}
	
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
	
	public function psyitems()
	{
		$data['title'] = 'Paragraph List';
		$data['grades'] = $this->Itemspara_model->get_all_grades();
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/Itemspara/psy_itemspara_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function rev_ss_add()
	{
		$id=0;
		if($this->session->userdata('role_id')==2)
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('group_grade_id', 'Grade', 'trim|required');				
				$this->form_validation->set_rules('group_subject_id', 'Subject', 'trim|required');				
				$this->form_validation->set_rules('group_item_1', 'Group Item 1', 'trim|required');
				$this->form_validation->set_rules('group_item_2', 'Group Item 2', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/itemsgroup/rev_ss_add'),'refresh');
				}
				else{
					$ids = 1;
					($this->input->post('group_item_1')!='')?$ids++:$ids;
					($this->input->post('group_item_2')!='')?$ids++:$ids;
					($this->input->post('group_item_3')!='')?$ids++:$ids;
					($this->input->post('group_item_4')!='')?$ids++:$ids;
					($this->input->post('group_item_5')!='')?$ids++:$ids;
					($this->input->post('group_item_6')!='')?$ids++:$ids;
					($this->input->post('group_item_7')!='')?$ids++:$ids;
					($this->input->post('group_item_8')!='')?$ids++:$ids;
					($this->input->post('group_item_9')!='')?$ids++:$ids;
					($this->input->post('group_item_10')!='')?$ids++:$ids;
						
					$data = array(
						'group_title_en' => $this->input->post('group_title_en'),
						'group_title_ur' => $this->input->post('group_title_ur'),
						'group_grade_id' => $this->input->post('group_grade_id'),
						'group_subject_id' => $this->input->post('group_subject_id'),
						'group_item_1' => $this->input->post('group_item_1'),
						'group_item_2' => $this->input->post('group_item_2'),					
						'group_item_3' => $this->input->post('group_item_3'),
						'group_item_4' => $this->input->post('group_item_4'),
						'group_item_5' => $this->input->post('group_item_5'),
						'group_item_6' => $this->input->post('group_item_6'),
						'group_item_7' => $this->input->post('group_item_7'),
						'group_item_8' => $this->input->post('group_item_8'),
						'group_item_9' => $this->input->post('group_item_9'),
						'group_item_10' => $this->input->post('group_item_10'),
						'group_ordering' => $this->input->post('group_ordering'),
						'group_status' => '4',
						'group_createdby' => $this->session->userdata('admin_id'),
						'group_status_ss' => '3',
						'group_comment_ss'=> '2nd Phase',
						'group_approved'=> date('Y-m-d H:i:s'),
						'group_approvedby'=> $this->session->userdata('admin_id'),
						'group_status_ae' => '1',
						'group_comment_ae'=> '2nd Phase',
						'group_reviewed'=> date('Y-m-d H:i:s'),
						'group_exported' => '1'
					);
					
					$result = $this->Itemsgroup_model->add_itemsgroup($data);
					$id=$this->db->insert_id();
					if($result){
						
						
						for($i=1; $i<$ids; $i++)
						{
							$datai = array(
								'log_itemid' => $this->input->post('group_item_'.$i),
								'log_title' => 'Item attached with Itemsgroup created by SS',
								'log_message' => 'Item{{'.$this->input->post('group_item_'.$i).'}} attached with Itemgroup {{'.$id.'}} created by {{log_admin_id}} on {{log_date}}',
								'log_messagetype' =>'created',
								'log_admin_id' => $this->session->userdata('admin_id')
							);
							$logi = $this->Itemsgroup_model->log_entry($datai);
						}
						
						$data_rev = array(
							'group_id' => $id,
							'group_title_en' => $this->input->post('group_title_en'),
							'group_title_ur' => $this->input->post('group_title_ur'),
							'group_grade_id' => $this->input->post('group_grade_id'),
							'group_subject_id' => $this->input->post('group_subject_id'),
							'group_item_1' => $this->input->post('group_item_1'),
							'group_item_2' => $this->input->post('group_item_2'),					
							'group_item_3' => $this->input->post('group_item_3'),
							'group_item_4' => $this->input->post('group_item_4'),
							'group_item_5' => $this->input->post('group_item_5'),
							'group_item_6' => $this->input->post('group_item_6'),
							'group_item_7' => $this->input->post('group_item_7'),
							'group_item_8' => $this->input->post('group_item_8'),
							'group_item_9' => $this->input->post('group_item_9'),
							'group_item_10' => $this->input->post('group_item_10'),
							'group_ordering' => $this->input->post('group_ordering'),
							'group_status' => '4',
							'group_createdby' => $this->session->userdata('admin_id'),
							'group_status_ss' => '3',
							'group_comment_ss'=> '2nd Phase',
							'group_approved'=> date('Y-m-d H:i:s'),
							'group_approvedby'=> $this->session->userdata('admin_id'),
							'group_status_ae' => '1',
							'group_comment_ae'=> '2nd Phase',
							'group_reviewed'=> date('Y-m-d H:i:s'),
							'group_rev_status' => '2',
							'group_rev_revid' => '0',
							'group_rev_date_acc' => date('Y-m-d H:i:s'),
							'group_rev_date_exp' => date('Y-m-d H:i:s'),
							'group_rev_comment' => '2nd Phase'
						);
					//$data_rev = $this->security->xss_clean($data_rev);
					$result = $this->Itemsgroup_model->add_itemsgroup_rev($data_rev);
					$id=$this->db->insert_id();
					//die($this->db->last_query());
					if($result){
						$data = array(
							'log_itemid' => $id,
							'log_title' => 'Rev_Itemsgroup submitted by Item Writer',
							'log_message' => 'Rev_Itemgroup {{log_itemid}} submitted by {{log_admin_id}} on {{log_date}}',
							'log_messagetype' =>'created',
							'log_admin_id' => $this->session->userdata('admin_id')
						);
						$log = $this->Itemsgroup_model->log_entry($data);
						
						$this->session->set_flashdata('success', 'Item Group has been added successfully!');
						redirect(base_url('admin/Itemsgroup/rev_ss_pitemsgroup'));
					}
				}
			}
			}
			else
			{
				$data['title'] = 'Add Item Group';
				$data['grades'] = $this->Itemsgroup_model->get_all_grades();
		
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/Itemsgroup/rev_ss_itemsgroup_add');
				$this->load->view('admin/includes/_footer');
			}	
		}		
		else
		{
			echo 'You are not authorized to add group!';
		}
	}
}
?>