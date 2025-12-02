<?php
	class Datafile_model extends CI_Model{
		
		public function get_nos_mcqs_by_version($p_phase, $p_subject_id)
		{	
			$this->db->select('p_m_versions_distr')
					 ->from('ci_pilot_papers_mcqs')
					 ->where('p_phase', $p_phase)					 
					 ->where('p_subject_id', $p_subject_id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		public function get_sub_id($grade_id, $sub_code)
		{	
			$this->db->select('subject_id')
					 ->from('ci_subjects')
					 ->like('subject_code', $sub_code, 'both')
					 ->where('subject_gradeid', $grade_id);				 
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function add_grades($data){
			$this->db->insert('ci_imports', $data);
			return true;
		}
		
		public function insert_cstand($data){
			$this->db->insert('ci_content_stands', $data);
			return $this->db->insert_id();
		}
		
		public function insert_sub_cstand($data){
			$this->db->insert('ci_subcontent_stands', $data);
			return $this->db->insert_id();
		}
        /*********************************************************************
        *   Pilot paper meta information Import 
        *********************************************************************/
		/*public function save_import_paper($SQL){
            $query_array = explode('#',$SQL);
           // print_r($query_array);
           
            
            $this->db->trans_start();
                foreach($query_array as $query){
                   // echo $query;
                     $this->db->query($query);
                     $this->db->query($query);
                }
             //exit;
            $this->db->trans_complete();
            return $this->db->trans_status() ;
           // $query = $this->db->query($SQL);
           // return $result = $query->result();
            
        }*/
        public function save_meta_info($data){
           
            $records = $data['records'];
            $pilot_phase = $data['pilot_phase'];
            //print_r($records);
           // exit;
            
            $this->db->trans_start();
            $i = 0;
            foreach($records as $row){
				if($row[1] == '')
					break;
                if($i != 0){
					$update_sql = "UPDATE ci_items_pilot SET 
                                    item_sequence= $row[0] ,
                                    item_p_value = $row[7] ,
                                    item_pilot_phase = $pilot_phase ,
                                    item_rbis_value = $row[9] ,
                                    item_flag = '".trim($row[11])."' ,
                                    item_1_rbis = $row[29] ,
                                    item_2_rbis= $row[30] ,
                                    item_3_rbis = $row[31] ,
                                    item_4_rbis = $row[32] ,
                                    item_1g_1p = $row[43] ,
                                    item_1g_2p= $row[44] ,
                                    item_1g_3p = $row[45] ,
                                    item_1g_4p = $row[46] ,
                                    item_1g_5p = 0 ,
                                    item_2g_1p = $row[47] ,
                                    item_2g_2p = $row[48] ,
                                    item_2g_3p = $row[49] ,
                                    item_2g_4p = $row[50] ,
                                    item_2g_5p = 0 ,
                                    item_3g_1p = $row[51] ,
                                    item_3g_2p = $row[52] ,
                                    item_3g_3p = $row[53] ,
                                    item_3g_4p = $row[54] ,
                                    item_3g_5p = 0 ,
                                    item_4g_1p = $row[55] ,
                                    item_4g_2p = $row[56] ,
                                    item_4g_3p = $row[57] ,
                                    item_4g_4p = $row[58] ,
                                    item_4g_5p = 0
                                    WHERE item_id= '$row[1]'";				
                    //echo $update_sql."<br>";
                     $this->db->query($update_sql);
                }
                $i++;


            }
           
            $this->db->trans_complete();
            if($this->db->trans_status() == true){
                return true;
            }else{
                return false ;
            }
            
        }
        /****************************************************
        * End Pilot paper meta information import
        ******************************************************/
		
		public function save_marks_info($data){
           
            $records = $data['records'];
            //print_r($records);
           // exit;
            
            $this->db->trans_start();
            $i = 0;
            foreach($records as $row){
				if($row[1] == '')
					break;
                if($i != 0){
					$totalMarks = $row[1];
					if((int)$row[1] >= 10){
						$totalMarks = 9;
					}
					$update_sql = "UPDATE ci_items_pilot SET 
                                    item_total_marks = $row[1]
                                    WHERE item_id = '$row[0]'";				
                   // echo $update_sql."<br>";
                     $this->db->query($update_sql);
                }
                $i++;
            }
            $this->db->trans_complete();
            if($this->db->trans_status() == true){
                return true;
            }else{
                return false ;
            }
            
        }
		
		public function insert_slo($data){
			$this->db->insert('ci_slos', $data);
			return $this->db->insert_id();
		}
		
		public function get_all_grades()
		{	
			$this->db->select('*')
					 ->from('ci_grades')					 
					 ->where('grade_status', 1);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		public function get_subjects_by_grade($grade_id,$subjectList)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_id IN ('. $subjectList.')')
					 ->where('subject_gradeid', $grade_id);
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		public function get_admin_subjects_by_grade($grade_id)
		{
			$this->db->select('*')
					 ->from('ci_subjects')
					 ->join('ci_grades', 'grade_id = subject_gradeid')
					 ->where('subject_gradeid', $grade_id);
			$query = $this->db->get();			
			return $result = $query->result_array();			
		}
		public function get_content_csv_export($id)
		{			
			$this->db->select('subject_name_en, cs_number, cs_statement_en, cs_statement_ur, subcs_number, subcs_topic_en, subcs_topic_ur, subcs_phase, slo_number, slo_statement_en, slo_statement_ur')
					 ->from('ci_slos')
					 ->order_by('slo_cstand_id', 'asc')
					 ->join('ci_grades', 'grade_id = slo_grade_id')
					 ->join('ci_subjects', 'subject_id = slo_subject_id')
					 ->join('ci_content_stands', 'cs_id = slo_cstand_id')
					 ->join('ci_subcontent_stands', 'subcs_id = slo_subcstand_id')
					 ->where('slo_subject_id', $id);
			$query = $this->db->get();
			return $result = $query->result_array();
		}
	}
?>