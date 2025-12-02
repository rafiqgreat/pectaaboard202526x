  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Total Items Submission Details ItemWriter Wise</h1>
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
	  <?php if($this->session->userdata('role_id')==2 && isset($items_stats_batch1))
        { ?>		    				  
        <div class="row">
       		<div class="col-12 col-sm-12 col-md-12">
            	<div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;">Total Items Submission Details ItemWriter Wise Batch 1</span> <br />				 
				  <div class="table-responsive">
					  <table class="table" style="width: 100%">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">Item Writer</th>
							  <th scope="col">Total Items</th>
							  <th scope="col">Draft Items</th>
							  <th scope="col">Submitted Items(MCQ/CRQ)</th>	  
							  <th scope="col">SS Pending</th>
							  <th scope="col">SS Accepted</th>
							  <th scope="col">SS Rejected</th>
							</tr>
						  </thead>
						  <tbody>
							  <?php
							 if(isset($items_stats_batch1)){
								 $TotalTotal_Items = $totalDraft_Items = $totalSubmitted_Items = $totalSS_Pending = $totalSS_Accepted = $totalSS_Rejected = 0;
								 $ix = 0;
								 foreach($items_stats_batch1 as $ro){ //print '<pre>'; print_r($ro); die('123');?>
									<tr>
										<th scope="row"><?php echo ++$ix; ?></th>
										<td><?php echo $ro['itemwriter']; ?></td>
										<td><?php echo $ro['Total_Items']; $TotalTotal_Items += $ro['Total_Items'];?></td>
										<td><?php echo $ro['Draft_Items']; $totalDraft_Items += $ro['Draft_Items'];?></td>      
										<td><?php echo $ro['Submitted_Items']; print ' ('.$ro['mcq'].'/'.$ro['crq'].')'; $totalSubmitted_Items += $ro['Submitted_Items']?></td>
										<td><?php echo $ro['SS_Pending']; $totalSS_Pending += $ro['SS_Pending'];?></td>
										<td><?php echo $ro['SS_Accepted']; $totalSS_Accepted += $ro['SS_Accepted'];?></td>
										<td><?php echo $ro['SS_Rejected']; $totalSS_Rejected += $ro['SS_Rejected'];?></td>
									</tr>
									<?php
								 }?>
									<tr style="font-weight: bold;">
										<th scope="row">Total</th>
										<td>&nbsp;</td>
										<td><?php echo $TotalTotal_Items; ?></td>
										<td><?php echo $totalDraft_Items; ?></td>	  
										<td><?php echo $totalSubmitted_Items; ?></td>
										<td><?php echo $totalSS_Pending; ?></td>
										<td><?php echo $totalSS_Accepted; ?></td>
										<td><?php echo $totalSS_Rejected; ?></td>
									</tr>
							  <?php
							  }
							 ?>
						  </tbody>
						</table>
					</div> 
              </div>
				
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>		  		  
		<?php }; ?>	
		  
		<?php if($this->session->userdata('role_id')==2 && isset($items_stats_batch2))
        { ?>		    				  
        <div class="row">
       		<div class="col-12 col-sm-12 col-md-12">
            	<div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;">Total Items Submission Details ItemWriter Wise Batch 2</span> <br />				 
				  <div class="table-responsive">
					  <table class="table" style="width: 100%">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">Item Writer</th>
							  <th scope="col">Total Items</th>
							  <th scope="col">Draft Items</th>
							  <th scope="col">Submitted Items (MCQ/CRQ)</th>	  
							  <th scope="col">SS Pending</th>
							  <th scope="col">SS Accepted</th>
							  <th scope="col">SS Rejected</th>
							</tr>
						  </thead>
						  <tbody>
							  <?php
							 if(isset($items_stats_batch2)){
								 $TotalTotal_Items = $totalDraft_Items = $totalSubmitted_Items = $totalSS_Pending = $totalSS_Accepted = $totalSS_Rejected = 0;
								 $ix = 0;
								 foreach($items_stats_batch2 as $ro){?>
									<tr>
										<th scope="row"><?php echo ++$ix; ?></th>
										<td><?php echo $ro['itemwriter']; ?></td>
										<td><?php echo $ro['Total_Items']; $TotalTotal_Items += $ro['Total_Items'];?></td>
										<td><?php echo $ro['Draft_Items']; $totalDraft_Items += $ro['Draft_Items'];?></td>      
										<td><?php echo $ro['Submitted_Items'];  print ' ('.$ro['mcq'].'/'.$ro['crq'].')'; $totalSubmitted_Items += $ro['Submitted_Items']?></td>
										<td><?php echo $ro['SS_Pending']; $totalSS_Pending += $ro['SS_Pending'];?></td>
										<td><?php echo $ro['SS_Accepted']; $totalSS_Accepted += $ro['SS_Accepted'];?></td>
										<td><?php echo $ro['SS_Rejected']; $totalSS_Rejected += $ro['SS_Rejected'];?></td>
									</tr>
									<?php
								 }?>
									<tr style="font-weight: bold;">
										<th scope="row">Total</th>
										<td>&nbsp;</td>
										<td><?php echo $TotalTotal_Items; ?></td>
										<td><?php echo $totalDraft_Items; ?></td>	  
										<td><?php echo $totalSubmitted_Items; ?></td>
										<td><?php echo $totalSS_Pending; ?></td>
										<td><?php echo $totalSS_Accepted; ?></td>
										<td><?php echo $totalSS_Rejected; ?></td>
									</tr>
							  <?php
							  }
							 ?>
						  </tbody>
						</table>
					</div> 
              </div>
				
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>		  		  
		<?php }; ?>  

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
