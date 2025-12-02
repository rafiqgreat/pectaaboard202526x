<?php
	class Itemsbank_model extends CI_Model{
		public function add_itemsbank_mcq($data){
			$this->db->insert('ci_itemsbank_mcq', $data);
			return true;
		}
		public function add_approved_itemsbank_mcq($data){
			$this->db->insert('ci_itemsbank_final', $data);
			return true;
		}
		public function add_approved_itemsbank_crq($data){
			$this->db->insert('ci_itemsbank_final', $data);
			return true;
		}
		public function add_itemsbank_crq($data){
			$this->db->insert('ci_itemsbank_crq', $data);
			return true;
		}
	public function get_all_added_subjects()
	{
		$this->db->select('ibm_subject_id')->from('ci_itemsbank_mcq')->group_by('ibm_subject_id');
		$query = $this->db->get();			
		return $result = $query->result_array();
		/*echo $this->db->last_query();
		die();*/
	}
	public function get_all_crqs_added_subjects()
	{
		$this->db->select('ibc_subject_id')->from('ci_itemsbank_crq')->group_by('ibc_subject_id');
		$query = $this->db->get();			
		return $result = $query->result_array();
		/*echo $this->db->last_query();
		die();*/
	}	
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank(){		
			$wh =array('ib_status=1');
			$SQL ='SELECT * FROM ci_itemsbank LEFT JOIN ci_grades ON grade_id = ib_grade_id LEFT JOIN ci_subjects ON subject_id = ib_subject_id LEFT JOIN ci_admin ON ib_createdby = admin_id';
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
		
		public function get_all_itemsbank_ss_mcqs($admin_id, $subjectList){		
			$wh =array('ibm_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * 
					FROM ci_itemsbank_mcq 
					LEFT JOIN ci_grades ON grade_id = ibm_grade_id 
					LEFT JOIN ci_subjects ON subject_id = ibm_subject_id 
					LEFT JOIN ci_itembank_setting ON ibs_subject_id = ibm_subject_id 
					LEFT JOIN ci_admin ON ibm_createdby = admin_id ';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				$GROUP_BY=' GROUP BY ibm_subject_id ';
				return $this->datatable->LoadJson($SQL,$WHERE, $GROUP_BY);
				/*echo $this->db->last_query();
			die();*/
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}			
		}
		
		public function get_all_itemsbank_ss_crqs($admin_id, $subjectList){		
			$wh =array('ibc_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * 
					FROM ci_itemsbank_crq 
					LEFT JOIN ci_grades ON grade_id = ibc_grade_id 
					LEFT JOIN ci_subjects ON subject_id = ibc_subject_id 
					LEFT JOIN ci_itembank_setting ON ibs_subject_id = ibc_subject_id 
					LEFT JOIN ci_admin ON ibc_createdby = admin_id ';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE, ' GROUP BY ibc_subject_id ');
				/*echo $this->db->last_query();
			die();*/
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}			
		}
		
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank_IE($admin_id, $subjectList){		
			$wh =array('ib_subject_id IN ('.$subjectList.')');
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
		}
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemsbank_IW($admin_id, $subjectList){		
			$wh =array('ib_subject_id IN ('.$subjectList.')');
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
			$this->db->set('ib_status', $this->input->post('status'));
			$this->db->where('ib_id', $this->input->post('ib_id'));
			$this->db->update('ci_itemsbank');
		} 
		function change_status_approve()
		{
			$this->db->set('ib_verified', $this->input->post('status'));
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
		
		
		public function get_items_for_export(){			
			$this->db->select('*')
					 ->from('ci_itemsbank');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_items_csv_export(){			
			$this->db->select('*')
					 ->from('ci_itemsbank');
					 
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
		
		public function all_items_mcqs_by_subject($id){
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->join('ci_slos', 'slo_id = item_slo_id')
					 ->where('item_subject_id', $id)
					 ->where('item_type', 'MCQ')
			         ->order_by("slo_number", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function all_paras_mcqs_by_subject($id){
			$this->db->select('*')
					 ->from('ci_items_paragraphs_pilot')
					 ->where('para_subject_id', $id)
					 ->where('para_status_ae', 2);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function all_items_crqs_by_subject($id){
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->join('ci_slos', 'slo_id = item_slo_id')
					 ->where('item_subject_id', $id)
					 ->where('item_type', 'ERQ')
			         ->order_by("slo_number", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function all_group_crqs_by_subject($id){
			$this->db->select('ci_items_group_pilot.*,i1.item_stem_en as group_item_1_stem_en, i1.item_stem_ur as group_item_2_stem_ur, i2.item_stem_en as group_item_2_stem_en, i2.item_stem_ur as group_item_2_stem_ur ')
					 ->from('ci_items_group_pilot')
					 ->join('ci_items_pilot i1', 'i1.item_id = group_item_1', 'left')
					 ->join('ci_items_pilot i2', 'i2.item_id = group_item_2', 'left')
					 ->where('group_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		
		public function all_blocks_by_subject($id){
			$this->db->select('*')
					 ->from('ci_itembank_setting')
					 ->where('ibs_subject_id', $id)
			         ->order_by("ibs_id", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		public function get_itemsbank_by_id($id){
			$this->db->select('*')
					 ->from('ci_itemsbank_mcq')
					 ->join('ci_grades', 'grade_id = ibm_grade_id')
					 ->join('ci_subjects', 'subject_id = ibm_subject_id')
					 ->join('ci_admin', 'admin_id = ibm_createdby')
					 ->where('ib_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		public function get_itemsbank_mcq_by_subjectid($subjectid){
			$this->db->select('*')
					 ->from('ci_itemsbank_mcq')
					 ->join('ci_grades', 'grade_id = ibm_grade_id')
					 ->join('ci_subjects', 'subject_id = ibm_subject_id')
					 ->join('ci_admin', 'admin_id = ibm_createdby')
					 ->where('ibm_subject_id', $subjectid)
					 //->where('ibm_block_no !=', 0)
					 ->order_by('ibm_block_no', 'ASC')
					 ->order_by('ibm_order', 'ASC')
					 ->limit(1);
			$query = $this->db->get();
			/*die($this->db->last_query());*/
			return $result = $query->result();			
		}
		public function get_itemsbank_crq_by_subjectid($subjectid){
			$this->db->select('*')
					 ->from('ci_itemsbank_crq')
					 ->join('ci_grades', 'grade_id = ibc_grade_id')
					 ->join('ci_subjects', 'subject_id = ibc_subject_id')
					 ->join('ci_admin', 'admin_id = ibc_createdby')
					 ->where('ibc_subject_id', $subjectid)
					 ->order_by('ibc_block_no', 'ASC')
					 ->order_by('ibc_order', 'ASC')
					 ->limit(1);
			$query = $this->db->get();
			/*die($this->db->last_query());*/
			return $result = $query->result();			
		}
		public function itembank_selected_mcqs_by_subject($subjectid, $blockno, $quetionorder){
			$query = $this->db->get_where('ci_itemsbank_mcq', array('ibm_subject_id' => $subjectid, 'ibm_block_no'=>$blockno, 'ibm_order'=>$quetionorder));
			return $result = $query->row_array();
		}
		public function itembank_selected_crqs_by_subject($subjectid, $blockno, $quetionorder){
			$query = $this->db->get_where(' ci_itemsbank_crq ', array('ibc_subject_id' => $subjectid, 'ibc_block_no'=>$blockno, 'ibc_order'=>$quetionorder));
			return $result = $query->row_array();
		}
		public function itembank_selected_mcqs_para_by_subject($subjectid, $blockno, $quetionorder){
			$query = $this->db->get_where('ci_itemsbank_mcq', array('ibm_subject_id' => $subjectid, 'ibm_block_no'=>$blockno, 'ibm_order'=>$quetionorder));
			return $result = $query->row_array();
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
		function get_itembank_mcqs($subjectid)
		{
			/*$SQL ='SELECT * 
					FROM ci_itemsbank_mcq 
					LEFT JOIN ci_grades ON grade_id = ibm_grade_id 
					LEFT JOIN ci_subjects ON subject_id = ibm_subject_id 
					LEFT JOIN ci_itembank_setting ON ibs_subject_id = ibm_subject_id 
					LEFT JOIN ci_admin ON ibm_createdby = admin_id ';*/
			$this->db->select('*')
					 ->from('ci_itemsbank_mcq')
					 ->join('ci_subjects', 'subject_id = ibm_subject_id', 'left')
					 ->join('ci_items_pilot', 'item_id = ibm_item_id', 'left')
					 ->where('ibm_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibm_subject_id', $subjectid);	 
			$query = $this->db->get();
			return $result = $query->result();
			/*echo $this->db->last_query();
			die();*/
		}
		
		function get_itembank_mcqs_final_move($subjectid)
		{
			$sql = "SELECT GROUP_CONCAT(ibm_item_id) AS itemids FROM `ci_itemsbank_mcq` WHERE ibm_subject_id = ".$subjectid." AND ibm_item_id != 0";
			//questions
			$this->db->select('GROUP_CONCAT(ibm_item_id) AS itemids')
					 ->from('ci_itemsbank_mcq')
					 ->where('ibm_item_id !=', 0)
					 ->where('ibm_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultquestions = $query->row_array();
			
			//Move questions to items_final
			if($resultquestions['itemids'] != '')
			{
				$sql = "INSERT IGNORE INTO ci_items_final 
					SELECT `item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_awards_file`
					FROM ci_items_pilot WHERE item_id IN (".$resultquestions['itemids'].") ";
				$this->db->query($sql);
			}
			
			//Para questions
			$this->db->select('GROUP_CONCAT(ibm_para_id) AS paraids')
					 ->from('ci_itemsbank_mcq')
					 ->where('ibm_para_id !=', 0)
					 ->where('ibm_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultpara = $query->row_array();
			
			if($resultpara['paraids'] != '')
			{
				//move para to paragraphs final
				$sql = "INSERT IGNORE INTO ci_items_paragraphs_final 
						SELECT `para_id`, `para_title_en`, `para_title_ur`, `para_text_en`, `para_text_ur`, `para_img_position`, `para_image`, `para_start_from`, `para_grade_id`, `para_subject_id`, `para_item_21`, `para_item_22`, `para_item_23`, `para_item_24`, `para_item_25`, `para_item_26`, `para_item_27`, `para_item_28`, `para_item_29`, `para_item_30`, `para_statistics`, `para_ordering`, `para_status`
						FROM ci_items_paragraphs_pilot WHERE para_id IN (".$resultpara['paraids'].") ";
				$this->db->query($sql);
				
				//fetch para questions
				$this->db->select("GROUP_CONCAT( CONCAT( para_item_21,',', para_item_22,(IF( para_item_23!=0,CONCAT(',', para_item_23),'')),(IF( para_item_24!=0,CONCAT(',', para_item_24),'')),(IF( para_item_25!=0,CONCAT(',', para_item_25),'')),(IF( para_item_26!=0,CONCAT(',', para_item_26),'')),(IF( para_item_27!=0,CONCAT(',', para_item_27),'')),(IF( para_item_28!=0,CONCAT(',', para_item_28),'')),(IF( para_item_29!=0,CONCAT(',', para_item_29),'')),(IF( para_item_30!=0,CONCAT(',', para_item_30),'')))) as paraquestionids")
					 ->from('ci_items_paragraphs_pilot')
					 ->where('para_id IN ('.$resultpara['paraids'].')');	 
				$query = $this->db->get();
				$resultparaQuestions = $query->row_array();
				
				//Move para questions to items_final
				if($resultparaQuestions['paraquestionids'] != '')
				{
					$sql = "INSERT IGNORE INTO ci_items_final 
						SELECT `item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_awards_file`
						FROM ci_items_pilot WHERE item_id IN (".$resultparaQuestions['paraquestionids'].") ";
					 $this->db->query($sql);
				}
			}
		}
		
		function get_itembank_mcqs_final_move_remove($subjectid)
		{
			$sql = "SELECT GROUP_CONCAT(ibm_item_id) AS itemids FROM `ci_itemsbank_mcq` WHERE ibm_subject_id = ".$subjectid." AND ibm_item_id != 0";
			//questions
			$this->db->select('GROUP_CONCAT(ibm_item_id) AS itemids')
					 ->from('ci_itemsbank_mcq')
					 ->where('ibm_item_id !=', 0)
					 ->where('ibm_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultquestions = $query->row_array();
			
			//Move questions to items_final
			if($resultquestions['itemids'] != '')
			{
				$sql = "DELETE FROM ci_items_final WHERE item_id IN (".$resultquestions['itemids'].") ";
				$this->db->query($sql);
			}
			
			//Para questions
			$this->db->select('GROUP_CONCAT(ibm_para_id) AS paraids')
					 ->from('ci_itemsbank_mcq')
					 ->where('ibm_para_id !=', 0)
					 ->where('ibm_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultpara = $query->row_array();
			//echo $this->db->last_query(); die;
			if($resultpara['paraids'] != '')
			{
				//move para to paragraphs final
				$sql = "DELETE FROM ci_items_paragraphs_final WHERE para_id IN (".$resultpara['paraids'].") ";
				$this->db->query($sql);
				
				//fetch para questions
				$this->db->select("GROUP_CONCAT( CONCAT( para_item_21,',', para_item_22,(IF( para_item_23!=0,CONCAT(',', para_item_23),'')),(IF( para_item_24!=0,CONCAT(',', para_item_24),'')),(IF( para_item_25!=0,CONCAT(',', para_item_25),'')),(IF( para_item_26!=0,CONCAT(',', para_item_26),'')),(IF( para_item_27!=0,CONCAT(',', para_item_27),'')),(IF( para_item_28!=0,CONCAT(',', para_item_28),'')),(IF( para_item_29!=0,CONCAT(',', para_item_29),'')),(IF( para_item_30!=0,CONCAT(',', para_item_30),'')))) as paraquestionids")
					 ->from('ci_items_paragraphs_pilot')
					 ->where('para_id IN ('.$resultpara['paraids'].')');	 
				$query = $this->db->get();
				$resultparaQuestions = $query->row_array();
				
				//Move para questions to items_final
				if($resultparaQuestions['paraquestionids'] != '')
				{
					$sql = "DELETE FROM ci_items_final WHERE item_id IN (".$resultparaQuestions['paraquestionids'].") ";
					 $this->db->query($sql);
				}
				
			}
			$this->db->delete('ci_itemsbank_final', array('ibf_subject_id' => $subjectid, 'ibf_type' => 'MCQ'));
			//echo $this->db->last_query(); die;
		}
		
		function get_itembank_crqs_final_move($subjectid)
		{
			//$sql = "SELECT GROUP_CONCAT(ibc_item_id) AS itemids FROM `ci_itemsbank_crq` WHERE ibc_subject_id = ".$subjectid." AND ibc_item_id != 0";
			//questions
			$this->db->select('GROUP_CONCAT(ibc_item_id) AS itemids')
					 ->from('ci_itemsbank_crq')
					 ->where('ibc_item_id !=', 0)
					 ->where('ibc_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultquestions = $query->row_array();
			
			//Move questions to items_final
			if($resultquestions['itemids'] != '')
			{
				$sql = "INSERT IGNORE INTO ci_items_final 
					SELECT `item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_awards_file`
					FROM ci_items_pilot WHERE item_id IN (".$resultquestions['itemids'].") ";
				$this->db->query($sql);
			}
			
			//Group questions
			$this->db->select('GROUP_CONCAT(ibc_group_id) AS groupids')
					 ->from('ci_itemsbank_crq')
					 ->where('ibc_group_id !=', 0)
					 ->where('ibc_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultGroup = $query->row_array();
			
			if($resultGroup['groupids'] != '')
			{
				//move group to group final
				$sql = "INSERT IGNORE INTO ci_items_group_final 
						SELECT `group_id`, `group_title_en`, `group_title_ur`, `group_grade_id`, `group_subject_id`, `group_item_1`, `group_item_2`, `group_item_3`, `group_item_4`, `group_item_5`, `group_item_6`, `group_item_7`, `group_item_8`, `group_item_9`, `group_item_10`, `group_ordering`, `group_status`
						FROM ci_items_group_pilot WHERE group_id IN (".$resultGroup['groupids'].") ";
				$this->db->query($sql);

				//fetch group questions
				$this->db->select("GROUP_CONCAT( CONCAT( group_item_1,',',group_item_2,(IF(group_item_3!=0,CONCAT(',',group_item_3),'')),(IF(group_item_4!=0,CONCAT(',',group_item_4),'')),(IF(group_item_5!=0,CONCAT(',',group_item_5),'')),(IF(group_item_6!=0,CONCAT(',',group_item_6),'')),(IF(group_item_7!=0,CONCAT(',',group_item_7),'')),(IF(group_item_8!=0,CONCAT(',',group_item_8),'')),(IF(group_item_9!=0,CONCAT(',',group_item_9),'')),(IF(group_item_10!=0,CONCAT(',',group_item_10),'')))) as groupquestionids")
					 ->from('ci_items_group_pilot')
					 ->where('group_id IN ('.$resultGroup['groupids'].')');	 
				$query = $this->db->get();
				$resultGroupQuestions = $query->row_array();

				//Move group questions to items_final
				if($resultGroupQuestions['groupquestionids'] != '')
				{
					$sql = "INSERT IGNORE INTO ci_items_final 
						SELECT `item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_awards_file`
						FROM ci_items_pilot WHERE item_id IN (".$resultGroupQuestions['groupquestionids'].") ";
					 $this->db->query($sql);
				}
			}

		}
		
		function get_itembank_crqs_final_move_remove($subjectid)
		{
			//$sql = "SELECT GROUP_CONCAT(ibc_item_id) AS itemids FROM `ci_itemsbank_crq` WHERE ibc_subject_id = ".$subjectid." AND ibc_item_id != 0";
			//questions
			$this->db->select('GROUP_CONCAT(ibc_item_id) AS itemids')
					 ->from('ci_itemsbank_crq')
					 ->where('ibc_item_id !=', 0)
					 ->where('ibc_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultquestions = $query->row_array();
			
			//Move questions to items_final
			if($resultquestions['itemids'] != '')
			{
				$sql = "DELETE FROM ci_items_final WHERE item_id IN (".$resultquestions['itemids'].") ";
				$this->db->query($sql);
			}
			
			//Group questions
			$this->db->select('GROUP_CONCAT(ibc_group_id) AS groupids')
					 ->from('ci_itemsbank_crq')
					 ->where('ibc_group_id !=', 0)
					 ->where('ibc_subject_id', $subjectid);	 
			$query = $this->db->get();
			$resultGroup = $query->row_array();
			
			if($resultGroup['groupids'] != '')
			{
				//move group to group final
				$sql = "DELETE FROM ci_items_group_final WHERE group_id IN (".$resultGroup['groupids'].") ";
				$this->db->query($sql);

				//fetch group questions
				$this->db->select("GROUP_CONCAT( CONCAT( group_item_1,',',group_item_2,(IF(group_item_3!=0,CONCAT(',',group_item_3),'')),(IF(group_item_4!=0,CONCAT(',',group_item_4),'')),(IF(group_item_5!=0,CONCAT(',',group_item_5),'')),(IF(group_item_6!=0,CONCAT(',',group_item_6),'')),(IF(group_item_7!=0,CONCAT(',',group_item_7),'')),(IF(group_item_8!=0,CONCAT(',',group_item_8),'')),(IF(group_item_9!=0,CONCAT(',',group_item_9),'')),(IF(group_item_10!=0,CONCAT(',',group_item_10),'')))) as groupquestionids")
					 ->from('ci_items_group_pilot')
					 ->where('group_id IN ('.$resultGroup['groupids'].')');	 
				$query = $this->db->get();
				$resultGroupQuestions = $query->row_array();

				//Move group questions to items_final
				if($resultGroupQuestions['groupquestionids'] != '')
				{
					$sql = "DELETE FROM ci_items_final WHERE item_id IN (".$resultGroupQuestions['groupquestionids'].") ";
					 $this->db->query($sql);
				}
			}
			$this->db->delete('ci_itemsbank_final', array('ibf_subject_id' => $subjectid, 'ibf_type' => 'ERQ'));
		}
		
		function get_itembank_mcqs_final($subjectid, $type)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank_final')
					 ->where('ibf_subject_id', $subjectid)
					 ->where('ibf_type', $type);	 
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		function get_itembank_final($subjectid, $type)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank_final')
					 ->where('ibf_subject_id', $subjectid)
					 ->where('ibf_type', $type);	 
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		function get_itembank_mcqs_paras($subjectid)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank_mcq')
					 ->join('ci_subjects', 'subject_id = ibm_subject_id', 'left')
					 ->join('ci_items_paragraphs_pilot', 'para_id = ibm_para_id', 'left')
					 ->where('ibm_para_id !=', 0)	
					 ->where('ibm_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibm_subject_id', $subjectid);	 
			$query = $this->db->get();
			return $result = $query->result();
			/*echo $this->db->last_query();
			die();*/
		}
		
		function get_itembank_crqs($subjectid)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank_crq')
					 ->join('ci_subjects', 'subject_id = ibc_subject_id', 'left')
					 ->join('ci_items_group_pilot', 'group_id = ibc_group_id', 'left')
					 /*->where('ibc_group_id != ', 0)*/
					 ->where('ibc_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibc_subject_id', $subjectid);	 
			$query = $this->db->get();
			return $result = $query->result();
			/*echo $this->db->last_query();
			die();*/
		}
		function get_itembank_crqs_key($subjectid)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank_crq')
					 ->join('ci_subjects', 'subject_id = ibc_subject_id', 'left')
					 ->join('ci_items_group_pilot', 'group_id = ibc_group_id', 'left')
					 ->where('ibc_group_id != ', 0)
					 ->where('ibc_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibc_subject_id', $subjectid);	 
			$query = $this->db->get();
			return $result = $query->result();
			/*echo $this->db->last_query();
			die();*/
		}
		function get_itembank_crqs_ind($subjectid)
		{
			$this->db->select('*')
					 ->from('ci_itemsbank_crq')
					 ->join('ci_subjects', 'subject_id = ibc_subject_id', 'left')
					->join('ci_items_pilot', 'item_id = ibc_item_id', 'left')
					 ->where('ibc_item_id != ', 0)
					 ->where('ibc_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibc_subject_id', $subjectid);	 
			$query = $this->db->get();
			return $result = $query->result();
			/*echo $this->db->last_query();
			die();*/
		}
		public function get_item_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();			
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
		public function itemsbank_sumary($id)
		{
			/*$this->db->select('p_m_v'.$p_version.'_mcq_ids as ids')
					 ->from('ci_pilot_papers_mcqs')
					 ->where('p_subject_id', $p_subject)
					 ->where('p_phase', $p_phase);	 
			$query = $this->db->get();
			$result = $query->result();
		 	$ids = $result[0]->ids;
            //echo $ids.'<br>';
            $para_iitem_ids = $this->paper_para_item_ids($p_subject,$p_version,$p_phase);
            if($para_iitem_ids !=''){
              $ids .= ','.$para_iitem_ids; 
            }
            //echo 'All $ids'.$ids.'<br>';
			if(empty($ids)||$ids=='(NULL)'||$ids=='')
            {
                $this->session->set_flashdata('error', 'Paper cannot be generated/No item exist!');
                redirect(base_url('admin/pilotpaper'));
            }
            $this->db->select('*')
                     ->from('ci_items_pilot')
                     ->join('ci_subjects', 'subject_id = item_subject_id')
                     ->join('ci_content_stands', 'cs_id = item_cstand_id')
                     ->join('ci_slos', 'slo_id = item_slo_id')
                     ->join('ci_admin', 'admin_id = item_submittedby')
                     ->where('item_subject_id', $p_subject)
                     ->where('item_id IN ('.$ids.')');					 
             $query = $this->db->get();
             //echo $this->db->last_query();
             return $result = $query->result();*/
			 
			 $this->db->select('*')
					 ->from('ci_itemsbank_mcq')
					 ->join('ci_subjects', 'subject_id = ibm_subject_id', 'left')
					 ->join('ci_items_pilot', 'item_id = ibm_item_id', 'left')
                     ->join('ci_content_stands', 'cs_id = item_cstand_id', 'left')
                     ->join('ci_slos', 'slo_id = item_slo_id', 'left')
					 ->join('ci_items_paragraphs_pilot', 'para_id = ibm_para_id', 'left')
                     ->join('ci_admin', 'admin_id = item_submittedby', 'left')
					 ->where('ibm_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibm_subject_id', $id);	 
			$query = $this->db->get();
			return $result = $query->result();
		}
		public function get_para_by_ids($id)
		{
			$this->db->select('para_item_21, para_item_22, para_item_23, para_item_24, para_item_25, para_item_26, para_item_27, para_item_28, para_item_29, para_item_30')
					 ->from('ci_items_paragraphs_pilot')
					 ->where('para_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
		}
		public function get_itemdtl_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id', 'left')
					 ->join('ci_slos', 'slo_id = item_slo_id', 'left')
					 ->join('ci_admin', 'admin_id = item_submittedby', 'left')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		///////////////////////////////////////crq
		public function itemsbank_sumary_crq($id)
		{
			 $this->db->select('*')
					 ->from('ci_itemsbank_crq')
					 ->join('ci_subjects', 'subject_id = ibc_subject_id', 'left')
					 ->join('ci_items_pilot', 'item_id = ibc_item_id', 'left')
                     ->join('ci_content_stands', 'cs_id = item_cstand_id', 'left')
                     ->join('ci_slos', 'slo_id = item_slo_id', 'left')
					 ->join('ci_items_paragraphs_pilot', 'para_id = ibc_para_id', 'left')
                     ->join('ci_admin', 'admin_id = item_submittedby', 'left')
					 ->where('ibc_subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('ibc_subject_id', $id);	 
			$query = $this->db->get();
			return $result = $query->result();
		}
		public function get_group_by_ids($id)
		{
			$this->db->select('group_item_1, group_item_2, group_item_3, group_item_4, group_item_5, group_item_6, group_item_7, group_item_8, group_item_9, group_item_10')
					 ->from('ci_items_group_pilot')
					 ->where('group_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
		}
	}
?>