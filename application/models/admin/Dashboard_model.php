<?php
	class Dashboard_model extends CI_Model{
		public function funAutoControlFileMCQ($p_subject,$p_version,$p_phase)
		{           
           
                
			$this->db->select('p_m_v'.$p_version.'_mcq_ids as ids')
					 ->from('ci_pilot_papers_mcqs')
					 ->where('p_subject_id', $p_subject)
					 ->where('p_phase', $p_phase);	 
			$query = $this->db->get();
			$result = $query->result();
		 	$ids = $result[0]->ids;
           // echo $ids.'<br>';
            $para_iitem_ids = $this->paper_para_item_ids($p_subject,$p_version,$p_phase);
            if($para_iitem_ids !=''){
              $ids .= ','.$para_iitem_ids; 
                
            }
           // echo 'All $ids'.$ids.'<br>';
			if(empty($ids)||$ids=='(NULL)'||$ids=='')
            {
                $this->session->set_flashdata('error', 'Control File Issue!');
                redirect(base_url('admin/dashboard'));
            }
            $this->db->select('*')
                     ->from('ci_items_pilot')
                     ->join('ci_subjects', 'subject_id = item_subject_id')
                     ->where('item_subject_id', $p_subject)
                     ->where('item_id IN ('.$ids.')');					 
             $query = $this->db->get();
             // echo $this->db->last_query();
             return $result = $query->result();
		}
		public function paper_para_item_ids($p_subject,$p_version,$p_phase)
		{
			$this->db->select('p_m_v'.$p_version.'_para_ids as ids')
					 ->from('ci_pilot_papers_mcqs')
					 ->where('p_subject_id', $p_subject)
					 ->where('p_phase', $p_phase);	 
			$query = $this->db->get();
			$result = $query->result();
			$ids = $result[0]->ids;
            
            $item_ids = '';
			if($ids != "")
			{			
				$this->db->select('*')
					 ->from('ci_items_paragraphs_pilot')
					 ->where('para_subject_id', $p_subject)
					 ->where('para_id IN ('.$ids.')');
					 
				$query = $this->db->get();
                //echo $this->db->last_query();
                $para_items_ids_array = array();
				$result = $query->result();	
                foreach($result as $row){
                    //echo '$row->para_item_26'.$row->para_item_26.'<br>';
                    ($row->para_item_21 != "0" && $row->para_item_21 != "" ? $para_items_ids_array[] = $row->para_item_21 : '');
                    ($row->para_item_22 != '0' && $row->para_item_22 != '' ? $para_items_ids_array[] = $row->para_item_22 : '');
                    ($row->para_item_23 != '0' && $row->para_item_23 != '' ? $para_items_ids_array[] = $row->para_item_23 : '');
                    ($row->para_item_24 != '0' && $row->para_item_24 != '' ? $para_items_ids_array[] = $row->para_item_24 : '');
                    ($row->para_item_25 != '0' && $row->para_item_25 != '' ? $para_items_ids_array[] = $row->para_item_25 : '');
                    ($row->para_item_26 != '0' && $row->para_item_26 != '' ? $para_items_ids_array[] = $row->para_item_26 : '');
                    ($row->para_item_27 != '0' && $row->para_item_27 != '' ? $para_items_ids_array[] = $row->para_item_27 : '');
                    ($row->para_item_28 != '0' && $row->para_item_28 != '' ? $para_items_ids_array[] = $row->para_item_28 : '');
                    ($row->para_item_29 != '0' && $row->para_item_29 != ''? $para_items_ids_array[] = $row->para_item_29 : '');
                    ($row->para_item_30 != '0' && $row->para_item_30 != '' ? $para_items_ids_array[] = $row->para_item_30 : '');
                      
                    
                }
               $item_ids = implode(",",$para_items_ids_array);
                
			}
            return  $item_ids;
        }
		public function count_in_groups($item_id,$group_subject_id = 0)
		{

			if($group_subject_id!=0)

			{

				$sql="SELECT COUNT(group_id) AS founded FROM `ci_items_group` WHERE group_subject_id = ".$group_subject_id." AND (group_item_1 = '".$item_id."' OR group_item_2 = '".$item_id."' OR group_item_3 = '".$item_id."' OR group_item_4 = '".$item_id."' OR group_item_5 = '".$item_id."' OR group_item_6 = '".$item_id."' OR group_item_7 = '".$item_id."' OR group_item_8 = '".$item_id."' OR group_item_9 = '".$item_id."' OR group_item_10 = '".$item_id."') ";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;

			}

			else

			{

			$sql="SELECT COUNT(group_id) AS founded FROM `ci_items_group` WHERE group_item_1 = '".$item_id."' OR group_item_2 = '".$item_id."' OR group_item_3 = '".$item_id."' OR group_item_4 = '".$item_id."' OR group_item_5 = '".$item_id."' OR group_item_6 = '".$item_id."' OR group_item_7 = '".$item_id."' OR group_item_8 = '".$item_id."' OR group_item_9 = '".$item_id."' OR group_item_10 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;	

			}
		}
		
		public function get_group_para_items_types($id, $type='group')
		{
			
			$sql="SELECT COUNT(group_id) AS founded FROM `ci_items_group` WHERE group_item_1 = '".$item_id."' OR group_item_2 = '".$item_id."' OR group_item_3 = '".$item_id."' OR group_item_4 = '".$item_id."' OR group_item_5 = '".$item_id."' OR group_item_6 = '".$item_id."' OR group_item_7 = '".$item_id."' OR group_item_8 = '".$item_id."' OR group_item_9 = '".$item_id."' OR group_item_10 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;	
		}

		public function count_in_groups_new($item_id,$group_subject_id = 0)
		{

			if($group_subject_id!=0)

			{

				$sql="SELECT group_id AS founded FROM `ci_items_group` WHERE group_subject_id = ".$group_subject_id." AND (group_item_1 = '".$item_id."' OR group_item_2 = '".$item_id."' OR group_item_3 = '".$item_id."' OR group_item_4 = '".$item_id."' OR group_item_5 = '".$item_id."' OR group_item_6 = '".$item_id."' OR group_item_7 = '".$item_id."' OR group_item_8 = '".$item_id."' OR group_item_9 = '".$item_id."' OR group_item_10 = '".$item_id."') ";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;

			}

			else

			{

			$sql="SELECT COUNT(group_id) AS founded FROM `ci_items_group` WHERE group_item_1 = '".$item_id."' OR group_item_2 = '".$item_id."' OR group_item_3 = '".$item_id."' OR group_item_4 = '".$item_id."' OR group_item_5 = '".$item_id."' OR group_item_6 = '".$item_id."' OR group_item_7 = '".$item_id."' OR group_item_8 = '".$item_id."' OR group_item_9 = '".$item_id."' OR group_item_10 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;	

			}
		}

		public function count_in_paragraphs_new($item_id,$para_subject_id=0)
		{

			

			if($para_subject_id!=0)

			{

				$sql="SELECT para_id AS founded FROM `ci_items_paragraphs` WHERE para_subject_id = ".$para_subject_id." AND  (para_item_21 = '".$item_id."' OR para_item_22 = '".$item_id."' OR para_item_23 = '".$item_id."' OR para_item_24 = '".$item_id."' OR para_item_25 = '".$item_id."' OR para_item_26 = '".$item_id."' OR para_item_27 = '".$item_id."' OR para_item_28 = '".$item_id."' OR para_item_29 = '".$item_id."' OR para_item_30 = '".$item_id."')";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;

			}

			else

			{

				$sql="SELECT COUNT(para_id) AS founded FROM `ci_items_paragraphs` WHERE para_item_21 = '".$item_id."' OR para_item_22 = '".$item_id."' OR para_item_23 = '".$item_id."' OR para_item_24 = '".$item_id."' OR para_item_25 = '".$item_id."' OR para_item_26 = '".$item_id."' OR para_item_27 = '".$item_id."' OR para_item_28 = '".$item_id."' OR para_item_29 = '".$item_id."' OR para_item_30 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;

			}
					
		}		
		
		public function count_in_paragraphs($item_id,$para_subject_id=0)
		{

			

			if($para_subject_id!=0)

			{

				$sql="SELECT COUNT(para_id) AS founded FROM `ci_items_paragraphs` WHERE para_subject_id = ".$para_subject_id." AND  (para_item_21 = '".$item_id."' OR para_item_22 = '".$item_id."' OR para_item_23 = '".$item_id."' OR para_item_24 = '".$item_id."' OR para_item_25 = '".$item_id."' OR para_item_26 = '".$item_id."' OR para_item_27 = '".$item_id."' OR para_item_28 = '".$item_id."' OR para_item_29 = '".$item_id."' OR para_item_30 = '".$item_id."')";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;

			}

			else

			{

				$sql="SELECT COUNT(para_id) AS founded FROM `ci_items_paragraphs` WHERE para_item_21 = '".$item_id."' OR para_item_22 = '".$item_id."' OR para_item_23 = '".$item_id."' OR para_item_24 = '".$item_id."' OR para_item_25 = '".$item_id."' OR para_item_26 = '".$item_id."' OR para_item_27 = '".$item_id."' OR para_item_28 = '".$item_id."' OR para_item_29 = '".$item_id."' OR para_item_30 = '".$item_id."'";    
		    $query = $this->db->query($sql);
		    $result = $query->result();
			return $result[0]->founded;

			}
					
		}
		public function get_all_users_review_data()
		{
			$data = [];
		
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (7,11,15,24,30,36,46,54) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['science'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (34,42,50) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['computer'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (5,9,13,19,26,32,40,48) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['urdu'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (4,8,12,18,25,31,39,47) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['english'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (6,10,14,20,27,33,41,49) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['math'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (56,58,16,21,28,35,43,51) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['islamiat'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (23,29,38,44,52) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['sst'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (57,59,17,22,55,37,45,53,60,61,62,63,64) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['ethics-re'] =  $query->result_array();
			
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (65,66,67) ORDER BY grade_id, subject_id ASC";
			$query = $this->db->query($sql);
			$data['tqm'] =  $query->result_array();
			return $data;
		}
		
		public function get_all_users_write_data()
		{
			$data = [];
		
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (7,11,15,24,30,36,46,54) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['science'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (34,42,50) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['computer'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (5,9,13,19,26,32,40,48) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['urdu'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (4,8,12,18,25,31,39,47) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['english'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (6,10,14,20,27,33,41,49) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['math'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (56,58,16,21,28,35,43,51) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['islamiat'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (23,29,38,44,52) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['sst'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (57,59,17,22,55,37,45,53,60,61,62,63,64) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['ethics-re'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (65,66,67) GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['tqm'] =  $query->result_array();
			return $data;
		}
		
        public function get_all_users_write_data_batch2()
		{
			$data = [];
		
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (7,11,15,24,30,36,46,54) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['science'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (34,42,50) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['computer'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (5,9,13,19,26,32,40,48) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['urdu'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (4,8,12,18,25,31,39,47) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['english'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (6,10,14,20,27,33,41,49) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['math'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (56,58,16,21,28,35,43,51) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['islamiat'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (23,29,38,44,52) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['sst'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (57,59,17,22,55,37,45,53,60,61,62,63,64) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['ethics-re'] =  $query->result_array();
			
			$sql="SELECT (subject_gradeid-2) AS grades, subject_name_en AS subjecs,count(*) as totalitems, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id LEFT JOIN `ci_grades` ON grade_id = subject_gradeid  WHERE subject_id IN (65,66,67) AND item_batch = 2 GROUP BY item_subject_id ORDER BY grade_id, subject_id ASC";
			
			$query = $this->db->query($sql);
			$data['tqm'] =  $query->result_array();
			return $data;
		}
		function setGroupsEdit($group_id)
		{
			$this->db->where('group_id', $group_id);
			$this->db->update('ci_items_group_rev', array('group_rev_status' => 1, 'group_rev_ss_status'=>0, 'group_rev_ae_status'=>0));
			//echo ($this->db->last_query());			
			return true;
		}
        function getGroups ($itemid)
		{
			$sql="SELECT * FROM `ci_items_group_rev`  WHERE group_item_1 = $itemid OR group_item_2 = $itemid OR group_item_3= $itemid OR group_item_4 = $itemid OR group_item_5 = $itemid";
			//die($sql);
			$query = $this->db->query($sql);
			$data['res'] =  $query->result_array();
			return $data;	
		
		}
		function get_ss_review_data($subject_ids=0)
		{
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (".$subject_ids.") ORDER BY grade_id, subject_id ASC";
			//die($sql);
			$query = $this->db->query($sql);
			$data['stats'] =  $query->result_array();

			$sql="SELECT username, (select count(*) from ci_items_rev WHERE item_rev_revid = admin_id and item_rev_status = 1) as inprocess,(select count(*) from ci_items_rev WHERE item_rev_revid = admin_id and item_rev_status = 3) as rejected, (select count(*) from ci_items_rev WHERE item_rev_revid = admin_id and item_rev_status = 2) as accepted FROM ci_admin WHERE admin_role_id = 6 AND parent_admin_id = ".$this->session->userdata('admin_id');
			//die($sql);
			$query = $this->db->query($sql);
			$data['details'] =  $query->result_array();

			return $data;
			
		}
		function get_ss_review_datag($subject_ids=0)
		{
			$sql="SELECT * FROM `ci_items_rev` LEFT JOIN ci_admin ON admin_id = item_rev_revid  WHERE item_rev_status = 3 AND item_subject_id IN (".$subject_ids.")  ORDER BY item_grade_id, item_subject_id ASC";
			//die($sql);
			$query = $this->db->query($sql);
			$data['stats'] =  $query->result_array();
			return ($data);
			//die();
			
		}
		function get_ae_review_data($subject_ids=0)
		{
			$sql="SELECT (grade_id-2) AS grades, CONCAT(subject_name_en,'') AS subjecs, (SELECT SUM(IF(item_status=4 AND item_status_ae=1, 1, 0)) AS Accepted FROM `ci_items`  WHERE item_subject_id =  subject_id) AS Cycle1_Accepted, (SELECT SUM(IF(item_rev_status=1, 1, 0)) AS Processing FROM `ci_items_rev` WHERE item_subject_id =  subject_id) AS IR_Processing, (SELECT SUM(IF(item_rev_status IN (2,4), 1, 0)) AS Processing FROM `ci_items_rev` WHERE  item_subject_id =  subject_id) AS IR_Accepted, (SELECT SUM(IF(item_rev_ss_status IN (2,4), 1, 0)) AS SS_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS SS_Accepted, (SELECT SUM(IF(item_rev_ae_status IN (2,4), 1, 0)) AS AE_Accepted FROM `ci_items_rev` WHERE item_subject_id = subject_id) AS AE_Accepted FROM `ci_subjects` LEFT JOIN `ci_grades` ON grade_id = subject_gradeid WHERE subject_id IN (".$subject_ids.") ORDER BY grade_id, subject_id ASC";
			//die($sql);
			$query = $this->db->query($sql);
			$data['stats'] =  $query->result_array();
			return $data;
			
		}
		public function get_all_items()
		{
			$sql="SELECT * FROM `ci_items` order by item_submittedby asc, item_grade_id asc, item_subject_id asc, item_cstand_id asc, item_subcstand_id asc, item_slo_id asc";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_all_items_ids()
		{
			$sql="SELECT item_id FROM `ci_items` order by item_submittedby asc, item_grade_id asc, item_subject_id asc, item_cstand_id asc, item_subcstand_id asc, item_slo_id asc";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_all_users()
		{
			return $this->db->count_all('ci_admin');
		}
		//--------------------------------------------------------------
		public function get_admin_users()
		{
			$this->db->where('admin_role_id', 1);
			return $this->db->count_all_results('ci_admin');
		}
		
		public function get_all_users_counters()
		{
			$sql="SELECT SUM(IF(admin_role_id=1, 1, 0)) AS Admin_Users, SUM(IF(admin_role_id=2, 1, 0)) AS SS_Users, SUM(IF(admin_role_id=3, 1, 0)) AS IW_Users, SUM(IF(admin_role_id=4, 1, 0)) AS AE_Users, SUM(IF(admin_role_id=5, 1, 0)) AS PS_Users, SUM(IF(admin_role_id=6, 1, 0)) AS IR_Users FROM `ci_admin`";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_ss_items_reviewed_daily($dt='')
		{
			$sql="SELECT item_approvedby, item_approved, username, COUNT(*) AS total FROM `ci_items` LEFT JOIN `ci_admin` ON admin_id = item_approvedby  WHERE item_approved LIKE '".$dt."%'  AND item_approvedby != 0 AND admin_role_id = 2 GROUP BY item_approvedby ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_ae_items_reviewed_daily($dt='')
		{
			$sql="SELECT item_reviewedby, item_reviewed, username, COUNT(*) AS total FROM `ci_items` LEFT JOIN `ci_admin` ON admin_id = item_reviewedby  WHERE item_reviewed LIKE '".$dt."%'  AND item_reviewedby != 0 AND admin_role_id = 4 GROUP BY item_reviewedby ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_stats_items($subject_name='',$item_batch=1)
		{
			
			if($subject_name == 'General')
			{
				$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id  WHERE item_batch = ".$item_batch." AND (subject_name_en LIKE 'General%' OR subject_name_en LIKE 'Science%') GROUP BY item_subject_id  ORDER BY subject_gradeid ASC,  SS_Pending DESC";    
			}
			else
			{
				$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending, SUM(IF(item_status_ae=1 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Accepted, SUM(IF(item_status = 3 AND item_status_ae=2, 1, 0)) AS AE_Rejected FROM ci_items  LEFT JOIN ci_subjects ON subject_id = item_subject_id  WHERE subject_name_en LIKE '".$subject_name."%' AND item_batch = ".$item_batch." GROUP BY item_subject_id  ORDER BY subject_gradeid ASC,  SS_Pending DESC";    	
			}
			$query = $this->db->query($sql);
			return $query->result_array();
		}	
		
		public function get_items_stats()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, SUM(IF(item_status=1, 1, 0)) AS Draft_Items,SUM(IF(item_status=2, 1, 0)) AS Submitted_Items, SUM(IF(item_status=3, 1, 0)) AS Rejected_Items, SUM(IF(item_status=4, 1, 0)) AS Accepted_Items FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id  GROUP BY item_subject_id ORDER BY subject_gradeid ASC,  Draft_Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_iss()
		{
			$sql='SELECT CONCAT(firstname," ",lastname,"(",username,")") AS itemwriter, COUNT(item_id) AS Total_Items, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending FROM `ci_items` LEFT JOIN `ci_subjects` ON subject_id = item_subject_id LEFT JOIN `ci_admin` ON admin_id = item_submittedby WHERE parent_admin_id = '.$this->session->userdata('admin_id').' GROUP BY item_submittedby ORDER BY Total_Items DESC';    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function get_items_stats_iadmin($batch=1)
		{
			$sql='SELECT CONCAT(firstname," ",lastname,"(",username,")") AS itemwriter, COUNT(item_id) AS Total_Items, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_type="MCQ" AND item_status!=1, 1, 0)) AS mcq, SUM(IF(item_type="ERQ" AND item_status!=1, 1, 0)) AS crq, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending FROM `ci_items` LEFT JOIN `ci_subjects` ON subject_id = item_subject_id LEFT JOIN `ci_admin` ON admin_id = item_submittedby WHERE parent_admin_id <> 0 AND item_batch='.$batch.' GROUP BY item_submittedby ORDER BY Total_Items DESC';    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function get_items_stats_iadmin_admin($batch=1)
		{
			$sql='SELECT subject_name_en, CONCAT(firstname," ",lastname,"(",username,")") AS itemwriter, COUNT(item_id) AS Total_Items, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_type="MCQ" AND item_status!=1, 1, 0)) AS mcq, SUM(IF(item_type="ERQ" AND item_status!=1, 1, 0)) AS crq, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending 
FROM `ci_items` LEFT JOIN `ci_subjects` ON subject_id = item_subject_id 
LEFT JOIN `ci_admin` ON admin_id = item_submittedby WHERE parent_admin_id <> 0 
GROUP BY item_submittedby ORDER BY subject_name_en ASC;';    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
        
        public function get_items_stats_iwbatchwise($batch=1)
		{
			$sql='SELECT CONCAT(firstname," ",lastname,"(",username,")") AS itemwriter, COUNT(item_id) AS Total_Items, SUM(IF(item_status=1, 1, 0)) AS Draft_Items, SUM(IF(item_status!=1, 1, 0)) AS Submitted_Items, SUM(IF(item_type="MCQ" AND item_status!=1, 1, 0)) AS mcq, SUM(IF(item_type="ERQ" AND item_status!=1, 1, 0)) AS crq, SUM(IF(item_status_ss=0 AND item_status=2, 1, 0)) AS SS_Pending, SUM(IF(item_status_ss=1, 1, 0)) AS SS_Rejected, SUM(IF(item_status_ss=2 OR item_status_ss=3, 1, 0)) AS SS_Accepted, SUM(IF(item_status_ae=0 AND (item_status_ss=2 OR item_status_ss=3), 1, 0)) AS AE_Pending FROM `ci_items` LEFT JOIN `ci_subjects` ON subject_id = item_subject_id LEFT JOIN `ci_admin` ON admin_id = item_submittedby WHERE parent_admin_id = '.$this->session->userdata('admin_id').' AND item_batch='.$batch.' GROUP BY item_submittedby ORDER BY Total_Items DESC';    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function get_items_stats_english()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'English' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_math()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Math' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_urdu()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Urdu' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_science()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Science' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_computer()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Computer%' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_gk()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE '%Knowledge' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_aklaqiat()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE '%Ethics' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_islamiat()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Islamiat' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_items_stats_ss()
		{
			$sql="SELECT (subject_gradeid-2) AS Grade, subject_name_en AS Subject_Name, COUNT(item_id) AS Items, item_subject_id AS sub_id FROM ci_items LEFT JOIN ci_subjects ON subject_id = item_subject_id WHERE subject_name_en LIKE 'Social%' GROUP BY item_subject_id ORDER BY subject_gradeid ASC, Items DESC";    
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		//--------------------------------------------------------------
		public function get_schools_generted_papers()
		{
			$sql="SELECT COUNT(paper_school_id) AS schoolspapers FROM ci_final_papers GROUP BY paper_school_id";    
			$query = $this->db->query($sql);
			return $query->result_array();			
		}
		public function get_all_users_stats()
		{
			$sql="SELECT COUNT(*) AS total, SUM(IF(admin_role_id=1,1,0)) AS adminctr,SUM(IF(admin_role_id=2,1,0)) AS ssctr,SUM(IF(admin_role_id=3,1,0)) AS iwctr,SUM(IF(admin_role_id=4,1,0)) AS aectr, SUM(IF(admin_role_id=5,1,0)) AS psmctr,SUM(IF(admin_role_id=6,1,0)) AS irctr,SUM(IF(admin_role_id=7,1,0)) AS dfpctr,SUM(IF(admin_role_id=8,1,0)) AS tfpctr FROM `ci_admin`";    
			$query = $this->db->query($sql);
			return $query->result_array();	
		}
		public function get_ae_users()
		{
			$this->db->where('admin_role_id', 2);
			return $this->db->count_all_results('ci_admin');
		}
		public function get_iw_users()
		{
			$this->db->where('admin_role_id', 3);
			return $this->db->count_all_results('ci_admin');
		}		
		public function get_all_grades(){
			return $this->db->count_all('ci_grades');
		}
		public function get_all_subjects(){
			return $this->db->count_all('ci_subjects');
		}
		public function get_all_cstands(){
			return $this->db->count_all('ci_content_stands');
		}
		public function get_all_subcstands(){
			return $this->db->count_all('ci_subcontent_stands');
		}
		public function get_all_schools_count(){
			return $this->db->count_all_results('ci_schools');
		}
		public function get_all_paper_count(){
			return $this->db->count_all_results('ci_final_papers');
		}
		public function get_paper_completed_count(){
			$this->db->where('paper_status', 1);
			return $this->db->count_all_results('ci_final_papers');
		}
		public function get_paper_incompleted_count(){
			$this->db->where('paper_status', 0);
			return $this->db->count_all_results('ci_final_papers');
		}
		public function update_item_code_new($code,$id){
			$this->db->set('item_code_new', $code);
			$this->db->where('item_id', $id);
			$this->db->update('ci_items');
			return true;
		}
		public function get_final_pilot_status($subjectList)
		{
			if($this->session->userdata('role_id')==1) 
			{
				$sql="SELECT (r.item_grade_id-2) AS Grade,subject_id,subject_name_en,(SELECT COUNT(*) AS ctr FROM ci_items o WHERE o.item_status = 4 AND o.item_status_ae = 1 AND o.item_subject_id = r.item_subject_id) AS Cycle1_Items, SUM(IF(r.item_rev_ae_status IN (2,4), 1, 0)) AS Pilot_AE_Accepted,SUM(IF(r.item_type='MCQ' AND r.item_rev_ae_status IN (2,4), 1, 0)) AS Pilot_AE_MCQs,SUM(IF(r.item_type='ERQ' AND r.item_rev_ae_status IN (2,4), 1, 0)) AS Pilot_AE_ERQs FROM `ci_items_rev` r LEFT JOIN `ci_subjects` ON r.item_subject_id = subject_id GROUP BY r.item_subject_id ORDER BY r.item_grade_id, r.item_subject_id ASC";    
				$query = $this->db->query($sql);
				return $query->result_array();
			}
			else if($this->session->userdata('role_id')==2 ||$this->session->userdata('role_id')==4)
			{
				$sql="SELECT (r.item_grade_id-2) AS Grade,subject_id,subject_name_en,(SELECT COUNT(*) AS ctr FROM ci_items o WHERE o.item_status = 4 AND o.item_status_ae = 1 AND o.item_subject_id = r.item_subject_id) AS Cycle1_Items, SUM(IF(r.item_rev_ae_status IN (2,4), 1, 0)) AS Pilot_AE_Accepted,SUM(IF(r.item_type='MCQ' AND r.item_rev_ae_status IN (2,4), 1, 0)) AS Pilot_AE_MCQs,SUM(IF(r.item_type='ERQ' AND r.item_rev_ae_status IN (2,4), 1, 0)) AS Pilot_AE_ERQs FROM `ci_items_rev` r LEFT JOIN `ci_subjects` ON r.item_subject_id = subject_id  WHERE r.item_subject_id IN (".$subjectList.") GROUP BY r.item_subject_id ORDER BY r.item_grade_id, r.item_subject_id ASC";    
				$query = $this->db->query($sql);
				return $query->result_array();
				
			}
			
		}
		public function get_school_for_dfp(){			
			$this->db->select('district_name_en,tehsil_name_en,count(school_id) as schools, sum(case when school_type = "Private" then 1 else 0 end) as privateschools, sum(case when school_type = "Public" then 1 else 0 end) as publicschools')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= school_district_id')
					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
					 ->where('school_district_id', $this->session->userdata('u_district_id'))
					 ->group_by('school_tehsil_id');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_school_for_tfp(){			
			$this->db->select('district_name_en,tehsil_name_en,count(school_id) as schools, sum(case when school_type = "Private" then 1 else 0 end) as privateschools, sum(case when school_type = "Public" then 1 else 0 end) as publicschools')
					 ->from('ci_schools')
					 ->join('ci_districts', 'district_id= school_district_id')
					 ->join('ci_tehsil', 'tehsil_id= school_tehsil_id')
					 ->where('school_tehsil_id', $this->session->userdata('u_tehsil_id'))
					 ->group_by('school_tehsil_id');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_stats_ditems()
		{
			$sql = "SELECT COUNT(item_id) AS founded FROM ci_items WHERE item_status =1 AND item_status_ss = 0 AND item_discard_status=0 AND item_submittedby = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$stats_ditems = $query->result();
			return $stats_ditems[0]->founded;
		}
		public function get_stats_dgroups()
		{
			$sql = "SELECT COUNT(group_id) AS founded FROM ci_items_group WHERE group_status =1 AND group_status_ss = 0 AND group_createdby = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$stats_dgroup = $query->result();
			return $stats_dgroup[0]->founded;
		}
		public function get_stats_dpara()
		{
			$sql = "SELECT COUNT(para_id) AS founded FROM ci_items_paragraphs WHERE para_status =1 AND para_status_ss = 0 AND para_createdby = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$stats_dpara = $query->result();
			return $stats_dpara[0]->founded;
		}
		public function get_stats_ritmes()
		{
			$sql = "SELECT COUNT(item_id) AS founded FROM ci_items WHERE item_status = 3 AND item_submittedby = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$stats_ritems = $query->result();
			return $stats_ritems[0]->founded;
		}
		/////////////////////////////////////////////
		/*public function get_stats_rev_items()
		{
			$sql = "SELECT COUNT(item_id) AS founded FROM ci_items_rev WHERE item_rev_status =1 AND item_rev_ss_status = 0 AND item_rev_revid = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$rev_stats_eitems = $query->result();
			return $rev_stats_eitems[0]->founded;
		}*/
		public function get_stats_rev_groups()
		{
			$sql = "SELECT COUNT(group_id) AS founded FROM ci_items_group_rev WHERE group_rev_status =1 AND group_status_ss = 0 AND group_rev_revid = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$rev_stats_egroup = $query->result();
			return $rev_stats_egroup[0]->founded;
		}
		public function get_stats_rev_para()
		{
			$sql = "SELECT COUNT(para_id) AS founded FROM ci_items_paragraphs_rev WHERE para_rev_status = 1 AND para_status_ss = 0 AND para_rev_revid = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$rev_stats_epara = $query->result();
			return $rev_stats_epara[0]->founded;
		}
		/*public function get_stats_rev_itmes()
		{
			$sql = "SELECT COUNT(item_id) AS founded FROM ci_items WHERE item_status = 3 AND item_submittedby = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$stats_ritems = $query->result();
			return $stats_ritems[0]->founded;
		}*/
		function getTotalSubmittedItems()
		{
			$sql = "SELECT COUNT(item_id) AS founded FROM ci_items WHERE item_status = 2 AND item_submittedby = ".$this->session->userdata('admin_id');
			$query = $this->db->query($sql);
			$stats_ritems = $query->result();
			return $stats_ritems[0]->founded;
		}
	}
?>
