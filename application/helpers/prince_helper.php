<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
/*class GenPDF extends CI_Controller {
  
    public function index()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('genpdf_view',[],true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
  
}*/

if (!function_exists('generate_pdfw')) {
    function generate_pdfw($ci, $view, $data = [], $filename = 'output.pdf', $options = [])
    {
        // Load the view into HTML
        $html = $ci->load->view($view, $data, TRUE);
        // ✅ Temp directory
        $temp_path = FCPATH . "prince_temp/";
        if (!is_dir($temp_path)) {
            mkdir($temp_path, 0777, true);
        }

        // Cleanup old files
        foreach (glob($temp_path . "temp_*") as $old_file) {
            if (filemtime($old_file) < time() - 3600) {
                @unlink($old_file);
            }
        }
		  
		  $qr_path = FCPATH . "uploads/qrcodes/";
		  // ✅ Cleanup old QR images (older than 24h)
        foreach (glob($qr_path . "qr_*.png") as $old_qr) {
            if (filemtime($old_qr) < time() - 3600) {
                @unlink($old_qr);
            }
        }

        // Temp HTML file
        $html_file = $temp_path . "temp_" . time() . ".html";
        file_put_contents($html_file, $html);

        // PDF file path
        $pdf_file = $temp_path . $filename;

        // Path to Prince
        $prince = '"C:\\Prince\\bin\\prince.exe"';
//print_r($prince);
//die();
        // Command (simpler: no --header/--footer/--orientation)
        $cmd = $prince . ' ' . escapeshellarg($html_file) . ' -o ' . escapeshellarg($pdf_file) . ' 2>&1';

        // Execute
        exec($cmd, $output, $return_var);

        // Debug on error
        if ($return_var !== 0 || !file_exists($pdf_file)) {
            echo "<pre>";
            echo "❌ PDF Generation Failed\n\n";
            echo "Command Run:\n$cmd\n\n";
            echo "Return Code: $return_var\n\n";
            echo "Output:\n" . implode("\n", $output);
            echo "</pre>";
            exit;
        }

        // ✅ Send PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($pdf_file) . '"');
        readfile($pdf_file);
        exit;
    }
}

if (!function_exists('generate_pdf')) {
    function generate_pdf($ci, $view, $data = [], $filename = 'output.pdf', $options = [])
    {
        // Load view to HTML
        $html = $ci->load->view($view, $data, TRUE);

        // ✅ Temp directory
        $temp_path = FCPATH . "prince_temp/";
		
        if (!is_dir($temp_path)) {
            mkdir($temp_path, 0755, true);
        }

        // Cleanup old temp files (older than 1 hour)
        foreach (glob($temp_path . "temp_*") as $old_file) {
            if (filemtime($old_file) < time() - 3600) {
                @unlink($old_file);
            }
        }
		  
		  $qr_path = FCPATH . "uploads/qrcodes/";
		  // ✅ QR temp directory (optional)
        if (!is_dir($qr_path)) {
            mkdir($qr_path, 0755, true);
        }
        // Cleanup old QR images (older than 1 hour)
        foreach (glob($qr_path . "qr_*.png") as $old_qr) {
            if (filemtime($old_qr) < time() - 3600) {
                @unlink($old_qr);
            }
        }

        // Create temp HTML file
        $html_file = $temp_path . "temp_" . time() . ".html";
        file_put_contents($html_file, $html);

        // Output PDF file
        $pdf_file = $temp_path . $filename;

        // ✅ Path to Prince on Ubuntu
        $prince = '"C:\\Prince\\bin\\prince.exe"';

        // Build command
        $cmd = $prince . ' ' . escapeshellarg($html_file) . ' -o ' . escapeshellarg($pdf_file) . ' 2>&1';

        // Execute Prince
        exec($cmd, $output, $return_var);

        // Handle errors
        if ($return_var !== 0 || !file_exists($pdf_file)) {
            echo "<pre>";
            echo "❌ PDF Generation Failed\n\n";
            echo "Command Run:\n$cmd\n\n";
            echo "Return Code: $return_var\n\n";
            echo "Output:\n" . implode("\n", $output);
            echo "</pre>";
            exit;
        }

        // ✅ Send PDF inline to browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($pdf_file) . '"');
        readfile($pdf_file);
        exit;
    }
}

if (!function_exists('generate_pdf_htmlw')) {
    function generate_pdf_htmlw($ci, $html, $data = [], $filename = 'output.pdf', $options = [])
	 {
		 // ✅ Temp directory
		 $temp_path = FCPATH . "prince_temp/";
		 if (!is_dir($temp_path)) {
			  mkdir($temp_path, 0777, true);
		 }
	
		 // Cleanup old files
		 foreach (glob($temp_path . "temp_*") as $old_file) {
			  if (filemtime($old_file) < time() - 3600) {
					@unlink($old_file);
			  }
		 }
		 
		 foreach (glob($temp_path . "combined_*") as $old_file) {
			  if (filemtime($old_file) < time() - 3600) {
					@unlink($old_file);
			  }
		 }
	
		 // Temp HTML file
		 $html_file = $temp_path . "temp_" . time() . ".html";
		 file_put_contents($html_file, $html);
	
		 // PDF output path
		 $pdf_file = $temp_path . $filename;
	
		 // Path to Prince
		 $prince = '"C:\Prince\bin\prince.exe"';
	
		 // Run Prince (no output to browser)
		 $cmd = $prince . ' ' . escapeshellarg($html_file) . ' -o ' . escapeshellarg($pdf_file) . ' 2>&1';
		 exec($cmd, $output, $return_var);
	
		 if ($return_var !== 0 || !file_exists($pdf_file)) {
			  log_message('error', "Prince PDF generation failed: " . implode("\n", $output));
			  return false;
		 }
	
		 // ✅ Return file path instead of sending it to browser
		 return $pdf_file;
	}
}

if (!function_exists('generate_pdf_html')) 
{
    function generate_pdf_html($ci, $html, $data = [], $filename = 'output.pdf', $options = [])
	 {
		 // ✅ Temp directory
		 $temp_path = FCPATH . "prince_temp/";
		 if (!is_dir($temp_path)) {
			  mkdir($temp_path, 0777, true);
		 }
	
		 // Cleanup old files
		 foreach (glob($temp_path . "temp_*") as $old_file) {
			  if (filemtime($old_file) < time() - 3600) {
					@unlink($old_file);
			  }
		 }
		 
		 foreach (glob($temp_path . "combined_*") as $old_file) {
			  if (filemtime($old_file) < time() - 3600) {
					@unlink($old_file);
			  }
		 }
	
		 // Temp HTML file
		 $html_file = $temp_path . "temp_" . time() . ".html";
		 file_put_contents($html_file, $html);
	
		 // PDF output path
		 $pdf_file = $temp_path . $filename;
	
		 // Path to Prince
		 $prince = '"C:\\Prince\\bin\\prince.exe"';
	
		 // Run Prince (no output to browser)
		 $cmd = $prince . ' ' . escapeshellarg($html_file) . ' -o ' . escapeshellarg($pdf_file) . ' 2>&1';
		 exec($cmd, $output, $return_var);
	
		 if ($return_var !== 0 || !file_exists($pdf_file)) {
			  log_message('error', "Prince PDF generation failed: " . implode("\n", $output));
			  return false;
		 }
	
		 // ✅ Return file path instead of sending it to browser
		 return $pdf_file;
	}

}