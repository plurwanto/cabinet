<?php
class Products extends CI_Controller {

    var $table = 'products';

    public function __construct() {
        parent::__construct();
        $this->load->model('master/global_master_model', 'globalmastermodel');
        $this->load->library(array('session', 'form_validation'));
        if (empty($this->session->userdata("username"))) {
            redirect('login');
        }
    }

    function index() {
        $data['list_platform'] = $this->globalmastermodel->get_all_platforms();
        $data['content'] = 'master/products/view_products';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_list() {
        $list = $this->globalmastermodel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $products) {
            $no++;
            $status = ($products->Status == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $list_platform = $this->globalmastermodel->get_platforms_by_id($products->Platform_id);
            $row = array();
            $row[] = $products->Name;
            $row[] = $list_platform[0]['Name'];
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $products->id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $products->id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

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
            'Platform_id' => $this->input->post('sltplatforms'),
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
            'Platform_id' => $this->input->post('sltplatforms'),
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
