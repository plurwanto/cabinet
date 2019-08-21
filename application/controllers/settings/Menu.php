<?php
class Menu extends CI_Controller {

    var $table = "menu";
    var $column_order = array('menu_name', 'alias');
    var $column_search = array('menu_name');
    var $order = array('parent_id' => 'desc', 'sort_order' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->model('settings/global_config_model', 'global_config_model');
        $this->load->library(array('session', 'form_validation'));
        if (empty($this->session->userdata("userId"))) {
            redirect('login');
        }
    }

    function index() {
        $data['content'] = 'settings/view_menu';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_list() {
        $list = $this->global_config_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $menu) {
            $no++;
            $status = ($menu->flag_aktif == 'Y' ? '<span class="label label-sm label-success">Active</span>' : '<span class="label label-sm label-danger">Not Active</span>');
            $row = array();
            $row[] = $menu->menu_name;//($menu->parent_id <> '0' ? " -> " . $menu->menu_name : $menu->menu_name);
            $row[] = $menu->menu_link;
            $row[] = $menu->alias;
            $row[] = $menu->icon;
            $row[] = $status;

            $row[] = '<a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_data(' . "'" . $menu->id . "'" . ')"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-transparent btn-xs" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $menu->id . "'" . ')"><i class="fa fa-times fa fa-white"></i></a>';

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

    function add_menu() {
        $data['kode'] = $this->global_config_model->autoNumber('id', 'menu', '1000');
        $data['parent'] = $this->global_config_model->getRoot();
        $data['sort'] = "";
        $data['content'] = 'settings/add_menu';
        $this->load->view('tampilan_home', $data);
    }

    function add_sub_menu() {
        $data['kode'] = $this->global_config_model->autoNumber('id', 'menu', '1000');
        $data['parent'] = $this->global_config_model->getRoot();
        $data['subMenu'] = $this->global_config_model->UrutanSubMenu();
        $data['sort'] = "";
        $data['content'] = 'settings/add_sub_menu';
        $this->load->view('tampilan_home', $data);
    }

    public function ajax_edit($id) {
        $data = $this->global_config_model->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add_menu() {
        $UserId = $this->session->userdata("userId");
        $menu = trim(ucfirst($this->input->post('menuName')));
        $after = $this->input->post('sortBy');
        $sort_after = explode('|', $after);
        $id = $sort_after[1];
        $icon = trim($this->input->post('icon'));
        $getAllLevel = $this->global_config_model->getLevel();
        $compliment = $this->global_config_model->getCompliment($id);
        $this->_validate();
        $arr_val = array('success' => false, 'messages' => array());

        if ($this->form_validation->run()) {
            if ($compliment->JmlRoot == $compliment->urutan) {  //menu baru berada di urutan paling bawah
                $urutanMenu = (int) $compliment->urutan + 1;
            } else {
                $menuLain = $this->global_config_model->getNewSortir();
                if ($after == "") { //menu baru berada di urutan paling atas
                    $urutanMenu = 1;
                    for ($a = 0; $a < count($menuLain); $a++) {
                        $UrutanBaru = (int) $menuLain[$a]['sort_order'] + 1;
                        unset($data);
                        $data = array(
                            'sort_order' => $UrutanBaru
                        );
                        $this->db->update('menu', $data, array('id' => $menuLain[$a]['id']));
                    }
                } else { //menu disisipkan di antara menu lama
                    $getUrutan = $this->global_config_model->UrutanMenu($id);
                    $urutanMenu = $getUrutan->sort_order + 1;
                    for ($a = 0; $a < count($menuLain); $a++) {
                        if ($menuLain[$a]['sort_order'] > $getUrutan->sort_order) {
                            $UrutanBaru = (int) $menuLain[$a]['sort_order'] + 1;
                            unset($data);
                            $data = array(
                                'sort_order' => $UrutanBaru
                            );
                            $this->db->update('menu', $data, array('id' => $menuLain[$a]['id']));
                        }
                    }
                }
            }
            $data = array(
                'id' => $this->input->post('id'),
                'menu_name' => $menu,
                'menu_link' => strtolower($this->input->post('menuUrl')),
                'alias' => strtolower($this->input->post('alias')),
                'parent_id' => '0',
                'sort_order' => $urutanMenu,
                'icon' => $icon,
                'add_date' => date('Y-m-d H:i:s'),
                'add_user' => $UserId,
            );
            $insert = $this->global_config_model->save($data);

            foreach ($getAllLevel as $value) {
                $data = array(
                    'userlevelid' => $value['UserLevelID'],
                    'menu_id' => $this->input->post('id')
                );
                $this->db->insert('userlevelpermissions', $data);
            }
            $arr_val = array('success' => true);
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><i class="icon fa fa-times"></i></button>'
                    . '<i class="glyphicon glyphicon-ok"></i> Insert Succesfully </div>');
           // redirect('settings/menu');
        } else {
            foreach ($_POST as $key => $value) {
                $arr_val['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($arr_val);
    }

    public function ajax_add_sub_menu() {
        $UserId = $this->session->userdata("userId");
        $menu = trim(ucfirst($this->input->post('menuName')));
        $after = $this->input->post('sortBy');
        $sort_after = explode('|', $after);
        $id = $sort_after[1];
        $root = $this->input->post('rootMenu');
        $getAllLevel = $this->global_config_model->getLevel();
        $compliment = $this->global_config_model->getCompliment_submenu($id);
        //  $this->_validate();

        if ($compliment->JmlRoot == $compliment->urutan) {  //menu baru berada di urutan paling bawah
            $urutanMenu = (int) $compliment->urutan + 1;
        } else {
            $menuLain = $this->global_config_model->getNewSortir_submenu();
            if ($after == "") { //menu baru berada di urutan paling atas
                $urutanMenu = 1;
                for ($a = 0; $a < count($menuLain); $a++) {
                    $UrutanBaru = (int) $menuLain[$a]['sort_order'] + 1;
                    unset($data);
                    $data = array(
                        'sort_order' => $UrutanBaru
                    );
                    $this->db->update('menu', $data, array('id' => $menuLain[$a]['id']));
                }
            } else { //menu disisipkan di antara menu lama
                $getUrutan = $this->global_config_model->UrutanMenu($id);
                $urutanMenu = $getUrutan->sort_order + 1;
                for ($a = 0; $a < count($menuLain); $a++) {
                    if ($menuLain[$a]['sort_order'] > $getUrutan->sort_order) {
                        $UrutanBaru = (int) $menuLain[$a]['sort_order'] + 1;
                        unset($data);
                        $data = array(
                            'sort_order' => $UrutanBaru
                        );
                        $this->db->update('menu', $data, array('id' => $menuLain[$a]['id']));
                    }
                }
            }
        }

        $data = array(
            'id' => $this->input->post('id'),
            'menu_name' => $menu,
            'menu_link' => strtolower($this->input->post('menuUrl')),
            'alias' => strtolower($this->input->post('alias')),
            'parent_id' => $root,
            'sort_order' => $urutanMenu,
            'add_date' => date('Y-m-d H:i:s'),
            'add_user' => $UserId,
        );
        $insert = $this->global_config_model->save($data);

        foreach ($getAllLevel as $value) {
            $data = array(
                'userlevelid' => $value['UserLevelID'],
                'menu_id' => $this->input->post('id')
            );
            $this->db->insert('userlevelpermissions', $data);
        }

        $this->session->set_flashdata('msg', '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><i class="icon fa fa-times"></i></button>'
                . '<i class="glyphicon glyphicon-ok"></i> Insert Succesfully </div>');
        redirect('settings/menu');

        echo json_encode(array("status" => TRUE));
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
