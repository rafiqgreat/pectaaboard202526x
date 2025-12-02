<?php
	class Pilotheaders_model extends CI_Model{
		public function add_pilotheaders($data){
			$this->db->insert('ci_pilotheaders', $data);
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
		public function get_all_pilotheaders(){		
			//$wh =array('ph_status=1');
			$wh =array();
			$SQL ='SELECT * FROM ci_pilotheaders LEFT JOIN ci_admin ON ph_creator_id = admin_id';
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
		public function get_all_pilotheaders_IE($admin_id, $subjectList){		
			//$wh =array('h_subject_id IN ('.$subjectList.')');
			$wh =array();
			$SQL ='SELECT * FROM ci_pilotheaders LEFT JOIN ci_admin ON ph_creator_id = admin_id';		
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
		public function get_all_pilotheaders_IW($admin_id, $subjectList){		
			//$wh =array('h_subject_id IN ('.$subjectList.')');
			$wh =array();
			$SQL ='SELECT * FROM ci_pilotheaders LEFT JOIN ci_admin ON ph_creator_id = admin_id';		
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
		public function ppilotheaders_by_subject($id){
			$this->db->select('*')
					 ->from('ci_pilotheaders')
					 ->where('h_subject_id', $id);
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
			$this->db->set('ph_status', $this->input->post('ph_status'));
			$this->db->where('ph_id', $this->input->post('ph_id'));
			$this->db->update('ci_pilotheaders');
		}
		
		public function get_pilotheaders_by_id($id){
			$this->db->select('*')
					 ->from('ci_pilotheaders')
					 ->join('ci_admin', 'admin_id = ph_creator_id')
					 ->where('ph_id', $id);
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
		
		public function edit_pilotheaders($data, $id){
			$this->db->where('ph_id', $id);
			$this->db->update('ci_pilotheaders', $data);
			return true;
		}
		
		public function pheaders_by_subject_phase($id,$ph_paper_subject){
			$this->db->select('*')
					 ->from('ci_pilotheaders')
					 ->where('ph_phase', $id)
					->where('ph_paper_subject', $ph_paper_subject);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		
	}
?>