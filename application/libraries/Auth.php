<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Auth {

        public $model;

        
        public function __construct($params)
        {
 
                $this->load->database();
                $this->model = $params['model'];
        }

        /* 
        * Using CI global variable without extra variable
        * 
        */
        public function __get($var)
        {
                return get_instance()->$var;
        }


        
        
}