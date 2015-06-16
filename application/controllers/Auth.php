<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/* 
	* parameter model yang digunakan 
	* dalam library Auth terdapat model
	* members dan admins	
	*/
	protected $params = array('model'=>'members');

	

	public function __construct()
	{
	    parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->library('session');
	    $this->load->library('authlibrary',$this->params);
	    $this->load->model('member_model');


	}

	public function daftar()
	{	

		$this->form_validation->set_rules($this->member_model->rules());

		// Form validation 
		if ($this->form_validation->run() == FALSE){

				$this->template->load('template/template_auth','auth/register');

		}else{

				if($this->member_model->register() === false){
					echo "error";
				}else{
					echo "sukses";
				}
		}

	}

	public function login()
	{	
		
		$rules 		=  array(
				array(
	                'field' => 'usernameOrEmail',
	                'label' => 'Username',
	                'rules' => 'required'
		        ),
		        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required',
		        ),
			);
		$this->form_validation->set_rules($rules);

		// Form validation 
		if ($this->form_validation->run() == FALSE){

				$this->template->load('template/template_auth','auth/login');

		}else{

				$usernameOrEmail 	= $this->input->post('usernameOrEmail');
				$password 			= $this->input->post('password');

				$this->authlibrary->login($usernameOrEmail, $password);
				
		}

	}

	public function logout(){

		$this->authlibrary->logout($usernameOrEmail, $password);
		
	}

	public function not_allowed(){
		$this->template->load('template/template_auth','auth/not_allowed');
	}
	
	
}
