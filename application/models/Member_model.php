<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model
{

	public $attributes = '';


	public function __construct()
	{

		parent::__construct();
		$this->load->database();
	}

	public function register(){

		$data_member 	= array(

				'username'   	=> $this->input->post('member[username]'),
				'code'		 	=> $this->generate_code($this->input->post('member[username]')),
				'email'      	=> $this->input->post('member[email]'),
				'password'   	=> $this->hash_password($this->input->post('member[password]')),
				'referral_code' => $this->input->post('member[referral_code]'),
				'created_at' => date('Y-m-j H:i:s'),
				'updated_at' => date('Y-m-j H:i:s'),

			);

		$data_profile 			= $this->input->post('profile');
		$data_profile['kode_member'] 	= $this->generate_code($this->input->post('member[username]'));

		$this->db->trans_start();
		$this->db->insert('members',$data_member);
		$this->db->insert('profile',$data_profile);
		$this->db->trans_complete();

		return $this->db->trans_status();
		
	}

	/*
	* mengambil data dari table members
	* berdasarkan username, code, atau email
	*/

	public function getData($val, $by = "username"){

		$user = $this->db->query("SELECT * FROM members WHERE $by='$val'")->row();
		
		$this->attributes = $user;
		return $this;
	}

	public function attributes($property){

		return (isset($this->attributes->$property)) ? $this->attributes->$property : '' ;
	}


	public function generate_code($username){

		return strtoupper(substr(md5($username),0,6));
	}

	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function rules(){

      return array(
	        array(
	                'field' => 'member[username]',
	                'label' => 'Username',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'member[password]',
	                'label' => 'Password',
	                'rules' => 'required',
	                'errors' => array(
	                        'required' => 'You must provide a %s.',
	                ),
	        ),
	        array(
                'field' => 'member[repassword]',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[member[password]]'
        	),
	        array(
	                'field' => 'member[referral_code]',
	                'label' => 'Refferal Code',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'member[email]',
	                'label' => 'Email',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[nama]',
	                'label' => 'Nama',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[tanggal_lahir]',
	                'label' => 'Tanggal Lahir',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[alamat]',
	                'label' => 'Alamat',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[kota]',
	                'label' => 'Kota',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[provinsi]',
	                'label' => 'Provinsi',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[kode_pos]',
	                'label' => 'Kode Pos',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[negara]',
	                'label' => 'Negara',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'profile[no_hp]',
	                'label' => 'Nomor HP',
	                'rules' => 'required'
	        ),
	       
		);

	}



}