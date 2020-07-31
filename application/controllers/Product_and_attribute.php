<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_and_attribute extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->qc = $this->queryconstant;

        //$this->load->model('Dynamic_contact_group_manager');
        //$this->dcgm = $this->Dynamic_contact_group_manager;
    }
    
    function index(){
        checkLoginSession();

        $user_session_data = getUserSession();
        $user_task = getUserTask();

        /* ==== Load View ====*/
        $vars['title']              = 'FBM Distribution';
        $vars['meta_description']   = '';
        $vars['meta_keywords']      = '';
        $vars['heading']            = 'Product And Product Attribute List';
        $vars['content_view']       = 'product_and_attribute';
        $this->load->view('list_layout',$vars);
    }
    
    
}