<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman home
*/
class Home extends CI_Controller {

	/**
	* Metode default
	* URL : http://localhost/freepik/selected
	*/
	public function index()
	{

		$cookie = $this->UserAccountModel->getCookie();

		if ($cookie !== null){

			$user_data = $this->UserAccountModel->getUserData($cookie);

			if ($user_data->role == "admin"){

				redirect(site_url('admin'));

			}else {

				$this->load->view('v_highlight');

			}

		}else {

			$this->load->view('v_highlight');

		}
	}
}