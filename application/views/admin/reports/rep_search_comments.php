<?php
		if($rep_type == 'pdf')
		{
			$html = '
				<h3>Search Comments List</h3>
				<table border="1" style="width:100%">
					<thead>
						<tr class="headerrow">
							<th width="5%">Sr. No.</th>
							<th width="10%">Item Code</th>
							<th width="25%">Item Stem(Eng)</th>
							<th width="25%">Item Stem(Ur)</th>
							<th width="10%">SS Comments</th>
							<th width="10%">AE Comments</th>
							<th width="15%">PSM Comments</th>
						</tr>
					</thead>
					<tbody>';
					$i=1;
					foreach($rep_search_comments as $row):
					if($search_phase ==1)
					{  // die('if');
						$item_stem_en = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_en']).'</span>';
						$item_stem_ur = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_ur']).'</span>';
						//$item_stem_ur = '<div class="urdufont-right">'.html_entity_decode($row['item_stem_ur']).'</div>';
						$html .= '		
							<tr class="oddrow">
								<td>'.$i.'</td>
								<td>'.$row['item_code'].'</td>
								<td>'.$item_stem_en.'</td>
								<td>'.$item_stem_ur.'</td>
								<td>'.$row['item_comment_ss'].'</td>
								<td>'.$row['item_comment_ae'].'</td>
								<td>'.$row['item_comment_psy'].'</td>
							</tr>';
					}
					else
					{//die('else');
						$item_stem_en = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_en']).'</span>';
						$item_stem_ur = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_ur']).'</span>';
						$html .= '		
							<tr class="oddrow">
								<td>'.$i.'</td>
								<td>'.$row['item_code'].'</td>
								<td>'.$item_stem_en.'</td>
								<td>'.$item_stem_ur.'</td>
								<td>'.$row['item_rev_ss_comment'].'</td>
								<td>'.$row['item_rev_ae_comment'].'</td>
								<td>'.$row['item_rev_psy_comment'].'</td>
							</tr>';
					}
					$i++;
					endforeach;
			$html .=	'</tbody>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=default"></script>
			</table>';

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
	
			$mpdf->SetTitle("Search Comments List");
	
			$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
	
			$filename = 'Search Comments List';
			
			ob_clean();
			$mpdf->SetHTMLHeader('<table  width="100%"><tr>
			<td width="20%" style="padding:20px; float:left"><img src="'.base_url().'/assets/img/pec-image.jpg" width="50" /></td>
			<td width="60%" style="font-size:20px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
			<td width="20%" style="font-size:14px; text-align:center;"><div style="width:150px; float:right">Date: '.date('Y-m-d').'</div></td>
			</tr>
			</table>');
			 $mpdf->SetHTMLFooter('<p ><span style="width:70%" >Copyright © 2021 pec.edu.pk All rights reserved.</span>
							 <span style="width:30%;text-align: right" colspan="3">Developed By: PEC IT TEAM .</span>
						</p>');
			$mpdf->AddPage('L', // L - landscape, P - portrait 
			'', '', '', '',
			8, // margin_left
			8, // margin right
		   25, // margin top
		   10, // margin bottom
			0, // margin header
			5); // margin footer			
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit();	
		}
		elseif($rep_type == 'csv')
		{
			$html = '
				<h3>Search Comments List</h3>
				<table border="1" style="width:100%">
					<thead>
						<tr class="headerrow">
							<th>Sr. No.</th>
							<th>Item Code</th>
							<th>Item Stem(Eng)</th>
							<th>Item Stem(Ur)</th>
							<th>SS Comments</th>
							<th>AE Comments</th>
							<th>PSM Comments</th>
						</tr>
					</thead>
					<tbody>';
					$i=1;
					foreach($rep_search_comments as $row):
					if($search_phase ==1)
					{  // die('if');
						$item_stem_en = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_en']).'</span>';
						$item_stem_ur = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_ur']).'</span>';
						$item_stem_ur = '<div class="urdufont-right">'.html_entity_decode($row['item_stem_ur']).'</div>';
						$html .= '		
							<tr class="oddrow">
								<td>'.$i.'</td>
								<td>'.$row['item_code'].'</td>
								<td>'.$item_stem_en.'</td>
								<td>'.$item_stem_ur.'</td>
								<td>'.$row['item_comment_ss'].'</td>
								<td>'.$row['item_comment_ae'].'</td>
								<td>'.$row['item_comment_psy'].'</td>
							</tr>';
					}
					else
					{//die('else');
						$item_stem_en = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_en']).'</span>';
						$item_stem_ur = '<span style="font-size:14px">'.html_entity_decode($row['item_stem_ur']).'</span>';
						$html .= '		
							<tr class="oddrow">
								<td>'.$i.'</td>
								<td>'.$row['item_code'].'</td>
								<td>'.$item_stem_en.'</td>
								<td>'.$item_stem_ur.'</td>
								<td>'.$row['item_rev_ss_comment'].'</td>
								<td>'.$row['item_rev_ae_comment'].'</td>
								<td>'.$row['item_rev_psy_comment'].'</td>
							</tr>';
					}
					$i++;
					endforeach;
			$html .=	'</tbody>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=default"></script>
			</table>';
			
			$header ='
				<table  width="100%">
					<tr>
						<td width="20%" style="padding:20px; float:left"><img src="'.base_url().'/assets/img/pec-image.jpg" width="50" /></td>
						<td width="60%" colspan="3" style="font-size:20px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC] <br>Wahdat Colony Road, Lahore</td>
						<td width="20%" colspan="2" style="font-size:14px; text-align:center;"><div style="width:150px; float:right">Date: '.date('Y-m-d').'</div></td>
					</tr>
				</table>';
            $filename = 'Search Comments List'.date('Y-m-d').'.xls'; 
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-type: application/vnd.ms-excel");
            echo $header.$html;
        }
?>