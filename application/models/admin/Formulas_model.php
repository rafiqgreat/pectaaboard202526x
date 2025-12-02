<?php
	class Formulas_model extends CI_Model{
		public function add_formulas($data){
			$this->db->insert('ci_formulas', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_formulas(){
			$wh =array();
			$SQL ='SELECT * FROM ci_formulas';
			//return $this->datatable->LoadJson($SQL);
			//$wh[] = " formula_code != 1";
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
			$this->db->set('formula_status', $this->input->post('status'));
			$this->db->where('formula_id', $this->input->post('formula_id'));
			$this->db->update('ci_formulas');
		} 
		
		public function get_formulas_by_id($id){
			$query = $this->db->get_where('ci_formulas', array('formula_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_formulas($data, $id){
			$this->db->where('formula_id', $id);
			$this->db->update('ci_formulas', $data);
			return true;
		}
		
		public function get_formulas_for_export(){			
			$this->db->select('*')
					 ->from('ci_formulas')
					 ->join('ci_admin', 'admin_id= formula_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_formulas_csv_export(){			
			$this->db->select('formula_id, formula_code, formula_name_en, formula_name_ur, formula_created, username, IF(formula_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_formulas')
					 ->join('ci_admin', 'admin_id= formula_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>