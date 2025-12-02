<?php
	class Subjects_model extends CI_Model{
		public function add_subjects($data){
			$this->db->insert('ci_subjects', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_subjects(){		
			$wh =array();
			$SQL ='SELECT * FROM ci_subjects LEFT JOIN ci_grades ON grade_id = subject_gradeid ';			
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
		
		function change_status()
		{		
			$this->db->set('subject_status', $this->input->post('status'));
			$this->db->where('subject_id', $this->input->post('subject_id'));
			$this->db->update('ci_subjects');
		} 
		
		public function get_subjects_by_id($id){
			$query = $this->db->get_where('ci_subjects', array('subject_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_subjects($data, $id){
			$this->db->where('subject_id', $id);
			$this->db->update('ci_subjects', $data);
			return true;
		}
		
		public function get_subjects_for_export(){			
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id= subject_gradeid')
					 ->join('ci_admin', 'admin_id= subject_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_subjects_csv_export(){			
			$this->db->select('subject_id, subject_code, subject_name_en, subject_name_ur, subject_sort, grade_code, IF(subject_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id= subject_gradeid');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
	}
?>