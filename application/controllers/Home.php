<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Class untuk laman home
*/
class Home extends CI_Controller {

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
	* URL : http://localhost/freepik
	*/
	public function index()
	{

		$cookie = $this->CookieModel->getCookie();

		if ($cookie !== null){

			$user_data = $this->UserModel->getUserData($cookie);

			if ($user_data->id_role == 2){

				redirect(site_url('admin'));

			}else {

				$this->load->view('v_home');

			}

		}else {

			$this->load->view('v_home');

		}
	}

	/**
	* Metode default
	* URL : http://localhost/freepik/highlight
	*/
	public function highlight()
	{

		$this->load->view('v_highlight');

	}
}
