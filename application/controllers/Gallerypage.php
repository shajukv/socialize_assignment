<?php



defined('BASEPATH') OR exit('No direct script access allowed');



require(APPPATH . 'libraries/REST_Controller.php');



class Gallerypage extends REST_Controller {



    function __construct() {

        parent::__construct();

        $this->load->model('Gallerypage_model');
        $this->load->model('Registration_model');


    }



    function loadgallery_get() {

        $data = 'Gallerypage ';

        $this->response($data);

    }



    function loadgallery_post() {

        $data = array('token' => $this->post('token'),

            'userid' => $this->post('userid'));

        $limit=6;
        $start= $this->post('start');
        
       

        $result = $this->Registration_model->validate_token($data);       

        if ($result == TRUE) {

            $result = $this->Gallerypage_model->show_gallery($limit,$start);
            $result_new=array();
            foreach($result as &$row)
            {
             foreach ($row as $key => $value) {
                if($key =='dish_image')
                {
                   $row [$key]="http://192.185.183.189/~webapplication/uploads/".$value;
                }
                
            }
            }  


            $dataDB['images'] = $result ;

        } else {

            $dataDB['images'] = $start;

        }

        

        $this->response($dataDB, 200);

        

    }




 function searchgallery_post() {

        $data = array('token' => $this->post('token'),

            'userid' => $this->post('userid'));

        $result = $this->Registration_model->validate_token($data);       

        if ($result == TRUE) {

            $search_data=$this->post('searchTerm');
            $result = $this->Gallerypage_model->search_gallery($search_data);
             if ($result == TRUE) {
                   $result_new=array();
            foreach($result as &$row)
            {
             foreach ($row as $key => $value) {
                if($key =='dish_image')
                {
                   $row [$key]="http://192.185.183.189/~webapplication/uploads/".$value;
                }
                
            }
            }  


            $dataDB['images'] = $result ;

                }else
                 {
                 $dataDB['images'] = 'No Images found,Try again';

                 }

            


      
          

        } else {

            $dataDB['images'] = 'Token not valid';

        }

        

        $this->response($dataDB, 200);

        

    }



}

