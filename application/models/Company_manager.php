<?php
class Company_manager extends CI_Model {
    
    function getAllCompanies($where='',$opt = 'C', $perPage = '',$offset= ''){
        $limit = '';
        if($perPage != '' || $offset != ''){
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllCompnies;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        //echo $query;die();
        $this->db->trans_start();
        $query = $this->db->query($query);
        //echo $this->db->last_query();die();
        if($query->num_rows() > 0){
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
     
    function addCompany($insert_arr){
        $this->db->trans_start();
        //echo "<pre>";print_r($insert_arr);die();
        $this->db->insert('company', $insert_arr);
        //echo $this->db->last_query();die();
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    function editCompany($update_arr,$company_id){
        $this->db->trans_start();
        $this->db->update('company',$update_arr,array("company_id"=>$company_id));
        $this->db->trans_complete();
    }
    
    function getCompanyDataById($company_id){
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetCompanyDataById,array($company_id));
        if ($query->num_rows() > 0){
            $result = $query->row_array();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function checkCompanyEmailUnique($email,$company_id=''){
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryCheckCompanyEmailUnique,array($email,$company_id));
        $result = 0;
        if ($query->num_rows() > 0){
            $result = $query->row();
            $result = $result->num;
        }
        $this->db->trans_complete();
        return $result;   
    }
    
    /*function getCountryNames(){
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetCountryNames,array());
        if ($query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }*/
    
}