<?php
	class Itemsgroup_model extends CI_Model{

		public function add_itemsgroup($data)
		{
			$this->db->insert('ci_items_group', $data);
			return true;
		}

		public function get_all_itemsgroup_IW($admin_id,$id=0)
		{
			$wh =array('group_createdby='.$admin_id);
			if($id != 0) $wh =array('group_subject_id='.$id);
			$SQL ='SELECT * FROM ci_items_group LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id';		
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
		
		public function get_all_itemsgroup_SS($admin_id,$subjectList,$group_status=0, $submitted_by=0)
		{
			if($group_status != 0)
				$wh =array('group_subject_id IN ('.$subjectList.')');
			if($submitted_by != 0)
				$wh[] ='group_createdby='.$submitted_by;

			$SQL ='SELECT * FROM ci_items_group LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_itemsgroup_AE($admin_id,$subjectList,$group_status_ss=0)
		{
			if(!empty($subjectList)) 
				$wh[] =('group_subject_id IN ('.$subjectList.')');
			if($group_status_ss == 23) 
				$wh[] =('group_status_ss IN (2,3)');

			$SQL ='SELECT * FROM ci_items_group LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//die($this->db->last_query());
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}
		
		public function get_all_itemsgroup_PSY($admin_id,$id=0)
		{
			$wh =array('group_createdby='.$admin_id);
			if($id != 0) $wh =array('group_subject_id='.$id);
			$SQL ='SELECT * FROM ci_items_group LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id';		
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
		
		public function get_all_itemsgroup_REV($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_status_ae=1';
				$wh[] ='group_exported=0';
			$SQL ='SELECT * FROM ci_items_group LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('if');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('else');
			}
		}
		
		public function get_all_eitemsgroup_REV($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_status=1';
				$wh[]='group_rev_revid='.$this->session->userdata('admin_id');
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_aitemsgroup_REV($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_status=2';
				$wh[]='group_rev_revid='.$this->session->userdata('admin_id');
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_pitemsgroup_rev_ss($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_status=2';
				$wh[] ='group_rev_ss_status=0';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_eitemsgroup_rev_ss($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_ss_status=1';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_aitemsgroup_rev_ss($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_ss_status=2';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_pitemsgroup_rev_ae($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_ss_status=2';
				$wh[] ='group_rev_ae_status=0';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_itemsgroup_revised_ir($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_ss_status=3';
				$wh[] ='group_rev_ae_status IN (0,3)';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_eitemsgroup_rev_ae($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_ae_status=1';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_aitemsgroup_rev_ae($subjectList)
		{
			if(!empty($subjectList))
				$wh =array('group_subject_id IN ('.$subjectList.')');
				$wh[] ='group_rev_ae_status=2';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_pitemsgroup_rev_psy()
		{
			$wh[] ='group_rev_ss_status=2';
			$wh[] ='group_rev_ae_status=2';
			$wh[] ='group_rev_psy_status=0';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_eitemsgroup_rev_psy()
		{
			$wh[] ='group_rev_ss_status=2';
			$wh[] ='group_rev_ae_status=2';
			$wh[] ='group_rev_psy_status=1';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_all_aitemsgroup_rev_psy()
		{
			$wh[] ='group_rev_ss_status=2';
			$wh[] ='group_rev_ae_status=2';
			$wh[] ='group_rev_psy_status=2';
			$SQL ='SELECT * FROM ci_items_group_rev LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id LEFT JOIN ci_admin ON admin_id = group_createdby';			
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
		
		public function get_group_by_id($id)
		{
			$this->db->select('*')
					 ->from('ci_items_group')					 
					 ->join('ci_grades', 'grade_id = group_grade_id')
					 ->join('ci_subjects', 'subject_id = group_subject_id')
					 ->where('group_id', $id);
			$query = $this->db->get();
			 return $result = $query->result();	
			 //die($this->db->last_query());
		}
		
		public function update_group_rev_ss_status($id){
			$this->db->set('group_rev_ss_status', '1');
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group_rev');
			return true;
		}
		
		public function update_group_rev_ae_status($id){
			$this->db->set('group_rev_ae_status', '1');
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group_rev');
			return true;
		}
		
		public function find_exported($id)
		{
			$this->db->select('group_exported')
					 ->from('ci_items_group')					 
					 ->where('group_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		
		public function get_group_rev_by_id($id)
		{
			$this->db->select('*')
					 ->from('ci_items_group_rev')					 
					 ->join('ci_grades', 'grade_id = group_grade_id')
					 ->join('ci_subjects', 'subject_id = group_subject_id')
					 ->where('group_id', $id);
			$query = $this->db->get();
			return $result = $query->result();	
		}
		
		public function find_rev_itemsgroup_by_id($id)
		{	
			$this->db->select('group_id, group_rev_revid')
					 ->from('ci_items_group_rev')	
					 ->where('group_id', $id);				 
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function submitgroup_for_approval($id)
		{
			$this->db->where('group_id', $id);
			//$this->db->update('ci_items_group', array('group_status'=> '2'));
			$this->db->update('ci_items_group', array('group_status'=> '4', 'group_status_ss'=> '3', 'group_status_ae'=> '1'));
			return true;
		}
		
		public function ss_submit_for_approval($data, $id)
		{
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group', $data);
			return true;
		}
		
		public function ae_submit_for_approval($data, $id)
		{
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group', $data);
			return true;
		}
		
		public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
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
		
		public function get_iw_subjects_by_grade($grade_id,$subjectList)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		public function get_subjects_by_grade($grade_id)
		{
			$this->db->select('subject_id,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
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
		
		public function all_item_by_subject($id, $groupid = 0)
		{
			$this->db->select('*')
					 ->from('ci_items')
					 ->where('item_subject_id', $id)
			         ->order_by("item_code", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			//return $result = $query->result_array();
            
            $groupitemids = $this->get_group_items_ids($id, $groupid);
            //print '<pre>'; print_r($groupitemids);die('123');
            
            $gitemids = 0;
            if($groupitemids['group_items'])
            {
                $gitemids = $groupitemids['group_items'];
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
            if($gitemids != 0)
			{
				$this->db->where('item_id NOT IN ('.$gitemids.')');	
			}
            $query = $this->db->get();
            //die($this->db->last_query());
            return $result = $query->result_array();	
		}
		
		public function all_rev_item_by_subject($id)
		{
			$this->db->select('item_id,item_code')
					 ->from('ci_items_rev')
					 ->where('item_subject_id', $id)
					 ->where('item_type', 'ERQ')
			       ->order_by("item_code", "asc");
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result_array();	
		}
		
		public function all_items_by_subject($id,$admin_id = 0)
		{
            $groupitemids = $this->get_group_items_ids($id);
            //print '<pre>'; print_r($groupitemids);die('123');
            
            $gitemids = 0;
            if($groupitemids['group_items'])
            {
                $gitemids = $groupitemids['group_items'];
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
            if($gitemids != 0)
			{
				$this->db->where('item_id NOT IN ('.$gitemids.')');	
			}
            $query = $this->db->get();
            //die($this->db->last_query());
            return $result = $query->result();	
		}
        
        public function get_group_items_ids($subjectid,$groupid = '')
		{
			$this->db->select( "GROUP_CONCAT(CONCAT(
			IF(group_item_1!=0,group_item_1,''), 
			IF(group_item_2!=0,CONCAT(',',group_item_2),''), 
			IF(group_item_3!=0,CONCAT(',',group_item_3),''),
			IF(group_item_4!=0,CONCAT(',',group_item_4),''),
			IF(group_item_5!=0,CONCAT(',',group_item_5),''), 
			IF(group_item_6!=0,CONCAT(',',group_item_6),''),
			IF(group_item_7!=0,CONCAT(',',group_item_7),''), 
			IF(group_item_8!=0,CONCAT(',',group_item_8),''),
			IF(group_item_9!=0,CONCAT(',',group_item_9),''), 
			IF(group_item_10!=0,CONCAT(',',group_item_10),'')
			)
			) AS group_items" )
					 ->from('ci_items_group')
					 ->where('group_subject_id', $subjectid);
            if($groupid != 0 && $groupid !='')
			{
				$this->db->where('group_id NOT IN ('.$groupid.')');	
			}
			$query = $this->db->get();
			return $result = $query->row_array();
            //die($this->db->last_query());
		}
		
		public function rev_all_items_by_subject($id,$admin_id = 0)
		{
			$this->db->select('*')
				 ->from('ci_items_rev')
				 ->where('item_subject_id', $id)
				 ->where('item_rev_status', 2)
				 ->where('item_type', 'ERQ')
				 ->order_by("item_code", "asc");
				 
				$query = $this->db->get();
				//die($this->db->last_query());
				return $result = $query->result();	
		}
		
		public function get_paras_by_subject($id)
		{
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->where('para_subject_id', $id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();	
		}
		
		public function get_all_subjects()
		{	
			$this->db->select('subject_id, subject_code, subject_name_en')
					 ->from('ci_subjects')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		function change_status()
		{		
			$this->db->set('item_status', $this->input->post('status'));
			$this->db->where('item_id', $this->input->post('item_id'));
			$this->db->update('ci_items_paragraphs');
		} 
		
		public function edit_itemsgroup($data, $id)
		{
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group', $data);
			return true;
		}
		public function edit_itemsgroup_rev($data, $id)
		{
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group_rev', $data);
			return true;
		}
		
		public function get_itemspara_for_export()
		{			
			$this->db->select('*')
					 ->from('ci_items_paragraphs')
					 ->join('ci_grades', 'grade_id= item_gradeid')
					 ->join('ci_admin', 'admin_id= item_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_itemspara_csv_export()
		{			
			$this->db->select('item_id, item_code, item_name_en, item_name_ur, item_sort, grade_code, IF(item_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_items_paragraphs')
					 ->join('ci_grades', 'grade_id= item_gradeid');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
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
		}
		public function get_item_status($item_id)
		{
			$this->db->select('item_rev_status')
					 ->from('ci_items_rev')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());		
		}
		public function get_ss_item_status($item_id)
		{
			$this->db->select('item_rev_ss_status')
					 ->from('ci_items_rev')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
			//die($this->db->last_query());		
		}
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
		
		public function get_ae_subjects_grade($subjectList,$grade_id)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1)
					->where('subject_gradeid', $grade_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}/////////////
		
		public function get_subjects_grade($subjectList,$grade_id)
		{	
			$this->db->select('subject_id,subject_code,subject_name_en')
					 ->from('ci_subjects')
					 ->where('subject_id IN ('.$subjectList.')')					 
					 ->where('subject_status', 1)
					 ->where('subject_gradeid', $grade_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}/////////////
		public function get_iwinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_irinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_rev_ssinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_ssinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_aeinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_rev_aeinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_rev_psyinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_psyinfo_by_id($id)
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}	
		public function item_search()
		{	
			$this->db->select('*')
					 ->from('ci_items_paragraphs')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function log_entry($datalog)
		{
			$this->db->insert('ci_itemslog', $datalog);
			return true;
		}
		public function add_itemsgroup_rev($data)
        {
			$this->db->insert('ci_items_group_rev', $data);
			return true;
		}
		public function update_itemsgroup_exported($status=0,$id)
        {
			$this->db->set('group_exported', 1);
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group');
			return true;
		}
		public function get_update_itemsofgroup_exported($group_items)
		{
			$query = "INSERT INTO ci_items_rev (`item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`, `item_rev_status`, `item_rev_revid`)  SELECT `item_id`, `item_code`, `item_difficulty`, `item_discr`, `item_dif_code`, `item_registration`, `item_date_received`, `item_submitted`, `item_submittedby`, `item_updated`, `item_updatedby`, `item_grade_id`, `item_subject_id`, `item_cstand_id`, `item_subcstand_id`, `item_slo_id`, `item_cognitive_bloom`, `item_curriculum`, `item_pctb_chapter`, `item_pctb_page`, `item_other_title`, `item_other_year`, `item_other_page`, `item_relation`, `item_type`, `item_stem_number`, `item_stem_en`, `item_stem_ur`, `item_image_en`, `item_image_ur`, `item_image_position`, `item_option_layout`, `item_option_a_en`, `item_option_a_ur`, `item_option_a_image`, `item_option_b_en`, `item_option_b_ur`, `item_option_b_image`, `item_option_c_en`, `item_option_c_ur`, `item_option_c_image`, `item_option_d_en`, `item_option_d_ur`, `item_option_d_image`, `item_option_correct`, `item_sort`, `item_status`, `item_approved`, `item_approvedby`, `item_reviewed`, `item_reviewedby`, `item_rubric_english`, `item_rubric_urdu`, `item_rubric_image_position`, `item_rubric_image`, `item_status_ss`, `item_comment_ss`, `item_status_ae`, `item_comment_ae`, `item_status_psy`, `item_comment_psy`, `item_date_psy`, `item_commentby_psy`, `item_batch`,1,".$this->session->userdata('admin_id')." FROM ci_items WHERE item_id  IN (".$group_items.") AND NOT EXISTS ( SELECT * FROM ci_items_rev WHERE ci_items_rev.item_id = ci_items.item_id )";
            $qry = $this->db->query($query);

            $query2 = "UPDATE ci_items SET item_exported = 1 WHERE item_id IN (".$group_items.")";
            $qry2 = $this->db->query($query2);
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
				$this->db->where('para_id IN ('.$paraid.')');	
			}
			
			$query = $this->db->get();
            //print $this->db->last_query(); die;
			return $result = $query->row_array();
		}
        
	}
?>