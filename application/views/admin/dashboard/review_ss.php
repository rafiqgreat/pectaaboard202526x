  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Review Statistics for SSs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
						  <th>Grade</th>
						  <th>Subject</th>
						  <th>IR_Total</th>
						  <th>IR_Process</th>
						  <th>IR_Accepted</th>
						  <th>SS_Accepted</th>
						  <th>AE_Accepted</th>
						  </tr>
					  </thead>
					  <tbody>
						  <?php 
						  $Cycle1_Accepted = $IR_Processing = $IR_Accepted = $SS_Accepted = $AE_Accepted = 0;
						  foreach($all_data['stats'] as $eng)
							{
								?>
							  <tr>
							  <td><?php echo $eng['grades']; ?></td>
							  <td><?php echo $eng['subjecs']; ?></td>
							  <td><?php echo $eng['Cycle1_Accepted']; $Cycle1_Accepted += $eng['Cycle1_Accepted'];?></td>
							  <td><?php echo $eng['IR_Processing']; $IR_Processing += $eng['IR_Processing'];?></td>
							  <td><?php echo $eng['IR_Accepted']; $IR_Accepted += $eng['IR_Accepted'];?></td>
							  <td><?php echo $eng['SS_Accepted']; $SS_Accepted += $eng['SS_Accepted'];?></td>
							  <td><?php echo $eng['AE_Accepted']; $AE_Accepted += $eng['AE_Accepted']; ?></td>

							  </tr>
							  <?php 		
							}?>
						  <tr style="font-weight: bold;">
							<th scope="row">Total</th>
							<td>&nbsp;</td>
							<td><?php echo $Cycle1_Accepted; ?></td>
							<td><?php echo $IR_Processing; ?></td>	  
							<td><?php echo $IR_Accepted; ?></td>
							<td><?php echo $SS_Accepted; ?></td>
							<td><?php echo $AE_Accepted; ?></td>
						</tr>
					  </tbody>
					</table>
              </div>
						</div>
						<div class="info-box col-6 col-sm-6 col-md-6" style="text-align: center;"> 
			  <div class="table-responsive">
				  <table class="table" style="width: 100%">
					  <thead>
						<tr>
						  <th>Username</th>
						  <th>In-Porcess</th>
						  <th>Rejected</th>
						  <th>Accepted</th>
						  </tr>
					  </thead>
					  <tbody>
						  <?php 
						  $Cycle1_Accepted = $IR_Processing = $IR_Accepted = $SS_Accepted = $AE_Accepted = 0;
						  foreach($all_data['details'] as $eng)
							{
								?>
							  <tr>
							  <td><?php echo $eng['username']; ?></td>
							  <td><?php echo $eng['inprocess']; ?></td>
							  <td><?php echo $eng['rejected']; ?></td>
							  <td><?php echo $eng['accepted']; ?></td>
							  </tr>
							  <?php 		
							}?>
						  
					  </tbody>
					</table>
              </div>
              <!-- /.info-box-content -->
            </div>
			   <!-- /.col -->
        </div>
	
		  
 <!-- Small boxes (Stat box) -->



        <!-- /.row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
