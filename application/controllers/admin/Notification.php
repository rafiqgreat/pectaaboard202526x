<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		auth_check(); // check login auth
        //this model called in autoload file
		$this->load->model('admin/Notification_model', 'Notification_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	
	public function index()
	{
		$data['title'] = 'Notifications';
		$data['roles'] = $this->Notification_model->get_admin_roles();
		//$data['notifications'] = $this->notification_model->get_all_notifications();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/notifications/add_notification');
		$this->load->view('admin/includes/_footer');
	}
	
	public function add_notification()
	{
        if($this->input->post('btnadd'))
		{	
            $this->form_validation->set_rules('role_id', 'Role', 'required');
            $this->form_validation->set_rules('notification_title', 'Title', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('notification_desc', 'Description', 'trim|required|min_length[5]|max_length[1000]');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/notification'),'refresh');
                
			}
            else
            {
                $data['role_id'] = ( $this->input->post('role_id') !='' ? $this->input->post('role_id') : 0);
                $data['notification_title'] =  $this->input->post('notification_title') ;
                $data['notification_desc'] = ( $this->input->post('notification_desc') != '' ? $this->input->post('notification_desc') : '');
                $data['created_at'] =  date( 'Y-m-d h:i:s' );
                $data['created_by'] = $this->session->userdata('admin_id');
                if($this->Notification_model->save_notification($data) == true){
                    $this->session->set_flashdata( 'success', 'Success Notification sent' );
                    redirect(base_url('admin/notification'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata( 'error', 'Issue in inserting data!' );
                    redirect(base_url('admin/notification'),'refresh');
                }
                
            }
            
        }
		
	}
	public function notification_jason()
	{	
        // $temp = explode('_',$id);
		//$grade_id = $temp[0];	
        $records = $this->Notification_model->get_notification_jason($this->session->userdata('admin_id'));
       // echo "<pre>";
        //print_r($records);
       // exit;
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{ 
			$data[]= array(
                        ++$i,
                        $row['notification_title'],
                        $row['created_at'],
                        $row['role_name'],
                        substr($row['notification_desc'],0,100),
                        '<a href ="'.base_url('admin/notification/noification_details/'. $row['notification_id']).'" >View Detail</a>'
                    );
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
    public function my_notifications(){
        $data['title'] = 'My Notifications';
        
		//$data['notifications'] = $this->notification_model->get_all_notifications();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/notifications/my_notification');
		$this->load->view('admin/includes/_footer');
        
    }
    public function my_notification_jason()
	{	
        $records = $this->Notification_model->get_my_note_jason($this->session->userdata('admin_id'));
       // echo "<pre>";
        //print_r($records);
       // exit;
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{ 
			$data[]= array(
                        ++$i,
                        $row['notification_title'],
                        $row['created_at'],
                        $row['role_name'],
                        substr($row['notification_desc'],0,100),
                        '<a href ="'.base_url('admin/notification/noification_details/'. $row['notification_id']).'" >View Detail</a>'
                    );
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
    public function noification_details($notification_id){
        
         $data['notification'] = $this->Notification_model->get_noification_details($notification_id,$this->session->userdata('admin_id'));
        //print_r($data['notification']);
        //echo "hhhere";
        //exit;
         $recipiants_obj = $this->Notification_model->get_notification_recipiants($notification_id);
         $recipiants = '';
         foreach($recipiants_obj as $rec){
             $recipiants .= $rec->admin_name.',';
         }  
        $data['recipiants'] = substr($recipiants,0,-1);
        //print_r($data['notification']);
        $this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/notifications/notification_detail');
		$this->load->view('admin/includes/_footer');
    }
    public function user_by_role(){
        $role_id = $this->input->post('role_id');
        //$district_id = ($this->input->post('district_id') !='' ? $this->input->post('district_id') : 0);
        //$tehsil_id = ( $this->input->post('tehsil_id') != '' ? $this->input->post('tehsil_id') : 0) ;
        echo json_encode($this->Notification_model->get_users_by_role($role_id));
        
    }
    public function tehsils_by_dist(){
        $district_id = $this->input->post('district_id');
        echo json_encode($this->Notification_model->get_tehsils($district_id));
        
    }
    /********************************************************************
    *   Messages functions start here
    ****************************************************************/
    public function message()
	{
       // print_r($this->session->userdata);
		$data['title'] = 'Messages';
		$data['roles'] = $this->Notification_model->get_admin_roles();
		//$data['districts'] = $this->Notification_model->get_districts();
        //print_r($data['districts']);
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/notifications/add_message');
		$this->load->view('admin/includes/_footer');
	}
    public function add_massage()
	{
        //print_r($_REQUEST);
        if($this->input->post('btnadd'))
		{	
            $this->form_validation->set_rules('role_id', 'Role', 'required');
            $this->form_validation->set_rules('msg_subject', 'Subject', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('msg_body', 'Message', 'trim|required|min_length[5]|max_length[2000]');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/notification/message'),'refresh');
                
			}
            else
            {
                $msg_recivers  = ( $this->input->post('msg_recivers') !='' ? $this->input->post('msg_recivers') : array());
                $data['role_id']    =  $this->input->post('role_id') ;
                $data['msg_subject']=  $this->input->post('msg_subject') ;
                $data['msg_body']   =  $this->input->post('msg_body');
                $data['msg_recivers'] = $msg_recivers;
                if(count($msg_recivers)>0){
                    $data['msg_type'] = 0;
                }else{
                     $data['msg_type'] = 1;
                }
                //$data['created_at'] =  date( 'Y-m-d h:i:s' );
                $data['sender_id'] = $this->session->userdata('admin_id');
                if($this->Notification_model->save_message($data) == true){
                    $this->session->set_flashdata( 'success', 'Success Message sent' );
                    redirect(base_url('admin/notification/message'),'refresh');
                }
                else
                {
                    $this->session->set_flashdata( 'error', 'Issue in inserting data!' );
                    redirect(base_url('admin/notification/message'),'refresh');
                }
                
            }
            
        }
		
	}
	public function message_jason()
	{	
        
        $records = $this->Notification_model->get_message_jason($this->session->userdata('admin_id'));
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{ 
			$data[]= array(
                        ++$i,
                       // $row['msg_type'],
                        $row['msg_subject'],
                        date("d/m/Y H:i:s", strtotime($row['created_at'])) ,
                        $row['role_name'],
                        substr($row['msg_body'],0,150),
                        '<a href ="'.base_url('admin/notification/msg_details/'. $row['msg_id']).'" >View Detail</a>'
                    );
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}
    public function msg_details($msg_id){
        
        $data['msg_id'] = $msg_id;
        $data['messages'] = $this->Notification_model->get_msg_details($msg_id);
        $data['threads'] = $this->Notification_model->get_msg_threads($msg_id);
        //echo "<pre>";
       // print_r($data['threads']);
     
        $recipiants_obj = $this->Notification_model->get_msg_recivers($msg_id);
         $recipiants = '';
         foreach($recipiants_obj as $rec){
             $recipiants .= $rec->firstname.' '.$rec->lastname.',';
         }  
        $data['recipiants'] = substr($recipiants,0,-1);
        
        $this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/notifications/message_detail');
		$this->load->view('admin/includes/_footer');
    }
    public function reply_massage(){
        //print_r($_REQUEST);
        if($this->input->post('btnadd'))
		{	
            //$this->form_validation->set_rules('role_id', 'Role', 'required');
            //$this->form_validation->set_rules('msg_subject', 'Subject', 'trim|required|min_length[5]');
            $data['msg_id'] = $msg_id    =  $this->input->post('msg_id') ;
           
            $this->form_validation->set_rules('msg_body', 'Message', 'trim|required|min_length[5]');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('admin/notification/msg_details/'.$msg_id),'refresh');
			}
            else
            {
                $data['msg_body']   =  $this->input->post('msg_body');
                $data['sender_id'] =  $this->session->userdata('admin_id');
                if($this->Notification_model->message_reply($data) == true){
                    $this->session->set_flashdata( 'success', 'Success Message sent' );
                    redirect(base_url('admin/notification/msg_details/'.$msg_id),'refresh');
                }
                else
                {
                    $this->session->set_flashdata( 'error', 'Issue in inserting data!' );
                    redirect(base_url('admin/notification/msg_details/'.$msg_id),'refresh');
                }
                
            }
            
        }
    }
    ////////////////////////////////////////////////
    public function my_messages(){
        $data['title'] = 'My Messages';
        
		//$data['notifications'] = $this->notification_model->get_all_notifications();
		$this->load->view('admin/includes/_header', $data);
		$this->load->view('admin/notifications/my_messages');
		$this->load->view('admin/includes/_footer');
        
    }
    public function my_messages_jason()
	{	
        $records = $this->Notification_model->get_my_msg_jason($this->session->userdata('admin_id'));
		
		$data = array();
		$i=0;
		foreach ($records['data']  as $row) 
		{ 
			$data[]= array(
                        ++$i,
                        //$row['msg_type'],
                        $row['msg_subject'],
                        date("d/m/Y H:i:s", strtotime($row['created_at'])) ,
                        $row['role_name'],
                        substr($row['msg_body'],0,150),
                        '<a href ="'.base_url('admin/notification/msg_details/'. $row['msg_id']).'" >View Detail</a>'
                    );
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}

	
}
?>