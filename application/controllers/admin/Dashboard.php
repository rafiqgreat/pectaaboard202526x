<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends My_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/dashboard_model', 'dashboard_model');
		$this->load->model('admin/Items_model', 'Items_model');
	}
	public function update_passwordpef() {
    $ctr = 0;
        // Load the database library
        $this->load->database();
        
        // Custom select query
        $sql = "SELECT * FROM ci_schools WHERE school_department = 'PEF' LIMIT 7500, 600";        
        // Execute the query
        $query = $this->db->query($sql);
        
        // Check if the query was successful
        if ($query) {
            // Fetch the result as an array of objects
            $result = $query->result();
            
            // Do something with the result
            foreach ($result as $row) {
				$newpassword = password_hash( $row->pass, PASSWORD_BCRYPT );
				$query2 = "UPDATE ci_schools SET password = '".$newpassword."' WHERE username = '".$row->username."'";
                echo $query2 ." = ".$row->pass." - ". $ctr++. '<br>';
				$query3 = $this->db->query($query2);				
            }
        } else {
            // Handle query error
            echo 'Query failed!';
        }
    }
public function update_passwordp() {
    $ctr = 0;
        // Load the database library
        $this->load->database();
        
        // Custom select query
        $sql = "SELECT * FROM ci_schools WHERE school_department = 'PSSP'";        
        // Execute the query
        $query = $this->db->query($sql);
        
        // Check if the query was successful
        if ($query) {
            // Fetch the result as an array of objects
            $result = $query->result();
            
            // Do something with the result
            foreach ($result as $row) {
				$newpassword = password_hash( $row->pass, PASSWORD_BCRYPT );
				$query2 = "UPDATE ci_schools SET password = '".$newpassword."' WHERE username = '".$row->username."'";
                echo $query2 ." = ".$row->pass." - ". $ctr++. '<br>';
				$query3 = $this->db->query($query2);				
            }
        } else {
            // Handle query error
            echo 'Query failed!';
        }
    }
    public function update_password() {
        // Load the database library
        $this->load->database();
$ctr = 0;
$district_id = 30;
        
        // Custom select query
        $sql = "SELECT * FROM ci_schools WHERE school_department = 'SED' AND school_district_id = ".$district_id;        
        // Execute the query
        $query = $this->db->query($sql);
        
        // Check if the query was successful
        if ($query) {
            // Fetch the result as an array of objects
            $result = $query->result();
            
            // Do something with the result
            foreach ($result as $row) {
				$newpassword = password_hash( $row->pass, PASSWORD_BCRYPT );
				$query2 = "UPDATE ci_schools SET password = '".$newpassword."' WHERE username = '".$row->username."'";
                echo $query2 ." = ".$row->pass.'='. $ctr++.' - '.$district_id.'<br>';
				$query3 = $this->db->query($query2);				
            }
        } else {
            // Handle query error
            echo 'Query failed!';
        }
    }
	public function index()
	{
	//**************************************************************//////
		if($this->session->userdata('role_id')==111111)
		{
			$founded = $this->dashboard_model->count_in_paragraphs_new(13668,47);
			if($founded>0) 
			{					
					echo 'Yes found in Paragraph ID '.$founded;
			}		
			die();		
		}
		if($this->session->userdata('role_id')==111111)
		{
			
			echo '<pre>';
			$items = $this->dashboard_model->get_all_items_ids(); 			
			$total_items_in_groups1 = [];
			$total_items_in_groups2 = [];
			$total_items_in_groups3 = [];
			$total_items_in_groups4 = [];
			$total_items_in_groups5 = [];
			$total_items_in_groups6 = [];
			
			$total_items_in_paras1 = [];
			$total_items_in_paras2 = [];
			$total_items_in_paras3 = [];
			$total_items_in_paras4 = [];
			$total_items_in_paras5 = [];
			$total_items_in_paras6 = [];

			foreach($items as $item)
			{				
				//print_r($items);
				$founded = $this->dashboard_model->count_in_groups($item['item_id'],52);
				if($founded>0) {
					$total_items_in_groups1[] = $item['item_id'];
				}
				$founded = $this->dashboard_model->count_in_groups($item['item_id'],54);
				if($founded>0) {
					$total_items_in_groups2[] = $item['item_id'];
				}
				
				$founded = $this->dashboard_model->count_in_groups($item['item_id'],46);
				if($founded>0) {
					$total_items_in_groups3[] = $item['item_id'];
				}
				$founded = $this->dashboard_model->count_in_groups($item['item_id'],50);
				if($founded>0) {
					$total_items_in_groups4[] = $item['item_id'];
				}
				$founded = $this->dashboard_model->count_in_groups($item['item_id'],49);
				if($founded>0) {
					$total_items_in_groups5[] = $item['item_id'];
				}
				$founded = $this->dashboard_model->count_in_groups($item['item_id'],51);
				if($founded>0) {
					$total_items_in_groups6[] = $item['item_id'];
				}
				
				
				print_r($items);
			

				$foundedx = $this->dashboard_model->count_in_paragraphs($item['item_id'],12);
				if($foundedx>0) {
					$total_items_in_paras1[] = $item['item_id'];
				}
				$foundedx = $this->dashboard_model->count_in_paragraphs($item['item_id'],13);
				if($foundedx>0) {
					$total_items_in_paras2[] = $item['item_id'];
				}
				
				$foundedx = $this->dashboard_model->count_in_paragraphs($item['item_id'],18);
				if($foundedx>0) {
					$total_items_in_paras3[] = $item['item_id'];
				}
				$foundedx = $this->dashboard_model->count_in_paragraphs($item['item_id'],19);
				if($foundedx>0) {
					$total_items_in_paras4[] = $item['item_id'];
				}
				$foundedx = $this->dashboard_model->count_in_paragraphs($item['item_id'],25);
				if($foundedx>0) {
					$total_items_in_paras5[] = $item['item_id'];
				}
				
				$foundedx = $this->dashboard_model->count_in_paragraphs($item['item_id'],26);
				if($foundedx>0) {
					$total_items_in_paras6[] = $item['item_id'];
				}

				
				//die($item['item_id']. ' is ID found in '.$founded.' group(s)');
			}
				//echo '<pre>';
				
				echo 'Group Items= '.count($total_items_in_groups1).' = '.count($total_items_in_groups2).' = '.count($total_items_in_groups3).' = '.count($total_items_in_groups4).' = '.count($total_items_in_groups5).' = '.count($total_items_in_groups6);
				echo '<hr />';
				
				echo 'Paragraph Items= '.count($total_items_in_paras1).' = '.count($total_items_in_paras2).' = '.count($total_items_in_paras3).' = '.count($total_items_in_paras4).' = '.count($total_items_in_paras5).' = '.count($total_items_in_paras6);
				die();

		}
		
		if($this->session->userdata('role_id')==111111)
		{
			
			$items = $this->dashboard_model->get_all_items_ids(); 
			$sub_computer = [34,42,50];
			$sub_sci_gk = [7,11,15,24,30,36,46,54];
			$sub_social = [23,29,38,44,52];
			$sub_ethics = [37,45,53,60,61,62,63,64];		
			$sub_religious = [57,59,17,22,55];
			$sub_islamiat = [56,58,16,21,28,35,43,51];
			$sub_math = [6,10,14,20,27,33,41,49];
			$sub_urdu = [5,9,13,19,26,32,40,48];
			$sub_english = [4,8,12,18,25,31,39,47];		
			$ctr = 1;			
			foreach($items as $item)
			{
			
				if(in_array($item['item_subject_id'],$sub_computer))
				{
					
					if($item['item_grade_id']==8)
					{$grade='VI'; $subject='CSE';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='CSE';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='CSE';}	
					else 
					die('not in list subject');
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);				
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{
				if(in_array($item['item_subject_id'],$sub_sci_gk))
				{
					
					if($item['item_grade_id']==3)
					{$grade='I'; $subject='GKN';}
					elseif($item['item_grade_id']==4)
					{$grade='II'; $subject='GKN';}
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='GKN';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='SCI';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='SCI';}
					elseif($item['item_grade_id']==8)
					{$grade='VI'; $subject='SCI';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='SCI';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='SCI';}
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{	
				if(in_array($item['item_subject_id'],$sub_social))
				{
					
					if($item['item_grade_id']==4)
					{$grade='II'; $subject='SSY';}
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='SSY';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='SSY';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='SSY';}
					elseif($item['item_grade_id']==8)
					{$grade='VI'; $subject='SSY';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='SSY';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='SSY';}
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{	
				if(in_array($item['item_subject_id'],$sub_ethics))
				{
					
					if($item['item_grade_id']==3)
					{$grade='I'; $subject='AKL';}
					elseif($item['item_grade_id']==4)
					{$grade='II'; $subject='AKL';}				
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='AKL';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='AKL';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='AKL';}
					elseif($item['item_grade_id']==8)
					{$grade='VI'; $subject='AKL';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='AKL';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='AKL';}
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{	
				if(in_array($item['item_subject_id'],$sub_religious))
				{
					
					if($item['item_grade_id']==3)
					{$grade='I'; $subject='REN';}
					elseif($item['item_grade_id']==4)
					{$grade='II'; $subject='REN';}				
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='REN';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='REN';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='REN';}
					
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{	
				if(in_array($item['item_subject_id'],$sub_islamiat))
				{
					
					if($item['item_grade_id']==3)
					{$grade='I'; $subject='ISL';}
					elseif($item['item_grade_id']==4)
					{$grade='II'; $subject='ISL';}				
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='ISL';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='ISL';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='ISL';}
					elseif($item['item_grade_id']==8)
					{$grade='VI'; $subject='ISL';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='ISL';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='ISL';}
					
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{	
				if(in_array($item['item_subject_id'],$sub_math))
				{
					
					if($item['item_grade_id']==3)
					{$grade='I'; $subject='MTH';}
					elseif($item['item_grade_id']==4)
					{$grade='II'; $subject='MTH';}				
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='MTH';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='MTH';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='MTH';}
					elseif($item['item_grade_id']==8)
					{$grade='VI'; $subject='MTH';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='MTH';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='MTH';}
					
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{	
				if(in_array($item['item_subject_id'],$sub_urdu))
				{
					
					if($item['item_grade_id']==3)
					{$grade='I'; $subject='URD';}
					elseif($item['item_grade_id']==4)
					{$grade='II'; $subject='URD';}				
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='URD';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='URD';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='URD';}
					elseif($item['item_grade_id']==8)
					{$grade='VI'; $subject='URD';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='URD';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='URD';}
					
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
			}
			$ctr = 1;			
			foreach($items as $item)
			{	
				if(in_array($item['item_subject_id'],$sub_english))
				{
					
					if($item['item_grade_id']==3)
					{$grade='I'; $subject='ENG';}
					elseif($item['item_grade_id']==4)
					{$grade='II'; $subject='ENG';}				
					elseif($item['item_grade_id']==5)
					{$grade='III'; $subject='ENG';}
					elseif($item['item_grade_id']==6)
					{$grade='IV'; $subject='ENG';}
					elseif($item['item_grade_id']==7)
					{$grade='V'; $subject='ENG';}
					elseif($item['item_grade_id']==8)
					{$grade='VI'; $subject='ENG';}
					elseif($item['item_grade_id']==9)
					{$grade='VII'; $subject='ENG';}					
					elseif($item['item_grade_id']==10)
					{$grade='VIII'; $subject='ENG';}
					
					
					$new_code =  $subject.'-'.$grade.'-'.(($item['item_type']=='MCQ')?'M22':'E22').'-'.str_pad($item['item_submittedby'], 3, '0', STR_PAD_LEFT).'-'.str_pad($ctr, 4, '0', STR_PAD_LEFT);
					
					$this->dashboard_model->update_item_code_new($new_code,$item['item_id']);
					echo $ctr.'-'.$item['item_code'].' =>'.$new_code.'<br />';
					$ctr++;
				}
				
			}
			
			//	die('checkout');
				//	UPDATE `ci_items_rev` r SET r.item_code = (SELECT i.item_code_new FROM `ci_items` i WHERE i.item_id = r.item_id)
				// UPDATE ci_items SET item_code = item_code_new
		}
		
		if($this->session->userdata('role_id')==199999)
		{
			$sqlx="SELECT p_grade_id,p_subject_id, subject_code, p_m_versions, p_m_versions_distr FROM `ci_pilot_papers_mcqs` LEFT JOIN `ci_subjects` ON subject_id = p_subject_id  WHERE p_phase = 1 and p_subject_id = 12";
			$queryx = $this->db->query($sqlx);
			$resultx =  $queryx->result();
			foreach($resultx as $row)
			{
				for($x=1;$x<=($row->p_m_versions);$x++)
				{
					$paper_mcqs = $this->dashboard_model->funAutoControlFileMCQ($row->p_subject_id,$x,1);
					//echo '<pre>';
					//print_r($row);
					//die();
					$file_name = 'Control_Files_MCQs/'.$row->subject_code.'_G'.($row->p_grade_id-2).'_V'.$x.'_P1_ID'.$row->p_subject_id.'.txt';
					//$ofile_name = 'Control_Files_MCQs/o'.$row->subject_code.'_G'.($row->p_grade_id-2).'_V'.$x.'_P1_ID'.$row->p_subject_id.'_with_itemid.txt';
					
					$contents = "";
					$ocontents = "";
					$ctr = 1;
					$ctrx = '';
					foreach($paper_mcqs as $item)
					{
						$ctrx = str_pad($ctr, 2, '0', STR_PAD_LEFT);
						$ctr++;
						
						$contents.= "Item".$ctrx."\t".strtoupper($item->item_option_correct)."\t4\t".strtoupper($item->subject_code)." V".$x."\tY\tM".PHP_EOL;
						
						//$ocontents.= "Item".str_pad($item->item_id, 4, '0', STR_PAD_LEFT)."\t".strtoupper($item->item_option_correct)."\t4\t".strtoupper($item->subject_code)." V".$x." Y\tM".PHP_EOL;
						
						
					}
					
					$fp = fopen($file_name, 'w');
					fwrite($fp, $contents);
					fclose($fp);
					echo $file_name.'<br />';
					
/*
					$ofp = fopen($ofile_name, 'w');
					fwrite($ofp, $ocontents);
					fclose($ofp);
					echo $ofile_name.'<br />';
*/
					
					//die();
				}
			}			
			die('control files');
		}
		
		
	
		
		
	if($this->session->userdata('role_id')==1||$this->session->userdata('role_id')==5)	
	{		
		$data['all_schools'] = 0;//$this->dashboard_model->get_all_schools_count();
		$data['all_papers'] = 0;//$this->dashboard_model->get_all_paper_count();
		$data['papers_comp'] = 0;//$this->dashboard_model->get_paper_completed_count();
		$data['papers_incomp'] = 0;//$this->dashboard_model->get_paper_incompleted_count();
		$data['schoolspapers'] = [];//$this->dashboard_model->get_schools_generted_papers();
		$data['all_users_stats'] = $this->dashboard_model->get_all_users_stats();
		
		$data['all_grades'] = $this->dashboard_model->get_all_grades();
		$data['all_subjects'] = $this->dashboard_model->get_all_subjects();
		$data['all_cstands'] = $this->dashboard_model->get_all_cstands();
		$data['all_subcstands'] = $this->dashboard_model->get_all_subcstands();
			
		
	}
	elseif($this->session->userdata('role_id')==2)
	{
					
		$data['all_schools'] = 0;//$this->dashboard_model->get_all_schools_count();
		$data['all_papers'] = 0;//$this->dashboard_model->get_all_paper_count();
		$data['papers_comp'] = 0;//$this->dashboard_model->get_paper_completed_count();
		$data['papers_incomp'] = 0;//$this->dashboard_model->get_paper_incompleted_count();
		$data['schoolspapers'] = [];//$this->dashboard_model->get_schools_generted_papers();
		$data['all_users_stats'] = $this->dashboard_model->get_all_users_stats();
		
		$data['all_grades'] = $this->dashboard_model->get_all_grades();
		$data['all_subjects'] = $this->dashboard_model->get_all_subjects();
		$data['all_cstands'] = $this->dashboard_model->get_all_cstands();
		$data['all_subcstands'] = $this->dashboard_model->get_all_subcstands();
				
		
	
		}
	elseif($this->session->userdata('role_id')==4)
	{
			
		
		$data['all_schools'] = 0;//$this->dashboard_model->get_all_schools_count();
		$data['all_papers'] = 0;//$this->dashboard_model->get_all_paper_count();
		$data['papers_comp'] = 0;//$this->dashboard_model->get_paper_completed_count();
		$data['papers_incomp'] = 0;//$this->dashboard_model->get_paper_incompleted_count();
		$data['schoolspapers'] = [];//$this->dashboard_model->get_schools_generted_papers();
		$data['all_users_stats'] = $this->dashboard_model->get_all_users_stats();
		
		$data['all_grades'] = $this->dashboard_model->get_all_grades();
		$data['all_subjects'] = $this->dashboard_model->get_all_subjects();
		$data['all_cstands'] = $this->dashboard_model->get_all_cstands();
		$data['all_subcstands'] = $this->dashboard_model->get_all_subcstands();
			
		}
	elseif($this->session->userdata('role_id')==3)
	{
		$data['stats_ditems'] = $this->dashboard_model->get_stats_ditems();
		$data['stats_dgroup'] = $this->dashboard_model->get_stats_dgroups();
		$data['stats_dpara'] = $this->dashboard_model->get_stats_dpara();
		$data['stats_ritems'] = $this->dashboard_model->get_stats_ritmes();
		$data['iwtotalsubmitteditems'] = $this->dashboard_model->getTotalSubmittedItems();
	}
	elseif($this->session->userdata('role_id')==6)
	{
			$subjectList = $this->session->userdata('subjects_ids');
			$data['rev_stats_eitems'] = $this->Items_model->get_stats_rev_items($subjectList);
			$data['rev_stats_egroup'] = $this->dashboard_model->get_stats_rev_groups();
			$data['rev_stats_epara'] = $this->dashboard_model->get_stats_rev_para();
			$data['rev_stats_ritems'] = $this->Items_model->get_stats_rev_ritmes($subjectList);
	}
		///////////////////////////////////////////////////////////////////////
		
	$data['title'] = 'Dashboard';
	$this->load->view('admin/includes/_header');
	if($this->session->userdata('role_id') == 7)
	{
		$data['dfp_schools'] = $this->dashboard_model->get_school_for_dfp();
		$this->load->view('admin/dashboard/view_dfp_dashboard', $data);
	}
	elseif($this->session->userdata('role_id') == 8)
	{
		$data['tfp_schools'] = $this->dashboard_model->get_school_for_tfp();
		$this->load->view('admin/dashboard/view_tfp_dashboard', $data);
	}
	else
	{
    	$this->load->view('admin/dashboard/index', $data);
	}
    $this->load->view('admin/includes/_footer');
	
	}
	
	public function itemsstats(){
		$items = $this->dashboard_model->get_all_items_ids();		
		
		$data['all_schools'] = 0;//$this->dashboard_model->get_all_schools_count();
		$data['all_papers'] = 0;//$this->dashboard_model->get_all_paper_count();
		$data['papers_comp'] = 0;//$this->dashboard_model->get_paper_completed_count();
		$data['papers_incomp'] = 0;//$this->dashboard_model->get_paper_incompleted_count();
		$data['schoolspapers'] = [];//$this->dashboard_model->get_schools_generted_papers();
		$data['admin_users'] = $this->dashboard_model->get_admin_users();
		$data['ae_users'] = $this->dashboard_model->get_ae_users();
		$data['iw_users'] = $this->dashboard_model->get_iw_users();
		$data['all_grades'] = $this->dashboard_model->get_all_grades();
		$data['all_subjects'] = $this->dashboard_model->get_all_subjects();
		$data['all_cstands'] = $this->dashboard_model->get_all_cstands();
		$data['all_subcstands'] = $this->dashboard_model->get_all_subcstands();
		$data['items_stats_ss'] = $this->dashboard_model->get_items_stats_iss();
		
		if($this->session->userdata('role_id')==2){
			$data['english'] = $this->dashboard_model->get_stats_items('English');
			$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
			$data['math'] = $this->dashboard_model->get_stats_items('Math');
			$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
			$data['social'] = $this->dashboard_model->get_stats_items('Social');
			$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
			$data['religious'] = $this->dashboard_model->get_stats_items('Religous');
			$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
			$data['computer'] = $this->dashboard_model->get_stats_items('Computer');

			$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
			$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
			$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
			$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
			$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
			$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
			$data['religious2'] = $this->dashboard_model->get_stats_items('Religious',2);
			$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
			$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
		}
		elseif($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4){
		
			$data['english'] = $this->dashboard_model->get_stats_items('English');
			$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
			$data['math'] = $this->dashboard_model->get_stats_items('Math');
			$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
			$data['social'] = $this->dashboard_model->get_stats_items('Social');
			$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
			$data['religious'] = $this->dashboard_model->get_stats_items('Religous');
			$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
			$data['computer'] = $this->dashboard_model->get_stats_items('Computer');

			$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
			$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
			$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
			$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
			$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
			$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
			$data['religious2'] = $this->dashboard_model->get_stats_items('Religious',2);
			$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
			$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
		
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['english'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}
			
		$overall_summary['english']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['urdu'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}
			
		$overall_summary['urdu']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['math'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}
			
		$overall_summary['math']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['islamiat'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}	
			
		$overall_summary['islamiat']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['social'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}	
			
		$overall_summary['social']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['ethics'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['ethics']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['religious'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['religious']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['gk_science'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		
			$overall_summary['gk_science']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['computer'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['computer']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		/*****************************/
		
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['english2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}
			
		$overall_summary2['english2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['urdu2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['urdu2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['math2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['math2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['islamiat2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['islamiat2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['social2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['social2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['ethics2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['ethics2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['religious2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['religious2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['gk_science2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['gk_science2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['computer2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['computer2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		//echo '<hr />';
		//print_r($overall_summary);		
		//die();
		$data['summary_items'] = $overall_summary;
		$data['summary_items2'] = $overall_summary2;
		
		}
		
		$data['all_users'] = $this->dashboard_model->get_all_users();
		$data['items_stats'] = $this->dashboard_model->get_items_stats();
		
		$data['title'] = 'Items Stats';
		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/view_itemsstats', $data);
    	$this->load->view('admin/includes/_footer');
	}
	
	public function itemsstats_iwwise()
	{
		$items = $this->dashboard_model->get_all_items_ids();		
		
		$data['all_schools'] = 0;//$this->dashboard_model->get_all_schools_count();
		$data['all_papers'] = 0;//$this->dashboard_model->get_all_paper_count();
		$data['papers_comp'] = 0;//$this->dashboard_model->get_paper_completed_count();
		$data['papers_incomp'] = 0;//$this->dashboard_model->get_paper_incompleted_count();
		$data['schoolspapers'] = [];//$this->dashboard_model->get_schools_generted_papers();
		$data['admin_users'] = $this->dashboard_model->get_admin_users();
		$data['ae_users'] = $this->dashboard_model->get_ae_users();
		$data['iw_users'] = $this->dashboard_model->get_iw_users();
		$data['all_grades'] = $this->dashboard_model->get_all_grades();
		$data['all_subjects'] = $this->dashboard_model->get_all_subjects();
		$data['all_cstands'] = $this->dashboard_model->get_all_cstands();
		$data['all_subcstands'] = $this->dashboard_model->get_all_subcstands();
		$data['items_stats_ss'] = $this->dashboard_model->get_items_stats_iss();
		$data['items_stats_admin'] = $this->dashboard_model->get_items_stats_iadmin();
		
		if($this->session->userdata('role_id')==2){
			$data['english'] = $this->dashboard_model->get_stats_items('English');
			$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
			$data['math'] = $this->dashboard_model->get_stats_items('Math');
			$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
			$data['social'] = $this->dashboard_model->get_stats_items('Social');
			$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
			$data['religious'] = $this->dashboard_model->get_stats_items('Religous');
			$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
			$data['computer'] = $this->dashboard_model->get_stats_items('Computer');
			$data['tqm'] = $this->dashboard_model->get_stats_items('TARJUMA');

			$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
			$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
			$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
			$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
			$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
			$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
			$data['religious2'] = $this->dashboard_model->get_stats_items('Religious',2);
			$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
			$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
			$data['tqm2'] = $this->dashboard_model->get_stats_items('TARJUMA',2);
		}
		elseif($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4){
		
			$data['english'] = $this->dashboard_model->get_stats_items('English');
			$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
			$data['math'] = $this->dashboard_model->get_stats_items('Math');
			$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
			$data['social'] = $this->dashboard_model->get_stats_items('Social');
			$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
			$data['religious'] = $this->dashboard_model->get_stats_items('Religous');
			$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
			$data['computer'] = $this->dashboard_model->get_stats_items('Computer');
			$data['tqm'] = $this->dashboard_model->get_stats_items('TARJUMA');

			$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
			$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
			$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
			$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
			$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
			$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
			$data['religious2'] = $this->dashboard_model->get_stats_items('Religious',2);
			$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
			$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
			$data['tqm2'] = $this->dashboard_model->get_stats_items('TARJUMA',2);
		
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['english'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}
			
		$overall_summary['english']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['urdu'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}
			
		$overall_summary['urdu']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['math'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}
			
		$overall_summary['math']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['islamiat'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}	
			
		$overall_summary['islamiat']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['social'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}	
			
		$overall_summary['social']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['ethics'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['ethics']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['religious'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['religious']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['gk_science'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		
			$overall_summary['gk_science']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['computer'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['computer']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['tqm'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['tqm']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		/*****************************/
		
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['english2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}
			
		$overall_summary2['english2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['urdu2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['urdu2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['math2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['math2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['islamiat2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['islamiat2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['social2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['social2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['ethics2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}	
			
		$overall_summary2['ethics2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['religious2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['religious2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['gk_science2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['gk_science2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['computer2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['computer2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['tqm2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['tqm2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		//echo '<hr />';
		//print_r($overall_summary);		
		//die();
		$data['summary_items'] = $overall_summary;
		$data['summary_items2'] = $overall_summary2;
		
		}
		
		$data['all_users'] = $this->dashboard_model->get_all_users();
		$data['items_stats'] = $this->dashboard_model->get_items_stats();
		
		$data['title'] = 'Items Stats';
		$this->load->view('admin/includes/_header', $data);
    	$this->load->view('admin/dashboard/view_itemsstats_iwwise');
    	$this->load->view('admin/includes/_footer');
	}
	
	public function itemsstats_iwwise_admin()
	{
		$data['items_stats_admin'] = $this->dashboard_model->get_items_stats_iadmin_admin();
		
		$data['title'] = 'Items Stats For Admin';
		$this->load->view('admin/includes/_header', $data);
    	$this->load->view('admin/dashboard/view_itemsstats_iwwise_admin');
    	$this->load->view('admin/includes/_footer');
	}
	
	public function itemsstats_iwwise_batch()
	{
		$data['items_stats_batch1'] = $this->dashboard_model->get_items_stats_iadmin();
		$data['items_stats_batch2'] = $this->dashboard_model->get_items_stats_iadmin(2);
		
		if($this->session->userdata('role_id')==1){
			$data['title'] = 'Items Stats';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/dashboard/view_itemsstats_iwwise_batch');
			$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
	}
    
    public function itemsstats_iwwise_batchwise()
	{
		$data['items_stats_batch1'] = $this->dashboard_model->get_items_stats_iwbatchwise();
		$data['items_stats_batch2'] = $this->dashboard_model->get_items_stats_iwbatchwise(2);
		
		if($this->session->userdata('role_id')==2){
			$data['title'] = 'Items Stats Batchwise';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/dashboard/view_itemsstats_iwwise_batch_wise');
			$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
	}
	
	public function pilot_stats()
	{
		
		if($this->session->userdata('role_id')==1||$this->session->userdata('role_id')==2||$this->session->userdata('role_id')==4||$this->session->userdata('role_id')==5) 
		{ 
			$data['title'] = 'Dashboard Pilot Statistics';			
			$data['Data_Items'] = $this->dashboard_model->get_final_pilot_status($this->session->userdata('subjects_ids'));
			//echo '<pre>';
			//print_r($data['Data_Items']);
			//die();			
			$this->load->view('admin/includes/_header');
    		$this->load->view('admin/dashboard/pilot_stats', $data);
    		$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
	}
	
	public function reviewstats()
	{
		if($this->session->userdata('role_id')==2) 
		{ 
			$data['title'] = 'Dashboard for SS to View Status of Review Cycle';			
			$data['all_data'] = $this->dashboard_model->get_ss_review_data($this->session->userdata('subjects_ids'));					
			$this->load->view('admin/includes/_header');
    		$this->load->view('admin/dashboard/review_ss', $data);
    		$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
	}
	

	public function reviewstatsg()
	{
		if($this->session->userdata('role_id')==2) 
		{ 
			$data['title'] = 'Dashboard for SS to View Rejected Items in Group/Para';			
			$data['all_data'] = $this->dashboard_model->get_ss_review_datag($this->session->userdata('subjects_ids'));		
			//print_r($data['all_data']);
			//die();
			
			$this->load->view('admin/includes/_header');
    		$this->load->view('admin/dashboard/review_ssg', $data);
    		$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
	}
	
	public function reviewstatsae()
	{
		if($this->session->userdata('role_id')==4 || $this->session->userdata('role_id')==2) 
		{ 
			$data['title'] = 'Dashboard for AE to View Status of Review Cycle';			
			$data['all_data'] = $this->dashboard_model->get_ae_review_data($this->session->userdata('subjects_ids'));		
			//print_r($data['all_data']);
			//die();
			
			$this->load->view('admin/includes/_header');
    		$this->load->view('admin/dashboard/review_ae', $data);
    		$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
	}
	
	public function dailydata()
	{	
		
		if($this->session->userdata('role_id')==1) 
		{ 
			
		$data['title'] = 'Dashboard for Daily Statistics Data';
		$data['all_users'] = $this->dashboard_model->get_all_users_counters();
		
		
		$todayb = date("Y-m-d");
		$todayb1 = date("Y-m-d",strtotime("-1 days"));
		$todayb2 = date("Y-m-d",strtotime("-2 days"));
		$todayb3 = date("Y-m-d",strtotime("-3 days"));
		$todayb4 = date("Y-m-d",strtotime("-4 days"));	
		
		$data['ss_b'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb);
		$data['ss_b1'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb1);
		$data['ss_b2'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb2);
		$data['ss_b3'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb3);
		$data['ss_b4'] = $this->dashboard_model->get_ss_items_reviewed_daily($todayb4);
		
		$data['ae_b'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb);
		$data['ae_b1'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb1);
		$data['ae_b2'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb2);
		$data['ae_b3'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb3);
		$data['ae_b4'] = $this->dashboard_model->get_ae_items_reviewed_daily($todayb4);		
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/view_daily_ss_ae', $data);
    	$this->load->view('admin/includes/_footer');
		
	}
	
	public function ssreviewstatus()
	{	
		
		if($this->session->userdata('role_id')==1) 
		{ 
			
		$data['title'] = 'Dashboard for Review Status Data';
		$data['all_data'] = $this->dashboard_model->get_all_users_review_data();
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
		$this->load->view('admin/includes/_header', $data);
    	$this->load->view('admin/dashboard/ss_review_status');
    	$this->load->view('admin/includes/_footer');
		
	}
	
	public function sswritestatus()
	{	
		
		if($this->session->userdata('role_id')==1) 
		{ 
			
		$data['title'] = 'Dashboard for Writing Status Data';
		$data['all_data'] = $this->dashboard_model->get_all_users_write_data();
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
		$this->load->view('admin/includes/_header', $data);
    	$this->load->view('admin/dashboard/ss_write_status');
    	$this->load->view('admin/includes/_footer');
		
	}
    
    public function sswritestatusbatch2()
	{	
		
		if($this->session->userdata('role_id')==1) 
		{ 
			
		$data['title'] = 'Dashboard for Writing Status Data Batch 2';
		$data['all_data'] = $this->dashboard_model->get_all_users_write_data_batch2();
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
		$this->load->view('admin/includes/_header', $data);
    	$this->load->view('admin/dashboard/ss_write_status_batch2');
    	$this->load->view('admin/includes/_footer');
		
	}
	
	public function dailydatass($id)
	{	
		
		if($this->session->userdata('role_id')==1) 
		{ 
			
		$data['title'] = 'Dashboard for Daily Statistics Data';
				$data['english'] = $this->dashboard_model->get_stats_items('English');
		$data['urdu'] = $this->dashboard_model->get_stats_items('Urdu');
		$data['math'] = $this->dashboard_model->get_stats_items('Math');
		$data['islamiat'] = $this->dashboard_model->get_stats_items('Islamiat');
		$data['social'] = $this->dashboard_model->get_stats_items('Social');
		$data['ethics'] = $this->dashboard_model->get_stats_items('Ethics');
		$data['gk_science'] = $this->dashboard_model->get_stats_items('General');
		$data['computer'] = $this->dashboard_model->get_stats_items('Computer');
		
		$data['english2'] = $this->dashboard_model->get_stats_items('English',2);
		$data['urdu2'] = $this->dashboard_model->get_stats_items('Urdu',2);
		$data['math2'] = $this->dashboard_model->get_stats_items('Math',2);
		$data['islamiat2'] = $this->dashboard_model->get_stats_items('Islamiat',2);
		$data['social2'] = $this->dashboard_model->get_stats_items('Social',2);
		$data['ethics2'] = $this->dashboard_model->get_stats_items('Ethics',2);
		$data['gk_science2'] = $this->dashboard_model->get_stats_items('General',2);
		$data['computer2'] = $this->dashboard_model->get_stats_items('Computer',2);
		
		/*
		echo '<pre>';
		print_r($data['gk_science']);
		echo '<hr>';
		print_r($data['gk_science']);
		die();
		*/
		
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['english'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['english']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['urdu'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['urdu']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['math'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['math']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['islamiat'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['islamiat']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['social'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['social']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['ethics'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['ethics']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['gk_science'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['gk_science']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		$Draft_Items=$Submitted_Items=$SS_Pending=$SS_Rejected=$SS_Accepted=$AE_Pending=$AE_Accepted=$AE_Rejected=0;
		foreach($data['computer'] as $value)
		{
			$Draft_Items += $value['Draft_Items'];
			$Submitted_Items += $value['Submitted_Items'];
			$SS_Pending += $value['SS_Pending'];
			$SS_Rejected += $value['SS_Rejected'];
			$SS_Accepted += $value['SS_Accepted'];
			$AE_Pending += $value['AE_Pending'];
			$AE_Accepted += $value['AE_Accepted'];
			$AE_Rejected += $value['AE_Rejected'];
		}		
		$overall_summary['computer']=['d'=>$Draft_Items,'s'=>$Submitted_Items,'sp'=>$SS_Pending,'sr'=>$SS_Rejected,'sa'=>$SS_Accepted,'a'=>$AE_Pending,'aa'=>$AE_Accepted,'aer'=>$AE_Rejected];
		/*****************************/
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['english2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['english2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['urdu2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['urdu2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['math2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['math2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['islamiat2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['islamiat2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['social2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['social2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['ethics2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['ethics2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['gk_science2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['gk_science2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		$Draft_Items2=$Submitted_Items2=$SS_Pending2=$SS_Rejected2=$SS_Accepted2=$AE_Pending2=$AE_Accepted2=$AE_Rejected2=0;
		foreach($data['computer2'] as $value)
		{
			$Draft_Items2 += $value['Draft_Items'];
			$Submitted_Items2 += $value['Submitted_Items'];
			$SS_Pending2 += $value['SS_Pending'];
			$SS_Rejected2 += $value['SS_Rejected'];
			$SS_Accepted2 += $value['SS_Accepted'];
			$AE_Pending2 += $value['AE_Pending'];
			$AE_Accepted2 += $value['AE_Accepted'];
			$AE_Rejected2 += $value['AE_Rejected'];
		}		
		$overall_summary2['computer2']=['d'=>$Draft_Items2,'s'=>$Submitted_Items2,'sp'=>$SS_Pending2,'sr'=>$SS_Rejected2,'sa'=>$SS_Accepted2,'a'=>$AE_Pending2,'aa'=>$AE_Accepted2,'aer'=>$AE_Rejected2];
		
		//echo '<hr />';
		//print_r($overall_summary);		
		//die();
		$data['id'] = $id;
		$data['summary_items'] = $overall_summary;
		$data['summary_items2'] = $overall_summary2;
		$data['items_stats_ss'] = $this->dashboard_model->get_items_stats_iss();
		$this->load->view('admin/includes/_header');
    	$this->load->view('admin/dashboard/view_daily_ss_ae2', $data);
    	$this->load->view('admin/includes/_footer');
		}
		else
		{
			die('Restricted Area!!! Not Allowed');
		}
		
		
	}
	
}
?>	