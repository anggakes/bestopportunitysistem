<?php defined('BASEPATH') OR exit('No direct script access allowed');


class AuthLibrary {

        public $model;
        
        public $username;

        public $formLoginUrl = "auth/login";

        public $homeUrl = "";

        public $not_allowed_view = "auth/not_allowed";
        
        public function __construct($params)
        {
 
                $this->load->database();
                $this->load->library('session');
                $this->load->model('member_model');
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

        public function login($usernameOrEmail, $password){

                if($this->resolve_user_login($usernameOrEmail, $password)){
                        
                        /* update last_login */
                        $this->update_last_login();

                        if($this->model == 'members'){
                                $user =  $this->member_model->getData($this->username);
                        }else{
                                $user = $this->admin_model->getData($this->username);
                        }

                        // Set session data
                        $this->session->set_userdata('login_user',serialize($user));
                        $this->session->set_userdata('login_status',true);
                        $this->session->set_userdata('login_role',$this->model);


                        redirect(base_url().$this->homeUrl);
                }else {
                        
                        $this->session->set_flashdata('error_message', 'Kombinasi Username dan Password salah');
                        redirect(base_url().$this->formLoginUrl);
                }
        }

        public function logout() {
                
                if ($this->is_login()) {
                        
                        // remove session datas
                        $this->session->unset_userdata('login_user');
                        $this->session->unset_userdata('login_status');    
                        $this->session->unset_userdata('login_role');
                } 

                redirect(base_url().$this->formLoginUrl);
                
        }

        

        public function is_login(){

                return (isset($_SESSION['login_status']) && $_SESSION['login_status'] === true) ? true : false;
        }

        public function is_role($role){
                
                return (isset($_SESSION['login_role']) &&  $_SESSION['login_role'] === $role) ? true : false;
        }

        public function is_loginThenRedirect(){

            if ($this->is_login()) 
                {       
                       return true;
                }else{

                       redirect(base_url().$this->formLoginUrl); 
                };   
        }

        public function check_login_and_role($role){

                if ($this->is_login()) 
                {       
                        if($this->is_role($role))
                        {

                                return true;       
                        }else{
                                redirect($this->not_allowed_view);
                        }
                }else{

                       redirect(base_url().$this->formLoginUrl); 
                };      
        }

        public function resolve_user_login($usernameOrEmail, $password) {
                
                $this->db->select('password,username');
                $this->db->from($this->model);
                $this->db->where('username', $usernameOrEmail)->or_where('email',$usernameOrEmail);
                $user = $this->db->get()->row();

                $this->username = $user->username;
                $hash = $user->password;
                
                return $this->verify_password_hash($password, $hash);
                
        }

        public function update_last_login(){
                
                $this->db->where('username', $this->username);
                $this->db->update($this->model, array('last_login'=>date('Y-m-j H:i:s')));

        }

        private function verify_password_hash($password, $hash) {
                
                return password_verify($password, $hash);
                
        }


        
        
}