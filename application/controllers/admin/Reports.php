<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Reports_model', 'Reports_model');
		$this->load->model('admin/dashboard_model', 'dashboard_model');
		$this->load->model('admin/Items_model', 'Items_model');
        $this->load->model( 'admin/Itemreviewers_model', 'Itemreviewers_model' );
        $this->load->model( 'admin/Itemwriter_model', 'Itemwriter_model' );
		$this->load->library('datatable'); // loaded my custom serverside datatable library
        $this->load->library('SmithWaterman');
	}
	
	public function items_by_itemwriters()
	{
		$data['title'] = 'Items Writers Wise Items Submission Report';
		$data['items_stats_ss'] = $this->dashboard_model->get_items_stats_iss();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/reports/items_by_itemwriters',$data);
		$this->load->view('admin/includes/_footer');
	}
	
    public function index2()
	{
       echo  $this->smithwaterman->compare("PAKISTAN TIMES PEOPLES can win match","PAKISTAN TIMES PEOPLES win match"); 
        //$this->smithwaterman();
        //echo $o->compare("LEGENDARY","BARNEY STINSON");
    }
    /*******************************************************************************
    *       Item reviewer profiler report start here
    ***********************************************************************************/
    
    public function rep_item_reviewer_profile(){
        
        $data['title'] = 'Item Reviewer Profile Report';
		$data['districts'] = $this->Itemreviewers_model->get_all_districts();
        
        if($this->input->post('get_rep'))
		{	
            $data['district_id'] = ( $this->input->post('district_id') !='' ? $this->input->post('district_id') : 0);
            $data['tehsil_id'] = ( $this->input->post('tehsil_id') != '' ? $this->input->post('tehsil_id') : 0);
            $data['subject'] = ($this->input->post('subject') !='' ? $this->input->post('subject') : 0);
            $data['department'] = ($this->input->post('department') !='' ? $this->input->post('department') : 0);
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('district_id') !='')
			{
               $data['tehsils'] = $this->Itemwriter_model->get_tehsil_by_district($this->input->post('district_id'));
            }
        }
        
        $this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_item_reviewer_profile');
		$this->load->view('admin/includes/_footer');
    }
    public function itemreviewer_jason($search_parm=0){
        $records =array();
		$records = $this->Itemreviewers_model->get_item_reviewer_jason($search_parm);
		//print_r($records);
       // exit();
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
				++$i,
                $row['ci_ir_name'],
                 '<img alt="Item Reviewer" src="'.base_url().$row['ci_ir_picture'].'" width="80" height="80">',          
				$row['username'],
                $row['ci_ir_mobile'],
                $row['ci_ir_dob'] ,
                $row['ci_ir_cnic'],
                $row['ci_ir_subject'],
                $row['district_name_en'],
                $row['tehsil_name_en'],
                '<a  href="#" url="'.base_url().'admin/reports/item_reviewer_info/'.$row['ci_ir_id'].'"><i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
    }
    public function item_reviewer_export($rep_type='CSV',$district_id=0,$tehsil_id=0,$subject=0,$department=0){
        // get data 
        $res_data = $this->Itemreviewers_model->get_item_reviewers($district_id,$tehsil_id,$subject,$department);
        $data['rep_type'] =$rep_type;
        $data['res_data'] = $res_data; 
        $this->load->view('admin/reports/item_reviewer_export', $data);
    }
    public function item_reviewer_info($ci_ir_id){
        
         $data['title'] = 'Item Reviewer Profile';
         $data['ci_ir_id'] = $ci_ir_id;
         $res_data = $this->Itemreviewers_model->item_reviewer_info_byid($ci_ir_id);
         $data['res_data'] = $res_data; 
         $this->load->view('admin/includes/_header',$data);
		 $this->load->view('admin/reports/item_reviewer_info');
		 $this->load->view('admin/includes/_footer');
        
        
    }
    
    /******************** END Item Reviewer ******************************************/
    
	public function rep_cstrands()
	{
		$data['title'] = 'Content Strands Report';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
            $data['item_cstand_id'] = ($this->input->post('item_cstand_id') !='' ? $this->input->post('item_cstand_id') : 0);
            $data['item_subcstand_id'] = ($this->input->post('item_subcstand_id') !='' ? $this->input->post('item_subcstand_id') : 0);
            $data['item_slo_id'] = ($this->input->post('item_slo_id') !='' ? $this->input->post('item_slo_id') : 0);
            
            
            $data['item_cycle'] = ($this->input->post('item_cycle') !='' ? $this->input->post('item_cycle') : 0);
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            }
            if($this->input->post('item_subject_id') !=''){
               $data['content_strands'] = $this->Items_model->get_cstands_by_subject($this->input->post('item_subject_id'));
                
            }
            if($this->input->post('item_cstand_id') !=''){
               $data['subcontent_strands'] = $this->Items_model->get_subcstands_by_cstand($this->input->post('item_cstand_id'));
                
            }  
            if($this->input->post('item_subcstand_id') !=''){
               $data['slos'] = $this->Items_model->get_slos_by_subcstands($this->input->post('item_subcstand_id'));
                
            } 
            
        }
            
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_content_strands');
		$this->load->view('admin/includes/_footer');
	}
    public function rep_cstrands_export($rep_type='CSV',$grade=0,$subject=0,$cont_strand=0,$sub_cs=0,$slo_id=0,$item_cycle=0){
        // get data 
        $res_data = $this->Reports_model->get_content_strnds_export($grade,$subject,$cont_strand,$sub_cs,$slo_id,$item_cycle);
        /*if(rep_type=='CSV'){
            $filename = 'contentStrands_'.date('Y-m-d').'.csv'; 
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-Type: application/csv; ");

           // file creation 
            $file = fopen('php://output', 'w');
            $header = array("Grades", "Subjects", "ContentStrands", "Sub-ContentStrands", "Submitted", "Submitted-MCQ", "Submitted ERQ","Ae_Acept1","Ae_Acept1_MCQ","Ae_Acept1_ERQ"); 
            fputcsv($file, $header);
            foreach ($res_data as $key=>$line){ 
                fputcsv($file,$line); 
            }
            fclose($file); 
            exit; 
        }
        elseif(rep_type=='PDF')
        {
           $data['res_data'] = $res_data; 
           $this->load->view('admin/reports/rep_cs_pdf', $data);
        }*/
        $data['rep_type'] =$rep_type;
        $data['item_cycle']=$item_cycle;
         $data['res_data'] = $res_data; 
         $this->load->view('admin/reports/rep_cs_pdf', $data);
        
    }
    public function get_content_strands()
	{
        //not in use
		if($this->input->post('get_rep'))
		{		
			
                //print_r($_REQUEST);
            
                $data['title'] = 'SubContent Strands Summary Report';
				$data['item_grade_id'] = $this->input->post('item_grade_id');
				$data['item_subject_id'] = $this->input->post('item_subject_id');
				$data['item_cstand_id'] = $this->input->post('item_cstand_id');
				$data['item_subcstand_id'] = $this->input->post('item_subcstand_id');
                $data['item_cycle'] = $this->input->post('item_cycle');
				
				
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/reports/subcontentstrands_sumary_rep');
				$this->load->view('admin/includes/_footer');				
//}
		}
	}
    public function get_content_strands_jason($search_parm=0){
        $temp = explode('_',$search_parm);
        $item_cycle = $temp[5];
        $records =[];
		$records = $this->Reports_model->get_content_strands_sumary($search_parm);
		//print_r($records);
        //exit();
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data1= array(
				++$i,
				$row['grade_name_en'],
                $row['subject_name_en'],
                ($row['cs_statement_en'] != '.' ? $row['cs_number'].':'.$row['cs_statement_en'] : $row['cs_number']),
                $row['subcs_number'].':'.($row['subcs_topic_en'] != '.' ? $row['subcs_topic_en'] : $row['subcs_topic_ur']),
                $row['slo_number'] 
                
                );
                if($item_cycle==1){
                    $data1[]=$row['Submitted'];
                    $data1[]= $row['Submitted_MCQ'];
                    $data1[]= $row['Submitted_ERQ'];
                    
                }
             $data1[]= $row['AE'];
             $data1[]=   $row['AE_MCQ'];
             $data1[]=  $row['AE_ERQ'];
			$data[] = $data1;
		}
		$records['data']=$data;
		echo json_encode($records);	
        
        
    }
    /**********************************************************************
                Item Advance Search
    ***********************************************************************/
    public function rep_advance_search(){
        
        $data['title'] = 'Item Advance Search';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep') || $this->input->post('btn_serch') )
		{	
           // print_r($this->input->post());
          
            $data['search'] = ( $this->input->post('search') !='' ? $this->clean($this->input->post('search')) : '');
            $data['item_code'] = ( $this->input->post('item_code') != '' ? $this->input->post('item_code') : '');
            $data['dificulty'] = ( $this->input->post('dificulty') != '' ? $this->input->post('dificulty') : '0');
            $data['item_type'] = ( $this->input->post('item_type') != '' ? $this->input->post('item_type') : '0');
            $data['item_status'] = ( $this->input->post('item_status') != '' ? $this->input->post('item_status') : '0');
            $data['item_cognitive_level'] = ( $this->input->post('item_cognitive_level') != '' ? $this->input->post('item_cognitive_level') : '0');
            $data['layout'] = ( $this->input->post('layout') != '' ? $this->input->post('layout') : '0');
            $data['curriculum'] = ( $this->input->post('curriculum') != '' ? $this->input->post('curriculum') : '0');
            $data['item_relation'] = ( $this->input->post('item_relation') != '' ? $this->input->post('item_relation') : '0');
            
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
            $data['item_cstand_id'] = ($this->input->post('item_cstand_id') !='' ? $this->input->post('item_cstand_id') : 0);
            $data['item_subcstand_id'] = ($this->input->post('item_subcstand_id') !='' ? $this->input->post('item_subcstand_id') : 0);
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            }
            if($this->input->post('item_subject_id') !=''){
               $data['content_strands'] = $this->Items_model->get_cstands_by_subject($this->input->post('item_subject_id'));
                
            }
            if($this->input->post('item_cstand_id') !=''){
               $data['subcontent_strands'] = $this->Items_model->get_subcstands_by_cstand($this->input->post('item_cstand_id'));
                
            }     
             
            
        }
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_advance_search');
		$this->load->view('admin/includes/_footer');
        
    }
    public function auto_sugest(){
        
        if(!empty($this->input->post('keyword'))) {
            
            $keyword = $this->input->post('keyword');
            $this->db->select('item_id,item_stem_en');
            $this->db->limit(20); 
             if($this->session->userdata('role_id')!=1){
            $subjectList = $this->session->userdata('subjects_ids');
            $this->db->where_in('item_subject_id', $subjectList); 
           }
            $this->db->like('item_stem_en', $keyword);
            $result = $this->db->get("ci_items_rev")->result();
           // die($this->db->last_query());
            $arr_result =array();
            foreach ($result as $row)
                $arr_result[] = $this->clean( str_replace('&nbsp;','',strip_tags($row->item_stem_en)));
            echo json_encode( $arr_result);
            /*if(!empty($result)) {
                $res ='<ul id="country-list">';
                    foreach($result as $row) {
                         //print_r($row);
                    $res .= '<li onClick="selectCountry('.$row->item_id.');">'.$row->item_stem_en.'</li>';
                     } 
                    $res .= '</ul>';
                echo $res;
                 } */
 } 
}
function clean($string) {
    //str_replace(array("#", "'", ";"), '', $str);
   $string = str_replace(array("?", "'", ";","#",":"), ' ', $string); // Replaces all spaces with hyphens.

   return trim(preg_replace('/[^A-Za-z0-9.-\_]/', ' ', $string)); // Removes special chars.
}
     public function item_search_jason($search_parm=0){
       // $temp = explode('_',$search_parm);
        $records =[];
		$records = $this->Reports_model->get_search_jason($search_parm);
        // echo '<pre>';
		//print_r($records);
       // die('im here');
         
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
                    $row['grade_id'],
                    $row['subject_name_en'],
                    $row['item_type'] ,
                    $row['cs_strand'] ,
                    $row['subcs_strand'],
                    $row['slo_number'],
                    $row['item_code'],
                    '<a  href="'.base_url().'admin/reports/item_details_byId/'.$row['item_id'].'" target="_blank">Cycle 1</a> '.($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_ss_aview/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                    .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
             );
		}
		$records['data']=$data;
		echo json_encode($records);	
        
        
    }
    public function item_search_export($rep_type='CSV',$search=0,$item_code=0,$dificulty=0,$item_type=0,$item_stat=0,$cog_lev=0,$layout=0,$curriculum=0,$item_relation=0,$grade=0,$subject=0,$cstrand=0,$subcstand=0,$search_type=0){
        $res_data = $this->Reports_model->get_item_search_exp($search,$item_code,$dificulty,$item_type,$item_stat,$cog_lev,$layout,$curriculum,$item_relation,$grade,$subject,$cstrand,$subcstand,$search_type);
        //print_r($res_data);
       // exit;
        $data['rep_type'] =$rep_type;
         $data['res_data'] = $res_data; 
         $this->load->view('admin/reports/rep_item_search_export', $data);
    }
    public function item_details_byId($item_id){
       // $item_id =  $this->input->post('item_id');
        $data['item_data'] = $item_data = $this->Reports_model->get_item_details_byId($item_id);
       /* print_r($item_data);
        echo $item_data[0]->item_writer_id;
        exit;*/
        
        $data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($item_data[0]->item_writer_id);
        $data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($item_data[0]->ss_id);
        $data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($item_data[0]->item_reviewedby);
        $data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($item_data[0]->psy_id);
        $data['reviewerinfo'] = $this->Items_model->get_iwinfo_by_id($item_data[0]->item_reviewedby);
        
        $this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/reports/item_details');
		$this->load->view('admin/includes/_footer');
        
       
        /*$result = '<table class="table table-striped">
                        <tbody>';
        foreach($res_data as $row):
              $result .=   '<tr>
                                <td class="font-weight-bold">Item Grade </td>
                                <td>'.$row['grade_id'].'</td>
                                <td class="font-weight-bold">Subject</td>
                                <td>'.$row['subject_name_en'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Item Code </td>
                                <td>'.$row['item_code'].'</td>
                                <td class="font-weight-bold">Item Code New</td>
                                <td>'.$row['item_code_new'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">content Strand</td>
                                <td class="urdufont-right">'.$row['cs_strand'].'</td>
                                <td class="font-weight-bold">Sub Content Strand</td>
                                <td class="urdufont-right">'.$row['subcs_strand'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Item SLO </td>
                                <td class="urdufont-right" colspan="3">'.$row['slo'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Item Registration </td>
                                <td>'.$row['item_registration'].'</td>
                                <td class="font-weight-bold">Cognitive Level</td>
                                <td>'.$row['cognitive_level'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Curriculam</td>
                                <td>'.$row['curriculam'].'</td>
                                <td class="font-weight-bold">Item Status</td>
                                <td>'.$row['istatus'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">SS Status </td>
                                <td>'.$row['ss_status'].'</td>
                                <td class="font-weight-bold">AE Status</td>
                                <td>'.$row['ae_status'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Psy Status</td>
                                <td>'.$row['psy_status'].'</td>
                                <td class="font-weight-bold">Item Relation</td>
                                <td>'.$row['item_relation'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Chapter </td>
                                <td>'.$row['item_pctb_chapter'].'</td>
                                <td class="font-weight-bold">Page</td>
                                <td>'.$row['item_pctb_page'].'</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Batch - Item Type </td>
                                <td>'.$row['item_batch'].'-'.$row['item_type'].'</td>
                                <td colspan="2" class="">Item Statement <br>
                                '.$row['item_stem_en'].'<br><span class="urdufont-right">'.$row['item_stem_ur'].'</span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Layout '.$row['item_option_layout'].'</td>
                                <td colspan="3" class="urdufont-right">Rubric<br>
                                '.$row['item_rubric_english'].'<br>'.$row['item_rubric_urdu'].'
                                </td>
                               
                            </tr>';
                        $result .=  ($row['item_type'] == 'MCQ'?'<tr>
                                                <td class="font-weight-bold">Item Options </td>
                                                <td colspan ="3">
                                                A) '.$row['item_option_a_en'].'&nbsp;&nbsp;&nbsp; <span class="urdufont-right">'.$row['item_option_a_ur'].'</span>
                                                B) '.$row['item_option_b_en'].'&nbsp;&nbsp;&nbsp; <span class="urdufont-right">'.$row['item_option_b_ur'].'</span><br>
                                                C) '.$row['item_option_c_en'].'&nbsp;&nbsp;&nbsp; <span class="urdufont-right">'.$row['item_option_c_ur'].'</span>
                                                D) '.$row['item_option_d_en'].'&nbsp;&nbsp;&nbsp; <span class="urdufont-right">'.$row['item_option_d_ur'].'</span>
                                                
                                                </td>
                                                </tr>':'');
                        
                         
            
                        endforeach;
                      
                   $result .='  </tbody>
                            </table>';
        echo $result;*/

        
    }
    /*******************END Item Advance Search****************************/
    
    /**********************************************************************
                Item Created Summary
    **************************************************************/
    public function rep_item_sumry()
	{
		$data['title'] = 'Item Created Summary';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
           
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            } 
            
        }
            
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_item_sumry');
		$this->load->view('admin/includes/_footer');
	}
	
	public function rep_item_review_summary()
	{
		$data['title'] = 'Item Review Summary';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
           
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            } 
            
        }
            
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_item_review_summary');
		$this->load->view('admin/includes/_footer');
	}
	
    public function item_created_jason($search_parm=0){
        $temp = explode('_',$search_parm);
        $records =[];
		$records = $this->Reports_model->get_item_created_sumry_jason($search_parm);
        // echo '<pre>';
		//print_r($records);
       // die('im here');
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
                    ++$i,
                    $row['grade_name_en'],
                    $row['subject_name_en'],
                    $row['item_submited'] ,
                    $row['ae_finalized'],
                    $row['psy_review'],
                    $row['item_reviewed'],
                    $row['ae_finalized_rev'],
                    $row['psy_review_rev']
             );
		}
		$records['data']=$data;
		echo json_encode($records);	
    }
    public function pending_items_details($grade_id,$subject_id,$item_type,$stat_of){
        
        $res_data = $this->Reports_model->get_pending_items_list($grade_id,$subject_id,$item_type,$stat_of); 
        $data['res_data'] = $res_data;
        //echo $field;
        $data['title'] = 'Items Details';
        
        $this->load->view('admin/includes/_header',$data);
		 $this->load->view('admin/reports/pending_items_details');
		 $this->load->view('admin/includes/_footer');
        
    }
	
    public function created_item_sumry_export($rep_type='CSV',$grade=0,$subject=0){
        $res_data = $this->Reports_model->get_item_created_sumry($grade,$subject);
        //print_r($res_data);
        //exit;
        $data['rep_type'] =$rep_type;
         $data['res_data'] = $res_data; 
         $this->load->view('admin/reports/rep_item_created_export', $data);
    }
	
	public function item_review_created_jason($search_parm=0){
        $temp = explode('_',$search_parm);
        $records =[];
		$records = $this->Reports_model->get_item_review_created_sumry_jason($search_parm);
         /*echo '<pre>';
		print_r($records);
       die('im here');*/
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
            $crq_ss = $row['C2_SS_Pending'] - $row['C2_SS_MCQ_Pending'];
            $crq_ae = $row['C2_AE_Pending'] - $row['C2_AE_MCQ_Pending'];
            $crq_ir = $row['C2_IR_Pending']-$row['C2_IR_MCQ_Pending'];
			$data[]= array(
                    ++$i,
                    $row['grade_name_en'],
                    $row['Subjects'],
                    $row['C1_Items'] ,
                    $row['C1_MCQ_Items'],
					$row['C1_Items'] - $row['C1_MCQ_Items'],
                
                $row['C2_IR_Reviewed'],
                $row['C2_IR_MCQ_Reviewed'],
				$row['C2_IR_Reviewed'] - $row['C2_IR_MCQ_Reviewed'],//ERQ
                //IR_Pending
                $row['C2_IR_Pending'],
                //IR_Pending MCQ
               // $row['C2_IR_MCQ_Pending'],
                ($row['C2_IR_MCQ_Pending'] > 0 ? '<a  href="'.base_url().'admin/reports/pending_items_details/'.$row['grade_id'].'/'.$row['subject_id'].'/MCQ/IR" target="_blanck">'.$row['C2_IR_MCQ_Pending'].'</a>' : $row['C2_IR_MCQ_Pending']),
                //IR_Pending ERQ
                //$row['C2_IR_Pending']-$row['C2_IR_MCQ_Pending'],
                ($crq_ir > 0 ? '<a  href="'.base_url().'admin/reports/pending_items_details/'.$row['grade_id'].'/'.$row['subject_id'].'/CRQ/IR" target="_blanck">'.$crq_ir.'</a>' : 0),
                
                    $row['C2_Reviewed'],
                    $row['C2_MCQ_Reviewed'],
					$row['C2_Reviewed'] - $row['C2_MCQ_Reviewed'],
                    $row['C2_SS_Pending'],
                    //$row['C2_SS_MCQ_Pending'],
                ($row['C2_SS_MCQ_Pending'] > 0 ? '<a  href="'.base_url().'admin/reports/pending_items_details/'.$row['grade_id'].'/'.$row['subject_id'].'/MCQ/SS" target="_blanck">'.$row['C2_SS_MCQ_Pending'].'</a>' : $row['C2_SS_MCQ_Pending']),
					//$row['C2_SS_Pending'] - $row['C2_SS_MCQ_Pending'],
                ($crq_ss > 0 ? '<a  href="'.base_url().'admin/reports/pending_items_details/'.$row['grade_id'].'/'.$row['subject_id'].'/CRQ/SS" target="_blanck">'.$crq_ss.'</a>' : 0),
					$row['C2_AE_Pending'],
					//$row['C2_AE_MCQ_Pending'],
                ($row['C2_AE_MCQ_Pending'] > 0 ? '<a  href="'.base_url().'admin/reports/pending_items_details/'.$row['grade_id'].'/'.$row['subject_id'].'/MCQ/AE" target="_blanck">'.$row['C2_AE_MCQ_Pending'].'</a>' : $row['C2_AE_MCQ_Pending']),
					//$row['C2_AE_Pending'] - $row['C2_AE_MCQ_Pending']
                ($crq_ae > 0 ? '<a  href="'.base_url().'admin/reports/pending_items_details/'.$row['grade_id'].'/'.$row['subject_id'].'/CRQ/AE" target="_blanck">'.$crq_ae.'</a>' : 0)
             );
		}
		$records['data']=$data;
		echo json_encode($records);	
    }
	public function created_item_review_summary_export($rep_type='CSV',$grade=0,$subject=0){
        $res_data = $this->Reports_model->get_item_review_created_sumry($grade,$subject);
        //print_r($res_data);
        //exit;
        $data['rep_type'] =$rep_type;
         $data['res_data'] = $res_data; 
         $this->load->view('admin/reports/rep_item_review_created_export', $data);
    }
    
    /********************************END Item Created Summary*****************************/
    
    /**********************************************************************
               Missing Item Summary
    **************************************************************/
    public function missing_items()
	{
		$data['title'] = 'Missing Item Summary';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
           
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            } 
            
        }
            
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_missing_items_sumry');
		$this->load->view('admin/includes/_footer');
	}
    public function missing_items_jason($search_parm=0){
        $temp = explode('_',$search_parm);
        $records =[];
		$records = $this->Reports_model->get_missing_items_sumry_jason($search_parm);
        // echo '<pre>';
		//print_r($records);
       // die('im here');
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
                    $row['grade'],
                    $row['subject_name_en'],
                    $row['total_items'] ,
                    ($row['code_missing'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_code">'.$row['code_missing'].'</a>' : $row['code_missing']),
                
                    ($row['item_difficulty'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_difficulty">'.$row['item_difficulty'].'</a>' : $row['item_difficulty']),
                    
                    ($row['item_discr'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_discr">'.$row['item_discr'].'</a>' : $row['item_discr']),
                
                    ($row['item_dif_code'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_dif_code">'.$row['item_dif_code'].'</a>' : $row['item_dif_code']),
                
                ($row['item_registration'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_registration">'.$row['item_registration'].'</a>' : $row['item_registration']),
                   
                    ($row['item_cognitive_bloom'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_cognitive_bloom">'.$row['item_cognitive_bloom'].'</a>' : $row['item_cognitive_bloom']),
    
                 ($row['item_pctb_chapter'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_pctb_chapter">'.$row['item_pctb_chapter'].'</a>' : $row['item_pctb_chapter']),
                
                ($row['item_pctb_page'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_pctb_page">'.$row['item_pctb_page'].'</a>' : $row['item_pctb_page']),
                
                   ($row['item_relation'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_relation">'.$row['item_relation'].'</a>' : $row['item_relation']),
                   
                ($row['item_rubric'] > 0 ? '<a  href="#" url="'.base_url().'admin/reports/missing_items_details/'.$row['item_subject_id'].'/item_rubric">'.$row['item_rubric'].'</a>' : $row['item_rubric'])
    
             );
		}
		$records['data']=$data;
		echo json_encode($records);	
        
        
    }
    public function missing_items_details($subject_id,$field){
        
        $res_data = $this->Reports_model->get_missing_items_detail($subject_id,$field); 
        $data['res_data'] = $res_data;
        //echo $field;
        $data['title'] = 'Missing Items Details';
        
        $this->load->view('admin/includes/_header',$data);
		 $this->load->view('admin/reports/missing_items_details');
		 $this->load->view('admin/includes/_footer');
        
    }
    public function missing_item_sumry_export($rep_type='CSV',$grade=0,$subject=0){
        $res_data = $this->Reports_model->get_missing_items_sumry($grade,$subject);
        //print_r($res_data);
        //exit;
        $header = '<table><tr>
                        <td colspan ="2" style=" text-align:center;padding:20px;"><img src="'.base_url().'/assets/img/pec-image.jpg" width="110" height="130" /></td>
                        <td colspan ="3" style="font-size:24px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
                        </tr>
                        </table>
                        <div style="border:1px solid; float:right;width:150px; text-align: right;">Date: '.date('d-m-Y').'</div>';
        $footer = '<p >
                        <span style="width:70%" >Copyright © 2021 pec.edu.pk All rights reserved.</span>
                        <span style="width:30%;text-align: right" colspan="3">Developed By: PEC IT TEAM .</span>
                    </p>';
        $data['rep_type'] =$rep_type;
        $data['title'] = 'Missing Item Summary';
        $data['res_data'] = $res_data; 
        $data['header'] = $header; 
        
         $filename = 'MissingItemSummary';
         $html = $this->load->view('admin/reports/rep_missing_items_sumry_export', $data,true);
        if($rep_type=='PDF'){
            
            $mpdf = new \Mpdf\Mpdf();
            $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->SetAuthor("PEC IT TEAM");
            $mpdf->SetTitle("Missing Items Summary");
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
            header("Content-Disposition: attachment; filename=".$filename.".xls"); 
            //header("Content-Disposition: attachment;Filename=document_name.xls");
            //header("Content-Type: application/csv; ");
            header("Content-type: application/vnd.ms-excel");
            echo $html;
            
        }
    }
    
    /********************************END MIssing Item Summary*****************************/
    
    /**********************************************************************
        Cognative Level Sumary Report
    **************************************************************/
    
    public function rep_cognitive_level_sumry()
	{
		$data['title'] = 'Cognitive level  summary';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
            $data['item_cstand_id'] = ($this->input->post('item_cstand_id') !='' ? $this->input->post('item_cstand_id') : 0);
            $data['item_subcstand_id'] = ($this->input->post('item_subcstand_id') !='' ? $this->input->post('item_subcstand_id') : 0);
            
            $subjectList = $this->session->userdata('subjects_ids');
            
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            }
            if($this->input->post('item_subject_id') !=''){
               $data['content_strands'] = $this->Items_model->get_cstands_by_subject($this->input->post('item_subject_id'));
                
            }
            if($this->input->post('item_cstand_id') !=''){
               $data['subcontent_strands'] = $this->Items_model->get_subcstands_by_cstand($this->input->post('item_cstand_id'));
                
            }            
            
        }
            
            
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_cognitive_level_sumry');
		$this->load->view('admin/includes/_footer');
	}
    
     public function cognitive_level_sumry_jason($search_parm=0){
        $temp = explode('_',$search_parm);
        $records =[];
		$records = $this->Reports_model->get_cognitive_level_sumry_jason($search_parm);
        // echo '<pre>';
		//print_r($records);
       // die('im here');
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
                    ++$i,
                    $row['grade_name_en'],
                    $row['subject_name_en'],
                    $row['cs_statement'] ,
                    $row['subcs_topic'],
                    $row['AE'],
                    $row['AE_MCQ'],
                    $row['AE_MCQ_K'],
                    $row['AE_MCQ_C'],
                    $row['AE_MCQ_H'],
                    $row['AE_ERQ'],
                    $row['AE_ERQ_K'],
                    $row['AE_ERQ_C'],
                    $row['AE_ERQ_H']
             );
		}
		$records['data']=$data;
		echo json_encode($records);	
        
        
    }
    
    public function rep_cognitive_level_sumry_export($rep_type='CSV',$grade=0,$subject=0,$cont_strand=0,$sun_cs=0){
        $res_data = $this->Reports_model->get_cognitive_level_sumary($grade,$subject,$cont_strand,$sun_cs);
        $data['rep_type'] =$rep_type;
         $data['res_data'] = $res_data; 
         $this->load->view('admin/reports/rep_cognativlevel_export', $data);
    }
    /*************************************************************************************
    *       Duplicate Items / Plagiarism check Report
    ***************************************************************************************/
    public function plagiarism_check()
	{
		$data['title'] = 'Plagiarism Report';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
            $subjectList = $this->session->userdata('subjects_ids');
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            }
            $this->form_validation->set_rules('txt_search', 'search', 'trim|required|min_length[5]');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/reports/plagiarism_check'),'refresh');
			}
			else{
                    $data['txt_search'] = ( $this->input->post('txt_search') !='' ? $this->input->post('txt_search') : ''); 
            }
            
        }
              
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/plagiarism_check');
		$this->load->view('admin/includes/_footer');
	}
    public function plagiarism_jason($search_parm ){
        $temp = explode('_',$search_parm);
		$item_grade_id = $temp[0];
		$item_subject_id = $temp[1];
        $search_str = $temp[2];
        
        $records =[];
		$records = $this->Reports_model->get_item_search_jason($item_grade_id,$item_subject_id);
        // echo '<pre>';
		//print_r($records);
       // die('im here');
        $data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
                    $row['grade_id'],
                    $row['subject_name_en'],
                    $row['item_type'] ,
                    $row['cs_strand'] ,
                    $row['item_stem_en'],
                    round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$search_str)),strtolower($row['item_stem_en'])) * 100),2)." %",
                    '<a  href="'.base_url().'admin/reports/item_details_byId/'.$row['item_id'].'" target="_blank">Cycle 1</a>'
					.($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_ss_aview/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                    .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
             );
		}
		$records['data']=$data;
		echo json_encode($records);	
        
        
        
    }
    
    public function plagiarism_duplicate()
	{
		$data['title'] = 'Plagiarism Duplicate Report';
		$data['grades'] = $this->Items_model->get_all_grades();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
            $subjectList = $this->session->userdata('subjects_ids');
            if($this->input->post('item_grade_id') !=''){
               $data['subjects'] = $this->Items_model->get_ae_subjects_by_grade($this->input->post('item_grade_id'),$subjectList);
                
            }
            $this->form_validation->set_rules('dup_level', 'Duplication Level', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/reports/plagiarism_duplicate'),'refresh');
			}
			else{
                    $data['dup_level'] = ( $this->input->post('dup_level') !='' ? $this->input->post('dup_level') : '70'); 
            }
            
        }
              
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/plagiarism_duplicate');
		$this->load->view('admin/includes/_footer');
	}
    public function plagiarism_json_duplicate($search_parm )
    {
        $temp = explode('_',$search_parm);
		$item_grade_id = $temp[0];
		$item_subject_id = $temp[1];
        $dup_level = $temp[2];
        
        $records =[];
		$records = $this->Reports_model->get_item_search_jason($item_grade_id,$item_subject_id);
        // echo '<pre>';
		//print_r($records);
       // die('im here');
        $urdutqm = [5,9,13,19,26,32,40,48,65,66,67];
        $data = array();
		$i=0;
        for($ii = 0; $ii < count($records['data']); $ii++)
        {
            $checkquestion = 0;
            for($j = $ii; $j < count($records['data']); $j++)
            {
                if($ii == $j)
                {
                   continue; 
                }
                else
                {
                    if(in_array($item_subject_id,$urdutqm))
                    {
                        $row1 = $records['data'][$ii];
                        $row = $records['data'][$j];
                        $dlevel = round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',strip_tags($records['data'][$ii]['item_stem_ur']))),strtolower(strip_tags($records['data'][$j]['item_stem_ur']))) * 100),2);

                        if($dlevel >= $dup_level)
                        {
                            if($checkquestion == 0)
                            {
                            $data[]= array(
                                        $row1['grade_id'],
                                        $row1['subject_name_en'],
                                        $row1['item_type'] ,
                                        $row1['cs_strand'] ,
                                        '<span class="urdufont-right" style="font-size:20px; display:block; text-align: right;">'.strip_tags($row1['item_stem_ur']).'</span>',
                                        '',
                                        ''
                                 );
                                $checkquestion = 1;
                            }
                            $data[]= array(
                                $row['grade_id'],
                                $row['subject_name_en'],
                                $row['item_type'] ,
                                $row['cs_strand'] ,
                                '<span class="urdufont-right" style="font-size:20px; display:block; text-align: right;"> '.strip_tags($row['item_stem_ur']).' </span>',
                                round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',strip_tags($records['data'][$ii]['item_stem_ur']))),strtolower(strip_tags($records['data'][$j]['item_stem_ur']))) * 100),2)." %",
                                '<a  href="'.base_url().'admin/items/duplicate_compare/'.$row1['item_id'].'_'.$row['item_id'].'" target="_blank">Compare</a> | <a  href="'.base_url().'admin/items/view_combine/'.$row['item_id'].'" target="_blank">Cycle 1</a>'
                                .($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_view_combine/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                                .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
                         );

                        }
                    }
                    else
                    {
                        $row1 = $records['data'][$ii];
                        $row = $records['data'][$j];
                        $dlevel = round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$records['data'][$ii]['item_stem_en'])),strtolower($records['data'][$j]['item_stem_en'])) * 100),2);

                        if($dlevel >= $dup_level)
                        {
                            if($checkquestion == 0)
                            {
                            $data[]= array(
                                        $row1['grade_id'],
                                        $row1['subject_name_en'],
                                        $row1['item_type'] ,
                                        $row1['cs_strand'] ,
                                        $row1['item_stem_en'],
                                        '',
                                        ''
                                 );
                                $checkquestion = 1;
                            }
                            $data[]= array(
                                $row['grade_id'],
                                $row['subject_name_en'],
                                $row['item_type'] ,
                                $row['cs_strand'] ,
                                $row['item_stem_en'],
                                round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$records['data'][$ii]['item_stem_en'])),strtolower($records['data'][$j]['item_stem_en'])) * 100),2)." %",
                                '<a  href="'.base_url().'admin/items/duplicate_compare/'.$row1['item_id'].'_'.$row['item_id'].'" target="_blank">Compare</a> | <a  href="'.base_url().'admin/items/view_combine/'.$row['item_id'].'" target="_blank">Cycle 1</a>'
                                .($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_view_combine/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                                .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
                         );

                        }
                    }
                }
                
            }
        }
        //die('123');
		/*foreach ($records['data']  as $row) 
		{  
			$data[]= array(
                    $row['grade_id'],
                    $row['subject_name_en'],
                    $row['item_type'] ,
                    $row['cs_strand'] ,
                    $row['item_stem_en'],
                    round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$search_str)),strtolower($row['item_stem_en'])) * 100),2)." %",
                    '<a  href="'.base_url().'admin/reports/item_details_byId/'.$row['item_id'].'" target="_blank">Cycle 1</a>'
					.($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_ss_aview/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                    .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
             );
		}*/
		$records['data']=$data;
        $records['recordsTotal'] = count($data);
        $records['recordsFiltered'] = count($data);        
		echo json_encode($records);	
        
        
        
    }
    
    public function plagiarism_duplicate_grade()
	{
		$data['title'] = 'Plagiarism Grade Duplicate Report';
		$data['grades'] = $this->Items_model->get_all_grades();
        $data['subjects'] = $this->Reports_model->get_all_subjects_grade();
        
        if($this->input->post('get_rep'))
		{	
            $data['item_grade_id'] = ( $this->input->post('item_grade_id') !='' ? $this->input->post('item_grade_id') : 0);
            $data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
            
            $this->form_validation->set_rules('dup_level', 'Duplication Level', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/reports/plagiarism_duplicate_grade'),'refresh');
			}
			else{
                    $data['dup_level'] = ( $this->input->post('dup_level') !='' ? $this->input->post('dup_level') : '70'); 
            }
            
        }
              
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/plagiarism_duplicate_grade');
		$this->load->view('admin/includes/_footer');
	}
    public function plagiarism_json_duplicate_grade($search_parm )
    {
        $temp = explode('_',$search_parm);
		$item_grade_id = $temp[0];
		$item_subject_id = $temp[1];
        $dup_level = $temp[2];
        
        $records =[];
		$records = $this->Reports_model->get_item_search_jason_grade($item_grade_id,$item_subject_id);
        // echo '<pre>';
		//print_r($records);
       // die('im here');
        $urdutqm = [5,9,13,19,26,32,40,48,65,66,67];
        $data = array();
		$i=0;
        for($ii = 0; $ii < count($records['data']); $ii++)
        {
            $checkquestion = 0;
            for($j = $ii; $j < count($records['data']); $j++)
            {
                if($ii == $j)
                {
                   continue; 
                }
                else
                {
                    if(in_array($item_subject_id,$urdutqm))
                    {
                        $row1 = $records['data'][$ii];
                        $row = $records['data'][$j];
                        $dlevel = round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',strip_tags($records['data'][$ii]['item_stem_ur']))),strtolower(strip_tags($records['data'][$j]['item_stem_ur']))) * 100),2);

                        if($dlevel >= $dup_level)
                        {
                            if($checkquestion == 0)
                            {
                            $data[]= array(
                                        $row1['grade_id'],
                                        $row1['subject_name_en'],
                                        $row1['item_type'] ,
                                        $row1['cs_strand'] ,
                                        '<span class="urdufont-right" style="font-size:20px; display:block; text-align: right;">'.strip_tags($row1['item_stem_ur']).'</span>',
                                        '',
                                        ''
                                 );
                                $checkquestion = 1;
                            }
                            $data[]= array(
                                $row['grade_id'],
                                $row['subject_name_en'],
                                $row['item_type'] ,
                                $row['cs_strand'] ,
                                '<span class="urdufont-right" style="font-size:20px; display:block; text-align: right;"> '.strip_tags($row['item_stem_ur']).' </span>',
                                round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',strip_tags($records['data'][$ii]['item_stem_ur']))),strtolower(strip_tags($records['data'][$j]['item_stem_ur']))) * 100),2)." %",
                                '<a  href="'.base_url().'admin/items/duplicate_compare/'.$row1['item_id'].'_'.$row['item_id'].'" target="_blank">Compare</a> | <a  href="'.base_url().'admin/items/view_combine/'.$row['item_id'].'" target="_blank">Cycle 1</a>'
                                .($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_view_combine/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                                .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
                         );

                        }
                    }
                    else
                    {
                        $row1 = $records['data'][$ii];
                        $row = $records['data'][$j];
                        $dlevel = round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$records['data'][$ii]['item_stem_en'])),strtolower($records['data'][$j]['item_stem_en'])) * 100),2);

                        if($dlevel >= $dup_level)
                        {
                            if($checkquestion == 0)
                            {
                            $data[]= array(
                                        $row1['grade_id'],
                                        $row1['subject_name_en'],
                                        $row1['item_type'] ,
                                        $row1['cs_strand'] ,
                                        $row1['item_stem_en'],
                                        '',
                                        ''
                                 );
                                $checkquestion = 1;
                            }
                            $data[]= array(
                                $row['grade_id'],
                                $row['subject_name_en'],
                                $row['item_type'] ,
                                $row['cs_strand'] ,
                                $row['item_stem_en'],
                                round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$records['data'][$ii]['item_stem_en'])),strtolower($records['data'][$j]['item_stem_en'])) * 100),2)." %",
                                '<a  href="'.base_url().'admin/items/duplicate_compare/'.$row1['item_id'].'_'.$row['item_id'].'" target="_blank">Compare</a> | <a  href="'.base_url().'admin/items/view_combine/'.$row['item_id'].'" target="_blank">Cycle 1</a>'
                                .($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_view_combine/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                                .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
                         );

                        }
                    }
                }
                
            }
        }
       
		$records['data']=$data;
        $records['recordsTotal'] = count($data);
        $records['recordsFiltered'] = count($data);        
		echo json_encode($records);	
    }
    
	public function itemwriter()
	{
		$data['title'] = 'Item Writers Reports';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/reports/itemwriters_list');
		$this->load->view('admin/includes/_footer');
	
	}
	public function datatable_json_iw(){
				
		$records = $this->Reports_model->get_all_itemwriters();
		//print_r($records);
		//die();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			/*
			"columnDefs": [
    { "targets": 0, "name": "admin_id", 'searchable':false, 'orderable':false},
    { "targets": 1, "name": "ci_iw_subject", 'searchable':true, 'orderable':true},
    { "targets": 2, "name": "lastname", 'searchable':true, 'orderable':true},
    { "targets": 3, "name": "ci_iw_fathername", 'searchable':true, 'orderable':true},
	 { "targets": 4, "name": "ci_iw_district", 'searchable':true, 'orderable':true},
	 { "targets": 5, "name": "ci_iw_dob", 'searchable':true, 'orderable':true},
    { "targets": 6, "name": "ci_iw_cnic", 'searchable':true, 'orderable':true},
    { "targets": 7, "name": "Action", 'searchable':false, 'orderable':false,'width':'100px'}
    ]*/
			$data[]= array(
				++$i,
				$row['ci_iw_subject'],
				$row['firstname'].' '.$row['lastname'],
				$row['ci_iw_fathername'],
				$row['district_name_en'],
				$row['ci_iw_dob'],
				$row['ci_iw_cnic'],
				$row['ci_iw_designation'],
				$row['ci_iw_posting'],
				'<a title="View" class="view btn btn-sm btn-info" href="javascript:alert(\'Under Process!\');"> <i class="fa fa-eye"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   	
	}
	public function reports_admin()
	{
		$data['title'] = 'Reports List';
		$data['grades'] = $this->Reports_model->get_all_grades();
		$data['subjects'] = $this->Reports_model->get_all_subjects();
		$data['iwinfos'] = $this->Reports_model->get_all_iw();
		$data['ssinfos'] = $this->Reports_model->get_all_ss();
		$data['aeinfos'] = $this->Reports_model->get_all_ae();
		$data['psyinfos'] = $this->Reports_model->get_all_psy();
		$data['irinfos'] = $this->Reports_model->get_all_ir();
		$data['rev_ssinfos'] = $this->Reports_model->get_all_rev_ss();
		$data['rev_aeinfos'] = $this->Reports_model->get_all_rev_ae();
		$data['rev_psyinfos'] = $this->Reports_model->get_all_rev_psy();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/reports/reports_admin');
		$this->load->view('admin/includes/_footer');
	}
	
	public function reports_comments()
	{
		$data['title'] = 'Reports List';
		$data['grades'] = $this->Reports_model->get_all_grades();
		$data['subjects'] = $this->Reports_model->get_all_subjects();
		$data['iwinfos'] = $this->Reports_model->get_all_iw();
		$data['ssinfos'] = $this->Reports_model->get_all_ss();
		$data['aeinfos'] = $this->Reports_model->get_all_ae();
		$data['psyinfos'] = $this->Reports_model->get_all_psy();
		$data['irinfos'] = $this->Reports_model->get_all_ir();
		$data['rev_ssinfos'] = $this->Reports_model->get_all_rev_ss();
		$data['rev_aeinfos'] = $this->Reports_model->get_all_rev_ae();
		$data['rev_psyinfos'] = $this->Reports_model->get_all_rev_psy();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/reports/reports_comments');
		$this->load->view('admin/includes/_footer');
	}
	
	public function admin_ceo_search()
	{
		if($this->input->post('submit_ceo'))
		{		
			if($this->input->post('search_phase') == '' 
				&& $this->input->post('search_grade') == '' 
				&& $this->input->post('search_subject') == '' 
				&& $this->input->post('search_type') == '' 
				&& $this->input->post('search_cognitive_bloom') == '' 
				&& $this->input->post('search_iw') == '' 
				&& $this->input->post('search_iw_status') == ''
				&& $this->input->post('search_ss') == '' 
				&& $this->input->post('search_ss_status') == '' 
				&& $this->input->post('search_ae') == '' 
				&& $this->input->post('search_ae_status') == '' 
				&& $this->input->post('search_psy') == '' 
				&& $this->input->post('search_psy_status') == ''
				&& $this->input->post('search_ir_rev') == '' 
				&& $this->input->post('search_ir_status') == '' 
				&& $this->input->post('search_ss_rev') == '' 
				&& $this->input->post('search_ss_status_rev') == '' 
				&& $this->input->post('search_ae_rev') == '' 
				&& $this->input->post('search_ae_status_rev') == ''
				&& $this->input->post('search_psy_rev') == '' 
				&& $this->input->post('search_psy_status_rev') == '')
			{
				redirect(base_url('admin/reports'));
			}
			else
			{
				$data['search_phase'] = $this->input->post('search_phase');
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['search_type'] = $this->input->post('search_type');
				$data['search_cognitive_bloom'] = $this->input->post('search_cognitive_bloom');
				$data['search_iw'] = $this->input->post('search_iw');
				$data['search_iw_status'] = $this->input->post('search_iw_status');
				$data['search_ss'] = $this->input->post('search_ss');
				$data['search_ss_status'] = $this->input->post('search_ss_status');
				$data['search_ae'] = $this->input->post('search_ae');
				$data['search_ae_status'] = $this->input->post('search_ae_status');
				$data['search_psy'] = $this->input->post('search_psy');
				$data['search_psy_status'] = $this->input->post('search_psy_status');
				$data['search_ir_rev'] = $this->input->post('search_ir_rev');
				$data['search_ir_status'] = $this->input->post('search_ir_status');
				$data['search_ss_rev'] = $this->input->post('search_ss_rev');
				$data['search_ss_status_rev'] = $this->input->post('search_ss_status_rev');
				$data['search_ae_rev'] = $this->input->post('search_ae_rev');
				$data['search_ae_status_rev'] = $this->input->post('search_ae_status_rev');
				$data['search_psy_rev'] = $this->input->post('search_psy_rev');
				$data['search_psy_status_rev'] = $this->input->post('search_psy_status_rev');
				
				$data['grades'] = $this->Reports_model->get_all_grades();
				$data['subjects'] = $this->Reports_model->get_all_subjects();
				$data['iwinfos'] = $this->Reports_model->get_all_iw();
				$data['ssinfos'] = $this->Reports_model->get_all_ss();
				$data['aeinfos'] = $this->Reports_model->get_all_ae();
				$data['psyinfos'] = $this->Reports_model->get_all_psy();
				$data['irinfos'] = $this->Reports_model->get_all_ir();
				$data['rev_ssinfos'] = $this->Reports_model->get_all_rev_ss();
				$data['rev_aeinfos'] = $this->Reports_model->get_all_rev_ae();
				$data['rev_psyinfos'] = $this->Reports_model->get_all_rev_psy();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/reports/ceo_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function search_reports_comments()
	{
		if($this->input->post('submit_comments'))
		{		
			if($this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('search_phase') == '' && $this->input->post('search_status') == '')
			{
				redirect(base_url('admin/reports'));
			}
			else
			{
				$data['search_grade'] = $this->input->post('search_grade');
				$data['search_subject'] = $this->input->post('search_subject');
				$data['search_phase'] = $this->input->post('search_phase');
				$data['search_status'] = $this->input->post('search_status');
				
				$data['grades'] = $this->Reports_model->get_all_grades();
				$data['subjects'] = $this->Reports_model->get_all_subjects();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/reports/reports_comments_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function iw_by_subjects()
	{
		echo json_encode($this->Reports_model->get_iw_by_subject($this->input->post('subject_id')));
	}
	
	public function ss_by_subjects()
	{
		echo json_encode($this->Reports_model->get_ss_by_subject($this->input->post('subject_id')));
	}
	
	public function ae_by_subjects()
	{
		echo json_encode($this->Reports_model->get_ae_by_subject($this->input->post('subject_id')));
	}
	
	public function subjects_by_grade()
	{
		echo json_encode($this->Reports_model->get_subjects_by_grade($this->input->post('grade_id')));	
	}
	
	public function datatable_json_ceo_search($id = 0)
	{	
		$records =[];
		$records = $this->Reports_model->get_items_ceo_search($id);
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$editoption ='';
			if($row['item_batch']==1)
			{
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view_erq_crq/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';
				}
			}
			else
			{
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_aview_erq_crq/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_aview/'.$row['item_id']).'" target="_new"> <i class="fa fa-eye"></i></a>';
				}
			}
			
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['grade_name_en'].' ('.$row['grade_code'].')',
				$row['subject_name_en'].' ('.$row['subject_code'].')',
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$editoption
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
	}
	
	public function datatable_json_rep_com_search($id = 0)
	{	
		$records =[];
		$records = $this->Reports_model->get_ceo_rep_com_search($id);
		//print_r($records);
		//die();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$editoption ='';
			$editoption_rev ='';
			if(isset($row['item_rev_revid'])&&$row['item_rev_revid']!="")
			{
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view_erq_crq/'.$row['item_id']).'" target="_new">View Phase I</a>';
					$editoption_rev = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_aview_erq_crq/'.$row['item_id']).'" target="_new" style="margin-top:10px">View Phase II</a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view/'.$row['item_id']).'" target="_new">View Phase I</a>';
					$editoption_rev = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/rev_ae_aview/'.$row['item_id']).'" target="_new" style="margin-top:10px">View Phase II</a>';
				}
			}
			else 
			{
				if($row['item_type']=='ERQ')
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view_erq_crq/'.$row['item_id']).'" target="_new">View Phase I</a>';
				}
				else
				{
					$editoption = '<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/Items/ae_view/'.$row['item_id']).'" target="_new">View Phase I</a>';
				}
			}
			$item_stem_en = html_entity_decode($row['item_stem_en']);
			$item_stem_ur = html_entity_decode($row['item_stem_ur']);
			$data[]= array(
				++$i,
				$row['item_code'],
				mb_strimwidth($item_stem_ur, 0, 30, '...').'<br /> <span class="urdufont-right">'.mb_strimwidth($item_stem_ur, 0, 30, '...').'</span>', 
				mb_strimwidth($row['item_comment_ss'], 0, 30, '...'),
				mb_strimwidth($row['item_comment_ae'], 0, 30, '...'),
				mb_strimwidth($row['item_comment_psy'], 0, 30, '...'),
				$editoption.'<br />'.$editoption_rev
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
	}
	
	public function create_rep_search_commetns($params)
	{
		$temp = explode('_',$params);
		$search_grade = isset($temp[0])?$temp[0]:"";
		$search_subject = isset($temp[1])?$temp[1]:"";
		$search_status = isset($temp[2])?$temp[2]:"";
		$search_phase = isset($temp[3])?$temp[3]:"";
		$rep_type = isset($temp[4])?$temp[4]:"";
		
		$this->load->helper('pdf_helper');
		$data['rep_search_comments'] = $this->Reports_model->rep_search_comments($search_grade, $search_subject, $search_status, $search_phase);
		$data['search_phase'] = $search_phase;
		$data['rep_type'] = $rep_type;
		$this->load->view('admin/reports/rep_search_comments.php', $data);
	}
	/////////////////////////////////////////////////////////////////
	public function rep_iw_ir_advance_summary()
	{
		$data['title'] = 'Item Writer/Reviewer Advance Summary';
		$data['districts'] = $this->Itemreviewers_model->get_all_districts();
		$data['tehsils'] = $this->Itemwriter_model->get_tehsil_by_district($this->input->post('district_id'));
		if($this->input->post('get_rep'))
		{	
			$data['district_id'] = ( $this->input->post('district_id') !='' ? $this->input->post('district_id') : 0);
			$data['tehsil_id'] = ( $this->input->post('tehsil_id') != '' ? $this->input->post('tehsil_id') : 0);
			$data['subject'] = ($this->input->post('subject') !='' ? $this->input->post('subject') : 0);
			$data['department'] = ($this->input->post('department') !='' ? $this->input->post('department') : 0);
			
			$subjectList = $this->session->userdata('subjects_ids');
		}
		$this->load->view('admin/includes/_header',$data);
		$this->load->view('admin/reports/rep_iw_ir_advance_summary');//rep_item_reviewer_profile
		$this->load->view('admin/includes/_footer');
    }
	public function rep_iw_ir_advance_summary_search()
	{
		//$user_type = $department = $name_include = $fname_include = $user_cnic = $user_email = $user_phone = $user_bank = $district_id = $tehsil_id = $user_qualification = $user_exp = $params =  0;
		if($this->input->post('user_type') == "" 
			&& $this->input->post('department') == "" 
			&& $this->input->post('name_include') == ""
			&& $this->input->post('fname_include') == ""
			&& $this->input->post('user_cnic') == ""
			&& $this->input->post('user_email') == ""
			&& $this->input->post('user_phone') == ""
			&& $this->input->post('user_bank') == ""
			&& $this->input->post('district_id') == ""
			&& $this->input->post('tehsil_id') == ""
			&& $this->input->post('user_qualification') == ""
			&& $this->input->post('user_exp') == "")
		{
			$data['title'] = 'Item Writer/Reviewer Advance Summary';
			$this->load->view('admin/includes/_header',$data);
			$this->load->view('admin/reports/rep_iw_ir_advance_summary');//rep_item_reviewer_profile
			$this->load->view('admin/includes/_footer');
			//$this->load->view('admin/reports/rep_iw_ir_advance_summary',$data);
		}
		else
		{
			$data['title'] = 'Item Writer/Reviewer Advance Summary';
			$data['districts'] = $this->Itemreviewers_model->get_all_districts();
				
			$data['user_type'] = ( $this->input->post('user_type') !="" ? $this->input->post('user_type') : "x");
			$data['department'] = ( $this->input->post('department') !="" ? $this->input->post('department') : "x");
			$data['name_include'] = ( $this->input->post('name_include') !="" ? $this->input->post('name_include') : "x");
			$data['fname_include'] = ( $this->input->post('fname_include') !="" ? $this->input->post('fname_include') : "x");
			$data['user_cnic'] = ( $this->input->post('user_cnic') !="" ? $this->input->post('user_cnic') : "x");
			$data['user_email'] = ( $this->input->post('user_email') !="" ? $this->input->post('user_email') : "x");
			$data['user_phone'] = ( $this->input->post('user_phone') !="" ? $this->input->post('user_phone') : "x");
			$data['user_bank'] = ( $this->input->post('user_bank') !="" ? $this->input->post('user_bank') : "x");
			$data['district_id'] = ( $this->input->post('district_id') !="" ? $this->input->post('district_id') : "x");
			$data['tehsil_id'] = ( $this->input->post('tehsil_id') !="" ? $this->input->post('tehsil_id') : "x");
			$data['user_qualification'] = ( $this->input->post('user_qualification') !="" ? $this->input->post('user_qualification') : "x");
			$data['user_exp'] = ( $this->input->post('user_exp') !="" ? $this->input->post('user_exp') : "x");
				
			$this->load->view('admin/includes/_header',$data);
			$this->load->view('admin/reports/rep_iw_ir_advance_summary');//rep_item_reviewer_profile
			$this->load->view('admin/includes/_footer');			
		}
	}
    public function iw_ir_advance_summary_jason($params=0)
	{
        $wh=array();
		$tempx = explode('_',$params);
		$user_typex = $tempx[0];
			
		$records =array();
		$records = $this->Reports_model->iw_ir_advance_summary_jason($params);//get_item_reviewer_jason
		$data = array();
		$i=0;
		if($user_typex==3)
		{
			foreach ($records['data']  as $row) 
			{  
				$data[]= array(
					++$i,
					$row['ci_iw_deptttype'],
					$row['firstname'].' '.$row['lastname'],
					$row['ci_iw_fathername'],
					$row['ci_iw_cnic'] ,
					$row['email'],
					$row['mobile_no'],
					$row['ci_iw_accountnumber'],
					$row['district_name_en'],
					$row['tehsil_name_en'],
					$row['ci_iw_qualification'],
					$row['ci_iw_experienceschool'],
					//'<a  href="'.base_url().'admin/reports/item_writer_info_byid/'.$row['admin_id'].'" target="_blank"><i class="fa fa-eye"></i></a>'
					'<a  href="#" url="'.base_url().'admin/reports/item_writer_info_byid/'.$row['admin_id'].'"><i class="fa fa-eye"></i></a>'
				);
			}
		}
		elseif($user_typex==6)
		{
			foreach ($records['data']  as $row) 
			{  
				$data[]= array(
					++$i,
					$row['ci_ir_deptttype'],
					$row['firstname'].' '.$row['lastname'],
					$row['ci_ir_fathername'],
					$row['ci_ir_cnic'] ,
					$row['email'],
					$row['mobile_no'],
					$row['ci_ir_accountnumber'],
					$row['district_name_en'],
					$row['tehsil_name_en'],
					$row['ci_ir_qualification'],
					$row['ci_ir_experienceschool'],
					//'<a  href="'.base_url().'admin/reports/item_reviewer_info_byid/'.$row['admin_id'].'" target="_blank"><i class="fa fa-eye"></i></a>'
					'<a  href="#" url="'.base_url().'admin/reports/item_reviewer_info_byid/'.$row['admin_id'].'"><i class="fa fa-eye"></i></a>'
				);
			}
		}
		$records['data']=$data;
		echo json_encode($records);	
    }
	
	public function item_writer_info_byid($id)
	{
		 $data['title'] = 'User Profile';
         $data['admin_id'] = $id;
		 $res_data = $this->Reports_model->item_writer_info_byid($id);
		 //$res_data = $this->Itemreviewers_model->item_reviewer_info_byid($id);
         $data['res_data'] = $res_data; 
         $this->load->view('admin/includes/_header',$data);
		 $this->load->view('admin/reports/user_info');
		 $this->load->view('admin/includes/_footer');
    }
	public function item_reviewer_info_byid($id)
	{
         $data['title'] = 'User Profile';
         $data['admin_id'] = $id;
		 $res_data = $this->Reports_model->item_reviewer_info_byid($id);
		 //print_r($res_data);
		 //die('ir');
         //$res_data = $this->Itemreviewers_model->item_reviewer_info_byid($id);
         $data['res_data'] = $res_data; 
         $this->load->view('admin/includes/_header',$data);
		 $this->load->view('admin/reports/user_info');
		 $this->load->view('admin/includes/_footer');
    }
	
	public function plagiarism_check_items($ids = 0)
	{
		$data['title'] = 'Plagiarism Report';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['subjects'] = $this->Items_model->get_all_subjects();
        
        if($this->input->post('get_report'))
		{	
            if($this->session->userdata('admin_role_id')!=1){
            	$data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
				$data['records'] = $this->Reports_model->items_for_comparison($data['item_subject_id']);
			}
			else{
				$this->session->set_flashdata('errors', 'You are not authorized to do this action');
				redirect(base_url('admin/reports/plagiarism_check_items'),'refresh');
			}
		}
		if($ids!=0)
		{	
			//print_r($ids);
			//die();
			if($this->session->userdata('admin_role_id')!=1){
            	$data['item_subject_id'] = ( $this->input->post('item_subject_id') != '' ? $this->input->post('item_subject_id') : 0);
				$data['records'] = $this->Reports_model->items_for_comparison($data['item_subject_id']);
			}
			else{
				$this->session->set_flashdata('errors', 'You are not authorized to do this action');
				redirect(base_url('admin/reports/plagiarism_check_items'),'refresh');
			}
		}
              
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/reports/plagiarism_check_items', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function all_items_by_subject()
	{
		$items_arr = $this->Reports_model->all_items_by_subject($this->input->post('subject_id'));	
		echo json_encode($items_arr);
	}
	public function plagiarism_check_items_comp($id = 0)
	{
		$com_records = explode('_',$id);
		$data['title'] = 'View Item History';
		$data['com_records'] = $com_records;
		//$data['grade'] = $this->Items_model->get_grade_by_id($data['com_records'][0]);
		//$data['subject'] = $this->Items_model->get_subject_by_id($data['com_records'][0]);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/reports/plagiarism_check_items_detail', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function item_plag_compare($id = 0)
	{
		$temp = explode('_',$id);
		$item_id = $temp[0];
		$item_pla_id = $temp[1];
		$data['title'] = 'View Item History';
		$data['grades'] = $this->Items_model->get_all_grades();
		$data['items'] = $this->Items_model->get_item_compare($item_id);
		$data['itemshistory'] = $this->Items_model->get_item_compare($item_pla_id);

		if(isset($data['items'])&&(!empty($data['items'])))
		{
			$data['iwinfo'] = $this->Items_model->get_iwinfo_by_id($data['items'][0]->item_submittedby);
			$data['ssinfo'] = $this->Items_model->get_ssinfo_by_id($data['items'][0]->item_approvedby);
			$data['aeinfo'] = $this->Items_model->get_aeinfo_by_id($data['items'][0]->item_reviewedby);
			$data['psyinfo'] = $this->Items_model->get_psyinfo_by_id($data['items'][0]->item_commentby_psy);
		}
		else
		{
			$data['items'] = '';
		}
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/reports/plagiarism_compare_view', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	
   /* public function plagiarism_jason_items($search_parm){
        print_r($search_parm);
		die();
		$temp = explode('_',$search_parm);
		$item_grade_id = $temp[0];
		$item_subject_id = $temp[1];
        
        $records =[];
		$records = $this->Reports_model->get_item_plagiarism_jason($item_grade_id, $item_subject_id);
        print_r($records);
		die();
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$data[]= array(
                    $row['grade_id'],
                    $row['subject_name_en'],
                    $row['item_type'] ,
                    $row['cs_strand'] ,
                    $row['item_stem_en'],
                   round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$search_str)),strtolower($row['item_stem_en'])) * 100),2)." %",
                    '<a  href="'.base_url().'admin/reports/item_details_byId/'.$row['item_id'].'" target="_blank">Cycle 1</a> '.($row['rev_item_id'] !='' ? ' | <a  href="'.base_url().'admin/items/rev_ss_aview/'.$row['rev_item_id'].'" target="_blank">Cycle 2</a>':'')
                    .($row['pilot_item_id'] !='' ? ' | <a  href="'.base_url().'admin/pilot_items/pilot_ss_view_erq_crq/'.$row['pilot_item_id'].'" target="_blank">Pilot</a>':'')
             );
		}
		$records['data']=$data;
		echo json_encode($records);	
    }
	
	
	//---------------------------------------------------------------
		
	// Export data in CSV format 
	/*public function export_slos_csv(){ 
	   // file name 
		$filename = 'slos_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
		if($this->session->userdata('role_id')==2){
			$subjectList = $this->session->userdata('subjects_ids');			
			$sols_data= $this->Slos_model->get_ae_slos_csv_export($subjectList);
		}		
		else{
			 $sols_data= $this->Slos_model->get_slos_csv_export();
		}
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("SLO-ID", "SLO-Number", "SLO-Topic(Eng)", "SLO-Topic(Urdu)", "Grade", "Subject", "ContentStand", "SubContentStand", "CreatedBy", "Status"); 
		fputcsv($file, $header);
		foreach ($sols_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	
	
	
	
	
/*	public function datatable_json(){				   					   
		$records = $this->Reports_model->get_all_reports();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['reports_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['reports_name_en'],
				$row['reports_name_ur'],
				$row['reports_sort'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['reports_id'].'" 
				id="cb_'.$row['reports_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['reports_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/reports/edit/'.$row['reports_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/reports/edit/'.$row['reports_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/reports/delete/".$row['reports_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Reports_model->change_status();
	}
	//-----------------------------------------------------------
	public function add()
	{
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('reports_code', 'Grade Code', 'trim|required');
			$this->form_validation->set_rules('reports_name_en', 'Grade Name (English)', 'trim|required');
			$this->form_validation->set_rules('reports_name_ur', 'Grade Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('reports_sort', 'Grade Sort', 'trim|required');
			$this->form_validation->set_rules('reports_status', 'Grade Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/reports/add'),'refresh');
			}
			else{
				$data = array(
					'reports_code' => $this->input->post('reports_code'),
					'reports_name_en' => $this->input->post('reports_name_en'),
					'reports_name_ur' => $this->input->post('reports_name_ur'),
					'reports_sort' => $this->input->post('reports_sort'),
					'reports_createdby' =>$this->session->userdata('admin_id'),
					'reports_status' => $this->input->post('reports_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Reports_model->add_grades($data);
				if($result){
					$this->session->set_flashdata('success', 'Grades has been added successfully!');
					redirect(base_url('admin/grades'));
				}
			}
		}
		else{
			$data['title'] = 'Add Grades';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/reports/grades_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0)
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('reports_code', 'Grade Code', 'trim|required');
			$this->form_validation->set_rules('reports_name_en', 'Grade Name (English)', 'trim|required');
			$this->form_validation->set_rules('reports_name_ur', 'Grade Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('reports_sort', 'Grade Sort', 'trim|required');
			$this->form_validation->set_rules('reports_status', 'Grade Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['grades'] = $this->Reports_model->get_grades_by_id($id);
				$data['view'] = 'admin/reports/grades_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'reports_code' => $this->input->post('reports_code'),
					'reports_name_en' => $this->input->post('reports_name_en'),
					'reports_name_ur' => $this->input->post('reports_name_ur'),
					'reports_sort' => $this->input->post('reports_sort'),
					'reports_createdby' =>$this->session->userdata('admin_id'),
					'reports_status' => $this->input->post('reports_status'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Reports_model->edit_grades($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'User has been updated successfully!');
					redirect(base_url('admin/grades'));
				}
			}
		}
		else{
			//die('Edit here');
			$data['title'] = 'Edit Grade';
			$data['grades'] = $this->Reports_model->get_grades_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/reports/grades_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$this->db->delete('ci_grades', array('reports_id' => $id));
		$this->session->set_flashdata('success', 'Grade has been deleted successfully!');
		redirect(base_url('admin/grades'));
	}
	//---------------------------------------------------------------
	*/
}	?>