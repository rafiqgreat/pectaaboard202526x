<style>
.content-wrapper{
	font-family:Arial, Helvetica, sans-serif;
}
hr {
	margin: 3px 0;
}
.papyertype {
	font-size: 24px;
	font-weight: bold;
	text-align: center;
}
hr {
	margin: 15px 0;
	border: 1px solid #000;
	height:0px;
}
.heading {
	font-size:36px;
}
a, a:hover {
	color: #000000;
}
label {
	margin-bottom:0;
	font-size: 16px;
}
.content-block {
	page-break-inside: avoid;
}
.content-block strong {
/*font-weight: normal;*/
  }
.content-block:nth-child(odd) {
 clear: both;
}
img {
	max-width: 100%;
}
.page-columns {
	width: 100%;
	padding: 20px;
	box-sizing: border-box;
}
.columns {
	column-count: 2;
	column-gap: 20px;
	column-rule: 1px solid #000;
}
.block {
	break-inside: avoid;
	margin-bottom: 5px;
}
.dot {
	height: 15px;
	width: 15px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
}
.answerur{
	height: 25px;
	width: 25px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
	text-align:center;
	margin: 2px 10px 2px 20px;
	font-size: 20px;
	line-height: 20px;
}
.answeren{
	height: 25px;
	width: 25px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
	text-align:center;
	margin: 2px 20px 2px 10px;
	font-size: 20px;
	line-height: 20px;
}
.blockanswer{
	display:inline-block;
	font-weight:bold;
}
@media print {
a[href]:after {
	content: none !important;
}
.main-footer {
	display: none;
}
.page-columns {
/* page-break-after: always;*/
    }
	 .itemid{
		 display:none;
	 }
}
</style>
<div class="content-wrapper">
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<?php $this->load->view('admin/includes/_messages.php');?>
				<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 28px; margin-bottom:0px;">
               <div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: capitalize;">
                   Grade - <?php print $modelpaperinfo['grade_code'];?> <?php print $modelpaperinfo['subject_name_en']?> Model Paper
               </div>
            </div>
				<div class="container-fluid">
					<div class="row">
						<div style="width: 100%">
                  	<div class="page-columns" style="padding-top: 0px;">
                     	<div class="columns">
									<?php
									$flagmcq = 0;
									$flagerq = 0;
									
									if (!empty($items)) {
										 $data = $items;
										 $grouped = [];
									
										 // 🔹 Group by cs_number > Content Strand > Sub Content Strand > tpd_subcstand_id > Item Type > SLO > Bloom
										 $k = 0;
										 foreach ($data as $item) {
											  $subjects = [5,9,13,19,26,32,40,48];
											  $chapter_main = explode('.', $item->subcs_number)[0];
											  if (in_array($item->item_subject_id, $subjects)) 
											  {
													$cstand = 'Domain: <span class="urdufont-right">'.$item->cs_statement_ur.'<span>';
													$subcstand = 'Sub Domain: <span class="urdufont-right">'.$item->subcs_topic_ur.'<span>';
											  } else 
											  {
													$cstand = 'Domain: '.$item->cs_statement_en;
													$subcstand = 'Sub Domain: '.$item->subcs_topic_en;
											  }
									
											  $type  = $item->item_type;
											  $slo   = 'SLO '.$item->slo_number;
											  $bloom = $item->item_cognitive_bloom;
									
											  $grouped[$cstand][$subcstand][$item->tpd_subcstand_id][$type][$slo][$bloom][] = $item;
										 }
									
										 // 🔹 Sort by cs_number
										 ksort($grouped);
										 foreach ($grouped as $cstand_name => $subcstands) {

											 // -------------------------------------------------------
											 // CHECK: Does this Content Strand contain any MCQ?
											 // -------------------------------------------------------
											 $hasMCQinCS = false;
											 foreach ($subcstands as $subGroups) {
												  foreach ($subGroups as $types) {
														if (isset($types['MCQ'])) {
															 $hasMCQinCS = true;
															 break 2;
														}
												  }
											 }
										
											 if (!$hasMCQinCS) continue; // Skip Content Strand with no MCQs
										
											 // PRINT CONTENT STRAND HEADING
											 print '<h3 style="text-align:center"><strong>'.$cstand_name.'</strong></h3>';
											 ksort($subcstands); // sort sub content strands
										
										
											 // -------------------------------------------------------
											 // LOOP THROUGH SUB CONTENT STRANDS
											 // -------------------------------------------------------
											 foreach ($subcstands as $subcstand_name => $subcstandGroups) {
										
												  // CHECK: Does this Sub Content Strand contain any MCQ?
												  $hasMCQinSubCS = false;
												  foreach ($subcstandGroups as $types) {
														if (isset($types['MCQ'])) {
															 $hasMCQinSubCS = true;
															 break;
														}
												  }
										
												  if (!$hasMCQinSubCS) continue; // Skip this sub strand if no MCQs
										
												  // PRINT SUB CONTENT STRAND HEADING
												  print '<h3 style="text-align:center"><strong>'.$subcstand_name.'</strong></h3>';
										
										
												  // -------------------------------------------------------
												  // LOOP through tpd_subcstand_id groups
												  // -------------------------------------------------------
												  foreach ($subcstandGroups as $tpd_id => $types) {
										
														// Only MCQs needed
														if (!isset($types['MCQ'])) continue;
										
														// MCQ heading
														print '<div style="text-align:center; margin:15px;">
																	  <span style="border:2px dotted; padding:5px 20px;">
																			<strong>Objective Part Keys</strong>&nbsp;<span class="urdufont-right">حصہ معروضی جوابات</span>
																	  </span>
																 </div>';
										
														$i = 0;
										
														foreach ($types['MCQ'] as $slo_name => $blooms) {
															 foreach ($blooms as $bloom_name => $itemsMCQ) {
										
																  foreach ($itemsMCQ as $item) {
																		$i++;
										
																		// Urdu subject list
																		$subjects = [5,9,13,19,26,32,40,48];
										
																		echo '<div class="blockanswer">'.$i.'. ';
										
																		// Urdu style circle
																		if (in_array($item->item_subject_id, $subjects)) {
																			 if ($item->item_option_correct == 'a') echo '<span class="answerur">a</span>';
																			 if ($item->item_option_correct == 'b') echo '<span class="answerur">b</span>';
																			 if ($item->item_option_correct == 'c') echo '<span class="answerur">c</span>';
																			 if ($item->item_option_correct == 'd') echo '<span class="answerur">d</span>';
										
																		// English style circle
																		} else {
																			 if ($item->item_option_correct == 'a') echo '<span class="answeren">a</span>';
																			 if ($item->item_option_correct == 'b') echo '<span class="answeren">b</span>';
																			 if ($item->item_option_correct == 'c') echo '<span class="answeren">c</span>';
																			 if ($item->item_option_correct == 'd') echo '<span class="answeren">d</span>';
																		}
										
																		echo '</div>';
																  }
															 }
														}
												  } // end tpd_id
											 } // end subcstands
										} // end cstands
									}
									?>
								</div>
                     </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>