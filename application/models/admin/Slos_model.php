<?php
	class Slos_model extends CI_Model{

		public function add_slos($data){
			$this->db->insert('ci_slos', $data);
			return true;
		}

		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_slos(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_slos LEFT JOIN ci_grades ON grade_id = slo_grade_id LEFT JOIN ci_subjects ON subject_id = slo_subject_id LEFT JOIN ci_content_stands ON cs_id = slo_cstand_id LEFT JOIN ci_subcontent_stands ON subcs_id = slo_subcstand_id ';			
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function get_ae_slos($subjectList){		
			$wh =array();
			$SQL ='SELECT * FROM ci_slos LEFT JOIN ci_grades ON grade_id = slo_grade_id LEFT JOIN ci_subjects ON subject_id = slo_subject_id LEFT JOIN ci_content_stands ON cs_id = slo_cstand_id LEFT JOIN ci_subcontent_stands ON subcs_id = slo_subcstand_id ';			
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code')
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
//////////////////////////////////////////////////////////////////////////////		
		public function get_ae_subjects($subjectList)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
/////////////////////////////////////////////////////////////////////////////
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
			$this->db->select('cs_id,CONCAT(cs_number,"-", cs_statement_en) as cs_statement_en, cs_statement_ur')
					 ->from('ci_content_stands')
					 ->where('cs_subject_id', $subject_id)
					 ->where('cs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		function get_subcstands_by_cstand($cs_id)
		{
			$this->db->select('subcs_id,CONCAT(subcs_number,"-", subcs_topic_en) as subcs_topic_en, subcs_topic_ur')
					 ->from('ci_subcontent_stands')
					 ->where('subcs_cstand_id', $cs_id)
					 ->where('subcs_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();
		}
		function change_status()
		{		
			$this->db->set('slo_status', $this->input->post('slo_status'));
			$this->db->where('slo_id', $this->input->post('slo_id'));
			$this->db->update('ci_slos');
		} 
		
		public function get_slos_by_id($id){
			$query = $this->db->get_where('ci_slos', array('slo_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_slos($data, $id){
			$this->db->where('slo_id', $id);
			$this->db->update('ci_slos', $data);
			return true;
		}
		
		public function get_slos_for_export(){			
			$this->db->select('*')
					 ->from('ci_slos')
					 ->join('ci_grades', 'grade_id= slo_grade_id')
					 ->join('ci_subjects', 'subject_id= slo_subject_id')
					 ->join('ci_content_stands', 'cs_id= slo_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id= slo_subcstand_id')
					 ->join('ci_admin', 'admin_id= slo_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_ae_slos_for_export($subjectList){			
			$this->db->select('*')
					 ->from('ci_slos')
					 ->join('ci_grades', 'grade_id= slo_grade_id')
					 ->join('ci_subjects', 'subject_id= slo_subject_id')
					 ->join('ci_content_stands', 'cs_id= slo_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id= slo_subcstand_id')
					 ->join('ci_admin', 'admin_id= slo_createdby')
					 ->where('subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_slos_csv_export(){			
			$this->db->select('slo_id, slo_number, slo_statement_en, slo_statement_ur, grade_code, subject_code, cs_statement_en, subcs_topic_en, slo_created, IF(slo_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_slos')
					 ->join('ci_grades', 'grade_id= slo_grade_id')
					 ->join('ci_subjects', 'subject_id= slo_subject_id')
					 ->join('ci_content_stands', 'cs_id= slo_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id= slo_subcstand_id')
					 ->join('ci_admin', 'admin_id= slo_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_ae_slos_csv_export($subjectList){			
			$this->db->select('slo_id, slo_number, slo_statement_en, slo_statement_ur, grade_code, subject_code, cs_statement_en, subcs_topic_en, slo_created, IF(slo_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_slos')
					 ->join('ci_grades', 'grade_id= slo_grade_id')
					 ->join('ci_subjects', 'subject_id= slo_subject_id')
					 ->join('ci_content_stands', 'cs_id= slo_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id= slo_subcstand_id')
					 ->join('ci_admin', 'admin_id= slo_createdby')
					 ->where('subject_id IN ('.$subjectList.')');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>