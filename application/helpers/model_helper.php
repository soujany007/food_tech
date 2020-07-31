<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function setUserSession($data) {
    $session_data = serialize($data);
    $_SESSION['user_sess_info'] = $session_data;
    return true;
}

function getUserSession() {
    if (!empty($_SESSION['user_sess_info'])) {
        //echo "<pre>";print_r(unserialize($_SESSION['user_sess_info']));die();
        return unserialize($_SESSION['user_sess_info']);
    } else {
        return false;
        //$ci = & get_instance();
        //$user_id = $ci->input->cookie('user_id',true);
        //$user_info = $ci->um->getUserByuserId($user_id);
        //setSession($user_info);
        //return unserialize($_SESSION['user_sess_info']);
    }
}

function setUserRole($data) {
    $role_data = @explode(',', $data->user_codes);
    $_SESSION['user_role'] = serialize($role_data);
    return true;
}

function getUserRole() 
{
    if (@$_SESSION['user_role'] != '') 
    {
        return unserialize($_SESSION['user_role']);
    }
}

function setUserTask($data) {
    $task_data = array();
	foreach($data as $d)
	{
		$task_data[] = $d->task_name;
	}
    $_SESSION['user_task'] = serialize($task_data);
    return true;
}

function getUserTask() {
    if (@$_SESSION['user_task'] != '') {
        return unserialize($_SESSION['user_task']);
    }
}

function checkLoginSession() 
{
    $sessionData = getUserSession();
    if(empty($sessionData) || $sessionData == '') 
    {
        redirect('user/');
        die();
    }
}

function logoutUser() 
{
    session_destroy();
    //delete_cookie('user_id'); 
    redirect('user/');
    die();
}

function sendEmail($toemail, $subject, $message, $path = "") {
    $ci = & get_instance();

    $sendBy = $ci->config->item('email_send_by');
    $fromEmail = $ci->config->item('from_email');
    $fromName = $ci->config->item('from_name');
    if ($sendBy == 1 || $sendBy == 2) {
        if ($sendBy == 1) {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => $ci->config->item('smtp_host'),
                'smtp_port' => $ci->config->item('smtp_port'),
                'smtp_user' => $ci->config->item('smtp_user'),
                'smtp_pass' => $ci->config->item('smtp_pass'),
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'crlf' => '\r\n',
                'newline' => '\r\n',
                'wordwrap' => TRUE
            );

            $ci->load->library('email', $config);
        } else {
            $config = Array('mailtype' => 'html',
                'charset' => 'utf-8',
                'crlf' => '\r\n',
                'newline' => '\r\n',
                'wordwrap' => TRUE
            );
            $ci->load->library('email', $config);
        }

        $ci->email->set_newline("\r\n");
        $ci->email->set_mailtype('html');
        $ci->email->set_crlf("\r\n");
        $ci->email->from($fromEmail, $fromName);
        $ci->email->to($toemail);
        $ci->email->subject($subject);
        $ci->email->message($message);
        if ($path != '') {
            $ci->email->attach($path);
        }

        $result = $ci->email->send();
        //print_r($this);die();
    } else {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= 'From: ' . $fromName . "\r\n" .
                'Reply-To: ' . $fromEmail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        $result = mail($toemail, $subject, $message, $headers);
    }
    /* echo '$result=>'.$result.'<br>';
      echo '$$toemail=>'.$toemail.'<br>';
      echo '$$subject=>'.$subject.'<br>';
      echo '$$message=>'.$message.'<br>'; */
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function getFormatedDate($date) {
    return date('Y-m-d', strtotime($date));
}

function base64Encode($data) {
    return base64_encode($data);
}

function base64Decode($data) {
    return base64_decode($data);
}

function getFormatedTime($date) {
    return date('H:i:s', strtotime($date));
}

function getFormatedDateTime($date) {
    return date('Y-m-d H:i:s', strtotime($date));
}

function getFormatedNumber($number) {
    return $number;
}

function setSession($user_info)
{
    // echo "<pre>";print_r($user_info);die();
    $ci = & get_instance();
    if($user_info->is_super_admin == 1)
    {
        setUserSession($user_info);
    }
    elseif($user_info->company_id > 0)
    {
        $company_user_info = $ci->um->getCompanyUserInfo($user_info->company_id);
        setUserSession($company_user_info[0]);
    }
    elseif($user_info->distributor_id > 0)
    {
        $distributor_user_info = $ci->um->getDistributoUserInfo($user_info->distributor_id);
        //echo "<pre>";print_r($distributor_user_info);die();
        setUserSession($distributor_user_info[0]);   
    }
    elseif($user_info->employee_id > 0)
    {
        
    }

    // $user_task = $ci->um->getUserTask($user_info->user_id); 
    $user_role = $ci->um->getUserRole($user_info->user_id);

    // setUserTask($user_task);
    setUserRole($user_role);
}

