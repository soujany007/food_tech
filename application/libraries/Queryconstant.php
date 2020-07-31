<?php
class Queryconstant {

    public $queryGetCompanyUserInfo = "SELECT c.*, u.user_id, u.user_name, u.status, u.is_super_admin, u.is_deleted, u.company_id as user_company_id, u.distributor_id as user_distributor_id, u.employee_id as user_employee_id,r.code
        FROM `company` c
        INNER JOIN user u ON c.company_id = u.company_id
        INNER JOIN user_role ur ON ur.user_id = u.user_id
        INNER JOIN role r ON r.role_id = ur.role_id
        WHERE c.`company_id` =?
        ";

    public $queryGetDistributoUserInfo="SELECT d.*, u.user_id, u.user_name, u.status, u.is_super_admin, u.is_deleted,r.code
        FROM `distributor` d
        INNER JOIN distribution_level dl ON dl.distribution_level_id = d.distribution_level_id
        INNER JOIN user u ON u.distributor_id = d.distributor_id
        INNER JOIN user_role ur ON ur.user_id = u.user_id
        INNER JOIN role r ON r.role_id = ur.role_id
        WHERE d.`distributor_id`=?";
        
    public $queryGetUserByUsernamePassword = "SELECT u.*,r.code
    FROM user u
    INNER JOIN user_role ur ON ur.user_id=u.user_id
    INNER JOIN role r ON r.role_id=ur.role_id
    WHERE u.user_name = ? AND u.password = ? AND u.status = '1' AND u.is_deleted = 0";

    public $queryGetUserRole = "SELECT GROUP_CONCAT(r.code) as user_codes
        FROM `user_role` ur
        INNER JOIN `role` r ON r.role_id=ur.role_id
        WHERE ur.`user_id` =?
        GROUP BY ur.`user_id`";

    public $queryGetUserTask = "SELECT t.task_name
        FROM `user_role` ur
        INNER JOIN role_task rt ON rt.role_id = ur.role_id
        INNER JOIN `task` t ON t.task_id = rt.task_id
        WHERE ur.`user_id` =?
        ";

    public $queryGetUserByuserId = "SELECT u.* FROM user u 
                WHERE u.user_id = ? AND u.status = '1' AND u.is_deleted = 0";

    

    public $queryGetUserByEmail = "SELECT c.*, u.user_id, u.user_name, u.status, u.is_super_admin, u.is_deleted, u.company_id as user_company_id, u.distributor_id as user_distributor_id, u.employee_id as user_employee_id
        FROM user u 
        INNER JOIN company c ON u.company_id = c.company_id
        WHERE c.email = ? AND u.status = '1' AND u.is_deleted = 0;";

    public $queryGetTemplateDataByTemplateCode = "SELECT et.* FROM `email_template` et WHERE 1 ##WHERE##";
   

    public $queryGetAllCompnies="SELECT c.*,u.user_id,u.user_name,u.password,u.status as user_status,u.is_super_admin
    ,u.is_deleted,u.company_id as user_company_id,u.distributor_id,u.employee_id
    FROM company c
    INNER JOIN user u ON u.user_id=c.created_by
    INNER JOIN user_role ur ON ur.user_id=u.user_id
    INNER JOIN role r ON r.role_id=ur.role_id
    WHERE 1 ##WHERE## ##LIMIT## ";

    public $queryGetCompanyDataById="SELECT * FROM company WHERE company_id=?";

    public $queryCheckCompanyEmailUnique="SELECT count(*) as num FROM company WHERE email =? AND company_id!= ?";

    public $queryGetCompanyUserByIdAndEmail = "SELECT u.user_name, u.is_super_admin, u.status, u.is_deleted, c.*
    FROM user u
    INNER JOIN company c ON u.company_id = c.company_id 
    WHERE u.user_id=? AND c.email=?";

    public $queryGetAllDistributionLevel="SELECT dl.*,c.name as company_name
    FROM distribution_level dl
    INNER JOIN company c ON c.company_id = dl.company_id 
    WHERE 1 ##WHERE## ##LIMIT##";

    public $queryGetDistributionLevelDataById="SELECT dl.*,c.name as company_name
    FROM distribution_level dl
    INNER JOIN company c ON c.company_id = dl.company_id 
    WHERE dl.distribution_level_id=?";

    public $queryGetAllDistributorMarket="SELECT dm.*,c.name as company_name
    FROM distributor_market dm
    INNER JOIN market m ON m.market_id = dm.market_id
    INNER JOIN distributor d ON d.distributor_id = dm.distributor_id 
    WHERE 1 ##WHERE## ##LIMIT##";

}

?>