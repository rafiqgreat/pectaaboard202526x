<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model{
	public function login($data){
		$this->db->select('*')
		->from('ci_admin')
		->join('ci_admin_roles', 'role_id = admin_role_id');
		$this->db->where('username', $data['username']);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			return false;
		}
		else{
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
		    $validPassword = password_verify($data['password'], $result['password']);
		    if($validPassword){
		        return $result = $query->row_array();
		    }
		}
	}
	//--------------------------------------------------------------------
	public function register($data){
		$this->db->insert('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function email_verification($code){
		$this->db->select('email, token, is_active');
		$this->db->from('ci_admin');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update('ci_admin', array('is_verify' => 1, 'token'=> ''));
			return true;
		}
		else{
			return false;
			}
	}
	//============ Check User Email ============
    function check_user_mail($username, $email)
    {
    	$result = $this->db->get_where('ci_admin', array('username'=>$username, 'email' => $email));
    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	}
    	else {
    		return false;
    	}
    }
    //============ Update Reset Code Function ===================
    public function update_reset_code($reset_code, $user_id){
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('admin_id', $user_id);
    	$this->db->update('ci_admin', $data);
    }
    //============ Activation code for Password Reset Function ===================
    public function check_password_reset_code($code){
    	$result = $this->db->get_where('ci_admin',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    //============ Reset Password ===================
    public function reset_password($id, $new_password){
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('password_reset_code', $id);
		$this->db->update('ci_admin', $data);
		return true;
    }
    //--------------------------------------------------------------------
	public function get_admin_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}
	
    //--------------------------------------------------------------------
	public function get_prent_subjects($admin_id){		
		$query = $this->db->get_where('ci_admin', array('admin_id' => $admin_id));
		return $result = $query->row_array();
	}
	//--------------------------------------------------------------------
	public function update_admin($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}
	public function func_updated_password_at( $id ) {
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', array('updated_password_at'=> date('Y-m-d H:i:s')));
		return true;
	}
	public function email_exist( $email )
	{
		$this->db->select( 'admin_id','email' );
		$this->db->from( 'ci_admin' );
		$this->db->where( 'email', $email );
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function update_forget_password($username, $email, $newpassword){
		$password = password_hash( $newpassword, PASSWORD_BCRYPT );
    	$data = array('password' => $password);
    	$this->db->where('username', $username);
		$this->db->where('email', $email);
    	$this->db->update('ci_admin', $data);
    }
	public function user_email_verification($user_id,$verification_code){
		$this->db->select('*');
		$this->db->from('ci_admin');
		$this->db->where('admin_id', $user_id);
		$this->db->where('email_verify_code', $verification_code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('admin_id', $user_id);
			$this->db->where('email_verify_code', $verification_code);
			$this->db->update('ci_admin', array('email_is_verify' => 1, 'email_verify_code'=> ''));
			return true;
		}
		else{
			return false;
		}
	}
}
?>