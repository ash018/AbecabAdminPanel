<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Fifaadmin extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
         $this->load->model('FifaAdminModel');
   }
   
   public function index(){
        $data['header'] = 'Team List';
        $data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        $this->load->view('fifaadmin/teamList',$data);
    }
    
    public function createTeam(){
        $data['header'] = 'Team Create';
        //$data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        $this->load->view('fifaadmin/teamCreate',$data);
    }
    
    public function submitTeam(){
        $teamName = $this->input->post('TeamName', TRUE);
        $result = $this->FifaAdminModel->team_save($teamName);
        $notice = array();
        if ($result) {
            $notice = array(
                'type' => 1,
                'message' => 'Team Creation Success'
            );
        } else {
            $notice = array(
                'type' => 0,
                'message' => 'Team Creation Fail !!!'
            );
        }
        $this->session->set_userdata('notifyuser', $notice);
        redirect('Fifaadmin');
    }
    
    
    public function matchList(){
        $data['header'] = 'Match List';
        
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        $this->load->view('fifaadmin/matchList',$data);
    }
    
    public function matchCreate(){
        $data['header'] = 'Match Create';
        $data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['allRound'] = $this->FifaAdminModel->all_round();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        $this->load->view('fifaadmin/matchCreate',$data);
    }
    
    public function saveMatch(){
        $matchName = $this->input->post('MatchName', TRUE);
        $round =  $this->input->post('Round', TRUE);
        $matchDate = $this->input->post('MatchDate', TRUE);
        $matchTime = $this->input->post('MatchTime', TRUE);
        $teamIdA = $this->input->post('TeamIdA', TRUE);
        $teamIdB = $this->input->post('TeamIdB', TRUE);
        $matchDT = $matchDate . ' ' .$matchTime;
        $matchId = $this->FifaAdminModel->save_match($matchName, $round, $matchDT);
        $this->FifaAdminModel->save_match_party($matchId, $teamIdA);
        $this->FifaAdminModel->save_match_party($matchId, $teamIdB);
        redirect('Fifaadmin');
        //echo 'matchName'. $matchName . ' round '.$round. ' matchDate '. $matchDate . ' matchTime ' . $matchTime . ' teamIdB ' .$teamIdB ;
        //exit();
        
    }
    
}
?>
