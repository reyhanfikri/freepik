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

				$this->load->view('v_admin');
				
			}

		}else{

			redirect(site_url());

		}
	}

	public function admin_sementara(){

		$this->load->view('v_admin_sementara');

	}
}