function timezone_list() {
    $zones_array = array();
    $timestamp = time();
    foreach(timezone_identifiers_list() as $key => $zone) {
        date_default_timezone_set($zone);
        $zones_array[$key]['zone'] = $zone;
        $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
    }
    return $zones_array;
}
function checkPrefixForHost($system_smtp_host){
		return $system_smtp_host;
		/*if(strpos($system_smtp_host, 'ssl://') !== false || strpos($system_smtp_host, 'tls://') !== false){
			return $system_smtp_host; 
		}else{
			return 'ssl://'.$system_smtp_host;
		}*/
}  
function getPhoneNumberFormate($number){
	$number = str_replace(array("-","(",")"),"",$number);
    $count = strlen($number);
	if($count >= 10) {
            $phone = '('.substr($number, 0, 3).')' .' '.
            substr($number, 4, 3) .'-'.
            substr($number, 7);
	}
	return ($phone) ? "$phone" : '';
}

function GetNowDate($timezone='')
{
    if($timezone)
    $dateObj = new DateTime("now", new DateTimeZone($timezone));
    else
    $dateObj = new DateTime("now", new DateTimeZone('UTC'));
    //echo "GetNowDate==>>>>> Current Date=".date('Y-m-d h:iA')."--------Converted Date=". $dateObj->format('Y-m-d h:iA').'<br>'; // 2012-07-05 10:43AM
    //die();
    return $dateObj->format('Y-m-d h:iA');
}
function ConvertDate($original_datetime, $target_timezone = '', $formate = '')
{
    $target_timezone = ($target_timezone != '') ? $target_timezone : 'UTC';
    $original_timezone = 'UTC';
    $formate = ($formate != '') ? $formate : 'Y-m-d H:i:s' ; 
    
    if($original_datetime!='')
    {
        //$original_datetime = $date;
        $original_timezone = new DateTimeZone($original_timezone);

        // Instantiate the DateTime object, setting it's date, time and time zone.
        $datetime = new DateTime($original_datetime, $original_timezone);

        // Set the DateTime object's time zone to convert the time appropriately.
        $target_timezone = new DateTimeZone($target_timezone);
        $datetime->setTimeZone($target_timezone);

        // Outputs a date/time string based on the time zone you've set on the object.
        $triggerOn = $datetime->format($formate);

        // Print the date/time string.
        return  $triggerOn; // 2013-04-01 08:08:00
    }
}

function ConvertDateToGMT($original_datetime, $original_timezone='', $target_timezone = '' )
{
    $target_timezone = ($target_timezone != '') ? $target_timezone : 'UTC';
    $original_timezone = ($original_timezone != '') ? $original_timezone : 'UTC';
    
    if($original_datetime!='')
    {
        $original_timezone = new DateTimeZone($original_timezone);

        // Instantiate the DateTime object, setting it's date, time and time zone.
        $datetime = new DateTime($original_datetime, $original_timezone);

        // Set the DateTime object's time zone to convert the time appropriately.
        $target_timezone = new DateTimeZone($target_timezone);
        $datetime->setTimeZone($target_timezone);

        // Outputs a date/time string based on the time zone you've set on the object.
        $triggerOn = $datetime->format('Y-m-d H:i:s');

        // Print the date/time string.
        return $triggerOn; // 2013-04-01 08:08:00
    }
}

function getTimeStamp($original_datetime, $target_timezone = '', $formate = '')
{
    $target_timezone = ($target_timezone != '') ? $target_timezone : 'UTC';
    $original_timezone = 'UTC';
    $formate = ($formate != '') ? $formate : 'Y-m-d H:i:s' ; 
    
    if($original_datetime!='')
    {
        //$original_datetime = $date;
        $original_timezone = new DateTimeZone($original_timezone);

        // Instantiate the DateTime object, setting it's date, time and time zone.
        $datetime = new DateTime($original_datetime, $original_timezone);

        // Set the DateTime object's time zone to convert the time appropriately.
        $target_timezone = new DateTimeZone($target_timezone);
        $datetime->setTimeZone($target_timezone);

        // Outputs a date/time string based on the time zone you've set on the object.
        $triggerOn = $datetime->getTimestamp();

        // Print the date/time string.
        return  $triggerOn; // 2013-04-01 08:08:00
    }
    
}

function countUnreadEmailLogs(){
    $sessionData = getUserSession();
    if(!empty($sessionData->user_id)){
        $ci = & get_instance();
        $ci->load->model('logs_manager');
        $ci->logm = $ci->logs_manager;
        $data = $ci->logm->countUnreadEmailLog($sessionData->user_id);
        if(!empty($data->totalUnreadEmail)){
            return $data->totalUnreadEmail;
        }else{
            return '0';
        }
    }else{
        return '0';
    }
}

function checkFranchiseKpi(){
    $sessionData = getUserSession();
    $ci = & get_instance();
    $ci->load->model('kpi_manager');
    $ci->km = $ci->kpi_manager;
    $where = ' AND ffs.franchise_id ='.$sessionData->franchise_id;
    $periods = $ci->km->getFranchiseTerritoryPeriod($where); 
    return $periods;
}
