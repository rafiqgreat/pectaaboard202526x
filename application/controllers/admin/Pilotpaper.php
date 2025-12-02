<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pilotpaper extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Pilotpaper_model', 'Pilotpaper_model');
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index()
	{
		$data['title'] = 'Pilot Paper Dashboard';
		$subjectList = $this->session->userdata('subjects_ids');
		$data['records'] = $this->Pilotpaper_model->get_Pilot_Stats($subjectList);
		$data['paper1'] = $this->Pilotpaper_model->get_Pilot_Paper_Phase($subjectList,1);
		$data['paper1erq'] = $this->Pilotpaper_model->get_Pilot_Paper_CRQ_Phase($subjectList,1);
		
		//$data['paper1'] = $this->Pilotpaper_model->getVersions();	 // get mcq subcontent strands 		
		//$data['paper1'] = $this->Pilotpaper_model->getParaVersions();	 // get para ids and update in mcqs tables		
		//$data['paper1'] = $this->Pilotpaper_model->getIndivisualMCQsParas();	 // get paras indivisual mcqs		
		//die('im here');
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/pilotpaper_index');
		$this->load->view('admin/includes/_footer');
	}
	public function index2()
	{
		$data['title'] = 'Pilot Paper 2 Dashboard';
		$subjectList = $this->session->userdata('subjects_ids');
		$data['records'] = $this->Pilotpaper_model->get_Pilot_Stats_Both($subjectList);
		$data['paper1'] = $this->Pilotpaper_model->get_Pilot_Paper_Phase($subjectList,2);
		$data['paper1erq'] = $this->Pilotpaper_model->get_Pilot_Paper_CRQ_Phase($subjectList,2);
		
		//$data['paper1'] = $this->Pilotpaper_model->getVersions();	 // get mcq subcontent strands 		
		//$data['paper1'] = $this->Pilotpaper_model->getParaVersions();	 // get para ids and update in mcqs tables		
		//$data['paper1'] = $this->Pilotpaper_model->getIndivisualMCQsParas();	 // get paras indivisual mcqs		
		//die('im here');
		
		//step 1 : get phase-1 mcq items
		//$data['all_mcq_items'] = $this->Pilotpaper_model->getPilotMCQItems(12,1);	 // get mcq subcontent strands 		// phase 1 items
		
		//print_r($data['all_mcq_items']);
		//die('Auto Pilot-2');
		
			
		///////////////////////////////////////////////////
		/////////STRATS  STEP-1 FOR PHASE-2  GET PARAGRAPHS /////////
		/////////////////////////////////////////////////////
/*		
		$ParaSubjects = $this->Pilotpaper_model->getPilotMCQsVersionsUrduEnglish(2);
		//echo '<pre>';
//		print_r($ParaSubjects);
//		echo '<hr />';
//		die();
		foreach($ParaSubjects as $p_subject)
		{
			$data['all_para_ids'] = $this->Pilotpaper_model->getAll_Para_Ids($p_subject['p_subject_id']);	 // get mcq subcontent strands 		// phase 1 items
			//print_r($data['all_para_ids'][0]['all_para_ids']);
			//echo '<hr />';		
			$data['pilot1_para_ids'] = $this->Pilotpaper_model->getPilot1_Para_Ids($p_subject['p_subject_id'],1);	 // get mcq subcontent strands 		// phase 1 items
			//print_r($data['pilot1_para_ids'][0]['p1_para_ids']);
			//echo '<hr />';		
			$diff = (array_diff(explode(",",$data['all_para_ids'][0]['all_para_ids']),explode(",",$data['pilot1_para_ids'][0]['p1_para_ids'])));		
			echo 'Pilt P-2 Paras('.$p_subject['p_subject_id'].'):'.count($diff).' and IDS :'. implode(',',$diff);
			
			$qry_update = "UPDATE ci_pilot_papers_mcqs SET p_m_num_paragraphs = ".count($diff).", p_m_paras_ids = '".implode(',',$diff)."' WHERE p_phase = 2 AND p_subject_id = ".$p_subject['p_subject_id'];			
			echo '<hr />'.$qry_update.'<hr />';
			
			$this->Pilotpaper_model->run_update_query_custom($qry_update);
			
			$versions 	= $p_subject['p_m_versions'];			
			$subject_id = $p_subject['p_subject_id'];
			$v1=[];
			$v2=[];
			$v3=[];
			$v4=[];
			$v5=[];
			$v6=[];
			$v7=[];
			$v8=[];	
			$v9=[];	
			$para_arr =implode(',',$diff);
			$diff =explode(',',$para_arr);
			//print_r($diff);
			//echo 'aa<hr />';	
			for($i=0;$i<count($diff);$i++)
			{	
				if($i%$versions==0)
				{
					$v1[] = $diff[$i]; 
				}
				if($i%$versions==1)
				{
					$v2[] =  $diff[$i];  
				}
				if($i%$versions==2)
				{
					$v3[] =  $diff[$i];  
				}
				if($i%$versions==3)
				{
					$v4[] =  $diff[$i];  
				}
				if($i%$versions==4)
				{
					$v5[] =  $diff[$i];  
				}
				if($i%$versions==5)
				{
					$v6[] =  $diff[$i];  
				}
				if($i%$versions==6)
				{
					$v7[] =  $diff[$i];  
				}
				if($i%$versions==7)
				{
					$v8[] =  $diff[$i];  
				}
				if($i%$versions==8)
				{
					$v9[] =  $diff[$i];  
				}

			}
				
			
				echo "Subject:['.$subject_id.'] and Versions ['.$versions.'] <br /> Added v1(".count($v1)."), v2(".count($v2)."), v3(".count($v3)."), v4(".count($v4)."), v5(".count($v5)."), v6(".count($v6)."), v7(".count($v7)."), v8(".count($v8)."), v8(".count($v9).")";
			
				//echo '<hr />----------- start: Subject:['.$subject_id.'] and Versions ['.$versions.']-----------start-------<br />';			
				//print(implode(", ",$v1));
					$v1x = implode(", ",$v1);
				//echo '<hr />';
				//print(implode(", ",$v2));
					$v2x = implode(", ",$v2);
				//echo '<hr />';
				//print(implode(", ",$v3));
					$v3x = implode(", ",$v3);
				//echo '<hr />';
				//print(implode(", ",$v4));
					$v4x = implode(", ",$v4);
				//echo '<hr />';
				//print(implode(", ",$v5));
					$v5x = implode(", ",$v5);
				//echo '<hr />';
				//print(implode(", ",$v6));
					$v6x = implode(", ",$v6);
				//echo '<hr />';
				//print(implode(", ",$v7));
					$v7x = implode(", ",$v7);
				//echo '<hr />';
				//print(implode(", ",$v8));
					$v8x = implode(", ",$v8);
				//print(implode(", ",$v9));
					$v9x = implode(", ",$v9);
				//echo '<br />---------------------------over -----------------------------<br />';

					$qry_update = "UPDATE ci_pilot_papers_mcqs SET p_m_v1_para_ids = '".$v1x."', p_m_v2_para_ids = '".$v2x."', p_m_v3_para_ids = '".$v3x."', p_m_v4_para_ids = '".$v4x."', p_m_v5_para_ids = '".$v5x."', p_m_v6_para_ids = '".$v6x."', p_m_v7_para_ids = '".$v7x."', p_m_v8_para_ids = '".$v8x."', p_m_v9_para_ids = '".$v9x."' WHERE p_subject_id = ".$subject_id . " AND p_phase = 2";

				echo '<br />'.$qry_update. '<br />';
				$this->Pilotpaper_model->run_update_query_custom($qry_update);

				

				// divide mcq para items into ci_pilot_crq table in paragraphs divisions
			$this->Pilotpaper_model->getParaVersions2($p_subject['p_subject_id']);
				
			echo('<hr /><hr />one is over<hr /><hr />');
			
		}
	*/
		//die();
		
		///////////////////////////////////////////////////
		/////////ENDS STEP-1 FOR PHASE-2  GET PARAGRAPHS /////////////
		///////////////////////////////////////////////////		
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////// START  STEP-2 PHASE-2  GET INDUVISUAL MCQS  ////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//$data['all_para_mcq_ids'] = $this->Pilotpaper_model->getAllPilotParaMCQItems(12);	 // get all indivisual mcq items
		//print_r($data['all_para_mcq_ids'][0]['mcqs']);
		//echo '<hr />';
		//==============STEP-2 =====  PILOT-1 GET INDIVISUAL MCQS ITEMS STEPS FOR ENGLISH AND URDU===========================//
		
/*		
		$ParaSubjects = $this->Pilotpaper_model->getPilotMCQsVersionsUrduEnglish(2);
		//echo '<pre>';
//		print_r($ParaSubjects);
//		echo '<hr />';
//		die();	
		foreach($ParaSubjects as $p_subject)
		{			
			$data['pilot1_indi_mcq_items'] = $this->Pilotpaper_model->getPilotMCQItems($p_subject['p_subject_id'],1);	 // get mcq subcontent strands 		// phase 1 items
		//print_r($data['pilot1_indi_mcq_items'][0]->mcq_ids);
		//echo '<hr /><hr />';
			
			$data['total_indi_mcq_items'] = $this->Pilotpaper_model->getTotalMCQItems($p_subject['p_subject_id']);	 // get mcq subcontent strands 		// phase 1 items
			//print_r($data['total_indi_mcq_items'][0]['total_mcq_ids']);
			//echo '<hr /><hr /><hr /><hr />';
			
			
			$diff = (array_diff(explode(",",$data['total_indi_mcq_items'][0]['total_mcq_ids']),explode(",",$data['pilot1_indi_mcq_items'][0]->mcq_ids)));	
			
			$indivisual_mcq_eng_ur = explode(",",implode(',',$diff));
			
			echo 'Pilt P-2 Indiviaul MCQs('.$p_subject['p_subject_id'].'):'.count($diff).' and IDS :'. implode(',',$diff);

			$qry_update = "UPDATE ci_pilot_papers_mcqs SET p_m_ind_num_mcqs = '".count($diff)."'  WHERE p_subject_id = ".$p_subject['p_subject_id'] . " AND p_phase = 2";
			echo '<br />'.$qry_update. '<br />';
			//$this->Pilotpaper_model->run_update_query_custom($qry_update);

			////////////////////////////////////
			//////////////////////////////////////
			$sqlx="SELECT p_subject_id, p_m_total_mcqs, p_m_versions, p_m_versions_distr FROM `ci_pilot_papers_mcqs` WHERE p_subject_id = ".$p_subject['p_subject_id'] . " AND p_phase = 2 ";
			$queryx = $this->db->query($sqlx);
			$resultx =  $queryx->result();
			
			foreach($resultx as $rowx)
			{
				$versions = $rowx->p_m_versions;			
				$subject_id =$rowx->p_subject_id;				
				
				$v1=[];
				$v2=[];
				$v3=[];
				$v4=[];
				$v5=[];
				$v6=[];
				$v7=[];
				$v8=[];
				$v9=[];
				$i=0;
				$xctr = 0;
				//echo '<pre>';
				//print_r($indivisual_mcq_eng_ur);
				//echo '<hr /><hr /><hr /><hr />';
				//die();
				
				foreach($diff as $row)
				{
					if($i%$versions==0)
					{
						$v1[] = $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==1)
					{
						$v2[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==2)
					{
						$v3[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==3)
					{
						$v4[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==4)
					{
						$v5[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==5)
					{
						$v6[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==6)
					{
						$v7[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==7)
					{
						$v8[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}
					if($i%$versions==8)
					{
						$v9[] =  $indivisual_mcq_eng_ur[$xctr]; 
					}

					$i++;
					$xctr++;
				}


				echo '<hr />----------- start: Subject:['.$subject_id.'] and Versions ['.$versions.']-----------start-------<br />';			
				print(implode(", ",$v1));
					$v1x = implode(", ",$v1);
				echo '<hr />';
				print(implode(", ",$v2));
					$v2x = implode(", ",$v2);
				echo '<hr />';
				print(implode(", ",$v3));
					$v3x = implode(", ",$v3);
				echo '<hr />';
				print(implode(", ",$v4));
					$v4x = implode(", ",$v4);
				echo '<hr />';
				print(implode(", ",$v5));
					$v5x = implode(", ",$v5);
				echo '<hr />';
				print(implode(", ",$v6));
					$v6x = implode(", ",$v6);
				echo '<hr />';
				print(implode(", ",$v7));
					$v7x = implode(", ",$v7);
				echo '<hr />';
				print(implode(", ",$v8));
					$v8x = implode(", ",$v8);
				echo '<hr />';
				print(implode(", ",$v9));
					$v9x = implode(", ",$v9);
				echo '<br />---------------------------over -----------------------------<br />';

					$qry_upx = "UPDATE ci_pilot_papers_mcqs SET p_m_v1_mcq_ids = '".$v1x."', p_m_v2_mcq_ids = '".$v2x."', p_m_v3_mcq_ids = '".$v3x."', p_m_v4_mcq_ids = '".$v4x."', p_m_v5_mcq_ids = '".$v5x."', p_m_v6_mcq_ids = '".$v6x."', p_m_v7_mcq_ids = '".$v7x."', p_m_v8_mcq_ids = '".$v8x."', p_m_v9_mcq_ids = '".$v9x."' WHERE p_phase=2 AND p_subject_id = ".$subject_id;

				echo '<br />'.$qry_upx. '<br />';
				//die('xxxxxxxxxx');
				$this->Pilotpaper_model->run_update_query_custom($qry_upx);
			}
			
		}
	
	*/
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////// START  STEP-LAST PHASE-2  GET CRQs  //////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
/*
		$subjectCRQs = $this->Pilotpaper_model->getPilotCRQsPhase(2); // pilot phase as param	
		foreach($subjectCRQs as $sub)
		{
			
			$IndiCRQsAll = $this->Pilotpaper_model->getPilotIndivisualCRQsAll($sub->c_subject_id); // subject id as param
			$total_crqs_ids = $IndiCRQsAll[0]->total_crq_ids;
			$total_crqs_arr = explode(",",$total_crqs_ids);
			
			$IndiCRQsPhase1 = $this->Pilotpaper_model->getPilotIndivisualCRQsPhase1($sub->c_subject_id,1); // subject id as param
			$p1_crqs_ids = $IndiCRQsPhase1[0]->c_ind_crq_ids;
			$p1_crqs_arr = explode(",",$p1_crqs_ids);
			
			$diff = array_diff($total_crqs_arr,$p1_crqs_arr);		
			
			//echo '<hr />';
			//echo 'count('.count($total_crqs_arr).')'.($total_crqs_ids);
			//echo '<hr />';
			//echo '<hr />';
			//echo 'count('.count($p1_crqs_arr).')'.($p1_crqs_ids);
			//echo '<hr />';

			echo 'Pilt P-2 IndiCRQs('.$sub->c_subject_id.'):'.count($diff).' <br /> IDS :'. implode(',',$diff);
			
			$qry_update = "UPDATE ci_pilot_papers_crqs SET c_ind_crq_ids = '".(implode(",",$diff))."',  c_ind_crq_count = '".count($diff)."'  WHERE c_subject_id = ".$sub->c_subject_id . " AND c_phase = 2";
			
			echo '<hr />'.$qry_update. '<hr />';
			$this->Pilotpaper_model->run_update_query_custom($qry_update);
			
			
			////////////////////////////////////////////////
			///////////// code for para crqs ///////////////
			///////////////////////////////////////////////
			$ParaCRQs = $this->Pilotpaper_model->getPilotParagraphsCRQs($sub->c_subject_id); // subject id as param
			$para_crqs_ids = $ParaCRQs[0]->para_crq_ids;
			$para_crqs_arr = explode(",",$para_crqs_ids);
			//echo '<pre>';
			//echo '<hr />';
			//echo 'count('.count($para_crqs_arr).')'.($para_crqs_ids);
			//echo '<hr />';
			if($para_crqs_ids!="")
			{
				$qry_update = "UPDATE ci_pilot_papers_crqs SET c_para_ids = '".$para_crqs_ids."',  c_para_count = '".count($para_crqs_arr)."'  WHERE c_subject_id = ".$sub->c_subject_id . " AND c_phase = 2";

				echo '<hr />'.$qry_update. '<hr />';
				$this->Pilotpaper_model->run_update_query_custom($qry_update);
			}
			
		}
		
		die('breaked');
*/
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////// ENDS   STEP-LAST PHASE-2  GET CRQs //////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		
		//echo '<hr />';
		//echo 'All Para MCQs : '.count(explode(',',$data['all_para_mcq_ids'][0]['mcqs']));
		//echo '<hr />';
		//echo 'P-1 Indi MCQs : '.count(explode(',',$data['pilot1_indi_mcq_items'][0]->mcq_ids));
		//echo '<hr />';
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////// ENDS  STEP-2 PHASE-2  GET INDUVISUAL MCQS  ////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//die('bbbbbbbb');
	
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/pilotpaper_index2');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json()
	{
		if($this->session->userdata('role_id')==1)
		{		
			$records = $this->Pilotpaper_model->get_all_pilotpaper();
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ib_verified'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['ib_title'],
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ib_year'],
				$row['ib_verified_dt'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['ib_id'].'" 
				id="cb_'.$row['ib_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['ib_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilotpaper/view/'.$row['ib_id']).'"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}
		elseif($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Pilotpaper_model->get_all_pilotpaper_IE($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ib_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['ib_title'],
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ib_year'],
				$row['username'],
				$row['ib_created'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['ib_id'].'" 
				id="cb_'.$row['ib_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['ib_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilotpaper/view/'.$row['ib_id']).'"> <i class="fa fa-eye"></i></a>			
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/pilotpaper/delete/".$row['ib_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}
		else
		{		
			$subjectList = $this->session->userdata('subjects_ids');
			$records = $this->Pilotpaper_model->get_all_pilotpaper_IW($this->session->userdata('admin_id'),$subjectList);		
			$data = array();		
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['ib_verified'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['ib_title'],
				$row['grade_name_en'],
				$row['subject_name_en'],
				$row['ib_year'],
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilotpaper/view/'.$row['ib_id']).'"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);	
		}	
							   
	}
	public function coun_group_item($id=0)
	{
		return $group_item = $this->Pilotpaper_model->coun_group_item($id);
	}
	public function generate_paper($id=0) 
	{
		$data['title'] = 'Paper';
        $data['phase'] = 1;
		$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs($id);
		//$data['paper_mcqs'] = $this->Pilotpaper_model->get_paper_mcqs($id);
		//$data['paper_paras'] = $this->Pilotpaper_model->get_paper_paras($id);
		$data['paper_paras'] = $this->Pilotpaper_model->paper_mcqs_paras($id);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/pilotpaper_view');
		$this->load->view('admin/includes/_footer');
	}
	public function generate_paper2($id=0)
	{
		$data['title'] = 'Paper';
		$data['p_id'] = $id;
        $data['phase'] = 2;
		$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs2($id);
		$data['paper_paras'] = $this->Pilotpaper_model->paper_mcqs_paras2($id);

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/pilotpaper_view');
		$this->load->view('admin/includes/_footer');
	}
    /***************************************************************************
    *       Pilot item Summary Report
    ***************************************************************************/
    public function pilot_item_summary($id=0)//subject_id,paper_version_id
	{
        $temp = explode('_',$id);
        $p_subject = $temp[0];
        $p_version = $temp[1];
       // p_phase = $temp[2];
        $p_phase = 1;
        
		$data['title'] = 'Pilot Paper Summary';
        $data['p_version'] = $p_version;
        $data['paper'] = $this->Pilotpaper_model->paper_sumary($p_subject,$p_version,$p_phase);
        $data['p_subject'] = $p_subject;
        $data['p_version'] = $p_version;
        $data['p_phase'] = $p_phase;
        $data['export'] = 0;
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/rep_pilotpaper_sumary');
		$this->load->view('admin/includes/_footer');
	}
	public function pilot_item_summary2($id=0)//subject_id,paper_version_id
	{
        $temp = explode('_',$id);
        $p_subject = $temp[0];
        $p_version = $temp[1];
       // p_phase = $temp[2];
        $p_phase = 2;
        
		$data['title'] = 'Pilot Paper Summary';
        $data['p_version'] = $p_version;
        $data['paper'] = $this->Pilotpaper_model->paper_sumary($p_subject,$p_version,$p_phase);
        $data['p_subject'] = $p_subject;
        $data['p_version'] = $p_version;
        $data['p_phase'] = $p_phase;
        $data['export'] = 0;
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/rep_pilotpaper_sumary');
		$this->load->view('admin/includes/_footer');
	}
    public function pilot_item_summary_export($rep_type,$p_subject,$p_version,$p_phase=1)
	{
          //$res_data = $this->Reports_model->get_missing_items_sumry($grade,$subject);
        
        $data['title'] = 'Pilot Paper Summary';
        $data['p_version'] = $p_version;
        $data['paper'] = $this->Pilotpaper_model->paper_sumary($p_subject,$p_version,$p_phase);
        $data['p_subject'] = $p_subject;
        $data['p_phase'] = $p_phase;
        $data['export'] = 1;
        
        
        $header = '<table style="border:none;"><tr>
                        <td colspan ="2" style=" text-align:center;padding:20px;"><img src="'.base_url().'/assets/img/pec-image.jpg" width="110" height="130" /></td>
                        <td colspan ="3" style="font-size:24px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
                        </tr>
                        <tr>
                            <td colspan ="5" style="text-align:right">
                                <div style="border:1px solid; float:right;width:100%; text-align: right;">Date: '.date('d-m-Y').'</div>
                            </td>
                        </tr>
                        </table>'
                    ;
        $footer = '<p >
                        <span style="width:70%" >Copyright © 2021 pec.edu.pk All rights reserved.</span>
                        <span style="width:30%;text-align: right" colspan="3">Developed By: PEC IT TEAM .</span>
                    </p>';
        $data['rep_type'] =$rep_type;
        $data['title'] = 'Missing Item Summary';
        //$data['res_data'] = $res_data; 
        $data['header'] = $header; 
        
         $filename = 'PilotPaperSummary';
         $html = $this->load->view('admin/pilotpaper/rep_pilotpaper_sumary_export', $data,true);
        if($rep_type=='PDF'){
            
            $mpdf = new \Mpdf\Mpdf();
            $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->SetAuthor("PEC IT TEAM");
            $mpdf->SetTitle("Pilot Paper Summary");
            $mpdf->watermark_font = 'PEC-IT-TEAM';
            $mpdf->SetHTMLHeader($header);
            $mpdf->SetHTMLFooter($footer);
            $mpdf->AddPage('', // L - landscape, P - portrait 
                                                    '', '', '', '',
                                                    5, // margin_left
                                                    5, // margin right
                                                   60, // margin top
                                                   20, // margin bottom
                                                    0, // margin header
                                                    5); 
            $mpdf->WriteHTML($html);
           
           
            $mpdf->Output($filename . '.pdf', 'D');
            exit();	
        }else if($rep_type == 'CSV'){
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=".$filename.$p_version.".xls"); 
            //header("Content-Disposition: attachment;Filename=document_name.xls");
            //header("Content-Type: application/csv; ");
            header("Content-type: application/vnd.ms-excel");
            echo $html;
            
        }
    }
    
        
    
    /***************************************************************************
    *       END Pilot item Summary Report
    ***************************************************************************/
	public function generate_paper_subjective($id=0)
	{
		$data['title'] = 'Paper';
		$data['paper_erqs'] = $this->Pilotpaper_model->get_paper_erqs($id);
		$data['paper_paras_erqs'] = $this->Pilotpaper_model->get_paper_paras_erqs($id);
		$data['paper_groups'] = $this->Pilotpaper_model->get_paper_groups($id);
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/pilotpaper/pilotpaper_view_subjective', $data);
		$this->load->view('admin/includes/_footer');
	}
	public function generate_paper_doc($id=0)
	{
		$data['title'] = 'Paper';
		$data['paper_mcqs'] = $this->Pilotpaper_model->get_paper_mcqs($id);
		$data['paper_paras'] = $this->Pilotpaper_model->get_paper_paras($id);
		
		header("Content-Description: File Transfer"); 
        header('Content-Type: application/octet-stream');
	    // header("Content-Disposition: attachment; filename=$filename"); 
		echo $this->load->view('admin/pilotpaper/pilotpaper_view', $data, true);
		header("Content-Disposition: attachment;Filename=Flimzy_list.doc");
		//$data['paper_hearders'] = $this->Pilotpaper_model->get_pilotheader_by_suject($id);
		//$this->load->view('admin/includes/_header');
		//$this->load->view('admin/includes/_footer');
	}
	public function group_erqs_view($id=0)
	{
		$data['title'] = 'Group';
		$data['paper_groups'] = $this->Pilotpaper_model->get_paper_groups($id);
		if(empty($data['paper_groups']))
		{
			$this->session->set_flashdata('error', 'No Group found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_group', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function group_erqs_view2($id=0)
	{
		$data['title'] = 'Group';
		$data['paper_groups'] = $this->Pilotpaper_model->get_paper_groups2($id);
		if(empty($data['paper_groups']))
		{
			$this->session->set_flashdata('error', 'No Group found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_group', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function para_erqs_view($id=0)
	{
		$data['title'] = 'Paragraph';
		$data['paper_paras_erqs'] = $this->Pilotpaper_model->get_paper_paras_erqs($id);
		
		if(empty($data['paper_paras_erqs']))
		{
			$this->session->set_flashdata('error', 'No Paragraph found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_para', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function para_erqs_view2($id=0)
	{
		$data['title'] = 'Paragraph';
		$data['paper_paras_erqs'] = $this->Pilotpaper_model->get_paper_paras_erqs($id);
		
		if(empty($data['paper_paras_erqs']))
		{
			$this->session->set_flashdata('error', 'No Paragraph found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_para', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function para_erqs_view_key2($id=0)
	{
		$data['title'] = 'Paragraph';
		$data['paper_paras_erqs'] = $this->Pilotpaper_model->get_paper_paras_erqs($id);
		
		if(empty($data['paper_paras_erqs']))
		{
			$this->session->set_flashdata('error', 'No Paragraph found!');
			redirect(base_url('admin/pilotpaper/index2'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_para_key', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	
	public function indiv_erqs_view($id=0)
	{
		$data['title'] = 'Individual ERQ';
		$data['paper_erqs'] = $this->Pilotpaper_model->get_paper_erqs($id);
		if(empty($data['paper_erqs']))
		{
			$this->session->set_flashdata('error', 'No ERQ item found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_erq_indiv', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	public function igp_erqs_view($id=0)
	{
		$data['title'] = 'IGP View';

		$data['paper_erqs_subj'] = $this->Pilotpaper_model->get_paper_erqs_subj($id);
		$temp = explode(',',$data['paper_erqs_subj'][0]->c_ind_crq_ids);
		for($i=0; $i<count($temp); $i++)
		{
			$data['paper_erqs'][$i] = $this->Pilotpaper_model->get_paper_erqs_ind($temp[$i]);
		}
		
		$groups_ids = explode(',',$data['paper_erqs_subj'][0]->c_m_v1_group_ids);
		for($i=0; $i<count($groups_ids); $i++)
		{
			$data['paper_groups_v1s'][$i] = $this->Pilotpaper_model->get_paper_groups_subj($groups_ids[$i]);			
		}
		
		$para_ids = explode(',',$data['paper_erqs_subj'][0]->c_m_v1_para_ids);
		for($i=0; $i<count($para_ids); $i++)
		{
			$data['paper_para_v1s'][$i] = $this->Pilotpaper_model->get_paper_para_subj($para_ids[$i]);
		}
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/pilotpaper/pilotpaper_view_subj', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function group_erqs_view_key($id=0)
	{
		$data['title'] = 'Group Answer Key';
		$data['paper_groups'] = $this->Pilotpaper_model->get_paper_groups($id);
		if(empty($data['paper_groups']))
		{
			$this->session->set_flashdata('error', 'No Group found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_group_key', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function group_erqs_view_key2($id=0)
	{
		$data['title'] = 'Group Answer Key';
		$data['paper_groups'] = $this->Pilotpaper_model->get_paper_groups2($id);
		if(empty($data['paper_groups']))
		{
			$this->session->set_flashdata('error', 'No Group found!');
			redirect(base_url('admin/pilotpaper/index2'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_group_key_p2', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	public function indiv_erqs_view_key($id=0)
	{
		$data['title'] = 'Individual ERQ Answer Key';
		$data['paper_erqs'] = $this->Pilotpaper_model->get_paper_erqs($id);
		if(empty($data['paper_erqs']))
		{
			$this->session->set_flashdata('error', 'No ERQ item found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_erq_indiv_key', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	
	public function indiv_erqs_view_key2($id=0)
	{
		//die('I am controller');
		$data['title'] = 'Individual ERQ Answer Key';
		$data['paper_erqs'] = $this->Pilotpaper_model->get_paper_erqs2($id);
		if(empty($data['paper_erqs']))
		{
			$this->session->set_flashdata('error', 'No ERQ item found!');
			redirect(base_url('admin/pilotpaper/index2'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_erq_indiv_key_p2', $data);
			$this->load->view('admin/includes/_footer');
		}
	}

	public function paper_key($id=0)
	{
		$data['title'] = 'Paper Key';
		$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs($id);
		//$data['paper_mcqs'] = $this->Pilotpaper_model->get_paper_mcqs($id);
		//$data['paper_paras'] = $this->Pilotpaper_model->get_paper_paras($id);
		$data['paper_paras'] = $this->Pilotpaper_model->paper_mcqs_paras($id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/pilotpaper_view_key');
		$this->load->view('admin/includes/_footer');
	}
	public function paper_key_item($id=0)
	{
		$data['title'] = 'Paper Key';
		$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs($id);
		//$data['paper_mcqs'] = $this->Pilotpaper_model->get_paper_mcqs($id);
		//$data['paper_paras'] = $this->Pilotpaper_model->get_paper_paras($id);
		$data['paper_paras'] = $this->Pilotpaper_model->paper_mcqs_paras($id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/pilotpaper_view_key_item');
		$this->load->view('admin/includes/_footer');
	}
	public function paper_key2($id=0)
	{
		$data['title'] = 'Paper Key';
		$data['paper_mcqs'] = $this->Pilotpaper_model->paper_mcqs2($id);
		//$data['paper_mcqs'] = $this->Pilotpaper_model->get_paper_mcqs($id);
		//$data['paper_paras'] = $this->Pilotpaper_model->get_paper_paras($id);
		$data['paper_paras'] = $this->Pilotpaper_model->paper_mcqs_paras2($id);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/pilotpaper_view_key2');
		$this->load->view('admin/includes/_footer');
	}	
	
	public function indiv_erqs_view2($id=0)
	{
		$data['title'] = 'Individual ERQ';
		$data['paper_erqs'] = $this->Pilotpaper_model->get_paper_erqs2($id);
		if(empty($data['paper_erqs']))
		{
			$this->session->set_flashdata('error', 'No ERQ item found!');
			redirect(base_url('admin/pilotpaper/'));
		}
		else
		{
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/pilotpaper/pilotpaper_view_erq_indiv', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	///////////////////////////////////////////////
	public function pilot_result_summary()
	{
		$data['title'] = 'Pilot Result Summary';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_result'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
			$data['result_subjects'] = $this->Pilotpaper_model->get_pilot_result_summary_subjects_by_grade($data['item_grade_id'],1);
        }
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/pilotpaper/pilot_view_result_summary');
		$this->load->view('admin/includes/_footer');
	}
	
	public function pilot_crq_result_summary()
	{
		$data['title'] = 'Pilot Result Summary';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_result'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
			$data['result_subjects'] = $this->Pilotpaper_model->get_pilot_crq_result_summary_subjects_by_grade($data['item_grade_id'],1);
        }
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/pilotpaper/pilot_view_crq_result_summary');
		$this->load->view('admin/includes/_footer');
	}
	
	public function generatepilotpaper()
	{
		//die('123');
		$data['title'] = 'Generate Pilot Paper';
		$subjectList = $this->session->userdata('subjects_ids');
		$data['records'] = $this->Pilotpaper_model->get_Pilot_Stats_genratepaper($subjectList);
		$data['paper1'] = $this->Pilotpaper_model->get_Pilot_Paper_Phase($subjectList,1);
		$data['paper1erq'] = $this->Pilotpaper_model->get_Pilot_Paper_CRQ_Phase($subjectList,1);
		
		$crqpapersubjectids = $this->Pilotpaper_model->get_pilot_paper_CRQ_subjects(1);
		
		$res_ary = array();
		if(is_array($crqpapersubjectids)){
			foreach($crqpapersubjectids as $ary){
				$res_ary[]=$ary['c_subject_id'];
			}
		}
		$data['crqpapersubjectids'] = $res_ary;
		
		$mcqpapersubjectids = $this->Pilotpaper_model->get_pilot_paper_MCQ_subjects(1);
		
		$res_arymcq = array();
		if(is_array($mcqpapersubjectids)){
			foreach($mcqpapersubjectids as $ary){
				$res_arymcq[]=$ary['p_subject_id'];
			}
		}
		
		$data['mcqpapersubjectids'] = $res_arymcq;

		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/pilotpaper/generatepilotpaper');
		$this->load->view('admin/includes/_footer');
	}
	public function generatemcqs() {
		if ( $this->input->post( 'submit' ) ) {
			//die('In generate mcq');
			$this->form_validation->set_rules( 'noofversions', 'No of Versions', 'trim|required' );
			
			if ( $this->form_validation->run() == FALSE ) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata( 'errors', $data[ 'errors' ] );
				redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ), 'refresh' );
			} else {
				
				$englishurdu_subjects = [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48];
				if(in_array($this->input->post( 'subjectid' ),$englishurdu_subjects))
				{
					$noofversions = $this->input->post( 'noofversions' )*2;
					$paraitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ));
					
					$paraids = $this->Pilotpaper_model->get_para_ids($this->input->post( 'subjectid' ));
					
					$pitemids = 0;
					$totalparaitems = 0;
					if($paraitemids['para_items'])
					{
						$pitemids = $paraitemids['para_items'];
						$temp = explode(',',$pitemids);
						$totalparaitems = count($temp);
					}
					
					$ind_mcq_ids = $this->Pilotpaper_model->get_ind_mcq_ids($pitemids, $this->input->post( 'subjectid' ));
					
					
					/*para distribution*/
					$para_ids = 0;
					if($paraids['para_ids']){
						$para_ids = explode(',',$paraids['para_ids']);	
					}
					
					$pv1=[];
					$pv2=[];
					$pv3=[];
					$pv4=[];
					$pv5=[];
					$pv6=[];
					$pv7=[];
					$pv8=[];	
					$pv9=[];
					$pv10=[];
                    
                    $pv11=[];
					$pv12=[];
					$pv13=[];
					$pv14=[];
					$pv15=[];
					$pv16=[];
					$pv17=[];
					$pv18=[];	
					$pv19=[];
					$pv20=[];
					for($i = 0; $i < count($para_ids); $i++)
					{	
						if($i%$noofversions==0)
						{
							$pv1[] = $para_ids[$i]; 
						}
						if($i%$noofversions==1)
						{
							$pv2[] =  $para_ids[$i];  
						}
						if($i%$noofversions==2)
						{
							$pv3[] =  $para_ids[$i];  
						}
						if($i%$noofversions==3)
						{
							$pv4[] =  $para_ids[$i];  
						}
						if($i%$noofversions==4)
						{
							$pv5[] =  $para_ids[$i];  
						}
						if($i%$noofversions==5)
						{
							$pv6[] =  $para_ids[$i];  
						}
						if($i%$noofversions==6)
						{
							$pv7[] =  $para_ids[$i];  
						}
						if($i%$noofversions==7)
						{
							$pv8[] =  $para_ids[$i];  
						}
						if($i%$noofversions==8)
						{
							$pv9[] =  $para_ids[$i]; 
						}
						if($i%$noofversions==9)
						{
							$pv10[] =  $para_ids[$i];							
						}
                        
                        if($i%$noofversions==10)
						{
							$pv11[] = $para_ids[$i]; 
						}
						if($i%$noofversions==11)
						{
							$pv12[] =  $para_ids[$i];  
						}
						if($i%$noofversions==12)
						{
							$pv13[] =  $para_ids[$i];  
						}
						if($i%$noofversions==13)
						{
							$pv14[] =  $para_ids[$i];  
						}
						if($i%$noofversions==14)
						{
							$pv15[] =  $para_ids[$i];  
						}
						if($i%$noofversions==15)
						{
							$pv16[] =  $para_ids[$i];  
						}
						if($i%$noofversions==16)
						{
							$pv17[] =  $para_ids[$i];  
						}
						if($i%$noofversions==17)
						{
							$pv18[] =  $para_ids[$i];  
						}
						if($i%$noofversions==18)
						{
							$pv19[] =  $para_ids[$i]; 
						}
						if($i%$noofversions==19)
						{
							$pv20[] =  $para_ids[$i];							
						}
					}
					/*print "<pre>";
					print $totalparaitems;
					print_r($pv1);
					die('In generate english urdu mcq');*/
					$itemids = 0;
					if($ind_mcq_ids['item_ids']){
						$itemids = explode(',',$ind_mcq_ids['item_ids']);	
					}
					$p_m_v1_para_count_ids = $p_m_v2_para_count_ids = $p_m_v3_para_count_ids = $p_m_v4_para_count_ids = $p_m_v5_para_count_ids = $p_m_v6_para_count_ids = $p_m_v7_para_count_ids = $p_m_v8_para_count_ids = $p_m_v9_para_count_ids = $p_m_v10_para_count_ids = 0;
                    
                    $p_m_v11_para_count_ids = $p_m_v12_para_count_ids = $p_m_v13_para_count_ids = $p_m_v14_para_count_ids = $p_m_v15_para_count_ids = $p_m_v16_para_count_ids = $p_m_v17_para_count_ids = $p_m_v18_para_count_ids = $p_m_v19_para_count_ids = $p_m_v20_para_count_ids = 0;
					$v1=[];
					$v2=[];
					$v3=[];
					$v4=[];
					$v5=[];
					$v6=[];
					$v7=[];
					$v8=[];	
					$v9=[];
					$v10=[];
                    
                    $v11=[];
					$v12=[];
					$v13=[];
					$v14=[];
					$v15=[];
					$v16=[];
					$v17=[];
					$v18=[];	
					$v19=[];
					$v20=[];
					for($i = 0; $i < count($itemids); $i++)
					{	
						if($i%$noofversions==0)
						{
							$v1[] = $itemids[$i]; 
						}
						if($i%$noofversions==1)
						{
							$v2[] =  $itemids[$i];  
						}
						if($i%$noofversions==2)
						{
							$v3[] =  $itemids[$i];  
						}
						if($i%$noofversions==3)
						{
							$v4[] =  $itemids[$i];  
						}
						if($i%$noofversions==4)
						{
							$v5[] =  $itemids[$i];  
						}
						if($i%$noofversions==5)
						{
							$v6[] =  $itemids[$i];  
						}
						if($i%$noofversions==6)
						{
							$v7[] =  $itemids[$i];  
						}
						if($i%$noofversions==7)
						{
							$v8[] =  $itemids[$i];  
						}
						if($i%$noofversions==8)
						{
							$v9[] =  $itemids[$i]; 
						}
						if($i%$noofversions==9)
						{
							$v10[] =  $itemids[$i]; 							
						}
                        
                        if($i%$noofversions==10)
						{
							$v11[] = $itemids[$i]; 
						}
						if($i%$noofversions==11)
						{
							$v12[] =  $itemids[$i];  
						}
						if($i%$noofversions==12)
						{
							$v13[] =  $itemids[$i];  
						}
						if($i%$noofversions==13)
						{
							$v14[] =  $itemids[$i];  
						}
						if($i%$noofversions==14)
						{
							$v15[] =  $itemids[$i];  
						}
						if($i%$noofversions==15)
						{
							$v16[] =  $itemids[$i];  
						}
						if($i%$noofversions==16)
						{
							$v17[] =  $itemids[$i];  
						}
						if($i%$noofversions==17)
						{
							$v18[] =  $itemids[$i];  
						}
						if($i%$noofversions==18)
						{
							$v19[] =  $itemids[$i]; 
						}
						if($i%$noofversions==19)
						{

							$v20[] =  $itemids[$i]; 							

						}

					}

					

					$distrarr = [];

                    $distrarr2 = [];

					if(!empty($v1)) 

					{

						$pvitemids = 0;

						if(!empty($pv1))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv1));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v1_para_count_ids = count($pvitemids);

						}

						$distrarr[]=count($v1)+count($pvitemids);						

					}

					if(!empty($v2)) 

					{

						$pvitemids = 0;

						if(!empty($pv2))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv2));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }

                            $p_m_v2_para_count_ids = count($pvitemids);							

						}

						

						$distrarr2[]=count($v2)+count($pvitemids);

					}

					if(!empty($v3)) 

					{

						$pvitemids = 0;

						if(!empty($pv3))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv3));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v3_para_count_ids = count($pvitemids);						

						}

						

						$distrarr[]=count($v3)+count($pvitemids);

					}

					if(!empty($v4)) 

					{

						$pvitemids = 0;

						if(!empty($pv4))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv4));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }

                            $p_m_v4_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v4)+count($pvitemids);

					}

					if(!empty($v5)) 

					{

						$pvitemids = 0;

						if(!empty($pv5))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv5));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v5_para_count_ids = count($pvitemids);						

						}

						

						$distrarr[]=count($v5)+count($pvitemids);

					}

					if(!empty($v6)) 

					{

						$pvitemids = 0;

						if(!empty($pv6))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv6));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v6_para_count_ids = count($pvitemids);						

						}

						

						$distrarr2[]=count($v6)+count($pvitemids);

					}

					if(!empty($v7)) 

					{

						$pvitemids = 0;

						if(!empty($pv7))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv7));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v7_para_count_ids = count($pvitemids);

						}

						

						$distrarr[]=count($v7)+count($pvitemids);

					}

					if(!empty($v8)) 

                    {

						$pvitemids = 0;

						if(!empty($pv8))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv8));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v8_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v8)+count($pvitemids);

					}

					if(!empty($v9)) 

					{

						$pvitemids = 0;

						if(!empty($pv9))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv9));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v9_para_count_ids = count($pvitemids);

						}

						

						$distrarr[]=count($v9)+count($pvitemids);

					}

					if(!empty($v10)) 

					{

						$pvitemids = 0;

						if(!empty($pv10))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv10));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v10_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v10)+count($pvitemids);

					}

                    

                    if(!empty($v11)) 

					{

						$pvitemids = 0;

						if(!empty($pv11))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv11));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }

                            $p_m_v11_para_count_ids = count($pvitemids);

						}

						

						$distrarr[]=count($v11)+count($pvitemids);						

					}

					if(!empty($v12)) 

					{

						$pvitemids = 0;

						if(!empty($pv12))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv12));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }		

                            $p_m_v12_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v12)+count($pvitemids);

					}

					if(!empty($v13)) 

					{

						$pvitemids = 0;

						if(!empty($pv13))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv13));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v13_para_count_ids = count($pvitemids);

						}

						

						$distrarr[]=count($v13)+count($pvitemids);

					}

					if(!empty($v14)) 

					{

						$pvitemids = 0;

						if(!empty($pv14))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv14));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }		

                            $p_m_v14_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v14)+count($pvitemids);

					}

					if(!empty($v15)) 

					{

						$pvitemids = 0;

						if(!empty($pv15))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv15));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }			

                            $p_m_v15_para_count_ids = count($pvitemids);

						}

						

						$distrarr[]=count($v15)+count($pvitemids);

					}

					if(!empty($v16)) 

					{

						$pvitemids = 0;

						if(!empty($pv16))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv16));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }		

                            $p_m_v16_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v16)+count($pvitemids);

					}

					if(!empty($v17)) 

					{

						$pvitemids = 0;

						if(!empty($pv17))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv17));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v17_para_count_ids = count($pvitemids);

						}

						

						$distrarr[]=count($v17)+count($pvitemids);

					}

					if(!empty($v18)) 

                    {

						$pvitemids = 0;

						if(!empty($pv18))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv18));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v18_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v18)+count($pvitemids);

					}

					if(!empty($v19)) 

					{

						$pvitemids = 0;

						if(!empty($pv19))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv19));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }	

                            $p_m_v19_para_count_ids = count($pvitemids);

						}

						

						$distrarr[]=count($v19)+count($pvitemids);

					}

					if(!empty($v20)) 

					{

						$pvitemids = 0;

						if(!empty($pv20))

						{

							$pvitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ), implode(',',$pv20));

							if(!empty($pvitemids) && $pvitemids['para_items'] != NULL){

								$pvitemids = explode(',',$pvitemids['para_items']);	

							}

                            else{

                                $pvitemids = [];

                            }			

                            $p_m_v20_para_count_ids = count($pvitemids);

						}

						

						$distrarr2[]=count($v20)+count($pvitemids);

					}

					

					$p_m_versions_distr = '';

					$noofversionsgenerated = '';

					if(!empty($distrarr))

					{

						$p_m_versions_distr = implode(',',$distrarr);

						$noofversionsgenerated = count($distrarr);

					}

                    

                    $p_m_versions_distr2 = '';

					$noofversionsgenerated2 = '';

					if(!empty($distrarr2))

					{

						$p_m_versions_distr2 = implode(',',$distrarr2);

						$noofversionsgenerated2 = count($distrarr2);

					}

					//print $p_m_versions_distr;

					//die('===');

					$data = [

						'p_phase' => 1,

						'p_grade_id' 		=> $this->input->post( 'gradeid' ),

						'p_subject_id' 		=> $this->input->post( 'subjectid' ),

						'p_m_ind_num_mcqs' 	=> ceil($ind_mcq_ids['totalids']/2),

						'p_m_num_paragraphs'=> $this->input->post( 'Pilot_Paragraphs' ),

						'p_m_paras_ids' 	=> $paraids['para_ids'],

						'p_m_num_mcqs_para' => $totalparaitems,

						

						'p_m_versions' 		=> $noofversionsgenerated,

						'p_m_versions_distr' => $p_m_versions_distr,

						'p_m_v1_mcq_ids'	=> implode(',', $v1),

						'p_m_v2_mcq_ids'	=> implode(',', $v3),

						'p_m_v3_mcq_ids'	=> implode(',', $v5),

						'p_m_v4_mcq_ids'	=> implode(',', $v7),

						'p_m_v5_mcq_ids'	=> implode(',', $v9),

						'p_m_v6_mcq_ids'	=> implode(',', $v11),

						'p_m_v7_mcq_ids'	=> implode(',', $v13),

						'p_m_v8_mcq_ids'	=> implode(',', $v15),

						'p_m_v9_mcq_ids'	=> implode(',', $v17),

						'p_m_v10_mcq_ids'	=> implode(',', $v19),

						

						'p_m_v1_para_ids'	=> implode(',', $pv1),

						'p_m_v2_para_ids'	=> implode(',', $pv3),

						'p_m_v3_para_ids'	=> implode(',', $pv5),

						'p_m_v4_para_ids'	=> implode(',', $pv7),

						'p_m_v5_para_ids'	=> implode(',', $pv9),

						'p_m_v6_para_ids'	=> implode(',', $pv11),

						'p_m_v7_para_ids'	=> implode(',', $pv13),

						'p_m_v8_para_ids'	=> implode(',', $pv15),

						'p_m_v9_para_ids'	=> implode(',', $pv17),

						'p_m_v10_para_ids'	=> implode(',', $pv19),

						

						'p_m_v1_para_count_ids' => $p_m_v1_para_count_ids,

						'p_m_v2_para_count_ids' => $p_m_v3_para_count_ids,

						'p_m_v3_para_count_ids' => $p_m_v5_para_count_ids,

						'p_m_v4_para_count_ids' => $p_m_v7_para_count_ids,

						'p_m_v5_para_count_ids' => $p_m_v9_para_count_ids,

						'p_m_v6_para_count_ids' => $p_m_v11_para_count_ids,

						'p_m_v7_para_count_ids' => $p_m_v13_para_count_ids,

						'p_m_v8_para_count_ids' => $p_m_v15_para_count_ids,

						'p_m_v9_para_count_ids' => $p_m_v17_para_count_ids,

						'p_m_v10_para_count_ids' => $p_m_v19_para_count_ids,

						

						'p_m_v1_para_items' => '',

						'p_m_v2_para_items' => '',

						'p_m_v3_para_items' => '',

						'p_m_v4_para_items' => '',

						'p_m_v5_para_items' => '',

						'p_m_v6_para_items' => '',

						'p_m_v7_para_items' => '',

						'p_m_v8_para_items' => '',

						'p_m_v9_para_items' => '',

						'p_m_v10_para_items' => '',

						

						'p_m_total_mcqs' => ceil($this->input->post( 'MCQ_Items' )/2),

					];

                    

                    $data2 = [

						'p_phase' => 2,

						'p_grade_id' 		=> $this->input->post( 'gradeid' ),

						'p_subject_id' 		=> $this->input->post( 'subjectid' ),

						'p_m_ind_num_mcqs' 	=> floor($ind_mcq_ids['totalids']/2),

						'p_m_num_paragraphs'=> $this->input->post( 'Pilot_Paragraphs' ),

						'p_m_paras_ids' 	=> $paraids['para_ids'],

						'p_m_num_mcqs_para' => $totalparaitems,

						

						'p_m_versions' 		=> $noofversionsgenerated2,

						'p_m_versions_distr' => $p_m_versions_distr2,

						'p_m_v1_mcq_ids'	=> implode(',', $v2),

						'p_m_v2_mcq_ids'	=> implode(',', $v4),

						'p_m_v3_mcq_ids'	=> implode(',', $v6),

						'p_m_v4_mcq_ids'	=> implode(',', $v8),

						'p_m_v5_mcq_ids'	=> implode(',', $v10),

						'p_m_v6_mcq_ids'	=> implode(',', $v12),

						'p_m_v7_mcq_ids'	=> implode(',', $v14),

						'p_m_v8_mcq_ids'	=> implode(',', $v16),

						'p_m_v9_mcq_ids'	=> implode(',', $v18),

						'p_m_v10_mcq_ids'	=> implode(',', $v20),

						

						'p_m_v1_para_ids'	=> implode(',', $pv2),

						'p_m_v2_para_ids'	=> implode(',', $pv4),

						'p_m_v3_para_ids'	=> implode(',', $pv6),

						'p_m_v4_para_ids'	=> implode(',', $pv8),

						'p_m_v5_para_ids'	=> implode(',', $pv10),

						'p_m_v6_para_ids'	=> implode(',', $pv12),

						'p_m_v7_para_ids'	=> implode(',', $pv14),

						'p_m_v8_para_ids'	=> implode(',', $pv16),

						'p_m_v9_para_ids'	=> implode(',', $pv18),

						'p_m_v10_para_ids'	=> implode(',', $pv20),

						

						'p_m_v1_para_count_ids' => $p_m_v2_para_count_ids,

						'p_m_v2_para_count_ids' => $p_m_v4_para_count_ids,

						'p_m_v3_para_count_ids' => $p_m_v6_para_count_ids,

						'p_m_v4_para_count_ids' => $p_m_v8_para_count_ids,

						'p_m_v5_para_count_ids' => $p_m_v10_para_count_ids,

						'p_m_v6_para_count_ids' => $p_m_v12_para_count_ids,

						'p_m_v7_para_count_ids' => $p_m_v14_para_count_ids,

						'p_m_v8_para_count_ids' => $p_m_v16_para_count_ids,

						'p_m_v9_para_count_ids' => $p_m_v18_para_count_ids,

						'p_m_v10_para_count_ids' => $p_m_v20_para_count_ids,

						

						'p_m_v1_para_items' => '',

						'p_m_v2_para_items' => '',

						'p_m_v3_para_items' => '',

						'p_m_v4_para_items' => '',

						'p_m_v5_para_items' => '',

						'p_m_v6_para_items' => '',

						'p_m_v7_para_items' => '',

						'p_m_v8_para_items' => '',

						'p_m_v9_para_items' => '',

						'p_m_v10_para_items' => '',

						

						'p_m_total_mcqs' => floor($this->input->post( 'MCQ_Items' )/2),

					];

					

					$result = $this->db->insert('ci_pilot_papers_mcqs', $data);

                    $result2 = $this->db->insert('ci_pilot_papers_mcqs', $data2);

					if ( $result ) {

						//die($this->db->last_query());

						$this->session->set_flashdata( 'success', 'Paper has been successfully generated!' );

						redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

					}

				

					

				}

				else{ 

					$noofversions = $this->input->post( 'noofversions' );

					$totalmcq_items = $this->input->post( 'MCQ_Items' );

					$distr = array();

					

					$all_mcq_ids_phase1 = $this->Pilotpaper_model->get_ind_mcq_ids_by_phase(0, $this->input->post( 'subjectid' ),1);

                    $all_mcq_ids_phase2 = $this->Pilotpaper_model->get_ind_mcq_ids_by_phase(0, $this->input->post( 'subjectid' ),2);

                    

                    //print '<pre>'; print_r($all_mcq_ids_phase1); //die('====');

                    //print '<pre>'; print_r($all_mcq_ids_phase2); die('====');

					$itemids = 0;

                    

					if($all_mcq_ids_phase1['item_ids']){

						$itemids = explode(',',$all_mcq_ids_phase1['item_ids']);	

					}

					

					$v1=[];

					$v2=[];

					$v3=[];

					$v4=[];

					$v5=[];

					$v6=[];

					$v7=[];

					$v8=[];	

					$v9=[];

					$v10=[];

                    

					for($i = 0; $i < count($itemids); $i++)

					{	

						if($i%$noofversions==0)

						{

							$v1[] = $itemids[$i]; 

						}

						if($i%$noofversions==1)

						{

							$v2[] =  $itemids[$i];  

						}

						if($i%$noofversions==2)

						{

							$v3[] =  $itemids[$i];  

						}

						if($i%$noofversions==3)

						{

							$v4[] =  $itemids[$i];  

						}

						if($i%$noofversions==4)

						{

							$v5[] =  $itemids[$i];  

						}

						if($i%$noofversions==5)

						{

							$v6[] =  $itemids[$i];  

						}

						if($i%$noofversions==6)

						{

							$v7[] =  $itemids[$i];  

						}

						if($i%$noofversions==7)

						{

							$v8[] =  $itemids[$i];  

						}

						if($i%$noofversions==8)

						{

							$v9[] =  $itemids[$i]; 

						}

						if($i%$noofversions==9)

						{

							$v10[] =  $itemids[$i];							

						}

					}

					

					$distrarr = [];

					if(!empty($v1)) $distrarr[]=count($v1);

					if(!empty($v2)) $distrarr[]=count($v2);

					if(!empty($v3)) $distrarr[]=count($v3);

					if(!empty($v4)) $distrarr[]=count($v4);

					if(!empty($v5)) $distrarr[]=count($v5);

					if(!empty($v6)) $distrarr[]=count($v6);

					if(!empty($v7)) $distrarr[]=count($v7);

					if(!empty($v8)) $distrarr[]=count($v8);

					if(!empty($v9)) $distrarr[]=count($v9);

					if(!empty($v10)) $distrarr[]=count($v10);

					

					$p_m_versions_distr = '';

					$noofversionsgenerated = '';

					if(!empty($distrarr))

					{

						$p_m_versions_distr = implode(',',$distrarr);

						$noofversionsgenerated = count($distrarr);

					}

                    

                    $data = [

						'p_phase' => 1,

						'p_grade_id' 		=> $this->input->post( 'gradeid' ),

						'p_subject_id' 		=> $this->input->post( 'subjectid' ),

						'p_m_ind_num_mcqs' 	=> count($itemids),

						'p_m_total_mcqs' 	=> count($itemids),

						'p_m_versions' 		=> $noofversionsgenerated,

						'p_m_versions_distr' => $p_m_versions_distr,

						'p_m_v1_mcq_ids'	=> implode(',', $v1),

						'p_m_v2_mcq_ids'	=> implode(',', $v2),

						'p_m_v3_mcq_ids'	=> implode(',', $v3),

						'p_m_v4_mcq_ids'	=> implode(',', $v4),

						'p_m_v5_mcq_ids'	=> implode(',', $v5),

						'p_m_v6_mcq_ids'	=> implode(',', $v6),

						'p_m_v7_mcq_ids'	=> implode(',', $v7),

						'p_m_v8_mcq_ids'	=> implode(',', $v8),

						'p_m_v9_mcq_ids'	=> implode(',', $v9),

						'p_m_v10_mcq_ids'	=> implode(',', $v10),

					];

                    

                    $itemids = 0;

                    

					if($all_mcq_ids_phase2['item_ids']){

						$itemids = explode(',',$all_mcq_ids_phase2['item_ids']);	

					}

					

					$v1=[];

					$v2=[];

					$v3=[];

					$v4=[];

					$v5=[];

					$v6=[];

					$v7=[];

					$v8=[];	

					$v9=[];

					$v10=[];

                    

					for($i = 0; $i < count($itemids); $i++)

					{	

						if($i%$noofversions==0)

						{

							$v1[] = $itemids[$i]; 

						}

						if($i%$noofversions==1)

						{

							$v2[] =  $itemids[$i];  

						}

						if($i%$noofversions==2)

						{

							$v3[] =  $itemids[$i];  

						}

						if($i%$noofversions==3)

						{

							$v4[] =  $itemids[$i];  

						}

						if($i%$noofversions==4)

						{

							$v5[] =  $itemids[$i];  

						}

						if($i%$noofversions==5)

						{

							$v6[] =  $itemids[$i];  

						}

						if($i%$noofversions==6)

						{

							$v7[] =  $itemids[$i];  

						}

						if($i%$noofversions==7)

						{

							$v8[] =  $itemids[$i];  

						}

						if($i%$noofversions==8)

						{

							$v9[] =  $itemids[$i]; 

						}

						if($i%$noofversions==9)

						{

							$v10[] =  $itemids[$i];							

						}

					}

					

					$distrarr = [];

					if(!empty($v1)) $distrarr[]=count($v1);

					if(!empty($v2)) $distrarr[]=count($v2);

					if(!empty($v3)) $distrarr[]=count($v3);

					if(!empty($v4)) $distrarr[]=count($v4);

					if(!empty($v5)) $distrarr[]=count($v5);

					if(!empty($v6)) $distrarr[]=count($v6);

					if(!empty($v7)) $distrarr[]=count($v7);

					if(!empty($v8)) $distrarr[]=count($v8);

					if(!empty($v9)) $distrarr[]=count($v9);

					if(!empty($v10)) $distrarr[]=count($v10);

					

					$p_m_versions_distr = '';

					$noofversionsgenerated = '';

					if(!empty($distrarr))

					{

						$p_m_versions_distr = implode(',',$distrarr);

						$noofversionsgenerated = count($distrarr);

					}

					

                    $data2 = [

						'p_phase' => 2,

						'p_grade_id' 		=> $this->input->post( 'gradeid' ),

						'p_subject_id' 		=> $this->input->post( 'subjectid' ),

						'p_m_ind_num_mcqs' 	=> count($itemids),

						'p_m_total_mcqs' 	=> count($itemids),

						'p_m_versions' 		=> $noofversionsgenerated,

						'p_m_versions_distr' => $p_m_versions_distr,

						'p_m_v1_mcq_ids'	=> implode(',', $v1),

						'p_m_v2_mcq_ids'	=> implode(',', $v2),

						'p_m_v3_mcq_ids'	=> implode(',', $v3),

						'p_m_v4_mcq_ids'	=> implode(',', $v4),

						'p_m_v5_mcq_ids'	=> implode(',', $v5),

						'p_m_v6_mcq_ids'	=> implode(',', $v6),

						'p_m_v7_mcq_ids'	=> implode(',', $v7),

						'p_m_v8_mcq_ids'	=> implode(',', $v8),

						'p_m_v9_mcq_ids'	=> implode(',', $v9),

						'p_m_v10_mcq_ids'	=> implode(',', $v10),

					];

					

					$result = $this->db->insert('ci_pilot_papers_mcqs', $data);

                    $result2 = $this->db->insert('ci_pilot_papers_mcqs', $data2);

					if ( $result ) {

						//die($this->db->last_query());

						$this->session->set_flashdata( 'success', 'Paper has been successfully generated!' );

						redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

					}

				}

			

			}

		} else {

			redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

		}

	}

	

	public function generatecrqs() {

		if ( $this->input->post( 'submit' ) ) {

			

			$this->form_validation->set_rules( 'gradeid', 'Grade Id', 'trim|required' );

			

			if ( $this->form_validation->run() == FALSE ) {

				$data = array(

					'errors' => validation_errors()

				);

				$this->session->set_flashdata( 'errors', $data[ 'errors' ] );

				redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ), 'refresh' );

			} 

			else 

			{

				$englishurdu_subjects = [4,8,12,18,25,31,39,47,5,9,13,19,26,32,40,48];

				if(in_array($this->input->post( 'subjectid' ),$englishurdu_subjects))

				{

					$paraitemids = $this->Pilotpaper_model->get_para_items_ids($this->input->post( 'subjectid' ));

					

					$paraids = $this->Pilotpaper_model->get_para_ids($this->input->post( 'subjectid' ));

					

					$pitemids = 0;

					if($paraitemids['para_items'])

					{

						$pitemids = $paraitemids['para_items'];

					}

					

					$ind_crq_ids = $this->Pilotpaper_model->get_ind_crq_ids(0, $this->input->post( 'subjectid' ));

					

                    $phasePara1 = [];

                    $phasePara2 = [];

                    if($paraids['para_items'])

					{

                        $tempPara = explode(',',$paraids['para_items']);

                        //print '<pre>';print_r(tempPara); die('===');

                        for($i = 0; $i < count($tempPara); $i++)

                        {

                            if($i%2==0)

                            {

                                $phasePara1[] = $tempPara[$i]; 

                            }

                            if($i%2==1)

                            {

                                $phasePara2[] =  $tempPara[$i];  

                            }

                        }

                    }

                    

                    $phaseInd1 = [];

                    $phaseInd2 = [];

                    if($ind_crq_ids['item_ids'])

                    {

                        $tempInd = explode(',',$ind_crq_ids['item_ids']);

                        for($i = 0; $i < count($tempInd); $i++)

                        {

                            if($i%2==0)

                            {

                                $phaseInd1[] = $tempInd[$i]; 

                            }

                            if($i%2==1)

                            {

                                $phaseInd2[] =  $tempInd[$i];  

                            }

                        }

                    }

                    //print "<pre>";

					//print_r($ind_crq_ids);

					//die('In generate crq');

					

					$data = [

						'c_phase' => 1,

						'c_grade_id' 		=> $this->input->post( 'gradeid' ),

						'c_subject_id' 		=> $this->input->post( 'subjectid' ),

						'c_group_count' 	=> 0,

						'c_group_ids' 		=> 0,

						'c_para_count' 		=> 0,

						'c_para_ids' 		=> 0,

						'c_ind_crq_count' 	=> ceil($ind_crq_ids['totalids']/2),

						'c_ind_crq_ids' 	=> implode(',',$phaseInd1),

						'c_m_total_erq' 	=> ceil($this->input->post( 'c_m_total_erq' )/2),

					];

                    

                    $data2 = [

						'c_phase' => 2,

						'c_grade_id' 		=> $this->input->post( 'gradeid' ),

						'c_subject_id' 		=> $this->input->post( 'subjectid' ),

						'c_group_count' 	=> 0,

						'c_group_ids' 		=> 0,

						'c_para_count' 		=> 0,

						'c_para_ids' 		=> 0,

						'c_ind_crq_count' 	=> floor($ind_crq_ids['totalids']/2),

						'c_ind_crq_ids' 	=> implode(',',$phaseInd2),

						'c_m_total_erq' 	=> floor($this->input->post( 'c_m_total_erq' )/2),

					];

					

					$result = $this->db->insert('ci_pilot_papers_crqs', $data);

                    $result2 = $this->db->insert('ci_pilot_papers_crqs', $data2);

					if ( $result ) {

						//die($this->db->last_query());

						$this->session->set_flashdata( 'success', 'Paper has been successfully generated!' );

						redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

					}

				

					

				}

				else{

					$groupitemids_phase1 = $this->Pilotpaper_model->get_group_items_ids_byphase($this->input->post( 'subjectid' ),1);

					$groupitemids_phase2 = $this->Pilotpaper_model->get_group_items_ids_byphase($this->input->post( 'subjectid' ),2);

					

					$groupids_phase1 = $this->Pilotpaper_model->get_group_ids_byphase($this->input->post( 'subjectid' ), 1);

					$groupids_phase2 = $this->Pilotpaper_model->get_group_ids_byphase($this->input->post( 'subjectid' ), 2);

					

					//print '<pre>'; print_r($groupids_phase1); print '<pre>'; print_r($groupids_phase2);die;

					$groupitemids = $this->Pilotpaper_model->get_group_items_ids($this->input->post( 'subjectid' ));

					$ind_crq_ids_phase1 = $this->Pilotpaper_model->get_ind_crq_ids_byphase($groupitemids['group_items'], $this->input->post( 'subjectid' ), 1);

					$ind_crq_ids_phase2 = $this->Pilotpaper_model->get_ind_crq_ids_byphase($groupitemids['group_items'], $this->input->post( 'subjectid' ), 2);

                    

                   //print '<pre>'; print_r($groupitemids_phase1); print '<pre>'; print_r($groupids_phase2);die;

					//print "<pre>";

					//print_r($ind_crq_ids);

					//die('In generate crq');

					

					$data = [

						'c_phase' => 1,

						'c_grade_id' 		=> $this->input->post( 'gradeid' ),

						'c_subject_id' 		=> $this->input->post( 'subjectid' ),

						'c_group_count' 	=> count(explode(',',$groupids_phase1['group_ids'])),

						'c_group_ids' 		=> $groupids_phase1['group_ids'],

						'c_para_count' 		=> 0,

						'c_para_ids' 		=> '',

						'c_ind_crq_count' 	=> $ind_crq_ids_phase1['totalids'],

						'c_ind_crq_ids' 	=> $ind_crq_ids_phase1['item_ids'],

						'c_m_total_erq' 	=> count(explode(',',$groupitemids_phase1['group_items'])),

					];

                    

                    $data2 = [

						'c_phase' => 2,

						'c_grade_id' 		=> $this->input->post( 'gradeid' ),

						'c_subject_id' 		=> $this->input->post( 'subjectid' ),

						'c_group_count' 	=> count(explode(',',$groupids_phase2['group_ids'])),

						'c_group_ids' 		=> $groupids_phase2['group_ids'],

						'c_para_count' 		=> 0,

						'c_para_ids' 		=> '',

						'c_ind_crq_count' 	=> $ind_crq_ids_phase2['totalids'],

						'c_ind_crq_ids' 	=> $ind_crq_ids_phase2['item_ids'],

						'c_m_total_erq' 	=> count(explode(',',$groupitemids_phase2['group_items'])),

					];

					

					$result = $this->db->insert('ci_pilot_papers_crqs', $data);

                    $result2 = $this->db->insert('ci_pilot_papers_crqs', $data2);

					if ( $result ) {

						//die($this->db->last_query());

						$this->session->set_flashdata( 'success', 'Paper has been successfully generated!' );

						redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

					}

				}

			}

		} else {

			redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

		}

	}

	

	public function deletepapercrq($subjectid)

	{

        if($this->session->userdata('role_id')==1){

            $this->db->delete( 'ci_pilot_papers_crqs', array( 'c_subject_id' => $subjectid ) );

            $this->session->set_flashdata( 'success', 'Paper has been deleted successfully!' );

            redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

        }

        else{

            $this->session->set_flashdata( 'error', 'You do not have permission to delete!' );

            redirect( base_url( 'admin/pilotpaper/pilotpaper' ) );

        }

	}

	

	public function deletepapermcq($subjectid)

	{

        if($this->session->userdata('role_id')==1){

            $this->db->delete( 'ci_pilot_papers_mcqs', array( 'p_subject_id' => $subjectid ) );

            $this->session->set_flashdata( 'success', 'Paper has been deleted successfully!' );

            redirect( base_url( 'admin/pilotpaper/generatepilotpaper' ) );

        }

        else{

            $this->session->set_flashdata( 'error', 'You do not have permission to delete!' );

            redirect( base_url( 'admin/pilotpaper/pilotpaper' ) );

        }

	}

	

}

?>