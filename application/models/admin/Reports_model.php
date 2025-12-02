<?php
	class Reports_model extends CI_Model{
		public function add_reports($data){
			$this->db->insert('ci_items_rev', $data);
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
		
		public function get_all_subjects()
		{	
			$this->db->select('subject_id, subject_code, subject_name_en, grade_code')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'subject_gradeid= grade_id')					 
					 ->where('subject_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
        
        public function get_all_subjects_grade()
		{
			$this->db->select('GROUP_CONCAT(subject_id) AS subjectids, subject_name_en')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'subject_gradeid= grade_id')					 
					 ->where('subject_status', 1)
                     ->group_by('subject_name_en');
            
            if($this->session->userdata('role_id')!=1){
                $subjectList = $this->session->userdata('subjects_ids');
                $this->db->where('subject_id in('.$subjectList.')');
            }
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_iw()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '3');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_ss()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '2');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_ae()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '4');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_psy()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '5');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_ir()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '6');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_rev_ss()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '2');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_rev_ae()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '4');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_rev_psy()
		{	
			$this->db->select('admin_id,username,firstname,lastname')
					 ->from('ci_admin')					 
					 ->where('admin_role_id', '5');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_all_itemwriters()
		{
			$wh =array();
			$SQL ='SELECT * FROM v_itemwriters';			
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
					 ->from('v_itemwriters');					 
			$query = $this->db->get();			
			return $result = $query->result_array();
			*/
		}
		
		public function get_iw_by_subject($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')
					 ->where('admin_role_id', '3')
					 ->where("find_in_set($id, subjects_ids)");	
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function get_ss_by_subject($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')
					 ->where('admin_role_id', '2')
					 ->where("find_in_set($id, subjects_ids)");	
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function get_ae_by_subject($id)
		{	
			$this->db->select('admin_id, username, firstname, lastname')
					 ->from('ci_admin')
					 ->where('admin_role_id', '4')
					 ->where("find_in_set($id, subjects_ids)");	
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function get_subjects_by_grade($grade_id)
		{
			$excluded = array(5,9,13,16,19,21,26,28,32,35,40,43,48,51,56,58,65,66,67);
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_gradeid', $grade_id)
					 ->where_not_in('subject_id', $excluded)
					 ->where('subject_status', 1);					 
			$query = $this->db->get();
			return $result = $query->result_array();			
		}
		
		public function get_items_ceo_search($id=0)
		{
			$temp = explode('_',$id);
			$search_phase = $temp[0];
			$search_grade = $temp[1];
			$search_subject = $temp[2];
			
			if($search_grade != 0)
				{$wh[] ='item_grade_id='.$search_grade;}
			if($search_subject != 0)
				{$wh[] ='item_subject_id='.$search_subject;}
			if($search_phase != 0)
				{$wh[] ='item_batch='.$search_phase;}
			/*
			$wh[] ='item_rev_status=2';
			$wh[] ='item_rev_ss_status=0';
			$wh[] = 'item_subject_id IN ('.$subjectList.')';
			if(!empty($excluded_items)){$wh[] = 'item_id NOT IN ('.$excluded_items.')';}		
			*/
			if($search_phase==1)
			{
				$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
			}
			else
			{
				$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_rev_revid';
			}
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
		public function get_content_strnds_export($grade,$subject,$cont_strand,$sub_cs,$slo_id,$item_cycle){
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            $where ='WHERE 1=1';
            if($grade!=0){
                $where .=' AND ci_grades.grade_id='.$grade;
            }
            if($subject!=0){
                $where .=' AND ci_subjects.subject_id='.$subject;
            }elseif( $subjectList !='' AND $this->session->userdata('role_id')!=1){
                 $where .=' AND ci_subjects.subject_id in('.$subjectList.')';
            }
            if($cont_strand!=0){
                $where .=' AND ci_content_stands.cs_id='.$cont_strand;
            }
            if($sub_cs!=0){
                $where .=' AND subcs_id='.$sub_cs;
            }
            if($slo_id != 0){
                $where .=' AND slo.slo_id='.$slo_id;
            }
            if($item_cycle==1)
            {
               $SQL ="SELECT grade_name_en, subject_name_en,cs_id,cs_number, cs_statement_en, subcs_id, 
                        subcs_number,subcs_topic_en,subcs_topic_ur,CONCAT( subcs_id,'.',subcs_number,':',subcs_topic_en,subcs_topic_ur) as subcs_topic,
                        slo.slo_number,CONCAT(slo.slo_statement_en,' ',slo.slo_statement_ur) AS slo_stem,
                        (SELECT SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS Submitted, 
                        (SELECT SUM(IF(item_status!=1 AND item_type='MCQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS Submitted_MCQ, 
                        (SELECT SUM(IF(item_status!=1 AND item_type='ERQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS Submitted_ERQ,
                        (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS AE, 
                        (SELECT SUM(IF(item_status=4 AND item_status_ae=1 AND item_type='MCQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS AE_MCQ, 
                        (SELECT SUM(IF(item_status=4 AND item_status_ae=1 AND item_type='ERQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS AE_ERQ
                        FROM ci_subcontent_stands
                        JOIN ci_slos AS slo ON slo.slo_subcstand_id = ci_subcontent_stands.subcs_id
                        LEFT JOIN ci_grades ON grade_id = subcs_grade_id
                        LEFT JOIN ci_subjects ON subject_id = subcs_subject_id
                        LEFT JOIN ci_content_stands ON cs_id = subcs_cstand_id
                        "; 
            }
            elseif($item_cycle==2)
            {
               $SQL ="SELECT grade_name_en, subject_name_en,cs_id,cs_number, cs_statement_en, subcs_id, 
                        subcs_number,subcs_topic_en,subcs_topic_ur,CONCAT( subcs_id,'.',subcs_number,':',subcs_topic_en,subcs_topic_ur) as subcs_topic,
                        slo.slo_number,CONCAT(slo.slo_statement_en,' ',slo.slo_statement_ur) AS slo_stem,
                        (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4), 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE, 
                        (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='MCQ', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_MCQ, 
                        (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='ERQ', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_ERQ
                        FROM ci_subcontent_stands
                        JOIN ci_slos AS slo ON slo.slo_subcstand_id = ci_subcontent_stands.subcs_id
                        LEFT JOIN ci_grades ON grade_id = subcs_grade_id
                        LEFT JOIN ci_subjects ON subject_id = subcs_subject_id
                        LEFT JOIN ci_content_stands ON cs_id = subcs_cstand_id
                        "; 
            }
                        
            $SQL .=$where;
                    ;
            //echo $SQL;
            $query = $this->db->query($SQL);
            return $result = $query->result_array();
            
            
            
        }
        public function get_content_strands_sumary($id=0)
		{
			$wh=array();
            $temp = explode('_',$id);
			$item_grade_id = $temp[0];
			$item_subject_id = $temp[1];
			$item_cstand_id = $temp[2];
            $item_subcstand_id = $temp[3];
            $item_slo_id = $temp[4];
            $item_cycle = $temp[5];
            
            $subjectList = $this->session->userdata('subjects_ids');
			
			if($item_grade_id != 0)
				{$wh[] ='ci_grades.grade_id='.$item_grade_id;}
			if($item_subject_id != 0){
                $wh[] ='ci_subjects.subject_id='.$item_subject_id;
            }elseif($subjectList !='' AND $this->session->userdata('role_id')!=1){
               $wh[] ='ci_subjects.subject_id in('.$subjectList.')'; 
            }
			if($item_cstand_id != 0)
				{$wh[] ='ci_content_stands.cs_id='.$item_cstand_id;}
            if($item_subcstand_id != 0)
				{$wh[] ='subcs_id='.$item_subcstand_id;}
            if($item_slo_id != 0)
				{$wh[] ='slo.slo_id='.$item_slo_id;}
			
			if($item_cycle==1)
            {
               $SQL ="SELECT grade_name_en, subject_name_en,cs_id,cs_number, cs_statement_en, subcs_id, 
                        subcs_number,subcs_topic_en,subcs_topic_ur,CONCAT( subcs_id,'.',subcs_number,':',subcs_topic_en,subcs_topic_ur) as subcs_topic,
                        slo.slo_number,CONCAT(slo.slo_statement_en,' ',slo.slo_statement_ur) AS slo_stem,
                        (SELECT SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS Submitted, 
                        (SELECT SUM(IF(item_status!=1 AND item_type='MCQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS Submitted_MCQ, 
                        (SELECT SUM(IF(item_status!=1 AND item_type='ERQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS Submitted_ERQ,
                        (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS AE, 
                        (SELECT SUM(IF(item_status=4 AND item_status_ae=1 AND item_type='MCQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS AE_MCQ, 
                        (SELECT SUM(IF(item_status=4 AND item_status_ae=1 AND item_type='ERQ', 1, 0)) AS Submitted_Items FROM ci_items WHERE item_subcstand_id =  subcs_id) AS AE_ERQ
                        FROM ci_subcontent_stands
                        JOIN ci_slos AS slo ON slo.slo_subcstand_id = ci_subcontent_stands.subcs_id
                        LEFT JOIN ci_grades ON grade_id = subcs_grade_id
                        LEFT JOIN ci_subjects ON subject_id = subcs_subject_id
                        LEFT JOIN ci_content_stands ON cs_id = subcs_cstand_id
                        "; 
            }
            elseif($item_cycle==2)
            {
               $SQL ="SELECT grade_name_en, subject_name_en,cs_id,cs_number, cs_statement_en, subcs_id, 
                        subcs_number,subcs_topic_en,subcs_topic_ur,CONCAT( subcs_id,'.',subcs_number,':',subcs_topic_en,subcs_topic_ur) as subcs_topic,
                        slo.slo_number,CONCAT(slo.slo_statement_en,' ',slo.slo_statement_ur) AS slo_stem,
                        (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4), 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE, 
                        (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='MCQ', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_MCQ, 
                        (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='ERQ', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_ERQ
                        FROM ci_subcontent_stands
                        JOIN ci_slos AS slo ON slo.slo_subcstand_id = ci_subcontent_stands.subcs_id
                        LEFT JOIN ci_grades ON grade_id = subcs_grade_id
                        LEFT JOIN ci_subjects ON subject_id = subcs_subject_id
                        LEFT JOIN ci_content_stands ON cs_id = subcs_cstand_id
                        "; 
            }
				
			
			
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
        /******************************************************************************
        *               Start Item Advance Search
        ***********************************************************************/
        public function get_search_jason($id=0){
            $wh=array();
            $temp = explode('_',$id);
			//$item_grade_id = $temp[0];
			//$item_subject_id = $temp[1];
            //$this->encryption->decode($encrypt)
            $search     =  str_replace('%20',' ',$temp[0]);
            $item_code  = $temp[1];
            $dificulty  = $temp[2];
            $item_type  = $temp[3];
            $item_stat  = $temp[4];
            $cog_lev    = $temp[5];
            $layout     = $temp[6];
            $curriculum = $temp[7];
            $item_relation = $temp[8];
            
            $item_grade_id = $temp[9];
			$item_subject_id = $temp[10];
			$item_cstand_id = $temp[11];
            $item_subcstand_id = $temp[12];
            $search_type = $temp[13];
           if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
			$wh[] ='item_subject_id in('.$subjectList.')'; 
           }
            
			if($search != '0' && $search_type =='Like' )
				{
                    $wh[] =" item_code LIKE '%".$search."%' 
                        
                        OR cognitive_level LIKE  '%".$search."%'
                        OR curriculam LIKE  '%".$search."%'
                        OR istatus LIKE  '%".$search."%'
                        OR ss_status LIKE  '%".$search."%'
                        OR ae_status LIKE  '%".$search."%'
                        OR psy_status LIKE  '%".$search."%'
                        OR item_pctb_chapter LIKE  '%".$search."%'
                        OR strip_tags(item_stem_en) LIKE  '%".$search."%'
                        OR item_stem_ur LIKE  '%".$search."%'
                        OR item_relation LIKE  '%".$search."%'";
                }else{
                    if($item_code != 0){
                        $wh[] ="item_code = '".$item_code."'";
                    }
                    if($dificulty != 0){
                        $dif =explode('-',$dificulty);
                        $wh[] ="item_difficulty >= '".$dif[0]."'";
                        $wh[] ="item_difficulty <= '".$dif[1]."'";
                    }
                    if($item_type == 'MCQ'){
                        $wh[] ="item_type = '".$item_type."'";
                    }
                    if($item_stat != 0){
                        $wh[] ="item_status = '".$item_stat."'";
                    }
                    if($cog_lev != 0){
                        $wh[] ="cognitive_level = '".$cog_lev."'";
                    }
                    if($layout != 0){
                        $wh[] ="item_option_layout = '".$layout."'";
                    }
                    if($curriculum != 0){
                        $wh[] ="item_curriculum = '".$curriculum."'";
                    }
                    if($item_relation != 0){
                        $wh[] ="item_relation = '".$item_relation."'";
                    }
                
                    if($item_grade_id != 0)
                        {$wh[] ='item_grade_id='.$item_grade_id;}
                    if($item_subject_id != 0){
                        $wh[] ='item_subject_id='.$item_subject_id;
                    }
                    if($item_cstand_id != 0)
                        {$wh[] ='cs_id='.$item_cstand_id;}
                    if($item_subcstand_id != 0)
                        {$wh[] ='subcs_id='.$item_subcstand_id;}
                        }
			
            $SQL = "SELECT * FROM v_items_search ";
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
                  return  $this->datatable->LoadJson($SQL,$WHERE);
                //echo $this->db->last_query();
				//die('if');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
                //echo $this->db->last_query();
				//die('if');
			}	
            
        }
        public function get_item_search_exp($search=0,$item_code=0,$dificulty=0,$item_type=0,$item_stat=0,$cog_lev=0,$layout=0,$curriculum=0,$item_relation=0,$item_grade_id=0,$item_subject_id=0,$item_cstand_id=0,$item_subcstand_id=0,$search_type=0){
            $search=  str_replace('%20',' ',$search);;
            $WHERE = 'WHERE 1=1 ';
            if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
			$WHERE .='AND item_subject_id in('.$subjectList.')'; 
           }
            
			if($search != '0' && $search_type =='Like' )
				{
                    $WHERE .="AND ( item_code LIKE '%".$search."%' 
                        
                        OR cognitive_level LIKE  '%".$search."%'
                        OR curriculam LIKE  '%".$search."%'
                        OR istatus LIKE  '%".$search."%'
                        OR ss_status LIKE  '%".$search."%'
                        OR ae_status LIKE  '%".$search."%'
                        OR psy_status LIKE  '%".$search."%'
                        OR item_pctb_chapter LIKE  '%".$search."%'
                        OR strip_tags(item_stem_en) LIKE  '%".$search."%'
                        OR item_stem_ur LIKE  '%".$search."%'
                        OR item_relation LIKE  '%".$search."%')";
                }else{
                    if($item_code != 0){
                        $WHERE =" AND item_code = '".$item_code."'";
                    }
                    if($dificulty != 0){
                        $dif =explode('-',$dificulty);
                        $WHERE .=" AND item_difficulty >= '".$dif[0]."'";
                        $WHERE .=" AND item_difficulty <= '".$dif[1]."'";
                    }
                    if($item_type != 0){
                        $WHERE .=" AND item_type = '".$item_type."'";
                    }
                    if($item_stat != 0){
                        $WHERE .=" AND item_status = '".$item_stat."'";
                    }
                    if($cog_lev != 0){
                        $WHERE .=" AND cognitive_level = '".$cog_lev."'";
                    }
                    if($layout != 0){
                        $WHERE .=" AND item_option_layout = '".$layout."'";
                    }
                    if($curriculum != 0){
                        $WHERE .=" AND item_curriculum = '".$curriculum."'";
                    }
                    if($item_relation != 0){
                        $WHERE .= " AND item_relation = '".$item_relation."'";
                    }
                
                    if($item_grade_id != 0){
                        $WHERE .=' AND item_grade_id='.$item_grade_id;
                    }
                    if($item_subject_id != 0){
                        $WHERE .=' AND item_subject_id='.$item_subject_id;
                    }
                    if($item_cstand_id != 0)
                        {$WHERE .=' AND cs_id='.$item_cstand_id;}
                    if($item_subcstand_id != 0)
                        {$WHERE .=' AND subcs_id='.$item_subcstand_id;}
                        }
			
            $SQL = " SELECT * FROM v_items_search ";
			
            $SQL= $SQL.$WHERE;
            $query = $this->db->query($SQL);
            return $result = $query->result_array();
            
            
        }
        public function get_item_details_byId($item_id){
            $this->db->select('*')
					 ->from('v_items_search')					 
					 ->where('item_id', $item_id);
			$query = $this->db->get();
            return $result = $query->result();	
			//return $result = $query->result_array();
            
        }
        public function get_item_search_jason($grade_id,$subject_id)
        {
            $wh=array();
           // $temp = explode('_',$id);
            $wh[] ='item_grade_id ='.$grade_id;
            $wh[] ='item_subject_id ='.$subject_id;
			
           // $search     =  str_replace('%20',' ',$serch_str);
           
           if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
			$wh[] ='item_subject_id in('.$subjectList.')'; 
           }
            
			/*if($search != "")
            {
                $wh[] =" strip_tags(item_stem_en) LIKE  '%".$search."%'";
                    ;
            }*/
			
            $SQL = "SELECT grade_id,subject_name_en,item_type,cs_strand,
                    strip_tags(item_stem_en) AS item_stem_en, (item_stem_ur) AS item_stem_ur,item_id,rev_item_id,pilot_item_id
                    FROM v_items_search ";
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
                  return  $this->datatable->LoadJson($SQL,$WHERE);
                   //$this->datatable->LoadJson($SQL,$WHERE);
                //echo $this->db->last_query();
				//die('if');
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
                //echo $this->db->last_query();
				//die('if');
			}	
            
        }
        
        public function get_item_search_jason_grade($grade_id,$subject_id)
        { 
            $wh=array();
           // $temp = explode('_',$id);
           // $wh[] ='item_grade_id ='.$grade_id;
            $wh[] ='item_subject_id IN ('.$subject_id.')';
			
           // $search     =  str_replace('%20',' ',$serch_str);
           
            if($this->session->userdata('role_id')!=1){
                $subjectList = $this->session->userdata('subjects_ids');
                $wh[] ='item_subject_id in('.$subjectList.')'; 
            }
            $SQL = "SELECT grade_id,subject_name_en,item_type,cs_strand,
                    strip_tags(item_stem_en) AS item_stem_en, (item_stem_ur) AS item_stem_ur,item_id,rev_item_id,pilot_item_id
                    FROM v_items_search ";
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
                return  $this->datatable->LoadJson($SQL,$WHERE);
                
                /*$this->datatable->LoadJson($SQL,$WHERE);
                echo $this->db->last_query();
				die('if');*/
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
                //echo $this->db->last_query();
				//die('if');
			}	
            
        }
        public function get_ae_subjects_by_grade($grade_id,$subjectList)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_gradeid', $grade_id);
            
                if($this->session->userdata('role_id') !=1){
                   $this->db->where('subject_id IN ('.$subjectList.')');
                   $this->db->where('subject_status', 1);	
                    
                }
					
									 
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
        /*************************************************************************
        *       End Item Advance Search Report
        ***************************************************************************/
        
        /******************************************************************************
        *               Start Item Created summary Report
        ***********************************************************************/
        public function get_item_created_sumry($grade,$subject){
            $where ='1=1';
            if($this->session->userdata('role_id')!=1){
             $subjectList = $this->session->userdata('subjects_ids');
             $where ='subject_id in('.$subjectList.')';
            }
            if($grade!=0){
                $where .=' AND grade_id='.$grade;
            }
            if($subject!=0){
                $where .=' AND subject_id='.$subject;
            }
            
            $this->db->select('*')
					 ->from('v_item_created_sumary')					 
					 ->where($where);
			$query = $this->db->get();
            return $result = $query->result_array();
            
            
        }
        public function get_item_created_sumry_jason($id=0){
            $wh=array();
            $temp = explode('_',$id);
			$item_grade_id = $temp[0];
			$item_subject_id = $temp[1];
           if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
			$wh[] ='subject_id in('.$subjectList.')'; 
            
           }
			if($item_grade_id != 0)
				{$wh[] ='grade_id='.$item_grade_id;}
			if($item_subject_id != 0){
                $wh[] ='subject_id='.$item_subject_id;
            }
            $SQL = "SELECT * FROM v_item_created_sumary";
			
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
		
		public function get_item_review_created_sumry_jason($id=0){
            $wh=array();
            $temp = explode('_',$id);
			$item_grade_id = $temp[0];
			$item_subject_id = $temp[1];
           if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
			$wh[] ='subject_id in('.$subjectList.')'; 
            
           }
			if($item_grade_id != 0)
				{$wh[] ='subject_gradeid='.$item_grade_id;}
			if($item_subject_id != 0){
                $wh[] ='subject_id='.$item_subject_id;
            }
            $SQL = "SELECT grade_id,subject_id, (subject_gradeid-2) AS Grades, grade_name_en, subject_name_en AS Subjects, 
            
					(SELECT COUNT(*) FROM `ci_items` WHERE item_status_ae = 1 AND item_subject_id = subject_id) AS C1_Items,
					(SELECT COUNT(*) FROM `ci_items` WHERE item_status_ae = 1 AND item_subject_id = subject_id AND item_type='MCQ') AS C1_MCQ_Items,
                    
                    (SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (2,4) AND item_subject_id = subject_id) AS C2_IR_Reviewed,
(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_IR_MCQ_Reviewed,
(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (0,1) AND item_subject_id = subject_id) AS C2_IR_Pending,
(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (0,1) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_IR_MCQ_Pending,
                    
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status IN (2,4) AND item_subject_id = subject_id) AS C2_Reviewed,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status IN (2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_MCQ_Reviewed,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ss_status = 0 AND item_rev_status IN(2,4) AND item_subject_id = subject_id) AS C2_SS_Pending,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ss_status = 0 AND item_rev_status IN(2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_SS_MCQ_Pending,
                    
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status = 0 AND item_rev_ss_status IN(2,4) AND item_subject_id = subject_id) AS C2_AE_Pending,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status = 0 AND item_rev_ss_status IN(2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_AE_MCQ_Pending
					FROM `ci_subjects`
					LEFT JOIN ci_grades ON grade_id = subject_gradeid ";
			
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
        public function get_pending_items_list($grade_id,$subject_id,$item_type,$stat_of){
           
            $sql = "SELECT  item_id,item_stem_en,item_code , (item_grade_id-2) AS grade,subject_name_en,
                    (SELECT CONCAT(cs_statement_en,cs_statement_ur ) FROM ci_content_stands WHERE cs_id = ci_items_rev.item_cstand_id)  AS cs_strand,
                    (SELECT CONCAT(subcs_topic_en,subcs_topic_ur )  FROM ci_subcontent_stands WHERE subcs_id = ci_items_rev.item_subcstand_id) AS subcs_strand,
                    (SELECT CONCAT(slo_number,slo_statement_en,slo_statement_ur )  FROM ci_slos WHERE slo_id = ci_items_rev.item_slo_id) AS slo
                    FROM ci_items_rev 
                    INNER JOIN `ci_subjects` ON subject_id = item_subject_id
                    WHERE item_grade_id =".$grade_id."
                    AND item_subject_id =".$subject_id;
            if($item_type == 'MCQ'){
                 $sql .=" AND item_type ='".$item_type."'";
            }
           else{
                 $sql .=" AND item_type <>'MCQ'";
            }
                  
            if($stat_of == 'SS'){
                $sql .=" AND item_rev_ss_status = 0 ";
            }
            else if($stat_of == 'AE'){
                  $sql .=" AND item_rev_ae_status = 0 ";
            }
            else if($stat_of == 'IR'){
                  $sql .=" AND item_rev_status IN (0,1) ";
            }
            //echo $sql;
            $query = $this->db->query($sql);
            return $result = $query->result_array();
            
            
        }
        /***********************  END Item Created summary Report*********************/
        
        /******************************************************************************
        *               Missing Item summary Report
        ***********************************************************************/
		public function get_item_review_created_sumry($grade,$subject){
            $where ='1=1';
            if($this->session->userdata('role_id')!=1){
             $subjectList = $this->session->userdata('subjects_ids');
             $where ='subject_id in('.$subjectList.')';
            }
            if($grade!=0){
                $where .=' AND subject_gradeid='.$grade;
            }
            if($subject!=0){
                $where .=' AND subject_id='.$subject;
            }
            
            $this->db->select("grade_id,subject_id, (subject_gradeid-2) AS Grades, grade_name_en, subject_name_en AS Subjects, 
            
					(SELECT COUNT(*) FROM `ci_items` WHERE item_status_ae = 1 AND item_subject_id = subject_id) AS C1_Items,
					(SELECT COUNT(*) FROM `ci_items` WHERE item_status_ae = 1 AND item_subject_id = subject_id AND item_type='MCQ') AS C1_MCQ_Items,
                    
                    (SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (2,4) AND item_subject_id = subject_id) AS C2_IR_Reviewed,
(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_IR_MCQ_Reviewed,
(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (0,1) AND item_subject_id = subject_id) AS C2_IR_Pending,
(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_status IN (0,1) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_IR_MCQ_Pending,
                    
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status IN (2,4) AND item_subject_id = subject_id) AS C2_Reviewed,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status IN (2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_MCQ_Reviewed,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ss_status = 0 AND item_rev_status IN(2,4) AND item_subject_id = subject_id) AS C2_SS_Pending,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ss_status = 0 AND item_rev_status IN(2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_SS_MCQ_Pending,
                    
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status = 0 AND item_rev_ss_status IN(2,4) AND item_subject_id = subject_id) AS C2_AE_Pending,
					(SELECT COUNT(*) FROM `ci_items_rev` WHERE  item_rev_ae_status = 0 AND item_rev_ss_status IN(2,4) AND item_subject_id = subject_id AND item_type='MCQ') AS C2_AE_MCQ_Pending")
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')	
					 ->where($where);
			$query = $this->db->get();
            return $result = $query->result_array();
        }
		
        public function get_missing_items_sumry($grade,$subject){
            $where ='1=1';
            if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
            $where ='item_subject_id in('.$subjectList.')';
            }
            if($grade!=0){
                $where .=' AND item_grade_id='.$grade;
            }
            if($subject!=0){
                $where .=' AND item_subject_id='.$subject;
            }
            
            $this->db->select('*')
					 ->from('v_item_missing_sumary')					 
					 ->where($where);
			$query = $this->db->get();
            return $result = $query->result_array();
            
            
        }
        public function get_missing_items_sumry_jason($id=0){
            $wh=array();
            $temp = explode('_',$id);
			$item_grade_id = $temp[0];
			$item_subject_id = $temp[1];
           if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
			$wh[] ='item_subject_id in('.$subjectList.')'; 
           }
            
			if($item_grade_id != 0)
				{$wh[] ='item_grade_id='.$item_grade_id;}
			if($item_subject_id != 0){
                $wh[] ='item_subject_id='.$item_subject_id;
            }
            $SQL = "SELECT * FROM v_item_missing_sumary";
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
                 return $this->datatable->LoadJson($SQL,$WHERE);
                   // echo $this->db->last_query();	
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
                
			}	
            
        }
        public function get_missing_items_detail($subject_id,$mis_field){
            
            $where =' WHERE item_rev_ae_status IN(2,4) AND item_subject_id ='.$subject_id;
            if($mis_field == 'item_rubric'){
                 $where .=" AND item_type ='ERQ' AND item_rubric_english='' AND item_rubric_urdu='' ";
            }else{
                $where .=" AND ".$mis_field."= ''";
            }
            //new fields added
            $SQL ="SELECT  item_id,item_stem_en,item_code , (item_grade_id-2) AS grade,subject_name_en,
                    (SELECT CONCAT(cs_statement_en,cs_statement_ur ) FROM ci_content_stands WHERE cs_id = ci_items_rev.item_cstand_id)  AS cs_strand,
                    (SELECT CONCAT(subcs_topic_en,subcs_topic_ur )  FROM ci_subcontent_stands WHERE subcs_id = ci_items_rev.item_subcstand_id) AS subcs_strand,
                    (SELECT CONCAT(slo_number,slo_statement_en,slo_statement_ur )  FROM ci_slos WHERE slo_id = ci_items_rev.item_slo_id) AS slo
                    FROM ci_items_rev 
                    INNER JOIN `ci_subjects` ON subject_id = item_subject_id ".
                $where;
            //echo $SQL;
            $query = $this->db->query($SQL);
            return $result = $query->result_array();
            
        }
        
        /***********************  END Item Created summary Report*********************/
        
        
        
        /******************************************************************************
        *               Start cognativ level summary
        ***********************************************************************/
        
        public function get_cognitive_level_sumary($grade,$subject,$cont_strand,$sub_cs){
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            $where ='WHERE 1=1';
            if($grade!=0){
                $where .=' AND grade_id='.$grade;
            }
            if($subject!=0){
                $where .=' AND subject_id='.$subject;
            }elseif( $subjectList !='' AND $this->session->userdata('role_id')!=1){
                 $where .=' AND subject_id in('.$subjectList.')';
            }
            if($cont_strand!=0){
                $where .=' AND cs_id='.$cont_strand;
            }
            if($sub_cs!=0){
                $where .=' AND subcs_id='.$sub_cs;
            }
            
            $SQL = "SELECT * FROM v_cognativlevel_sumry ";
            $SQL .=$where;
                    ;
            //echo $SQL;
            $query = $this->db->query($SQL);
            return $result = $query->result_array();
            
            
            
        }
        
        public function get_cognitive_level_sumry_jason($id=0)
		{
			$wh=array();
            $temp = explode('_',$id);
			$item_grade_id = $temp[0];
			$item_subject_id = $temp[1];
			$item_cstand_id = $temp[2];
            $item_subcstand_id = $temp[3];
           
            $subjectList = $this->session->userdata('subjects_ids');
			
			if($item_grade_id != 0)
				{$wh[] ='grade_id='.$item_grade_id;}
			if($item_subject_id != 0){
                $wh[] ='subject_id='.$item_subject_id;
            }elseif($subjectList !='' AND $this->session->userdata('role_id')!=1){
               $wh[] ='subject_id in('.$subjectList.')'; 
            }
			if($item_cstand_id != 0)
				{$wh[] ='cs_id='.$item_cstand_id;}
            if($item_subcstand_id != 0)
				{$wh[] ='subcs_id='.$item_subcstand_id;}
              /* $SQL ="SELECT grade_name_en, subject_name_en,CONCAT(cs_id,'.',cs_number,'.',cs_statement_en) AS cs_statement, subcs_id, 
                subcs_number,subcs_topic_en,subcs_topic_ur,CONCAT( subcs_id,'.',subcs_number,':',subcs_topic_en,subcs_topic_ur) AS subcs_topic,
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4), 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE, 
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='MCQ', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_MCQ, 
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='MCQ' AND item_cognitive_bloom = 'Knowledge', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_MCQ_K, 
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='MCQ' AND item_cognitive_bloom = 'Comprehension', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_MCQ_C, 
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='MCQ' AND item_cognitive_bloom IN ('Application','Analysis','Synthesis','Evaluation'), 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_MCQ_H, 
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='ERQ', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_ERQ,
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='ERQ'  AND item_cognitive_bloom = 'Knowledge', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_ERQ_K,
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='ERQ'  AND item_cognitive_bloom = 'Comprehension', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_ERQ_C,
                (SELECT SUM(IF(item_rev_status IN(2,4) AND item_rev_ae_status IN(2,4) AND item_type='ERQ'  AND item_cognitive_bloom = 'Knowledge', 1, 0)) AS Submitted_Items FROM ci_items_rev WHERE item_subcstand_id =  subcs_id) AS AE_ERQ_H
                FROM ci_subcontent_stands
                LEFT JOIN ci_grades ON grade_id = subcs_grade_id
                LEFT JOIN ci_subjects ON subject_id = subcs_subject_id
                LEFT JOIN ci_content_stands ON cs_id = subcs_cstand_id"; */		
            
			$SQL = "SELECT * FROM v_cognativlevel_sumry";
			
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
        
        ////////end cognative level //////////////
        
		public function get_ceo_rep_com_search($id=0)
		{
			$temp = explode('_',$id);
			$search_grade = $temp[0];
			$search_subject = $temp[1];
			$search_status = $temp[2];
			$search_phase = $temp[3];
			
			if($search_grade != 0)
				{$wh[] ='item_grade_id='.$search_grade;}
			if($search_subject != 0)
				{$wh[] ='item_subject_id='.$search_subject;}
			if($search_status != 0)
				{$wh[] ='item_status='.$search_status;}
			if($search_phase == 1)
				{
					$SQL ='SELECT * FROM ci_items LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
				}
				else
				{
					$SQL ='SELECT * FROM ci_items_rev LEFT JOIN ci_grades ON grade_id = item_grade_id LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN ci_admin ON admin_id = item_submittedby';
				}
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
		public function rep_search_comments($search_grade=0,$search_subject=0,$search_status=0,$search_phase=0)
		{	
			if($search_phase==1)
			{
				 $this->db->select('item_code, item_stem_en, item_stem_ur, item_comment_ss, item_comment_ae, item_comment_psy')
				 ->from('ci_items')	;				 
			}
			if($search_phase==2)
			{
				 $this->db->select('item_code, item_stem_en, item_stem_ur, item_rev_ss_comment, item_rev_ae_comment, item_rev_psy_comment')
				 ->from('ci_items_rev')	;				 
			}	
			if($search_grade!=0){$this->db->where('item_grade_id', $search_grade);}
			if($search_subject!=0){$this->db->where('item_subject_id', $search_subject);}
			if($search_status!=0){$this->db->where('item_status', $search_status);}
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		/////////////////////////////////////////////////////////////////
		public function iw_ir_advance_summary_jason($params)
		{
			$wh=array();
            $temp = explode('_',$params);
			$user_type     		= $temp[0];
			$department     	= $temp[1];
			$name_include     	= $temp[2];
			$fname_include     	= $temp[3];
			$user_cnic     		= $temp[4];
			$user_email     	= $temp[5];
			$user_phone     	= $temp[6];
			$user_bank     		= $temp[7];
			$district_id     	= $temp[8];
			$tehsil_id     		= $temp[9];
			$user_qualification = $temp[10];
			$user_exp     		= $temp[11];
			
			if($user_type == 3)//item writer
			{
				$wh[] ='admin_role_id=3';
				if($department != 'x')
				{
					$wh[] ='ci_iw_deptttype="'.$department.'"';
				}
				if($name_include != 'x')
				{
					$wh[] ='(ci_iw_lname LIKE "%'.$name_include.'%" OR ci_iw_fname LIKE "%'.$name_include.'%")';
				}//ci_iw_lname
				if($fname_include != 'x')//fname_include means father name
				{
					$wh[] ='ci_iw_fathername LIKE "%'.$fname_include.'%"';
				}
				if($user_cnic != 'x')
				{
					$wh[] ='ci_iw_cnic LIKE "%'.$user_cnic.'%"';
				}
				if($user_email != 'x')
				{
					$wh[] ='email LIKE "%'.$user_email.'%"';
				}
				if($user_phone != 'x')
				{
					$wh[] ='mobile_no LIKE "%'.$user_phone.'%"';
				}
				if($user_bank != 'x')
				{
					$wh[] ='ci_iw_accountnumber LIKE "%'.$user_bank.'%"';
				}
				if($district_id != 'x')
				{
					$wh[] ='ci_iw_district='.$district_id;
				}
				if($tehsil_id != 'x')
				{
					$wh[] ='ci_iw_tehsil ='.$tehsil_id;
				}
				if($user_qualification != 'x')
				{
					$wh[] ='ci_iw_qualification LIKE "%'.$user_qualification.'%"';
				}
				if($user_exp != 'x')
				{
					$wh[] ='ci_iw_experienceschool LIKE "%'.$user_exp.'%"';
				}
				
				$SQL ='SELECT * FROM ci_admin LEFT JOIN ci_itemwriter ON admin_id = ci_iw_adminid LEFT JOIN ci_districts ON ci_iw_district = district_id LEFT JOIN ci_tehsil ON ci_iw_tehsil = tehsil_id';
				
				if(count($wh)>0)
				{
					$WHERE = implode(' and ', $wh);
					return $this->datatable->LoadJson($SQL,$WHERE);
					//echo $this->db->last_query();
					//die('if_iw');
				}
				else
				{
					return $this->datatable->LoadJson($SQL);
					//echo $this->db->last_query();
					//die('else_iw');
				}
			}
			elseif($user_type == 6)//item reviewer
			{
				$wh[] ='admin_role_id=6';
				if($department != 'x')
				{
					$wh[] ='ci_ir_deptttype="'.$department.'"';
				}
				if($name_include != 'x')
				{
					$wh[] ='(ci_ir_fname LIKE "%'.$name_include.'%" OR ci_ir_lname LIKE "%'.$name_include.'%")';
				}//ci_iw_lname
				if($fname_include != 'x')// fname_include means father name
				{
					$wh[] ='ci_ir_fathername LIKE "%'.$fname_include.'%"';
				}
				if($user_cnic != 'x')
				{
					$wh[] ='ci_ir_cnic LIKE "%'.$user_cnic.'%"';
				}
				if($user_email != 'x')
				{
					$wh[] ='email LIKE "%'.$user_email.'%"';
				}
				if($user_phone != 'x')
				{
					$wh[] ='mobile_no LIKE "%'.$user_phone.'%"';
				}
				if($user_bank != 'x')
				{
					$wh[] ='ci_ir_accountnumber LIKE "%'.$user_bank.'%"';
				}
				if($district_id != 'x')
				{
					$wh[] ='ci_ir_district ='.$district_id;
				}
				if($tehsil_id != 'x')
				{
					$wh[] ='ci_ir_tehsil='.$tehsil_id;
				}
				if($user_qualification != 'x')
				{
					$wh[] ='ci_ir_qualification LIKE "%'.$user_qualification.'%"';
				}
				if($user_exp != 'x')
				{
					$wh[] ='ci_ir_experienceschool LIKE "%'.$user_exp.'%"';
				}
				
				$SQL ='SELECT * FROM ci_admin LEFT JOIN ci_itemreviewers ON admin_id = ci_ir_adminid LEFT JOIN ci_districts ON ci_ir_district = district_id LEFT JOIN ci_tehsil ON ci_ir_tehsil = tehsil_id';
				
				if(count($wh)>0)
				{
					$WHERE = implode(' and ',$wh);
					return $this->datatable->LoadJson($SQL,$WHERE);
					//echo $this->db->last_query();
					//die('if_ir');
				}
				else
				{
					return $this->datatable->LoadJson($SQL);
					//echo $this->db->last_query();
					//die('else_ir');
				}
			}
			//die($this->db->last_query());
        }
		
		public function item_reviewer_info_byid($id)
		{	
			$this->db->select('*')
					 ->from('ci_admin')		
					 ->join('ci_itemreviewers', 'admin_id = ci_ir_adminid', 'left')	
					 ->join('ci_districts', 'district_id = ci_ir_district', 'left')
					 ->join('ci_tehsil', 'tehsil_id = ci_ir_tehsil', 'left')		 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
		
		public function item_writer_info_byid($id)
		{	
			$this->db->select('*')
					 ->from('ci_admin')		
					 ->join('ci_itemwriter', 'admin_id = ci_iw_adminid', 'left')
					 ->join('ci_districts', 'district_id = ci_iw_district', 'left')
					 ->join('ci_tehsil', 'tehsil_id = ci_iw_tehsil', 'left')			 
					 ->where('admin_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
			//die($this->db->last_query());
		}
	
		public function all_items_by_subject($id)
		{
			$this->db->select('COUNT(*) as items')
					 ->from('ci_items_pilot')
					 ->where('item_subject_id', $id)
					 ->order_by("item_code", "asc");
			$query = $this->db->get();
			return $result = $query->result();	
		}
		
		public function items_for_comparison($id)
		{
			$this->db->select('item_id')
					 ->from('ci_items_pilot')
					 ->where('item_subject_id', $id)
					 ->order_by("item_code", "asc");
					 //->limit(0, 100);
			$query = $this->db->get();
			return $result = $query->result_array();	
		}
		//get_grade_by_id
		public function get_gs_by_id($id)
		{
			$this->db->select('item_grade_id, subject_name_en')
					 ->from('ci_items_pilot')
					 ->join('ci_subjects', 'item_subject_id = subject_id', 'left')
					 ->where('item_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();	
		}
		public function get_item_plagiarism($item_id)
		{
			$this->db->select('item_id, item_stem_en, item_option_a_en, item_option_b_en, item_option_c_en, item_option_d_en')
					 ->from('ci_items_pilot')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
		}
		
		public function get_all_item_plagiarism($item_id, $item_subject_id)
		{
			$this->db->select('item_stem_en, item_option_a_en, item_option_b_en, item_option_c_en, item_option_d_en')
					 ->from('ci_items_pilot')
					 ->where('item_id', $item_id);
			$query = $this->db->get();
			return $result = $query->result();
		}
		
	/*	
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)
		function change_status()
		{		
			$this->db->set('grade_status', $this->input->post('status'));
			$this->db->where('grade_id', $this->input->post('grade_id'));
			$this->db->update('ci_grades');
		} 
		
		public function get_grades_by_id($id){
			$query = $this->db->get_where('ci_grades', array('grade_id' => $id));
			return $result = $query->row_array();
		}
		
		public function edit_grades($data, $id){
			$this->db->where('grade_id', $id);
			$this->db->update('ci_grades', $data);
			return true;
		}
		
		public function get_grades_for_export(){			
			$this->db->select('*')
					 ->from('ci_grades')
					 ->join('ci_admin', 'admin_id= grade_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_grades_csv_export(){			
			$this->db->select('grade_id, grade_code, grade_name_en, grade_name_ur, grade_created, username, IF(grade_status=1,\'Active\',\'Inactive\')')
					 ->from('ci_grades')
					 ->join('ci_admin', 'admin_id= grade_createdby');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		*/
	}
?>