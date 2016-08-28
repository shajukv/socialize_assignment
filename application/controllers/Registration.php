<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');

class Registration extends REST_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Registration_model');
    }

    function user_get() {
        $data = 'Social Web APP ';
        $this->response($data);
    }

    function user_post() {

        //$this->response($_POST);
        $fileName = $_FILES['file']['name'];
        $fileName = preg_replace('/\s\s+/', ' ', $fileName);


        $fileType = $_FILES['file']['type'];
        $fileContent = file_get_contents($_FILES['file']['tmp_name']);
        $dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
        $json = json_encode(array(
            'name' => $fileName,
            'type' => $fileType,
            'dataUrl' => $dataUrl,
        ));

        $uploaddir = './uploads/';
        $uploadfile = $uploaddir . $fileName;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            $dataDB['status'] = 'success';
            $dataDB['filename'] = $fileName;
            $male = $this->post('male');
            $female = $this->post('female');
            if ($male)
                $sex = 'M';
            else
                $sex = 'F';
            $password = md5($this->post('name'));
            $data = array(
                'fname' => $this->post('name'),
                'email' => $this->post('email'),
                'country' => $this->post('country'),
                'mobile' => $this->post('tel'),
                'age' => $this->post('age'),
                'sex' => $sex,
                'dish_name' => $this->post('dishName'),
                'dish_image' => $fileName,
                'why' => $this->post('why'),
                'user' => $this->post('email'),
                'passwd' => $password,
                'status' => 1
            );
            //Transfering data to Model
            $result = $this->Registration_model->registration($data);
            if ($result == TRUE) {
                $dataDB['message_display'] = 'Registration Successfully !';
            }
            else {
            $dataDB['status'] = 'There was a problem creating your new account. Please try again';
                }
        } else {
            $dataDB['status'] = 'A problem in File Uploading and  creating your new account. Please try again';
        }
        $this->response($dataDB, 200);
    }

}
