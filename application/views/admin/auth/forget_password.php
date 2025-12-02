<div class="form-background" style="min-height: 100vh;">
	<div class="login-box">
		<div class="login-logo">
			<div><img src="<?php echo base_url('assets/img/pec-logo.png'); ?>" width="125" alt="PEC ItemBankSystem" /></div>
			<h2 style="font-size: 0.7em;"><a href="<?= base_url('school'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Forgot Password</p>

				<?php $this->load->view('admin/includes/_messages.php') ?>

				<?php echo form_open(base_url('admin/auth/forgot_password'), 'class="login-form" '); ?>
				<div class="form-group has-feedback">
					<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
				  </div>
				<div class="form-group has-feedback">
					<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" required>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-12">
						<input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="Submit">
					</div>
					<!-- /.col -->
				</div>
				<?php echo form_close(); ?>

				<p class="mt-3"><a href="<?= base_url('admin/auth/login'); ?>">You remember Password? Sign In </a>
				</p>

			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
</div>