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
		$this->load->model(array('UserModel', 'CookieModel', 'ModelGambar', 'CommentModel'));
	}

	/**
	* Metode default
	*/
	public function index() {

		$this->load->view('v_header');
		$this->load->view('v_profile');

	}
}
