<?php
	class Itemwriter_model extends CI_Model{
		//---------------------------------------------------
		public function add_itemwriter($data){
			$this->db->insert('ci_itemwriter', $data);
			return true;
		}
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
		function cnic_exist( $cnic ) {
			$this->db->select( '*' );
			$this->db->from( 'ci_itemwriter' );
			$this->db->where( 'ci_iw_cnic', $cnic );
			$query = $this->db->get();
			$result = $query->result_array();		
			return $result;
		}	
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
		public function get_all_subjects_unique()
		{
			$this->db->select('
				TRIM(LOWER(subject_name_en)) AS subject_key,
				subject_name_en,
				subject_name_ur,
				subject_code,
				MIN(subject_id) AS subject_id
			');
			$this->db->from('ci_subjects');
			$this->db->where('subject_status', '1');
			$this->db->group_by('subject_key');   // group by normalized name
			$this->db->order_by('subject_name_en', 'asc');
		
			$query = $this->db->get();
			return $query->result_array();
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
			$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
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
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('admin_id', $this->input->post('admin_id'));
			$this->db->update('ci_admin');
		} 
		
		//-----------------------------------------------------
		public function get_users_for_export(){			
			$this->db->select('admin_id, username, firstname, lastname, email, mobile_no, created_at');
			$this->db->from('ci_admin');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
        public function get_item_writers_jason($search_parm)
		{
		   $wh=[];
            $temp = explode('_',$search_parm);
			$district_id = $temp[0];
			$tehsil_id = $temp[1];
			$subject = $temp[2];
            $department = $temp[3];
			
            if($district_id != 0)
			{
				$wh[] ='district_id='.$district_id;
			}
			if($tehsil_id != 0)
			{
                $wh[] ='tehsil_id='.$tehsil_id;
            }
			if($subject!='x')
			{
				$wh[] ='ci_iw_subject LIKE "%'.$subject.'%"';
			}
            if($department == "Private" || $department == "Public")
			{
				$wh[] ='ci_iw_deptttype="'.$department.'"';
			}
			//print_r($wh);
			$SQL ="SELECT * FROM v_itemwriter_profile";
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
                return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
			//die($this->db->last_query());
        }
        public function get_item_writers($district_id,$tehsil_id,$subject,$department){
             $where =' WHERE 1=1';
            if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
            
            $where =' WHERE subjects_ids IN('.$subjectList.')';
            }
            if($district_id!=0){
                $where .=' AND district_id='.$district_id;
            }
            if($tehsil_id!=0){
                $where .=' AND tehsil_id='.$tehsil_id;
            }
            if($subject!=0){
                $where .=' AND ci_iw_subject="'.$subject.'"';
            }
            if($department!=0){
                $where .=' AND ci_iw_deptttype="'.$department.'"';
            }
           
            
            $SQL ="SELECT * FROM v_itemwriter_profile ".$where;
            //echo $SQL;
            $query = $this->db->query($SQL);
            return $result = $query->result_array();
            
        }
        public function item_writer_info_byid($ci_iw_id)
		{	
			$this->db->select('*')
					 ->from('v_itemwriter_profile')					 
					 ->where('ci_iw_id', $ci_iw_id);
			$query = $this->db->get();
			return $result = $query->result_array();
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