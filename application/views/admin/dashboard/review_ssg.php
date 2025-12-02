  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard for Rejected Items in Review</h1>
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
						  <th>Item Reviewer</th>
						  <th>Item ID</th>
						  <th>Item Stem</th>
						  <th>IR Group Linked</th>						  
						  </tr>
					  </thead>
					  <tbody>
						  <?php 
						  foreach($all_data['stats'] as $eng)
							{
								?>
							  <tr>
							  <td><?php echo ($eng['item_grade_id']-2); ?></td>
							  <td><?php echo $eng['item_subject_id']; ?></td>
							  <td><?php echo $eng['username']; ?></td>
							  <td><?php echo $eng['item_id']; ?></td>
							  <td><?php echo $eng['item_stem_en'] .' '. $eng['item_stem_ur'];?></td>							  
							  <td><?php $temp = $this->dashboard_model->getGroups($eng['item_id']); foreach($temp['res'] as $t){echo $t['group_id'].'<br />IR('.$t['group_rev_status'].'),SS('.$t['group_rev_ss_status'].'), AE('.$t['group_rev_ae_status'].')';
							$this->dashboard_model->setGroupsEdit($t['group_id']);
							}  ?>  </td>							  
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
