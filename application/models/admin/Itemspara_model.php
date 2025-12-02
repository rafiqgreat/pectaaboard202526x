<?php
	class Itemspara_model extends CI_Model{
		public function add_itemspara($data){
			$this->db->insert('ci_items_paragraphs', $data);
			return true;
		}
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemspara($id=0)
		{		
			$wh =array();
			if($id != 0) $wh =array('para_subject_id='.$id);
			$SQL ='SELECT * FROM ci_items_paragraphs LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id';		
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
		// get all users for server-side datatable processing (ajax based)
		public function get_all_itemspara_IW($admin_id,$id=0)
		{
			//print_r($records);
		//die($id.'=='.$this->session->userdata('role_id'));
			
			$wh =array('para_createdby='.$admin_id);
			if($id != 0) $wh =array('para_subject_id='.$id);
			$SQL ='SELECT * FROM ci_items_paragraphs LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
			
			/*
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			*/
		
		}
		//---------------------------------------------------
		public function get_all_itemspara_SS($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			if($para_status != 0)
				//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
				$wh =array('para_status IN (2,3,4)','para_subject_id IN ('.$subjectList.')');
			if($created_by != 0)
				$wh[] ='para_createdby='.$created_by;
			$SQL ='SELECT * FROM ci_items_paragraphs LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		//---------------------------------------------------
		public function get_all_itemspara_REV($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			if($para_status != 0)
				//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
				$wh =array('para_status_ae=2','para_subject_id IN ('.$subjectList.')');
				$wh[] ='para_exported=0';
			$SQL ='SELECT * FROM ci_items_paragraphs LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_eitemspara_REV($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			if($para_status != 0)
				//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
				$wh =array('para_rev_status=1','para_subject_id IN ('.$subjectList.')','para_rev_revid='.$this->session->userdata('admin_id'));
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function update_para_rev_ss_status($id){
			$this->db->set('para_rev_ss_status', '1');
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs_rev');
			return true;
		}
		public function update_para_rev_ae_status($id){
			$this->db->set('para_rev_ae_status', '1');
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs_rev');
			return true;
		}
		//---------------------------------------------------
		public function get_all_aitemspara_REV($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			if($para_status != 0)
				//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
				$wh =array('para_rev_status=2','para_subject_id IN ('.$subjectList.')','para_rev_revid='.$this->session->userdata('admin_id'));
			
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_pitemspara_rev_ss($admin_id, $subjectList, $para_status=0, $created_by=0)
		{
			$wh =array('para_rev_ss_status=0','para_rev_status=2','para_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_eitemspara_rev_ss($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			//if($para_status != 0)
			//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
			$wh =array('para_rev_ss_status=1','para_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_aitemspara_rev_ss($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			//if($para_status != 0)
			//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
			$wh =array('para_rev_ss_status=2','para_subject_id IN ('.$subjectList.')');
			
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_pitemspara_rev_ae($admin_id, $subjectList, $para_status=0, $created_by=0)
		{
			$wh =array('para_rev_ss_status=2','para_rev_ae_status=0','para_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_eitemspara_rev_ae($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			//if($para_status != 0)
			//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
			$wh =array('para_rev_ss_status=2','para_rev_ae_status=1','para_subject_id IN ('.$subjectList.')');
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_aitemspara_rev_ae($admin_id,$subjectList,$para_status=0, $created_by=0)
		{
			//if($para_status != 0)
			//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
			$wh =array('para_rev_ss_status=2','para_rev_ae_status=2','para_subject_id IN ('.$subjectList.')');
			
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_pitemspara_rev_psy()
		{
			$wh =array('para_rev_ss_status=2','para_rev_ae_status=2','para_rev_psy_status=0');
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_aitemspara_rev_psy()
		{
			$wh =array('para_rev_ss_status=2','para_rev_ae_status=2','para_rev_psy_status=2');
			
			$SQL ='SELECT * FROM ci_items_paragraphs_rev LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
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
		public function get_all_itemspara_AE($admin_id,$subjectList,$para_status_ss=0, $created_by=0)
		{
			if($para_status_ss!= 0)
				//$wh =array('para_status='.$para_status,'para_status_ss IN (0,1,2,3)','para_subject_id IN ('.$subjectList.')');
				$wh =array('para_status_ss IN (2,3)','para_subject_id IN ('.$subjectList.')');
			if($created_by != 0)
				$wh[] ='para_createdby='.$created_by;
			$SQL ='SELECT * FROM ci_items_paragraphs LEFT JOIN ci_grades ON grade_id = para_grade_id LEFT JOIN ci_subjects ON subject_id = para_subject_id LEFT JOIN ci_admin ON admin_id = para_createdby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die();
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}	
		}
		//---------------------------------------------------
		public function ss_submit_for_approval($data, $id)
		{
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs', $data);
			return true;
		}
		//---------------------------------------------------
		public function ae_submit_for_approval($data, $id)
		{
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs', $data);
			return true;
		}
		//---------------------------------------------------
		public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_ae_subjects_by_grade($grade_id,$subjectList)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		//---------------------------------------------------
		public function get_subjects_by_grade($grade_id)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		//---------------------------------------------------
		public function get_cstands_by_subject($subject_id)
		{
			$this->db->select('cs_id,cs_number,cs_statement_en,cs_statement_ur')
					 ->from('ci_content_stands')
					 ->where('cs_subject_id', $subject_id)
					 ->where('cs_status', 1);					 
			$query = $this->db->get();
			//die($query);			
			return $result = $query->result_array();			
		}
		//---------------------------------------------------
		public function all_item_by_subject($id, $paraid = 0)
		{
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_subject_id', $id)
			         ->order_by("item_code", "asc");
			$query = $this->db->get();
		//	die($this->db->last_query());
		//return $result = $query->result_array();
            
            $paraitemids = $this->get_para_items_ids($id, $paraid);
            
            $pitemids = 0;
            if($paraitemids['para_items'])
            {
                $pitemids = $paraitemids['para_items'];
            }
            
            $admin_id = 0;
            if($this->session->userdata('role_id')==3)
            {			
                $admin_id = $this->session->userdata('admin_id');
            }
			if($admin_id==0)
			{
				$this->db->select('*')
						 ->from('ci_items')
						 ->where('item_subject_id', $id)
						 ->where('item_discard_status', '0')
						 ->order_by("item_code", "asc");
			}
			else
			{
				$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_subject_id', $id)
					 ->where('item_submittedby', $admin_id)
					 ->where('item_discard_status', '0')
					 ->order_by("item_code", "asc");
			}
            if($pitemids != 0)
			{
				$this->db->where('item_id IN ('.$pitemids.')');	
			}
            $query = $this->db->get();
            //die($this->db->last_query());
            return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function all_items_by_subject($id,$admin_id = 0)
		{
            $paraitemids = $this->get_para_items_ids($id);
            
            $pitemids = 0;
            if($paraitemids['para_items'])
            {
                $pitemids = $paraitemids['para_items'];
            }
            
			if($admin_id==0)
			{
				$this->db->select('*')
						 ->from('ci_items')
						 ->where('item_subject_id', $id)
						 ->where('item_discard_status', '0')
						 ->order_by("item_code", "asc");
			}
			else
			{
				$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_subject_id', $id)
					 ->where('item_submittedby', $admin_id)
					 ->where('item_discard_status', '0')
					 ->order_by("item_code", "asc");
			}
            if($pitemids != 0)
			{
				$this->db->where('item_id NOT IN ('.$pitemids.')');	
			}
            $query = $this->db->get();
            //die($this->db->last_query());
            return $result = $query->result();	
		}
        
        public function get_para_items_ids($subjectid, $paraid = '')
		{
			$this->db->select( "GROUP_CONCAT(CONCAT(
			IF(para_item_21!=0,para_item_21,''), 
			IF(para_item_22!=0,CONCAT(',',para_item_22),''), 
			IF(para_item_23!=0,CONCAT(',',para_item_23),''),
			IF(para_item_24!=0,CONCAT(',',para_item_24),''),
			IF(para_item_25!=0,CONCAT(',',para_item_25),''), 
			IF(para_item_26!=0,CONCAT(',',para_item_26),''),
			IF(para_item_27!=0,CONCAT(',',para_item_27),''), 
			IF(para_item_28!=0,CONCAT(',',para_item_28),''),
			IF(para_item_29!=0,CONCAT(',',para_item_29),''), 
			IF(para_item_30!=0,CONCAT(',',para_item_30),'')
			)
			) AS para_items" )
					 ->from('ci_items_paragraphs')
					 ->where('para_subject_id', $subjectid);
			
			if($paraid != 0 && $paraid != '')
			{
				$this->db->where('para_id NOT IN ('.$paraid.')');	
			}
			
			$query = $this->db->get();
            //print $this->db->last_query(); die;
			return $result = $query->row_array();
		}
		//---------------------------------------------------
		public function get_paras_by_subject($id)
		{
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->where('para_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		//---------------------------------------------------
		public function get_all_subjects()
		{	
			$this->db->select('subject_id, subject_code, subject_name_en')
					 ->from('ci_subjects')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function change_status()
		{		
			$this->db->set('item_status', $this->input->post('status'));
			$this->db->where('item_id', $this->input->post('item_id'));
			$this->db->update('ci_items_paragraphs');
		} 
		//---------------------------------------------------
		public function find_rev_itemspara_by_id($id)
		{	
			$this->db->select('para_id, para_rev_revid')
					 ->from('ci_items_paragraphs_rev')	
					 ->where('para_id', $id);				 
			$query = $this->db->get();
			return $result = $query->result();
		}
		//---------------------------------------------------
		public function add_itemspara_rev($data)
		{
			$this->db->insert('ci_items_paragraphs_rev', $data);
			return true;
		}
		//---------------------------------------------------
		public function update_itemspara_exported($status,$id)
		{
			$this->db->set('para_exported', $status);
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs');
			return true;
		}
		//---------------------------------------------------
		public function edit_itemspara_rev($data, $id)
		{
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs_rev', $data);
			return true;
		}
		//---------------------------------------------------
		public function get_itemspara_by_id($id)
		{
			$this->db->select('*')
					 ->from('ci_items_paragraphs')					 
					 ->join('ci_grades', 'grade_id = para_grade_id')
					 ->join('ci_subjects', 'subject_id = para_subject_id')
					 ->where('para_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		//---------------------------------------------------
		public function get_rev_itemspara_by_id($id)
		{
			$this->db->select('*')
					 ->from('ci_items_paragraphs_rev')					 
					 ->join('ci_grades', 'grade_id = para_grade_id')
					 ->join('ci_subjects', 'subject_id = para_subject_id')
					 ->where('para_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		//---------------------------------------------------
		public function get_subjects_grade($subjectList,$grade_id)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1)
					 ->where('subject_gradeid', $grade_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function edit_itemspara($data, $id)
		{
			$this->db->where('para_id', $id);
			$this->db->update('ci_items_paragraphs', $data);
			return true;
		}
		//---------------------------------------------------
		public function get_itemspara_for_export()
		{			
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->join('ci_grades', 'grade_id= item_gradeid')
					 ->join('ci_admin', 'admin_id= item_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_itemspara_csv_export()
		{			
			$this->db->select('item_id, item_code, item_name_en, item_name_ur, item_sort, grade_code, IF(item_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_items_paragraphs')
					 ->join('ci_grades', 'grade_id= item_gradeid');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_item_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		//---------------------------------------------------
		public function get_rev_items_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_rev')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_content_stands', 'cs_id = item_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = item_subcstand_id')
					 ->join('ci_slos', 'item_slo_id = slo_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();			
			//die($this->db->last_query());
		}
		//---------------------------------------------------
		public function find_exported($id)
		{
			$this->db->select('item_exported')
					 ->from('ci_items')					 
					 ->where('item_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		//---------------------------------------------------
		public function get_item_status($item_id)
		{
			$this->db->select('item_rev_status')
					 ->from('ci_items_rev')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());		
		}
		//---------------------------------------------------
		public function get_ss_item_status($item_id)
		{
			$this->db->select('item_rev_ss_status')
					 ->from('ci_items_rev')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());		
		}
		//---------------------------------------------------
		public function get_ae_item_status($item_id)
		{
			$this->db->select('item_rev_ae_status')
					 ->from('ci_items_rev')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());		
		}
		public function get_psy_item_status($item_id)
		{
			$this->db->select('item_rev_psy_status')
					 ->from('ci_items_rev')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());		
		}
		//---------------------------------------------------
		public function get_ae_subjects($subjectList)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_ae_subjects_grade($subjectList,$grade_id)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1)
					->where('subject_gradeid', $grade_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_iwinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_irinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_rev_ssinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_rev_aeinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_rev_psyinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_ssinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_aeinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function get_psyinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------	
		public function item_search()
		{	
			$this->db->select('*')
					 ->from('ci_items_paragraphs')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//---------------------------------------------------
		public function submitpara_for_approval($id)
		{
			$this->db->where('para_id', $id);
			//$this->db->update('ci_items_paragraphs', array('para_status'=> '2','para_status_ss'=> '0'));
			$this->db->update('ci_items_paragraphs', array('para_status'=> '4','para_status_ss'=> '3','para_status_ae'=> '2'));
			return true;
		}
		//---------------------------------------------------
		public function log_entry($datalog)
		{
			$this->db->insert('ci_itemslog', $datalog);
			return true;
		}
		//---------------------------------------------------
		public function get_update_itemsofpara_exported($para_items)
		{
			$query = "INSERT INTO ci_items_rev (`item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_rev_status`, `item_rev_revid`)  SELECT `item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`,1,".$this->session->userdata('admin_id')." FROM ci_items WHERE item_id  IN (".$para_items.") AND NOT EXISTS ( SELECT * FROM ci_items_rev WHERE ci_items_rev.item_id = ci_items.item_id )";
			$qry = $this->db->query($query);
			
			$query2 = "UPDATE ci_items SET item_exported = 1 WHERE item_id IN (".$para_items.")";
			$qry2 = $this->db->query($query2);
		}
		public function rev_all_items_by_subject($id,$admin_id = 0)
		{
			$this->db->select('*')
				 ->from('ci_items_rev')
				 ->where('item_subject_id', $id)
				 ->order_by("item_code", "asc");
				$query = $this->db->get();
				//die($this->db->last_query());
				return $result = $query->result();	
		}		
}
	
?>