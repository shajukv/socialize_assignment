<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index_page extends CI_Controller {

    public function index() {
          $this->load->helper('url');
        $this->load->view('index_view');
    }
}
?>