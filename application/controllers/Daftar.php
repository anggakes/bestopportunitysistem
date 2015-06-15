<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	/* 
	* parameter model yang digunakan 
	* dalam library Auth terdapat model
	* member dan admin	
	*/
	protected $params = array('model'=>'member');


	public function __construct()
	{
	    parent::__construct();

        $this->load->library('form_validation');
	    $this->load->library('auth',$this->params);
	    $this->load->model('member_model');
	}

	public function index()
	{	
		
		$this->form_validation->set_rules($this->member_model->rules());

		// Form validation 
		if ($this->form_validation->run() == FALSE){

				$this->load->view('daftar/index');
		}else{

				if($this->member_model->register() === false){
					echo "error";
				}else{
					echo "sukses";
				}
		}

	}

	public function test(){

		print_r($this->member_model->getData('anggakes')->attributes('email'));
		
	}

	
	
	
}
