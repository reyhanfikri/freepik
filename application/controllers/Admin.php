<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{

		$cookie = $this->UserAccountModel->getCookie();

		if ($cookie !== null){

			$user_data = $this->UserAccountModel->getUserData($cookie);

			if ($user_data->role == "user"){

				redirect(base_url());

			}

		}

		$this->load->view('v_admin');
	}
}
