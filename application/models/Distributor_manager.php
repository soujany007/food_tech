<?php
class Distributor_manager extends CI_Model {
    
    function getAllDynamicContactGroup()
    {
        $user_session_data = getUserSession();
        $user_task = getUserTask();
        $mQuery = $this->qc->queryGetAllDynamicContactGroupByFranchisorId;
        
        if(!empty($user_session_data->franchisor_id))
        {
            $where=' dcg.franchisor_id ='.$user_session_data->franchisor_id;
        }
        elseif(!empty($user_session_data->fd_company_id))
        {
            $where=' dcg.fd_company_id ='.$user_session_data->fd_company_id;
        }
        /*
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        
        $query = $this->qc->queryGetAllDynamicContactGroupByFranchisorId;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);
        if ($query->num_rows() > 0)
        {
            if($opt == 'R')
            {
                $result = $query->result();
            }
            else
            {
                $result = $query->num_rows();
            }
            
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
        */
        
        
        $aColumns = array(
            'dynamic_contact_group_id',
            'dynamic_contact_group_name',
            'created_on',
            'user_name',
            'created_by');
 
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "dynamic_contact_group_id";
        
        /* Total data set length */
        $sQuery = "SELECT COUNT('dcg." . $sIndexColumn . "') AS row_count FROM `dynamic_contact_group` AS dcg LEFT JOIN  `user` AS u ON dcg.created_by = u.user_id where ".$where." ";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;
        //num_rows
        
        
        
        /*
         * Paging
         */
        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .
                    intval($iDisplayLength);
        }
        
