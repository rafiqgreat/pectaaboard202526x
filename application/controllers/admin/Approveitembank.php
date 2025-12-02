<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Approveitembank extends MY_Controller {
	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		$this->load->model('admin/Approveitembank_model', 'Approveitembank_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	public function index(){
		$data['title'] = 'Itemsbanks List';
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/approveitembank/approveitembank_list');
		$this->load->view('admin/includes/_footer');
	}
	
	public function datatable_json(){
		if($this->session->userdata('role_id')==1)
		{
			$records = $this->Approveitembank_model->get_all_itemsbank_complete();
		}		
		$data = array();
		//echo '<PRE>';
		//print_r($records);
		//die();
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
				$row['username'],
				$row['ib_created'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['ib_id'].'" 
				id="cb_'.$row['ib_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['ib_id'].'"></label>',		
				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('admin/approveitembank/view/'.$row['ib_id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Itembank Keys" class="view btn btn-sm btn-info" href="'.base_url('admin/approveitembank/viewk/'.$row['ib_id']).'"> <i class="fa fa-key"></i></a>
				<a title="Edit" class="update btn btn-sm btn-warning" href="javascript:alert(\'Sorry! Cannot edit! contact administrator!\');"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("admin/itemsbank/delete/".$row['ib_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		//echo '<PRE>';
		//print_r($data);
		//die('-------------------');
		echo json_encode($records);						   
	}	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function change_status()
	{   
		$this->Approveitembank_model->change_status();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function view($id = 0)
	{
		$data['title'] = 'View Approved ItemBank';
		$data['grades'] = $this->Approveitembank_model->get_all_grades();
		$data['itemsbank'] = $this->Approveitembank_model->get_itemsbank_by_id($id);
		$data['itemparas16'] = $this->Approveitembank_model->get_paras16_by_subject($data['itemsbank'][0]['ib_subject_id']);
		$data['itemparas'] = $this->Approveitembank_model->get_paras_by_subject($data['itemsbank'][0]['ib_subject_id']);
		
		//echo '<PRE>';
		//print_r($data['itemsbank']);
		//echo '<hr>';
		//print_r($data['itemparas16']);
		//die();
		$data['ib_b1_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item1']);
		$data['ib_b1_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item2']);
		$data['ib_b1_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item3']);
		$data['ib_b1_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item4']);
		
		$data['ib_b2_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item1']);
		$data['ib_b2_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item2']);
		$data['ib_b2_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item3']);
		$data['ib_b2_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item4']);
		$data['ib_b3_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item1']);
		$data['ib_b3_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item2']);
		$data['ib_b3_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item3']);
		$data['ib_b3_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item4']);
		$data['ib_b4_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item1']);
		$data['ib_b4_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item2']);
		$data['ib_b4_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item3']);
		$data['ib_b4_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item4']);
		$data['ib_b5_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item1']);
		$data['ib_b5_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item2']);
		$data['ib_b5_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item3']);
		$data['ib_b5_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item4']);
		$data['ib_b6_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item1']);
		$data['ib_b6_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item2']);
		$data['ib_b6_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item3']);
		$data['ib_b6_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item4']);
		$data['ib_b7_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item1']);
		$data['ib_b7_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item2']);
		$data['ib_b7_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item3']);
		$data['ib_b7_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item4']);
		$data['ib_b8_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item1']);
		$data['ib_b8_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item2']);
		$data['ib_b8_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item3']);
		$data['ib_b8_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item4']);
		$data['ib_b9_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item1']);
		$data['ib_b9_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item2']);
		$data['ib_b9_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item3']);
		$data['ib_b9_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item4']);
		$data['ib_b10_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item1']);
		$data['ib_b10_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item2']);
		$data['ib_b10_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item3']);
		$data['ib_b10_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item4']);
		$data['ib_b11_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item1']);
		$data['ib_b11_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item2']);
		$data['ib_b11_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item3']);
		$data['ib_b11_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item4']);
		$data['ib_b12_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item1']);
		$data['ib_b12_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item2']);
		$data['ib_b12_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item3']);
		$data['ib_b12_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item4']);
		$data['ib_b13_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item1']);
		$data['ib_b13_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item2']);
		$data['ib_b13_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item3']);
		$data['ib_b13_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item4']);
		$data['ib_b14_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item1']);
		$data['ib_b14_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item2']);
		$data['ib_b14_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item3']);
		$data['ib_b14_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item4']);
		$data['ib_b15_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item1']);
		$data['ib_b15_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item2']);
		$data['ib_b15_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item3']);
		$data['ib_b15_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item4']);
		$data['ib_b16_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item1']);
		$data['ib_b16_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item2']);
		$data['ib_b16_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item3']);
		$data['ib_b16_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item4']);
		$data['ib_b17_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item1']);
		$data['ib_b17_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item2']);
		$data['ib_b17_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item3']);
		$data['ib_b17_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item4']);
		$data['ib_b18_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item1']);
		$data['ib_b18_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item2']);
		$data['ib_b18_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item3']);
		$data['ib_b18_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item4']);
		$data['ib_b19_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item1']);
		$data['ib_b19_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item2']);
		$data['ib_b19_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item3']);
		$data['ib_b19_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item4']);
		$data['ib_b20_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item1']);
		$data['ib_b20_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item2']);
		$data['ib_b20_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item3']);
		$data['ib_b20_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item4']);
		$data['ib_b21_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item1']);
		$data['ib_b21_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item2']);
		$data['ib_b21_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item3']);
		$data['ib_b21_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item4']);
		$data['ib_b22_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item1']);
		$data['ib_b22_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item2']);
		$data['ib_b22_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item3']);
		$data['ib_b22_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item4']);
		$data['ib_b23_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item1']);
		$data['ib_b23_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item2']);
		$data['ib_b23_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item3']);
		$data['ib_b23_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item4']);
		$data['ib_b24_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item1']);
		$data['ib_b24_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item2']);
		$data['ib_b24_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item3']);
		$data['ib_b24_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item4']);
		$data['ib_b25_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item1']);
		$data['ib_b25_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item2']);
		$data['ib_b25_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item3']);
		$data['ib_b25_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item4']);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/approveitembank/approveitembank_view', $data);
		$this->load->view('admin/includes/_footer');
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function viewk($id = 0)
	{
		$data['title'] = 'View Approved ItemBank';
		$data['grades'] = $this->Approveitembank_model->get_all_grades();
		$data['itemsbank'] = $this->Approveitembank_model->get_itemsbank_by_id($id);
		$data['itemparas16'] = $this->Approveitembank_model->get_paras16_by_subject($data['itemsbank'][0]['ib_subject_id']);
		$data['itemparas'] = $this->Approveitembank_model->get_paras_by_subject($data['itemsbank'][0]['ib_subject_id']);
		
		//echo '<PRE>';
		//print_r($data['itemsbank']);
		//echo '<hr>';
		//print_r($data['itemparas']);
		//die();
		$data['ib_b1_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item1']);
		//echo '<PRE>';
		//print_r($data['itemsbank']);
		//echo '<hr>';
		//print_r($data['itemparas16']);
		//die();
		$data['ib_b1_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item2']);
		$data['ib_b1_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item3']);
		$data['ib_b1_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b1_item4']);
		
		$data['ib_b2_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item1']);
		$data['ib_b2_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item2']);
		$data['ib_b2_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item3']);
		$data['ib_b2_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b2_item4']);
		$data['ib_b3_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item1']);
		$data['ib_b3_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item2']);
		$data['ib_b3_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item3']);
		$data['ib_b3_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b3_item4']);
		$data['ib_b4_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item1']);
		$data['ib_b4_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item2']);
		$data['ib_b4_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item3']);
		$data['ib_b4_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b4_item4']);
		$data['ib_b5_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item1']);
		$data['ib_b5_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item2']);
		$data['ib_b5_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item3']);
		$data['ib_b5_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b5_item4']);
		$data['ib_b6_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item1']);
		$data['ib_b6_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item2']);
		$data['ib_b6_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item3']);
		$data['ib_b6_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b6_item4']);
		$data['ib_b7_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item1']);
		$data['ib_b7_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item2']);
		$data['ib_b7_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item3']);
		$data['ib_b7_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b7_item4']);
		$data['ib_b8_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item1']);
		$data['ib_b8_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item2']);
		$data['ib_b8_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item3']);
		$data['ib_b8_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b8_item4']);
		$data['ib_b9_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item1']);
		$data['ib_b9_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item2']);
		$data['ib_b9_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item3']);
		$data['ib_b9_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b9_item4']);
		$data['ib_b10_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item1']);
		$data['ib_b10_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item2']);
		$data['ib_b10_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item3']);
		$data['ib_b10_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b10_item4']);
		$data['ib_b11_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item1']);
		$data['ib_b11_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item2']);
		$data['ib_b11_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item3']);
		$data['ib_b11_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b11_item4']);
		$data['ib_b12_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item1']);
		$data['ib_b12_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item2']);
		$data['ib_b12_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item3']);
		$data['ib_b12_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b12_item4']);
		$data['ib_b13_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item1']);
		$data['ib_b13_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item2']);
		$data['ib_b13_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item3']);
		$data['ib_b13_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b13_item4']);
		$data['ib_b14_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item1']);
		$data['ib_b14_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item2']);
		$data['ib_b14_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item3']);
		$data['ib_b14_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b14_item4']);
		$data['ib_b15_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item1']);
		$data['ib_b15_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item2']);
		$data['ib_b15_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item3']);
		$data['ib_b15_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b15_item4']);
		$data['ib_b16_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item1']);
		$data['ib_b16_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item2']);
		$data['ib_b16_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item3']);
		$data['ib_b16_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b16_item4']);
		$data['ib_b17_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item1']);
		$data['ib_b17_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item2']);
		$data['ib_b17_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item3']);
		$data['ib_b17_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b17_item4']);
		$data['ib_b18_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item1']);
		$data['ib_b18_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item2']);
		$data['ib_b18_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item3']);
		$data['ib_b18_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b18_item4']);
		$data['ib_b19_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item1']);
		$data['ib_b19_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item2']);
		$data['ib_b19_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item3']);
		$data['ib_b19_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b19_item4']);
		$data['ib_b20_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item1']);
		$data['ib_b20_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item2']);
		$data['ib_b20_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item3']);
		$data['ib_b20_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b20_item4']);
		$data['ib_b21_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item1']);
		$data['ib_b21_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item2']);
		$data['ib_b21_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item3']);
		$data['ib_b21_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b21_item4']);
		$data['ib_b22_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item1']);
		$data['ib_b22_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item2']);
		$data['ib_b22_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item3']);
		$data['ib_b22_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b22_item4']);
		$data['ib_b23_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item1']);
		$data['ib_b23_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item2']);
		$data['ib_b23_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item3']);
		$data['ib_b23_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b23_item4']);
		$data['ib_b24_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item1']);
		$data['ib_b24_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item2']);
		$data['ib_b24_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item3']);
		$data['ib_b24_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b24_item4']);
		$data['ib_b25_item1'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item1']);
		$data['ib_b25_item2'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item2']);
		$data['ib_b25_item3'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item3']);
		$data['ib_b25_item4'] = $this->Approveitembank_model->get_item_detail_by_id($data['itemsbank'][0]['ib_b25_item4']);
		
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/approveitembank/approveitembank_viewk', $data);
		$this->load->view('admin/includes/_footer');
	}
////////////
	public function delete($id = 0)
	{
		$this->db->delete('ci_itemsbank', array('ib_id' => $id));
		$this->session->set_flashdata('success', 'ItemBank has been deleted successfully!');
		redirect(base_url('admin/itemsbank'));
	}
	//---------------------------------------------------------------	
}
?>