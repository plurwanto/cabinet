<?php
class Demo_accounts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('demo_account_model');
        $this->load->model('settings/Global_config_model', 'Global_config_model');
        $this->load->library(array('session', 'form_validation', 'email'));
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {

        $data['content'] = 'demo_account/view_verifyaccount';
        $this->load->view('tampilan_home', $data);
    }

    function myAccount() {
        //$id = $this->input->post('slt_platform');
        $data['list_account_type'] = $this->demo_account_model->get_account_type();
        $data['list_platform'] = $this->demo_account_model->get_platform();
        $data['list_product'] = $this->demo_account_model->get_product();
        $data['list_myAccount'] = $this->demo_account_model->getMyAccountList();
        $data['content'] = 'demo_account/view_myaccount';
        $this->load->view('tampilan_home', $data);
    }

    public function myAccount_ajax_add() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();

        $type_email = 'demo_account_request';
        $list = $this->Global_config_model->getUserInfoById($UserId);
        $saltid = $list->Email;
        $fname = $list->FullName;

        $dataMail = $this->Global_config_model->getMailTemplateBy($type_email);
        $subject = $dataMail->SubjectMail;
        $body = html_entity_decode($dataMail->BodyMail);
        $html_content = preg_replace(array('/{fullname}/'), array($fname), $body);

        if ($this->Global_config_model->sendemail($saltid, $subject, $html_content)) {
            $data = array(
                'user_id' => $UserId,
                'account_type_id' => $this->input->post('slt_type'),
                'platform_id' => $this->input->post('slt_platform'),
                'product_id' => $this->input->post('slt_product'),
                'status' => 'PENDING',
                'created' => date('Y-m-d H:i:s'),
            );
            $insert = $this->demo_account_model->save($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Your request has been saved, please check your email inbox or spam folder.</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Your request could not be saved. Please, try again or check your connection.</div>');
        }
        echo json_encode(array("status" => TRUE));
    }

    public function myAccount_ajax_update() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();
        $data = array(
            'user_id' => $UserId,
            'account_type_id' => $this->input->post('slt_type'),
            'platform_id' => $this->input->post('slt_platform'),
            'product_id' => $this->input->post('slt_product'),
            'status' => 'PENDING',
        );
        $this->demo_account_model->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    function myAccount_edit($id) {
        $data = $this->demo_account_model->getMyAccountListById($id);
        echo json_encode($data);
    }

    public function myAccount_ajax_delete($id) {
        $this->demo_account_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_list() {
        $list = $this->demo_account_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $demo_account) {
            $no++;
            $status = ($demo_account->status == 'ACTIVE' ? '<span class="label label-sm label-success">ACTIVE</span>' : ($demo_account->status == 'PENDING' ? '<span class="label label-sm label-warning">PENDING</span>' : '<span class="label label-sm label-danger">EXPIRED</span>'));
            $time = strtotime($demo_account->created);
            $request = date("d-m-Y H:i:s", $time);
            $row = array();
            $row[] = $demo_account->FullName;
            $row[] = $demo_account->Email;
            $row[] = $request;
            $row[] = $demo_account->Type;
            $row[] = $demo_account->Platform;
            $row[] = $demo_account->Product;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $demo_account->id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $demo_account->id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->demo_account_model->count_all(),
            "recordsFiltered" => $this->demo_account_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function ajax_edit($id) {
        $data = $this->demo_account_model->getVerifyAccountById($id);
        echo json_encode($data);
    }

//    public function ajax_add() {
//        $UserId = $this->session->userdata('userId');
//        $this->_validate();
//        $data = array(
//            'user_id' => $UserId,
//            'account_type_id' => $this->input->post('slt_type'),
//            'platform_id' => $this->input->post('slt_platform'),
//            'product_id' => $this->input->post('slt_product'),
//            'status' => 'PENDING',
//            'created' => date('Y-m-d H:i:s'),
//        );
//        $insert = $this->demo_account_model->save($data);
//
//        echo json_encode(array("status" => TRUE));
//    }

    public function ajax_update() {
        $user_login = $this->session->userdata('userId');
        $UserId = $this->input->post('userId'); //$this->session->userdata('userId');
        $platform = $this->input->post('temp_platform');
        $platformid = $this->input->post('platform_id');
        $password = $this->input->post('platform_pwd');
        $servicespin = $this->input->post('platform_pin');
        $timestamp = date('Y-m-d H:i:s');
        $expired = date('Y-m-d H:i:s', strtotime('+30 days', strtotime($timestamp)));
        
        $this->_validate_account();
        $arr_val = array('success' => false, 'messages' => array());
        if ($this->form_validation->run()) {
            $type_email = 'demo_account_activate';
            $list = $this->Global_config_model->getUserInfoById($UserId);
            $saltid = $list->Email;
            $fname = $list->FullName;

            $dataMail = $this->Global_config_model->getMailTemplateBy($type_email);
            $subject = $dataMail->SubjectMail;
            $body = html_entity_decode($dataMail->BodyMail);
            $html_content = preg_replace(array('/{fullname}/', '/{platform}/', '/{platformid}/', '/{password}/', '/{servicespin}/', '/{expired}/'), array($fname, $platform, $platformid, $password, $servicespin, $expired), $body);

            if ($this->Global_config_model->sendemail($saltid, $subject, $html_content)) {

                $data = array(
                    'user_id' => $UserId,
                    'platform_login' => $platformid,
                    'platform_password' => $password,
                    'services_pin' => $servicespin,
                    'status' => 'ACTIVE',
                    'activate' => $timestamp,
                    'expired' => $expired,
                    'activate_by' => $user_login
                );
                $this->demo_account_model->update(array('id' => $this->input->post('id')), $data);
                $arr_val = array('success' => true);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>The demo account has been saved.</div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>The demo account could not be saved. Please, try again.</div>');
            }
        } else {
            foreach ($_POST as $key => $value) {
                $arr_val['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($arr_val);
    }

    public function ajax_delete($id) {
        $this->demo_account_model->delete_by_id($this->table, $id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('slt_type') == '') {
            $data['inputerror'][] = 'slt_type';
            $data['error_string'][] = 'Type Harus di pilih';
            $data['status'] = FALSE;
        }
        if ($this->input->post('slt_platform') == '') {
            $data['inputerror'][] = 'slt_platform';
            $data['error_string'][] = 'Platform Harus di pilih';
            $data['status'] = FALSE;
        }
        if ($this->input->post('slt_product') == '') {
            $data['inputerror'][] = 'slt_product';
            $data['error_string'][] = 'Product Harus di pilih';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_account() {
        $this->form_validation->set_rules('platform_id', 'platform_id', 'trim|required');
        $this->form_validation->set_rules('platform_pwd', 'platform_pwd', 'trim|required');
        $this->form_validation->set_rules('platform_confirm', 'platform_confirm', 'required|matches[platform_pwd]');

        $this->form_validation->set_error_delimiters('<div class="text-danger" rode="alert">', '</div>');
        $this->form_validation->set_message('required', '* Required Fields');
        $this->form_validation->set_message('is_natural_no_zero', '* Tidak Boleh 0');
        $this->form_validation->set_message('matches', 'password doesn\'t match.');
    }

    function get_data_accountType() {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');
        if ($modul == "platform") {
            echo $this->demo_account_model->get_platform_by_accounttype($id);
        }
    }

    function get_data_platform() {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');
        if ($modul == "product") {
            echo $this->demo_account_model->get_product_by_platform($id);
        }
    }

}
