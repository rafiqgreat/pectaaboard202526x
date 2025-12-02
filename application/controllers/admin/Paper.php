<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Paper extends MY_Controller {

	public function __construct(){
		parent::__construct();		
		auth_check(); // check login auth
		$this->load->model('admin/Paper_model', 'Paper_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
		//$this->load->helper('pdf');
		$this->load->helper('prince');
		$this->load->library('user_agent');
	}
	
	public function index(){
		$data['title'] = 'Model Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/model_paper_listing');
		$this->load->view('admin/includes/_footer');
	}
	
	public function model_paper_listing()
	{
		$data['title'] = 'Model Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/model_paper_listing');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_book_model_paper_list()
	{
		$records = $this->Paper_model->get_all_model_papers_listing();
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['subcs_topic_en'].$row['subcs_topic_ur'],
				$row['mp_noofmcq'],
				$row['mp_noofshortquestions'],
				$row['mp_nooflongquestions'],
				'<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/paper/model_paper_view/'.$row['mp_id']).'"><i class="fa fa-eye"></i> without SLO Statement & Key</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/paper/model_paper_view/'.$row['mp_id']).'/1"><i class="fa fa-eye"></i> with SLO Statement</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/paper/model_paper_view/'.$row['mp_id']).'/0/1"><i class="fa fa-eye"></i> with Key</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/paper/model_paper_view/'.$row['mp_id']).'/1/1"><i class="fa fa-eye"></i> with SLO Statement & Key</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/paper/model_paper_key/'.$row['mp_id']).'"><i class="fa fa-eye"></i> Answer Key</a><br>
				
				<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/paper/model_paper_view_pdf/'.$row['mp_id']).'"><i class="fa fa-file-pdf-o"></i> without SLO Statement & Key</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/paper/model_paper_view_pdf/'.$row['mp_id']).'/1"><i class="fa fa-file-pdf-o"></i> with SLO Statement</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/paper/model_paper_view_pdf/'.$row['mp_id']).'/0/1"><i class="fa fa-file-pdf-o"></i> with Key</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/paper/model_paper_view_pdf/'.$row['mp_id']).'/1/1"><i class="fa fa-file-pdf-o"></i> with SLO Statement & Key</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/paper/model_paper_key_pdf/'.$row['mp_id']).'"><i class="fa fa-file-pdf-o"></i> Answer Key</a>
				
				<a title="Delete" class="delete btn btn-sm btn-danger marginfive" href='.base_url("admin/paper/delete_model_paper/".$row['mp_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function model_paper_view($mp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Paper_model->get_model_paper($mp_id);
		$data['items'] = $this->Paper_model->get_model_paper_question_detail($mp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$data['title'] = 'Model Paper Preview';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/model_paper_view');
		$this->load->view('admin/includes/_footer');	
	}
	
	public function model_paper_view_pdf($mp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Paper_model->get_model_paper($mp_id);
		$data['items'] = $this->Paper_model->get_model_paper_question_detail($mp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$pdfname = 'model_paper_'.$mp_id.'_' . time() . '.pdf';
	
		 $options = [
			  // HEADER
			  'header-left'   => 'QAT', // Subject name on left
			  'header-center' => 'Page [page] of [pages]',            // Page number in center
			  'header-right'  => 'PEC Assessment',                    // Company name on right
	
			  // FOOTER
			  'footer-left'   => '[date] [time]',                     // Date/time left
			  'footer-center' => 'Confidential Document',             // Fixed note in center
			  'footer-right'  => 'www.pec.edu.pk',                    // Website right
	
			  // Margins
			  'margin-top'    => '25mm',
			  'margin-bottom' => '20mm'
		 ];
	
		 generate_pdf($this, 'admin/paper/model_paper_view_pdf', $data, $pdfname, $options);
	}
	
	public function model_paper_key($mp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Paper_model->get_model_paper($mp_id);
		$data['items'] = $this->Paper_model->get_model_paper_question_detail($mp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$data['title'] = 'Model Paper Preview';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/model_paper_key');
		$this->load->view('admin/includes/_footer');	
	}
	
	public function model_paper_key_pdf($mp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Paper_model->get_model_paper($mp_id);
		$data['items'] = $this->Paper_model->get_model_paper_question_detail($mp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$pdfname = 'model_paper_'.$mp_id.'_' . time() . '.pdf';
	
		 $options = [
			  // HEADER
			  'header-left'   => 'QAT', // Subject name on left
			  'header-center' => 'Page [page] of [pages]',            // Page number in center
			  'header-right'  => 'PEC Assessment',                    // Company name on right
	
			  // FOOTER
			  'footer-left'   => '[date] [time]',                     // Date/time left
			  'footer-center' => 'Confidential Document',             // Fixed note in center
			  'footer-right'  => 'www.pec.edu.pk',                    // Website right
	
			  // Margins
			  'margin-top'    => '25mm',
			  'margin-bottom' => '20mm'
		 ];
	
		 generate_pdf($this, 'admin/paper/model_paper_key_pdf', $data, $pdfname, $options);
	}
	
	public function delete_model_paper($id = 0)
	{
		$this->db->delete('ci_model_paper', array('mp_id' => $id));
		$this->db->delete('ci_model_paper_detail', array('mpd_mp_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper'));
	}
	
	public function delete_model_paper_question($mp_id, $item_id)
	{
		$this->db->delete('ci_model_paper_detail', array('mpd_mp_id' => $mp_id,'mpd_item_id' => $item_id));
		$this->session->set_flashdata('success', 'Paper question has been deleted successfully!');
		redirect($this->agent->referrer());
	}
	
	public function subjects_by_grade()
	{
		echo json_encode($this->Paper_model->get_subjects_by_grade($this->input->post('grade_id')));	
	}
	
	public function cstand_by_subjects()
	{
		echo json_encode($this->Paper_model->get_cstand_by_subjects($this->input->post('subject_id')));	
	}
	
	public function slo_by_cstand()
	{
		echo json_encode($this->Paper_model->get_slo_by_cstand($this->input->post('subject_id')));	
	}
	
	public function subcstand_by_subjects()
	{
		echo json_encode($this->Paper_model->get_subcstand_by_subjects($this->input->post('subject_id')));	
	}
	
	public function slo_by_subcstand()
	{
		echo json_encode($this->Paper_model->get_slo_by_subcstand($this->input->post('mp_subcstand_id')));	
	}
	
	public function add_model_paper()
	{
		if ($this->input->post('submit')) 
		{
			$this->form_validation->set_rules('mp_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('mp_subject_id', 'Subject', 'trim|required');
			//$this->form_validation->set_rules('mp_subcstand_id', 'Chapter', 'trim|required');
			$this->form_validation->set_rules('mp_noofmcq', 'No. of MCQs', 'trim|required');	
			$this->form_validation->set_rules('mp_noofshortquestions', 'No. of Short Questions', 'trim|required');
			$this->form_validation->set_rules('mp_nooflongquestions', 'No. of Long Questions', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) 
			{
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/add_model_paper'), 'refresh');
			} 
			else 
			{
				$mp_grade_id = $this->input->post('mp_grade_id');
				$mp_subject_id = $this->input->post('mp_subject_id');
				
				$mp_subcstand_id = $this->input->post('mp_subcstand_id');
				$mp_subcstand_ids = 0;
				if(!empty($mp_subcstand_id)){
					$mp_subcstand_ids = implode(', ',$mp_subcstand_id);
				}
				
				$mp_slo_id = $this->input->post('mp_slo_id');
				$mp_slo_ids = 0;
				if(!empty($mp_slo_id)){
					$mp_slo_ids = implode(', ',$mp_slo_id);
				}
	
				$insert_data = array(
					'mp_grade_id' => $mp_grade_id,
					'mp_subject_id' => $mp_subject_id,
					'mp_subcstand_id' => $mp_subcstand_ids,
					'mp_slo_id' => $mp_slo_ids,
					'mp_noofmcq' => $this->input->post('mp_noofmcq'),					
					'mp_noofshortquestions' => $this->input->post('mp_noofshortquestions'),
					'mp_nooflongquestions' => $this->input->post('mp_nooflongquestions')
				);
	
				$mp_id = $this->Paper_model->insert_model_paper($insert_data);
	
				if ($mp_id) 
				{		
					$mcqsQuestions  = $this->Paper_model->get_items($mp_grade_id, $mp_subject_id, $mp_subcstand_ids, $this->input->post('mp_noofmcq'), $mp_slo_ids, 'mcq');
					$shortQuestions = $this->Paper_model->get_items($mp_grade_id, $mp_subject_id, $mp_subcstand_ids,$this->input->post('mp_noofshortquestions'), $mp_slo_ids, 'short');
					$longQuestions  = $this->Paper_model->get_items($mp_grade_id, $mp_subject_id, $mp_subcstand_ids,$this->input->post('mp_nooflongquestions'), $mp_slo_ids, 'long');
					//print_r($mcqsQuestions);print '<br>';print_r($shortQuestions);print '<br>';print_r($longQuestions);die;			
					
					$this->Paper_model->save_model_paper_details($mp_id, $mcqsQuestions, $shortQuestions, $longQuestions);

					$this->session->set_flashdata('success', 'Model Paper Generated Successfully.');
					redirect(base_url('admin/paper/model_paper_listing'), 'refresh');
					
				} 
				else 
				{
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/add_model_paper'), 'refresh');
				}
			}
		} 
		else 
		{
			$data['title'] = 'Generate Model Paper';
			$data['grades'] = $this->Paper_model->get_all_grades();
			$data['subjects'] = $this->Paper_model->get_all_subjects();
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_model_paper');
			$this->load->view('admin/includes/_footer');
		}
	}	
	
	/*public function add_model_paper()
	{
		 if ($this->input->post('submit')) 
		 {
			  $this->form_validation->set_rules('mp_grade_id', 'Grade', 'trim|required');
			  $this->form_validation->set_rules('mp_subject_id', 'Subject', 'trim|required');
			  $this->form_validation->set_rules('mp_noofmcq', 'No. of MCQs', 'trim|required'); 
			  $this->form_validation->set_rules('mp_mcq_mark_per_question', 'Marks per MCQs', 'trim|required');
			  $this->form_validation->set_rules('mp_mcq_total_marks', 'MCQs Total Marks', 'trim|required');
			  $this->form_validation->set_rules('mp_mcq_heading', 'MCQs Heading', 'trim|required');
			  
			  $this->form_validation->set_rules('mp_noofshortquestions', 'No. of Short Questions', 'trim|required');
			  $this->form_validation->set_rules('mp_sq_mark_per_question', 'Marks per Short Question', 'trim|required');
			  $this->form_validation->set_rules('mp_sq_total_marks', 'Short Question Total Marks', 'trim|required');
			  $this->form_validation->set_rules('mp_sq_heading', 'MCQs Heading', 'trim|required');
			  
			  $this->form_validation->set_rules('mp_nooflongquestions', 'No. of Long Questions', 'trim|required');
			  $this->form_validation->set_rules('mp_lq_mark_per_question', 'Marks per Long Question', 'trim|required');
			  $this->form_validation->set_rules('mp_lq_total_marks', 'Long Questions Total Marks', 'trim|required');
			  $this->form_validation->set_rules('mp_lq_heading', 'Long Questions Heading', 'trim|required');
			  
			  if ($this->form_validation->run() == FALSE) 
			  {
					$this->session->set_flashdata('errors', validation_errors());
					redirect(base_url('admin/paper/add_model_paper'), 'refresh');
			  } 
			  else 
			  {
					$mp_grade_id   = $this->input->post('mp_grade_id');
					$mp_subject_id = $this->input->post('mp_subject_id');
					$mp_subcstand_id = $this->input->post('mp_subcstand_id');
					$mp_slo_id     = $this->input->post('mp_slo_id');
	
					$mp_slo_ids = 0;
					if (!empty($mp_slo_id)) {
						 $mp_slo_ids = implode(',', $mp_slo_id);
					}
	
					// Insert model paper main record
					$insert_data = array(
						 'mp_grade_id'            	=> $mp_grade_id,
						 'mp_subject_id'          	=> $mp_subject_id,
						 'mp_subcstand_id'        	=> $mp_subcstand_id,
						 'mp_slo_id'              	=> $mp_slo_ids,
						 'mp_noofmcq'             	=> $this->input->post('mp_noofmcq'),
						 'mp_mcq_mark_per_question'=> $this->input->post('mp_mcq_mark_per_question'),
						 'mp_mcq_total_marks'      => $this->input->post('mp_mcq_total_marks'),
						 'mp_mcq_heading'          => $this->input->post('mp_mcq_heading'), 
						                 
						 'mp_noofshortquestions'  	=> $this->input->post('mp_noofshortquestions'),
						 'mp_sq_mark_per_question' => $this->input->post('mp_sq_mark_per_question'),
						 'mp_sq_total_marks'       => $this->input->post('mp_sq_total_marks'),
						 'mp_sq_heading'           => $this->input->post('mp_sq_heading'),
						 
						 'mp_nooflongquestions'   	=> $this->input->post('mp_nooflongquestions'),
						 'mp_lq_mark_per_question' => $this->input->post('mp_lq_mark_per_question'),
						 'mp_lq_total_marks'       => $this->input->post('mp_lq_total_marks'),
						 'mp_lq_heading'           => $this->input->post('mp_lq_heading'),
					);
	
					$mp_id = $this->Paper_model->insert_model_paper($insert_data);
	
					if ($mp_id) 
					{
						 // Decide which chapters to use
						 if (empty($mp_subcstand_id) || $mp_subcstand_id == 0) {
							  $chapters = $this->Paper_model->get_all_item_subcstands($mp_grade_id, $mp_subject_id, $mp_slo_ids);
						 } else {
							  $chapters = [$mp_subcstand_id];
						 }
	
						 $mcqsQuestions  = [];
						 $shortQuestions = [];
						 $longQuestions  = [];
	
						 foreach ($chapters as $chapter_id) {
							  $mcqs  = $this->Paper_model->get_items(
									$mp_grade_id,
									$mp_subject_id,
									$chapter_id,
									$this->input->post('mp_noofmcq'),
									$mp_slo_ids,
									'mcq'
							  );
	
							  $short = $this->Paper_model->get_items(
									$mp_grade_id,
									$mp_subject_id,
									$chapter_id,
									$this->input->post('mp_noofshortquestions'),
									$mp_slo_ids,
									'short'
							  );
	
							  $long  = $this->Paper_model->get_items(
									$mp_grade_id,
									$mp_subject_id,
									$chapter_id,
									$this->input->post('mp_nooflongquestions'),
									$mp_slo_ids,
									'long'
							  );
	
							  $mcqsQuestions  = array_merge($mcqsQuestions, $mcqs);
							  $shortQuestions = array_merge($shortQuestions, $short);
							  $longQuestions  = array_merge($longQuestions, $long);
						 }
	
						 // Save details (with mpd_subcstand_id)
						 $this->Paper_model->save_model_paper_details($mp_id, $mcqsQuestions, $shortQuestions, $longQuestions);
	
						 $this->session->set_flashdata('success', 'Model Paper Generated Successfully.');
						 redirect(base_url('admin/paper/model_paper_listing'), 'refresh');
					} 
					else 
					{
						 $this->session->set_flashdata('errors', 'Error inserting paper data.');
						 redirect(base_url('admin/paper/add_model_paper'), 'refresh');
					}
			  }
		 } 
		 else 
		 {
			  $data['title']    = 'Generate Model Paper';
			  $data['grades']   = $this->Paper_model->get_all_grades();
			  $data['subjects'] = $this->Paper_model->get_all_subjects();
			  $this->load->view('admin/includes/_header', $data);
			  $this->load->view('admin/paper/add_model_paper');
			  $this->load->view('admin/includes/_footer');
		 }
	}*/

	
	public function paper_crqs(){
		$data['title'] = 'CRQs Paper List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/paper_crqs_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){
		$records = $this->Paper_model->get_all_final_paper_itemsbank_mcqs();
		/*print '<pre>';
		print_r($records);
		die;*/
		$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			if(in_array($row['fp_subject_id'],$english_subjects)){
				$dropdownblock = '<div class="dropdown"><button class="dropbtn">English &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/paper/view_mcqs/'.$row['fp_id'].'/1').'" target="_blank"> Single Column</a><a href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/1').'" target="_blank">Double Column</a>
									</div>
								</div>';
			}elseif(in_array($row['fp_subject_id'],$urdu_subjects)){
				$dropdownblock = '<div class="dropdown"><button class="dropbtn">Urdu &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/paper/view_mcqs/'.$row['fp_id'].'/2').'" target="_blank">Single Column</a><a href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/2').'" target="_blank">Double Column</a>
									</div>
								</div>';
			}else{
				$dropdownblock = '<div class="dropdown"><button class="dropbtn">English &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/paper/view_mcqs/'.$row['fp_id'].'/1').'" target="_blank"> Single Column</a><a href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/1').'" target="_blank">Double Column</a>
									</div>
								</div>
								<div class="dropdown"><button class="dropbtn">Urdu &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/paper/view_mcqs/'.$row['fp_id'].'/2').'" target="_blank">Single Column</a><a href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/2').'" target="_blank">Double Column</a>
									</div>
								</div>
								<div class="dropdown"><button class="dropbtn">Bilingual &darr;</button>
									<div class="dropdown-content"><a href="'.base_url('admin/paper/view_mcqs/'.$row['fp_id'].'/3').'" target="_blank">Single Column</a><a href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/3').'" target="_blank">Double Column</a>
									</div>
								</div>';
			}
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['fp_section'],
				$row['fp_paper_number'],
				date_time($row['fp_createddt']),
				$dropdownblock
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function datatable_json_crqs(){
		$records = $this->Paper_model->get_all_final_paper_itemsbank_crqs();
		/*print '<pre>';
		print_r($records);
		die;*/
		$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			if(in_array($row['fpc_subject_id'],$english_subjects)){
				$dropdownblock = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/1').'"> English</i></a>';
			}elseif(in_array($row['fpc_subject_id'],$urdu_subjects)){
				$dropdownblock = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/2').'"> Urdu</i></a>';
			}else{
				$dropdownblock = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/1').'"> English</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/2').'"> Urdu</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/3').'"> Bilingual</i></a>';
			}
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['fpc_section'],
				$row['fpc_paper_number'],
				date_time($row['fpc_createddt']),
				$dropdownblock
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function view_mcqs($fp_id,$viewlanguage){
		//$fp_id = $this->uri->segment(4);
		//$viewlanguage = $this->uri->segment(5);
		//die('==');
		$data['title'] = 'Final Paper MCQs';
		
		$data['paper_mcqs'] = $this->Paper_model->get_itembank_mcqs($fp_id);
		//print '<pre>';print_r($data['paper_mcqs']); die;
		$data['paper_paras'] = $this->Paper_model->get_itembank_mcqs_paras($fp_id);
		
		$this->load->view('admin/includes/_header', $data);
		if($viewlanguage == 1){
			$this->load->view('admin/paper/itembank_view_mcqs_english');	
		}elseif($viewlanguage == 2){
			$this->load->view('admin/paper/itembank_view_mcqs_urdu');
		}elseif($viewlanguage == 3){
			$this->load->view('admin/paper/itembank_view_mcqs_both');
		}else{
			$this->load->view('admin/paper/itembank_view_mcqs_both');	
		}
		
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_mcqs_double($fp_id,$viewlanguage){
		//$subjectid = $this->uri->segment(4);
		//$viewlanguage = $this->uri->segment(5);
		//die('==');
		$data['title'] = 'Final Paper MCQs';
		//$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs($id);
		
		$data['paper_mcqs'] = $this->Paper_model->get_itembank_mcqs($fp_id);
		$gradeid = $data['paper_mcqs'][0]->fp_grade_id;
		$subjectid = $data['paper_mcqs'][0]->fp_subject_id;
		$sectionid = $data['paper_mcqs'][0]->fp_section;
		$schoolid = $this->session->userdata('school_id');
		
		$data['paper_paras'] = $this->Paper_model->get_itembank_mcqs_paras($fp_id);
		
		$getcrqfinalpaperid = $this->Paper_model->get_crqs_final_paper_id($gradeid,$subjectid,$sectionid);
		$fpc_id = $getcrqfinalpaperid[0]->fpc_id;
		$data['paper_groups'] = $this->Paper_model->get_itembank_crqs($fpc_id);
		$data['paper_erqs'] = $this->Paper_model->get_itembank_crqs_eu($fpc_id);
		
		$this->load->view('admin/includes/_header', $data);
		if($viewlanguage == 1){
			$this->load->view('admin/paper/itembank_view_mcqs_double_english');	
		}elseif($viewlanguage == 2){
			$this->load->view('admin/paper/itembank_view_mcqs_double_urdu');
		}elseif($viewlanguage == 3){
			$this->load->view('admin/paper/itembank_view_mcqs_double_both');
		}else{
			$this->load->view('admin/paper/itembank_view_mcqs_double_both');	
		}
		
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs($fpc_id,$viewlanguage){
		
		$data['title'] = 'Final Paper CRQs';
		
		$data['paper_groups'] = $this->Paper_model->get_itembank_crqs($fpc_id);
		
		$this->load->view('admin/includes/_header', $data);
		if($viewlanguage == 1){
			$this->load->view('admin/paper/itembank_view_crqs_english');	
		}elseif($viewlanguage == 2){
			$this->load->view('admin/paper/itembank_view_crqs_urdu');
		}elseif($viewlanguage == 3){
			$this->load->view('admin/paper/itembank_view_crqs_both');
		}else{
			$this->load->view('admin/paper/itembank_view_crqs_both');	
		}
		
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_eu($fpc_id,$viewlanguage){
		
		$data['title'] = 'Final Paper CRQs';
		
		$data['paper_erqs'] = $this->Paper_model->get_itembank_crqs_eu($fpc_id);
		
		$this->load->view('admin/includes/_header', $data);
		if($viewlanguage == 2){
			$this->load->view('admin/paper/itembank_view_crqs_urdu_only');	
		}else{
			$this->load->view('admin/paper/itembank_view_crqs_english_only');	
		}
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_mq_eu($fpc_id,$viewlanguage){
		
		$data['title'] = 'Final Paper CRQs';
		
		$data['paper_erqs'] = $this->Paper_model->get_itembank_crqs_eu($fpc_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/itembank_view_crqs_english_only_mq');	
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_mq($fpc_id,$viewlanguage){
		
		$data['title'] = 'Final Paper CRQs';
		
		$data['paper_groups'] = $this->Paper_model->get_itembank_crqs($fpc_id);
		
		$this->load->view('admin/includes/_header', $data);
		if($viewlanguage == 1){
			$this->load->view('admin/paper/itembank_view_crqs_mq_english');	
		}elseif($viewlanguage == 2){
			$this->load->view('admin/paper/itembank_view_crqs_mq_urdu');
		}elseif($viewlanguage == 3){
			$this->load->view('admin/paper/itembank_view_crqs_mq_both');
		}else{
			$this->load->view('admin/paper/itembank_view_crqs_mq_both');	
		}
		
		$this->load->view('admin/includes/_footer');
	}

	public function view($id = 0){
			$data['title'] = 'View Paper';
			$data['papers'] = $this->Paper_model->get_paper_by_id($id);
			$data['tehsil'] = $this->Paper_model->get_tehsil_by_id($data['papers'][0]->school_tehsil_id);
			$data['district'] = $this->Paper_model->get_district_by_id($data['papers'][0]->school_district_id);
			//echo '<PRE>';
			//print_r($data['papers']);
			//die();
			$data['item1'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b1);
			$data['item2'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b2);
			$data['item3'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b3);
			$data['item4'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b4);
			$data['item5'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b5);
			$data['item6'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b6);
			$data['item7'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b7);
			$data['item8'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b8);
			$data['item9'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b9);
			$data['item10'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b10);
			$data['item11'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b11);
			$data['item12'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b12);
			$data['item13'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b13);
			$data['item14'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b14);
			$data['item15'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b15);
			$data['item16'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b16);
			$data['item17'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b17);
			$data['item18'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b18);
			$data['item19'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b19);
			$data['item20'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b20);
			$data['item21'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b21);
			$data['item22'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b22);
			$data['item23'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b23);
			$data['item24'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b24);
			$data['item25'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b25);
			
			//print_r($data['item1']);
			//die();
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_view', $data);
			$this->load->view('admin/includes/_footer');
	}

	public function viewp($id = 0){
			$data['title'] = 'View Paper';
			$data['papers'] = $this->Paper_model->get_paper_by_id($id);
			$data['tehsil'] = $this->Paper_model->get_tehsil_by_id($data['papers'][0]->school_tehsil_id);
			$data['district'] = $this->Paper_model->get_district_by_id($data['papers'][0]->school_district_id);
			if($data['papers'][0]->paper_para16!=0){$data['paragraph16'] = $this->Paper_model->get_para_by_id($data['papers'][0]->paper_para16);}
			if($data['papers'][0]->paper_para21!=0){$data['paragraph21'] = $this->Paper_model->get_para_by_id($data['papers'][0]->paper_para21);}
			if($data['papers'][0]->paper_para22!=0){$data['paragraph22'] = $this->Paper_model->get_para_by_id($data['papers'][0]->paper_para22);}
			
			//echo '<PRE>';
			//print_r($data['paragraph16']);
			//die();

			$data['item1'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b1);
			$data['item2'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b2);
			$data['item3'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b3);
			$data['item4'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b4);
			$data['item5'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b5);
			$data['item6'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b6);
			$data['item7'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b7);
			$data['item8'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b8);
			$data['item9'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b9);
			$data['item10'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b10);
			$data['item11'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b11);
			$data['item12'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b12);
			$data['item13'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b13);
			$data['item14'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b14);
			$data['item15'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b15);
			$data['item16'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b16);
			$data['item17'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b17);
			$data['item18'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b18);
			$data['item19'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b19);
			$data['item20'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b20);
			$data['item21'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b21);
			$data['item22'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b22);
			$data['item23'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b23);
			$data['item24'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b24);
			$data['item25'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b25);
			
			//echo "<PRE>";
			//print_r($data['papers']);
			//die();
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_viewp', $data);
			$this->load->view('admin/includes/_footer');
	}
	public function get_itemcode_by_subject()
	{
		echo json_encode($this->Paper_model->get_itemcode_by_subject($this->input->post('subject_id')));
	}
	
	public function get_itemsbank_for_subject()
	{
		echo json_encode($this->Paper_model->get_itemsbank_for_subject($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id2()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id2($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id3()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id3($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id4()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id4($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id5()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id5($this->input->post('subject_id')));
	}
	public function get_items_by_subject_id6()
	{
		echo json_encode($this->Paper_model->get_items_by_subject_id6($this->input->post('subject_id')));
	}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function add_mcq()
	{		
			if($this->input->post('submit'))
			{
				/*echo '<PRE>';
				print_r($_REQUEST);	
				die('------------------add------------------');*/
				$this->form_validation->set_rules('paper_section', 'Paper Section', 'trim|required');				
				$this->form_validation->set_rules('paper_date', 'Paper Date', 'trim|required');				
				$this->form_validation->set_rules('paper_number', 'PAPER ID', 'trim|required');				
				$this->form_validation->set_rules('paper_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('paper_subject_id', 'Subject', 'trim|required');
				$this->form_validation->set_rules('paper_cs_id', 'Unit', 'trim|required');
				$this->form_validation->set_rules('paper_sub_cs_id', 'Chapter', 'trim|required');
				$this->form_validation->set_rules('paper_slo_id', 'SLO', 'trim|required');
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/paper/add'),'refresh');
			}
			else{
				//MCQ paper
				$data = array(
					'fp_school_id' => $this->session->userdata('school_id'),
					'fp_grade_id' => $this->input->post('paper_grade_id'),
					'fp_subject_id' => $this->input->post('paper_subject_id'),
					'fp_cs_id' => $this->input->post('paper_cs_id'),
					'fp_sub_cs_id' => $this->input->post('paper_sub_cs_id'),
					'fp_slo_id' => $this->input->post('paper_slo_id'),
					'fp_type' => 'MCQ',
					//'fp_section' => $this->input->post('paper_section'),
					//'fp_paper_number' => $this->input->post('paper_number'),
					'fp_createddt' =>  date( 'Y-m-d h:i:s' ),
				);
				
				/*if($this->input->post('paper_number'))
				{
					// $filename = '';
					// $content = base_url()."admin/qrcode/qr_code/".$this->input->post('paper_number');
					//$content = "<a href='".base_url()."admin/qrcode/qr_code/".$this->input->post('paper_number')."'>Verify QR Code</a>";

					// $filename = $path.'qrcode'.md5($this->input->post('paper_number').'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
					// QRcode::png($content, $filename, $errorCorrectionLevel, $matrixPointSize, 2);	
					// $data['fp_qrcode'] = $filename;
					$data['fp_qrcode'] = '1';
				}*/
				
				//print_r($data);
				//die();				
				$data = $this->security->xss_clean($data);
				$fp_id = $this->Paper_model->add_paper_final_mcq($data);
				
				$blocks =  $this->Paper_model->get_blocks($this->input->post('paper_subject_id'));
				
				for($x=1;$x<=($blocks[0]['ibs_mcq_blocks']-$blocks[0]['ibs_para_question']);$x++)
				{
					$question_mcq = $this->Paper_model->get_itembank_block_question_mcq($this->input->post('paper_subject_id'),$x);
					$p_detail_data = array(
						'pfm_fp_id' => $fp_id,
						'fp_block_no' => $x,
						'fp_item_id' => $question_mcq[0]['ibm_item_id'],
						'fp_para_id' => 0
					);
					$p_detail_data = $this->security->xss_clean($p_detail_data);
					$result = $this->Paper_model->add_paper_final_mcq_detail($p_detail_data);
				}
				
				if($blocks[0]['ibs_para_question'] > 0){
					$para_mcq = $this->Paper_model->get_itembank_block_para_mcq($this->input->post('paper_subject_id'));
					$para_detail_data = array(
						'pfm_fp_id' => $fp_id,
						'fp_block_no' => 0,
						'fp_item_id' => 0,
						'fp_para_id' => $para_mcq[0]['ibm_para_id']
					);
					$para_detail_data = $this->security->xss_clean($para_detail_data);
					$result = $this->Paper_model->add_paper_final_mcq_detail($para_detail_data);
				}
				//End MCQ
				
				//CRQ paper
				$data = array(
					'fpc_school_id' => $this->session->userdata('school_id'),
					'fpc_grade_id' => $this->input->post('paper_grade_id'),
					'fpc_subject_id' => $this->input->post('paper_subject_id'),
					'fpc_type' => 'ERQ',
					'fpc_section' => $this->input->post('paper_section'),
					'fpc_paper_number' => str_replace('-M','-C',$this->input->post('paper_number')),
					'fpc_createddt' =>  date( 'Y-m-d h:i:s' ),
				);
				/*if($this->input->post('paper_number'))
				{
					// $filename = '';
					// $content = base_url()."admin/qrcode/qr_code/".str_replace('-M','-C',$this->input->post('paper_number'));
					//$content = "<a href='".base_url()."admin/qrcode/qr_code/".str_replace('-M','-C',$this->input->post('paper_number'))."/C'>Verify QR Code</a>";
					// $filename = $path.'qrcode'.md5(str_replace('-M','-C',$this->input->post('paper_number')).'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
					// QRcode::png($content, $filename, $errorCorrectionLevel, $matrixPointSize, 2);	
					// $data['fp_qrcode'] = $filename;
					$data['fpc_qrcode'] = '1';
				}*/
				//print_r($data);
				//die();				
				$data = $this->security->xss_clean($data);
				$fpc_id = $this->Paper_model->add_paper_final_crq($data);
				
				$blocks =  $this->Paper_model->get_blocks($this->input->post('paper_subject_id'));
				
				//$urdu_english_subjects 	= [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48,65,66,67];
				$urdu_english_subjects 	= [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48];
				
				if(in_array($this->input->post('paper_subject_id'),$urdu_english_subjects))
				{
					for($x=1;$x<=($blocks[0]['ibs_crq_blocks']);$x++)
					{
						$question_crq = $this->Paper_model->get_itembank_block_question_crq($this->input->post('paper_subject_id'),$x);
						$p_detail_data = array(
							'pfc_fpc_id' => $fpc_id,
							'fpc_block_no' => $x,
							'fpc_item_id' => $question_crq[0]['ibc_item_id'],
							'fpc_para_id' => 0,
							'fpc_group_id' => 0
						);
						$p_detail_data = $this->security->xss_clean($p_detail_data);
						$result = $this->Paper_model->add_paper_final_crq_detail($p_detail_data);
					}
				}
				else
				{
					for($x=1;$x<=($blocks[0]['ibs_crq_blocks']);$x++)
					{
						$question_crq = $this->Paper_model->get_itembank_block_question_crq($this->input->post('paper_subject_id'),$x);
						$p_detail_data = array(
							'pfc_fpc_id' => $fpc_id,
							'fpc_block_no' => $x,
							'fpc_item_id' => 0,
							'fpc_para_id' => 0,
							'fpc_group_id' => $question_crq[0]['ibc_group_id']
						);
						$p_detail_data = $this->security->xss_clean($p_detail_data);
						$result = $this->Paper_model->add_paper_final_crq_detail($p_detail_data);
					}
				}
				//end CRQ
				
				$this->session->set_flashdata('success', 'Papers Generated successfully!');
				redirect(base_url('admin/paper/generated_paper'));
			}
		}
		else
		{
			$data['title'] = 'Generate MCQ Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');				
			$data['added_subjects'] = $this->Paper_model->get_all_added_subjects();				
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_add');
			$this->load->view('admin/includes/_footer');
		}		
	}
	
	public function crqs_add()
	{		
			if($this->input->post('submit'))
			{
				/*echo '<PRE>';
				print_r($_REQUEST);	
				die('------------------add------------------');*/
				$this->form_validation->set_rules('paper_section', 'Paper Section', 'trim|required');				
				$this->form_validation->set_rules('paper_date', 'Paper Date', 'trim|required');				
				$this->form_validation->set_rules('paper_number', 'PAPER ID', 'trim|required');				
				$this->form_validation->set_rules('paper_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('paper_subject_id', 'Subject', 'trim|required');
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/paper/crqs_add'),'refresh');
			}
			else{
				$data = array(
					'fpc_school_id' => $this->session->userdata('school_id'),
					'fpc_grade_id' => $this->input->post('paper_grade_id'),
					'fpc_subject_id' => $this->input->post('paper_subject_id'),
					'fpc_type' => 'ERQ',
					'fpc_section' => $this->input->post('paper_section'),
					'fpc_paper_number' => $this->input->post('paper_number'),
					'fpc_createddt' =>  date( 'Y-m-d h:i:s' ),
				);
				
				//print_r($data);
				//die();				
				$data = $this->security->xss_clean($data);
				$fpc_id = $this->Paper_model->add_paper_final_crq($data);
				
				$blocks =  $this->Paper_model->get_blocks($this->input->post('paper_subject_id'));
				
				for($x=1;$x<=($blocks[0]['ibs_crq_blocks']);$x++)
				{
					$question_crq = $this->Paper_model->get_itembank_block_question_crq($this->input->post('paper_subject_id'),$x);
					$p_detail_data = array(
						'pfc_fpc_id' => $fpc_id,
						'fpc_block_no' => $x,
						'fpc_item_id' => 0,
						'fpc_para_id' => 0,
						'fpc_group_id' => $question_crq[0]['ibc_group_id']
					);
					$p_detail_data = $this->security->xss_clean($p_detail_data);
					$result = $this->Paper_model->add_paper_final_crq_detail($p_detail_data);
				}
				
				$this->session->set_flashdata('success', 'CRQ Paper Generated successfully!');
				redirect(base_url('admin/paper/paper_crqs'));
			}
		}
		else
		{
			$data['title'] = 'Generate CRQ Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('ERQ');				
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_crq_add');
			$this->load->view('admin/includes/_footer');
		}		
	}
	
	public function add()
	{		
			if($this->input->post('submit'))
			{
				/*echo '<PRE>';
				print_r($_REQUEST);	
				die('------------------add------------------');*/
				$this->form_validation->set_rules('paper_title_en', 'Paper Title', 'trim|required');				
				$this->form_validation->set_rules('paper_date', 'Paper Date', 'trim|required');				
				$this->form_validation->set_rules('paper_number', 'PAPER ID', 'trim|required');				
				$this->form_validation->set_rules('paper_grade_id', 'Grade', 'trim|required');
				$this->form_validation->set_rules('paper_subject_id', 'Subject', 'trim|required');
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/paper/add'),'refresh');
			}
			else{
				$data = array(
					'paper_title_en' => $this->input->post('paper_title_en'),
					'paper_date' => $this->input->post('paper_date'),
					'paper_number' => $this->input->post('paper_number'),
					'paper_grade_id' => $this->input->post('paper_grade_id'),
					'paper_subject_id' =>$this->input->post('paper_subject_id'),
					'paper_school_id' => $this->session->userdata('school_id'),
					'paper_createdby' => $this->session->userdata('school_id'),
					'paper_status' => 0
				);
				
				//print_r($data);
				//die();				
				$data = $this->security->xss_clean($data);
				$result = $this->Paper_model->add_paper($data);
				//die($this->db->last_query());
				$arr_ur_en_subjects = [12,18,25,31,39,47,13,19,26,32,40,48,65,66,67];
				if($result){
					if( in_array($this->input->post('paper_subject_id'),$arr_ur_en_subjects))
					   {
						   $this->session->set_flashdata('success', 'Paper Generated Started, Now Select Questions for your paper!');
							redirect(base_url('admin/paper/add_questionsp/').$result);
					   }
					 else
					 {
						$this->session->set_flashdata('success', 'Paper Generated Started, Now Select Questions for your paper!');
						redirect(base_url('admin/paper/add_questions/').$result); 
					 }
					
				}
			}
		}
		else
		{
			$data['title'] = 'Generate Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');				
			$data['added_subjects'] = $this->Paper_model->get_all_added_subjects();				
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_add');
			$this->load->view('admin/includes/_footer');
		}		
	}
	
	public function add_questions($id = 0)	
	{	
		/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questions------------------');
			*/
		if($this->input->post('paper_id'))
		{
			/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questions------------------'); */
			
			
			$paper_subject_id = $this->input->post('paper_subject_id');
			$header 	= $this->Paper_model->get_header_by_id($paper_subject_id);			
			$data = array(
				'paper_general_inst' => $header[0]->pi_general_instruction,
				'paper_instructions_en' => $header[0]->pi_paper_instruction_en,
				'paper_instructions_ur' => $header[0]->pi_paper_instruction_ur,
				'paper_total_marks' => $header[0]->pi_paper_marks,
				'paper_type' => $header[0]->pi_paper_type,
				'paper_time' => $header[0]->pi_paper_time,
				'paper_item_b1' => $this->input->post('paper_item_b1'),
				'paper_item_b2' => $this->input->post('paper_item_b2'),
				'paper_item_b3' => $this->input->post('paper_item_b3'),
				'paper_item_b4' => $this->input->post('paper_item_b4'),
				'paper_item_b5' => $this->input->post('paper_item_b5'),
				'paper_item_b6' => $this->input->post('paper_item_b6'),
				'paper_item_b7' => $this->input->post('paper_item_b7'),
				'paper_item_b8' => $this->input->post('paper_item_b8'),
				'paper_item_b9' => $this->input->post('paper_item_b9'),
				'paper_item_b10' => $this->input->post('paper_item_b10'),
				'paper_item_b11' => $this->input->post('paper_item_b11'),
				'paper_item_b12' => $this->input->post('paper_item_b12'),
				'paper_item_b13' => $this->input->post('paper_item_b13'),
				'paper_item_b14' => $this->input->post('paper_item_b14'),
				'paper_item_b15' => $this->input->post('paper_item_b15'),
				'paper_item_b16' => ($this->input->post('paper_item_b16')!="")?$this->input->post('paper_item_b16'):0,
				'paper_item_b17' => ($this->input->post('paper_item_b17')!="")?$this->input->post('paper_item_b17'):0,
				'paper_item_b18' => ($this->input->post('paper_item_b18')!="")?$this->input->post('paper_item_b18'):0,
				'paper_item_b19' => ($this->input->post('paper_item_b19')!="")?$this->input->post('paper_item_b19'):0,
				'paper_item_b20' => ($this->input->post('paper_item_b20')!="")?$this->input->post('paper_item_b20'):0,
				'paper_item_b21' => ($this->input->post('paper_item_b21')!="")?$this->input->post('paper_item_b21'):0,
				'paper_item_b22' => ($this->input->post('paper_item_b22')!="")?$this->input->post('paper_item_b22'):0,
				'paper_item_b23' => ($this->input->post('paper_item_b23')!="")?$this->input->post('paper_item_b23'):0,
				'paper_item_b24' => ($this->input->post('paper_item_b24')!="")?$this->input->post('paper_item_b24'):0,
				'paper_item_b25' => ($this->input->post('paper_item_b25')!="")?$this->input->post('paper_item_b25'):0,
				'paper_school_id' => $this->session->userdata('school_id'),
				'paper_createdby' => $this->session->userdata('school_id'),		
				'paper_status' => 1
			);

			/*print_r($data);
			die();				*/
			//$data = $this->security->xss_clean($data);
			$result = $this->Paper_model->edit_paper($data, $id);
			//die($this->db->last_query());
			if($result){
				$this->session->set_flashdata('success', 'Paper Generated Successfully, Now you can view your paper and Print!');
				redirect(base_url('admin/paper/'));
			}
		
	}
		else
		{
			$data['title'] = 'Select Questions for Paper';
			$data['paper'] = $this->Paper_model->get_paper_by_id($id);
			if(!isset($data['paper'][0]->paper_subject_id)){ $this->session->set_flashdata('error', 'Issue with Paper! You can create New Paper');
				redirect(base_url('admin/paper/add')); }
			$data['itemsbank'] = $this->Paper_model->get_itemsbank_by_id($data['paper'][0]->paper_subject_id);
			
			$data['ib_b1_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item1']);
			$data['ib_b1_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item2']);
			$data['ib_b1_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item3']);
			$data['ib_b1_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item4']);

			$data['ib_b2_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item1']);
			$data['ib_b2_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item2']);
			$data['ib_b2_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item3']);
			$data['ib_b2_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item4']);

			$data['ib_b3_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item1']);
			$data['ib_b3_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item2']);
			$data['ib_b3_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item3']);
			$data['ib_b3_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item4']);

			$data['ib_b4_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item1']);
			$data['ib_b4_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item2']);
			$data['ib_b4_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item3']);
			$data['ib_b4_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item4']);

			$data['ib_b5_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item1']);
			$data['ib_b5_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item2']);
			$data['ib_b5_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item3']);
			$data['ib_b5_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item4']);

			$data['ib_b6_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item1']);
			$data['ib_b6_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item2']);
			$data['ib_b6_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item3']);
			$data['ib_b6_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item4']);

			$data['ib_b7_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item1']);
			$data['ib_b7_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item2']);
			$data['ib_b7_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item3']);
			$data['ib_b7_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item4']);

			$data['ib_b8_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item1']);
			$data['ib_b8_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item2']);
			$data['ib_b8_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item3']);
			$data['ib_b8_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item4']);

			$data['ib_b9_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item1']);
			$data['ib_b9_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item2']);
			$data['ib_b9_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item3']);
			$data['ib_b9_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item4']);

			$data['ib_b10_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item1']);
			$data['ib_b10_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item2']);
			$data['ib_b10_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item3']);
			$data['ib_b10_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item4']);

			$data['ib_b11_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item1']);
			$data['ib_b11_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item2']);
			$data['ib_b11_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item3']);
			$data['ib_b11_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item4']);

			$data['ib_b12_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item1']);
			$data['ib_b12_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item2']);
			$data['ib_b12_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item3']);
			$data['ib_b12_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item4']);

			$data['ib_b13_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item1']);
			$data['ib_b13_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item2']);
			$data['ib_b13_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item3']);
			$data['ib_b13_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item4']);

			$data['ib_b14_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item1']);
			$data['ib_b14_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item2']);
			$data['ib_b14_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item3']);
			$data['ib_b14_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item4']);

			$data['ib_b15_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item1']);
			$data['ib_b15_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item2']);
			$data['ib_b15_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item3']);
			$data['ib_b15_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item4']);

		$data['ib_b16_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item1']);
		$data['ib_b16_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item2']);
		$data['ib_b16_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item3']);
		$data['ib_b16_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item4']);

		$data['ib_b17_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item1']);
		$data['ib_b17_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item2']);
		$data['ib_b17_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item3']);
		$data['ib_b17_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item4']);

		$data['ib_b18_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item1']);
		$data['ib_b18_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item2']);
		$data['ib_b18_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item3']);
		$data['ib_b18_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item4']);

		$data['ib_b19_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item1']);
		$data['ib_b19_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item2']);
		$data['ib_b19_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item3']);
		$data['ib_b19_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item4']);

		$data['ib_b20_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item1']);
		$data['ib_b20_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item2']);
		$data['ib_b20_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item3']);
		$data['ib_b20_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item4']);

		$data['ib_b21_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item1']);
		$data['ib_b21_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item2']);
		$data['ib_b21_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item3']);
		$data['ib_b21_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item4']);

		$data['ib_b22_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item1']);
		$data['ib_b22_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item2']);
		$data['ib_b22_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item3']);
		$data['ib_b22_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item4']);

		$data['ib_b23_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item1']);
		$data['ib_b23_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item2']);
		$data['ib_b23_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item3']);
		$data['ib_b23_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item4']);

		$data['ib_b24_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item1']);
		$data['ib_b24_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item2']);
		$data['ib_b24_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item3']);
		$data['ib_b24_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item4']);

		$data['ib_b25_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item1']);
		$data['ib_b25_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item2']);
		$data['ib_b25_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item3']);
		$data['ib_b25_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item4']);
			
			/* 
			echo '<pre>';
			print_r($data['paper']);
			print_r($data['itembank']);
			die();
			*/
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_questions_add');
			$this->load->view('admin/includes/_footer');
		}		
	}
	
	public function add_questionsp($id = 0)	
	{	
		/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questionsp------------------');
			*/
		if($this->input->post('paper_id'))
		{
			/*echo '<PRE>';
			print_r($_REQUEST);	
			die('------------------add questions------------------'); */
			
			$paper_subject_id = $this->input->post('paper_subject_id');
			$header 	= $this->Paper_model->get_header_by_id($paper_subject_id);			
			$data = array(
				'paper_general_inst' => $header[0]->pi_general_instruction,
				'paper_instructions_en' => $header[0]->pi_paper_instruction_en,
				'paper_instructions_ur' => $header[0]->pi_paper_instruction_ur,
				'paper_total_marks' => $header[0]->pi_paper_marks,
				'paper_type' => $header[0]->pi_paper_type,
				'paper_time' => $header[0]->pi_paper_time,
				'paper_item_b1' => $this->input->post('paper_item_b1'),
				'paper_item_b2' => $this->input->post('paper_item_b2'),
				'paper_item_b3' => $this->input->post('paper_item_b3'),
				'paper_item_b4' => $this->input->post('paper_item_b4'),
				'paper_item_b5' => $this->input->post('paper_item_b5'),

				'paper_item_b6' => $this->input->post('paper_item_b6'),
				'paper_item_b7' => $this->input->post('paper_item_b7'),
				'paper_item_b8' => $this->input->post('paper_item_b8'),
				'paper_item_b9' => $this->input->post('paper_item_b9'),
				'paper_item_b10' => $this->input->post('paper_item_b10'),
				'paper_item_b11' => $this->input->post('paper_item_b11'),
				'paper_item_b12' => $this->input->post('paper_item_b12'),
				'paper_item_b13' => $this->input->post('paper_item_b13'),
				'paper_item_b14' => $this->input->post('paper_item_b14'),
				'paper_item_b15' => $this->input->post('paper_item_b15'),				
				'paper_item_b16' => ($this->input->post('paper_item_b16')!="")?$this->input->post('paper_item_b16'):0,
				'paper_item_b17' => ($this->input->post('paper_item_b17')!="")?$this->input->post('paper_item_b17'):0,
				'paper_item_b18' => ($this->input->post('paper_item_b18')!="")?$this->input->post('paper_item_b18'):0,
				'paper_item_b19' => ($this->input->post('paper_item_b19')!="")?$this->input->post('paper_item_b18'):0,
				'paper_item_b20' => ($this->input->post('paper_item_b20')!="")?$this->input->post('paper_item_b20'):0,				
				'paper_item_b21' => ($this->input->post('paper_item_b21')!="")?$this->input->post('paper_item_b21'):0,
				'paper_item_b22' => ($this->input->post('paper_item_b22')!="")?$this->input->post('paper_item_b22'):0,
				'paper_item_b23' => ($this->input->post('paper_item_b23')!="")?$this->input->post('paper_item_b23'):0,
				'paper_item_b24' => ($this->input->post('paper_item_b24')!="")?$this->input->post('paper_item_b24'):0,
				'paper_para16' => ($this->input->post('paper_para16')!="")?$this->input->post('paper_para16'):0,				
				'paper_para21' => ($this->input->post('paper_para21')!="")?$this->input->post('paper_para21'):0,
				'paper_para22' => ($this->input->post('paper_para22')!="")?$this->input->post('paper_para22'):0,
				'paper_school_id' => $this->session->userdata('school_id'),
				'paper_createdby' => $this->session->userdata('school_id'),		
				'paper_status' => 1
			);

			/*print_r($data);
			die();				*/
			//$data = $this->security->xss_clean($data);
			$result = $this->Paper_model->edit_paper($data, $id);
			//die($this->db->last_query());
			if($result){
				$this->session->set_flashdata('success', 'Paper Generated Successfully, Now you can view your paper and Print!');
				redirect(base_url('admin/paper/'));
			}
		
	}
		else
		{
			$data['title'] = 'Select Questions for Paper';
			$data['paper'] = $this->Paper_model->get_paper_by_id($id);
			if(!isset($data['paper'][0]->paper_subject_id)){ $this->session->set_flashdata('error', 'Issue with Paper! You can create New Paper');
				redirect(base_url('admin/paper/add')); }
			$data['itemsbank'] = $this->Paper_model->get_itemsbank_by_id($data['paper'][0]->paper_subject_id);
			
			
			$data['paras16'] = $this->Paper_model->get_paras_by_subject_id($data['paper'][0]->paper_subject_id,16);			
			$data['paras21'] = $this->Paper_model->get_paras_by_subject_id($data['paper'][0]->paper_subject_id,21);
			$data['paras22'] = $this->Paper_model->get_paras_by_subject_id($data['paper'][0]->paper_subject_id,22);
			
			
			
			$data['ib_b1_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item1']);
			$data['ib_b1_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item2']);
			$data['ib_b1_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item3']);
			$data['ib_b1_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item4']);

			$data['ib_b2_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item1']);
			$data['ib_b2_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item2']);
			$data['ib_b2_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item3']);
			$data['ib_b2_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item4']);

			$data['ib_b3_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item1']);
			$data['ib_b3_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item2']);
			$data['ib_b3_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item3']);
			$data['ib_b3_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item4']);

			$data['ib_b4_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item1']);
			$data['ib_b4_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item2']);
			$data['ib_b4_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item3']);
			$data['ib_b4_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item4']);

			$data['ib_b5_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item1']);
			$data['ib_b5_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item2']);
			$data['ib_b5_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item3']);
			$data['ib_b5_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item4']);

			$data['ib_b6_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item1']);
			$data['ib_b6_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item2']);
			$data['ib_b6_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item3']);
			$data['ib_b6_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item4']);

			$data['ib_b7_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item1']);
			$data['ib_b7_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item2']);
			$data['ib_b7_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item3']);
			$data['ib_b7_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item4']);

			$data['ib_b8_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item1']);
			$data['ib_b8_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item2']);
			$data['ib_b8_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item3']);
			$data['ib_b8_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item4']);

			$data['ib_b9_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item1']);
			$data['ib_b9_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item2']);
			$data['ib_b9_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item3']);
			$data['ib_b9_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item4']);

			$data['ib_b10_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item1']);
			$data['ib_b10_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item2']);
			$data['ib_b10_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item3']);
			$data['ib_b10_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item4']);

			$data['ib_b11_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item1']);
			$data['ib_b11_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item2']);
			$data['ib_b11_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item3']);
			$data['ib_b11_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item4']);

			$data['ib_b12_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item1']);
			$data['ib_b12_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item2']);
			$data['ib_b12_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item3']);
			$data['ib_b12_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item4']);

			$data['ib_b13_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item1']);
			$data['ib_b13_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item2']);
			$data['ib_b13_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item3']);
			$data['ib_b13_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item4']);

			$data['ib_b14_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item1']);
			$data['ib_b14_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item2']);
			$data['ib_b14_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item3']);
			$data['ib_b14_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item4']);

			$data['ib_b15_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item1']);
			$data['ib_b15_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item2']);
			$data['ib_b15_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item3']);
			$data['ib_b15_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item4']);

		$data['ib_b16_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item1']);
		$data['ib_b16_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item2']);
		$data['ib_b16_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item3']);
		$data['ib_b16_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item4']);

		$data['ib_b17_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item1']);
		$data['ib_b17_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item2']);
		$data['ib_b17_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item3']);
		$data['ib_b17_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item4']);

		$data['ib_b18_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item1']);
		$data['ib_b18_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item2']);
		$data['ib_b18_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item3']);
		$data['ib_b18_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item4']);

		$data['ib_b19_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item1']);
		$data['ib_b19_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item2']);
		$data['ib_b19_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item3']);
		$data['ib_b19_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item4']);

		$data['ib_b20_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item1']);
		$data['ib_b20_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item2']);
		$data['ib_b20_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item3']);
		$data['ib_b20_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item4']);
	
		$data['ib_b21_item1'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item1']);
		$data['ib_b21_item2'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item2']);
		$data['ib_b21_item3'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item3']);
		$data['ib_b21_item4'] = $this->Paper_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item4']);

			/* 
			echo '<pre>';
			print_r($data['paper']);
			print_r($data['itembank']);
			die();
			*/
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_questions_addp');
			$this->load->view('admin/includes/_footer');
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
				$data['paper'] = $this->Paper_model->get_paper_by_id($id);
				$data['view'] = 'admin/paper/paper_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'ib_title' => $this->input->post('ib_title'),
					'ib_created' => $this->input->post('ib_created'),
					'ib_year' => $this->input->post('ib_year'),
					'ib_grade_id' => $this->input->post('ib_grade_id'),
					'ib_subject_id' =>$this->input->post('ib_subject_id'),
					'ib_createdby' => $this->session->userdata('school_id'),							
					
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
				
				$data = $this->security->xss_clean($data);
				$result = $this->Paper_model->edit_paper($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'ItemsBank has been updated successfully!');
					redirect(base_url('admin/paper'));
				}
			}
		}
		else{
			$data['title'] = 'Edit ItemsBank';
			$data['grades'] = $this->Paper_model->get_all_grades();
			if($this->session->userdata('role_id')==3)
			{
				$subjectList = $this->session->userdata('subjects_ids');						
				$data['subjects'] = $this->Paper_model->get_ae_subjects($subjectList);
			}		
			else
			{
				$data['subjects'] = $this->Paper_model->get_all_subjects();
			}
			$data['cstands'] = $this->Paper_model->get_all_cstands();
			$data['subcstands'] = $this->Paper_model->get_all_subcstands();
			$data['slos'] = $this->Paper_model->get_all_slos();
			$data['paper'] = $this->Paper_model->get_paper_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function change_status()
	{   
		$this->Paper_model->change_status();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subjects_by_grade_mcq()
	{
		echo json_encode($this->Paper_model->get_subjects_by_grade_final($this->input->post('grade_id'), 'MCQ'));			
	}
	public function subjects_by_grade_mcq_eu()
	{
		echo json_encode($this->Paper_model->get_subjects_by_grade_final_eu($this->input->post('grade_id'), 'MCQ'));			
	}
	public function subjects_by_grade_crq()
	{
		echo json_encode($this->Paper_model->get_subjects_by_grade_final($this->input->post('grade_id'), 'ERQ'));			
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function cstands_by_subject()
	{
		echo json_encode($this->Paper_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function subcstands_by_cstand()
	{
		echo json_encode($this->Paper_model->get_subcstands_by_cstand($this->input->post('cs_id')));
	}
	public function subcstands_by_cstand_sub()
	{
		echo json_encode($this->Paper_model->get_subcstands_by_cstand($this->input->post('qat_cs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function slos_by_subcstands()
	{
		echo json_encode($this->Paper_model->get_slos_by_subcstands($this->input->post('subcs_id')));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function item_by_slo()
	{
		echo json_encode($this->Paper_model->get_item_by_slo($this->input->post('slo_id')));
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function create_paper_pdf()
	{
 			$data['papers'] = $this->Paper_model->get_paper_by_id($id);			
			$data['item1'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b1);
			$data['item2'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b2);
			$data['item3'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b3);
			$data['item4'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b4);
			$data['item5'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b5);
			$data['item6'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b6);
			$data['item7'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b7);
			$data['item8'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b8);
			$data['item9'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b9);
			$data['item10'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b10);
			$data['item11'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b11);
			$data['item12'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b12);
			$data['item13'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b13);
			$data['item14'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b14);
			$data['item15'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b15);
			$data['item16'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b16);
			$data['item17'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b17);
			$data['item18'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b18);
			$data['item19'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b19);
			$data['item20'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b20);
			$data['item21'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b21);
			$data['item22'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b22);
			$data['item23'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b23);
			$data['item24'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b24);
			$data['item25'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b25);

		$this->load->view('admin/paper/paper_pdf', $data);
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function key($id = 0){
			$data['title'] = 'Key Paper';
			$data['papers'] = $this->Paper_model->get_paper_by_id($id);
			$data['tehsil'] = $this->Paper_model->get_tehsil_by_id($data['papers'][0]->school_tehsil_id);
			$data['district'] = $this->Paper_model->get_district_by_id($data['papers'][0]->school_district_id);
			$data['key16'] = $this->Paper_model->get_paras16_by_subject($data['papers'][0]->paper_para16);
			$paperparagraph = $data['papers'][0]->paper_para21?$data['papers'][0]->paper_para21:$data['papers'][0]->paper_para22;
			$data['key2para'] = $this->Paper_model->get_para_by_id($paperparagraph);
							//echo '<PRE>';
							//echo $paperparagraph;
							//print_r($data['key16']);
							//echo '<hr />';
							//die();
			$data['item1'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b1);
			$data['item2'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b2);
			$data['item3'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b3);
			$data['item4'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b4);
			$data['item5'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b5);
			$data['item6'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b6);
			$data['item7'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b7);
			$data['item8'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b8);
			$data['item9'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b9);
			$data['item10'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b10);
			$data['item11'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b11);
			$data['item12'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b12);
			$data['item13'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b13);
			$data['item14'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b14);
			$data['item15'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b15);
			$data['item16'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b16);
			$data['item17'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b17);
			$data['item18'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b18);
			$data['item19'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b19);
			$data['item20'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b20);
			$data['item21'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b21);
			$data['item22'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b22);
			$data['item23'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b23);
			$data['item24'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b24);
			$data['item25'] = $this->Paper_model->get_item_by_id($data['papers'][0]->paper_item_b25);
			
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/paper_key', $data);
			$this->load->view('admin/includes/_footer');
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function delete($id = 0)
	{
		$this->db->delete('ci_paper', array('ib_id' => $id));
		$this->session->set_flashdata('success', 'ItemBank has been deleted successfully!');
		redirect(base_url('admin/paper'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_items_pdf(){

		//$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['paper'] = $this->Paper_model->get_paper_for_export();
		$this->load->view('admin/paper/paper_pdf', $data);
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
	public function school_paper_exist() {
		$fp_subject_id = $this->input->post( 'fp_subject_id' );
		$fp_section = $this->input->post( 'fp_section' );
		$fp_school_id = $this->session->userdata('school_id');
		
		$exists = $this->Paper_model->school_paper_exist($fp_school_id, $fp_subject_id, $fp_section);
		echo count( $exists );
	}
	public function school_paper_exist_crq() {
		$fpc_subject_id = $this->input->post( 'fpc_subject_id' );
		$fpc_section = $this->input->post( 'fpc_section' );
		$fpc_school_id = $this->session->userdata('school_id');
		
		$exists = $this->Paper_model->school_paper_exist_crq($fpc_school_id, $fpc_subject_id, $fpc_section);
		echo count( $exists );
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function generated_paper(){
		$data['title'] = 'Generated Paper List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/generated_paper_list');//paper_crqs_list
		$this->load->view('admin/includes/_footer');
	}
	public function datatable_json_gene_papers(){
		$records_crq = $this->Paper_model->get_all_final_paper_itemsbank_all();
		//$records_mcq = $this->Paper_model->get_all_final_paper_itemsbank_mcqs();
		//print '<pre>';
		//print_r($records);
		//die;
		$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,37,45,53,62,63,64];
		$tqm_subjects 		= [65,66,67];
		$data = array();		
		$i=0;
		foreach ($records_crq['data']  as $row) 
		{
			$dropdownblock_mcq = '';
			$dropdownblock_crq = '';
			$dropdownblock_crq_mq = '';
			/*if(in_array($row['fpc_subject_id'],$english_subjects)){
				$dropdownblock_crq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_eu/'.$row['fpc_id'].'/1').'"> English</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_key_eu/'.$row['fpc_id'].'').'">  Answers / Rubrics</i></a>';
				
				$dropdownblock_crq_mq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_mq_eu/'.$row['fpc_id'].'/1').'"> English</i></a>';
			}elseif(in_array($row['fpc_subject_id'],$urdu_subjects)){
				$dropdownblock_crq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_eu/'.$row['fpc_id'].'/2').'"> Urdu</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_key_eu/'.$row['fpc_id'].'').'">  Answers / Rubrics</i></a>';
				
				$dropdownblock_crq_mq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_mq_eu/'.$row['fpc_id'].'/2').'"> Urdu</i></a>';
			}elseif(in_array($row['fpc_subject_id'],$tqm_subjects)){
				$dropdownblock_crq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/2').'"> Urdu</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_key/'.$row['fpc_id'].'').'">  Answers / Rubrics</i></a>';
				
				$dropdownblock_crq_mq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_mq/'.$row['fpc_id'].'/2').'"> Urdu</i></a>';
			}else{
				$dropdownblock_crq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/1').'"> English</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/2').'"> Urdu</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs/'.$row['fpc_id'].'/3').'"> Bilingual</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_key/'.$row['fpc_id'].'').'">  Answers / Rubrics</i></a>';
				
				$dropdownblock_crq_mq = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_mq/'.$row['fpc_id'].'/1').'"> English</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_mq/'.$row['fpc_id'].'/2').'"> Urdu</i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_crqs_mq/'.$row['fpc_id'].'/3').'"> Bilingual</i></a>';
			}*/
			
			if(in_array($row['fp_subject_id'],$english_subjects))
			{
				$dropdownblock_mcq = '<a class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/1').'" target="_blank">English Version</a> <a class="view btn btn-sm btn-info"  href="'.base_url('admin/paper/view_mcqs_key/'.$row['fp_id'].'/k').'" target="_blank">Keys/Rubrics</a>';
			}
			elseif(in_array($row['fp_subject_id'],$urdu_subjects))
			{
				$dropdownblock_mcq = '<a class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/2').'" target="_blank">Urdu Version</a> <a class="view btn btn-sm btn-info"  href="'.base_url('admin/paper/view_mcqs_key/'.$row['fp_id'].'/k').'" target="_blank">Keys/Rubrics</a>';
			}
			elseif(in_array($row['fp_subject_id'],$tqm_subjects))
			{
				$dropdownblock_mcq = '<a class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/2').'" target="_blank">Urdu Version</a> <a class="view btn btn-sm btn-info"  href="'.base_url('admin/paper/view_mcqs_key/'.$row['fp_id'].'/k').'" target="_blank">Keys/Rubrics</a>';
			}
			else
			{
				$dropdownblock_mcq = '<a class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/1').'" target="_blank">English Version</a> <a class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_mcqs_double/'.$row['fp_id'].'/2').'" target="_blank">Urdu Version</a> <a class="view btn btn-sm btn-info" href="'.base_url('admin/paper/view_mcqs_key/'.$row['fp_id'].'/k').'" target="_blank">Keys/Rubrics</a>';
			}
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['fp_section'],
 				date_time($row['fp_createddt']),
				$dropdownblock_mcq,
				$dropdownblock_crq
				//$dropdownblock_crq_mq
			);
		}
		$records_crq['data']=$data;
		echo json_encode($records_crq);}
	
	public function view_mcqs_key($id=0)
	{
		$data['title'] = 'Paper Key';
		$data['paper_mcqs'] = $this->Paper_model->paper_mcqs_key($id);
		$gradeid = $data['paper_mcqs'][0]->fp_grade_id;
		$subjectid = $data['paper_mcqs'][0]->fp_subject_id;
		$sectionid = $data['paper_mcqs'][0]->fp_section;
		
		$data['paper_paras'] = $this->Paper_model->paper_mcqs_paras($id);
		
		$getcrqfinalpaperid = $this->Paper_model->get_crqs_final_paper_id($gradeid,$subjectid,$sectionid);
		$fpc_id = $getcrqfinalpaperid[0]->fpc_id;
		$data['paper_erqs'] = $this->Paper_model->get_itembank_crqs_eu($fpc_id);
		$data['paper_groups'] = $this->Paper_model->paper_crqs_key($fpc_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/paper_view_key');
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_key($id=0){
		//$subjectid = $this->uri->segment(4);
		$data['title'] = 'Paper CRQs Answer / Rubrics';
		
		$data['paper_groups'] = $this->Paper_model->paper_crqs_key($id);	
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/paper_view_crqs_key');	
		$this->load->view('admin/includes/_footer');
	}
	
	public function view_crqs_key_eu($fpc_id){
		
		$data['title'] = 'Paper CRQs Key';
		
		$data['paper_erqs'] = $this->Paper_model->get_itembank_crqs_eu($fpc_id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/paper_view_crqs_english_only_key');	
		$this->load->view('admin/includes/_footer');
	}
	public function grade1_2(){
		$data['title'] = 'Oral Papers for Grade 1 and 2';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/grade_1_2_papers');
		$this->load->view('admin/includes/_footer');
	}
	
	public function ethics(){
		$data['title'] = 'Ethics Papers for Grade 1 to 8';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/ethics_all');
		$this->load->view('admin/includes/_footer');
	}
	public function nazra(){
		$data['title'] = 'Nazra Islamiat & Quran Majeed Papers';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/nazra_all');
		$this->load->view('admin/includes/_footer');
	}
//======================================================================================	
	public function unit_wise_paper()
	{		
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('paper_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('paper_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('paper_cs_id', 'Unit', 'trim|required');
				
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/paper/unit_wise_paper'),'refresh');
			}
			else
			{
				//MCQ paper
				$data['paper_mcqs'] = array_merge(
											$this->Paper_model->get_unit_wise_mcq(
											$this->input->post('paper_grade_id'), 
											$this->input->post('paper_subject_id'),
											$this->input->post('paper_cs_id')
										),
								
											$this->Paper_model->get_unit_wise_crq(
											$this->input->post('paper_grade_id'), 
											$this->input->post('paper_subject_id'),
											$this->input->post('paper_cs_id')
										)
									);
								
				$this->load->view('admin/includes/_header');
				$this->load->view('admin/paper/paper_view_mcqs_double_both_unit', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
		else
		{
			$data['title'] = 'Generate Unit Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');				
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/unit_wise_paper');
			$this->load->view('admin/includes/_footer');
		}		
	}
	
	public function term_wise_paper()
	{		
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('paper_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('paper_subject_id', 'Subject', 'trim|required');
			$this->form_validation->set_rules('paper_term', 'Term', 'trim|required');
				
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/paper/term_wise_paper'),'refresh');
			}
			else{
				$term = $this->input->post('paper_term');
				//MCQ paper
				$data['paper_mcqs'] = array_merge(
										$this->Paper_model->get_term_wise_mcq(
											$this->input->post('paper_grade_id'), 
											$this->input->post('paper_subject_id'),
											$term
										),
										$this->Paper_model->get_term_wise_crq(
											$this->input->post('paper_grade_id'), 
											$this->input->post('paper_subject_id'),
											$term
										)
									);
				$data['term']	= 	$term;			
				$this->load->view('admin/includes/_header');
				$this->load->view('admin/paper/paper_view_mcqs_double_both_term', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
		else
		{
			$data['title'] = 'Generate Term Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');				
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/term_wise_paper');
			$this->load->view('admin/includes/_footer');
		}		
	}
	
	public function book_wise_paper()
	{		
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('paper_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('paper_subject_id', 'Subject', 'trim|required');
				
				
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/paper/book_wise_paper'),'refresh');
			}
			else{
				$term = $this->input->post('paper_term');
				//MCQ paper
				$data['paper_mcqs'] = array_merge(
										$this->Paper_model->get_book_wise_mcq(
											$this->input->post('paper_grade_id'), 
											$this->input->post('paper_subject_id')
										),
										$this->Paper_model->get_book_wise_crq(
											$this->input->post('paper_grade_id'), 
											$this->input->post('paper_subject_id')
										)
									);
				$this->load->view('admin/includes/_header');
				$this->load->view('admin/paper/paper_view_mcqs_double_both_book', $data);
				$this->load->view('admin/includes/_footer');
			}
		}
		else
		{
			$data['title'] = 'Generate Book Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');				
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/book_wise_paper');
			$this->load->view('admin/includes/_footer');
		}		
	}
	
//==Unit WIse Paper Listing (SM)====================================================================
	public function unit_wise_papers_listing()
	{
		$data['title'] = 'Unit Wise Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/unit_wise_papers_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_unit_wise_papers_list()
	{
		$records = $this->Paper_model->get_all_unit_wise_papers_listing();
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['cs_statement_en'],
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/unit_wise_papers_view/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_unit_wise_papers/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function delete_unit_wise_papers($id = 0)
	{
		$this->db->delete('ci_qat_papers', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/unit_wise_papers_listing'));
	}
	
	public function unit_wise_papers()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			$this->form_validation->set_rules('qat_cs_id', 'Paper Unit', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/unit_wise_papers'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				$cs_id = $this->input->post('qat_cs_id');
	
				$mcq_items = $this->Paper_model->get_unit_wise_mcq_ids($grade_id, $sub_id, $cs_id);
				$crq_sec2 = $this->Paper_model->get_unit_wise_crq_ids($grade_id, $sub_id, $cs_id, 5);
				$crq_sec3 = $this->Paper_model->get_unit_wise_crq_ids($grade_id, $sub_id, $cs_id, 1);
	
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_cs_id' => $cs_id,
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper($insert_data);
	
				if ($paper_id) {
					/*$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
	
					$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
					$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
					$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
	
					$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
					$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
					$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
					
					$this->load->view('admin/includes/_header');
					$this->load->view('admin/paper/unit_wise_papers_listing', $data);
					$this->load->view('admin/includes/_footer');*/
					
					$this->session->set_flashdata('success', 'Unit Wise Paper Generated Successfully.');
					redirect(base_url('admin/paper/unit_wise_papers_listing'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/unit_wise_papers'), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Generate Unit Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/unit_wise_papers');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function unit_wise_papers_view($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_sub_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function unit_wise_papers_view_answer_key($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_sub_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_answer_key');
		$this->load->view('admin/includes/_footer');
	}
	
//==Term WIse Paper Listing (SM)====================================================================
	public function term_wise_papers_listing()
	{
		$data['title'] = 'Term Wise Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/term_wise_papers_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_term_wise_papers_list()
	{
		$records = $this->Paper_model->get_all_term_wise_papers_listing();
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['qat_subcs_phase'],
				'<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/term_wise_papers_view/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/term_wise_papers_view_answer_key/'.$row['qat_id']).'">Answer Key</a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_term_wise_papers/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function add_term_wise_papers()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			$this->form_validation->set_rules('qat_subcs_phase', 'Paper Term', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/add_term_wise_papers'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				$qat_subcs_phase = $this->input->post('qat_subcs_phase');
	
				$mcq_items = $this->Paper_model->get_term_wise_mcq_ids($grade_id, $sub_id, $qat_subcs_phase);
				$crq_sec2 = $this->Paper_model->get_term_wise_erq_ids_sec_2($grade_id, $sub_id, $qat_subcs_phase, 5);
				$crq_sec3 = $this->Paper_model->get_term_wise_erq_ids_sec_3($grade_id, $sub_id, $qat_subcs_phase, 1);
	
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_subcs_phase' => $qat_subcs_phase,
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper($insert_data);
	
				if ($paper_id) {
					/*$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
					$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
					$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
					$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
					$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
					$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
					$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
					$this->load->view('admin/includes/_header');
					$this->load->view('admin/paper/unit_wise_papers_listing', $data);
					$this->load->view('admin/includes/_footer');*/
					
					$this->session->set_flashdata('success', 'Term Wise Paper Generated Successfully.');
					redirect(base_url('admin/paper/term_wise_papers_listing'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/add_term_wise_papers'), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Generate Term Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_term_wise_papers');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function delete_term_wise_papers($id = 0)
	{
		$this->db->delete('ci_qat_papers', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/term_wise_papers_listing'));
	}
	
	public function term_wise_papers_view($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function term_wise_papers_view_answer_key($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_answer_key', $data);
		$this->load->view('admin/includes/_footer');
	}
	
//==book WIse Paper Listing (SM)====================================================================
	public function book_wise_papers_listing()
	{
		$data['title'] = 'Book Wise Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/book_wise_papers_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_book_wise_papers_list()
	{
		$records = $this->Paper_model->get_all_book_wise_papers_listing();
		/*print '<pre>';
		print_r($records);
		die;*/
		/*$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];*/
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				'<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/book_wise_papers_view/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/book_wise_papers_view_answer_key/'.$row['qat_id']).'">Answer Key</a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_book_wise_papers/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function add_book_wise_papers()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			//$this->form_validation->set_rules('qat_subcs_phase', 'Paper Term', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/add_book_wise_papers'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				$qat_subcs_phase = $this->input->post('qat_subcs_phase');
	
				$mcq_items = $this->Paper_model->get_book_wise_mcq_ids($grade_id, $sub_id);
				$crq_sec2 = $this->Paper_model->get_book_wise_erq_ids_sec_2($grade_id, $sub_id, 5);
				$crq_sec3 = $this->Paper_model->get_book_wise_erq_ids_sec_3($grade_id, $sub_id, 1);
	
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper($insert_data);
	
				if ($paper_id) {
					/*$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
					$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
					$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
					$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
					$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
					$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
					$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
					$this->load->view('admin/includes/_header');
					$this->load->view('admin/paper/unit_wise_papers_listing', $data);
					$this->load->view('admin/includes/_footer');*/
					
					$this->session->set_flashdata('success', 'Book Wise Paper Generated Successfully.');
					redirect(base_url('admin/paper/book_wise_papers_listing'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/add_book_wise_papers'), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Generate Book Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_book_wise_papers');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function delete_book_wise_papers($id = 0)
	{
		$this->db->delete('ci_qat_papers', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/book_wise_papers_listing'));
	}
	
	public function book_wise_papers_view($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function book_wise_papers_view_answer_key($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_answer_key', $data);
		$this->load->view('admin/includes/_footer');
	}

//==Unit WIse Paper Listing (EU)====================================================================
	public function unit_wise_papers_listing_eu()
	{
		$data['title'] = 'Unit Wise Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/unit_wise_papers_list_eu');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_unit_wise_papers_list_eu()
	{
		$records = $this->Paper_model->get_all_unit_wise_papers_eu();
		/*print '<pre>';
		print_r($records);
		die;*/
		/*$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];*/
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['cs_statement_en'],
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/unit_wise_papers_view_eu/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_unit_wise_papers/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function delete_unit_wise_papers_eu($id = 0)
	{
		$this->db->delete('ci_qat_papers', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/unit_wise_papers_listing_eu'));
	}
	
	public function add_unit_wise_papers_eu()
	{
		if ($this->input->post('submit')) {
			//die('88');
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			$this->form_validation->set_rules('qat_cs_id', 'Paper Unit', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/add_unit_wise_papers_eu'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				$cs_id = $this->input->post('qat_cs_id');
	
				$mcq_items = $this->Paper_model->get_unit_wise_mcq_ids_eu($grade_id, $sub_id, $cs_id);
				$mcq_pg = $this->Paper_model->get_unit_wise_pg_mcq_ids_eu($grade_id, $sub_id, $cs_id);
				$crq_sec2 = $this->Paper_model->get_unit_wise_crq_ids_eu2($grade_id, $sub_id);
				$crq_sec3 = $this->Paper_model->get_unit_wise_crq_ids_eu3($grade_id, $sub_id);
				
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_cs_id' => $cs_id,
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					'qat_sec_1_para_id' => implode(',', $mcq_pg),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper($insert_data);
	
				if ($paper_id) {
					/*$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
	
					$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
					$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
					$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
	
					$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
					$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
					$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
					
					$this->load->view('admin/includes/_header');
					$this->load->view('admin/paper/unit_wise_papers_listing', $data);
					$this->load->view('admin/includes/_footer');*/
					
					$this->session->set_flashdata('success', 'Unit Wise Paper Generated Successfully.');
					redirect(base_url('admin/paper/unit_wise_papers_listing_eu'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/add_unit_wise_papers_eu'), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Generate Unit Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_unit_wise_papers_eu');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function unit_wise_papers_view_eu($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);
	
		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_para'] = $this->Paper_model->get_para_by_id_en($data['paper']['qat_sec_1_para_id']);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_eu', $data);
		$this->load->view('admin/includes/_footer');
	}

//==Term WIse Paper Listing (EU)====================================================================
	public function term_wise_papers_listing_eu()
	{
		$data['title'] = 'Term Wise Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/term_wise_papers_list_eu');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_unit_term_papers_list_eu()
	{
		$records = $this->Paper_model->get_all_term_wise_papers_eu();
		/*print '<pre>';
		print_r($records);
		die;*/
		/*$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];*/
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				'term',
				'<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/term_wise_papers_view_eu/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/term_wise_papers_view_eu_answer_key/'.$row['qat_id']).'">Answer Key</a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_term_wise_papers_eu/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function delete_term_wise_papers_eu($id = 0)
	{
		$this->db->delete('ci_qat_papers', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/term_wise_papers_listing_eu'));
	}
	
	public function add_term_wise_papers_eu()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total marks', 'trim|required');
			$this->form_validation->set_rules('qat_subcs_phase', 'Term', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/add_term_wise_papers_eu'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				$phase = $this->input->post('qat_subcs_phase');
	
				$mcq_items = $this->Paper_model->get_term_wise_mcq_ids_eu($grade_id, $sub_id, $phase);
				$mcq_pg = $this->Paper_model->get_term_wise_pg_mcq_ids_eu($grade_id, $sub_id, $phase);
				//$crq_sec2 = $this->Paper_model->get_term_wise_crq_ids_eu($grade_id, $sub_id, $phase, 2);
				//$crq_sec3 = $this->Paper_model->get_term_wise_crq_ids_eu($grade_id, $sub_id, $phase, 1);
				
				$crq_sec2 = $this->Paper_model->get_unit_wise_crq_ids_eu2($grade_id, $sub_id);
				$crq_sec3 = $this->Paper_model->get_unit_wise_crq_ids_eu3($grade_id, $sub_id);
	
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_subcs_phase' => $phase,
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					'qat_sec_1_para_id' => implode(',', $mcq_pg),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper($insert_data);
	
				if ($paper_id) {
					/*$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
	
					$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
					$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
					$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
	
					$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
					$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
					$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
					
					$this->load->view('admin/includes/_header');
					$this->load->view('admin/paper/unit_wise_papers_listing', $data);
					$this->load->view('admin/includes/_footer');*/
					
					$this->session->set_flashdata('success', 'Unit Wise Paper Generated Successfully.');
					redirect(base_url('admin/paper/term_wise_papers_listing_eu'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/add_term_wise_papers_eu'), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Generate Unit Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_term_wise_papers_eu');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function term_wise_papers_view_eu($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);
		
		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_para'] = $this->Paper_model->get_para_by_id_en($data['paper']['qat_sec_1_para_id']);
		//$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		//$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_eu', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function term_wise_papers_view_eu_answer_key($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);
		
		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_para'] = $this->Paper_model->get_para_by_id_en($data['paper']['qat_sec_1_para_id']);
		//$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		//$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_eu_answer_key', $data);
		$this->load->view('admin/includes/_footer');
	}
	
//==book WIse Paper Listing (EU)====================================================================
	public function book_wise_papers_listing_eu()
	{
		$data['title'] = 'Book Wise Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/book_wise_papers_list_eu');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_book_wise_papers_list_eu()
	{
		$records = $this->Paper_model->get_all_book_wise_papers_listing_eu();
		/*print '<pre>';
		print_r($records);
		die;*/
		/*$english_subjects 	= [4,8,12,18,25,31,39,47];
		$urdu_subjects 		= [5,9,13,19,26,32,40,48,65,66,67];*/
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				'<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/book_wise_papers_view_eu/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/book_wise_papers_view_eu_answer_key/'.$row['qat_id']).'">Answer Key</a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_book_wise_papers/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function add_book_wise_papers_eu()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			//$this->form_validation->set_rules('qat_subcs_phase', 'Paper Term', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/add_book_wise_papers_eu'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				//$qat_subcs_phase = $this->input->post('qat_subcs_phase');
				$mcq_items = $this->Paper_model->get_book_wise_mcq_ids_eu($grade_id, $sub_id);
				$mcq_pg = $this->Paper_model->get_book_wise_pg_mcq_ids_eu($grade_id, $sub_id);
				//$crq_sec2 = $this->Paper_model->get_book_wise_erq_ids_sec_2_eu($grade_id, $sub_id);
				//$crq_sec3 = $this->Paper_model->get_book_wise_erq_ids_sec_3_eu($grade_id, $sub_id);
				$crq_sec2 = $this->Paper_model->get_unit_wise_crq_ids_eu2($grade_id, $sub_id);
				$crq_sec3 = $this->Paper_model->get_unit_wise_crq_ids_eu3($grade_id, $sub_id);
	
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					'qat_sec_1_para_id' => implode(',', $mcq_pg),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper($insert_data);
	
				if ($paper_id) {
					/*$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
					$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
					$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
					$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
					$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
					$data['paper_crqs_sec2'] = $this->Paper_model->get_items_by_ids($crq2_ids);
					$data['paper_crqs_sec3'] = $this->Paper_model->get_items_by_ids($crq3_ids);
					$this->load->view('admin/includes/_header');
					$this->load->view('admin/paper/unit_wise_papers_listing', $data);
					$this->load->view('admin/includes/_footer');*/
					
					$this->session->set_flashdata('success', 'Book Wise Paper Generated Successfully.');
					redirect(base_url('admin/paper/book_wise_papers_listing_eu'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/add_book_wise_papers_eu'), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Generate Book Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_book_wise_papers_eu');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function delete_book_wise_papers_eu($id = 0)
	{
		$this->db->delete('ci_qat_papers', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/book_wise_papers_listing_eu'));
	}
	
	public function book_wise_papers_view_eu($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_para'] = $this->Paper_model->get_para_by_id_en($data['paper']['qat_sec_1_para_id']);
		//$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		//$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_eu', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function book_wise_papers_view_eu_answer_key($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_paper_by_id($paper_id);
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);

		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_para'] = $this->Paper_model->get_para_by_id_en($data['paper']['qat_sec_1_para_id']);
		//$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		//$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_eu_answer_key', $data);
		$this->load->view('admin/includes/_footer');
	}

//===========================================================================================
	public function sub_unit_wise_papers_listing_eu()
	{
		$data['title'] = 'Unit Wise Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/sub_unit_wise_papers_list_eu');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_unit_wise_papers_list_eu_sub()
	{
		$records = $this->Paper_model->get_all_sub_unit_wise_papers_listing_eu();
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['cs_statement_en'].'-'.$row['cs_statement_ur'],
				$row['subcs_topic_en'].'-'.$row['subcs_topic_ur'],
				'<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/sub_unit_wise_papers_view_eu/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/sub_unit_wise_papers_view_eu_answer_key/'.$row['qat_id']).'">Answer Key</a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_sub_unit_wise_papers_eu/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function add_sub_unit_wise_papers_eu()
	{
		if ($this->input->post('submit')) {
			//die('88');
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			$this->form_validation->set_rules('qat_cs_id', 'Paper Unit', 'trim|required');
			//$this->form_validation->set_rules('qat_subcs_id', 'Paper Unit', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/add_sub_unit_wise_papers_eu'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				$cs_id = $this->input->post('qat_cs_id');
				$subcs_id = $this->input->post('qat_subcs_id');
				
				$mcq_items = $this->Paper_model->get_sub_unit_wise_mcq_ids_eu($grade_id, $sub_id, $cs_id, $subcs_id);
				$mcq_pg = $this->Paper_model->get_unit_wise_pg_mcq_ids_eu($grade_id, $sub_id, $cs_id);
				$crq_sec2 = $this->Paper_model->get_unit_wise_crq_ids_eu2($grade_id, $sub_id);
				$crq_sec3 = $this->Paper_model->get_unit_wise_crq_ids_eu3($grade_id, $sub_id);
				
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_cs_id' => $cs_id,
					'qat_subcs_id' => implode(',', $subcs_id),
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					'qat_sec_1_para_id' => implode(',', $mcq_pg),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper_sub($insert_data);
	
				if ($paper_id) {
					$this->session->set_flashdata('success', 'Unit Wise Paper Generated Successfully (SUB).');
					redirect(base_url('admin/paper/sub_unit_wise_papers_listing_eu'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/sub_unit_wise_papers_listing_eu'), 'refresh');
				}
			}
		} else {
			$data['title'] = 'Generate Unit Wise Paper (SUB)';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_sub_unit_wise_papers_eu');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function sub_unit_wise_papers_view_eu($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_sub_paper_by_id($paper_id);
		
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);
	
		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_para'] = $this->Paper_model->get_para_by_id_en($data['paper']['qat_sec_1_para_id']);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
				$this->load->view('admin/includes/_header');
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_eu', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function sub_unit_wise_papers_view_eu_answer_key($paper_id)
	{
		$data['paper'] = $this->Paper_model->get_qat_sub_paper_by_id($paper_id);
		
		$mcq_ids  = explode(',', $data['paper']['qat_sec_1_qes_ids']);
		$crq2_ids = explode(',', $data['paper']['qat_sec_2_qes_ids']);
		$crq3_ids = explode(',', $data['paper']['qat_sec_3_qes_ids']);
		
		$data['subject'] = $this->Paper_model->get_sub_name($data['paper']['qat_sub_id']);
		$data['grade'] = $this->Paper_model->get_grade_name($data['paper']['qat_grade_id']);
	
		$data['paper_mcqs'] = $this->Paper_model->get_items_by_ids($mcq_ids);
		$data['paper_para'] = $this->Paper_model->get_para_by_id_en($data['paper']['qat_sec_1_para_id']);
		$data['paper_crqs_sec2'] = $this->Paper_model->get_sec2_by_id_en($crq2_ids);
		$data['paper_crqs_sec3'] = $this->Paper_model->get_sec2_by_id_en($crq3_ids);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/paper_view_mcqs_double_both_unit_eu_answer_key');
		$this->load->view('admin/includes/_footer');
	}
	
	public function delete_sub_unit_wise_papers_eu($id = 0)
	{
		$this->db->delete('ci_qat_papers_sub', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/sub_unit_wise_papers_listing_eu'));
	}
//=============================================================	
	public function sub_unit_wise_papers_listing()
	{
		$data['title'] = 'Unit Wise Papers List (SUB)';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/paper/sub_unit_wise_papers_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_sub_unit_wise_papers_list()
	{
		$records = $this->Paper_model->get_all_sub_unit_wise_papers_listing();
		
		$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{
			$dropdownblock = '';
			
			$data[]= array(
				++$i,
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['cs_statement_en'].'-'.$row['cs_statement_ur'],
				$row['subcs_topic_en'].'-'.$row['subcs_topic_ur'],
				'<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/unit_wise_papers_view/'.$row['qat_id']).'"> <i class="fa fa-eye"></i></a> <a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/paper/unit_wise_papers_view_answer_key/'.$row['qat_id']).'">Answer Key</a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/paper/delete_sub_unit_wise_papers/".$row['qat_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	
	public function add_sub_unit_wise_papers()
	{
		if ($this->input->post('submit')) 
		{
			$this->form_validation->set_rules('qat_grade_id', 'Paper Grade', 'trim|required');
			$this->form_validation->set_rules('qat_sub_id', 'Paper Subject', 'trim|required');
			$this->form_validation->set_rules('qat_cs_id', 'Paper Unit', 'trim|required');
			$this->form_validation->set_rules('qat_cs_id', 'Paper Unit', 'trim|required');
			$this->form_validation->set_rules('qat_total_marks', 'Total Marks', 'trim|required|numeric');
			$this->form_validation->set_rules('qat_total_time', 'Total Time', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_1_statement_eng', 'Section 1 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_statement_ur', 'Section 1 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_1_marks', 'Section 1 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_1_submarks', 'Section 1 Sub Marks', 'trim|required');
	
			$this->form_validation->set_rules('qat_sec_2_statement_eng', 'Section 2 Statement (ENG)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_statement_ur', 'Section 2 Statement (UR)', 'trim|required');
			$this->form_validation->set_rules('qat_sec_2_marks', 'Section 2 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_2_submarks', 'Section 2 Sub Marks', 'trim|required');
	
			//$this->form_validation->set_rules('qat_sec_3_statement_eng', 'Section 3 Statement (ENG)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_statement_ur', 'Section 3 Statement (UR)', 'trim|required');
			//$this->form_validation->set_rules('qat_sec_3_marks', 'Section 3 Marks', 'trim|required|numeric');
			//$this->form_validation->set_rules('qat_sec_3_submarks', 'Section 3 Sub Marks', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/paper/unit_wise_papers'), 'refresh');
			} else {
				$grade_id = $this->input->post('qat_grade_id');
				$sub_id = $this->input->post('qat_sub_id');
				$cs_id = $this->input->post('qat_cs_id');
				$subcs_id = $this->input->post('qat_subcs_id');
	
				$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
				$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48, 65, 66, 67];
				
				if (in_array($sub_id, $english_subjects) || in_array($sub_id, $urdu_subjects)) {
					$mcq_items = $this->Paper_model->get_sub_unit_wise_mcq_ids_eu($grade_id, $sub_id, $cs_id, $subcs_id);
				} else {
					$mcq_items = $this->Paper_model->get_sub_unit_wise_mcq_ids_sm($grade_id, $sub_id, $cs_id, $subcs_id);
				}
				$crq_sec2 = $this->Paper_model->get_unit_wise_crq_ids($grade_id, $sub_id, $cs_id, 5);
				$crq_sec3 = $this->Paper_model->get_unit_wise_crq_ids($grade_id, $sub_id, $cs_id, 1);
	
				$insert_data = array(
					'qat_grade_id' => $grade_id,
					'qat_sub_id' => $sub_id,
					'qat_cs_id' => $cs_id,
					'qat_subcs_id' => implode(',', $subcs_id),
					'qat_test_number' => $this->input->post('qat_test_number'),
					
					'qat_sec_1_title_en' => $this->input->post('qat_sec_1_title_en'),
					'qat_sec_1_title_ur' => $this->input->post('qat_sec_1_title_ur'),
					'qat_sec_1_statement_eng' => $this->input->post('qat_sec_1_statement_eng'),
					'qat_sec_1_statement_ur' => $this->input->post('qat_sec_1_statement_ur'),
					'qat_sec_1_marks' => $this->input->post('qat_sec_1_marks'),
					'qat_sec_1_submarks' => $this->input->post('qat_sec_1_submarks'),
					'qat_sec_1_qes_ids' => implode(',', $mcq_items),
					
					'qat_sec_2_title_en' => $this->input->post('qat_sec_2_title_en'),
					'qat_sec_2_title_ur' => $this->input->post('qat_sec_2_title_ur'),
					'qat_sec_2_statement_eng' => $this->input->post('qat_sec_2_statement_eng'),
					'qat_sec_2_statement_ur' => $this->input->post('qat_sec_2_statement_ur'),
					'qat_sec_2_marks' => $this->input->post('qat_sec_2_marks'),
					'qat_sec_2_submarks' => $this->input->post('qat_sec_2_submarks'),
					'qat_sec_2_qes_ids' => implode(',', $crq_sec2),
					
					'qat_sec_3_title_en' => $this->input->post('qat_sec_3_title_en'),
					'qat_sec_3_title_ur' => $this->input->post('qat_sec_3_title_ur'),
					'qat_sec_3_statement_eng' => $this->input->post('qat_sec_3_statement_eng'),
					'qat_sec_3_statement_ur' => $this->input->post('qat_sec_3_statement_ur'),
					'qat_sec_3_marks' => $this->input->post('qat_sec_3_marks'),
					'qat_sec_3_submarks' => $this->input->post('qat_sec_3_submarks'),
					'qat_sec_3_qes_ids' => implode(',', $crq_sec3),
					
					'qat_total_marks' => $this->input->post('qat_total_marks'),
					'qat_total_time' => $this->input->post('qat_total_time'),
					'qat_created_by' => $this->session->userdata('admin_id')
				);
	
				$paper_id = $this->Paper_model->insert_qat_paper_sub($insert_data);
	
				if ($paper_id) {
					$this->session->set_flashdata('success', 'Unit Wise Paper Generated Successfully.');
					redirect(base_url('admin/paper/sub_unit_wise_papers_listing'), 'refresh');
					
				} else {
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/paper/add_sub_unit_wise_papers'), 'refresh');
				}
			}
		} 
		else 
		{
			$data['title'] = 'Generate Unit Wise Paper';
			$data['grades'] = $this->Paper_model->get_all_grades_have_itembanks_final('MCQ');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/paper/add_sub_unit_wise_papers');
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function delete_sub_unit_wise_papers($id = 0)
	{
		$this->db->delete('ci_qat_papers_sub', array('qat_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper/sub_unit_wise_papers_listing'));
	}
	
}
?>
<?php /*?><a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/paper/edit/'.$row['qat_id']).'"> <i class="fa fa-pencil-square-o"></i></a><?php */?>