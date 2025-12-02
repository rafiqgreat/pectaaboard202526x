<?php
	class Grades_model extends CI_Model{
		public function add_grades($data){
			$this->db->insert('ci_grades', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_grades(){
			$wh =array();
			$SQL ='SELECT * FROM ci_grades';
			//return $this->datatable->LoadJson($SQL);
			//$wh[] = " grade_code != 1";
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
		function change_status()
		{		
			$this->db->set('grade_status', $this->input->post('status'));
			$this->db->where('grade_id', $this->input->post('grade_id'));
			$this->db->update('ci_grades');
		} 
		
		public function get_grades_by_id($id){
			$query = $this->db->get_where('ci_grades', array('grade_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_grades($data, $id){
			$this->db->where('grade_id', $id);
			$this->db->update('ci_grades', $data);
			return true;
		}
		
		public function get_grades_for_export(){			
			$this->db->select('*')
					 ->from('ci_grades')
					 ->join('ci_admin', 'admin_id= grade_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_grades_csv_export(){			
			$this->db->select('grade_id, grade_code, grade_name_en, grade_name_ur, grade_created, username, IF(grade_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_grades')
					 ->join('ci_admin', 'admin_id= grade_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>