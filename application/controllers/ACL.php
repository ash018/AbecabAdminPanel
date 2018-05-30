<?php
class ACL extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ACLmodel');
    }
    
    public function index() {
        $data['header'] = 'ACL';
        $data['Header'] = $this->load->view('templates/header', $data, TRUE);
        $data['leftMenu'] = $this->load->view('templates/left_menu', '', TRUE);
        $data['footer'] = $this->load->view('templates/footer', '', TRUE);
        $data['roles'] = $this->ACLmodel->getAllRoleName();
        $data['urls'] = $this->ACLmodel->getAllUrl();
        $data['roleUrl'] = $this->ACLmodel->getAllRolleAccess();
        $this->load->view('acl/acl_view', $data);
    }
}
?>
