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

	public function updateUserProfile() {

		if ($this->input->post('submit') !== null) {

			$nama_lengkap = $this->input->post('nama_lengkap');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');

			if ($nama_lengkap != "" || $jenis_kelamin != "" || $alamat != "") {

				$id_user_profile = $this->input->post('id_user_profile');

				$update_process = $this->UserProfileModel->updateUserProfileData($id_user_profile, $nama_lengkap, $jenis_kelamin
					, $alamat);

			}

		}

		redirect(site_url('profil'));

	}
}
