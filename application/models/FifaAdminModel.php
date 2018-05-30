<?php

class FifaAdminModel extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }
    
    function all_party(){
        $sql = "SELECT ID, Name FROM Party WHERE ID != 7;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function  team_save($teamName){
        $sql = "INSERT INTO Party (Name) VALUES ('$teamName'); ";
        $query = $this->db->query($sql);
        
        return $query;
    }
    
    function all_round(){
        $sql = "SELECT ID, Name FROM RoundTable;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function all_match(){
        
    }
    
    function save_match($matchName, $roundTable, $matchTime){
        $sql = "INSERT INTO Match (Name, RoundTableID, MatchTime) VALUES ('$matchName',$roundTable, '$matchTime');";
        $query = $this->db->query($sql);
        
        $sqlMatchId= " SELECT MAX(ID) as MatchId FROM Match;";
        $matchQuery = $this->db->query($sqlMatchId);
        
        $matchId = $matchQuery->result_array();
        
        return $matchId[0]['MatchId'];
    }
    
    function save_match_party($matchId, $teamId){
        $sql = "INSERT INTO MatchParty (MatchID, PartyID, Score) VALUES ($matchId, $teamId, '-1');";
        $query = $this->db->query($sql);
        
        return $query;
    }
}
?>
