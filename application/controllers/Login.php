<?php
require(APPPATH . 'libraries/REST_Controller.php');

class Login extends REST_Controller {

    public $logged = '';
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('registration_model');
    }
    function validate_post() {

        $data = array(
            'user' => $this->post('username'),
            'passwd' => md5($this->post('password')),
        );
        //Transfering data to Model
        $result = $this->registration_model->login_check($data);
        if (!empty($result)) {
            $logged_data = [
                'userid' => $result->regid,
                'username' => $result->user
            ];

            // $logged= $this->session->set_userdata('logged_in',$data);
            $token = hash_hmac("sha256", $result->email . $result->user, $result->regid);
            
            $token_data=[
                'userid' => $result->regid,
                'token' => $token
            ];
           $result_update= $this->registration_model->update_token($token_data);
           if($result_update)  
           $this->response($token_data);
          
        } else {
            $this->response("Bad Authentication data.");
                }
    }

    function logout_post() {
          
            $logged_data = array('token' => $this->post('token'),

            'userid' => $this->post('userid'));
                 $result = $this->registration_model->validate_token($logged_data);       

        if ($result == TRUE) {

                  $token_data=[
                'userid' => $result->regid,
                'token' => 'Null'
            ];
           $result_update= $this->registration_model->update_token($token_data);
           if($result_update)  
           $this->response("logout Successfully");
          
             }else     
                 $this->response("logout failed");


       
        
    }

   

}

?>
