<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Real_account_model extends CI_Model {

    var $table = 'real_accounts';
    var $column_order = array('users_profile.FullName', 'users_profile.Email', 'real_accounts.created');
    var $column_search = array('users_profile.FullName', 'users_profile.Email');
    var $order = array('created' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query() {
        $this->db->from($this->table);
//        $this->db->select('real_accounts.*,account_types.Name AS Type,platforms.Name AS Platform,products.Name AS Product,users_profile.FullName,users_profile.Email')
//                ->from('real_accounts')
//                ->join('account_types', 'account_types.id=real_accounts.account_type_id', 'left')
//                ->join('platforms', 'platforms.id=real_accounts.platform_id', 'left')
//                ->join('products', 'products.id=real_accounts.product_id', 'left')
//                ->join('users_profile', 'users_profile.UserId=real_accounts.user_id', 'left');
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
        $this->db->select('real_accounts.*,account_types.Name AS Type,platforms.Name AS Platform,products.Name AS Product')
                ->from('real_accounts')
                ->join('account_types', 'account_types.id=real_accounts.user_accounts_type', 'left')
                ->join('platforms', 'platforms.id=real_accounts.user_accounts_platform', 'left')
                ->join('products', 'products.id=real_accounts.user_accounts_product', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
    }

    function getDemoAccountById($id) {
        $this->db->where(array('user_id' => $id, 'status' => 'ACTIVE'));
        $query = $this->db->get('demo_accounts');
        if ($query->num_rows() > 0)
            return $query->result_array();
    }

    function get_unfinished_accounts($id) {
        $this->db->select('temp_real_accounts.*')
                ->from('temp_real_accounts')
                // ->join('products', 'products.id=temp_real_accounts.product_id', 'left')
                ->where(array('user_id' => $id));
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
    }

    function get_existing_unfinished_accounts($id, $nodoc) {
        $this->db->select('temp_real_accounts.*,users_profile.*,users_emergency_contacts.*,users_works.*,users_list_of_assets.*,users_bank.*,users_pictures.*')
                ->from('temp_real_accounts')
                ->join('users_profile', 'users_profile.UserId=temp_real_accounts.user_id', 'LEFT')
                ->join('users_emergency_contacts', 'users_emergency_contacts.user_id=temp_real_accounts.user_id', 'LEFT')
                ->join('users_works', 'users_works.user_id=temp_real_accounts.user_id', 'LEFT')
                ->join('users_list_of_assets', 'users_list_of_assets.user_id=temp_real_accounts.user_id', 'LEFT')
                ->join('users_bank', 'users_bank.UserId=temp_real_accounts.user_id', 'LEFT')
                ->join('users_pictures', 'users_pictures.user_id=temp_real_accounts.user_id', 'LEFT')
                ->where(array('temp_real_accounts.user_id' => $id, 'temp_real_accounts.document_number' => $nodoc));
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0)
            return $query->row();
    }
    
    function get_profile_accounts_by($id) {
        $this->db->select('temp_real_accounts.*,users_profile.*,users_emergency_contacts.*,users_works.*,users_list_of_assets.*,users_bank.*,users_pictures.*')
                ->from('temp_real_accounts')
                ->join('users_profile', 'users_profile.UserId=temp_real_accounts.user_id', 'LEFT')
                ->join('users_emergency_contacts', 'users_emergency_contacts.user_id=temp_real_accounts.user_id', 'LEFT')
                ->join('users_works', 'users_works.user_id=temp_real_accounts.user_id', 'LEFT')
                ->join('users_list_of_assets', 'users_list_of_assets.user_id=temp_real_accounts.user_id', 'LEFT')
                ->join('users_bank', 'users_bank.UserId=temp_real_accounts.user_id', 'LEFT')
                ->join('users_pictures', 'users_pictures.user_id=temp_real_accounts.user_id', 'LEFT')
                ->where(array('temp_real_accounts.user_id' => $id));
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0)
            return $query->row();
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
        $this->db->select('real_accounts.*,account_types.Name AS Type,platforms.Name AS Platform,products.Name AS Product,users_profile.FullName,users_profile.Email, DATE_FORMAT(real_accounts.created,"%d-%m-%Y %H:%i:%s") AS createdby')
                ->from('real_accounts')
                ->where('real_accounts.id', $id)
                ->join('account_types', 'account_types.id=real_accounts.account_type_id', 'left')
                ->join('platforms', 'platforms.id=real_accounts.platform_id', 'left')
                ->join('products', 'products.id=real_accounts.product_id', 'left')
                ->join('users_profile', 'users_profile.UserId=real_accounts.user_id', 'left');
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

    public function delete_temp_by_id($nodok, $id) {
        $this->db->where(array('document_number' => $nodok, 'user_id' => $id));
        $this->db->delete('temp_real_accounts');
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
