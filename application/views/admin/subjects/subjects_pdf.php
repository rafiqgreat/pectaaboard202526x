<?php

$html = '
		<h3>Subjects List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
				<th>Subject ID</th>
					<th>Subject Code</th>
					<th>Subject Name (Eng)</th>
					<th>Subject Name (Urdu)</th>
					<th>Subject Sort</th>
					<th>Grade</th>
					<th>Created By</th>
					<th>Subject Status</th>
				</tr>
			</thead>
			<tbody>';			
			foreach($all_subjects as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['subject_id'].'</td>
					<td>'.$row['subject_code'].'</td>
					<td>'.$row['subject_name_en'].'</td>
					<td>'.$row['subject_name_ur'].'</td>
					<td>'.$row['subject_sort'].'</td>
					<td>'.$row['grade_code'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.(($row['subject_status']==1)?'Active':'Inactive').'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
		 $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		 $fontDirs = $defaultConfig['fontDir'];
		 
		 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		 $fontData = $defaultFontConfig['fontdata'];
		 $mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		'fontDir' => array_merge($fontDirs, [ 'D:\xampp\htdocs\www\itembanksystem.com\assets\fonts',]),
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
		$mpdf->SetTitle("Subjects List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'Subjects_list';
		ob_clean();
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();	
?>