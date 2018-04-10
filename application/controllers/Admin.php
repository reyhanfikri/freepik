<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman admin
*/
class Admin extends CI_Controller {

	/**
	* Metode default
	* URL : http://localhost/freepik/admin
	*/
	public function index()
	{

		$cookie = $this->UserAccountModel->getCookie();

		if ($cookie !== null){

			$user_data = $this->UserAccountModel->getUserData($cookie);

			if ($user_data->role == "user"){

				redirect(site_url());

			}else{

				$data['data'] = $this->UserAccountModel->getAllUserData();

				$this->load->view('v_admin', $data);
				
			}

		}else{

			redirect(site_url());

		}
	}

	public function hapus_user($id) {

		$this->UserAccountModel->deleteData($id);

		redirect('admin');

	}
}
