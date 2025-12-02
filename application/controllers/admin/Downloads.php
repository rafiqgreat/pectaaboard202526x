<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Downloads extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Downloads_model', 'Downloads_model');
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	
	public function index()
	{
		$data['title'] = 'Downloads List';
		$data['grades'] = $this->Downloads_model->get_all_grades();
		$data['subjects'] = $this->Downloads_model->get_all_subjects();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/downloads/downloads_flimzy');
		$this->load->view('admin/includes/_footer');
	}
	
	public function search_downloads_flimzy()
	{
		$data['title'] = 'Downloads List';
		if($this->input->post('submit_flimzy'))
		{		
			if($this->input->post('search_grade') == '' && $this->input->post('search_subject') == '' && $this->input->post('search_phase') == '')
			{
				redirect(base_url('admin/downloads'));
			}
			else
			{
				$data['search_grade'] 		= $this->input->post('search_grade');
				$data['search_subject'] 	= $this->input->post('search_subject');
				$data['search_cstand'] 		= $this->input->post('search_cstand');
				$data['search_subcstand'] 	= $this->input->post('search_subcstand');
				$data['search_phase'] 		= $this->input->post('search_phase');				
				
				$data['grades'] = $this->Downloads_model->get_all_grades();
				$data['subjects'] = $this->Downloads_model->get_subjects_by_grade($this->input->post('search_grade'));
				$data['contentstands'] = $this->Downloads_model->get_cstands_by_subject($data['search_subject']);
				$data['subcontentstands'] = $this->Downloads_model->get_subcstands_by_cstand($data['search_cstand']);
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/downloads/downloads_flimzy_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}else{
			redirect(base_url('admin/downloads'));
		}
	}
	
	public function datatable_jsons_ae_accepted_flimzy()
	{
		//$grade_id, $subject_id, $cstand_id, $phase_id
		$grade_id 		= $this->input->get('grade_id');
		$subject_id 	= $this->input->get('subject_id');
		$cstand_id 		= $this->input->get('cstand_id');
		$subcstand_id 	= $this->input->get('subcstand_id');
		$phase_id 		= $this->input->get('phase_id');
		
		$records =[];
		$records = $this->Downloads_model->get_all_items_AE_accepted_flimzy($grade_id, $subject_id, $cstand_id, $subcstand_id, $phase_id);
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  

			$editoption ='';
			if($row['item_type']=='ERQ')
			{
				$editoption = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilot_items/pilot_ss_view_erq_crq/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			else
			{
				$editoption = '<a target="_blank" title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/pilot_items/pilot_ss_view/'.$row['item_id']).'"> <i class="fa fa-eye"></i></a>';
			}
			
			$data[]= array(
				++$i,
				$row['item_batch'],
				$row['firstname'].' '.$row['lastname'],
				$row['item_type'],
				$row['item_code'],
				($row['item_stem_en']!="")?html_entity_decode($row['item_stem_en']):html_entity_decode($row['item_stem_ur']),
				$row['grade_code'],
				$row['subject_code'],
				$row['item_updated'],
				$editoption
			);
		}
		$records['data']=$data;
		
		echo json_encode($records);						   
	}
	
	public function create_flimzy_pdf($type='pdf')
	{
		ini_set("pcre.backtrack_limit", "5000000");
		$grade_id 		= $this->input->get('grade_id');
		$subject_id 	= $this->input->get('subject_id');
		$cstand_id 		= $this->input->get('cstand_id');
		$subcstand_id 	= $this->input->get('subcstand_id');
		$phase_id 		= $this->input->get('phase_id');
		
		$data['all_items'] = $this->Downloads_model->get_flimzy_items_for_export($grade_id, $subject_id, $cstand_id, $subcstand_id, $phase_id);
        if($type == 'pdf'){
		$mpdf = new \Mpdf\Mpdf();
		//$html = $this->load->view('admin/downloads/downloads_flimzy_pdf',$data,true);
		
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];
		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];
		$mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		 'fontDir' => array_merge($fontDirs, [ base_url('admin\assets\fonts')]),
		'fontdata' => $fontData + [
			'urdufont' => [
				'R' => 'NotoNastaliqUrdu-Regular.ttf',
				'I' => 'NotoNastaliqUrdu-Regular.ttf',
			]
		],
		'default_font' => 'verdana']);
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		$mpdf->SetAuthor("PEC IT TEAM");
		$mpdf->SetTitle("Flimzy List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$mpdf->WriteHTML($this->load->view('admin/downloads/downloads_flimzy_pdf',$data,true));
		//$mpdf->Output(); 
		$filename = 'Flimzy_list';
		$mpdf->Output($filename . '.pdf', 'D');
        }else{
            header("Content-Description: File Transfer"); 
            header('Content-Type: application/octet-stream');
           // header("Content-Disposition: attachment; filename=$filename"); 
            echo $this->load->view('admin/downloads/downloads_flimzy_pdf',$data,true);

            header("Content-Disposition: attachment;Filename=Flimzy_list.doc");
        }
		
		//$mpdf->Output('Flimzy_list.pdf', 'D');
		//$this->load->view('admin/downloads/downloads_flimzy_pdf', $data);
	}
	
	public function cstands_by_subject()
	{
		echo json_encode($this->Items_model->get_cstands_by_subject($this->input->post('subject_id')));
	}
	
	public function itemwriter()
	{
		$data['title'] = 'Item Writers Downloads';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/downloads/itemwriters_list');
		$this->load->view('admin/includes/_footer');
	
	}
	public function datatable_json_iw(){
				
		$records = $this->Downloads_model->get_all_itemwriters();
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
	
	public function export_iw_csv() {
		// file name 
		$filename = 'itemwriter_' . date( 'Y-m-d' ) . '.csv';
		header( "Content-Description: File Transfer" );
		header( "Content-Disposition: attachment; filename=$filename" );
		header( "Content-Type: application/csv; " );
		// get data 
		$itemwriter_data = $this->Downloads_model->get_itemwriter_for_export();
		// file creation 
		$file = fopen( 'php://output', 'w' );
		$header = array( "Subject", "Firsrt Name", "Last Name", "Father/Husband", "District", "DOB", "CNIC", "Designation", "Place of Posting" );
		fputcsv( $file, $header );
		foreach ( $itemwriter_data as $key => $line ) {
			fputcsv( $file, $line );
		}
		fclose( $file );
		exit;
	}
	
	public
	function downloads_iw_pdf() {
		$this->load->helper( 'pdf_helper' ); // loaded pdf helper
		$data[ 'all_itemwriter' ] = $this->Downloads_model->get_itemwriter_for_export();
		$this->load->view( 'admin/downloads/downloads_iw_pdf', $data );
	}
	
	public function downloads_admin()
	{
		$data['title'] = 'Downloads List';
		$data['grades'] = $this->Downloads_model->get_all_grades();
		$data['subjects'] = $this->Downloads_model->get_all_subjects();
		$data['iwinfos'] = $this->Downloads_model->get_all_iw();
		$data['ssinfos'] = $this->Downloads_model->get_all_ss();
		$data['aeinfos'] = $this->Downloads_model->get_all_ae();
		$data['psyinfos'] = $this->Downloads_model->get_all_psy();
		$data['irinfos'] = $this->Downloads_model->get_all_ir();
		$data['rev_ssinfos'] = $this->Downloads_model->get_all_rev_ss();
		$data['rev_aeinfos'] = $this->Downloads_model->get_all_rev_ae();
		$data['rev_psyinfos'] = $this->Downloads_model->get_all_rev_psy();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/downloads/downloads_admin');
		$this->load->view('admin/includes/_footer');
	}
	
	public function downloads_comments()
	{
		$data['title'] = 'Downloads List';
		$data['grades'] = $this->Downloads_model->get_all_grades();
		$data['subjects'] = $this->Downloads_model->get_all_subjects();
		$data['iwinfos'] = $this->Downloads_model->get_all_iw();
		$data['ssinfos'] = $this->Downloads_model->get_all_ss();
		$data['aeinfos'] = $this->Downloads_model->get_all_ae();
		$data['psyinfos'] = $this->Downloads_model->get_all_psy();
		$data['irinfos'] = $this->Downloads_model->get_all_ir();
		$data['rev_ssinfos'] = $this->Downloads_model->get_all_rev_ss();
		$data['rev_aeinfos'] = $this->Downloads_model->get_all_rev_ae();
		$data['rev_psyinfos'] = $this->Downloads_model->get_all_rev_psy();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/downloads/downloads_comments');
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
				redirect(base_url('admin/downloads'));
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
				
				$data['grades'] = $this->Downloads_model->get_all_grades();
				$data['subjects'] = $this->Downloads_model->get_all_subjects();
				$data['iwinfos'] = $this->Downloads_model->get_all_iw();
				$data['ssinfos'] = $this->Downloads_model->get_all_ss();
				$data['aeinfos'] = $this->Downloads_model->get_all_ae();
				$data['psyinfos'] = $this->Downloads_model->get_all_psy();
				$data['irinfos'] = $this->Downloads_model->get_all_ir();
				$data['rev_ssinfos'] = $this->Downloads_model->get_all_rev_ss();
				$data['rev_aeinfos'] = $this->Downloads_model->get_all_rev_ae();
				$data['rev_psyinfos'] = $this->Downloads_model->get_all_rev_psy();
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/downloads/ceo_list_search', $data);
				$this->load->view('admin/includes/_footer');				
			}
		}
	}
	
	public function iw_by_subjects()
	{
		echo json_encode($this->Downloads_model->get_iw_by_subject($this->input->post('subject_id')));
	}
	
	public function ss_by_subjects()
	{
		echo json_encode($this->Downloads_model->get_ss_by_subject($this->input->post('subject_id')));
	}
	
	public function ae_by_subjects()
	{
		echo json_encode($this->Downloads_model->get_ae_by_subject($this->input->post('subject_id')));
	}
	
	public function subjects_by_grade()
	{
		echo json_encode($this->Downloads_model->get_subjects_by_grade($this->input->post('grade_id')));	
	}
	
	public function datatable_json_ceo_search($id = 0)
	{	
		$records =[];
		$records = $this->Downloads_model->get_items_ceo_search($id);
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
		$records = $this->Downloads_model->get_ceo_rep_com_search($id);
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
			
			$data[]= array(
				++$i,
				$row['item_code'],
				mb_strimwidth($row['item_stem_en'], 0, 30, '...').'<br /> <span class="urdufont-right">'.mb_strimwidth($row['item_stem_ur'], 0, 30, '...').'</span>', 
				mb_strimwidth($row['item_comment_ss'], 0, 30, '...'),
				mb_strimwidth($row['item_comment_ae'], 0, 30, '...'),
				mb_strimwidth($row['item_comment_psy'], 0, 30, '...'),
				$editoption.'<br />'.$editoption_rev
			);
		}
		$records['data']=$data;
		echo json_encode($records);	
	}
	
