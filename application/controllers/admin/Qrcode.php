<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Qrcode extends MY_Controller {

	public function __construct(){
		parent::__construct();		
		//auth_check_school(); // check login auth
		$this->load->model('admin/Qrcode_model', 'Qrcode_model');
        $this->load->model( 'admin/Certificate_model', 'Certificate_model' );
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
    
    public function verfiyqrcode($qrcode = 0)
	{
        //die($qrcode);
		if($qrcode != 0 && $qrcode != ''){
			$data['title'] = 'Verify QR Code';
            
            $exist = $this->Certificate_model->get_certificate_byid($qrcode);
            $data['verifycode'] = $exist;
            if(!empty($exist) && count($exist)>0)
            {
                $this->session->set_flashdata('success', 'QR Code successfully verified!');
            }
            else
            {
                $data['verifycode'] = '';
                $this->session->set_flashdata('errors', 'QR Code invalid!');
            }			
			
			$data['navbar'] = false;
			$data['sidebar'] = false;
			$data['footer'] = false;
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('admin/qrcode/qrcode_verify');	
			$this->load->view('admin/includes/_footer', $data);
		}
		else
		{
			$this->session->set_flashdata('errors', 'QR Code invalide!');
		}
		//exit();
	}
    
}
?>