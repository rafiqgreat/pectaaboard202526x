<?php
	class Contentstand_model extends CI_Model{
		public function add_contentstand($data){
			$this->db->insert('ci_content_stands', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_ae_contentstand($subjectList){
					
			$wh =[];
			$SQL ='SELECT * FROM ci_content_stands LEFT JOIN ci_grades ON grade_id = cs_grade_id LEFT JOIN ci_subjects ON subject_id = cs_subject_id';
			
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
		public function get_all_contentstand(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_content_stands LEFT JOIN ci_grades ON grade_id = cs_grade_id LEFT JOIN ci_subjects ON subject_id = cs_subject_id';
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
		
		function change_status()
		{		
			$this->db->set('cs_status', $this->input->post('status'));
			$this->db->where('cs_id', $this->input->post('cs_id'));
			$this->db->update('ci_content_stands');
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
		function get_ae_subjects_by_grade($grade_id,$subjectsList)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectsList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		public function get_contentstand_by_id($id){
			$query = $this->db->get_where('ci_content_stands', array('cs_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_contentstand($data, $id){
			$this->db->where('cs_id', $id);
			$this->db->update('ci_content_stands', $data);
			return true;
		}
		
		public function get_contentstand_for_export(){			
			$this->db->select('*')
					 ->from('ci_content_stands')
					 ->join('ci_grades', 'grade_id= cs_grade_id')
					 ->join('ci_subjects', 'subject_id= cs_subject_id')
					 ->join('ci_admin', 'admin_id= cs_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ae_contentstand_for_export($subjectList){			
			$this->db->select('*')
					 ->from('ci_content_stands')
					 ->join('ci_grades', 'grade_id= cs_grade_id')
					 ->join('ci_subjects', 'subject_id= cs_subject_id')
					 ->join('ci_admin', 'admin_id= cs_createdby')
					 ->where('subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_contentstand_csv_export()
		{			
			$this->db->select('cs_number, cs_sort, cs_statement_en, cs_statement_ur, grade_code, subject_code, cs_created, username, IF(subject_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_content_stands')
					 ->join('ci_grades', 'grade_id= cs_grade_id')
					 ->join('ci_subjects', 'subject_id= cs_subject_id')
					 ->join('ci_admin', 'admin_id= cs_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_ae_contentstand_csv_export($subjectList)
		{			
			$this->db->select('cs_number, cs_sort, cs_statement_en, cs_statement_ur, grade_code, subject_code, cs_created, username, IF(subject_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_content_stands')
					 ->join('ci_grades', 'grade_id= cs_grade_id')
					 ->join('ci_subjects', 'subject_id= cs_subject_id')
					 ->join('ci_admin', 'admin_id= cs_createdby')
					 ->where('subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
	}
?>