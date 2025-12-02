  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; View Item </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/items'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Items List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
        
			<?php 
			//echo '<PRE>';
			$item = $items[0];
			//print_r($item);
					//die();?>
			
			
			<!---- start here is item view filmzy --->
			
<div class="container" style="padding-top:25px">
  <div class="row">
  	<div class="col-8">
    	<div class="row">
        	<div class="col-4">
              <div> <img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" width="110" height="130" /></div>
            </div>
            <div class="col-8">
              <div class="col-12" style="font-size:36px; font-weight:bold; text-align:center;">Punjab Education Curriculum Training and Assessment Authority [PECTAA]</div>
              <div class="col-12" style="font-size:30px; text-align:center; margin-top:1%">Wahdat Colony Road, Lahore</div>
            </div>
        </div>
        <div class="row">
        	<div style="padding-left:40px; padding-top:10px">
            <div class="col-lg-12 col-sm-12" style="font-weight:bold"> Date Received :____________________<u><?php echo $item->item_date_received;?></u>____________________ </div>
            <div class="col-lg-12 col-sm-12" style="font-weight:bold"> Item Writer Name : ____________________<u><?php echo $item->username;?></u>____________________</div>
            <div class="col-lg-12 col-sm-12" style="font-weight:bold"> Registration No. : ____________________<u><?php echo $item->item_registration;?></u>____________________</div>
        	</div>
        </div>
    </div>
    <div class="col-4" >
      <div class="col-12" style="alignment-adjust:central;">
        <table border="1px" bordercolor="#000000" width="100%" style="float:right; font-weight:bold; font-size:18px;" cellpadding="7px" >
          <tr>
            <td colspan="3" style="text-align:center">For official Use Only</td>
          </tr>
          <tr>
            <td colspan="3">Item Code:&emsp; <?php echo $item->item_code;?></td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:center">Item Statistics:</td>
          </tr>
          <tr>
            <td style="text-align:center">Dif</td>
            <td style="text-align:center">Disc</td>
            <td style="text-align:center">DIF</td>
          </tr>
          <tr>
            <td style="text-align:center"><?php echo $item->item_difficulty;?></td>
            <td style="text-align:center"><?php echo $item->item_discr;?></td>
            <td style="text-align:center"><?php echo $item->item_dif_code;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row" style="margin-left:5px; font-size:14px"> 
  <table border="1px" bordercolor="#000000" width="100%" style="margin-top:25px; text-align:center; font-weight:bold;">
  	<tr style="font-weight:bold">
    	<td rowspan="2" colspan="3">Subject</td>
        <td rowspan="2">Grade</td>
        <td colspan="3">PCTB Textbook</td>
        <td colspan="4"> Other Source</td>
    </tr>
    <tr style="font-weight:bold">
    	<td colspan="2">Chapter</td>
        <td>Page</td>
        <td>Title</td>
        <td>Year</td>
        <td colspan="2">Page</td>
    </tr>
    <tr>
    	<td colspan="3"><?php echo $item->subject_name_en;?></td>
        <td><?php echo $item->grade_name_en;?></td>
        <td colspan="2"><?php echo $item->item_pctb_chapter;?></td>
        <td><?php echo $item->item_pctb_page;?></td>
        <td><?php echo $item->item_other_title;?></td>
        <td><?php echo $item->item_other_year	;?></td>
        <td colspan="2"><?php echo $item->item_other_page;?></td>
    </tr>
    <tr>
    	<td colspan="3">Curriculum:2006<br />(ALP)</td>
        <td>SLO # <?php echo $item->slo_number;?></td>
        <td rowspan="2" colspan="7">SLO text: <?php echo $item->slo_statement_en;?></td>
    </tr>
    <tr>
    	<td colspan="3">Content Strand:</td>
        <td><?php echo $item->cs_statement_en;?></td>
    </tr>
    <tr>
    	<td colspan="6">Bloom<br />(Please tick one)</td>
        <td colspan="2">Relation to Textbook<br />(Please tick one)</td>
        <td rowspan="2">Key</td>
        <td colspan="2">Type of<br />Question</td>
    </tr>
	<tr>
    	<td>K</td>
        <td>C</td>
    	<td>App</td>
        <td>An</td>
    	<td>Sy</td>
        <td>Ey</td>
    	<td>Direct Quote</td>
        <td>Amended</td>
    	<td>MCQs</td>
        <td>OEQ</td>
    </tr>
    <tr>
    	<td><?php if ($item->item_cognitive_bloom == 'Knowledge') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Comprehension') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_cognitive_bloom == 'Application') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Analysis') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_cognitive_bloom == 'Synthesis') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_cognitive_bloom == 'Evaluation') {echo 'Yes';}else{echo '---';}?></td>
    	<td><?php if ($item->item_relation=='Direct Quote') {echo 'Yes';}else{echo '---';}?></td>
        <td><?php if ($item->item_relation=='Amended'){echo 'Yes';} else{echo '---';}?></td>
    	<td><?php echo $item->item_option_correct;?></td>
        <td><?php if ($item->item_type=='MCQ'){echo 'Yes';} else{echo '---';}?></td>
        <td>---</td>
    </tr>
  </table>
  </div>
  <!--<div class="row" style="padding-top:25px"> 
	<div class="col-lg-12 col-sm-12" style="margin-left:25px">Stem</div>
    <div class="col-lg-12 col-sm-12" style="margin-left:50px">Image</div>
  </div>-->
  			
  <div class="row col-lg-12" style="padding-top:25px">
    	<div class="col-6"><?php echo $item->item_stem_en;?></div>
        <div class="col-6"><?php echo $item->item_stem_ur;?></div>
        
        <div class="col-6 " style="margin-left:50px">
        	<div>a.&emsp;<?php echo $item->item_option_a_en.' ( '.$item->item_option_a_ur.' )';?></div>
            <div>b.&emsp;<?php echo $item->item_option_b_en.' ( '.$item->item_option_b_ur.' )';?></div>
            <div>c.&emsp;<?php echo $item->item_option_c_en.' ( '.$item->item_option_c_ur.' )';?></div>
            <div>d.&emsp;<?php echo $item->item_option_d_en.' ( '.$item->item_option_d_ur.' )';?></div>
        </div>
    </div>
    
    <div class="row col-lg-12">
    	<div class="col-lg-12" style="padding-left:25px; padding-top:25px"> Review No.--------</div>
        <div class="col-lg-12">
        	<table width="100%" border="1" style="text-align:center">
              <tr style="font-weight:bold">
                <td style="width:15%">Reviewer Name</td>
                <td style="width:15%">Accept (Y/N)</td>
                <td style="width:40%">Ammendment Suggested<br />(If any)</td>
                <td style="width:15%">Signatures</td>
                <td style="width:15%">Date</td>
              </tr>
              <tr>
                <td><?php echo $item->item_reviewedby;?></td>
                <td>---------------</td>
                <td>---------------</td>
                <td>---------------</td>
                <td><?php echo $item->item_reviewed;?></td>
              </tr>
            </table>
        </div>
    </div>
</div>
	
			
			
			<!---- end  here is item view filmzy --->			
			
			
			
			
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 