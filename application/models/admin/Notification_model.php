<?php
	class Notification_model extends CI_Model{

		public function unseen_count($user_id)
		{
            $this->db->where('admin_id', $user_id);
            $this->db->where('seen', 0);
            return $num = $this->db->count_all_results('ci_noti_recipients');
		}
        public function notifications_by_userId($user_id){
            $this->db->select('ns.notification_id,ns.notification_title,ns.notification_desc,
 ns.created_at,nsr.rec_id,nsr.seen')
                 ->from('ci_notifications as ns')
                 ->join('ci_noti_recipients as nsr', 'ns.notification_id = nsr.notification_id')
                 ->where('nsr.admin_id', $user_id)
                 ->order_by('ns.created_at' , 'DESC')
                 ->limit(5);
			$query = $this->db->get();
			 return $result =  $query->result_array();
           
        }
        public function get_noification_details($notification_id,$user_id){
             $this->update_status($notification_id,$user_id);
             $this->db->select('ns.notification_id,nsr.rec_id,nsr.admin_id,ns.notification_title,ns.notification_desc,
 ns.created_at,nsr.seen,CONCAT(ci_admin.firstname," ",ci_admin.lastname) AS sent_from,ns.created_by ')
                 ->from('ci_notifications as ns')
                 ->join('ci_noti_recipients as nsr', 'ns.notification_id = nsr.notification_id')
                 ->join('ci_admin', 'ci_admin.admin_id = ns.created_by')
                 //->where('nsr.admin_id', $user_id)
                 ->where('ns.notification_id', $notification_id);
                
			$query = $this->db->get();
           //echo $this->db->last_query();
			 return  $row = $query->row();
            
        }
        public function get_notification_recipiants($notification_id){
             $sql = "SELECT  notification_id,nrs.admin_id,CONCAT(ci_admin.firstname,' ',ci_admin.lastname) AS admin_name 
                    FROM ci_noti_recipients nrs,ci_admin 
                    WHERE nrs.admin_id = ci_admin.admin_id AND  notification_id=".$notification_id;
             $query = $this->db->query($sql);
             return $result = $query->result();	 
            
            
        }
        public function get_msg_recivers($msg_id){
                     $sql = "SELECT * FROM ci_admin
                             WHERE admin_id IN(
                             SELECT DISTINCT reciver_id
                            FROM ci_msg_recipients
                            WHERE msg_id=".$msg_id."
                            AND  reciver_id != ".$this->session->userdata('admin_id')."
                            )";
             $query = $this->db->query($sql);
             return $result = $query->result();	 
            
            
        }
        public function update_status($notification_id,$user_id){
             $this->db->set('seen', 1);
             $this->db->set('seen_at',date("d/m/Y"));
             $this->db->where('notification_id', $notification_id);
             $this->db->where('admin_id', $user_id);
             $this->db->where('seen', 0);
             $this->db->update('ci_noti_recipients');
            
        }
        public function save_notification($data){
            if($this->db->insert('ci_notifications',$data)){
                $notification_id = $this->db->insert_id();
               return $query = $this->db->query('INSERT ci_noti_recipients (notification_id, admin_id)
                                            SELECT '.$notification_id.', admin_id
                                            FROM ci_admin
                                            WHERE admin_role_id ='.$data['role_id']);
                
            }
        }
        public function get_admin_roles(){
           
            $this->db->select(' role_id,role_name,role_short')
                 ->from('ci_admin_roles')
                 ->where('role_status', 1);
                       
			$query = $this->db->get();
            return $result =  $query->result_array();
                 //$query->result();	
			 //die($this->db->last_query());
            
        }

		public function get_notification_jason($admin_id)
		{
			$wh =array('ns.created_by='.$admin_id);
			$SQL ='SELECT ns.notification_id,ns.notification_title,ns.notification_desc,
                    ns.created_at, rol.role_name FROM ci_notifications ns
                    INNER JOIN ci_admin_roles rol ON rol.role_id = ns.role_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}
        public function get_my_note_jason($admin_id){
			$wh =array('nrs.admin_id='.$admin_id);
			$SQL ='SELECT ns.notification_id,ns.notification_title,ns.notification_desc,
                    ns.created_at, rol.role_name 
                    FROM ci_notifications ns
                    INNER JOIN ci_admin_roles rol ON rol.role_id = ns.role_id
                    INNER JOIN ci_noti_recipients nrs ON nrs.notification_id = ns.notification_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}
        public function get_users_by_role($role_id,$district_id=0,$tehsil_id=0){
            $subjectList = $this->session->userdata('subjects_ids');
            $log_role_id = $this->session->userdata('role_id');
            /*
            SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                    FROM ci_admin WHERE parent_admin_id=".$this->session->userdata('parent_id')." AND admin_id <>".$this->session->userdata('admin_id')."
                    UNION
            */
            $sql = '';
            if($log_role_id == 1)//Admin
            {
                if($role_id==7){
                   $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname,' ',district_name_en) AS admin_name 
                        FROM ci_admin,ci_districts 
                        WHERE district_id = u_district_id 
                        AND admin_role_id=".$role_id." order by district_name_en";//." AND u_district_id = ".$this->session->userdata('u_district_id');  
                    
                }
                else if($role_id==8){
                    $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname,' ',tehsil_name_en) AS admin_name 
                        FROM ci_admin,ci_tehsil 
                        WHERE tehsil_id = u_tehsil_id 
                        AND admin_role_id=".$role_id." order by tehsil_district_id";//." AND u_district_id = ".$this->session->userdata('u_district_id') ; 
                }else{
                     $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=".$role_id;
                }
               
            }
            else if($log_role_id == 2)//Subject Specilist
            {
                if($role_id == 1){//admin
                     $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=$role_id ";
                }
                else if($role_id == 3 OR $role_id == 6){// IW/IR
                     $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=".$role_id." AND parent_admin_id =".$this->session->userdata('admin_id');
                }
                else if($role_id == 4){// AE
                     $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=".$role_id." AND admin_id =".$this->session->userdata('parent_id');
                }
               
            }
            else if($log_role_id == 3)//item writer
            {
                $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=".$role_id." AND  admin_id=".$this->session->userdata('parent_id');
            }
            else if($log_role_id == 4)//Assessment Expert
            {
                 if($role_id == 1 OR $role_id == 5){//admin/PSM
                     $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=$role_id ";
                }
                else if($role_id == 2){// SS
                     $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=".$role_id." AND parent_admin_id =".$this->session->userdata('admin_id');
                }
                
            }
            else if($log_role_id == 5)//Psychometrician
            {
                $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=$role_id ";
            }
            else if($log_role_id == 6)//Item Reviewer
            {
                if($role_id == 2){ // SS
                $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=".$role_id." AND  admin_id=".$this->session->userdata('parent_id');
                }
                else if($role_id == 4){ // AE
                $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=".$role_id." AND  admin_id=(SELECT parent_admin_id FROM ci_admin WHERE admin_id =".$this->session->userdata('parent_id').")";
                }
            }
            else if($log_role_id == 7)//District Focal Person
            {
                if($role_id == 1){
                    $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                        FROM ci_admin WHERE admin_role_id=$role_id "; 
                }
                else if($role_id == 8){ //tehsil Focal person
                    $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname,' ',tehsil_name_en) AS admin_name 
                        FROM ci_admin,ci_tehsil 
                        WHERE tehsil_id = u_tehsil_id 
                        AND admin_role_id=".$role_id." AND u_district_id = ".$this->session->userdata('u_district_id') ; 
                }
               
            }
            else if($log_role_id == 8)//Tehsil Focal Person
            {
                $sql = "SELECT admin_id,CONCAT(firstname,' ',lastname,' ',district_name_en) AS admin_name 
                        FROM ci_admin,ci_districts 
                        WHERE district_id = u_district_id 
                        AND admin_role_id=".$role_id." AND u_district_id = ".$this->session->userdata('u_district_id');
            }
            /*$sql = "SELECT admin_id,CONCAT(firstname,' ',lastname) AS admin_name 
                    FROM ci_admin WHERE admin_role_id=$role_id ";
            if(in_array($log_role_id,array(2,4,5,6))){
                $sql .= "AND subjects_ids IN(".$subjectList.")";
            }
            if(in_array($log_role_id,array(1,7,8)) && in_array($role_id,array(7,8))){
                if($district_id != 0){
                    $sql .= " AND u_district_id = ".$district_id;
                }
                if($tehsil_id != 0){
                    $sql .= " AND u_tehsil_id = ".$tehsil_id;
                }
            }*/
            $query = $this->db->query($sql);
            return $result = $query->result();	
           // die($this->db->last_query());
            
           
        }
        /*******************************************************************
        *   Message model functions
        *********************************************************************/
        public function get_districts(){
            
            $sql = "SELECT district_id,district_name_en FROM ci_districts ";
            $query = $this->db->query($sql);
             return $result = $query->result_array();	

        }
        public function get_tehsils($dist_id){
            
            $sql = "SELECT tehsil_id,tehsil_name_en FROM ci_tehsil WHERE tehsil_district_id=".$dist_id;
            $query = $this->db->query($sql);
             return $result = $query->result();	
        }
         public function save_message($data){
            $this->db->trans_start();
             
            /*$ary_thr = array(
                            'subject' => $data['msg_subject'],
                            'sender_id' => $data['created_by'],
                            'role_id' => $data['role_id'],
                            'msg_type' => $data['msg_type']
                );
            $this->db->set($ary_thr);
            $this->db->insert('ci_msg_thread');
            $thread_id = $this->db->insert_id();
            */
             
             $ary_msg = array(
                            'role_id' => $data['role_id'],
                            'msg_subject' => $data['msg_subject'],
                            'msg_body' => $data['msg_body'],
                            'msg_type' => $data['msg_type'],
                            'sender_id' => $data['sender_id'],
                            'msg_status' => 1
                );
            
             
            
             
            //$this->db->set('name', $name);
           // $this->db->set('title', $title);
           // $this->db->set('status', $status);
            //$this->db->insert('mytable');
            $this->db->set($ary_msg);
            if($this->db->insert('ci_messages')){
                $msg_id = $this->db->insert_id();
                $selected_users = '';
                if( count($data['msg_recivers'])>0){
                    $selected_users = ' AND admin_id IN('.implode(",",$data['msg_recivers']).')';
                }
                $query = $this->db->query('INSERT ci_msg_recipients (msg_id, 
                                                                    sender_id,
                                                                    reciver_id,
                                                                    role_id,
                                                                    msg_type,
                                                                    message_text                                             )
                                                            SELECT '.$msg_id.', 
                                                                    '.$data['sender_id'].',
                                                                    admin_id,
                                                                    '.$data['role_id'].',
                                                                    '.$data['msg_type'].', 
                                                                    "'.$data['msg_body'].'"
                                                            FROM ci_admin
                                                WHERE admin_role_id ='.$data['role_id']
                                                .$selected_users
                                            );
               // echo $this->db->last_query();
                
            }
            $this->db->trans_complete();
            if($this->db->trans_status() == true){
                return true;
            }else{
                return false ;
            }
        }
        public function message_reply($data){
            
             $this->db->trans_start();
            $query = $this->db->query('INSERT ci_msg_recipients (msg_id, 
                                                                    sender_id,
                                                                    reciver_id,
                                                                    is_reply,
                                                                    message_text                                             )
                                                            SELECT '.$data['msg_id'].', 
                                                                    '.$data['sender_id'].',
                                                                    admin_id,
                                                                    1,
                                                                    "'.$data['msg_body'].'"
                                                            FROM ci_admin
                                                WHERE admin_id in(SELECT DISTINCT reciver_id
                                                                FROM ci_msg_recipients
                                                                WHERE msg_id='.$data['msg_id'].' AND reciver_id != '.$data['sender_id'].'
                                                                    
                                                                    )'
                                            );
            $query = $this->db->query('INSERT ci_msg_recipients (msg_id, 
                                                                    sender_id,
                                                                    reciver_id,
                                                                    is_reply,
                                                                    message_text                                             )
                                                            SELECT '.$data['msg_id'].', 
                                                                    '.$data['sender_id'].',
                                                                    admin_id,
                                                                    1,
                                                                    "'.$data['msg_body'].'"
                                                            FROM ci_admin
                                                WHERE admin_id in(SELECT DISTINCT sender_id
                                                                FROM ci_msg_recipients
                                                                WHERE msg_id='.$data['msg_id'].' 
                                                            
                                                                    )'
                                            );
            
            // $this->db->set('msg_body', $data['msg_body']);
            // $this->db->set('sender_id', $data['sender_id']);
            // $this->db->set('msg_id', $data['msg_id']);