/*	public function datatable_json(){				   					   
		$records = $this->Downloads_model->get_all_downloads();
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['downloads_status'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['downloads_name_en'],
				$row['downloads_name_ur'],
				$row['downloads_sort'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['downloads_id'].'" 
				id="cb_'.$row['downloads_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['downloads_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/downloads/edit/'.$row['downloads_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('admin/downloads/edit/'.$row['downloads_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/downloads/delete/".$row['downloads_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
	//-----------------------------------------------------------
	public function change_status(){   
		$this->Downloads_model->change_status();
	}
	//-----------------------------------------------------------
	public function add()
	{
		if($this->input->post('submit'))
			{
			$this->form_validation->set_rules('downloads_code', 'Grade Code', 'trim|required');
			$this->form_validation->set_rules('downloads_name_en', 'Grade Name (English)', 'trim|required');
			$this->form_validation->set_rules('downloads_name_ur', 'Grade Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('downloads_sort', 'Grade Sort', 'trim|required');
			$this->form_validation->set_rules('downloads_status', 'Grade Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/downloads/add'),'refresh');
			}
			else{
				$data = array(
					'downloads_code' => $this->input->post('downloads_code'),
					'downloads_name_en' => $this->input->post('downloads_name_en'),
					'downloads_name_ur' => $this->input->post('downloads_name_ur'),
					'downloads_sort' => $this->input->post('downloads_sort'),
					'downloads_createdby' =>$this->session->userdata('admin_id'),
					'downloads_status' => $this->input->post('downloads_status')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Downloads_model->add_grades($data);
				if($result){
					$this->session->set_flashdata('success', 'Grades has been added successfully!');
					redirect(base_url('admin/grades'));
				}
			}
		}
		else{
			$data['title'] = 'Add Grades';
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/downloads/grades_add');
			$this->load->view('admin/includes/_footer');
		}
		
	}
	//-----------------------------------------------------------
	public function edit($id = 0)
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('downloads_code', 'Grade Code', 'trim|required');
			$this->form_validation->set_rules('downloads_name_en', 'Grade Name (English)', 'trim|required');
			$this->form_validation->set_rules('downloads_name_ur', 'Grade Name (Urdu)', 'trim|required');
			$this->form_validation->set_rules('downloads_sort', 'Grade Sort', 'trim|required');
			$this->form_validation->set_rules('downloads_status', 'Grade Status', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$data['grades'] = $this->Downloads_model->get_grades_by_id($id);
				$data['view'] = 'admin/downloads/grades_edit';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'downloads_code' => $this->input->post('downloads_code'),
					'downloads_name_en' => $this->input->post('downloads_name_en'),
					'downloads_name_ur' => $this->input->post('downloads_name_ur'),
					'downloads_sort' => $this->input->post('downloads_sort'),
					'downloads_createdby' =>$this->session->userdata('admin_id'),
					'downloads_status' => $this->input->post('downloads_status'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->Downloads_model->edit_grades($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'User has been updated successfully!');
					redirect(base_url('admin/grades'));
				}
			}
		}
		else{
			//die('Edit here');
			$data['title'] = 'Edit Grade';
			$data['grades'] = $this->Downloads_model->get_grades_by_id($id);
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/downloads/grades_edit', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	//-----------------------------------------------------------
	public function delete($id = 0)
	{
		$this->db->delete('ci_grades', array('downloads_id' => $id));
		$this->session->set_flashdata('success', 'Grade has been deleted successfully!');
		redirect(base_url('admin/grades'));
	}
	//---------------------------------------------------------------
	//  Export Users PDF 
	public function create_grades_pdf()
	{
		$data['all_grades'] = $this->Downloads_model->get_grades_for_export();
		$this->load->view('admin/downloads/grades_pdf', $data);
	}
	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_grades_csv()
	{ 
	   // file name 
		$filename = 'grades_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 		
		header('Content-Type: text/csv; charset=UTF-8');
	   // get data 
		$grades_data = $this->Downloads_model->get_grades_csv_export();
	   // file creation 
		$file = fopen('php://output', 'w');
		//fputs($file, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
		$header = array("GradesID", "GradesCode", "GradesName(Eng)", "GradesName(Urdu)", "GradesCreated", "GradesCreatedBy", "GradesStatus"); 
		fputcsv($file, $header);
		foreach ($grades_data as $key=>$line){ 		
			//$line = array_map("utf8_decode", $line);
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
	*/
}	?>