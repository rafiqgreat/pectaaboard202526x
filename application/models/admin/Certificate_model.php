<?php
	class Certificate_model extends CI_Model{
		public function add_certificate($data){
			$this->db->insert('ci_certificate', $data);
			return $this->db->insert_id();
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_certificates($admin_id, $admin_role_id){
			$wh =array();
            if($admin_role_id != 1){
                $wh[] = 'parent_admin_id='.$admin_id;
            }
            
			$SQL ='SELECT * FROM ci_certificate LEFT JOIN ci_workshops ON ws_id = cf_ws_id LEFT JOIN ci_admin ON admin_id = cf_iw_ir_id  LEFT JOIN ci_admin_roles ON role_id = admin_role_id';
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
		
		public function get_certificate_by_id($id){
			$query = $this->db->get_where('ci_certificate', array('cf_id' => $id));
			return $result = $query->row_array();
		}
        
        public function get_certificate_byid($id)
        {
            /*LEFT JOIN ci_workshops ON ws_id = cf_ws_id LEFT JOIN ci_admin ON admin_id = cf_iw_ir_id  LEFT JOIN ci_admin_roles ON role_id = admin_role_id*/
            $this->db->select('*, iwdistrict.district_name_en as iwdistrictname,irdistrict.district_name_en as irdistrictname')
					 ->from('ci_certificate')
                     ->join('ci_workshops', 'ws_id = cf_ws_id')
					 ->join('ci_admin', 'admin_id = cf_iw_ir_id')
                     ->join('ci_admin_roles', 'role_id = admin_role_id')
                     ->join('ci_itemreviewers', 'ci_ir_adminid = cf_iw_ir_id', 'left')
                     ->join('ci_itemwriter', 'ci_iw_adminid = cf_iw_ir_id', 'left')
                     ->join('ci_districts as iwdistrict', 'iwdistrict.district_id = ci_iw_district', 'left')
                     ->join('ci_districts as irdistrict', 'irdistrict.district_id = ci_ir_district', 'left')
                     ->where('cf_id', $id);
			$query = $this->db->get();
			return $result = $query->row_array();
           // echo $this->db->last_query(); die;
        }
		
		public function edit_certificate($data, $id){
			$this->db->where('cf_id', $id);
			$this->db->update('ci_certificate', $data);
			return true;
		}
        
        public function get_all_workshops()
        {
            $this->db->select('*')
					 ->from('ci_workshops')		 
					 ->where('ws_status', '1');
			$query = $this->db->get();
			return $result = $query->result();
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
            $this->db->from( 'ci_certificate' );
            $this->db->where( 'cf_qrcode like binary', $qrcode );
            $query = $this->db->get();
            $result = $query->result_array();		
            return $result;
        }
        
        function check_certificate_exist($cf_iw_ir_id, $cf_ws_id) 
        {
            //$this->db->where('column_name like binary', $value);
            $this->db->select( '*' );
            $this->db->from( 'ci_certificate' );
            $this->db->where( 'cf_iw_ir_id', $cf_iw_ir_id );
            $this->db->where( 'cf_ws_id', $cf_ws_id );
            $query = $this->db->get();
            $result = $query->result_array();		
            return $result;
        }
	}
?>