<?php
class Platforms extends CI_Controller {

    var $table = 'platforms';

    public function __construct() {
        parent::__construct();
        $this->load->model('master/global_master_model', 'globalmastermodel');
        $this->load->library(array('session', 'form_validation'));
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {
        $data['content'] = 'master/platforms/view_platforms';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_list() {
        $list = $this->globalmastermodel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $platforms) {
            $no++;
            $status = ($platforms->Status == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $row = array();
            $row[] = $platforms->Name;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $platforms->id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $platforms->id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->globalmastermodel->count_all(),
            "recordsFiltered" => $this->globalmastermodel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function ajax_edit($id) {
        $data = $this->globalmastermodel->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();
        $data = array(
            'Name' => strtoupper($this->input->post('name')),
            'Status' => $this->input->post('status'),
            'AddDate' => date('Y-m-d H:i:s'),
            'AddUser' => $UserId,
        );
        $insert = $this->globalmastermodel->save($this->table, $data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();
        $data = array(
            'Name' => strtoupper($this->input->post('name')),
            'Status' => $this->input->post('status'),
            'EditDate' => date('Y-m-d H:i:s'),
            'EditUser' => $UserId,
        );
        $this->globalmastermodel->update($this->table, array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        $this->globalmastermodel->delete_by_id($this->table, $id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('name') == '') {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'Nama Harus di isi';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

}
