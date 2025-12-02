  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i>
             View Header </h3>
				</div>

			</div>
			<div class="card-body">
				<!-- For Messages -->
				<?php 
			//echo '<PRE>';
			//print_r($itemspara[0]);
			$headers = $headers[0];	
			//echo '<PRE>';
			//print_r($headers);
			//die();
			
			$this->load->view('admin/includes/_messages.php') ?>

				<div class="row form-group" style="border:#000 solid 4px">
					<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">SCHOOL BASED ASSESMENT <?php print date('Y');?></div>
					<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold">GRADE
						<?php echo $headers['grade_code'];?> </div>
					<div class="col-lg-12 col-sm-12" style="text-align:center; font-size:36px; font-weight:bold; text-transform:uppercase">
						<?php echo $headers['subject_name_en'];?><!-- MCQs--></div>

				</div>
				<div class="row form-group">
					<div class="col-lg-12 col-md-12 col-sm-12" style="font-size:18px; font-weight:bold">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="font-size:18px; font-weight:bold">
								School Name  :
							</div>
							<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" style="border-bottom:#000 solid 2px">
							</div>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
						<div class="row">
							<div class="col-xl-2 col-lg-5 col-md-2 col-sm-2" style="font-size:18px; font-weight:bold">
								Tehsil :
							</div>
							<div class="col-xl-10 col-lg-7 col-md-10 col-sm-10" style="border-bottom:#000 solid 2px">
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
						<div class="row">
							<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3" style="font-size:18px; font-weight:bold">
								District :
							</div>
							<div class="col-xl-10 col-lg-9 col-md-9 col-sm-9" style="border-bottom:#000 solid 2px">
							</div>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-4 col-sm-4" style="font-size:18px; font-weight:bold">
								Student Name :
							</div>
							<div class="col-xl-8 col-lg-7 col-md-8 col-sm-8" style="border-bottom:#000 solid 2px">
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
						<div class="row">
							<div class="col-xl-2 col-lg-3 col-md-3 col-sm-3" style="font-size:18px; font-weight:bold">
								Section :
							</div>
							<div class="col-xl-10 col-lg-9 col-md-9 col-sm-9" style="border-bottom:#000 solid 2px">
							</div>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-4 col-sm-4" style="font-size:18px; font-weight:bold">
								Roll Number :
							</div>
							<div class="col-xl-8 col-lg-7 col-md-8 col-sm-8" style="border-bottom:#000 solid 2px">
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6" style="font-size:18px; font-weight:bold">
						<div class="row">
							<div class=" col-xl-2 col-lg-2 col-md-3 col-sm-2" style="font-size:18px; font-weight:bold">
								Date :
							</div>
							<div class="col-xl-10 col-lg-10 col-md-9 col-sm-10" style="border-bottom:#000 solid 2px">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-sm-12" style="border:#000 solid 1px"></div>
				</div>
				<?php
				if ( $headers[ 'subject_name_en' ] == 'Urdu' )
				{
				?>
				<div class="row">
					<div class="col-lg-12 col-sm-12 form-group urdufont-right" style="text-align:right">
						<?php echo $headers['h_general_instruction']?>
					</div>
				</div>
				<?php
				} else
				{
				?>
				<div class="row">
					<div class="col-lg-12 col-sm-12 form-group">
						<?php echo $headers['h_general_instruction']?>
					</div>
				</div>
				<?php
				}
				?>

				<div class="row">
					<div class="col-lg-12 col-sm-12" style="border:#000 solid 1px"></div>
				</div>

				<div class="row form-group" style="margin-top:10px; font-size:18px">
					<div class="col-lg-3 col-sm-3" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
						<?php echo $headers['h_paper_marks']?>
						<?php if($headers['h_paper_marks_ur'] != ''){?>
							<span class="urdufont-right" style="font-size: 22px;"><?php echo $headers['h_paper_marks_ur'];?></span>
						<?php }?>
					</div>

					<div class="col-lg-5 col-sm-5" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
						<?php print $headers['h_paper_type'];?>
						<?php if($headers['h_paper_type_ur'] != ''){?>
							<span class="urdufont-right" style="font-size: 22px;"><?php echo $headers['h_paper_type_ur'];?></span>
						<?php }?>
					</div>

					<div class="col-lg-4 col-sm-4" style="text-align:center; font-weight:bold; border:#000 solid 4px;">
						<?php echo $headers['h_paper_time']?>
						<?php if($headers['h_paper_time_ur'] != ''){?>
							<span class="urdufont-right" style="font-size: 22px;"><?php echo $headers['h_paper_time_ur'];?></span>
						<?php }?>
					</div>

				</div>

				<div class="row form-group">
					<div class="col-lg-12 col-sm-12" style="font-size:18px; font-weight:bold">
						<?php echo $headers['h_paper_instruction_en']?>
					</div>
				</div>

				<div class="row form-group urdufont-right">
					<div class="col-lg-12 col-sm-12" style="font-size:18px; font-weight:bold; text-align:right">
						<?php echo $headers['h_paper_instruction_ur']?>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<hr/>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>