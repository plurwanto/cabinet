<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Global_config_model extends CI_Model {

    //var $table = 'setting';
//    var $column_order = array('SubjectMail', 'Type');
//    var $column_search = array('SubjectMail');
//    var $order = array('Type' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_data() {
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_by_id($id) {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id) {
        $this->db->where('Type', $id);
        $this->db->delete($this->table);
    }

    function getSetting() {
        $this->db->select('*');
        $query = $this->db->get('setting');
        return $query->row();
    }

    function getLevel() {
        $this->db->select('UserLevelID');
        $query = $this->db->get('users_levels');
        return $query->result_array();
    }

    function getLevelByid($id) {
        $this->db->select('UserLevelID,UserLevelName')
                ->where('UserLevelID', $id);
        $query = $this->db->get('users_levels');
        return $query->row();
    }

    function getMailTemplateBy($id) {
        $this->db->where('Type', $id);
        $this->db->select('SubjectMail,BodyMail,Note');
        $query = $this->db->get('mail_template');
        return $query->row();
    }

    function getUserInfoById($id) {
        $this->db->where('users_profile.UserId', $id)
                ->select('users_profile.UserId,users_profile.FullName,users_profile.Email,users_profile.MobilePhoneNumber,users_pictures.photo_profile')
                ->from('users_profile')
                ->join('users_pictures', 'users_pictures.user_id = users_profile.UserId', 'left');
        $query = $this->db->get();
        return $query->row();
    }

    function sendemail($saltid, $subject, $html_content) {
        // configure the email setting
        $dataSetting = $this->getSetting();
        $protocol = $dataSetting->MailProtocol;
        $host = $dataSetting->MailHost;
        $name = $dataSetting->MailName;
        $user = $dataSetting->MailUser;
        $pass = $dataSetting->MailPass;
        $port = $dataSetting->MailPort;

        $config['protocol'] = $protocol;
        $config['smtp_host'] = $host; //smtp host name
        $config['smtp_port'] = $port; //smtp port number
        $config['smtp_user'] = $user;
        $config['smtp_pass'] = $pass; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes

        $this->email->initialize($config);

        $this->email->from($user, $name);
        $this->email->to($saltid);
        $this->email->subject($subject);
        $message = $html_content;
        $this->email->message($message);
        return $this->email->send();
    }

    function category_menu() {
        $userLevel = $this->session->userdata("userlevel");

//        $query = $this->db->query("select id, menu_name, menu_link, alias,
//            parent_id from " . $this->menu . " order by parent_id,menu_link DESC,id");
        $query = $this->db->query("SELECT 
                                        a.id,
                                        a.menu_name,
                                        a.menu_link,
                                        a.alias,
                                        a.parent_id,
                                        a.sort_order,
                                        a.icon,
                                        b.show_menu
                                      FROM
                                        menu a LEFT JOIN userlevelpermissions b
                                        ON a.id = b.menu_id
                                        WHERE b.userlevelid = '$userLevel' AND b.show_menu='1'
                                      ORDER BY a.parent_id,a.sort_order,a.menu_link DESC");

        $cat = array(
            'items' => array(),
            'parents' => array()
        );

        foreach ($query->result() as $cats) {
            $cat['items'][$cats->id] = $cats;

            $cat['parents'][$cats->parent_id][] = $cats->id;
        }
        if ($cat) {
            $result = $this->build_category_menu(0, $cat);
            return $result;
        } else {
            return FALSE;
        }
    }

    function build_category_menu($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $html .= "<ul class='main-navigation-menu'>";
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $html .= "<li class=" . ($this->uri->segment(1) == strtolower($menu['items'][$itemId]->alias) ? 'active' : '' ) . "><a href='" . base_url() . $menu['items'][$itemId]->menu_link . "'><div class='item-content'><div class='item-media'><i class='" . $menu['items'][$itemId]->icon . "'></i></div><div class='item-inner'><span class='title'>" . $menu['items'][$itemId]->menu_name . " </span></div></div></a></li>";
                }
                if (isset($menu['parents'][$itemId])) {
                    $html .= "<li class=" . ($this->uri->segment(1) == strtolower($menu['items'][$itemId]->alias) ? 'active' : '' ) . "><a href='javascript:void(0)'><div class='item-content'><div class='item-media'><i class='" . $menu['items'][$itemId]->icon . "'></i></div><div class='item-inner'><span class='title'>" . $menu['items'][$itemId]->menu_name . " </span><i class='icon-arrow'></i><span class='selected'></span></div></div></a>";
                    $html .= "<ul class='sub-menu'>";
                    $html .= "<li class=" . ($this->uri->segment(2) == $this->build_category_child($itemId, $menu) ? 'active' : '' ) . "><a href='" . base_url() . $menu['items'][$itemId]->menu_link . "'><span class='title'>";
                    $html .= $this->build_category_child($itemId, $menu);
                    $html .= "</span></a>";
                    $html .= "</li>";
                    $html .= "</ul>";
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    }

    function build_category_child($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            //$html .= "<ul>";
            foreach ($menu['parents'][$parent] as $itemId) {
                if (!isset($menu['parents'][$itemId])) {
                    $html .= "<a href='" . base_url() . $menu['items'][$itemId]->menu_link . "'>" . $menu['items'][$itemId]->menu_name . " </a>";
                }
                if (isset($menu['parents'][$itemId])) {
                    // $html .= "<li><a class='parent' href='javascript:void(0)'><span>" . $menu['items'][$itemId]->menu_link . " </span></a>";
                    $html .= $this->build_category_child($itemId, $menu);
                    //  $html .= "</li>";
                }
            }
            // $html .= "</ul>";
        }
        return $html;
    }

    function getRoot() {
        $this->db->where('parent_id', '0');
        $this->db->order_by('sort_order', 'ASC');
        $query = $this->db->get('menu');
        return $query->result_array();
    }

    function getCompliment($newmenu) {
        $sql = "select (
			select count(distinct menu_name) from menu where parent_id='0') as JmlRoot,
			(
                            select distinct sort_order from menu where id='$newmenu'
			) as urutan";
        // echo $sql;
        $qry = $this->db->query($sql);
        return $qry->row();
    }

    function getCompliment_submenu($newmenu) {
        $sql = "select (
			select count(distinct menu_name) from menu where parent_id != '0') as JmlRoot,
			(
                            select distinct sort_order from menu where id='$newmenu'
			) as urutan";
        $qry = $this->db->query($sql);
        return $qry->row();
    }

    function getNewSortir() {
        $sql = "select distinct id,sort_order from menu where parent_id='0' order by sort_order";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    function getNewSortir_submenu() {
        $sql = "select distinct id,sort_order from menu where parent_id != '0' order by id,sort_order";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    function UrutanMenu($menunya) {
        $sql = "select distinct sort_order from menu where id='$menunya'";
        $qry = $this->db->query($sql);
        return $qry->row();
    }

    function UrutanSubMenu($menunya) {
        $submenu = "<option value=''>Baris Awal</pilih>";
        $this->db->order_by('sort_order', 'ASC');
        $sub = $this->db->get_where('menu', array('parent_id' => $menunya));
        // echo $this->db->last_query();
        foreach ($sub->result_array() as $data) {
            $submenu .= "<option value='$data[sort_order]|$data[id]'>$data[menu_name]</option>";
        }
        return $submenu;
    }

    function getMenuById($id) {
        $this->db->where('userlevelpermissions.userlevelid', $id)
                ->select('userlevelpermissions.*,menu.menu_name,menu.parent_id')
                ->from('userlevelpermissions')
                ->join('menu', 'menu.id = userlevelpermissions.menu_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getPermissionsByIdMenu($id, $arr) {
        ($arr == "" ? "" : $this->db->where('menu_link', $arr));
        $this->db->where('userlevelpermissions.userlevelid', $id)
                ->select('userlevelpermissions.*,menu.menu_name,menu.parent_id,menu.menu_link')
                ->from('userlevelpermissions')
                ->join('menu', 'menu.id = userlevelpermissions.menu_id', 'left');
        $query = $this->db->get();
//       echo $this->db->last_query();
        return $query->row();
    }

    function autoNumber($id, $table, $val) {
        error_reporting(0);
        $query = 'SELECT MAX(' . $id . ') AS max_id FROM ' . $table . ' ORDER BY ' . $id;
        $result = $this->db->query($query);
        $data = $result->result_array();
        //echo $data[0]['max_id'];die();
        if (!empty($data[0]['max_id'])) {
            $id_max = $data[0]['max_id'];
        } else {
            $id_max = $val;
        }
        $sort_num = substr($id_max, 0, 1);
        $new_code = $id_max + 1;
        return $new_code;
    }
    
    function autoNumber_real_accounts($id, $val) {
        error_reporting(0);
        $query = 'SELECT MAX(' . $id . ') AS max_id FROM temp_real_accounts UNION ALL SELECT MAX(' . $id . ') AS max_id FROM real_accounts ORDER BY max_id IS NULL';
        $result = $this->db->query($query);
        $data = $result->result_array();
        //echo $data[0]['max_id'];die();
        if (!empty($data[0]['max_id'])) {
            $id_max = $data[0]['max_id'];
        } else {
            $id_max = $val;
        }
        $sort_num = substr($id_max, 0, 1);
        $new_code = $id_max + 1;
        return $new_code;
    }

    function getMenuBreadcrumb($uri) {
        $this->db->where('alias', $uri)
                ->select('menu_name,alias')
                ->from('menu');
        $query = $this->db->get();
        return $query->row();
    }

}
