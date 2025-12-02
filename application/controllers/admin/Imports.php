<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Imports extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Imports_model', 'Imports_model');
		//$this->load->model('admin/Items_model', 'Items_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
		require_once APPPATH.'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();
	}
	public function index(){
		$data['title'] = 'Imports File';
		$data['grades'] = $this->Imports_model->get_all_grades();
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/imports/imports_file', $data);
		$this->load->view('admin/includes/_footer');
	}
    /*********************************************************************
    *   Pilot paper meta information Import 
    *********************************************************************/
    public function pilot_meta_import(){
        
		$data['title'] = 'Pilot Meta information / Tagging Import of Pilot Items';
        if($this->input->post('btn_import'))
		{
            $data['pilot_phase'] = $pilot_phase = $this->input->post('pilot_phase');
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
           // echo $_FILES['upload_file']['type'];
           
           $arr_file = explode('.', $_FILES['upload_file']['name']);
           $extension = end($arr_file);
            
			if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes) && in_array($extension,array('xlsx','xls','csv','CSV')) ) {
					
				//$this->session->userdata('admin_id')
				$fileLoading = PHPExcel_IOFactory::load($_FILES['upload_file']['tmp_name']);
                $sheet = $fileLoading->getSheet(0);
               
                
                $total_rows = $sheet->getHighestRow();
                $highestColumn      = $sheet->getHighestColumn();//BK
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//63
                $records = array();
                $totalimport = 0;
                //	loop over the rows
					for ($row = 41; $row <= $total_rows; ++ $row) {
						for ($col = 0; $col < $highestColumnIndex; ++ $col) {
							$cell = $sheet->getCellByColumnAndRow($col, $row);
							$val = $cell->getValue();
							$records[$row][$col] = $val;
						}
                        if($row == 41){
							if($records[$row][0] != 'Sequence' || $records[$row][1] != 'Item ID' || $records[$row][2] != 'Key' || $records[$row][7] != 'P' 
							|| $records[$row][9] != 'Total Rbis' || $records[$row][11] != 'Flags' || $records[$row][29] != '1 Rbis' || $records[$row][30] != '2 Rbis' 
							|| $records[$row][31] != '3 Rbis' || $records[$row][32] != '4 Rbis' 
							|| $records[$row][43] != '1 Grp1 P' || $records[$row][44] != '1 Grp2 P' || $records[$row][45] != '1 Grp3 P' || $records[$row][46] != '1 Grp4 P' || $records[$row][47] != '1 Grp5 P' 
							|| $records[$row][48] != '2 Grp1 P' || $records[$row][49] != '2 Grp2 P' || $records[$row][50] != '2 Grp3 P' || $records[$row][51] != '2 Grp4 P' || $records[$row][52] != '2 Grp5 P' 
							|| $records[$row][53] != '3 Grp1 P' || $records[$row][54] != '3 Grp2 P' || $records[$row][55] != '3 Grp3 P' || $records[$row][56] != '3 Grp4 P' || $records[$row][57] != '3 Grp5 P' ){
								 $data = array(
								 'errors' => validation_errors()
                                );
								$this->session->set_flashdata('errors', 'File headers are not same as sample');
								redirect(base_url('admin/imports/pilot_meta_import'),'refresh');
                            }
                        }
						if( $records[$row][0] == ''){
							break;
						}
						$totalimport++;
					}
                $data['records'] = $records;
               // echo "<pre>";
                //print_r($records);
            
				if($this->Imports_model->save_meta_info($data) == true)
				{
					$this->session->set_flashdata('success', ($totalimport-1).' Update successfully!');
					//$this->session->set_flashdata('success', ' Update successfully!');
					redirect(base_url('admin/imports/pilot_meta_import'));
				}
                else{
                    
                     $data = array(
					'errors' => validation_errors()
				    );
				    $this->session->set_flashdata('errors', 'Data not updated.');
				    redirect(base_url('admin/imports/pilot_meta_import'),'refresh');
                }
			}///////
            else{
                $data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', 'Not a valid file.Only excel file are allowed');
				redirect(base_url('admin/imports/pilot_meta_import'),'refresh');
                
            }
		}
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/imports/p_meta_import', $data);
		$this->load->view('admin/includes/_footer');
	}
    /*********************************************************************
    *   End Pilot paper meta info import
    *********************************************************************/
	
	public function pilot_crq_meta_import(){
        
		$data['title'] = 'Pilot CRQ Meta information / Tagging Import of Pilot CRQ Items';
        if($this->input->post('btn_import'))
		{
            $data['pilot_phase'] = $pilot_phase = $this->input->post('pilot_phase');
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
           // echo $_FILES['upload_file']['type'];
           
           $arr_file = explode('.', $_FILES['upload_file']['name']);
           $extension = end($arr_file);
            
			if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes) && in_array($extension,array('xlsx','xls','csv','CSV')) ) {
					
				//$this->session->userdata('admin_id')
				$fileLoading = PHPExcel_IOFactory::load($_FILES['upload_file']['tmp_name']);
                $sheet = $fileLoading->getSheet(0);
				  
                $total_rows = $sheet->getHighestRow();
                $highestColumn      = $sheet->getHighestColumn();//BK
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//63
                $records = array();
                $totalimport = 0;
				$maxNumOptions = array();
				
				for ($row = 41; $row <= $total_rows; ++ $row) {
					for ($col = 0; $col < $highestColumnIndex; ++ $col) {
						$cell = $sheet->getCellByColumnAndRow($col, $row);
						$val = $cell->getValue();
						$records[$row][$col] = $val;
					}
					if($row == 41){
						if($records[$row][4] != 'NumOptions'){
							 $data = array(
							 'errors' => validation_errors()
							);
							$this->session->set_flashdata('errors', 'File headers are not same as sample');
							redirect(base_url('admin/imports/pilot_crq_meta_import'),'refresh');
						}
					}
					if( $records[$row][0] == ''){
						break;
					}
					$maxNumOptions[] = $records[$row][4];
				}
				
				$maxNumOptionsValue = max($maxNumOptions); 
				
				if($maxNumOptionsValue > 13){
					$this->session->set_flashdata('errors', 'File headers are exceed the limit');
					redirect(base_url('admin/imports/pilot_crq_meta_import'),'refresh');
				}
				/*die('========123');
				
				print '<pre>';
				print_r($maxNumOptions);
				die('123');*/
				
                //	loop over the rows
					for ($row = 41; $row <= $total_rows; ++ $row) {
						for ($col = 0; $col < $highestColumnIndex; ++ $col) {
							$cell = $sheet->getCellByColumnAndRow($col, $row);
							$val = $cell->getValue();
							$records[$row][$col] = $val;
						}
                        if($row == 41){
							if($records[$row][0] != 'Sequence' || $records[$row][1] != 'Item ID' || $records[$row][2] != 'Key' || $records[$row][7] != 'Item Mean' 
							|| $records[$row][8] != 'Total R' || $records[$row][11] != 'Flags' ){
								 $data = array(
								 'errors' => validation_errors()
                                );
								$this->session->set_flashdata('errors', 'File headers are not same as sample');
								redirect(base_url('admin/imports/pilot_crq_meta_import'),'refresh');
                            }
                        }
						if( $records[$row][0] == ''){
							break;
						}
						$totalimport++;
					}
                $data['records'] = $records;
               /* echo "<pre>";
                print_r($records);
				die('123');*/
            
				if($this->Imports_model->save_crq_meta_info($data, $maxNumOptionsValue) == true)
				{
					$this->session->set_flashdata('success', ($totalimport-1).' Update successfully!');
					//$this->session->set_flashdata('success', ' Update successfully!');
					redirect(base_url('admin/imports/pilot_crq_meta_import'));
				}
                else
				{
                    
                     $data = array(
					'errors' => validation_errors()
				    );
				    $this->session->set_flashdata('errors', 'Data not updated.');
				    redirect(base_url('admin/imports/pilot_crq_meta_import'),'refresh');
                }
			}///////
            else{
                $data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', 'Not a valid file.Only excel file are allowed');
				redirect(base_url('admin/imports/pilot_crq_meta_import'),'refresh');
                
            }
		}
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/imports/p_crq_meta_import', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function pilot_import_marks(){
        
		$data['title'] = 'Import Pilot Total Marks';
        if($this->input->post('btn_import'))
		{
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
           // echo $_FILES['upload_file']['type'];
           
           $arr_file = explode('.', $_FILES['upload_file']['name']);
           $extension = end($arr_file);
            
			if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes) && in_array($extension,array('xlsx','xls','csv','CSV')) ) {
					
				//$this->session->userdata('admin_id')
				$fileLoading = PHPExcel_IOFactory::load($_FILES['upload_file']['tmp_name']);
                $sheet = $fileLoading->getSheet(0);
               
                
                $total_rows = $sheet->getHighestRow();
                $highestColumn      = $sheet->getHighestColumn();//BK
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//63
                $records = array();
                
				$totalimport = 0;
                //	loop over the rows
					for ($row = 1; $row <= $total_rows; ++ $row) {
						for ($col = 0; $col < $highestColumnIndex; ++ $col) {
							$cell = $sheet->getCellByColumnAndRow($col, $row);
							$val = $cell->getValue();
							$records[$row][$col] = $val;
						}
                        if($row == 1){
							if($records[$row][0] != 'IDs' || $records[$row][1] != 'Marks'){
								 $data = array(
								 'errors' => validation_errors()
                                );
								$this->session->set_flashdata('errors', 'File headers are not same as required (IDs, Marks)');
								redirect(base_url('admin/imports/pilot_import_marks'),'refresh');
                            }
                        }
						if( $records[$row][0] == ''){
							break;
						}
						$totalimport++;
					}
                $data['records'] = $records;
               // echo "<pre>";
                //print_r($records);
            
				if($this->Imports_model->save_marks_info($data) == true)
				{
					$this->session->set_flashdata('success', ($totalimport-1).' Update successfully!');
					//$this->session->set_flashdata('success', ' Update successfully!');
					redirect(base_url('admin/imports/pilot_import_marks'));
				}
                else{
                    
                     $data = array(
					'errors' => validation_errors()
				    );
				    $this->session->set_flashdata('errors', 'Data not updated.');
				    redirect(base_url('admin/imports/pilot_import_marks'),'refresh');
                }
			}///////
            else{
                $data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', 'Not a valid file.Only excel file are allowed');
				redirect(base_url('admin/imports/pilot_import_marks'),'refresh');
                
            }
		}
		
		$this->load->view('admin/includes/_header');
		$this->load->view('admin/imports/pilot_import_marks', $data);
		$this->load->view('admin/includes/_footer');
	}
	
	public function subjects_by_grade()
	{
		if($this->session->userdata('role_id')==2)
		{
			$subjectList = $this->session->userdata('subjects_ids');						
			echo json_encode($this->Imports_model->get_subjects_by_grade($this->input->post('grade_id'),$subjectList));	
		}
		else
		{
			echo json_encode($this->Imports_model->get_admin_subjects_by_grade($this->input->post('grade_id')));
		}
	}
	
	public function import_file()
	{
		if($this->input->post('submit'))
		{
			if(empty($_FILES['import_file']['name']))
			{
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', 'No file selected');
				redirect(base_url('admin/imports/import_file'),'refresh');
			}
			else
			{
				$imp_grade_id = $this->input->post('imp_grade_id');
				$imp_subject_id = $this->input->post('imp_subject_id');
				$import_file = $this->input->post('import_file');
				$path="assets/datafiles/";
				$config['allowed_types'] = 'xlsx|csv|xls';
				if(!empty($_FILES['import_file']['name']))
				{
					$result = $this->functions->file_insert($path, 'import_file', 'excel', '9097152');
					if($result['status'] == 1){
						$data['import_file'] = $path.$result['msg'];
					}
					else{
						$this->session->set_flashdata('error', $result['msg']);
						redirect(base_url('admin/imports'), 'refresh');
					}
				}
/////////////////////////////////////////////////////////////----------------------------------------------------------------
				//$this->session->userdata('admin_id')
				$fileLoading = PHPExcel_IOFactory::load($data['import_file']);
				// Set active sheet to first sheet
				$fileLoading->setActiveSheetIndex(0);
				// Set start index of data in Excel File
				$startIndex = 3;
				$subject = [];
				$subject_ctr = 0;
				$cs_stand = [];
				$subcs = [];
				$slo =[];
				
				$fcs_numb = ''; $cs_statement_en = ''; $cs_statement_ur = '';
				$insertedid_ncs_numb = 0;
				
				$fsubcs_numb = ''; $subcs_statement_en = ''; $subcs_statement_ur = '';
				$insertedid_nsubcs_numb = 0;
				
				$fslo_numb = ''; $slo_statement_en = ''; $slo_statement_ur = '';
				$insertedid_nslo_numb = 0;
				
				while( $fileLoading->getActiveSheet()->getCell('A'.$startIndex)->getValue() != '' /*|| $startIndex < 1000*/  )
				{
					//-------------------------------------------------------content strand starts-------------------------------------------------------------
					$ncs_numb = ($fileLoading->getActiveSheet()->getCell('B'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('B'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('B'.$startIndex)->getValue():'';
					$cs_statement_en = ($fileLoading->getActiveSheet()->getCell('C'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('C'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('C'.$startIndex)->getValue():'';
					$cs_statement_ur = ($fileLoading->getActiveSheet()->getCell('D'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('D'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('D'.$startIndex)->getValue():'';
					$nsubcs_numb = ($fileLoading->getActiveSheet()->getCell('E'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('E'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('E'.$startIndex)->getValue():'';
					$subcs_statement_en = ($fileLoading->getActiveSheet()->getCell('F'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('F'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('F'.$startIndex)->getValue():'';
					$subcs_statement_ur = ($fileLoading->getActiveSheet()->getCell('G'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('G'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('G'.$startIndex)->getValue():'';
					$subcs_phase = ($fileLoading->getActiveSheet()->getCell('H'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('H'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('H'.$startIndex)->getValue():'';
					$nslo_numb = ($fileLoading->getActiveSheet()->getCell('I'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('I'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('I'.$startIndex)->getValue():'';
					$slo_statement_en = ($fileLoading->getActiveSheet()->getCell('J'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('J'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('J'.$startIndex)->getValue():'';
					$slo_statement_ur = ($fileLoading->getActiveSheet()->getCell('K'.$startIndex)->getValue()&&$fileLoading->getActiveSheet()->getCell('K'.$startIndex)->getValue()!='')?$fileLoading->getActiveSheet()->getCell('K'.$startIndex)->getValue():'';
					
					$tempsubcsnum = explode('.',$nsubcs_numb);
					$tempslonum = explode('.',$nslo_numb);
					
					if($ncs_numb < 0 || $ncs_numb > 99){
						$this->session->set_flashdata('error', 'Invalid Format (ContentStrands Number must be 1, 2 or .... 99 format)!');
						redirect(base_url('admin/imports'), 'refresh');
					}
					else if(count($tempsubcsnum)!= 2){
						$this->session->set_flashdata('error', 'Invalid Format (SubContentStrands Number must be 1.1, 2.1 .. etc format)!');
						redirect(base_url('admin/imports'), 'refresh');
					}
					else if(count($tempslonum)!= 3){
						$this->session->set_flashdata('error', 'Invalid Format (SLO Number must be 1.1.1, 2.1.1 .. etc format)!');
						redirect(base_url('admin/imports'), 'refresh');
					}
				
					if($fcs_numb != $ncs_numb)
					{
						$sql = 'INSERT INTO ci_content_stands (cs_number, cs_statement_en, cs_statement_ur, cs_grade_id, cs_subject_id, cs_createdby) VALUES ("'.$ncs_numb.'","'.$cs_statement_en.'","'.$cs_statement_ur.'","'.$imp_grade_id.'","'.$imp_subject_id.'", "'.$this->session->userdata('admin_id').'")';
						$result = $this->db->query($sql);
						$insertedid_ncs_numb = $this->db->insert_id(); // last inserted id
						$fcs_numb = $ncs_numb;
					}
					//-------------------------------------------------------content strand ends-------------------------------------------------------------
					
					//-------------------------------------------------------subcontent strand starts--------------------------------------------------------
					
					
					if($fsubcs_numb != $nsubcs_numb)
					{
						$sql = 'INSERT INTO ci_subcontent_stands (subcs_number, subcs_cstand_id, subcs_topic_en, subcs_topic_ur, subcs_grade_id, subcs_subject_id, subcs_phase, subcs_createdby) VALUES ("'.$nsubcs_numb.'","'.$insertedid_ncs_numb.'","'.$subcs_statement_en.'","'.$subcs_statement_ur.'","'.$imp_grade_id.'","'.$imp_subject_id.'","'.$subcs_phase.'",  "'.$this->session->userdata('admin_id').'")';						
						$result = $this->db->query($sql);
						$insertedid_nsubcs_numb = $this->db->insert_id();
						$fsubcs_numb = $nsubcs_numb;
					}
					//-------------------------------------------------------subcontent strand starts-------------------------------------------------------------
					
					//-------------------------------------------------------slos starts--------------------------------------------------------------------------
					
					
					if($fslo_numb != $nslo_numb)
					{
						$sql = 'INSERT INTO ci_slos (slo_number, slo_statement_en, slo_grade_id, slo_subject_id, slo_cstand_id, slo_subcstand_id, slo_createdby, slo_statement_ur) VALUES ("'.$nslo_numb.'","'.$slo_statement_en.'","'.$imp_grade_id.'","'.$imp_subject_id.'","'.$insertedid_ncs_numb.'","'.$insertedid_nsubcs_numb.'","'.$this->session->userdata('admin_id').'","'.$slo_statement_ur.'")';						
						//die($sql); 
						$result = $this->db->query($sql);
						$insertedid_nslo_numb = $this->db->insert_id();
						$fslo_numb = $nslo_numb;
					}
					//-------------------------------------------------------slos starts--------------------------------------------------------------------------
						$startIndex++;
				}
				if($fslo_numb == $nslo_numb)
				{
					$this->session->set_flashdata('success', 'Data Import successfully!');
					redirect(base_url('admin/imports'));
				}
			}
		}
		else
		{	$data['title'] = 'Imports File';
			$data['grades'] = $this->Import_model->get_all_grades();
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/imports/imports_file', $data);
			$this->load->view('admin/includes/_footer');
		}
	}
	/* ye fuction chalta hai
	public function export_file()
	{ 
		$id = $this->input->post('exp_subject_id');
		$filename = 'contents_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$content_data = $this->Imports_model->get_content_csv_export($id);
	   // file creation 
		$file = fopen('php://output', 'w');
		$header = array("Subject", "Content Strand No.", "Content Strand (Eng)", "Content Strand (Urdu)", "Sub-Content Strand No.", "Sub-Content Strand (Eng)", "Sub-Content Strand (Urdu)", "Pilot Phase (1 or 2 or both)", "SLO Number", "SLO Statement (Eng)", "SLO Statement (Urdu)"); 
		fputcsv($file, $header);
		foreach ($content_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit;
	}
	ye fuction excel per data write nai karta
	public function export_file() {
		$id = $this->input->post('exp_subject_id');
		$fileName = 'Content';  
		$content_data = $this->Imports_model->get_content_csv_export($id);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A2', 'Subject');
        $sheet->setCellValue('B2', 'Content Strand No.');
        $sheet->setCellValue('C2', 'Content Strand (Eng)');
        $sheet->setCellValue('D2', 'Content Strand (Ur)');
		$sheet->setCellValue('E2', 'Sub-Content Strand No.');
        $sheet->setCellValue('F2', 'Sub-Content Strand (Eng)');
		$sheet->setCellValue('G2', 'Sub-Content Strand (Ur)');
		$sheet->setCellValue('H2', 'Pilot Phase (1 or 2 or both)');
		$sheet->setCellValue('I2', 'SLO Number');
		$sheet->setCellValue('J2', 'SLO Statement (Eng)');
		$sheet->setCellValue('K2', 'SLO Statement (Ur)');  
		$rows = 3;
		foreach ($content_data as $val){
            $sheet->setCellValue('A' . $rows, $val['subject_name_en']);
            $sheet->setCellValue('B' . $rows, $val['cs_number']);
            $sheet->setCellValue('C' . $rows, $val['cs_statement_en']);
            $sheet->setCellValue('D' . $rows, $val['cs_statement_ur']);
	    	$sheet->setCellValue('E' . $rows, $val['subcs_number']);
            $sheet->setCellValue('F' . $rows, $val['subcs_topic_en']);
			$sheet->setCellValue('G' . $rows, $val['subcs_topic_ur']);
			$sheet->setCellValue('H' . $rows, $val['subcs_phase']);
			$sheet->setCellValue('I' . $rows, $val['slo_number']);
			$sheet->setCellValue('J' . $rows, $val['slo_statement_en']);
			$sheet->setCellValue('K' . $rows, $val['slo_statement_ur']);
            $rows++;
        } 
		$writer = new Xlsx($spreadsheet);
		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"');
        //redirect(base_url()."assets/datafiles/".$fileName);
		$writer->save('php://output');
		//$writer->save("download".$fileName);              
    }*/
	public function export_file()
	{ 
		$id = $this->input->post('exp_subject_id');
		$content_data = $this->Imports_model->get_content_csv_export($id);
		$header = '<table>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="border: 1px solid #000">Subject</td>
			<td style="border: 1px solid #000">Content Strand No.</td>
			<td style="border: 1px solid #000">Content Strand (Eng)</td>
			<td style="border: 1px solid #000">Content Strand (Urdu)</td>
			<td style="border: 1px solid #000">Sub-Content Strand No.</td>
			<td style="border: 1px solid #000">Sub-Content Strand (Eng)</td>
			<td style="border: 1px solid #000">Sub-Content Strand (Urdu)</td>
			<td style="border: 1px solid #000">Pilot Phase (1 or 2 or both)</td>
			<td style="border: 1px solid #000">SLO Number</td>
			<td style="border: 1px solid #000">SLO Statement (Eng)</td>
			<td style="border: 1px solid #000">SLO Statement (Urdu)</td>
		</tr>';//htmlentities//html_entity_decode
		foreach ($content_data as $val){
			$header .= '<tr>
			<td style="border: 1px solid #000">'.htmlentities($val['subject_name_en']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['cs_number']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['cs_statement_en']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['cs_statement_ur']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['subcs_number']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['subcs_topic_en']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['subcs_topic_ur']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['subcs_phase']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['slo_number']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['slo_statement_en']).'</td>
			<td style="border: 1px solid #000">'.htmlentities($val['slo_statement_ur']).'</td>
		</tr>';
		} 
		$header .= '</table>';
		header("Content-Description: File Transfer"); 
				//header("Content-Disposition: attachment; filename=$filename"); 
				//header("Content-Disposition: attachment;Filename=document_name.xls");
				header("Content-Type: application/csv; ");
				header("Content-type: application/vnd.ms-excel");
				echo $header;
	}
	////////////////////////////////////////////////////////////
	public function sample_data()
	{ 
		$header = '<table>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Subject</td>
			<td>Content Strand No.</td>
			<td>Content Strand (Eng)</td>
			<td>Content Strand (Urdu)</td>
			<td>Sub-Content Strand No.</td>
			<td>Sub-Content Strand (Eng)</td>
			<td>Sub-Content Strand (Urdu)</td>
			<td>Pilot Phase (1 or 2 or both)</td>
			<td>SLO Number</td>
			<td>SLO Statement (Eng)</td>
			<td>SLO Statement (Urdu)</td>
		</tr>
		<tr>
			<td>CS/ENG/Urdu ....</td>
			<td>1</td>
			<td>Introduction .....</td>
			<td>تعارف</td>
			<td>1.1</td>
			<td>What is introduction</td>
			<td>تعارف کیا ھے؟</td>
			<td>1</td>
			<td>1.1.1</td>
			<td>Define</td>
			<td>تعارف</td>
		</tr>
		</table>';
		header("Content-Description: File Transfer"); 
				//header("Content-Disposition: attachment; filename=$filename"); 
				//header("Content-Disposition: attachment;Filename=document_name.xls");
				header("Content-Type: application/csv; ");
				header("Content-type: application/vnd.ms-excel");
				echo $header;
	}
}	
?>