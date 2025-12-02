  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<!--<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i>View Pilot Header </h3>
				</div>
			</div>-->
			<div class="card-body">
			<!-- For Messages -->
			<?php 
			$pilotheaders = $pilotheaders[0];	
			
			$this->load->view('admin/includes/_messages.php') ?>

				<div class="row form-group" style="border-bottom: #000 solid 1px">
					<div class="col-lg-12 col-sm-12" style="text-align:center; font-weight:bold; text-transform: uppercase;"><?php print $pilotheaders['ph_paper_title'];?></div>
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
													<td style="border-bottom: 1px solid #000000;">
														&nbsp;
													</td>
												</tr>
												<tr>
													<td width="110px;"><div class="urdufont-right" style="padding-left:20px; font-size: 18px;"><span dir="RTL">سکول کا نام</span>&nbsp;</div>School Name: </td>
													<td style="border-bottom: 1px solid #000000;">
														&nbsp;
													</td>
												</tr>
											</tbody>
										</table>
									</td>
									<td width="50%" align="center">
										Curriculum Reform Performa<br>
										<div style="border: 2px solid #000000; font-size: 18px; font-weight: bold; min-width: 200px; display: inline-block;padding: 5px;"><?php print $pilotheaders['ph_paper_subject_en'];?></div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					
				</div>
				
				<div class="row">
					<div class="col-lg-12 col-sm-12" style="border-bottom:#000 solid 1px"></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12 col-sm-12 form-group">
						<?php echo $pilotheaders['ph_general_instruction']?>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-sm-12" style="border-bottom:#000 solid 1px"></div>
				</div>

				
			</div>
		</div>
	</section>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>