<?php
class Sysconfig extends CI_Controller {

    var $table = 'setting';

    public function __construct() {
        parent::__construct();
        $this->load->model('settings/Global_config_model', 'Global_config_model');
        $this->load->library(array('session', 'form_validation'));
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {
        $data['fileList'] = $this->Global_config_model->get_data();
        $data['content'] = 'settings/view_sysconfig';
        $this->load->view('tampilan_home', $data);
    }

    function update() {
        $companyname = $this->input->post('company');
        $companyaddress = $this->input->post('address');
        $companyphone = $this->input->post('phone');
        $companymail = $this->input->post('email');
        $mailprotocol = $this->input->post('mailprotocol');
        $mailhost = $this->input->post('mailhost');
        $mailname = $this->input->post('mailname');
        $mailuser = $this->input->post('mailaccount');
        $mailpass = $this->input->post('mailpassword');
        $mailport = $this->input->post('port');
        $UserId = $this->session->userdata('userId');
        $filelama = $this->input->post('img_exist');

        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo']['name'];
            $nmfile = $photo;
            $path = './uploads/logo/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            //$config['max_width'] = '1024';
            //$config['max_height'] = '768';
            $config['file_name'] = $nmfile;

            $this->load->library('upload', $config);

            $this->upload->do_upload('photo');
            $img = $this->upload->data();
            @unlink($path . $filelama);
            $img_upload = $img['file_name'];

            $data_logo = array('CompanyLogo' => $img_upload);
        }

        $data = array('CompanyName' => $companyname,
            'CompanyAddress' => $companyaddress,
            'CompanyPhone' => $companyphone,
            'CompanyMail' => $companymail,
            'MailProtocol' => $mailprotocol,
            'MailHost' => $mailhost,
            'MailName' => $mailname,
            'MailUser' => $mailuser,
            'MailPass' => $mailpass,
            'MailPort' => $mailport,
            'UpdateDate' => date('Y-m-d H:i:s'),
            'UpdateUser' => $UserId,
        );

        if (!empty($_FILES['photo']['name'])) {
            $this->Global_config_model->update(array('UpdateUser' => $UserId), array_merge($data, $data_logo));
        } else {
            $this->Global_config_model->update(array('UpdateUser' => $UserId), $data);
        }


        $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>'
                . '<i class="glyphicon glyphicon-ok"></i> Update Successfull </div>');
        redirect('settings/sysconfig');
    }

    public function ajax_list() {
        $list = $this->Global_config_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sysconfig) {
            $no++;
            $status = ($sysconfig->Status == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $row = array();
            $row[] = $sysconfig->Type;
            $row[] = $sysconfig->SubjectMail;
            $row[] = $sysconfig->BodyMail;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_sysconfig(' . "'" . $sysconfig->Id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_sysconfig(' . "'" . $sysconfig->Id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Global_config_model->count_all(),
            "recordsFiltered" => $this->Global_config_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function ajax_edit($id) {
        $data = $this->Global_config_model->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();
        $data = array(
            'Type' => $this->input->post('type'),
            'SubjectMail' => $this->input->post('subjectName'),
            'BodyMail' => htmlentities($this->input->post('editor1')),
            'Status' => $this->input->post('status'),
            'AddDate' => date('Y-m-d'),
            'AddUser' => $UserId,
        );
        $insert = $this->Global_config_model->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();
        $data = array(
            'Type' => $this->input->post('type'),
            'SubjectMail' => $this->input->post('subjectName'),
            'BodyMail' => html_entity_decode($this->input->post('editor1')),
            'Status' => $this->input->post('status'),
            'EditDate' => date('Y-m-d'),
            'EditUser' => $UserId,
        );

        $this->Global_config_model->update(array('Id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        $this->Global_config_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('type') == '') {
            $data['inputerror'][] = 'type';
            $data['error_string'][] = 'Type is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('subjectName') == '') {
            $data['inputerror'][] = 'subjectName';
            $data['error_string'][] = 'Subject Name is required';
            $data['status'] = FALSE;
        }

        if ($this->input->post('editor1') == '') {
            $data['inputerror'][] = 'editor1';
            $data['error_string'][] = 'Content is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

}
