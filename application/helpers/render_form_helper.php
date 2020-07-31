<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	function renderFormByType($type, $layout_size = '')
	{
            
		$CI =& get_instance();
		$contact_field = $CI->config->item('contact_field');
		$data['view_type'] = $layout_size;
		$data['field_array'] = $contact_field[$type];
                $CI->load->view('render_form',$data);
	}


	function setFormValidationByType($type)
	{
		$CI =& get_instance();
		$contact_field = $CI->config->item('contact_field');
		$field_array = $contact_field[$type];
		
		if(is_array($field_array))
		foreach($field_array as $fa)
		{
			$CI->form_validation->set_rules($fa['field_name'], $fa['label'], $fa['validation']);
		}
	}

	function getAddEditArrayByType($type)
	{
            $CI =& get_instance();
            $contact_field = $CI->config->item('contact_field');
            $field_array = $contact_field[$type];

            $return_array = array();
            if(is_array($field_array))
            foreach($field_array as $fa)
            {
                $post_val = $CI->input->post($fa['field_name']);
                if($post_val!='')
                {
                        $return_array[$fa['store_table']][$fa['store_field']] = $post_val;
                }
            }

            return $return_array;
	}

	function renderCustomFieldByType($entity_type,$franchisor_id)
	{
            $CI =& get_instance();
            $CI->load->model('custom_field_manager');
            $CI->cfm = $CI->custom_field_manager;
            $data['custom_field_data'] = $CI->cfm->getAllCustomFieldByFranchisorIdEntityType($entity_type,$franchisor_id);
            $CI->load->view('render_form_custom_field',$data);
	}

	function setCustomFieldFormValidationByType($entity_type,$franchisor_id)
	{
		$CI =& get_instance();
            $CI->load->model('custom_field_manager');
            $CI->cfm = $CI->custom_field_manager;
		$field_array = $CI->cfm->getAllCustomFieldByFranchisorIdEntityType($entity_type,$franchisor_id);
		//$CI->cfm->getAllCustomFieldByFranchisorIdContactTypeId($franchisor_id,$contact_type_id);
		if(is_array($field_array))
		foreach($field_array as $fa)
		{
			$validation = ($fa->is_required==1) ? '|required' : '';
			$field_name = 'custom_field_'.$fa->custom_field_id;
			$field_name = ($fa->field_type=='checkbox') ? $field_name.'[]' : $field_name; 
			$CI->form_validation->set_rules($field_name, $fa->field_title, 'trim'.$validation);
		}
	}

	function saveCustomFieldByType($entity_type,$franchisor_id,$entity_id)
	{
		$CI =& get_instance();

		$CI->db->delete('custom_field_entity_value', array('entity_id'=>$entity_id));

        $CI->load->model('custom_field_manager');
        $CI->cfm = $CI->custom_field_manager;
		$field_array = $CI->cfm->getAllCustomFieldByFranchisorIdEntityType($entity_type,$franchisor_id);
		//$CI->cfm->getAllCustomFieldByFranchisorIdContactTypeId($franchisor_id,$contact_type_id);
		
		$add_arr = array();
		if(is_array($field_array))
		foreach($field_array as $fa)
		{ 
			$post_val = ($fa->field_type=='checkbox') ? implode(',',$CI->input->post('custom_field_'.$fa->custom_field_id)) : $CI->input->post('custom_field_'.$fa->custom_field_id);
			if($post_val!='')
			{
				$add_arr[] = array('custom_field_id'=>$fa->custom_field_id,'entity_id'=>$entity_id,'field_value'=>$post_val);
			}
		}
		
		if(count($add_arr)>0)
		{
			$CI->db->insert_batch('custom_field_entity_value', $add_arr);
		}
		return true;
	}



	function renderKpiFieldByFranchisorId($franchisor_id,$dataArr='',$fee_type='') {
            $CI =& get_instance();
            $CI->load->model('kpi_field_manager');
            $CI->kfm = $CI->kpi_field_manager;
            $data['dataArr'] = $dataArr;
            $data['kpi_field_data'] = $CI->kfm->getKpiFieldsByFranchisorId($franchisor_id,$fee_type);
            $CI->load->view('render_form_kpi_field',$data);
	}

	function setKpiFieldFormValidation($franchisor_id,$fee_type)
	{
		$CI =& get_instance();
        $CI->load->model('kpi_field_manager');
        $CI->kfm = $CI->kpi_field_manager;
		$field_array = $CI->kfm->getKpiFieldsByFranchisorId($franchisor_id,$fee_type);
		if(is_array($field_array))
		foreach($field_array as $fa)
		{
			$validation = ($fa->is_required==1) ? '|required' : '';
			$field_name = 'kpi_field_'.$fa->kpi_field_id;
			$field_name = ($fa->field_type=='checkbox') ? $field_name.'[]' : $field_name; 
			$CI->form_validation->set_rules($field_name, $fa->field_title, 'trim'.$validation);
		}
	}

	// function saveKpiField($franchisor_id)
	// {
	// 	$CI =& get_instance();

	// 	//$CI->db->delete('custom_field_entity_value', array('entity_id'=>$entity_id));

 //        $CI->load->model('kpi_field_manager');
 //        $CI->kfm = $CI->kpi_field_manager;
	// 	$field_array = $CI->kfm->getKpiFieldsByFranchisorId($franchisor_id);
	// 	$add_arr = array();
	// 	if(is_array($field_array))
	// 	foreach($field_array as $fa)
	// 	{ 
	// 		$post_val = ($fa->field_type=='checkbox') ? implode(',',$CI->input->post('kpi_field_'.$fa->custom_field_id)) : $CI->input->post('kpi_field_'.$fa->custom_field_id);
	// 		if($post_val!='')
	// 		{
	// 			$add_arr[] = array('kpi_field_id'=>$fa->kpi_field_id,'field_value'=>$post_val);
	// 		}
	// 	}
		
	// 	if(count($add_arr)>0)
	// 	{
	// 		$CI->db->insert_batch('kpi_value', $add_arr);
	// 	}
	// 	return true;
	// }



?>