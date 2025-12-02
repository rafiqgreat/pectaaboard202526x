<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>PDF</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- jQuery -->
    <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script> 
<style>
body {
	 margin: 0;
	 font-family: Arial, sans-serif;
	 font-size: 12px;
	 font-weight: 400;
	 line-height: 1.5;
	 color: #000000;
	 text-align: left;
	 background-color: #ffffff;
}
.content-wrapper{
	font-family:Arial, Helvetica, sans-serif;
}

@font-face {
 font-family:"Jameel Noori Nastaleeq";
 src:url("<?= base_url()?>assets/fonts/Jameel Noori Nastaleeq.ttf");
 font-weight: bold;
}
.urdufont-right {
	font-family: 'Jameel Noori Nastaleeq', 'Open Sans', sans-serif;
	direction: rtl;
	font-size: 14px;
	font-weight:bold;
}
 @font-face {
 font-family:"AlQalam";
 src:url("<?= base_url()?>assets/fonts/Al_Qalam_Quran_Majeed_Web.ttf");
 font-weight: bold;
}
.alqalam_class {
	font-family: "AlQalam";
	font-weight: bold;
	line-height: initial;
}
 @font-face {
 font-family:"AlQalam2";
 src:url("<?= base_url()?>assets/fonts/2AlQalamQuranPublisher.ttf");
 font-weight: bold;
}
.alqalam2_class {
	font-family: "AlQalam2";
	font-weight: bold;
	line-height: initial;
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
a, a:hover {
	color: #000000;
}
label {
	margin-bottom:0;
	font-size: 16px;
}
img {
	max-width: 100%;
}
.page-columns {
	width: 100%;
	box-sizing: border-box;
}
.columns {
	column-count: 2;
	column-gap: 20px;
	column-rule: 1px solid #000;
}
.block {
}
.dot {
	height: 15px;
	width: 15px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
}
h2, h3{
	font-weight:bold;
	font-size:12px;
	margin:0px;
}
.blockanswer{
	display:inline-block;
	font-weight:bold;
	font-size:12px
}
.answerur{
	height: 14px;
	width: 14px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
	text-align:center;
	margin: 2px 10px 2px 20px;
	font-size: 12px;
	line-height: 14px;
}
.answeren{
	height: 14px;
	width: 14px;
	border: 1px solid #000;
	border-radius: 50%;
	display: inline-block;
	text-align:center;
	margin: 2px 20px 2px 10px;
	font-size: 12px;
	line-height: 14px;
}
@media print {
a[href]:after {
	content: none !important;
}
	 .itemid{
		 display:none;
	 }
}
@page {
  /* Page margins */
  size: 8.27in 11.69in;

  /* Margins adjusted so inner box = 6.5in � 9.75in */
  margin-top: 1in;
  margin-bottom: 1in;
  margin-left: 0.76in;
  margin-right: 0.76in;

  /* HEADER AREA */
  @top-left {
	  font-family: Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	 content: "Model Paper"; /* Replace dynamically if needed */
	 font-size: 12px;
	 font-weight: bold;
	 color: #000;
	 border-bottom: 0.6pt solid #999;
	 vertical-align:bottom;
	 padding-bottom:5px;
  }
  @top-center {
	  font-family: Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	 content:  ' ';
	 font-size: 12px;
	 font-weight: bold;
	 color: #000;
	 border-bottom: 0.6pt solid #999;
	 vertical-align:bottom;
	 padding-bottom:5px;
  }
  @top-right {
	  font-family: Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	 content: "Grade <?php print $modelpaperinfo['grade_code'];?>";
	 font-size: 12px;
	 font-weight: bold;
	 color: #000;
	 border-bottom: 0.6pt solid #999;
	 vertical-align:bottom;
	 padding-bottom:5px;
  }
}
</style>
</head>
<body>
   <div class="content-wrapper">
      <section class="content">
         <div class="card card-default color-palette-bo">
            <div class="card-body">
               <?php $this->load->view('admin/includes/_messages.php');?>
               <div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 12px;">
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
                              
                                  // 🔹 Group by cs_number > Content Strand > Sub Content Strand > mpd_subcstand_id > Item Type > SLO > Bloom
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
                              
                                      $grouped[$cstand][$subcstand][$item->mpd_subcstand_id][$type][$slo][$bloom][] = $item;
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
												  // LOOP through mpd_subcstand_id groups
												  // -------------------------------------------------------
												  foreach ($subcstandGroups as $mpd_id => $types) {
										
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
												  } // end mpd_id
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
   <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</body>
</html>