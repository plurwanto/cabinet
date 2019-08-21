<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    function __Construct() {
        parent::__Construct();
        $this->load->helper(array('url'));
        $this->load->database();
        $this->load->library(array('session', 'form_validation', 'email'));
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    public function index() {
        $data['content'] = 'home';
        $this->load->view('tampilan_home', $data);
    }

}
