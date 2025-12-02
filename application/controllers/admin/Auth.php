<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('mailer');
		$this->load->model('admin/auth_model', 'auth_model');
	}
	//--------------------------------------------------------------
	public function index(){
		if($this->session->has_userdata('is_login')){
			redirect('admin/dashboard');
		}
		else{
			redirect('admin/auth/login');
		}
	}
	//--------------------------------------------------------------
	public function login(){
		if($this->input->post('submit')){

			// for google recaptcha
			// if ($this->recaptcha_status == true) {
	        //     if (!$this->recaptcha_verify_request()) {
	        //         $this->session->set_flashdata('form_data', $this->input->post());
	        //         $this->session->set_flashdata('error', 'reCaptcha Error');
	        //         redirect(base_url('admin/auth/login'));
	        //         exit();
	        //     }
	        // }

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('error', $data['errors']);
				redirect(base_url('admin/auth/login'),'refresh');
			}
			else {
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$result = $this->auth_model->login($data);				
				if($result){				
					
					if($result['is_verify'] == 0){
						$this->session->set_flashdata('error', 'Please verify your email address!');
						redirect(base_url('admin/auth/login'));
						exit();
					}
					if($result['is_active'] == 0){
						$this->session->set_flashdata('error', 'Account is disabled by Admin!');
						redirect(base_url('admin/auth/login'));
						exit();
					}
					if($result['is_login'] == 1){
						
						$userRights = [];
						if(isset($result['role_users'])&&$result['role_users']==1)
						{
							$userRights[] = 'role_users';
						}
						if(isset($result['role_backup'])&&$result['role_backup']==1)
						{
							$userRights[] = 'role_backup';
						}
						if(isset($result['role_settings'])&&$result['role_settings']==1)
						{
							$userRights[] = 'role_settings';
						}
						if(isset($result['role_grades'])&&$result['role_grades']==1)
						{
							$userRights[] = 'role_grades';
						}
						if(isset($result['role_subjects'])&&$result['role_subjects']==1)
						{
							$userRights[] = 'role_subjects';
						}
						if(isset($result['role_cstands'])&&$result['role_cstands']==1)
						{
							$userRights[] = 'role_cstands';
						}
						if(isset($result['role_subcstands'])&&$result['role_subcstands']==1)
						{
							$userRights[] = 'role_subcstands';
						}						
						if(isset($result['role_slos'])&&$result['role_slos']==1)
						{
							$userRights[] = 'role_slos';
						}
						if(isset($result['role_iblocks'])&&$result['role_iblocks']==1)
						{
							$userRights[] = 'role_iblocks';
						}
						if(isset($result['role_items'])&&$result['role_items']==1)
						{
							$userRights[] = 'role_items';
						}
						if(isset($result['role_itemsbank'])&&$result['role_itemsbank']==1)
						{
							$userRights[] = 'role_itemsbank';
						}
						if(isset($result['role_papers'])&&$result['role_papers']==1)
						{
							$userRights[] = 'role_papers';
						}
						if(isset($result['role_finalpapers'])&&$result['role_finalpapers']==1)
						{
							$userRights[] = 'role_finalpapers';
						}
						if(isset($result['role_schools'])&&$result['role_schools']==1)
						{
							$userRights[] = 'role_schools';
						}
						if(isset($result['role_approve'])&&$result['role_approve']==1)
						{
							$userRights[] = 'role_approve';
						}
						if(isset($result['role_private_school'])&&$result['role_private_school']==1)
						{
							$userRights[] = 'role_private_school';
						}
						
						$subjects_ids = $result['subjects_ids'];
						
						if($result['admin_role_id'] == 3 && $result['parent_admin_id']!=0)
						{
							// get subject of parent
							//$parent = $this->auth_model->get_prent_subjects($result['parent_admin_id']);							
							//$subjects_ids = $parent['subjects_ids'];
							$subjects_ids = $result['subjects_ids'];
							
						}						
						
						$admin_data = array(
							'admin_id' => $result['admin_id'],
							'username' => $result['username'],
							'role_short' => $result['role_short'],
							'role_id' => $result['admin_role_id'],
							'parent_id' => $result['parent_admin_id'],
							'image' => $result['image'],
							'u_district_id' => $result['u_district_id'],
							'u_tehsil_id' => $result['u_tehsil_id'],
							'admin_department' => $result['admin_department'],
							'subjects_ids' => $subjects_ids,
							'is_login' => TRUE,							
							'role_permissions' => $userRights
						);		
						$this->session->set_userdata($admin_data);
						redirect(base_url('admin/dashboard'));
						}
					}
					else{
						$this->session->set_flashdata('errors', 'Invalid Username or Password!');
						redirect(base_url('admin/auth/login'));
					}
				}
			}
			else{
				$data['title'] = 'Login';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/login');
				$this->load->view('admin/includes/_footer', $data);
			}
		}	
		//-------------------------------------------------------------------------
		public function register(){
			if($this->input->post('submit')){
				// for google recaptcha
				if ($this->recaptcha_status == true) {
		            if (!$this->recaptcha_verify_request()) {
		                $this->session->set_flashdata('form_data', $this->input->post());
		                $this->session->set_flashdata('error', 'reCaptcha Error');
		                redirect(base_url('admin/auth/register'));
		                exit();
		            }
		        }
	        
				$this->form_validation->set_rules('username', 'Username', 'trim|is_unique[ci_admin.username]|required');
				$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_admin.email]|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/auth/register'),'refresh');
				}
				else{
					$data = array(
						'username' => $this->input->post('username'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_active' => 1,
						'is_admin' => 1,
						'is_verify' => 0,
						'token' => md5(rand(0,1000)),    
						'last_ip' => '',
						'created_at' => date('Y-m-d h:i:s'),
						'updated_at' => date('Y-m-d h:i:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->auth_model->register($data);
					if($result){
						//sending welcome email to user
						$this->load->helper('email_helper');
						$name = $data['firstname'].' '.$data['lastname'];
						$email_verification_link = base_url('admin/auth/verify/').'/'.$data['token'];
						$body = $this->mailer->registration_email($name, $email_verification_link);
						$to = $data['email'];
						$subject = 'Activate your account';
						$message =  $body ;
						$email = send_email($to, $subject, $message, $file = '' , $cc = '');
						if($email){
							$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
							redirect(base_url('admin/auth/login'));
						}	
						else{
							echo 'Email Error';
						}
					}
				}
			}
			else{
				$data['title'] = 'Create an Account';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/register');
				$this->load->view('admin/includes/_footer', $data);
			}
		}
		//----------------------------------------------------------	
		public function verify(){
			$verification_id = $this->uri->segment(4);
			$result = $this->auth_model->email_verification($verification_id);
			if($result){
				$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');
				redirect(base_url('admin/auth/login'));
			}
			else{
				$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
				redirect(base_url('admin/auth/login'));
			}	
		}
		//--------------------------------------------------		
		public function forgot_password(){
			if($this->input->post('submit')){
				//checking server side validation
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('admin/auth/forgot_password'),'refresh');
				}

				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$response = $this->auth_model->check_user_mail($username, $email);
				
				if($response){

					$newpassword = rand(0,9999);

					if($email != ''){
						$config = array(
							'protocol' => 'mail',
							'smtp_host' => $this->general_settings['smtp_host'],
							'smtp_port' => $this->general_settings['smtp_port'],
							'smtp_user' => $this->general_settings['smtp_user'],
							'smtp_pass' => $this->general_settings['smtp_pass'],
							'mailtype' => 'html',
							'wordwrap' => TRUE
						);

						$login_link = base_url()."admin/auth/login";
						$message = 	"
									<html>
									<head>
										<title>Forgot password - PEC Papers System'</title>
									</head>
									<body>
										<p>Your new password: ".$newpassword."</p>
										<p>Please click the link below to login.</p>
										<h4><a href='".$login_link."'>Login Link</a></h4>
										<p>Regards,<br />
										PEC IT Team,<br />
										Punjab Examination Commission,<br />
										Wahdat Road, Lahore<br />
										Pakistan</p>
									</body>
									</html>
									";

						$this->load->library('email');
						$this->email->initialize($config);
						$this->email->set_newline("\r\n");
						$this->email->from($this->general_settings['email_from']);
						$this->email->to($email);
						$this->email->subject('New Password - PEC Papers System');
						$this->email->message($message);

						//sending email
						if($this->email->send()){
							$this->auth_model->update_forget_password($username, $email, $newpassword);
							$this->session->set_flashdata('success', 'New password send to your email. Please check your inbox to get new password!');
							redirect(base_url('admin/auth/login'));
						}
						else{
							//$this->session->set_flashdata('error', $this->email->print_debugger());
							$this->session->set_flashdata('error', 'Sending email failed. Please try again!');
							redirect(base_url('admin/auth/forgot_password'));
						}
					}
				}
				else{
					$this->session->set_flashdata('error', 'Username or Email does not exist!');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
			else{
				$data['title'] = 'Forgot Password';
				$data['navbar'] = false;
				$data['sidebar'] = false;
				$data['footer'] = false;
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('admin/auth/forget_password');
				$this->load->view('admin/includes/_footer', $data);
			}
		}
		//----------------------------------------------------------------		
		public function reset_password($id=0){
			// check the activation code in database
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'errors' => validation_errors()
					);
					$this->session->set_flashdata('reset_code', $id);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
  
				else{
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password($id, $new_password);
					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
					redirect(base_url('admin/auth/login'));
				}
			}
			else{
				$result = $this->auth_model->check_password_reset_code($id);
				if($result){
					$data['title'] = 'Reseat Password';
					$data['reset_code'] = $id;
					$data['navbar'] = false;
					$data['sidebar'] = false;
					$data['footer'] = false;
					$this->load->view('admin/includes/_header', $data);
					$this->load->view('admin/auth/reset_password');
					$this->load->view('admin/includes/_footer', $data);
				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('admin/auth/forgot_password'));
				}
			}
		}
		//-----------------------------------------------------------------------
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('admin/auth/login'), 'refresh');
		}
		
		public function forgot_password_reset(){
			$data =[];
			if($this->input->post('submit')){
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('error', 'Please enter a valid email!');
					$this->load->view('admin/includes/_header', $data);
					$this->load->view('admin/auth/forgot_password_view');
					$this->load->view('admin/includes/_footer');
				}
				else
				{
					$email = $this->input->post('email');
					$exists = $this->auth_model->email_exist( $email );
					if(!empty($exists))
					{
						$update =$this->auth_model->func_updated_password_at( $exists[0]['admin_id'] );
						if($update>0)
						{
							$this->load->library('parser');
							$to = $email;
							echo $to.'<hr>';
							$subject = "Reset Password Link";
							$token = $exists[0]['admin_id'];
							$message = "HI! Your Password request has been received. Please click the below link to reset your password <a href=".base_url()."/admin/auth/reset_password_view".$token."> Click Here</a>"; 
							
							$this->load->library('email');
							$this->email->from('system.engineer@pec.edu.pk', 'PEC');
							$this->email->to($to);
							$this->email->subject('Reset Paaword');
							$this->email->message($message);
							$return = $this->email->send();
							if($this->email->send())
							{
								$this->session->set_flashdata('Success', 'Reset Password has benn sent. Please verify it within 15 minutes');
								$this->load->view('admin/includes/_header');
								$this->load->view('admin/auth/forgot_password_view',$data);
								$this->load->view('admin/includes/_footer');
							}
							else
							{ 
								die('else');
								/*
								$this->session->set_flashdata('error', 'Sorry! Unable to send link. Try again');
								$this->load->view('admin/includes/_header');
								$this->load->view('admin/auth/forgot_password_view', $data);
								$this->load->view('admin/includes/_footer');*/
							}
						}
						else
						{
							$this->session->set_flashdata('error', 'Sorry! Unable to update try again');
							$this->load->view('admin/includes/_header');
							$this->load->view('admin/auth/forgot_password_view', $data);
							$this->load->view('admin/includes/_footer');
						}
					}
					else
					{
						$this->session->set_flashdata('error', 'Email does not exist!');
						$this->load->view('admin/includes/_header');
						$this->load->view('admin/auth/forgot_password_view', $data);
						$this->load->view('admin/includes/_footer');
					}
				}
			}
			$this->load->view('admin/includes/_header');
			$this->load->view('admin/auth/forgot_password_view', $data);
			$this->load->view('admin/includes/_footer');
		}
		
		public function email_exist() {
			$email = $this->input->post( 'email' );
			$exists = $this->auth_model->email_exist( $email );
			echo count( $exists );
		}
		public function verify_email(){
			$user_id = $this->uri->segment(4);
			$verification_code = $this->uri->segment(5);
			
			$result = $this->auth_model->user_email_verification($user_id,$verification_code);
			if($result){
				$this->session->set_flashdata('success', 'Your email has been verified.');
				redirect(base_url('admin/auth/login'));
			}
			else{
				$this->session->set_flashdata('error', 'The url is either invalid or you already have activated your account.');	
				redirect(base_url('admin/auth/login'));
			}	
		}
	}  // end class
?>