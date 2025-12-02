  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard for Daily Statistics</h1>
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
        <?php
		  $stats = $all_users[0];
		  ?>
      
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Admin Users</span>
                <span class="info-box-number">
                <?php echo $stats['Admin_Users']; ?>                 
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Psychometrician</span>
                <span class="info-box-number"><?php echo $stats['PS_Users']; ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Assessment Experts</span>
                <span class="info-box-number"> <?php echo $stats['AE_Users']; ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Subject Specialist</span>
                <span class="info-box-number"> <?php echo $stats['SS_Users']; ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
	
		    <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Item Writers</span>
                <span class="info-box-number">
                <?php echo $stats['IW_Users']; ?>                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Item Reviewers</span>
                <span class="info-box-number"><?php echo $stats['IR_Users']; ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
        </div>
		  
		  <div class="row">
			  <div class="info-box col-12 col-sm-12 col-md-12" style="text-align: center; min-height: 40px;">             
				  <h3>FOR VIEW SUBJECT SPECIALIST DASHBOARD DATA CLICK ON SS BELOW,</h3>
			  </div>
		  </div>
		   <div class="row">
          <div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
                <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/5") ?>">Ms Rabia</a></span>
                <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/5") ?>">Computer Education</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
		 <div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
				  <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/6") ?>">Mr Shoukat</a></span>
				  <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/6") ?>">GK-Science</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
			<div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
                <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/8") ?>">Mr Shehzad</a></span>
                <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/8") ?>">Urdu</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
			<div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
                <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/9") ?>">Ms Saima</a></span>
                <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/9") ?>">Ethics /RE</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
		  </div>
		  <div class="row">
          <div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
                <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/11") ?>">Ms Zobia</a></span>
                <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/11") ?>">English</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
		 <div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
                <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/12") ?>">Ms Fatima</a></span>
                <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/12") ?>">Math</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
			<div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
                <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/14") ?>">Mr Fakhar</a></span>
                <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/14") ?>">Islamiat</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
			<div class="info-box col-12 col-sm-6 col-md-3" style="text-align: center;">             
              <div class="info-box-content">
                <span class="info-box-text"><a href="<?= base_url("admin/dashboard/dailydatass/15") ?>">Mr Rana Islam</a></span>
                <span class="info-box-number"><a href="<?= base_url("admin/dashboard/dailydatass/15") ?>">Social Study</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>

			   <!-- /.col -->
        </div>
	
		   <!-- Small boxes (Stat box) -->      
		  <!-- /.row -->
		  
 <!-- Small boxes (Stat box) -->
<?php if($this->session->userdata('role_id')==1): ?>		    				  
        <div class="row" style="background: #565555">
       <div class="col-6 col-sm-12 col-md-6">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;"><?php echo date("d-M-Y") ?> Report </span> 
				 
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Assessment Expert</th>
      <th scope="col">Items Reviewed</th>	  
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
	 if(isset($ae_b)){		 
		 $ix = 0;
		 $total = 0;
		 foreach($ae_b as $key=>$ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo ++$ix; ?></th>     
      <td><?php echo $ro['username'];  ?></td>
      <td><?php echo $ro['total']; $total+=$ro['total']; ?></td>	  	  
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>      
		<td><?php echo $total; ?></td>
		
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
		  <div class="col-6 col-sm-12 col-md-6">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;"><?php echo date("d-M-Y") ?> Report </span> 
				 
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject Specialist</th>
      <th scope="col">Items Approved</th>	  
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
	 if(isset($ss_b)){		 
		 $ix = 0;
		 $total = 0;
		 foreach($ss_b as $key=>$ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo ++$ix; ?></th>     
      <td><?php echo $ro['username'];  ?></td>
      <td><?php echo $ro['total']; $total+=$ro['total']; ?></td>	  	  
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>      
		<td><?php echo $total; ?></td>
		
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
<?php endif; ?>	 
<?php if($this->session->userdata('role_id')==1): ?>		    				  
        <div class="row" style="background: #565555">
       <div class="col-6 col-sm-12 col-md-6">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;"><?php echo date("d-M-Y",strtotime("-1 days")) ?> Report </span> 
				 
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Assessment Expert</th>
      <th scope="col">Items Reviewed</th>	  
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
	 if(isset($ae_b1)){		 
		 $ix = 0;
		 $total = 0;
		 foreach($ae_b1 as $key=>$ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo ++$ix; ?></th>     
      <td><?php echo $ro['username'];  ?></td>
      <td><?php echo $ro['total']; $total+=$ro['total']; ?></td>	  	  
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>      
		<td><?php echo $total; ?></td>
		
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
		  <div class="col-6 col-sm-12 col-md-6">
            <div class="info-box mb-12">
              <span class="bg-warning elevation-1"></span>
              <div class="info-box-content" style="clear: both;">
                <span class="info-box-text" style="font-size: 22px; font-weight: bold; line-height: 30px;"><?php echo date("d-M-Y",strtotime("-1 days")) ?> Report </span> 
				 
				  <div class="table-responsive">
					  <table class="table" style="width: 50%">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject Specialist</th>
      <th scope="col">Items Approved</th>	  
    </tr>
  </thead>
  <tbody>
	  <pre>
	  <?php
	 if(isset($ss_b1)){		 
		 $ix = 0;
		 $total = 0;
		 foreach($ss_b1 as $key=>$ro){			 
			 
			// die($key);
		
	  ?>
    <tr >
      <th scope="row"><?php echo ++$ix; ?></th>     
      <td><?php echo $ro['username'];  ?></td>
      <td><?php echo $ro['total']; $total+=$ro['total']; ?></td>	  	  
    </tr>
   <?php

		 }
		 ?>
		 <tr style="font-weight: bold;">
      <th scope="row">Total</th>
      <td>&nbsp;</td>      
		<td><?php echo $total; ?></td>
		
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
<?php endif; ?>	 

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
