<?php
$html = '
		<h3>Created Items Summary Report </h3>

		<table border="1" style="width:100%">

			<thead>

				<tr class="headerrow">
                  <th>Grades</th>
                  <th>Subjects</th>
                  <th>Submitted Items</th>
                  <th>AE. Finalized</th>
                  <th>Psy. Reviewed</th>
                  <th>Item Reviewed </th>
                  <th>AE Finalized Reviewed </th>
                  <th>Rev. Psy. Reviewed</th>
				</tr>
			</thead>
			<tbody>';	
            $submited_items = $ae_finilized = $psy_reviewed  = $item_reviewed = $ae_final_review = $rev_psy_reviewed = 0;

			foreach($res_data as $row):
                $submited_items = $submited_items + $row['item_submited'];
                $ae_finilized   = $ae_finilized + $row['ae_finalized'];
                $psy_reviewed   = $psy_reviewed + $row['psy_review'];
                $item_reviewed  = $item_reviewed + $row['item_reviewed'];
                $ae_final_review = $ae_final_review + $row['ae_finalized_rev'];
                $rev_psy_reviewed = $rev_psy_reviewed + $row['psy_review_rev'];

			$html .= '		
				<tr class="oddrow">
					<td>'.$row['grade_name_en'].'</td>
					<td>'.$row['subject_name_en'].'</td>
					<td>'.$row['item_submited'].'</td>
					<td>'.$row['ae_finalized'].'</td>
                    <td>'.$row['psy_review'].'</td>
				    <td>'.$row['item_reviewed'].'</td>
                    <td>'.$row['ae_finalized_rev'].'</td>
                    <td>'.$row['psy_review_rev'].'</td>
				</tr>';

			endforeach;

          $html .= '		
				<tr class="oddrow">
                    <th colspan="2">Total</th>
					<td>'.$submited_items.'</td>
					<td>'.$ae_finilized.'</td>
					<td>'.$psy_reviewed.'</td>
					<td>'.$item_reviewed.'</td>
                    <td>'.$ae_final_review.'</td>
				    <td>'.$rev_psy_reviewed.'</td>
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

		$filename = 'Created Item Summary';

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
            $filename = 'Created Item Summary'.date('Y-m-d').'.xls'; 

            header("Content-Description: File Transfer"); 

            header("Content-Disposition: attachment; filename=$filename"); 

            //header("Content-Disposition: attachment;Filename=document_name.xls");

          //  header("Content-Type: application/csv; ");

            header("Content-type: application/vnd.ms-excel");

            echo $header.$html;

            

        }

?>