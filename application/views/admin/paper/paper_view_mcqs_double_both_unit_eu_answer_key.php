<style>
hr {
	margin: 3px 0;
}
.papyertype {
	font-size: 24px;
	font-weight: bold;
	text-align: center;
}
.papyertype2 {
	font-size: 24px;
	font-weight: bold;
}
hr {
	margin: 5px 0;
}
.heading {
	font-size:35px;
}
a, a:hover {
	color: #000000;
}
label {
	margin-bottom:0;
	font-size: 18px;
}
.urdufont-right {
	font-size: 24px;
	line-height: 20px;
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
.main-footer {
	display: none;
}
.tbc-border) {
 border: 1px solid #000;
border-collapse: collapse;
}
.circle {
	display: inline-flex;      /* Use flexbox instead of inline-block */
	justify-content: center;   /* Center horizontally */
	align-items: center;       /* Center vertically */
	width: 25px;
	height: 25px;
	border: 2px solid black;
	border-radius: 50%;
	font-weight: bold;
	font-size: 18px;
	font-family: sans-serif;
	margin-right:10px
}
.answerur {
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
.answeren {
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
.blockanswer {
	display:inline-block;
	font-weight:bold;
}
</style>
<div class="content-wrapper">
   <?php //echo '<pre>'; print_r($paper);?>
   <!-- Main content -->
   <section class="content">
      <div class="card card-default color-palette-bo">
         <div class="card-body"> 
            <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php'); 
				?>
            <?php 
				if(!empty($paper_mcqs)){
				if($subject[0]->subject_code=="ENG" || $subject[0]->subject_code=="GKN" || $subject[0]->subject_code=="MTH" || $subject[0]->subject_code=="SCI"){?>
            <table width="100%" style="border: 1px solid #000; border-collapse: collapse;" class="papyertype">
               <tr>
                  <td width="45%" style="border: 1px solid #000;">Al-Rumi QAT Practice Test</td>
                  <td width="5%" style="border: 1px solid #000; text-align:center"></td>
                  <td width="35%" style="border: 1px solid #000;"><?= $subject[0]->subject_name_en;?></td>
                  <td width="15%" style="border: 1px solid #000;">Grade-
                     <?= $grade[0]->grade_code;?></td>
               </tr>
            </table>
            <table width="100%" class="papyertype">
               <tr>
                  <td style="font-size:40px"><?= $subject[0]->subject_name_en;?></td>
               </tr>
            </table>
            <table width="100%" class="papyertype">
               <tr>
                  <td width="25%" style="border: 1px solid #000; text-align:left">Roll No.</td>
                  <td width="25%" style="border: 1px solid #000; text-align:left">Name : </td>
                  <td width="25%" style="border: 1px solid #000;">Total Marks : (<?php print_r($paper['qat_total_marks']);?>)</td>
                  <td width="25%" style="border: 1px solid #000;">Time : <?php print_r($paper['qat_total_time']);?> Minutes</td>
               </tr>
            </table>
            <table width="100%" class="papyertype">
               <tr>
                  <td width="33%" style="border: 1px solid #000;">Test # <?php print_r($paper['qat_test_number']);?></td>
                  <td width="34%" style="border: 1px solid #000;"><?php print_r($paper['qat_sec_1_title_en']);?></td>
                  <?php 
						if($paper['qat_subcs_phase']==NULL && $paper['qat_cs_id']!=NULL && $paper['qat_sub_id']!=NULL){?>
                  <td width="33%" style="border: 1px solid #000;">Unit # <?php print_r($paper['qat_test_number']);?></td>
                  <?php }
						elseif($paper['qat_subcs_phase']!=NULL && $paper['qat_cs_id']==NULL && $paper['qat_sub_id']!=NULL){?>
                  <td width="33%" style="border: 1px solid #000;">Terms # <?php echo ($paper['qat_test_number']==7)?'1':'2';?></td>
                  <?php }
						elseif($paper['qat_subcs_phase']==NULL && $paper['qat_cs_id']==NULL && $paper['qat_sub_id']!=NULL){?>
                  <td width="33%" style="border: 1px solid #000;">Full Sullabus</td>
                  <?php }?>
               </tr>
            </table>
            <?php } else { ?>
            <table width="100%" style="border: 1px solid #000; border-collapse: collapse;" class="papyertype">
               <tr>
                  <td width="45%" style="border: 1px solid #000;">Al-Rumi QAT Practice Test</td>
                  <td width="5%" style="border: 1px solid #000; text-align:center"></td>
                  <td width="35%" style="border: 1px solid #000;"><?= $subject[0]->subject_name_en;?></td>
                  <td width="15%" style="border: 1px solid #000;">Grade-
                     <?= $grade[0]->grade_code;?></td>
               </tr>
            </table>
            <table width="100%" class="papyertype urdufont-right">
               <tr>
                  <td style="font-size:40px"><?= $subject[0]->subject_name_ur;?></td>
               </tr>
            </table>
            <table width="100%" class="papyertype urdufont-right mt-2" style="font-size:30px !important">
               <tr height="40px">
                  <td width="25%" style="border: 1px solid #000; text-align:right">رول نمبر :</td>
                  <td width="25%" style="border: 1px solid #000; text-align:right">نام:</td>
                  <td width="25%" style="border: 1px solid #000;">کل نمبر : <?php print_r($paper['qat_total_marks']);?></td>
                  <td width="25%" style="border: 1px solid #000;">کل وقت : <?php print_r($paper['qat_total_time']);?> منٹ</td>
               </tr>
            </table>
            <table width="100%" class="papyertype urdufont-right" style="font-size:30px !important">
               <tr height="40px">
                  <?php 
						if($paper['qat_subcs_phase']==NULL && $paper['qat_cs_id']!=NULL && $paper['qat_sub_id']!=NULL){?>
                  <td width="33%" style="border: 1px solid #000;">سبق # <?php print_r($paper['qat_test_number']);?></td>
                  <?php }
						elseif($paper['qat_subcs_phase']!=NULL && $paper['qat_cs_id']==NULL && $paper['qat_sub_id']!=NULL){?>
                  <td width="33%" style="border: 1px solid #000;"> ٹرم # <?php echo ($paper['qat_test_number']==7)?'1':'2';?></td>
                  <?php }
						elseif($paper['qat_subcs_phase']==NULL && $paper['qat_cs_id']==NULL && $paper['qat_sub_id']!=NULL){?>
                  <td width="33%" style="border: 1px solid #000;">فل سلیبس</td>
                  <?php }?>
                  <td width="34%" style="border: 1px solid #000;"><?php print_r($paper['qat_sec_1_title_ur']);?></td>
                  <td width="33%" style="border: 1px solid #000;">ٹیسٹ # <?php print_r($paper['qat_test_number']);?></td>
               </tr>
            </table>
            <?php }
				}else{
					echo '<span style="font-size:30px"> No MCQ Found</span>';
				}
				?>
            <div class="container-fluid" style="margin-top:0px; clear:both;">
               <div class="row">
                  <div style="width: 100%">
                     <?php //die('=====');
							if(!empty($paper_mcqs)){?>
                     <table width="100%" class="papyertype" style="font-size:18px">
                        <tr>
                           <td style="text-align:left"><?php print_r($paper['qat_sec_1_statement_eng']);?></td>
                           <td>(<?php print_r($paper['qat_sec_1_submarks'].' = '.$paper['qat_sec_1_marks']);?>)</td>
                        </tr>
                        <?php if($subject[0]->subject_code=="URD" || $subject[0]->subject_code=="SCI" || $subject[0]->subject_code=="MTH"){?>
                        <tr>
                           <td colspan="2" class="urdufont-right" style="text-align:right; font-size:24px"><?php print_r($paper['qat_sec_1_statement_ur']);?></td>
                        </tr>
                        <?php }?>
                     </table>
                     <?php 	
								$i = 0;
								$subjects = [5,9,13,19,26,32,40,48];
								foreach($paper_mcqs as $item)
								{
									if($item->item_type == 'MCQ')
									{
										$i++;
										if(in_array($item->item_subject_id, $subjects))
										{ ?>
                                 <div class="blockanswer"> <?php print $i.'. ';
                                    if($item->item_option_correct == 'a')
                                       print '<span class="answerur">a<span>';
                                    if($item->item_option_correct == 'b')
                                       print '<span class="answerur">b<span>';
                                    if($item->item_option_correct == 'c')
                                       print '<span class="answerur">c<span>';
                                    if($item->item_option_correct == 'd')
                                       print '<span class="answerur">d<span>';
                                    ?> 
                                 </div>
                                 <?php
										}
										else
										{?>
                              <div class="blockanswer"> 
                                 <?php print $i.'. ';
                                 if($item->item_option_correct == 'a')
                                    print '<span class="answeren">a<span>';
                                 if($item->item_option_correct == 'b')
                                    print '<span class="answeren">b<span>';
                                 if($item->item_option_correct == 'c')
                                    print '<span class="answeren">c<span>';
                                 if($item->item_option_correct == 'd')
                                    print '<span class="answeren">d<span>';
                                 ?> 
                              </div>
                              <?php
										}
									}
								}
							}
							if(!empty($paper_para))
							{
								$paper_para = $paper_para[0];
								$subjects = [5,9,13,19,26,32,40,48];
								if(isset($paper_para->para_item_21)&&$paper_para->para_item_21!=0)
								{
									$para_item_21 = $this->Paper_model->get_item_by_id_eu($paper_para->para_item_21);
									$para_item_21 = (isset($para_item_21[0])&&$para_item_21[0]!="")?$para_item_21[0]:"";
									if($para_item_21!="")
									{
										$ctr = 10 ; 
										if($para_item_21->item_type == 'MCQ')
										{
											$ctr++;
											if(in_array($para_item_21->item_subject_id, $subjects))
											{ ?>
												<div class="blockanswer"> <?php print $ctr.'. ';
													if($para_item_21->item_option_correct == 'a')
														print '<span class="answerur">a<span>';
													if($para_item_21->item_option_correct == 'b')
														print '<span class="answerur">b<span>';
													if($para_item_21->item_option_correct == 'c')
														print '<span class="answerur">c<span>';
													if($para_item_21->item_option_correct == 'd')
														print '<span class="answerur">d<span>';
													?> 
												</div>
												<?php
											}
											else
											{?>
											<div class="blockanswer"> 
												<?php print $ctr.'. ';
												if($para_item_21->item_option_correct == 'a')
													print '<span class="answeren">a<span>';
												if($para_item_21->item_option_correct == 'b')
													print '<span class="answeren">b<span>';
												if($para_item_21->item_option_correct == 'c')
													print '<span class="answeren">c<span>';
												if($para_item_21->item_option_correct == 'd')
													print '<span class="answeren">d<span>';
												?> 
											</div>
											<?php
											}
										}
									}
								}
									
								if(isset($paper_para->para_item_22)&&$paper_para->para_item_22!=0)
								{
									$para_item_22 = $this->Paper_model->get_item_by_id_eu($paper_para->para_item_22);
									$para_item_22 = (isset($para_item_22[0])&&$para_item_22[0]!="")?$para_item_22[0]:"";
									if($para_item_22!="")
									{
										if($para_item_22->item_type == 'MCQ')
										{
											$ctr++;
											if(in_array($para_item_22->item_subject_id, $subjects))
											{ ?>
												<div class="blockanswer"> <?php print $ctr.'. ';
													if($para_item_22->item_option_correct == 'a')
														print '<span class="answerur">a<span>';
													if($para_item_22->item_option_correct == 'b')
														print '<span class="answerur">b<span>';
													if($para_item_22->item_option_correct == 'c')
														print '<span class="answerur">c<span>';
													if($para_item_22->item_option_correct == 'd')
														print '<span class="answerur">d<span>';
													?> 
												</div>
												<?php
											}
											else
											{?>
											<div class="blockanswer"> 
												<?php print $ctr.'. ';
												if($para_item_22->item_option_correct == 'a')
													print '<span class="answeren">a<span>';
												if($para_item_22->item_option_correct == 'b')
													print '<span class="answeren">b<span>';
												if($para_item_22->item_option_correct == 'c')
													print '<span class="answeren">c<span>';
												if($para_item_22->item_option_correct == 'd')
													print '<span class="answeren">d<span>';
												?> 
											</div>
											<?php
											}
										}
									}
								}
								
								if(isset($paper_para->para_item_23)&&$paper_para->para_item_23!=0)
								{
									$para_item_23 = $this->Paper_model->get_item_by_id_eu($paper_para->para_item_23);
									$para_item_23 = (isset($para_item_23[0])&&$para_item_23[0]!="")?$para_item_23[0]:"";
									if($para_item_23!="")
									{
										if($para_item_23->item_type == 'MCQ')
										{
											$ctr++;
											if(in_array($para_item_23->item_subject_id, $subjects))
											{ ?>
												<div class="blockanswer"> <?php print $ctr.'. ';
													if($para_item_23->item_option_correct == 'a')
														print '<span class="answerur">a<span>';
													if($para_item_23->item_option_correct == 'b')
														print '<span class="answerur">b<span>';
													if($para_item_23->item_option_correct == 'c')
														print '<span class="answerur">c<span>';
													if($para_item_23->item_option_correct == 'd')
														print '<span class="answerur">d<span>';
													?> 
												</div>
												<?php
											}
											else
											{?>
											<div class="blockanswer"> 
												<?php print $ctr.'. ';
												if($para_item_23->item_option_correct == 'a')
													print '<span class="answeren">a<span>';
												if($para_item_23->item_option_correct == 'b')
													print '<span class="answeren">b<span>';
												if($para_item_23->item_option_correct == 'c')
													print '<span class="answeren">c<span>';
												if($para_item_23->item_option_correct == 'd')
													print '<span class="answeren">d<span>';
												?> 
											</div>
											<?php
											}
										}
									}
								}
							}
						   ?>
                  </div>
               </div>
               <!---- end  here is item view filmzy ---> 
            </div>
            
            <!-- /.box-body --> 
         </div>
      </div>
   </section>
</div>
