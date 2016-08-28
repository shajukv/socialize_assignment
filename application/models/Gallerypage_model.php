<?php

class Gallerypage_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        $this->load->database();
    }

    function show_gallery($limit,$start) {


        $this->db->select('regid,dish_name,dish_image,likes');
        $this->db->from('tb_user');
       //  if($limit!='' && $start!=''){
       $this->db->limit($limit, $start);
      //  }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

   function search_gallery($data) {

        
        $condition = "regid LIKE " . "'" . $data . "%' OR " . "fname LIKE " . "'" . $data . "%'"; 

        $this->db->select('regid,dish_name,dish_image,likes');
        $this->db->from('tb_user');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }





}

?>