<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model
{

	public $attributes;
	public $profile;



	public function __construct()
	{

		parent::__construct();
		$this->load->database();
		$this->load->model('member_model');
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

		$user 		= $this->db->query("SELECT * FROM members WHERE $by='$val'")->row();
		$profile 	= $this->db->query("SELECT * FROM profile WHERE kode_member='$user->code'")->row();
		
		$this->attributes 	= $user;
		$this->profile	 	= $profile;

		return $this;
	}

	/*
	* 
	* Mengecek apakah user memiliki referral
	*/
	public function hasReferral(){

		return ($this->attributes("referral_code") !== '') ? true : false;
	}

	public function getReferral(){

		$referral 		= $this->member_model->getData($this->attributes('referral_code'),'code');

		return $referral;
	}
	
	/*
	* mengecek apakah user memiliki downline
	* 
	*/
	public function hasDownline(){

		$downline = $this->db->query("SELECT count(*) as banyak FROM members WHERE referral_code = '".$this->attributes('code')."'")->result();

		return ($downline[0]->banyak > 0) ? true : false;
	}

	/*
	* Mengembalikan object member_model sebagai referral user
	* 1 user memiliki null atau banyak downline
	*/
	public function getDownline(){

		$downline_data = $this->db->query("SELECT code FROM members WHERE referral_code = '".$this->attributes('code')."'")->result();

		$downline_obj 	= array();

		foreach ($downline_data as $key => $value) {
			$member_model = new Member_model;
			$downline_obj[] = $member_model->getData($value->code,'code');
		}

		return $downline_obj;
	}

	/*
	* Membuat chart downline
	* 1 user memiliki null atau banyak downline
	*/
	function drawChartDownline ($listOfItems) {
	    echo "<ul>";
	    foreach ($listOfItems as $item) {
	        echo "<li>" . $item->profile('nama');
	        if ($item->hasDownline()) {
	            $this->drawChartDownline($item->getDownline()); // here is the recursion
	        }
	        echo "</li>";
	    }
	    echo "</ul>";
	}


	public function attributes($property){

		return (isset($this->attributes->$property)) ? $this->attributes->$property : '' ;
	}

	public function profile($property){

		return (isset($this->profile->$property)) ? $this->profile->$property : '' ;
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
	                'rules' => 'required|is_unique[members.username]'
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
	                'rules' => array(
					                'required',
					                array(
					                        'referral_code_validation',
					                        function($str)
					                        {
					                                
					                                $cek = $this->db->query("SELECT count(*) as valid FROM members WHERE code='$str'")->row();
					                                return ($cek->valid>0) ? true :false;
					                        }
					                )
        						),
	                'errors' => array('referral_code_validation'=>'Your Refferal Code not valid')
	        ),
	        array(
	                'field' => 'member[email]',
	                'label' => 'Email',
	                'rules' => 'required|is_unique[members.email]'
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