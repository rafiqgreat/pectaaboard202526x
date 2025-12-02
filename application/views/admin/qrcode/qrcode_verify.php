  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title">Verify QR Code</h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php
            	//echo '<PRE>';
				//print_r($school);
            	//die();
			if(!empty($verifycode)){
				//print '<pre>';print_r($verifycode);die;
			?>
			
              <div class="row">
				  <div class="col-lg-12 col-sm-12" >
					<table cellspacing="5" cellpadding="5" border="1">
						<tbody>
							<tr>
								<td><strong>Candidate:</strong> </td>
								<td><?php print $verifycode['firstname'].' '.$verifycode['lastname'];?></td>
							</tr>
                            <tr>
								<td><strong>From:</strong></td>
								<td>
                                    <?php 
                                    if($verifycode['admin_role_id'] == 3)
                                    {
                                        print $verifycode[ 'ci_iw_posting' ];
                                    }
                                    if($verifycode['admin_role_id'] == 6)
                                    {
                                        print $verifycode[ 'ci_ir_posting' ];
                                    }
                                    ?>
                                </td>
							</tr>
							<tr>
								<td><strong>Workshop:</strong></td>
								<td><?php print $verifycode[ 'ws_desc' ];?></td>
							</tr>
                            <tr>
								<td><strong>Venue:</strong></td>
								<td><?php print $verifycode[ 'ws_location' ];?></td>
							</tr>
							<tr>
								<td><strong>Workshop Date:</strong></td>
								<td><?php print 'From: '.date_time($verifycode['ws_fromdate']).', To: '.date_time($verifycode['ws_todate']);?></td>
							</tr>
						</tbody>
					</table>
				  </div>
              </div>
			<?php }?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>