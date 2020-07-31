<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

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
        $vars['heading']            = 'Distributor Invoice List';
        $vars['content_view']       = 'invoice';
        $this->load->view('list_layout',$vars);
    }

    function addEditInvoice()
    {
        checkLoginSession();
        $user_session_data = getUserSession();        
        $user_role = getUserRole();

        $head = 'Add ';

        $vars['title'] = 'FBM Distribution';
        $vars['meta_description'] = '';
        $vars['meta_keywords'] = '';
        $vars['heading'] = $head;
        $vars['content_view'] = 'add_edit_invoice';
        $this->load->view('list_layout',$vars);
    }
    
    
}