<?php
class Profile extends CI_Controller {

    function __Construct() {
        parent::__Construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email', 'globallib'));
        $this->load->model('master/profile_model');
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {
        $id = $this->session->userdata("userId");
        $data['user_profile'] = $this->profile_model->getProfileById($id);
        $data['user_picture'] = $this->profile_model->getUserPictureId($id);
        $data['content'] = 'master/profile/view_profile';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_list() {
        $list = $this->profile_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $users_bank) {
            $no++;
            $status = ($users_bank->Status == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $row = array();
            $row[] = $users_bank->BankName;
            $row[] = $users_bank->FullName;
            $row[] = $users_bank->RekNumber;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_bank(' . "'" . $users_bank->UserId . "/" . $users_bank->BankId . "/" . $users_bank->RekNumber . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_bank(' . "'" . $users_bank->UserId . "/" . $users_bank->BankId . "/" . $users_bank->RekNumber . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->profile_model->count_all(),
            "recordsFiltered" => $this->profile_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function ajax_edit($id, $bankId, $rekNumb) {
        $data = $this->profile_model->getBankById($id, $bankId, $rekNumb);
        echo json_encode($data);
    }

    public function ajax_add() {
        $UserId = $this->session->userdata('userId');
        $bankId = $this->input->post('bankName');
        $rekNumb = $this->input->post('rekNumber');
        $rekName = $this->input->post('rekName');
        $status = $this->input->post('status');
        $this->_validate();
        $get_users_bank = $this->profile_model->getBankById($UserId, $bankId, $rekNumb);
        if (empty($get_users_bank)) {
            $data = array(
                'UserId' => $UserId,
                'BankId' => $bankId,
                'RekNumber' => $rekNumb,
                'RekName' => $rekName,
                'Status' => $status,
                'AddDate' => date('Y-m-d'),
            );
            $this->db->insert('users_bank', $data);
        } else {
            $data['inputerror'][] = 'rekNumber';
            $data['error_string'][] = 'Account Number Already Exist..!';
            $data['status'] = FALSE;

            if ($data['status'] === FALSE) {
                echo json_encode($data);
                exit();
            }
        }
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update() {
        $UserId = $this->session->userdata('userId');
        $bankIdxx = $this->input->post('bankName');
        $rekNumbxx = $this->input->post('rekNumber');
        $id = $this->input->post('id');
        $bankId = $this->input->post('temp_bankName');
        $rekNumb = $this->input->post('temp_rekNumber');
        $status = $this->input->post('status');
        $this->_validate();
        $get_users_bank = $this->profile_model->getBankById($UserId, $bankIdxx, $rekNumbxx);
        if (empty($get_users_bank)) {
            $data = array(
                'BankId' => $this->input->post('bankName'),
                'RekNumber' => $this->input->post('rekNumber'),
                'Status' => $status,
                'EditDate' => date('Y-m-d'),
            );
            $this->db->update('users_bank', $data, array('UserId' => $id, 'BankId' => $bankId, 'RekNumber' => $rekNumb));
        } else {
            $data['inputerror'][] = 'rekNumber';
            $data['error_string'][] = 'Account Number Already Exist..!';
            $data['status'] = FALSE;

            if ($data['status'] === FALSE) {
                echo json_encode($data);
                exit();
            }
        }
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id, $bankId, $rekNumb) {
        $this->db->delete('users_bank', array('UserId' => $id, 'BankId' => $bankId, 'RekNumber' => $rekNumb));
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('bankName') == '') {
            $data['inputerror'][] = 'bankName';
            $data['error_string'][] = 'Bank Name is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('rekNumber') == '') {
            $data['inputerror'][] = 'rekNumber';
            $data['error_string'][] = 'Account Number is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    function edit_profile() {
        $id = $this->session->userdata("userId");
        $data['user_profile'] = $this->profile_model->getProfileById($id);
        $data['provinsi'] = $this->profile_model->provinsi();
        $data['list_bank'] = $this->profile_model->getListBank();
        $data['user_emergency'] = $this->profile_model->getUserEmergencyById($id);
        $data['user_work'] = $this->profile_model->getUserWorkById($id);
        $data['master_income_per_year'] = $this->profile_model->getMasterIncomePerYear();
        $data['user_list_assets'] = $this->profile_model->getUserListAssetById($id);
        $data['user_picture'] = $this->profile_model->getUserPictureId($id);
        $data['content'] = 'master/profile/edit_profile';
        $this->load->view('tampilan_home', $data);
    }

    function get_data_city() {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');
        if ($modul == "kabupaten") {
            echo $this->profile_model->kabupaten($id);
        }
    }

    function update_personal() {
        $id = $this->session->userdata("userId");
        $user_id = $this->input->post('user_id');
        $fname = $this->input->post('fullname');

        $address = strtoupper($this->input->post('address'));
        $provinsi = $this->input->post('provinsi');
        $city = $this->input->post('kabupaten-kota');
        $zipcode = $this->input->post('zipcode');
        $hphone = $this->input->post('home_number');
        $mphone = $this->input->post('mobile_number');
        $wphone = $this->input->post('work_number');
        $fax = $this->input->post('fax');
        $gender = $this->input->post('gender');
        $place = $this->input->post('place');
        $dd_birth = $this->input->post('dd');
        $mm_birth = $this->input->post('mm');
        $yy_birth = $this->input->post('yyyy');
        $religi = $this->input->post('religion');
        $birth = $yy_birth . "-" . $mm_birth . "-" . $dd_birth;
        $UserIdentityTypeId = $this->input->post('UserIdentityTypeId');
        $UserIdentityNumber = $this->input->post('UserIdentityNumber');
        $UserInvestmentExperience = $this->input->post('UserInvestmentExperience');
        $UserAreasOfInvestment = ($UserInvestmentExperience == "1" ? $this->input->post('UserAreasOfInvestment') : "" );
        $UserAccountPurpose = $this->input->post('UserAccountPurpose');
        $UserAccountPurposeInfo = ($UserAccountPurpose == "lainnya" ? $this->input->post('UserAccountPurposeInfo') : "");
        $UserNpwpFlag = $this->input->post('UserNpwpFlag');
        $UserNpwp = ($UserNpwpFlag == "1" ? $this->input->post('UserNpwp') : "");
        $UserHomeOwnership = $this->input->post('UserHomeOwnership');
        $UserHomeOwnershipInfo = ($UserHomeOwnership == "lainnya" ? $this->input->post('UserHomeOwnershipInfo') : "");
        $UserMaritalStatus = $this->input->post('UserMaritalStatus');
        $UserSpouse = $this->input->post('UserSpouse');
        $UserMother = $this->input->post('UserMother');
        $UserHaveFamilyIn = $this->input->post('UserHaveFamilyIn');
        $UserBankruptcy = $this->input->post('UserBankruptcy');

        $UserEmergencyContactName = $this->input->post('UserEmergencyContactName');
        $UserEmergencyContactPhoneNumber = $this->input->post('UserEmergencyContactPhoneNumber');
        $UserEmergencyContactRelationship = $this->input->post('UserEmergencyContactRelationship');
        $UserEmergencyContactAddress = $this->input->post('UserEmergencyContactAddress');
        $UserEmergencyContactZipCode = $this->input->post('UserEmergencyContactZipCode');

        $UserWorkWork = $this->input->post('UserWorkWork');
        $UserWorkWorkInfo = ($UserWorkWork == "lainnya" ? $this->input->post('UserWorkWorkInfo') : "");
        $UserWorkCompanyName = $this->input->post('UserWorkCompanyName');
        $UserWorkLineOfBusiness = $this->input->post('UserWorkLineOfBusiness');
        $UserWorkPosition = $this->input->post('UserWorkPosition');
        $UserWorkWorkingPeriod = $this->input->post('UserWorkWorkingPeriod');
        $UserWorkExWorkingPeriod = $this->input->post('UserWorkExWorkingPeriod');
        $UserWorkOfficeAddress = $this->input->post('UserWorkOfficeAddress');
        $UserWorkZipCode = $this->input->post('UserWorkZipCode');
        $UserWorkPhoneNumber = $this->input->post('UserWorkPhoneNumber');
        $UserWorkFacsimileNumber = $this->input->post('UserWorkFacsimileNumber');

        $UserListOfAssetIncomePerYearId = $this->input->post('UserListOfAssetIncomePerYearId');
        $UserListOfAssetHomeLocation = $this->input->post('UserListOfAssetHomeLocation');
        $UserListOfAssetValueSvto = $this->input->post('UserListOfAssetValueSvto');
        $UserListOfAssetBankDeposits = $this->input->post('UserListOfAssetBankDeposits');
        $UserListOfAssetTotal = $this->input->post('UserListOfAssetTotal');
        $UserListOfAssetOther = $this->input->post('UserListOfAssetOther');

        $this->_set_rules_personal();

        $data_personal = array(
            'FullName' => $fname,
            'HomePhoneNumber' => $hphone,
            'MobilePhoneNumber' => $mphone,
            'WorkPhoneNumber' => $wphone,
            'FaxNumber' => $fax,
            'Address' => $address,
            'Province' => $provinsi,
            'City' => $city,
            'ZipCode' => $zipcode,
            'Gender' => $gender,
            'birth_place' => $place,
            'BirthDay' => $birth,
            'Religion' => $religi,
            'identity_type_id' => $UserIdentityTypeId,
            'identity_number' => $UserIdentityNumber,
            'investment_experience' => $UserInvestmentExperience,
            'areas_of_investment' => $UserAreasOfInvestment,
            'account_purpose' => $UserAccountPurpose,
            'account_purpose_info' => $UserAccountPurposeInfo,
            'npwp_flag' => $UserNpwpFlag,
            'npwp' => $UserNpwp,
            'marital_status' => $UserMaritalStatus,
            'spouse' => $UserSpouse,
            'mother' => $UserMother,
            'home_ownership' => $UserHomeOwnership,
            'home_ownership_info' => $UserHomeOwnershipInfo,
            'have_family_in' => $UserHaveFamilyIn,
            'bankruptcy' => $UserBankruptcy,
            'EditDate' => date('Y-m-d H:i:s'),
            'EditUser' => $id
        );
        $data_users_emergency = array(
            'user_id' => $user_id,
            'name' => $UserEmergencyContactName,
            'phone_number' => $UserEmergencyContactPhoneNumber,
            'relationship' => $UserEmergencyContactRelationship,
            'address' => $UserEmergencyContactAddress,
            'zip_code' => $UserEmergencyContactZipCode,
        );
        $data_users_work = array(
            'user_id' => $user_id,
            'work' => $UserWorkWork,
            'work_info' => $UserWorkWorkInfo,
            'company_name' => $UserWorkCompanyName,
            'line_of_business' => $UserWorkLineOfBusiness,
            'position' => $UserWorkPosition,
            'working_period' => $UserWorkWorkingPeriod,
            'ex_working_period' => $UserWorkExWorkingPeriod,
            'office_address' => $UserWorkOfficeAddress,
            'zip_code' => $UserWorkZipCode,
            'phone_number' => $UserWorkPhoneNumber,
            'facsimile_number' => $UserWorkFacsimileNumber,
        );
        $data_user_list_assets = array(
            'user_id' => $user_id,
            'income_per_year_id' => $UserListOfAssetIncomePerYearId,
            'home_location' => $UserListOfAssetHomeLocation,
            'value_svto' => $UserListOfAssetValueSvto,
            'bank_deposits' => $UserListOfAssetBankDeposits,
            'total' => $UserListOfAssetTotal,
            'other' => $UserListOfAssetOther
        );

        $cek_user_emergency = $this->profile_model->getUserEmergencyById($user_id);
        $cek_user_work = $this->profile_model->getUserWorkById($user_id);
        $cek_user_list_assets = $this->profile_model->getUserListAssetById($user_id);

        $this->db->update('users_profile', $data_personal, array('UserId' => $user_id));

        if (!empty($cek_user_emergency)) {
            $this->db->update('users_emergency_contacts', array_merge($data_users_emergency, array('modified_by' => $id, 'modified' => date('Y-m-d H:i:s'))), array('user_id' => $user_id));
        } else {
            $this->db->insert('users_emergency_contacts', array_merge($data_users_emergency, array('created_by' => $id, 'created' => date('Y-m-d H:i:s'))));
        }
        if (!empty($cek_user_work)) {
            $this->db->update('users_works', array_merge($data_users_work, array('modified_by' => $id, 'modified' => date('Y-m-d H:i:s'))), array('user_id' => $user_id));
        } else {
            $this->db->insert('users_works', array_merge($data_users_work, array('created_by' => $id, 'created' => date('Y-m-d H:i:s'))));
        }
        if (!empty($cek_user_list_assets)) {
            $this->db->update('users_list_of_assets', array_merge($data_user_list_assets, array('modified_by' => $id, 'modified' => date('Y-m-d H:i:s'))), array('user_id' => $user_id));
        } else {
            $this->db->insert('users_list_of_assets', array_merge($data_user_list_assets, array('created_by' => $id, 'created' => date('Y-m-d H:i:s'))));
        }


        $arr_val = array('success' => true);
        $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><i class="ace-icon fa fa-times"></i></button>'
                . '<i class="glyphicon glyphicon-ok"></i> Update Succesfully </div>');

        echo json_encode(array("status" => TRUE));
    }

    function update_user_picture() {
        $id = $this->session->userdata("userId");
        $user_id = $this->input->post('user_id_photo');
        $filelama1 = $this->input->post('img_exist_photo_profile');
        $filelama2 = $this->input->post('img_exist_photo_identity');
        $filelama3 = $this->input->post('img_exist_photo_bank_account');
        //  $arr_val = array("status" => FALSE);
        //   if ($filelama1 != "" && $filelama2 != "" && $filelama3 != "") {
        if ((!empty($_FILES['photo_profile']['name']) || !empty($filelama1)) && (!empty($_FILES['photo_identity']['name']) || !empty($filelama2)) && (!empty($_FILES['photo_bank_account']['name']) || !empty($filelama3))) {
            $path = './uploads/profile/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            //$config['max_width'] = '1024';
            //$config['max_height'] = '768';
            //$config['file_name'] = $nmfile;
            $this->load->library('upload', $config);

            $image = array();
            foreach ($_FILES as $key => $value) {
                if (!$this->upload->do_upload($key)) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    //success
                    $data = $this->upload->data();
                    rename($data['full_path'], $data['file_path'] . $user_id . "_" . $data['file_name']);
//                    if (!empty($filelama1))
//                        @unlink($path . $filelama1);
//                    if (!empty($filelama2))
//                        @unlink($path . $filelama2);
//                    if (!empty($filelama3))
//                        @unlink($path . $filelama3);
                    //$image[] = $user_id . "_" . $data['file_name'];
                    $cek_user_picture = $this->profile_model->getUserPictureId($user_id);

                    if (!empty($cek_user_picture)) {
                        $this->db->update('users_pictures', array('user_id' => $user_id, $key => $user_id . "_" . $data['file_name']), array('user_id' => $user_id));
                    } else {
                        $this->db->insert('users_pictures', array('user_id' => $user_id, $key => $user_id . "_" . $data['file_name']));
                    }
                }
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><i class="ace-icon fa fa-times"></i></button>'
                    . '<i class="glyphicon glyphicon-ok"></i> Update Succesfully </div>');
            $arr_val = array("status" => TRUE);
        } else {
            $arr_val = array("status" => FALSE);
        }
        echo json_encode($arr_val);
    }

    private function _set_rules_personal() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('fullname') == '') {
            $data['inputerror'][] = 'fullname';
            $data['error_string'][] = 'fullname is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('place') == '') {
            $data['inputerror'][] = 'place';
            $data['error_string'][] = 'place is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('UserIdentityNumber') == '') {
            $data['inputerror'][] = 'UserIdentityNumber';
            $data['error_string'][] = 'UserIdentityNumber is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('UserInvestmentExperience') == 1) {
            if ($this->input->post('UserAreasOfInvestment') == "") {
                $data['inputerror'][] = 'UserAreasOfInvestment';
                $data['error_string'][] = 'UserAreasOfInvestment is required';
                $data['status'] = FALSE;
            }
        }
        if ($this->input->post('UserAccountPurpose') == "lainnya") {
            if ($this->input->post('UserAccountPurposeInfo') == "") {
                $data['inputerror'][] = 'UserAccountPurposeInfo';
                $data['error_string'][] = 'UserAccountPurposeInfo is required';
                $data['status'] = FALSE;
            }
        }
        if ($this->input->post('UserHomeOwnership') == "lainnya") {
            if ($this->input->post('UserHomeOwnershipInfo') == "") {
                $data['inputerror'][] = 'UserHomeOwnershipInfo';
                $data['error_string'][] = 'UserHomeOwnershipInfo is required';
                $data['status'] = FALSE;
            }
        }
        if ($this->input->post('UserNpwpFlag') == 1) {
            if ($this->input->post('UserNpwp') == "") {
                $data['inputerror'][] = 'UserNpwp';
                $data['error_string'][] = 'UserNpwp is required';
                $data['status'] = FALSE;
            }
        }
        if ($this->input->post('UserMother') == '') {
            $data['inputerror'][] = 'UserMother';
            $data['error_string'][] = 'UserMother is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {

            echo json_encode($data);
            exit();
        }
    }

    private function _set_rules_photo() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('img_exist_photo_profile') == '') {
            $data['inputerror'][] = 'img_exist_photo_profile';
            $data['error_string'][] = 'photo profile is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('img_exist_photo_identity') == '') {
            $data['inputerror'][] = 'img_exist_photo_identity';
            $data['error_string'][] = 'photo identity is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {

            echo json_encode($data);
            exit();
        }
    }

