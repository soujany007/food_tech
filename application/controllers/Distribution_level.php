<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribution_level extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->qc = $this->queryconstant;

        $this->load->model('company_manager');
        $this->compm = $this->company_manager;

        $this->load->model('Distribution_level_manager');
        $this->dlm = $this->Distribution_level_manager;
    }
    
    function index(){
        //echo "sdf";die();
        checkLoginSession();
        $user_session_data = getUserSession();
        $user_task = getUserTask();
        /* ==== Load View ====*/
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = 'Distribution Level';
        $vars['content_view']       = 'distribution_level_list';
        $this->load->view('list_layout',$vars);
    }
    
    function getAllDistributionLevel(){
        checkLoginSession();
        $edit = '';
        $user_session_data = getUserSession();
        //echo "<pre>";print_r($user_session_data);die();
        $where=' AND dl.company_id='.$user_session_data->company_id;
        $all_distribution_level = $this->dlm->getAllDistributionLevel($where,'R');
        //echo "<pre>";print_r($all_companies);die();
        if(!empty($all_distribution_level)){
            $returnArr = array();
            $i=0;
            foreach($all_distribution_level as $row){
                if($row->status==1){
                    $status = '<a href="#" onclick="updateStatusBox('.$row->distribution_level_id.','.$row->status.',\''.ucfirst($row->level_name).'\',\'distribution_level/updateDistributionLevel\')">Deactivate</a>';
                }else{
                    $status = '<a href="#" onclick="updateStatusBox('.$row->distribution_level_id.','.$row->status.',\''.ucfirst($row->level_name).'\',\'distribution_level/updateDistributionLevel\')">Activate</a>';
                }
            //if(in_array('edit_product_service',$user_task)){
                //$edit = '<a href="#" onclick="showAjaxModel(\'Company\',\'company/addEditCompany\','.$row->company_id.');">Edit</a>';
                $edit = '<a href="'.base_url().'distribution_level/addEditDistributionLevel/'.base64_encode($row->distribution_level_id).'">Edit</a>';
            //}
            $returnArr[$i][] = '<div class="ckbox ckbox-primary"><input id="checkbox-item-'.$row->distribution_level_id.'" type="checkbox" name="select_all" value="'.$row->distribution_level_id.'" class="display-hide"><label for="checkbox-item-'.$row->distribution_level_id.'"></label></div>';
            $returnArr[$i][] = $row->level_name;
            $returnArr[$i][] = $row->description;
            $returnArr[$i][] = $row->sequence;
            $returnArr[$i][] = $row->company_name;
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
        //echo "<pre>";print_r($returnArr);die();
            echo json_encode(array('data'=>$returnArr));
        }else{
            echo json_encode(array('data'=>''));
        }
    }

    function addEditDistributionLevel($distribution_level_id=''){
        checkLoginSession();
        $distribution_level_id=base64_decode($distribution_level_id);
        $user_session_data = getUserSession();
        $distribution_level_id =(isset($id) && !empty($id)) ? $id : $distribution_level_id ;
        if(!empty($user_session_data)){
            $distribution_level_data =  array();
            $head = ' Add ';
            if(!empty($distribution_level_id)){
                $head = ' Edit ';
                $distribution_level_data = $this->dlm->getDistributionLevelDataById($distribution_level_id);
                //echo "<pre>";print_r($distribution_level_data);die();
            }
            
            if($this->validation_distribution_level()){//echo "dsf";die();
                $dataArr['level_name']=trim($this->input->post('level_name'));
                $dataArr['description']=trim($this->input->post('description'));
                $dataArr['sequence']=trim($this->input->post('sequence'));
                $dataArr['company_id']=trim($this->input->post('company_id'));

                if(isset($distribution_level_id) && !empty($distribution_level_id)){
                    $dataArr['updated_date'] = date('Y-m-d H:i:s');
                    $this->dlm->editDistributionLevel($dataArr,$distribution_level_id);
                    $this->session->set_flashdata('succMsg', 'Distribution Updated Successfully.');
                }else{
                    $dataArr['created_date'] = date('Y-m-d H:i:s');
                    $dataArr['created_by'] = $user_session_data->user_id;
                    //echo "<pre>";print_r($dataArr);die();
                    $this->dlm->addDistributionLevel($dataArr);
                    $this->session->set_flashdata('succMsg', 'Distribution Added Successfully.');
                }
                redirect('distribution_level');
            }
            $vars['company_list'] = $this->compm->getAllCompanies('','R');
            $vars['dataArr']=($this->input->post())? $this->input->post('distribution_level') : $distribution_level_data;
            //echo "<pre>";print_r($vars['dataArr']);die();
            $vars['title']              = 'FBM Distribution';
            $vars['meta_description']   = '';
            $vars['meta_keywords']      = '';
            $vars['heading']            = $head.'Distribution Level';
            $vars['content_view'] = 'add_edit_distribution_level';
            $this->load->view('inner_layout', $vars);
        }
    }
    
    function validation_distribution_level(){
        $this->form_validation->set_rules('level_name', ' Level Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('sequence', 'Sequence', 'trim|required');
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
        return $this->form_validation->run();
    }
    
    function updateDistributionLevel(){
        $distribution_level_id=trim($_POST['id']);
        $status=trim($_POST['status']);
        $status = ($status == 1) ? 0 : 1;
        $dataArr = array('status' => $status);
        $this->dlm->editDistributionLevel($dataArr,$distribution_level_id);
        $this->session->set_flashdata('succMsg','Status has been Changed Successfully');
        echo json_encode(true);
    }
}    