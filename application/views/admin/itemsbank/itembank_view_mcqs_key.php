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

</style><div class="content-wrapper">
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
				if(!empty($paper_mcqs)){
					$headers = $this->Itemsbank_model->get_headers_by_id($paper_mcqs[0]->subject_id);
					//$paper_hearders = (isset($pilotheaders[0]))?$pilotheaders[0]:"";
					if(!empty($headers)){
						$headers = $headers[0];	
					?>
						<div class="container" style="padding:5px">
							<div class="row form-group" style="border:#000 solid 4px; position: relative;">
								<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">SCHOOL BASED ASSESSMENT <?php print date('Y');?></div>
								<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">GRADE <?php echo $headers['grade_code'];?></div>
								<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold;">
									<span style="text-transform:uppercase"><?php echo $headers['subject_name_en'];?></span> PART – A (Objective Type)
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12" style="font-size:18px; font-weight:bold; padding: 15px;">
									<div class="row">
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" style="font-size:18px; font-weight:bold">
											School :
										</div>
										<div class="col-xl-11 col-lg-11 col-md-11 col-sm-11" style="border-bottom:#000 solid 2px">
										</div>
									</div>
									<div class="row">
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" style="font-size:18px; font-weight:bold">
											Tehsil :
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5" style="border-bottom:#000 solid 2px">
										</div>
										<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1" style="font-size:18px; font-weight:bold">
											District:
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5" style="border-bottom:#000 solid 2px">
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php 
					}
				}
				?>
				<div style="font-size:30px; font-weight:bold; text-align:center">ANSWER KEYS</div>
				<div style="padding:0px; margin:0px auto"> 
					<div style="width: 471px; border: 3px solid #000; font-size: 20px; font-family: Times New Roman;margin:0px auto">

						<?php
							if(!empty($paper_mcqs)){
								$i = 0;
								foreach($paper_mcqs as $paper_mcq){
									
									if($paper_mcq->item_type == 'MCQ'){
										$i++;
									?>
									<div style="padding:20px; width: 155px; float: left; border: 1px solid #000;">Q. No.<?php print $i;?> : <?php echo $paper_mcq->item_option_correct;?></div>
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
									$para_item_21 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_21 );
									$para_item_21 = (isset($para_item_21[0]) && $para_item_21[0] != "" ) ? $para_item_21[0] : "";
									if ($para_item_21 != "") {
										if ($para_item_21->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_21->item_option_correct;?></div>
										<?php

										}
									}

								}

								if(isset($paper_para->para_item_22) && $paper_para->para_item_22 != 0)
								{
									$para_item_22 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_22 );
									$para_item_22 = (isset($para_item_22[0]) && $para_item_22[0] != "" ) ? $para_item_22[0] : "";
									if ($para_item_22 != "") {
										if ($para_item_22->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_22->item_option_correct;?></div>
										<?php
										}
									}

								}

								if(isset($paper_para->para_item_23) && $paper_para->para_item_23 != 0)
								{
									$para_item_23 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_23 );
									$para_item_23 = (isset($para_item_23[0]) && $para_item_23[0] != "" ) ? $para_item_23[0] : "";
									if ($para_item_23 != "") {
										if ($para_item_23->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_23->item_option_correct;?></div>
										<?php
										}
									}

								}

								if(isset($paper_para->para_item_24) && $paper_para->para_item_24 != 0)
								{
									$para_item_24 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_24 );
									$para_item_24 = (isset($para_item_24[0]) && $para_item_24[0] != "" ) ? $para_item_24[0] : "";
									if ($para_item_24 != "") {
										if ($para_item_24->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_24->item_option_correct;?></div>
										<?php
										}
									}

								}

								if(isset($paper_para->para_item_25) && $paper_para->para_item_25 != 0)
								{
									$para_item_25 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_25 );
									$para_item_25 = (isset($para_item_25[0]) && $para_item_25[0] != "" ) ? $para_item_25[0] : "";
									if ($para_item_25 != "") {
										if ($para_item_25->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_25->item_option_correct;?></div>
										<?php
										}
									}

								}

								if(isset($paper_para->para_item_26) && $paper_para->para_item_26 != 0)
								{
									$para_item_26 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_26 );
									$para_item_26 = (isset($para_item_26[0]) && $para_item_26[0] != "" ) ? $para_item_26[0] : "";
									if ($para_item_26 != "") {
										if ($para_item_26->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_26->item_option_correct;?></div>
										<?php
										}
									}

								}

								if(isset($paper_para->para_item_27) && $paper_para->para_item_27 != 0)
								{
									$para_item_27 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_27 );
									$para_item_27 = (isset($para_item_27[0]) && $para_item_27[0] != "" ) ? $para_item_27[0] : "";
									if ($para_item_27 != "") {
										if ($para_item_27->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_27->item_option_correct;?></div>
										<?php
										}
									}

								}

								if(isset($paper_para->para_item_28) && $paper_para->para_item_28 != 0)
								{
									$para_item_28 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_28 );
									$para_item_28 = (isset($para_item_28[0]) && $para_item_28[0] != "" ) ? $para_item_28[0] : "";
									if ($para_item_28 != "") {
										if ($para_item_28->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_28->item_option_correct;?></div>
										<?php

										}
									}

								}

								if(isset($paper_para->para_item_29) && $paper_para->para_item_29 != 0)
								{
									$para_item_29 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_29 );
									$para_item_29 = (isset($para_item_29[0]) && $para_item_29[0] != "" ) ? $para_item_29[0] : "";
									if ($para_item_29 != "") {
										if ($para_item_29->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_29->item_option_correct;?></div>
										<?php

										}
									}

								}

								if(isset($paper_para->para_item_30) && $paper_para->para_item_30 != 0)
								{
									$para_item_30 = $this->Itemsbank_model->get_item_by_id( $paper_para->para_item_30 );
									$para_item_30 = (isset($para_item_30[0]) && $para_item_30[0] != "" ) ? $para_item_30[0] : "";
									if ($para_item_30 != "") {
										if ($para_item_30->item_type=='MCQ'){?>
											<div class="qtblock">Q. No.<?php print ++$ctr;?> : <?php echo $para_item_30->item_option_correct;?></div>
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
				
				<!-- /.box-body -->
			</div>
		</div>
        
	</section>
    
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>