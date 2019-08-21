<?php
class Bank extends CI_Controller {

    var $table = 'bank';

    public function __construct() {
        parent::__construct();
        $this->load->model('master/global_master_model', 'globalmastermodel');
        $this->load->library(array('session', 'form_validation'));
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {
        $data['content'] = 'master/bank/view_bank';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_list() {
        $list = $this->globalmastermodel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bank) {
            $no++;
            $status = ($bank->Status == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $row = array();
            $row[] = $bank->BankName;
            $row[] = $bank->Account_Name;
            $row[] = $bank->AccountNumber;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_bank(' . "'" . $bank->id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_bank(' . "'" . $bank->id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

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
            'BankName' => strtoupper($this->input->post('bankName')),
            'Account_Name' => strtoupper($this->input->post('accountName')),
            'AccountNumber' => $this->input->post('accountNumber'),
            'Status' => $this->input->post('status'),
            'AddDate' => date('Y-m-d'),
            'AddUser' => $UserId,
        );
        $insert = $this->globalmastermodel->save($this->table, $data);

        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update() {
        $UserId = $this->session->userdata('userId');
        $this->_validate();
        $data = array(
            'BankName' => strtoupper($this->input->post('bankName')),
            'Account_Name' => strtoupper($this->input->post('accountName')),
            'AccountNumber' => $this->input->post('accountNumber'),
            'Status' => $this->input->post('status'),
            'EditDate' => date('Y-m-d'),
            'EditUser' => $UserId,
        );
        $this->globalmastermodel->update($this->table, array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        $this->globalmastermodel->delete_by_id($id);
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
        if ($this->input->post('accountName') == '') {
            $data['inputerror'][] = 'accountName';
            $data['error_string'][] = 'Account Name is required';
            $data['status'] = FALSE;
        }
        if ($this->input->post('accountNumber') == '') {
            $data['inputerror'][] = 'accountNumber';
            $data['error_string'][] = 'Account Number is required';
            $data['status'] = FALSE;
        }
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

}
