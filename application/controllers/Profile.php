<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	protected $params = array('model'=>'members');

	public function __construct()
	{
	    parent::__construct();

        $this->load->library('template');
        $this->load->library('session');
        $this->load->model('member_model');
	    $this->load->library('authlibrary',$this->params);
	    
	}//

	public function index($username)
	{	

		$this->authlibrary->is_loginThenRedirect();
			
		$this->template->load('template/template_main','profile');
		
	}
	
	
}
