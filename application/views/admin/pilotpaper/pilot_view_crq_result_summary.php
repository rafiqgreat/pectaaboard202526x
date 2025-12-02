<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i> Pilot CRQs Result Summary</h3>
				</div>
			</div>
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php') ?>
				<?php echo form_open(base_url('admin/pilotpaper/pilot_crq_result_summary'), 'class="form-horizontal"');  ?>
				<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER"/>

				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<label for="item_grade_id" class="control-label">Grade </label>
						<select name="item_grade_id" class="form-control form-group" id="item_grade_id" required>
							<option value="">--Select Grade--</option>
							<?php
							foreach ( $grades as $grade ) {
								echo '<option value="' . $grade[ 'grade_id' ] . '"' . set_select( 'item_grade_id', $grade[ 'grade_id' ] ) . '>' . $grade[ 'grade_name_en' ] . '</option>';
							}
							?>
						</select>
					</div>
					<div class="col-12" style="float:right"> <input type="submit" id="get_result" name="get_result" class="btn btn-success" value="Search" style="width:120px; float:right"/>
					</div>
				</div>
				<!-- Data table start here--------------------------->
				<?php
				if ( isset( $_REQUEST[ 'get_result' ] ) && $item_grade_id != 0) {
					?>
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<h1 style="text-align: center;">Analysis CRQs Summary of Piloting Grade <?php print $item_grade_id-2;?></h1>
						</div>
					</div>
					<div class="table-responsive">
						<table id="na_datatable" class="table table-bordered table-striped" width="100%">
							<thead>
								<tr>
									<th>Subjects</th>
									<th>Piloted Items</th>
									<th>Flagged Items</th>
									<th>Accepted Items</th>
									<th>% of Flagged Items</th>
									<th>% of Accepted Items</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$subjectname = array();
							$piloteditems = array();
							$flagitems = array();
							$accepteditems = array();
					
							$flaggedItemsPercentArray = array();
							$acceptedItemsPercentArray = array();
					
							if(!empty($result_subjects)){
								foreach($result_subjects as $result_subject){ 
									$subjectname[] = $result_subject->subject_name_en;
									$piloteditems[] = $result_subject->piloteditems;
									$flagitems[] = $result_subject->flagitems;
									$accepteditems[] = $result_subject->accepteditems;
									
									//$value[] = $result_subject->flagitems;
									$flaggedItemsPercent = 0;
									$acceptedItemsPercent = 0;
									if($result_subject->piloteditems != 0){
										if($result_subject->flagitems != 0){
											$flaggedItemsPercent = ceil(($result_subject->flagitems*100)/$result_subject->piloteditems);
										}
										if($result_subject->accepteditems != 0){
											$acceptedItemsPercent = floor(($result_subject->accepteditems*100)/$result_subject->piloteditems);
										}
									}
									$flaggedItemsPercentArray[] = $flaggedItemsPercent;
									$acceptedItemsPercentArray[] = $acceptedItemsPercent;
									?>
									<tr>
										<td><?php print $result_subject->subject_name_en;?></td>
										<td><?php print $result_subject->piloteditems;?></td>
										<td><?php print $result_subject->flagitems;?></td>
										<td><?php print $result_subject->accepteditems;?></td>
										<td><?php print $flaggedItemsPercent;?></td>
										<td><?php print $acceptedItemsPercent;?></td>
									</tr>
							<?php 
								}
							}?>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<h1 style="text-align: center;">CRQs Piloting Grade <?php print $item_grade_id-2;?></h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<canvas  id="chartjs_bar"></canvas>
						</div>
					</div>
<!--5b9bd5
ed7d31
a4a4a4
ffc000
4170c3-->
					<script src="//code.jquery.com/jquery-1.9.1.js"></script>
					<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
					<script type="text/javascript">
						var ctx = document.getElementById("chartjs_bar").getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels:<?php echo json_encode($subjectname); ?>,
								datasets: [{
									label: "Piloted Items",
									backgroundColor: "#5b9bd5",
									data: <?php echo json_encode($piloteditems); ?>
								},
								{
									label: "Flagged Items",
									backgroundColor: "#ed7d31",
									data: <?php echo json_encode($flagitems); ?>
								},
								{
									label: "Accepted Items",
									backgroundColor: "#a4a4a4",
									data: <?php echo json_encode($accepteditems); ?>
								},
								{
									label: "% of Flagged Items",
									backgroundColor: "#ffc000",
									data: <?php echo json_encode($flaggedItemsPercentArray); ?>
								},
								{
									label: "% of Accepted Items",
									backgroundColor: "#4170c3",
									data: <?php echo json_encode($acceptedItemsPercentArray); ?>
								}
								]
							},
							options: {
								   legend: {
									display: true,
									position: 'bottom',

									labels: {
										fontColor: '#71748d',
										fontFamily: 'Circular Std Book',
										fontSize: 14,
									}
								},
								scales: {
								  yAxes: [{
									ticks: {
									  beginAtZero: true
									}
								  }]
								}
							}
						});
					</script>
					<?php    
				}
				?>
				<?php echo form_close( ); ?>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>