<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_manager');
        $this->um = $this->user_manager;

        $this->load->model('company_manager');
        $this->compm = $this->company_manager;

        $this->qc = $this->queryconstant;
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->config->load('system');
    }

    function index(){
        checkLoginSession();
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = 'Company List';
        $vars['content_view']       = 'company_list';
        $this->load->view('list_layout',$vars);
    }
    function getAllCompanies(){
        checkLoginSession();
        $edit = '';
        $where='';
        //$user_task = getUserTask();
        $user_session_data = getUserSession();
        $all_companies = $this->compm->getAllCompanies($where,'R');
        //echo "<pre>";print_r($all_companies);die();
        if(!empty($all_companies)){
            $returnArr = array();
            $i=0;
            foreach($all_companies as $row){
                if($row->status==1){
                    $status = '<a href="#" onclick="updateStatusBox('.$row->company_id.','.$row->status.',\''.ucfirst($row->name).'\',\'company/updateCompany\')">Deactivate</a>';
                }else{
                    $status = '<a href="#" onclick="updateStatusBox('.$row->company_id.','.$row->status.',\''.ucfirst($row->name).'\',\'company/updateCompany\')">Activate</a>';
                }
            //if(in_array('edit_product_service',$user_task)){
                //$edit = '<a href="#" onclick="showAjaxModel(\'Company\',\'company/addEditCompany\','.$row->company_id.');">Edit</a>';
                $edit = '<a href="#" onclick="showAjaxModel(\'Company\',\'company/addEditCompany/'.$row->company_id.'/95\');">Edit</a>';
            //}
            $path='';
            if(!empty($row->profile_picture)){
                $img_path=base_url().$this->config->item("company_profile_pic_url").$row->profile_picture;
                $path="<img src='$img_path' width=50 height=50>";
            }else{
                $path='<div class="initialChar">C</div>';
            }
            $returnArr[$i][] = '<div class="ckbox ckbox-primary"><input id="checkbox-item-'.$row->company_id.'" type="checkbox" name="select_all" value="'.$row->company_id.'" class="display-hide"><label for="checkbox-item-'.$row->company_id.'"></label></div>';
            $returnArr[$i][] = $row->name;
            $returnArr[$i][] = $row->email;
            $returnArr[$i][] = $path;
            $returnArr[$i][] = $row->mobile;
            $returnArr[$i][] = $row->contact1;
            $returnArr[$i][] = $row->contact2;
            $returnArr[$i][] = $row->address1;
            $returnArr[$i][] = $row->address2;
            /*$returnArr[$i][] = $row->state;
            $returnArr[$i][] = $row->city;
            $returnArr[$i][] = $row->zipcode;
            $returnArr[$i][] = $row->user_name;
            $returnArr[$i][] = $row->created_date;
            $returnArr[$i][] = $row->updated_date;*/
            $returnArr[$i][] = '<div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cogs"></i>
            </button>
            <ul class="dropdown-menu pull-right">
                <li>'.$edit.'</li>
                <li role="separator" class="divider"></li>
                <li>'.$status.'</li>
            </ul>
            </div>';
            $i++;
        }
            echo json_encode(array('data'=>$returnArr));
        }else{
            echo json_encode(array('data'=>''));
        }
    }

    function addEditCompany($company_id='',$customWidth=''){
        checkLoginSession();
        $error='';
        $user_session_data = getUserSession();
        //echo "<pre>";print_r($user_session_data);die();
        $id=trim($this->input->post('id'));
        $company_id =(isset($id) && !empty($id)) ? $id : $company_id ;
        $company_data=array();
        if(!empty($user_session_data)){
            //$head = 'Add';
            if(isset($company_id)){
                //$head = 'Edit';
                $company_data =$this->compm->getCompanyDataById($company_id);
                //echo "<pre>";print_r($company_data);die();
            }
            $returnArr['status'] = '100';
            $actionType = $this->input->post('actionType');
            if($actionType == 'save'){
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
                            $this->compm->editCompany($dataArr, $company_id);
                            $this->session->set_flashdata('succMsg', 'Company Data Updated Successfully.');
                            $returnArr['status'] = '101';
                        }else{

                            /**************************company table******************************/
                            $dataArr['created_by']=$user_session_data->user_id;
                            $dataArr['created_date']=date('Y-m-d H:i:s');
                            $last_inserted_company_id=$this->compm->addCompany($dataArr);
                            
                            /**************************user table******************************/
                            $non_md5_password=$this->generate_password();
                            $md5_password=md5($non_md5_password);
                            $user_dataArr['user_name']=trim($this->input->post('email'));
                            $user_dataArr['password']=$md5_password;
                            $user_dataArr['company_id']=$last_inserted_company_id;
                            $last_inserted_user_id=$this->um->addUser($user_dataArr);

                            /**************************user role table******************************/
                            $user_role_dataArr['user_id']=$last_inserted_user_id;
                            $user_role_dataArr['role_id']=2;
                            $this->um->addRoleCode($user_role_dataArr);

                            /**************************Email Password******************************/
                                $company_data =$this->compm->getCompanyDataById($last_inserted_company_id);
                                $subject = 'Password Of FBM Distribution.';
                                $message = $this->load->view('email_templates/username_and_password', null, true);
                                $message = str_replace(array("##NAME##", "##USERNAME##", "##PASSWORD##"), array($company_data['name'],$company_data['email'],$non_md5_password),$message);
                                $setdata = array($this->config->item('smtp_user'),$message,$this->config->item('admin_name'),$company_data['email']);
                                $this->um->email($setdata, $subject);

                            /**********************************************************************/
                            $this->session->set_flashdata('succMsg', 'Company Data Added Successfully.');
                            $returnArr['status'] = '102';
                        }
                    }    
                }
            }
            $vars['dataArr']= !empty($company_data) ? $company_data : $this->input->post();
            //echo "<pre>";print_r($vars['dataArr']);die();
            $data = $this->load->view('add_edit_company',$vars,true);
            $returnArr['data'] = $data;
            $returnArr['customWidth'] = $customWidth.'%';
            $returnArr[''] = '102';
        }else{
            $returnArr['status'] = '103';
            $returnArr['data'] = "Please login!";
        }
        echo json_encode($returnArr);
    }

    function validation_company(){
        $this->form_validation->set_rules('name', 'CompanyName', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_checkCompanyEmailUnique');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('contact1', 'First Contact', 'trim|required');
        $this->form_validation->set_rules('contact2', 'Second Contact', 'trim|required');
        $this->form_validation->set_rules('address1', 'First Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Second Address', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        return $this->form_validation->run();
    }

    function updateCompany(){
        $company_id=trim($_POST['id']);
        $status=trim($_POST['status']);
        $status = ($status == 1) ? 0 : 1;
        $dataArr = array('status' => $status);
        $this->compm->editCompany($dataArr,$company_id);
        $this->session->set_flashdata('succMsg','Status has been Changed Successfully');
        echo json_encode($responseArray);
    }

    function checkCompanyEmailUnique(){
        $count = $this->compm->checkCompanyEmailUnique(trim($this->input->post('email')),trim($this->input->post('id')));
        if($count != 0){
            $this->form_validation->set_message('checkCompanyEmailUnique', "Email Id Is Available.Please Try Another");
            return false;
        } else {
            return true;
        }
    }

    function generate_password($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

}
