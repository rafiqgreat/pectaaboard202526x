<?php defined('BASEPATH') or exit('No direct script access allowed');
class Midterm extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Midterm_model', 'Midterm_model');
		//$this->load->model('admin/Pilot_Items_model', 'Pilot_Items_model');
		//$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index()
	{
		$data['title'] = 'Midterm Items List';
		$data['grades'] = $this->Midterm_model->get_all_grades();
		//$data['subjects'] = $this->Midterm_model->get_ss_subjects();
		//$data['cstands'] = $this->Midterm_model->get_all_cstands();
		//$data['subcstands'] = $this->Midterm_model->get_all_subcstands();
		//$data['slos'] = $this->Midterm_model->get_all_slos();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/midterm/midterm_mcq_items_list');
		$this->load->view('admin/includes/_footer');
	}

	public function midterm_23()
	{
		$data['title'] = 'Items list of Itemsbank 2023-24';
		$data['grades'] = $this->Midterm_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/midterm/midterm_items_list_ibs202324');
		$this->load->view('admin/includes/_footer');
	}
	public function midterm_24()
	{
		$data['title'] = 'Items list of Itemsbank 2024-25';
		$data['grades'] = $this->Midterm_model->get_all_grades();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/midterm/midterm_items_list_ibs202425');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_items_midterm23()
	{
		$data = array();

		if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Midterm_model->get_all_pilot_items_23($subjectList);
		} else {
			$records['data'] = $data;
			echo json_encode($records);
			$this->session->set_flashdata('errors', 'You are not allowed to view this resource!');
			redirect(base_url('admin'), 'refresh');
		}

		$i = 0;
		foreach ($records['data']  as $row) {
			$editoption = $copy_25 = '';
			if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
				$editoption = '<a title="View" class="view btn btn-sm btn-info" target="_blank" href="' . base_url('admin/pilot_items/pilot_view_combine23/' . $row['item_id']) . '"> <i class="fa fa-eye"></i></a>';
				//$copy_25 = '<a title="Export" class="view btn btn-sm btn-info" href="' . base_url('admin/midterm/copy_23_pilot/' . $row['item_id']) . '"> <i class="fa fa-download"></i></a>';
			} else {
				die('Alert! You are not authorized to do this action');
			}
			
			$options = $optionsa = $optionsb = $optionsc = $optionsd = '';
			if($row['item_type'] == 'MCQ')
			{
				if($row['item_option_a_en'] != '')
					$optionsa = 'a: '.html_entity_decode($row['item_option_a_en']);
				if($row['item_option_b_en'] != '')
					$optionsb = 'b: '.html_entity_decode($row['item_option_b_en']);
				if($row['item_option_c_en'] != '')
					$optionsc = 'c: '.html_entity_decode($row['item_option_c_en']);
				if($row['item_option_c_en'] != '')
					$optionsd = 'd: '.html_entity_decode($row['item_option_d_en']);	
				
				if($row['item_option_a_ur'] != '')
					$optionsa .= '<div class="urdufont-right" style="text-align:right;">a: '.html_entity_decode($row['item_option_a_ur']).'</div>';
				if($row['item_option_b_ur'] != '')
					$optionsb .= '<div class="urdufont-right" style="text-align:right;">b: '.html_entity_decode($row['item_option_b_ur']).'</div>';
				if($row['item_option_c_ur'] != '')
					$optionsc .= '<div class="urdufont-right" style="text-align:right;">c: '.html_entity_decode($row['item_option_c_ur']).'</div>';
				if($row['item_option_d_ur'] != '')
					$optionsd .= '<div class="urdufont-right" style="text-align:right;">d: '.html_entity_decode($row['item_option_d_ur']).'</div>';
				
				$options = $optionsa.$optionsb.$optionsc.$optionsd;
			}
			
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_id'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en']) != "") ? html_entity_decode($row['item_stem_en']) : "",
				'<span class="urdufont-right">' . ((isset($row['item_stem_ur']) && $row['item_stem_ur'] != '') ? html_entity_decode($row['item_stem_ur']) : '') . '</span>',
				$row['grade_code'],
				$row['item_p_value'],
				$options,
				$row['item_option_correct'],
				$editoption . ' ' . $copy_25
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}
	public function datatable_json_items_midterm24()
	{
		$data = array();

		if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Midterm_model->get_all_pilot_items_24($subjectList);
		} else {
			$records['data'] = $data;
			echo json_encode($records);
			$this->session->set_flashdata('errors', 'You are not allowed to view this resource!');
			redirect(base_url('admin'), 'refresh');
		}

		$i = 0;
		foreach ($records['data']  as $row) {
			$editoption = $copy_25 = '';
			if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
				$editoption = '<a title="View" class="view btn btn-sm btn-info" target="_blank" href="' . base_url('admin/pilot_items/pilot_view_combine24/' . $row['item_id']) . '"> <i class="fa fa-eye"></i></a>';
				//$copy_25 = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/midterm/copy_24_pilot/' . $row['item_id']) . '"> <i class="fa fa-download"></i></a>';
			} else {
				die('Alert! You are not authorized to do this action');
			}
			$options = $optionsa = $optionsb = $optionsc = $optionsd = '';
			if($row['item_type'] == 'MCQ')
			{
				if($row['item_option_a_en'] != '')
					$optionsa = 'a: '.html_entity_decode($row['item_option_a_en']);
				if($row['item_option_b_en'] != '')
					$optionsb = 'b: '.html_entity_decode($row['item_option_b_en']);
				if($row['item_option_c_en'] != '')
					$optionsc = 'c: '.html_entity_decode($row['item_option_c_en']);
				if($row['item_option_c_en'] != '')
					$optionsd = 'd: '.html_entity_decode($row['item_option_d_en']);	
				
				if($row['item_option_a_ur'] != '')
					$optionsa .= '<div class="urdufont-right" style="text-align:right;">a: '.html_entity_decode($row['item_option_a_ur']).'</div>';
				if($row['item_option_b_ur'] != '')
					$optionsb .= '<div class="urdufont-right" style="text-align:right;">b: '.html_entity_decode($row['item_option_b_ur']).'</div>';
				if($row['item_option_c_ur'] != '')
					$optionsc .= '<div class="urdufont-right" style="text-align:right;">c: '.html_entity_decode($row['item_option_c_ur']).'</div>';
				if($row['item_option_d_ur'] != '')
					$optionsd .= '<div class="urdufont-right" style="text-align:right;">d: '.html_entity_decode($row['item_option_d_ur']).'</div>';
				
				$options = $optionsa.$optionsb.$optionsc.$optionsd;
			}
			
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_id'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en']) != "") ? html_entity_decode($row['item_stem_en']) : "",
				'<span class="urdufont-right">' . ((isset($row['item_stem_ur']) && $row['item_stem_ur'] != '') ? html_entity_decode($row['item_stem_ur']) : '') . '</span>',
				$row['grade_code'],
				$row['item_p_value'],
				$options,
				$row['item_option_correct'],
				$editoption . ' ' . $copy_25
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}
	
	public function datatable_json_mcq_midterm_search24($grade_id = 0, $subject_id = 0, $cstand_id = 0, $subcstand_id = 0, $slo_id = 0)
	{
		$subjectList = $this->session->userdata('subjects_ids');

		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$draw = $this->input->get('draw');
		$searchValue = $this->input->get('search')['value'];

		$records = $this->Midterm_model->get_all_items_SS_searched24(
			$subjectList,
			$grade_id,
			$subject_id,
			$cstand_id,
			$subcstand_id,
			$slo_id,
			$start,
			$length,
			$searchValue
		);

		$data = [];
		$i = $start + 1;

		foreach ($records['data'] as $row) {
			$editoption = '';
			if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
				$editoption = '<a title="View" class="view btn btn-sm btn-info" target="_blank" href="' . base_url('admin/pilot_items/pilot_view_combine24/' . $row['item_id']) . '"> <i class="fa fa-eye"></i></a>';
				$copy_25 = '<a title="Export" class="view btn btn-sm btn-info" href="' . base_url('admin/midterm/copy_24_pilot/' . $row['item_id']) . '"> <i class="fa fa-download"></i></a>';
			} else {
				die('Alert! You are not authorized to do this action');
			}
			
			$options = $optionsa = $optionsb = $optionsc = $optionsd = '';
			if($row['item_type'] == 'MCQ')
			{
				if($row['item_option_a_en'] != '')
					$optionsa = 'a: '.html_entity_decode($row['item_option_a_en']);
				if($row['item_option_b_en'] != '')
					$optionsb = 'b: '.html_entity_decode($row['item_option_b_en']);
				if($row['item_option_c_en'] != '')
					$optionsc = 'c: '.html_entity_decode($row['item_option_c_en']);
				if($row['item_option_c_en'] != '')
					$optionsd = 'd: '.html_entity_decode($row['item_option_d_en']);	
				
				if($row['item_option_a_ur'] != '')
					$optionsa .= '<div class="urdufont-right" style="text-align:right;">a: '.html_entity_decode($row['item_option_a_ur']).'</div>';
				if($row['item_option_b_ur'] != '')
					$optionsb .= '<div class="urdufont-right" style="text-align:right;">b: '.html_entity_decode($row['item_option_b_ur']).'</div>';
				if($row['item_option_c_ur'] != '')
					$optionsc .= '<div class="urdufont-right" style="text-align:right;">c: '.html_entity_decode($row['item_option_c_ur']).'</div>';
				if($row['item_option_d_ur'] != '')
					$optionsd .= '<div class="urdufont-right" style="text-align:right;">d: '.html_entity_decode($row['item_option_d_ur']).'</div>';
				
				$options = $optionsa.$optionsb.$optionsc.$optionsd;
			}
			
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_id'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en']) != "") ? html_entity_decode($row['item_stem_en']) : "",
				'<span class="urdufont-right">' . ((isset($row['item_stem_ur']) && $row['item_stem_ur'] != '') ? html_entity_decode($row['item_stem_ur']) : '') . '</span>',
				$row['grade_code'],
				$row['item_p_value'],
				$options,
				$row['item_option_correct'],
				$editoption . ' ' . $copy_25
			);
		}

		$output = [
			"draw" => intval($draw),
			"recordsTotal" => $records['recordsTotal'],
			"recordsFiltered" => $records['recordsFiltered'],
			"data" => $data
		];

		echo json_encode($output);
	}



	public function datatable_json_mcq_midterm()
	{
		$data = array();

		if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Midterm_model->get_all_pilot_mcq_items($subjectList);
		} else {
			$records['data'] = $data;
			echo json_encode($records);
			$this->session->set_flashdata('errors', 'You are not allowed to view this resource!');
			redirect(base_url('admin'), 'refresh');
		}

		$i = 0;
		foreach ($records['data']  as $row) {
			$editoption = '';
			if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/midterm/pilot_25_view_combine/' . $row['item_id']) . '"> <i class="fa fa-eye"></i></a>';
				$copy_25 = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/midterm/copy_rev_25_to_pilot/' . $row['item_id']) . '"> <i class="fa fa-clone"></i></a>';
			} else {
				die('Alert! You are not authorized to do this action');
			}
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en']) != "") ? html_entity_decode($row['item_stem_en']) : "",
				'<span class="urdufont-right">' . ((isset($row['item_stem_ur']) && $row['item_stem_ur'] != '') ? html_entity_decode($row['item_stem_ur']) : '') . '</span>',
				$row['grade_code'],
				$row['subject_code'],
				$editoption . ' ' . $copy_25
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function pilot_ss_items_search()
	{
		$data['title'] = 'Midterm Items List';
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Midterm_model->get_all_grades();
		$data['subjects'] = $this->Midterm_model->get_ss_subjects_by_grade($this->input->post('search_grade'), $subjectList);
		$data['cstrands'] = $this->Midterm_model->get_all_cstands($this->input->post('search_subject'));
		$data['subcstrands'] = $this->Midterm_model->get_all_subcstands($this->input->post('search_cstrand'));
		$data['slos'] = $this->Midterm_model->get_all_slos($this->input->post('search_subcstrand'));

		$data['search_grade'] = $this->input->post('search_grade');
		$data['search_subject'] = $this->input->post('search_subject');
		$data['search_cstrand'] = $this->input->post('search_cstrand');
		$data['search_subcstrand'] = $this->input->post('search_subcstrand');
		$data['search_slos'] = $this->input->post('search_slos');

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/midterm/midterm_mcq_items_list', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function pilot_ss_items_search23()
	{
		$data['title'] = 'Midterm Items List';
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Midterm_model->get_all_grades();
		
		$data['subjects'] = $data['cstrands'] = $data['subcstrands'] = $data['slos'] = array();
		
		if($this->input->post('search_grade') != '')
			$data['subjects'] = $this->Midterm_model->get_ss_subjects_by_grade($this->input->post('search_grade'), $subjectList);
		if($this->input->post('search_subject') != '')
			$data['cstrands'] = $this->Midterm_model->get_cstands_by_subject($this->input->post('search_subject'));
		if($this->input->post('search_cstrand') != '')
			$data['subcstrands'] = $this->Midterm_model->get_subcstands_by_cstand($this->input->post('search_cstrand'));
		if($this->input->post('search_subcstrand') != '')
			$data['slos'] = $this->Midterm_model->get_slos_by_subcstands($this->input->post('search_subcstrand'));

		$data['search_grade'] = $this->input->post('search_grade');
		$data['search_subject'] = $this->input->post('search_subject');
		$data['search_cstrand'] = $this->input->post('search_cstrand');
		$data['search_subcstrand'] = $this->input->post('search_subcstrand');
		$data['search_slos'] = $this->input->post('search_slos');

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/midterm/midterm_items_list_ibs202324', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function pilot_ss_items_search24()
	{
		$data['title'] = 'Midterm Items List';
		$subjectList = $this->session->userdata('subjects_ids');
		$data['grades'] = $this->Midterm_model->get_all_grades();
		
		$data['subjects'] = $data['cstrands'] = $data['subcstrands'] = $data['slos'] = array();
		
		if($this->input->post('search_grade') != '')
			$data['subjects'] = $this->Midterm_model->get_ss_subjects_by_grade($this->input->post('search_grade'), $subjectList);
		if($this->input->post('search_subject') != '')
			$data['cstrands'] = $this->Midterm_model->get_cstands_by_subject($this->input->post('search_subject'));
		if($this->input->post('search_cstrand') != '')
			$data['subcstrands'] = $this->Midterm_model->get_subcstands_by_cstand($this->input->post('search_cstrand'));
		if($this->input->post('search_subcstrand') != '')
			$data['slos'] = $this->Midterm_model->get_slos_by_subcstands($this->input->post('search_subcstrand'));

		$data['search_grade'] = $this->input->post('search_grade');
		$data['search_subject'] = $this->input->post('search_subject');
		$data['search_cstrand'] = $this->input->post('search_cstrand');
		$data['search_subcstrand'] = $this->input->post('search_subcstrand');
		$data['search_slos'] = $this->input->post('search_slos');

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/midterm/midterm_items_list_ibs202425', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_mcq_midterm_search23($grade_id = 0, $subject_id = 0, $cstand_id = 0, $subcstand_id = 0, $slo_id = 0)
	{
		$subjectList = $this->session->userdata('subjects_ids');

		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$draw = $this->input->get('draw');
		$searchValue = $this->input->get('search')['value'];

		$records = $this->Midterm_model->get_all_items_SS_searched23(
			$subjectList,
			$grade_id,
			$subject_id,
			$cstand_id,
			$subcstand_id,
			$slo_id,
			$start,
			$length,
			$searchValue
		);

		$data = [];
		$i = $start + 1;

		foreach ($records['data'] as $row) {
			$editoption = '';
			if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1) {
				$editoption = '<a title="View" class="view btn btn-sm btn-info" target="_blank" href="' . base_url('admin/pilot_items/pilot_view_combine23/' . $row['item_id']) . '"> <i class="fa fa-eye"></i></a>';
				$copy_25 = '<a title="Export" class="view btn btn-sm btn-info" href="' . base_url('admin/midterm/copy_23_pilot/' . $row['item_id']) . '"> <i class="fa fa-download"></i></a>';
			} else {
				die('Alert! You are not authorized to do this action');
			}
			
			$options = $optionsa = $optionsb = $optionsc = $optionsd = '';
			if($row['item_type'] == 'MCQ')
			{
				if($row['item_option_a_en'] != '')
					$optionsa = 'a: '.html_entity_decode($row['item_option_a_en']);
				if($row['item_option_b_en'] != '')
					$optionsb = 'b: '.html_entity_decode($row['item_option_b_en']);
				if($row['item_option_c_en'] != '')
					$optionsc = 'c: '.html_entity_decode($row['item_option_c_en']);
				if($row['item_option_c_en'] != '')
					$optionsd = 'd: '.html_entity_decode($row['item_option_d_en']);	
				
				if($row['item_option_a_ur'] != '')
					$optionsa .= '<div class="urdufont-right" style="text-align:right;">a: '.html_entity_decode($row['item_option_a_ur']).'</div>';
				if($row['item_option_b_ur'] != '')
					$optionsb .= '<div class="urdufont-right" style="text-align:right;">b: '.html_entity_decode($row['item_option_b_ur']).'</div>';
				if($row['item_option_c_ur'] != '')
					$optionsc .= '<div class="urdufont-right" style="text-align:right;">c: '.html_entity_decode($row['item_option_c_ur']).'</div>';
				if($row['item_option_d_ur'] != '')
					$optionsd .= '<div class="urdufont-right" style="text-align:right;">d: '.html_entity_decode($row['item_option_d_ur']).'</div>';
				
				$options = $optionsa.$optionsb.$optionsc.$optionsd;
			}
			
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_id'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en']) != "") ? html_entity_decode($row['item_stem_en']) : "",
				'<span class="urdufont-right">' . ((isset($row['item_stem_ur']) && $row['item_stem_ur'] != '') ? html_entity_decode($row['item_stem_ur']) : '') . '</span>',
				$row['grade_code'],
				$row['item_p_value'],
				$options,
				$row['item_option_correct'],
				$editoption . ' ' . $copy_25
			);
		}

		$output = [
			"draw" => intval($draw),
			"recordsTotal" => $records['recordsTotal'],
			"recordsFiltered" => $records['recordsFiltered'],
			"data" => $data
		];

		echo json_encode($output);
	}

	public function subjects_by_grade()
	{
		$subjectList = $this->session->userdata('subjects_ids');
		echo json_encode($this->Midterm_model->get_ss_subjects_by_grade($this->input->post('grade_id'), $subjectList));
	}

	public function cstands_by_subject()
	{
		echo json_encode($this->Midterm_model->get_cstands_by_subject($this->input->post('subject_id')));
	}

	public function subcstands_by_cstand()
	{
		echo json_encode($this->Midterm_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}

	public function slos_by_subcstands()
	{
		echo json_encode($this->Midterm_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}

	public function pilot_25_view_combine($id = 0)
	{
		die('Under Construction');
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Pilot_Items_model->get_all_grades();
		$data['items'] = $this->Pilot_Items_model->get_pilot_item_by_id($id);
		$data['history'] = $this->Items_model->get_item_history($id);
		$data['rev_history'] = $this->Items_model->get_rev_item_history($id);
		$data['logs'] = $this->Items_model->get_item_logs($id);
		$data['items_logs'] = $this->Pilot_Items_model->get_item_logs($id);
		$data['iwinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_submittedby);
		if (isset($data['items'][0]->item_approvedby) && $data['items'][0]->item_approvedby != 0) {
			$data['ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_approvedby);
		}
		if (isset($data['items'][0]->item_reviewedby) && $data['items'][0]->item_reviewedby != 0) {
			$data['aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_reviewedby);
		}
		if (isset($data['items'][0]->item_commentby_psy) && $data['items'][0]->item_commentby_psy != 0) {
			$data['psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_commentby_psy);
		}
		if (isset($data['items'][0]->item_rev_revid) && $data['items'][0]->item_rev_revid != 0) {
			$data['rev_irinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_revid);
		}
		if (isset($data['items'][0]->item_rev_ss_id) && $data['items'][0]->item_rev_ss_id != 0) {
			$data['rev_ssinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_ss_id);
		}
		if (isset($data['items'][0]->item_rev_ae_id) && $data['items'][0]->item_rev_ae_id != 0) {
			$data['rev_aeinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_ae_id);
		}
		if (isset($data['items'][0]->item_rev_psy_id) && $data['items'][0]->item_rev_psy_id != 0) {
			$data['rev_psyinfo'] = $this->Items_model->get_userinfo_by_id($data['items'][0]->item_rev_psy_id);
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/pilot_items_view_combine', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function copy_23_pilot($item_id)
	{
		// permission check (optional)
		if ($this->session->userdata('role_id') != 1 && $this->session->userdata('role_id') != 2) {
			$this->session->set_flashdata('errors', 'You are not authorized to do this action');
			redirect(base_url('admin/midterm'), 'refresh');
		}

		// Load Midterm_model
		$this->load->model('admin/Midterm_model', 'Midterm_model');

		$result = $this->Midterm_model->copy_item_from_23($item_id);

		if ($result) {
			$this->session->set_flashdata('success', 'Item copied successfully from 2023-24 to Pilot table.');
		} else {
			$this->session->set_flashdata('errors', 'Failed to copy item (maybe already exists).');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
	public function copy_24_pilot($item_id)
	{
		// permission check (optional)
		if ($this->session->userdata('role_id') != 1 && $this->session->userdata('role_id') != 2) {
			$this->session->set_flashdata('errors', 'You are not authorized to do this action');
			redirect(base_url('admin/midterm'), 'refresh');
		}

		// Load Midterm_model
		$this->load->model('admin/Midterm_model', 'Midterm_model');

		$result = $this->Midterm_model->copy_item_from_24($item_id);

		if ($result) {
			$this->session->set_flashdata('success', 'Item copied successfully from 2024-25 to Pilot table.');
		} else {
			$this->session->set_flashdata('errors', 'Failed to copy item (maybe already exists).');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
	public function copy_rev_25_to_pilot($id = 0)
	{
		$this->Midterm_model->copy_rev_25_to_pilot($id);
		/*$mcq_dtl=0;
		$erq_dtl=0;
		$reviewed_items_dtl = $this->Pilot_Items_model->get_all_reviewed_items_dtl($id);
		foreach($reviewed_items_dtl as $row)
		{
			if($row['item_type']=='MCQ')
			{
				$data['mcq_dtl']= $this->Pilot_Items_model->copy_rev_to_pilot($id);
				$mcq_dtl++;
			}
			elseif($row['item_type']=='ERQ')
			{
				$data['erq_dtl']= $this->Pilot_Items_model->copy_rev_to_pilot($id);
				$erq_dtl++;
			}
		}
		$data['mcq_dtl']=$mcq_dtl;
		$data['erq_dtl']=$erq_dtl;*/
		$this->load->view('admin/includes/_header', $data);
		$this->session->set_flashdata('success', 'Items Year 2025 has been synchronized successfully!');
		redirect(base_url('admin/Midterm'));
	}

	/////////////////////////////////////////////////	






	public function pilot_item_stats($id)
	{
		$data['title'] = 'Pilot List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/flot');
		$this->load->view('admin/includes/_footer');
	}


	public function mcq_p1()
	{
		$data['title'] = 'Pilot MCQs List (Phase-I)';
		$data['grades'] = $this->Pilot_Items_model->get_search_grade();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/mcq_p1_list');
		$this->load->view('admin/includes/_footer');
	}

	public function erq_p1()
	{
		$data['title'] = 'Pilot ERQs List (Phase-I)';
		$data['grades'] = $this->Pilot_Items_model->get_search_grade();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/erq_p1_list');
		$this->load->view('admin/includes/_footer');
	}

	public function datatable_json_mcq_p1()
	{
		$data = array();
		if ($this->session->userdata('role_id') == 2) {
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Pilot_Items_model->get_all_pilot_mcq_items($subjectList);
		} else {
			$records['data'] = $data;
			echo json_encode($records);
			$this->session->set_flashdata('errors', 'You are not allowed to view this resource!');
			redirect(base_url('admin'), 'refresh');
		}


		$i = 0;

		foreach ($records['data']  as $row) {
			$editoption = '';
			if ($this->session->userdata('role_id') == 2) {
				$editoption = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/pilot_items/pilot_view_combine/' . $row['item_id']) . '"> <i class="fa fa-eye"></i></a>';
			} else {
				die('Alert! You are not authorized to do this action');
			}
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en']) != "") ? html_entity_decode($row['item_stem_en']) : "",
				'<span class="urdufont-right">' . ((isset($row['item_stem_ur']) && $row['item_stem_ur'] != '') ? html_entity_decode($row['item_stem_ur']) : '') . '</span>',
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function datatable_json_erq_p1()
	{
		$data = array();
		if ($this->session->userdata('role_id') == 2) {
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Pilot_Items_model->get_all_pilot_erq_items($subjectList);
		} else {
			$records['data'] = $data;
			echo json_encode($records);
			$this->session->set_flashdata('errors', 'You are not allowed to view this resource!');
			redirect(base_url('admin'), 'refresh');
			//die('Alert! You are not authorized to do this action');	
		}

		$data = array();
		$i = 0;

		foreach ($records['data']  as $row) {
			$editoption = '';
			if ($this->session->userdata('role_id') == 2) {
				$editoption = '<a title="View" class="view btn btn-sm btn-info" style="text-align:center" href="' . base_url('admin/pilot_items/pilot_view_combine/' . $row['item_id']) . '"> <i class="fa fa-eye"></i></a>';
			} else {
				die('Alert! You are not authorized to do this action');
			}
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_code'],
				(html_entity_decode($row['item_stem_en']) != "") ? html_entity_decode($row['item_stem_en']) : "",
				'<span class="urdufont-right">' . ((isset($row['item_stem_ur']) && $row['item_stem_ur'] != '') ? html_entity_decode($row['item_stem_ur']) : '') . '</span>',
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function pilot_ss_view($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Pilot_Items_model->get_all_grades();
		$data['items'] = $this->Pilot_Items_model->get_pilot_item_by_id($id);
		$data['iwinfo'] = $this->Pilot_Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['items_logs'] = $this->Pilot_Items_model->get_item_logs($id);

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/pilot_ss_items_view', $data);
		$this->load->view('admin/includes/_footer');
	}

	public function pilot_ss_view_erq_crq($id = 0)
	{
		$data['title'] = 'View Item Filmzy';
		$data['grades'] = $this->Pilot_Items_model->get_all_grades();
		$data['items'] = $this->Pilot_Items_model->get_pilot_item_by_id($id);
		$data['iwinfo'] = $this->Pilot_Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
		$data['items_logs'] = $this->Pilot_Items_model->get_item_logs($id);

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/pilot_ss_items_view_erq_crq', $data);
		$this->load->view('admin/includes/_footer');
	}









	public function pilot_ss_items_erq_search()
	{
		if ($this->input->post('submit_search')) {
			if ($this->input->post('search_subject') == '' && $this->input->post('search_grade') == '' && $this->input->post('search_cstrand') == '' && $this->input->post('search_subcstrand') == '') {
				redirect(base_url('admin/pilot_items/erq_p1'));
			} else {
				$subjectList = $this->session->userdata('subjects_ids');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['grades'] = $this->Pilot_Items_model->get_all_grades();
				if ($this->input->post('submit_search')) {
					$data['search_subject'] = ($this->input->post('search_subject') != "") ? $this->input->post('search_subject') : 0;
					$data['search_cstrand'] = ($this->input->post('search_cstrand') != "") ? $this->input->post('search_cstrand') : 0;
					$data['search_subcstrand'] = ($this->input->post('search_subcstrand') != "") ? $this->input->post('search_subcstrand') : 0;

					if ($this->input->post('search_subject') != '') {
						$data['subjects'] = $this->Pilot_Items_model->get_ss_subjects_by_grade($this->input->post('search_grade'), $subjectList);
					}
					if ($this->input->post('search_cstrand') != '') {
						$data['cstrands'] = $this->Pilot_Items_model->get_cstands_by_subject($this->input->post('search_subject'));
					}
					if ($this->input->post('search_subcstrand') != '') {
						$data['subcstrands'] = $this->Pilot_Items_model->get_subcstands_by_cstand($this->input->post('search_cstrand'));
					}
				}
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/pilot_items/erq_p1_list', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
	}

	public function datatable_json_erq_p1_search($id = 0)
	{
		$records = [];
		$records = $this->Pilot_Items_model->get_all_items_erq_SS_searched($id);

		$data = array();
		$i = 0;
		foreach ($records['data']  as $row) {
			$editoption = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/pilot_items/pilot_view_combine/' . $row['item_id']) . '" target="_new"> <i class="fa fa-eye"></i></a>';
			$data[] = array(
				++$i,
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en'] != "") ? html_entity_decode($row['item_stem_en']) : "",
				($row['item_stem_ur'] != "") ? html_entity_decode($row['item_stem_ur']) : "",
				$row['grade_code'],
				$row['subject_code'],
				$editoption
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}
	public function pilot_edit_combine($id = 0)
	{
		if ($this->input->post('submit')) {
			$item_type = $this->input->post('item_type');
			if ($item_type == 'ERQ') {
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');
				$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');
				$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', $data['errors']);
					redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
				} else {
					$keyword = 'Ginger';
					$item_stem_en = $this->input->post('item_stem_en');
					$item_stem_ur = $this->input->post('item_stem_ur');
					$item_rubric_english = $this->input->post('item_rubric_english');
					$item_rubric_urdu = $this->input->post('item_rubric_urdu');

					if (
						strpos($item_stem_en, $keyword) !== false ||
						strpos($item_stem_ur, $keyword) !== false ||
						strpos($item_rubric_english, $keyword) !== false ||
						strpos($item_rubric_urdu, $keyword) !== false
					) {
						die('You are not allowed to "Add" items. Please contact to PEC IT Team');
						die('Don Not go further');
					}
					$data = array(
						'item_code' => $this->input->post('item_code'),
						'item_difficulty' => $this->input->post('item_difficulty'),
						'item_discr' => $this->input->post('item_discr'),
						'item_dif_code' => $this->input->post('item_dif_code'),
						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						'item_slo_id' => $this->input->post('item_slo_id'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						'item_pctb_page' => $this->input->post('item_pctb_page'),
						'item_other_title' => $this->input->post('item_other_title'),
						'item_other_year' => $this->input->post('item_other_year'),
						'item_other_page' => $this->input->post('item_other_page'),
						'item_cognitive_bloom' => $this->input->post('item_cognitive_bloom'),
						'item_relation' => $this->input->post('item_relation'),
						'item_stem_number' => $this->input->post('item_stem_number'),
						'item_stem_en' => $this->input->post('item_stem_en'),
						'item_stem_ur' => $this->input->post('item_stem_ur'),
						'item_image_position' => $this->input->post('item_image_position'),
						'item_rubric_english' => $this->input->post('item_rubric_english'),
						'item_rubric_urdu' => $this->input->post('item_rubric_urdu'),
						'item_rubric_image_position' => $this->input->post('item_rubric_image_position'),
						'item_type' => $this->input->post('item_type'),
						'item_registration' => $this->input->post('item_registration'),
						'item_batch' => $this->input->post('item_batch')
					);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path = "assets/img/";
					if (!empty($_FILES['item_image_en']['name'])) {
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_image_en'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path = "assets/img/";
					if (!empty($_FILES['item_image_ur']['name'])) {
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_image_ur'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_rubric_image = $this->input->post('item_rubric_image');
					$path = "assets/img/";
					if (!empty($_FILES['item_rubric_image']['name'])) {
						$result = $this->functions->file_insert($path, 'item_rubric_image', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_rubric_image'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$path = "assets/awardfiles/";
					$config['allowed_types'] = 'xlsx|csv|xls|docx|pdf';
					if (!empty($_FILES['item_awards_file']['name'])) {
						$result = $this->functions->file_insert($path, 'item_awards_file', 'excel', '9097152');
						if ($result['status'] == 1) {
							$data['item_awards_file'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', $result['msg']);
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$result = $this->Pilot_Items_model->pilot_edit_items($data, $id);
					$updated = '';
					$log_message = '';
					$insert_id = '';
					if (($this->session->userdata('role_id') == 2) && $result == 1) {
						$copy_result = $this->Pilot_Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
						$updated = 'pilot_ss_updated';
						$log_message = 'Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					} elseif (($this->session->userdata('role_id') == 4) && $result == 1) {
						$copy_result = $this->Pilot_Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
						$updated = 'pilot_ae_updated';
						$log_message = 'Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					} else {
						$updated = 'pilot_updated';
						$log_message = 'Pilot Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}
					if ($result) {
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id) && $insert_id != 0) ? $insert_id : 0,
							'log_title' => 'Pilot Item Updated',
							'log_message' => $log_message,
							'log_messagetype' => $updated,
						);
						$log = $this->Pilot_Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Pilot Item/Question has been updated successfully!');
						redirect(base_url('admin/Pilot_items/pilot_view_combine/' . $id), 'refresh');
					}
				}
			} elseif ($item_type == 'MCQ') {
				$this->form_validation->set_rules('item_code', 'Item Code', 'trim|required');
				$this->form_validation->set_rules('item_difficulty', 'Difficulty Level', 'trim|required');
				$this->form_validation->set_rules('item_discr', 'Item Discremination', 'trim|required');
				$this->form_validation->set_rules('item_dif_code', 'Diff Code', 'trim|required');
				$this->form_validation->set_rules('item_registration', 'Writer Registration No', 'trim|required');
				$this->form_validation->set_rules('item_date_received', 'Received Date', 'trim|required');
				$this->form_validation->set_rules('item_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('item_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('item_cstand_id', 'Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_subcstand_id', 'Sub Content Stand', 'trim|required');
				$this->form_validation->set_rules('item_slo_id', 'SLO', 'trim|required');
				$this->form_validation->set_rules('item_cognitive_bloom', 'Bloom', 'trim|required');
				$this->form_validation->set_rules('item_curriculum', 'Curriculum', 'trim|required');
				$this->form_validation->set_rules('item_relation', 'Relation', 'trim|required');
				$this->form_validation->set_rules('item_stem_number', 'Stem Number', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('error', $data['errors']);
					redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
				} else {
					$keyword = 'Ginger';
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

					if (
						strpos($item_stem_en, $keyword) !== false ||
						strpos($item_stem_ur, $keyword) !== false ||
						strpos($item_option_a_en, $keyword) !== false ||
						strpos($item_option_a_ur, $keyword) !== false ||
						strpos($item_option_b_en, $keyword) !== false ||
						strpos($item_option_b_ur, $keyword) !== false ||
						strpos($item_option_c_en, $keyword) !== false ||
						strpos($item_option_c_ur, $keyword) !== false ||
						strpos($item_option_d_en, $keyword) !== false ||
						strpos($item_option_d_ur, $keyword) !== false
					) {
						die('You are not allowed to "Add" items. Please contact to PEC IT Team');
					}
					//print_r($this->input->post('item_stem_en'));
					//die();
					$data = array(
						'item_code' => $this->input->post('item_code'),
						'item_difficulty' => $this->input->post('item_difficulty'),
						'item_discr' => $this->input->post('item_discr'),
						'item_dif_code' => $this->input->post('item_dif_code'),
						'item_registration' => $this->input->post('item_registration'),

						'item_grade_id' => $this->input->post('item_grade_id'),
						'item_subject_id' => $this->input->post('item_subject_id'),
						'item_cstand_id' => $this->input->post('item_cstand_id'),
						'item_subcstand_id' => $this->input->post('item_subcstand_id'),
						'item_slo_id' => $this->input->post('item_slo_id'),

						'item_cognitive_bloom' => $this->input->post('item_cognitive_bloom'),
						'item_curriculum' => $this->input->post('item_curriculum'),
						'item_pctb_chapter' => $this->input->post('item_pctb_chapter'),
						'item_pctb_page' => $this->input->post('item_pctb_page'),

						'item_other_title' => $this->input->post('item_other_title'),
						'item_other_year' => $this->input->post('item_other_year'),
						'item_other_page' => $this->input->post('item_other_page'),


						'item_relation' => $this->input->post('item_relation'),
						'item_stem_number' => $this->input->post('item_stem_number'),

						'item_stem_en' => $this->input->post('item_stem_en'),
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
						'item_batch' => $this->input->post('item_batch')
					);
					$data['item_updated'] = date('Y-m-d H:i:s');
					$data['item_updatedby'] = $this->session->userdata('admin_id');
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_a_image = $this->input->post('item_option_a_image');
					$path = "assets/img/";
					if (!empty($_FILES['item_option_a_image']['name'])) {
						$result = $this->functions->file_insert($path, 'item_option_a_image', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_option_a_image'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_b_image = $this->input->post('item_option_b_image');
					$path = "assets/img/";
					if (!empty($_FILES['item_option_b_image']['name'])) {
						$result = $this->functions->file_insert($path, 'item_option_b_image', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_option_b_image'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_c_image = $this->input->post('item_option_c_image');
					$path = "assets/img/";
					if (!empty($_FILES['item_option_c_image']['name'])) {
						$result = $this->functions->file_insert($path, 'item_option_c_image', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_option_c_image'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_option_d_image = $this->input->post('item_option_d_image');
					$path = "assets/img/";
					if (!empty($_FILES['item_option_d_image']['name'])) {
						$result = $this->functions->file_insert($path, 'item_option_d_image', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_option_d_image'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_en = $this->input->post('item_image_en');
					$path = "assets/img/";
					if (!empty($_FILES['item_image_en']['name'])) {
						$result = $this->functions->file_insert($path, 'item_image_en', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_image_en'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$item_image_ur = $this->input->post('item_image_ur');
					$path = "assets/img/";
					if (!empty($_FILES['item_image_ur']['name'])) {
						$result = $this->functions->file_insert($path, 'item_image_ur', 'image', '9097152');
						if ($result['status'] == 1) {
							$data['item_image_ur'] = $path . $result['msg'];
						} else {
							$this->session->set_flashdata('error', 'Image not uploaded');
							redirect(base_url('admin/Pilot_items/pilot_edit_combine/' . $id), 'refresh');
						}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					$result = $this->Pilot_Items_model->pilot_edit_items($data, $id);
					$updated = '';
					$log_message = '';
					$insert_id = '';
					if (($this->session->userdata('role_id') == 2) && $result == 1) {
						$copy_result = $this->Pilot_Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
						$updated = 'pilot_ss_updated';
						$log_message = 'Pilot Item {{log_itemid}} updated by SS {{log_admin_id}} on {{log_date}}';
					} elseif (($this->session->userdata('role_id') == 4) && $result == 1) {
						$copy_result = $this->Pilot_Items_model->copy_item_history($id);
						$insert_id = $this->db->insert_id();
						$updated = 'pilot_ae_updated';
						$log_message = 'Pilot Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					} else {
						$updated = 'pilot_updated';
						$log_message = 'Pilot Item {{log_itemid}} updated by AE {{log_admin_id}} on {{log_date}}';
					}

					if ($result) {
						$data = array(
							'log_itemid' => $id,
							'log_admin_id' => $this->session->userdata('admin_id'),
							'log_itemhis_id' => (isset($insert_id) && $insert_id != 0) ? $insert_id : 0,
							'log_title' => 'Pilot Item Updated',
							'log_message' => $log_message,
							'log_messagetype' => $updated,
						);
						$log = $this->Pilot_Items_model->log_entry($data);
						$this->session->set_flashdata('success', 'Pilot Item/Question has been updated successfully!');
						redirect(base_url('admin/Pilot_items/pilot_view_combine/' . $id), 'refresh');
					}
				}
			}
		} else {
			$data['title'] = 'Edit Item';
			$data['item'] = $this->Pilot_Items_model->get_pilot_item_by_id($id);
			$data['item'] = (array)$data['item'][0];
			$data['grades'] = $this->Pilot_Items_model->get_all_grades();
			$subjectList = $this->session->userdata('subjects_ids');
			$data['subjects'] = $this->Pilot_Items_model->get_ae_subjects_grade($subjectList, $data['item']['item_grade_id']); //this function is functioning for users
			$data['cstands'] = $this->Pilot_Items_model->get_all_cstands_iw($data['item']['item_subject_id']);
			$data['subcstands'] = $this->Pilot_Items_model->get_all_subcstands_iw($data['item']['item_cstand_id']);
			$data['slos'] = $this->Pilot_Items_model->get_all_slos_iw($data['item']['item_subcstand_id']);

			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/pilot_items/pilot_items_edit_combine');
			$this->load->view('admin/includes/_footer');
		}
	}
	public function delete_image_combine($del_option = "")
	{
		$id = 0;
		$data = [];
		$ans = explode('-', $del_option);
		$data[$ans[0]] = '';
		$id = $ans[1];
		$this->db->where('item_id', $id);
		$this->db->update('ci_items_pilot', $data);
		$this->session->set_flashdata('success', 'Image has been deleted successfully!');
		redirect(base_url('admin/pilot_items/pilot_edit_combine/' . $id));
	}



	public function sync_mcq_p1()
	{
		$data['title'] = 'Sync. Pilot MCQs List';
		$data['grades'] = $this->Pilot_Items_model->get_search_grade();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/sync_mcq_p1_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_sync_mcq_p1()
	{
		$records = $this->Pilot_Items_model->get_all_subjects();
		$data = array();
		$i = 0;
		foreach ($records['data']  as $row) {
			$syncoption = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/pilot_items/copy_rev_to_pilot/' . $row['subject_id']) . '"> Synchronize';
			$reviewed_items_mcq = $this->Pilot_Items_model->get_all_reviewed_items_mcq($row['subject_id']);
			$reviewed_items_erq = $this->Pilot_Items_model->get_all_reviewed_items_erq($row['subject_id']);
			$pilot_items_mcq = $this->Pilot_Items_model->get_all_pilot_items_mcq($row['subject_id']);
			$pilot_items_erq = $this->Pilot_Items_model->get_all_pilot_items_erq($row['subject_id']);
			$data[] = array(
				++$i,
				$row['grade_name_en'],
				$row['subject_code'],
				$row['subject_name_en'],
				$reviewed_items_mcq,
				$reviewed_items_erq,
				$pilot_items_mcq,
				$pilot_items_erq,
				$syncoption
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}
	public function copy_rev_to_pilot($id = 0)
	{
		$this->Pilot_Items_model->copy_rev_to_pilot($id);
		/*$mcq_dtl=0;
		$erq_dtl=0;
		$reviewed_items_dtl = $this->Pilot_Items_model->get_all_reviewed_items_dtl($id);
		foreach($reviewed_items_dtl as $row)
		{
			if($row['item_type']=='MCQ')
			{
				$data['mcq_dtl']= $this->Pilot_Items_model->copy_rev_to_pilot($id);
				$mcq_dtl++;
			}
			elseif($row['item_type']=='ERQ')
			{
				$data['erq_dtl']= $this->Pilot_Items_model->copy_rev_to_pilot($id);
				$erq_dtl++;
			}
		}
		$data['mcq_dtl']=$mcq_dtl;
		$data['erq_dtl']=$erq_dtl;*/
		$this->load->view('admin/includes/_header', $data);
		$this->session->set_flashdata('success', 'Items has been synchronized successfully!');
		redirect(base_url('admin/Pilot_items/sync_mcq_p1'));
	}

	public function sync_group()
	{
		$data['title'] = 'Sync. Groups List';
		$data['grades'] = $this->Pilot_Items_model->get_search_grade();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/sync_groups_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_sync_group()
	{
		$records = $this->Pilot_Items_model->get_all_subjects();
		$data = array();
		$i = 0;
		foreach ($records['data']  as $row) {
			$syncoption = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/pilot_items/copy_rev_groups_to_pilot/' . $row['subject_id']) . '"> Synchronize';
			$reviewed_groups = $this->Pilot_Items_model->get_all_reviewed_groups($row['subject_id']);
			$pilot_groups = $this->Pilot_Items_model->get_all_pilot_groups($row['subject_id']);
			$data[] = array(
				++$i,
				$row['grade_name_en'],
				$row['subject_code'],
				$row['subject_name_en'],
				$reviewed_groups,
				$pilot_groups,
				$syncoption
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function copy_rev_groups_to_pilot($id = 0)
	{ //copy_rev_groups_to_pilot
		$this->Pilot_Items_model->copy_rev_groups_to_pilot($id);

		$this->load->view('admin/includes/_header', $data);
		$this->session->set_flashdata('success', 'Groups has been synchronized successfully!');
		redirect(base_url('admin/Pilot_items/sync_group'));
	}

	public function sync_para()
	{
		$data['title'] = 'Sync. Paragraphs List';
		$data['grades'] = $this->Pilot_Items_model->get_search_grade();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilot_items/sync_parahgraph_list');
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_sync_para()
	{
		$records = $this->Pilot_Items_model->get_all_subjects();
		$data = array();
		$i = 0;
		foreach ($records['data']  as $row) {
			$syncoption = '<a title="View" class="view btn btn-sm btn-info" href="' . base_url('admin/pilot_items/copy_rev_para_to_pilot/' . $row['subject_id']) . '"> Synchronize';
			$reviewed_para = $this->Pilot_Items_model->get_all_reviewed_paragraph($row['subject_id']);
			$pilot_para = $this->Pilot_Items_model->get_all_pilot_paragraph($row['subject_id']);
			$data[] = array(
				++$i,
				$row['grade_name_en'],
				$row['subject_code'],
				$row['subject_name_en'],
				$reviewed_para,
				$pilot_para,
				$syncoption
			);
		}
		$records['data'] = $data;
		echo json_encode($records);
	}

	public function copy_rev_para_to_pilot($id = 0)
	{ //copy_rev_groups_to_pilot
		$this->Pilot_Items_model->copy_rev_para_to_pilot($id);

		$this->load->view('admin/includes/_header', $data);
		$this->session->set_flashdata('success', 'Paragraphs has been synchronized successfully!');
		redirect(base_url('admin/Pilot_items/sync_para'));
	}
}
