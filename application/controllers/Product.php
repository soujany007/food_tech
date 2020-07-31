<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->qc = $this->queryconstant;

        $this->load->model('Product_manager');
        $this->rpm = $this->Product_manager;
    }
    
    function index(){
        checkLoginSession();

        $user_session_data = getUserSession();
        $user_task = getUserTask();

        /* ==== Load View ====*/
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = 'Product List';
        $vars['content_view']       = 'product';
        $this->load->view('list_layout',$vars);
    }

    function addEditProduct($product_id='', $customWidth='')
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
        $vars['content_view'] = 'add_edit_product';
        $this->load->view('list_layout',$vars);
        */
        checkLoginSession();
        $error='';
        $user_session_data = getUserSession();
        //echo "<pre>";print_r($user_session_data);die();
        $product_data=array();
        if(!empty($user_session_data)){
            $head = 'Add';
            if(!empty($product_id)){
                $head = 'Edit';
                //$company_data =$this->rpm->getCompanyDataById($product_id);
                //echo "<pre>";print_r($product_data);die();
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
            $vars['dataArr']= !empty($product_data) ? $product_data : $this->input->post();
            //echo "<pre>";print_r($vars['dataArr']);die();
            $data = $this->load->view('add_edit_product',$vars,true);
            $returnArr['data'] = $data;
            $returnArr['customWidth'] = $customWidth.'%';
            $returnArr[''] = '102';
        }else{
            $returnArr['status'] = '103';
            $returnArr['data'] = "Please login!";
        }
        echo json_encode($returnArr);
    }
    
    
}