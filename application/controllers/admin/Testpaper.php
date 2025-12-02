<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Testpaper extends MY_Controller {

	public function __construct(){
		parent::__construct();		
		auth_check(); // check login auth
		$this->load->model('admin/Testpaper_model', 'Testpaper_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
		$this->load->helper('prince');//local
		//$this->load->helper('pdf');//online
		$this->load->library('user_agent');
	}
	
	public function index(){
		$data['title'] = 'Test Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/testpaper/test_paper_listing');
		$this->load->view('admin/includes/_footer');
	}
	
	public function test_paper_listing()
	{
		$data['title'] = 'Test Papers List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/testpaper/test_paper_listing');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json_book_test_paper_list()
	{
		$records = $this->Testpaper_model->get_all_test_papers_listing();
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
				$row['tp_noofmcq'],
				$row['tp_noofshortquestions'],
				$row['tp_nooflongquestions'],
				/*<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/testpaper/test_paper_view/'.$row['tp_id']).'"><i class="fa fa-eye"></i> A</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/testpaper/test_paper_view_b/'.$row['tp_id']).'"><i class="fa fa-eye"></i> B</a> 
				<a target="_blank" title="View" class="view btn btn-sm btn-info marginfive" href="'.base_url('admin/testpaper/test_paper_key/'.$row['tp_id']).'"><i class="fa fa-eye"></i> AK</a><br>*/
				
				'<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/testpaper/test_paper_view_pdf/'.$row['tp_id']).'"><i class="fa fa-file-pdf-o"></i> A</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/testpaper/test_paper_view_b_pdf/'.$row['tp_id']).'"><i class="fa fa-file-pdf-o"></i> B</a>
				<a target="_blank" title="View" class="view btn btn-sm btn-warning marginfive" href="'.base_url('admin/testpaper/test_paper_key_pdf/'.$row['tp_id']).'"><i class="fa fa-file-pdf-o"></i> AK</a>
				
				<a title="Delete" class="delete btn btn-sm btn-danger marginfive" href='.base_url("admin/testpaper/delete_test_testpaper/".$row['tp_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);
	}
	public function subjects_by_grade()
	{
		echo json_encode($this->Testpaper_model->get_subjects_by_grade($this->input->post('grade_id')));	
	}
	
	public function cstand_by_subjects()
	{
		echo json_encode($this->Testpaper_model->get_cstand_by_subjects($this->input->post('subject_id')));	
	}
	
	public function subcstand_by_subjects()
	{
		echo json_encode($this->Testpaper_model->get_subcstand_by_subjects($this->input->post('subject_id')));	
	}
	
	/*public function add_test_paper()
	{
		 if ($this->input->post('submit')) 
		 {
			  $this->form_validation->set_rules('tp_grade_id', 'Grade', 'trim|required');
			  $this->form_validation->set_rules('tp_subject_id', 'Subject', 'trim|required');
			  $this->form_validation->set_rules('tp_noofmcq', 'No. of MCQs', 'trim|required'); 
			  $this->form_validation->set_rules('tp_mcq_mark_per_question', 'Marks per MCQs', 'trim|required');
			  $this->form_validation->set_rules('tp_mcq_total_marks', 'MCQs Total Marks', 'trim|required');
			  $this->form_validation->set_rules('tp_mcq_heading', 'MCQs Heading', 'trim|required');
			  
			  $this->form_validation->set_rules('tp_noofshortquestions', 'No. of Short Questions', 'trim|required');
			  $this->form_validation->set_rules('tp_sq_mark_per_question', 'Marks per Short Question', 'trim|required');
			  $this->form_validation->set_rules('tp_sq_total_marks', 'Short Question Total Marks', 'trim|required');
			  $this->form_validation->set_rules('tp_sq_heading', 'MCQs Heading', 'trim|required');
			  
			  $this->form_validation->set_rules('tp_nooflongquestions', 'No. of Long Questions', 'trim|required');
			  $this->form_validation->set_rules('tp_lq_mark_per_question', 'Marks per Long Question', 'trim|required');
			  $this->form_validation->set_rules('tp_lq_total_marks', 'Long Questions Total Marks', 'trim|required');
			  $this->form_validation->set_rules('tp_lq_heading', 'Long Questions Heading', 'trim|required');
			  
			  if ($this->form_validation->run() == FALSE) 
			  {
					$this->session->set_flashdata('errors', validation_errors());
					redirect(base_url('admin/testpaper/add_test_paper'), 'refresh');
			  } 
			  else 
			  {
					$tp_grade_id   = $this->input->post('tp_grade_id');
					$tp_subject_id = $this->input->post('tp_subject_id');
					$tp_subcstand_id = $this->input->post('tp_subcstand_id');
					//$tp_slo_id     = $this->input->post('tp_slo_id');
	
					$tp_subcstand_id = 0;
					if (!empty($tp_subcstand_id)) {
						 $tp_subcstand_id = implode(',', $tp_subcstand_id);
					}
	
					// Insert model paper main record
					$insert_data = array(
						 'tp_grade_id'            	=> $tp_grade_id,
						 'tp_subject_id'          	=> $tp_subject_id,
						 'tp_subcstand_id'        	=> $tp_subcstand_id,
						 //'tp_slo_id'              	=> $tp_slo_ids,
						 'tp_noofmcq'             	=> $this->input->post('tp_noofmcq'),
						 'tp_mcq_mark_per_question'=> $this->input->post('tp_mcq_mark_per_question'),
						 'tp_mcq_total_marks'      => $this->input->post('tp_mcq_total_marks'),
						 'tp_mcq_heading'          => $this->input->post('tp_mcq_heading'), 
						                 
						 'tp_noofshortquestions'  	=> $this->input->post('tp_noofshortquestions'),
						 'tp_sq_mark_per_question' => $this->input->post('tp_sq_mark_per_question'),
						 'tp_sq_total_marks'       => $this->input->post('tp_sq_total_marks'),
						 'tp_sq_heading'           => $this->input->post('tp_sq_heading'),
						 
						 'tp_nooflongquestions'   	=> $this->input->post('tp_nooflongquestions'),
						 'tp_lq_mark_per_question' => $this->input->post('tp_lq_mark_per_question'),
						 'tp_lq_total_marks'       => $this->input->post('tp_lq_total_marks'),
						 'tp_lq_heading'           => $this->input->post('tp_lq_heading'),
					);
	
					$tp_id = $this->Testpaper_model->insert_test_paper($insert_data);
	
					if ($tp_id) 
					{
						 // Decide which chapters to use
						 if (empty($tp_subcstand_id) || $tp_subcstand_id == 0) {
							  $chapters = $this->Testpaper_model->get_all_item_subcstands($tp_grade_id, $tp_subject_id, $tp_slo_ids);
						 } else {
							  $chapters = [$tp_subcstand_id];
						 }
	
						 $mcqsQuestions  = [];
						 $shortQuestions = [];
						 $longQuestions  = [];
	
						 foreach ($chapters as $chapter_id) {
							  $mcqs  = $this->Testpaper_model->get_items(
									$tp_grade_id,
									$tp_subject_id,
									$chapter_id,
									$this->input->post('tp_noofmcq'),
									$tp_slo_ids,
									'mcq'
							  );
	
							  $short = $this->Testpaper_model->get_items(
									$tp_grade_id,
									$tp_subject_id,
									$chapter_id,
									$this->input->post('tp_noofshortquestions'),
									$tp_slo_ids,
									'short'
							  );
	
							  $long  = $this->Testpaper_model->get_items(
									$tp_grade_id,
									$tp_subject_id,
									$chapter_id,
									$this->input->post('tp_nooflongquestions'),
									$tp_slo_ids,
									'long'
							  );
	
							  $mcqsQuestions  = array_merge($mcqsQuestions, $mcqs);
							  $shortQuestions = array_merge($shortQuestions, $short);
							  $longQuestions  = array_merge($longQuestions, $long);
						 }
	
						 // Save details (with tpd_subcstand_id)
						 $this->Testpaper_model->save_test_paper_details($tp_id, $mcqsQuestions, $shortQuestions, $longQuestions);
	
						 $this->session->set_flashdata('success', 'Test Paper Generated Successfully.');
						 redirect(base_url('admin/testpaper/test_paper_listing'), 'refresh');
					} 
					else 
					{
						 $this->session->set_flashdata('errors', 'Error inserting paper data.');
						 redirect(base_url('admin/testpaper/add_test_paper'), 'refresh');
					}
			  }
		 } 
		 else 
		 {
			  $data['title']    = 'Generate Test Paper';
			  $data['grades']   = $this->Testpaper_model->get_all_grades();
			  $data['subjects'] = $this->Testpaper_model->get_all_subjects();
			  $this->load->view('admin/includes/_header', $data);
			  $this->load->view('admin/testpaper/add_test_paper');
			  $this->load->view('admin/includes/_footer');
		 }
	}*/
	
	public function add_test_paper()
	{
		if ($this->input->post('submit')) 
		{
			$this->form_validation->set_rules('tp_grade_id', 'Grade', 'trim|required');
			$this->form_validation->set_rules('tp_subject_id', 'Subject', 'trim|required');
	
			$this->form_validation->set_rules('tp_noofmcq', 'No. of MCQs', 'trim|required'); 
			$this->form_validation->set_rules('tp_mcq_mark_per_question', 'Marks per MCQs', 'trim|required');
			$this->form_validation->set_rules('tp_mcq_total_marks', 'MCQs Total Marks', 'trim|required');
			$this->form_validation->set_rules('tp_mcq_heading', 'MCQs Heading', 'trim|required');
	
			$this->form_validation->set_rules('tp_noofshortquestions', 'No. of Short Questions', 'trim|required');
			$this->form_validation->set_rules('tp_sq_mark_per_question', 'Marks per Short Question', 'trim|required');
			$this->form_validation->set_rules('tp_sq_total_marks', 'Short Question Total Marks', 'trim|required');
			$this->form_validation->set_rules('tp_sq_heading', 'Short Questions Heading', 'trim|required');
	
			$this->form_validation->set_rules('tp_nooflongquestions', 'No. of Long Questions', 'trim|required');
			$this->form_validation->set_rules('tp_lq_mark_per_question', 'Marks per Long Question', 'trim|required');
			$this->form_validation->set_rules('tp_lq_total_marks', 'Long Questions Total Marks', 'trim|required');
			$this->form_validation->set_rules('tp_lq_heading', 'Long Questions Heading', 'trim|required');
	
			if ($this->form_validation->run() == FALSE) 
			{
				$this->session->set_flashdata('errors', validation_errors());
				redirect(base_url('admin/testpaper/add_test_paper'), 'refresh');
			} 
			else 
			{
				$tp_grade_id   = $this->input->post('tp_grade_id');
				$tp_subject_id = $this->input->post('tp_subject_id');
	
				// multiple chapters
				$tp_subcstand_id_arr = $this->input->post('tp_subcstand_id');
				$tp_subcstand_id = 0;
	
				if (!empty($tp_subcstand_id_arr)) {
					$tp_subcstand_id = implode(',', $tp_subcstand_id_arr);
				}
	
				// insert test paper main record
				$insert_data = array(
					'tp_grade_id'             => $tp_grade_id,
					'tp_subject_id'           => $tp_subject_id,
					'tp_subcstand_id'         => $tp_subcstand_id,
	
					'tp_noofmcq'              => $this->input->post('tp_noofmcq'),
					'tp_mcq_mark_per_question'=> $this->input->post('tp_mcq_mark_per_question'),
					'tp_mcq_total_marks'      => $this->input->post('tp_mcq_total_marks'),
					'tp_mcq_heading'          => $this->input->post('tp_mcq_heading'),
	
					'tp_noofshortquestions'   => $this->input->post('tp_noofshortquestions'),
					'tp_sq_mark_per_question' => $this->input->post('tp_sq_mark_per_question'),
					'tp_sq_total_marks'       => $this->input->post('tp_sq_total_marks'),
					'tp_sq_heading'           => $this->input->post('tp_sq_heading'),
	
					'tp_nooflongquestions'    => $this->input->post('tp_nooflongquestions'),
					'tp_lq_mark_per_question' => $this->input->post('tp_lq_mark_per_question'),
					'tp_lq_total_marks'       => $this->input->post('tp_lq_total_marks'),
					'tp_lq_heading'           => $this->input->post('tp_lq_heading'),
				);
	
				$tp_id = $this->Testpaper_model->insert_test_paper($insert_data);
	
				if ($tp_id)
				{
					// if chapters selected → use them
					// else → use all chapters
					if (!empty($tp_subcstand_id_arr)) {
						$chapters = $tp_subcstand_id_arr;
					} else {
						$chapters = $this->Testpaper_model->get_all_item_subcstands($tp_grade_id, $tp_subject_id);
					}
	
					// pools
					$all_mcqs  = [];
					$all_sqs   = [];
					$all_lqs   = [];
	
					// collect from each chapter
					foreach ($chapters as $chapter_id) 
					{
						$all_mcqs = array_merge(
							$all_mcqs,
							$this->Testpaper_model->get_items($tp_grade_id, $tp_subject_id, $chapter_id, 0, null, 'mcq')
						);
	
						$all_sqs = array_merge(
							$all_sqs,
							$this->Testpaper_model->get_items($tp_grade_id, $tp_subject_id, $chapter_id, 0, null, 'short')
						);
	
						$all_lqs = array_merge(
							$all_lqs,
							$this->Testpaper_model->get_items($tp_grade_id, $tp_subject_id, $chapter_id, 0, null, 'long')
						);
					}
	
					// shuffle pools
					shuffle($all_mcqs);
					shuffle($all_sqs);
					shuffle($all_lqs);
	
					// pick required amounts
					$mcqsQuestions  = array_slice($all_mcqs, 0, (int)$this->input->post('tp_noofmcq'));
					$shortQuestions = array_slice($all_sqs, 0, (int)$this->input->post('tp_noofshortquestions'));
					$longQuestions  = array_slice($all_lqs, 0, (int)$this->input->post('tp_nooflongquestions'));
	
					// save details
					$this->Testpaper_model->save_test_paper_details(
						$tp_id,
						$mcqsQuestions,
						$shortQuestions,
						$longQuestions
					);
	
					$this->session->set_flashdata('success', 'Test Paper Generated Successfully.');
					redirect(base_url('admin/testpaper/test_paper_listing'), 'refresh');
				}
				else 
				{
					$this->session->set_flashdata('errors', 'Error inserting paper data.');
					redirect(base_url('admin/testpaper/add_test_paper'), 'refresh');
				}
			}
		} 
		else 
		{
			$data['title']    = 'Generate Test Paper';
			$data['grades']   = $this->Testpaper_model->get_all_grades();
			$data['subjects'] = $this->Testpaper_model->get_all_subjects();
	
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/testpaper/add_test_paper');
			$this->load->view('admin/includes/_footer');
		}
	}

	public function test_paper_view($tp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Testpaper_model->get_test_paper($tp_id);
		$data['items'] = $this->Testpaper_model->get_test_paper_question_detail($tp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		echo '<pre>';
		print_r($data['modelpaperinfo']);
		echo '<hr>';
		print_r($data['items']);
		die();
		$data['title'] = 'Test Paper Preview';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/testpaper/paper_view_test');
		$this->load->view('admin/includes/_footer');	
	}
	
	/*public function test_paper_view_pdf($paper_id)
	{
		$data['modelpaperinfo'] = $this->Testpaper_model->get_test_paper($tp_id);
		$data['items'] = $this->Testpaper_model->get_test_paper_question_detail($tp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;
		
		$pdfname = 'book_wise_' . time() . '.pdf';
	
		 $options = [];
	
		 generate_pdf($this, 'admin/paper/paper_view_test_pdf', $data, $pdfname, $options);
	}*/
	
	public function test_paper_view_pdf($tp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Testpaper_model->get_test_paper($tp_id);
		$data['items'] = $this->Testpaper_model->get_test_paper_question_detail($tp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$pdfname = 'test_paper_'.$tp_id.'_' . time() . '.pdf';
	
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
	
		 generate_pdf($this, 'admin/testpaper/paper_view_test_pdf', $data, $pdfname, $options);
	}
	
	public function test_paper_view_b_pdf($tp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Testpaper_model->get_test_paper($tp_id);
		$data['items'] = $this->Testpaper_model->get_test_paper_question_detail($tp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$pdfname = 'test_paper_'.$tp_id.'_' . time() . '.pdf';
	
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
	
		 generate_pdf($this, 'admin/testpaper/paper_view_test_b_pdf', $data, $pdfname, $options);
	}
	
	
//==================================================================================================================================	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function test_paper_key($tp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Testpaper_model->get_test_paper($tp_id);
		$data['items'] = $this->Testpaper_model->get_test_paper_question_detail($tp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$data['title'] = 'Test Paper Preview';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/testpaper/test_paper_key');
		$this->load->view('admin/includes/_footer');	
	}
	
	public function test_paper_key_pdf($tp_id, $slostatement = 0, $answerkey = 0)
	{
		$data['modelpaperinfo'] = $this->Testpaper_model->get_test_paper($tp_id);
		$data['items'] = $this->Testpaper_model->get_test_paper_question_detail($tp_id);
		$data['slostatement'] = $slostatement;	
		$data['answerkey'] = $answerkey;	
		
		$pdfname = 'test_paper_'.$tp_id.'_' . time() . '.pdf';
	
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
	
		 generate_pdf($this, 'admin/testpaper/test_paper_key_pdf', $data, $pdfname, $options);
	}
	
	public function delete_test_paper($id = 0)
	{
		$this->db->delete('ci_test_paper', array('tp_id' => $id));
		$this->db->delete('ci_test_paper_detail', array('tpd_tp_id' => $id));
		$this->session->set_flashdata('success', 'Paper has been deleted successfully!');
		redirect(base_url('admin/paper'));
	}
	
	public function delete_test_paper_question($tp_id, $item_id)
	{
		$this->db->delete('ci_test_paper_detail', array('tpd_tp_id' => $tp_id,'tpd_item_id' => $item_id));
		$this->session->set_flashdata('success', 'Paper question has been deleted successfully!');
		redirect($this->agent->referrer());
	}
	
	
	
	public function slo_by_cstand()
	{
		echo json_encode($this->Testpaper_model->get_slo_by_cstand($this->input->post('subject_id')));	
	}
	
	
	
	public function slo_by_subcstand()
	{
		echo json_encode($this->Testpaper_model->get_slo_by_subcstand($this->input->post('tp_subcstand_id')));	
	}
	
	
}
?>