//$this->db->insert('ci_messages');
             //$msg_id = $this->db->insert_id();
            
            /* $query = $this->db->query('INSERT ci_msg_recipients (thread_id,msg_id, admin_id)
                                            SELECT '.$data['thread_id'].', '.$msg_id.', admin_id
                                            FROM ci_msg_recipients
                                            WHERE msg_id ='.$data['parent_msg_id']
                                            );*/
            $this->db->trans_complete();
            if($this->db->trans_status() == true){
                return true;
            }else{
                return false ;
            }
            
        }
        public function get_message_jason($admin_id)
		{
			$wh =array('ci_messages.sender_id='.$admin_id);
            $SQL ='SELECT * FROM ci_messages 
                    INNER JOIN ci_admin_roles ON  ci_admin_roles.role_id= ci_messages.role_id';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}
       
        public function msg_unseen_count($user_id)
		{
            $this->db->where('reciver_id', $user_id);
            $this->db->where('msg_seen_st', 0);
            return $num = $this->db->count_all_results('ci_msg_recipients');
		}
        public function message_by_userId($user_id){
            $this->db->select('*')
                 ->from('ci_msg_recipients')
                 ->where('reciver_id', $user_id)
                 ->order_by('m_r_id' , 'DESC')
                 ->limit(5) 
                ;
			$query = $this->db->get();
			 return $result =  $query->result_array();
           
        }
        
        public function get_all_message_by_parent($user_id,$parent_msg_id)
        {
            $sql = "SELECT `msg`.`parent_msg_id`, `msg`.`msg_id`, `msg`.`msg_subject`, `msg`.`msg_body`, `msg`.`created_at`, `msg_r`.`m_r_id`, `msg_r`.`msg_seen_st`, CONCAT(ci_admin.firstname, ' ', ci_admin.lastname) AS admin_name FROM `ci_messages` AS `msg` JOIN `ci_msg_recipients` AS `msg_r` ON `msg`.`msg_id` = `msg_r`.`msg_id` JOIN `ci_admin` ON `ci_admin`.`admin_id` = `msg`.`created_by` WHERE `msg_r`.`admin_id` =".$user_id." AND  (`msg`.`parent_msg_id` = ".$parent_msg_id." OR  msg.msg_id = ".$parent_msg_id." ) ORDER BY `msg`.`created_at` DESC";
             $query = $this->db->query($sql);
          /*  
           $this->db->select('msg.parent_msg_id,msg.msg_id,msg.msg_subject,msg.msg_body,
 msg.created_at,msg_r.m_r_id,msg_r.msg_seen_st,CONCAT(ci_admin.firstname," ",ci_admin.lastname) AS admin_name')
					 ->from('ci_messages as msg')					 
					  ->join('ci_msg_recipients as msg_r', 'msg.msg_id = msg_r.msg_id')
                      ->join('ci_admin', 'ci_admin.admin_id = msg.created_by')
                      ->where('msg_r.admin_id', $user_id)
                      ->where('msg.parent_msg_id', $parent_msg_id)
                      -
                     ->order_by('msg.created_at' , 'DESC');*/
					
			//$query = $this->db->get();
          // echo $this->db->last_query();
           // exit;
            
			return $result = $query->result();	 
        }
        
        public function get_msg_details($msg_id){
             
            
             /*$this->db->select('msg.parent_msg_id,msg.msg_id,msg.msg_subject,msg.msg_body,
 msg.created_at,msg_r.m_r_id,msg_r.msg_seen_st,CONCAT(ci_admin.firstname," ",ci_admin.lastname) AS admin_name')
                 ->from('ci_messages as msg')
                 ->join('ci_msg_recipients as msg_r', 'msg.msg_id = msg_r.msg_id')
                 ->join('ci_admin', 'ci_admin.admin_id = msg.created_by')
                 ->where('msg_r.admin_id', $user_id)
                 ->where('msg.msg_id', $msg_id);*/
            
            $sql = "SELECT * FROM ci_messages 
                    INNER JOIN ci_admin_roles ON  ci_admin_roles.role_id= ci_messages.role_id
                    INNER JOIN ci_admin ON ci_messages.sender_id = ci_admin.admin_id
                    WHERE ci_messages.msg_id=".$msg_id;
                
			 $query = $this->db->query($sql);
			 return $result = $query->result();	 
            
        }
        public function get_msg_threads($msg_id){
            $this->update_msg_status($msg_id,$this->session->userdata('admin_id'));
            $sql = "SELECT * FROM ci_msg_recipients 
                    INNER JOIN ci_admin ON ci_msg_recipients.reciver_id = ci_admin.admin_id
                    WHERE msg_id=".$msg_id." 
                    AND is_reply =1
                    ORDER BY m_r_id DESC";
                
			 $query = $this->db->query($sql);
			 return $result = $query->result();	 
            
        }
        public function update_msg_status($msg_id,$reciver_id){
             $this->db->set('msg_seen_st', 1)
                     ->set('msg_seen_at', 'NOW()', FALSE)
                     ->where('msg_id', $msg_id)
                     ->where('reciver_id', $reciver_id)
                     ->where('msg_seen_st', 0);
             $this->db->update('ci_msg_recipients');
            
        }
        public function get_my_msg_jason($admin_id){
			//$wh =array('ci_messages.sender_id='.$admin_id);
            $wh = array("ci_messages.msg_id in(SELECT DISTINCT msg_id FROM ci_msg_recipients WHERE reciver_id =".$admin_id.")");
            $SQL ='SELECT * FROM ci_messages 
                    INNER JOIN ci_admin_roles ON  ci_admin_roles.role_id= ci_messages.role_id
                    
                    ';		
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}
        
		
		
	}
?>