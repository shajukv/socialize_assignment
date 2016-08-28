<?php

class Registration_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        $this->load->database();
    }

    function registration($data) {

        $this->db->insert('tb_user', $data);
        $num_inserts = $this->db->affected_rows();
        if ($num_inserts > 0) {
            return true;
        } else {
            return false;
        }
    }

    function login_check($data) {

        $condition = "user =" . "'" . $data['user'] . "' AND " . "passwd =" . "'" . $data['passwd'] . "'";
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    function update_token($data) {
        $newdate = array('token' => $data['token']);
        $this->db->update('tb_user', $newdate, array('regid' => $data['userid']));
        if ($this->db->affected_rows() >= 0)
            return true;
        else
            return false;
    }
    
    function validate_token($data)
    {
      
        $condition = "regid=" . "'" . $data['userid'] . "' AND " . "token =" . "'" . $data['token'] . "'";        
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
        
    }

    
}

?>