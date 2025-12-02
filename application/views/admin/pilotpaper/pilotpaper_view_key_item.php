  <!-- Content Wrapper. Contains page content -->
<style>
a, a:hover{
	color: #000000;
}
  .content-block {
    page-break-inside: avoid;
}
	.qtblock{
		padding:20px; width: 155px; float: left; border: 1px solid #000;
	}

</style>
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); 
				//echo '<PRE>';
				//print_r($paper_mcqs); 
				//die();?>
				<!---- start here is item view filmzy --->
				<!--Pilotheader-->
				<?php
				$pilotheaders = $this->Pilotpaper_model->get_pilotheader_by_suject($paper_mcqs[0]->subject_name_en);
				//print_r($pilotheaders);
				//die();
				$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
				if(!empty($paper_hearders)){
					
				?>
                	<div class="container" style="padding:25px">
						<div class="row form-group">
							<div class="col-lg-12 col-md-12 col-sm-12">
							<table border="0" cellpadding="2" cellspacing="2" width="100%">
								<tbody>
									<tr>
										<td width="50%">
											Serial No. _____________________
										</td>
										<td width="50%" align="right">
											<?php $crp_v = $this->uri->segment(4);
												$crp_v_arry = explode('_',$crp_v);
											?>
											<div style="border: 2px solid #000000; font-size: 18px; font-weight: bold; min-width: 200px; display: inline-block;padding: 5px; text-align:center; margin-right:10px;">CRP-<?php print $crp_v_arry[1];?></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row form-group" style="border-bottom: #000 solid 1px; font-size: 30px;">
						<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $paper_mcqs[0]->subject_name_en;?> - GRADE <?php print $paper_mcqs[0]->item_grade_id-2; ?></div>
					</div>
					<div class="row form-group">
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<table border="0" cellpadding="2" cellspacing="2" width="100%">
								<tbody>
									<tr>
										<td width="50%">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="110px;"><div class="urdufont-right" style="padding-left:20px; font-size: 18px;"><span dir="RTL">طالب علم کا نام</span>&nbsp;</div>Student Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;
														</td>
													</tr>
												</tbody>
											</table>
										</td>
										<td width="50%" align="center">
											Curriculum Reform Performa<br>
											<div style="border: 2px solid #000000; font-size: 18px; font-weight: bold; min-width: 200px; display: inline-block;padding: 5px;"><?php print $paper_mcqs[0]->subject_name_en;?></div>
										</td>
									</tr>
								</tbody>
							</table>
							<table border="0" cellpadding="2" cellspacing="2" width="100%">
								<tbody>
									<tr>
										<td width="50%">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="110px;"><div class="urdufont-right" style="padding-left:20px; font-size: 18px;"><span dir="RTL">سکول کا نام</span>&nbsp;</div>School Name: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;
														</td>
													</tr>
												</tbody>
											</table>
										</td>
										<td width="50%">
											<table border="0" cellpadding="2" cellspacing="2" width="100%">
												<tbody>
													<tr>
														<td width="50px;"><div class="urdufont-right" style="padding-left:3px; font-size: 18px;"><span dir="RTL">تاریخ</span>&nbsp;</div>Date: </td>
														<td style="border-bottom: 1px solid #000000;">&nbsp;
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
				<?php 
				echo '<hr />';
				}?>
				</div>
				
				
			</div><!-- /.box-body -->
			<div style="font-size:30px; font-weight:bold; text-align:center">ANSWER KEYS</div>
			<div style="padding:0px; margin:0px auto"> 
				<div style="width: 471px; border: 3px solid #000; font-size: 20px; font-family: Times New Roman;">
				
					<?php
						if(!empty($paper_mcqs)){
							$i = 0;
							foreach($paper_mcqs as $paper_mcq){
								$i++;
								if($paper_mcq->item_type == 'MCQ'){
								?>
								<div style="padding:20px; width: 155px; float: left; border: 1px solid #000;"><?php echo $paper_mcq->item_id;?></div>
								<?php
								}
							}
						}
					?>
					
					<?php
					$ctr = $i;

					if(!empty($paper_paras)){
						$i = 0;
						foreach($paper_paras as $paper_para){
							$i++;
							if(isset($paper_para->para_item_21) && $paper_para->para_item_21 != 0)
							{
								$para_item_21 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_21 );
								$para_item_21 = (isset($para_item_21[0]) && $para_item_21[0] != "" ) ? $para_item_21[0] : "";
								if ($para_item_21 != "") {
									if ($para_item_21->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_21->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_22) && $paper_para->para_item_22 != 0)
							{
								$para_item_22 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_22 );
								$para_item_22 = (isset($para_item_22[0]) && $para_item_22[0] != "" ) ? $para_item_22[0] : "";
								if ($para_item_22 != "") {
									if ($para_item_22->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_22->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_23) && $paper_para->para_item_23 != 0)
							{
								$para_item_23 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_23 );
								$para_item_23 = (isset($para_item_23[0]) && $para_item_23[0] != "" ) ? $para_item_23[0] : "";
								if ($para_item_23 != "") {
									if ($para_item_23->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_23->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_24) && $paper_para->para_item_24 != 0)
							{
								$para_item_24 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_24 );
								$para_item_24 = (isset($para_item_24[0]) && $para_item_24[0] != "" ) ? $para_item_24[0] : "";
								if ($para_item_24 != "") {
									if ($para_item_24->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_24->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_25) && $paper_para->para_item_25 != 0)
							{
								$para_item_25 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_25 );
								$para_item_25 = (isset($para_item_25[0]) && $para_item_25[0] != "" ) ? $para_item_25[0] : "";
								if ($para_item_25 != "") {
									if ($para_item_25->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_25->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_26) && $paper_para->para_item_26 != 0)
							{
								$para_item_26 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_26 );
								$para_item_26 = (isset($para_item_26[0]) && $para_item_26[0] != "" ) ? $para_item_26[0] : "";
								if ($para_item_26 != "") {
									if ($para_item_26->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_26->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_27) && $paper_para->para_item_27 != 0)
							{
								$para_item_27 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_27 );
								$para_item_27 = (isset($para_item_27[0]) && $para_item_27[0] != "" ) ? $para_item_27[0] : "";
								if ($para_item_27 != "") {
									if ($para_item_27->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_27->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_28) && $paper_para->para_item_28 != 0)
							{
								$para_item_28 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_28 );
								$para_item_28 = (isset($para_item_28[0]) && $para_item_28[0] != "" ) ? $para_item_28[0] : "";
								if ($para_item_28 != "") {
									if ($para_item_28->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_28->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_29) && $paper_para->para_item_29 != 0)
							{
								$para_item_29 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_29 );
								$para_item_29 = (isset($para_item_29[0]) && $para_item_29[0] != "" ) ? $para_item_29[0] : "";
								if ($para_item_29 != "") {
									if ($para_item_29->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_29->item_id;?></div>
									<?php
									}
								}
								
							}
							
							if(isset($paper_para->para_item_30) && $paper_para->para_item_30 != 0)
							{
								$para_item_30 = $this->Pilotpaper_model->get_item_by_id( $paper_para->para_item_30 );
								$para_item_30 = (isset($para_item_30[0]) && $para_item_30[0] != "" ) ? $para_item_30[0] : "";
								if ($para_item_30 != "") {
									if ($para_item_30->item_type=='MCQ'){?>
										<div class="qtblock"><?php echo $para_item_30->item_id;?></div>
									<?php
									}
								}
								
							}
						}
					}
					?>
					<div style="clear: both;"></</div>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<hr>
				</div>
			</div>
		</div>
        
	</section>
    
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>