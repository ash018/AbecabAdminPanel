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
        $sql = "SELECT a.ID as MatchID, a.Name as MatchName, a.MatchTime as MatchTime, a.MatchPartyIDWinner as WinningTeam, b.Name as RoundName FROM Match a, RoundTable b WHERE a.RoundTableID = b.ID;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
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
    
    function checkTeamId($teamId) {

        $sql = "SELECT * FROM Party where ID = '$teamId';";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    function updateTeam($teamId,$teamName){
        $sql ="UPDATE Party SET Name = '".$teamName."' WHERE ID = ".$teamId;
        $query = $this->db->query($sql);
        //$result = $query->result_array();
        return $query;
    }
    
    function editMatch($matchId){
        $sql = "SELECT ID, Name, RoundTableID, MatchTime, MatchPartyIDWinner FROM Match WHERE ID = $matchId;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function matchTeam($matchId){
        $sql = "SELECT MatchID, PartyID FROM MatchParty WHERE MatchID = $matchId;";
        $query = $this->db->query($sql);
        return $query->result_array();
        
    }
}
?>
