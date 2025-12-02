<?php

$html = '
		<h3>SS Pending Item List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>Item ID</th>
					<th>Item Code</th>
					<th>Item Stem (EN)</th>
					<th>Grade</th>
					<th>Submitted By</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>';
			//echo '<PRE>';
			//print_r($all_Subjects);
			//die();
			foreach($all_items as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['item_id'].'</td>
					<td>'.$row['item_code'].'</td>
					<td>'.$row['item_stem_en'].'</td>
					<td>'.$row['grade_code'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.(($row['item_status_ss']==0)?'Pending':'Null').'</td>
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
		$mpdf->SetTitle("SS Pending Item List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'SS_Pending_item_list';
		ob_clean();
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();	
?>