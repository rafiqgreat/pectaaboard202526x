<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class GenPDF extends CI_Controller {
  
    public function index()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('genpdf_view',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
  
}