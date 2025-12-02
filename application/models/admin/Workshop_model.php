<?php
	class Workshop_model extends CI_Model{
		public function add_workshop($data){
			$this->db->insert('ci_workshops', $data);
			return $this->db->insert_id();
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_workshops(){
			$wh =array();            
            
			$SQL ='SELECT * FROM ci_workshops';
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
		
		public function get_workshop_by_id($id){
			$query = $this->db->get_where('ci_workshops', array('ws_id' => $id));
			return $result = $query->row_array();
		}
        
        public function get_workshop_byid($id)
        {
            /*LEFT JOIN ci_workshopss ON ws_id = cf_ws_id LEFT JOIN ci_admin ON admin_id = cf_iw_ir_id  LEFT JOIN ci_admin_roles ON role_id = admin_role_id*/
            $this->db->select('*')
					 ->from('ci_workshops')
                     ->where('ws_id', $id);
			$query = $this->db->get();
			return $result = $query->row_array();
           // echo $this->db->last_query(); die;
        }
		
		public function edit_workshop($data, $id){
			$this->db->where('cf_id', $id);
			$this->db->update('ci_workshops', $data);
			return true;
		}
        
        
        
        public function get_all_users_byroleid($admin_role_id)
        {
			$this->db->select('*')
					->from('ci_admin')
					->where('deleted !=', '1')
					->where('admin_role_id', $admin_role_id)                    
					->where('is_active', '1');
			$this->db->order_by("username", "ASC");
            if($this->session->userdata('role_id') != 1)
            {
                $this->db->where('parent_admin_id', $this->session->userdata('admin_id'));
            }
			$query = $this->db->get();
			return $result = $query->result_array();
		}
        
        public function get_ss_itemwriters($admin_role_id, $parent_admin_id)
        {
			$this->db->select('*')
					->from('ci_admin')
					->where('deleted !=', '1')
					->where('admin_role_id', $admin_role_id)
                    
					->where('is_active', '1');
			$this->db->order_by("username", "ASC");
            if($this->session->userdata('role_id') != 1)
            {
                $this->db->where('parent_admin_id', $parent_admin_id);
            }
			$query = $this->db->get();
			return $result = $query->result();
		}
        
        function qrcode_exist($qrcode) 
        {
            //$this->db->where('column_name like binary', $value);
            $this->db->select( '*' );
            $this->db->from( 'ci_workshops' );
            $this->db->where( 'cf_qrcode like binary', $qrcode );
            $query = $this->db->get();
            $result = $query->result_array();		
            return $result;
        }
        
        public function edit($data, $id){
            $this->db->where('ws_id', $id);
            $this->db->update('ci_workshops', $data);
            return true;
        }
	}
?>