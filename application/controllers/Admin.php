<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk manajemen laman admin dan proses hapus akun user
*/
class Admin extends CI_Controller {

	/**
	* Metode konstruktor
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('UserModel', 'CookieModel'));
	}

	/**
	* Metode default
	* URL : http://localhost/freepik/admin
	*/
	public function index()
	{

		$cookie = $this->CookieModel->getCookie();

		if ($cookie !== null){

			$user_data = $this->UserModel->getUserData($cookie);

			if ($user_data->id_role == 1){

				redirect(site_url());

			}else{

				$data['data'] = $this->UserModel->getAllUserData();

				$this->load->view('v_admin', $data);
				
			}

		}else{

			redirect(site_url());

		}
	}

	/**
	* Metode untuk menghapus akun user
	* URL : http://localhost/freepik/admin/hapus_user/$id
	*/
	public function hapus_user($id) {

		$this->UserModel->deleteData($id);

		redirect('admin');

	}
}
