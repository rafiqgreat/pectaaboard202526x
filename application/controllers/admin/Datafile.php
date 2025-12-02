<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Datafile extends MY_Controller {

	public function __construct(){

		parent::__construct();

		auth_check(); 

		$this->load->model('admin/Datafile_model', 'Datafile_model');

		$this->load->library('datatable'); 

		require_once APPPATH.'third_party/PHPExcel.php';

		$this->excel = new PHPExcel();

	}

	

	public function create_data_file(){

       
		$data['title'] = 'Imports File';

		

        if($this->input->post('btn_create_df'))

		{

			$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

           

			$path="assets/datafiles/";

			$config['allowed_types'] = 'xlsx|csv|xls';

			$arr_file = explode('.', $_FILES['import_file']['name']);

			$extension = end($arr_file);

		    

			if(isset($_FILES['import_file']['name']) && in_array($_FILES['import_file']['type'], $file_mimes) && in_array($extension,array('xlsx','xls','csv','CSV')) ) {

					

				$fileLoading = PHPExcel_IOFactory::load($_FILES['import_file']['tmp_name']);

                $sheet = $fileLoading->getSheet(0);

               

                $total_rows = $sheet->getHighestRow();

				$highestColumn      = $sheet->getHighestColumn();

				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                

				$records = array();

                

				$totalimport = 0;

					for ($row = 2; $row <= $total_rows; ++ $row) {

						for ($col = 0; $col < $highestColumnIndex; ++ $col) {

							$cell = $sheet->getCellByColumnAndRow($col, $row);

							$val = $cell->getValue();

							$records[$row][$col] = $val;

						}

                        /*if($row == 1){

							if($records[$row][0] != 'IDs' || $records[$row][1] != 'Marks'){

								 $data = array(

								 'errors' => validation_errors()

                                );

								$this->session->set_flashdata('errors', 'File headers are not same as required (IDs, Marks)');

								redirect(base_url('admin/imports/pilot_import_marks'),'refresh');

                            }

                        }*/

						if( $records[$row][0] == ''){

							break;

						}

						$totalimport++;

					}

                

				$nctr = 1;

				$nctrx = '';

				$contents = "";

				

				if(!empty($records)){

					$file_name = 'Data_Files_MCQs_P2/'.$records[2][8].'_G'.($records[2][5]).'_V'.$records[2][9].'_P2_IDs.txt';

					

					$i = 0;

					$j = 2;

					foreach($records as $paper_mcq)

					{

						$nctrx = str_pad($nctr, 4, '0', STR_PAD_LEFT);

						$k = 11;

						$ans_option = '';

						

						for($k = 11; $paper_mcq !=''; $k++)

						{

							$ans = '';

							if($paper_mcq[$k]=='')break;

							if($paper_mcq[$k]==1)

							{$ans='A';}

							elseif($paper_mcq[$k]==2)

							{$ans='B';}

							elseif($paper_mcq[$k]==3)

							{$ans='C';}

							elseif($paper_mcq[$k]==4)

							{$ans='D';}

							elseif($paper_mcq[$k]==5)

							{$ans='X';}

							elseif($paper_mcq[$k]=='N')

							{$ans='N';}

							elseif($paper_mcq[$k]=='X')

							{$ans='X';}

							$ans_option .= $ans;

						}

						$nctr++;

						$contents.= "C".$nctrx.$records[$j][5].$records[$j][6].$records[$j][7].$records[$j][8].$records[$j][9].$ans_option.PHP_EOL;

					}

				}

				

				$fp = fopen($file_name, 'w');

				fwrite($fp, $contents);

				fclose($fp);

				

			}

            else{

                $data = array(

					'errors' => validation_errors()

				);

				$this->session->set_flashdata('errors', 'Not a valid file.Only excel file are allowed');

				redirect(base_url('admin/datafile/data_file'),'refresh');

            }

		}

		

		$this->load->view('admin/includes/_header');

		$this->load->view('admin/datafile/data_file', $data);

		$this->load->view('admin/includes/_footer');

	}

}	

?>