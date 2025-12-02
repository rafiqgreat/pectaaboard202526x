<?php
	class Blocks_model extends CI_Model{
		public function add_blocks($data){
			$this->db->insert('ci_blocks', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_blocks(){
			$wh =array();
			$SQL ='SELECT * FROM ci_blocks';
			//return $this->datatable->LoadJson($SQL);
			//$wh[] = " block_code != 1";
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
			$this->db->set('block_status', $this->input->post('status'));
			$this->db->where('block_id', $this->input->post('block_id'));
			$this->db->update('ci_blocks');
		} 
		
		public function get_blocks_by_id($id){
			$query = $this->db->get_where('ci_blocks', array('block_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_blocks($data, $id){
			$this->db->where('block_id', $id);
			$this->db->update('ci_blocks', $data);
			return true;
		}
		
		public function get_blocks_for_export(){			
			$this->db->select('*')
					 ->from('ci_blocks')
					 ->join('ci_admin', 'admin_id= block_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_blocks_csv_export(){			
			$this->db->select('block_id, block_code, block_name_en, block_name_ur, block_created, username, IF(block_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_blocks')
					 ->join('ci_admin', 'admin_id= block_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>