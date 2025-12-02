<?php
//$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
$parentli = false;
if ($this->uri->segment(3) != '') {
	$cur_tab = $this->uri->segment(3);
	$parentli = true;
} else {
	$cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2);
}
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin'); ?>" class="brand-link"> <img src="<?= base_url($this->general_settings['favicon']); ?>" alt="Logo" class="brand-image img-circle elevation-3"
			style="opacity: .8"> <span class="brand-text font-weight-light">
			<?= $this->general_settings['application_name']; ?>
		</span> </a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<?php if ($this->session->userdata('image') != '') { ?>
					<img style="height: 2.1rem;" src="<?php echo base_url() . $this->session->userdata('image'); ?>" class="img-circle elevation-2" alt="User Image">
				<?php } else { ?>
					<img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				<?php } ?>
			</div>
			<div class="info"> <a href="<?= base_url('admin/profile/profile_view/' . $this->session->userdata('admin_id')); ?>" class="d-block"><?php echo ucwords($this->session->userdata('username')); ?>(<?php echo strtoupper($this->session->userdata('role_short')); ?>)</a> </div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
				<li id="dashboard" class="nav-item has-treeview"> <a href="<?= base_url('admin') ?>" class="nav-link"> <i class="nav-icon fa fa-dashboard"></i>
						<p> Dashboard </p>
					</a> </li>
				<?php /*if ($this->session->userdata('role_id') != 9): ?>
				<li id="midterm" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-user"></i>
						<p> Previous Itembanks<i class="right fa fa-angle-left"></i> </p>
					</a>
					<ul class="nav nav-treeview" style="margin-left:10px">
						<!-- <li id="mid_term_25" class="nav-item"> <a href="< ?= base_url('admin/midterm/itembanks202526'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
              <p>MCQs Items List 2025</p>
              </a> </li> -->
						<li id="midterm_23" class="nav-item"> <a href="<?= base_url('admin/midterm/midterm_23'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
								<p>Itembanks 2023-24</p>
							</a> </li>
						<li id="midterm_24" class="nav-item"> <a href="<?= base_url('admin/midterm/midterm_24'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
								<p>Itembanks 2024-25</p>
							</a> </li>
					</ul>
				</li>
				<?php endif;*/ ?>
 <li id="paper" class="nav-item has-treeview"> <a href="<?= base_url('admin/paper') ?>" class="nav-link"> <i class="nav-icon fa fa-edit"></i>
                       <p> Model SLOs </p>
                       </a> </li>
		<li id="mod_paper" class="nav-item has-treeview"> 
                	<a href="<?= base_url('admin/testpaper') ?>" class="nav-link"> 
                    	<i class="nav-icon fa fa-edit"></i>
                    	<p> Model Papers </p>
                    </a> 
                </li>
                   <?php /*?> <li id="combinepdfbook" class="nav-item has-treeview" > <a href="#" class="nav-link"> <i class="fa fa-shopping-basket nav-icon"></i>
                     <p>Full Model Papers <i class="right fa fa-angle-left"></i> </p>
                     </a>
                     <ul class="nav nav-treeview" style="margin-left:10px">
                       <li id="booklist" class="nav-item"> <a href="<?= base_url('admin/combinepdf/list'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
                           <p>Full Model Papers List</p>
                           </a> 
                       </li>
                       <li id="combinepdf" class="nav-item"> <a href="<?= base_url('admin/combinepdf'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
                           <p>Generate Full Model Papers</p>
                           </a> 
                       </li> 
                     </ul>
                   </li>
		<?php */?>
				<li id="users" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-user"></i>
						<p> Users Management <i class="right fa fa-angle-left"></i> </p>
					</a>
					<ul class="nav nav-treeview" style="margin-left:10px">
						<li id="myprofileview" class="nav-item"> <a href="<?= base_url('admin/profile/profile_view/' . $this->session->userdata('admin_id')); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
								<p>My Profile</p>
							</a> </li>
						<li id="myprofileedit" class="nav-item"> <a href="<?= base_url('admin/profile/profile_edit/' . $this->session->userdata('admin_id')); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
								<p>My Profile Edit</p>
							</a> </li>
						<li id="mypasswordchange" class="nav-item">
							<a href="<?= base_url('admin/profile/change_pwd'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
								<p>My Password Change</p>
							</a>
						</li>
						<?php if (in_array('role_users', $this->session->userdata('role_permissions'))): ?>

							<li id="userslist" class="nav-item">
								<a href="<?php echo base_url('admin/users'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Users List</p>
								</a>
							</li>
							<li id="addnewuser" class="nav-item">
								<a href="<?= base_url('admin/users/add'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Add New User</p>
								</a>
							</li>
						<?php endif; ?>

						<?php if ($this->session->userdata('role_id') == 2): ?>
							<li id="itemwriters" class="nav-item"> <a href="<?= base_url('admin/itemwriters'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p> Itemwriters List </p>
								</a> </li>
						<?php endif; ?>
						<?php if ($this->session->userdata('role_id') == 2): ?>
							<li id="itemreviewers" class="nav-item"> <a href="<?= base_url('admin/itemreviewers'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p> Itemreviewers List </p>
								</a> </li>
						<?php endif; ?>
						<?php if ($this->session->userdata('role_id') == 1): ?>
							<li id="workshop" class="nav-item"> <a href="<?= base_url('admin/workshop'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p> Workshops List </p>
								</a> </li>
						<?php endif; ?>
						<?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
							<li id="certificate" class="nav-item"> <a href="<?= base_url('admin/certificate'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p> Certificates List </p>
								</a> </li>
						<?php endif; ?>
					</ul>
				</li>

				<?php if ($this->session->userdata('role_id') != 9): ?>
            			<?php /*?><li class="nav-item has-treeview" id="notification"> <a href="#" class="nav-link"> <i class="fa fa-shopping-basket nav-icon"></i>
						<p> Communications <i class="right fa fa-angle-left"></i> </p>
					</a>
					<ul class="nav nav-treeview" style="margin-left:10px">
						<li id="notificationmy_messages" class="nav-item"> <a href="<?= base_url('admin/notification/my_messages'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
								<p>My Messages</p>
							</a>
						</li>
						<li id="notificationmessage" class="nav-item"> <a href="<?= base_url('admin/notification/message'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
								<p>Send New Messages</p>
							</a>
						</li>
						<li id="notificationmy_notifications" class="nav-item"> <a href="<?= base_url('admin/notification/my_notifications'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
								<p>My Notifications</p>
							</a>
						</li>
						<li id="notificationindex" class="nav-item"> <a href="<?= base_url('admin/notification'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
								<p>Send New Notifications</p>
							</a>
						</li>
					</ul>

				</li>
				<?php */?>
				<li class="nav-item has-treeview" id="media"> <a href="#" class="nav-link"> <i class="fa fa-shopping-basket nav-icon"></i>
						<p> Media Gallery <i class="right fa fa-angle-left"></i> </p>
					</a>
					<ul class="nav nav-treeview" style="margin-left:10px">
						<li id="medialist" class="nav-item"> <a href="<?= base_url('admin/media'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
								<p>Media List</p>
							</a>
						</li>
						<li id="mediaadd" class="nav-item"> <a href="<?= base_url('admin/media/add'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
								<p>Add Media</p>
							</a>
						</li>
					</ul>
				</li>
            <?php endif; ?>

				<?php /*if ($this->session->userdata('role_id') == 1): ?>
					<li id="specialreport" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-search"></i>
							<p> Special Reports <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview">
							<li id="reports_comments" class="nav-item"> <a href="<?= base_url('admin/reports/reports_comments'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Search Comments</p>
								</a> </li>
							<li id="reports_admin" class="nav-item"> <a href="<?php echo base_url('admin/reports/reports_admin'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
              <p>Search Items</p>
              </a> </li>
						</ul>
					</li>
				<?php endif;*/ ?>

				<?php if ($this->session->userdata('role_id') == 2): ?>
					<?php /*?><li id="itemwritecycle1" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
							<p> Items Writing Cycle I <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview">

							<li id="ss_pitems" class="nav-item">
								<a href="<?php echo base_url('admin/items/ss_pitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Pending Items</p>
								</a>
							</li>
							<li id="ss_accepted_items" class="nav-item">
								<a href="<?php echo base_url('admin/items/ss_accepted_items'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Acepted Items</p>
								</a>
							</li>
							<li id="ss_rejected_items" class="nav-item">
								<a href="<?php echo base_url('admin/items/ss_rejected_items'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Rejected Items</p>
								</a>
							</li>
							<li id="ss_discarded_items" class="nav-item">
								<a href="<?php echo base_url('admin/items/ss_discarded_items'); ?>" class="nav-link"> <i class="fa fa-trash nav-icon"></i>
									<p>Discarded Basket</p>
								</a>
							</li>
							<li id="ssindex" class="nav-item">
								<a href="<?= base_url('admin/Itemsgroup/ssindex'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p> Items Group </p>
								</a>
							</li>
							<li id="ss_pindex" class="nav-item">
								<a href="<?= base_url('admin/itemspara/ss_pindex'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Items Paragraphs </p>
								</a>
							</li>
						</ul>
					</li>
					<?php */?>
					<li id="itemreviewcycle2" class="nav-item has-treeview">
						<a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
							<p> Items Review Cycle <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview">
							<li id="rev_ss_pitems" class="nav-item">
								<a href="<?php echo base_url('admin/items/rev_ss_pitems'); ?>" class="nav-link"> <i class="fa fa-caret-right nav-icon"></i>
									<p>Pending</p>
								</a>
							</li>
							<li id="rev_ss_aitems" class="nav-item">
								<a href="<?php echo base_url('admin/items/rev_ss_aitems'); ?>" class="nav-link"> <i class="fa fa-caret-right nav-icon"></i>
									<p>Reviewed/Accepted</p>
								</a>
							</li>
							<li id="rev_ss_revised_items" class="nav-item">
								<a href="<?php echo base_url('admin/items/rev_ss_revised_items'); ?>" class="nav-link"> <i class="fa fa-caret-right nav-icon"></i>
									<p>Revised/Rejected</p>
								</a>
							</li>
							<li id="rev_ss_resubmitted_items" class="nav-item">
								<a href="<?php echo base_url('admin/items/rev_ss_resubmitted_items'); ?>" class="nav-link"> <i class="fa fa-caret-right nav-icon"></i>
									<p>Re-Submitted</p>
								</a>
							</li>
							<li id="rev_ss_ungroup_items" class="nav-item">
								<a href="<?= base_url('admin/items/rev_ss_ungroup_items'); ?>" class="nav-link"> <i class="fa fa-caret-right nav-icon"></i>
									<p> Ungrouped Items </p>
								</a>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p> Items Group <i class="right fa fa-angle-double-left"></i> </p>
								</a>
								<ul class="nav nav-treeview" style="margin-left:10px">
									<li id="rev_ss_pitemsgroup" class="nav-item"> <a href="<?php echo base_url('admin/Itemsgroup/rev_ss_pitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Pending</p>
										</a> </li>
									<li id="rev_ss_aitemsgroup" class="nav-item"> <a href="<?php echo base_url('admin/Itemsgroup/rev_ss_aitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Reviewed/Accepted</p>
										</a> </li>
								</ul>
							</li>
							<li class="nav-item has-treeview">
								<a href="#" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Items Paragraphs <i class="right fa fa-angle-double-left"></i> </p>
								</a>
								<ul class="nav nav-treeview" style="margin-left:10px">
									<li id="rev_ss_pitemspara" class="nav-item"> <a href="<?php echo base_url('admin/Itemspara/rev_ss_pitemspara'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Pending</p>
										</a> </li>
									<li id="rev_ss_aitemspara" class="nav-item"> <a href="<?php echo base_url('admin/Itemspara/rev_ss_aitemspara'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Reviewed/Accepted</p>
										</a> </li>
								</ul>
							</li>
						</ul>

					</li>
				<?php endif;  ?>



				<?php if ($this->session->userdata('role_id') == 14): ?>
					<li id="itemwritecycle1" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
							<p> Itmes Writing Cycle I <i class="right fa fa-angle-left"></i> </p>
						</a>


						<ul class="nav nav-treeview" style="margin-left:10px">
							<li class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
									<p> Items <i class="right fa fa-angle-double-left"></i> </p>
								</a>
								<ul class="nav nav-treeview" style="margin-left:10px">
									<li id="ae_pitems" class="nav-item"> <a href="<?php echo base_url('admin/items/ae_pitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Pending Items</p>
										</a> </li>
									<li id="ae_accepted_items" class="nav-item"> <a href="<?php echo base_url('admin/items/ae_accepted_items'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Acepted Items</p>
										</a> </li>
									<li id="ae_rejected_items" class="nav-item"> <a href="<?php echo base_url('admin/items/ae_rejected_items'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Rejected Items</p>
										</a> </li>
								</ul>
							</li>
						</ul>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<li id="aeindex" class="nav-item"> <a href="<?= base_url('admin/Itemsgroup/aeindex'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p> Items Group </p>
								</a> </li>
						</ul>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<li id="ae_pindex" class="nav-item"> <a href="<?= base_url('admin/itemspara/ae_pindex'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Items Paragraphs </p>
								</a> </li>
						</ul>

					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('role_id') == 4): ?>
					<li id="itemreviewcycle2" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
							<p> Itmes Writing Cycle <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<li class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
									<p> Items <i class="right fa fa-angle-double-left"></i> </p>
								</a>
								<ul class="nav nav-treeview" style="margin-left:10px">
									<li id="rev_ae_pitems" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_ae_pitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Pending Items</p>
										</a> </li>
									<li id="rev_ae_aitems" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_ae_aitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Reviewed/Accepted</p>
										</a> </li>
									<li id="rev_ae_revised_items" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_ae_revised_items'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Revised/Rejected</p>
										</a> </li>
									<li id="rev_ae_resubmitted_items" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_ae_resubmitted_items'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Re-Submitted</p>
										</a> </li>
								</ul>
							</li>
						</ul>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<li class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p> Items Group <i class="right fa fa-angle-left"></i> </p>
								</a>
								<ul class="nav nav-treeview">
									<li id="rev_ae_pitemsgroup" class="nav-item"> <a href="<?php echo base_url('admin/Itemsgroup/rev_ae_pitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Pending</p>
										</a> </li>
									<li id="rev_ae_aitemsgroup" class="nav-item"> <a href="<?php echo base_url('admin/Itemsgroup/rev_ae_aitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Reviewed/Accepted</p>
										</a> </li>
								</ul>
							</li>
						</ul>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<li class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Items Paragraphs <i class="right fa fa-angle-left"></i> </p>
								</a>
								<ul class="nav nav-treeview">
									<li id="rev_ae_pitemspara" class="nav-item"> <a href="<?php echo base_url('admin/Itemspara/rev_ae_pitemspara'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Pending</p>
										</a> </li>
									<li id="rev_ae_aitemspara" class="nav-item"> <a href="<?php echo base_url('admin/Itemspara/rev_ae_aitemspara'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
											<p>Reviewed/Accepted</p>
										</a> </li>
								</ul>
							</li>
						</ul>

					</li>
				<?php endif; ?>


				<?php if ($this->session->userdata('role_id') == 12 || $this->session->userdata('role_id') == 11): ?>
					<li id="duplication" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-download"></i>
							<p> Plagiarism / Duplication <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<?php /*?><li id="aplagiarism_check" class="nav-item">
                <a href="<?php echo base_url('admin/reports/plagiarism_check'); ?>" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Plagiarism/Duplication Check</p>
                </a>
            </li><?php */ ?>
							<li id="plagiarism_duplicate" class="nav-item">
								<a href="<?php echo base_url('admin/reports/plagiarism_duplicate'); ?>" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Check Duplication</p>
								</a>
							</li>
							<?php /*?><li id="plagiarism_check_items" class="nav-item">
                <a href="<?php echo base_url('admin/reports/plagiarism_check_items'); ?>" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Plagiarism</p>
                </a>
            </li><?php */ ?>
						</ul>
					</li>
					<li id="rep_advance_search" class="nav-item">
						<a href="<?php echo base_url('admin/reports/rep_advance_search'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p>Item Advance Search</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2): ?>
					<li id="content" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-book"></i>
							<p> Content Management <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview">
							<?php if ($this->session->userdata('role_id') == 1) :  ?>
								<li id="grades" class="nav-item" style="margin-left:10px"> <a href="<?php echo base_url('admin/grades'); ?>" class="nav-link"> <i class="nav-icon fa fa-book"></i>
										<p>Grades</p>
									</a> </li>
								<li id="subjects" class="nav-item" style="margin-left:10px"> <a href="<?php echo base_url('admin/subjects'); ?>" class="nav-link"> <i class="nav-icon fa fa-book"></i>
										<p>Subjects</p>
									</a> </li>
							<?php endif; ?>
							<li id="contentstand" class="nav-item" style="margin-left:10px"> <a href="<?php echo base_url('admin/contentstand'); ?>" class="nav-link"> <i class="nav-icon fa fa-book"></i>
									<p>Content Strand</p>
								</a> </li>
							<li id="subcontentstand" class="nav-item" style="margin-left:10px"> <a href="<?= base_url('admin/subcontentstand'); ?>" class="nav-link"> <i class="nav-icon fa fa-book"></i>
									<p>SubContent Strand</p>
								</a> </li>
							<li id="slos" class="nav-item" style="margin-left:10px"> <a href="<?= base_url('admin/slos'); ?>" class="nav-link"> <i class="nav-icon fa fa-book"></i>
									<p>SLOs</p>
								</a> </li>
							<li id="importsslos" class="nav-item" style="margin-left:10px"> <a href="<?= base_url('admin/imports'); ?>" class="nav-link"> <i class="nav-icon fa fa-book"></i>
									<p>Import / Export SLOs</p>
								</a> </li>
						</ul>
					</li>
				<?php endif; ?>



				<?php if ($this->session->userdata('role_id') == 5): ?>
					<li id="psy_items" class="nav-item">
						<a href="<?php echo base_url('admin/items/psy_items'); ?>" class="nav-link"> <i class="nav-icon fa fa-edit"></i>
							<p> Pending Items </p>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('role_id') == 5): ?>
					<li id="psy_items_rev" class="nav-item">
						<a href="<?php echo base_url('admin/items/psy_items_rev'); ?>" class="nav-link"> <i class="nav-icon fa fa-edit"></i>
							<p> Reviewed Items </p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('role_id') == 3): ?>
					<li id="iwitems" class="nav-item has-treeview">
						<a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
							<p> Items <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<li id="add_combine" class="nav-item"> <a href="<?= base_url('admin/items/add_combine'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Add New Item</p>
								</a> </li>
							<li id="ditems" class="nav-item"> <a href="<?php echo base_url('admin/items/ditems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Draft Items</p>
								</a> </li>
							<?php /*?><li id="sitems" class="nav-item"> <a href="<?php echo base_url('admin/items/sitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
              <p>Submitted Items</p>
              </a> </li><?php */ ?>
							<li id="ritems" class="nav-item"> <a href="<?php echo base_url('admin/items/ritems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Rejected Items</p>
								</a> </li>


						</ul>
					</li>
					<li id="iwitemgroup" class="nav-item">
						<a href="<?= base_url('admin/Itemsgroup/index'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
							<p> Items Group </p>
						</a>
					</li>
					<li id="iwitemspara" class="nav-item">
						<a href="<?= base_url('admin/itemspara'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
							<p> Items Paragraphs </p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('role_id') == 6): ?>
					<li id="iritems" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
							<p> Items <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview">
							<li id="rev_pitems" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_pitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Pending</p>
								</a> </li>
							<li id="rev_eitems" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_eitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Under Review</p>
								</a> </li>
							<li id="rev_ir_revised_items" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_ir_revised_items'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Revised/Rejected</p>
								</a> </li>
						</ul>
					</li>
					<li id="iritemgroups" class="nav-item has-treeview">
						<a href="#" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
							<p> Items Group <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview">
							<li id="rev_pitemsgroup" class="nav-item"> <a href="<?php echo base_url('admin/Itemsgroup/rev_pitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Pending</p>
								</a> </li>
							<li id="rev_eitemsgroup" class="nav-item"> <a href="<?php echo base_url('admin/Itemsgroup/rev_eitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Under Review</p>
								</a> </li>
						</ul>
					</li>
					<li id="iritemparas" class="nav-item has-treeview">
						<a href="#" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
							<p> Items Paragraph <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview">
							<li id="rev_pindex" class="nav-item"> <a href="<?php echo base_url('admin/itemspara/rev_pindex'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Pending</p>
								</a> </li>
							<li id="rev_eitemspara" class="nav-item"> <a href="<?php echo base_url('admin/itemspara/rev_eitemspara'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
									<p>Under Review</p>
								</a> </li>
						</ul>
					</li>
				<?php endif;  ?>

				<?php if ($this->session->userdata('role_id') == 1): ?>
					<li id="pilot_sync" class="nav-item">
						<a href="<?php echo base_url('admin/pilot_items/sync_mcq_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-edit"></i>
							<p> Sync. MCQs/CRQs to Pilot </p>
						</a>
					</li>
					<li id="sync_group" class="nav-item">
						<a href="<?php echo base_url('admin/pilot_items/sync_group'); ?>" class="nav-link"> <i class="nav-icon fa fa-edit"></i>
							<p> Sync. Groups to Pilot </p>
						</a>
					</li>
					<li id="sync_para" class="nav-item">
						<a href="<?php echo base_url('admin/pilot_items/sync_para'); ?>" class="nav-link"> <i class="nav-icon fa fa-edit"></i>
							<p> Sync. Paragraphs to Pilot </p>
						</a>
					</li>
				<?php endif; ?>

				<?php /*if($this->session->userdata('role_id')==1 ):?>
        <li id="sync_pilotbucket" class="nav-item has-treeview" > <a href="#" class="nav-link"> <i class="fa fa-shopping-basket nav-icon"></i>
          <p> Sync. to Pilot<i class="right fa fa-angle-left"></i> </p>
          </a>
          <ul class="nav nav-treeview" style="margin-left:10px">
			<li id="pilot_sync_mcq_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_items/sync_mcq_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
              <p> Sync. Items MCQs </p>
              </a>
            </li>
			  <li id="pilot_sync_erq_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_items/sync_erq_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
              <p> Sync. Items ERQs </p>
              </a>
            </li>
			   <li id="pilot_sync_group_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_itemsgroup/sync_group_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
              <p> Sync. Items Group </p>
              </a>
            </li>
			   <li id="pilot_sync_para_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_itemspara/sync_para_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
              <p> Sync. Items Paragraph </p>
              </a>
          </ul>
        </li>
        <?php endif; */ ?>
				<?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1): ?>
					<li id="pilotbucket" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="fa fa-shopping-basket nav-icon"></i>
							<p> Pilot Bucket <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview" style="margin-left:10px">

							<li id="pilotheaders" class="nav-item"> <a href="<?= base_url('admin/pilotheaders'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p> Pilot Headers </p>
								</a>
							</li>
							<li id="pilot_itemsmcq_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_items/mcq_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p> Items MCQs </p>
								</a>
							</li>
							<li id="pilot_itemserq_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_items/erq_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Items ERQs </p>
								</a>
							</li>
							<li id="group_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_itemsgroup/group_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Items Group </p>
								</a>
							</li>
							<li id="para_p1" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/pilot_itemspara/para_p1'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Items Paragraph </p>
								</a>
							</li>
							<li id="paperview" class="nav-item has-treeview"> <a href="<?php echo base_url('admin/paperview'); ?>" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
									<p> Paper View of Pilot Items </p>
								</a>
							</li>
						</ul>
					</li>
				<?php endif;  ?>
				<?php if (in_array($this->session->userdata('role_id'), array(11, 12, 14))): ?>
					<li class="nav-item has-treeview" id="pilotpaper"> <a href="#" class="nav-link"> <i class="fa fa-shopping-basket nav-icon"></i>
							<p> Pilot Papers Generation <i class="right fa fa-angle-left"></i> </p>
						</a>
						<ul class="nav nav-treeview" style="margin-left:10px">
							<?php if ($this->session->userdata('role_id') == 1): ?>
								<li id="generatepilotpaper" class="nav-item"> <a href="<?= base_url('admin/pilotpaper/generatepilotpaper'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
										<p>Generate Pilot Papers</p>
									</a>
								</li>
							<?php endif;  ?>
							<li id="pilot1index" class="nav-item"> <a href="<?= base_url('admin/pilotpaper'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p>Auto Pilot Papers P-1</p>
								</a>
							</li>
							<li id="pilot2index" class="nav-item"> <a href="<?= base_url('admin/pilotpaper/index2'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p>Auto Pilot Papers P-2</p>
								</a>
							</li>
							<li id="pilot_meta_import" class="nav-item"> <a href="<?= base_url('admin/imports/pilot_meta_import'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p>Pilot Meta Import/Tagging</p>
								</a>
							</li>
							<li id="pilot_crq_meta_import" class="nav-item"> <a href="<?= base_url('admin/imports/pilot_crq_meta_import'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p>CRQPilot Meta Import/Tagging</p>
								</a>
							</li>
							<li id="pilot_import_marks" class="nav-item"> <a href="<?= base_url('admin/imports/pilot_import_marks'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
									<p>Pilot Marks Import</p>
								</a>
							</li>
					</li>
					<li id="pilot_result_summary" class="nav-item"> <a href="<?= base_url('admin/pilotpaper/pilot_result_summary'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
							<p>Pilot MCQs Result Summary</p>
						</a>
					</li>
					<li id="pilot_crq_result_summary" class="nav-item"> <a href="<?= base_url('admin/pilotpaper/pilot_crq_result_summary'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
							<p>Pilot CRQs Result Summary</p>
						</a>
					</li>
			</ul>
			</li>
		<?php endif;  ?>
		<?php if ($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 1  || $this->session->userdata('role_id') == 4): ?>
			<li class="nav-item has-treeview" id="itemsbank"> <a href="#" class="nav-link"> <i class="fa fa-shopping-basket nav-icon"></i>
					<p> Itembanks <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview" style="margin-left:10px">
					<li id="itemsbankmcq" class="nav-item"> <a href="<?= base_url('admin/itemsbank'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
							<p>MCQs Itembanks</p>
						</a>
					</li>
					<li id="itemsbankcrq" class="nav-item"> <a href="<?= base_url('admin/itemsbank/itembank_crqs'); ?>" class="nav-link"> <i class="nav-icon fa fa-circle-o"></i>
							<p>CRQs Itembanks</p>
						</a>
					</li>
					<li id="headers" class="nav-item"> <a href="<?= base_url('admin/headers'); ?>" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
							<p> Final Headers </p>
						</a>
					</li>
				</ul>
			</li>
		<?php endif;  ?>
		<!----------------------Psychomatrician------------------------------>
		<?php if ($this->session->userdata('role_id') == 5): ?>
			<span style="font-size:20px; color:#CCC">2nd Phase/Circle</span>
			<li class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-bank"></i>
					<p> Items <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview">
					<li id="rev_psy_pitems" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_psy_pitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Pending</p>
						</a> </li>
					<li id="rev_psy_aitems" class="nav-item"> <a href="<?php echo base_url('admin/items/rev_psy_aitems'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Reviewed/Accepted</p>
						</a> </li>
				</ul>
			</li>
		<?php endif;  ?>
		<?php if ($this->session->userdata('role_id') == 5): ?>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link"> <i class="nav-icon fa fa-object-group"></i>
					<p> Items Group <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview">
					<li id="rev_psy_pitemsgroup" class="nav-item">
						<a href="<?php echo base_url('admin/Itemsgroup/rev_psy_pitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Pending</p>
						</a>
					</li>
					<li id="rev_psy_aitemsgroup" class="nav-item">
						<a href="<?php echo base_url('admin/Itemsgroup/rev_psy_aitemsgroup'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Reviewed/Accepted</p>
						</a>
					</li>
				</ul>
			</li>
		<?php endif;  ?>
		<?php if ($this->session->userdata('role_id') == 5): ?>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link"> <i class="nav-icon fa fa-paragraph"></i>
					<p> Items Paragraphs <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview">
					<li id="rev_psy_pitemspara" class="nav-item">
						<a href="<?php echo base_url('admin/Itemspara/rev_psy_pitemspara'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Pending</p>
						</a>
					</li>
					<li id="rev_psy_aitemspara" class="nav-item">
						<a href="<?php echo base_url('admin/Itemspara/rev_psy_aitemspara'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Reviewed/Accepted</p>
						</a>
					</li>
				</ul>
			</li>
		<?php endif; ?>
		<!--------------------------------------------------------------------->
		<?php if (in_array('role_users', $this->session->userdata('role_permissions'))): ?>
			<li id="location" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-map-marker"></i>
					<p> Location Management <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview" style="margin-left:10px">
					<li id="district" class="nav-item"> <a href="<?php echo base_url('admin/district'); ?>" class="nav-link"> <i class="nav-icon fa fa-map-marker"></i>
							<p>District</p>
						</a> </li>
					<li id="tehsil" class="nav-item"> <a href="<?php echo base_url('admin/tehsil'); ?>" class="nav-link"> <i class="nav-icon fa fa-map-marker"></i>
							<p>Tehsils</p>
						</a> </li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if ($this->session->userdata('role_id') == 11 || $this->session->userdata('role_id') == 12 || $this->session->userdata('role_id') == 14) { ?>
			<li id="reportsall" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-map-marker"></i>
					<p> Reports / Search <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview" style="margin-left:10px">
					<li id="rep_item_writer_profile" class="nav-item"> <a href="<?php echo base_url('admin/itemwriter/rep_item_writer_profile'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Item Writers Profiles</p>
						</a> </li>
					<li id="rep_item_reviewer_profile" class="nav-item"> <a href="<?php echo base_url('admin/reports/rep_item_reviewer_profile'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Item Reviewer Profiles</p>
						</a> </li>
					<li id="rep_iw_ir_advance_summary" class="nav-item"> <a href="<?php echo base_url('admin/reports/rep_iw_ir_advance_summary'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>IW/IR Advance Summary</p>
						</a> </li>
					<?php if ($this->session->userdata('role_id') == 1) { ?>
						<li id="itemsstats_iwwise_admin" class="nav-item"> <a href="<?php echo base_url('admin/dashboard/itemsstats_iwwise_admin'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
								<p>Items Submission Details ItemWriter Wise</p>
							</a> </li>
					<?php } ?>
				</ul>
			</li>
		<?php } ?>
		<?php /*if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8  || $this->session->userdata('role_id') == 9) { ?>
			<li id="schoolmanagement" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-map-marker"></i>
					<p> School Management <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview" style="margin-left:10px">
					<li id="schoollist" class="nav-item"> <a href="<?php echo base_url('admin/school'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Schools List</p>
						</a> </li>
					<?php if ($this->session->userdata('role_id') != 9): ?>
               <li id="schoollistadd" class="nav-item"> <a href="<?php echo base_url('admin/school/add'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Add New School</p>
						</a> </li>
					<?php endif; ?>
					<li id="schools_report" class="nav-item"> <a href="<?php echo base_url('admin/school/schools_report'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Schools Report </p>
						</a> </li>
				</ul>
			</li>
		<?php }*/ ?>

		<?php /*if ($this->session->userdata('role_id') == 1) { ?>
			<li id="" class="nav-item">
				<a href="<?php echo base_url('admin/datafile/create_data_file'); ?>" class="nav-link">
					<i class="fa fa-circle-o nav-icon"></i>
					<p>Create Data Files</p>
				</a>
			</li>
		<?php }*/ ?>

		<?php /*if (in_array('role_backup', $this->session->userdata('role_permissions'))): ?>
			<li id="backups" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-life-ring"></i>
					<p> Backup & Export <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview">
					<li id="export" class="nav-item"> <a href="<?= base_url('admin/export'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
							<p>Database Backup</p>
						</a> </li>
				</ul>
			</li>
		<?php endif;*/ ?>
		<?php if ($this->session->userdata('role_id') == 12 || $this->session->userdata('role_id') == 11): ?>
			<li id="downloads" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-download"></i>
					<p> Downloads <i class="right fa fa-angle-left"></i> </p>
				</a>
				<ul class="nav nav-treeview" style="margin-left:10px">
					<li id="flimsydownload" class="nav-item">
						<a href="<?php echo base_url('admin/downloads'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p style="font-size: 13px;">Flimsy Download PDF/Word</p>
						</a>
					</li>

					<li id="rep_cstrands" class="nav-item">
						<a href="<?php echo base_url('admin/reports/rep_cstrands'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p>SLOs/SubCS Wise Summary </p>
						</a>
					</li>
					<li id="rep_cognitive_level_sumry" class="nav-item">
						<a href="<?php echo base_url('admin/reports/rep_cognitive_level_sumry'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p>Summary Cognitive Level</p>
						</a>
					</li>
					<li id="rep_item_sumry" class="nav-item">
						<a href="<?php echo base_url('admin/reports/rep_item_sumry'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p>Overall Items Summary</p>
						</a>
					</li>
					<li id="rep_item_review_summary" class="nav-item">
						<a href="<?php echo base_url('admin/reports/rep_item_review_summary'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p>Item Review Summary</p>
						</a>
					</li>
					<li id="missing_items" class="nav-item">
						<a href="<?php echo base_url('admin/reports/missing_items'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p>Missing Item Summary</p>
						</a>
					</li>
					<li id="items_by_itemwriters" class="nav-item">
						<a href="<?php echo base_url('admin/reports/items_by_itemwriters'); ?>" class="nav-link">
							<i class="fa fa-circle-o nav-icon"></i>
							<p>Item Writers Wise Items</p>
						</a>
					</li>
				</ul>
			</li>
		<?php endif; ?>
		<?php /*if ($this->session->userdata('role_id') == 1){ ?>
			<li id="general_settings" class="nav-item"> <a href="<?= base_url('admin/general_settings'); ?>" class="nav-link"> <i class="nav-icon fa fa-cogs"></i>
					<p> General Settings </p>
				</a> </li>
		<?php }*/ ?>

		<li id="logout" class="nav-item"> <a href="<?= base_url('admin/auth/logout') ?>" class="nav-link"> <i class="nav-icon fa fa-user"></i>
				<p> Logout </p>
			</a> </li>
		</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
