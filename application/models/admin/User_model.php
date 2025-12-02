<?php
	class User_model extends CI_Model{
		//---------------------------------------------------
		// check username already exist or not 
		//-----------------------------------------------------
		function username_exist( $username ) {
			$this->db->select( '*' );
			$this->db->from( 'ci_admin' );
			$this->db->where( 'username', $username );
			$query = $this->db->get();
			$result = $query->result_array();		
			return $result;
		}		
		//---------------------------------------------------
		// get Assessment all users for parent selection (ajax based)
		//-----------------------------------------------------
		public function get_all_subjects_with_grades(){
			$this->db->select('*')
					->from('ci_subjects')
					->join('ci_grades', 'grade_id= subject_gradeid')
					->where('subject_status', '1')
					->order_by("subject_name_en", "asc")
					->order_by("grade_id", "asc")					;					
			$query = $this->db->get();
			return $result = $query->result_array();
		}		
		//-----------------------------------------------------
		// add new user to database
		//-----------------------------------------------------
		public function add_user($data){
			$this->db->insert('ci_admin', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		//-----------------------------------------------------
		public function get_all_users(){
			$wh =array();
			$SQL ='SELECT * FROM ci_admin LEFT JOIN ci_admin_roles ON role_id = admin_role_id';
			$wh[] = " deleted != 1";
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
		// get Assessment all users for parent selection (ajax based)
		//-----------------------------------------------------
		public function get_all_aeusers(){
			$this->db->select('*')
					->from('ci_admin')
					->where('deleted !=', '1')
					->where('admin_role_id', '2')
					->where('is_active', '1');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_users_byroleid($admin_role_id){
			$this->db->select('*')
					->from('ci_admin')
					->where('deleted !=', '1')
					->where('admin_role_id', $admin_role_id)
					->where('is_active', '1');
			$this->db->order_by("username", "ASC");
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_subject_by_users_id($admin_id){
			$query = $this->db->get_where('ci_admin', array('admin_id' => $admin_id));
			$userinfo = $query->row_array();
			
			$this->db->select('*')
					->from('ci_subjects')
					->join('ci_grades', 'grade_id= subject_gradeid')
					->where('subject_status', '1')
					->where('subject_id IN ('.$userinfo['subjects_ids'].')')
					->order_by("subject_name_en", "asc")
					->order_by("grade_id", "asc")					;					
			$query = $this->db->get();
			return $result = $query->result_array();
		}	
		
		//---------------------------------------------------
		// get All roles while creation new user or edit user
		//-----------------------------------------------------
		public function get_all_roles(){				
		$res= [];
		$query = $this->db->get('ci_admin_roles');
		foreach ($query->result() as $row)
		{
			$res[] = $row;
		}
			return $res;
		}
		//---------------------------------------------------
		// Get user detial by ID
		//-----------------------------------------------------
		public function get_user_by_id($id){
			$this->db->select('*')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id)
					->join('ci_itemreviewers', 'ci_itemreviewers.ci_ir_adminid = ci_admin.admin_id', 'left')
					->join('ci_itemwriter', 'ci_itemwriter.ci_iw_adminid = ci_admin.admin_id', 'left')
				;
			$query = $this->db->get();
			
			//$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
			return $result = $query->row_array();
		}
		//---------------------------------------------------
		// Edit user Record
		//-----------------------------------------------------
		public function edit_user($data, $id){
			$this->db->where('admin_id', $id);
			$this->db->update('ci_admin', $data);
			return true;
		}
		//---------------------------------------------------
		// Change user status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('admin_id', $this->input->post('admin_id'));
			$this->db->update('ci_admin');
		} 
		//---------------------------------------------------
		// get users for csv export
		//-----------------------------------------------------
		public function get_users_for_export(){			
			$this->db->select('admin_id, username, role_name, firstname, lastname, email, mobile_no, created_at');
			$this->db->from('ci_admin');
			$this->db->join('ci_admin_roles', 'role_id = admin_role_id');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_districts()
		{	
			$this->db->select('district_id, district_name_en')
					 ->from('ci_districts')					 
					 ->where('district_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		function get_tehsil_by_district($district_id)
		{
			$this->db->select('tehsil_id, tehsil_name_en, tehsil_name_ur')
					 ->from('ci_tehsil')
					 ->where('tehsil_district_id', $district_id)
					 ->where('tehsil_status', 1);					 
			$query = $this->db->get();			
			return $query->result_array();
		}
		public function add_itemreviewers($data){
			$this->db->insert('ci_itemreviewers', $data);
			return true;
		}
		public function add_itemwriter($data){
			$this->db->insert('ci_itemwriter', $data);
			return true;
		}
		public function itemreviewer_edit($data, $id){
			$this->db->where('ci_ir_adminid', $id);
			$this->db->update('ci_itemreviewers', $data);
			return true;
		}
		public function itemwriter_edit($data, $id){
			$this->db->where('ci_iw_adminid', $id);
			$this->db->update('ci_itemwriter', $data);
			return true;
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