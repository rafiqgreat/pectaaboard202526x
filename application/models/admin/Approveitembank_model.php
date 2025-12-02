<?php
	class Approveitembank_model extends CI_Model{
	public function get_all_added_subjects()
	{
		$this->db->select('ib_subject_id')->from('ci_itemsbank');
		$query = $this->db->get();			
		return $result = $query->result_array();	
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id';
			$wh[] = 'ib_status=1';
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}			
			/*
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			*/
		}
		
		public function get_all_itemsbank_complete(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id LEFT JOIN `ci_paperinstructions` ON  pi_subject_id = ib_subject_id ';
			$wh[] = 'ib_status=1';
			$wh[] =  "pi_id != ''";
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}			
			/*
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			*/
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank_IE($admin_id){		
			$wh =array('item_submittedby='.$admin_id);
			$SQL ='SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id ';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
			/*
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			*/
		}
///////////////////////////////////////////////////
	public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
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
function get_ae_subjects_by_grade($grade_id,$subjectList)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
function get_subjects_by_grade($grade_id)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
///////////////////////////////////////////////////Get Contenstand by subject using ajax call	
function get_cstands_by_subject($subject_id)
		{
			$this->db->select('cs_id,cs_number,cs_statement_en,cs_statement_ur')
					 ->from('ci_content_stands')
					 ->where('cs_subject_id', $subject_id)
					 ->where('cs_status', 1);					 
			$query = $this->db->get();
			//die($query);			
			return $result = $query->result_array();			
		}
///////////////////////////////////////////////////Get Contenstand by subject using ajax call	
function get_itemcode_by_subject($subject_id)
		{
			$this->db->select('COUNT(item_id)+1 AS maxitems, subject_code, (subject_gradeid-2) AS grade')
					 ->from('ci_subjects')
					 ->join('ci_items', 'item_subject_id = subject_id', 'left')
					 ->where('subject_id', $subject_id)
					 ->where('subject_status', 1)
					 ->group_by('subject_id'); 
			$query = $this->db->get();
			//die($query);			
			return $result = $query->result_array();			
		}
