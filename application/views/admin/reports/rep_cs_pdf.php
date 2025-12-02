<?php
$html = '
		<h3> Content Strands Summary Report </h3>

		<table border="1" style="width:100%">

			<thead>

				<tr class="headerrow">

				    <th>Grades</th>
					<th>Subjects</th>
					<th>Content Strands</th>
                    <th>SubContent Strands</th>
                    <th>SLOs</th>';  
                if($item_cycle==1)
                {
                   $html .= '<th>Submitted</th>
                             <th>Submitted MCQ</th>
                             <th>Submitted ERQ</th>';
                }


                $html .='<th>AE Accepted</th>
                        <th>AE Accepted  MCQ</th>
                        <th>AE Accepted  ERQ</th>
				</tr>
			</thead>
			<tbody>';			

			foreach($res_data as $row):

			$html .= '		

				<tr class="oddrow">
					<td>'.$row['grade_name_en'].'</td>
					<td>'.$row['subject_name_en'].'</td>
					<td>'.$row['cs_statement_en'].'</td>
					<td>'.$row['subcs_topic'].'</td>
                    <td>'.$row['slo_number'].' '.$row['slo_stem'].'</td>';
                if($item_cycle==1)
                {
                    $html .='<td>'.$row['Submitted'].'</td>
					           <td>'.$row['Submitted_MCQ'].'</td>
                               <td>'.$row['Submitted_ERQ'].'</td>';
                }

				 $html .='	
                    <td>'.$row['AE'].'</td>
                    <td>'.$row['AE_MCQ'].'</td>
                    <td>'.$row['AE_ERQ'].'</td>
				</tr>';

			endforeach;



			$html .=	'</tbody>

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

		$filename = 'Accepted Items_list';

		ob_clean();
        
        $mpdf->SetHTMLHeader('<table><tr>
        <td colspan ="2" style=" text-align:center;padding:20px;"><img src="'.base_url().'/assets/img/pec-image.jpg" width="110" height="130" /></td>
        <td colspan ="3" style="font-size:36px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
        </tr>
        </table><div style="border:1px solid; float:right;width:150px; text-align: right; margin:5px;">Date: '.date('Y-m-d').'</div>');
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
            
            $filename = 'contentStrands_'.date('Y-m-d').'.xls'; 

            header("Content-Description: File Transfer"); 

            header("Content-Disposition: attachment; filename=$filename"); 

            //header("Content-Disposition: attachment;Filename=document_name.xls");

          //  header("Content-Type: application/csv; ");

            header("Content-type: application/vnd.ms-excel");
            echo $header.$html;

            

        }

?>