<script>
	<?php /*?>
	$parentli = false;
if($this->uri->segment(3) != ''){
	$cur_tab = $this->uri->segment(3);  
	$parentli = true;
}else{
	$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
}
	<?php */

	//echo '(1)='.$this->uri->segment(1).',(2)='.$this->uri->segment(2).',(3)='.$this->uri->segment(3);

	?>

	$("#<?= $cur_tab ?>").addClass('menu-open');
	$("#<?= $cur_tab ?> > a").addClass('active');
	<?php
	if ($this->uri->segment(2) == 'media') {
	?> $("#media").addClass('menu-open');
		$("#media > a").addClass('active');
		<?php
		if ($this->uri->segment(3) == '') {
		?>$("#medialist > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(3) == 'add') {
		?>$("#mediaadd > a").addClass('active');
	<?php
		}
	}

	if ($this->uri->segment(2) == 'midterm') {
	?> $("#midterm").addClass('menu-open');
	$("#midterm > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '') {
	?>$("#midterm_23 > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'add') {
	?>$("#midterm_24 > a").addClass('active');
	<?php
		}
	}

	if ($this->uri->segment(2) == 'profile') {
	?> $("#users").addClass('menu-open');
	$("#users > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'profile_edit') {
	?>$("#myprofileedit > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'profile_view') {
	?>$("#myprofileview > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'change_pwd') {
	?>$("#mypasswordchange > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'users') {
	?> $("#users").addClass('menu-open');
	$("#users > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '') {
	?>$("#userslist > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'add') {
	?>$("#mediaadd > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'itemwriters') {
	?> $("#users").addClass('menu-open');
	$("#users > a").addClass('active');
	<?php

	?>$("#itemwriters > a").addClass('active');
	<?php

	}
	if ($this->uri->segment(2) == 'certificate') {
	?> $("#users").addClass('menu-open');
		$("#users > a").addClass('active');
		<?php

		?>$("#certificate > a").addClass('active');
	<?php

	}
	if ($this->uri->segment(2) == 'workshop') {
	?> $("#users").addClass('menu-open');
		$("#users > a").addClass('active');
		<?php

		?>$("#workshop > a").addClass('active');
	<?php

	}
	if ($this->uri->segment(2) == 'itemreviewers') {
	?> $("#users").addClass('menu-open');
		$("#users > a").addClass('active');
		<?php

		?>$("#itemreviewers > a").addClass('active');
	<?php

	}
	if ($this->uri->segment(2) == 'notification') {
	?> $("#notification").addClass('menu-open');
		$("#notification > a").addClass('active');
		<?php
		if ($this->uri->segment(3) == 'my_messages') {
		?>$("#notificationmy_messages > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(3) == 'message') {
		?>$("#notificationmessage > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(3) == 'my_notifications') {
		?>$("#notificationmy_notifications > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(3) == '') {
		?>$("#notificationindex > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'reports') {
	?> $("#duplication").addClass('menu-open');
	$("#duplication > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'plagiarism_check') {
	?>$("#aplagiarism_check > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'plagiarism_check_items') {
	?>$("#plagiarism_check_items > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'plagiarism_duplicate') {
	?>$("#plagiarism_duplicate > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'grades') {
	?> $("#content").addClass('menu-open');
	$("#content > a").addClass('active');
	$("#grades > a").addClass('active');
	<?php
	}
	if ($this->uri->segment(2) == 'subjects') {
	?> $("#content").addClass('menu-open');
		$("#content > a").addClass('active');
		$("#subjects > a").addClass('active');
	<?php
	}
	if ($this->uri->segment(2) == 'contentstand') {
	?> $("#content").addClass('menu-open');
		$("#content > a").addClass('active');
		$("#contentstand > a").addClass('active');
	<?php
	}
	if ($this->uri->segment(2) == 'subcontentstand') {
	?> $("#content").addClass('menu-open');
		$("#content > a").addClass('active');
		$("#subcontentstand > a").addClass('active');
	<?php
	}
	if ($this->uri->segment(2) == 'slos') {
	?> $("#content").addClass('menu-open');
		$("#content > a").addClass('active');
		$("#slos > a").addClass('active');
	<?php
	}
	if ($this->uri->segment(2) == 'imports' && $this->uri->segment(3) == '') {
	?> $("#content").addClass('menu-open');
		$("#content > a").addClass('active');
		$("#importsslos > a").addClass('active');
	<?php
	}

	if (($this->uri->segment(2) == 'pilotheaders' || $this->uri->segment(2) == 'pilot_items' || $this->uri->segment(2) == 'pilot_itemsgroup' || $this->uri->segment(2) == 'pilot_itemspara' || $this->uri->segment(2) == 'paperview') && ($this->uri->segment(3) != 'sync_mcq_p1' && $this->uri->segment(3) != 'sync_para' && $this->uri->segment(3) != 'sync_group')) {
	?> $("#pilotbucket").addClass('menu-open');
		$("#pilotbucket > a").addClass('active');
		<?php
		if ($this->uri->segment(2) == 'pilotheaders') {
		?>$("#pilotheaders > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(2) == 'pilot_items' && $this->uri->segment(3) == 'mcq_p1') {
		?>$("#pilot_itemsmcq_p1 > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(2) == 'pilot_items' && $this->uri->segment(3) == 'erq_p1') {
		?>$("#pilot_itemserq_p1 > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(2) == 'pilot_itemsgroup' && $this->uri->segment(3) == 'group_p1') {
		?>$("#group_p1 > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(2) == 'pilot_itemspara' && $this->uri->segment(3) == 'para_p1') {
		?>$("#para_p1 > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(2) == 'paperview') {
		?>$("#paperview > a").addClass('active');
	<?php
		}
	}

	if ($this->uri->segment(2) == 'pilotpaper') {
	?> $("#pilotpaper").addClass('menu-open');
	$("#pilotpaper > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '') {
	?>$("#pilot1index > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'index2') {
	?>$("#pilot2index > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'imports' && $this->uri->segment(3) == 'pilot_meta_import') {
	?> $("#pilotpaper").addClass('menu-open');
	$("#pilotpaper > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'pilot_meta_import') {
	?>$("#pilot_meta_import > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'imports' && $this->uri->segment(3) == 'pilot_crq_meta_import') {
	?> $("#pilotpaper").addClass('menu-open');
	$("#pilotpaper > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'pilot_crq_meta_import') {
	?>$("#pilot_crq_meta_import > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'imports' && $this->uri->segment(3) == 'generatepilotpaper') {
	?> $("#pilotpaper").addClass('menu-open');
	$("#pilotpaper > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'generatepilotpaper') {
	?>$("#generatepilotpaper > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'imports' && $this->uri->segment(3) == 'pilot_import_marks') {
	?> $("#pilotpaper").addClass('menu-open');
	$("#pilotpaper > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'pilot_import_marks') {
	?>$("#pilot_import_marks > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'imports' && $this->uri->segment(3) == 'pilot_result_summary') {
	?> $("#pilotpaper").addClass('menu-open');
	$("#pilotpaper > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'pilot_result_summary') {
	?>$("#pilot_result_summary > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'imports' && $this->uri->segment(3) == 'pilot_crq_result_summary') {
	?> $("#pilotpaper").addClass('menu-open');
	$("#pilotpaper > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'pilot_result_summary') {
	?>$("#pilot_crq_result_summary > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'district') {
	?> $("#location").addClass('menu-open');
	$("#location > a").addClass('active');
	<?php

	?>$("#district > a").addClass('active');
	<?php

	}
	if ($this->uri->segment(2) == 'tehsil') {
	?> $("#location").addClass('menu-open');
		$("#location > a").addClass('active');
		<?php

		?>$("#tehsil > a").addClass('active');
	<?php

	}
	if ($this->uri->segment(2) == 'reports' && ($this->uri->segment(3) == 'reports_comments' || $this->uri->segment(3) == 'search_reports_comments')) {
	?> $("#specialreport").addClass('menu-open');
		$("#specialreport > a").addClass('active');
		<?php
		if ($this->uri->segment(3) == 'reports_comments' || $this->uri->segment(3) == 'search_reports_comments') {
		?>$("#reports_comments > a").addClass('active');
	<?php
		}
	} //admin_ceo_search

	if ($this->uri->segment(2) == 'reports' && ($this->uri->segment(3) == 'reports_admin' || $this->uri->segment(3) == 'admin_ceo_search')) {
	?> $("#specialreport").addClass('menu-open');
	$("#specialreport > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'reports_admin' || $this->uri->segment(3) == 'admin_ceo_search') {
	?>$("#reports_admin > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'itemwriter' && $this->uri->segment(3) == 'rep_item_writer_profile') {
	?> $("#reportsall").addClass('menu-open');
	$("#reportsall > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rep_item_writer_profile') {
	?>$("#rep_item_writer_profile > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'rep_item_reviewer_profile') {
	?> $("#reportsall").addClass('menu-open');
	$("#reportsall > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rep_item_reviewer_profile') {
	?>$("#rep_item_reviewer_profile > a").addClass('active');
	<?php
		}
	}

	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'rep_iw_ir_advance_summary') {
	?> $("#reportsall").addClass('menu-open');
	$("#reportsall > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rep_iw_ir_advance_summary') {
	?>$("#rep_iw_ir_advance_summary > a").addClass('active');
	<?php
		}
	}

	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'rep_advance_search') {
	?> $("#rep_advance_search").addClass('menu-open');
	$("#rep_advance_search > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '') {
	?>$("#rep_advance_search > a").addClass('active');
	<?php
		}
	}

	if ($this->uri->segment(2) == 'school') {
	?> $("#schoolmanagement").addClass('menu-open');
	$("#schoolmanagement > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '' || $this->uri->segment(3) == 'school_view' || $this->uri->segment(3) == 'edit') {
	?>$("#schoollist > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'add') {
	?>$("#schoollistadd > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'papers') {
	?>$("#schoolpapers > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'stats') {
	?>$("#schoolstats > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'schools_report') {
	?>$("#schools_report > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'export' && $this->uri->segment(3) == '') {
	?> $("#backups").addClass('menu-open');
	$("#backups > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '') {
	?>$("#export > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'downloads' && $this->uri->segment(3) == '') {
	?> $("#downloads").addClass('menu-open');
	$("#downloads > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '') {
	?>$("#flimsydownload > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'rep_cstrands') {
	?> $("#downloads").addClass('menu-open');
	$("#downloads > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rep_cstrands') {
	?>$("#rep_cstrands > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'rep_cognitive_level_sumry') {
	?> $("#downloads").addClass('menu-open');
	$("#downloads > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rep_cognitive_level_sumry') {
	?>$("#rep_cognitive_level_sumry > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'rep_item_sumry') {
	?> $("#downloads").addClass('menu-open');
	$("#downloads > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rep_item_sumry') {
	?>$("#rep_item_sumry > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'rep_item_review_summary') {
	?> $("#downloads").addClass('menu-open');
	$("#downloads > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rep_item_review_summary') {
	?>$("#rep_item_review_summary > a").addClass('active');
	<?php
		}
	}

	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'missing_items') {
	?> $("#downloads").addClass('menu-open');
	$("#downloads > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'missing_items') {
	?>$("#missing_items > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'itemsbank') {
	?> $("#itemsbank").addClass('menu-open');
	$("#itemsbank > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == '' || $this->uri->segment(3) == 'add') {
	?>$("#itemsbankmcq > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'itembank_crqs') {
	?>$("#itemsbankcrq > a").addClass('active');
	<?php
		}
	}
	if (($this->uri->segment(2) == 'items' || $this->uri->segment(2) == 'Items') && ($this->uri->segment(3) == 'ss_pitems' || $this->uri->segment(3) == 'ss_pitems_search' ||  $this->uri->segment(3) == 'edit_erq_crq' || $this->uri->segment(3) == 'ss_accepted_items' || $this->uri->segment(3) == 'ss_view' || $this->uri->segment(3) == 'ss_aitems_search' || $this->uri->segment(3) == 'ss_rejected_items' || $this->uri->segment(3) == 'ss_ritems_search' || $this->uri->segment(3) == 'ss_discarded_items' || $this->uri->segment(3) == 'ss_view_erq_crq')) {
	?> $("#itemwritecycle1").addClass('menu-open');
	$("#itemwritecycle1 > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'ss_pitems' || $this->uri->segment(3) == 'ss_pitems_search' ||  $this->uri->segment(3) == 'edit_erq_crq') {
	?>$("#ss_pitems > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'ss_accepted_items' || $this->uri->segment(3) == 'ss_view' || $this->uri->segment(3) == 'ss_aitems_search') {
	?>$("#ss_accepted_items > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'ss_rejected_items' || $this->uri->segment(3) == 'ss_ritems_search') {
	?>$("#ss_rejected_items > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'ss_discarded_items') {
	?>$("#ss_discarded_items > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'ss_view_erq_crq') {
	?>$("#ss_pitems > a").addClass('active');
	<?php
		}

		//ss_view_erq_crq
	}
	if ($this->uri->segment(2) == 'Itemsgroup' && $this->uri->segment(3) == 'ssindex') {
	?> $("#itemwritecycle1").addClass('menu-open');
	$("#itemwritecycle1 > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'ssindex') {
	?>$("#ssindex > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'itemspara' && $this->uri->segment(3) == 'ss_pindex') {
	?> $("#itemwritecycle1").addClass('menu-open');
	$("#itemwritecycle1 > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'ss_pindex') {
	?>$("#ss_pindex > a").addClass('active');
	<?php
		}
	}

	if (($this->uri->segment(2) == 'items' || $this->uri->segment(2) == 'Items') && ($this->uri->segment(3) == 'rev_ss_pitems' || $this->uri->segment(3) == 'rev_ss_aitems' ||  $this->uri->segment(3) == 'rev_ss_revised_items' || $this->uri->segment(3) == 'rev_ss_resubmitted_items' || $this->uri->segment(3) == 'rev_ss_ungroup_items' || $this->uri->segment(3) == 'rev_ss_pitems_search' || $this->uri->segment(3) == 'rev_ss_view' || $this->uri->segment(3) == 'rev_ss_edit' || $this->uri->segment(3) == 'rev_ss_aview' || $this->uri->segment(3) == 'rev_ss_view_resubmitted' || $this->uri->segment(3) == 'rev_ss_view_erq_crq')) {
	?> $("#itemreviewcycle2").addClass('menu-open');
	$("#itemreviewcycle2 > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rev_ss_pitems' || $this->uri->segment(3) == 'rev_ss_pitems_search' ||  $this->uri->segment(3) == 'rev_ss_edit') {
	?>$("#rev_ss_pitems > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'rev_ss_aitems' || $this->uri->segment(3) == 'rev_ss_aview' || $this->uri->segment(3) == 'ss_aitems_search') {
	?>$("#rev_ss_aitems > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'rev_ss_revised_items' || $this->uri->segment(3) == 'ss_ritems_search') {
	?>$("#rev_ss_revised_items > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'rev_ss_resubmitted_items' || $this->uri->segment(3) == 'rev_ss_view_resubmitted') //rev_ss_view_resubmitted
		{
	?>$("#rev_ss_resubmitted_items > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'rev_ss_ungroup_items') {
	?>$("#rev_ss_ungroup_items > a").addClass('active');
	<?php
		}

		////rev_ss_pitemsgroup//rev_ss_aitemsgroup//rev_ss_pitemspara//rev_ss_aitemspara
	}
	if (($this->uri->segment(2) == 'Itemsgroup' || $this->uri->segment(2) == 'itemsgroup') && ($this->uri->segment(3) == 'rev_ss_pitemsgroup' || $this->uri->segment(3) == 'rev_ss_aitemsgroup')) {
	?> $("#itemreviewcycle2").addClass('menu-open');
	$("#itemreviewcycle2 > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rev_ss_pitemsgroup' || $this->uri->segment(3) == 'rev_ss_aitemsgroup') {
	?>$("#rev_ss_pitemsgroup > a").addClass('active');
	<?php
		}
	}
	if (($this->uri->segment(2) == 'itemspara' || $this->uri->segment(2) == 'Itemspara') && ($this->uri->segment(3) == 'rev_ss_pitemspara' || $this->uri->segment(3) == 'rev_ss_aitemspara')) {
	?> $("#itemreviewcycle2").addClass('menu-open');
	$("#itemreviewcycle2 > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rev_ss_pitemspara' || $this->uri->segment(3) == 'rev_ss_aitemspara') {
	?>$("#rev_ss_pitemspara > a").addClass('active');
	<?php
		}
	}


	if ($this->uri->segment(2) == 'items' && ($this->uri->segment(3) == 'rev_pitems' || $this->uri->segment(3) == 'rev_eitems' || $this->uri->segment(3) == 'rev_ir_revised_items' || $this->uri->segment(3) == 'rev_view_combine' || $this->uri->segment(3) == 'rev_edit_combine')) {
	?> $("#iritems").addClass('menu-open');
	$("#iritems > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rev_pitems') {
	?>$("#rev_pitems > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'rev_eitems' || $this->uri->segment(3) == 'rev_edit_combine') {
	?>$("#rev_eitems > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'rev_ir_revised_items') {
	?>$("#rev_ir_revised_items > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'items' && ($this->uri->segment(3) == 'add_combine' || $this->uri->segment(3) == 'ditems' || $this->uri->segment(3) == 'sitems' || $this->uri->segment(3) == 'ritems' || $this->uri->segment(3) == 'view_combine')) {
	?> $("#iwitems").addClass('menu-open');
	$("#iwitems > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'add_combine') {
	?>$("#add_combine > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'ditems' || $this->uri->segment(3) == 'view_combine') {
	?>$("#ditems > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'sitems') {
	?>$("#sitems > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'ritems') {
	?>$("#ritems > a").addClass('active');
	<?php
		}
	}
	if (($this->uri->segment(2) == 'Itemsgroup' || $this->uri->segment(2) == 'itemsgroup') && ($this->uri->segment(3) == 'index' || $this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'view' || $this->uri->segment(3) == 'edit')) {
	?> $("#iwitemgroup").addClass('menu-open');
	$("#iwitemgroup > a").addClass('active');
	<?php

	}
	if (($this->uri->segment(2) == 'itemspara' || $this->uri->segment(2) == 'Itemspara') && ($this->uri->segment(3) == '' || $this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'view' || $this->uri->segment(3) == 'edit')) {
	?> $("#iwitemspara").addClass('menu-open');
		$("#iwitemspara > a").addClass('active');
	<?php

	}

	if (($this->uri->segment(2) == 'Itemsgroup' || $this->uri->segment(2) == 'Itemsgroup') && ($this->uri->segment(3) == 'rev_pitemsgroup' || $this->uri->segment(3) == 'rev_eitemsgroup')) {
	?> $("#iritemgroups").addClass('menu-open');
		$("#iritemgroups > a").addClass('active');
		<?php
		if ($this->uri->segment(3) == 'rev_pitemsgroup') {
		?>$("#rev_pitemsgroup > a").addClass('active');
		<?php
		}
		if ($this->uri->segment(3) == 'rev_eitemsgroup') {
		?>$("#rev_eitemsgroup > a").addClass('active');
	<?php
		}
	}
	if (($this->uri->segment(2) == 'itemspara' || $this->uri->segment(2) == 'itemspara') && ($this->uri->segment(3) == 'rev_pindex' || $this->uri->segment(3) == 'rev_eitemspara')) {
	?> $("#iritemparas").addClass('menu-open');
	$("#iritemparas > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'rev_pindex') {
	?>$("#rev_pindex > a").addClass('active');
	<?php
		}
		if ($this->uri->segment(3) == 'rev_eitemspara') {
	?>$("#rev_eitemspara > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'reports' && $this->uri->segment(3) == 'items_by_itemwriters') {
	?> $("#downloads").addClass('menu-open');
	$("#downloads > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'items_by_itemwriters') {
	?>$("#items_by_itemwriters > a").addClass('active');
	<?php
		}
	}
	/*if($this->uri->segment(2)=='pilot_items' || ($this->uri->segment(3)=='sync_mcq_p1'||$this->uri->segment(3)=='sync_erq_p1'||$this->uri->segment(3)=='sync_group_p1'||$this->uri->segment(3)=='sync_para_p1'))
	{
		?> $("#sync_pilotbucket").addClass('menu-open');$("#sync_pilotbucket > a").addClass('active'); <?php	
		if($this->uri->segment(3)=='sync_mcq_p1')
		{
			?>$("#pilot_sync_mcq_p1 > a").addClass('active');<?php
		}
		if($this->uri->segment(3)=='sync_erq_p1')
		{
			?>$("#pilot_sync_erq_p1 > a").addClass('active');<?php
		}
		if($this->uri->segment(3)=='sync_group_p1')
		{
			?>$("#pilot_sync_group_p1 > a").addClass('active');<?php
		}
		if($this->uri->segment(3)=='sync_para_p1')
		{
			?>$("#pilot_sync_para_p1 > a").addClass('active');<?php
		}		
	}*/
	if ($this->uri->segment(2) == 'pilot_items' && $this->uri->segment(3) == 'sync_mcq_p1') {
	?> $("#pilot_sync").addClass('menu-open');
	$("#pilot_sync > a").addClass('active');
	<?php
		if ($this->uri->segment(3) == 'sync_mcq_p1') {
	?>$("#pilot_sync > a").addClass('active');
	<?php
		}
	}
	if ($this->uri->segment(2) == 'testpaper') {
	?>$("#mod_paper > a").addClass('active');
	<?php
		}
	/*<li id="schoolmanagement" class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-map-marker"></i>
			  <p> School Management <i class="right fa fa-angle-left"></i> </p>
			  </a>
			  <ul class="nav nav-treeview" style="margin-left:10px">				  
				 <?php  if($this->session->userdata('role_id')==1) { ?>
				<li id="schoollist" class="nav-item"> <a href="<?php echo base_url('admin/school'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
				  <p>Schools List</p>
				  </a> </li>	
				  <?php } ?>
				  <li id="schoolpapers" class="nav-item"> <a href="<?php echo base_url('admin/school/schools_report'); ?>" class="nav-link"> <i class="fa fa-circle-o nav-icon"></i>
				  <p>Schools Report </p>
				  </a> </li>	*/
	?>
	$(document).ready(function() {
		<?php if ($parentli) { ?> //alert('< ?php print $cur_tab; ?>');
			//$("#< ?= $cur_tab ?> li ul").parent().addClass('menu-open'); 
			//$("li#< ?= $cur_tab ?>").parent('li').addClass('menu-open');
			//$('.nav-sidebar li a.active').closest('li').addClass('parent');
		<?php
		}
		?>
	});
</script>