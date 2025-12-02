<?php
	class Paperinstructions_model extends CI_Model{
		public function add_paperinstructions($data){
			$this->db->insert('ci_paperinstructions', $data);
			return true;
		}
	public function get_all_added_subjects()
	{
		$this->db->select('ib_subject_id')->from('ci_itemsbank');
		$query = $this->db->get();			
		return $result = $query->result_array();	
	}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_paperinstructions(){		
			$wh =array('pi_status=1');
			$SQL ='SELECT * FROM ci_paperinstructions LEFT JOIN ci_grades ON grade_id = pi_grade_id LEFT JOIN ci_subjects ON subject_id = pi_subject_id LEFT JOIN ci_admin ON pi_creator_id = admin_id';
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
		// get all users for server-side datatable processing (ajax based)
		public function get_all_paperinstructions_IE($admin_id, $subjectList){		
			$wh =array('pi_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_paperinstructions LEFT JOIN ci_grades ON grade_id = pi_grade_id LEFT JOIN ci_subjects ON subject_id = pi_subject_id LEFT JOIN ci_admin ON pi_creator_id = admin_id';		
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
		public function get_all_paperinstructions_IW($admin_id, $subjectList){		
			$wh =array('pi_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_paperinstructions LEFT JOIN ci_grades ON grade_id = pi_grade_id LEFT JOIN ci_subjects ON subject_id = pi_subject_id LEFT JOIN ci_admin ON pi_creator_id = admin_id';		
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
		public function pheaders_by_subject($id){
			$this->db->select('*')
					 ->from('ci_paperinstructions')
					 ->where('pi_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
///////////////////////////////////////////////////Get Subjects by Grade using ajax call	
function get_ae_subjects_by_grade($grade_id, $subjectList)
		{
			$this->db->select('subject_id, subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
/////////////////////////////////////////////////////////////////////////////////////////////
function get_subjects_by_grade($grade_id)
		{
			$this->db->select('subject_id, subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		function change_status()
		{		
			$this->db->set('ib_status', $this->input->post('status'));
			$this->db->where('ib_id', $this->input->post('ib_id'));
			$this->db->update('ci_itemsbank');
		} 
		function change_status_approve()
		{
			$this->db->set('pi_status', $this->input->post('pi_status'));
			$this->db->where('pi_id', $this->input->post('pi_id'));
			$this->db->update('ci_paperinstructions');
		}
		
		public function get_paperinstructions_by_id($id){
			$this->db->select('*')
					 ->from('ci_paperinstructions')
					 ->join('ci_grades', 'grade_id = pi_grade_id')
					 ->join('ci_subjects', 'subject_id = pi_subject_id')
					 ->join('ci_admin', 'admin_id = pi_creator_id')
					 ->where('pi_id', $id);
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
		
		public function edit_paperinstructions($data, $id){
			$this->db->where('pi_id', $id);
			$this->db->update('ci_paperinstructions', $data);
			return true;
		}
		
	}
?>