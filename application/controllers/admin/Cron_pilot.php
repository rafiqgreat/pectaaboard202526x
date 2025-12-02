<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cron_pilot extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		//$this->load->model('admin/Pilot_Items_model', 'Pilot_Items_model');
		$this->load->model('admin/Items_model', 'Items_model');
		$this->load->model('admin/Cron_model', 'Cron_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){
		$result = $this->Cron_model->copy_rev_items_pilot_table();
		$insert_id = $this->db->insert_id();
		if($result){
			$data = array(
				'log_itemid' => $insert_id,
				'log_admin_id' => $this->session->userdata('admin_id'),
				'log_title' => 'New item created',
				'log_message' => 'New item {{log_itemid}} created by itemwriter {{log_itemwriter_id}} on {{log_date}}',
				'log_messagetype' =>'created'
			);
			$log = $this->Items_model->log_entry($data);
		}
		
	}
}
?>