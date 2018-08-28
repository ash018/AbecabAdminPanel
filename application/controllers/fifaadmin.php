<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Fifaadmin extends MY_Controller{
    //Add Form Live ServerTEst
    public function __construct() {
        parent::__construct();
        $this->load->model('FifaAdminModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
   }

   public function index(){
        $data['header'] = 'Winner List';
        //$data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['allWinner'] = $this->FifaAdminModel->all_winner();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        //$this->load->view('fifaadmin/teamList',$data);
        $this->load->view('fifaadmin/winnerList',$data);
    }

    public function createTeam(){
        $data['header'] = 'Team Create';
        //$data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        $this->load->view('fifaadmin/teamCreate',$data);
    }

    public function createWinner(){
        $data['header'] = 'Winner Create';
        //$data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        $this->load->view('fifaadmin/winnerCreate',$data);
    }
	
    public function bulkWinner(){
        $data['header'] = 'Winner Create';
        //$data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        $this->load->view('fifaadmin/bulkWinner',$data);
    }
    
    public function bulkWinnerSubmit(){
        
        
        
        
         if(isset($_POST['submit'])){
		
		$name       = $_FILES['file']['name'];  
                $filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {


	           $sql = "INSERT into WinnerInfo (WinnerName,QuizTime,Speciality,District) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
                   
                   
                   $query = $this->db->query($sql);
                 
				if(!isset($query))
				{
                                    $notice = array(
                                        'type' => 0,
                                        'message' => 'Bulk Insertion Failed !!!'
                        );
                    }
				else {
                                    $notice = array(
                                        'type' => 1,
                                        'message' => 'Bulk Winner Information Added Successfully'
                        );
                    }
	         }
			
	         fclose($file);	
		 }
	}
        else{
            echo 'hello';
            //exit();
        }
        $data['header'] = 'Winner List';
        //$data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['allWinner'] = $this->FifaAdminModel->all_winner();
        $data['Header'] = $this->load->view('templates/header', $data,TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu','',TRUE);
        $data['footer'] = $this->load->view('templates/footer', '',TRUE);
        //$this->load->view('fifaadmin/teamList',$data);
        $this->load->view('fifaadmin/winnerList',$data);
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

    public function submitWinner(){
        $winnerName = $this->input->post('WinnerName', TRUE);
        $winnerSpeciality = $this->input->post('WinnerSpeciality', TRUE);
        $winnerDistrict = $this->input->post('WinnerDistrict', TRUE);
        $QuizTime = $this->input->post('QuizTime', TRUE);
        $file = pathinfo($this->input->post('file',TRUE));
        $winnerImage = $file['filename'];
        
        //$config['upload_path'] = './uploads/';
        $config['upload_path'] = 'D:\xampp\htdocs\fifaabecab\assets\images\winner';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|xlsx';
        $config['max_size'] = 500000 ;
        $config['max_width'] = 1280;
        $config['max_height'] = 960;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('file')) {

            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

            $error = array('error' => $this->upload->display_errors());
            
            //$this->load->view('upload', $error);
            var_dump($error);
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            $result = $this->FifaAdminModel->winner_save($winnerName,$winnerSpeciality,$winnerDistrict,$QuizTime,$file_name);
            //$this->load->view('upload', $data);
            $notice = array();
            if ($result) {
                $notice = array(
                    'type' => 1,
                    'message' => 'Winner Creation Success'
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
    }


    public function matchList(){
        $data['header'] = 'Match List';
        $data['allMatch'] = $this->FifaAdminModel->all_match();
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
        $resultA = $this->FifaAdminModel->save_match_party($matchId, $teamIdA);
        $resultB = $this->FifaAdminModel->save_match_party($matchId, $teamIdB);

        $notice = array();
        if ($resultA && $resultB) {
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

        redirect('Fifaadmin/matchList');
    }

    public function getTeam() {
        $teamId = $this->input->get("teamID", TRUE);
        $data['teamData'] = $this->FifaAdminModel->checkTeamId($teamId);
        $teamEditFrom = $this->load->view('fifaadmin/team_edit', $data, TRUE);
        echo $teamEditFrom;
    }

    public function getWinner() {
        $winnerId = $this->input->get("winnerID", TRUE);
        $data['winnerData'] = $this->FifaAdminModel->checkWinnerId($winnerId);
        $winnerEditFrom = $this->load->view('fifaadmin/winner_edit', $data, TRUE);
        echo $winnerEditFrom;
    }
    
    public function getWinnerDelete() {
        $winnerId = $this->input->get("winnerID", TRUE);
        $data['winnerData'] = $this->FifaAdminModel->checkWinnerId($winnerId);
        $winnerEditFrom = $this->load->view('fifaadmin/winner_delete', $data, TRUE);
        echo $winnerEditFrom;
    }

    public function updateTeam(){
        $teamId = $this->input->post('teamID');
        $teamName = $this->input->post('teamName');

        $result = $this->FifaAdminModel->updateTeam($teamId,$teamName);
        //var_dump($teamName);
        $notice = array();
         if ($result) {
             $notice = array(
                 'type' => 1,
                 'message' => 'Team Name Updated Successfully'
             );
         } else {
             $notice = array(
                 'type' => 0,
                 'message' => 'Error Has Occurred, Please Insert Right Info'
             );
         }
        $this->session->set_userdata('notifyuser', $notice);
        redirect('fifaadmin');
    }

    public function editMatchInfo(){
        $matchId = $this->input->get("matchId", TRUE);
        $data['allTeam'] = $this->FifaAdminModel->all_party();
        $data['allRound'] = $this->FifaAdminModel->all_round();
        $data['matchInfo'] = $this->FifaAdminModel->editMatch($matchId);
        $data['matchTeam'] = $this->FifaAdminModel->matchTeam($matchId);
        $matchEditFrom = $this->load->view('fifaadmin/match_edit', $data, TRUE);
        echo $matchEditFrom;
    }

    public function updateMatch(){
        $matchId = $this->input->post('MatchId', TRUE);
        $matchName = $this->input->post('MatchName', TRUE);
        $round =  $this->input->post('Round', TRUE);
        $matchDate = $this->input->post('MatchDate', TRUE);
        $matchTime = $this->input->post('MatchTime', TRUE);
        $mTime = $matchDate.' '.$matchTime;

        $matchTeamIdA =  $this->input->post('MatchTeamIdA', TRUE);
        $matchTeamIdB = $this->input->post('MatchTeamIdB', TRUE);
        $result = $this->FifaAdminModel->updateMatch($matchId, $matchName, $round, $mTime);

        $teamIdA = $this->input->post('TeamIdA', TRUE);
        $teamIdB = $this->input->post('TeamIdB', TRUE);

        $resultA = $this->FifaAdminModel->updateMatchParty($matchId, $matchTeamIdA, $matchTeamIdB, $teamIdA, $teamIdB);

        $notice = array();
         if ($result && $resultA ) {
             $notice = array(
                 'type' => 1,
                 'message' => 'Match Info Updated Successfully'
             );
         } else {
             $notice = array(
                 'type' => 0,
                 'message' => 'Error Has Occurred, Please Insert Right Info'
             );
         }
        $this->session->set_userdata('notifyuser', $notice);
        redirect('Fifaadmin/matchList');
    }

    public function editScore(){
        $matchId = $this->input->get("matchId", TRUE);
        $data['matchInfo'] = $this->FifaAdminModel->editMatch($matchId);
        $data['mpInfo'] = $this->FifaAdminModel->editScoure($matchId);
        $editScore = $this->load->view('fifaadmin/score_edit', $data, TRUE);
        echo $editScore;
    }

    public function updateScore(){
        $matchId = $this->input->post('MatchId', TRUE);
        $mpIdA = $this->input->post('MPIdA', TRUE);
        $mpIdB = $this->input->post('MPIdB', TRUE);
        $teamScoreA = $this->input->post('TeamScoreA', TRUE);
        $teamScoreB = $this->input->post('TeamScoreB', TRUE);

        $partyIdA = $this->input->post('PartyIdA', TRUE);
        $partyIdB = $this->input->post('PartyIdB', TRUE);

        $result = $this->FifaAdminModel->updateScoreInMatchnMP($matchId, $mpIdA, $mpIdB, $teamScoreA, $teamScoreB, $partyIdA, $partyIdB);
        $notice = array();
         if ($result) {
             $notice = array(
                 'type' => 1,
                 'message' => 'Match Score Updated Successfully'
             );
         } else {
             $notice = array(
                 'type' => 0,
                 'message' => 'Error Has Occurred, Please Insert Right Info'
             );
         }
        $this->session->set_userdata('notifyuser', $notice);
        redirect('Fifaadmin/matchList');
    }

    public function updateWinner(){
        $winnerId = $this->input->post('winnerID', TRUE);
        $winnerName = $this->input->post('winnerName', TRUE);
        $winnerSpeciality = $this->input->post('winnerSpeciality', TRUE);
        $winnerDistrict = $this->input->post('winnerDistrict', TRUE);
        $winnerQuizTime = $this->input->post('winnerQuizTime', TRUE);
        $file = pathinfo($this->input->post('file',TRUE));
        $winnerImage = $file['filename'];
        
        
        var_dump($winnerImage);
        exit();
        
        $config['upload_path'] = 'D:\xampp\htdocs\img';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|xlsx';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('winnerImage')) {

            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

            $error = array('error' => $this->upload->display_errors());
            
            //$this->load->view('upload', $error);
        }
        
        else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $file_name = $upload_data['file_name'];
            
            $result = $this->FifaAdminModel->updateWinnerInfo($winnerId,$winnerName,$winnerSpeciality,$winnerDistrict,$winnerQuizTime,$file_name);
            $notice = array();
             if ($result) {
                 $notice = array(
                     'type' => 1,
                     'message' => 'Information Updated Successfully'
                 );
             } else {
                 $notice = array(
                     'type' => 0,
                     'message' => 'Error Has Occurred, Please Insert Right Info'
                 );
             }
            $this->session->set_userdata('notifyuser', $notice);
            redirect('Fifaadmin');   
        }

        
    }
    
    public function deleteWinner(){
        $winnerId = $this->input->post('winnerID', TRUE);
        



        $result = $this->FifaAdminModel->deleteWinnerInfo($winnerId);
        $notice = array();
         if ($result) {
             $notice = array(
                 'type' => 1,
                 'message' => 'Information Deleted Successfully'
             );
         } else {
             $notice = array(
                 'type' => 0,
                 'message' => 'Error Has Occurred, Please Insert Right Info'
             );
         }
        $this->session->set_userdata('notifyuser', $notice);
        redirect('Fifaadmin');
    }
}
?>
