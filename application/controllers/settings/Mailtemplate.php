<?php
class Mailtemplate extends CI_Controller {

    var $table = 'mail_template';
    var $column_order = array('SubjectMail', 'Type');
    var $column_search = array('SubjectMail');
    var $order = array('Type' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->model('settings/Global_config_model', 'Global_config_model');
        $this->load->helper('url');
        $this->load->library(array('session', 'form_validation'));
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {
        $data['content'] = 'settings/view_mailtemplate';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_list() {
        $list = $this->Global_config_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $mailtemplate) {
            $no++;
            $status = ($mailtemplate->Status == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $row = array();
            $row[] = $mailtemplate->Type;
            $row[] = $mailtemplate->SubjectMail;
            //$row[] = $mailtemplate->BodyMail;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_mailtemplate(' . "'" . $mailtemplate->Id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_mailtemplate(' . "'" . $mailtemplate->Id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

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

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

}
