<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Itemsbank extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Itemsbank_model', 'Itemsbank_model');
		$this->load->model('admin/Pilotpaper_model', 'Pilotpaper_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Itemsbank List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itemsbank_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function itembank_crqs(){
		//die('1232131');
		$data['title'] = 'Itemsbank CRQs List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itemsbank_crqs_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json()
	{
		
		$subjectList = $this->session->userdata('subjects_ids');
		$records = $this->Itemsbank_model->get_all_itemsbank_ss_mcqs($this->session->userdata('admin_id'),$subjectList);
		/*print '<pre>';
		print_r($records);
		die;*/
		$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];
		
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$approveLink = '';
			$editlink = '';
			$dropdownblock = '';
			$mcqs_itembank_final = $this->Itemsbank_model->get_itembank_mcqs_final($row['ibm_subject_id'], 'MCQ');
			$summary = '<a href="'.base_url('admin/pilotpaper/pilot_item_summary2/'.$row['subject_id'].'_1').'" target="_blank">View Items Summary</a></div></div>';		

			if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4){
				if(count($mcqs_itembank_final)>0){
					if($this->session->userdata('role_id') == 1){
					$approveLink = '<br>&nbsp;&nbsp;<a style="margin-top:8px;" title="Approve Itembank" class="btn btn-sm btn-success disabled"  href="#"><i class="fa fa-check"></i> Itembank Approved</a> <a style="margin-top:8px;" title="Approve Itembank" class="btn btn-sm btn-danger"  href="'.base_url('admin/itemsbank/unapprove_mcqs_itembank/'.$row['ibm_subject_id']).'"> Unapprove Itembank</a> <a style="margin-top:8px;" title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemsbank/delete_mcq/" . $row[ 'ibm_subject_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
					}
					else{
						$approveLink = '<br>&nbsp;&nbsp;<a style="margin-top:8px;" title="Approve Itembank" class="btn btn-sm btn-success disabled"  href="#"><i class="fa fa-check"></i> Itembank Approved</a> <a style="margin-top:8px;" title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemsbank/delete_mcq/" . $row[ 'ibm_subject_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
					}
				}else{
					$approveLink = '&nbsp;&nbsp;<a style="margin-top:8px;" title="Approve Itembank" class="btn btn-sm btn-warning"  href="'.base_url('admin/itemsbank/approve_mcqs_itembank/'.$row['ibm_subject_id']).'"> Approve Itembank</a> <a style="margin-top:8px;" title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemsbank/delete_mcq/" . $row[ 'ibm_subject_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
			}
			if(count($mcqs_itembank_final) == 0){
				$editlink = '<br><a style="margin-top:8px;" title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemsbank/edit_mcqs/'.$row['ibm_subject_id']).'"> <i class="fa fa-pencil-square-o"></i> Edit</a>';
			}
			
			if(in_array($row['ibm_subject_id'],$english_subjects)){
				if($this->session->userdata('role_id') == 1)
				{
					$dropdownblock = '<div class="dropdown"><button class="dropbtn">English &darr;</button><div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/1').'" target="_blank"> Single Column</a><a href="'.base_url('admin/itemsbank/view_mcqs_double/'.$row['ibm_subject_id'].'/1').'" target="_blank">Double Column</a><a href="'.base_url('admin/Itemsbank/itemsbank_summary/'.$row['ibm_subject_id']).'" target="_blank">View Items Summary</a></div></div>';
				}
				else
				{
					$dropdownblock = '<div class="dropdown"><button class="dropbtn">English &darr;</button><div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/1').'" target="_blank"> Single Column</a><a href="'.base_url('admin/itemsbank/view_mcqs_double/'.$row['ibm_subject_id'].'/1').'" target="_blank">Double Column</a></div></div>';
				}
			}elseif(in_array($row['ibm_subject_id'],$urdu_subjects)){
				if($this->session->userdata('role_id') == 1)
				{
					$dropdownblock = '<div class="dropdown"><button class="dropbtn">Urdu &darr;</button><div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/2').'" target="_blank">Single Column</a><a href="'.base_url('admin/Itemsbank/itemsbank_summary/'.$row['ibm_subject_id']).'" target="_blank">View Items Summary</a></div></div></div></div>';
				}
				else
				{
					$dropdownblock = '<div class="dropdown"><button class="dropbtn">Urdu &darr;</button><div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/2').'" target="_blank">Single Column</a></div></div></div></div>';
				}
			}else{
				if($this->session->userdata('role_id') == 1)
				{
					$dropdownblock = '<div class="dropdown"><button class="dropbtn">English &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/1').'" target="_blank"> Single Column</a><a href="'.base_url('admin/Itemsbank/itemsbank_summary/'.$row['ibm_subject_id']).'" target="_blank">View Items Summary</a>
									</div>
								</div>
								<div class="dropdown"><button class="dropbtn">Urdu &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/2').'" target="_blank">Single Column</a><a href="'.base_url('admin/Itemsbank/itemsbank_summary/'.$row['ibm_subject_id']).'" target="_blank">View Items Summary</a>
									</div>
								</div>
								<div class="dropdown"><button class="dropbtn">Bilingual &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/3').'" target="_blank">Single Column</a><a href="'.base_url('admin/Itemsbank/itemsbank_summary/'.$row['ibm_subject_id']).'" target="_blank">View Items Summary</a>
									</div>
								</div>';
				}
				else
				{
					$dropdownblock = '<div class="dropdown"><button class="dropbtn">English &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/1').'" target="_blank"> Single Column</a></div>
								</div>
								<div class="dropdown"><button class="dropbtn">Urdu &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/2').'" target="_blank">Single Column</a></div>
								</div>
								<div class="dropdown"><button class="dropbtn">Bilingual &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/itemsbank/view_mcqs/'.$row['ibm_subject_id'].'/3').'" target="_blank">Single Column</a></div>
								</div>';
				}
			}
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ibs_mcq_blocks'],
				($row['ibs_mcq_blocks'] * $row['ibs_mcq_bquestions']),
				$row['username'],
				date_time($row['ibm_created']),
				$dropdownblock.$editlink.$approveLink,
				'<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_mcqs_key/'.$row['ibm_subject_id'].'').'"> Awnser Key</i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
	}
	
	public function datatable_json_crqs()
	{
		
		$subjectList = $this->session->userdata('subjects_ids');
		$records = $this->Itemsbank_model->get_all_itemsbank_ss_crqs($this->session->userdata('admin_id'),$subjectList);
		/*print '<pre>';
		print_r($records);
		die;*/
		$data = array();		
		$i=0;
		$english_subjects 	= [4,8,12,18,25,31,39,47];
		//$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48];
		$tqm_subjects = [65,66,67];
		
		foreach ($records['data']  as $row) 
		{
			$approveLink = '';
			$editlink = '';
			$mcqs_itembank_final = $this->Itemsbank_model->get_itembank_mcqs_final($row['ibc_subject_id'], 'ERQ');		

			if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4){
				if(count($mcqs_itembank_final)>0){
					if($this->session->userdata('role_id') == 1){
						$approveLink = '&nbsp;&nbsp;<a style="margin-top:8px;" title="Approve Itembank" class="btn btn-sm btn-success disabled"  href="#"><i class="fa fa-check"></i> Itembank Approved</a> <a style="margin-top:8px;" title="Unapprove Itembank" class="btn btn-sm btn-danger"  href="'.base_url('admin/itemsbank/unapprove_crqs_itembank/'.$row['ibc_subject_id']).'"> Unapprove Itembank</a> <a style="margin-top:8px;" title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemsbank/delete_crq/" . $row[ 'ibc_subject_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
					}
					else{
						$approveLink = '&nbsp;&nbsp;<a style="margin-top:8px;" title="Approve Itembank" class="btn btn-sm btn-success disabled"  href="#"><i class="fa fa-check"></i> Itembank Approved</a> <a style="margin-top:8px;" title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemsbank/delete_crq/" . $row[ 'ibc_subject_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
					}
				}else{
					$approveLink = '&nbsp;&nbsp;<a style="margin-top:8px;" title="Approve Itembank" class="btn btn-sm btn-warning"  href="'.base_url('admin/itemsbank/approve_crqs_itembank/'.$row['ibc_subject_id']).'"> Approve Itembank</a> <a style="margin-top:8px;" title="Delete" class="delete btn btn-sm btn-danger" href=' . base_url( "admin/itemsbank/delete_crq/" . $row[ 'ibc_subject_id' ] ) . ' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>';
				}
			}
			if(count($mcqs_itembank_final) == 0){
				$editlink = '<br><a style="margin-top:8px;" title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/itemsbank/crqs_edit/'.$row['ibc_subject_id']).'"> <i class="fa fa-pencil-square-o"></i> Edit</a>';
			}
			
			if(in_array($row['ibc_subject_id'],$english_subjects))
			{
				if($this->session->userdata('role_id') == 1)
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_inde/'.$row['ibc_subject_id'].'').'"> English</i></a><a href="'.base_url('admin/Itemsbank/itemsbank_summary_crq/'.$row['ibc_subject_id']).'" target="_blank" class="view btn btn-sm btn-info" style="margin-left:5px">View Items Summary</a>'.$editlink.$approveLink;
				}
				else
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_inde/'.$row['ibc_subject_id'].'').'"> English</i></a>'.$editlink.$approveLink;
				}
				$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ibs_crq_blocks'],
				($row['ibs_crq_blocks'] * $row['ibs_crq_bquestions']),
				$row['username'],
				date_time($row['ibc_created']),
				$action,
				'<a target="_blank" title="" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_indu_key/'.$row['ibc_subject_id'].'').'"> Answers / Rubrics</i></a>'
				);
			}
			elseif(in_array($row['ibc_subject_id'],$tqm_subjects))
			{
				if($this->session->userdata('role_id') == 1)
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/2').'"> Urdu</i></a><a href="'.base_url('admin/Itemsbank/itemsbank_summary_crq/'.$row['ibc_subject_id']).'" target="_blank" class="view btn btn-sm btn-info" style="margin-left:5px">View Items Summary</a>'.$editlink.$approveLink;
				}
				else
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/2').'"> Urdu</i></a>'.$editlink.$approveLink;
				}
				
				$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ibs_crq_blocks'],
				($row['ibs_crq_blocks'] * $row['ibs_crq_bquestions']),
				$row['username'],
				date_time($row['ibc_created']),
				$action,
				'<a target="_blank" title="" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_key/'.$row['ibc_subject_id'].'').'"> Answers / Rubrics</i></a>'
				);
			}
			elseif(in_array($row['ibc_subject_id'],$urdu_subjects))
			{
				if($this->session->userdata('role_id') == 1)
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_indu/'.$row['ibc_subject_id'].'').'"> Urdu</i></a><a href="'.base_url('admin/Itemsbank/itemsbank_summary_crq/'.$row['ibc_subject_id']).'" target="_blank" class="view btn btn-sm btn-info" style="margin-left:5px">View Items Summary</a>'.$editlink.$approveLink;
				}
				else
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_indu/'.$row['ibc_subject_id'].'').'"> Urdu</i></a>'.$editlink.$approveLink;
				}
				$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ibs_crq_blocks'],
				($row['ibs_crq_blocks'] * $row['ibs_crq_bquestions']),
				$row['username'],
				date_time($row['ibc_created']),
				$action,
				'<a target="_blank" title="" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_indu_key/'.$row['ibc_subject_id'].'').'"> Answers / Rubrics</i></a>'
				);
			}
			else
			{
				if($this->session->userdata('role_id') == 1)
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/1').'"> English</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/2').'"> Urdu</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/3').'"> Bilingual</i></a><a href="'.base_url('admin/Itemsbank/itemsbank_summary_crq/'.$row['ibc_subject_id']).'" target="_blank" class="view btn btn-sm btn-info" style="margin-left:5px">View Items Summary</a>'.$editlink.$approveLink;
				}
				else
				{
					$action = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/1').'"> English</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/2').'"> Urdu</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs/'.$row['ibc_subject_id'].'/3').'"> Bilingual</i></a>'.$editlink.$approveLink;
				}
				
				$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ibs_crq_blocks'],
				($row['ibs_crq_blocks'] * $row['ibs_crq_bquestions']),
				$row['username'],
				date_time($row['ibc_created']),
				$action,
				'<a target="_blank" title="" class="view btn btn-sm btn-info" href="'.base_url('admin/itemsbank/view_crqs_key/'.$row['ibc_subject_id'].'').'"> Answers / Rubrics</i></a>'
				);
			}
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
	}
	
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Items_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function add()
	{
		if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 1)
		{
			if($this->input->post('ibm_subject_id'))
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('------------------add------------------');
				$this->form_validation->set_rules('ibm_created', 'Date', 'trim|required');				
				$this->form_validation->set_rules('ibm_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('ibm_subject_id', 'Subject', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/itemsbank/add'),'refresh');
			}
			else{
				$blocks = $this->Itemsbank_model->all_blocks_by_subject($this->input->post('ibm_subject_id'));
				$blocks = $blocks[0];
				/*print '<pre>';
				print_r($blocks);
				die('sadf');*/
				
				for($i = 1; $i <= $blocks->ibs_mcq_blocks - $blocks->ibs_para_question; $i++){
					for($j = 1; $j <= $blocks->ibs_mcq_bquestions; $j++){
						$data = array(
							'ibm_created' => $this->input->post('ibm_created'),
							'ibm_grade_id' => $this->input->post('ibm_grade_id'),
							'ibm_subject_id' =>$this->input->post('ibm_subject_id'),
							'ibm_block_no' => $i,
							'ibm_item_id' =>$this->input->post('ibm_b'.$i.'_item'.$j),
							'ibm_order' => $j,
							'ibm_createdby' => $this->session->userdata('admin_id'),
						);
						$data = $this->security->xss_clean($data);
						$result = $this->Itemsbank_model->add_itemsbank_mcq($data);
						
						
						/*print '<pre>';
						print_r($data);
						if($i==3){
							die('on third');
						}*/
					}
				}
				
				if($blocks->ibs_para_question > 0){
					for($j = 1; $j <= $blocks->ibs_para_question; $j++){
						$data = array(
							'ibm_created' => $this->input->post('ibm_created'),
							'ibm_grade_id' => $this->input->post('ibm_grade_id'),
							'ibm_subject_id' =>$this->input->post('ibm_subject_id'),
							//'ibm_block_no' => $i,
							'ibm_para_id' =>$this->input->post('ibm_p'.$j.'_para'),
							'ibm_order' => $j,
							'ibm_createdby' => $this->session->userdata('admin_id'),
						);
						$data = $this->security->xss_clean($data);
						$result = $this->Itemsbank_model->add_itemsbank_mcq($data);
					}
				}
				
				
				//$data = $this->security->xss_clean($data);
				//$result = $this->Itemsbank_model->add_itemsbank($data);
				//die($this->db->last_query());
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been added successfully!');
					redirect(base_url('admin/itemsbank'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Generate Items Bank';
			$data['grades'] = $this->Itemsbank_model->get_all_grades();
				
			$data['added_subjects'] = $this->Itemsbank_model->get_all_added_subjects();				
			
			
			//echo '<PRE>';
			//print_r($records[0]);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_add');
			$this->load->view('admin/includes/_footer');
		}
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	public function edit_mcqs($id)
	{
		if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4)
		{
			if($this->input->post('ibm_subject_id'))
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('------------------add------------------');
				$this->form_validation->set_rules('ibm_created', 'Date', 'trim|required');				
				$this->form_validation->set_rules('ibm_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('ibm_subject_id', 'Subject', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/itemsbank/edit_mcqs/'.$id),'refresh');
				}
				else{
					$this->db->delete('ci_itemsbank_mcq', array('ibm_subject_id' => $id));
					
					$blocks = $this->Itemsbank_model->all_blocks_by_subject($this->input->post('ibm_subject_id'));
					$blocks = $blocks[0];

					for($i = 1; $i <= $blocks->ibs_mcq_blocks - $blocks->ibs_para_question; $i++){
						for($j = 1; $j <= $blocks->ibs_mcq_bquestions; $j++){
							$data = array(
								'ibm_created' => $this->input->post('ibm_created'),
								'ibm_grade_id' => $this->input->post('ibm_grade_id'),
								'ibm_subject_id' =>$this->input->post('ibm_subject_id'),
								'ibm_block_no' => $i,
								'ibm_item_id' =>$this->input->post('ibm_b'.$i.'_item'.$j),
								'ibm_order' => $j,
								//'ibm_createdby' => $this->session->userdata('admin_id'),
								'ibm_createdby' => $this->input->post('ibm_createdby'),
							);
							$data = $this->security->xss_clean($data);
							$result = $this->Itemsbank_model->add_itemsbank_mcq($data);
						}
					}

					if($blocks->ibs_para_question > 0){
						for($j = 1; $j <= $blocks->ibs_para_question; $j++){
							$data = array(
								'ibm_created' => $this->input->post('ibm_created'),
								'ibm_grade_id' => $this->input->post('ibm_grade_id'),
								'ibm_subject_id' =>$this->input->post('ibm_subject_id'),
								//'ibm_block_no' => $i,
								'ibm_para_id' =>$this->input->post('ibm_p'.$j.'_para'),
								'ibm_order' => $j,
								//'ibm_createdby' => $this->session->userdata('admin_id'),
								'ibm_createdby' => $this->input->post('ibm_createdby'),
							);
							$data = $this->security->xss_clean($data);
							$result = $this->Itemsbank_model->add_itemsbank_mcq($data);
						}
					}

					if($result){
						$this->session->set_flashdata('success', 'ItemsBank has been updated successfully!');
						redirect(base_url('admin/itemsbank'));
					}
				}
			}
			else
			{
				//die('else add');
				$data['title'] = 'Edit Items Bank';
				//$data['grades'] = $this->Itemsbank_model->get_all_grades();
				$data['blocks'] = $this->Itemsbank_model->all_blocks_by_subject($id);
				$data['itembanks'] = $this->Itemsbank_model->get_itemsbank_mcq_by_subjectid($id);
				$data['allmcqs'] = $this->Itemsbank_model->all_items_mcqs_by_subject($id);
				$data['allmcqspara'] = $this->Itemsbank_model->all_paras_mcqs_by_subject($id);
				//echo '<PRE>';
				//print_r($records[0]);
				//die();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/itemsbank/itemsbank_edit_mcqs');
				$this->load->view('admin/includes/_footer');
			}
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function approve_mcqs_itembank($id)
	{
		
		$mcqs_itembank = $this->Itemsbank_model->get_itembank_mcqs($id);
		$itembankinfo = $mcqs_itembank[0];
		if(empty($itembankinfo)){
			$this->session->set_flashdata('error', 'You are not authorized to approve Itembank!');
			redirect(base_url('admin/itemsbank'));	
		}
		
		$mcqs_itembank_final = $this->Itemsbank_model->get_itembank_mcqs_final($id, 'MCQ');
		$approveditembank = $mcqs_itembank_final[0];
		if(!empty($approveditembank)){
			$this->session->set_flashdata('error', 'ItemsBank has been aleardy approved!');
			redirect(base_url('admin/itemsbank'));
		}
		
		if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4)
		{	
			$data = array(
					'ibf_grade_id' => $itembankinfo->ibm_grade_id,
					'ibf_subject_id' => $itembankinfo->ibm_subject_id,
					'ibf_type' => 'MCQ',
					'ibf_createdby' => $itembankinfo->ibm_createdby,
					'ibf_created' => $itembankinfo->ibm_created,
					'ibf_approvedby' => $this->session->userdata('admin_id'),
					'ibf_year' =>  date("Y"),
				);
			
			$data = $this->security->xss_clean($data);
			$result = $this->Itemsbank_model->add_approved_itemsbank_mcq($data);
			if($result){
				$this->Itemsbank_model->get_itembank_mcqs_final_move($itembankinfo->ibm_subject_id);

				$this->session->set_flashdata('success', 'ItemsBank has been approved successfully!');
				redirect(base_url('admin/itemsbank'));
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'You are not authorized to approve Itembank!');
			redirect(base_url('admin/itemsbank'));
		}
	}
	
	public function unapprove_mcqs_itembank($id)
	{
		//die('i am here');
		$mcqs_itembank = $this->Itemsbank_model->get_itembank_mcqs($id);
		$itembankinfo = $mcqs_itembank[0];
		if(empty($itembankinfo)){
			$this->session->set_flashdata('error', 'You are not authorized to approve Itembank!');
			redirect(base_url('admin/itemsbank'));	
		}
		
		if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4)
		{	
		
		//print $itembankinfo->ibm_subject_id; die;
			$this->Itemsbank_model->get_itembank_mcqs_final_move_remove($itembankinfo->ibm_subject_id);

			$this->session->set_flashdata('success', 'ItemsBank has been unapproved successfully!');
			redirect(base_url('admin/itemsbank'));
		}
		else
		{
			$this->session->set_flashdata('error', 'You are not authorized to unapprove Itembank!');
			redirect(base_url('admin/itemsbank'));
		}
	}
	
	public function approve_crqs_itembank($id)
	{
		
		$crqs_itembank = $this->Itemsbank_model->get_itembank_crqs($id);
		$itembankinfo = $crqs_itembank[0];
		if(empty($itembankinfo)){
			$this->session->set_flashdata('error', 'You are not authorized to approve Itembank!');
			redirect(base_url('admin/itemsbank/itembank_crqs'));	
		}
		
		$crqs_itembank_final = $this->Itemsbank_model->get_itembank_final($id, 'ERQ');
		$approveditembank = $crqs_itembank_final[0];
		if(!empty($approveditembank)){
			$this->session->set_flashdata('error', 'ItemsBank has been aleardy approved!');
			redirect(base_url('admin/itemsbank/itembank_crqs'));
		}
		
		if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4)
		{	
			$data = array(
					'ibf_grade_id' => $itembankinfo->ibc_grade_id,
					'ibf_subject_id' => $itembankinfo->ibc_subject_id,
					'ibf_type' => 'ERQ',
					'ibf_createdby' => $itembankinfo->ibc_createdby,
					'ibf_created' => $itembankinfo->ibc_created,
					'ibf_approvedby' => $this->session->userdata('admin_id'),
					'ibf_year' =>  date("Y"),
				);
			
			$data = $this->security->xss_clean($data);
			$result = $this->Itemsbank_model->add_approved_itemsbank_crq($data);
			if($result){
				$this->Itemsbank_model->get_itembank_crqs_final_move($itembankinfo->ibc_subject_id);
				
				$this->session->set_flashdata('success', 'ItemsBank has been approved successfully!');
				redirect(base_url('admin/itemsbank/itembank_crqs'));
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'You are not authorized to approve Itembank!');
			redirect(base_url('admin/itemsbank/itembank_crqs'));
		}
	}
	
	public function unapprove_crqs_itembank($id)
	{
		
		$crqs_itembank = $this->Itemsbank_model->get_itembank_crqs($id);
		$itembankinfo = $crqs_itembank[0];
		if(empty($itembankinfo)){
			$this->session->set_flashdata('error', 'You are not authorized to unapprove Itembank!');
			redirect(base_url('admin/itemsbank/itembank_crqs'));	
		}
		
		$crqs_itembank_final = $this->Itemsbank_model->get_itembank_final($id, 'ERQ');
		$approveditembank = $crqs_itembank_final[0];
				
		if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4)
		{
				$this->Itemsbank_model->get_itembank_crqs_final_move_remove($itembankinfo->ibc_subject_id);
				
				$this->session->set_flashdata('success', 'ItemsBank has been unapproved successfully!');
				redirect(base_url('admin/itemsbank/itembank_crqs'));}
		else
		{
			$this->session->set_flashdata('error', 'You are not authorized to unapprove Itembank!');
			redirect(base_url('admin/itemsbank/itembank_crqs'));
		}
	}
	
	public function crqs_add()
	{
		if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 1)
		{
			if($this->input->post('ibc_subject_id'))
			{
				//echo '<PRE>';
				//print_r($_REQUEST);	
				//die('------------------add------------------');
				$this->form_validation->set_rules('ibc_created', 'Date', 'trim|required');				
				$this->form_validation->set_rules('ibc_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('ibc_subject_id', 'Subject', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/itemsbank/crqs_add'),'refresh');
			}
			else{
				$blocks = $this->Itemsbank_model->all_blocks_by_subject($this->input->post('ibc_subject_id'));
				$blocks = $blocks[0];
				
				//$urdu_english_subjects 	= [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48,65,66,67];
				$urdu_english_subjects 	= [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48];
				
				if(in_array($this->input->post('ibc_subject_id'),$urdu_english_subjects))
				{
					for($i = 1; $i <= $blocks->ibs_crq_blocks; $i++){
						for($j = 1; $j <= $blocks->ibs_crq_bquestions; $j++){
							$data = array(
								'ibc_created' => $this->input->post('ibc_created'),
								'ibc_grade_id' => $this->input->post('ibc_grade_id'),
								'ibc_subject_id' =>$this->input->post('ibc_subject_id'),
								'ibc_block_no' => $i,
								//'ibc_item_id' =>$this->input->post('ibc_b'.$i.'_item'.$j),
								'ibc_item_id' =>$this->input->post('ibc_b'.$i.'_group'.$j),
								'ibc_order' => $j,
								'ibc_createdby' => $this->session->userdata('admin_id'),
							);
							$data = $this->security->xss_clean($data);
							$result = $this->Itemsbank_model->add_itemsbank_crq($data);
						}
					}
				}
				else
				{	
					for($i = 1; $i <= $blocks->ibs_crq_blocks; $i++){
						for($j = 1; $j <= $blocks->ibs_crq_bquestions; $j++){
							$data = array(
								'ibc_created' => $this->input->post('ibc_created'),
								'ibc_grade_id' => $this->input->post('ibc_grade_id'),
								'ibc_subject_id' =>$this->input->post('ibc_subject_id'),
								'ibc_block_no' => $i,
								//'ibc_item_id' =>$this->input->post('ibc_b'.$i.'_item'.$j),
								'ibc_group_id' =>$this->input->post('ibc_b'.$i.'_group'.$j),
								'ibc_order' => $j,
								'ibc_createdby' => $this->session->userdata('admin_id'),
							);
							$data = $this->security->xss_clean($data);
							$result = $this->Itemsbank_model->add_itemsbank_crq($data);
						}
					}
				}
				//$data = $this->security->xss_clean($data);
				//$result = $this->Itemsbank_model->add_itemsbank($data);
				//die($this->db->last_query());
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been added successfully!');
					redirect(base_url('admin/itemsbank/itembank_crqs'));
				}
			}
		}
			else
			{
			//die('else add');
			$data['title'] = 'Generate CRQs Items Bank';
			$data['grades'] = $this->Itemsbank_model->get_all_grades();
				
			$data['added_subjects'] = $this->Itemsbank_model->get_all_crqs_added_subjects();				
			
			
			//echo '<PRE>';
			//print_r($records[0]);
			//die();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_crqs_add');
			$this->load->view('admin/includes/_footer');
		}
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
	
	public function crqs_edit($id)
	{
		if($this->session->userdata('role_id')==2 || $this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 4)
		{
			//$urdu_english_subjects 	= [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48,65,66,67];
			$urdu_english_subjects 	= [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48];
			if($this->input->post('ibc_subject_id'))
			{
				$this->form_validation->set_rules('ibc_created', 'Date', 'trim|required');				
				$this->form_validation->set_rules('ibc_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('ibc_subject_id', 'Subject', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/itemsbank/crqs_edit'.$id),'refresh');
				}
				else{
					$this->db->delete('ci_itemsbank_crq', array('ibc_subject_id' => $id));
					$blocks = $this->Itemsbank_model->all_blocks_by_subject($this->input->post('ibc_subject_id'));
					$blocks = $blocks[0];
				
					if(in_array($this->input->post('ibc_subject_id'),$urdu_english_subjects))
					{
						for($i = 1; $i <= $blocks->ibs_crq_blocks; $i++){
							for($j = 1; $j <= $blocks->ibs_crq_bquestions; $j++){
								$data = array(
									'ibc_created' => $this->input->post('ibc_created'),
									'ibc_grade_id' => $this->input->post('ibc_grade_id'),
									'ibc_subject_id' =>$this->input->post('ibc_subject_id'),
									'ibc_block_no' => $i,
									//'ibc_item_id' =>$this->input->post('ibc_b'.$i.'_item'.$j),
									'ibc_item_id' =>$this->input->post('ibc_b'.$i.'_group'.$j),
									'ibc_order' => $j,
									'ibc_createdby' => $this->session->userdata('admin_id'),
								);
								$data = $this->security->xss_clean($data);
								$result = $this->Itemsbank_model->add_itemsbank_crq($data);
							}
						}
					}
					else
					{	
						for($i = 1; $i <= $blocks->ibs_crq_blocks; $i++){
							for($j = 1; $j <= $blocks->ibs_crq_bquestions; $j++){
								$data = array(
									'ibc_created' => $this->input->post('ibc_created'),
									'ibc_grade_id' => $this->input->post('ibc_grade_id'),
									'ibc_subject_id' =>$this->input->post('ibc_subject_id'),
									'ibc_block_no' => $i,
									//'ibc_item_id' =>$this->input->post('ibc_b'.$i.'_item'.$j),
									'ibc_group_id' =>$this->input->post('ibc_b'.$i.'_group'.$j),
									'ibc_order' => $j,
									'ibc_createdby' => $this->session->userdata('admin_id'),
								);
								$data = $this->security->xss_clean($data);
								$result = $this->Itemsbank_model->add_itemsbank_crq($data);
							}
						}
					}
					if($result){
						$this->session->set_flashdata('success', 'ItemsBank has been updated successfully!');
						redirect(base_url('admin/itemsbank/itembank_crqs'));
					}
				}
			}
			else
			{
				$data['title'] = 'Edit CRQs Itembank';
					
				$data['blocks'] = $this->Itemsbank_model->all_blocks_by_subject($id);
				$data['itembanks'] = $this->Itemsbank_model->get_itemsbank_crq_by_subjectid($id);
				$data['groups'] = $this->Itemsbank_model->all_group_crqs_by_subject($id);
				/*print "<pre>";
				print_r($data['groups']);
				die('1133');*/

				$this->load->view('admin/includes/_header', $data);
				
				if(in_array($id,$urdu_english_subjects))
				{
					$data['crqitems'] = $this->Itemsbank_model->all_items_crqs_by_subject($id);
					/*print "<pre>";
				print_r($data['crqitems']);
				die('1133');*/
					$this->load->view('admin/itemsbank/itemsbank_crqs_eu_edit', $data);
				}
				else
				{
					$this->load->view('admin/itemsbank/itemsbank_crqs_edit');	
				}
				$this->load->view('admin/includes/_footer');
			}
		}		
		else
		{
			echo 'You are not authorized to view this resource!';
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function edit($id = 0)
	{
		if($this->input->post('submit')){
			//echo "Under Development";
			//die();
			$this->form_validation->set_rules('ib_title', 'Title', 'trim|required');				
			$this->form_validation->set_rules('ib_created', 'Date', 'trim|required');				
			$this->form_validation->set_rules('ib_year', 'Year', 'trim|required');				
			$this->form_validation->set_rules('ib_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('ib_subject_id', 'Subject', 'trim|required');
			
			$this->form_validation->set_rules('ib_b1_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b1_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b1_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b1_item4', 'Item Code', 'trim|required');
							
			$this->form_validation->set_rules('ib_b2_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b2_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b2_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b2_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b3_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b3_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b3_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b3_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b4_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b4_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b4_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b4_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b5_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b5_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b5_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b5_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b6_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b6_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b6_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b6_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b7_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b7_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b7_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b7_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b8_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b8_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b8_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b8_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b9_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b9_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b9_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b9_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b10_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b10_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b10_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b10_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b11_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b11_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b11_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b11_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b12_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b12_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b12_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b12_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b13_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b13_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b13_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b13_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b14_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b14_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b14_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b14_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b15_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b15_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b15_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b15_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b16_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b16_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b16_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b16_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b17_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b17_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b17_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b17_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b18_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b18_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b18_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b18_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b19_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b19_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b19_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b19_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b20_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b20_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b20_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b20_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b21_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b21_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b21_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b21_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b22_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b22_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b22_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b22_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b23_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b23_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b23_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b23_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b24_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b24_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b24_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b24_item4', 'Item Code', 'trim|required');
			
			$this->form_validation->set_rules('ib_b25_item1', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b25_item2', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b25_item3', 'Item Code', 'trim|required');
			$this->form_validation->set_rules('ib_b25_item4', 'Item Code', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['itemsbank'] = $this->Itemsbank_model->get_itemsbank_by_id($id);
				$data['view'] = 'admin/itemsbank/itemsbank_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'ib_title' => $this->input->post('ib_title'),
					'ib_created' => $this->input->post('ib_created'),
					'ib_year' => $this->input->post('ib_year'),
					'ib_grade_id' => $this->input->post('ib_grade_id'),
					'ib_subject_id' =>$this->input->post('ib_subject_id'),
					'ib_createdby' => $this->session->userdata('admin_id'),							
					
					'ib_b1_item1' => $this->input->post('ib_b1_item1'),
					'ib_b1_item2' => $this->input->post('ib_b1_item2'),
					'ib_b1_item3' => $this->input->post('ib_b1_item3'),
					'ib_b1_item4' => $this->input->post('ib_b1_item4'),
					
					'ib_b2_item1' => $this->input->post('ib_b2_item1'),
					'ib_b2_item2' => $this->input->post('ib_b2_item2'),
					'ib_b2_item3' => $this->input->post('ib_b2_item3'),
					'ib_b2_item4' => $this->input->post('ib_b2_item4'),
					
					'ib_b3_item1' => $this->input->post('ib_b3_item1'),
					'ib_b3_item2' => $this->input->post('ib_b3_item2'),
					'ib_b3_item3' => $this->input->post('ib_b3_item3'),
					'ib_b3_item4' => $this->input->post('ib_b3_item4'),
					
					'ib_b4_item1' => $this->input->post('ib_b4_item1'),
					'ib_b4_item2' => $this->input->post('ib_b4_item2'),
					'ib_b4_item3' => $this->input->post('ib_b4_item3'),
					'ib_b4_item4' => $this->input->post('ib_b4_item4'),
					
					'ib_b5_item1' => $this->input->post('ib_b5_item1'),
					'ib_b5_item2' => $this->input->post('ib_b5_item2'),
					'ib_b5_item3' => $this->input->post('ib_b5_item3'),
					'ib_b5_item4' => $this->input->post('ib_b5_item4'),
					
					'ib_b6_item1' => $this->input->post('ib_b6_item1'),
					'ib_b6_item2' => $this->input->post('ib_b6_item2'),
					'ib_b6_item3' => $this->input->post('ib_b6_item3'),
					'ib_b6_item4' => $this->input->post('ib_b6_item4'),
					
					'ib_b7_item1' => $this->input->post('ib_b7_item1'),
					'ib_b7_item2' => $this->input->post('ib_b7_item2'),
					'ib_b7_item3' => $this->input->post('ib_b7_item3'),
					'ib_b7_item4' => $this->input->post('ib_b7_item4'),
					
					'ib_b8_item1' => $this->input->post('ib_b8_item1'),
					'ib_b8_item2' => $this->input->post('ib_b8_item2'),
					'ib_b8_item3' => $this->input->post('ib_b8_item3'),
					'ib_b8_item4' => $this->input->post('ib_b8_item4'),
					
					'ib_b9_item1' => $this->input->post('ib_b9_item1'),
					'ib_b9_item2' => $this->input->post('ib_b9_item2'),
					'ib_b9_item3' => $this->input->post('ib_b9_item3'),
					'ib_b9_item4' => $this->input->post('ib_b9_item4'),
					
					'ib_b10_item1' => $this->input->post('ib_b10_item1'),
					'ib_b10_item2' => $this->input->post('ib_b10_item2'),
					'ib_b10_item3' => $this->input->post('ib_b10_item3'),
					'ib_b10_item4' => $this->input->post('ib_b10_item4'),
					
					'ib_b11_item1' => $this->input->post('ib_b11_item1'),
					'ib_b11_item2' => $this->input->post('ib_b11_item2'),
					'ib_b11_item3' => $this->input->post('ib_b11_item3'),
					'ib_b11_item4' => $this->input->post('ib_b11_item4'),
					
					'ib_b12_item1' => $this->input->post('ib_b12_item1'),
					'ib_b12_item2' => $this->input->post('ib_b12_item2'),
					'ib_b12_item3' => $this->input->post('ib_b12_item3'),
					'ib_b12_item4' => $this->input->post('ib_b12_item4'),
					
					'ib_b13_item1' => $this->input->post('ib_b13_item1'),
					'ib_b13_item2' => $this->input->post('ib_b13_item2'),
					'ib_b13_item3' => $this->input->post('ib_b13_item3'),
					'ib_b13_item4' => $this->input->post('ib_b13_item4'),
					
					'ib_b14_item1' => $this->input->post('ib_b14_item1'),
					'ib_b14_item2' => $this->input->post('ib_b14_item2'),
					'ib_b14_item3' => $this->input->post('ib_b14_item3'),
					'ib_b14_item4' => $this->input->post('ib_b14_item4'),
					
					'ib_b15_item1' => $this->input->post('ib_b15_item1'),
					'ib_b15_item2' => $this->input->post('ib_b15_item2'),
					'ib_b15_item3' => $this->input->post('ib_b15_item3'),
					'ib_b15_item4' => $this->input->post('ib_b15_item4'),
					
					'ib_b16_item1' => $this->input->post('ib_b16_item1'),
					'ib_b16_item2' => $this->input->post('ib_b16_item2'),
					'ib_b16_item3' => $this->input->post('ib_b16_item3'),
					'ib_b16_item4' => $this->input->post('ib_b16_item4'),
					
					'ib_b17_item1' => $this->input->post('ib_b17_item1'),
					'ib_b17_item2' => $this->input->post('ib_b17_item2'),
					'ib_b17_item3' => $this->input->post('ib_b17_item3'),
					'ib_b17_item4' => $this->input->post('ib_b17_item4'),
					
					'ib_b18_item1' => $this->input->post('ib_b18_item1'),
					'ib_b18_item2' => $this->input->post('ib_b18_item2'),
					'ib_b18_item3' => $this->input->post('ib_b18_item3'),
					'ib_b18_item4' => $this->input->post('ib_b18_item4'),
					
					'ib_b19_item1' => $this->input->post('ib_b19_item1'),
					'ib_b19_item2' => $this->input->post('ib_b19_item2'),
					'ib_b19_item3' => $this->input->post('ib_b19_item3'),
					'ib_b19_item4' => $this->input->post('ib_b19_item4'),
					
					'ib_b20_item1' => $this->input->post('ib_b20_item1'),
					'ib_b20_item2' => $this->input->post('ib_b20_item2'),
					'ib_b20_item3' => $this->input->post('ib_b20_item3'),
					'ib_b20_item4' => $this->input->post('ib_b20_item4'),
					
					'ib_b21_item1' => $this->input->post('ib_b21_item1'),
					'ib_b21_item2' => $this->input->post('ib_b21_item2'),
					'ib_b21_item3' => $this->input->post('ib_b21_item3'),
					'ib_b21_item4' => $this->input->post('ib_b21_item4'),
					
					'ib_b22_item1' => $this->input->post('ib_b22_item1'),
					'ib_b22_item2' => $this->input->post('ib_b22_item2'),
					'ib_b22_item3' => $this->input->post('ib_b22_item3'),
					'ib_b22_item4' => $this->input->post('ib_b22_item4'),
					
					'ib_b23_item1' => $this->input->post('ib_b23_item1'),
					'ib_b23_item2' => $this->input->post('ib_b23_item2'),
					'ib_b23_item3' => $this->input->post('ib_b23_item3'),
					'ib_b23_item4' => $this->input->post('ib_b23_item4'),
					
					'ib_b24_item1' => $this->input->post('ib_b24_item1'),
					'ib_b24_item2' => $this->input->post('ib_b24_item2'),
					'ib_b24_item3' => $this->input->post('ib_b24_item3'),
					'ib_b24_item4' => $this->input->post('ib_b24_item4'),
					
					'ib_b25_item1' => $this->input->post('ib_b25_item1'),
					'ib_b25_item2' => $this->input->post('ib_b25_item2'),
					'ib_b25_item3' => $this->input->post('ib_b25_item3'),
					'ib_b25_item4' => $this->input->post('ib_b25_item4'),				
				);
				//echo '<hr />';
				//print_r($data);
				//die();
				
				//$data = $this->security->xss_clean($data);
				$result = $this->Itemsbank_model->edit_itemsbank($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been updated successfully!');
					redirect(base_url('admin/itemsbank'));
				}
			}
		}
		else{
			$data['title'] = 'Edit ItemsBank';
			$data['grades'] = $this->Itemsbank_model->get_all_grades();
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Itemsbank_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Itemsbank_model->get_all_subjects();
			}
			$data['cstands'] = $this->Itemsbank_model->get_all_cstands();
			$data['subcstands'] = $this->Itemsbank_model->get_all_subcstands();
			$data['slos'] = $this->Itemsbank_model->get_all_slos();
			$data['itemsbank'] = $this->Itemsbank_model->get_itemsbank_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function change_status()
	{   
		$this->Itemsbank_model->change_status();
	}
	public function change_status_approve()
	{
		$this->Itemsbank_model->change_status_approve();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsbank_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		elseif($this->session->userdata('role_id')==3)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Itemsbank_model->get_ae_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Itemsbank_model->get_subjects_by_grade($this->input->post('grade_id')));	
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function cstands_by_subject()
	{
		echo json_encode($this->Itemsbank_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	public function all_items_by_subject()
	{
		echo json_encode($this->Itemsbank_model->all_items_mcqs_by_subject($this->input->post('subject_id')));		
	}
	public function all_paras_by_subject()
	{
		echo json_encode($this->Itemsbank_model->all_paras_mcqs_by_subject($this->input->post('subject_id')));		
	}
	public function all_crq_items_by_subject()
	{
		echo json_encode($this->Itemsbank_model->all_items_crqs_by_subject($this->input->post('subject_id')));		
	}
	public function all_crq_group_by_subject()
	{
		echo json_encode($this->Itemsbank_model->all_group_crqs_by_subject($this->input->post('subject_id')));		
	}
	public function all_blocks_by_subject()
	{
		echo json_encode($this->Itemsbank_model->all_blocks_by_subject($this->input->post('subject_id')));		
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Itemsbank_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function slos_by_subcstands()
	{
		echo json_encode($this->Itemsbank_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function item_by_slo()
	{
		echo json_encode($this->Itemsbank_model->get_item_by_slo($this->input->post('slo_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function view($id = 0)
	{
			//$data['title'] = 'View Item Filmzy';
			$data['grades'] = $this->Itemsbank_model->get_all_grades();
			$data['itemsbank'] = $this->Itemsbank_model->get_itemsbank_by_id($id);
			
			$data['ib_b1_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item1);
			$data['ib_b1_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item2);
			$data['ib_b1_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item3);
			$data['ib_b1_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b1_item4);
			
			$data['ib_b2_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item1);
			$data['ib_b2_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item2);
			$data['ib_b2_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item3);
			$data['ib_b2_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b2_item4);
			$data['ib_b3_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item1);
			$data['ib_b3_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item2);
			$data['ib_b3_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item3);
			$data['ib_b3_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b3_item4);
			$data['ib_b4_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item1);
			$data['ib_b4_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item2);
			$data['ib_b4_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item3);
			$data['ib_b4_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b4_item4);
			$data['ib_b5_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item1);
			$data['ib_b5_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item2);
			$data['ib_b5_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item3);
			$data['ib_b5_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b5_item4);
			$data['ib_b6_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item1);
			$data['ib_b6_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item2);
			$data['ib_b6_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item3);
			$data['ib_b6_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b6_item4);
			$data['ib_b7_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item1);
			$data['ib_b7_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item2);
			$data['ib_b7_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item3);
			$data['ib_b7_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b7_item4);
			$data['ib_b8_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item1);
			$data['ib_b8_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item2);
			$data['ib_b8_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item3);
			$data['ib_b8_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b8_item4);
			$data['ib_b9_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item1);
			$data['ib_b9_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item2);
			$data['ib_b9_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item3);
			$data['ib_b9_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b9_item4);
			$data['ib_b10_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item1);
			$data['ib_b10_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item2);
			$data['ib_b10_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item3);
			$data['ib_b10_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b10_item4);
			$data['ib_b11_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item1);
			$data['ib_b11_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item2);
			$data['ib_b11_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item3);
			$data['ib_b11_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b11_item4);
			$data['ib_b12_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item1);
			$data['ib_b12_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item2);
			$data['ib_b12_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item3);
			$data['ib_b12_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b12_item4);
			$data['ib_b13_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item1);
			$data['ib_b13_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item2);
			$data['ib_b13_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item3);
			$data['ib_b13_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b13_item4);
			$data['ib_b14_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item1);
			$data['ib_b14_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item2);
			$data['ib_b14_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item3);
			$data['ib_b14_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b14_item4);
			$data['ib_b15_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item1);
			$data['ib_b15_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item2);
			$data['ib_b15_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item3);
			$data['ib_b15_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b15_item4);
			$data['ib_b16_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item1);
			$data['ib_b16_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item2);
			$data['ib_b16_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item3);
			$data['ib_b16_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b16_item4);
			$data['ib_b17_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item1);
			$data['ib_b17_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item2);
			$data['ib_b17_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item3);
			$data['ib_b17_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b17_item4);
			$data['ib_b18_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item1);
			$data['ib_b18_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item2);
			$data['ib_b18_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item3);
			$data['ib_b18_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b18_item4);
			$data['ib_b19_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item1);
			$data['ib_b19_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item2);
			$data['ib_b19_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item3);
			$data['ib_b19_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b19_item4);
			$data['ib_b20_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item1);
			$data['ib_b20_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item2);
			$data['ib_b20_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item3);
			$data['ib_b20_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b20_item4);
			$data['ib_b21_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item1);
			$data['ib_b21_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item2);
			$data['ib_b21_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item3);
			$data['ib_b21_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b21_item4);
			$data['ib_b22_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item1);
			$data['ib_b22_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item2);
			$data['ib_b22_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item3);
			$data['ib_b22_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b22_item4);
			$data['ib_b23_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item1);
			$data['ib_b23_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item2);
			$data['ib_b23_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item3);
			$data['ib_b23_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b23_item4);
			$data['ib_b24_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item1);
			$data['ib_b24_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item2);
			$data['ib_b24_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item3);
			$data['ib_b24_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b24_item4);
			$data['ib_b25_item1'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item1);
			$data['ib_b25_item2'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item2);
			$data['ib_b25_item3'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item3);
			$data['ib_b25_item4'] = $this->Itemsbank_model->get_item_detail_by_id($data['itemsbank'][0]->ib_b25_item4);
			
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/itemsbank/itemsbank_view', $data);
			$this->load->view('admin/includes/_footer');
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function view_mcqs_key(){
		$subjectid = $this->uri->segment(4);
		$viewlanguage = $this->uri->segment(5);
		//die('==');
		$data['title'] = 'Itembank Paper MCQs Awnser Key';
		//$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs($id);
		
		$data['paper_mcqs'] = $this->Itemsbank_model->get_itembank_mcqs($subjectid);
		$data['paper_paras'] = $this->Itemsbank_model->get_itembank_mcqs_paras($subjectid);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itembank_view_mcqs_key');	
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_mcqs(){
		$subjectid = $this->uri->segment(4);
		$viewlanguage = $this->uri->segment(5);
		//die('==');
		$data['title'] = 'Itembank Paper MCQs';
		//$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs($id);
		
		$data['paper_mcqs'] = $this->Itemsbank_model->get_itembank_mcqs($subjectid);
		$data['paper_paras'] = $this->Itemsbank_model->get_itembank_mcqs_paras($subjectid);
		
		$this->load->view('admin/includes/_header', $data);
		if($viewlanguage == 1){
			$this->load->view('admin/itemsbank/itembank_view_mcqs_english');	
		}elseif($viewlanguage == 2){
			$this->load->view('admin/itemsbank/itembank_view_mcqs_urdu');
		}elseif($viewlanguage == 3){
			$this->load->view('admin/itemsbank/itembank_view_mcqs_both');
		}else{
			$this->load->view('admin/itemsbank/itembank_view_mcqs_both');	
		}
		
		$this->load->view('admin/includes/_footer');
	}
	
	public function export_mcqs_english($subjectid, $type, $viewColumn)
	{
		ini_set("pcre.backtrack_limit", "5000000");
		//$type = 'pdf';
		$data['paper_mcqs'] = $this->Itemsbank_model->get_itembank_mcqs($subjectid);
		$data['paper_paras'] = $this->Itemsbank_model->get_itembank_mcqs_paras($subjectid);
		
		if($type == 'pdf'){
			$mpdf = new \Mpdf\Mpdf();
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
			$mpdf->SetTitle("Itembank MCQs English");
			$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
			
			$mpdf->WriteHTML($this->load->view('admin/itemsbank/itembank_pdf_mcqs_english',$data,true));
			//$mpdf->Output(); 
			$filename = 'Itembank_mcqs_english';
			$mpdf->Output($filename . '.pdf', 'D');
		}else{
            header("Content-Description: File Transfer"); 
            header('Content-Type: application/octet-stream');
           // header("Content-Disposition: attachment; filename=$filename"); 
            echo $this->load->view('admin/itemsbank/itembank_pdf_mcqs_english',$data,true);

            header("Content-Disposition: attachment;Filename=Itembank_mcqs_english.doc");
        }
		
	}
	
	public function export_mcqs_urdu($subjectid, $type, $viewlanguage)
	{
		ini_set("pcre.backtrack_limit", "5000000");
		//$type = 'pdf';
		$data['paper_mcqs'] = $this->Itemsbank_model->get_itembank_mcqs($subjectid);
		$data['paper_paras'] = $this->Itemsbank_model->get_itembank_mcqs_paras($subjectid);
		
		//$this->load->view('admin/includes/_header');
		//$this->load->view('admin/itemsbank/itembank_pdf_mcqs_urdu', $data);
		//$this->load->view('admin/includes/_footer');
		
		if($type == 'pdf'){
			$mpdf = new \Mpdf\Mpdf();
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
			$mpdf->SetTitle("Itembank MCQs Urdu");
			$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
			$mpdf->WriteHTML($this->load->view('admin/itemsbank/itembank_pdf_mcqs_urdu',$data,true));
			//$mpdf->Output(); 
			$filename = 'Itembank_mcqs_urdu';
			$mpdf->Output($filename . '.pdf', 'D');
		}else{
            header("Content-Description: File Transfer"); 
            header('Content-Type: application/octet-stream');
           // header("Content-Disposition: attachment; filename=$filename"); 
            echo $this->load->view('admin/itemsbank/itembank_pdf_mcqs_urdu',$data,true);

            header("Content-Disposition: attachment;Filename=Itembank_mcqs_urdu.doc");
        }
		
	}
	
	public function view_mcqs_double(){
		$subjectid = $this->uri->segment(4);
		$viewlanguage = $this->uri->segment(5);
		//die('==');
		$data['title'] = 'Itembank Paper MCQs';
		//$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs($id);
		
		$data['paper_mcqs'] = $this->Itemsbank_model->get_itembank_mcqs($subjectid);
		$data['paper_paras'] = $this->Itemsbank_model->get_itembank_mcqs_paras($subjectid);
		
		$this->load->view('admin/includes/_header', $data);
		if($viewlanguage == 1){
			$this->load->view('admin/itemsbank/itembank_view_mcqs_double_english');	
		}elseif($viewlanguage == 2){
			$this->load->view('admin/itemsbank/itembank_view_mcqs_double_urdu');
		}elseif($viewlanguage == 3){
			$this->load->view('admin/itemsbank/itembank_view_mcqs_double_both');
		}else{
			$this->load->view('admin/itemsbank/itembank_view_mcqs_double_both');	
		}
		
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs(){
		$subjectid = $this->uri->segment(4);
		$viewlanguage = $this->uri->segment(5);
		
		$data['title'] = 'Itembank Paper CRQs';
		
		$data['paper_groups'] = $this->Itemsbank_model->get_itembank_crqs($subjectid);	
		
		$this->load->view('admin/includes/_header', $data);

		if($viewlanguage == 1){
			$this->load->view('admin/itemsbank/itembank_view_crqs_english');	
		}elseif($viewlanguage == 2){
			$this->load->view('admin/itemsbank/itembank_view_crqs_urdu');
		}elseif($viewlanguage == 3){
			$this->load->view('admin/itemsbank/itembank_view_crqs_both');
		}else{
			$this->load->view('admin/itemsbank/itembank_view_crqs_both');	
		}
		
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_key(){
		$subjectid = $this->uri->segment(4);
		$data['title'] = 'Itembank Paper CRQs Answer / Rubrics';
		
		$data['paper_groups'] = $this->Itemsbank_model->get_itembank_crqs_key($subjectid);	
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itembank_view_crqs_key');	
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_inde(){
		$subjectid = $this->uri->segment(4);
		$viewlanguage = $this->uri->segment(5);		
		$data['title'] = 'Itembank Paper CRQs';	
		$data['paper_erqs'] = $this->Itemsbank_model->get_itembank_crqs_ind($subjectid);		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itembank_view_crqs_english_only');	
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_indu(){
		$subjectid = $this->uri->segment(4);
		$viewlanguage = $this->uri->segment(5);
		
		$data['title'] = 'Itembank Paper CRQs';
		$data['paper_erqs'] = $this->Itemsbank_model->get_itembank_crqs_ind($subjectid);		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itembank_view_crqs_urdu_only');
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_indu_key(){
		$subjectid = $this->uri->segment(4);
		
		$data['title'] = 'Itembank Paper CRQs Answer';
		$data['paper_erqs'] = $this->Itemsbank_model->get_itembank_crqs_ind($subjectid);		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/itembank_view_crqs_english_only_key');
		$this->load->view('admin/includes/_footer');
	}
	
	
	public function delete($id = 0)
	{
		if($this->session->userdata('role_id')==1)
		{		
			$this->session->set_flashdata('error', 'You cannot delete Itembank!');
			redirect(base_url('admin/itemsbank'));
		}
		elseif($this->session->userdata('role_id')==2)
		{
			$this->db->delete('ci_itemsbank', array('ib_id' => $id));
			$this->session->set_flashdata('success', 'ItemBank has been deleted successfully!');
			redirect(base_url('admin/itemsbank'));						
		}
		else
		{
			$this->session->set_flashdata('error', 'You cannot delete Itembank!');
			redirect(base_url('admin/itemsbank'));
		}
		
		
	}
	public function delete_mcq($id = 0)
	{
		if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4)
		{
			$this->db->delete('ci_itemsbank_final', array('ibf_subject_id' => $id, 'ibf_type' => 'MCQ'));
			$this->db->delete('ci_itemsbank_mcq', array('ibm_subject_id' => $id));
			$this->session->set_flashdata('success', 'ItemBank has been deleted successfully!');
			redirect(base_url('admin/itemsbank'));						
		}
		else
		{
			$this->session->set_flashdata('error', 'You cannot delete Itembank!');
			redirect(base_url('admin/itemsbank'));
		}
		
		
	}
	
	public function delete_crq($id = 0)
	{
		if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4)
		{
			$this->db->delete('ci_itemsbank_final', array('ibf_subject_id' => $id, 'ibf_type' => 'ERQ'));
			$this->db->delete('ci_itemsbank_crq', array('ibc_subject_id' => $id));
			$this->session->set_flashdata('success', 'ItemBank has been deleted successfully!');
			redirect(base_url('admin/itemsbank/itembank_crqs'));						
		}
		else
		{
			$this->session->set_flashdata('error', 'You cannot delete Itembank!');
			redirect(base_url('admin/itemsbank/itembank_crqs'));
		}
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_items_pdf(){
		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_items'] = $this->Items_model->get_items_for_export();
		$this->load->view('admin/items/items_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_items_csv(){ 
	   // file name 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$grades_data = $this->Items_model->get_items_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("ItemID", "ItemCode", "ItemName(Eng)", "ItemName(Urdu)", "ItemSort", "Grade", "ItemStatus"); 
		fputcsv($file, $header);
		foreach ($grades_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	public function itemsbank_summary($id=0)//subject_id,paper_version_id
	{
		$data['title'] = 'Itemsbank Summary';
        $data['paper'] = $this->Itemsbank_model->itemsbank_sumary($id);
        $data['export'] = 0;
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/rep_itemsbank_sumary');
		$this->load->view('admin/includes/_footer');
	}
	
	public function itemsbank_summary_export($rep_type,$p_subject)
	{
        $data['title'] = 'Itemsbank Summary';
        //$data['p_version'] = $p_version;
        $data['paper'] = $this->Itemsbank_model->itemsbank_sumary($p_subject);
		//$data['p_subject'] = $p_subject;
        //$data['p_phase'] = $p_phase;
        $data['export'] = 1;
        
        $header = '<table style="border:none;">
						<tr>
							<td colspan ="3" style=" text-align:center;padding:20px;"><img src="'.base_url().'/assets/img/pec-image.jpg" width="55" height="65" /></td>
							<td colspan ="11" style="font-size:24px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
                        </tr>
                        <tr>
                            <td colspan ="14" style="text-align:right">
                                <div style="border:1px solid; float:right;width:100%; text-align: right;">Date: '.date('d-m-Y').'</div>
                            </td>
                        </tr>
                        </table>'
                    ;
        $footer = '<p>
                        <span style="width:70%" >Copyright © 2021 pec.edu.pk All rights reserved.</span>
                        <span style="width:30%;text-align: right" colspan="3">Developed By: PEC IT TEAM .</span>
                    </p>';
        $data['rep_type'] =$rep_type;
        $data['title'] = 'Missing Item Summary';
        //$data['res_data'] = $res_data; 
        $data['header'] = $header; 
        
         $filename = 'ItemsbankSummary';
         $html = $this->load->view('admin/itemsbank/rep_itemsbank_sumary_export', $data,true);
		 
        if($rep_type=='PDF'){
            $mpdf = new \Mpdf\Mpdf();
            $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->SetAuthor("PEC IT TEAM");
            $mpdf->SetTitle("Itemsbank Summary");
            $mpdf->watermark_font = 'PEC-IT-TEAM';
            $mpdf->SetHTMLHeader($header);
            $mpdf->SetHTMLFooter($footer);
            $mpdf->AddPage('', // L - landscape, P - portrait 
                                                    '', '', '', '',
                                                    5, // margin_left
                                                    5, // margin right
                                                   40, // margin top
                                                   10, // margin bottom
                                                    0, // margin header
                                                    5); 
            $mpdf->WriteHTML($html);
           
           
            $mpdf->Output($filename . '.pdf', 'D');
            exit();	
        }else if($rep_type == 'CSV'){
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=".$filename.$p_version.".xls"); 
            //header("Content-Disposition: attachment;Filename=document_name.xls");
            //header("Content-Type: application/csv; ");
            header("Content-type: application/vnd.ms-excel");
            echo $html;
            
        }
    }
	
	///////////////////////////////////crq
	
	public function itemsbank_summary_crq($id=0)//subject_id,paper_version_id
	{
		$data['title'] = 'Itemsbank Summary';
        $data['paper'] = $this->Itemsbank_model->itemsbank_sumary_crq($id);
        $data['export'] = 0;
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/itemsbank/rep_itemsbank_sumary_crq');
		$this->load->view('admin/includes/_footer');
	}
	public function itemsbank_summary_export_crq($rep_type,$p_subject)
	{
        $data['title'] = 'Itemsbank Summary';
        //$data['p_version'] = $p_version;
        $data['paper'] = $this->Itemsbank_model->itemsbank_sumary_crq($p_subject);
		//$data['p_subject'] = $p_subject;
        //$data['p_phase'] = $p_phase;
        $data['export'] = 1;
        
        $header = '<table style="border:none;">
						<tr>
							<td colspan ="3" style=" text-align:center;padding:20px;"><img src="'.base_url().'/assets/img/pec-image.jpg" width="55" height="65" /></td>
							<td colspan ="11" style="font-size:24px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
                        </tr>
                        <tr>
                            <td colspan ="14" style="text-align:right">
                                <div style="border:1px solid; float:right;width:100%; text-align: right;">Date: '.date('d-m-Y').'</div>
                            </td>
                        </tr>
                        </table>'
                    ;
        $footer = '<p>
                        <span style="width:70%" >Copyright © 2021 pec.edu.pk All rights reserved.</span>
                        <span style="width:30%;text-align: right" colspan="3">Developed By: PEC IT TEAM .</span>
                    </p>';
        $data['rep_type'] =$rep_type;
        $data['title'] = 'Missing Item Summary';
        //$data['res_data'] = $res_data; 
        $data['header'] = $header; 
        
         $filename = 'ItemsbankSummary';
         $html = $this->load->view('admin/itemsbank/rep_itemsbank_sumary_export_crq', $data,true);
		 
        if($rep_type=='PDF'){
            $mpdf = new \Mpdf\Mpdf();
            $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->SetAuthor("PEC IT TEAM");
            $mpdf->SetTitle("Itemsbank Summary");
            $mpdf->watermark_font = 'PEC-IT-TEAM';
            $mpdf->SetHTMLHeader($header);
            $mpdf->SetHTMLFooter($footer);
            $mpdf->AddPage('', // L - landscape, P - portrait 
                                                    '', '', '', '',
                                                    5, // margin_left
                                                    5, // margin right
                                                   40, // margin top
                                                   10, // margin bottom
                                                    0, // margin header
                                                    5); 
            $mpdf->WriteHTML($html);
           
           
            $mpdf->Output($filename . '.pdf', 'D');
            exit();	
        }else if($rep_type == 'CSV'){
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=".$filename.$p_version.".xls"); 
            header("Content-type: application/vnd.ms-excel");
            echo $html;
            
        }
    }
}
?>