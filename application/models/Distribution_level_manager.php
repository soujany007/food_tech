<?php
class Distribution_level_manager extends CI_Model {
    
   function getAllDistributionLevel($where='',$opt = 'C', $perPage = '',$offset= ''){
        $limit = '';
        if($perPage != '' || $offset != ''){
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllDistributionLevel;
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

    function getDistributionLevelDataById($distribution_level_id){
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetDistributionLevelDataById,array($distribution_level_id));
        //echo $this->db->last_query();die();
        if ($query->num_rows() > 0){
            $result = $query->row_array();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function addDistributionLevel($insert_arr){
        $this->db->trans_start();
        $this->db->insert('distribution_level', $insert_arr);
        $this->db->trans_complete();
    }
    
    function editDistributionLevel($update_arr,$distribution_level_id){
        $this->db->trans_start();
        $this->db->update('distribution_level',$update_arr,array("distribution_level_id"=>$distribution_level_id));
        $this->db->trans_complete();
    }
}