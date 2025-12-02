<?php
	class Subcontentstand_model extends CI_Model{
		public function add_subcontentstand($data){
			$this->db->insert('ci_subcontent_stands', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_subcontentstand(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_subcontent_stands 
							LEFT JOIN ci_grades ON grade_id = subcs_grade_id 
							LEFT JOIN ci_subjects ON subject_id = subcs_subject_id 
							LEFT JOIN ci_content_stands ON cs_id = subcs_cstand_id';
			//echo $SQL;
			//die();
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
		/////////////////////////////////////////////////////////////////
		public function get_ae_subcontentstand($subjectList){		
			$wh =array();
			$SQL ='SELECT * FROM ci_subcontent_stands 
							LEFT JOIN ci_grades ON grade_id = subcs_grade_id 
							LEFT JOIN ci_subjects ON subject_id = subcs_subject_id 
							LEFT JOIN ci_content_stands ON cs_id = subcs_cstand_id';
			//echo $SQL;
			//die();
			$wh[] = 'cs_subject_id IN ('.$subjectList.')';
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
		/////////////////////////////////////////////////////////////////
		
		public function get_all_grades(){				
		$res= [];
		$this->db->select('*')
					 ->from('ci_grades')					
					 ->where('grade_status', 1);
		$query = $this->db->get();	
		foreach ($query->result() as $row)
		{
			$res[] = $row;
		}
			return $res;
		}
		
		public function get_all_subjects(){				
		$res= [];
		$this->db->select('*')
					 ->from('ci_subjects')					
					 ->where('subject_status', 1);
		$query = $this->db->get();	
		foreach ($query->result() as $row)
		{
			$res[] = $row;
		}
			return $res;
		}
		
		public function get_ae_subjects($subjectList){				
		$res= [];	
			
		$this->db->select('*')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);
		$query = $this->db->get();	
			//die($this->db->last_query());
		foreach ($query->result() as $row)
		{
			$res[] = $row;
		}
			return $res;
		}
		
		public function get_all_contentstand(){				
		$res= [];
		$query = $this->db->get('ci_content_stands');
		foreach ($query->result() as $row)
		{
			$res[] = $row;
		}
			return $res;
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
		
		
		function get_cstands_by_subject($subject_id)
		{
			$this->db->select('cs_id,CONCAT(cs_number,"-", cs_statement_en) as cs_statement_en,cs_statement_ur')
					 ->from('ci_content_stands')
					 ->where('cs_subject_id', $subject_id)
					 ->where('cs_status', 1);					 
			$this->db->order_by("cs_number", "asc");
			$query = $this->db->get();			
			return $query->result_array();
		}
		
		function change_status()
		{		
			$this->db->set('subcs_status', $this->input->post('status'));
			$this->db->where('subcs_id', $this->input->post('subcs_id'));
			$this->db->update('ci_subcontent_stands');
		} 
		
		public function get_subcontentstand_by_id($id){
			$query = $this->db->get_where('ci_subcontent_stands', array('subcs_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_subcontentstand($data, $id){
			$this->db->where('subcs_id', $id);
			$this->db->update('ci_subcontent_stands', $data);
			return true;
		}
		
		public function get_subcontentstand_for_export(){			
			$this->db->select('*')
					 ->from('ci_subcontent_stands')
					 ->join('ci_grades', 'grade_id= subcs_grade_id')
					 ->join('ci_subjects', 'subject_id= subcs_subject_id')
					 ->join('ci_content_stands', 'cs_id= subcs_cstand_id')
					 ->join('ci_admin', 'admin_id= subcs_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_ae_subcontentstand_for_export($subjectList){			
			$this->db->select('*')
					 ->from('ci_subcontent_stands')
					 ->join('ci_grades', 'grade_id= subcs_grade_id')
					 ->join('ci_subjects', 'subject_id= subcs_subject_id')
					 ->join('ci_content_stands', 'cs_id= subcs_cstand_id')
					 ->join('ci_admin', 'admin_id= subcs_createdby')
					 ->where('subcs_subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_subcontentstand_csv_export()
		{			
			$this->db->select('subcs_number, subcs_sort, subcs_topic_en, subcs_topic_ur, grade_code, subject_code, cs_statement_en, subcs_created, username, IF(subject_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_subcontent_stands')
					 ->join('ci_grades', 'grade_id= subcs_grade_id')
					 ->join('ci_subjects', 'subject_id= subcs_subject_id')
					 ->join('ci_content_stands', 'cs_id= subcs_cstand_id')
					 ->join('ci_admin', 'admin_id= subcs_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ae_subcontentstand_csv_export($subjectList)
		{			
			$this->db->select('subcs_number, subcs_sort, subcs_topic_en, subcs_topic_ur, grade_code, subject_code, cs_statement_en, subcs_created, username, IF(subject_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_subcontent_stands')
					 ->join('ci_grades', 'grade_id= subcs_grade_id')
					 ->join('ci_subjects', 'subject_id= subcs_subject_id')
					 ->join('ci_content_stands', 'cs_id= subcs_cstand_id')
					 ->join('ci_admin', 'admin_id= subcs_createdby')
					 ->where('subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>