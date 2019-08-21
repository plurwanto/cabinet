<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup_model extends CI_Model {

    public function insertuser($data) {
        return $this->db->insert('users', $data);
    }
    
    public function insertuserLog($data) {
        return $this->db->insert('log_register', $data);
    }

    public function verifyemail($key) {
        $data = array('Active' => 'Y');
        $this->db->where('md5(Email)', $key);
        return $this->db->update('users', $data);
    }
    
    public function insertprofile($data) {
        return $this->db->insert('users_profile', $data);
    }
    
    public function verifyUserId($key) {
        $data = array('UserId' => 'Y');
        $this->db->where('md5(email)', $key);
        return $this->db->update('users', $data);
    }
    
    function getId($key){
        //$this->db->where('md5(email)', $key);
        $query = $this->db->query("SELECT a.id,b.fname,b.phone,b.email  FROM users a INNER JOIN log_register b ON a.Email = b.email WHERE md5(a.Email) = '".$key."'");
        return $query->row();
        
    }
    

}
