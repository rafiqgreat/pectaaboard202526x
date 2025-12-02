<div class="form-background">
  <div class="login-box" style="margin: 0% auto">
    <div class="login-logo">
    <div><img src="../../assets/img/pec-logo.png" width="125" alt="PEC ItemBankSystem" /></div>
      <h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>
    </div>
    <!-- /.login-logo -->
    <div class="card" >
      <div class="card-body login-card-body">
        <p style="font-size:16px; font-weight:bold">Forgot Password</p>
        <p class="">Enter you email</p>

        <?php $this->load->view('admin/includes/_messages.php') ?>
        
        <?php echo form_open(base_url('admin/auth/forgot_password_reset'), 'class="login-form" '); ?>
          <div class="form-group has-feedback">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
          </div>
          <div class="row">
            <div class="col-6">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="Send Email Link">
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
      <!-- /.login-card-body -->
    </div>
	  
  </div>
  <!-- /.login-box -->
</div>
          