<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_manager');
        $this->um = $this->user_manager;

        $this->load->model('Emailinstance_manager');
        $this->eim = $this->Emailinstance_manager;
		
        $this->qc = $this->queryconstant;
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->config->load('system');
    }

    function index()
    {
        $sessionData = getUserSession();
        if (!empty($sessionData)) 
        {
            redirect('user/dashboard');
            die();
        } 
        else 
        {
            if ($this->input->post('login_btn')) 
            {
                if ($this->_submit_validate() == TRUE) 
                {
                    redirect('user/dashboard');
                    die();
                }
            } 
            else if ($this->input->post('forgot_btn')) 
            {
                if ($this->validate_forgot_password() == TRUE) 
                {
                    $this->session->set_flashdata('success_message', 'Reset Password Link Sent On Your Email Id.');
                }
            }

            $temp_user_id = $this->input->cookie('user_id', TRUE);
            if(!empty($temp_user_id))
            {
                $vars['user_info'] = $this->um->getUserByuserId($temp_user_id);
            }

            $domain_name = $_SERVER['HTTP_HOST'];
            //$vars['user_domain'] = $this->um->getUserDomain($domain_name);
            $vars['title'] = 'FBM Distribution';
            $vars['meta_description'] = '';
            $vars['meta_keywords'] = '';
			$vars['heading'] = 'User Login';
            $vars['content_view'] = 'login';
            $this->load->view('login_layout',$vars);
        }    
    }
    
    function _submit_validate() {
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|callback_authenticate');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_message('authenticate', 'Oops! something went wrong. Please check your credentials & try again');
        return $this->form_validation->run();
    }

    function authenticate() 
    {
        if ($this->input->post('username') != '' && $this->input->post('password') != '')
        {
            $user_info = $this->um->getUserByUsernameAndPassword($this->input->post('username'), $this->input->post('password'));
            // echo '<pre>';print_r($user_info); die;

            if ($user_info)
            {
                $rememberme = $this->input->post('rememberme');
                if(isset($rememberme) && $rememberme == 'on')
                {
                    $cookie= array(
                        'name'   => 'user_id',
                        'value'  => $user_info->user_id,
                        'expire' => 86500 * 30,
                    );
                    $this->input->set_cookie($cookie);
                }
                else
                {
                    delete_cookie('user_id');
                }
                setSession($user_info);
            } 
            else 
            {
                return false;
            }
        }
    }
    
    function validate_forgot_password() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_authenticate_email');
        $this->form_validation->set_message('authenticate_email', 'Invalid Email Id. Please try again.');
        return $this->form_validation->run();
    }

    function authenticate_email() {
        if ($this->input->post('email') != '') 
        {
            $userdata = $this->um->getUserByEmail($this->input->post('email'));
            if ($userdata) 
            {
                $this->mail_ResetPasswordLink($userdata);
                return true;
            } 
            else 
            {
                return false;
            }
        }
    }

    function authenticate_user_name(){
        if ($this->input->post('user_name') != ''){
            $userdata = $this->um->getUserByUserName($this->input->post('user_name'));
            if($userdata){
                echo json_encode(false);
            }else{
                echo json_encode(true);
            }
        }
    }

    function mail_ResetPasswordLink($data) 
    {
        $vars['user_info'] = $data;
        
        $date = date("Y-m-d H:i:s");
        
        
        if($data->is_super_admin == 0)
        {
            if($data->user_company_id > 0)
            {
                $templateData = $this->um->templateData('RESETPASSWORD', $data->user_company_id, 1);
                $assign_user_data = $this->um->getCompanyUserInfo($data->user_company_id);

                $send_to_company_id = $data->company_id;
                $user_id = $assign_user_data[0]->user_id;
                $send_to = $data->email;
                $send_from = $assign_user_data[0]->email;
                $send_to_name = $data->name;
                $type = 'company';

                $encode = base64_encode(mt_rand(99, 1000) . "|" . $date . "|" . $data->user_id . "|" . $data->email . "|" . mt_rand(1000, 9999). "|" . $type);
            }
            //$mail_type='system';
        }
        else
        {

            //$templateData = $this->cm->templateData('FDRESETPASSWORD');
            //$templateData = $this->um->templateData('FDRESETPASSWORD');
            //$mail_type='admin';
        }
        
        $link = base_url('user/reset_forgot_password/'.$encode);
        //$assign_user_data = $this->um->getUserByuserId($data->user_id);

        $body = $templateData->email_body;
        $subject = $templateData->subject;

        $this->eim->createEmailInstance($user_id, $send_to, $send_from, $body, $subject, $link, $send_to_name);
    }

    function reset_forgot_password($data) 
    {
        $getData = explode("|", base64_decode($data));
        
        $user_id = $getData[2];
        $email_id = $getData[3];
        $type = $getData[5];
        $resultdata = $this->um->getUserByUserIdAndEmail($user_id, $email_id, $type);

        if($resultdata) 
        {

            if ($this->validate_reset_forgot_password() == true) 
            {
                $setpassword = array('password' => (md5($_POST['password'])));
                $this->um->editUser($setpassword, array('user_id'=>$user_id), 'user');
				$this->session->set_flashdata('success_message', 'Password Reset Successfully.');
				redirect('user/');
            }
            $vars['reset_forgot_password'] = 1;
            $vars['heading'] = 'Reset Password';
			$vars['content_view'] = 'login';
            $this->load->view('login_layout', $vars);
        } 
        else 
        {
            echo "INVALID URL";
        }
    }

    function validate_reset_forgot_password() {
        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        return $this->form_validation->run();
    }
    
    function dashboard()
    {
        checkLoginSession();
        $user_session_data = getUserSession();        
        $user_role = getUserRole();


        /*
        if($user_session_data->user_company_id > 0)
        { 
            //getFdCompanyFranchisorIdByFdCompanyId();
			//redirect('fd_company/FDFranchisor');
        }

        if(!empty($user_session_data->franchisor_id))
        {
            $vars['lead_source_steps'] = $this->um->getLeadSourceStepByFranchisorId('AND ls.franchisor_id='.$user_session_data->franchisor_id,'R');

            $vars['lead_source_chart'] = $this->um->getLeadSourceCharteByFranchisorId('AND ls.franchisor_id='.$user_session_data->franchisor_id,'R');
            $vars['dashboard_data'] = $this->um->getDashboardDataByFraonshisorId($user_session_data->franchisor_id);
            //echo '<pre>';print_r($vars['dashboard_data']); die;
        }
        // Log Activity
        $cur_page = 1;
        $perPage = 5;
        $offset = ($cur_page * $perPage) - $perPage;

        if($user_session_data->franchisor_id!='')
        {
            if($user_session_data->franchisor_id!='' && (in_array('FSU',$user_role) || in_array('FASU',$user_role)))
            {
                $leadActivity = $this->lm->getAllLeadActivityByFranchisorUser($user_session_data->franchisor_id,$user_session_data->contact_id, 'R',$offset, $perPage );
                $leadActivity_count = $this->lm->getAllLeadActivityByFranchisorUser($user_session_data->franchisor_id,$user_session_data->contact_id);
            }
            else
            {
                $leadActivity = $this->lm->getAllLeadActivitytByFranchisorAdmin($user_session_data->franchisor_id, 'R',$offset, $perPage);
                $leadActivity_count = $this->lm->getAllLeadActivitytByFranchisorAdmin($user_session_data->franchisor_id);
            }
        }
        elseif($user_session_data->fd_company_id!='')
        {
            if(in_array('FDCOMPANYWEBUSER',$user_role))
            {
                $leadActivity = $this->lm->getAllLeadActivityByFDCompanyUser($user_session_data->fd_company_id,$user_session_data->contact_id, 'R',$offset, $perPage);
                $leadActivity_count = $this->lm->getAllLeadActivityByFDCompanyUser($user_session_data->fd_company_id,$user_session_data->contact_id);
            }
            else
            {
                $leadActivity = $this->lm->getAllLeadActivityByFDCompanyAdmin($user_session_data->fd_company_id, 'R',$offset, $perPage);
                $leadActivity_count = $this->lm->getAllLeadActivityByFDCompanyAdmin($user_session_data->fd_company_id);
            }
        }
        //echo '<pre>'; print_r($leadActivity); die;
        
        $vars['all_emails'] = $this->eim->getEmailByUserId($user_session_data->user_id);
        $vars['my_task'] = $this->um->getAllTaskByUserId($user_session_data->user_id,$user_session_data->contact_id);
        
        $vars['log_activity'] = $leadActivity;
        $vars['leadActivity_count'] = $leadActivity_count;
        */
        $vars['title'] = 'FBM Distribution';
        $vars['meta_description'] = '';
        $vars['meta_keywords'] = '';
        $vars['content_view'] = 'dashboard';
        $this->load->view('inner_layout',$vars);         
    }

    function getYearChart(){
        checkLoginSession();
        $user_session_data = getUserSession();
        $view = $this->input->post('view');
        $vars['view'] = $view; 
        if(!empty($view) && !empty($user_session_data->franchisor_id)){
            $vars['lead_source_steps'] = $this->um->getLeadSourceStepByFranchisorId('AND ls.franchisor_id='.$user_session_data->franchisor_id,'R');

            $vars['lead_source_chart'] = $this->um->getLeadSourceCharteByFranchisorId('AND ls.franchisor_id='.$user_session_data->franchisor_id,'R');
        }

        echo $this->load->view('dashboard_year_chart',$vars ,true);
    }

    function getMonthChart(){
        checkLoginSession();
        $user_session_data = getUserSession();
        $year = $this->input->post('year');
        $vars['year'] = $year; 
        if(!empty($year) && !empty($user_session_data->franchisor_id)){
            $vars['lead_source_chart'] = $this->um->getLeadSourceCharteByFranchisorId('AND ls.franchisor_id='.$user_session_data->franchisor_id.' AND fl.created_on LIKE "'.$year.'%"','R');
        }

        echo $this->load->view('dashboard_month_chart',$vars ,true);
    }

    function getWeekChart(){
        checkLoginSession();
        $user_session_data = getUserSession();
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $vars['year'] = $year; 
        $vars['month'] = $month; 
        if(!empty($year) && !empty($month) && !empty($user_session_data->franchisor_id)){
            $vars['lead_source_chart'] = $this->um->getLeadSourceCharteByFranchisorId('AND ls.franchisor_id='.$user_session_data->franchisor_id.' AND fl.created_on LIKE "'.$year.'-'.$month.'%"','R');
        }

        echo $this->load->view('dashboard_week_chart',$vars ,true);
    }
    
    
    function logoutUser() 
    {
        logoutUser();
    }
    function staticPage(){ 
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = 'Static List';
        $vars['content_view'] = 'static_list';
        $this->load->view('inner_layout',$vars);
    }
    function addStatic(){
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = 'Add Static';
        $vars['content_view'] = 'add_edit_static';
        $this->load->view('inner_layout',$vars);
    }
	function contactVerification($data = '',$redirect_url='') {
        $decode = base64_decode($data);
        $getData = explode("|", $decode);
      	$contactid = $getData[2];
        $userid = $getData[3];
		$emailid = $getData[4];
       // $resultdata = $this->um->getUserByUserIdAndEmail($userid);
        $resultdata = $this->cm->checkContatctByContactIdUserIdEmailId($contactid,$userid,$emailid);
        if ($resultdata){
            $active_array = array('status' => 1);
			$condition = array('user_id' => $userid);
            $this->um->editUser($active_array, $condition, 'user');
			
			$vars['msg'] = "Your Account is successfully verified.";
			if($redirect_url!='')
			{
				redirect(base64_decode($redirect_url));
			}
        } else {
            echo "INVALID URL";
        }
    }
	function setUserpassword($data = ''){
		
		$decode = base64_decode($data);
        $getData = explode("|", $decode);
      	$contactid = $getData[2];
        $userid = $getData[3];
		$emailid = $getData[4];
		$resultdata = $this->cm->checkContatctByContactIdUserIdEmailId($contactid,$userid,$emailid);
		if(empty($resultdata)){ echo "INVALID URL"; die;  }
		if (!empty($this->input->post('set_password_btn'))) { 
            if($this->validation_password()) {
					$password = md5($this->input->post('password'));
					$editUser;
					$updateArray = array('password'=>$password, 'status'=>'1');
					$this->um->editUser($updateArray, array('user_id'=>$userid), 'user');
					if(!empty($resultdata->franchisor_id)){
                        $user_info = $this->um->getUserByUsernameAndPassword($resultdata->user_name, $this->input->post('password'));
                        if ($user_info && empty($user_info->franchise_id)){
                            setSession($user_info);
                            redirect(base_url('insert_master_entities'));    
                        }else{
							redirect(base_url());
						}
                    }else{
                        redirect('user/');
                    }
            }
        }
			$vars['title'] = 'FBM Distribution';
            $vars['meta_description'] = '';
            $vars['meta_keywords'] = '';
			$vars['setpassword'] = '1';
			$vars['heading'] = 'Set Password';
            $vars['content_view'] = 'login';
            $this->load->view('login_layout',$vars);
	}
	function validation_password(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');	
		return $this->form_validation->run();
	}
	function manageAllUsers(){
		checkLoginSession();
		$user_session_data = getUserSession();
		if($user_session_data->is_super_admin == '1'){
        
        /* ==== Load View ====*/
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = 'System User List (Global)';
        $vars['content_view']       = 'user_list';
        $this->load->view('list_layout',$vars);
		}else{
			redirect('user');
		}
	}
	function getAllUsers(){
		$where = '';
		$user_session_data = getUserSession();
		$all_userList = $this->um->getAllUsersList();
        if(!empty($all_userList)){
            $returnArr = array();
            $i=0;
            $task = getUserTask();
            $editAllowed = false;
            foreach($all_userList as $AUL){
 				 if(in_array('edit_user_details',$task)){ 
                   $edit ='<li><a href="#" onclick="showAjaxModel(\'User Management\',\'user/addEditUser\','.$AUL->user_id.');">Edit</a></li>';
           		 }
				 $login = '';
				 if($AUL->status == '1'){
				 $login = '<li><a target="_blank" href="'.base_url().'user/loginByAdmin/'.$AUL->user_id.'">Login as this user</a></li>';
				 }
                if($AUL->status == '1'){
                    $status = '<a href="#" onclick="updateStatusBox('.$AUL->user_id.','.$AUL->status.',\''.ucfirst($AUL->user_name).'\',\'user/updateStatus\')">Deactivate</a>';
                }else{
                    $status = '<a href="#" onclick="updateStatusBox('.$AUL->user_id.','.$AUL->status.',\''.ucfirst($AUL->user_name).'\',\'user/updateStatus\')">Activate</a>';
                }
                $returnArr[$i][] = '<div class="ckbox ckbox-primary"><input id="checkbox-item-'.$AUL->user_id.'" type="checkbox" name="select_all" value="'.$AUL->user_id.'" class="display-hide"><label for="checkbox-item-'.$AUL->user_id.'"></label></div>';
				$returnArr[$i][] = ucfirst($AUL->user_name);
				$returnArr[$i][] = ucfirst($AUL->brand_name);
				$returnArr[$i][] = ucfirst($AUL->role_title);
                $returnArr[$i][] = $AUL->email;
                $returnArr[$i][] = $AUL->address;
				$returnArr[$i][] = '<div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                '.$edit.'
                                <li role="separator" class="divider"></li>
                                <li>'.$status.'</li>
								<li>'.$login.'</li>
                                </ul>
                                </div>';            
                $i++;
            }
            echo json_encode(array('data'=>$returnArr));
        }else{
            echo json_encode(array('data'=>''));
        }
	}
	function addEditUser($user_id='', $customWidth='')
    {
        /*
        checkLoginSession();
        $user_session_data = getUserSession();        
        $user_role = getUserRole();

        $head = 'Add ';

        $vars['title'] = 'FBM Distribution';
        $vars['meta_description'] = '';
        $vars['meta_keywords'] = '';
        $vars['heading'] = $head;
        $vars['content_view'] = 'add_edit_user';
        $this->load->view('list_layout',$vars);
        */

		checkLoginSession();
        $error='';
        $user_session_data = getUserSession();
        //echo "<pre>";print_r($user_session_data);die();
        $user_data=array();
        if(!empty($user_session_data)){
            $head = 'Add';
            if(!empty($user_id)){
                $head = 'Edit';
                //$company_data =$this->rpm->getCompanyDataById($user_id);
                //echo "<pre>";print_r($user_data);die();
            }
            $returnArr['status'] = '100';
            $actionType = $this->input->post('actionType');
            if($actionType == 'save'){

                /*echo "<pre>";print_r($_POST);
                echo "<pre>";print_r($_FILES);die();*/
                /*
                if($this->validation_company()){
                    if (!empty($_FILES['profile_picture']['name'])){
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_width'] = '*';
                        $config['max_height'] = '*';
                        $config['upload_path'] = $this->config->item('company_profile_pic_path');
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('profile_picture')) {
                            @unlink($this->config->item('company_profile_pic_path').$company_data['profile_picture']);
                            $upload_data = $this->upload->data();
                            $file_name = $upload_data['file_name'];
                            $dataArr['profile_picture'] = $file_name;
                        } else {
                            $error = 1;
                            $vars['error_profile_picture'] = $this->upload->display_errors();
                        }
                    }

                    $dataArr['name']     = trim($this->input->post('name'));
                    $dataArr['email']    = trim($this->input->post('email'));
                    $dataArr['mobile']   = trim($this->input->post('mobile'));
                    $dataArr['contact1'] = trim($this->input->post('contact1'));
                    $dataArr['contact2'] = trim($this->input->post('contact2'));
                    $dataArr['address1'] = trim($this->input->post('address1'));
                    $dataArr['address2'] = trim($this->input->post('address2'));
                    $dataArr['state']    = trim($this->input->post('state'));
                    $dataArr['city']     = trim($this->input->post('city'));
                    $dataArr['zipcode']  = trim($this->input->post('zipcode'));
                    //echo "<pre>";print_r($dataArr);die();
                    
                    if($error==''){
                        if(isset($company_id) && !empty($company_id)){
                            $dataArr['updated_date']=date('Y-m-d H:i:s');
                            //echo "<pre>";print_r($dataArr);die();
                            $this->rpm->editCompany($dataArr, $company_id);
                            $this->session->set_flashdata('succMsg', 'Company Data Updated Successfully.');
                            $returnArr['status'] = '101';
                        }else{
                            $dataArr['created_by']=1;
                            $dataArr['created_date']=date('Y-m-d H:i:s');
                            $this->rpm->addCompany($dataArr);
                            $this->session->set_flashdata('succMsg', 'Company Data Added Successfully.');
                            $returnArr['status'] = '102';
                        }
                    }    
                }
                */
            }
            $vars['dataArr']= !empty($user_data) ? $user_data : $this->input->post();
            //echo "<pre>";print_r($vars['dataArr']);die();
            $data = $this->load->view('add_edit_return_product',$vars,true);
            $returnArr['data'] = $data;
            $returnArr['customWidth'] = $customWidth.'%';
            $returnArr[''] = '102';
        }else{
            $returnArr['status'] = '103';
            $returnArr['data'] = "Please login!";
        }
        echo json_encode($returnArr);
        
	}
	function setUserValidation(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('main_phone', 'Main Phone', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|matches[password]');  
        
        return $this->form_validation->run();
	}
	function updateStatus(){ 
		$user_id=trim($_POST['id']);
        $status=trim($_POST['status']);
        $status = ($status == 1) ? 0 : 1;
        $dataArr = array('status' => $status);
        $condition = array('user_id' => $user_id);
        $this->um->editUser($dataArr, $condition, 'user');
        $this->session->set_flashdata('succMsg','Status has been Changed Successfully');
        echo json_encode(true);
	}
	function loginByAdmin($user_id){
		if(!empty($user_id) && $user_id > 0){
		$user_info = $this->um->getUserByuserId($user_id);
            if ($user_info){
                $rememberme = $this->input->post('rememberme');
                if(isset($rememberme) && $rememberme == 'on'){
                    $cookie= array(
                        'name'   => 'user_id',
                        'value'  => $user_info->user_id,
                        'expire' => 86500 * 30,
                    );
                    $this->input->set_cookie($cookie);
                }else{
                    delete_cookie('user_id');
                }
                setSession($user_info);
            }
			redirect('user');
		  }
    }
	function editProfile(){	
            checkLoginSession();
            $where = '';
            $user_session_data = getUserSession();
            //echo "<pre>";print_r($user_session_data);die();
            $userDataById=(object)array();
            if (isset($user_session_data->contact_id) && !empty($user_session_data->contact_id)){
                $head = 'Edit';
                $userDataById =  $this->um->getUserDataByContactId($user_session_data->contact_id);
            }
            if(!empty($this->input->post())){
                $error = '';
                if ($this->validation_user()){
                    if (!empty($_FILES['logo']['name'])){
                        $this->load->library('upload');
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_width'] = '*';
                        $config['max_height'] = '*';
                        $config['upload_path'] = $this->config->item('contact_photo_path');
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('logo')){
                            $upload_data = $this->upload->data();
                            $franchisorLogo_image = $upload_data['file_name'];
                            $update_arr['profile_picture'] = $franchisorLogo_image;
                            @unlink($this->config->item('contact_photo_path').$userDataById->profile_picture);
                        }else{
                            $error = 1;
                            $vars['error_logo_image'] = $this->upload->display_errors();
                        }
                    }
                    if ($error == ''){
                        if (isset($user_session_data->contact_id) && !empty($user_session_data->contact_id)){
                            $update_user_arr['user_name'] = trim($this->input->post('user_name'));
                            if($this->input->post('password')){
                                $update_user_arr['password'] = md5($this->input->post('password'));
                            }

                            $update_arr['user_type'] = trim($this->input->post('user_type'));
                            $update_arr['job_tittle'] = trim($this->input->post('job_tittle'));
                            $update_arr['first_name'] = trim($this->input->post('first_name'));
                            $update_arr['middle_name'] = trim($this->input->post('middle_name'));
                            $update_arr['last_name'] = trim($this->input->post('last_name'));
                            $update_arr['timezone'] = trim($this->input->post('timzone'));
                            $update_arr['country_id'] = trim($this->input->post('country_id'));
                            $update_arr['state_id'] = trim($this->input->post('state_id'));
                            $update_arr['city_id'] = trim($this->input->post('city_id'));
                            $update_arr['zipcode_id'] = trim($this->input->post('zipcode_id'));
                            $update_arr['birthday'] = getFormatedDate($this->input->post('birthday'));
                            $update_arr['business_phone'] = trim($this->input->post('business_phone'));
                            $update_arr['mobile'] = trim($this->input->post('mobile'));
                            $update_arr['home_phone'] = trim($this->input->post('home_phone'));
                            $update_arr['main_phone'] = trim($this->input->post('main_phone'));
                            $update_arr['fax'] = trim($this->input->post('fax')); 
                            $update_arr['email'] = trim($this->input->post('email'));
                            $update_arr['website'] = trim($this->input->post('website'));
                            $update_arr['linkedin'] = trim($this->input->post('linkedin'));
                            $update_arr['facebook'] = trim($this->input->post('facebook'));
                            $update_arr['address'] = trim($this->input->post('address'));
                            $update_arr['address2'] = trim($this->input->post('address2'));
                            $update_arr['description'] = trim($this->input->post('description'));

                            $this->um->editUser($update_user_arr, array('user_id'=>trim($this->input->post('user_id'))), 'user');

                            $this->cm->editContact($update_arr,$user_session_data->franchisor_id,$user_session_data->contact_id);
                            $session_data=$this->cm->getContatctDataByContactId($user_session_data->contact_id);
                            //echo "<pre>";print_r($session_data);die();
                            setUserSession($session_data);
                            $this->session->set_flashdata('succMsg', 'Profile Updated Successfully.');
                        }
                    }
                }
            }
            $vars['roleData'] = $this->um->getAllRoleByGroup(($user_session_data->fd_company_id!='') ? 'FDCOMPANY': 'FRANCHISOR');
            $vars['dataArr'] = ($this->input->post()) ? $this->input->post() : get_object_vars($userDataById);
            $vars['country_list'] = $this->cnm->getAllCountry(' AND status = 1','R');
            $vars['title']              = 'FBM Distribution';
            $vars['user_id']            = $user_session_data->user_id;
            $vars['user_signature']     = $user_session_data->user_signature;
            $vars['meta_description']   = '';
            $vars['meta_keywords']      = '';
            $vars['heading']            = $head.' Profile';
            $vars['content_view'] = 'edit_profile';
            $this->load->view('inner_layout', $vars);
	}
	function validation_user(){
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Personal Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('main_phone', 'Phone', 'trim|required'); 
		$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|matches[c_password]');
		$this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|matches[password]');
                $this->form_validation->set_rules('timzone', 'Timezone', 'trim|required');
		$this->form_validation->set_error_delimiters('<p class="error" style="display: inline;">', '</span>');
        return $this->form_validation->run();
	}
    function signatureAndSmtp(){
        checkLoginSession();
        $user_session_data = getUserSession();
        $userDataById = (object)array();
        $userDataById = $this->um->getUserDataById($user_session_data->user_id);
        $chk = 1;
        //echo "<pre>";print_r($userDataById);die();
        //if($this->validation_user_credentials()){
        if(!empty($this->input->post()))
        { 
            $system_smtp_host = trim($this->input->post('smtp_host'));

            $update_arr['user_signature'] = trim($this->input->post('user_signature'));
            $update_arr['smtp_host'] = $system_smtp_host;
            $update_arr['smtp_user'] = trim($this->input->post('smtp_user'));
            $update_arr['smtp_password'] = trim($this->input->post('smtp_password'));
            $update_arr['smtp_port'] = trim($this->input->post('smtp_port'));
            $update_arr['from_name'] = trim($this->input->post('from_name'));
            $update_arr['from_email'] = trim($this->input->post('from_email'));
            
            $arr['imap_host'] = trim($this->input->post('imap_host'));
            $arr['imap_port'] = trim($this->input->post('imap_port'));
            $arr['imap_user'] = trim($this->input->post('imap_user'));
            $arr['imap_password'] = trim($this->input->post('imap_password'));

            if($system_smtp_host != '')
            {
                $system_smtp_host = checkPrefixForHost($system_smtp_host);

                $email_config = Array(
                'protocol' => 'smtp',
                'smtp_host' => trim($this->input->post('smtp_host')),
                'smtp_port' => trim($this->input->post('smtp_port')),
                'smtp_user' => trim($this->input->post('smtp_user')),
                'smtp_pass' => trim($this->input->post('smtp_password')),
                'mailtype' => 'html',
                'starttls' => true,
                'newline' => "\r\n");
                $this->load->library('email', $email_config);
                $body = 'This is FS connection test message';
                $this->email->from($this->config->item('system_dummy_email'));
                $this->email->to($this->config->item('system_dummy_email'));
                $this->email->subject('Connection test');
                $this->email->message($body);
                $result='';
                if (!$this->email->send($body))
                {
                    $chk=0;
                   //$result = $this->email->print_debugger();
                   //$result = 'SMTP connection Unsuccessful.';
                    $this->session->set_flashdata('failMsg', 'Please Enter Valid SMTP Details!');
                    redirect('user/signatureAndSmtp/');
                }
                else 
                {
                    $chk=1;
                    //$this->session->set_flashdata('succMsg', 'User credentials Updated Successfully.');
                }
            }

                    //$result = 'SMTP connection successful.';
            $system_imap_host = trim($this->input->post('imap_host'));
            if($system_imap_host != '')
            {
                $system_imap_port = trim($this->input->post('imap_port'));
                $system_imap_user = trim($this->input->post('imap_user'));
                $system_imap_pass = trim($this->input->post('imap_password'));  
                
                $hostname = '{'.$system_imap_host.':'.$system_imap_port.'/ssl/novalidate-cert}INBOX';
                $username = $system_imap_user;
                $password = $system_imap_pass;

                $inbox = imap_open($hostname,$username,$password);
                
                if($inbox)
                {
                    $chk=1;
                    //$this->session->set_flashdata('succMsg', 'User credentials Updated Successfully.');
                }
                else
                {
                    $chk=0;
                    $this->session->set_flashdata('failMsg', 'Please Enter Valid IMAP Details!'); 
                    redirect('user/signatureAndSmtp/');
                }
            }
            
            $this->cm->editContact($arr,$user_session_data->franchisor_id,$user_session_data->contact_id);   
            $condition = array('user_id' => $user_session_data->user_id);
            $this->um->editUser($update_arr,$condition,'user');
            if($chk == 1)
            {  
                $this->session->set_flashdata('succMsg', 'User credentials Updated Successfully.');          
            }
            redirect('user/signatureAndSmtp/');
        }

        $vars['dataArr'] = ($this->input->post()) ? $this->input->post() : get_object_vars($userDataById);
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = $head.'User Email Signature';
        $vars['content_view'] = 'user_edit_email_signature';
        $this->load->view('inner_layout', $vars);
    }

    function validation_user_credentials(){
        $this->form_validation->set_rules('user_signature', 'User Email Signature', 'trim|required');
        $this->form_validation->set_rules('smtp_host','SMTP Host', 'trim|required');
        $this->form_validation->set_rules('smtp_user','SMTP User', 'trim|required');
        $this->form_validation->set_rules('smtp_password','SMTP Password', 'trim|required');
        $this->form_validation->set_rules('smtp_port','SMTP Port','trim|required');
        $this->form_validation->set_rules('from_name','Name From', 'trim|required');
        $this->form_validation->set_rules('from_email','Name Email','trim|required|valid_email');
        $this->form_validation->set_error_delimiters('<p class="error">','</p>');
        return $this->form_validation->run();
    }

    function test(){
        //ConvertDate($original_datetime, $target_timezone = 'Europe/London', $original_timezone='Europe/London');
        
        //$original_datetime = '2016-08-27 04:31 AM';
        $original_datetime = '2016-09-05 05:40:58';
        $original_timezone = new DateTimeZone('UTC');

        // Instantiate the DateTime object, setting it's date, time and time zone.
        $datetime = new DateTime($original_datetime, $original_timezone);

        // Set the DateTime object's time zone to convert the time appropriately.
        $target_timezone = new DateTimeZone('Asia/Kolkata');
        $datetime->setTimeZone($target_timezone);

        // Outputs a date/time string based on the time zone you've set on the object.
        $triggerOn = $datetime->format('Y-m-d H:i:s');

        // Print the date/time string.
        print $triggerOn; // 2013-04-01 08:08:00 */
    }
    function getLogActivity(){
        $user_session_data = getUserSession();
        $user_role = getUserRole();
        $cur_page = $this->input->post('page');
        $perPage = 5;
        $offset = ($cur_page * $perPage) - $perPage;
        //echo '11'; die;
        if($user_session_data->franchisor_id!='')
        {
            if($user_session_data->franchisor_id!='' && (in_array('FSU',$user_role) || in_array('FASU',$user_role)))
            {
                $leadActivity = $this->lm->getAllLeadActivityByFranchisorUser($user_session_data->franchisor_id,$user_session_data->contact_id, 'R',$offset, $perPage );
                $leadActivity_count = $this->lm->getAllLeadActivityByFranchisorUser($user_session_data->franchisor_id,$user_session_data->contact_id);
            }
            else
            {
                $leadActivity = $this->lm->getAllLeadActivitytByFranchisorAdmin($user_session_data->franchisor_id, 'R',$offset, $perPage);
                $leadActivity_count = $this->lm->getAllLeadActivitytByFranchisorAdmin($user_session_data->franchisor_id);
            }
        }
        else if($user_session_data->fd_company_id!='')
        {
            $franchisor_id = $this->input->post('franchisor_id');
            if(in_array('FDCOMPANYWEBUSER',$user_role))
            {
                $leadActivity = $this->lm->getAllLeadActivityByFDCompanyUser($user_session_data->fd_company_id,$user_session_data->contact_id, 'R',$offset, $perPage,' AND fl.franchisor_id = ' . $franchisor_id);
                $leadActivity_count = $this->lm->getAllLeadActivityByFDCompanyUser($user_session_data->fd_company_id,$user_session_data->contact_id);
            }
            else
            {
                $leadActivity = $this->lm->getAllLeadActivityByFDCompanyAdmin($user_session_data->fd_company_id, 'R',$offset, $perPage,' AND fl.franchisor_id = ' . $franchisor_id);
                $leadActivity_count = $this->lm->getAllLeadActivityByFDCompanyAdmin($user_session_data->fd_company_id);
            }
        }
        //echo '<pre>'; print_r($leadActivity); die;
        $vars['log_activity_date'] = $this->input->post('log_activity_date');
        $vars['log_activity'] = $leadActivity;
        $html = '';
        $responce_arr = array('code'=>'', 'data'=>'');
        if(isset($vars['log_activity'])){
            $vars['is_ajax'] = true;
            $filter_selected = $this->input->post('filter_selected');
            if($filter_selected!='')
            {
                $vars['filter_selected'] = explode(',',$this->input->post('filter_selected'));
            }
            $html = $this->load->view('log_activity',$vars, true);
            $responce_arr = array('code'=>100, 'data'=>$html);
        }
        echo json_encode($responce_arr);
    }
    
    function getHistoryData()
    {
        $arrayDB = array('id'=>1,'name'=>'abc','email'=>'amit.bokde@6degreesit.com','phone'=>'','mobile'=>'5432216543');
        $arrayPost = array('id'=>1,'name'=>'','email'=>'amit.bokde@6degreesit.com','mobile'=>'543','phone'=>'87654321');
        //print_r(array_diff($arrayDB,$arrayPost));
        $data = $this->um->getUpdatedValues($arrayDB,$arrayPost);
        print_r($data);
    }
    
    function sendSMS($number=NULL,$name=NULL,$message_body=NULL)
    {
            /*require_once (APPPATH."libraries/Twilio/myClass.php");
            
            $myObj = new myClass();
            $myObj->myFunction();
            */
            
            $number='+919993125001';
            $name='Amit';
            $message_body='Dev Test';
            
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
            $var = 'properties:protected';
            print_r($sms);
    }


    function userList()
    {
        checkLoginSession();
        $user_session_data = getUserSession();        
        $user_role = getUserRole();

        $vars['title'] = 'FBM Distribution';
        $vars['meta_description'] = '';
        $vars['meta_keywords'] = '';
        $vars['heading'] = 'User List';
        $vars['content_view'] = 'user';
        $this->load->view('list_layout',$vars);         
    }


}
