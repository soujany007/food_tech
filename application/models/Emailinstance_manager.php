<?php
class Emailinstance_manager extends CI_Model {

    function insertEmailInstance($data)
    {
        $this->db->trans_start();
        $this->db->insert('email_instance', $data);
        //echo $this->db->last_query();
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }
    
    /*
     * $emailTemplateData : email template object
     * $send_to_concat_id : Receiver contact Id
     * $send_by_user_id : login user / sent from user id
     * $message : Custom message
     * $subject : Custom Subject
     * $send_to : Receiver Email address
     * $type : (lead,marketing,system,user,admin)
     * $franchisor_lead_id :
     * $opportunity_id :
     * $fd_company_id : 
     * $user_id : (It will be required when we send 'User' in type)
     * 
     */
    
    
    //function createEmailInstance($email_template_data=NULL,$send_to_company_id=NULL,$send_by_user_id=NULL,$message=NULL,$subject=NULL,$send_to,$type,$franchisor_lead_id=NULL,$opportunity_id=NULL,$fd_company_id=NULL,$user_id=NULL,$link=NULL,$franchisor_id=NULL,$login_detail=NULL,$event_detail=NULL,$task_detail=NULL,$reminder_detail=NULL,$from_name=NULL,$from_email=NULL,$email_logs_id=NULL)
    
    function createEmailInstance($user_id=NULL,$send_to=NULL,$send_from=NULL,$body=NULL,$subject=NULL,$link=NULL, $send_to_name=NULL)
    {
        $debug_enable=false;
        
        $this->load->model('user_manager');
        $um = $this->user_manager;

        if($debug_enable)
        {
            echo '$user_id=>'.$user_id.'<br>'.
                '$send_to=>'.$send_to.'<br>'.
                '$send_from=>'.$send_from.'<br>'.
                //'$body=>'.$body.'<br>'.
                '$subject=>'.$subject.'<br>'.
                '$send_to_name=>'.$send_to_name.'<br>'.
                '$link=>'.$link.'<br>';
        }
        
        
        if((!empty($user_id)) && (!empty($send_to)) && (!empty($send_from)) && (!empty($body)) && (!empty($subject)) && (!empty($link)))
        {
            $body = str_replace('##site_url##', $link, $body);
            if($send_to_name != '')
            {
                $body = str_replace('##name##', $send_to_name, $body);
            }
            else 
            {
                $body = str_replace('##name##', '', $body);
            }
            
                
            $email_instance_data=array('user_id'=>$user_id,
                                'send_to'=>$send_to,
                                'send_from'=>$send_from,
                                'subject'=>$subject,
                                'body'=>$body);
            
            if($debug_enable)
            {
                echo '$email_instance_data=>'. print_r($email_instance_data,true).'<br><br>';
            }
            
            $this->insertEmailInstance($email_instance_data);
        }
    }

    function getEmailInstanceByEmail($where=''){

        $query = $this->qc->queryGetEmailInstanceByEmail;
        $query = str_replace(array('##WHERE##'),array($where),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);
        if ($query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getEmailByUserId($user_id)
    {
        $query = $this->qc->queryGetEmailByUserId;
        $this->db->trans_start();
        $query = $this->db->query($query,array($user_id,$user_id));
        //echo $this->db->last_query();die;
        if ($query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }
    

}

?>