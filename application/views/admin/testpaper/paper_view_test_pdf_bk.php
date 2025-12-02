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

   <style type="text/css">
		table {
		  border-collapse: collapse;
		}
		body {
			 margin: 0;
			 font-family: Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
			 font-size: 1rem;
			 font-weight: 400;
			 line-height: 1.5;
			 color: #000000;
			 text-align: left;
			 background-color: #ffffff;
		}
      @font-face {
       font-family:"Jameel Noori Nastaleeq";
       src:url("<?= base_url()?>assets/fonts/Jameel Noori Nastaleeq.ttf");
       font-weight: bold;
      }
      .urdufont-right {
         font-family: 'Jameel Noori Nastaleeq', 'Open Sans', sans-serif;
         direction: rtl;
         font-size: 26px;
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
		.papyertype {
			 font-size: 12px;
			 font-weight: bold;
			 text-align: center;
		}
      hr {
         margin: 3px 0;
      }
      .fontsize {
         font-size: 24px !important;
         font-weight: bold;
      }
      label {
         margin-bottom:0;
      }
      .heading {
         font-size:34px;
      }
      a, a:hover {
         color: #000000;
      }
      /*.content-block {
         page-break-inside: avoid;
      }
      .paracontent-block {
         page-break-inside: avoid;
      }*/
      .txtright_fullwidth {
         width: 100%;
         text-align: right;
      }
       .mcqsboclk .content-block:nth-child(odd) {
       clear: both;
      }
       .parablock .content-block:nth-child(even) {
       clear: both;
      }
      .urdufont-right {
         font-size: 14px;
      }
      img {
         max-width: 100%;
      }
		
		.optionimg{
			max-width:80px;
		}
		.circle {
		  display: inline-flex;      /* Use flexbox instead of inline-block */
		  justify-content: center;   /* Center horizontally */
		  align-items: center;       /* Center vertically */
		  width: 16px;
		  height: 16px;
		  border: 1px solid black;
		  border-radius: 50%;
		  font-weight: bold;
		  font-size: 12px;
		  font-family: sans-serif;
		  margin-right:10px;
		  line-height:16px;
		}
		@page {
		  /* Page margins */
		  size: 8.27in 11.69in;

		  /* Margins adjusted so inner box = 6.5in × 9.75in */
		  margin-top: 1in;
		  margin-bottom: 1in;
		  margin-left: 0.76in;
		  margin-right: 0.76in;
		
		  /* HEADER AREA */
		  @top-left {
			 font-family: Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
			 /*content: "Al-Rumi QAT"; /* Replace dynamically if needed */
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
			 content: "Grade <?php print $paper_mcqs[0]->item_grade_id-2;?> ";
			 font-size: 12px;
			 font-weight: bold;
			 color: #000;
			 border-bottom: 0.6pt solid #999;
			 vertical-align:bottom;
			 padding-bottom:5px;
		  }
      </style>
   </head>
   <body>
   	<div>
      <?php 
	  $header = "";
	if ($items[0]->item_grade_id == "7") {
    		if ($items[0]->subject_code == "ENG") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/5EA.jpg" style="max-height:400px;"/>';
    		}
    		if ($items[0]->subject_code == "MTH") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/5MA.jpg" style="max-height:400px;"/>';
    		}
    		if ($items[0]->subject_code == "SCI") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/5SA.jpg" style="max-height:400px;"/>';
    		}
    		if ($items[0]->subject_code == "URD") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/5UA.jpg" style="max-height:400px;"/>';
    		}
	}
	  
	  if($items[0]->item_grade_id=="10")
	  {
		  if ($items[0]->subject_code == "ENG") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/8EA.jpg" style="max-height:400px;"/>';
    		}
    		if ($items[0]->subject_code == "MTH") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/8MA.jpg" style="max-height:400px;"/>';
    		}
    		if ($items[0]->subject_code == "SCI") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/8SA.jpg" style="max-height:400px;"/>';
    		}
    		if ($items[0]->subject_code == "URD") {
        		$header = '<img src="http://145.223.74.91/pectaaboard2025-26/assets/header/8UA.jpg" style="max-height:400px;"/>';
    		}
		  
	  }
	  ?>
          <?php 
      if(!empty($items)){
		  //echo '<pre>'; print_r($modelpaperinfo); echo '<br>'; print_r($items[0]); 
		  print_r($header);      
	if($items[0]->subject_code=="ENG" || $items[0]->subject_code=="GKN" || $items[0]->subject_code=="MTH" || $items[0]->subject_code=="SCI"){?>
          <table width="100%" class="papyertype">
              <tr>
                  <td width="25%" style="border: 1px solid #000;">Time: 1 HOUR</td>
                  <td width="50%" style="border: 1px solid #000;">Section-I (Multiple Choice Question)</td>
                  <td width="25%" style="border: 1px solid #000;">Total Marks : 40</td>
              </tr>
          </table>
          <?php } else { ?>
          <table width="100%" class="papyertype">
              <tr>
                  <td width="25%" class="urdufont-right" style="border: 1px solid #000;"> وقت 1 گھنٹہ</td>
                  <td width="50%" class="urdufont-right" style="border: 1px solid #000;">سیکشن-ا (معروصی سوالات)</td>
                  <td width="25%" class="urdufont-right" style="border: 1px solid #000;">کل نمبر</td>
              </tr>
          </table>
      <?php }
      }else{
         echo '<span style="font-size:30px"> No MCQ Found</span>';
      }
      ?>
            <div>
               <?php //die('=====');
               if(!empty($items)){?>
               		
                  <?php if($items[0]->subject_code=="GKN" || $items[0]->subject_code=="MTH" || $items[0]->subject_code=="SCI"){?>
                  	<table width="100%" class="papyertype" style="">
                     <tr>
                        <td style="text-align:left">Instruction: All question carry equal marks</td>
                     </tr>
                     <tr>
                        <td style="text-align:left">Question No. 1 Multiple Choice Questions</td>
                     </tr>
                     <tr>
                         <td colspan="2" class="urdufont-right" style="text-align:right; ; font-size:14px">تمام سوالات کے نمبر برابر ہیں</td>
                     </tr>
                     <tr>
                         <td colspan="2" class="urdufont-right" style="text-align:right; ; font-size:14px">سوال نمبر 1: کثیر الانتخابی سوالات</td>
                     </tr>
                   </table>
                  <?php } elseif($items[0]->subject_code=="ENG") {?>  
                  	<table width="100%" class="papyertype" style="">
                     <tr>
                        <td style="text-align:left">Instruction: All question carry equal marks</td>
                     </tr>
                     <tr>
                        <td style="text-align:left">Question No. 1 Multiple Choice Questions</td>
                     </tr>
                     
                   </table>
                  <?php } elseif($items[0]->subject_code=="URD") {?>
                  	<table width="100%" class="papyertype" style="">
                     
                     <tr>
                         <td colspan="2" class="urdufont-right" style="text-align:right; ; font-size:14px">تمام سوالات کے نمبر برابر ہیں</td>
                     </tr>
                     <tr>
                         <td colspan="2" class="urdufont-right" style="text-align:right; ; font-size:14px">سوال نمبر 1: کثیر الانتخابی سوالات</td>
                     </tr>
                   </table>
                  <?php } ?>
                    
                  
            	<?php 	
						$i = 0;
                  $pagebreak = 4;
                  $pagebreakcount = 1;
                  $totalrecords = count($items);
                  foreach($items as $paper_mcq){
                     $i++;
                     if($paper_mcq->item_type == 'MCQ'){
                        $hide_image = '';
                        if($paper_mcq->item_image_en == $paper_mcq->item_image_ur )
                        {
                           $hide_image = " display:none; ";	
                        }
                        
                  ?>
                  <table class="content-block" width="100%" style="font-size:12px;">
                  <?php if ($paper_mcq->item_image_position=='Top') 
                     {
                        if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
                        {
                           ?>
                              <tr>
                                 <td><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
                                 </td>
                                 <td style="float:right"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px; <?php print $hide_image; ?>"/>
                                 </td>
                              </tr>
                              <?php 
                        }
                        elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
                        {
                        ?>
                  <tr>
                     <td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
                     </td>
                  </tr>
                  <?php 	
                  }
                  elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
                  {
                  ?>
                  <tr>
                     <td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
                     </td>
                  </tr>
                  <?php 	
            }
         }
?>
                  <?php if ($paper_mcq->item_stem_en!=""){?>
                  <tr>
                     <td colspan="2" style=" font-size:12px">
                              <?php if(1==1){?>
                           <?php if ($paper_mcq->item_type=='MCQ'){?>
                                      <?php print $i;?> .
                                      <?php }?>
                                      <?php }?>
                        <?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_en!="")
         {?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
                        <?php }?>
                        <span style="padding-left:2px">
                           <?php echo html_entity_decode($paper_mcq->item_stem_en);?>
                        </span>
                        <?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_en!="")
         {?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
                        <?php }?>
                     </td>
                  </tr>
                  <?php }?>
                  <?php if ($paper_mcq->item_stem_ur!=""){?>
                  <tr>
                     <td colspan="2" style="text-align:right; font-weight:bold" >
                              
                              <?php if(1==1){?>
                           <?php if ($paper_mcq->item_type=='MCQ'){?>
                                      <div class="urdufont-right"> <?php print $i;?> . &nbsp;
                                      <?php }?>
                                      <?php }?>
                               
                        <?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_ur!="")
         {?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
                        <?php }?>
                        <span style="padding-left:2px;">
                           <?php echo html_entity_decode($paper_mcq->item_stem_ur);?> </span>
                        <?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_ur!="")
         {?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
                        <?php }?>
                     </div></td>
                  </tr>
                  <?php }?>
                  <?php if ($paper_mcq->item_image_position=='Bottom') 
         {
            if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
            {
               ?>
                  <tr>
                     <td><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
                     </td>
                     <td style="float:right"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px; <?php print $hide_image; ?>"/>
                     </td>
                  </tr>
                  <?php 
            }
            elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
            {
            ?>
                  <tr>
                     <td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:150px;"/>
                     </td>
                  </tr>
                  <?php 	
            }
            elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
            {
            ?>
                  <tr>
                     <td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:150px;"/>
                     </td>
                  </tr>
                  <?php 	
            }
         }
                  $hide_item_option_a_ur = '';
                  $hide_item_option_b_ur = '';
                  $hide_item_option_c_ur = '';
                  $hide_item_option_d_ur = '';
                  
                  if(strip_tags($paper_mcq->item_option_a_en) == strip_tags($paper_mcq->item_option_a_ur)){
                     $hide_item_option_a_ur = "display:none; ";
                  }
                  if(strip_tags($paper_mcq->item_option_b_en) == strip_tags($paper_mcq->item_option_b_ur)){
                     $hide_item_option_b_ur = "display:none; ";
                  }
                  
                  if(strip_tags($paper_mcq->item_option_c_en) == strip_tags($paper_mcq->item_option_c_ur)){
                     $hide_item_option_c_ur = "display:none; ";
                  }
                  
                  if(strip_tags($paper_mcq->item_option_d_en) == strip_tags($paper_mcq->item_option_d_ur)){
                     $hide_item_option_d_ur = "display:none; ";
                  }
                  if ( $paper_mcq->item_option_layout=='1' || $paper_mcq->item_option_layout == '2' )
                  {
                     $subjects = [5,9,13,19,26,32,40,48];
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> ><span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?> padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> ><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> ><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ ?> width="2%" <?php } else { ?> width="60%" <?php } ?> ><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right" <?php print 'style="'.$hide_item_option_d_ur.'padding-left:5px;"';?> >
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '3' )
                  {
                     $subjects = [5,9,13,19,26,32,40,48];
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ print ' width="2%" '; } else { print ' width="60%"'; } ?> > <span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right col-12" style="<?php print $hide_item_option_a_ur;?> padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){print ' width="2%" '; } else { print ' width="60%"';  } ?> ><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?> padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){print ' width="2%" '; } else { print ' width="60%"'; } ?> ><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td <?php if(in_array($paper_mcq->item_subject_id, $subjects)){ print ' width="2%" '; } else { print ' width="60%"'; } ?>><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td width="40%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '4' )
                  {
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span> <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span> <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span> <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span> <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '5' )
                  {
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span> <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span> <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span> <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="50%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span> <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '6' )
                  {
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span> <span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span> <span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span> <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span> <span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '7' )
                  {
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url(). $paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '8' )
                  {
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                       <td><span style="padding-left:5px"><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '9' )
                  {
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_b_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"> <span><img src="<?= base_url().$paper_mcq->item_option_c_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td colspan="2"><span><img src="<?= base_url().$paper_mcq->item_option_d_image;?>" style="max-height:150px;"/></span>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '10' )
                  {
                     ?>
                  <tr>
                     <td  width="50%">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td width="100%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td width="50%"><span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td width="50%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td width="100%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td width="50%"><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td width="50%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td width="100%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td width="50%"><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td width="50%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td width="100%">
                                 <table border="0" cellspacing="2" cellpadding="2" width="100%">
                                    <tr>
                                       <td width="50%"><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td width="50%">
                                          <div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                     <td width="50%"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '11' )
                  {
                     ?>
                  <tr>
                     <td width="50%">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td width="25%">
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                     <td width="50%"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                     </td>
                  </tr>
                  <?php
                  } 
                  elseif ( $paper_mcq->item_option_layout == '12' )
                  {
                     ?>
                  <tr>
                     <td colspan="2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">a</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_a_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_a_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">b</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_b_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_b_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">c</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_c_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_c_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                              <td>
                                 <table border="0" cellspacing="2" cellpadding="2">
                                    <tr>
                                       <td><span class="circle">d</span>
                                          <span>
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_en);?>
                                          </span>
                                       </td>
                                       <td>
                                          <div class="urdufont-right" style="<?php print $hide_item_option_d_ur;?>padding-left:5px">
                                             <?php echo html_entity_decode($paper_mcq->item_option_d_ur);?>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="4" style="text-align:center"><span><img src="<?= base_url().$paper_mcq->item_option_a_image;?>" style="max-height:150px;"/></span>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <?php
                  }
                  ?>
               </table>
                  <?php 
                     }
                  }
               }
               if(!empty($paper_crqs_sec2)){
               if($items[0]->subject_code=="ENG" || $items[0]->subject_code=="GKN" || $items[0]->subject_code=="MTH" || $items[0]->subject_code=="SCI")
               {?> 
               <table width="100%" class="papyertype">
                  <tr>
                      <td width="25%" style="border: 1px solid #000;">Time: 45 Minutes</td>
                      <td width="50%" style="border: 1px solid #000;">Section-II (Short Question)</td>
                      <td width="25%" style="border: 1px solid #000;">Total Marks : 30</td>
                  </tr>
              </table>
				<?php }
               else
               {?> 
                   <table width="100%" class="papyertype">
                      <tr>
                          <td width="25%" class="urdufont-right" style="border: 1px solid #000;"> وقت 45 منٹ</td>
                          <td width="50%" class="urdufont-right" style="border: 1px solid #000;">سیکشن-اا (مختصر سوالات)</td>
                          <td width="25%" class="urdufont-right" style="border: 1px solid #000;">کل نمبر 30</td>
                      </tr>
                  </table>
				<?php }	
               ?>
               
               <?php			
                  $i = 0;
                  $pagebreak = 4;
                  $pagebreakcount = 1;
                  $totalrecords = count($items);
                  foreach($items as $paper_mcq){
                     $i++;
                     if($paper_mcq->item_type == 'ERQ'){
                        ?>
                        <table width="100%" style="margin-top:10px;" >   
                        <?php if ($paper_mcq->item_image_position=='Top') 
                        {
                           if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
                           {
                              ?>
                               <tr>
                                 <td style="width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/></td>
                                 <td style="float:right; width:50%"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>
                                </tr>
                              <?php 
                           }
                           elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;" /></td>          	
                                </tr>
                              <?php 	
                           }
                           elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>          	
                                </tr>
                              <?php 	
                           }
                        }
                        ?>
                        <?php if ($paper_mcq->item_stem_en!=""){?>
                        <tr><td colspan="2" style=" font-size:12px"><?php print $i;?> .
                        <?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_en!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/> <?php }?>
                        <span style="padding-left:5px"><?php echo html_entity_decode($paper_mcq->item_stem_en);?></span>
                        <?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_en!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/> <?php }?></td></tr>
                        <?php }?>

                        <?php if ($paper_mcq->item_stem_ur!=""){?>
                        <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">   <?php print $i;?> . &nbsp; 
                        <?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_ur!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
                        <span style="padding-left:5px:"><?php echo html_entity_decode($paper_mcq->item_stem_ur);?> </span>
                        <?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_ur!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
                        </td></tr>
                        <?php }?>
                        <?php if ($paper_mcq->item_image_position=='Bottom') 
                        {
                           if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
                           {
                              ?>
                               <tr >
                                 <td style="width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-width:100%;"/></td>
                                 <td style="float:right;"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-width:100%;"/></td>
                                </tr>
                              <?php 
                           }
                           elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;" /></td>          	
                                </tr>
                              <?php 	
                           }
                           elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>          	
                                </tr>
                              <?php 	
                           }
                        }		
                        ?>               
                        </table>
               <?php
                     }
                  }
               }
               if(!empty($paper_crqs_sec3)){
               if($items[0]->subject_code=="ENG" || $items[0]->subject_code=="GKN" || $items[0]->subject_code=="MTH" || $items[0]->subject_code=="SCI")
               { ?> 
               <table width="100%" class="papyertype">
                  <tr>
                      <td width="25%" style="border: 1px solid #000;">Time: 75 Minutes</td>
                      <td width="50%" style="border: 1px solid #000;">Section-III (Long Question)</td>
                      <td width="25%" style="border: 1px solid #000;">Total Marks : 30</td>
                  </tr>
              </table><?php }
               else
               {?> 
                  <table width="100%" class="papyertype">
                      <tr>
                          <td width="25%" class="urdufont-right" style="border: 1px solid #000;"> وقت 75 منٹ</td>
                          <td width="50%" class="urdufont-right" style="border: 1px solid #000;">سیکشن-اا (سوالات)</td>
                          <td width="25%" class="urdufont-right" style="border: 1px solid #000;">کل نمبر 30</td>
                      </tr>
                  </table>
				  <?php }	
               ?>
                  
               <?php		
                  $i = 0;
                  $pagebreak = 4;
                  $pagebreakcount = 1;
                  $totalrecords = count($paper_crqs_sec3);
                  foreach($paper_crqs_sec3 as $paper_mcq){
                     $i++;
                     if($paper_mcq->item_type == 'ERQ'){
                        ?>
                        <table width="100%" style="margin-top:10px;" >   
                        <?php if ($paper_mcq->item_image_position=='Top') 
                        {
                           if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
                           {
                              ?>
                               <tr>
                                 <td style="width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/></td>
                                 <td style="float:right; width:50%"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>
                                </tr>
                              <?php 
                           }
                           elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center;"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;" /></td>          	
                                </tr>
                              <?php 	
                           }
                           elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>          	
                                </tr>
                              <?php 	
                           }
                        }
                        ?>
                        <?php if ($paper_mcq->item_stem_en!=""){?>
                        <tr><td colspan="2" style=" font-size:12px"><?php print $i;?> .
                        <?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_en!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/> <?php }?>
                        <span style="padding-left:5px"><?php echo html_entity_decode($paper_mcq->item_stem_en);?></span>
                        <?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_en!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;"/> <?php }?></td></tr>
                        <?php }?>

                        <?php if ($paper_mcq->item_stem_ur!=""){?>
                        <tr><td colspan="2" style="text-align:right; font-weight:bold" class="urdufont-right">   <?php print $i;?> . &nbsp; 
                        <?php if($paper_mcq->item_image_position=='Left' && $paper_mcq->item_image_ur!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
                        <span style="padding-left:5px:"><?php echo html_entity_decode($paper_mcq->item_stem_ur);?> </span>
                        <?php if($paper_mcq->item_image_position=='Right' && $paper_mcq->item_image_ur!="")
                        {?> <img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/> <?php }?>
                        </td></tr>
                        <?php }?>
                        <?php if ($paper_mcq->item_image_position=='Bottom') 
                        {
                           if($paper_mcq->item_image_en!="" && $paper_mcq->item_image_ur!="") 
                           {
                              ?>
                               <tr >
                                 <td style="width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-width:100%;"/></td>
                                 <td style="float:right;"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-width:100%;"/></td>
                                </tr>
                              <?php 
                           }
                           elseif($paper_mcq->item_image_en!=""&&$paper_mcq->item_image_ur=="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_mcq->item_image_en;?>" style="max-height:400px;" /></td>          	
                                </tr>
                              <?php 	
                           }
                           elseif($paper_mcq->item_image_en==""&&$paper_mcq->item_image_ur!="")
                           {
                           ?>
                               <tr>
                                 <td colspan="2" style="text-align:center; width:50%"><img src="<?= base_url().$paper_mcq->item_image_ur;?>" style="max-height:400px;"/></td>          	
                                </tr>
                              <?php 	
                           }
                        }		
                        ?>               
                                   </table>
               <?php
                     }
                     for ($i = 0; $i < 2; $i++) {
                        echo '<table width="100%" cellpadding="0" cellspacing="0" style="margin: 25px 0;"><tr><td style="border-bottom: 1px solid black;"></td></tr></table>';
                     }

                  }
               }
               ?>
            </div>
         
      
      <div style="margin-top:0px;padding-bottom:0px;">
            <?php
         if(!empty($paper_groups)){
            print '<hr>';
            print '<div class="papyertype">SUBJECTIVE PART(CRQs)</div>';
            $ar_value = 0;
            $ar_value = count($paper_groups);
            foreach($paper_groups as $paper_group){
               $i++;
               $max_val[] = $i;
               $g_ctr = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
               $g =0; ?>
               <div class="">
                  <div class="col-lg-6 col-sm-12">                         
                    <label for="group_title_en" class="control-label" ><?php echo $i;?> .</label>
                    <div style="font-weight:bold"><?php //echo $paper_group->group_id; ?></div>
                  </div>
                  <div class="col-lg-6 col-sm-12">                         
                     <label for="group_title_ur" class="control-label urdufont-right" style="float:right">   <?php echo $i;?>. </label>
                     <div style="font-weight:bold"><?php //echo $paper_group->group_id; ?></div>
                  </div>
                </div>
         <?php
			  if(isset($paper_group->group_item_1)&&$paper_group->group_item_1!=0)
			  { 
				 $group_item_1 = $this->Paper_model->get_item_by_id($paper_group->group_item_1);
				 $group_item_1 = $group_item_1[0];
				 $hide_image1 = '';
				 if($group_item_1->item_image_en == $group_item_1->item_image_ur )
				 {
					$hide_image1 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" cellpadding="1" >
				  <?php if ($group_item_1->item_image_position=='Top') 
				 {
					if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
					{
					?>
					  <tr>
					   <td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
					   <td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px; <?php print $hide_image1;?>"/></td>
					  </tr>
					  <?php 
					}
					elseif($group_item_1->item_image_en!="" && $group_item_1->item_image_ur=="")
					{
					?>
					  <tr>
					   <td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;" /></td>
					  </tr>
					  <?php 	
					}
					elseif($group_item_1->item_image_en=="" && $group_item_1->item_image_ur!="")
					{
					?>
					  <tr>
					   <td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
					  </tr>
					  <?php 	
					}
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					   <?php if(1==1){?>                               
					   <?php if ($group_item_1->item_type=='ERQ'){?>
					   <?php if($group_item_1->item_stem_en!=""){?>a &#41; <?php }?><?php ++$g;?>
					   <?php }?>
					   <?php }?>
					<?php echo html_entity_decode($group_item_1->item_stem_en);?></td>
				   
					<?php if($group_item_1->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_1->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (a </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_1->item_image_position=='Bottom') 
					{
					   if($group_item_1->item_image_en!="" && $group_item_1->item_image_ur!="") 
					   {
					   ?>
						 <tr>
						  <td><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;"/></td>
						  <td style="float:right"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px; <?php print $hide_image1;?>"/></td>
						 </tr>
						 <?php 
					   }
					   elseif($group_item_1->item_image_en!=""&&$group_item_1->item_image_ur=="")
					   {
					   ?>
						 <tr>
						  <td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_1->item_image_en;?>" style="max-height:400px;" /></td>
						 </tr>
						 <?php 	
					   }
					   elseif($group_item_1->item_image_en==""&&$group_item_1->item_image_ur!="")
					   {
					   ?>
						 <tr>
						  <td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_1->item_image_ur;?>" style="max-height:400px;"/></td>
						 </tr>
						 <?php 	
					   }
					}
				 ?>
				 </table>
			  <?php  
			  }
			  if(isset($paper_group->group_item_2)&&$paper_group->group_item_2!=0)
			  { $group_item_2 = $this->Paper_model->get_item_by_id($paper_group->group_item_2);
				 $group_item_2 = $group_item_2[0];
			   $hide_image2 = '';
				 if($group_item_2->item_image_en == $group_item_2->item_image_ur )
				 {
					$hide_image2 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_2->item_image_position=='Top') 
				 {
				 if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px; <?php print $hide_image2;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_2->item_image_en!=""&&$group_item_2->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_2->item_image_en==""&&$group_item_2->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							 
					  <?php if ($group_item_2->item_type=='ERQ'){?>
					  <?php if($group_item_2->item_stem_en!=""){?>b &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_2->item_stem_en);?></td>
				   
					<?php if($group_item_2->item_stem_ur!=""){?>
					  <td width="40%" valign="top" >
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_2->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (b </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_2->item_image_position=='Bottom') 
				 {
				 if($group_item_2->item_image_en!="" && $group_item_2->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px; <?php print $hide_image2;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_2->item_image_en!=""&&$group_item_2->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_2->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_2->item_image_en==""&&$group_item_2->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_2->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_3)&&$paper_group->group_item_3!=0)
			  {$group_item_3 = $this->Paper_model->get_item_by_id($paper_group->group_item_3);
				 $group_item_3 = $group_item_3[0];
			   $hide_image3 = '';
				 if($group_item_3->item_image_en == $group_item_3->item_image_ur )
				 {
					$hide_image3 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_3->item_image_position=='Top') 
				 {
				 if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px; <?php print $hide_image3;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_3->item_image_en!=""&&$group_item_3->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_3->item_image_en==""&&$group_item_3->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td  width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							 
					  <?php if ($group_item_3->item_type=='ERQ'){?>
					  <?php if($group_item_3->item_stem_en!=""){?>c &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_3->item_stem_en);?></td>
				   
					<?php if($group_item_3->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_3->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (c </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_3->item_image_position=='Bottom') 
				 {
				 if($group_item_3->item_image_en!="" && $group_item_3->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px; <?php print $hide_image3;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_3->item_image_en!=""&&$group_item_3->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_3->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_3->item_image_en==""&&$group_item_3->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_3->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_4)&&$paper_group->group_item_4!=0)
			  {$group_item_4 = $this->Paper_model->get_item_by_id($paper_group->group_item_4);
				 $group_item_4 = $group_item_4[0];
			   $hide_image4 = '';
				 if($group_item_4->item_image_en == $group_item_4->item_image_ur )
				 {
					$hide_image4 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_4->item_image_position=='Top') 
				 {
				 if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px; <?php print $hide_image4;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_4->item_image_en!=""&&$group_item_4->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_4->item_image_en==""&&$group_item_4->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							 
					  <?php if ($group_item_4->item_type=='ERQ'){?>
					  <?php if($group_item_4->item_stem_en!=""){?>d &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_4->item_stem_en);?>
					  </td>
				 
					<?php if($group_item_4->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_4->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (d </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_4->item_image_position=='Bottom') 
				 {
				 if($group_item_4->item_image_en!="" && $group_item_4->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px; <?php print $hide_image4;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_4->item_image_en!=""&&$group_item_4->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_4->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_4->item_image_en==""&&$group_item_4->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_4->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_5)&&$paper_group->group_item_5!=0)
			  {$group_item_5 = $this->Paper_model->get_item_by_id($paper_group->group_item_5);
				 $group_item_5 = $group_item_5[0];
			   $hide_image5 = '';
				 if($group_item_5->item_image_en == $group_item_5->item_image_ur )
				 {
					$hide_image5 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_5->item_image_position=='Top') 
				 {
				 if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px; <?php print $hide_image5;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_5->item_image_en!=""&&$group_item_5->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_5->item_image_en==""&&$group_item_5->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							 
					  <?php if ($group_item_5->item_type=='ERQ'){?>
					  <?php if($group_item_5->item_stem_en!=""){?>e &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_5->item_stem_en);?>
					  </td>
					<?php if($group_item_5->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_5->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (e </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_5->item_image_position=='Bottom') 
				 {
				 if($group_item_5->item_image_en!="" && $group_item_5->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px; <?php print $hide_image5;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_5->item_image_en!=""&&$group_item_5->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_5->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_5->item_image_en==""&&$group_item_5->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_5->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
		
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_6)&&$paper_group->group_item_6!=0)
			  {$group_item_6 = $this->Paper_model->get_item_by_id($paper_group->group_item_6);
			  $group_item_6 = $group_item_6[0];
			   $hide_image6 = '';
				 if($group_item_6->item_image_en == $group_item_6->item_image_ur )
				 {
					$hide_image6 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_6->item_image_position=='Top') 
				 {
				 if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px; <?php print $hide_image6;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_6->item_image_en!=""&&$group_item_6->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_6->item_image_en==""&&$group_item_6->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							  
					  <?php if ($group_item_6->item_type=='ERQ'){?>
					  <?php if($group_item_6->item_stem_en!=""){?>f &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_6->item_stem_en);?>
					 </td>
				   </tr>
				   <tr>
					<?php if($group_item_6->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_6->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (f </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_6->item_image_position=='Bottom') 
				 {
				 if($group_item_6->item_image_en!="" && $group_item_6->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px; <?php print $hide_image6;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_6->item_image_en!=""&&$group_item_6->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_6->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_6->item_image_en==""&&$group_item_6->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_6->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_7)&&$paper_group->group_item_7!=0)
			  {$group_item_7 = $this->Paper_model->get_item_by_id($paper_group->group_item_7);
			  $group_item_7 = $group_item_7[0];
			   $hide_image7 = '';
				 if($group_item_7->item_image_en == $group_item_7->item_image_ur )
				 {
					$hide_image7 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_7->item_image_position=='Top') 
				 {
				 if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px; <?php print $hide_image7;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_7->item_image_en!=""&&$group_item_7->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_7->item_image_en==""&&$group_item_7->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
		
					  <?php if(1==1){?>							  
					  <?php if ($group_item_7->item_type=='ERQ'){?>
					  <?php if($group_item_7->item_stem_en!=""){?>g &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_7->item_stem_en);?>
					  </td>
					<?php if($group_item_7->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_7->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (g </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_7->item_image_position=='Bottom') 
				 {
				 if($group_item_7->item_image_en!="" && $group_item_7->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px; <?php print $hide_image7;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_7->item_image_en!=""&&$group_item_7->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_7->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_7->item_image_en==""&&$group_item_7->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_7->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_8)&&$paper_group->group_item_8!=0)
			  {$group_item_8 = $this->Paper_model->get_item_by_id($paper_group->group_item_8);
			  $group_item_8 = $group_item_8[0];
			   $hide_image8 = '';
				 if($group_item_8->item_image_en == $group_item_8->item_image_ur )
				 {
					$hide_image8 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_8->item_image_position=='Top') 
				 {
				 if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px; <?php print $hide_image8;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_8->item_image_en!=""&&$group_item_8->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_8->item_image_en==""&&$group_item_8->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							 
					  <?php if ($group_item_8->item_type=='ERQ'){?>
					  <?php if($group_item_8->item_stem_en!=""){?>h &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_8->item_stem_en);?>
					 </td>
					<?php if($group_item_8->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_8->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (h </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_8->item_image_position=='Bottom') 
				 {
				 if($group_item_8->item_image_en!="" && $group_item_8->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px; <?php print $hide_image8;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_8->item_image_en!=""&&$group_item_8->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_8->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_8->item_image_en==""&&$group_item_8->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_8->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_9)&&$paper_group->group_item_9!=0)
			  {$group_item_9 = $this->Paper_model->get_item_by_id($paper_group->group_item_9);
			  $group_item_9 = $group_item_9[0];
			   $hide_image9 = '';
				 if($group_item_9->item_image_en == $group_item_9->item_image_ur )
				 {
					$hide_image9 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_9->item_image_position=='Top') 
				 {
				 if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px; <?php print $hide_image9;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_9->item_image_en!=""&&$group_item_9->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_9->item_image_en==""&&$group_item_9->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							 
					  <?php if ($group_item_9->item_type=='ERQ'){?>
					  <?php if($group_item_9->item_stem_en!=""){?>i &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_9->item_stem_en);?>
					  </td>
				   </tr>
				   <tr>
					<?php if($group_item_9->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_9->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (i </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_9->item_image_position=='Bottom') 
				 {
				 if($group_item_9->item_image_en!="" && $group_item_9->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px; <?php print $hide_image9;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_9->item_image_en!=""&&$group_item_9->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_9->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_9->item_image_en==""&&$group_item_9->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_9->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php  
				 }
			  if(isset($paper_group->group_item_10)&&$paper_group->group_item_10!=0)
			  {$group_item_10 = $this->Paper_model->get_item_by_id($paper_group->group_item_10);
				 $group_item_10 = $group_item_10[0];
			   $hide_image9 = '';
				 if($group_item_9->item_image_en == $group_item_9->item_image_ur )
				 {
					$hide_image9 = " display:none; ";	
				 }
				 ?>
				 <table width="100%" style="margin-top:1px;" >
				   <?php if ($group_item_10->item_image_position=='Top') 
				 {
				 if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px; <?php print $hide_image10;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_10->item_image_en!=""&&$group_item_10->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_10->item_image_en==""&&$group_item_10->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				   <tr>
					<td width="60%" valign="top" style=" font-size:12px;">
					  <?php if(1==1){?>							 
					  <?php if ($group_item_10->item_type=='ERQ'){?>
					  <?php if($group_item_10->item_stem_en!=""){?>j &#41; <?php }?><?php ++$g;?>
					  <?php }?>
					  <?php }?><?php echo html_entity_decode($group_item_10->item_stem_en);?>
					 </td>
					<?php if($group_item_10->item_stem_ur!=""){?>
					  <td width="40%" valign="top">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tbody>
						  <tr>
							<td style="text-align:right; font-weight:bold" class="urdufont-right"><?php echo html_entity_decode($group_item_10->item_stem_ur);?></td>
							<td align="right"  style="text-align:right; width: 20px; vertical-align: top;"> (j </td>
						  </tr>
						 </tbody>
					   </table>
					   <?php 							
					  ?>  
					  </td><?php }?>
				   </tr>
				   <?php if ($group_item_10->item_image_position=='Bottom') 
				 {
				 if($group_item_10->item_image_en!="" && $group_item_10->item_image_ur!="") 
				 {
				 ?>
				   <tr>
					<td><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;"/></td>
					<td style="float:right"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px; <?php print $hide_image10;?>"/></td>
				   </tr>
				   <?php 
				 }
				 elseif($group_item_10->item_image_en!=""&&$group_item_10->item_image_ur=="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center;"><img src="<?= base_url().$group_item_10->item_image_en;?>" style="max-height:400px;" /></td>
				   </tr>
				   <?php 	
				 }
				 elseif($group_item_10->item_image_en==""&&$group_item_10->item_image_ur!="")
				 {
				 ?>
				   <tr>
					<td colspan="2" style="text-align:center"><img src="<?= base_url().$group_item_10->item_image_ur;?>" style="max-height:400px;"/></td>
				   </tr>
				   <?php 	
				 }
				 }
				 ?>
				 </table>
				 <?php 
				 }
         // print '<div style="page-break-before: always;"></div>';	
         }
      }
         ?>
          </div>
      <!-- /.box-body -->
      </div>
   
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script> 
   </body>
</html>   
