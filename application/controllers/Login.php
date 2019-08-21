<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __Construct() {
        parent::__Construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->model('login_model');
    }

    public function index() {
        $this->load->view('login_signin');
    }

    public function user_login() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $this->form_validation->set_rules("username", "Username", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_signin');
        } else {
            $usr_result = $this->login_model->get_user($username, $password);
            $id = $usr_result->id;
            $fullname = $usr_result->FullName;
            $userlevel = $usr_result->UserLevel;
            if ($usr_result) {
                $sessiondata = array(
                    'userId' => $id,
                    'fullname' => $fullname,
                    'username' => $username,
                    'userlevel' => $userlevel,
                    'loginuser' => TRUE
                );
                $this->session->set_userdata($sessiondata);
                redirect("home");
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username or password!</div>');
                redirect('login');
            }
        }
    }

}
