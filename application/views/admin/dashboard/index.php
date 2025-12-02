  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2">
          <div class="col-12" style="font-size:18px; font-weight:bold">
           Welcome <?php print_r($this->session->userdata('username'));?>
           <?php 
		   if($this->session->userdata('role_id')==1){echo '(Admin)';}
		   elseif($this->session->userdata('role_id')==2){echo '(SS)';}
		   elseif($this->session->userdata('role_id')==3){echo '(IW)';}
		   elseif($this->session->userdata('role_id')==4){echo '(AE)';}
		   elseif($this->session->userdata('role_id')==5){echo '(PSM)';}
		   elseif($this->session->userdata('role_id')==6){echo '(IR)';}
		   elseif($this->session->userdata('role_id')==7){echo '(DFP)';}
		   elseif($this->session->userdata('role_id')==8){echo '(TFP)';}
			elseif($this->session->userdata('role_id')==9){echo '(DTFP)';}
		   ?>  
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- IW Dashboard 1st row starts here -->
        <?php if($this->session->userdata('role_id')==1)
		{ 
		  ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users_stats[0]['total']; ?></h3>
                <p>All Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $all_users_stats[0]['adminctr']; ?></h3>
                <p>Admin Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $all_users_stats[0]['aectr']; ?></h3>
                <p>Assessment Experts</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $all_users_stats[0]['ssctr']; ?></h3>
                <p>Subject Specialists</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users_stats[0]['iwctr']; ?></h3>
                <p>Item Writers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $all_users_stats[0]['irctr']; ?></h3>
                <p>Item Reviewers</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $all_users_stats[0]['dfpctr']; ?></h3>
                <p>District Focal Persons</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $all_users_stats[0]['tfpctr']; ?></h3>
                <p>Tehsil Focal Persons</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <?php } 
		  elseif($this->session->userdata('role_id')==3)
		  { 
		  ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $stats_ditems; ?></h3>
                <p>Draft Items</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/items/ditems'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $stats_dgroup; ?></h3>
                <p>Item's Groups</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/Itemsgroup'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $stats_dpara; ?></h3>
                <p>Item's Paragraph</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/itemspara'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $stats_ritems; ?></h3>
                <p>Rejected Items</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/items/ritems'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <?php }
		  elseif($this->session->userdata('role_id')==4)
		  { 
		  ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users_stats[0]['total']; ?></h3>
                <p>All Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $all_users_stats[0]['adminctr']; ?></h3>
                <p>Admin Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $all_users_stats[0]['aectr']; ?></h3>
                <p>Assessment Experts</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $all_users_stats[0]['ssctr']; ?></h3>
                <p>Subject Specialists</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users_stats[0]['iwctr']; ?></h3>
                <p>Item Writers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $all_users_stats[0]['irctr']; ?></h3>
                <p>Item Reviewers</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $all_users_stats[0]['dfpctr']; ?></h3>
                <p>District Focal Persons</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $all_users_stats[0]['tfpctr']; ?></h3>
                <p>Tehsil Focal Persons</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
     
        <?php }
		  elseif($this->session->userdata('role_id')==6)
		  {
		  ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $rev_stats_eitems; ?></h3>
                <p>Under Review Items</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/items/rev_eitems'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $rev_stats_egroup; ?></h3>
                <p>Item's Groups</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/Itemsgroup/rev_eitemsgroup'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $rev_stats_epara; ?></h3>
                <p>Item's Paragraph</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/itemspara/rev_eitemspara'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $rev_stats_ritems; ?></h3>
                <p>Rejected Items</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/items/rev_ir_revised_items'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <?php } 
		  elseif($this->session->userdata('role_id')==2)
		  {
		  ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users_stats[0]['iwctr']; ?></h3>
                <p>Item Writers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/itemwriters'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $all_users_stats[0]['irctr']; ?></h3>
                <p>Item Reviewer</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/itemreviewers'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php //echo $rev_stats_epara; ?>1</h3>
                <p>My Notifications</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/notification/my_notifications'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php //echo $rev_stats_ritems; ?>1</h3>
                <p>My Messages</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/notification/my_messages'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <?php } 
		  elseif($this->session->userdata('role_id')==5)
		{ 
		  ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users_stats[0]['total']; ?></h3>
                <p>All Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $all_users_stats[0]['adminctr']; ?></h3>
                <p>Admin Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $all_users_stats[0]['aectr']; ?></h3>
                <p>Assessment Experts</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $all_users_stats[0]['ssctr']; ?></h3>
                <p>Subject Specialists</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $all_users_stats[0]['iwctr']; ?></h3>
                <p>Item Writers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $all_users_stats[0]['irctr']; ?></h3>
                <p>Item Reviewers</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $all_users_stats[0]['dfpctr']; ?></h3>
                <p>District Focal Persons</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?= $all_users_stats[0]['tfpctr']; ?></h3>
                <p>Tehsil Focal Persons</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <?php } 
		 ?>
        <!-- IW Dashboard 1st row ends here -->
        
        <!--IW  Dashboard 2nd row starts here -->
        <?php if($this->session->userdata('role_id')==3)
		{
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/notification/my_messages'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">My Messages</span>
				<?php /*?><span class="info-box-number"><?= $all_grades; ?><small></small></span><?php */?>              
			  </div>
            </div>
          </a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/notification/my_notifications'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">My Notifications</span>
              </div>
            </div>
            </a>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/admin/media'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Media Images</span>
              </div>
            </div>
            </a>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
          
            <div class="info-box mb-3">
              <span></span>
              <div class="info-box-content">
				  <span class="info-box-text" style="padding-top:15px"><strong>Submitted Items:</strong> <?php print $iwtotalsubmitteditems;?></span> 				   
              </div>
            </div>
          </div>
        </div>
        <?php } 
		  elseif($this->session->userdata('role_id')==6)
		  {
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/notification/my_messages'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">My Messages</span>
				<?php /*?><span class="info-box-number"><?= $all_grades; ?><small></small></span><?php */?>              
			  </div>
            </div>
          </a>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/notification/my_notifications'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">My Notifications</span>
              </div>
            </div>
            </a>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/admin/media'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Media Images</span>
              </div>
            </div>
            </a>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
          <a href="#">
            <div class="info-box mb-3">
              <span></span>
              <div class="info-box-content">
              </div>
            </div>
            </a>
          </div>
        </div>
        <?php } 
		  elseif($this->session->userdata('role_id')==2)
		  {
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/items/ss_accepted_items'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Grades</span>
                <span class="info-box-number"> <?php echo $all_grades; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/items/rev_ss_aitems'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Subjects</span>
                <span class="info-box-number"> <?php echo $all_subjects; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/contentstand'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Content Strands</span>
                <span class="info-box-number"> <?= $all_cstands; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/subcontentstand'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Sub Content Strands</span>
                <span class="info-box-number"> <?= $all_subcstands; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <?php }
		  elseif($this->session->userdata('role_id')==1)
		  {
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/grades'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Grades</span>
                <span class="info-box-number">
                <?= $all_grades; ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/subjects'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Subjects</span>
                <span class="info-box-number"> <?= $all_subjects; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/contentstand'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Content Strands</span>
                <span class="info-box-number"> <?= $all_cstands; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/subcontentstand'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Sub Content Strands</span>
                <span class="info-box-number"> <?= $all_subcstands; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <?php } 
		  elseif($this->session->userdata('role_id')==9){
		  }
		  else 
		  {
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Grades</span>
                <span class="info-box-number">
                <?= $all_grades; ?>
                  <small></small>
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
                <span class="info-box-text">Total Subjects</span>
                <span class="info-box-number"> <?= $all_subjects; ?></span>
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
                <span class="info-box-text">Total Content Strands</span>
                <span class="info-box-number"> <?= $all_cstands; ?></span>
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
                <span class="info-box-text">Total Sub Content Strands</span>
                <span class="info-box-number"> <?= $all_subcstands; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <?php }?>
        <!-- IW Dashboard 2nd row ends here -->
        
        <!-- IW Dashboard 3rd row starts here -->
        <?php if($this->session->userdata('role_id')==3)
		{
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/items/add_combine'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Item</span>
                <span class="info-box-number">
                  <small></small>
                </span>
              </div>
            </div>
           </a>
          </div>
         
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/itemspara/add'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Paragraph</span>
              </div>
            </div>
            </a>
          </div>
          
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/itemsgroup/add'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Group</span>
              </div>
            </div>
           </a>
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/media/add'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Media</span>
              </div>
            </div>
          </a>
          </div>
        </div>
        <?php } 
		  elseif($this->session->userdata('role_id')==6)
		  {
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/items/add_combine'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Item</span>
                <span class="info-box-number">
                  <small></small>
                </span>
              </div>
            </div>
           </a>
          </div>
         
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('admin/itemspara/add'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Paragraph</span>
              </div>
            </div>
            </a>
          </div>
          
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/itemsgroup/add'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Group</span>
              </div>
            </div>
           </a>
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
          <a href="<?= base_url('admin/media/add'); ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="padding-top:15px">Add New Media</span>
              </div>
            </div>
          </a>
          </div>
        </div>
        <?php } 
		   elseif($this->session->userdata('role_id')==1)
		  {
		  ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Schools/Generated</span>
                <span class="info-box-number">
                <?= $all_schools; ?> / <?= count($schoolspapers); ?>
                  <small></small>
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
                <span class="info-box-text">Total Papers Generated</span>
                <span class="info-box-number"> <?= $all_papers; ?></span>
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
                <span class="info-box-text">Total Completed Papers</span>
                <span class="info-box-number"> <?= $papers_comp; ?></span>
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
                <span class="info-box-text">Total In-Completed Papers</span>
                <span class="info-box-number"> <?= $papers_incomp; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <?php }?>
        <!--IW Dashboard 3rd row ends here -->
        
        
		<?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4)
		{
		  ?>
		  <div class="content-header">
			  <div class="container-fluid">
				<div class="row mb-2">
				  <div class="col-sm-6">
					<h1 class="m-0 text-dark">Items Statistics</h1>
				  </div><!-- /.col -->
				</div><!-- /.row -->
			  </div><!-- /.container-fluid -->
			</div>
		<?php }?>
		<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
			  <?php if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==4){ ?>
			  <a style="display: block; white-space: break-spaces;" href="<?= base_url('admin/dashboard/itemsstats') ?>" class="btn btn-info btn-lg" role="button">Total Items Submission Details Subjects Wise</a>
			  <?php }?>
			  <?php if($this->session->userdata('role_id')==2){ ?>	
            	<a style="display: block; white-space: break-spaces;" href="<?= base_url('admin/dashboard/itemsstats') ?>" class="btn btn-info btn-lg" role="button">Total Items Submission Details Grade Wise</a>
			  <?php }?>
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
			  <?php if($this->session->userdata('role_id')==2){ ?>	
			  <a style="display: block; white-space: break-spaces;"  href="<?= base_url('admin/dashboard/itemsstats_iwwise') ?>" class="btn btn-info btn-lg" role="button">Items Submission Details ItemWriter Wise</a>
			  <?php }?>
			  <?php if($this->session->userdata('role_id')==1){ ?>	
			  <a style="display: block; white-space: break-spaces;"  href="<?= base_url('admin/dashboard/itemsstats_iwwise_batch') ?>" class="btn btn-info btn-lg" role="button">Items Submission Details ItemWriter Wise</a>
			  <?php }?>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
              <?php if($this->session->userdata('role_id')==2){ ?>	
			  <a style="display: block; white-space: break-spaces;"  href="<?= base_url('admin/dashboard/itemsstats_iwwise_batchwise') ?>" class="btn btn-info btn-lg" role="button">Items Submission Details ItemWriter Batch Wise</a>
			  <?php }?>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
          </div>
          <!-- /.col -->
        </div>  
        
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
