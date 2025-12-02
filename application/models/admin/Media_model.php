<?php
	class Media_model extends CI_Model{

	public function get_all_media()
	{	
		$this->db->select('*')
				 ->from('ci_media')
				 ->where('m_uploadedby', $this->session->userdata('admin_id'));
		$query = $this->db->get();
		return $result = $query->result_array();
		//die($this->db->last_query());
	}
	
	public function add($data)
	{
		$this->db->insert('ci_media', $data);
		return true;
	}
}
?>