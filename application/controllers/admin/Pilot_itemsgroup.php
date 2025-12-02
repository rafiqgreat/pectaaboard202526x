<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pilot_itemsgroup extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Pilot_Itemsgroup_model', 'Pilot_Itemsgroup_model');
		$this->load->model('admin/Pilot_Items_model', 'Pilot_Items_model');
        $this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	
	public function index()
	{
		$data['title'] = 'Pilot Group List';
		$data['grades'] = $this->Pilot_Itemsgroup_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_itemsgroup/pilot_itemsgroup_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function group_p1()
	{
		$data['title'] = 'Pilot Group List';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('submit_search'))
		{	
            $data['grade_id'] = ( $this->input->post('grade_id') !='' ? $this->input->post('grade_id') : 0);
            $data['subject_id'] = ( $this->input->post('subject_id') != '' ? $this->input->post('subject_id') : 0);
           
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList);
                
            } 
            
        }
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_itemsgroup/pilot_itemsgroup_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_pilot_grouplist($id  = '')
	{	
        $temp = explode('_',$id);
		$grade_id = $temp[0];
		$subject_id = $temp[1];
       // print_r($temp);
        
		if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==1)
		{
			$records = $this->Pilot_Itemsgroup_model->get_all_itemsgroup_pilot($grade_id,$subject_id);
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
			
			if($row['group_rev_status'] == 2)
			{
				$status='Submitted';
			}
			else
			{
				$status='Pending';
			}
			
			if($row['group_rev_status'] == 2)
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="#"> <i class="fa fa-eye"></i></a>';
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilot_itemsgroup/view/'.$row['group_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			else
			{
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="#"> <i class="fa fa-eye"></i></a>';
			}
			$itemids = '';
			if($row['group_item_1'] != 0)
				$itemids = $row['group_item_1'].'<br>';
			if($row['group_item_2'] != 0)
				$itemids .= $row['group_item_2'].'<br>';
			if($row['group_item_3'] != 0)
				$itemids .= $row['group_item_3'].'<br>';
			if($row['group_item_4'] != 0)
				$itemids .= $row['group_item_4'].'<br>';
			if($row['group_item_5'] != 0)
				$itemids .= $row['group_item_5'].'<br>';
			if($row['group_item_6'] != 0)
				$itemids .= $row['group_item_6'].'<br>';
			if($row['group_item_7'] != 0)
				$itemids .= $row['group_item_7'].'<br>';
			if($row['group_item_8'] != 0)
				$itemids .= $row['group_item_8'].'<br>';
			if($row['group_item_9'] != 0)
				$itemids .= $row['group_item_9'].'<br>';
			if($row['group_item_10'] != 0)
				$itemids .= $row['group_item_10'].'<br>';
				
			$data[]= array(
				++$i,
				$row['group_id'],
				$itemids,
				$row['group_title_en'].'-<span class="urdufont-right" style="text-align:right;">'.$row['group_title_ur'].'</span>',
				$row['grade_code'],
				$row['subject_code'],
				$status,
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	
	public function view($id = 0)
	{
		$data['title'] = 'View Group';
		$data['grades'] = $this->Pilot_Itemsgroup_model->get_all_grades();
		$data['group'] = $this->Pilot_Itemsgroup_model->get_group_by_id($id);
		$data['group_item_1'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_1);
		$data['group_item_2'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_2);
		$data['group_item_3'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_3);
		$data['group_item_4'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_4);
		$data['group_item_5'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_5);
		$data['group_item_6'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_6);
		$data['group_item_7'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_7);
		$data['group_item_8'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_8);
		$data['group_item_9'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_9);
		$data['group_item_10'] = $this->Pilot_Itemsgroup_model->get_item_by_id($data['group'][0]->group_item_10);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_itemsgroup/group_view');
		$this->load->view('admin/includes/_footer');
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
				redirect(base_url('admin/pilot_itemsgroup/edit/'.$id));
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
				$result = $this->Pilot_Itemsgroup_model->edit_itemsgroup($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/pilot_itemsgroup'));
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
				redirect(base_url('admin/pilot_itemsgroup/edit/'.$id));
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
				$result = $this->Pilot_Itemsgroup_model->edit_itemsgroup($data, $id);
				
				if($result){
					$this->session->set_flashdata('success', 'Itemsgroup has been updated successfully!');
					redirect(base_url('admin/pilot_itemsgroup/view/'.$id));
				}
			}
		}
		else
        {
			$data['title'] = 'Edit Group';
			$data['group'] = $this->Pilot_Itemsgroup_model->get_group_by_id($id);
			$data['grades'] = $this->Pilot_Itemsgroup_model->get_all_grades();
            if($this->session->userdata('role_id')==3)
            {
                $subjectList = $this->session->userdata('subjects_ids');						
                $data['subjects'] = $this->Pilot_Itemsgroup_model->get_subjects_grade($subjectList,$data['group'][0]->group_grade_id);
            }
            elseif($this->session->userdata('role_id')==2)
            {
                $subjectList = $this->session->userdata('subjects_ids');						
                $data['subjects'] = $this->Pilot_Itemsgroup_model->get_subjects_grade($subjectList,$data['group'][0]->group_grade_id);
            }
            else
            {
                $data['subjects'] = $this->Pilot_Itemsgroup_model->get_all_subjects();
            }
            
			$data['groupitems'] = $this->Pilot_Itemsgroup_model->all_item_by_subject($data['subjects'][0]['subject_id'],$id);
 
 			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/pilot_itemsgroup/itemsgroup_edit', $data);
			$this->load->view('admin/includes/_footer');
			}
	}
	
}
?>