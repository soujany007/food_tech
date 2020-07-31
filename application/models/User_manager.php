<?php

class User_manager extends CI_Model {

    function getUserByUsernameAndPassword($username, $password) {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetUserByUsernamePassword, array($username, md5($password)));
        //print_r($this->db->last_query());die();

		if ($query->num_rows() > 0) 
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result[0];
        }
        $this->db->trans_complete();
    }

    function getUserRole($user_id) {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetUserRole, array($user_id));
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getUserTask($user_id) {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetUserTask, array($user_id));
		if ($query->num_rows() > 0) {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getUserByEmail($email) {
        $query = $this->qc->queryGetUserByEmail;
        $this->db->trans_start();
        $query = $this->db->query($query, array($email));
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getCompanyUserInfo($company_id){
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetCompanyUserInfo, array($company_id));
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getDistributoUserInfo($distributor_id){
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetDistributoUserInfo, array($distributor_id));
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function templateData($template_code,$company_id='',$is_master='')
    {
        $this->db->trans_start();
        $where = '';
        if(!empty($template_code)){
            $where .= ' AND et.template_code ="'.$template_code.'"';
        }
        if(!empty($company_id)){
            $where .= ' AND et.company_id ="'.$company_id.'"';
        }
        if(!empty($is_master)){
            $where .= ' AND et.is_master ="'.$is_master.'"';
        }

        $sql = $this->qc->queryGetTemplateDataByTemplateCode;
        $sql = str_replace(array('##WHERE##'), array($where), $sql );
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0){
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }
    function getUserByUserIdAndEmail($id, $email, $type) {
        $this->db->trans_start();
        if(($type != '') && ($type == 'company'))
        {
            $query = $this->db->query($this->qc->queryGetCompanyUserByIdAndEmail, array($id, $email));
        }

        if ($query->num_rows() > 0) {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function addUser($user_arr) {
        $this->db->trans_start();
        $this->db->insert('user', $user_arr);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getroleByCode($role_code) {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetroleByCode, array($role_code));
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function addRoleCode($user_role_arr) {
        $this->db->trans_start();
        $this->db->insert('user_role', $user_role_arr);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function getAllRoleByGroup($group) {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllRoleByGroup, array($group));
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function insert_mail_instance($data) {
        $this->db->trans_start();
        $this->db->insert('email_instance', $data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }

    function checkUserEmailByIdAndEmail($id, $email,$where=''){ 
        //echo $id.','. $email;die;
        if (!empty($email)) {
            $this->db->trans_start();
            $query = $this->db->query(str_replace('#WHERE#',$where,$this->qc->queryCheckUserEmailByIdAndEmail), array($id, $email));
            //echo $this->db->last_query(); die;
            if ($query->num_rows() > 0) {
                $result = $query->row();
                $this->db->trans_complete();
                return $result;
            }else{
                $this->db->trans_complete();
                return false;
            }
        }
    }

    function editUser($updateArray, $condition, $table) {
        $affected_id = '';
        if ((is_array($updateArray) && $condition) || (is_array($updateArray))) {
            $this->db->trans_start();
            if ($this->db->update($table, $updateArray, $condition)) {
                $affected_id = TRUE;
            }
        }
        $this->db->trans_complete();
        return $affected_id;
    }
    function getUserByuserId($user_id){
        $query = $this->qc->queryGetUserByuserId;
        $this->db->trans_start();
        $query = $this->db->query($query, array($user_id));
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getUserDomain($domain){
        $query = $this->qc->queryGetUserDomain;
        $this->db->trans_start();
        $query = $this->db->query($query, array($domain));
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }
	function getAllUsersList(){
		$query = $this->qc->getAllUsersList;
        $this->db->trans_start();
        $query = $this->db->query($query);
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
	}
	function getUserDataById($user_id){
		$query = $this->qc->queryGetUserDataById;
        $this->db->trans_start();
        $query = $this->db->query($query, array($user_id));
        if ($query->num_rows() > 0) {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
	}
	function getUserDataByContactId($id){
        $this->db->trans_start();
		$query = $this->db->query($this->qc->queryGetUserDataByContactId, array($id));
        if ($query->num_rows() > 0){
                $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
	}

    function getLeadSourceStepByFranchisorId($where='',$opt = 'C', $perPage = '',$offset= ''){
        $limit = '';
        if($perPage != '' || $offset != ''){
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetLeadSourceStepByFranchisorId;
        $query = str_replace(array('##WHERE##', '##LIMIT##'),array($where, $limit),$query);
        //echo $query;die();
        $this->db->trans_start();
        $query = $this->db->query($query);
        if ($query->num_rows() > 0){
            if($opt == 'R'){
                $result = $query->result();
            }else{
                $result = $query->num_rows();
            }
            
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getLeadSourceCharteByFranchisorId($where='',$opt = 'C', $perPage = '',$offset= ''){
        $limit = '';
        if($perPage != '' || $offset != ''){
            $limit = " LIMIT $offset, $perPage";
        }
        //echo $where;die;
        $query = $this->qc->queryGetLeadSourceCharteByFranchisorId;
        $query = str_replace(array('##WHERE##', '##LIMIT##'),array($where, $limit),$query);
        //echo $query;die();
        $this->db->trans_start();
        $query = $this->db->query($query);
        if ($query->num_rows() > 0){
            if($opt == 'R'){
                $result = $query->result();
            }else{
                $result = $query->num_rows();
            }
            
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }
    function getDashboardDataByFraonshisorId($franchisor_id){
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetDashboardDataByFraonshisorId ,$franchisor_id );
        if(isset($query) && $query->num_rows() > 0){
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }
    
    function getUpdatedValues($arrayDB,$arrayPost)
    {
        $diffArray=array();
        if($arrayDB)
        {
            //for($i=0;count($arrayDB)>$i;$i++)
            foreach($arrayDB as $key => $value)
            { 
                if($arrayDB[$key] != $arrayPost[$key])
                {
                    $diffArray[$key] = $arrayPost[$key];
                }
            }
        }
        if(count($diffArray)>0)
        {
            return json_encode($diffArray);
        }
    }
    
    function getAllTaskByUserId($user_id,$contact_id)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllTaskByUserId ,array($user_id,$contact_id));
        //echo $this->db->last_query();die;
        if(isset($query) && $query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }        
    
    function sendSMSByFranchisorLeadIdActivity($franchisor_lead_id,$activity)
    {
        if($franchisor_lead_id !='' && $activity!='')
        {
            $this->db->trans_start();
            $query = $this->db->query($this->qc->queryGetSMSSettingByActivity ,array($activity));
            //echo $this->db->last_query();die;
            if($query->num_rows() > 0)
            {
                $sms_data = $query->row();

                $user_query = $this->db->query($this->qc->queryGetLeadUSersDataByFranchisorLeadId ,array($franchisor_lead_id));
                if($user_query->num_rows() > 0)
                {
                    $user_data = $user_query->row();
                }
                
                //print_r($sms_data);print_r($user_data);
                
                if($sms_data->send_sms_lead_owner=='1' && $sms_data->lead_owner_message!='' && $user_data->owner_mobile!='')
                {
                    $this->sendSMS($user_data->owner_mobile,$user_data->owner_name,$sms_data->lead_owner_message);
                }

                if($sms_data->send_sms_lead=='1' && $sms_data->lead_message!='' && $user_data->lead_mobile!='')
                {
                    $this->sendSMS($user_data->lead_mobile,$user_data->lead_name,$sms_data->lead_message);
                }

                if($sms_data->send_sms_franchisor_admin=='1' && $sms_data->franchisor_admin_message!='' && $user_data->fa_mobile!='')
                {
                    $this->sendSMS($user_data->fa_mobile,$user_data->fa_name,$sms_data->franchisor_admin_message);
                }
                
            }
            $this->db->trans_complete();
        }
    }
    
    function sendSMS($number,$name,$message_body)
    {
             require_once (APPPATH."libraries/Twilio/autoload.php");
            //use 'Twilio\Rest\Client';

            $AccountSid = $this->config->item('sms_AccountSid');
            $AuthToken = $this->config->item('sms_AuthToken');

            // Step 3: instantiate a new Twilio Rest Client
            //$client = new Client($AccountSid, $AuthToken);
            $client = new Twilio\Rest\Client($AccountSid, $AuthToken);
            //print_r($client);die();

            $sms = $client->account->messages->create($number,
                array('from' => $this->config->item('sms_send_from_number') , 'body' => "Hey $name, ".$message_body
                )
            );
    }

    function email($data,$subject)
    {
        $fromEmail = $data[0];
        $message=$data[1];
        $fromName  = $data[2];
        $toemail   = $data[3];
        if($this->config->item('email_send_by')==1 || $this->config->item('email_send_by')==2)
        {
            if($this->config->item('email_send_by')==1)
            {
                $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => $this->config->item('smtp_host'),
                        'smtp_port' => $this->config->item('smtp_port'),
                        'smtp_user' => $this->config->item('smtp_user'),
                        'smtp_pass' => $this->config->item('smtp_pass'),
                        'mailtype'  => 'html',
                        'charset'   => 'iso-8859-1'
                );

                $this->load->library('email', $config);
            }else
            {
                $this->load->library('email');
            }
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype('html');
            $this->email->set_crlf("\r\n");
            $this->email->from($fromEmail, $fromName);
            $this->email->to($toemail);
            $this->email->subject($subject);
            $this->email->message($message);
            $result = $this->email->send();
            //echo (int)$result;die();
            /*if(!$this->email->Send()) {
            echo "Mailer Error: " . $this->email->print_debugger();
            exit;
            }
            die();*/
        }else
        {
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= 'From: '.$fromName . "\r\n" .
                    'Reply-To: '.$fromEmail . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            $result = mail($toemail,$subject,$message, $headers);
        }
        if($result)
        {
                    return true;
        }else
        {
                    return false;
        }
    }
}
?>