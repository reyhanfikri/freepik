<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman gallery online
*/
class Profil extends CI_Controller {

	/**
	* Metode konstruktor
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->model(array('UserModel', 'CookieModel', 'UserProfileModel'));
	}

	/**
	* Metode default
	*/
	public function index() {

		$data['cookie'] = $this->CookieModel->getCookie();

		if ($data['cookie'] !== null){

			$data['user_data'] = $this->UserModel->getUserData($data['cookie']);
			$data['user_profile_data'] = $this->UserProfileModel->getUserProfileData(
				$data['user_data']->id);

			$this->load->view('v_header');
			$this->load->view('v_profile', $data);

		}else{

			redirect(site_url('login'));

		}	
	}
}
