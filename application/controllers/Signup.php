<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller {

    function __Construct() {
        parent::__Construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('signup_model');
        $this->load->model('settings/Global_config_model', 'Global_config_model');
    }

    public function index() {
        $this->load->view('login_registration');
    }

    public function registration() {
        $this->form_validation->set_rules('fname', 'Full Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.Email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('confirmpswd', 'Password Confirmation', 'required|matches[password]');
        //$this->form_validation->set_message('is_unique', 'This %s is already exits');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_registration');
        } else {
            $fname = $_POST['fname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passhash = hash('md5', $password);

            $saltid = md5($email);
            $status = "T";
            $data = array(
                'Email' => $email,
                'Password' => $passhash,
                'Active' => $status,
                'AddDate' => date('Y-m-d H:i:s'));
            $data_log = array(
                'fname' => $fname,
                'phone' => $phone,
                'email' => $email,
                'AddDate' => date('Y-m-d H:i:s'));
            if ($this->sendemail($saltid)) {
                $this->signup_model->insertuser($data);
                $this->signup_model->insertuserLog($data_log); //untuk mendapatkan data username dan no telp
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Please confirm the mail sent to your inbox/spam folder to complete the registration.</div>');
                redirect('signup');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Cannot Register...</div>');
                //    redirect('signup');
            }
        }
    }

    function sendemail($saltid) {
        $fname = $this->input->post('fname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $pass_user = $this->input->post('password');
        // configure the email setting
        $dataSetting = $this->Global_config_model->getSetting();
        $protocol = $dataSetting->MailProtocol;
        $host = $dataSetting->MailHost;
        $name = $dataSetting->MailName;
        $user = $dataSetting->MailUser;
        $pass = $dataSetting->MailPass;
        $port = $dataSetting->MailPort;

        $config['protocol'] = $protocol;
        $config['smtp_host'] = $host; //smtp host name
        $config['smtp_port'] = $port; //smtp port number
        $config['smtp_user'] = $user;
        $config['smtp_pass'] = $pass; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes

        $dataMail = $this->Global_config_model->getMailTemplateBy('Register');
        $subject = $dataMail->SubjectMail;
        $body = html_entity_decode($dataMail->BodyMail);

        $this->email->initialize($config);
        $url = base_url() . "signup/confirmation?key=" . $saltid;

        $html_content = preg_replace(array('/{fullname}/', '/{email}/', '/{phoneNumber}/', '/{password}/', '/{link}/'), array($fname, $email, $phone, $pass_user, $url), $body);

        $this->email->from($user, $name);
        $this->email->to($email);
        $this->email->subject($subject);
        $message = $html_content; //$body.$url;//"<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with Signals Buddy.</p><p>Please click below link to verify your email.</p>" . $url . "<br/><p>Sincerely,</p><p>Signals Buddy Team</p></body></html>";
        $this->email->message($message);
        return $this->email->send();
    }

    public function confirmation() {
//        $fname = $this->input->get("fn");
//        $phone = $this->input->get("ph");
//        $email = $this->input->get("em");
        $key = $this->input->get("key");
        if ($this->signup_model->verifyemail($key)) {
            $get_id = $this->signup_model->getId($key);
            $id = $get_id->id;
            $fname = $get_id->fname;
            $phone = $get_id->phone;
            $email = $get_id->email;
            $data_user = array('UserId' => $id, 'FullName' => $fname, 'Email' => $email, 'MobilePhoneNumber' => $phone);
            $this->signup_model->insertprofile($data_user);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
            redirect("login");
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
            redirect("login");
        }
    }

    function _validate_phone_number($value) {
        $value = trim($value);
        $match = '/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/';
        $replace = '/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
        $return = '($1) $2-$3';
        if (preg_match($match, $value)) {
            return preg_replace($replace, $return, $value);
        } else {
            $this->form_validation->set_message('_validate_phone_number', 'Invalid Phone.');
            return false;
        }
    }

}
