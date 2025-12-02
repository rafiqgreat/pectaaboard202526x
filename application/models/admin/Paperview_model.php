<?php
	class Paperview_model extends CI_Model{
		public function add_downloads($data){
			$this->db->insert('ci_items_rev', $data);
			return true;
		}
		
		public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en,grade_name_ur')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_subjects()
		{	
			$this->db->select('subject_id, subject_code, subject_name_en, grade_code')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'subject_gradeid= grade_id')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		function get_all_cstands()
		{
			$this->db->select('cs_id,cs_number,cs_statement_en,cs_statement_ur')
					 ->from('ci_content_stands')
					 ->where('cs_status', 1);					 
			$query = $this->db->get();
			//die($query);			
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
			/*echo $this->db->last_query();
			die('123131');*/
		}
		
		public function get_pilotheader_by_suject($subject)
		{
			if($subject != 0 && $subject != '')
				$wh[] ='ph_paper_subject_en='.$subject;
			$wh[] ='ph_status = 1';
			
			$WHERE = implode(' and ',$wh);
			
			$this->db->select('*')
				 ->from('ci_pilotheaders')
				 ->where($WHERE);			
			$query = $this->db->get();
			return $result = $query->result_array();
			//echo $this->db->last_query();
			//die();
		}
		public function get_subjects_by_id($subject_id)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->where('subject_id = '.$subject_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		public function get_grades_by_id($grade_id)
		{	
			$this->db->select('grade_id,grade_code,grade_name_en,grade_name_ur')
					 ->from('ci_grades')	
					 ->where('grade_id = '.$grade_id)
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_iw()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '3');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_items_AE_accepted_flimzy($grade_id, $subject_id, $cstand_id, $subcstand_id, $typeofquestion_id)
		{
			if($grade_id != 0 && $grade_id != '')
				$wh[] ='item_grade_id='.$grade_id;
			
			if($subject_id != 0 && $subject_id != '')
				$wh[] ='item_subject_id='.$subject_id;
			
			if($cstand_id != 0 && $cstand_id != '')
				$wh[] ='item_cstand_id='.$cstand_id;
			
			if($subcstand_id != 0 && $subcstand_id != '')
				$wh[] ='item_subcstand_id='.$subcstand_id;
			
			if($typeofquestion_id == 'MCQ' || $typeofquestion_id == 'ERQ')
				$wh[] ='item_type ='.'\''.$typeofquestion_id.'\'';
			
			//$wh[] ='item_status_ae = 1';
			$wh[] ='item_rev_ae_status IN (2,4)';
			
			$SQL ='SELECT * FROM ci_items_rev 
				LEFT JOIN ci_grades ON grade_id = item_grade_id 
				LEFT JOIN ci_subjects ON subject_id = item_subject_id 
				LEFT JOIN ci_admin ON admin_id = item_rev_revid ';				
			
			
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
			}	
		}
		
		public function get_all_items_AE_accepted($grade_id, $subject_id, $cstand_id, $subcstand_id, $typeofquestion_id)
		{
			
			if($grade_id != 0 && $grade_id != '')
				$wh[] ='item_grade_id='.$grade_id;
			
			if($subject_id != 0 && $subject_id != '')
				$wh[] ='item_subject_id='.$subject_id;
			
			if($cstand_id != 0 && $cstand_id != '')
				$wh[] ='item_cstand_id='.$cstand_id;
			
			if($subcstand_id != 0 && $subcstand_id != '')
				$wh[] ='item_subcstand_id='.$subcstand_id;
			
			if($typeofquestion_id == 'MCQ' || $typeofquestion_id == 'ERQ')
				$wh[] ='item_type ='.'\''.$typeofquestion_id.'\'';
			
			//$wh[] ='item_status_ae = 1';
			$wh[] ='item_rev_ae_status IN (2,4)';
			
			$WHERE = implode(' and ',$wh);
			
			$this->db->select('*')
				 ->from('ci_items_rev')
				 ->join('ci_grades', 'grade_id= item_grade_id')
				 ->join('ci_subjects', 'subject_id= item_subject_id')
				 ->join('ci_content_stands', 'cs_id = item_cstand_id')
				 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
				 ->join('ci_slos', 'item_slo_id = slo_id')
				 ->join('ci_admin', 'admin_id= item_rev_revid')
				 ->where($WHERE);			
			
			$this->db->order_by("item_batch", "DESC");
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function get_all_items_AE_accepted_paragraphs($grade_id, $subject_id)
		{
			
			if($grade_id != 0 && $grade_id != '')
				$wh[] ='para_grade_id='.$grade_id;
			
			if($subject_id != 0 && $subject_id != '')
				$wh[] ='para_subject_id='.$subject_id;

			$wh[] ='para_rev_ae_status = 2';
			
			$WHERE = implode(' and ',$wh);
			
			$this->db->select('*')
				 ->from('ci_items_paragraphs_rev')
				 ->join('ci_grades', 'grade_id= para_grade_id')
				 ->join('ci_subjects', 'subject_id= para_subject_id')
				 ->where($WHERE);			
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function get_all_items_AE_accepted_groups($grade_id, $subject_id)
		{
			
			if($grade_id != 0 && $grade_id != '')
				$wh[] ='group_grade_id='.$grade_id;
			
			if($subject_id != 0 && $subject_id != '')
				$wh[] ='group_subject_id='.$subject_id;

			$wh[] ='group_rev_ae_status = 2';
			
			$WHERE = implode(' and ',$wh);
			
			$this->db->select('*')
				 ->from('ci_items_group_rev')
				 ->join('ci_grades', 'grade_id= group_grade_id')
				 ->join('ci_subjects', 'subject_id= group_subject_id')
				 ->where($WHERE);			
			$query = $this->db->get();
			return $result = $query->result();
			//echo $this->db->last_query();
			//die();
		}
		
		
		public function get_flimzy_items_for_export($grade_id, $subject_id, $cstand_id, $subcstand_id, $typeofquestion_id)
		{	
			if($grade_id != 0 && $grade_id != '')
				$wh[] ='item_grade_id='.$grade_id;
			
			if($subject_id != 0 && $subject_id != '')
				$wh[] ='item_subject_id='.$subject_id;
			
			if($cstand_id != 0 && $cstand_id != '')
				$wh[] ='item_cstand_id='.$cstand_id;
			
			if($subcstand_id != 0 && $subcstand_id != '')
				$wh[] ='item_subcstand_id='.$subcstand_id;
			
			if($typeofquestion_id == 'MCQ' || $typeofquestion_id == 'ERQ')
				$wh[] ='item_type ='.'\''.$typeofquestion_id.'\'';
			
			//$wh[] ='item_status_ae = 1';
			$wh[] ='item_rev_ae_status IN (2,4)';
			//$wh[] ='item_type = "ERQ"';
			$WHERE = implode(' and ',$wh);

			$this->db->select('*')
				 ->from('ci_items_rev')
				 ->join('ci_grades', 'grade_id= item_grade_id')
				 ->join('ci_subjects', 'subject_id= item_subject_id')
				 ->join('ci_content_stands', 'cs_id = item_cstand_id')
				 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
				 ->join('ci_slos', 'item_slo_id = slo_id')
				 ->join('ci_admin', 'admin_id= item_rev_revid')
				 ->where($WHERE);			
			
			$this->db->order_by("item_batch", "DESC");
			$query = $this->db->get();
			return $result = $query->result();
			//echo $this->db->last_query();
			//die();
		}
		
		public function get_all_ss()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '2');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_ae()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '4');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_psy()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '5');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_ir()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '6');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_rev_ss()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '2');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_rev_ae()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '4');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_rev_psy()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '5');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_itemwriters()
		{
			$wh =array();
			$SQL ='SELECT * FROM v_itemwriters';			
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
					 ->from('v_itemwriters');					 
			$query = $this->db->get();			
			return $result = $query->result_array();
			*/
		}
		public function get_itemwriter_for_export(){	
			
			$this->db->select('ci_iw_subject, firstname, lastname, ci_iw_fathername, district_name_en, ci_iw_dob, ci_iw_cnic, ci_iw_designation, ci_iw_posting');
			$this->db->from('v_itemwriters');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_iw_by_subject($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')
					 ->where('admin_role_id', '3')
					 ->where("find_in_set($id, subjects_ids)");	
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function get_ss_by_subject($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')
					 ->where('admin_role_id', '2')
					 ->where("find_in_set($id, subjects_ids)");	
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function get_ae_by_subject($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')
					 ->where('admin_role_id', '4')
					 ->where("find_in_set($id, subjects_ids)");	
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function get_subjects_by_grade($grade_id)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')//'item_subject_id IN ('.$subjectList.')'
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$this->session->userdata('subjects_ids').')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		public function get_items_ceo_search($id=0)
		{
			$temp = explode('_',$id);
			$search_typeofquestion = $temp[0];
			$search_grade = $temp[1];
			$search_subject = $temp[2];
			
			if($search_grade != 0)
				{$wh[] ='item_grade_id='.$search_grade;}
			if($search_subject != 0)
				{$wh[] ='item_subject_id='.$search_subject;}
			if($search_typeofquestion != 0)
				{$wh[] ='item_batch='.$search_typeofquestion;}
			/*
			$wh[] ='item_rev_status=2';
			$wh[] ='item_rev_ss_status=0';
			$wh[] = 'item_subject_id IN ('.$subjectList.')';
			if(!empty($excluded_items)){$wh[] = 'item_id NOT IN ('.$excluded_items.')';}		
			*/
			if($search_typeofquestion==1)
			{
				$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
			}
			else
			{
				$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_rev_revid';
			}
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());			
		}
		
		public function get_ceo_rep_com_search($id=0)
		{
			$temp = explode('_',$id);
			$search_grade = $temp[0];
			$search_subject = $temp[1];
			$search_status = $temp[2];
			$search_typeofquestion = $temp[3];
			
			if($search_grade != 0)
				{$wh[] ='item_grade_id='.$search_grade;}
			if($search_subject != 0)
				{$wh[] ='item_subject_id='.$search_subject;}
			if($search_status != 0)
				{$wh[] ='item_status='.$search_status;}
			if($search_typeofquestion == 1)
				{
				
			$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
			}
			else
			{
				$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
			}
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('if');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('else');
			}	
		}
		public function get_rev_items_by_id($item_id)

		{
			$this->db->select('*')
					 ->from('ci_items_rev')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
	}
?>