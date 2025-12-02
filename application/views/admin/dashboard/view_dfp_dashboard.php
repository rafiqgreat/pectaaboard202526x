  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard Statistics for DFP</h1>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a>
						</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="info-box col-12 col-sm-12 col-md-12" style="text-align: center;">
					<div class="table-responsive">
						<table class="table" style="width: 100%">
							<thead>
								<tr>
									<th>#</th>
									<th>District</th>
									<th>Tehsil</th>
									<th>Total School</th>
									<th>Public</th>
									<th>Private</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 0;
								$totalschool = $totalprivate = $totalpublic = 0;
								foreach($dfp_schools as $dfp_school)
								{
								  $i++;
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $dfp_school['district_name_en']; ?></td>
										<td><?php echo $dfp_school['tehsil_name_en']; ?></td>
										<td><?php echo $dfp_school['schools']; $totalschool += $dfp_school['schools'];?></td>
										<td><?php echo $dfp_school['publicschools']; $totalpublic += $dfp_school['publicschools']; ?></td>
										<td><?php echo $dfp_school['privateschools']; $totalprivate += $dfp_school['privateschools'];?></td>										
									</tr>
									<?php 		
								}	  
								?>
								<tr style="font-weight: bold;">
									<th scope="row">Total</th>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><?php echo $totalschool; ?></td>
									<td><?php echo $totalpublic; ?></td>
									<td><?php echo $totalprivate; ?></td>									
								</tr>
							</tbody>
						</table>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.col -->
		</div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= base_url() ?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>