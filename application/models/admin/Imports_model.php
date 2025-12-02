<?php
	class Imports_model extends CI_Model{
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
                                    item_1g_5p = $row[47] ,
                                    item_2g_1p = $row[48] ,
                                    item_2g_2p = $row[49] ,
                                    item_2g_3p = $row[50] ,
                                    item_2g_4p = $row[51] ,
                                    item_2g_5p = $row[52] ,
                                    item_3g_1p = $row[53] ,
                                    item_3g_2p = $row[54] ,
                                    item_3g_3p = $row[55] ,
                                    item_3g_4p = $row[56] ,
                                    item_3g_5p = $row[57] ,
                                    item_4g_1p = $row[58] ,
                                    item_4g_2p = $row[59] ,
                                    item_4g_3p = $row[60] ,
                                    item_4g_4p = $row[61] ,
                                    item_4g_5p = $row[62]
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
		
		public function save_crq_meta_info($data, $maxNumOptionsValue=0){
           
            $records = $data['records'];
            $pilot_phase = $data['pilot_phase'];
			
			$firstHeaderRow = $records[41];
			
			
			$index_0_rbis = $index_1_rbis = $index_2_rbis = $index_3_rbis = $index_4_rbis = $index_5_rbis = $index_6_rbis = $index_7_rbis = $index_8_rbis = $index_9_rbis = $index_10_rbis = $index_11_rbis = $index_12_rbis = '';
			
			$index_0g_1p = $index_1g_1p = $index_2g_1p = $index_3g_1p = $index_4g_1p = $index_5g_1p = $index_6g_1p = $index_7g_1p = $index_8g_1p = $index_9g_1p = $index_10g_1p = $index_11g_1p = $index_12g_1p = '';
			
			$index_0g_2p = $index_1g_2p = $index_2g_2p = $index_3g_2p = $index_4g_2p = $index_5g_2p = $index_6g_2p = $index_7g_2p = $index_8g_2p = $index_9g_2p = $index_10g_2p = $index_11g_2p = $index_12g_2p = '';
			
			$index_0g_3p = $index_1g_3p = $index_2g_3p = $index_3g_3p = $index_4g_3p = $index_5g_3p = $index_6g_3p = $index_7g_3p = $index_8g_3p = $index_9g_3p = $index_10g_3p = $index_11g_3p = $index_12g_3p = '';
			
			$index_0g_4p = $index_1g_4p = $index_2g_4p = $index_3g_4p = $index_4g_4p = $index_5g_4p = $index_6g_4p = $index_7g_4p = $index_8g_4p = $index_9g_4p = $index_10g_4p = $index_11g_4p = $index_12g_4p = '';
			
			foreach($firstHeaderRow as $ind =>$cols)
			{
				for($j = 0; $j < $maxNumOptionsValue; $j++)
				{
					if($cols == $j.' Rbis')
					{
						$ribs = 'index_'.$j.'_rbis';
						${$ribs} = $ind; // is 0th rbis index
						
					}
					
					if($cols == $j.' Grp1 P')
					{
						$g_1p = 'index_'.$j.'g_1p';
						${$g_1p} = $ind; // index_0g_1p
					}
					
					if($cols == $j.' Grp2 P')
					{
						$g_2p = 'index_'.$j.'g_2p';
						${$g_2p} = $ind; // index_0g_1p
					}
					
					if($cols == $j.' Grp3 P')
					{
						$g_3p = 'index_'.$j.'g_3p';
						${$g_3p} = $ind; // index_0g_1p
					}
					
					if($cols == $j.' Grp4 P')
					{
						$g_4p = 'index_'.$j.'g_4p';
						${$g_4p} = $ind; // index_0g_1p
					}
						
				}
			}
			
            $this->db->trans_start();
            $i = 0;
            foreach($records as $row){
				if($row[1] == '')
					break;
				
                if($i != 0){

					$update_sql = "UPDATE ci_items_pilot SET 
                                    item_sequence= $row[0] ,
									item_p_value = $row[7] ,
                                    item_mean = $row[7] ,
                                    item_pilot_phase = $pilot_phase ,
                                    item_rbis_value = $row[8] ,
                                    item_flag = '".trim($row[11])."' ,
									
                                    item_0_rbis = '".(($index_0_rbis!= '' && isset($row[$index_0_rbis]))? $row[$index_0_rbis] : '') ."' ,
									item_1_rbis = '".(($index_1_rbis!= '' && isset($row[$index_1_rbis]))? $row[$index_1_rbis] : '')."' ,
									item_2_rbis = '".(($index_2_rbis!= '' && isset($row[$index_2_rbis]))? $row[$index_2_rbis] : '')."' ,
									item_3_rbis = '".(($index_3_rbis!= '' && isset($row[$index_3_rbis]))? $row[$index_3_rbis] : '')."' ,
									item_4_rbis = '".(($index_4_rbis!= '' && isset($row[$index_4_rbis]))? $row[$index_4_rbis] : '')."' ,
									item_5_rbis = '".(($index_5_rbis!= '' && isset($row[$index_5_rbis]))? $row[$index_5_rbis] : '')."' ,
									item_6_rbis = '".(($index_6_rbis!= '' && isset($row[$index_6_rbis]))? $row[$index_6_rbis] : '')."' ,
									item_7_rbis = '".(($index_7_rbis!= '' && isset($row[$index_7_rbis]))? $row[$index_7_rbis] : '')."' ,
									item_8_rbis = '".(($index_8_rbis!= '' && isset($row[$index_8_rbis]))? $row[$index_8_rbis] : '')."' ,
									item_9_rbis = '".(($index_9_rbis!= '' && isset($row[$index_9_rbis]))? $row[$index_9_rbis] : '')."' ,
									item_10_rbis = '".(($index_10_rbis!= '' && isset($row[$index_10_rbis]))? $row[$index_10_rbis] : '')."' ,
									item_11_rbis = '".(($index_11_rbis!= '' && isset($row[$index_11_rbis]))? $row[$index_11_rbis] : '')."' ,
									item_12_rbis = '".(($index_12_rbis!= '' && isset($row[$index_12_rbis]))? $row[$index_12_rbis] : '')."' ,
									
									item_0g_1p = '".(($index_0g_1p!= '' && isset($row[$index_0g_1p]))? $row[$index_0g_1p] : '')."' ,
                                    item_0g_2p = '".(($index_0g_2p!= '' && isset($row[$index_0g_2p]))? $row[$index_0g_2p] : '')."' ,
                                    item_0g_3p = '".(($index_0g_3p!= '' && isset($row[$index_0g_3p]))? $row[$index_0g_3p] : '')."' ,
                                    item_0g_4p = '".(($index_0g_4p!= '' && isset($row[$index_0g_4p]))? $row[$index_0g_4p] : '')."' ,
									
                                    item_1g_1p = '".(($index_1g_1p!= '' && isset($row[$index_1g_1p]))? $row[$index_1g_1p] : '')."' ,
                                    item_1g_2p = '".(($index_1g_2p!= '' && isset($row[$index_1g_2p]))? $row[$index_1g_2p] : '')."' ,
                                    item_1g_3p = '".(($index_1g_3p!= '' && isset($row[$index_1g_3p]))? $row[$index_1g_3p] : '')."' ,
                                    item_1g_4p = '".(($index_1g_4p!= '' && isset($row[$index_1g_4p]))? $row[$index_1g_4p] : '')."' ,
									
									item_2g_1p = '".(($index_2g_1p!= '' && isset($row[$index_2g_1p]))? $row[$index_2g_1p] : '')."' ,
                                    item_2g_2p = '".(($index_2g_2p!= '' && isset($row[$index_2g_2p]))? $row[$index_2g_2p] : '')."' ,
                                    item_2g_3p = '".(($index_2g_3p!= '' && isset($row[$index_2g_3p]))? $row[$index_2g_3p] : '')."' ,
                                    item_2g_4p = '".(($index_2g_4p!= '' && isset($row[$index_2g_4p]))? $row[$index_2g_4p] : '')."' ,
									
									item_3g_1p = '".(($index_3g_1p!= '' && isset($row[$index_3g_1p]))? $row[$index_3g_1p] : '')."' ,
                                    item_3g_2p = '".(($index_3g_2p!= '' && isset($row[$index_3g_2p]))? $row[$index_3g_2p] : '')."' ,
                                    item_3g_3p = '".(($index_3g_3p!= '' && isset($row[$index_3g_3p]))? $row[$index_3g_3p] : '')."' ,
                                    item_3g_4p = '".(($index_3g_4p!= '' && isset($row[$index_3g_4p]))? $row[$index_3g_4p] : '')."' ,
									
									item_4g_1p = '".(($index_4g_1p!= '' && isset($row[$index_4g_1p]))? $row[$index_4g_1p] : '')."' ,
                                    item_4g_2p = '".(($index_4g_2p!= '' && isset($row[$index_4g_2p]))? $row[$index_4g_2p] : '')."' ,
                                    item_4g_3p = '".(($index_4g_3p!= '' && isset($row[$index_4g_3p]))? $row[$index_4g_3p] : '')."' ,
                                    item_4g_4p = '".(($index_4g_4p!= '' && isset($row[$index_4g_4p]))? $row[$index_4g_4p] : '')."' ,
									
									item_5g_1p = '".(($index_5g_1p!= '' && isset($row[$index_5g_1p]))? $row[$index_5g_1p] : '')."' ,
                                    item_5g_2p = '".(($index_5g_2p!= '' && isset($row[$index_5g_2p]))? $row[$index_5g_2p] : '')."' ,
                                    item_5g_3p = '".(($index_5g_3p!= '' && isset($row[$index_5g_3p]))? $row[$index_5g_3p] : '')."' ,
                                    item_5g_4p = '".(($index_5g_4p!= '' && isset($row[$index_5g_4p]))? $row[$index_5g_4p] : '')."' ,
									
									item_6g_1p = '".(($index_6g_1p!= '' && isset($row[$index_6g_1p]))? $row[$index_6g_1p] : '')."' ,
                                    item_6g_2p = '".(($index_6g_2p!= '' && isset($row[$index_6g_2p]))? $row[$index_6g_2p] : '')."' ,
                                    item_6g_3p = '".(($index_6g_3p!= '' && isset($row[$index_6g_3p]))? $row[$index_6g_3p] : '')."' ,
                                    item_6g_4p = '".(($index_6g_4p!= '' && isset($row[$index_6g_4p]))? $row[$index_6g_4p] : '')."' ,
									
									item_7g_1p = '".(($index_7g_1p!= '' && isset($row[$index_7g_1p]))? $row[$index_7g_1p] : '')."' ,
                                    item_7g_2p = '".(($index_7g_2p!= '' && isset($row[$index_7g_2p]))? $row[$index_7g_2p] : '')."' ,
                                    item_7g_3p = '".(($index_7g_3p!= '' && isset($row[$index_7g_3p]))? $row[$index_7g_3p] : '')."' ,
                                    item_7g_4p = '".(($index_7g_4p!= '' && isset($row[$index_7g_4p]))? $row[$index_7g_4p] : '')."' ,
									
									item_8g_1p = '".(($index_8g_1p!= '' && isset($row[$index_8g_1p]))? $row[$index_8g_1p] : '')."' ,
                                    item_8g_2p = '".(($index_8g_2p!= '' && isset($row[$index_8g_2p]))? $row[$index_8g_2p] : '')."' ,
                                    item_8g_3p = '".(($index_8g_3p!= '' && isset($row[$index_8g_3p]))? $row[$index_8g_3p] : '')."' ,
                                    item_8g_4p = '".(($index_8g_4p!= '' && isset($row[$index_8g_4p]))? $row[$index_8g_4p] : '')."' ,
									
									item_9g_1p = '".(($index_9g_1p!= '' && isset($row[$index_9g_1p]))? $row[$index_9g_1p] : '')."' ,
                                    item_9g_2p = '".(($index_9g_2p!= '' && isset($row[$index_9g_2p]))? $row[$index_9g_2p] : '')."' ,
                                    item_9g_3p = '".(($index_9g_3p!= '' && isset($row[$index_9g_3p]))? $row[$index_9g_3p] : '')."' ,
                                    item_9g_4p = '".(($index_9g_4p!= '' && isset($row[$index_9g_4p]))? $row[$index_9g_4p] : '')."' ,
									
									item_10g_1p = '".(($index_10g_1p!= '' && isset($row[$index_10g_1p]))? $row[$index_10g_1p] : '')."' ,
                                    item_10g_2p = '".(($index_10g_2p!= '' && isset($row[$index_10g_2p]))? $row[$index_10g_2p] : '')."' ,
                                    item_10g_3p = '".(($index_10g_3p!= '' && isset($row[$index_10g_3p]))? $row[$index_10g_3p] : '')."' ,
                                    item_10g_4p = '".(($index_10g_4p!= '' && isset($row[$index_10g_4p]))? $row[$index_10g_4p] : '')."' ,
									
									item_11g_1p = '".(($index_11g_1p!= '' && isset($row[$index_11g_1p]))? $row[$index_11g_1p] : '')."' ,
                                    item_11g_2p = '".(($index_11g_2p!= '' && isset($row[$index_11g_2p]))? $row[$index_11g_2p] : '')."' ,
                                    item_11g_3p = '".(($index_11g_3p!= '' && isset($row[$index_11g_3p]))? $row[$index_11g_3p] : '')."' ,
                                    item_11g_4p = '".(($index_11g_4p!= '' && isset($row[$index_11g_4p]))? $row[$index_11g_4p] : '')."' ,
									
									item_12g_1p = '".(($index_12g_1p!= '' && isset($row[$index_12g_1p]))? $row[$index_12g_1p] : '')."' ,
                                    item_12g_2p = '".(($index_12g_2p!= '' && isset($row[$index_12g_2p]))? $row[$index_12g_2p] : '')."' ,
                                    item_12g_3p = '".(($index_12g_3p!= '' && isset($row[$index_12g_3p]))? $row[$index_12g_3p] : '')."' ,
                                    item_12g_4p = '".(($index_12g_4p!= '' && isset($row[$index_12g_4p]))? $row[$index_12g_4p] : '')."' 
									
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