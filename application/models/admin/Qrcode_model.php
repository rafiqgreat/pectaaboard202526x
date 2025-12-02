<?php
class Qrcode_model extends CI_Model{
	
	public function get_school_info_by_id($id = 0){			
		$this->db->select('*')
				 ->from('ci_schools')
				 ->join('ci_districts', 'district_id= school_district_id')
				 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
				 ->where('school_id', $id);
		$query = $this->db->get();
		return $result = $query->row_array();
	} 
	
	public function get_school_by_id($id){
		$query = $this->db->get_where('ci_schools', array('school_id' => $id));
		return $result = $query->row_array();
	}
	
	public function get_subject_by_id($id){
		$query = $this->db->get_where('ci_subjects', array('subject_id' => $id));
		return $result = $query->row_array();
	}
	
	public function get_grade_by_id($id){
		$query = $this->db->get_where('ci_grades', array('grade_id' => $id));
		return $result = $query->row_array();
	}
	
	function qrcode_mcq_exist($qrcode) {
		//$this->db->where('column_name like binary', $value);
		$this->db->select( '*' );
		$this->db->from( 'ci_final_paper_mcq' );
		$this->db->where( 'fp_paper_number like binary', $qrcode );
		$query = $this->db->get();
		$result = $query->result_array();		
		return $result;
	}
	
	function qrcode_crq_exist($qrcode) {
		$this->db->select( '*' );
		$this->db->from( 'ci_final_paper_crq' );
		$this->db->where( 'fpc_paper_number like binary', $qrcode );
		$query = $this->db->get();
		$result = $query->result_array();		
		return $result;
	}
}
?>