<?php
	class Paper_model extends CI_Model{
		
		public function get_all_model_papers_listing()
		{
			$wh = [];		
			$SQL = "
				 SELECT 
					  m.*,
					  g.grade_name_en,
					  s.subject_name_en,
			
					  (
							SELECT GROUP_CONCAT(c2.subcs_topic_en ORDER BY c2.subcs_id SEPARATOR '<br>- ')
							FROM ci_subcontent_stands c2
							WHERE 
								 c2.subcs_topic_en <> ''
								 AND c2.subcs_topic_en <> '-'  
								 AND c2.subcs_topic_en <> '.'  
								 AND c2.subcs_topic_en IS NOT NULL 
								 AND FIND_IN_SET(c2.subcs_id, REPLACE(m.mp_subcstand_id, ' ', ''))
					  ) AS subcs_topic_en,
			
					  (
							SELECT GROUP_CONCAT(c2.subcs_topic_ur ORDER BY c2.subcs_id SEPARATOR '<br>- ')
							FROM ci_subcontent_stands c2
							WHERE 
								 c2.subcs_topic_ur <> '' 
								 AND c2.subcs_topic_ur <> '-' 
								 AND c2.subcs_topic_ur <> '.' 
								 AND c2.subcs_topic_ur IS NOT NULL 
								 AND FIND_IN_SET(c2.subcs_id, REPLACE(m.mp_subcstand_id, ' ', ''))
					  ) AS subcs_topic_ur
			
				 FROM ci_model_paper m
				 LEFT JOIN ci_grades g ON m.mp_grade_id = g.grade_id
				 LEFT JOIN ci_subjects s ON m.mp_subject_id = s.subject_id
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
		
		public function insert_model_paper($data)
		{
			$this->db->insert('ci_model_paper', $data);
			return $this->db->insert_id();
		}
		
		/*public function get_items($item_grade_id, $item_subject_id, $item_subcstand_id,$limit, $item_slo_ids, $questiontype)
		{
			//questiontype = mcq, short,long
			$this->db->select('item_id, item_slo_id')->from('ci_items_pilot');
			$this->db->where('item_grade_id', $item_grade_id);
			$this->db->where('item_subject_id', $item_subject_id);
			//$this->db->where('item_cstand_id', $item_cstand_id);
			if($item_subcstand_id != 0)
				$this->db->where('item_subcstand_id', $item_subcstand_id);
			
			if($item_slo_ids != 0)
				$this->db->where('item_slo_id IN ('.$item_slo_ids.')');
			if($questiontype == 'mcq'){
				$this->db->where('item_type', 'MCQ');
			}
			if($questiontype == 'short'){
				$this->db->where('item_type', 'ERQ');
				$this->db->where('item_total_marks', 2);
			}
			if($questiontype == 'long'){
				$this->db->where('item_type', 'ERQ');
				$this->db->where('item_total_marks > 2');
			}
			$this->db->order_by('RAND()');
			$this->db->limit($limit);
			
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result_array();			
		}*/
		
		public function get_items($item_grade_id, $item_subject_id, $item_subcstand_ids, $limit, $item_slo_ids, $questiontype)
		{
			 $this->db->select('item_id, item_slo_id, item_subcstand_id');
			 $this->db->from('ci_items_pilot');
			 $this->db->where('item_grade_id', $item_grade_id);
			 $this->db->where('item_subject_id', $item_subject_id);
		
			 if ($item_subcstand_ids != 0) {
				  //$this->db->where('item_subcstand_id', $item_subcstand_id);
				  $this->db->where("item_subcstand_id IN ($item_subcstand_ids)");
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
			 $this->db->limit($limit);
		
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

		
		/*public function save_model_paper_details($mp_id, $mcqsQuestions, $shortQuestions, $longQuestions)
		{
			 $batchData = [];
		
			 // MCQs
			 if (!empty($mcqsQuestions)) {
				  foreach ($mcqsQuestions as $row) {
						$batchData[] = array(
							 'mpd_mp_id'   => $mp_id,
							 'mpd_item_id' => $row['item_id'],
							 'mpd_qtype'   => 'mcq',
							 'mpd_slo_id'  => $row['item_slo_id'],
						);
				  }
			 }
		
			 // Short Questions
			 if (!empty($shortQuestions)) {
				  foreach ($shortQuestions as $row) {
						$batchData[] = array(
							 'mpd_mp_id'   => $mp_id,
							 'mpd_item_id' => $row['item_id'],
							 'mpd_qtype'   => 'short',
							 'mpd_slo_id'  => $row['item_slo_id'],
						);
				  }
			 }
		
			 // Long Questions
			 if (!empty($longQuestions)) {
				  foreach ($longQuestions as $row) {
						$batchData[] = array(
							 'mpd_mp_id'   => $mp_id,
							 'mpd_item_id' => $row['item_id'],
							 'mpd_qtype'   => 'long',
							 'mpd_slo_id'  => $row['item_slo_id'],
						);
				  }
			 }
		
			 // Insert all at once
			 if (!empty($batchData)) {
				  $this->db->insert_batch('ci_model_paper_detail', $batchData);
			 }
		
			 return true;
		}*/
		
		public function save_model_paper_details($mp_id, $mcqsQuestions, $shortQuestions, $longQuestions)
		{
			 $batchData = [];
		
			 // MCQs
			 if (!empty($mcqsQuestions)) {
				  foreach ($mcqsQuestions as $row) {
						$batchData[] = array(
							 'mpd_mp_id'        => $mp_id,
							 'mpd_item_id'      => $row['item_id'],
							 'mpd_qtype'        => 'mcq',
							 'mpd_slo_id'       => $row['item_slo_id'],
							 'mpd_subcstand_id' => isset($row['item_subcstand_id']) ? $row['item_subcstand_id'] : null,
						);
				  }
			 }
		
			 // Short Questions
			 if (!empty($shortQuestions)) {
				  foreach ($shortQuestions as $row) {
						$batchData[] = array(
							 'mpd_mp_id'        => $mp_id,
							 'mpd_item_id'      => $row['item_id'],
							 'mpd_qtype'        => 'short',
							 'mpd_slo_id'       => $row['item_slo_id'],
							 'mpd_subcstand_id' => isset($row['item_subcstand_id']) ? $row['item_subcstand_id'] : null,
						);
				  }
			 }
		
			 // Long Questions
			 if (!empty($longQuestions)) {
				  foreach ($longQuestions as $row) {
						$batchData[] = array(
							 'mpd_mp_id'        => $mp_id,
							 'mpd_item_id'      => $row['item_id'],
							 'mpd_qtype'        => 'long',
							 'mpd_slo_id'       => $row['item_slo_id'],
							 'mpd_subcstand_id' => isset($row['item_subcstand_id']) ? $row['item_subcstand_id'] : null,
						);
				  }
			 }
		
			 // Insert all at once
			 if (!empty($batchData)) {
				  $this->db->insert_batch('ci_model_paper_detail', $batchData);
			 }
		
			 return true;
		}

		
		public function get_model_paper_question_detail($mpd_mp_id)
		{//item_cognitive_bloom
		//ci_items_pilot.*, grade_name_en, subject_name_en, cs_statement_en, cs_statement_ur'
			$this->db->select('*')
				 ->from('ci_model_paper_detail')
				 ->join('ci_items_pilot', 'item_id = mpd_item_id')
				 ->join('ci_grades', 'grade_id= item_grade_id')
				 ->join('ci_subjects', 'subject_id= item_subject_id')
				 ->join('ci_content_stands', 'cs_id = item_cstand_id')
				 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
				 ->join('ci_slos', 'item_slo_id = slo_id')
				 ->where('mpd_mp_id', $mpd_mp_id);	
			$query = $this->db->get();
			return $result = $query->result();
			die($this->db->last_query());
		}
		
		public function get_model_paper($mp_id)
		{
			$this->db->select('*')
				 ->from('ci_model_paper')
				 ->join('ci_grades', 'grade_id = mp_grade_id')
				 ->join('ci_subjects', 'subject_id = mp_subject_id')
				 ->where('mp_id', $mp_id);	
			$query = $this->db->get();
			return $result = $query->row_array();
		}

		public function get_paper_by_id($id){
			$this->db->select('*')
					 ->from('ci_final_papers')
					 //->order_by('paper_id', 'desc')
					 ->join('ci_grades', 'grade_id = paper_grade_id')
					 ->join('ci_subjects', 'subject_id = paper_subject_id')
					 ->join('ci_schools', 'school_id = paper_school_id')
					 ->where('paper_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}	
		function get_itemsbank_by_id($subject_id)
		{	
			$this->db->select('*')
					 ->from('ci_itemsbank')
					 ->where('ib_subject_id', $subject_id)
					 ->where('ib_verified', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
		public function get_item_detail_by_id($id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_id', $id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
		function get_itemsbank_for_subject($subject_id)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank')
					 ->where('ib_subject_id', $subject_id)
					 ->where('ib_verified', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		public function edit_paper($data, $id){
			$this->db->where('paper_id', $id);
			$this->db->update('ci_final_papers', $data);
			return true;
		}
		/*public function get_item_by_id($item_id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}*/
		public function get_item_by_id($item_id){
			$this->db->select('*')
					 ->from('ci_items_final')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		public function get_item_by_id_eu($item_id){
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		public function get_header_by_id($id){
			$this->db->select('*')
					 ->from('ci_paperinstructions')
					 ->where('pi_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		public function get_tehsil_by_id($id){
			$this->db->select('*')
					 ->from('ci_tehsil')
					 ->where('tehsil_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		public function get_district_by_id($id){
			$this->db->select('*')
					 ->from('ci_districts')
					 ->where('district_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		public function get_paras_by_subject_id($id,$startfrom){
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->where('para_subject_id', $id)
					->where('para_start_from', $startfrom);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		////////////////////////////////////
				

	public function get_all_added_subjects()
	{
		$this->db->select('paper_subject_id')->from('ci_final_papers');
		$query = $this->db->get();			
		return $result = $query->result_array();	
	}
	//---------------------------------------------------
	// get all users for server-side datatable processing (ajax based)
	public function get_all_paper($school_id){		
		$wh =array();
		$SQL ='SELECT * FROM ci_final_papers LEFT JOIN ci_grades ON ( paper_grade_id = grade_id) LEFT JOIN ci_subjects ON ( paper_subject_id = subject_id)';
		//echo $SQL;
		//die();
		//die($this->db->last_query());

		$wh[] ="paper_school_id = ".$school_id;
		if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}		

	}
	//---------------------------------------------------
		
///////////////////////////////////////////////////
	public function get_all_grades_have_itembanks()
		{	
			$sql="SELECT grade_id,grade_code,grade_name_en FROM ci_grades, ci_itemsbank WHERE grade_id = ib_grade_id AND grade_status = 1 AND ib_status = 1 AND ib_verified = 1 GROUP BY grade_id ORDER BY grade_id ASC";    
			$query = $this->db->query($sql);
			return $query->result_array();		
		}
		
	public function get_all_subjects()
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
///////////////////////////////////////////////////Get Subjects by Grade using ajax call	


///////////////////////////////////////////////////Get Contenstand by subject using ajax call	
function get_itemcode_by_subject($subject_id)
		{
			$this->db->select('COUNT(paper_id)+1 AS maxitems, subject_code, (subject_gradeid-2) AS grade, subject_id')
					 ->from('ci_subjects')
					 ->join('ci_final_papers', 'paper_subject_id = subject_id', 'left')
					 ->where('subject_id', $subject_id)
					 ->where('subject_status', 1)
					 ->group_by('subject_id'); 
			$query = $this->db->get();
			//die($query);	
	//die($this->db->last_query());
			return $result = $query->result_array();			
		}

///////////////////////////////////////////////////Get Contenstand by subject using ajax call	


/////////////////////////////////////////////////////////////////////////////////////////////////
		
		function change_status()
		{		
			$this->db->set('item_status', $this->input->post('status'));
			$this->db->where('item_id', $this->input->post('item_id'));
			$this->db->update('ci_items');
		} 
		
		/*public function get_items_by_id($id){
			$query = $this->db->get_where('ci_items', array('item_id' => $id));
			//$result = $query->row_array();
			//echo '<PRE>';
			//print_r($result);
			//die();
			return $result = $query->row_array();
		}*/
		
		public function edit_items($data, $id){
			$this->db->where('item_id', $id);
			$this->db->update('ci_items', $data);
			return true;
		}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		public function get_paper_for_export()
		{			
			$this->db->select('*')
					 ->from('ci_final_papers')
					 ->join('ci_grades', 'grade_id = paper_grade_id')
					 ->join('ci_subjects', 'subject_id = paper_subject_id')
					 ->join('ci_schools', 'school_id = paper_school_id')
					 ->where('paper_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();
		}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
			
		public function get_ae_subjects($subjectList)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_cstands()
		{	
			$this->db->select('cs_id,cs_statement_en')
					 ->from('ci_content_stands')					 
					 ->where('cs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_subcstands()
		{	
			$this->db->select('subcs_id,subcs_topic_en')
					 ->from('ci_subcontent_stands')					 
					 ->where('subcs_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_all_slos()
		{	
			$this->db->select('slo_id,slo_statement_en')
					 ->from('ci_slos')					 
					 ->where('slo_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_paras16_by_subject($id){
			$this->db->select('ci_items_paragraphs.*, i21.item_id AS i21id, i21.item_stem_en AS i21stem_en, i21.item_stem_ur AS i21stem_ur, i21.item_image_en AS i21image_en, i21.item_image_ur AS i21image_ur, i21.item_image_position AS i21image_position, i21.item_option_layout AS i21option_layout, i21.item_option_a_en AS i21option_a_en, i21.item_option_a_ur AS i21option_a_ur, i21.item_option_a_image AS i21option_a_image, i21.item_option_b_en AS i21option_b_en, i21.item_option_b_ur AS i21option_b_ur, i21.item_option_b_image AS i21option_b_image, i21.item_option_c_en AS i21option_c_en, i21.item_option_c_ur AS i21option_c_ur, i21.item_option_c_image AS i21option_c_image, i21.item_option_d_en AS i21option_d_en, i21.item_option_d_ur AS i21option_d_ur, i21.item_option_d_image AS i21option_d_image, i21.item_option_correct AS i21option_correct, i21.item_sort AS i21sort, i22.item_id AS i22id,i22.item_stem_en AS i22stem_en, i22.item_stem_ur AS i22stem_ur, i22.item_image_en AS i22image_en, i22.item_image_ur AS i22image_ur, i22.item_image_position AS i22image_position,  i22.item_option_layout AS i22option_layout, i22.item_option_a_en AS i22option_a_en, i22.item_option_a_ur AS i22option_a_ur, i22.item_option_a_image AS i22option_a_image, i22.item_option_b_en AS i22option_b_en, i22.item_option_b_ur AS i22option_b_ur, i22.item_option_b_image AS i22option_b_image, i22.item_option_c_en AS i22option_c_en, i22.item_option_c_ur AS i22option_c_ur, i22.item_option_c_image AS i22option_c_image, i22.item_option_d_en AS i22option_d_en, i22.item_option_d_ur AS i22option_d_ur, i22.item_option_d_image AS i22option_d_image, i22.item_option_correct AS i22option_correct, i22.item_sort AS i22sort, i23.item_id AS i23id,i23.item_stem_en AS i23stem_en, i23.item_stem_ur AS i23stem_ur, i23.item_image_en AS i23image_en, i23.item_image_ur AS i23image_ur, i23.item_image_position AS i23image_position,  i23.item_option_layout AS i23option_layout, i23.item_option_a_en AS i23option_a_en, i23.item_option_a_ur AS i23option_a_ur, i23.item_option_a_image AS i23option_a_image, i23.item_option_b_en AS i23option_b_en, i23.item_option_b_ur AS i23option_b_ur, i23.item_option_b_image AS i23option_b_image, i23.item_option_c_en AS i23option_c_en, i23.item_option_c_ur AS i23option_c_ur, i23.item_option_c_image AS i23option_c_image, i23.item_option_d_en AS i23option_d_en, i23.item_option_d_ur AS i23option_d_ur, i23.item_option_d_image AS i23option_d_image, i23.item_option_correct AS i23option_correct, i23.item_sort AS i23sort, i24.item_id AS i24id,i24.item_stem_en AS i24stem_en, i24.item_stem_ur AS i24stem_ur, i24.item_image_en AS i24image_en, i24.item_image_ur AS i24image_ur, i24.item_image_position AS i24image_position,  i24.item_option_layout AS i24option_layout, i24.item_option_a_en AS i24option_a_en, i24.item_option_a_ur AS i24option_a_ur, i24.item_option_a_image AS i24option_a_image, i24.item_option_b_en AS i24option_b_en, i24.item_option_b_ur AS i24option_b_ur, i24.item_option_b_image AS i24option_b_image, i24.item_option_c_en AS i24option_c_en, i24.item_option_c_ur AS i24option_c_ur, i24.item_option_c_image AS i24option_c_image, i24.item_option_d_en AS i24option_d_en, i24.item_option_d_ur AS i24option_d_ur, i24.item_option_d_image AS i24option_d_image, i24.item_option_correct AS i24option_correct, i24.item_sort AS i24sort, i25.item_id AS i25id,i25.item_stem_en AS i25stem_en, i25.item_stem_ur AS i25stem_ur, i25.item_image_en AS i25image_en, i25.item_image_ur AS i25image_ur, i25.item_image_position AS i25image_position,  i25.item_option_layout AS i25option_layout, i25.item_option_a_en AS i25option_a_en, i25.item_option_a_ur AS i25option_a_ur, i25.item_option_a_image AS i25option_a_image, i25.item_option_b_en AS i25option_b_en, i25.item_option_b_ur AS i25option_b_ur, i25.item_option_b_image AS i25option_b_image, i25.item_option_c_en AS i25option_c_en, i25.item_option_c_ur AS i25option_c_ur, i25.item_option_c_image AS i25option_c_image, i25.item_option_d_en AS i25option_d_en, i25.item_option_d_ur AS i25option_d_ur, i25.item_option_d_image AS i25option_d_image, i25.item_option_correct AS i25option_correct, i25.item_sort AS i25sort')
			->from('ci_items_paragraphs')
			->join('ci_items i21', 'para_item_21 = i21.item_id', 'left')
			->join('ci_items i22', 'para_item_22 = i22.item_id', 'left')
			->join('ci_items i23', 'para_item_23 = i23.item_id', 'left')
			->join('ci_items i24', 'para_item_24 = i24.item_id', 'left')
			->join('ci_items i25', 'para_item_25 = i25.item_id', 'left')
			->where('para_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function get_para_by_id($id){
			$this->db->select('ci_items_paragraphs.*, i21.item_id AS i21id, i21.item_stem_en AS i21stem_en, i21.item_stem_ur AS i21stem_ur, i21.item_image_en AS i21image_en, i21.item_image_ur AS i21image_ur, i21.item_image_position AS i21image_position, i21.item_option_layout AS i21option_layout, i21.item_option_a_en AS i21option_a_en, i21.item_option_a_ur AS i21option_a_ur, i21.item_option_a_image AS i21option_a_image, i21.item_option_b_en AS i21option_b_en, i21.item_option_b_ur AS i21option_b_ur, i21.item_option_b_image AS i21option_b_image, i21.item_option_c_en AS i21option_c_en, i21.item_option_c_ur AS i21option_c_ur, i21.item_option_c_image AS i21option_c_image, i21.item_option_d_en AS i21option_d_en, i21.item_option_d_ur AS i21option_d_ur, i21.item_option_d_image AS i21option_d_image, i21.item_option_correct AS i21option_correct, i21.item_sort AS i21sort, i22.item_id AS i22id,i22.item_stem_en AS i22stem_en, i22.item_stem_ur AS i22stem_ur, i22.item_image_en AS i22image_en, i22.item_image_ur AS i22image_ur, i22.item_image_position AS i22image_position,  i22.item_option_layout AS i22option_layout, i22.item_option_a_en AS i22option_a_en, i22.item_option_a_ur AS i22option_a_ur, i22.item_option_a_image AS i22option_a_image, i22.item_option_b_en AS i22option_b_en, i22.item_option_b_ur AS i22option_b_ur, i22.item_option_b_image AS i22option_b_image, i22.item_option_c_en AS i22option_c_en, i22.item_option_c_ur AS i22option_c_ur, i22.item_option_c_image AS i22option_c_image, i22.item_option_d_en AS i22option_d_en, i22.item_option_d_ur AS i22option_d_ur, i22.item_option_d_image AS i22option_d_image, i22.item_option_correct AS i22option_correct, i22.item_sort AS i22sort, i23.item_id AS i23id,i23.item_stem_en AS i23stem_en, i23.item_stem_ur AS i23stem_ur, i23.item_image_en AS i23image_en, i23.item_image_ur AS i23image_ur, i23.item_image_position AS i23image_position,  i23.item_option_layout AS i23option_layout, i23.item_option_a_en AS i23option_a_en, i23.item_option_a_ur AS i23option_a_ur, i23.item_option_a_image AS i23option_a_image, i23.item_option_b_en AS i23option_b_en, i23.item_option_b_ur AS i23option_b_ur, i23.item_option_b_image AS i23option_b_image, i23.item_option_c_en AS i23option_c_en, i23.item_option_c_ur AS i23option_c_ur, i23.item_option_c_image AS i23option_c_image, i23.item_option_d_en AS i23option_d_en, i23.item_option_d_ur AS i23option_d_ur, i23.item_option_d_image AS i23option_d_image, i23.item_option_correct AS i23option_correct, i23.item_sort AS i23sort, i24.item_id AS i24id,i24.item_stem_en AS i24stem_en, i24.item_stem_ur AS i24stem_ur, i24.item_image_en AS i24image_en, i24.item_image_ur AS i24image_ur, i24.item_image_position AS i24image_position,  i24.item_option_layout AS i24option_layout, i24.item_option_a_en AS i24option_a_en, i24.item_option_a_ur AS i24option_a_ur, i24.item_option_a_image AS i24option_a_image, i24.item_option_b_en AS i24option_b_en, i24.item_option_b_ur AS i24option_b_ur, i24.item_option_b_image AS i24option_b_image, i24.item_option_c_en AS i24option_c_en, i24.item_option_c_ur AS i24option_c_ur, i24.item_option_c_image AS i24option_c_image, i24.item_option_d_en AS i24option_d_en, i24.item_option_d_ur AS i24option_d_ur, i24.item_option_d_image AS i24option_d_image, i24.item_option_correct AS i24option_correct, i24.item_sort AS i24sort, i25.item_id AS i25id,i25.item_stem_en AS i25stem_en, i25.item_stem_ur AS i25stem_ur, i25.item_image_en AS i25image_en, i25.item_image_ur AS i25image_ur, i25.item_image_position AS i25image_position,  i25.item_option_layout AS i25option_layout, i25.item_option_a_en AS i25option_a_en, i25.item_option_a_ur AS i25option_a_ur, i25.item_option_a_image AS i25option_a_image, i25.item_option_b_en AS i25option_b_en, i25.item_option_b_ur AS i25option_b_ur, i25.item_option_b_image AS i25option_b_image, i25.item_option_c_en AS i25option_c_en, i25.item_option_c_ur AS i25option_c_ur, i25.item_option_c_image AS i25option_c_image, i25.item_option_d_en AS i25option_d_en, i25.item_option_d_ur AS i25option_d_ur, i25.item_option_d_image AS i25option_d_image, i25.item_option_correct AS i25option_correct, i25.item_sort AS i25sort')
			->from('ci_items_paragraphs')
			->join('ci_items i21', 'para_item_21 = i21.item_id', 'left')
			->join('ci_items i22', 'para_item_22 = i22.item_id', 'left')
			->join('ci_items i23', 'para_item_23 = i23.item_id', 'left')
			->join('ci_items i24', 'para_item_24 = i24.item_id', 'left')
			->join('ci_items i25', 'para_item_25 = i25.item_id', 'left')
			->where('para_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		//New Itembank Final
public function get_all_grades_have_itembanks_final($type = 'MCQ')
		{
/*			if($this->session->userdata('school_level') == 'Primary')
			{
				$sql="SELECT DISTINCT(ibf_grade_id) FROM ci_itemsbank_final WHERE ibf_type = '".$type."' AND ibf_grade_id NOT IN (8,9,10) ORDER BY ibf_grade_id asc";    	
			}
			else
			{
				$sql="SELECT DISTINCT(ibf_grade_id) FROM ci_itemsbank_final WHERE ibf_type = '".$type."' ORDER BY ibf_grade_id asc";    	
			}
*/
			$sql="SELECT DISTINCT(ibf_grade_id) FROM ci_itemsbank_final WHERE ibf_type = '".$type."' ORDER BY ibf_grade_id asc";    				
			$query = $this->db->query($sql);
			return $query->result_array();		
		}
		function get_subjects_by_grade_final($grade_id, $type='MCQ')
		{
			if($grade_id == '')
				$grade_id = 0;
			$sql="SELECT DISTINCT(ibf_subject_id),subject_id,subject_name_en,subject_name_ur 
					FROM ci_itemsbank_final 
					INNER JOIN ci_subjects ON subject_id = ibf_subject_id
					WHERE ibf_type = '".$type."' AND ibf_grade_id = $grade_id ";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		function get_subjects_by_grade_final_eu($grade_id, $type = 'MCQ')
		{
			if ($grade_id == '')
				$grade_id = 0;
		
			// Subject arrays
			$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
			$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		
			// Merge allowed subjects
			$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
		
			// Convert to comma-separated string for SQL IN
			$subjects_in = implode(',', $allowed_subjects);
		
			$sql = "SELECT DISTINCT(ibf_subject_id), subject_id, subject_name_en, subject_name_ur 
					FROM ci_itemsbank_final 
					INNER JOIN ci_subjects ON subject_id = ibf_subject_id
					WHERE ibf_type = '".$type."' 
					  AND ibf_grade_id = $grade_id
					  AND subject_id IN ($subjects_in)";
		
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function add_paper_final_mcq($data){
			$this->db->insert('ci_final_paper_mcq', $data);
			return $this->db->insert_id();
		}
		public function add_paper_final_crq($data){
			$this->db->insert(' ci_final_paper_crq', $data);
			return $this->db->insert_id();
		}
		public function get_mcq_itembank_by_subject($subject_id){
			$sql="SELECT * FROM ci_itemsbank_mcq WHERE ibm_subject_id = ".$subject_id." ORDER BY ibm_block_no ASC";    
			$query = $this->db->query($sql);
			return $query->result_array();			
		}
		public function get_blocks($subject_id)
		{
			$sql="SELECT * FROM ci_itembank_setting WHERE ibs_subject_id = ".$subject_id;    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_itembank_block_question_mcq($subject_id,$block_id)
		{
			$sql="SELECT * FROM ci_itemsbank_mcq WHERE ibm_subject_id = ".$subject_id." AND ibm_block_no = ".$block_id." ORDER BY RAND() LIMIT 1";    
			$query = $this->db->query($sql);
			return $query->result_array();	
		}
		public function get_itembank_block_question_crq($subject_id,$block_id)
		{
			$sql="SELECT * FROM ci_itemsbank_crq WHERE ibc_subject_id = ".$subject_id." AND ibc_block_no = ".$block_id." ORDER BY RAND() LIMIT 1";    
			$query = $this->db->query($sql);
			return $query->result_array();	
		}
		public function get_itembank_block_para_mcq($subject_id)
		{
			$sql="SELECT * FROM ci_itemsbank_mcq WHERE ibm_subject_id = ".$subject_id." AND ibm_block_no = 0 ORDER BY RAND() LIMIT 1";    
			$query = $this->db->query($sql);
			return $query->result_array();	
		}
		public function add_paper_final_mcq_detail($data){
			$this->db->insert(' ci_final_paper_mcqdetail', $data);
			return true;
		}
		public function add_paper_final_crq_detail($data){
			$this->db->insert(' ci_final_paper_crqdetail', $data);
			return true;
		}
		public function get_all_final_paper_itemsbank_mcqs(){
			$SQL="SELECT * FROM  ci_final_paper_mcq LEFT JOIN ci_grades ON ( fp_grade_id = grade_id) LEFT JOIN ci_subjects ON ( fp_subject_id = subject_id) "; 
			$wh =array();
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			
		}
		public function get_all_final_paper_itemsbank_crqs(){
			$SQL="SELECT * FROM  ci_final_paper_crq LEFT JOIN ci_grades ON ( fpc_grade_id = grade_id) LEFT JOIN ci_subjects ON ( fpc_subject_id = subject_id) "; 
			$wh =array();
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			
		}
		function get_itembank_mcqs($fp_id)
		{			
			$this->db->select('*')
					 ->from('ci_final_paper_mcq')
					 ->join('ci_subjects', 'subject_id = fp_subject_id')
					 ->join('ci_grades', 'fp_grade_id = grade_id')
					 ->join('ci_final_paper_mcqdetail fpd', 'pfm_fp_id = fp_id')
					 ->join('ci_items_final', 'item_id = fp_item_id', 'left')
					 //->join('ci_schools', 'school_id = fp_school_id', 'left')
					 //->join('ci_districts', 'school_district_id = district_id', 'left')
					 //->join('ci_tehsil', 'school_tehsil_id = tehsil_id', 'left')
					 //->where('school_id', $this->session->userdata('school_id'))
					 ->where('fp_id ', $fp_id)
					 ->where('fp_item_id != 0 ');	 
			$query = $this->db->get();
			$result = $query->result();
			if ($result)
			{
				return $result;
			} else {
				die;
			}
			//die($this->db->last_query());
			//print_r($result);
			//die();
		}
		
		function get_itembank_crqs($fpc_id)
		{
			/*$this->db->select('*')
					 ->from('ci_itemsbank_crq')
					 ->join('ci_subjects', 'subject_id = ibc_subject_id', 'left')
					 ->join('ci_items_group_pilot', 'group_id = ibc_group_id', 'left')
					 ->where('ibc_group_id != ', 0)
					 ->where('ibc_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibc_subject_id', $subjectid);*/
			
			$this->db->select('*')
					 ->from('ci_final_paper_crq')
					 ->join('ci_subjects', 'subject_id = fpc_subject_id')
					 ->join('ci_grades', 'fpc_grade_id = grade_id')
					 ->join('ci_final_paper_crqdetail', 'pfc_fpc_id = fpc_id')
					 ->join('ci_items_group_final', 'group_id = fpc_group_id', 'left')
					 ->join('ci_schools', 'school_id = fpc_school_id', 'left')
					 ->join('ci_districts', 'school_district_id = district_id', 'left')
					 ->join('ci_tehsil', 'school_tehsil_id = tehsil_id', 'left')
					 ->where('school_id', $this->session->userdata('school_id'))
					 ->where('fpc_id ', $fpc_id)
					 ->where('fpc_group_id != 0');	 
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());
			//print_r($result);
			//die();
			if ($result)
			{
				return $result;
			} else {
				die;
			}

		}
		
		function get_crqs_final_paper_id($gradeid, $subjectid, $sectionid)
		{	
			$this->db->select('*')
					 ->from('ci_final_paper_crq')
					 ->where('fpc_grade_id', $gradeid)
					 ->where('fpc_subject_id', $subjectid)
					 ->where('fpc_section', $sectionid)
					 ->where('fpc_school_id', $this->session->userdata('school_id'));	 
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());
			//print_r($result);
			//die();
		}
		
		function get_itembank_crqs_eu($fpc_id)
		{
			$this->db->select('*')
					 ->from('ci_final_paper_crq')
					 ->join('ci_subjects', 'subject_id = fpc_subject_id')
					 ->join('ci_grades', 'fpc_grade_id = grade_id')
					 ->join('ci_final_paper_crqdetail', 'pfc_fpc_id = fpc_id')
					 ->join('ci_items_final', 'item_id = fpc_item_id', 'left')
					 ->join('ci_schools', 'school_id = fpc_school_id', 'left')
					 ->join('ci_districts', 'school_district_id = district_id', 'left')
					 ->join('ci_tehsil', 'school_tehsil_id = tehsil_id', 'left')
					 ->where('school_id', $this->session->userdata('school_id'))
					 ->where('fpc_id ', $fpc_id)
					 ->where('fpc_item_id != 0');	 
			$query = $this->db->get();
			return $result = $query->result();
			/*echo $this->db->last_query();
			die();*/
		}
		
		
		function get_itembank_mcqs_paras($fp_id)
		{
			$this->db->select('*')
					 ->from('ci_final_paper_mcq')
					 ->join('ci_subjects', 'subject_id = fp_subject_id')
					 ->join('ci_grades', 'fp_grade_id = grade_id')
					 ->join('ci_final_paper_mcqdetail fpd', 'pfm_fp_id = fp_id')
					 ->join('ci_items_paragraphs_final', 'para_id = fp_para_id', 'left')
					 ->where('fp_id ', $fp_id);	 
			$query = $this->db->get();
			return $result = $query->result();
			
			/*echo $this->db->last_query();
			die();*/
		}
		function paper_mcqs_paras($fp_id)
		{
			$this->db->select('*')
					 ->from('ci_final_paper_mcq')
					 ->join('ci_subjects', 'subject_id = fp_subject_id')
					 ->join('ci_grades', 'fp_grade_id = grade_id')
					 ->join('ci_final_paper_mcqdetail fpd', 'pfm_fp_id = fp_id')
					 ->join('ci_items_paragraphs_final', 'para_id = fp_para_id', 'left')
					 ->where('fp_id ', $fp_id);	 
			$query = $this->db->get();
			return $result = $query->result();
			
			/*echo $this->db->last_query();
			die();*/
		}
		public function get_pilotheader_by_suject($subject)
		{
			if($subject != 0 || $subject != '')
				$wh[] ='ph_paper_subject_en LIKE '."'%".$subject."%'";
				$wh[] ='ph_status = 1';
			
			$WHERE = implode(' and ',$wh);
			
			$this->db->select('*')
				 ->from('ci_pilotheaders')
				 ->where($WHERE);			
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_headers_by_id($id, $type = 'MCQs'){
			$this->db->select('*')
					 ->from('ci_headers')
					 ->join('ci_grades', 'grade_id = h_grade_id')
					 ->join('ci_subjects', 'subject_id = h_subject_id')
					 ->join('ci_admin', 'admin_id = h_creator_id')
					 ->where('h_subject_id', $id)
					 ->where('h_paper_type_top', $type);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result_array();			
		}
		function school_paper_exist($fp_school_id, $fp_subject_id, $fp_section ) {
			$this->db->select( '*' );
			$this->db->from( 'ci_final_paper_mcq ' );
			$this->db->where( 'fp_school_id', $fp_school_id );
			$this->db->where( 'fp_subject_id', $fp_subject_id );
			$this->db->where( 'fp_section', $fp_section );
			$query = $this->db->get();
			$result = $query->result_array();		
			return $result;
		}
		
		function school_paper_exist_crq($fpc_school_id, $fpc_subject_id, $fpc_section ) {
			$this->db->select( '*' );
			$this->db->from( 'ci_final_paper_crq ' );
			$this->db->where( 'fpc_school_id', $fpc_school_id );
			$this->db->where( 'fpc_subject_id', $fpc_subject_id );
			$this->db->where( 'fpc_section', $fpc_section );
			$query = $this->db->get();
			$result = $query->result_array();		
			return $result;
		}
		public function get_all_final_paper_itemsbank_all()
		{
			$SQL="SELECT * FROM  ci_final_paper_mcq 
					LEFT JOIN ci_grades ON ( fp_grade_id = grade_id ) 
					LEFT JOIN ci_subjects ON ( fp_subject_id = subject_id )"; 
			$wh =array();
			//$this->session->userdata('school_id')
			$wh[] ="fp_school_id = ".$this->session->userdata('school_id');
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			
		}
		function get_paper_mcqs($id)
		{
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->where('item_subject_id', $id)
					 ->where('item_type', 'MCQ')
					 ->limit(50);	 
			$query = $this->db->get();
			return $result = $query->result();	
		}
		
		function paper_mcqs_key($fp_id)
		{
			$this->db->select('*')
					 ->from('ci_final_paper_mcq')
					 ->join('ci_subjects', 'subject_id = fp_subject_id')
					 ->join('ci_grades', 'fp_grade_id = grade_id')
					 ->join('ci_final_paper_mcqdetail fpd', 'pfm_fp_id = fp_id')
					 ->join('ci_items_final', 'item_id = fp_item_id', 'left')
					 ->join('ci_schools', 'school_id = fp_school_id', 'left')
					 ->join('ci_districts', 'school_district_id = district_id', 'left')
					 ->join('ci_tehsil', 'school_tehsil_id = tehsil_id', 'left')
					 ->where('school_id', $this->session->userdata('school_id'))
					 ->where('fp_id ', $fp_id)
					 ->where('fp_item_id != 0 ');	 
			$query = $this->db->get();
			$result = $query->result();
			if ($result)
			{
				return $result;
			} else {
				die;
			}
		}
		
		function paper_crqs_key($fpc_id)
		{
			$this->db->select('*')
					 ->from('ci_final_paper_crq')
					 ->join('ci_subjects', 'subject_id = fpc_subject_id')
					 ->join('ci_grades', 'fpc_grade_id = grade_id')
					 ->join('ci_final_paper_crqdetail', 'pfc_fpc_id = fpc_id')
					 ->join('ci_items_group_pilot', 'group_id = fpc_group_id', 'left')
					 ->join('ci_schools', 'school_id = fpc_school_id', 'left')
					 ->join('ci_districts', 'school_district_id = district_id', 'left')
					 ->join('ci_tehsil', 'school_tehsil_id = tehsil_id', 'left')
					 ->where('school_id', $this->session->userdata('school_id'))
					 ->where('fpc_id ', $fpc_id)
					 ->where('fpc_group_id != 0');	 
			$query = $this->db->get();
			return $result = $query->result();
			if ($result)
			{
				return $result;
			} else {
				die;
			}
		}
		
		function get_cstands_by_subject($subject_id)
		{
			$this->db->select('cs_id,CONCAT(cs_number,"-", cs_statement_en) as cs_statement_en, cs_statement_ur')
					 ->from('ci_content_stands')
					 ->where('cs_subject_id', $subject_id);
					 //->where('cs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		function get_subcstands_by_cstand($cs_id)
		{
			$this->db->select('subcs_id, CONCAT(subcs_number,"-", subcs_topic_en) as subcs_topic_en, subcs_topic_ur')
					 ->from('ci_subcontent_stands')
					 ->where('subcs_cstand_id', $cs_id)
					 ->where('subcs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
		
		function get_slos_by_subcstands($subcs_id)
		{
			$this->db->select('slo_id, slo_number, slo_statement_en, slo_statement_ur')
					 ->from('ci_slos')
					 ->where('slo_subcstand_id', $subcs_id)
					 ->where('slo_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
//////////////////////Model Function for Unit Wise Papers//////////////////////////
		public function get_unit_wise_mcq($grade_id, $sub_id, $cs_id)
		{
			$sql = "SELECT * FROM ci_items_rev 
					WHERE item_grade_id = " . (int)$grade_id . "
					AND item_subject_id = " . (int)$sub_id . " 
					AND item_cstand_id = " . (int)$cs_id . "
					AND item_type = 'MCQ'
					ORDER BY RAND()
					LIMIT 13";
		
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_unit_wise_crq($grade_id,$sub_id,$cs_id)
		{
			$sql="SELECT * FROM ci_items_rev 
				  WHERE 
				  item_grade_id = ".$grade_id."
				  AND item_subject_id = ".$sub_id." 
				  AND item_cstand_id = ".$cs_id."
				  AND item_type = 'ERQ'
				  ORDER BY RAND()
				  LIMIT 13";  
			$query = $this->db->query($sql);
			return $query->result();	
		}
		
		public function get_term_wise_mcq($grade_id, $subject_id, $term)
		{
			$this->db->select('ci_items_rev.*, ci_subcontent_stands.subcs_phase');
			$this->db->from('ci_items_rev');
			$this->db->join('ci_subcontent_stands', 'ci_items_rev.item_subcstand_id = ci_subcontent_stands.subcs_id', 'inner');
			$this->db->where('ci_items_rev.item_grade_id', $grade_id);
			$this->db->where('ci_items_rev.item_subject_id', $subject_id);
			$this->db->where('ci_items_rev.item_type', 'MCQ');
			$this->db->where('ci_subcontent_stands.subcs_phase', $term);
			$this->db->order_by('RAND()');
			$this->db->limit(13);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_term_wise_crq($grade_id, $subject_id, $term)
		{
			$this->db->select('ci_items_rev.*, ci_subcontent_stands.subcs_phase');
			$this->db->from('ci_items_rev');
			$this->db->join('ci_subcontent_stands', 'ci_items_rev.item_subcstand_id = ci_subcontent_stands.subcs_id', 'inner');
			$this->db->where('ci_items_rev.item_grade_id', $grade_id);
			$this->db->where('ci_items_rev.item_subject_id', $subject_id);
			$this->db->where('ci_items_rev.item_type', 'ERQ');
			$this->db->where('ci_subcontent_stands.subcs_phase', $term);
			$this->db->order_by('RAND()');
			$this->db->limit(2);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function get_book_wise_mcq($grade_id, $subject_id)
		{
			$this->db->select('ci_items_rev.*');
			$this->db->from('ci_items_rev');
			$this->db->where('ci_items_rev.item_grade_id', $grade_id);
			$this->db->where('ci_items_rev.item_subject_id', $subject_id);
			$this->db->where('ci_items_rev.item_type', 'MCQ');
			$this->db->order_by('RAND()');
			$this->db->limit(13);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function get_book_wise_crq($grade_id, $subject_id)
		{
			$this->db->select('ci_items_rev.*');
			$this->db->from('ci_items_rev');
			$this->db->where('ci_items_rev.item_grade_id', $grade_id);
			$this->db->where('ci_items_rev.item_subject_id', $subject_id);
			$this->db->where('ci_items_rev.item_type', 'ERQ');
			$this->db->order_by('RAND()');
			$this->db->limit(2);
			$query = $this->db->get();
			return $query->result();
		}
		
		function get_grade_name($id)
		{
			$this->db->select('*')
					 ->from('ci_grades')
					 ->where('grade_id', $id)
					 ->where('grade_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result();			
		}
		
		function get_sub_name($id)
		{
			$this->db->select('subject_name_en, subject_name_ur, subject_code')
					 ->from('ci_subjects')
					 ->where('subject_id', $id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result();			
		}
		
		public function insert_qat_paper($data)
		{
			$this->db->insert('ci_qat_papers', $data);
			return $this->db->insert_id();
		}
		
		public function get_qat_paper_by_id($id)
		{
			$query = $this->db->get_where('ci_qat_papers', ['qat_id' => $id]);
			return $query->row_array();
		}
		
		public function get_unit_wise_mcq_ids($grade_id, $sub_id, $cs_id)
		{
			$this->db->select('item_id');
			$this->db->from('ci_items_pilot');
			$this->db->where([
				'item_grade_id' => $grade_id,
				'item_subject_id' => $sub_id,
				'item_cstand_id' => $cs_id,
				'item_type' => 'MCQ',
				'item_active' => '1'
			]);
			$this->db->order_by('RAND()');
			$this->db->limit(13);
			$query = $this->db->get();
			return array_column($query->result_array(), 'item_id');
		}
	
		public function get_unit_wise_crq_ids($grade_id, $sub_id, $cs_id, $limit = 5)
		{
			$this->db->select('item_id');
			$this->db->from('ci_items_pilot');
			$this->db->where([
				'item_grade_id' => $grade_id,
				'item_subject_id' => $sub_id,
				'item_cstand_id' => $cs_id,
				'item_type' => 'ERQ',
				'item_active' => '1'
			]);
			$this->db->order_by('RAND()');
			$this->db->limit($limit);
			$query = $this->db->get();
			return array_column($query->result_array(), 'item_id');
		}
	
		public function get_items_by_ids($ids = [])
		{
			if (empty($ids)) return [];
			$this->db->from('ci_items_pilot');
			$this->db->where_in('item_id', $ids);
			$query = $this->db->get();
			return $query->result();
		}
		
		public function get_all_unit_wise_papers_listing()
		{
			/*$wh = array();
		
			// Add conditions
			$wh[] = "p.qat_cs_id IS NOT NULL";
			$wh[] = "p.qat_subcs_phase IS NULL";
		
			$SQL = "
				SELECT 
					p.*,
					g.grade_name_en,
					s.subject_name_en,
					cs.cs_statement_en
				FROM ci_qat_papers p
				LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
				LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
				LEFT JOIN ci_content_stands cs ON p.qat_cs_id = cs.cs_id
			";
		
			$WHERE = implode(' AND ', $wh);
		
			return $this->datatable->LoadJson($SQL, $WHERE);*/
			
			$wh = array();
			$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
			$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48, 65, 66, 67];
			$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
			$subjects_in = implode(',', $allowed_subjects);
		
			// Add conditions
			$wh[] = "p.qat_cs_id IS NOT NULL";
			$wh[] = "p.qat_subcs_phase IS NULL";
			$wh[] = "p.qat_sub_id NOT IN ($subjects_in)";
		
			$SQL = "
				SELECT 
					p.*,
					g.grade_name_en,
					s.subject_name_en,
					cs.cs_statement_en
				FROM ci_qat_papers p
				LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
				LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
				LEFT JOIN ci_content_stands cs ON p.qat_cs_id = cs.cs_id
			";
			$WHERE = implode(' AND ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE);
		}

//////////////////////Model Function for Term Wise Papers (SM)//////////////////////////
	public function get_all_term_wise_papers_listing()
	{
		/*$wh = [];
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en,
				cs.cs_statement_en,
				CASE 
					WHEN p.qat_subcs_phase = 1 THEN '1st Term'
					WHEN p.qat_subcs_phase = 2 THEN '2nd Term'
					ELSE 'N/A'
				END AS term_name
			FROM ci_qat_papers p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
			LEFT JOIN ci_content_stands cs ON p.qat_cs_id = cs.cs_id
		";
	
		$wh[] = "p.qat_subcs_phase IS NOT NULL AND p.qat_subcs_phase != 0";
		$wh[] = "p.qat_cs_id IS NULL";
	
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);*/
		$wh = array();
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
		$subjects_in = implode(',', $allowed_subjects);
	
		// Add conditions
		$wh[] = "p.qat_cs_id IS NULL";
		$wh[] = "p.qat_subcs_phase IS NOT NULL";
		$wh[] = "p.qat_sub_id NOT IN ($subjects_in)";
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en
			FROM ci_qat_papers p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
		";
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);
	}
	
	public function get_term_wise_mcq_ids($grade_id, $sub_id, $phase)
	{
		// First, get all subcontent strand IDs for this grade, subject, and phase (term)
		$this->db->select('subcs_id');
		$this->db->from('ci_subcontent_stands');
		$this->db->where('subcs_grade_id', $grade_id);
		$this->db->where('subcs_subject_id', $sub_id);
		$this->db->where('subcs_phase', $phase);
		$this->db->where('subcs_status', 1);
		$subcs_query = $this->db->get();
		$subcs_ids = array_column($subcs_query->result_array(), 'subcs_id');
	
		if (empty($subcs_ids)) {
			return []; // No matching subcontent strands found
		}
	
		// Get MCQ items from ci_items_pilot using these subcs_ids
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'MCQ'); // ✅ Explicit condition for MCQ only
		$this->db->where('item_active', 1);
		$this->db->where_in('item_subcstand_id', $subcs_ids);
		$this->db->order_by('RAND()');
		$this->db->limit(13); // Adjust limit as needed
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}
	
	public function get_term_wise_erq_ids_sec_2($grade_id, $sub_id, $phase)
	{
		// Get all subcontent strand IDs for this grade, subject, and phase
		$this->db->select('subcs_id');
		$this->db->from('ci_subcontent_stands');
		$this->db->where('subcs_grade_id', $grade_id);
		$this->db->where('subcs_subject_id', $sub_id);
		$this->db->where('subcs_phase', $phase);
		//$this->db->where('subcs_status', 1);
		$subcs_query = $this->db->get();
		$subcs_ids = array_column($subcs_query->result_array(), 'subcs_id');
	
		if (empty($subcs_ids)) {
			return []; // No matching subcontent strands found
		}
	
		// Get ERQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'ERQ'); // ✅ Only ERQ
		$this->db->where('item_total_marks <', 4); // ✅ Marks <= 3
		$this->db->where('item_active', 1); 
		$this->db->where_in('item_subcstand_id', $subcs_ids);
		$this->db->order_by('RAND()');
		$this->db->limit(5); // Change as per your requirement
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}

	public function get_term_wise_erq_ids_sec_3($grade_id, $sub_id, $phase)
	{
		// Get all subcontent strand IDs for this grade, subject, and phase
		$this->db->select('subcs_id');
		$this->db->from('ci_subcontent_stands');
		$this->db->where('subcs_grade_id', $grade_id);
		$this->db->where('subcs_subject_id', $sub_id);
		$this->db->where('subcs_phase', $phase);
		//$this->db->where('subcs_status', 1);
		$subcs_query = $this->db->get();
		$subcs_ids = array_column($subcs_query->result_array(), 'subcs_id');
	
		if (empty($subcs_ids)) {
			return []; // No matching subcontent strands found
		}
	
		// Get ERQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'ERQ'); // ✅ Only ERQ
		$this->db->where('item_total_marks >', 3); // ✅ Only items with 4 marks
		$this->db->where('item_active', 1); 
		$this->db->where_in('item_subcstand_id', $subcs_ids);
		$this->db->order_by('RAND()');
		$this->db->limit(1); // Adjust limit if needed
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}

//////////////////////Model Function for Book Wise Papers (SM)//////////////////////////
	public function get_all_book_wise_papers_listing()
	{
		/*$wh = [];
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en
			FROM ci_qat_papers p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
		";
	
		// Conditions
		//$wh[] = "p.qat_grade_id IS NOT NULL AND p.qat_grade_id != 0";
		//$wh[] = "p.qat_sub_id IS NOT NULL AND p.qat_sub_id != 0";
		$wh[] = "(p.qat_cs_id IS NULL)";
		$wh[] = "(p.qat_subcs_phase IS NULL)";
	
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);*/
		$wh = [];
	
		// Allowed subjects
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
	
		// Convert to comma-separated list for SQL
		$subjects_in = implode(',', $allowed_subjects);
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en
			FROM ci_qat_papers p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
		";
	
		// Conditions
		$wh[] = "(p.qat_cs_id IS NULL)";
		$wh[] = "(p.qat_subcs_phase IS NULL)";
		$wh[] = "p.qat_sub_id NOT IN ($subjects_in)";
	
		$WHERE = implode(' AND ', $wh);
	
		return $this->datatable->LoadJson($SQL, $WHERE);
		
	}

	public function get_book_wise_mcq_ids($grade_id, $sub_id)
	{
		// Get MCQ items from ci_items_pilot using these subcs_ids
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'MCQ'); // ✅ Explicit condition for MCQ only
		$this->db->where('item_active', 1); 
		$this->db->order_by('RAND()');
		$this->db->limit(13); // Adjust limit as needed
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}
	
	public function get_book_wise_erq_ids_sec_2($grade_id, $sub_id)
	{
		// Get ERQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'ERQ'); // ✅ Only ERQ
		$this->db->where('item_total_marks <', 4); // ✅ Marks <= 3
		$this->db->where('item_active', 1); 
		$this->db->order_by('RAND()');
		$this->db->limit(5); // Change as per your requirement
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}

	public function get_book_wise_erq_ids_sec_3($grade_id, $sub_id)
	{
		// Get ERQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'ERQ'); // ✅ Only ERQ
		$this->db->where('item_total_marks >', 3); // ✅ Only items with 4 marks
		$this->db->where('item_active', 1); 
		$this->db->order_by('RAND()');
		$this->db->limit(1); // Adjust limit if needed
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}

//////////////////////Model Function for Unit Wise Papers (EU)//////////////////////////
	public function get_unit_wise_mcq_ids_eu($grade_id, $sub_id, $cs_id)
	{
			$this->db->select('item_id');
			$this->db->from('ci_items_pilot');
			$this->db->where([
				'item_grade_id' => $grade_id,
				'item_subject_id' => $sub_id,
				'item_cstand_id' => $cs_id,
				'item_type' => 'MCQ',
				'item_active' => '1'
			]);
			$this->db->order_by('RAND()');
			$this->db->limit(10);
			$query = $this->db->get();
			return array_column($query->result_array(), 'item_id');
		}
		
	public function get_unit_wise_pg_mcq_ids_eu($grade_id, $sub_id, $cs_id)
	{
		$this->db->select('para_id');
		$this->db->from('ci_items_paragraphs_pilot');
		$this->db->where([
			'para_grade_id' => $grade_id,
			'para_subject_id' => $sub_id,
			//'item_cstand_id' => $cs_id
		]);
		$this->db->order_by('RAND()');
		$this->db->limit(1);
		$query = $this->db->get();
		return array_column($query->result_array(), 'para_id');
	}
		
	public function get_all_unit_wise_papers_eu()
	{
		$wh = array();
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48, 65, 66, 67];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
		$subjects_in = implode(',', $allowed_subjects);
	
		// Add conditions
		$wh[] = "p.qat_cs_id IS NOT NULL";
		$wh[] = "p.qat_subcs_phase IS NULL";
		$wh[] = "p.qat_sub_id IN ($subjects_in)";
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en,
				cs.cs_statement_en
			FROM ci_qat_papers p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
			LEFT JOIN ci_content_stands cs ON p.qat_cs_id = cs.cs_id
		";
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);
	}
	
	public function get_unit_wise_crq_ids_eu($grade_id, $sub_id, $cs_id, $limit = 2)
	{
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_cstand_id', $cs_id);
		$this->db->where('item_type', 'ERQ');
		$this->db->where('item_total_marks >', 1); 
		$this->db->where('item_active', 1);
		$this->db->order_by('RAND()');
		$this->db->limit($limit);
		$query = $this->db->get();
		return array_column($query->result_array(), 'item_id');
	}
	
	public function get_unit_wise_crq_ids_eu2($grade_id, $sub_id)
	{
		// Define subject ID arrays
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
	
		$result_ids = [];
	
		if (in_array($sub_id, $urdu_subjects)) {
			$types = ['Essay', 'Application'];
		} elseif (in_array($sub_id, $english_subjects)) {
			$types = ['Story', 'Letter'];
		} else {
			return []; // If subject not matched
		}
		
		foreach ($types as $type) {
			$this->db->select('item_id');
			$this->db->from('ci_item_extra');
			$this->db->where('item_grade_id', $grade_id);
			$this->db->where('item_subject_id', $sub_id);
			$this->db->where('item_type_en', $type);
			$this->db->where('item_status', 1);
			$this->db->order_by('RAND()');
			$this->db->limit(1);
			$query = $this->db->get();
			//die($this->db->last_query());
			$row = $query->row_array();
			if (!empty($row)) {
				$result_ids[] = $row['item_id'];
			}
		}
		
		return $result_ids;
	}

	public function get_unit_wise_crq_ids_eu3($grade_id, $sub_id)
	{
		// Define subject ID arrays
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
	
		$result_ids = [];
	
		if (in_array($sub_id, $urdu_subjects)) {
			$types = ['Story', 'Letter'];
		} elseif (in_array($sub_id, $english_subjects)) {
			$types = ['Essay', 'Application'];
		} else {
			return []; // If subject not matched
		}
		
		foreach ($types as $type) {
			$this->db->select('item_id');
			$this->db->from('ci_item_extra');
			$this->db->where('item_grade_id', $grade_id);
			$this->db->where('item_subject_id', $sub_id);
			$this->db->where('item_type_en', $type);
			$this->db->where('item_status', 1);
			$this->db->order_by('RAND()');
			$this->db->limit(1);
			$query = $this->db->get();
			$row = $query->row_array();
			if (!empty($row)) {
				$result_ids[] = $row['item_id'];
			}
		}
		
		return $result_ids;
	}
	
	public function get_para_by_id_en($id)
	{
		/*$this->db->select('*');
		$this->db->from('ci_items_paragraphs_pilot');
		$this->db->where('para_id', $id);
		$query = $this->db->get();
		return $query->row(); // return single row as object*/
		
		$this->db->select('*');
		$this->db->from('ci_items_paragraphs_pilot');
		$this->db->where_in('para_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_sec2_by_id_en($id)
	{
		$this->db->select('*');
		$this->db->from('ci_item_extra');
		$this->db->where_in('item_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

//////////////////////Model Function for Term Wise Papers (EU)//////////////////////////
	public function get_term_wise_mcq_ids_eu($grade_id, $sub_id, $phase)
	{
		// Allowed subjects
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
	
		// Check if sub_id is allowed
		if (!in_array($sub_id, $allowed_subjects)) {
			return []; // Return empty if subject not allowed
		}
	
		// Get subcontent strand IDs by phase
		$this->db->select('subcs_id');
		$this->db->from('ci_subcontent_stands');
		$this->db->where('subcs_grade_id', $grade_id);
		$this->db->where('subcs_subject_id', $sub_id);
		$this->db->where('subcs_phase', $phase);
		$this->db->where('subcs_status', 1);
		$subcs_query = $this->db->get();
		$subcs_ids = array_column($subcs_query->result_array(), 'subcs_id');
	
		if (empty($subcs_ids)) {
			return []; // No strands found
		}
	
		// Get MCQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'MCQ');
		$this->db->where('item_active', 1);
		$this->db->where_in('item_subcstand_id', $subcs_ids); // Use subcs_ids
		$this->db->order_by('RAND()');
		$this->db->limit(10);
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}

	public function get_term_wise_pg_mcq_ids_eu($grade_id, $sub_id, $phase)
	{
		// Allowed subjects
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
	
		// Check if sub_id is allowed
		if (!in_array($sub_id, $allowed_subjects)) {
			return []; // Return empty if not allowed
		}
	
		// Get subcontent strand IDs by phase
		$this->db->select('subcs_id');
		$this->db->from('ci_subcontent_stands');
		$this->db->where('subcs_grade_id', $grade_id);
		$this->db->where('subcs_subject_id', $sub_id);
		$this->db->where('subcs_phase', $phase);
		$this->db->where('subcs_status', 1);
		$subcs_query = $this->db->get();
		$subcs_ids = array_column($subcs_query->result_array(), 'subcs_id');
	
		if (empty($subcs_ids)) {
			return []; // No strands found
		}
	
		// Get paragraph IDs from ci_items_paragraphs_pilot
		$this->db->select('para_id');
		$this->db->from('ci_items_paragraphs_pilot');
		$this->db->where('para_grade_id', $grade_id);
		$this->db->where('para_subject_id', $sub_id);
		//$this->db->where_in('para_subcstand_id', $subcs_ids); // Assuming this column exists
		$this->db->order_by('RAND()');
		$this->db->limit(1);
	
		$query = $this->db->get();
		return array_column($query->result_array(), 'para_id');
	}
	
	public function get_all_term_wise_papers_eu()
	{
		$wh = array();
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48, 65, 66, 67];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
		$subjects_in = implode(',', $allowed_subjects);
	
		// Add conditions
		$wh[] = "p.qat_cs_id IS NULL";
		$wh[] = "p.qat_subcs_phase IS NOT NULL";
		$wh[] = "p.qat_sub_id IN ($subjects_in)";
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en
			FROM ci_qat_papers p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
		";
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);
	}
	
	public function get_term_wise_crq_ids_eu($grade_id, $sub_id, $phase, $limit = 2)
	{
		// Allowed subjects
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
	
		// Check if sub_id is allowed
		if (!in_array($sub_id, $allowed_subjects)) {
			return []; // Return empty if not allowed
		}
	
		// Get subcontent strand IDs by phase
		$this->db->select('subcs_id');
		$this->db->from('ci_subcontent_stands');
		$this->db->where('subcs_grade_id', $grade_id);
		$this->db->where('subcs_subject_id', $sub_id);
		$this->db->where('subcs_phase', $phase);
		$this->db->where('subcs_status', 1);
		$subcs_query = $this->db->get();
		$subcs_ids = array_column($subcs_query->result_array(), 'subcs_id');
	
		if (empty($subcs_ids)) {
			return []; // No strands found
		}
	
		// Get ERQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'ERQ');
		$this->db->where('item_total_marks >', 1); // ✅ Only items with marks > 1
		$this->db->where('item_active', 1);
		$this->db->where_in('item_subcstand_id', $subcs_ids); // Use subcs_ids
		$this->db->order_by('RAND()');
		$this->db->limit($limit);
	
		$query = $this->db->get();
		return array_column($query->result_array(), 'item_id');
	}

//////////////////////Model Function for Book Wise Papers (EU)//////////////////////////
	public function get_all_book_wise_papers_listing_eu()
	{
		$wh = [];
	
		// Allowed subjects
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
	
		// Convert to comma-separated list for SQL
		$subjects_in = implode(',', $allowed_subjects);
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en
			FROM ci_qat_papers p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
		";
	
		// Conditions
		$wh[] = "(p.qat_cs_id IS NULL)";
		$wh[] = "(p.qat_subcs_phase IS NULL)";
		$wh[] = "p.qat_sub_id IN ($subjects_in)";
	
		$WHERE = implode(' AND ', $wh);
	
		return $this->datatable->LoadJson($SQL, $WHERE);
	}

	public function get_book_wise_mcq_ids_eu($grade_id, $sub_id)
	{
		// Get MCQ items from ci_items_pilot using these subcs_ids
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'MCQ'); // ✅ Explicit condition for MCQ only
		$this->db->where('item_active', 1);
		$this->db->order_by('RAND()');
		$this->db->limit(10); // Adjust limit as needed
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}
	
	public function get_book_wise_erq_ids_sec_2_eu($grade_id, $sub_id)
	{
		// Get ERQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'ERQ'); // ✅ Only ERQ
		$this->db->where('item_total_marks >', 2); // ✅ Marks <= 3
		$this->db->where('item_active', 1);
		$this->db->order_by('RAND()');
		$this->db->limit(2); // Change as per your requirement
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}

	public function get_book_wise_erq_ids_sec_3_eu($grade_id, $sub_id)
	{
		// Get ERQ items from ci_items_pilot
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where('item_grade_id', $grade_id);
		$this->db->where('item_subject_id', $sub_id);
		$this->db->where('item_type', 'ERQ'); // ✅ Only ERQ
		$this->db->where('item_total_marks >', 3); // ✅ Only items with 4 marks
		$this->db->where('item_active', 1);
		$this->db->order_by('RAND()');
		$this->db->limit(1); // Adjust limit if needed
	
		$item_query = $this->db->get();
		return array_column($item_query->result_array(), 'item_id');
	}
	
	public function get_book_wise_pg_mcq_ids_eu($grade_id, $sub_id)
	{
		// Allowed subjects
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
	
		// Check if sub_id is allowed
		if (!in_array($sub_id, $allowed_subjects)) {
			return []; // Return empty if not allowed
		}	
		
		// Get paragraph IDs from ci_items_paragraphs_pilot
		$this->db->select('para_id');
		$this->db->from('ci_items_paragraphs_pilot');
		$this->db->where('para_grade_id', $grade_id);
		$this->db->where('para_subject_id', $sub_id);
		$this->db->order_by('RAND()');
		$this->db->limit(1);
	
		$query = $this->db->get();
		return array_column($query->result_array(), 'para_id');
	}
	
//=======================================================================================
	public function get_all_unit_wise_papers_eu_sub()
	{
		$wh = array();
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48, 65, 66, 67];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
		$subjects_in = implode(',', $allowed_subjects);
	
		// Add conditions
		$wh[] = "p.qat_cs_id IS NOT NULL";
		$wh[] = "p.qat_subcs_phase IS NULL";
		$wh[] = "p.qat_sub_id IN ($subjects_in)";
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en,
				cs.cs_statement_en
			FROM ci_qat_papers_sub p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
			LEFT JOIN ci_content_stands cs ON p.qat_cs_id = cs.cs_id
		";
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);
	}
	
	public function get_sub_unit_wise_mcq_ids_eu($grade_id, $sub_id, $cs_id, $subcs_id)
	{
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where([
			'item_grade_id' => $grade_id,
			'item_subject_id' => $sub_id,
			'item_cstand_id' => $cs_id,
			'item_type' => 'MCQ',
			'item_active' => '1'
		]);
		$this->db->where_in('item_subcstand_id', $subcs_id);
		 $this->db->group_by('item_id');
		$this->db->order_by('RAND()');
		$this->db->limit(10);
		$query = $this->db->get();
		return array_column($query->result_array(), 'item_id');
	}
	
	public function get_sub_unit_wise_mcq_ids_sm($grade_id, $sub_id, $cs_id, $subcs_id)
	{
		$this->db->select('item_id');
		$this->db->from('ci_items_pilot');
		$this->db->where([
			'item_grade_id' => $grade_id,
			'item_subject_id' => $sub_id,
			'item_cstand_id' => $cs_id,
			'item_type' => 'MCQ',
			'item_active' => '1'
		]);
		$this->db->where_in('item_subcstand_id', $subcs_id);
		 $this->db->group_by('item_id');
		$this->db->order_by('RAND()');
		$this->db->limit(13);
		$query = $this->db->get();
		return array_column($query->result_array(), 'item_id');
	}
	
	public function insert_qat_paper_sub($data)
	{
		$this->db->insert('ci_qat_papers_sub', $data);
		return $this->db->insert_id();
	}
	
	public function get_qat_sub_paper_by_id($id)
	{
		$query = $this->db->get_where('ci_qat_papers_sub', ['qat_id' => $id]);
		return $query->row_array();
	}
//======================================================================
	public function get_all_sub_unit_wise_papers_listing()
	{
		$wh = array();
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48, 65, 66, 67];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
		$subjects_in = implode(',', $allowed_subjects);
	
		// Add conditions
		$wh[] = "p.qat_cs_id IS NOT NULL";
		$wh[] = "p.qat_subcs_phase IS NULL";
		$wh[] = "p.qat_sub_id NOT IN ($subjects_in)";
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en,
				cs.cs_statement_en,
				cs.cs_statement_ur,
				subcs.subcs_topic_en,
				subcs.subcs_topic_ur
			FROM ci_qat_papers_sub p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
			LEFT JOIN ci_content_stands cs ON p.qat_cs_id = cs.cs_id
			LEFT JOIN ci_subcontent_stands subcs ON p.qat_subcs_id = subcs.subcs_id
		";
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);
	}
	
	public function get_all_sub_unit_wise_papers_listing_eu()
	{
		$wh = array();
		$english_subjects = [4, 8, 12, 18, 25, 31, 39, 47];
		$urdu_subjects    = [5, 9, 13, 19, 26, 32, 40, 48, 65, 66, 67];
		$allowed_subjects = array_merge($english_subjects, $urdu_subjects);
		$subjects_in = implode(',', $allowed_subjects);
	
		// Add conditions
		$wh[] = "p.qat_cs_id IS NOT NULL";
		$wh[] = "p.qat_subcs_phase IS NULL";
		$wh[] = "p.qat_sub_id IN ($subjects_in)";
	
		$SQL = "
			SELECT 
				p.*,
				g.grade_name_en,
				s.subject_name_en,
				cs.cs_statement_en,
				cs.cs_statement_ur,
				subcs.subcs_topic_en,
				subcs.subcs_topic_ur
			FROM ci_qat_papers_sub p
			LEFT JOIN ci_grades g ON p.qat_grade_id = g.grade_id
			LEFT JOIN ci_subjects s ON p.qat_sub_id = s.subject_id
			LEFT JOIN ci_content_stands cs ON p.qat_cs_id = cs.cs_id
			LEFT JOIN ci_subcontent_stands subcs ON p.qat_subcs_id = subcs.subcs_id
		";
		$WHERE = implode(' AND ', $wh);
		return $this->datatable->LoadJson($SQL, $WHERE);
	}
}
?>