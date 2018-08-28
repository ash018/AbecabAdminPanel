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
    function all_Winner(){
        $sql = "SELECT * FROM WinnerInfo;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function  team_save($teamName){
        $sql = "INSERT INTO Party (Name) VALUES ('$teamName'); ";
        $query = $this->db->query($sql);

        return $query;
    }

    function winner_save($winnerName,$winnerSpeciality,$winnerDistrict,$QuizTime,$winnerImage){
      $QuizTime = $QuizTime.' 00:00:00';


      $sql = "INSERT INTO WinnerInfo (QuizTime,WinnerName,Speciality,District,WinnerImage) VALUES ('$QuizTime','$winnerName','$winnerSpeciality','$winnerDistrict','$winnerImage')";
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

    function checkWinnerId($winnerId) {

        $sql = "SELECT * FROM WinnerInfo where ID = '$winnerId';";
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
        $sql = "SELECT ID, MatchID, PartyID FROM MatchParty WHERE MatchID = $matchId;";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    function updateMatch($matchId, $matchName, $roundId, $matchTime){
        $sql = "UPDATE Match SET Name = '$matchName' , RoundTableID = $roundId, MatchTime = '$matchTime' WHERE ID = $matchId;";
        $query = $this->db->query($sql);
        return $query;
    }

    function updateWinnerInfo($winnerId,$winnerName,$winnerSpeciality,$winnerDistrict,$winnerQuizTime,$winnerImage){
      $sql = "UPDATE WinnerInfo SET WinnerName='$winnerName',QuizTime = '$winnerQuizTime', Speciality='$winnerSpeciality', District='$winnerDistrict',WinnerImage='$winnerImage' WHERE ID = '$winnerId'";
      $query = $this->db->query($sql);
      return $query;
    }
    
    function deleteWinnerInfo($winnerId){
      $sql = "DELETE FROM WinnerInfo WHERE ID = '$winnerId'";
      $query = $this->db->query($sql);
      return $query;
    }

    function updateMatchParty($matchId, $matchTeamIdA, $matchTeamIdB, $partyIdA, $partyIdB){
        /*$sqlDel = " DELETE FROM MatchParty WHERE MatchID = $matchId;";
        $delQuery = $this->db->query($sqlDel);
        if($delQuery){
          $sqlIdA = " INSERT INTO MatchParty (MatchID, PartyID, Score) VALUES($matchId, $partyIdA, '-1');" ;
          $queryA = $this->db->query($sqlIdA);
          if($queryA){
            $sqlIdB = " INSERT INTO MatchParty (MatchID, PartyID, Score) VALUES($matchId, $partyIdB, '-1');" ;
            $queryB = $this->db->query($sqlIdB);
            return $queryB;
          }
          else{
              return false;
          }

        }
        else { return false;}*/

        $sqlA = "UPDATE MatchParty SET PartyID = $partyIdA WHERE ID = $matchTeamIdA;";
        $queryB = $this->db->query($sqlA);
        $sqlB = "UPDATE MatchParty SET PartyID = $partyIdB WHERE ID = $matchTeamIdB;";
        $queryB = $this->db->query($sqlB);

        if($queryB && $queryB){
           return true;
        }
        else {
            return false;
        }

    }

    function editScoure($matchId){
        $sql = "SELECT a.ID as MPId, a.PartyID as PartyId, a.Score as MPScore, b.Name as PartyName FROM MatchParty a, Party b WHERE a.MatchID = '$matchId' and b.ID = a.PartyID;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function updateScoreInMatchnMP($matchId, $mpIdA, $mpIdB, $teamScoreA, $teamScoreB, $partyIdA, $partyIdB){
        $updateSqlA = "UPDATE MatchParty SET Score = $teamScoreA WHERE ID = $mpIdA;";
        $queryA = $this->db->query($updateSqlA);
        $updateSqlB = "UPDATE MatchParty SET Score = $teamScoreB WHERE ID = $mpIdB;";
        $queryB = $this->db->query($updateSqlB);

        //echo 'A ' .$updateSqlB  . 'B '. $updateSqlA; exit();
        $matchResultUpdate = "";

        if($teamScoreA > $teamScoreB){
            $matchResultUpdate = "UPDATE Match SET MatchPartyIDWinner = '$mpIdA' WHERE ID = $matchId;";
        }
        else if($teamScoreA < $teamScoreB){
          $matchResultUpdate = "UPDATE Match SET MatchPartyIDWinner = '$mpIdB' WHERE ID = $matchId;";
        }
        else{
            $matchResultUpdate = "UPDATE Match SET MatchPartyIDWinner = 7 WHERE ID = $matchId;";
        }

        if($queryA && $queryB && $matchResultUpdate != ""){
            $result = $this->db->query($matchResultUpdate);
        }

        return $result;
    }
}
?>
