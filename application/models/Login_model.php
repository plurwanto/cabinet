<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {

    function get_user($usr, $pwd) {
        $sql = "SELECT a.*,b.FullName FROM users a INNER JOIN users_profile b WHERE a.Email = '" . $usr . "' AND a.Password = '" . md5($pwd) . "' AND a.Active = 'Y'";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
