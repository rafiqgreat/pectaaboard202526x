<style>
 .urdufont-right {
    font-size: 22px;
}
	 body {
		 
		 font-size: 1.1rem;
	 }
	.container {
		 padding-left: 0px; padding-right: 0px;;
	 }
    .cls24{
        font-size: 24px;
    }
    hr{
        margin: 5px 0;
        border-top: 1px solid #000;
        height: 0px;
    }
    
	@media print {
    a[href]:after {
        content: none !important;
    }
		.main-footer{
		display: none;
	}
        .printbtn,.card-header{
             display: none;
         }
	}
    @media print{@page {size: landscape}}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"><i class="fa fa-edit"></i> Veiw Certificate</h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/certificate'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Certificates List</a>
          </div>
        </div>
        <div class="card-body" style="border: 10px solid; padding: 10px; position:relative;">
			<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">
				<img style="/* height: 120px; */" src="../../../assets/certificatelogos/bg_certificate3.png">
			</div>
            
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php
            	//echo '<PRE>';
				//print_r($school);
            	//die();
			if(!empty($certificate)){
				//print '<pre>';print_r($certificate);die;
				/*print 'Grade: '.$grade['grade_name_en'].'<br>';
					print 'Subject / Section: '.$subject['subject_name_en'].' ('.$section.')<br>';
					print 'School: '.$school['school_name'].'<br>';
					print 'Tehsil: '.$school['tehsil_name_en'].'<br>';
					print 'District: '.$school['district_name_en'].'<br>';
					print 'Successfully verfified!<br>';*/
			?>
			    <div class="printbtn" style="text-align: right;"><button class="btn btn-info" onClick="window.print()">Print this page</button></div>
              <div class="row">
				  <div class="col-lg-12 col-sm-12" >
                      <table cellspacing="5" cellpadding="5" border="0" style="width: 100%;">
						<tbody>
							<tr>
								<td align="left"><img style="height: 120px;" src="<?php echo base_url(); ?>/assets/certificatelogos/pec-logo.png" /></td>
                                <td class="cls24" align="center" style="text-align: center; font-weight: bold; font-size: 32px;">
                                    PUNJAB EXAMINATION COMMISSION (PEC) LAHORE
                                </td>
                                <td align="right"><img style="height: 120px;" src="<?php echo base_url(); ?>assets/certificatelogos/sed-logo.jpg" /></td>
							</tr>
						</tbody>
					</table>
					<table cellspacing="5" cellpadding="5" border="0" style="width: 100%;">
						<tbody>
							<tr>
								<td align="right" style="padding-right:20px; width:25%">
								<?php 
								 if($certificate['image'] != '' && file_exists($certificate['image'])){
								?>
									<img style="height: 120px;" src="<?php echo base_url().$certificate['image']; ?>" />
								 <?php }?>
								</td>
                                <td style="width:50%" class="cls24" align="center">
                                    <table class="cls24" cellspacing="5" cellpadding="5" border="0" style="width: 100%">
										<tbody>
											<tr>
												<td class="cls24" align="center">Certificate of Participation is Awarded To</td>
											</tr>
											<tr>
												<td align="center" style="font-weight: bold;">
													Mr/Ms. <?php print $certificate['firstname'].' '.$certificate['lastname'];?>&nbsp;
													( <?php 
													if($certificate['admin_role_id'] == 3)
													{
														print $certificate[ 'ci_iw_designation' ];
													}
													if($certificate['admin_role_id'] == 6)
													{
														print $certificate[ 'ci_ir_designation' ];
													}
													?> )
												</td>
											</tr>
											
											<tr>
												<td align="center" style="font-size: 18px;">
													<?php 
													if($certificate['admin_role_id'] == 3)
													{
														print $certificate[ 'ci_iw_posting' ].', '.$certificate['iwdistrictname'];
													}
													if($certificate['admin_role_id'] == 6)
													{
														print $certificate[ 'ci_ir_posting' ].', '.$certificate['irdistrictname'];
													}
													
													?>
												</td>
											</tr>
											<tr>
												<td class="cls24" align="center">FOR</td>
											</tr>
										</tbody>
									</table>
                                </td>
                                <td align="left" style="padding-left:20px; width:25%">
                                    <?php 
                                    if($certificate['cf_qrcode'] != "") 
                                    {?>
                                        <div>
                                            <img src="<?= base_url().$certificate['cf_qrcode'];?>"/>
                                        </div>
                                    <?php 
                                    }
                                    ?>
                                </td>
							</tr>
						</tbody>
					</table>
                      <table class="cls24" cellspacing="5" cellpadding="5" border="0" style="width: 100%">
						<tbody>
							<tr>
								<td align="center" style="font-weight: bold;"><?php print $certificate[ 'ws_desc' ];?></td>
							</tr>
                            <tr>
								<td align="center" style="font-weight: bold;">From <?php print date('F j',strtotime(date_time($certificate['ws_fromdate']))).' - '.date_time($certificate['ws_todate']);?></td>
							</tr>
                            <?php /*?><?php 
                            if($certificate[ 'ws_extra' ] != '')
                            {?>
                                <tr>
                                    <td align="center">As a <?php print $certificate[ 'ws_extra' ];?></td>
                                </tr>
                            <?php 
                            }?><?php */?>
                            <tr>
								<td class="cls24" align="center">&nbsp;</td>
							</tr>
							<tr>
								<td class="cls24" align="center"><?php print $certificate[ 'ws_extra' ];?><!--Under the assessment policy framework (APF), new role of PEC has to provide guidence, facilitator and technical support to District Education Authorities in Punjab--></td>
							</tr>
                            <tr>
								
                                <td align="right">
                                    <?php 
                                    /*if($certificate['cf_qrcode'] != "") 
                                    {?>
                                        <div>
                                            <img src="<?= base_url().$certificate['cf_qrcode'];?>"/>
                                        </div>
                                    <?php 
                                    }*/
                                    ?>
                                </td>                                
							</tr>

							<tr>
                                <td>
                                    <table cellspacing="5" cellpadding="5" border="0" style="width: 100%; font-size: 16px;">
                                        <tbody>
                                            <tr>
												<td valign="top" width="34%"><img style="height: 40px;" src="<?php echo base_url(); ?>/assets/certificatelogos/sig-1.png" /><hr><strong>Dr. Zulfiqar Ali Saqib</strong><br>Director Assessment & Framework</td>
                                                <td valign="top" width="33%"><img style="height: 40px;" src="<?php echo base_url(); ?>/assets/certificatelogos/sig-1.png" /><hr><strong>Mr. Tariq Iqbal</strong><br>Chief Executive Officer</td>
                                                <td valign="top" width="33%"><img style="height: 40px;" src="<?php echo base_url(); ?>/assets/certificatelogos/sig-3.png" /><hr><strong>Assessment Expert</strong><br>Assessment Wing</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>								
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