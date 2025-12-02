<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_model extends CI_Model{
	public function get_user_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}
	//--------------------------------------------------------------------
	public function update_user($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd_school($data, $username){
		$this->db->where('username', $username);
		$this->db->update('ci_schools', $data);
		//die($this->db->last_query());
		return true;
	}
	//--------------------------------------------------------------------
	public function get_itemswriter_by_id($id){
			$this->db->select('*')
				 ->from('ci_admin')
				 ->join('ci_itemwriter', 'ci_iw_adminid = admin_id', 'left')
				 ->where('admin_id ', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
		}
	//--------------------------------------------------------------------
		public function get_itemsreviewer_by_id($id){
			$this->db->select('*')
				 ->from('ci_admin')
				 ->join('ci_itemreviewers', 'ci_ir_adminid = admin_id', 'left')
				 ->where('admin_id ', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
		}
	//--------------------------------------------------------------------
		public function get_iw_by_id($id){
			$this->db->select('*')
				 ->from('ci_itemwriter')
				 ->where('ci_iw_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
		}
		public function get_ir_by_id($id){
			$this->db->select('*')
				 ->from('ci_itemreviewers')
				 ->where('ci_ir_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();			
		}
	//--------------------------------------------------------------------
	public function get_all_tehsils()
		{	
			$this->db->select('tehsil_id, tehsil_name_en')
					 ->from('ci_tehsil')					 
					 ->where('tehsil_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	//--------------------------------------------------------------------
	public function get_all_districts()
		{	
			$this->db->select('district_id, district_name_en')
					 ->from('ci_districts')					 
					 ->where('district_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	//--------------------------------------------------------------------
	public function edit_iw_tbladmin($admin_id, $data_admin){
			$this->db->where('admin_id', $admin_id);
			$this->db->update('ci_admin', $data_admin);
			return true;
		}
	//--------------------------------------------------------------------
	public function edit_ir_tbladmin($admin_id, $data_admin){
			$this->db->where('admin_id', $admin_id);
			$this->db->update('ci_admin', $data_admin);
			return true;
		}
	//--------------------------------------------------------------------
	public function itemwriters_edit($data, $id){
			$this->db->where('ci_iw_id', $id);
			$this->db->update('ci_itemwriter', $data);
			return true;
		}
	//--------------------------------------------------------------------
	public function itemwreviewer_edit($data, $id){
			$this->db->where('ci_ir_id', $id);
			$this->db->update('ci_itemreviewers', $data);
			return true;
		}
	public function update_user_email_verification_code($id, $varification_code){
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', array('email_verify_code' => $varification_code));
	}
	public function get_all_qualification()
	{	
		$this->db->select('q_id, q_degree_name')
				 ->from('ci_qualification')					 
				 ->where('q_status', 1)
				 ->order_by('q_degree_name', 'ASC');
		$query = $this->db->get();
		return $result = $query->result_array();
	}
	public function get_all_banks()
	{	
		$this->db->select('b_id, b_bank_name')
				 ->from('ci_bank')					 
				 ->where('b_status', 1)
				 ->order_by('b_bank_name', 'ASC');
		$query = $this->db->get();
		return $result = $query->result_array();
	}
}
?>