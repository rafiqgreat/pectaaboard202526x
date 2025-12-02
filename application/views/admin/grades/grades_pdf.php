<?php
$html = '
		<h3>Grades List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>Grade Code</th>
					<th>Grade Name (Eng)</th>
					<th>Grade Name (Urdu)</th>
					<th>Grade Sort</th>
					<th>Created Date</th>
					<th>Created By</th>
					<th>Grade Status</th>
				</tr>
			</thead>
			<tbody>';
			echo '<PRE>';
			//print_r($all_grades);
			//die();
			foreach($all_grades as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['grade_code'].'</td>
					<td style="font-family:verdana">'.$row['grade_name_en'].'</td>
					<td  style="font-family:urdufont">'.$row['grade_name_ur'].'</td>
					<td>'.$row['grade_sort'].'</td>
					<td>'.$row['grade_created'].'</td>
					<td>'.$row['username'].'</td>
					<td>'.(($row['grade_status']==1)?'Active':'Inactive').'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=default"></script></table>			
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
ob_clean();
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();		
?>