        $uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/%5B/", '[', $uri_string);
        $uri_string = preg_replace("/%5D/", ']', $uri_string);
        
        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }
        
        
        $index_of_columns = strpos($uri_string, "columns", 1);
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }
        
        
        /*
         * Ordering
         */
        //$sOrder = "ORDER BY ";
        $sOrder = "";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        
        if ($bSortable_ == "true") {
            $sOrder .= "ORDER BY ";
            $sOrder .= $aColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }
        
        
        /*
         * Filtering
         */
        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }
        
        /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($aColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") 
                {
                    $sWhere = "WHERE ";
                } 
                else 
                {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }
        
        
        /*
         * SQL queries
         * Get data to display
         */
        if((isset($sWhere)) && ($sWhere != ''))
        {
            $sWhere .= ' AND '.$where;        
        }
        else 
        {
            $sWhere .= ' where '.$where;        
        }
        
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . ", dcg.status FROM `dynamic_contact_group` AS dcg LEFT JOIN  `user` AS u ON dcg.created_by = u.user_id 
       $sWhere
       $sOrder
       $sLimit
        ";
        $rResult = $this->db->query($sQuery);
        
        
        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;
        
        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );
        
        //foreach ($rResult->result_array() as $aRow) {
        $row = array();
        $i=0;
        foreach ($rResult->result() as $aRow) 
        {
            $row[$i][] = '<div class="ckbox ckbox-primary"><input id="checkbox-item-'.$aRow->dynamic_contact_group_id.'" type="checkbox" name="select_all" value="'.$aRow->dynamic_contact_group_id.'" class="display-hide"><label for="checkbox-item-'.$aRow->dynamic_contact_group_id.'"></label></div>';
            $row[$i][] = $aRow->dynamic_contact_group_name;
            $row[$i][] = $aRow->created_on;
            $row[$i][] = $aRow->user_name;
            
            
            if($aRow->status == 1)
            {
                $status = '<a href="#" onclick="updateStatusBox('.$aRow->dynamic_contact_group_id.','.$aRow->status.',\''.ucfirst($aRow->dynamic_contact_group_name).'\',\'dynamic_contact_group/updateStatus\')">Deactivate</a>';
            }
            else
            {
                $status = '<a href="#" onclick="updateStatusBox('.$aRow->dynamic_contact_group_id.','.$aRow->status.',\''.ucfirst($aRow->dynamic_contact_group_name).'\',\'dynamic_contact_group/updateStatus\')">Activate</a>';
            }
            
            if((in_array('add_dynamic_contact_group',$user_task)))
            {
                    $edit = '<a href="#" onclick="showAjaxModel(\'Edit Dynamic Contact Group\',\'dynamic_contact_group/addEditDynamicContactGroup\','.$aRow->dynamic_contact_group_id.');" >Edit</a>';
                    
            }
            
            $view_lists = '<a href="'.base_url().'dynamic_contact_group/showDynamicContactGroupUserLists/'.base64_encode($aRow->dynamic_contact_group_id).'">Group User List</a>';
            
            $row[$i][] = '<div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                <li>'.$edit.'</li>
                                <li role="separator" class="divider"></li>
                                <li>'.$status.'</li>
                                <li role="separator" class="divider"></li>
                                <li>'.$view_lists.'</li>
                                </ul>
                                </div>';
            $i++;
            
        }
        $output['data'] = $row;
        return $output;
        
        
        
        
    }
    
    function addDynamicContactGroup($dynamic_contact_group_arr, $settings_arr, $cnt)
    {
        $this->db->trans_start();
        $this->db->insert('dynamic_contact_group', $dynamic_contact_group_arr);
        //echo $this->db->last_query();        
        $inserted_dynamic_contact_group_id = $this->db->insert_id();
        
        $suss = '';
        if($cnt > 0)
        {
            for($i=0; $i<$cnt; $i++)
            {
                if(!empty($settings_arr[$i]))
                {
                    $settings_arr[$i]['dynamic_contact_group_id'] = $inserted_dynamic_contact_group_id;
                    $this->db->insert('dynamic_contact_group_settings', $settings_arr[$i]);
                    $inserted_dcgs_id = $this->db->insert_id();
                    
                    if($inserted_dcgs_id > 0)
                    {
                        $suss++;
                    }
                }
            }
            $this->db->trans_complete();
        }
        if($suss == $cnt)
        {
            return $inserted_dynamic_contact_group_id;
        }
        else 
        {
            return 0;
        }
    }
    
    function editDynamicContactGroupStatus($update_arr,$dynamic_contact_group_id){
        $this->db->trans_start();
        $this->db->update('dynamic_contact_group',$update_arr,array("dynamic_contact_group_id"=>$dynamic_contact_group_id));
        $this->db->trans_complete();
    }

    function editDynamicContactGroup($update_dcg_arr, $dynamic_contact_group_id, $settings_arr, $cnt, $updt_cnt, $dcgs_id_arr, $where)
    {
        $this->db->trans_start();
        $this->db->update('dynamic_contact_group',$update_dcg_arr,array("dynamic_contact_group_id"=>$dynamic_contact_group_id));

        if(!empty($where))
        {
            $this->db->trans_start();
            $this->db->where($where);
            $this->db->delete('dynamic_contact_group_settings');
            $this->db->trans_complete();
        }

        $suss = '';
        if($cnt > 0)
        {
            for($i=0; $i<$cnt; $i++)
            {
                if($i < $updt_cnt)
                {
                   $this->db->update('dynamic_contact_group_settings',$settings_arr[$i],array("dynamic_contact_group_settings_id"=>$dcgs_id_arr[$i])); 
                }
                else 
                {
                    $settings_arr[$i]['dynamic_contact_group_id'] = $dynamic_contact_group_id;
                    $this->db->insert('dynamic_contact_group_settings', $settings_arr[$i]);
                    $inserted_dcgs_id = $this->db->insert_id();
                    
                    if($inserted_dcgs_id > 0)
                    {
                        $suss++;
                    }
                }
            }
            $this->db->trans_complete();
        }

        return $suss;
    }
    
    function getDynamicContactGroupDataById($dynamic_contact_group_id)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetDynamicContactGroupDataById,array($dynamic_contact_group_id));
        if ($query->num_rows() > 0)
        {
            $result = $query->row();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getSettingsDataByDynamicContactGroupId($dynamic_contact_group_id)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetSettingsDataByDynamicContactGroupId,array($dynamic_contact_group_id));
        //echo $this->db->last_query();
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllContactDataByDynamicContactGroupSettings($where='',$opt = 'C', $perPage = '',$offset= '', $type)
    {
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        if($type == 'franchisor_id')
        {
            $query = $this->qc->queryGetAllContactDataByDynamicContactGroupSettings;
        }
        elseif($type == 'fd_company_id')
        {
            $query = $this->qc->queryGetAllFDCompanyContactDataByDynamicContactGroupSettings;
        }
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);
        //echo $rs = $this->db->last_query();

        if ($query->num_rows() > 0)
        {
            if($opt == 'R')
            {
                $result = $query->result();
            }
            else
            {
                $result = $query->num_rows();
            }
            
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }


    function getAllCities()
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllCities);
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllState()
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllStates);
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllZipcode()
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllZicode);
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllCountry()
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllCountry);
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllTerritory()
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllTerritories);
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllRegionByFranchisorId($franchisor_id)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllRegions,(array($franchisor_id)));
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllFDCompanyByFranchisorId($where='', $perPage = '',$offset= '')
    {
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllFDCompanyByFranchisorID;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);

        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllOpportunityTypeByFranchisorId($where='', $perPage = '',$offset= '')
    {
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllOpportunityTypeList;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);

        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllLeadStatusByFranchisorId($franchisor_id)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetAllLeadStatusByFranchisorID,(array($franchisor_id)));
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllLeadSourceByFranchisorId($franchisor_id)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetLeadSourceDataByFranchisorID,(array($franchisor_id)));
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllLeadSourceCategoryByFranchisorId($where='', $perPage = '',$offset= '')
    {
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllLeadSourceCategoryByFranchisorID;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);

        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllLeadWorkflowStepsByFranchisorId($where='', $perPage = '',$offset= '')
    {
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllLeadWorkflowStepsByFranchisorId;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllOpportunityWorkflowStepsByFranchisorId($where='', $perPage = '',$offset= '')
    {
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllOpportunityWorkflowStepsByFranchisorId;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);
        
        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getAllBrokerContactsByFranchisorId($where='', $perPage = '',$offset= '')
    {
        $limit = '';
        if($perPage != '' || $offset != '')
        {
            $limit = " LIMIT $offset, $perPage";
        }
        $query = $this->qc->queryGetAllBrokerContactsByFranchisorId;
        $query = str_replace(array('##WHERE##','##LIMIT##'),array($where, $limit),$query);
        $this->db->trans_start();
        $query = $this->db->query($query);

        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getCityBySearchCity($city)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetCityBySearchCity,array($city));
        //echo $this->db->last_query();
        
        if ($query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getStateBySearchState($state)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetStateBySearchState,array($state));
        //echo $this->db->last_query();
        
        if ($query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getZipcodeBySearchZipcode($zipcode)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetZipcodeBySearchZipcode,array($zipcode));
        //echo $this->db->last_query();
        
        if ($query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }

    function getCountryBySearchCountry($country)
    {
        $this->db->trans_start();
        $query = $this->db->query($this->qc->queryGetCountryBySearchCountry,array($country));
        //echo $this->db->last_query();
        
        if ($query->num_rows() > 0){
            $result = $query->result();
            $this->db->trans_complete();
            return $result;
        }
        $this->db->trans_complete();
    }


    
    
}