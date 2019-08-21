<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Demo_account_model extends CI_Model {

    var $table = 'demo_accounts';
    var $column_order = array('users_profile.FullName', 'users_profile.Email', 'demo_accounts.created');
    var $column_search = array('users_profile.FullName', 'users_profile.Email');
    var $order = array('created' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        //$this->db->from($this->table);
        $this->db->select('demo_accounts.*,account_types.Name AS Type,platforms.Name AS Platform,products.Name AS Product,users_profile.FullName,users_profile.Email')
                ->from('demo_accounts')
                ->join('account_types', 'account_types.id=demo_accounts.account_type_id', 'left')
                ->join('platforms', 'platforms.id=demo_accounts.platform_id', 'left')
                ->join('products', 'products.id=demo_accounts.product_id', 'left')
                ->join('users_profile', 'users_profile.UserId=demo_accounts.user_id', 'left');
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

    function getMyAccountList() {
        $this->db->select('demo_accounts.*,account_types.Name AS Type,platforms.Name AS Platform,products.Name AS Product')
                ->from('demo_accounts')
                ->join('account_types', 'account_types.id=demo_accounts.account_type_id', 'left')
                ->join('platforms', 'platforms.id=demo_accounts.platform_id', 'left')
                ->join('products', 'products.id=demo_accounts.product_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
    }

    function getMyAccountListById($id) {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    function getUserInfoById($id) {
        $this->db->select('UserId,FullName,Email')
                ->from('users_profile')
                ->where('UserId', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function getVerifyAccountById($id) {
        $this->db->select('demo_accounts.*,account_types.Name AS Type,platforms.Name AS Platform,products.Name AS Product,users_profile.FullName,users_profile.Email, DATE_FORMAT(demo_accounts.created,"%d-%m-%Y %H:%i:%s") AS createdby')
                ->from('demo_accounts')
                ->where('demo_accounts.id', $id)
                ->join('account_types', 'account_types.id=demo_accounts.account_type_id', 'left')
                ->join('platforms', 'platforms.id=demo_accounts.platform_id', 'left')
                ->join('products', 'products.id=demo_accounts.product_id', 'left')
                ->join('users_profile', 'users_profile.UserId=demo_accounts.user_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
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
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function get_account_type() {
        $this->db->from('account_types')
                ->where('Status', 'Y');
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_platform() {
        $this->db->from('platforms')
                ->where('Status', 'Y');
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_product() {
        $this->db->from('products')
                //->where('platform_id',$id)
                ->where('Status', 'Y');
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_platform_by_accounttype($accountId) {
        $platform = "<option value=''>Please Select</pilih>";
        $this->db->order_by('Name', 'ASC');
        if ($accountId == '1') {
            $plat = $this->db->get_where('platforms', array('id' => '2'));
        } else {
            $plat = $this->db->get('platforms');
        }
        foreach ($plat->result_array() as $data) {
            $platform .= "<option value='$data[id]'>$data[Name]</option>";
        }
        return $platform;
    }

    function get_product_by_platform($platId) {
        $product = "<option value=''>Please Select</pilih>";
        $this->db->order_by('Name', 'ASC');
        $prod = $this->db->get_where('products', array('Platform_id' => $platId));

        foreach ($prod->result_array() as $data) {
            $product .= "<option value='$data[id]'>$data[Name]</option>";
        }
        return $product;
    }

}
