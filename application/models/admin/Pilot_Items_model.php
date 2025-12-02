<?php
class Pilot_Items_model extends CI_Model
{
	public function add_pilot($data)
	{
		$this->db->insert('ci_pilot_mcqs', $data);
		return true;
	}
	public function get_all_pilot_mcq_items($subjectList)
	{
		$excluded_items = "";
		$subjectList_arr = explode(',', $subjectList);
		$this->db->select('item_id')
			->from('ci_items_pilot')
			->where_in('item_subject_id', $subjectList_arr);
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $row) {
			if ($this->count_in_groups_pilot($row->item_id) > 0)
				$excluded_items .= $row->item_id . ",";
		}
		foreach ($result as $row2) {
			if ($this->count_in_paragraphs_pilot($row2->item_id) > 0)
				$excluded_items .= $row2->item_id . ",";
		}
		$excluded_items = rtrim($excluded_items, ",");

		$wh = array('item_subject_id IN (' . $subjectList . ')');
		$wh[] = 'item_type = "MCQ"';

		if (!empty($excluded_items)) {
			$wh[] = 'item_id NOT IN (' . $excluded_items . ')';
		}
		$SQL = 'SELECT * FROM ci_items_pilot LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id';
		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE);
			//echo $this->db->last_query();
			//die();
		} else {
			return $this->datatable->LoadJson($SQL);
		}
	}

	public function get_all_pilot_erq_items($subjectList)
	{
		$excluded_items = "";
		$subjectList_arr = explode(',', $subjectList);
		$this->db->select('item_id')
			->from('ci_items_pilot')
			->where_in('item_subject_id', $subjectList_arr);
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $row) {
			if ($this->count_in_groups_pilot($row->item_id) > 0)
				$excluded_items .= $row->item_id . ",";
		}
		foreach ($result as $row2) {
			if ($this->count_in_paragraphs_pilot($row2->item_id) > 0)
				$excluded_items .= $row2->item_id . ",";
		}
		$excluded_items = rtrim($excluded_items, ",");

		$wh = array('item_subject_id IN (' . $subjectList . ')');
		$wh[] = 'item_type = "ERQ"';

		if (!empty($excluded_items)) {
			$wh[] = 'item_id NOT IN (' . $excluded_items . ')';
		}
		$SQL = 'SELECT * FROM ci_items_pilot LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id';
		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE);
			//echo $this->db->last_query();
			//die();
		} else {
			return $this->datatable->LoadJson($SQL);
		}
	}

	public function count_in_groups_pilot($item_id)
	{
		$sql = "SELECT COUNT(group_id) AS founded FROM `ci_items_group_pilot` WHERE group_item_1 = '" . $item_id . "' OR group_item_2 = '" . $item_id . "' OR group_item_3 = '" . $item_id . "' OR group_item_4 = '" . $item_id . "' OR group_item_5 = '" . $item_id . "' OR group_item_6 = '" . $item_id . "' OR group_item_7 = '" . $item_id . "' OR group_item_8 = '" . $item_id . "' OR group_item_9 = '" . $item_id . "' OR group_item_10 = '" . $item_id . "'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result[0]->founded;
	}

	public function count_in_paragraphs_pilot($item_id)
	{
		$sql = "SELECT COUNT(para_id) AS founded FROM `ci_items_paragraphs_pilot` WHERE para_item_21 = '" . $item_id . "' OR para_item_22 = '" . $item_id . "' OR para_item_23 = '" . $item_id . "' OR para_item_24 = '" . $item_id . "' OR para_item_25 = '" . $item_id . "' OR para_item_26 = '" . $item_id . "' OR para_item_27 = '" . $item_id . "' OR para_item_28 = '" . $item_id . "' OR para_item_29 = '" . $item_id . "' OR para_item_30 = '" . $item_id . "'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result[0]->founded;
	}

	public function get_all_grades()
	{
		$this->db->select('grade_id,grade_code,grade_name_en,grade_name_ur')
			->from('ci_grades')
			->where('grade_status', 1);
		$query = $this->db->get();
		return $result = $query->result_array();
	}

	public function get_pilot_item_by_id($item_id)
	{
		$this->db->select('*')

			->from('ci_items_pilot')
			->join('ci_grades', 'grade_id = item_grade_id')
			->join('ci_subjects', 'subject_id = item_subject_id')
			->join('ci_content_stands', 'cs_id = item_cstand_id')
			->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
			->join('ci_slos', 'item_slo_id = slo_id')
			->where('item_id', $item_id);
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function get_pilot_item_by_id23($item_id)
	{
		$this->db->select('*')

			->from('ci_items_pilot_23')
			->join('ci_grades', 'grade_id = item_grade_id')
			->join('ci_subjects', 'subject_id = item_subject_id')
			->join('ci_content_stands', 'cs_id = item_cstand_id')
			->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
			->join('ci_slos', 'item_slo_id = slo_id')
			->where('item_id', $item_id);
		$query = $this->db->get();
		return $result = $query->result();
	}

	public function get_pilot_item_by_id24($item_id)
	{
		$this->db->select('*')

			->from('ci_items_pilot_24')
			->join('ci_grades', 'grade_id = item_grade_id')
			->join('ci_subjects', 'subject_id = item_subject_id')
			->join('ci_content_stands', 'cs_id = item_cstand_id')
			->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
			->join('ci_slos', 'item_slo_id = slo_id')
			->where('item_id', $item_id);
		$query = $this->db->get();
		return $result = $query->result();
	}


	public function get_item_logs($item_id)
	{
		$this->db->select('*')
			->from('ci_itemslog')
			->join('ci_admin', 'log_admin_id = admin_id')
			->where('log_itemid', $item_id);
		$query = $this->db->get();
		return $result = $query->result();
	}

	public function get_iwinfo_by_id($id)
	{
		$this->db->select('admin_id,username,firstname,lastname')
			->from('ci_admin')
			->where('admin_id', $id);
		$query = $this->db->get();
		return $result = $query->result_array();
	}

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

	function get_subcstands_by_cstand($cs_id)
	{
		$this->db->select('subcs_id,subcs_number,subcs_topic_en,subcs_topic_ur')
			->from('ci_subcontent_stands')
			->where('subcs_cstand_id', $cs_id)
			->where('subcs_status', 1);
		$query = $this->db->get();
		return $result = $query->result_array();
	}

	public function get_search_grade()
	{
		$this->db->select('grade_id, grade_name_en, grade_name_ur, grade_code')
			->from('ci_grades')
			//->where('subject_gradeid', $grade_id)
			//->where('subject_id IN ('.$subjectList.')')
			->where('grade_status', 1);
		$query = $this->db->get();
		return $result = $query->result_array();
	}

	public function get_ss_subjects_by_grade($grade_id, $subjectList = 0)
	{
		$this->db->select('*')
			->from('ci_subjects')
			->join('ci_grades', 'grade_id = subject_gradeid')
			->where('subject_gradeid', $grade_id)
			->where('subject_id IN (' . $subjectList . ')')
			->where('subject_status', 1);
		$query = $this->db->get();
		return $result = $query->result_array();
	}

	public function get_all_items_SS_searched($id = 0)
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$excluded_items = "";
		$subjectList_arr = explode(',', $subjectList);
		$this->db->select('item_id')
			->from('ci_items_pilot')
			->where_in('item_subject_id', $subjectList_arr);
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $row) {
			if ($this->count_in_groups_pilot($row->item_id) > 0)
				$excluded_items .= $row->item_id . ",";
		}
		foreach ($result as $row2) {
			if ($this->count_in_paragraphs_pilot($row2->item_id) > 0)
				$excluded_items .= $row2->item_id . ",";
		}
		$excluded_items = rtrim($excluded_items, ",");

		$temp = explode('_', $id);
		$search_grade = $temp[0];
		$search_subject = $temp[1];
		$search_cstrand = $temp[2];
		$search_subcstrand = $temp[3];

		if ($search_grade != 0)
			$wh = array('item_grade_id=' . $search_grade);
		if ($search_subject != 0)
			$wh[] = 'item_subject_id=' . $search_subject;
		if ($search_cstrand != 0)
			$wh[] = 'item_cstand_id=' . $search_cstrand;
		if ($search_subcstrand != 0)
			$wh[] = 'item_subcstand_id=' . $search_subcstrand;

		$wh[] = 'item_type="MCQ"';

		if (!empty($excluded_items)) {
			$wh[] = 'item_id NOT IN (' . $excluded_items . ')';
		}
		$wh[] = 'item_subject_id IN (' . $this->session->userdata('subjects_ids') . ')';
		$SQL = 'SELECT * FROM ci_items_pilot LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_content_stands ON cs_id = item_cstand_id LEFT JOIN ci_subcontent_stands ON subcs_id = item_subcstand_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE);
			//echo $this->db->last_query();
			//die();
		} else {
			return $this->datatable->LoadJson($SQL);
		}
	}

	public function get_all_items_erq_SS_searched($id = 0)
	{
		$subjectList = $this->session->userdata('subjects_ids');
		$excluded_items = "";
		$subjectList_arr = explode(',', $subjectList);
		$this->db->select('item_id')
			->from('ci_items_pilot')
			->where_in('item_subject_id', $subjectList_arr);
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $row) {
			if ($this->count_in_groups_pilot($row->item_id) > 0)
				$excluded_items .= $row->item_id . ",";
		}
		foreach ($result as $row2) {
			if ($this->count_in_paragraphs_pilot($row2->item_id) > 0)
				$excluded_items .= $row2->item_id . ",";
		}
		$excluded_items = rtrim($excluded_items, ",");

		$temp = explode('_', $id);
		$search_grade = $temp[0];
		$search_subject = $temp[1];
		$search_cstrand = $temp[2];
		$search_subcstrand = $temp[3];

		if ($search_grade != 0)
			$wh = array('item_grade_id=' . $search_grade);
		if ($search_subject != 0)
			$wh[] = 'item_subject_id=' . $search_subject;
		if ($search_cstrand != 0)
			$wh[] = 'item_cstand_id=' . $search_cstrand;
		if ($search_subcstrand != 0)
			$wh[] = 'item_subcstand_id=' . $search_subcstrand;

		$wh[] = 'item_type="ERQ"';

		if (!empty($excluded_items)) {
			$wh[] = 'item_id NOT IN (' . $excluded_items . ')';
		}
		$wh[] = 'item_subject_id IN (' . $this->session->userdata('subjects_ids') . ')';
		$SQL = 'SELECT * FROM ci_items_pilot LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_content_stands ON cs_id = item_cstand_id LEFT JOIN ci_subcontent_stands ON subcs_id = item_subcstand_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE);
			echo $this->db->last_query();
			die();
		} else {
			return $this->datatable->LoadJson($SQL);
		}
	}
	public function pilot_edit_items($data, $id)
	{
		$this->db->where('item_id', $id);
		$this->db->update('ci_items_pilot', $data);
		return true;
	}
	public function get_ae_subjects_grade($subjectList, $grade_id)
	{
		$this->db->select('subject_id,subject_code,subject_name_en')
			->from('ci_subjects')
			->where('subject_id IN (' . $subjectList . ')')
			->where('subject_status', 1)
			->where('subject_gradeid', $grade_id);
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	public function get_all_cstands_iw($subject_id)
	{
		$this->db->select('cs_id,cs_statement_en,cs_statement_ur,cs_number')
			->from('ci_content_stands')
			->where('cs_status', 1)
			->where('cs_subject_id', $subject_id);
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	public function get_all_subcstands_iw($cs_id)
	{
		$this->db->select('subcs_id,subcs_topic_en,subcs_topic_ur,subcs_number')
			->from('ci_subcontent_stands')
			->where('subcs_status', 1)
			->where('subcs_cstand_id', $cs_id);
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	public function get_all_slos_iw($subc_id)
	{
		$this->db->select('slo_id,slo_statement_en,slo_statement_ur,slo_number')
			->from('ci_slos')
			->where('slo_status', 1)
			->where('slo_subcstand_id', $subc_id);
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	public function log_entry($datalog)
	{
		$this->db->insert('ci_itemslog', $datalog);
		return true;
	}
	public function copy_item_history($id)
	{
		$sql = 'INSERT INTO ci_items_pilot_history (item_id, item_code, item_difficulty, item_discr, item_dif_code, item_registration, item_date_received, item_submitted, item_submittedby, item_updated, item_updatedby, item_grade_id, item_subject_id, item_cstand_id, item_subcstand_id, item_slo_id, item_cognitive_bloom, item_curriculum, item_pctb_chapter, item_pctb_page, item_other_title, item_other_year, item_other_page, item_relation, item_type, item_stem_number, item_stem_en, item_stem_ur, item_image_en, item_image_ur, item_image_position, item_option_layout, item_option_a_en, item_option_a_ur, item_option_a_image, item_option_b_en, item_option_b_ur, item_option_b_image, item_option_c_en, item_option_c_ur, item_option_c_image, item_option_d_en, item_option_d_ur, item_option_d_image, item_option_correct, item_sort, item_status, item_approved, item_approvedby, item_reviewed, item_reviewedby, item_rubric_english, item_rubric_urdu, item_rubric_image_position, item_rubric_image, item_status_ss, item_comment_ss, item_status_ae, item_comment_ae, item_status_psy, item_comment_psy, item_date_psy, item_commentby_psy, item_batch, item_rev_status, item_rev_revid, item_rev_date_acc, item_rev_date_exp, item_rev_comment, item_rev_ss_status, item_rev_ss_date_acc, item_rev_ss_comment, item_rev_ss_id, item_rev_ae_status, item_rev_ae_date_acc, item_rev_ae_comment, item_rev_ae_id, item_rev_psy_status, item_rev_psy_date_acc, item_rev_psy_comment, item_rev_psy_id, item_sequence, item_p_value, item_pilot_phase, item_rbis_value, item_flag, item_1_rbis, item_2_rbis, item_3_rbis, item_4_rbis, item_1g_1p, item_1g_2p, item_1g_3p, item_1g_4p, item_1g_5p, item_2g_1p, item_2g_2p, item_2g_3p, item_2g_4p, item_2g_5p, item_3g_1p, item_3g_2p, item_3g_3p, item_3g_4p, item_3g_5p, item_4g_1p, item_4g_2p, item_4g_3p, item_4g_4p, item_4g_5p, item_fib_key_eng, item_fib_key_ur, item_tf_eng_1, item_tf_eng_2, item_tf_ur_1, item_tf_ur_2, item_en_mc1_1, item_en_mc1_2, item_en_mc1_3, item_en_mc1_4, item_en_mc1_5, item_en_mc1_6, item_en_mc1_7, item_en_mc1_8, item_en_mc1_9, item_en_mc1_10, item_en_mc2_a, item_en_mc2_b, item_en_mc2_c, item_en_mc2_d, item_en_mc2_e, item_en_mc2_f, item_en_mc2_g, item_en_mc2_h, item_en_mc2_i, item_en_mc2_j, item_mc_ans_key, item_ur_mc1_1, item_ur_mc1_2, item_ur_mc1_3, item_ur_mc1_4, item_ur_mc1_5, item_ur_mc1_6, item_ur_mc1_7, item_ur_mc1_8, item_ur_mc1_9, item_ur_mc1_10, item_ur_mc2_a, item_ur_mc2_b, item_ur_mc2_c, item_ur_mc2_d, item_ur_mc2_e, item_ur_mc2_f, item_ur_mc2_g, item_ur_mc2_h, item_ur_mc2_i, item_ur_mc2_j, item_pic_mc1_1, item_pic_mc1_2, item_pic_mc1_3, item_pic_mc1_4, item_pic_mc1_5, item_pic_mc1_6, item_pic_mc1_7, item_pic_mc1_8, item_pic_mc1_9, item_pic_mc1_10, item_pic_mc2_a, item_pic_mc2_c, item_pic_mc2_e, item_pic_mc2_g, item_pic_mc2_i, item_pic_mc2_j, item_pic_mc2_b, item_pic_mc2_d, item_pic_mc2_f, item_pic_mc2_h, item_total_marks, item_pilot_his_createdby) SELECT item_id, item_code, item_difficulty, item_discr, item_dif_code, item_registration, item_date_received, item_submitted, item_submittedby, item_updated, item_updatedby, item_grade_id, item_subject_id, item_cstand_id, item_subcstand_id, item_slo_id, item_cognitive_bloom, item_curriculum, item_pctb_chapter, item_pctb_page, item_other_title, item_other_year, item_other_page, item_relation, item_type, item_stem_number, item_stem_en, item_stem_ur, item_image_en, item_image_ur, item_image_position, item_option_layout, item_option_a_en, item_option_a_ur, item_option_a_image, item_option_b_en, item_option_b_ur, item_option_b_image, item_option_c_en, item_option_c_ur, item_option_c_image, item_option_d_en, item_option_d_ur, item_option_d_image, item_option_correct, item_sort, item_status, item_approved, item_approvedby, item_reviewed, item_reviewedby, item_rubric_english, item_rubric_urdu, item_rubric_image_position, item_rubric_image, item_status_ss, item_comment_ss, item_status_ae, item_comment_ae, item_status_psy, item_comment_psy, item_date_psy, item_commentby_psy, item_batch, item_rev_status, item_rev_revid, item_rev_date_acc, item_rev_date_exp, item_rev_comment, item_rev_ss_status, item_rev_ss_date_acc, item_rev_ss_comment, item_rev_ss_id, item_rev_ae_status, item_rev_ae_date_acc, item_rev_ae_comment, item_rev_ae_id, item_rev_psy_status, item_rev_psy_date_acc, item_rev_psy_comment, item_rev_psy_id, item_sequence, item_p_value, item_pilot_phase, item_rbis_value, item_flag, item_1_rbis, item_2_rbis, item_3_rbis, item_4_rbis, item_1g_1p, item_1g_2p, item_1g_3p, item_1g_4p, item_1g_5p, item_2g_1p, item_2g_2p, item_2g_3p, item_2g_4p, item_2g_5p, item_3g_1p, item_3g_2p, item_3g_3p, item_3g_4p, item_3g_5p, item_4g_1p, item_4g_2p, item_4g_3p, item_4g_4p, item_4g_5p, item_fib_key_eng, item_fib_key_ur, item_tf_eng_1, item_tf_eng_2, item_tf_ur_1, item_tf_ur_2, item_en_mc1_1, item_en_mc1_2, item_en_mc1_3, item_en_mc1_4, item_en_mc1_5, item_en_mc1_6, item_en_mc1_7, item_en_mc1_8, item_en_mc1_9, item_en_mc1_10, item_en_mc2_a, item_en_mc2_b, item_en_mc2_c, item_en_mc2_d, item_en_mc2_e, item_en_mc2_f, item_en_mc2_g, item_en_mc2_h, item_en_mc2_i, item_en_mc2_j, item_mc_ans_key, item_ur_mc1_1, item_ur_mc1_2, item_ur_mc1_3, item_ur_mc1_4, item_ur_mc1_5, item_ur_mc1_6, item_ur_mc1_7, item_ur_mc1_8, item_ur_mc1_9, item_ur_mc1_10, item_ur_mc2_a, item_ur_mc2_b, item_ur_mc2_c, item_ur_mc2_d, item_ur_mc2_e, item_ur_mc2_f, item_ur_mc2_g, item_ur_mc2_h, item_ur_mc2_i, item_ur_mc2_j, item_pic_mc1_1, item_pic_mc1_2, item_pic_mc1_3, item_pic_mc1_4, item_pic_mc1_5, item_pic_mc1_6, item_pic_mc1_7, item_pic_mc1_8, item_pic_mc1_9, item_pic_mc1_10, item_pic_mc2_a, item_pic_mc2_c, item_pic_mc2_e, item_pic_mc2_g, item_pic_mc2_i, item_pic_mc2_j, item_pic_mc2_b, item_pic_mc2_d, item_pic_mc2_f, item_pic_mc2_h, item_total_marks, "' . $this->session->userdata('admin_id') . '" FROM ci_items_pilot WHERE item_id ="' . $id . '"';
		$result = $this->db->query($sql);
		return $result;
	}
	//----------------------------------------------------------------------------------------
	public function get_all_subjects()
	{
		$wh = array();
		$wh[] = 'grade_status = "1"';
		$SQL = 'SELECT * FROM ci_subjects LEFT JOIN ci_grades ON grade_id = subject_gradeid';
		if (count($wh) > 0) {
			$WHERE = implode(' and ', $wh);
			return $this->datatable->LoadJson($SQL, $WHERE, '', 'order by grade_id asc');
			//echo $this->db->last_query();
			//die('if');
		} else {
			return $this->datatable->LoadJson($SQL, '', '', 'order by grade_id asc');
			//echo $this->db->last_query();
			//die('else');
		}
		/*$excluded_items = "";
		$subjectList_arr = array();
		foreach($subjectList as $row)
		{
			$subjectList_arr[]=$row['subject_id'];
		}
		$subjectList_arr = explode(',',$subjectList);
		
		$item_status = array (2,4);
		$this->db->select('item_id')
				 ->from('ci_items_rev')
				 ->where_in('item_rev_ae_status', $item_status);
				 //->where_in('item_subject_id', $subjectList_arr);
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();
		//die();
		foreach($result as $row)
		{
				if($this->count_in_groups_pilot($row->item_id) > 0)
				$excluded_items .= $row->item_id.",";
		}
		foreach($result as $row2)
		{
				if($this->count_in_paragraphs_pilot($row2->item_id) > 0)
				$excluded_items .= $row2->item_id.",";
		}
		$excluded_items = rtrim($excluded_items, ",");
		
		$wh =array('item_subject_id IN ('.$subjectList.')');
		$wh[]='item_type = "MCQ"';
		if(!empty($excluded_items)){$wh[]='item_id NOT IN ('.$excluded_items.')';}
		$SQL ='SELECT * FROM ci_items_pilot LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id';			
		if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
			//echo $this->db->last_query();
			//die();
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}	*/
	}
	public function get_all_reviewed_items_mcq($id)
	{
		$item_status = array(2, 4);
		$this->db->select('count(*)')
			->from('ci_items_rev')
			->where_in('item_rev_ae_status', $item_status)
			->where('item_type', 'MCQ')
			->where('item_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		return  $cnt['count(*)'];
	}
	public function get_all_reviewed_items_erq($id)
	{
		$item_status = array(2, 4);
		$this->db->select('count(*)')
			->from('ci_items_rev')
			->where_in('item_rev_ae_status', $item_status)
			->where('item_type', 'ERQ')
			->where('item_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		return  $cnt['count(*)'];
	}
	public function get_all_pilot_items_mcq($id)
	{
		$item_status = array(2, 4);
		$this->db->select('count(*)')
			->from('ci_items_pilot')
			->where_in('item_rev_ae_status', $item_status)
			->where('item_type', 'MCQ')
			->where('item_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		return  $cnt['count(*)'];
	}
	public function get_all_pilot_items_erq($id)
	{
		$item_status = array(2, 4);
		$this->db->select('count(*)')
			->from('ci_items_pilot')
			->where_in('item_rev_ae_status', $item_status)
			->where('item_type', 'ERQ')
			->where('item_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		return  $cnt['count(*)'];
	}
	public function copy_rev_to_pilot($id)
	{
		$sql = 'INSERT IGNORE INTO ci_items_pilot(`item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_rev_status`, `item_rev_revid`, `item_rev_date_acc`, `item_rev_date_exp`, `item_rev_comment`, `item_rev_ss_status`, `item_rev_ss_date_acc`, `item_rev_ss_comment`, `item_rev_ss_id`, `item_rev_ae_status`, `item_rev_ae_date_acc`, `item_rev_ae_comment`, `item_rev_ae_id`, `item_rev_psy_status`, `item_rev_psy_date_acc`, `item_rev_psy_comment`, `item_rev_psy_id`, `item_fib_key_eng`, `item_fib_key_ur`, `item_tf_eng_1`, `item_tf_eng_2`, `item_tf_ur_1`, `item_tf_ur_2`, `item_en_mc1_1`, `item_en_mc1_2`, `item_en_mc1_3`, `item_en_mc1_4`, `item_en_mc1_5`, `item_en_mc1_6`, `item_en_mc1_7`, `item_en_mc1_8`, `item_en_mc1_9`, `item_en_mc1_10`, `item_en_mc2_a`, `item_en_mc2_b`, `item_en_mc2_c`, `item_en_mc2_d`, `item_en_mc2_e`, `item_en_mc2_f`, `item_en_mc2_g`, `item_en_mc2_h`, `item_en_mc2_i`, `item_en_mc2_j`, `item_mc_ans_key`, `item_ur_mc1_1`, `item_ur_mc1_2`, `item_ur_mc1_3`, `item_ur_mc1_4`, `item_ur_mc1_5`, `item_ur_mc1_6`, `item_ur_mc1_7`, `item_ur_mc1_8`, `item_ur_mc1_9`, `item_ur_mc1_10`, `item_ur_mc2_a`, `item_ur_mc2_b`, `item_ur_mc2_c`, `item_ur_mc2_d`, `item_ur_mc2_e`, `item_ur_mc2_f`, `item_ur_mc2_g`, `item_ur_mc2_h`, `item_ur_mc2_i`, `item_ur_mc2_j`, `item_pic_mc1_1`, `item_pic_mc1_2`, `item_pic_mc1_3`, `item_pic_mc1_4`, `item_pic_mc1_5`, `item_pic_mc1_6`, `item_pic_mc1_7`, `item_pic_mc1_8`, `item_pic_mc1_9`, `item_pic_mc1_10`, `item_pic_mc2_a`, `item_pic_mc2_c`, `item_pic_mc2_e`, `item_pic_mc2_g`, `item_pic_mc2_i`, `item_pic_mc2_j`, `item_pic_mc2_b`, `item_pic_mc2_d`, `item_pic_mc2_f`, `item_pic_mc2_h`)	
		
		
		SELECT `item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_rev_status`, `item_rev_revid`, `item_rev_date_acc`, `item_rev_date_exp`, `item_rev_comment`, `item_rev_ss_status`, `item_rev_ss_date_acc`, `item_rev_ss_comment`, `item_rev_ss_id`, `item_rev_ae_status`, `item_rev_ae_date_acc`, `item_rev_ae_comment`, `item_rev_ae_id`, `item_rev_psy_status`, `item_rev_psy_date_acc`, `item_rev_psy_comment`, `item_rev_psy_id`, `item_fib_key_eng`, `item_fib_key_ur`, `item_tf_eng_1`, `item_tf_eng_2`, `item_tf_ur_1`, `item_tf_ur_2`, `item_en_mc1_1`, `item_en_mc1_2`, `item_en_mc1_3`, `item_en_mc1_4`, `item_en_mc1_5`, `item_en_mc1_6`, `item_en_mc1_7`, `item_en_mc1_8`, `item_en_mc1_9`, `item_en_mc1_10`, `item_en_mc2_a`, `item_en_mc2_b`, `item_en_mc2_c`, `item_en_mc2_d`, `item_en_mc2_e`, `item_en_mc2_f`, `item_en_mc2_g`, `item_en_mc2_h`, `item_en_mc2_i`, `item_en_mc2_j`, `item_mc_ans_key`, `item_ur_mc1_1`, `item_ur_mc1_2`, `item_ur_mc1_3`, `item_ur_mc1_4`, `item_ur_mc1_5`, `item_ur_mc1_6`, `item_ur_mc1_7`, `item_ur_mc1_8`, `item_ur_mc1_9`, `item_ur_mc1_10`, `item_ur_mc2_a`, `item_ur_mc2_b`, `item_ur_mc2_c`, `item_ur_mc2_d`, `item_ur_mc2_e`, `item_ur_mc2_f`, `item_ur_mc2_g`, `item_ur_mc2_h`, `item_ur_mc2_i`, `item_ur_mc2_j`, `item_pic_mc1_1`, `item_pic_mc1_2`, `item_pic_mc1_3`, `item_pic_mc1_4`, `item_pic_mc1_5`, `item_pic_mc1_6`, `item_pic_mc1_7`, `item_pic_mc1_8`, `item_pic_mc1_9`, `item_pic_mc1_10`, `item_pic_mc2_a`, `item_pic_mc2_c`, `item_pic_mc2_e`, `item_pic_mc2_g`, `item_pic_mc2_i`, `item_pic_mc2_j`, `item_pic_mc2_b`, `item_pic_mc2_d`, `item_pic_mc2_f`, `item_pic_mc2_h` FROM ci_items_rev WHERE item_rev_ae_status IN (2,4) AND item_subject_id ="' . $id . '"';
		$result = $this->db->query($sql);
		return $result;
	}

	public function copy_rev_groups_to_pilot($id)
	{
		$sql = 'INSERT IGNORE INTO ci_items_group_pilot (`group_id`,`group_title_en`,`group_title_ur`,`group_grade_id`,`group_subject_id`,`group_item_1`,`group_item_2`,`group_item_3`,`group_item_4`,`group_item_5`,`group_item_6`,`group_item_7`,`group_item_8`,`group_item_9`,`group_item_10`,`group_ordering`,`group_status`,`group_createdby`,`group_created`,`group_updated`,`group_updatedby`,`group_status_ss`,`group_comment_ss`,`group_approved`,`group_approvedby`,`group_status_ae`,`group_comment_ae`,`group_reviewed`,`group_reviewedby`,`group_status_psy`,`group_comment_psy`,`group_commentby_psy`,`group_rev_status`,`group_rev_revid`,`group_rev_date_acc`,`group_rev_date_exp`,`group_rev_comment`,`group_rev_ss_status`,`group_rev_ss_date_acc`,`group_rev_ss_comment`,`group_rev_ss_id`,`group_rev_ae_status`,`group_rev_ae_date_acc`,`group_rev_ae_comment`,`group_rev_ae_id`,`group_rev_psy_status`,`group_rev_psy_date_acc`,`group_rev_psy_comment`,`group_rev_psy_id`)	
		
		
		SELECT `group_id`,`group_title_en`,`group_title_ur`,`group_grade_id`,`group_subject_id`,`group_item_1`,`group_item_2`,`group_item_3`,`group_item_4`,`group_item_5`,`group_item_6`,`group_item_7`,`group_item_8`,`group_item_9`,`group_item_10`,`group_ordering`,`group_status`,`group_createdby`,`group_created`,`group_updated`,`group_updatedby`,`group_status_ss`,`group_comment_ss`,`group_approved`,`group_approvedby`,`group_status_ae`,`group_comment_ae`,`group_reviewed`,`group_reviewedby`,`group_status_psy`,`group_comment_psy`,`group_commentby_psy`,`group_rev_status`,`group_rev_revid`,`group_rev_date_acc`,`group_rev_date_exp`,`group_rev_comment`,`group_rev_ss_status`,`group_rev_ss_date_acc`,`group_rev_ss_comment`,`group_rev_ss_id`,`group_rev_ae_status`,`group_rev_ae_date_acc`,`group_rev_ae_comment`,`group_rev_ae_id`,`group_rev_psy_status`,`group_rev_psy_date_acc`,`group_rev_psy_comment`,`group_rev_psy_id` FROM ci_items_group_rev WHERE group_rev_ae_status IN (2,4) AND group_subject_id ="' . $id . '"';
		$result = $this->db->query($sql);
		return $result;
	}

	public function copy_rev_para_to_pilot($id)
	{
		$sql = 'INSERT IGNORE INTO ci_items_paragraphs_pilot (`para_id`,`para_title_en`,`para_title_ur`,`para_text_en`,`para_text_ur`,`para_img_position`,`para_image`,`para_start_from`,`para_grade_id`,`para_subject_id`,`para_item_21`,`para_item_22`,`para_item_23`,`para_item_24`,`para_item_25`,`para_item_26`,`para_item_27`,`para_item_28`,`para_item_29`,`para_item_30`,`para_statistics`,`para_ordering`,`para_status`,`para_createdby`,`para_created`,`para_status_ss`,`para_comment_ss`,`para_status_ae`,`para_comment_ae`,`para_status_psy`,`para_comment_psy`,`para_approved`,`para_approvedby`,`para_reviewed`,`para_reviewedby`,`para_date_psy`,`para_commentby_psy`,`para_updated`,`para_updatedby`,`para_rev_status`,`para_rev_revid`,`para_rev_date_acc`,`para_rev_date_exp`,`para_rev_comment`,`para_rev_ss_status`,`para_rev_ss_id`,`para_rev_ss_date_acc`,`para_rev_ss_comment`,`para_rev_ae_status`,`para_rev_ae_id`,`para_rev_ae_date_acc`,`para_rev_ae_comment`,`para_rev_psy_status`,`para_rev_psy_id`,`para_rev_psy_date_acc`,`para_rev_psy_comment`)	
		
		
		SELECT `para_id`,`para_title_en`,`para_title_ur`,`para_text_en`,`para_text_ur`,`para_img_position`,`para_image`,`para_start_from`,`para_grade_id`,`para_subject_id`,`para_item_21`,`para_item_22`,`para_item_23`,`para_item_24`,`para_item_25`,`para_item_26`,`para_item_27`,`para_item_28`,`para_item_29`,`para_item_30`,`para_statistics`,`para_ordering`,`para_status`,`para_createdby`,`para_created`,`para_status_ss`,`para_comment_ss`,`para_status_ae`,`para_comment_ae`,`para_status_psy`,`para_comment_psy`,`para_approved`,`para_approvedby`,`para_reviewed`,`para_reviewedby`,`para_date_psy`,`para_commentby_psy`,`para_updated`,`para_updatedby`,`para_rev_status`,`para_rev_revid`,`para_rev_date_acc`,`para_rev_date_exp`,`para_rev_comment`,`para_rev_ss_status`,`para_rev_ss_id`,`para_rev_ss_date_acc`,`para_rev_ss_comment`,`para_rev_ae_status`,`para_rev_ae_id`,`para_rev_ae_date_acc`,`para_rev_ae_comment`,`para_rev_psy_status`,`para_rev_psy_id`,`para_rev_psy_date_acc`,`para_rev_psy_comment` FROM ci_items_paragraphs_rev WHERE para_rev_ae_status IN (2) AND para_subject_id ="' . $id . '"';
		$result = $this->db->query($sql);
		return $result;
	}
	public function get_all_reviewed_items_dtl($subid)
	{
		$item_status = array(2, 4);
		$this->db->select('item_id,item_type')
			->from('ci_items_rev')
			->where_in('item_rev_ae_status', $item_status)
			->where('item_subject_id', $subid);
		$query = $this->db->get();
		return $result = $query->result_array();
	}

	public function get_all_reviewed_groups($id)
	{
		$item_status = array(2, 4);
		$this->db->select('count(*)')
			->from('ci_items_group_rev')
			->where_in('group_rev_ae_status', $item_status)
			->where('group_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		return  $cnt['count(*)'];
	}

	public function get_all_pilot_groups($id)
	{
		$item_status = array(2, 4);
		$this->db->select('count(*)')
			->from('ci_items_group_pilot')
			->where_in('group_rev_ae_status', $item_status)
			->where('group_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		return  $cnt['count(*)'];
	}
	public function get_all_reviewed_paragraph($id)
	{
		$item_status = array(2);
		$this->db->select('count(*)')
			->from('ci_items_paragraphs_rev')
			->where_in('para_rev_ae_status', $item_status)
			->where('para_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		//echo $this->db->last_query();
		//die();
		return  $cnt['count(*)'];
	}
	public function get_all_pilot_paragraph($id)
	{
		$item_status = array(2);
		$this->db->select('count(*)')
			->from('ci_items_paragraphs_pilot')
			->where_in('para_rev_ae_status', $item_status)
			->where('para_subject_id', $id);
		$query = $this->db->get();
		$cnt = $query->row_array();
		return  $cnt['count(*)'];
	}
}
