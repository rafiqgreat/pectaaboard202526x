<?php
	class Testpaper_model extends CI_Model{
		
		public function get_all_test_papers_listing()
		{
			$wh = [];		
			$SQL = "
				SELECT 
					m.*,
					g.grade_name_en,
					s.subject_name_en,
					c.subcs_topic_en,
					c.subcs_topic_ur
				FROM ci_test_paper m
				LEFT JOIN ci_grades g ON m.tp_grade_id = g.grade_id
				LEFT JOIN ci_subjects s ON m.tp_subject_id = s.subject_id
				LEFT JOIN ci_subcontent_stands c ON m.tp_subcstand_id = c.subcs_id
			";
			$WHERE = implode(' AND ', $wh);
		
			return $this->datatable->LoadJson($SQL, $WHERE);			
		}
		
		public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en')
					 ->from('ci_grades')	
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}	
		
		function get_subjects_by_grade($grade_id)
		{
			$this->db->select('subject_id,subject_name_en,grade_code')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		function get_cstand_by_subjects($subject_id)
		{
			$this->db->select('cs_id, cs_statement_en, cs_statement_ur, cs_number')
					 ->from('ci_content_stands')
					 ->where('cs_subject_id', $subject_id)
					 ->where('cs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		function get_subcstand_by_subjects($subject_id)
		{
			$this->db->select('subcs_id, subcs_number, subcs_topic_en, subcs_topic_ur')
					 ->from('ci_subcontent_stands')
					 ->where('subcs_subject_id', $subject_id)
					 ->where('subcs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		function get_slo_by_cstand($slo_cstand_id)
		{
			$this->db->select('slo_id, slo_statement_en, slo_statement_ur')
					 ->from('ci_slos')
					 ->where('slo_cstand_id', $slo_cstand_id)
					 ->where('slo_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		function get_slo_by_subcstand($slo_subcstand_id)
		{
			$this->db->select('slo_id, slo_statement_en, slo_statement_ur')
					 ->from('ci_slos')
					 ->where('slo_subcstand_id', $slo_subcstand_id)
					 ->where('slo_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		public function insert_test_paper($data)
		{
			$this->db->insert('ci_test_paper', $data);
			return $this->db->insert_id();
		}
		
		public function get_items($item_grade_id, $item_subject_id, $item_subcstand_id, $limit, $item_slo_ids, $questiontype)
		{
			 $this->db->select('item_id, item_slo_id, item_subcstand_id');
			 $this->db->from('ci_items_pilot');
			 $this->db->where('item_grade_id', $item_grade_id);
			 $this->db->where('item_subject_id', $item_subject_id);
		
			 if ($item_subcstand_id != 0) {
				  $this->db->where('item_subcstand_id', $item_subcstand_id);
			 }
		
			 if ($item_slo_ids != 0) {
				  $this->db->where("item_slo_id IN ($item_slo_ids)");
			 }
		
			 if ($questiontype == 'mcq') {
				  $this->db->where('item_type', 'MCQ');
			 }
			 if ($questiontype == 'short') {
				  $this->db->where('item_type', 'ERQ');
				  $this->db->where('item_total_marks', 2);
			 }
			 if ($questiontype == 'long') {
				  $this->db->where('item_type', 'ERQ');
				  $this->db->where('item_total_marks > 2');
			 }
		
			 $this->db->order_by('RAND()');
			 //$this->db->limit($limit);
		
			 $query = $this->db->get();
			 return $query->result_array();
		}

		
		public function get_all_item_subcstands($grade_id, $subject_id, $slo_ids = 0)
		{
			 $this->db->distinct();
			 $this->db->select('item_subcstand_id');
			 $this->db->from('ci_items_pilot');
			 $this->db->where('item_grade_id', $grade_id);
			 $this->db->where('item_subject_id', $subject_id);
		
			 if ($slo_ids != 0) {
				  $this->db->where("item_slo_id IN ($slo_ids)");
			 }
		
			 $query = $this->db->get();
			 $rows = $query->result_array();
			 return array_column($rows, 'item_subcstand_id');
		}
		public function save_test_paper_details($tp_id, $mcqsQuestions, $shortQuestions, $longQuestions)
		{
			 $batchData = [];
		
			 // MCQs
			 if (!empty($mcqsQuestions)) {
				  foreach ($mcqsQuestions as $row) {
						$batchData[] = array(
							 'tpd_tp_id'        => $tp_id,
							 'tpd_item_id'      => $row['item_id'],
							 'tpd_qtype'        => 'mcq',
							 'tpd_slo_id'       => $row['item_slo_id'],
							 'tpd_subcstand_id' => isset($row['item_subcstand_id']) ? $row['item_subcstand_id'] : null,
						);
				  }
			 }
		
			 // Short Questions
			 if (!empty($shortQuestions)) {
				  foreach ($shortQuestions as $row) {
						$batchData[] = array(
							 'tpd_tp_id'        => $tp_id,
							 'tpd_item_id'      => $row['item_id'],
							 'tpd_qtype'        => 'short',
							 'tpd_slo_id'       => $row['item_slo_id'],
							 'tpd_subcstand_id' => isset($row['item_subcstand_id']) ? $row['item_subcstand_id'] : null,
						);
				  }
			 }
		
			 // Long Questions
			 if (!empty($longQuestions)) {
				  foreach ($longQuestions as $row) {
						$batchData[] = array(
							 'tpd_tp_id'        => $tp_id,
							 'tpd_item_id'      => $row['item_id'],
							 'tpd_qtype'        => 'long',
							 'tpd_slo_id'       => $row['item_slo_id'],
							 'tpd_subcstand_id' => isset($row['item_subcstand_id']) ? $row['item_subcstand_id'] : null,
						);
				  }
			 }
		
			 // Insert all at once
			 if (!empty($batchData)) {
				  $this->db->insert_batch('ci_test_paper_detail', $batchData);
			 }
		
			 return true;
		}

		
		public function get_test_paper_question_detail($tpd_tp_id)
		{//item_cognitive_bloom
		//ci_items_pilot.*, grade_name_en, subject_name_en, cs_statement_en, cs_statement_ur'
			$this->db->select('*')
				 ->from('ci_test_paper_detail')
				 ->join('ci_items_pilot', 'item_id = tpd_item_id')
				 ->join('ci_grades', 'grade_id= item_grade_id')
				 ->join('ci_subjects', 'subject_id= item_subject_id')
				 ->join('ci_content_stands', 'cs_id = item_cstand_id')
				 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
				 ->join('ci_slos', 'item_slo_id = slo_id')
				 ->where('tpd_tp_id', $tpd_tp_id);	
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());
		}
		
		public function get_test_paper($tp_id)
		{
			$this->db->select('*')
				 ->from('ci_test_paper')
				 ->join('ci_grades', 'grade_id = tp_grade_id')
				 ->join('ci_subjects', 'subject_id = tp_subject_id')
				 ->where('tp_id', $tp_id);	
			$query = $this->db->get();
			return $result = $query->row_array();
		}
	public function get_all_subjects()
	{	
		$this->db->select('subject_id,subject_code,subject_name_en')
				 ->from('ci_subjects')					 
				 ->where('subject_status', 1);
		$query = $this->db->get();
		return $result = $query->result_array();
	}
}
