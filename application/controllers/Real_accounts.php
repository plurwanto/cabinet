<?php
class Real_accounts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('real_account_model');
        $this->load->model('settings/Global_config_model', 'Global_config_model');
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {

        $data['content'] = 'real_account/view_verifyaccount';
        $this->load->view('tampilan_home', $data);
    }

    function myAccount() {
        $id = $this->session->userdata('userId');
        $data['list_myAccounts'] = $this->real_account_model->getMyAccountList();
        $data['unfinished_accounts'] = $this->real_account_model->get_unfinished_accounts($id);
        $data['content'] = 'real_account/view_myaccount';
        $this->load->view('tampilan_home', $data);
    }

    function request($nodoc) {
        $id = $this->session->userdata('userId');
        $this->session->set_userdata('in', $nodoc);
        $last_step = $this->real_account_model->get_existing_unfinished_accounts($id, $nodoc);
        redirect('accounts/real_accounts/' . $last_step->last_step);
    }

    function step1() {
        $id = $this->session->userdata('userId');
        $data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        //$new_code = $this->Global_config_model->autoNumber('document_number', 'temp_real_accounts', '5000'); //$this->real_account_model->get_existing_unfinished_accounts($id, $new_code);
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);

        $data['content'] = 'real_account/view_step1';
        $this->load->view('tampilan_home', $data);
    }

    function step1_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id,$new_doc);
        $this->_validate1();
        $data = array(
            'user_id' => $id,
            'step1_accept' => "1",
            'last_step' => "step2_1",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            if ($cek_users_realaccount->step1_accept == "0")
                $this->db->update('temp_real_accounts', array_merge(array('document_number' => $new_doc), $data), array('document_number' => $new_doc, 'user_id' => $id));
        } else {
            $this->db->insert('temp_real_accounts', array_merge(array('document_number' => $new_doc), $data));
        }

        echo json_encode(array("status" => TRUE, "old_doc" => $old_doc));
    }

    function step2_1() {
        $id = $this->session->userdata('userId');
       // $data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);
        $data['users_demo_accounts'] = $this->real_account_model->getDemoAccountById($id);
        $data['content'] = 'real_account/view_step2_1';
        $this->load->view('tampilan_home', $data);
    }

    function step2_1_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $this->_validate2_1();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'user_id' => $id,
            'step2_1_accept' => "1",
            'last_step' => "step2_2",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            if ($cek_users_realaccount->step2_1_accept == "0")
                $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
        }
        echo json_encode(array("status" => TRUE));
    }

    function step2_2() {
        $id = $this->session->userdata('userId');
        //$data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);

        $data['content'] = 'real_account/view_step2_2';
        $this->load->view('tampilan_home', $data);
    }

    function step2_2_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $RealAccountTradeExperience = $this->input->post('RealAccountTradeExperience');
        $TradeExpAccountNumber = $this->input->post('RealAccountTradeExperienceAccountNumber');
        $TradeExpCompanyName = $this->input->post('RealAccountTradeExperienceCompanyName');
        $this->_validate2_2();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'user_id' => $id,
            'step2_2_trade_experience' => $RealAccountTradeExperience,
            'step2_2_account_number' => $TradeExpAccountNumber,
            'step2_2_company_name' => $TradeExpCompanyName,
            'step2_2_accept' => "1",
            'last_step' => "step3",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            if ($RealAccountTradeExperience == "1") {
                if ($cek_users_realaccount->step2_2_accept == "0")
                    $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
            }else {
                //if ($cek_users_realaccount->step2_2_accept == "1")
                $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), array('step2_2_trade_experience' => $RealAccountTradeExperience, 'step2_2_account_number' => "", 'step2_2_company_name' => "", 'step2_2_accept' => "0", 'last_step' => "step3")), array('document_number' => $old_doc, 'user_id' => $id));
            }
        }
        echo json_encode(array("status" => TRUE));
    }

    function step3() {
        $id = $this->session->userdata('userId');
        //$data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);
        $data['list_account_type'] = $this->real_account_model->get_account_type();
        $data['list_platform'] = $this->real_account_model->get_platform();
        $data['list_product'] = $this->real_account_model->get_product();
        $data['content'] = 'real_account/view_step3';
        $this->load->view('tampilan_home', $data);
    }

    function step3_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $RealAccountProfileAccept = $this->input->post('RealAccountProfileAccept');
        $RealAccountAccountTypeId = $this->input->post('RealAccountAccountTypeId');
        $RealAccountPlatformId = $this->input->post('RealAccountPlatformId');
        $RealAccountProductId = $this->input->post('RealAccountProductId');
        $this->_validate3();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'user_id' => $id,
            'step3_accounts_type' => $RealAccountAccountTypeId,
            'step3_accounts_platform' => $RealAccountPlatformId,
            'step3_accounts_product' => $RealAccountProductId,
            'step3_accept' => $RealAccountProfileAccept,
            'last_step' => "step4",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            // if ($cek_users_realaccount->step3_accept == "0")
            $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
        }
        echo json_encode(array("status" => TRUE));
    }

    function step4() {
        $id = $this->session->userdata('userId');
        //$data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);

        $data['content'] = 'real_account/view_step4';
        $this->load->view('tampilan_home', $data);
    }

    function step4_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $RealAccountStepFourAccept = $this->input->post('RealAccountStepFourAccept');

        $this->_validate4();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'user_id' => $id,
            'step4_accept' => $RealAccountStepFourAccept,
            'last_step' => "step5",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
        }
        echo json_encode(array("status" => TRUE));
    }

    function step5() {
        $id = $this->session->userdata('userId');
       // $data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);

        $data['content'] = 'real_account/view_step5';
        $this->load->view('tampilan_home', $data);
    }

    function step5_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $RealAccountStepFifeAccept = $this->input->post('RealAccountStepFifeAccept');
        $RealAccountStepFifeSettlementOfDisputes1 = $this->input->post('RealAccountStepFifeSettlementOfDisputes1');
        $RealAccountStepFifeDistrictCourtId1 = $this->input->post('RealAccountStepFifeDistrictCourtId1');
        $RealAccountStepFifeBranchId1 = $this->input->post('RealAccountStepFifeBranchId1');

        $this->_validate5();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'user_id' => $id,
            'step5_accept' => $RealAccountStepFifeAccept,
            'step5_StepFifeSettlementOfDisputes' => $RealAccountStepFifeSettlementOfDisputes1,
            'step5_StepFifeDistrictCourtId' => $RealAccountStepFifeDistrictCourtId1,
            'step5_StepFifeBranchId' => $RealAccountStepFifeBranchId1,
            'last_step' => "step6",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
        }
        echo json_encode(array("status" => TRUE));
    }

    function step6() {
        $id = $this->session->userdata('userId');
       // $data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);

        $data['content'] = 'real_account/view_step6';
        $this->load->view('tampilan_home', $data);
    }

    function step6_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $RealAccountCompanyProfileAccept = $this->input->post('RealAccountCompanyProfileAccept');

        $this->_validate6();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'user_id' => $id,
            'step6_accept' => $RealAccountCompanyProfileAccept,
            'last_step' => "step7",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
        }
        echo json_encode(array("status" => TRUE));
    }

    function step7() {
        $id = $this->session->userdata('userId');
        //$data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);

        $data['content'] = 'real_account/view_step7';
        $this->load->view('tampilan_home', $data);
    }

    function step7_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $RealAccountAccessResponsibilityAccept = $this->input->post('RealAccountAccessResponsibilityAccept');

        $this->_validate7();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'user_id' => $id,
            'step7_accept' => $RealAccountAccessResponsibilityAccept,
            'last_step' => "step8",
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $id
        );

        if (!empty($cek_users_realaccount)) {
            $this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
        }
        echo json_encode(array("status" => TRUE));
    }

    function step8() {
        $id = $this->session->userdata('userId');
       // $data['doc_number'] = $this->session->userdata('in');
        $data['kode'] = $this->Global_config_model->autoNumber_real_accounts('document_number', '5000');
        $data['show'] = $this->real_account_model->get_profile_accounts_by($id);

        $data['content'] = 'real_account/view_step8';
        $this->load->view('tampilan_home', $data);
    }

    function step8_update() {
        $new_doc = $this->input->post('new_doc');
        $old_doc = $this->input->post('old_doc');
        $id = $this->session->userdata('userId');
        $RealAccountWaiverClientAccept = $this->input->post('RealAccountWaiverClientAccept');

        $this->_validate8();
        $cek_users_realaccount = $this->real_account_model->get_existing_unfinished_accounts($id, $old_doc);
        $data = array(
            'document_number' => $old_doc,
            'user_id' => $id,
            'user_accounts_type' => $cek_users_realaccount->step3_accounts_type,
            'user_accounts_platform' => $cek_users_realaccount->step3_accounts_platform,
            'user_accounts_product' => $cek_users_realaccount->step3_accounts_product,
            'created' => date('Y-m-d H:i:s'),
            'activate_by' => $id
        );
        $data_log = array(
            'document_number' => $old_doc,
            'user_id' => $id,
            'status' => 'complete',
            'UpdateDate' => date('Y-m-d H:i:s')
        );

        if (!empty($cek_users_realaccount)) {
            $this->db->insert('real_accounts', $data);
            $this->db->insert('log_real_accounts', $data_log);
            //$this->db->update('temp_real_accounts', array_merge(array('document_number' => $old_doc), $data), array('document_number' => $old_doc, 'user_id' => $id));
        }
        $this->db->delete('temp_real_accounts', array('document_number' => $old_doc, 'user_id' => $id));
        $this->session->unset_userdata('in');
        echo json_encode(array("status" => TRUE));
    }

    private function _validate1() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('RealAccountCompanyProfileAccept') == '') {
            $data['inputerror'][] = 'RealAccountCompanyProfileAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountCompanyProfileAccept') == 0) {
            $data['inputerror'][] = 'RealAccountCompanyProfileAccept';
            $data['error_string'][] = 'Must selected yes';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate2_1() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('RealAccountSimulationStatementAccept') == '') {
            $data['inputerror'][] = 'RealAccountSimulationStatementAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountSimulationStatementAccept') == 0) {
            $data['inputerror'][] = 'RealAccountSimulationStatementAccept';
            $data['error_string'][] = 'Must selected yes';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate2_2() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('RealAccountTradeExperience') == '1') {
            if ($this->input->post('RealAccountTradeExperienceAccountNumber') == '') {
                $data['inputerror'][] = 'RealAccountTradeExperienceAccountNumber';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }
            if ($this->input->post('RealAccountTradeExperienceCompanyName') == '') {
                $data['inputerror'][] = 'RealAccountTradeExperienceCompanyName';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }
            if ($this->input->post('RealAccountTradeExperienceAccept') == 0) {
                $data['inputerror'][] = 'RealAccountTradeExperienceAccept';
                $data['error_string'][] = 'Must selected yes';
                $data['status'] = FALSE;
            }
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate3() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('RealAccountAccountTypeId') == '') {
            $data['inputerror'][] = 'RealAccountAccountTypeId';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountPlatformId') == '') {
            $data['inputerror'][] = 'RealAccountPlatformId';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountProductId') == '') {
            $data['inputerror'][] = 'RealAccountProductId';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountProfileAccept') == '') {
            $data['inputerror'][] = 'RealAccountProfileAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountProfileAccept') == 0) {
            $data['inputerror'][] = 'RealAccountProfileAccept';
            $data['error_string'][] = 'Must selected yes';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate4() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        for ($x = 0; $x <= 12; $x++) {
            if ($this->input->post('RealAccountSftForm' . $x . 'ReadAndUnderstand') != '1') {
                $data['inputerror'][] = 'RealAccountSftForm' . $x . 'ReadAndUnderstand';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }
        }
        if ($this->input->post('RealAccountStepFourAccept') == '') {
            $data['inputerror'][] = 'RealAccountStepFourAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountStepFourAccept') == 0) {
            $data['inputerror'][] = 'RealAccountStepFourAccept';
            $data['error_string'][] = 'Must selected yes';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate5() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        for ($x = 0; $x <= 24; $x++) {
            if ($this->input->post('RealAccountSffoForm' . $x . 'ReadAndUnderstand') != '1') {
                $data['inputerror'][] = 'RealAccountSffoForm' . $x . 'ReadAndUnderstand';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }
        }
        if ($this->input->post('RealAccountStepFifeSettlementOfDisputes1') == '') {
            $data['inputerror'][] = 'RealAccountStepFifeSettlementOfDisputes1';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountStepFifeSettlementOfDisputes1') == "pengadilan negeri") {
            if ($this->input->post('RealAccountStepFifeDistrictCourtId1') == '') {
                $data['inputerror'][] = 'RealAccountStepFifeDistrictCourtId1';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }
            if ($this->input->post('RealAccountStepFifeBranchId1') == '') {
                $data['inputerror'][] = 'RealAccountStepFifeBranchId1';
                $data['error_string'][] = 'Required';
                $data['status'] = FALSE;
            }
        }
        if ($this->input->post('RealAccountStepFifeAccept') == '') {
            $data['inputerror'][] = 'RealAccountStepFifeAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountStepFifeAccept') == 0) {
            $data['inputerror'][] = 'RealAccountStepFifeAccept';
            $data['error_string'][] = 'Must selected yes';
            $data['status'] = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate6() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('RealAccountCompanyProfileAccept') == '') {
            $data['inputerror'][] = 'RealAccountCompanyProfileAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountCompanyProfileAccept') == 0) {
            $data['inputerror'][] = 'RealAccountCompanyProfileAccept';
            $data['error_string'][] = 'Must selected yes';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate7() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('RealAccountAccessResponsibilityAccept') == '') {
            $data['inputerror'][] = 'RealAccountAccessResponsibilityAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('RealAccountAccessResponsibilityAccept') == 0) {
            $data['inputerror'][] = 'RealAccountAccessResponsibilityAccept';
            $data['error_string'][] = 'Must selected yes';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate8() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('RealAccountWaiverClientAccept') == '') {
            $data['inputerror'][] = 'RealAccountWaiverClientAccept';
            $data['error_string'][] = 'Required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    function update_profile() {
        $data['content'] = 'real_account/view_updateprofile';
        $this->load->view('tampilan_home', $data);
    }

    public function myAccount_ajax_add() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();

        $type_email = 'real_account_request';
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
            $insert = $this->real_account_model->save($data);
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
        $this->real_account_model->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    function myAccount_edit($id) {
        $data = $this->real_account_model->getMyAccountListById($id);
        echo json_encode($data);
    }

    public function myAccount_ajax_delete($id) {
        $this->real_account_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_list() {
        $list = $this->real_account_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $real_account) {
            $no++;
            $status = ($real_account->status == 'ACTIVE' ? '<span class="label label-sm label-success">ACTIVE</span>' : ($real_account->status == 'PENDING' ? '<span class="label label-sm label-warning">PENDING</span>' : '<span class="label label-sm label-danger">EXPIRED</span>'));
            $time = strtotime($real_account->created);
            $request = date("d-m-Y H:i:s", $time);
            $row = array();
            $row[] = $real_account->FullName;
            $row[] = $real_account->Email;
            $row[] = $request;
            $row[] = $real_account->Type;
            $row[] = $real_account->Platform;
            $row[] = $real_account->Product;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $real_account->id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $real_account->id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->real_account_model->count_all(),
            "recordsFiltered" => $this->real_account_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function ajax_edit($id) {
        $data = $this->real_account_model->getVerifyAccountById($id);
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
//        $insert = $this->real_account_model->save($data);
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
            $type_email = 'real_account_activate';
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
                $this->real_account_model->update(array('id' => $this->input->post('id')), $data);
                $arr_val = array('success' => true);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>The real account has been saved.</div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" role="alert"><button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>The real account could not be saved. Please, try again.</div>');
            }
        } else {
            foreach ($_POST as $key => $value) {
                $arr_val['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($arr_val);
    }

    public function ajax_delete($nodok, $id) {
        $this->real_account_model->delete_temp_by_id($nodok, $id);
        echo json_encode(array("status" => TRUE));
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
            echo $this->real_account_model->get_platform_by_accounttype($id);
        }
    }

    function get_data_platform() {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');
        if ($modul == "product") {
            echo $this->real_account_model->get_product_by_platform($id);
        }
    }

}
