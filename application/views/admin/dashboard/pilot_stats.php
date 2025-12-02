  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Pilot Status</h1>
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
						  <th>Cycle-1 Items</th>
						  <th>Pilot_AE_Accepted</th>
						  <th>Pilot_AE_MCQs</td>
						  <th>Pilot_AE_CRQs</th>
						  </tr>
					  </thead>
					  <tbody>
						  <?php 
						  $Cycle1_Items = $Pilot_AE_Accepted = $Pilot_AE_MCQs = $Pilot_AE_ERQs = 0;
						  foreach($Data_Items as $eng)
							{
								?>
							  <tr>
							  <td><?php echo $eng['Grade']; ?></td>
							  <td><?php echo $eng['subject_name_en']; ?></td>
							  <td><?php echo $eng['Cycle1_Items']; $Cycle1_Items += $eng['Cycle1_Items'];?></td>
							  <td><?php echo $eng['Pilot_AE_Accepted']; $Pilot_AE_Accepted += $eng['Pilot_AE_Accepted'];?></td>
							  <td><?php echo $eng['Pilot_AE_MCQs']; $Pilot_AE_MCQs += $eng['Pilot_AE_MCQs'];?></td>
							  <td><?php echo $eng['Pilot_AE_ERQs']; $Pilot_AE_ERQs += $eng['Pilot_AE_ERQs'];?></td>
							  </tr>
							  <?php 		
							}	  
						  ?>
						   <tr style="font-weight: bold;">
							<th scope="row">Total</th>
							<td>&nbsp;</td>
							<td><?php echo $Cycle1_Items; ?></td>
							<td><?php echo $Pilot_AE_Accepted; ?></td>	  
							<td><?php echo $Pilot_AE_MCQs; ?></td>
							<td><?php echo $Pilot_AE_ERQs; ?></td>
						  </tr>
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