///////////////////////////////////////////////////Get SubContentStand by Content Stand using ajax call
function get_subcstands_by_cstand($cs_id)
		{
			$this->db->select('subcs_id,subcs_number,subcs_topic_en,subcs_topic_ur')
					 ->from('ci_subcontent_stands')
					 ->where('subcs_cstand_id', $cs_id)
					 ->where('subcs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
///////////////////////////////////////////////////Get SLOs by SubContentStand Using Ajax Call
function get_slos_by_subcstands($subcs_id)
		{
			$this->db->select('slo_id, slo_number, slo_statement_en, slo_statement_ur')
					 ->from('ci_slos')
					 ->where('slo_subcstand_id', $subcs_id)
					 ->where('slo_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
//////////////////////////////////////////////////
function get_item_by_slo($slo_id)
		{
			$this->db->select('item_id, item_stem_en, item_stem_ur, item_code')
					 ->from('ci_items')
					 ->where('item_slo_id', $slo_id)
					 ->where('item_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
//////////////////////////////////////////////////
		
		function change_status()
		{		
			$this->db->set('ib_verified', $this->input->post('status'));
			$this->db->set('ib_verifiedby', $this->session->userdata('admin_id'));
			$this->db->set('ib_verified_dt', date("Y-m-d H:i:s"));
			$this->db->where('ib_id', $this->input->post('ib_id'));
			$this->db->update('ci_itemsbank');
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
		
		public function get_items_for_export(){			
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_gradeid')
					 ->join('ci_admin', 'admin_id= item_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_items_csv_export(){			
			$this->db->select('item_id, item_code, item_name_en, item_name_ur, item_sort, grade_code, IF(item_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id= item_gradeid');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_itemsbank_by_id($id){
			$this->db->select('*')
					 ->from('ci_itemsbank')
					 ->join('ci_grades', 'grade_id = ib_grade_id')
					 ->join('ci_paperinstructions', 'pi_subject_id = ib_subject_id')
					 ->join('ci_subjects', 'subject_id = ib_subject_id')
					 ->join('ci_admin', 'admin_id = ib_createdby')
					 ->where('ib_id', $id);
			$query = $this->db->get(); 
			//die($this->db->last_query());
			return $result = $query->result_array();			
		}
		
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
		
		public function get_item_detail_by_id($id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		/*
		public function get_paras_by_subject($id){
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->where('para_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		*/
		public function get_paras16_by_subject($id){
			$this->db->select('ci_items_paragraphs.*, i21.item_id AS i21id, i21.item_stem_en AS i21stem_en, i21.item_stem_ur AS i21stem_ur, i21.item_image_en AS i21image_en, i21.item_image_ur AS i21image_ur, i21.item_image_position AS i21image_position, i21.item_option_layout AS i21option_layout, i21.item_option_a_en AS i21option_a_en, i21.item_option_a_ur AS i21option_a_ur, i21.item_option_a_image AS i21option_a_image, i21.item_option_b_en AS i21option_b_en, i21.item_option_b_ur AS i21option_b_ur, i21.item_option_b_image AS i21option_b_image, i21.item_option_c_en AS i21option_c_en, i21.item_option_c_ur AS i21option_c_ur, i21.item_option_c_image AS i21option_c_image, i21.item_option_d_en AS i21option_d_en, i21.item_option_d_ur AS i21option_d_ur, i21.item_option_d_image AS i21option_d_image, i21.item_option_correct AS i21option_correct, i21.item_sort AS i21sort, i22.item_id AS i22id,i22.item_stem_en AS i22stem_en, i22.item_stem_ur AS i22stem_ur, i22.item_image_en AS i22image_en, i22.item_image_ur AS i22image_ur, i22.item_image_position AS i22image_position,  i22.item_option_layout AS i22option_layout, i22.item_option_a_en AS i22option_a_en, i22.item_option_a_ur AS i22option_a_ur, i22.item_option_a_image AS i22option_a_image, i22.item_option_b_en AS i22option_b_en, i22.item_option_b_ur AS i22option_b_ur, i22.item_option_b_image AS i22option_b_image, i22.item_option_c_en AS i22option_c_en, i22.item_option_c_ur AS i22option_c_ur, i22.item_option_c_image AS i22option_c_image, i22.item_option_d_en AS i22option_d_en, i22.item_option_d_ur AS i22option_d_ur, i22.item_option_d_image AS i22option_d_image, i22.item_option_correct AS i22option_correct, i22.item_sort AS i22sort, i23.item_id AS i23id,i23.item_stem_en AS i23stem_en, i23.item_stem_ur AS i23stem_ur, i23.item_image_en AS i23image_en, i23.item_image_ur AS i23image_ur, i23.item_image_position AS i23image_position,  i23.item_option_layout AS i23option_layout, i23.item_option_a_en AS i23option_a_en, i23.item_option_a_ur AS i23option_a_ur, i23.item_option_a_image AS i23option_a_image, i23.item_option_b_en AS i23option_b_en, i23.item_option_b_ur AS i23option_b_ur, i23.item_option_b_image AS i23option_b_image, i23.item_option_c_en AS i23option_c_en, i23.item_option_c_ur AS i23option_c_ur, i23.item_option_c_image AS i23option_c_image, i23.item_option_d_en AS i23option_d_en, i23.item_option_d_ur AS i23option_d_ur, i23.item_option_d_image AS i23option_d_image, i23.item_option_correct AS i23option_correct, i23.item_sort AS i23sort, i24.item_id AS i24id,i24.item_stem_en AS i24stem_en, i24.item_stem_ur AS i24stem_ur, i24.item_image_en AS i24image_en, i24.item_image_ur AS i24image_ur, i24.item_image_position AS i24image_position,  i24.item_option_layout AS i24option_layout, i24.item_option_a_en AS i24option_a_en, i24.item_option_a_ur AS i24option_a_ur, i24.item_option_a_image AS i24option_a_image, i24.item_option_b_en AS i24option_b_en, i24.item_option_b_ur AS i24option_b_ur, i24.item_option_b_image AS i24option_b_image, i24.item_option_c_en AS i24option_c_en, i24.item_option_c_ur AS i24option_c_ur, i24.item_option_c_image AS i24option_c_image, i24.item_option_d_en AS i24option_d_en, i24.item_option_d_ur AS i24option_d_ur, i24.item_option_d_image AS i24option_d_image, i24.item_option_correct AS i24option_correct, i24.item_sort AS i24sort, i25.item_id AS i25id,i25.item_stem_en AS i25stem_en, i25.item_stem_ur AS i25stem_ur, i25.item_image_en AS i25image_en, i25.item_image_ur AS i25image_ur, i25.item_image_position AS i25image_position,  i25.item_option_layout AS i25option_layout, i25.item_option_a_en AS i25option_a_en, i25.item_option_a_ur AS i25option_a_ur, i25.item_option_a_image AS i25option_a_image, i25.item_option_b_en AS i25option_b_en, i25.item_option_b_ur AS i25option_b_ur, i25.item_option_b_image AS i25option_b_image, i25.item_option_c_en AS i25option_c_en, i25.item_option_c_ur AS i25option_c_ur, i25.item_option_c_image AS i25option_c_image, i25.item_option_d_en AS i25option_d_en, i25.item_option_d_ur AS i25option_d_ur, i25.item_option_d_image AS i25option_d_image, i25.item_option_correct AS i25option_correct, i25.item_sort AS i25sort')
			->from('ci_items_paragraphs')
			->join('ci_items i21', 'para_item_21 = i21.item_id', 'left')
			->join('ci_items i22', 'para_item_22 = i22.item_id', 'left')
			->join('ci_items i23', 'para_item_23 = i23.item_id', 'left')
			->join('ci_items i24', 'para_item_24 = i24.item_id', 'left')
			->join('ci_items i25', 'para_item_25 = i25.item_id', 'left')
			->where('para_start_from', '16')
			->where('para_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		
		public function get_paras_by_subject($id){
			$this->db->select('ci_items_paragraphs.*, i21.item_id AS i21id, i21.item_stem_en AS i21stem_en, i21.item_stem_ur AS i21stem_ur, i21.item_image_en AS i21image_en, i21.item_image_ur AS i21image_ur, i21.item_image_position AS i21image_position, i21.item_option_layout AS i21option_layout, i21.item_option_a_en AS i21option_a_en, i21.item_option_a_ur AS i21option_a_ur, i21.item_option_a_image AS i21option_a_image, i21.item_option_b_en AS i21option_b_en, i21.item_option_b_ur AS i21option_b_ur, i21.item_option_b_image AS i21option_b_image, i21.item_option_c_en AS i21option_c_en, i21.item_option_c_ur AS i21option_c_ur, i21.item_option_c_image AS i21option_c_image, i21.item_option_d_en AS i21option_d_en, i21.item_option_d_ur AS i21option_d_ur, i21.item_option_d_image AS i21option_d_image, i21.item_option_correct AS i21option_correct, i21.item_sort AS i21sort, i22.item_id AS i22id,i22.item_stem_en AS i22stem_en, i22.item_stem_ur AS i22stem_ur, i22.item_image_en AS i22image_en, i22.item_image_ur AS i22image_ur, i22.item_image_position AS i22image_position,  i22.item_option_layout AS i22option_layout, i22.item_option_a_en AS i22option_a_en, i22.item_option_a_ur AS i22option_a_ur, i22.item_option_a_image AS i22option_a_image, i22.item_option_b_en AS i22option_b_en, i22.item_option_b_ur AS i22option_b_ur, i22.item_option_b_image AS i22option_b_image, i22.item_option_c_en AS i22option_c_en, i22.item_option_c_ur AS i22option_c_ur, i22.item_option_c_image AS i22option_c_image, i22.item_option_d_en AS i22option_d_en, i22.item_option_d_ur AS i22option_d_ur, i22.item_option_d_image AS i22option_d_image, i22.item_option_correct AS i22option_correct, i22.item_sort AS i22sort, i23.item_id AS i23id,i23.item_stem_en AS i23stem_en, i23.item_stem_ur AS i23stem_ur, i23.item_image_en AS i23image_en, i23.item_image_ur AS i23image_ur, i23.item_image_position AS i23image_position,  i23.item_option_layout AS i23option_layout, i23.item_option_a_en AS i23option_a_en, i23.item_option_a_ur AS i23option_a_ur, i23.item_option_a_image AS i23option_a_image, i23.item_option_b_en AS i23option_b_en, i23.item_option_b_ur AS i23option_b_ur, i23.item_option_b_image AS i23option_b_image, i23.item_option_c_en AS i23option_c_en, i23.item_option_c_ur AS i23option_c_ur, i23.item_option_c_image AS i23option_c_image, i23.item_option_d_en AS i23option_d_en, i23.item_option_d_ur AS i23option_d_ur, i23.item_option_d_image AS i23option_d_image, i23.item_option_correct AS i23option_correct, i23.item_sort AS i23sort, i24.item_id AS i24id,i24.item_stem_en AS i24stem_en, i24.item_stem_ur AS i24stem_ur, i24.item_image_en AS i24image_en, i24.item_image_ur AS i24image_ur, i24.item_image_position AS i24image_position,  i24.item_option_layout AS i24option_layout, i24.item_option_a_en AS i24option_a_en, i24.item_option_a_ur AS i24option_a_ur, i24.item_option_a_image AS i24option_a_image, i24.item_option_b_en AS i24option_b_en, i24.item_option_b_ur AS i24option_b_ur, i24.item_option_b_image AS i24option_b_image, i24.item_option_c_en AS i24option_c_en, i24.item_option_c_ur AS i24option_c_ur, i24.item_option_c_image AS i24option_c_image, i24.item_option_d_en AS i24option_d_en, i24.item_option_d_ur AS i24option_d_ur, i24.item_option_d_image AS i24option_d_image, i24.item_option_correct AS i24option_correct, i24.item_sort AS i24sort, i25.item_id AS i25id,i25.item_stem_en AS i25stem_en, i25.item_stem_ur AS i25stem_ur, i25.item_image_en AS i25image_en, i25.item_image_ur AS i25image_ur, i25.item_image_position AS i25image_position,  i25.item_option_layout AS i25option_layout, i25.item_option_a_en AS i25option_a_en, i25.item_option_a_ur AS i25option_a_ur, i25.item_option_a_image AS i25option_a_image, i25.item_option_b_en AS i25option_b_en, i25.item_option_b_ur AS i25option_b_ur, i25.item_option_b_image AS i25option_b_image, i25.item_option_c_en AS i25option_c_en, i25.item_option_c_ur AS i25option_c_ur, i25.item_option_c_image AS i25option_c_image, i25.item_option_d_en AS i25option_d_en, i25.item_option_d_ur AS i25option_d_ur, i25.item_option_d_image AS i25option_d_image, i25.item_option_correct AS i25option_correct, i25.item_sort AS i25sort')
					 ->from('ci_items_paragraphs')
					 ->join('ci_items i21', 'para_item_21 = i21.item_id','left')
					 ->join('ci_items i22', 'para_item_22 = i22.item_id','left')
					 ->join('ci_items i23', 'para_item_23 = i23.item_id','left')
					 ->join('ci_items i24', 'para_item_24 = i24.item_id','left')
					 ->join('ci_items i25', 'para_item_25 = i25.item_id','left')
					 ->where('para_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		
		public function get_item_by_id($item_id){
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
		public function get_paraid($id){
			$this->db->select('para_id')
					 ->from('ci_items_paragraphs')
					 ->where('para_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
	}
?>