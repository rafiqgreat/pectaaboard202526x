<?php
$html = '
		<h3>Item Review Summary Report </h3>

		<table border="1" style="width:100%">

			<thead>

				<tr class="headerrow">
                  <th>Grades</th>
					<th>Subjects</th>
					<th>Items</th>
					<th>MCQ Items</th>
					<th>CRQ Items</th>
					<th>Reviewed</th>
					<th>MCQ Reviewed </th>
					<th>CRQ Reviewed </th>
					<th>SS Pending </th>
					<th>SS MCQ Pending</th>
					<th>SS CRQ Pending</th>
					<th>AE Pending </th>
					<th>AE MCQ Pending</th>
					<th>AE CRQ Pending</th>
				</tr>
			</thead>
			<tbody>';	
            $total_create_items = $total_created_mcq = $total_created_erq = $total_reviewed = $total_reviewed_mcq = $total_reviewed_erq = $total_ss_pening = $total_ss_pening_mcq = $total_ss_pening_erq = $total_ae_pending = $total_ae_pending_mcq = $total_ae_pending_erq = $total_ir_reviewed = $total_ir_reviewed_mcq = $total_ir_reviewed_erq = $total_ir_pending = $total_ir_pending_mcq = $total_ir_pending_erq = 0;

			foreach($res_data as $row):

            $total_create_items     = $total_create_items + $row['C1_Items'];
            $total_created_mcq      = $total_created_mcq + $row['C1_MCQ_Items'];
            $total_created_erq      = $total_create_items - $total_created_mcq;
            $total_reviewed         = $total_reviewed + $row['C2_Reviewed'];
            $total_reviewed_mcq     = $total_reviewed_mcq + $row['C2_MCQ_Reviewed'];
            $total_reviewed_erq     = $total_reviewed - $total_reviewed_mcq;
            $total_ss_pening        = $total_ss_pening + $row['C2_SS_Pending'];
            $total_ss_pening_mcq    = $total_ss_pening_mcq + $row['C2_SS_MCQ_Pending'];
            $total_ss_pening_erq    = $total_ss_pening - $total_ss_pening_mcq;
            $total_ae_pending       = $total_ae_pending + $row['C2_AE_Pending'];
            $total_ae_pending_mcq   = $total_ae_pending_mcq + $row['C2_AE_MCQ_Pending'];
            $total_ae_pending_erq   = $total_ae_pending - $total_ae_pending_mcq;
            $total_ir_reviewed      = $total_ir_reviewed + $row['C2_IR_Reviewed'];
            $total_ir_reviewed_mcq  = $total_ir_reviewed_mcq + $row['C2_IR_MCQ_Reviewed'];
            $total_ir_pending       = $total_ir_pending + $row['C2_IR_Pending'];
            $total_ir_pending_mcq   = $total_ir_pending_mcq + $row['C2_IR_MCQ_Pending'];

			$html .= '		
				<tr class="oddrow">
					<td>'.$row['grade_name_en'].'</td>
                    <td>'.$row['Subjects'].'</td>
                    <td>'.$row['C1_Items'] .'</td>
                    <td>'.$row['C1_MCQ_Items'].'</td>
					<td>'.($row['C1_Items'] - $row['C1_MCQ_Items']).'</td>
                    <td>'.$row['C2_Reviewed'].'</td>
                    <td>'.$row['C2_MCQ_Reviewed'].'</td>
					<td>'.($row['C2_Reviewed'] - $row['C2_MCQ_Reviewed']).'</td>
                    <td>'.$row['C2_SS_Pending'].'</td>
                    <td>'.$row['C2_SS_MCQ_Pending'].'</td>
					<td>'.($row['C2_SS_Pending'] - $row['C2_SS_MCQ_Pending']).'</td>
					<td>'.$row['C2_AE_Pending'].'</td>
					<td>'.$row['C2_AE_MCQ_Pending'].'</td>
					<td>'.($row['C2_AE_Pending'] - $row['C2_AE_MCQ_Pending']).'</td>
				</tr>';

			endforeach;
            
            $html .= '		
				<tr class="oddrow">
					<td colspan="2">Total</td>
                    <td>'.$total_create_items.'</td>
                    <td>'.$total_created_mcq.'</td>
                    <td>'.$total_created_erq.'</td>
					<td>'.$total_reviewed.'</td>
                    <td>'.$total_reviewed_mcq.'</td>
                    <td>'.$total_reviewed_erq.'</td>
					<td>'.$total_ss_pening.'</td>
                    <td>'.$total_ss_pening_mcq.'</td>
                    <td>'.$total_ss_pening_erq.'</td>
					<td>'.$total_ae_pending.'</td>
					<td>'.$total_ae_pending_mcq.'</td>
					<td>'.$total_ae_pending_erq.'</td>
				</tr>';

			$html .='
                    </tbody>
			</table>			
		 ';
        if($rep_type == 'PDF'){
            
		 $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		 $fontDirs = $defaultConfig['fontDir'];
		 
		 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		 $fontData = $defaultFontConfig['fontdata'];
		 $mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		//'fontDir' => array_merge($fontDirs, [ 'D:\xampp\htdocs\www\itembanksystem.com\assets\fonts',]),
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
		$mpdf->SetTitle("Items List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'Item Review Summary Report';
		ob_clean();
        $mpdf->SetHTMLHeader('<table><tr>
        <td colspan ="2" style=" text-align:center;padding:20px;"><img src="'.base_url().'/assets/img/pec-image.jpg" width="110" height="130" /></td>
        <td colspan ="3" style="font-size:36px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
        </tr>
        </table><div style="border:1px solid; float:right;width:150px; text-align: right;">Date: '.date('Y-m-d').'</div>');
         $mpdf->SetHTMLFooter('<p ><span style="width:70%" >Copyright © 2021 pec.edu.pk All rights reserved.</span>
                         <span style="width:30%;text-align: right" colspan="3">Developed By: PEC IT TEAM .</span>
                    </p>');
         $mpdf->AddPage('', // L - landscape, P - portrait 
        '', '', '', '',
        5, // margin_left
        5, // margin right
       60, // margin top
       20, // margin bottom
        0, // margin header
        5); // margin footer
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();	
        }else if($rep_type == 'CSV'){
        
            $header ='<table width="100%"><tr><td colspan="5">&nbsp;</td></tr>
                        <tr>
                        <td colspan ="2" rowspan="2" style=" text-align:center;padding:20px;"><img src="'.base_url().'/assets/img/pec-image.jpg" width="100" height="100" /></td>
                        <td colspan ="3" style="font-size:36px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] Wahdat Colony Road, Lahore</td></tr>
                    </table>';
            $filename = 'Created Review Item Summary'.date('Y-m-d').'.xls'; 
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-type: application/vnd.ms-excel");
            echo $header.$html;
            
        }
?>