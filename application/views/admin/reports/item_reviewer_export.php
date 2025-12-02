<?php

$html = '<h3>Item Reviewer Profile </h3>

		<table border="1" style="width:100%">

			<thead>

				<tr class="headerrow">
                    <th>Item Reviewer Name</th>
                    <th>User Name</th>
                    <th>Cell No.</th>
                    <th>DOB</th>
                    <th>CNIC </th>
                    <th>Subject</th>
                    <th>District</th>
                    <th>Tehsil</th>
				</tr>

			</thead>

			<tbody>';			

			foreach($res_data as $row):

			$html .= '		

				<tr class="oddrow">

					<td>'.$row['ci_ir_name'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.$row['ci_ir_mobile'].'</td>
					<td>'.$row['ci_ir_dob'].'</td>
					<td>'.$row['ci_ir_cnic'].'</td>
					<td>'.$row['ci_ir_subject'].'</td>
                    <td>'.$row['district_name_en'].'</td>
                    <td>'.$row['tehsil_name_en'].'</td>

				</tr>';

			endforeach;



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

		$filename = 'ItemReviewer';

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

            $filename = 'ItemReviewer_'.date('Y-m-d').'.xls'; 

            header("Content-Description: File Transfer"); 

            header("Content-Disposition: attachment; filename=$filename"); 

            //header("Content-Disposition: attachment;Filename=document_name.xls");

          //  header("Content-Type: application/csv; ");

            header("Content-type: application/vnd.ms-excel");

            echo $header.$html;

            

        }

?>