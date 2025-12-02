<?php
	class Pilot_itemspara_model extends CI_Model{

	/*	public function add_itemspara($data){
			$this->db->insert('ci_items_paragraphs', $data);
			return true;
		}*/
		public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en, grade_name_ur')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//updated function
		public function get_all_itemspara_pilot($grade_id,$subject_id)
		{	
			$wh=array();
			if($grade_id != 0)
				$wh[] ='grade_id='.$grade_id;
			if($subject_id != 0)
			 $wh[] ='subject_id='.$subject_id;
			 
			$wh[] ='para_subject_id IN ('.$this->session->userdata('subjects_ids').')';
			$SQL ='SELECT * FROM ci_items_paragraphs_pilot LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
               // echo $this->db->last_query();
				//die('IF');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
               // echo $this->db->last_query();
				//die('else');
			}		
		
		}
		
		public function get_all_itemspara_pilot_searched($id=0)
		{		
			$temp = explode('_',$id);
			$search_grade = $temp[0];
			$search_subject = $temp[1];
			
			if($search_grade != 0)
				$wh =array('para_grade_id='.$search_grade);
			if($search_subject != 0)
				$wh[] ='para_subject_id='.$search_subject;
				
			$wh[] ='para_subject_id IN ('.$this->session->userdata('subjects_ids').')';
			$SQL ='SELECT * FROM ci_items_paragraphs_pilot LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('IF');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('else');
			}		
		}
		
		public function get_ss_subjects_by_grade($grade_id,$subjectList=0)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		public function get_pilot_itemspara_by_id($id)
		{
			$this->db->select('*')
					 ->from('ci_items_paragraphs_pilot')					 
					 ->join('ci_grades', 'grade_id = para_grade_id')
					 ->join('ci_subjects', 'subject_id = para_subject_id')
					 ->where('para_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		public function get_all_medis($id)
		{
			$this->db->select('*')
					 ->from('ci_media')
					 ->where('m_uploadedby', $id);
			$query = $this->db->get();
			return $result = $query->result();			
		}
		public function edit_para_text($data, $id)
		{
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs_pilot', $data);
			return true;
		}
		
		
		public function get_subjects_grade($subjectList,$grade_id)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1)
					 ->where('subject_gradeid', $grade_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function all_item_by_subject($id)
		{
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->where('item_subject_id', $id)
			         ->order_by("item_code", "asc");
			$query = $this->db->get();
			return $result = $query->result_array();	
		}
		
		public function get_itemspara_by_id($id)
		{
			$this->db->select('*')
					 ->from('ci_items_paragraphs_pilot')					 
					 ->join('ci_grades', 'grade_id = para_grade_id')
					 ->join('ci_subjects', 'subject_id = para_subject_id')
					 ->where('para_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		
		public function edit_itemspara($data, $id)
		{
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs_pilot', $data);
			return true;
		}
		
		public function get_ae_subjects_grade($subjectList,$grade_id)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1)
					->where('subject_gradeid', $grade_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_item_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
}
	
?>