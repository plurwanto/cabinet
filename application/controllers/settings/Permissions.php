<?php
class Permissions extends CI_Controller {

    var $table = "users_levels";
    var $column_order = array('UserLevelID', 'UserLevelName');
    var $column_search = array('UserLevelID', 'UserLevelName');
    var $order = array('UserLevelID' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->model('settings/global_config_model', 'global_config_model');
        $this->load->library(array('session', 'form_validation', 'globallib'));
        if (empty($this->session->userdata("userId"))) {
            redirect('login');
        }
    }

    function index() {
        $session_level = $this->session->userdata("userlevel");
        $mylib = new Globallib();
        $permission = $mylib->getAllowList($session_level);
        $data['write_permission'] = $permission['write_permission'];

        $data['content'] = 'settings/view_permissions';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_list() {
        $session_level = $this->session->userdata("userlevel");
        $mylib = new Globallib();
        $permission = $mylib->getAllowList($session_level);

        $list = $this->global_config_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $permissions) {
            $no++;
            $status = ($permissions->Status == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $row = array();
            $row[] = $permissions->UserLevelID;
            $row[] = $permissions->UserLevelName;
            $row[] = $status;
            $row[] = ($permission['update_permission'] && $permissions->UserLevelID != "-1" ? '<a class="btn btn-transparent btn-xs" href="' . site_url('settings/permissions/users_permissions/' . $permissions->UserLevelID . '"') . '" title="Set Permissions"><i class="ti-key"></i></a>' : '');

            //$row[] = ($permissions->UserLevelID != '-1' ? '<a class="btn btn-transparent btn-xs" href="' . site_url('settings/permissions/users_permissions/' . $permissions->UserLevelID . '"') . '" title="Set Permissions"><i class="ti-key"></i></a>' : '');
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->global_config_model->count_all(),
            "recordsFiltered" => $this->global_config_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function users_permissions($id) {
        $data['list_menu'] = $this->global_config_model->getMenuById($id);
        $data['userlevelname'] = $this->global_config_model->getLevelByid($id);
        $data['content'] = 'settings/set_permissions';
        $this->load->view('tampilan_home', $data);
    }

    function add_menu() {
        $data['kode'] = $this->global_config_model->autoNumber('id', 'menu', '1000');
        $data['parent'] = $this->global_config_model->getRoot();
        $data['sort'] = "";
        $data['content'] = 'settings/add_menu';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_set_permissions() {
        $userId = $this->session->userdata('userId');
        $userLevel = $this->input->post("userlevelID");
        $ids = $this->input->post('menu_id');
        $chk_add_arr = $this->input->post("chkadd");
        $chk_edit_arr = $this->input->post("chkedit");
        $chk_delete_arr = $this->input->post("chkdelete");
        $chk_view_arr = $this->input->post("chkview");
        $chk_showmenu_arr = $this->input->post("chkshow");
        foreach ($ids as $key => $value) {
            $data = array(
                //   "menu_id" => $value,
                "user_add" => !empty($chk_add_arr[$value]) ? "Y" : "T",
                "user_edit" => !empty($chk_edit_arr[$value]) ? "Y" : "T",
                "user_delete" => !empty($chk_delete_arr[$value]) ? "Y" : "T",
                "user_view" => !empty($chk_view_arr[$value]) ? "Y" : "T",
                "show_menu" => !empty($chk_showmenu_arr[$value]) ? 1 : 0,
                "update_date" => date("Y-m-d H:i:s"),
                "update_user" => $userId
            );
            $this->db->update("userlevelpermissions", $data, array("userlevelid" => $userLevel, "menu_id" => $value));
//            echo "<pre>";
//            echo $this->db->last_query();
//            echo "</pre>";
        }

        $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><i class="icon fa fa-times"></i></button>'
                . '<i class="glyphicon glyphicon-ok"></i> Update Succesfully </div>');
        redirect('settings/permissions');


        //  $this->db->update("userlevelpermissions", array("user_add" => $yesno), array("userlevelid" => $userLevel));
        // echo $this->db->last_query();
//        $UserId = $this->session->userdata("userId");
//        $menu = trim(ucfirst($this->input->post('menuName')));
//        $after = $this->input->post('sortBy');
//        $sort_after = explode('|', $after);
//        $id = $sort_after[1];
//        $icon = trim($this->input->post('icon'));
//        $getAllLevel = $this->global_config_model->getLevel();
//        $compliment = $this->global_config_model->getCompliment($id);
//        $this->_validate();
//        $arr_val = array('success' => false, 'messages' => array());
//
//        if ($this->form_validation->run()) {
//            if ($compliment->JmlRoot == $compliment->urutan) {  //menu baru berada di urutan paling bawah
//                $urutanMenu = (int) $compliment->urutan + 1;
//            } else {
//                $menuLain = $this->global_config_model->getNewSortir();
//                if ($after == "") { //menu baru berada di urutan paling atas
//                    $urutanMenu = 1;
//                    for ($a = 0; $a < count($menuLain); $a++) {
//                        $UrutanBaru = (int) $menuLain[$a]['sort_order'] + 1;
//                        unset($data);
//                        $data = array(
//                            'sort_order' => $UrutanBaru
//                        );
//                        $this->db->update('menu', $data, array('id' => $menuLain[$a]['id']));
//                    }
//                } else { //menu disisipkan di antara menu lama
//                    $getUrutan = $this->global_config_model->UrutanMenu($id);
//                    $urutanMenu = $getUrutan->sort_order + 1;
//                    for ($a = 0; $a < count($menuLain); $a++) {
//                        if ($menuLain[$a]['sort_order'] > $getUrutan->sort_order) {
//                            $UrutanBaru = (int) $menuLain[$a]['sort_order'] + 1;
//                            unset($data);
//                            $data = array(
//                                'sort_order' => $UrutanBaru
//                            );
//                            $this->db->update('menu', $data, array('id' => $menuLain[$a]['id']));
//                        }
//                    }
//                }
//            }
//            $data = array(
//                'id' => $this->input->post('id'),
//                'menu_name' => $menu,
//                'menu_link' => strtolower($this->input->post('menuUrl')),
//                'alias' => strtolower($this->input->post('alias')),
//                'parent_id' => '0',
//                'sort_order' => $urutanMenu,
//                'icon' => $icon,
//                'add_date' => date('Y-m-d H:i:s'),
//                'add_user' => $UserId,
//            );
//            $insert = $this->global_config_model->save($data);
//
//            foreach ($getAllLevel as $value) {
//                $data = array(
//                    'userlevelid' => $value['UserLevelID'],
//                    'menu_id' => $this->input->post('id')
//                );
//                $this->db->insert('userlevelpermissions', $data);
//            }
//            $arr_val = array('success' => true);
//            $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><i class="icon fa fa-times"></i></button>'
//                    . '<i class="glyphicon glyphicon-ok"></i> Insert Succesfully </div>');
//            // redirect('settings/menu');
//        } else {
//            foreach ($_POST as $key => $value) {
//                $arr_val['messages'][$key] = form_error($key);
//            }
//        }
//
//        echo json_encode($arr_val);
    }

    function get_data_submenu() {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');
        if ($modul == "submenu") {
            echo $this->global_config_model->UrutanSubMenu($id);
        }
    }

    public function ajax_update() {
        $UserId = $this->session->userdata("userId");
        // $this->_validate();
        $data = array(
            'Type' => $this->input->post('type'),
            'SubjectMail' => $this->input->post('subjectName'),
            'BodyMail' => html_entity_decode($this->input->post('editor1')),
            'Status' => $this->input->post('status'),
            'EditDate' => date('Y-m-d'),
            'EditUser' => $UserId,
        );

        $this->global_config_model->update(array('Id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id) {
        $this->global_config_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate() {
        $this->form_validation->set_rules('menuName', 'menuName', 'required|is_unique[menu.menu_name]');
        $this->form_validation->set_error_delimiters('<div class="text-danger" rode="alert">', '</div>');
        $this->form_validation->set_message('required', '* required field');
        $this->form_validation->set_message('is_unique', '* already exist..!');
    }

}
