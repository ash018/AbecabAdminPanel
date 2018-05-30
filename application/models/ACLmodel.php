<?php
class ACLmodel extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database('default', true);
    }
    
    public function getAllRoleName(){
        $sql = "select RoleId, RoleName from role;";
        
        $query=$this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    public function getAllUrl(){
        $sql = "select AccessUrlId, AccessUrlName from accessurl;";
        
        $query=$this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    public function getAllRolleAccess(){
        $sql = "select RoleAccessId, RoleId, AccessUrlId from roleaccess;";
        
        $query=$this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
}
?>