<?php
	class Pilot_itemsgroup_model extends CI_Model{

		public function add_itemsgroup($data)
		{
			$this->db->insert('ci_items_group', $data);
			return true;
		}
		
		public function get_all_grades()
		{	
			$this->db->select('grade_id,grade_code,grade_name_en,grade_name_ur')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		//updated function
		public function get_all_itemsgroup_pilot($grade_id = 0,$subject_id = 0)
		{
            $wh=array();
            if($grade_id != 0)
				{$wh[] ='grade_id='.$grade_id;}
			if($subject_id != 0){
                $wh[] ='subject_id='.$subject_id;
            }
            
			$wh[] ='group_subject_id IN ('.$this->session->userdata('subjects_ids').')';
			$SQL ='SELECT * FROM ci_items_group_pilot LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('IF');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('ELSE');
			}
		}
		
		public function get_ss_subjects_by_grade($grade_id,$subjectList=0)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_gradeid', $grade_id)
					 ->where('subject_id IN ('.$subjectList.')')
					 ->where('subject_status', 1);					 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		
		public function get_all_itemsgroup_pilot_searched($id=0)
		{
			$temp = explode('_',$id);
			$search_grade = $temp[0];
			$search_subject = $temp[1];
			
			if($search_grade != 0)
				$wh =array('group_grade_id='.$search_grade);
			if($search_subject != 0)
				$wh[] ='group_subject_id='.$search_subject;
			
			//$wh =array('group_subject_id IN ('.$this->session->userdata('subjects_ids').')');
			$wh[] ='group_subject_id IN ('.$this->session->userdata('subjects_ids').')';
			$SQL ='SELECT * FROM ci_items_group_pilot LEFT JOIN ci_grades ON grade_id = group_grade_id LEFT JOIN ci_subjects ON subject_id = group_subject_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
				//echo $this->db->last_query();
				//die('IF');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
				//echo $this->db->last_query();
				//die('ELSE');
			}
		}	
		public function get_group_by_id($id)
		{
			$this->db->select('*')
					 ->from('ci_items_group_pilot')					 
					 ->join('ci_grades', 'grade_id = group_grade_id')
					 ->join('ci_subjects', 'subject_id = group_subject_id')
					 ->where('group_id', $id);
			$query = $this->db->get();
			 return $result = $query->result();	
			 //die($this->db->last_query());
		}	
		
		public function get_item_by_id($item_id)
		{
			$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->join('ci_grades', 'grade_id = item_grade_id')
					 ->join('ci_subjects', 'subject_id = item_subject_id')
					 ->join('ci_admin', 'item_submittedby = admin_id')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			//die($this->db->last_query());
			return $result = $query->result();			
		}
		
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
		
		public function get_all_subjects()
		{	
			$this->db->select('subject_id, subject_code, subject_name_en')
					 ->from('ci_subjects')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function all_item_by_subject($id, $groupid = 0)
		{
			$this->db->select('*')
					 ->from('ci_items_pilot')
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
						 ->from('ci_items_pilot')
						 ->where('item_subject_id', $id)
						 ->order_by("item_code", "asc");
			}
			else
			{
				$this->db->select('*')
					 ->from('ci_items_pilot')
					 ->where('item_subject_id', $id)
					 ->where('item_submittedby', $admin_id)
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
					 ->from('ci_items_group_pilot')
					 ->where('group_subject_id', $subjectid);
            if($groupid != 0 && $groupid !='')
			{
				$this->db->where('group_id NOT IN ('.$groupid.')');	
			}
			$query = $this->db->get();
			return $result = $query->row_array();
            //die($this->db->last_query());
		}
		
		public function edit_itemsgroup($data, $id)
		{
			$this->db->where('group_id', $id);
			$this->db->update('ci_items_group_pilot', $data);
			return true;
		}
}
?>