    public function remove_photo($id) {
        //$id = $this->session->userdata("userId");
        $path = './uploads/profile/';
        $rowdel = $this->profile_model->getImageBy($id);
        @unlink($path . $rowdel->photo_profile);

        $data = array('photo_profile' => '');

        $this->db->update('users_pictures', $data, array('user_id' => $id));

        echo json_encode(array("status" => TRUE));
    }

    function change_password() {
        $id = $this->session->userdata("userId");
        $newpassword = md5($this->input->post('newpwd'));

        $this->_set_rules_pwd();
        $arr_val = array('success' => false, 'messages' => array());
        if ($this->form_validation->run()) {
            $this->profile_model->updatePassword($id, $newpassword);

            $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><i class="ace-icon fa fa-times"></i></button>'
                    . '<i class="glyphicon glyphicon-ok"></i> Update Password Successfull </div>');
            $arr_val['success'] = true;
        } else {
            foreach ($_POST as $key => $value) {
                $arr_val['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($arr_val);
    }

    function _set_rules_pwd() {
        $this->form_validation->set_rules('oldpwd', 'oldpwd', 'trim|required|callback_pwdlama_check');
        $this->form_validation->set_rules('newpwd', 'newpwd', 'trim|required|min_length[6]');
        // $this->form_validation->set_rules('confpwd', 'confpwd', 'trim|required|min_length[6]|matches[newpwd]|md5');
        $this->form_validation->set_rules('confpwd', 'Password Confirmation', 'trim|required|matches[newpwd]');

        $this->form_validation->set_message('min_length', '* Minimal 6 karakter');
        $this->form_validation->set_message('matches', '* Konfirmasi Password tidak sama');
        $this->form_validation->set_message('required', '* Harus Isi');
        $this->form_validation->set_error_delimiters('<div class="text-danger" rode="alert">', '</div>');
    }

    function pwdlama_check($passwordlama) {
        $userid = $this->session->userdata("userId");
        $passwordlama = md5($this->input->post('oldpwd'));
        $dtpwdlama = $this->profile_model->get_userid($userid);
        foreach ($dtpwdlama->result() as $value) {

            $pwd = $value->Password;
            if ($pwd != $passwordlama) {
                $this->form_validation->set_message('pwdlama_check', '* Password Lama Anda Salah');
                return FALSE;
            } else {
                return TRUE;
                $passwordlama = "";
            }
        }
    }

//    function _set_rules_personal() {
//        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
//        $this->form_validation->set_rules('place', 'place', 'trim|required');
//        $this->form_validation->set_rules('dd', 'dd', 'trim|required');
//        $this->form_validation->set_rules('mm', 'mm', 'trim|required');
//        $this->form_validation->set_rules('yyyy', 'yyyy', 'trim|required');
//        $this->form_validation->set_rules('UserIdentityNumber', 'UserIdentityNumber', 'trim|required');
//        $this->form_validation->set_rules('UserInvestmentExperience', '', 'required|callback_UserAreasOfInvestment_check');
//        $this->form_validation->set_rules('UserAreasOfInvestment', 'UserAreasOfInvestment', 'callback_UserAreasOfInvestment_check');
//
//        $this->form_validation->set_message('required', '* required');
//        $this->form_validation->set_error_delimiters('<div class="text-danger" rode="alert">', '</div>');
//    }
//
//    function UserAreasOfInvestment_check($str) {
//        if ($str == 1) {
//            $this->form_validation->set_rules('UserAreasOfInvestment', 'UserAreasOfInvestment', 'trim|required');
//            $this->form_validation->set_message('UserAreasOfInvestment_check', '* required');
//            $this->form_validation->set_error_delimiters('<div class="text-danger" rode="alert">', '</div>');
//            return FALSE;
//        } else {
//            return TRUE;
//        }
//    }
}
