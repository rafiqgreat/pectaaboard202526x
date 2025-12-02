<div class="form-background" style="min-height: 100vh;">
  <div class="login-box">
    <div class="login-logo">
    <div><img src="<?php echo base_url('assets/img/pectaa-logo.jpg'); ?>" width="125" alt="PEC ItemBankSystem" /></div>
      <h2 style="font-size: 0.7em;"><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a> <br > PCTAA ADMINISTRATION ONLY</h2>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $this->load->view('admin/includes/_messages.php') ?>
        
        <?php echo form_open(base_url('admin/auth/login'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" id="name" class="form-control" placeholder="Username" >
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
          </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
              <div class="">
                <?php /*?><a href="<?= base_url('admin/auth/forgot_password_reset'); ?>" style="float:left">Forgot Password</a><?php */?>
              </div>
            </div>
<!--             </?php if($this->recaptcha_status): ?>
              <div class="recaptcha-cnt">
                  </?php generate_recaptcha(); ?>
              </div>
            </?php endif; ?>
 -->            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
            </div>
            <!-- /.col -->
			   <div class="container" style="padding:40px 10px 10px 10px"><a href="<?= base_url('admin/itemwriter/add'); ?>" style="float:left">Click here for Itemwriter Registration</a></div> 
             
             <div class="container" style="padding: 0px 10px 10px 10px"><a href="<?= base_url('admin/itemreviewer/add'); ?>" style="float:left">Click here for Itemreviewer Registration</a></div>            
          </div>
        <?php echo form_close(); ?>
		<!-- 
		<p class="mt-3"><a href="< ?= base_url('admin/auth/forgot_password'); ?>">Forgot Password? </a></p> -->
       <?php /*?> <p class="mb-1">
          <a href="<?= base_url('admin/auth/forgot_password'); ?>">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="<?= base_url('admin/auth/register'); ?>" class="text-center">Register a new membership</a>
        </p><?php */?>
      </div>
      <!-- /.login-card-body -->
    </div>
	  
  </div>
  <!-- /.login-box -->
</div>         